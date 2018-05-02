<?php defined('SYSPATH') or die('No direct script access.');
class helper_Registration {

	public function create_user($record,$rolename){
		//print_r($record); exit;
		$arrPost['username']= $record[1];
		$arrPost['password']= $record[2];
		$arrPost['email']= $record[3];
		$arrPost['password_confirm'] = $record[2];
		$activationcode	=  md5(uniqid(rand(), true));
		//var_dump($arrPost);exit;
		$user = ORM::factory('user')->create_user($arrPost, array('username','password','email'));
		$user->add('roles', ORM::factory('role', array('name' => 'login')));
		$user->add('roles', ORM::factory('role', array('name' => $rolename)));
		$user->Firstname_c	= trim($record[1]);
		$user->lastname_c 	= trim($record[2]);
		$user->activationcode_c	= $activationcode;
		$user->activationstatus_c	= 'active';
		$user->accountcreatedby_c ="script";
		$user->xmpppassword_c = $user->password ;
		$user->save();
		
		$objAccounts=ORM::factory('billingaccount');
		$objAccounts = $objAccounts->where('refaccountuserid_c','=',$user->id)->find();
		if($objAccounts->id == '')
		{
			$objAccounts=ORM::factory('billingaccount');
			$objAccounts->accountcode_c 		= 'IOH'.$user->id.rand(10000,99999);
			$objAccounts->refaccountuserid_c 	= $user->id;
			$objAccounts->createddate_c 		= date('Y-m-d g:i:s a');
			$objAccounts->debitedamount_c 		= 0;
			$objAccounts->creditedamount_c 		= 0;
			$objAccounts->netbalance_c	 		= 0;
			$objAccounts->lastupdateddate_c		= date('Y-m-d g:i:s a');
			$objAccounts->lastupdatedby_c 		= $user->id;
			$objAccounts->save();
			$postfix = '';
			for($i=0;$i<(10-strlen($objAccounts->id));$i++)
			{
				$postfix = $postfix.'0';
			}
			$accountcode = 'IOH'.$postfix.$objAccounts->id;

			$objAccounts->accountcode_c			= $accountcode;	
			$objAccounts->update();
			
		}
		return $user->id;
  }
}
