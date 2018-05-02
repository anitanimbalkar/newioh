<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Csendsmsbyatjob extends Controller  {
	public function action_send()
	{
		$appointmentId =  $this->request->param('id');
		$appointment_object = orm::factory('patientappointments')->where('id','=',$appointmentId)->find();
		$notification=  array();
		$notification['id']=$appointment_object->userid;
		$notification['template']='appointment_reminder';
		$notification['sms']='true';
		$doctor_user_object = ORM::factory('user')->where('id' ,'=', $appointment_object->druserid_c)->find();
		$doctor_name = $doctor_user_object->Firstname_c.' '.$doctor_user_object->lastname_c;
		$notification['drname']= $doctor_name;
		$date_and_time	= $appointment_object->DateAndTime;
		$array_output = explode(" ", $date_and_time);
		$notification['time']= $array_output[3];
		$notification['date']= "".$array_output[0]." ".$array_output[1]." ".$array_output[2];
		$notification['mode']= $appointment_object->mode;
		$notificationsender = new helper_notificationsender();
		$notificationsender->sendnotification($notification);
        }       
}   
