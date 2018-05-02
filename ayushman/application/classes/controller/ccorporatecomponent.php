<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Ccorporatecomponent extends Controller  {

	public function action_view()
	{
		$content = View::factory('vuser/vadmin/vcorporatecomponent');
		$id 					= $this->request->post("id");
		$width 					= $this->request->post("width");
		$height 				= $this->request->post("height");
		$address 				= $this->request->post("address");
		$phonenumber 			= $this->request->post("phonenumber");
		$contactperson 			= $this->request->post("contactperson");
		$corporatename 			= $this->request->post("corporatename");
		$contactpersonphone 	= $this->request->post("contactpersonphone");
		$contactpersonemail 	= $this->request->post("contactpersonemail");
		$contactpersonmobile 	= $this->request->post("contactpersonmobile");
				
		$content->bind('id',$id);
		$content->bind('width',$width);
		$content->bind('height',$height);
		$content->bind('address',$address);
		$content->bind('phonenumber',$phonenumber);
		$content->bind('contactperson',$contactperson);
		$content->bind('corporatename',$corporatename);
		$content->bind('contactpersonphone',$contactpersonphone);
		$content->bind('contactpersonemail',$contactpersonemail);
		$content->bind('contactpersonmobile',$contactpersonmobile);
		
		$this->response->body($content);
		//die($content);
	}
}