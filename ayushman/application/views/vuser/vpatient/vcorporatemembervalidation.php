<html>
<head>
<title>Create Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
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
		$('#companyname').focus(function(){
			var urlsearch= "/ayushman/cautocompleter/autocomplete?column=corporatename_c&query=select corporatename_c from corporates where corporatename_c";
			$("#companyname").autocomplete({source: urlsearch}); 
		});
		var DOB_c = new LiveValidation('DOB_c',{onlyOnSubmit: true });
			DOB_c.add( Validate.Presence );
		var companyname = new LiveValidation('companyname',{onlyOnSubmit: true });
			companyname.add( Validate.Presence );
		var employeeid = new LiveValidation('employeeid',{onlyOnSubmit: true });
			employeeid.add( Validate.Presence );

		$( "input[name=DOB_c]" ).datepicker({yearRange: "-120:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:100%;height: 450px; overflow-x:hidden;" >
	<div class="clearfix visible-xs">&nbsp;</div>
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Employee Validation</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div style="width:100%;"  class="content_bg">
		<form class="cmxform" id="companyprofileform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/validate">
			<table width="100%" class="employee-validation-form">
				<tr width="100%" >
					<td  width="50%" align="left" valign = "bottom" class="bodytext_bold" >Company Name * :
						<div class="clearfix hide-data">&nbsp;</div>
						<input type="text" style="width:150px;" name="companyname" id="companyname" value="<?php if(($previousvalues != null)&&isset($previousvalues['companyname']))echo $previousvalues['companyname']; ?>" class="textarea" />
					</td>
					<td align="left" width="50%" valign = "bottom" class="bodytext_bold" >Employee Id * :
						<div class="clearfix hide-data">&nbsp;</div>
						<input type="text" style="width:150px;" name="employeeid" id="employeeid" value="<?php if(($previousvalues != null)&&isset($previousvalues['employeeid']))echo $previousvalues['employeeid']; ?>" class="textarea" />
					</td>
				</tr>
				<tr>
					<td  align="left" width="50%" valign = "bottom" class="bodytext_bold" >Date Of Birth * :
						<div class="clearfix hide-data">&nbsp;</div>
						<input id="DOB_c" name="DOB_c" style="width:150px;"  readonly="readonly"  value="<?php if(($previousvalues != null)&&isset($previousvalues['DOB_c']))echo $previousvalues['DOB_c']; ?>" type="text" class="textarea"/>
					</td>
					<td  align="left" width="50%" valign = "bottom" class="bodytext_bold" >Company Email Id :
						<div class="clearfix hide-data">&nbsp;</div>
						<input type="text" style="width:150px;" name="emailid" id="emailid" value="<?php if(($previousvalues != null)&&isset($previousvalues['emailid']))echo $previousvalues['emailid']; ?>" class="textarea" />
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:1px;" >
						<HR style="height:0.5px"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-top:1px;" >
						<input type="submit" class="button" height="22" style="width: 80px; height: 25px; " value="Associate"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>