<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patmedicalproblem extends kohana_Ayushmanorm {
  protected $_table_name = 'patmedicalproblems';

  public function get_past_diseases_ids($patient_user_id){
    $diseases = $this->where('ref_patientid_c','=',$patient_user_id)->where('status_c','=','2')->find_all();
    $response=array();
    if($diseases != NULL){
      foreach($diseases as $disease){
    	  array_push($response, $disease->disease_c);
    	}
    }
    return($response);
  }

  public function get_past_diseasesinfo($patient_user_id){
    $diseases = $this->where('ref_patientid_c','=',$patient_user_id)->find_all();
    $response=array();
    if($diseases != NULL){
      foreach($diseases as $disease){
    	  array_push($response, array($disease->disease_c,$disease->remark_c,$disease->status_c));
    	}
    }
    return($response);
  }

	public function save_pastdiseases($patient_id, $pastdiseases){
		 $diseases=ORM::factory('patmedicalproblem')->where('ref_patientid_c','=',$patient_id)->find_all();
			if(count($diseases)>0){
				foreach($pastdiseases as $patdisease){
					 $disease=ORM::factory('patmedicalproblem')->where('ref_patientid_c','=',$patient_id)->where('disease_c','=',$patdisease[2])->find();
					if($disease->disease_c){
						if($patdisease[0]=='No'){
							$disease->status_c='1';			
						}
						else if($patdisease[0]=='Yes'){
							$disease->status_c='2';			
						}
						else{
							$disease->status_c='0';			
						}
						$disease->remark_c=$patdisease[1];
						$disease->save();
					}		
					else{
						$obj_patmedicalproblem=new Model_Patmedicalproblem;
						$obj_patmedicalproblem->ref_patientid_c=$patient_id;
						if($patdisease[0]=='No'){
							$obj_patmedicalproblem->status_c='1';			
						}
						else if($patdisease[0]=='Yes'){
							$obj_patmedicalproblem->status_c='2';			
						}
						else{
							$obj_patmedicalproblem->status_c='0';			
						}
						$obj_patmedicalproblem->disease_c=$patdisease[2];			
						$obj_patmedicalproblem->remark_c=$patdisease[1];
						$obj_patmedicalproblem->save();
						}
					}				
			}
			else{
				 for($i=0;$i<count($pastdiseases);$i++){
					$obj_patmedicalproblem=new Model_Patmedicalproblem;
					$obj_patmedicalproblem->ref_patientid_c=$patient_id;
					if($pastdiseases[$i][0]=='No'){
						$obj_patmedicalproblem->status_c='1';			
					}
					else if($pastdiseases[$i][0]=='Yes'){
						$obj_patmedicalproblem->status_c='2';			
					}
					else{
						$obj_patmedicalproblem->status_c='0';			
					}
					$obj_patmedicalproblem->disease_c=$pastdiseases[$i][2];			
					$obj_patmedicalproblem->remark_c=$pastdiseases[$i][1];
					$obj_patmedicalproblem->save();
				}	
			}
	}

	
	public function get_diseases_history_new($alldiseases,$patient_user_id){
		  $response = array();
		  $pastdiseases = $this->where('ref_patientid_c','=',$patient_user_id)->find_all();
		 if(count($pastdiseases)>0){
			foreach($alldiseases as $disease){
		 		$item = ORM::factory('patmedicalproblem')->where('disease_c','=',$disease[1])->where('ref_patientid_c','=',$patient_user_id)->find();
				if($item->disease_c){
			   	 	array_push($response,array($disease[0],$item->remark_c,$item->status_c));
				}
				else{
			   	 	array_push($response,array($disease[0],'','0'));
				}
			}
		}
		else{
			foreach($alldiseases as $disease){
			   	 	array_push($response,array($disease[0],'','0'));
			}
		}
	  	return($response);
	}
}