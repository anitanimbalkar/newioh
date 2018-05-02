<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ccomments extends Controller_Ctemplatewithmenu {
	
	public function action_displaycomments()
	{
		$feedbackid=$_GET['id'];
		$obj_feedback=ORM::factory('feedback')
 				->where('feedbackdetails_id','=',$feedbackid)
 				->find();
		
		$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vfeedback');
			$content->bind('obj_user', $obj_user);
			$content->bind('obj_feedback', $obj_feedback);
			$username = $obj_user->Firstname_c;
			$urole = "admin";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	}
}