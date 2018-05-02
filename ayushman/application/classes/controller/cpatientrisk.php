<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Cpatientrisk extends Controller{
  public function action_view(){
    try{
      $patient_id = $this->request->post('patient_id');
      $app_id = $this->request->post('app_id');
      $content = $this->get_content($patient_id, $app_id);
      $this->response->body($content);
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_addRisk(){
    try{
      if($_POST['risk_id']){
        $risk_object = ORM::factory('patientriskfactor')->where('id', '=', $_POST['risk_id'])->find();
      }
      else{
        $risk_object = ORM::factory('patientriskfactor');
      }
      $risk_object->refpatientsid_c = $_POST['patient_id'];
      $risk_object->refappointmentid_c = $_POST['app_id'];
      $risk_object->refwriterid_c = Auth::instance()->get_user()->id;
      $risk_object->risktext_c = $_POST['risk_text'];
      $risk_object->save();
      $content = $this->get_content($_POST['patient_id'], $_POST['app_id']);
      echo $content;
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  private function get_content($patient_id, $app_id){
    try{
      $patient_risks_obj = ORM::factory('patientriskfactor')->where('refpatientsid_c', '=', $patient_id)->find_all()->as_array();
      $writer_obj = Auth::instance()->get_user();
      $all_other_editor_ids = array();
      foreach($patient_risks_obj as $patient_risk_obj){
        $other_editor_id = $patient_risk_obj->refwriterid_c;
        if($other_editor_id != $writer_obj->id){
          array_push($all_other_editor_ids, $other_editor_id);
        }
      }
      $all_other_editors_info = array();
      if(count($all_other_editor_ids) > 0){
        $all_other_editors_obj = ORM::factory('user')->where('id', 'in', $all_other_editor_ids)->find_all();
        foreach($all_other_editors_obj as $other_editor_obj){
          $all_other_editors_info[$other_editor_obj->id] = "Dr. $other_editor_obj->Firstname_c $other_editor_obj->lastname_c";
        }
      }
      $content = View::factory('vpatientrisk');
      $content->bind('patient_risks_obj', $patient_risks_obj);
      $content->bind('patient_id', $patient_id);
      $content->bind('app_id', $app_id);
      $content->bind('writer_obj', $writer_obj);
      $content->bind('all_other_editors_info', $all_other_editors_info);
      return($content);
    }
    catch(Exception $e) { throw new Exception($e); }
  }
  public function action_delete(){
    try{
      $risk_id = $_GET['risk_id'];
      $risk_object = ORM::factory('patientriskfactor')->where('id', '=', $risk_id)->find();
      $risk_object->delete();
    }
    catch(Exception $e) { throw new Exception($e); }
  }
}
