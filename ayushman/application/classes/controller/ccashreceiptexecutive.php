<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Ccashreceiptexecutive extends Controller_Ctemplatewithmenu {
	public function action_view()
	{
		$searchstat = 'Open';
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Open][csruserid,=,'.$id.']';
		$this->display($whereclause,$id,$searchstat);				
	}
	
	public function action_searchopen(){
		$searchstat = 'Open';
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Open][csruserid,=,'.$id.']';
		if($_POST){
			$from = null;
			$to = null;
				if($_POST['from'] != ''){	
						$fromdt = date_create($_POST['from']);
						$from = date_format($fromdt,"Y-m-d");
						
					}
				if($_POST['to'] != ''){
						$todt = date_create($_POST['to']);
						$to = date_format($todt,"Y-m-d");							
					}		
			$rcptno = $_POST['rcptno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
			
				if($from != '' && $to != ''){
							
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][csruserid,=,'.$id.'][status,=,Open]';											
					}
				if($rcptno != ''){
						$rcptno = '%'.$rcptno.'%';
							$whereclause 	= '[rcptno,like,'.$rcptno.'][status,=,Open][csruserid,=,'.$id.']';											
					}
				if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][payername,like,'.$name.'][status,=,Open][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][payername,like,'.$name.'][status,=,Open][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[payername,like,'.$name.'][status,=,Open][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
						if($type == 'Consumer'){
							$whereclause 	= '[type,=,'.$type.'][status,=,Open][csruserid,=,'.$id.']';	
						}else{
							$whereclause 	= '[type,!=,Consumer][status,=,Open][csruserid,=,'.$id.']';	
						}							
				}					
					$this->display($whereclause,$id,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($whereclause,$id,$searchstat);
			}
	}
	public function action_searchrejected(){
		$searchstat = 'Rejected';
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Rejected][csruserid,=,'.$id.']';
		if($_POST){
			$from = null;
			$to = null;
				if($_POST['from'] != ''){	
						$fromdt = date_create($_POST['from']);
						$from = date_format($fromdt,"Y-m-d");
					}
				if($_POST['to'] != ''){
						$todt = date_create($_POST['to']);
						$to = date_format($todt,"Y-m-d");	
					}	
			$rcptno = $_POST['rcptno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][csruserid,=,'.$id.'][status,=,Rejected]';											
					}
				if($rcptno != ''){	
					$rcptno = '%'.$rcptno.'%';
						$whereclause 	= '[rcptno,like,'.$rcptno.'][status,=,Rejected][csruserid,=,'.$id.']';											
					}
				if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][payername,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][payername,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[payername,like,'.$name.'][status,=,Rejected][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
						if($type == 'Consumer'){
							$whereclause 	= '[type,=,'.$type.'][status,=,Rejected][csruserid,=,'.$id.']';	
						}else{
							$whereclause 	= '[type,!=,Consumer][status,=,Rejected][csruserid,=,'.$id.']';	
						}										
				}
					$this->display($whereclause,$id,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($whereclause,$id,$searchstat);
			}
	}
	public function action_searchapproved(){
		$searchstat = 'Approved';
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Approved][csruserid,=,'.$id.']';
		if($_POST){
			$from = null;
			$to = null;
				if($_POST['from'] != ''){	
					$fromdt = date_create($_POST['from']);
					$from = date_format($fromdt,"Y-m-d");
				}
				if($_POST['to'] != ''){
					$todt = date_create($_POST['to']);
					$to = date_format($todt,"Y-m-d");	
				}
			$rcptno = $_POST['rcptno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][csruserid,=,'.$id.'][status,=,Approved]';											
					}
					if($rcptno != ''){	
						$rcptno = '%'.$rcptno.'%';
						$whereclause 	= '[rcptno,like,'.$rcptno.'][status,=,Approved][csruserid,=,'.$id.']';											
					}
				if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][payername,like,'.$name.'][status,=,Approved][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][payername,like,'.$name.'][status,=,Approved][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[payername,like,'.$name.'][status,=,Approved][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
						if($type == 'Consumer'){
							$whereclause 	= '[type,=,'.$type.'][status,=,Approved][csruserid,=,'.$id.']';	
						}else{
							$whereclause 	= '[type,!=,Consumer][status,=,Approved][csruserid,=,'.$id.']';	
						}									
				}
					$this->display($whereclause,$id,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($whereclause,$id,$searchstat);
			}
	}
	public function action_searchclaim(){
		$searchstat = 'Claimed';
		$errors = array();
		$messages = array();
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		$whereclause = '[status,=,Claimed][csruserid,=,'.$id.']';
		if($_POST){
				$from = null;
			$to = null;
				if($_POST['from'] != ''){	
						$fromdt = date_create($_POST['from']);
						$from = date_format($fromdt,"Y-m-d");
					}
				if($_POST['to'] != ''){
						$todt = date_create($_POST['to']);
						$to = date_format($todt,"Y-m-d");	
					}	
			$rcptno = $_POST['rcptno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][csruserid,=,'.$id.'][status,=,Claimed]';											
					}
					if($rcptno != ''){
						$rcptno = '%'.$rcptno.'%';
						$whereclause 	= '[rcptno,like,'.$rcptno.'][status,=,Claimed][csruserid,=,'.$id.']';											
					}
				if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][payername,like,'.$name.'][status,=,Claimed][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][payername,like,'.$name.'][status,=,Claimed][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[payername,like,'.$name.'][status,=,Claimed][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
					if($type == 'Consumer'){
							$whereclause 	= '[type,=,'.$type.'][status,=,Claimed][csruserid,=,'.$id.']';	
						}else{
							$whereclause 	= '[type,!=,Consumer][status,=,Claimed][csruserid,=,'.$id.']';	
						}										
				}
					$this->display($whereclause,$id,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
			$this->display($whereclause,$id,$searchstat);
			}
	}
	public function action_searchrefund(){
		$searchstat = 'Refunded';
		$errors = array();
		$messages = array();
		$whereclause = '[status,=,Refunded]';
		$obj_user = Auth::instance()->get_user();
		$id = $obj_user->id;
		if($_POST){
			$from = null;
			$to = null;
				if($_POST['from'] != ''){	
						$fromdt = date_create($_POST['from']);
						$from = date_format($fromdt,"Y-m-d");
					}
				if($_POST['to'] != ''){
						$todt = date_create($_POST['to']);
						$to = date_format($todt,"Y-m-d");	
					}	
			$rcptno = $_POST['rcptno'];
			$name = $_POST['Name'];
			$type = $_POST['userselect'];
				if($from != '' && $to != ''){						
						$whereclause 	= '[sortdate,<=,'.$to.'][sortdate,>=,'.$from.'][csruserid,=,'.$id.'][status,=,Refunded]';											
					}
					if($rcptno != ''){
						$rcptno = '%'.$rcptno.'%';
						$whereclause 	= '[rcptno,like,'.$rcptno.'][status,=,Refunded][csruserid,=,'.$id.']';											
					}
				if($type != 'select' && $name != ''){
					$name = '%'.$name.'%';
							if($type == 'Consumer'){
								$whereclause 	= '[type,=,'.$type.'][payername,like,'.$name.'][status,=,Refunded][csruserid,=,'.$id.']';	
							}else{
								$whereclause 	= '[type,!=,Consumer][payername,like,'.$name.'][status,=,Refunded][csruserid,=,'.$id.']';	
							}							
				}else if($name != ''){
						$name = '%'.$name.'%';
							$whereclause 	= '[payername,like,'.$name.'][status,=,Refunded][csruserid,=,'.$id.']';											
				}else if($type != 'select'){
						if($type == 'Consumer'){
							$whereclause 	= '[type,=,'.$type.'][status,=,Refunded][csruserid,=,'.$id.']';	
						}else{
							$whereclause 	= '[type,!=,Consumer][status,=,Refunded][csruserid,=,'.$id.']';	
						}									
				}
					$this->display($whereclause,$id,$searchstat);	
		}else{
			$errors['error'] = 'Could not search your query';
		}
		$this->display($whereclause,$id,$searchstat);	
	}
	private function display($whereclause,$id,$searchstat){
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vcashreceiptexecutivedasboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('whereclause',$whereclause);
			$content->bind('id',$id);
			$content->bind('searchstat', $searchstat);
			$content->bind('username', $username);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;
	
	}		
	public function action_refundreceipt()
	{	
			$objAccounts=ORM::factory('ayushreceipt')->where('rcptno_c','=',$_GET['receid'])->find();
				$recstatus = $objAccounts->status_c; 						
					if($recstatus == 'Approved'){
						$rechargeamount = $_GET['amountbyreceipt'];
							//$patient_id = $objAccounts->refuserid_c;			
							//$object_patient = ORM::factory('user')->where('id','=',$patient_id)->find();
							//$user_account_object = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $object_patient->id)->find();
							//$arr_accounts = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
						//	$result = transaction::transfer($user_account_object->accountcode_c,ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c,6,$rechargeamount,20);
						$objAccounts->reasonforrefund_c = $_GET['refundres'];
						$objAccounts->status_c 	= 'refund';
						$objAccounts->dateofrefund_c = date("d M Y");
						$objAccounts->update();
						
						$data['type'] ="success";
						die(json_encode($data));
					}
						
						
			$data = array();
			$data['message'] = 'success';
			die(json_encode($data));
	}
} // End Welcome