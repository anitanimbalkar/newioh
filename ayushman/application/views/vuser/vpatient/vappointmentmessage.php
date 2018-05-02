<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<div style="height:550px;padding-top: 3px;vertical-align:top;" align="center">
<div class="content_bg" style="height:auto;overflow:auto;overflow-x:hidden;vertical-align:top;" align="center" >
	<table class="content_bg"  valign="top" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="Heading_Bg" align="left" style="padding-left:25px;">Appointment Message</td>
		</tr>
		<tr>
			<td align="left" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
					<?= $greet; ?>
			</td>
		</tr>
		<tr>
			<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">You have not selected any plan. You won't be able to take appointment without selecting plan.</td>
		</tr>
		<tr>
			<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">Please go to 'Choose Plan' and select suitable plan.</td>
		</tr>
		<tr>
			<td><hr width="100%" style="color:#11587E"></td>
		</tr>
		<tr>
			<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;"><input type="button" class="button" value="Choose Plan" style="width:100px" onclick="parent.getcontent('/ayushman/cplanselector/view');"/>&nbsp;&nbsp;<input type="button" class="button" value="Back" style="width:100px" onclick="parent.getcontent('/ayushman/cdoctordirectory/view');"></td>
		</tr>                 
	</table>
</div>
</div>
