<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cothersp extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$obj_user = Auth::instance()->get_user();

		$objsptypes= ORM::factory("serviceprovidertype")
						->order_by("serviceprovider_c","Asc")->find_all();
		
		$arrsptypes = array();
		$i = 0;
		foreach($objsptypes as $sptype)
		{
			$arrsptypes[$i]['id']= $sptype->id;
			$arrsptypes[$i]['name']= $sptype->serviceprovider_c;	
			$arrsptypes[$i]['activeflag']= $sptype->active_c;	
			
			$catobj=ORM::factory("spcategorydetail")
						->where("spid",'=',$sptype->id)->find_all();						
			$j = 0;
			if(count($catobj) == 0)
			{
				// Catalog object not defined 
				$arrsptypes[$i]['catalogtype'][$j]['catid']=0;
				$arrsptypes[$i]['catalogtype'][$j]['catalogname']="Not defined";				
			}
			else
			{
				foreach($catobj as $detail)			
				{
					$arrsptypes[$i]['catalogtype'][$j]['catid']=$detail->catid;
					$arrsptypes[$i]['catalogtype'][$j]['catalogname']=$detail->catname;
					$j = $j + 1;
				}
				$i = $i + 1;
			}			
		}
		//var_dump($arrsptypes);
		//die;
		$content = View::factory('vuser/vadmin/vothersp');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$content->bind('arrsptypes', $arrsptypes);
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
	}
	public function action_addeditbattery(){
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;	
		
		
		// Get all discount groups
		// except standard group whose id is -1
		$arrGrps = array();
		 $objGrp = ORM::factory("discountgroup")
					->where("active_c","=",1)
					->where("id","!=",-1)->find_all();
		$j = 0;
		foreach($objGrp as $group)			
		{	
			$arrGrps[$j]['groupname']=$group->groupname_c;
			$arrGrps[$j]['groupid']=$group->id;
			$arrGrps[$j]['discount']=0;
					
			if(isset($_GET['batteryid']))
			{			
				$objpathcatalog= ORM::factory("pathologistcatalog")
					->where('refpathcatalogpathologistsid_c','=',$pathologistid)
					->where('refpathcatalogtestid_c','=',$_GET['batteryid'])
					->where('refdiscgroupid_c','=',$group->id)->find();
				if($objpathcatalog->id != null)
					$arrGrps[$j]['discount']=$objpathcatalog->discountpercent_c;			
			}
			$j = $j + 1;
		}
				
		$objbattery = ORM::factory("listofbattery")
						->where("pathologistid",'=',$pathologistid)->find_all();

		$arrbattery = array();
		
		if (isset($_GET['batteryid']))
		{
			// Editting existing battery
			$objBat	= ORM::factory("testmaster")
						->where("id","=",$_GET['batteryid'])
						->where("active_c","=",1)->find();
			if($objBat->id != null)			
			{
				$batteryname = $objBat->testname_c;
				$batterytestid = $objBat->id;
			 
				$detailobj = ORM::factory("allactivebatterydetail")
							->where("pathologistid",'=',$pathologistid )						
							->where("batteryid","=",$batterytestid)->find_all();

				$j = 0;
				foreach($detailobj as $detail)			
				{
					$arrbattery[$j]['testid']=$detail->testid;
					$arrbattery[$j]['testname']=$detail->testname;
					$arrbattery[$j]['standardrate']=$detail->testrate;
					$j = $j + 1;
				}
			}
		}
		else
		{
			// new battery definition
			$batteryname = null;
			$batterytestid = null;
			$arrbattery = array();			
		}
		$standardofferedcost=0;
		$objpathcatalog= ORM::factory("pathologistcatalog")
							->where('refpathcatalogpathologistsid_c','=',$pathologistid)
							->where('refpathcatalogtestid_c','=',$batterytestid)
							->where('refdiscgroupid_c','=',-1)->find();
		
		$standardofferedcost=$objpathcatalog->test_rate_c;
		$standardoffereddiscount=$objpathcatalog->discountpercent_c;
		
							
		$content = View::factory('vuser/vpathologist/vaddbattery');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$content->bind('pathologistid', $pathologistid);
		$content->bind('standardofferedcost',$standardofferedcost);
		$content->bind('standardoffereddiscount',$standardoffereddiscount);
		$content->bind('arrbattery', $arrbattery);
		$content->bind('batteryid', $batterytestid);
		$content->bind('batteryname', $batteryname);
		$content->bind('arrGrps', $arrGrps);

		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
	}
	
	public function action_savebattery()
	{
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;	
		$result['batteryid']="";
		$result['message']="";
		if (isset($_GET["batteryid"]) and isset($_GET["testname"]) and isset($_GET["batteryname"])and isset($_GET["offeredcost"])and isset($_GET["grpdiscount"]))
		{
			if (trim($_GET['batteryid'])=="")
			{
				// new battery to be added 
				$objbattery = ORM::factory("testmaster");
				$objbattery->testname_c = trim($_GET["batteryname"]);
				$objbattery->reftestsubcategoryid_c = 11; // Code for battery definitions
				$objbattery->refpathologistid_c = $pathologistid;
				$objbattery->active_c = 1;
				$objbattery->aliasto_c = -1;
				$objbattery->save();
				$batterytestid= $objbattery->id;
				$result['batteryid']=$objbattery->id;
				
				/////Update Pathologist standard catalog for entered values
				$objpathcatalog= ORM::factory("pathologistcatalog")
							->where('refpathcatalogpathologistsid_c','=',$pathologistid)
							->where('refpathcatalogtestid_c','=',$batterytestid)
							->where('refdiscgroupid_c','=',-1)->find();
							
				$objpathcatalog->refpathcatalogtestid_c= $batterytestid;			
				$objpathcatalog->refpathcatalogpathologistsid_c= $pathologistid;			
				$objpathcatalog->refdiscgroupid_c =-1;
				$objpathcatalog->test_rate_c= $_GET["offeredcost"];
				$objpathcatalog->discountpercent_c= 0;
				// Discount for standard is always 0;
				$objpathcatalog->test_name= $_GET["batteryname"];
				$objpathcatalog->test_code= $batterytestid;
				$objpathcatalog->save();
				
				$arrDiscgroups =explode(",",$_GET['grpdiscount']);
				for ($i=0; $i < count($arrDiscgroups)-1 ; $i++)
				{
					$indGroup = explode(":",$arrDiscgroups[$i]);
					$objpathcatalog= ORM::factory("pathologistcatalog")
							->where('refpathcatalogpathologistsid_c','=',$pathologistid)
							->where('refpathcatalogtestid_c','=',$batterytestid)
							->where('refdiscgroupid_c','=',$indGroup[0])->find();

						$objpathcatalog->refpathcatalogtestid_c= $batterytestid;			
						$objpathcatalog->refpathcatalogpathologistsid_c= $pathologistid;			
						$objpathcatalog->refdiscgroupid_c = $indGroup[0];
						$objpathcatalog->test_rate_c= $_GET["offeredcost"];
						$objpathcatalog->discountpercent_c= $indGroup[1];
						$objpathcatalog->test_name= $_GET["batteryname"];
						$objpathcatalog->test_code= $batterytestid;
						$objpathcatalog->save();
				}
				
				// Added test
				$testname = trim($_GET['testname']);
				if ($testname !="")
				{
					/*$objtest = ORM::factory("testmaster")
								->where("active_c","=",1)
								->where("testname_c","=",$testname)->find();*/
					
					// Test name is as defined by pathologist in his standard catalogue
					$objtest = ORM::factory("pathologistcatalog")
								->where("refdiscgroupid_c","=",-1)
								->where('refpathcatalogpathologistsid_c','=',$pathologistid)
								->where("test_name","=",$testname)->find();
					
					if($objtest->id != null)
					{
						// Define battery details
						$objdetail = ORM::factory("batterydetail");
						$objdetail->refbatteryid_c = $objbattery->id;
						//$objdetail->reftestid_c = $objtest->id;
						$objdetail->reftestid_c = $objtest->refpathcatalogtestid_c;
						$objdetail->active_c = 1;
						$objdetail->save();
						$result['message']= "Battery created successfully.";
						die(json_encode($result));
						//$this->displaybattery($objbattery->id);
					}
					else
					{
						// Since test was improper 
						// delete created battery record.
						// Make this battery inactive 
						$objbattery->active_c = 0;						
						$objbattery->save();
						$result['message'] = "Please select test properly from the list.";
						die(json_encode($result));				
					}
				}
				else
				{
					// Since test was improper 
					// delete created battery record.
					$objbattery->active_c= 0;
					$objbattery->save();
					$result['batteryid']= "";
					$result['message'] = "Please select test properly from the list.";
					die(json_encode($result));				
				}
			}
			else
			{
				$result['batteryid']= trim($_GET['batteryid']);
				// battery already defined so add selected test
				$objbattery = ORM::factory("testmaster")->where("active_c","=",1)
								->where("id","=",trim($_GET['batteryid']))->find();
								
				if($objbattery->id != null)
				{
					$objbattery->testname_c = trim($_GET["batteryname"]);
					$objbattery->reftestsubcategoryid_c = 11; // Code for battery definitions
					$objbattery->refpathologistid_c = $pathologistid;
					$objbattery->active_c = 1;
					$objbattery->aliasto_c = -1;
					$objbattery->save();				

					$testname = trim($_GET['testname']);
										
					$batterytestid=$objbattery->id;
					/////Update Pathologist standard catalog for entered values
					$objpathcatalog= ORM::factory("pathologistcatalog")
								->where('refpathcatalogpathologistsid_c','=',$pathologistid)
								->where('refpathcatalogtestid_c','=',$batterytestid)
								->where('refdiscgroupid_c','=',-1)->find();
								
					$objpathcatalog->refpathcatalogtestid_c= $batterytestid;			
					$objpathcatalog->refpathcatalogpathologistsid_c= $pathologistid;			
					$objpathcatalog->refdiscgroupid_c =-1;
					$objpathcatalog->test_rate_c= $_GET["offeredcost"];
					$objpathcatalog->discountpercent_c= 0;
					$objpathcatalog->test_name= $_GET["batteryname"];
					$objpathcatalog->test_code= $batterytestid;
					$objpathcatalog->save();
		
					// Discount groups updations
					
					$arrDiscgroups =explode(",",$_GET['grpdiscount']);
					for ($i=0; $i < count($arrDiscgroups)-1 ; ++$i)
					{
						$indGroup = explode(":",$arrDiscgroups[$i]);
						$objpathcatalog= ORM::factory("pathologistcatalog")
								->where('refpathcatalogpathologistsid_c','=',$pathologistid)
								->where('refpathcatalogtestid_c','=',$batterytestid)
								->where('refdiscgroupid_c','=',$indGroup[0])->find();

							$objpathcatalog->refpathcatalogtestid_c= $batterytestid;			
							$objpathcatalog->refpathcatalogpathologistsid_c= $pathologistid;			
							$objpathcatalog->refdiscgroupid_c = $indGroup[0];
							$objpathcatalog->test_rate_c= $_GET["offeredcost"];
							$objpathcatalog->discountpercent_c= $indGroup[1];
							$objpathcatalog->test_name= $_GET["batteryname"];
							$objpathcatalog->test_code= $batterytestid;
							$objpathcatalog->save();
					}
					
					// define test under battery
					/*$objtest = ORM::factory("testmaster")
								->where("active_c","=",1)
								->where("testname_c","=",$testname)->find();*/
					// Test name is as defined by pathologist in his standard catalogue
					if ($testname !="")
					{		
						$objtest = ORM::factory("pathologistcatalog")
								->where("refdiscgroupid_c","=",-1)
								->where('refpathcatalogpathologistsid_c','=',$pathologistid)
								->where("test_name","=",$testname)->find();
						if($objtest->id != null)
						{
							// Check if the test already defined for this battery
							$objdefined = ORM::factory("batterydetail")
									->where("refbatteryid_c","=",$objbattery->id)
									->where("reftestid_c","=",$objtest->id)->find();
							if ($objdefined->id == null)
							{
								// Define battery details
								$objdetail = ORM::factory("batterydetail");
								$objdetail->refbatteryid_c = $objbattery->id;
								//$objdetail->reftestid_c = $objtest->id;
								$objdetail->reftestid_c = $objtest->refpathcatalogtestid_c;
								$objdetail->active_c = 1;
								$objdetail->save();
								//$this->displaybattery($objbattery->id);
								$result['message']="Successfully added.";
								die(json_encode($result));
							}						
							else
							{
								$objdefined->active_c = 1;
								$objdefined->save();
								$result['message'] = "Please select another test from list.";
								die(json_encode($result));							
							}
						}
						else
						{
							// Since test was improper 
							$result['message']="Please select test properly from the list.";
							die(json_encode($result));
						}
					}
					else
					{
						// Since test was improper 
						$result['message']="Please select test properly from the list.";
						die(json_encode($result));					
					}
				}
				else
				{
					$result['message']="Something went wrong. Please contact your administrator.";
					die(json_encode($result));
				}
			}
		}
		else
		{
			$result['message']="Something went wrong. Please contact your administrator.";
			die(json_encode($result));
		}
	}
	
	private function displaybattery($batteryid)
	{
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;	

		$arrbattery = array();
		
		// Editting existing battery
		$objBat	= ORM::factory("testmaster")
						->where("id","=",$batteryid)
						->where("active_c","=",1)->find();
		if($objBat->id != null)			
		{
			$batteryname = $objBat->testname_c;
			$batterytestid = $objBat->id;		 
			$detailobj = ORM::factory("allactivebatterydetail")
						->where("pathologistid",'=',$pathologistid )						
						->where("batteryid","=",$batterytestid)->find_all();
				$j = 0;
			foreach($detailobj as $detail)			
			{
				$arrbattery[$j]['testid']=$detail->testid;
				$arrbattery[$j]['testname']=$detail->testname;
				$j = $j + 1;
			}
		}
		$content = View::factory('vuser/vpathologist/vaddbattery');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$content->bind('arrbattery', $arrbattery);
		$content->bind('batteryid', $batterytestid);
		$content->bind('batteryname', $batteryname);
		
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;	
	}

	public function action_deletebattery()
	{
		if (isset($_GET["batteryid"]) )		
		{
			$objbattery = ORM::factory("testmaster")
							->where("id","=",$_GET["batteryid"])->find();
			if($objbattery->id!=null)
			{
				$objbattery->active_c = 0;
				$objbattery->save();
				die("Successfully deleted");
			}
		}	
		else	
			die("Failed");
	}
	
	
	public function action_deletetest()
	{
		if (isset($_GET["batteryid"]) and  isset($_GET["testid"]))		
		{
			$objbattery = ORM::factory("batterydetail")
							->where("refbatteryid_c","=",$_GET["batteryid"])
							->where("reftestid_c","=",$_GET["testid"])
							->where("active_c","=",1)->find();
			if($objbattery->id!=null)
			{
				$objbattery->active_c = 0;
				$objbattery->save();
				die("Successfully deleted");
			}
		}	
		else	
			die("Failed");
	}
	
	public function action_export()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "[pathologistid,=,".$pathologistid."]";

		$table = "allbatteryinfo";
			$columns = "BatteryName,TestName,TestRate,OfferedCost,GroupName,GroupDiscount";
			$groupby = '';
			$sidx = 'pathologistid,TestCode,GroupName,TestName'; 
			$sord = 'asc';
			//$jqgriddata=new Model_xjqgridgetdata;
			//$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			// Standard class is not used 
			$result = ORM::factory("allbatteryinfo")
						->where ("pathologistid","=",$pathologistid)
						->order_by('pathologistid')
						->order_by('TestCode')
						->order_by('GroupName')
						->order_by('TestName')						
						->find_all();
			//echo $columns;
				if(!(strpos($columns, ',') === false ))
				{		
					$colarr = explode (",",$columns);				
				}
				$res1 = array();
				array_push($res1,$colarr);
				foreach($result as $res) {		
					$s = array();
					for ($i=0;$i<sizeof($colarr);$i++  )
					{	
						array_push($s,$res->$colarr[$i]);
					}
					array_push($res1,$s);
				}
			/// Code from jqgriddata class for creating array of results for exporting 
			/// to excel
			/////////////////////////////////////////////////////////////////////////////
			$date = date_create();
			$i = 0;
			export::toexcel($res1,'Battery_Catalog_'.date_timestamp_get($date).'.xls');
	}
	
/*	public function action_search(){
		$errors = array();
		$messages = array();		
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "[pathologistid,=,".$pathologistid."]";
		if (isset($_POST['groupid']))
			$whereclause = $whereclause."[discgroupid,=,".$_POST['groupid']."]";
		else
			$whereclause = $whereclause."[discgroupid,=,-1]";
		$this->display($errors,$messages,$whereclause);
	}
	private function display($errors, $messages,$whereclause){
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpathologist/vpathologistcatalog');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$objgroup = ORM::factory("discountgroup")
					->where("active_c","=",1)
					->find_all()->as_array();
		if (isset($_POST['groupid']))
			$selectedgroup = $_POST['groupid'];
		else
			$selectedgroup = -1;
		$content->bind('discgroups',$objgroup);
		$content->bind('pathologistid', $pathologistid);
		$content->bind('whereclause', $whereclause);
		$content->bind('selectedgroup', $selectedgroup);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	
	public function action_download(){
		$errors = array();
		$messages = array();
		$whereclause = "";
		
		$table = "pathologycatalogformat";
		$columns = "Category,IOHTestCode,IOHTestName,LoincCode,LoincName,Sample,LabTestCode,LabTestName,SellingPrice,DiscountPercent";
		$groupby = '';
		$sidx = 'Category'; 
		$sord = 'asc'; 		
		
		$jqgriddata=new Model_xjqgridgetdata;
		$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
		$date = date_create();
		export::toexcel($result,'Diagnostic_Lab_Catalog_'.date_timestamp_get($date).'.xls');
	}
		
	public function action_upload(){
		try{
			$errors = array();
			$messages = array();
			$obj_user = Auth::instance()->get_user();
			$objpathologist = new Model_Pathologist;
			$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
			$pathologistid = $objpathologist->id;
			
			if($_POST){
				if(isset($_POST['discountgrpid']))
					$groupid = $_POST['discountgrpid'];
				else
					$groupid = -1;
				$name = $_FILES["file"]["name"];
				$index = count(explode(".", $name)) - 1;
				$arr = explode(".", $name);
				$ext = $arr[$index];
				
				if($ext == "xls" || $ext == "xlsx")
				{		
					if ($_FILES["file"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
					}
					else
					{
						$helper_import = new helper_Import();
						$rows = $helper_import->excel($_FILES['file']['tmp_name']);
						
						{ //iterate through each record				
							$objCompleteCatalog = ORM::factory('pathologistcatalog')
											->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)
											->where('refdiscgroupid_c','=',$groupid)
											->find_all()->as_array();
							$arrayofExistingTest = array();
							$numberOfExistingTests = 0;
							$numberOfUpdatedTests = 0;
							$numberOfAddedTests = 0;
							$numberOfDeletedTests = 0;
							$invalidData = '';
							
							for($rowindex=2;$rowindex <= count($rows);$rowindex++){
								$cataloguedata =  Kohana::$config->load('catalogue');
								$catalogue = array();
								foreach($rows[$rowindex] as $key=>$value){
									if(isset($cataloguedata[$key])){
										if(!isset($catalogue[$cataloguedata[$key][1]])){
											$catalogue[$cataloguedata[$key][1]] = '';
										}
										$catalogue[$cataloguedata[$key][1]] = ($value != '')? $value : $catalogue[$cataloguedata[$key][1]];
									}
								}
								if ($catalogue['discountpercent']=='')
								{
										$catalogue['discountpercent']=0;
								}
								{
									$objcatalog = new Model_Pathologistcatalog;
									$catalogs = $objcatalog->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)
												->where('refpathcatalogtestid_c', '=', $catalogue['iohtestcode'])
												->where('refdiscgroupid_c', '=', $groupid)
												->find();
									$masterTests = ORM::factory('testmaster')->where('id','=',$catalogue['iohtestcode'])->find();
									if(($catalogue['labtestcode'] != '')&&($catalogue['labtestname'] !='')&&($catalogue['sellingprice'] !='')&&($masterTests->id != null)  ){
										$objcatalog->refpathcatalogpathologistsid_c = $objpathologist->id;
										$objcatalog->refpathcatalogtestid_c = $catalogue['iohtestcode'];
										$objcatalog->test_rate_c =str_replace('&','and',$catalogue['sellingprice']);
										$objcatalog->discountpercent_c =str_replace('&','and',$catalogue['discountpercent']);
										$objcatalog->test_name = str_replace('&','and',$catalogue['labtestname']);
										$objcatalog->test_code = str_replace('&','and',$catalogue['labtestcode']);
										$objcatalog->refdiscgroupid_c = $groupid;
										
										if($catalogs->id == null){
											$objcatalog->save();
											$numberOfAddedTests = $numberOfAddedTests + 1;
										}
										else{
											$objcatalog->id = $catalogs->id;
											$objcatalog->update();
											array_push($arrayofExistingTest,$objcatalog->id);
											$numberOfUpdatedTests = $numberOfUpdatedTests + 1;
										}
										$numberOfExistingTests = $numberOfExistingTests + 1;	
									}else{
										$invalidData = $invalidData.', '.$catalogue['iohtestcode']; 
									}	
								}								
							}
							foreach($objCompleteCatalog as $objCatalog){
								$exists = false;
								foreach($arrayofExistingTest as $test){
									if($test == $objCatalog->id){
										$exists = true;
										break;
									}
								}
								if($exists == false){
									$objCatalog->delete();	
									$numberOfDeletedTests = $numberOfDeletedTests + 1;
						
								}
							}
							$invalidData = ($invalidData == '')?'Not Found': $invalidData;
							$messages['message'] = '<div class="bodytext_normal"><span class="bodytext_bold">Catalog Summary : </span></br></br>
											&nbsp; Number Of Tests that are Updated &nbsp;: '.$numberOfUpdatedTests.' Tests,</br>
											&nbsp; Number Of Tests that are Deleted &nbsp;: '.$numberOfDeletedTests.' Tests,</br>
											&nbsp; Number Of Tests that are Added &nbsp;&nbsp;&nbsp;: '.$numberOfAddedTests.' Tests,</br>
											&nbsp; Invalid data for ids : '.$invalidData.'</br>
											</br> 
											<span class="bodytext_bold">Total Number Of tests Available &nbsp;&nbsp;: '.$numberOfExistingTests.' Tests</span>
										
										</div>';
						}						
					}
				}
				//Request::current()->redirect($_SERVER['HTTP_REFERER']);
			}
			$_POST['search'] = '';
			$whereclause = "[pathologistid,=,".$pathologistid."]";
			$whereclause = $whereclause."[discgroupid,=,-1]";			
			$this->display($errors,$messages,$whereclause);
		}catch(Exception $e){
			var_dump($e);
			die;
		}
	}
	
	public function CSVImport($file) {
		$handle = fopen($file, 'r');
		if (!$handle)
			die('Cannot open  file.');
		$rows = array();
		//Read the file as csv
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$rows[] =  $data;
		}

		fclose($handle);

		return $rows;
	}
	
	public function action_getforid()
	{
		$id = $_GET['id'];
		$pathologistid = $_GET['pathologistid'];
		
		$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$id)->where('refpathcatalogpathologistsid_c','=',$pathologistid)->find();
		die($objCatalog->test_rate_c);
	}*/

} // End Welcome
