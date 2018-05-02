<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpackageslist extends Controller_Cacltemplate  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages,'vuser/vserviceadmin/vpackageslist');
	}
	private function display($errors, $messages,$view){
		$content = View::factory($view);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->response->body($content);
	}
	public function action_showavailable(){
		$errors = array();
		$messages = array();
		if(isset($_GET['message'])){
			$messages['message'] = $_GET['message'];
		}
		if(isset($_GET['error'])){
			$errors['error'] = $_GET['error'];
		}
		$this->display($errors,$messages,'vuser/vserviceadmin/vavailablepackages');
	}
}
