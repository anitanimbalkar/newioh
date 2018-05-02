<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpastreportbysystem extends Controller_Ctemplatewithmenu {
	public function action_showreport()
	{
		$obj_user = Auth::instance()->get_user();
		$appid=$_GET['appid'];
		if (!$obj_user)
			Request::current()->redirect('cuser/login');
		else
		{	
			if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
				$patientuserid = $obj_user->id;
		}
		$objcompletedtest=ORM::factory('completedtest')
			->where('appid','=',$appid)
			->find();
		$objpatientappointment=ORM::factory('patientappointments')
			->where('id','=',$appid)
			->find();
		$backlink="/ayushman/cpatienthistorydisplay/disaplayvisits?patientid=".$objpatientappointment->userid."&showall=true";		
		$content = View::factory('vuser/vpatient/vreportview');
		$breadcrumb = "Home>>";
		$userid = $patientuserid;
		$drname=$objpatientappointment->docnm;
		$incidentname=$objpatientappointment->incidentsname_c;
		$dateandtime =$objpatientappointment->dateandtime_dateformate;
		$dateandtime = date('d M Y',strtotime($dateandtime));
		$username = $obj_user->Firstname_c;
		//$patientid=$objpatient->id;
		$content->bind('userid', $userid);
		$content->bind('username', $username);
		$content->bind('objpatient', $objpatient);
		$content->bind('drname', $drname);
		$content->bind('dateandtime', $dateandtime);
		$content->bind('appid', $appid);
		//$content->bind('link', $link);
		$content->bind('backlink', $backlink);
		$content->bind('incidentname', $incidentname);
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$this->template->urole = $urole;
	}

	public function action_getreportdetails(){
	  $app_id = $_GET['appid'];
	  $objcompletedtest=ORM::factory('completedtest')->where('appid','=',$app_id)->find();
	  $testnames = $objcompletedtest->tests;
	  $order_no  = $objcompletedtest->requisitionno;
	  $detailedObj = ORM::factory('detailedtests')->where('orderid', '=', $order_no)->find();
	  $reports = $detailedObj->reports;
	  $reports = explode('----', $reports); 
	  $result = array();
	  foreach($reports as $report){
	    if($report != ""){
	      $report = explode('@@@', $report);
	      $testname = $report[0];
	      if(!(isset($result[$testname])))
	        $result[$testname] = array();
	      $thumbObj = new helper_thumbnail();
	      $thumb_file_name = $thumbObj->getThumbFromImg($report[1]);
	      $temp = array();
	      $temp['file'] = $report[1];
	      $temp['thumb'] = $thumb_file_name;
	      array_push($result[$testname], $temp);	
	    }
	  }
	  $response[$app_id] = $result;
	  echo json_encode($response);	  die;
	}

	public function action_getreportdetailsbyreport(){
	  $order_no = $_GET['orderid'];
	  $detailedObj = ORM::factory('detailedtests')->where('orderid', '=', $order_no)->find();
	  $reports = $detailedObj->reports;
	  $reports = explode('----', $reports); 
	  $result = array();
	  foreach($reports as $report){
	    if($report != ""){
	      $report = explode('@@@', $report);
	      $testname = $report[0];
	      if(!(isset($result[$testname])))
	        $result[$testname] = array();
	      $thumbObj = new helper_thumbnail();
	      $thumb_file_name = $thumbObj->getThumbFromImg($report[1]);
	      $temp = array();
	      $temp['file'] = $report[1];
	      $temp['thumb'] = $thumb_file_name;
	      array_push($result[$testname], $temp);	
	    }
	  }
	  $response['details'] = $result;
	  echo json_encode($response);	  die;
	}
}