<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Userprofile extends Controller {
	//action to add beneficiary.
	public function before()
	{
		$this->a2 = A2::instance('a2-demo');
		$this->user = $this->a2->get_user();
	}
	
	public function action_read()
	{
		try{
			$this->display('read');
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_update()
	{
		try{
			$this->display('update');
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_delete()
	{
		try{
			$this->display('delete');
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function display($action){
		
		$content = View::factory('vuser/v_userprofile_'.$action);
		$beneficiaryUserId 		= $this->request->post("beneficiaryUserId");
		$width 					= $this->request->post("width");
		$height 				= $this->request->post("height");

		if($beneficiaryUserId == $this->user->id){
			$this->a2->allow($this->user->get_role_id(), 'profile', array('read','update','delete','suggest','viewemr'));
		}

		$edit = '';
		$delete = '';

		if($this->a2->allowed('profile','update')){
			$edit = html::anchor('userprofile/update','Edit');
		}
		if($this->a2->allowed('profile','delete')){
			$delete = html::anchor('userprofile/update','Delete');
		}
		if($this->a2->allowed('profile','suggest')){
			$sendrequest = html::anchor('userprofile/update','Suggest');
		}
		if($this->a2->allowed('profile','viewemr')){
			$viewemr = html::anchor('userprofile/update','View Emr');
		}

		$objUserForBeneficiary 	= ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
		$content->bind('beneficiaryUserId',$beneficiaryUserId);
		$content->bind('width',$width);
		$content->bind('height',$height);
		$content->bind('edit',$edit);
		$content->bind('delete',$delete);
		$content->bind('sendrequest',$sendrequest);
		$content->bind('viewemr',$viewemr);
		$content->bind('objUserForBeneficiary',$objUserForBeneficiary);

		$this->response->body($content);
	}
}