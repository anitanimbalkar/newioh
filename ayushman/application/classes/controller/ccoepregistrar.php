<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');

class Controller_Ccoepregistrar extends Controller_Ctemplatewithoutmenu {
	public function action_autoregister()
        {
			 $obj_coepusers=ORM::factory('coepuser')->where('year','=','new')->find_all();
			 foreach($obj_coepusers as $obj_coepuser){
				 try{
							$arrPost  = array();
							$planid = 86;		
							//before running this script, please check username, email id and password
							$arrPost['username'] 	= 'coep'.$obj_coepuser->username;
							$arrPost['email'] 		=$obj_coepuser->email;
							$password = 'coep_'.rand(1000, 9999);
							
							$arrPost['password'] 			= $password;
							$arrPost['password_confirm']    = $password;
							$arrPost['firstname']      		= $obj_coepuser->firstname;
							$arrPost['mobilenumber']		= $obj_coepuser->MobileNumber;
							
							$email  = $arrPost['email'];
							if( ORM::factory('user')->where('username','=',$arrPost['username'])->find()->id != null){
								echo 'coep'.$obj_coepuser->username.' exists !!';
								$user = ORM::factory('user')->where('username','=',$arrPost['username'])->find();
								$user->update_user($arrPost,array('password'));
							}else{
								$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
								$user->add('roles', ORM::factory('role', array('name' => 'login')));
								$userrole	= 'patient';
								$user->add('roles', ORM::factory('role', array('name' => $userrole)));
								switch ($userrole) {
								case 'patient':$obj_patient=ORM::factory('patient');
										$obj_patient->repatientsuserid_c = $user->id;
										$obj_patient->save();
										break;
							 }

							}
							$arr_user = array();
							$arr_user['activationstatus_c']  = "active";

							$obj_coepuser->iohid 		= $user->id;
							$obj_coepuser->password 	= $password;
							$obj_coepuser->ordernumber = 'new';
							$obj_coepuser->appid = 'new';
							$obj_coepuser->save();
							$activationcode                =  md5(uniqid(rand(), true));
							$arr_user['id'] = $user->id;
							$arr_user['lastname_c']                                = '';
							$arr_user['middlename_c']                         = '';
							$arr_user['Firstname_c']                              = trim($arrPost['firstname']);
							$arr_user['mobileno1_c']                             = trim($arrPost['mobilenumber']);
							$arr_user['email']                                                            = $email;
							$arr_user['refsecurityquestion_c']= 14;
							$arr_user['securityanswer_c']   = 'COEP';
							$arr_user['activationcode_c']     =  $activationcode;
							$arr_user['accountcreatedby_c']              = 'coepscript';
															   
							$returned_value = ORM::factory('user')->save_userdetails($arr_user);
							if($returned_value['type'] == 'exception')
									throw new Exception($returned_value['data']);
									
									
							// Plan selection
							$array_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
							$userid = $user->id;
							$objAccounts = ORM::factory('billingaccount');
							$objAccounts = $objAccounts->where('refaccountuserid_c','=',$userid)->find();
							if($objAccounts->id == null)
								$result = transaction::createaccount($userid);
							$objAccounts = $objAccounts->where('refaccountuserid_c','=',$userid)->find();
							transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,0,4);
							transaction::transfer($objAccounts->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$array_accounts["ayushmanincomeuserid"])->find()->accountcode_c,1,0,5);
							
							$objPlans = ORM::factory('billingindividualplan');
							$objPlans = $objPlans->where('refusersid_c','=',$userid)->where('status_c','=','active')->findAll();
							foreach($objPlans as $plan)
							{
								$plan->status_c 	= 'changed';
								$plan->updateddate_c 	= date('Y-m-d g:i:s a');
								$plan->updatedby_c	= $userid;
								$plan->saveRecord();
							}

							$objPlans = ORM::factory('billingindividualplan');	
							//save plan id against user if all transaction are successful
							$objPlans->refplanid_c 		= $planid;
							$objPlans->refusersid_c 	= $userid;		
							$objPlans->status_c 		= 'active';
							$objPlans->createddate_c 	= date('Y-m-d g:i:s a');
							$objPlans->updateddate_c 	= date('Y-m-d g:i:s a');
							$objPlans->subscriptiondate_c 	= date('Y-m-d g:i:s a'); 
							$objPlans->updatedby_c 		= $userid;
							$objPlans->saveRecord();
							
							//save selected plan against billingaccount 
							$objAccountPlans = ORM::factory('billingaccountplan');
							$objAccountPlans = $objAccountPlans->where('refmyaccountid_c','=',$objAccounts->id)->where('status_c','=','active')->find();
							if($objAccountPlans->id == '')
							{
								$objAccountPlans						= ORM::factory('billingaccountplan');
								$objAccountPlans->refmappedaccountid_c 	= $objAccounts->id;
								$objAccountPlans->refmyaccountid_c 		= $objAccounts->id;
								$objAccountPlans->createddate_c 		= date('Y-m-d g:i:s a');
								$objAccountPlans->updateddate_c 		= date('Y-m-d g:i:s a');
								$objAccountPlans->updatedby_c 			= $userid;		
								$objAccountPlans->refplanid_c 			= $planid;	
								$objAccountPlans->status_c 			= 'active';	
								$objAccountPlans->save();
							}
							else{
								$objAccountPlans->updateddate_c 		= date('Y-m-d g:i:s a');
								$objAccountPlans->updatedby_c 			= $userid;		
								$objAccountPlans->refplanid_c 			= $planid;
								$objAccountPlans->status_c 			= 'active';				
								$objAccountPlans->update();
							}

							//$this->sendregistrationemail($email,$activationcode,$arrPost['firstname'],$userrole);
							//$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();
							//$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
							
							
							
							echo 'success-'.$arrPost['username'].'</br>';
					}
					catch (Exception $e)
					{
						var_dump($e);
							echo 'failed-'.$arrPost['username'].'</br>';
					}
			}
			die('done');
     }
               
	public function action_checkpassword(){
		 $obj_coepusers=ORM::factory('coepuser')->where('year','=','Employee')->find_all();
		 $arr_passwords = array();
		 foreach($obj_coepusers as $obj_coepuser){
			 try{
						$arrPost  = array();
						
						$arrPost['username'] 	= 'coep'.$obj_coepuser->username;
						$password = $obj_coepuser->password;

						$arrPost['password'] 			= $password;
						$arrPost['password_confirm']    = $password;
						
						
							$arr_password = array();
							$user = ORM::factory('user')->where('id','=',238)->find();
							$user->update_user($arrPost,array('password'));
							
							$actualpassword = ORM::factory('user')->where('username','=',$arrPost['username'])->find()->password;
							
							array_push($arr_password,$arrPost['username']);
							array_push($arr_password,$arrPost['password']);
							array_push($arr_password,$user->password);
							array_push($arr_password,$actualpassword);
							
							array_push($arr_passwords, $arr_password);
								
						
				}catch(Exception $e){
					var_dump($e);
				}
			}
			$date = date_create();		
			export::toexcel($arr_passwords,'passwords_'.date_timestamp_get($date).'.xls');
			die('Done');
	}
			   
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
			
			$session = Session::instance();
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$isAyushcarePatient=$session->get('isAyushcarePatient');
			$content = View::factory('vuser/vregistration/vregistrationform')->bind('errors', $errors)->bind('isAyushcarePatient', $isAyushcarePatient);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Form</a>";
			$content->bind('array_securityquestion', $arrSecurityQuestions);
			$content->bind('objcountries', $objCountries);
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
					}
					$activationcode	=  md5(uniqid(rand(), true));
					$arr_user['lastname_c'] 		= trim($this->request->post('lastname'));
					$arr_user['Firstname_c']		= trim($this->request->post('firstname'));
					$arr_user['mobileno1_c']		= trim($this->request->post('mobilenumber'));
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
					$this->sendregistrationemail($email,$activationcode,$this->request->post('firstname'),$userrole);
					
					$obj_user = ORM::factory('user')->where('id','=',$returned_value['data'])->find();
					$op = xmpp::register($obj_user->id,$obj_user->xmpppassword_c,$obj_user->email);
					$username = $this->request->post('firstname');
					$encrypt = Encrypt::instance('default');
					$encrypted_username = urlencode($encrypt->encode($username));
					Request::current()->redirect('cregistrar/showregistrationstatus?u='.$encrypted_username);
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
	public function action_showregistrationstatus()
	{
		$encrypt = Encrypt::instance('default');
		$message = "Thank you very much for creating an account with <strong><i>IndiaOnlineHealth.com</i></strong>.<br/>We have sent an email to your registered email address. Please follow the instructions in that email to activate your account.<br/>Please ensure to check your spam folders in case you have not received the mail with activation instructions.<br/>Please add support@indiaonlinehealth.com to your address book and to safe senders list so that the mails that we send reach you.<br/>If you do not find your activation email in spam folder as well, please mail us at <strong><i>support@indiaonlinehealth.com</i></strong>. We would be glad to respond to you at the earliest.";
		$username = urldecode( $encrypt->decode($_GET['u']));
		$this->acknowledge_registration($username,$message);
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
						$notification=  array();
						$notification['id']=$obj_user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$obj_user->id;
						notificationsender::sendnotification($notification);
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

	public function action_completeregistration(){
		$email	= $_GET['email'];
		$activationcode	= $_GET['key'];
		$errors = array();
		$this->displayincompleteregistration($errors,$email,$activationcode);
	}
	
	private function displayincompleteregistration($errors,$email,$activationcode){
		$obj_user 	= ORM::factory('user')->where('email','=',$email)->find();
			
	 	$username = $obj_user->Firstname_c;
		if($obj_user->activationcode_c != $activationcode)//user activation code not match
		{
			$this->showactivationstatus('Anonymous', '<div class="bodytext_error"> Registration Failure! This link is tampered or your registration is completed. Please check your email inbox and click on the activation link again if this error persists, your have completed registration.</div>');
		}
		else//user activation code match
		{
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
	private function sendregistrationemail($email,$activationcode,$firstname,$userrole)
	{
		$website_url= "http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/activate?email=".$email."&key=$activationcode";
		$obj_user = ORM::factory('user')->where('email','=',$email)->find();
		$notification=  array();
		$notification['id']=$obj_user->id;$notification['template']='registartion';$notification['email']='true';$notification['username']=$firstname;$notification['website_url']=$website_url;$notification['sms']='true';
		notificationsender::sendnotification($notification);
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
	
	public function action_newstaffactivation()
	{
		try{
			$doctorid = $_GET['drid'];	
			$staffemail = $_GET['email'];	
			$activationcode =$_GET['key'];
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
				$this->displaystaffregistration($errors,trim($this->request->post('email')), $this->request->post('doctorid'));

			}
			$doctorid=$this->request->post('doctorid');
			// add 'login' and 'role of the user' roles in roles_users table 
			$arrPost 			= $this->request->post();
			$arrPost['username']= $this->request->post('email');
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
			notificationsender::sendnotification($notification);
	   	 	$username=$this->request->post('firstname');
	   	 	//redirct to acknowledge page.
			$text1="Thank you for registering on <strong><i>IndiaOnlineHealth</i></strong> platform as a staff.";
			$this->acknowledge_registration($username,$text1);
		}else{
			$this->showactivationstatus('Anonymous', '<div class="bodytext_error">Link has been accessed incorrectly, Please go back to previous link and try again.</div>');	
		}	
	}
	
	public function action_patientregistrationbystaff()
	{
		try{
				$session = Session::instance();
				$obj_validation = new Validation($_GET);
				$security_code = $session->get('captchasecuritycode');
				$obj_validation = Validation::factory($_GET) 
							->rule('verificationcode', 'not_empty')
							->rule('verificationcode', 'equals', array(':value', $security_code));
				$returnArray = array();
				if(!$obj_validation->check())//check for capcha verification
				{
					$returnArray['errors']["verificationcode"] ="code doesn't match";
				}
				else{
					$returnArray['errors']["verificationcode"] ="false";
					if($_GET['email'] == "" )//if email not present
					{
						$user =ORM::factory('user')->order_by('id', 'desc')->limit(1)->find();
						$userid = $user->id + 1;
						$_GET['email'] = $userid."@inhealth.com";
						$returnArray["emailPresent"] ="false";
					}
					else
					{
						$returnArray["emailPresent"] ="true";
						
					}
					$password = md5(uniqid(rand()));//create 6 chara password
					$password = substr($password,-8);
					$arrPost['username']= $_GET['email'];
					$arrPost['password']= $password;
					$arrPost['email'] = $_GET['email'];
					$arrPost['password_confirm'] = $password;
					$activationcode	=  md5(uniqid(rand(), true));
					$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$user->add('roles', ORM::factory('role', array('name' => 'patient')));
					$user->lastname_c 	= trim($_GET['lastname']);
					$user->Firstname_c	= trim($_GET['firstname']);
					$user->mobileno1_c	= trim($_GET['mobilenumber']);
					$user->phonenohome_c	= trim($_GET['contactnumber']);
					$user->activationcode_c	= $activationcode;
					$user->activationstatus_c	= 'inactive';
					$user->accountcreatedby_c ="staff";
					$user->xmpppassword_c = $user->password ;
					$obj_patient=ORM::factory('patient');
					$obj_patient->repatientsuserid_c = $user->id;
					$obj_patient->save();				
					$user->save();
					$op = xmpp::register($user->id,$user->xmpppassword_c,$user->email);
					if($_GET['mobilenumber'] !="" )//mobile number present
					{	
						$notification=  array();
						$notification['id']=$user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$user->id;
						notificationsender::sendnotification($notification);
						$returnArray["mobilenumberPresent"] = "true";
					}
					else
					{
						$returnArray["mobilenumberPresent"] = "false";
					}
					if($returnArray["emailPresent"] =="true")//email present
					{	
						$notification=  array();
						$website_url= "http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/patientactivation?email=".$_GET['email']."&key=$activationcode";
						$notification['id']=$user->id;$notification['template']='patient_registartion_bystaff';$notification['email']='true'; $notification['username']=$user->Firstname_c;$notification['email']=$_GET['email'];$notification['password']=$password;$notification['website_url']=$website_url;
						notificationsender::sendnotification($notification);
					}
					$returnArray["patientuserid"]=$user->id;
					$returnArray["name"] = trim($_GET['firstname'])." ".trim($_GET['lastname']);
				}
				die(json_encode($returnArray));
		} catch (Exception $e) {
			throw new Exception($e);
		}
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
				$obj_user->activationstatus_c = "active";
				$obj_user->save();
				$notification=  array();
				$notification['id']=$obj_user->id;$notification['template']='registartion_activation_link_click';$notification['sms']='true'; $notification['iohId']=$obj_user->id;
				notificationsender::sendnotification($notification);
				Request::current()->redirect('');

			}
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
	
}
