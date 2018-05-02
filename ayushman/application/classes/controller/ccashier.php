<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Ccashier extends Controller {
	

	public function action_clearstatus(){
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}
			$bednumber =$_GET["bednumber"];
			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();

			$wardobj->bedstatus_c ="vacant";
			$wardobj->save();
	}

	public function action_transferpatient(){
			$bednumber =$_GET["bednumber"];
			$oldbedno =$_GET["oldbedno"];
			
				//pull old bed patient's data
			$wardbedobj = ORM::factory('wardbedroomdetail')->where('bednumber','=',$oldbedno)->find();
			$patientname=$wardbedobj->patientname;
			$patientid=$wardbedobj->patuserid;
			$caseno=$wardbedobj->caseno;
			$warduserid=$wardbedobj->warduserid;
				//get old ward id
			$pathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduserid)->find();
			$wardid=$pathobj->id;
				// get patient id
			$patobj = ORM::factory('patient')->where('repatientsuserid_c','=',$patientid)->find();
			$patid=$patobj->id;
			
				//delete old bed's detail & set status vacant
			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$oldbedno)->find();
			$bedidold=$wardobj->id;
			$wardobj->bedstatus_c ="vacant";
			$wardobj->save();
				// delete old ward
			$preference1=0;
			$patientoldRec = ORM::factory('favoritepathologistbypatient')->where('reffavpathopathologistsid_c','=',$wardid)
																		->where('reffavpathopatientsid_c','=',$patid)
																		->find();
							$patientoldRec->delete();

				//	get new warduser id
			$wardnewobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();
			$bedidnew=$wardnewobj->id;
			$warduseridnew=$wardnewobj->refwarduserid_c;
			$wardnewobj->bedstatus_c="Allotted";
				// Update patient detail
			$IPDobj=ORM::factory('ipdpatient')->where('refid_c','=',$caseno)->find();
			$admitdate=$IPDobj->admitdate_c;
			$IPDobj->refbedid_c=$bedidnew;
			//$IPDobj->status_c="admitted";


				// get new wardid
			$newpathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduseridnew)->find();
			$newwardid=$newpathobj->id;
			// Create Bed History
			$bedhistoryobj=ORM::factory('bedhistorydetail');
			$bedhistoryobj->refpatientuserid_c=$patientid;
			//$bedhistoryobj->refdoctoruserid_c=;
			$bedhistoryobj->caseno_c=$caseno;
			$bedhistoryobj->refbedid_c=$bedidold;
			$bedhistoryobj->startdate_c=$admitdate;
			$bedhistoryobj->enddate_c=date('d M Y');
					$bedhistoryobj->save();


				// Attach new ward
			$preference=0;
			$patientRec = ORM::factory('favoritepathologistbypatient');
			$patientRec->reffavpathopatientsid_c = $patid;
			$patientRec->reffavpathopathologistsid_c = $newwardid;
			$patientRec->prefered_c = $preference;
			$preference = 0;
			$patientRec->save();
			
			$IPDobj->save();
			$wardnewobj->save();


			

	}

	public function action_reservebed(){
			$patname =$_GET["patname"];
			$bednumber =$_GET["bednumber"];
			$patId =$_GET["patId"];
			//var_dump($bednumber);
			$IPDobj=ORM::factory('ipdpatient');

			$IPDobj->refpatientuserid_c=$patId;
			$IPDobj->refbedid_c=$bednumber;
			$IPDobj->status_c="Reserved";
			
			$IPDobj->save();

			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();

			$wardobj->bedstatus_c ="Reserved";
							$wardobj->save();

	}

	public function action_maintenance(){
		//$status =$_GET["status"];
			$bednumber =$_GET["bednumber"];
			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();

			$wardobj->bedstatus_c ="Maintenance";
							$wardobj->save();

	}

	public function action_dischargePatientnew(){

		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;

			$hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospobj->refuserid_c;
			
			$patientuserid = $_GET["IOHid"];
			$caseno	= $_GET["caseno"];
			$dischargedate =$_GET["dischargedate"];
			$bednumber =$_GET["bednumber"];
			
			$IPDobj=ORM::factory('ipdpatient')
					->where('refid_c','=',$caseno)
					->where('refpatientuserid_c','=',$patientuserid)
					->find();
			if ($IPDobj->id!=null)
			{
				$admitdate=$IPDobj->admitdate_c;
				$IPDobj->status_c = "discharged";
				$IPDobj->dischargedate_c = $dischargedate;
				$IPDobj->refbedid_c = null;
				
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

			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();
			$warduseridnew=$wardobj->refwarduserid_c ;
			$bedid=$wardobj->id ;
			$wardobj->bedstatus_c ="Maintenance";
			
			$newpathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduseridnew)->find();
			$newwardid=$newpathobj->id;
			//var_dump($newwardid);
				//patient id
			$patobj = ORM::factory('patient')->where('repatientsuserid_c','=',$patientuserid)->find();
			$patid=$patobj->id;
			//var_dump($patid);
				// Put Data in bedhistorydetails
			$bedhistoryobj=ORM::factory('bedhistorydetail');
			$bedhistoryobj->refpatientuserid_c=$patientuserid;
			//$bedhistoryobj->refdoctoruserid_c=;
			$bedhistoryobj->caseno_c=$caseno;
			$bedhistoryobj->refbedid_c=$bedid;
			$bedhistoryobj->startdate_c=$admitdate;
			$bedhistoryobj->enddate_c=$dischargedate;
					$bedhistoryobj->save();

				//delete old ward
			$patientoldRec = ORM::factory('favoritepathologistbypatient')->where('reffavpathopathologistsid_c','=',$newwardid)
																		->where('reffavpathopatientsid_c','=',$patid)
																		->find();

							$patientoldRec->delete();

			
			$wardobj->save();
			$IPDobj->save();
		}
		catch(Exception $e){throw new Exception($e);}
	}
	

	 public function action_admitPatientnew(){

		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$hospobj = ORM::factory('hospital')->where('id','=',$hospitalid)->find();
			$hospid=$hospobj->refuserid_c;
			// Populate tables to record Admission records 
			$patientuserid = $_GET["IOHid"];
			$depositamount = $_GET["depositamount"];
			$caseno	= $_GET["adcaseno"];
			$admitdate = $_GET["admitdate"];
			$bednumber = $_GET["bednumber"];
			$admitstatus = $_GET["admitstatus"];

			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();
			$bedid=$wardobj->id;
			$warduserid=$wardobj->refwarduserid_c;
			$wardobj->bedstatus_c ="Allotted";
			
			$pathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduserid)->find();
			$wardid=$pathobj->id;

				// get patient id
			$patobj = ORM::factory('patient')->where('repatientsuserid_c','=',$patientuserid)->find();
			$patid=$patobj->id;
			

			//put data into ipdpatient
			if($admitstatus=="Reserved")
			{
				//var_dump("Reserved");
				$IPDobj=ORM::factory('ipdpatient')->where('status_c','=',"Reserved")
												  ->where('refpatientuserid_c','=',$patientuserid)
												  ->find();

			$IPDobj->refpatientuserid_c=$patientuserid;
			$IPDobj->admitdate_c=$admitdate;
			$IPDobj->hospitalid_c=$hospitalid;
			$IPDobj->refid_c=$caseno;
			$IPDobj->refbedid_c=$bedid;
			$IPDobj->status_c="admitted";
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];
			$IPDobj->save();
			}

			if($admitstatus=="vacant")
			{	//var_dump("vacant");
				$IPDobj=ORM::factory('ipdpatient');

			$IPDobj->refpatientuserid_c=$patientuserid;
			$IPDobj->admitdate_c=$admitdate;
			$IPDobj->hospitalid_c=$hospitalid;
			$IPDobj->refid_c=$caseno;
			$IPDobj->refbedid_c=$bedid;
			$IPDobj->status_c="admitted";
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];

			$IPDobj->save();
			}

							$wardobj->save();
		//put data into favoritepathologistbypatient

			$preference=0;
			$patientRec = ORM::factory('favoritepathologistbypatient');
						$patientRec->reffavpathopatientsid_c = $patid;
						$patientRec->reffavpathopathologistsid_c = $wardid;
						$patientRec->prefered_c = $preference;
						$preference = 0;
						$patientRec->save();

							
			rcpttransaction::createCASHaccount($patientuserid, $hospid, $caseno);
			rcpttransaction::saveRcpt($patientuserid, $hospid, $depositamount, $caseno, $creditdesc, $cheqno, $cheqdate, $trxrefno);

			//rcpttransaction::saveRcpt($patientuserid, $hospid, $depositamount, $caseno);
			
		}
		catch(Exception $e){throw new Exception($e);}
	}



	public function action_saveorder()
	{
		$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$wardid = $_GET["wardid"];
			$patid = $_GET["patid"];
			$refid = $_GET["refid"];
			$acceptdate = $_GET["acceptdate"];
			$arrservices = (Array)(json_decode($_GET['testarray']));
			$testarray=$arrservices['tests'];
			
				foreach($testarray as $testrecord)
				{
						$objOrder = ORM::factory('ipdwardcharge');
						$objOrder->refwardsid_c=$wardid;
						$objOrder->caseregno_c=$refid;
						$objOrder->reftestid_c=$testrecord->id;
						$objOrder->quantity_c=$testrecord->quantity;
						$objOrder->rate_c=$testrecord->rate;
						$totalamt=$objOrder->quantity_c*$objOrder->rate_c;
						$objOrder->amount_c=$totalamt;
						$objOrder->chrgdate_c=$acceptdate;
						$objOrder->refpatientuserid_c=$patid;
					
						$objOrder->save(); 
				}

	}



	public function action_creditOPDAccount(){
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
			$userId = $objUser->id;
			$objStaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userId)->find();
			$staffId=$objStaff->id;
			$hospitalid=$objStaff->refhospitalid_c;
			$hospid = $_GET["accountuserid"];
			$patientuserid = $_GET["id"];
			$caseno	= $_GET["caseno"];
			if ($caseno=="null")
			 {
				$caseno=null;
			
			}
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
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}			
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
			// Check if caseno is containing
			// " ' ", '"',"~","`"," "
			
			if(preg_match('/ +/',$caseno)||
				preg_match('/\,+/',$caseno)||
				preg_match('/`+/',$caseno)||
				preg_match('/~+/',$caseno)||
				preg_match('/\'+/',$caseno)||
				preg_match('/"+/',$caseno)
				)
			{
				echo "Invalid caseno. Spaces/quotation marks not allowed ";
			}
			else
				echo "ok";
		}		
	}

	 public function action_admitPatient(){

		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}$userId = $objUser->id;
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
			$creditdesc = $_GET["creditdesc"];
			$cheqno = $_GET["cheqno"];
			$cheqdate= $_GET["cheqdate"];
			$trxrefno= $_GET["trxrefno"];

			$IPDobj->save();
			rcpttransaction::createCASHaccount($patientuserid, $hospid, $caseno);
			rcpttransaction::saveRcpt($patientuserid, $hospid, $depositamount, $caseno, $creditdesc, $cheqno, $cheqdate, $trxrefno);

			//rcpttransaction::saveRcpt($patientuserid, $hospid, $depositamount, $caseno);
		}
		catch(Exception $e){throw new Exception($e);}
	}


	public function action_creditPatientAccount(){
		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
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

					
	rcpttransaction::saveRcpt($patientuserid, $hospid, $creditamount, $caseno, $creditdesc, $cheqno, $cheqdate, $trxrefno);
		
		}
		catch(Exception $e){throw new Exception($e);}
	}
	
	public function action_dischargePatient(){

		try{
			$objUser = Auth::instance()->get_user();
			if (!$objUser){
				Request::current()->redirect('cuser/login');
			}
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
