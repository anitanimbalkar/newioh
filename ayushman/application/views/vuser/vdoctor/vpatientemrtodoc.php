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
<script language="javascript"> 
$(document).ready(function(){

	if("<?php echo $back ?>" == "true" )
		$("#btnback").show();
	else
		$("#btnback").hide();
	$('#divallergy').show();
});
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
function back()
{
	window.location="<?= $backstring; ?>";
}
function dump(obj)
	{
		var out = '';
		for (var i in obj) {
		out += i + ": " + obj[i] + "\n";
		}
		alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}
function show_divcontents(anchor)
{	
	$('#tabcontainer').find("td.Rounded_buttonOrenge").removeClass("Rounded_buttonOrenge").addClass("Rounded_buttonBlue");
	$('td.Rounded_buttonBlue').css({'background-color':'#2D7A9E'});	
	$(anchor).parent().removeClass("Rounded_buttonBlue");
	$(anchor).parent().addClass("Rounded_buttonOrenge");
	$('div.hiddendivs').css({'display':'none'});
	$("#"+$(anchor).next().val()).show();
}	

</script>
<div id="body_contantpatientpage" style="width:828px; height:900; overflow-y:auto;">
	<table cellpadding="0" cellspacing="0" style="width:100%;">
    	<tr>
        	<td style="width:1%" >&nbsp;</td>
            <td style="width:98%">
            		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="99%" class="bodyheading">Patient Profile</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table> 
            </td>
        </tr>
    </table>
	<table cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
			<td style="valign:top;">
				 <image src="<?php echo $obj_patient->photo_c;   ?>" style="border:1px solid #000000;" height="120px" width="100px" />
			</td>
			<td style="width:100%;" align="left">
				<table cellspacing="0" cellpadding="0" style="width:100%;" valign="top" >
					<tr class="bodytext" >                
					   <td width="120px" >UID(Aadhar Card ID)</td>
					  <td align="left">:<input type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold; width:300px; line-height:9pt; height:15px;"   id="uid"  value="<?php echo $obj_patient->identificationnumber_c;  ?>" />
					  </td>
					  <td width="120px" align="center"><div style="padding-left:12px;"><input type="button" class="button" style="display:none;"  id="btnback" onclick="back()" value="Back" style="width:80px;height:20px;"/></div>
</td>
					  <td align="right">&nbsp;</td>
					</tr>
					<tr  class="bodytext">                
					  <td width="100px" >Name</td>
					  <td align="left">:<input  type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  id="firtsnm" value="<?php echo $obj_patient->Firstname_c.' '.$obj_patient->middlename_c.' '.$obj_patient->lastname_c;  ?>" />
					  </td> 
					</tr>
					<tr  class="bodytext">                 
					  <td width="100px" >Gender</td>
					  <td align="left">:<input  type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  id="selgender" value="<?= $obj_patient->gender_c?>" />
					  </td>
					</tr>
					
					<tr  class="bodytext">                 
					  <td width="100px">Date of Birth</td>
					   <td align="left">:<input type="text" id="dob" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"  value="<?php echo date('d-M-Y',strtotime($obj_patient->DOB_c)) ;  ?>" /> 
					  </td>				  
					</tr>
					<tr class="bodytext">
						<td width="100px">Blood Group</td>
						<td align="left">:<input type="text"    id="bloodgrp" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value="<?php echo $obj_patient->bloodgroup_c;  ?>" />
						</td>
					</tr>
						
					<tr  class="bodytext">                 
					  <td width="100px">Marital status</td>
					  <td align="left">:<input type="text"    id="maritalstatus" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value="<?php echo $obj_patient->maritalstatus_c;  ?>" />
					  </td>
					</tr>
					<tr  class="bodytext">                 
					 <td width="100px">Preferred Language</td> 
					  <td align="left">:<input type="text" id="preferedlanguage" readonly="readonly" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;"    value=" <?php echo $obj_patient->languages_c; ?>" />
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
						<tr><td style="width:1%;" >&nbsp;</td>
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
										
			</table></td></tr>
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
											<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Patient Allergies</td>
									</tr>
									<tr>
										<td>
					<div id="tabs-3" style="height:auto; align:left; padding-left:5px; ">
					<table align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif;">
					<tr class="bodytext" align="left" >
						<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>					
						</td>
						<td width="34%" height="30" class="bodytext_styleBlue" >Food Allergies</td>
						<td width="2%" height="30" class="bodytext_styleBlue">:</td>
						<td>
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
							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>					
						</td>
						<td width="34%" height="30" class="bodytext_styleBlue" >Drug Allergies</td>
						<td width="2%" height="30" class="bodytext_styleBlue">:</td>
						<td>					  
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
							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>					
						</td>
						<td width="34%" height="30" class="bodytext_styleBlue" >Plant Allergies</td>
						<td width="2%" height="30" class="bodytext_styleBlue">:</td>
						<td>
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
							<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>					
						</td>
						<td width="34%" height="30" class="bodytext_styleBlue" >Animal Allergies</td>
						<td width="2%" height="30" class="bodytext_styleBlue">:</td>
						<td>
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
								<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Food and Social Habits</td>
							 </tr>
							 <tr>
								<td style="padding-top:10px;">
									<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
									<tr>
										<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a></td>
										<td height="30" class="bodytext_styleBlue">Diet </td>
										<td height="30" class="bodytext_styleBlue">:</td>
										<td height="30" class="bodytext"><?= $patientinfo->diet_c?>										
										</td>
										<td height="30">&nbsp;</td>
										<td class="style12">&nbsp;</td>
									</tr>
									<tr>
										<td width="4%" height="30" align="center" valign="middle" style="padding-left:5px;">
											<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>				</td>
										<td width="14%" height="30" class="bodytext_styleBlue">Smoking </td>
										<td width="2%" height="30" class="bodytext_styleBlue">:</td>
										<td width="20%" height="30" class="bodytext"><?= $patientinfo->smoking_c?></td>
										<td height="30">&nbsp;</td>
										<td width="1%" class="style12">&nbsp;</td>
								  </tr>
								  <tr>
										<td height="30" align="center" valign="middle" style="padding-left:5px;">
											<a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a>				</td>
										<td height="30" class="bodytext_styleBlue">Alcohol </td>
										<td height="30" class="bodytext_styleBlue">:</td>
										<td height="30" class="bodytext"><?= $patientinfo->alcohol_c?>
															</td>
										<td height="30">&nbsp;</td>
										<td class="style12">&nbsp;</td>
								  </tr>
								  <tr>
									<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a></td>
									<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Tobacco</span></td>
									<td height="30" class="bodytext_styleBlue">:</td>
									<td height="30" class="bodytext"><?= $patientinfo->tobacco_c?></td>
									<td height="30">&nbsp;</td>
									<td class="style12">&nbsp;</td>
								  </tr>
								  <tr>
									<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a></td>
									<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Exercise</span></td>
									<td height="30" class="bodytext_styleBlue">:</td>
									<td height="30" class="bodytext"><?= $patientinfo->exercisepatterns_c?></td>
									<td height="30">&nbsp;</td>
									<td class="style12">&nbsp;</td>
								  </tr>
								  <tr>
									<td height="30" align="center" valign="middle" style="padding-left:5px;"><a href="#"><img src="/ayushman/assets/images/BlueArrow_Icon.png" width="11" height="7" border="0"></a></td>
									<td height="30" align="left" valign="top" class="bodytext_styleBlue" style="padding-top:5px;"><span class="bodytext_styleBlue" style="padding-top:5px;">Outdoor sports</span></td>
									<td height="30" class="bodytext_styleBlue">:</td>
									<td height="30" class="bodytext"><?= $patientinfo->outdoorsport_c?></td>
									<td height="30">&nbsp;</td>
									<td class="style12">&nbsp;</td>
								  </tr>
								</table>	</td>
							</tr>
							
							</table>
							</td></tr>
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
															<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_0" type="radio" value="0" onclick='clear_date("<?php echo $element['id'];?>_actual")'  disabled='disabled'>Don't know &nbsp;&nbsp;
														  	<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_1" type="radio" value="1"  disabled='disabled'>Yes &nbsp;&nbsp;
														  	<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_2" type="radio" value="2" onclick='clear_date("<?php echo $element['id'];?>_actual")' disabled='disabled'>No</td>
															<td rowspan="1" align="left" valign="middle" class="style11"><label class="style11" name="<?php echo $element['id'];?>_actual_date"  id="<?php echo $element['id'];?>_actual">&nbsp; <?php if ($element['date'])  echo $element['date'] ;?><label /></td>
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
													<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Know Medical Problems </td>
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
														   <td width="43%"><label name="<?php echo $ds?>remark" class="style11" type="text"  id="<?php echo $ds?>remark" size="60"><?php echo $array_remark[$i-1];$i++;?><label/></td>
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
													<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Major Illness &amp; Treament History</td>
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
								</table></td></tr>
							<tr>
							   <td align="center" valign="top">&nbsp;</td>
							</tr>
							<tr>
							   <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Operation / Surgical Procedures </td>
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
								</table></td></tr>
		         				
							<tr>
								<td align="center" valign="top">&nbsp;</td>
							</tr>
							 <tr>
							   <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Other Medical Observations  </td>
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
												<tr class="style11">
													<td height="28" align="left" valign="middle" bgcolor="#FFFFFF" class="style14" style="border-bottom:2px solid #0d6596; padding-left:10px;">Father</td>
													<td align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:10px;">
														<div style="display:block;" >
															<?php
																if(isset($array_relativeFather['birthyear']))
																{
																	echo (trim($array_relativeFather['birthyear']));
																} 
															?>
														</div>
														<select class="yearpicker" style="display:none;" ></select>
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<div>
															<?php 
																if(isset($array_relativeFather['medicalhistory']))
																	echo $array_relativeFather['medicalhistory']; 
															?>
														</div>
														<input type="text" class="textarea" size="52"  style="display:none;" />  
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="padding-top:3px" >
															<tr style="display:none;valign:middle">
																<td width="10%" >
																	<input type="text" class="textarea" size="2" placeholder="Age"/>
																</td>
																<td width="5%">&nbsp;
																</td>
																<td width="85%">
																	<input type="text" class="textarea" size="13" placeholder="Cause" />
																</td>
															</tr>
															<tr>
																<td width="10%" align="left" style="valign:middle;">
																	<div class="style11"  >
																		<?php
																			if(isset($array_relativeFather['deathage']))
																				echo $array_relativeFather['deathage'];
																		?>
																	</div>
																</td>
																<td width="5%" >&nbsp;
																</td>
																<td width="85%" align="left" valign="middle"  >
																	<div class="style11" >
																		<?php 
																			if(isset($array_relativeFather['deathcause']))
																				echo $array_relativeFather['deathcause']; 
																		?>
																	</div>
																</td>
															</tr>
														</table>	
													</td>
												
												</tr>
												<tr class="style11">
													<td height="28" align="left" valign="middle" bgcolor="#FFFFFF" class="style14" style="border-bottom:2px solid #0d6596; padding-left:10px;">Mother</td>
													<td align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:10px;">
														<div style="display:block;" >
															<?php
																if(isset($array_relativeMother['birthyear'])) 
																echo $array_relativeMother['birthyear']; 
															?> 
														</div>
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" style="border-bottom:2px solid #0d6596; padding-left:15px;">
														<div>
															<?php 
																if(isset($array_relativeMother['medicalhistory']))
																	echo $array_relativeMother['medicalhistory']; 
															?>
														</div>
														<input type="text" class="textarea" size="52"  style="display:none;" />  
													</td>
													<td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="style11" style="border-bottom:2px solid #0d6596; padding-left:15px; ">
														<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:3px" >
															<tr style="display:none;">
																<td width="10%" >
																	<input type="text" class="textarea" size="2" placeholder="age"/>
																</td>
																<td width="5%">&nbsp;
																</td>
																<td width="85%">
																	<input type="text" class="textarea" size="13" placeholder="Cause" />
																</td>
															</tr>
															<tr>
																<td width="10%" >
																	<div class="style11"  >
																		<?php 
																			if(isset($array_relativeMother['deathage']))
																			echo $array_relativeMother['deathage'];
																		?>
																	</div>
																</td>
																<td width="5%"  >&nbsp;
																</td>
																<td width="85%"  >
																	<div class="style11" >
																		<?php
																			if(isset($array_relativeMother['deathcause'])) 
																			echo $array_relativeMother['deathcause']; 
																		?>
																	</div>
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
		<tr>
			<td>
				<a id="displayTextVisit" href="javascript:toggle('toggleTextvisit','displayTextVisit','Visits');">
				<div  align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2">
						<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">Visits</label>
							<img src="/ayushman/assets/images/slidedown.gif"  style="float:right; height:10px; width:10px;vertical-align:center;padding-top:3px;border:none;"  />
				</div></a>
					<div id="toggleTextvisit" style="display: none">
						<table border="0" cellpadding="0" cellspacing="0" valign="top">
							<tr>
								<td style="width:1%;" ></td>
							</tr>
							<tr> 
								<td style="width:1%;" >&nbsp;</td>
								<td style="width:98%;">
						<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
							<script>
function cancelformatter(cellvalue, options, rowObject )
{
	str = "onclick=cancelpress('"+cellvalue+"');"
	return '<a href="#"'+str+' >Cancel</a>';
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
function openvisitreport(appointmentid,status)
{

	if(status== '0' )
	{
		window.location="/ayushman/cuploadpastvisit/showreport?appid="+appointmentid+"&back=cpatientemrtodoc&patientuserid="+<?= $obj_patient->id; ?>
	}
	else
	{
		window.location= "/ayushman/cpastreportbysystem/showreport?appid="+appointmentid+"&back=cpatientemrtodoc&patientuserid="+<?= $obj_patient->id; ?>
	}
}
function visitsummaryformatter(cellvalue, options, rowObject ){
	var status = $(rowObject).children()[11].firstChild.data;var value=1;
	if(status.toLowerCase() == 'notfromsystem' )
	 {
	 	value=0;
	 	if($(rowObject).children()[12].firstChild.data == "Informationnotyetfilled")
	 	{
	 		return "Not yet filled"
	 	}
	 	else
	 	{
	 		return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');" ><font color="#220CE6">Prescription</font></a>';
	 	}

	 }
	 else
	{
		value=1;
		return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');" ><font color="#220CE6">Visit summary</font></a>';
	}

}

function modeformatter(cellvalue, options, rowObject ){
	var status= $(rowObject).children()[11].firstChild.data;
	if(status.toLowerCase() == 'notfromsystem')
		return 'Archive';
	else
		return 'Video';
}
function openvisitsummary(appointmentid,status)
{
	if(status== '0' )
	{
		window.open("/ayushman/cdisplayprescriptions/view?appid="+appointmentid,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
	}
	else
	{
		$.ajax({  
				url: "/ayushman/cemr/getvisitsummarypdf?appid="+appointmentid,
				success: function(data) { 	
					if(data == '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
						window.open("/ayushman/"+data,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
				}
			});  
	}
}
function cancelpress(cellvalue){
	$.ajax({  
 			type: "POST",  
  			url: "/ayushman/cappointmenteditor/cancelappointment?appid="+cellvalue+"&role=patient",
  			success: function(data) { 	
  			alert(data);
  				window.location.reload();
  			}
		});  
}
</script>
									<?php
								
								//this is emr grid for patient we can put this in other page
 								$userid =  $obj_patient->id;
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
												{"name":"Prescription","index":"id","width":80,"align":"center","formatter":visitsummaryformatter},
												{"name":"Report","index":"id","width":80,"align":"center","formatter":visitreportformatter},
												{"name":"status","index":"status","hidden":true},
												{"name":"archiveprescriptionpath","index":"archiveprescriptionpath","hidden":true},
												{"name":"reportpath","index":"reportpath","hidden":true}
												]';			
								$patjqgridrequest->post('columninfo', $columninfo);
								//if save,edit,delete we dont want in jqgrid set it to false
								$patjqgridrequest->post('editbtnenable','false');
								$patjqgridrequest->post('deletebtnenable','false');
								$patjqgridrequest->post('savebtnenable','false');
								echo $patjqgridrequest->execute(); ?>
								</td>
							</tr>
						</table>
					</td>
					<td style="width:1%;" >&nbsp;</td>
				</tr>
			</table></div>
	
			</td>
			</tr>
		<tr>
			<td>
				&nbsp;
			</td>
			</tr>
		<tr>
			<td>
				<a id="displayTextreports" href="javascript:toggle('toggleTextreports','displayTextreports','Reports');"><div  align="left"  style="background: none repeat scroll 0 0 #B6B6B6;font-size: 9pt;font-weight: bold;height: 9pt;padding-bottom: 7px;padding-left:5px;padding-top: 0;width: 95%;"  class="bodytext style2">
						<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">Reports</label><img src="/ayushman/assets/images/slidedown.gif"  style="float:right; height:10px; width:10px;vertical-align:center;padding-top:3px;border:none;"  />
				</div></a>
				<div id="toggleTextreports" style="display: none">
				<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
				<tr>
					<td > 
	
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
						<?php
						//this is emr grid for patient we can put this in other page
						$tests= Request::factory('xjqgridcomponent/index');
						$tests->post('name','tests');
						$tests->post('height','220');
						$tests->post('width','790');
						$tests->post('sortname','date');
						$tests->post('sortorder','asc');
						$tests->post('tablename','completedtest');//used for jqgrid
						$tests->post('columnnames', 'doctorname,pathologistname,requisitionno,tests,status,status,deliverydate,patientid,appid');//used for jqgrid
						$tests->post('whereclause',"[patientsuserid,=,".$obj_patient->id."]");//used for jqgrid
						$columninfo = 	'[
											{"name":"Doctor Name","index":"doctorname","width":80,"editable":false},
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