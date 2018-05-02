<link type="text/css" href="/ayushman/assets/css/style2.css" rel="stylesheet" media="screen" />
<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" rel="stylesheet" media="screen" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script> 

<script type="text/javascript">
	
	$
	(
		function()
		{
			$( "input[name=medicalactlicencevaliddate_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			$( "input[name=fadlicencedatetill_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			$( "input[name=pharmacistlicencevalidtill_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		}
	);
	
	$(document).ready
	(
		function()
		{
			for (i = new Date().getFullYear(); i > 1947; i--)
			{
			    $('#yearofpassing').append($('<option />').val(i).html(i));
			}
			
			var nameofmedical = new LiveValidation('nameofmedical',{onlyOnSubmit: true });
			nameofmedical.add( Validate.Presence );
			
			var phonework = new LiveValidation('phonework', {onlyOnSubmit: true });
			phonework.add( Validate.Presence );
			phonework.add( Validate.Numericality, {onlyInteger: true } );
			phonework.add( Validate.Length, { is: 10 });
			
			var emergencynumber = new LiveValidation('emergencynumber', {onlyOnSubmit: true });
			emergencynumber.add( Validate.Numericality, {onlyInteger: true } );
			emergencynumber.add( Validate.Length, { is: 10 });
			
			var line1 = new LiveValidation('line1',{onlyOnSubmit: true });
			line1.add( Validate.Presence );
			
			var country = new LiveValidation('country',{onlyOnSubmit: true });
			country.add( Validate.Presence );
			
			var state = new LiveValidation('state',{onlyOnSubmit: true });
			state.add( Validate.Presence );
			
			var city = new LiveValidation('city',{onlyOnSubmit: true });
			city.add( Validate.Presence );
			
			var pin = new LiveValidation('pin', {onlyOnSubmit: true });
			pin.add( Validate.Presence );
			pin.add( Validate.Numericality, {onlyInteger: true } );
			
			var shopactlicence = new LiveValidation('shopactlicence', {onlyOnSubmit: true });
			shopactlicence.add( Validate.Presence );
			
			var medicalactlicencevaliddate = new LiveValidation('medicalactlicencevaliddate', {onlyOnSubmit: true });
			medicalactlicencevaliddate.add( Validate.Presence );
			
			var fdalicence = new LiveValidation('fdalicence', {onlyOnSubmit: true });
			fdalicence.add( Validate.Presence );
			
			var fadlicencedatetill = new LiveValidation('fadlicencedatetill', {onlyOnSubmit: true });
			fadlicencedatetill.add( Validate.Presence );
			
			var pharmacistfirtsname = new LiveValidation('pharmacistfirtsname',{onlyOnSubmit: true });
			pharmacistfirtsname.add( Validate.Presence );
			pharmacistfirtsname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/ } );
			
			var pharmacistlastname = new LiveValidation('pharmacistlastname',{onlyOnSubmit: true });
			pharmacistlastname.add( Validate.Presence );
			pharmacistlastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/ } );
			
			var pharmacistmobilenumber = new LiveValidation('pharmacistmobilenumber',{onlyOnSubmit: true });
			pharmacistmobilenumber.add( Validate.Presence );
			pharmacistmobilenumber.add( Validate.Numericality, {onlyInteger: true } );
			pharmacistmobilenumber.add( Validate.Length, { is: 10 });
			
			var pharmacistemailid = new LiveValidation('pharmacistemailid', {onlyOnSubmit: true });
			pharmacistemailid.add( Validate.Presence );
			pharmacistemailid.add( Validate.Email );
			
			
			var qualification = new LiveValidation('qualification',{onlyOnSubmit: true });
			qualification.add( Validate.Presence );
			
			var registerpharmacistnumber = new LiveValidation('registerpharmacistnumber', {onlyOnSubmit: true });
			registerpharmacistnumber.add( Validate.Presence );
			
			var pharmacistlicencevalidtill = new LiveValidation('pharmacistlicencevalidtill', {onlyOnSubmit: true });
			pharmacistlicencevalidtill.add( Validate.Presence );
			
			var registeringauthorityname = new LiveValidation('registeringauthorityname', {onlyOnSubmit: true });
			registeringauthorityname.add( Validate.Presence );
			
			$('#city').focus(function(){
			var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("state").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and city_c";
			$("#city").autocomplete({source: urlcity});
			});
			$('#state').focus(function(){
			   var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and state_c";
				$("#state").autocomplete({source: urlstate});
			});
			$('#country').focus(function(){
			   var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and country_c";
				$("#country").autocomplete({source: urlcountry});
			});
			$('#location').focus(function(){
			   var urlloc= "/ayushman/cautocompleter/autocomplete?column=locality_c&query=select  distinct locality_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (country_c like '"+document.getElementById("country").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and locality_c";
				$("#location").autocomplete({source: urlloc});
			});
			$('#pin').focus(function(){
			   var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and pincode_c";
				$("#pin").autocomplete({source:urlpin});
			});
			setisdcode(document.getElementById('country'),'isdphonework','isdemergencynumber_c');
			setisdcode(document.getElementById('pharmacistcountry'),'pharmacistisdmobilenumber_c','pharmacistisdmobilenumber_c');
		}	
	);
	
	function togglePharmacistView()
	{
		if($('#samePharmacist').attr("checked") == "checked")
		{
			$('#pFirstName').hide();
			$('#pLastName').hide();
			$('#pContact').hide();
			$('#pharmacistfirtsname').attr("value","Ex");
			$('#pharmacistlastname').attr("value","Ex");
			$('#pharmacistmobilenumber').attr("value","9999999999");
			$('#pharmacistemailid').attr("value","example@example.com");
			
		}
		else
		{
			$('#pFirstName').show();
			$('#pLastName').show();
			$('#pContact').show();
			$('#pharmacistfirtsname').attr("value","");
			$('#pharmacistlastname').attr("value","");
			$('#pharmacistmobilenumber').attr("value","");
			$('#pharmacistemailid').attr("value","");
		}
	}
	function checkPhoneNumber(userphonenumber,dropdown)
	{
		var countryCode = document.getElementById(dropdown);
		var countryCodeValue = countryCode.options[countryCode.selectedIndex].value;
		if(countryCodeValue !="")
		{
			document.getElementById("defaultCountry").value = countryCodeValue;
			document.getElementById("phoneNumber").value = userphonenumber.value;
			phoneNumberParser();
			var a  = document.getElementById("output").value;
			if (a.indexOf('Result from isValidNumber(): true') > -1) {
		  		//correct phone number
			} 
			else
			{
				if( userphonenumber.value != "")
		  		{
					//alert(document.getElementById("output").value);
					alert("Please enter valid contact number");
		 	 		userphonenumber.focus();
				}
			}	
		}
		else{
			alert("please select country")
		}
	}
	function setisdcode(country,phoneid,mobileid)
	{
		var count = country.selectedIndex-1;
		<?php $allcountries = json_encode($objcountries); echo "var javascript_array = ". $allcountries . ";\n"; ?>
		document.getElementById(phoneid).value ='+'+javascript_array[count].isd;
		document.getElementById(mobileid).value ='+'+javascript_array[count].isd;
	}
</script>

<div  id="divchemisteditprofile" class="panel activateformdiv" style="max-width:1024px; height: auto;overflow:auto;border:1px solid #284889;" align="center" > 
	<form class="cmxform" id="chemisteditprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/cchemistregistrationform/submit">	
		<input type="hidden" name="userid" value="<?php echo $objuser->id; ?>">
		<table id="chemistprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
    		
			<tr>
				<td class="formHeader" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Registration</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Name :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
					<?php echo $objuser->Firstname_c; ?>
					<?php echo $objuser->middlename_c; ?>
					<?php echo $objuser->lastname_c; ?>
				</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">IndiaOnlineHealth Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objuser->id; ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Email Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objuser->email; ?></td>
			</tr>
			
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
    		
			<tr>
				<td width="9%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Store Name* :</td>
				<td width="38%" align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"   id="nameofmedical" name="nameofmedical_c"  class="form-control regnformcontrol" maxlength="45"/></td>
				<td width="20%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">&nbsp;</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">&nbsp;</td>
			</tr> 
					
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Address Line 1*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" name="line1_c" id="line1" class="form-control regnformcontrol" maxlength="400"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Landmark:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="nearlandmark" name="nearlandmark_c" class="form-control regnformcontrol" maxlength="100"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Country*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<select name="country_c" class="form-control regnformcontrol"  onchange="setisdcode(this,'isdphonework','isdemergencynumber_c');" tabindex="5" id="country" style="width:125px;"> 
						<option value="" disabled>* select Country</option>
						<?PHP  
							for ($i=0;$i<count($objcountries);$i++) {	
								if($objcountries[$i]["countrycode_c"] == '91'){
									print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\" selected>{$objcountries[$i]["country_c"]}</option>";
								}else{
									print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\">{$objcountries[$i]["country_c"]}</option>";
								}
							} 
						?>
					</select>
				</td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">State*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"  name="state_c"  id="state" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">City*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="city" name="city_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Locality:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" name="location_c" id="location" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Pin Code*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" name="pin_c" id="pin" class="form-control regnformcontrol" maxlength="10"/></td>
			</tr>
			<tr>
				<td width="19%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Store Contact No.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="isdphonework" style="width:30px;border:none;float:left;" type="text"  class="textarea" style="" name="isdphonework"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdphonework'); ?>"  maxlength="4" readonly /> 
					<input type="text" id="phonework" style="width:222px;float:left;" name="phonework" class="form-control regnformcontrol" maxlength="10"/>
				</td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Additional Contact No.:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="isdemergencynumber_c" style="width:30px;border:none;float:left;" type="text"  class="textarea" name="isdemergencynumber_c"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdemergencynumber_c'); ?>"  maxlength="4" readonly="true"/> 
					<input type="text" id="emergencynumber" style="width:219px;float:left;"  name="emergencynumber_c" class="form-control regnformcontrol" maxlength="10"/>
				</td>
			</tr>
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td colspan="4" class="formHeader">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Store Registration Details</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Shop Act License No.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"   id="shopactlicence" name="shopactlicence_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Shop Act License Valid Till.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input name="medicalactlicencevaliddate_c" id="medicalactlicencevaliddate" readonly="readonly" type="text" class="form-control regnformcontrol" /></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">FDA License No.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"   id="fdalicence" name="fdalicence_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">FDA License Valid Till.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input name="fadlicencedatetill_c" id="fadlicencedatetill" readonly="readonly" type="text" class="form-control regnformcontrol"/></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>Details of Pharmacist</td>
			</tr>
			
			<tr>
				<td colspan="4" align="left" style="padding-left:5px;padding-top:6px" class="bodytext_normal"><input id="samePharmacist" name="samePharmacist" type="checkbox" onchange='togglePharmacistView();'/>&nbsp;&nbsp;&nbsp;Check if Pharmacist details and User details are same.</td>
			</tr>
			
			<tr id="pFirstName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">First Name* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input  type="text" class="form-control regnformcontrol" id="pharmacistfirtsname" name="pharmacistfirtsname_c" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Middle Name :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="pharmacistmiddlename"  name="pharmacistmiddlename_c" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr id="pLastName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Last Name* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="pharmacistlastname"  class="form-control regnformcontrol" name="pharmacistlastname_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Email Id* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input id="pharmacistemailid" name="pharmacistemailid_c" type="text" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr id="pContact">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Country * :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<select name="pharmacistcountry_c" class="form-control regnformcontrol"  onchange="setisdcode(document.getElementById('pharmacistcountry'),'pharmacistisdmobilenumber_c','pharmacistisdmobilenumber_c');" tabindex="5" id="pharmacistcountry" style="width:125px;"> 
						<option value="" disabled>* select Country</option>
						<?PHP  
							for ($i=0;$i<count($objcountries);$i++) {	
								if($objcountries[$i]["countrycode_c"] == '91'){
									print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\" selected>{$objcountries[$i]["country_c"]}</option>";
								}else{
									print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\">{$objcountries[$i]["country_c"]}</option>";
								}
							} 
						?>
					</select>
				</td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Contact No. * :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="pharmacistisdmobilenumber_c" style="width:30px;border:none;float:left;" type="text"  class="textarea" name="pharmacistisdmobilenumber_c"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'pharmacistisdmobilenumber_c'); ?>"  maxlength="4" readonly="true"/>
					<input id="pharmacistmobilenumber" style="width:219px;float:left;" name="pharmacistmobilenumber_c" class="form-control regnformcontrol" type="text" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'qualifieddoctormobilenumber_c'); ?>" maxlength="10"/>
				</td>
				
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
    		
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Qualification* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="qualification" name="qualification_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Year of Passing* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><select class="form-control regnformcontrol" name="yearofpassing_c" id="yearofpassing"></select></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registration No.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="registerpharmacistnumber" name="registerpharmacistnumber_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registration Valid Till* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input id="pharmacistlicencevalidtill" name="pharmacistlicencevalidtill_c" readonly="readonly" type="text" class="form-control regnformcontrol" /></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registering Authority* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="registeringauthorityname" name="registeringauthorityname_c" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr align="left">
				<td align="left" style="padding-left:10px; padding-top:6px"><input align="left" type="submit" class="regnbutton" height="22" style="width: 150px; height: 25px; " value="Send Data for Validation"/></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
	</table>
	</form>
</div>