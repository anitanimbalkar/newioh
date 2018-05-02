<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Chelper extends Controller_Ctemplatewithoutmenu {
	// Show need help form
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->displayPage($errors, $messages);
	}
	
	
	private function displayPage($errors, $messages)
	{
		try{
			$content = View::factory('vneedhelpform');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'>Need Help</a>";
			$this->template->breadcrumb = $breadcrumb;
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	public function action_save()
	{
		$errors = array();
		$messages = array();

		try{
			if (HTTP_Request::POST == $this->request->method())
			{
				$objNeedHelpDetail = orm::factory('needhelpdetail');
				$objNeedHelpDetail ->name_c = $this->request->post('needhelpfor_name');
				$objNeedHelpDetail ->email_c= $this->request->post('needhelpfor_email');
				$objNeedHelpDetail ->contactnumber_c=$this->request->post('contactdetails');
				$objNeedHelpDetail ->comment_c = $this->request->post('needforhelp_comments');
				$objNeedHelpDetail ->needhelpfor_c=$this->request->post('needhelpforselect');
				$objNeedHelpDetail ->save();
				$notification=  array();
				$notification['replyto'] = $this->request->post('needhelpfor_email');
				$notification['id']='-4';$notification['template']='needhelpfor';$notification['email']='true';$notification['comments']=$objNeedHelpDetail ->comment_c;$notification['useremail']=$objNeedHelpDetail ->email_c;$notification['username']=$objNeedHelpDetail ->name_c;$notification['needhelpfor']=$objNeedHelpDetail ->needhelpfor_c;$notification['contactnumber']=$objNeedHelpDetail ->contactnumber_c;
				helper_notificationsender::sendnotification($notification);
				$messages['message'] = "We have sent your comments Successfully. Our Admin will get back to you soon.";
				$this->displayPage($errors, $messages);
			}
			else
			{
				$errors['error'] = "Please try again.";
				$this->displayPage($errors, $messages);
			}
		
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
