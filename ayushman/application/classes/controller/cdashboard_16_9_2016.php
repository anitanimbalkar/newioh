<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cdashboard extends Controller_Ctemplatemenu  {

	public function action_view()
	{	
		$user = Auth::instance()->get_user();
	
		if (!$user)
		{
			// if a user is not logged in, redirect to login page
			Request::current()->redirect('cuser/login');
		}
		else
		{
			$arr_xmpp = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
			$obj_user = $user;
			$content = View::factory('vdashboard');
			$urole = '';
			if (!$obj_user)
				Request::current()->redirect('/home/index.shtml');
			else{
				if($obj_user->activationstatus_c == 'active' || $obj_user->activationstatus_c == 'inactivedoctor' || $obj_user->activationstatus_c == 'inactivepathologist' || $obj_user->activationstatus_c == 'inactivechemist' || $obj_user->activationstatus_c == 'inactive' || $obj_user->activationstatus_c == 'activatedoctor')
				{
					if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
						$urole = "doctor";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
						$urole = "patient";	
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'admin'))))
						$urole = "admin";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
						$urole = "chemist";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
						$urole = "pathologist";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
						$urole = "staff";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'corporate'))))
						$urole = "corporate";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'serviceadmin'))))
						$urole = "serviceadmin";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdstaff'))))
						$urole = "ipdstaff";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward'))))
						$urole = "ipdward";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist'))))
						$urole = "radiologist";
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist'))))
						$urole = "physiologist";
				}
				else
					Request::current()->redirect('/home/index.shtml');

			}
			$url = '';
			if($arr_xmpp['xmppregisteronlogin'] == 'true')
			$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
			$username = trim($obj_user->Firstname_c);
			if ($urole == 'patient')
			{	
				if(isset($_GET['fid'])){
					$isassociated= ORM::factory('corporatemember')->where('iohid_c','=',$user->id)->find()->id;
					if($isassociated)
					{
						$url='/ayushman/cplanselector/view';
					}
					else
					$url = '/ayushman/coffers/firstlogin';
				}else{
					$url =( !isset($_GET['url'])) ? '/ayushman/cpatientdashboard/view' : '/ayushman/'.$_GET['url'];
				}
				
			}else if($urole == 'doctor'){
				$url = '/cdoctordashboard/view?#dashboard';
				Request::current()->redirect($url);
				$username = "Dr. ".trim($obj_user->Firstname_c);
			}else if($urole == 'pathologist'){
				$url = '/ayushman/cpathologistdashboard/view';
			}else if($urole == 'chemist'){
				$url = '/ayushman/cchemistdashboard/view';
			}else if($urole == 'admin'){
				$url = '/ayushman/cadmindashboard/admindashboard';
			}else if($urole == 'staff'){
				$url =( !isset($_GET['url'])) ? '/ayushman/cstaffdashboard/view' : '/ayushman/'.$_GET['url'];
			}else if($urole == 'corporate'){
				//$url = '/ayushman/ccorporateaccountmanager/viewdashboard';
				$url = '/ayushman/ccorporatereports/view';
			}else if($urole == 'serviceadmin'){
				$url = '/ayushman/cpackagedashboard/view';
			}else if($urole == 'ipdstaff'){
				$url =( !isset($_GET['url'])) ? '/ayushman/cadmitpatient/view' : '/ayushman/'.$_GET['url'];
			}else if($urole == 'ipdward'){
				$url = '/ayushman/cipdwarddashboard/view';
			}else if($urole == 'radiologist'){
				$url = '/ayushman/cradiologistdashboard/view';
			}else if($urole == 'physiologist'){
				$url = '/ayushman/cphysiologistdashboard/view';
			}
			
			$path	= ORM::factory('wizardpaths')->where('id','=',$obj_user->wizardstatus_c)->find()->path_c;
			if($obj_user->wizardstatus_c != '1')
			{
				$url = '/ayushman/'.$path;	
			}
			if((( $obj_user->accountcreatedby_c == 'staff') || ( $obj_user->accountcreatedby_c == 'script'))&&($obj_user->isusernameset_c == ''))
			{	
				$url = '/ayushman/cchangepassword/scrituserview';		
			}
			$breadcrumb = "<a href='/ayushman/cdashboard/view' class='bodytext_normal'>Home >> </a>";
			$userid = $obj_user->id;
			$content->bind('userid', $userid);
			$content->bind('username', $username);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->url = $url;
			$this->template->user = $username;
			$this->template->urole = $urole;
		}
	}
	
	public function action_changedetails()
	{
		
		$obj_Authuser = Auth::instance()->get_user();
		$oldpassword=$obj_Authuser->password;
		if (HTTP_Request::POST == $this->request->method()) 
		{
			
			$userid = $_POST['userid'];
			$oldpass = $_POST['oldpassword'];
			$username = $_POST['username'];
			$newpass = $_POST['password'];
			$cnewpass = $_POST['password_confirm'];
			
 			$obj_user = new Model_User;
			$obj_user->where('id','=', $_POST['userid'])->find();
								
			$obj_validation = new Validation($_POST);	
			$obj_validation = Validation::factory($_POST) 						
                       ->rule('oldpassword', 'not_empty')
                        ->rule('password', 'min_length', array(':value', 8))
                        ->rule('password', 'max_length', array(':value', 20))
            		->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
 			if ($obj_validation->check())
 			{		
        		
				try
				{				
					if(Auth::instance()->hash($oldpass) == $obj_user->password )
					{
						$obj_user->update_user($_POST,array('password'));
						$userobj = ORM::factory('user')->where('id','=',$obj_user->id)->find();
						$userobj->username= $username;
						$userobj->isusernameset_c = 'yes';
						$userobj->save();
						Request::current()->redirect('/cdashboard/view');
					}
					else
					{
						$errors['oldpassword']='The password you gave is incorrect. ';
						//Request::current()->redirect('/cdashboard/view');
						var_dump($errors);
						die();
					}
				}
				catch (ORM_Validation_Exception $e) 
				{
					$errors = $e->errors('errors');
					
					var_dump($errors);
				}
			}
			else
			{
				$errors =$obj_validation->errors('errors');
				
				var_dump($errors);
				Request::current()->redirect('/cdashboard/view');
								//->bind('errors', $errors);
			}
			
		}
	}
}
