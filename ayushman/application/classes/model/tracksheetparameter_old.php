<?php defined('SYSPATH') or die('No direct script access.');
class Model_Tracksheetparameter extends kohana_AyushmanORM {
  protected $_table_name = 'tracksheetparameters';	
  public function delete_all($tracker_id){
    $values = $this->where('refsheetid_c', '=', $tracker_id)->find_all();
    foreach($values as $value){
      $value->delete();
    }
  }
  public function update_tracker_parameters($tracker_id, $parameter_details){
    $this->delete_all($tracker_id);
    foreach($parameter_details as $parameter_detail){
	  $value_object = new $this;
	  $value_object->refsheetid_c = $tracker_id;  
	  $value_object->refparameterid_c = $parameter_detail['param_id'];
	  $value_object->parametername_c = $parameter_detail['param_name'];  
	  $value_object->save();
    }
  }
  public function get_all_parameters($tracker_id){
    $response = array();
    $tracker_params = $this->where('refsheetid_c', '=', $tracker_id)->find_all();
    foreach($tracker_params as $track_param){
      array_push($response, $track_param->parametername_c);
    }
    return($response);
  }
  public function gettrackerparameterslist($tracker_id){
    $response = array();
    $tracker_params = $this->where('refsheetid_c', '=', $tracker_id)->find_all();
  	if(isset($tracker_params)){
	    foreach($tracker_params as $track_param){
    		$parameterunitsviews=ORM::factory('parameterunitsview')->where('paraid','=',$track_param->refparameterid_c)->find();
  	    	array_push($response, $parameterunitsviews->parametername);
  	 	}
    }
    return($response);
  }
}


/*

delimiter $$

CREATE TABLE `tracksheetparameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refsheetid_c` int(11) DEFAULT NULL,
  `refparameterid_c` int(11) DEFAULT NULL,
  `parametername_c` varchar(45) DEFAULT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1$$


*/