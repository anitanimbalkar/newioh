<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
include_once(DOCROOT.'application/classes/helper/transaction.php');
require_once(DOCROOT.'simple_html_dom.php');

class Controller_Cbulkconsultation extends Controller_Ctemplatewithmenu {
	public function action_search(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vbulkconsultation');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		/*$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$content->bind('pathologistid', $pathologistid);*/
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	public function action_uploadconsultation()
	{
		try
		{
			$errors = array();
			$messages = array();
			$resultdata = array();
			$msg="";
			if($_POST)
			{   
				$file = new helper_Files();
				$return = $file->saveTempFile($_FILES['file']);
				$resultdata = $this->exceltodatabaseConsult($return['path']);
				$_POST['search'] = '';
				$messages['message'] = '<div class="bodytext_normal"><span class="bodytext_bold">Catalog Summary : </span></br></br>
											&nbsp; '.$resultdata.' ,</br>
											</br> 
											<span class="bodytext_bold">Consultations added &nbsp;&nbsp;: '.' Tests</span>
										
										</div>';
				$this->display($errors,$messages);
			}
			else
			{
				$_POST['search'] = '';
				$this->display($errors,$messages);
			}	
		}catch(Exception $e){
			var_dump($e);
			die;
		}
	}
	private function exceltodatabaseConsult($filename)
	{
		$obj_user = Auth::instance()->get_user();
		if (!$obj_user){
			Request::current()->redirect('cuser/login');
		}
		$patientuserid=$obj_user->id;
		// logged in patients id
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
		$reportlab1 =$rowData[0][14] ;
		$reportlab2 =$rowData[0][15] ;
		$reportlab3 =$rowData[0][16] ;
		$reportlab4 =$rowData[0][17] ;
		$reportlab5 =$rowData[0][18] ;
		$reportlab6 =$rowData[0][19] ;
		$reportlab7 =$rowData[0][20] ;
		$reportlab8 =$rowData[0][21] ;
		$reportlab9 =$rowData[0][22] ;
		$reportlab10 =$rowData[0][23] ;

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
				$reportdata1 =$rowData[0][14] ;
				$reportdata2 =$rowData[0][15] ;
				$reportdata3 =$rowData[0][16] ;
				$reportdata4 =$rowData[0][17] ;
				$reportdata5 =$rowData[0][18] ;
				$reportdata6 =$rowData[0][19] ;
				$reportdata7 =$rowData[0][20] ;
				$reportdata8 =$rowData[0][21] ;
				$reportdata9 =$rowData[0][22] ;
				$reportdata10 =$rowData[0][23] ;
 
			$appdate = $rowData[0][0];
			//var_dump($appdate);die;
			$doctorname = trim($rowData[0][1]);
				
			if ((trim($appdate) != "") and (trim($doctorname) != ""))
			{
				// If date and doctor name entered for consultation then 
				// only generate records 				
				$phpexcepDate = $appdate-25569; //to offset to Unix epoch
				$appdate=strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
				$appdatetime=date('Y-m-d H:i:s', $appdate);
				$onlydate =date('d M Y', $appdate);
				//$appdate= date_format(date_create($appdate),'Y-m-d H:i:s');
				//var_dump($appdate);die;
				$timestamp = (new DateTime($appdatetime))->getTimestamp();

				$nonregdoctorid = null;

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
				
				// Check if incidence entered
				if ($rowData[0][8]!="")
				{
					$objInci = ORM::factory("incident")
						->where ("incidentsname_c","=",$rowData[0][8])
						->find();
					if($objInci->id != null)
						$incidentID = $objInci->id;
					else
					{
						// Define incidence
						$objInci = ORM::factory("incident");
						$objInci->incidentsname_c = $rowData[0][8];	
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
				if($rowData[0][9] != "")
				{
					$textcomplaintobj = ORM::factory('textcomplaint');
					$textcomplaintobj->ref_app_id  = $appointmentid;
					$textcomplaintobj->text  = $rowData[0][9];
					$textcomplaintobj->visibility=1;
					$textcomplaintobj->save();
				}
				// Examination Summary Details entered on prescription
				if($rowData[0][10] != "")
				{
					$textexaminationsummaryobj = ORM::factory('textexaminationsummary');
					$textexaminationsummaryobj->ref_app_id  = $appointmentid;
					$textexaminationsummaryobj->text  = $rowData[0][10];
					$textexaminationsummaryobj->visibility=1;
					$textexaminationsummaryobj->save();
				}
				// Diagnosis Details entered on prescription
				if($rowData[0][11] != "")
				{			
					$textdiagnosisnoteobj = ORM::factory('textdiagnosisnote');
					$textdiagnosisnoteobj->ref_app_id  = $appointmentid;
					$textdiagnosisnoteobj->text  = $rowData[0][11];
					$textdiagnosisnoteobj->visibility=1;
					$textdiagnosisnoteobj->save();
				}
				// Medicine Details 
				if($rowData[0][12] != "")
				{
					$textprescriptionobj = ORM::factory('textprescription');
					$textprescriptionobj->ref_app_id  = $appointmentid;
					$textprescriptionobj->text  = $rowData[0][12];
					$textprescriptionobj->visibility=1;
					$textprescriptionobj->save();
				}
				//Investigation Details
				if($rowData[0][13] != "")
				{
					$textinvestigationobj = ORM::factory('textinvestigation');
					$textinvestigationobj->ref_app_id  = $appointmentid;
					$textinvestigationobj->text  = $rowData[0][13];
					$textinvestigationobj->visibility=1;
					$textinvestigationobj->save();				
				}		
				/*Enter Reports Data is to be formated as  
					(01 Aug 2016)Insulin [Units/volume] in Serum or Plasma : 70 u[IU]/mL ,
					(01 Aug 2016)Glucose [Presence] in Urine : present 
					Date not entered for Report Values	*/
				
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
					$textreportparameterobj->onlyparameter = $reporttext;
					$textreportparameterobj->visibility=1;
					$textreportparameterobj->save();
				}
		
				$temp=array();
				if($rowData[0][2]!="")
				{
					$temp["vitals"]["vitals_q_8"]["q"]="BP";
					$temp["vitals"]["vitals_q_8"]["a"]=$rowData[0][2];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","BP")
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][2];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][3]!="")
				{
					$temp["vitals"]["vitals_q_21"]["q"]="Pulse";
					$temp["vitals"]["vitals_q_21"]["a"]=$rowData[0][3];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","Pulse")
							->where("isverified_c","=",1)->find();
					if($paramObj->id != null)
					{
						// Enter data in tracker data bank
						$trackerObj = ORM::factory("patientparameter");
						$trackerObj->reftestparameterid_c = $paramObj->id;
						$trackerObj->refpatientuserid_c = $patientuserid;
						$trackerObj->value_c = $rowData[0][3];
						$trackerObj->refunitid_c = $paramObj->refdefaultunitid_c;
						$trackerObj->timestamp_c = $timestamp;
						$trackerObj->loinccode_c = $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][4]!="")
				{			
					$temp["vitals"]["vitals_q_1"]["q"]="Weight";
					$temp["vitals"]["vitals_q_1"]["a"]=$rowData[0][4];
					$paramObj = ORM::factory("testparameter")
							->where("parametername_c","=","Weight")
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
					$temp["vitals"]["vitals_q_2"]["q"]="Height";
					$temp["vitals"]["vitals_q_2"]["a"]=$rowData[0][5];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","Height")
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
					$temp["vitals"]["vitals_q_3"]["q"]="BMI";
					$temp["vitals"]["vitals_q_3"]["a"]=$rowData[0][6];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","BMI")
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
						$trackerObj->loinccode_c= $paramObj->loinccode_c;
						$trackerObj->save();
					}					
				}
				if($rowData[0][7]!="")
				{				
					$temp["vitals"]["vitals_q_43"]["q"]="WHR";
					$temp["vitals"]["vitals_q_43"]["a"]=$rowData[0][7];
					$paramObj = ORM::factory("testparameter")
								->where("parametername_c","=","WHR")
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
					$textexaminationobj = ORM::factory('textexamination');
					$textexaminationobj->ref_app_id  = $appointmentid;
					$textexaminationobj->json  = json_encode($temp);
					$textexaminationobj->visibility=1;
					$textexaminationobj->save();
		}
		else
		{
			// Invalid consultations 
			$notaddconsult = $notaddconsult." ".$patientuserid."-".$appdate.",";
		}
	}	
		return("Added consultations - ".$addconsult);
	}

	public function action_upload(){
		try{
			$errors = array();
			$messages = array();
			$obj_user = Auth::instance()->get_user();
			if (!$obj_user){
				Request::current()->redirect('cuser/login');
			}			
			if($_POST){
				$name = $_FILES["file"]["name"];
				$index = count(explode(".", $name)) - 1;
				$arr = explode(".", $name);
				$ext = $arr[$index];

				if($ext == "xls" || $ext == "xlsx")
				{		
					if ($_FILES["file"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					}
					else
					{
						$helper_import = new helper_Import();
						$rows = $helper_import->excel($_FILES['file']['tmp_name']);
						
						{ //iterate through each record				
							$objCompleteCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)->find_all()->as_array();
							$arrayofExistingTest = array();
							$numberOfExistingTests = 0;
							$numberOfUpdatedTests = 0;
							$numberOfAddedTests = 0;
							$numberOfDeletedTests = 0;
							$invalidData = '';
							
							for($rowindex=2;$rowindex <= count($rows);$rowindex++){
								$cataloguedata =  Kohana::$config->load('catalogue');
								$catalogue = array();
								foreach($rows[$rowindex] as $key=>$value){
									if(isset($cataloguedata[$key])){
										if(!isset($catalogue[$cataloguedata[$key][1]])){
											$catalogue[$cataloguedata[$key][1]] = '';
										}
										$catalogue[$cataloguedata[$key][1]] = ($value != '')? $value : $catalogue[$cataloguedata[$key][1]];
									}
								}
								if ($catalogue['discountpercent']=='')
								{
										$catalogue['discountpercent']=0;
								}
								{
									$objcatalog = new Model_Pathologistcatalog;
									$catalogs = $objcatalog->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)->where('refpathcatalogtestid_c', '=', $catalogue['iohtestcode'])->find();
									$masterTests = ORM::factory('testmaster')->where('id','=',$catalogue['iohtestcode'])->find();
									if(($catalogue['labtestcode'] != '')&&($catalogue['labtestname'] !='')&&($catalogue['sellingprice'] !='')&&($masterTests->id != null)  ){
										$objcatalog->refpathcatalogpathologistsid_c = $objpathologist->id;
										$objcatalog->refpathcatalogtestid_c = $catalogue['iohtestcode'];
										$objcatalog->test_rate_c =str_replace('&','and',$catalogue['sellingprice']);
										$objcatalog->discountpercent_c =str_replace('&','and',$catalogue['discountpercent']);
										$objcatalog->test_name = str_replace('&','and',$catalogue['labtestname']);
										$objcatalog->test_code = str_replace('&','and',$catalogue['labtestcode']);
										if($catalogs->id == null){
											$objcatalog->save();
											$numberOfAddedTests = $numberOfAddedTests + 1;
										}
										else{
											$objcatalog->id = $catalogs->id;
											$objcatalog->update();
											array_push($arrayofExistingTest,$objcatalog->id);
											$numberOfUpdatedTests = $numberOfUpdatedTests + 1;
										}
										$numberOfExistingTests = $numberOfExistingTests + 1;	
									}else{
										$invalidData = $invalidData.', '.$catalogue['iohtestcode']; 
									}	
								}								
							}
							foreach($objCompleteCatalog as $objCatalog){
								$exists = false;
								foreach($arrayofExistingTest as $test){
									if($test == $objCatalog->id){
										$exists = true;
										break;
									}
								}
								if($exists == false){
									$objCatalog->delete();	
									$numberOfDeletedTests = $numberOfDeletedTests + 1;
						
								}
							}
							$invalidData = ($invalidData == '')?'Not Found': $invalidData;
							$messages['message'] = '<div class="bodytext_normal"><span class="bodytext_bold">Catalog Summary : </span></br></br>
											&nbsp; Number Of Tests that are Updated &nbsp;: '.$numberOfUpdatedTests.' Tests,</br>
											&nbsp; Number Of Tests that are Deleted &nbsp;: '.$numberOfDeletedTests.' Tests,</br>
											&nbsp; Number Of Tests that are Added &nbsp;&nbsp;&nbsp;: '.$numberOfAddedTests.' Tests,</br>
											&nbsp; Invalid data for ids : '.$invalidData.'</br>
											</br> 
											<span class="bodytext_bold">Total Number Of tests Available &nbsp;&nbsp;: '.$numberOfExistingTests.' Tests</span>
										
										</div>';
						}						
					}
				}
				//Request::current()->redirect($_SERVER['HTTP_REFERER']);
			}
			$_POST['search'] = '';
			$this->display($errors,$messages);
		}catch(Exception $e){
			var_dump($e);
			die;
		}
	}
	public function action_downloadformat()
	{
		$obj_user = Auth::instance()->get_user();
		if (!$obj_user){
			Request::current()->redirect('cuser/login');
		}
		/*
			Open standard excel file and fill first and second column
			with iohid and patient name which are in doctors network 
		*/
		$file = DOCROOT."application/forms/bulkregistration/consumers/consultation_format.xlsx";
		try {
				$inputFileType = PHPExcel_IOFactory::identify($file);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($file);
		} catch(Exception $e) 
		{
				die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
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
}

