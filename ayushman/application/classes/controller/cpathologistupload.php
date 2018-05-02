<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpathologistupload extends Controller_Ctemplatewithmenu  {
	public function action_view()
	{	
		try
		{	
			$breadcrumb = "Home>>";
			
			//$testId = $_GET["testId"];
			$content = View::factory('vuser/vpathologist/vpathologistupload');
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$content->bind('testId',$testId);
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	public function action_captureFilename()
	{	
		try
		{	
				$fileName = $_FILES['upload']['name'];
				$tmpName  = $_FILES['upload']['tmp_name'];
				$fileSize = $_FILES['upload']['size'];
				$fileType = $_FILES['upload']['type'];
				$_POST["file_array"]=$_FILES['upload'];
				var_dump($_FILES["upload"]);
				var_dump($_POST["file_array"]);die;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
}