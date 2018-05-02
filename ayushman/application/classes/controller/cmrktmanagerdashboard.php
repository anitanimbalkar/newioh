<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cmrktmanagerdashboard extends Controller_Ctemplatewithmenu {
	public function action_mrktmanagerdashboard()
	{
	$this->display();
				
	}
	private function display(){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vmrktmanagerdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$urole = "mrkt_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}
	public function action_removecomment()
	{		
			$feedbackid=$_GET['id'];
				$obj_feedback=ORM::factory('feedbackdetails')
 				->where('id','=',$feedbackid)
 				->find();
				$obj_feedback->resolved_c=1;
				$obj_feedback->save();
				$this->display();
	}
	
} // End Welcome
