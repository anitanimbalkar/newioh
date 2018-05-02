<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cayushcaremanager extends Controller_Ctemplatewithoutmenu  {
	public function action_acknowledge()
	{
		$content = View::factory('vayushcareservice/vacknowledgement');
		$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'> AyushCare Service</a>";
		$objCities = ORM::factory('ayushcarecity')->findAll()->as_array();
		$arrCity=array();
		foreach($objCities as $objCity)
		{
			if(! empty($objCity->city_c))
			array_push($arrCity,trim(ucfirst($objCity->city_c)));
		}
		$arrCity=array_unique($arrCity);
		sort($arrCity);
		$this->template->breadcrumb = $breadcrumb;
		$content->bind('arrCity', $arrCity);
		$content->bind('errors', $errors);
		$this->template->content = $content;
	}
	public function action_acknowledgenonregistereduser()
	{
		if($_POST){
			$objNonRegisteredUser 	= ORM::factory('ayushcarenonregistereduser');
			$objNonRegisteredUser->location_c = $_POST['city'];
			$objNonRegisteredUser->emailid_c = $_POST['emailid_c'];
			$objNonRegisteredUser->othercity_c = $_POST['othercity_c'];
			$objNonRegisteredUser->ipaddress_c = $_SERVER['REMOTE_ADDR'];
			$objNonRegisteredUser->save();

			$content = View::factory('vayushcareservice/vnoavailabiltyacknowledgement');
			$breadcrumb = "<a href='/ayushman/' class='bodytext_normal'>Home</a> >> <a href='javascript:void(0);' class='bodytext_normal'> AyushCare Service</a>";
			
			$this->template->breadcrumb = $breadcrumb;
			$content->bind('errors', $errors);
			$this->template->content = $content;
		}
		else{	
			
			Request::current()->redirect('cayushcaremanager/acknowledge');
		}
	}
	public function action_guide()
	{
		$obj_user = Auth::instance()->get_user();
		if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
			$obj_user->refintrowizardid_c = 2;
			$obj_user->wizardstatus_c = 2;	
			$obj_user->save();
			Request::current()->redirect('cdashboard/view');
		}else{
			Request::current()->redirect('/home/AyushCare.shtml');
		}
		
	}
}
