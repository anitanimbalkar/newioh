<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/controller/catjob.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');

class Controller_CpatientBookingApp extends Controller_Ctemplatewithmenu {
public function action_getfavdoctors()
{
	// If session terminated then take user to login page
	$object_user = Auth::instance()->get_user();
	if (!$object_user ){
		Request::current()->redirect('cuser/login');
	}		
	if (!(isset($_GET['patientuserid'])))
	{
		$response['error'] = "Error: Consumer not selected";
				
		echo json_encode($response);		
		die;
	}
	$patientuserid = $_GET['patientuserid'];
	if ($patientuserid == '' OR $patientuserid == null)
	{
		$response['error'] = "Error: Consumer not selected";
				
		echo json_encode($response);		
		die;	
	}
	$object_patient = ORM::factory('patient')
						->where('repatientsuserid_c','=',$patientuserid)
						->find();
	
	// Check if redirected from rescheduled appointment
	if ((isset($_GET['rescheduleappid'])) AND ($_GET['rescheduleappid'] != 0))
	{
		// set in session reshedule appointment id
		$_SESSION["reschedule_appointment_id"] = $_GET['rescheduleappid'];
		//$reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $reschedule_appointment_id)->find();
		$reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $_GET['rescheduleappid'])->find();		
		$object_fav_doctors = ORM::factory('favoritedocterbypatient')
			->where('reffavdocbypatpatientsid_c', '=', $object_patient->id)
			->where('reffavdocbypatdoctorsid_c','=',$reschedule_appointment_object->refappwithid_c)
			->find_all();
	}
	else
	{
		$object_fav_doctors = ORM::factory('favoritedocterbypatient')
				->where('reffavdocbypatpatientsid_c', '=', $object_patient->id)
				->find_all();
	}
	$doctor_ids = array();
	foreach($object_fav_doctors as $object_fav_doctor){
		array_push( $doctor_ids, $object_fav_doctor->reffavdocbypatdoctorsid_c);
		}
	if(count($doctor_ids) > 0){
		$object_doctors = ORM::factory('doctor')->where('id', 'in', $doctor_ids)->find_all();
	}
	else{
		$object_doctors = null;
	}
	// Form array of three doctors which need to be displayed in 
	// a set in one row 
	
	$doctorObj = array();
	if ($object_doctors != null)
	{
		foreach($object_doctors as $object_doctor)
		{
			$set = array();	
			//$schedule_helper = new helper_schedulehelper();
			//$clinics_details = $schedule_helper->get_doctor_clinic_details($object_doctor->id);
			//$temp['clinicdetails']= $clinics_details;
			$objDocprofile = ORM::factory('doctorprofile')
							->where('doctorid','=',$object_doctor->id)->find();

			if($objDocprofile)
			{
				$temp['doctorid']= $objDocprofile->doctorid ;
				$temp['userid']= $objDocprofile->userid ;		
				$temp['photo']= $objDocprofile->photo_c ;		
				$temp['name']= $objDocprofile->doctorname ;		
				$temp['domain']= $objDocprofile->domain_c ;		
				$temp['specialization']= $objDocprofile->specialization_c ;		
				$temp['education']= $objDocprofile->education_c ;		
				$temp['phone']= $objDocprofile->phone ;					
				$temp['clinics'] = $this->action_getclinics($objDocprofile->doctorid );
				$temp['fees'] = $this->action_getdoctorfees($objDocprofile->doctorid );
				$temp['display'] = 'no'; // used to display one item at a time;
				array_push($doctorObj,$temp);
			}
		}
	}
	else
	{
		$doctorObj = array();
	}
	$response['doctorlist'] = $doctorObj;
				
	header("Cache-Control: no-cache, must-revalidate");
	echo json_encode($response);
	die;			
}

public function action_getincidents()
{
	if (!(isset($_GET['patientuserid'])))
	{
		$response['error'] = "Error: Consumer not selected";
		echo json_encode($response);		
		die;
	}
	$patientuserid = $_GET['patientuserid'];
	if ($patientuserid == '' OR $patientuserid == null)
	{
		$response['error'] = "Error: Consumer not selected";				
		echo json_encode($response);		
		die;	
	}
	$temp['incident'] = $this->action_getincidata($patientuserid);
	$temp['billplan'] = $this->action_getpatientplan($patientuserid);
	$response = $temp;
	echo json_encode($response);		
	die;
}
private function action_getpatientplan($patientuserid)
{
	$object_individual_plans = new Model_Billingindividualplan;
	$user_plan_id = $object_individual_plans->where('refusersid_c','=', $patientuserid)->where('status_c','=', 'active')->find()->refplanid_c;
	$user_plan_charges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$user_plan_id)->find()->as_array();
	$user_account_balance = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $patientuserid)->find()->netbalance_c;
	$user_plan_charges['netbalance'] = $user_account_balance;
	$array_taxes = Kohana::$config->load('taxes');
	$user_plan_charges['servicetax'] = $array_taxes['servicetax'];
	return($user_plan_charges);
}

private function action_getdoctorfees($doctorid)
{
	$object_fees = ORM::factory('doctorservice')->where('refdoctorid','=',$doctorid)->find();
	if($object_fees->id != null)
	{		
		$temp['first_time_fees'] = $object_fees->charge1_c;
		$temp['followup_fees'] = $object_fees->charge2_c;
		$temp['online_fees']	= $object_fees->charge3_c;		
	}
	else
	{
		$temp['first_time_fees'] = 'Not defined';
		$temp['followup_fees'] = 'Not defined';
		$temp['online_fees']	= 'Not defined';			
	}			
	return($temp);
}

private function action_getincidata($patientuserid)
{	
	/*$object_incidents = ORM::factory('incident')
		->join('appointments')->on('appointments.refincidentid_c','=','incident.id')
		->where('refappfromid_c','=',$patientuserid)
		->where('refappointmentstatusesid_c','=',1)
		->find_all();
		*/
		
	$query = 'select distinct incidents.id,incidentsname_c,incidentdate_c
			 from incidents,appointments
			 where refappointmentstatusesid_c = 1 and 
			 appointments.refincidentid_c = incidents.id and
			 TRIM(incidentsname_c) != "" and 
			 refappfromid_c = ' . $patientuserid .' order by  incidentdate_c desc';
	$object_incidents = DB::query(Database::SELECT, $query)->execute();

	$incidents = array();
	$temp = array();
    if(count($object_incidents)>0){
      foreach($object_incidents as $objInc){
	    $incident['id'] = $objInc['id'];
        $incident['inciname'] = $objInc['incidentsname_c'];
        $incident['incidate'] = date("d M Y", strtotime($objInc['incidentdate_c']));
        array_push($incidents, $incident);
      }
	}
	return($incidents);
}

private function action_getclinics($doctorsid)
{
	// If session terminated then take user to login page
	$object_user = Auth::instance()->get_user();
	if (!$object_user ){
		Request::current()->redirect('cuser/login');
	}		
	//$schedule_helper = new helper_schedulehelper();
	//$response['cliniclist'] = $schedule_helper->get_doctor_clinic_details($_GET['doctorsid']);
	$objDoctorClinics = ORM::factory('doctorclinic')
						->where('refdoctorclinicdoctorid_c','=',$doctorsid)
						->where('isactive_c','=','1')
						->where('refclinicaddressid_c','!=',-1)->find_all();
		// exclude "Online" clinics
    $clinics = array();
    if(count($objDoctorClinics)>0){
      foreach($objDoctorClinics as $objDoctorClinic){
	    $clinic['name'] = $objDoctorClinic->clinicname_c;
        $clinic['address_id'] = $objDoctorClinic->refclinicaddressid_c;
		$address = ORM::factory('address')
					->where('id','=',$objDoctorClinic->refclinicaddressid_c)->find();
		$clinic['address'] =  $address->line1_c . " " .$address->nearlandmark_c . " " .$address->location_c . " " .$address->city_c . " " . $address->state_c ;
        $clinic['send_notification'] = $objDoctorClinic->sendnotification_c;
        $clinic['mode'] = $objDoctorClinic->mode_c;

		$date = date('Y-m-d');   
		
		$clinic['slots'] = $this->action_get_all_slots($objDoctorClinic->refclinicaddressid_c,$doctorsid,null,$date);
        array_push($clinics, $clinic);
      }
	}
	$response = $clinics;
	return($response);
//	echo json_encode($response);		
//die;
}		

// Get schedule for specific date
  private function action_get_all_slots($clinic_id,$doctor_id,$direction,$date){
    /*$clinic_id = $_GET['clinic_id'];
    $doctor_id = $_GET['doctor_id'];
    $direction = $_GET['direction'];
    $date = $_GET['date'];*/
    if($direction == 'later'){
      $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
    }
    else if ($direction == 'earlier'){
      $date = date('Y-m-d', strtotime('-7 day', strtotime($date)));
      if(strtotime($date) < strtotime(date('Y-m-d'))){
        $date = date('Y-m-d');
      }
    }
    else{
      $day_of_week = date('N', strtotime($date)) - 1;
      $date_monday = date('Y-m-d', strtotime("-$day_of_week day", strtotime($date)));
      if($date_monday < date('Y-m-d')){
        $date = date('Y-m-d');
      }
      else{
        $date = $date_monday;
      }
    }
    $all_appointments_in_week = $this->get_slots($clinic_id, $doctor_id, $date, null);
    //die(json_encode($all_appointments_in_week));
	return($all_appointments_in_week);
  }
  private function get_slots($clinic_id, $doctor_id, $date, $time){
    $schedule_helper = new helper_schedulehelper();
    if($clinic_id == -1){
      $consultation_timing_ids = $schedule_helper->get_online_consultation_timings($doctor_id);
    }
    else{
      $current_clinic_schedule_object = $schedule_helper->get_current_schedule($doctor_id, $clinic_id);
	  $consultation_timing_ids = $schedule_helper->get_consultation_timing_ids($current_clinic_schedule_object->refscheduleid_c);
    }
 
	$todayDate  = date_create(date('d M Y',time()));
	//echo date('d-M-Y',time());
	$all_appointments_in_week = array();
    $all_weekdays = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
    $weekday = date('N', strtotime($date));
    $day_count = 1;
	$datefound = false;
    while($day_count < $weekday){
      $day_diff = $weekday - $day_count;
      $day_date = date('d M Y', strtotime("-$day_diff day", strtotime($date)));
      $all_appointments_in_week[$day_count]['date'] = $day_date;
      $all_appointments_in_week[$day_count]['day_name'] = $all_weekdays[$day_count];
      $all_appointments_in_week[$day_count]['appointments'] = null;
      // Set all weeks display flag to false
	  $all_appointments_in_week[$day_count]['display'] = false;
	  // eithter current date is set OR first element is set to true
	  //echo $day_date ;
	  $selecteddate= date_create($day_date);    
	  $datediff = date_diff($selecteddate,$todayDate);	  
	  if($datediff->format("%R%a") > 0)
		$all_appointments_in_week[$day_count]['datelessthantoday'] = true;
	  else
		$all_appointments_in_week[$day_count]['datelessthantoday'] = false;
		
	  if ($datediff->format("%R%a")==0)
	  {
		$all_appointments_in_week[$day_count]['display'] = true;
		$all_appointments_in_week[1]['display'] = false;
		$datefound = true;
	  }		
	  else if (($datediff->format("%R%a")< 0) and !($datefound))
		$all_appointments_in_week[1]['display'] = true;
      
	  $day_count++;	  
    }
    while($day_count < 8){
      $day_diff = $weekday - $day_count;
      $day_date = date('d M Y', strtotime("-$day_diff day", strtotime($date)));
      if(strtotime($day_date) == strtotime(date('d M Y')) && $time == null){
        $time = date('H:i:s');
      }
	  $consultation_timing_objects = array();
	  
      if($time == null){
		if($consultation_timing_ids != null)
			$consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->order_by('endtime_c','asc')->find_all();
      }
      else{
		if($consultation_timing_ids != null)		
			$consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->where('endtime_c','>',$time)->order_by('endtime_c','asc')->find_all();
      }
      $all_appointments_in_day = array();
      foreach($consultation_timing_objects as $consultation_timing_object){
        $all_appointments_in_block = $schedule_helper->find_all_slots($doctor_id, $consultation_timing_object, strtotime($day_date), $time);
        if($all_appointments_in_block !== null){
          $all_appointments_in_day = array_merge($all_appointments_in_day, $all_appointments_in_block);
        }
      }
      $all_appointments_in_week[$day_count]['date'] = date('d M Y', strtotime($day_date));
      $all_appointments_in_week[$day_count]['day_name'] = $all_weekdays[$day_count];
      $all_appointments_in_week[$day_count]['appointments'] = $all_appointments_in_day;
      $all_appointments_in_week[$day_count]['display'] = false;
 	  $all_appointments_in_week[$day_count]['datelessthantoday'] = false;
      $time = null;

  	  $selecteddate= date_create($day_date);    
	  $datediff = date_diff($selecteddate,$todayDate);
	  //echo "second section";
	  //echo $datediff->format("%R%a");
	  if ($datediff->format("%R%a")==0)
	  {
		$all_appointments_in_week[$day_count]['display'] = true;
		$all_appointments_in_week[1]['display'] = false;
		$datefound = true;
	  }		
	  else if (($datediff->format("%R%a")< 0) and !($datefound))
		$all_appointments_in_week[1]['display'] = true;

      $day_count++;
    }	
    return($all_appointments_in_week);
  }
  public function action_getallslots(){
    $clinic_id = $_GET['clinicid'];
    $doctor_id = $_GET['doctorid'];
    $direction = $_GET['direction'];
    $date = $_GET['currentdate'];
		// Parameters passed as input from screen
    if($direction == 'later'){
      $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
    }
    else if ($direction == 'earlier'){
      $date = date('Y-m-d', strtotime('-7 day', strtotime($date)));
      if(strtotime($date) < strtotime(date('Y-m-d'))){
        $date = date('Y-m-d');
      }
    }
    else{
      $day_of_week = date('N', strtotime($date)) - 1;
      $date_monday = date('Y-m-d', strtotime("-$day_of_week day", strtotime($date)));
      if($date_monday < date('Y-m-d')){
        $date = date('Y-m-d');
      }
      else{
        $date = $date_monday;
      }
    }
    $all_appointments_in_week = $this->get_slots($clinic_id, $doctor_id, $date, null);
    die(json_encode($all_appointments_in_week));
  }
  
	public function action_bookapp(){
		try{
			$staff_flag = false;
			$object_user = Auth::instance()->get_user();
			if (!($object_user)){
				Request::current()->redirect('cuser/login');
			}
			$object_patient = $object_user;
			
			//if booking by staff, get patient object from session
			if($object_user->has('roles', ORM::factory('role', array('name' => 'staff')))){
				$session = Session::instance();
				$patient_id = $session->get_once('patient_id');
				$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
				$staff_flag = true;
			}

			//if coming back from redirect, get appointment details from session
			$session = Session::instance();
			if(($appointment_details = $session->get_once('appointment_details')) != null){
			}
			else{
				if(isset($_POST['doctor_id']))
				$appointment_details = $_POST;
				else
				//var_dump("here"); die;
				Request::current()->redirect('cpatientdashboard/view');
			}

			$doctor_id = $appointment_details['doctor_id'];
			//get incident id
			$visit_type = $appointment_details['visit_type'];
			$appointment_type = $appointment_details['appointment_type'];
			// Not saving incidence so commented below
			/*if($visit_type == 'First Time'){
				$incident_object = ORM::factory('incident');
				$incident_object->incidentsname_c = $appointment_details['incident'];
				$incident_object->incidentdate_c =	$appointment_details['display_time'];
				$incident_id = $incident_object->save()->id;
			}
			else if($visit_type == 'Follow-up'){
				$incident_id = $appointment_details['incident'];
			}*/
			//var_dump($incident_id);die();
			//end of get incident id
			
			$reschedule_flag = false;
			$reschedule_appointment_id = null;
			$session = Session::instance();
			if(($reschedule_appointment_id = $session->get_once('reschedule_appointment_id')) != null){
				$reschedule_flag = true;
				$reschedule_appointment_object = ORM::factory('appointment')->where('id', '=', $reschedule_appointment_id)->find();
				$reschedule_appointment_id = $reschedule_appointment_object->id;
			}
			$clinic_object = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c', '=', $doctor_id)->where('refclinicaddressid_c','=', $appointment_details['clinic_id'])->find();
			$object_individual_plans = new Model_Billingindividualplan;
			$user_plan_id = $object_individual_plans->where('refusersid_c','=', $object_patient->id)->where('status_c','=', 'active')->find()->refplanid_c;
			$planid = $user_plan_id;
			$user_plan_charges = ORM::factory('billingplancharge')->where('ref_planid_c','=',$user_plan_id)->find();
			$charges_array = array('Standard'=>1, 'Premium'=>2, 'Concessional'=>3, 'Free'=>1);
			//$object_fees = ORM::factory('Billingdoctorfee')->where('ref_doctorid_c','=',$doctor_id)->where('status_c','=','active')->where('ref_slottypeid_c','=',$charges_array[$appointment_details['charge_type']])->find();
			$object_fees = ORM::factory('doctorservice')->where('refdoctorid','=',$doctor_id)->find();

			
			$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
			$user_account_balance = $user_account_object->netbalance_c;
			
			$total_service_charges = $this->get_ayushman_charges($user_plan_charges, $clinic_object->mode_c);
			
			$array_taxes = Kohana::$config->load('taxes');
			$servicetaxonayushmancharges = $total_service_charges * $array_taxes['servicetax'] / 100;

			$doctor_fees = $this->get_doctor_fees($visit_type,$clinic_object->mode_c, $object_fees);
			$servicetaxondoctorfees = $doctor_fees * $array_taxes['doctorservicetax'] /100;
			$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');

			$usagecharges = $total_service_charges - $user_plan_charges->servicecharges_c;

			//if reschedule flag is set, cancel prev appointment irrespective of role
			if($reschedule_flag == true){
				$reschedule_appointment_object->refappointmentstatusesid_c='3';
				$reschedule_appointment_object->save();
				catjob::cancelAppointmentRemider($reschedule_appointment_object->id);
				if($reschedule_appointment_object->paid_c == 1){
					$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->rate_c),7);
					$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, $servicetaxondoctorfees,14);
					$return = transaction::savedetails($result,$planid,$reschedule_appointment_object->rate_c,orm::factory('doctor')->where('id','=',$reschedule_appointment_object->refappwithid_c)->find()->refdoctorsid_c,$object_patient->id,$servicetaxondoctorfees,$array_taxes['doctorservicetax'],$servicetaxresult);

					$result = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->usagecharges_c),16);
					$servicetaxresult = transaction::transfer(ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,$user_account_object->accountcode_c,1, ($reschedule_appointment_object->usagecharges_c * $array_taxes['servicetax']/100),17);
					$return = transaction::savedetails($result,$planid,($reschedule_appointment_object->usagecharges_c),orm::factory('doctor')->where('id','=',$reschedule_appointment_object->refappwithid_c)->find()->refdoctorsid_c,$object_patient->id,($reschedule_appointment_object->usagecharges_c * $array_taxes['servicetax']/100),$array_taxes['servicetax'],$servicetaxresult);
					

					if($return != 'success'){
						throw new exception($return);
					}			

					if($result['type']== 'error'){
						throw new Exception;
					}
				}
			}
			//end of cancel prev appointment
			$payment_mode = $appointment_details['payment_mode'];
			if($staff_flag == false){
				//transfer money from patient's account to ayushman account if patient takes appointment

				if($payment_mode == 1){
					if($user_account_balance >= ($doctor_fees + $total_service_charges + $servicetaxonayushmancharges + $servicetaxondoctorfees)){
						$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($doctor_fees),2);
						$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($servicetaxondoctorfees),14);
						$return = transaction::savedetails($result,$planid,$doctor_fees,$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,$servicetaxondoctorfees,$array_taxes['doctorservicetax'],$servicetaxresult);
						if($return != 'success'){
							throw new exception($return);
						}

						if($result['type'] == 'error'){
							echo 'error while transfer doctor fees';die();
						}
					}
					else{
						echo 'Insufficient Balance for doctor fees';die();
					}
				}
				if($user_account_balance >= $total_service_charges){
					$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, ($user_plan_charges->servicecharges_c),1);
					$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c,1, (($user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),12);
					$return = transaction::savedetails($result,$planid,$user_plan_charges->servicecharges_c,$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,(($user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),$array_taxes['servicetax'],$servicetaxresult);
					
					$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, ($total_service_charges - $user_plan_charges->servicecharges_c),10);
					$servicetaxresult = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,1, (($total_service_charges - $user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),20);
					$return = transaction::savedetails($result,$planid,($total_service_charges - $user_plan_charges->servicecharges_c),$object_patient->id,orm::factory('doctor')->where('id','=',$doctor_id)->find()->refdoctorsid_c,(($total_service_charges - $user_plan_charges->servicecharges_c)* $array_taxes['servicetax'] / 100),$array_taxes['servicetax'],$servicetaxresult);
					
					

					if($result['type'] == 'error'){
						echo 'error while tranfer ayushman charges';die();
					}
				}
				else{
					echo 'Insufficient balance for ayushman charges';die();
				}
			}

			//insert into appointments table
			if($appointment_type == 'S'){
				$booked_appointment = ORM::factory('appointment')->where('refappwithid_c','=',$doctor_id)->where('scheduledstarttime_c','=',$appointment_details['start_time'])->where('refappointmentstatusesid_c','=',2)->find();
				if($booked_appointment->loaded()){
					echo 'Sorry but the appointment is already booked. Please choose another slot.';
					die();
				}
			}
			$modes_array = array('Online'=>1, 'In-clinic'=>3);
			$appointment_object = ORM::factory('appointment');
			$appointment_object->refappfromid_c = $object_patient->id;
			$appointment_object->refappwithid_c = $doctor_id;
			$appointment_object->scheduledstarttime_c = $appointment_details['start_time'];
			$appointment_object->scheduledendtime_c = $appointment_details['end_time'];
			$appointment_object->displaytime_c = $appointment_details['display_time'];
			//Incident will always be "Ad-hoc" or not known
			$incident_id = -1;
			$appointment_object->refincidentid_c = $incident_id;
			$appointment_object->reasonsymptom_c = $appointment_details['descriptions'];
			$appointment_object->refmode_c = $modes_array[$clinic_object->mode_c];
			$appointment_object->clinicid_c = $appointment_details['clinic_id'];
			$appointment_object->consultationmode_c = $clinic_object->mode_c;
			$appointment_object->rate_c						= $doctor_fees;
			$appointment_object->refappointmentstatusesid_c = 2;
			$appointment_object->status_c					= "fromsystem";
			$appointment_object->paid_c           = $payment_mode;
			$appointment_object->usagecharges_c = $usagecharges;
			$appointment_object->appointmenttype_c = $appointment_type;
			$appointment_id = $appointment_object->save()->id;
			//end of insert into appointments table
			var_dump("till here");

			//send notification to patient
			$doctor_object = ORM::factory('doctor')->where('id', '=', $doctor_id)->find();
			$doctor_user_object = ORM::factory('user')->where('id' ,'=', $doctor_object->refdoctorsid_c)->find();
			$doctor_name = $doctor_user_object->Firstname_c.' '.$doctor_user_object->lastname_c;
			$time = date('H:i',strtotime($appointment_details['display_time']));
			$date = date('d M Y',strtotime($appointment_details['display_time']));
			if($reschedule_flag == true){
				$notification['id']=$appointment_object->refappfromid_c;
				$notification['template']='rescheduled_appointment';
				$notification['sms']='true';
				$notification['drname']=$doctor_name;
				$notification['timeafter']=$time;
				$notification['dateafter']=$date;
				$notification['beforeresheduletime']=date('H:i',strtotime($reschedule_appointment_object->displaytime_c));
				$notification['beforeresheduledate']=date('d M Y', strtotime($reschedule_appointment_object->displaytime_c));
				$notification['modebefore']=$reschedule_appointment_object->consultationmode_c;
				$notification['modeafter']=$appointment_object->consultationmode_c;
			}
			else{
				$notification=  array();
				$notification['id']=$appointment_object->refappfromid_c;
				$notification['template']='take_appointment_patientmsg';
				$notification['sms']='true';
				$notification['drname']=$doctor_name;
				$notification['time']=$time;
				$notification['date']=$date;
				$notification['mode']=$appointment_object->consultationmode_c;
			}
			var_dump("Sending notifiation");
			helper_notificationsender::sendnotification($notification);
			//end of send notification to patient
			var_dump("Afte noti");
			//send notification to doctor
			if($clinic_object->sendnotification_c == 1){
				if($reschedule_flag == true){
					$notification = array();
					$notification['id']=$doctor_user_object->id;
					$notification['template']='reschedule_appointment_msg_for_doc';
					$notification['sms']='true';
					$notification['patient_name']=$object_patient->Firstname_c.' '.$object_patient->lastname_c;
					$notification['new_time']=$time;
					$notification['new_date']=$date;
					$notification['old_time']=date('H:i',strtotime($reschedule_appointment_object->displaytime_c));
					$notification['old_date']=date('d M Y', strtotime($reschedule_appointment_object->displaytime_c));
					$notification['old_mode']=$reschedule_appointment_object->consultationmode_c;
					$notification['new_mode']=$appointment_object->consultationmode_c;
				}
				else{
					$notification=  array();
					$notification['id']=$doctor_user_object->id;
					$notification['template']='take_appointment_msg_for_doc';
					$notification['sms']='true';
					$notification['patient_name']=$object_patient->Firstname_c.' '.$object_patient->lastname_c;
					$notification['time']=$time;
					$notification['date']=$date;
					$notification['mode']=$appointment_object->consultationmode_c;
				}
				helper_notificationsender::sendnotification($notification);
			}
			//end of send notification to doctor
			
			
				//Send xmpp message to the doctor's page
				//$notification['sms']='false';
				//$notification['xmpp']='true';
				//helper_notificationsender::sendnotification($notification);
				var_dump("before xmpp send");
				// xmpp::sendMessage($object_user->id,$object_user->xmpppassword_c,$doctor_user_object->id,'pullgriddata');
				// xmpp::sendMessage($object_user->id,$object_user->xmpppassword_c,$object_patient->id,'pullgriddata');
				var_dump("After xmpp send");
			
			$clinicadd=$appointment_details['clinic_id'];
			$appdate = date('d M Y H:i',strtotime($appointment_details['display_time']));
			catjob::setAppointmentRemider($appdate,$appointment_id);
			if($staff_flag == true)		
				Request::current()->redirect('cstaffdashboard/view');
				// Redirect to staff dashboard
			else
				die("success");
				//Request::current()->redirect("cfixedappwithdoc/fixedappointmet/get?doctorid=$doctor_id&appdate=$appdate&id=$reschedule_appointment_id&clinicaddressid=$clinicadd");
		}
		catch(Exception $e) { throw new Exception($e); }
	}
 	private function get_ayushman_charges($user_plan_charges, $mode){

		$booking_charges = $user_plan_charges->servicecharges_c;
		if($mode == 'Online'){
			$usage_charges = $user_plan_charges->usagechargesonline_c;
		}
		else if($mode == 'In-clinic'){
			$usage_charges = $user_plan_charges->usagechargesinclinic;
		}
		$total_service_charges = $booking_charges + $usage_charges;
		
		return $total_service_charges;
	} 
	private function get_doctor_fees($visit_type, $mode, $object_fees){
		/*if($visit_type == 'First Time'){
			if($mode == 'In-clinic'){
				$doctor_fees = $object_fees->firsttimefeesinclinic_c;
			}
			else{
				$doctor_fees = $object_fees->firsttimefees_c;
			}
		}
		else if($visit_type == 'Follow-up'){
			if($mode == 'In-clinic'){
				$doctor_fees = $object_fees->followupfeesinclinic_c;
			}
			else{
				$doctor_fees = $object_fees->followupfees_c;
			}
		}*/
		if($object_fees->id != null)
		{		
			if($visit_type == 'First Time')
				$doctor_fees= $object_fees->charge1_c;
			else
				$doctor_fees= $object_fees->charge2_c;
		}
		else
		{
			if($visit_type == 'First Time')
				$doctor_fees=0;
			else
				$doctor_fees=0;
		}							
		return $doctor_fees;
	}

//////////////////////////////////////////////////////////////////////////////////

}