<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientimmunization extends Controller {

	public function action_patientimmunization()
	{
		$obj_user = Auth::instance()->get_user();
		$content = View::factory('vuser/vpatient/vpatientimmunization');
		
		$objpatient = new Model_Patient;
		$objpatient->where('repatientsuserid_c','=',$obj_user->id)->find();
		$patientid = $objpatient->id;
		
		
		$content->bind('user', $obj_user);
		
		$content->bind('objpatient', $objpatient);
		
		$urole = "patient";
		$breadcrumb = "Home>>";
		$this->response->body($content);
		
	}
	
	public function getarray($object)
	{
		$arr= array();
			foreach($object as $res)
			{
				$arr[$res->id]=$res->Allergyname_c;
			}
		return $arr;
	}
	


} // End Welcome
