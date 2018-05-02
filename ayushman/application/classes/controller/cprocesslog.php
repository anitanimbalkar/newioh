<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cprocesslog extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$search = '';
		$encrypt = Encrypt::instance('default');
		$cronJobId	= urldecode($encrypt->decode($_GET['cj']));

		$this->searchAndDisplay($errors, $messages, '',$cronJobId);
	}
	private function searchAndDisplay($errors, $messages,$search,$cronJobId)
	{
		try{
			$content = View::factory('vuser/vadmin/vlogs');
			$i = ORM::factory('cronjob')->where('id','=',$cronJobId)->find()->refprocessid_c;
			$processname = ORM::factory('process')->where('id','=',ORM::factory('cronjob')->where('id','=',$cronJobId)->find()->refprocessid_c)->find()->name_c;
			$result = $this->getList($search,$cronJobId);
			$content->bind('result',$result);
			$content->bind('processname',$processname);
			$content->bind('errors',$errors);
			$content->bind('cronJobId',$cronJobId);
			$content->bind('messages',$messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search()
	{
		try{
			$errors 	= array();
			$messages 	= array();
			$search 	= $_POST['search'];
			$cronJobId	= $_GET['cj']; 
			$this->searchAndDisplay($errors, $messages, $search, $cronJobId);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function getList($searchstring,$cronJobId)
	{
		$objProcess = '';
		if($searchstring == ''){
			$objProcess = ORM::factory('log')->where('refcronid_c','=',$cronJobId)->findAll()->as_array();
		}else{
			$objProcess = ORM::factory('log')->where('refcronid_c','=',$cronJobId)
					->where('result_c','like','%'.$searchstring.'%')
					->findAll()->as_array();
		}
		return $objProcess;
	}
}
