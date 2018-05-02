<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpatientdashboard extends Controller_Ctemplatewithmenu  {
	/*public function action_view()
	{	
		try
		{	
			$obj_user = Auth::instance()->get_user();				
			$content = View::factory('vuser/vpatient/vpatientdashboard');
			$urole = "patient";
			$breadcrumb = "Home>>";
			$username = $obj_user->Firstname_c;
			$content->bind('obj_user', $obj_user);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}*/
	public function action_view()
	{	
		try
		{	
			$obj_user = Auth::instance()->get_user();				
			$content = View::factory('vuser/vpatient/vpatientdashboard');
			$urole = "patient";
			$breadcrumb = "Home>>";
			$username = $obj_user->Firstname_c;
			$userid = $obj_user->id;

			//START: patient order from prescription  by Pooja Gujarathi			
                $searchResult = $this->request->post('search');
                //$columns = 'appointmentid,patientsuserid,doctorname,incident,DateAndTime,tests,appointmentid';
                $columns = 'id,userid,refappwithid_c,dateandtime_dateformate,DateAndTime,docnm,incidentsname_c,Place,mode,doctornumber,id,druserid_c';//used for jqgrid
				//$whereclause = "[patientsuserid,=,$userid][tests,!=," . $string . " ]";
             	$whereclause="[Appointmentstatus,=,schedule][userid,=,".$userid."]";				
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $result = $object_patient_orderfrompresc->getfootablejsondata('', '', 'dateandtime_dateformate', 'DESC', 'upcomingappointment', $columns, $whereclause, '');
            //END: patient order from prescription by Pooja Gujarathi			
			//var_dump($result);
			$content->bind('obj_user', $obj_user);
			$content->bind('result', $result);			
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $username;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}

