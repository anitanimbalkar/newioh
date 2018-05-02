<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<div style="width:810px;height:auto; vertical-align:middle;padding:7px;margin:3px; overflow-x:hidden;" class="Heading_Bg"> 
	&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Camp Booking
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
		if($.trim($('#bookingerrorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#bookingerrorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#bookingmessagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#bookingmessagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
<form id="form" name="form" action="bookcamp" method="post" accept-charset="utf-8">
	<input type="hidden" id="packageid_c" name="packageid_c" value = "<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'packageid_c'); ?>" />
	<input type="hidden" id="userid_c" name="userid_c" value = "<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'userid_c'); ?>" />
	<input type="hidden" id="id" name="id" value = "<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'id'); ?>" />
	<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
		<div style="height:auto;width:inherit;"  >	
			<div style="height:auto;width:100%;float:left;padding:7px;">
				<span class="bodytext_normal"></span><span class="bodytext_bold"><?php echo $packageinfo['name_c']; ?>&nbsp;( <?php echo 'Published for corporates'; ?>)</span>
			</div>
			<div style="height:auto;width:100%;float:left;padding-left:7px;padding-right:7px;">
				<hr/>
			</div>
			<div style="height:auto;width:100%;float:left;padding:7px;">
				<span class="bodytext_bold"><?php echo $packageinfo['description_c']; ?></span>
			</div>
		</div>
		<div style="height:auto;width:inherit;float:right;" >				  
			<table width="100%">
				<tr>
					<td width="15%" align="left" style="padding:5px;" class="bodytext_bold" >Camp Name</td>
					<td width="67%" align="left" style="padding:5px;" class="bodytext_bold">	<input  id="name_c" name="name_c" style="width:200px" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'name_c'); ?>" type="text" class="textarea" maxlength="45"/></td>
					<td width="15%" align="left" style="padding:5px;vertical-align:top;" class="bodytext_bold" >Date</td>
					<td width="67%" align="left" style="padding:5px;" class="bodytext_bold"><input  id="date_c" name="date_c" style="width:200px" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'date_c'); ?>" type="text" class="textarea" maxlength="45"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div style="background-color: #ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:819px;height:auto; vertical-align:middle;padding:2px;margin:3px; overflow-x:hidden;">
		<input type="submit" value="Book A camp" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
		<input type="button" value="back" onclick="window.location = '<?php $session = Session::instance();	$back = $session->get('backurls');echo $back[count($back)-2]; ?>'" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
	</div>
</form>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="bookingerrorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="bookingmessagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
