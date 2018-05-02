<?php defined('SYSPATH') or die('No direct script access.');
class Model_Trackparameter extends kohana_AyushmanORM {
  protected $_table_name = 'trackparameters';	
  public function get_parameter_ids($parameters){
    $response = array();
    foreach($parameters as $key=>$parameter){
      //$parameter = strtolower($parameter);
      if($parameter != "" && strtolower($parameter) != "date"){
        $curr_object = new $this;
        $param_object = $curr_object->where('parametername_c','=',$parameter)->find();
        if(!$param_object->loaded()){
	  $param_object->parametername_c = $parameter;
	  $param_id = $param_object->save()->id;
        }
        else{
          $param_id = $param_object->id;
        }
        $temp = array();
        $temp['param_name'] = $parameter;
        $temp['param_id'] = $param_id;
        $response[$key] = $temp;
      }	
    }
    return $response;
  }
}


/*

delimiter $$

CREATE TABLE `trackparameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametername_c` varchar(45) NOT NULL,
  `isverified_c` int(11) NOT NULL DEFAULT '0',
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1$$

*/