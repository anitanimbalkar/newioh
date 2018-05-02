<?php defined('SYSPATH') or die('No direct script access.');
class Model_Pathistoryquestionanswer extends kohana_Ayushmanorm {
	protected $_table_name = 'pathistoryquestionanswers';
	
	public function get_ques_answers($patientid){
		$questions=ORM::factory('pathistoryquestion')->find_all();
		$response=array();
		foreach($questions as $question){
			$answer=ORM::factory('pathistoryquestionanswer')->where('ref_questionid_c','=',$question->id)->where('ref_patientid_c','=',$patientid)->find();
			if($answer){
				array_push($response,array($question->id,$answer->answer_c));
			}
			else{
				array_push($response,array($question->id,''));
			}
		}
	return($response);
	}
		public function save_othermedobserv($patient_id, $obj_medicalobs){
			$answers=ORM::factory('pathistoryquestionanswer')->where('ref_patientid_c','=',$patient_id)->find_all();
			if(count($answers)>0){
				foreach($obj_medicalobs as $obj_quesans){
					$answer=ORM::factory('pathistoryquestionanswer')->where('ref_questionid_c','=',$obj_quesans[1])->where('ref_patientid_c','=',$patient_id)->find();
					if($answer->ref_questionid_c){
						$answer->answer_c=$obj_quesans[0];
						$answer->save();
					}		
					else{
						$obj_quesanswer=new Model_Pathistoryquestionanswer;
						$obj_quesanswer->ref_patientid_c=$patient_id;
						$obj_quesanswer->ref_questionid_c=$obj_quesans[1];			
						$obj_quesanswer->answer_c=$obj_quesans[0];
						$obj_quesanswer->save();
						}
					}				
			}
			else{
				 for($i=0;$i<count($obj_medicalobs);$i++){
					$obj_quesans=new Model_Pathistoryquestionanswer;
					$obj_quesans->ref_patientid_c=$patient_id;
					$obj_quesans->ref_questionid_c=$obj_medicalobs[$i][1];			
					$obj_quesans->answer_c=$obj_medicalobs[$i][0];
					$obj_quesans->save();
				}	
			}
	}

}