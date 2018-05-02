<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccorporatevirtualclinics extends Controller_Ctemplatewithoutmenu {

	public function action_view()
	{
		$content = View::factory('vcorporate/vcorporatevirtualclinics');
		$this->template->content = $content;
	}
}