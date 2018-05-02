<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cmenu extends Controller_Acl {

	public function action_index()
	{
		$content = View::factory('menu');
		$roles = $this->user->get_role_ids();
		
		$menu = new helper_Menu($roles);
		$objects = $menu->generate();
		
		$content->bind('roles',$roles);
		$content->bind('categories',$objects);
		$this->response->body($content);
	}
}
