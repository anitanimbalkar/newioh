<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cplanselector extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$session = Session::instance();
		$licenseaccepted = $session->get_once('licenseaccepted');
		$session->delete('licenseaccepted');
		$obj_user 	= Auth::instance()->get_user();
		if($obj_user->refintrowizardid_c == 2){
			$this->displaypackages($errors, $messages);
		}
		else{
			$this->display($errors, $messages);
		}
	}
	private function displaypackages($errors, $messages){
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 1;
		$content->bind('onlypackages',$onlypackages);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}

	private function display($errors, $messages){
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 0;
		$content->bind('onlypackages',$onlypackages);

		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	public function action_showstatus(){
		$messages['message'] = $_GET['messages'];
		$errors = array();
		$this->display($errors,$messages);
	}
}
