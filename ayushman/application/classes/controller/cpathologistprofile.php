<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpathologistprofile extends Controller_Ctemplatewithmenu {
	
	public function action_editprofile()
	{
		$errors = array();
		$messages = array();
		$this->displayPage($errors, $messages);
	}
	
	
	private function displayPage($errors, $messages)
	{
		$objUser = Auth::instance()->get_user();
		$content = View::factory('vuser/vpathologist/vpathologistprofile');
		$content->bind('objuser', $objUser);
		
		$objAddWork = ORM::factory('address')
						->where('id','=',$objUser->refaddresswork_c)
						->find();
		$objPathologist = new Model_Pathologist;
		$objPathologist->where('refpathologistsuserid_c','=',$objUser->id)->find();
		
		
		$objPathologisttypeoftestmaster = ORM::factory('pathologisttypeoftestmaster');
		$objPathologisttypeoftestmaster = $objPathologisttypeoftestmaster->find_all();
		$arrpathologisttypeoftestmaster = array();
		foreach($objPathologisttypeoftestmaster as $result)
		{
			if(! empty($result->master_c))
			$arrpathologisttypeoftestmaster[$result->id] = $result->master_c;
		}
		
		$objPathTypeOfTest = ORM::factory('pathologisttypeoftest');
		$objPathTypeOfTest = $objPathTypeOfTest->where('refpathologistid_c','=',$objPathologist->id)->find_all();
		$arrPathTypeOfTests = array();
		foreach($objPathTypeOfTest as $result)
		{
			$arrPathTypeOfTests[$result->refpathologisttypeoftestmastersid_c] = $result->refpathologisttypeoftestmastersid_c;
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
		
		$content->bind('arrpathologisttypeoftestmaster', $arrpathologisttypeoftestmaster);
		$content->bind('arrpathologisttypeoftest', $arrPathTypeOfTests);
		$content->bind('objuser', $objUser);
		$content->bind('pathologist', $objPathologist);
		$content->bind('address', $objAddWork);
		$content->bind('messages', $messages);
		$content->bind('errors', $errors);
		$content->bind('objcountries', $allCountries);
		
		$this->template->breadcrumb = "Home>>Edit Profile";
		$this->template->content = $content;
		$this->template->user = $objUser->Firstname_c;
		$this->template->urole = "pathologist";	
	}
	
	
	public function action_update()
	{
		try
		{
			//var_dump($_POST);die;
			$errors = array();
			$messages = array();
			$objUser = Auth::instance()->get_user();
			$objPathologist = ORM::factory('pathologist')
						->where('refpathologistsuserid_c','=',$objUser->id)
						->find();
			
			$objAddress = ORM::factory('address')->where('id','=',$objUser->refaddresswork_c)->mustFind();
			$objAddress->saveRecord($_POST);
			$intWorkAddId = $objAddress->id;
			
			$objUser->Firstname_c = $_POST['Firstname_c'];
			$objUser->middlename_c = $_POST['middlename_c'];
			$objUser->lastname_c = $_POST['lastname_c'];
			$objUser->phonenowork_c=$_POST['phonework'];
			$objUser->uid=$_POST['uid'];
			$objUser->refaddresswork_c = $intWorkAddId;
			$objUser->email=$_POST['email'];
			$objUser->mobileno1_c = $_POST['mobileno1_c'];
			
			$objUser->save();
			
			if(isset($_POST['sameDoctor']))
			{
				$_POST['qualifieddoctorfirtsname_c']		= $objUser->Firstname_c;
				$_POST['qualifieddoctormiddlename_c']		= $objUser->middlename_c;
				$_POST['qualifieddoctorlastname_c']			= $objUser->lastname_c;
				$_POST['qualifieddoctormobilenumber_c']		= $objUser->mobileno1_c;
				$_POST['qualifieddoctoremailid_c']			= $objUser->email;
				$_POST['issameasuser_c']					= 1;
			}
			else
			{
				$_POST['issameasuser_c']	= 0;
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
			$_POST['qualifieddoctorlicencevalidtill_c'] = date( 'y-m-d H:i:s', strtotime( $_POST['qualifieddoctorlicencevalidtill_c'] ) );
			$objPathologist->saveRecord($_POST);
			
			$objPathologistTypeOfTests	= ORM::factory('pathologisttypeoftest')
					 					->where('refpathologistid_c','=',$objPathologist->id)
										->find_all();
			foreach($objPathologistTypeOfTests as $r )
			{
				$r->delete();							
			}
			if(isset($_POST['arrTestTypes']))
			{
				$arrayidtestsmaster = $_POST['arrTestTypes'];
				foreach($arrayidtestsmaster as $res)
				{
					
					$objPathologistTypeOfTests = new Model_Pathologisttypeoftest;
					$objPathologistTypeOfTests->refpathologistid_c= $objPathologist->id;
					$objPathologistTypeOfTests->refpathologisttypeoftestmastersid_c = $res;
					$objPathologistTypeOfTests->save();
				}
			}
			$messages['success'] = "Profile Updated Successfully!";
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
		$this->displayPage($errors, $messages);
	}
} // End Welcome
