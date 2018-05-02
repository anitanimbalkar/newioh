<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorspecialization extends kohana_Ayushmanorm {
protected $_table_name = 'doctorspecializations';	


	public function get_doctor_specialization($userId=NULL){
		try{
			
			if($userId==NULL){
				$user = Auth::instance()->get_user()->as_array();
				if(! $user['id']){
					throw new HTTP_Exception_401;
				}
				$userId = $user['id'];
			}
			
			$response = array();
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->find();
			
			$string = "";
			if($doctor->id != null){
				$doctorspecialization=$this->where('refdoctorspecializationdoctorid_c','=',$doctor->id)->find_all();
				$string=null;
				foreach($doctorspecialization as $val){
				
					$doctorspecializationmaster=ORM::factory('doctorspecializationmaster')->where('id','=',$val->refdoctorspecializationid_c)->find();
					
					$string=$string.$doctorspecializationmaster->specialization_c.', ';
				}
			
			}
			$response['doctorspecialization'] = $string;

			return($response);
		}catch(Exception $e){throw new Exception($e);}
	}

}