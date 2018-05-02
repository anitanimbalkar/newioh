<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script src="/ayushman/assets/js/jquery.tools.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
$("#verifyuserform").validator({ position:'center right' });
});
function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}
</script>
 <div id="body_bgcantaccessaccountpage">
        <table width="100%" height="36" border="1" cellpadding="0" cellspacing="0" bordercolor="#284889">
          <tr>
            <td bgcolor="#edd364" class="Member_login">&nbsp;&nbsp;&nbsp;Recover your password</td>
          </tr>
        </table>       
        <form id="verifyuserform" action="submitverifyuseremailform" method="post" accept-charset="utf-8">
        <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
            <table width="75%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="16%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="2%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="27%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="31%" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td colspan="3" bgcolor="#FFFFFF" class="Heading_Small">Forgot your password? </td>
                  <td width="1%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                 <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="text">To reset your password, enter the emailID you use to Log in to <strong><i>India Online Health</i></strong>.</td>
                  <td width="1%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
               <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::get($errors, 'pageerror'); ?>
										</div></td>
  					<td bgcolor="#FFFFFF">&nbsp;</td>                
				</tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF"><span class="text">Email</span></td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF">
 				 <input type="email" name="email"  required="required" />
  					<td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::get($errors, 'email'); ?>
										</div></td>                
				</tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td bgcolor="#FFFFFF">
                  	<div>
                  			<img id="captchasecurityimage" src="/ayushman/ccreatecaptchasecurityimage/generate" />
                  	</div>
                  </td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text"></td>
                  <td align="left" bgcolor="#FFFFFF"></td>
                  <td bgcolor="#FFFFFF"><input type="button" value="reload image!" onclick="reloadcaptcha()" /></td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">Word Verification</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF">
                  <input type="text" name="verificationcode" maxlength="45" required="required" />
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::path($errors, 'verificationcode'); ?>
										</div></td>
                </tr>
               <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="16%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="2%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="27%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="31%" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
                 
                  <td colspan="2" bgcolor="#FFFFFF"> <input type="submit" name="submitverifyuserform" value="Continue" />
													<!--<img src="/ayushman/assets/images/Btn_IACreateMAccount.png" width="213" height="27" border="0" />--></td>
                </tr>
                <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="16%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="2%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="27%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="31%" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="16%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="2%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="27%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="31%" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        </form>
      </div>
