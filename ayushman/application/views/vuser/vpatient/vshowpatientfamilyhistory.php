<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function()
	{
		if(<?= $showall; ?> == false)
		{
		 	document.getElementById('visitsid').style.visibility='hidden'; // hide  
		 	document.getElementById('reportsid').style.visibility='hidden'; // hide  
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
    <td style="padding-left:27px; padding-right:7px; padding-bottom:0px; padding-top:7px;">
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
				<td width="15%" align="center" valign="middle"  class="Rounded_buttonOrenge"><input type="button"  class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/displayfamilyhistory?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Family History" /></td>
				<td width="1%">&nbsp;</td>
				<td width="8%" id="visitsid" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayvisits?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Visits" /></td>
				<td width="1%">&nbsp;</td>
				<td width="13%" id="reportsid" align="center" valign="middle"  class="Rounded_buttonBlue"><input type="button"  class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/disaplayreports?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Reports" /></td>
			</tr>
      	</table>
	</td>
    </tr>
    	<tr>
      		<td class="Heading_Bg" style=" border-top:1px solid #0d6596;">
	  			&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Family History
	  		</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-bottom:7px; padding-top:7px;">
	  			<table width="670" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
        			<tr>
          				<td width="14%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:10px; border-bottom:2px solid #0d6596;">Relative</td>
          				<td width="14%" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:10px; border-bottom:2px solid #0d6596;"> Year of Birth </td>
          				<td width="44%" align="center" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold"style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Known Medical History</td>
          				<td width="28%" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;"> If not alive, age &amp; cause </td>
        			</tr>
        			<tr style='background-color:<?php if($array_relativeFather['medicalhistory'] != '') echo "rgb(255, 255, 165)"; ?>;'>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;">Father</td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;"><?= trim($array_relativeFather['birthyear']); ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:150px;"><?= $array_relativeFather['medicalhistory']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:50px;"><?= $array_relativeFather['deathage'];?>&nbsp;&nbsp;&nbsp;<?= $array_relativeFather['deathcause'];?></td>
					</tr>
					<tr style='background-color:<?php if($array_relativeMother['medicalhistory'] != '') echo "rgb(255, 255, 165)"; ?>;'>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;">Mother</td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;"><?= $array_relativeMother['birthyear']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:150px;"><?= $array_relativeMother['medicalhistory']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:50px;"><?= $array_relativeMother['deathage'];?>&nbsp;&nbsp;&nbsp;<?= $array_relativeMother['deathcause'];?></td>
					</tr>
					<?php $i=1;foreach($array_relative as $relative) {?>
					<tr style='background-color:<?php if($relative['medicalhistory'] != '') echo "rgb(255, 255, 165)"; ?>;'>
						<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;"><?= $relative['relation']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:10px;"><?= $relative['birthyear']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:150px;"><?= $relative['medicalhistory']; ?></td>
					  	<td height="25" align="left" valign="middle"  class="bodytext_normal" style="padding-left:15px;word-wrap: break-word;word-break:break-all;max-width:50px;"><?= $relative['deathage'];?>&nbsp;&nbsp;&nbsp;<?= $relative['deathcause'];?></td>	
					</tr>	
					<?php } ?>	
      			</table>
	  		</td>
    	</tr>
  	</table>
</div>
