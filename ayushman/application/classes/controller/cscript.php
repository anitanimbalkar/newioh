<?php defined('SYSPATH') or die('No direct script access.');
include_once(DOCROOT.'application/classes/helper/transaction.php');
include_once(DOCROOT.'application/classes/helper/export.php');
require_once(DOCROOT.'simple_html_dom.php');
class Controller_Cscript extends Controller  {
	public function action_migrateiohids1(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP1','=','CAMP 1')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			
			$user = ORM::factory('user')->where('id','=',$coepuser->iohid)->find();
			$corporatemembers = ORM::factory('corporatemember');
			$corporatemembers->refcorporateid_c = 6;
			$corporatemembers->emailid_c = $user->email;
			$corporatemembers->status_c = 'Associated';
			$corporatemembers->employeename_c = $coepuser->firstname;
			$corporatemembers->employeeid_c = $coepuser->username;
			$corporatemembers->dateofbirth_c = $coepuser->DOB;
			$corporatemembers->iohid_c = $coepuser->iohid;
			$corporatemembers->isassociated_c = 1;
			$corporatemembers->employeemobileno_c = $user->mobileno1_c;
			$corporatemembers->save();
			$i++;
		}
		echo 'total  users '.$i;
		die('done');
	}
	public function action_migrateiohids2(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP2','=','CAMP 2')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			
			$user = ORM::factory('user')->where('id','=',$coepuser->iohid)->find();
			$corporatemembers = ORM::factory('corporatemember');
			$corporatemembers->refcorporateid_c = 6;
			$corporatemembers->emailid_c = $user->email;
			$corporatemembers->status_c = 'Associated';
			$corporatemembers->employeename_c = $coepuser->firstname;
			$corporatemembers->employeeid_c = $coepuser->username;
			$corporatemembers->dateofbirth_c = $coepuser->DOB;
			$corporatemembers->iohid_c = $coepuser->iohid;
			$corporatemembers->isassociated_c = 1;
			$corporatemembers->employeemobileno_c = $user->mobileno1_c;
			$corporatemembers->save();
			$i++;
		}
		echo 'total  users '.$i;
		die('done');
	}
	public function action_migrateiohids3(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP3','=','CAMP 3')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			
			$user = ORM::factory('user')->where('id','=',$coepuser->iohid)->find();
			$corporatemembers = ORM::factory('corporatemember');
			$corporatemembers->refcorporateid_c = 6;
			$corporatemembers->emailid_c = $user->email;
			$corporatemembers->status_c = 'Associated';
			$corporatemembers->employeename_c = $coepuser->firstname;
			$corporatemembers->employeeid_c = $coepuser->username;
			$corporatemembers->dateofbirth_c = $coepuser->DOB;
			$corporatemembers->iohid_c = $coepuser->iohid;
			$corporatemembers->isassociated_c = 1;
			$corporatemembers->employeemobileno_c = $user->mobileno1_c;
			$corporatemembers->save();
			$i++;
		}
		echo 'total  users '.$i;
		die('done');
	}
	public function action_checkappcamp1(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP1','=','CAMP 1')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$appointments = ORM::factory('appointment')->where('refappfromid_c','=',$coepuser->iohid)->find();
			$coepuser->appid = $appointments->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$appointments->id.' '.$appointments->refappointmentstatusesid_c.'</br>';
			$i++;
		}
		echo 'total  apps '.$i;
		die('done');
	}
	public function action_checkappcamp2(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP2','=','CAMP 2')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$appointments = ORM::factory('appointment')->where('refappointmentstatusesid_c','=',1)->where('refappfromid_c','=',$coepuser->iohid)->find();
			$coepuser->appid = $appointments->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$appointments->id.' '.$appointments->refappointmentstatusesid_c.'</br>';
			$i++;
		}
		echo 'total  apps '.$i;
		die('done');
	}
	public function action_checkappcamp3(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP3','=','CAMP 3')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$appointments = ORM::factory('appointment')->where('refappointmentstatusesid_c','=',1)->where('refappfromid_c','=',$coepuser->iohid)->find();
			$coepuser->appid = $appointments->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$appointments->id.' '.$appointments->refappointmentstatusesid_c.'</br>';
			$i++;
		}
		echo 'total  apps '.$i;
		die('done');
	}
	
	public function action_migrateappscamp1(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP1','=','CAMP 1')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageappointment');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 8;
			$packageorder->appointmentid_c = $coepuser->appid;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	public function action_migrateappscamp2(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP2','=','CAMP 2')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageappointment');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 9;
			$packageorder->appointmentid_c = $coepuser->appid;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	public function action_migrateappscamp3(){
		$coepusers = ORM::factory('coepuser')->where('ConsultationStatusForCAMP3','=','CAMP 3')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageappointment');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 10;
			$packageorder->appointmentid_c = $coepuser->appid;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	public function action_checkordercamp1(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP1','=','CAMP 1')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$orderedtests = ORM::factory('orderedtest')->where('customeruserid_c','=',$coepuser->iohid)->find();
			$order = ORM::factory('diagnosticlabsorder')->where('status_c','=','reportsuploaded')->where('id','=',$orderedtests->diagnosticlabsorderid_c)->find();
			$coepuser->ordernumber = $order->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$order->id.' '.$order->status_c.'</br>';
			$i++;
		}
		echo 'total  orders '.$i;
		die('done');
	}
	
	public function action_checkordercamp2(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP2','=','CAMP 2')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$orderedtests = ORM::factory('orderedtest')->where('customeruserid_c','=',$coepuser->iohid)->find();
			$order = ORM::factory('diagnosticlabsorder')->where('status_c','=','reportsuploaded')->where('id','=',$orderedtests->diagnosticlabsorderid_c)->find();
			$coepuser->ordernumber = $order->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$order->id.' '.$order->status_c.'</br>';
			$i++;
		}
		echo 'total  orders '.$i;
		die('done');
	}
	
	public function action_checkordercamp3(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP3','=','CAMP 3')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$orderedtests = ORM::factory('orderedtest')->where('customeruserid_c','=',$coepuser->iohid)->find();
			$order = ORM::factory('diagnosticlabsorder')->where('status_c','=','reportsuploaded')->where('id','=',$orderedtests->diagnosticlabsorderid_c)->find();
			$coepuser->ordernumber = $order->id;
			$coepuser->save();
			echo $coepuser->iohid.' '.$order->id.' '.$order->status_c.'</br>';
			$i++;
		}
		echo 'total  orders '.$i;
		die('done');
	}
	
	public function action_migratecamp1(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP1','=','CAMP 1')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageorder');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 8;
			$packageorder->orderid_c = $coepuser->ordernumber;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	
	public function action_migratecamp2(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP2','=','CAMP 2')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageorder');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 9;
			$packageorder->orderid_c = $coepuser->ordernumber;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	public function action_migratecamp3(){
		$coepusers = ORM::factory('coepuser')->where('TestStatusForCAMP3','=','CAMP 3')->find_all();
		$i = 0;
		foreach($coepusers as $coepuser){
			$packageorder = ORM::factory('packageorder');
			$packageorder->packageid_c = 2;
			$packageorder->serviceid_c = 2;
			$packageorder->bookingid_c = 10;
			$packageorder->orderid_c = $coepuser->ordernumber;
			$packageorder->save();
			$i++;
		}	
		echo 'total  orders migrated '.$i;
		die('done');		
	}
	public function action_floginwithid(){
		$dependentId = $_GET['id'];
		$objUser= ORM::factory('user')->where('id','=', $dependentId)->find();
		$user   = Auth::instance()->force_login($objUser->username);
		$session= Session::instance();
		Request::current()->redirect('crolechecker/index');
	}
	
	public function action_migratelaborders()
	{
		$patienttestreports = ORM::factory('patienttestreport')->where('refpatreportdiagnosticlaborderid_c','!=',null)->where('fileid_c','=',null)->where('refpatientuserid_c','=',null)->find_all();
	
		foreach($patienttestreports as $patienttestreport){

			$testmaster = ORM::factory('testmaster')->where('id','=',$patienttestreport->refpatreporttestid_c)->find();
			
			if($patienttestreport->testparameters == null){
				$patienttestreport->testparameters='{ "Date" : "'.date('d M y', strtotime($patienttestreport->dateoftest_c)).'" , "testname" :'.$testmaster->testname_c .'"}';
			}
			$file=new helper_Files();
			$order = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$patienttestreport->refpatreportdiagnosticlaborderid_c)->find();
			
			$return=$file->moveToSpecificFolder($order->customeruserid_c,$_SERVER['DOCUMENT_ROOT'].'/'.$patienttestreport->filepath_c,"Documents");
			if($return != ''){
				$patienttestreport->fileid_c=$return['id'];
			}
			$patienttestreport->refpatientuserid_c = $order->customeruserid_c;
			$patienttestreport->save();
		}
	}
	public function action_migrateappointmentorders()
	{
		$archivereports=ORM::factory('archivereport')->find_all();
		
		foreach($archivereports as $archivereport)
		{
				
					$patienttestreports=ORM::factory('patienttestreport');
					$patienttestreports->refappointmentid_c=$archivereport->appid;
					$patienttestreports->dateoftest_c=date('y-m-d', strtotime($archivereport->DateAndTime));
					
					$patienttestreports->testparameters='{ "Date" : "'.date('d M y', strtotime($archivereport->DateAndTime)).'" , "testname" :'.$archivereport->testname .'"}';
					$file=new helper_Files();
					$appointment = ORM::factory('appointment')->where('id','=',$archivereport->appid)->find();
					
					$return=$file->moveToSpecificFolder($appointment->refappfromid_c,$_SERVER['DOCUMENT_ROOT'].'/'.$archivereport->path,"Documents");
					if($return != ''){
						$patienttestreports->fileid_c=$return['id'];
					}
					$patienttestreports->refpatientuserid_c = $appointment->refappfromid_c;
					$patienttestreports->save();
				
		}
		
	}
	public function action_periodicchargesdeduction()
	{
		/*if(php_sapi_name() == 'cli'){
                        $cronid = CLI::options('CRONID');

                }else{
                        $cronid = $_GET['CRONID'];
                }*/
                
                $month = date('m-Y');
                $matchdate = '%-'.$month;
                $objbillingindividualplans =orm::factory('billingindividualplan')->where('status_c','=','active')->where('nextpaymentdate_c','like',$matchdate)->find_all();
                foreach($objbillingindividualplans as $objbillingindividualplan)
                {
                	echo "$objbillingindividualplan->refusersid_c";
                	
                	$obj_user = ORM::factory('user')->where('id','=',$objbillingindividualplan->refusersid_c)->find();
                	if($obj_user->activationstatus_c == 'active')
                	{	echo "here";
                		//get plan charges for active users
                		$objPlanCharges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$objbillingindividualplan->refplanid_c)->find();
                		$subscriptioncharges = $objPlanCharges->subscriptioncharges_c;
                		$periodicity 	= $objPlanCharges->periodicity_c;
                		
                		//check user account have sufficient balance
                		$objAccount=ORM::factory('billingaccount')->where('refaccountuserid_c','=',$objbillingindividualplan->refusersid_c)->find();
                		if($objAccount->netbalance_c >= $subscriptioncharges)
                		{//have sufficient balance
                			echo "balance";
                			$objAccounts = ORM::factory('billingaccount');
					$objAccounts = $objAccounts->where('refaccountuserid_c','=',$objbillingindividualplan->refusersid_c)->find();	
					$array_accounts = Kohana::$config->load('accounts');
					
					//transfer moeny
					$result = transaction::transfer( $objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,1,$subscriptioncharges,5);
		
					if($result['type'] == 'success'){
						$objIndividualPlan =orm::factory('billingindividualplan')->where('id','=',$objbillingindividualplan->id)->find();
						$objIndividualPlan->status_c	 = 'active';
						$objIndividualPlan->updateddate_c = date('Y-m-d g:i:s a');
						$today = strtotime(date('d-m-Y'));
						$periodictime="+".$periodicity." months";
						$date_After_3months = strtotime($periodictime, $today);
						$newdate=date("d-m-Y",$date_After_3months);
						$objIndividualPlan->nextpaymentdate_c = $newdate;
						$objIndividualPlan->save();
						$cron = new helper_cron();
						$cron->writelog($cronid,'SUCCESS','Plan for a user id '.$objbillingindividualplan->refusersid_c.' is subscribed. Rs.'.$subscriptioncharges.' deducted from the user account. ','Subscribed Plan','Subscription of plan');
					}else{                                               
						$cron = new helper_cron();
						$cron->writelog($cronid,'Failed',$result['message'],'Subscribed Plan','Subscription of plan');
					}
                		}
                		else
                		{
                			//user suspend due to insuffient balance
                			$obj_user->activationstatus_c='suspend';
                			$obj_user->save();
                			$objAccount->dueamount_c = $subscriptioncharges;
                			$objAccount->save();
                		}
                	}
                	else
                	{
                		//user is not active
                	}
                }
	}
	
	public function sendperiodicchargesnotfication()
	{
		/*if(php_sapi_name() == 'cli'){
                        $cronid = CLI::options('CRONID');

                }else{
                        $cronid = $_GET['CRONID'];
                }*/	
	}
	public function action_deductperiodiccharges()
	{
		/*if(php_sapi_name() == 'cli'){
                        $cronid = CLI::options('CRONID');
                }else{
                        $cronid = $_GET['CRONID'];
                }*/
		$array_accounts = Kohana::$config->load('accounts');

		$objIndividualPlans = ORM::factory('billingindividualplan')->where('status_c','=','active')->findAll();
		foreach($objIndividualPlans as $objIndividualPlan){
			
			$objPlanCharges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$objIndividualPlan->refplanid_c)->find();
			$subscriptioncharges = $objPlanCharges->subscriptioncharges_c;
			$periodicity 	= $objPlanCharges->periodicity_c;
			$subscriptiondate = ($objIndividualPlan->subscriptiondate_c == null)? $objIndividualPlan->createddate_c : $objIndividualPlan->subscriptiondate_c;
			$today =  date('Y-m-d g:i:s a');
			$diff = abs(strtotime($today) - strtotime($subscriptiondate));
			$months = floor($diff / (30*60*60*24));
			if($months >= $periodicity){
				$objAccounts = ORM::factory('billingaccount');
				$objAccounts = $objAccounts->where('refaccountuserid_c','=',$objIndividualPlan->refusersid_c)->find();	

				$result = $this->transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,$subscriptioncharges,4);
				if($result['type'] == 'success'){
					$objIndividualPlan->subscriptiondate_c = $today;
					$objIndividualPlan->status_c	 = 'active';
					$objIndividualPlan->updateddate_c = $today;	
					$objIndividualPlan->save();
					$cron = new helper_cron();
					$cron->writelog($cronid,'SUCCESS','Plan for a user id '.$objIndividualPlan->refusersid_c.' is subscribed. Rs.'.$subscriptioncharges.' deducted from the user account. ','Subscribed Plan','Subscription of plan');
				}else{
					$objIndividualPlan->expirydate_c = $today;
					$objIndividualPlan->status_c	 = 'expired';
					$objIndividualPlan->updateddate_c = $today;	
					$objIndividualPlan->save();
					$cron = new helper_cron();
					$cron->writelog($cronid,'Failed',$result['message'],'Subscribed Plan','Subscription of plan');
				}
			}
		}		
	}
	
	public function action_doctorbillgenration()
	{
		//bill geration for doctor
		if(php_sapi_name() == 'cli'){
			$cronid = CLI::options('CRONID');
                }else{
                	$cronid = $_GET['CRONID'];
                }
                //check for last day of the month
                $startDate =date("Y-m-01",strtotime("-1 Months"));
                $endDate = date('Y-m-d', strtotime('last day of last month'));
                $objDoctors= ORM::factory('doctor')->join('users')->on('doctor.refdoctorsid_c','=','users.id')->where('users.activationstatus_c','=','active')->find_all();
                ini_set('memory_limit', '-1');
		foreach($objDoctors as $objDoctor)
		{
			$objbillingstatementdetails = ORM::factory('billingstatementdetail')->where('userid_c','=',$objDoctor->refdoctorsid_c)->where('createdon_c','>=',$startDate)->where('createdon_c','<=',$endDate)->find_all();
			
			$tableContent = 
				'<table border="1" style="width:90%;">
					<tr>
						<td style="width:10%;text-align:center;">Sr. No.</td>
						<td style="width:15%;text-align:center;">Date</td>
						<td style="width:35%;text-align:center;">Tranaction Details</td>
						<td style="width:20%;text-align:center;">Amount</td>
						<td style="width:20%;text-align:center;">Net Amount</td>
					</tr>';
			$count= 1;
			foreach($objbillingstatementdetails as $objbillingstatementdetail)
			{
				$objStatements = ORM::factory('billingstatement')->where('id','=',$objbillingstatementdetail->reftransactionid_c)->find();
				$tableContent = $tableContent.'<tr>
						<td style="width:10%;text-align:right;">'.$count.'</td>
						<td style="width:15%;text-align:left;">'.date('d M Y',strtotime($objbillingstatementdetail->createdon_c)).'</td>
						<td style="width:35%;text-align:left;">'.$objStatements->reftransactiontype_c.'</td>
						<td style="width:20%;text-align:right;">'.$objbillingstatementdetail->amount_c.'</td>
						<td style="width:20%;text-align:right;">'.$objStatements->netbalance_c.'</td>
					</tr>';
				$count= $count +1;
			}
			$objUser=ORM::factory('user')->where('id','=',$objDoctor->refdoctorsid_c)->find();
			$tableContent = $tableContent.'</table>';
			$data['lbldate']=date('d M Y h:i', time());
			$data['lblname']="DR. ".$objUser->Firstname_c." ".$objUser->lastname_c;
			$data['lblstartdate']=date('d M Y',strtotime($startDate));
			$data['lblenddate']=date('d M Y',strtotime($endDate));
			$data['imglogo']=DOCROOT.'assets/images/bgtop.png';
			$data['lblstatementtable']=$tableContent;
			$data = json_encode($data);
			$data 	= json_decode($data,true);
			$html 	= new simple_html_dom();
			$html->load_file(DOCROOT."application/views/vtemplates/billingstatementtempalete.php");
			$labels = $html->find('label');
			foreach($labels as $label) {
				if(isset($data[$label->id])){
					$label->innertext  = $data[$label->id];
					$parent = $label->parent;
					if($parent->tag == 'div' && $label->innertext != '')
						$parent->attr['style'] = $parent->attr['style'].';display:block;';
				}
			}
			$images = $html->find('img');
			foreach($images as $image) {
				if(isset($data[$image->id])){
					$image->src  = $data[$image->id];
				}
			}
			$year=date('Y');
			$month=date('m', strtotime('last day of last month'));
			if(!is_dir(DOCROOT."doctorstatement/"))
			{
				mkdir(DOCROOT."doctorstatement/");
				mkdir(DOCROOT."doctorstatement/".$year);
				mkdir(DOCROOT."doctorstatement/".$year."/".$month);
			}
			else
			{
				if(!is_dir(DOCROOT."doctorstatement/".$year))
				{
					mkdir(DOCROOT."doctorstatement/".$year);
					mkdir(DOCROOT."doctorstatement/".$year."/".$month);
				}
				else
				{
					if(!is_dir(DOCROOT."doctorstatement/".$year."/".$month))
					{
						mkdir(DOCROOT."doctorstatement/".$year."/".$month);
					}
				}
			}
			$today=date('d_M_Y');
			$pdfname= $objDoctor->refdoctorsid_c."_".$today;
			$html->save(DOCROOT.'doctorstatement/'.$year.'/'.$month.'/'.$pdfname.'.html');
			$htmlpath=DOCROOT."doctorstatement/".$year."/".$month."/".$pdfname;
			$arr_wk = include(DOCROOT.'application/config/application.php');
			exec($arr_wk['wkhtmltopdfpath'].'  "'.$htmlpath.'.html" "'.$htmlpath.'.pdf"',$op);
			$cron = new helper_cron();
			$month=date('M_Y');
			$result= "successful Doctor bill generation for month ".$month;
			$cron->writelog($cronid,'SUCCESS',$result,'Doctor bill generation','Doctor bill generation');
		}
	}
	
	
	public function action_appointmentrefund()
	{
		try{	
		var_dump('here');die;
		if(php_sapi_name() == 'cli'){
			$cronid = CLI::options('CRONID');
                }else{
                	$cronid = $_GET['CRONID'];
                }
		$today = date('Y-m-d');
		$datetime=date('d M Y H:i A');
		$yesterday = date('Y-m-d',strtotime("-1 days"));
		$objAppointmets=orm::factory('appointment')->where('refappointmentstatusesid_c','=','2')->where('displaytime_c','<',$today)->where('displaytime_c','>',$yesterday);
		//for inclinic appointments online payment
		
		$objInClinicappointments = $objAppointmets->where('consultationmode_c','=','In-clinic')->or_where('consultationmode_c','=','In-Clinic')->find_all();
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
		$objWOnlineAppointments = $objAppointmets->where('consultationmode_c','=','online')->where('appointmenttype_c','=','W')->find_all();
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
		}catch(Exception $e){
			var_dump($e);die;
		}
		
	}
	
	private function transferRefundmoeny($toUserId,$amount,$appid)
	{
		
		$array_accounts = include(DOCROOT.'application/config/accounts.php');
		$obj_appointment = orm::factory('appointment')->where('id','=',$appid)->find();
		$obj_appointment->refappointmentstatusesid_c ='5';
		$objAccounts	=ORM::factory('billingaccount');
		$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$toUserId)->find();
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
	
	
	public function transfer($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		$array_accounts = Kohana::$config->load('accounts');
		try{
			$obj_user = ORM::factory('user')->where('id','=',ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c)->find();

			if (!$obj_user)
				Request::current()->redirect('/home/index.html');
			else{
				$objAccounts = ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
				$netbalance = $objAccounts->netbalance_c;

				if(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["collectionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c == $objAccounts->accountcode_c || ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["provisionaccountuserid"])->find()->accountcode_c == $objAccounts->accountcode_c)
					$netbalance = $amount;

				if($netbalance >= $amount){
					$creditCode = $this->credit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

					$debitCode = $this->debit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype);

					$cr_account 					= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find();
					$creditedamount 				= $cr_account->netbalance_c + $amount;
					$cr_account->netbalance_c 		= $creditedamount;
					$cr_account->creditedamount_c	= $cr_account->creditedamount_c + $amount;
					$cr_account->lastupdateddate_c	= date('Y-m-d g:i:s a');
					$cr_account->lastupdatedby_c 	= $obj_user->id;
					$cr_account->saveRecord();

					$dr_account 					= ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find();
					$debitedamount 					= $dr_account->netbalance_c - $amount;
					$dr_account->netbalance_c 		= $debitedamount;
					$dr_account->debitedamount_c 	= $dr_account->debitedamount_c + $amount;
					$dr_account->lastupdateddate_c	= date('Y-m-d g:i:s a');
					$dr_account->lastupdatedby_c 	= $obj_user->id;
					$dr_account->saveRecord();
					
					$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$creditCode)->mustFind();
					$objStatements->status_c = 'completed';
					$objStatements->saveRecord();

					$objStatements	= ORM::factory('billingstatement')->where('statementcode_c','=',$debitCode)->mustFind();
					$objStatements->status_c = 'completed';
					$objStatements->saveRecord();
					
					$data = array();
					$data['type'] = "success";
					$data['data']['cr_code'] = $creditCode;
					$data['data']['dr_code'] = $debitCode;
					$data['message'] = 'Transaction Completed!';
					return $data;
				}else{
					$data = array();
					$data['type'] ="error";
					$data['message'] = 'insufficientbalance';
					return $data;
				}
			}			
		}catch(Exception $e)
		{
			throw new Exception ($e);
		}
	}
	
	private function debit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		try{
			$obj_user = $obj_user = ORM::factory('user')->where('id','=',ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c)->find();
			$userid = $obj_user->id;

			//debit amount from fromacount
			$objStatements						= ORM::factory('billingstatement');
			$objStatements->statementcode_c		= 'TRA'.$obj_user->id.rand(10000,99999);
			$objStatements->accountcode_c	 	= $fromaccount;
			$objStatements->accountuserid_c	 	= ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c;
			$objStatements->accountcodefrom_c 	= $fromaccount;
			$objStatements->accountcodeto_c 	= $toaccount;
			$objStatements->refpaymentmode_c	= $paymentmode;
			$objStatements->reftransactiontype_c= $transactiontype;
			$objStatements->updateddate_c		= date('Y-m-d H:i:s');
			$objStatements->ammount_c			= $amount;
			$objStatements->debit_c				= $amount;
			$objStatements->cr_dr_type			= 'dr';
			$objStatements->status_c			= 'started';
			$objStatements->updatedby_c			= $userid;
			$objStatements->netbalance_c		= (ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->netbalance_c - $amount);
			$objStatements->saveRecord();
			$objStatements->statementcode_c		= $this->generatestatementcode($objStatements->id);
			$objStatements->saveRecord();
			
			$fromstatementcode = $objStatements->statementcode_c;

			return $fromstatementcode;
		}catch(Exception $e)
		{
			throw new Exception ("Amount is not debited from $fromaccount.Transaction failed.");
		}
	}
	private function credit($fromaccount, $toaccount, $paymentmode, $amount,$transactiontype)
	{
		try{
			$obj_user = $obj_user = ORM::factory('user')->where('id','=',ORM::factory('billingaccount')->where('accountcode_c','=',$fromaccount)->find()->refaccountuserid_c)->find();
			$userid = $obj_user->id;
			// credit amount in toaccount
			$objStatements						= ORM::factory('billingstatement');
			$objStatements->statementcode_c		= 'TRA'.$obj_user->id.rand(100000,999999);
			$objStatements->accountcode_c	 	= $toaccount;
			$objStatements->accountuserid_c	 	= ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->refaccountuserid_c;
			$objStatements->accountcodefrom_c 	= $fromaccount;
			$objStatements->accountcodeto_c 	= $toaccount;
			$objStatements->refpaymentmode_c	= $paymentmode;
			$objStatements->reftransactiontype_c= $transactiontype;
			$objStatements->updateddate_c		= date('Y-m-d H:i:s a');
			$objStatements->ammount_c			= $amount;
			$objStatements->credit_c			= $amount;
			$objStatements->cr_dr_type			= 'cr';
			$objStatements->status_c			= 'started';
			$objStatements->updatedby_c			= $userid;
			$objStatements->netbalance_c		= (ORM::factory('billingaccount')->where('accountcode_c','=',$toaccount)->find()->netbalance_c + $amount);
			$objStatements->saveRecord();
			$objStatements->statementcode_c		= $this->generatestatementcode($objStatements->id);
			$objStatements->saveRecord();
			$tostatementcode = $objStatements->statementcode_c;

			return $tostatementcode;
		}catch(Exception $e)
		{
			throw new Exception ("Amount is not Credited to $toaccount. Transaction failed!!.");
		}
	}
	
	public function generatestatementcode($id)
	{
		$postfix = '';
		for($i=0;$i<(10-strlen($id));$i++)
		{
			$postfix = $postfix.'0';
		}
		$statementcode = 'TRA'.$postfix.$id;
		return $statementcode;
	}
	//to send reminder sms to student every morning 
	public function action_sendremindersmstocoep()
	{
	/*	if(php_sapi_name() == 'cli'){
			$cronid = CLI::options('CRONID');
                }else{
                	$cronid = $_GET['CRONID'];
                }*/
		$today = date('d-m-Y');
		//select all coep student whose appointment is today.
		$objCoepusers=ORM::factory('coepuser')->where('date_c','=','23-08-2014')->where('file','=','false')->find_all();
		
		
		foreach($objCoepusers as $objCoepuser)
		{
			if($objCoepuser->iohid != '')//if ioh id is null then do not send sms.
			{
				echo $objCoepuser->iohid.' </br>';
				$notification=  array();
				$notification['id']=$objCoepuser->iohid;
				$notification['template']='coep_student_reminder';
				$notification['sms']='true';
				$notification['email']='true'; 
				$notification['date']=$objCoepuser->date_c;
				$notification['time']=$objCoepuser->time_c;
				$notification['venue']= 'Main building';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
				$objCoepuser->file = 'true';
				$objCoepuser->save();
			}
		}
		//$cron = new helper_cron();
		//$cron->writelog($cronid,'SUCCESS','successful reminder sms for date '.$today,'reminder sms for coep student','send reminder sms for coep student');
		echo 'done';
	}
	public function action_sendusernameupdates()
	{
		$objCoepusers=ORM::factory('coepuser')->where('sms','=','send')->find_all();	
		foreach($objCoepusers as $objCoepuser)
		{
			if($objCoepuser->iohid != '')//if ioh id is null then do not send sms.
			{
				$notification=  array();
				$notification['id']=$objCoepuser->iohid;
				$notification['template']='coep_username_reset';
				$notification['sms']='true';
				$notification['email']='true'; 
				$notification['mis']=ORM::factory('user')->where('id','=',$objCoepuser->iohid)->find()->username;
				echo $objCoepuser->iohid.' '.$notification['mis'].'</br>';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
			}
		}
		echo 'done';
	}
	public function action_sendappdateandtime()
	{
		$objCoepusers=ORM::factory('coepuser')->where('date_c','=','23-08-2014')->where('file','=','true')->find_all();	
		$count = 0;
		foreach($objCoepusers as $objCoepuser)
		{
			if($objCoepuser->iohid != '')//if ioh id is null then do not send sms.
			{
				$notification=  array();
				$notification['id']=$objCoepuser->iohid;
				$notification['template']='notifyappointmenttime';
				$notification['sms']='true';
				$notification['email']='true'; 
				$notification['date']=$objCoepuser->date_c;
				$notification['time']=$objCoepuser->time_c;
				$notification['name']=$objCoepuser->firstname;
				$notification['venue'] = 'CoEP Main Building, Ground Floor';
				$objCoepuser->file='false';
				$objCoepuser->save();	
				echo $objCoepuser->iohid.'</br>';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
				$count =$count +1;
			}
		}
		echo 'done....'.$count;
	}
	public function action_sendusernamereset()
	{
		$objCoepusers=ORM::factory('coepuser')->where('year','=','test')->find_all();	
		foreach($objCoepusers as $objCoepuser)
		{	
			if($objCoepuser->iohid != '')//if ioh id is null then do not send sms.
			{
				$notification=  array();
				$notification['id']=$objCoepuser->iohid;
				$notification['template']='coep_username_change';
				$notification['sms']='true';
				$notification['email']='true'; 
				$notification['mis']=ORM::factory('user')->where('id','=',$objCoepuser->iohid)->find()->username;
				echo $objCoepuser->iohid.' '.$notification['mis'].'</br>';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
			}
		}
		echo 'done';
	}
	public function action_sendregistrationinfo()
	{
		$objCoepusers=ORM::factory('coepuser')->where('year','=','nomis')->find_all();
		$count = 0;	
		foreach($objCoepusers as $objCoepuser)
		{	
			if($objCoepuser->iohid != '')//if ioh id is null then do not send sms.
			{
				$notification=  array();
				$notification['id']=$objCoepuser->iohid;
				$notification['template']='registrationinfo';
				$notification['name']=$objCoepuser->firstname;
				$notification['username']='coep'.$objCoepuser->username; 
				$notification['password']=$objCoepuser->password; 
				$notification['place']= 'CoEP';
				$notification['sms'] = 'true';
				$notification['email'] = 'true';
				//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
				$count++;
			}
		}
		echo 'done '.$count;
	}
	public function action_datauploadalert()
	{
		$iohids = array();
		foreach($iohids as $iohid)
		{	
			$notification=  array();
			$notification['id']=$iohid;
			$notification['template']='datauploadalert';
			$notification['name']=ORM::factory('user')->where('id','=',$iohid)->find()->Firstname_c;
			$notification['organizationhead']='Prof. S. L. Patil (Instru.)';
			
			$notification['sms'] = 'true';
			$notification['email'] = 'true';
			$notificationsender = new helper_notificationsender();
			$notificationsender->sendnotification($notification);
		}
		echo 'done ';
	}
	public function action_exportorderdata()
	{
		$date = date_create();
		$filename = 'Orderdata_'.date_timestamp_get($date).'.xml';
		$path = 'temp/'.$filename;
		$array_template = Kohana::$config->load('orderdatatemplate');
		
		$objCoepusers=ORM::factory('coepuser')->find_all();
		$content = array();
		$resultdata = array();
		$countorders = 0;
		$countexports = 0;
		echo count($objCoepusers);
		foreach($objCoepusers as $objCoepuser)
		{
			if(($objCoepuser->iohid != '') || ($objCoepuser->iohid != null)){
				if($objCoepuser->ordernumber == 'new' ){
					$userid = $objCoepuser->iohid;
					if( ORM::factory('orderedtest')->where('customeruserid_c','=',$userid)->find()->id != null){
						echo 'order for coep'.$objCoepuser->username.' exists !!</br>';
						//continue;
					}
					
					$objOrders = ORM::factory('Diagnosticlabsorder');
					$today = date('Y-m-d g:i:s a');
					$objOrders->orderdate_c = $today;
					$objOrders->status_c = 'requested';
					$objOrders->refdiaglabsorderspathologistsid_c = '38';
					$objOrders->updatestatusdate_c = $today;
					$objOrders->rate_c = '0';
					$objOrders->paid_c= 1;
					$objOrders->save();
					$orderid = $objOrders->id;//get order id 
					
					//place record in orderedtest table
					$objordertest = ORM::factory('orderedtest');
					$objordertest->customeruserid_c = $userid;
					$objordertest->testid_c = '2562';
					$objordertest->diagnosticlabsorderid_c = $orderid;
					$objordertest->rate_c='0';
					$objordertest->save();

					$objCoepuser->ordernumber = $orderid;
					$objCoepuser->save();
					$countorders++;
				}
				
				if($objCoepuser->ordernumber != 'new' ){
					$iohid = $objCoepuser->iohid ;
					$patientaddress= 'College of Engineering Pune, Bombay Pune Road, Shivajinagar, Near Sancheti Hospital, Pune';
					$patientcity= "Pune";
					$patientstate= "MH";
					$patientpostalcode= "411005" ;
					$patientcountry= "India";
					
					$telephone= "";
					$mobilenumber= $objCoepuser->MobileNumber;
					$name= $objCoepuser->firstname;
					$lastname= '' ;
					
					$gendercode= $objCoepuser->gender;
					$dob= $objCoepuser->DOB;


					$birthDate = str_replace('-','/',$dob);
		                        $birthDate = explode("/", $birthDate);
                		        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));

					$type= 'Y';
					
					$birthstate= "";
					$birthpostalcode= "";
					$birthcountry= "";
					
					$ordernumber= $objCoepuser->ordernumber."_".$objCoepuser->username;
					$referringdoctor= "";
					$campname= "CoEP CAMP 2 (Staff)";
					$testcode= 'AYU01';
					$testname= 'COEP Student Profile';
					$sellingprice= '370';
					$medicalhistory= 'Not provided';
					
					$str = $array_template["orderdatatemplate"];
					$str = str_replace('$iohid',$iohid,$str);
					$str = str_replace('$patientaddress',$patientaddress,$str);
					$str =str_replace('$patientcity',$patientcity,$str);
					$str =str_replace('$patientstate',$patientstate,$str);
					$str =str_replace('$patientpostalcode',$patientpostalcode,$str);
					$str =str_replace('$patientcountry',$patientcountry,$str);
					$str =str_replace('$telephone',$telephone,$str);
					$str =str_replace('$mobilenumber',$mobilenumber,$str);
					$str =str_replace('$name',$name,$str);
					$str =str_replace('$lastname',$lastname,$str);
					
					$str =str_replace('$gendercode',$gendercode,$str);
					$str =str_replace('$dob',$dob,$str);
					$str =str_replace('$age',$age,$str);
					$str =str_replace('$type',$type,$str);
					$str =str_replace('$birthstate',$birthstate,$str);
					$str =str_replace('$birthcountry',$birthcountry,$str);
					$str =str_replace('$birthpostalcode',$birthpostalcode,$str);
					$str =str_replace('$ordernumber',$ordernumber,$str);
					$str =str_replace('$referringdoctor',$referringdoctor,$str);
					$str =str_replace('$campname',$campname,$str);
					$str =str_replace('$testcode',$testcode,$str);
					$str =str_replace('$testname',$testname,$str);
					$str =str_replace('$sellingprice',$sellingprice,$str);
					$str =str_replace('$medicalhistory',$medicalhistory,$str);
					
					file_put_contents('/var/www/owncloud/data/admin/files/clientsync/laborders/orders/'.$ordernumber.".xml", $str);
					
					 array_push($content,$str);
					
					 $data = array();
					 array_push($data,$iohid);
					 array_push($data,$patientaddress);
					 array_push($data,$patientcity);
					 array_push($data,$patientstate);
					 array_push($data,$patientpostalcode);
					 array_push($data,$patientcountry);
					 array_push($data,$telephone);
					 array_push($data,$mobilenumber);
					 array_push($data,$name);
					 array_push($data,$gendercode);
					 array_push($data,$dob);
					 array_push($data,$age);
					 array_push($data,$type);
					 array_push($data,$birthstate);
					 array_push($data,$birthcountry);
					 array_push($data,$birthpostalcode);
					 array_push($data,$ordernumber);
					 array_push($data,$referringdoctor);
					 array_push($data,$campname);
					 array_push($data,$testcode);
					 array_push($data,$testname);
					 array_push($data,$sellingprice);
					 array_push($data,$medicalhistory);
					 array_push($resultdata,$data);
					$countexports++;
				}else{
				
				}
			}else{

			}
		}
		 $str = '';
		 foreach($content as $data){
			 $str .= $data;
		 }
		// header("Content-Disposition: attachment; filename=".$filename."");   
		 //header("Content-Type: application/octet-stream");
		 //header("Content-Type: application/download");
		 //header("Content-Description: File Transfer");  
		echo 'Done';
		die;
	}
	
	public function action_uploadorder(){
		$count = 0;
		$initialpath = '/var/www/owncloud/data/admin/files/clientsync/laborders/reports/';
		foreach(glob($initialpath.'*.pdf') as $filename){
			$filepath = $filename;
			$file = explode('/',$filename);
			$length = count($file);
			$filename = $file[$length - 1];
			$file = explode('_',$filename);
			$ordernumber = $file[0];
			$mis = $file[1];
			
			$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$ordernumber)->find();	
			$objorderedtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$ordernumber)->find();	
			$count = $count+1;
			
			if($objorders->status_c != 'reportsuploaded'){
				if(!is_dir(DOCROOT."reports/".$objorderedtests->customeruserid_c))
					mkdir(DOCROOT."reports/".$objorderedtests->customeruserid_c);
				if(!is_dir(DOCROOT."reports/".$objorderedtests->customeruserid_c."/order_".$ordernumber))
					mkdir(DOCROOT."reports/".$objorderedtests->customeruserid_c."/order_".$ordernumber);
				
				if (!copy($filepath, DOCROOT."reports/".$objorderedtests->customeruserid_c."/order_".$ordernumber.'/'.$filename)) {
					echo "failed to copy $filepath...\n<br/>";
				}else{
					$objtestreport = new Model_Patienttestreport;
					$objtestreport->refpatreportdiagnosticlaborderid_c	= $ordernumber;
					$objtestreport->refpatreporttestid_c				= $objorderedtests->testid_c;
					$objtestreport->dateoftest_c						= date("Y-m-d") ;
					$objtestreport->refpatreportpathologistsid_c		= $objorders->refdiaglabsorderspathologistsid_c;
					$objtestreport->filepath_c							= "ayushman/reports/".$objorderedtests->customeruserid_c."/order_".$ordernumber.'/'.$filename;
					$objtestreport->filename_c							= $filename;
					$objtestreport->save();
					
					$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$ordernumber)->find();	
					$objorders->status_c = 'reportsuploaded';
					$objorders->saveRecord();

					/*$notification=  array();
					$notification['id']=$objorderedtests->customeruserid_c;
					$notification['template']='pathologist_order_uploaded';
					$notification['sms']='true'; 
					$notification['orderId']=$ordernumber; 
					$notification['labname']= "Golwilkar`s Metropolis";
					$notificationsender = new helper_notificationsender();
					$notificationsender->sendnotification($notification);*/
					echo $objorderedtests->customeruserid_c.' '.$ordernumber.' uploaded.<br/>';
				}
			}
		}
		echo 'Done..'.$count;
		die;
	}
	public function action_parseorderxml(){
		$count = 0;
		$initialpath = '/var/www/owncloud/data/admin/files/clientsync/laborders/reports/';
		$excel = array();
		$arrHeader = array();
		array_push($arrHeader, 'Order Number');
		array_push($arrHeader, 'Emp Id');
		array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');
		array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');array_push($arrHeader, 'Test');
		array_push($arrHeader, 'Result');
		array_push($arrHeader, 'Biological Ref.');
		array_push($arrHeader, 'Signal');
		
		array_push($excel,$arrHeader);
		
		foreach(glob($initialpath.'*.XML') as $filename){
			$filepath = $filename;
			$file = explode('/',$filename);
			$length = count($file);
			
			$filename = $file[$length - 1];
			$file = explode('_',$filename);
			$ordernumber = $file[0];
			$mis = $file[1];
			
			$arrOrder = array();
			array_push($arrOrder,$ordernumber);
			array_push($arrOrder,$mis);
			$count = $count+1;
			
			$obj_import = new helper_Import();
			$data = $obj_import->xml($filepath);
	
			$results = $data['Result'];
			foreach($results as $result){
				array_push($arrOrder,strip_tags($result->Test->asXML()));
				array_push($arrOrder,strip_tags($result->RESULT->asXML()));
				array_push($arrOrder,strip_tags($result->BiologicalRefInterval->asXML()));
				array_push($arrOrder,strip_tags($result->Signal->asXML()));
			}
			array_push($excel,$arrOrder);
		}
		$date = date_create();
		export::toexcel($excel,'Orders_'.date_timestamp_get($date).'.xls');
		die;
	}
	public function action_parseorderstatusxml(){
		$count = 0;
		$initialpath = '/var/www/owncloud/data/admin/files/clientsync/laborders/orders/statuses/';
		$excel = array();
		$arrHeader = array();
		array_push($arrHeader, 'Order Number');
		array_push($arrHeader, 'Status');
		array_push($arrHeader, 'Info');
		array_push($arrHeader, 'Upload Status');
		array_push($excel,$arrHeader);
		
		foreach(glob($initialpath.'*.xml') as $filename){
			$filepath = $filename;
			$file = explode('/',$filename);
			$length = count($file);
			
			$filename = $file[$length - 1];
			$file = explode('_',$filename);
			$ordernumber = $file[0];
			$mis = $file[1];
			
			$arrOrder = array();
			array_push($arrOrder,$ordernumber);
			$count = $count+1;
			
			$obj_import = new helper_Import();
			$data = $obj_import->xml($filepath);
	
			$statuscode = $data['inFulfillmentOf']['orderinfo']['status']['code'] == null ?' ':  $data['inFulfillmentOf']['orderinfo']['status']['code'];
			$statusinfo = $data['inFulfillmentOf']['orderinfo']['status']['info'] == null ? ' ': $data['inFulfillmentOf']['orderinfo']['status']['info'];
			
			$objorder = ORM::factory('diagnosticlabsorder')->where('id','=',$ordernumber)->find();
			array_push($arrOrder,$statuscode);
			array_push($arrOrder,$statusinfo);
			
			if($objorder->id != null){
				if($statuscode == 'accepted'){
					$objorder->deliverydate_c = '';
					$objorder->status_c = 'accepted'; 
					$objorder->update();
				}else if($statuscode = 'rejected'){
					$objorder->rejectreason_c = $statusinfo;
					$objorder->status_c = 'rejected'; 
					$objorder->update();
				}
				array_push($arrOrder, 'Updated On IOH');
			}else{
				array_push($arrOrder, 'Order number Does not exist in the system');
			}
			array_push($excel,$arrOrder);
		}
		$date = date_create();
		export::toexcel($excel,'Orders_'.date_timestamp_get($date).'.xls');
		die;
	}
	public function action_sendingusagesummary()
	{
		$objCorporates =  ORM::factory('corporate')->find_all();	
		foreach($objCorporates as $objCorporate){
			if($objCorporate->refusersid_c == null){
				continue;
			}
			$errors = array();
			$messages = array();
			$type 	= 'lastmonth';
			$corporateuserid = $objCorporate->refusersid_c;
			$doctorid = 'All';
			$date 	= '';
			if($type == 'lastmonth'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 months");
			}
			if($type == 'last2months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-2 months");
			}
			if($type == 'last3months'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-3 months");
			}
			if($type == 'lastyear'){
				$duration['to'] = strtotime(date('Y-m-d'). "+1 days");
				$duration['from'] = strtotime(date('Y-m-d'). "-1 year");
				
			}
			$from 	= $duration['from'];
			$to		= $duration['to'];
			if($type == 'AllBetween'){
				$duration['to'] = strtotime($to. "+1 days");
				$duration['from'] = strtotime($from);
			}	
			
			$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->find_all()->as_array();
			$count_doctor = array();
			foreach($totalappointments as $totalapp){
				array_push($count_doctor,$totalapp->doctorid);
			}
			$count_doctor = array_unique($count_doctor);
			$numbers  = array();
			$numbers['doctorcount'] = count($count_doctor);
			$numbers['doctorids'] = $count_doctor;
			
			$totalappointments = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appstaken'] = $totalappointments;
			
			$appscompleted = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('status','=','1')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['appscompleted'] = $appscompleted;
			
			$noshowapps = ORM::factory('appnumbersfordoctor')->where('corporateid','=',$objCorporate->id)->where('status','=','5')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
			$numbers['noshowapps'] = $noshowapps;
			
			$objaddress =  ORM::factory('Address')->where("id","=",$objCorporate->refaddressid_c )->find();
			
			
			$data = array();
			$data['lblcorporatename'] = $objCorporate->corporatename_c;
			$data['lbladdress'] = $objaddress->line1_c.", ".$objaddress->nearlandmark_c.", ".$objaddress->location_c.",<br> ".$objaddress->city_c." - ".$objaddress->pin_c." (".$objaddress->state_c.", ".$objaddress->country_c.").";;
		
			$data['lblcontactnumber'] =  $objCorporate->contactpersonname_c .'<br> Mob. No. -'. $objCorporate->contactpersonmobno_c.'<br> Email Id -'. $objCorporate->contactpersonemailid_c.'<br> Off. No. -'. $objCorporate->contactpersonoffphoneno_c;
			$data['lbldate'] = $from.' - '.$to;
			$data['lbltodaydate'] = '<br>Date : '.date('d M Y h:i A');
			$data['lblnumberofdoctors'] = $numbers['doctorcount'];
			$data['lblnumbertotalapps'] = $numbers['appstaken'];
			$data['lblnumberappscompleted'] =  $numbers['appscompleted'];
			$data['lblnumberofnoshow'] = $numbers['noshowapps'];
			
			$message = 'No one has used the system for selected duration';
			
			
			$doctorsHTML =  '<div width="100%" height="170px" style="white-space: wrap;">';
			$doctors = $numbers['doctorids'];
			if(count($doctors) == 0){
				
				$doctorsHTML = $doctorsHTML.'<div style="width:720px; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold" >'.$message.'</div>';
			}else{
				foreach($doctors as $doctorid)
				{
				
					$userid = ORM::factory('doctor')->where('id','=',$doctorid)->find()->refdoctorsid_c;
					$doctorlist= Request::factory('cdoctorreportcomponent/view');
					$doctorlist->post("height",'25');
					$doctorlist->post("width",'800');
					$doctorlist->post("from",$duration['from']);
					$doctorlist->post("to",$duration['to']);
					$doctorlist->post("doctorUserId",$userid);
					$doctorlist->post("doctorid",$doctorid);
					$doctorlist->post("corporateuserid",$corporateuserid);
					$doctorsHTML = $doctorsHTML.$doctorlist->execute(); 
				}
			}
			
			$doctorsHTML = $doctorsHTML.'</div>';
			
			$data['lbldoctors'] = $doctorsHTML;
			
			$datestring = htmlspecialchars(date ("dmYHis"), ENT_QUOTES);
			$name = 'corporatereport_'.$datestring;
			$path = export::topdf($data,$name,'vcorporatereport.php');
			$notification=  array();
			$notification['id']=$corporateuserid;
			$notification['template']='usagesummary';
			$notification['email']='true'; 
			$notification['attachment']='true'; 
			$notification['name']= $data['lblcorporatename']; 
			$notification["attachmentpath"] = DOCROOT.$path;
			$notificationsender = new helper_notificationsender();
			$var = $notificationsender->sendnotification($notification);
		}
		die;
	}
	public function action_backupdatabase()
	{
		try{
		echo 'step 1';
		$array_db = Kohana::$config->load('database');
		echo 'step 2';
		$array_path = Kohana::$config->load('application');
		echo 'step 3';
		$username = $array_db['default']['connection']['username'];
		$password = $array_db['default']['connection']['password'];
		$database = $array_db['default']['connection']['database'];
		echo 'step 4';
		$bk_path = $array_path['databasebackup'];
		$date = date_create();
		$date = date('Y_m_d_H_i');
		$op = 'done';
		
		echo 'mysqldump --user="'.$username.'" --password="'.$password.'" --routines  '.$database.' > '.$bk_path.$database.'_'.$date.'.sql'; 
		//die;
		exec('mysqldump --user="'.$username.'" --password="'.$password.'" --routines  '.$database.' > '.$bk_path.$database.'_'.$date.'.sql',$op);
		var_dump($op);
		die;
		}catch(Exception $ex){
		var_dump($ex);die;
		}
	}
	public function action_createserviceadmin()
	{
		$this->create_user(array(0,$_GET['fname'],$_GET['lname']),'serviceadmin');

		die;
	}
	public function action_createcorporateadmin()
	{
		$this->create_user(array(0,$_GET['fname'],$_GET['lname']),'corporate');

		die;
	}	
	private function create_user($record,$rolename){
		$password = md5(uniqid(rand()));//create 6 chara password
		$password = substr($password,-8);
		$initialusername = strtolower($this->clean(($record[1])).$this->clean(($record[2])));
		$initialusername = substr($initialusername,0,25);
		$username = $initialusername;
		$userCount = 0;
		while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
		  $userCount++;
		  $username = $initialusername . $userCount;
		}
		$arrPost['username']= $username;
		$arrPost['password']= $password;
		$arrPost['password_confirm'] = $password;
		$activationcode	=  md5(uniqid(rand(), true));
		$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
		$user->add('roles', ORM::factory('role', array('name' => 'login')));
		$user->add('roles', ORM::factory('role', array('name' => $rolename)));
		$user->Firstname_c	= trim($record[1]);
		$user->lastname_c 	= trim($record[2]);
		$user->activationcode_c	= $activationcode;
		$user->activationstatus_c	= 'active';
		$user->accountcreatedby_c ="script";
		$user->xmpppassword_c = $user->password ;
		$obj_patient=ORM::factory($rolename);
		$obj_patient->refusersid_c = $user->id;
		$obj_patient->save();				
		$user->save();
		
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$user->id)->find();
		if($objAccounts->id == '')
		{
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts->accountcode_c 		= 'IOH'.$user->id.rand(10000,99999);
			$objAccounts->refaccountuserid_c 	= $user->id;
			$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
			$objAccounts->debitedamount_c 		= 0;
			$objAccounts->creditedamount_c 		= 0;
			$objAccounts->netbalance_c	 		= 0;
			$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
			$objAccounts->lastupdatedby_c 		= $user->id;
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
		
		echo 'Username : ' . $username.'</br>';
		echo 'Password : ' . $password.'</br>';
		echo 'IOH Id : ' . $user->id.'</br>';
		return 1;
  }
  private function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
  }

	public function action_getparameters(){
		$parameters = ORM::factory('patienttestreport')->where('testparameters','!=',null)->where('createdon_c','like','2014-09-30%')->or_where('createdon_c','like','2014-10-%')->where('refpatreporttestid_c','=','2562')->find_all();
		echo 'St John College, Palghar.  Camp -29 Sept 2014 and 30 Sept 2014 </br></br> Total Number of reports uploaded : '.count($parameters).'</br></br>';
		
		echo '<TABLE >';
		$abnormalCount = 0;
		echo "<style>
					tr.border_bottom td {
						border-bottom:1pt solid black;
					}
				</style>
				<tr class='border_bottom'><td width='30%' valign='top'>Name, Age & IOH ID </td><td width='70%'>Results </br>(Abnormal values are highlighted)</td>";
		foreach($parameters as $parameter){
			$userid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$parameter->refpatreportdiagnosticlaborderid_c)->find()->customeruserid_c; 
			$user = ORM::factory('user')->where('id','=',$userid)->find();
			
			$age = date_diff(date_create($user->DOB_c), date_create('today'))->y;
			
			
			echo	"<tr class='border_bottom'><td width='30%' valign='top'>".$user->Firstname_c.' '.$user->middlename_c.' '.$user->lastname_c.' (Age : '.$age.' yrs.)</br>IOH Id : '.$user->id."</td>
				<td width='70%'><table>
				";
			$arrs = json_decode($parameter->testparameters);
			$isabnormal = false;
			try{
				foreach($arrs->PARAMETER as $parameter){
					if($parameter->ABNORMAL == 'Y'){
						$isabnormal = TRUE;
						break;
					}
				}
			}catch(Exception $e){
				continue;
			}
			
			if($isabnormal){
				$abnormalCount++;
				foreach($arrs->PARAMETER as $parameter){
					if($parameter->ABNORMAL == 'Y'){
						echo '<tr bgcolor="#F8C0C0" class="border_bottom">';
						echo "<td>".$parameter->NAME."</td>";
						echo "<td>".$parameter->OBSERVEDVALUE."</td>";
						echo "<td>".$parameter->BIOLOGICALREFERENCE."</td>";
						echo "<td>".$parameter->ABNORMAL."</td>";
						echo '</tr>';

					}else{
						echo '<tr class="border_bottom">';
						echo "<td>".$parameter->NAME."</td>";
						echo "<td>".$parameter->OBSERVEDVALUE."</td>";
						echo "<td>".$parameter->BIOLOGICALREFERENCE."</td>";
						echo "<td>".$parameter->ABNORMAL."</td>";
						echo '</tr>';
					}
				}
			}else{
				echo '<tr class="border_bottom">';
					echo "<td colspan='4'>Normal</td>";
					echo '</tr>';
			}
			echo '</TABLE></td></tr>';
		}
		echo '</table>';
		echo 'Total Cases - '.count($parameters);
		echo '</br>Total Abnormal Cases - '.$abnormalCount;
		die;
	}
	public function action_exportparameters(){
		try{
		$packageorders = ORM::factory('packageorder')->where('bookingid_c','=',$_GET['ids'])->find_all();
		//$packageorders =  ORM::factory('patienttestreport')->where('createdon_c','like','2014-09-26%')->where('refpatreporttestid_c','=','2562')->find_all()->as_array();

		$arr_export = array();
		foreach($packageorders as $packageorder){
			$parameter = ORM::factory('patienttestreport')->where('refpatreportdiagnosticlaborderid_c','=',$packageorder->orderid_c)->find()->as_array();
			$array_temp = array();
			$userid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$parameter['refpatreportdiagnosticlaborderid_c'])->find()->customeruserid_c; 
			$user = ORM::factory('user')->where('id','=',$userid)->find();
			array_push($array_temp,$user->id);
			
			$age = date_diff(date_create($user->DOB_c), date_create('today'))->y;
			
			array_push($array_temp,$user->Firstname_c.' '.$user->middlename_c.' '.$user->lastname_c);
			array_push($array_temp,$age.' Yrs.');
			$arrs = json_decode($parameter['testparameters']);
			if(isset($arrs->PARAMETER)){
				foreach($arrs->PARAMETER as $parameter){
					foreach($parameter as $key=>$value){
						array_push($array_temp,$value);
					}
				}
				array_push($arr_export,$array_temp);
			}
			
		}
		$export = new Export();
		$export::toexcel($arr_export,'file.xls');
		//var_dump($arr_export);
		die;
		}catch(Exception $e){
			var_dump($e);die;
		}
	}
 
	public function action_generatePrescriptionPdf(){
		$snapshots = ORM::factory('patientprescriptionsnapshot')->find_all();
		
		foreach($snapshots as $snapshot){
			$html = "";
			$prescriptionsnapshots = ORM::factory('patientprescriptionfilessnapshot')->where('refpatientprescriptionsnapshotsid','=',$snapshot->id)->order_by('pagenumber_c','asc')->find_all();
			foreach($prescriptionsnapshots as $prescriptionsnapshot){
				$html = $html."<img src='"."http://localhost/".$prescriptionsnapshot->path_c."'/>";
				$prescriptionsnapshot->delete();
			}
		
			$objHtml 	= new simple_html_dom();
			$objHtml->load($html);
		
			$files = new helper_Files();
			$return = $files->savePdfFile($objHtml);
			$response_savepdf = $this->savepdf($return["filename"],$snapshot->refappointmentidforprescriptionsnapshots_c,$return["id"]);
			$return = $files->getFilePath($return['id']);
			
			$snapshot->pdfpath_c = $return['abspath'];
			$snapshot->save();
		}
	} 
	public function savepdf($name,$appid,$id)
	{
		$strname	= $name;
		$intAppId	= $appid;

		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$intAppId)->find();
	
		$objfile->refappuploadappointmentsid_c = $intAppId;
		$objfile->uploadedfile_c = $strname;
		$objfile->fileid_c = $id;
		$objfile->save();
		return ($strname);
	}
 }
