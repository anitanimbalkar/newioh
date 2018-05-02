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
<div id="body_contantpatientpage" style="width:828px;height:auto;align:left;">
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
						<td width="15%" align="center" valign="middle" class="Rounded_buttonOrenge"><input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatienthistorydisplay/displaypersonalhistory?showall=<?= $showall; ?>&patientid=<?= $objUserForPatient->id; ?>'" style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
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
	  			&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Personal History
	  		</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-bottom:7px; padding-top:7px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php $i=0; foreach($array_disease as $ds) {?>
					<tr>
						<td style="background-color:<?php if(($array_status[$i] == 1)||($array_status[$i] == 2))  echo 'rgb(255, 255, 165)' ; ?>;" width="13%" height="21" align="left" valign="middle" class="bodytext_bold"><?php echo $ds;?></td>
						<td style="background-color:<?php if(($array_status[$i] == 1)||($array_status[$i] == 2))  echo 'rgb(255, 255, 165)' ; ?>;" width="2%" height="21" align="left" valign="middle" class="bodytext_normal">:</td>
						<td style="background-color:<?php if(($array_status[$i] == 1)||($array_status[$i] == 2))  echo 'rgb(255, 255, 165)' ; ?>;" width="12%" height="21" align="left" valign="middle" class="bodytext_normal">
						<?php 
							if(count($array_status) > 0){
								switch($array_status[$i])
								{
									case 0 : echo "Don't know";break;
									case 1 : echo "No";break;
									case 2: 	echo "Yes" ;break;
									default: throw new Exception ("Role not found");
												break;
								}
							}else{
								echo 'No Information Provided';
							}
						?>	
						</td>	
						<td style="background-color:<?php if(($array_status[$i] == 1)||($array_status[$i] == 2))  echo 'rgb(255, 255, 165)' ; ?>;" width="50%" height="21" align="left" valign="middle" class="bodytext_normal"><?php echo $array_remark[$i]?></td>					 
					</tr>
						<?php $i++;}?>
					
				</table>
	  		</td>
    	</tr>
    	<tr>
      		<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Mojor Illness &amp; Treament History</td>
   		</tr>
		<tr>
			<td style="padding-left:27px; padding-right:7px; padding-bottom:7px; padding-top:7px;">
				<table width="670" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
					<tr>
						<td width="25%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:10px; border-bottom:2px solid #0d6596;">Major Illness </td>
						<td width="40%" align="center" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Period Of Treatment</td>
						<td width="35%" bgcolor="#FFFFFF" class="bodytext_bold"	style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Description</td>
					</tr>
					<?php $str=""; for($j=0;$j<sizeof($array_pastillness);$j++) 
					{
						$str = $str. "<tr style='background-color:rgb(255, 255, 165);'><td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastillness[$j][0]."</td>"."<td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastillness[$j][1]."</td>"."<td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastillness[$j][2]."</td></tr>";
					}
					echo $str;
					?>
				</table>
			</td>
		</tr>
    	<tr>
      		<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Operation / Surgical Procedures</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-bottom:7px; padding-top:7px;">
	  			<table width="670" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596"style="border-width:1px; border-style: solid; border-collapse: collapse;">
        			<tr>
          				<td width="25%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold"style="text-align:left; padding-left:10px; border-bottom:2px solid #0d6596;">Name of Surgery</td>
          				<td width="40%" align="center" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Date of Surgery</td>
          				<td width="35%" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Reason and Description</td>
        			</tr>
        			<?php $str=""; for($j=0;$j<sizeof($array_pastsurgery);$j++) 
					{
						$str = $str."<tr style='background-color:rgb(255, 255, 165);'><td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastsurgery[$j][0]."</td>"."<td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastsurgery[$j][1]."</td>"."<td height='25' align='left' valign='middle' class='bodytext_normal' style='padding-left:10px;'>". $array_pastsurgery[$j][2]."</td></tr>";
					}
					echo $str;
					?>
      			</table>
      		</td>
    	</tr>
    	<tr>
      		<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Other Medical Observations</td>
    	</tr>
    	<tr>
      		<td style="padding-left:27px; padding-right:7px; padding-bottom:7px; padding-top:7px;">
	  			<table width="670" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
        			<tr>
          				<td width="53%" height="30" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:10px; border-bottom:2px solid #0d6596;">Question </td>
          				<td width="47%" align="center" valign="middle" bgcolor="#FFFFFF" class="bodytext_bold" style="text-align:left; padding-left:15px; border-bottom:2px solid #0d6596;">Answer</td>
          			</tr>
					<?php $i=1;foreach($array_question as $question) {?>
					<tr style='background-color:<?php if($array_answer[$i] != '') echo "rgb(255, 255, 165)"; ?>;'>
						<td height="25"  align="left" valign="middle" class="bodytext_normal" style="padding-left:10px;"><?php echo $question;?></td>
						<td  height="25" align="left" valign="middle"  style="word-wrap: break-word;word-break:break-all;" class="bodytext_normal" style="padding:15px;">
							<span style="max-width:50px;padding-left:15px;"><?php echo $array_answer[$i]; $i++?></span>
						</td>
					</tr>
					<?php } ?>
      			</table>
	  		</td>
    	</tr>
  	</table>
</div>
