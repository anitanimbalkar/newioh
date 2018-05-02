<?php defined('SYSPATH') or die('No direct script access.');
//require_once($_SERVER['DOCUMENT_ROOT'].'/xmpphp/xmpp.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/xmpphp/roster.php');
// Copied /wamp/www/xmpphp to /wamp/www/ayushman/xmpphp
require_once(DOCROOT.'xmpphp/xmpp.php');
require_once(DOCROOT.'xmpphp/roster.php');

class Xmpp  {
	public static function register($username,$password,$email)
	{
		try{
			$arr_xmpp = Kohana::$config->load('xmpp');
			$conn = new XMPPHP_XMPP('localhost', 5222, 'anonymous', '', 'xmpphp', $arr_xmpp['servername'], true);
			try {
				$conn->connect();
				$conn->register($username, $password, $email);
				$conn->disconnect();
			} catch(XMPPHP_Exception $e) {
				return false;
			}
			return true;
		}catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	public static function addRosterContact($jid,$name,$userid,$userpassword)
	{ 
		try{
			$arr_xmpp = Kohana::$config->load('xmpp');
			$conn = new XMPPHP_XMPP('localhost', 5222, $userid, $userpassword, 'xmpphp',$arr_xmpp['servername'], true);
			
			try {
				$conn->connect();
				$conn->processUntil('session_start');
    			$conn->presence(NULL, NULL, $jid, 'subscribe');
				$conn->addRosterContact($jid, $name);		
				$conn->presence(NULL, NULL, $jid, 'subscribe');				
				$conn->disconnect();
				return 'success';
			} catch(XMPPHP_Exception $e) {
				throw new Exception($e);
			} 
		}
		catch(Exception $e1)
		{
			throw new Exception($e1);
		}
	}
	public static function deleteRosterContact($jid,$userid,$userpassword)
	{ 
		try{
			$arr_xmpp = Kohana::$config->load('xmpp');
			$conn = new XMPPHP_XMPP('localhost', 5222, $userid, $userpassword , 'xmpphp', $arr_xmpp['servername'], true);
			$conn->connect();
			$conn->processUntil('session_start');
   			$conn->presence(NULL, NULL, $jid, 'unsubscribe');		
			$conn->deleteRosterContact($jid);
			$conn->disconnect();
			return 'success';
		}
		catch(Exception $e1)
		{
			throw new Exception($e1);
		}
	}
	public static function changePassword($userid,$oldpassword,$newpassword)
	{ 
		
		try{
			$arr_xmpp = Kohana::$config->load('xmpp');
			$conn = new XMPPHP_XMPP($arr_xmpp['servername'], 5222, $userid.'@'.$arr_xmpp['servername'], $oldpassword,  'xmpphp',  $arr_xmpp['servername'], false);
			try {
				$conn->connect();
				$conn->processUntil('session_start');
    			$conn->presence();
				$conn->changePassword($userid,$newpassword);
				$conn->disconnect();
				return 'success';
				
			} catch(XMPPHP_Exception $e) {
				return $e->getMessage();
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
	
	public static function sendMessage($from, $password, $to, $message)
	{ 
		try{
			
			$arr_xmpp = Kohana::$config->load('xmpp');
			$conn = new XMPPHP_XMPP('localhost', 5222, $from.'@'.$arr_xmpp['servername'], $password, 'xmpphp',  $arr_xmpp['servername'], false);
			try {
				$conn->connect();
				$conn->processUntil('session_start');
				$conn->message($to.'@'.$arr_xmpp['servername'], $message);
				$conn->disconnect();
			} catch(XMPPHP_Exception $e) {
				throw new Exception($e);
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}
