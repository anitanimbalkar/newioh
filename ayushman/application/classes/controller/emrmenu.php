<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Emrmenu extends Controller_Acl {

	public function action_show()
	{
		if($this->_hasAccess){
			$content = View::factory('emrmenu');
			$this->response->body($content);
		}
	}
}
