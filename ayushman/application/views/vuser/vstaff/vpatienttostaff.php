<div id="body_contantpatientpage" style="width:828px; height:auto;">
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
			
			  <td width="99%" class="bodyheading">Demographic
						</td>
					</div>
				
			
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
									
										
			</table></td></tr>
			</table>
			</div>
	
	
			</td>
			</tr>