<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cipdwardpatient extends Controller_Ctemplatewithmenu {

	public function action_orderservices(){
		try{

			//$patid = (int)$_GET["patientsid"];
			$wardid = (int)$_GET["wardid"];
			$pathtests=ORM::factory('catalog')->where('pathologistid','=',$wardid)->find_all();
		
			$results = array();
			$order= array();
			foreach($pathtests as $pathtest){
				
				$result['id'] = $pathtest->id;
				$result['testname'] = $pathtest->testname;
				$result['rate'] = $pathtest->rate;
				array_push($order, $result);
				$response['orderservices'] = $order;
			}

	echo(json_encode($response));die;
		
	}
			
		catch(Exception $e){throw new Exception($e);}
	}

	
	public function action_admittedpatients(){
		try{

			$template = array();
			$user = Auth::instance()->get_user();
			$userid=$user->id;
			//var_dump($userid);die;
			$docobj=ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$docid=$docobj->refhospitalid_c;
		
		$whereclause = '[status_c,=,admitted][hospitalid,=,'.$docid.']';
		$columns = 'onlypatientname,refid,admitdate_c,status_c,wardname,patientsid,wardid';
		$groupby = "";
		
		$page = "1"; 
        $limit = "15"; 
		$sidx = "onlypatientname"; 
		$sord = 'asc'; 	
		
			$table = 'wardpatientdetail';
			
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			$header=$result[0];
			$patients=array();
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
					array_push($patients,$temp);
				
				}
				$i++;
					$response['detail'] = $patients;

			}
			
			echo(json_encode($response));die;
		
	}
			
				
		catch(Exception $e){throw new Exception($e);}
	}


	

}