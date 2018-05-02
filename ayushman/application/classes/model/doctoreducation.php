<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctoreducation extends kohana_Ayushmanorm {
//it is a view in ayushmandb datbase
protected $_table_name = 'doctoreducations';	

	public function get_doctor_education($userId=NULL){
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
		$string = '';
			if($doctor->id != null){
				$doctoreducations=$this->where('refdocedudoctorsid_c','=',$doctor->id)->find_all();
				$string='';
				$sortArray = array();
				foreach($doctoreducations as $val){
					$educationmasters=ORM::factory('educationmaster')->where('id','=',$val->refeducationid_c)->find();
					if(isset($sortArray[$educationmasters->level_c])){
						$sortArray[$educationmasters->level_c] = $sortArray[$educationmasters->level_c].', '.$educationmasters->education_c; 
					}else{
						$sortArray[$educationmasters->level_c] = $educationmasters->education_c; 
					}
				}
				foreach($sortArray as $val){
					if($string == ''){
						$string = $val;
					}else{
						$string = $string.', '.$val;
					}					
				}
			}
			$response['doctoreducation'] = $string;
			
			return($response);
		}catch(Exception $e){throw new Exception($e);}
	}

}