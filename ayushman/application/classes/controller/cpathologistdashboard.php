<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpathologistdashboard extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{	
		try
		{	
			$objUser = Auth::instance()->get_user();
			$content = View::factory('vuser/vpathologist/vpathologistdashboard');
			$urole = "pathologist";
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
			//$testid = $_GET['testid'];
			$orderid =$_GET['orderid'];
			$content	= View::factory('vuser/vpathologist/vpathreportupload');
			//$content->bind('testid', $testid);
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
	
}