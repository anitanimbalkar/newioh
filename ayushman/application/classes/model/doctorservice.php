<?php defined('SYSPATH') or die('No direct script access.');
class Model_Doctorservice extends kohana_Ayushmanorm {
	protected $_table_name = 'doctorservices';
	public function get(){
		try{
			$objUser = new Model_User;
			$user_info = $objUser->get_user_info();
			$doctorobj = ORM::factory('doctor')->where('refdoctorsid_c','=',$user_info['id'])->find();
			$billdet = $this->where('refdoctorid','=',$doctorobj->id)->find();
			
			if($billdet == null)
			{
				// If personalised bill is not available then set the record of -1
				$billdet = $this->where('refdoctorid','=',-1)->find();
			}
				$arr_bills = array();
				$arr_bills['label1'] = $billdet->label1_c;
				$arr_bills['label2'] = $billdet->label2_c;
				$arr_bills['label3'] = $billdet->label3_c;
				$arr_bills['label4'] = $billdet->label4_c;
				$arr_bills['label5'] = $billdet->label5_c;
				$arr_bills['label6'] = $billdet->label6_c;
				$arr_bills['label7'] = $billdet->label7_c;
				$arr_bills['label8'] = $billdet->label8_c;
				$arr_bills['label9'] = $billdet->label9_c;
				$arr_bills['label10'] = $billdet->label10_c;
				$arr_bills['label11'] = $billdet->label11_c;
				$arr_bills['label12'] = $billdet->label12_c;
				$arr_bills['label13'] = $billdet->label13_c;
				$arr_bills['label14'] = $billdet->label14_c;
				$arr_bills['label15'] = $billdet->label15_c;
				$arr_bills['label16'] = $billdet->label16_c;
				$arr_bills['label17'] = $billdet->label17_c;
				$arr_bills['label18'] = $billdet->label18_c;
				$arr_bills['label19'] = $billdet->label19_c;
				$arr_bills['label20'] = $billdet->label20_c;
				$arr_bills['label21'] = $billdet->label21_c;
				$arr_bills['label22'] = $billdet->label22_c;
				$arr_bills['label23'] = $billdet->label23_c;
				$arr_bills['label24'] = $billdet->label24_c;
				$arr_bills['label25'] = $billdet->label25_c;
				
				$arr_bills['charge1'] = $billdet->charge1_c;
				$arr_bills['charge2'] = $billdet->charge2_c;
				$arr_bills['charge3'] = $billdet->charge3_c;
				$arr_bills['charge4'] = $billdet->charge4_c;
				$arr_bills['charge5'] = $billdet->charge5_c;
				$arr_bills['charge6'] = $billdet->charge6_c;
				$arr_bills['charge7'] = $billdet->charge7_c;
				$arr_bills['charge8'] = $billdet->charge8_c;
				$arr_bills['charge9'] = $billdet->charge9_c;
				$arr_bills['charge10'] = $billdet->charge10_c;
				$arr_bills['charge11'] = $billdet->charge11_c;
				$arr_bills['charge12'] = $billdet->charge12_c;
				$arr_bills['charge13'] = $billdet->charge13_c;
				$arr_bills['charge14'] = $billdet->charge14_c;
				$arr_bills['charge15'] = $billdet->charge15_c;
				$arr_bills['charge16'] = $billdet->charge16_c;
				$arr_bills['charge17'] = $billdet->charge17_c;
				$arr_bills['charge18'] = $billdet->charge18_c;
				$arr_bills['charge19'] = $billdet->charge19_c;
				$arr_bills['charge20'] = $billdet->charge20_c;
				$arr_bills['charge21'] = $billdet->charge21_c;
				$arr_bills['charge22'] = $billdet->charge22_c;
				$arr_bills['charge23'] = $billdet->charge23_c;
				$arr_bills['charge24'] = $billdet->charge24_c;
				$arr_bills['charge25'] = $billdet->charge25_c;
				return $arr_bills;
		}			
		catch(Exception $e){throw new Exception($e);}
	}
	public function gettemplate($appid){
		try{
			$appObj = ORM::factory('appointment')->where('id','=',$appid)->find();
			$billdet = $this->where('refdoctorid','=',$appObj->refappwithid_c)->find();
			
			if($billdet == null)
			{
				// If personalised bill is not available then set the record of -1
				$billdet = $this->where('refdoctorid','=',-1)->find();
			}
				$arr_bills = array();
				$arr_bills['label1'] = $billdet->label1_c;
				$arr_bills['label2'] = $billdet->label2_c;
				$arr_bills['label3'] = $billdet->label3_c;
				$arr_bills['label4'] = $billdet->label4_c;
				$arr_bills['label5'] = $billdet->label5_c;
				$arr_bills['label6'] = $billdet->label6_c;
				$arr_bills['label7'] = $billdet->label7_c;
				$arr_bills['label8'] = $billdet->label8_c;
				$arr_bills['label9'] = $billdet->label9_c;
				$arr_bills['label10'] = $billdet->label10_c;
				$arr_bills['label11'] = $billdet->label11_c;
				$arr_bills['label12'] = $billdet->label12_c;
				$arr_bills['label13'] = $billdet->label13_c;
				$arr_bills['label14'] = $billdet->label14_c;
				$arr_bills['label15'] = $billdet->label15_c;
				$arr_bills['label16'] = $billdet->label16_c;
				$arr_bills['label17'] = $billdet->label17_c;
				$arr_bills['label18'] = $billdet->label18_c;
				$arr_bills['label19'] = $billdet->label19_c;
				$arr_bills['label20'] = $billdet->label20_c;
				$arr_bills['label21'] = $billdet->label21_c;
				$arr_bills['label22'] = $billdet->label22_c;
				$arr_bills['label23'] = $billdet->label23_c;
				$arr_bills['label24'] = $billdet->label24_c;
				$arr_bills['label25'] = $billdet->label25_c;
				
				$arr_bills['charge1'] = $billdet->charge1_c;
				$arr_bills['charge2'] = $billdet->charge2_c;
				$arr_bills['charge3'] = $billdet->charge3_c;
				$arr_bills['charge4'] = $billdet->charge4_c;
				$arr_bills['charge5'] = $billdet->charge5_c;
				$arr_bills['charge6'] = $billdet->charge6_c;
				$arr_bills['charge7'] = $billdet->charge7_c;
				$arr_bills['charge8'] = $billdet->charge8_c;
				$arr_bills['charge9'] = $billdet->charge9_c;
				$arr_bills['charge10'] = $billdet->charge10_c;
				$arr_bills['charge11'] = $billdet->charge11_c;
				$arr_bills['charge12'] = $billdet->charge12_c;
				$arr_bills['charge13'] = $billdet->charge13_c;
				$arr_bills['charge14'] = $billdet->charge14_c;
				$arr_bills['charge15'] = $billdet->charge15_c;
				$arr_bills['charge16'] = $billdet->charge16_c;
				$arr_bills['charge17'] = $billdet->charge17_c;
				$arr_bills['charge18'] = $billdet->charge18_c;
				$arr_bills['charge19'] = $billdet->charge19_c;
				$arr_bills['charge20'] = $billdet->charge20_c;
				$arr_bills['charge21'] = $billdet->charge21_c;
				$arr_bills['charge22'] = $billdet->charge22_c;
				$arr_bills['charge23'] = $billdet->charge23_c;
				$arr_bills['charge24'] = $billdet->charge24_c;
				$arr_bills['charge25'] = $billdet->charge25_c;
				return $arr_bills;
		}			
		catch(Exception $e){throw new Exception($e);}
	}
}