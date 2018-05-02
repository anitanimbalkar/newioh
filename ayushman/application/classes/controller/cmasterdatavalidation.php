<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/Excel/excel_reader.php');
include_once(DOCROOT.'application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
//include_once(DOCROOT.'application/classes/helper/export.php');
require_once(DOCROOT.'simple_html_dom.php');

class Controller_Cmasterdatavalidation extends Controller_Ctemplatewithmenu  
{
	public function action_view()
	{
		$_POST['activationstatus']= '-1';
		$_POST['status']= 'drugmaster';
		$_POST['drugname'] = '';
		$this->displaytestlist('vdrugmastersupdate');
		
	}
	
	public function action_search()
	{ 
		if(!isset($_POST['activationstatus']))
		{
			$_POST['activationstatus']= '-1';
		}
		if(!isset($_POST['drugname']))
		{
			$_POST['drugname']= '';
		}

		if($_POST['status']=='Symptoms')
		{
			$this->displaytestlist('vsymptomsmasterupdate');
		}
		if($_POST['status']=='drugmaster')
		{
			$this->displaytestlist('vdrugmastersupdate');
		}
		
		if($_POST['status']=='diagnosis')
		{
			$this->displaytestlist('vdiagnosismasterupdate');
		}
		if($_POST['status']=='testmaster')
		{
			$this->displaytestlist('vtestmasterupdate');
		}
		if($_POST['status']=='allergymaster')
		{
			$this->displaytestlist('vallergymasterupdate');
		}
	}
	public function action_approve()
	{
		if($_GET)
		{ var_dump($_GET['id']); 
			$id = $_GET['id'];			
			$obj_user=ORM::factory('symptommaster')->where('id','=', $id)->find();
			$obj_user->active_c=1;
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}

	public function action_approveAllergy()
	{
		if($_GET)
		{ var_dump($_GET['id']); 
			$id = $_GET['id'];			
			$obj_user=ORM::factory('allergymaster')->where('id','=', $id)->find();
			$obj_user->active_c=1;
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	
	public function action_approvemedicine()
	{
		if($_GET)
		{ var_dump($_GET['id']); 
			$id = $_GET['id'];			
			$obj_user=ORM::factory('drugmaster')->where('id','=', $id)->find();
			$obj_user->active_c=1;
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
		public function action_approvetest()
	{
		if($_GET)
		{ var_dump($_GET['id']); 
			$id = $_GET['id'];			
			$obj_user=ORM::factory('testmaster')->where('id','=', $id)->find();
			$obj_user->active_c=1;
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_approvediagnosis()
	{
		if($_GET)
		{ var_dump($_GET['id']); 
			$id = $_GET['id'];			
			$obj_user=ORM::factory('diseasemasters')->where('id','=', $id)->find();
			$obj_user->active_c=1;
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_Reject()
	{
		if($_POST)
		{ var_dump($_POST['idioh']); 
			$id = $_POST['idioh'];	
			$object_user = Auth::instance()->get_user();			
			$obj_user=ORM::factory('symptommaster')->where('id','=', $id)->find();
			$obj_user->active_c=0;
			$obj_user->note_c="Rejected - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_Rejectallergy()
	{
		if($_POST)
		{ var_dump($_POST['idioh']); 
			$id = $_POST['idioh'];	
			$object_user = Auth::instance()->get_user();			
			$obj_user=ORM::factory('allergymaster')->where('id','=', $id)->find();
			$obj_user->active_c=0;
			$obj_user->note_c="Rejected - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	
	public function action_Rejectmedicine()
	{
		if($_POST)
		{ var_dump($_POST['idioh']);
			$id = $_POST['idioh'];	
			$object_user = Auth::instance()->get_user();
			$obj_user=ORM::factory('drugmaster')->where('id','=', $id)->find();
			$obj_user->active_c=0;
			$obj_user->note_c="Rejected - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_Rejectdiagnosis()
	{
		if($_POST)
		{ var_dump($_POST['idioh']); 
			$id = $_POST['idioh'];	
			$object_user = Auth::instance()->get_user();
			$obj_user=ORM::factory('diseasemasters')->where('id','=', $id)->find();
			$obj_user->active_c=0;
			$obj_user->note_c="Rejected - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_Rejecttest()
	{
	
		if($_POST)
		{ var_dump($_POST['idioh']);  
			$id = $_POST['idioh'];
			$reason=$_POST['reason'];
			$object_user = Auth::instance()->get_user();
			$obj_user=ORM::factory('testmaster')->where('id','=', $id)->find();
			$obj_user->active_c=0;
			$obj_user->note_c="Rejected - ".$_POST['reason']." - by ".$object_user->Firstname_c." ".$object_user->lastname_c."(".$object_user->id.")";
			$obj_user->save();
			die;
		}
		else
		{ 
			echo("wrong id"); die;
		}
	}
	public function action_savereason()
	{	
		if($_POST)
		{var_dump($_POST); 
		$id = $_POST['id'];
		$objuser= ORM::factory('symptommaster')->where('id','=',$id)->find();
		$objuser->symptomname_c=$_POST['Symptom'];
		$objuser->active_c=-1;
		$objuser->save();
		die;	
		}
		
	}
	public function action_savereasonllergy()
	{	
		if($_POST)
		{var_dump($_POST); 
		$id = $_POST['id'];
		$objuser= ORM::factory('allergymaster')->where('id','=',$id)->find();
		$objuser->Allergyname_c=$_POST['Allergy'];
		$objuser->active_c=-1;
		$objuser->save();
		die;	
		}
		
	}
	
	public function action_savediagnosis()
	{	
		if($_POST)
		{var_dump($_POST); 
		$id = $_POST['id'];
		$objuser= ORM::factory('diseasemasters')->where('id','=',$id)->find();
		$objuser->diseasename_c=$_POST['Symptom'];
		$objuser->active_c=-1;
		$objuser->save();
		die;	
		}
		
	} 
	public function action_saveandapprovedrugdetails()
	{
		//var_dump($_POST);die;
	$drugid=$_POST['id'];
	$brandname=$_POST['Brandname'];
	$genericname=$_POST['Genericname'];
	// Changed to add  price list
	$packageunit=$_POST['Packageunit'];
	$priceperpackageunit=$_POST['Priceperpackageunit'];
	$minorderunit=$_POST['Minorderunit'];
	$priceperminorderunit=$_POST['Priceperminorderunit'];
	// Changed
	$category=$_POST['category'];
	$form=$_POST['form'];
	$strength=$_POST['strength'];
	$instruction=$_POST['Instructions'];
	$sideeffects=$_POST['sideeffects'];
	$caution=$_POST['caution'];
	$objid=ORM::factory('drugmaster')->where('id','=',$drugid)->find();
				$objid->DrugName_c=$brandname;
					$objid->drugGenericName_c=$genericname;
					
					if(!(ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id))
					{ 
						$categoryname=ORM::factory('drugcategorymaster');
						$categoryname->drugcategoryname_c=$category;
						
						$objid->drugCategory_c=$categoryname->id;
						$categoryname->save();
					}
					else
					{
						$objid->drugCategory_c= ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id;
					}
					if(!(ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id))
					{
					}
					else
					{
						$objid->drugForm_c= ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id;
					}
					$objid->drugStrength_c=$strength;
					
					$objid->modeOfIntake_c=$instruction;
					$objid->sideEffects_c=$sideeffects;
					$objid->cautions_c=$caution;
					$objid->active_c=1;
					$drugidfinal=$objid->id;
					// Added to save the changed price values
					
					$objid->packageunit_c=$packageunit;
					$objid->priceperpackageunit_c=$priceperpackageunit;
					$objid->minorderunit_c=$minorderunit;
					$objid->priceperminorderunit_c=$priceperminorderunit;
	
					//done
					
					
					$objid->save();
					$objdrug =ORM::factory('newaddeddrug')->where('id','=',$drugid)->find();
					$viewpath = 'vuser/vadmin/drugapproveform';
					//$viewpath ='vuser/vadmin/drugeditform';
					$content = View::factory($viewpath);
					$content->bind('objdrug',$objdrug);
					$this->template->content = $content;
					$statuscode="Record Updated";					
					echo "<script type='text/javascript'>alert('$statuscode');</script>";
					//die("done");
	
	}
	public function action_savedrugdetails()
	{ 
	//var_dump($_POST);die;
	$drugid=$_POST['id'];
	$brandname=$_POST['Brandname'];
	$genericname=$_POST['Genericname'];
	// Changed to add  price list
	/*$packageunit=$_POST['Packageunit'];
	$priceperpackageunit=$_POST['Priceperpackageunit'];
	$minorderunit=$_POST['Minorderunit'];
	$priceperminorderunit=$_POST['Priceperminorderunit'];*/
	// Changed
		
	$category=$_POST['category'];
	$form=$_POST['form'];
	$strength=$_POST['strength'];
	$strengthinmg = $_POST['strengthinmg'];
	$instruction=$_POST['Instructions'];
	$sideeffects=$_POST['sideeffects'];
	$caution=$_POST['caution'];
	$objid=ORM::factory('drugmaster')->where('id','=',$drugid)->find();
				$objid->DrugName_c=$brandname;
					$objid->drugGenericName_c=$genericname;
					
					if(!(ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id))
					{ 
						$categoryname=ORM::factory('drugcategorymaster');
						$categoryname->drugcategoryname_c=$category;
						
						$objid->drugCategory_c=$categoryname->id;
						$categoryname->save();
					}
					else
					{
						$objid->drugCategory_c= ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id;
					}
					if(!(ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id))
					{
					}
					else
					{
						$objid->drugForm_c= ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id;
					}
					$objid->drugStrength_c=$strength;
					$objid->drugStrengthinmg_c=$strengthinmg;
					
					$objid->modeOfIntake_c=$instruction;
					$objid->sideEffects_c=$sideeffects;
					$objid->cautions_c=$caution;
					$drugidfinal=$objid->id;
					// Added for the price fields
					/*$objid->packageunit_c=$packageunit;
					$objid->priceperpackageunit_c=$priceperpackageunit;
					$objid->minorderunit_c=$minorderunit;
					$objid->priceperminorderunit_c = $priceperminorderunit;*/
					//Done
					$objid->save();
					$objdrug =ORM::factory('newaddeddrug')->where('id','=',$drugid)->find();
					$viewpath ='vuser/vadmin/drugeditform';
					$content = View::factory($viewpath);
					$content->bind('objdrug',$objdrug);
					$this->template->content = $content;
					$statuscode="Record Updated";					
					echo "<script type='text/javascript'>alert('$statuscode');</script>";
					//die("done");
				
	}
	public function action_saveandapprovetestdetails()
	{
	//var_dump($_POST);die;
	$id=$_POST['id'];
	$aliasname=$_POST['aliasname'];
	$testid=$_POST['testid'];
	$otherspecimens=$_POST['category'];
	$cptcode=$_POST['cptcode'];
	$loinccode=$_POST['loinccode'];
	$sample=$_POST['sample'];
	
	$objid=ORM::factory('testmaster')->where('id','=',$id)->find();
					$objid->aliasto_c=$testid;
					$objid->otherspecimens_c=$otherspecimens;
					$objid->cptcode_c=$cptcode;
					$objid->sample_c=$sample;
					$objid->loinccode_c=$loinccode;
					$objid->active_c=1;
					$objid->save();
					$objtest =ORM::factory('testmaster')->where('id','=',$id)->find();
					$viewpath ='vuser/vadmin/testeditform';
					$content = View::factory($viewpath);
					$content->bind('objtest',$objtest);
					$this->template->content = $content;
					$statuscode="Record Updated";					
					echo "<script type='text/javascript'>alert('$statuscode');</script>";
					//die("done");
		
	}
	
	public function action_savetestdetails()
	{ 
	//var_dump($_POST);die;
	$id=$_POST['id'];
	$aliasname=$_POST['aliasname'];
	$testid=$_POST['testid'];
	$otherspecimens=$_POST['category'];
	$cptcode=$_POST['cptcode'];
	$loinccode=$_POST['loinccode'];
	$sample=$_POST['sample'];
	
	$objid=ORM::factory('testmaster')->where('id','=',$id)->find();
				$objid->testname_c=$aliasname;
					$objid->aliasto_c=$testid;
					$objid->otherspecimens_c=$otherspecimens;
					$objid->cptcode_c=$cptcode;
					$objid->sample_c=$sample;
					$objid->loinccode_c=$loinccode;
					$objid->save();
					$objtest =ORM::factory('testmaster')->where('id','=',$id)->find();
					$viewpath ='vuser/vadmin/testeditform';
					$content = View::factory($viewpath);
					$content->bind('objtest',$objtest);
					$this->template->content = $content;
					$statuscode="Record Updated";					
					echo "<script type='text/javascript'>alert('$statuscode');</script>";
					//die("done");
				
	}
	public function action_displaydrugdetails()
	{
		
		try
		{		$id=$_GET['id'];
				$objdrug =ORM::factory('newaddeddrug')->where('id','=',$id)->find();
				$viewpath ='vuser/vadmin/drugeditform';
				$content = View::factory($viewpath);
				$content->bind('objdrug',$objdrug);
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	public function action_approvedrugdetails()
	{
		
		try
		{		$id=$_GET['id'];
				$objdrug =ORM::factory('newaddeddrug')->where('id','=',$id)->find();
				$viewpath ='vuser/vadmin/drugapproveform';
				$content = View::factory($viewpath);
				$content->bind('objdrug',$objdrug);
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	public function action_displaytestdetails()
	{
		
		try
		{		$id=$_GET['id'];
				$objtest =ORM::factory('testmaster')->where('id','=',$id)->find();
				$viewpath ='vuser/vadmin/testeditform';
				$content = View::factory($viewpath);
				$content->bind('objtest',$objtest);
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	public function action_approvetestdetails()
	{
		
		try
		{		$id=$_GET['id'];
				$objtest =ORM::factory('testmaster')->where('id','=',$id)->find();
				$objalias =ORM::factory('testmaster')->where('id','=',$objtest->aliasto_c)->find();
				$objaliasname=$objalias->testname_c;
				$viewpath ='vuser/vadmin/testapproveform';
				$content = View::factory($viewpath);
				$content->bind('objtest',$objtest);
				$content->bind('objaliasname',$objaliasname);
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	
	private function displaytestlist($viewname)
	{
		try
		{
				$viewpath ='vuser/vadmin/'.$viewname;
				$content = View::factory($viewpath);
				$refer = $_SERVER['HTTP_REFERER'];
				$activationcode=$_POST['activationstatus'];
				$drugname=$_POST['drugname'];
				//var_dump($viewpath);
				//var_dump($_POST['activationstatus']);
				$pos = strpos($refer, "/ayushman/");
				$refer = substr($refer, 0,$pos );
				$content->bind('refer',$refer);	
				$content->bind('activationcode',$activationcode);	
				$content->bind('drugname',$drugname);	
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
		private function displaytestlistoftests($viewname)
	{
		
		try
		{
				$viewpath ='vuser/vadmin/'.$viewname;
				$content = View::factory($viewpath);
				$refer = $_SERVER['HTTP_REFERER'];
				
				$testobjs=ORM::factory('testmaster')->where('active_c',"=",'1')->find_all()->as_array();
					//var_dump($testobjs); die;
				$arraytest = array();
				$testforactivations=ORM::factory('testmaster')->where('active_c',"=",'0')->find_all()->as_array();
				$gridfortest=array();
				
					$temp=array();
					foreach($testforactivations as $testforactivation )
					{	
						$temp=array("id"=>$testforactivation->id,"Country"=>$testforactivation->testname_c,'amount'=>$testforactivation->testname_c,"tax"=>$testforactivation->sample_c,"action"=>$testforactivation->id);
						array_push($gridfortest,$temp);
					
						
						
					}
					foreach($testobjs as $testobj )
					{	
						$temp=array("id"=>$testobj->id,"name"=>$testobj->testname_c);
						array_push($arraytest,$temp);
					
						
						
					}	
					$arraytest=json_encode($arraytest);
					$gridfortest=json_encode($gridfortest);
				//var_dump($gridfortest); die;
				$pos = strpos($refer, "/ayushman/");
				$refer = substr($refer, 0,$pos );
				$content->bind('refer',$refer);	
				$content->bind('arraytest',$arraytest);		
				$content->bind('gridfortest',$gridfortest);			
			
				$this->template->content = $content;
				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	
	}
	public function action_download()
	{
			$drugstatus = $_GET['drugstatus'];
			$fromid = $_GET['fromid'];
			$toid = $_GET['toid'];
			$table = "newaddeddrug";
			//$columns = "DrugName_c,drugGenericName_c,drugSystem_c,drugCategory_c,drugForm_c,drugStrength_c,modeOfIntake_c,sideEffects_c,cautions_c,id,createdby_c";
			// Added columns to upload pricelist and also for bulk rejection 
			$columns = "DrugName_c,drugGenericName_c,drugSystem_c,drugCategory_c,drugForm_c,drugStrength_c,modeOfIntake_c,sideEffects_c,cautions_c,id,createdby_c,packageunit_c,priceperpackageunit_c,minorderunit_c,priceperminorderunit_c,status_c";
			$groupby = '';
			$sidx = 'id'; 
			$sord = 'asc'; 	
			if($drugstatus == "")
				$whereclause = '[active_c,=,-1]';
			else
				$whereclause = '[active_c,=,'.$drugstatus.']';
			
			if($fromid != "")
				$whereclause = $whereclause.'[id,>,'.$fromid.']';
			if($toid != "")
				$whereclause = $whereclause.'[id,<,'.$toid.']';
				
			$jqgriddata=new Model_xjqgridgetdata;
			
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$result[0][0]="Brand name";
			$result[0][1]="Generic Name";
			$result[0][2]="System";
			$result[0][3]="Category";
			$result[0][4]="Form";
			$result[0][5]="Strength";
			$result[0][6]="Instruction";
			$result[0][7]="Side Effects";
			$result[0][8]="Cautions";
			$result[0][9]="Drugid";
			$result[0][10]="Created By";
		// modified to include the drug prices
			$result[0][11]="Package Unit";
			$result[0][12]="Package Price";
			$result[0][13]="Min Order Qty";
			$result[0][14]="Price of Min Order Qty";
			$result[0][15]="Status";
		
			$date = date_create();
			export::toexcel($result,'Medicines_'.date_timestamp_get($date).'.xls');
	}
	public function action_upload()
	{
		
			if($_POST)
					{  
						$file = new helper_Files();
						$return = $file->saveTempFile($_FILES['zip_file']);
						
						$this->exceltodatabase($return['path']);
						$this->displaytestlist('vdrugmastersupdate');
					}

			
		else
		{
			
			$this->displaytestlist('vdrugmastersupdate');
		}
    }
	
	public function exceltodatabase($filename)
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
				//  Loop through each row of the worksheet in turn
				/*$header=array('Brand name','Generic Name','System','Category','form','Strength','Dosage','Instruction','Side Effects','Cautions_c','drugid');
				$row=0;
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
				if($rowData[0]!=$header)
				{
					$statuscode="Invalid file Header ";					
					echo "<script type='text/javascript'>alert('$statuscode');</script>";
					die;
				}
				else
				{*/
				for ($row = 2; $row <= $highestRow; $row++)
				{ 
				//  Read a row of data into an array
				$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
									//var_dump($rowData); die;
				$brandname = $rowData[0][0];
				$genericname = $rowData[0][1];
				$category	= $rowData[0][3];
				$form	= $rowData[0][4];
				$strength = $rowData[0][5];
				$instruction = $rowData[0][6];
				$sideeffects = $rowData[0][7];
				$caution = $rowData[0][8];
				
				if(isset($rowData[0][9]))
				$drugid =$rowData[0][9];
				else 
				$drugid= -1;
				// Added to upload drug prices
				$packageunit= $rowData[0][11];
				$priceperpackageunit = $rowData[0][12];
				$minorderunit = $rowData[0][13];
				$priceperminorderunit = $rowData[0][14];
				$status = $rowData[0][15];
				//done
				//$arraydata=array($brandname,$genericname,$category,$form,$strength,$instruction,$sideeffects,$caution,$drugid);
				$arraydata=array($brandname,$genericname,$category,$form,$strength,$instruction,$sideeffects,$caution,$drugid,$packageunit,$priceperpackageunit,$minorderunit,$priceperminorderunit,$status);
				$chckforerrors=1;
				
				if($drugid!=-1)
				{
				$objid=ORM::factory('drugmaster')->where('id','=',$drugid)->find();
				$objid->DrugName_c=$brandname;
					$objid->drugGenericName_c=$genericname;
					
					if(!(ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id))
					{ 
						$categoryname=ORM::factory('drugcategorymaster');
						$categoryname->drugcategoryname_c=$category;
						
						$objid->drugCategory_c=$categoryname->id;
						$categoryname->save();
					}
					else
					{
						$objid->drugCategory_c= ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id;
					}
					if(!(ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id))
					{
					}
					else
					{
						$objid->drugForm_c= ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id;
					}
					$objid->drugStrength_c=$strength;
					// Added to set the active_c flag 
					if($status=='Approved')
					{
						$objid->active_c = 1;
					}
					elseif ($status=='Reject')
					{
						$objid->active_c = 0;
					}
					else
					{
						$objid->active_c = -1;
					}
					//done
					//$objid->active_c=1;
					$objid->modeOfIntake_c=$instruction;
					$objid->sideEffects_c=$sideeffects;
					$objid->cautions_c=$caution;
					// Added for Price upload
					$objid->packageunit_c = $packageunit;
					$objid->priceperpackageunit_c = $priceperpackageunit;
					$objid->minorderunit_c =$minorderunit;
					$objid->priceperminorderunit_c =$priceperminorderunit;
					//Addition ends
					
					$drugidfinal=$objid->id;
					$objid->save();
					$statuscode="Record Validated And Updated";
					
				}
				else
				{
				$objuser=ORM::factory('drugmaster')->where('DrugName_c','=',$brandname)->where('drugGenericName_c','=',$genericname)->where('drugStrength_c','=',$strength)->find();
				
				if(!$objuser->id)
				{ 
					$objuser=ORM::factory('drugmaster');
					$objuser->DrugName_c=$brandname;
					$objuser->drugGenericName_c=$genericname;
					
					if(!(ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id))
					{ 
						$categoryname=ORM::factory('drugcategorymaster');
						$categoryname->drugcategoryname_c=$category;
						
						$objuser->drugCategory_c=$categoryname->id;
						$categoryname->save();
					}
					else
					{
						$objuser->drugCategory_c= ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id;
					}
					if(!(ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id))
					{
					}
					else
					{
						$objuser->drugForm_c= ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id;
					}
					$objuser->drugStrength_c=$strength;
					
					// Approving /Rejecting record
					
					if($status=='Approved')
					{
						$objuser->active_c = 1;
					}
					elseif ($status=='Reject')
					{
						$objuser->active_c = 0;
					}
					else
					{
						$objuser->active_c = -1;
					}
					//done
					//$objuser->active_c=1;
					$objuser->modeOfIntake_c=$instruction;
					$objuser->sideEffects_c=$sideeffects;
					$objuser->cautions_c=$caution;
					$drugidfinal=$objuser->id;
					$objuser->save();
					$statuscode="Record Added";
					
				}
				
				else
				{
					if(!(ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id))
					{
						$categoryname=ORM::factory('drugcategorymaster');
						$categoryname->drugcategoryname_c=$category;
						
						$objuser->drugCategory_c=$categoryname->id;
						$categoryname->save();
					}
					else
					{
						$objuser->drugCategory_c= ORM::factory('drugcategorymaster')->where('drugcategoryname_c','=', $category)->find()->id;
					}
					if(!(ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()))
					{
					}
					else
					{
						$objuser->drugForm_c= ORM::factory('drugformmaster')->where('drugform_c','=', $form)->find()->id;
					}
					//$objuser->drugStrength_c=$strength;
					if($status=='Approved')
					{
						$objuser->active_c = 1;
					}
					elseif ($status=='Reject')
					{
						$objuser->active_c = 0;
					}
					else
					{
						$objuser->active_c = -1;
					}
										
					//done
					//$objuser->active_c=1;
					$objuser->modeOfIntake_c=$instruction;
					$objuser->sideEffects_c=$sideeffects;
					$objuser->cautions_c=$caution;
					$drugidfinal=$objuser->id;
					$objuser->save();
					$statuscode="Already existing Record Updated";
					
				}
				}
			$objPHPExcel->setActiveSheetIndex(0);
			//$objPHPExcel->getActiveSheet()->SetCellValue('k'.$row, $drugidfinal);	
			$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$row, $drugidfinal);	
			//$objPHPExcel->getActiveSheet()->SetCellValue('L'.$row, $statuscode);	
			$objPHPExcel->getActiveSheet()->SetCellValue('R'.$row, $statuscode);	
			}
			
			$date = date('Y_m_d_H_i');
			$file = "Med_update_".$date.".xlsx";
			
			$objPHPExcel->getActiveSheet()->setTitle('sheet');
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			$objWriter->save(str_replace('.php', '.xlsx', $file));
			if (file_exists($file)) 
			{
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				exit;
			}
			die('done');
        //}
	}
}