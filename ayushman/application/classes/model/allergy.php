<?php defined('SYSPATH') or die('No direct script access.');
class Model_Allergy extends kohana_Ayushmanorm {
	protected $_table_name = 'allergies';

	public function save_allergy($patient_id,$allergies){
		try{
   		 	$allergy = ORM::factory('allergy')->where('refallergypatientsid_c', '=', $patient_id)->find_all();
   		 	$allergy_type=ORM::factory('allergytype')->find_all(); 
   		 	if(count($allergy)>0){
				foreach($allergies as $item){
		   		 	$allergy = ORM::factory('allergy')->where('refallergypatientsid_c', '=', $patient_id)->where('refallergytypeid_c','=',$item[1])->find();
					if($allergy->refallergytypeid_c){
		   		        $allergy->refallergypatientsid_c = $patient_id;
      					$allergy->allergy_c = $item[0];
      		  			$allergy->refallergytypeid_c = $item[1];
      		  			$allergy->save();
					}
					else{
	   		 			$object_allergy=new Model_Allergy;
			   	        $object_allergy->refallergypatientsid_c = $patient_id;
      					$object_allergy->allergy_c = $item[0];
      			  		$object_allergy->refallergytypeid_c = $item[1];
      		  			$object_allergy->save();
					}
				}   		 	
   		 	}
   		 	else{
   		 		foreach($allergies as $item){
   		 			$object_allergy=new Model_Allergy;
		   	        $object_allergy->refallergypatientsid_c = $patient_id;
      				$object_allergy->allergy_c = $item[0];
      		  		$object_allergy->refallergytypeid_c = $item[1];
      		  		$object_allergy->save();
   		 		}
   		 	}
    	}catch(Exception $e){throw new Exception($e);}
	}	
	public function get_allergies($patient_id){
		try{
   		 	 $allergy = ORM::factory('allergy')->where('refallergypatientsid_c', '=', $patient_id)->find_all();
   		 	 $allergytypes=ORM::factory('allergytype')->find_all();
   		 	 $response=array();
   		  	if(count($allergy)>0){
   		  		foreach($allergytypes as $item){
		   		 	 $allergy = ORM::factory('allergy')->where('refallergypatientsid_c', '=', $patient_id)->where('refallergytypeid_c','=',$item->id)->find();
	   		 	 	if($allergy->refallergytypeid_c){
	   		  			array_push($response,array($allergy->allergy_c,$allergy->refallergytypeid_c));
   		  			}
   		  			else{
	   		  			array_push($response,array('',$item->id));
   		  			}
   		  		}
   		  	}
   		  	else
   		  	{
   		  		foreach($allergytypes as $type){
   		  			array_push($response,array('',$type->id));
				}   		  	
   		  	}
	  		return($response);
    	}catch(Exception $e){throw new Exception($e);}
	}	

}