<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cipdwardcatalog extends Controller_Ctemplatewithmenu {
	public function action_search(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vipdward/vipdwardcatalog');
		$content->bind('user', $obj_user);
		$userid = $obj_user->id;
		$content->bind('userid', $userid);
		$this->template->content = $content;
		$this->template->user = $obj_user->Firstname_c;
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$content->bind('pathologistid', $pathologistid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	
	public function action_download(){
		$errors = array();
		$messages = array();
		$whereclause = "";
		
		$table = "wardcatalogformat";
		$columns = "Category,IOHTestCode,IOHTestName,LoincCode,LoincName,Sample,LabTestCode,LabTestName,SellingPrice";
		$groupby = '';
		$sidx = 'Category'; 
		$sord = 'asc'; 		
		
		$jqgriddata=new Model_xjqgridgetdata;
		$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
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

			$table = "catalog";
			$columns = "Catagory,IOHTestCode,IOHTestName,LoincCode,LoincName,Sample,LabTestCode,LabTestName,SellingPrice";
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
							$objCompleteCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)->find_all()->as_array();
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
								
								{
									$objcatalog = new Model_Pathologistcatalog;
									$catalogs = $objcatalog->where('refpathcatalogpathologistsid_c','=',$objpathologist->id)->where('refpathcatalogtestid_c', '=', $catalogue['iohtestcode'])->find();
									$masterTests = ORM::factory('testmaster')->where('id','=',$catalogue['iohtestcode'])->find();
									if(($catalogue['labtestcode'] != '')&&($catalogue['labtestname'] !='')&&($catalogue['sellingprice'] !='') &&($masterTests->id != null)  ){
										$objcatalog->refpathcatalogpathologistsid_c = $objpathologist->id;
										$objcatalog->refpathcatalogtestid_c = $catalogue['iohtestcode'];
										$objcatalog->test_rate_c =str_replace('&','and',$catalogue['sellingprice']);
										$objcatalog->test_name = str_replace('&','and',$catalogue['labtestname']);
										$objcatalog->test_code = str_replace('&','and',$catalogue['labtestcode']);
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
			$this->display($errors,$messages);
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
