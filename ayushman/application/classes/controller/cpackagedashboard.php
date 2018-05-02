<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpackagedashboard extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$content = View::factory('vuser/vserviceadmin/vpackagedashboard');
		$this->template->content = $content;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
}
