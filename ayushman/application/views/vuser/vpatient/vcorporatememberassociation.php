<html>
<head>
<title>Create Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 585px; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Employee Association</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="width:99%;margin-left:1%;"  class="content_bg">
		<form class="cmxform" id="companyprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/disassociate">
			<div style="width:99%;height: 450px; overflow-x:hidden;" > 
				  <table width="98%" class="content_bg" border="0" align="center" cellpadding="0" cellspacing="0" >
					<tr>
					  <td colspan="5" class="bodytext_normal"><label name="lblname" id="lblname" class="bodytext_bold">Company Details</label></td>
					</tr>
					<tr>
					  <td colspan="5" class="bodytext_normal"><HR style="height:0.5px"/></td>
					</tr>
					
					<tr>
					  <td width="24" height="30">&nbsp;</td>
					  <td width="96" height="30" class="bodytext_normal">Company Name  : </td>
					  <td width="312" height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?></label><input type="hidden" name="corporatename_c" id="corporatename_c" value="<?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>"/></td>
					  <td width="83" height="30" class="bodytext_normal">Office Phone  : </td>
					  <td width="285" height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['corporateworkphone_c']; ?></label></td>
					</tr>
					<tr>
					  <td height="30">&nbsp;</td>
					  <td height="30" class="bodytext_normal">Address Line1  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['line1_c']; ?></label></td>
					  <td height="30" class="bodytext_normal">Landmark  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['nearlandmark_c']; ?></label></td>
					</tr>
					<tr>
					  <td height="30">&nbsp;</td>
					   <td class="bodytext_normal">Locality  : </td>
					  <td><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['location_c']; ?></label></td>
					  <td class="bodytext_normal">City  : </td>
					  <td><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['city_c']; ?></label></td>
					</tr>
					<tr> 
						<td height="30">&nbsp;</td>
					  <td height="30" class="bodytext_normal">State  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['state_c']; ?></label></td>
					  <td height="30" class="bodytext_normal">Country  :</td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['country_c']; ?></label></td>
					</tr>		
					<tr>
					  <td height="30">&nbsp;</td>
					  <td class="bodytext_normal">Pin  : </td>
					  <td><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['pin_c']; ?></label></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="5">&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="5" class="bodytext_normal"><label name="lblname" id="lblname" class="bodytext_bold">Contact Person Details</label></td>
					</tr>
					<tr>
					  <td colspan="5"><HR style="height:0.5px"/></td>
					</tr>
					
					<tr>
					  <td height="30">&nbsp;</td>
					  <td height="30" class="bodytext_normal">Person Name  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['contactpersonname_c']; ?></label></td>
					  <td height="30" class="bodytext_normal">Email Id  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['contactpersonemailid_c']; ?></label></td>
					</tr>
					<tr>
					  <td height="30">&nbsp;</td>
					  <td height="30" class="bodytext_normal">Office Phone  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['contactpersonoffphoneno_c']; ?></label></td>
					  <td height="30" class="bodytext_normal">Mobile Number  : </td>
					  <td height="30"><label name="lblname" id="lblname" class="bodytext_bold"><?php if($previousvalues != null)echo $previousvalues['contactpersonmobno_c']; ?></label></td>
					</tr>
					<tr>
					  <td colspan="5"><HR style="height:0.5px"/></td>
					</tr>
					<tr>
					  <td colspan="5">You are associated with <?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>. You can apply corporate plans applicable to <?php if(($previousvalues != null)&&isset($previousvalues['corporatename_c']))echo $previousvalues['corporatename_c']; ?>.</label></td>
					</tr>
					<tr>
					  <td colspan="5">&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="5"><input type="submit" class="button" height="22" style="width: 100px; height: 25px; " value="Disassociate"/>&nbsp;&nbsp;&nbsp;<input type="button" class="button" onclick="parent.getcontent('/ayushman/cplanselector/view');" height="22" style="width: 100px; height: 25px; " value="Select Plan"/></td>
					</tr>
					<tr>
					  <td colspan="5">&nbsp;</td>
					</tr>
				  </table>
				  <input type="hidden" name="corporateid" id="corporateid" value="<?php if($previousvalues != null)echo $previousvalues['corporateid']; ?>">
				</div>
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