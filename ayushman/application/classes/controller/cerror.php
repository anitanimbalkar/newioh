<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cerror extends Controller_Cexceptiontemplate
{
	
	public function action_404()
	{
	    $this->generateView("404 Page Not Found");
	}
	 
	public function action_503()
	{
		$this->generateView("503 Maintenance Mode");
	}
	 
	public function action_500()
	{
		$this->generateView("500 Server Error");
	}
	
	private function generateView($msg)
	{
		$this->template->breadcrumb = "Home";
		$content = View::factory('verror');
		$content->bind('message',$msg);
		$this->template->content = $content;
	}
	public function action_browsers(){
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vsupportedbrowsers');
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$urole = "doctor";
		}else{
			$urole = "other";
		}
		$content->bind('urole',$urole);
		$this->template->breadcrumb = "Home";
		
		$plugin = "";
		$this->template->plugin = $plugin;
		$this->template->content = $content;
	}
}
