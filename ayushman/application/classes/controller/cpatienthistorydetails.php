<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatienthistorydetails extends Controller_Ctemplatewithmenu {
//var $uploaddestination = "/wamp/www/ayushman/assets/userphotos/";
	public function action_patienthistorydetails()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vpatienthistorydetails');
		
		$objpatient = new Model_Patient;
		$objpatient->where('repatientsuserid_c','=',$obj_user->id)->find();
		
		$content->bind('objpatient', $objpatient);
		$content->bind('user', $obj_user);
		
		$urole = "patient";
		$breadcrumb = "Home>>";
        $this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;	
		
		
	}
	
	

} // End Welcome
