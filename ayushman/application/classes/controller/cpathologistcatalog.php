<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cpathologistcatalog extends Controller_Ctemplatewithmenu {
	public function action_search(){
		$errors = array();
		$messages = array();		
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "[pathologistid,=,".$pathologistid."]";
		
		if (isset($_POST['discountgrpid']))
			$whereclause = $whereclause."[discgroupid,=,".$_POST['discountgrpid']."]";
		else
			$whereclause = $whereclause."[discgroupid,=,-1]";
		
		if (isset($_POST['cattype']))
			if($_POST['cattype'] == "battery")
				$whereclause = $whereclause."[Catagory,=,Battery]";
			else
				$whereclause = $whereclause."[Catagory,!=,Battery]";			
		else
			$whereclause = $whereclause."[Catagory,!=,Battery]";
		
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
		if (isset($_POST['discountgrpid']))
			$selectedgroup = $_POST['discountgrpid'];
		else
			$selectedgroup = -1;
		
		if (isset($_POST['cattype']))
			$selectedcattype = $_POST['cattype'];
		else
			$selectedcattype = "test";

		$content->bind('discgroups',$objgroup);
		$content->bind('pathologistid', $pathologistid);
		$content->bind('whereclause', $whereclause);
		$content->bind('selectedgroup', $selectedgroup);
		$content->bind('selectedcattype', $selectedcattype);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	
	public function action_download(){
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "[categoryid,!=,11]";
		
		$table = "pathologycatalogformat";
		$columns = "Category,IOHTestCode,IOHTestName,LoincCode,LoincName,Sample,LabTestCode,LabTestName,SellingPrice,DiscountPercent";
		$groupby = '';
		$sidx = 'Category'; 
		$sord = 'asc'; 		

		if (isset($_GET['logtype']))
		{
			if($_GET['logtype'] == "battery")
				$whereclause = "[categoryid,=,11]"."[pathologistid,=,".$pathologistid."]";
			else
				$whereclause = "[categoryid,!=,11]";
		}
		else
			$whereclause = "[categoryid,!=,11]";
		// Select test catalog

		
		$jqgriddata=new Model_xjqgridgetdata;
		$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
		/*unset($result[0]);
		////////////// Remove first element which are heading
		////////////////////////////////////////////////////////////////////////////////////////
		////////////////// Select batteries defined by pathologist
		$whereclause = "[categoryid,=,11]"."[pathologistid,=,".$pathologistid."]";
		$jqgriddata=new Model_xjqgridgetdata;
		$resultbat=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
		
		$total = array_merge($resultbat,$result);*/
		$date = date_create();
		export::toexcel($result,'Diagnostic_Lab_Catalog_'.date_timestamp_get($date).'.xls');
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
		if($_POST){
			$search = $_POST['search'];
			if(isset($_POST["discountgrpid"]))
				$whereclause = $whereclause."[discgroupid,=,".$_POST['discountgrpid']."]";
			else
				$whereclause = $whereclause."[discgroupid,=,-1]";
			
			if (isset($_POST['cattype']))
				if($_POST['cattype'] == "battery")
					$whereclause = $whereclause."[Catagory,=,Battery]";
				else
					$whereclause = $whereclause."[Catagory,!=,Battery]";			
			else
				$whereclause = $whereclause."[Catagory,!=,Battery]";
					
			$table = "catalog";
			$columns = "Catagory,IOHTestCode,IOHTestName,LoincCode,LoincName,Sample,LabTestCode,LabTestName,SellingPrice,DiscountPercent";
			$groupby = '';
			$sidx = 'IOHTestCode'; 
			$sord = 'asc';
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			export::toexcel($result,'Uploaded_Catalog_'.date_timestamp_get($date).'.xls');
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
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
				//if(isset($_POST['discountgrpid']))
				if(isset($_POST['groupid']))
					$groupid = $_POST['groupid'];
				else
					$groupid = -1;
			
				if (isset($_POST['catalogtype']))
					if($_POST['catalogtype'] == "battery")
						$uploadbat = true;
					else
						$uploadbat = false;			
				else
					$uploadbat = false;


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
							if ( $uploadbat == true)
								$query = 'select id,refpathcatalogpathologistsid_c,refpathcatalogtestid_c from pathologistcatalogs '
										.' where refdiscgroupid_c = '.$groupid.' and refpathcatalogpathologistsid_c = '.$objpathologist->id
										.' and refpathcatalogtestid_c in (select id from testmasters where active_c = 1 and reftestsubcategoryid_c = 11 and refpathologistid_c = '
										.$objpathologist->id.')';
							else
								$query = 'select id,refpathcatalogpathologistsid_c,refpathcatalogtestid_c from pathologistcatalogs '
										.' where refdiscgroupid_c = '.$groupid.' and refpathcatalogpathologistsid_c = '.$objpathologist->id
										.' and refpathcatalogtestid_c not in (select id from testmasters where active_c = 1 and reftestsubcategoryid_c = 11 and refpathologistid_c = '
										.$objpathologist->id.')';
										
							$objCompleteCatalog = DB::query(Database::SELECT, $query)->execute()->as_array();
						
							/*$objCompleteCatalog = ORM::factory('pathologistcatalog')
											->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)
											->where('refdiscgroupid_c','=',$groupid)
											->find_all()->as_array();*/
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
									if($test == $objCatalog['refpathcatalogtestid_c']){
										$exists = true;
										break;
									}
								}
								if($exists == false){									
									$catalogobj = ORM::factory("pathologistcatalog")
													->where("id","=",$objCatalog['id'])->find();
									$catalogobj->delete();
									//$objCatalog->delete();	
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
			$whereclause = $whereclause."[Catagory,!=,Battery]";						
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
	}

} // End Welcome
