<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cchemistdashboard extends Controller_Ctemplatewithmenu{
	public function action_view()
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$username = $objUser->Firstname_c;
			$userId = $objUser->id;
			$content = View::factory('vuser/vchemist/vchemistdashboard');
			$objChemist = ORM::factory('chemist')
						->where('refchemistsuserid_c','=',$userId)
						->mustFind();
			$chemistId=$objChemist->id;
			$content->bind('userid', $userId);
			$content->bind('chemistid', $chemistId);
			$urole = "chemist";
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $objUser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}	
}