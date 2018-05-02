<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/notificationsender.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');


class Controller_Ccorporateaccountmanager extends Controller_Ctemplatewithmenu{

	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}

	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function display($errors, $messages)
	{
		try{
			$content 	= View::factory('vuser/vadmin/vcompanyprofilepage');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}

	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	public function action_viewdashboard()
	{
		$errors = array();
		$messages = array();
		$whereclause = '[refcorporateid_c,=,6]';
		$this->displaydashboard($errors,$messages,$whereclause);
	}
	private function displaydashboard($errors, $messages,$whereclause)
	{
		try{
			$content 	= View::factory('vuser/vcorporate/vcorporatedashboard');
			$registeredusers = ORM::factory('corporatemember')->where('refcorporateid_c','=',6)->count_all();
			
			$TestInCAMP1 = ORM::factory('coepstudent')->where('TestInCAMP1','=','CAMP 1')->count_all();
			$TestInCAMP2 = ORM::factory('coepstudent')->where('TestInCAMP2','=','CAMP 2')->count_all();
			$TestInCAMP3 = '401';
			
			$ConsultationInCAMP1 = ORM::factory('coepstudent')->where('ConsultationInCAMP1','=','CAMP 1')->count_all();
			$ConsultationInCAMP2 = ORM::factory('coepstudent')->where('ConsultationInCAMP2','=','CAMP 2')->count_all();
			$ConsultationInCAMP3 = '402';
			
			$content->bind('registeredusers', $registeredusers);
			$content->bind('TestInCAMP1', $TestInCAMP1);
			$content->bind('TestInCAMP2', $TestInCAMP2);
			$content->bind('TestInCAMP3', $TestInCAMP3);
			$content->bind('ConsultationInCAMP1', $ConsultationInCAMP1);
			$content->bind('ConsultationInCAMP2', $ConsultationInCAMP2);
			$content->bind('ConsultationInCAMP3', $ConsultationInCAMP3);

			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			
			$content->bind('whereclause', $whereclause);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_search(){
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			if($search != ''){
				$whereclause = '[IOHID,=,'.$search.'](or)[MIS,like,'.$search.'%]'.$whereclause.'(or)[Name,like,'.$search.'%]'.$whereclause.'(or)[stream,like,'.$search.'%]'.$whereclause.'(or)[year,like,'.$search.'%]'.$whereclause.'(or)[TestStatus,like,'.$search.'%](or)[ConsultationStatus,like,'.$search.'%](or)[Name,like,'.$search.'%]';
			}
			$this->displaydashboard($errors,$messages,$whereclause);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->displaydashboard($errors,$messages,$whereclause);
		}
	}
	public function action_export()
	{
		$errors = array();
		$messages = array();
		$whereclause = '';
		if($_POST){
			$search = $_POST['search'];
			if($search != ''){
				$whereclause = '[IOHID,=,'.$search.'](or)[MIS,like,'.$search.'%]'.$whereclause.'(or)[Name,like,'.$search.'%]'.$whereclause.'(or)[stream,like,'.$search.'%]'.$whereclause.'(or)[year,like,'.$search.'%]'.$whereclause.'(or)[TestStatus,like,'.$search.'%](or)[ConsultationStatus,like,'.$search.'%](or)[Name,like,'.$search.'%]';

			}


			$table = "coepstudent";
			$columns = "IOHID,MIS,Name,Year,Stream,Gender,MobileNumber,Email,DOB,TestInCAMP1,ConsultationInCAMP1,TestInCAMP2,ConsultationInCAMP2,TestInCAMP3,ConsultationInCAMP3";
			$groupby = '';
			$sidx = 'MIS'; 
			$sord = 'desc'; 		
			$jqgriddata=new Model_xjqgridgetdata;
			$result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
			$date = date_create();
			export::toexcel($result,'CoEP_Students_'.date_timestamp_get($date).'.xls');
		}else{
			$errors['error'] = 'Could not export data to excel';
			$this->displaydashboard($errors,$messages,$whereclause);
		}
	}
	
		
	//create or update company Profile 
	public function action_save()
	{
		$messages = array();
		$errors = array();
		try {
			if($_POST)
			{ 
				$corporatename 	= $_POST['corporatename_c'];
				$username =       $_POST['contactpersonloginid_c'];
				$password =       $_POST['contactpersonpassword_c'];
				$emailid		= $_POST['contactpersonemailid_c'];
				
				$objUser = ORM::factory('user')->where('username','=',$corporatename)->find();
				if($objUser->id != null){
					$errors['createaccount'] = 'Could not create account. Corporate Name already exists in the system. Please enter unique corporate name.';
					$this->display($errors, $messages);
					return true;
				}
				$objAddress = ORM::factory('address');
				$objAddress->saveRecord($_POST);
				
				$obj_user 	= Auth::instance()->get_user();
				$userid 	= $obj_user->id;
				
				
				$registration = new helper_Registration();
				$id = $registration->create_user(array(0,$username,$password,$emailid),'corporate');
				$objCorporate = ORM::factory('corporate');
				$objCorporate->refaddressid_c 	= $objAddress->id;
				$objCorporate->createddate_c	= date('Y-m-d g:i:s a');
				$objCorporate->updateddate_c	= date('Y-m-d g:i:s a');
				$objCorporate->updatedby_c		= $userid;			    
				$objCorporate->refusersid_c = $id;
				$objCorporate->saveRecord($_POST);
	
				
				$messages['success'] = 'Corporate account for '.$corporatename.' is created successfuly';
				
				$this->display($errors, $messages);
			}else{
				$errors['createaccount'] = 'Could not create account.';
				$this->display($errors, $messages);
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	// Action to display edit profile form
	public function action_edit()
	{
		$messages = array();
		$errors = array();
		try{
			$corporateid = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find()->id;
			if($corporateid == Null){
				$corporateid 	= $_GET['id'];
			}
			$_POST 			= ORM::factory('getcorporate')->where('id','=',$corporateid)->find()->as_array();
			$_POST['corporateid'] = $corporateid;
			$this->displayEditProfileForm($errors, $messages);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Common function to display edit form
	private function displayEditProfileForm($errors, $messages)
	{
		try{
			$content 	= View::factory('vuser/vadmin/vcompanyeditprofile');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Update corporate profile
	public function action_update()
	{
		$messages = array();
		$errors = array();
		try {
			if($_POST)
			{
				$corporateid 	= $_POST['corporateid'];
				$objCorporate = ORM::factory('corporate')->where('id','=',$corporateid)->mustFind();
				$objCorporate->saveRecord($_POST);
				
				if($objCorporate->refaddressid_c == null){
					$objAddress = ORM::factory('address');
					$objAddress = $objAddress->saveRecord($_POST);
					$objCorporate->refaddressid_c = $objAddress->id;
					$objCorporate->save();
					
				}else{
					$objAddress = ORM::factory('address')->where('id','=',$objCorporate->refaddressid_c)->mustFind();
					$objAddress->saveRecord($_POST);
				}
				
								
				$messages['success'] = 'Corporate account for '.$objCorporate->corporatename_c.' is updated successfuly';
				$this->displayEditProfileForm($errors, $messages);
			}else{
				$errors['createaccount'] = 'Could not update account.';
				$this->displayEditProfileForm($errors, $messages);
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}
	
	// Display page to upload members.
	public function action_associatemembers()
	{
		$messages = array();
		$errors = array();
		try{
			$corporateid 	= $_GET['id'];
			$_POST 			= ORM::factory('getcorporate')->where('id','=',$corporateid)->find()->as_array();
			$_POST['corporateid'] = $corporateid;
			$this->displayUploadForm($errors, $messages);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	//Common function to display edit form
	private function displayUploadForm($errors, $messages)
	{
		try{
			$content 	= View::factory('vuser/vadmin/vassociatemembers');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// upload members
	public function action_uploadMembers()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$corporateid 	= $_POST['corporateid'];
				if(($_FILES["file"]["type"] == "application/vnd.ms-excel")){
					if ($_FILES["file"]["error"] > 0){
						$errors['error'] =  "Return Code: " . $_FILES["file"]["error"] . "<br />";
					}
					else{
						$uploaddestination =  DOCROOT."temp/";
						try{
							if( move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddestination . $_FILES["file"]["name"])){
								$filenm 	= $_FILES["file"]["name"];
								$fileext 	= explode('.',$filenm);
								rename(DOCROOT."temp/".$_FILES["file"]["name"],DOCROOT."temp/".$corporateid.".".$fileext[1]);
								$rows = $this->CSVImport(DOCROOT."temp/".$corporateid.".".$fileext[1]);
								$count = 0;
								
								//Find all active members and change status to inactive
								$objCorporates = ORM::factory('corporatemember')->where('refcorporateid_C','=',$corporateid)->where('status_c','=','active')->find_all()->as_array();
								foreach($objCorporates as $objCorporate){
									$objCorporate->status_c = 'inactive';
									$objCorporate->update();
								}
								$associatedMembers = array();
								foreach($rows as $row){
									if($count > 0){
										$row = explode(',', $row[0]);
										$objCorporate = ORM::factory('corporatemember')->where('emailid_c','=',$row[3])->find();
										//Change status to active if inactive else let it be the same
										if($objCorporate->status_c == 'Associated'){
											array_push($associatedMembers,$objCorporate);
										}else{
											$objCorporate->refcorporateid_c 	= $corporateid;
											$objCorporate->status_c 			= 'active';
											$objCorporate->employeename_c 		= ucwords($row[0]);
											$objCorporate->employeeid_c 		= $row[1];
											$objCorporate->dateofbirth_c 		= $row[2];
											$objCorporate->emailid_c 			= $row[3];
											$objCorporate->employeemobileno_c 	= $row[4];
											$objCorporate->save();
										}
									}
									$count = $count + 1;
								}
								
								//Get All Associated members, check with associated members from .csv file and if they exists let it be associated else disassociate.
								$objCorporateMembers = ORM::factory('corporatemember')->where('refcorporateid_C','=',$corporateid)->where('status_c','=','Associated')->find_all()->as_array();
								foreach($objCorporateMembers as $objCorporateMember){
									$status = false;
									foreach($associatedMembers as $associatedMember){
										if($associatedMember->id == $objCorporateMember->id){
											$status = true;
											break;
										}
									}
									if($status == false){
										$this->disassociateMember($corporateid,  $objCorporateMember->iohid_c);
										$objCorporateMember->status_c = 'inactive';
										$objCorporateMember->update();
									}
								}
							}
							else{
								$errors['error'] = "Some error has occured while uploading .csv file.";
							}
						}
						catch(Exception $e)
						{
							$errors['error'] = $e;
						}
						$messages['message'] = "File uploaded successfully";
					}
				}
				else{
					$errors['error'] = ".csv file is not selected. Please select .csv file only.";
				}
				$this->displayUploadForm($errors, $messages);
			}else{
				$errors['error'] = '$_Post is null';
				$this->displayUploadForm($errors, $messages);
			}
		}catch(Exception $e){
		
			throw new Exception($e);
		}
	}
	
	// upload members
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
	
	public function CSVImport($file) {
		$handle = fopen($file, 'r');
		if (!$handle)
			die('Cannot open  file.');
		$rows = array();
		//Read the file as csv
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$rows[] =  $data;
		}
		fclose($handle);
		return $rows;
	}

	public function action_showMemberValidationForm()
	{
		$errors 	= array();
		$messages 	= array();
		$this->displayValidationForm($errors,$messages);
	}
	
	//Common function for displaying company profile page. $errors and $messages will be shown on page if it contains any data.
	private function displayValidationForm($errors, $messages)
	{
		try{
			$objCorporateMember = ORM::factory('corporatemember')->where('status_c','=','Associated')->where('iohid_c','=',Auth::instance()->get_user()->id)->find();
			if(!isset($objCorporateMember->id)){
				$content 	= View::factory('vuser/vpatient/vcorporatemembervalidation');
				$obj_user 	= Auth::instance()->get_user();
				$_POST['DOB_c']	= date('d M Y', strtotime ($obj_user->DOB_c));
			}else{
				$content 	= View::factory('vuser/vpatient/vcorporatememberassociation');
				$corporateid 	= $objCorporateMember->refcorporateid_c;
				$_POST 			= ORM::factory('getcorporate')->where('id','=',$corporateid)->find()->as_array();
				$_POST['corporateid'] = $corporateid;
				$messages['message'] = 'You are associated with '.ORM::factory('corporate')->where('id','=',$corporateid)->find()->corporatename_c.' corporate account.';
			}
			
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	// validate members
	public function action_validate()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$companyName 	= $_POST['companyname'];
				$employeeid 	= $_POST['employeeid'];
				$employeedob 	= $_POST['DOB_c'];
				
				if(isset($_POST['emailid'])){
					$emailid = $_POST['emailid'];
				}
				$objCorporate = ORM::factory('corporate')->where('corporatename_c','=',$companyName)->find();
				if(!isset($objCorporate->id)){
					$errors['error'] = 'Company name does not exist in the system.';
				}else{
					$objCorporateMember = ORM::factory('corporatemember')->where('refcorporateid_c','=',$objCorporate->id)->where('status_c','!=','inactive')->where('employeeid_c','=',$employeeid)->where('dateofbirth_c','=',date('d-m-Y', strtotime($employeedob)))->find();
					if((!isset($objCorporateMember->id))){
						$errors['error'] = 'Information provided does not match with company records or You are not authorized to associate with this corporate account.';
					}else{
						$objCorporateMember->isassociated_c = 1;
						$objCorporateMember->iohid_c		= Auth::instance()->get_user()->id;
						$objCorporateMember->status_c		= "Associated";
						$objCorporateMember->update();
						
						$objCorporateTransactions = ORM::factory('corporatetransaction');
						$objCorporateTransactions->corporateid_c 	= $objCorporate->id;
						$objCorporateTransactions->userid_c	 		= Auth::instance()->get_user()->id;
						$objCorporateTransactions->employeeid_c		= $employeeid;
						$objCorporateTransactions->corporatename_c 	= $objCorporate->corporatename_c;
						$objCorporateTransactions->username_c	 	= Auth::instance()->get_user()->Firstname_c.' '.Auth::instance()->get_user()->lastname_c;
						$objCorporateTransactions->transactionsummary_c	= 'Associated With Corporate Account';
						$objCorporateTransactions->transactionamount_c 	= '0';
						$objCorporateTransactions->save();						
						$messages['message'] = 'You are associated with company '.$objCorporate->corporatename_c.'. Now you can choose corporate plan associated with the same company';
					}
				}
				
				$this->displayValidationForm($errors, $messages);
			}else{
				$errors['error'] = '$_Post is null';
				$this->displayValidationForm($errors, $messages);
			}
		}catch(Exception $e){
		
			throw new Exception($e);
		}
	}
	
	// action to disassociate members
	public function action_disassociate()
	{
		$messages = array();
		$errors = array();
		try{
			if($_POST){
				$corporateid 	= $_POST['corporateid'];
				$this->disassociateMember($corporateid,Auth::instance()->get_user()->id);
				$this->displayValidationForm($errors, $messages);
			}else{
				$errors['error'] = '$_Post is null';
				$this->displayValidationForm($errors, $messages);
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	private function disassociateMember($corporateid,$userid){
		$obj_user = ORM::factory('user')->where('id','=',$userid)->find();
		$objCorporateMember = ORM::factory('corporatemember')->where('status_c','=','Associated')->where('refcorporateid_c','=',$corporateid)->where('iohid_c','=',$obj_user->id)->find();
		$objCorporate = ORM::factory('corporate')->where('id','=',$corporateid)->find();
		if(!isset($objCorporateMember->id)){
			$errors['error'] = 'Could not disassociate from corporate.';
		}else{			
			$objCorporateTransactions = ORM::factory('corporatetransaction');
			$objCorporateTransactions->corporateid_c 	= $objCorporate->id;
			$objCorporateTransactions->employeeid_c 	= $objCorporateMember->employeeid_c;
			$objCorporateTransactions->userid_c	 		= $obj_user->id;
			$objCorporateTransactions->corporatename_c 	= $objCorporate->corporatename_c;
			$objCorporateTransactions->username_c	 	= $obj_user->Firstname_c.' '.$obj_user->lastname_c;
			$objCorporateTransactions->transactionsummary_c	= 'Disassociated With Corporate Account';
			$objCorporateTransactions->transactionamount_c 	= '0';
			$objCorporateTransactions->save();
			
			$objCorporateMember->isassociated_c = 0;
			$objCorporateMember->iohid_c		= null;
			$objCorporateMember->status_c		= "active";
			$objCorporateMember->update();
			
			$objBillingPlan = ORM::factory('billingindividualplan')->where('status_c','=','active')->where('refusersid_c','=',$userid)->find();
			$objPlans = ORM::factory('billingplan')->where('id','=',$objBillingPlan->refplanid_c)->find();
			if($objPlans->towhomcorporateid_c == $corporateid){
				$objBillingPlan->status_c 		= 'removed';
				$objBillingPlan->updateddate_c 	= date('Y-m-d g:i:s a');
				$objBillingPlan->updatedby_c 	= Auth::instance()->get_user()->id;
				$objBillingPlan->saveRecord();
			}
			$notification=  array();
			$notification['id']=$userid;$notification['template']='disassociatecorporate';$notification['email']='true'; $notification['companyname']=$objCorporate->corporatename_c; $notification['username']=$obj_user->Firstname_c.' '.$obj_user->lastname_c;
			helper_notificationsender::sendnotification($notification);
			
			$messages['message'] = 'You are disassociated from corporate account.';
		}
	}
	
}
