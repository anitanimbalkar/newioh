<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cbackgroundprocesses extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$search = '';
		$this->searchAndDisplay($errors, $messages, '');
	}
	private function searchAndDisplay($errors, $messages,$search)
	{
		try{
			$content = View::factory('vuser/vadmin/vprocesses');
			$result = $this->getList($search);
			$content->bind('result',$result);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search()
	{
		try{
			$errors = array();
			$messages = array();
			$search = $_POST['search'];
			$this->searchAndDisplay($errors, $messages, $search);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function getList($searchstring)
	{
		$objProcess = '';
		if($searchstring == ''){
			$objProcess = ORM::factory('backgroundprocess')->findAll()->as_array();
		}else{
			$objProcess = ORM::factory('backgroundprocess')
					->where('processname','like','%'.$searchstring.'%')
					->or_where('timeofexecution','like','%'.$searchstring.'%')
					->or_where('status','like','%'.$searchstring.'%')
					->or_where('description','like','%'.$searchstring.'%')
					->or_where('result','like','%'.$searchstring.'%')

					->findAll()->as_array();
		}
		return $objProcess;
	}
}
