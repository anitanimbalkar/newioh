<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Cnewreceipt extends Controller_Ctemplatewithmenu {
public function action_view()
	{
		$this->display();				
	}
	private function display(){
			$datafname = [0];
			$datamobilenumb = [0];
			$dataiohi = [0];
			$dataspuseradd = [0];
			
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vnewreceiptdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$content->bind('username', $username);
			$content->bind('datafname', $datafname);
			$content->bind('datamobilenumb', $datamobilenumb);
			$content->bind('dataiohi', $dataiohi);
			$content->bind('dataspuseradd', $dataspuseradd);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
	public function action_getuserdetails()
	{
			if($_GET['IOHid'] != ''){
					$objAccounts 	= ORM::factory('allserviceprovider')->where('spuserid','=',$_GET['IOHid'])->find();
					$data = array();
					$data['type'] = "done";
					$data['fname'] = $objAccounts->spnameofcenter;
					$data['mobilenumb'] = $objAccounts->mobileno;
					//$data['emailid'] = $objAccounts->email;
					$data['iohi'] = $objAccounts->spuserid;
					$data['address'] = $objAccounts ->spaddress;
				}
				if($_GET['firstname'] != ''){
					$objAccounts 	= ORM::factory('allserviceprovider')->where('spnameofcenter','=',$_GET['firstname'])->find();
					$data = array();
					$data['type'] = "done";
					$data['fname'] = $objAccounts ->spnameofcenter;
					$data['mobilenumb'] = $objAccounts ->mobileno;
					//$data['emailid'] = $objAccounts ->email;
					$data['iohi'] = $objAccounts->spuserid;
					$data['address'] = $objAccounts ->spaddress;					
				}
				if($_GET['mobilenum'] != '' && $_GET['firstname'] == ''){
					$objAccounts 	= ORM::factory('allserviceprovider')->where('mobileno','=',$_GET['mobilenum'])->find();
					$data['type'] = "done";
					$data['fname'] = $objAccounts ->spnameofcenter;
					$data['mobilenumb'] = $objAccounts ->mobileno;
					//$data['emailid'] = $objAccounts ->email;
					$data['iohi'] = $objAccounts->spuserid;
					$data['address'] = $objAccounts ->spaddress;
				}
				if($_GET['mobilenum'] != '' && $_GET['firstname'] != ''){
					$objAccounts 	= ORM::factory('allserviceprovider')->where('mobileno','=',$_GET['mobilenum'])->where('spnameofcenter','=',$_GET['firstname'])->find();
					$data['type'] = "done";
					$data['fname'] = $objAccounts ->spnameofcenter;
					$data['mobilenumb'] = $objAccounts ->mobileno;
					//$data['emailid'] = $objAccounts ->email;
					$data['iohi'] = $objAccounts->spuserid;
					$data['address'] = $objAccounts ->spaddress;
				}
			die(json_encode($data));
	}
	
public function action_displayview(){
			$datafname = [0];
			$datamobilenumb = [0];
			$dataiohi = [0];
			$dataspuseradd = [0];
			$i = 0 ;
			$mayname = 'ravi';
			$mayname = '%'.$mayname.'%';
			$objAccounts = ORM::factory('allserviceprovider')->where('spnameofcenter','like',$mayname)->find_all();
				foreach ( $objAccounts as $objsp)
						{
									$datafname[$i] = $objsp ->spnameofcenter;
									$datamobilenumb[$i] = $objsp ->mobileno;
									//$dataemailid[$i] = $objsp ->email;
									$dataiohi[$i] = $objsp ->spuserid;
									$dataspuseradd[$i] = $objsp->spaddress;
									$i++;											
						}		
		
		
			$obj_user = Auth::instance()->get_user();
			$content = View::factory('vuser/vadmin/vnewreceiptdashboard');
			$content->bind('obj_user', $obj_user);
			$username = $obj_user->Firstname_c;
			$content->bind('username', $username);
			$content->bind('datafname', $datafname);
			$content->bind('datamobilenumb', $datamobilenumb);
			$content->bind('dataiohi', $dataiohi);
			$content->bind('dataspuseradd', $dataspuseradd);
			$urole = "data_manager";
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			$this->template->urole = $urole;	
	}
public function action_getreceiptdetailssp()
	{
			$datafname = [0];
			$datamobilenumb = [0];
			$dataiohi = [0];
			$dataspuseradd = [0];
			$i = 0 ;
			$mayname = $_GET['firstname'];
			$mayname = '%'.$mayname.'%';
			$objAccounts = ORM::factory('allserviceprovider')->where('spnameofcenter','like',$mayname)->find_all();
				foreach ( $objAccounts as $objsp)
						{
									$datafname[$i] = $objsp ->spnameofcenter;
									$datamobilenumb[$i] = $objsp ->mobileno;
									//$dataemailid[$i] = $objsp ->email;
									$dataiohi[$i] = $objsp ->spuserid;
									$dataspuseradd[$i] = $objsp->spaddress;
									$i++;
											var_dump($datafname);
						}	
							
			$this->display($datafname,$datamobilenumb,$dataiohi,$dataspuseradd);
			
	}	
	
}