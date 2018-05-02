<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" rel="stylesheet" />
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
<div id="contentdiv" style="height:auto">
<div id="registedUser"  >
<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
	<tr>
		<td width="10%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
		<td width="38%" ><input <input id = "patId" autocomplete="on" autofocus="autofocus" class = "textarea" /></td>
	</tr>
	<tr>
		<td valign="middle"><label class = "bodytext_bold">First Name :</label></td>
		<td><input id = "patName" autocomplete="on" class = "textarea" /></td>
		<td valign="middle"><label class = "bodytext_bold">Last Name :</label></td>
		<td><input id = "patLastName" autocomplete="on" class = "textarea" /></td>
	</tr>
	<tr>
		<td valign="middle"><label class = "bodytext_bold">Email :</label></td>
		<td ><input <input id = "patEmail" autocomplete="on" class = "textarea" /></td>
		<td width="11%" valign="middle"><label class = "bodytext_bold">Contact No :</label></td>
		<td width="41%"><input id = "patContact" autocomplete="on" class = "textarea" /></td>
	</tr>
	<tr>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
		<button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="searchForPatient();">Search</button></td>
    </tr>
</table>
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

<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<div id="creditPatient" title="Cash Receipt" style="display: none;">
  <form id="creditPatient" >
    <div style="margin-left: 23px;">
        <p>
            <br /><br />
			<input type="hidden" id="CAiohid"  name="CAiohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<label>Description :</label>
			<input id="creditdesc" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label>Date  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="creditdate" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
			</br></br>
			<label>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="creditamount" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
			</br></br>
			<label>Doctor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<select name="DoctorId" class="textarea" id="DoctorId" > 

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
        </p>
		</br>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save & Print" onclick="creditPatientinData(document.getElementById('CAiohid').value,document.getElementById('DoctorId').value);"/>
		</br>
		
	</div>
  </form>  
</div>	
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(function()
		{

			$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			$( "input[name=creditdate]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});

		}
	);
	$('#doctorlistbox').multiselect({
				width:"135"
			});
	
	function beforeSubmit()
	{
		$("#doctors").val($("#languages_c").val());
	}
	
	
	$('#patientsearchform').keypress(function(e) {
		if(e.which == 13) {
			searchForPatient();
		}
	});
	$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
	
	$(".ui-dialog-titlebar").hide();
	var firstname = new LiveValidation('patName');
	firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );

	var lastname = new LiveValidation('patLastName');
	lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );

	var mobilenumber = new LiveValidation('patContact');
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );

	var email = new LiveValidation('patEmail');
	email.add( Validate.Email );

	var ID = new LiveValidation('patId');
	ID.add( Validate.Numericality, {onlyInteger: true } );
	ID.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
});


function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}
function searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB){
	$.ajax({
			url: "/ayushman/ctakeappointment/searchForPatientbyStaff/get?patName="+patName+"&patLastName="+patLastName+"&patContact="+patContact+"&patEmail="+patEmail+"&patId="+patId+"&dob="+patDOB,
			success: function(jsonSearchResults) {
				searchResults = eval("("+jsonSearchResults+")");
				if(searchResults.length == 0){
					$("<td class='bodytext_bold' colspan='2' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
				else{
					for(var i=0;i<searchResults.length;i++){
						var result = $("<tr id=result style='height:25;'"+i+"></tr>");
						if((searchResults[i].photo == null) || (searchResults[i].photo == "")){
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
						//$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="takeAppointment('+searchResults[i].id+');">Take appointment</button><button class="button" style="height:25px;margin:5px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+searchResults[i].id+');">Preferred Chemist and Lab</button></td></tr>').appendTo($("#searchresult"));
						$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="cashReceipt('+searchResults[i].id+');">Cash Receipt</button><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="takeAppointment('+searchResults[i].id+');">Take appointment</button><button class="button" style="height:25px;margin:5px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+searchResults[i].id+');">Preferred Chemist and Lab</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="icard('+searchResults[i].id+');">Print I-Card</button></td></tr>').appendTo($("#searchresult"));
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
function buildPatientNetwork(patientuserid){
	parent.openDialog("/ayushman/cpatientprofile/buildnetwork?id="+patientuserid, '900px','1024px');
}
function searchForPatient(){
	$("#searchresult").empty();
	var patName = $("#patName").val();
	var patLastName = $("#patLastName").val();
	var patContact = $("#patContact").val();
	var patEmail = $("#patEmail").val();
	var patId = $("#patId").val();
	var patDOB = '';
	if(patName == "" && patContact == "" && patEmail == "" && patId == "" && patLastName == ""){
		$("<td class='bodytext_bold' colspan='2' align='middle'>Please Fill One or More of above fields.</td>").appendTo($("#searchresult"));
		$("#searchresult").show();
	}
	else{
		$('#loading').dialog('open');
		searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB);
	}
}

function takeAppointment(patId){
	window.location = "/ayushman/ctakeappointment/chooseSlot?patId="+patId;
}

function editProfile(patId){
	parent.openDialog("/ayushman/cpatientprofile/displayProfile?patId="+patId, '830px','770px');
}

function cashReceipt(patId)
{	
	document.getElementById("CAiohid").value=patId;
	document.getElementById("creditdate").value=$.datepicker.formatDate('dd M yy', new Date());
	document.getElementById("creditamount").value='';
	document.getElementById("creditdesc").value='';
		$("#creditPatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: ' Credit  --- '+patId,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		});
}
function icard(patId){
	parent.openDialog("/ayushman/cicard/displayCard?patId="+patId, '830px','auto');
}
function creditPatientinData(patId,docId){
	var CAamount=document.getElementById("creditamount").value;
		if(CAamount == ""){
			window.alert('Please enter values');
		}
		else
		{
			$.ajax({
				url: "/ayushman/cbill/saveReceipt?patId="+patId+"&docId="+docId+"&amount="+CAamount,
				success: function(data) {
				alert("Account Credited");
				$("#creditPatient").dialog( "close" );	
				refreshgrid();
        }           
        }); 
				$("#creditPatient").dialog( "close" );	
				// Refresh screen for the changes
				//searchForPatient();
				//refreshgrid();	
	}	
}
</script>
