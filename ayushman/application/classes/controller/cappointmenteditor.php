<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/catjob.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cappointmenteditor extends Controller {
	public function action_cancelappointment()
	{
    			$returnArray = $this->cancel_appointment($_GET["appid"],$_GET["role"],$_GET['representative']);
		    	die(json_encode($returnArray));
	}

  private function cancel_appointment($appointmentid,$role,$representive){
    try{
			$obj_user = Auth::instance()->get_user();
			if($obj_user != false)
			{
				if($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
					$appointment = ORM::factory('appointment')->where('id','=',$appointmentid)->where('refappfromid_c','=',$obj_user->id)->find();
					if($appointment->id == null){
						echo 'Access denied';die;
					}
					$role = 'patient';
				}else if($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
					$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$obj_user->id)->find();
					$appointment = ORM::factory('appointment')->where('id','=',$appointmentid)->where('refappwithid_c','=',$doctor->id)->find();
					if($appointment->id == null){
						echo 'Access denied';die;
					}
					$role = 'doctor';
				}else if($obj_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
					$staff = ORM::factory('staff')->where('refstaffuserid_c','=',$obj_user->id)->find();
					$doctors = ORM::factory('favoritestaffbydoctor')->where('reffavstaffid','=',$staff->id)->find_all()->as_array();
					$doctorids = array();
					foreach($doctors as $doctor){
						array_push($doctorids,$doctor->reffavdoctorid);
					}
					if(count($doctorids) == 0){
						echo 'Access denied';die;
					}
					$appointment = ORM::factory('appointment')->where('id','=',$appointmentid)->where('refappwithid_c','in',$doctorids)->find();
					if($appointment->id == null){
						echo 'Access denied';die;
					}
				}else{
					echo 'Access denied';die;
				}
			}else{
				echo 'Access denied';die;
			}
			
			$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
			$obj_appointments = ORM::factory('appointment')//create appointment object
							->where('id','=',$appointmentid)
							->find();
			$planid = ORM::factory('billingindividualplan')->where('refusersid_c','=', $obj_appointments->refappfromid_c)->where('status_c','=', 'active')->find()->refplanid_c;

			$array_taxes = Kohana::$config->load('taxes');
			if($obj_appointments->refappointmentstatusesid_c== 2)//check for app is schedule state or not
			{
				
				$obj_appointments->refappointmentstatusesid_c='3';
				$calendars_data_id=$obj_appointments->refappcaldataid_c;
				$appointmentMode = $obj_appointments->consultationmode_c;
				$obj_appointments->refappcaldataid_c="0";
				$obj_appointments->save();
		
				$obj_appointment_calendars_data= new Model_appointmentcalendarsdata;
				$obj_appointment_calendars_data->where('id','=',$calendars_data_id);
				foreach($obj_appointment_calendars_data->find_all() as $res)
				{
					$res->delete();
				}		
				$obj_appointment_calendars_data ->save();
				$time = strtotime($obj_appointments->scheduledstarttime_c);
				$date1 = date( 'd M Y', $time ); 
				$time1 = date( 'H:i', $time );
				$objuserfornotfication="";
				$objAccounts	=ORM::factory('billingaccount');
				$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_appointments->refappfromid_c)->find();
				if($role=="patient")//if role is patient then notification send to doctor.Create doctor object
				{
					//transfer money to patient account from ayushman account
					if($obj_appointments->paid_c == 1){
						$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, $obj_appointments->rate_c,21);
         				$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, ($obj_appointments->rate_c * $array_taxes['doctorservicetax']/100) ,14);
						$return = transaction::savedetails($result,$planid,$obj_appointments->rate_c,orm::factory('doctor')->where('id','=',$obj_appointments->refappwithid_c)->find()->refdoctorsid_c,$obj_appointments->refappfromid_c,($obj_appointments->rate_c * $array_taxes['doctorservicetax']/100),$array_taxes['doctorservicetax'],$servicetaxresult);
						
						$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, $obj_appointments->usagecharges_c,10);
         				$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, ($obj_appointments->usagecharges_c * $array_taxes['servicetax']/100) ,20);
						$return = transaction::savedetails($result,$planid,$obj_appointments->usagecharges_c,orm::factory('doctor')->where('id','=',$obj_appointments->refappwithid_c)->find()->refdoctorsid_c,$obj_appointments->refappfromid_c,($obj_appointments->usagecharges_c * $array_taxes['servicetax']/100),$array_taxes['servicetax'],$servicetaxresult);

						if($return != 'success'){
							throw new exception($return);
						}
					}
					$objuserfornotfication = ORM::factory('user')
						->join('doctors')
						->on('user.id','=','doctors.refdoctorsid_c')
						->where('doctors.id','=',$obj_appointments->refappwithid_c)
						->find();
					$patientfullname=trim($obj_user->Firstname_c)." ".trim($obj_user->lastname_c);
					$drname=trim($objuserfornotfication->Firstname_c);
					$notificationToDoctor=  array();
					//send email to doctor 
					$notificationToDoctor['id']=$objuserfornotfication->id;$notificationToDoctor['template']='appointmentcancel_bypatient';$notificationToDoctor['email']='true'; $notificationToDoctor['drname']=$drname;$notificationToDoctor['patientfullname']=$patientfullname;$notificationToDoctor['appointmentdate']=$date1;$notificationToDoctor['appointmenttime']=$time1;
					helper_notificationsender::sendnotification($notificationToDoctor);
					//send sms to patient
					$notification=  array();
					$notification['id']=$obj_appointments->refappfromid_c;$notification['template']='appointmentcancel_bypatient';$notification['sms']='true'; $notification['drname']=$drname;$notification['mode']=$appointmentMode;$notification['appointmentdate']=$date1;$notification['appointmenttime']=$time1;
				}
				else if($role=="doctor")//if role is doctor then notification send to patient.Create patient object
				{
					//transfer money to patient account from ayushman account
					if($obj_appointments->paid_c == 1){

						$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, $obj_appointments->rate_c,21);
         				$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, ($obj_appointments->rate_c * $array_taxes['doctorservicetax']/100) ,14);
						$return = transaction::savedetails($result,$planid,$obj_appointments->rate_c,orm::factory('doctor')->where('id','=',$obj_appointments->refappwithid_c)->find()->refdoctorsid_c,$obj_appointments->refappfromid_c,($obj_appointments->rate_c * $array_taxes['doctorservicetax']/100),$array_taxes['doctorservicetax'],$servicetaxresult);
						
						$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, $obj_appointments->usagecharges_c,10);
         				$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1, ($obj_appointments->usagecharges_c * $array_taxes['servicetax']/100) ,20);
						$return = transaction::savedetails($result,$planid,$obj_appointments->usagecharges_c,orm::factory('doctor')->where('id','=',$obj_appointments->refappwithid_c)->find()->refdoctorsid_c,$obj_appointments->refappfromid_c,($obj_appointments->usagecharges_c * $array_taxes['servicetax']/100),$array_taxes['servicetax'],$servicetaxresult);

						if($return != 'success'){
							throw new exception($return);
						}
					}
					$objuserfornotfication = ORM::factory('user')
						->where('id','=',$obj_appointments->refappfromid_c)
						->find();
					$objDoctorUserForNotfication = ORM::factory('user')
							->join('doctors')
							->on('user.id','=','doctors.refdoctorsid_c')
							->where('doctors.id','=',$obj_appointments->refappwithid_c)
							->find();
					$drfullname= trim($objDoctorUserForNotfication->Firstname_c)." ".trim($objDoctorUserForNotfication->lastname_c);
					$objuserfornotfication = ORM::factory('user')
						->where('id','=',$obj_appointments->refappfromid_c)
						->find();
					$username=trim($objuserfornotfication->Firstname_c);
					//send sms and email to patient
					
					$notification=  array();
					$notification['id']=$objuserfornotfication->id;$notification['template']='appointmentcancel_bydoctor';$notification['sms']='true'; $notification['drfullname']=$drfullname;$notification['email']='true';$notification['username']=$username;$notification['appointmentdate']=$date1;$notification['appointmenttime']=$time1;
				}
				helper_notificationsender::sendnotification($notification);
				if(($representive) == '')
				{
					catjob::cancelAppointmentRemider($appointmentid);
					Request::current()->redirect("/ccancelappointment/cancelsuccessfully?appid=".$appointmentid."&role=".$role);
				}
				else
				{
					$objuserpatient = ORM::factory('user')//get user obj for patient
							->where('id','=',$obj_appointments->refappfromid_c)
							->find();
					$objuserdoctor = ORM::factory('user')//get user obj for doctor
							->join('doctors')
							->on('user.id','=','doctors.refdoctorsid_c')
							->where('doctors.id','=',$obj_appointments->refappwithid_c)
							->find();
					$returnArray=array();
					$returnArray['drname']= "Dr. ".$objuserdoctor->Firstname_c." ".$objuserdoctor->lastname_c;
					$returnArray['patientname']= $objuserpatient->Firstname_c." ".$objuserpatient->lastname_c;
					$date	= date_format( date_create($obj_appointments->displaytime_c),'d M Y H:i');
					$returnArray['apptime']= $date;
					if( $objuserpatient->email != "$objuserfornotfication->id@inhealth.com" )//check for email is created by staff or provided by patient
						$returnArray['patientemail']= $objuserpatient->email;
					else
						$returnArray['patientemail']= "";
					$returnArray['patientmobile']= $objuserpatient->mobileno1_c;
					$returnArray['patientcontactnumber']= $objuserpatient->phonenohome_c;
					$returnArray['appid']= $appointmentid;
          return $returnArray;
				}
			}
			else
			{
				throw new Exception("Appointment is not in scheduled state. ");
			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
  }
	
	public function action_rescheduleappointment(){
    $object_user = Auth::instance()->get_user();
    if (!($object_user)){
      Request::current()->redirect('cuser/login');
    }
		$rescheduledappointmentid=$_GET["appid"];
		$obj_appointments = ORM::factory('appointment')//create appointment object
      ->where('id','=',$rescheduledappointmentid)
      ->find();
    $session= Session::instance();
    $session->set('reschedule_appointment_id', $obj_appointments->id);
    if($object_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
      Request::current()->redirect("ctakeappointment/chooseSlot?patId=$obj_appointments->refappfromid_c");			
		}
		else{
      Request::current()->redirect("/callearliestappointment/view");
		}
	}
	
	public function action_getappointmentinfo()
	{
		try{
			$appId=$_GET['appid']; 
			$obj_appointment = ORM::factory('doctorstaffappointment')
						->where('appointment_id','=',$appId)
						->find();
			$returnArray=array();
			$returnArray['id']= $appId;
			$returnArray['drname']= $obj_appointment->Doctorsname;
			$returnArray['patientname']= $obj_appointment->Patientname;
			$returnArray['apptime']= $obj_appointment->DateAndTime;
			$returnArray['paid']= ORM::factory('appointment')->where('id','=',$appId)->find()->paid_c;
			die(json_encode($returnArray));
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_sendsmscode()
	{
		try{
			$appId=$_GET['appid']; 
			$obj_appointment = ORM::factory('appointment')
						->where('id','=',$appId)
						->find();
			$objuserpatient = ORM::factory('user')
							->where('id','=',$obj_appointment->refappfromid_c)
							->find();		
			$returnArray['patientmobile']= $objuserpatient->mobileno1_c;
			if( $objuserpatient->mobileno1_c != "")
			{
				$obj_user = Auth::instance()->get_user();
				if($obj_user->id != NULL )
				{
					$patientuserid = $obj_appointment->refappfromid_c;
					$accesscode = ORM::factory('accesscode')->where('generatedbyuserid_c','=', $obj_user->id)->where('generatedforuserid_c','=',$patientuserid)->find();
					if(($accesscode->id == NULL) or ($accesscode->status_c=="pending")or($accesscode->status_c== "completed" ))
					{
						
						$code = substr(md5(microtime()),rand(0,26),4);
						$accesscode->generatedbyuserid_c = $obj_user->id;
						$accesscode->generatedforuserid_c = $patientuserid;
						$accesscode->accesscode_c=$code;
						$accesscode->status_c="pending";
						$accesscode->save();   
						$obj_doctor= ORM::factory('user')->join('doctors')
							->on('user.id','=','doctors.refdoctorsid_c')
							->where('doctors.id','=',$obj_appointment->refappwithid_c)
							->find();
						$drname= $obj_doctor->Firstname_c.' '.$obj_doctor->lastname_c;
						$notification= array();
						if(array_key_exists('cancelapp', $_GET))
						{
							$notification['id']=$patientuserid;$notification['template']='cancel_appointment_by_staff_patientmsg';$notification['sms']='true'; $notification['code']=$code;$notification['drname']=$drname;
						}
						else
						{
							$notification['id']=$patientuserid;$notification['template']='reschedule_appointment_by_staff_patientmsg';$notification['sms']='true'; $notification['code']=$code;$notification['drname']=$drname;
						}
						helper_notificationsender::sendnotification($notification);
					}
					else
					{
						if($accesscode->status_c== "completed" )
						{
							throw new Exception("please try again");
						}
					}
				}
				else
				{
					throw new Exception("You are log out from system");
				}
			}
			die(json_encode($returnArray));
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_verifycode()
	{
		try{
			$obj_user = Auth::instance()->get_user();
			if($obj_user->id != NULL )
			{
				$appId=$_GET['appid'];
				$code =$_GET['code'];
				$obj_appointment = ORM::factory('appointment')
						->where('id','=',$appId)
						->find();
				$objuserpatient = ORM::factory('user')
							->where('id','=',$obj_appointment->refappfromid_c)
							->find();		
				$objUser = Auth::instance()->get_user();
				$accesscode = ORM::factory('accesscode')->where('generatedbyuserid_c','=', $objUser->id)->where('generatedforuserid_c','=',$objuserpatient->id)->where('accesscode_c','=',$code)->find();
				if($accesscode->id != NULL)
				{
					if($accesscode->status_c="pending")
					{
						$accesscode->status_c="completed";
						$accesscode->save();
						die("sucess");
					}
					{
						die("unsucess");
					}
				}
				else
				{
					die("unsucess");
				}
				die("sucess");
			}
			else
			{
				throw new Exception("You are log out from system");
			}
			
		}catch(Exception $e){
			throw new Exception($e);
		}
	}

  public function action_bookappointment(){
    $session = Session::instance();
    if(($reschedule_appointment_id = $session->get_once('reschedule_appointment_id')) != null){};
    if(($followlink = $session->get_once('followlink')) != null){};
    if(($appointment_details = $session->get_once('appointment_details')) != null){};
    Request::current()->redirect('callearliestappointment/view');
  }
	
	public function action_bookfollowup(){
		if($_POST){
			$appid = $_POST['app_id'];
			$dateobj = json_decode(json_decode($_POST['date']));
			//var_dump($dateobj); die;
			$strdate = $dateobj->start_time;
			
			$clinicid = $_POST['clinic_id'];
			$date = date_create($strdate);
			$displaydate = date_create($dateobj->display_time);
			$enddate = date_create($dateobj->end_time);
			
			$app = ORM::factory('appointment')->where('id','=',$appid)->find();
			
			$appointment = ORM::factory('appointment')->where('refappfromid_c','=',$app->refappfromid_c)
														->where('refappwithid_c','=',$app->refappwithid_c)
														->where('scheduledstarttime_c','=',date_format($date, 'Y-m-d H:i:s'))
														->where('refappointmentstatusesid_c','=',2)->find();
			if(isset($appointment->id)){
				$array = array();
				$array['data'] = 'Appointment already exists at '.date_format($date, 'Y-m-d H:i');
				die(json_encode($array));
								
			}
			
			
			$followup = ORM::factory('appointment');
			$followup->refappfromid_c = $app->refappfromid_c;
			$followup->refappwithid_c = $app->refappwithid_c;
			$followup->appointmenttype_c = $app->appointmenttype_c;
			$followup->consultationtype_c = 'Ad-hoc';
			$followup->clinicid_c = $clinicid;
			$followup->refincidentid_c = $app->refincidentid_c;
			$followup->consultationmode_c = $app->consultationmode_c;

			$followup->scheduledstarttime_c = date_format($date, 'Y-m-d H:i:s');
			$followup->scheduledendtime_c = date_format($enddate, 'Y-m-d H:i:s');
			$followup->displaytime_c = date_format($displaydate, 'Y-m-d H:i:s');
			$followup->refappointmentstatusesid_c = 2;
			$followup->save();
			
			$doctor_object = ORM::factory('doctor')->where('id', '=', $app->refappwithid_c)->find();
			$doctor_user_object = ORM::factory('user')->where('id' ,'=', $doctor_object->refdoctorsid_c)->find();
			$doctor_name = $doctor_user_object->Firstname_c.' '.$doctor_user_object->lastname_c;
			
			$time = date_format($date, 'H:i');
			$date = date_format($date, 'd-m-Y');
			
			$notification=  array();
			$notification['id']= $app->refappfromid_c;
			$notification['template']='take_appointment_patientmsg';
			$notification['sms']='true';
			$notification['drname']=$doctor_name;
			$notification['time']=$time;
			$notification['date']=$date;
			$notification['mode']=$app->consultationmode_c;
			helper_notificationsender::sendnotification($notification);
			
			catjob::setAppointmentRemider( date('d M Y H:i',strtotime($strdate)),$followup->id);
			$date = date_create($strdate);
			
			$array = array();
			$array['data'] = 'Appointment is booked at '.date_format($date, 'Y-m-d H:i');
			die(json_encode($array));
						
		}
	}

public function action_bookdoctorappointment(){
		//var_dump($_GET); die;
		if($_GET){
			$dateobj=json_decode(json_decode($_GET['date']));
			//var_dump($dateobj->start_time); die;
			
			$strdate =$dateobj->start_time;
			$incidenceid = $_GET['incidenceid'];
			$clinicid = $_GET['clinicid'];
			$incidencename = $_GET['incidencename'];
			$patientid=$_GET['patientid'];
			if($incidenceid=="")
			{
				//echo("here"); die;
				$incident= ORM::factory('incident');
				$incident->incidentsname_c=$incidencename;
				$incident->incidentdate_c=$strdate;
				$incident->save();
				$incidenceid=$incident->id;
			}
			$date = date_create($strdate);
			$displaydate=date_create($dateobj->display_time);
			$enddate=date_create($dateobj->end_time);
			$app = ORM::factory('appointment');
			
			
			
			
			$obj_user = Auth::instance()->get_user();
			$objdoc = ORM::factory('doctor')->where("refdoctorsid_c","=",$obj_user->id)->find();
			$app->refappfromid_c = $patientid;
			$app->refappwithid_c = $objdoc->id;
			$app->appointmenttype_c = "S";
			$app->consultationtype_c = 'Ad-hoc';
			$app->clinicid_c = $clinicid;
			$app->refincidentid_c = $incidenceid;
			if($clinicid != -1)
			$app->consultationmode_c = "In-clinic";
			else
				$app->consultationmode_c = "online";
			$app->scheduledstarttime_c = date_format($date, 'Y-m-d H:i:s');
			$app->displaytime_c = date_format($displaydate, 'Y-m-d H:i:s');
			$app->scheduledendtime_c = date_format($enddate, 'Y-m-d H:i:s');
			$app->refappointmentstatusesid_c = 2;
			$app->save();
			
			$doctor_object = ORM::factory('doctor')->where('id', '=', $app->refappwithid_c)->find();
			$doctor_user_object = ORM::factory('user')->where('id' ,'=', $doctor_object->refdoctorsid_c)->find();
			$doctor_name = $doctor_user_object->Firstname_c.' '.$doctor_user_object->lastname_c;
			
			$time = date_format($date, 'H:i');
			$date = date_format($date, 'd-m-Y');
			
			$notification=  array();
			$notification['id']= $app->refappfromid_c;
			$notification['template']='take_appointment_patientmsg';
			$notification['sms']='true';
			$notification['drname']=$doctor_name;
			$notification['time']=$time;
			$notification['date']=$date;
			$notification['mode']=$app->consultationmode_c;
			helper_notificationsender::sendnotification($notification);
			
			catjob::setAppointmentRemider( date('d M Y H:i',strtotime($strdate)),$app->id);
			$date = date_create($strdate);
			
			$array = array();
			$array['data'] = 'Appointment is booked at '.date_format($date, 'd M Y H:i');
			die($array['data']);
						
		}
	}
}
