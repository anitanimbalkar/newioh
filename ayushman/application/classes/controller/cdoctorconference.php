<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorconference extends Controller_Ctemplatewithmenu {

	public function action_view()
	{
	 $content = View::factory('vuser/vdoctor/vdoctorconference');
	 $user = "User";
	 $urole = "patient";
	 //$content->bind('user',$user);
	 $breadcrump = "Home>>";
			$this->template->breadcrump = $breadcrump;
	 $this->template->content = $content;
	 $this->template->user = $user;
	 $this->template->urole = $urole;

	}
}