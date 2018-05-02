<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cpathologistreferencevalue extends Controller_Ctemplatewithmenu {
	public function action_search(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpathologist/vpathologistreferencevalue');
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
	
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "[pathologistid,=,".$pathologistid."]";
	
		$table = "referencevaluesformat";
		$columns = "PATHtestname,IOHparametername,IOHparameterunitname,PATHparametername,PATHparameterunitname,PATHreferencevalues";
		$groupby = '';
		$sidx = 'PATHtestname'; 
		$sord = 'asc'; 		
		
		$jqgriddata=new Model_xjqgridgetdata;
		$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
		$date = date_create();
		export::toexcel($result,'Reference_Values'.date_timestamp_get($date).'.xls');
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

			//$table = "pathologistparameter";
			$table = "pathologistRefvalue";
			//$columns = "id,refpathlogistid_c,refparameterid_c,parametername_c,refunitid_c,pararefrange_c";
			$columns = "testname,parametername,parameterunitname,referencerange";
			$groupby = '';
			$sidx = 'testname'; 
			$sord = 'asc';
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,null,$groupby);
			$date = date_create();
			$i = 0;
			export::toexcel($result,'Uploaded_referencevalues_'.date_timestamp_get($date).'.xls');
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->display($errors,$messages,$whereclause);
		}
	}
	
	public function action_upload()
	{
			$errors = array();
			$messages = array();
			$obj_user = Auth::instance()->get_user();
			$objpathologist = new Model_Pathologist;
			$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
			$pathologistid = $objpathologist->id;

			
		if($_POST)
		{  
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['file']);
			$this->exceltodatabase($return['path']);
			$_POST['search'] = '';
			$this->display($errors,$messages);
		}
		else
		{
			$errors = array();
			$messages = array();
	
			$_POST['search'] = '';
			
			$this->display($errors,$messages);

		}
	}
	
	private function exceltodatabase($filename)
        { set_time_limit(1000);
			try {
					$inputFileType = PHPExcel_IOFactory::identify($filename);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($filename);
				} catch(Exception $e) 
				{
				die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
				}

				//  Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet(0); 
				$highestRow = $sheet->getHighestRow(); 
				$highestColumn = $sheet->getHighestColumn();
				
				// Get Pathologist id
					$obj_user = Auth::instance()->get_user();
					$objpathologist = new Model_Pathologist;
					$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
					$pathologistid = $objpathologist->id;
				for ($row = 2; $row <= $highestRow; $row++)
				{ 
				//  Read a row of data into an array
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
					
					$PATHparametername = '';
					$PATHparameterunitname = '';
					$PATHreferencevalues = '';
					
					$IOHtestid = '';
					$IOHtestname = $rowData[0][0];
					$IOHparametername = $rowData[0][1];
					$IOHparameterunitname	= $rowData[0][2];
				
					$PATHparametername = $rowData[0][3];
					$PATHparameterunitname = $rowData[0][4];
					$PATHreferencevalues = $rowData[0][5];
					
					
					if ($PATHparametername != ''|| $PATHparameterunitname!='' || $PATHreferencevalues != '')
					{
						
						$objpathref = new Model_pathologistparameter;//created Model for pathologistparameter
						
						$IOHtestid	= ORM::factory('pathologistcatalog')->where('test_name','=',$IOHtestname)->mustfind();
						$IOHparameter = ORM::factory('testparameter')->where('parametername_c','=',$IOHparametername)->where('isverified_c','=',1)->mustfind();//get parameter id
						$IOHparamunit = ORM::factory('unitsmaster')->where('unitname_c','=',$PATHparameterunitname)->where('active_c','=',1)->mustfind();//get unit id
			
						$objpresent=$objpathref->where('refpathlogistid_c','=',$objpathologist->id)->where('refparameterid_c', '=', $IOHparameter->id)->find();
			
							$objpathref->reftestid_c = $IOHtestid->refpathcatalogtestid_c;
							$objpathref->refpathlogistid_c = $objpathologist->id;
							$objpathref->refparameterid_c = $IOHparameter->id;
							$objpathref->refunitid_c = $IOHparamunit->id;
							$objpathref->parametername_c = $PATHparametername;
							$objpathref->pararefrange_c = $PATHreferencevalues;
				
						if($objpresent->id == null){ //if parameter is not already present 
							$objpathref->save();
						}
						else
						{
							$objpathref->update();
						}
					}
					else
					{
						
					}
				}
						
		return('done');
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
