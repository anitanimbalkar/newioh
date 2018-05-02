<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientpastappointment extends Controller_Ctemplatewithmenu  {

	public function action_showpatientpastappointment()
	{		
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vpatientpastappointment');
		$urole = "patient";
		$breadcrumb = "Home>>";
		$userid = $obj_user->id;
		$username = $obj_user->Firstname_c;
		$content->bind('userid', $userid);
		$content->bind('username', $username);
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}
}