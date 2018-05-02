<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');

class Controller_Cstaffdoctorpanel extends Controller_Ctemplatewithmenu {
	public function action_view(){
		try{	
			$obj_user	= Auth::instance()->get_user();
			$content	= View::factory('vuser/vstaff/vstaffdoctorpanelfromclinics');
			$userid 	= $obj_user->id;
			$content->bind('userid', $userid);
			$name 		= $obj_user->Firstname_c;
			$content->bind('username', $name);
			$this->template->breadcrumb = "";
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = "staff";
		}
		catch(Exception $e){throw new Exception($e);}
	}
}
