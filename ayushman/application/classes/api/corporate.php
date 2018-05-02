<?php

class api_Corporate
{
	public function attach($corporateid,$postarray,$user)
	{
		try
		{
			$errors = array();
			$messages = array();
			//$corporateid = 11;
			//if(isset($postarray)){
				$promocode = $postarray['promocode'];
				if(strtoupper($promocode) == 'BAGIC-008'){
					//$user = Auth::instance()->get_user();
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
					$data['type']="success";
					$data['message']="successful";
					//Request::current()->redirect('cplanselector/view');
				}else{
					$errors['error'] = 'Wrong Promo code is entered.';
					$data['type']="failed";
					$data['error']='Wrong Promo code is entered.';
				}
			
			//$this->displayoffers($errors, $messages);
			return $data;
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
}