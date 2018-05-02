<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cadmitpatient extends Controller_Ctemplatewithmenu {
	public function action_viewsearch()
	{
		$errors = array();
		$messages = array();		
		$this->Display($errors, $messages);
	}
	private function Display($errors, $messages, $patId, $patName, $patContact, $patEmail)
	{
		try{
			$content = View::factory('vuser/vstaff/vadmitpatientform');
			$result =$this->blanklist('', '', '', '');
			$content->bind('result',$result);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$breadcrumb="Home>>";
			$previousvalues="";
			$content->bind('previousvalues',$previousvalues);
			$this->template->content = $content;
			$this->template->breadcrumb = $breadcrumb;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}

	private function blanklist($patId, $patName, $patContact, $patEmail)
	{
		if($patName == "" && $patContact == "" && $patEmail == "" && $patId == "")
		{}
		else{
				getlist($patId, $patName, $patContact, $patEmail);
			}
	}

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$patId = '';
		$patName = '';
		$patContact = '';
		$patEmail = '';
		$this->Display($errors, $messages, '', '', '', '');
	}
	
	private function searchAndDisplay($errors, $messages, $patId, $patName, $patContact, $patEmail)
	{
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}			
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();

			$content = View::factory('vuser/vstaff/vadmitpatientform');
			$result = $this->getList($patId, $patName, $patContact, $patEmail);
			
			$content->bind('result',$result);
			$content->bind('errors',$errors);
			$content->bind('messages',$messages);
			$breadcrumb="Home>>";
			$previousvalues="";
			$content->bind('previousvalues',$previousvalues);
			$this->template->content = $content;
			$this->template->breadcrumb = $breadcrumb;			
			}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search()
	{
		try{
			$errors = array();
			$messages = array();
			$patId = $_POST['patId'];
			$patName = $_POST['patName'];
			$patContact = $_POST['patContact'];
			$patEmail = $_POST['patEmail'];
			$this->searchAndDisplay($errors, $messages, $patId, $patName, $patContact, $patEmail);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	private function getList($patId, $patName, $patContact, $patEmail)
	{
		$objProcess = '';
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		$userId = $objUser->id;
		$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
		$staffId=$objStaff->id;
		$objProcess = ORM::factory('hospitalpatient')->where('staffid','=',$staffId);

		if($patId!=null){
				$objProcess =$objProcess->where('id','=',$patId);
			}
		if($patName!=null){
				$objProcess =$objProcess->where('patientname','like','%'.$patName.'%');
			}
		if($patContact!=null){
				$objProcess =$objProcess->where('mobileno1','like','%'.$patContact.'%');
			}
		if($patEmail!=null){
				$objProcess =$objProcess->where('email','like','%'.$patEmail.'%');
			}			
			$objProcess =$objProcess->find_all();
		return $objProcess;
	}
	
	public function action_viewphoto()
	{
		$patId = $_GET['patId'];
		$objUser = Auth::instance()->get_user();		
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}	
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$objProcess = ORM::factory('hospitalpatient')->where('staffid','=',$staffId);
			$photo=$objProcess->photo;
			$patName=$objProcess->patientname;
	}

	public function action_admitpatientByStaff(){	
		try{            
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
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
			            
			$content = View::factory('vuser/vstaff/vadmitpatientform')->bind('fname', $fname)->bind('lname', $lname)->bind('contactno', $contactno)->bind('errors', $errors);
			$content->bind('userid', $staffId);
			$content->bind('previousvalues',$previousvalues);
			//$content->bind('array_doctor', $array_doctor);	
			$this->template->content = $content;
		}               
		catch(Exception $e){throw new Exception($e);}
	}                   

	public function action_viewpatientaccount()
	{
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;

			$hospital_id = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospital_id->refuserid_c;
				
			$patId=$_GET['patId'];
			$header_cashier=$objStaff->header_c;
			$footer_cashier=$objStaff->footer_c;
			$user = ORM::factory('hospitalpatient')->where('id','=',$patId)->find();
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'viewbill')){
				$referer = "/ayushman/ccashierdashboard/view";
			}
			$content = View::factory('vuser/vstaff/vpatientsaccountsummary');
			$staffid = $user->staffid;
			$patName = $user->patientname;
			$patContact = $user->mobileno1;
			$patEmail = $user->email;
			$caseno = $user->caseno;
			$age = $user->age;
			$status = $user->status;
			$gender=$user->gender;
			if($status=="discharged"){
				$caseno='';
			}
			$result=$this->getaccount($caseno,$patId,$hospid,$staffid);
			$content->bind('referer',$referer);
			$content->bind('id',$patId);
			$content->bind('patientname',$patName);
			$content->bind('mobileno1',$patContact);
			$content->bind('email',$patEmail);
			$content->bind('caseno',$caseno);
			$content->bind('status',$status);
			$content->bind('age',$age);
			$content->bind('gender',$gender);
			$content->bind('staffid',$staffid);
		    $content->bind('result',$result);
			$content->bind('header_cashier',$header_cashier);
			$content->bind('footer_cashier',$footer_cashier);
			$content->bind('hospitalid',$hospid);
			$content->bind('array_caseno',$array_caseno);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}		
	}

	function getaccount($caseno, $id, $hospuserid, $staffid)
	{		
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
		$page = "1"; 
        $limit = "15"; 
		$sidx = ""; 
		$sord = ''; 	
		$columns='accountuserid,billcaseno,rcptcaseno,transdate,transtype,billno,credit,rcptno,debit,rcptpdffilename,statementcode,accountuseridto,billpdffilename,bedid';
		$whereclause="[accountuserid,=,$id][cashflag,=,1]";
		$groupby="";
		$class="hospbillrcpt";
		$data='[caseno:'.$caseno.'][patientuserid:'.$id.'][hospitaluserid:'.$hospuserid.'][staffid:'.$staffid.']';
		$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$data);
			$result = $class->exportdata();
			return $result;
			//var_dump($result);die;
	}

	public function action_viewopdbill()
	{
		try{				
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			//$patId=$_GET['patId'];
			//var_dump($patId);
			$user = ORM::factory('hospitalpatient')->find();
			$content = View::factory('vuser/vstaff/vopdbill');
			$patId = $user->id;
			$patName = $user->patientname;
			$patContact = $user->mobileno1;
			$patEmail = $user->email;
			$age = $user->age;
			$gender = $user->gender;
			$content->bind('id',$patId);
			$content->bind('patientname',$patName);
			$content->bind('mobileno1',$patContact);
			$content->bind('email',$patEmail);
			$content->bind('gender',$gender);
			$content->bind('age',$age);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}