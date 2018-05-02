<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Ctracksheet extends Controller_Ctemplatewithmenu{
  public function action_view(){
    try{
      $object_user = new Model_User;
      $user = $object_user->get_user_info();
      switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
	  if(!(isset($_GET['app_id']))){
	    throw new HTTP_Exception_400;
	  }  
	  $response = array();
          $app_id = $_GET['app_id'];
	  $tracker_id = null;
	  if(isset($_GET['tracker_id'])){
	    $tracker_id = $_GET['tracker_id'];
	    $tracker_data = $this->get_tracker_values($tracker_id);
	    $tracker_object = new Model_Tracksheet;
	    $tracker_info = $tracker_object->get_tracker($tracker_id);
	    $response['tracker_data'] = $tracker_data;
	    if($user['id'] != $tracker_info['owner_id']){
	      $owner_info = $object_user->get_info($tracker_info['owner_id']);
	      $response['owner_info'] = $owner_info['name'];
	    }  
	    echo json_encode($response);die;
	  }
	  $app_object = new Model_Appointment;
	  $app_info = $app_object->get_appointment_info($app_id);
	  $tracker_object = new Model_Tracksheet;
	  $all_trackers = $tracker_object->get_all_trackers($app_info['refappfromid_c']);
	  $current_tracker_id = $this->find_by_incidentid($all_trackers, $app_info['refincidentid_c']);
	  $template_object = new Model_Tracksheettemplate;
	  $templates = $template_object->get_all_templates($user['id']);
	  $response['tracker_list'] = $all_trackers;
	  $response['template_list'] = $templates;
	  $response['current_tracker_id'] = $current_tracker_id;
          if($current_tracker_id){
	    $current_tracker_data = $this->get_tracker_values($current_tracker_id);
	    $response['current_tracker_data'] = $current_tracker_data;
	  }
	  $result['tracker_info'] = $response;
	  echo(json_encode($result));die;
	  break;
	case 'DELETE':
          $DELETE = Request::current()->query();
          if(!(isset($DELETE['tracker_id']))){
            throw new HTTP_Exception_400;
          }
	  $tracker_id = $DELETE['tracker_id'];
	  $this->delete($tracker_id);
	  die;
	  break;
	case 'POST':
	  if(!(isset($_POST['tracker_id']) && isset($_POST['tracker_data']) && isset($_POST['tracker_cols'])) && isset($_POST['app_id'])){
	    throw new HTTP_Exception_400;
	  }
	  $tracker_id = $_POST['tracker_id'];
	  $tracker_data = json_decode($_POST['tracker_data']);
	  $tracker_cols = json_decode($_POST['tracker_cols']);
	  $app_id = $_POST['app_id'];
	  if($tracker_id != 'null'){
            $tracker_param_object = new Model_Trackparameter;
  	    $parameter_ids = $tracker_param_object->get_parameter_ids($tracker_cols);
	    $tracker_val_object = new Model_Trackvalue;
	    $tracker_val_object->update_tracker_values($tracker_id, $tracker_data, $parameter_ids);
	    die;
	  }
	  else{
	    if(isset($_POST['template_id'])){
	      $new_tracker_id = $this->createFromTemplate($app_id, $_POST['template_id']);
	    }
	    else{
	      $new_tracker_id = $this->create_tracksheet($app_id);
	    }
	    $tracker_object = new Model_Tracksheet;
	    $tracker_info = $tracker_object->get_tracker($new_tracker_id);
	    $tracker_values = $this->get_tracker_values($new_tracker_id);
	    $response = array();
	    $response['info'] = $tracker_info;
	    $response['values'] = $tracker_values;
	    echo json_encode($response);die;
	  }  
	  break;  
	default:
	  throw new HTTP_Exception_405;  
      }
    }  
    catch(Exception $e) { throw new Exception($e); }
  }
  private function find_by_incidentid($trackers, $incident_id){
    foreach($trackers as $tracker){
      if($tracker['incident_id'] == $incident_id){
        return $tracker['id'];
      }
    }  
      return null;		
  }

  private function get_tracker_values($tracksheet_id){
    $get_param_query = "select distinct parametername_c from trackvalues where refsheetid_c = $tracksheet_id";
    $param_names = DB::query(Database::SELECT, $get_param_query)->execute()->as_array();
    $sub_query = 'select timestamp_c as Date';
    $heading = array();
    array_push($heading, 'Date');
    foreach ($param_names as $param_name){
      if($param_name['parametername_c'] != ''){
        array_push($heading, $param_name['parametername_c']);
        $sub_query = $sub_query. ", MAX(IF(parametername_c = '".$param_name["parametername_c"]."', value_c, NULL)) AS ".$param_name["parametername_c"];
      }
    }
    $sub_query = $sub_query. " from trackvalues where refsheetid_c=$tracksheet_id group by timestamp_c order by timestamp_c";
    $track_data = array();
    $track_values = DB::query(Database::SELECT, $sub_query)->execute()->as_array();
    usort($track_values, create_function('$a, $b','if ($a["Date"] == $b["Date"]) return 0; return ($a["Date"] > $b["Date"]) ? -1 : 1;'));
    foreach($track_values as $key=>$value){
      $track_values[$key]['Date'] = date('d-M-Y', $value['Date']);
    }
    array_push($track_data, $heading);
    array_push($track_data, $track_values);
    return($track_data);
  }
  private function createFromTemplate($app_id, $template_id){
    $new_tracksheet_id = $this->create_tracksheet($app_id);
    $template_object = ORM::factory('tracksheettemplate')->where('id', '=', $template_id)->find();
    $parameters = explode(',',trim($template_object->parameters_c, ','));
    foreach($parameters as $parameter){
      $parameter_object = ORM::factory('trackparameter')->where('id', '=', $parameter)->find();
      $trackvalue_object = ORM::factory('trackvalue');
      $trackvalue_object->parametername_c = $parameter_object->parametername_c;
      $trackvalue_object->refsheetid_c = $new_tracksheet_id;
      $trackvalue_object->value_c = '';
      $trackvalue_object->timestamp_c = time();
      $trackvalue_object->save();
    }
    return $new_tracksheet_id;
  }
  private function create_tracksheet($app_id){
    $app_object = ORM::factory('appointment')->where('id','=',$app_id)->find();
    $incident_object = ORM::factory('incident')->where('id', '=', $app_object->refincidentid_c)->find();
    $all_tracksheets = ORM::factory('tracksheet')->where('refincidentid_c', '=', $app_object->refincidentid_c)->find_all();
    $count = count($all_tracksheets) + 1;
    $name = $incident_object->incidentsname_c . '- Sheet '. $count;
    $new_tracksheet = ORM::factory('tracksheet');
    $new_tracksheet->refpatientid_c = $app_object->refappfromid_c;
    $new_tracksheet->refincidentid_c = $incident_object->id;
    $new_tracksheet->tracksheetname_c = $name;
    $new_tracksheet->refcreaterid_c = Auth::instance()->get_user()->id;
    $new_tracksheet_id = $new_tracksheet->save()->id;
    return ($new_tracksheet_id);
  }
  public function action_trackerList(){
    try{
      $sheet_name = $_POST['tracker_name'];
      $sheet_id = $_POST['tracker_id'];
      $sheet_object = ORM::factory('tracksheet')->where('id','=',$sheet_id)->find();
      if($sheet_object->loaded()){
        $sheet_object->tracksheetname_c = $sheet_name;
        $sheet_object->save();
      }
      else{
        throw new Exception;
      }
      die($sheet_object->id);
    }catch(Exception $e){throw new Exception ($e);}  
  }
  public function action_update(){
    try{
      $sheet_name = $_GET['sheet_name'];
      $sheet_id = $_GET['sheet_id'];
      $sheet_object = ORM::factory('tracksheet')->where('id','=',$sheet_id)->find();
      if($sheet_object->loaded()){
        $sheet_object->tracksheetname_c = $sheet_name;
        $sheet_object->save();
      }
      else{
        throw new Exception;
      }
      die();
    }catch(Exception $e){throw new Exception ($e);}
  }
  private function delete($tracker_id){
    try{
      $tracker_value_obj = new Model_Trackvalue;
      $tracker_value_obj->delete_all($tracker_id);
      $tracker_object = new Model_Tracksheet;
      $tracker_object->delete_tracker($tracker_id);
      die();
    }catch(Exception $e){throw new Exception ($e);}
  }
  public function action_Template(){
    try{
      $object_user = new Model_User;
      $user = $object_user->get_user_info();
      switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
	  if(!(isset($_POST['name']) && isset($_POST['data']))){
	    throw new HTTP_Exception_400;
	  }  
	  $headers = json_decode($_POST['data']);
	  $template_name = $_POST['name'];
	  array_shift($headers);
	  $track_param_obj = new Model_Trackparameter;
	  $parameter_ids = $track_param_obj->get_parameter_ids($headers);
	  $parameter_ids = implode(',',$parameter_ids);
	  $template_object = new Model_Tracksheettemplate;
	  $template_id = $template_object->add_template($template_name, $parameter_ids, $user['id']);
	  $response['template_id'] = $template_id;
	  echo json_encode($response);
	  die;
      }
    }catch(Exception $e){throw new Exception ($e);}
  }
  public function action_deleteTemplate(){
    try{
      $template_id = $_GET['template_id'];
      $template_object = ORM::factory('tracksheettemplate')->where('id','=',$template_id)->find();
      $template_object->delete();
      die();
    }catch(Exception $e){throw new Exception ($e);}

  }
}
