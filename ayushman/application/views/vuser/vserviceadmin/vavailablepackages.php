<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
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
<div style="width:828px;height:auto; overflow-x:hidden;padding-right:10px;;" > 
	<div style="width:100%;margin-top:18px;">
		<table width="100%"  align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<table id = "searchresult" style="width:100%;display:block" class="bodytext_normal">
					<tr class="Heading_Bg">
							<td width="15%" align="middle" style="padding:5px;">Name</td>
							<td width="50%" align="middle" style="padding:5px;">Description</td>
							<td width="23%" align="middle" style="padding:5px;"></td>
						</tr>
					<tr>
						<td>
							<?php 
								$helper_package = new helper_Package();
								$result = $helper_package->get_availablepackages(Auth::instance()->get_user()->id);

								if(count($result) == 0){
								  echo '<tr><td colspan="3"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
								}else{
									for($i=count($result)-1;$i>=0;$i--){
										if($i%2 != 0 ){
											echo "<tr style = 'background-color:#ecf8fb;'>";
										}else{
											echo "<tr>";
										}
										$isSubscribed = $helper_package->isSubscribed($result[$i]->id);
										if($isSubscribed == true){
											$subscribe = 'Subscribed';
										}else if($isSubscribed == false){
											$subscribe = '<form id="'.$result[$i]->id.'" name="'.$result[$i]->id.'" action="/ayushman/cpackage/subscribe" method="post" accept-charset="utf-8"><input  id="id" name="id" type="hidden" value="'.$result[$i]->id.'"/><a href="#" onclick=document.getElementById("'.$result[$i]->id.'").submit() style="float:center;"><span style="color:blue">Subscribe</span></a></form>';
										}else{
											$subscribe = $isSubscribed;
										}										
										
										echo '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$result[$i]->name_c.'</td>
												<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->description_c.'</td>	
												<td align="middle" style="padding:5px;" class="bodytext_bold">'.$subscribe.'</td>';	
										echo "</tr>";
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
