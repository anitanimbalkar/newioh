<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctornote extends kohana_AyushmanORM {
  protected $_table_name = 'doctornotes';
  public function get_notes($doctor_id, $patient_user_id){
    try{
      return $this->where('refdoctorid_c', '=', $doctor_id)->where('refpatientid_c', '=', $patient_user_id)->find();
    }catch(Exception $e){throw new Exception($e);}
  }
  public function save_note($doctor_id, $patient_user_id, $notes_text){
    try{
      $note = $this->where('refdoctorid_c', '=', $doctor_id)->where('refpatientid_c', '=', $patient_user_id)->find();
      if(! $note->loaded()){
        $note->refdoctorid_c = $doctor_id;
        $note->refpatientid_c = $patient_user_id;
      }
      $note->notes_c = $notes_text;
      $note->save();
    }catch(Exception $e){throw new Exception($e);}
  }
  
   public function save_historynote($doctor_id, $patient_user_id, $id){
    try{
      $note = $this->where('refdoctorid_c', '=', $doctor_id)->where('refpatientid_c', '=', $patient_user_id)->find();
      if(! $note->loaded()){
        $note->refdoctorid_c = $doctor_id;
        $note->refpatientid_c = $patient_user_id;
      }
      $note->file_c = $id;
      $note->save();
    }catch(Exception $e){throw new Exception($e);}
  }
  public function delete_historynote($doctor_id, $patient_user_id){
    try{
      $note = $this->where('refdoctorid_c', '=', $doctor_id)->where('refpatientid_c', '=', $patient_user_id)->find();
      if($note->loaded()){
			$note->file_c = '';
			$note->save();
		}
      
    }catch(Exception $e){throw new Exception($e);}
  }
  
  
}
