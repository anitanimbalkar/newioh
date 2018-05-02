<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
$(document).ready
	(
		function()
		{
			$('#divpateditprofile').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				width: "800px",
				modal: true,
				height: "auto",
				resize: "auto",
				resizable: false,
				open: function(event, ui){
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
					addhpin.add( Validate.Length, { is: 6 });
					addhpin.add( Validate.Numericality, {onlyInteger: true } );
			
					var mobno1 = new LiveValidation('mobno1',{onlyOnSubmit: true });
					mobno1.add( Validate.Presence );
					mobno1.add( Validate.Numericality, {onlyInteger: true } );
					mobno1.add( Validate.Length, { is: 10 });
					
					var email = new LiveValidation('emailId',{onlyOnSubmit: true });
					email.add( Validate.Presence );
					email.add(Validate.Email );
					
				},
				close: function(event, ui){
					$('#divpateditprofile').dialog('open');
				}
			});
			$(".ui-dialog-titlebar").hide();
		}
	);
	function abort(){
		var x;
		var r=confirm("Do you want to abort this transaction?");
		if (r==true)
		{
			document.location = '/ayushman/cpayment/cancel';
		}
	}
</script>
    <div style="  height: 390px;vertical-align:center;padding-top:0px" align="center">
		<div class="content_bg redirecting-section" align="center" >
			<table class="content_bg"  valign="top" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="Heading_Bg" align="left" style="padding-left:25px;">Redirecting to EBS Payment Gateway</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
							Please wait............
					</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">We are redirecting to EBS Payment Gateway.</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">This may take few seconds.Please do not click on back button.</td>
				</tr>
			</table>
		</div>
	</div>
	<script language="JavaScript">
		$(document).ready(function() {
			$('#addhcountry').trigger('change');
			if(validate())
			{
				$('#frmTransaction').submit();
			}
			else
				$('#divpateditprofile').dialog('open');
		});
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
	<?php 
		$ebsform= Request::factory('caccountmanager/includeebsform');
		$ebsform->post("userId",Auth::instance()->get_user()->id);
		$ebsform->post('amount',$amount);
		$ebsform->post('reference_no',$reference_no);
		$ebsform->post('description',$description);
		//$ebsform->post('secure_hash',$secure_hash);
		//$ebsform->post('payment_option',$payment_option);
		//$ebsform->post('display_currency',$display_currency);
		echo $ebsform->execute(); 
	?>

	<div id="divpateditprofile" style="overflow-y:hidden;overflow-x:hidden;height:auto;" class="content_bg" >
		<form class="cmxform" method="post" enctype="multipart/form-data"  action='/ayushman/cebsvalidation/savevaliddata?validationdata=<?php echo $validationdata; ?>'>
		<div id="header" class="bodytext_bold" style="vertical-align: middle; height: 22px;background-color: #ecf8fb;width: 100%;border-top: 1px solid #a8c8d9;border-bottom: 1px solid #a8c8d9;padding: 2px 5px;margin: 10px 0;text-align: center;" >
			Required Information for Payment Gateway
		</div>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="" height="auto" >
			
			
			<tr>
				<td width="50%">
                    <span>Address Line 1 :</span>
					<input id="addhline1"  type="text"  class="textarea" name="addhline1"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->line1_c;  ?>" maxlength="400"/>
				</td>

				<td width="50%">
                    <span>Landmark :</span>
                    <input id="addhlandmark"  type="text"  class="textarea" name="addhlandmark"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->nearlandmark_c;  ?>" maxlength="100"/>
				</td>
			</tr>
			
			<tr>
				<td width="50%">
                    <span> Country :</span>
					<select name="addhcountry" class="textarea" style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;" onchange="setisdcode(this,'isdmobileno1_c','isdmobileno1_c');" tabindex="5" id="addhcountry" style="width:126px;"> 
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
				<td width="50%">
                    <span>State :  </span>
                    <input id="addhstate"  type="text"  class="textarea" name="addhstate"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->state_c; ?>" maxlength="45"/>
				</td>
			</tr>
			
			<tr>
				<td width="50%">
                    <span> City :</span>
					<input id="addhcity"  type="text"  class="textarea" name="addhcity"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->city_c; ?>" maxlength="45"/>
				</td>

				<td width="50%">
                    <span>Locality :</span>
					<input id="addhloc"  type="text"  class="textarea" name="addhloc"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->location_c; ?>" maxlength="45"/>
				</td>
			</tr>
			<tr>
				<td width="50%">
                    <span>Pin :</span>
					<input id="addhpin"  type="text"  class="textarea" name="addhpin"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $objaddhome->pin_c;  ?>" maxlength="45"/>
				</td>
			</tr>
			<tr>
				<td width="50%">
                    <span>Mobile :</span>
					<input id="isdmobileno1_c" type="text"  class="textarea" style="width:20px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;" name="isdmobileno1_c"  value="<?php if(isset($previousvalues)){ echo Arr::get($previousvalues, 'isdphonework');}else{echo $user->isdmobileno1_c;} ?>"  maxlength="4" readonly="true"/> &nbsp;_&nbsp;
					<input id="mobno1"  type="text" class="textarea" style="width:77px;font-family:tahoma,Helvetica,sans-serif;font-size:11px;" name="mobileno1_c" value="<?php echo $user->mobileno1_c;  ?>" maxlength="10"/>
				</td>

				<td width="50%">
                    <span>Email :</span>
					<input id="emailId"  type="text"  class="textarea" name="emailId"  style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;font-color: #999999;color:#333333;" value="<?php echo $user->email;  ?>" maxlength="100"/>
				</td>
			</tr>
	    </table>
		<div id="footer" class="bodytext_bold" align="right" style="margin-top:5px;background-color:#ecf8fb;width:100%;border-top:1px solid #a8c8d9; border-bottom:1px solid #a8c8d9;padding:5px;" >
			<input type="hidden" name="validationdata" id="validationdata" value='<?php echo $validationdata; ?>' />	
			<input type="button" class="button" align="right" height="22" onclick="abort();" style="width: 120px; height: 25px; font-family:tahoma,Helvetica,sans-serif;font-size:11px;" value="Abort Transaction"/>&nbsp;
			<input type="submit" class="button" align="right" height="22" style="width: 120px; height: 25px; font-family:tahoma,Helvetica,sans-serif;font-size:11px;" value="Proceed"/>
		</div>
 
	</form>
	</div>
