<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorinstruction extends Controller {

public function action_docinstruction() {
	
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user)
		Request::current()->redirect('cuser/login');
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();

	$whereclause = '[refdoctorsid_c,=,'.$obj_user->id.']';
	$columns = 'followupinstr_c,id,refdoctorsid_c,createdon_c';
	$groupby = "";
	
	$page = "1"; 
	$limit = "100"; 
	$sidx = "createdon_c"; 
	$sord = 'desc';
	
	$table = 'doctorfollowup';
	
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
							
			array_push($response,$temp);			
		}
		$i++;
	}
	echo(json_encode($response));
	die;		
}
	
public function action_deleteinstruction(){
	$objuser = Auth::instance()->get_user();
	if (!$objuser)
		Request::current()->redirect('cuser/login');
	$user_id = $objuser->id;	
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$userid = $obj_user->id;	
	$instructionID=$_GET['instructionID'];
	$instructionDelete = ORM::factory('doctorfollowup')->where('id','=',$instructionID)->where( 'refdoctorsid_c','=',$userid)->find();
	if($instructionDelete)
		$instructionDelete->delete();
}
public function action_saveinstruction(){
	try{
			$objuser = Auth::instance()->get_user();
			if (!$objuser)
				Request::current()->redirect('cuser/login');
			$user_id = $objuser->id;	
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
			$userid = $obj_user->id;	
			$obj_docinstruction=ORM::factory('doctorfollowup')->where( 'refdoctorsid_c','=',$userid)->find_all();
					
			$obj_user = Auth::instance()->get_user();
			$userid = $obj_user->id;
			$obj_docinstruction=ORM::factory('doctorfollowup');
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$obj_docinstruction->followupinstr_c=$_GET['instruction'];
			$obj_docinstruction->refdoctorsid_c =$obj_user->id;
			$obj_docinstruction->createdon_c = date('Y-m-d g:i:s a');
			$obj_docinstruction->createdby_c = $userid;
			$obj_docinstruction->editedon_c = date('Y-m-d g:i:s a');
			$obj_docinstruction->editedby_c = $userid;
			$obj_docinstruction->save();
			$returnArray['found'] = 'No';
			echo(json_encode($returnArray));
			die;
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
}