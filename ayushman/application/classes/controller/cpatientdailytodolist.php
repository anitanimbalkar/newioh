<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientdailytodolist extends Controller_Ctemplatewithmenu {

	public function action_view()
	{
	 $content = View::factory('vuser/vpatient/vpatientdailytodolist');
	 $user = "User";
	 $urole = "patient";
	 //$content->bind('user',$user);
	 $breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
	 $this->template->content = $content;
	 $this->template->user = $user;
	 $this->template->urole = $urole;

	}
}