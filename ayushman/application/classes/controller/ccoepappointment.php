<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ccoepappointment extends Controller_Ctemplatewithoutmenu {
	public function action_generate()
        {
			 $obj_coepusers=ORM::factory('coepuser')->where('appid','=','new')->find_all();
			 $count = 0;
			 foreach($obj_coepusers as $obj_coepuser){
				 try{
						$appointment_object = ORM::factory('appointment');
						$appointment_object->refappfromid_c = $obj_coepuser->iohid;
						$appointment_object->refappwithid_c = $obj_coepuser->doctorid;

						$appointment_object->scheduledstarttime_c = date('Y-m-d h:i A', strtotime($obj_coepuser->date_c.' '.$obj_coepuser->time_c));
						$appointment_object->scheduledendtime_c = '';
						$appointment_object->displaytime_c =  date('Y-m-d h:i A', strtotime($obj_coepuser->date_c.' '.$obj_coepuser->time_c));
;
						$appointment_object->refincidentid_c = '2523';
						$appointment_object->refmode_c = 3;
						$appointment_object->consultationmode_c = 'In-Clinic';
						$appointment_object->rate_c	= 0;
						$appointment_object->refappointmentstatusesid_c = 2;
						$appointment_object->status_c	= "fromsystem";
						$appointment_object->paid_c     = 1;
						$appointment_object->usagecharges_c = 0;
					//	$appointment_object->appointmenttype_c = $appointment_type;
						$appointment_id = $appointment_object->save()->id;
						$obj_coepuser->appid = $appointment_id;
						$obj_coepuser->ispdfcreated = 'new';

						$obj_coepuser->save();
						echo '</br>'.$obj_coepuser->iohid." - ".$appointment_id;
						$count = $count+1;
						//echo '</br>'.$obj_coepuser->iohid;
					}
					catch (Exception $e)
					{
						var_dump($e);
					}
			}
			echo '<br/>count -- '.$count;
			die('done');
     }
}
