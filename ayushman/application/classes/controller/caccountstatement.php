<?php defined('SYSPATH') or die('No direct script access.');
include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/classes/helper/export.php');
class Controller_Caccountstatement extends Controller_Ctemplatewithmenu  {

    private $album_model;

    public function action_view()
    {
        $errors = array();
        $messages = array();
        $obj_user = Auth::instance()->get_user();
        if ($obj_user != null){
            if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
                $url = 'vdoctortemplate';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
                $url = 'vuser/vpatient/vaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
        }else{
            throw new Exception("You are logged out from the system, Please login again.");
        }
        $this->displaystatement($errors, $messages, $url);
    }

    public function action_viewFootable()
    {
        $errors = array();
        $messages = array();
        $obj_user = Auth::instance()->get_user();
        if ($obj_user != null){
            if ($obj_user->has('roles', ORM::factory('role', array('name' => 'doctor')))){
                $url = 'vdoctortemplate';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'patient')))){
                $url = 'vuser/vpatient/vaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'pathologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'radiologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'physiologist')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
            else if ($obj_user->has('roles', ORM::factory('role', array('name' => 'ipdward')))){
                $url = 'vuser/vpathologist/vdiagnosticaccountstatement';
            }
        }else{
            throw new Exception("You are logged out from the system, Please login again.");
        }
        $this->displaystatement($errors, $messages, $url);
    }




    public function action_getstatements()
    {
        $objAccounts	= ORM::factory('billingaccount');
        $objAccounts 	= $objAccounts->where('refaccountuserid_c','=',Auth::instance()->get_user()->id)->mustFind();
        $whereclause	= "[accountcode,=,".$objAccounts->accountcode_c."][transactionstatus,=,completed]";
        if($_POST)
        {
            $whereclause 	= $whereclause.'[timestamp,<,'.strtotime($_POST['todate']).'][timestamp,>,'.strtotime($_POST['fromdate']).']';
            if($_POST['transactiontype'] != 'Select')
                $whereclause 	= $whereclause.'[type,=,'.$_POST['transactiontype'].']';
            if($_POST['description'] != 'Select')
                $whereclause 	= $whereclause.'[description,=,'.$_POST['description'].']';
            if($_POST['benificiary'] != '')
                $whereclause 	= $whereclause.'[benificiery,like,%'.$_POST['benificiary'].'%]';
        }


        $columns = 'statementcode,datetime,description,benificiery,credit,debit,netbalance';
        //echo $columns;
        //$whereclause = $_GET["whereclause"];
        $groupby = "";

        $page = "1";
        $limit = "15";
        $sidx = "statementcode";
        $sord = 'desc';

        $table = 'statements';
        $jqgriddata=new Model_xjqgridgetdata;
        $result=$jqgriddata->getjsondata($page,$limit,$sidx,$sord,$table,$columns,$whereclause,$groupby);
        $header=$result[0];
        $response=array();
        $temp=array();
        $i=0;
        foreach($result as $res)
        {
            if($i>0)
            {
                $temp[$header[0]]=$res[0];
                $temp[$header[1]]=$res[1];
                $temp[$header[2]]=$res[2];
                $temp[$header[3]]=$res[3];
                $temp[$header[4]]=$res[4];
                $temp[$header[5]]=$res[5];
                $temp[$header[6]]=$res[6];

                array_push($response,$temp);

            }
            $i++;
        }

        echo(json_encode($response));die;



    }

    private function displaystatement($errors, $messages, $url)
    {
        try{
            $content 		= View::factory($url);
            $objAccounts	= ORM::factory('billingaccount');
            $objAccounts 	= $objAccounts->where('refaccountuserid_c','=',Auth::instance()->get_user()->id)->mustFind();
            $whereclause	= "[accountcode,=,".$objAccounts->accountcode_c."][transactionstatus,=,completed]";
            if($_POST)
            {
                $whereclause 	= $whereclause.'[timestamp,<,'.strtotime($_POST['todate']).'][timestamp,>,'.strtotime($_POST['fromdate']).']';
                if($_POST['transactiontype'] != 'Select')
                    $whereclause 	= $whereclause.'[type,=,'.$_POST['transactiontype'].']';
                if($_POST['description'] != 'Select')
                    $whereclause 	= $whereclause.'[description,=,'.$_POST['description'].']';
                if($_POST['benificiary'] != '')
                    $whereclause 	= $whereclause.'[benificiery,like,%'.$_POST['benificiary'].'%]';
            }

            /*START: patient statements  by Pooja Gujarathi*/
            $table = 'statements';
            $columns = 'statementcode,datetime,description,benificiery,credit,debit,netbalance';
            $sord = 'DESC';
            $sortname = 'statementcode';
            $object_patient_statements = new Model_Xjqgridgetdata;
            $result = $object_patient_statements->getfootablejsondata('','',$sortname,$sord,$table,$columns,$whereclause,'');

            $ts = (object)$result;
            $tests_json = array();
            foreach ($ts as $ts1) {
                array_push($tests_json, $ts1);
            }
            $tests_json = json_encode($tests_json);

            /*END: patient statements  by Pooja Gujarathi*/

            $types	= ORM::factory('billingmastertransactiontype')->mustFindAll()->as_array();
            $content->bind('types', $types);
            $content->bind('whereclause', $whereclause);
            $content->bind('result', $result); //by Pooja Gujarathi
            $content->bind('tests_json', $tests_json); //by Pooja Gujarathi
            $this->template->content 	= $content;
        }catch(Exception $e){
            throw new Exception($e);
        }
    }
    public function action_viewadminstatements()
    {
        $arr_accounts = include_once($_SERVER['DOCUMENT_ROOT'].'/ayushman/application/config/accounts.php');
        $obj_user 		= Auth::instance()->get_user();
        $content 		= View::factory('vuser/vadmin/vadminaccountstatement');
        $objAccounts	= ORM::factory('billingaccount');
        $breadcrumb 	= "Home>>Statements";
        $objAccounts 	= $objAccounts->where('refaccountuserid_c','=',$obj_user->id)->find();
        $whereclause	= "[accountcode,=,".ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['collectionaccountuserid'])->find()->accountcode_c."]";

        if($_POST)
        {
            //$whereclause 	= $whereclause.'[datetime,=,date between '.strtotime($_POST['fromdate']).' and '.strtotime($_POST['todate']).']';
            //die($whereclause);
            $whereclause 	= $whereclause.'[timestamp,<,'.strtotime($_POST['todate']).'][timestamp,>,'.strtotime($_POST['fromdate']).']';
            $whereclause	= "[accountcode,=,".ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts[$_POST['accounttype']])->find()->accountcode_c."]";
            if($_POST['transactiontype'] != 'Select')
                $whereclause 	= $whereclause.'[type,=,'.$_POST['transactiontype'].']';
            if($_POST['description'] != 'Select')
                $whereclause 	= $whereclause.'[description,=,'.$_POST['description'].']';
            if($_POST['benificiary'] != '')
                $whereclause 	= $whereclause.'[benificiery,like,%'.$_POST['benificiary'].'%]';
        }
        $types		= ORM::factory('billingmastertransactiontype')->find_all()->as_array();
        $collection = ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['collectionaccountuserid'])->find()->accountcode_c;
        $provision 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['provisionaccountuserid'])->find()->accountcode_c;
        $income 	= ORM::factory('billingaccount')->where('refaccountuserid_c','=',$arr_accounts['ayushmanincomeuserid'])->find()->accountcode_c;
        $content->bind('collection', $collection);
        $content->bind('provision', $provision);
        $content->bind('income',$income);
        $content->bind('types', $types);
        $content->bind('whereclause', $whereclause);
        $this->template->breadcrumb = $breadcrumb;
        $this->template->content 	= $content;
    }

    public function action_export()
    {
        $table = $_GET["table"];
        $columns = $_GET["columns"];
        $whereclause = $_GET["whereclause"];
        $groupby = $_GET["groupby"];
        $sidx = $_GET['sidx'];
        $sord = $_GET['sord'];
        $jqgriddata=new Model_xjqgridgetdata;
        $result=$jqgriddata->exportdata(1,0,$sidx,$sord,$table,$columns,$whereclause,$groupby);
        $date = date_create();
        export::toexcel($result,'ExportToExcel_'.date_timestamp_get($date).'.xls');
    }


}