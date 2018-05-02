<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientpastvisits extends Controller_Ctemplatewithmenu  {

	public function action_display()
	{		
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vpatientpastvisits');
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