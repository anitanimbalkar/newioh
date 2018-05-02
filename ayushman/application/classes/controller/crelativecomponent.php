<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Crelativecomponent extends Controller{
	//action to add relative.
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vpatient/vrelativecomponent');
			$relativeUserId = $this->request->post("relativeUserId");
			$width 		= $this->request->post("width");
			$height 	= $this->request->post("height");
			
			$objUserForRelative = ORM::factory('showrelative')->where('relativeid','=',$relativeUserId)->where('primaryuserid','=',Auth::instance()->get_user()->id)->find();
			$obj_User = ORM::factory('user')->where('id','=',$relativeUserId)->find();
			$content->bind('relativeUserId',$relativeUserId);
			
			$content->bind('width',$width);
			$content->bind('height',$height);
			$content->bind('obj_User',$obj_User);
			$content->bind('objUserForRelative',$objUserForRelative);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
