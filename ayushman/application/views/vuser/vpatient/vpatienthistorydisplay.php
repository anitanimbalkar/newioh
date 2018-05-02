 <link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <style type="text/css">
.hiddendivs{
	display:none;	
}
.style2 {color: #000000}
.style3 {color: #333333}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style11 {font-family: tahoma, Helvetica, sans-serif; font-size: 11px; color: #000000; }
.style14 {font-family: tahoma, Helvetica, sans-serif; font-size: 11px; }

.style12 {font-family: tahoma, Helvetica, sans-serif; font-size: 11px; color: #000000; font-weight: bold; }

 </style>
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#divallergy').show();
});
function show_divcontents(anchor)
{	
	$('#tabcontainer').find("td.Rounded_buttonOrenge").removeClass("Rounded_buttonOrenge").addClass("Rounded_buttonBlue");
	$('td.Rounded_buttonBlue').css({'background-color':'#2D7A9E'});	
	$(anchor).parent().removeClass("Rounded_buttonBlue");
	$(anchor).parent().addClass("Rounded_buttonOrenge");
	$('div.hiddendivs').css({'display':'none'});
	$("#"+$(anchor).next().val()).show();
}	
function toggle(toggleText,displayText,name) {
	var ele = document.getElementById(toggleText);
	var text = document.getElementById(displayText);
	var headingclosed='<div   align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2"><label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">'+name+'</label><img src="/ayushman/assets/images/slideup.gif"  style="float:right; height:10px; width:10px;vertical-align:center; padding-top:3px;border:none;"  /></div>';
	var headingopen='<div   align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2"><label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">'+name+'</label><img src="/ayushman/assets/images/slidedown.gif"  style="float:right; height:10px; width:10px;vertical-align:center;padding-top:3px;border:none;"  /></div>';
	if(ele.style.display == "block") {
    	ele.style.display = "none";
		text.innerHTML = headingopen;
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = headingclosed;
	}
} 
</script>


<div id="body_contantpatientpage" style="width:828px;height:800px;overflow-y:auto;align:left;"> 
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;History</td>
		</tr>
	</table>
 	<div id="tabs" style="float:left;font-size:9pt;vertical-align:top;height:auto;width:99%;position:relative;overflow-y:auto;none repeat scroll 0 0 #E8E8E8;border:0px;background:transparent;overflow-y:auto;">
		<table>
			<tr>
				<td style="valign:top;">
					 <image src="<?php echo $patient->photo_c;   ?>" style="border:1px solid #000000;" height="120px" width="100px" />
				</td>
				<td width="100%" align="left">
					<table valign="top">
						<tr class="bodytext" >                
						   	<td width="130px" >UID(Aadhar Card ID)</td>
						  	<td align="left">:<input type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold; width:300px; line-height:9pt; height:15px;"   id="uid"  value="<?php echo $patient->identificationnumber_c;  ?>" />
						  	</td>                
						</tr>
						<tr  class="bodytext">                
						  	<td width="130px" >Name</td>
						  	<td align="left">:<input  type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  id="firtsnm" value="<?php echo $patient->Firstname_c.' '.$patient->middlename_c.' '.$patient->lastname_c;  ?>" />
						  	</td> 
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px" >Gender</td>
						  	<td align="left">:<input  type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  id="selgender" value="<?= trim($patient->gender_c);?>" />
						  	</td>
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px">Date of Birth</td>
						   	<td align="left">:<input type="text" id="dob" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  value="<?= date('d-M-Y',strtotime($patient->DOB_c)) ;  ?>" /> 
						  	</td>				  
						</tr>
						<tr class="bodytext">
							<td width="130px">Blood Group</td>
							<td align="left">:<input type="text"    id="bloodgrp" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value="<?= trim($patient->bloodgroup_c);  ?>" />
							</td>
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px">Marital status</td>
						  	<td align="left">:<input type="text"    id="maritalstatus" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value="<?= trim($patient->maritalstatus_c);  ?>" />
						  	</td>
						</tr>
						<tr  class="bodytext">                 
						 	<td width="130px">Preferred Language</td> 
						  	<td align="left">:<input type="text" id="preferedlanguage" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value="<?= trim($patient->languages_c); ?>" />
						  	</td>  
						</tr>
					</table>
				</td>
			</tr>
		</table>
 		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				<td> 
					<a id="displayTextDemographic" href="javascript:toggle('toggleTextDemographic','displayTextDemographic','Demographic');">
						<div  id="historyid" align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2">
							<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">Demographic</label><img src="/ayushman/assets/images/slidedown.gif"  style="float:right; height:10px; width:10px;vertical-align:center;padding-top:3px;border:none;"  />
						</div>
					</a>
					<div id="toggleTextDemographic" style="display: none">
						<table  cellpadding="0" cellspacing="0" style="width:100%;"align="left">
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td style="width:1%;" >&nbsp;</td>
								<td style="width:99%;" >
									<table  cellpadding="0" cellspacing="0" style="width:100%;"align="left">		
										<tr>
											<td colspan="13"><div  align="left"  style="height:11pt;width:88%;padding-top:2px;font-size:9pt;background: none repeat scroll 0 0 #B6B6B6;" > <label  style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size: 9pt;font-weight: bold; "> Home Contact Details</label></div></td> 
										</tr>
										<tr class="bodytext" align="left">
											<td width="15%">Phone Home</td>
											<td width="35%">:<input type="text"    id="phonehome" readonly="readonly" style="background: transparent;border:none;"   value="<?php echo $obj_patient->phonenohome_c;  ?>" /></td>   
										</tr>
										<tr class="bodytext" align="left">
											<td >Mobile No1</td>
											<td>:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="mobno1" value="<?php echo $obj_patient->mobileno1_c;  ?>" /></td>
											<td width="15%"> Mobile No2 </td>
											<td width="35%">:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="mobno2" value="<?php echo $obj_patient->mobileno2_c;  ?>" /></td>                 
										</tr>				
										<tr class="bodytext" align="left">
											<td >Line 1 </td>
											<td>:<input type="text"    id="addhline1" readonly="readonly" style="background: transparent;border:none;"  value="<?php echo $objaddhome->line1_c;  ?>"  /></td>        
											<td >Near Landmark </td>
											<td >:<input type="text"  readonly="readonly" style="background: transparent;border:none;width:200px;"   id="addhlandmark"  value="<?php echo $objaddhome->nearlandmark_c;  ?>" /></td>           
										</tr>				
										<tr class="bodytext" align="left">
											<td >Location </td>
											<td>:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addhloc" value="<?php echo $objaddhome->location_c;  ?>" /></td>  
											<td> City  </td>
											<td>:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addhcity" value="<?php echo $objaddhome->city_c;  ?>" /></td>               
										</tr>
										<tr class="bodytext" align="left">
											  <td >State </td>
											  <td>:
												<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addhstate" value="<?php echo $objaddhome->state_c;  ?>" />
											  </td>  
											  <td> Pincode </td><td>:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addhpin" value="<?php echo $objaddhome->pin_c;  ?>" /></td>               
										</tr>
										<tr class="bodytext" align="left">
											  <td >Country </td>
											  <td>:
												<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addhcountry" value="<?php echo $objaddhome->country_c;  ?>" />
											  </td>			               
										</tr>
										<tr class="bodytext" align="left" style="padding-top:10px;">
												<td colspan="13" style="padding-top:10px">
													<div  align="left"  style="height:12pt;width:88%;padding-top:2px;font-size:9pt;background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;"> 
														<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">  Office Contact Details</label>
													</div>
												</td> 
										</tr>				
											<tr class="bodytext" align="left">
											  <td >Line 1 </td>
											  <td>:
												<input type="text" readonly="readonly" style="background: transparent;border:none;width:200px;"    id="addwline1"  value="<?php echo $objaddwork->line1_c;  ?>" />
											  </td>   
											   <td >Near Landmark </td> <td >:<input type="text"  readonly="readonly" style="background: transparent;border:none;width:200px;"   id="addwlandmark"  value="<?php echo $objaddwork->nearlandmark_c;  ?>" />
											  </td>                 
											</tr>		
											<tr class="bodytext" align="left">
											  <td >Location </td>
											  <td>:
												<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addwloc"  value="<?php echo $objaddwork->location_c;  ?>" />
											  </td>  
											  <td> City </td><td>:
												<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addwcity" value="<?php echo $objaddwork->city_c;  ?>" />
											  </td>
											</tr>
											<tr class="bodytext" align="left">
											  <td >State </td>
											  <td>:
												<input type="text"    id="addwstate" readonly="readonly" style="background: transparent;border:none;"   value="<?php echo $objaddwork->state_c;  ?>" />
											  </td>  
											  <td> Pincode </td><td>:<input type="text"  readonly="readonly" style="background: transparent;border:none;"   id="addwpin"   value="<?php echo $objaddwork->pin_c;  ?>"/></td>               
											</tr>
											<tr class="bodytext" align="left">
											  <td >Country </td>
											  <td>:
												<input type="text"    id="addwcountry"  readonly="readonly" style="background: transparent;border:none;"  value="<?php echo $objaddwork->country_c;  ?>"/>
											  </td>
											   <td >Phone Work </td><td>:
												<input type="text"    id="phonework" readonly="readonly" style="background: transparent;border:none;"  value="<?php echo $obj_patient->phonenowork_c;  ?>" />
											  </td>   		               
											</tr>
											<tr class="bodytext" align="left">           
											  <td colspan ="3"  >
											  <label id="savelbl" style="font-weight:bold;visibility:hidden; " readonly="readonly" style="background: transparent;border:none;" > patient details have been saved.</label>
											  </td>                              
											</tr>
											<tr class="bodytext" align="left"><td colspan="13" style="float:left;">
							
											</td></tr>
											
				</table></td>
							</tr>
						</table>
					</div>
				</td>
				</tr>
			<tr>
				<td>
					&nbsp;
				</td>
			</tr>
	 		<tr>
				<td> 
					<a id="displayTextHistory" href="javascript:toggle('toggleText','displayTextHistory','Medical History');">
				<div  id="historyid" align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2">
						<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">Medical History</label><img src="/ayushman/assets/images/slidedown.gif"  style="float:right; height:10px; width:10px;vertical-align:center;padding-top:3px;border:none;"  />
				</div>
				</a>
						<div id="toggleText" style="display: none"> 
							<div >
								<table width="785" border="0" cellspacing="0" cellpadding="0">
									<tr>
					  					<td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr id="tabcontainer">
													<td width="2%">&nbsp;</td>
													<td width="22%" height="30" align="center" valign="middle" class="Rounded_buttonOrenge">
													<a  style="color:#FFFFFF; height:100%; width:100%; vertical-align:center;" onclick="show_divcontents(this)" >Allergy & Social Habits</a>
													<input type="hidden" value="divallergy" />
													</td>
													<td width="1%">&nbsp;</td>
													<td width="16%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue">
													<a  style="color:#FFFFFF; height:100%; width:100%; vertical-align:center;" onclick="show_divcontents(this)" >Immunization</a>
													<input type="hidden" value="divimmunization" />
													</td>
													<td width="1%">&nbsp;</td>
													<td width="18%" align="center" valign="middle" class="Rounded_buttonBlue">
													<a  style="color:#FFFFFF; height:100%; width:100%;  vertical-align:center;" onclick="show_divcontents(this)" >Personal History</a>		
													<input type="hidden" value="divpersonalhistory" />
													</td>
													<td width="1%">&nbsp;</td>
													<td width="17%" align="center" valign="middle" class="Rounded_buttonBlue">
													<a  style="color:#FFFFFF; height:100%; width:100%; vertical-align:center;" onclick="show_divcontents(this)" >Family History</a>
													<input type="hidden" value="divfamilyhistory" />
													</td>
													<td width="23%">&nbsp;</td>
												</tr>
												<tr>
													<td style="width:100% height:300px; " colspan="9">							
														<div id="divallergy" style="" class="hiddendivs">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td height="29" align="left" valign="top">
																		<table width="100%" border="0" cellspacing="0" cellpadding="0">
																		<tr>
																			<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Allergies</td>
																		</tr>
																		<tr>
																			<td>
																				<div id="tabs-3" style="height:auto; align:left; padding-left:5px; ">
																					<table align="left" width="100%" style="font-family:Verdana, Arial, Helvetica, sans-serif;">
																						<tr class="bodytext" align="left" width="100%" >
																							<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
																								<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>					
																							</td>
																							<td width="14%" height="30" class="bodytext_styleBlue" style="float:left; " >Food Allergies</td>
																							<td width="2%" height="30" class="bodytext_styleBlue">:</td>
																							<td width="62%">
																							<?php $value = '';
																								$k = 0;
																								foreach($food as $key=> $val)
																								{
																									if($k == 0)
																										$value = ucwords($val);
																									else
																										$value = $value.' # '.ucwords($val);
																									$k++;
																								}
																								echo $value;
																							?>
																						   </td> 
																						</tr>
																						
																						<tr class="bodytext" align="left" >
																							<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
																								<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>					
																							</td>
																							<td width="14%" height="30" class="bodytext_styleBlue" >Drug Allergies</td>
																							<td width="2%" height="30" class="bodytext_styleBlue">:</td>
																							<td width="62%">					  
																							<?php 
																								$value1 = '';
																								$i = 0;
																								foreach($drug as $key=> $val1)
																								{
																									if($i == 0)
																										$value1 = ucwords($val1);
																									else
																										$value1 = $value1.' # '.ucwords($val1);
																									$i++;
																								}
																								echo $value1;
																							?>
																						  </td> 
					</tr>
																						<tr class="bodytext" align="left" >
																							<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
																								<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>					
																							</td>
																							<td width="14%" height="30" class="bodytext_styleBlue" >Plant Allergies</td>
																							<td width="2%" height="30" class="bodytext_styleBlue">:</td>
																							<td width="62%">
																								<?php 
																									$value2 = '';
																									$j = 0;
																									foreach($plant as $key=> $val2)
																									{
																										if($j == 0)
																											$value2 = ucwords($val2);
																										else
																											$value2 = $value2.' # '.ucwords($val2);
																										$j++;
																									}
																									echo $value2;
																								?>
																							  </td> 
																						</tr>
																						<tr class="bodytext" align="left" >
																							<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
																								<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>					
																							</td>
																							<td width="14%" height="30" class="bodytext_styleBlue" >Animal Allergies</td>
																							<td width="2%" height="30" class="bodytext_styleBlue">:</td>
																							<td width="62%">
																								<?php 
																									$value3 = '';
																									$l = 0;
																									foreach($animal as $key=> $val3)
																									{
																										if($l == 0)
																											$value3 = ucwords($val3);
																										else
																											$value3 = $value3.' # '.ucwords($val3);
																										$l++;
																									}
																									echo $value3;
																								?>
																							  </td> 
																						</tr>
																					</table>
																				</div>
																			</td>
			
																		</tr>
																		<tr>
																			<td>&nbsp;</td>
																		</tr>
																		<tr>
																			<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Food and Social Habits</td>
																		</tr>
																	 	<tr>
																			<td style="padding-top:10px;">
																				<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
																					<tr>
																						<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a></td>
																						<td height="30" class="bodytext_styleBlue">Diet </td>
																						<td height="30" class="bodytext_styleBlue">:</td>
																						<td height="30" class="bodytext"><?= $patientinfo->diet_c?>										
																						</td>
																						<td height="30">&nbsp;</td>
																						<td class="style12">&nbsp;</td>
																					</tr>
																					<tr>
																						<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
																							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>				</td>
																						<td width="14%" height="30" class="bodytext_styleBlue">Smoking </td>
																						<td width="2%" height="30" class="bodytext_styleBlue">:</td>
																						<td width="20%" height="30" class="bodytext"><?= $patientinfo->smoking_c?></td>
																						<td height="30">&nbsp;</td>
																						<td width="1%" class="style12">&nbsp;</td>
																				  	</tr>
																				  	<tr>
																						<td height="30" align="center" valign="middle" style="padding-left:5px;">
																							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a>				</td>
																						<td height="30" class="bodytext_styleBlue">Alcohol </td>
																						<td height="30" class="bodytext_styleBlue">:</td>
																						<td height="30" class="bodytext"><?= $patientinfo->alcohol_c?>
																											</td>
																						<td height="30">&nbsp;</td>
																						<td class="style12">&nbsp;</td>
																				  	</tr>
																				  	<tr>
																						<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a></td>
																						<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Tobacco</span></td>
																						<td height="30" class="bodytext_styleBlue">:</td>
																						<td height="30" class="bodytext"><?= $patientinfo->tobacco_c?></td>
																						<td height="30">&nbsp;</td>
																						<td class="style12">&nbsp;</td>
																				  	</tr>
																					<tr>
																						<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a></td>
																						<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Exercise</span></td>
																						<td height="30" class="bodytext_styleBlue">:</td>
																						<td height="30" class="bodytext"><?= $patientinfo->exercisepatterns_c?></td>
																						<td height="30">&nbsp;</td>
																						<td class="style12">&nbsp;</td>
																					</tr>
																					<tr>
																						<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"/></a></td>
																						<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Outdoor sports</span></td>
																						<td height="30" class="bodytext_styleBlue">:</td>
																						<td height="30" class="bodytext"><?= $patientinfo->outdoorsport_c?></td>
																						<td height="30">&nbsp;</td>
																						<td class="style12">&nbsp;</td>
																					</tr>
																				</table>	
																			</td>
																		</tr>
																	</table>
																</td>
															</tr>
														</table>			
													</div>
														<div id="divimmunization" style="" class="hiddendivs">
															<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tr>
					            								<td colspan="4">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					                									<tr>
					                  										<td align="left" valign="top">
												 		 						<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
																					<tr>
																						<td width="11%" align="left" valign="middle" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:15px;"> Age Due </td>
																						<td width="13%" align="left" valign="middle" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:15px;">Due Date </td>
																						<td width="31%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Immunization</td>
																						<td width="31%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">&nbsp;</td>
																						<td width="14%" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:15px;">Actual Date</td>
																					</tr>
																				  <form id="immunizationform" method="post" enctype="multipart/form-data">
																				  <?php foreach($result as $temp) { ?>
																					<tr>
																						<td rowspan="<?php echo count($temp['elements']) ?>" align="left" valign="middle" style="border-bottom:2px solid #0d6596; padding-left:15px;" class="style14"><?php echo $temp['due_age'];?></td>
																						<td rowspan="<?php echo count($temp['elements']) ?>" align="left" valign="middle" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px;"><?php echo $temp['due_date'];?></td>
																						<?php foreach ($temp['elements'] as $element) {?>
																						<script type="text/javascript">
																							$(function() {																	
																								$('#'+"<?php echo $element['id'];?>"+'_'+"<?php echo $element['status'];?>").attr("checked","true");
																							});
																						</script>
																						<input type="hidden" value="<?php echo $element['id']?>" name="<?php echo $element['id']?>_id"/>
																						<td rowspan="1" align="left" valign="middle" class="style11" style="padding-left:15px;"><?php echo $element['name'];?></td>
																						<td rowspan="1" align="center" valign="middle" class="style11">
																							<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_0" type="radio" value="0" onclick='clear_date("<?php echo $element['id'];?>_actual")'  disabled='disabled'/>Don't know &nbsp;&nbsp;
																							<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_1" type="radio" value="1"  disabled='disabled'/>Yes &nbsp;&nbsp;
																							<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_2" type="radio" value="2" onclick='clear_date("<?php echo $element['id'];?>_actual")' disabled='disabled'/>No
																						</td>
																						<td rowspan="1" align="left" valign="middle" class="bodytext_normal" style="padding-left:15px;" ><label class="style11" name="<?php echo $element['id'];?>_actual_date"  id="<?php echo $element['id'];?>_actual">&nbsp; <?php if ($element['date'])  echo $element['date'] ;?></label></td>
																					</tr>
																						<?php }?>
																				  <?php }?>
													  
																					</form>
								                 								</table>
									  		</td>
					                	</tr>
										
					            	</table>
								</td>
					    	</tr>
						</table>
					</div>
							<div id="divpersonalhistory" style="" class="hiddendivs">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="29" align="left" valign="top">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
												<tr>
													<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Know Medical Problems </td>
												</tr>
												<tr>
												
												<td style="padding-top:10px;">
													<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
													<?php $i=1; foreach($array_disease as $ds) {?>
														<tr>
														   <td width="4%" height="30" align="center" valign="middle" class="style11" style="padding-left:5px;"><?php echo $i;?>.</td>
														   <td height="30" class="bodytext_styleBlue"><?php echo $ds;?></td>
														   <td width="3%" height="30" class="bodytext_styleBlue">:</td>
														   <td width="16%" height="30" class="style12">
														   <input name="<?php echo $ds;?>" <?php if($array_status[$i-1]==0){echo 'checked="checked"';}?> id="<?php echo $ds;?>d" type="radio" value="0" disabled='disabled'/>
															 &nbsp;Don't know </td>
														   <td width="8%" height="30"><span class="style12">
															<input name="<?php echo $ds;?>"<?php if($array_status[$i-1]==1){echo 'checked="checked"';}?> id="<?php echo $ds;?>n" type="radio" value="1"  disabled='disabled'/>
														   </span><span class="style12">No</span></td>
														   <td width="9%"><span class="style12">
															 <input name="<?php echo $ds;?>" <?php if($array_status[$i-1]==2){echo 'checked="checked"';}?>id="<?php echo $ds;?>y" type="radio" value="2"  disabled='disabled'/>
														   </span><span class="style12">Yes</span></td>
														   <td width="43%"><label name="<?php echo $ds?>remark" class="style11" type="text"  id="<?php echo $ds?>remark" size="60"><?php echo $array_remark[$i-1];$i++;?></label></td>
														   <td class="style12">&nbsp;</td>
									 
														</tr>
													<?php }?>
													</table>
												</td>
											</tr>
												<tr>
													<td>&nbsp;</td>
												</tr>
												<tr>
													<td >&nbsp;&nbsp;&nbsp;<label style="font-family:tahoma; color: #014E72 ;font-size:12px;font-weight:bold;"> Major Illness &amp; Treament History </label></td>
												</tr>
												<tr>
												  	<td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
													 	<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
															<tr> 
																<td width="30%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Major Illness</td>
																<td width="30%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Period Of Treatment</td>
																<td width="40%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Description</td>
															</tr>
															<?php $str=""; for($j=0;$j<sizeof($array_pastillness);$j++) 
															{
																$str = $str. "<tr height='25'><td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastillness[$j][0]."</td>"."<td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastillness[$j][1]."</td>"."<td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastillness[$j][2]."</td></tr>";
															}
															echo $str;
															?>
														</table>
													</td>
												</tr>
												<tr>
												   	<td align="center" valign="top">&nbsp;</td>
												</tr>
												<tr>
												   	<td >&nbsp;&nbsp;&nbsp;<label style="font-family:tahoma; color: #014E72 ;font-size:12px;font-weight:bold;"> Operation / Surgical Procedures </label></td>
												</tr>
										
												<tr>
													<td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
													 	<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
															<tr>
													
																<td width="30%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Name of Surgery</td>
																<td width="30%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Date of Surgery</td>
																<td width="40%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Reason and Description</td>
															</tr>
															<?php $str=""; for($j=0;$j<sizeof($array_pastsurgery);$j++) 
															{
																$str = $str. "<tr height='25'><td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastsurgery[$j][0]."</td>"."<td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastsurgery[$j][1]."</td>"."<td valign='middle' class='style11' style='border-bottom:2px solid #0d6596; padding-left:15px;'>". $array_pastsurgery[$j][2]."</td></tr>";
															}
															echo $str;
															?>
														</table>
													</td>
												</tr>
													
												<tr>
													<td align="center" valign="top">&nbsp;</td>
												</tr>
												<tr>
												   <td >&nbsp;&nbsp;&nbsp;<label style="font-family:tahoma; color: #014E72 ;font-size:12px;font-weight:bold;"> Other Medical Observations  </label></td>
												</tr>
												<tr>
													<td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
														<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
															<tr>
																<td width="42%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Question</td>
																<td width="58%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Answer</td>
															</tr>
													<?php $i=0;foreach($array_question as $question) {?>
														<tr>
															<td align="left" valign="middle" bgcolor="#f6f6f6" class="style11" style=" padding-left:15px; border-bottom:2px solid #0d6596;"><?php echo $question;?></td>
															<td height="25" align="left" valign="middle" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px;">
															<label  size="75" id="ques<?php echo $i;?>" name="ques<?php echo $i; $i++;?>" > <?php echo $array_answer[$i-1];?>
															</label></td>
														</tr>
													<?php } ?>
													
													</table>
													</td>
												</tr>

											</table>
										</td>
									</tr>
								</table>
							</div>
							<div id="divfamilyhistory" style="" class="hiddendivs">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td align="left" valign="top">
											<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
												<tr>
													<td width="12%" align="left" valign="middle" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:10px;">Relative</td>
													<td width="12%" align="left" valign="middle" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:10px;"> Year of Birth </td>
													<td width="41%" align="center" valign="middle" bgcolor="#065176" class="Table_Heading"  style="text-align:left; padding-left:15px;">Known Medical History</td>
													<td width="25%" bgcolor="#065176" class="Table_Heading" style="text-align:left; padding-left:15px;"> If not alive, age in years &amp; cause</td>												
												</tr>
												<tr class="style11" id="father<?= $array_relativeFather['id']; ?>">
													<td height="28" align="left" valign="middle" bgcolor="#FFFFFF" class="style14" style="border-bottom:2px solid #0d6596; padding-left:10px;">Father</td>
													<td align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:10px;">
														<div name="id<?=$array_relativeFather['id']; ?>birthyeartxt" id="id<?=$array_relativeFather['id']; ?>birthyeartxt" style="display:block;" ><?= trim($array_relativeFather['birthyear']); ?> </div>
														<select name="id<?=$array_relativeFather['id']; ?>birthyear" class="yearpicker" id="id<?=$array_relativeFather['id']; ?>birthyear" style="display:none;" ></select>
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<div id="medicalhistorydiv<?=$array_relativeFather['id']; ?>"  name="medicalhistorydiv<?=$array_relativeFather['id']; ?>"   ><?= $array_relativeFather['medicalhistory']; ?></div>
														<input id="medicalhistorytxt<?=$array_relativeFather['id']; ?>"  name="medicalhistorytxt<?=$array_relativeFather['id']; ?>" type="text" class="textarea" size="52"  style="display:none;" />  
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding-top:3px" >
															<tr id="trnotalivetxtid<?=$array_relativeFather['id']; ?>" name="trnotalivetxtid<?=$array_relativeFather['id']; ?>" style="display:none;valign:middle">
																<td width="10%" >
																	<input name="id<?=$array_relativeFather['id']; ?>deathagetxt" id="id<?=$array_relativeFather['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="Age"/>
																</td>
																<td width="5%">&nbsp;
																</td>
																<td width="85%">
																	<input name="id<?=$array_relativeFather['id']; ?>deathcausetxt" id="id<?=$array_relativeFather['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause" />
																</td>
															</tr>
															<tr id="trnotalivedivid<?=$array_relativeFather['id']; ?>" name="trnotalivedivid<?=$array_relativeFather['id']; ?>"  >
																<td width="10%" align="left" style="valign:middle;"><div id="id<?=$array_relativeFather['id']; ?>deathagediv" name="id<?=$array_relativeFather['id']; ?>deathagediv" class="style11"  ><?= $array_relativeFather['deathage'];?></div>
																</td>
																<td width="5%" >&nbsp;
																</td>
																<td width="85%" align="left" valign="middle"  >
																	<div id="id<?=$array_relativeFather['id']; ?>deathcausediv"  name="id<?=$array_relativeFather['id']; ?>deathcausediv" class="style11" ><?= $array_relativeFather['deathcause']; ?></div>
																</td>
															</tr>
														</table>	
													</td>
												
												</tr>
												<tr class="style11" id="mother<?= $array_relativeMother['id']; ?>">
													<td height="28" align="left" valign="middle" bgcolor="#FFFFFF" class="style14" style="border-bottom:2px solid #0d6596; padding-left:10px;">Mother</td>
													<td align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:10px;">
														<div name="id<?=$array_relativeMother['id']; ?>birthyeartxt" id="id<?=$array_relativeMother['id']; ?>birthyeartxt" style="display:block;" ><?= $array_relativeMother['birthyear']; ?> </div>
														<select name="id<?=$array_relativeMother['id']; ?>birthyear" class="yearpicker" id="id<?=$array_relativeMother['id']; ?>birthyear" style="display:none;" ></select>
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<div id="medicalhistorydiv<?=$array_relativeMother['id']; ?>"  name="medicalhistorydiv<?=$array_relativeMother['id']; ?>"   ><?= $array_relativeMother['medicalhistory']; ?></div>
														<input id="medicalhistorytxt<?=$array_relativeMother['id']; ?>"  name="medicalhistorytxt<?=$array_relativeMother['id']; ?>" type="text" class="textarea" size="52"  style="display:none;" />  
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px; ">
														<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:3px" >
															<tr id="trnotalivetxtid<?=$array_relativeMother['id']; ?>" name="trnotalivetxtid<?=$array_relativeMother['id']; ?>" style="display:none;">
																<td width="10%" >
																	<input name="id<?=$array_relativeMother['id']; ?>deathagetxt" id="id<?=$array_relativeMother['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="age"/>
																</td>
																<td width="5%">&nbsp;
																</td>
																<td width="85%">
																	<input name="id<?=$array_relativeMother['id']; ?>deathcausetxt" id="id<?=$array_relativeMother['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause" />
																</td>
															</tr>
															<tr id="trnotalivedivid<?=$array_relativeMother['id']; ?>" name="trnotalivedivid<?=$array_relativeMother['id']; ?>"  >
																<td width="10%" >
																	<div id="id<?=$array_relativeMother['id']; ?>deathagediv" name="id<?=$array_relativeMother['id']; ?>deathagediv" class="style11"  ><?= $array_relativeMother['deathage'];?></div>
																</td>
																<td width="5%"  >&nbsp;
																</td>
																<td width="85%"  >
																	<div id="id<?=$array_relativeMother['id']; ?>deathcausediv"  name="id<?=$array_relativeMother['id']; ?>deathcausediv" class="style11" ><?= $array_relativeMother['deathcause']; ?></div>
																</td>
															</tr>
														</table>	
													</td>
													
												</tr>
												<?php $i=1;foreach($array_relative as $relative) {?>
													<tr class="style11" id="relative<?= $relative['id']; ?>">
														<td height="28" align="left" valign="middle" bgcolor="#FFFFFF" class="style14" style="border-bottom:2px solid #0d6596; padding-left:10px;"><?= $relative['relation']; ?></td>
														<td align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:10px;">
															<div name="id<?=$relative['id']; ?>birthyeartxt" id="id<?=$relative['id']; ?>birthyeartxt" style="display:block;" ><?= $relative['birthyear']; ?> </div>
															<select name="id<?=$relative['id']; ?>birthyear" class="yearpicker" id="id<?=$relative['id']; ?>birthyear" style="display:none;" ></select>
														</td>
														<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:2px solid #0d6596; padding-left:15px;">
															<div id="medicalhistorydiv<?=$relative['id']; ?>"  name="medicalhistorydiv<?=$relative['id']; ?>"   ><?= $relative['medicalhistory']; ?></div>
															<input id="medicalhistorytxt<?=$relative['id']; ?>"  name="medicalhistorytxt<?=$relative['id']; ?>" type="text" class="textarea" size="52"  style="display:none;" />  
														</td>
														<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px;">
															<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:3px">
																<tr id="trnotalivetxtid<?=$relative['id']; ?>" name="trnotalivetxtid<?=$relative['id']; ?>" style="display:none;">
																	<td width="10%" >
																		<input name="id<?=$relative['id']; ?>deathagetxt" id="id<?=$relative['id']; ?>deathagetxt" type="text" class="textarea" size="2" placeholder="Age"/>
																	</td>
																	<td width="5%">&nbsp;
																	</td>
																	<td width="85%">
																		<input name="id<?=$relative['id']; ?>deathcausetxt" id="id<?=$relative['id']; ?>deathcausetxt" type="text" class="textarea" size="13" placeholder="Cause" "/>
																	</td>
																</tr>
																<tr id="trnotalivedivid<?=$relative['id']; ?>" name="trnotalivedivid<?=$relative['id']; ?>"  >
																	<td width="10%" ><div id="id<?=$relative['id']; ?>deathagediv" name="id<?=$relative['id']; ?>deathagediv" class="style11"  ><?= $relative['deathage'];?></div>
																	</td>
																	<td width="5%"  >&nbsp;
																	</td>
																	<td width="85%"  >
																		<div id="id<?=$relative['id']; ?>deathcausediv"  name="id<?=$relative['id']; ?>deathcausediv" class="style11" ><?= $relative['deathcause']; ?></div>
																	</td>
																</tr>
															</table>	
														</td>
														
													</tr>
												<?php } ?>
										</table>
									</td>
										</td>
									</tr>
								</table>
							</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;
			</td>
		</tr>
 </table>

 </div>
   
   
  </div>
 </div>