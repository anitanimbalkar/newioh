<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cstaffpendingactivation extends Controller_Ctemplatewithmenu {
	
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	
	private function display($errors, $messages)
	{
		try{
			$content = View::factory('vuser/vstaff/vstaffpendingactivation');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_accept()
	{
		try
		{
			$doctorid = $_GET["doctorid"];
			$objUser = Auth::instance()->get_user();
			$obj_staff= ORM::factory('staff')->where('refstaffuserid_c','=',$objUser->id)->find();
			$obj_favoritestaffbydoctor =ORM::factory('favoritestaffbydoctor')
					->where('reffavdoctorid','=',$doctorid)
					->where('reffavstaffid','=',$obj_staff->id)
					->find();
			$obj_favoritestaffbydoctor->status  = "accepted";
			$obj_favoritestaffbydoctor->save();
			die();
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_reject()
	{
		try
		{
			$doctorid = $_GET["doctorid"];
			$objUser = Auth::instance()->get_user();
			$obj_staff= ORM::factory('staff')->where('refstaffuserid_c','=',$objUser->id)->find();
			$obj_favoritestaffbydoctor =ORM::factory('favoritestaffbydoctor')
					->where('reffavdoctorid','=',$doctorid)
					->where('reffavstaffid','=',$obj_staff->id)
					->find();
			$obj_favoritestaffbydoctor->delete();
			die();
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}