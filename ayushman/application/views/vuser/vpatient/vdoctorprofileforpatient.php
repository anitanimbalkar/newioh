<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>

<div id="body_contantpatientpage" style="width:837px;height:auto;vertical-align: top;margin-top:0px;" > 
    
	<table cellpadding="0" cellspacing="0" style="width:100%;">
    	<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px">Doctor Profile</td></tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px; padding-top:10px">Name:</td>
			<td class="bodytext_normal" style="padding-left:10px; padding-top:10px"> <?php echo $obj_doctorprofile->doctorname; ?></td>
			<td rowspan="7" align="right" style="padding-right:30px; padding-top:10px"><image src="<?php echo $obj_doctorprofile->photo_c;   ?>" style="border:1px solid #000000; height:130px; width:120px"/></td>
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Gender:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $obj_doctorprofile->gender_c; ?></td> 		
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Qualification:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctoreducation; ?></td> 							
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Domain:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctordomain;?></td> 
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Specialization:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctorspecialization;?> </td> 								
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Experience (In years):</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">
				<?php echo $obj_doctorprofile->experience?>
			</td>
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Known Languages</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">
				<?php if($docotrlanguage)
					echo $docotrlanguage; 
				else  echo "No information has been provided";
				?>
			</td>
		</tr>
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px">About Me</td></tr>
		
		<tr><td colspan="3" class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $obj_doctorprofile->profile_c; ?></td></tr>
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px;">Clinic Addresses</td></tr>
		
		<tr>
			<td colspan="3" class="bodytext_normal" style="padding-left:10px;padding-top:10px;word-wrap;">
				<?php
				$i= 1;
				foreach($obj_clinicprofiles as $obj_clinicprofile)
				{
					if($obj_clinicprofile->clinicname_c == "Online") continue;
					
					echo "<table><tr><td style='width:200px;vertical-align:top;'><div class='bodytext_bold'>".$obj_clinicprofile->clinicname_c."</div></td> ";
					echo "<td class='bodytext_normal'>";
					if($obj_clinicprofile->line1_c)
					echo $obj_clinicprofile->line1_c;
					if($obj_clinicprofile->nearlandmark_c)echo", ";
						echo $obj_clinicprofile->nearlandmark_c;
					if($obj_clinicprofile->location_c)echo", ";
						echo $obj_clinicprofile->location_c;
					if($obj_clinicprofile->city_c)echo", <br/>";
						echo $obj_clinicprofile->city_c;
					if($obj_clinicprofile->state_c)echo", <br/>";
						echo $obj_clinicprofile->state_c;
					if($obj_clinicprofile->country_c)echo", <br/>";
						echo $obj_clinicprofile->country_c;
					if($obj_clinicprofile->pin_c)echo", ";
						echo $obj_clinicprofile->pin_c;
					if(($obj_clinicprofile->line1_c)or($obj_clinicprofile->nearlandmark_c) or ($obj_clinicprofile->location_c) or ($obj_clinicprofile->city_c) or ($obj_clinicprofile->state_c)or ($obj_clinicprofile->country_c)or($obj_clinicprofile->pin_c))echo"."; else  echo "No information has been provided";
					
				
					echo "<br/>Ph. $obj_clinicprofile->phone";
					echo "</td></tr></table>";
				echo "<hr/>";
				$i++;
				}
				?>
			</td>
		</tr>
		
		<!--<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Phone:</td>
			<td colspan="2" class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php  echo $obj_doctorprofile->phone;?></td>
		</tr>-->
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr align="left">
			<td align="left" style="padding-left:10px;padding-top:10px"> <input align="left" type="button" onclick="parent.getcontent('/ayushman/cdoctordirectory/view');" class="button" height="22" style="width: 150px; height: 25px; " value="Back"/></td>
		</tr>
		
    </table>

</div>