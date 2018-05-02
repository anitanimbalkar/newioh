<?php defined('SYSPATH') or die('No direct script access.');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/import.php');
//include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/Excel/excel_reader.php');
include_once(DOCROOT.'application/classes/helper/transaction.php');
//include_once(DOCROOT.'application/classes/helper/export.php');
require_once(DOCROOT.'simple_html_dom.php');

class Controller_Cbulkregistration extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$msg="";
		$this->display($errors,$messages,$msg);
		
		
	}
	private function create_user($record,$rolename)
	{
		$existinguser = ORM::factory('corporatemember')->where('emailid_c','=',trim($record[7]))->where('employeemobileno_c','=',trim($record[6]))->where('status_c','=','de-associated')->find();
		
		if($existinguser->id)
		{	
			$objcorporatemember=ORM::factory('corporatemember');			
			$objcorporatemember->iohid_c=$existinguser->iohid_c;
			$iohidtemp=$existinguser->iohid_c;
			$objcorporatemember->employeemobileno_c=trim($record[6]);
			$objcorporatemember->dateofbirth_c=$record[5];
			$objcorporatemember->employeeid_c=trim($record[3]);
			$objcorporatemember->employeename_c=$record[0]." ".$record[1]." ".$record[2];
			$objcorporatemember->status_c="Active";
			if(isset($record[7]))
			$objcorporatemember->emailid_c=trim($record[7]);
			$objcorporatemember->refcorporateid_c=ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->id;
			$objcorporatemember->save();
			$answer= array($iohidtemp,-1);
			return($answer);
		}
		elseif(!ORM::factory('corporatemember')->where('employeeid_c','=',$record[3])->where('refcorporateid_c','=',ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->id)->find()->id)
		{
			$password = md5(uniqid(rand()));//create 6 chara password
			$password = substr($password,-8);
			
			$initialusername = strtolower($this->clean(trim($record[0])).$this->clean(trim($record[2])));
			$initialusername = substr($initialusername,0,25);
			$username = $initialusername;
			$userCount = 0;
			while(ORM::factory('user')->where('username','=',$username)->find()->id != null){
				$userCount++;
				$username = $initialusername . $userCount;
			}
			//$initialusername = strtolower(trim(($record[0])).trim(($record[1])));
			//$initialusername = substr($initialusername,0,25);
			//$username = ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->id.$record[3];
			$arrPost['username']= $username;
			$arrPost['password']= $password;
			$arrPost['password_confirm'] = $password;
			$activationcode	=  md5(uniqid(rand(), true));
			$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
			$user->add('roles', ORM::factory('role', array('name' => 'login')));
			$user->add('roles', ORM::factory('role', array('name' => $rolename)));
			$user->Firstname_c	= trim($record[0]);
			$user->middlename_c	= trim($record[1]);
			$user->lastname_c 	= trim($record[2]);
			$user->mobileno1_c = trim($record[6]);
			$user->email = trim($record[7]);
			//$dateofbirth = date('d-m-Y', strtotime($record[5],mktime(0,0,0,1,1,1970)));
			$user->DOB_c =date('Y-m-d', strtotime($record[5],mktime(0,0,0,1,1,1970)));
			$user->activationcode_c	= $activationcode;
			$user->activationstatus_c	= 'active';
			$user->accountcreatedby_c ="script";
			$user->xmpppassword_c = $user->password ;
			$obj_patient=ORM::factory($rolename);
			$obj_patient->repatientsuserid_c = $user->id;
			
			$objcorporatemember=ORM::factory('corporatemember');
			$objcorporatemember->generatedpassword_c=$password;
			$objcorporatemember->iohid_c=$user->id;
			$objcorporatemember->employeemobileno_c=trim($record[6]);
			$objcorporatemember->dateofbirth_c=date('d-m-Y', strtotime($record[5],mktime(0,0,0,1,1,1970)));
			$objcorporatemember->employeeid_c=trim($record[3]);
			$objcorporatemember->employeename_c=$record[0]." ".$record[1]." ".$record[2];
			$objcorporatemember->status_c="Associated";
			if(isset($record[7]))
			$objcorporatemember->emailid_c=trim($record[7]);
			
			$objcorporatemember->refcorporateid_c=ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->id;
			
			$obj_patient->save();
			$objcorporatemember->save();
			$user->save();
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts = $objAccounts->where('refaccountuserid_c','=',$user->id)->find();
			if($objAccounts->id == '')
			{
				$objAccounts=ORM::factory('billingaccount');
				$objAccounts->accountcode_c 		= 'IOH'.$user->id.rand(10000,99999);
				$objAccounts->refaccountuserid_c 	= $user->id;
				$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
				$objAccounts->debitedamount_c 		= 0;
				$objAccounts->creditedamount_c 		= 0;
				$objAccounts->netbalance_c	 		= 0;
				$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
				$objAccounts->lastupdatedby_c 		= $user->id;
				$objAccounts->save();
				$postfix = '';
				for($i=0;$i<(10-strlen($objAccounts->id));$i++)
				{
					$postfix = $postfix.'0';
				}
				$accountcode = 'IOH'.$postfix.$objAccounts->id;

				$objAccounts->accountcode_c			= $accountcode;	
				$objAccounts->update();
			}
			
			$answer=array($username,$password,$user->id);
			return $answer;
		}
		else
		{ return 0;
		}
	}
	
	private function deassociate_user($record){
		$objdeassociation = ORM::factory('corporatemember')->where('iohid_c','=',$record[0])->find();
		$corporateid=$_POST['activationstatus2'];
		$objdeassociation->status_c='de-associated';
		$objplans= ORM::factory('billingplan')->where('towhomcorporateid_c','=',$corporateid)->where('refplantypeid_c','=','5')->find_all()->as_array();
		$array_plans= array();
		//array_push($array_status,"All");
		foreach($objplans as $objplan )
		{
			if($objplan->id != null)
			array_push($array_plans,$objplan->id);
		}
		$objbips = ORM::factory('billingindividualplan')->where('refusersid_c','=',$record[0])->find_all()->as_array();
		foreach($objbips as $objbip)
		{ if(in_array($objbip->refplanid_c,$array_plans))
			$objbip->status_c='inactive';
			$objbip->save();
		}
		//$objbips->update();
		$objdeassociation->save();
	}
	public function exceltodatabase2($filename)
	{				
		
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
		
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			NULL,
			TRUE,
			FALSE);
			// var_dump($rowData); die;
			$iohid = $rowData[0][0];
			$employeeid = $rowData[0][1];
			$firstname	= $rowData[0][2];
			$lastname	= $rowData[0][3];
			$arraydata=array($iohid,$employeeid);
			
			$this->deassociate_user($arraydata);
			if($iohid != '')//if ioh id is null then do not send sms.
			{
				$notification=  array();
				$notification['id']=$iohid;
				$notification['template']='dissociation';
				$notification['sms'] = 'true';
				$notification['email'] = 'true';
				//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
				$notificationsender = new helper_notificationsender();
				$notificationsender->sendnotification($notification);
				
			}
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, "success");
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('sheet');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xlsx', "example.xlsx"));
		$file = 'example.xlsx';
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

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		//  Loop through each row of the worksheet in turn
		
		for ($row = 3; $row <= $highestRow; $row++)
		{ 
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			NULL,
			TRUE,
			FALSE);
			// var_dump($rowData); die;
			$employeeid = $rowData[0][0];
			$firstname = $rowData[0][1];
			$middlename	= $rowData[0][2];
			$lastname	= $rowData[0][3];
			$gender	=$rowData[0][9];
			$dob		= $rowData[0][10];
			$phpexcepDate = $dob-25569; //to offset to Unix epoch
			$dob=strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
			//$dob=date('d/m/Y', $dob);
			$dob=date('m/d/Y', $dob);
			$mobileno	= $rowData[0][11];
			if(isset($rowData[0][12]))
			$email	= $rowData[0][12];
			else
			$email="";
			
			$arraydata=array($firstname,$middlename,$lastname,$employeeid,$gender,$dob,$mobileno,$email);
			//var_dump($arraydata); die;
			$logindetails=$this->create_user($arraydata,'patient');
			//var_dump($logindetails); die;
			if($logindetails!=0)
			{
				if($logindetails[1]== -1)
				{
					$notification=  array();
					$notification['id']=$logindetails[0];
					$notification['template']='failedassociation';
					$notification['sms'] = 'true';
					$notification['email'] = 'true';
					//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
					$notificationsender = new helper_notificationsender();
					$notificationsender->sendnotification($notification);
					
				}
				else
				{
					$objPHPExcel->setActiveSheetIndex(0);
					$objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $logindetails[2]);
					$objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $logindetails[0]);
					$objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $logindetails[1]);
					if($logindetails[2] != '')//if ioh id is null then do not send sms.
					{
						$notification=  array();
						$notification['id']=$logindetails[2];
						$notification['template']='corporatemembersregistration';
						$notification['name']=$firstname.' '.$lastname;
						$notification['uname']=$logindetails[0]; 
						$notification['password']=$logindetails[1]; 
						$notification['iohid']=$logindetails[2];
						$notification['organizationname']= ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->corporatename_c;
						$notification['organizationhead']= ORM::factory('corporate')->where('corporatename_c','=',$_POST['activationstatus'])->find()->contactpersonname_c;
						$notification['sms'] = 'true';
						$notification['email'] = 'true';
						//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
						$notificationsender = new helper_notificationsender();
						$notificationsender->sendnotification($notification);
						
					} 
				}
			}
			else
			$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$row, "Employee Already Registered");
		}
		$objPHPExcel->getActiveSheet()->setTitle('sheet');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save(str_replace('.php', '.xlsx', "example.xlsx"));
		$file = 'example.xlsx';
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
	
	
	
	
	private function display($errors, $messages,$msg){
		$content = View::factory('vuser/vadmin/vbulkregistration');
		
		$objViewUsers= ORM::factory('corporate')->find_all()->as_array();
		$array_status= array();
		//array_push($array_status,"All");
		foreach($objViewUsers as $objViewUser )
		{
			if($objViewUser->corporatename_c != '')
			array_push($array_status,trim($objViewUser->corporatename_c));
		}
		
		$this->template->content = $content;
		$content->bind('array_status',$array_status);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('msg',$msg);
		
		//$this->exceltodatabase();
		//die;
	}
	public function action_download()
	{
		$file = DOCROOT."temp/format.xlsx";
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
	public function action_download_deassociation()
	{
		$file = DOCROOT."temp/format.xlsx";
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
	public function action_upload_deassociation()
	{$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   $file = new helper_Files();
			$return = $file->saveTempFile($_FILES['file2']);
			
			
			$this->exceltodatabase2($return['path']);
			
			$this->display($errors,$messages,$msg);
		}

		
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages,$msg);
		}
		
	}
	public function action_upload()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['zip_file']);
			
			$this->exceltodatabase($return['path']);
			$this->display($errors,$messages,$msg);
		}

		
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages,$msg);
		}
		
	}
	public function action_searchMembers()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$corporateid = $_POST['corporateid'];
				$this->displayUploadForm($errors, $messages);
			}else{
				$errors['error'] = '$_Post is null';
				$this->displayUploadForm($errors, $messages);
			}
		}catch(Exception $e){
			
			throw new Exception($e);
		}
	}
	private function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}	
}

