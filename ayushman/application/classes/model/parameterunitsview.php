<?php defined('SYSPATH') or die('No direct script access.');
class Model_parameterunitsview extends kohana_Ayushmanorm {
	protected $_table_name = 'parameterunitsviews';	

	public function gettrackerparameterunits($trackerid){
		try{
				$responce=array();
				$patientparameters=ORM::factory('patientparameter')->where('reftracksheetid_c','=',$trackerid)->find_all();
				foreach($patientparameters as $patientparameter){
					$parameterunitsview=$this->where('paraid','=',$patientparameter->reftestparameterid_c)->find()->paraid;
					if($parameterunitsview->paraid)
					array_push($response,$parameterunitsview);
				}
			}
		catch(Exception $e){var_dump($e);}
		return $responce;
	}	
}