<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cpatientrequistiontests extends Controller_Ctemplatewithmenu
{

    public function action_view()
    {
		$statusfoo = 'view';
	   $this->displaytestlist('vpatientrequistiontests',$statusfoo);
    }

    public function action_viewFootable()
    {
        $statusfoo = 'order';
		$this->displaytestlistFootable('vpatientrequistiontests',$statusfoo);
    }

    public function action_search()
    {
		
	   $this->displaytestlist('vpatientrequistiontests');
    }

    public function action_searchFootable()
    {
		$statusfoo = 'search';
	   $this->displaytestlistFootable('vpatientrequistiontests',$statusfoo);
    }

    private function displaytestlistFootable($viewname,$statusfoo)
    {
        try {
            $status = $statusfoo;
			$this->displaytestlist('vpatientrequistiontests');
            $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                /* For Cart item display */
                $array_taxes = Kohana::$config->load('taxes');

                $objUser = Auth::instance()->get_user();
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                $objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $tests = array();
                $i = 0;
                foreach ($objselectedtests as $test) {
                    $tests[$i] = array();
                    $testmasters = ORM::factory('testmaster')->where('id', '=', $test->itemid_c)->find();
                    $tests[$i]["id"] = $testmasters->id;
                    $tests[$i]["cartid"] = $test->id;
                    $tests[$i]["testname"] = $testmasters->testname_c;
                    $tests[$i]["testreqdate"] = date('d M Y', strtotime($test->orderrequestdate_c));
                    $objpathologist = ORM::factory('pathologist')->where('id', '=', $test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"] = $objpathologist->id;
                    $tests[$i]["rate"] = $this->gettestrate($testmasters->id, $pathologistid);

                    $discount = new helper_Discount();
                    $discount = $discount->getDiscount($pathologistid, $testmasters->id,$objUser->id);
                    $tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount) / 100;
                    $tests[$i]["pathologistList"] = $this->getpathologistsFootable($pathologistid, $testmasters->id);
                    $tests[$i]["discountedpercent"] = $discount;
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
                $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
                $arr_favoritepathologist = array();
                foreach ($objfavoritepathologistbypatient as $objfavoritepathologist) {
                    if (!empty($objfavoritepathologist->reffavpathopathologistsid_c))
                        array_push($arr_favoritepathologist, trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
                }
                $arr_favoritepathologist = array_unique($arr_favoritepathologist);
                $arr_favoritepathologist = json_encode($arr_favoritepathologist);
                $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $userid)->find();
                $netbalance = $objbillingaccount->netbalance_c;
                $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c', '=', 'billingindividualplans.refplanid_c')->where('billingindividualplans.status_c', '=', 'active')->where('billingindividualplans.refusersid_c', '=', $userid)->find();
                $servicecharges = $objbillingplancharge->servicecharges_c;
                $servicecharges = number_format($servicecharges);
                $servicetax = $array_taxes['servicetax'];
                $servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);

                $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];

                $referer = $_SERVER['HTTP_REFERER'];

                if (!strpos($referer, 'cpatientrequistiontests')) {
                    $referer = "/ayushman/cpatientrequistiontests/viewFootable";
                }
                $discount = new helper_Discount();
                //$discount = $discount->getDiscount();

                /* For Cart item display */
                $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->count_all();
                $viewpath = 'vuser/vpatient/' . $viewname;


                //START: patient requistion re-order  by Pooja Gujarathi
                $searchreorder = $this->request->post('search');
                $columns = 'patientuserid,drname,centername,centerphonenumber,patientphonenumber,date,orderid,testsname,testid,pathologistid,patientid,pathologistuserid,orderid';
                $whereclause = "[patientuserid,=,$userid]";
                if ($searchreorder != null) {
                    $whereclause = $whereclause . '[drname,like,' . '%' . $searchreorder . '%]' . '(or)[centername,like,' . $searchreorder . '%]' . '(or)[testsname,like,' . '%' . $searchreorder . '%]';
                }
                $object_patient_reorder = new Model_Xjqgridgetdata;
                $resultreorder = $object_patient_reorder->getfootablejsondata('', '', 'orderid', 'DESC', 'orderedtestbypatient', $columns, $whereclause, '');

                //END:  patient requistion re-order  by Pooja Gujarathi


                //START: patient order from prescription  by Pooja Gujarathi
                $searchResult = $this->request->post('search');
                $columns = 'appointmentid,patientsuserid,doctorname,incident,DateAndTime,tests,appointmentid';
                $string = "Not Yet set";
                $whereclause = "[patientsuserid,=,$userid][tests,!=," . $string . " ]";
                if ($searchResult != null) {
                    $whereclause = $whereclause . '[doctorname,like,' . '%' . $searchResult . '%]' . '(or)[incident,like,' . '%' . $searchResult . '%]' . '(or)[tests,like,' . '%' . $searchResult . '%]';
                }
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $result = $object_patient_orderfrompresc->getfootablejsondata('', '', 'appdatetime', 'DESC', 'requisitiontestsbyprescription', $columns, $whereclause, '');
                //END: patient order from prescription by Pooja Gujarathi


                $ts = (object)$tests;
                $tests_json = array();
                foreach ($ts as $ts1) {
                    array_push($tests_json, $ts1);
                }
                $tests_json = json_encode($tests_json);
                //echo "<pre>";
                //print_r($tests_json);

                $content = View::factory($viewpath);
                $content->bind('userid', $userid);
				$content->bind('status', $status);
                $content->bind('number', $number);
                $content->bind('result', $result);//by Pooja Gujarathi
                $content->bind('tests_json', $tests_json); //by Pooja Gujarathi
                $content->bind('resultreorder', $resultreorder);//by Pooja Gujarathi
                $content->bind('servicetax', $servicetax);
                $content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
                $content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
                $content->bind('tests', $tests);
                $content->bind('netbalance', $netbalance);
                $content->bind('servicecharges', $servicecharges);
                $content->bind('referer', $referer);
                $content->bind('arr_favoritepathologist', $arr_favoritepathologist);

                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user = $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }

    }

    private function displaytestlist($viewname)
    {
        try {
            $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                /* For Cart item display */
                $array_taxes = Kohana::$config->load('taxes');

                $objUser = Auth::instance()->get_user();
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                $objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $tests = array();
                $i = 0;
                foreach ($objselectedtests as $test) {
                    $tests[$i] = array();
                    $testmasters = ORM::factory('testmaster')->where('id', '=', $test->itemid_c)->find();
                    $tests[$i]["id"] = $testmasters->id;
                    $tests[$i]["cartid"] = $test->id;
                    $tests[$i]["testname"] = $testmasters->testname_c;
                    $tests[$i]["testreqdate"] = date('d M Y', strtotime($test->orderrequestdate_c));
                    $objpathologist = ORM::factory('pathologist')->where('id', '=', $test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"] = $objpathologist->id;
                    $tests[$i]["rate"] = $this->gettestrate($testmasters->id, $pathologistid);

                    $discount = new helper_Discount();
                    $discount = $discount->getDiscount($pathologistid, $testmasters->id,$objUser->id);
                    $tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount) / 100;
                    $tests[$i]["pathologistList"] = $this->getpathologists($pathologistid, $testmasters->id);
                    $tests[$i]["discountedpercent"] = $discount;
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
                $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
                $arr_favoritepathologist = array();
                foreach ($objfavoritepathologistbypatient as $objfavoritepathologist) {
                    if (!empty($objfavoritepathologist->reffavpathopathologistsid_c))
                        array_push($arr_favoritepathologist, trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
                }
                $arr_favoritepathologist = array_unique($arr_favoritepathologist);
                $arr_favoritepathologist = json_encode($arr_favoritepathologist);
                $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $userid)->find();
                $netbalance = $objbillingaccount->netbalance_c;
                $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c', '=', 'billingindividualplans.refplanid_c')->where('billingindividualplans.status_c', '=', 'active')->where('billingindividualplans.refusersid_c', '=', $userid)->find();
                $servicecharges = $objbillingplancharge->servicecharges_c;
                $servicecharges = number_format($servicecharges);
                $servicetax = $array_taxes['servicetax'];
                $servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);

                $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];

                $referer = $_SERVER['HTTP_REFERER'];

                if (!strpos($referer, 'cpatientrequistiontests')) {
                    $referer = "/ayushman/cpatientrequistiontests/view";
                }
                $discount = new helper_Discount();
                //$discount = $discount->getDiscount();

                /* For Cart item display */
                $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->count_all();
                $viewpath = 'vuser/vpatient/' . $viewname;


                //START: patient requistion re-order  by Pooja Gujarathi
                $searchreorder = $this->request->post('search');
                $columns = 'patientuserid,drname,centername,centerphonenumber,patientphonenumber,date,orderid,testsname,testid,pathologistid,patientid,pathologistuserid,orderid';
                $whereclause = "[patientuserid,=,$userid]";
                if ($searchreorder != null) {
                    $whereclause = $whereclause . '[drname,like,' . '%' . $searchreorder . '%]' . '(or)[centername,like,' . $searchreorder . '%]' . '(or)[testsname,like,' . '%' . $searchreorder . '%]';
                }
                $object_patient_reorder = new Model_Xjqgridgetdata;
                $resultreorder = $object_patient_reorder->getfootablejsondata('', '', 'orderid', 'DESC', 'orderedtestbypatient', $columns, $whereclause, '');

                //END:  patient requistion re-order  by Pooja Gujarathi


                //START: patient order from prescription  by Pooja Gujarathi
                $searchResult = $this->request->post('search');
                $columns = 'appointmentid,patientsuserid,doctorname,incident,DateAndTime,tests,appointmentid';
                $string = "Not Yet set";
                $whereclause = "[patientsuserid,=,$userid][tests,!=," . $string . " ]";
                if ($searchResult != null) {
                    $whereclause = $whereclause . '[doctorname,like,' . '%' . $searchResult . '%]' . '(or)[incident,like,' . '%' . $searchResult . '%]' . '(or)[tests,like,' . '%' . $searchResult . '%]';
                }
                $object_patient_orderfrompresc = new Model_Xjqgridgetdata;
                $result = $object_patient_orderfrompresc->getfootablejsondata('', '', 'appdatetime', 'DESC', 'requisitiontestsbyprescription', $columns, $whereclause, '');
                //END: patient order from prescription by Pooja Gujarathi


//                $ts =  (object) $tests;
//                $tests_json = array();
//                foreach ( $ts as $ts1){
//                    array_push($tests_json,$ts1);
//                }
//                $tests_json = json_encode($tests_json);

                $content = View::factory($viewpath);
                $content->bind('userid', $userid);
                $content->bind('number', $number);
                $content->bind('result', $result);//by Pooja Gujarathi
                //$content->bind('tests_json',$tests_json);
                $content->bind('resultreorder', $resultreorder);//by Pooja Gujarathi
                $content->bind('servicetax', $servicetax);
                $content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
                $content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
                $content->bind('tests', $tests);
                $content->bind('netbalance', $netbalance);
                $content->bind('servicecharges', $servicecharges);
                $content->bind('referer', $referer);
                $content->bind('arr_favoritepathologist', $arr_favoritepathologist);

                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user = $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }

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

    private function getpathologists($appid, $testid)
    {
        try {
            $objUser = Auth::instance()->get_user();
            $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
            $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
            $pathologists = array();
            $count = -1;
            foreach ($objfavoritepathologistbypatient as $favoritepathologistpathologist) {
                $count = $count + 1;
                $pathologists[$count] = array();
                $pathologists[$count]["centerid"] = $favoritepathologistpathologist->reffavpathopathologistsid_c;
                $objpathologist = ORM::factory('pathologist')->where('id', '=', $favoritepathologistpathologist->reffavpathopathologistsid_c)->find();
                $pathologists[$count]["centername"] = $objpathologist->nameofcenter_c;
            }
            $ispresent = 0;
            $i = 0;
            $pathologistsfromfav = $pathologists;
            $objrecommendedtest = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c', '=', $appid)->where('refrecomtestrecommtestid_c', '=', $testid)->find();
            $valuepresent = $this->checkvaluepresent($pathologists, 'centerid', $objrecommendedtest->refrecomtestpathologists1id_c);
            if (($valuepresent == false) && ($objrecommendedtest->refrecomtestpathologists1id_c != NULL)) {
                $count = $count + 1;
                $pathologists[$count] = array();
                $pathologists[$count]["centerid"] = $objrecommendedtest->refrecomtestpathologists1id_c;
                $objpathologist = ORM::factory('pathologist')->where('id', '=', $objrecommendedtest->refrecomtestpathologists1id_c)->find();
                $pathologists[$count]["centername"] = $objpathologist->nameofcenter_c;
            }
            if ((count($pathologistsfromfav) == 0) && ($objrecommendedtest->refrecomtestpathologists1id_c != NULL)) {
                $pathologists[0] = array();
                $pathologists[0]["centerid"] = $objrecommendedtest->refrecomtestpathologists1id_c;
                $objpathologist = ORM::factory('pathologist')->where('id', '=', $objrecommendedtest->refrecomtestpathologists1id_c)->find();
                $pathologists[0]["centername"] = $objpathologist->nameofcenter_c;
            }
            return $pathologists;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_checkrecommenedpathologist()
    {
        try {
            $appid = $_GET['appid'];
            $testid = $_GET['selectedtestid'];
            $objrecommendedtest = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c', '=', $appid)->where('refrecomtestrecommtestid_c', '=', $testid)->find();
            if ($objrecommendedtest->refrecomtestpathologists1id_c != NULL) {
                die(json_encode($objrecommendedtest->refrecomtestpathologists1id_c));
            } else {
                die("Not set");
            }

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_gettestsusingappid()
    {
        $appid = $_GET['appid'];
        $objtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c', '=', $appid)->find_all();
        $tests = array();
        $i = 0;
        $tests = array();
        foreach ($objtests as $test) {
            $tests[$i] = array();
            $testmasters = ORM::factory('testmaster')->where('id', '=', $test->refrecomtestrecommtestid_c)->find();
            $tests[$i]["id"] = $testmasters->id;
            $tests[$i]["testname"] = $testmasters->testname_c;
            $i = $i + 1;
        }
        die(json_encode($tests));
    }

    public function action_gettestsdatausingappid()
    {
        try {
            $appid = $_GET['appid'];
            $objtests = ORM::factory('recommendedtest')->where('refrecomtestappointmentsid_c', '=', $appid)->where('refrecomtestdiaglabsordersid_c', '=', NUll)->find_all();
            $tests = array();
            $i = 0;
            foreach ($objtests as $test) {
                $tests[$i] = array();
                $testmasters = ORM::factory('testmaster')->where('id', '=', $test->refrecomtestrecommtestid_c)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["testname"] = $testmasters->testname_c;
                if ($test->refrecomtestpathologists1id_c != NULL) {
                    $pathologistid = $test->refrecomtestpathologists1id_c;
                    $tests[$i]["pathologistid"] = $pathologistid;
                    $testID = $testmasters->id;
                    $tests[$i]["rate"] = $this->gettestrate($testID, $pathologistid);
                } else {
                    $tests[$i]["pathologistid"] = "";
                    $tests[$i]["rate"] = "Not provided";
                }
                $tests[$i]["pathologistList"] = $this->getpathologists($appid, $testmasters->id);

				if($testmasters->reftestsubcategoryid_c == 11)
				{
					// Define battery details
					$tests[$i]["batteryflag"] = true;
					$tests[$i]["batterydetail"] = $this->getbatterydetails($testmasters->id);
				}
				else
				{
					$tests[$i]["batteryflag"] = false;
					$tests[$i]["batterydetail"] = "";				
				}				
                $i = $i + 1;
            }
            die(json_encode($tests));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    private function gettestrate($testid, $pathologistid)
    {
        try {
			// Select rate from standard catalog.
            $objCatalog = ORM::factory('pathologistcatalog')
					->where('refpathcatalogtestid_c', '=', $testid)
					->where('refpathcatalogpathologistsid_c', '=', $pathologistid)
					->where('refdiscgroupid_c','=',-1)->find();
            if ($objCatalog->id != NULL) {
                return $objCatalog->test_rate_c;
            } else {
                return "Not provided";
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_gettestfee()
    {
        try {
            $objUser = Auth::instance()->get_user();
            $testid = $_GET['testid'];
            $pathologistid = $_GET['pathologistid'];
            $fee = $this->gettestrate($testid, $pathologistid);

            if (is_numeric($fee)) {
                $discount = new helper_Discount();
                $fee = $fee * (100 - $discount->getDiscount($pathologistid, $testid,$objUser->id)) / 100;
            }

            die ($fee);
        } catch (Exception $e) {
            var_dump($e);
            die;
            throw new Exception($e);
        }
    }

    public function action_gettestdiscountedfee()
    {
        try {
            $objUser = Auth::instance()->get_user();

            $testid = $_GET['testid'];
            $pathologistid = $_GET['pathologistid'];
            $fee = $this->gettestrate($testid, $pathologistid);
            $array = array();
            $array['originalfees'] = $fee;
            if (is_numeric($fee)) {
                $discount = new helper_Discount();
                $fee = $fee * (100 - $discount->getDiscount($pathologistid, $testid,$objUser->id)) / 100;
                $array['discountedfees'] = $fee;
            } else {
                $array['discountedfees'] = '';
            }
			// Get battery test rates 
			//------------------------------
			$array['batteryflag'] = false;
			$array['batterytestrates'] = array();
			$objtest = ORM::factory("allactivebatterydetail")
					->where('batteryid','=', $testid)
					->where('pathologistid','=', $pathologistid)
					->find_all();
			$testindex = 0;
				foreach($objtest as $test)
				{
					$array['batterytestrates'][$testindex]['testid'] =  $test->testid;
					$array['batterytestrates'][$testindex]['testrate'] = $this->gettestrate($test->testid, $pathologistid); 					
					$array['batteryflag'] = true;
					++ $testindex;
				}
			
            die (json_encode($array));
        } catch (Exception $e) {
            var_dump($e);
            die;
            throw new Exception($e);
        }
    }

    public function action_gettestinfo()
    {
        try {
            $info = array();
            if (isset($_GET['appid']))
                $appid = $_GET['appid'];
            if (isset($_GET['testname']))
                $testname = $_GET['testname'];
            if (isset($_GET['appid']))
                $Objtest = ORM::factory('testmaster')->join('recommendedtests')->on('testmaster.id', '=', 'recommendedtests.refrecomtestrecommtestid_c')->where('recommendedtests.refrecomtestappointmentsid_c', '=', $appid)->where('testmaster.testname_c', '=', $testname)->find();
            if (isset($_GET['testid']))
                $Objtest = ORM::factory('testmaster')->where('testmaster.id', '=', $_GET['testid'])->find();
            $info['Test Name'] = $Objtest->testname_c;
            if ($Objtest->remark_c != null)
                $info['Remarks'] = $Objtest->remark_c;
            else
                $info['Remarks'] = "";
            die(json_encode($info));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_savetocart()
    {
        try {
            $tests = json_decode($_GET['test']);
            //$testreqdate=strtotime($_GET['testreqdate']);
// var_dump($testreqdate);
            $objUser = Auth::instance()->get_user();
            foreach ($tests as $test) {
                $objcart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $objUser->id)->where('itemid_c', '=', $test[0])->where('status_c', '=', 'pending')->find();
                if ($objcart->id != null) {
                    continue;
                }
                $objcart = ORM::factory('cart');
                $objcart->refconsumeruserid_c = $objUser->id;
                $objcart->refprovideruserid_c = $test[1];
                //$objcart->orderrequestdate_c =date('Y-m-d H:i:s',$testreqdate);
                $objcart->itemid_c = $test[0];
                $objcart->status_c = "pending";
                if (isset($test[2])) {
                    $objcart->appid_c = $test[2];
                }
                $objcart->save();
            }
            $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $objUser->id)->where('status_c', '=', 'pending')->count_all();
            die($number);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    private function checkvaluepresent($array, $key, $val)
    {
        foreach ($array as $item)
            if (isset($item[$key]) && $item[$key] == $val)
                return true;
        return false;
    }

    public function action_searchandorder()
    {
        $where = "";
        $this->displaysearchandorderorderedtests($where);
    }

    public function action_searchandorderFootable()
    {
        $where = "";
        $this->displaysearchandorderorderedtestsFootable($where);
    }

    private function displaysearchandorderorderedtestsFootable($where)
    {
        try {
			$status = 'searchorder';
            $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                /* For Cart item display */
                $array_taxes = Kohana::$config->load('taxes');

                $objUser = Auth::instance()->get_user();
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                $objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $tests = array();
                $i = 0;
                foreach ($objselectedtests as $test) {
                    $tests[$i] = array();
                    $testmasters = ORM::factory('testmaster')->where('id', '=', $test->itemid_c)->find();
                    $tests[$i]["id"] = $testmasters->id;
                    $tests[$i]["cartid"] = $test->id;
                    $tests[$i]["testname"] = $testmasters->testname_c;
                    $tests[$i]["testreqdate"] = date('d M Y', strtotime($test->orderrequestdate_c));
                    $objpathologist = ORM::factory('pathologist')->where('id', '=', $test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"] = $objpathologist->id;
                    $tests[$i]["rate"] = $this->gettestrate($testmasters->id, $pathologistid);

                    $discount = new helper_Discount();
                    $discount = $discount->getDiscount($pathologistid, $testmasters->id,$objUser->id);
                    $tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount) / 100;
                    $tests[$i]["pathologistList"] = $this->getpathologistsFootable($pathologistid, $testmasters->id);
                    $tests[$i]["discountedpercent"] = $discount;
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
                $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
                $arr_favoritepathologist = array();
                foreach ($objfavoritepathologistbypatient as $objfavoritepathologist) {
                    if (!empty($objfavoritepathologist->reffavpathopathologistsid_c))
                        array_push($arr_favoritepathologist, trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
                }
                $arr_favoritepathologist = array_unique($arr_favoritepathologist);
                $arr_favoritepathologist = json_encode($arr_favoritepathologist);
                $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $userid)->find();
                $netbalance = $objbillingaccount->netbalance_c;
                $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c', '=', 'billingindividualplans.refplanid_c')->where('billingindividualplans.status_c', '=', 'active')->where('billingindividualplans.refusersid_c', '=', $userid)->find();
                $servicecharges = $objbillingplancharge->servicecharges_c;
                $servicecharges = number_format($servicecharges);
                $servicetax = $array_taxes['servicetax'];
                $servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);

                $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];

                $referer = $_SERVER['HTTP_REFERER'];

                if (!strpos($referer, 'cpatientrequistiontests')) {
                    $referer = "/ayushman/cpatientrequistiontests/viewFootable";
                }
                $discount = new helper_Discount();
                //$discount = $discount->getDiscount();

                /* For Cart item display */

                $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->count_all();
                $viewname = 'vpatientsearchandordertests';
                $viewpath = 'vuser/vpatient/' . $viewname;

                $ts = (object)$tests;
                $tests_json = array();
                foreach ($ts as $ts1) {
                    array_push($tests_json, $ts1);
                }
                $tests_json = json_encode($tests_json);


                $content = View::factory($viewpath);
                $content->bind('userid', $userid);
                $content->bind('number', $number);
                $content->bind('where', $where);
				$content->bind('status', $status);
				
                /* Content bind for Cart */
                $content->bind('tests_json', $tests_json);
                $content->bind('servicetax', $servicetax);
                $content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
                $content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
                $content->bind('tests', $tests);
                $content->bind('netbalance', $netbalance);
                $content->bind('servicecharges', $servicecharges);
                $content->bind('referer', $referer);
                $content->bind('arr_favoritepathologist', $arr_favoritepathologist);
                /* Content bind for Cart */

                if ($where != "")
                    $whereclause = "[categoryname_c,like,$where]";
                else
                    $whereclause = "";

                $content->bind('whereclause', $whereclause);
                $Objtestcategorymaster = ORM::factory('testcategorymaster')->find_all();
                $arrayTestcatagarty = array();
                foreach ($Objtestcategorymaster as $testcategorymaster) {
                    array_push($arrayTestcatagarty, $testcategorymaster->testcategoryname_c);
                }

                //START: patient search and order  by Pooja Gujarathi
                $searchandorder = $this->request->post('search');
				$typeofcatalog = $this->request->post('catType');
                $columns = 'categoryname_c,testname,testid,remark,testid';
				$subquery = '';
				if($typeofcatalog != "Battery")
				{
					$subquery = 'and categoryname_c != "Battery" ';
					$selectedcattype = "test";
				}
				else
				{
					$subquery = 'and categoryname_c = "Battery" ';
					$selectedcattype = "Battery";					
				}
					
                if ($searchandorder != null) {
                    $whereclause = $whereclause . '[categoryname_c,like,' . '%'. $searchandorder . '%]' . '(or)[testname,like,' . '%'. $searchandorder . '%]';
					$subquery = $subquery . 'and ((categoryname_c like "%'.$searchandorder.'%") OR (testname like "%'.$searchandorder.'%"))';
                }
                //$object_patient_searchandorder = new Model_Xjqgridgetdata;
                //$resultsearchandorder = $object_patient_searchandorder->getfootablejsondata('', '', 'categoryname_c', 'DESC', 'searchandordertest', $columns, $whereclause, '');
				// Searching from another table and query is to be written
				// so existing functions for data searched are not used
                //END: patient search and order  by Pooja Gujarathi
				 
				// Searching data from view which will have test from the selected network //
				// "searchfrompathcatalogs"
				$query = 'select distinct categoryname_c,testname,testid,remark,testid from searchfrompathcatalogs '
						  .' where pathologistid in (select reffavpathopathologistsid_c from favoritepathologistbypatients where reffavpathopatientsid_c = '.$objpatient->id.')'
							.$subquery;
				$resultsearchandorder = DB::query(Database::SELECT, $query)->execute()->as_array();
				//var_dump($result);
					
                $content->bind('resultsearchandorder', $resultsearchandorder); //by Pooja Gujarathi
                $content->bind('arrayTestcatagarty', $arrayTestcatagarty);
                $content->bind('selectedcattype', $selectedcattype);
                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user = $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }

    }

    public function action_gettestsusingtestid()
    {
        try {
            $testid = $_GET['testid'];
            $objtests = ORM::factory('testmaster')->where('id', '=', $testid)->find_all();
            $tests = array();
            $i = 0;
            foreach ($objtests as $test) {
                $tests[$i] = array();
                $testmasters = ORM::factory('testmaster')->where('id', '=', $testid)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["testname"] = $testmasters->testname_c;
                $tests[$i]["pathologistid"] = "";
                $tests[$i]["rate"] = "Not provided";
                $tests[$i]["pathologistList"] = $this->getmynetworkpathologists();
				if($testmasters->reftestsubcategoryid_c == 11)
				{
					// Define battery details
					$tests[$i]["batteryflag"] = true;
					$tests[$i]["batterydetail"] = $this->getbatterydetails($testmasters->id);
				}
				else
				{
					$tests[$i]["batteryflag"] = false;
					$tests[$i]["batterydetail"] = "";				
				}				
				
                $i = $i + 1;
            }
            die(json_encode($tests));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

	private function getbatterydetails($batteryid)
	{
        try {
            $objtests = ORM::factory('testbatdetail')->where('batteryid', '=', $batteryid)->find_all();
            $result = array();
            $i = 0;
            foreach ($objtests as $test) {
				$result[$i] = array();
                $result[$i]["testid"] = $test->testid;
                $result[$i]["testnameforbat"] = $test->testname;
                $i = $i + 1;
            }
            return $result;
        } catch (Exception $e) {
            throw new Exception($e);
        }		
	}
	
    private function getmynetworkpathologists()
    {
        try {
            $objUser = Auth::instance()->get_user();
            $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
            $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
            $pathologists = array();
            $count = -1;
            foreach ($objfavoritepathologistbypatient as $favoritepathologistpathologist) {
                $count = $count + 1;
                $pathologists[$count] = array();
                $pathologists[$count]["centerid"] = $favoritepathologistpathologist->reffavpathopathologistsid_c;
                $objpathologist = ORM::factory('pathologist')->where('id', '=', $favoritepathologistpathologist->reffavpathopathologistsid_c)->find();
                $pathologists[$count]["centername"] = $objpathologist->nameofcenter_c;
            }
            return $pathologists;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_gettestsdatausingorderid()
    {
        try {
            $orderid = $_GET['orderid'];
            $objUser = Auth::instance()->get_user();
            $userid = $objUser->id;
            $objtests = ORM::factory('orderedtest')->where('diagnosticlabsorderid_c', '=', $orderid)->where('customeruserid_c', '=', $userid)->find_all();
            $tests = array();
            $i = 0;
            foreach ($objtests as $test) {
                $tests[$i] = array();
                $testmasters = ORM::factory('testmaster')->where('id', '=', $test->testid_c)->find();
                $tests[$i]["id"] = $testmasters->id;
                $tests[$i]["testname"] = $testmasters->testname_c;
                $objdiagnosticlabsorders = ORM::factory('diagnosticlabsorder')->where('id', '=', $orderid)->find();
                if ($objdiagnosticlabsorders->refdiaglabsorderspathologistsid_c != NULL) {
                    $pathologistid = $objdiagnosticlabsorders->refdiaglabsorderspathologistsid_c;
                    $tests[$i]["pathologistid"] = $pathologistid;
                    $testID = $testmasters->id;
                    $tests[$i]["originalrate"] = $this->gettestrate($testID, $pathologistid);

                    $discount = new helper_Discount();
                    $tests[$i]["rate"] = $tests[$i]["originalrate"] * (100 - $discount->getDiscount($pathologistid, $testID,$objUser->id)) / 100;

                } else {
                    $tests[$i]["pathologistid"] = "";
                    $tests[$i]["rate"] = "Not provided";
                }
                $tests[$i]["pathologistList"] = $this->getmynetworkpathologists();
                $tests[$i]['previoustestrate'] = $test->rate_c;
                $objdiagnosticlabsorders = ORM::factory('diagnosticlabsorder')->where('id', '=', $orderid)->find();
                $tests[$i]['totalorderrate'] = $objdiagnosticlabsorders->rate_c;
				if($testmasters->reftestsubcategoryid_c == 11)
				{
					// Define battery details
					$tests[$i]["batteryflag"] = true;
					$tests[$i]["batterydetail"] = $this->getbatterydetails($testmasters->id);
				}
				else
				{
					$tests[$i]["batteryflag"] = false;
					$tests[$i]["batterydetail"] = "";				
				}				
                $i = $i + 1;
            }

            die(json_encode($tests));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function action_requistionorderedtests()
    {

        $this->displaytestlist('vpatientrequistionorderedtests');
    }

    public function action_requistionorderedtestsFootable()
    {
      $statusfoo = 'reorder';
	  $this->displaytestlistFootable('vpatientrequistionorderedtests',$statusfoo);
    }

    public function action_setwherefororderedtests()
    {
        $where = $_GET['where'];
        $this->displaysearchandorderorderedtests($where);
    }
    public function action_setwherefororderedtestsFootable()
    {
        $where = $_GET['where'];
        $this->displaysearchandorderorderedtestsFootable($where);
    }

    private function displaysearchandorderorderedtests($where)
    {
        try {
            $objUser = Auth::instance()->get_user();
            if (!$objUser != NULL)
                Request::current()->redirect('cuser/login');
            else {
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                /* For Cart item display */
                $array_taxes = Kohana::$config->load('taxes');

                $objUser = Auth::instance()->get_user();
                $userid = $objUser->id;
                $objRolesUser = ORM::factory('roleuser')
                    ->where('user_id', '=', $userid)
                    ->mustFindAll()
                    ->as_array();
                foreach ($objRolesUser as $role) {
                    $objRole = ORM::factory('role')
                        ->where('id', '=', $role->role_id)
                        ->mustFind();
                    switch ($objRole->name) {
                        case 'Login' :
                            break;
                        case 'patient':
                            $urole = 'patient';
                            break;
                        default:
                            throw new Exception ("Role not found");
                            break;
                    }
                }
                $objCart = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $objselectedtests = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->find_all();
                $tests = array();
                $i = 0;
                foreach ($objselectedtests as $test) {
                    $tests[$i] = array();
                    $testmasters = ORM::factory('testmaster')->where('id', '=', $test->itemid_c)->find();
                    $tests[$i]["id"] = $testmasters->id;
                    $tests[$i]["cartid"] = $test->id;
                    $tests[$i]["testname"] = $testmasters->testname_c;
                    $tests[$i]["testreqdate"] = date('d M Y', strtotime($test->orderrequestdate_c));
                    $objpathologist = ORM::factory('pathologist')->where('id', '=', $test->refprovideruserid_c)->find();
                    $pathologistid = $test->refprovideruserid_c;
                    $tests[$i]["pathologistid"] = $objpathologist->id;
                    $tests[$i]["rate"] = $this->gettestrate($testmasters->id, $pathologistid);

                    $discount = new helper_Discount();
                    $discount = $discount->getDiscount($pathologistid, $testmasters->id,$objUser->id);
                    $tests[$i]["discountedrate"] = $tests[$i]["rate"] * (100 - $discount) / 100;
                    $tests[$i]["pathologistList"] = $this->getpathologists($pathologistid, $testmasters->id);
                    $tests[$i]["discountedpercent"] = $discount;
                    $i = $i + 1;
                }
                $objpatient = ORM::factory('patient')->where('repatientsuserid_c', '=', $objUser->id)->find();
                $objfavoritepathologistbypatient = ORM::factory('favoritepathologistbypatient')->where('reffavpathopatientsid_c', '=', $objpatient->id)->find_all();
                $arr_favoritepathologist = array();
                foreach ($objfavoritepathologistbypatient as $objfavoritepathologist) {
                    if (!empty($objfavoritepathologist->reffavpathopathologistsid_c))
                        array_push($arr_favoritepathologist, trim(ucfirst($objfavoritepathologist->reffavpathopathologistsid_c)));
                }
                $arr_favoritepathologist = array_unique($arr_favoritepathologist);
                $arr_favoritepathologist = json_encode($arr_favoritepathologist);
                $objbillingaccount = ORM::factory('billingaccount')->where('refaccountuserid_c', '=', $userid)->find();
                $netbalance = $objbillingaccount->netbalance_c;
                $objbillingplancharge = ORM::factory('billingplancharge')->join('billingindividualplans')->on('billingplancharge.ref_planid_c', '=', 'billingindividualplans.refplanid_c')->where('billingindividualplans.status_c', '=', 'active')->where('billingindividualplans.refusersid_c', '=', $userid)->find();
                $servicecharges = $objbillingplancharge->servicecharges_c;
                $servicecharges = number_format($servicecharges);
                $servicetax = $array_taxes['servicetax'];
                $servicetaxonservicecharges = round($servicecharges * $servicetax / 100, 2);

                $diagnosticlabsservicetax = $array_taxes['diagnosticlabservicetax'];

                $referer = $_SERVER['HTTP_REFERER'];

                if (!strpos($referer, 'cpatientrequistiontests')) {
                    $referer = "/ayushman/cpatientrequistiontests/view";
                }
                $discount = new helper_Discount();
                //$discount = $discount->getDiscount();

                /* For Cart item display */


                $number = ORM::factory('cart')->where('refconsumeruserid_c', '=', $userid)->where('status_c', '=', 'pending')->count_all();
                $viewname = 'vpatientsearchandordertests';
                $viewpath = 'vuser/vpatient/' . $viewname;
                $content = View::factory($viewpath);
                $content->bind('userid', $userid);
                $content->bind('number', $number);
                $content->bind('where', $where);

                /* Content bind for Cart */
                $content->bind('servicetax', $servicetax);
                $content->bind('servicetaxonservicecharges', $servicetaxonservicecharges);
                $content->bind('diagnosticlabsservicetax', $diagnosticlabsservicetax);
                $content->bind('tests', $tests);
                $content->bind('netbalance', $netbalance);
                $content->bind('servicecharges', $servicecharges);
                $content->bind('referer', $referer);
                $content->bind('arr_favoritepathologist', $arr_favoritepathologist);
                /* Content bind for Cart */

                if ($where != "")
                    $whereclause = "[categoryname_c,like,$where]";
                else
                    $whereclause = "";

                $content->bind('whereclause', $whereclause);
                $Objtestcategorymaster = ORM::factory('testcategorymaster')->find_all();
                $arrayTestcatagarty = array();
                foreach ($Objtestcategorymaster as $testcategorymaster) {
                    array_push($arrayTestcatagarty, $testcategorymaster->testcategoryname_c);
                }

                //START: patient search and order  by Pooja Gujarathi
                $searchandorder = $this->request->post('search');
                $columns = 'categoryname_c,testname,testid,remark,testid';
                if ($searchandorder != null) {
                    $whereclause = $whereclause . '[categoryname_c,like,' . $searchandorder . '%]' . '(or)[testname,like,' . $searchandorder . '%]';
                }
                $object_patient_searchandorder = new Model_Xjqgridgetdata;
                $resultsearchandorder = $object_patient_searchandorder->exportdata('', '', 'categoryname_c', 'DESC', 'searchandordertest', $columns, $whereclause, '');
                //END: patient search and order  by Pooja Gujarathi

                $content->bind('resultsearchandorder', $resultsearchandorder); //by Pooja Gujarathi
                $content->bind('arrayTestcatagarty', $arrayTestcatagarty);
                $breadcrumb = "Home>>";
                $this->template->breadcrumb = $breadcrumb;
                $this->template->content = $content;
                $this->template->user = $objUser->Firstname_c;
                $this->template->urole = $urole;
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }

    }


    public function action_gettestinfousingorderid()
    {
        try {
            $info = array();
            $testname = $_GET['testname'];
            $Objtest = ORM::factory('testmaster')->where('testmaster.testname_c', '=', $testname)->find();
            $info['Test Name'] = $Objtest->testname_c;
            if ($Objtest->remark_c != null)
                $info['Remarks'] = $Objtest->remark_c;
            else
                $info['Remarks'] = "";
            die(json_encode($info));
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}