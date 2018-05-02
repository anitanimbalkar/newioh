<?php
defined('SYSPATH') or die('No direct script access.');

class Controller_Ctemplatewithoutmenu extends Controller_Template
{
	public $template = 'vtemplates/vtemplatewithoutmenu';

	/**
	* Initialize properties before running the controller methods (actions),
	* so they are available to our action.
	*/
	public function before()
	{
		// Run anything that need to run before this.
		parent::before();
		if(strpos((isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:""),$_SERVER['HTTP_HOST']) !== false ){
			
		}else{
			//Request::current()->redirect('/home/index.shtml');
		}
		if($this->auto_render)
		{
			// Initialize empty values
		
			$this->template->content = '';
			$this->template->styles = array();
			$this->template->scripts = array();
			$this->template->cobrandedsrc ='';
		}
	}

	/**
	* Fill in default values for our properties before rendering the output.
	*/
	public function after()
	{
		if($this->auto_render)
		{
			$previousvalues = array();
			if($_POST){
				$previousvalues = $_POST;
			}
			$this->template->content->bind('previousvalues', $previousvalues);
			
			// Define defaults
			$styles = array();
			$scripts = array();
			// Add defaults to template variables.
			$this->template->styles = array_reverse(array_merge($this->template->styles, $styles));
			$this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
		}
	
		// Run anything that needs to run after this.
		parent::after();
	}
}