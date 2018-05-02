<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Chospitaladmin extends Controller  {

	

	public function action_suspendServiceProvider(){
		
		$userid=$_GET['userid'];
		$obj_user 	= ORM::factory('user')->where('id','=',$userid)->find();	
		$obj_user->activationstatus_c='inactive';
		$obj_user->update();
		
	}
	
	public function action_suspendWard(){
		
		$wardid=$_GET['wardid'];
		$obj_ward 	= ORM::factory('wardbeddetail')->where('id','=',$wardid)->find();	
		$obj_ward->active_c=0;
		$obj_ward->save();
		
	}
	
	public function action_activeWard(){    
		
		$wardid=$_GET['wardid'];
		$obj_ward 	= ORM::factory('wardbeddetail')->where('id','=',$wardid)->find();	
		$obj_ward->active_c=1;
		$obj_ward->save();
		
	}

	public function action_activateServiceProvider(){
		
		$userid=$_GET['userid'];
		$obj_user 	= ORM::factory('user')->where('id','=',$userid)->find();	
		$obj_user->activationstatus_c='active';
		$obj_user->update();
		
	}

	public function action_wardNames(){
		
		$user = Auth::instance()->get_user();
		$userid=$user->id;
		$obj_hospital=ORM::factory('hospital')->where('refuserid_c','=',$userid)->find();
		$hospitalid=$obj_hospital->id;
		$wardlist=array();
		$wardarray=array();
		$objwardlist = ORM::factory('wardbedroomdetail')->where('hospitalid','=',$hospitalid)->group_by('wardname')->find_all();
		foreach ($objwardlist as $wardvalue)
		  {
	
				$wardlist['name']=$wardvalue->wardname;
				$wardlist['id']=$wardvalue->warduserid;
				
				array_push($wardarray, $wardlist);

		  }										
		   //var_dump($wardarray);
		//return $wardarray;
		echo(json_encode($wardarray));die;

	}
	
	public function action_addWard(){
		
		$user = Auth::instance()->get_user();
		$userid=$user->id;
		$obj_hospital=ORM::factory('hospital')->where('refuserid_c','=',$userid)->find();
		$hospitalid=$obj_hospital->id;
		$wardId=$_GET['id'];
		$room=$_GET['room'];
		$bed=$_GET['bed'];
		$obj_ward 	= ORM::factory('wardbeddetail')->where('refhospitalid_c','=',$hospitalid )->where('refwarduserid_c','=',$wardId )->where( 'roomnumber_c','=',$room)->where( 'bednumber_c','=',$bed)->find_all();
		if(count($obj_ward) != 0 ){
			$returnArray = array();
			$returnArray['found'] = 'yes';
			//var_dump($returnArray);die;
			echo(json_encode($returnArray));die;
			
		}
		else{	
			$obj_ward 	= ORM::factory('wardbeddetail');
			$obj_ward->refhospitalid_c=$hospitalid;
			$obj_ward->refwarduserid_c=$wardId;
			$obj_ward->roomnumber_c=$room;
			$obj_ward->bednumber_c=$bed;
			$obj_ward->active_c=1;
			$obj_ward->createdby_c=$userid;
			$obj_ward->save();
			$returnArray['found'] = 'No';
			//var_dump($returnArray);die;
			echo(json_encode($returnArray));die;
		}
	}	
	
	public function action_updateWard(){
		
		$user = Auth::instance()->get_user();
		$userid=$user->id;
		$obj_hospital=ORM::factory('hospital')->where('refuserid_c','=',$userid)->find();
		$hospitalid=$obj_hospital->id;
		$wardId=$_GET['wardId'];
		$wardNameId=$_GET['wardName'];
		$room=$_GET['room'];
		$bed=$_GET['bed'];
		$obj_ward 	= ORM::factory('wardbeddetail')->where('refhospitalid_c','=',$hospitalid )->where('refwarduserid_c','=',$wardNameId )->where( 'roomnumber_c','=',$room)->where( 'bednumber_c','=',$bed)->find_all();
		if(count($obj_ward) != 0 ){
			$returnArray = array();
			$returnArray['found'] = 'yes';
			//var_dump($returnArray);die;
			echo(json_encode($returnArray));die;
			
		}
		else{	
			$obj_ward 	= ORM::factory('wardbeddetail')->where('id','=',$wardId )->find();
			//$obj_ward->refhospitalid_c=$hospitalid;
			$obj_ward->refwarduserid_c=$wardNameId;
			$obj_ward->roomnumber_c=$room;
			$obj_ward->bednumber_c=$bed;
			$obj_ward->editedon_c=date('Y-m-d g:i:s a');
			$obj_ward->editedby_c=$userid;
			$obj_ward->save();
			$returnArray['found'] = 'No';
			//var_dump($returnArray);die;
			echo(json_encode($returnArray));die;
		}
	}	
	public function action_wardBed(){
		
	$obj_user = Auth::instance()->get_user();
	$userid = $obj_user->id;
	$obj_hospital=ORM::factory('hospital')->where('refuserid_c','=',$userid)->find();
	$hospitalid=$obj_hospital->id;
	$obj_ward 	= ORM::factory('wardbedroomdetail')->where('hospitalid','=',$hospitalid )->find_all();
	$whereclause = '[hospitalid,=,'.$hospitalid.']';
	
	$columns = 'hospitalid,warduserid,statusflag,wardrecordid,wardname,roomno,bednumber';
	
	$groupby = "";
	
	$page = "1"; 
	$limit = "15"; 
	$sidx = "wardname"; 
	$sord = 'desc';
	
	$table = 'wardbedroomdetail';
	
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
	
public function action_editWard()
{
	$wardid=$_GET['wardid'];
	
	$obj_ward 	= ORM::factory('wardbedroomdetail')->where('wardrecordid','=',$wardid )->find()->as_array();
	
	//var_dump($obj_ward);
	echo(json_encode($obj_ward));die;

}	
	
public function action_setFavourite(){
		$user = Auth::instance()->get_user();
		$userid=$user->id;
		$obj_hospital = ORM::factory('hospital')->where('refuserid_c','=',$userid)->find_all();
		$hospitalid=$obj_hospital->id;
		$obj_doctor = ORM::factory('doctor')->where('refhospitalid_c','=',$hospitalid)->find_all();
		//var_dump($obj_doctor);
		$obj_path = ORM::factory('pathologist')->where('refhospitalid_c','=',$hospitalid)->find();
			//	var_dump($obj_path);

		$obj_favpath = ORM::factory('favoritepathologistsbydoctor');
		foreach($obj_doctor as $doctor){
			foreach($obj_path as $pathologist)
			{
				var_dump("hello");
				$obj_favpath->reffavpathdoctorsid_c = $doctor->id;
				$obj_favpath->reffavpathpathologistsid_c = $pathologist->id;
				$obj_favpath->save();
			}
		}
		//$obj_chemist = ORM::factory('chemist')->where('refhospitalid_c','=',$userid)->find();
		//$obj_staff = ORM::factory('staff')->where('refhospitalid_c','=',$userid)->find();
		
	}	
}