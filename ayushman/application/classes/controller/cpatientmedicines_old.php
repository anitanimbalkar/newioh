<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientmedicines extends Controller_Ctemplatewithmenu {
	
	public function action_view()
	{
		$content = View::factory('vuser/vpatient/vpatientmedicines');
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
		$userid = $user->id;
		$number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
		$content->bind('userid', $userid);
		$content->bind('number',$number);
	
		$breadcrumb = "Home>>Medicines";
		$maximize = true;
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user =  $user->Firstname_c;
		$this->template->urole = $urole;
	}
	public function action_retrunchemistuserids()
	{
		$chemist=array();
		$chemist = json_decode($_GET['ids']);
		$arr_chemistuserid=array();
		$count =count($chemist);
		for($i=0; $i< $count;$i++)
		{		
			$objchemist	=ORM::factory('chemist');
			$objchemist = $objchemist->where('id','=',$chemist[$i])->find();
			array_push($arr_chemistuserid, $objchemist->refchemistsuserid_c);
		}
		$arr_chemistuserid = array_unique($arr_chemistuserid);
		die(json_encode($arr_chemistuserid));
	}
}