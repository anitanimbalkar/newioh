<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Cbarcodegenerator extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$barcode = new helper_codeprinter();
		echo 'http://localhost/ayushman/'.$barcode::barcode('Ananda');
		echo '</br>';
		echo 'http://localhost/ayushman/'.$barcode::qrcode('www.indiaonlinehealth.com');
		die();
		$content = View::factory('vuser/vaccountant/vimportingtransactions');
		$this->template->content = $content;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
} // End Welcome
