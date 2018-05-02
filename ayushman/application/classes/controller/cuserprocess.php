<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cuserprocess extends Controller  {
	public function action_releaseusers(){
		// 
		$currenttime = time();
		$objUser = ORM::factory("user")->where("nooflogins",'>',0)->find_all();
			//SELECT unix_timestamp()-last_login from users 
			// difference in seconds since last login
			// if it is more than 30*60 = 1800 seconds then reset counter
		foreach ($objUser as $userlogged)
		{
			if (($currenttime - $userlogged->last_login) > 1800)
			{
				// logged for more than 30 minutes so decrement counter
				$userlogged->nooflogins = $userlogged->nooflogins - 1;
				$userlogged->save();
			}
		}
	}
	public function action_iamalive()
	{
		$currenttime = time();
		$objUser = Auth::instance()->get_user();
		$userId = $objUser->id;
		$objUser = ORM::factory("user")->where("id","=",$userId)->find();
		if ($objUser->id != null)
		{
			$objUser->last_login = $currenttime;
			$objUser->save();
		}
	}
	
	public function action_releaseallusers(){
		// 
		$currenttime = time();
		$objUser = ORM::factory("user")->where("nooflogins",'>',0)->find_all();
			//SELECT unix_timestamp()-last_login from users 
			// difference in seconds since last login
			// if it is more than 30*60 = 1800 seconds then reset counter
		echo "In function";
		foreach ($objUser as $userlogged)
		{
			echo $userlogged->id;
			// logged for more than 30 minutes so decrement counter
			$userlogged->nooflogins = $userlogged->nooflogins - 1;
			$userlogged->save();
		}
	}
}