<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Xjqgriddatagenerator extends Controller{

	public function action_generate()
	{		
		$columns = $_GET["columns"];
		//echo $columns;
		$whereclause = $_GET["whereclause"];
		$groupby = $_GET["groupby"];
		
		$page = $_GET['page']; 
        	$limit = $_GET['rows']; 
		$sidx = $_GET['sidx']; 
		$sord = $_GET['sord']; 	
		if($_GET['template'] == 'false'){
			$table = $_GET["table"];
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getdata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
		}else{

			$class=$_GET['table'];
			$class = new helper_datagenerator($page,$limit,$sidx,$sord,$class,$columns,$whereclause,$groupby,$_GET['data']);
			$result = $class->getdata();
				
		}
		die($result);
	
	}
	public function action_generatejson()
	{		
		$columns = $_GET["columns"];
		var_dump ($columns);
		$whereclause = $_GET["whereclause"];
		$groupby = $_GET["groupby"];
		
		$page = $_GET['page']; 
        	$limit = $_GET['rows']; 
		$sidx = $_GET['sidx']; 
		$sord = $_GET['sord']; 	
		
			$table = $_GET["table"];
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			
			var_dump(json_encode($result));die;
	
	}
	public function action_savedata()
	{
		//var_dump($_POST);
		if($_POST)
		{
				foreach(json_decode($_POST["val"]) as $json){
				$str= $json[0];
					if(strcmp($str,'tablnm')==0)
					{
						$modelnm = "Model_".ucwords(trim($json[1]));		
						$objmodel = new $modelnm;
						//$objmodel = ORM::factory($json[1]);
					}
					else
					{
						$data[$json[0]] = $json[1];
						//echo $json[0]." ".$json[1]."\n";
					}
				}
				$objmodel->values($data); 
				$objmodel->save(); 
		}		
	}
	public function action_getdata()
	{
		$table = $_GET["tablenm"];
		$whereval = $_GET["whereval"];
		$wherecol = $_GET["wherecol"];
		$columns = $_GET["colnms"];
		
		$modelnm = "Model_".ucwords(trim($table));		
		$objmodel = new $modelnm;
		//$objmodel = ORM::factory($table);
		$result= $objmodel ->where($wherecol,'=',$whereval)->find_all();
		//var_dump($result);
		$array = array(); $i=0;
		if(!(strpos($columns, ',') === false ))
		{		
			$colarr = explode (",",$columns);
		
		}
		$j = 0;$arr=array();
		foreach($result as $res)
		{
			
			for ($i=0;$i<sizeof($colarr);$i++  )
			{
				//echo $colarr[$i];
				$arr[$j][$colarr[$i]] = $res->$colarr[$i];
				
			}
			$j = $j+1;				
		}
		echo json_encode($arr);
		
	}	
	
	public function action_saveediteddata()
	{
		
		if($_POST)
		{
			
				foreach(json_decode($_POST["val"]) as $json){
				$whereval= $where = $str= $json[0];
					if(strcmp($str,'tablnm')==0)
					{
						//$modelnm = "Model_".ucwords(trim(substr($json[1], 0, -1)));		
						//$objmodel = new $modelnm;
						$objmodel = ORM::factory($json[1]);
					}					
					else if(strcmp($where,'wherecolnm')==0)
					{
						$wherecolnm = $json[1];
					}
					else if(strcmp($whereval,'whereval')==0)
					{
						$whereval = $json[1];
					}
					else 
					{
						$data[$json[0]] = $json[1];
						//echo $json[0]." ".$json[1]."\n";
					}
				}
				//var_dump(values($data));
				$objmodel->where($wherecolnm,'=',$whereval)->find(); 
				$objmodel->values($data)->save(); 
		}		
	}
	public function action_getvaluefrmid()
	{
		
		$table = $_GET["tablenm"];
		$column = $_GET["column"];
		$id = $_GET["id"];
		$tblcolnm = $_GET["tblcolnm"];
		$modelnm = "Model_".ucwords((trim($table)));
		//echo $modelnm;die()		;
		$objmodel = new $modelnm;
		$objmodel->where('id','=',$id)->find();
		/*
		$objmodel = ORM::factory($table)
 							->where('id','=',$id)
							->find(); */
		echo $objmodel->$column."@#".$tblcolnm;
	}
	public function action_deleterecord()
	{
		$idcol = $_GET["idcol"];
		$idval = $_GET["idval"];
		$tablenm=$_GET["tablenm"];
		$objmodel= ORM::factory($tablenm);
		$objmodel->where($idcol,'=',$idval)->find();
		$objmodel->delete();
	}
}
