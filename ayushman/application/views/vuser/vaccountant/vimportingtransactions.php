<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
		function importtransactions(file)
		{
			document.getElementById("lblimageerror").style.display = "none";
			ext = (file.value).split('.');
			if(ext[1]== "xml")
			{
				$("#submit").trigger("click");
			}
			else
				document.getElementById("lblimageerror").style.display = "block";
				
			// if((ext[1]== "xls") ||  (ext[1]== "xlsx"))
			// {
				// $("#submit").trigger("click");
			// }
			// else
				// document.getElementById("lblimageerror").style.display = "block";
		}
		$(document).ready(function() {
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			if($.trim($('#messagelistdiv').html()) != "")
				showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
		});
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:800px;padding:3px;"> 
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
		   <td style="width:99%;" >
				<table width="100%" height="30px" border="0" class="Heading_bg" cellpadding="0" cellspacing="0">
					<tr>
						<td>Import transactions</td>
					</tr>
				</table>   
			</td>
		</tr>
		<tr width="100%">    
			<td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">	
				<form id="catalogform" method="post" enctype="multipart/form-data"  action="/ayushman/cimportingtransactions/upload"  >Import transactions (Only .xml File)<input type="file" name="file" id="file" value="Choose File"  onchange="importtransactions(this)" class="bodytext_normal"/>  <label class="bodytext_normal"></label><label id="lblimageerror" style="display:none;" class="bodytext_error">Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
				</form>
			</td>
		</tr>
		<tr>
			<td style="padding-top:1px;" >
				<HR style="height:0.5px"/>
			</td>
		</tr>
		<tr>
			<td>
				<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
					<div id="help-main" style="margin-left:5px;">
						<p class="bodytext_bold"style="font-size:12px;margin:10px;">Importing Transactions from Tally includes two steps</p>
						<p class="bodytext_bold"style="font-size:12px;margin:10px;">1. Validation Of File : -
							<p class="bodytext_Normal"style="font-size:12px;margin:10px;">Transactions from the file will be commited in to the system, only if All transactions are valid. If transactions in file are invalid, "Validation_timestamp.xls" file will be downloaded which contains one extra column for comments for mentioning the reason.
						</p>
						</p>
						<p class="bodytext_bold"style="font-size:12px;margin:10px;">2. Importing Transactions : -
							<p class="bodytext_Normal"style="font-size:12px;margin:10px;">After Validating file, all transactions are commited in to the system. If any transaction is failed, reason for the failure will be mentioned in the file downloaded after processing the file. "ReportForImportingTransaction_timestamp.xls" file will be downloaded for the summary of the process.
							<p class="bodytext_Normal"style="font-size:12px;margin:10px;"> If File contains previous transactions which are already commited, these transactions will not be commited again. Only New transactions will be commited.
							</p>
							</p>
						</p>
					</div>
				</div>
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
