<?php defined('SYSPATH') or die('No direct script access.');
#include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
#include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include_once(DOCROOT.'application/classes/helper/notificationsender.php');
include_once(DOCROOT.'application/classes/helper/xmpp.php');

class Controller_Cprogrammanager extends Controller  {
	public function action_sendreminders(){
	// Job set for sending reminders as 
	//php /var/www/testbed/ayushman/index.php --uri=cprogrammanager/sendReminders --CRONID=6
	
		$objreminders = ORM::factory("trackerreminder")
				->where("active_c","=",1)->find_all();
		
		foreach ($objreminders as $objreminder)
		{
			// Consider only date value 
			echo $objreminder->startdate_c;
			//echo date_create($objreminder->startdate_c);
			$currentdate =date("Y-m-d h:i:s");
			$currentdateonly =date("Y-m-d");
			if(($currentdateonly >= date("Y-m-d",strtotime($objreminder->startdate_c))) AND ($currentdateonly >= date("Y-m-d",strtotime($objreminder->lastdate_c))))
			{
				// Check if the notification sent last on date has 
				// elapsed with the frequency(no of days)
				// Find difference between currentdate and date on which notification was last sent
				// If sending for first time then check if current date equals
				// start date then send notification
				if($objreminder->lastdate_c == null)
				{
					echo "I am here";
					// Notification for first time so check whether 
					// today is start date
					if (date("Y-m-d",strtotime($objreminder->startdate_c)) == date("Y-m-d") )
					{
						// Send notification
						$this->sendmessage($objreminder);
						$objreminder->lastdate_c=$currentdate;
						$objreminder->save();
					}
				}
				else
				{
					// Find difference between current date and last message date
					// if this difference is 0 then its time to send next reminder
					$diff = date_diff(date_create($objreminder->lastdate_c),date_create($currentdate));
						
					if (($objreminder->frequency_c > 0) and ($objreminder->frequency_c - $diff->format("%a") ) ==0)
					{
						// Send notifications
						$this->sendmessage($objreminder);
						$objreminder->lastdate_c=$currentdate;
						$objreminder->save();
					}					
				}				
			}
		}
	}
	private function sendmessage($objreminder)
	{
		$templates = Kohana::message('reminder');
		if($objreminder->smsflag_c == 1)
		{
			// Use standard procedure of sending sms and email
			// because mail body will be picked from template			
					$templateobj = $templates[$objreminder->templatecode_c];
			$templatevars = $templateobj['variable'];
			$datavariables = explode(",",$objreminder->templatevariables_c);
			//var_dump($objreminder->templatevariables_c);
			//var_dump($templatevars);
			//var_dump($datavariables);
			$notification=  array();
			$notification['id']=$objreminder->foruserid_c;
			$notification['template']=$objreminder->templatecode_c;
			if($objreminder->smsflag_c == 1)
				$notification['sms'] = 'true';
			else
				$notification['sms'] = 'false';
			if($objreminder->emailflag_c == 1)
				$notification['email'] = 'true';
			else
				$notification['email'] = 'false';
			if (count($datavariables) == count($templatevars))
			{
				// check if number of data and variables match
				for($i=0; $i<count($datavariables); ++$i)
				{
					$notification[$templatevars[$i]] = $datavariables[$i] ;					
				}
				var_dump($notification);
				$notificationsender = new helper_notificationsender();
				$notificationsender->notifyuser($notification);
				var_dump("Sending notification");
			}
			if($objreminder->dbmsgflag_c ==1)
				$this->sendmsgonDB($objreminder);
		}
		else
		{
			// Chances are that the mail body may have been modified
			// so pick template from "description_c" field and send across
			$notification["mailbody"] = $objreminder->description_c;
			if($objreminder->emailflag_c == 1)
				$this->sendemail($objreminder);
			if($objreminder->dbmsgflag_c == 1)
				$this->sendmsgonDB($objreminder);				
		}
	}
	private function sendemail($objreminder)
	{
		$obj_user=ORM::factory('user')
			->where('id','=',$objreminder->foruserid_c)
			->find();
		if(($obj_user->id != null) && ($obj_user->email != "" ))
		{
			$email = $obj_user->email;
			$arr_email =Kohana::$config->load('email');//take email details from config file
			/*$templateName = $array_notication['template'];
			$variable = Kohana::message('email',$templateName.'.variable');
			$mailbody = Kohana::message('email',$templateName.'.mailbody');
			$subject = Kohana::message('email',$templateName.'.subject');
			$returnVarible;*/
			$mailbody = $objreminder->description_c;
			$subject = $objreminder->templatesubject_c;

			$emailtxt="<html>
						<head>
						</head>
						<body>
							<table>
								<tr>
									<td style='width:100%;height:82px;'><img src='https://www.indiaonlinehealth.com/ayushman/assets/images/bgtop.png' /></td>
								</tr>
							</table>
							<div  style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 12px;'>
								".$mailbody."
							<table>
								<tr valign='top'>
   									<td  colspan='7' align='left' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;' >Team <strong><i>IndiaOnlineHealth</i></strong></td>
   									<td width='20'>&nbsp;</td>
								</tr>
								<tr valign='top'>
    								<td  style='align:left;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:9pt;line-height:14pt;color:#333333;text-align:left;padding-top:5px;padding-left: 0px;'><a>support@indiaonlinehealth.com</a></td>                
								</tr>
							</table>
								<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; font-size: 13px; line-height: 18px; border-bottom: 1px solid rgb(25,25,112); padding-bottom: 10px; margin: 0pt 0pt 10px;'><div></div>
								</p>		
								<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'></p>
								<p style='font-family: Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
										If you received this message in error click  
								<a target='_blank' href='#'>not my account</a>.
								</p>
								<p style='font-family:Helvetica Neue,Arial,Helvetica,sans-serif; margin-top: 5px; font-size: 10px; color: rgb(136, 136, 136);'>
									Please do not reply to this message. It was sent from an unmonitored email address. This message is a service email related to your use of IndiaonlineHealth. For general inquiries please visit our home page.
								</p>
						</body>
						</html>";
					
				var_dump($email);
				var_dump($arr_email['options']['username']);
				var_dump($subject);
				var_dump($emailtxt);
			$returnVarible = email::send($email, $arr_email['options']['username'],$subject, $emailtxt, TRUE);			
		}			
	}
	private function sendmsgonDB($objreminder)
	{	
		echo "Msg on db";
		//$user = Auth::instance()->get_user();
		$user = ORM::factory("user")
				->where("id","=",$objreminder->createdby_c)
				->find();
		if($user->id != null)
		{
			echo "Saving on dashboard";
			$queries = ORM::factory('queries');
			$queries->query_c 		= $objreminder->description_c;
			$queries->sentby_c 		= $user->id;
			$queries->isread_c 		= 0;
			$queries->receivedby_c	= $objreminder->foruserid_c;
			$queries->save();			
			$var = xmpp::sendMessage($user->id,$user->xmpppassword_c,$queries->receivedby_c,'Message');
			echo 'done';	
		}
	}
}