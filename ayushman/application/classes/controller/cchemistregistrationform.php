<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cchemistregistrationform extends Controller_Cintermediateregistrationform {

	public function action_view()
	{
		$userId = $_GET['userid'];
		parent::view($userId, "Chemist");
	}
	
	public function action_submit()
	{
		if (HTTP_Request::POST == $this->request->method()){
			$userId = $_POST['userid'];
			$objchemist = ORM::factory('chemist')
						->where('refchemistsuserid_c','=',$userId)
						->find();
			$objUser 	= ORM::factory('user')
						->where('id','=',$userId)
						->find();
			if(isset($_POST['samePharmacist']))
			{
				$_POST['pharmacistfirtsname_c']		= $objUser->Firstname_c;
				$_POST['pharmacistmiddlename_c']	= $objUser->middlename_c;
				$_POST['pharmacistlastname_c']		= $objUser->lastname_c;
				$_POST['pharmacistisdmobilenumber_c']	= $objUser->isdmobileno1_c;
				$_POST['pharmacistmobilenumber_c']	= $objUser->mobileno1_c;
				$_POST['pharmacistemailid_c']		= $objUser->email;
				$_POST['issameasuser_c']			= 1;
			}
			$_POST['refchemistsuserid_c'] = $objUser->id;
			$_POST['medicalactlicencevaliddate_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['medicalactlicencevaliddate_c'] ) );
			$_POST['fadlicencedatetill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['fadlicencedatetill_c'] ) );
			$_POST['pharmacistlicencevalidtill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['pharmacistlicencevalidtill_c'] ) );
			$objchemist->saveRecord($_POST);
			
			$objaddress = new Model_Address;
			$objaddress->saveRecord($_POST);
			$intworkaddid = $objaddress->id;
			
			$objUser->isdphonenowork_c=$_POST['isdphonework'];
			$objUser->phonenowork_c=$_POST['phonework'];
			$objUser->refaddresswork_c = $intworkaddid;
			$objUser->activationstatus_c="activatechemist";
			$objUser->save();
			
			$encrypt = Encrypt::instance('default');
			$encrypted_userid 	= urlencode($encrypt->encode($userId));
			$encrypted_role 	= urlencode($encrypt->encode('Chemist'));
			Request::current()->redirect('cintermediateregistrationform/acknowledge?u='.$encrypted_userid.'&r='.$encrypted_role);
		}else{
			
		}
	}
}
