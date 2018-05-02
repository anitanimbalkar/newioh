<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cfamilygrid extends Controller {

	public function action_showgrid()
	{	
		$content = View::factory('vuser/vpatient/familygrid');
		$tablename = $this->request->post('tablename');
		$patrelativeid = $this->request->post('patrelativeid');
		$patientid = $this->request->post('patientid');
		$xjqgridname = $this->request->post('xjqgridname');
		$userid = $this->request->post('userid');
		$viewnm=$this->request->post('viewnm');
		
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('patientid',$patientid);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('userid',$userid);
		$content->bind('viewnm',$viewnm);
			
		$this->response->body($content);
	}
	public function action_showreadonlygrid()
	{	
		$content = View::factory('vuser/vpatient/vfamilyreadonlygrid');
		$tablename = $this->request->post('tablename');
		$patrelativeid = $this->request->post('patrelativeid');
		$patientid = $this->request->post('patientid');
		$xjqgridname = $this->request->post('xjqgridname');
		$userid = $this->request->post('userid');
		$viewnm=$this->request->post('viewnm');
		
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('patientid',$patientid);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('userid',$userid);
		$content->bind('viewnm',$viewnm);
			
		$this->response->body($content);
	}
	public function action_showreloadgrid()
	{	
		$content = View::factory('vuser/vpatient/familygrid');
		$tablename = $_GET["tablename"];
		$patrelativeid=$_GET["patrelativeid"];
		$patientid=$_GET["patientid"];
		$userid=$_GET["userid"];
		$viewnm=$_GET["viewnm"];
		$xjqgridname=$_GET["xjqgridname"];
		
		$content->bind('tablename',$tablename);
		$content->bind('patrelativeid',$patrelativeid);
		$content->bind('patientid',$patientid);
		$content->bind('xjqgridname',$xjqgridname);
		$content->bind('userid',$userid);
		$content->bind('viewnm',$viewnm);
		
		$this->response->body($content);
	}
	
}