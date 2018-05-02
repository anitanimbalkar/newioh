<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>

<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/web2.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet" type="text/css" />
<script src="/ayushman/assets/js/isd/base.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script>
  goog.require('goog.proto2.Message');
</script>
<script src="/ayushman/assets/js/isd/phonemetadata.pb.js"></script>
<script src="/ayushman/assets/js/isd/phonenumber.pb.js"></script>
<script src="/ayushman/assets/js/isd/metadata.js"></script>
<script src="/ayushman/assets/js/isd/phonenumberutil.js"></script>
<script src="/ayushman/assets/js/isd/asyoutypeformatter.js"></script>
<script src="/ayushman/assets/js/isd/demo.js"></script>
</head>
<body>

<script type="text/javascript">
	$(document).ready(function() {
		document.getElementById('isdphonehome').value ='+91';
		$("#username").blur(function(){

			checkUsername($("#username").val());

		});
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "50",
			resizable: false,
			width: "50px"
		});

		$('#accounttype').focus();
		document.getElementById("emailerror").style.display= "none";
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

		var username = new LiveValidation('username',{onlyOnSubmit: true });
		username.add( Validate.Presence );
		username.add( Validate.Length, { minimum: 4 });
		username.add( Validate.Format, { pattern: /^[a-zA-Z0-9.@_\-]+$/,failureMessage: "only alpha numeric and special charaters '., @, -, _' are allowed" } );

		var mobilenumber = new LiveValidation('mobilenumber', {onlyOnSubmit: true });
		mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
		mobilenumber.add( Validate.Length, { is: 10 });
		mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );


		var email = new LiveValidation('email', {onlyOnSubmit: true });
		email.add( Validate.Email );

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


		var acceptcheckbox = new LiveValidation('acceptcheckbox');
		acceptcheckbox.add( Validate.Acceptance );

		var verificationcode = new LiveValidation('verificationcode', {onlyOnSubmit: true });
		verificationcode.add( Validate.Presence );


		$("#firstname").focus();
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
	});
	function validateForm(){
		var checkstring= document.getElementById("mobilenumber").value+document.getElementById("email").value;

		$.ajax({
			url: "/ayushman/cregistrar/checkusernameavailability?username="+username.value,
			async: false,
			success: function(data) {
				$('#loading').dialog('close');
				if(data=="invalid"){
					document.getElementById("usernameerror").style.display = "block";
				}
				else{
					document.getElementById("usernameerror").style.display = "none";
				}
				$( "#loading" ).dialog({ modal: true });
			},
			error : function(){
				$('#loading').dialog('close');
				$( "#loading" ).dialog({ modal: true });
			}
		});

		if(checkstring == '' )
		{
			alert("Mobile number or email id is compulsory.");
			return false;
		}
		else
		{

			if(document.getElementById("emailerror").style.display == 'block' ){
				alert("Selected email id is not unique.");
				return false;
			}else{
				if(document.getElementById("usernameerror").style.display == 'block' )
				{
					alert("Selected username is not unique.");
					$('#username').focus();
					return false;
				}
				else{
					$(".ui-dialog-titlebar").hide();
					$('#loading').dialog('open');
					return true;
				}
			}

		}

	}

	function removeItemInList(i)
	{
		var list  = document.getElementById('accounttype');
		list.remove(i);
	}

	function openDialog(url, width, height){
		$.fancybox({
			'width': width,
			'height': height,
			'autoScale': false,
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'type': 'iframe',
			'href': url,
			'showCloseButton': true,
			'afterClose' : function(){
			//	if(obj != undefined){
				//	if(obj.fancyboxclosed != undefined){
				//		obj.fancyboxclosed(obj);
			//		}
			//	}
			}
		});
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
				/*$("#wrappertermforpat").dialog("option", "width", dWidth);
				$("#wrappertermforpat").dialog("option", "height", dHeight);
				$("#wrappertermforpat").dialog('option', 'position', [wWidth,0]);*/
				openDialog('/ayushman/home/termsAndcondition/patientterms.html', 850, 600);
				//$('#wrappertermforpat').dialog('open');

				break;
			case "chemist":
				/*$("#wrappertermsforchemist").dialog("option", "width", dWidth);
				$("#wrappertermsforchemist").dialog("option", "height", dHeight);
				$("#wrappertermsforchemist").dialog('option', 'position', [wWidth,0]);*/
				openDialog('/ayushman/home/termsAndcondition/chemistterms.html', 850, 600);
				//$('#wrappertermsforchemist').dialog('open');
				break;
			case "pathologist":
				/*$("#wrappertermsforpathologist").dialog("option", "width", dWidth);
				$("#wrappertermsforpathologist").dialog("option", "height", dHeight);
				$("#wrappertermsforpathologist").dialog('option', 'position', [wWidth,0]);*/
				openDialog('/ayushman/home/termsAndcondition/pathologistterms.html', 850, 600);
				//$('#wrappertermsforpathologist').dialog('open');
				break;
			case "doctor":
				/*$("#wrappertermsfordoctor").dialog("option", "width", dWidth);
				$("#wrappertermsfordoctor").dialog("option", "height", dHeight);
				$("#wrappertermsfordoctor").dialog('option', 'position', [wWidth,0]);*/
				openDialog('/ayushman/home/termsAndcondition/doctorterms.html', 850, 600);
				//$('#wrappertermsfordoctor').dialog('open');
				break;
		}
		//$('#topNav').hide();
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
	function setisdcode(country,phoneid,mobileid)
	{
		code = "+91";

		if($(country).val() == 'SG'){
				code = "+65";
		}

		document.getElementById(phoneid).value =code;
	}
</script>
<script type="text/javascript">
function checkEmail(email){
	$(".ui-dialog-titlebar").hide();
	$( "#loading" ).dialog({ modal: false });
	$('#loading').dialog('open');
	document.getElementById("emailcheckerror").style.display = "none";
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
			document.getElementById("emailcheckerror").style.display = "block";
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
		url: "/ayushman/cregistrar/checkusernameavailability?username="+$('#username').val(),
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
	var mobilenumber = new LiveValidation('mobilenumber', {onlyOnSubmit: true });
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );

	var email = new LiveValidation('email', {onlyOnSubmit: true });
	email.add( Validate.Email );
	var role1 = document.getElementById("accounttype");
	var role = role1.options[role1.selectedIndex].value;
	if(role != 'patient')
	{
		email.add( Validate.Presence );
		mobilenumber.add( Validate.Presence );
		document.getElementById("lblemail").innerHTML = "Email Id *";
		document.getElementById("email").placeholder= "* e.g. xyz@domain.com";
		document.getElementById("lblContactNumber").innerHTML ="Contact No *";
		document.getElementById("mobilenumber").placeholder= "* e.g. 9890xxxxxx";
	}
	else
	{
		document.getElementById("lblemail").innerHTML = "Email Id";
		document.getElementById("email").placeholder= "e.g. xyz@domain.com";
		document.getElementById("lblContactNumber").innerHTML ="Contact No";
		document.getElementById("mobilenumber").placeholder= "e.g. 9890xxxxxx";
	}
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
<div id="regnformdiv" class="panel regnformdiv">
		<div class="formHeader">India Online Health - Registration</div>

		<div id="registrationform" style="border:1px solid #eee;">
			<form id="registrationform" class="form-horizontal" style="margin-left:20px;" role="form" onsubmit="return validateForm()" action="/ayushman/cregistrar/savestaffregistration" method="post">
				<input type="hidden" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'activationcode'); ?>" name="activationcode" />
			<input type="hidden" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'doctorid');?>" name="doctorid" id="doctorid"/>
				<div class="col-lg-12 form-group" id="accounttypetr" align="left">
					<div class="row">
						<label for="accounttype">Account Type *</label>
						<select  name="accounttype" id="accounttype"  class="form-control regnformcontrol" required="required" title="Please select the Account Type"  onchange='OnAccounttypeChange();' >
							<option value="staff">Staff</option>
						</select>
					</div>
				</div>
				<div id="ayushcareUserInfo" >

					<div class="row">
						<div class="col-lg-4 form-group" style="margin-right:10px">
								<label for="firstname">First Name *</label>
								<input id="firstname" name="firstname" type="text"  class="form-control regnformcontrol" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'firstname'); ?>" placeholder="* e.g. John"  autocomplete="on" tabindex="1" />

						</div>
						<div class="col-lg-4 form-group" style="margin-right:10px">
								<label for"middlename">Middle Name</label>
								<input id="middlename" name="middlename" type="text"  class="form-control regnformcontrol" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'middlename'); ?>" placeholder="" autocomplete="on" tabindex="2"/>
						</div>
						<div class="col-lg-4 form-group">
							<label for="lasname">Last Name *</label>
							<input  id="lastname" name="lastname" type="text"  class="form-control regnformcontrol" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'lastname'); ?>" placeholder="* e.g Bass" autocomplete="on" tabindex="3" />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 form-group"  style="margin-right:10px">
							<label  for="email" id="lblemail">Email Id</label>
							<input name="email" type="text" id="email"  tabindex="4"  class="form-control regnformcontrol"  placeholder="e.g. xyz@domain.com" readonly="readonly" autocomplete="off" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'email'); ?>"   maxlength="45" /><div id="emailerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div><div id="emailcheckerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Could not email availability, Please wait...</div>
						</div>
						<div class="col-lg-2 form-group" style="margin-right:115px">
							<label for="country_c">Country *</label>
							<select name="country_c"  onchange="setisdcode(this,'isdphonehome','isdmobileno1');" tabindex="5"  class="form-control regnformcontrol" style="width:200px" id="country">
								<option value="" disabled>* select Country</option>
								<?PHP
									for ($i=0;$i<count($objcountries);$i++) {
										print "<option  \" value=\"{$objcountries[$i]->countrycode_c}\">{$objcountries[$i]->country_c}</option>";
									}
								?>
							</select>
						</div>
						<div class="col-lg-2 form-group" style="float:left;">
							<label for="isdphonehome" id="lblContactNumber">Contact No</label>
							<input id="isdphonehome" type="text"  class="form-control regnformcontrol gray" style="width:50px;" name="isdphonehome" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdmobileno1_c'); ?>"  maxlength="4" readonly="true"/>
						</div><div class="col-lg-4 regformcontactno">
							<input name="mobilenumber" type="text" id="mobilenumber" tabindex="6"  class="form-control" style="border: 1px solid #5cb1b6;" size="14" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'mobilenumber'); ?>" onblur="checkPhoneNumber(this,'country')" maxlength="10" placeholder="e.g. 9890xxxxxx" autocomplete="off" />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 form-group" style="margin-right:10px">
							<label for="username">Username *</label>
								<div id="rowusernamepossiblecombination" style="display:none;position:absolute;float:left;">
									<input  id="isusernamespresent" style="display:none;" value="false"/>
									<div id="possiblenames" style="top:40px;position:absolute;z-index:1" class="regformusername" ></div>
								</div>
							<input  id="username" name="username" type="text" class="form-control regnformcontrol" autocomplete="off" size="25" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'username'); ?>" placeholder="* e.g john12bass" maxlength="45"  tabindex="7"  />
						</div>

						<div class="col-lg-4 form-group" style="margin-right:10px">
							<label for="password">Password *</label>
							<input name="password" type="password" class="form-control regnformcontrol" tabindex="8" id="password"/>
						</div>
						<div class="col-lg-4 form-group">
								<label for="password_confirm">Confirm Password *</label>
								<input name="password_confirm" type="password" tabindex="9" class="form-control regnformcontrol" id="password_confirm" />
							</div>
						</div>
							<div id="usernameerror" style="color:red;display:none;float:left;margin-left:-13px;font-style: italic;" >Username must be unique. Please write other Username.</div>
					</div>
					<div class="row">
						<div class="col-lg-8 form-group" style="margin-right:10px">
							<label for="securequestion">Security Question *</label>
							<select name="securequestion" id="securequestion" tabindex="10" class="form-control gray" style="border: 1px solid #5cb1b6;"><option value="" disabled selected  >* select security question</option>
									<?PHP
										foreach ($array_securityquestion as $securityquestion) {
										print "<option \" value=\"{$securityquestion->id}\">{$securityquestion->securityquestion_c}</option>";
										}
									?>
							</select>
						</div>
						<div class="col-lg-4 form-group">
							<label for="secureanswer">Security Answer *</label>
							<input name="secureanswer" type="text" tabindex="11" class="form-control regnformcontrol"  id="secureanswer" placeholder="" autocomplete="off"/>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3 form-group">
							<label>Prove you're not a robot *</label>
						</div>
						<div class="col-lg-4 form-group">
							<img id="captchasecurityimage" src="/ayushman/ccreatecaptchasecurityimage/generate" />

							<input type="button" class="regnbutton" tabindex="12" value="Reload" onclick="reloadcaptcha()" />
						</div>
						<div class="col-lg-4">
							<label for="verificationcode">Verification Code</label>
							<input type="text" class="form-control regnformcontrol" tabindex="13" name="verificationcode" id="verificationcode"/>
						</div>
						<div class="bodytext_error">
							<?= Arr::path($errors, 'verificationcode'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 bodytext">
							<input type="checkbox" name="acceptcheckbox" tabindex="14" id="acceptcheckbox" value="checkbox" />
							I have read <a href="#"  onclick="openterms();"><span id="termsconditions" style="text-decoration:underline;" tabindex="15">Terms &amp; conditions</span></a> completely and by checking the adjoining box I undertake to abide by them. I wish to register as a <strong><span id="rolelable" name="rolelable"  >Consumer</span></strong>.
						</div>
					</div>

					<div class="row">
						<div class="form-group" style="display:none;">
							<div id="termsforpatientregisterby" class="col-lg-11 bodytext">
								<span>I declare that my age is above 18 years as of today. I also declare that I will keep all the information I receive during interactions with the doctors confidential and<br/> I am responsible for consequential damages arising out of information leak from my end during and after the termination of this contract.<br/></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-lg-11" align="right" >
							<input type="submit" tabindex="16" class="regnbutton" value="REGISTER>>"/>
							</div>
						</div>
					</div>
					<input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
					<input type="hidden" name="defaultCountry" id="defaultCountry" size="2" />
					<input type="hidden" name="carrierCode" id="carrierCode" size="2" />
					<input type="hidden" name="output" id="output"/>
				</div>


				<ul id="errorMessageBox" ></ul>
					<div id="errordiv">
						<?= Arr::get($errors, 'email'); ?>
					</div>
				<label id="savelbl" style="font-weight:bold;display:none; "> User details have been saved.</label>

				<input id="termsread" name="termsread" type = "hidden"/>
			</form>
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

