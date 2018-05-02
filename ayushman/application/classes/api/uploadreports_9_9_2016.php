<?php

class api_Uploadreports
{
	public function getReportData($object_user)
	{
		try
		{
			$datatags=ORM::factory('patienttestreport')->where('refpatientuserid_c','=',$object_user->id)->where('isvisible_c','=',"1")->order_by('dateoftest_c','desc')->find_all()->as_array();
		$finaldata=array();
		$finaldata['data']=array();
		foreach($datatags as $datatag)
		{
			$data["date"]=array();
			$data["date"] = date("d M Y", strtotime($datatag->dateoftest_c));
			$data["parameters"] = json_decode($datatag->testparameters);
			$data["patienttestreportid"]=$datatag->id;
			$data["testid"]=$datatag->refpatreporttestid_c;
			$data["isdicom"]=$datatag->isdicom_c;
			$data["testname"]=ORM::factory('testmaster')->where('id','=',$datatag->refpatreporttestid_c)->find()->testname_c;
			
			$testparameters=json_decode($datatag->testparameters);
			
			$incidentid=ORM::factory('appointment')->where('id','=',$datatag->refappointmentid_c)->find()->refincidentid_c;
			$data["incidentid"]=$incidentid;
			if(isset($incidentid)){
				$temp_visit = "";
				$temp_suggestedby = "";
				if(isset($testparameters->visit )){
					$temp_visit = $testparameters->visit;					
				//	$data["visit"]=$temp_visit;
				}
				if(isset($testparameters->Suggestedby )){
					$temp_suggestedby = $testparameters->Suggestedby;
				}
				$data["visits"]='["'.$temp_visit.'","'.$temp_suggestedby.'","'.$incidentid.'","'.$datatag->refappointmentid_c.'"]';
			}
			$file = new helper_Files();
			$return = $file->getFilePath($datatag->fileid_c);
			if($return != ''){
				$data["filepath"]= '/ayushman/'.$return['abspath'];
			}else{
				$data["filepath"] = '';
			}
			array_push($finaldata['data'],$data);
		}
		
		
			return json_encode($finaldata);
		}
		catch (Exception $e) {
			throw new Exception($e);
		}
	}
}