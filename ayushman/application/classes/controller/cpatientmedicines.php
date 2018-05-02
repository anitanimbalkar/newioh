<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientmedicines extends Controller_Ctemplatewithmenu {
	
		
private function getpathologists($pathologistid,$testid)
	{
		try
		{
			$objUser = Auth::instance()->get_user();
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->mustFind();
			$objfavoritepathologistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
			$pathologists = array();
			$count = -1;
			foreach($objfavoritepathologistbypatient as $favoritepathologistpathologist)
			{
				$count=$count + 1;
				$pathologists[$count]  = array();
				$pathologists[$count]["centerid"] = $favoritepathologistpathologist->reffavchembypatchemistsid_c; 	
				$objpathologist = ORM::factory('chemist')->where('id','=',$favoritepathologistpathologist->reffavchembypatchemistsid_c)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
			}
			$ispresent= 0;
			$i = 0;
			$pathologistsfromfav= $pathologists;
			$valuepresent = $this->checkvaluepresent($pathologists,'centerid',$pathologistid);
			if (($valuepresent == false )&&($pathologistid != null)) 
			{
				$count=$count + 1;
				$pathologists[$count]  = array();
				$pathologists[$count]["centerid"] = $pathologistid; 	
				$objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
				$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
			}
			$count =count($pathologists); 
			if(($count == 0) && ($pathologistid !=NULL ))
			{
				
					$count=$count + 1;
					$pathologists[$count]  = array();
					$pathologists[$count]["centerid"] = $pathologistid; 	
					$objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
					$pathologists[$count]["centername"] = $objpathologist->nameofmedical_c; 
			}
			return $pathologists;
		}
		catch(Exception $e)
		{
			throw new Exception($e);
		}
	}
	
	private function checkvaluepresent($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
	}

	public function action_view()
	{
		$content = View::factory('vuser/vpatient/vpatientmedicines');
		$user = Auth::instance()->get_user();
		if (!$user)
			Request::current()->redirect('cuser/login');
		else
			if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
				$urole = "doctor";
			else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
				$urole = "patient";	
		$userid = $user->id;
		// $result = $this->viewmycart();

			$objCart = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();

			$objselectedtests = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
				// var_dump($objCart->orderrequestdate_c);die;

			$tests = array();
							// $testreqdate = $objselectedtests->orderrequestdate_c;

			$i = 0;
			foreach($objselectedtests as $test)
			{
				$tests[$i] = array();
				$testmasters = ORM::factory('alldrug')->where('id','=',$test->itemid_c)->find();
				$tests[$i]["id"] = $testmasters->id;
				$tests[$i]["cartid"]= $test->id;
				$tests[$i]["qty"]= $test->qty_c;
				$tests[$i]["testname"] = $testmasters->drugname;
				$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
				$objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
				$pathologistid = $test->refprovideruserid_c;
				$tests[$i]["pathologistid"]= $objpathologist->id;
				$tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);

				//$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
				$i = $i + 1;
			}
			$objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->find();
			$objfavoritepathologistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
			$arr_favoritepathologist = array();
			foreach($objfavoritepathologistbypatient as $objfavoritepathologist)
			{	

				if(! empty($objfavoritepathologist->reffavchembypatchemistsid_c))
					array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavchembypatchemistsid_c)));
									//var_dump($arr_favoritepathologist);

			}
			
			$referer = $_SERVER['HTTP_REFERER'];
			
			if(!strpos($referer,'cpatientmedicines')){
				$referer = "/ayushman/cpatientmedicines/view";
			}

        /*START: patient Prescription Medicines Order From Prescription  by Pooja Gujarathi*/
        $table = 'prescriptionmedicine';
        $columns = 'appointmentid,date,drname,medicinename,appointmentid';
        $whereclause = "[patientuserid,=,".$userid."][medicinename,!=,NULL]";
        $sord = 'DESC';
        $sortname = 'appointmentid';
        $object_patient_medicine_orderfromprescription_ = new Model_Xjqgridgetdata;
        $resultmedicineorderfromprescription = $object_patient_medicine_orderfromprescription_->exportdata('','',$sortname,$sord,$table,$columns,$whereclause,'');
        /*END:  patient patient Prescription Medicines Order From Prescription  by Pooja Gujarathi*/


		$number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
        $content->bind('resultmedicineorderfromprescription',$resultmedicineorderfromprescription); //Pooja Gujarathi
		$content->bind('userid', $userid);
		$content->bind('number',$number);
		$content->bind('tests',$tests);
		$content->bind('referer',$referer);

		$breadcrumb = "Home>>Medicines";
		$maximize = true;
		$this->template->breadcrumb = $breadcrumb;
		$this->template->content = $content;
		$this->template->user =  $user->Firstname_c;
		$this->template->urole = $urole;
	}

    public function action_viewMedicineOrderFromPrescription()
    {
       $status = 'order';
	   $content = View::factory('vuser/vpatient/vpatientmedicines');
        $user = Auth::instance()->get_user();
        if (!$user)
            Request::current()->redirect('cuser/login');
        else
            if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
                $urole = "doctor";
            else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
                $urole = "patient";
        $userid = $user->id;
        // $result = $this->viewmycart();

        $objCart = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();

        $objselectedtests = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
        // var_dump($objCart->orderrequestdate_c);die;

        $tests = array();
        // $testreqdate = $objselectedtests->orderrequestdate_c;

        $i = 0;
        foreach($objselectedtests as $test)
        {
            $tests[$i] = array();
            $testmasters = ORM::factory('alldrug')->where('id','=',$test->itemid_c)->find();
            $tests[$i]["id"] = $testmasters->id;
            $tests[$i]["cartid"]= $test->id;
            $tests[$i]["qty"]= $test->qty_c;
            $tests[$i]["testname"] = $testmasters->drugname;
            $tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
            $objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
            $pathologistid = $test->refprovideruserid_c;
            $tests[$i]["pathologistid"]= $objpathologist->id;
            $tests[$i]["pathologistList"]= $this->getpathologistsFootable($pathologistid,$testmasters->id);

            //$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
            $i = $i + 1;
        }
        $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->find();
        $objfavoritepathologistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
        $arr_favoritepathologist = array();
        foreach($objfavoritepathologistbypatient as $objfavoritepathologist)
        {

            if(! empty($objfavoritepathologist->reffavchembypatchemistsid_c))
                array_push($arr_favoritepathologist,trim(ucfirst($objfavoritepathologist->reffavchembypatchemistsid_c)));
            //var_dump($arr_favoritepathologist);

        }

        $referer = $_SERVER['HTTP_REFERER'];

        if(!strpos($referer,'cpatientmedicines')){
            $referer = "/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription";
        }

        /*START: patient Prescription Medicines Order From Prescription  by Pooja Gujarathi*/
        $table = 'prescriptionmedicine';
        $columns = 'appointmentid,date,drname,medicinename,appointmentid';
        $whereclause = "[patientuserid,=,".$userid."][medicinename,!=,NULL]";
        $sord = 'DESC';
        $sortname = 'appointmentid';
        $object_patient_medicine_orderfromprescription_ = new Model_Xjqgridgetdata;
        $resultmedicineorderfromprescription = $object_patient_medicine_orderfromprescription_->getfootablejsondata('','',$sortname,$sord,$table,$columns,$whereclause,'');
        /*END:  patient patient Prescription Medicines Order From Prescription  by Pooja Gujarathi*/

        $ts = (object)$tests;
        $tests_json = array();
        foreach ($ts as $ts1) {
            array_push($tests_json, $ts1);
        }
        $tests_json = json_encode($tests_json);

        $number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
        $content->bind('resultmedicineorderfromprescription',$resultmedicineorderfromprescription); //Pooja Gujarathi
        $content->bind('userid', $userid);
        $content->bind('number',$number);
		$content->bind('status',$status);
        $content->bind('tests',$tests);
        $content->bind('tests_json',$tests_json);
        $content->bind('referer',$referer);

        $breadcrumb = "Home>>Medicines";
        $maximize = true;
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content = $content;
        $this->template->user =  $user->Firstname_c;
        $this->template->urole = $urole;
    }

    private function getpathologistsFootable($appid, $testid)
    {
        try {
            $pathologists = $this->getpathologists($appid, $testid);
            $pathologists = (object)$pathologists;
            $patho = array();
            foreach ($pathologists as $pathologist) {
                array_push($patho, $pathologist);
            }
            $patho_encode = json_encode($patho);

            return $patho_encode;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

	public function action_retrunchemistuserids()
	{
		$chemist=array();
		$chemist = json_decode($_GET['ids']);
		$arr_chemistuserid=array();
		$count =count($chemist);
		for($i=0; $i< $count;$i++)
		{		
			$objchemist	=ORM::factory('chemist');
			$objchemist = $objchemist->where('id','=',$chemist[$i])->find();
			array_push($arr_chemistuserid, $objchemist->refchemistsuserid_c);
		}
		$arr_chemistuserid = array_unique($arr_chemistuserid);
		die(json_encode($arr_chemistuserid));
	}
}