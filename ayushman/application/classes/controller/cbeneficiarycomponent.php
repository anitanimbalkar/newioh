<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cbeneficiarycomponent extends Controller{
	//action to add beneficiary.
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vpatient/vbeneficiarycomponent');
			$beneficiaryUserId 		= $this->request->post("beneficiaryUserId");
			$width 					= $this->request->post("width");
			$height 				= $this->request->post("height");
			
			$objUserForBeneficiary 	= ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
			$content->bind('beneficiaryUserId',$beneficiaryUserId);
			$content->bind('width',$width);
			$content->bind('height',$height);
			$content->bind('objUserForBeneficiary',$objUserForBeneficiary);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}