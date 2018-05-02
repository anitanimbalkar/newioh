<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientmedicinesorder extends Controller_Ctemplatewithmenu {
    public function action_addnewaddress()
    {
        $objuser = Auth::instance()->get_user();
        $userID = $objuser->id;
        $objUser = ORM::factory('user')->where('id','=',$userID)->find();

        $objAddressWork = new Model_Address();

        $objAddressWork ->line1_c			= $_POST["addwline1"];
        $objAddressWork ->nearlandmark_c 	= $_POST["addwlandmark"];
        $objAddressWork ->location_c 		= $_POST["addwloc"];
        $objAddressWork ->city_c 			= $_POST["addwcity"];
        $objAddressWork ->state_c 			= $_POST["addwstate"];
        $objAddressWork ->pin_c 			= $_POST["addwpin"];
        $objUser ->others_mobno 			= $_POST["mobilenumber"];
        $objCountry = orm::factory('countrymaster')->where('countrycode_c','=',$_POST["addwcountry"])->find();
        $objAddressWork ->country_c 		= $objCountry->country_c;
        $objAddressWork ->saveRecord();
        $objUser ->otheraddress_c		= $objAddressWork->id;
        $objUser ->save();
        $otheraddressid=$objAddressWork->id;
        die(json_encode($otheraddressid));

    }

    public function action_reassigntests()
    {
        try
        {
            $tests=json_decode($_GET['test']);
            $oldOrderId = $_GET['orderid'];
            $objUser = Auth::instance()->get_user();
            $userID = $objUser->id;

            $rate=0;$reordertests = array();$i=0;
            // new code
            $ordertests = array();
            $i= 0;
            $arr_cart = array();
            $j=0;
            //if "pathologistid"  change then save it cart.
            foreach($tests as $test)
            {
                $objOrderedtest = ORM::factory('medicineorderdetail')->where('reforderid_c', '=', $oldOrderId)->where('refdrugid_c', '=', $test[0])->find();
                //$objCart->refprovideruserid_c =$test[1];

                // $arr_cart[$j]['reqdate']=$objOrderedtest->requestdeliverydate_c;
                $arr_cart[$j]['qty']=$objOrderedtest->orderquantity_c;
                $arr_cart[$j]['pathid']=$test[2];
                $arr_cart[$j]['testid']=$test[0];
                $j++;

            }

            //end new code
            // foreach($tests as $test)
            // {
            // 	$objOrderedtest = ORM::factory('medicineorderdetail')->where('reforderid_c', '=', $oldOrderId)->where('refdrugid_c', '=', $test[0])->find();
            // 	$qty=$objOrderedtest->orderquantity_c;

            // }
            // $objOrderedtest = ORM::factory('medicineorderdetail')->where('reforderid_c', '=', $oldOrderId)->where('refdrugid_c', '=', $test[0])->find();


            $objDiagnosticlabsorder = ORM::factory('chemistmedicineorder')->where('id', '=', $oldOrderId)->find();
            $addressid=$objDiagnosticlabsorder->addressid_c;
            $orderrequestdate=$objDiagnosticlabsorder->requestdeliverydate_c;
            $objDiagnosticlabsorder->status_c = "reassign";

            $objOrders = ORM::factory('chemistmedicineorder');
            $today = date('Y-m-d g:i:s a');
            $objOrders->refpatientuserid_c = $userID;
            $objOrders->addressid_c = $addressid;
            $objOrders->orderdate_c = $today;
            $objOrders->status_c = 'requested';
            $objOrders->requestdeliverydate_c = $orderrequestdate;
            $objOrders->refchemistid_c = $test[2];
            $objOrders->updatestatusdate_c = $today;
            $objOrders->save();
            $orderid = $objOrders->id;//new get order id
            $precount = "not set";
            // $ratefororder=0;

            foreach($arr_cart as $testid)
            {
                $objordertest = ORM::factory('medicineorderdetail');
                //$objordertest->customeruserid_c = $userID;
                $objordertest->refdrugid_c = $testid['testid'];
                $objordertest->reforderid_c = $orderid;
                // $objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$test['pathid'])->find();
                $objordertest->orderquantity_c=$testid['qty'];
                $objordertest->save();

            }
            $objDiagnosticlabsorder->save();

            $objOrders->save();


            die();
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function action_getmedicinesusingorderid()
    {
        $orderid = $_GET['orderid'];
        $i = 0;
        $drugs = array();
        $obj_prescriptiondetails=ORM::factory('chemistmedicineorder')->where('id','=',$orderid)->find();

        $drugdetail = ORM::factory('medicineorderdetail')->where('reforderid_c','=',$orderid)->find_all();
        $drugs[$i] = array();
        foreach($drugdetail as $prescriptiondetail)
        {
            $drugmasters = ORM::factory('drugmaster')->where('id','=',$prescriptiondetail->refdrugid_c)->find();
            $drugs[$i]["id"] = $drugmasters->id;
            $drugs[$i]["drugname"] = $drugmasters->DrugName_c." - ";
            $drugs[$i]["qty"] = $prescriptiondetail->orderquantity_c;

            $i = $i + 1;
        }
        die(json_encode($drugs));
    }
    public function action_saveqty()
    {
        try{
            $testid=$_GET['testid'];
            $qty=$_GET['qty'];
            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;

            $objtest = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('itemid_c','=',$testid)->find();
            if($objtest->id != "")
            {
                $objtest->qty_c= $qty;
                $objtest->update();
                //var_dump($objtest->qty_c);

            }

            die();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_printmedicineorder()
    {
        $content = View::factory('vuser/vpatient/vprintmedicineorder');
        $this->template->content = $content;

    }

    public function action_removeorder()
    {
        try{
            //$array_accounts  = include($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
            $orderno=$_GET['orderno'];
            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            if($orderno != "")
            {

                $objtest = ORM::factory('chemistmedicineorder')->where('id','=',$orderno)->find();
                if($objtest->id != "")
                {

                    $objtest->status_c= 'cancelled';
                    $objtest->save();
                }
            }


            die();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_addnewpathologist()
    {
        try{
            $arr_pathologistId =json_decode($_GET['arr_pathologistId']);

            $objUser = Auth::instance()->get_user();
            $userid=$objUser->id;
            $objPatient = ORM::factory('patient')->where('repatientsuserid_c','=',$userid)->mustFind();
            $patientid=$objPatient->id;
            foreach($arr_pathologistId as $pathologistid)
            {
                $objpathologist = ORM::factory('chemist')->where('id','=',$pathologistid)->find();
                $pathologistuserid= $objpathologist->refchemistsuserid_c;
                //1st add into xmpp network
                $arr_xmpp =Kohana::$config->load('xmpp');
                $obj_user = Auth::instance()->get_user();
                $var = xmpp::addRosterContact($pathologistuserid.'@'.$arr_xmpp['servername'],$pathologistuserid.'@'.$arr_xmpp['servername'],$userid.'@'.$arr_xmpp['servername'],$objUser->xmpppassword_c);
                if($var != 'success')//error while adding in xmpp contact list
                {
                    throw new Exception($var["ERROR"]);
                }

                $objFavoritePathologistByPatients = ORM::factory('favoritechemistbypatient')///if "pathologist and patient pair" is  present
                ->where('reffavchembypatpatientid_c','=',$patientid)
                    ->where('reffavchembypatchemistsid_c','=',$pathologistid)
                    ->find()
                    ->as_array();
                if($objFavoritePathologistByPatients["id"] == null)//if "pathologist and patient pair" is not present then add.
                {
                    $objFavoritePathologistByPatients = ORM::factory('favoritechemistbypatient');
                    $objFavoritePathologistByPatients->reffavchembypatpatientid_c=$patientid;
                    $objFavoritePathologistByPatients->reffavchembypatchemistsid_c=$pathologistid;
                    $objFavoritePathologistByPatients->save();
                }
            }
            die();
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }

    }

    private function findcorrectposition($arr_cart,$testid,$pathid,$precount)
    {
        try{
            $count = 0;
            foreach ($arr_cart as $item)
            {
                if (($item['testid'] == $testid) && ($item['pathid'] == $pathid))
                {
                    if(($precount==0)or ($count != $precount))
                    {
                        return $count;
                        break;
                    }

                }
                else
                {
                    $count++;
                }
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }


    public function action_ordertest()
    {
        try
        {
            $arr_returntestsinfo = array();
            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            $radiobtn=$_GET['radiobtn'];
            $selectchem=$_GET['selectchem'];
            $addressid=$_GET['addressid'];
            $tests=json_decode($_GET['test']);
            $orderrequestdate=$_GET['testdate'];
            $testcharges = 0;
            foreach($tests as $test)
            {
                $objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find();
                if($objCart->id == null){

                    $arr_returntestsinfo['error'] = 'Access denied.';
                    die(json_encode($arr_returntestsinfo));
                }

            }

            $ordertests = array();
            $i= 0;
            $arr_cart = array();
            $j=0;
            //if "pathologistid"  change then save it cart.
            foreach($tests as $test)
            {
                $objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->find();
                //$objCart->refprovideruserid_c =$test[1];
                $objCart->save();

                $arr_cart[$j]['cartid']=$test[0];
                $arr_cart[$j]['reqdate']=$objCart->requestdeliverydate_c;
                $arr_cart[$j]['qty']=$objCart->qty_c;
                $arr_cart[$j]['pathid']=$selectchem;
                $arr_cart[$j]['testid']=$objCart->itemid_c;
                $j++;

            }

            //pace order in "chemistmedicineorder" table and "medicineorderdetail" table
            $arraycount=0;

            // foreach($ordertests as $test)
            // {
            $objOrders = ORM::factory('chemistmedicineorder');
            $today = date('Y-m-d g:i:s a');
            $objOrders->refpatientuserid_c = $userid;
            $objOrders->orderdate_c = $today;
            $objOrders->requestdeliverydate_c = $orderrequestdate;
            $objOrders->status_c = 'requested';
            $objOrders->refchemistid_c = $selectchem;
            $objOrders->updatestatusdate_c = $today;
            $objOrders->addressid_c = $addressid;
            $objOrders->save();
            $orderid = $objOrders->id;//get order id
            $reqdate = $objOrders->requestdeliverydate_c;//get order id
            //$testids = $test[0];
            $qty = $test[1];
            $precount = "not set";
            $ratefororder=0;
            foreach($arr_cart as $testid)
            {
                $objordertest = ORM::factory('medicineorderdetail');
                //$objordertest->customeruserid_c = $userid;
                $objordertest->refdrugid_c = $testid['testid'];
                $objordertest->reforderid_c = $orderid;
                //$objCatalog = ORM::factory('pathologistcatalog')->where('refpathcatalogtestid_c','=',$testid)->where('refpathcatalogpathologistsid_c','=',$test['pathid'])->find();
                $objordertest->orderquantity_c=$testid['qty'];
                $objordertest->save();

                $arr_returntestsinfo[$arraycount]['id']=$orderid ;
                $testmasters = ORM::factory('drug')->where('id','=',$testid['testid'])->find();
                $arr_returntestsinfo[$arraycount]['testname']=$testmasters->drugname;
                $objpathologist = ORM::factory('chemist')->where('id','=',$selectchem)->find();
                $arr_returntestsinfo[$arraycount]["centername"] = $objpathologist->nameofmedical_c;
                $arr_returntestsinfo[$arraycount]['reqdate']=$reqdate;
                $arr_returntestsinfo[$arraycount]['qty']=$testid['qty'];

                $arraycount++;
                $objordertest->save();
            }

            //change status requested in cart table.
            foreach($tests as $test)
            {
                $objCart = ORM::factory('medicinecart')->where('id', '=', $test[0])->find();
                $objCart->status_c='requested';
                $objCart->save();
            }

            die(json_encode($arr_returntestsinfo));
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }

    }
    public function action_setfollowuplink()
    {
        try
        {
            $currentlocation="";
            if($_GET["currentlocation"])
            {
                $currentlocation= $_GET["currentlocation"];
                $currentlocation = strstr($currentlocation, '/ayushman/');
                $currentlocation = str_replace('ayushman/', '', $currentlocation);
            }
            $session = Session::instance();
            $link= $currentlocation;
            $session->set('followlink', $link);
            die();
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }


    private function checkvaluepresentpostion($array, $key, $val) {
        $i=0;
        foreach ($array as $item)
        {
            if (isset($item[$key]) && $item[$key] == $val)
            {
                return $i;
            }
            else
            {
                $i++;
            }
        }

    }


    public function action_removetest()
    {
        try{
            $testid=$_GET['testid'];
            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            if($testid != "")
            {
                $objtest = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->where('itemid_c','=',$testid)->find();
                if($objtest->id != "")
                {
                    $objtest->status_c= 'remove';
                    $objtest->save();
                }
            }
            die();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

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
    public function action_viewmycart()
    {
        //var_dump($_SERVER['HTTP_REFERER']); die;
        try
        {
            // $array_taxes = Kohana::$config->load('taxes');

            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            $objRolesUser = ORM::factory('roleuser')
                ->where('user_id','=',$userid)
                ->mustFindAll()
                ->as_array();
            foreach($objRolesUser as $role)
            {
                $objRole = ORM::factory('role')
                    ->where('id','=',$role->role_id)
                    ->mustFind();
                switch($objRole->name)
                {
                    case 'Login' :break;
                    case 'patient': $urole= 'patient';
                        break;
                    default: throw new Exception ("Role not found");
                        break;
                }
            }

            // Home/office Address

            $objAddHome = ORM::factory('address')
                ->where('id','=',$objUser->refaddresshome1_c)
                ->find();

            $objAddWork = ORM::factory('address')
                ->where('id','=',$objUser->refaddresswork_c)
                ->find();

            // $objPatient	= ORM::factory('patient')
            // 				->where('repatientsuserid_c','=',$objUser->id)
            // 				->mustFind();

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

            $objCart = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->find_all();

            $objselectedtests = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$userid)->where('status_c','=','pending')->find_all();
            // var_dump($objCart->orderrequestdate_c);die;

            $tests = array();
            // $testreqdate = $objselectedtests->orderrequestdate_c;

            $i = 0;
            foreach($objselectedtests as $test)
            {
                $tests[$i] = array();
                $testmasters = ORM::factory('drugmaster')->where('id','=',$test->itemid_c)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["cartid"]= $test->id;
                $tests[$i]["qty"]= $test->qty_c;
                $tests[$i]["testname"] = $testmasters->DrugName_c;
                $tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
                $objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
                $pathologistid = $test->refprovideruserid_c;
                $tests[$i]["pathologistid"]= $objpathologist->id;
                $tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);

                //$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
                $i = $i + 1;
            }
            $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
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
            //$discount = new helper_Discount();
            //$discount = $discount->getDiscount();
            $ts = (object)$tests;
                           $tests_json = array();
                           foreach ($ts as $ts1) {
                               array_push($tests_json, $ts1);
                           }
                $tests_json = json_encode($tests_json);
            $content = View::factory('vuser/vpatient/vmedicinecart');
            $content->bind('userid', $userid);
            $content->bind('tests',$tests);
            $content->bind('tests_json',$tests_json);
            $content->bind('arr_favoritepathologist',$arr_favoritepathologist);
            $content->bind('referer',$referer);
            $content->bind('objaddhome', $objAddHome);
            $content->bind('objaddwork', $objAddWork);
            $content->bind('objcountries', $allCountries);
            $content->bind('user', $objUser);
            $this->template->content = $content;
            $this->template->user =  $objUser->Firstname_c;
            $this->template->urole = $urole;

        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function action_savetocart()
    {
        try
        {
            $tests=json_decode($_GET['test']);
            // $testreqdate=strtotime($_GET['testreqdate']);
            $qty=$_GET['qty'];

//var_dump($testreqdate);
            $objUser = Auth::instance()->get_user();
            foreach($tests as $test)
            {
                $objcart = ORM::factory('medicinecart')->where('refconsumeruserid_c','=',$objUser->id)->where('itemid_c','=',$test[0])->where('status_c','=','pending')->find();
                if($objcart->id != null){
                    continue;
                }
                $objcart = ORM::factory('medicinecart');
                $objcart->refconsumeruserid_c = $objUser->id;
                //$objcart->refprovideruserid_c = $test[1];
                //$objcart->requestdeliverydate_c = date('Y-m-d H:i:s',$testreqdate);
                $objcart->itemid_c = $test[0];
                $objcart->status_c = "pending";
                $objcart->qty_c = $test[1];

                $objcart->save();
            }
            $number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $objUser->id)->where('status_c','=','pending')->count_all();
            die($number);
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }


    private function getmynetworkpathologists()
    {
        try
        {
            $objUser = Auth::instance()->get_user();
            $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
            $objfavoritechemistbypatient = ORM::factory('favoritechemistbypatient')->where('reffavchembypatpatientid_c','=',$objpatient->id)->find_all();
            $chemist = array();
            $count = -1;
            foreach($objfavoritechemistbypatient as $favoritechemistchemist)
            {
                $count=$count + 1;
                $chemist[$count]  = array();
                $chemist[$count]["centerid"] = $favoritechemistchemist->reffavchembypatchemistsid_c;
                $objchemist = ORM::factory('chemist')->where('id','=',$favoritechemistchemist->reffavchembypatchemistsid_c)->find();
                $chemist[$count]["centername"] = $objchemist->nameofmedical_c;
            }
            return $chemist;
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }

    public function action_getmedicineusingid()
    {
        try
        {
            $medid = $_GET['medid'];
            $objtests = ORM::factory('drugmaster')->where('id','=',$medid )->find_all();
            $tests = array();
            $i = 0;
            foreach($objtests as $test)
            {
                $tests[$i] = array();
                $testmasters = ORM::factory('drugmaster')->where('id','=',$medid)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["testname"] = $testmasters->DrugName_c;
                $tests[$i]["pathologyid"]= "";
                $tests[$i]["rate"]= "Not provided";
                $tests[$i]["pathologistList"]= $this->getmynetworkpathologists();
                //var_dump($tests[$i]["pathologistList"]);
                $i = $i + 1;
            }
            die(json_encode($tests));
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }
    }

    private function displaysearchandorderorderedtests($where)
    {
        try
        {
			$status = "searchorder";
		   $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else
            {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id','=',$userid)
                    ->mustFindAll()
                    ->as_array();
                foreach($objRolesUser as $role)
                {
                    $objRole = ORM::factory('role')
                        ->where('id','=',$role->role_id)
                        ->mustFind();
                    switch($objRole->name)
                    {
                        case 'Login' :break;
                        case 'patient': $urole= 'patient';
                            break;
                        default: throw new Exception ("Role not found");
                            break;
                    }
                }


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
                    //$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
                    $objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"]= $objpathologist->id;
                    $tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);

                    //$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
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

                $ts = (object)$tests;
                $tests_json = array();
                foreach ($ts as $ts1) {
                    array_push($tests_json, $ts1);
                }
                $tests_json = json_encode($tests_json);

                $number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
                $viewname = 'vmedicinesearchandorder';
                $viewpath ='vuser/vpatient/'.$viewname;
                $content = View::factory($viewpath);
                $content->bind('tests',$tests);
                $content->bind('tests_json',$tests_json);
                $content->bind('referer',$referer);
                $content->bind('userid', $userid);
				$content->bind('status',$status);
                $content->bind('number',$number);
                $content->bind('where',$where);
                //var_dump($number);
                if($where!="")
                    $whereclause = "[drugname,like,$where]";
                // else
                // 	$whereclause="";
                // $content->bind('whereclause',$whereclause);
                // $Objtestcategorymaster = ORM::factory('doctordrugdetails')->find_all();
                // $arrayTestcatagarty=array();
                // foreach($Objtestcategorymaster  as $testcategorymaster)
                // {
                // 	array_push($arrayTestcatagarty,$testcategorymaster->testcategoryname_c);
                // }
                //$content->bind('arrayTestcatagarty',$arrayTestcatagarty);x
                $content->bind('whereclause',$whereclause);
                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user =  $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }

    }
    private function displaysearchandorderorderedtestsFootable($where)
    {
        try
        {
            $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else
            {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id','=',$userid)
                    ->mustFindAll()
                    ->as_array();
                foreach($objRolesUser as $role)
                {
                    $objRole = ORM::factory('role')
                        ->where('id','=',$role->role_id)
                        ->mustFind();
                    switch($objRole->name)
                    {
                        case 'Login' :break;
                        case 'patient': $urole= 'patient';
                            break;
                        default: throw new Exception ("Role not found");
                            break;
                    }
                }


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
                    //$tests[$i]["testreqdate"] = date('d M Y',strtotime($test->requestdeliverydate_c));
                    $objpathologist = ORM::factory('chemist')->where('id','=',$test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"]= $objpathologist->id;
                    $tests[$i]["pathologistList"]= $this->getpathologists($pathologistid,$testmasters->id);

                    //$tests[$i]["rate"] = $this->gettestrate($testmasters->id,$pathologistid);
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c','=',$objUser->id)->find();
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
                    $referer = "/ayushman/cpatientmedicines/viewFootable";
                }

                $ts = (object)$tests;
                $tests_json = array();
                foreach ($ts as $ts1) {
                    array_push($tests_json, $ts1);
                }
                $tests_json = json_encode($tests_json);



                $number = ORM::factory('medicinecart')->where('refconsumeruserid_c', '=', $userid)->where('status_c','=','pending')->count_all();
                $viewname = 'vmedicinesearchandorder';
                $viewpath ='vuser/vpatient/'.$viewname;
                $content = View::factory($viewpath);
                $content->bind('tests',$tests);
                $content->bind('tests_json',$tests_json);
                $content->bind('referer',$referer);
                $content->bind('userid', $userid);
                $content->bind('number',$number);
                $content->bind('where',$where);
                //var_dump($number);
                if($where!="")
                    $whereclause = "[drugname,like,$where]";
                // else
                // 	$whereclause="";
                // $content->bind('whereclause',$whereclause);
                // $Objtestcategorymaster = ORM::factory('doctordrugdetails')->find_all();
                // $arrayTestcatagarty=array();
                // foreach($Objtestcategorymaster  as $testcategorymaster)
                // {
                // 	array_push($arrayTestcatagarty,$testcategorymaster->testcategoryname_c);
                // }
                //$content->bind('arrayTestcatagarty',$arrayTestcatagarty);x
                $content->bind('whereclause',$whereclause);

                //START: Prescription Medicines Search and Order by Pooja Gujarathi
                $serchMedicines = $this->request->post('search');
                if($serchMedicines != null){
                    $whereclause = $whereclause.'[drugname,like,'.'%'.$serchMedicines.'%]';
                }
                $object_medicine_searchandorder = new Model_Xjqgridgetdata;
                $resultmedicinesearchandorder = $object_medicine_searchandorder->getfootablejsondata('','','name','asc','drug','drugname,id,id,name',$whereclause,'');
                //END: Prescription Medicines Search and Order by Pooja Gujarathi


                $content->bind('resultmedicinesearchandorder',$resultmedicinesearchandorder);

                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user =  $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        }
        catch(Exception $e)
        {
            throw new Exception($e);
        }

    }

    public function action_searchandorder()
    {
        $where="";
        $this->displaysearchandorderorderedtests($where);
    }

    public function action_searchandorderMedicinesFootable()
    {
        $where="";
        $this->displaysearchandorderorderedtestsFootable($where);
    }

    public function action_view()
    {
        $content = View::factory('vuser/vpatient/vmedicineorder');
        $user = Auth::instance()->get_user();
        if (!$user)
            Request::current()->redirect('cuser/login');
        else
            if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
                $urole = "doctor";
            else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
                $urole = "patient";
        $userid = $user->id;

        //START: Prescription Medicines Orders by Pooja Gujarathi
        $whereclause = "[patientuserid,=,$userid][status,!=,cancelled][status,!=,completed][status,!=,reassign]";
        $object_medicine_orders = new Model_Xjqgridgetdata;
        $resultmedicineorders = $object_medicine_orders->exportdata('','','refchemistordersid','desc','patientmedicine','date,patientuserid,doctoruserid,appointmentid,refchemistordersid,chemistworkphonenumber,medicinename,orderqty,chemistname,status,status,deliverydate',$whereclause,'');
        //END: Prescription Medicines Orders by Pooja Gujarathi

        $content->bind('resultmedicineorders', $resultmedicineorders);

        $content->bind('userid', $userid);
        $breadcrumb = "Home>>Medicines";
        $maximize = true;
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content = $content;
        $this->template->user =  $user->Firstname_c;
        $this->template->urole = $urole;
    }
    public function action_viewFootable()
    {
        $content = View::factory('vuser/vpatient/vmedicineorder');
        $user = Auth::instance()->get_user();
        if (!$user)
            Request::current()->redirect('cuser/login');
        else
            if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
                $urole = "doctor";
            else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
                $urole = "patient";
        $userid = $user->id;

        //START: Prescription Medicines Orders by Pooja Gujarathi
        $whereclause = "[patientuserid,=,$userid][status,!=,cancelled][status,!=,completed][status,!=,reassign]";
        $object_medicine_orders = new Model_Xjqgridgetdata;
        $resultmedicineorders = $object_medicine_orders->getfootablejsondata('','','refchemistordersid','desc','patientmedicine','date,patientuserid,doctoruserid,appointmentid,refchemistordersid,chemistworkphonenumber,medicinename,orderqty,chemistname,status,status,deliverydate',$whereclause,'');
        //END: Prescription Medicines Orders by Pooja Gujarathi

        $ts = (object)$resultmedicineorders;
        $tests_json = array();
        foreach ($ts as $ts1) {
            array_push($tests_json, $ts1);
        }
        $tests_json = json_encode($tests_json);


        $content->bind('resultmedicineorders', $resultmedicineorders);
        $content->bind('tests_json', $tests_json);
        $content->bind('userid', $userid);
        $breadcrumb = "Home>>Medicines";
        $maximize = true;
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content = $content;
        $this->template->user =  $user->Firstname_c;
        $this->template->urole = $urole;
    }

     public function action_viewmedicinecompleteorderFootable()
     {
        $content = View::factory('vuser/vpatient/vmedicinecompleteorder');
        $user = Auth::instance()->get_user();
        if (!$user)
            Request::current()->redirect('cuser/login');
        else
            if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
                $urole = "doctor";
            else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
                $urole = "patient";
        $userid = $user->id;

        //START: Prescriptions Complete Order by Pooja Gujarathi
        $whereclause = "[patientuserid,=,$userid][status,=,completed]";
        $object_medicine_completeorder = new Model_Xjqgridgetdata;
        $resultmedicinecompleteorder = $object_medicine_completeorder->getfootablejsondata('','','refchemistordersid','desc','patientmedicine','deliverydate,patientuserid,doctoruserid,appointmentid,refchemistordersid,drname,chemistworkphonenumber,medicinename,orderqty,chemistname,medicinename,status,status,refchemistordersid,deliverydate',$whereclause,'');
        //END: Prescriptions Complete Order by Pooja Gujarathi

       $ts = (object)$resultmedicinecompleteorder;
      $tests_json = array();
      foreach ($ts as $ts1) {
          array_push($tests_json, $ts1);
      }
      $tests_json = json_encode($tests_json);

        $content->bind('tests_json', $tests_json);
     //   echo "<pre>";
      //  print_r($tests_json);
        $content->bind('userid', $userid);
        $content->bind('resultmedicinecompleteorder', $resultmedicinecompleteorder); //Pooja Gujarathi
        $breadcrumb = "Home>>Medicines";
        $maximize = true;
        $content->bind('tests_json', $tests_json);
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content = $content;
        $this->template->user =  $user->Firstname_c;
        $this->template->urole = $urole;
     }

    public function action_viewmedicinecompleteorder()
    {
        $content = View::factory('vuser/vpatient/vmedicinecompleteorder');
        $user = Auth::instance()->get_user();
        if (!$user)
            Request::current()->redirect('cuser/login');
        else
            if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
                $urole = "doctor";
            else if ($user->has('roles', ORM::factory('role', array('name' => 'patient'))))
                $urole = "patient";
        $userid = $user->id;

        //START: Prescriptions Complete Order by Pooja Gujarathi
        $whereclause = "[patientuserid,=,$userid][status,=,completed]";
        $object_medicine_completeorder = new Model_Xjqgridgetdata;
        $resultmedicinecompleteorder = $object_medicine_completeorder->exportdata('','','refchemistordersid','desc','patientmedicine','deliverydate,patientuserid,doctoruserid,appointmentid,refchemistordersid,drname,chemistworkphonenumber,medicinename,orderqty,chemistname,medicinename,status,status,refchemistordersid,deliverydate',$whereclause,'');
        //END: Prescriptions Complete Order by Pooja Gujarathi

        $content->bind('userid', $userid);
        $content->bind('resultmedicinecompleteorder', $resultmedicinecompleteorder); //Pooja Gujarathi
        $breadcrumb = "Home>>Medicines";
        $maximize = true;
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content = $content;
        $this->template->user =  $user->Firstname_c;
        $this->template->urole = $urole;
    }

}
?>