<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>

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

		$('#addpopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#linkpopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});

		$(".ui-dialog-titlebar").hide();

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
		
		setisdcode(document.getElementById('country'),'isdrelativeno','isdrelativeno');
		
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
		
		$('#linkpopup').dialog('open');
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
	function setisdcode(country,phoneid,mobileid)
	{
		var count = country.selectedIndex-1;
		<?php $allcountries = json_encode($objcountries); echo "var javascript_array = ". $allcountries . ";\n"; ?>
		document.getElementById(phoneid).value ='+'+javascript_array[count].isd;
		document.getElementById(mobileid).value ='+'+javascript_array[count].isd;
	}
	function addrelative(){
		$('#firstname').val('');
		$('#lastname').val('');
		$('#number').val('');
		$('#emailid').val('');
		$('#relation').val('Select');
		$("#myself").prop("checked", true);
		email = new LiveValidation('emailid'); email.disable(); $('#both').is(':checked') ? $('#email').show() : $('#email').hide();
		
		$('#addpopup').dialog('open');	
	}
	function isValidRelativeform(){
		
		if($('#isemailvalid').val() == 'true'){
			$("#relativeform").submit();
			return true;
		}else{
			return false;
		}
	}
	
	function isValidLinkform(){
		if($('#isemailvalid').val() == 'true'){
			$("#linkform").submit();
			return true;
		}else{
			return false;
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
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Relatives</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<?php if($ayushcarestatus == "add"){ ?>
			<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
				<div id="help-main" style="margin-left:5px;">
					<p class="bodytext_bold"style="font-size:12px;margin-left:10px;">Please add the relative you wish to sponsor by clicking on Add Relative Button.</p>
				</div>
			</div>
			<?php } ?>
			<?php if($ayushcarestatus == "operate"){ ?>
			<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
				<div id="help-main" style="margin-left:5px;">
					<p class="bodytext_bold"style="font-size:12px;">Please click on operate account button to proceed.</p>
				</div>
			</div>
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					</tr>
						<td height="25" colspan="4" align="left" class="bodytext_normal" valign="middle" style="padding-left:10px;">
							<input type="button" class="button" value="Add Relative" style="width:100px;height:23px;" onclick="addrelative();" />
						</td>
					</tr>
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
							<?php
										$objRelatives = ORM::factory('relative')->where('refprimaryusersid_c','=',Auth::instance()->get_user()->id);
										$message = 'Relatives not found';
									
										$objRelatives = $objRelatives->find_all()->as_array();

										if(count($objRelatives) == 0){
											echo '<div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold" >'.$message.'</div>';
										}else{
											echo '<div width="100%" height="auto" style="white-space: wrap;"><ul id="navlist">';
											foreach($objRelatives as $relative)
											{
												echo '<li name="listitems" style="margin-top:5px;" >';
												$relativeList= Request::factory('crelativecomponent/view');
												$relativeList->post("height",'25');
												$relativeList->post("width",'800');
												$relativeList->post("relativeUserId",$relative->refrelativeuserid_c);
												echo $relativeList->execute(); 
												echo '</li>';
											}
											echo '</ul></div>';
										}
									?>			
						</td>
					</tr>
					<tr >	
						<td height="10">
						</td>		
					</tr>

					<tr>
						<td height="25" colspan="4" align="left" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-left:10px;">
							<input type="hidden" id="isemailvalid" name="isemailvalid" value="true"/> 
							Total Number of relatives : <?php echo count($objRelatives); ?>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
<div id="linkpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Link account</td>
				<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
					<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="$('#linkpopup').dialog('close');"/>
				</td>
			</tr>
	</table>
	
	<form id="linkform" method="post" onclick="" enctype="multipart/form-data"  action="link"  >
	<input type="hidden" value='' id="linkrelativeid" name="linkrelativeid" />

	<div id="contentdiv" style="height:100px;overflow-y:auto;overflow-x:hidden;"  >
		<table>
			<tr>
				<td width="70px" class="bodytext_normal" style="padding-left:10px;vertical-align:top;padding-top:5px;">
					Email
				</td>
				<td width="370px">
					:&nbsp;<input type="text" class="textarea" style="width:200px;" maxlength="45"  value="<?php if($previousvalues != null)if(isset($previousvalues['linkemailid']))echo $previousvalues['linkemailid']; ?>" id="linkemailid" name="linkemailid" /> <div id="linkemailerror" style="display:none;" class="bodytext_error">&nbsp;&nbsp;&nbsp;Email must be unique. Please write other email ID.</div>
				</td>
			</tr>

			
		</table>
        </div>
	<div class="bodytext_normal" align="right" style="height:25px;border-top:1px solid #a8c8d9;background: #ecf8fb;padding-top:5px; padding-right:10px;vartical-align:middle;align:right;">
		<input type="button" class="button" value="Cancel" style="width:100px;height:20px;" onclick="$('#linkpopup').dialog('close');" />
		<input type="button" class="button" value="Link" style="width:100px;height:20px;" onclick="isValidLinkform();" />
	</div>
	</form>
</div>

 <div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Add Relative</td>
				<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
					<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="$('#addpopup').dialog('close');"/>
				</td>
			</tr>
	</table>
	
	<form id="relativeform" method="post" enctype="multipart/form-data"  action="add" style="margin-bottom:0px;" >
		<div id="addrelative" style="overflow-y:auto;overflow-x:hidden;"  >
			<table cellspacing="6">
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						First Name *
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<input type="text" class="textarea" id='firstname' name='firstname' style="width:200px;" value="<?php if($previousvalues != null)if(isset($previousvalues['firstname']))echo $previousvalues['firstname']; ?>" />
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
						:&nbsp;&nbsp;<input type="text" class="textarea" id='lastname' name='lastname' style="width:200px;" value="<?php if($previousvalues != null)if(isset($previousvalues['lastname']))echo $previousvalues['lastname']; ?>" />
						<script>
							var lastname = new LiveValidation('lastname', {onlyOnSubmit: true });
							lastname.add( Validate.Presence );
							lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );
						</script>

					</td>
				</tr>
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Country
					</td>
					<td width="370px">
						:&nbsp;&nbsp;<select name="country_c" class="textarea gray"  onchange="setisdcode(this,'isdrelativeno','isdrelativeno');" tabindex="5" id="country" style="width:200px;"> 
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
				</tr>
				
				<tr>
					<td width="70px" class="bodytext_normal" style="padding-left:10px;">
						Contact No. *
					</td>
					<td width="370px">
						
						:&nbsp;&nbsp;
						<input id="isdrelativeno" style="width:25px" type="text"  class="textarea" name="isdrelativeno"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdrelativeno'); ?>"  maxlength="4" readonly="true"/> &nbsp;_&nbsp;
						<input type="text" class="textarea" style="width:140px;" value="<?php if($previousvalues != null)if(isset($previousvalues['number']))echo $previousvalues['number']; ?>" id="number" name="number" />
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
						Email *
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
			<input type="button" class="button" value="Cancel" style="width:100px;" onclick="$('#addpopup').dialog('close');" />
			<input type="submit"  class="button" value="Add" style="width:100px;" onclick="isValidRelativeform();" />
		</div>
	</form>
</div>
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
