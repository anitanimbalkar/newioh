<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/popupcomponent.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		openpopup('popup_foodallergy_target','span_foodallergies','Food Allergies','Food');
		openpopup('popup_drugallergy_target','span_drugallergies','Drug Allergies','Drug');
		openpopup('popup_plantallergy_target','span_plantallergies','Plant Allergies','Plant');
		openpopup('popup_animalallergy_target','span_animalallergies','Animal Allergies','Animal');
		
		hide_popup("popup_foodallergy_target","popup_span_animalallergies");
		hide_popup("popup_drugallergy_target","popup_span_animalallergies");
		hide_popup("popup_plantallergy_target","popup_span_animalallergies");
		hide_popup("popup_animalallergy_target","popup_span_animalallergies");
		
		setHabits('diet',"<?php echo $objpatient->diet_c;  ?>");
		setHabits('smoking',"<?php echo $objpatient->smoking_c;  ?>");
		setHabits('alcohol',"<?php echo $objpatient->alcohol_c;  ?>");
		setHabits('tobacco',"<?php echo $objpatient->tobacco_c;  ?>");
		setHabits('exercise',"<?php echo $objpatient->exercisepatterns_c;  ?>");
		setHabits('outdoorsports',"<?php echo $objpatient->outdoorsport_c;  ?>");
		setTimeout(function() {PlaceValues();},1250);
	});
	function setHabits(habit,value){
		list = document.getElementById(habit);
		itemToSelect =  value;
		for (iLoop = 0; iLoop< list.options.length; iLoop++){    
			if (list.options[iLoop].value == itemToSelect){
				list.options[iLoop].selected = true;
				break;
			}
		}
		$('#'+habit).change(
			function (){
				if($('option:selected',this).val() == 'Select'){
					$(this).css('background-color','transparent');
				}else{
					$(this).css('background-color','#FFFFA5');
				}
			}
		).change();
	}
	function PlaceValues(){
		setdata('popup_span_foodallergies','<?= $arrpatallergystr; ?>' );
		setdata('popup_span_drugallergies','<?= $arrpatallergystr; ?>' );
		setdata('popup_span_plantallergies','<?= $arrpatallergystr; ?>' );
		setdata('popup_span_animalallergies','<?= $arrpatallergystr; ?>' );
		
		setselecteddata('span_foodallergies');
		setselecteddata('span_drugallergies');
		setselecteddata('span_plantallergies');
		setselecteddata('span_animalallergies');
	}
	function savesocialhabbits(){
		selectedfoodallergies 	= getdata('popup_span_foodallergies');
		selecteddrugallergies 	= getdata('popup_span_drugallergies');
		selectedplantallergies 	= getdata('popup_span_plantallergies');
		selectedanimalallergies = getdata('popup_span_animalallergies');
		allergies = selectedfoodallergies+selecteddrugallergies+selectedplantallergies+selectedanimalallergies;
		$.ajax({
			url: '/ayushman/cpatienthistory/saveallergies?allergies='+allergies+'&patientId= <?= $objpatient->id;?>',
			type:'POST',
			success:  function(data) {showNotification('300','20','Save data','Patient allergies are saved successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );},
			error : function(){alert("error while updating social habbits ");},
			error : function(){alert("error while updating patient allergies ");}		
		});
		
		
		var tobacco = document.getElementById("tobacco");
		tobacco= (tobacco.options[tobacco.selectedIndex].text == 'Select')?'':tobacco.options[tobacco.selectedIndex].text;

		var alcohol = document.getElementById("alcohol");
		alcohol= (alcohol.options[alcohol.selectedIndex].text == 'Select')?'':alcohol.options[alcohol.selectedIndex].text;

		var smoking = document.getElementById("smoking");
		smoking= (smoking.options[smoking.selectedIndex].text == 'Select')?'':smoking.options[smoking.selectedIndex].text;

		var diet = document.getElementById("diet");
		diet= (diet.options[diet.selectedIndex].text == 'Select')?'':diet.options[diet.selectedIndex].text;
		
		var exercise = document.getElementById("exercise");
		exercise= (exercise.options[exercise.selectedIndex].text == 'Select')?'':exercise.options[exercise.selectedIndex].text;
		
		var outdoorsports = document.getElementById("outdoorsports");
		outdoorsports= (outdoorsports.options[outdoorsports.selectedIndex].text == 'Select')?'':outdoorsports.options[outdoorsports.selectedIndex].text;
		
		$.ajax({
			url: '/ayushman/cpatienthistory/savesocialhabbits?patientId=<?= $objpatient->id;?>&tobacco='+tobacco+'&alcohol='+alcohol+'&smoking='+smoking+'&diet='+diet+'&exercise='+exercise+'&outdoorsports='+outdoorsports,
			type:'POST',
			success:  function(data) {showNotification('300','20','Save data','Food and social habits are saved successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );},
			error : function(){alert("error while updating social habbits ");}		
		});
	}
	function show_popup(id_in, target_id_in, title_in, target_span_area_in, type_in, query_in){
		flag = hide_popup(target_id_in,id_in);
		var jsonPopup = [{id: id_in, targetid: target_id_in, title: title_in, targettxta:target_span_area_in, type:type_in, query:query_in }];
		if(!flag){
			createpopup(jsonPopup);
		}
		else
			$("#"+id_in+"outer").show();
	}
	function hide_popup(target_id_in,id_in){
		var childrens = $("#"+target_id_in).children();
		flag = false;
		for(i=0;i<childrens.length;i++)
		{
			$(childrens[i]).hide();			
			if($(childrens[i]).attr("id") ==id_in+"outer" )
				flag = true;			
		}
		return flag;
	}
	function openpopup(target,id,name,sourcetype){
		hide_popup("popup_foodallergy_target","popup_span_animalallergies");
		hide_popup("popup_drugallergy_target","popup_span_animalallergies");
		hide_popup("popup_plantallergy_target","popup_span_animalallergies");
		hide_popup("popup_animalallergy_target","popup_span_animalallergies");
		
		show_popup('popup_'+id, target, name, id, 'list','select id as id, Allergyname_c as value from allergymasters where type_c = "'+sourcetype+'" order by Allergyname_c');
	}
	function getdata(id){
		var childrens = $("#"+id+" :input");
		selectedids = '';
		for(i=0;i<childrens.length;i++){
			if($(childrens[i])[0].type == 'checkbox' && $(childrens[i])[0].checked == true)
				selectedids = selectedids + $(childrens[i])[0].id + ',';
		}
		return selectedids;
	}
	function setdata(id,data){
		var childrens = $("#"+id+" :input");
		data = data.split(',');
		for(var i=0;i<data.length;i++){
			$('#'+data[i]).attr('checked', true);
		}
		
	}
	function highlight(radio,flag){
		tr = $('#'+radio).closest('tr');
		if(flag){
			$(tr).css('background-color','#FFFFA5');
		}else{
			$(tr).css('background-color','transparent');
		}
	}
	function setselecteddata(id){
		var childrens = $("#popup_"+id+" :input");
		for(i=0;i<childrens.length;i++)
		{
			if($(childrens[i])[0].type == 'checkbox'){
				check = $(childrens[i])[0];
				var id = $(check).next().val();
				var text = trim($("#"+id).text());
				if(check.checked )
				{
					text =text +" # "+ trim($(check).parent().next().children(0).html());
				}
				else
				{
					val=trim($(check).parent().next().children(0).html());
					if(text.indexOf(val) >=0)
					{
						text = trim(text.replace("# "+val ,""));
					}
				}
				$("#"+id).text(text);
				if(text == ''){
					highlight(id,false);
				}else{
					highlight(id,true);
				}
			}
		}
	}
</script>
	<div id="wrapper" width="828px" height="740px" style="padding:0px;margin:0px;">
		<div id="popup_foodallergy_target" style="height:0px;width:35%;position:absolute;margin-top:90px;float:right;right:50px;">
		
		</div>
		<div id="popup_drugallergy_target" style="height:0px;width:35%;position:absolute;margin-top:120px;float:right;right:50px;">

		</div>
		<div id="popup_plantallergy_target" style="height:0px;width:35%;position:absolute;margin-top:150px;float:right;right:50px;">

		</div>
		<div id="popup_animalallergy_target" style="height:0px;width:35%;position:absolute;margin-top:180px;float:right;right:50px;">

		</div>
		<table width="828px" height="740px" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td width="100%" align="left" valign="top" class="LeftMenu_BG" style="padding:0px;padding-left:10px;margin:0px;">
				<table width="785" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="22%" height="30" align="center" valign="middle" class="Rounded_buttonOrenge">
								<input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatientallergy/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" />
							</td>
							<td width="1%">&nbsp;</td>
							<td width="16%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue">
								<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cimmunization/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Immunization" />
							</td>
							<td width="1%">&nbsp;</td>
							<td width="18%" align="center" valign="middle" class="Rounded_buttonBlue">
								<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientpastillness/patientpastillness?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
							<td width="1%">&nbsp;</td>
							<td width="17%" align="center" valign="middle" class="Rounded_buttonBlue">
								<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientfamilyhistory/view?patientUserId=<?php echo $objpatient->repatientsuserid_c; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Family History" />
							</td>
							<td width="23%">&nbsp;</td>
						</tr>
					</table>
				  </td>
				</tr>
				<tr>
				<td colspan="4">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="29" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td class="Heading_Bg" style=" border-top:1px solid #0d6596;">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Allergies</td>
									</tr>
									<tr>
										<td height="30" style="padding-top:10px;">
											<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
												<tr>
													<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td width="14%" height="30" class="bodytext_bold" >Food Allergies</td>
													<td width="2%" height="30" class="bodytext_bold">:</td>
													<td height="30" colspan="5" class="bodytext_normal" onclick="openpopup('popup_foodallergy_target','span_foodallergies','Food Allergies','Food');" style="border-bottom:1px solid;"><span id="span_foodallergies" contenteditable="false" class="expand"   readonly style="min-width:100%"></span></td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" class="bodytext_bold">Drug Allergies</td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30" colspan="5" class="bodytext_normal" onclick="openpopup('popup_drugallergy_target','span_drugallergies','Drug Allergies','Drug');" style="border-bottom:1px solid;"><span id="span_drugallergies" contenteditable="false" class="expand"   readonly style="min-width:100%"></span></td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" align="left" valign="top" class="bodytext_bold" style="padding-top:5px;">Plant Allergies</td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30" colspan="5" class="bodytext_normal" onclick="openpopup('popup_plantallergy_target','span_plantallergies','Plant Allergies','Plant');" style="border-bottom:1px solid;"><span id="span_plantallergies" contenteditable="false" class="expand"   readonly style="min-width:100%"></span></td>
											   </tr>
											   <tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" align="left" valign="top" class="bodytext_bold" style="padding-top:5px;">Animal Allergies</td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30" colspan="5" class="bodytext_normal" onclick="openpopup('popup_animalallergy_target','span_animalallergies','Animal Allergies','Animal');" style="border-bottom:1px solid;"><span id="span_animalallergies" contenteditable="false" class="expand"   readonly style="min-width:100%"></span></td>
											  </tr>
										  </table>	 
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td class="Heading_Bg"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Food and Social Habits</td>
									</tr>
									<tr>
										<td style="padding-top:10px;">
											<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" class="bodytext_bold">Diet </td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30" class="style12">
														<select name="diet" id="diet" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option>Pure Vegetarian</option>
															<option>Primarily Vegetarian</option>
															<option>Primarily Non-Vegetarian</option>
															<option>Vegan</option>
														</select>
													</td>
													<td height="30">&nbsp;</td>
													<td class="style12">&nbsp;</td>
												</tr>
												<tr>
													<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
														&nbsp;	</td>
													<td width="14%" height="30" class="bodytext_bold">Smoking </td>
													<td width="2%" height="30" class="bodytext_bold">:</td>
													<td width="20%" height="30" class="style12">
														<select name="smoking" id="smoking" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option value="Chain smoker">Chain smoker</option>
															<option value="Never">Never</option>
															<option value="Rarely">Rarely</option>
															<option value="Regularly">Regularly</option>      
														</select>				</td>
													<td height="30">&nbsp;</td>
													<td width="1%" class="style12">&nbsp;</td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">
														&nbsp;	</td>
													<td height="30" class="bodytext_bold">Alcohol </td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30" class="style12">
														<select id="alcohol" name="alcohol" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option value="1-2 pegs a day">1-2 pegs a day</option>
															<option value=">more than 2 pegs daily">more than 2 pegs daily</option>
															<option value="Never">Never</option>
															<option value="Rarely">Rarely</option>     
														</select>				</td>
													<td height="30">&nbsp;</td>
													<td class="style12">&nbsp;</td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_bold" style="padding-top:5px;">Tobacco</span></td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30">
														<select name="tobacco" id="tobacco" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option value="Never">Never</option>
															<option value="Occasionally">Occasionally</option>
															<option value="Regularly">Regularly</option>
														</select>
													</td>
													<td height="30">&nbsp;</td>
													<td class="style12">&nbsp;</td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_bold" style="padding-top:5px;">Exercise</span></td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30">
														<select name="exercise" id="exercise" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option value="Regularly">Regularly</option>
															<option value="Rarely">Rarely</option>
															<option value="Never">Never</option>
														</select>
													</td>
													<td height="30">&nbsp;</td>
													<td class="style12">&nbsp;</td>
												</tr>
												<tr>
													<td height="30" align="center" valign="middle" style="padding-left:5px;">&nbsp;</td>
													<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_bold" style="padding-top:5px;">Outdoor sports</span></td>
													<td height="30" class="bodytext_bold">:</td>
													<td height="30">
														<select name="outdoorsports" id="outdoorsports" size="1" class="textarea" style="width:150px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;">
															<option>Select</option>
															<option value="Regularly">Regularly</option>
															<option value="Rarely">Rarely</option>
															<option value="Never">Never</option>
														</select>
													</td>
													<td height="30">&nbsp;</td>
													<td class="style12">&nbsp;</td>
												</tr>
											</table>	
										</td>
									</tr> 
									<tr>
										<td height="40">
											<table width="320" border="0" align="left" cellpadding="0" cellspacing="0">
												<tr>
													<td width="8%">&nbsp;</td>
													<td width="26%" align="center" valign="middle" class="button" onclick="savesocialhabbits();">Save </td>
													<td width="66%" align="center" valign="middle">&nbsp;</td>
												</tr>
											</table>		
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>      
			</td>
			</tr>
		</table>
	</div>
