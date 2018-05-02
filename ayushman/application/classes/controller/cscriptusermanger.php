<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cscriptusermanger extends Controller {
	public function action_sendsms()
	{
		try
		{
			
				
			$objCoepusers=ORM::factory('coepuser')->find_all();
			
			foreach($objCoepusers as $objCoepuser)
			{	
				if($objCoepuser->iohid != '')
				{
					$notification=  array();
					$notification['id']=$objCoepuser->iohid;
					$notification['template']='coep_student_reminder';
					$notification['sms']='true'; 
					$notification['date']=$objCoepuser->date_c;
					$notification['time']=$objCoepuser->time_c;
					var_dump("before".$objCoepuser->iohid);					
					helper_notificationsender::sendnotification($notification);
					var_dump("after");
					echo "sucessfully send sms to user IOH id".$objCoepuser->iohid."<br/>";

				}
				die();			
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
}
