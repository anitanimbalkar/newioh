<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" rel="stylesheet" />
<style type="text/css">
	a:link {
		color:#ffffff;
	}
	.regnbutton{
		font-family: Arial, sans-serif;
		border-radius: 5px;
		background: #00aca9;
		color: #fff;
		text-align: center;
		font-size:12px;
		padding: 5px 5px; 
		text-decoration: none;
	}
</style>
<div id="divpateditprofile"  style="border:1px solid #284889;border-radius: 5px 5px 5px 5px;width:828px;height: auto; overflow-x:hidden;" > 
	<form class="cmxform" id="pateditprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/cstaffprofile/saveProfile">
		<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
			<tr>
				<td colspan="4">
					<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
						<tr>
							<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Profile</td>
							<td  width="50%" align="right">Created / Updated On:<?php if ((strtotime($user->profileeditdate_c)))  echo date('d M Y',strtotime($user->profileeditdate_c)) ;  ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td width="15%" style="padding-left:10px;padding-top:10px" class="bodytext_normal">First Name* :</td>
				<td width="38%" style="padding-left:10px;padding-top:10px">
					<input  id="firstnm" name="Firstname_c" value="<?php echo trim($user->Firstname_c); ?>" type="text" class="textarea" maxlength="45"/>
				</td>
				<td colspan="2" rowspan="7" style="padding-left:10px;padding-top:10px" tabindex="-1">
					<span tabindex="-1">
						<img src="<?php if($users->photo_c == ""){echo '/ayushman/assets/userphotos/userphoto.png';}else{echo $users->photo_c;}?>" id="profilepic" style="height:130px;margin-top:10px;box-shadow:5px 4px 9px #888888;  right: -210px;  float: center;  position: relative;"   alt="NO Pic Set" id="thumb_preview" />
						<input type="button" value="Change Profile Picture" class="regnbutton" style="float:center;  position: relative;right: -77px;top: 35px;" onclick="openuploader();" /><br>
					</span>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Middle Name :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="middlenm" name="middlename_c" value="<?php echo trim($user->middlename_c);?>" type="text" class="textarea" maxlength="45"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Last Name* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="lastnm" name="lastname_c" value="<?php echo trim($user->lastname_c);  ?>" type="text" class="textarea" maxlength="45"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Date of Birth* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="DOB_c" name="dob" readonly="readonly"  value="<?php if ((strtotime($user->DOB_c))) echo  date('d M Y',strtotime( $user->DOB_c)) ; ?>" type="text" class="textarea"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Gender* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<select id="selgender" name="gender_c" class="textarea">
						<option value="">-----Select Gender-----</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Blood Group* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="bloodgrp" name="bloodgroup_c" type="text" class="textarea" value="<?php echo $user ->bloodgroup_c; ?>" maxlength="15"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Marital Status* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<select id="maritalstatus" name="maritalstatus_c" class="textarea" class="textarea">
						<option value="">-----Marital status-----</option>
						<option value="Single">Single</option>
						<option value="Married">Married</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Languages* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<select id="languages_c" multiple="multiple" name="languages_c" class="textarea" style="width:120px" onblur="alert('hi')">
						<option value="">Select Language</option>
						<?PHP
									foreach ($arrlanguage as $language) {
									print "<option \" value=\"{$language}\">{$language}</option>";
									}
						?>
					</select>
					<input type="text" name="languages" id="languages" hidden>
				</td>
			</tr>
		<tr><select multiple="multiple" id="examinations-health-card-a-5" class="formmultiselect" style="display: none; height: 13.5px;"><option value="Regular">Regular</option><option value="Excessive">Excessive</option><option value="Scanty">Scanty</option><option value="Painful">Painful</option></select></tr>
		
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Qualification* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="qualifications" name="qualifications_c" type="text" class="textarea" value="<?php echo $objstaff->qualification_c; ?>" maxlength="15"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Email* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="email" name="email" type="text" class="textarea" value="<?php echo $user->email; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td class="Heading_Bg" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Home Contact Details</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Home Phone :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="phonehome"  type="text"  class="textarea" name="phonenohome_c"  value="<?php echo $user->phonenohome_c;  ?>" maxlength="10"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Home Mobile :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="mobno1"  type="text"  class="textarea" name="mobileno1_c"  value="<?php echo $user->mobileno1_c;  ?>" maxlength="10"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Address Line 1 :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhline1"  type="text"  class="textarea" name="addhline1"  value="<?php echo $objaddhome->line1_c;  ?>" maxlength="400"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhlandmark"  type="text"  class="textarea" name="addhlandmark"  value="<?php echo $objaddhome->nearlandmark_c;  ?>" maxlength="100"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Country :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhcountry"  type="text"  class="textarea" name="addhcountry"  value="<?php echo $objaddhome->country_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">State :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhstate"  type="text"  class="textarea" name="addhstate"  value="<?php echo $objaddhome->state_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">City :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhcity"  type="text"  class="textarea" name="addhcity"  value="<?php echo $objaddhome->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhloc"  type="text"  class="textarea" name="addhloc"  value="<?php echo $objaddhome->location_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhpin"  type="text"  class="textarea" name="addhpin"  value="<?php echo $objaddhome->pin_c;  ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td class="Heading_Bg" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Office Contact Details</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Office Name* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="officename"  type="text"  class="textarea" name="officename_c"  value="<?php echo $objstaff->officename;  ?>" maxlength="10"/> 
				</td>
				
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Office Phone :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="phonenowork"  type="text"  class="textarea" name="phonenowork_c"  value="<?php echo $user->phonenowork_c;  ?>" maxlength="10"/> 
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Office Mobile :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="mobnowork"  type="text"  class="textarea" name="mobilenowork_c"  value="<?php echo $user->mobilenowork_c; ?>" maxlength="10"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Address Line 1 :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwline1"  type="text"  class="textarea" name="addwline1"  value="<?php echo $objaddwork->line1_c;  ?>" maxlength="400"/>  
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwlandmark"  type="text"  class="textarea" name="addwlandmark"  value="<?php echo $objaddwork->nearlandmark_c;  ?>" maxlength="100"/>  
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Country :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwcountry"  type="text"  class="textarea" name="addwcountry"  value="<?php echo $objaddwork->country_c;  ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">State :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwstate"  type="text"  class="textarea" name="addwstate" value="<?php echo $objaddwork->state_c;  ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">City :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwcity"  type="text"  class="textarea" name="addwcity"  value="<?php echo $objaddwork->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwloc"  type="text"  class="textarea" name="addwloc"  value="<?php echo $objaddwork->location_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext_normal">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwpin"  type="text"  class="textarea" name="addwpin"  value="<?php echo $objaddwork->pin_c;  ?>" maxlength="6"/>
				</td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td colspan="2" style="padding-left:10px;padding-top:10px" class="bodytext_normal">
					<input type="submit" class="button" height="22" style="width: 80px; height: 25px; " value="Save"/>
				</td>
			</tr>
			
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
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(function()
		{
			var availablebloodgrps = [
				"O+",
			    "O-",
				"A+",
				"A-",
				"B+",
				"B-",
				"AB+",
				"AB-"
			];
			$("#bloodgrp").autocomplete({source: availablebloodgrps	});
		}
	);
	
	$(function()
		{
			$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		}
	);
		
	$(document).ready
	(
		function()
		{
			var myform = document.getElementById('pateditprofileform');
    		myform.addEventListener('submit', beforeSubmit);
			
			function beforeSubmit()
			{
				$("#languages").val($("#languages_c").val());
			}
			
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			if($.trim($('#messagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			
			if("<?php echo $user->handicap_c; ?>" == 'true')
			{
				$('#handicap').attr("checked","checked");
				$('#handicapdetails').show();
			}
			dropdown = document.getElementById("selgender");
			itemToSelect = "<?= $user->gender_c?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].value == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}
			dropdown = document.getElementById("maritalstatus");
			itemToSelect = "<?= $user->maritalstatus_c?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].value == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}
			
			dropdown = document.getElementById("languages_c");
			itemToSelect = "<?= $user->languages_c?>";
			var items=itemToSelect.split(",");
			
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (items.indexOf(dropdown.options[iLoop].value)> -1)
				{
					dropdown.options[iLoop].selected = true;
				}
	    	}
						
			$('#addhcity').focus(function(){
			var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("addhstate").value+"%') and (pincode_c like '"+document.getElementById("addhpin").value+"%') and (locality_c like '"+document.getElementById("addhloc").value+"%') and (country_c like '"+document.getElementById("addhcountry").value+"%'))and city_c";
			$("#addhcity").autocomplete({source: urlcity});
			});
			$('#addhstate').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("addhcity").value+"%') and (pincode_c like '"+document.getElementById("addhpin").value+"%') and (locality_c like '"+document.getElementById("addhloc").value+"%') and (country_c like '"+document.getElementById("addhcountry").value+"%'))and state_c";
				$("#addhstate").autocomplete({source: urlstate});
			});
			$('#addhcountry').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("addhcity").value+"%') and (pincode_c like '"+document.getElementById("addhpin").value+"%') and (locality_c like '"+document.getElementById("addhloc").value+"%') and (state_c like '"+document.getElementById("addhstate").value+"%'))and country_c";
				$("#addhcountry").autocomplete({source: urlcountry});
			});
			$('#addhloc').focus(function(){
				var urlloc= "/ayushman/cautocompleter/autocomplete?column=locality_c&query=select  distinct locality_c  from masteraddress where ((city_c like '"+document.getElementById("addhcity").value+"%') and (pincode_c like '"+document.getElementById("addhpin").value+"%') and (country_c like '"+document.getElementById("addhcountry").value+"%') and (state_c like '"+document.getElementById("addhstate").value+"%'))and locality_c";
				$("#addhloc").autocomplete({source: urlloc});
			});
			$('#addhpin').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("addhcity").value+"%') and (locality_c like '"+document.getElementById("addhloc").value+"%') and (country_c like '"+document.getElementById("addhcountry").value+"%') and (state_c like '"+document.getElementById("addhstate").value+"%'))and pincode_c";
				$("#addhpin").autocomplete({source:urlpin});
			});
			$('#addwcity').focus(function(){
				var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("addwstate").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (locality_c like '"+document.getElementById("addwloc").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and city_c";
				$("#addwcity").autocomplete({source: urlcity});
			});
			$('#addwstate').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (locality_c like '"+document.getElementById("addwloc").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%'))and state_c";
				$("#addwstate").autocomplete({source: urlstate});
			});
			$('#addwcountry').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (locality_c like '"+document.getElementById("addwloc").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and country_c";
				$("#addwcountry").autocomplete({source: urlcountry});
			});
			$('#addwloc').focus(function(){
				var urlloc= "/ayushman/cautocompleter/autocomplete?column=locality_c&query=select  distinct locality_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (pincode_c like '"+document.getElementById("addwpin").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and locality_c";
				$("#addwloc").autocomplete({source: urlloc});
			});
			$('#addwpin').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("addwcity").value+"%') and (locality_c like '"+document.getElementById("addwloc").value+"%') and (country_c like '"+document.getElementById("addwcountry").value+"%') and (state_c like '"+document.getElementById("addwstate").value+"%'))and pincode_c";
				$("#addwpin").autocomplete({source:urlpin});
			});
			
			var firstnm = new LiveValidation('firstnm',{onlyOnSubmit: true });
			firstnm.add( Validate.Presence );
			firstnm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"  } );
			
			
			var qualifications = new LiveValidation('qualifications',{onlyOnSubmit: true });
			qualifications.add( Validate.Presence );
			
			
			var officename = new LiveValidation('officename',{onlyOnSubmit: true });
			officename.add( Validate.Presence );
			
			var middlenm = new LiveValidation('middlenm',{onlyOnSubmit: true });
			middlenm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var lastnm = new LiveValidation('lastnm',{onlyOnSubmit: true });
			lastnm.add( Validate.Presence );
			lastnm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"  } );
			
			var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
			DOB_c.add( Validate.Presence );
			
			var selgender = new LiveValidation('selgender',{onlyOnSubmit: true });
			selgender.add( Validate.Presence );
			
			var bloodgrp = new LiveValidation('bloodgrp',{onlyOnSubmit: true });
			bloodgrp.add( Validate.Presence );
			
			var maritalstatus = new LiveValidation('maritalstatus',{onlyOnSubmit: true });
			maritalstatus.add( Validate.Presence );
			
			var addhline1 = new LiveValidation('addhline1',{onlyOnSubmit: true });
			addhline1.add( Validate.Presence );
			
			var addhcountry = new LiveValidation('addhcountry',{onlyOnSubmit: true });
			addhcountry.add( Validate.Presence );
			
			var addhstate = new LiveValidation('addhstate',{onlyOnSubmit: true });
			addhstate.add( Validate.Presence );
			
			var addhcity = new LiveValidation('addhcity',{onlyOnSubmit: true });
			addhcity.add( Validate.Presence );
			
			var addhpin = new LiveValidation('addhpin', {onlyOnSubmit: true });
			addhpin.add( Validate.Presence );
			addhpin.add( Validate.Numericality, {onlyInteger: true } );
			
			var phonehome = new LiveValidation('phonehome',{onlyOnSubmit: true });
			phonehome.add( Validate.Presence );
			phonehome.add( Validate.Numericality, {onlyInteger: true } );
			phonehome.add( Validate.Length, { is: 10 });
			
			var mobno1 = new LiveValidation('mobno1',{onlyOnSubmit: true });
			mobno1.add( Validate.Presence );
			mobno1.add( Validate.Numericality, {onlyInteger: true } );
			mobno1.add( Validate.Length, { is: 10 });
						
			var phonenowork = new LiveValidation('phonenowork',{onlyOnSubmit: true });
			phonenowork.add( Validate.Numericality, {onlyInteger: true } );
			phonenowork.add( Validate.Length, { is: 10 });
						
			var mobnowork = new LiveValidation('mobnowork',{onlyOnSubmit: true });
			mobnowork.add( Validate.Numericality, {onlyInteger: true } );
			mobnowork.add( Validate.Length, { is: 10 });
						
			var addwpin = new LiveValidation('addwpin', {onlyOnSubmit: true });
			addwpin.add( Validate.Numericality, {onlyInteger: true } );
			
			var email = new LiveValidation('email', {onlyOnSubmit: true });
			email.add(Validate.Presence);
			email.add( Validate.Email );
	
			$('#languages_c').multiselect({
				selected: "2",
				width:"135"
			});
			
		}
	);
	
	function setsize(f)
	{
		var body = f.contentDocument.body;
		body.style.padding = 0;
		body.style.margin = 0;
		body.style.background = "transparent";
	}
	
	function togglehandicapview()
	{
		if($('#handicap').attr("checked") == "checked")
		{
			$('#handicapdetails').show();
		}
		else
		{
			$('#handicapdetails').hide();
		}
	}
	function openuploader(){
		openDialog("/ayushman/cimagedisplay/uploadstaffprofile?userid=<?= $user->id; ?>",800,800,this);
	}
	
</script>