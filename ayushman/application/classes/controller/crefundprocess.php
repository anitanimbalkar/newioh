<?php defined('SYSPATH') or die('No direct script access.');
include_once(DOCROOT.'application/classes/helper/transaction.php');
class Controller_Crefundprocess extends Controller  {
	
	public function action_appointmentrefund()
	{
		if(php_sapi_name() == 'cli'){
			$cronid = CLI::options('CRONID');
                }else{
                	$cronid = $_GET['CRONID'];
                }
		$today = date('Y-m-d');
		$datetime=date('d M Y H:i A');
		$yesterday = date('Y-m-d',strtotime("-1 days"));
		echo $yesterday;
		$objAppointmets=orm::factory('appointment')->where('refappointmentstatusesid_c','=','2')->where('displaytime_c','<',$today);
		
		//for inclinic appointments online payment
		
		$objInClinicappointments = $objAppointmets->where('consultationmode_c','=','In-clinic')->limit(100)->find_all();
		
		$array_accounts = include(DOCROOT.'application/config/accounts.php');
		$log_string =  "Refund no show appointment for date ".date('d M Y',strtotime($yesterday));
		foreach($objInClinicappointments as $objInClinicappointment)
		{
			
			$obj_appointment = orm::factory('appointment')->where('id','=',$objInClinicappointment->id)->find();
			if($obj_appointment->paid_c== '1')
			{	//appointment payment is online so refund dr consultation charges
				$log_string = $log_string."\n Doctor fees for no show inclinic appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c."on ".$datetime;
				$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
				
			}
			else
			{
				      //appointment payment is inclinic
				      $AppointmentObj = orm::factory('appointment')->where('id','=',$objInClinicappointment->id)->find();
				      $AppointmentObj->refappointmentstatusesid_c ='5';
				      $AppointmentObj->save();
			}
			// refund platform useage chargers 
			$objIndividualplan= orm::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$obj_appointment->refappfromid_c)->find();
			$log_string=$log_string."\n Useage Charge Refund for no show inclinic appointment(".$obj_appointment->id."). RS.".$objIndividualplan->usagechargesinclinic."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
			if($objIndividualplan->usagechargesinclinic == null){
				$return =$this->transferUseageChargeRefund($obj_appointment->refappfromid_c,0);
			}else{
				$return =$this->transferUseageChargeRefund($obj_appointment->refappfromid_c,$objIndividualplan->usagechargesinclinic);
			}
		}
		
		//for online Waiting appointment 
		$objAppointmets=orm::factory('appointment')->where('refappointmentstatusesid_c','=','2')->where('displaytime_c','<',$today)->where('displaytime_c','>',$yesterday);
		$objWOnlineAppointments = $objAppointmets->where('consultationmode_c','=','Online')->where('appointmenttype_c','=','W')->find_all();
		foreach($objWOnlineAppointments as $objWOnlineAppointment)
		{
			$obj_appointment = orm::factory('appointment')->where('id','=',$objWOnlineAppointment->id)->find();
			$log_string = $log_string."\n Doctor fees for no show online waiting appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c."on ".$datetime;
			$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
			// refund useage chargers 
			$objIndividualplan= orm::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$obj_appointment->refappfromid_c)->find();
			$log_string = $log_string."\n Useage Charge Refund for no show online waiting appointment(".$obj_appointment->id."). RS.".$objIndividualplan->usagechargesonline_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
			$return =$this->transferUseageChargeRefund($obj_appointment->refappfromid_c,$objIndividualplan->usagechargesonline_c);
			
		}
		//for online sheduled appointment
		$objAppointmets=orm::factory('appointment')->where('refappointmentstatusesid_c','=','2')->where('scheduledstarttime_c','<',$today)->where('scheduledstarttime_c','>',$yesterday);
		$objSOnlineAppointments = $objAppointmets->where('consultationmode_c','=','online')->where('appointmenttype_c','=','S')->find_all();
		
		foreach($objSOnlineAppointments as $objSOnlineAppointment)
		{
			$obj_appointment = orm::factory('appointment')->where('id','=',$objSOnlineAppointment->id)->find();
			$objIndividualplan= orm::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c','=','billingindividualplans.refplanid_c')->where('billingindividualplans.status_c','=','active')->where('billingindividualplans.refusersid_c','=',$obj_appointment->refappfromid_c)->find();
			$log_string = $log_string."\n Useage Charge for no show online schedule appointment(".$obj_appointment->id."). RS.".$objIndividualplan->usagechargesonline_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
			$return =$this->transferUseageChargeRefund($obj_appointment->refappfromid_c,$objIndividualplan->usagechargesonline_c);
			$obj_consultationsession = orm::factory('consultationsession')->where('refappid_c','=',$objSOnlineAppointment->id)->find();
			if($obj_consultationsession->id == NULL)//patient and doctor is not present 
			{
				$log_string = $log_string."\n Doctor fees Charge no show online schedule appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
				$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
			}
			else//consulation is present
			{
				switch($obj_consultationsession->dstatus_c)
				{
					case "away"://refund to patient
						$log_string = $log_string."\n Doctor fees Charge for no show online schedule appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
						$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
						break;                                                                                        
					case "aborted":
						$ConsultationSessionTime = strtotime($obj_consultationsession->dstatustime_c);
						$AppointmentTime = strtotime($obj_appointment->displaytime_c);
						if ($ConsultationSessionTime > $AppointmentTime)
						{
							$min	=round(abs($ConsultationSessionTime - $AppointmentTime) / 60,2);
							//check for doctor press consultion button with in time limit.
							if(((int) ($min)) >= 15)
							{
								//doctor did not press button in time limit.
								$log_string = $log_string."\n Doctor fees Charge for no show online schedule appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
								$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
							}
							else
							{
								//moeny transfer to doctor
								$objDoctor = ORM::factory('doctor')->where('id','=',$obj_appointment->refappwithid_c)->find();
								$log_string = $log_string."\n Doctor fees Charge for no show online schedule appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$objDoctor->refdoctorsid_c." on ".$datetime;
								$return =$this->transferRefundmoeny($objDoctor->refdoctorsid_c,$obj_appointment->rate_c,$obj_appointment->id);
							}
						}
						else
						{
							//doctor is present but before the appointtime.
							$log_string = $log_string."\n Doctor fees Charge for no show online schedule appointment(".$obj_appointment->id."). RS.".$obj_appointment->rate_c."/- is tranfered to user id ".$obj_appointment->refappfromid_c." on ".$datetime;
							$return =$this->transferRefundmoeny($obj_appointment->refappfromid_c,$obj_appointment->rate_c,$obj_appointment->id);
						}
						break;
				}
			}
			
		}
		
		//save log to file 
		$year=date('Y');
		$month=date('m');
		if(!is_dir(DOCROOT."refundlog/"))
		{
			mkdir(DOCROOT."refundlog/",0777,true);
			mkdir(DOCROOT."refundlog/".$year);
			mkdir(DOCROOT."refundlog/".$year."/".$month);
		}
		else
		{
			if(!is_dir(DOCROOT."refundlog/".$year))
			{
				mkdir(DOCROOT."refundlog/".$year,0777,true);
				mkdir(DOCROOT."refundlog/".$year."/".$month);
			}
			else
			{
				if(!is_dir(DOCROOT."refundlog/".$year."/".$month))
				{
					mkdir(DOCROOT."refundlog/".$year."/".$month,0777,true);
				}
			}
		}
		$today=date('d_M_Y_H_i');
		$filename= $today.".txt";
		$filepath=DOCROOT."refundlog/".$year."/".$month."/".$filename;
		$fh = fopen($filepath, 'w') or die("can't open file");
		fwrite($fh, $log_string);
		fclose($fh);
		$result= "<a target='_blank' style='cursor:pointer;' href='/ayushman/refundlog/".$year."/".$month."/".$filename."' >successful refund for date ".$yesterday."</a>";
		//echo "$result and cron id is: $cronid";
		$cron = new helper_cron();
		$cron->writelog($cronid,'SUCCESS',$result,'No show appointment','Clear No show appointment');
		
	}
	
	private function transferRefundmoeny($toUserId,$amount,$appid)
	{
		
		$array_accounts = include(DOCROOT.'application/config/accounts.php');
		$obj_appointment = orm::factory('appointment')->where('id','=',$appid)->find();
		$obj_appointment->refappointmentstatusesid_c ='5';
		$obj_user 	= ORM::factory('user')->where('id','=',$toUserId)->find();
		
		//Create billing account -start
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		if($objAccounts->id == '')
		{
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts->accountcode_c 		= 'IOH'.$obj_user->id.rand(10000,99999);
			$objAccounts->refaccountuserid_c 	= $obj_user->id;
			$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
			$objAccounts->debitedamount_c 		= 0;
			$objAccounts->creditedamount_c 		= 0;
			$objAccounts->netbalance_c	 	= 0;
			$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
			$objAccounts->lastupdatedby_c 		= $obj_user->id;
			$objAccounts->save();
			$postfix = '';
			for($i=0;$i<(10-strlen($objAccounts->id));$i++)
			{
				$postfix = $postfix.'0';
			}
			$accountcode = 'IOH'.$postfix.$objAccounts->id;

			$objAccounts->accountcode_c			= $accountcode;	
			$objAccounts->update();
		}
		//transfer moeny
		$appointmentresult = transaction::transfer( ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$amount,2);
		$obj_appointment->save();
		return 'successful';
	
	}
	
	private function transferUseageChargeRefund($toUserId,$amount)
	{
		$array_accounts = include(DOCROOT.'application/config/accounts.php');
		$obj_user 	= ORM::factory('user')->where('id','=',$toUserId)->find();
		
		//Create billing account -start
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
		if($objAccounts->id == '')
		{
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts->accountcode_c 		= 'IOH'.$obj_user->id.rand(10000,99999);
			$objAccounts->refaccountuserid_c 	= $obj_user->id;
			$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
			$objAccounts->debitedamount_c 		= 0;
			$objAccounts->creditedamount_c 		= 0;
			$objAccounts->netbalance_c	 	= 0;
			$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
			$objAccounts->lastupdatedby_c 		= $obj_user->id;
			$objAccounts->save();
			$postfix = '';
			for($i=0;$i<(10-strlen($objAccounts->id));$i++)
			{
				$postfix = $postfix.'0';
			}
			$accountcode = 'IOH'.$postfix.$objAccounts->id;

			$objAccounts->accountcode_c			= $accountcode;	
			$objAccounts->update();
		}
		
		//transfer moeny
		$appointmentresult = transaction::transfer( ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$amount,10);
		return 'successful';
	
	}
	
}
