<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function()
	{
		if(<?= $showall; ?> == false)
		{
		 	document.getElementById('visitsid').style.visibility='hidden';   
		 	document.getElementById('reportsid').style.visibility='hidden'; 
		 	document.getElementById('closebutton').style.visibility='hidden'; 
		}
		else
		{
			document.getElementById("body_contantpatientpage").style.width = 928;
		}
	});
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
						<td width="12%" align="center" valign="middle" class="Rounded_buttonOrenge"><input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/displaydemographic?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Demographic" /></td>
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
						<td width="13%" id="reportsid" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayreports?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Reports" /></td>
					</tr>
      			</table>
      		</td>
    	</tr>
    	<tr>
      		<td class="Heading_Bg" style=" border-top:1px solid #0d6596;"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Home Contact Details</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-top:7px; padding-bottom:7px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        			<tr>
          				<td width="13%" height="21" align="left" valign="top" class="bodytext_bold">Home Phone</td>
					  	<td width="2%" height="21" align="left" valign="top" class="bodytext_normal">:</td>
					  	<td width="37%" height="21" align="left" valign="top" class="bodytext_normal"><?php echo $objUserForPatient->phonenohome_c;  ?></td>
					  	<td width="11%" align="left" valign="top" class="bodytext_bold">Home Mobile </td>
					  	<td width="2%" align="left" valign="top" class="bodytext_normal">:</td>
					  	<td width="31%" align="left" valign="top" class="bodytext_normal"><?php echo $objUserForPatient->mobileno1_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="top" class="bodytext_bold">Address Line 1</td>
					  	<td height="21" align="left" valign="top" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="top" style="word-wrap: break-word;word-break:break-all;" class="bodytext_normal"><?php echo $objaddhome->line1_c;  ?></td>
					  	<td align="left" valign="top" class="bodytext_bold">Landmark</td>
					  	<td align="left" valign="top" class="bodytext_normal">:</td>
					  	<td align="left" valign="top" class="bodytext_normal"><?php echo $objaddhome->nearlandmark_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">Locality</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddhome->location_c;  ?></td>
					  	<td align="left" valign="middle" class="bodytext_bold">City</td>
					  	<td align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td align="left" valign="middle" class="bodytext_normal"><?php echo $objaddhome->city_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">State</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddhome->state_c;  ?></td>
					  	<td align="left" valign="middle" class="bodytext_bold">Country</td>
					  	<td align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td align="left" valign="middle" class="bodytext_normal"><?php echo $objaddhome->country_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">Pincode</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" colspan="4" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddhome->pin_c;  ?></td>
					</tr>
      			</table>
      		</td>
    	</tr>
		<tr>
		  	<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Office Contact Details</td>
		</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-top:7px; padding-bottom:7px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        			<tr>
					  	<td width="13%" height="21" align="left" valign="middle" class="bodytext_bold">Office Phone</td>
					  	<td width="2%" height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td width="37%" height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objUserForPatient->phonenowork_c;  ?></td>
					  	<td width="11%" align="left" valign="middle" class="bodytext_bold">Office Mobile </td>
					  	<td width="2%" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td width="31%" align="left" valign="middle" class="bodytext_normal"><?php echo $objUserForPatient->mobilenowork_c?>	</td>
					</tr>
					<tr>
					 	<td height="21" align="left" valign="middle" class="bodytext_bold">Address Line 1</td>
					 	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->line1_c;  ?></td>
					  	<td align="left" valign="middle" class="bodytext_bold">Landmark</td>
					  	<td align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->nearlandmark_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">Locality</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->location_c;  ?></td>
					  	<td align="left" valign="middle" class="bodytext_bold">City</td>
					  	<td align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->city_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">State</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->state_c;  ?></td>
					  	<td align="left" valign="middle" class="bodytext_bold">Country</td>
					  	<td align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->country_c;  ?></td>
					</tr>
					<tr>
					  	<td height="21" align="left" valign="middle" class="bodytext_bold">Pincode</td>
					  	<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
					  	<td height="21" colspan="4" align="left" valign="middle" class="bodytext_normal"><?php echo $objaddwork->pin_c;  ?></td>
					</tr>
      			</table>
      		</td>
    	</tr>
  	</table>
</div>
