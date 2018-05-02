<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ctestreports extends Controller {

	public function action_upload()
	{		
		if($_POST)
		{
			echo "post";
			if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 1048576))
			{
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
				}
				else
				{
					if (file_exists("upload/" . $_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else
					{
						$uploaddestination =  DOCROOT."ayushman/reports/";
						try
						{
							if( move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddestination . $_FILES["file"]["name"]))
							{
								$filenm =$_FILES["file"]["name"];
								$fileext = explode('.',$filenm);
								rename(DOCROOT."ayushman/reports/".$_FILES["file"]["name"],DOCROOT."ayushman/reports/".$_FILES["file"]["name"]);
								
								//$objtestreport = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid);
								//$objtestreport = $objtestreport->find();
								//$pathologistid = $pathologist->id;
								
								
								//$obj_user->photo_c = "http://".$_SERVER["HTTP_HOST"]."/ayushman/reports/".$_FILES["file"]["name"].".".$fileext[1];
								//$obj_user->save();
							}			  				      	
							else
								echo "ERROR";
						}
						catch(Exception $e)
						{
							echo $e;
						}		      
					}
				}
			}
			else
			{
				echo "Invalid file should be less than 1 mb";
			}
		}
	}
} 
