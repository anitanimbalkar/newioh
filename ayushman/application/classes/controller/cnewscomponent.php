<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Cnewscomponent extends Controller  {

	public function action_view()
	{
		$content = View::factory('vuser/vadmin/vnewscomponent');
		$id 					= $this->request->post("id");
		$width 					= $this->request->post("width");
		$height 				= $this->request->post("height");
		$details 				= $this->request->post("details");
		$newstitle 			= $this->request->post("newstitle");		
		$content->bind('id',$id);
		$content->bind('width',$width);
		$content->bind('height',$height);
		$content->bind('details',$details);
		$content->bind('newstitle',$newstitle);
		
		$this->response->body($content);
		//die($content);
	}
}
