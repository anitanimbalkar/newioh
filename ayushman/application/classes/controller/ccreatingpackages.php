<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccreatingpackages extends Controller_Cacltemplate  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$content = View::factory('vuser/vserviceadmin/vcreatingpackage');
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->response->body($content);
	}
}
