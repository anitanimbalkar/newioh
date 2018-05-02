<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cayushcareconsumer extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$errors = array();
		$messages= array();
		$_POST['status'] = 'subscribed';
		$_POST['search'] = '';
		$whereclause = '[status,=,subscribed]';
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause){
		$content = View::factory('vuser/vadmin/vayushcareconsumers');
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('whereclause',$whereclause);
		$this->template->content = $content;
	}
	public function action_search(){
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			
			$status = $_POST['status'];
			$search = $_POST['search'];
			if($search != ''){
				$whereclause = '[iohid,like,'.$search.'%][status,like,'.$status.'](or)[consumername,=,'.$search.'%][status,like,'.$status.'](or)[planname,like,'.$search.'%][status,like,'.$status.'](or)[email,like,'.$search.'%][status,like,'.$status.']';
			}else{
				$whereclause = ($status == '')?'':'[status,=,'.$status.']';
			}
			$this->display($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($errors,$messages,$whereclause);
		}
	}
	public function action_changestatus(){
		try{
			$consumerid 	= $_GET['consumerid'];
			$subscribedUser = ORM::factory('subscribedconsumer')->where('iohid_c','=',$consumerid)->find();
			if($subscribedUser->id == null){
				$subscribedUser = ORM::factory('subscribedconsumer');
				$subscribedUser->iohid_c = $consumerid;
				$subscribedUser->status_c = 'active';
				$subscribedUser->save();
				$data = array();
				$data['type'] = 'data';
				$data['data'] = 'Consumer id '.$consumerid.' is processed successfuly';
				die(json_encode($data));
			}else{
				$data = array();
				$data['type'] = 'data';
				$data['data'] = 'Consumer id '.$consumerid.' is already processed';
				die(json_encode($data));

			}

		}catch(Exception $e){
			var_dump($e);
			$data = array();
			$data['type'] = 'error';
			$data['data'] = 'Error occured while processing the consumer';
			die(json_encode($data));


		}
	}

}	
