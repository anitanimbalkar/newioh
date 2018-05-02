<?php

class api_Uploadreports
{
	public function getReportData($object_user)
	{
		try
		{
		$datatags=ORM::factory('patienttestreport')->where('refpatientuserid_c','=',$object_user->id)->where("active_c","=",1)->where('isvisible_c','=',"1")->order_by('dateoftest_c','desc')->find_all()->as_array();
		$finaldata=array();
		$finaldata['data']=array();
		$user = Auth::instance()->get_user();
		if (!$user){
				Request::current()->redirect('cuser/login');
		}
		if ($user->has('roles', ORM::factory('role', array('name' => 'doctor'))))
			$userrole="doctor";
		else
			$userrole="patient";

		foreach($datatags as $datatag)
		{
			$data["date"]=array();
			$data["date"] = date("d M Y", strtotime($datatag->dateoftest_c));
			$data["parameters"] = json_decode($datatag->testparameters);
			$data["patienttestreportid"]=$datatag->id;
			$data["testid"]=$datatag->refpatreporttestid_c;
			$data["isdicom"]=$datatag->isdicom_c;
			$data["testname"]=ORM::factory('testmaster')->where('id','=',$datatag->refpatreporttestid_c)->find()->testname_c;
			$data["showdelete"] ="yes";
			$data["status"] = "show";
			/* If lab order is present then test data uploaded against an order */
			if ($datatag->refpatreportdiagnosticlaborderid_c != null and $datatag->refpatreporttestid_c == null)
			{
				$alltest = ORM::factory("orderedtest")->where("diagnosticlabsorderid_c","=",$datatag->refpatreportdiagnosticlaborderid_c)->find_all();
				$alltestname = "";
				foreach($alltest as $test)
				{
					$testname=ORM::factory('testmaster')->where('id','=',$test->testid_c)->find()->testname_c;
					$alltestname=$alltestname.$testname." ,";
				}
				$data["testname"]= rtrim($alltestname,",");				
				$data["showdelete"] = "no";
			}
			if($userrole=="doctor")
				$data["showdelete"] = "no";
				
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