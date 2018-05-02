<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctordrug extends Controller {
public function action_savemedicine(){
	try{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;	
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$obj_docDrug=ORM::factory('doctordrug')->where('refdrugid_c','=',$_GET['medId'] )->where( 'refdoctorsid_c','=',$obj_user)->find_all();
			if(count($obj_docDrug) != 0 ){
				$returnArray = array();
				$returnArray['found'] = 'yes';
				echo(json_encode($returnArray));die;
				
			}else{
					
					$obj_user = Auth::instance()->get_user();
					$userid = $obj_user->id;
					$obj_docDrug=ORM::factory('doctordrug');
					$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
					$obj_docDrug->refdrugid_c=$_GET['medId'];
					$obj_docDrug->refdoctorsid_c =$obj_user->id;
					$obj_docDrug->dosage_c = $_GET['medDosage'];
					$obj_docDrug->frequency_c = $_GET['medFrequency'];
					$obj_docDrug->days_c = $_GET['medDays'];
					$obj_docDrug->instruction_c = $_GET['medInstruction'];
					$obj_docDrug->createdon_c = date('Y-m-d g:i:s a');
					$obj_docDrug->createdby_c = $userid;
					$obj_docDrug->editedon_c = date('Y-m-d g:i:s a');
					$obj_docDrug->editedby_c = $userid;
					$obj_docDrug->save();
					$returnArray['found'] = 'No';
					echo(json_encode($returnArray));die;
					
			}

		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}

public function action_saveconsultationmedicine(){
	try{
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;	
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$obj_docDrug=ORM::factory('doctordrug')->where('refdrugid_c','=',$_GET['medId'] )->where( 'refdoctorsid_c','=',$obj_user)->find_all();
			if(count($obj_docDrug) != 0 ){
				$returnArray = array();
				$returnArray['found'] = 'yes';
				echo(json_encode($returnArray));die;
				
			}
			else{
				$obj_user = Auth::instance()->get_user();
				$userid = $obj_user->id;
				$obj_docDrug=ORM::factory('doctordrug');
				$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
				$obj_docDrug->refdrugid_c=$_GET['medId'];
				$obj_docDrug->refdoctorsid_c =$obj_user->id;
				$obj_docDrug->dosage_c = $_GET['dosage'];
				$obj_docDrug->frequency_c = $_GET['frequency'];
				$obj_docDrug->days_c = $_GET['days'];
				$obj_docDrug->instruction_c = $_GET['instructions'];
				$obj_docDrug->createdon_c = date('Y-m-d g:i:s a');
				$obj_docDrug->createdby_c = $userid;
				$obj_docDrug->editedon_c = date('Y-m-d g:i:s a');
				$obj_docDrug->editedby_c = $userid;
				$obj_docDrug->save();
				$returnArray['found'] = 'No';
				echo(json_encode($returnArray));die;
			}
		}		
		catch(Exception $e){
			throw new Exception($e);
		}
	}	
	
public function action_docMedicines() {
	
	$obj_user = Auth::instance()->get_user();
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();

	$whereclause = '[doctorid,=,'.$obj_user->id.']';
	
	$columns = 'doctordrugsid,drugname,dosage,frequency,days,instruction,createdon';
	//echo $columns;
	//$whereclause = $_GET["whereclause"];
	$groupby = "";
	
	$page = "1"; 
	$limit = "100"; 
	$sidx = "createdon"; 
	$sord = 'desc';
	
	$table = 'doctordrugdetail';
	
	$jqgriddata=new Model_xjqgridgetdata;
	$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
	
	$header=$result[0];
	$response=array();
	$temp=array();
	$i=0;
	foreach($result as $res)
	{
		if($i>0)
		{
			$temp[$header[0]]=$res[0];
			$temp[$header[1]]=$res[1];
			$temp[$header[2]]=$res[2];
			$temp[$header[3]]=$res[3];
			$temp[$header[4]]=$res[4];
			$temp[$header[5]]=$res[5];
			$temp[$header[6]]=$res[6];
							
			array_push($response,$temp);
			
		}
		$i++;
	}
	
	echo(json_encode($response));die;
	

		
}
	
public function action_deletemedicine(){
	
	if(isset($_GET['medicineID'])){
	$obj_user = Auth::instance()->get_user();
	$userid = $obj_user->id;	
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
	$medicineID=$_GET['medicineID'];
	$medicineDelete = ORM::factory('doctordrug')->where('id','=',$medicineID)->where( 'refdoctorsid_c','=',$obj_user)->find();
	$medicineDelete->delete();
	}
}
	
	public function action_editMedicine(){
		if(isset($_GET['medicineID'])){
		$medicineID=(int)$_GET['medicineID'];
		//var_dump($medicineID);die;
		$medicine = ORM::factory('doctordrug')->where('id','=',$medicineID)->find()->as_array();
		//var_dump($medicine);die;
		echo(json_encode($medicine));die;		
	}
  }
}
