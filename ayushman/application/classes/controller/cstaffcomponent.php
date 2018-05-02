<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cstaffcomponent extends Controller{
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vstaff/vstaffcomponent');
			$staffUserId = $this->request->post("staffUserId");
			$width 		= $this->request->post("width");
			$height 	= $this->request->post("height");
			
			$objUserForStaff = ORM::factory('favoritestaffbydoctordetail')->where('doctorUserId','=',Auth::instance()->get_user()->id)->where('staffuserid','=',$staffUserId )->where('status','=','accepted')->find();
			$content->bind('relativeUserId',$staffUserId);
			$content->bind('width',$width);
			$content->bind('height',$height);
			$content->bind('objUserForStaff',$objUserForStaff);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
 