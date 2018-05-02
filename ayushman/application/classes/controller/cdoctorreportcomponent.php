<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdoctorreportcomponent extends Controller{
	//action to add beneficiary.
	public function action_view()
	{
		try{
			$content = View::factory('vuser/vcorporate/vdoctorreportcomponent');
			$doctorUserId 			= $this->request->post("doctorUserId");
			$doctorid 				= $this->request->post("doctorid");
			$width 					= $this->request->post("width");
			$from 					= $this->request->post("from");
			$to 					= $this->request->post("to");
			$height 				= $this->request->post("height");
			
			if(isset(Auth::instance()->get_user()->id)){
				$corporateuserid = Auth::instance()->get_user()->id;
			}else{
				$corporateuserid 		= $this->request->post("corporateuserid");
			}
			 $pageURL = 'http';
			 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
			 	$pageURL .= "localhost:".$_SERVER["SERVER_PORT"]; //localhost is hardcoded as it takes long time to generate pdf if it is www.indiaonlinehealth.com
			 } else {
			  	$pageURL .= "localhost";
			 }
			$duration['from'] = $from;
			$duration['to'] = $to;
			$objUserForDoctor 	= ORM::factory('user')->where('id','=',$doctorUserId)->find();

			$content->bind('doctorUserId',$doctorUserId);
			$content->bind('doctorid',$doctorid);
			$content->bind('pageURL',$pageURL);
			$content->bind('width',$width);
			$content->bind('duration',$duration);
			$content->bind('height',$height);
			$content->bind('objUserForDoctor',$objUserForDoctor);
			$content->bind('corporateuserid',$corporateuserid);
			
			$this->response->body($content);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}
