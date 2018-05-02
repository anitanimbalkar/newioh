
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
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
		$('#accesscode').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#accesscode").dialog('option', 'position', [150,90]);
		$('#accesscodematched').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#accesscodematched").dialog('option', 'position', [150,90]);
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
		jQuery("#connectnow").dialog('option', 'position', [150,90]);
		$(".ui-dialog-titlebar").hide();
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
	
	function sendaccesscode()
	{
		document.getElementById("code").value = "";
		$.ajax({
			url: "/ayushman/cpatientdirectory/sendacesscode?patientuserid="+<?= trim($objUserForPatient->id);?>,
			success: function( data ) {
				if(data == "sucess")
				{
					$('#accesscode').dialog('open');
				}
				else{
				 	if(data == "completed status")
				 		showMessage('250','50','Errors',"Patient is present in your network list",'error','errordialogboxid');
					showMessage('250','50','Errors',"Error while sending acesscode. Please try again",'error','errordialogboxid');
				}
			},
			error : function(){}
		});
	}
	
	function closepopup(thisclose)
	{
		$("#"+thisclose).dialog("close");
	}
	
	function verifycode()
	{
		var code = document.getElementById("code").value;
		if(code != "")
		{
			$.ajax({
					url: "/ayushman/cpatientdirectory/verifycode?patientuserid="+<?= trim($objUserForPatient->id);?>+"&code="+code,
					success: function( data ) {
						if(data == "sucess")
						{
							$('#accesscode').dialog('close');
							$('#accesscodematched').dialog('open');
						}
						else{
							$("#lblaccesscodeerror").text("Please enter correct code provided by patient");
							document.getElementById('lblaccesscodeerror').style.disabled = true;
						}
					},
					error : function(){}
			});
		}
		else
		{
			$("#lblaccesscodeerror").text("Please enter code provided by patient");
			document.getElementById('lblaccesscodeerror').style.disabled = true;
		}
	}
	
	function connentnowclick(patientUserId,lastappset)
	{
		var lastappset= 0;
		$('#accesscodematched').dialog('close');
		$("#lblerror").text("");
		document.getElementById("patientuserid").value = patientUserId;
		document.getElementById('lblerror').style.disabled = false;
		document.getElementById('newincidentbutton').checked = true;
		if(lastappset == 0)
		{
			document.getElementById('oldIncidenceTr').style.display = 'none';
		}
		else{
			document.getElementById('oldIncidenceTr').style.display = '';
			$.ajax({
				url: "/ayushman/cpatientdirectory/previousincidence?patientuserid="+<?= trim($objUserForPatient->id);?>,
				success: function( data ) {
						//var  incidence =  eval('('+data+')');
						var  incidence = eval('(' + (data)+ ')');
						if(incidence == '')
							alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
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
			alert(selectedValue);
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
			$.ajax({
						url: "/ayushman/cadhocappointmentmanger/connectinclinc?patientuserid="+document.getElementById("patientuserid").value+"&newIncidence="+newIncidence+"&incidence="+incidence,
						data: $("#connectInclinicAdhoc").serialize(),
						type:'POST',
						success:  function(data) {
							parent.window.location=data;
						},
				});
		}
	}
</script>
<div style="width:828px;height: 560px; overflow-x:hidden;" >
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td colspan="4">
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Profile</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table border="0" align="center" cellpadding="0" cellspacing="0"  style="width:100%;">
    	<tr>
      		<td style="padding-left:7px; padding-right:7px; padding-bottom:10px; padding-top:10px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
          			<tr>
            			<td width="3%" align="left" valign="middle">&nbsp;</td>
            			<td width="15%" align="left" valign="top"><img src="<?php if($objUserForPatient->photo_c == ''){echo '/ayushman/assets/images/pic02.png';}else{echo $objUserForPatient->photo_c;} ?>" width="100" height="115"/></td>
            			<td colspan="3" align="left"  valign="top" class="bodytext_bold">
            				<table width="100%" border="0" cellspacing="0" cellpadding="0">
              					<tr>
                					<td width="18%" height="21" align="left" valign="middle" class="bodytext_bold">Name</td>
                					<td width="2%" height="21" align="left" valign="middle" class="bodytext_normal">:</td>
                					<td width="80%" height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objUserForPatient->Firstname_c.' '.$objUserForPatient->middlename_c.' '.$objUserForPatient->lastname_c;  ?></td>
              					</tr>
								<tr>
									<td height="21" align="left" valign="middle" class="bodytext_bold">Gender</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal"><?= trim($objUserForPatient->gender_c);?></td>
								</tr>
								<tr>
									<td height="21" align="left" valign="middle" class="bodytext_bold">Contact Number</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal"><?= trim($objUserForPatient->mobileno1_c);?></td>
								</tr>
								<tr>
									<td colspan="3" >
										<HR style="height:0.5px; margin-left:0px; margin-right:20px;"/>
									</td>
								</tr>
								<tr>
									<td colspan="3" >
										<input type="button" width="100px" name="btnaddpatient" id="btnaddpatient" class="button" value="Back" onclick="window.location='/ayushman/cpatientdirectory/viewpatientvalidation';"  />&nbsp;&nbsp;<input type="button" width="100px" name="btnaccesscodes" id="btnaccesscodes" class="button" value="Add patient to network" onclick="sendaccesscode()"  />&nbsp;&nbsp;<input type="button" width="100px" name="btnpatientnetwork" id="btnpatientnetwork" class="button" value="Cancel" onclick="window.location='/ayushman/cpatientdirectory/view';"  />
									</td>
								</tr>
            				</table>
            			</td>
            			<td valign="top" align="right" padding-top="5px;"  ><input type="hidden" id="patientuserid" name="patientuserid" value=""/></td>
          			</tr>
      			</table>
      		</td>
    	</tr>
  	</table>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
 <div id="accesscode">
	<form id= "accesscodeform" class="cmxform" autocomplete="off"  method="post" enctype="multipart/form-data" >
	<table width="500" border="0" cellpadding="0" cellspacing="0" class="table_roundBorder">
		<tr>
			<td height="30" colspan="3" align="left" class="Heading_Bg">
				&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Verification
			</td>
		</tr>
		<tr>
		  	<td colspan="3" align="left">
			&nbsp;</td>
		</tr>
		<tr>
			<td height="30" colspan="2" align="left" class="bodytext_normal" style="padding-left:26px;">
				Please enter code provided by patient:
			</td>
			<td width="250"><input type="text" style="width:100px;" name="code" id="code" class="textarea" onmouseover="$('#lblaccesscodeerror').text('');" />
			</td>
		</tr>
		<tr>
		  	<td colspan="3" align="left" class="bodytext_error" style="padding-left:25px;"> 
			<lable id="lblaccesscodeerror" disabled="false"></lable>
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
						<td width="77"  align="center" valign="middle" class="button" style="height:22px;width:77px;" onClick="verifycode()">Ok</td>
						<td width="13">&nbsp;</td>
						<td width="77" align="center" valign="middle" class="button"style="height:22px;width:77px;" onClick="closepopup('accesscode')">Cancel</td>
					</tr>
				</table>			  
			</td>
		</tr>
	</table>
	</form>
</div>
<div id="accesscodematched">
	<form id= "accesscodeform" class="cmxform" autocomplete="off"  method="post" enctype="multipart/form-data" >
	<table width="500" border="0" cellpadding="0" cellspacing="0" class="table_roundBorder">
		<tr>
			<td height="30" colspan="3" align="left" class="Heading_Bg">
				&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Verification Successful 
			</td>
		</tr>
		<tr>
		  	<td colspan="3" align="left">
			&nbsp;</td>
		</tr>
		<tr>
			<td height="30" colspan="2" align="left" class="bodytext_normal" style="padding-left:26px;">
				Patient is successfully added in your network.
			</td>
			<td width="250">&nbsp;
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
						<td width="100"  align="center" valign="middle" class="button" style="height:22px;width:77px;" onclick="parent.getcontent('/ayushman/cpatientdirectory/view');" >My Network</td>
						<td width="13">&nbsp;</td>
						<td width="77" align="center" valign="middle" class="button"style="height:22px;width:77px;" onClick="connentnowclick(<?= trim($objUserForPatient->id);?>,'0')">Connect Now</td>
					</tr>
				</table>			  
			</td>
		</tr>
	</table>
	</form>
</div>
<div id="connectnow">
	<form id= "connectInclinicAdhoc" class="cmxform" autocomplete="off"  method="post" enctype="multipart/form-data" >
	<input type="hidden" id='ajax' name='ajax' value='true'/>
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
						<td width="77" align="center" valign="middle" class="button"style="height:22px;width:77px;" onclick="window.location='/ayushman/cpatientdirectory/view';">My Network</td>
					</tr>
				</table>			  
			</td>
		</tr>
	</table>
	</form>
</div>