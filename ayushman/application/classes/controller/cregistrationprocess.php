<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cregistrationprocess extends Controller {
  public function action_view()
  {
  		$flag=$_GET['flag'];
  		$objUser = Auth::instance()->get_user();
		$userid = $objUser->id;
		$content     = View::factory('vregistrationProcess');
		
		$obj_roleuser = ORM::factory('roleuser')
					->where('user_id','=',$userid)
					->find_all();
		foreach($obj_roleuser as $role){			
			$obj_role = ORM::factory('role')
				->where('id','=',$role->role_id)
				->find();
			if($obj_role->name == 'doctor'){
				$ref_roleid = $obj_role->id;
			}	
		}
		$obj_regsteps = ORM::factory('uspsteprole')
					->where('refrolesusersid_c','=',$ref_roleid)
					->find_all();
		$obj_userRegsteps = ORM::factory('uspstepuser')
					->where('refuspuserid_c','=',$userid)
					->find_all();
		if($objUser->registrationProcess_status != 'completed'){			
			$this->complete_regprocstatus($objUser,$obj_regsteps,$obj_userRegsteps);
		}
		if($objUser->activationstatus_c == 'inactivedoctor'){			
			$this->send_activation_request($objUser,$obj_userRegsteps,$ref_roleid);
		}
		$totalstepscount=$obj_regsteps->count();
		$totalstepsDonebyuser=$obj_userRegsteps->count();

		if($totalstepsDonebyuser < $totalstepscount  ){
			$step_names=array();
			foreach ($obj_regsteps as $val)
			{ 
				$ref_stepactionid = $val->refuspstepsid_c;
				$flag2='0';
				if($flag=='1'){
					foreach($obj_userRegsteps as $val){
						if($val->refuseruspstepsid_c==$ref_stepactionid)
							$flag2='1';
					}
				}
				if($flag2!='1'){
					$obj_stepaction = ORM::factory('uspstep')
						->where('id','=',$ref_stepactionid)			
						->find();
					$stepconcatAction=$obj_stepaction->stepname_c.','.$obj_stepaction->controller_c.','.$ref_stepactionid;
		 			array_push($step_names,$stepconcatAction);
		 		}		  
			}
			$content->bind('step_names',$step_names);
			$content->bind('userid', $userid);
			$content->bind('flag',$flag);
			$content->bind('obj_userRegsteps',$obj_userRegsteps);
			$this->response->body($content);
		}
  }
  
  	private function complete_regprocstatus($obj_user,$obj_regsteps,$obj_userRegsteps){
		try{
				$count='0';	
				foreach($obj_regsteps as $regstep){
					foreach($obj_userRegsteps as $userstep){
						if($regstep->refuspstepsid_c == $userstep->refuseruspstepsid_c){
							$count++;
							break;
						}
					}
				}
				$totalstepscount=$obj_regsteps->count();
				if($count == $totalstepscount){
					$obj_user->registrationProcess_status='completed';
					$obj_user->save();
				}
		}
		catch(Exception $e){var_dump($e);}
	}
	
		private function send_activation_request($objUser,$obj_userRegsteps,$ref_roleid){
		try{
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
					if($objUser->activationstatus_c == 'inactivedoctor'){
						$objUser->activationstatus_c = 'activatedoctor';
						$objUser->save();
					}	
				}
		}
		catch(Exception $e){var_dump($e);}
	}
}