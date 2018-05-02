<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Csessionhandler extends Controller_Ctemplatewithmenu  {

	public function action_removefollowuplink()
	{
		$session = Session::instance();
		$session->delete('followlink');
		die();
	}
}