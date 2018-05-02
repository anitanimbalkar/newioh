<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdisplayreports extends Controller_Ctemplatewithmenu  {

	public function action_view(){		
		$obj_user 	= Auth::instance()->get_user();
		$content 	= View::factory('vuser/vpathologist/vdisplayreports');
		$orderid 	= $_GET["orderid"];
		$testid 	= $_GET["testid"];

		$objTestReports = new Model_Patienttestreport;
		$arrObjTestReports = $objTestReports->where('refpatreportdiagnosticlaborderid_c','=',$orderid)->where('refpatreporttestid_c','=',$testid)->mustFindAll()->as_array();
		$arrTestReports = array();
		foreach($arrObjTestReports as $objTestReport){
			array_push($arrTestReports,'<iframe onload="setwidth(this);" src="/'.$objTestReport->filepath_c.'" style="width:1024px; height:768px; padding:10px;"></iframe>');
		}
		$content->bind('arrTestReports', $arrTestReports);
		$this->template->content = $content;
	}
}
