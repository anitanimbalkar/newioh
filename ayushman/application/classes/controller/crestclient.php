<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Crestclient extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$content = View::factory('vuser/vrestclient');
		$this->template->content = $content;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
} // End Welcome
