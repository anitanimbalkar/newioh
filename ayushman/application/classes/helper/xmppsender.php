<?php defined('SYSPATH') or die('No direct script access.');
class xmppsender  {
	public static function sendxmpp($array_notication)
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			if($objUser->id != null)
			{	
				$toid = $array_notication['id'];
				$fromid = $objUser->id;
				$msgtxt = Kohana::message('xmpp',$templateName.'.msgbody');
				$returnVariable = xmpp::sendMessage($objUser->id,$objUser->xmpppassword_c,$toid,$msgtxt);
				return $returnVariable;
			}
			else
			{
				throw new Exception("User from xmppid is not found");
			}
		}
		catch(Exception $e1)
		{
			return $e1->getMessage();
		}
	}
}