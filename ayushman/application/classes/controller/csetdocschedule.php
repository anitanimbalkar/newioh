<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Csetdocschedule extends Controller_Ctemplatewithmenu {

	public function action_setdocschedule()
	{
		 $user = Auth::instance()->get_user();		
		 $content = View::factory('vuser/vdoctor/vsetdocschedule'); 	 
		 $userid = $user->id;
		 $content->bind('doctorid',$userid );
		 $urole = "doctor";
		 $breadcrumb = "Home>>";
		 $this->template->breadcrumb = $breadcrumb;
		 $this->template->content = $content;
		 $this->template->user ="Dr. ".trim($user->Firstname_c);
		 $this->template->urole = $urole;

	}
}