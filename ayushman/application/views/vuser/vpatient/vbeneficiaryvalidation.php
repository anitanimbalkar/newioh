<html>
<head>
<title>Beneficiary Validation...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Validate Beneficiary</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div >
				<form class="cmxform" id="beneficiaryvalidationform" method="post" enctype="multipart/form-data"  action="/ayushman/cbeneficiary/validate">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" >
						<td width="3%" height="25" align="center" valign="middle" >&nbsp;</td>
						<td colspan="3" align="left" valign="middle" class="bodytext_bold" >&nbsp;</td>
					</tr>
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
							
								<table width="100%" cellpadding="5px">
									<tr width="100%" >
										<td  width="50%" align="left" valign = "bottom" class="bodytext_normal" >IOH ID *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
											<input type="text" style="width:200px;" name="iohid" id="iohid" value="<?php if(($previousvalues != null)&&isset($previousvalues['iohid']))echo $previousvalues['iohid']; ?>" class="textarea" />
										</td>
										<td align="left" width="50%" valign = "bottom" class="bodytext_normal" >&nbsp;
										</td>
									</tr>
									<tr>
										<td  align="left" width="50%" valign = "bottom" class="bodytext_normal" >Email Id *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
											<input type="text" style="width:200px;" name="emailid" id="emailid"  value="<?php if(($previousvalues != null)&&isset($previousvalues['emailid']))echo $previousvalues['emailid']; ?>" class="textarea" />
										</td>
										<td  align="left" width="50%" valign = "bottom" class="bodytext_normal" >&nbsp;
										</td>
									</tr>
								</table>
							
						</td>
					</tr>
					<tr>
						<td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;border-radius:0 0 3px 3px;">
							<input type="button" class="button" onclick="parent.getcontent('/ayushman/cbeneficiary/list');" height="22" style="width: 100px; height: 25px; " value="Back"/>
							<input type="submit" class="button" height="22" style="width: 100px; height: 25px; " value="Validate"/>
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