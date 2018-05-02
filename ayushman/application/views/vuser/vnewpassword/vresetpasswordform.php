<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
var password = new LiveValidation('password',{onlyOnSubmit: true });
		password.add( Validate.Length, { minimum: 8} );
		password.add( Validate.Presence );
		
		var password_confirm = new LiveValidation('password_confirm', {onlyOnSubmit: true });
		password_confirm.add( Validate.Confirmation, { match: 'password' } );
		password_confirm.add( Validate.Length, { minimum: 8} );
		password.add( Validate.Presence );
		
});
</script>
<div class="panel activateformdiv">
    <form  autocomplete="off" id="resetpassword" action="submitresetpassword?id=<?= $id;?>&key=<?= $activationcode;?>" method="post" accept-charset="utf-8">
		<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td colspan="4" class="formHeader">
					&nbsp;<img src="/ayushman/assets/images/Password_icon01.png" width="11" height="17"/>&nbsp;&nbsp;Change Password
				</td>
			</tr>
		  	<tr>
				<td width="6%" height="35" bgcolor="#FFFFFF">&nbsp;</td>
				<td colspan="3" bgcolor="#FFFFFF" class="bodytext_normal">New Password</td>
		  	</tr>
		  	<tr>
				<td height="32" bgcolor="#FFFFFF">&nbsp;</td>
				<td width="65%" valign="top" bgcolor="#FFFFFF" >
					<input type="password" name="password"  class="textarea"  id="password"  minlength="8" maxlength="45"  /> </td>
				<td width="18%" valign="top" bgcolor="#FFFFFF" style="padding-top:5px;">&nbsp;</td>
				<td width="11%" bgcolor="#FFFFFF">&nbsp;</td>
		  	</tr>
		  	<tr>
				<td height="30" bgcolor="#FFFFFF">&nbsp;</td>
				<td colspan="3" bgcolor="#FFFFFF" class="bodytext_normal">Confirm New Password</td>
		  	</tr>
		  	<tr>
				<td height="45" bgcolor="#FFFFFF">&nbsp;</td>
				<td valign="top" bgcolor="#FFFFFF" class="bodytext_style1">
				 	<input type="password" name="password_confirm"  id="password_confirm" class="textarea" required="required"/>
				</td>
				<td valign="top" bgcolor="#FFFFFF" style="padding-top:5px;">&nbsp;</td>
				<td bgcolor="#FFFFFF">&nbsp;</td>
		  	</tr>
		  	<tr>
				<td height="45" colspan="4" bgcolor="#FFFFFF" class="bodytext_style" style="border-top:solid 1px; border-top-color:#ccc; padding-left:37px;">
					<table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="83%" align="center" valign="middle"  ><input type="submit" name="submitresetpassword" value="Reset Password"  class="regnbutton" /></td>
							<td width="17%">&nbsp;</td>
						</tr>
					</table>
				</td>
		  	</tr>
		</table>
	</form>
</div>