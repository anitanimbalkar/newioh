<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cdoctordashboard extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		try
		{
			$obj_user = Auth::instance()->get_user();	
			if($obj_user->activationstatus_c == 'active'){

					$obj_roles = ORM::factory('roleuser')
						->where('user_id','=',$obj_user)
						->find();
					$ref_roleid = $obj_roles->role_id;

					$obj_userRegsteps = ORM::factory('uspstepuser')
						->where('refuspuserid_c','=',$obj_user)
						->find_all();
					$this->check_activate_user($obj_user,$ref_roleid,$obj_userRegsteps);
			}
			else{
				$this->displayinactiveDoctordashboard();
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}	
	}
		
	private function displayinactiveDoctordashboard(){
		$user = Auth::instance()->get_user();
		if (!$user){
			Request::current()->redirect('cuser/login');
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
			$content = View::factory('vinactivedoctordashboard');
			$content->bind('objuser', $user);
			$arr_xmpp = Kohana::$config->load('xmpp');
			$content->bind('arr_xmpp' , $arr_xmpp);
			$this->template->content = $content;
		}
	}
	
	private function check_activate_user($objUser,$ref_roleid,$obj_userRegsteps){
		try{
			if($objUser->registrationProcess_status == 'completed'){
					$url = '/cconsultation/view?#doctordashboardlanding';
					Request::current()->redirect($url);
					$username = "Dr. ".trim($objUser->Firstname_c);
			}
			else{
				$obj_regstepscondition = ORM::factory('uspevent')
					->where('ref_user_roleid','=',$ref_roleid)
					->find_all();
				$totalregstepscondition=$obj_regstepscondition->count();	
				$mandotorystepcount='0';		

				foreach($obj_regstepscondition as $condition){
					foreach($obj_userRegsteps as $step){
						if($condition->ref_registration_stepid == $step->refuseruspstepsid_c){
								++$mandotorystepcount;
								break;
						}
					}
				}
				if($totalregstepscondition == $mandotorystepcount){
						$url = '/cconsultation/view?#doctordashboardlanding';
						Request::current()->redirect($url);
						$username = "Dr. ".trim($objUser->Firstname_c);
				}
				else{
					$this->displayinactiveDoctordashboard();
				}
			}
		}
		catch(Exception $e){throw new Exception($e);}
	}
}