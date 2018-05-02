<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
class Controller_Upload extends Controller_Ctemplatewithoutmenu {
	public function action_saveuploadedreports()
	{
		$session= Session::instance();
		$session->set('fileid', "");
		//var_dump($_POST);
		//var_dump($_GET);
		//die;
		if ( !empty( $_FILES ) ) {
			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
			$uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
			if($_FILES["file"]["type"]!="application/pdf")
			{
				//var_dump($_FILES["file"]["type"]); die;
				if($_FILES["file"]["type"]!="application/octet-stream")
				{
					if(isset($_GET['id'])){  // id is test id
						$files = new helper_Files();
						$return = $files->saveTempFile($_FILES["file"]);
						$html = "<img src='".$_SERVER['DOCUMENT_ROOT']."/ayushman/".$return["abspath"]."' />";
						$var=$session->get('html');
						if(isset($var))
						{
							$temp=$session->get($_GET['id'].'html').$html.'<style>.break { page-break-before: always; }</style><h1 class="break" ></h1>';
							$session->set($_GET['id'].'html', $temp);
						}
						else
						{
							$session->set($_GET['id'].'html', $html);
						}
					}
					else
					{
						$files = new helper_Files();
						$return = $files->saveTempFile($_FILES["file"]);
						$html = "<img src='".$_SERVER['DOCUMENT_ROOT']."/ayushman/".$return["abspath"]."' />";
						$var=$session->get('html');
						if(isset($var))
						{
							$temp=$session->get('html').$html.'<style>.break { page-break-before: always; }</style><h1 class="break" ></h1>';
							$session->set('html', $temp);
						}
						else
						{
							$session->set('html', $html);
						}
					}
				}
				else//dicom
				{
					$session= Session::instance();
					$temp= $session->get('reportid');
					if(!isset($temp))
					{
						$dicomfile=ORM::factory("patienttestreport");
						$dicomfile->isdicom_c=1;
						$dicomfile->save();
						$session->set('reportid', $dicomfile->id);
						$files = new helper_Files();
						$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
						$dicomfileobj=ORM::factory("dicomfile");
						$dicomfileobj->fileid_c=$return['id'];
						$dicomfileobj->refreportid_c=$dicomfile->id;
						$dicomfileobj->save();
					}
					else
					{	
						$files = new helper_Files();
						$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
						$dicomfileobj=ORM::factory("dicomfile");
						$dicomfileobj->fileid_c=$return['id'];
						$dicomfileobj->refreportid_c=$temp;
						$dicomfileobj->save();
					}
					if(isset($_GET['id']))
					{
						$session->set($_GET['id'].'fileid', $return['id']);
					}				
				}
			}
			else
			{	// For PDF file types			
				$files = new helper_Files();
				$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
				$session->set('fileid', $return['id']);		
				if(isset($_GET['id'])){
					$session->set($_GET['id'].'fileid', $return['id']);
				}
			}
			
			// move_uploaded_file( $tempPath, $uploadPath );
			
			$answer = array( 'answer' => 'File transfer completed' );
			$json = json_encode( $answer );

			//echo($session->get('html')); 
			
			die;
		} 
		else 
		{
			echo 'No files';
		}
	}
	public function action_saveprescriptiondata()
	{
	if(isset($_GET['params']))
	{
		$param=json_decode($_GET['params'], true);
		var_dump($param['Date']); die;
		//	echo(date("d-m-Y H:i", strtotime($param['Date']))); die;
		try
		{		
		$date=date("Y-m-d H:i", strtotime($param['Date']));
		
		if(isset($param['Incidence']))
		{
		
			$objincident=ORM::factory('incident');
			$objincident->incidentsname_c=$param['Incidence'];
			$objincident->save();
		}
		
		$appointment= ORM::factory('appointment');
		$appointment->refappwithid_c="-1";
		$appointment->refappfromid_c=Auth::instance()->get_user()->id;
		$appointment->appointmenttype_c="S";
		$appointment->scheduledstarttime_c=$date;
		$appointment->displaytime_c=$date;
		$appointment->scheduledendtime_c=$date;
		$appointment->appointmentsvia_c="";
		$appointment->status_c="notfromsystem";
		
		$appointment->refappointmentstatusesid_c="1";
		$appointment->refappcaldataid_c="0";
		if(isset($param['Incidence']))
		$appointment->refincidentid_c=$objincident->id;	
		$appointment->save();
		
		
		$intAppId=$appointment->id;
		if(isset($param['medicines']))
		{
			$medicines=explode(",",$param['medicines']);
			//var_dump($medicines); die;
			
			for($i=0;$i< count($medicines)-1;$i++)
			{
				$section = ORM::factory("textprescription")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $medicines[$i];
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$medicines[$i];
					$section->visibility = true;
					$section->update();
				}
				if($medicines[$i] != ""){
					$objPres = ORM::factory('mprescription');
					$objPres->refprescriptionsappoitmentid_c =$intAppId;
					$objPres->save();
					  
					$drugs = ORM::factory('drug')->where('drugname','=',$medicines[$i])->where('active_c','=','1')->find();
					$drugId = $drugs->id;
					$drugType = $drugs->drugform;
					if($drugId != NULL){
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$drugId;
						$objOrm->drugtype_c = $drugType;
						//$objOrm->dosage_c = $drugFreq;
						//$objOrm->quantity_c = $drugDuration;
						//$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
					}
					else{
						$objdrug = ORM::factory('Mdrug');
						$objdrug->DrugName_c = $medicines[$i];
						$objdrug->save();
						$objDrugs=ORM::factory('Mdrug')->where('DrugName_c','=', $medicines[$i])->find();
						// add records in prescriptiondetails table
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$objDrugs->id;
						$objOrm->drugtype_c = $drugType;
						//$objOrm->dosage_c = $drugFreq;
						//$objOrm->quantity_c = $drugDuration;
						//$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
					}
				}					
			}
		}
		if(isset($param['testName']))
		{
			$tests=explode(",",$param['testName']);
			for($i=0;$i< count($tests)-1;$i++){
				$testName = $tests[$i];
				$investigations = ORM::factory('investigation')->where('testname_c','=',$testName)->find();
				$section = ORM::factory("textinvestigation")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $testName;
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$testName;
					$section->visibility = true;
					$section->update();
				}	
				if($testName != ""){
					$testSample = $investigations->sample_c;
					$testId = $investigations->id;
					if($testId != NULL){	
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$testId;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save(); //save recommended tests against appointment id
					}
					else{	
						//save recommended tests against appointment id if test is not present in testmaster
						$objtest = ORM::factory('mtest');
						$objtest->testname_c =ucfirst($testName);
						$objtest->sample_c = ucfirst($testSample);
						$objtest->active_c = 0;
						$objtest->reftestsubcategoryid_c = 1;
						$objtest->save();
						$objTest=ORM::factory('mtest')->where('testname_c','=',ucfirst($testName))->find();
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$objTest->id;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save();			
					}
					//Create an order number and save in recommended tests table
						/*$pathologistId = $ids[$i*$limit+3][1];
						if( $pathologistId != -1 ){
							$objOrm=ORM::factory('Appointmenttest')->where('id','=',$testid)->find() ;
							$objOrm->refrecomtestpathologists1id_c = $pathologistId;
							$testid= $objOrm->save();
							if(!isset($arr_orders[$pathologistId])){
								$objOrders = ORM::factory('Diagnosticlabsorder');
								$today = date('Y-m-d g:i:s a');
								$objOrders->orderdate_c = $today;
								$objOrders->status_c = 'suggested';
								$objOrders->refdiaglabsorderspathologistsid_c = $pathologistId;
								$objOrders->updatestatusdate_c = $today;
								//$objOrders->save();
								$orderid = $objOrders->id;
								$arr_orders[$pathologistId] = $orderid;
							}else{
								$orderid = $arr_orders[$pathologistId];
							}
							$objOrm = new Model_Appointmenttest;
							$objOrm->where('id', '=',$testid)->find();	
							//$objOrm->refrecomtestdiaglabsordersid_c = $orderid;
							$objOrm->save();
						}*/
					}
				}
		}
		if(isset($param['MainComplaint']))
		{
			$textcomplaintobj = ORM::factory('textcomplaint');
			$textcomplaintobj->ref_app_id=$intAppId;
				
			$textcomplaintobj->text=$param['MainComplaint'];
			$textcomplaintobj->visibility="1";
			$textcomplaintobj->save();
		}
		$session= Session::instance();
		$temp= $session->get('html'); 
		$files = new helper_Files();
		if($temp != "")
		{
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp);	
				
			$return = $files->savePdfFile($objHtml);
			$id=$return['id'];
		}
		else
		{
			$id=$session->get('fileid');
		}
		$prescriptionfile=orm::factory("appointmentupload");
		$prescriptionfile->fileid_c=$id;
		$prescriptionfile->refappuploadappointmentsid_c=$appointment->id;
		$prescriptionfile->save();
		$file = new helper_Files();
				$return = $file->getFilePath($id);
		$prescriptionpath = ORM::factory('patientprescriptionsnapshot');
		$prescriptionpath->pdfpath_c=$return['abspath'];
		$prescriptionpath->refappointmentidforprescriptionsnapshots_c=$appointment->id;
		$prescriptionpath->save();
		$session->set('html', '');
		die;
		}
		catch (Exception $e) {
				throw new Exception($e);
			}
	}
	else if(isset($_POST))
	{
		$param=$_POST;
		try
		{		
			$date=date("Y-m-d H:i", strtotime($param['appointmentdate']));
		
			if(isset($param['incident']))
			{	
				$objincident=ORM::factory('incident');
				$objincident->incidentsname_c=$param['incident'];
				$objincident->save();
			}
			if(isset($param['Drname']))
			{ 
			if ($param['Drname']!='')
			{
				$doctors=explode(",",$param['Drname']);
				// Attach first doctor
				$objdoctor=ORM::factory('doctorname')->where("drname","=",$doctors[0])->find();
				if($objdoctor->id != null)
				{
					$doctorid = $objdoctor->id;
					$nonregdoctorid = null;
				}
				else
				{
					// non Registered doctor
					$doctorid = "-1";
					$objdoctor = ORM::factory('nonregdoctor');
					$objdoctor->doctorname_c = $doctors[0];
					$objdoctor->save();
					$nonregdoctorid = $objdoctor->id;
				}
			}
			else
			{	// Doctorname not entered 
				$doctorid = "-1";
				$nonregdoctorid = null;			
			}
			}else
			{
				$doctorid = "-1";
				$nonregdoctorid = null;
			}
	
			$appointment= ORM::factory('appointment');
			$appointment->refappwithid_c=$doctorid ;
			$appointment->refappfromid_c=Auth::instance()->get_user()->id;
			$appointment->appointmenttype_c="S";
			$appointment->scheduledstarttime_c=$date;
			$appointment->displaytime_c=$date;
			$appointment->scheduledendtime_c=$date;
			$appointment->endconsultdate_c=$date;
			$appointment->appointmentsvia_c="";
			$appointment->status_c="notfromsystem";
			$appointment->refnonregdoctorid_c = $nonregdoctorid;
			$appointment->refappointmentstatusesid_c="1";
			$appointment->refappcaldataid_c="0";
			if(isset($param['incident']))
			$appointment->refincidentid_c=$objincident->id;	
			$appointment->save();
			
			$intAppId=$appointment->id;

			if(isset($param['medicines']))
			{
			$medicines=explode(",",$param['medicines']);
			//var_dump($medicines); die;
			
			for($i=0;$i< count($medicines)-1;$i++){			
				$section = ORM::factory("textprescription")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $medicines[$i];
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$medicines[$i];
					$section->visibility = true;
					$section->update();
				}
				
				if($medicines[$i] != ""){
					$objPres = ORM::factory('mprescription');
					$objPres->refprescriptionsappoitmentid_c =$intAppId;
					$objPres->save();
                     
					$drugs = ORM::factory('drug')->where('drugname','=',$medicines[$i])->where('active_c','=','1')->find();
					$drugId = $drugs->id;
					
					$drugType = $drugs->drugform;
					if($drugId != NULL){
						// add records in prescriptiondetails table
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$drugId;
						$objOrm->drugtype_c = $drugType;
						//$objOrm->dosage_c = $drugFreq;
						//$objOrm->quantity_c = $drugDuration;
						//$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
					}
                    else{
						$objdrug = ORM::factory('Mdrug');
						$objdrug->DrugName_c = $medicines[$i];
						$objdrug->save();
						$objDrugs=ORM::factory('Mdrug')->where('DrugName_c','=', $medicines[$i])->find();
						// add records in prescriptiondetails table
						$objOrm = ORM::factory('Appointmentprescription');
						$objOrm->refpdetailsprescriptionsid_c =$objPres->id;
						$objOrm->refpdetailsdrugid_c =$objDrugs->id;
						$objOrm->drugtype_c = $drugType;
						//$objOrm->dosage_c = $drugFreq;
						//$objOrm->quantity_c = $drugDuration;
						//$objOrm->drugperiod_c=$drugInstruction;
						$objOrm->save();
					}
				}		
			}
			}
			if(isset($param['tests']))
			{
			$tests=explode(",",$param['tests']);
			for($i=0;$i< count($tests)-1;$i++){
                $testName = $tests[$i];
				$investigations = ORM::factory('testmaster')->where('testname_c','=',$testName)->find();
				$section = ORM::factory("textinvestigation")->where('ref_app_id','=',$intAppId)->find();
				if($section->id == NULL){
					$section->ref_app_id = $intAppId;
					$section->text = $testName;
					$section->visibility = true;
					$section->save();
				}
				else{
					$section->text = $section->text."\n".$testName;
					$section->visibility = true;
					$section->update();
				}
				
				if($testName != ""){
					$testSample = $investigations->sample_c;
					$testId = $investigations->id;
					if($testId != NULL){	
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$testId;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save(); //save recommended tests against appointment id
					}
					else{	
						//save recommended tests against appointment id if test is not present in testmaster
						$objtest = ORM::factory('mtest');
						$objtest->testname_c =ucfirst($testName);
						$objtest->sample_c = ucfirst($testSample);
						$objtest->active_c = 0;
						$objtest->reftestsubcategoryid_c = 1;
						$objtest->save();
						$objTest=ORM::factory('mtest')->where('testname_c','=',ucfirst($testName))->find();
						$objOrm = ORM::factory('Appointmenttest');
						$objOrm->refrecomtestrecommtestid_c =$objTest->id;
						$objOrm->refrecomtestappointmentsid_c =$intAppId;
						$testid= $objOrm->save();			
					}
					
					//Create an order number and save in recommended tests table
					/*$pathologistId = $ids[$i*$limit+3][1];
					if( $pathologistId != -1 ){
						$objOrm=ORM::factory('Appointmenttest')->where('id','=',$testid)->find() ;
						$objOrm->refrecomtestpathologists1id_c = $pathologistId;
						$testid= $objOrm->save();
						if(!isset($arr_orders[$pathologistId])){
							$objOrders = ORM::factory('Diagnosticlabsorder');
							$today = date('Y-m-d g:i:s a');
							$objOrders->orderdate_c = $today;
							$objOrders->status_c = 'suggested';
							$objOrders->refdiaglabsorderspathologistsid_c = $pathologistId;
							$objOrders->updatestatusdate_c = $today;
							//$objOrders->save();
							$orderid = $objOrders->id;
							$arr_orders[$pathologistId] = $orderid;
						}else{
							$orderid = $arr_orders[$pathologistId];
						}
						$objOrm = new Model_Appointmenttest;
						$objOrm->where('id', '=',$testid)->find();	
						//$objOrm->refrecomtestdiaglabsordersid_c = $orderid;
						$objOrm->save();
					}*/
				}
			}
			}
			if(isset($param['maincomplaint']))
			{
			$textcomplaintobj = ORM::factory('textcomplaint');
			$textcomplaintobj->ref_app_id=$intAppId;
			
			$textcomplaintobj->text=$param['maincomplaint'];
			$textcomplaintobj->visibility="1";
			$textcomplaintobj->save();
			}
			if(isset($param['diagnosis']))
			{
			$textdiagobj = ORM::factory('textdiagnosisnote');
			$textdiagobj->ref_app_id=$intAppId;
			
			$textdiagobj->text=$param['diagnosis'];
			$textdiagobj->visibility="1";
			$textdiagobj->save();
			}
			if(isset($param['followup']))
			{
			$textfollowupobj = ORM::factory('textfollowupnote');
			$textfollowupobj->ref_app_id=$intAppId;
			
			$textfollowupobj->text=$param['followup'];
			$textfollowupobj->visibility="1";
			$textfollowupobj->save();
			}
			$session= Session::instance();
		$temp= $session->get('html'); 
		$files = new helper_Files();
		if($temp != "")
		{
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp);	
			
			$return = $files->savePdfFile($objHtml);
			$id=$return['id'];
		}
		else
		{			
			$id=$session->get('fileid');
		}
		$prescriptionfile=orm::factory("appointmentupload");
		$prescriptionfile->fileid_c=$id;
		$prescriptionfile->refappuploadappointmentsid_c=$appointment->id;
		$prescriptionfile->save();
		$file = new helper_Files();
				$return = $file->getFilePath($id);
		$prescriptionpath = ORM::factory('patientprescriptionsnapshot');
		$prescriptionpath->pdfpath_c=$return['abspath'];
		$prescriptionpath->refappointmentidforprescriptionsnapshots_c=$appointment->id;
		$prescriptionpath->save();
		$session->set('html', '');
		die;
	}
	catch (Exception $e) {
			throw new Exception($e);
		}
	}
		
	}
	public function action_closeorder()
	{
		$testid =$_POST['testid'];
		$orderid =$_GET['orderid'];
		$param=json_decode($_POST['params'], true);
		$my_date = date('y-m-d', strtotime($param['Date']));
		$patientid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
		$reportexists='newreport';
		$objfile = ORM::factory('patienttestreport')->where('refpatreportdiagnosticlaborderid_c','=',$orderid)->find();
		//var_dump($objfile->id);die;
		$objfile->refpatreporttestid_c = $_POST['testid'];
		
		$universaltracker = new helper_Universaltracker();
	//var_dump($param);die;
		foreach($param['parameters'] as $objparameter){			 
				if($objparameter['value']){
					if($param['parameter_units'][$objparameter['parameterid']] == '2'){				//Add new units or get unit id for other units.
						$unitsmastertable=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
						if($unitsmastertable->id){
							$param['parameter_units'][$objparameter['parameterid']]=$unitsmastertable->id;
						}
						else{
							$universaltracker->addNewUnit($_POST['otherunits'][$objparameter['parameterid']],$objparameter['parameterid']);
							$objunitsmaster=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
							$param['parameter_units'][$objparameter['parameterid']]=$objunitsmaster->id;
						}
					}
				}
				$objunitsmaster=ORM::factory('unitsmaster')->where('id','=',$param['parameter_units'][$objparameter['parameterid']])->find(); //store unit name in parameter list for patienttestreport table
				$param['parameters'][$objparameter['parameterid']]['unit']=$objunitsmaster->unitname_c;
		}
	//	$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
		$param=json_encode($param);
		/*$objfile->testparameters = $param;
		$objfile->fileid_c = $return['id'];
		$objfile->refpatientuserid_c=$patientid;
		$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
		$objfile->reportsummary_c = $reportSummary;
		//var_dump($objfile);
		$objfile->save();*/

		$param=json_decode($param,true);
		$data=array();
		foreach($param['parameters'] as $objparameter){			 
			if($objparameter['value']){
				$parameter=array();						//Create Array to Insert parameter details into patientparameter table
				//$testid=ORM::factory('testparameter')->where('id','=',$objparameter['parameterid'])->find();
				$testmaster=ORM::factory('testmaster')->where('id','=',$_POST['testid'])->find();
				if($testmaster->ispanel==1 || $objparameter['value']=='absent' || $objparameter['value']=='present' ){
					$parameter['parameterid']=$objparameter['parameterid'];
				}
				else{														//if parameter has multiple loinccode .
					$testparameter=ORM::factory('testparameter')->where('reftestid_c','=',$_POST['testid'])->find_all();
					$flag=0;	
					foreach($testparameter as $testpara){
						var_dump($testpara->id.'	'.$param['parameter_units'][$objparameter['parameterid']]);
						
						$parameterunit=ORM::factory('parameterunit')->where('refparameterid_c','=',$testpara->id)->where('refunitmasterid_c','=',$param['parameter_units'][$objparameter['parameterid']])->find();
						if($parameterunit->refparameterid_c){
							$parameter['parameterid']=$parameterunit->refparameterid_c;
							$flag=1;
							break;
						}
					}
					if($flag==0){						//if no combination found
						$parameter['parameterid']=$objparameter['parameterid'];
					}
				}
				
				// objparameter is having complete data for parameters
				// So following line is added for setting parameter Id 				
				$parameter['parameterid']=$objparameter['parameterid'];
				
				// Time stamp will have time along with date value.
				$currenttime = date("H:i:s");
				$parameterdate = $param['Date']." ".$currenttime;		
				
				$parameter['patientuserid']=$patientid;
				//$parameter['timestamp']=strtotime($param['Date']);
				$parameter['timestamp']=strtotime($parameterdate);
				$parameter['value']=$objparameter['value'];
				$parameter['patienttestreportid']=$objfile->id;
				$parameter['unit']=$param['parameter_units'][$objparameter['parameterid']];
				if(isset($objparameter['ref']))
				$parameter['reference'] = $objparameter['ref'];
				array_push($data,$parameter);
			}		
		}
		$tempobj=$universaltracker->saveTestParameterval($data,$reportexists);
		
		
		if(isset($_POST)){
			$orderid =$_GET['orderid'];
			$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
			$objorders->status_c = 'reportsuploaded';
			$objorders->referenceId_c =$_POST['referenceId'];
			$objorders->referenceBy_c =$_POST['referenceBy'];
			$objorders->sampleCollectionPlace_c =$_POST['samplePlace'];
			$objorders->sampleCollectionDate_c =date('y-m-d', strtotime($_POST['sampleDate']));
			$objorders->sampleId =$_POST['sampleId'];
			$objorders->preparedby_c =$_POST['preparedby'];
			var_dump($_POST);
			$objorders->saveRecord();
			
		}	
		die;
	}
	public function action_gettodaydate()
	{
		echo date('d M Y');die;
	}
	
	public function action_saveorderreports()
	{
		$param=json_decode($_POST['params'], true);
		$my_date = date('y-m-d', strtotime($param['Date']));
		$testid = $_POST['testid'];
		$orderid =$_GET['orderid'];
		$patientid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
		$session= Session::instance();
		$files = new helper_Files();
		
/*		$temp1='<HTML>
<body>
	<input type="hidden" id="orderid" value="'.$orderid.'"/>
	<div  style="position:relative;max-width:900px; width:100%;margin:0px auto 0px auto;" >	
		<div>
			<div style="padding:10px;font-weight: bold;width:30%;float:left;">
			IOH ID : 126</br>
			Name Of The Patient : Karan Kumar</br>
			Mobile No. : 888888888<br>
			Age/Gender : 54/<br>
			Reference Id : '.$orderid.'<br>
			Referred By : Self
			</div>
			<div style="padding:10px;font-weight: bold;width:40%;float:right;">Order Number : </br>
			Order Date : </br>
			Sample collection place : baner<br>
			Sample collection date : 09-07-2015<br>
			Sample Id :    45<br>
			<label for="Datetxt1" style="float:left;width:38%;">Test Date* :</label>
						10-09-2015
			</div>	
				 
		</div>
		
		<div>
		&nbsp;
		</div>
	</div>	

</body>
</HTML>';
$objHtml 	= new simple_html_dom();
			$objHtml->load($temp1);	
			
			$return = $files->savePdfFile($objHtml);
*/

$diagnosticlabsorder = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();
$pathology = ORM::factory('pathologist')->where('id','=',$diagnosticlabsorder->refdiaglabsorderspathologistsid_c)->find();
$header='/'.$pathology->header_c;
$footer='/'.$pathology->footer_c;
$signature='/'.$pathology->signature_c;
var_dump($header);
var_dump($_SERVER['DOCUMENT_ROOT']);
$pathname=$pathology->qualifieddoctorfirtsname_c;
$pathqualification=$pathology->qualifieddoctorqualification_c;
$user = ORM::factory('user')->where('id','=',$patientid)->find();
$username1 = $user->Firstname_c.' '.$user->lastname_c;
$gender = $user->gender_c;
$mobile = $user->mobileno1_c;
$iohid = $user->id;
$dob = $user->DOB_c;
$dobyear=date('Y', strtotime($dob));
$currentYear=date('Y');
$age=$currentYear-$dobyear;
$flag=0;

$parameters=$param['parameters'];
$referenceId=json_decode($_POST['referenceId'], true);
$referenceBy=json_decode($_POST['referenceBy'], true);
$samplePlace=json_decode($_POST['samplePlace'], true);
$sampleDate=json_decode($_POST['sampleDate'], true);
$sampleId=json_decode($_POST['sampleId'], true);
$preparedby=json_decode($_POST['preparedby'], true);
$reportSummary=json_decode($_POST['reportSummary'],true);
//$testfile = $_POST['testfile'];

$sampleDate2=date('y-m-d', strtotime($sampleDate));
//var_dump($_POST['sampleDate']);
//var_dump($sampleDate2);

//var_dump($_SERVER['DOCUMENT_ROOT']);
//foreach ($parameters as $parameter){
//var_dump($parameter['parametername']);
//die;
//}
//die;
$temp2 = '<HTML>
<Head>
<style>
	.ui-autocomplete 
{  margin-top: 0px !important;
					 top: 60px !important;
}
.ui-datepicker {
  width: 30% ! important;
}
.container{
	float:left;
	width:100%;
	padding-left: 10px;
	padding-top: 10px;
	border:1px solid;
	padding-bottom: 10px;
}
.parameternames{
	float:left;
	width:59%;
	text-align:left;
	margin-left:1% ! important;
}
.parametervalues{
	float:left;
	width:40%;
	text-align:left;
}
.regnformcontrol{
	width:100%;
}
.formelements{
margin-left:1% ! important;
}
</Style>
</Head>
<body>
	<input type="hidden" id="orderid" value="<?php echo $orderid; ?>"/>
	<div  style="max-width:900px; width:100%;margin:0px auto 0px auto;" >	
		<div style="width:100%;">
			<div style="width:100%;float:left;">
				<img style="width:100%;" src='.$_SERVER['DOCUMENT_ROOT'].$header.'>
				</div>
		</div>
		<div style="width:100%;">
			
			<div style="padding:10px;font-weight: bold;width:40%;float:left;">
			IOH ID  <label style="margin-left:22%">:  '.$iohid.'</label></br>
			Patient Name  <label style="margin-left:7.5%">:  '.$username1.'</label></br>
			Mobile No.<label style="margin-left:14.5%">:  '.$mobile.'</label><br>
			Age / Gender <label style="margin-left:8.5%">:  '.$age.' / '.$gender.'</label><br>
			Reference Id <label style="margin-left:9%">:  '.$referenceId.'</label><br>
			Referred By <label style="margin-left:10%">:  '.$_POST['referenceBy'].'</label>
			</div>
			<div style="padding:10px;font-weight: bold;width:40%;float:right;">
			Order Number <label style="margin-left:22.5%">:   '.$orderid.'</label></br>
			Order Date <label style="margin-left:29.5%">:  '.$my_date.'</label></br>
			Sample collection place <label style="margin-left:2%">:  '.$_POST['samplePlace'].'</label><br>
			Sample collection date <label style="margin-left:4.5%">:  '.$_POST['sampleDate'].'</label><br>
			Sample Id <label style="margin-left:32.5%">:  '.$sampleId.'</label><br>			
			</div>	
			<div style="width:10%;">
			&nbsp;
			</div>
			<hr>
		</div>
		<div  style="width:900px;">
			<div style="width:900px;">
				<div  class="parametervalues" style="width:45%;"><label style="line-height:15px;"> Parameter names</label></div>
				<div  class="parametervalues" style="width:20%;"><label style="line-height:15px;">Parameter values</label></div>
				<div class="parametervalues" style="width:15%;"><label style="line-height:15px;">Units</label></div> 
				<div class="parameternames" style="width:15%;"><label style="line-height:15px;">Reference Values</label></div>
			</div>
			
		</div></br></br>'; foreach ($parameters as $parameter) { 
		if($testid == $parameter["testid"]){
			$flag=1;
				$parameterid =    $parameter["parameterid"];
				$parametername =	$parameter["parametername"];
				$parametervalue =   $parameter["value"];
				$parameterunit =   $parameter["unit"];
				$parameterref =   $parameter["ref"];
				$parametertestid =   $parameter["testid"];
				$unitsmaster = ORM::factory('unitsmaster')->where('id','=',$parameterunit)->find();
				$unitname=$unitsmaster->unitname_c;
	$temp2 = $temp2.'<div id="content1" class="container" style="border:0; border-bottom:1px solid;">

			<!-- ngRepeat: parameter in test.parameters -->
			<div  class="ng-scope" ng-repeat="parameter in test.parameters">
				<div class="parameternames" style="width:45%;"><label for='.$parameterid.' style="line-height:15px;" class="ng-binding"> '.$parametername.'</label>
				</div>
				<div class="parametervalues" style="width:20%;">
					<div class="parameternames"style="width:15%;">
						'.$parametervalue.'
						
					</div>
					<div class="parametervalues"style="width:15%;">
						'.$unitname.'
					</div>
					
				</div>
				<div class="parameternames" style="width:15%;">&nbsp;</div>
				<div class="parametervalues" style="width:15%;">
						'.$parameterref.'
					</div>
					
			</div>
			</div><!-- end ngRepeat: parameter in test.parameters -->';
			}
		}
			$temp2 = $temp2.'<div >
			<div>
			&nbsp;
			</div>
			</br></br></br></br>
					<div style="float:left;width:80%;">
					Summary :  '.$_POST['reportSummary'].'
				<div/>
			<div style="width:100%;">
				</br></br></br>
				<div style="float:left;width:80%;">
				Prepared By : '.$_POST['preparedby'].'
				</div></br></br></br>
				<div style="float:right;width:30%;">
					<img  src='.$_SERVER['DOCUMENT_ROOT'].$signature.'>
				</div>
			</div>
		</br></br></br></br>
			<div style="width:100%%;">
				<div style="float:right;width:15%;">
				<b>Dr. '.$pathname.'</b>
				('.$pathqualification.')
				</div>
				</div>
			
		</div>
		<div style="width:100%;">
			<div style="width:100%;float:left;">
				<img style="width:100%;" src='.$_SERVER['DOCUMENT_ROOT'].$footer.'>
			</div>
		</div>
	</div>	

</body>

</HTML>';
		if($flag==1)
		{
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp2);	
			
			$return = $files->savePdfFile($objHtml);
			$reportexists='newreport';
			$objfile = new Model_Patienttestreport;
				
			$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
			$param=json_encode($param);
			$objfile->testparameters = $param;
			$objfile->fileid_c = $return['id'];
			$objfile->refpatientuserid_c=$patientid;
			$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
			$objfile->reportsummary_c = $reportSummary;
			//var_dump($objfile);die;
			$objfile->save();
		}
		//	var_dump($return['id']);
			//var_dump($return);die;
		//}
//$patienttestreportobj->fileid_c=$return['id'];
//$patienttestreportobj->save();
/*changed code by me*/			
// If the report is uploaded then request redirected to saveuploadedorder
// Request::current()->redirect("upload/saveuploadedorder");
// Create PDF report from the parameters entered on screen
// for the test
		//if($testfile==null || $testfile=="")
		//{
			/*if($temp != "")
			{
				$objHtml 	= new simple_html_dom();
				$objHtml->load($temp);	
			
				$return = $files->savePdfFile($objHtml);
				$id=$return['id'];
			}
			else
			{
				$id=$session->get($testid.'fileid');
			}*/			
		//}
		/*if($testfile!=null && $testfile !="")
		{
				// Upload Reports
				var_dump('Uploading Reports');
				$_POST['id']= $testid;
				$this->action_saveuploadedreports();
				
		}*/
		
		//$objfile->refpatreporttestid_c = $_POST['testid'];

	/*	$universaltracker = new helper_Universaltracker();
	//	var_dump($param);die;
		foreach($param['parameters'] as $objparameter){			 
				if($objparameter['value']){
					if($param['parameter_units'][$objparameter['parameterid']] == '2'){				//Add new units or get unit id for other units.
						$unitsmastertable=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
						if($unitsmastertable->id){
							$param['parameter_units'][$objparameter['parameterid']]=$unitsmastertable->id;
						}
						else{
							$universaltracker->addNewUnit($_POST['otherunits'][$objparameter['parameterid']],$objparameter['parameterid']);
							$objunitsmaster=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
							$param['parameter_units'][$objparameter['parameterid']]=$objunitsmaster->id;
						}
					}
				}
				$objunitsmaster=ORM::factory('unitsmaster')->where('id','=',$param['parameter_units'][$objparameter['parameterid']])->find(); //store unit name in parameter list for patienttestreport table
				$param['parameters'][$objparameter['parameterid']]['unit']=$objunitsmaster->unitname_c;
	

		/*$param=json_decode($param,true);
		$data=array();
		foreach($param['parameters'] as $objparameter){			 
			if($objparameter['value']){
				$parameter=array();						//Create Array to Insert parameter details into patientparameter table
				//$testid=ORM::factory('testparameter')->where('id','=',$objparameter['parameterid'])->find();
				$testmaster=ORM::factory('testmaster')->where('id','=',$_POST['testid'])->find();
				if($testmaster->ispanel==1 || $objparameter['value']=='absent' || $objparameter['value']=='present' ){
					$parameter['parameterid']=$objparameter['parameterid'];
				}
				else{														//if parameter has multiple loinccode .
					$testparameter=ORM::factory('testparameter')->where('reftestid_c','=',$_POST['testid'])->find_all();
					$flag=0;	
					foreach($testparameter as $testpara){
						var_dump($testpara->id.'	'.$param['parameter_units'][$objparameter['parameterid']]);
						
						$parameterunit=ORM::factory('parameterunit')->where('refparameterid_c','=',$testpara->id)->where('refunitmasterid_c','=',$param['parameter_units'][$objparameter['parameterid']])->find();
						if($parameterunit->refparameterid_c){
							$parameter['parameterid']=$parameterunit->refparameterid_c;
							$flag=1;
							break;
						}
					}
					if($flag==0){						//if no combination found
						$parameter['parameterid']=$objparameter['parameterid'];
					}
				}
				$parameter['patientuserid']=$patientid;
				$parameter['timestamp']=strtotime($param['Date']);
				$parameter['value']=$objparameter['value'];
				$parameter['patienttestreportid']=$objfile->id;
				$parameter['unit']=$param['parameter_units'][$objparameter['parameterid']];
				if(isset($objparameter['ref']))
				$parameter['reference'] = $objparameter['ref'];
				array_push($data,$parameter);
			}		
		}
		$tempobj=$universaltracker->saveTestParameterval($data,$reportexists);*/
		
		
		$objuser = Auth::instance()->get_user();
		$obj_pathologist=ORM::factory('pathologist')
			->where('refpathologistsuserid_c','=',$objuser->id)
			->find();

		$labname = $obj_pathologist->nameofcenter_c;
		$notification=  array();

		$notification['id']	=	$patientid;
		$notification['template']='pathologist_order_uploaded';
		$notification['sms']='true'; 
		$notification['orderId']=$orderid; 
		$notification['labname']=$labname;
		helper_notificationsender::sendnotification($notification);

		//$session->set($testid.'html', '');
		//$session->set($testid.'fileid', '');
		die;
	}
	
	public function action_previewtemplate()
	{	
		   $id = $_GET['id'];	
		   $content = View::factory('preview');	
		   $objvisit = ORM::factory('pathologist')->where('refpathologistsuserid_c','=', $id)->find();
		   $header = $objvisit->header_c;
		   $footer = $objvisit->footer_c;
		   $signature = $objvisit->signature_c;
		   $content->bind('header', $header);
		   $this->template->content = $content;
		   setcookie("header_image", $header, time() + (86400 * 30), "/");
           setcookie("signature_image", $signature, time() + (86400 * 30), "/");
           setcookie("footer_image", $footer, time() + (86400 * 30), "/");		   
	}
	
	public function action_previewicardtemplate()
	{	
	   $id =$_GET['id'];		
	   $content = View::factory('previewicard');
	   $objStaff = ORM::factory('staff')->where('refstaffuserid_c','=', $id)->find();
	  $header = $objStaff->icardheader_c;
		   $footer = $objStaff->icardfooter_c;
		   $reverseimage=$objStaff->reversesideimage_c;
	   
	   $content->bind('objStaff', $objStaff);
	   $this->template->content = $content;
	   setcookie("header_image", $header, time() + (86400 * 30), "/");
       setcookie("footer_image", $footer, time() + (86400 * 30), "/");
	   setcookie("reverse_image", $reverseimage, time() + (86400 * 30), "/");	   
	}
		
	public function action_savereports()
	{	
		//var_dump($_POST);
		//die;
		$param=json_decode($_POST['params'], true);
		
		if(isset($param['visit']))
		{
			if(is_array($param['visit']))
			{
				$param['visit']=json_encode($param['visit']);
				//var_dump($param['visit']);die;
			}
			
			$visit=json_decode($param['visit'],true);
			$result = count($visit);
			if($result==4)
			{
			$param['visit']=$visit[0];
			}
		}
		else
		{
			$visit[3]='';
		}

		$my_date = date('y-m-d', strtotime($param['Date']));
		$user=Auth::instance()->get_user()->id;
		$roleuser=ORM::factory('roleuser')->where('user_id','=',$user)->find_all();
		$setpatientidflag=0;
		if(count($roleuser)){
			foreach($roleuser as $singleuser){
				$role=ORM::factory('role')->where('id','=',$singleuser->role_id)->find()->name;
				if($role=='doctor'){
					$setpatientidflag=1;
				}
			}
		}
		if($setpatientidflag==1){
			$patientid=ORM::factory('appointment')->where('id','=',$visit[3])->find()->refappfromid_c;
		}
		else{
			$patientid=$user;
		}

		if(isset($param['incident']))
		{
			if(!is_numeric($param['incident']))
			{
				$objincident=ORM::factory('incident');
				$objincident->incidentsname_c=$param['incident'];
				$objincident->save();
			}
			else
			{
				$objincident = ORM::factory('incident')->where('id','=',$param['incident'])->find()->incidentsname_c;
				$param['incident']=$objincident;
			}
		}

		$session= Session::instance();
		$temp= $session->get('html'); 
		$files = new helper_Files();

		if($temp != "")
		{
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp);	
			
			$return = $files->savePdfFile($objHtml);
			$id=$return['id'];
		}
		else
		{
			
			$id=$session->get('fileid');
		}

		if(isset($_POST['pasttestreportid']))	//check report already created or not
		{
			$reportexists='oldreport';
			$pattestreportid=$_POST['pasttestreportid'];
			$objfile = ORM::factory('patienttestreport')->where('id','=',$pattestreportid)->find();
		}
		else
		{
			$reportexists='newreport';
			$session= Session::instance();
			$dicomfile= $session->get('reportid');
			if(!isset($dicomfile))
			{
			$objfile = new Model_Patienttestreport;
			}
			else
			{
				$objfile=ORM::factory('patienttestreport')->where('id','=',$dicomfile)->find();//only for dicom files
				unset($_SESSION['reportid']);
			}
		}
		
		if($_POST['testid']!='')
		{
			$objfile->refpatreporttestid_c = $_POST['testid'];
			
		}
		else
		{
			$objtestmaster=ORM::factory('testmaster');
			$objtestmaster->testname_c=$param['testname'];
			$objtestmaster->reftestsubcategoryid_c='2';
			$objtestmaster->save();
			$_POST['testid']=$objtestmaster->id;
			$objfile->refpatreporttestid_c = $_POST['testid'];
		}

		$universaltracker = new helper_Universaltracker();

		foreach($param['parameters'] as $objparameter){			 
				if($objparameter['value']){
					if($param['parameter_units'][$objparameter['parameterid']] == '2'){				//Add new units or get unit id for other units.
						$unitsmastertable=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
						if($unitsmastertable->id){
							$param['parameter_units'][$objparameter['parameterid']]=$unitsmastertable->id;
						}
						else{
							$universaltracker->addNewUnit($_POST['otherunits'][$objparameter['parameterid']],$objparameter['parameterid']);
							$objunitsmaster=ORM::factory('unitsmaster')->where('unitname_c','=',$_POST['otherunits'][$objparameter['parameterid']])->find();
							$param['parameter_units'][$objparameter['parameterid']]=$objunitsmaster->id;
						}
					}
				}
				$objunitsmaster=ORM::factory('unitsmaster')->where('id','=',$param['parameter_units'][$objparameter['parameterid']])->find(); //store unit name in parameter list for patienttestreport table
				$param['parameters'][$objparameter['parameterid']]['unit']=$objunitsmaster->unitname_c;
		}
		$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
		$objfile->refappointmentid_c=$visit[3];
		$param=json_encode($param);
		$objfile->testparameters = $param;
		$objfile->fileid_c = $id;
		$objfile->refpatientuserid_c=$patientid;
		$objfile->save();

		$param=json_decode($param,true);
		$data=array();
		foreach($param['parameters'] as $objparameter){			 
				if($objparameter['value']){
				$parameter=array();						//Create Array to Insert parameter details into patientparameter table
				//$testid=ORM::factory('testparameter')->where('id','=',$objparameter['parameterid'])->find();
				$testmaster=ORM::factory('testmaster')->where('id','=',$_POST['testid'])->find();
				if($testmaster->ispanel==1 || $objparameter['value']=='absent' || $objparameter['value']=='present' ){
					$parameter['parameterid']=$objparameter['parameterid'];
				}
				else{														//if parameter has multiple loinccode .
					$testparameter=ORM::factory('testparameter')->where('reftestid_c','=',$_POST['testid'])->find_all();
					$flag=0;	
					foreach($testparameter as $testpara){
						var_dump($testpara->id.'	'.$param['parameter_units'][$objparameter['parameterid']]);
						
						$parameterunit=ORM::factory('parameterunit')->where('refparameterid_c','=',$testpara->id)->where('refunitmasterid_c','=',$param['parameter_units'][$objparameter['parameterid']])->find();
						if($parameterunit->refparameterid_c){
							$parameter['parameterid']=$parameterunit->refparameterid_c;
							$flag=1;
							break;
						}
					}
					if($flag==0){						//if no combination found
						$parameter['parameterid']=$objparameter['parameterid'];
					}
				}
				$parameter['patientuserid']=$patientid;
				$parameter['timestamp']=strtotime($param['Date']);
				$parameter['value']=$objparameter['value'];
				$parameter['patienttestreportid']=$objfile->id;
				$parameter['unit']=$param['parameter_units'][$objparameter['parameterid']];
				array_push($data,$parameter);
			}		
		}
		//var_dump($data);
		$tempobj=$universaltracker->saveTestParameterval($data,$reportexists);

/*		$patienttestreports=$universaltracker->getReportParametervalues($objfile->id);
		if(count($patienttestreports)>0){	
			$array['PARAMETER']=array();
			foreach($patienttestreports as $patienttestreport){				//store patient-test-report testparameters
				$paradata['NAME']=$patienttestreport->parametername;
				$paradata['OBSERVEDVALUE']=$patienttestreport->value;
				$paradata['UNIT']=$patienttestreport->unitname;
				array_push($array['PARAMETER'],$paradata);				
			}
			$objpatienttestreport = ORM::factory('patienttestreport')->where('id','=',$objfile->id)->find();
			
		}
*/
		$session->set('html', '');
		
		die;
	}
	public function action_getparams()
	{
		$data=array();
		$temp['parametername']='Tag';
		$temp['id']=0;
		array_push($data,$temp);
		//$tempobj=ORM::factory('testmaster')->where('id','=',$_GET['testid'])->find()->testparameters;
		$universaltracker = new helper_Universaltracker();
		$tempobj=$universaltracker->getTestParameter($_GET['testid']);
		//var_dump($tempobj);die;
		if($tempobj)
		{	
			echo(json_encode($tempobj));die;
		}
		echo(json_encode($data)); die;
	}
	public function action_getallunits()
	{
		$data=array();
		$universaltracker = new helper_Universaltracker();
		$tempobj=$universaltracker->getAllUnits();
		//var_dump($tempobj);die;
		if($tempobj)
		{	
			echo(json_encode($tempobj));die;
		}
		echo(json_encode($data)); die;
	}
	public function action_getpatienttestreportdata()
	{
		$data=array();
		//$tempobj=ORM::factory('testmaster')->where('id','=',$_GET['testid'])->find()->testparameters;
		$universaltracker = new helper_Universaltracker();
		$tempobj=$universaltracker->getReportParametervalues($_GET['patienttestreportid']);
		//var_dump($tempobj);die;
		if($tempobj)
		{	
			echo(json_encode($tempobj));die;
		}
		echo(json_encode($data)); die;
	}

	public function action_cancelreports()
	{
		$session= Session::instance();
		$session->set('html', '');
		
		die;
	}
	
	public function action_savehistorynotes()
	{
		$session= Session::instance();
		$temp= $session->get('html'); 
		$files = new helper_Files();

		if($temp != "")
		{
			$objHtml 	= new simple_html_dom();
			$objHtml->load($temp);	
			$return = $files->savePdfFile($objHtml);
			$id=$return['id'];
			$session->set('html', '');
		}
		else
		{
			$id=$session->get('fileid');
			$session->set('fileid', '');
		}
		
		
		$object_user = new Model_User;
		$user = $object_user->get_user_info();

		$patientId = $_POST['patientid'];
		$doctor_object = new Model_Doctor;
		$doctor_id = $doctor_object->get_doctor_id($user['id']);

		$object_note = new Model_Doctornote();
		$object_note->save_historynote($doctor_id, $patientId, $id);
		die;
	}
	
	public function action_uploadradioreport()
	{	
		try
		{	
			//var_dump($_FILES);			
			$session= Session::instance();
			$session->set('fileid', "");	
			$testid = $_POST['testid'];
			$orderid =$_POST['orderid'];
			$patientid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
			$reportSummary=json_decode($_POST['reportSummary'],true);

			if ( !empty( $_FILES ) ) {
			//var_dump($_FILES["file"]["type"]); die;
			$tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
			$uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $_FILES[ 'file' ][ 'name' ];
			var_dump($_FILES["file"]["type"]);
			var_dump($tempPath);
			var_dump($uploadPath);
			if($_FILES["file"]["type"]!="application/pdf")
			{
				if($_FILES["file"]["type"]!="application/octet-stream")
				{
					if(isset($_POST['testid'])){  // id is test id
						$files = new helper_Files();
						$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
						
						$objfile = new Model_Patienttestreport;
						$objfile->refpatreporttestid_c = $_POST['testid'];
						//$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
						$objfile->fileid_c = $return['id'];
						$objfile->refpatientuserid_c=$patientid;
						$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
						$objfile->reportsummary_c = $reportSummary;
						//var_dump($objfile);
						$objfile->save();
					}
				}
				else//dicom
				{
					
					$files = new helper_Files();
					$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
					
					$dicomfile=ORM::factory("patienttestreport");
					$dicomfile->isdicom_c=1;
					$dicomfile->fileid_c = $return['id'];
					$dicomfile->refpatientuserid_c=$patientid;
					$dicomfile->refpatreportdiagnosticlaborderid_c = $orderid;
					$dicomfile->reportsummary_c = $reportSummary;
					$dicomfile->save();
									
					$session->set('reportid', $dicomfile->id);
					$dicomfileobj=ORM::factory("dicomfile");
					$dicomfileobj->fileid_c=$return['id'];
					$dicomfileobj->refreportid_c=$dicomfile->id;
					$dicomfileobj->save();
				
				}
			}
			else
			{			
				$files = new helper_Files();
				$return = $files->saveFileToSpecificFolder($_FILES["file"],"Documents");
				$session->set('fileid', $return['id']);	
				$objfile = new Model_Patienttestreport;
				$objfile->refpatreporttestid_c = $_POST['testid'];
				//$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
				$objfile->fileid_c = $return['id'];
				$objfile->refpatientuserid_c=$patientid;
				$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
				$objfile->reportsummary_c = $reportSummary;
				//var_dump($objfile);
				$objfile->save();
			}			
				$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
				$objorders->status_c = 'reportsuploaded';
				$objorders->referenceId_c =$_POST['referenceId'];
				$objorders->referenceBy_c =$_POST['referenceBy'];
				$objorders->sampleCollectionPlace_c =$_POST['samplePlace'];
				$objorders->sampleCollectionDate_c =date('y-m-d', strtotime($_POST['sampleDate']));
				$objorders->sampleId =$_POST['sampleId'];
				$objorders->preparedby_c =$_POST['preparedby'];
				var_dump($_POST);
				$objorders->saveRecord();
				echo 'Files Uploaded';
				return;
		}
		else {echo 'No files';}
		die;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
}
?>
