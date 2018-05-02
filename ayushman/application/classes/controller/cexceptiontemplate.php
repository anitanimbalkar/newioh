<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cexceptiontemplate extends Controller_Template
{
	public $template = 'vtemplates/vblanktemplate';

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
			$this->template->content 	= '';
			$this->template->styles 	= array();
			$this->template->scripts 	= array();
		}
	}

	/**
	* Fill in default values for our properties before rendering the output.
	*/
	public function after()
	{
		if($this->auto_render)
		{
			// Define defaults
			$styles = array( 'assets/css/ui.multiselect.css' => 'screen','assets/css/ayushman fn 1.css' => 'screen',
			'assets/css/ui.jqgrid.css' => 'screen', 'assets/css/jquery-ui-1.8.16.redmond.css' => 'screen','assets/css/jquery-ui-1.8.17.custom.css' => 'screen');
			$scripts = array('assets/js/jquery.jqGrid.min.js'=> 'script','assets/js/i18n/grid.locale-en.js'=> 'script','assets/js/jquery-ui-1.8.17.custom.min.js'=> 'script');
			// Add defaults to template variables.
			$this->template->styles = array_reverse(array_merge($this->template->styles, $styles));			
			$this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
		}
		// Run anything that needs to run after this.
		parent::after();
	}
}