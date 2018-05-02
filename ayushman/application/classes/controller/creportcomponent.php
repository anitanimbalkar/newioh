<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Creportcomponent extends Controller{
	//action to add beneficiary.
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vcorporate/vreportcomponent');
			$doctorUserId 		= $this->request->post("doctorUserId");
			$doctorid 		= $this->request->post("doctorid");
			$width 					= $this->request->post("width");
			$from 					= $this->request->post("from");
			$to 					= $this->request->post("to");
			$height 				= $this->request->post("height");
			
			$pageURL = 'http';
			 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
			  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
			 } else {
			  $pageURL .= $_SERVER["SERVER_NAME"];
			 }
			
			$duration['from'] = $from;
			$duration['to'] = $to;
			
			$objUserForDoctor 	= ORM::factory('user')->where('id','=',$doctorUserId)->find();
			$content->bind('doctorUserId',$doctorUserId);
			$content->bind('doctorid',$doctorid);
			$content->bind('width',$width);
			$content->bind('pageURL',$pageURL);
			$content->bind('duration',$duration);
			$content->bind('height',$height);
			$content->bind('objUserForDoctor',$objUserForDoctor);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}