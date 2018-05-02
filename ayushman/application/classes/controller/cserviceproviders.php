<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cserviceproviders extends Controller_Cservicetemplate  {
	public function action_add(){
		$errors = array();
		$messages = array();
		$serviceid = $_GET['serviceid'];
		$packageid = $_GET['packageid'];
		$this->display($errors,$messages,$serviceid,$packageid);
	}
	private function ServiceProvidersTable($serviceid, $packageid){
		$result = ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->where('serviceid_c','=',$serviceid)->find_all();
		$serviceproviders =  "<tr  class='Heading_Bg'>";
		$serviceproviders = $serviceproviders.'<td width="5%" align="left" style="padding:5px;" >#</td>
			<td width="95%" align="left" style="padding:5px;" >Service Providers </td>';
		$serviceproviders = $serviceproviders. "</tr>";
		
		if(count($result) == 0){
		  $serviceproviders = $serviceproviders. '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No service providers are assigned.</div></td></tr>';
		}else{
		  for($i=0;$i<count($result);$i++){
				   if($i%2 == 0 ){
						$serviceproviders = $serviceproviders. "<tr>";
					  }else{
						$serviceproviders = $serviceproviders. "<tr style = 'background-color:#ecf8fb;'>";
					  }
					  $serviceproviders = $serviceproviders. '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
						<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.'<a href="#" onclick="removeserviceprovider('.$result[$i]->userid_c.','.$serviceid.')" style="float:right;"><span style="color:blue">Remove</span></a></td>';
						
			  $serviceproviders = $serviceproviders. "</tr>";
		  }
		}
		return $serviceproviders;
	}
	private function display($errors, $messages,$serviceid, $packageid){
		$content = View::factory('vuser/vserviceadmin/vaddserviceprovider');
		$serviceproviderslist = $this->ServiceProvidersTable($serviceid, $packageid);
		$content->bind('serviceproviderslist',$serviceproviderslist);
		$content->bind('serviceid',$serviceid);		
		$content->bind('packageid',$packageid);
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$this->response->body($content);
	}
	public function action_getServiceProviders(){
		try{
			$query = ($_GET['query']);
			$serviceid = ($_GET['serviceid']);
			$query = '%'.$query.'%';
			$helper_package = new helper_Package();
			if($serviceid == 1 || $serviceid == 3){
				$result = $helper_package->getDoctors($query);
			}else if($serviceid == 2 || $serviceid == 4){
				$result = $helper_package->getPathologists($query);
			}
			die(json_encode($result));
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_assign(){
		try{
			$userid = ($_GET['userid']);
			$serviceid = ($_GET['serviceid']);
			$packageid = ($_GET['packageid']);
			$helper_package = new helper_Package();
			$result = $helper_package->assignServiceProviders($userid,$serviceid,$packageid);
			$serviceproviderslist = $this->ServiceProvidersTable($serviceid, $packageid);
			die($serviceproviderslist);
		}
		catch(Exception $e){throw new Exception($e);}
	}
	public function action_remove(){
		try{
			$userid = ($_GET['userid']);
			$serviceid = ($_GET['serviceid']);
			$packageid = ($_GET['packageid']);
			$helper_package = new helper_Package();
			$result = $helper_package->removeServiceProviders($userid,$serviceid,$packageid);
			$serviceproviderslist = $this->ServiceProvidersTable($serviceid, $packageid);
			die($serviceproviderslist);
		}
		catch(Exception $e){throw new Exception($e);}
	}
}
