<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(function(){
			var verificationcode = new LiveValidation('verificationcode',{onlyOnSubmit: true });
			verificationcode.add( Validate.Length, { maximum: 20} );
			verificationcode.add( Validate.Presence );	
			
			if('<?php echo $objuser->email; ?>' == '' )
				document.getElementById('emailTr').style.display = "none";
			if('<?php echo $objuser->mobileno1_c; ?>' == '')
				document.getElementById('mobileNumberTr').style.display = "none";
			
	});
</script>
<form id="checkotpform" action="submitcheckotpform" method="post" accept-charset="utf-8">
	<div class="panel activateformdiv" style="margin-left:30%"" >
	<div  style="border:1px solid #284889; height:auto;overflow:auto;overflow-x:hidden;vertical-align:center;" align="center" >
		<table   valign="top" width="600px" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="formHeader" colspan="2" align="left" style="padding-left:10px;"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="10" height="7"/>&nbsp;&nbsp;&nbsp;&nbsp;Recover password</td>
			</tr>
			<tr>
				<td align="left" colspan="2" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:5px;">
						<span class="bodytext_normal"> The verification code has been sent to your mobile/email .<br/>Please enter verification code to reset password.</span>
				</td>
			</tr>
		</table>
		<table class="content_bg"  valign="top" width="500px" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" width="25%" class="bodytext_normal" style="padding-left:25px;padding-top:7px; padding-bottom:5px;" >
					Username
				</td>
				<td align="left" width="75%" class="bodytext_normal" style="padding-top:7px; padding-bottom:5px;" >
					: <?= $objuser->username;?>
				</td>
			</tr>
			<tr id="mobileNumberTr">
				<td align="left" class="bodytext_normal" style="padding-left:25px;  padding-top:7px; padding-bottom:5px;">
					<span class="text">Mobile Number</span>
				</td>
				<td align="left" class="bodytext_normal" style="">
					: <?= $objuser->mobileno1_c;?>
				</td>
			</tr>
			<tr id="emailTr">
				<td align="left" class="bodytext_normal" style="padding-left:25px;  padding-top:7px; padding-bottom:5px;">
					<span class="text">Email</span>
				</td>
				<td align="left" class="bodytext_normal" style="">
					: <?= $objuser->email;?>
				</td>
			</tr>
			<tr >
				<td align="left" class="bodytext_normal" style="padding-left:25px;  padding-top:7px; padding-bottom:5px;">
					<span class="text">Verification code</span>
				</td>
				<td align="left" class="bodytext_normal" >
					: <input id="verificationcode" name="verificationcode" type="text" class="textarea" size="25" >&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($error, 'verificationcode'); ?></font>
				</td>
			</tr>
		
		</table>
		<table class="content_bg"  valign="top" width="500px" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="500"><hr width="500" style="color:#11587E"/></td>
			</tr>
			<tr>
				<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;"><input type="hidden" id="userid" name="userid" value="<?php echo $objuser->id; ?>"> <input type="submit" class="regnbutton"  value="Reset Password" /></td>
			</tr>                 
		</table>
	</div>
</div>
                </form>
