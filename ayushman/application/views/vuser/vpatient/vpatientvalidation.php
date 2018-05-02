<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#iohid').focus();
		var iohid = new LiveValidation('iohid',{onlyOnSubmit: true });
			iohid.add( Validate.Presence );
			iohid.add( Validate.Numericality, {onlyInteger: true } );
		var emailid = new LiveValidation('emailid',{onlyOnSubmit: true });
			emailid.add( Validate.Presence );
			emailid.add( Validate.Email );
		$( "input[name=DOB_c]" ).datepicker({yearRange: "-120:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
	function redirect(){
		window.history.back()
	}
</script>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 560px; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Validate Patient</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="width:99%;margin-left:1%;"  class="content_bg">
		<form class="cmxform" id="patientvalidationform" autocomplete="off" method="post" enctype="multipart/form-data"  action="/ayushman/cpatientdirectory/validate">
			<table width="100%">
				<tr width="100%" >
					<td  width="50%" align="left" valign = "bottom" class="bodytext_bold" >IOH ID *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
						<input type="text" style="width:200px;" name="iohid" id="iohid" value="<?php if(($previousvalues != null)&&isset($previousvalues['iohid']))echo $previousvalues['iohid']; ?>" class="textarea" />
					</td>
					<td align="left" width="50%" valign = "bottom" class="bodytext_bold" >&nbsp;
					</td>
				</tr>
				<tr>
					<td  align="left" width="50%" valign = "bottom" class="bodytext_bold" >Email Id *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
						<input type="text" style="width:200px;" name="emailid" id="emailid"  value="<?php if(($previousvalues != null)&&isset($previousvalues['emailid']))echo $previousvalues['emailid']; ?>" class="textarea" />
					</td>
					<td  align="left" width="50%" valign = "bottom" class="bodytext_bold" >&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:5px;" >
						&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:1px;" >
						<HR style="height:0.5px"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:1px;" >
						<input type="button" style="width:100px;"  class="button" value="Back" onclick="redirect();"  />&nbsp;&nbsp;<input type="submit" class="button" height="22" style="width: 100px; height: 25px; " value="Validate"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

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