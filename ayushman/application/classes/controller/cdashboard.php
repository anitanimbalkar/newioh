<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cdashboard extends Controller_Ctemplatemenu  {

	public function action_view()
	{	
		$user = Auth::instance()->get_user();
		if(isset($_GET['newroleid']))
			$newroleid = $_GET['newroleid'];
		else
			$newroleid = '';
		
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
					if($newroleid == '')
					{
						if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
							$urole = "doctor";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
						{
							$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$obj_user->id)->find();
							if($objpatient->refhospitalid_c != null)
								$urole = "hospitalpatient";	
							else
								$urole = "patient";
							$objIndividualPlans = new Model_Billingindividualplan;
							$objIndividualPlans->where('refusersid_c','=', $obj_user->id)->where('status_c','=', 'active')->find();
							if(!$objIndividualPlans->loaded())
								$urole = "patientwoplan";
							if(($obj_user->id) == 20244)
								$urole = "patientadmin";
						}
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
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'hospitaladmin'))))
							$urole = "hospitaladmin";
						
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sp_manager'))))
							$urole = "sp_manager";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_EMR_manage'))))
							$urole = "cons_EMR_manage";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'data_manager'))))
							$urole = "data_manager";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ma'))))
							$urole = "cons_support_ma";						
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'mrkt_manager'))))
							$urole = "mrkt_manager";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'acct_manager'))))
							$urole = "acct_manager";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'sales_manager'))))
							$urole = "sales_manager";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'cons_support_ex'))))
							$urole = "cons_support_ex";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exei'))))
							$urole = "healthcare_exei";
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'healthcare_exew'))))
							$urole = "healthcare_exew";
					}
					else
					{
						if ($newroleid == 1)
							$urole = 'doctor';
						else if ($newroleid == 2)
							$urole = 'admin';
						else if ($newroleid == 3)
						{
							$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$obj_user->id)->find();
							if($objpatient->refhospitalid_c != null)
								$urole = "hospitalpatient";	
							else
								$urole = "patient";
							$objIndividualPlans = new Model_Billingindividualplan;
							$objIndividualPlans->where('refusersid_c','=', $obj_user->id)->where('status_c','=', 'active')->find();
							if(!$objIndividualPlans->loaded())
								$urole = "patientwoplan";
							if(($obj_user->id) == 20244)
								$urole = "patientadmin";
						}
						else if ($newroleid == 5)
							$urole = 'pathologist';
						else if ($newroleid == 6)
							$urole = 'chemist';
						else if ($newroleid == 7)
							$urole = 'staff';
						else if ($newroleid == 8)
							$urole = 'corporate';
						else if ($newroleid == 9)
							$urole = 'serviceadmin';
						else if ($newroleid == 11)
							$urole = 'ipdstaff';
						else if ($newroleid == 12)
							$urole = 'ipdward';
						else if ($newroleid == 13)
							$urole = 'radiologist';
						else if ($newroleid == 14)
							$urole = 'physiologist';
						else if ($newroleid == 15)
							$urole = 'hospitaladmin';							
						else if ($newroleid == 16)
							$urole = 'sp_manager';	
						else if ($newroleid == 17)
							$urole = 'cons_EMR_manage';
						else if ($newroleid == 18)
							$urole = 'data_manager';
						else if ($newroleid == 19)
							$urole = 'cons_support_ma';
						else if ($newroleid == 20)
							$urole = 'mrkt_manager';
						else if ($newroleid == 21)
							$urole = 'acct_manager';
						else if ($newroleid == 22)
							$urole = 'sales_manager';
						else if ($newroleid == 24)
							$urole = 'cons_support_ex';
						else if ($newroleid == 25)
							$urole = 'healthcare_exei';
						else if ($newroleid == 26)
							$urole = 'healthcare_exew';
					}
				}
				else
					Request::current()->redirect('/home/index.shtml');

			}
			$url = '';
			if($arr_xmpp['xmppregisteronlogin'] == 'true')
			$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
			$username = trim($obj_user->Firstname_c);
			
			$arrayroles = $obj_user->getroledetails();
			
			if ($urole == 'patient' || $urole == 'hospitalpatient' || $urole == 'patientwoplan' ||  $urole == 'patientadmin')
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
				$url = '/cdoctordashboard/view?#doctordashboardlanding';
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
				$url =( !isset($_GET['url'])) ? '/ayushman/ccashierdashboard/view' : '/ayushman/'.$_GET['url'];
			}else if($urole == 'ipdward'){
				$url = '/ayushman/cipdwarddashboard/view';
			}else if($urole == 'radiologist'){
				$url = '/ayushman/cradiologistdashboard/view';
			}else if($urole == 'physiologist'){
				$url = '/ayushman/cphysiologistdashboard/view';
			}else if($urole == 'hospitaladmin'){
				$url = '/chospitaladmindashboard/view?#hospitaladmindashboard';
				Request::current()->redirect($url);
				$username = trim($obj_user->Firstname_c);
			}else if($urole == 'sp_manager'){
				$url = '/ayushman/cspmanagerdashboard/spmanagerdashboard';
			}else if($urole == 'cons_EMR_manage'){
				$url = '/ayushman/cayushusers/view';
			}else if($urole == 'data_manager'){
				$url = '/ayushman/cmasterdatavalidation/view';
			}else if($urole == 'cons_support_ma'){
				$url = '/ayushman/cconssupportmanagerdashboard/view';
			}else if($urole == 'cons_support_ex'){				
				$url = '/ayushman/cconssupportexecutive/view';
			}else if($urole == 'mrkt_manager'){
				$url = '/ayushman/cplanmanager/view';
			}else if($urole == 'acct_manager'){
				$url = '/ayushman/ccashreceipt/view';
			}else if($urole == 'sales_manager'){
				$url = '/ayushman/crelativebycse/viewaddrelative';
			}else if($urole == 'healthcare_exei'){
				$url = '/ayushman/cchangepassword/changepassword';
			}else if($urole == 'healthcare_exew'){
				$url = '/ayushman/cchangepassword/changepassword';
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
			$this->template->arrayroles = $arrayroles;
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
