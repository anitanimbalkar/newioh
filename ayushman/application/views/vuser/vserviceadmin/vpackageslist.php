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
		if($.trim($('#listerrorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#listerrorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#listmessagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#listmessagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<div style="width:828px;height:auto; overflow-x:hidden;padding-right:10px;;" > 
	<div style="width:100%;margin-top:18px;">
		<table width="100%"  align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<table id = "searchresult" style="width:100%;display:block" class="bodytext_normal">
					<tr class="Heading_Bg">
							<td width="15%" align="middle" style="padding:5px;">Name</td>
							<td width="12%" align="middle" style="padding:5px;">Date</td>
							<td width="50%" align="middle" style="padding:5px;">Description</td>
							<td width="23%" align="middle" style="padding:5px;"></td>
						</tr>
					<tr>
						<td>
						<?php 
							$helper_package = new helper_Package();
							$result = $helper_package->get_mypackages(Auth::instance()->get_user()->id);
							if(count($result) == 0){
							  echo '<tr><td colspan="4"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
							}else{
							  for($i=count($result)-1;$i>=0;$i--){
								   if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
										echo '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$result[$i]->name_c.'</td>
												<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->createdon_c.'</td>
												<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->description_c.'</td>	
												<td align="middle" style="padding:5px;" class="bodytext_bold"><a href="#" onclick=window.location="/ayushman/cpackageform/edit?id='.$result[$i]->id.'" style="float:center;"><span style="color:blue">Edit Package</span></a> / <a href="#" onclick=window.location="/ayushman/cpackage/view?id='.$result[$i]->id.'" style="float:center;"><span style="color:blue">Administrate</span></a></td>';	
									echo "</tr>";
										/*
										 if($i%2 != 0 ){
											  echo "<tr style = 'background-color:#ecf8fb;'>";
										  }else{
											  echo "<tr>";
										  }
										echo '<td  style = "background-color:transparent;">&nbsp;</td><td colspan="3">';
											echo '<table style="width:100%;border:1px solid #c6dbe4;">';
											$result1 = ORM::factory('packagesubscriber')->where('packageid_c','=',$result[$i]->id)->find_all();
											if(count($result1) == 0){
											  echo '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No one has subscribed to this package.</div></td></tr>';
											}else{
											  for($j=0;$j<count($result1);$j++){
													   if($i%2 == 0 ){
															echo "<tr>";
														  }else{
															echo "<tr style = 'background-color:#ecf8fb;'>";
														  }
														  echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($j+1).'</td>
															<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result1[$j]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result1[$j]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result1[$j]->userid_c)->find()->email.'</td>';
															
												  echo "</tr>";
											  }
											}
										echo '</table>';
										echo '</td></tr>';*/
							  }
							}
						?>
						</td>
					</tr>
				</table>
				<table style="width:100%" class="bodytext_bold">
					<tr>
							<td height="25" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;padding-top:3px;padding-bottom:3px;">&nbsp;<?php echo 'Total number of Packages : '.count($result); ?> 
						</td>
					</tr>	
				</table>
			</tr>
		</table>
</div>	
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="listerrorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="listmessagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
