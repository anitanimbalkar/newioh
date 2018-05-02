<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Chospitaladmindashboard extends Controller_Ctemplatewithmenu {
	
	public function action_view(){
		try
		{	
			$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'hospitaladmin')))){
			$objDoctor = ORM::factory('user')->where('id', '=', $user->id)->find();
			
				$content = View::factory('vhospitaladmindashboard');
			}
			
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
		
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}