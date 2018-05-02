<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cipdwarddashboard extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{	
		try
		{	
			$objUser = Auth::instance()->get_user();
			$content = View::factory('vuser/vipdward/vipdwarddashboard');
			$urole = "ward";
			$breadcrumb = "Home>>";
			$userid = $objUser->id;
			$objPathologist = ORM::factory('pathologist')
							->where('refpathologistsuserid_c','=',$userid)
							->mustFind();
			$pathologistId = $objPathologist->id;
			$userName = $objUser->Firstname_c;
			$content->bind('userid', $userid);
			$content->bind('pathologistid', $pathologistId);
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