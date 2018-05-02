<?php defined('SYSPATH') or die('No direct script access.');
class Model_Tracksheettemplate extends kohana_AyushmanORM {
  protected $_table_name = 'tracksheettemplate';	
  public function get_all_templates($doctor_user_id){
    $templates = $this->where('refownerid_c', '=', $doctor_user_id)->find_all();
    $response = array();
    foreach($templates as $template){
		$temp = array();
		$temp['id'] = $template->id;
		$temp['name'] = ucfirst($template->templatename_c);
		$temp['isheader'] = $template->is_header_c;
		$temp['headerid'] = $template->headerid_c;
		$temp['parameters'] = $template->parameters_c;

		if($temp['isheader'] == 1){
			$temp['latestvalues'] = array();
			$ids = explode(",", $temp['parameters']);
			
			foreach($ids as $id){
				if($id != ''){
					$values = array();
					$uni_Tracker = new helper_Universaltracker();
					$latestvalue = $uni_Tracker->getLatestParametervalue($id);
					$values['id'] = $id;
					$values['name'] = $uni_Tracker->getParameterName($id);
					$values['value'] = $latestvalue;
					array_push($temp['latestvalues'],$values);	
				}
				
			}
		}
		array_push($response, $temp);
    }
    return $response;
  }
  public function add_template($name, $parameters, $owner_id){
    $template = new $this;
    $template->templatename_c = $name;
    $template->parameters_c = $parameters;
    $template->refownerid_c = $owner_id;
    return($template->save()->id);
  }
}


/*
delimiter $$

CREATE TABLE `tracksheettemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `templatename_c` varchar(45) NOT NULL,
  `parameters_c` varchar(45) NOT NULL,
  `refownerid_c` int(11) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1$$

*/