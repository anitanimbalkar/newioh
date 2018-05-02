<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccorporategeneralinfo extends Controller_Ctemplatewithoutmenu {

	public function action_view()
	{
		$content = View::factory('vcorporate/vcorporategeneralinfo');
		$this->template->content = $content;
	}
}