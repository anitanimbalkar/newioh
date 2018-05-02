<?php defined('SYSPATH') or die('No direct script access.');
class helper_notificationsender  {
	public static function sendnotification($array_notication)
	{
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			helper_notificationsender::notifyuser($array_notication);
		} else {
			$notificationsender = new helper_asynchronusprocesses ;
			$var = $notificationsender->sendnotificationnow($array_notication);
		}
	}
	public static function sendnotificationattime($array_notication,$datetime)
	{
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			helper_notificationsender::notifyuser($array_notication);
		} else {
			$notificationsender = new helper_asynchronusprocesses ;
			$var = $notificationsender->sendnotificationattime($array_notication,$datetime);
		}
	}
	public static function notifyuser($array_notication)
	{
		try
		{
			if ((array_key_exists("id", $array_notication) == "true") AND (array_key_exists("template", $array_notication) == "true"))
			{
				$var ="";
				if (array_key_exists('email', $array_notication))
				{
					$email_sender = new helper_emailsender();
				 	$var = $email_sender->sendemail($array_notication);
				}	
				if (array_key_exists('xmpp', $array_notication))
				{
					$var = xmpp::sendxmpp($array_notication);	
				}	
				if (array_key_exists('sms', $array_notication))
				{
					$sms_sender = new helper_smssender();
					$var = $sms_sender->sendsms($array_notication);	
				}
				return $var;	
			}
			else
			{
				throw new Exception("Complete Information is not provided for notification");
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	
	public static function sendnotificationtogroup($array_notification)
	{
		try
		{
			if ((array_key_exists("template", $array_notification) == "true"))
			{
				$var ="";
				if (array_key_exists('sms', $array_notification))
				{
					$sms_sender = new helper_smssender();
					$var = $sms_sender->sendSmsToCdmPatients($array_notification);	
				}
				return $var;	
			}
			else
			{
				throw new Exception("Complete Information is not provided for notification");
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}
