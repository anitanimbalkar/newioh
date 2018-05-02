<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpatientallergy extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		try
		{
			$obj_user = Auth::instance()->get_user();
			if (!$obj_user)
				Request::current()->redirect('cuser/login');
			else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
				$content = $this->getContent($obj_user, $obj_user->id);
				$this->template->content = $content;
			}
			else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
				$patientId = $_GET['patientUserId'];
				$content = $this->getContent($obj_user, $patientId);
				$this->template->content = $content;
			}
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}

	private function getContent($obj_user,$patientUserId){
		$objpatient = new Model_Patient;
		$objpatient->where('repatientsuserid_c','=',$patientUserId)->mustFind();
		$patientid 	= $objpatient->id;
		$objallergyfood	= new Model_Allergymaster;
		$food = $objallergyfood->where('type_c','=','food')->ORDER_BY ('Allergyname_c', 'asc') ->find_all();
		$drug = $objallergyfood->where('type_c','=','drug')->ORDER_BY ('Allergyname_c', 'asc') ->find_all();
		$animal	= $objallergyfood->where('type_c','=','animal')->ORDER_BY ('Allergyname_c', 'asc') ->find_all();
		$plant	= $objallergyfood->where('type_c','=','plant')->ORDER_BY ('Allergyname_c', 'asc') ->find_all();
		$food= $this->getarray($food);
		$drug = $this->getarray($drug);
		$animal = $this->getarray($animal);
		$plant 	= $this->getarray($plant);
		$objpatientallergy = new Model_Patientallergy;
		$patientallergies = $objpatientallergy->where('refpatallergypatientsid_c','=',$patientid)->find_all();
		$arrpatallergy 	= array();
		foreach($patientallergies as $res)
		{
			$arrpatallergy[$res->refpatallergyid_c]= $res->refpatallergyid_c;
		}
		$arrpatallergystr = implode(',',$arrpatallergy);
		$content 	= View::factory('vuser/vpatient/vallergiesandsocialhabits');
		$content->bind('patientid', $patientid);
		$content->bind('user', $obj_user);
		$content->bind('food', $food);
		$content->bind('drug', $drug);
		$content->bind('plant', $plant);
		$content->bind('animal', $animal);
		$content->bind('arrpatallergystr', $arrpatallergystr);
		$content->bind('objpatient', $objpatient);
		return($content);
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
}