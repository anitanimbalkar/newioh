<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
class Controller_Ccorporatelist extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages,'');
	}
	
	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages, $search)
	{
		try{
			$content 	= View::factory('vuser/vadmin/vcompanylistpage');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('search', $search);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_search()
	{
		$messages = array();
		$errors = array();
		try {
			if($_POST)
			{
				$this->display($errors,$messages,$_POST['search']);
			}else{
				$errors['search'] = 'Could not search corporates.';
				$this->display($errors, $messages);
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
}