<?php defined('SYSPATH') or die('No direct script access.');
class Model_Tracksheet extends kohana_AyushmanORM {
  protected $_table_name = 'tracksheets';
  public function get_all_trackers($patient_user_id){
    $trackers = $this->where('refpatientid_c','=',$patient_user_id)->order_by('createdtime_c','Desc')->find_all()->as_array();
    $response = array();
    foreach($trackers as $tracker){
      $temp = $this->prepare_array($tracker);
      array_push($response, $temp);
    }
    return $response;
  }
  public function get_tracker($tracker_id){
    $tracker = $this->where('id','=',$tracker_id)->find();
    return ($this->prepare_array($tracker));
  }
  private function prepare_array($tracker){
    $temp = array();
    $temp['id'] = $tracker->id;
    $temp['patient_id'] = $tracker->refpatientid_c;
    $temp['incident_id'] = $tracker->refincidentid_c;
    $temp['name'] = ucfirst($tracker->tracksheetname_c);
	$temp['headerid'] = $tracker->headerid_c;
    $user=new Model_User;
    $userdetais=$user->get_info($tracker->refcreaterid_c);
    $temp['owner_name'] = 'Dr '.$userdetais['name'];
    $temp['owner_id'] = $tracker->refcreaterid_c;
    $temp['date'] = $tracker->createdon_c;
    if($tracker->parameterstartdate_c){
  		 $temp['parameterstartdate'] = date("d-M-Y", $tracker->parameterstartdate_c);
    }
    else{
    	 $time = strtotime("-1 year", time());
  		 $temp['parameterstartdate'] = date("d-M-Y", $time);
    }
	$temp['parametertodate'] = date("d-M-Y");
    return $temp;  
  }
  public function delete_tracker($tracker_id){
    $tracker = $this->where('id','=',$tracker_id)->find();
    $tracker->delete();
  }
}

/*

delimiter $$

CREATE TABLE `tracksheets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refpatientid_c` int(11) NOT NULL,
  `refincidentid_c` int(11) DEFAULT NULL,
  `tracksheetname_c` varchar(45) DEFAULT NULL,
  `refcreaterid_c` int(11) NOT NULL,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1$$

*/