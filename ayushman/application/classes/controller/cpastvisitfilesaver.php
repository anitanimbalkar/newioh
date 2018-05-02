<?php defined('SYSPATH') or die('No direct script access.');
require_once('simple_html_dom.php');

class Controller_Cpastvisitfilesaver extends Controller {
	public function action_saveprescription()
	{
		$obj_user 	= Auth::instance()->get_user();
		$userid		= $obj_user->id;
		$pages		= $_POST["prescriptionpagesno"];
		$appid		= $_GET["appid"];
		
		$completePrescriptions = ORM::factory('patientprescriptionsnapshot');
		$completePrescriptions = $completePrescriptions->where('refappointmentidforprescriptionsnapshots_c','=',$appid)->find();
		
		$prescriptionPages = ORM::factory('patientprescriptionfilessnapshot')->where('refpatientprescriptionsnapshotsid','=',	$completePrescriptions->id)->find_all();
		
		foreach ($prescriptionPages as $orm)
		{
			$orm->delete();
		}
		
		if($completePrescriptions->loaded())
			$completePrescriptions->delete();
		
		$completePrescriptions = ORM::factory('patientprescriptionsnapshot');
		$completePrescriptions->refappointmentidforprescriptionsnapshots_c = $appid;
		$completePrescriptions->save();
		$prescriptionsnapshotid	= $completePrescriptions->id;
		
		$html = "";
		for($page=0;$page< $pages;$page++)
		{
			if($_FILES["file".$page]["name"])
			{
				for($i=0;$i<count($_FILES["file".$page]['name']);$i++)
				{
					if($_FILES["file".$page]["name"] != "")
					{
						if ((($_FILES["file".$page]["type"] == "image/gif") || ($_FILES["file".$page]["type"] == "image/jpeg") || ($_FILES["file".$page]["type"] == "image/x-png") || ($_FILES["file".$page]["type"] == "image/png") || ($_FILES["file".$page]["type"] == "image/pjpeg")) && ($_FILES["file".$page]["size"] < 10485760))
						{
							if ($_FILES["file".$page]["error"] > 0)
							{
								echo "Return Code: " . $_FILES["file".$page]["error"][$i] . "<br />";
							}
							else
							{
								$files = new helper_Files();
								$return = $files->saveTempFile($_FILES["file".$page]);
								$html = $html."<img src='"."http://localhost/ayushman/".$return["abspath"]."'/>";
							}
						}else if(($_FILES["file".$page]["type"] == "application/pdf")){
							$files = new helper_Files();
							$return = $files->saveFileToSpecificFolder($_FILES["file".$page],"Documents");
							
							$response_savepdf = $this->savepdf($return["filename"],$appid,$return["id"]);
							$return = $files->getFilePath($return['id']);
							
							$completePrescriptions->pdfpath_c = $return['abspath'];
							$completePrescriptions->save();

							Request::current()->redirect("cuploadpastvisit/uploadpastvisit");
						}
						else
						{
							echo "Invalid file uploaded";
							die;
						}
					}
				}
			}
		}
		
		$objHtml 	= new simple_html_dom();
		$objHtml->load($html);
	
		$files = new helper_Files();
		$return = $files->savePdfFile($objHtml);
		$response_savepdf = $this->savepdf($return["filename"],$appid,$return["id"]);
		$return = $files->getFilePath($return['id']);
		
		$completePrescriptions->pdfpath_c = $return['abspath'];
		$completePrescriptions->save();

		Request::current()->redirect("cuploadpastvisit/uploadpastvisit");
	}
	
	
	
	public function savepdf($name,$appid,$id)
	{
		$strname	= $name;
		$intAppId	= $appid;

		$objfile = ORM::factory('Appointmentupload')->where('refappuploadappointmentsid_c','=',$intAppId)->find();
	
		$objfile->refappuploadappointmentsid_c = $intAppId;
		$objfile->uploadedfile_c = $strname;
		$objfile->fileid_c = $id;
		$objfile->save();
		return ($strname);
	}
	
	public function action_savereport()
	{
		$obj_user = Auth::instance()->get_user();
		$userid=$obj_user->id;
		var_dump($_POST);
		print_r($_FILES);
		$numberoftest=$_POST["testnumberselect"];
		$appid=$_POST["selectedappid"];
		$objOrm = ORM::factory('patientarchivereport');
		$objOrm->where('refappointmentidforreports_c','=',$appid);
		foreach ($objOrm->find_all() as $orm)
		{
			$orm->delete();
		}
		$objOrm = ORM::factory('patientarchivereportsspanshot');
		$objOrm->where('refarchiveappointmentid_c','=',$appid);
		foreach ($objOrm->find_all() as $orm)
		{
			$orm->delete();
		}
		$creatallreportfile="";
		$filetype = '';
		$filename = '';
		
		for($testnumber=0;$testnumber < $_POST["testnumberselect"];$testnumber++)
		{
			$createimg="";
			
			for($page=0;$page< $_POST["selectreport".$testnumber."pages"];$page++)
			{
	
				if($_FILES["report".$testnumber."page".$page]["name"])
				{
					for($i=0;$i<count($_FILES["report".$testnumber."page".$page]['name']);$i++)
					{	
						if($_FILES["report".$testnumber."page".$page]["name"] != "")
						{ 
							$filetype = $_FILES["report".$testnumber."page".$page]["type"];
							
							if (( ($_FILES["report".$testnumber."page".$page]["type"] == "image/gif") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/jpeg") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/x-png") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/png") || ($_FILES["report".$testnumber."page".$page]["type"] == "image/pjpeg")) && ($_FILES["report".$testnumber."page".$page]["size"] < 10485760))
							{
								if ($_FILES["report".$testnumber."page".$page]["error"] > 0)
								{
									echo "Return Code: " . $_FILES["report".$testnumber."page".$page]["error"][$i] . "<br />";
								}
								else
								{		  
									if(!is_dir(DOCROOT."pastvisit/"))
									{
										mkdir(DOCROOT."pastvisit/");
										if(!is_dir(DOCROOT."pastvisit/report"))
										mkdir(DOCROOT."pastvisit/report");
									}
									else
									{
										if(!is_dir(DOCROOT."pastvisit/report"))
										mkdir(DOCROOT."pastvisit/report");
									}
									$uploaddestination =  DOCROOT."pastvisit/report/";
									$a=  getdate();
									$timestamp = $a[0];
									if( move_uploaded_file($_FILES["report".$testnumber."page".$page]["tmp_name"], $uploaddestination.$timestamp."_".$_FILES["report".$testnumber."page".$page]["name"]))
									{
										$filenm =$_FILES["report".$testnumber."page".$page]["name"];
										$createimg=$createimg.'<table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" ><tr><td  align="center" valign="top"  ><img id="imgpatientphoto" src="'.$timestamp.'_'.$_FILES["report".$testnumber."page".$page]["name"].'" ></img></td></tr><tr><td  align="center" valign="top" style="margin-left:1%;font:bold;font-size:10pt;font-family:arial;font-weight:bold;" >Page Number '.$page.'</td></tr><tr><td>&nbsp;</td></tr></table><h1 class="break"></h1>';
										$reportnumber=$testnumber+1;
										$reportpage=$page+1;
										$creatallreportfile=$creatallreportfile.'<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" ><tr><td style="text-align:center;height:800px; width:100%;"><img id="imgpatientphoto" src="'.$timestamp.'_'.$_FILES["report".$testnumber."page".$page]["name"].'" style="align:center;"></img></td></tr><tr><td style="text-align: center;width:100%;"style="margin-left:1%;font:bold;font-size:10pt;font-family:arial;font-weight:bold;">Report Number '.$reportnumber.', Page Number '.$reportpage.'</td></tr><tr><td>&nbsp;</td></tr></table><h1 class="break"></h1>';
									}
									else
										echo "ERROR";
								} 
							}
							else if(($_FILES["report".$testnumber."page".$page]["type"] == "application/pdf") && ($_FILES["report".$testnumber."page".$page]["size"] < 10485760)){
								if(!is_dir(DOCROOT."pastvisit/"))
								{
									mkdir(DOCROOT."pastvisit/");
									if(!is_dir(DOCROOT."pastvisit/report"))
									mkdir(DOCROOT."pastvisit/report");
								}
								else
								{
									if(!is_dir(DOCROOT."pastvisit/report"))
									mkdir(DOCROOT."pastvisit/report");
								}
								$uploaddestination =  DOCROOT."pastvisit/report/";
								$a=  getdate();
								$timestamp = $a[0];
								if( move_uploaded_file($_FILES["report".$testnumber."page".$page]["tmp_name"], $uploaddestination.$timestamp."_".$_FILES["report".$testnumber."page".$page]["name"]))
								{
									$filenm =$_FILES["report".$testnumber."page".$page]["name"];
									$filename = $timestamp."_".$_FILES["report".$testnumber."page".$page]["name"];
								}
								else
									echo "ERROR";
							}else{
								echo "Invalid file should be less than 1 mb";
							}
						}
					}
				}
			}
			if($createimg !="" && $filetype != "application/pdf")
			{
			
				$html = new simple_html_dom();
				$html->load_file("application/views/vtemplates/vtemplateeachtestpdf.php");
				$ret = $html->find('div');
			
				foreach($ret as $element)
				{
					if($element->id=="image"){
						$element->innertext=$createimg;	
						}						
				}
				$html->save('pastvisit/report/patient'.$userid.'appid'.$appid.'archivereport'.$testnumber.'.html');
				
				$pathhtml="pastvisit/report/patient".$userid."appid".$appid."archivereport".$testnumber.".html";
				$pathpdf=DOCROOT."pastvisit/report/patient".$userid."appid".$appid."archivereport".$testnumber.".pdf";
				exec('/usr/local/bin/wkhtmltopdf  "'.$pathhtml.'" "'.$pathpdf.'"'  ,$op);
				//exec('wkhtmltopdf "'.$pathhtml.'" "'.$pathpdf.'"',$op);
				$response_savepdf ='ayushman/pastvisit/report/patient'.$userid.'appid'.$appid.'archivereport'.$testnumber.'.pdf';
				$objpatientarchivereport = new Model_patientarchivereport;
				$objpatientarchivereport->testname_c=$_POST["testname".$testnumber];
				$objpatientarchivereport->pathologistname_c=$_POST["labname".$testnumber];
				$testdate =$_POST['testdate'.$testnumber];
				$testdate = date('Y-m-d',strtotime($testdate));
				$objpatientarchivereport->dateoftest_c=$testdate;
				$objpatientarchivereport->refrencenumberfortest_c=$_POST["referenceno".$testnumber];
				$objpatientarchivereport->path_c=$response_savepdf;	
				$objpatientarchivereport->refappointmentidforreports_c=$appid;
				$objpatientarchivereport->save();
			}else{
				$objpatientarchivereport = new Model_patientarchivereport;
				$objpatientarchivereport->testname_c=$_POST["testname".$testnumber];
				$objpatientarchivereport->pathologistname_c=$_POST["labname".$testnumber];
				$testdate =$_POST['testdate'.$testnumber];
				$testdate = date('Y-m-d',strtotime($testdate));
				$objpatientarchivereport->dateoftest_c=$testdate;
				$objpatientarchivereport->refrencenumberfortest_c=$_POST["referenceno".$testnumber];
				$objpatientarchivereport->path_c='ayushman/pastvisit/report/'.$filename;	
				$objpatientarchivereport->refappointmentidforreports_c=$appid;
				$objpatientarchivereport->save();
				
				$objpatientarchivereportsspanshot = new Model_patientarchivereportsspanshot;
				$objpatientarchivereportsspanshot->path_c = 'ayushman/pastvisit/report/'.$filename;
				$objpatientarchivereportsspanshot->refarchiveappointmentid_c=$appid;
				$objpatientarchivereportsspanshot->save();
			}
		}
		if($creatallreportfile !="" && $filetype != "application/pdf")
		{			
			$html = new simple_html_dom();
			$html->load_file("application/views/vtemplates/vtemplateeachtestpdf.php");
			$ret = $html->find('div');
			foreach($ret as $element) 
			{
				if($element->id=="image")
				{
					$element->innertext=$creatallreportfile;
				}
			}
			$html->save('pastvisit/report/appreportforuserid'.$userid.'appid'.$appid.'.html');		
			$pathhtml="pastvisit/report/appreportforuserid".$userid."appid".$appid.".html";
			$pathpdf=DOCROOT."pastvisit/report/appreportforuserid".$userid."appid".$appid.".pdf";
			exec('/usr/local/bin/wkhtmltopdf  "'.$pathhtml.'" "'.$pathpdf.'"'  ,$op);
			//exec('wkhtmltopdf "'.$pathhtml.'" "'.$pathpdf.'"',$op);	
			$response_savepdf ='ayushman/pastvisit/report/appreportforuserid'.$userid.'appid'.$appid.'.pdf';
			$objpatientarchivereportsspanshot = new Model_patientarchivereportsspanshot;
			$objpatientarchivereportsspanshot->path_c=$response_savepdf;
			$objpatientarchivereportsspanshot->refarchiveappointmentid_c=$appid;
			$objpatientarchivereportsspanshot->save();
		}	
		Request::current()->redirect("/cuploadpastvisit/uploadpastvisit");
	}
}