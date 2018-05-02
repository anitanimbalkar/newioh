<link type="text/css" href="/ayushman/assets/css/style.css" rel="stylesheet" media="screen" />
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
			$( "input[name=qualifieddoctorlicencevalidtill_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		}
	);
	
	$(document).ready
	(
		function()
		{
			for (i = new Date().getFullYear(); i > 1947; i--)
			{
			    $('#qualifieddoctoryearofpassing').append($('<option />').val(i).html(i));
			}
			
			var nameofcenter = new LiveValidation('nameofcenter',{onlyOnSubmit: true });
			nameofcenter.add( Validate.Presence );
			
			var phonework = new LiveValidation('phonework', {onlyOnSubmit: true });
			phonework.add( Validate.Presence );
			phonework.add( Validate.Numericality, {onlyInteger: true } );
			phonework.add( Validate.Length, { is: 10 });
			
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
			
			// Following code is commented because Pankaj Sir wanted it not to be mandatory for healthberry registration.
			/*var shopactlicence = new LiveValidation('shopactlicence', {onlyOnSubmit: true });
			shopactlicence.add( Validate.Presence );
			
			var medicalactlicencevaliddate = new LiveValidation('medicalactlicencevaliddate', {onlyOnSubmit: true });
			medicalactlicencevaliddate.add( Validate.Presence );
			
			var fdalicence = new LiveValidation('fdalicence', {onlyOnSubmit: true });
			fdalicence.add( Validate.Presence );
			
			var fadlicencedatetill = new LiveValidation('fadlicencedatetill', {onlyOnSubmit: true });
			fadlicencedatetill.add( Validate.Presence );*/
			
			var qualifieddoctorfirtsname = new LiveValidation('qualifieddoctorfirtsname',{onlyOnSubmit: true });
			qualifieddoctorfirtsname.add( Validate.Presence );
			qualifieddoctorfirtsname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/ } );
			
			var qualifieddoctorlastname = new LiveValidation('qualifieddoctorlastname',{onlyOnSubmit: true });
			qualifieddoctorlastname.add( Validate.Presence );
			qualifieddoctorlastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/ } );
			
			var qualifieddoctormobilenumber = new LiveValidation('qualifieddoctormobilenumber',{onlyOnSubmit: true });
			qualifieddoctormobilenumber.add( Validate.Presence );
			qualifieddoctormobilenumber.add( Validate.Numericality, {onlyInteger: true } );
			qualifieddoctormobilenumber.add( Validate.Length, { is: 10 });
			
			var qualifieddoctoremailid = new LiveValidation('qualifieddoctoremailid', {onlyOnSubmit: true });
			qualifieddoctoremailid.add( Validate.Presence );
			qualifieddoctoremailid.add( Validate.Email );
			
			
			var qualifieddoctorqualification = new LiveValidation('qualifieddoctorqualification',{onlyOnSubmit: true });
			qualifieddoctorqualification.add( Validate.Presence );
			
			var registerqualifieddoctornumber = new LiveValidation('registerqualifieddoctornumber', {onlyOnSubmit: true });
			registerqualifieddoctornumber.add( Validate.Presence );
			
			var qualifieddoctorlicencevalidtill = new LiveValidation('qualifieddoctorlicencevalidtill', {onlyOnSubmit: true });
			qualifieddoctorlicencevalidtill.add( Validate.Presence );
			
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
			setisdcode(document.getElementById('doctorcountry'),'qualifieddoctorisdmobilenumber_c','qualifieddoctorisdmobilenumber_c');
		}	
	);
	
	function toggleDoctorView()
	{
		if($('#sameDoctor').attr("checked") == "checked")
		{
			$('#dFirstName').hide();
			$('#dLastName').hide();
			$('#dContact').hide();
			$('#qualifieddoctorfirtsname').attr("value","Ex");
			$('#qualifieddoctorlastname').attr("value","Ex");
			$('#qualifieddoctormobilenumber').attr("value","9999999999");
			$('#qualifieddoctoremailid').attr("value","example@example.com");
			
		}
		else
		{
			$('#dFirstName').show();
			$('#dLastName').show();
			$('#dContact').show();
			$('#qualifieddoctorfirtsname').attr("value","");
			$('#qualifieddoctorlastname').attr("value","");
			$('#qualifieddoctormobilenumber').attr("value","");
			$('#qualifieddoctoremailid').attr("value","");
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

<div  id="divpatheditprofile" class="panel activateformdiv" style=" max-width:1024px; height:auto;overflow:auto;border:1px solid #284889;" align="center" > 
	<form class="cmxform" id="patheditprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/cpathologistregistrationform/submit">	
		<input type="hidden" name="userid" value="<?php echo $objuser->id; ?>">
		<table id="pathprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
			<tr>
				<td colspan="4" class="formHeader">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Registration</td>
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
				<td width="9%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Centre Name*:</td>
				<td width="35%" align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="nameofcenter" name="nameofcenter_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td width="13%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">&nbsp;</td>
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
				<td width="19%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Centre Contact No.* :</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="isdphonework" style="width:30px;border:none;float:left;" type="text"  class="textarea" name="isdphonework"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdphonework'); ?>"  maxlength="4" readonly="true"/>
					<input type="text" id="phonework" style="width:258px;float:left;" name="phonework" class="form-control regnformcontrol" maxlength="10"/>
				</td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Additional Contact No.:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="isdemergencynumber_c" style="width:30px;border:none;float:left;" type="text"  class="textarea" name="isdemergencynumber_c"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdemergencynumber_c'); ?>"  maxlength="4" readonly="true"/>
					<input type="text" id="emergencynumber" style="width:219px;float:right;"  name="emergencynumber_c" class="form-control regnformcontrol" maxlength="10"/>
				</td>
			</tr>
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td colspan="4" class="formHeader">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Center Registration Details</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Shop Act License No.*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="shopactlicence" name="shopactlicence_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Shop Act License Valid Till*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input readonly="readonly" name="medicalactlicencevaliddate_c" id="medicalactlicencevaliddate" type="text" class="form-control regnformcontrol" /></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">FDA Licence No.*</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"   id="fdalicence" name="fdalicence_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">FDA Licence Valid Till*</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input readonly="readonly" name="fadlicencedatetill_c" id="fadlicencedatetill" type="text" class="form-control regnformcontrol"/></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			 
			<tr>
				<td colspan="4" class="formHeader">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Doctor's Details</td>
			</tr>
			
			<tr>
				<td colspan="4" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal"><input id="sameDoctor" name="sameDoctor" type="checkbox" onchange='toggleDoctorView();'/>&nbsp;&nbsp;&nbsp;Check if Doctor details and User details are same.</td>
			</tr>
			
			<tr id="dFirstName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">First Name*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" class="form-control regnformcontrol" id="qualifieddoctorfirtsname" name="qualifieddoctorfirtsname_c" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Middle Name:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="qualifieddoctormiddlename" name="qualifieddoctormiddlename_c" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr id="dLastName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Last Name*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="qualifieddoctorlastname"  class="form-control regnformcontrol" name="qualifieddoctorlastname_c" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Email Id*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input id="qualifieddoctoremailid" name="qualifieddoctoremailid_c" type="text" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr id="dContact">
				
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Country *:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<select name="doctorcountry_c" class="textarea gray"  onchange="setisdcode(document.getElementById('doctorcountry'),'qualifieddoctorisdmobilenumber_c','qualifieddoctorisdmobilenumber_c');" tabindex="5" id="doctorcountry" style="width:125px;"> 
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
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Contact No.*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal">
					<input id="qualifieddoctorisdmobilenumber_c" style="width:30px;border:none;float:left;" type="text"  class="textarea" name="qualifieddoctorisdmobilenumber_c"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'qualifieddoctorisdmobilenumber_c'); ?>"  maxlength="4" readonly="true"/>
					<input id="qualifieddoctormobilenumber" style="width:219px;float:left;" name="qualifieddoctormobilenumber_c" class="form-control regnformcontrol" type="text" value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'qualifieddoctormobilenumber_c'); ?>" maxlength="10"/>
				</td>
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Qualification*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text"   id="qualifieddoctorqualification" name="qualifieddoctorqualification_c" type="text" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Year of Passing*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><select class="form-control regnformcontrol" name="qualifieddoctoryearofpassing_c" id="qualifieddoctoryearofpassing"></select></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registration No.*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="registerqualifieddoctornumber" name="registerqualifieddoctornumber_c" class="form-control regnformcontrol" maxlength="45"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registration Valid Till.*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input readonly="readonly" name="qualifieddoctorlicencevalidtill_c" id="qualifieddoctorlicencevalidtill" type="text" class="form-control regnformcontrol" /></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registering Authority*:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><input type="text" id="registeringauthorityname" name="registeringauthorityname_c" class="form-control regnformcontrol" maxlength="45"/></td>
			</tr>
			
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr align="left">
				<td align="left" style="padding-left:10px; padding-top:6px"><input align="left" type="submit" class="regnbutton" height="22" style="width: 150px; height: 25px; " value="Send Data for Validation"/></td>
			</tr>

			<tr><td colspan="4">&nbsp;</td></tr>
		</table>
	</form>
</div>
   
   