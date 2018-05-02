<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cfeedback extends Controller {
	
	public function action_savefeedback()
	{
	 	$comment=$this->request->post('feedbacktext');
	 	$currenturl=$_GET['currenturl'];
	 	$obj_authuser = Auth::instance()->get_user();
	 	$userid = $obj_authuser->id;
	 	$username = $obj_authuser->Firstname_c;
	 	$time=date(" j F Y, G:i:s");
	 	$feedbacktime= date('Y-m-d H:I:s',strtotime($time));;
	 	$obj_feedbackdetails = new Model_Feedbackdetails;
		$obj_feedbackdetails->refuserid_c=$userid;
		$obj_feedbackdetails->feedbacktime_c=$feedbacktime;
		$obj_feedbackdetails->url_c=$currenturl;
		$obj_feedbackdetails->comments_c=$comment;
		$obj_feedbackdetails->save();
		$message="<html>
					<head>
					</head>
					<body>
					<div style='padding: 14px; margin-bottom: 4px; background-color: rgb(221,239,254);'>
					<a target='_blank' href='http://".$_SERVER['HTTP_HOST']."/ayushman/' style='color: rgb(255, 255, 255);'>
					<img width='99px' height='50px' style='display: block; border: 0pt none;' src='http://".$_SERVER['HTTP_HOST']."/ayushman/assets/images/ayushman_logo.png'   alt='Ayushman'>
					</a>
					</div>
					<div>
					<br/>
					<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr>
						<td width='5%'></br></td>
						<td>
						<h2 style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin: 0pt 0pt 16px; font-size: 18px; font-weight: normal;'>Hi,</h2>
						<p></t>comment from ayushman user ".$username." id is ".$userid." </p>
						<p></t>comments at ".$time." by  user are </p>
						<p>".$comment."</p>
						<p></t>comments for url: ".$currenturl."  </p>
						<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; font-size: 13px; line-height: 18px; border-bottom: 1px solid rgb(25,25,112); padding-bottom: 10px; margin: 0pt 0pt 10px;'>
						<span style='font: italic 13px Georgia,serif; color: rgb(102, 102, 102);'>The Ayushman Team</span>
						</p>
						<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'></p>
						<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
						If you received this message in error and did not sign up for a Ayushman account, click
						<a target='_blank' href='http://".$_SERVER['HTTP_HOST']."/ayushman/'>not my account</a>
						.
						</p>
						<p style='font-family:Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
						Please do not reply to this message; it was sent from an unmonitored email address. This message is a service email related to your use of Ayushman. For general inquiries or to request support with your Ayushman account, please visit us at
						<a target='_blank' href='http://".$_SERVER['HTTP_HOST']."/ayushman/'>Ayushman Support</a>
						.
						</p>
						</td>
						</tr>
						</table>
						</div>
						</div>
						</body>
						<html>
					";
		email::send('ksuvidya@gmail.com', 'noreply@ayushman.co','comments', $message, TRUE);
	}
	
	public function action_savefeedbackdetails()
	{
		try{
			if (HTTP_Request::POST == $this->request->method())
			{
				$objUserfeedback = orm::factory('userfeedback');
				$objUserfeedback ->emailid_c= $this->request->post('emailID');
				$objUserfeedback ->contactnumber_c=$this->request->post('contactnumber');
				$objUserfeedback ->comment_c = $this->request->post('comments');
				$objUserfeedback ->firstname_c = $this->request->post('name');
				$objUserfeedback ->save();
				$notification=  array();
				$notification['id']='-4';$notification['template']='feedbackemail';$notification['email']='true';$notification['useremail']=$objUserfeedback ->emailid_c;$notification['username']=$objUserfeedback ->firstname_c;$notification['contactnumber']=$objUserfeedback->contactnumber_c;$notification['comments']=$objUserfeedback ->comment_c;
				helper_notificationsender::sendnotification($notification);
				Request::current()->redirect('home/Feedback.shtml?successfully="successfully"');
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	
}