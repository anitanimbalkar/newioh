<?php defined('SYSPATH') or die('No direct script access.');
class Controller_transferdata extends Controller{
	//action to add beneficiary.
	public function action_transfer()
	{
		try{
			$coepusers = ORM::factory('coepuser')->find_all();
			foreach($coepusers as $coepuser){
				$corporatemember = ORM::factory('corporatemember');
				$corporatemember->refcorporateid_c = 6;
				$corporatemember->emailid_c = $coepuser->email;
				$corporatemember->status_c = 'Associated';
				$corporatemember->employeename_c = $coepuser->firstname;
				$corporatemember->employeeid_c = $coepuser->username;
				$corporatemember->dateofbirth_c = $coepuser->DOB;
				$corporatemember->employeemobileno_c = $coepuser->MobileNumber;
				$corporatemember->isassociated_c = '1';
				$corporatemember->iohid_c = $coepuser->iohid;
				$corporatemember->save();
				
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_assigndoctors()
	{
		try{
			$coepusers = ORM::factory('coepuser')->where('year','=','Employee')->find_all();
			foreach($coepusers as $coepuser){
				$patient = ORM::factory('patient')->where('repatientsuserid_c','=',$coepuser->iohid)->find();
				$favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
				$favoritedocterbypatients->reffavdocbypatpatientsid_c = $patient->id;
				$favoritedocterbypatients->reffavdocbypatdoctorsid_c = 101;
				$favoritedocterbypatients->save();
				
				$favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
				$favoritedocterbypatients->reffavdocbypatpatientsid_c = $patient->id;
				$favoritedocterbypatients->reffavdocbypatdoctorsid_c = 83;
				$favoritedocterbypatients->save();
				
				$favoritedocterbypatients = ORM::factory('favoritedocterbypatient');
				$favoritedocterbypatients->reffavdocbypatpatientsid_c = $patient->id;
				$favoritedocterbypatients->reffavdocbypatdoctorsid_c = 171;
				$favoritedocterbypatients->save();
				
				echo 'added doctors in '.$coepuser->iohid;
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}