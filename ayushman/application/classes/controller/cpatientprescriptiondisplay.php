<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientprescriptiondisplay extends Controller_Ctemplatewithmenu {
	public function action_displayprescription(){
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		//var_dump("u r here");
			$content = View::factory('vuser/vstaff/vpatientconsultation');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
								//var_dump($content);
			$this->template->content = $content;
			
	}

}?>
