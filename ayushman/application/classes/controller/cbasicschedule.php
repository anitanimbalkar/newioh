<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cbasicschedule extends Controller{
  public function action_view(){
    try{
      $user_object = Auth::instance()->get_user();
      if (!($user_object && $user_object->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $doctor_object = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_object->id)->find();
      $clinic = $this->request->post('clinic');
      $schedule_helper = new helper_schedulehelper();
      $current_clinic_schedule_object = $schedule_helper->get_current_schedule($doctor_object->id, $clinic['address_id']);
      if($current_clinic_schedule_object !== null){
        $content = View::factory('/vuser/vdoctor/vbasicschedule');
        $content->bind('clinic_id', $clinic['address_id']);
        $content->bind('clinic_name', $clinic['name']);
        $content->bind('current_clinic_schedule_object', $current_clinic_schedule_object);
        $this->response->body($content);
      }
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_save(){
    try{
      $user = Auth::instance()->get_user();
      $consultation_block_details = $_POST;
      $conflict = $this->check_for_conflict($consultation_block_details);
      if($conflict == 1){
        die("$conflict");
      }
      $consultation_block_id = $this->save_consultation_block($consultation_block_details);
      if($consultation_block_details['popup_consultation_timing_id'] == ''){
        $schedule_object = ORM::factory('schedule')->where('id','=',$consultation_block_details['popup_schedule_id'])->find();
        $schedule_object->consultationtimings_c = $schedule_object->consultationtimings_c . ',' . $consultation_block_id;
        $schedule_object->save();
      }
		$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','4')->where('refuspuserid_c','=',$user->id)->find();
		if($uspstepuser->refuseruspstepsid_c=='4'){
			$uspstepuser->update();
		}
		else{
			$uspstepuser->refuseruspstepsid_c='4';
			$uspstepuser->refuspuserid_c=$user->id;
			$uspstepuser->save();
		}

      die('0');
    }catch(Exception $e){ throw new Exception($e); }
  }

  public function action_delete(){
    try{
      $user_object = Auth::instance()->get_user();
      if (!($user_object && $user_object->has('roles', ORM::factory('role', array('name' => 'doctor'))))){
        Request::current()->redirect('cuser/login');
      }
      $conflict_flag = $_GET['conflict_flag'];
      $object_doctor = ORM::factory('doctor')->where('refdoctorsid_c', '=', $user_object->id)->find();
      $consultation_timing_id = $_GET['consultation_timing_id'];
      $schedule_id = $_GET['schedule_id'];
      $consultation_timing_object = ORM::factory('consultationtiming')->where('id','=',$consultation_timing_id)->find();
      $schedule_object = ORM::factory('schedule')->where('id','=',$schedule_id)->find();

      //check if any appointments have been booked
      if($conflict_flag != 2){
        $appointment_date = time();
        $schedule_helper = new helper_schedulehelper();
        $max_date = strtotime('+1 year', $appointment_date);
        while($appointment_date < $max_date){
          $all_weekdays = array('1'=>'M', '2'=>'T', '3'=>'W', '4'=>'Th', '5'=>'F', '6'=>'Sa', '7'=>'S');
          $week_day = date('N', $appointment_date);
          $week_day = $all_weekdays[$week_day];
          $applicable_weekdays = explode(',', trim($consultation_timing_object->applicableon_c, ', '));
          if(($key = array_search($week_day, $applicable_weekdays)) !== false){
            $date = date('Y-m-d', $appointment_date);
            $slot_start_time = $date. ' '. $consultation_timing_object->starttime_c;
            $slot_end_time = $date.' '.$consultation_timing_object->endtime_c; 
            $booked_appointments = $schedule_helper->get_booked_appointment($object_doctor, $slot_start_time, $slot_end_time, '%');
            if(count($booked_appointments)>0){
              if($conflict_flag == 1){
                die('appointments pending');
              }
              else if ($conflict_flag == 3){
                foreach($booked_appointments as $booked_appointment){
                  $schedule_helper->cancel_appointment($booked_appointment->id, 'doctor', '');
                }
              }
            }
          }
          $appointment_date = strtotime('+1 day', $appointment_date);
        }
      }
      //end of check
	  
      $consultation_timings = explode(',',trim($schedule_object->consultationtimings_c, ','));
      $key = array_search($consultation_timing_id, $consultation_timings);
      unset($consultation_timings[$key]);
      $consultation_timings = implode(',', $consultation_timings);
      $schedule_object->consultationtimings_c = $consultation_timings;
      $schedule_object->save();
      $consultation_timing_object = ORM::factory('consultationtiming')->where('id','=',$consultation_timing_id)->find();
      $consultation_timing_object->delete();
      die();
    }catch(Exception $e){ throw new Exception($e); }
  }

  private function save_consultation_block($consultation_block_details){
    if($consultation_block_details['popup_consultation_timing_id'] == ''){
      $consultation_timing_object = ORM::factory('consultationtiming');
    }
    else{
      $consultation_timing_object = ORM::factory('consultationtiming')->where('id','=',$consultation_block_details['popup_consultation_timing_id'])->find();
    }
    $consultation_timing_object->starttime_c = $consultation_block_details['input_start_time'].':00';
    $consultation_timing_object->endtime_c = $consultation_block_details['input_end_time'].':00';
    $consultation_timing_object->longvisitduration_c = $consultation_block_details['input_consultation_duration'];
    $consultation_timing_object->shortvisitduration_c = $consultation_block_details['input_consultation_duration'];
    $consultation_timing_object->waitperhour_c = $consultation_block_details['input_standby'];
    if($consultation_block_details['input_allow_online'] == 'Yes'){
      $consultation_timing_object->allowonline_c = 1;
    }
    else{
      $consultation_timing_object->allowonline_c = 0;
    }
    if($consultation_block_details['input_allow_home'] == 'Yes'){
      $consultation_timing_object->allowhome_c = 1;
    }
    else{
      $consultation_timing_object->allowhome_c = 0;
    }
    $consultation_timing_object->applicableon_c = $consultation_block_details['input_weekdays'];
    $consultation_timing_id = $consultation_timing_object->save();
    return($consultation_timing_id);
  }
  private function check_for_conflict($consultation_block_details){
    $user_object = Auth::instance()->get_user();
    $doctor_object = ORM::factory('doctor')->where('refdoctorsid_c', '=', $user_object->id)->find();
    $doctor_clinics= ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c', '=', $doctor_object->id)->where('isactive_c', '=', 1)->find_all();
    if(count($doctor_clinics) > 0){
      $doctor_clinic_ids = array();
      foreach($doctor_clinics as $doctor_clinic){
        array_push($doctor_clinic_ids, $doctor_clinic->refclinicaddressid_c); 
      }
      $all_schedules = ORM::factory('clinicschedule')->where('refdoctorid_c', '=', $doctor_object->id)->where('refclinicid_c', 'in' , $doctor_clinic_ids)->find_all();
      if(count($all_schedules) > 0){
        $schedule_ids = array();
        foreach($all_schedules as $schedule){
          array_push($schedule_ids, $schedule->refscheduleid_c); 
        }
        $schedule_objects = ORM::factory('schedule')->where('id','in', $schedule_ids)->find_all();
        if(count($schedule_objects) > 0){
          $consultation_timing_ids = array();
          foreach($schedule_objects as $schedule_object){
            $schedule_consultation_timings = explode(',',trim($schedule_object->consultationtimings_c, ','));
            foreach($schedule_consultation_timings as $schedule_consultation_timing){
              array_push($consultation_timing_ids, (int)$schedule_consultation_timing );
            }
          }
          if(($key = array_search($consultation_block_details['popup_consultation_timing_id'], $consultation_timing_ids)) !== false){
            unset($consultation_timing_ids[$key]);
          }
          if(count($consultation_timing_ids)>0){
            $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->find_all();
            foreach($consultation_timing_objects as $consultation_timing_object){
              $day_overlap = $this->check_for_day_conflict($consultation_block_details, $consultation_timing_object);
              $time_overlap = $this->check_for_time_conflict($consultation_block_details, $consultation_timing_object);
              if($time_overlap == 1 && $day_overlap == 1){
                return 1;
              }
            }
          }
        }
      }
    }
    return 0;
  }
  private function check_for_time_conflict($new_timing_details, $consultation_timing_object){
    $new_start_time_array = explode(':',trim($new_timing_details['input_start_time']));
    $new_start_time = (int)$new_start_time_array[0] + ((int)$new_start_time_array[1]) / 60 ;
    $current_start_time_array = explode(':',trim($consultation_timing_object->starttime_c));
    $current_start_time = (int)$current_start_time_array[0] + ((int)$current_start_time_array[1]) / 60 ;
    $new_end_time_array = explode(':',trim($new_timing_details['input_end_time']));
    $new_end_time = (int)$new_end_time_array[0] + ((int)$new_end_time_array[1]) / 60 ;
    $current_end_time_array = explode(':',trim($consultation_timing_object->endtime_c));
    $current_end_time = (int)$current_end_time_array[0] + ((int)$current_end_time_array[1]) / 60 ;
    if($new_start_time < $current_end_time  &&  $current_start_time < $new_end_time){
      return 1;
    }
    return 0;
  }
  private function check_for_day_conflict($new_timing_details, $consultation_timing_object){
    $new_weekdays = explode(',' , $new_timing_details['input_weekdays']);
    $current_weekdays = explode(',' , $consultation_timing_object->applicableon_c);
    foreach($new_weekdays as $new_weekday){
      if(($key = array_search($new_weekday, $current_weekdays)) !== false){
        return 1;
      }
    }
    return 0;
  }
}
