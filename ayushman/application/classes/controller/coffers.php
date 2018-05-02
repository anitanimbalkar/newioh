<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Coffers extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{
		try
		{
			$errors = array();
			$messages = array();
			$this->displayoffers($errors, $messages);
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_firstlogin()
	{
		try
		{
			$errors = array();
			$messages = array();
			$content = View::factory('vuser/vpatient/vfirstlogin');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content 	= $content;
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	private function displayoffers($errors, $messages)
	{
		try
		{
			$content = View::factory('vuser/vpatient/voffers');
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			$this->template->content 	= $content;
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	public function action_attach()
	{
		try
		{
			$errors = array();
			$messages = array();
			
			if(isset($_POST)){
				$promocode = $_POST['promocode'];
				
				if(strtoupper($promocode) == 'BAGIC-008'){
					$corporateid = 11;
					$this->attachtocorporate($corporateid);
				}else if(strtoupper($promocode) == 'KMT2014'){
					$corporateid = 14;
					$this->attachtocorporate($corporateid);
				}else{
					$errors['error'] = 'Wrong Promo code is entered.';
					$this->displayoffers($errors, $messages);
				}
			}
			$errors['error'] = 'Invalid url';
			$this->displayoffers($errors, $messages);
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
	private function attachtocorporate($corporateid){
		$user = Auth::instance()->get_user();
		$corporatemembers = ORM::factory('corporatemember')->where('iohid_c','=',$user->id)->find_all();
		foreach($corporatemembers as $corporatemember){
			$corporatemember->status_c = 'inactive';
			$corporatemember->isassociated_c = 0;
			$corporatemember->update();
		}
		
		$corporatemember = ORM::factory('corporatemember')->where('refcorporateid_c','=',$corporateid)->where('iohid_c','=',$user->id)->find();
		if($corporatemember->id == null){
			$corporatemember = ORM::factory('corporatemember');
			$corporatemember->refcorporateid_c = $corporateid;
			$corporatemember->status_c = 'Associated';
			$corporatemember->iohid_c = $user->id;
			$corporatemember->emailid_c = $user->email;
			$corporatemember->employeename_c = $user->Firstname_c.' '.$user->lastname_c;
			$corporatemember->isassociated_c = 1;
			$corporatemember->save();
		}else{
			$corporatemember->status_c = 'Associated';
			$corporatemember->isassociated_c = 1;
			$corporatemember->update();
		}
		Request::current()->redirect('cplanselector/view');
	
	}
}