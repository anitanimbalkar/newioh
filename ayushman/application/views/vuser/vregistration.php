<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script src="/ayushman/assets/js/jquery.tools.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
$("#registrationform").validator({ position: 'center right' });
});
$.tools.validator.fn("[minlength]", function(input, value) {
	var min = input.attr("minlength");
	
	return value.length >= min ? true : {     
		en: "Please provide at least " +min+ " character" + (min > 1 ? "s" : ""),
		fi: "Kentän minimipituus on " +min+ " merkkiä" 
	};
	
});
$.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
	var name = input.attr("data-equals"),
		 field = this.getInputs().filter("[name=" + name + "]"); 
	return input.val() == field.val() ? true : [name]; 
});
function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}
</script>
   <div id="body_bg18rdpage">
        <table width="100%" height="36" border="1" cellpadding="0" cellspacing="0" bordercolor="#284889">
          <tr>
            <td bgcolor="#edd364" class="Member_login">&nbsp;&nbsp;&nbsp;Create an Account</td>
          </tr>
        </table>       
        <form id="registrationform" action="submitbuttononclick" method="post" accept-charset="utf-8">
        <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><table width="75%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="24%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="16%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="2%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="27%" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="31%" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">First Name</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF">
										<input type="text" name="username" minlength="2" maxlength="45" required="required" />
                  </td>
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::get($errors, 'username'); ?>
										</div>
        		  </td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">Last Name</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF">			
                 		 <input type="text" name="lastname" minlength="2" maxlength="45" required="required" />
                  </td>
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::get($errors, 'lastname'); ?>
										</div></td>
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
                  <td bgcolor="#FFFFFF" class="text style2">Your Email ID will become your  AYUSHMAN  login ID </td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">Choose a Password</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF">
                   <input type="password" name="password" minlength="8" maxlength="45" required="required" /> 
										
                  </td>
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::path($errors, 'password'); ?>
										</div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">Re enter  Password</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF"><?= Form::label('password_confirm', ''); ?>
                    <input type="password" name="password_confirm" data-equals="password" required="required"/> 
										</td>
                  <td bgcolor="#FFFFFF"><div class="error">
										<?= Arr::path($errors, 'password_confirm'); ?>
										</div></td>
                </tr>
                <tr>
                 <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">Account Type</td>
                  <td align="left" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF"><span class="text">
                  <?php echo Form::select('accounttype', array(
  						'patient'=>'Patient',
  						'doctor'=>'Doctor'
  						), 'patient'); ?></td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
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
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" align="left" valign="top" bgcolor="#FFFFFF" class="text">Terms and conditions</td>
                  <td align="left" valign="top" bgcolor="#FFFFFF">:</td>
                  <td bgcolor="#FFFFFF"><textarea rows="6" cols="50">lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum 
						lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum lorem Epsum
                  </textarea></td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                  <td height="30" bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
                 
                  <td colspan="2" bgcolor="#FFFFFF"> <input type="submit" name="submitbuttononclick" value="I Agree.Create My Account" />
													<!--<img src="/ayushman/assets/images/Btn_IACreateMAccount.png" width="213" height="27" border="0" />--></td>
                </tr>
                
              </table></td>
          </tr>
        </table>
        </form>
      </div>
