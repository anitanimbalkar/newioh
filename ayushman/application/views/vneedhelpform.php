<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(document).ready(function(){
		
		
		
		
		if($.trim($('#errorlistdiv').html()) != "")
		{	
			alert($('#errorlistdiv').html());
			showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		}
		if($.trim($('#messagelistdiv').html()) != "")
		{	
			var displaystring= $('#messagelistdiv').html();
			
			showNotification('250', '50','Success',$('#messagelistdiv').html(),'notification','id',5000);
			
		}	
	});
</script>
<div  style="width:970px; height:auto;border:1; align:left;" > 
	<form class="cmxform" id="needhelpform"  action="/ayushman/chelper/save" method="post">
		<table border="0" cellspacing="0" cellpadding="0"  class="content_bg" style="align:left;width:950px;border:1px solid #284889;">
			<tr>
				<td colspan="4">
					<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg" align="left">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Need Help</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr >
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left" colspan="4" >
							<td width="29" valign="top" ><div class="table_roundBorder" style="margin-top:0px;background-color:#ecf8fb;width:900px;margin:auto;"><div id="help-main" style="margin-left:15px;"><p class="bodytext_bold" style="font-size:12px;margin:5px;">Please fill and submit this form. <br/>Our customer support will contact you shortly after that.</p></div></div>	</td> 
						</tr>
					</table>
				</td>
			</tr>
			
			
			<tr >
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">Name*</td>
							<td width="227" valign="top"><input name="needhelpfor_name" id="needhelpfor_name" type="text" maxlength="45" class="textarea" size="25" /></td>
				<script type="text/javascript">													
				var firstname = new LiveValidation('needhelpfor_name');
						firstname.add( Validate.Presence );
					firstname.add( Validate.Format, { pattern: /^[a-z A-Z.]+$/,failureMessage: "Only characters allowed"} );
				</script>
							
							<td width="77" valign="middle" align="left">Phone Number</td>
							<td width="227" valign="top"><input name="contactdetails" id="contactdetails" type="text" maxlength="10" class="textarea" size="25"  /></td>
				<script type="text/javascript">													
		var contactdetails = new LiveValidation('contactdetails');
		contactdetails.add( Validate.Numericality, {onlyInteger: true } );
				contactdetails.add( Validate.Length, { is: 10 });
		contactdetails.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "Only numbers allowed"} );
			</script>
						</tr>
					</table>
				</td>
			</tr>
			<tr >
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" valign="middle" align="left">Email*</td>
							<td width="227" valign="top"><input name="needhelpfor_email" id="needhelpfor_email" type="text" maxlength="45"  class="textarea" size="25"  /></td>
							<script type="text/javascript">
							var email = new LiveValidation('needhelpfor_email');
								email.add( Validate.Presence );
								email.add( Validate.Email );
							</script>
						
							<td width="77" valign="middle" align="left">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="2" colspan="5" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR height="0.5px" style="height:0.5px"/></div></td>
			</tr>
			<tr>
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left" id="accounttypetr">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" align="left" valign="middle" >Need Help For *</td>
							<td width="227" valign="top">
								<select id="needhelpforselect" name="needhelpforselect" style="width:150px;">
      								<option>AyushCare Service</option>
      								<option>Registration page</option>
      								<option>Other</option>
    							</select>
							</td>
							<td width="77" valign="top">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>	
					</table>
				</td>
			</tr>
			<tr >
				<td >
					<table width="970px" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px;">
						<tr height="30px" valign="top" align="left">
							<td width="29" valign="top">&nbsp;</td> 
							<td width="75px" valign="top" align="left">Comments*</td>
							<td width="227" valign="top"><textarea name="needforhelp_comments" id="needforhelp_comments" style="font-family: tahoma,Helvetica,sans-serif;font-size:11px;resize:none;" cols="32" rows="4" ></textarea></td>
						<script type="text/javascript">
			var comments = new LiveValidation('needforhelp_comments');
			comments.add( Validate.Presence );							
							</script>
	
							<td width="77" valign="middle" align="left">&nbsp;</td>
							<td width="227" valign="top">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="2" colspan="5" align="left" style="padding-left:42px;padding-right:20px;" valign="middle"><div style="color:#11587E;"><HR height="0.5px" style="height:0.5px"/></div></td>
			</tr>
			<tr align="left" >  
				<td  style="float:left;" width="42">
				&nbsp;
				</td> 
				<td  style="float:left;padding-top:10px;" style="padding-left:15px;padding-right:20px;"><input type="submit" class="button" height="22" style="width: 80px; height: 25px; " value="Submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.location='/ayushman/'" class="button" height="22" style="width: 80px; height: 25px;" value="Home"/></td>
			</tr>	
			<tr align="left" >  
				<td  style="float:left;" width="42">
				&nbsp;
				</td> 
			</tr>	
    	</table> 
	</form>
</div>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>

<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
