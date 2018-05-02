<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccorporateemployees extends Controller_Ctemplatewithoutmenu {

	public function action_view()
	{
		$content = View::factory('vcorporate/vcorporateemployees');
		$this->template->content = $content;
	}
}