<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cregistrar extends Controller_Ctemplatewithoutmenu {
	// Show Registration form
	public function action_view()
	{
		$errors = array();
		$isAyushcarePatient ="";	
		if(!(empty($_GET['isayushcare'])))
			$isAyushcarePatient=$_GET['isayushcare'];
		$session = Session::instance();
		$session->set('isAyushcarePatient', $isAyushcarePatient);
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
			$isAyushcarePatient ="";	
			
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$allCountries;$count=0;
			foreach($objCountries as $objCountry)
			{
				$allCountries[$count]['isd']=$objCountry->mobileisd_c;
				$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
				$allCountries[$count]['country_c']=$objCountry->country_c;
				$count++;
			}
			$content = View::factory('vuser/vregistration/vregistrationform')->bind('errors', $errors)->bind('isAyushcarePatient', $isAyushcarePatient);
			$content->bind('objcountries', $allCountries);
			
			$session = Session::instance();
			$isAyushcarePatient=$session->get('isAyushcarePatient');
			
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);

			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	// Show Registration form
	public function action_registerconsumer()
	{
		$errors = array();
		$isAyushcarePatient ="";	
		if(!(empty($_GET['isayushcare'])))
			$isAyushcarePatient=$_GET['isayushcare'];
		$session = Session::instance();
		$session->set('isAyushcarePatient', $isAyushcarePatient);
		$this->displaycoregistrationform($errors);
	}
	
	// bind registration form view 
	private function displaycoregistrationform($errors)
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
			$isAyushcarePatient ="";	
			
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$allCountries;$count=0;
			foreach($objCountries as $objCountry)
			{
				$allCountries[$count]['isd']=$objCountry->mobileisd_c;
				$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
				$allCountries[$count]['country_c']=$objCountry->country_c;
				$count++;
			}
			$content = View::factory('vuser/vregistration/vcobrandedregistration')->bind('errors', $errors)->bind('isAyushcarePatient', $isAyushcarePatient);
			$content->bind('objcountries', $allCountries);
			
			$session = Session::instance();
			$isAyushcarePatient=$session->get('isAyushcarePatient');
			
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);
			
			$this->template->cobrandedsrc ='/ayushman/assets/images/bajajaliianzelogo.jpg';
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
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
					$arrPost['username']= $this->request->post('username');
					// add 'login' and 'role of the user' roles in roles_users table 
					
					$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
					
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$userrole	= $this->request->post('accounttype'); 
					$user->add('roles', ORM::factory('role', array('name' => $userrole)));
					$email	= $this->request->post('email'); 

					$arr_user = array();
					$arr_user['id'] 		= trim($user->id);
					$arr_user['middlename_c']	= trim($this->request->post('middlename'));
					$userrole = $this->request->post('accounttype');
					switch ($userrole) {
						case 'patient':$obj_patient=ORM::factory('patient');
										$obj_patient->repatientsuserid_c = $user->id;
										$obj_patient->save();
										$arr_user['activationstatus_c']	= "inactive";
										if(isset($_POST['promocode']))
										{
											$corporate= new api_Corporate;
											$data=$corporate->attach('11',$_POST,$user);
										}
										break;
						case 'doctor':$obj_doctor=ORM::factory('doctor');
										$obj_doctor->refdoctorsid_c = $user->id;
										$obj_doctor->save();
										$arr_user['activationstatus_c']	= "notregisterdoctor";
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
					}
					$activationcode	=  md5(uniqid(rand(), true));
					$arr_user['lastname_c'] 		= trim($this->request->post('lastname'));
					$arr_user['Firstname_c']		= trim($this->request->post('firstname'));
					$arr_user['mobileno1_c']		= trim($this->request->post('mobilenumber'));
					$arr_user['isdmobileno1_c']		= trim($this->request->post('isdphonehome'));

					$arr_user['email']			= $email;
					$arr_user['refsecurityquestion_c']= $this->request->post('securequestion');
					$arr_user['securityanswer_c']	= trim($this->request->post('secureanswer'));
					$arr_user['accountcreatedby_c']	= $this->request->post('accountcreatedby') ;
					$arr_user['activationcode_c']	=  $activationcode;
					$returned_value = orm::factory('user')->save_userdetails($arr_user);
										
					if($returned_value['type'] == 'exception')
						throw new exception($returned_value['data']);
					$session = Session::instance();
					$isAyushcarePatient =$session->get('isAyushcarePatient');
					if($isAyushcarePatient == "true")
					{
						 $user->refintrowizardid_c= '2';
						 $user->wizardstatus_c='2';
						 $user->save();
					}
					$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();
					$this->sendregistrationemail($obj_user->id,$activationcode,$this->request->post('firstname'),$userrole);
					$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
					$obj_user->isdmobileno1_c = $arr_user['isdmobileno1_c'];
					if(isset($_POST['gender_c'])){
						$obj_user->gender_c		= trim($_POST['gender_c']);
					}
					if(isset($_POST['DOB_c'])){
						$obj_user->DOB_c		= date('Y-m-d',strtotime($_POST['DOB_c']));
					}
					$obj_user->update();
					$username = $this->request->post('firstname');
					$encrypt = Encrypt::instance('default');
					$encrypted_username = urlencode($encrypt->encode($username));
					$encrypted_id = urlencode($encrypt->encode($obj_user->id));
					Request::current()->redirect('cregistrar/showregistrationstatus?u='.$encrypted_username.'&i='.$encrypted_id);
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
		}else{
			$errors['error'] = 'Could not proceed registration. Please try again.';
			$this->displayregistrationform($errors);
		}
	}
	
	private function validatePromoCode($promocode,$mobilenumber,$user){
		$promocode	= ORM::factory('promocode')->where('code_c','=',$promocode)->find();
		$corporatemember = ORM::factory('corporatemember');
		
	}
	
	public function action_showregistrationstatus()
	{
		$encrypt = Encrypt::instance('default');
		$message = "Thank you very much for creating an account with <strong><i>IndiaOnlineHealth.com</i></strong>.<br/>We have sent an email to your registered email address. Please follow the instructions in that email to activate your account.<br/>Please ensure to check your spam folders in case you have not received the mail with activation instructions.<br/>Please add support@indiaonlinehealth.com to your address book and to safe senders list so that the mails that we send reach you.<br/>If you do not find your activation email in spam folder as well, please mail us at <strong><i>support@indiaonlinehealth.com</i></strong>. We would be glad to respond to you at the earliest.";
		$username = urldecode( $encrypt->decode($_GET['u']));
		$id = urldecode( $encrypt->decode($_GET['i']));
		$obj_user = ORM::factory('user')->where('id','=',$id)->find();
		$error = array();
		$this->Check_OTP($obj_user->id,$error);
		
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
			$objuser = Auth::instance()->get_user();	
			$email=$objuser->email;
			$content = View::factory('vuser/vregistration/vresendaccountactivationform')
						->bind('error', $error)
						->bind('objuser', $objuser);
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
					
					if($obj_user->activationstatus_c != 'active'){
						$obj_user->activationstatus_c = "inactive";
						$obj_user->activationcode_c = $activationcode;
						$userrole="";
						
						if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
						{
							$userrole="doctor";
							$obj_user->activationstatus_c = "notregisterdoctor";
						}
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
						{	
							$userrole="patient";
						}
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist'))))
						{	
							$userrole="pathologist";
							$obj_user->activationstatus_c = "inactivepathologist";
						}
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'chemist'))))
						{	
							$userrole="chemist";
							$obj_user->activationstatus_c = "inactivechemist";
						}
						$obj_user->save();
					
						//send mail
						$this->sendregistrationemail($obj_user->id,$activationcode,$obj_user->Firstname_c,$userrole);
						$_POST = array();
						//check if mobilenumber is present or not
						
						$error = array();
						$this->Check_OTP($obj_user->id,$error);
					}else{
						$this->showactivationstatus($obj_user->Firstname_c,"Your account is activated already. <a href='/ayushman/cdashboard/view' class='bodytext_normal'><font color='blue'>Click Here</font></a> to go home");
					}
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
	
	//message for inactive pathologist
	public function action_messageforinactivepathologist()
	{
	    $username='User';
		$text1="Thank you for registering on <strong><i>IndiaOnlineHealth</i></strong> platform. We have sent your request for verification of Diagnostic center. Verification will be done in few days.";
		$this->acknowledge_registration($username,$text1);
	}
	
	//Activate IOH account on click of activation link in a mail
	public function action_activate()
	{
		try{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;

			$obj_user 	= ORM::factory('user')->where('id','=',$userid)->find();		
	 		$username = $obj_user->Firstname_c;

				//user activation code match
				
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
						$notification=  array();
						$notification['id']=$obj_user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$obj_user->id;
						helper_notificationsender::sendnotification($notification);
						if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='.$username.'&id='.$obj_user->id.'&role=patient');
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='.$username.'&id='.$obj_user->id.'&role=staff');
							
						break;
					case 'active':
						$this->showactivationstatus($obj_user->Firstname_c,"Your account is activated already. <a href='/ayushman/cdashboard/view' class='bodytext_normal'><font color='blue'>Click Here</font></a> to go home");
						break;
					case 'activatedoctor':
							$content = View::factory('vactivatedoctoragain');
							$breadcrumb = "<a href='/ayushman/cdoctordashboard/view?#dashboard' class='bodytext_normal'>Back to dashboard</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration</a>";
							$this->template->breadcrumb = $breadcrumb;
							$this->template->content 	= $content;
							break;						
					default: throw new Exception("Activation Status ('$obj_user->activationstatus_c') is not Defined");
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
				

				case "patient":{
								$isassociated= ORM::factory('corporatemember')->where('iohid_c','=',$id)->find();
								//var_dump($isassociated->id); die;
								if($isassociated->id)
								{
									$couponapplied="1";
								}
								else
								{
									$couponapplied="0";
								}
								$content = View::factory('vuser/vpatient/vpatientactivation');
								$content->bind('couponapplied', $couponapplied);
								break;
								}
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
			$text2		= "Thank you once again for choosing <strong><i>IndiaOnlineHealth</i></strong> as your preferred On-line platform.";
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

	private function Check_OTP($id,$error)//acknowledge registration
	{
		try{
			
			$objuser = ORM::factory('user')->where('id','=',$id)->find();	
			$viewname	= "Account Activation";
			$greet		= "Dear". $objuser->Firstname_c.",";
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Success</a>";
			$content = View::factory('vuser/vregistration/vcheckotp');
			$content->bind('viewname', $viewname);
			$content->bind('objuser', $objuser);
			$content->bind('error', $error);
			$this->template->content = $content;
			$this->template->breadcrumb = $breadcrumb;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_completeregistration(){
		$encrypt = Encrypt::instance('default');
		
		$uid = urldecode( $encrypt->decode($_GET['uid']));

		$activationcode	= $_GET['key'];
		$errors = array();
		$this->displayincompleteregistration($errors,$uid,$activationcode);
	}
	
	private function displayincompleteregistration($errors,$id,$activationcode){

		$obj_user 	= ORM::factory('user')->where('id','=',$id)->find();
		$email = $obj_user->email;
	 	$username = $obj_user->Firstname_c;
		if($obj_user->activationcode_c != $activationcode)//user activation code not match
		{
			$this->showactivationstatus('Anonymous', '<div class="bodytext_error"> Registration Failure! This link is tampered or your registration is completed. Please check your email inbox and click on the activation link again if this error persists, your have completed registration.</div>');
		}
		else//user activation code match
		{
			$_POST['uid']= $obj_user->id;
			$_POST['activationcode']= $activationcode;
			$_POST['firstname']	= $obj_user->Firstname_c;
			$_POST['lastname']	= $obj_user->lastname_c;
			$_POST['mobilenumber']= $obj_user->mobileno1_c;
			$_POST['email'] = $obj_user->email;
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "Consumer";	
			else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
				$urole = "staff";
			$_POST['role'] = $urole;
			$objSecurityQuestions 	= ORM::factory('securityquestionmaster')->get_questions();
			$arrSecurityQuestions = array();
			if($objSecurityQuestions['type'] == 'success')
				$arrSecurityQuestions = $objSecurityQuestions['data'];
			else if($objSecurityQuestions['type'] == 'exception')
				throw new Exception($objSecurityQuestions['data']);
			else
				throw new Exception($objSecurityQuestions['data']);

			$content = View::factory('vuser/vregistration/vincompleteregistration')->bind('errors', $errors);
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$content->bind('objcountries', $objCountries);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
	}
	
	public function action_saveincompleteregistration(){
		if($_POST){
			$session = Session::instance();
			$obj_validation = new Validation($_POST);
			$security_code = $session->get('captchasecuritycode');
			$obj_validation = Validation::factory($_POST) 
            			->rule('verificationcode', 'not_empty')
	            		->rule('verificationcode', 'equals', array(':value', $security_code));
			if(!$obj_validation->check()){
				$errors = $obj_validation->errors('errors');
				if($errors['verificationcode'])
				{
					$errors['verificationcode']="Verification code doesn't match";
				}
				$this->displayincompleteregistration($errors,trim($this->request->post('email')), $this->request->post('activationcode'));

			}
			$arr_user['id'] 		= trim($this->request->post('uid'));
			$arr_user['username'] 		= trim($this->request->post('username'));
			$arr_user['lastname_c'] 		= trim($this->request->post('lastname'));
			$arr_user['Firstname_c']		= trim($this->request->post('firstname'));
			$arr_user['mobileno1_c']		= trim($this->request->post('mobilenumber'));
			$arr_user['email']			= trim($this->request->post('email'));
			$arr_user['middlename_c']		= trim($this->request->post('middlename'));
			$activationcode	=  md5(uniqid(rand(), true));
			$arr_user['activationcode_c']		= $activationcode;
			$arr_user['activationstatus_c']		= 'active';

			$arr_user['refsecurityquestion_c']= $this->request->post('securequestion');
			$arr_user['securityanswer_c']	= trim($this->request->post('secureanswer'));
			$arr_user['accountcreatedby_c']	= $this->request->post('accountcreatedby') ;
			$returned_value = orm::factory('user')->save_userdetails($arr_user);
			if($returned_value['type'] == 'exception')
				throw new exception($returned_value['data']);
			$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();	
			$obj_user->update_user($_POST,array('password'));
			$this->showactivationstatus($obj_user->Firstname_c.' '.$obj_user->lastname_c, 'Your account is activated successfully. Now you can login using selected email id and selected password.');
		}else{
			$this->showactivationstatus('Anonymous', '<div class="bodytext_error">Link has been accessed incorrectly, Please go back to previous link and try again.</div>');
		
		}		
	}	
	//Send registration mail if registration is successful
	private function sendregistrationemail($id,$activationcode,$firstname,$userrole)
	{
		$obj_user = ORM::factory('user')->where('id','=',$id)->find();
		$code = substr(md5(microtime()),rand(0,26),4);
		$obj_user->activationsmsotp_c= $code;
		$obj_user->save();
		$notification=  array();
		$notification['id']=$obj_user->id;
		$notification['template']='registration';
		$notification['email']='true';
		$notification['username']=$firstname;
		$notification['code']=$code;
		$notification['sms']='true';
		helper_notificationsender::sendnotification($notification);
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
	
	// Check username availability
	public function action_checkusernameavailability()
	{
		$emailid = $_GET["username"];
		$objuser=ORM::factory('user')
				->where('username','=',$emailid)
				->find();
		$returnData="";
		if($objuser->id==NULL)//username is not not in server.
		{
			$returnData="valid";
		}	
		else //email is present
		{
			$returnData="invalid";
		}
		die($returnData);
	}
	
	public function action_newstaffactivation()
	{
		try{
			$doctorid = $_GET['drid'];	
			$staffemail = $_GET['email'];	
			$activationcode =$_GET['key'];
			$_POST['activationcode'] = $activationcode ;
			$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor')->where('staffemail_c','=',$staffemail)->where('refstaffinvitationbydoctorid_c','=',$doctorid)->where('activationcode_c','=',$activationcode)->find();
			if($obj_staffinvitationbydoctor->id ==NULL)
			{
				throw new Exception("Please click on link provided in email");		
			}
			else
			{
				$errors = array();
				$objUserDoctor= ORM::factory('user')->join('doctors')->on('user.id','=','doctors.refdoctorsid_c')->where('doctors.id','=',$doctorid)->find();
				if($obj_staffinvitationbydoctor->status_c == "remove")
				{
					$viewname	= "Invitation Cancelled";
					$text1		= "Dr. ".$objUserDoctor->Firstname_c." ".$objUserDoctor->lastname_c." has cancelled your invitation.";
					$text2		= 'We are sorry but you can not join <strong><i>IndiaOnlineHealth</i></strong> as a staff';
					$content = View::factory('vuser/vregistration/vcancelinvitationofstaff');
					$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Invitation Cancelled</a>";
					$this->template->breadcrumb = $breadcrumb;
					$content->bind('viewname', $viewname);
					$content->bind('greet', $greet);
					$content->bind('text1', $text1);
					$content->bind('text2', $text2);
					$content->bind('text3', $text3);
					$content->bind('text4', $text4);
					$this->template->content = $content;
				}
				else
				{ 
					$this->displaystaffregistration($errors,$staffemail,$doctorid);
				}
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	private function displaystaffregistration($errors,$staffemail,$doctorid)
	{
		try{
			$_POST['email'] = $staffemail;
			$_POST['doctorid'] = $doctorid;
			$urole = "staff";
			$objSecurityQuestions 	= ORM::factory('securityquestionmaster')->get_questions();
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$arrSecurityQuestions = array();
			if($objSecurityQuestions['type'] == 'success')
				$arrSecurityQuestions = $objSecurityQuestions['data'];
			else if($objSecurityQuestions['type'] == 'exception')
				throw new Exception($objSecurityQuestions['data']);
			else
				throw new Exception($objSecurityQuestions['data']);
			$content = View::factory('vuser/vregistration/vstaffregistration')->bind('errors', $errors);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);
			$content->bind('objcountries', $objCountries);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;	
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	public function action_savestaffregistration()
	{

		if($_POST){
			$session = Session::instance();
			$obj_validation = new Validation($_POST);
			$security_code = $session->get('captchasecuritycode');
			$obj_validation = Validation::factory($_POST) 
            			->rule('verificationcode', 'not_empty')
	            		->rule('verificationcode', 'equals', array(':value', $security_code));
			if(!$obj_validation->check()){
				$errors = $obj_validation->errors('errors');
				if($errors['verificationcode'])
				{
					$errors['verificationcode']="Verification code doesn't match";
				}
				$this->displaystaffregistration($errors,trim($_POST['email']), $_POST['doctorid']);

			}
			$doctorid=$_POST['doctorid'];
			// add 'login' and 'role of the user' roles in roles_users table 
			$arrPost 			= $this->request->post();
			$arrPost['username']= $this->request->post('username');
			$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
			$user->add('roles', ORM::factory('role', array('name' => 'login')));
			$user->add('roles', ORM::factory('role', array('name' => 'staff')));
			
			$email	= $this->request->post('email'); 
			$user->lastname_c 		= trim($this->request->post('lastname'));
			$user->Firstname_c		= trim($this->request->post('firstname'));
			$user->mobileno1_c	= trim($this->request->post('mobilenumber'));
			$user->middlename_c		= trim($this->request->post('middlename'));
			$activationcode	=  md5(uniqid(rand(), true));
			$user->activationcode_c		= $activationcode;
			$user->activationstatus_c	= 'active';
			$user->refsecurityquestion_c = $this->request->post('securequestion');
			$user->securityanswer_c	= trim($this->request->post('secureanswer'));
			$user->accountcreatedby_c	= $this->request->post('accountcreatedby') ;
			$user->save();
			$obj_user = ORM::factory('user')->where('id','=',$user->id)->find();
			$obj_user->xmpppassword_c	=$obj_user->password;
			$obj_user->save();
			$obj_staff=ORM::factory('staff');//add new staff in staff table
			$obj_staff->refstaffuserid_c = $user->id;
			$obj_staff->save();
			$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor')->where('staffemail_c','=',$this->request->post('email'))->where('refstaffinvitationbydoctorid_c','=',$doctorid)->find();//change status in "staffinvitationbydoctors" table
			$obj_staffinvitationbydoctor ->status_c="accepted";
			$obj_staffinvitationbydoctor->save();
			$obj_favoritestaffbydoctor = ORM::factory('favoritestaffbydoctor');//add dr and staff pair in favorite table
			$obj_favoritestaffbydoctor->reffavstaffid = $obj_staff->id;
			$obj_favoritestaffbydoctor->reffavdoctorid =$doctorid;
			$obj_favoritestaffbydoctor ->status ="accepted";
			$obj_favoritestaffbydoctor->save();
			//open xmpp account and dr to network.
			$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
			$obj_doctor=ORM::factory('doctor')->where('id','=',$doctorid)->find();
			$arr_xmpp =Kohana::$config->load('xmpp');
			$var = xmpp::addRosterContact($obj_doctor->refdoctorsid_c.'@'.$arr_xmpp['servername'],$obj_doctor->refdoctorsid_c.'@'.$arr_xmpp['servername'],$obj_user->id.'@'.$arr_xmpp['servername'],$obj_user->xmpppassword_c);
			if($var != 'success')//error while adding in xmpp contact list 
			{
				throw new Exception($var["ERROR"]);
			}
			$notification=  array();
			$notification['id']=$user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$user->id;
			helper_notificationsender::sendnotification($notification);
	   	 	$username=$this->request->post('firstname');
	   	 	//redirct to acknowledge page.
			$text1="Thank you for registering on <strong><i>IndiaOnlineHealth</i></strong> platform as a staff.";
			$this->acknowledge_registration($username,$text1);
		}else{
			$this->showactivationstatus('Anonymous', '<div class="bodytext_error">Link has been accessed incorrectly, Please go back to previous link and try again.</div>');	
		}	
	}
	
	private function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}
	
	public function action_patientregistrationbystaff()
	{
		try{
				$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
				
				$users = ORM::factory('user')->where('DOB_c','=',$dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'])->where('Firstname_c','=',$_GET['firstname'])->where('lastname_c','=',$_GET['lastname'])->where('mobileno1_c','=',$_GET['mobilenumber'])->where('gender_c','=',$_GET['gender'])->find_all();
				if(count($users) != 0 && ($_GET['forceadd'] == 'false')){
					$returnArray = array();
					$returnArray['found'] = 'yes';
					die(json_encode($returnArray));
				}else{
					$session = Session::instance();
					$obj_validation = new Validation($_GET);

					// Find existing data
					$path = $session->get('path');

					$returnArray = array();
					
					$initialusername = strtolower($this->clean($_GET['firstname']).$this->clean($_GET['lastname']));
					$initialusername = substr($initialusername,0,25);
					$username = $initialusername;
					$userCount = 0;
					while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
					  $userCount++;
					  $username = $initialusername . $userCount;
					}
					if($_GET['email'] == "" )//if email not present
					{
						$returnArray["emailPresent"] ="false";
					}
					else
					{
						$returnArray["emailPresent"] ="true";
					}
					if($_GET['gender'] == "" )//if gender not present
					{
						$returnArray["genderPresent"] ="false";
					}
					else
					{
						$returnArray["genderPresent"] ="true";
					}

					$password = md5(uniqid(rand()));//create 6 chara password
					$password = substr($password,-8);
					$arrPost['username']= $username;

					$arrPost['gender_c']= isset($_GET['gender'])?$_GET['gender']:'';
					$arrPost['password']= $password;
					$arrPost['email'] = $_GET['email'];
					$arrPost['password_confirm'] = $password;
					$activationcode	=  md5(uniqid(rand(), true));
				
					$objAddress=ORM::factory('address');
					if(isset($_GET['address']))
					{
						$objAddress->line1_c=trim($_GET['address']);
					}
					if(isset($_GET['country']))
					{
						$objAddress->country_c=trim($_GET['country']);
					}
					if(isset($_GET['state']))
					{
						$objAddress->state_c=trim($_GET['state']);
					}
					if(isset($_GET['city']))
					{
						$objAddress->city_c=trim($_GET['city']);
					}
					if(isset($_GET['pin']))
					{
						$objAddress->pin_c=trim($_GET['pin']);
					}
					if(isset($_GET['address'])||isset($_GET['country'])||isset($_GET['state'])||isset($_GET['city'])||isset($_GET['pin']))
					{
						$objAddress->save();
						$addressId=$objAddress->id;
					}
					else $addressId=null;
					
					$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));

					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$user->add('roles', ORM::factory('role', array('name' => 'patient')));
					$user->lastname_c 	= trim($_GET['lastname']);
					$user->middlename_c	= trim($_GET['middlename']);
					$user->Firstname_c	= trim($_GET['firstname']);
					$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
					$user->DOB_c	= $dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'];
					$user->isdmobileno1_c	= '+91';
					if(isset($_GET['mobilenumber'])) {
						$user->mobileno1_c	= trim($_GET['mobilenumber']);
					}
					if(isset($_GET['bloodgroup'])) {
						$user->bloodgroup_c= urlencode($_GET['bloodgroup']);
					}
					if(isset($_GET['medicalprob'])) {
						$user->knownmedicalproblem_c= trim($_GET['medicalprob']);
					}
					if(isset($_GET['emergencyno'])) {
						$user->phonenohome_c	= trim($_GET['emergencyno']);
					}
					$user->gender_c	= $arrPost['gender_c'];
					$user->photo_c= $path;

					$user->activationcode_c	= $activationcode;
					$user->activationstatus_c	= 'active';
					$user->accountcreatedby_c ="staff";
					$user->xmpppassword_c = $user->password ;
					$user->refaddresshome1_c=$addressId;
					$obj_patient=ORM::factory('patient');
					$obj_patient->repatientsuserid_c = $user->id;
							// Changes for the Hospital Entity
					$objUser = Auth::instance()->get_user();
					if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
						$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c', '=', $objUser->id)->find();
						$obj_patient->refhospitalid_c = $objDoctor->refhospitalid_c;	
						// Can be null for Open doctor or Valid Hospital Entity
					}
					else if ($objUser->has('roles', ORM::factory('role', array('name' => 'staff')))){
						$userId = $objUser->id;
						$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
						$obj_patient->refhospitalid_c = $objStaff->refhospitalid_c;		
						// Can be null for Open or Valid Hospital Entity
					}
					$hospitalid = $obj_patient->refhospitalid_c;
					$obj_patient->save();				
					$user->save();
					
					$obj_patient=ORM::factory('patient')->where('repatientsuserid_c','=',$user->id)->find();
					
					$op = xmpp::register($user->id,$user->xmpppassword_c,$user->email);
					$doctorname = str_replace("Dr.", "", $_GET['doctorname']);;
					
					//Create billing account -start
					$objAccounts=ORM::factory('billingaccount');
					$objAccounts = $objAccounts->where('refaccountuserid_c','=',$user->id)->find();
					if($objAccounts->id == '')
					{
						$objAccounts=ORM::factory('billingaccount');
						$objAccounts->accountcode_c 		= 'IOH'.$user->id.rand(10000,99999);
						$objAccounts->refaccountuserid_c 	= $user->id;
						$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
						$objAccounts->debitedamount_c 		= 0;
						$objAccounts->creditedamount_c 		= 0;
						$objAccounts->netbalance_c	 		= 0;
						$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
						$objAccounts->lastupdatedby_c 		= $user->id;
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
					$objUser = Auth::instance()->get_user();
					if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
						$doctorname = $objUser->Firstname_c.' '.$objUser->lastname_c;
					}
					if(isset($_GET['sendregistrationinfo']) && $_GET['sendregistrationinfo'] == 'true'){
						if($_GET['mobilenumber'] !="" )//mobile number present
						{	
							$notification=  array();
							$notification['doctorname']=$doctorname;
							$notification['password']=$password;
							$notification['uname']=$username;
							$notification['userid']=$user->id;
							
							$notification['id']=$user->id;
							$notification['template']='registrationinfobystaff';
							$notification['sms']='true'; 
							if($hospitalid==null)
							{helper_notificationsender::sendnotification($notification);}
							
							$returnArray["mobilenumberPresent"] = "true";
						}
						else
						{
							$returnArray["mobilenumberPresent"] = "false";
						}
						if($returnArray["emailPresent"] =="true")//email present
						{	
							$notification=  array();
							$notification['doctorname']=$doctorname;
							$notification['password']=$password;
							$notification['uname']=$username;
							$notification['userid']=$user->id;
							
							$notification['id']=$user->id;
							$notification['template']='registrationinfobystaff';
							$notification['email']='true'; 
							if($hospitalid==null)
							{helper_notificationsender::sendnotification($notification);}
						}
					}else
					{
						$returnArray["mobilenumberPresent"] = "false";
					}
					
					$returnArray["patientuserid"]=$user->id;
					$returnArray["name"] = trim($_GET['firstname'])." ".trim($_GET['lastname']);
					$objUser = Auth::instance()->get_user();
					
					if($hospitalid !=null)
					{
						// Create hospital network of patient 
						// attached all hospital Chemists
						// attach all hospital pathologist
						// and selected doctors
						// no notification to doctors as wel as patients
						// Auto ordering flags set 
						
						$obj_patient->allowedtoplacemedicineorder_c = 1;
						$obj_patient->allowedtoplacepathorder_c = 1;
							
						$this->attachHospitalDoctor($obj_patient->id,$hospitalid);
						$this->attachHospitalPathology($obj_patient->id,$hospitalid);
						$this->attachHospitalChemist($obj_patient->id,$hospitalid);
						$obj_patient->save();				
					}
					else
					{
						if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
						$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c', '=', $objUser->id)->find();
						$this->adddoctortofavoritetotable($objDoctor->id, $user->id);
						
						if(isset($_GET['attachnetwork']) && $_GET['attachnetwork'] == 'true'){
							$favDCs = ORM::factory('favoritepathologistsbydoctor')->where('reffavpathdoctorsid_c','=',$objDoctor->id)->find_all();
							$pathologistnames = '';
							foreach($favDCs as $favDC){
								$fav = ORM::factory('favoritepathologistbypatient');
								$fav->reffavpathopathologistsid_c = $favDC->reffavpathpathologistsid_c;
								$pathologistnames = $pathologistnames.' '.ORM::factory('pathologist')->where('id','=',$favDC->reffavpathpathologistsid_c)->find()->nameofcenter_c;
								$fav->reffavpathopatientsid_c = $obj_patient->id;
								$fav->save();						
							}
							
							$favChems = ORM::factory('favoritechemistbydoctor')->where('reffavchembydocdoctorsid_c','=',$objDoctor->id)->find_all();
							$chemistnames = '';
							foreach($favChems as $favChem){
								$fav = ORM::factory('favoritechemistbypatient');
								$fav->reffavchembypatchemistsid_c = $favChem->reffavchembydocchemistsid_c;
								$chemistnames = $chemistnames.' '.ORM::factory('chemist')->where('id','=',$favChem->reffavchembydocchemistsid_c)->find()->nameofmedical_c;
								$fav->reffavchembypatpatientid_c = $obj_patient->id;
								$fav->save();						
							}
							
							$obj_patient->allowedtoplacemedicineorder_c = 1;
							$obj_patient->allowedtoplacepathorder_c = 1;
							$obj_patient->save();
							
							
							$notification=  array();
							$notification['doctorname']=$doctorname;
							$notification['lab']=$pathologistnames;
							$notification['chemist']=$chemistnames;
							
							$notification['id']=$user->id;
							$notification['template']='networkattached';
							$notification['sms']='true'; 
							helper_notificationsender::sendnotification($notification);
							
						}
						
						}
						else if ($objUser->has('roles', ORM::factory('role', array('name' => 'staff')))){
						$userId = $objUser->id;
						$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
						$staffId=$objStaff->id;
						
						$doctorids = explode(",",$_GET['doctorids']);
						
						foreach($doctorids as $doctorid){
							$objFavoriteStaffByDoctor = ORM::factory('doctor')// find all doctors who selected that staff.
												->where('refdoctorsid_c','=',$doctorid)
												->find();
							$this->adddoctortofavoritetotable($objFavoriteStaffByDoctor->id, $user->id);
						}
						if(isset($_GET['attachnetwork']) && $_GET['attachnetwork'] == 'true'){
							$favDCs = ORM::factory('favoritepathologistbystaff')->where('reffavstaffid_c','=',$objStaff->id)->find_all();
							
							$pathologistnames = '';
							foreach($favDCs as $favDC){
								$fav = ORM::factory('favoritepathologistbypatient');
								$fav->reffavpathopathologistsid_c = $favDC->reffavpathologistid_c;
								$pathologistnames = $pathologistnames.' '.ORM::factory('pathologist')->where('id','=',$favDC->reffavpathologistid_c)->find()->nameofcenter_c;
								$fav->reffavpathopatientsid_c = $obj_patient->id;
								$fav->save();						
							}
							
							$chemistnames = '';
							$favChems = ORM::factory('favoritechemistbystaff')->where('reffavstaffid_c','=',$objStaff->id)->find_all();
							foreach($favChems as $favChem){
								$fav = ORM::factory('favoritechemistbypatient');
								$fav->reffavchembypatchemistsid_c = $favChem->reffavchemistid_c;
								$chemistnames = $chemistnames.' '.ORM::factory('chemist')->where('id','=',$favChem->reffavchemistid_c)->find()->nameofmedical_c;
								$fav->reffavchembypatpatientid_c = $obj_patient->id;
								$fav->save();						
							}							
							$obj_patient->allowedtoplacemedicineorder_c = 1;
							$obj_patient->allowedtoplacepathorder_c = 1;
							$obj_patient->save();
							
							
							$notification=  array();
							$notification['doctorname']=$doctorname;
							$notification['lab']=$pathologistnames;
							$notification['chemist']=$chemistnames;
							
							$notification['id']=$user->id;
							$notification['template']='networkattached';
							$notification['sms']='true'; 
							helper_notificationsender::sendnotification($notification);
						}
					}
					}// Else outside hospital registration
					/*****************************/// attaches a user to corporate and plan . It is hack for time being.	
					$offers = new helper_Offers();
					$offers->registrationbyDoctor($user->id,$objUser->id);				
					/****************************///
					die(json_encode($returnArray));
				}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	private function adddoctortofavoritetotable($doctorid,$userid){
		try{
			$obj_pat=ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->find();
			$patientid=$obj_pat->id;
			$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient')->where('reffavdocbypatpatientsid_c','=',$patientid)->where('reffavdocbypatdoctorsid_c','=',$doctorid)->find();
			$array_favoritedocterbypatients=$obj_favoritedocterbypatients->as_array();
			if($array_favoritedocterbypatients['id']==NULL){
				$obj_favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
				$obj_favoritedocterbypatients->reffavdocbypatpatientsid_c=$patientid;
				$obj_favoritedocterbypatients->reffavdocbypatdoctorsid_c=$doctorid;
				$obj_favoritedocterbypatients->save();
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_patientactivation()
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
					$objAccounts->netbalance_c	 	= 0;
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
				$obj_user->activationstatus_c = "active";
				$obj_user->save();
				$notification=  array();
				$notification['id']=$obj_user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$obj_user->id;
				helper_notificationsender::sendnotification($notification);
				Request::current()->redirect('');

			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_submitcheckotpform()
	{
		try{
			$userid = $_POST['userid'];
			$verificationCode = $_POST['verificationcode'];
			$obj_user 	= ORM::factory('user')->where('id','=',$userid)->find();
			if($obj_user->activationsmsotp_c == $verificationCode)
			{
				switch($obj_user->activationstatus_c){
					case 'notregisterdoctor':
						$message = "</br>Dear <font size='2'> Dr  ".$obj_user->Firstname_c."</font></br></br><font size='2' face='times new roman'>Thank you very much for creating an account with <strong><i>IndiaOnlineHealth.com</i></strong>. Please Log in and follow the steps.";
						$obj_user->activationstatus_c = "inactivedoctor";
						$obj_user->save();
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
						$notification=  array();
						$notification['id']=$obj_user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$obj_user->id;
						helper_notificationsender::sendnotification($notification);
						if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='. $obj_user->Firstname_c.'&id='.$obj_user->id.'&role=patient');
						else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'staff'))))
							Request::current()->redirect('cregistrar/acknowledgeactivation?username='. $obj_user->Firstname_c.'&id='.$obj_user->id.'&role=staff');
							
						break;
					case 'active':
						$this->showactivationstatus($obj_user->Firstname_c,"Your account is activated already. <a href='/ayushman/cdashboard/view' class='bodytext_normal'><font color='blue'>Click Here</font></a> to go home");
						break;
					case 'activatedoctor':
							$content = View::factory('vactivatedoctoragain');
							$breadcrumb = "<a href='/ayushman/cdoctordashboard/view?#dashboard' class='bodytext_normal'>Back to dashboard</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration</a>";
							$this->template->breadcrumb = $breadcrumb;
							$this->template->content 	= $content;
							break;						
					default: throw new Exception("Activation Status ('$obj_user->activationstatus_c') is not Defined");
				}

				  $content = View::factory('/vuser/vadmin/vdoctorformfilledstatus');
				  $content->bind('message',$message);
				  $content->set('username', $obj_user->Firstname_c);
				  $this->template->breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration-Process-Info</a>";;
				  $this->template->content = $content;
			}
			else
			{
				$errors['verificationcode']='The code you gave is incorrect. ';
				$this->Check_OTP($obj_user->id,$errors);
			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
		
	private function attachHospitalChemist($patientid,$hospitalid)
	{
		try{
			// Select all chemist and add to network of patient
			// favoritechemistbypatient
				
			$allChemists = ORM::factory('chemist')->where('refhospitalid_c','=',$hospitalid)->find_all();
			// Select all chemist registered for the Hospital
				
			foreach($allChemists as $Chemist){
					$patientRec = ORM::factory('favoritechemistbypatient');
					$patientRec->reffavchembypatpatientid_c = $patientid;
					$patientRec->reffavchembypatchemistsid_c = $Chemist->id;
					$patientRec->save();						
				}
			}
			catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function attachHospitalPathology($patientid,$hospitalid)
	{
		try{
				// Select all pathologist -- (all - radiologist/pathologist/physiologist )
				// Except ward
				// favoritepathologistbypatient
				
				$allPathologists = ORM::factory('allpathologistexceptWard')->where('refhospitalid_c','=',$hospitalid)->find_all();
				// Select all except wards (new view to select all except wards )
				
				foreach($allPathologists as $pathology){
						$patientRec = ORM::factory('favoritepathologistbypatient');
						$patientRec->reffavpathopatientsid_c = $patientid;
						$patientRec->reffavpathopathologistsid_c = $pathology->id;
						$patientRec->save();						
					}
			}
			catch(Exception $e){
			throw new Exception($e);
		}
	}	
	private function attachHospitalDoctor($patientid,$hospitalid)
	{
		try{
				$allDoctors = ORM::factory('doctor')->where('refhospitalid_c','=',$hospitalid)->find_all();
				// Select all doctors in that hospital and add them to patient network
				// favoritedocterbypatient
				
				foreach($allDoctors as $Doctor){
						$patientRec = ORM::factory('favoritedocterbypatient');
						$patientRec->reffavdocbypatpatientsid_c = $patientid;
						$patientRec->reffavdocbypatdoctorsid_c = $Doctor->id;						
						$patientRec->save();						
					}
			}
			catch(Exception $e){
			throw new Exception($e);
		}
	}
}