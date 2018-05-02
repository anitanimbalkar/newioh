<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorknownlanguage extends kohana_Ayushmanorm{
protected $_table_name = 'doctorknownlanguages';	

	public function get_doctor_knownlanguage($userId=NULL){
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
				$doctorknownlanguages=$this->where('refdocknownlangdoctorid_c','=',$doctor->id)->find_all();
				$string=null;
				foreach($doctorknownlanguages as $val){
				
					$languagemasters=ORM::factory('languagemaster')->where('id','=',$val->refdocknownlanglanguageid_c)->find();
					
					$string=$string.$languagemasters->language_c.', ';
				}
			
			}
			$response['doctorknownlanguage'] = $string;
			
			return($response);
		}catch(Exception $e){throw new Exception($e);}
	}

}