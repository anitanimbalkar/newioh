<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cstaffdashboard extends Controller_Ctemplatewithmenu  {
	public function action_view(){
		$whereclause="";	
		$viewName="vstaffdashboard";
		$this->displayStaffDashboard($whereclause,$viewName);	
	}
	
	public function action_viewIncompleteAppointment()
	{	
		$whereclause="";	
		$viewName="vstaffdashboardapptincomplete";
		$this->displayStaffDashboard($whereclause,$viewName);
	}
	
	public function action_viewCompletedAppointment()
	{	
		$whereclause="";	
		$viewName="vstaffdashboardapptcompleted";
		$this->displayStaffDashboard($whereclause,$viewName);
	}
	public function action_viewCanceledAppointment()
	{	
		$whereclause="";	
		$viewName="vstaffdashboardapptcancelled";
		$this->displayStaffDashboard($whereclause,$viewName);
	}

	
	public function action_searchbuttononclick()
	{
		$viewName =$_GET['viewName'];
		$whereclause ="";
		$objStaff = ORM::factory('staff') //find the staff with help of userId.
				->where('refstaffuserid_c','=',Auth::instance()->get_user()->id)
						->mustFind();
		$staffid=$objStaff->id;

		if($_POST['selectedDoctor']){
			$doctorUserId = $_POST['selectedDoctor'];
			if( empty ($doctorUserId) )
			{
				$whereclause = "[doctorUserid,=,%]";
			}
			else
			{
				$whereclause = "[doctorUserid,=,$doctorUserId]";	
			}
		}
		if($_POST['search']){
			$search = $_POST['search'];
			$whereclause = "[type,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."](or)[city,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."](or)[DateAndTime,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."](or)[incidentid,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."](or)[Patientname,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."](or)[Doctorsname,like,%".$search."%]".$whereclause."[staffid,=,".$staffid."]";	

		}
		$this->displayStaffDashboard($whereclause,$viewName);
	}
	
	private function displayStaffDashboard($whereclause,$viewName)
	{	
		try
		{	
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$userName = $objUser->Firstname_c;
			$objStaff = ORM::factory('staff') //find the staff with help of userId.
						->where('refstaffuserid_c','=',$userId)
						->mustFind();
			$staffId=$objStaff->id;
			$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctordetail')// find all doctors who selected that staff.
									->where('staffid','=',$staffId)
									->where('status','=','accepted')
									->find_all()
									->as_array();
			$array_doctor=array();
			if(count($objFavoriteStaffByDoctors != 0))// get all doctor's name.
			{
				$result=$objFavoriteStaffByDoctors;
				foreach($result as $res)
				{
					if((!empty($res->doctorName)) && ($res->doctorName != ' ') && !(in_array($res->doctorName,$array_doctor)))
					$array_doctor[$res->doctorUserId]=$res->doctorName ;
				}
			}
			$viewPath='vuser/vstaff/'.$viewName;
			$content = View::factory($viewPath);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$content->bind('array_doctor', $array_doctor);	
			$content->bind('staffid', $staffId);
			$content->bind('whereclause', $whereclause);
			$this->template->content = $content;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}		
	}
	
}	
