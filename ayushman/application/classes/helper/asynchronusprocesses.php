<?php 
/**
  * This class handles all the process which needs to be executed asynchronously.
 */ 
class helper_asynchronusprocesses 
 {
	/**
	  * This function sets a cron to send sms to any user.
	*/
	
		public function sendnotificationnow($notification)
		{
			$notificationjson=json_encode($notification);
			$notificationtrackerobj=ORM::factory('notificationtracker');
			$notificationtrackerobj->notificationjson_c=$notificationjson;
			$notificationtrackerobj->save();
			
			$command = "php ".DOCROOT."index.php --uri=csms/generatesms/".$notificationtrackerobj->id ." | at Now 2>&1";
			$output = shell_exec($command);
		}
		
		public function sendnotificationattime($notification,$datetime)
		{
			$notificationjson=json_encode($notification);
			$notificationtrackerobj=ORM::factory('notificationtracker');
			$notificationtrackerobj->notificationjson_c=$notificationjson;
			$notificationtrackerobj->save();
			
			$command = "echo 'php ".DOCROOT."index.php --uri=csms/generatesms/".$notificationtrackerobj->id ."' | at ".$datetime." 2>&1";
			$output = shell_exec($command);
		}
}
