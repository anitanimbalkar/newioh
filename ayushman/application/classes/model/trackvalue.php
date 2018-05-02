<?php defined('SYSPATH') or die('No direct script access.');
class Model_Trackvalue extends kohana_AyushmanORM {
  protected $_table_name = 'trackvalues';	
  public function delete_all($tracker_id){
    $values = $this->where('refsheetid_c', '=', $tracker_id)->find_all();
    foreach($values as $value){
      $value->delete();
    }
  }
  public function update_tracker_values($tracker_id, $tracker_data, $parameter_ids){
    $this->delete_all($tracker_id);
    foreach($tracker_data as $data){
      if($data){
        $time_stamp = strtotime($data[0]);
	unset($data[0]);
        foreach($data as $key=>$value){
          if(isset($parameter_ids[$key])){
            $parameter_name = ($parameter_ids[$key]['param_name']);
	    $parameter_id = $parameter_ids[$key]['param_id'];
	    if($value && $time_stamp != ""){
	      $value_object = new $this;
	      $value_object->refparemeterid_c = $parameter_id;  
	      $value_object->parametername_c = $parameter_name;  
	      $value_object->refsheetid_c = $tracker_id;  
	      $value_object->value_c = $value;  
	      $value_object->timestamp_c = $time_stamp;  
	      $value_object->save();
	    }  
	  }	  
	}  
      }
    }
    die;
  }
  public function add_tracker_record($tracker_id, $data, $parameter_ids){
      if($data){
        $time_stamp = ($data[0]);
	unset($data[0]);
        foreach($data as $key=>$value){
          if(isset($parameter_ids[$key])){
            $parameter_name = ($parameter_ids[$key]['param_name']);
	    $parameter_id = $parameter_ids[$key]['param_id'];
	    if($value && $time_stamp != ""){
	      $value_object = new $this;
	      $value_object->refparemeterid_c = $parameter_id;  
	      $value_object->parametername_c = $parameter_name;  
	      $value_object->refsheetid_c = $tracker_id;  
	      $value_object->value_c = $value;  
	      $value_object->timestamp_c = $time_stamp;  
	      $value_object->save();
	    }  
	  }	  
	}  
    }
  }
}


/*

delimiter $$

CREATE TABLE `trackvalues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refparemeterid_c` int(11) NOT NULL,
  `parametername_c` varchar(45) NOT NULL,
  `refsheetid_c` int(11) NOT NULL,
  `value_c` varchar(45) DEFAULT NULL,
  `timestamp_c` bigint(20) NOT NULL,
  `refeditorid_c` int(11) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1$$

*/