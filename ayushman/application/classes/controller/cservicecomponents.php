<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cservicecomponents extends Controller_Cservicetemplate  {
	public function action_foradmin(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$this->response->body('');
	}
	public function action_forserviceconsumer(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
}
