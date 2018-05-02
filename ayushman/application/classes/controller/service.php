<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Service extends WebService_Controller_Base {
	public function before()
	{
		parent::before();
		
		$this->content = 'no authentication';
		return $this->content;
	}

	public function after()
	{
		parent::after();
		
	}
} // End Main
