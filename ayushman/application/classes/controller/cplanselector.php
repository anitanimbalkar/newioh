<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cplanselector extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$session = Session::instance();
		$licenseaccepted = $session->get_once('licenseaccepted');
		$session->delete('licenseaccepted');
		$obj_user 	= Auth::instance()->get_user();
		if($obj_user->refintrowizardid_c == 2){
			$this->displaypackages($errors, $messages);
		}
		else{
			$this->display($errors, $messages);
		}
	}
	private function displaypackages($errors, $messages){
		// Check if user is Ayushcare user "20244" 
		// Or if the user is registered as Relative of ayushcare
		
		$obj_user 	= Auth::instance()->get_user();
		$objRelative = ORM::factory("relative")->where("refprimaryusersid_c","=",20244)
							->where("refrelativeuserid_c","=",$obj_user->id)->find();
	
		if (($obj_user->id == 20244) OR ($objRelative->id != null))
			$showayushplan = 1;
		else
			$showayushplan = 0;
		
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 1;
		$content->bind('onlypackages',$onlypackages);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('showayushplan',$showayushplan);
		$this->template->content = $content;
	}

	private function display($errors, $messages){
		// Check if user is Ayushcare user "20244" 
		// Or if the user is registered as Relative of ayushcare
		
		$obj_user 	= Auth::instance()->get_user();
		$objRelative = ORM::factory("relative")->where("refprimaryusersid_c","=",20244)
							->where("refrelativeuserid_c","=",$obj_user->id)->find();
		
		if (($obj_user->id == 20244) OR ($objRelative->id != null))
			$showayushplan = 1;
		else
			$showayushplan = 0;		
		
		$content = View::factory('vuser/vpatient/vplanselector');
		$onlypackages = 0;
		$content->bind('onlypackages',$onlypackages);

		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('showayushplan',$showayushplan);
		$this->template->content = $content;
	}
	public function action_showstatus(){
		$messages['message'] = $_GET['messages'];
		$errors = array();
		$this->display($errors,$messages);
	}
}
