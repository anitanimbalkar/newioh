<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Settings extends Controller_Acl {
	
	public function action_show()
	{
		if($this->_hasAccess){
			$content = View::factory('settings');
			$this->response->body($content);
		}
	}
}
