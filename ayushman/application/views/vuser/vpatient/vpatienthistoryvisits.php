<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function()
	{
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
	
	function modeformatter(cellvalue, options, rowObject )
	{
		var status= $(rowObject).children()[11].firstChild.data;
		if(status.toLowerCase() == 'notfromsystem')
			return 'Archive';
		else
			return 'Video';
	}
	
	function visitsummaryformatter(cellvalue, options, rowObject )
	{
		var status = $(rowObject).children()[11].firstChild.data;var value=1;
		if(status.toLowerCase() == 'notfromsystem' )
		{
			value=0;
				if($(rowObject).children()[12].firstChild != null)
				{
					if($(rowObject).children()[12].firstChild.data == "Informationnotyetfilled")
				 	{
				 		return "Not yet filled";
				 	}
				 	else
				 	{
						return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');"><font color="#220CE6">Prescription</font></a>';
					}
				}
				else{
					return "Not yet filled";
				}
		}
		else
		{
			value=1;
			return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');" ><font color="#220CE6">Visit summary</font></a>';
		}
	}
	
	function visitreportformatter(cellvalue, options, rowObject )
	{
		var status = $(rowObject).children()[11].firstChild.data;var value=1;
		if(status.toLowerCase() == 'notfromsystem' )
		{
			value=0;
			if($(rowObject).children()[13].firstChild.data == "Informationnotyetfilled")
			{
				return "Not yet filled"
			}
			else
			{
				return '<a href="#" onclick="openvisitreport('+cellvalue+','+value+');" ><font color="#220CE6">Visit Report</font></a>';
			}
		 }
		else
		{
			value=1;
			return '<a href="#" onclick="openvisitreport('+cellvalue+','+value+');" ><font color="#220CE6">Visit Report</font></a>';
		}	
	}
	
	function openvisitsummary(appointmentid,status)
	{
		if(status== '0' )
		{
			window.open("/ayushman/cdisplayprescriptions/view?appid="+appointmentid,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
		}
		else
		{
			$("body").css("cursor", "progress");
			$.ajax({  
				url: "/ayushman/cemr/getvisitsummarypdf?appid="+appointmentid,
				success: function(data) { 	
					if(data == '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
						window.open("/ayushman/"+data,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
					$("body").css("cursor", "default");
				}
			});  
		}
	}
	
	function openvisitreport(appointmentid,status)
	{
		if(status== '0' )
		{
			window.location="/ayushman/cuploadpastvisit/showreport?appid="+appointmentid+"&back=cpatientemrtodoc&patientuserid="+<?= $objUserForPatient->id; ?>
		}
		else
		{
			window.location= "/ayushman/cpastreportbysystem/showreport?appid="+appointmentid+"&back=cpatientemrtodoc&patientuserid="+<?= $objUserForPatient->id; ?>
		}
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
						<td width="8%" id="visitsid" align="center" valign="middle"  class="Rounded_buttonOrenge"><input type="button"  class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayvisits?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Visits" /></td>
						<td width="1%">&nbsp;</td>
						<td width="13%" id="reportsid" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayreports?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Reports" /></td>
					</tr>
      			</table>
      		</td>
    	</tr>
    	<tr>
      		<td class="Heading_Bg" style=" border-top:1px solid #0d6596;"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Past Visits</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-top:7px; padding-bottom:7px;">
	  			<?php		
					//this is emr grid for patient we can put this in other page
					$userid =  $objPatient->repatientsuserid_c;
					$whereclause="[Appointmentstatus,=,completed][userid,=,".$userid."]";
					$patjqgridrequest= Request::factory('xjqgridcomponent/index');
					$patjqgridrequest->post('name','patappts');
					$patjqgridrequest->post('height','240');
					$patjqgridrequest->post('width','815');
					$patjqgridrequest->post('sortname','dateandtime_dateformate');
					$patjqgridrequest->post('sortorder','desc');
					$patjqgridrequest->post('tablename','patientappointments');//used for jqgrid
					$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
					$patjqgridrequest->post('columnnames', 'id,userid,refappwithid_c,dateandtime_dateformate,DateAndTime,docnm,incidentsname_c,appointmnetplace,[Video{'.urlencode("#").'}],id,id,status,archiveprescriptionpath,reportpath');//used for jqgrid
					$columninfo = '[{"name":"id","index":"id","hidden":true},{"name":"userid","index":"userid","width":100,"hidden":true},{"name":"refappwithid_c","index":"refappwithid_c","width":100,"hidden":true},{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","width":0,"align":"left","hidden":true},{"name":"Date & Time","index":"DateAndTime","width":130,"align":"left","sortable":false},
									{"name":"Doctor","index":"docnm","width":150,"sortorder":true,"sortorder":"dateandtime_dateformate"},
									{"name":"Incident Name","index":"incidentsname_c","width":120,"editable":true},
									{"name":"Place","index":"appointmnetplace","width":50,"align":"left"},
									{"name":"Mode","index":"Home","width":50,"align":"left","formatter":modeformatter},
									{"name":"Prescription","index":"id","width":80,"align":"left","formatter":visitsummaryformatter},
									{"name":"Report","index":"id","width":80,"align":"left","formatter":visitreportformatter},
									{"name":"status","index":"status","hidden":true},
									{"name":"archiveprescriptionpath","index":"archiveprescriptionpath","hidden":true},
									{"name":"reportpath","index":"reportpath","hidden":true}
									]';			
					$patjqgridrequest->post('columninfo', $columninfo);
					//if save,edit,delete we dont want in jqgrid set it to false
					$patjqgridrequest->post('editbtnenable','false');
					$patjqgridrequest->post('deletebtnenable','false');
					$patjqgridrequest->post('savebtnenable','false');
					echo $patjqgridrequest->execute(); 
				?>
      		</td>
    	</tr>
  	</table>
</div>
