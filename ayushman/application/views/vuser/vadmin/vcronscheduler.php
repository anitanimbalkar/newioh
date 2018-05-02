<html>
<head>
<title>Job Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/jquery-gentleSelect-min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-cron-min.js"></script>
<link type="text/css" href="/ayushman/assets/css/jquery-gentleSelect.css" rel="stylesheet" />
<link type="text/css" href="/ayushman/assets/css/jquery-cron.css" rel="stylesheet" />
<script type="text/javascript">
	$(document).ready(function() {
		$('#cronscheduler').cron({
            		initial: $("#cronschedule").val(),
            		onChange: function() {
				$("#cronschedule").val($(this).cron("value"));
            		}
        	});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	
	});	
</script>

</head>
	<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="padding:2px;" >
<form id="scheduleform" method="post" enctype="multipart/form-data"  action="/ayushman/ccronscheduler/schedule"  >	
	<table width="826px" height="430px" border="0" align="center" cellpadding="0" cellspacing="0">
  		<tr>
			<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Job Details </td>
    		</tr>
    		<tr>
			<td align="left" valign="top" style="padding-top:3px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  		<tr>
						<td width="4%" height="22">&nbsp;</td>
						<td width="16%" class="bodytext_bold">Execute cron job as</td>
						<td width="1%" class="bodytext_bold">:</td>
						<td width="25%"><input name="processname" type="text" readonly class="bodytext_normal" style="border:none;" value="<?php echo $result->name_c; ?>" size="30"/></td>

						<td width="7%" class="bodytext_bold">&nbsp;</td>
						<td width="6%" colspan="2">&nbsp;</td>
						<td width="41%" colspan="2">&nbsp;</td>
			  		</tr>
			  		<tr>
						<td height="22">&nbsp;</td>
						<td class="bodytext_bold">Command</td>
						<td class="bodytext_bold">:</td>
						<td colspan="7"><input id="command" type="text" readonly name="command"  class="bodytext_normal" style="border:none;" value="<?php echo $result->pathtoscript_c; ?>" size="59"/></td>
			  		</tr>
			  		<tr>
						<td height="22">&nbsp;</td>
						<td class="bodytext_bold">Input to command</td>
						<td class="bodytext_bold">:</td>
						<td colspan="7">
							<input id="inputtocommand" name="input" value="<?php if($result->input_c == null){echo 'Not Applicable';}else {echo $result->input_c;} ?>" type="text"  class="bodytext_normal" style="border:none;" size="59"/>
						</td>
			  		</tr>
					<tr>
						<td height="25">&nbsp;</td>
						<td class="bodytext_bold">Active ?</td>
						<td class="bodytext_bold">:</td>
						<td colspan="7">
							<input name="active" id='activeyes' type="radio" value="true" <?php if($result->active_c == 1){echo 'checked';} ?> class="bodytext_normal"><span class="bodytext_normal">Yes</span></input> <input name="active" id='activeno' type="radio" value="false" <?php if($result->active_c == 0){ echo 'checked';} ?> class="bodytext_normal"><span class="bodytext_normal">No</span></input>
							
						</td>
			  		</tr>

			  		<tr>
						<td height="25">&nbsp;</td>
						<td class="bodytext_bold">When to execute</td>
						<td class="bodytext_bold">:</td>
						<td colspan="7">
							<div id="cronscheduler" class="bodytext_normal" style="padding-left:2px;">
							</div>
						</td>
			  		</tr>
					<tr>
						<td height="25">&nbsp;</td>
						<td class="bodytext_bold">Description</td>
						<td class="bodytext_bold">:</td>
						<td colspan="7">
							<input id="description" name="description" type="text" value="<?php echo $result->description_c; ?>"  class="textarea" size="59"/>
						</td>
			  		</tr>
					<tr>
						<td height="10" colspan='10'>&nbsp;</td>
			  		</tr>

					<tr>
						<td colspan="10" height="25" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:3px;">
							<input type="hidden" id="processid" name="processid" value="<?php if($previousvalues != null){echo $previousvalues['processid'];}else{echo $result->id; } ?>"/> 
							<input type="hidden" id="cronschedule" name="cronschedule" value="<?php echo $result->schedule_c; ?>"/>
							<input type="submit" value="Update" class="button" style="width:100px;height:20px;float:right;margin-right:10px;" />
							<input type="button" value="Back" onclick="parent.getcontent('/ayushman/cbackgroundprocesses/view');" class="button" style="width:100px;height:20px;float:right;margin-right:10px;"/>
			</td>

			  		</tr>


				</table>		
			</td>
    		</tr>
  	</table>
</form>
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
</body>
</html>
