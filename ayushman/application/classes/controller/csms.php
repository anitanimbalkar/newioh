
<?php defined('SYSPATH') or die('No direct script access.');
/**
  * This is the class which handles the sending of sms regarding various notifications.   *
 */ 
class Controller_Csms extends Controller{
	/**
	  * The intent behind creating this action was to keep the sms sending asynchronous.
	  * This Action accepts the sms details in json format.
	*/
						public function action_generatesms() 
						{
							
							try
							{  
								
								$jsonid=$this->request->param('id');
								$notificationobj=ORM::factory('notificationtracker')->where('id','=',$jsonid)->find();
								$notificationjson=$notificationobj->notificationjson_c;
								$notificationjson=json_decode($notificationjson);
								$notification = array();
								foreach($notificationjson as $key => $value)
									{
										$notification[$key]=$value;
										
									}
								
								$notificationsender = new helper_notificationsender();
								$var = $notificationsender->notifyuser($notification);
								$notificationobj->status_c=$var;
								$notificationobj->save();
							}
							catch (Exception $e) 
							{
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
							
							
						}
					}