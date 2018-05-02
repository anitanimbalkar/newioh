<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cscripttoactivateaccount extends Controller_Ctemplatewithoutmenu {

	// Show Registration form
	public function action_view()
	{
		$errors = array();
		$this->displayregistrationform($errors);
	}
	
	// bind registration form view 
	private function displayregistrationform($errors)
	{
		try{
		 	$objSecurityQuestions 	= ORM::factory('securityquestionmaster')->get_questions();
			$arrSecurityQuestions = array();
			if($objSecurityQuestions['type'] == 'success')
				$arrSecurityQuestions = $objSecurityQuestions['data'];
			else if($objSecurityQuestions['type'] == 'exception')
				throw new Exception($objSecurityQuestions['data']);
			else
				throw new Exception($objSecurityQuestions['data']);

			$content = View::factory('vuser/vregistration/vregistrationform')->bind('errors', $errors);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content 	= $content;
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	// Register user when user fills Registration form and clicks on Register Button
	public function action_register()
	{
		if (HTTP_Request::POST == $this->request->method()){
			try{
				$session = Session::instance();
				$obj_validation = new Validation($_POST);
				$security_code = $session->get('captchasecuritycode');
				$obj_validation = Validation::factory($_POST) 
            			->rule('verificationcode', 'not_empty')
            			->rule('verificationcode', 'equals', array(':value', $security_code));
			
				if ($obj_validation->check())
				{
					$retainValue 	=	array();
					$retainValue['firstname']	= $this->request->post('firstname');
					$retainValue['middlename']	= $this->request->post('middlename');
					$retainValue['lastname']	= $this->request->post('lastname');
					$retainValue['mobilenumber']= $this->request->post('mobilenumber');

					$arrPost 			= $this->request->post();
					$arrPost['username']= $this->request->post('email');
					
					// add 'login' and 'role of the user' roles in roles_users table 
					$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$userrole	= $this->request->post('accounttype'); 
					$user->add('roles', ORM::factory('role', array('name' => $userrole)));
					$email	= $this->request->post('email'); 

					$arr_user = array();
					$arr_user['middlename_c']	= trim($this->request->post('middlename'));
					$userrole = $this->request->post('accounttype');
					switch ($userrole) {
						case 'patient':$obj_patient=ORM::factory('patient');
										$obj_patient->repatientsuserid_c = $user->id;
										$obj_patient->save();
										$arr_user['activationstatus_c']	= "inactive";
										break;
						case 'doctor':$obj_doctor=ORM::factory('doctor');
										$obj_doctor->refdoctorsid_c = $user->id;
										$obj_doctor->save();
										$arr_user['activationstatus_c']	= "inactivedoctor";
										break;
						case 'pathologist':$obj_pathologist=ORM::factory('pathologist');
										$obj_pathologist->refpathologistsuserid_c = $user->id;
										$obj_pathologist->save();
										$arr_user['activationstatus_c']	= "inactivepathologist";
										break;
						case 'chemist':$obj_chemists=ORM::factory('chemist');
										$obj_chemists->refchemistsuserid_c = $user->id;
										$obj_chemists->save();
										$arr_user['activationstatus_c']	= "inactivechemist";
										break;
						case 'staff':$obj_staffs=ORM::factory('staff');
										$obj_staffs->refstaffuserid_c = $user->id;
										$obj_staffs->save();
										$arr_user['activationstatus_c']	= "inactive";
										break;
					}
					$activationcode	=  md5(uniqid(rand(), true));
					$arr_user['lastname_c'] 		= trim($this->request->post('lastname'));
					$arr_user['Firstname_c']		= trim($this->request->post('firstname'));
					$arr_user['mobileno1_c']		= trim($this->request->post('mobilenumber'));
					$arr_user['email']				= $email;
					$arr_user['refsecurityquestion_c']= $this->request->post('securequestion');
					$arr_user['securityanswer_c']	= trim($this->request->post('secureanswer'));
					$arr_user['accountcreatedby_c']	= $this->request->post('accountcreatedby') ;
					$arr_user['activationcode_c']	=  $activationcode;
					$returned_value = ORM::factory('user')->save_userdetails($arr_user);
					if($returned_value['type'] == 'exception')
						throw new Exception($returned_value['data']);
					
					$this->sendregistrationemail($email,$activationcode,$this->request->post('firstname'),$userrole);
					
					$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();
					$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);

					$username = $this->request->post('firstname');
					$message = "Thank you very much for creating an account with <strong><i>IndiaOnlineHealth.com</i></strong>.<br/>We have sent an email to your registered email address. Please follow the instructions in that email to activate your account.<br/>Please ensure to check your spam folders in case you have not received the mail with activation instructions.<br/>Please add support@indiaonlinehealth.com to your address book and to safe senders list so that the mails that we send reach you.<br/>If you do not find your activation email in spam folder as well, please mail us at <strong><i>support@indiaonlinehealth.com</i></strong>. We would be glad to respond to you at the earliest.";
					$this->acknowledge_registration($username,$message);
				}else{
					//return to the registration form with errors
					$errors = $obj_validation->errors('errors');
					if($errors['verificationcode'])
					{
						$errors['verificationcode']="Verification code doesn't match";
					}
					$this->displayregistrationform($errors);
				}
			} 
			catch (Exception $e)
			{
				throw new Exception($e);
			}
		}	
	}
	
	// resend activation mail if user does not receive activation mail
	public function action_resendactivation()
	{
			$error=array();
			$this->resendactivationview($error);
	}
	
	private function  resendactivationview($error)
	{
		try
		{
			$obj_user = Auth::instance()->get_user();	
			$email=$obj_user->email;
			$content = View::factory('vuser/vregistration/vresendaccountactivationform')
						->bind('error', $error)
						->bind('email', $email);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration</a>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content 	= $content;
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// submit resend activation form when user fills email id and capcha
	public function action_submitresendaccountactivationform()
	{
		try{
				$session = Session::instance();
				$obj_validation = new Validation($_POST);
				$security_code = $session->get('captchasecuritycode');
				$obj_validation = Validation::factory($_POST) 
						->rule('verificationcode', 'not_empty')
						->rule('verificationcode', 'equals', array(':value', $security_code));
			
				if ($obj_validation->check())
				{
					$activationcode = md5(uniqid(rand(), true));
					$obj_user = Auth::instance()->get_user();	
					$email= $obj_user->email;
					$obj_user->activationstatus_c = "inactive";
					$firstname = $obj_user->Firstname_c;
					$obj_user->activationcode_c = $activationcode;
					$obj_user->save();
					$userrole="";
					if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
					{
						$userrole="doctor";
						$obj_user->activationstatus_c = "inactivedoctor";
						$obj_user->save();
					}
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
					{	
						$userrole="patient";
					}
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
					{	
						$userrole="pathologist";
						$obj_user->activationstatus_c = "inactivepathologist";
						$obj_user->save();
					}
					else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
					{	
						$userrole="chemist";
						$obj_user->activationstatus_c = "inactivechemist";
						$obj_user->save();
					}
					
					//send mail
					$this->sendregistrationemail($email,$activationcode,$firstname,$userrole);
					$_POST = array();
					Request::current()->redirect('cregistrar/promptcheckmail?username='.$firstname.'&email='.$email);
				}	
				else{
					//return to the registration form with errors
					$errors = $obj_validation->errors('errors');
					if($errors['verificationcode'])
					{
						$errors['verificationcode']="Verification code doesn't match";
					}
					$this->resendactivationview($errors);
				}
			}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Ask user to check mail when user is Registers himself
	public function action_promptcheckmail()
	{
	    $username=$_GET['username'];
		$text1="Thank you for registering on <strong><i>IndiaOnlineHealth</i></strong> platform. We have sent you a mail providing process for activation of your account. Please login to your mailbox and follow the activation process. ";
		$this->acknowledge_registration($username,$text1);
	}
	
	
	//Activate IOH account on click of activation link in a mail
	public function action_activate()
	{
		try{
			$email	= $_GET['email'];
		  	$activationcode	= $_GET['key'];
			$obj_user 	= ORM::factory('user')->where('email','=',$email)->find();
			
	 		$username = $obj_user->Firstname_c;
			if($obj_user->activationcode_c != $activationcode)//user activation code not match
			{
				throw new Exception("Activation failed!");
			}
			else//user activation code match
			{
				//Create billing account -start
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
				if($objAccounts->id == '')
				{
					$objAccounts=ORM::factory('billingaccount');
					$objAccounts->accountcode_c 		= 'IOH'.$obj_user->id.rand(10000,99999);
					$objAccounts->refaccountuserid_c 	= $obj_user->id;
					$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
					$objAccounts->debitedamount_c 		= 0;
					$objAccounts->creditedamount_c 		= 0;
					$objAccounts->netbalance_c	 		= 0;
					$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
					$objAccounts->lastupdatedby_c 		= $obj_user->id;
					$objAccounts->save();
					$postfix = '';
					for($i=0;$i<(10-strlen($objAccounts->id));$i++)
					{
						$postfix = $postfix.'0';
					}
					$accountcode = 'IOH'.$postfix.$objAccounts->id;

					$objAccounts->accountcode_c			= $accountcode;	
					$objAccounts->update();
				}
				//create billing account - end
				
				switch($obj_user->activationstatus_c){
					case 'inactivedoctor':
						Request::current()->redirect("cdocregistrationform/view?userid=$obj_user->id");
						break;
					case 'inactivepathologist':
						Request::current()->redirect("cpathologistregistrationform/view?userid=$obj_user->id");
						break;
					case 'inactivechemist':
						Request::current()->redirect("cchemistregistrationform/view?userid=$obj_user->id");
						break;
					case 'inactive':
						$obj_user->activationstatus_c = "active";
						$obj_user->save();
						if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='.$username.'&id='.$obj_user->id.'&role=patient');
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='.$username.'&id='.$obj_user->id.'&role=staff');
						break;
					case 'active':
						$this->showactivationstatus($username,"Your account is activated already.");
						break;
					default: throw new Exception("Activation Status ('$obj_user->activationstatus_c') is not Defined");
				}
			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// Acknowledge activation of acount
	public function action_acknowledgeactivation()
	{
		try{
			$username	= $_GET['username'];
			$id			= $_GET['id'];
			$role 		= $_GET['role'];
			
			$viewname="Account Activated";
			$greet="Hi $username,";
			switch($role){
				case "patient":$content = View::factory('vuser/vpatient/vpatientactivation');
					break;
				case "staff":$content = View::factory('vuser/vstaff/vstaffactivation');
					break;
			}
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Acknowledge Activation</a>";
			$this->template->breadcrumb = $breadcrumb;

			$content->bind('viewname', $viewname);
			$content->bind('id', $id);
			$content->bind('greet', $greet);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function showactivationstatus($username,$text)//acknowledge registration
	{
		try{
			$viewname	= "Account Activation Status";
			$greet		= "Dear $username,";
			$text1		= $text;
			$text2		= "Thank you once again for choosing <strong><i>IndiaOnlineHealth</i></strong> as your preferred On-line consulting platform.";
			$text3		= "<strong>Team IndiaOnlineHealth</strong><br/><a>support@indiaonlinehealth.com<a>";
			$text4		= "All the India Online Health communication will be refered to you via this ID only To start using ayushman services you need to recharge you account
	by a minimum amount of Rs. 500. ";
			$content = View::factory('vuser/vemailsuccess');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Success</a>";
			$this->template->breadcrumb = $breadcrumb;
			$content->bind('viewname', $viewname);
			$content->bind('greet', $greet);
			$content->bind('text1', $text1);
			$content->bind('text2', $text2);
			$content->bind('text3', $text3);
			$content->bind('text4', $text4);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	// Acknowledge successful registration of acount
	private function acknowledge_registration($username,$text)//acknowledge registration
	{
		try{
			$viewname	= "Account Activation";
			$greet		= "Dear $username,";
			$text1		= $text;
			$text2		= "Thank you once again for choosing <strong><i>IndiaOnlineHealth</i></strong> as your preferred On-line consulting platform.";
			$text3		= "<strong>Team IndiaOnlineHealth</strong><br/><a>support@indiaonlinehealth.com<a>";
			$text4		= "All the India Online Health communication will be refered to you via this ID only To start using ayushman services you need to recharge you account
	by a minimum amount of Rs. 500. ";
			$content = View::factory('vuser/vemailsuccess');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Success</a>";
			$this->template->breadcrumb = $breadcrumb;
			$content->bind('viewname', $viewname);
			$content->bind('greet', $greet);
			$content->bind('text1', $text1);
			$content->bind('text2', $text2);
			$content->bind('text3', $text3);
			$content->bind('text4', $text4);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Send registration mail if registration is successful
	private function sendregistrationemail($email,$activationcode,$firstname,$userrole)
	{
		if($userrole==='doctor')
			$emailbody = "Doctor has to fill registration form and once your details are validated, you will have full access to India Online Health and all future notifications will be sent to this email address.";
		else
		{
			$emailbody="Once you confirm, you will have full access to India Online Health and all future notifications will be sent to this email address.";
		}
		$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/activate?email=".$email."&key=$activationcode";
		$emailsendrequest=Request::factory('cemailsender/sendemail');
		$emailsendrequest->post('email',$email);
		$emailsendrequest->post('emailbody',$emailbody);
		$emailsendrequest->post('website_url',$website_url);
		$emailsendrequest->post('name',$firstname);
		$emailsendrequest->execute();
		
	}
	
	// Check email id / username availability
	public function action_checkemailavailability()
	{
		$emailid = $_GET["email"];
		$objuser=ORM::factory('user')
				->where('email','=',$emailid)
				->find();
		$returnData="";
		if($objuser->id==NULL)//email is not not in server.
		{
			$returnData="valid";
		}	
		else //email is present
		{
			$returnData="invalid";
		}
		die($returnData);
	}
	
	// ************************* Activating account manually ****************************// - added by anand to activate coep students manually
	public function action_activatemanually()
	{
		$objUsers = ORM::factory('user')->where('email','like','%@coep.ac.in%')->where('activationstatus_c','like','%inactive%')->find_all()->as_array();
		$i = 0;
		foreach($objUsers as $objuser){
			echo $objuser->email.'</br>';
			echo $objuser->activationstatus_c.'</br>';
			$this->activateaccount($objuser->email,$objuser->activationcode_c);
			echo 'activated</br></br>';
			$i++;
		}
		echo 'Number of accounts activated = '.$i;
		die();
	}
	public function activateaccount($email,$activationcode)
	{
		try{
			$obj_user 	= ORM::factory('user')->where('email','=',$email)->find();
	 		$username = $obj_user->Firstname_c;
			if($obj_user->activationcode_c != $activationcode)//user activation code not match
			{
				throw new Exception("Activation failed!");
			}
			else//user activation code match
			{
				//Create billing account -start
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts = $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
				if($objAccounts->id == '')
				{
					$objAccounts=ORM::factory('billingaccount');
					$objAccounts->accountcode_c 		= 'IOH'.$obj_user->id.rand(10000,99999);
					$objAccounts->refaccountuserid_c 	= $obj_user->id;
					$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
					$objAccounts->debitedamount_c 		= 0;
					$objAccounts->creditedamount_c 		= 0;
					$objAccounts->netbalance_c	 		= 0;
					$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
					$objAccounts->lastupdatedby_c 		= $obj_user->id;
					$objAccounts->save();
					$postfix = '';
					for($i=0;$i<(10-strlen($objAccounts->id));$i++)
					{
						$postfix = $postfix.'0';
					}
					$accountcode = 'IOH'.$postfix.$objAccounts->id;

					$objAccounts->accountcode_c			= $accountcode;	
					$objAccounts->update();
				}
				//create billing account - end
				
				switch($obj_user->activationstatus_c){
					case 'inactive':
						$obj_user->activationstatus_c = "active";
						$obj_user->save();
						break;
				}
			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//*****************************end**********************************************//
}