<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Ccashier extends Controller {

	public function action_saveorder()
	{
			$wardid = $_GET["wardid"];
			$patid = $_GET["patid"];
			$refid = $_GET["refid"];
			$acceptdate = $_GET["acceptdate"];
			$arrservices = json_decode($_GET['testarray']);
			$i=0;
				foreach($arrservices as $key)
				{
					
						$objOrder = ORM::factory('ipdwardcharge')->where('refwardsid_c	','=',$wardid);
						
						$objOrder->refwardsid_c=$wardid;
						$objOrder->caseregno_c=$refid;
						$objOrder->reftestid_c=$arrservices->tests[$i]->id;
						$ind=$arrservices->tests[$i]->id;
						$objOrder->quantity_c=$arrservices->quantity[$i]->valueqty;
						$objOrder->rate_c=$arrservices->tests[$i]->rate;
						$totalamt=$objOrder->quantity_c*$objOrder->rate_c;
						$objOrder->amount_c=$totalamt;
						$objOrder->chrgdate_c=$acceptdate;
						$objOrder->refpatientuserid_c=$patid;
						$i++;
						$objOrder->save(); 
					
				}

	}



	public function action_creditOPDAccount(){
		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			//var_dump($hospitalid);die;
			// $hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			// $hospid=$hospobj->refuserid_c;
			$hospid = $_GET["accountuserid"];
			$patientuserid = $_GET["id"];
			$caseno	= $_GET["caseno"];
			if ($caseno=="null") {
				$caseno=null;
			
			}
			//var_dump($caseno);die;
			$creditamount = $_GET["creditamount"];
			$creditdate	= $_GET["creditdate"];
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];
			$rcptId= $_GET["rcptId"];

				
	rcpttransaction::saveRcpt($patientuserid, $hospid, $creditamount, $caseno, $creditdesc, $cheqno, $cheqdate, $trxrefno, $rcptId);
		}
				catch(Exception $e){throw new Exception($e);}

		}

public function action_casevalidation(){

			$caseno=$_GET['caseno'];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$IPDobj=ORM::factory('ipdpatient')->where('hospitalid_c','=',$hospitalid)
											  ->where('refid_c','=',$caseno)
											  ->find();

		if($IPDobj->id !=null)
		{
			echo "Duplicate";
		}

		else{
			echo "ok";
		}
		
	}

	 public function action_admitPatient(){

		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospobj->refuserid_c;
			//var_dump($hospitalid);die;
			// Populate tables to record Admission records 
			$patientuserid = $_GET["IOHid"];
			$depositamount = $_GET["depositamount"];
			$caseno	= $_GET["adcaseno"];
			$admitdate = $_GET["admitdate"];
			$IPDobj=ORM::factory('ipdpatient');
			$IPDobj->refpatientuserid_c=$patientuserid;
			$IPDobj->admitdate_c=$admitdate;
			$IPDobj->hospitalid_c=$hospitalid;
			$IPDobj->refid_c=$caseno;
			$IPDobj->status_c="admitted";
			$IPDobj->save();
			rcpttransaction::createCASHaccount($patientuserid, $hospid, $caseno);
			rcpttransaction::saveRcpt($patientuserid, $hospid, $depositamount, $caseno);
			
		}
		catch(Exception $e){throw new Exception($e);}
	}


	public function action_creditPatientAccount(){
		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			//var_dump($hospitalid);die;
			$hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospobj->refuserid_c;

			$patientuserid = $_GET["id"];
			$caseno	= $_GET["caseno"];
			$creditamount = $_GET["creditamount"];
			$creditdate	= $_GET["creditdate"];
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];

			//if (isset($_GET['creditdesc']))
			// {
			// 	$creditdesc=$_GET['creditdesc'];
			// }

			//var_dump($payment);die;
			
	rcpttransaction::saveRcpt($patientuserid, $hospid, $creditamount, $caseno, $creditdesc, $cheqno, $cheqdate, $trxrefno);
		
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_dischargePatient(){

		try{
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;

			$hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospobj->refuserid_c;
			
			$patientuserid = $_GET["IOHid"];
			$caseno	= $_GET["caseno"];
			$dischargedate =$_GET["dischargedate"];
			
			$IPDobj=ORM::factory('ipdpatient')
					->where('refid_c','=',$caseno)
					->where('refpatientuserid_c','=',$patientuserid)
					->find();
			if ($IPDobj->id!=null)
			{
				$IPDobj->status_c = "discharged";
				$IPDobj->dischargedate_c = $dischargedate;
				$IPDobj->save();
			}

	$closeAcc = ORM::factory('cashaccount')->where('accountuserid_c','=',$patientuserid)
										  ->where('accountuseridto_c','=',$hospid)
										  ->where('caseregno_c','=',$caseno)
										  ->find();
			 if ($closeAcc->id!=null)
			{
				$closeAcc->active_c = 0;
				$closeAcc->save();
			}
$closeHospAcc = ORM::factory('cashaccount')->where('accountuserid_c','=',$hospid)
										  ->where('accountuseridto_c','=',$patientuserid)
										  ->where('caseregno_c','=',$caseno)
										  ->find();
			 if ($closeHospAcc->id!=null)
			{
				$closeHospAcc->active_c = 0;
				$closeHospAcc->save();
			}



		}
		catch(Exception $e){throw new Exception($e);}
	}
	

	

}
