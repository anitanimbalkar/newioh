<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ctemplatefornotfromsystem extends Controller_Template
{
	public $template = 'vtemplates/vtemplatefornotfromsystem';

	/**
	* Initialize properties before running the controller methods (actions),
	* so they are available to our action.
	*/
	public function before()
	{
		// Run anything that need to run before this.
		parent::before();
	
		if($this->auto_render)
		{
			// Initialize empty values
			$this->template->content = '';
		}
	}

	/**
	* Fill in default values for our properties before rendering the output.
	*/
	public function after()
	{
		if($this->auto_render)
		{
			$this->template->maximize = false;
		}
	
		// Run anything that needs to run after this.
		parent::after();
	}
}