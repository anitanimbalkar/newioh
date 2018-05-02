<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatienthistorybookapp extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$this->displayDashboard();
	}
	private function displayDashboard(){
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$content = View::factory('vdoctordashboard');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'patient')))){
			$content = View::factory('vpatientbookapp');
			$content->bind('objuser', $user);
			$content->bind('patientid', $_GET['patientid']);
			$content->bind('rescheduleappid', $_GET['reschedule_appid']);
			
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
	}
} // End Welcome
