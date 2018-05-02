<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cuser extends Controller_Ctemplatewithoutmenu {

	public function action_login(){
		try{
			if (HTTP_Request::POST == $this->request->method())
			{
				$remember 	= array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;//we are not providing remember option so always false
				
				$userinfo = ORM::factory('user')->where('username','=',$this->request->post('email'))->find();
				$firstlogin = false;
				if($userinfo->id != null){
					$firstlogin = ($userinfo->last_login == null);
				}
				$user 		= Auth::instance()->login($this->request->post('email'), $this->request->post('password'), $remember);

				$message	= array();
				if ($user == "true"){
					$objUser	= ORM::factory('user')->where('username','=',$this->request->post('email'))->find();
					if($objUser->activationstatus_c === "inactivedoctor" || $objUser->activationstatus_c === "active" || $objUser->activationstatus_c === "activatedoctor"){
						if($firstlogin){
							Request::current()->redirect('cdashboard/view?fid=1');
						}else{
							Request::current()->redirect('cdashboard/view');
						}
					}else if($objUser->activationstatus_c = "inactivepathologist" || $objUser->activationstatus_c = "inactivechemist"){
						Auth::instance()->logout();
						session_unset();
						Request::current()->redirect('cregistrar/messageforinactivepathologist');
					}
					else{
						Auth::instance()->logout();
						session_unset();
						Request::current()->redirect('cregistrar/resendactivation');
					}
				}
				else{
					$message['email'] = 'The username or password you entered is incorrect.Please try again.';
					$this->loginfail($message);	
				}
			}else{
				Request::current()->redirect('cwelcome/index');
			}	
		}
		catch (Exception $e){
			throw new Exception($e);
		}
	}
	public function action_getdata(){
		if(isset($_GET['id'])){
			$user = Auth::instance()->get_user();
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$_GET['id'])->find();
				$doctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user->id)->find();
				$network = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patient->id)->where('reffavdocbypatdoctorsid_c','=',$doctor->id)->find();
				if($network->id != null){
					$object_user = ORM::factory('user')->where('id','=',$_GET['id'])->find();
				}else{
					$object_user = Auth::instance()->get_user(); 
				}			
			}else{
				$object_user = Auth::instance()->get_user(); 
			}
		}else{
			$object_user = Auth::instance()->get_user(); 
		}

		$reportsdata= New api_UploadReports;
		echo($reportsdata->getReportData($object_user)); die;
	}
	public function action_getcertificatesdata(){
		$patuserid=$_GET['patid'];
		$user = Auth::instance()->get_user();
		$finaldata['data']=array();
		if(isset($patuserid)){
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$objcertificates=ORM :: factory('certificate')->where('ref_userid_c','=',$patuserid)->where('createdby_c','=',$user->id)->find_all();
			}
			if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$objcertificates=ORM :: factory('certificate')->where('ref_userid_c','=',$patuserid)->find_all();
			}
			foreach($objcertificates as $obj){
				$data=array();
				$data["date"] = date("d M Y", strtotime($obj->createdon_c));
				$data['type']=$obj->cerficatetype;	
				$file = new helper_Files();
				$return = $file->getFilePath($obj->reffileid_c);
				if($return != ''){
					$data["filepath"]= '/ayushman/'.$return['abspath'];
				}else{
					$data["filepath"] = '';
				}
				array_push($finaldata['data'],$data);
			}
		}
		
		echo(json_encode($finaldata)); die;
	}
	public function action_logout(){
		try
		{
			Auth::instance()->logout();
			session_unset();
			Request::current()->redirect('');
		}
		catch (Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_logoutwithurl(){
		try
		{
			$pagename = $_GET['page'];
			$url = "home/".$pagename.".html";
			Auth::instance()->logout();
			session_unset();
			Request::current()->redirect($url);
		}
		catch (Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_floginwithid(){
		$dependentId = $_GET['id'];
		$objUser= ORM::factory('user')->where('id','=', $dependentId)->find();
		$user   = Auth::instance()->force_login($objUser->username);
		$session= Session::instance();
		Request::current()->redirect('crolechecker/index');
	}
	
	public function action_floginwithusername(){
		$dependentId = $_GET['username'];
		$objUser= ORM::factory('user')->where('username','=', $dependentId)->find();
		$user   = Auth::instance()->force_login($objUser->username);
		$session= Session::instance();
		Request::current()->redirect('crolechecker/index');
	}
	
	public function action_switchToDependent(){
		$encrypt = Encrypt::instance('default'); 
		$dependentId = urldecode($encrypt->decode($_GET['id']));
		$objPrimaryUser = Auth::instance()->get_user();
		$objPrimaryUser->refintrowizardid_c = 1;
		$objPrimaryUser->wizardstatus_c = 1;
		$objPrimaryUser->save();
		$primaryUsername = $objPrimaryUser->username;
		Auth::instance()->logout();
		session_unset();
		$objUser= ORM::factory('user')->where('id','=', $dependentId)->find();
		$user	= Auth::instance()->force_login($objUser->username);
		$session= Session::instance();
		$session->set('sourceUsername', $primaryUsername);
		Request::current()->redirect('crolechecker/index');
	}
	
	public function action_switchToPrimary(){
		$session= Session::instance();
		$primaryUsername = $session->get('sourceUsername');
		Auth::instance()->logout();
		session_unset();
		$user	= Auth::instance()->force_login($primaryUsername);
		$objUser = Auth::instance()->get_user();
		Request::current()->redirect('crolechecker/index');
	}
	public function action_uploadimages()
	{
		switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
    case 'HEAD':
    case 'GET':
        break;
    case 'POST':
    	error_reporting(E_ALL | E_STRICT);

		require('UploadImg.php');

		$upload_handler = new UploadImg();

		header('Pragma: no-cache');
		header('Cache-Control: no-store, no-cache, must-revalidate');
		/*header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');*/
		header('Access-Control-Allow-Origin: *');
		/*header('Access-Control-Allow-Methods: GET, POST');
		header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');*/
        $upload_handler->post();
        exit();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}
	}
	
	private function loginfail($message){
		try
		{
			$content=View::factory('vuser/vloginfail')
			->bind('message', $message);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
		catch (Exception $e)
		{
			throw new Exception($e);
		}	
	}

	public function action_getmyprofile(){
		if(isset($_GET['id'])){
			$user = ORM::factory('user')->where('id','=',$_GET['id'])->find();
		}else{
			$user = Auth::instance()->get_user();
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$objUser = new Model_User;
			$objdoctorpsecialization = new Model_Doctorspecialization;
			
			$objdoctorpracticedomain = new Model_Doctorpracticedomain;
			
			$objdoctoreducation = new Model_Doctoreducation;
			
			$objdoctorknownlanguage = new Model_Doctorknownlanguage;		
			
			$user_info['userinfo'] = $objUser->get_user_info();
			$user_info['userspecialization'] = $objdoctorpsecialization->get_doctor_specialization();
			
			$user_info['userdomain'] = $objdoctorpracticedomain->get_doctor_domain();
			$user_info['usereducation'] = $objdoctoreducation->get_doctor_education();
			$user_info['userknownlanguage'] = $objdoctorknownlanguage->get_doctor_knownlanguage();
			
			$object_doctor = new Model_Doctor();
			$doctor_id = $object_doctor->get_doctor_id($user_info['userinfo']['id']);
			$user_info['userinfo']['doctorid']=$doctor_id;
			$consultationViewObj = ORM::factory('consultationview')->where('refdoctorid_c','=',$doctor_id)->find_all();
			$arr = array();

				foreach($consultationViewObj as $view){
					array_push($arr,array($view->profilename_c,$view->id));
				}
			$user_info['con_profile'] = $arr;
			
			$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',$user_info['userinfo']['id'])->find();
			if($alternatebill->id == null){
				$alternatebill = ORM::factory('Alternatebill')->where('refiohid','=',-1)->find();
			}
			$user_info['billhtml'] = $alternatebill->filename_c;
			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		}else{
			$objUser = new Model_User;
		
			$user_info['userinfo'] = $objUser->get_info($user->id);

			$response = json_encode($user_info);
			header("Cache-Control: no-cache, must-revalidate");
			echo($response);
			die();
		
		}		
	}
}
