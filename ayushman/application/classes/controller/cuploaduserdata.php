<?php defined('SYSPATH') or die('No direct script access.');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/Excel/excel_reader.php');
class Controller_Cuploaduserdata extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$msg="";
		$this->display($errors,$messages,$msg);
		
		
	}
		
	
	
	public function action_savesocialhabbits($id,$tobacco,$alcohol,$smoking,$diet,$exercise,$outdoorsports)
	{
		
		//save habits
		//$objuser 	= new Model_Patient;
 		$objuser = ORM::factory('testingforpath')->where('iohid','=',$id)->find();
		$objuser ->tobacco_c	= $tobacco;
		$objuser ->alcohol_c	= $alcohol;
		$objuser ->smoking_c	= $smoking;
		$objuser ->diet_c		= $diet;
		$objuser ->exercisepatterns_c	= $exercise;
		$objuser ->outdoorsport_c		= $outdoorsports;
		$objuser->save();
	}
	public function action_saveallergies()
	{
		//$objPatient 	= new Model_Patient;
		$objuser = ORM::factory('testingforpath')->where('iohid','=',$id)->find();
 		//$patientid		= $objPatient->where('repatientsuserid_c','=',Auth::instance()->get_user()->id)->find();
		$allergies		= explode(',',$_GET["allergies"]);
		$objpatallergy	= new Model_Patientallergy;

		//delete all allergies if exists
		$objpatallergy->where('refpatallergypatientsid_c','=',$patientid);
		foreach($objpatallergy->find_all() as $res){
			$res->delete();
		}

		//save allergy
		foreach( $allergies as $allergy){
			if($allergy != ''){
				$objpatallergy = new Model_Patientallergy;
				$objpatallergy->refpatallergypatientsid_c = $patientid;
				$objpatallergy->refpatallergyid_c= $allergy;
				$objpatallergy->save();
			}
		}
	}
	 public function exceltodatabase()
		{
			
			$excel = new PhpExcelReader;
			$array_files = Kohana::$config->load('application');
			
			$excel->read($array_files["Documents"].'zip/testpath/testpath.xls');   // reads and stores the excel file data
			for ($x = 1; $x <= count($excel->sheets[0]["cells"]); $x++)
			{
			$id = $excel->sheets[0]["cells"][$x][1];
			$fileinexcel = $excel->sheets[0]["cells"][$x][2];
			$tobacco	= $excel->sheets[0]["cells"][$x][18];
			$alcohol	= $excel->sheets[0]["cells"][$x][17];
			$smoking	= $excel->sheets[0]["cells"][$x][16];
			$diet		= $excel->sheets[0]["cells"][$x][15];
			$exercise	=$excel->sheets[0]["cells"][$x][19];
			$outdoorsports	= $excel->sheets[0]["cells"][$x][20];
			$timestamp = time();
			$filefinal= $timestamp.$fileinexcel;
			action_savesocialhabbits($id,$tobacco,$alcohol,$smoking,$diet,$exercise,$outdoorsports);
			
			
			
			
			copy($array_files["Documents"].'zip/testpath/images/'.$fileinexcel, $array_files["pastvisit"].'report/'.$filefinal);
			$objtest = ORM::factory('testingforpath')->where('iohid','=',$id)->find();
			$objtest->path='report/'.$filefinal;
			$objtest->save();
			
			}
			
		}
		
	
	
	public function exceltoarray($inputFileName)
	{
	//var_dump($inputFileName); die;
			$output=helper_import::excel($inputFileName);
			return($output);
	}
	public function ValidateZip($path)
	{   $count=0;
	    
		$filesInDir = scandir($path);
		//var_dump($path);
		foreach($filesInDir as $file)
		{
			//$file = explode('/', $file);
			// get filename without path
			//$file = last($file);
            $file = explode('.', $file);
			// check if filename is in array
			if($file[count($file)-1]=="xlsx" or $file[count($file)-1]=="xls"  )
			{
			$count++;
			}
			
		}
		
	 return($count);
	}
	
	private function display($errors, $messages,$msg){
		$content = View::factory('vuser/vadmin/vuploaduserdata');
		$this->template->content = $content;
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('msg',$msg);
		
	    //$this->exceltodatabase();
		//die;
	}
	public function action_upload()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		if($_POST)
		{
			function recursive_dir($dir) 
			{
				foreach(scandir($dir) as $file) 
				{
					if ('.' === $file || '..' === $file) continue;
					if (is_dir("$dir/$file")) recursive_dir("$dir/$file");
					else unlink("$dir/$file");
				}
				rmdir($dir);
			}

			if($_FILES["zip_file"]["name"]) 
			{
				$filename = $_FILES["zip_file"]["name"];
				$source = $_FILES["zip_file"]["tmp_name"];
				$type = $_FILES["zip_file"]["type"];
				$name = explode(".", $filename);
				$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
				foreach($accepted_types as $mime_type) 
				{
					if($mime_type == $type) 
					{
						$okay = true;
						break;
					}
				}

				$continue = strtolower($name[1]) == 'zip' ? true : false;
				if(!$continue) 
				{
					$myMsg = "Please upload a valid .zip file.";
				}

				/* PHP current path */
				$array_files = Kohana::$config->load('application');
				$path = $array_files["Documents"].'zip/'; 
				//var_dump($path); die;
				$filenoext = basename ($filename, '.zip'); 
				$filenoext = basename ($filenoext, '.ZIP');
				$myDir = $path . $filenoext; // target directory
				$myFile = $path . $filename; // target zip file
				if (is_dir($myDir)) recursive_dir ( $myDir);
				// var_dump($myDir); die; 
				mkdir($myDir, 0777);
				/* here it is really happening */
				
				
				
				if(move_uploaded_file($source, $myFile)) 
				{
					$zip = new ZipArchive();
					$x = $zip->open($myFile); // open the zip file to extract
					if ($x === true) 
					{
						$zip->extractTo($myDir); // place in the directory with same name
						$zip->close();
						unlink($myFile);
					}
					$myMsg = "Your .zip file uploaded and unziped.";
					$count= $this->ValidateZip($myDir);
					if($count==1)
					{
						$myMsg="Zip file contain 1 excel file";
						$filesInDir = scandir($myDir);
						//var_dump($myDir);die;
						foreach($filesInDir as $file)
						{    $filenamewithext=explode('/', $file);
							$file = explode('.', $file);
							// check if filename is in array
							if($file[count($file)-1]=="xlsx" or $file[count($file)-1]=="xls"  )
							{   
								$outputarray=$this->exceltoarray($myDir.'/'.$filenamewithext[0]);
								//var_dump($outputarray); die;
								$outputxml=ArrayToXML::toXml($outputarray);
								$timestamp = time();
								$temp = $timestamp.'.xml';
								//var_dump($temp); die;
								$file = $array_files["Documents"].'xml/'.$temp;
								file_put_contents($file, $outputxml);
								helper_import::Validatexml($file);
								$msg=""; 
							}
							
						}
						//var_dump($myMsg); die;
					}
					else if($count==0)
					{
						$msg="Zip file contain no excel file";
						recursive_dir($myDir);
						//var_dump($myMsg); die;
					}
					else 
					{ $msg="Zip file contain more than 1 excel file";
						
					}
				}
				else 
				{	
					
					$msg = "There was a problem with the upload.";
					recursive_dir($myDir);
					//var_dump($myMsg); die;
				}
				//var_dump($msg);die;
				$this->display($errors,$messages,$msg);
			}

			
		}		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages,$msg);
		}
		
	}
	
	
	}
	
	