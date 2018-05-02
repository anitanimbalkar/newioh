<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Callslotsforclinic extends Controller_Ctemplatewithmenu   {
  public function action_view(){
    try{
      $objUser = Auth::instance()->get_user();
      if (! $objUser){
        Request::current()->redirect('cuser/login');
      }
		$doctors = ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find_all();
		if(count($doctors) > 0){
			$clinic_id = $this->request->post('clinic_id');
			$doctor_id =  ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find()->id;
			$earliest = $this->request->post('display_time');
			$clinic_name = $this->request->post('clinic_name');
			$content = View::factory('/vuser/vdoctor/vallslotsforclinic');
		}else{
			$clinic_id = $_POST['clinic_id'];
			$doctor_id = $_POST['doctor_id'];
			$earliest = $_POST['display_time'];
			$clinic_name = $_POST['clinic_name'];
			$content = View::factory('/vuser/vpatient/vallslotsforclinic');
		}	  
      
      $earliest = date('Y-m-d H:i:s', strtotime('-5 minute', strtotime($earliest)));
      $earliest = explode(' ', $earliest);
      $current_date = date('d-M-Y');
      $earliest_date = $earliest[0];
      $earliest_time = $earliest[1];
      $all_appointments_in_week = $this->get_slots($clinic_id, $doctor_id, $earliest_date, $earliest_time);
      $clinic_address_object = ORM::factory('address')->where('id','=',$clinic_id)->find();
     
      $search_doctor_object = ORM::factory('searchdoctors')->where('doctorid', '=', $doctor_id)->find();
     
		$doctorinfo = ORM::factory('user')->get_info($search_doctor_object->userid);
	 
      $content->bind('earliest_date', $earliest_date);
      $content->bind('current_date',$current_date); 
      $content->bind('clinic_id', $clinic_id);
      $content->bind('all_appointments_in_week',$all_appointments_in_week);
      $content->bind('search_doctor_object',$search_doctor_object);
      $content->bind('clinic_address_object',$clinic_address_object);
      $content->bind('clinic_name', $clinic_name);
	  $content->bind('doctorinfo', $doctorinfo);
      $this->template->breadcrumb = ">>Home";
      $this->template->content = $content;
      $this->template->user = $objUser;
      $this->template->urole = "patient";
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_getslotsfordate()
  {
	  
	  $clinic_id = $_GET['clinic_id'];
	  
	  if( !isset($_GET['doctor_id'])){
			$objUser = Auth::instance()->get_user();
		  if (! $objUser){
			Request::current()->redirect('cuser/login');
		  }
		  $objDoctor= ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find();
		  $doctor_id = $objDoctor->id;
	  }else{
		 $doctor_id = $_GET['doctor_id'];
	  }
	  
	  
	  $date = $_GET['date'];
	  $appointmentsinaday = $this->get_slotsinaday($clinic_id, $doctor_id, $date, null);
	  $i=0;
	  $timeslots=array();
	  foreach($appointmentsinaday as $appointment)
	  {
		  
		 $appointment['timeslot']=date_format(date_create($appointment['display_time']),'H:i');
		 array_push($timeslots,$appointment);
		// $timeslots[$i]=$appointment['display_time'];
		// $i++;
	  }
	  die(json_encode($timeslots));
	  
  }
  public function action_getdoctorclinics(){
	   $objUser = Auth::instance()->get_user();
      if (! $objUser){
        Request::current()->redirect('cuser/login');
      }
	  $objDoctor= ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find();
	  $objClinics= ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c','=',$objDoctor)->where('isactive_c','=','1')->find_all()->as_array();
	  $clinicname=array();
	  $temp=array();
	  $i=0;
	  foreach($objClinics as $clinic)
	  {
		  //$temp=array();
		 //$temp[$clinic->refclinicaddressid_c] = $clinic->clinicname_c;
		//array_push($clinicname[$i],$temp);
		$clinicname[$i]["id"]=$clinic->refclinicaddressid_c;
		$clinicname[$i]["name"]=$clinic->clinicname_c;
		
		$i++;
	 }
	 echo(json_encode($clinicname));
	 die;
  }
  public function action_get_all_slots(){
    $clinic_id = $_GET['clinic_id'];
    $doctor_id = $_GET['doctor_id'];
    $direction = $_GET['direction'];
    $date = $_GET['date'];
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
  private function get_slots($clinic_id, $doctor_id, $date, $time){
    $schedule_helper = new helper_schedulehelper();
    if($clinic_id == -1){
      $consultation_timing_ids = $schedule_helper->get_online_consultation_timings($doctor_id);
    }
    else{
      $current_clinic_schedule_object = $schedule_helper->get_current_schedule($doctor_id, $clinic_id);
      $consultation_timing_ids = $schedule_helper->get_consultation_timing_ids($current_clinic_schedule_object->refscheduleid_c);
    }
    
    $all_appointments_in_week = array();
    $all_weekdays = array('1'=>'Monday', '2'=>'Tuesday', '3'=>'Wednesday', '4'=>'Thursday', '5'=>'Friday', '6'=>'Sataurday', '7'=>'Sunday');
    $weekday = date('N', strtotime($date));
    $day_count = 1;
    while($day_count < $weekday){
      $day_diff = $weekday - $day_count;
      $day_date = date('d-M-Y', strtotime("-$day_diff day", strtotime($date)));
      $all_appointments_in_week[$day_count]['date'] = $day_date;
      $all_appointments_in_week[$day_count]['day_name'] = $all_weekdays[$day_count];
      $all_appointments_in_week[$day_count]['appointments'] = null;
      $day_count++;
    }
    while($day_count < 8){
      $day_diff = $weekday - $day_count;
      $day_date = date('d-M-Y', strtotime("-$day_diff day", strtotime($date)));
      if(strtotime($day_date) == strtotime(date('d-M-Y')) && $time == null){
        $time = date('H:i:s');
      }
      if($time == null){
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->order_by('endtime_c','asc')->find_all();
      }
      else{
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->where('endtime_c','>',$time)->order_by('endtime_c','asc')->find_all();
      }
      $all_appointments_in_day = array();
      foreach($consultation_timing_objects as $consultation_timing_object){
        $all_appointments_in_block = $schedule_helper->find_all_slots($doctor_id, $consultation_timing_object, strtotime($day_date), $time);
        if($all_appointments_in_block !== null){
          $all_appointments_in_day = array_merge($all_appointments_in_day, $all_appointments_in_block);
        }
      }
      $all_appointments_in_week[$day_count]['date'] = date('d-M-Y', strtotime($day_date));
      $all_appointments_in_week[$day_count]['day_name'] = $all_weekdays[$day_count];
      $all_appointments_in_week[$day_count]['appointments'] = $all_appointments_in_day;
      $time = null;
      $day_count++;
    }
    return($all_appointments_in_week);
  }
  private function get_slotsinaday($clinic_id, $doctor_id, $date, $time){
    $schedule_helper = new helper_schedulehelper();
    if($clinic_id == -1){
      $consultation_timing_ids = $schedule_helper->get_online_consultation_timings($doctor_id);
    }
    else{
	
      $current_clinic_schedule_object = $schedule_helper->get_current_schedule($doctor_id, $clinic_id);
      $consultation_timing_ids = $schedule_helper->get_consultation_timing_ids($current_clinic_schedule_object->refscheduleid_c);
    }
    
   
      $day_date = $date;
      if(strtotime($day_date) == strtotime(date('d-M-Y')) && $time == null){
        $time = date('H:i:s');
      }
     
      if($time == null){
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->order_by('endtime_c','asc')->find_all();
      }
      else{
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->where('endtime_c','>',$time)->order_by('endtime_c','asc')->find_all();
      }
	  
      $all_appointments_in_day = array();
      foreach($consultation_timing_objects as $consultation_timing_object){
        $all_appointments_in_block = $schedule_helper->find_all_slots($doctor_id, $consultation_timing_object, strtotime($day_date), $time);
        if($all_appointments_in_block !== null){
          $all_appointments_in_day = array_merge($all_appointments_in_day, $all_appointments_in_block);
        }
      }
     
    return($all_appointments_in_day);
  }
}
