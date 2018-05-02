<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientfamilyhistory extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser)
			    Request::current()->redirect('cuser/login');
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'patient')))){
		     	     $content = $this->getContent($objUser, $objUser);
		}
			else if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
		     	     $patientId = $_GET['patientUserId'];
		     	     $objUserPatient = ORM::factory('user')->where('id','=',$patientId)->find();
		     	     $content = $this->getContent($objUser, $objUserPatient);
			}
			$this->template->content = $content;
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	private function getContent($objUser, $objUserPatient){
		$content = View::factory('vuser/vpatient/vpatientfamilyhistory');
	
		$objpatient = new Model_Patient;
		$objpatient=$objpatient->where('repatientsuserid_c','=',$objUserPatient->id)->mustfind();
		$objPatientRelativeHistory = new Model_Patientrelativehistory;
		$objPatientRelativeHistory = $objPatientRelativeHistory->where('refpatrelhistpatientsid_c','=',$objpatient->id)->find();
		if(!$objPatientRelativeHistory->id)
		{
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			$objPatientRelativeHistory->refpatrelhistpatientsid_c =$objpatient->id;
			$objPatientRelativeHistory->relationship_c ="Father";
			$objPatientRelativeHistory->save();
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			$objPatientRelativeHistory->refpatrelhistpatientsid_c =$objpatient->id;
			$objPatientRelativeHistory->relationship_c ="Mother";
			$objPatientRelativeHistory->save();
		}
		$objPatientRelativeHistory = new Model_Patientrelativehistory;
		$objPatientRelativeHistory = $objPatientRelativeHistory->where('refpatrelhistpatientsid_c','=',$objpatient->id)->find_all();
		$array_relativeFather=array();
		$array_relativeMother=array();
		$array_relative=array();
		foreach($objPatientRelativeHistory as $res)
		{
			switch ($res->relationship_c) {
   						 case 'Father': $array_relativeFather['id']=$res->id;
   						 				$array_relativeFather['relation']="Father";
   						 				$array_relativeFather['birthyear']=$res->birthyear_c;
   						 				$array_relativeFather['medicalhistory']=$res->medicalhistory_c;
   						 				$array_relativeFather['deathcause']=$res->deathcause_c;
   						 				$array_relativeFather['deathage']=$res->deathage_c;
        								break;
    					 case 'Mother': $array_relativeMother['id']=$res->id;
   						 				$array_relativeMother['relation']="Mother";
   						 				$array_relativeMother['birthyear']=$res->birthyear_c;
   						 				$array_relativeMother['medicalhistory']=$res->medicalhistory_c;
   						 				$array_relativeMother['deathcause']=$res->deathcause_c;
   						 				$array_relativeMother['deathage']=$res->deathage_c;
    					 				break;
						default:$length=count($array_relative);
								$array_relative[$length]['id']=$res->id;
								$array_relative[$length]['relation']=$res->relationship_c;
								$array_relative[$length]['birthyear']=$res->birthyear_c;
								$array_relative[$length]['medicalhistory']=$res->medicalhistory_c;
								$array_relative[$length]['deathcause']=$res->deathcause_c;
								$array_relative[$length]['deathage']=$res->deathage_c;
								break;	
					}
		}
		$obj_relationmasters = ORM::factory('relationmaster')->find_all();
		$array_relationmaster		= array();
		
		foreach($obj_relationmasters as $result){
			if((! empty($result->relationname_c))and ($result->relationname_c!="Father") and($result->relationname_c!="Mother"))
				{	
						array_push($array_relationmaster, $result->relationname_c);
				}
		}
		
		sort($array_relationmaster);
		$patientid = $objpatient->id;
		$content->bind('patientid', $patientid);	
		$content->bind('objpatient', $objpatient);
		$content->bind('array_relativeFather', $array_relativeFather);
		$content->bind('array_relationmaster', $array_relationmaster);
		$content->bind('array_relativeMother', $array_relativeMother);
		$content->bind('array_relative', $array_relative);
		return $content;
	}	
	public function action_savedetails()
	{
		try{
			$array_fatherdetails = json_decode($_GET['array_fatherdetails']);
			$array_motherdetails = json_decode($_GET['array_motherdetails']);
			$this->savedetailsforrealtives($array_fatherdetails);
			$this->savedetailsforrealtives($array_motherdetails);
			$array_relativesdetails = json_decode($_GET['array_relativesdetails']);
			for($count=0;$count< count($array_relativesdetails);$count++)
			{
				$this->savedetailsforrealtives($array_relativesdetails[$count]);
			}
			die();
		}catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_deletedetails()
	{
		try{
			$PatientRelativeHistoryid=$_GET['id'];
			if($PatientRelativeHistoryid != "")
			{
				$objPatientRelativeHistory = new Model_Patientrelativehistory;
				$objPatientRelativeHistory = $objPatientRelativeHistory->where('id','=',$PatientRelativeHistoryid)->Find();
				if($objPatientRelativeHistory->id != "")
					$objPatientRelativeHistory->delete();
			}
			die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_addnewrelative()
	{
		try{
		$relative=$_GET['relative'];
		$birthyear=$_GET['birthyear'];
		$medicalhistory=$_GET['medicalhistory'];
		$deathage=$_GET['deathage'];
		$deathcause=$_GET['deathcause'];
		$objUser = Auth::instance()->get_user();
		$objpatient = new Model_Patient;
		if (!$objUser)
		    Request::current()->redirect('cuser/login');
		else if ($objUser->has('roles', ORM::factory('role', array('name' => 'patient')))){
		     $objpatient=$objpatient->where('repatientsuserid_c','=',$objUser->id)->mustFind();
		}
		else if ($objUser->has('roles', ORM::factory('role', array('name' => 'doctor')))){
		     $objpatient=$objpatient->where('id','=',$_GET['patientId'])->mustFind();
		}
		$objPatientRelativeHistory = new Model_Patientrelativehistory;
		$objPatientRelativeHistory->medicalhistory_c =$medicalhistory;
		$objPatientRelativeHistory->refpatrelhistpatientsid_c =$objpatient->id;
		$objPatientRelativeHistory->relationship_c=$relative;
		$objPatientRelativeHistory->deathcause_c =$deathcause;
		$objPatientRelativeHistory->deathage_c =$deathage;
		$objPatientRelativeHistory->birthyear_c=$birthyear;
		$objPatientRelativeHistory->save();
		die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	private function savedetailsforrealtives($relativearray)
	{
		try{
			$PatientRelativeHistoryid=$relativearray[0];
			$birthyear=$relativearray[1];
			$medicalhistory=$relativearray[2];
			$deathage=$relativearray[3];
			$deathcause=$relativearray[4];
			$objPatientRelativeHistory = new Model_Patientrelativehistory;
			if(!($PatientRelativeHistoryid==""))
			{
				$objPatientRelativeHistory = $objPatientRelativeHistory->where('id','=',$PatientRelativeHistoryid)->find();
				$objPatientRelativeHistory->medicalhistory_c =$medicalhistory;
				$objPatientRelativeHistory->deathcause_c =$deathcause;
				$objPatientRelativeHistory->deathage_c =$deathage;
				$objPatientRelativeHistory->birthyear_c=$birthyear;
				$objPatientRelativeHistory->save();
			}
			else{
				
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

} // End Welcome
