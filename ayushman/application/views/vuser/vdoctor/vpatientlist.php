<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	function statusnameformatter(cellvalue, options, rowObject )
	{
		var patientuserid =$(rowObject).children()[2].firstChild.data;
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
	
	function viewemrformatter(cellvalue, options, rowObject)
	{
		var patientUserId =$(rowObject).children()[2].firstChild.data;
		return '<a href="javascript:void(0)" onclick="openEMR('+patientUserId+');" title="View EMR" >View / Edit EMR</a>';
	}
	function openEMR(patientUserId){
		parent.location = "/ayushman/cconsultation/view?#patientemr/"+patientUserId;
		parent.location.reload();
	}
	function editemrformatter(cellvalue, options, rowObject)
	{
		var patientUserId =$(rowObject).children()[2].firstChild.data;
		return '<a href="#" onclick="edit_emr('+patientUserId+')" title="Edit EMR" >Edit EMR</a>';
	}
	function show_emr(patientUserId)
	{
		parent.openDialog("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId,948,600);
		//window.open("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	function edit_emr(patientUserId){
		parent.openDialog("/ayushman/cpatientallergy/view?patientUserId="+patientUserId,800,600);
		//window.open("/ayushman/cpatientallergy/view?patientUserId="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	function connectformatter(cellvalue, options, rowObject)
	{	
		console.log($(rowObject).children()[2].firstChild);
		var patientUserId =$(rowObject).children()[2].firstChild.data;
		var lastappset = $(rowObject).children()[8].firstChild.data;
		if(lastappset == "Not Yet Set")
			lastappset= 0;
		else
			lastappset= 1;
		return '<a href="#" onclick="connectnowclick('+patientUserId+','+lastappset+')" title="Connect Now"  >Connect Now</a>';
	}
	
	function connectnowclick(patientUserId,lastappset)
	{
		document.getElementById("patientuserid").value = patientUserId;
		$("#lblerror").text("");
		document.getElementById('lblerror').style.disabled = false;
		document.getElementById('newincidentbutton').checked = true;
		if(lastappset == 0)
		{
			document.getElementById('oldIncidenceTr').style.display = 'none';
		}
		else{
			document.getElementById('oldIncidenceTr').style.display = '';
			$.ajax({
				url: "/ayushman/cpatientdirectory/previousincidence?patientuserid="+patientUserId,
				success: function( data ) {
						//var  incidence =  eval('('+data+')');
						var  incidence = eval('(' + (data)+ ')');
						if(incidence == ''){
							}
						else
						{
							for(var iter = document.getElementById("incidentcombo").length -1; iter >= 0; --iter)
							{
								removeItemInList(iter);
							}
							additemtolocation("Previous Incident","");
							for(i=0;i< incidence.length;i++)
							{
								additemtolocation(incidence[i][1],incidence[i][0]);
							}
						}
					},
					error : function(){}
			  });
		  }	
		document.getElementById('incidenttxt').value ="";
		$('#connectnow').dialog('open');
	}

	function dump(obj)
	{
		var out = '';
		for (var i in obj) {
		out += i + ": " + obj[i] + "\n";
		}
		alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}

	function removeItemInList(i)
	{
		var list  = document.getElementById('incidentcombo');
		list.remove(i);
	}

	function additemtolocation (locationvalue,id)
	{  
		var opt = document.createElement("option");
		opt.text =locationvalue
		opt.value = id;
		document.getElementById("incidentcombo").options.add(opt);       
	}
	
	$(document).ready(function() {
		$(function()
			{

				$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});

			}
		);
		var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
		DOB_c.add( Validate.Presence );
		$('#connectnow').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
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
		$('#nonregisteredUser').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			position:"top"
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
		jQuery("#connectnow").dialog('option', 'position', [150,90]);
		$(".ui-dialog-titlebar").hide();
		$("#connectInclinicAdhoc").onclick=function(){
		
		document.getElementById('lblerror').style.display = false;
		};
	});
	
	function closepopup(thisclose)
	{
		$("#"+thisclose).dialog("close");
	}
	
	function oldincidentbuttonclick()
	{
		$("#lblerror").text("");
		document.getElementById('incidentcombo').disabled = false;
		document.getElementById('incidenttxt').disabled = true;
		document.getElementById('incidenttxt').value ="";
	}
	
	function newincidentbuttonclick()
	{
		$("#lblerror").text("");
		document.getElementById('incidentcombo').disabled = true;
		document.getElementById('incidenttxt').value ="";
		document.getElementById('incidenttxt').disabled = false;
	}
	function editProfile(patId){
		parent.openDialog("/ayushman/cpatientprofile/displayProfile?patId="+patId, '830px','770px');
	}
	function connetonclick()
	{
		$("#lblerror").text("");
		var incidence= "";
		var newIncidence= "";
		if(document.getElementById('newincidentbutton').checked == true)
		{
			if(document.getElementById('incidenttxt').value == "")
			{ 
				$("#lblerror").text("Please enter Incidence Name");
				document.getElementById('lblerror').style.disabled = true;
			}
			else{
				incidence= document.getElementById('incidenttxt').value;
				newIncidence ="true";
			}
		}
		else
		{
			var s = document.getElementById('incidentcombo');
			var selectedValue = s.options[s.selectedIndex].value;
			if(selectedValue == "")
			{ 
				$("#lblerror").text("Please select Incidence Name");
				document.getElementById('lblerror').style.disabled = true;
			}
			else{
				incidence= selectedValue;
				newIncidence ="false";
			}
		}
		
		if(document.getElementById("lblerror").innerHTML == "")
		{
			parent.location="/ayushman/cadhocappointmentmanger/connectinclinc?patientuserid="+document.getElementById("patientuserid").value+"&newIncidence="+newIncidence+"&incidence="+incidence;
			//$("#connectInclinicAdhoc").submit();
		}
	}
function reloadcaptcha() {
  var obj = document.getElementById('captchasecurityimage');
  var src = obj.src;
  var date = new Date();
  obj.src = src + '?v=' + date.getTime();
}

	function addNewPatient(forceadd)
	{ 

		if($("#firstname").val() != '' && $("#lastname").val() != '' && $("#DOB_c").val() != ''){
				
		}else{
			alert('Please, Fill all mandatory fields.');
			return false;
		}
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

		$('#loading').dialog("open");
		$.ajax({
			url: "/ayushman/cregistrar/patientregistrationbystaff?firstname="+$("#firstname").val()+"&lastname="+$("#lastname").val()+"&email="+$("#email").val()+"&contactnumber="+$('#contactnumber').val()+"&mobilenumber="+$('#mobilenumber').val()+"&doctorname=doctor &middlename="+$("#middlename").val()+"&dob="+$("#DOB_c").val()+"&forceadd="+forceadd,
			success:function( data ){
				var returnArray= JSON.parse(data);
				if(returnArray['found'] == 'yes'){
					patName = $("#firstname").val();
					patLastName = $("#lastname").val();
					patContact = $('#mobilenumber').val();
					patEmail = '';
					patId='';
					patDOB = $('#DOB_c').val();
					searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB);
					$('#exists').show();
				}else{
					var displayString= "<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;We have created account for  "+returnArray['name']+". <strong>Ioh id "+returnArray['patientuserid']+"</strong><br/><br/>";
					if((returnArray['mobilenumberPresent']== "true") || (returnArray['emailPresent']== "true" ) )
						displayString = displayString+"<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;Patient has been notified.<br/><br/>";
					else
						displayString = displayString+"<img src='/ayushman/assets/images/error_icon.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;Patient has not been notified. Please inform IOH id to patient.<br/><br/>";
					$('#addNewPatientInformationBody').html(""+displayString+"");
					
					$('#tdTakeappointment').html('<button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="editProfile('+returnArray['patientuserid']+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="takeAppointment('+returnArray['patientuserid']+');">Take appointment</button>');
					$('#addNewPatient').dialog('open');
				}
				$('#loading').dialog("close");
				var form = document.getElementById("registrationform");
				form.reset();
			},
			error:function(){
				$('#loading').dialog("close");
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please try again.','error','id');
			},
		});
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
							$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="connectnowclick('+searchResults[i].id+',1)">Connect now</button></td></tr>').appendTo($("#searchresult"));
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

</script>
<div id="body_contantpatientpage" style="width:828px; height:500px;"> 
	<table>
		<tr>
			<td width="0px">&nbsp;</td>
			<td style="width:818px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="99%" class="Heading_Bg">My Patients</td>
						<td width="1%">&nbsp;</td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td width="0px">&nbsp;</td>
			<td style="width:818px;">
				<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data" autocomplete="off" action="/ayushman/cpatientdirectory/searchpatients">
				<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
					<tr>
						<td  width="24%" algin="right" valign = "bottom" class="bodytext_bold" >Search :</td>
						<td  width="10%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						<td  width="20%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" class="button" value="Search"/>&nbsp;<input type="button" width="100px" name="btnaddpatient" id="btnaddpatient" class="button" value="Add To Network" onclick="window.location='/ayushman/cpatientdirectory/viewpatientvalidation';"  />&nbsp;<input type="button" width="100px" id="btncreatepatient" class="button" value="Create New Patient" onclick="$('#nonregisteredUser').dialog('open');"  /></td>
					</tr>
					<input id="doctorid" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" type="hidden" />
				</table>
				</form>
		</td>
		</tr>	
		<tr>
			<td width="0px">&nbsp;</td>
			<td style="width:818px;" >
				<div id="patientsgrid" >
					<?php		
						
						$whereclause='';
						$data ='[id:'.$doctorid.']';
					
						$doctorjqgridrequest= Request::factory('xjqgridcomponent/index');
						$doctorjqgridrequest->post('usetemplate','true');
						$doctorjqgridrequest->post('name','selecteddoctorbypatient'); // name of gqgrid without space
						$doctorjqgridrequest->post('data',$data);
						$doctorjqgridrequest->post('height','320');
						$doctorjqgridrequest->post('width','800');
						$doctorjqgridrequest->post('sortname','patientid');
						$doctorjqgridrequest->post('group_name','Corporatename'); // group_name should be field using which data will display in group.
						$flag='set'; //This flag is need to set when jqgrid is used for grouping data specific field
						$doctorjqgridrequest->post('flag',$flag);
						
						$doctorjqgridrequest->post('sortorder','asc');
						$doctorjqgridrequest->post('tablename','selecteddoctorbypatient');//used for jqgrid
																//appointment_id,refappfromid_c,Time,Date,Patientname,incidentsname_c
						$doctorjqgridrequest->post('columnnames','doctorid,patientid,patientuserid,patientname,age,city_c,corporatename_c,location_c,date,patientid,patientid,patientid');//used for jqgrid
						$doctorjqgridrequest->post('whereclause',$whereclause);
						$columninfo ='[{"name":"doctorid", "index":"doctorid", "hidden":true,"align":"center"},
						{"name":"patientid", "index":"patientid", "hidden":true,"align":"center"},
						{"name":"patientuserid","index":"patientuserid","hidden":true,"width":100,"align":"left"},
						{"name":"Patient Name","index":"patientname","width":120,"align":"left","formatter":statusnameformatter},
						{"name":"Age(yr)","index":"age","width":45,"align":"left"},
						{"name":"City","index":"city_c","width":70,"align":"left"},
						{"name":"Corporatename","index":"corporatename_c","width":50,"hidden":true,"align":"left"},
						{"name":"Location","index":"location_c","width":70,"align":"left"},
						{"name":"Last Appointment","index":"date","width":100,"align":"left"},
						{"name":"Profile","index":"patientid","width":80,"align":"left","formatter":viewemrformatter},
						{"name":"Connect","index":"patientid","width":80,"align":"left","formatter":connectformatter}
						]';
						$doctorjqgridrequest->post('columninfo', $columninfo);
						$doctorjqgridrequest->post('editbtnenable','false');
						$doctorjqgridrequest->post('deletebtnenable','false');
						$doctorjqgridrequest->post('savebtnenable','false');
						echo $doctorjqgridrequest->execute(); 
					?>	
				</div>
			</td>
		</tr>
		<tr><td><input type="hidden" id="patientuserid" name="patientuserid" value=""/></td></tr>
    </table>
</div>
<div id="connectnow">
	<form id= "connectInclinicAdhoc" class="cmxform" autocomplete="off"  method="post" enctype="multipart/form-data" >
	<table width="500" border="0" cellpadding="0" cellspacing="0" class="table_roundBorder">
		<tr>
			<td height="30" colspan="3" align="left" class="Heading_Bg">
				&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Connect Now
			</td>
		</tr>
		<tr>
			<td height="30" colspan="3" align="left" class="bodytext_normal" style="padding-left:26px;">
				New appointment will create for Consultation. Please enter incidence type :
			</td>
		</tr>
		<tr>
			<td width="46" height="40" align="right"><input name="radiobutton" type="radio" id="newincidentbutton" value="radiobutton" onclick="newincidentbuttonclick()" checked="checked"/></td>
			<td width="103" class="bodytext_normal" style="padding-left:10px;">New Incidence </td>
			<td width="349">
				<input id="incidenttxt" name="incidenttxt" type="text" class="textareapopup"  style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif; height:20px; width:70%;" maxlength="40" onmouseover="$('#lblerror').text('');" />			  
			</td>
		</tr>
		<tr id="oldIncidenceTr" >
			<td height="40" align="right"><input name="radiobutton" type="radio" id="oldincidentbutton" value="radiobutton" onclick="oldincidentbuttonclick()"/></td>
			<td class="bodytext_normal" style="padding-left:10px;">Old Incidence </td>
			<td>
				<select class="input" id="incidentcombo" name="incidentcombo"  style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px; width:70%; overflow-y:scroll;"  align="left" disabled="disabled" onmouseover="$('#lblerror').text('');" >
					<option value="" selected="" >Previous Incident</option>
				</select>			  
			</td>
		</tr>
		<tr>
		  	<td colspan="3" align="left" class="bodytext_error" style="padding-left:25px;"> 
			<lable id="lblerror" disabled="false"></lable>
			</td>
		</tr>
		<tr>
		  	<td colspan="3" align="left"><hr align="center">
			</hr></td>
		</tr>
		<tr>
			<td height="35" align="right">&nbsp;</td>
			<td class="bodytext_normal" style="padding-left:5px;">&nbsp;</td>
			<td align="right" style="padding-right:10px;">
				<table width="167" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="77"  align="center" valign="middle" class="button" style="height:22px;width:77px;" onClick="connetonclick()">Connect</td>
						<td width="13">&nbsp;</td>
						<td width="77" align="center" valign="middle" class="button"style="height:22px;width:77px;" onClick="closepopup('connectnow')">Cancel</td>
					</tr>
				</table>			  
			</td>
		</tr>
	</table>
	</form>
</div>
<div>
	<div id="nonregisteredUser"  >
	<form class="cmxform" autocomplete="off" id="registrationform"   action="javascript:void(0);" method="post">
		<table class = "table_roundBorder" border="0"  style="width:97%;margin-top:5px;margin-left:10px">
		<tr>
			<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Patient Details</td>
		</tr>
		<tr>
			<td width="15%" valign="middle"><label class = "bodytext_bold">First Name * :</label></td>
			<td width="35%"><input id = "firstname" class = "textarea" autocomplete="on" autofocus="autofocus"/></td>
					<script type="text/javascript">
					var firstname = new LiveValidation('firstname');
					firstname.add( Validate.Presence );
					firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
					</script>

			<td width="15%" valign="middle"><label class = "bodytext_bold">Middle Name :</label></td>
			<td width="35%"><input id = "middlename" class = "textarea" autocomplete="on"  /></td>
					<script type="text/javascript">
					var middlename = new LiveValidation('middlename');
					middlename.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
					</script>
		</tr>
		<tr>
			<td width="15%" valign="middle"><label class = "bodytext_bold">Last Name * :</label></td>
			<td width="35%"><input id = "lastname" class = "textarea" autocomplete="on" autofocus="autofocus"/></td>
					<script type="text/javascript">
					var lastname = new LiveValidation('lastname');
					lastname.add( Validate.Presence );
					lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
					</script>
			<td width="15%" valign="middle" class = "bodytext_bold">Date Of Birth* :</td>
			<td width="35%"><input id="DOB_c" name="dob" readonly="readonly"  value="" type="text" class="textarea"/></td>
					<script type="text/javascript">
					var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
					DOB_c.add( Validate.Presence );
					</script>
		</tr>
		<tr>
			<td valign="middle" colspan="4"><hr/></td>
		</tr>
		<tr>
			<td width="15%" valign="middle"><label class = "bodytext_bold">Mobile No :</label></td>
			<td width="35%"><input id = "mobilenumber" autocomplete="on" class = "textarea" /></td>
					<script type="text/javascript">
					var mobilenumber = new LiveValidation('mobilenumber');
					mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
					mobilenumber.add( Validate.Length, { is: 10 });
					mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
					</script>
			<td width="15%" valign="middle"><label class = "bodytext_bold">Contact No :</label></td>
			<td width="35%"><input id = "contactnumber" autocomplete="on" class = "textarea" /></td>
					<script type="text/javascript">
					var contactnumber = new LiveValidation('contactnumber');
					contactnumber.add( Validate.Numericality, {onlyInteger: true } );
					contactnumber.add( Validate.Length, { is: 10 });
					contactnumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
					</script>
		</tr>
		<tr>
			<td width="15%" valign="top"><label class = "bodytext_bold">Email :</label></td>
			<td width="35%" valign="top" ><input id = "email" autocomplete="on" class = "textarea" /></td>
					<script type="text/javascript">
					var email = new LiveValidation('email', {onlyOnSubmit: true });
					email.add( Validate.Email );
					</script>
			<td width="15%" valign="top">
				&nbsp;
			</td>
			<td width="35%" >&nbsp;</span>
			</td>
		</tr>
		<tr>
			<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" class="button" id = "proccedButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" value="Proceed" onclick="addNewPatient();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="button" style="width:80px; height:25px; line-height:23px; text-align:center; float:right;margin-right:20px; text-decoration:none;" value="Cancel" onclick="$('#nonregisteredUser').dialog('close');"/></td>
		</tr>
	</table>
		</form>
		<div id="exists" style="display:none;background-color: rgb(255, 255, 165);border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:94%;height:auto; vertical-align:middle;padding:10px;margin:10px; overflow-x:hidden;" class="bodytext_bold" >
			Users listed below have the same registration information. Do you want to register another user ?
			<input type="button" value="Yes" onclick="addNewPatient('true');" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
		</div>

		<div style="overflow:auto;margin-top:5px;">
			<table id = "searchresult" class = "table_roundBorder" style="width:800;margin-top:5px;margin-left:10px;">
			</table>
		</div>
	</div>
	
</div>
<div id="addNewPatient" style="width:500px;overflow-x:hidden; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Patient registered successfully </label>
	</div>
	<div id="addNewPatientInformationBody" style="width:96%;margin:10px;" class="bodytext_normal" ></div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="80%" style="padding-top:5px;text-align:right;"><button class="button" style="height:25px;width:100px;" onclick="$('#addNewPatient').dialog('close');$('#nonregisteredUser').dialog('close');" >Okay</button>&nbsp;</td>
				</tr>
			</table>
	</div>
</div>

<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>