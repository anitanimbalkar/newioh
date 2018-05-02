<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script>
	$(document).ready(function(){

		$('#showdetailedreport').dialog({
			autoOpen: false,
			title: "Detailed Test Report" ,
			show: "fade",
			hide: "fade",
			width: "730px",
			modal: true,
			height: "350",
			resize: "auto",
			resizable: false
		});
		jQuery("#showdetailedreport").dialog('option', 'position', ['center',50]);
		if(<?= $showall; ?> == false)
		{
			document.getElementById('visitsid').style.visibility='hidden'; // hide  
			document.getElementById('reportsid').style.visibility='hidden'; 
			document.getElementById('closebutton').style.visibility='hidden'; 
		}
		else
		{
			document.getElementById("body_contantpatientpage").style.width = 928;
		}
	});
	
	function testsformatter( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i<arr.length;i++)
		{
			string = string + i+') '+arr[i]+"<br />";
		}
		return string;
	}
	
	function statusformatter( cellvalue, options, rowObject )
	{
		if(cellvalue == 'reportsuploaded')
			return "Uploaded";
		if(cellvalue == 'reportscollected')
			return "Collected";
		if(cellvalue == 'accepted')
			return "Order in process";
		if(cellvalue == 'rejected')
			return "Order rejected";
	}
	
	function setlink( cellvalue, options, rowObject )
	{
		if(cellvalue == "suggested" )
			return '<a href="#" onclick="opentests('+$(rowObject).children()[2].firstChild.data+','+$(rowObject).children()[8].firstChild.data+');" ><font color="#220CE6">Assign diagnostic lab</font></a>';
		else
			if(cellvalue == "reportsuploaded" ||cellvalue == "reportscollected" )
				 return '<div align="center" style="width:100%"><a href="#" onclick="viewDetailReport('+$(rowObject).children()[2].firstChild.data+');"><font color="#0000FF">Details</font></a></div>';
			else
				if(cellvalue == "requested" ||cellvalue == "rejected")
				{
					 return '<a href="#" onclick="opentests('+$(rowObject).children()[2].firstChild.data+','+$(rowObject).children()[8].firstChild.data+');" ><font color="#220CE6">Reassign diagnostic lab</font></a>';
				}else
					if(cellvalue == "accepted" || cellvalue == "workinprogress" )
					return $(rowObject).children()[6].firstChild.data;
	}
	
	function viewDetailReport(orderid)
	{
		var newFrame = document.createElement("iframe");
		newFrame.setAttribute("id","iframedetailreport");
		newFrame.setAttribute("src", window.location.protocol +"//"+ window.location.host +'/ayushman/cpathologist/pathologistdetailreport?id='+orderid );	
		newFrame.style.width = 680+"px"; 
		newFrame.style.height = 255+"px"; 
		newFrame.frameBorder = "0";
		newFrame.scrolling ="no";
		newFrame.setAttribute("frameBorder", "0");
		$("#detailedreport").empty();
		var target = document.getElementById("detailedreport");
		target.appendChild(newFrame);		
		$("#showdetailedreport").dialog("open");	
	}
	
	function opentests(cellvalue,appointmentid)
	{
		document.getElementById('orderid').value = cellvalue;
		document.getElementById('appointmentid').value = appointmentid;
		$('#popup').dialog('open');
		assignpathologist();
	}
	
	function openreports(orderid)
	{
		document.getElementById('orderid').value = orderid;
		$.ajax({
				  url: "/ayushman/cpathologist/getpathologistorderinfo?orderid="+orderid,
				  success: function( data ) {
						if(data == '')
							alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
						else
							window.open("/"+data);
					},
					error : function(){}
			  });
	}
</script>	
<div id="body_contantpatientpage" style="width:828px;height:560px;align:left;">
  	<table border="0" align="center" cellpadding="0" cellspacing="0"  style="width:100%;">
    	<tr>
      		<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;History</td>
    	</tr>
    	<tr>
      		<td style="padding-left:7px; padding-right:7px; padding-bottom:10px; padding-top:10px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
          			<tr>
            			<td width="3%" align="left" valign="middle">&nbsp;</td>
            			<td width="16%" align="left" valign="middle"><img src="<?php echo $objUserForPatient->photo_c;?>" width="102" height="122"/></td>
            			<td colspan="3" align="left" valign="middle" class="bodytext_bold">
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
									<td height="21" align="left" valign="middle" class="bodytext_bold">Date of Birth</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal"><?= date('d M Y',strtotime($objUserForPatient->DOB_c)) ;  ?></td>
								</tr>
								<tr>
									<td height="21" align="left" valign="middle" class="bodytext_bold">Blood Group</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal"><?= trim($objUserForPatient->bloodgroup_c);  ?></td>
								</tr>
								<tr>
									<td height="21" align="left" valign="middle" class="bodytext_bold">Marital Status</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
									<td height="21" align="left" valign="middle" class="bodytext_normal"><?= trim($objUserForPatient->maritalstatus_c);?></td>
								</tr>
            				</table>
            			</td>
            			<td valign="top" align="right" padding-top="5px;"  ><input type="button" id="closebutton" class="button" onclick="window.close();" value="Close" > </td>
          			</tr>
      			</table>
      		</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px;">
      			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        			<tr>
						<td width="12%" align="center" valign="middle" class="Rounded_buttonBlue"><input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displaydemographic?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Demographic" /></td>
						<td width="1%">&nbsp;</td>
						<td width="19%" height="30" align="center" valign="middle" class="Rounded_buttonBlue"><input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displayallergyandsocialhabits?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" /></td>
						<td width="1%">&nbsp;</td>
						<td width="15%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue"><input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displayimmunization?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Immunization" /></td>
						<td width="1%">&nbsp;</td>
						<td width="15%" align="center" valign="middle" class="Rounded_buttonBlue"><input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displaypersonalhistory?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
						<td width="1%">&nbsp;</td>
						<td width="15%" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displayfamilyhistory?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Family History" /></td>
						<td width="1%">&nbsp;</td>
						<td width="8%" id="visitsid" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayvisits?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Visits" /></td>
						<td width="1%">&nbsp;</td>
						<td width="13%" id="reportsid" align="center" valign="middle"  class="Rounded_buttonOrenge"><input type="button"  class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayreports?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Reports" /></td>
					</tr>
      			</table>
      		</td>
    	</tr>
    	<tr>
      		<td class="Heading_Bg" style=" border-top:1px solid #0d6596;"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Reports</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-top:7px; padding-bottom:7px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        			<tr>
          				<td>
          					<?php
							//this is emr grid for patient we can put this in other page
							$tests= Request::factory('xjqgridcomponent/index');
							$data ='[puserid:'.$objPatient->repatientsuserid_c.'][status:"reportsuploaded","reportscollected"]';
							$tests->post('usetemplate','true');
							$tests->post('data',$data);
							$tests->post('tablename','diagnosticorders');
							$tests->post('name','tests');
							$tests->post('height','220');
							$tests->post('width','790');
							$tests->post('sortname','date');
							$tests->post('sortorder','asc');
							//used for jqgrid
							$tests->post('columnnames', 'doctorname,pathologistname,requisitionno,tests,status,status,deliverydate,patientid,appid');//used for jqgrid
							$tests->post('whereclause',"[patientsuserid,=,". $objPatient->repatientsuserid_c."]");//used for jqgrid
							$columninfo = 	'[
												{"name":"Suggested By","index":"doctorname","width":80,"editable":false},
												{"name":"Diagnostic Center","index":"pathologistname","hidden":false,"width":80},
												{"name":"Ord.No.","index":"requisitionno","hidden":true,"width":30},
												{"name":"Tests","index":"tests","width":200,"formatter":testsformatter},
												{"name":"Status","index":"status","width":40,"formatter":statusformatter},
												{"name":"","index":"status","width":40,"formatter":setlink},
												{"name":"deliverydate","index":"deliverydate","width":100,"hidden":true},
												{"name":"patientid","index":"patientid","width":100,"hidden":true},
												{"name":"appid","index":"appid","width":50,"hidden":true}
											]';
							$tests->post('columninfo', $columninfo);
							$tests->post('editbtnenable','false');
							$tests->post('deletebtnenable','false');
							$tests->post('savebtnenable','false');
							echo $tests->execute(); ?>
							<input type="hidden" id="orderid"/>
							<input type="hidden" id="selectedpathologists"/>
							<input type="hidden" id="appointmentid"/>
          				</td>
					</tr>
      			</table>
      		</td>
    	</tr>
  	</table>
</div>
<div id="showdetailedreport" style="width:690px;overflow-y:auto;height:350px; "  >
 	<table>
		<tr>
		<td>&nbsp; </td>
		<td>
			<div id="detailedreport" ></div>
			
		</td>
		
		</tr>
	</table>
 </div>
