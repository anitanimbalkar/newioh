<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ctemplatemenu extends Controller_Template
{
	public $template = 'vtemplates/vtemplatewithmenu';

	/**
	* Initialize properties before running the controller methods (actions),
	* so they are available to our action.
	*/
	public function before()
	{
		// Run anything that need to run before this.
		parent::before();
		
	/*	if(strpos((isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:""),$_SERVER['HTTP_HOST']) !== false ){
			
		}else{
			Request::current()->redirect('/home/index.shtml');
		}*/
		
		if($this->auto_render)
		{
			// Initialize empty values
			$this->template->content = '';
			$this->template->maximize = false;
			$this->template->styles = array();
			$this->template->scripts = array();
			$obj_user = Auth::instance()->get_user();
			$this->template->objuser = $obj_user;
			$arr_xmpp = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
			$this->template->arr_xmpp = $arr_xmpp;
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
			
			$this->template->maximize = false;
		}
		$session= Session::instance()->as_array();
		$source = null;
		if(isset($session['sourceUsername'])){
			$source = $session['sourceUsername'];

			$this->template->source = $source; 
		}
		else{
			$this->template->source = $source;
		}
		// Run anything that needs to run after this.
		parent::after();
	}
}
