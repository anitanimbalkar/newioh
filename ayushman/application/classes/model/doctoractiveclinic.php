<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctoractiveclinic extends kohana_Ayushmanorm{
	protected $_table_name = 'doctoractiveclinics';
	public function get($userId=NULL){
		try{
			$objUser = new Model_User;
			if($userId==NULL){
				$user_info = $objUser->get_user_info();
			}
			else{
				$user_info = $objUser->get_info($userId);
			}

			$doctorid = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_info['id'])->find()->id;
			$clinics = $this->where('doctorid','=',$doctorid)->find_all();
			$arr_clinics = array();
			foreach($clinics as $app){
				$temp = array();
				$temp['doctorid'] = ucfirst($app->doctorid);
				$temp['clinicname'] = ucfirst($app->clinicname);
				$temp['line1'] = ucfirst($app->line1);
				$temp['nearmark'] = ucfirst($app->nearmark);
				$temp['location'] = ucfirst($app->location);
				$temp['city'] = ucfirst($app->city);
				$temp['state'] = ucfirst($app->state);
				$temp['pin'] = ucfirst($app->pin);
				$temp['isd'] = ucfirst($app->isd);
				$temp['phone'] = ucfirst($app->phone);
				array_push($arr_clinics, $temp);
			}
			return $arr_clinics;
		}catch(Exception $e){throw new Exception($e);}
	}
}