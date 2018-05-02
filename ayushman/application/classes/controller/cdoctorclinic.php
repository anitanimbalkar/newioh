<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdoctorclinic extends Controller_Ctemplatewithmenu{
  public function action_view(){
    try{
      $object_user = Auth::instance()->get_user();
      if (!($object_user && $object_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      } 
      $object_doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$object_user->id)->find();
      $schedule_helper = new helper_schedulehelper();
      $clinics = $schedule_helper->get_doctor_clinic_details($object_doctor->id);
      $clinics_details = array();
      
      if($clinics !=NULL)
      {
      	foreach($clinics as $key=> $clinic){
        	if($clinics[$key]['address_id'] == -1){
          	$online_key = $key;
       	  }
        	else{
          	$clinic_details = array();
          	$clinic_details['name'] = $clinics[$key]['name'];
          	$clinic_details['send_notification'] = $clinics[$key]['send_notification'];
          	$clinic_details['address_id'] = $clinics[$key]['address_id'];
          	$clinic_details['address'] = ORM::factory('address')->where('id', '=', $clinics[$key]['address_id'])->find();
          	array_push($clinics_details, $clinic_details);
        	}
      	}
      }
	  $objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
		$allCountries;$count=0;
		foreach($objCountries as $objCountry)
		{
			$allCountries[$count]['isd']=$objCountry->mobileisd_c;
			$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
			$allCountries[$count]['country_c']=$objCountry->country_c;
			$count++;
		}
		
	  
     // $objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
      $content = View::factory('/vuser/vdoctor/vdoctorclinic');
	  $objUser = Auth::instance()->get_user();
	  $content->bind('objuser', $objUser);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
      $content->bind('clinics_details', $clinics_details);
      $content->bind('objcountries', $allCountries);
      $this->template->breadcrumb = ">>Home";
      $this->template->content = $content;
      $this->template->user = $object_user;
      $this->template->urole = "doctor";
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_getcliniclist()
  {
	 $object_user = Auth::instance()->get_user();
      if (!($object_user && $object_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      } 
      $object_doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$object_user->id)->find();
      $schedule_helper = new helper_schedulehelper();
      $clinics = $schedule_helper->get_doctor_clinic_details($object_doctor->id);
      $clinics_details = array();
      
      if($clinics !=NULL)
      {
      	foreach($clinics as $key=> $clinic){
        	if($clinics[$key]['address_id'] == -1){
          	$online_key = $key;
       	  }
        	else{
          	$clinic_details = array();
          	$clinic_details['name'] = $clinics[$key]['name'];
          	$clinic_details['send_notification'] = $clinics[$key]['send_notification'];
          	$clinic_details['address_id'] = $clinics[$key]['address_id'];
          	$clinic_details['address'] = ORM::factory('address')->where('id', '=', $clinics[$key]['address_id'])->find();
          	array_push($clinics_details, $clinic_details);
        	}
      	}
		die(json_encode($clinics_details));
      } 
  }

  public function action_delete(){
    try{
      $object_user = Auth::instance()->get_user();
      if (!($object_user && $object_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $object_doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$object_user->id)->find();
      $address_id = $_GET['address_id'];
      $clinic_object = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c','=',$object_doctor->id)->where('refclinicaddressid_c', '=', $address_id)->find();
      $clinic_object->isactive_c = 0;
      $clinic_object->save();
      die;
    }
    catch(Exception $e) { throw new Exception($e); }
  }

  public function action_save(){
    try{
      $object_user = Auth::instance()->get_user();
      if (!($object_user && $object_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$object_user->id)->find();
      $doctorId = $objDoctor->id;
      $clinic_details = $_POST;
      $clinics		= ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c','=',$doctorId)->where('refclinicaddressid_c' ,'>',-1 )->find_all();
      $update_flag = false;
      if(! (isset($_POST['sendnotification_c']))){
    	 $_POST['sendnotification_c'] = '0';
      }
      $objCountry = orm::factory('countrymaster')->where('countrycode_c','=',$_POST["country_c"])->find();
      $_POST["country_c"] = $objCountry->country_c;
      foreach($clinics as $clinic){
        if($clinic->refclinicaddressid_c == $clinic_details['clinic_id']){
          $update_flag = true;
          $clinic->saveRecord($_POST);
          $objAddress	= ORM::factory('address')->where('id','=',$clinic->refclinicaddressid_c)->mustFind();
          $objAddress->saveRecord($_POST);
        }
      }
      if($update_flag == false){
        $objAddress 	= ORM::factory('address');
        $objAddress->saveRecord($_POST);
        $objClinic		= ORM::factory('doctorclinic');
        $objClinic->refdoctorclinicdoctorid_c  	= $doctorId;
        $objClinic->refclinicaddressid_c 		= $objAddress->id;
        $objClinic->clinicname_c = $_POST['clinicname_c'];
        $objClinic->sendnotification_c = $_POST['sendnotification_c'];
        $objClinic->save();

		$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','3')->where('refuspuserid_c','=',$object_user->id)->find();
		if($uspstepuser->refuseruspstepsid_c=='3'){
			$uspstepuser->update();
		}
		else{
			$uspstepuser->refuseruspstepsid_c='3';
			$uspstepuser->refuspuserid_c=$object_user->id;
			$uspstepuser->save();
		}
  
        //create schedule for clinic
        $existing_default_schedule = ORM::factory('schedule');
        $default_schedule_id = $existing_default_schedule->save();
        //set that schedule as default
        $existing_clinic_schedule_object = ORM::factory('clinicschedule');
        $existing_clinic_schedule_object->refdoctorid_c = $objDoctor->id;
        $existing_clinic_schedule_object->refclinicid_c = $objClinic->refclinicaddressid_c;
        $existing_clinic_schedule_object->refscheduleid_c = $default_schedule_id;
        $existing_clinic_schedule_object->save();
        Request::current()->redirect('cdoctorclinic/view');
      }
      Request::current()->redirect('cdoctorclinic/view');
    }
    catch(Exception $e) { throw new Exception($e); }
  }
}
