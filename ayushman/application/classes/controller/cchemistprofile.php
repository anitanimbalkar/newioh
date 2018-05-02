<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cchemistprofile extends Controller_Ctemplatewithmenu{
	
	public function action_edit()
	{
		$errors = array();
		$messages = array();
		$this->displayPage($errors, $messages);
	}
	
	private function displayPage($errors, $messages)
	{
		$objUser = Auth::instance()->get_user();
		
		$objAddWork = ORM::factory('address')
					->where('id','=',$objUser->refaddresswork_c)
					->find();
		$objChemist = new Model_Chemist;
		$objChemist->where('refchemistsuserid_c','=',$objUser->id)->find();
		
		$objChemisttypeofdispensesmaster = ORM::factory('chemisttypeofdispensesmaster')->find_all();
		$arrchemisttypeofdispensesmaster = array();
		foreach($objChemisttypeofdispensesmaster as $result)
		{
			$arrchemisttypeofdispensesmaster[$result->id] = $result->master_c;
		}
		
		$objChemisttypeofdispense = ORM::factory('chemisttypeofdispense');
		$objChemisttypeofdispense = $objChemisttypeofdispense->where('rechemistid_c','=',$objChemist->id)->find_all();
		$arrchemisttypeofdispense = array();
		foreach($objChemisttypeofdispense as $result)
		{
			$arrchemisttypeofdispense[$result->refchemisttypeofdispensesmasterid_c] = $result->refchemisttypeofdispensesmasterid_c;
		}
		
		$objCountries  = ORM::factory('countrymaster')
					->find_all()
					->as_array();
		$allCountries;$count=0;
		foreach($objCountries as $objCountry)
		{
			$allCountries[$count]['isd']=$objCountry->mobileisd_c;
			$allCountries[$count]['countrycode_c']=$objCountry->countrycode_c;
			$allCountries[$count]['country_c']=$objCountry->country_c;
			$count++;
		}
			
		$content = View::factory('vuser/vchemist/vchemistprofile');
		$content->bind('arrchemisttypeofdispense',$arrchemisttypeofdispense);
		$content->bind('arrchemisttypeofdispensesmaster', $arrchemisttypeofdispensesmaster);
		$content->bind('objuser', $objUser);
		$content->bind('chemist', $objChemist);
		$content->bind('address', $objAddWork);
		$content->bind('errors', $errors);
		$content->bind('messages', $messages);
		$content->bind('objcountries', $allCountries);
		
		$this->template->breadcrumb = "Home>>Edit Profile";
		$this->template->content = $content;
		$this->template->user = $objUser->Firstname_c;
		$this->template->urole = "chemist";
	}

	public function action_savedetails()
	{
		try
		{
			$errors = array();
			$messages = array();
			$objUser 	= Auth::instance()->get_user();
			$objChemist = ORM::factory('chemist')
						->where('refchemistsuserid_c','=',$objUser->id)
						->find();
			
			$objAddress = ORM::factory('address')->where('id', '=', $objUser->refaddresswork_c)->mustFind();
			$objCountry = orm::factory('countrymaster')->where('countrycode_c','=',$_POST["country_c"])->find();
			$_POST["country_c"]= $objCountry->country_c;
			$objAddress->saveRecord($_POST);
			$intworkaddid = $objAddress->id;
			
			$objUser->Firstname_c = $_POST['Firstname_c'];
			$objUser->middlename_c = $_POST['middlename_c'];
			$objUser->lastname_c = $_POST['lastname_c'];
			$objUser->phonenowork_c=$_POST['phonework'];
			$objUser->isdphonenowork_c=$_POST['isdphonenowork_c'];
			$objUser->uid=$_POST['uid'];
			$objUser->refaddresswork_c = $intworkaddid;
			$objUser->email=$_POST['email'];
			$objUser->mobileno1_c = $_POST['mobileno1_c'];
			$objUser->save();
			
			if(isset($_POST['samePharmacist']))
			{
				$_POST['pharmacistfirtsname_c']		= $objUser->Firstname_c;
				$_POST['pharmacistmiddlename_c']	= $objUser->middlename_c;
				$_POST['pharmacistlastname_c']		= $objUser->lastname_c;
				$_POST['pharmacistmobilenumber_c']	= $objUser->mobileno1_c;
				$_POST['pharmacistemailid_c']		= $objUser->email;
				$_POST['issameasuser_c']			= 1;
			}
			else
			{
				$_POST['issameasuser_c']			= 0;
			}
			if(!(array_key_exists('homedeliveryfacility_c', $_POST)))
			{
				$_POST['homedeliveryfacility_c'] = false;
				$_POST['areacoverforhomedelivery_c'] = "";
				$_POST['timetakeforhomedelivery_c'] = "";
			}
			$_POST['refchemistsuserid_c'] = $objUser->id;
			$_POST['medicalactlicencevaliddate_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['medicalactlicencevaliddate_c'] ) );
			$_POST['fadlicencedatetill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['fadlicencedatetill_c'] ) );
			$_POST['pharmacistlicencevalidtill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['pharmacistlicencevalidtill_c'] ) );
			$objChemist->saveRecord($_POST);
			
			$objChemisttypeofdispense	= ORM::factory('chemisttypeofdispense')
					 					->where('rechemistid_c','=',$objChemist->id)
										->find_all();
			foreach($objChemisttypeofdispense as $r )
			{
				$r->delete();							
			}
			if(isset($_POST['arrDrugTypes']))
			{
				$arrayiddispensesmaster = $_POST['arrDrugTypes'];
				foreach($arrayiddispensesmaster as $res)
				{
					
					$objChemisttypeofdispense = new Model_Chemisttypeofdispense;
					$objChemisttypeofdispense->rechemistid_c= $objChemist->id;
					$objChemisttypeofdispense->refchemisttypeofdispensesmasterid_c = $res;
					$objChemisttypeofdispense->save();
				}
			}
			$messages['success'] = "Profile Updated Successfully!";
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
		$this->displayPage($errors,$messages);
	}
	
}