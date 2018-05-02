<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
			<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />


      
<script src="/ayushman/assets/js/WaterMark.min.js"></script>
<script src="/ayushman/assets/js/jquery.placeholder.js"></script>
<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
</head>
<body>

<script type="text/javascript">
	$(document).ready(function() {
		$(function(){
			$( "input[name=DOB_c]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			}
		);

		$("#firstname").placeholder();
		$("#lastname").placeholder();
		$("#email").placeholder();
		$("#DOB_c").placeholder();
		$("#middlename").placeholder();
		$("#mobilenumber").placeholder();
		$("#secureanswer").placeholder();
		$("#verificationcode").placeholder();
		$("#promocode").placeholder();
		$("#username").placeholder();
		$("#fake_password").placeholder();
		$("#fake_password").focusin(function(){
			$(this).hide();
			$("#password").show();
			window.setTimeout(function(){
				$('#password').focus();
			}, 50);
			//$("#password").focus();
			
		});
		$("#fake_password").click(function(){
			$(this).hide();
			$("#password").show();
			window.setTimeout(function(){
				$('#password').focus();
			}, 50);
			//$("#password").focus();
		});
		$("#password").blur(function(){
			if($(this).val() == ''){
					$("#password").hide();
					$("#fake_password").show();
				}else{
					$("#fake_password").hide();
					$("#password").show();
				}
		});
		$("#password").focusout(function(){
			if($(this).val() == ''){
					$("#password").hide();
					$("#fake_password").show();
				}else{
					$("#fake_password").hide();
					$("#password").show();
				}
		});
		
		$("#fake_password_confirm").placeholder();
		$("#fake_password_confirm").click(function(){
				$(this).hide();
				$("#password_confirm").show();
				window.setTimeout(function(){
					$("#password_confirm").focus();
				}, 50);
				
		});
		$("#fake_password_confirm").focusin(function(){
				$(this).hide();
				$("#password_confirm").show();
				window.setTimeout(function(){
					$("#password_confirm").focus();
				}, 50);
		});
		$("#password_confirm").blur(function(){
			if($(this).val() == ''){
				$("#password_confirm").hide();
				$("#fake_password_confirm").show();
			}else{
				$("#password_confirm").show();
				$("#fake_password_confirm").hide();
			}
				
		});
		$("#password_confirm").focusout(function(){
			if($(this).val() == ''){
				$("#password_confirm").hide();
				$("#fake_password_confirm").show();
			}else{
				$("#password_confirm").show();
				$("#fake_password_confirm").hide();
			}
				
		});
		/*$("#username").WaterMark({
			WaterMarkTextColor: '#8B8B8B'
		});*/
		
		//$("#username").attr("tabindex", 8);
		//$("#password").attr("tabindex", 9);
		//$("#password_confirm").attr("tabindex", 10);
		
		/*$("#email").WaterMark({
			WaterMarkTextColor: '#8B8B8B'
		});*/
		
		var isAyushcarePatient = "<?php echo $isAyushcarePatient; ?>";
		if(isAyushcarePatient == "true")
		{
			for(var iter = document.getElementById("accounttype").length -1; iter >= 0; --iter)
			{
				removeItemInList(iter);
			}
			var opt = document.createElement("option");
			opt.text = "Consumer";
			opt.value = "patient";
			document.getElementById("accounttype").options.add(opt);
			document.getElementById("accounttypetr").style.display= "none";
			$('#ayushcareUserInfo').html('');
			var div ='<div class="table_roundBorder" style="margin-top:0px;background-color:#ecf8fb;width:900px;margin:auto;"><div id="help-main" style="margin-left:15px;"><p class="bodytext_bold"style="font-size:12px;margin:5px;">Please complete your registration here.</br>If you are here to sponsor a relative / friend, his / her details will be collected later.</p></div></div>';
			$('#ayushcareUserInfo').html(div);
		}
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
		password_confirm.add( Validate.Presence );
		
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
		
		$("#username").focus(function(){
			possibleusername();
			//document.getElementById("rowusernamepossiblecombination").style.display = "block";
		});

		$("#username").blur(function(){
	
			checkUsername($("#username").val());
			
		});
		var mobilenumber = new LiveValidation('mobilenumber', {onlyOnSubmit: true });
		mobilenumber.add( Validate.Presence );
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
		
		$("#gender_c option:not([disabled])").css("color", "#000");
		$("#gender_c").change(function() {
		    $(this).removeClass('gray');
		});

		var acceptcheckbox = new LiveValidation('acceptcheckbox');
		acceptcheckbox.add( Validate.Acceptance );
		
		var verificationcode = new LiveValidation('verificationcode', {onlyOnSubmit: true });
		verificationcode.add( Validate.Presence );
		$('#country').trigger('change');
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
		}
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
				$('#fake_password').focus();
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
	$('#username').val(name.innerHTML);
	$('#username').focus();
	checkUsername(name.innerHTML);
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
				usernamestring = usernamestring+" <a onclick='selectedname(this)' style='cursor:pointer;color: blue;border-bottom: 1px solid blue;' >"+newusername+"</a></br>";
				count ++;
			}
			ischeck++;
		}
		document.getElementById("isusernamespresent").value= "true";
		document.getElementById("possiblenames").innerHTML=usernamestring;
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
	if(username != undefined){
		$(".ui-dialog-titlebar").hide();
		//$( "#loading" ).dialog({ modal: false });
		//$('#loading').dialog('open');
		$.ajax({
			url: "/ayushman/cregistrar/checkusernameavailability?username="+username,
			success: function(data) {
				//$('#loading').dialog('close');
				if(data=="invalid" && username != ''){
					document.getElementById("usernameerror").style.display = "block";
					document.getElementById("rowusernamepossiblecombination").style.display = "block";
				}
				else if(data=="invalid"){
					document.getElementById("rowusernamepossiblecombination").style.display = "block";
				}else{
					document.getElementById("usernameerror").style.display = "none";
					
					if($('#username').val() != ''){
						$('#fake_password').focus();
						document.getElementById("rowusernamepossiblecombination").style.display = "none";
					}else{
						document.getElementById("rowusernamepossiblecombination").style.display = "block";
					}
				}
			},
			error : function(){
				//$('#loading').dialog('close');
			}
		});
		//$('#loading').dialog('close');
	}else{
		return true;
	}	
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
function checkPhoneNumber(userphonenumber,dropdown)
	{
		var countryCode = document.getElementById(dropdown);
		var countryCodeValue = countryCode.options[countryCode.selectedIndex].value;
		if(countryCodeValue !="")
		{
			document.getElementById("defaultCountry").value = countryCodeValue;
			document.getElementById("phoneNumber").value = userphonenumber.value;
			//phoneNumberParser();
			var a  = document.getElementById("output").value;
			if (a.indexOf('Result from isValidNumber(): true') > -1) {
		  		//correct phone number
			} 
			else
			{
				if( (userphonenumber.value != "Mobile Number (e.g. 98XXXXXXXX)") || userphonenumber.value != "")
		  		{
					//alert(document.getElementById("output").value);
					//alert("Please enter valid contact number");
		 	 		//userphonenumber.focus();
				}
			}	
		}
		else{
			alert("please select country")
		}
	}
function setisdcode(country,phoneid,mobileid)
{
	var count = country.selectedIndex-1;
	<?php $allcountries = json_encode($objcountries); echo "var javascript_array = ". $allcountries . ";\n"; ?>
	document.getElementById(phoneid).value ='+'+javascript_array[count].isd;
	document.getElementById(mobileid).value ='+'+javascript_array[count].isd;
}
function login()
			{
			//alert("hi");
			document.getElementById('register').style.display = "none";
			document.getElementById('login').style.display = "block";
			
			}
			function register()
			{
			//alert("hi");
			document.getElementById('login').style.display = "none";
			document.getElementById('register').style.display = "block";
			
			}
</script>
<style type="text/css">
	.center{
	 margin-left: 25%;
    margin-right: auto;
    width: 70%;
	}
	.gray {
	    color:#2F4F4F;
	}
	::-webkit-input-placeholder {
   color: #2F4F4F;
}
	.bodytext_bold{
	font-size: 12px;
	}
	.bodytext_normal{
	font-size: 12px;
	}
</style>
<div  style="width:970px; height:auto;border:1; align:left;" > 
	<link rel="stylesheet" href="/ayushman/assets/css/nivo-slider.css" type="text/css" media="screen" />
	<script src="/ayushman/assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="/ayushman/assets/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
	$.noConflict();
			jQuery(document).ready(function($) {
					$('#slider').nivoSlider({pauseTime:8000});
				document.getElementById('login').style.display = "none";	
			});
			
	</script>

	<div id="slider" style="width:100%;display:none;">
		<img src="/ayushman/assets/images/headerimg.png" alt="" width="100%" height="288" />
	</div>
	<div id="slider1" style="width:100%;">
		<img src="/ayushman/assets/images/headerimg.png" alt="" width="100%" height="218" />
	</div>
	<div id="register" style="float:right;width:440px;margin-top:12px;border:3px solid #909090;margin-bottom: 28px;" >
		<form class="cmxform" id="registrationform" onsubmit="return validateForm()" action="/ayushman/cregistrar/register" method="post">
			<div>
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr style="background-color: #11587E;">
						<td width="30%" style="border-radius: 0px;	color: white;font-family: fantasy;font-size: 30px;float: left;" >&nbsp;Register</td>
						<td style="color: white;float: right;margin-top: 9px;margin-right: 15px;"> Already a member? <label style="border-bottom: 1px solid;font-weight: 900;font-size: 18px;" onclick="login()" >Login</label></td> 
					</tr>
				</table>
			</div>
			<input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
			<input type="hidden" name="defaultCountry" id="defaultCountry" value="91" size="2" />
			<input type="hidden" name="carrierCode" id="carrierCode" size="2" />
			<input type="hidden" name="output" id="output" style="width:20px;">
			<input id="termsread" name="termsread" type = "hidden"/>
			<div style="margin-top:0px;padding-top:40px;padding-bottom:10px;background-color:#F1F1F1;">
				<div style="display:inline-flex;width:100%;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;float:left;">
						<input id="firstname" name="firstname" type="text"    class="textarea"  style="width:100%;border:none;"  value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'firstname'); ?>" placeholder="First Name *"  autocomplete="on" maxlength="45" tabindex="1" />
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input id="middlename" name="middlename" type="text" class="textarea"  style="width:100%;border:none;"  value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'middlename'); ?>" placeholder="Middle Name" autocomplete="on" maxlength="45" tabindex="2"/>
					</div>
				</div>
				<div style="display:inline-flex;width:100%;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;">
						<input  id="lastname" name="lastname" type="text" class="textarea"  style="width:100%;border:none;" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'lastname'); ?>" placeholder="Last Name *" autocomplete="on" maxlength="45" tabindex="3" />
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;">
						&nbsp;
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;">
				<div style="display:inline-flex;width:100%;height:30px;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;float:left;">
						<select name="gender_c" id="gender_c" class="textarea gray" tabindex="4" class="textarea" style="width:100%;border:none;" >
							<option value="" disabled selected>-----Select Gender-----</option>
							<option value="Male" style="color:black;">Male</option>
							<option value="Female" style="color:black;">Female</option>
						</select>
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input  id="DOB_c" name="DOB_c" readonly type="text" class="textarea" tabindex="5" style="width:100%;border:none;" value="" placeholder="Date Of Birth *" autocomplete="on" maxlength="45" />
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;">
				<div style="display:inline-flex;width:100%;height:30px;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;float:left;">
						<input name="email" type="text" class="textarea"  style="width:100%;border:none;" id="email"  tabindex="6"  placeholder="Email Id" autocomplete="off" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'email'); ?>"   maxlength="45" /><div id="emailerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div><div id="emailcheckerror" style="color: red;font-style: italic;display:none" >&nbsp;&nbsp;&nbsp;Could not email availability, Please wait...</div>
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input name="mobilenumber" type="text" class="textarea" id="mobilenumber" tabindex="7" class="textarea"  style="width:100%;border:none;" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'mobilenumber'); ?>" onblur="checkPhoneNumber(this,'country')" maxlength="10" placeholder="Mobile Number * (e.g. 98XXXXXXXX)" autocomplete="off" maxlength="10" />
					</div>
				</div>
				<select name="country_c" class="textarea" style="width:47%;margin:8px;margin-top:3px;margin-right:3px;border:none;display:none;"  onchange="setisdcode(this,'isdmobileno1','isdmobileno1');" id="country" > 
					<option value="" disabled>* select Country</option>
					<?PHP  
						for ($i=0;$i<count($objcountries);$i++) {	
							if($objcountries[$i]["countrycode_c"] == '91'){
								print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\" selected>{$objcountries[$i]["country_c"]}</option>";
							}else{
								print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\">{$objcountries[$i]["country_c"]}</option>";
							}
						} 
					?>
				</select>
				<input id="isdmobileno1" style="width:30px;display:none;" type="text"  class="textarea" name="isdmobileno1"  value=""  maxlength="4" readonly="true"/>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;">
				<div style="display:inline-flex;width:100%;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;float:left;">
						<input  id="username" name="username" type="text" class="textarea" autocomplete="off" class="textarea"  style="width:100%;border:none;" value="<?php if(isset($previousvalues))echo Arr::get($previousvalues, 'username'); ?>" placeholder="Username *" maxlength="45"  tabindex="8"  />
						<div id="rowusernamepossiblecombination" style="display:none;position:absolute;float:left;padding:10px;border: 1px solid #2D7A9E;background-color:#ffffff;">
							<div id="usernameerror" class="bodytext_error" style="display:none;z-index:100;position:relative;width:100%;" >&nbsp;&nbsp;&nbsp;Username must be unique. Please write other Username.</div>
							<div id="possiblenames" style="width:46%;margin:8px;margin-top:3px;margin-right:3px;border:none;width:180px;background-color:#ffffff;opacity:1;"; class="bodytext_bold" ></div>
							<input  id="isusernamespresent" style="display:none;" value="false"/>
						</div>
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input name="fake_password" type="number" class="textarea"  style="width:100%;border:none;"  tabindex="9" autocomplete="off" id="fake_password" placeholder="Password *" maxlength="45" />
						<input name="password" type="password" class="textarea"  style="width:100%;border:none;display:none;" tabindex="9"   id="password" maxlength="45" />
					</div>
				</div>
				<div style="display:inline-flex;width:100%;">
					<div style="width:46%;margin:8px;margin-top:3px;margin-right:3px;">
						<input name="fake_password_confirm" type="number"  class="textarea"  style="width:100%;border:none;" tabindex="10" class="textarea" autocomplete="off"  placeholder="Confirm Password *" id="fake_password_confirm" maxlength="45" />
						<input name="password_confirm" type="password"  class="textarea"  style="width:100%;border:none;display:none;" tabindex="10"  class="textarea" id="password_confirm" maxlength="45" />
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;">
						&nbsp;
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;">
				<div style="display:inline-flex;width:100%;height:30px;">
					<div style="width:47%;margin:8px;margin-top:3px;margin-right:-3px;float:left;">
						<select name="securequestion" id="securequestion" tabindex="11" class="textarea gray" class="textarea" style="width:100%;border:none;" id="securequestionlistbox" > <option value="" disabled selected  >select security question *</option>
							<?PHP  
								foreach ($array_securityquestion as $securityquestion) { 										
								print "<option  \" value=\"{$securityquestion->id}\">{$securityquestion->securityquestion_c}</option>";
								} 
							?>
						</select>
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input name="secureanswer" type="text" tabindex="12" class="textarea"  style="width:100%;border:none;" id="secureanswer" placeholder="Answer *" autocomplete="off" maxlength="45" />
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;display:inline-flex;width:100%;">
				<div style="display:inline-flex;width:100%;height:50px;">
					<div style="width:46%;margin:8px;margin-top:0px;margin-right:3px;float:left;">
						<img id="captchasecurityimage" class="textarea" style="width:89%;height:40px;" src="/ayushman/ccreatecaptchasecurityimage/generate" ><img id="reload" onclick="reloadcaptcha()" placeholder="Reload Capcha" style="cursor:pointer;width:15px;height:15px;margin-top:33px;" src="/ayushman/assets/images/refresh.png" /></img>
					</div>
					<div style="width:46%;margin:4px;margin-top:3px;padding-left:9px;float:left;">
						<input type="text" class="textarea" placeholder="Enter code from image *"  style="width:100%;border:none;"  tabindex="13" name="verificationcode" id="verificationcode"/>
							<div class="bodytext_error">
								<?= Arr::path($errors, 'verificationcode'); ?>
							</div>
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;display:none;">
				<div style="display:inline-flex;width:100%;height:30px;">
					<div style="width: 76%;margin: 8px;margin-top: 3px;margin-left: 13%;float: left;color:red;background-color: whitesmoke;font-size: 15px;" class="bodytext_bold">
						<input type="text" class="textarea" style="width:100%;border:none;"  tabindex="13" name="promocode" id="promocode" value="BAGIC-008"/>
					</div>
				</div>
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;width:100%;display:inline-flex;height:41px;" class="bodytext_normal">
				<div style="float:left;"><input type="checkbox" style="width:32px;margin:8px;margin-top:3px;margin-right:3px;float:left;" name="acceptcheckbox" tabindex="14" id="acceptcheckbox" value="checkbox" /></div>
				<div style="margin:8px;margin-top:3px;margin-right:3px;border:none;float:left;width:100%;">
				I have read <a href="javascript:void(0);"  onclick="openterms();"><span class="style26" style="text-decoration:underline;" tabindex="15">Terms &amp; conditions</span></a> completely and by checking the adjoining box I undertake to abide by them. I wish to register as a <strong><span id="rolelable" name="rolelable"  >Consumer</span></strong>.
								
				</div>
								

				
			</div>
			<div style="margin-top:3px;padding-bottom:10px;padding-top:10px;background-color:#F1F1F1;width:100%;height:38px;" class="bodytext_normal">
			<div style="padding-top: 7px;">
				<input type="submit" style="border:1px solid #003058;border-radius:5px 5px 5px 5px;background:#003058;color:white;font-size:13px;padding;3px;text-transform:uppercase;height:25px;font-family:Arial,Helvetica,sans-serif;float: right;margin-right: 8px;" value="Register"/>
				</div>
			</div>

			<select  name="accounttype" class="textarea" style="width:147px;display:none;" id="accounttype" required="required" placeholder="Please select the Account Type"  onchange='OnAccounttypeChange();' >
				<option value="chemist">Chemist</option>
				<option value="patient"  selected="selected">Consumer</option>
				<option value="pathologist">Diagnostic center</option>
				<option value="doctor">Doctor</option>									
			</select>
			<div id="errordiv">
				<?= Arr::get($errors, 'email'); ?>
			</div>
		</form>
	</div>
	
	<div id="login" style="float:right;width:420px;margin-top:12px;z-index: 50000;background:#E8E8E8;border:3px solid #909090;">
					<div class="center">
				 <form id="loginformid" action="/ayushman/cuser/login"  method="post" accept-charset="utf-8">
									<table border="0">
									
										<tr>
											<td  colspan="2"  style="color: #00467F;font-family:Arial,Helvetica,sans-serif;font-size:19px;">Secure Sign In</td>
										</tr>
										<tr>
											<td  colspan="2" >&nbsp;</td>
										</tr>
										<tr>
											<td colspan="2" class="bodytext_bold" id="Username">Username</td>
										</tr>
										<tr style="height:2px;">
											<td colspan="2"><input type="email1" id="email" name="email" tabindex="100" type="text"  style="width:200px;" autocomplete="on"/></td>
										</tr>
										<tr>
											<td  colspan="2" >&nbsp;</td>
										</tr>
										<tr style="height:2px;">
											<td class="bodytext_bold" >Password  </td>
											<td  class="bodytext" ><div align="right"><a href="/ayushman/cpasswordmanager/view" style="color:#00467F;">Forgot Password?</a></div> </td>
										</tr>
										<tr style="height:2px;">
											<td colspan="2"> <input type="password" id="password" tabindex="101" name="password"  style="width:200px;"  /> </td>
										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
										<tr style="height:2px;">
										
                    					<td width="70"><input type="submit" style="border:1px solid #003058;border-radius:5px 5px 5px 5px;background:#003058;color:white;font-size:13px;padding;3px;text-transform:uppercase;height:25px;font-family:Arial,Helvetica,sans-serif;" value="Sign IN" name="name"   /></td>
										
										<td width="130">&nbsp;</td>

										</tr>
										<tr>
											<td>&nbsp;</td>
										</tr>
								</table>
								</form>
								<div class="bodytext_bold"width="60%" style="padding-bottom: 9px;">Not a member? &nbsp;<input type="submit" style="border:1px solid #003058;border-radius:5px 5px 5px 5px;background:#003058;color:white;font-size:13px;padding;3px;text-transform:uppercase;height:25px;font-family:Arial,Helvetica,sans-serif;" value="Register" onclick="register()"   /></div>
						</div>
					   </div>

	<style type="text/css">
	  .question { cursor:default; display:block; width:500px;cursor:pointer; }
	  .answer { display:none; width:500px; padding: 10px 0px 5px 0px; }
	  .container{ display:block; }
	  </style>
	  <script language="javascript" type="text/javascript" src="/ayushman/assets/js/qa.js"></script>
	<div style="float:left;width:517px;margin-right:3px;margin-top:3px;" >
		<div class="bodytext_bold" style="padding:3px;float:none;text-align:left;">
			<p class="bodytext_bold" style="padding-bottom:0px;margin-bottom:7px;font-size:small;margin-top:3px;">IndiaOnlineHealth is India’s first comprehensive platform that connects consumers to Doctors, Diagnostic centres and Medical stores over the internet for health care delivery at consumer’s workplace or his home<br/> and at the clinic.</p>
		</div>
			<div style="padding-left:10px;display:inline-block;float:none;text-align:left;">
			 <div class="container" style="padding:3px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q1" class="fa fa-plus-square-o" ></i></a><span class="bodytext_bold" >What can I do on IndiaOnlineHealth platform?</span></div>
				  <div class="answer"><p class="bodytext_normal">-	Create maintain your Electronic Medical Record, which you can access anytime from anywhere.
						</br>-	Take appointment with doctors to avoid long waiting at the clinic.
						</br>-	Get prescription which is legible and complete with instructions as recommended by Medical Council of India (MCI).
						</br>-	Order pathology tests on diagnostic lab and get reports uploaded – no need to travel for collecting the reports from the diagnostic centres.
						</br>-	Order medicines prescribed by doctor, for drug store to keep ready or deliver.
						</br>-	Consult with doctor in Clinic or On-line from office / home over video / phone. On-line is useful especially for follow-up visits or while you are travelling.
						</p>
				</div>
			  </div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q2" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold" >What is Electronic Medical Record (EMR)?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Electronic Medical Record (EMR) is your medical file (similar to the one that you maintain at home) consisting of all your medical & family history, prescriptions and test reports. 
					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q3" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">How does EMR help?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	EMR ensures that when you consult a doctor, he/she has a complete medical information about you, so that he/she can make expert decisions.
</br>-	For managing chronic diseases, EMR is very useful as it creates a reference point and helps doctor to manage your condition or treat you appropriately.
</br>-	When you decide to change your doctor or take second opinion, your EMR is the key.
</br>-	EMR is extremely useful during emergency as it helps doctor to understand your past medical history and treatment. 

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q4" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Is my EMR confidential?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Absolutely. You decide who can view it. Once you decide your doctor, you allow him to access your records. Later, if you do not wish to show your records any more, simply revoke his access.
</br>-	In addition to doctors, you may also like to enable its access to other relatives or guardians.

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q5" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Who creates my EMR?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Creating past records and uploading past reports or prescriptions is your responsibility. Going forward, prescription written by a doctor registered on IndiaOnlineHealth platform, will go into your EMR automatically. Similarly reports created by a diagnostic lab registered on IndiaOnlineHealth platform, will be uploaded in your EMR.
</br>-	If you consult a doctor who is not registered with our platform, you will need to upload the records yourself just like you create your past records. Similarly, if you go a pathologist who is not registered with our platform, you will need to upload them yourself.

</br>Needless to say that it is in your interest to keep your EMR up-to-date at all times. 

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q6" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">How do I show my EMR to a doctor?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Select your doctor from the list of doctors registered on IndiaOnlineHealth and create your panel of doctors. Once he is a part of your panel, you have given him rights to access your records. He will be able to see all your records – be it allergies, food habits, past medical history, family history, diagnostic reports and prescriptions. 
					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q7" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Can I fix appointment with a doctor? </span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Yes, you may fix appointment with a doctor who is registered on IndiaOnlineHealth platform and has published his timings. 
</br>-	You can fix appointment for an In-Clinic consultation or for an On-line Video / Phone consultation (generally for follow-up).
</br>-	You can choose any available appointment slot of your choice. Normally doctor is expected to keep the appointment but some delays may happen for several reasons beyond his control. 
</br>-	You will get a SMS reminder about your appointment.

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" "><a href="javascript:void(0);" style="padding-right:9px;"><i id="q8" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Can I receive a printed prescription?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Yes. A doctor who uses IndiaOnlineHealth platform has the ability to write a prescription which follows the guidelines recommended by Medical Council of India. It clearly defines medicine name, dosage, frequency, duration and intake instructions. Doctor will normally give you a printed copy of your prescription. If you lose it, don’t worry. You can pull it out again from your records.
					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q9" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Can I order pathology tests on diagnostic centre?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Yes. If doctor has recommended any diagnostic tests, you can order them on diagnostic centre registered on  IndiaOnlineHealth.
</br>-	While ordering tests, only the labs who offer the ordered tests will show up. You will also be able to see their charges before placing the order. 

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q10" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">How do I get my test reports?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Registered diagnostic centre will be able to upload reports ordered by you through the platform. You neither need to visit them to collect reports nor you have to download from your emails.
					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q11" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Can I order medicines prescribed by a doctor?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	Yes. You may place order for medicines prescribed by your doctor on medical stores registered on IndiaOnlineHealth platform. They will keep the supplies ready for pick up. Some of the medical stores have the facility to deliver the medicines your home. Please note that only medicines prescribed by the doctor through prescription created by him/her on IndiaOnlineHealth can be ordered.
					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q12" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">Are there any other benefits?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	There are many tangible and intangible benefits available to our consumers. For example, some of the diagnostic centres offer discounts on diagnostic tests to our consumers. While placing the order, you will be able to avail these discounts. Please note that we do not decide their rates or discounts. Diagnostic tests rates and discounts are solely decided by individual diagnostic centres.

</br></br>We are constantly building network with service providers and we will keep our consumers informed about new benefits.

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q13" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">What are the charges for availing IndiaOnlineHealth facilities?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						There are different plans for individual consumers, corporate employees, college students and insurance policy holders. These plans have been created as per contracts with corporate organisations, college management and insurance policy holders. Once you register, you will have the opportunity to look for a plan that you may be entitled for.
</br>Essentially components of charges are as follows: 

</br>-	One-time registration. 
</br>-	Annual Subscription. 
</br>-	Usage charges for managing appointment, video consultation and other services.
</br>The charges are very nominal and generally meant as dissuasive fees to avoid misuse.

					</p>
				</div>
			</div>
			<div class="container" style="padding:3px;padding-top:5px;">
				<div class="question" ><a href="javascript:void(0);" style="padding-right:9px;"><i id="q14" class="fa fa-plus-square-o"></i></a><span class="bodytext_bold">How do I make payment?</span></div>
				<div class="answer">
					<p class="bodytext_normal">
						-	If there are any payments to be made by you, you may pay on-line using credit/debit card or using net banking.
					</p>
				</div>
			</div>
			</div>
		<div class="bodytext_bold" style="padding:3px;float:none;text-align:left;padding-top: 52px;">
			<p class="bodytext_bold" style="font-size:large;">Look for surprises awaiting you! Register now.</p>
		</div>
	</div>
 </div>

<div id="wrappertermforpat" class="content_bg"  >
  	<table width="785" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
  <tr>
    <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;Terms and Conditions for use by Consumers</td>
  </tr>
  <tr>
    <td height="30" align="left" class="bodytext_bold" style="padding-left:25px;">1.0&nbsp; Scope :</td>
  </tr>
  <tr>
    <td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-bottom:0px; line-height:18px; text-align:justify;">This document outlines the Nature of Service, Roles and Responsibilities, Rights and Duties, Limitations of Liability, and Termination conditions. Before joining this site for seeking advice of Doctors as well as services of Support Service Providers (SSP) and Medicine & Equipment Suppliers (MES), all Consumers are advised to go through this document carefully. 
 
      <br>
      <br>
    <em><strong>IndiaOnlineHealth</strong></em> is a Web based Platform for coordination between consumer and Healthcare Service Providers, established and run by Ayushman Pvt. Ltd, a Company Incorporated in India under Companies Act 1956, having its Registered Office presently at: Office 5, Building A, Ramyanagari, Pune 411037, India (herein after referred to as 'Ayushman') </td>
  </tr>
  <tr>
    <td height="30" align="left" class="bodytext_bold" style="padding-left:25px;">2.0	&nbsp;Nature of Service and schemes framed from time to time for providing various kinds of services :</td>
  </tr>
  <tr>
    <td height="30" align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; line-height:18px; text-align:justify;"><strong><em>IndiaOnlineHealth</em></strong> enables the consumer to take appointment with a doctor of his choice, registered on this platform, for 'In-Clinic' or 'On-line' consultation, as well as enables 'On-line' consultation over video / Phone.  The On-line video / phone is ideally suited for routine consultations, 'Follow-up consultations', and 'Second opinion', where, in doctor's opinion, there is no need for physical examination. <br>
<br>

In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to connect on-line with para-medical personnel and also those persons, organizations, who provide health related services, including pathology laboratories, radiology laboratories (all these service providers described in this paragraph and those who provide any healthcare related services but not described in this paragraph are cumulatively, jointly and severally referred to as the Support Service Providers or SSP). <br>
<br>

In addition, <em><strong>IndiaOnlineHealth</strong></em> platform has also provided a facility for Consumers to place order on-line with manufacturers and traders of medicine, medical and surgical equipments, machinery, medical consumables and disposables, orthopedic  and support apparatuses, equipments etc (all these products providers described in this paragraph and those who provide any healthcare related products but not described in this paragraph are cumulatively, jointly and severally referred to as the Medicine & Equipment Suppliers or MES).
<br>
<br>

A facility is made available to all SSP and all MES for providing their services and products to those persons who are desirous of taking their services and products for their health related problems AND / OR to connect with the Consumer and provide seamless services to their Consumer once the consumer's <strong>E</strong>lectronic<strong> M</strong>edical<strong> R</strong>ecord<strong> (EMR)</strong> has been updated by the doctor. <br>
<br>

Every Doctor who is desirous of offering his / her services, on <em><strong>IndiaOnlineHealth</strong></em> platform, is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services he / she provided through IndiaOnlineHealth platform to the Consumer. <br>
<br>

Every Support Service Provider, who is desirous of offering services, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the services provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumer. <br>
<br>

Every Medicine & Equipment Supplier, who is desirous of offering products, on <em><strong>IndiaOnlineHealth</strong></em> platform is required to enter in to an agreement with Ayushman and accept the terms and conditions of the agreement and also to accept all the responsibilities and liabilities for the products provided through <em><strong>IndiaOnlineHealth</strong></em> platform to the Consumers. <br>
<br>

Every Consumer, who is desirous of taking On-line advice from Medical Practitioner Doctors for his health related problems, and / or also every person who is desirous of taking services from other Support Service Providers or products from Medicine & Equipment Suppliers, on <em><strong>IndiaOnlineHealth</strong></em> Platform is required to enroll as a Consumer by entering in to an agreement with Ayushman and accept the Terms and Conditions of the agreement. The Registered Consumer also agrees to the condition that all the Responsibilities and Liabilities are borne by the Practitioner Doctor whose advice he / she takes on <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Support Service Provider, whose Services he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform and also borne by every Medicine & Equipment Supplier, whose Products he / she takes through <em><strong>IndiaOnlineHealth</strong></em> Platform. </td>
  </tr>
  <tr>
    <td height="30" align="left" class="bodytext_bold" style="padding-left:25px;">3.0 Agreement:</td>
  </tr>
  <tr>
    <td height="30" align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; text-align:justify; line-height:18px;">Now this deed witnessth the terms and conditions agreed upon by and between Ayushman and the Consumers are as under:<br>
<br>


<strong>3.1</strong> Acceptances of all the terms and conditions of this agreement by the Consumer is the consideration for which Ayushman has agreed to provide a license to him, generally to remain present on the On-line platform through the channels made available for that purpose, and to get advice from any Doctor and/or services from any Support Service Provider, of his / her choice, whose advice, services he/she seeks and / or products from any Medicine & Equipment Supplier, whose products he / she takes. 
<br>
<br>
<strong>3.2</strong> The Consumer agrees to pay registration and annual subscription charges through any system adopted by Ayushman from time to time.  
Subscriber has to register himself on IndiaOnlineHealth portal as a Consumer. He will then subscribe to a Blue Plan of his choice by paying the appropriate fees, using any of the payment options offered to him. Details of Blue Plans , Subscription charges and payment terms to Blue Plans are available on the Website. Once a subscriber signs contract and opts for a subscription, it cannot be terminated or changed by the subscriber during the subscription period. Even if the customer does not avail of the services during the contract period no refund will be given. However Customer can subscribe for another plan by paying as per terms and conditions of the plan he opts for. IndiaOnlineHealth reserves the right to change the subscription charges, payment terms, redefine the services under the plan or withdraw the plan at any time without assigning any reason. If a plan, under which Subscriber has subscribed, stands withdrawn by IndiaOnlineHealth, subscriber may shift other plan or ask for refund after deduction of services already availed. He will be intimated by email accordingly at the earliest. <br>
<br>
Ayushman reserves the right to revise the annual subscription from time to time and the Consumer will be informed a month in advance about the same. This agreement will be valid for one year from the agreement date and will deem to be automatically extended unless informed by the Consumer to the contrary in writing a month before this contract expires and accordingly the Consumer will have to pay the next annual payment before the expiry of the current period. If Consumer does not renew the subscription before expiry of current period, Ayushman reserves the right to disable the access to his EMR and all other services available to him by way of his subscription.<br>
<br>
<strong>3.3</strong> Upon successful Registration, Consumer can access his account using his User Id (chosen by him at the time of registration) and password. Consumer is expected to keep his password confidential. Consumer is also encouraged to change his password at regular intervals. <br>
<br>
<strong>3.4</strong> Consumer can opt to create his Electronic Medical Records and take an On-line appointment with the Doctors of his choice to seek on-line advice through IndiaOnlineHealth Platform or In-Clinic consultation advice and / or services of SSP and / or products of MES, as well as avail all other services available to him as a part of his subscription. <br>
<br>
<strong>3.5</strong> Children below 18 and other aged and people with disability need to be represented through their nominated guardian, who should be present during an on-line consulting session and the guardian shall express about his understanding of the findings and recommendations of doctors, before the session ends. <br>
<br>
<strong>3.6</strong> The Consumer is permitted to make use of IndiaOnlineHealth Platform and / or all the facilities available for genuine purposes only. The Consumer is not permitted to misuse IndiaOnlineHealth Platform and / or any facility available thereon, for any commercial, illegal, immoral, or unethical purpose. <br>
<br>
<strong>3.7</strong> The information provided by the Consumer and the proceedings of the meeting of the Consumer with the doctor, also with the SSP, advice given by the doctor, details of services provided by the SSP, will be stored on the IndiaOnlineHealth Platform; said information and the proceedings stored on the IndiaOnlineHealth Platform will be accessible to Ayushman at all times; to which the Consumer will have no objection at any time. Ayushman is at liberty to use the data for all legal purposes including medical research and statistics. When used for such purposes Ayushman will take utmost care to keep the identity of the Consumer anonymous and confidential adhering to HIPPA guidelines. <br>
<br>
<strong>3.8</strong> It is the responsibility of the Consumer to ensure that his Electronic Medical Records (EMR) is current and complete at all times. He will be assisted by his panel of doctors in updating his EMR at various stages. <br>
<br>
<strong>3.9</strong> The Consumer is solely responsible to keep his email, contact details and EMR current, complete and updated at IndiaOnlineHealth Platform, at all times. <br>
<br>
<strong>3.10</strong> The Consumer specifically and particularly accepts that except for the amount of license fees (registration charges, annual subscription) and platform usage charges, all other amounts to be paid by the Consumer will be billed by the doctors and /or SSP and / or MES, as the case may be. Accordingly the Consumer has hereby authorized Ayushman, to accept money from him and transfer it to the doctors and /or SSP and / or MES, as the case may be. <br>
<br>
<strong>3.</strong>11	Limitations of Liabilities <br>
<br>
<strong>a)</strong> The Consumer has specifically and particularly understood, accepted and agreed that IndiaOnlineHealth Platform is only a media which coordinates between consumer and Healthcare Service Providers and in cases of  On-line meeting with doctor, and it has a limitation in providing advice as no physical examination of the Consumer is possible in online meeting. <br>
<strong>b)</strong> During medical emergency, call to a Doctor or, Hospitalization cannot be arranged through this portal. However soft copy of EMR can be provided to the patient or to his hospital on his request. <br>

<strong>c)</strong> Ayushman is not responsible or liable for any advice provided by doctor and for any services provided by SSP or product supplied by MES for any consequences of the advice provided by doctor and for any consequences of any services provided by SSP or product supplied by MES. <br>

<strong>d)</strong> All the services provided by Ayushman are technology based and using various Information Technology services, which mainly depend upon availability of power and network connectivity, which are some times beyond the control of Ayushman. The Consumer avails of the service provided by IndiaOnlineHealth on an 'as-is' and assumes all the risks involved for the causes beyond Ayushman's control, with respect to any consequential damages arising out of nature of service, non-availability of service like power, network connectivity, any shortfall in completeness or loss of information stored, or loss of accuracy. <br>

<strong>e)</strong> Doctors, Consulting specialists, SSP and MES are independent agents who give services in their own individual capacity. Ayushman is not in anyway responsible for individual acts of improper or incompetent advice or service provided by Doctors, Consulting specialists, SSP and MES. If it is proven beyond doubt that the promised services provided by the 'Licensee doctor' were not delivered, Ayushman can with hold payments to such service providers in specific instances and money collected for that transaction can be credited back to the customer account. If a Doctor fails to keep an appointment due to any reason under the terms and conditions of operation he is obliged to refund the money collected for such transaction and give a free consultation slot at a subsequent time mutually suitable. Under such situations Ayushman will credit the customer account with the refund amount. While Ayushman will take every care to safeguard customer EMR, Ayushman is not responsible for any loss of accidental data or service discontinuity and 'Licensee doctor' agrees to indemnify Ayushman against all and any consequential damages. <br>
<br>

<strong>3.12 Cancellation & Refunds:</strong><br>
<strong>a)</strong> Cancellations / Rescheduling of Appointment with a Doctor by Consumer will be not considered if the request is made within 48 hours from scheduled appointment time. If cancellation is made within 48 hours, Doctor's fees will be payable, unless Doctor has explicitly waived the charges. However, Ayushman's Platform usage charge will not be charged. <br>
<strong><br>
b)</strong> Cancellation / Rescheduling of Appointment with a Pathology Lab with 'sample pick up facility' will not be considered if the request is made within 24 hours from scheduled appointed time. If the Cancellation is requested within 24 hours, 'sample pick-up charges' will be payable unless explicitly waived by the Pathology Lab. <br>
<strong><br>
c)</strong> Cancellation / Rescheduling of Appointment with a Radiology Lab will not be considered if the request is made within 48 hours from scheduled appointment time. If cancellation is made within 48 hours, Lab's fees will be payable, unless Lab has explicitly waived the charges. <br>
d)	There is no cancellation of orders placed under the Same Day Appointment with Doctor and Radiology Labs. 
<br>
<strong><br>
e)</strong> No cancellations are entertained for any offer made under a promotional scheme. These are limited occasion offers and therefore cancellations are not possible. <br>
<strong><br>
f)</strong> Ayushman will not accept refund requests for service already availed by the Consumer. Consumer will have to deal with individual Support Service Provider directly for any refund for already availed service by the Doctor / SSP. <br>

<strong><br>
g)</strong> Shortcoming in Service by Doctor or SSP: If Consumer informs Ayushman in writing about shortcoming in services provided by a Licensee Doctor or SSP, Ayushman will investigate the claim and at its sole discretion, may refund a part or full amount paid / deposited by the Consumer to Ayushman, in case the designated service provider has failed to deliver service in part or full. Any such complaint must be reported within 72 hours of such an act happening. In any case, the claim and refund will never exceed the amount paid towards services provided for this specific act. <br>
<br>

<strong>3.13 Termination: </strong><br>
<strong>a)</strong> The License provided to the Consumer can be terminated by Ayushman at any time, if in the opinion of Ayushman, <br>

i.	the Consumer is misusing IndiaOnlineHealth Platform.
<br>
ii.	the Consumer is not using IndiaOnlineHealth Platform for genuine purpose.
<br>
iii.	the Consumer is using IndiaOnlineHealth Platform for commercial, illegal, immoral, or unethical purpose.
<br>
iv.	Consumer interacts with the service providers in insulting manner.  
<br>
<br>
<strong>b)</strong> Renewal of License is due at the end of period for which Consumer has subscribed. If Licenses is not renewed before the due date, the access to his account will be suspended and Consumer will not be able to access his medical records and avail any other services. Consumer will have 15 days to renew his license, after which his account may be permanently suspended or deleted and he may lose all records that he may have created in the past. If Ayushman has retained his EMR records, and Consumer wishes to reactivate his account at a subsequent date, Ayushman will have sole discretion to accept such a request with or without any re-activation charges. <br>

<strong><br>
c)</strong> If the Consumer decides to close his account and informs Ayushman in writing accordingly, following conditions will apply: <br>

 i.	One time registration is non-refundable. 
<br>
ii.	Annual subscription charges will be payable for the calendar month in which cancellation is requested and balance in the account, if any, will be refunded within 60 days after the end of calendar month in which cancellation request is made.
<br>
iii.	Any outstanding charges to Doctors and other Service Providers, whose services have already been availed, will be payable / deductible from advance. 
<br>
<br>

<strong>3.13	General&nbsp;: </strong><br>

<br>
<strong>a)</strong> Interpretation: In case of any non clarity, ambiguity in the meaning of any sentence or any word or any clause of this document, interpretation made by Ayushman will be final, applicable and binding on all the parties hereto. <br>
<strong><br>
b)</strong> Terms of Use for Doctors, SSP and MES, are available for view on the portal under Terms of Use section. <br>
<strong><br>
c)</strong> Clarity about various words and phrases used in this document is provided under Definitions heading on www.indiaonlinehealth.com portal. <br>
<br>


<strong>3.14	Arbitration: <br>

</strong>In case of any dispute between the parties hereto with reference to any services provided hereunder, and / or any transaction made under Ayushman On-line platform, it will be referred to the single member arbitration of Mr. Mukund Bakre, and his decision will be final and binding on the disputing parties. <br>
<br>

<strong>3.15	Disclaimer: </strong><br>
<strong> a)</strong> The information contained in this website is for general information purposes only. Ayushman  endeavoured to keep the information up to date and correct, No representations or warranties of any kind, express or implied, are given about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance placed on such information shall be strictly always at User's own risk. <br>

<br>
<strong> b)</strong> In no event Ayushman will be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website. <br>

<strong><br>
c)</strong> Through this website, it is possible to link to other websites, which are not under the control of Ayushman. No control is established over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them. <br>

<strong><br>
d)</strong> Every effort is made to keep the website up and running smoothly. However, there may be occasions due to technical glitches, planned maintenance shut-down or business reasons. Ayushman takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to any reason whatsoever. <br>
<br>

<strong>3.16	Jurisdiction: </strong><br>

All the transactions hereunder are subject to Pune Court (Maharashtra State, India) jurisdiction only.
</td>
  </tr>
</table>
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
