<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
		var securityanswer = new LiveValidation('securityanswer', {onlyOnSubmit: true });
		securityanswer.add( Validate.Presence );
		securityanswer.add( Validate.Length, { minimum: 2} );
		
		var verificationcode = new LiveValidation('verificationcode', {onlyOnSubmit: true });
		verificationcode.add( Validate.Presence );
		
		if('<?php echo $email; ?>' == '' )
			document.getElementById('emailtr').style.display = "none";
		if('<?php echo $objUser->mobileno1_c; ?>' == '')
			document.getElementById('mobiletr').style.display = "none";
		
});
function reloadcaptcha() {
	var obj = document.getElementById('captchasecurityimage');
	var src = obj.src;
	var date = new Date();
	obj.src = src + '?v=' + date.getTime();
}
function clearerror(divID)
{
	document.getElementById(divID).innerHTML = '';
}
</script>
<div class="panel activateformdiv" align="center">
<form id="verifyuserquestionform" action="submitverifyuserquestionform?id=<?= $userid;?>" method="post" accept-charset="utf-8">
<table width="570" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
  	<tr>
    	<td colspan="2" class="formHeader">
    		<img src="/ayushman/assets/images/forgotPassword_icon.png" width="14" height="14"/>&nbsp;&nbsp;Recover Password 
    	</td>
  	</tr>
	<tr>
		<td height="35" colspan="2" bgcolor="#FFFFFF" class="bodytext_normal" style="padding-left:32px;">To reset your password, enter the answer for security question</td>
	</tr>
	<tr >
		<td height="35" colspan="2" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;" >
			&nbsp;<span class="bodytext_normal">&nbsp;Username : </span><span class="bodytext_normal"style="padding-left:8.5%;"><?= $objUser->username;?></span>
		</td>
	</tr>
	<tr id="emailtr">
		<td height="35" colspan="2" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;" >
			&nbsp;<span class="bodytext_normal">&nbsp;EmailID : </span><span class="bodytext_normal"style="padding-left:11%;"><?php echo substr_replace($email,'*****',2,6);?></span>
		</td>
	</tr>
	<tr id="mobiletr">
		<td height="35" colspan="2" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;" >
			&nbsp;<span class="bodytext_normal">&nbsp;Mobile Number : </span><span class="bodytext_normal"style="padding-left:3%;"><?php echo substr_replace($objUser->mobileno1_c,'*****',2,5);?></span>
		</td>
	</tr>
	<tr>
		<td height="20" colspan="2" bgcolor="#FFFFFF" class="bodytext_normal" style="border-bottom:solid 1px; border-bottom-color:#CCC; padding-left:32px;">
			<div class="bodytext_error" style="padding-left:10px;" ><?= Arr::get($errors, 'pageerror'); ?></div>
		</td>
	</tr>
	<tr>
		<td height="33" colspan="2" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;">
			<table>
				<tr>
					<td width="130" ><span class="bodytext_bold"><strong>Secret Question</strong></span></td>
					<td>: <span class="bodytext_normal"><?= $securityquestion;?> </span>
					</td >
				</tr>
			</table> 
		</td>
	</tr>
	<tr>
		<td height="25" colspan="2" valign="top" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;">
			<table>
				<tr>
					<td width="130" class="bodytext_bold"><strong class="bodytext_bold">Answer </strong> </td>
					<td>: <input type="text" name="securityanswer" id="securityanswer" class="textarea"  autocomplete="off" onfocus="clearerror('securityanswerError');"  /><div class="bodytext_error" style="padding-left:10px;" id="securityanswerError"><?= Arr::path($errors, 'securityanswer'); ?></div></span>
					</td>
				</tr>
			</table> 
		</td>
	</tr>
	<tr>
		<td height="33" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;"><strong class="bodytext_bold">Prove You're not a robot *</strong></td>
		<td height="33" bgcolor="#FFFFFF" class="bodytext_normal">&nbsp;</td>
	</tr>
	<tr>
		<td height="25" colspan="2" valign="top" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;">
		<table>
			<tr>
				<td width="130"  class="bodytext_bold"><img id="captchasecurityimage" src="/ayushman/ccreatecaptchasecurityimage/generate" /></td>
				<td>: <input type="text" class="textarea" name="verificationcode" id="verificationcode"  autocomplete="off" onfocus="clearerror('verificationcodeerror');" /><div class="bodytext_error" style="padding-left:10px;" id="verificationcodeerror" ><?= Arr::path($errors, 'verificationcode'); ?></div></span>
				</td >
			</tr>
		</table> 	  		
		</td>
	</tr>
	<tr>
		<td height="25" colspan="2" valign="top" bgcolor="#FFFFFF" class="bodytext_style" style="padding-left:32px;">
		<table>
			<tr>
				<td width="130"  class="bodytext_bold"><input type="button" class="regnbutton" value="Reload" onclick="reloadcaptcha()" /></td>
				<td>&nbsp;</td >
			</tr>
		</table> 	  		
		</td>
	</tr>
	<tr>
		<td height="45" colspan="2" align="left" bgcolor="#FFFFFF" class="bodytext_style1" style="border-top:solid 1px; border-top-color:#ccc;">
			<table width="100" border="0" align="left" cellpadding="0" cellspacing="0" style="padding-left:32px;">
				<tr>
					<td width="10%" align="center" valign="middle"> <input type="submit" name="submitverifyuserquestionform" value="Continue"  class="regnbutton" /></td>
					<td width="90%">&nbsp;</td>
				</tr>
			</table>
		</td>
  	</tr>
</table>
</form>
</div>