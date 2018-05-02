<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cservicetemplate extends Controller
{
	/**
	* Initialize properties before running the controller methods (actions),
	* so they are available to our action.
	*/
	public function before()
	{
		// Run anything that need to run before this.
		parent::before();
	}

	/**
	* Fill in default values for our properties before rendering the output.
	*/
	public function after()
	{
		$view = new helper_Serviceview();
		$serviceid = $_GET['serviceid'];
		//$params = implode("&", $_GET);
		$params = URL::query();
		$response = $view->generate($this->request->controller().'/'.$this->request->action(),$params,$serviceid);
		$this->response->body($this->response.$response);
		parent::after();
	}
}
