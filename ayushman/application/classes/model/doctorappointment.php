<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorappointment extends kohana_Ayushmanorm {
//it is a view in ayushmandb datbase
	protected $_table_name = 'doctorappointment';	

	public function get_app_info($appointment_id){
	  return ($this->where('appointment_id','=',$appointment_id)->find()->as_array());
	}
	public function get_apps($user_id,$status){
		$apps = $this->where('doctorid','=',$user_id)->where('Appointmentstatus','=',$status)->order_by('dateandtime_dateformate', 'ASC')->find_all();
		$arr_apps = array();
		foreach($apps as $app){
			$temp = array();
			$appointments = ORM::factory('appointment')->where('refincidentid_c','=',$app->incidentid)->find_all();
			$temp['type']='First Time';
			if(count($appointments) > 1){
				$temp['type']='Follow Up';
			}
			
			$temp['appointment_id'] = $app->appointment_id;
			$temp['Appointmentstatus'] = $app->Appointmentstatus;
			$temp['refappfromid_c'] = $app->refappfromid_c;
			$temp['mode'] = $app->mode;
			$temp['doctorid'] = $app->doctorid;
			$temp['DateAndTime'] = $app->DateAndTime;
			$temp['endConsultDate'] = $app->endConsultDate;  // modified to show end consult date on past prescription
			$temp['Patientname'] = $app->Patientname;
			$temp['PatientContactNumber'] = $app->PatientContactNumber;
			$temp['PatientGender'] = ($app->PatientGender == null)?'':$app->PatientGender;
			$temp['description'] = $app->description;
			$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
			if(strtolower($temp['PatientGender']) == 'male'){
				$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
			}else if(strtolower($temp['PatientGender']) == 'female'){
				$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
			}
			
			if($app->PatientPhoto != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$app->PatientPhoto))){
				$app->PatientPhoto = $defaultPhoto;
			}
			$temp['PatientPhoto'] = ($app->PatientPhoto == null)?$defaultPhoto:$app->PatientPhoto;
			$temp['incidentsname_c'] = $app->incidentsname_c;
			$temp['age'] = ($app->age == '0 Yrs.')?'':$app->age;
			$temp['isfollowup'] = ($app->profileid == null)?'0':'1';
			array_push($arr_apps, $temp);
		}
		return $arr_apps;
	}
	public function get_apps_desc($user_id,$status){
		$apps = $this->where('doctorid','=',$user_id)
			->where('Appointmentstatus','=',$status)
			->order_by('endConsultDate', 'DESC')->find_all();
		$arr_apps = array();
		foreach($apps as $app){
			$temp = array();
			$appointments = ORM::factory('appointment')->where('refincidentid_c','=',$app->incidentid)->find_all();
			$temp['type']='First Time';
			if(count($appointments) > 1){
				$temp['type']='Follow Up';
			}
			
			$temp['appointment_id'] = $app->appointment_id;
			$temp['Appointmentstatus'] = $app->Appointmentstatus;
			$temp['refappfromid_c'] = $app->refappfromid_c;
			$temp['mode'] = $app->mode;
			$temp['doctorid'] = $app->doctorid;
			$temp['DateAndTime'] = $app->DateAndTime;
			$temp['endConsultDate'] = $app->endConsultDate;  // modified to show end consult date on past prescription
			$temp['Patientname'] = $app->Patientname;
			$temp['PatientContactNumber'] = $app->PatientContactNumber;
			$temp['PatientGender'] = ($app->PatientGender == null)?'':$app->PatientGender;
			$temp['description'] = $app->description;
			$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
			if(strtolower($temp['PatientGender']) == 'male'){
				$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
			}else if(strtolower($temp['PatientGender']) == 'female'){
				$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
			}
			
			if($app->PatientPhoto != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$app->PatientPhoto))){
				$app->PatientPhoto = $defaultPhoto;
			}
			$temp['PatientPhoto'] = ($app->PatientPhoto == null)?$defaultPhoto:$app->PatientPhoto;
			$temp['incidentsname_c'] = $app->incidentsname_c;
			$temp['age'] = ($app->age == '0 Yrs.')?'':$app->age;
			$temp['isfollowup'] = ($app->profileid == null)?'0':'1';
			array_push($arr_apps, $temp);
		}
		return $arr_apps;
	}
}

/*
delimiter $$

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctorappointment` AS 
select `appointments`.`id` AS `appointment_id`,
`appointments`.`refappfromid_c` AS `refappfromid_c`,
concat(ucase(left(`appointments`.`consultationmode_c`,1)),substr(`appointments`.`consultationmode_c`,2)) AS `mode`,
(select `doctors`.`refdoctorsid_c` from `doctors` where (`doctors`.`id` = `appointments`.`refappwithid_c`)) AS `doctorid`,
`appointments`.`displaytime_c` AS `dateandtime_dateformate`,
date_format(`appointments`.`displaytime_c`,'%d %b %Y  %H:%i') AS `DateAndTime`,
(select concat(`users`.`Firstname_c`,' ',`users`.`lastname_c`) from `users` where (`users`.`id` = `appointments`.`refappfromid_c`)) AS `Patientname`,
(select concat('+',`users`.`isdmobileno1_c`,' ',`users`.`mobileno1_c`) from `users` where (`users`.`id` = `appointments`.`refappfromid_c`)) AS `PatientContactNumber`,
(select `users`.`gender_c` from `users` where (`users`.`id` = `appointments`.`refappfromid_c`)) AS `PatientGender`,
(select `users`.`photo_c` from `users` where (`users`.`id` = `appointments`.`refappfromid_c`)) AS `PatientPhoto`,
(select concat((date_format(from_days((to_days(now()) - to_days(`users`.`DOB_c`))),'%Y') + 0),' Yrs.') from `users` where (`users`.`id` = `appointments`.`refappfromid_c`)) AS `age`,
`incidents`.`incidentsname_c` AS `incidentsname_c`,
(select `appointmentstatuses`.`appointmentstatuses_c` from `appointmentstatuses` where (`appointmentstatuses`.`id` = `appointments`.`refappointmentstatusesid_c`)) AS `Appointmentstatus`,
`appointments`.`paid_c` AS `paid_c` from (`appointments` join `incidents` on((`appointments`.`refincidentid_c` = `incidents`.`id`)))

$$

*/