<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Ccorporatetransactions extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$search = '';
		$this->display($errors,$messages,$search);
	}
	
	//Common function for displaying all transactions. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages,$search)
	{
		try{
			$content 	= View::factory('vuser/vadmin/vcorporatetransactions');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('search', $search);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}