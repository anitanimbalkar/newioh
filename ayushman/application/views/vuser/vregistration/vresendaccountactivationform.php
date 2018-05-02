<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {	
		var verificationcode = new LiveValidation('verificationcode', {onlyOnSubmit: true });
		verificationcode.add( Validate.Presence );
		if( '<?php echo $objuser->email; ?>' == '')
		{
			document.getElementById('emailTr').style.display = "none";
		}
		if( '<?php echo $objuser->mobileno1_c; ?>' == '')
		{
			document.getElementById('mobileNumberTr').style.display = "none";
		}
		
});
function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}
</script>
<form id="resendaccountactivationform" action="submitresendaccountactivationform" method="post" accept-charset="utf-8">
	<div style="height:370px;padding-top:30px;vertical-align:center;" align="center">
	<div class="content_bg" style="border:1px solid #284889; height:auto;overflow:auto;overflow-x:hidden;vertical-align:center;" align="center" >
		<table class="content_bg"  valign="top" width="500px" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="Heading_Bg" colspan="2" align="left" style="padding-left:10px;"><img src="/ayushman/assets/images/forgotPassword_icon.png" width="14" height="14"/>&nbsp;&nbsp;&nbsp;&nbsp;Account Not Activated</td>
			</tr>
			<tr>
				<td align="left" colspan="2" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:5px;">
						<span class="bodytext_normal"> Please acivate your account or you can also resend activation.</span>
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
					: <?= $objuser->isdmobileno1_c.'-'.$objuser->mobileno1_c;?>
				</td>
			</tr>
			<tr id="emailTr">
				<td align="left" class="bodytext_normal" style="padding-left:25px;  padding-top:7px; padding-bottom:5px;">
					<span class="text">Email Id</span>
				</td>
				<td align="left" class="bodytext_normal">
					: <?= $objuser->email;?>
				</td>
			</tr>
		
		</table>
		<table class="content_bg"  valign="top" width="500px" border="0" cellspacing="0" cellpadding="0">
			
			<tr>
			<td  align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
				<table valign="top"  border="0" cellspacing="0" cellpadding="0" valign="top" >
					<tr valign="top" >
						<td  class="bodytext_normal" valign="top" >Prove You're not a robot *</td>
						<td width="227" valign="top">
								<div>
									<img id="captchasecurityimage" src="/ayushman/ccreatecaptchasecurityimage/generate" />
								</div>
								<input type="button" class="button" value="Reload" onclick="reloadcaptcha()" />
								<div class="bodytext_error">
									<?= Arr::path($error, 'verificationcode'); ?>
								</div>
							</td>
					</tr>
				</table>
				</td>		
			</tr>	
			<tr>
			<td  align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
				<table valign="top"  border="0" cellspacing="0" cellpadding="0" >
					<tr>
						<td  class="bodytext_normal">&nbsp;</td>
						<td width="227" valign="top" style="padding-left:130px; ">
							<input type="text" class="textarea" name="verificationcode" id="verificationcode"/>
						</td>
					</tr>
				</table>
				</td>		
			</tr>
			<tr>
				<td width="500"><hr width="500" style="color:#11587E"/></td>
			</tr>
			<tr>
				<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;"> <input type="submit" class="button" name="submitresendaccountactivationform" value="Resend" /></td>
			</tr>                 
		</table>
	</div>
</div>
                </form>