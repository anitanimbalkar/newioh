<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
class Controller_Cnotification extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	
	private function display($errors, $messages){
		$content = View::factory('vuser/vadmin/vnotification');
		
		$templates = Kohana::message('email');
		
		$this->template->content = $content;
		$content->bind('templates',$templates);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	
	public function action_send()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		if($_POST){
			$files = new helper_Files();
			$return = $files->saveTempFile($_FILES['file2']);
			$this->exceltodatabase($return["path"]);
			$this->display($errors,$messages);
		}
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages);
		}
		
	}
	public function exceltodatabase($filename)
	{				
		try {
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($filename);
		} catch(Exception $e) 
		{
			die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();

		$parameters = array();
		$rowData0 = $sheet->rangeToArray('A' . 1 . ':' . $highestColumn . 1,
			NULL,
			TRUE,
			FALSE);
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			NULL,
			TRUE,
			FALSE);
			
			$notification=  array();
			$notification['template']=$_POST['template'];
			
			if(isset($_POST['email'])){
				$notification['email'] = isset($_POST['email'])?'true':'false';
			}
			if(isset($_POST['sms'])){
				$notification['sms'] = isset($_POST['sms'])?'true':'false';
			}
			if(isset($rowData[0][0])){
				$notification[$rowData0[0][0]] = $rowData[0][0];
				//column "id"
			}
			if(isset($rowData[0][1])){
				$emailid = $rowData[0][1];
				// column "emailid"
			}
			if(isset($rowData[0][2])){
				$notification['mobilenumbers'] = $rowData[0][2];
				// column "mobile"
			}
			/*if(isset($rowData[0][1]))
				$notification[$rowData0[0][1]] = $rowData[0][1];
			if(isset($rowData[0][2]))
				$notification[$rowData0[0][2]] = $rowData[0][2];*/
			if(isset($rowData[0][3]))
				$notification[$rowData0[0][3]] = $rowData[0][3];
			if(isset($rowData[0][4]))
				$notification[$rowData0[0][4]] = $rowData[0][4];
			if(isset($rowData[0][5]))
				$notification[$rowData0[0][5]] = $rowData[0][5];
			if(isset($rowData[0][6]))
				$notification[$rowData0[0][6]] = $rowData[0][6];
			if(isset($rowData[0][7]))
				$notification[$rowData0[0][7]] = $rowData[0][7];
			if(isset($rowData[0][8]))
				$notification[$rowData0[0][8]] = $rowData[0][8];
			if(isset($rowData[0][9]))
				$notification[$rowData0[0][9]] = $rowData[0][9];
			if (trim(isset($notification['id'])) != "")
			{ // if ioh id entered
				/*$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->SetCellValue('M'.$row, "success");*/
				if(isset($notification['email']) == "true")
				{
					$email_sender = new helper_emailsender();
				 	$var = $email_sender->sendemail($notification);
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('M'.$row, "Email Sent");
				}
				if(isset($notification['sms']) == "true")
				{
					$sms_sender = new helper_smssender();
					$var = $sms_sender->sendsms($notification);	
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('N'.$row, "SMS Sent");
				}
			}
			else
			{
				// check if email and mobileentered
				if((isset($notification['email']) == "true") AND (trim(isset($emailid))!=""))
				{
					$email_sender = new helper_emailsender();
				 	$var = $email_sender->sendemailtoaid($notification,$emailid);
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('M'.$row, "Email Sent");
				}
				if((isset($notification['sms']) == "true") AND (trim(isset($notification['mobilenumbers']))!=""))
				{
					$sms_sender = new helper_smssender();
					$var = $sms_sender->sendSmsToCdmPatients($notification);	
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('N'.$row, "SMS Sent");
					// This will send SMS to mobile number set in notification array in
					// field "mobilenumbers"
				}				
			}
		}
		$objPHPExcel->getActiveSheet()->setTitle('sheet');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xlsx', "notification_status.xlsx"));
		$file = 'notification_status.xlsx';
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
	}
}

