<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 
<!-- css required for displaying list of plans -->
<style type="text/css">
#navlist
{
	position: relative;
	margin: 0;
	padding: 0;
	white-space: wrap-words;
}

#navlist li
{
	float: left;
	list-style-type: none;
	margin: 0.5px;
	opacity: 1;
	border-radius:5px;
	border: 1px solid #eee;
	/*Transition*/
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	/*Reflection
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.1)));*/
}
#navlist li:hover
{
	opacity: 1;
	border-color: #C0C0C0;
	z-index:100px;
 	/*Reflection
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.4)));*/
	/*Glow*/
	-webkit-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	-moz-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
}

</style>
<script type="text/javascript">






$(document).ready(function() {
	
			$('#addwcity').focus(function(){
			var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("addwstate").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and city_c";
			$("#addwcity").autocomplete({source: urlcity});
			});
			$(function()
		{
			var availablebloodgrps = [
				"O\+",
			    "O-",
				"A+",
				"A-",
				"B+",
				"B-",
				"AB+",
				"AB-"
			];
			$("#bloodgroup").autocomplete({source: availablebloodgrps	});
		}
	);
	
			$('#addwstate').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and state_c";
				$("#addwstate").autocomplete({source: urlstate});
			});
			$('#addwcountry').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and country_c";
				$("#addwcountry").autocomplete({source: urlcountry});
			});
			
			$('#addwpin').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%')  and (country_c like '"+document.getElementById("addwcountry").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and pincode_c";
				$("#addwpin").autocomplete({source:urlpin});
			});
	$(function()
		{

			$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});

		}
	);
	$('#doctorlistbox').multiselect({
				width:"135"
			});
	var myform = document.getElementById('registrationform');
	myform.addEventListener('submit', beforeSubmit);
	
	function beforeSubmit()
	{
		$("#doctors").val($("#languages_c").val());
	}
	
	

		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
	$('#addNewPatient').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
	});
	$(".ui-dialog-titlebar").hide();
	
	var addhline1 = new LiveValidation('addhline1',{onlyOnSubmit: true });
	addhline1.add( Validate.Format, { pattern: /^[a-zA-Z0-9_ ]*$/,failureMessage: "only characters allowed"} );
	
	var addhcity = new LiveValidation('addwcity',{onlyOnSubmit: true });
	addhcity.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var selgender = new LiveValidation('selgender',{onlyOnSubmit: true });
	selgender.add( Validate.Presence );
	
	var locality = new LiveValidation('locality',{onlyOnSubmit: true });
	locality.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwcountry = new LiveValidation('addwcountry',{onlyOnSubmit: true });
	addwcountry.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwstate = new LiveValidation('addwstate',{onlyOnSubmit: true });
	addwstate.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	
	/*var bloodgroup = new LiveValidation('bloodgroup',{onlyOnSubmit: true });
	bloodgroup.add( Validate.Presence );
	*/
	var addhpin = new LiveValidation('addwpin', {onlyOnSubmit: true });
	addhpin.add( Validate.Numericality, {onlyOnSubmit: true } );
	addhpin.add( Validate.Length, { is: 6 });
			
	
	var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
	DOB_c.add( Validate.Presence );
	
	var firstname = new LiveValidation('firstname',{onlyOnSubmit: true });
	firstname.add( Validate.Presence );
	firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	//var middlename = new LiveValidation('middlename',{onlyOnSubmit: true });
	//middlename.add( Validate.Presence );
	//middlename.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var lastname = new LiveValidation('lastname',{onlyOnSubmit: true });
	lastname.add( Validate.Presence );
	lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var mobilenumber = new LiveValidation('mobilenumber',{onlyOnSubmit: true });
	mobilenumber.add( Validate.Presence );
	
	
	var mobilenumber = new LiveValidation('mobilenumber');
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
	var emergencyno = new LiveValidation('emergencyno');
	emergencyno.add( Validate.Numericality, {onlyInteger: true } );
	emergencyno.add( Validate.Length, { is: 10 });
	emergencyno.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
	/*var emergencyno = new LiveValidation('emergencyno',{onlyOnSubmit: true });
	emergencyno.add( Validate.Presence );*/
	

	var medicalprob = new LiveValidation('medicalprob',{onlyOnSubmit: true });
	//medicalprob.add( Validate.Presence );
	medicalprob.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	
	var email = new LiveValidation('email');
	email.add( Validate.Email );
	
});


function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}

function searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB){
	$.ajax({
			url: "/ayushman/ctakeappointment/searchForPatient/get?patName="+patName+"&patLastName="+patLastName+"&patContact="+patContact+"&patEmail="+patEmail+"&patId="+patId+"&dob="+patDOB,
			success: function(jsonSearchResults) {
				searchResults = eval("("+jsonSearchResults+")");
				if(searchResults.length == 0){
					$("<td class='bodytext_bold' colspan='2' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
				else{
					for(var i=0;i<searchResults.length;i++){
						var result = $("<tr id=result style='height:25;'"+i+"></tr>");
						if(searchResults[i].photo == null){
							var imgsrc = '/ayushman/assets/images/pic02.png';
						}
						else{
							var imgsrc = searchResults[i].photo;
						}
						$("<td width='3%' class='bodytext_normal' align='left' valign='top'><img src='"+imgsrc+"' width='90' height='90' </img></td>").appendTo(result);
						var info = $("<td width='97%' name='patInfo' class='bodytext_normal' align='left'></td>");
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Name: "+searchResults[i].name+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Contact: "+searchResults[i].contact+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >DOB: "+searchResults[i].dob+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >IOH ID: "+searchResults[i].id+"</div>").appendTo(info);
						$(info).appendTo(result);
						$(result).appendTo($("#searchresult"));
						$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="takeAppointment('+searchResults[i].id+');">Take appointment</button><button class="button" style="height:25px;margin:5px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+searchResults[i].id+');">Preferred Chemist and Lab</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="icard('+searchResults[i].id+');">Print I-Card</button></td></tr>').appendTo($("#searchresult"));

					}
					$("#searchresult").show();
				}
				parent.setIframeHeight(document.getElementById('icontent'));
				$('#loading').dialog('close');
			},
			error : function(){
				$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
				$("#searchresult").show();
			}
		});
}
function setAge(){
	
	var dob = document.getElementById("DOB_c").value;
	var yeardob=	dob.substring(7);
	var date=new Date();
    var year = date .getFullYear(); 
	var age=year-yeardob;
	if(age==0){
		document.getElementById("age").value="Age<1 Year";
	}
	else{
		document.getElementById("age").value=age;
	}

}
function setDob(){
	var age=document.getElementById("age").value;
	if (age < 1 || age > 120 || !age.match("^[0-9]+$") ) {
		alert("Invalid Age");
		document.getElementById("age").value="";
		document.getElementById("DOB_c").value="";
		
	}
	var d = new Date();
	var day=d.getDate();
	var month = new Array();
	month[0] = "Jan";
	month[1] = "Feb";
	month[2] = "Mar";
	month[3] = "Apr";
	month[4] = "May";
	month[5] = "Jun";
	month[6] = "Jul";
	month[7] = "Aug";
	month[8] = "Sep";
	month[9] = "Oct";
	month[10] = "Nov";
	month[11] = "Dec";
	var n = month[d.getMonth()];
	var year=d.getFullYear();
	//console.log( day, n, year);
	var age=document.getElementById("age").value;
	
	year=year-age;
	if(year%4!=0 && n=="Feb" && day==29){
		day=day-1;
	}
	document.getElementById("DOB_c").value=day+" "+n+" "+year;
}
function buildPatientNetwork(patientuserid){
	parent.openDialog("/ayushman/cpatientprofile/buildnetwork?id="+patientuserid, '900px','1024px');
}
function openuploader(){
		openDialog("/ayushman/cimagedisplay/uploadimagewhileregistration?userid",800,800,this);
}
function openwebcam(){
		openDialog("/ayushman/cimagedisplay/uploadimagefromcam?userid",800,800,this);
}
function takeAppointment(patId){
	window.location = "/ayushman/ctakeappointment/chooseSlot?patId="+patId;
}

function editProfile(patId){
	parent.openDialog("/ayushman/cpatientprofile/displayProfile?patId="+patId, '830px','770px');
}
function icard(patId){
	parent.openDialog("/ayushman/cicard/displayCard?patId="+patId, '830px','auto');
}
function addNewPatient(forceadd){ 

	if(forceadd == undefined){
		forceadd = false;
	}else{
		forceadd = true;
	}
	$('#exists').hide();
	var firstname = new LiveValidation('firstname');
	firstname.add( Validate.Presence );
	firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var lastname = new LiveValidation('lastname');
	lastname.add( Validate.Presence );
	lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );

	var mobilenumber = new LiveValidation('mobilenumber');
	mobilenumber.add( Validate.Numericality, {onlyOnSubmit: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Presence );
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
	
	var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
	DOB_c.add( Validate.Presence );
	if($("#DOB_c").val() == ""){
		alert("Please Enter Date of Birth.");
		return false;
	}
	
	var middlename = new LiveValidation('middlename',{onlyOnSubmit: true });
	middlename.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	//var addhline1 = new LiveValidation('addhline1',{onlyOnSubmit: true });
	//addhline1.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhcity = new LiveValidation('addwcity',{onlyOnSubmit: true });
	addhcity.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	
	var locality = new LiveValidation('locality',{onlyOnSubmit: true });
	locality.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwcountry = new LiveValidation('addwcountry',{onlyOnSubmit: true });
	addwcountry.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addwstate = new LiveValidation('addwstate',{onlyOnSubmit: true });
	addwstate.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var bloodgroup = new LiveValidation('bloodgroup',{onlyOnSubmit: true });
	//bloodgroup.add( Validate.Presence );
	bloodgroup.add( Validate.Format, { pattern: /^(A|B|AB|O)[+-]+$/,failureMessage: "only blood groups allowed"} );
	
	var selgender = new LiveValidation('selgender',{onlyOnSubmit: true });
	selgender.add( Validate.Presence );
	
	var medicalprob = new LiveValidation('medicalprob',{onlyOnSubmit: true });
	//medicalprob.add( Validate.Presence );
	medicalprob.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
	
	var addhpin = new LiveValidation('addwpin', {onlyOnSubmit: true });
	addhpin.add( Validate.Numericality, {onlyOnSubmit: true } );
	addhpin.add( Validate.Length, { is: 6 });
	
	var emergencyno = new LiveValidation('emergencyno');
	emergencyno.add( Validate.Numericality, {onlyOnSubmit: true } );
	emergencyno.add( Validate.Length, { is: 10 });
	//emergencyno.add( Validate.Presence );
	emergencyno.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );

	var email = new LiveValidation('email');
	email.add( Validate.Email );
	$("#doctors").val($("#doctorlistbox").val());
	if($("#doctors").val() == ""){
		alert("Please select doctor names.");
		return false;
	}
	attachnetwork = $('input[id="attachnetwork"]:checked').length > 0 ;
	sendregistrationinfo = $('input[id="registrationinfo"]:checked').length > 0;
	if(firstname.validate() && lastname.validate() && mobilenumber.validate() && middlename.validate() && email.validate() && addhcity.validate() && addhpin.validate() && selgender.validate()){//&& contactnumber.validate()){
		$('#loading').dialog("open");
		$.ajax({
			url: "/ayushman/cregistrar/patientregistrationbystaff?firstname="+$("#firstname").val()+"&lastname="+$("#lastname").val()+"&email="+$("#email").val()+"&gender="+$("#selgender").val()+"&mobilenumber="+$('#mobilenumber').val()+"&doctorname="+$("#doctorlistbox").find(":selected").text()+"&doctorids="+$("#doctors").val()+"&middlename="+$("#middlename").val()+"&dob="+$("#DOB_c").val()+"&bloodgroup="+$("#bloodgroup").val()+"&emergencyno="+$("#emergencyno").val()+"&medicalprob="+$("#medicalprob").val()+"&address="+$("#addhline1").val()+"&locality="+$("#locality").val()+"&city="+$("#addwcity").val()+"&country="+$("#addwcountry").val()+"&state="+$("#addwstate").val()+"&pin="+$("#addwpin").val()+"&forceadd="+forceadd+"&attachnetwork="+attachnetwork+"&sendregistrationinfo="+sendregistrationinfo,
			success:function( data ){
				var returnArray= JSON.parse(data);
				if(returnArray['found'] == 'yes'){
					patName = $("#firstname").val();
					patMiddleName = $("#middlename").val();
					patLastName = $("#lastname").val();
					patDOB = $('#DOB_c').val();
					patGender=$('#selgender').val();
					patContact = $('#mobilenumber').val();
					patEmergencyNo = $('#emergencyno').val();
					patBloodGroup = $('#bloodgroup').val();
					patMedicalProb = $('#medicalprob').val();
					patAddress=$('#addhline1').val();
					patAddress=$('#locality').val();
					patCountry=$('#addwcountry').val();
					patState=$('#addwstate').val();
					patCity=$('#addwcity').val();
					patPin=$('#addwpin').val();
					patEmail = $('#email  ').val();
					patId='';
					
					searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB);
					$('#exists').show();
				}else{
					var displayString= "<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;We have created account for  "+returnArray['name']+". <strong>Ioh id "+returnArray['patientuserid']+"</strong><br/><br/>";
					if((returnArray['mobilenumberPresent']== "true") || (returnArray['emailPresent']== "true" ) )
						displayString = displayString+"<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;Patient has been notified.<br/><br/>";
					else
						displayString = displayString+"<img src='/ayushman/assets/images/error_icon.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;Patient has not been notified. Please inform IOH id to patient.<br/><br/>";
					$('#addNewPatientInformationBody').html(""+displayString+"");
					
					$('#tdTakeappointment').html('<button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="editProfile('+returnArray['patientuserid']+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="takeAppointment('+returnArray['patientuserid']+');">Take appointment</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+returnArray['patientuserid']+');">Preferred Chemist and Lab</button><button class="button" style="height:25px; margin-left:-200px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="icard('+returnArray['patientuserid']+');">Print I-Card</button> ');
					$('#addNewPatient').dialog('open');
				}
				$('#loading').dialog("close");
				
			},
			error:function(){
				$('#loading').dialog("close");
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please try again.','error','id');
			},
		});
	}
	
	<?php $session = Session::instance();
					$path = $session->set('path',"");
?>
}

</script>

<div id="contentdiv" style="height:auto">
</div>
<div id="nonregistedUser"  >
	<form class="cmxform" autocomplete="off" id="registrationform"   action="javascript:void(0);" method="post">
	<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="10" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Patient Details</td>
    </tr>
	<tr>
		<td width="13%" height="28" valign="middle"><label class = "bodytext_bold">Doctor Name * :</label></td>
		<td width="55%" colspan="1">
			<select name="selectedDoctor" multiple="multiple"  onchange="$('#searchform').submit();" class="textarea" id="doctorlistbox" > 
					<?PHP  
						foreach ($array_doctor as $key=> $value) {
							$selected = '';
							if($previousvalues != null)
										if(isset($previousvalues['selectedDoctor'])){
											if($previousvalues['selectedDoctor'] == $key)
											{ 
												$selected = 'selected'; 
											}
										}
							print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
						} 
					?>
			</select>
	    <input type="text" name="doctors" id="doctors" hidden>		</td>
		
		<td width="13%" valign="middle"><label class = "bodytext_bold">Registration No:</label></td>
		<td width="19%"><input name="Input" class = "textarea" id = "regNo" autocomplete="on" /></td>
	</tr>
	</table>
	<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td valign="middle" colspan="6"></td>
	</tr>
	<tr>
		<td width="13%" valign="middle"><label class = "bodytext_bold">First Name * :</label></td>
		<td width="14%"><input id = "firstname" class = "textarea" autocomplete="on" autofocus="autofocus"/></td>
		<td width="13%" valign="middle"><label class = "bodytext_bold">Middle Name :</label></td>
		<td width="23%"><input name="Input2" class = "textarea" id = "middlename" autocomplete="on"  /></td>
		<td width="15%" valign="middle"><label class = "bodytext_bold">Last Name* :</label></td>
		<td width="22%"><input name="Input2" class = "textarea" id = "lastname" autocomplete="on"></td>
	</tr>
	<tr>	</tr>		
		<tr>
		
		 <td width="13%" height="24" valign="middle" class = "bodytext_bold">Date Of Birth* :</td>
		<td width="14%"><input id="DOB_c" name="dob" readonly="readonly"  value="" type="text" class="textarea" onchange="setAge()" /></td>
		<td width="15%" valign="middle"><label class = "bodytext_bold">Age :</label></td>
		<td width="22%"><input id = "age"  maxlength="10" class = "textarea" onchange="setDob()" autocomplete="on" autofocus="autofocus" /></td>
		<td  class="bodytext_bold">Gender* :</td>
		<td>
		<select id="selgender" name="gender_c" class="textarea">
			<option value="">-----Select Gender-----</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>	
		</td>
	    </tr>
		<tr>
			<td width="15%" valign="middle"><label class = "bodytext_bold">Mobile No* :</label></td>
			<td width="22%"><input id = "mobilenumber"  maxlength="10" class = "textarea" autocomplete="on" autofocus="autofocus" /></td>
			<td width="13%" valign="middle"><label class = "bodytext_bold">Email :</label></td>
			<td><input id = "email" autocomplete="on"  class = "textarea" /></td>
			<td width="15%" valign="middle"><label class = "bodytext_bold">Emergency No. :</label></td>
			<td width="22%"><input id = "emergencyno"  maxlength="10" class = "textarea" autocomplete="on" autofocus="autofocus" /></td>
		</tr>
		<td width="13%" valign="middle"><label class = "bodytext_bold">Blood Group :</label></td>
		<td width="23%"><input id = "bloodgroup"  maxlength="10" class = "textarea" autocomplete="on" autofocus="autofocus" /></td>
		<td width="13%" valign="middle"><label class = "bodytext_bold">Known Medical Problem:</label></td>
		<td><input id = "medicalprob" name="medicalprob" autocomplete="on"   autofocus="autofocus"  class = "textarea" /></td>
	</table>	
	<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="8" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Address Details</td>
    </tr>
	<tr>
		<td width="12%" valign="top"><label class = "bodytext_bold">Address Line 1 :</label></td>
		<td width="57%"><input id="addhline1"  type="text"  style="margin-left:22px; width:85%" class="textarea" name="addhline1" maxlength="400"/></td>
		<td width="10%"><label class = "bodytext_bold">Locality :</label></td>
		<td width="23%"><input id="locality"  type="text"  style="margin-left:22px;" class="textarea" name="locality"   maxlength="30"/></td>
	</tr>
	</table>
	
	<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td valign="middle" colspan="6"></td>
	</tr>
	
	
	
	<tr>
		
	<td width="12%" valign="middle"><label class = "bodytext_bold">Country :</label></td>
		<td width="23%"><input id="addwcountry"  type="text"  class="textarea"   name="addwcountry" value="" maxlength="45"/></td>
		<td width="12%" valign="middle"><label class = "bodytext_bold">State :</label></td>
		<td width="22%"><input id="addwstate"  type="text"  class="textarea"  name="addwstate" value="" maxlength="45"/></td>
		<td width="13%" valign="middle"><label class = "bodytext_bold">City :</label></td>
		<td width="23%"><input id="addwcity"  type="text" class="textarea" name="addwcity"  value="" maxlength="45"/></td>
	<td width="0%"></td>
	</tr>

	    
	<td width="12%" valign="middle"><label class = "bodytext_bold">Pin :</label></td>
	<td width="23%"><input id="addwpin"  type="text" class="textarea" name="addwpin"  value="<?php //echo $objaddwork->pin_c;  ?>" maxlength="6"/></td>
	<!--
	<td width="30%">
		<div align="right">
					<img src="<?php //$session = Session::instance();
					//$path = $session->get('path');
					//if ($session->get('path')!=""){echo '/ayushman/assets/userphotos/userphoto.png';}else{echo $session->get('path');}?>" id="profilepic" style="height:140px;width:140px;margin-top:5px;box-shadow:5px 4px 9px #888888;  right: 72px;  float: center;  position: relative;"   alt="NO Pic Set" id="thumb_preview" /><br />-->
					<!--<input type="button" value="Change Profile Picture" class="button" style="float:center;  position: relative;margin-right: 75px;top: 10px;" onclick="openuploader();" /><br />
					<input type="button" value="Take Profile Picture" class="button" style="float:center;  position: relative;margin-right: 82px;top: 15px;" onclick="openwebcam();" /><br/><br/>
		</div>		
	</td>
	-->
	</table>
	
	<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
		
	<tr>
		<td valign="middle" colspan="6"></td>
	</tr>
	<tr>
		<td valign="middle" colspan="6" class="bodytext_bold">
			<input type="checkbox" id = "attachnetwork" checked class="bodytext_bold" style="float:left;"  >&nbsp;Attach Chemist and network for automatic order placement.</input>		</td>
	</tr>
	<tr>
		<td valign="middle" colspan="6" class="bodytext_bold">
		<input type="checkbox" id = "registrationinfo" checked class="bodytext_bold" style="float:left;"  >&nbsp;Send User credentials on Mobile number.</input>		</td>
	</tr>
	<tr>
		<td height="30" colspan="6" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"> <input name="button" type="button" class="button" onclick="openwebcam();" value="Take Profile Picture" />	&nbsp;<input name="Submit" type="Submit" class="button" id = "proccedButton" onclick="addNewPatient();" value="Proceed"/>
	   	</td>
    </tr>
</table>
	</form>
	
</div>
<div id="exists" style="display:none;background-color: rgb(255, 255, 165);border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:94%;height:auto; vertical-align:middle;padding:10px;margin:10px; overflow-x:hidden;" class="bodytext_bold" >
	Users listed below have the same registration information. Do you want to register another user ?
	<input type="button" value="Yes" onclick="addNewPatient('true');" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
</div>

<div style="overflow:auto;margin-top:5px;">
	<table id = "searchresult" class = "table_roundBorder" style="width:800;margin-top:5px;margin-left:10px;">
	</table>
</div>
</div>

<div id="addNewPatient" style="width:500px;overflow-x:hidden; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Patient registered successfully </label>
			<img src="/ayushman/assets/images/Close_Icon.png" style="float:right;cursor:pointer;" onclick="$('#addNewPatient').dialog('close');" width="20" height="20"/>
	</div>
	<div id="addNewPatientInformationBody" style="width:96%;margin:10px;" class="bodytext_normal" ></div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="100%" style="padding-top:5px;" id="tdTakeappointment"></td>
				</tr>
			</table>
	</div>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
