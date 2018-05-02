<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cnotesandreminder extends Controller_Ctemplatewithmenu{

	// Functions for Notes on tracker
	public function action_getallnotes(){
		try{
			
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			$results = array();
			$result = array();
			if(isset($_GET['patientid']))
			{
				$objnotes = ORM::factory("notesview")
							->where("foruserid","=",$_GET['patientid'])
							->where("active","=",1)
							->findall();
							//->order_by("createdon","desc")
							// Already ordered when creating view
				foreach ($objnotes as $note)
				{				
					$result['desc1']='';
					$result['desc2']='';
					$result['desc3']='';
					$result['desc4']='';
					$result['desc5']='';
					$result['desc6']='';
					$result['desc7']='';
					$result['desc8']='';
					$result['desc9']='';
					$result['desc10']='';
					
					$result['link1']='';
					$result['link2']='';
					$result['link3']='';
					$result['link4']='';
					$result['link5']='';
					$result['link6']='';
					$result['link7']='';
					$result['link8']='';
					$result['link9']='';
					$result['link10']='';
					
					$linkindex = 1;
					$descindex = 1;
					$descArray = explode(' ',$note->notes);
					for ($i=0;$i < count($descArray) ;++$i)
					{
						// Before comparing prepended "-" because
						// function not working if the word begins with 
						// the string to compare
						
						if (strpos("-".$descArray[$i],"http")|| strpos("-".$descArray[$i],"HTTP") )
						{
							// link string found so define link 
							$indexvalue = "link".$linkindex."";
							$result[$indexvalue]=$descArray[$i];
							if($linkindex < 10)
							{
								$linkindex = $linkindex+1;
								$descindex = $descindex+1;							
							}
						}
						else
						{
							// define desc string
							$indexvalue = "desc".$descindex."";
							$result[$indexvalue]=$result[$indexvalue].' '.$descArray[$i];
						}
					}					
					$result['id'] = $note->id;
					$result['foruserid'] = $note->foruserid;
					$result['notedesc'] = $note->notes;
					$result['writtenbyuserid'] = $note-> writtenbyuserid;					
					$result['writtenby'] = $note->writtenby;
					$result['loggeduserid'] = $user['id'];
					$result['status'] = $note->active;					
					$result['date'] = $note->createdon;					
					array_push($results, $result);
				}
			}	
				$responce['list'] = $results;
				echo json_encode($responce); die;
			
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_savenotes(){
		try{
			$object_user = new Model_User;
			//$user = $object_user->get_user_info();
			//$objroleuser=new Model_roleuser;
			//$user_role=$objroleuser->get_userRole($user['id']);
			if(isset($_GET['notes']) and isset($_GET['patientid']) ){
					$objnote = ORM::factory("trackernote");
					$objnote->notes_c = $_GET['notes'];
					$objnote->foruserid_c = $_GET['patientid'];
					$objnote->active_c = 1;
					$objnote->save();
				
					$responce['success'] = "success";
					echo json_encode($responce);	die;
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_editnotes(){
		try{			
			if(isset($_GET['notes']) and isset($_GET['patientid']) and isset($_GET['editid'])  ){
					$objnote = ORM::factory("trackernote")
								->where("id","=",$_GET['editid'])
								->find();
				if($objnote->id != null)	
				{
					$objnote->notes_c = $_GET['notes'];
					$objnote->foruserid_c = $_GET['patientid'];
					$objnote->active_c = 1;
					$objnote->save();
					
					$responce['success'] = "success";
					echo json_encode($responce);	die;
				}
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_deletenote(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			if(isset($_GET['id'])){
				$objnote = ORM::factory("trackernote")
							->where ("id","=",$_GET['id'])
							->find();
				if($objnote->id != null)
				{
					$objnote->active_c = 0;
					$objnote->save();
				}
				
				$responce['success'] = "success";
				echo json_encode($responce);	die;
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}	
	// Functions for Reminders on trackers
		public function action_getallreminders(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			$results = array();

			if(isset($_GET['patientid']))
			{
				$currentdate=date("d-m-Y");
				$currentdate=strtotime($currentdate. "+1 days");
						
				$objreminder = ORM::factory("remindersview")
							->where("foruserid","=",$_GET['patientid'])
							->where("active","=",1)
							->order_by("startdate","asc")
							->findall();
				foreach ($objreminder as $reminder)
				{
					$result = array();
					$result['id'] = $reminder->id;
					$result['foruserid'] = $reminder->foruserid;
					$result['startdate'] = $reminder-> startdate;
					$result['lastdate'] = $reminder-> lastdate;					
					$result['frequency'] = $reminder-> frequency;					
					$result['frequencyvalue'] = $reminder-> frequencyvalue;					
					$result['templatecode'] = $reminder->templatecode;
					$result['variabledata'] = $reminder->variabledata;
					$result['templatesubject'] = $reminder->templatesubject;
					$result['description'] = $reminder->description;
					$result['smsflag'] = $reminder->smsflag;
					$result['emailflag'] = $reminder->emailflag;
					$result['dbflag'] = $reminder->dbflag;
					$result['loggeduserid'] = $user['id'];
					$result['createduserid'] = $reminder->createdbyuserid;					
					$result['createdbyname'] = $reminder->createdbyname;					
					$result['status'] = $reminder->active;					
					array_push($results, $result);
				}
			}
				$responce['list'] = $results;
				echo json_encode($responce); die;		
		
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_savereminder(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			$templates = Kohana::message('reminder');
			if(isset($_GET['templatecode']) 
				and isset($_GET['reminderstartdate'])
				and isset($_GET['frequency'])
				and isset($_GET['templatedesc'])
				and isset($_GET['smsflag']) 
				and isset($_GET['emailflag']) 
				and isset($_GET['dbflag']) 
				and isset($_GET['variabledata']) 
				and isset($_GET['patientid']) ){					
					$selecteddate = strtotime($_GET['reminderstartdate']." 00:00:00");
					$selecteddate = date("Y-m-d h:i:s",$selecteddate);
					$objreminder = ORM::factory("trackerreminder");
					$objreminder->foruserid_c = $_GET['patientid'];
					$objreminder->startdate_c = $selecteddate;
					$objreminder->templatecode_c = $_GET['templatecode'];
					var_dump($_GET);
					if(($_GET['templatecode'] != "") and ($_GET['templatecode'] != null)and ($_GET['templatecode'] != "null"))
						$objreminder->templatesubject_c = $templates[$_GET['templatecode']]['subject'];
					else
						$objreminder->templatesubject_c = "System generated mail";
				
					$objreminder->description_c = $_GET['templatedesc'];				
					$objreminder->frequency_c = $_GET['frequency'];				
					$objreminder->templatevariables_c = $_GET['variabledata'];				
					$objreminder->smsflag_c = $_GET['smsflag'];				
					$objreminder->emailflag_c = $_GET['emailflag'];				
					$objreminder->dbmsgflag_c = $_GET['dbflag'];				
					$objreminder->active_c = 1;
					$objreminder->save();
				
					// Code for replacing variables with actual data
					// in mail body
					$mailbody = $_GET['templatedesc'];;
					if(($_GET['templatecode'] != "") and ($_GET['templatecode'] != null)and ($_GET['templatecode'] != "null"))
					{
						$templateobj = $templates[$objreminder->templatecode_c];			
						$templatevars = $templateobj['variable'];
						$datavariables = explode(",",$objreminder->templatevariables_c);
						// explode returns 1 for empty string
						
						if((count($templatevars) > 0) and ($objreminder->templatevariables_c!="") and ((count($datavariables))== count($templatevars)))
						{
							for($i=0; $i<count($datavariables); ++$i)
							{
								$notification[$templatevars[$i]] = $datavariables[$i] ;					
							}
							foreach($templatevars as $val)
							{
								if (array_key_exists($val , $notification) == "true")//check for user given all required values.
								{	
									$$val = $notification[$val]; 
									$mailbody =str_replace ('$'.$val, $$val , $mailbody );
								}
							}	
						}
					}
				$objreminder->description_c = $mailbody;
				$objreminder->save();								
				$responce['success'] = "success";
				echo json_encode($responce);	die;
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_editreminder(){
		try{
			$templates = Kohana::message('reminder');
			if(isset($_GET['templatecode']) 
				and isset($_GET['reminderstartdate'])
				and isset($_GET['frequency'])
				and isset($_GET['templatedesc'])
				and isset($_GET['smsflag']) 
				and isset($_GET['emailflag']) 
				and isset($_GET['dbflag']) 
				and isset($_GET['variabledata']) 
				and isset($_GET['patientid']) 
				and isset($_GET['editid']))
			{					
				$selecteddate = strtotime($_GET['reminderstartdate']." 00:00:00");
				$selecteddate = date("Y-m-d h:i:s",$selecteddate);
				$objreminder = ORM::factory("trackerreminder")
								->where("id","=",$_GET['editid'])
								->find();
				if($objreminder->id != null)
				{
					$objreminder->foruserid_c = $_GET['patientid'];
					$objreminder->startdate_c = $selecteddate;
					$objreminder->templatecode_c = $_GET['templatecode'];
					if(($_GET['templatecode'] != "") and ($_GET['templatecode'] != null)and ($_GET['templatecode'] != "null"))
						$objreminder->templatesubject_c = $templates[$_GET['templatecode']]['subject'];
					else
						$objreminder->templatesubject_c = "System generated mail";
					$objreminder->description_c = $_GET['templatedesc'];				
					$objreminder->frequency_c = $_GET['frequency'];				
					$objreminder->templatevariables_c = $_GET['variabledata'];				
					$objreminder->smsflag_c = $_GET['smsflag'];				
					$objreminder->emailflag_c = $_GET['emailflag'];				
					$objreminder->dbmsgflag_c = $_GET['dbflag'];				
					$objreminder->active_c = 1;
					$objreminder->save();
											
					$mailbody = $_GET['templatedesc'];;
					if(($_GET['templatecode'] != "") and ($_GET['templatecode'] != null)and ($_GET['templatecode'] != "null"))
					{
						$templateobj = $templates[$objreminder->templatecode_c];			
						$templatevars = $templateobj['variable'];
						$datavariables = explode(",",$objreminder->templatevariables_c);
						// explode returns 1 for empty string
						if((count($templatevars) > 0) and ($objreminder->templatevariables_c!="") and ((count($datavariables))== count($templatevars)))
						{
							for($i=0; $i<count($datavariables); ++$i)
							{
								$notification[$templatevars[$i]] = $datavariables[$i] ;					
							}
							foreach($templatevars as $val)
							{
								if (array_key_exists($val , $notification) == "true")//check for user given all required values.
								{	
									$$val = $notification[$val]; 
									$mailbody =str_replace ('$'.$val, $$val , $mailbody );
								}
							}	
						}
					}
					$objreminder->description_c = $mailbody;
					$objreminder->save();								
					$responce['success'] = "success";
					echo json_encode($responce);	die;
				}
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}
	public function action_deletereminder(){
		try{
			$object_user = new Model_User;
			$user = $object_user->get_user_info();
			$objroleuser=new Model_roleuser;
			$user_role=$objroleuser->get_userRole($user['id']);
			if(isset($_GET['id'])){
				$objreminder = ORM::factory("trackerreminder")
							->where ("id","=",$_GET['id'])
							->find();
				if($objreminder->id != null)
				{
					$objreminder->active_c = 0;
					$objreminder->save();
				}
				$responce['success'] = "success";
				echo json_encode($responce);	die;
			}
			die("failed");
		}catch(Exception $e){throw new Exception ($e);}
	}	
	public function action_getremindertemplates(){
		try{
			$templates = Kohana::message('reminder');
			$results = array();
			foreach ($templates as $template)
			{
				$result = array();
				$result['subject'] = $template['subject'];
				$result['code'] =  $template['code'];
				$result['variable'] =  $template['variable'];
				$result['mailbody'] =  $template['mailbody'];
				array_push($results, $result);
			}
			die(json_encode($results));
		}catch(Exception $e){throw new Exception ($e);}
	}	
}