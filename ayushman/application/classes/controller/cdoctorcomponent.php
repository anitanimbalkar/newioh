<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
class Controller_Cdoctorcomponent extends Controller{
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vdoctor/vdoctorcomponent');
			$objDoctor = $this->request->post("doctor");
			$width 		= $this->request->post("width");
			$height 	= $this->request->post("height");
			$objUserForDoctor = ORM::factory('user')->where('id','=',$objDoctor->doctoruserid)->find();
			$content->bind('objDoctor',$objDoctor);
			$content->bind('width',$width);
			$content->bind('height',$height);
			$content->bind('objUserForDoctor',$objUserForDoctor);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_pendingactivation()
	{
		try{
			$content = View::factory('vuser/vdoctor/vpendingactivationcomponent');
			$doctorid = $this->request->post("doctorid");
			$width 		= $this->request->post("width");
			$height 	= $this->request->post("height");
			
			$objUserForDoctor = ORM::factory('pendingactivationstaffdetail')->where('staffuserid','=',Auth::instance()->get_user()->id)->where('doctorid','=',$doctorid )->find();
			$content->bind('staffUserId',$staffUserId);
			$content->bind('width',$width);
			$content->bind('height',$height);
			$content->bind('objUserForDoctor',$objUserForDoctor);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
