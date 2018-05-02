<html>
<head>
<title>Create Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
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
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 560px; overflow-x:hidden;" >

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;<?php echo $objUserForPatient->Firstname_c.' '.$objUserForPatient->middlename_c.' '.$objUserForPatient->lastname_c;  ?>'s Profile</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="padding:0px;padding-top:15px;">
				<div >
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
						<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" >
							<td width="3%" height="25" align="center" valign="middle" >&nbsp;</td>
							<td colspan="3" align="left" valign="middle" class="bodytext_bold" >&nbsp;</td>
						</tr>
						<tr>
							<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="3%" align="left" valign="middle">&nbsp;</td>
										<td width="15%" align="left" valign="top"><img src="<?php if($objUserForPatient->photo_c == ''){echo '/ayushman/assets/images/pic02.png';}else{echo $objUserForPatient->photo_c;} ?>" width="100" height="115"/></td>
										<td colspan="3" align="left"  valign="top" class="bodytext_bold">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="18%" height="21" align="left" valign="middle" class="bodytext_bold">Name</td>
													<td width="2%" height="21" align="left" valign="middle" class="bodytext_normal">:</td>
													<td width="80%" height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objUserForPatient->Firstname_c.' '.$objUserForPatient->middlename_c.' '.$objUserForPatient->lastname_c;  ?></td>
												</tr>
												<tr>
													<td height="21" align="left" valign="middle" class="bodytext_bold">Gender</td>
													<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
													<td height="21" align="left" valign="middle" class="bodytext_normal"><?= trim($objUserForPatient->gender_c);?></td>
												</tr>
												<tr height="30px">
													<td colspan="3" class="bodytext_error" style="display:<?php if(($previousvalues != null)&&isset($previousvalues['isBeneficiary'])){echo ($previousvalues['isBeneficiary']=='true') ?'block':'none';} ?>;" >
														Already added as beneficiary.
													</td>
												</tr>
											</table>
										</td>
										<td valign="top" align="right" padding-top="5px;"  >&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;padding-top:10px;border-radius:0 0 3px 3px;">
								<form class="cmxform" id="form" method="post" enctype="multipart/form-data"  action="/ayushman/cbeneficiary/add">
									<input type="submit" style="width:120px;" onclick="$('#form').get(0).setAttribute('action', 'view');" class="button" value="Back"/>
									<input type="submit" style="width:120px;" <?php if(($previousvalues != null)&&isset($previousvalues['isBeneficiary'])){ echo ($previousvalues['isBeneficiary']=='true')?'disabled':'';} ?> class="<?php if(($previousvalues != null)&&isset($previousvalues['isBeneficiary'])){ echo ($previousvalues['isBeneficiary']=='true')?'disabledbutton':'button';} ?>" value="Add as beneficiary"/>
									<input type="button" class="button" onclick="parent.getcontent('/ayushman/cbeneficiary/list');" height="22" style="width: 100px; height: 25px; " value="Cancel"/>
									
									<input type="hidden" id="patientid" name="patientid" value="<?php if($previousvalues != null)echo $previousvalues['patientid']; ?>"/>
									<input type="hidden" name="iohid" id="iohid" value="<?php if(($previousvalues != null)&&isset($previousvalues['iohid']))echo $previousvalues['iohid']; ?>" class="textarea" />
									<input type="hidden" name="emailid" id="emailid"  value="<?php if(($previousvalues != null)&&isset($previousvalues['emailid']))echo $previousvalues['emailid']; ?>" />
								</form>
							</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
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