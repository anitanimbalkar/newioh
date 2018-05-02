<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Csettings extends Controller_Ctemplatewithmenu {
	public function action_chemist()
	{
		$user = Auth::instance()->get_user();
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$chemists = ORM::factory('favoritechemistbypatientdetail')->where('roleid','=',$patient->id)->order_by('priority','ASC')->find_all();
		
		$permission = $patient->allowedtoplacemedicineorder_c;
		
		$content = View::factory('vuser/vchemist/vchemistsettings');
		$content->bind('chemists',$chemists);
		$content->bind('permission',$permission);
		$this->template->content = $content;
	}
	public function action_automaticorderforchemist()
	{
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$permission = $patient->allowedtoplacemedicineorder_c;
		echo $permission;
		die;
	}
	public function action_automaticorderfordc()
	{
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$permission = $patient->allowedtoplacepathorder_c;
		echo $permission;
		die;
	}
	public function action_pathologist()
	{
		$user = Auth::instance()->get_user();
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$pathologists = ORM::factory('favouritepathologistsbypatientdetail')->where('roleid','=',$patient->id)->order_by('priority','ASC')->find_all();
		
		$permission = $patient->allowedtoplacepathorder_c;
		
		$content = View::factory('vuser/vpathologist/vpathologistsettings');
		$content->bind('pathologists',$pathologists);
		$content->bind('permission',$permission);
		$this->template->content = $content;
	}
	public function action_setchemistpriority(){
		$user = Auth::instance()->get_user();
		$urole = '';
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$urole = "doctor";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			$urole = "patient";	
		else if ($user->has('roles', ORM::factory('role', array('name' => 'admin'))))
			$urole = "admin";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
			$urole = "chemist";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
			$urole = "pathologist";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'staff'))))
			$urole = "staff";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
			$urole = "corporate";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
			$urole = "serviceadmin";
		
		if($urole == 'patient'){
			$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
			
			$favChemist = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$patient->id)
							->where('reffavchembypatchemistsid_c','=',$_GET['chemist'])->find();
							
			$favChemist->prefered_c = $_GET['index'];
			$favChemist->save();
		}else if($urole == 'staff'){
			$staff = ORM::factory('staff')->where('refstaffuserid_c','=',$user->id)->find();
		
			$favChemist = ORM::factory('favoritechemistbystaff')->where('reffavstaffid_c','=',$staff->id)
							->where('reffavchemistid_c','=',$_GET['chemist'])->find();
							
			$favChemist->prefered_c = $_GET['index'];
			$favChemist->save();
			
		}else if($urole == 'doctor'){
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
		
			$favChemist = ORM::factory('favoritechemistbydoctor')->where('reffavchembydocdoctorsid_c','=',$doctor->id)
							->where('reffavchembydocchemistsid_c','=',$_GET['chemist'])->find();
							
			$favChemist->prefered_c = $_GET['index'];
			$favChemist->save();
			
		}
		
		die;
	}
	public function action_setpathologistpriority(){
	
		$user = Auth::instance()->get_user();
		$urole = '';
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$urole = "doctor";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
			$urole = "patient";	
		else if ($user->has('roles', ORM::factory('role', array('name' => 'admin'))))
			$urole = "admin";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
			$urole = "chemist";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
			$urole = "pathologist";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'staff'))))
			$urole = "staff";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
			$urole = "corporate";
		else if ($user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
			$urole = "serviceadmin";
		
		if($urole == 'patient'){
			$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		
			$favPathologist = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c','=',$patient->id)
							->where('reffavpathopathologistsid_c','=',$_GET['pathologist'])->find();
							
			$favPathologist->prefered_c = $_GET['index'];
			$favPathologist->save();
		}else if($urole == 'staff'){
			$staff = ORM::factory('staff')->where('refstaffuserid_c','=',$user->id)->find();
		
			$favPathologist = ORM::factory('favoritepathologistbystaff')->where('reffavstaffid_c','=',$staff->id)
							->where('reffavpathologistid_c','=',$_GET['pathologist'])->find();
							
			$favPathologist->prefered_c = $_GET['index'];
			$favPathologist->save();
			
		}
		else if($urole == 'doctor'){
			$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
		
			$favPathologist = ORM::factory('favoritepathologistsbydoctor')->where('reffavpathdoctorsid_c','=',$doctor->id)
							->where('reffavpathpathologistsid_c','=',$_GET['pathologist'])->find();
							
			$favPathologist->prefered_c = $_GET['index'];
			$favPathologist->save();
			
		}
		
		die;
	}
	public function action_setpermission(){
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}		

		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$patient->allowedtoplacemedicineorder_c = $_GET['permission']=='true'?1:0;
		$patient->save();
		echo $patient->allowedtoplacemedicineorder_c;
		die;
	}
	public function action_setDiagnosticLabpermission(){
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}	
		$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
		$patient->allowedtoplacepathorder_c = $_GET['permission']=='true'?1:0;
		$patient->save();
		die;
	}
	
	public function action_sendotpforpermission(){
		if(isset($_GET['pid'])){
			$user = ORM::factory('user')->where('id','=',$_GET['pid'])->find();
			$code = substr(md5(microtime()),rand(0,26),4);
			$session= Session::instance();
			$otpname = 'otp'.$_GET['pid'];
			$session->set($otpname, $code);
			$notification=  array();
			$notification['id']=$user->id;
			$notification['template']='registration';
			$notification['email']='true';
			$notification['username']=$user->Firstname_c;
			$notification['code']=$code;
			$notification['sms']='true';
			helper_notificationsender::sendnotification($notification);
			
			echo 'done';die;
		}		
		die;
	}
	public function action_checkotpforpermission(){
		if(isset($_GET['pid'])){
			$session= Session::instance();
			$otpname = 'otp'.$_GET['pid'];
			$sessionotp = $session->get($otpname);
			$otp = $_GET['otp'];
			if( $otp == $sessionotp ){
				echo 'done';die;
			}			
		}		
		die;
	}
}
