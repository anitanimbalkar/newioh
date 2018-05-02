<html>
<head>
<title>Edit Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
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
		
	
		var corporateworkphone_c = new LiveValidation('corporateworkphone_c', {onlyOnSubmit: true });
		corporateworkphone_c.add( Validate.Numericality, {onlyInteger: true } );
		corporateworkphone_c.add( Validate.Length, { is: 10 });
		corporateworkphone_c.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
		corporateworkphone_c.add( Validate.Presence );
		
		var line1_c = new LiveValidation('line1_c', {onlyOnSubmit: true });
		line1_c.add( Validate.Presence );
		
		var nearlandmark_c = new LiveValidation('nearlandmark_c',{onlyOnSubmit: true });
		nearlandmark_c.add( Validate.Presence );
		
		var country_c = new LiveValidation('country_c', {onlyOnSubmit: true });
		country_c.add( Validate.Presence );
		$('#country_c').focus(function(){
			var urlcountry= "/ayushman/cautocompleter/country";
			$("#country_c").autocomplete({source: urlcountry});
		});
			
		var state_c = new LiveValidation('state_c', {onlyOnSubmit: true });
		state_c.add( Validate.Presence );
		$('#state_c').focus(function(){
			var urlstate= "/ayushman/cautocompleter/state";
			$("#state_c").autocomplete({source: urlstate});
		});
			
		var city_c = new LiveValidation('city_c', {onlyOnSubmit: true });
		city_c.add( Validate.Presence );
		$('#city_c').focus(function(){
			var urlcity= "/ayushman/cautocompleter/city";
			$("#city_c").autocomplete({source: urlcity});
		});
		
		var location_c = new LiveValidation('location_c', {onlyOnSubmit: true });
		location_c.add( Validate.Presence );
		$('#location_c').focus(function(){
			var urlloc= "/ayushman/cautocompleter/locality";
			$("#location_c").autocomplete({source: urlloc});
		});
			
		var pin_c = new LiveValidation('pin_c', {onlyOnSubmit: true });
		pin_c.add( Validate.Presence );
		$('#pin_c').focus(function(){
			var urlpin= "/ayushman/cautocompleter/pin";
			$("#pin_c").autocomplete({source:urlpin});
		});

		var contactpersonname_c = new LiveValidation('contactpersonname_c', {onlyOnSubmit: true });
		contactpersonname_c.add( Validate.Presence );

		var contactpersonemailid_c = new LiveValidation('contactpersonemailid_c', {onlyOnSubmit: true });
		contactpersonemailid_c.add( Validate.Presence );
		contactpersonemailid_c.add( Validate.Email );
		
		
		var contactpersonoffphoneno_c = new LiveValidation('contactpersonoffphoneno_c', {onlyOnSubmit: true });
		contactpersonoffphoneno_c.add( Validate.Numericality, {onlyInteger: true } );
		contactpersonoffphoneno_c.add( Validate.Length, { is: 10 });
		contactpersonoffphoneno_c.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
		contactpersonoffphoneno_c.add( Validate.Presence );
		
		var contactpersonmobno_c = new LiveValidation('contactpersonmobno_c', {onlyOnSubmit: true });
		contactpersonmobno_c.add( Validate.Numericality, {onlyInteger: true } );
		contactpersonmobno_c.add( Validate.Length, { is: 10 });
		contactpersonmobno_c.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
		contactpersonmobno_c.add( Validate.Presence );
		
			var contactpersonname_c = new LiveValidation('contactpersonname_c', {onlyOnSubmit: true });
		contactpersonname_c.add( Validate.Presence );
		
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
	function validateForm(){
		$(".ui-dialog-titlebar").hide();
		$('#loading').dialog('open');
		return true;
	}
	
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 450px; overflow-x:hidden;" > 
	<form class="cmxform" id="companyprofileform" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/update">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="content_bg">
		<tr>
		  <td colspan="5" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/> &nbsp;Edit <?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?> Details</td>
		</tr>
		<tr>
		  <td width="24" height="30">&nbsp;</td>
		  <td width="96" height="30" class="bodytext_normal">Company Name  : </td>
		  <td width="312" height="30"><input name="corporatename_c" type="text" class="textarea" id="corporatename_c" value="<?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>" size="30"/></td>
		  <td width="83" height="30" class="bodytext_normal">Office Phone * : </td>
		  <td width="285" height="30"><input name="corporateworkphone_c" type="text" class="textarea" id="corporateworkphone_c" value="<?php if($previousvalues != null)echo $previousvalues['corporateworkphone_c']; ?>" size="30"/></td>
		</tr>
		<tr>
		  <td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal">Address Line1 * : </td>
		  <td height="30"><input name="line1_c" type="text" class="textarea" id="line1_c" value="<?php if($previousvalues != null)echo $previousvalues['line1_c']; ?>" size="30"/></td>
		  <td height="30" class="bodytext_normal">Landmark * : </td>
		  <td height="30"><input name="nearlandmark_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['nearlandmark_c']; ?>" id="nearlandmark_c" size="30"/></td>
		</tr>
		<tr>
		  <td height="30">&nbsp;</td>
		   <td class="bodytext_normal">Locality * : </td>
		  <td><input name="location_c" type="text" class="textarea" id="location_c" value="<?php if($previousvalues != null)echo $previousvalues['location_c']; ?>" size="30"/></td>
		  <td class="bodytext_normal">City * : </td>
		  <td><input name="city_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['city_c']; ?>" id="city_c" size="30"/></td>
		</tr>
		<tr> 
			<td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal">State * : </td>
		  <td height="30"><input name="state_c" type="text" class="textarea" id="state_c" value="<?php if($previousvalues != null)echo $previousvalues['state_c']; ?>" size="30"/></td>
		  <td height="30" class="bodytext_normal">Country * :</td>
		  <td height="30"><input name="country_c" type="text" class="textarea" id="country_c" value="<?php if($previousvalues != null)echo $previousvalues['country_c']; ?>" size="30"/></td>
		</tr>		
		<tr>
		  <td height="30">&nbsp;</td>
		  <td class="bodytext_normal">Pin * : </td>
		  <td><input name="pin_c" type="text" class="textarea" id="pin_c" value="<?php if($previousvalues != null)echo $previousvalues['pin_c']; ?>" size="30"/></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="5">&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="5" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/> &nbsp;Contact Person Details</td>
		</tr>
		<tr>
		  <td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal">Person Name * : </td>
		  <td height="30"><input name="contactpersonname_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['contactpersonname_c']; ?>" id="contactpersonname_c" size="30"/></td>
		  <td height="30" class="bodytext_normal">Email Id * : </td>
		  <td height="30"><input name="contactpersonemailid_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['contactpersonemailid_c']; ?>" id="contactpersonemailid_c" size="30"/></td>
		</tr>
		<tr>
		  <td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal">Office Phone * : </td>
		  <td height="30"><input name="contactpersonoffphoneno_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['contactpersonoffphoneno_c']; ?>" id="contactpersonoffphoneno_c" size="30"/></td>
		  <td height="30" class="bodytext_normal">Mobile Number * : </td>
		  <td height="30"><input name="contactpersonmobno_c" type="text" class="textarea" value="<?php if($previousvalues != null)echo $previousvalues['contactpersonmobno_c']; ?>" id="contactpersonmobno_c" size="30"/></td>
		</tr>
		<tr>
		  <td colspan="5">&nbsp;</td>
		</tr>
		<tr>
		  <td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal"><input type="submit" class="button" height="22" style="width: 80px; height: 25px; " value="Update"/></td>
		  <td height="30">&nbsp;</td>
		  <td height="30" class="bodytext_normal">&nbsp;</td>
		  <td height="30">&nbsp;</td>
		</tr>
	  </table>
	  <input type="hidden" name="corporateid" id="corporateid" value="<?php if($previousvalues != null)echo $previousvalues['corporateid']; ?>">
	</form>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'createaccount'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
</body>
</html>