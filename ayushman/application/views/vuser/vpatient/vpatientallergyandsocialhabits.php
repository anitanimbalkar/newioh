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
</script>	
<div id="body_contantpatientpage" style="width:828px;height:600px;align:left;">
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
		  	<td style="padding-left:27px;">
		  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="12%" align="center" valign="middle" class="Rounded_buttonBlue"><input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatienthistorydisplay/displaydemographic?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Demographic" /></td>
						<td width="1%">&nbsp;</td>
						<td width="19%" height="30" align="center" valign="middle" class="Rounded_buttonOrenge"><input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/displayallergyandsocialhabits?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" /></td>
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
      		<td class="Heading_Bg" style=" border-top:1px solid #0d6596;">
	  			&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Allergies
	  		</td>
    	</tr>
		<tr>
      		<td style="padding-top:7px; padding-bottom:7px; padding-left:27px;">
	  			<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php 
						$value = '';
						$k = 0;
						foreach($food as $key=> $val)
						{
							if($k == 0)
								$value = ucwords($val);
							else
								$value = $value.', '.ucwords($val);
								$k++;
						}
				
					?>
        			<tr style="background-color:<?php if($value != ''){echo 'rgb(255, 255, 165)';}else{echo 'transparent';} ?>;">
          				<td width="13%" height="21" align="left" valign="middle" class="bodytext_bold">Food Allergies</td>
          				<td width="2%" height="21" align="left" valign="middle" class="bodytext_normal">:</td>
          				<td height="21" align="left" valign="middle" class="bodytext_normal">
								<?php echo $value;?>
          				</td>
       			 	</tr>
					<?php 
						$value1 = '';
						$i = 0;
						foreach($drug as $key=> $val1)
						{
							if($i == 0)
								$value1 = ucwords($val1);
							else
								$value1 = $value1.', '.ucwords($val1);
							$i++;
						}
					?>
        			<tr style="background-color:<?php if($value1 != ''){echo 'rgb(255, 255, 165)';}else{echo 'transparent';} ?>;">
						<td height="21" align="left" valign="middle" class="bodytext_bold">Drug Allergies</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">
							<?php echo $value1;?>
						</td>
					</tr>
					<?php 
						$value2 = '';
						$j = 0;
						foreach($plant as $key=> $val2)
						{
							if($j == 0)
								$value2 = ucwords($val2);
							else
								$value2 = $value2.', '.ucwords($val2);
							$j++;
						}
					?>
					<tr style="background-color:<?php if($value2 != ''){echo 'rgb(255, 255, 165)';}else{echo 'transparent';} ?>;">
						<td height="21" align="left" valign="middle" class="bodytext_bold">Plant Allergies</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">
							<?php echo $value2;?>
						</td>
					</tr>
					<?php 
						$value3 = '';
						$l = 0;
						foreach($animal as $key=> $val3)
						{
							if($l == 0)
								$value3 = ucwords($val3);
							else
								$value3 = $value3.', '.ucwords($val3);
							$l++;
						}
					?>
					<tr style="background-color:<?php if($value3 != ''){echo 'rgb(255, 255, 165)';}else{echo 'transparent';} ?>;">
						<td height="21" align="left" valign="middle" class="bodytext_bold">Animal Allergies</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">:</td>
						<td height="21" align="left" valign="middle" class="bodytext_normal">
							<?php echo $value3;?>
						</td>
					</tr>
				</table>
	  		</td>
    	</tr>
		<tr>
		  	<td class="Heading_Bg" style=" border-top:1px solid #0d6596;">
				&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Food and Social Habits
		  	</td>
		</tr>
		<tr>
			<td style="padding-right:7px; padding-bottom:7px; padding-top:7px; padding-left:27px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="13%" height="21" style="background-color:<?php if($objPatient->diet_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" align="left" valign="middle" class="bodytext_bold">Diet</td>
						<td width="2%" height="21" style="background-color:<?php if($objPatient->diet_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" align="left" valign="middle" class="bodytext_normal">:</td>
						<td width="35%" height="21" style="background-color:<?php if($objPatient->diet_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" align="left" valign="middle" class="bodytext_normal"><?php if($objPatient->diet_c !=  "") echo $objPatient->diet_c ;   ?></td>
						<td width="13%" align="left" style="background-color:<?php if($objPatient->tobacco_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_bold">Tobacco</td>
						<td width="2%" align="left" style="background-color:<?php if($objPatient->tobacco_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal">:</td>
						<td width="31%" align="left" style="background-color:<?php if($objPatient->tobacco_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal"><?php  if($objPatient->tobacco_c != "")echo $objPatient->tobacco_c ; ?></td>
					</tr>
					<tr>
						<td height="21" align="left" style="background-color:<?php if($objPatient->smoking_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_bold">Smoking</td>
						<td height="21" align="left" style="background-color:<?php if($objPatient->smoking_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal">:</td>
						<td height="21" align="left" style="background-color:<?php if($objPatient->smoking_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal"><?php if($objPatient->smoking_c != "")echo $objPatient->smoking_c ;  ?></td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->exercisepatterns_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_bold">Exercise </td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->exercisepatterns_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_normal">:</td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->exercisepatterns_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_normal"><?php if($objPatient->exercisepatterns_c != "")echo $objPatient->exercisepatterns_c ; ?></td>
					</tr>
					<tr>
						<td height="21" align="left" style="background-color:<?php if($objPatient->alcohol_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_bold">Alcohol </td>
						<td height="21" align="left" style="background-color:<?php if($objPatient->alcohol_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal">:</td>
						<td height="21" align="left" style="background-color:<?php if($objPatient->alcohol_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" valign="middle" class="bodytext_normal"><?php if($objPatient->alcohol_c != "")echo $objPatient->alcohol_c ;  ?></td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->outdoorsport_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_bold">Outdoor sports</td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->outdoorsport_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_normal">:</td>
						<td align="left" valign="middle" style="background-color:<?php if($objPatient->outdoorsport_c !=  "") echo 'rgb(255, 255, 165)' ; ?>;" class="bodytext_normal"><?php if($objPatient->outdoorsport_c!= "")echo $objPatient->outdoorsport_c ; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		</tr>
  	</table>
</div>