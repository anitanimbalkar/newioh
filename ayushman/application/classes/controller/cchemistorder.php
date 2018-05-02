<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');

class Controller_Cchemistorder extends Controller_Ctemplatewithmenu {

	public function action_removemedicine()
	{
		try{
			$orderid = $_GET['orderid'];
			$patid = $_GET['patid'];
			$medid = $_GET['medid'];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			if($medid != "")
			{
			$objtest = ORM::factory('medicineorderdetail')->where('reforderid_c','=',$orderid)
												   ->where('refdrugid_c','=',$medid)
												   ->find();
					
					$objtest->save();
				
			}
			die();
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_editorder()
	{	$i=0;
			$requestdate = $_GET["date"];
			$medicines=json_decode($_GET['medicine']);
			$orderid = $_GET["orderid"];
			$patid = $_GET["patid"];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			$objtestorder = ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();
				$objtestorder->requestdeliverydate_c=date('Y-m-d',strtotime($requestdate));
				$objtestorder->status_c = 'edited'; 
				$objtestorder->update();
 var_dump($medicines);
				$medid=$medicines[0];
			foreach ($medicines as $order) {
				
				$objtest = ORM::factory('medicineorderdetail');
					
					$objtest->refdrugid_c= $medicines[$i][0];
					$objtest->reforderid_c= $orderid;
					$objtest->orderquantity_c= $medicines[$i][1];
					//$objtest->status_c= "edited";
					$objtest->save();
					$i++;
				}
				echo $objtestorder;
					die();
	}

	public function action_addmedicineusingorderid()
	{

			$medid = $_GET["medid"];
			$patid = $_GET["patid"];
			$orderid = $_GET["orderid"];
			$objUser = Auth::instance()->get_user();
			$userId = $objUser->id;
			$objpatient = ORM::factory('patient')->where('id','=',$patid)->find();
			$patientid = $objpatient->repatientsuserid_c;
			
			$objtest = ORM::factory('medicineorderdetail');
					
					$objtest->refdrugid_c= $medid;
					$objtest->reforderid_c= $orderid;
					//$objtest->customeruserid_c= $patientid;
					$objtest->save();
					die();

	}

public function action_selectmedicine()
	{
		$where="";
		$this->displaytest($where);
	}

	public function displaytest($where)
	{
		try
		{
			$patid = $_GET["patid"];
			$orderid = $_GET["orderid"];
			$objUser = Auth::instance()->get_user();
			$userid = $objUser->id;
				
				$viewname = 'vselectmedicine';
				$viewpath ='vuser/vchemist/'.$viewname;
				$content = View::factory($viewpath);
				$content->bind('userid', $userid);
				// $content->bind('number',$number);
				$content->bind('where',$where);
				if($where!="")
					$whereclause = "[DrugName_c,like,$where]";
				else
				 	$whereclause="";
				$content->bind('whereclause',$whereclause);
				$Objtestcategorymaster = ORM::factory('drugmaster');
						$content->bind('patid',$patid);
				$content->bind('orderid',$orderid);
				$this->template->content = $content;
				// $this->template->user =  $objUser->Firstname_c;
				// $this->template->urole = $urole;
			
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}

	public function action_getmedicinesusingorderid()
	{
		$orderid = $_GET['orderid'];
		$patid = $_GET['patid'];

		$i = 0;
		$drugs = array();
		$obj_prescriptiondetails=ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();
		
			$drugdetail = ORM::factory('medicineorderdetail')->where('reforderid_c','=',$orderid)->find_all();
			$drugs[$i] = array();
			foreach($drugdetail as $prescriptiondetail)
		{
			$drugmasters = ORM::factory('drugmaster')->where('id','=',$prescriptiondetail->refdrugid_c)->find();
			$drugs[$i]["id"] = $drugmasters->id;
			$drugs[$i]["drugname"] = $drugmasters->DrugName_c." - ";
			$drugs[$i]["qty"] = $prescriptiondetail->orderquantity_c;

			$i = $i + 1;
		}
		die(json_encode($drugs));
	}



}
?>
