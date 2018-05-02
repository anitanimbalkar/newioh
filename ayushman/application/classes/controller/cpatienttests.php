<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatienttests extends Controller_Ctemplatewithmenu {
	
	public function action_completedtests()
	{
		$content = View::factory('vuser/vpatient/vpatientcompletedtests');
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
		$userid = $user->id;
		$content->bind('userid', $userid);
		
		$breadcrumb = "Home>>Tests";
		$maximize = true;
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user =  $user->Firstname_c;
		$this->template->urole = $urole;
	}
}