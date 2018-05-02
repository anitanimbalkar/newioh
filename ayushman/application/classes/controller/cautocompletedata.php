<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cautocompletedata extends Controller {

	public function action_retrievetestparameter()
	{
		//$strQuery=$_POST['query'];
		$strSearchText=$_POST['term'];
		if(isset($_POST['paralist'])){
			$paralist=$_POST['paralist'];
			$paralist=json_decode($paralist);
			$condition='';
			$valuecondition = '';
			//var_dump($paralist);
			//die;
			if(count($paralist)>1){
				foreach($paralist as $para){
					$paraarray=array();
					$paraloinc='';
					$paraloinc=ORM::factory('parameterunitsview')->where('parametername','=',$para)->find()->loinccode;
					//$aliasloinc='';
					if(!$paraloinc){
						$paraloinc=ORM::factory('parameterunitsview')->where('parametername','=',$para)->find()->alias;
					}

				//var_dump($paraloinc);
					if($paraloinc){
						$loinccodes=ORM::factory('parameterunitsview')->where('loinccode','=',$paraloinc)->find_all();
						if(count($loinccodes)){
							foreach($loinccodes as $loinc){
								array_push($paraarray,$loinc->parametername);
							}
						}
						$aliases=ORM::factory('parameterunitsview')->where('alias','=',$paraloinc)->find_all();
						if(count($aliases)){
							foreach($aliases as $alias){
								array_push($paraarray,$alias->parametername);
							}
						}
						if(count($paraarray)){
							$paracount=1;
							$condition=$condition.' and ';
							$valuecondition=$valuecondition. ' and ';
							foreach($paraarray as $para){
								$condition=$condition.' A.parametername != '.'"'.$para.'"';
								$valuecondition=$valuecondition.' value != '.'"'.$para.'"';
								
								if(count($paraarray)!=$paracount){
									$condition=$condition.' and ';
									$valuecondition=$valuecondition.' and ';
									
									$paracount++;
								}
							}
						}							
					}
				}//foreach
			}
		}//if(isset)
	//	var_dump($condition);
	//	die;

	//	$query="select parametername  as value,paraid from parameterunitsviews group by(parametername) having  parametername";
	//	$query="select  parametername  as value,paraid,isverified from parameterunitsviews group by(parametername) having  parametername like '$strSearchText%' ".$valuecondition." and isverified=1 union select  parametername  as value,paraid,isverified from parameterunitsviews group by(parametername) having  parametername like '%$strSearchText%' ".$condition."  and isverified=1 union select parametername  as value,paraid,isverified from parameterunitsviews where alias IN( select loinccode from parameterunitsviews group by(parametername) having  parametername like '$strSearchText%' union select loinccode from parameterunitsviews group by(parametername) having  parametername like '%$strSearchText%')  ".$condition." limit 20";
		$query="select  parametername  as value,paraid,isverified from parameterunitsviews group by(parametername) having  value like '$strSearchText%' ".$valuecondition." and isverified=1 
			union select parametername  as value,paraid,isverified from parameterunitsviews group by(parametername) having  value like '%$strSearchText%' ".$valuecondition."  and isverified=1 
			union select A.parametername as value,A.paraid,A.isverified from parameterunitsviews A, parameterunitsviews B where A.alias = B.loinccode and B.parametername like '$strSearchText%' ".$condition." and A.isverified=1
			union select A.parametername as value,A.paraid,A.isverified from parameterunitsviews A, parameterunitsviews B where A.alias = B.loinccode and B.parametername like '%$strSearchText%' ".$condition." and A.isverified=1 limit 20";
		//var_dump($query);
		//die;	
		//var_dump($paralist);
		$result = Db::query(Database::SELECT, $query)
			 ->execute()
			  ->as_array();
		//var_dump($result);
		//die;	

		//$objAutoCompleteData = new Model_Mautocompletedata;
		//$data = $objAutoCompleteData->retrievemiddle($query, $strSearchText);
		$this->response->body(json_encode($result));
	}

	public function action_retrieve()
	{
		$strQuery=$_GET['query'];
		$strSearchText=$_GET['term'];
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
	}
	public function action_searchdata()
	{
		$strSearchText=$_GET['term'];
		$strQuery="Select id as id, testname_c as value from investigations where testname_c";
		
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
	}
	public function action_searchincidents()
	{
	$userid = Auth::instance()->get_user();
		$objincident = ORM::factory('incident')
			->join('appointments')
			->on('appointments.refincidentid_c','=','incident.id')
			->where('refappfromid_c','=',$userid)
			->find_all();
		$result = $objincident;
		$previnciarray=array();
		foreach($result as $res)
		{
			$incidentdt="";
			if(! empty( $res->incidentdate_c))
			$incidentdt= date('Y-m-d',strtotime( $res->incidentdate_c));
			$res->incidentsname_c." ".$incidentdt;
			//$previnciarray[$res->id]= $res->incidentsname_c." ".$incidentdt;
			$temp['id']=$res->id;
			$temp['value']=$res->incidentsname_c." ".$incidentdt;
			array_push($previnciarray,$temp);
		}
		//var_dump($previnciarray);
		$this->response->body(json_encode($previnciarray));
		/*$strSearchText=$_GET['term'];
		$strQuery="Select incidents.id as id, incidentsname_c as value from incidents join appointments where refappfromid_c = 586 and incidentsname_c ";
		
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
		*/
	}
	public function action_retrieveEncoded()
	{
		$strQuery=$_GET['query'];;
		$strSearchText=$_GET['term'];
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
	}
	public function action_retrievemiddle()
	{
		$strQuery=$_GET['query'];;
		$strSearchText=$_GET['term'];
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
	}
	
	public function action_doctors(){
		
		$strQuery="SELECT concat(users.firstname_c,' ', users.lastname_c, ' (',users.id,')') as value, doctors.id as id  FROM doctors 
join users on users.id = doctors.refdoctorsid_c
where activationstatus_c = 'active' and concat(users.firstname_c,' ', users.lastname_c, ' (',users.id,')') ";
		$strSearchText=$_GET['term'];
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievemiddle($strQuery, $strSearchText);
		$this->response->body(json_encode($data));
	}
	
	public function action_retrievedata()
	{
		$strcolnm=$_GET['colnm'];;
		$strtablenm=$_GET['tablenm'];
		$strSearchText=$_GET['term'];
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrievedata($strcolnm,$strtablenm, $strSearchText);
		$this->response->body(json_encode($data));
	}public function action_retrieveall()
	{
		$strQuery=$_GET['query'];;
		
		$objAutoCompleteData = new Model_Mautocompletedata;
		$data = $objAutoCompleteData->retrieveall($strQuery);
		$this->response->body(json_encode($data));
	}
} // End Welcome
