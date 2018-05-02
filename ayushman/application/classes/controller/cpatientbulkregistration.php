<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
include_once(DOCROOT.'application/classes/helper/transaction.php');
require_once(DOCROOT.'simple_html_dom.php');

class Controller_Cpatientbulkregistration extends Controller {

public function action_uploadconsultation()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['zip_file']);
			$resultdata = $this->exceltodatabaseConsult($return['path']);
			//return($resultdata);
			//Request::current()->redirect('cconsultation/view?#/doctordashboardlanding/');
			echo ($resultdata);
			die;
	 	}
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			echo($errors);
			die;
			//$this->display($errors,$messages,$msg);
		}		
	}
	
public function exceltodatabaseConsult($filename)
{
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user){
		Request::current()->redirect('cuser/login');
	}
	$user_id=$obj_user->id;
	$objuser = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$doctorid = $objuser->id;	
	try {
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($filename);
	} catch(Exception $e) 
	{
		die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
	}

	//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
	//  Loop through each row of the worksheet in turn
	$notaddconsult = "";
	$addconsult = "";
	
		// Read Report Labels
		$rowData = $sheet->rangeToArray('A3' . ':' . $highestColumn.'3',
					NULL,
					TRUE,
					FALSE);
		//$timestamp = time();
		$reportlab1 =$rowData[0][16] ;
		$reportlab2 =$rowData[0][17] ;
		$reportlab3 =$rowData[0][18] ;
		$reportlab4 =$rowData[0][19] ;
		$reportlab5 =$rowData[0][20] ;
		$reportlab6 =$rowData[0][21] ;
		$reportlab7 =$rowData[0][22] ;
		$reportlab8 =$rowData[0][23] ;
		$reportlab9 =$rowData[0][24] ;
		$reportlab10 =$rowData[0][25] ;

		for($rowindex=4;$rowindex <= $highestRow;$rowindex++)
		{
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $rowindex . ':' . $highestColumn . $rowindex,
					NULL,
					TRUE,
					FALSE);
					
			// First check if iohid is entered correctly and is 
			// of the patient of logged in doctor
			// Check network of patient and doctor.
			// Reports data
				$reportdata1 =$rowData[0][16] ;
				$reportdata2 =$rowData[0][17] ;
				$reportdata3 =$rowData[0][18] ;
				$reportdata4 =$rowData[0][19] ;
				$reportdata5 =$rowData[0][20] ;
				$reportdata6 =$rowData[0][21] ;
				$reportdata7 =$rowData[0][22] ;
				$reportdata8 =$rowData[0][23] ;
				$reportdata9 =$rowData[0][24] ;
				$reportdata10 =$rowData[0][25] ;

			$patientuserid = $rowData[0][0];
			$appdate = $rowData[0][2];
			//var_dump($appdate);die;
			if (trim($appdate) != "")
			{
				// If date entered for consultation then 
				// only generate records 				
				$phpexcepDate = $appdate-25569; //to offset to Unix epoch
				$appdate=strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
				$appdatetime=date('Y-m-d H:i:s', $appdate);
				$onlydate =date('d M Y', $appdate);
				//$appdate= date_format(date_create($appdate),'Y-m-d H:i:s');
				//var_dump($appdate);die;
				$timestamp = (new DateTime($appdatetime))->getTimestamp();
						
				$objpatient = ORM::factory("patient")
						->where("repatientsuserid_c","=",$patientuserid)
						->find();
				$objfav = ORM::factory("favoritedocterbypatient")
						->where("reffavdocbypatpatientsid_c","=",$objpatient->id)
						->where("reffavdocbypatdoctorsid_c","=",$doctorid)
						->find();
				$nonregdoctorid = null;
				$doctorname = trim($rowData[0][3]);
				if ($doctorname == "")
				{
					$consultdoctorid = $doctorid;  // Logged doctor
					$nonregdoctorid = null;
				}
				else
				{
					// Check doctor name registered on system
					$objregisterDoc = ORM::factory("registereddoctor")
						->where ("doctorname","=",$doctorname)->find();
					if ($objregisterDoc->doctorid != null)
					{
						$consultdoctorid = $objregisterDoc->doctorid;
						$nonregdoctorid = null;
					}						
					else
					{
						$consultdoctorid = -1;
						// Check if nonregister doctor
						$objnonreg = ORM::factory("nonregdoctor")
								->where("doctorname_c",'=',$doctorname)
								->find();
						if ($objnonreg->id != null)
							$nonregdoctorid = $objnonreg->id;	
						else
						{
							// Register doctor name as not registered in system
							$objnonreg = ORM::factory("nonregdoctor");
							$objnonreg->doctorname_c = $doctorname;
							$objnonreg->save();							
							$nonregdoctorid = $objnonreg->id;
						}
					}
				}
				if($objfav->id != null)
				{
					// Check if incidence entered
					if ($rowData[0][10]!="")
					{
						$objInci = ORM::factory("incident")
							->where ("incidentsname_c","=",$rowData[0][10])
							->find();
						if($objInci->id != null)
							$incidentID = $objInci->id;
						else
						{
							// Define incidence
							$objInci = ORM::factory("incident");
							$objInci->incidentsname_c = $rowData[0][10];	
							$objInci->save();
							$incidentID = $objInci->id;
						}
					}
					else
						$incidentID = null;
				// Start adding data
				// First create appointment record
				$objappointment = ORM::factory('appointment');
				$objappointment->refappfromid_c =$patientuserid;
				$objappointment->status_c = 'notfromsystem';
				$objappointment->refappwithid_c = $consultdoctorid;
				$objappointment->refnonregdoctorid_c = $nonregdoctorid;				
				$objappointment->refincidentid_c = $incidentID;
				$objappointment->refappointmentstatusesid_c=1;	//completed appointment
				$objappointment->refmode_c=3;					//In-clinic
				$objappointment->paymentmode_c="online";	
				$objappointment->consultationmode_c = "notfromsystem";
				$objappointment->displaytime_c =$appdatetime;
				$objappointment->scheduledstarttime_c = $appdatetime;
				$objappointment->scheduledendtime_c = $appdatetime;
				$objappointment->endconsultdate_c=$appdatetime;
				$objappointment->save();
				$appointmentid=$objappointment->id;
				$addconsult = $addconsult." ".$patientuserid."-".$onlydate.",";
				
				// Symptoms Details entered on prescription
				if($rowData[0][11] != "")
				{
					$textcomplaintobj = ORM::factory('textcomplaint');
					$textcomplaintobj->ref_app_id  = $appointmentid;
					$textcomplaintobj->text  = $rowData[0][11];
					$textcomplaintobj->visibility=1;
					$textcomplaintobj->save();
				}
				// Examination Summary Details entered on prescription
				if($rowData[0][12] != "")
				{
					$textexaminationsummaryobj = ORM::factory('textexaminationsummary');
					$textexaminationsummaryobj->ref_app_id  = $appointmentid;
					$textexaminationsummaryobj->text  = $rowData[0][12];
					$textexaminationsummaryobj->visibility=1;
					$textexaminationsummaryobj->save();
				}
				// Diagnosis Details entered on prescription
				if($rowData[0][13] != "")
				{			
					$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote');
					$textdiagnosisnoteobj->ref_app_id  = $appointmentid;
					$textdiagnosisnoteobj->text  = $rowData[0][13];
					$textdiagnosisnoteobj->visibility=1;
					$textdiagnosisnoteobj->save();
				}
				// Medicine Details 
				if($rowData[0][14] != "")
				{
					$textprescriptionobj = ORM::factory('textprescription');
					$textprescriptionobj->ref_app_id  = $appointmentid;
					$textprescriptionobj->text  = $rowData[0][14];
					$textprescriptionobj->visibility=1;
					$textprescriptionobj->save();
				}
				//Investigation Details
				if($rowData[0][15] != "")
				{
					$textinvestigationobj = ORM::factory('textinvestigation');
					$textinvestigationobj->ref_app_id  = $appointmentid;
					$textinvestigationobj->text  = $rowData[0][15];
					$textinvestigationobj->visibility=1;
					$textinvestigationobj->save();				
				}		
				/*Enter Reports Data is to be formated as  
					(01 Aug 2016)Insulin [Units/volume] in Serum or Plasma : 70 u[IU]/mL ,
					(01 Aug 2016)Glucose [Presence] in Urine : present */
				
				$reporttext = "";			
				if (($reportlab1 != "") and ($reportdata1!=""))
				{
					$reporttext = $reporttext.$reportlab1." :".$reportdata1.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab1)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata1;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab2 != "") and ($reportdata2!=""))
				{
					$reporttext = $reporttext.$reportlab2." :".$reportdata2.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab2)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata2;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}			
				if (($reportlab3 != "") and ($reportdata3!=""))
				{
					$reporttext = $reporttext.$reportlab3." :".$reportdata3.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab3)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata3;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab4 != "") and ($reportdata4!=""))
				{
					$reporttext = $reporttext.$reportlab4." :".$reportdata4.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab4)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
					// Enter data in tracker data bank
					$trackerObj = ORM::factory("patientparameter");
					$trackerObj->reftestparameterid_c = $paramObj->id;
					$trackerObj->refpatientuserid_c = $patientuserid;
					$trackerObj->value_c = $reportdata4;
					$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
					$trackerObj->timestamp_c = $timestamp;
					$trackerObj->loinccode_c = $paramObj->loinccode_c;
					$trackerObj->save();
					}	
				}				
				if (($reportlab5 != "") and ($reportdata5!=""))
				{
					$reporttext = $reporttext.$reportlab5." :".$reportdata5.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab5)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata5;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab6 != "") and ($reportdata6!=""))
				{
					$reporttext = $reporttext.$reportlab6." :".$reportdata6.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab6)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata6;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab7 != "") and ($reportdata7!=""))
				{
					$reporttext = $reporttext.$reportlab7." :".$reportdata7.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab7)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata7;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}				
				if (($reportlab8 != "") and ($reportdata8!=""))
				{
					$reporttext = $reporttext.$reportlab8." :".$reportdata8.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab8)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata8;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab9 != "") and ($reportdata9!=""))
				{
					$reporttext = $reporttext.$reportlab9." :".$reportdata9.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab9)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata9;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}	
				}				
				if (($reportlab10 != "") and ($reportdata10!=""))
				{
					$reporttext = $reporttext.$reportlab10." :".$reportdata10.",    ";
					// Add this parameter in tracker
					$paramObj = ORM::factory("testparameter")
							->where("aliasname_c","=",$reportlab10)
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $reportdata10;
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}				
				if ($reporttext != "" )	
				{
					$textreportparameterobj = ORM::factory('textreportparameter');
					$textreportparameterobj->ref_app_id  = $appointmentid;
					$textreportparameterobj->text  = $reporttext;
					$textreportparameterobj->onlyparameter  = $reporttext;
					
					$textreportparameterobj->visibility=1;
					$textreportparameterobj->save();
				}
		
				$temp=array();
				if($rowData[0][4]!="")
				{
					$temp["vitals"]["vitals_q_8"]["q"]="BP";
					$temp["vitals"]["vitals_q_8"]["a"]=$rowData[0][4];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","BP")
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][4];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][5]!="")
				{
					$temp["vitals"]["vitals_q_21"]["q"]="Pulse";
					$temp["vitals"]["vitals_q_21"]["a"]=$rowData[0][5];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","Pulse")
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][5];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][6]!="")
				{			
					$temp["vitals"]["vitals_q_1"]["q"]="Weight";
					$temp["vitals"]["vitals_q_1"]["a"]=$rowData[0][6];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","Weight")
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][6];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][7]!="")
				{
					$temp["vitals"]["vitals_q_2"]["q"]="Height";
					$temp["vitals"]["vitals_q_2"]["a"]=$rowData[0][7];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","Height")
								->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][7];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][8]!="")
				{
					$temp["vitals"]["vitals_q_3"]["q"]="BMI";
					$temp["vitals"]["vitals_q_3"]["a"]=$rowData[0][8];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","BMI")
								->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][8];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c= $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][9]!="")
				{				
					$temp["vitals"]["vitals_q_43"]["q"]="WHR";
					$temp["vitals"]["vitals_q_43"]["a"]=$rowData[0][9];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","WHR")
								->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][9];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
					$textexaminationobj = ORM::factory('textexamination');
					$textexaminationobj->ref_app_id  = $appointmentid;
					$textexaminationobj->json  = json_encode($temp);
					$textexaminationobj->visibility=1;
					$textexaminationobj->save();
			}
		}
		else
		{
			// Patient not in doctors network so do not add consultations
			$notaddconsult = $notaddconsult." ".$patientuserid."-".$appdate.",";
		}
	}	
	return("Added consultations - ".$addconsult);
}

public function action_downloadconsultationformat()
{
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user){
		Request::current()->redirect('cuser/login');
	}
	$user_id=$obj_user->id;
	$doctorname = trim($obj_user->Firstname_c). " ".trim($obj_user->lastname_c);
	$objuser = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$doctorid = $objuser->id;	

	/*
		Open standard excel file and fill first and second column
		with iohid and patient name which are in doctors network 
	*/
	$file = DOCROOT."application/forms/bulkregistration/consultation_format.xlsx";
	try {
			$inputFileType = PHPExcel_IOFactory::identify($file);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($file);
	} catch(Exception $e) 
	{
			die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
		//  select all patient in doctors network and 
		//  loop thru to add in excel
	$patientObj = ORM::factory("doctorwisepatient")
					->where("doctorid","=",$doctorid)
					->order_by("patientname")->find_all();
	$row = 4;		// Start entering data from 4th row
	foreach($patientObj as $patient)
	{
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row,$patient->patientuserid);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row,$patient->patientname);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row,$doctorname);
		++$row;		
	}
		$objPHPExcel->getActiveSheet()->setTitle('sheet');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xlsx', "consultation_format.xlsx"));
		$file = 'consultation_format.xlsx';

	if (file_exists($file)) 
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
}

//BULK REGISTRATION
private function create_user($record,$rolename)
	{
		$objuser = Auth::instance()->get_user();
		if (!$objuser){
			Request::current()->redirect('cuser/login');
		}
			$user_id = $objuser->id;	
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
			$doctorid = $objdoctor->id;	
			
			$password = md5(uniqid(rand()));//create 6 chara password
			$password = substr($password,-8);
			$initialusername = strtolower($this->clean(trim($record[0])).$this->clean(trim($record[2])));
			$initialusername = substr($initialusername,0,25);
			$username = $initialusername;
			$userCount = 0;
			while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
				$userCount++;
				$username = $initialusername . $userCount;
			}
			$arrPost['username']= $username;
			$arrPost['password']= $password;
			$arrPost['password_confirm'] = $password;
			$activationcode	=  md5(uniqid(rand(), true));
			//$username = ORM::factory('user');
			
			$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
			$user->add('roles', ORM::factory('role', array('name' => 'login')));
			$user->add('roles', ORM::factory('role', array('name' => $rolename)));
			$user->Firstname_c	= trim($record[0]);
			$user->middlename_c	= trim($record[1]);
			$user->lastname_c 	= trim($record[2]);
			$user->mobileno1_c = trim($record[5]);
			$user->email = trim($record[6]);
			$user->gender_c 	= trim($record[3]);
			$dateofbirth = date('d-m-Y', strtotime($record[4]));
			$user->DOB_c =date('Y-m-d', strtotime($dateofbirth));
			$user->activationcode_c	= $activationcode;
			$user->activationstatus_c	= 'active';
			$user->accountcreatedby_c ="script";
			$user->xmpppassword_c = $user->password ;
			$obj_patient=ORM::factory($rolename);
			$obj_patient->repatientsuserid_c = $user->id;
			
			// No automatic order placement for medicine
			// and pathologists
			$obj_patient->allowedtoplacemedicineorder_c = 0;
			$obj_patient->allowedtoplacepathorder_c = 0;
				
			$obj_patient->save();
			$patientid = $obj_patient->id;
			$user->save();
			
			// Patient id			
			// Patient definition complete
			$patientuserid=$user->id;			
			
			// Patient to be linked in doctors network
			// Insert record in favoritedocterbypatients
			$objfav = ORM::factory("favoritedocterbypatient");
			$objfav->reffavdocbypatpatientsid_c = $patientid;
			$objfav->reffavdocbypatdoctorsid_c = $doctorid;
			$objfav->save();
			
			// Doctors network of chemist and pathologist will be attached
			// for the newly registered patient
				$favDCs = ORM::factory('favoritepathologistsbydoctor')->where('reffavpathdoctorsid_c','=',$doctorid)->find_all();
				//$pathologistnames = '';
				$i = 0;
				foreach($favDCs as $favDC){
					$fav = ORM::factory('favoritepathologistbypatient');
					$fav->reffavpathopathologistsid_c = $favDC->reffavpathpathologistsid_c;
					//$pathologistnames = $pathologistnames.' '.ORM::factory('pathologist')->where('id','=',$favDC->reffavpathpathologistsid_c)->find()->nameofcenter_c;
					$fav->prefered_c = $i;
					$fav->reffavpathopatientsid_c = $patientid;
					$fav->save();						
					$i = $i + 1;
				}
				$i = 0;
							
				$favChems = ORM::factory('favoritechemistbydoctor')->where('reffavchembydocdoctorsid_c','=',$doctorid)->find_all();
				//$chemistnames = '';
				foreach($favChems as $favChem){
					$fav = ORM::factory('favoritechemistbypatient');
					$fav->reffavchembypatchemistsid_c = $favChem->reffavchembydocchemistsid_c;
					//$chemistnames = $chemistnames.' '.ORM::factory('chemist')->where('id','=',$favChem->reffavchembydocchemistsid_c)->find()->nameofmedical_c;
					$fav->reffavchembypatpatientid_c = $patientid;
					$fav->prefered_c = $i;
					$fav->save();						
					$i = $i + 1;
				}			
			$answer=array($username,$password,$user->id);
			return $answer;
	}
	
	public function exceltodatabase($filename)
	{						
		try {
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($filename);
		} catch(Exception $e) 
		{
			die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		//  Loop through each row of the worksheet in turn
		
		for ($row = 3; $row <= $highestRow; $row++)
		{ 
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			NULL,
			TRUE,
			FALSE);
			$firstname = $rowData[0][1];
			$middlename	= $rowData[0][2];
			$lastname	= $rowData[0][3];
			$gender	=$rowData[0][9];
			$dob		= $rowData[0][10];
			$phpexcepDate = $dob-25569; //to offset to Unix epoch
			$dob=strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
			$dob=date('d/m/Y', $dob);
			$mobileno	= $rowData[0][11];
			if(isset($rowData[0][12]))
			$email	= $rowData[0][12];
			else
			$email="";
			
			$arraydata=array($firstname,$middlename,$lastname,$gender,$dob,$mobileno,$email);
			if(($firstname!="")and ($firstname!= null)
				and ($lastname!="") and ($lastname!=null))
				$logindetails=$this->create_user($arraydata,'patient');
			// No need to send notifications to user
			// when bulk registering by doctor
			if($logindetails!=0)
			{
				if($logindetails[1]== -1)
				{
					//$notification=  array();
					//$notification['id']=$logindetails[0];
					//$notification['template']='failedassociation';
					//$notification['sms'] = 'true';
					//$notification['email'] = 'true';
					//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
					//$notificationsender = new helper_notificationsender();
					//$notificationsender->sendnotification($notification);					
				}
				else
				{
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $logindetails[2]);
					$objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $logindetails[0]);
					$objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $logindetails[1]);
					if($logindetails[2] != '')//if ioh id is null then do not send sms.
					{
						//$notification=  array();
						//$notification['id']=$logindetails[2];
						//$notification['template']='corporatemembersregistration';
						//$notification['name']=$firstname.' '.$lastname;
						//$notification['uname']=$logindetails[0]; 
						//$notification['password']=$logindetails[1]; 
						//$notification['iohid']=$logindetails[2];
						//$notification['sms'] = 'true';
						//$notification['email'] = 'true';
						//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
						//$notificationsender = new helper_notificationsender();
						//$notificationsender->sendnotification($notification);						
					} 
				}
			}
			else
			$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$row, "Employee Already Registered");
		}
		$objPHPExcel->getActiveSheet()->setTitle('sheet');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xlsx', "bulkregistration.xlsx"));
		$file = 'bulkregistration.xlsx';
		if (file_exists($file)) 
		{
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
		}
	}
	
	public function action_upload()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['zip_file']);
			
			$this->exceltodatabase($return['path']);
			//$this->display($errors,$messages,$msg);
		}
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			//$this->display($errors,$messages,$msg);
		}		
	}
	public function action_download()
	{
		$file = DOCROOT."application/forms/bulkregistration/bulkregistration_format.xlsx";
		if (file_exists($file)) 
		{
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
		}
	}
	private function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}
	public function action_downloadPDF() 
	{
		$objUser = Auth::instance()->get_user();
		if (!$objUser){
			Request::current()->redirect('cuser/login');
		}		
		$htmlfile = $_POST['htmlfile'];
		
		$htmlfile = str_replace('/ayushman/assets/',$_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/',$htmlfile);
		$objHtml 	= new simple_html_dom();
		$objHtml->load($htmlfile);
		$files = new helper_Files();
		$temp=$files->savePdfFile($objHtml);
		$file = $temp["file"];
		
		if (file_exists($file)) 
		{
			header('Content-Description: File Transfer');
			header("Content-type: application/pdf");
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
		}
	}
}