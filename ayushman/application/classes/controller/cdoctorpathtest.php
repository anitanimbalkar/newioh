<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdoctorpathtest extends Controller {

public function action_searchtest()
{
	// exclude tests that were defined under IPD category		
	$_query1 = "select id as id,testname_c as value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '".$_GET['term']."%'";
	$_query2 = "select id as id,testname_c as value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '%".$_GET['term']."%' limit 15";
	$query = "$_query1 union $_query2";
	$result = Db::query(Database::SELECT, $query)
		 ->execute()
		  ->as_array();
	$this->response->body(json_encode($result));
}
public function action_getTest() 
{	
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user)
		Request::current()->redirect('cuser/login');
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();

	$whereclause = '[doctorsid,=,'.$obj_user->id.']';
	$columns = 'testId,testname,doctorsid';
	$groupby = "";
	
	$page = "1"; 
	$limit = "100"; 
	$sidx = "createdon_c"; 
	$sord = 'desc';
	
	$table = 'doctorpersonalizedtest';
	
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
	
public function action_deletetest(){
	$objuser = Auth::instance()->get_user();
	if (!$objuser)
		Request::current()->redirect('cuser/login');
	$user_id = $objuser->id;	
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$userid = $obj_user->id;	
	$testId=$_GET['testId'];
	$doctest_obj = ORM::factory('doctortest')
					->where('reftestid_c','=',$testId)
					->where( 'refdoctorsid_c','=',$userid)
					->find();
	if($doctest_obj)
		$doctest_obj->delete();
}
public function action_savetest(){
	try{
			$objuser = Auth::instance()->get_user();
			if (!$objuser)
				Request::current()->redirect('cuser/login');
			$user_id = $objuser->id;	
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
			$userid = $obj_user->id;	
			$obj_doctest=ORM::factory('doctortest')
						->where( 'refdoctorsid_c','=',$userid)
						->where( 'reftestid_c','=',$_GET['testId'])
						->find();					
			If($obj_doctest->id == null)
			{
				$obj_doctest->refdoctorsid_c= $userid;
				$obj_doctest->reftestid_c= $_GET['testId'];				
				$obj_doctest->save();
				$returnArray['found'] = 'No';				
			}
			else
			{
				$returnArray['found'] = 'yes';				
			}
			echo(json_encode($returnArray));
			die;
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}

public function action_personTests()
	{	$obj_user = Auth::instance()->get_user();
		$userid = $obj_user->id;	
		$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
		$_query1 = " select testId AS id,testname AS value from doctorpersonalizedtests where testname like '".$_GET['term']."%' and doctorsid=".$obj_user;
		$_query2 = " select testId AS id,testname AS value from doctorpersonalizedtests where testname like '%".$_GET['term']."%' and doctorsid=".$obj_user." limit 20 ";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
		->execute()
		->as_array();
		if(empty($result)){
			// Search in master as
		//$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c like '".$_GET['term']."%'";
		//$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c like '%".$_GET['term']."%' limit 20";
		//$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and testname_c like '".$_GET['term']."%'";
		//$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and testname_c like '%".$_GET['term']."%' limit 20";
		// exclude tests that were defined under IPD category		
		$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '".$_GET['term']."%'";
		$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '%".$_GET['term']."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
		->execute()
		->as_array();
		}
		$this->response->body(json_encode($result));		
	}
public function action_masterTests()
	{
		$tempterm=explode(',',$_GET['term']);
		$index= count($tempterm)-1;
		$tempterm=trim($tempterm[$index]);
		//$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c like '".$tempterm."%'";
		//$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c like '%".$tempterm."%' limit 20";
		//$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and testname_c like '".$_GET['term']."%'";
		//$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and testname_c like '%".$_GET['term']."%' limit 20";
		// exclude tests that were defined under IPD category		
		$_query1 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '".$_GET['term']."%'";
		$_query2 = "select case when(aliasto_c = -1) then id else aliasto_c end as id,testname_c AS value from testmasters where active_c = 1 and reftestsubcategoryid_c != 13 and testname_c like '%".$_GET['term']."%' limit 20";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
	}

	// Actions for Prescription Labels
	//--------------------------------
public function action_getPreslabel() 
{	
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user)
		Request::current()->redirect('cuser/login');
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();	
	$userid = $obj_user->id;
	$obj_label = ORM::factory('doctorpresclb')->where('refdoctorsid_c','=',$userid)->find();

	if($obj_label->id == null)
		$obj_label = ORM::factory('doctorpresclb')->where('refdoctorsid_c','=',-1)->find();
	
	$temp=array();
	
	$temp['mornlabel'] = $obj_label->mornlabel_c;
	$temp['aftrlabel'] = $obj_label->aftrlabel_c;
	$temp['evenlabel'] = $obj_label->evenlabel_c;
	$temp['nigtlabel'] = $obj_label->nigtlabel_c;
	if($obj_user->defphotoflag_c == 1)
		$temp['photocheck'] = true;
	else
		$temp['photocheck'] = false;
	
	echo(json_encode($temp));
	die;		
}
public function action_savelabels() 
{	
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user)
		Request::current()->redirect('cuser/login');
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();	
	$userid = $obj_user->id;
	$obj_label = ORM::factory('doctorpresclb')
					->where('refdoctorsid_c','=',$userid)
					->find();
	$obj_label->mornlabel_c = $_GET['mornlabel'];
	$obj_label->aftrlabel_c = $_GET['aftrlabel'];
	$obj_label->evenlabel_c = $_GET['evenlabel'];
	$obj_label->nigtlabel_c = $_GET['nigtlabel'];
	$obj_label->refdoctorsid_c = $userid;
	$obj_label->save();
	// Flag "true" "false" returned as string
	if($_GET['photocheck']== "true")
		$obj_user->defphotoflag_c = 1;
	else
		$obj_user->defphotoflag_c = 0;
	$obj_user->save();
}
// Action for getting personalised parameters 
// while entering reports data
public function action_getPersonparameter()
{		
	$response=array();				
	$objuser = Auth::instance()->get_user();
	if (!$objuser)
		Request::current()->redirect('cuser/login');
	$user_id = $objuser->id;	
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$userid = $obj_user->id;	
	$obj_docparam=ORM::factory('doctorpersonalizedparam')
				->where( 'doctorsid','=',$userid)
				->find_all();					
	
	$parameterunits=new Model_parameterunit;
	$parametervalues= new Model_parametervalue;
	foreach($obj_docparam as $parameter){
		$data['id']=$parameter->parameterId;
		$data['loinccode']=$parameter->loinccode;
		$data['parametername']=$parameter->parametername;
		$data['type']=$parameter->type;
		$data['defaultunit']=$parameter->refdefaultunitid;
		$data['units']=$parameterunits->getparameterunits($parameter->parameterId);
		$data['paramvalues']=$parametervalues->getparametervalues($parameter->parameterId);
		array_push($response,$data);
	}
	echo (json_encode($response));
}


// Action for test parameters
public function action_searchparameter()
{		
		$_query1 = "select id as id,parametername_c as value from testparameters where isverified_c = 1 and parametername_c like '".$_GET['term']."%' group by loinccode_c";
		$_query2 = "select id as id,parametername_c as value from testparameters where isverified_c = 1 and parametername_c like '%".$_GET['term']."%' group by loinccode_c limit 15";
		$query = "$_query1 union $_query2";
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		$this->response->body(json_encode($result));
}
public function action_saveparameter(){
	try{
			$objuser = Auth::instance()->get_user();
			if (!$objuser)
				Request::current()->redirect('cuser/login');
			$user_id = $objuser->id;	
			$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
			$userid = $obj_user->id;	
			$obj_doctest=ORM::factory('doctorreportparam')
						->where( 'refdoctorsid_c','=',$userid)
						->where( 'refparamid_c','=',$_GET['parameterId'])
						->find();					
			If($obj_doctest->id == null)
			{
				$obj_doctest->refdoctorsid_c= $userid;
				$obj_doctest->refparamid_c= $_GET['parameterId'];				
				$obj_doctest->save();
				$returnArray['found'] = 'No';				
			}
			else
			{
				$returnArray['found'] = 'yes';				
			}
			echo(json_encode($returnArray));
			die;
		}
		catch(Exception $e){
			throw new Exception($e);
		}
	}
public function action_getParameter() 
{	
	$obj_user = Auth::instance()->get_user();
	if (!$obj_user)
		Request::current()->redirect('cuser/login');
	$userid = $obj_user->id;
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();

	$whereclause = '[doctorsid,=,'.$obj_user->id.']';
	$columns = 'parameterId,parametername,doctorsid';
	$groupby = "";
	
	$page = "1"; 
	$limit = "100"; 
	$sidx = "createdon_c"; 
	$sord = 'desc';
	
	$table = 'doctorpersonalizedparam';
	
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
public function action_deleteparam(){
	$objuser = Auth::instance()->get_user();
	if (!$objuser)
		Request::current()->redirect('cuser/login');
	$user_id = $objuser->id;	
	$obj_user = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_id)->find();
	$userid = $obj_user->id;	
	$parameterId=$_GET['parameterId'];
	$doctest_obj = ORM::factory('doctorreportparam')
					->where('refparamid_c','=',$parameterId)
					->where( 'refdoctorsid_c','=',$userid)
					->find();
	if($doctest_obj)
		$doctest_obj->delete();
}
}