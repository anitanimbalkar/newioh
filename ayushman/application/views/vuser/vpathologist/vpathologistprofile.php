<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/jquery.ui.timepicker.js"></script>
<script src="/ayushman/assets/js/jquery.ui.tabs.min.js"></script>
<script src="/ayushman/assets/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<link type="text/css" href="/ayushman/assets/css/style.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="/ayushman/assets/js/isd/base.js"></script>
<script>
  goog.require('goog.proto2.Message');
</script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonemetadata.pb.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonenumber.pb.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/metadata.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonenumberutil.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/asyoutypeformatter.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/demo.js"></script>
<script type="text/javascript">

	$
	(
		function()
		{
			$( "input[name=medicalactlicencevaliddate_c]" ).datepicker({yearRange: "-140:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd-mm-yy'});
			$( "input[name=fadlicencedatetill_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd-mm-yy'});
			$( "input[name=qualifieddoctorlicencevalidtill_c]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd-mm-yy'});
		}
	);
	
	$(document).ready
	(
		function()
		{
			resize();
			dropdown = document.getElementById("country");
			itemToSelect = "<?php echo $address->country_c; ?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].text == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}
			
			
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			if($.trim($('#messagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			
			arr = <?php echo json_encode($arrpathologisttypeoftest)?>;
			for (var i in arr)
			{
				document.getElementById("checkbox"+arr[i]).checked= true;
			}
			$('#weeklyoffday').attr('value',"<?php echo $pathologist->weeklyoffday_c; ?>");
			for (i = new Date().getFullYear(); i > 1947; i--)
			{
			    $('#qualifieddoctoryearofpassing').append($('<option />').val(i).html(i));
			}
			if('<?php echo $pathologist->issameasuser_c?>' == '1')
			{
				$('#sameDoctor').attr("checked","checked");
				$('#dFirstName').hide();
				$('#dLastName').hide();
				$('#dContact').hide();
			}
			else
			{
				$('#dFirstName').show();
				$('#dLastName').show();
				$('#dContact').show();
			}
			if('<?php echo $pathologist->pickupfacility_c?>' == 'true')
			{
				$('#pickupfacility').attr("checked","checked");
			}
			if('<?php echo $pathologist->homedeliveryfacility_c ?>' == 'true')
			{
				$('#homedeliveryfacility').attr("checked","checked");
			}
			toggledelivery();
			
			$('#floating_timepicker').timepicker({
		        onSelect: function(time, inst) {
		            $('#floating_selected_time').html('You selected ' + time);
		        }
		    });
			$('.timepicker_noPeriodLabels').timepicker({
			    showPeriodLabels: false
			});
			
			var Firstname = new LiveValidation('Firstname', {onlyOnSubmit: true });
			Firstname.add( Validate.Presence );
			Firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
			
			var middlename = new LiveValidation('middlename', {onlyOnSubmit: true });
			middlename.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
			
			var lastname = new LiveValidation('lastname', {onlyOnSubmit: true });
			lastname.add( Validate.Presence );
			lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
			
			var nameofcenter = new LiveValidation('nameofcenter',{onlyOnSubmit: true });
			nameofcenter.add( Validate.Presence );
			
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
			
			
			var timetakeforhomedelivery = new LiveValidation('timetakeforhomedelivery', {onlyOnSubmit: true });
			timetakeforhomedelivery.add( Validate.Numericality, {onlyInteger: true } );
			
			var shopactlicence = new LiveValidation('shopactlicence', {onlyOnSubmit: true });
			shopactlicence.add( Validate.Presence );
			
			var medicalactlicencevaliddate = new LiveValidation('medicalactlicencevaliddate', {onlyOnSubmit: true });
			medicalactlicencevaliddate.add( Validate.Presence );
			
			var fdalicence = new LiveValidation('fdalicence', {onlyOnSubmit: true });
			fdalicence.add( Validate.Presence );
			
			var fadlicencedatetill = new LiveValidation('fadlicencedatetill', {onlyOnSubmit: true });
			fadlicencedatetill.add( Validate.Presence );
			
			var qualifieddoctorfirtsname = new LiveValidation('qualifieddoctorfirtsname',{onlyOnSubmit: true });
			qualifieddoctorfirtsname.add( Validate.Presence );
			qualifieddoctorfirtsname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var qualifieddoctormiddlename = new LiveValidation('qualifieddoctormiddlename',{onlyOnSubmit: true });
			qualifieddoctormiddlename.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var qualifieddoctorlastname = new LiveValidation('qualifieddoctorlastname',{onlyOnSubmit: true });
			qualifieddoctorlastname.add( Validate.Presence );
			qualifieddoctorlastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var qualifieddoctormobilenumber = new LiveValidation('qualifieddoctormobilenumber',{onlyOnSubmit: true });
			qualifieddoctormobilenumber.add( Validate.Presence );
			qualifieddoctormobilenumber.add( Validate.Numericality, {onlyInteger: true } );
			qualifieddoctormobilenumber.add( Validate.Length, { is: 10 });
			
			var qualifieddoctoremailid = new LiveValidation('qualifieddoctoremailid', {onlyOnSubmit: true });
			qualifieddoctoremailid.add( Validate.Presence );
			qualifieddoctoremailid.add( Validate.Email );
			
			var uid = new LiveValidation('uid', {onlyOnSubmit: true });
			uid.add( Validate.Numericality, {onlyInteger: true } );
			uid.add( Validate.Length, { is: 12 });
			
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
			
			var mobileno1_c = new LiveValidation('mobileno1_c', {onlyOnSubmit: true });
			mobileno1_c.add( Validate.Presence);
			mobileno1_c.add( Validate.Numericality, {onlyInteger: true } );
			mobileno1_c.add( Validate.Length, { is: 10 });
			
			var email = new LiveValidation('email', {onlyOnSubmit: true });
			email.add( Validate.Presence);
			email.add( Validate.Email );
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
	
	function toggledelivery()
	{
		if($('#homedeliveryfacility').attr("checked") == "checked")
		{
			$('#delivery').show();
		}
		else
		{
			$('#delivery').hide();
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

<div  id="divpatheditprofile" class="content_bg" style=" width:828px;padding-top:3px; height:920px;" align="center" > 
	<form class="cmxform" id="patheditprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/cpathologistprofile/update">	
		<input type="hidden" name="userid" value="<?php echo $objuser->id; ?>">
		<table id="pathprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:0px;padding-right:2px;padding-top:0px">
			<tr>
				<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Profile</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">IOH Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objuser->id; ?></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">uid :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"   id="uid" name="uid"  class="textarea" value="<?php echo $objuser->uid; ?>" maxlength="45"/></td>
			</tr>
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Contact Number* :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objuser->isdmobileno1_c.'-'?><input type="text" id="mobileno1_c" name="mobileno1_c"  class="textarea" value="<?php echo $objuser->mobileno1_c; ?>" maxlength="10"/></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Email Id* :</td>
				<td align="left" style="padding-left:1px; padding-top:10px" class="bodytext_normal"><input type="text" id="email" name="email"  class="textarea" value="<?php echo $objuser->email; ?>" maxlength="45"/></td>
			</tr>
			
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">First Name* :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"   id="Firstname" name="Firstname_c"  class="textarea" value="<?php echo $objuser->Firstname_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Middle Name :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="middlename" name="middlename_c" class="textarea" value="<?php echo $objuser->middlename_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Last Name* :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"   id="lastname" name="lastname_c"  class="textarea" value="<?php echo $objuser->lastname_c; ?>" maxlength="45"/></td>
				
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr>
				<td width="16%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Centre Name*:</td>
				<td width="35%" align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="nameofcenter" name="nameofcenter_c" class="textarea" value="<?php echo $pathologist->nameofcenter_c;?>" maxlength="45"/></td>
				<td width="19%" align="left" style="padding-top:6px" class="bodytext_normal">&nbsp;</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">&nbsp;</td>
			</tr>
	
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Address Line 1*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="line1_c" id="line1" class="textarea" value="<?php echo $address->line1_c; ?>" maxlength="400"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Landmark:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="nearlandmark" name="nearlandmark_c" class="textarea" value="<?php echo $address->nearlandmark_c; ?>" maxlength="100"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Country*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><!--<input  type="text" name="country_c" id="country" class="textarea" value="<?php echo $address->country_c; ?>" maxlength="45"/>-->
					<select name="country_c" class="textarea"  id="country" onchange="setisdcode(this,'isdphonenowork','isdemergencynumber');" style="width:126px;"> 
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
				<td align="left" style="padding-top:6px" class="bodytext_normal">State*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"  name="state_c"  id="state" class="textarea" value="<?php echo $address->state_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">City*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="city" name="city_c" class="textarea" value="<?php echo $address->city_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Locality:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="location_c" id="location" class="textarea" value="<?php echo $address->location_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Pin Code*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="pin_c" id="pin" class="textarea" value="<?php echo $address->pin_c; ?>" maxlength="45"/></td>
			</tr>
			
			
			<tr>
				<td  align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Centre Contact No.*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input id="isdphonenowork" style="width:27px" type="text"  class="textarea" name="isdphonenowork_c"  value="<?php echo $objuser->isdphonenowork_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input type="text" style="width:88px;" id="phonework" name="phonework" class="textarea" value="<?php echo $objuser->phonenowork_c; ?>" onblur="checkPhoneNumber(this,'country')"  maxlength="10"/></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Additional Contact No.:</td>
				<td align="left" colspan="2" style="padding-top:6px" class="bodytext_normal"><input id="isdemergencynumber" style="width:30px" type="text"  class="textarea" name="isdemergencynumber_c"  value="<?php echo $pathologist->isdemergencynumber_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input type="text" id="emergencynumber" name="emergencynumber_c" class="textarea" value="<?php echo $pathologist->emergencynumber_c; ?>" onblur="checkPhoneNumber(this,'country')"  maxlength="10"/></td>
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Working Hours From* :</td>
		  		<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="workinghoursfrom_c" id="workinghoursfrom" class="timepicker_noPeriodLabels" value="<?php echo $pathologist->workinghoursfrom_c; ?>"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">To* :</td>
		  		<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="workinghoursto_c" id="workinghoursto" class="timepicker_noPeriodLabels" value="<?php echo $pathologist->workinghoursto_c; ?>"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Break Time From* :</td>
		  		<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="breaktimefrom_c" id="breaktimefrom" class="timepicker_noPeriodLabels" value="<?php echo $pathologist->breaktimefrom_c; ?>"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">To* :</td>
		  		<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="breaktimeto_c" id="breaktimeto" class="timepicker_noPeriodLabels" value="<?php echo $pathologist->breaktimeto_c; ?>"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Weekly off Day :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">
					<select name="weeklyoffday_c"  id="weeklyoffday" class="textarea">
						<option class="bodytext_normal">Monday</option>
						<option class="bodytext_normal">Thursday</option>
						<option class="bodytext_normal">Wednesday</option>
						<option class="bodytext_normal">Tuesday</option>
						<option class="bodytext_normal">Friday</option>
						<option class="bodytext_normal">Saturday</option>
						<option class="bodytext_normal">Sunday</option>
						<option selected class="bodytext_normal">None</option>
				  	</select>
				</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal"><input type="checkbox" name="homedeliveryfacility_c" id="homedeliveryfacility" value="true" onclick="toggledelivery();"/>Home Delivery</td>
			</tr>
			
			<tr id="delivery">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Areas Covered :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="areacoverforhomedelivery_c" id="areacoverforhomedelivery" class="textarea" value="<?php echo $pathologist->areacoverforhomedelivery_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Maximum Delivery Time :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" name="timetakeforhomedelivery_c" id="timetakeforhomedelivery" class="textarea" value="<?php echo $pathologist->timetakeforhomedelivery_c; ?>" maxlength="3"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal"><input type="checkbox" name="pickupfacility_c" id="pickupfacility" value="true""/>Sample pick-up</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Types of Tests:</td>
				<td colspan="3" align="left" style="padding-top:6px" class="bodytext_normal">
               		<?php $str="";
		               foreach($arrpathologisttypeoftestmaster as $key=>$result)
						{
							$str = $str.'<input type="checkbox" name="arrTestTypes[]" value='.$key.' id="checkbox'.$key.'"/>'.$result.'&nbsp;&nbsp;&nbsp;&nbsp;';			
						}
						echo $str;
				  	?>
				</td>
            </tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Center Registration Details</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Shop Act License No.*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="shopactlicence" name="shopactlicence_c" class="textarea" value="<?php echo $pathologist->shopactlicence_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Shop Act License Valid Till*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input name="medicalactlicencevaliddate_c" id="medicalactlicencevaliddate" type="text" class="textarea" readonly="readonly" value="<?php echo date('d M Y', strtotime($pathologist->medicalactlicencevaliddate_c)); ?>"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">FDA Licence No.*</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"   id="fdalicence" name="fdalicence_c" class="textarea" value="<?php echo $pathologist->fdalicence_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">FDA Licence Valid Till*</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input name="fadlicencedatetill_c" id="fadlicencedatetill" type="text" class="textarea" readonly="readonly" value="<?php echo date('d M Y', strtotime($pathologist->fadlicencedatetill_c)); ?>"/></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			 
			<tr>
				<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Doctor's Details</td>
			</tr>
			
			<tr>
				<td colspan="4" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal"><input id="sameDoctor" name="sameDoctor" type="checkbox" onchange='toggleDoctorView();'/>&nbsp;&nbsp;&nbsp;Check if Doctor details and User details are same.</td>
			</tr>
			
			<tr id="dFirstName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">First Name*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" class="textarea" id="qualifieddoctorfirtsname" name="qualifieddoctorfirtsname_c" value="<?php echo $pathologist->qualifieddoctorfirtsname_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Middle Name:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="qualifieddoctormiddlename" name="qualifieddoctormiddlename_c" class="textarea" value="<?php echo $pathologist->qualifieddoctormiddlename_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr id="dLastName">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Last Name* :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="qualifieddoctorlastname"  class="textarea" name="qualifieddoctorlastname_c" value="<?php echo $pathologist->qualifieddoctorlastname_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Email Id * :</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input id="qualifieddoctoremailid" name="qualifieddoctoremailid_c" type="text" class="textarea" value="<?php echo $pathologist->qualifieddoctoremailid_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr id="dContact">
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Country * :</td>
				<td align="left" style="padding-left:3px; padding-top:6px" class="bodytext_normal">
					<select name="doctorcountry_c" class="textarea gray"  onchange="setisdcode(document.getElementById('doctorcountry_c'),'qualifieddoctorisdmobilenumber_c','pharmacistisdmobilenumber_c');" tabindex="5" id="doctorcountry_c" style="width:125px;"> 
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
				<td align="left" style="padding-left:0px;padding-top:6px" class="bodytext_normal">Contact No. * :</td>
				<td align="left" style="padding-left:3px; padding-top:6px" class="bodytext_normal">
					<input id="qualifieddoctorisdmobilenumber_c" style="width:28px" type="text"  class="textarea" name="qualifieddoctorisdmobilenumber_c"  value="<?php echo $pathologist->qualifieddoctorisdmobilenumber_c; ?>"  maxlength="4" readonly="true"/> &nbsp;_&nbsp;
					<input id="qualifieddoctormobilenumber" name="qualifieddoctormobilenumber_c" class="textarea" type="text" value="<?php echo $pathologist->qualifieddoctormobilenumber_c; ?>" maxlength="10"/>
				</td>
			</tr>

			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Qualification*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text"   id="qualifieddoctorqualification" name="qualifieddoctorqualification_c" type="text" class="textarea" value="<?php echo $pathologist->qualifieddoctorqualification_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Year of Passing*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><select class="textarea" name="qualifieddoctoryearofpassing_c" id="qualifieddoctoryearofpassing"></select></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registration No.*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="registerqualifieddoctornumber" name="registerqualifieddoctornumber_c" class="textarea" value="<?php echo $pathologist->registerqualifieddoctornumber_c; ?>" maxlength="45"/></td>
				<td align="left" style="padding-top:6px" class="bodytext_normal">Registration Valid Till.*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input name="qualifieddoctorlicencevalidtill_c" id="qualifieddoctorlicencevalidtill" type="text" readonly="readonly" class="textarea" value="<?php echo date('d M Y', strtotime($pathologist->qualifieddoctorlicencevalidtill_c)); ?>"/></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normal">Registering Authority*:</td>
				<td align="left" style="padding-top:6px" class="bodytext_normal"><input type="text" id="registeringauthorityname" name="registeringauthorityname_c" class="textarea" value="<?php echo $pathologist->registeringauthorityname_c; ?>" maxlength="45"/></td>
			</tr>
			
			<tr>
				<td>
					<input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
					<input type="hidden" name="defaultCountry" id="defaultCountry" size="2" />
					<input type="hidden" name="carrierCode" id="carrierCode" size="2" />
					<input type="hidden" name="output" id="output" style="width:20px;">
				
				</td>
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr align="left">
				<td colspan="4" align="left"> <input align="left" type="submit"  class="button" height="22" style="width: 150px; height: 25px; " value="Save"/></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
		</table>
	</form>
</div>

<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
	</div>
</div>

<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>