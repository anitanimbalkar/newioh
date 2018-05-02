<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cimagedisplay extends Controller {

	public function action_display()
	{	 
		if($_GET)
		 $userid = $_GET['userid'];
		
		$user = new Model_User;
		$user->where('id','=',$userid)->find();
							
		echo "<img src = '".$user->photo_c."' height='100%' width='100%' />";
		
		
	}
	public function action_uploadtext()
	{
		
		if($_GET)
		{
			$userid = $_GET['userid'];
			$docprofile = $_GET['docprofile'];
			$content = View::factory("vuser/vuploadtxtfile");
			$content->bind("userid",$userid);
			$content->bind("docprofile",$docprofile);
			$this->response->body($content);
			
		}	 
		if($_POST)
		{
		  if($_FILES["file"]["type"] == "text/plain")
		  {
		  	if ($_FILES['file']['error'] == UPLOAD_ERR_OK       
      			&& is_uploaded_file($_FILES['file']['tmp_name']))
			{
				echo file_get_contents($_FILES['file']['tmp_name']); 
				die("");
			}
		  }
		  else
		  {
		  	echo "Please upload file in .txt format only";
		  }
		}
	}
	
	
	public function action_uploadimage()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objUser = ORM::factory('user')->where('id','=',$userid)->find();
			$userphoto = $objUser->photo_c;
			$content = View::factory("vuser/vuploadfile");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close

	
	public function action_uploadstaffprofile()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objUser = ORM::factory('user')->where('id','=',$userid)->find();
			$userphoto = $objUser->photo_c;
			$content = View::factory("vuser/vstaff/vuploadstaffprofile");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	public function action_uploadimagewhileregistration()
	{	
		if($_GET)
		{
			
			$content = View::factory("vuser/vstaff/vuploadprofileimagebystaff");
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_uploadimagefromcam()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objUser = ORM::factory('user')->where('id','=',$userid)->find();
			$userphoto = $objUser->photo_c;
			$content = View::factory("vuser/vtakephoto");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		
	}//function close	
	public function action_uploaddoctorheaderimage()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$userphoto = $objdoctor->header_c;
			$content = View::factory("vuser/vdoctor/vuploadheader");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_uploaddoctorfooterimage()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$userphoto = $objdoctor->footer_c;
			$content = View::factory("vuser/vdoctor/vuploadfooter");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_uploadsignimage()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userid)->find();
			$userphoto = $objdoctor->signature_c;
			$content = View::factory("vuser/vdoctor/vuploadsign");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	public function action_uploadsignatureimage()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
			$userphoto = $objdoctor->signature_c;
			$content = View::factory("vuser/vpathologist/vuploadsignature");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	public function action_uploadHeader()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			
			$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
			$userphoto = $objdoctor->header_c;
			$content = View::factory("vuser/vpathologist/vuploadheader");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			//$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	public function action_uploadIcardHeader()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$userphoto = $objstaff->icardheader_c;
			$content = View::factory("vuser/vstaff/vuploadicardheader");
			$content->bind("userid",$userid);
			
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			//$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_uploadFooter()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$userid)->find();
			$userphoto = $objdoctor->header_c;
			$content = View::factory("vuser/vpathologist/vuploadfooter");
			$content->bind("userid",$userid);
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_uploadIcardFooter()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$userphoto = $objstaff->icardheader_c;
			$content = View::factory("vuser/vstaff/vuploadicardfooter");
			$content->bind("userid",$userid);
			
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	
	public function action_UploadIcardReverseSide()
	{	
		if($_GET)
		{
			$session = Session::instance();
			$session->set('uploadphoto_userid', $_GET['userid']);
			
			$userid = $_GET['userid'];
			
			$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$userid)->find();
			$userphoto = $objstaff->reversesideimage_c;
			$content = View::factory("vuser/vstaff/vuploadicardreversesideimage");
			$content->bind("userid",$userid);
			
			$content->bind("userphoto",$userphoto);
			$this->response->body($content);
		}
		if($_POST)
		{
			// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		}//post close
	}//function close
	public function action_upload()
	{
		// list of valid extensions, ex. array("jpeg", "xml", "bmp")
			$allowedExtensions = array();
			// max file size in bytes
			$sizeLimit = 5 * 1024 * 1024;

			$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
			$result = $uploader->handleUpload('files/temp/');
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	}
	 
	public function action_saveimageondisk()
	{
		
		
		// You destination directory (i.e) images are to be stored here
		$upload_directory = "files/temp"; 			
		//The full path to the image will be saved
		$upload_directory_path = $upload_directory."/";
		// The prefix name to large images
		$l_img_prefix =  	'';		
		// Here you can prefix for the cropped image name	
		// Here you can prefix for the cropped image name
		if($_POST["flag"]=='uploadprofileimage'){
			$randNumber = rand (1, 9999);
			$thb_image_prefix = "staffupload_".$randNumber;
		}
		// New name of the large image (append the timestamp to the filename)	
		$l_img_name = $l_img_prefix.$_POST['filename']; 
		// New name of the thumbnail image (append the timestamp to the filename)
		$thb_image_name = $thb_image_prefix.$_POST['filename'];  
		$filename=$_POST['filename'];
		
		$img=$_POST['Image'];
		$upload_tempDirectory=$_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name;
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $upload_tempDirectory;
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
		$session = Session::instance();
		
		// Find existing data
		$session->set('path','/ayushman/assets/userphotos/'.$thb_image_name);

		
		//$_SESSION['path']='/ayushman/assets/userphotos/'.$thb_image_name;
		if (isset($_POST["filename"]) )
		{
			if($_POST["flag"]){
				$flag=$_POST["flag"];
				if($flag =='uploadprofileimage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
				
					$filepath = '/ayushman/assets/userphotos/'.$thb_image_name;
					
				}
				die();
		}
	} 
}	 
public function action_images(){
}
	public function action_crop(){
	
		
		// You destination directory (i.e) images are to be stored here
		$upload_directory = "files/temp"; 			
		//The full path to the image will be saved
		$upload_directory_path = $upload_directory."/";
		// The prefix name to large images
		$l_img_prefix =  	'';		
		// Here you can prefix for the cropped image name
			if($_POST["flag"]=='uploadprofileimage'){
				$randNumber = rand (1, 9999);
				$thb_image_prefix = "thumb_".$randNumber;
			}elseif($_POST["flag"]=='uploadstaffprofileimage'){
				$randNumber = rand (1, 9999);
				$thb_image_prefix = "staffprofile_".$randNumber;
			}elseif($_POST["flag"]=='UploadDoctorHeaderImage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_Doctor_header_".$randNumber;
				
			}elseif($_POST["flag"]=='UploadDoctorFooterImage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_Doctor_footer_".$randNumber;
				
			}elseif($_POST["flag"]=='UploadIcardFooterImage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objstaff->id."_Icard_footer_".$randNumber;
				
			}elseif($_POST["flag"]=='UploadIcardHeaderImage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objstaff->id."_Icard_header_".$randNumber;
				
			}elseif($_POST["flag"]=='UploadIcardReverseSideImage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objstaff->id."_Icard_Reverse_".$randNumber;
				
			}elseif($_POST["flag"]=='uploadheaderimage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_header_".$randNumber;
				
			}else if($_POST["flag"]=='uploadfooterimage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_footer_".$randNumber;
			}else if($_POST["flag"]=='uploadpathsignimage'){
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_pathSignature_".$randNumber;
			}
			else{
				$randNumber = rand (1, 9999);
				$session = Session::instance();
				$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
				$thb_image_prefix = $objdoctor->id."_signature_".$randNumber;
			}	
		// New name of the large image (append the timestamp to the filename)	
		$l_img_name = $l_img_prefix.$_POST['filename']; 
		// New name of the thumbnail image (append the timestamp to the filename)
		$thb_image_name = $thb_image_prefix.$_POST['filename'];  
		$filename=$_POST['filename'];
		
		$img=$_POST['Image'];
		$upload_tempDirectory=$_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name;
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $upload_tempDirectory;
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';		
		// Width of thumbnail image
		$thb_width = "156";						
		// Height of thumbnail image
		$thb_height = "156";						
		$l_img_location = $upload_directory_path.$l_img_name;
		$thb_img_location = $upload_directory_path.$thb_image_name;

		if (isset($_POST["filename"]) )/* && file_exists($l_img_location))*/ {
			//Get the new coordinates to crop the image.
			//$x1 = $_POST["x1"];
			//$y1 = $_POST["y1"];
			//$x2 = $_POST["x2"];
			//$y2 = $_POST["y2"];
			//$w = $_POST["w"];
			//$h = $_POST["h"];
			//Scale the image to the thumb_width set above
			//$scale = $thb_width/$w;
			/*
			var_dump($scale);
			*/
			//$cropped = $this->resizeThumbnailImage($thb_img_location, $l_img_location,$w,$h,$x1,$y1,$scale);
			//$filename = explode('/',$cropped);
			//$filename = $filename[count($filename)-1];
			
			if($_POST["flag"]){
				$flag=$_POST["flag"];
				if($flag =='uploadprofileimage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objUser = ORM::factory('user')->where('id','=',$session->get('uploadphoto_userid'))->find();
					$objUser->photo_c = '/ayushman/assets/userphotos/'.$thb_image_name;
					$objUser->save();
				}else if($flag =='uploadstaffprofileimage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objUser = ORM::factory('user')->where('id','=',$session->get('uploadphoto_userid'))->find();
					$objUser->photo_c = '/ayushman/assets/userphotos/'.$thb_image_name;
					$objUser->save();
				}else if($flag=='uploadheaderimage'){
					
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objpathologist->header_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objpathologist->save();
				}else if($flag=='UploadIcardFooterImage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objstaff->icardfooter_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objstaff->save();
				}else if($flag=='UploadIcardReverseSideImage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objstaff->reversesideimage_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objstaff->save();
				}else if($flag=='UploadIcardHeaderImage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objstaff = ORM::factory('staff')->where('refstaffuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objstaff->icardheader_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objstaff->save();
				}else if($flag=='uploadfooterimage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objpathologist->footer_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objpathologist->save();
				} else if($flag=='uploadpathsignimage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objpathologist = ORM::factory('pathologist')->where('refpathologistsuserid_c','=',$session->get('uploadphoto_userid'))->find();
					$objpathologist->signature_c = 'ayushman/assets/userphotos/'.$thb_image_name;
					$objpathologist->save();					
				}else if($flag=='UploadDoctorHeaderImage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
					$objdoctor->header_c = '/ayushman/assets/userphotos/'.$thb_image_name;
					$objdoctor->save();
				}else if($flag=='UploadDoctorFooterImage'){
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/userphotos/'.$thb_image_name);
					$session = Session::instance();
					$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
					$objdoctor->footer_c = '/ayushman/assets/userphotos/'.$thb_image_name;
					$objdoctor->save();
				}
				else{
					copy($_SERVER['DOCUMENT_ROOT'].'/ayushman/files/temp/'.$thb_image_name, $_SERVER['DOCUMENT_ROOT'].'/ayushman/assets/doctorsignature/'.$thb_image_name);
					$session = Session::instance();
					$objdoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$session->get('uploadphoto_userid'))->find();
					$objdoctor->signature_c = '/ayushman/assets/doctorsignature/'.$thb_image_name;
					$objdoctor->save();
				}
				die();
			}
		}		
	}
	function resizeThumbnailImage($thb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
			list($imagewidth, $imageheight, $imageType) = getimagesize($image);
			$imageType = image_type_to_mime_type($imageType);
			
			$newImageWidth = ceil($width * $scale);
			$newImageHeight = ceil($height * $scale);
			$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
			switch($imageType) {
				case "image/gif":
					$source=imagecreatefromgif($image); 
					break;
				case "image/pjpeg":
				case "image/jpeg":
				case "image/jpg":
					$source=imagecreatefromjpeg($image); 
					break;
				case "image/png":
				case "image/x-png":
					$source=imagecreatefrompng($image); 
					break;
			}
			imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
			switch($imageType) {
				case "image/gif":
					imagegif($newImage,$thb_image_name); 
					break;
				case "image/pjpeg":
				case "image/jpeg":
				case "image/jpg":
					imagejpeg($newImage,$thb_image_name,90); 
					break;
				case "image/png":
				case "image/x-png":
					imagepng($newImage,$thb_image_name);  
					break;
			}
			chmod($thb_image_name, 0777);
			return $thb_image_name;
		}

}

/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
	 var $image_type;
	 var $image_width;
	 var $image_height;
	 var $image;
	 var $upload_dir;
	 var $image_name;
	 
	function load($image_path) {

		$image_info = getimagesize($image_path);
		$this->image_type = $image_info[2];
		$this->image_width = $image_info[0];
		$this->image_height = $image_info[1];
		

		$path_pieces = explode('/', $image_path);
		$this->image_name = array_pop($path_pieces);
		
		if( $this->image_type == IMAGETYPE_JPEG ) {

		$this->image = imagecreatefromjpeg($image_path);
		} 
		elseif( $this->image_type == IMAGETYPE_GIF ) {

		$this->image = imagecreatefromgif($image_path);
		} 
		elseif( $this->image_type == IMAGETYPE_PNG ) {

		$this->image = imagecreatefrompng($image_path);
		}
	}
	
    function save($path) {
        $input = fopen("php://input", "r");
        $this->temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $this->temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
			
        $target = fopen($path, "w");        
        fseek($this->temp, 0, SEEK_SET);
        stream_copy_to_stream($this->temp, $target);
			
		fclose($target);
		
		return $this->resize($path);
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }
	function setUpload_dir($dir){
		$this->upload_dir = $dir;
	}

	function resize($path)
	{
		// first let's load the picture and get some info
		$this->load($path);
		
		$original_width = $this->image_width;
		$original_height = $this->image_height;
		
		$src = $this->image;
		
		// setting the new widths
		$new_width = 400;
		// calculating the new heights and keep the ratio
		$new_height = ($new_width * $original_height)/$original_width;
		
		// thumbnail (squared) size
		$thumb_width = 156;
		$thumb_height = 156;
		
		if($original_width < 400)
		{
			$new_width = $original_width;
			$new_height= $original_height;
		}
		
		$tmp_1 = imagecreatetruecolor($new_width, $new_height);
		
		$tmp_square = imagecreatetruecolor($thumb_width, $thumb_height);
		
		imagecopyresampled($tmp_1, $src,0,0,0,0, $new_width, $new_height, $original_width, $original_height);
		imagecopyresampled($tmp_square, $src,0,0,0,0, $thumb_width, $thumb_height, $original_width, $original_height);
			
		$filename = $this->image_name;
		$upload_dir = $this->upload_dir;
			

		//$ext = strtolower(end(explode('.', $filename)));
		$ext = explode('.',$filename);
		
		$ext = $ext[count($ext)-1];

		switch($ext)
		{
			case 'jpg':
			case 'jpeg':
				imagejpeg($tmp_1,$upload_dir.$filename,100);
				imagejpeg($tmp_square,$upload_dir.'thumb_'.$filename,100);
			break;
			
			case 'png':
				imagepng($tmp_1,$upload_dir.$filename);
				imagepng($tmp_square,$upload_dir.'thumb_'.$filename);
			break;
			
			case 'gif':
				imagegif($tmp_1,$upload_dir.$filename);
				imagegif($tmp_square,$upload_dir.'thumb_'.$filename);
			break;
		}
		
		// we don't need those anymore
		imagedestroy($tmp_1);
		return imagedestroy($tmp_square);
	}

}

class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
	 * Modification: April 14 2012 - Renaldo Pierre-Louis
	 * * * * Will save multiple file size if specified
	 * * * * size 1 = 900 px, size 2 = 500px, size 3 = thumb = 100px
     * @return boolean TRUE on success
     */
    function save($path) {
    	$path_pieces = explode('/', $path);
		$this->image_name = array_pop($path_pieces);
		
        if(!$this->resize($path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
	function getTmp_Name(){
		return $_FILES['qqfile']['tmp_name'];
	}
	function getType(){
		return $_FILES['qqfile']['type'];
	}
	function setUpload_dir($dir){
		$this->upload_dir = $dir;
	}
	function resize($path){
		//$ext = strtolower(end(explode('.', $path)));
		$ext = explode('.',$path);
		$ext = $ext[count($ext)-1];
		
		$dimension = getimagesize($this->getTmp_Name());
		$original_width = $dimension[0];
		$original_height = $dimension[1];
		
		/// setting the new widths
		$new_width = 900;
		// calculating the new heights and keep the ratio
		$new_height = ($new_width * $original_height)/$original_width;
		
		// thumbnail (squared) size
		$thumb_width = 156;
		$thumb_height = 156;
		
		if($original_width < 900)
		{
			$new_width = $original_width;
			$new_height= $original_height;
		}
		
		$tmp_1 = imagecreatetruecolor($new_width, $new_height);
		$tmp_square = imagecreatetruecolor($thumb_width, $thumb_height);
		
		imagealphablending($tmp_1, false);
		imagesavealpha($tmp_1, true);
		
		imagealphablending($tmp_square, false);
		imagesavealpha($tmp_square, true);
		
		switch($ext)
		{
			case 'jpg':
			case 'jpeg':
				$src = imagecreatefromjpeg($this->getTmp_Name());
			break;
			
			case 'png':
				$src = imagecreatefrompng($this->getTmp_Name());
				imagealphablending($src, true);
			break;
			
			case 'gif':
				$src = imagecreatefromgif($this->getTmp_Name());
				imagealphablending($src, true);
			break;
			
			default:
				return false;
			break;
		}
		
		imagecopyresampled($tmp_1, $src,0,0,0,0, $new_width, $new_height, $original_width, $original_height);
		imagecopyresampled($tmp_square, $src,0,0,0,0, $thumb_width, $thumb_height, $original_width, $original_height);
			
		$filename = $this->image_name;
		$upload_dir = $this->upload_dir;
		
		switch($ext)
		{
			case 'jpg':
			case 'jpeg':
				imagejpeg($tmp_1,$upload_dir.$filename,100);
				imagejpeg($tmp_square,$upload_dir.'thumb_'.$filename,100);
			break;
			
			case 'png':
				imagepng($tmp_1,$upload_dir.$filename);
				imagepng($tmp_square,$upload_dir.'thumb_'.$filename);
				
				
			break;
			
			case 'gif':
				imagegif($tmp_1,$upload_dir.$filename);
				imagegif($tmp_square,$upload_dir.'thumb_'.$filename);
			break;
		}
		
		// we don't need those anymore
		imagedestroy($tmp_1);
		return imagedestroy($tmp_square);
	}
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize > $this->sizeLimit || $uploadSize < $this->sizeLimit){	//putting >th by vijay because it is going in die method
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
		if(!is_dir($uploadDirectory)){
			mkdir($uploadDirectory, 0777);
			chmod($uploadDirectory, 0777);
		}
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
		
		$this->file->setUpload_dir($uploadDirectory);
		
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        $filename = str_replace(' ', '_', $pathinfo['filename']);
		$filename = strtolower($filename);
        //$filename = md5(uniqid());
        $ext = strtolower($pathinfo['extension']);

        if($this->allowedExtensions && !in_array($ext, $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
        }
        
        if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
            return array('success'=>true, 'filename'=>$filename.'.'.$ext);
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    
}