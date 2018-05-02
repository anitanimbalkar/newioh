<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cstaffdirectory extends Controller_Ctemplatewithmenu {
	
	public function action_view()
	{
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	
	private function display($errors, $messages)
	{
		try{
			$objUser = Auth::instance()->get_user();
			$objDoctor = ORM::factory('Doctor')->where("refdoctorsid_c","=",$objUser->id )->find();
			$objPendingStaffActivations = ORM::factory('pendingstaffactivation')->where('drid','=',$objDoctor->id)->find_all()->as_array();
			$pendingActivationNumber = count($objPendingStaffActivations);
			$content = View::factory('vuser/vstaff/vstaffdirectory');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$content->bind('pendingActivationNumber',$pendingActivationNumber);
			$this->template->content = $content;
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	public function action_mystaff()
	{
		$objstaff = ORM::factory('favoritestaffbydoctordetail')->where('doctorUserId','=',Auth::instance()->get_user()->id)->where('status','=','accepted')->find_all()->as_array();
		if(count($objstaff) == 0){
			echo 'No Staff in your network';die;
		}else{
			$stafflist = array();
			foreach($objstaff as $staff)
			{
				$user = ORM::factory('user');
				$temp = $user->get_info($staff->staffuserid);
				array_push($stafflist,$temp);
			}
			echo json_encode($stafflist);die;
		}
	}
	public function action_removestaff()
	{
		try{
			$staffId= $_GET['staffid'];
			//var_dump($staffId);die;
			$objUser = Auth::instance()->get_user();
			$doctorUserId= $objUser->id;
			$doctorId= ORM:: factory('doctor')->where('refdoctorsid_c','=',$doctorUserId)->find()->id;
			$objStaff = ORM:: factory('staff')->where('refstaffuserid_c','=',$staffId)->find();
			$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctor')
										->where('reffavdoctorid', '=',$doctorId)
										->where('reffavstaffid', '=',$objStaff->id)
										->where('status','=','accepted')
										->find();
			//var_dump($objFavoriteStaffByDoctors->id);die;
			if($objFavoriteStaffByDoctors->id != NULL)//if record found in favoritestaffbydoctor then dont delete 
			{		
				$arr_xmpp =Kohana::$config->load('xmpp');
				$var = xmpp::deleteRosterContact($objStaff->refstaffuserid_c.'@'.$arr_xmpp['servername'],$doctorUserId.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
				if($var != 'success')//error while removing from xmpp contact list 
				{
					throw new Exception($var["ERROR"]);
				}
				else //successfully removed from xmpp contat now remove it from "favoritestaffbydoctor" table 
				{
					$objFavoriteStaffByDoctors->delete();
					die();
				}
			}
		}catch(Exception $e){
			throw new Exception($e);
		}
		
	}

	public function action_checkemailavailabilityforstaff()
	{
		try{
			$emailid = $_GET["email"];
			$objuser=ORM::factory('user')
					->where('email','=',$emailid)
					->find();
			$returnData="";
			if($objuser->id==NULL)//email is not not in server.
			{
				$returnData="valid";
			}	
			else //email is present
			{//check for role is staff if role is staff then valid email.
				if ($objuser->has('roles', ORM::factory('role', array('name' => 'staff'))))			
				{
					$returnData="valid";
				}
				else
				{	
					$returnData="invalid";
				}
			}
			die($returnData);
		}catch(Exception $e){
			throw new Exception($e);
		}
	}	
	
	public function action_addstaff()
	{
		try{
			$emailid = $_GET["email"];
			$objUser = Auth::instance()->get_user();
			$obj_doctor= ORM::factory('doctor')->where('refdoctorsid_c','=',$objUser->id)->find();
			$obj_StaffUser=ORM::factory('user')->join('staffs')->on('user.id','=','staffs.refstaffuserid_c')->where('email','=',$emailid)->find();
			if($obj_StaffUser->id !=NULL)
			{
				// Check if the staff is registered as Hospital staff then dont send request
				$obj_StaffUser=ORM::factory('user')->join('staffs')->on('user.id','=','staffs.refstaffuserid_c')
								->where('email','=',$emailid)
								->where('staffs.refhospitalid_c','<=>',NULL)
								->find();
				if($obj_StaffUser->id !=NULL)
				{	
					if ($obj_StaffUser->has('roles', ORM::factory('role', array('name' => 'staff'))))
					{
						$obj_Staff = ORM::factory('staff')->where('refstaffuserid_c','=',$obj_StaffUser->id)->find();
						$obj_favoritestaffbydoctor =ORM::factory('favoritestaffbydoctor')
							->where('reffavdoctorid','=',$obj_doctor->id)
							->where('reffavstaffid','=',$obj_Staff->id)
							->find();
						if($obj_favoritestaffbydoctor->id 	== NULL)
						{
							$obj_favoritestaffbydoctor =ORM::factory('favoritestaffbydoctor');
							$obj_favoritestaffbydoctor->reffavdoctorid= $obj_doctor->id;
							$obj_favoritestaffbydoctor->reffavstaffid =$obj_Staff->id;
							$obj_favoritestaffbydoctor->status ='pending';
							$obj_favoritestaffbydoctor->save();
							$arr_xmpp =Kohana::$config->load('xmpp');
							$var = xmpp::addRosterContact($obj_StaffUser->id.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
						}
						else//doctor and staff pair already present
						{
						
						}
					}
					else
					{
						$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor')->where('staffemail_c','=',$emailid)->where('refstaffinvitationbydoctorid_c','=',$obj_doctor->id)->find();
						if($obj_staffinvitationbydoctor->id == NULL)
						{
							$activationcode = md5(uniqid(rand(), true));
							$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor');
							$obj_staffinvitationbydoctor->staffemail_c = $emailid;
							$obj_staffinvitationbydoctor->refstaffinvitationbydoctorid_c = $obj_doctor->id;
							$obj_staffinvitationbydoctor->status_c = 'pending';
							$obj_staffinvitationbydoctor->activationcode_c= $activationcode;
							$obj_staffinvitationbydoctor->save();
							$subject = "Registation Process";
							$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/newstaffactivation?drid=".$obj_doctor->id."&email=".$emailid."&key=$activationcode";
							$emailbody="Hi,<br/>Dr. ".trim($objUser->Firstname_c)." ".trim($objUser->lastname_c)." wants to add you as staff.<br/>
									please click on following link to proceed<br/>
									<a target='_blank' href=".$website_url." >".$website_url."</a>";
							$emailsendrequest=Request::factory('cemailsender/emailwithoutattachement');
							$emailsendrequest->post('email',$emailid);
							$emailsendrequest->post('emailbody',$emailbody);
							$emailsendrequest->post('subject',$subject);
							$emailsendrequest->execute();
						}
					}
				}
				else
				{
					// Hospital staff and is not available outside
					// so no action
				}
			}
			else//staff which is not from system.
			{
				$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor')->where('staffemail_c','=',$emailid)->where('refstaffinvitationbydoctorid_c','=',$obj_doctor->id)->find();
				if($obj_staffinvitationbydoctor->id == NULL)
				{
					$activationcode = md5(uniqid(rand(), true));
					$obj_staffinvitationbydoctor = ORM::factory('staffinvitationbydoctor');
					$obj_staffinvitationbydoctor->staffemail_c = $emailid;
					$obj_staffinvitationbydoctor->refstaffinvitationbydoctorid_c = $obj_doctor->id;
					$obj_staffinvitationbydoctor->status_c = 'pending';
					$obj_staffinvitationbydoctor->activationcode_c= $activationcode;
					$obj_staffinvitationbydoctor->save();
					$subject = "Registation Process";
					$website_url="http://".$_SERVER['HTTP_HOST']."/ayushman/cregistrar/newstaffactivation?drid=".$obj_doctor->id."&email=".$emailid."&key=$activationcode";
					$emailbody="Hi,<br/>Dr. ".trim($objUser->Firstname_c)." ".trim($objUser->lastname_c)." wants to add you as staff.<br/>
								please click on following link to proceed<br/>
								<a target='_blank' href=".$website_url." >".$website_url."</a>";
					$emailsendrequest=Request::factory('cemailsender/emailwithoutattachement');
					$emailsendrequest->post('email',$emailid);
					$emailsendrequest->post('emailbody',$emailbody);
					$emailsendrequest->post('subject',$subject);
					$emailsendrequest->execute();
				}
			}	
			die();		
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_showpendingactivation()
	{
		try{
			$objUser = Auth::instance()->get_user();
			$objDoctor = ORM::factory('Doctor')->where("refdoctorsid_c","=",$objUser->id )->find();
			$objPendingStaffActivation = ORM::factory('pendingstaffactivation')->where('drid','=',$objDoctor->id)->find_all()->as_array();
			$results = array();
			if($objPendingStaffActivation)
			{
				foreach($objPendingStaffActivation as $pendingStaffActivation){
					$result['email'] = $pendingStaffActivation->email;
					array_push($results, $result);
				}
			}
			die(json_encode($results));
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
	
	public function action_cancelinvitation()
	{
		try{
			$staffEmail= $_GET['email'];
			$objUser = Auth::instance()->get_user();
			$objDoctor = ORM::factory('Doctor')->where("refdoctorsid_c","=",$objUser->id )->find();
			$cancelInvitationChecker = "false";
			$objstaffinvitationbydoctor = ORM::factory('staffinvitationbydoctor')->where("refstaffinvitationbydoctorid_c","=",$objDoctor->id )->where('staffemail_c','=',$staffEmail)->where('status_c','=','pending')->find();
			if($objstaffinvitationbydoctor->id != '')
			{
				$objstaffinvitationbydoctor->status_c = 'remove';
				$objstaffinvitationbydoctor->save();
				$cancelInvitationChecker = "true";
			}
			else
			{
				$objStaff = ORM:: factory('staff')->join('users')->on('users.id','=','staff.refstaffuserid_c')->where('users.email','=',$staffEmail)->find();
				$staffId = $objStaff->id;
				$objFavoriteStaffByDoctors = ORM::factory('favoritestaffbydoctor')->where('reffavdoctorid', '=',$objDoctor->id)->where('reffavstaffid', '=',$staffId)->where('status','=','pending')->find();
				$objFavoriteStaffByDoctors->delete();
				$cancelInvitationChecker = "true";
			}
			die();
		}catch(Exception $e){
			throw new Exception($e);
		}
	}
}