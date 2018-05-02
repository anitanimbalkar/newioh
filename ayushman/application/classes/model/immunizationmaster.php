<?php defined('SYSPATH') or die('No direct script access.');
class Model_Immunizationmaster extends kohana_Ayushmanorm {
	protected $_table_name = 'immunizationmasters';
	
	public function get_immunizations($immune_ids){
	if(count($immune_ids)> 0){
	  $immunes = $this->where('id','in',$immune_ids)->find_all();
 	  $response = array();
	  foreach($immunes as $imm){
	    array_push($response, $imm->Immunizationname_c);
	  }
	}
	else{
	  $response = array();
	}
	  return $response;
	}

	public function get_all_immunizations(){
		$immunizations=ORM::factory('immunizationmasters')->find_all();
		$response = array();
			if(count($immunizations)>0){
				foreach($immunizations as $immunization){
					array_push($response,array($immunization->Immunizationname_c,$immunization->id));
				}	
			}
	  return($response);
	}
}

/*

delimiter $$

CREATE TABLE `immunizationmasters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Immunizationname_c` varchar(255) NOT NULL,
  `recommendedage_c` varchar(20) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8$$

*/