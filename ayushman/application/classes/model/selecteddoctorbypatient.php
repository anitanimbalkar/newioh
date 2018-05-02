<?php defined('SYSPATH') or die('No direct script access.');
class Model_Selecteddoctorbypatient extends kohana_Ayushmanorm {
	protected $_table_name = 'selecteddoctorbypatient';	
	public function get_patients($term,$doctorid){
		
		if(is_numeric($term)){
			$patients = $this->where('doctorid','=',$doctorid)->where('mobilenumber','like','%'.$term.'%')->group_by('patientuserid')->find_all();
			$arr_patients = array();
			
			foreach($patients as $app){
				$temp = array();
				$temp['doctorid'] = $app->doctorid;
				$temp['patientid'] = $app->patientid;
				$temp['patientuserid'] = $app->patientuserid;
				$temp['patientname'] = ucwords($app->patientname);
				$temp['age'] = ($app->age == '0' || $app->age == null)?'':$app->age.' Yrs';
				$temp['email'] = $app->email;
				$temp['city_c'] = ($app->city_c == null)?'':ucfirst($app->city_c);
				$temp['location_c'] = ($app->location_c == null)?'':ucfirst($app->location_c);
				$temp['gender'] = ($app->gender == null)?'':ucfirst($app->gender);
				
				$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
				if(strtolower($temp['gender']) == 'male'){
					$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
				}else if(strtolower($temp['gender']) == 'female'){
					$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
				}
				if($app->photo != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$app->photo))){
					$app->photo = $defaultPhoto;
				}
				
				$temp['photo'] = ($app->photo == null)?$defaultPhoto:$app->photo;
				$temp['mobilenumber'] = ($app->mobilenumber == null)?'':$app->mobilenumber;
				
				array_push($arr_patients, $temp);
			}
		}else{
	
			$patients = $this->where('doctorid','=',$doctorid)->where('patientname','like','%'.$term.'%')->or_where('mobilenumber','like','%'.$term.'%')->group_by('patientuserid')->find_all();
			$arr_patients = array();
			foreach($patients as $app){
				$temp = array();
				$temp['doctorid'] = $app->doctorid;
				$temp['patientid'] = $app->patientid;
				$temp['patientuserid'] = $app->patientuserid;
				$temp['patientname'] = ucwords($app->patientname);
				$temp['age'] = ($app->age == '0' || $app->age == null)?'':$app->age.' Yrs';
				$temp['dob'] = $app->dateofbirth;
				$temp['city_c'] = ($app->city_c == null)?'':ucfirst($app->city_c);
				$temp['location_c'] = ($app->location_c == null)?'':ucfirst($app->location_c);
				$temp['photo'] = ($app->photo == null)?'/ayushman/assets/userphotos/pic02.png':$app->photo;
				$temp['mobilenumber'] = ($app->mobilenumber == null)?'':$app->mobilenumber;
				$temp['gender'] = ($app->gender == null)?'':ucfirst($app->gender);
				
				array_push($arr_patients, $temp);
			}
		}
		return $arr_patients;
	}
	
	public function get_regularpatients($doctorid){
		$patients = $this->where('doctorid','=',$doctorid)->order_by('noofappointments','DESC')->Limit (10)->find_all();
		$arr_patients = array();
		
		foreach($patients as $app){
			$temp = array();
			$temp['doctorid'] = $app->doctorid;
			$temp['patientid'] = $app->patientid;
			$temp['patientuserid'] = $app->patientuserid;
			$temp['patientname'] = ucwords($app->patientname);
			$temp['age'] = ($app->age == '0' || $app->age == null)?'':$app->age.' Yrs';
			$temp['email'] = $app->email;
			$temp['city_c'] = ($app->city_c == null)?'':ucfirst($app->city_c);
			$temp['location_c'] = ($app->location_c == null)?'':ucfirst($app->location_c);
			$temp['gender'] = ($app->gender == null)?'':ucfirst($app->gender);
			
			$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
			if(strtolower($temp['gender']) == 'male'){
				$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
			}else if(strtolower($temp['gender']) == 'female'){
				$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
			}
			if($app->photo != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$app->photo))){
				$app->photo = $defaultPhoto;
			}
			
			$temp['photo'] = ($app->photo == null)?$defaultPhoto:$app->photo;
			$temp['mobilenumber'] = ($app->mobilenumber == null)?'':$app->mobilenumber;
			
			array_push($arr_patients, $temp);
		}
		
		return $arr_patients;
	}
}