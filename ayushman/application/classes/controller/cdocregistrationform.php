<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdocregistrationform extends Controller_Cintermediateregistrationform {

	public function action_view(){
		$userId = $_GET['userid'];
		parent::view($userId, "Doctor");
	}
	
	public function action_submit(){
		$errors = array();

		$userId = $_POST['userid'];
		$objUser = new Model_User;
		$objUser = $objUser->where('id','=',$userId)->find();
		
		$objDoctor = ORM::factory('doctor')->where('refdoctorsid_c','=',$userId)->mustFind();
		$objDoctor->RMPnumberdateofissue_c 	= date('Y-m-d',strtotime($_POST['dateOfRegistration']));
		$objDoctor->RMPnumberdateofexpiry_c = date('Y-m-d',strtotime($_POST['dateOfExpiry']));
		$objDoctor->RMPnumber_c = $_POST['RMPnumber_c'];
		$objDoctor->medicalcouncilwhereregistered_c = $_POST['medicalcouncilwhereregistered_c'];
		
		if($_POST['certificate'] == "upload"){
			if($_FILES['upload']['size'] <= 0){
				$errors['nofile'] = "No file uploaded";
			}
			else{
				$fileName = $_FILES['upload']['name'];
				$tmpName  = $_FILES['upload']['tmp_name'];
				$fileSize = $_FILES['upload']['size'];
				$fileType = $_FILES['upload']['type'];
				if( !($fileType == "image/gif"  ||
					$fileType == "image/jpeg" ||
					$fileType == "image/jpg"  ||
					$fileType == "image/png"  ||
					$fileType == "image/pjpeg"||
					$fileType == "application/pdf" ||
					$fileType == "image/bmp")){
					$errors['type'] = "Please upload image or pdf only.";
				}
				else{
					if($fileSize > 1048576){
						$errors['size'] = "File size should be less than 1 MB.";
					}
					else{
						//$fp      = fopen($tmpName, 'r');
						//$content = fread($fp, filesize($tmpName));
						//$content = addslashes($content);
						//fclose($fp);
						$objCertificate = ORM::factory('Doctorcertificate')->where('refdoctorid_c','=',$objDoctor->id)->find();
						if($objCertificate->loaded()){
							$objCertificate->delete();
						}
						$objCertificate = new Model_Doctorcertificate();
						$objCertificate->refdoctorid_c = $objDoctor->id;
						$objCertificate->certificatevia_c = "uploaded";
						if(!is_dir(DOCROOT."/drcertificate")){
							mkdir(DOCROOT."/drcertificate");
						}
						$druserID = $objDoctor->refdoctorsid_c;
						$a=  getdate();
						$timestamp = $a[0];
						$uploaDestination = "";
						if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
						   $uploaDestination =  DOCROOT."drcertificate\\";
						} else {
						    $uploaDestination =  DOCROOT."drcertificate/";
						}
						if( move_uploaded_file($tmpName, $uploaDestination.$timestamp.$fileName)){
							$fileext = explode('.',$fileName);
							rename($uploaDestination.$timestamp.$fileName, $uploaDestination.$druserID.'_'.$timestamp.'_'.$fileName);	
							$objCertificate->path_c= "ayushman/drcertificate/".$druserID."_".$timestamp.'_'.$fileName;
							$objCertificate->save();
						}
						else{
							$errors['size'] = "error during uploading file.Please try once again.";
						}
					}
				}
			}
		}
		else{
			$objCertificate = new Model_Doctorcertificate();
			$objCertificate->refdoctorid_c = $objDoctor->id;
			$objCertificate->certificatevia_c = "mailed";
		}

		if(count($errors) == 0){
			$uspstepuser = ORM::factory('uspstepuser')->where('refuseruspstepsid_c','=','1')->where('refuspuserid_c','=',$userId)->find();
				if($uspstepuser->refuseruspstepsid_c=='1'){
				$uspstepuser->update();
			}
			else{
				$uspstepuser->refuseruspstepsid_c='1';
				$uspstepuser->refuspuserid_c=$userId;
				$uspstepuser->save();
			}

			$objUser->save();
			$objDoctor->saveRecord();
			$objCertificate->save();
			$encrypt = Encrypt::instance('default');
			$encrypted_userid 	= urlencode($encrypt->encode($userId));
			$encrypted_role 	= urlencode($encrypt->encode('Doctor'));
			Request::current()->redirect('cintermediateregistrationform/acknowledge?u='.$encrypted_userid.'&r='.$encrypted_role);
		}
		else{
			parent::view($userId, "Doctor", $errors);
		}
	}
}
