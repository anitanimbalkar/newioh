<?php defined('SYSPATH') or die('No direct script access.');
class helper_schedulehelper{
  public function get_doctor_clinic_details($doctor_id){
    $objDoctorClinics = ORM::factory('doctorclinic')->where('refdoctorclinicdoctorid_c','=',$doctor_id)->where('isactive_c','=','1')->find_all();
    $clinics = array();
    if(count($objDoctorClinics)>0){
      foreach($objDoctorClinics as $objDoctorClinic){
        $clinic['name'] = $objDoctorClinic->clinicname_c;
        $clinic['address_id'] = $objDoctorClinic->refclinicaddressid_c;
		$address = ORM::factory('address')->where('id','=',$objDoctorClinic->refclinicaddressid_c)->find()->as_array();
		$clinic['address'] = $address;
        $clinic['send_notification'] = $objDoctorClinic->sendnotification_c;
        array_push($clinics, $clinic);
      }
      return $clinics;
    }
    return null;
  }
  public function get_current_schedule($doctor_id, $clinic_id){
    $clinic_schedule_objects = ORM::factory('clinicschedule')->where('refdoctorid_c','=',$doctor_id)->where('refclinicid_c','=', $clinic_id)->find_all();
	
    if(count($clinic_schedule_objects)>0){
      foreach($clinic_schedule_objects as $clinic_schedule_object){
        $curr_time = strtotime(date("Y-m-d"));
        $start_time = strtotime($clinic_schedule_object->appdatefrom_c);
        $end_time = strtotime($clinic_schedule_object->appdateto_c);
        if($start_time == null && $end_time == null){
          $current_clinic_schedule_object = $clinic_schedule_object;
          break;
        }
        else if ($start_time <= $curr_time && $end_time >= $curr_time){
          $current_clinic_schedule_object = $clinic_schedule_object;
        }
      }
      return $current_clinic_schedule_object;
    }
    return null;
  }
  public function get_consultation_timing_ids($schedule_id){
    $schedule_object = ORM::factory('schedule')->where('id','=',$schedule_id)->find();
    if(trim($schedule_object->consultationtimings_c, ',') !== ''){
      $consultation_timing_ids = explode(',',trim($schedule_object->consultationtimings_c , ', '));
      if(count($consultation_timing_ids)>0){
        return $consultation_timing_ids;
      }
    }
    return null;
  }
  public function find_earliest_appointment($object_doctor, $consultation_timing_object, $date){
    $all_weekdays = array('1'=>'M', '2'=>'T', '3'=>'W', '4'=>'Th', '5'=>'F', '6'=>'Sa', '7'=>'S');
    $week_day = date('N', $date);
    $week_day = $all_weekdays[$week_day];
    $applicable_weekdays = explode(',', trim($consultation_timing_object->applicableon_c, ', '));
    if(($key = array_search($week_day, $applicable_weekdays)) !== false){
      $date = date('Y-m-d', $date);
      $slot_start_time = $date. ' '. $consultation_timing_object->starttime_c;
      $slot_end_time = $date.' '.$consultation_timing_object->endtime_c;
      $booked_appointments = $this->get_booked_appointment($object_doctor, $slot_start_time, $slot_end_time, 'S');
      $appointment_slots =  $this->create_appointment_slots($slot_start_time, $slot_end_time,$consultation_timing_object, $booked_appointments);
      return ($appointment_slots[0]);
    }
    else{
      return null;
    }
  }
  public function find_all_slots($doctor_id, $consultation_timing_object, $date, $time){
    $all_weekdays = array('1'=>'M', '2'=>'T', '3'=>'W', '4'=>'Th', '5'=>'F', '6'=>'Sa', '7'=>'S');
    $week_day = date('N', $date);
    $date = date('Y-m-d', $date);
    $week_day = $all_weekdays[$week_day];
    $applicable_weekdays = explode(',', trim($consultation_timing_object->applicableon_c, ', '));
    if(($key = array_search($week_day, $applicable_weekdays)) !== false){
      $object_doctor = ORM::factory('doctor')->where('id','=',$doctor_id)->find();
      $start_time = $consultation_timing_object->starttime_c;
      $only_time = date('h:i A', strtotime($start_time));
      $flag = date('A',strtotime($start_time));
      if(strtotime($time)> strtotime($consultation_timing_object->starttime_c)){
        $start_time = $time;
        $start_minute = date('i', strtotime($start_time));
        $quarter = (int)( $start_minute / 15);
        $minute_diff = (($quarter + 1) * 15) - $start_minute ;
        $start_time = date('H:i:s', strtotime("+$minute_diff minute", strtotime($start_time)));
        $only_time = date('h:i A', strtotime("+$minute_diff minute", strtotime($start_time)));
        $flag = date('h:i A', strtotime("+$minute_diff minute", strtotime($start_time)));
	}
      $end_time = $consultation_timing_object->endtime_c;
      $appointment_slots = array();
      while(strtotime($start_time) < strtotime($consultation_timing_object->endtime_c)){
        if(strtotime($end_time) <= strtotime($start_time)){
          $end_time = date('H:i:s', strtotime('+1 hour', strtotime($end_time)));
        }
        else{
          $slot_start_time = $date. ' '. $start_time;
          $slot_end_time = $date.' '.$end_time;
          $booked_appointments = $this->get_booked_appointment($object_doctor, $slot_start_time, $slot_end_time, 'S');
          $scheduled_appointment_slots = $this->create_appointment_slots($slot_start_time, $slot_end_time,$consultation_timing_object, $booked_appointments);
          if($scheduled_appointment_slots != null){
            $appointment_slots = array_merge($appointment_slots, $scheduled_appointment_slots);
          }
          else{
            $wait_appointments = $this->get_booked_appointment($object_doctor, $slot_start_time, $slot_end_time, 'W');
            $max_wait_count = round((((strtotime($slot_end_time) - strtotime($slot_start_time))/3600) * $consultation_timing_object->waitperhour_c), 0, PHP_ROUND_HALF_DOWN);
            if(count($wait_appointments) < $max_wait_count ){
              $appointment = array();
			  $appointment['display']  = 'no';
              $appointment['start_time'] = $slot_start_time;
              $appointment['display_time'] = $slot_start_time;
			  // Added to diplay only time 
              $appointment['display_onlytime'] = $only_time;
			  $appointment['ampmflag'] = $flag;
			  
              $appointment['end_time'] = $slot_end_time;
              $appointment['charge_type'] = $consultation_timing_object->charge_type;
              $appointment['appointment_type'] = 'W';
              array_push($appointment_slots, $appointment);
            }
          }
          $start_time = $end_time;
        }
      }
      return $appointment_slots;
    }
    else{
      return null;
    }
  }
  public function create_appointment_slots($start_time, $end_time, $consultation_timing_object, $booked_appointments){
    $charge_type = $consultation_timing_object->charge_type;
    if(count($booked_appointments) == 0){
      $appointments = $this->create_slots($start_time, $end_time, $consultation_timing_object); 
    }
    else{
      $appointments = array();
      $appointment_start_time = $start_time;
      foreach($booked_appointments as $booked_appointment){
        if($booked_appointment->scheduledstarttime_c >= $appointment_start_time){
          $part_appointments = $this->create_slots($appointment_start_time, $booked_appointment->scheduledstarttime_c, $consultation_timing_object);
          $appointments = array_merge($appointments, $part_appointments);
        }
        $appointment_start_time = ($booked_appointment->scheduledstarttime_c > $booked_appointment->scheduledendtime_c) ? $booked_appointment->scheduledstarttime_c : $booked_appointment->scheduledendtime_c;
      }
      if($appointment_start_time <= $end_time){
        $part_appointments = $this->create_slots($appointment_start_time, $end_time, $consultation_timing_object);
        $appointments = array_merge($appointments, $part_appointments);
      }
    }
    if(count($appointments) > 0){
      return $appointments;
    }
    return null;
  }
  public function create_slots($start_time, $end_time, $consultation_timing_object){
    $appointments = array();
    $appointment_start_time = $start_time;
    while($appointment_start_time < $end_time){
      $appointment = array();
      $start_minute = date('i', strtotime($appointment_start_time));
      $quarter = (int)( $start_minute / 15);
      $minute_diff = (($quarter) * 15) - $start_minute ;
      $appointment_display_time = date('Y-m-d H:i', strtotime("+$minute_diff minute", strtotime($appointment_start_time)));
      $only_time = date('h:i A', strtotime("+$minute_diff minute", strtotime($appointment_start_time)));
      $flag = date('A', strtotime("+$minute_diff minute", strtotime($appointment_start_time)));
	  $appointment['display']  = 'no';
      $appointment['start_time'] = $appointment_start_time;
      $appointment['display_time'] = $appointment_display_time;
	  // To display only time element
      $appointment['display_onlytime'] = $only_time;
      $appointment['ampmflag'] = $flag;
      $appointment['end_time'] = date('Y-m-d H:i:s',(strtotime($appointment_start_time)+($consultation_timing_object->longvisitduration_c * 60)));
      $appointment['charge_type'] = $consultation_timing_object->charge_type;
      $appointment['appointment_type'] = 'S';
      if($appointment_start_time <= $end_time){
        $exists = false;
        foreach($appointments as $app){
          if($app['display_time'] == $appointment['display_time']){
            $exists = true;
            break;
          }
        }
        if(! $exists){
          array_push($appointments, $appointment);
        }
      }
      $appointment_start_time = $appointment['end_time'];
    }
    return $appointments;
  }
  public function get_online_consultation_timings($doctor_id){
    $clinics = $this->get_doctor_clinic_details($doctor_id);
    $current_schedules_array = array();
    foreach($clinics as $clinic){
      $current_schedule_object = $this->get_current_schedule($doctor_id, $clinic['address_id']);
      if($current_schedule_object != null)
        array_push($current_schedules_array, $current_schedule_object);
    }
    $consultation_timings_array = array();
    foreach($current_schedules_array as $current_schedule){
      $consultation_timings = $this->get_consultation_timing_ids($current_schedule->refscheduleid_c);
      if($consultation_timings != null){
        $consultation_timings_array = array_merge($consultation_timings_array, $consultation_timings);
      }
    }
    if(count($consultation_timings_array) > 0){
      $consultation_timings = ORM::factory('consultationtiming')->where('id', 'in', $consultation_timings_array)->where('allowonline_c', '=', 1)->find_all();
      $online_consultation_timings = array();
      foreach($consultation_timings as $consultation_timing){
        array_push($online_consultation_timings, $consultation_timing->id);
      }
      if(count($online_consultation_timings) > 0){
        return($online_consultation_timings);
      }
    }
    return null;
  }
  public function get_booked_appointment($object_doctor, $slot_start_time, $slot_end_time, $appointment_type){
    $booked_appointments = ORM::factory('appointment')
      ->where('refappwithid_c','=',$object_doctor->id)
      ->where('refappointmentstatusesid_c', '=', 2)
      ->where('appointmenttype_c', 'like', $appointment_type)
      ->where('scheduledstarttime_c', '<', $slot_end_time)
      ->where('scheduledendtime_c', '>', $slot_start_time)
      ->order_by('scheduledstarttime_c','asc')
      ->find_all();
    if($appointment_type == 'W'){
     // var_dump($booked_appointments);
    }
    return $booked_appointments;
  }
  public function cancel_appointment($appointmentid,$role,$representive){
    try{
			$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
      include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
      include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
			$obj_appointments = ORM::factory('appointment')//create appointment object
							->where('id','=',$appointmentid)
							->find();
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
				$obj_user = Auth::instance()->get_user();
				$objuserfornotfication="";
				$objAccounts	=ORM::factory('billingaccount');
				$objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_appointments->refappfromid_c)->find();
				if($role=="patient")//if role is patient then notification send to doctor.Create doctor object
				{
					//transfer money to patient account from ayushman account
					if($obj_appointments->paid_c == 1)
						$result = transaction::transfer( ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$obj_appointments->rate_c,7);
		
		
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
					$notification['id']=$obj_appointments->refappwithid_c;$notification['template']='appointmentcancel_bypatient';$notification['sms']='true'; $notification['drname']=$drname;$notification['mode']=$appointmentMode;$notification['appointmentdate']=$date1;$notification['appointmenttime']=$time1;
				}
				else if($role=="doctor")//if role is doctor then notification send to patient.Create patient object
				{
					//transfer money to patient account from ayushman account
					if($obj_appointments->paid_c == 1)
						$result = transaction::transfer( ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts['provisionaccountuserid'])->find()->accountcode_c,$objAccounts->accountcode_c,1,$obj_appointments->rate_c,7);
		
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
				if(($representive) == ''){}
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
					$date	= date_format( date_create($obj_appointments->scheduledstarttime_c),'d M Y H:i');
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
}
