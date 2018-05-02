<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cradiologistdashboard extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{	
		try
		{	
			$objUser = Auth::instance()->get_user();
			$content = View::factory('vuser/vradiologist/vradiologistdashboard');
			$urole = "radiologist";
			$breadcrumb = "Home>>";
			$userid = $objUser->id;
			$objPathologist = ORM::factory('pathologist')
							->where('refpathologistsuserid_c','=',$userid)
							->mustFind();
			$pathologistId = $objPathologist->id;
			$userName = $objUser->Firstname_c;
			$content->bind('userid', $userid);
			$content->bind('pathologistid', $pathologistId);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $objUser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_reports()
	{
		try{
			$testid = $_GET['testid'];
			$orderid =$_GET['orderid'];
			$content	= View::factory('vuser/vpatient/vradiologistreport');
			$content->bind('testid', $testid);
			$content->bind('orderid', $orderid);
			$this->template->content= $content;
		
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	public function action_saveuploadedreport()
	{
				//var_dump($_POST);die;
			$orderid =$_GET['orderid'];
			$objorders = ORM::factory('diagnosticlabsorder')->where('id','=',$orderid)->find();	
				$objorders->status_c = 'reportsuploaded';
				$objorders->referenceId_c =$_GET['referenceId'];
				$objorders->referenceBy_c =$_GET['referenceBy'];
				$objorders->sampleCollectionPlace_c =$_GET['samplePlace'];
				$objorders->sampleCollectionDate_c =date('y-m-d', strtotime($_GET['sampleDate']));
				$objorders->sampleId =$_GET['sampleId'];
				$objorders->preparedby_c =$_GET['preparedby'];
			
				$objorders->saveRecord();
				echo 'Files Uploaded';
				return;
	}
	public function action_deleterecord()
	{
		$orderid =$_GET['orderid'];
			$objOrm = ORM::factory('patienttestreport')->where('refpatreportdiagnosticlaborderid_c','=',$orderid);
			
				foreach ($objOrm->find_all() as $objOrm){
					$objOrm->delete();
				}			
			
	}
	
}