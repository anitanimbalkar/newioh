
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js">
</script>
<script type="text/javascript">
	$(document).ready(function() {
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != ""){
			showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
		}
	});
	function selectmessage(select){
		val = JSON.parse($(select).val());
		val['variable'].unshift('mobile');
		val['variable'].unshift('emailid');
		val['variable'].unshift('id');
		
		$('#excelvalidation').html('Excel file must contain '+JSON.stringify(val['variable'])+' columns. </br>   Either id OR email/mobile required.');
		$("#template").val($( "#templates option:selected" ).text());
		$("#variables").html(JSON.stringify(val['variable']));
		$("#subject").html(val['subject']);
		$("#message").html(val['mailbody']);
		resize();
	}
	function validatefile(file)
	{
		document.getElementById("lblimageerror").style.display = "none";
		ext = (file.value).split('.');
	}
	function validateform()
	{
		if($( "#templates" ).val() == ''){
			alert('Select notification template');
			return false;
		}

		if($( "#file2" ).val() == ''){
			alert('Select excel file');
			return false;
		}
		var answer = confirm ("Please Click 'OK' to send notifications otherwise click 'Cancel'.")
		if (answer){
			return true;
		}
		else{
			return false;
		}
		return true;
	}
</script>

<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;">
  
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              Bulk Notification
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <form id="catalogform2" method="post" enctype="multipart/form-data" onsubmit="return validateform();" action="/ayushman/cnotification/send" >
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td width="20%"style="padding:4px" class="bodytext_bold" >
				Select template : <select name="templates"  id="templates" class="textarea"  onchange="selectmessage(this);"> 
					<option value=''> Select</option>
						<?PHP
							foreach ($templates as $template=>$variables) {
								$isselected = '';
								if ($previousvalues != null) {
									$isselected = ($previousvalues['templates'] == $template) ? 'selected' : '';
								}
								print "<option  \" value='".JSON_encode($variables)."' " . $isselected . ">{$template}</option>";
							}
						?>
					</select>
					<hr />
			</td>
		</tr>
		<tr>
			<td class="bodytext_normal" style="padding:10px;">
				<input type="hidden" id="template" name="template" value=""/>
				<h5>Variables</h5><br/>
				<div id="variables"></div>
				<h5>Subject</h5><br/>
				<div id="subject"></div>
				<h5>Message</h5><br/>
				<div id="message"></div>
				<hr />
			</td>
		</tr>
		<tr>
			<td class="bodytext_normal" style="padding:10px;">
				<div class="bodytext_error" id="excelvalidation"></div><br />
				 Upload Excel File
				  <input type="file" name="file2" id="file2" value="Choose File" onchange="validatefile(this)" class="bodytext_normal"/>
				  
				  <label class="bodytext_normal">
				  </label>
				  <label id="lblimageerror" style="display:none;" class="bodytext_error">
					Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  </label>
				  <hr />
			</td>
		</tr>
		<tr>
			<td class="bodytext_normal" style="padding:10px;">
				<input type="checkbox" name="sms" id="sms"  checked /><label for="sms">Send SMS</label>
				<br/><input type="checkbox" name="email" id="email" checked /><label for="email">Send Email</label>
				<br/><br/><input type="submit" class="button" name="submit1" id="submit1" value="Send Notifications"/>
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
