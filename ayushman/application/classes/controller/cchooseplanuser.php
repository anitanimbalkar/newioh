<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cchooseplanuser extends Controller_Ctemplatewithmenu {
	
	public function action_view(){
		$user = Auth::instance()->get_user();
		$content = View::factory('/vuser/vpatient/vchooseplanuser');
		$this->template->content = $content;
	}
	public function action_submit(){
		$objUser = Auth::instance()->get_user();
		$planUser = ($_POST["ayushcareUser"]);
		switch($planUser){
			case "self":	
				$objUser->refintrowizardid_c = 2;
				$objUser->wizardstatus_c = 3;
				$objUser->save();
				break;
			case "relative":
				$objUser->refintrowizardid_c = 3;
				$objUser->wizardstatus_c = 4;
				$objUser->save();
				break;
		}
		$objUser = Auth::instance()->get_user();
		$path	= ORM::factory('wizardpaths')->where('id','=',$objUser->wizardstatus_c)->find()->path_c;
		Request::current()->redirect($path);
	}
}
