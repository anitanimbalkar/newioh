<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Logincontroller extends Controller_Basewebservice {	

	public function action_login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$remember = $_POST['remember'];		
		
		$array_data=array();
		session_cache_limiter('private');
		session_cache_expire(1);
		$user = Auth::instance()->login($username,$password,$remember);
		
		if ($user=="true") 
		{
			$user = Auth::instance()->get_user();
			if($user->activationstatus_c === "active")
			{
				$array_data["type"]="success";
				$array_data["data"]= session_id();
				$array_data["firstname"] = $user->Firstname_c;
				$array_data["lastname"] = $user->lastname_c;
				$array_data["id"] = $user->id;
				$array_data["photo"] = $user->photo_c;
				$array_data["username"] = $username;
				$array_data["password"] = $password;
				
				$userRoles= ORM::factory('roleuser')->where('user_id','=',$user->id)->where('role_id','!=','4')->find();
				$array_data["role"] = $userRoles->role_id;
				
				if($userRoles->role_id == 1)
				{
					$doctorsId= ORM::factory('doctor')->get_doctor_id($user->id);
					$array_data["roleSpecificId"] = "" . $doctorsId;
				}
				else if($userRoles->role_id == 3)
				{
					$patientsId= ORM::factory('patient')->get_patient_id($user->id);
					$array_data["roleSpecificId"] = "" . $patientsId;
				}
			}
			else
			{
				$array_data["type"]="error";
				$array_data["data"]="Your account is not activated yet.";
			}
		} 
		else 
		{
			$array_data["type"]="error";
			$array_data["data"]="The username or password you entered is incorrect.";
		}
		$this->content= $array_data;
		return $this->content;
	}
	
}