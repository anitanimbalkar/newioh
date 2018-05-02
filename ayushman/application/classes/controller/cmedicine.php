<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cmedicine extends Controller {

	public function action_getmedicinesusingorderid()
	{
		$orderid = $_GET['orderid'];
		$i = 0;
		$drugs = array();
		$obj_prescriptiondetails=ORM::factory('prescriptiondetail')->where('refchemistordersid_c','=',$orderid)->find_all();
		foreach($obj_prescriptiondetails as $prescriptiondetail)
		{
			$drugs[$i] = array();
			$drugmasters = ORM::factory('drugmaster')->where('id','=',$prescriptiondetail->refpdetailsdrugid_c)->find();
			$drugs[$i]["id"] = $drugmasters->id;
			$drugs[$i]["drugname"] = $drugmasters->DrugName_c." - ".$prescriptiondetail->drugtype_c." - ".$prescriptiondetail->quantity_c." - ".$prescriptiondetail->dosage_c;
			$i = $i + 1;
		}
	
		die(json_encode($drugs));
	}
	public function action_downloadprescription()
	{
		$orderid = $_GET['orderid'];
		$data=array();
		$obj_chemistmedicineorders=ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();	

		$obj_prescriptiondetails=ORM::factory('prescriptiondetail')->where('refchemistordersid_c','=',$orderid)->find();

		$obj_prescription=ORM::factory('prescription')->where('id','=',$obj_prescriptiondetails->refpdetailsprescriptionsid_c)->find();
		$obj_appointment=ORM::factory('appointment')->where('id','=',$obj_prescription->refprescriptionsappoitmentid_c)->find();
		if($obj_chemistmedicineorders->status_c=='accepted' && $obj_appointment->prescriptionfileid_c!=''){
			$data['flag']='show';
		}
		else{
			$data['flag']='hide';
		}		
		$obj_file=ORM::factory('file')->where('id','=',$obj_appointment->prescriptionfileid_c)->find();	
		$data['filepath']='/ayushman/files/Documents/'.$obj_file->filename_c;
		die(json_encode($data));
	}
	public function action_getmedicineusingappid()
	{

		$appid = $_GET['appid'];
		$objprescriptions = ORM::factory('prescription')->where('refprescriptionsappoitmentid_c','=',$appid)->find_all();
		$i = 0;
		$drugs = array();
		foreach($objprescriptions as $prescription)
		{
			$obj_prescriptiondetails=ORM::factory('prescriptiondetail')->where('refpdetailsprescriptionsid_c','=',$prescription->id)->find_all();
			foreach($obj_prescriptiondetails as $prescriptiondetail)
			{
				$drugs[$i] = array();
				$drugmasters = ORM::factory('drugmaster')->where('id','=',$prescriptiondetail->refpdetailsdrugid_c)->find();
				$drugs[$i]["id"] = $drugmasters->id;
				$drugs[$i]["drugname"] = $drugmasters->DrugName_c." - ".$prescriptiondetail->drugtype_c." - ".$prescriptiondetail->quantity_c." - ".$prescriptiondetail->dosage_c;
				$i = $i + 1;
			}
		}
		die(json_encode($drugs));
		
		
		
		
		
	}
}