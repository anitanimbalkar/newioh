<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Csendrecommendation extends Controller_Ctemplatewithmenu{
  public function action_sendinvite(){
		$userid=Auth::instance()->get_user()->id;
		$email=$_GET['textfield'];
		$phone=$_GET['textfield2'];
		$message=$_GET['message'];
		$notification=  array();
					$notification['id']=$userid;
					$notification['template']='blanktemplate';
					$notification['sms']='false'; 
					$notification['message']=$message; 
					$notification['email']='true';
		$email_sender = new helper_emailsender();
		$var = $email_sender->sendemailtoaid($notification,$email);
	die;
	}
}