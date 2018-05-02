<?php defined('SYSPATH') or die('No direct script access.');

include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/PDFMerger.php');

class helper_Files {
	public function savePdfFile($html)
	{
		$array_files = Kohana::$config->load('application');
		$return = $this->createPdf($html);
		if($return != ''){
			copy($return['file'], $array_files['Documents'].$return['filename']);
			$return["id"] =$this->saveFileInDatabase($return['filename'],'Documents');
			return $return;
		}else{
			return '';
		}
	}
	public function mergepdf($pdfs){
		try{
			$pdfMerger = new PDFMerger();
			$array_files = Kohana::$config->load('application');
			$now = new DateTime();
			$timestamp = $now->getTimestamp();
			
			foreach($pdfs as $pdf){
				$pdfMerger->addPDF($pdf, 'all');
			}
				
			$fileString = $pdfMerger->merge('string', $array_files['Documents'].$timestamp.'.pdf');
			file_put_contents($array_files['Documents'].$timestamp.'.pdf', $fileString);
			
			$return = array();
			$return["id"] =$this->saveFileInDatabase($timestamp.'.pdf','Documents');
			$return["filename"] = $timestamp.'.pdf';
			return $return;			
		}catch(Exception $e){
			var_dump($e);die;
		}
		
	}
	public function createPdf($html)
	{
		$array_files = Kohana::$config->load('application');
		$user = Auth::instance()->get_user();

		$now = new DateTime();
		$pdfname = ($user->Firstname_c==Null?'':$user->Firstname_c).'_'.($user->lastname_c==Null?'':$user->lastname_c).'_'.$user->id.'_'.$now->getTimestamp().'_'.rand (1000,9999);

		$html->save($array_files["temp"].$pdfname.'.html');
		//exec($array_files['wkhtmltopdfpath'].'  "'.$array_files['temp'].$pdfname.'.html" "'.$array_files['temp'].$pdfname.'.pdf"',$op);
		exec($array_files['wkhtmltopdfpath'].' -B 0 -T 0 -L 0 -R 0  "'.$array_files['temp'].$pdfname.'.html" "'.$array_files['temp'].$pdfname.'.pdf"',$op);
		if(!file_exists($array_files['temp'].$pdfname.'.pdf')){
			return '';
		}else{
			$return = array();
			$return["file"] = $array_files['temp'].$pdfname.'.pdf';
			$return["filename"] = $pdfname.'.pdf';
			return $return;
		}
	}
	
	public function getFilePath($id)
	{
		$array_files = Kohana::$config->load('application');
		$file	= ORM::factory('file')->where('id','=',$id)->find();
		if($file->id == null){
			return '';
		}
		$filePath = $array_files[$file->location_c].$file->filename_c;
		if(!file_exists($filePath)){
			return '';
		}else{
			$return['path'] = $filePath;
			$return['abspath'] = $array_files['abs-'.$file->location_c].$file->filename_c;
			return $return;
		}
	}
	
	private function saveFileInDatabase($filename_c,$location_c){
		$files	= ORM::factory('file');
		$files->filename_c = $filename_c;
		$files->location_c = $location_c;
		$files->save();
		return $files->id;
	}
	
	public function saveTempFile($file)
	{
		$array_files = Kohana::$config->load('application');
		$user = Auth::instance()->get_user();

		$now = new DateTime();
		$pdfname = ($user->Firstname_c==Null?'':$user->Firstname_c).'_'.($user->lastname_c==Null?'':$user->lastname_c).'_'.$user->id.'_'.$now->getTimestamp();
		
		if(move_uploaded_file($file["tmp_name"], $array_files["temp"].$pdfname.str_replace(" ","_",$file["name"]))){
			$return['path'] = $array_files["temp"].$pdfname.str_replace(" ","_",$file["name"]);
			try{
				//$x = $this->fix_orientation($return['path']);
			}catch(Exception $e){
				$return['path'] = $array_files["temp"].$pdfname.str_replace(" ","_",$file["name"]);
			}
			$return['abspath'] = $array_files["abs-temp"].$pdfname.str_replace(" ","_",$file["name"]);
			return $return;
		}
	}
	
	public function deleteFile($fileid)
	{
		$files	= ORM::factory('file')->where('id','=',$fileid)->find();
		$files->isdeleted_c = 1;
		$files->update();
	}
	
	public function saveContentInFile($filecontent,$ext){
		$array_files = Kohana::$config->load('application');
		if (!file_exists($array_files['files'])) {
			mkdir($array_files['files']);
		}		

		$now = new DateTime();
		$filename = $now->getTimestamp().'_'.rand (1000,9999);

		file_put_contents($array_files["files"].$filename.$ext, $filecontent);
		$return['path'] = $array_files["files"].$filename.$ext;
		$return['abspath'] = $array_files["abs-files"].$filename.$ext;

		$return["id"] =$this->saveFileInDatabase($filename.$ext,'files');
		return $return;
	}
	
	public function saveFileToSpecificFolder($file,$foldername)
	{
		$array_files = Kohana::$config->load('application');
		$user = Auth::instance()->get_user();

		$now = new DateTime();
		$pdfname = ($user->Firstname_c==Null?'':$user->Firstname_c).'_'.($user->lastname_c==Null?'':$user->lastname_c).'_'.$user->id.'_'.$now->getTimestamp();
		
		if(move_uploaded_file($file["tmp_name"], $array_files[$foldername].$pdfname.$file["name"])){
			$return["id"] =$this->saveFileInDatabase($pdfname.$file["name"],'Documents');
			$return["filename"] = $pdfname.$file["name"];
			$return['path'] = $array_files[$foldername].$pdfname.$file["name"];
			$return['abspath'] = $array_files["abs-".$foldername].$pdfname.$file["name"];
			return $return;
		}
	}
	public function moveToSpecificFolder($userid, $file,$foldername)
	{
		$array_files = Kohana::$config->load('application');
		$user = ORM::factory('user')->where('id','=',$userid)->find();

		$now = new DateTime();
		$pdfname = ($user->Firstname_c==Null?'':$user->Firstname_c).'_'.($user->lastname_c==Null?'':$user->lastname_c).'_'.$user->id.'_'.$now->getTimestamp().'_'.rand (1000,9999);
		$pdfname = $pdfname.'.'.pathinfo($file, PATHINFO_EXTENSION);

		try{
			if(file_exists($file)){
				if(copy($file, $array_files[$foldername].$pdfname)){
					$return["id"] =$this->saveFileInDatabase($pdfname,$foldername);
					$return["filename"] = $pdfname;
					$return['path'] = $array_files[$foldername].$pdfname;
					$return['abspath'] = $array_files["abs-".$foldername].$pdfname;
					return $return;
				}else{
					return '';
				}
			}else{
				return '';
			}
		}catch(Exception $e){
			return '';
		}
	}

	protected function fix_orientation($fileandpath) {
		  // Does the file exist to start with?
		  if(!file_exists($fileandpath))
			return false;

		  // Get all the exif data from the file
		  $exif = read_exif_data($fileandpath, 'IFD0');

		  // If we dont get any exif data at all, then we may as well stop now
		  if(!$exif || !is_array($exif))
			return false;

		  // I hate case juggling, so we're using loweercase throughout just in case
		  $exif = array_change_key_case($exif, CASE_LOWER);

		  // If theres no orientation key, then we can give up, the camera hasn't told us the 
		  // orientation of itself when taking the image, and i'm not writing a script to guess at it!
		  if(!array_key_exists('orientation', $exif)) 
			return false;

		  // Gets the GD image resource for loaded image
		  $img_res = $this->get_image_resource($fileandpath);

		  // If it failed to load a resource, give up
		  if(is_null($img_res))
			return false;

		  // The meat of the script really, the orientation is supplied as an integer, 
		  // so we just rotate/flip it back to the correct orientation based on what we 
		  // are told it currently is 
		  switch($exif['orientation']) {

			// Standard/Normal Orientation (no need to do anything, we'll return true as in theory, it was successful)
			case 1: return true; break;

			// Correct orientation, but flipped on the horizontal axis (might do it at some point in the future)
			case 2: 
			  $final_img = $this->imageflip($img_res, IMG_FLIP_HORIZONTAL);
			break;

			// Upside-Down
			case 3: 
			  $final_img = $this->imageflip($img_res, IMG_FLIP_VERTICAL);
			break;

			// Upside-Down & Flipped along horizontal axis
			case 4:  
			  $final_img = $this->imageflip($img_res, IMG_FLIP_BOTH);
			break;

			// Turned 90 deg to the left and flipped
			case 5:  
			  $final_img = imagerotate($img_res, -90, 0);
			  $final_img = $this->imageflip($img_res, IMG_FLIP_HORIZONTAL);
			break;

			// Turned 90 deg to the left
			case 6: 
			  $final_img = imagerotate($img_res, -90, 0);
			break;

			// Turned 90 deg to the right and flipped
			case 7: 
			  $final_img = imagerotate($img_res, 90, 0);
			  $final_img = $this->imageflip($img_res,IMG_FLIP_HORIZONTAL);
			break;

			// Turned 90 deg to the right
			case 8: 
			  $final_img = imagerotate($img_res, 90, 0); 
			break;

		  }

		  // If theres no final image resource to output for whatever reason, give up
		  if(!isset($final_img))
			return false;

		  //-- rename original (very ugly, could probably be rewritten, but i can't be arsed at this stage)
		  $parts = explode("/", $fileandpath);
		  $oldname = array_pop($parts);
		  $path = implode('/', $parts);
		  $oldname_parts = explode(".", $oldname);
		  $ext = array_pop($oldname_parts);
		  $newname = implode('.', $oldname_parts).'.orig.'.$ext;

		  rename($fileandpath, $path.'/'.$newname);

		  // Save it and the return the result (true or false)
		  $done = $this->save_image_resource($final_img,$fileandpath);

		  return $done;
	 
	}

	protected function get_image_resource($file) {

		$img = null;
		$p = explode(".", strtolower($file));
		$ext = array_pop($p);
		switch($ext) {

		  case "png":
			$img = imagecreatefrompng($file);
			break;

		  case "jpg":
		  case "jpeg":
			$img = imagecreatefromjpeg($file);
			break;
		  case "gif":
			$img = imagecreatefromgif($file);
			break;

		}  

		return $img;

	}

	protected function save_image_resource($resource, $location) {

		$success = false;
		$p = explode(".", strtolower($location));
		$ext = array_pop($p);
		switch($ext) {

		  case "png":
			$success = imagepng($resource,$location);
			break;

		  case "jpg":
		  case "jpeg":
			$success = imagejpeg($resource,$location);
			break;
		  case "gif":
			$success = imagegif($resource,$location);
			break;

		} 

		return $success;

	}

}
