<?php defined('SYSPATH') or die('No direct script access.');
class Model_roleuser extends kohana_Ayushmanorm {
protected $_table_name = 'roles_users';

	public function get_userRole($userid){
		try{
			$objroles=$this->where('user_id','=',$userid)->find_all();
			$val=' ';
			foreach($objroles as $role){
				$userRole=ORM::factory('role')->where('id','=',$role->role_id)->find();
				if($userRole->name=='doctor'){
					$val='doctor';	
					break;
				}
				else if($userRole->name=='patient'){
					$val='patient';
					break;	
				}
				else{
					$val=$userRole->name;
				}
			}
		return($val);
		}catch(Exception $e){throw new Exception($e);}
	}
}