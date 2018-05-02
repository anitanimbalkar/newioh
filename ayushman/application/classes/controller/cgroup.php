<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cgroup extends Controller_Ctemplatewithmenu {
	public function action_view(){
		$errors = array();
		$messages = array();
		$msg="";
		$this->display($errors,$messages,$msg,"");
	}
	private function display($errors, $messages,$msg,$whereclause){
		$content = View::factory('vuser/vadmin/vgroup');
		
		// Find all active groups
		// excluding standard group
		$objgroup = ORM::factory("discountgroup")
					->where("active_c","=",1)
					->where("id","!=",-1)
					->find_all()->as_array();
		if (isset($_POST['groupid']))
			$selectedgroup = $_POST['groupid'];
		else
		{
			if(isset($objgroup[0]->id))
				$selectedgroup = $objgroup[0]->id;
			else
				$selectedgroup = 0;
		}
			
		$this->template->content = $content;
		$content->bind('discgroups',$objgroup);
		$content->bind('selectedgroup', $selectedgroup);
		$content->bind('whereclause', $whereclause);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
	}
	public function action_download()
	{
		$file = DOCROOT."application/forms/bulkregistration/bulkgroup_format.xlsx";
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
		else
			exit;
	}
	
	public function action_downloadregistrationformat()
	{
		$file = DOCROOT."application/forms/bulkregistration/registration_format.xlsx";
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
		else
			exit;
	}

	public function action_registermembers()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['regfile']);
			if (isset($_POST['groupidforreg']))
			{
				$this->exceltodatabaseregister($return['path'],$_POST['groupidforreg']);				
			}
			$this->display($errors,$messages,$msg,"");
		}		
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages,$msg,"");
		}		
	}
	public function exceltodatabaseregister($filename,$groupid)
	{						
		try {
			$inputFileType = PHPExcel_IOFactory::identify($filename);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($filename);
		} catch(Exception $e) 
		{
			die('Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		$objgroup = ORM::factory("discountgroup")
						->where("id","=",$groupid)->find();
		$groupname = $objgroup->groupname_c;
		
		
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
			
			$arraydata=array($firstname,$middlename,$lastname,$employeeid,$gender,$dob,$mobileno,$email,$groupid);
			//var_dump($arraydata); die;
			$logindetails=$this->create_user($arraydata,'patient');
			//var_dump($logindetails); die;
			if($logindetails!=0)
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
					$notification['organizationname']= $groupname;
					$notification['organizationhead']= "";
					$notification['sms'] = 'true';
					$notification['email'] = 'true';
					//echo $objCoepuser->iohid.' '.$notification['name'].'</br>';
					$notificationsender = new helper_notificationsender();
					$notificationsender->sendnotification($notification);
					
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
	private function create_user($record,$rolename)
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
			$groupid = trim($record[8]);
			//$dateofbirth = date('d-m-Y', strtotime($record[5],mktime(0,0,0,1,1,1970)));
			$user->DOB_c =date('Y-m-d', strtotime($record[5],mktime(0,0,0,1,1,1970)));
			$user->activationcode_c	= $activationcode;
			$user->activationstatus_c	= 'active';
			$user->accountcreatedby_c ="script";
			$user->xmpppassword_c = $user->password ;
			$user->save();
			
			$obj_patient=ORM::factory($rolename);
			$obj_patient->repatientsuserid_c = $user->id;
			$obj_patient->save();
			
			$objGroup = ORM::factory("discgrpmember")
					->where("refpatientsid_c","=",$obj_patient->id)
					->find();
			$objGroup->refpatientsid_c = $obj_patient->id;
			$objGroup->refdiscgroupid_c = $groupid;
			$objGroup->active_c = 1;
			$objGroup->save();
			
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

	public function action_addmembers()
	{
		$errors = array();
		$messages = array();
		$resultdata = array();
		$msg="";
		if($_POST)
		{   
			$file = new helper_Files();
			$return = $file->saveTempFile($_FILES['zip_file']);
			if (isset($_POST['groupid']))
			{
				$this->exceltodatabase($return['path'],$_POST['groupid']);				
			}
			$this->display($errors,$messages,$msg,"");
		}		
		else
		{
			$errors = array();
			$messages = array();
			$errors['error'] = 'Bad request.';
			$this->display($errors,$messages,$msg,"");
		}		
	}
	
	public function exceltodatabase($filename,$groupid)
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
			$firstname = $rowData[0][0];
			$middlename	= $rowData[0][1];
			$lastname	= $rowData[0][2];
			$iohid = str_replace(' ','',$rowData[0][3]); 
			if ($iohid != "")
			{
				// Id enetered so check whether user is already in some group
				$objUser = ORM::factory("user")
						->where("id","=",$iohid)
						->where("activationstatus_c","=","active")
						->find();
				if($objUser->id != null)
				{
					// Search for patient
					$objPatient = ORM::factory("patient")
						->where("repatientsuserid_c","=",$iohid)
						->find();
					if($objPatient->id != null)
					{
						$objGroup = ORM::factory("discgrpmember")
								->where("refpatientsid_c","=",$objPatient->id)
								->find();
						$objGroup->refpatientsid_c = $objPatient->id;
						$objGroup->refdiscgroupid_c = $groupid;
						$objGroup->active_c = 1;
						$objGroup->save();
						$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, "Consumer Added");
					}
					else
						$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, "Not a consumer");
				}				
				else
					$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, "Invalid Data");
			}
			else
				$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, "Invalid Data");
		}
		/* Code for creating output file
		-- Commented since was not able to refresh contents
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
		}*/		
	}
	public function action_searchMembers()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$searchname = "%".$_POST["search"]."%";
				$whereclause = "[consumername,like,".$searchname."]";
				$this->display($errors,$messages,"",$whereclause);
			}
		}catch(Exception $e){
			
			throw new Exception($e);
		}
	}
	public function action_removemember(){
		if ($_GET)
		{
			if (isset($_GET['recordid']))
			{
				$objmember = ORM::factory("discgrpmember")
							->where("id","=",$_GET['recordid'])
							->find();
				if($objmember->id != null)
				{
					$objmember->active_c = 0;
					$objmember->save();					
				}
			}
		}
		die;
	}	

	private function clean($string) {
	   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

	   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}	
	public function action_managegroup(){
		$content = View::factory('vuser/vadmin/vmanagegroup');
		// Select groups excluding standard group
		//---------------------------------------
		$whereclause= "[active_c,=,1][id,!=,-1]";
		$this->template->content = $content;
		$content->bind('whereclause', $whereclause);
	}	
	public function action_removegroup(){
		if ($_GET)
		{
			if (isset($_GET['groupid']))
			{
				$objgroup = ORM::factory("discountgroup")
							->where("id","=",$_GET['groupid'])
							->find();
				if($objgroup->id != null)
				{
					$objgroup->active_c = 0;
					$objgroup->save();					
				}
			}
		}
		die;
	}	
	public function action_addgroup(){
		if ($_GET)
		{
			if (isset($_GET['groupname']))
			{
				$objgroup = ORM::factory("discountgroup");
				$objgroup->groupname_c = $_GET['groupname'];
				$objgroup->active_c = 1;
				$objgroup->save();					
			}
		}
		die;
	}	
	public function action_searchgroups(){
		try{
			if($_POST){
				$searchname = "%".$_POST["search"]."%";
				$whereclause = "[groupname_c,like,".$searchname."]";
				$content = View::factory('vuser/vadmin/vmanagegroup');
				// Select groups excluding standard group
				//---------------------------------------
				$whereclause= $whereclause."[active_c,=,1][id,!=,-1]";
				$this->template->content = $content;
				$content->bind('whereclause', $whereclause);
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}	
	public function action_searchandadd(){
		$content = View::factory('vuser/vadmin/vsearchconsumer');
		// Select groups excluding standard group
		//---------------------------------------
		$objgroups = ORM::factory("discountgroup")
					->where("active_c","=",1)
					->where("id","!=",-1)
					->find_all()->as_array();
		$this->template->content = $content;
		$content->bind('groups',$objgroups);
	}	
	public function action_searchallpatients(){
		try{
			$objgroups = ORM::factory("discountgroup")
					->where("active_c","=",1)
					->where("id","!=",-1)
					->find_all();
			$groups = array();
			foreach($objgroups as $objgroup){
				$grp["id"]= $objgroup->id;
				$grp["groupname"]= $objgroup->groupname_c;
				array_push($groups, $grp);
			}

			$patObjs = ORM::factory('user');			
			if(isset($_GET["patId"]) && $_GET["patId"] !== '' ){
				$patId = $_GET["patId"];
				if($patId !== ''){
					$patObjs = $patObjs->where('id', '=', $patId);
				}	
			}else{
				if(isset($_GET["patName"])){
					$patName = $_GET["patName"];
					if($patName !== ''){
						$patObjs = $patObjs->where('Firstname_c', 'like', '%'.$patName.'%');
					}
				}	
				if(isset($_GET["patLastName"])){
					$patLastName = $_GET["patLastName"];
					if($patLastName !== ''){
						$patObjs = $patObjs->where('lastname_c', 'like', '%'.$patLastName.'%');
					}				
				}	
				if(isset($_GET["patContact"])){
					$patContact = $_GET["patContact"];
					if($patContact !== ''){
						$patObjs = $patObjs->where('mobileno1_c', 'like', '%'.$patContact.'%');
					}	
				}
				if(isset($_GET["patEmail"])){
					$patEmail = $_GET["patEmail"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('email', 'like', '%'.$patEmail.'%');
					}	
				}
				if(isset($_GET["patId"])){
					$patId = $_GET["patId"];
					if($patEmail !== ''){
						$patObjs = $patObjs->where('id', 'like', '%'.$patId.'%');
					}	
				}
				$dob = '--';
				if(isset($_GET["dob"])){
					$dateInfo = date_parse_from_format('d M Y', trim($_GET['dob']));
					$dob = $dateInfo['year'].'-'.$dateInfo['month'].'-'.$dateInfo['day'];
					if($dob != '--'){
						$patObjs = $patObjs->where('DOB_c', '=', $dob);
					}
				}
			}
			$patObjs = $patObjs->find_all();
			$searchResults = array();
			foreach($patObjs as $patObj){
				if ($patObj->has('roles', ORM::factory('role', array('name' => 'patient')))){
					$objDisc = ORM::factory("alldiscountmember")
								->where("userid","=",$patObj->id)->find();
					$searchResult = array();
					if($objDisc->recordid != null)					
						$searchResult["attachedgroup"] = $objDisc->groupname;
					else	
						$searchResult["attachedgroup"] = "-";
					$searchResult["name"] = $patObj->Firstname_c." ".$patObj->middlename_c." ".$patObj->lastname_c;
					$searchResult["contact"] = $patObj->mobileno1_c != null?$patObj->mobileno1_c:'Not Provided';
					$searchResult["id"] = $patObj->id;
					if($patObj->DOB_c != '0000-00-00'){
						$searchResult["dob"] = date("d M Y", strtotime($patObj->DOB_c));
					}else{
						$searchResult["dob"] = 'Not Provided';
					}
					$searchResult["photo"] = $patObj->photo_c;
					$searchResult["group"] = $groups;
					
					array_push($searchResults, $searchResult);
				}
			}
			die(json_encode($searchResults));
		}
		catch(Exception $e){throw new Exception($e);}
	}

	public function action_addconsumertogroup(){
		if ($_GET)
		{
			if (isset($_GET['groupid']) and isset($_GET['consumeruserid']))
			{
				$objpat = ORM::factory("patient")
							->where("repatientsuserid_c","=",$_GET['consumeruserid'])
							->find();
				if($objpat->id != null)
				{
					$objgroup = ORM::factory("discgrpmember")
								->where("refpatientsid_c","=",$objpat->id)
								->find();
					$objgroup->refpatientsid_c = $objpat->id;
					$objgroup->refdiscgroupid_c = $_GET['groupid'];					
					$objgroup->active_c = 1;
					$objgroup->save();					
				}
			}
		}
		die;
	}	
	public function action_export()
	{
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$objpathologist = new Model_Pathologist;
		$objpathologist = $objpathologist->where('refpathologistsuserid_c','=',$obj_user->id)->find();
		$pathologistid = $objpathologist->id;
		$whereclause = "";
		$table = "alldiscountmember";
			$columns = "groupname,consumername,userid";
			$groupby = '';
			$sidx = 'groupname'; 
			$sord = 'asc';
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			$i = 0;
			export::toexcel($result,'Grpmember_'.date_timestamp_get($date).'.xls');
	}
}

