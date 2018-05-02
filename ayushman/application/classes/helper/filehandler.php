<?php
class Helper_FileHandler
{
	
	public static function isLargerThanMax($size)
	{
		$MAX_SIZE = 102400000;
		if($size>$MAX_SIZE) {
			return TRUE;
		}
		return FALSE;
	}
	
	public static function save($str)
	{

	}
	
	public static function getExtension($filename)
	{
		return strtolower(substr($filename, strrpos($filename, ".", 0), strlen($filename)));
	}
	
	public static function isValidExtension($extension)
	{
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
			return FALSE;
		}
		return TRUE;
	}

	public static function moveUploadedFile($clientsideFileName, $uploadedFileName, $newname, $serverImageDir) 
	{
		$result = "";
		$filename = stripslashes($clientsideFileName);
 		//get the extension of the file in a lower case format
  		$extension = Helper_FileHandler::getExtension($filename);
		Kohana::$log->add(Log::INFO, 'error: extension is '.$extension);
 		//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
		//otherwise we will do more tests
 		if (Helper_FileHandler::isValidExtension($extension)) {
 			Kohana::$log->add(Log::INFO, 'error: invalid extension '.$extension);
			$result = 'invalid extension '.$extension;
 		} else {
			//get the size of the image in bytes
			//$_FILES['image']['tmp_name'] is the temporary filename of the file
			//in which the uploaded file was stored on the server
			$size=filesize($uploadedFileName);
			
			//compare the size with the maxim size we defined and print error if bigger
			if (Helper_FileHandler::isLargerThanMax($size))
			{
				Kohana::$log->add(Log::INFO, 'You have exceeded the size limit!!');
				$result = 'error: You have exceeded the size limit!!';
			} else {
				
				//include_paths() returns an array
				$ipaths = Kohana::include_paths();
				//first element has application path
				$path = $ipaths[0].$serverImageDir;
	
				$newnameWithExtn=$path.$newname.$extension;
				Kohana::$log->add(Log::INFO, 'newnamewithextn is '.$newnameWithExtn);
				//we verify if the image has been uploaded, and print error instead
				$copied = move_uploaded_file($uploadedFileName, $newnameWithExtn);
				if ($copied) 
				{
					$result = $serverImageDir.$newname.$extension;
				} else {
					Kohana::$log->add(Log::INFO, 'Copy unsuccessfull!');
					$result = 'error: Copy to new location unsuccessful';					
				}			
			}
		}
		return $result;
	}
}
?>