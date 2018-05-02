<?php defined('SYSPATH') or die('No direct script access.');
class helper_Offers {
	public function registrationbyDoctor($patientUserId,$doctorUserId)
	{
		if($doctorUserId == 13391){
			$this->attachCorporate($patientUserId,17);
			$this->attachBillingPlan($patientUserId,107);
		}
		$this->attachCorporate($patientUserId,19);
	}
	public function attachCorporate($userid, $corporateid){
		$objUser = ORM::factory('user')->where('id','=',$userid)->find();
		$objCorporate = ORM::factory('corporate')->where('id','=',$corporateid)->find();
				
		$objCorporateMember = ORM::factory('corporatemember');
		$objCorporateMember->refcorporateid_c 	= $corporateid;
		$objCorporateMember->employeename_c 	= $objUser->Firstname_c.' '.$objUser->lastname_c;
		$objCorporateMember->dateofbirth_c		= $objUser->DOB_c;
		$objCorporateMember->employeemobileno_c	= $objUser->mobileno1_c;
		$objCorporateMember->emailid_c			= $objUser->email;
		$objCorporateMember->isassociated_c 	= 1;
		$objCorporateMember->iohid_c			= $objUser->id;
		$objCorporateMember->status_c			= "Associated";
		$objCorporateMember->save();
		
		$objCorporateTransactions = ORM::factory('corporatetransaction');
		$objCorporateTransactions->corporateid_c 	= $objCorporate->id;
		$objCorporateTransactions->userid_c	 		= $userid;
		$objCorporateTransactions->corporatename_c 	= $objCorporate->corporatename_c;
		$objCorporateTransactions->username_c	 	= $objUser->Firstname_c.' '.$objUser->lastname_c;
		$objCorporateTransactions->transactionsummary_c	= 'Associated With Corporate Account';
		$objCorporateTransactions->transactionamount_c 	= '0';
		$objCorporateTransactions->save();			
	}
	
	public function attachBillingPlan($userid, $planid){
		$objPlans = ORM::factory('billingindividualplan');	
		//save plan id against user if all transaction are successful
		$objPlans->refplanid_c 		= $planid;
		$objPlans->refusersid_c 	= $userid;		
		$objPlans->status_c 		= 'active';
		$objPlans->createddate_c 	= date('Y-m-d g:i:s a');
		$objPlans->updateddate_c 	= date('Y-m-d g:i:s a');
		$objPlans->subscriptiondate_c 	= date('Y-m-d g:i:s a'); 
		$objPlans->updatedby_c 		= $userid;
		$objPlans->saveRecord();
	}
}
