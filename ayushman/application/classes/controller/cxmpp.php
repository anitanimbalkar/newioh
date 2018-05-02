<?php defined('SYSPATH') or die('No direct script access.');
include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/xmpp.php');
class Controller_Cxmpp extends Controller {
	public function action_addalluser()
	{
		$objusers = ORM::factory('user')
 					->find_all()
 					->as_array();
 		if($objusers != NULL)				
		{
			foreach($objusers as $user)
			{	
				if($user->xmpppassword_c != NULL)
				{
					$op = xmpp::register($user->id,$user->xmpppassword_c,$user->email);
					
					if($op != "true")
					{
						throw new Exception("Error while adding user on XMPP server");
					}
					else
					{
						echo "user id ".$user->id." got added on xmpp server<br/>";
						
					}
				}
				else
				{
					echo "xmpp password is not set for user id".$user->id;
				}
			}	
		}
		else
		{
			throw new Exception("No record in users table");
		}	
	}
	
	public function action_addfavoritedoctorbypatient()
	{
		$arr_xmpp =Kohana::$config->load('xmpp');
		$objPatients = ORM::factory('patient')
 						->findAll()
 						->as_array();
 		foreach($objPatients as $patient)
		{				
			$objFavoriteDoctorsDetail = ORM::factory('favoritedoctorsbypatientdetails')
										->where('patientid','=',$patient->id)
 										->find_all()
 										->as_array();
 										
 			if($objFavoriteDoctorsDetail != NULL)
			{	
				foreach($objFavoriteDoctorsDetail as $objFavoriteDoctorDetail)
				{
					$objUser = ORM::factory('user')
								->where('id','=',$patient->repatientsuserid_c)
								->find();
					var_dump($objFavoriteDoctorDetail->doctoruserid.'@'.$arr_xmpp['servername'].','.$objFavoriteDoctorDetail->doctoruserid.'@'.$arr_xmpp['servername'].','.$objUser->id.'@'.$arr_xmpp['servername'].','.$objUser->xmpppassword_c);
					var_dump("");
					$var = xmpp::addRosterContact($objFavoriteDoctorDetail->doctoruserid.'@'.$arr_xmpp['servername'],$objFavoriteDoctorDetail->doctoruserid.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
					if($var != 'success')//error while adding in xmpp contact list 
					{
						throw new Exception($var["ERROR"]);
					}
					else //successfully added in xmpp contat 
					{
						var_dump('success');
					}
				}
			}
			else
			{
				echo("<br/>");
				echo("No record in favoritedoctorsbypatientdetails table for patient id".$patient->id);
			}
		}	
	}
	
	public function action_favoritechemistbypatients()
	{
		$arr_xmpp =Kohana::$config->load('xmpp');
		$objPatients = ORM::factory('patient')
 						->findAll()
 						->as_array();
 		
 		foreach($objPatients as $patient)
		{				
			$objFavoriteChemistsDetail = ORM::factory('favoritechemistbypatientdetail')
										->where('roleid','=',$patient->id)
 										->find_all()
 										->as_array();
 									
 			if($objFavoriteChemistsDetail != NULL)
			{	
				
				foreach($objFavoriteChemistsDetail as $objFavoriteChemistDetail)
				{
					$objUser = ORM::factory('user')
								->where('id','=',$patient->repatientsuserid_c)
								->find();
					var_dump($objFavoriteChemistDetail->chemistuserid.'@'.$arr_xmpp['servername'].','.$objFavoriteChemistDetail->chemistuserid.'@'.$arr_xmpp['servername'].','.$objUser->id.'@'.$arr_xmpp['servername'].','.$objUser->xmpppassword_c);
					var_dump("");
					$var = xmpp::addRosterContact($objFavoriteChemistDetail->chemistuserid.'@'.$arr_xmpp['servername'],$objFavoriteChemistDetail->chemistuserid.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
					if($var != 'success')//error while adding in xmpp contact list 
					{
						throw new Exception($var["ERROR"]);
					}
					else //successfully added in xmpp contat 
					{
						var_dump('success');
					}
				}
			}
			else
			{
				echo("<br/>");
				echo("No record in favoritedoctorsbypatientdetails table for patient id".$patient->id);
			}
		}	
	}
	
	
	public function action_favoritepathologistbypatients()
	{
		$arr_xmpp =Kohana::$config->load('xmpp');
		$objPatients = ORM::factory('patient')
 						->findAll()
 						->as_array();
 		foreach($objPatients as $patient)
		{				
			$objFavoritepathologistsDetail = ORM::factory('favouritepathologistsbypatientdetails')
										->where('roleid','=',$patient->id)
 										->find_all()
 										->as_array();
 										
 			if($objFavoritepathologistsDetail != NULL)
			{	
				foreach($objFavoritepathologistsDetail as $objFavoritepathologistDetail)
				{
					$objUser = ORM::factory('user')
								->where('id','=',$patient->repatientsuserid_c)
								->find();
					var_dump($objFavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'].','.$objFavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'].','.$objUser->id.'@'.$arr_xmpp['servername'].','.$objUser->xmpppassword_c);
					var_dump("");
					$var = xmpp::addRosterContact($objFavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'],$objFavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
					if($var != 'success')//error while adding in xmpp contact list 
					{
						throw new Exception($var["ERROR"]);
					}
					else //successfully added in xmpp contat 
					{
						var_dump('success');
					}
				}
			}
			else
			{
				echo("<br/>");
				echo("No record in favoritedoctorsbypatientdetails table for patient id".$patient->id);
			}
		}	
	}
	
	
	public function action_favoritechemistbydoctors()
	{
		$arr_xmpp =Kohana::$config->load('xmpp');
		$objDoctors = ORM::factory('doctor')
 						->findAll()
 						->as_array();
 		foreach($objDoctors as $doctor)
		{				
			$objFavoritechemistsDetail = ORM::factory('favoritechemistbydoctordetail')
										->where('roleid','=',$doctor->id)
 										->find_all()
 										->as_array();
 										
 			if($objFavoritechemistsDetail != NULL)
			{	
				foreach($objFavoritechemistsDetail as $objFavoritechemistDetail)
				{
					$objUser = ORM::factory('user')
								->where('id','=',$doctor->refdoctorsid_c)
								->find();
					var_dump($objFavoritechemistDetail->chemistid.'@'.$arr_xmpp['servername'].','.$objFavoritechemistDetail->chemistid.'@'.$arr_xmpp['servername'].','.$objUser->id.'@'.$arr_xmpp['servername'].','.$objUser->xmpppassword_c);
					var_dump("");
					$var = xmpp::addRosterContact($objFavoritechemistDetail->chemistid.'@'.$arr_xmpp['servername'],$objFavoritechemistDetail->chemistid.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
					if($var != 'success')//error while adding in xmpp contact list 
					{
						throw new Exception($var["ERROR"]);
					}
					else //successfully added in xmpp contat 
					{
						var_dump('success');
					}
				}
			}
			else
			{
				echo("<br/>");
				echo("No record in favoritedoctorsbypatientdetails table for patient id".$doctor->id);
			}
		}	
	}
	
	public function action_favoritepathologistsbydoctors()
	{
		$arr_xmpp =Kohana::$config->load('xmpp');
		$objDoctors = ORM::factory('doctor')
 						->findAll()
 						->as_array();
 		foreach($objDoctors as $doctor)
		{				
			$objFavoritepathologistsDetails = ORM::factory('favouritepathologistsbydoctordetails')
										->where('roleid','=',$doctor->id)
 										->find_all()
 										->as_array();
 										
 			if($objFavoritepathologistsDetails != NULL)
			{	
				foreach($objFavoritepathologistsDetails as $FavoritepathologistDetail)
				{
					$objUser = ORM::factory('user')
								->where('id','=',$doctor->refdoctorsid_c)
								->find();
					var_dump($FavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'].','.$FavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'].','.$objUser->id.'@'.$arr_xmpp['servername'].','.$objUser->xmpppassword_c);
					var_dump("");
					$var = xmpp::addRosterContact($FavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'],$FavoritepathologistDetail->pathologistid.'@'.$arr_xmpp['servername'],$objUser->id.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
					if($var != 'success')//error while adding in xmpp contact list 
					{
						throw new Exception($var["ERROR"]);
					}
					else //successfully added in xmpp contat 
					{
						var_dump('success');
					}
				}
			}
			else
			{
				echo("<br/>");
				echo("No record in favoritedoctorsbypatientdetails table for patient id".$doctor->id);
			}
		}	
	}
	
}
