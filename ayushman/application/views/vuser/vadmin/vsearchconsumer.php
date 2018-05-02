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
	<tr class="Heading_Bg" >
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#1c75bc" style="border-bottom:1px solid #a8c8d9;" class="bodytext_bold" >
			<table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
			<tr>
				<td><font size="2" color="white">Search for consumer</font></td>
			<td>
				<!--<a style="float:right;padding-top:5px;padding-right:10px" href="/ayushman/cgroup/view">
					<font size="3" color="white">Back</font>
				</a>-->
				<a style="float:right;" href="/ayushman/cgroup/view">
					<img src="/ayushman/assets/images/goback2.png" style="width:80px;height:30px;" title="Back">
				</a>
			</td>
			</tr>
			</table>
		</td>
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
		<table width="100%" height="30px" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%"><font size="3" float="left">Groups</font></td>
				<td width="20%">
				<select style="background:#ecf8fb;float:left;width:200px;height:20px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="groupid"  id="groupid" title="Please select discount group"> 
				<?PHP  
					print "<option class='bodytext_normal'  \" value=\"\">Select</option>";
					foreach ($groups as $discgroup) {
						print "<option class='bodytext_normal'  \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
					}
				?>
				</select>
				</td>
				<td>
				<button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="searchForPatient();">Search</button>				
				</td>
			</tr>
		</table>
		</td>
    </tr>
</table>
</div>
<!--<div id="exists" style="display:none;background-color: rgb(255, 255, 165);border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:94%;height:auto; vertical-align:middle;padding:10px;margin:10px; overflow-x:hidden;" class="bodytext_bold" >
	Users listed below have the same registration information. Do you want to register another user ?
	<input type="button" value="Yes" onclick="addNewPatient('true');" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
</div>
-->
<div style="overflow:auto;margin-top:5px;">
	<table id = "searchresult" class = "table_roundBorder" style="width:800;margin-top:5px;margin-left:10px;">
	</table>
</div>
</div>

<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript">
$selectedpatid = 0;
$(document).ready(function() {
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
			url: "/ayushman/cgroup/searchallpatients/get?patName="+patName+"&patLastName="+patLastName+"&patContact="+patContact+"&patEmail="+patEmail+"&patId="+patId+"&dob="+patDOB,
			success: function(jsonSearchResults) {
				searchResults = eval("("+jsonSearchResults+")");
				if(searchResults.length == 0){
					$("<td class='bodytext_bold' colspan='2' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
				else{
					for(var i=0;i<searchResults.length;i++){
						var result = $("<tr id=result style='height:25;' ;' "+i+"></tr>");
						if((searchResults[i].photo == null) || (searchResults[i].photo == "")){
							var imgsrc = '/ayushman/assets/images/pic02.png';
						}
						else{
							var imgsrc = searchResults[i].photo;
						}
						$('<tr><td colspan="4" align="right" style=" padding-right:10px;">&nbsp;</td></tr>').appendTo($("#searchresult"));
						$("<td width='3%' class='bodytext_normal' align='left' valign='top'><img src='"+imgsrc+"' width='90' height='90' </img></td>").appendTo(result);
						var info = $("<td width='50%' name='patInfo' class='bodytext_normal' align='left'></td>");
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:100%;padding-left:10px;' >Name: "+searchResults[i].name+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:100%;padding-left:10px;' >Contact: "+searchResults[i].contact+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:100%;padding-left:10px;' >DOB: "+searchResults[i].dob+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:100%;padding-left:10px;' >IOH ID: "+searchResults[i].id+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:100%;padding-left:10px;' >Group: "+searchResults[i].attachedgroup+"</div>").appendTo(info);
						$("<input id='"+searchResults[i].id+"group' type='hidden' value='"+searchResults[i].attachedgroup+"'/>").appendTo(info);

						$(info).appendTo(result);
						$('<td width="40%" align="left" style=" padding-right:200px;"><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="addtogroup('+searchResults[i].id+');">Add to Group</button></td>').appendTo(result);
						$(result).appendTo($("#searchresult"));
						
						//$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="takeAppointment('+searchResults[i].id+');">Take appointment</button><button class="button" style="height:25px;margin:5px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+searchResults[i].id+');">Preferred Chemist and Lab</button></td></tr>').appendTo($("#searchresult"));
						$('<tr><td colspan="4" align="right" style="border-bottom:4px solid #a8c8d9; padding-right:10px;">&nbsp;</td></tr>').appendTo($("#searchresult"));
						
					}
					$("#searchresult").show();
				}
				parent.setIframeHeight(document.getElementById('icontent'));
				$('#loading').dialog('close');
				// Code to scroll to top 
				var url = window.location.href;
				if( url.indexOf('#') < 0 ) {
					window.location.replace(url + "#");
				} else {
					window.location.replace(url);
				}
				//-------------------------------------
			},
			error : function(){
				$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
				$("#searchresult").show();
			}
		});
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
function addtogroup($patId){
		$gid = document.getElementById("groupid").value;
		$selectedpatid = $patId;
		if(($gid=="")||($gid==" "))
			alert("Please select group.");
			//showNotification('300','20','Message','<h5>Please select group.</h5>','notification','timernotification',1000);
		else
		{
			$group = document.getElementById($patId+'group').value;
			if ($group != "-")
				showMessage('250','50','Add to group','Do you really want to change group?','confirmation','cancelappointmentpopup');
			else
			{			
				$.ajax({
				type: "get",
				url: "/ayushman/cgroup/addconsumertogroup?groupid="+$gid+"&consumeruserid="+$patId,
				success: function(){
					searchForPatient();
					showNotification('300','20','Message','<h5>Consumer added to group.</h5>','notification','timernotification',10000);
					//alert("Consumer added to group.");
				}
				});					
				
				// Code to scroll to top 
				var url = window.location.href;
				if( url.indexOf('#') < 0 ) {
					window.location.replace(url + "#");
				} else {
					window.location.replace(url);
				}
				//-------------------------------------
			}
		}
}
var Confirmation_Event = function(id,confirmation){
	$gid = document.getElementById("groupid").value;
	$patId = $selectedpatid;
	if(confirmation == 'yes')
	{
				$.ajax({
				type: "get",
				url: "/ayushman/cgroup/addconsumertogroup?groupid="+$gid+"&consumeruserid="+$patId,
				success: function(){
					searchForPatient();
					showNotification('300','20','Message','<h5>Consumer added to group.</h5>','notification','timernotification',10000);
					//alert("Consumer added to group.");
				}
				});					
				// Code to scroll to top 
				var url = window.location.href;
				if( url.indexOf('#') < 0 ) {
					window.location.replace(url + "#");
				} else {
					window.location.replace(url);
				}
				//-------------------------------------
	}
};

</script>
