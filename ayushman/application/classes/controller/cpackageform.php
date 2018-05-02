<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpackageform extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$content = View::factory('vuser/vserviceadmin/vpackageform');
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
	public function action_edit(){
		$id = $_GET['id'];
		$package = new helper_Package();
		$packageinfo = $package->get_info($id);
		$_POST = $packageinfo;
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	public function action_save(){
		$errors = array();
		$messages = array();
		try{
			if($_POST){
				$package = new helper_Package();
				$_POST['id'] = $package->save($_POST);
				$messages['message'] = 'Package information is saved.';
			}else{
				$errors['error'] = 'Invalid HTTP method.';
			}
		}catch(Exception $e){
			$errors['error'] = $e->getMessage();
		}
		$this->display($errors,$messages);
	}
}
