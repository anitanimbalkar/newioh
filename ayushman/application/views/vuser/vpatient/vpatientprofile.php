<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css"/>
 
<div id="divpateditprofile"  class="table-responsive"> 
	<form class="cmxform" id="pateditprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/cpatientprofile/saveProfile">
		<input type="hidden" id='profileuserid' name="profileuserid" value="<?php echo $profileuserid; ?>" />
		<table id="paientprofiletable" class="table table-condensed" style="width:100%">
			<tr>
				<td colspan="4">
					<table width="100%" height="15"  class="formHeader" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td>&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Profile</td>
							<td align="right">Created / Updated On:<?php if ((strtotime($user->profileeditdate_c)))  echo date('d M Y',strtotime($user->profileeditdate_c)) ;  ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">First Name* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input  id="firstnm" name="Firstname_c" value="<?php echo trim($user->Firstname_c); ?>" type="text" class="regnformcontrol" maxlength="45"/>
				</td>
				<td rowspan="3" colspan="2" tabindex="-1" valign="middle" align="center">
						<!--<iframe name="patphotoiframe" id="photoframe" tabindex="-1" frameborder="0"  src="/ayushman/cimagedisplay/uploadimage?userid=<?= $user->id; ?>"  vspace="0" hspace="0" scrolling="no" width="100%" height="190px" onload="setsize(this)"  allowtransparency="true" ></iframe>-->
					<img src="<?php if($user->photo_c == ""){echo '/ayushman/assets/userphotos/userphoto.png';}else{echo $user->photo_c;}?>" id="profilepic" style="height:100px;margin-top:10px;box-shadow:5px 4px 9px #888888;  right: -20px;  float: center;  position: relative;"   alt="NO Pic Set" id="thumb_preview" />
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Change Profile Picture" class="regnbutton" style="float:center;  position: relative;right: 41px;top: 21px;" onclick="openuploader();" /><br>
<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Take Profile Picture" class="regnbutton" style="float:center;  position: relative;right: 41px;top: 21px;" onclick="openwebcam();" />
				--></td>
				
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Middle Name :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="middlenm" name="middlename_c" value="<?php echo trim($user->middlename_c);?>" type="text" class="regnformcontrol" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Last Name* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="lastnm" name="lastname_c" value="<?php echo trim($user->lastname_c);  ?>" type="text" class="regnformcontrol" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Date of Birth* :</td>
				<td style="padding-left:10px;padding-top:10px">

					<input id="DOB_c" name="dob" readonly="readonly"  value="<?php if($user->DOB_c == '0000-00-00'){echo ''; }else{ echo date('d M Y',strtotime( $user->DOB_c));} ?>" type="text" class="regnformcontrol"/>

				</td>
				<td style="padding-left:10px;padding-top:40px" class="bodytext">Gender* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<br><select id="selgender" name="gender_c" class="regnformcontrol">
						<option value="">-----Select Gender-----</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Marital Status* :</td>
				<td style="padding-left:10px;padding-top:10px">
					<select id="maritalstatus" name="maritalstatus_c" class="regnformcontrol" class="regnformcontrol">
						<option value="">-----Marital status-----</option>
						<option value="Single">Single</option>
						<option value="Married">Married</option>
					</select>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Email ID :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="email" name="email" value="<?php echo trim($user->email);?>" type="text" class="regnformcontrol" maxlength="45"/>
				</td>
			</tr>
		<tr>
		<td style="padding-left:10px;padding-top:10px" class="bodytext">UID :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="uid" name="uid" value="<?php echo trim($user->uid);?>" type="text" class="regnformcontrol" maxlength="45"/>
				</td>
				<td> </td>
				<td> </td>
		</tr>
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td class="formHeader" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Home Contact Details</td>
			</tr>
			
			
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Address Line 1 * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhline1"  type="text"  class="regnformcontrol" name="addhline1"  value="<?php echo $objaddhome->line1_c;  ?>" maxlength="400"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhlandmark"  type="text"  class="regnformcontrol" name="addhlandmark"  value="<?php echo $objaddhome->nearlandmark_c;  ?>" maxlength="100"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Country * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<!--<input id="addhcountry"  type="text"  class="regnformcontrol" name="addhcountry"  value="<?php echo $objaddhome->country_c; ?>" maxlength="45"/>-->
					<select name="addhcountry" class="regnformcontrol"  onchange="setisdcode(this,'isdphonehome','isdmobileno1');" id="addhcountry" style="width:140px;"> 
						<option value="" selected="" >Select Country</option>
						<?PHP  
							for ($i=0;$i<count($objcountries);$i++) {									
								print "<option  \" value=\"{$objcountries[$i]['countrycode_c']}\">{$objcountries[$i]['country_c']}</option>";
							} 
						?>
					</select>
					
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">State * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhstate"  type="text"  class="regnformcontrol" name="addhstate"  value="<?php echo $objaddhome->state_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">City * :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhcity"  type="text"  class="regnformcontrol" name="addhcity"  value="<?php echo $objaddhome->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhloc"  type="text"  class="regnformcontrol" name="addhloc"  value="<?php echo $objaddhome->location_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addhpin"  type="text"  class="regnformcontrol" name="addhpin"  value="<?php echo $objaddhome->pin_c;  ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Home Phone :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="isdphonehome" style="width:30px" type="text"  class="regnformcontrol" name="isdphonenohome_c"  value="<?php echo $user->isdphonenohome_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="phonehome" style="width:90px" type="text"  class="regnformcontrol" name="phonenohome_c"  value="<?php echo $user->phonenohome_c;  ?>" onblur="checkPhoneNumber(this,'addhcountry')" maxlength="10"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Mobile No.:</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="isdmobileno1" style="width:30px" type="text"  class="regnformcontrol" name="isdmobileno1_c"  value="<?php echo $user->isdmobileno1_c;  ?>"  readonly="true" maxlength="4"/> &nbsp;&nbsp;<input id="mobno1" style="width:90px" type="text"  class="regnformcontrol" name="mobileno1_c"  value="<?php echo $user->mobileno1_c;  ?>" onblur="checkPhoneNumber(this,'addhcountry')" maxlength="10"/>
				</td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td class="formHeader" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Office Contact Details</td>
			</tr>
			
			
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Address Line 1 :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwline1"  type="text"  class="regnformcontrol" name="addwline1"  value="<?php echo $objaddwork->line1_c;  ?>" maxlength="400"/>  
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Landmark :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwlandmark"  type="text"  class="regnformcontrol" name="addwlandmark"  value="<?php echo $objaddwork->nearlandmark_c;  ?>" maxlength="100"/>  
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Country :</td>
				<td style="padding-left:10px;padding-top:10px">
					<!--<input id="addwcountry"  type="text"  class="regnformcontrol" name="addwcountry"  value="<?php echo $objaddwork->country_c;  ?>" maxlength="45"/>-->
					<select name="addwcountry" class="regnformcontrol" onchange="setisdcode(this,'isdphonework','isdmobnowork');" id="addwcountry" style="width:140px;"> 
						<option value="" selected=""  >Select Country</option>
						<?PHP  
							
							for ($i=0;$i<count($objcountries);$i++) {									
								print "<option  \" value=\"{$objcountries[$i]['countrycode_c']}\">{$objcountries[$i]['country_c']}</option>";
							} 
						?>
					</select>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">State :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwstate"  type="text"  class="regnformcontrol" name="addwstate" value="<?php echo $objaddwork->state_c;  ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">City :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwcity"  type="text"  class="regnformcontrol" name="addwcity"  value="<?php echo $objaddwork->city_c; ?>" maxlength="45"/>
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Locality :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwloc"  type="text"  class="regnformcontrol" name="addwloc"  value="<?php echo $objaddwork->location_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Pin :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="addwpin"  type="text"  class="regnformcontrol" name="addwpin"  value="<?php echo $objaddwork->pin_c;  ?>" maxlength="6"/>
				</td>
			</tr>
			<tr>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Office Phone :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="isdphonework" style="width:30px" type="text"  class="regnformcontrol" name="isdphonenowork_c"  value="<?php echo $user->isdphonenowork_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="phonenowork"  type="text" style="width:90px"  class="regnformcontrol" name="phonenowork_c"  value="<?php echo $user->phonenowork_c;  ?>" onblur="checkPhoneNumber(this,'addwcountry')" maxlength="10"/> 
				</td>
				<td style="padding-left:10px;padding-top:10px" class="bodytext">Office Mobile :</td>
				<td style="padding-left:10px;padding-top:10px">
					<input id="isdmobnowork" style="width:30px" type="text"  class="regnformcontrol" name="isdmobilenowork_c"  value="<?php echo $user->isdmobilenowork_c;  ?>"  maxlength="4" readonly="true"/> &nbsp;&nbsp;<input id="mobnowork"  type="text" style="width:90px" class="regnformcontrol" name="mobilenowork_c"  value="<?php echo $user->mobilenowork_c; ?>" onblur="checkPhoneNumber(this,'addwcountry')" maxlength="10"/>
				</td>
			</tr>
			<tr><td colspan="4">&nbsp;</td></tr>
			<tr>
				<td>
					<input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
					<input type="hidden" name="defaultCountry" id="defaultCountry" size="2" />
					<input type="hidden" name="carrierCode" id="carrierCode" size="2" />
					<input type="hidden" name="output" id="output" style="width:20px;">
				
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left:10px;padding-top:10px" class="bodytext">
					<input type="submit" class="regnbutton" height="22" style="width: 80px; height: 25px; " value="Save" />
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
	<div class="bodytext" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
   
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

<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>


<script type="text/javascript">
	$(function()
		{
			
		}
	);
	
	$(function()
		{

			$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});

		}
	);
	
	$(document).ready
	(
		
		function()
		{ 
		
			dropdown = document.getElementById("addhcountry");
			itemToSelect = "<?= $objaddhome->country_c?>";
			for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		    {
				if (dropdown.options[iLoop].text == itemToSelect)
				{
					dropdown.options[iLoop].selected = true;
					break;
				}
	    	}
			
			dropdown = document.getElementById("addwcountry");
			itemToSelect = "<?php echo $objaddwork->country_c;  ?>";
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
			{
				showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
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
			
			var middlenm = new LiveValidation('middlenm',{onlyOnSubmit: true });
			middlenm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
			
			var lastnm = new LiveValidation('lastnm',{onlyOnSubmit: true });
			lastnm.add( Validate.Presence );
			lastnm.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"  } );
			
			var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
			DOB_c.add( Validate.Presence );
			
			var selgender = new LiveValidation('selgender',{onlyOnSubmit: true });
			selgender.add( Validate.Presence );
			
			
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
			addhpin.add( Validate.Numericality, {onlyInteger: true } );
			addhpin.add( Validate.Length, { is: 6 });
			
			var phonehome = new LiveValidation('phonehome',{onlyOnSubmit: true });
			phonehome.add( Validate.Numericality, {onlyInteger: true } );
			phonehome.add( Validate.Length, { is: 10 });
			
			var isdphonehome = new LiveValidation('isdphonehome',{onlyOnSubmit: true });
			isdphonehome.add( Validate.Format, { pattern: /^[0-9+]+$/,failureMessage: "only numbers allowed"  } );
			
			var mobno1 = new LiveValidation('mobno1',{onlyOnSubmit: true });
			mobno1.add( Validate.Numericality, {onlyInteger: true } );
			mobno1.add( Validate.Length, { is: 10 });
			
			var isdmobileno1 = new LiveValidation('isdmobileno1',{onlyOnSubmit: true });
			isdmobileno1.add( Validate.Format, { pattern: /^[0-9+]+$/,failureMessage: "only numbers allowed"  } );
		
			var phonenowork = new LiveValidation('phonenowork',{onlyOnSubmit: true });
			phonenowork.add( Validate.Numericality, {onlyInteger: true } );
			phonenowork.add( Validate.Length, { is: 10 });
			
			
			var mobnowork = new LiveValidation('mobnowork',{onlyOnSubmit: true });
			mobnowork.add( Validate.Numericality, {onlyInteger: true } );
			mobnowork.add( Validate.Length, { is: 10 });
			
			
			var addwpin = new LiveValidation('addwpin', {onlyOnSubmit: true });
			addwpin.add( Validate.Numericality, {onlyInteger: true } );
			addwpin.add( Validate.Length, { is: 6 });
			
			var uid = new LiveValidation('uid', {onlyOnSubmit: true });
			uid.add( Validate.Numericality, {onlyInteger: true } );
			uid.add( Validate.Length, { is: 12 });
			
			var email = new LiveValidation('email', {onlyOnSubmit: true });
			email.add( Validate.Email );
			
			//if email is genarated by script then dont show that email to user
			var email = document.getElementById("email").value;
			var word = '@inhlth.com';
			var regex = new RegExp( '\\b' + word + '\\b' );
			var result = regex.test(email);
			if(result == true)
			{
				alert(email);
				alert(result);
				document.getElementById("email").value = "";
			}
		}
		
	);
	
	function setsize(f)
	{
		var body = f.contentDocument.body;
		body.style.padding = 0;
		body.style.margin = 0;
		body.style.background = "transparent";
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
	function openuploader(){
		openDialog("/ayushman/cimagedisplay/uploadimage?userid=<?= $user->id; ?>",800,800,this);
	}
	function openwebcam(){
		openDialog("/ayushman/cimagedisplay/uploadimagefromcam?userid=<?= $user->id; ?>",800,800,this);
	}
	function fancyboxclosed()
	{
		setTimeout(updatephoto,2250);
	}
	function updatephoto(){
		$.ajax({
			url: "/ayushman/cuser/getmyprofile?id="+<?= $user->id; ?>,
			success: function( data ) {
				obj = JSON.parse(data);
				$('#profilepic').attr("src", obj.userinfo.PatientPhoto);
			},
			error : function(){showMessage('550','200','Retrieving user information',"Could not retrieve user information.",'error','id');}
		});	
	}	

</script>
