<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 

<script type="text/javascript">
	var email;
	$(document).ready(function() {
		
		
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});		
		$(".ui-dialog-titlebar").hide();   
		
			$('#City').focus(function(){
				var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("State").value+"%') and (pincode_c like '"+document.getElementById("PinCode").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and city_c";
				$("#City").autocomplete({source: urlcity});
			});
			$('#State').focus(function(){
				var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("City").value+"%') and (pincode_c like '"+document.getElementById("PinCode").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and state_c";
				$("#State").autocomplete({source: urlstate});
			});				
			$('#PinCode').focus(function(){
				var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("City").value+"%')  and (country_c like '"+document.getElementById("country").value+"%') and (state_c like '"+document.getElementById("State").value+"%'))and pincode_c";
				$("#PinCode").autocomplete({source:urlpin});
			});
			$('#country').focus(function(){
				var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("City").value+"%') and (pincode_c like '"+document.getElementById("PinCode").value+"%') and (state_c like '"+document.getElementById("State").value+"%'))and country_c";
				$("#country").autocomplete({source: urlcountry});
			});
			
			
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);

		var firstname = new LiveValidation('firstname', {onlyOnSubmit: true });
		firstname.add( Validate.Presence );
		firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
		
		var lastname = new LiveValidation('lastname',{onlyOnSubmit: true });
		lastname.add( Validate.Presence );
		lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed" } );
		
		var mobilenumber = new LiveValidation('number', {onlyOnSubmit: true });
		mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
		mobilenumber.add( Validate.Length, { is: 10 });
		mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
		mobilenumber.add( Validate.Presence );
		//email = new LiveValidation('emailid', {onlyOnSubmit: true });
			
		
		$("relativeform").submit(function(){
			return isValidRelativeform();
		});
			
	});
	

	function removeconfirmation(id){
		$('#relativeid').val(id);
		showMessage('250','50','To remove relative','Do you want to really want to remove relative from your network?.</br></br></br>','confirmation','id');
	}
	function linkaccount(id){
		$('#linkrelativeid').val(id);
		
		linkemail = new LiveValidation('linkemailid', {onlyOnSubmit: true });
		linkemail.add( Validate.Presence );linkemail.add( Validate.Email );

	}

	function Confirmation_Event(id,confirmation)
	{
		if(confirmation == 'yes'){
			parent.getcontent('/ayushman/crelative/remove?id='+$('#relativeid').val());	
		}
	} 
	
	function checkEmail(email){
	$(".ui-dialog-titlebar").hide();
	$( "#loading" ).dialog({ modal: false });
	$('#loading').dialog('open');
	$('#isemailvalid').val(true);
	// No need for checking unique email so commented following code
	/*
	$.ajax({
		url: "/ayushman/cregistrar/checkemailavailability?email="+email.value,
		success: function(data) {
			$('#loading').dialog('close');
			if(data=="invalid"){
				document.getElementById("emailerror").style.display = "block";
				document.getElementById("linkemailerror").style.display = "block";
				
				$('#isemailvalid').val(false);
			}
			else{
				document.getElementById("emailerror").style.display = "none";
				document.getElementById("linkemailerror").style.display = "none";
				$('#isemailvalid').val(true);
			}
			$( "#loading" ).dialog({ modal: true });
		},
		error : function(){
			$('#loading').dialog('close');
			$( "#loading" ).dialog({ modal: true });
			//showMessage('250','50','Check email id availability','Error occured while checking email id availability, Please contact system administrator.','error','errordialogboxid');
		}
	});*/
	
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

	function addrelative(){
		$('#firstname').val('');
		$('#lastname').val('');
		$('#number').val('');
		$('#emailid').val('');
		$('#relation').val('Select');
		$("#myself").prop("checked", true);
		email = new LiveValidation('emailid'); email.disable(); $('#both').is(':checked') ? $('#email').show() : $('#email').hide();
	
	}
	function isValidRelativeform(){		
		if($('#isemailvalid').val() == 'true'){
			$("#relativeform").submit();
			return true;
		}else{
			return false;
		}	
	}

	function operateAc(id,encodedid){
		parent.location='/ayushman/cuser/switchToDependent?id=' + encodedid;
	}
	function setisdcode(){
		if(document.getElementById("country").value == 'India'){
			document.getElementById("isdrelativeno").value = '+91';
		}
		if(document.getElementById("country").value == 'Singapor'){
			
			document.getElementById("isdrelativeno").value = '+65';
		}
	}
	

</script>
<style type="text/css">
</style>
<input type="hidden" value='' id="relativeid" />
<div height="500px">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Registration</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style="overflow:auto;margin-top:5px;">
	<table id = "searchresult" class = "table_roundBorder" style="width:800;margin-top:5px;margin-left:10px;">
	</table>
</div>


	<form id="relativeform" method="post" enctype="multipart/form-data"  action="addrelative" style="margin-bottom:0px;" >
		<div id="addrelative" style="overflow-y:auto;overflow-x:hidden;"  >
			<table cellspacing="6">
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						First Name *
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='firstname' name='firstname' style="width:200px;" value="" />
						<script>
							var firstname = new LiveValidation('firstname', {onlyOnSubmit: true });
							firstname.add( Validate.Presence );
							firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
						</script>
						
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Last Name *
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='lastname' name='lastname' style="width:200px;" value="" />
						<script>
							var lastname = new LiveValidation('lastname', {onlyOnSubmit: true });
							lastname.add( Validate.Presence );
							lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
						</script>

					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Address
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='Addressline1' name='Addressline1' style="width:200px;"/>									
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Locality
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='Locality' name='Locality' style="width:200px;" autocomplete="on"/>
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						City
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='City' name='City' style="width:200px;" autocomplete="on" />
						
						
					</td>
				</tr>				
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						State
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='State' name='State' style="width:200px;" autocomplete="on"/>
												
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Country
					</td>
					<td width="370px">
						:  <select name="country"  onchange="setisdcode();" id="country">
                                <option value="India" >India</option>
								<option value="Singapor" >Singapore</option>								
                           </select>
						<!--:&nbsp;&nbsp;<input type="text" class="textarea" id='country' name='country' style="width:200px;" autocomplete="on"/>
						-->				
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Pin code
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='PinCode' name='PinCode' style="width:200px;" />
					</td>
				</tr>
				
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Contact No. *
					</td>
					<td width="370px">						
						:&nbsp;
						<input id="isdrelativeno" style="width:25px" type="text"  class="textarea" name="isdrelativeno"  value="+91"  maxlength="4" readonly="true"/>&nbsp;_&nbsp;
						<input type="text" class="textarea" style="width:140px;" value="" id="number" name="number" />
						<script>
							var mobilenumber = new LiveValidation('number', {onlyOnSubmit: true });
							mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
							mobilenumber.add( Validate.Length, { is: 10 });
							mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
						</script>
					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Relation
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<select class="textarea" style="width:200px;" name="relation" id="relation" required="required">
								<option value="none">Select</option>
								<?php 
									$objRelations = ORM::factory('relationmaster')->find_all();
									foreach($objRelations as $objRelation){
										echo '<option value="'.$objRelation->relationname_c.'">'.$objRelation->relationname_c.'</option>';
									}
									
								?>
							</select>
					</td>
				</tr>

				<tr>
					<td width="440px" colspan="2" class="bodytext_normal">
						<input type="radio" checked value="myself" id="myself" onclick="email = new LiveValidation('emailid'); email.disable(); $('#both').is(':checked') ? $('#email').show() : $('#email').hide();$('#isemailvalid').val(true);"   name="operateaccount" >Only I will operate this account</input></br>
						<input type="radio" value="both" id="both" onclick="email = new LiveValidation('emailid'); email.enable(); email.add( Validate.Presence );email.add( Validate.Email );$('#both').is(':checked') ? $('#email').show() : $('#email').hide();$('#isemailvalid').val(true);"  name="operateaccount" >Both My relative and I will operate this account</input>
					</td>
				</tr>
				<tr id="email" style="display:none;">
					<td width="70px" class="bodytext_normal" style="padding-left:10px;vertical-align:top;padding-top:5px;">
						email *
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" style="width:200px;"  maxlength="45"  value="<?php if($previousvalues != null)if(isset($previousvalues['emailid']))echo $previousvalues['emailid']; ?>" id="emailid" name="emailid" /> <div id="emailerror" style="display:none;" class="bodytext_error">&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div>
						<script>
							//var email = new LiveValidation('emailid', {onlyOnSubmit: true });
							//email.add( Validate.Email );
						</script>
					</td>
				</tr>
			</table>
			</div>
		<div class="bodytext_normal" align="right" style="height:40px;border-top:1px solid #a8c8d9;background: #ecf8fb;padding-top:10px; padding-right:10px;vartical-align:middle;align:right;">
			<input type="submit"  class="button" value="Register" style="width:120px;" onclick="isValidRelativeform();" />
		</div>
	</form>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
</div>
