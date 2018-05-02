<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Clicense extends Controller_Ctemplatewithmenu  {
	public function action_show(){
		$planid = $_GET['planid'];
		$licenses = ORM::factory('license')->where('refplanid_c','=',$planid)->find();
		$content = View::factory('vuser/vpatient/vlicense');
		$errors = array();
		$messages= array();
		$license = $licenses->licensetext_c;
		$content->bind('planid',$planid);
		$content->bind('license',$license);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->template->content = $content;
	}
}	
