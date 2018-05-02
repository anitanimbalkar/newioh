<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cmypackages extends Controller_Ctemplatewithmenu  {
	public function action_forserviceconsumer(){
		$errors = array();
		$messages = array();
		$this->display($errors,$messages);
	}
	private function display($errors, $messages){
		
		$content = View::factory('vuser/vserviceadmin/vmypackages');
		$customview = $this->generateviewforconsumer();
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('customview',$customview);
		$this->template->content = $content;
	}
	private function displayForProvider($errors, $messages){
		
		$content = View::factory('vuser/vserviceadmin/vmypackages');
		$customview = $this->generateviewforprovider();
		$content->bind('errors',$errors);
		$content->bind('messages',$messages);
		$content->bind('customview',$customview);
		$this->template->content = $content;
	}
	public function action_forserviceprovider(){
		$errors = array();
		$messages = array();
		$this->displayForProvider($errors,$messages);
	}
	public function action_generateviewforprovider(){
		$helper_package = new helper_Package();
		$result = $helper_package->get_mypackages(Auth::instance()->get_user()->id);
		
		$viewResult = '<script type="text/javascript">
	function showdetails(url){
		parent.openDialog(url,800,"auto");
	}
</script>';
		if(count($result) == 0){
		  $viewResult .=  '<tr><td colspan="4"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
		}else{
			for($i=count($result)-1;$i>=0;$i--){
				$serviceId = $helper_package->get_serviceid(Auth::instance()->get_user()->id, $result[$i]->id);

				if($i%2 != 0 ){
					$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
				}else{
					$viewResult .= "<tr>";
				}
				$viewResult .= '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$result[$i]->name_c.'</td>
						<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->description_c.'</td>	
						<td align="middle" style="padding:5px;" class="bodytext_bold">&nbsp;&nbsp;<a href="#" style="float:center;"><span style="color:blue" onclick=showdetails("/ayushman/cpackage/appointmentlist?providerid='.Auth::instance()->get_user()->id.'&serviceid='. $serviceId.'&packageid='.$result[$i]->id.'&bookingid='.'");>Details</span></a> </td>';	
				$viewResult .= "</tr>";
			}
		}
		echo($viewResult); die;
	}
	
	private function generateviewforprovider(){
		$helper_package = new helper_Package();
		$result = $helper_package->get_mypackages(Auth::instance()->get_user()->id);
		
		$viewResult = '<script type="text/javascript">
	function showdetails(url){
		parent.openDialog(url,800,"auto");
	}
</script>';
		if(count($result) == 0){
		  $viewResult .=  '<tr><td colspan="4"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
		}else{
			for($i=count($result)-1;$i>=0;$i--){
				$serviceId = $helper_package->get_serviceid(Auth::instance()->get_user()->id, $result[$i]->id);

				if($i%2 != 0 ){
					$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
				}else{
					$viewResult .= "<tr>";
				}
				$viewResult .= '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$result[$i]->name_c.'</td>
						<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->description_c.'</td>	
						<td align="middle" style="padding:5px;" class="bodytext_bold">&nbsp;&nbsp;<a href="#" style="float:center;"><span style="color:blue" onclick=showdetails("/ayushman/cpackage/appointmentlist?providerid='.Auth::instance()->get_user()->id.'&serviceid='. $serviceId.'&packageid='.$result[$i]->id.'&bookingid='.'");>Details</span></a> </td>';	
				$viewResult .= "</tr>";
			}
		}
		return $viewResult;
	}
	private function generateviewforconsumer(){
		$helper_package = new helper_Package();
		$result = $helper_package->get_mypackages(Auth::instance()->get_user()->id);
		$viewResult = '';
		if(count($result) == 0){
		  $viewResult .=  '<tr><td colspan="4"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
		}else{
		  for($i=count($result)-1;$i>=0;$i--){
				if($i%2 != 0 ){
					$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
				}else{
					$viewResult .= "<tr>";
				}
				$requestacamp = '';
				if($result[$i]->allowedtobook_c == 1){
					//$requestacamp = '<a href="#" onclick=window.location="/ayushman/cpackage/request?id='.$result[$i]->id.'" style="float:center;"><span style="color:blue">Request A Camp</span></a>&nbsp;&nbsp;/';
				}
				$viewResult .= '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$result[$i]->name_c.'</td>
						<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->description_c.'</td>	
						<td align="middle" style="padding:5px;" class="bodytext_normal">'.$requestacamp.'&nbsp;&nbsp;<a href="#" onclick=window.location="/ayushman/cpackage/administrate?id='.$result[$i]->id.'" style="float:left;"><span style="color:blue">Package Details</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick=window.location="/ayushman/cpackage/download?id='.$result[$i]->id.'" title="Download Excel" style="float:center;"><span style="color:blue"><i style="  font-size: x-large;" class="fa fa-download"></i> Excel</span></a></td>';	
				$viewResult .= "</tr>";
				if($result[$i]->allowedtobook_c == 1){
					if($i%2 != 0 ){
						$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
					}else{
						$viewResult .= "<tr>";
					}
					$viewResult .= '<td  style = "background-color:transparent;">&nbsp;</td><td colspan="3">';
					$viewResult .= '<table style="width:100%;border:1px solid #c6dbe4;">';
					$result1 = ORM::factory('packagebooking')->where('packageid_c','=',$result[$i]->id)->where('userid_c','=',Auth::instance()->get_user()->id)->find_all();
					if(count($result1) == 0){
						$viewResult .= '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >User has not booked a camp.</div></td></tr>';
					}else{
						for($j=0;$j<count($result1);$j++){
							if($i%2 == 0 ){
								$viewResult .= "<tr>";
							}else{
								$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
							}
							$viewResult .= '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($j+1).'</td>
								<td width="95%" align="left" style="padding:5px;" class="bodytext_normal"><span style="float:left;width:30%;" class="bodytext_bold">'.$result1[$j]->name_c.'</span><span style="float:center;width:30%;" class="bodytext_bold">Date: '.$result1[$j]->date_c.'</span><a href="#" onclick=window.location="/ayushman/cpackage/administratebooking?id='.$result1[$j]->id.'" style="float:right;"><span style="color:blue">View Details</span></a> </td>';
							$viewResult .= "</tr>";
						}
					}
					$viewResult .= '</table>';
					$viewResult .= '</td></tr>';
				}
			}
		}
		return $viewResult;
	}
}
