<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	$(document).ready(function() {
	if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
	});		
</script>
<div height="500px" style="width:830px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Promo Code</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form class="cmxform" id="registrationform" onsubmit="return validateForm()" action="attach" method="post">
		<div style="margin-top:0px;margin:10px;padding:10px;padding-bottom:10px;background-color:#F1F1F1;width:792px;">
			<div style="display:inline-flex;width:100%;">
				<div style="margin:8px;margin-top:3px;margin-right:3px;float:left;width:100%;" class="bodytext_bold">
					Enter Promo Code if available <input id="promocode" name="promocode" type="text" class="textarea"  style="width:200px;" maxlength="45" tabindex="1" /><input type="submit" tabindex="16" class="button"  style="margin:8px;margin-top:3px;margin-right:10px;border:none;" style="width: 80px; height: 25px; " value="Ok"/><input type="button" tabindex="16" class="button" onclick="window.location = '/ayushman/cpatientdashboard/view'" style="margin:8px;margin-top:3px;margin-right:10px;border:none;" style="width: 80px; height: 25px; " value="Skip"/>
				</div>
			</div>
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
</div>
