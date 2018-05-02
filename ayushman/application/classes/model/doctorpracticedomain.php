<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorpracticedomain extends kohana_Ayushmanorm {
protected $_table_name = 'doctorpracticedomains';	

	public function get_doctor_domain($userId=NULL){
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
				$doctorpracticedomain=$this->where('refdocpracticedomainddoctorid_c','=',$doctor->id)->find_all();
				$string=null;
				foreach($doctorpracticedomain as $val){
				
					$doctordomainmaster=ORM::factory('doctordomainmaster')->where('id','=',$val->refdoctordomainmasterdomainid_c)->find();
					
					$string=$string.$doctordomainmaster->domain_c.', ';
				}
			
			}
			$response['doctordomain'] = $string;
			
			return($response);
		}catch(Exception $e){throw new Exception($e);}
	}

}