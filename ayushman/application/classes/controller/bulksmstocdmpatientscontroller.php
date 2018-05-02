<?php defined('SYSPATH') or die('No direct script access.');

include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Bulksmstocdmpatientscontroller extends Controller_Basewebservice {	

	public function action_sendSmsToGroup()
	{
		$mobilenumbers = $_POST['mobilenumbers'];
		$msgtext = $_POST['msgtext'];
		
		$array_data=array();

		$notification=  array();				
				$notification['mobilenumbers']=$mobilenumbers;
				$notification['template']='dissociation';
				$notification['sms']='true';
				$notification['msgtext']=$msgtext;
				
				$returnValue = helper_notificationsender::sendnotificationtogroup($notification);
				
			$array_data['returnedValue'] = $returnValue;
		$this->content= $array_data;
		return $this->content;
	}
	
}