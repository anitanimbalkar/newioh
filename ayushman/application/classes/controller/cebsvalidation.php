<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cebsvalidation extends Controller_Ctemplatewithoutmenu  {
	public function action_proceed()
	{		
		try {
			$content = View::factory('vuser/vpayment/vsecureebs');
			$validationdata = json_decode($_GET['validationdata']); 
			$amount = $validationdata->amount;
			//$secure_hash = $validationdata->secure_hash;
			$description = $validationdata->description;
			$reference_no = $validationdata->reference_no;
			$payment_option = $validationdata->payment_option;
			$display_currency = $validationdata->display_currency;
			
			$objUser	= Auth::instance()->get_user();
			
			$objAddHome = ORM::factory('address')
							->where('id','=',$objUser->refaddresshome1_c)
							->find();
			
			$validationdata = json_encode($validationdata); 
			$objCountries  = ORM::factory('countrymaster')->find_all()->as_array();
			$allCountries;$count=0;
			foreach($objCountries as $objCountry)
			{
				$allCountries[$count]['isd']=$objCountry->mobileisd_c;
				$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
				$allCountries[$count]['country_c']=$objCountry->country_c;
				$count++;
			}
			$content->bind('objcountries', $allCountries);
			$content->bind('user', $objUser);
			$content->bind('objaddhome', $objAddHome);
			$content->bind('errors', $errors);
			$content->bind('messages', $messages);
			
			$content->bind('amount',$amount);
			$content->bind('secure_hash',$secure_hash);
			$content->bind('description',$description);
			$content->bind('reference_no',$reference_no);
			$content->bind('payment_option',$payment_option);
			$content->bind('display_currency',$display_currency);
			$content->bind('validationdata',$validationdata);
			
			
			$breadcrumb = "Home >>";
			$this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
		} catch (Exception $e) {
			$data = array();
			$data['type'] ="error";
			$data['message'] = 'Exception Message: '.$e->getMessage().'<br/><br/> Please report this as a bug.';
			die(json_encode($data));
		}
	}
	public function action_savevaliddata(){
			
			$objAddressHome = new Model_Address();
			$objAddressHome ->line1_c		= $_POST["addhline1"];
			$objAddressHome ->nearlandmark_c 	= $_POST["addhlandmark"];
			$objAddressHome ->location_c 		= $_POST["addhloc"];
			$objAddressHome ->city_c 		= $_POST["addhcity"];
			$objAddressHome ->state_c 		= $_POST["addhstate"];
			$objAddressHome ->pin_c 		= $_POST["addhpin"];
			$objAddressHome ->country_c 		= $_POST["addhcountry"];
			$objUser = Auth::instance()->get_user();
			try
			{
				$objAddressHome ->saveRecord();
				$objUser ->refaddresshome1_c = $objAddressHome->id;
			}
			catch(Exception $f)
			{
				throw new Exception ($f);
			}
			$objUser->isdmobileno1_c = $_POST['isdmobileno1_c'];
			$objUser->mobileno1_c = $_POST['mobileno1_c'];
			$objUser->email = $_POST['emailId'];
			$objUser ->save();
			$request = 'cebsvalidation/proceed?validationdata='.$_GET['validationdata'];
			Request::current()->redirect($request);
	}

}
