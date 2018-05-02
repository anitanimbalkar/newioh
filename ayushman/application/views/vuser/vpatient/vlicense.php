<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		var acceptcheckbox = new LiveValidation('acceptcheckbox');
		acceptcheckbox.add( Validate.Acceptance );
		var confirmcheckbox = new LiveValidation('confirmcheckbox');
		confirmcheckbox.add( Validate.Acceptance );


	});
	function checkcity(){
		if($('#city').val() == ""){
			alert('Please select city in the dropdown list.');
			return false;
		}else 
			return true;
	}

</script>
<div height="500px">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:3px;padding-right:3px;padding-top:1px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Agreement - Terms & Conditions</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div >
				<form id="searchform"  onsubmit="return checkcity();" name="searchform" action="/ayushman/cplancomponent/apply?planid=<?php echo $planid; ?>" method="post" accept-charset="utf-8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr >	
						<td height="10" class="bodytext_bold" style="padding-top:15px;">
							<input type="checkbox" name="confirmcheckbox" id="confirmcheckbox" value="checkbox" />I confirm that person availing the AyushCare Services is from <select class="textarea" style="width:160px" id="city"> 
								<option value="" >select</option>
								<option value="pune">Pune (Maharashtra, India).</option>
							</select>
						</td>		
					</tr>
					<tr>
						<td height="auto" colspan="4" align="Left" valign="middle" class="bodytext_bold" style="padding:5px;">
							&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;&nbsp;Please read following agreement : -
						</td>
					</tr>
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
							<div class="table_roundBorder" style="overflow-y: scroll;height:330px;padding:5px;">
								<?php echo $license; ?>	
							</div>
						</td>
					</tr>
					

					<tr >	
						<td height="10" class="bodytext_bold" style="padding-top:15px;padding-bottom:15px;">
							<input type="checkbox" name="acceptcheckbox" id="acceptcheckbox" value="checkbox" />I have read Terms &amp; conditions completely and by checking the adjoining box I undertake to abide by them. I wish to subscribe the service.
						</td>		
					</tr>

					<tr>
						<td>
							<div class="bodytext_normal" align="right" style="height:25px;border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;background: #ecf8fb;padding-top:5px; padding-right:10px;vartical-align:middle;align:right;">
								<input type="button" class="button" value="Cancel" style="width:100px;height:20px;" onclick="parent.getcontent('/ayushman/cplanselector/view');" />
								<input type="submit" class="button" value="Proceed" style="width:100px;height:20px;" />
							</div>
						</td>
					</tr>
				</table>
				</form>
			</div>
		</td>
	</tr>
</table>

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
</div>
