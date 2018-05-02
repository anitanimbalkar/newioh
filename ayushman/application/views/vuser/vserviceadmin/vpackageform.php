<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<div style="width:810px;height:auto; vertical-align:middle;padding:7px;margin:3px; overflow-x:hidden;" class="Heading_Bg"> 
	&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Create Package
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
<form id="form" name="form" action="save" method="post" accept-charset="utf-8">
	<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
			<div style="height:auto; border:1px solid #c6dbe4;width:30%;float:left;max-height:280;min-height:240;overflow:auto;" >				  
				<table width="100%">
					<?php 
						$helper_package = new helper_Package();
						$result = $helper_package->get_availableservices();
						
						$packageid = '';
						if(isset($previousvalues)){
							$packageid = Arr::get($previousvalues, 'id');
						}
						$ObjSelectedServices = $helper_package->get_assignedservices($packageid);
						$availableServices = array();
						foreach($ObjSelectedServices as $availableService){
							array_push($availableServices, $availableService->serviceid_c);
						}
						echo "<tr  class='Heading_Bg'>";
						echo '<td width="5%" align="left" style="padding:5px;">#</td>
							<td width="95%" align="left" style="padding:5px;" >Services</td>';
						echo "</tr>";
						
						if(count($result) == 0){
						  echo '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >Services are not available</div></td></tr>';
						}else{
						   for($i=0;$i<count($result);$i++){
									$isChecked = '';
									
									if(in_array($result[$i]->id, $availableServices)){
										$isChecked = 'checked';
									}
								   if($i%2 == 0 ){
										echo '<tr>'; 
									  }else{
										echo "<tr style = 'background-color:#ecf8fb;'>";
									  }
									  echo '<td width="5%" align="left" style="padding:5px;" class="bodytext_bold" ><input type="checkbox" style="float:left;" class="select" name="services[]" '.$isChecked.' value="'.$result[$i]->id.'" /></td>
										<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->name_c.'</td>';
										
							  echo "</tr>";
						  }
						}
					?>
				</table>
			</div>
			<div style="height:auto;width:67%;float:right;" >				  
				<table width="100%">
					<tr>
						<td width="15%" align="left" style="padding:5px;" class="bodytext_bold" >Package Name</td>
						<td width="67%" align="left" style="padding:5px;" class="bodytext_bold">	<input  id="name_c" name="name_c" style="width:200px" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'name_c'); ?>" type="text" class="textarea" maxlength="45"/></td>
					</tr>
					<tr>
						<td align="left" colspan="2" style="padding:5px;" class="bodytext_bold" ><hr/></td>
					 </tr>
					 <tr>
						<td colspan="2" align="left" style="padding:5px;" class="bodytext_bold" ><input type="radio" style="float:left;" name="publishto_c" class="select" <?php if(isset($previousvalues)){ if(Arr::get($previousvalues, 'publishto_c') == 8){echo 'checked="checked"';}} ?>  value="8"  >Publish package for corporate</input></td>
					</tr>
					 <tr>
						<td colspan="2" align="left" style="padding:5px;" class="bodytext_bold" ><input type="radio" style="float:left;" name="publishto_c" class="select" <?php if(isset($previousvalues)){if(Arr::get($previousvalues, 'publishto_c') == 3){echo 'checked="checked"';}} ?> value="3" >Publish package for consumer</input></td>
					</tr>
					<tr>
						<td align="left" colspan="2" style="padding:5px;" class="bodytext_bold" ><hr/></td>
					 </tr>
					 <tr>
						<td colspan="2" align="left" style="padding:5px;" class="bodytext_bold" ><input type="checkbox" style="float:left;" id='allowedtobook_c' name="allowedtobook_c" class="select" <?php if(isset($previousvalues)){ if(Arr::get($previousvalues, 'allowedtobook_c') == 1){echo 'checked="checked"';}} ?>  >Allow Users to book a camp</input></td>
					</tr>
					<tr>
						<td align="left" colspan="2" style="padding:5px;" class="bodytext_bold" ><hr/></td>
					 </tr>
					<tr>
						<td width="15%" align="left" style="padding:5px;vertical-align:top;" class="bodytext_bold" >Description</td>
						<td width="67%" align="left" style="padding:5px;" class="bodytext_bold"><textarea name='description_c' id='description_c' style="height:66px;width:451px;" ><?php if(isset($previousvalues))echo Arr::get($previousvalues, 'description_c'); ?></textarea></td>
					</tr>
				
				</table>
				<input  id="id" name="id" type="hidden" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'id'); ?>"/>
			</div>
			<?php 
			$packageid = '';
			if(isset($previousvalues)){
				$packageid = Arr::get($previousvalues, 'id');
			}
			//if($packageid != ''){
			if(false){
				echo '<div style="height:auto;width:100%;" >	
					<table width="100%">
						<tr>
							<td align="left" colspan="2" style="padding:5px;" class="bodytext_bold" ><hr/>
							<a href="#" style="float:right;"><span style="color:blue">Add Service Provider</span></a>
							</td>
						</tr>';
						
							$result = ORM::factory('packageserviceprovider')->where('packageid_c','=',$packageid)->find_all();
							echo "<tr  class='Heading_Bg'>";
							echo '<td width="5%" align="left" style="padding:5px;" >#</td>
								<td width="95%" align="left" style="padding:5px;" >Service Providers </td>';
							echo "</tr>";
							
							if(count($result) == 0){
							  echo '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >Services are not available</div></td></tr>';
							}else{
							  for($i=0;$i<count($result);$i++){
									   if($i%2 == 0 ){
											echo "<tr>";
										  }else{
											echo "<tr style = 'background-color:#ecf8fb;'>";
										  }
										  echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
											<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.'<a href="#" style="float:right;"><span style="color:blue">Remove</span></a></td>';
											
								  echo "</tr>";
							  }
							}
						
				echo '</table>
				</div>';
			}
			?>
	</div>
	<div style="background-color: #ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:819px;height:auto; vertical-align:middle;padding:2px;margin:3px; overflow-x:hidden;">
		<input type="button" value="Back" onclick="window.location = '<?php $session = Session::instance();	$back = $session->get('backurls');echo $back[count($back)-2]; ?>'" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
		<input type="submit" value="Save package" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
	</div>
</form>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>