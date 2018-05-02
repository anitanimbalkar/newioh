<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cclinicearliestappointment extends Controller{
  public function action_view(){
    try{
      $user_object = Auth::instance()->get_user();
      if (!$user_object){
        Request::current()->redirect('cuser/login');
      }
      $object_doctor = $this->request->post('object_doctor');
      $clinic_details = $this->request->post('clinic_details');
      $schedule_helper = new helper_schedulehelper();
      if($clinic_details['address_id'] == -1){
        $consultation_timing_ids = $schedule_helper->get_online_consultation_timings($object_doctor->id);
      }
      else{
        $current_clinic_schedule_object = $schedule_helper->get_current_schedule($object_doctor->id, $clinic_details['address_id']);
        if($current_clinic_schedule_object != null)
          $consultation_timing_ids = $schedule_helper->get_consultation_timing_ids($current_clinic_schedule_object->refscheduleid_c);
      }
      if(isset($consultation_timing_ids)){
        $earliest_appointment_found = false;
        //find earliest appointment for today
        $current_time = date('H:i:s');
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->where('endtime_c','>',$current_time)->order_by('endtime_c','asc')->find_all();
        $appointment_date = time();
        if(count($consultation_timing_objects) >0){
          foreach($consultation_timing_objects as $consultation_timing_object){
            $earliest_appointment = $schedule_helper->find_all_slots($object_doctor, $consultation_timing_object, $appointment_date, $current_time);
            if(count($earliest_appointment) > 0){
              $earliest_appointment_found = true;
              break;
            }
          }
        }
        //find earliest appointment for tommorow onwards
        $consultation_timing_objects = ORM::factory('consultationtiming')->where('id','in',$consultation_timing_ids)->order_by('endtime_c','asc')->find_all();
        $max_date = strtotime('+1 year', $appointment_date);
        while($earliest_appointment_found !== true && $appointment_date < $max_date){
          $appointment_date = strtotime('+1 day', $appointment_date);
          foreach($consultation_timing_objects as $consultation_timing_object){
            $earliest_appointment = $schedule_helper->find_all_slots($object_doctor, $consultation_timing_object, $appointment_date, null);
            if(count($earliest_appointment) > 0){
              $earliest_appointment_found = true;
              break;
            }
          }
        }
        $earliest_appointment = $earliest_appointment[0];
		$doctors = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_object->id)->find_all();
		if(count($doctors) > 0){
			$content = View::factory('/vuser/vdoctor/vclinicearliestappointment');
		}else{
			$content = View::factory('/vuser/vpatient/vclinicearliestappointment');
		}
        $content->bind('earliest_appointment', $earliest_appointment);
        $content->bind('clinic_details', $clinic_details);
        $this->response->body($content);
      }else{
		$doctors = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_object->id)->find_all();
		if(count($doctors) > 0){
			$content = View::factory('/vuser/vdoctor/vclinicearliestappointment');
		}else{
			$content = View::factory('/vuser/vpatient/vclinicearliestappointment');
		}
		$earliest_appointment = array();
		$content->bind('earliest_appointment', $earliest_appointment);
        $content->bind('clinic_details', $clinic_details);
        $this->response->body($content);
	  }
    }
    catch(Exception $e) { throw new Exception($e); }
  }
}
