<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />



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
		
		$('#accounttype').focus();
		document.getElementById("emailerror").style.display= "none";
		document.getElementById("termsforpatientregisterby").style.display= "block"; 
		var inputs = document.getElementsByTagName('input');
		for (var i = 0; i < inputs.length; ++i) {
			var currentinputtag= inputs[i];
			if(currentinputtag.required==true){
				currentinputtag.style.borderColor='red';
			}
		}
		$("#email").keypress(function() {
		   document.getElementById("emailerror").style.display= "none";
		});
		document.getElementById("termsread").value="";
		$('#wrappertermforpat').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: 1000,
			modal: false,
			height: "auto",
			resize: "auto",
			resizable: false,
			title : "Terms and Conditions",
			buttons: {
						"Close": function() {
							$(this).dialog("close");
						}						
					}
			
		});
		$('#wrappertermsforchemist').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: 1000,
			modal: false,
			height: "auto",
			resize: "auto",
			resizable: false,
			title : "Terms and Conditions",
			buttons: {
						"Close": function() {
							$(this).dialog("close");
						}						
					}
		});	
		$('#wrappertermsforpathologist').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: 1000,
			modal: false,
			height: "auto",
			resize: "auto",
			resizable: false,
			title : "Terms and Conditions",
			buttons: {
						"Close": function() {
							$(this).dialog("close");
						}						
					}
		});	
		$('#wrappertermsfordoctor').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: 1000,
			modal: false,
			height: "auto",
			resize: "auto",
			resizable: false,
			title : "Terms and Conditions",
			buttons: {
						"Close": function() {
							$(this).dialog("close");
						}						
					}
		});	
		var password = new LiveValidation('password',{onlyOnSubmit: true });
		password.add( Validate.Length, { minimum: 8} );
		password.add( Validate.Presence );
		
		var password_confirm = new LiveValidation('password_confirm', {onlyOnSubmit: true });
		password_confirm.add( Validate.Confirmation, { match: 'password' } );
		password_confirm.add( Validate.Length, { minimum: 8} );
		password.add( Validate.Presence );
		
		var firstname = new LiveValidation('firstname', {onlyOnSubmit: true });
		firstname.add( Validate.Presence );
		firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
		
		var lastname = new LiveValidation('lastname',{onlyOnSubmit: true });
		lastname.add( Validate.Presence );
		lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
		
		var mobilenumber = new LiveValidation('mobilenumber', {onlyOnSubmit: true });
		mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
		mobilenumber.add( Validate.Length, { is: 10 });
		mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
		mobilenumber.add( Validate.Presence );
		
		var email = new LiveValidation('email', {onlyOnSubmit: true });
		email.add( Validate.Presence );
		email.add( Validate.Email );
		
		var secureanswer = new LiveValidation('secureanswer', {onlyOnSubmit: true });
		secureanswer.add( Validate.Presence );
		secureanswer.add( Validate.Length, { minimum: 2} );
		
		var acceptcheckbox = new LiveValidation('acceptcheckbox');
		acceptcheckbox.add( Validate.Acceptance );
		
		var verificationcode = new LiveValidation('verificationcode', {onlyOnSubmit: true });
		verificationcode.add( Validate.Presence );
		
		var country = new LiveValidation('country', {onlyOnSubmit: true });
		country.add( Validate.Presence );
		$("#country option:not([disabled])").css("color", "#000");
		$("#country").change(function() {
		    $(this).removeClass('gray');
		});

		var securequestion = new LiveValidation('securequestion', {onlyOnSubmit: true });
		securequestion.add( Validate.Presence );
		$("#securequestion option:not([disabled])").css("color", "#000");
		$("#securequestion").change(function() {
		    $(this).removeClass('gray');
		});

		 $(function() {
			if (!$.support.placeholder) {
				var active = document.activeElement;
				$(':text').focus(function() {
					if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
						$(this).val('').removeClass('hasPlaceholder');
					}
				}).blur(function() {
					if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
						$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
					}
				});
				$(':text').blur();
				$(active).focus();
			}
		});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
	});
	function validateForm(){
		if(document.getElementById("emailerror").style.display == 'block'){
			alert("Selected email id is not unique.");
			return false;
		}else{
			$(".ui-dialog-titlebar").hide();
			$('#loading').dialog('open');
			return true;
		}
	}

	function openterms()
	{
		document.getElementById("termsread").value="1";
		var role1 = document.getElementById("accounttype");
		var role = role1.options[role1.selectedIndex].value;
		var wWidth = $(window).width();
		var dWidth = 1030;
		var wHeight = $(window).height();
		var dHeight = wHeight * 0.99;
		wWidth = (wWidth - dWidth)/2;
		
		switch(role)
		{
			case "patient":
				$("#wrappertermforpat").dialog("option", "width", dWidth);
				$("#wrappertermforpat").dialog("option", "height", dHeight);
				$("#wrappertermforpat").dialog('option', 'position', [wWidth,0]);
				$('#wrappertermforpat').dialog('open');
				break;
			case "chemist":
				$("#wrappertermsforchemist").dialog("option", "width", dWidth);
				$("#wrappertermsforchemist").dialog("option", "height", dHeight);
				$("#wrappertermsforchemist").dialog('option', 'position', [wWidth,0]);
				$('#wrappertermsforchemist').dialog('open');
				break;
			case "pathologist":
				$("#wrappertermsforpathologist").dialog("option", "width", dWidth);
				$("#wrappertermsforpathologist").dialog("option", "height", dHeight);
				$("#wrappertermsforpathologist").dialog('option', 'position', [wWidth,0]);
				$('#wrappertermsforpathologist').dialog('open');
				break;
			case "doctor":
				$("#wrappertermsfordoctor").dialog("option", "width", dWidth);
				$("#wrappertermsfordoctor").dialog("option", "height", dHeight);
				$("#wrappertermsfordoctor").dialog('option', 'position', [wWidth,0]);
				$('#wrappertermsfordoctor').dialog('open');
				break;
			case "staff":
				$("#wrappertermsfordoctor").dialog("option", "width", dWidth);
				$("#wrappertermsfordoctor").dialog("option", "height", dHeight);
				$("#wrappertermsfordoctor").dialog('option', 'position', [wWidth,0]);
				$('#wrappertermsfordoctor').dialog('open');
				break;
		}
	}
	function checkPhoneNumber(userphonenumber,dropdown)
	{
		
		var countryCode = document.getElementById(dropdown);
		var countryCodeValue = countryCode.options[countryCode.selectedIndex].value;
		if(countryCodeValue !="")
		{
			document.getElementById("defaultCountry").value = countryCodeValue;
			document.getElementById("phoneNumber").value = userphonenumber.value;
			phoneNumberParser();
			var a  = document.getElementById("output").value;
			if (a.indexOf('Result from isValidNumber(): true') > -1) {
		  		//correct phone number
			} 
			else
			{
				if( userphonenumber.value != "")
		  		{
					alert("Please enter valid contact number");
		 	 		userphonenumber.focus();
				}
			}	
		}
		else{
			alert("please select country")
		}
	}
</script>
<script type="text/javascript">
function checkEmail(email){
	$(".ui-dialog-titlebar").hide();
	$( "#loading" ).dialog({ modal: false });
	$('#loading').dialog('open');
	$.ajax({
		url: "/ayushman/cregistrar/checkemailavailability?email="+email.value,
		success: function(data) {
			$('#loading').dialog('close');
			if(data=="invalid"){
				document.getElementById("emailerror").style.display = "block";
				//$('#email').focus();
			}
			else{
				document.getElementById("emailerror").style.display = "none";
				$('#password').focus();
			}
			$( "#loading" ).dialog({ modal: true });
		},
		error : function(){
			$('#loading').dialog('close');
			$( "#loading" ).dialog({ modal: true });
			showMessage('250','50','Check email id availability','Error occured while checking email id availability, Please contact system administrator.','error','errordialogboxid');
		}
	});
}
function selectedname(name){
	checkUsername(name.innerHTML);
	document.getElementById("username").value = name.innerHTML;
}

function  possibleusername(){
	var name=document.getElementById("firstname").value+document.getElementById("lastname").value;
	var isusernamespresent = document.getElementById("isusernamespresent").value;
	var newusername, usernamestring,returnstring;
	usernamestring="Here are some suggestions.</br>";
	if((name!="")&&(isusernamespresent == "false"))
	{
		$(".ui-dialog-titlebar").hide();
		$( "#loading" ).dialog({ modal: false });
		$('#loading').dialog('open');
		var count =1;
		var ischeck= 0;
		while (count< 4)
		{
			switch(ischeck)
			{
				case 0:newusername = document.getElementById("firstname").value+document.getElementById("lastname").value;
					break;
				case 1:newusername = document.getElementById("lastname").value+document.getElementById("firstname").value;
					break;
				case 2:newusername = document.getElementById("firstname").value+"."+document.getElementById("lastname").value;
					break;
				case 3:newusername = document.getElementById("lastname").value+"."+document.getElementById("firstname").value;
					break;
				default:var randumNumber=Math.floor((Math.random()*100)+1);
					newusername = document.getElementById("firstname").value+randumNumber+"."+document.getElementById("lastname").value;
					break;
			}
			returnstring = findusername(newusername);
			newusername = newusername.toLowerCase();
			if (returnstring == "valid")
			{
				usernamestring = usernamestring+" <a onclick='selectedname(this)' style='cursor:pointer;' >"+newusername+"</a></br>";
				count ++;
			}
			ischeck++;
		}
		document.getElementById("isusernamespresent").value= "true";
		document.getElementById("possiblenames").innerHTML=usernamestring;
		document.getElementById("rowusernamepossiblecombination").style.display = "block";
		$('#loading').dialog('close');
	}
}

function findusername(newusername)
{
	var returnstring;
	$.ajax({
		url: "/ayushman/cregistrar/checkusernameavailability?username="+newusername,
		async: false,
		success: function(data) {
			$('#loading').dialog('close');
			if(data =="invalid"){
				returnstring = "invalid";
			}
			else{
				returnstring = "valid";
			}
		},
		error : function(){
			returnstring= "invalid";
		}
		});
	return returnstring;
}
                 
function checkUsername(username){
	$(".ui-dialog-titlebar").hide();
	$( "#loading" ).dialog({ modal: false });
	$('#loading').dialog('open');
	
	$.ajax({
		url: "/ayushman/cregistrar/checkusernameavailability?username="+username.value,
		success: function(data) {
			$('#loading').dialog('close');
			if(data=="invalid"){
				document.getElementById("usernameerror").style.display = "block";
			}
			else{
				document.getElementById("usernameerror").style.display = "none";
				$('#country').focus();
			}
			$( "#loading" ).dialog({ modal: true });
		},
		error : function(){
			$('#loading').dialog('close');
			$( "#loading" ).dialog({ modal: true });
		}
	});
}
function OnAccounttypeChange(){
	$('#rolelable').html($("#accounttype option:selected").text());
    return true;
}
function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}
</script>
<style type="text/css">
	.gray {
	    color:#ccc;
	}
</style>
<div  style="width:970px; height:auto;border:1; align:left;" > 
	<form class="cmxform" id="registrationform" onsubmit="return validateForm()" action="/ayushman/cregistrar/saveincompleteregistration" method="post">
		<input type="hidden" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'uid'); ?>" name="uid" />
		<input type="hidden" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'activationcode'); ?>" name="activationcode" />
		<table border="0" cellspacing="0" cellpadding="0"  class="content_bg" style="align:left;width:950px;border:1px solid #284889;">
			<tr>
				<td colspan="4">
					<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg" align="left">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;India Online Health - Registration</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" align="left" valign="middle" >Account Type *</td>
							<td width="227" valign="middle" class="bodytext_bold">
								<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'role'); ?>
							</td>
							<td width="77" valign="top">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td height="2" colspan="5" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR height="0.5px" style="height:0.5px"></div></td>
						</tr>
					</table>
				</td>
			</tr>			
			<tr >
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">First Name *</td>
							<td width="227" valign="top"><input id="firstname" name="firstname" type="text"    class="textarea"  size="25"  value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'firstname'); ?>" placeholder="* e.g. John"  autocomplete="on" maxlength="45" tabindex="1" /></td>
							<td width="77" valign="middle" align="left">Middle Name</td>
							<td width="227" valign="top"><input id="middlename" name="middlename" type="text" class="textarea"  size="25"  value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'middlename'); ?>" placeholder="" autocomplete="on" maxlength="45" tabindex="2"/></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">Last Name *</td>
							<td  width="227"  valign="top"><input  id="lastname" name="lastname" type="text" class="textarea"  size="25" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'lastname'); ?>" placeholder="* e.g Bass" autocomplete="on" maxlength="45" tabindex="3" /></td>
							<td width="77" valign="middle" align="left">Username *</td>
							<td width="227" valign="top"><input  id="username" name="username" type="text" class="textarea"  size="25" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'username'); ?>" placeholder="* e.g john12bass" autocomplete="on" maxlength="45"  tabindex="4" onfocus="possibleusername()"  onblur="checkUsername(this)" /><div id="usernameerror" style="color: red;display:none;font-style: italic;" >&nbsp;&nbsp;&nbsp;Username must be unique. Please write other Username.</div></td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr id="rowusernamepossiblecombination" style="display:none;">
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">&nbsp;</td>
							<td  width="227"  valign="top">&nbsp;</td>
							<td width="77" valign="middle" align="left"><input  id="isusernamespresent" style="display:none;" value="false"/></td>
							<td width="227" valign="top"><div id="possiblenames" style="border: 1px solid #2D7A9E;padding:10px;width:180px;"; ></div></td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">Country *</td>
							<td  width="227"  valign="top"><select name="country_c" class="textarea gray" tabindex="5" id="country" style="width:140px;"> 
									<option value="" disabled selected>* select Country</option>
									<?PHP  
										for ($i=0;$i<count($objcountries);$i++) {									
											print "<option  \" value=\"{$objcountries[$i]->countrycode_c}\">{$objcountries[$i]->country_c}</option>";
										} 
									?>
								</select>
							</td>
							<td width="77" valign="middle" align="left"><lable id="lblContactNumber" >Contact No</Slable></td>
							<td width="227" valign="top"><input name="mobilenumber" type="text" class="textarea" id="mobilenumber" tabindex="6" size="25" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'mobilenumber'); ?>" placeholder="e.g. 9890xxxxxx" autocomplete="off" maxlength="10" /></td>
						</tr>
						<tr>
							<td height="2" colspan="6" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td>
						</tr>
					</table>
				</td>
			</tr>			
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left"><lable id="lblemail" >Email Id</lable></td>
							<td width="227" valign="top"><input name="email" type="text" class="textarea" id="email"  tabindex="7" size="25"  placeholder="e.g. xyz@domain.com" autocomplete="off" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'email'); ?>"   maxlength="45" /><div id="emailerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div><div id="emailcheckerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Could not email availability, Please wait...</div></td>
							<td width="77" valign="middle" align="left">Password *</td>
							<td width="227" valign="top"><input name="password" type="password" class="textarea" size="25"  tabindex="8" id="password" placeholder="********" maxlength="45" /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="top">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						  	<td width="77" valign="middle" align="left">Confirm Password *</td>
							<td width="227" valign="top"><input name="password_confirm" type="password" size="25" tabindex="9" class="textarea" id="password_confirm" placeholder="********" maxlength="45" /></td>
						</tr>
						<tr>
							<td height="2" colspan="5" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">Security Question *</td>
							<td width="227" valign="top">
								<select name="securequestion" id="securequestion" tabindex="10" class="textarea gray" class="textarea" style="width:80%;" id="securequestionlistbox" > <option value="" disabled selected  >* select security question</option>
									<?PHP  
										foreach ($array_securityquestion as $securityquestion) { 										
										print "<option  \" value=\"{$securityquestion->id}\">{$securityquestion->securityquestion_c}</option>";
										} 
									?>
								</select>
							</td>
						  	<td width="77" rowspan="3" valign="middle" align="left">Security answer *</td>
							<td width="227" valign="top"><input name="secureanswer" type="text" tabindex="11" size="25" class="textarea" id="secureanswer" placeholder="" autocomplete="off" maxlength="45" /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="middle">&nbsp;</td> 
							<td width="75px" valign="top" align="left">Proove You're not a robot *</td>
							<td width="227" valign="top">
								<div>
									<img id="captchasecurityimage" src="/ayushman/ccreatecaptchasecurityimage/generate" />
								</div>
								<input type="button" class="button" tabindex="12" value="Reload" onclick="reloadcaptcha()" />
								<div class="bodytext_error">
									<?= Arr::path($errors, 'verificationcode'); ?>
								</div>
							</td>
						  	<td width="77" rowspan="3" valign="top">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" valign="top">&nbsp;</td>
							<td width="227" valign="top">
								<input type="text" class="textarea" tabindex="13" name="verificationcode" id="verificationcode"/>
							</td>
						  	<td width="77" rowspan="3" valign="top">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td height="2" colspan="5" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
					<input type="hidden" name="defaultCountry" id="defaultCountry" size="2" />
					<input type="hidden" name="carrierCode" id="carrierCode" size="2" />
					<input type="hidden" name="output" id="output" style="width:20px;">
				
				</td>
			</tr>
			<tr style="display:none;">
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" height="30px" valign="top">&nbsp;</td> 
							<td width="75px" style="padding-left:15px;padding-right:20px;" valign="top">
								<div id="termsforpatientregisterby"  >
									<table width="970px" border="0" cellspacing="0" cellpadding="0">
										<tr align="left">
											<td width="29" height="45" rowspan="7">&nbsp;</td>
											<td height="45" colspan="2" align="left" valign="middle">I declare that my age is above 18 years as of today. I also declare that I will keep all the information I receive during interactions with the doctors confidential and<br/> I am responsible for consequential damages arising out of information leak from my end during and after the termination of this contract.<br/></span></td>
											<td width="37" rowspan="7">&nbsp;</td>
										</tr>
									</table>										
								</div>
							
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="970px" border="0" cellspacing="0" cellpadding="0">
						<tr align="left">
							<td width="19"> &nbsp;</td>
					  		<td align="center" style="padding-left:15px;padding-right:20px;" valign="middle"><input type="checkbox" name="acceptcheckbox" tabindex="14" id="acceptcheckbox" value="checkbox" /></td>
					  		<td class="style27">I have read <a href="#"  onclick="openterms();"><span class="style26" style="text-decoration:underline;" tabindex="15">Terms &amp; conditions</span></a> completely and by checking the adjoining box I undertake to abide by them. I wish to register as a <strong><span id="rolelable" name="rolelable"  >Consumer</span></strong>.</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				
				<td colspan="4"  style="padding-left:30px;" >
					<ul id="errorMessageBox" ></ul>
						<div id="errordiv">
							<?= Arr::get($errors, 'email'); ?>
						</div>
			 	</td> 
			</tr>
			<tr align="left" >               
                  <td  colspan="4"  ><label id="savelbl" style="font-weight:bold;display:none; "> User details have been saved.</label> </td>                              
            </tr>
			<tr align="left" >  
				<td  style="float:left;" width="42">
				&nbsp;
				</td> 
				<td  style="float:left;padding-top:10px;" style="padding-left:15px;padding-right:20px;"><input type="submit" tabindex="16" class="button" height="22" style="width: 80px; height: 25px; " value="Register"/></td>
			</tr>
			<tr>   
				<td >&nbsp;</td>
			</tr>
    	</table> 
	</form>
	<input id="termsread" name="termsread" type = "hidden"/>
</div>

<div id="wrappertermforpat" class="content_bg"  >
  	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
			<td>&nbsp;
			</td>
   		</tr> 
    	<tr>
      		<td align="left" valign="top" style="padding-top:3px;">
	  			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="LeftMenu_BG" style="width:1000px;">
        			<tr>
          		<td width="7" align="left" valign="top" class="LeftMenu_textStyle">&nbsp;</td>
          		<td width="978" align="left" valign="top" class="LeftMenu_textStyle">
          			<p class="bodytext_normal"><strong><em><u>Terms and Conditions of use by </u></em><u>Consumers</u></strong>
          			</p>
            		<p class="bodytext_normal"><span class="bodytext_bold">1.0 Scope:</span>
            		</p>
            		<p class="bodytext_normal">This document outlines the Nature of Service, Roles and Responsibilities, Rights and Duties, Limitations of Liability, and Termination conditions. Before joining this site for seeking advice of Doctors as well as services of Support Service Providers (SSP) and Medicine & Equipment Suppliers (MES), all Consumers are advised to go thru this document carefully.  <br/>
                  		<br/>
                  		<strong><em>IndiaOnlineHealth</em></strong> is a Web based Platform for Healthcare Service Providers, established and run by Ayushman Pvt. Ltd, a Company Incorporated in India under Companies Act 1956, having its Registered Office presently at: Office 5, Building A, Ramyanagari, Pune 411037, India (herein after referred to as &lsquo;<strong>Ayushman&rsquo;</strong>).
            		</p>
					<p class="bodytext_bold">2.0 Nature of Service
					</p>
					<p class="bodytext_normal"><strong><em>IndiaOnlineHealth</em></strong> enables the Consumer to take appointment with a Doctor of his choice, registered on this platform, for &lsquo;In-Clinic&rsquo; or &lsquo;On-line&rsquo; consultation, as well as enables &lsquo;On-line&rsquo; Consultation over Video / Phone.  The On-line Video / Phone is ideally suited for Routine consultations, &lsquo;Follow-up consultations&rsquo;, and &lsquo;Second opinion&rsquo;, where, in Doctor&rsquo;s opinion, there is no need for physical examination.
					</p>
					<p class="bodytext_normal">In addition, <strong><em>IndiaOnlineHealth</em></strong> platform has also provided a facility for Consumers to connect on-line with para-medical personnel and also those persons, organizations, who provide health related services, including pathology laboratories, radiology laboratories (all these service providers described in this paragraph and those who provide any healthcare related services but not described in this paragraph are cumulatively, jointly and severally referred to as the Support Service Providers or SSP).
					</p>
					<p class="bodytext_normal">In addition, <strong><em>IndiaOnlineHealth</em></strong> platform has also provided a facility for Consumers to place order on-line with manufacturers and traders of medicine, medical and surgical equipments, machinery, medical consumables and disposables, orthopedic  and support apparatuses, equipments etc (all these products providers described in this paragraph and those who provide any healthcare related products but not described in this paragraph are cumulatively, jointly and severally referred to as the Medicine & Equipment Suppliers or MES).
					</p>
					<p class="bodytext_normal">A facility is made available to all SSP and all MES for providing their services and products to those persons who are desirous of taking their services and products for their health related problems AND / OR to connect with the Consumer and provide seamless services to their Consumer once the consumer&rsquo;s <strong>E</strong>lectronic <strong>M</strong>edical <strong>R</strong>ecord <strong>(EMR)</strong> has been updated by the doctor.
					</p>
					<p class="bodytext_normal">Every Doctor who is desirous of offering his / her services, on <strong><em> IndiaOnlineHealth</em></strong> platform, is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services he / she provided through <em><strong>IndiaOnlineHealth</em></strong> platform to the Consumer.
					</p>
					<p class="bodytext_normal">Every Support Service Provider, who is desirous of offering services, on <strong><em>IndiaOnlineHealth</em></strong> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services provided through <em><strong>IndiaOnlineHealth</em></strong> platform to the Consumer. 
					</p>
					<p class="bodytext_normal">Every  Medicine &amp; Equipment Supplies Provider, who is desirous of offering products,  on <strong><em>IndiaOnlineHealth</em></strong> platform is required to enter in to an  agreement with Ayushman and accept the terms and conditions of the agreement  and also to accept all the responsibilities and liabilities for the products  provided through <strong><em>IndiaOnlineHealth</em></strong> platform to the Consumers. 
					</p>
					<p class="bodytext_normal">Every Consumer, who is desirous of taking On-line advice from Medical Practitioner Doctors for his health related problems, and / or also every person who is desirous of taking services from other Support Service Providers or products from Medicine & Equipment Suppliers, on <strong><em>IndiaOnlineHealth</strong></em> Platform is required to enroll as a Consumer by entering in to an agreement with Ayushman and accept the Terms and Conditions of the agreement. The Registered Consumer also agrees to the condition that all the Responsibilities and Liabilities are borne by the Practitioner Doctor whose advice he / she takes on <strong><em>IndiaOnlineHealth</strong></em> Platform and also borne by every Support Service Provider, whose Services he / she takes through <strong><em>IndiaOnlineHealth</strong></em> Platform and also borne by every Medicine & Equipment Supplier, whose Products he / she takes through <strong><em>IndiaOnlineHealth Platform</strong></em>. 
					</p>
					<p class="bodytext_bold"><strong>3.0  Agreement&nbsp;:</strong>
					</p>
					<p class="bodytext_normal">Now  this deed witnessth the terms and conditions agreed upon by and between  Ayushman and the &lsquo;Consumers&rsquo; are as under:
					</p>
            <ol>
                <li class="bodytext_normal">Acceptances of all the terms and conditions of this agreement by the Consumer is the consideration for which Ayushman has agreed to provide a license to him to remain present on the On-line platform through the channels made available for that purpose, and to get advice from any Doctor and/or services from any Support Service Provider, of his / her choice, whose advice, services he/she seeks and / or products from any Medicine & Equipment Supplier, whose products he / she takes.<br/><br/> 
                </li>
                <li class="bodytext_normal">The Consumer agrees to pay registration and annual subscription charges through any system adopted by Ayushman from time to time. Ayushman reserves the right to revise the annual subscription from time to time and the Consumer will be informed a month in advance about the same. This agreement will be valid for one year from the agreement date and will deem to be automatically extended unless informed by the Consumer to the contrary in writing a month before this contract expires and accordingly the Consumer will have to pay the next annual payment before the expiry of the current period. If Consumer does not renew the subscription before expiry of current period, Ayushman reserves the right to disable the access to his EMR and all other services available to him by way of his subscription. <br/><br/>
                </li>
                <li class="bodytext_normal">Upon successful Registration, Consumer can access his account using his User Id (chosen by him at the time of registration) and password. Consumer is expected to keep his password confidential. Consumer is also encouraged to change his password at regular intervals.  &nbsp;<br/><br/>
                </li>
                <li class="bodytext_normal">Consumer can opt to create his Electronic Medical Records and take an On-line appointment with the Doctors of his choice to seek either on-line advice through IndiaOnlineHealth Platform or In-Clinic consultation advice and / or services of SSP and / or products of MES, as well as avail all other services available to him as a part of his subscription. <br/><br/>
                </li>
                <li class="bodytext_normal">Children below 18 and other aged and handicapped need to have their nominated guardian present during an on-line consulting session and the guardian shall express about his understanding of the findings and recommendations of doctors, before the session ends. <br/><br/>
                </li>       
                <li class="bodytext_normal">The Consumer is permitted to make use of <strong><em>IndiaOnlineHealth</em></strong> Platform and / or all the facilities available for genuine purposes only. The Consumer is not permitted to misuse <strong><em>IndiaOnlineHealth</em></strong> Platform and / or any facility available thereon, for any commercial, illegal, immoral, or unethical purpose. <br/><br/>
                </li>        
	            <li class="bodytext_normal">The information provided by the Consumer and the proceedings of the meeting of the Consumer with the doctor, also with the SSP, advice given by the doctor, details of services provided by the SSP, will be stored on the <strong><em>IndiaOnlineHealth</em></strong> Platform; said information and the proceedings stored on the <strong><em>IndiaOnlineHealth</em></strong> Platform will be accessible to Ayushman at all times; to which the Consumer will have no objection at any time. Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. When used for such purposes Ayushman will take utmost care to keep the identity of the Consumer anonymous and confidential adhering to HIPPA guidelines.<br/><br/> 
	            </li>        
                <li class="bodytext_normal">It is the  responsibility of the Consumer to ensure that his Electronic Medical Records  (EMR) is current and complete at all times. He will be assisted by his panel of  doctors in updating his EMR at various stages. <br/><br/>
                </li>      
                <li class="bodytext_normal">The Consumer is  solely responsible to keep his email, contact details and EMR current, complete  and updated at <strong><em>IndiaOnlineHealth</em></strong> Platform, at all times. <br/><br/>
                </li>    
                <li class="bodytext_normal">The Consumer specifically and particularly accepts that except for the amount of license fees (registration charges, annual subscription) and usage charges), all other amounts to be paid by the Consumer will be billed by the doctors and /or SSP and / or MES, as the case may be. Accordingly the Consumer has hereby authorized Ayushman, to accept money from him and transfer it to the doctors and /or SSP as the case may be. <br/><br/>
                </li>
                <li class="bodytext_normal"><strong>Limitations of  Liabilities:</strong>&nbsp;
                <ol type="a">
                	<li class="bodytext_normal">The  Consumer has specifically and particularly understood, accepted and agreed that <strong><em>IndiaOnlineHealth</em></strong> Platform is only a media for On-line meeting  with doctor and it has a limitation in providing advice as no physical  examination of the Consumer is arranged on it.&nbsp;<br/>
                	</li>
                	<li class="bodytext_normal">Ayushman is not responsible or liable for any advice provided by doctor and for any services provided by SSP or product supplied by MES for any consequences of the advice provided by doctor and for any consequences of any services provided by SSP or product supplied by MES. <br/>
                	</li>    	
                	<li class="bodytext_normal"> All the services provided by Ayushman are technology based and using various Information Technology services, which mainly depend upon availability of power and network connectivity, which are some times beyond the control of Ayushman. The Consumer avails of the service provided by <strong><em>IndiaOnlineHealth</strong></em> on an &lsquo;as-is&rsquo; and assumes all the risks involved for the causes beyond Ayushman&rsquo;s control, with respect to any consequential damages arising out of nature of service, non-availability of service like power, network connectivity, any shortfall in completeness or loss of information stored, or loss of accuracy.<br/>
                	 </li>  	
                	<li class="bodytext_normal"> Doctors, Consulting specialists, SSP and MES are independent agents who give services in their own individual capacity. Ayushman is not in anyway responsible for individual acts of improper or incompetent advice or service provided by Doctors, Consulting specialists, SSP and MES. If it is proven beyond doubt that the promised services provided by the &lsquo;Licensee doctor&rsquo; were not delivered, Ayushman can with hold payments to such service providers in specific instances and money collected for that transaction can be credited back to the customer account. If a Doctor fails to keep an appointment due to any reason under the terms and conditions of operation he is obliged to refund the money collected for such transaction and give a free consultation slot at a subsequent time mutually suitable. Under such situations Ayushman will credit the customer account with the refund amount. While Ayushman will take every care to safeguard customer EMR, Ayushman is not responsible for any loss of accidental data or service discontinuity and &lsquo;Licensee doctor&lsquo; agrees to indemnify Ayushman against all and any consequential damages.<br/>
                	</li>
                </ol> 
                <br/>
                </li>
				<li class="bodytext_normal"><strong>Refunds:</strong>&nbsp;
				 	<ol type="a" >
				 		<li class="bodytext_normal">The registration and subscription amount as well as amount paid towards already availed services by the Consumer to Ayushman, is not refundable. <br/>
				 		</li>
				 		<li class="bodytext_normal">Shortcoming in Service by Doctor, SSP and MES: If Consumer informs Ayushman in writing about shortcoming in services provided by a Licensee Doctor or SSP or products supplied by MES, Ayushman will investigate the claim and at its sole discretion, may refund a part or full amount paid / deposited by the Consumer to Ayushman, in case the designated service provider has failed to deliver service in part or full. Any such complaint must be reported within 72 hours of such an act happening. In any case, the claim and refund will never exceed the amount paid towards services provided for this specific act.<br/>
				 		</li>
				 	</ol>
				 </li>
				<br/>
				 <li class="bodytext_normal"><strong>Termination:</strong>&nbsp;
				 	<ol type="a">
				 		<li class="bodytext_normal">The License provided to the Consumer can be terminated by Ayushman at any time, if in the opinion of Ayushman, 
				 			 <ol STYLE="list-style-type: lower-roman">
                  				<li class="bodytext_normal">the  Consumer is misusing <strong><em>IndiaOnlineHealth</em></strong> Platform,
                  				</li>
                  				<li class="bodytext_normal">the  Consumer is not using <strong><em>IndiaOnlineHealth</em></strong> Platform for genuine  purpose, 
                  				</li>
                  				<li class="bodytext_normal">the  Consumer is using <strong><em>IndiaOnlineHealth</em></strong> Platform for commercial,  illegal, immoral, or unethical purpose.
                  				</li>
                			</ol>
                			
				 		</li>
				 		<li class="bodytext_normal">The services will be terminated, in case Consumer fails to pay the annual subscription charges within 15 days of his subscription becoming due.  EMR will not be accessible to the Consumer once the account is closed. However, if the Consumer reactivates his account upon payment of outstanding dues, within 90 days, access to his EMR can be reactivated at Ayushman&rsquo;s discretion.<br/></li>
				 		<li class="bodytext_normal" >If the Consumer decides to close his account and informs Ayushman in writing accordingly, any amount available to his credit balance will be refunded to him by 15th day of the following calendar month.<br/><br/></li>
				 	</ol>
				 </li>
				 <li class="bodytext_normal"><strong>General:</strong>&nbsp;
				 	<ol type="a">
				 		<li class="bodytext_normal">Interpretation: In case of any non clarity, ambiguity in the meaning of any sentence or any word or any clause of this document, interpretation made by Ayushman will be final, applicable and binding on all the parties hereto. 
				 		<br/></li>
				 		<li class="bodytext_normal">Terms of Use for Doctors, SSP and MES, are available for view on the portal under Terms of Use section.
				 		</li>
				 		<li class="bodytext_normal">Clarity about various words and phrases used in this document is provided under Definitions heading on <strong><em>IndiaOnlineHealth.com</strong></em> portal. 
				 		</li>
				 	</ol>
				 <br/>
				 </li>
				 <li class="bodytext_normal"><strong>Arbitration: </strong>&nbsp;
				 
				 	
				 	In case of any dispute between the parties hereto with reference to any services provided hereunder, and / or any transaction made under Ayushman On-line platform, it will be referred to the single member arbitration of Mr. Mukund Bakare, and his decision will be final and binding on the disputing parties.
				 	
				 	
				 	
				 	</li>
				  <li class="bodytext_normal"><strong>Disclaimer:</strong>&nbsp;
				  	<ol type="a">
				 		<li class="bodytext_normal">The information contained in this website is for general information purposes only. Ayushman  endeavored to keep the information up to date and correct, No representations or warranties of any kind, express or implied, are given about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information shall be strictly always at User&rsquo;s own risk.
				 		<br/></li>
				 		<li class="bodytext_normal">In no event Ayushman will be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</li>
				 		<li class="bodytext_normal">Through this website, it is possible to link to other websites, which are not under the control of Ayushman. No control is established over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
				 		</li>
				 		<li class="bodytext_normal">Every effort is made to keep the website up and running smoothly. However, there may be occasions due to technical glitches, planned maintenance shut-down or business reasons. Ayushman takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to any reason whatsoever.
				 		</li>
				 	</ol>
				 	<br/>
				</li>
				<li class="bodytext_normal"><strong>Jurisdiction: </strong>&nbsp;<br/>
				All the transactions hereunder are subject to Pune Court (Maharashtra State, India) jurisdiction only.</li>
            </ol>
            <p class="bodytext_bold">&nbsp;</p></td>
          <td width="7" align="left" valign="top" class="LeftMenu_textStyle">&nbsp;</td>
        </tr>
      </table>
	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>

<div>
<div id="wrappertermsforchemist">
  	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
      		<td align="left" valign="top" style="padding-top:3px;">
	  			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="LeftMenu_BG" style="width:1000px; padding-left:15px; padding-right:15px;">
        			<tr>
          				<td align="left" valign="top" class="LeftMenu_textStyle"><p class="bodytext_normal"><strong><em><u>Terms and Conditions of use by </u></em><u><em>MEDICINE & EQUIPMENT SUPPLIERS (MES)</em></u></strong></p>
            				<p class="bodytext_normal"><span class="bodytext_bold">1.0 Scope:</span></p>
            				<p class="bodytext_normal">This document outlines the Nature of Service, Roles and Responsibilities, Rights and Duties, Limitations of Liability, and Termination conditions. Before joining this site for offering their products, <em>MEDICINE & EQUIPMENT SUPPLIERS </em>are advised to go through this document carefully.<br>
              					<br/> 
              					<em><strong>IndiaOnlineHealth</strong></em> is a Web based Platform for Healthcare Service Providers, established and run by Ayushman Pvt. Ltd, a Company Incorporated in India under Companies Act 1956, having its Registered Office presently at: Office 5, Building A, Ramyanagari, Pune 411037, India (herein after referred to as <strong>Ayushman</strong>).</p>
							<p class="bodytext_bold">2.0 Nature of Service</p>
							<p class="bodytext_normal"><em><strong>IndiaOnlineHealth</strong></em> enables the Consumer to take appointment with a Doctor of his choice, registered on this platform, for In-Clinic or On-line consultation, as well as enables On-line Consultation over Video / Phone.  The On-line Video / Phone is ideally suited for Routine consultations, Follow-up consultations, and Second opinion, where, in Doctors opinion, there is no need for physical examination. </p>
							<p class="bodytext_normal">In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to connect on-line with para-medical personnel and also those persons, organizations, who provide health related services, including pathology laboratories, radiology laboratories (all these service providers described in this paragraph and those who provide any healthcare related services but not described in this paragraph are cumulatively, jointly and severally referred to as the Support Service Providers or SSP).</p>
							<p class="bodytext_normal">In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to place order on-line with manufacturers and traders of medicine, medical and surgical equipments, machinery, medical consumables and disposables, orthopedic  and support apparatuses, equipments etc. (all these products providers described in this paragraph and those who provide any healthcare related products but not described in this paragraph are cumulatively, jointly and severally referred to as the Medicine & Equipment Suppliers or MES).</p>
							<p class="bodytext_normal">A facility is made available to all SSP and all MES for providing their services and products to those persons who are desirous of taking their services and products for their health related problems AND / OR to connect with the Consumer and provide seamless services to their Consumer once the consumers <strong>E</strong>lectronic <strong>M</strong>edical <strong>R</strong>ecord (<strong>EMR</strong>) has been updated by the doctor.</p>
							<p class="bodytext_normal">Every Doctor who is desirous of offering his / her services, on <em><strong>IndiaOnlineHealth</strong></em> platform, is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services he / she provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer.</p>
							<p class="bodytext_normal">Every Support Service Provider, who is desirous of offering services, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer. </p>
							<p class="bodytext_normal">Every Medicine & Equipment Supplier, who is desirous of offering products, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the products provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumers. </p>
							<p class="bodytext_normal">Every Consumer, who is desirous of taking On-line advice from Medical Practitioner Doctors for his health related problems, and / or also every Consumer who is desirous of taking services from other Support Service Providers or products from Medicine & Equipment Suppliers, on <em><strong>IndiaOnlineHealth</strong></em> Platform is required to enroll as a Consumer by entering in to an agreement with Ayushman and accept the Terms and Conditions of the agreement. The Registered Consumer also agrees to the condition that all the Responsibilities and Liabilities are borne by the Practitioner Doctor whose advice he / she takes on <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Support Service Provider, whose Services he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Medicine & Equipment Supplier, whose Products he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform. </p>
							<p class="bodytext_bold"><strong>3.0  Agreement&nbsp;:</strong></p>
							<p class="bodytext_normal">Now this deed witnessth the terms and conditions agreed upon by and between Ayushman and the Licensee <em>MEDICINE & EQUIPMENT SUPPLIER (MES)</em>, are as under:</p>
							  	<ol>
									<li class="bodytext_normal">Acceptances of all the terms and conditions of this agreement by the MEDICINE AND EQUIPMENT SUPPLIER is the consideration for which Ayushman has agreed to provide a license to him to remain present on the On-line platform through the channels made available for that purpose, and to provide his services to every  Consumer, who seeks his products. (hereinafter referred to as LICENSEE MES)</li>
									</br>
									<li class="bodytext_normal">The LICENSEE MES has hereby declared that, for the purpose of carrying the profession / business, he has passed various authentic examinations conducted by government recognized universities and also he has registered himself with proper authorities and obtained licenses, to enable him to carry on the profession / business of MEDICINE AND EQUIPMENT SUPPLIER. Details of the examinations passed, registration with proper authorities and licenses obtained by him are provided by the MES on the registration page of <em><strong>IndiaOnlineHealth.com </strong></em>portal.</li>
									</br>
									<li class="bodytext_normal">The LICENSEE MES has hereby also declared that, registration certificates and licenses, enabling him to carry on the profession / business, are in force and he will renew it from time to time before its validity period comes to an end. The LICENSEE MES will never provide his services during the period wherein his registration certificate, as well as, his licenses enabling him to carry on the profession / business, is not in force.</li>
									</br>
									<li class="bodytext_normal">The LICENSEE MES has hereby also declared that, he is never convicted for any criminal offence, no criminal proceeding is pending against him in any court of law, and no disciplinary action is taken against him by any authority. </li>
									</br>
									<li class="bodytext_normal">The LICENSEE MES is permitted to supply products through Ayushman portal for genuine purposes only and strictly adhering to the professional / business code of conduct and ethics. The LICENSEE MES is not permitted to make use of <em><strong>IndiaOnlineHealth</strong></em> portal for any illegal, immoral, or unethical purpose or to misuse it by any way.</li></br>
									<li class="bodytext_normal">The Licensee MES has agreed to pay to Ayushman, all charges towards registration, annual subscription and usage of the portal as provided in the Schedule of fees for License to use Portal by MES, which may change from time to time.</li>
									</br>
									<li class="bodytext_normal"><strong>Special notes to MES : <br>
									  </strong>
                  					<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
										<tr>
										  <td width="27" align="center" valign="top">(a)</td>
										  <td width="873">The LICENSEE MES  who are registered with <em><strong>IndiaOnlineHealth</strong></em> platform and who supply these products will, in addition to observing professional / business ethics and code of conduct, prescribed for LICENSEE MES, exercise utmost care and best professional judgment at all times to decide if products can be supplied based on prescription provided by Doctor. When he deems it necessary he may request the consumer to visit him personally to receive the prescribed products. </td>
										</tr>
										<tr>
										  	<td align="center" valign="top">(b)</td>
										  	<td>LICENSEE MES should study the Consumers prescription before supplying products and at the outset seek confirmation from the Doctor that the prescription is current and complete in all respects. LICENSEE MES should supply products strictly adhering to the prescription given by the Doctor. </td>
										</tr>
										<tr>
										  	<td align="center" valign="top">(c)</td>
										  	<td>Whatever products LICENSEE MES supplies to the Consumer through <em><strong>IndiaOnlineHealth</strong></em> platform, should be manufactured by using material and processes of highest quality. In case LICENSEE MES is medicine distributor or vendor, he should provide medicines as per prescription of Doctor only, and should take precaution that those are not expired, or banned. In no case he should adopt the practice of switching the prescription for substitute medicine.</td>
										</tr>
										<tr>
										  	<td align="center" valign="top">(d)</td>
										  	<td>The LICENSEE MES should follow the appropriate Govt. rules and follow norms laid by Medical council of India and other statutory bodies.</td>
										</tr>
										<tr>
										  	<td align="center" valign="top">(e)</td>
										  	<td>LICENSEE MES should inform Consumer of precautions to be taken and potential adverse effects of medications.</td>
										</tr>
                  					</table>
                					</li>
                				</br>
                					<li class="bodytext_normal"><strong>Confidentiality</strong>:</li>
                					<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
										<tr>
											<td width="27" align="center" valign="top">(a)</td>
											<td width="873">EMR of the Consumer is private information of the Consumer and its access to the Service Providers is given solely for the purpose of enabling them to provide highest quality of professional service. MES needs to treat EMR and related information strictly confidential. If any information needs to be shared with other authorized personnel (Staff member, another Doctor, another MES, patients close relative etc), it should strictly be on need-to-know basis and in the interest of providing full and better service. In such cases, MES is expected to take permission of the Consumer before sharing such information.</td>
										</tr>
										<tr>
											<td align="center" valign="top">(b)</td>
											<td>MES will ensure that his staff is made aware of the privacy involved in medical history and prescription and will not provide access to EMR including prescription of the Consumer to staff except for need-to-know basis.</td>
										</tr>
										<tr>
											<td align="center" valign="top">(c)</td>
											<td>The information provided by all Consumers and the prescription provided by the Doctors, will be stored on the portal of Ayushman; said information stored on the portal of Ayushman will be always accessible to Ayushman; to which the Licensee MES will not have any objection at any time. </td>
										</tr>
										<tr>
											<td align="center" valign="top">(d)</td>
											<td>Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. When used for such purposes Ayushman will take utmost care to keep the identity of the Consumer and MES anonymous and confidential. </td>
										</tr>
										<tr>
											<td align="center" valign="top">(e)</td>
											<td>Licensee MES should take utmost care and see that, every right of every Consumer, provided under Consumer Protection Act, will be honored to the satisfaction of the Consumer.</td>
										</tr>
                					</table>
									<li class="bodytext_normal">LICENSEE MES are prohibited to supply medicines to children below 18 years of age. LICENSEE MES should ensure that medicines are supplied to nominated guardians, in case the consumer is below 18 years of age.</li></br>
									<li class="bodytext_normal">The LICENSEE MES will be always exclusively responsible and liable for the products and for all the consequences of the products supplied by him to every Consumer through IndiaOnlineHealth. The LICENSEE MES has specifically and particularly accepted and agreed that Ayushman will never be responsible or liable for any products supplied by LICENSEE MES or for any consequences of the products supplied by LICENSEE MES. </li></br>
									<li class="bodytext_normal">In case Ayushman is held responsible for the products,  its consequences, or in case Ayushman is made to bear any expenditure for defending against any such action, or made to pay any amount as an expenses, compensation or under any other head, for the products supplied by the  LICENSEE MES, and / or its consequences, the LICENSEE MES has hereby agreed to indemnify and to keep always indemnified Ayushman against such action, expenses, and payments by Ayushman as expenses, compensation or under any other head,  and to reimburse the same to Ayushman, i.e. all such expenses borne by it from time to time, and payments by it as compensation or under any other head, with an interest at the rate applicable to lending by State Bank of India. </li></br>
									<li class="bodytext_normal">The LICENSEE MES has no right to claim any amount from Ayushman for any reason whatsoever it may be.  In case for any reason, Ayushman is made to effect any payment to the LICENSEE MES, such payment will never exceed the amount of license fees paid by the LICENSEE MES to Ayushman.</li>
									</br></br>
									<li class="bodytext_normal"><strong>Limitations of Liabilities:</strong>
				  						<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
											<tr>
												<td width="27" align="center" valign="top">(a)</td>
												<td width="873">All the services provided by Ayushman are technology based and using various Information Technology services, which mainly depends upon availability of power and network connectivity, which is sometimes beyond the control of Ayushman. The Consumer and Licensee MES avail of the service provided by <em><strong>IndiaOnlineHealth</strong></em> on an as-is and assumes all the risks involved for the causes beyond Ayushmans control, with respect to any consequential damages arising out of nature of service, non-availability of service like power, network connectivity, any shortfall in completeness or loss of information stored, or loss of accuracy.</td>
											</tr>
											<tr>
												<td align="center" valign="top">(b)</td>
												<td>Licensee MES are independent agents who sell their products in their own individual capacity. Ayushman is not in any way responsible for individual acts of improper or incompetent service provided by Licensee MES. </td>
											</tr>
											<tr>
												<td align="center" valign="top">(c)</td>
												<td>While Ayushman will take every care to safeguard customer EMR, Ayushman is not responsible for any loss of accidental data or service discontinuity and Licensee MES agrees to indemnify Ayushman against all and any consequential damages.</td>
											</tr>
			      						</table>
									</li>
				<li class="bodytext_normal"><strong>Termination :</strong>
				  	<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
						<tr>
							<td align="center" valign="top">(a)</td>
							<td colspan="2">The License provided to the Licensee MES can be terminated by Ayushman at any time, if in the opinion of Ayushman, </td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
							<td align="center">I</td>
							<td>i.	the MES is misusing <em><strong>IndiaOnlineHealth</strong></em> Platform</td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
							<td align="center">II</td>
							<td>the MES  is not using <em><strong>IndiaOnlineHealth</strong></em> Platform for genuine purpose</td>
						</tr>
						<tr>
							<td width="27" align="center" valign="top">&nbsp;</td>
							<td width="23" align="center">III</td>
							<td width="840">the MES  is using <em><strong>IndiaOnlineHealth</strong></em> Platform for commercial, illegal, immoral, or unethical purpose.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(b)</td>
							<td colspan="2">The License may be terminated by Ayushman, in case MES fails to renew the subscription or fails to pay charges due to Ayushman within 15 days from the same becoming due. Ayushman, at their sole discretion, may renew the services after full outstanding payment has been paid by the MES. </td>
						</tr>
						<tr>
							<td align="center" valign="top">(c)</td>
							<td colspan="2">MES can decide to discontinue his License by informing Ayushman in writing accordingly. Any amount available in his account will be credited to his bank account at the end of the following reconciliation cycle.</td>
						</tr>
			      	</table>
				</li>
				</br>
				<li class="bodytext_normal"><strong>General :</strong>
				  	<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
						<tr>
							<td width="27" align="center" valign="top">(a)</td>
							<td width="863" colspan="2">Ayushman has reserved a right to make changes, amendments in its policy and rules for operating and access to its portal, from time to time and those will be binding on the Licensee SSP, and he will never have any objection for such changes and amendments.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(b)</td>
							<td colspan="2">Interpretation: In case of any non clarity, ambiguity in the meaning of any sentence or any word or any clause of this document, interpretation made by Ayushman will be final, applicable and binding on all the parties hereto. </td>
						</tr>
						<tr>
							<td align="center" valign="top">(c)</td>
							<td colspan="2">Terms of Use for Consumer, Doctors and SSP, are available for view on the portal under Terms of Use section.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(d)</td>
							<td colspan="2">Clarity about various words and phrases used in this document is provided under Definitions heading on <em><strong>IndiaOnlineHealth.com</strong></em> portal. </td>
						</tr>
                  	</table>
				</li>
				<li class="bodytext_normal"><strong>Arbitration :</strong>
				 	In case of any dispute between the parties hereto with reference to any services provided hereunder, and / or any transaction made under Ayushman On-line platform, it will be referred to the single member arbitration of Mr. Mukund Bakare, and his decision will be final and binding on the disputing parties.
				</li>
				</br>
				<li class="bodytext_normal"><strong>Disclaimer :</strong>
				    <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                      	<tr>
                        	<td width="27" align="center" valign="top">(a)</td>
                        	<td width="863" colspan="2">The information contained in this website is for general information purposes only. Ayushman  endeavored to keep the information up to date and correct, No representations or warranties of any kind, express or implied, are given about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information shall be strictly always at Users own risk.</td>
                      	</tr>
						<tr>
							<td align="center" valign="top">(b)</td>
							<td colspan="2">In no event Ayushman will be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(c)</td>
							<td colspan="2">Through this website, it is possible to link to other websites, which are not under the control of Ayushman. No control is established over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(d)</td>
							<td colspan="2">Every effort is made to keep the website up and running smoothly. However, there may be occasions due to technical glitches, planned maintenance shut-down or business reasons. Ayushman takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to any reason whatsoever.</td>
						</tr>
                    </table>
				</li>
				</br>
				<li class="bodytext_normal"><strong>Jurisdiction :</strong>
				 All the transactions hereunder are subject to Pune Court (Maharashtra State, India) jurisdiction only.</li></br>
              </ol>            
            </td>
        </tr>
      </table>	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</div>
<div id="wrappertermsforpathologist">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    
    
    <tr>
      <td align="left" valign="top" style="padding-top:3px;">
	  	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="LeftMenu_BG" style="width:1000px; padding-left:15px; padding-right:15px;">
        <tr>
          <td align="left" valign="top" class="LeftMenu_textStyle"><p class="bodytext_normal"><strong><em><u>Terms and Conditions of use by </u></em><em><u>Support Service  Provider (SSP)</u></em></strong></p>
            <p class="bodytext_normal"><span class="bodytext_bold">1.0 Scope:</span></p>
            <p class="bodytext_normal">This document outlines the Nature of Service, Roles and Responsibilities, Rights and Duties, Limitations of Liability, and Termination conditions. Before joining this site for offering their services,<em> SUPPORT SERVICE PROVIDERS </em>are advised to go through this document carefully.<br>
              <br/> 
              <em><strong>IndiaOnlineHealth</strong></em> is a Web based Platform for Healthcare Service Providers, established and run by Ayushman Pvt. Ltd, a Company Incorporated in India under Companies Act 1956, having its Registered Office presently at: Office 5, Building A, Ramyanagari, Pune 411037, India (herein after referred to as <strong>Ayushman</strong>).</p>
            <p class="bodytext_bold">2.0 Nature of Service</p>
            <p class="bodytext_normal"><em><strong>IndiaOnlineHealth</strong></em> enables the Consumer to take appointment with a Doctor of his choice, registered on this platform, for In-Clinic or On-line consultation, as well as enables On-line Consultation over Video / Phone.  The On-line Video / Phone is ideally suited for Routine consultations, Follow-up consultations, and Second opinion, where, in Doctors opinion, there is no need for physical examination. </p>
            <p class="bodytext_normal">In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to connect on-line with para-medical personnel and also those persons, organizations, who provide health related services, including pathology laboratories, radiology laboratories (all these service providers described in this paragraph and those who provide any healthcare related services but not described in this paragraph are cumulatively, jointly and severally referred to as the Support Service Providers or SSP).<br>
              <br>
 In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to place order on-line with manufacturers and traders of medicine, medical and surgical equipments, machinery, medical consumables and disposables, orthopedic  and support apparatuses, equipments etc. (all these products providers described in this paragraph and those who provide any healthcare related products but not described in this paragraph are cumulatively, jointly and severally referred to as the Medicine & Equipment Suppliers or MES).<br>
 <br>
 A facility is made available to all SSP and all MES for providing their services and products to those persons who are desirous of taking their services and products for their health related problems AND / OR to connect with the Consumer and provide seamless services to their Consumer once the consumers <strong>E</strong>lectronic <strong>M</strong>edical <strong>R</strong>ecord (<strong>EMR</strong>) has been updated by the doctor.

 <br>
 <br>
 Every Doctor who is desirous of offering his / her services, on <em><strong>IndiaOnlineHealth</strong></em> platform, is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services he / she provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer.

 <br>
 <br>
 Every Support Service Provider, who is desirous of offering services, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer. <br>
<br>
Every Medicine & Equipment Supplier, who is desirous of offering products, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the products provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumers.<br>
<br>
Every Consumer, who is desirous of taking On-line advice from Medical Practitioner Doctors for his health related problems, and / or also every Consumer who is desirous of taking services from other Support Service Providers or products from Medicine & Equipment Suppliers, on <em><strong>IndiaOnlineHealth</strong></em> Platform is required to enroll as a Consumer by entering in to an agreement with Ayushman and accept the Terms and Conditions of the agreement. The Registered Consumer also agrees to the condition that all the Responsibilities and Liabilities are borne by the Practitioner Doctor whose advice he / she takes on <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Support Service Provider, whose Services he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Medicine & Equipment Supplier, whose Products he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform. </p>
            <p class="bodytext_bold"><strong>3.0  Agreement&nbsp;:</strong></p>
            <p class="bodytext_normal">Now this deed witnessth the terms and conditions agreed upon by and between Ayushman and the Licensee SUPPORT SERVICE PROVIDER (SSP), are as under:</p>
              <ol>
                <li class="bodytext_normal">Acceptances of all the terms and conditions of this agreement by the Licensee SUPPORT SERVICE PROVIDER is the consideration for which Ayushman has agreed to provide a license to him to remain present on the <em><strong>IndiaOnlineHealth</strong></em> platform through the channels made available for that purpose, and to provide his services to every Consumer, who seeks his service.</li>
                </br>
                <li class="bodytext_normal">The Licensee SUPPORT SERVICE PROVIDER has hereby declared that, for the purpose of carrying the profession / business, he has passed various authentic examinations conducted by government recognized universities and also he has registered himself with proper authorities and obtained licenses, to enable him to carry on the profession / business of SUPPORT SERVICE PROVIDER. Details of the examinations passed, registration with proper authorities and licenses obtained by him are provided by the SSP on the registration page of <em><strong>IndiaOnlineHealth.com</strong></em> portal.</li>
                </br>
                <li class="bodytext_normal">The Licensee SSP has hereby also declared that, registration certificates and licenses, enabling him to carry on the profession / business, are in force and he will renew them from time to time before their validity period comes to an end. The Licensee SSP will never provide his services during the period wherein his registration certificate, as well as, his licenses enabling him to carry on the profession / business, is not in force.</li>
                </br>
                <li class="bodytext_normal">The Licensee SSP has hereby also declared that, he is never convicted for any criminal offence, no criminal proceeding is pending against him in any court of law, and no disciplinary action is taken against him by any authority. </li>
                </br>
                <li class="bodytext_normal">The Licensee SSP is permitted to provide services through Ayushman portal for genuine purposes only and strictly adhering to the professional / business code of conduct and ethics. The Licensee SSP is not permitted to make use of <em><strong>IndiaOnlineHealth</strong></em> portal for any illegal, immoral, or unethical purpose or to misuse it by any way.</li></br>
                <li class="bodytext_normal">The Licensee SSP has agreed to pay to Ayushman, all charges towards registration, annual subscription and usage of the portal as provided in the Schedule of fees for License to use Portal by SSP, which may change from time to time.</li>
                </br>
                <li class="bodytext_normal"><strong>Special notes to SSP : <br>
                  </strong>
                  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    
                    <tr>
                      <td width="27" align="center" valign="top">(a)</td>
                      <td width="873">The Licensee SSP  who are registered with <em><strong>IndiaOnlineHealth</strong></em> platform and who provide these services will, in addition to observing professional / business ethics and code of conduct, prescribed for Licensee SSP , exercise utmost care and best professional judgment at all times to decide if on-line services can be provided based on prescription provided by Doctor. When he deems it necessary he may request the customer (Consumer) to visit him personally to receive the prescribed services. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(b)</td>
                      <td>Licensee SSP should study the Consumers prescription before providing services and at the outset seek confirmation from the Doctor that the prescription is current and complete in all respects. Licensee SSP should provide services strictly adhering to the prescription given by the Doctor. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(c)</td>
                      <td>Whatever services Licensee SSP provides to the Consumer through <em><strong>IndiaOnlineHealth</strong></em> platform, should of highest quality, by using all material and consumables of ISI or equivalent mark of other Nations. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(d)</td>
                      <td>The Licensee SSP should follow the appropriate Govt. rules and follow norms laid by Medical council of India and other statutory bodies.</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(e)</td>
                      <td>Licensee SSP should inform Consumer of precautions to be taken and potential adverse effects of any procedure performed during the process of providing service. </td>
                    </tr>
                  </table>
                </li>
                </br>
                <li class="bodytext_normal"><strong>Confidentiality</strong>:</li><table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                  <tr>
                    <td width="27" align="center" valign="top">(a)</td>
                    <td width="873">EMR of the Consumer is private information of the Consumer and its access to the SSP is given solely for the purpose of enabling them to provide highest quality of professional Service. SSP needs to treat EMR and related information strictly confidential. If any information needs to be shared with other authorized personnel (Staff member, another Doctor, another SSP, patients close relative etc), it should strictly be on need-to-know basis and in the interest of providing full and better service. In such cases, SSP is expected to take permission of the Consumer before sharing such information.</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(b)</td>
                    <td>SSP will ensure that his staff is made aware of the privacy involved in medical investigations and will not provide access to EMR including reports of the investigations of the Consumer to staff except for need-to-know basis.</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(c)</td>
                    <td>For any on-line service, SSP will ensure complete privacy from where he is providing the service. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(d)</td>
                    <td>The information provided by all Consumers and the investigations requested by the Doctors of all Consumers and details of tests ordered by the Consumers on the Licensee SSP, will be stored on the portal of Ayushman; said information stored on the portal of Ayushman will be always accessible to Ayushman; to which the Licensee SSP will not have any objection at any time. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(e)</td>
                    <td>Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. When used for such purposes Ayushman will take utmost care to keep the identity of the Consumer and SSP anonymous and confidential. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(f)</td>
                    <td>Licensee SSP should take utmost care and see that, every right of every Consumer, provided under Consumer Protection Act, will be honored to the satisfaction of the Consumer. </td>
                  </tr>
                  
                  
                </table>
                <li class="bodytext_normal">Children below 18 and other aged and handicapped need to have their nominated guardian present during an on-line session and Licensee SSP should apprise guardian about his findings and recommendations before the session ends.</li></br>
                <li class="bodytext_normal">The Licensee SSP has hereby authorized Ayushman to collect from the Consumers, amount of, fees and the bills he has raised on the Consumers and to transfer money from the Consumers account with Ayushman, to the Licensee SSPs account in the books of Ayushman. However in case of certain Service Providers, Ayushman reserves the right, not to collect the fees or bill amount due to practical, moral or legal reasons, in which case, SSP is advised to collect the same from Consumer directly. Ayushman will not be responsible for non-collection of such charges from the Consumer in all such events.</li></br>
                <li class="bodytext_normal">The Licensee SSP has hereby authorized Ayushman to deduct from the amount collected from the Consumers and which is payable to the Licensee SSP, any outstanding amount payable by the Licensee SSP to Ayushman, reimbursement of collection charges payable to payment gateway service provider, and also all applicable taxes including TDS under income tax act, service tax etc. on the amount payable and/or paid to the Licensee SSP.</li></br>
				<li class="bodytext_normal">The Licensee SSP has agreed and accepted the responsibility to pay all applicable taxes on the amount he will receive from Ayushman from time to time.</li></br>
				<li class="bodytext_normal">The Licensee SSP will be always exclusively responsible and liable for the services and for all the consequences of the services provided by him to every Consumer through <em><strong>IndiaOnlineHealth</strong></em>. The Licensee SSP has specifically and particularly accepted and agreed that Ayushman will never be responsible or liable for any services provided by Licensee SSP or for any consequences of the services provided by Licensee SSP. </li>
				</br>
				<li class="bodytext_normal">In case Ayushman is held responsible for the services,  its consequences, or in case Ayushman is made to bear any expenditure for defending against any such action, or made to pay any amount as expenses, compensation or under any other head, for the services, provided by the  Licensee SSP, and / or its consequences,  the  Licensee SSP has hereby agreed to indemnify and to keep always indemnified Ayushman against such action, expenses, and payments by Ayushman as expenses, compensation or under any other head,  and to reimburse the same to Ayushman, i.e. all such expenses borne by it from time to time, and payments by it as compensation or under any other head, with an interest at the rate applicable to lending by State Bank of India. </li></br>
				<li class="bodytext_normal">The Licensee SSP has no right to claim any amount from Ayushman for any reason whatsoever it may be. In case for any reason, Ayushman is made to effect any payment to the Licensee SSP, such payment will never exceed the amount of license fees paid by the Licensee SSP to Ayushman.</li></br>
				</br></br>
				<li class="bodytext_normal"><strong>Limitations of Liabilities:</strong>
				  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
				    <tr>
				      <td width="27" align="center" valign="top">(a)</td>
				      <td width="873">All the services provided by Ayushman are technology based and using various Information Technology services, which mainly depends upon availability of power and network connectivity, which is sometimes beyond the control of Ayushman. The Consumer and Licensee SSP avail of the service provided by <em><strong>IndiaOnlineHealth</strong></em> on an as-is and assumes all the risks involved for the causes beyond Ayushmans control, with respect to any consequential damages arising out of nature of service, non-availability of service like power, network connectivity, any shortfall in completeness or loss of information stored, or loss of accuracy.</td>
			        </tr>
				    <tr>
				      <td align="center" valign="top">(b)</td>
				      <td>Licensee SSPs are independent agents who give services in their own individual capacity. Ayushman is not in any way responsible for individual acts of improper or incompetent service provided by Licensee SSP. If it is proven beyond doubt that the promised services provided by the Licensee SSP were not delivered, Ayushman can withhold payments to such service providers in specific instances and money collected for that transaction can be credited back to the customer account. If a Licensee SSP fails to keep an appointment due to any reason, under the terms and conditions of operation, he is obliged to refund the money collected for such transaction and give a free services at a subsequent time mutually suitable. Under such situations Ayushman will credit the customer account with the refund amount. </td>
			        </tr>
				    <tr>
				      <td align="center" valign="top">(c)</td>
				      <td>While Ayushman will take every care to safeguard customer EMR, Ayushman is not responsible for any loss of accidental data or service discontinuity and Licensee SSP agrees to indemnify Ayushman against all and any consequential damages.</td>
			        </tr>
			      </table>
				</li>
				<li class="bodytext_normal"><strong>Settlement of Accounts&nbsp;:</strong>
				  	<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
						<tr>
						  <td width="27" align="center" valign="top">(a)</td>
						  <td width="873">Ayushman follows a monthly cycle of accounts reconciliation. By 15th of the following month, Ayushman will credit all amounts due to individual SSP in their bank accounts provided by them at the time of registration or updated in their profile subsequently. A monthly statement will also be mailed to their email Id. Any disputes must be raised within 15 days from providing the monthly reconciliation statement.</td>
						</tr>
						<tr>
						  <td align="center" valign="top">(b)</td>
						  <td>Daily statements will be available in their account section updated on daily basis.</td>
						</tr>
                  </table>
				</li>
				<li class="bodytext_normal"><strong>Termination :</strong>
				  	<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
				    	<tr>
				      		<td align="center" valign="top">(a)</td>
				      		<td colspan="2">The License provided to the Licensee SSP can be terminated by Ayushman at any time, if in the opinion of Ayushman, </td>
			        	</tr>
						<tr>
						  	<td align="center" valign="top">&nbsp;</td>
						  	<td align="center">I</td>
						  	<td>i.	the SSP  is misusing <em><strong>IndiaOnlineHealth</strong></em> Platform</td>
						</tr>
						<tr>
						  	<td align="center" valign="top">&nbsp;</td>
						  	<td align="center">II</td>
						  	<td>the SSP   is not using <em><strong>IndiaOnlineHealth</strong></em> Platform for genuine purpose</td>
						</tr>
						<tr>
						  	<td width="27" align="center" valign="top">&nbsp;</td>
						  	<td width="23" align="center">III</td>
						  	<td width="840">the SSP   is using <em><strong>IndiaOnlineHealth</strong></em> Platform for commercial, illegal, immoral, or unethical purpose.</td>
						</tr>
						<tr>
						  	<td align="center" valign="top">(b)</td>
						  	<td colspan="2">The License may be terminated by Ayushman, in case SSP fails to renew the subscription or fails to pay charges due to Ayushman within 15 days from the same becoming due. Ayushman, at their sole discretion, may renew the services after full outstanding payment has been paid by the SSP. </td>
						</tr>
						<tr>
						  	<td align="center" valign="top">(c)</td>
						  	<td colspan="2">SSP can decide to discontinue his License by informing Ayushman in writing accordingly. Any amount available in his account will be credited to his bank account at the end of the following reconciliation cycle.</td>
						</tr>
			      	</table>
				</li>
				</br>
				<li class="bodytext_normal"><strong>General :</strong>
				  	<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    	<tr>
                      		<td width="27" align="center" valign="top">(a)</td>
                      		<td width="863" colspan="2">Ayushman has reserved a right to make changes, amendments in its policy and rules for operating and access to its portal, from time to time and those will be binding on the Licensee SSP, and he will never have any objection for such changes and amendments.</td>
                    	</tr>
                    	<tr>
                      		<td align="center" valign="top">(b)</td>
                      		<td colspan="2">Interpretation: In case of any non clarity, ambiguity in the meaning of any sentence or any word or any clause of this document, interpretation made by Ayushman will be final, applicable and binding on all the parties hereto. </td>
                    	</tr>
                   		<tr>
                    	  	<td align="center" valign="top">(c)</td>
                      		<td colspan="2">Terms of Use for Consumer, Doctors and MES, are available for view on the portal under Terms of Use section.</td>
                    	</tr>
                    	<tr>
                      		<td align="center" valign="top">(d)</td>
                      		<td colspan="2">Clarity about various words and phrases used in this document is provided under Definitions heading on <em><strong>IndiaOnlineHealth.com</strong></em> portal. </td>
                    	</tr>
                  	</table>
				</li>
				<li class="bodytext_normal"><strong>Arbitration :</strong>
					<table>
						<tr>
                      		<td class="bodytext_normal">In case of any dispute between the parties hereto with reference to any services provided hereunder, and / or any transaction made under Ayushman On-line platform, it will be referred to the single member arbitration of Mr. Mukund Bakare, and his decision will be final and binding on the disputing parties.</td>
                    	</tr>
                  	</table>
				 </li></br>
				<li class="bodytext_normal"><strong>Disclaimer :</strong>
					<table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
						<tr>
							<td width="27" align="center" valign="top">(a)</td>
							<td width="863" colspan="2">The information contained in this website is for general information purposes only. Ayushman  endeavored to keep the information up to date and correct, No representations or warranties of any kind, express or implied, are given about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information shall be strictly always at Users own risk.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(b)</td>
							<td colspan="2">In no event Ayushman will be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(c)</td>
							<td colspan="2">Through this website, it is possible to link to other websites, which are not under the control of Ayushman. No control is established over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</td>
						</tr>
						<tr>
							<td align="center" valign="top">(d)</td>
							<td colspan="2">Every effort is made to keep the website up and running smoothly. However, there may be occasions due to technical glitches, planned maintenance shut-down or business reasons. Ayushman takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to any reason whatsoever.</td>
						</tr>
					</table>
				</li>
				</br>
				<li class="bodytext_normal"><strong>Jurisdiction :</strong>
				 All the transactions hereunder are subject to Pune Court (Maharashtra State, India) jurisdiction only.</li></br>
            </ol>            
        </td>
    </tr>
</table>	 
</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<div id="wrappertermsfordoctor">
  	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
      		<td align="left" valign="top" style="padding-top:3px;">
	  			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="LeftMenu_BG" style="width:1000px; padding-left:15px; padding-right:15px;">
        			<tr>
          				<td align="left" valign="top" class="LeftMenu_textStyle"><p class="bodytext_normal"><strong><em><u>Terms and Conditions of use by </u></em><u>Doctor</u></strong></p>
            				<p class="bodytext_normal"><span class="bodytext_bold">1.0 Scope:</span></p>
            				<p class="bodytext_normal"> This document outlines the Nature of Service, Roles and Responsibilities, Rights and Duties, Limitations of Liability, and Termination conditions. Before joining this site for offering their services Doctors are advised to go thru this document carefully.<br>
              					<br/> 
              <em><strong>IndiaOnlineHealth</strong></em> is a Web based Platform for Healthcare Service Providers, established and run by Ayushman Pvt. Ltd, a Company Incorporated in India under Companies Act 1956, having its Registered Office presently at: Office 5, Building A, Ramyanagari, Pune 411037, India (herein after referred to as <strong>Ayushman</strong>).</p>
            <p class="bodytext_bold">2.0 Nature of Service</p>
            <p class="bodytext_normal"><em><strong>IndiaOnlineHealth</strong></em> enables the Consumer to take appointment with a Doctor of his choice, registered on this platform, for In-Clinic or On-line consultation, as well as enables On-line Consultation over Video / Phone.  The On-line Video / Phone is ideally suited for Routine consultations, Follow-up consultations, and Second opinion, where, in Doctors opinion, there is no need for physical examination. </p>
            <p class="bodytext_normal">In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to connect on-line with para-medical personnel and also those persons, organizations, who provide health related services, including pathology laboratories, radiology laboratories (all these service providers described in this paragraph and those who provide any healthcare related services but not described in this paragraph are cumulatively, jointly and severally referred to as the Support Service Providers or SSP).</p>
            <p class="bodytext_normal">In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to place order on-line with manufacturers and traders of medicine, medical and surgical equipments, machinery, medical consumables and disposables, orthopedic  and support apparatuses, equipments etc. (all these products providers described in this paragraph and those who provide any healthcare related products but not described in this paragraph are cumulatively, jointly and severally referred to as the Medicine & Equipment Suppliers or MES).</p>
            <p class="bodytext_normal">A facility is made available to all SSP and all MES for providing their services and products to those persons who are desirous of taking their services and products for their health related problems AND / OR to connect with the Consumer and provide seamless services to their Consumer once the consumers <strong>E</strong>lectronic <strong>M</strong>edical <strong>R</strong>ecord (<strong>EMR</strong>) has been updated by the doctor.</p>
            <p class="bodytext_normal">Every Doctor who is desirous of offering his / her services, on <em><strong>IndiaOnlineHealth</strong></em> platform, is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services he / she provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer.</p>
            <p class="bodytext_normal">Every Support Service Provider, who is desirous of offering services, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer. </p>
			<p class="bodytext_normal">Every Medicine & Equipment Supplier, who is desirous of offering products, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the products provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumers. </p>
			<p class="bodytext_normal">Every Consumer, who is desirous of taking On-line advice from Medical Practitioner Doctors for his health related problems, and / or also every Consumer who is desirous of taking services from other Support Service Providers or products from Medicine & Equipment Suppliers, on <em><strong>IndiaOnlineHealth</strong></em> Platform is required to enroll as a Consumer by entering in to an agreement with Ayushman and accept the Terms and Conditions of the agreement. The Registered Consumer also agrees to the condition that all the Responsibilities and Liabilities are borne by the Practitioner Doctor whose advice he / she takes on <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Support Service Provider, whose Services he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Medicine & Equipment Supplier, whose Products he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform. </p>
            <p class="bodytext_bold"><strong>3.0  Agreement&nbsp;:</strong></p>
            <p class="bodytext_normal">Now this deed witnessth the terms and conditions agreed upon by and between Ayushman and the licensee doctor are as under:</p>
              <ol>
                <li class="bodytext_normal">Acceptances of all the terms and conditions of this agreement by the licensee doctor is the consideration for which Ayushman has agreed to provide a license to him to remain present on the On-line platform through the channels made available for that purpose, and to provide his services to every  Consumer, who seeks his advice.</li>
                </br>
                <li class="bodytext_normal">The licensee doctor has hereby declared that, for the purpose of practicing as a medical practitioner doctor, he has passed various authentic examinations conducted by government recognized universities and he has also registered himself with Medical Council of India or its apex bodies, and/or with proper authorities to enable him to practice as a medical practitioner doctor. Details of the examinations passed by him and registration with proper authorities are provided by the Doctor on the registration page of <em><strong>IndiaOnlineHealth.com</strong></em> portal.</li>
                </br>
                <li class="bodytext_normal">The licensee doctor has hereby also declared that, registration certificate enabling him to practice as medical practitioner is in force and he will renew it from time to time before its validity period comes to an end. The licensee doctor will never provide his services during the period wherein his registration certificate enabling him to practice as medical practitioner is not in force.</li>
                </br>
                <li class="bodytext_normal">The licensee doctor has hereby also declared that, he is never convicted for any criminal offence, no criminal proceeding is pending against him in any court of law, and no disciplinary action is taken against him by any authority. </li>
                </br>
                <li class="bodytext_normal">The licensee doctor is permitted to provide advice through Ayushman portal for genuine purposes only and strictly adhering to the medical code of conduct and ethics. The licensee doctor is not permitted to make use of <em><strong>IndiaOnlineHealth</strong></em> portal for any illegal, immoral, or unethical purpose or to misuse it by any way.</li>
                </br>
                <li class="bodytext_normal"><strong>Special notes to Doctors : <br>
                  </strong>
                  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    
                    <tr>
                      <td width="27" align="center" valign="top">(a)</td>
                      <td width="873">The  Doctors who are registered with <strong><em>IndiaOnlineHealth</em></strong><strong> </strong>platform and who provide these  services will, in addition to observing medical ethics and medical code of  conduct prescribed for doctors, exercise utmost care and best professional  judgment at all times to decide if on-line advice can be given based on history  provided by customer EMR. When he deems it necessary he may request the Consumer  to visit him personally to undertake physical examination. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(b)</td>
                      <td>Doctor  should study the Consumer EMR before an On-line consulting session begins and  at the outset seek confirmation from the Consumer that the EMR is current and  complete in all respects. Doctor should review Consumer history to avoid  redundant or conflicting prescriptions and he should feel comfortable that the Consumer  has communicated the information needed to understand and assess his or her  health concern, including sharing pertinent health and personal history. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(c)</td>
                      <td>If  it is a referral case he should ensure that the referring Doctor had examined  the Consumer in person in the recent past and updated his EMR. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(d)</td>
                      <td>Even  in chronic case management the Doctor should advise the Consumer to  periodically visit him in person for examination and consultation. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(e)</td>
                      <td>While  prescribing scheduled drugs Doctor should follow the appropriate Govt. rules  and follow norms laid by Medical council of India and other statutory bodies  where the Consumer resides. </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(f)</td>
                      <td>If  the Doctor feels the scope of the matter presented by the Consumer either  exceeds or isn&rsquo;t within his or her training, the Doctor should feel comfortable  advising the Consumer that other specialties may be called in to offer more  effective care. But at all times Consumer concurrence should be sought by the  Doctor before fixing an appointment with another specialist.</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(g)</td>
                      <td>Doctor  should inform Consumer of precautions to be taken and potential adverse effects  of medications. In On-line Care, such information should also be noted in the  Medicine Prescription section for Consumer review.</td>
                    </tr>
                  </table>
                </li>
                </br>
                <li class="bodytext_normal"><strong>Confidentiality</strong>:</li><table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                  <tr>
                    <td width="27" align="center" valign="top">(a)</td>
                    <td width="873">EMR of the Consumer is private information of the Consumer and its access to the Doctor is given solely for the purpose of enabling Doctor to provide highest quality of professional Service. Doctor needs to treat EMR and related information confidential. If any information needs to be shared with other authorized personnel (Doctors Staff member, another Doctor, SSP, patients close relative etc), it should strictly be on need-to-know basis and in the interest of providing full and better advice. In such cases, Doctor is expected to take permission of the Consumer before sharing such information.</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(b)</td>
                    <td>Doctor  will ensure that his staff is made aware of the privacy involved in medical  consultation and will not provide access to EMR of the Consumer and Consultation  proceedings to staff except for &lsquo;need-to-know&rsquo; basis.</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(c)</td>
                    <td>For  On-line consultation, Doctor will ensure complete privacy from where he is  providing consultation. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(d)</td>
                    <td>The  information provided by the Doctor and the consultation records (examination  details, diagnosis, prescription, investigations, medical or surgical  procedures carried out or reports of such investigations etc) provided to the Consumer  will be stored on the <strong><em>IndiaOnlineHealth </em></strong>Platform; said  information and the proceedings stored on the <strong><em>IndiaOnlineHealth </em></strong>Platform  will be accessible to Ayushman at all times; to which the Doctor will have no  objection at any time. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(e)</td>
                    <td>Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. When used for such purposes Ayushman will take utmost care to keep the identity of the Consumer and Doctor anonymous and confidential adhering to HIPPA guidelines. </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">(f)</td>
                    <td>The Doctor is solely responsible to keep his Access related information such as user name, password and answers to challenge questions etc, as well as access to his email completely confidential.</td>
                  </tr>
                  
                </table>
                <li class="bodytext_normal">Children below 18 and other aged and handicapped need to have their nominated guardian present during an on-line consulting session and Doctor should apprise guardian about his findings and recommendations before the session ends.</li></br>
                <li class="bodytext_normal">The information provided by all Consumers and the records of On-line meeting of all Consumers with the licensee doctor, and also with the SSP, advice given by the licensee doctor, details of services provided by the SSP, etc will be stored on the portal of Ayushman; said information and records stored on the portal of Ayushman will be always accessible to Ayushman; to which the licensee doctor and / or, Consumers and / or the SSP, will not have any objection at any time. Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. In all the cases Ayushman will take every precaution to keep identity of the licensee doctor and the Consumer confidential. </li></br>
                <li class="bodytext_normal">The licensee doctor has hereby authorized Ayushman to collect from the consumers, amount of, consultation fees and the bills he has raised on the Consumers and to transfer money from the consumers account with Ayushman, to the licensee doctors account in the books of Ayushman. </li></br>
				<li class="bodytext_normal">The licensee doctor has hereby authorized Ayushman to deduct from the amount collected from the Consumers and which is payable to the licensee doctor, any outstanding amount payable by the licensee doctor to Ayushman, reimbursement of all collection charges including charges payable to payment gateway service provider, and also all applicable taxes including TDS under income tax act, service tax etc. on the amount payable and/or paid to the licensee doctor.</li>
				</br>
				<li class="bodytext_normal">The licensee doctor has agreed and accepted the responsibility to pay all applicable taxes on the amount he will receive from Ayushman from time to time.</li></br>
				<li class="bodytext_normal">The licensee doctor has specifically and particularly accepted and agreed that <em><strong>IndiaOnlineHealth</strong></em> platform is only a media for On-line meeting of Consumers with licensee doctors and as no physical examination of the Consumer is arranged on it during On-line / Phone consultation sessions, it has a limitation to provide advice. </li>
				</br>
				<li class="bodytext_normal">The licensee doctor will be always exclusively responsible and liable for the advice and for all the consequences of the advice provided by him to every Consumer through <em><strong>IndiaOnlineHealth</strong></em> platform. The licensee doctor has specifically and particularly accepted and agreed that Ayushman will never be responsible or liable for any advice provided by licensee doctor or for any consequences of the advice provided by licensee doctor.</li>
				</br>
				<li class="bodytext_normal">In case Ayushman is held responsible for the advice, services, its consequences, or in case Ayushman is made to bear any expenditure for defending against any such action, or made to pay any amount as an expenses, compensation or under any other head, for the advice, services provided by the  licensee doctor, and / or its consequences,  the  licensee doctor has hereby agreed to indemnify and to keep always indemnified Ayushman against such action, expenses, and payments by Ayushman as an expenses, compensation or under any other head,  and to reimburse the same to Ayushman, i.e. all such expenses borne by it from time to time, and payments by it as compensation or under any other head, with an interest at the rate applicable to lending by State Bank of India.</li></br>
				<li class="bodytext_normal">The licensee doctor has no right to claim any amount from Ayushman for any reason whatsoever it may be.  In case for any reason, Ayushman is made to effect any payment to the licensee doctor, such payment will never exceed the amount of license fees paid by the licensee doctor to Ayushman.</li></br>
				<li class="bodytext_normal"><strong>Limitations of Liabilities:</strong>
				  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
				    <tr>
				      <td width="27" align="center" valign="top">(a)</td>
				      <td width="873">Doctor needs to be aware and understand that providing an On-line Video / Audio / Phone consultation to a Consumer using IndiaOnlineHealth Platform poses certain limitations in providing advice as there is no physical examination of the Consumer by the Doctor. It is not equivalent to an In-clinic consultation. On-line Consultation is best suited for Follow-up consultation and for consultation for routine ailments, not requiring physical examination. Under all circumstances, Doctor is solely responsible for deciding if On-line Consulting is suitable for each specific situation.</td>
			        </tr>
				    <tr>
				      <td align="center" valign="top">(b)</td>
				      <td>All the services provided by Ayushman are technology based and using various Information Technology services, which mainly depend upon availability of power and network connectivity, and which are sometimes beyond the control of Ayushman. The Doctor avails of the service provided by IndiaOnlineHealth on an as-is basis and assumes all the risks involved for the causes beyond Ayushmans control, with respect to any consequential damages arising out of nature of service, non-availability of service like power, network connectivity, any shortfall in completeness or loss of information stored, or loss of accuracy. </td>
			        </tr>
				    <tr>
				      <td align="center" valign="top">(c)</td>
				      <td>Each Doctor is an independent agent who provides services in his own individual capacity. If it is proven beyond doubt that the Doctor did not provide promised services, Ayushman can withhold payments of such deficient service in specific instances and money collected for that transaction can be credited back to the customer account. If a Doctor fails to keep an appointment due to any reason, he is obliged to refund the money collected for such transaction and give a free consultation slot at a subsequent time mutually suitable. Under such situations Ayushman will credit the customer account with the refund amount. </td>
			        </tr>
				    <tr>
				      <td align="center" valign="top">(d)</td>
				      <td>While Ayushman will take every care to safeguard customer data, Ayushman is not responsible for any accidental loss of data or service discontinuity and Doctor agrees to indemnify Ayushman against any and all consequential damages.</td>
			        </tr>
			        </table>
				</li>
				<li class="bodytext_normal"><strong>Settlement of Accounts&nbsp;:</strong>
				  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    <tr>
                      <td width="27" align="center" valign="top">(a)</td>
                      <td width="873">Ayushman follows a monthly cycle of accounts reconciliation. By 15th of the following month, Ayushman will credit all amounts due to individual Doctors in their bank accounts provided by them at the time of registration or updated in their profile subsequently. A monthly statement will also be mailed to their email Id. Any disputes must be raised within 15 days from providing the monthly reconciliation statement.</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(b)</td>
                      <td>Daily statements will be available in their account section updated on daily basis.</td>
                    </tr>
                  </table>
				</li><li class="bodytext_normal"><strong>Termination :</strong>
				  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    <tr>
                      <td align="center" valign="top">(a)</td>
                      <td colspan="2">The License provided to the Doctor can be terminated by Ayushman at any time, if in the opinion of Ayushman, </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">&nbsp;</td>
                      <td align="center">I</td>
                      <td>the Doctor is misusing <em><strong>IndiaOnlineHealth</strong></em> Platform</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">&nbsp;</td>
                      <td align="center">II</td>
                      <td>the Doctor is not using <em><strong>IndiaOnlineHealth</strong></em> Platform for genuine purpose</td>
                    </tr>
                    <tr>
                      <td width="27" align="center" valign="top">&nbsp;</td>
                      <td width="23" align="center">III</td>
                      <td width="840">the Doctor is using <em><strong>IndiaOnlineHealth</strong></em> Platform for commercial, illegal, immoral, or unethical purpose.</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(b)</td>
                      <td colspan="2">Doctor can decide to discontinue his License by informing Ayushman in writing accordingly. Any amount available in his account will be credited to his bank account at the end of the following reconciliation cycle.</td>
                    </tr>
                  </table>
				</li></br><li class="bodytext_normal"><strong>General :</strong>
				  <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                    <tr>
                      <td width="27" align="center" valign="top">(a)</td>
                      <td width="863" colspan="2">Interpretation: In case of any non clarity, ambiguity in the meaning of any sentence or any word or any clause of this document, interpretation made by Ayushman will be final, applicable and binding on all the parties hereto. </td>
                    </tr>
                    
                    <tr>
                      <td align="center" valign="top">(b)</td>
                      <td colspan="2">Terms of Use for Consumer, SSP and MES, are available for view on the portal under Terms of Use section.</td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">(c)</td>
                      <td colspan="2">Clarity about various words and phrases used in this document is provided under Definitions heading on <em><strong>IndiaOnlineHealth.com</strong></em> portal. </td>
                    </tr>
                  </table>
				</li><li class="bodytext_normal"><strong>Arbitration :</strong>
				 In case of any  dispute between the parties hereto with reference to any services provided  hereunder, and / or any transaction made under Ayushman On-line platform, it  will be referred to the single member arbitration of Mr. Mukund Bakare, and his  decision will be final and binding on the disputing parties.
				  </li></br>
				  <li class="bodytext_normal"><strong>Disclaimer :</strong>
				    <table width="930" border="0" cellspacing="10" cellpadding="0" class="bodytext_normal">
                      <tr>
                        <td width="27" align="center" valign="top">(a)</td>
                        <td width="863" colspan="2">The information contained in this website is for general information purposes only. Ayushman  endeavored to keep the information up to date and correct, No representations or warranties of any kind, express or implied, are given about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information shall be strictly always at Users own risk.</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">(b)</td>
                        <td colspan="2">In no event Ayushman will be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">(c)</td>
                        <td colspan="2">Through this website, it is possible to link to other websites, which are not under the control of Ayushman. No control is established over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">(d)</td>
                        <td colspan="2">Every effort is made to keep the website up and running smoothly. However, there may be occasions due to technical glitches, planned maintenance shut-down or business reasons. Ayushman takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to any reason whatsoever.</td>
                      </tr>
                    </table>
				  </li>
				  </br>
				  <li class="bodytext_normal"><strong>Jurisdiction :</strong>
				 All the transactions hereunder are subject to Pune Court (Maharashtra State, India) jurisdiction only.</li></br>
              </ol>            </td>
        </tr>
      </table>	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
 </div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'verificationcode'); ?>
		<?= Arr::path($errors, 'error'); ?>
		<?= Arr::path($errors, 'masterdatanotfound'); ?>
	</div>
</div>
