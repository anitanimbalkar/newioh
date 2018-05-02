<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Corderservices extends Controller {


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



function action_orderservices()
{


		$patid = $_GET["patientsid"];
		$wardid = $_GET["wardid"];
		$objAllservices = ORM::factory('catalog')->where("pathologistid","=",$wardid)->mustFindAll();
		$arrAllservices = array();
		foreach($objAllservices as $objservices)
		{
			$arrAllservices[$objservices->id] = $objservices->testname;
		}
		$result= array();
		$result=$objAllservices;
		var_dump($result);die;
		echo(json_encode($result)); die;

}


}