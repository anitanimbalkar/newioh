<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cpasswordmanager extends Controller_Ctemplatewithoutmenu {

	public function action_view()//open view which ask user for email.
	{
		try
		{
			$content = View::factory('vuser/vnewpassword/vverifyuseremailform')
								->bind('errors', $errors);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_userquestionform()//ask user security question and capta  
	{
		try
		{
			$userid=$_GET['id'];
			$error =array();
			$this->displayverifyuserquestionform($userid,$error);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_submitverifyuseremailform()
	{	
 		try
		{
			$email=$this->request->post('username'); 
			$objUser=ORM::factory('user')
								->where('email','=',$email)->or_where('username','=',$email)
								->find();
			if (!($objUser->id))//user with provided email id is not found
			{
				$this->invaliduser('No account found with this username.');
			}
			else//user with provided email id is found
			{
				if(($objUser->activationstatus_c =="inactive") or ($objUser->activationstatus_c =="inactivedoctor") or ($objUser->activationstatus_c =="inactivepathologist")or ($objUser->activationstatus_c =="inactivechemist"))//user account is inactivate
				{
					$this->invaliduser('Account is not activated please activate account');
				}
				else//user account is activate and found id
				{
					//Request::current()->redirect('cpasswordmanager/userquestionform?id='.$objUser->id);
					$error =array();
					$this->displayverifyuserquestionform($objUser->id,$error);
				}
			}
 		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}			
	}
	
	private function invaliduser($errormassage)//email is not correct show server side validation 
	{
		try
		{
			$errors['username'] =$errormassage;
			$content = View::factory('vuser/vnewpassword/vverifyuseremailform')
							->bind('errors', $errors);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}		
	}
	
	private function validateuserforresetpassword()//check url is authorize or not 
	{
		try
		{
			$id=$_GET['id'];
			$forgotPasswordKey=$_GET['key'];
			$obj_user=ORM::factory('user')
					->where('id','=',$id)
					->find();
					
			if (!($obj_user->id))//user with provided  id is not found
			{
				$this->invalidUrl();
			}		
			else//user with provided  id is found
			{
				if(!($obj_user->forgotpasswordkey_c === $forgotPasswordKey))//user activation code not match
				{
					$this->invalidUrl();
					return "invaliduser";
				}
				else//user activation code match
				{
					return "validuser";
				}
			}
 		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_diaplaynewpasswordemailsend()
	{
		try
		{	
			$arr_email =Kohana::$config->load('email');
			$username=$_GET['username'];
			$email=$_GET['email'];
			$viewname="Recover your password";
			$greet="Hi $username";
			$text1="Email sent to an email on $email with link to reset your password.<br/>If you have not received an email for reset password please please check your spam floder for an email from ".$arr_email['options']['username'];
			$text2="";
			$text3="Team <strong><em>IndiaOnlineHealth</em></strong><br>support@indiaonlinehealth.com</span>";
			$content = View::factory('vuser/vemailsuccess');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$content->bind('viewname', $viewname);
			$content->bind('greet', $greet);
			$content->bind('text1', $text1);
			$content->bind('text2', $text2);
			$content->bind('text3',$text3);
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	public function action_displayresetpasswordform()
	{	
		
		try
		{
			$id=$_GET['id'];
			$activationcode=$_GET['key'];
			$validationuser=$this->validateuserforresetpassword();
			if($validationuser === "validuser")
			{
				$content = View::factory('vuser/vnewpassword/vresetpasswordform')
									->bind('errors', $errors);
				$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
				$this->template->breadcrumb = $breadcrumb;
				$content->bind('id',$id);
				$content->bind('activationcode',$activationcode);
				$this->template->content = $content;
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	private function displayverifyuserquestionform($userid,$errors)
	{
		try
		{
			$objUser =ORM::factory('user')
						->where('id','=',$userid)
						->find();
			$objSecurityQuestionMaster= ORM::factory('securityquestionmaster')
						->where('id','=',$objUser->refsecurityquestion_c)
						->mustFind();
			$email=$objUser->email;
			$username=$objUser->username;
			$securityquestion=$objSecurityQuestionMaster->securityquestion_c;
			$content = View::factory('vuser/vnewpassword/vverifyuserquestionform');
			$content->bind('errors', $errors);
			$content->bind('email',$email);
			$content->bind('objUser',$objUser);
			$content->bind('securityquestion',$securityquestion);
			$content->bind('userid',$userid);
			$content->bind('activationcode',$activationcode);
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	
	public function action_submitverifyuserquestionform()
	{
		try
		{	
			$userid=$_GET['id'];
			$session = Session::instance();
 			$securityCode = $session->get('captchasecuritycode');
 			$session->delete('captchasecuritycode');
 			if($_POST) 
        	{
        	    $captchaVerificationCode= $this->request->post('verificationcode');
				if ($securityCode != $captchaVerificationCode)//captcha validation is wrong show error message
				{
					$errors['verificationcode']='Please enter correct verificationcode';
					$this->displayverifyuserquestionform($userid,$errors);
				}	
				else //captcha validation is correct now check for security question answer
				{
					$objUser=ORM::factory('user')
								->where('id','=',$userid)
								->find();
					if((strcasecmp($objUser->securityanswer_c , $this->request->post('securityanswer')) != 0))//answer is wrong
					{
						$errors['securityanswer']='Incorrect answer. Please try again.';
						$this->displayverifyuserquestionform($userid,$errors);
					}
					else//correct security question answer
					{
						$forgotpasswordkey = md5(uniqid(rand(), true));
						$objUser->forgotpasswordkey_c=$forgotpasswordkey;
						$objUser->save();
						//$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cpasswordmanager/displayresetpasswordform?email=".$objUser->email."&key=$forgotpasswordkey";
						//send mail notification 
						$code = substr(md5(microtime()),rand(0,26),4);
						$objUser->activationsmsotp_c= $code;
						$objUser->save();
						$username = trim($objUser->Firstname_c);
						$notification=  array();
						$notification['id']=$userid;
						$notification['template']='forgotpassword';
						$notification['email']='true';
						$notification['username']=$username;
						$notification['code']=$code;
						$notification['sms']='true';
						helper_notificationsender::sendnotification($notification);
						$errors =array();
						$this->Check_OTP($userid,$errors);
					}
				}
			}
			else
			{
				throw new Exception("Error during submition of form");
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	private function Check_OTP($id,$error)//reset password otp
	{
		try{
			
			$objuser = ORM::factory('user')->where('id','=',$id)->find();	
			$viewname	= "Account Activation";
			$greet		= "Dear". $objuser->Firstname_c.",";
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Registration Success</a>";
			$content = View::factory('vuser/vnewpassword/vresetpasswordotp');
			$content->bind('viewname', $viewname);
			$content->bind('objuser', $objuser);
			$content->bind('error', $error);
			$this->template->content = $content;
			$this->template->breadcrumb = $breadcrumb;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	
	public function action_submitresetpassword()
	{
		try
		{
			$validationuser=$this->validateuserforresetpassword();
			if($validationuser == "validuser")
			{	
				$id=$_GET['id'];
				$obj_user=ORM::factory('user')
							->where('id','=',$id)
							->find();
				$post=$this->request->post();
				$obj_user->update_user($_POST,array('password'));//password is set
				$content = View::factory('vuser/vnewpassword/vresetpasswordcomplete');
				$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
				$this->template->breadcrumb = $breadcrumb;
				$this->template->content = $content;
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	private function invalidUrl()//user is using invalid url to change password
	{
		try
		{
			$content = View::factory('vuser/vnewpassword/vinvaliduser');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> ";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
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
				
				$url= "/cpasswordmanager/displayresetpasswordform?id=".$userid."&key=".$obj_user->forgotpasswordkey_c;
				Request::current()->redirect($url);
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
}
