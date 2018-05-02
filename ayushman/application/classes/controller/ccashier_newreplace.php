<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Ccashier extends Controller {

	public function action_clearstatus(){
		//$status =$_GET["status"];
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
			$wardobj->bedstatus_c ="vacant";
			$wardobj->save();
				// delete old ward
			var_dump($wardid);
			var_dump($patid);
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
				// get new wardid
			$newpathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduseridnew)->find();
			$newwardid=$newpathobj->id;
				// Attach new ward
			$preference=0;
			$patientRec = ORM::factory('favoritepathologistbypatient');
			$patientRec->reffavpathopatientsid_c = $patid;
			$patientRec->reffavpathopathologistsid_c = $newwardid;
			$patientRec->prefered_c = $preference;
			$preference = 0;
			$patientRec->save();
				// Update patient detail
			$IPDobj=ORM::factory('ipdpatient')->where('refid_c','=',$caseno)->find();
			$IPDobj->refbedid_c=$bedidnew;
			//$IPDobj->status_c="admitted";

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
				$IPDobj->status_c = "discharged";
				$IPDobj->dischargedate_c = $dischargedate;
				$IPDobj->refbedid_c = null;
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

			$wardobj = ORM::factory('wardbeddetail')->where('bednumber_c','=',$bednumber)->find();
			$warduseridnew=$wardobj->refwarduserid_c ;
			$wardobj->bedstatus_c ="Maintenance";
							$wardobj->save();
			
			$newpathobj = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$warduseridnew)->find();
			$newwardid=$newpathobj->id;
		
				//delete old ward
			$patientoldRec = ORM::factory('favoritepathologistbypatient')->where('reffavpathopathologistsid_c','=',$newwardid);
							$patientoldRec->delete();



		}
		catch(Exception $e){throw new Exception($e);}
	}
	

	 public function action_admitPatientnew(){

		try{
			$objUser = Auth::instance()->get_user();
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



	public function action_saveservices()
	{
		//var_dump("hello");
		try
		{
			if($_GET){
			if (isset($_GET['label1']))
			{
				$label1 = $_GET['label1'];
			}
			if (isset($_GET['label2']))
			{
				$label2 = $_GET['label2'];
			}
			if (isset($_GET['charge1']))
			{
				$charge1= $_GET['charge1'];
			}
			if (isset($_GET['charge2']))
			{
				$charge2=$_GET['charge2'];
			}
			if (isset($_GET['label3']))
			{
				$label3 = $_GET['label3'];
			}
			if (isset($_GET['label4']))
			{
				$label4= $_GET['label4'];
			}
			if (isset($_GET['label5']))
			{
				$label5=$_GET['label5'];
			}
			if (isset($_GET['label6']))
			{
				$label6=$_GET['label6'];
			}
			if (isset($_GET['label7']))
			{
				$label7=$_GET['label7'];
			}
			if (isset($_GET['label8']))
			{
				$label8=$_GET['label8'];
			}
			if (isset($_GET['label9']))
			{
				$label9=$_GET['label9'];
			}
			if (isset($_GET['label10']))
			{
				$label10=$_GET['label10'];
			}

			if (isset($_GET['label11']))
			{
				$label11 = $_GET['label11'];
			}
			if (isset($_GET['label12']))
			{
				$label12 = $_GET['label12'];
			}
			if (isset($_GET['label13']))
			{
				$label13 = $_GET['label13'];
			}
			if (isset($_GET['label14']))
			{
				$label14= $_GET['label14'];
			}
			if (isset($_GET['label15']))
			{
				$label15=$_GET['label15'];
			}
			if (isset($_GET['label16']))
			{
				$label16=$_GET['label16'];
			}
			if (isset($_GET['label17']))
			{
				$label17=$_GET['label17'];
			}
			if (isset($_GET['label18']))
			{
				$label18=$_GET['label18'];
			}
			if (isset($_GET['label19']))
			{
				$label19=$_GET['label19'];
			}
			if (isset($_GET['label20']))
			{
				$label20=$_GET['label20'];
			}
			if (isset($_GET['label21']))
			{
				$label21=$_GET['label21'];
			}
			if (isset($_GET['label22']))
			{
				$label22=$_GET['label22'];
			}
			if (isset($_GET['label23']))
			{
				$label23=$_GET['label23'];
			}
			if (isset($_GET['label24']))
			{
				$label24=$_GET['label24'];
			}
			if (isset($_GET['label25']))
			{
				$label25=$_GET['label25'];
			}

			
			if (isset($_GET['charge3']))
			{
				$charge3 = $_GET['charge3'];
			}
			if (isset($_GET['charge4']))
			{
				$charge4= $_GET['charge4'];
			}
			if (isset($_GET['charge5']))
			{
				$charge5=$_GET['charge5'];
			}
			if (isset($_GET['charge6']))
			{
				$charge6=$_GET['charge6'];
			}
			if (isset($_GET['charge7']))
			{
				$charge7=$_GET['charge7'];
			}
			if (isset($_GET['charge8']))
			{
				$charge8=$_GET['charge8'];
			}
			if (isset($_GET['charge9']))
			{
				$charge9=$_GET['charge9'];
			}
			if (isset($_GET['charge10']))
			{
				$charge10=$_GET['charge10'];
			}

			if (isset($_GET['charge11']))
			{
				$charge11 = $_GET['charge11'];
			}
			if (isset($_GET['charge12']))
			{
				$charge12 = $_GET['charge12'];
			}
			if (isset($_GET['charge13']))
			{
				$charge13 = $_GET['charge13'];
			}
			if (isset($_GET['charge14']))
			{
				$charge14= $_GET['charge14'];
			}
			if (isset($_GET['charge15']))
			{
				$charge15=$_GET['charge15'];
			}
			if (isset($_GET['charge16']))
			{
				$charge16=$_GET['charge16'];
			}
			if (isset($_GET['charge17']))
			{
				$charge17=$_GET['charge17'];
			}
			if (isset($_GET['charge18']))
			{
				$charge18=$_GET['charge18'];
			}
			if (isset($_GET['charge19']))
			{
				$charge19=$_GET['charge19'];
			}
			if (isset($_GET['charge20']))
			{
				$charge20=$_GET['charge20'];
			}
			if (isset($_GET['charge21']))
			{
				$charge21=$_GET['charge21'];
			}
			if (isset($_GET['charge22']))
			{
				$charge22=$_GET['charge22'];
			}
			if (isset($_GET['charge23']))
			{
				$charge23=$_GET['charge23'];
			}
			if (isset($_GET['charge24']))
			{
				$charge24=$_GET['charge24'];
			}
			if (isset($_GET['charge25']))
			{
				$charge25=$_GET['charge25'];
			}
		}
			$user = Auth::instance()->get_user();
			$userid=$user->id;
			$docobj=ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$docid=$docobj->id;
			$objservices=ORM::factory('doctorservice')->where('refdoctorid','=',$docid)->find();
				
			//var_dump($objservices);die;
			$objservices->refdoctorid=$docid;
			$objservices->label1_c=$label1;
			$objservices->label2_c=$label2;
			$objservices->charge1_c=$charge1;
			 $objservices->charge2_c=$charge2;
			$objservices->label3_c= $label3;
			$objservices->label4_c= $label4;
			$objservices->label5_c= $label5;
			$objservices->label6_c= $label6;
			$objservices->label7_c= $label7;
			$objservices->label8_c= $label8;
			$objservices->label9_c= $label9;
			$objservices->label10_c= $label10;
			$objservices->label11_c= $label11;
			$objservices->label12_c= $label12;
			$objservices->label13_c= $label13;
			$objservices->label14_c= $label14;
			$objservices->label15_c= $label15;
			$objservices->label16_c= $label16;
			$objservices->label17_c= $label17;
			$objservices->label18_c= $label18;
			$objservices->label19_c= $label19;
			$objservices->label20_c= $label20;
			$objservices->label21_c= $label21;
			$objservices->label22_c= $label22;
			$objservices->label23_c= $label23;
			$objservices->label24_c= $label24;
			$objservices->label25_c= $label25;
			 
			$objservices->charge3_c=$charge3;
			$objservices->charge4_c=$charge4;
			$objservices->charge5_c=$charge5;
			$objservices->charge6_c=$charge6;
			$objservices->charge7_c=$charge7;
			$objservices->charge8_c=$charge8;
			$objservices->charge9_c=$charge9;
			$objservices->charge10_c=$charge10;
			$objservices->charge11_c=$charge11;
			$objservices->charge12_c=$charge12;
			$objservices->charge13_c=$charge13;
			$objservices->charge14_c=$charge14;
			$objservices->charge15_c= $charge15;
			$objservices->charge16_c= $charge16;
			$objservices->charge17_c= $charge17;
			$objservices->charge18_c= $charge18;
			$objservices->charge19_c= $charge19;
			$objservices->charge20_c= $charge20;
			$objservices->charge21_c= $charge21;
			$objservices->charge22_c= $charge22;
			$objservices->charge23_c= $charge23;
			$objservices->charge24_c= $charge24;
			$objservices->charge25_c= $charge25;
			$objservices->save();
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}

}



	public function action_saveorder()
	{
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
