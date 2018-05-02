<? php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');
class Controller_Uploadradio extends Controller {
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