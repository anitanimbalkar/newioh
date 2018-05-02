<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		$(document).ready(function() {
			parent.parent.pageloaded();
			if($.trim($('#consultationerrorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#consultationerrorlistdiv').html()),'error','errordialogboxid');
				
			if($.trim($('#consultationmessagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#consultationmessagelistdiv').html()),'notification','messagedialogboxid',5000);
		});
		function upload(file)
		{
			parent.parent.pagebusy();
			document.getElementById("lblimageerror").style.display = "none";
			ext = (file.value).split('.');
			if(ext[1]== "xls" || ext[1]== "xlsx")
			{
				document.getElementById("lblimageerror").style.display = "none";
				$("#submit").trigger("click");
			}
			else
				document.getElementById("lblimageerror").style.display = "block";
		}
	</script>
<div style="width:inherit;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:inherit;" >				  
		<span class="bodytext_bold" style="float:right">Download xls format for uploading Consultation Data <span style="color:blue">Download</span></span><br/>
		<form id="consultationdataform" method="post" enctype="multipart/form-data"  action="/ayushman/cconsultationdata/upload"  >
			<span class="bodytext_bold" style="float:right">Upload Consultation Data
				<input type="file" name="file" id="file" value="Choose File"  onchange="upload(this)" class="bodytext_normal"/>  <label class="bodytext_normal"></label><label id="lblimageerror" style="display:none;" class="bodytext_error">Selected file should be in .xsl format...</label>
				<input type="hidden" name="serviceid" id="serviceid" value="<?php echo $serviceid; ?>" />
				<input type="hidden" name="packageid" id="packageid" value="<?php echo $packageid; ?>" />
				<input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
			</span>
		</form>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="consultationerrorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="consultationmessagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>