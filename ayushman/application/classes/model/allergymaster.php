<?php defined('SYSPATH') or die('No direct script access.');
class Model_Allergymaster extends kohana_Ayushmanorm {
	protected $_table_name = 'allergymasters';
	public function get_foodallergy(){
		try{
 			$response=array();
 			$foodallergy=$this->where('type_c','=','Food')->where('active_c','=',1)->find_all();
 			
 			foreach($foodallergy as $allergy){
 				array_push($response,$allergy->Allergyname_c);
 			}
 			return $response;
    	}catch(Exception $e){throw new Exception($e);}
	}	
	public function get_drugallergy(){
		try{
 			$response=array();
 			$drugallergy=$this->where('type_c','=','Drug')->where('active_c','=',1)->find_all();
 			
 			foreach($drugallergy as $allergy){
 				array_push($response,$allergy->Allergyname_c);
 			}
 			return $response;
    	}catch(Exception $e){throw new Exception($e);}
	}	
	public function get_plantallergy(){
		try{
 			$response=array();
 			$plantallergy=$this->where('type_c','=','Other')->where('active_c','=',1)->find_all();
 			
 			foreach($plantallergy as $allergy){
 				array_push($response,$allergy->Allergyname_c);
 			}
 			return $response;
    	}catch(Exception $e){throw new Exception($e);}
	}	
	public function get_animalallergy(){
		try{
 			$response=array();
 			$animalallergy=$this->where('type_c','=','Animal')->where('active_c','=',1)->find_all();
 			
 			foreach($animalallergy as $allergy){
 				array_push($response,$allergy->Allergyname_c);
 			}
 			return $response;
    	}catch(Exception $e){throw new Exception($e);}
	}	
	public function check_allergyexist($str){
		try{
 			$allergies=$this->find_all();
 			foreach($allergies as $allergy){
				if($allergy->Allergyname_c==$str){
					return(1);
				}
 			}
 			return(0);
    	}catch(Exception $e){throw new Exception($e);}
	}	
	
}