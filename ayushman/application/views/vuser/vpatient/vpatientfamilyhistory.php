<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/jquery.metadata.js" type="text/javascript"></script>
<script src="/ayushman/assets/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	for (i = new Date().getFullYear(); i > 1819; i--)
	{
		$('.yearpicker').append($('<option />').val(i).html(i));
	}
	//for father birth year drop down list
	dropdown = document.getElementById("id<?=$array_relativeFather['id']; ?>birthyear");
	itemToSelect = "<?= trim($array_relativeFather['birthyear']); ?>";
	for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
	{
		if (dropdown.options[iLoop].value == itemToSelect)
		{
			dropdown.options[iLoop].selected = true;
			break;
		}
	}  
	//for mother birth year drop down list 	
	dropdown = document.getElementById("id<?=$array_relativeMother['id']; ?>birthyear");
	itemToSelect = "<?= $array_relativeMother['birthyear']; ?>";
	for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
	{
		if (dropdown.options[iLoop].value == itemToSelect)
		{
			dropdown.options[iLoop].selected = true;
			break;
		}
	}
	//for relative birth year drop down list 	
	var array_relative =new Array;
    var array_relative= <?php echo json_encode($array_relative ); ?>;
    var i;
    var length=array_relative.length;
	for(i=0; i< length;i++ )
	{ 
		dropdown = document.getElementById("id"+array_relative[i].id+"birthyear");
		itemToSelect = array_relative[i].birthyear;
		for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		{
			if (dropdown.options[iLoop].value == itemToSelect)
			{
				dropdown.options[iLoop].selected = true;
				break;
			}
		}
	}
});
function savedetails(notification)
{	
	var array_fatherdetails = new Array;
	var array_motherdetails = new Array;
	var array_relativesdetails = new Array;
	array_fatherdetails = createInfoArray(<?=$array_relativeFather['id']; ?>);
	array_motherdetails = createInfoArray(<?=$array_relativeMother['id']; ?>);
	var array_relative= <?php echo json_encode($array_relative ); ?>;
    var count;
    var length=array_relative.length;
	for(count=0; count< length;count++ )
	{ 
		var array_relativedetails = new Array;
		array_relativedetails	= createInfoArray(array_relative[count].id);
		array_relativesdetails[count] = array_relativedetails; 
	}
	$('#fatherdetails').val(JSON.stringify(array_fatherdetails));
	$('#motherdetails').val(JSON.stringify(array_motherdetails));
	$('#relativesdetails').val(JSON.stringify(array_relativesdetails));
	if(notification== true)
	{
	$.ajax({
		url: '/ayushman/cpatientfamilyhistory/savedetails?array_fatherdetails='+document.getElementById('fatherdetails').value+'&array_motherdetails='+document.getElementById('motherdetails').value+'&array_relativesdetails='+document.getElementById('relativesdetails').value,
		type:'POST',
		success:  function(data) {
			//if(notification== true)
				//{
				showNotification('300','20','Save data','Family history saved successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );
				//}
			//else
				//{showNotification('300','20','Save data','New relative added successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
		},
		error : function(){alert("error while editing family member details ");}		
	});
	}
	//else
	//{showNotification('300','20','Save data','New relative added successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
}

function createInfoArray(id)
{
	var array_relativedetails = new Array;
	array_relativedetails['0'] = id;
	array_relativedetails['1'] = document.getElementById("id"+id+"birthyear").value;
	array_relativedetails['2']=  document.getElementById("medicalhistorytxt"+id).value;
	array_relativedetails['3'] = document.getElementById("id"+id+"deathagetxt").value;
	array_relativedetails['4'] = document.getElementById("id"+id+"deathcausetxt").value;
	return array_relativedetails;
} 
function deleterow(id)
{
	document.getElementById("deleterelativebutton").onclick = false;
	$.ajax({
		url: '/ayushman/cpatientfamilyhistory/deletedetails?id='+id,
		type:'POST',
		success:  function(data) {
			location.reload();
		},
		error : function(){alert("error while editing family member details ");}		
	});
}
function highlight(radio,flag){
    tr = $(radio).closest('tr');
	if(flag){
		$(tr).css('background-color','#FFFFA5');
	}else{
		$(tr).css('background-color','transparent');
	}
}
function addnewrelative()
{
	document.getElementById("addnewrelativebutton").onclick = false;
	savedetails(false);
	$.ajax({
		url: '/ayushman/cpatientfamilyhistory/addnewrelative?relative='+document.getElementById("newrelative").value+'&birthyear='+document.getElementById("newrelativebirthyear").value+'&medicalhistory='+document.getElementById("newrelativemedicalhistory").value+'&deathage='+document.getElementById("newrelativedeathage").value+'&deathcause='+document.getElementById("newrelativedeathcause").value+'&patientId=<?php echo $objpatient->id ?>',
		success:  function(data) {
			location.reload();
		},
		error : function(){alert("error while editing family member details ");}		
	});
}
</script>
	<div id="wrapper" width="828px" height="auto" style="padding:0px;margin:0px;">
		<table width="828px" height="740px" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="100%" align="left" valign="top" class="LeftMenu_BG" style="padding:0px;padding-left:10px;margin:0px;">
					<table width="785" border="0" cellspacing="0" cellpadding="0">
					    <tr>
					        <td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="1%">&nbsp;</td>
										<td width="22%" height="30" align="center" valign="middle" class="Rounded_buttonBlue">
											<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientallergy/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" />
										</td>
										<td width="1%">&nbsp;</td>
										<td width="16%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue">
											<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cimmunization/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Immunization" />
										</td>
										<td width="1%">&nbsp;</td>
										<td width="18%" align="center" valign="middle" class="Rounded_buttonBlue">
											<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientpastillness/patientpastillness?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
										<td width="1%">&nbsp;</td>
										<td width="17%" align="center" valign="middle" class="Rounded_buttonOrenge">
											<input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatientfamilyhistory/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Family History" />
										</td>
										<td width="23%">&nbsp;</td>
									</tr>
								</table>
							</td>
					  				</tr>
					  	<tr>
							<td class="Heading_Bg" colspan="4" style=" border-top:1px solid #0d6596;width:100%;" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" />&nbsp;&nbsp;Family History</td>
						</tr>
						<tr>
							<td colspan="4">
								<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
									<tr>
										<td width="12%" align="left" valign="middle" class="bodytext_bold" style="text-align:left; padding-left:10px;">Relative</td>
										<td width="12%" align="left" valign="middle"  class="bodytext_bold" style="text-align:left; padding-left:10px;"> Year of Birth </td>
										<td width="41%" align="center" valign="middle" class="bodytext_bold"  style="text-align:left; padding-left:15px;">Known Medical History</td>
										<td width="25%"  class="bodytext_bold" style="text-align:left; padding-left:15px;"> If not alive, age in years &amp; cause</td>
										<td width="10%" class="bodytext_bold" style="text-align:left; padding-left:15px;">&nbsp;</td>
									</tr>
									<tr style="background-color:<?php if( $array_relativeFather['medicalhistory'] == ''){echo 'transparent';}else{echo '#FFFFA5';}?>;" class="bodytext_normal" id="father<?= $array_relativeFather['id']; ?>">
										<td height="28" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;">Father</td>
										<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;">
											<select name="id<?=$array_relativeFather['id']; ?>birthyear" class="yearpicker" id="id<?=$array_relativeFather['id']; ?>birthyear"  ></select>
										</td>
										<td height="22" align="left" valign="middle"  style="border-bottom:2px solid #0d6596; padding-left:15px;">
											<input onchange="if($(this).val() != ''){highlight(this,true);}else{highlight(this,false);}" id="medicalhistorytxt<?=$array_relativeFather['id']; ?>"  name="medicalhistorytxt<?=$array_relativeFather['id']; ?>" type="text" class="textarea" size="52"  value="<?= $array_relativeFather['medicalhistory']; ?>" />  
										</td>
										<td height="22" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding-top:3px" >
												<tr id="trnotalivetxtid<?=$array_relativeFather['id']; ?>" name="trnotalivetxtid<?=$array_relativeFather['id']; ?>" style="valign:middle">
													<td width="10%" >
														<input name="id<?=$array_relativeFather['id']; ?>deathagetxt" id="id<?=$array_relativeFather['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="Age" value="<?= $array_relativeFather['deathage'];?>"  maxlength="3" />
													</td>
													<td width="5%">&nbsp;
													</td>
													<td width="85%">
														<input name="id<?=$array_relativeFather['id']; ?>deathcausetxt" id="id<?=$array_relativeFather['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause"  value="<?= $array_relativeFather['deathcause']; ?>"/>
													</td>
												</tr>
											</table>	
										</td>
										<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:20px;"  >&nbsp;</td>
									</tr>
									<tr style="background-color:<?php if( $array_relativeMother['medicalhistory'] == ''){echo 'transparent';}else{echo '#FFFFA5';}?>;" class="bodytext_normal" id="mother<?= $array_relativeMother['id']; ?>">
										<td height="28" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;">Mother</td>
										<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;">
											<select name="id<?=$array_relativeMother['id']; ?>birthyear" class="yearpicker" id="id<?=$array_relativeMother['id']; ?>birthyear"></select>
										</td>
										<td height="22" align="left" valign="middle" style="border-bottom:2px solid #0d6596; padding-left:15px;">
											<input onchange="if($(this).val() != ''){highlight(this,true);}else{highlight(this,false);}" id="medicalhistorytxt<?=$array_relativeMother['id']; ?>"  name="medicalhistorytxt<?=$array_relativeMother['id']; ?>" type="text" class="textarea" size="52"  value="<?= $array_relativeMother['medicalhistory']; ?>"  />  
										</td>
										<td height="22" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px; ">
											<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:3px" >
												<tr id="trnotalivetxtid<?=$array_relativeMother['id']; ?>" name="trnotalivetxtid<?=$array_relativeMother['id']; ?>" >
													<td width="10%" >
														<input name="id<?=$array_relativeMother['id']; ?>deathagetxt" id="id<?=$array_relativeMother['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="Age" value="<?= $array_relativeMother['deathage'];?>"  maxlength="3"/>
													</td>
													<td width="5%">&nbsp;
													</td>
													<td width="85%">
														<input name="id<?=$array_relativeMother['id']; ?>deathcausetxt" id="id<?=$array_relativeMother['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause" value="<?= $array_relativeMother['deathcause']; ?>" />
													</td>
												</tr>
											</table>	
										</td>
										<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:20px;"  >
											&nbsp;
										</td>
									</tr>
									<?php $i=1;foreach($array_relative as $relative) {?>
										<tr style="background-color:<?php if( $relative['medicalhistory'] == ''){echo 'transparent';}else{echo '#FFFFA5';}?>;" class="bodytext_normal" id="relative<?= $relative['id']; ?>">
											<td height="28" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;"><?= $relative['relation']; ?></td>
											<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:10px;">
												<select name="id<?=$relative['id']; ?>birthyear" class="yearpicker" id="id<?=$relative['id']; ?>birthyear" ></select>
											</td>
											<td height="22" align="left" valign="middle"  style="border-bottom:2px solid #0d6596; padding-left:15px;">
												<input onchange="if($(this).val() != ''){highlight(this,true);}else{highlight(this,false);}" id="medicalhistorytxt<?=$relative['id']; ?>"  name="medicalhistorytxt<?=$relative['id']; ?>" type="text" class="textarea" size="52" value="<?= $relative['medicalhistory']; ?>" />  
											</td>
											<td height="22" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px;">
												<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:3px">
													<tr id="trnotalivetxtid<?=$relative['id']; ?>" name="trnotalivetxtid<?=$relative['id']; ?>" >
														<td width="10%" >
															<input name="id<?=$relative['id']; ?>deathagetxt" id="id<?=$relative['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="Age" value="<?= $relative['deathage'];?>"  maxlength="3" number="true"/>
														</td>
														<td width="5%">&nbsp;
														</td>
														<td width="85%">
															<input name="id<?=$relative['id']; ?>deathcausetxt" id="id<?=$relative['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause" value="<?= $relative['deathcause']; ?>"/>
														</td>
													</tr>
												</table>	
											</td>
											<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:30px;"  >
												<img src="/ayushman/assets/images/Delete_arow.png" title="Delete" width="20" height="20" border="0" onclick="deleterow('<?= $relative['id']; ?>')" style="cursor:pointer;" id="deleterelativebutton" />
											</td>
										</tr>
									<?php } ?>
									<tr>
										<td height="28" align="left" valign="middle"  class="bodytext_normal" style=" padding-left:8px; border-bottom:2px solid #0d6596;" ><select name="select" id="newrelative" name="newrelative" style="size:50px;" >
											<?PHP  
												foreach ($array_relationmaster as $relationmaster) { 										
													print "<option  \" value=\"{$relationmaster}\">{$relationmaster}</option>";
												} 
											?>
											</select>
										</td>
										<td align="left" valign="middle"  class="bodytext_normal" style=" padding-left:10px; border-bottom:2px solid #0d6596;"><select name="newrelativebirthyear" class="yearpicker" id="newrelativebirthyear"></select> </td>
										<td height="25" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px;"><input name="newrelativemedicalhistory" id="newrelativemedicalhistory" type="text" class="textarea" size="52"/></td>
										<td height="25" align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px;"><input  name="newrelativedeathage" id="newrelativedeathage" type="text" class="textarea" size="2" placeholder="age" maxlength="3" />
											&nbsp;
											<input name="newrelativedeathcause" id="newrelativedeathcause" type="text" class="textarea" size="13"  placeholder="Cause" /></td>
										<td align="left" valign="middle"  class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:30px;"  >
											<img src="/ayushman/assets/images/add_arow.png" onclick="addnewrelative()" title="Save" width="20" height="20" border="0" style="cursor:pointer;" id="addnewrelativebutton" />
										</td>
									</tr>
								</table>	
							</td>
						</tr>
						<tr>
							<td width="100%" style="padding-top:15px;paddingleft:5px;"><input align="center" valign="middle"  class="button" onclick="savedetails(true);" value="Save" style="width:70px;"/> </td>
						</tr>    
					</table>
				</td>
			</tr>
		</table>
		<input type="hidden" id="relativesdetails"/>
		<input type="hidden" id="motherdetails" />
		<input type="hidden" id="fatherdetails"/>
	</div>
