<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Corders extends Controller_Ctemplatewithmenu {
	public function action_autoplaceorder()
        {
        	try
			{
				$users = ORM::factory('coepuser')->where('ordernumber','=','new')->find_all();
				foreach($users as $user)
				{
				
					$userid = $user->iohid;
					
					/*if( ORM::factory('orderedtest')->where('customeruserid_c','=',$userid)->find()->id != null){
						echo 'order for coep'.$user->username.' exists !!</br>';
						continue;
					}*/
					
					$objOrders = ORM::factory('Diagnosticlabsorder');
					$today = date('Y-m-d g:i:s a');
					$objOrders->orderdate_c = $today;
					$objOrders->status_c = 'requested';
					$objOrders->refdiaglabsorderspathologistsid_c = '40';
					$objOrders->updatestatusdate_c = $today;
					$objOrders->rate_c = '0';
					$objOrders->paid_c= 1;
					$objOrders->save();
					$orderid = $objOrders->id;//get order id 
					
					if($user->gender == 'Male'){
						//place record in orderedtest table
						$objordertest = ORM::factory('orderedtest');
						$objordertest->customeruserid_c = $userid;
						$objordertest->testid_c = '11729';
						$objordertest->diagnosticlabsorderid_c = $orderid;
						$objordertest->rate_c='0';
						$objordertest->save();
					}else if($user->gender == 'Female'){
						//place record in orderedtest table
						$objordertest = ORM::factory('orderedtest');
						$objordertest->customeruserid_c = $userid;
						$objordertest->testid_c = '11728';
						$objordertest->diagnosticlabsorderid_c = $orderid;
						$objordertest->rate_c='0';
						$objordertest->save();
					}
					$user->ordernumber = $orderid;
					$user->save();

					var_dump("sucess_order for user ".$userid."<br/>");
				}
				
			}
			catch(Exception $e)
			{
				throw new Exception($e);
			}
			die('done');
        }
}
