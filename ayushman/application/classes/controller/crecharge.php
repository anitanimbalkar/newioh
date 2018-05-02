<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Crecharge extends Controller_Ctemplatewithmenu  {

	public function action_view()
	{
		$content = View::factory('vuser/vpayment/vrecharge');
		$this->template->content = $content;
	}
	public function action_search()
	{
		Request::current()->redirect('crecharge/view');
	}
	public function action_displayinsufficientbalance(){
		$curbalance = $_GET['curbalance'];
		$reqbalance = $_GET['reqbalance'];
		$messages = array();
		$errors = array();
		
			
		$content = View::factory('vuser/vpayment/vaskforrecharge');
		$arr_ebs = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/ebs.php');
	//	$content 	= View::factory('vuser/vpatient/vrecharge');
		$message	= '';
		if(isset($_GET['balance']))
			$message = 'You have insufficient balance in your account. Recharge your account and try again.';
		else
			$message = '';
		$content->bind('message',$message);

		$obj_user 		= Auth::instance()->get_user();
		$objAdr			= ORM::factory('address')->where('id','=',$obj_user->refaddresshome1_c)->find();
		$objBillingAccounts = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$obj_user->id)->find();
		$userAccountCode = $objBillingAccounts->accountcode_c;
		$content->bind('accountcode_c',$userAccountCode);
		$accountid 			= $arr_ebs['ebsaccountid'];
		$content->bind('account_id',$accountid);
		$returnurl 			= $arr_ebs['ebsreturnurl'];
		$content->bind('return_url',$returnurl);
		$mode				= $arr_ebs['ebsmode'];
		$content->bind('mode',$mode);
		$billingname		=  $obj_user->Firstname_c.' '.$obj_user->lastname_c;
		$content->bind('name',$billingname);
		$billingaddr		=  $objAdr->line1_c." ".$objAdr->nearlandmark_c.' '.$objAdr->location_c;
		$content->bind('address',$billingaddr);
		$billingcity		=  $objAdr->city_c;
		$content->bind('city',$billingcity);	
		$billingstate		=  $objAdr->state_c;
		$content->bind('state',$billingstate);	
		$billingzip			=  $objAdr->pin_c;
		$content->bind('postal_code',$billingzip);
		$billingcountry		=  $objAdr->country_c;
		$billingcountry		=  'IND';
		$content->bind('country',$billingcountry);
		$billingemail		=  $obj_user->email;
		$content->bind('email',$billingemail);
		$billingtelephone	=  $obj_user->mobileno1_c;
		$content->bind('phone',$billingtelephone);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('reqbalance',$reqbalance);
		$content->bind('curbalance',$curbalance);
		$this->template->content = $content;
		
		$session = Session::instance();
		$proceedlink = $session->get('followlink');
		$cancellink = $session->get('cancellink');
		$proceedlink = '/ayushman/'.$proceedlink;
		if($cancellink == null || $cancellink == ''){
			$cancellink = $proceedlink;
		}else{
			$cancellink = '/ayushman/'.$cancellink;
			$session->set('cancellink', '');
		}
				
		$content->bind('proceedlink', $proceedlink);
		$content->bind('cancellink', $cancellink);
	}
}
