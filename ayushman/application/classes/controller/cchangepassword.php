<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');

class Controller_Cchangepassword extends Controller_Ctemplatewithmenu {
	public function action_changepassword()
	{
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vchangepassword')
				->bind('errors', $errors);
			$content->bind('obj_user', $obj_user);
			$content->bind('messages', $messages);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$this->template->content = $content;
	}
	public function action_changepass()
	{
		
		
		$obj_Authuser = Auth::instance()->get_user();
		$oldpassword=$obj_Authuser->password;
		
			$userid = $obj_Authuser->id;
			$oldpass = $_POST['oldpass'];
			$newpass = $_POST['password'];
			$cnewpass = $_POST['password_confirm'];
 			$obj_user = new Model_User;
			$obj_user->where('id','=', $userid)->find();
								
			$obj_validation = new Validation($_POST);	
			$obj_validation = Validation::factory($_POST) 						
                       ->rule('oldpass', 'not_empty')
                        ->rule('password', 'min_length', array(':value', 8))
                        ->rule('password', 'max_length', array(':value', 20))
            			->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
			$messages['success'] = "";
         
 			if ($obj_validation->check())
 			{				
				try
				{				
					if(Auth::instance()->hash($oldpass) == $obj_user->password )
					{
						$obj_user->update_user($_POST,array('password'));
						$messages['success'] = "Password Changed Successfully!";
						echo($messages['success']); die;
					}
					else
					{
						$errors['oldpass']='The password you gave is incorrect. ';
						echo($errors['oldpass']); die;
					}
				}
				catch (ORM_Validation_Exception $e) 
				{
					$errors = $e->errors('errors');
				}
			}
			
		
								
	}
	
	public function action_submitbuttononclick()
	{ 	$obj_Authuser = Auth::instance()->get_user();
		$oldpassword=$obj_Authuser->password;
		if (HTTP_Request::POST == $this->request->method()) 
		{
			$userid = $_POST['userid'];
			$oldpass = $_POST['oldpass'];
			$newpass = $_POST['password'];
			$cnewpass = $_POST['password_confirm'];
 			$obj_user = new Model_User;
			$obj_user->where('id','=', $_POST['userid'])->find();
								
			$obj_validation = new Validation($_POST);	
			$obj_validation = Validation::factory($_POST) 						
                       ->rule('oldpass', 'not_empty')
                        ->rule('password', 'min_length', array(':value', 8))
                        ->rule('password', 'max_length', array(':value', 20))
            			->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
			$messages['success'] = "";
         
 			if ($obj_validation->check())
 			{				
				try
				{				
					if(Auth::instance()->hash($oldpass) == $obj_user->password )
					{
						$obj_user->update_user($_POST,array('password'));
						$messages['success'] = "Password Changed Successfully!";
						//$content = View::factory('vuser/vchangepasswordsuccess');
						$content = View::factory('vuser/vchangepassword')
								->bind('errors', $errors);

					}
					else
					{
						$errors['oldpass']='The password you gave is incorrect. ';
						$content = View::factory('vuser/vchangepassword')
								->bind('errors', $errors);
					}
				}
				catch (ORM_Validation_Exception $e) 
				{
					$errors = $e->errors('errors');
				}
			}
			else
			{
				$errors =$obj_validation->errors('errors');
				$content = View::factory('vuser/vchangepassword')
								->bind('errors', $errors);
			}
			if(!($obj_validation->errors('errors')))
			{
				$obj_newuser = new Model_User;
				$obj_newuser->where('id','=', $_POST['userid'])->find();
				$newpassword=$obj_newuser->password;
				$arr_xmpp = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/xmpp.php');
				//$var = xmpp::changePassword($userid,$oldpassword,$newpassword);	 
			}
		}
			$role = new Model_Role;
			$roleids = $obj_Authuser->get_role_ids();
			$role->where('id','=',$roleids[0])->find();
			$urole =   $role->name;
			$breadcrumb = "Home>>";
			$content->bind('obj_user', $obj_user);
			$content->bind('messages', $messages);
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
	
	public function action_scrituserview()
	{
		$error=array();
		$messages = array();
		$this->display($error,$messages);
	}
	
	private function display($errors,$messages)
	{
		try
		{
			$objuser = Auth::instance()->get_user();
			$content = View::factory('vuser/vchangescriptuserpassword')
				->bind('errors', $errors);
			$content->bind('objuser', $objuser);
			$content->bind('messages', $messages);
			$username = $objuser->Firstname_c;
			$content->bind('username', $username);
			$role = new Model_Role;
			$roleids = $objuser->get_role_ids();
			$role->where('id','=',$roleids[0])->find();
			$urole =   $role->name;
			$breadcrumb = "Home>>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $objuser->Firstname_c;
			$this->template->urole = $urole;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
	
	
	public function action_savescriptuserchanges()
	{
		
		$obj_Authuser = Auth::instance()->get_user();
		$oldpassword=$obj_Authuser->password;
		if (HTTP_Request::POST == $this->request->method()) 
		{
			
			$userid = $_POST['userid'];
			$oldpass = $_POST['oldpassword'];
			$username = $_POST['username'];
			$newpass = $_POST['password'];
			$cnewpass = $_POST['password_confirm'];
			
 			$obj_user = new Model_User;
			$obj_user->where('id','=', $_POST['userid'])->find();
								
			$obj_validation = new Validation($_POST);	
			$obj_validation = Validation::factory($_POST) 						
                       ->rule('oldpassword', 'not_empty')
                        ->rule('password', 'min_length', array(':value', 8))
                        ->rule('password', 'max_length', array(':value', 20))
            		->rule('password_confirm', 'matches', array(':validation', 'password_confirm', 'password'));
 			if ($obj_validation->check())
 			{		
        		
				try
				{	
					if($newpass== $oldpass)
					{
						$errors['password']='The new password shold not equal old password. ';
						$this->display($error,$messages);
					}
					else
					{
						if(Auth::instance()->hash($oldpass) == $obj_user->password )
						{
							$obj_user->update_user($_POST,array('password'));
							$userobj = ORM::factory('user')->where('id','=',$obj_user->id)->find();
							$userobj->username= $username;
							$userobj->isusernameset_c = 'yes';
							$userobj->save();
							$role = new Model_Role;
							$roleids = $obj_user->get_role_ids();
							$role->where('id','=',$roleids[0])->find();
							$urole =   $role->name;
							switch($urole)
							{
								case "doctor":
									Request::current()->redirect('/cdoctordashboard/view');
								break;
								case "patient":
									Request::current()->redirect('/cpatientdashboard/view');
								break;
								case "chemist":
									Request::current()->redirect('/cchemistdashboard/view');
								break;
								
								case "pathologist":
									Request::current()->redirect('/cpathologistdashboard/view');
								break;
								case "admin":
									Request::current()->redirect('/cadmindashboard/admindashboard');
								break;
								case "staff":
									Request::current()->redirect('/Cstaffdashboard/view');
								break;
								case "serviceadmin":
									Request::current()->redirect('/cpackagedashboard/view');
								break;
								case "corporate":
									Request::current()->redirect('/ccorporateaccountmanager/viewdashboard');
								break;
							}
						}
						else
						{
							$errors['oldpassword']='The password you gave is incorrect. ';
							$this->display($error,$messages);
							
						}
					}
				}
				catch (ORM_Validation_Exception $e) 
				{
					$errors = $e->errors('errors');
					$this->display($error,$messages);
				}
			}
			else
			{
				$errors =$obj_validation->errors('errors');
				$this->display($error,$messages);
			}
			
		}
	}
	
	public function action_uploadIcardHeaderFooterByStaff()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vstaff/vicardcustomization');
		$id = $obj_user->id;
		$content->bind('id', $id);
		
		
	
		$objstaff = new Model_Staff;
		$objstaff->where('refstaffuserid_c','=', $id)->find();
		//$header = $objstaff->icardheader_c;
		$content->bind('objstaff', $objstaff);
		//$content->bind('header', $header);
		
		$this->template->content = $content;
	}
	
	public function action_uploadHeaderFooter()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vuploadHeader');
		$id = $obj_user->id;
		$content->bind('id', $id);
		
		//changed because image is not found when we crop the header image
				$obj_header = new Model_Pathologist;
				$obj_header->where('refpathologistsuserid_c','=', $id)->find();
				$header = $obj_header->header_c;
				$content->bind('obj_header', $obj_header);
				$content->bind('header', $header);
				$this->template->content = $content;
				
		//changed because image is not found when we crop the footer image
				$obj_footer = new Model_Pathologist;
				$obj_footer->where('refpathologistsuserid_c','=', $id)->find();
				$footer = $obj_footer->footer_c;
				$content->bind('footer', $footer);
				$this->template->content = $content;
        
		//changed because image is not found when we crop the signature image
				$obj_sign = new Model_Pathologist;
				$obj_sign->where('refpathologistsuserid_c','=', $id)->find();
				$sign = $obj_sign->signature_c;
				$content->bind('sign', $sign);
				$this->template->content = $content;
	}
} // End Welcome
