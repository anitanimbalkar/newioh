<?php defined('SYSPATH') or die('No direct script access.');
class Model_User extends Model_Auth_User {
	protected $_table_name = 'users';
	protected $_has_one = array('doctors' => array());
	
	public function save_userdetails($user){
	
		$returnValue	= array();
		$return			= array();
		try{
			$obj_user = $this->where('id','=',$user['id'])->find();
			if(isset($user['username'])){
				$obj_user->username = $user['username'];	
			}
			if(isset($user['uid'])){
				$obj_user->uid = $user['uid'];	
			}
			$obj_user->xmpppassword_c 		= $obj_user->password;
			$obj_user->lastname_c			= $user['lastname_c'];
			$obj_user->middlename_c			= $user['middlename_c'];
			$obj_user->Firstname_c			= $user['Firstname_c'];
			$obj_user->mobileno1_c			= $user['mobileno1_c'];
			$obj_user->profileeditdate_c	= date('Y-m-d');
			$obj_user->activationcode_c		= $user['activationcode_c'];
			$obj_user->activationstatus_c 	= $user['activationstatus_c'];
			$obj_user->refsecurityquestion_c= $user['refsecurityquestion_c'];
			$obj_user->securityanswer_c		= $user['securityanswer_c'];
			
			$obj_user->photo_c 				= "/ayushman/assets/userphotos/userphoto.png";
			$obj_user->accountcreatedby_c 	= $user['accountcreatedby_c'];
			$obj_user->save();
			
			$return['type'] = 'success';
			$return['data'] = $obj_user->id;
		}
		catch(Exception $e){
			$return['type'] = 'exception';
			$return['data'] = $e;
		}
		return $return;
	}
	
	public function rules()
	{
		return array(
			'username' => array(
				array('not_empty'),
				array('max_length', array(':value', 32)),
				array(array($this, 'unique'), array('username', ':value')),
			),
			'password' => array(
				array('not_empty'),
			),
			'email' => array(
				
				array('email'),
				//array(array($this, 'unique'), array('email', ':value')),
			),
		);
	}
	
	public function get_role_ids()
	{
		$obj_user = $this;
		$urole = array();
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				array_push($urole,1);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				array_push($urole,3);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'admin'))))
				array_push($urole,2);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
				array_push($urole,6);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
				array_push($urole,5);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
				array_push($urole,7);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
				array_push($urole,8);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
				array_push($urole,9);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdstaff'))))
				array_push($urole,11);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward'))))
				array_push($urole,12);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist'))))
				array_push($urole,13);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist'))))
				array_push($urole,14);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'hospitaladmin'))))
				array_push($urole,15);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sp_manager'))))
				array_push($urole,16);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_EMR_manage'))))
				array_push($urole,17);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'data_manager'))))
				array_push($urole,18);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ma'))))
				array_push($urole,19);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'mrkt_manager'))))
				array_push($urole,20);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'acct_manager'))))
				array_push($urole,21);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sales_manager'))))
				array_push($urole,22);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ex'))))
				array_push($urole,24);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exei'))))
				array_push($urole,25);
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exew'))))
				array_push($urole,26);
		return $urole;
	}	
	public function get_user_info(){
		try{
			$user = Auth::instance()->get_user()->as_array();
			if(! $user['id']){
				throw new HTTP_Exception_401;
			}
	
			$response = array();
			$response['id'] = $user['id'];
			$response['gender'] = $user['gender_c'];
			$response['email'] = $user['email'];
			$response['uid'] = $user['uid'];
			$response['mobile'] = $user['mobileno1_c'];
			$response['name'] = ucfirst($user['Firstname_c']).' '.ucfirst($user['lastname_c']);
			$response['activationstatus'] = $user['activationstatus_c'];

			$response['PatientGender'] = ($user['gender_c'] == null)?'':$user['gender_c'];
			
			$temp['PatientGender'] = ($user['gender_c'] == null)?'':$user['gender_c'];
			$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
			if(strtolower($temp['PatientGender']) == 'male'){
				$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
			}else if(strtolower($temp['PatientGender']) == 'female'){
				$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
			}
			if($user['photo_c'] != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$user['photo_c']))){
				$user['photo_c'] = $defaultPhoto;
			}
			$response['PatientPhoto'] = ($user['photo_c'] == null)?$defaultPhoto:$user['photo_c'];
			
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user['id'])->find();
			if($doctor->id != null){
				$response['regno'] = $doctor->RMPnumber_c;
				$response['doctorprofile'] = $doctor->doctorprofile_c;
			}
			return($response);
		}catch(Exception $e){throw new Exception($e);}
	}

	public function get_info($user_id){
		if($user_id == null){
			$user_id = Auth::instance()->get_user()->id; 
		}
		$user = $this->where('id','=',$user_id)->find()->as_array();
		$response = array();
		$response['id'] = $user['id'];
		$response['home_address_id'] = $user['refaddresshome1_c'];
		$response['gender'] = $user['gender_c'];
		$response['email'] = $user['email'];
		$response['uid'] = $user['uid'];
		$response['mobile'] = $user['mobileno1_c'];
		
		if($user['DOB_c']=='0000-00-00'){
			$age=0;
		}
		else{
			$birthDate =str_replace("-","/",$user['DOB_c']);
    	         //explode the date to get month, day and year
        	$birthDate = explode("/", $birthDate);
            	 //get age from date or birthdate
 	   		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));
        }
        $response['age'] = $age;
		
		$response['dob'] = $user['DOB_c'];
		$response['name'] = $user['Firstname_c'].' '.$user['lastname_c'];
		$response['activationstatus'] = $user['activationstatus_c'];

		$response['PatientGender'] = ($user['gender_c'] == null)?'':$user['gender_c'];
		
		$temp['PatientGender'] = ($user['gender_c'] == null)?'':$user['gender_c'];
		$defaultPhoto = '/ayushman/assets/userphotos/pic02.png';
		if(strtolower($temp['PatientGender']) == 'male'){
			$defaultPhoto = '/ayushman/assets/userphotos/male.jpg';
		}else if(strtolower($temp['PatientGender']) == 'female'){
			$defaultPhoto = '/ayushman/assets/userphotos/female.jpg';
		}
		if($user['photo_c'] != null && (!file_exists($_SERVER['DOCUMENT_ROOT'].$user['photo_c']))){
			$user['photo_c'] = $defaultPhoto;
		}
		$response['PatientPhoto'] = ($user['photo_c'] == null)?$defaultPhoto:$user['photo_c'];
		
		$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user['id'])->find();
		if($doctor->id != null){
			$response['regno'] = $doctor->RMPnumber_c;
			$response['doctorprofile'] = $doctor->doctorprofile_c;
		}
		$address = ORM::factory('Address')->where('id','=',$response['home_address_id'])->find();
		$response['location_c'] = $address->line1_c.' '.$address->location_c;
		$response['city_c'] = $address->city_c;
		
		return($response);
	}
	
	public function get_healthinfo($user_id){
	try{
		  $objectuser = new $this;
		$user=$objectuser->where('id','=',$user_id)->find()->as_array();
	return($user);
	}catch(Exception $e){throw new Exception($e);}
	}

	public function save_healthinfo($healthinfoarray,$patient_user_id){
	try{
		  $objectuser = new $this;
			$user=$objectuser->where('id','=',$patient_user_id)->find();
			$user->bloodgroup_c=$healthinfoarray[0];
			if(count($healthinfoarray)>1){
				if($healthinfoarray[1]=='Yes'){
					$user->handicap_c='true';
					$user->handicapby_c=$healthinfoarray[2];
				}
				else{
					$user->handicap_c='false';
					$user->handicapby_c='';
				}
			}
			else{
				$user->handicap_c='';
				$user->handicapby_c='';
			}
			$user->save();
	}catch(Exception $e){throw new Exception($e);}
	}
	
	public function getroledetails()
	{
		$obj_user = $this;
		$urole = array();
		
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
		{	
				$temp['id']=1;
				$temp['name']='doctor';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=1' style='font-size:15px' class='bodytext_normal'>Doctor </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
		{
				$temp['id']=3;
				$temp['name']='patient';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=3' style='font-size:15px'  class='bodytext_normal'>Patient </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'admin'))))
		{
				$temp['id']=2;
				$temp['name']='admin';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=2' style='font-size:15px' class='bodytext_normal'>Admin </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
		{
				$temp['id']=6;
				$temp['name']='chemist';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=6' style='font-size:15px' class='bodytext_normal'>Chemist </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
		{
				$temp['id']=5;
				$temp['name']='pathologist';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=5' style='font-size:15px' class='bodytext_normal'>Pathologist </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
		{
				$temp['id']=7;
				$temp['name']='staff';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=7' style='font-size:15px' class='bodytext_normal'>Staff </a>";			
				array_push($urole,$temp);
		}		
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
		{
				$temp['id']=8;
				$temp['name']='corporate';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=8' style='font-size:15px' class='bodytext_normal'>Corporate </a>";
				array_push($urole,$temp);
		}
				
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
		{
				$temp['id']=9;
				$temp['name']='serviceadmin';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=9' style='font-size:15px' class='bodytext_normal'>Service Admin </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdstaff'))))
		{
				$temp['id']=11;
				$temp['name']='ipdstaff';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=11' style='font-size:15px' class='bodytext_normal'>Cashier </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward'))))
		{
				$temp['id']=12;
				$temp['name']='ipdward';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=12' style='font-size:15px' class='bodytext_normal'>Ward </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist'))))
		{
				$temp['id']=13;
				$temp['name']='radiologist';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=13' style='font-size:15px' class='bodytext_normal'>Radiologist </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist'))))
		{
				$temp['id']=14;
				$temp['name']='physiologist';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=14' style='font-size:15px' class='bodytext_normal'>Physiologist </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'hospitaladmin'))))
		{
				$temp['id']=15;
				$temp['name']='hospitaladmin';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=15' style='font-size:15px' class='bodytext_normal'>Hospital Admin </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sp_manager'))))
		{
				$temp['id']=16;
				$temp['name']='sp_manager';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=16' style='font-size:15px' class='bodytext_normal'>Hospital Service Provider Manager </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_EMR_manage'))))
		{
				$temp['id']=17;
				$temp['name']='cons_EMR_manage';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=17' style='font-size:15px' class='bodytext_normal'>Hospital Consumer EMR Manager </a>";
				array_push($urole,$temp);  
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'data_manager'))))
		{
				$temp['id']=18;
				$temp['name']='data_manager';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=18' style='font-size:15px' class='bodytext_normal'>Hospital Database Manager</a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ma'))))
		{
				$temp['id']=19;
				$temp['name']='cons_support_ma';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=19' style='font-size:15px' class='bodytext_normal'>Hospital Consumer Support Manager </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'mrkt_manager'))))
		{
				$temp['id']=20;
				$temp['name']='mrkt_manager';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=20' style='font-size:15px' class='bodytext_normal'>Hospital Marketting Manager </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'acct_manager'))))
		{
				$temp['id']=21;
				$temp['name']='acct_manager';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=21' style='font-size:15px' class='bodytext_normal'>Hospital Account Manager </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sales_manager'))))
		{
				$temp['id']=22;
				$temp['name']='sales_manager';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=22' style='font-size:15px' class='bodytext_normal'>Sales Manager </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ex'))))
		{
				$temp['id']=24;
				$temp['name']='cons_support_ex';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=24' style='font-size:15px' class='bodytext_normal'>Consumer Support Executive </a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exei'))))
		{
				$temp['id']=25;
				$temp['name']='healthcare_exei';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=25' style='font-size:15px' class='bodytext_normal'>Healthcare Executive (Illness)</a>";
				array_push($urole,$temp);
		}
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exew'))))
		{
				$temp['id']=26;
				$temp['name']='healthcare_exew';
				$temp['link']="<a href='/ayushman/cdashboard/view?newroleid=26' style='font-size:15px' class='bodytext_normal'>Healthcare Executive (Wellness)</a>";
				array_push($urole,$temp);
		}
		return $urole;
	}	         
}
