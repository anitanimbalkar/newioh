<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cradioreportupload extends Controller {
		public function action_uploadradioreport()
{	

		//var_dump($_FILES);			
			$session= Session::instance();
			$session->set('fileid', "");	
			$testid = $_POST['testid'];
			$orderid =$_POST['orderid'];
			$patientid = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c','=',$orderid)->find()->customeruserid_c;
			//$reportSummary=json_decode($_POST['reportSummary'],true);
			$redirect = "/ayushman/application/views/vuser/vpatient/vradiologistorderupload.php?success";
			
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
						$return = $files->saveFileToSpecificFolder($_FILES[ 'file' ],"Documents");
						
						$objfile = new Model_Patienttestreport;
						$objfile->refpatreporttestid_c = $_POST['testid'];
						//$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
						$objfile->fileid_c = $return['id'];
						$objfile->refpatientuserid_c=$patientid;
						$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
						//$objfile->reportsummary_c = $reportSummary;
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
					$dicomfile->refpatreporttestid_c = $_POST['testid'];
					$dicomfile->refpatreportdiagnosticlaborderid_c = $orderid;
					//$dicomfile->reportsummary_c = $reportSummary;
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
				$return = $files->saveFileToSpecificFolder($_FILES[ 'file' ],"Documents");
				$session->set('fileid', $return['id']);	
				$objfile = new Model_Patienttestreport;
				$objfile->refpatreporttestid_c = $_POST['testid'];
				//$objfile->dateoftest_c = $my_date;					//Insert report details into patienttestreport
				$objfile->fileid_c = $return['id'];
				$objfile->refpatientuserid_c=$patientid;
				$objfile->refpatreportdiagnosticlaborderid_c = $orderid;
				//$objfile->reportsummary_c = $reportSummary;
				//var_dump($objfile);
				$objfile->save();
			}	
		header('Location: '.$redirect); die;	
	}
	
		else {echo 'No files';}
			return(true);
			
			
}
}
?>