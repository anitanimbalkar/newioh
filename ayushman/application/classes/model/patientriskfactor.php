<?php defined('SYSPATH') or die('No direct script access.');
class Model_Patientriskfactor extends kohana_AyushmanORM {
  protected $_table_name = 'patientriskfactors';

  public function get_risks($patient_user_id){
    try{
      $risks = $this->where('refpatientsid_c', '=', $patient_user_id)->find_all();
      $array_risks = array();
      foreach($risks as $risk){
        $temp = array();
        $temp['risk_id'] = $risk->id;
        $temp['writer_id'] = $risk->refwriterid_c;
        $temp['risk_text'] = $risk->risktext_c;
        array_push($array_risks, $temp);
        //$array_risks[$risk->id] = $temp;
      }
      return $array_risks;
    }catch(Exception $e){throw new Exception($e);}
  }

  public function delete_risk($risk_id, $user_id){
    try{
      $risk = $this->where('id','=',$risk_id)->where('refwriterid_c','=', $user_id)->find();
      if(!($risk->loaded())){
        throw new HTTP_Exception_400;
      }
      $risk->delete();
    }catch(Exception $e){throw new Exception($e);}
  }

  public function save_risk($patient_user_id, $writer_id, $risk_text, $risk_id){
    try{
    if($risk_id){
      $object = $this->where('id','=',$risk_id)->where('refpatientsid_c','=',$patient_user_id)->where('refwriterid_c','=',$writer_id)->find();
      if(!($object->loaded())){
        throw new HTTP_Exception_400;
      }
    }
    else{
      $object = $this;
      $object->refpatientsid_c = $patient_user_id;
      $object->refwriterid_c = $writer_id;
    }
    $object->risktext_c = $risk_text;
    $id = $object->save();
    return($object->id);
    }catch(Exception $e){throw new Exception($e);}
  }
}

/*

delimiter $$

CREATE TABLE `patientriskfactors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refpatientsid_c` int(11) NOT NULL,
  `refwriterid_c` int(11) NOT NULL,
  `refappointmentid_c` varchar(45) DEFAULT NULL,
  `risktext_c` longtext,
  `createdon_c` varchar(45) DEFAULT NULL,
  `createdby_c` varchar(45) DEFAULT NULL,
  `editedon_c` varchar(45) DEFAULT NULL,
  `editedby_c` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1$$

*/