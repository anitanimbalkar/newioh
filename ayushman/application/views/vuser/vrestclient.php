<html>
<head>
<title>Export registration data to tally</title>
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
		$('#btnget').click(function() {
    			$.ajax({
				  type: "GET",
				  url: $('#search').val(),
				  success: function(data){
					$('#result').html(data);
				  },
				});
		});	
		$('#btnpost').click(function() {
    			$.ajax({
				  type: "POST",
				  url: $('#search').val(),
				  success: function(data){
					$('#result').html(data);
				  },
				});
		});	
		if($.trim($('#errorlistdiv').html()) != ""){
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		}			
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});

</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:100%; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Rest Client</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
		<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;" cellpadding="0">
			<tr>
				<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;">
					<div style="display:block;width:550px;float:left;text-align:center;padding-top:3px;">
							Enter API URL : <input type="text" name="search" id="search" class="textarea" style="width:450px;" placeholder="URL" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
					</div>
					<div style="width:35px;float:left;">
							<input type="button" id='btnget' style="width:70px" value="Get" /> &nbsp;&nbsp;
							<input type="button" id='btnpost' style="width:70px" value="Post" />
					</div>
				</td>
			</tr>
		</table>
		<div id='result' style="display:block;height:0px;">
			
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
