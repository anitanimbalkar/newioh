<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Category extends Controller_Acl {

	public function action_create()
	{
			$content = View::factory('category');
			$this->response->body($content);
	}
}
