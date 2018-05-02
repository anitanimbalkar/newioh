<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpathologistregistrationform extends Controller_Cintermediateregistrationform {
	
	public function action_view()
	{
		$userId = $_GET['userid'];
		parent::view($userId, "Pathologist");
	}

	public function action_submit()
	{
		$userId=$_POST["userid"];
		$objPathologist = ORM::factory('pathologist')
						->where('refpathologistsuserid_c','=',$userId)
						->find();
		$objUser 		= ORM::factory('user')
						->where('id','=',$userId)
						->find();
		if(isset($_POST['sameDoctor']))
		{
			$_POST['qualifieddoctorfirtsname_c']	= $objUser->Firstname_c;
			$_POST['qualifieddoctormiddlename_c']	= $objUser->middlename_c;
			$_POST['qualifieddoctorlastname_c']		= $objUser->lastname_c;
			$_POST['qualifieddoctorisdmobilenumber_c']	= $objUser->isdmobileno1_c;
			$_POST['qualifieddoctormobilenumber_c']	= $objUser->mobileno1_c;
			$_POST['qualifieddoctoremailid_c']		= $objUser->email;
			$_POST['issameasuser_c']				= 1;
		}
		$_POST['refpathologistsuserid_c'] = $userId;
		$_POST['medicalactlicencevaliddate_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['medicalactlicencevaliddate_c'] ) );
		$_POST['fadlicencedatetill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['fadlicencedatetill_c'] ) );
		$_POST['qualifieddoctorlicencevalidtill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['qualifieddoctorlicencevalidtill_c'] ) );
		$objPathologist->saveRecord($_POST);
		
		$objAddress = new Model_Address;
		$objAddress->saveRecord($_POST);
		$intWorkAddId = $objAddress->id;
		
		$objUser->isdphonenowork_c=$_POST['isdphonework'];
		$objUser->phonenowork_c=$_POST['phonework'];
		$objUser->refaddresswork_c = $intWorkAddId;
		$objUser->activationstatus_c="activatepathologist";
		$objUser->save();
		
		$encrypt = Encrypt::instance('default');
		$encrypted_userid 	= urlencode($encrypt->encode($userId));
		$encrypted_role 	= urlencode($encrypt->encode('Pathologist'));
		Request::current()->redirect('cintermediateregistrationform/acknowledge?u='.$encrypted_userid.'&r='.$encrypted_role);
	}
}
