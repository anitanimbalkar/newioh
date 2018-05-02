<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patientimmunizations extends kohana_Ayushmanorm {
	protected $_table_name = 'patientimmunizations';
	protected $_has_many = array('immunizationmasters' => array('model' => 'immunizationmaster', 'foreign_key' => 'refpatimmunizationid_c'));
	public function create_row(array $data) 
	{ 
		$this->values($data); 
		$this->save(); 
	}

	public function get_immunization_ids($patient_id){
	  $immunizations = $this->where('refpatimmpatientsid_c','=',$patient_id)->where('status_c','=','2')->find_all();
	  $response = array();
	  foreach($immunizations as $imm){
	    array_push($response, $imm->refpatimmunizationid_c);
	  }
	  return $response;
	}

	public function save_immunization($patient_id, $patimmunization){
		 $immunizations=ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->find_all();
			if(count($immunizations)>0){
				foreach($patimmunization as $immunization){
					 $obj_immunization=ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->where('refpatimmunizationid_c','=',$immunization[2])->find();
					if($obj_immunization->refpatimmunizationid_c){
						if($immunization[0]=='No'){
							$obj_immunization->status_c='1';			
							$obj_patimmunization->datewhentaken_c= null;
						}
						else if($immunization[0]=='Yes'){
							$obj_immunization->status_c='2';			
							$obj_immunization->datewhentaken_c=date('Y-m-d',strtotime($immunization[1]));
						}
						else{
							$obj_immunization->status_c='0';			
							$obj_patimmunization->datewhentaken_c= null;
						}
						$obj_immunization->save();
					}		
					else{
						$obj_patimmunization=new Model_Patientimmunizations;
						$obj_patimmunization->refpatimmpatientsid_c=$patient_id;
						if($immunization[0]=='No'){
							$obj_patimmunization->status_c='1';			
							$obj_patimmunization->datewhentaken_c= null;
						}
						else if($immunization[0]=='Yes'){
							$obj_patimmunization->status_c='2';			
							$obj_patimmunization->datewhentaken_c=date('Y-m-d',strtotime($immunization[1]));
						}
						else{
							$obj_patimmunization->status_c='0';			
							$obj_patimmunization->datewhentaken_c= null;
						}
						$obj_patimmunization->refpatimmunizationid_c=$immunization[2];			
						$obj_patimmunization->save();
						}
					}				
			}
			else{
				 for($i=0;$i<count($patimmunization);$i++){
					$obj_patimmunization=new Model_Patientimmunizations;
					$obj_patimmunization->refpatimmpatientsid_c=$patient_id;
					if($patimmunization[$i][0]=='No'){
						$obj_patimmunization->status_c='1';			
						$obj_patimmunization->datewhentaken_c= null;
					}
					else if($patimmunization[$i][0]=='Yes'){
						$obj_patimmunization->status_c='2';			
						$obj_patimmunization->datewhentaken_c=date('Y-m-d',strtotime($patimmunization[$i][1]));
					}
					else{
						$obj_patimmunization->status_c='0';			
						$obj_patimmunization->datewhentaken_c= null;
					}
					$obj_patimmunization->refpatimmunizationid_c=$patimmunization[$i][2];			
					$obj_patimmunization->save();
				}	
			}	
	}

	public function get_immunization_details($patient_id,$allimmunizations){
		$response=array();
		$immunizations = ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->find_all();
		if(count($immunizations)>0){
			foreach($allimmunizations as $immunization){
				$immunizations = ORM::factory('patientimmunizations')->where('refpatimmpatientsid_c','=',$patient_id)->where('refpatimmunizationid_c','=',$immunization[1])->find();
				if($immunizations->refpatimmunizationid_c){
					array_push($response,array($immunization[0],$immunizations->datewhentaken_c,$immunizations->status_c));
				}
				else{
					array_push($response,array($immunization[0],'','0'));
				}
			}
		}
		else{
			foreach($allimmunizations as $immunization){
				array_push($response,array($immunization[0],'','0'));
			}
		}
		return($response);
	}
}

/*

delimiter $$

CREATE TABLE `patientimmunizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refpatimmpatientsid_c` int(11) NOT NULL,
  `refpatimmunizationid_c` int(11) NOT NULL,
  `ageatImmunization_c` varchar(20) DEFAULT NULL,
  `datewhentaken_c` date DEFAULT NULL,
  `remark_c` varchar(150) DEFAULT NULL,
  `status_c` varchar(45) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `refpatimmpatientsid_c` (`refpatimmpatientsid_c`),
  KEY `refpatimmunizationid_c` (`refpatimmunizationid_c`),
  CONSTRAINT `refpatimmpatientsid_c` FOREIGN KEY (`refpatimmpatientsid_c`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `refpatimmunizationid_c` FOREIGN KEY (`refpatimmunizationid_c`) REFERENCES `immunizationmasters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8$$

*/