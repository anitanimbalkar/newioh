<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/transaction.php');

class Controller_Ccashreceiptprint extends Controller_Ctemplatewithmenu  {	
	private function display(){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vreceiptprintdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$content->bind('receiptnoArray',$receiptnoArray);
			$content->bind('amountArray',$amountArray);
			$content->bind('buyerArray',$buyerArray);
			$content->bind('crenameArray',$crenameArray);
			$content->bind('paymodeArray',$paymodeArray);
			$content->bind('rctdateArray',$rctdateArray);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}
	public function action_receiptprint()
	{
		try
		{
			$objayush = ORM::factory('allreceipt')->where('rcptno','=',)->find();
					
		
			$this->display();				
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
}
?>