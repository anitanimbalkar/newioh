<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cdicomviewer extends Controller_Ctemplatewithmenu {
	
	public function action_view()
	{
		$reportid=$_GET['reportid'];
		
		$obj_user = Auth::instance()->get_user();
		$role=ORM::factory('role')->where('id','=',$obj_user->id)->find()->name;
				if($role=='doctor'){
					$setpatientidflag=1;
				}
			$content = View::factory('dicomviewer');
			$obj_report=ORM::factory('patienttestreport')->where("id","=",$reportid)->find();
			$notes=$obj_report->notesbydoc_c;
			$content->bind('notes', $notes);
			$content->bind('reportid', $reportid);
			
			$content->bind('setpatientidflag', $setpatientidflag);
			
			$username = $obj_user->Firstname_c;
			
			$breadcrumb = "Home>>";
            $this->template->breadcrumb = $breadcrumb;
			$this->template->content = $content;
			$this->template->user = $obj_user->Firstname_c;
			
	}
	public function action_savenotesbydoc()
	{
		
	}
	public function action_getdicomfiles()
	{
		
		$reportid=$_GET['reportid'];
		$dicomobjs=ORM::factory('dicomfile')->where("refreportid_c","=",$reportid)->find_all();
		$instancelist=array();
		foreach($dicomobjs as $dicomobj)
		{
			$temp=array();
			$files = new helper_Files();
			$return = $files->getFilePath($dicomobj->fileid_c);
			$temp["imageId"]=$return['abspath'];
			array_push($instancelist,$temp);
		}
		
		$temp=array();
		$json=array();
		$temp['instanceList']=$instancelist;
		$seriesList=array();
		array_push($seriesList,$temp);
		 $tempseries=array();
		$tempseries['seriesList']=$seriesList;
		
		//array_push($json,$tempseries);
		$json=JSON_encode($tempseries);
		//echo($json);die; 
		/*$json='{
    
    "seriesList" : [
        {
            
            
           
            "instanceList" : [
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.109.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.110.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.111.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.112.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.113.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.114.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.115.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.116.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.117.dcm"},
                {"imageId": "CTStudy/1.2.840.113619.2.30.1.1762295590.1623.978668950.118.dcm"}
                 
            ]
        }
    ]
}';*/
echo($json); die;
	}
}