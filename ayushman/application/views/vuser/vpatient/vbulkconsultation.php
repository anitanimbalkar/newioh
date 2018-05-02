<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
		function uploadcatalog(file)
		{
			document.getElementById("lblimageerror").style.display = "none";
			ext = (file.value).split('.');
			
			if(ext[ext.length - 1]== "xls" || ext[ext.length - 1] == "xlsx") 
			{
				parent.pagebusy();
				$("#submit").trigger("click");
				//document.forms["catalogform"].submit();
			}
			else
				document.getElementById("lblimageerror").style.display = "block";
		}
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
		  <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Bulk Consultations</td>
		</tr>
		<tr width="100%">    
			<td align="left" style="padding-top:20px;padding-left:20px" class="bodytext_bold">	
				<form id="catalogform" method="post" enctype="multipart/form-data"  action="/ayushman/cbulkconsultation/uploadconsultation"  >
					<input type="button" class="button" style="float:left;" onclick="window.location = '/ayushman/cbulkconsultation/downloadformat'" value="Download Format" /> 
					</br></br></br></br></br>
					Upload Consultations (Only .xls / .xlsx File) - 
					<input type="file" name="file" id="file" value="Choose File"  onchange="" class="bodytext_normal"/>  <label class="bodytext_normal"></label>
					<label id="lblimageerror" style="display:none;" class="bodytext_error">Only .xls / .xlsx format is allowed.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
					</br></br>
					<input type="button" class="button" name="btnproceed" id="btnproceed" style="width:120px" onclick="uploadcatalog(document.getElementById('file').value)" value="Proceed"/>
				</form>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td style="padding-top:1px;" >
				<HR style="height:0.5px"/>
			</td>
		</tr>
	</table>
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
