<html>
<head>
<title>Upload Employees in Corporate Account...</title>
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
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 430px; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Logs for <?php echo '"'.$processname.'"'; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	 <form id="searchform" method="post" enctype="multipart/form-data"  action="search?cj=<?php echo $cronJobId; ?>"  >
		<table width="100%"  align="left" cellpadding="0" cellspacing="0" style="padding-top:10px;" >
			<tr>
				<td  width="70%" align="right" class="bodytext_bold" valign="bottom">&nbsp;&nbsp;Search&nbsp;:&nbsp;</td>
				<td  width="20%" valign="bottom" ><input type="text" style="width:100%;" name="search" id="search" value="<?php if($previousvalues != null)echo $previousvalues['search']; ?>" onChange="$('#searchform').submit();" class="textarea"  /></td>
				<td  width="4%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit"style="height:18px; width:18px;background: url(/ayushman/assets/images/search.jpg) no-repeat;" value="" /></td>
			</tr>
		</table>
	</form>
	<div style="width:100%;margin-top:18px;">
		<table width="100%"  align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<div style="max-height:25px">
					<table id = "searchguide" style="width:100%;display:block">
						<tr class="Heading_Bg">
							<td width="15%" align="middle">Date Time</td>
							<td width="21%" align="middle">Result</td>
							<td width="64%" align="middle">Description</td>
						</tr>
					</table>
				</div>
			</tr>
			<tr>
				<div style="max-height:25px">
					<div style="max-height:300px;overflow:auto;">
					    <table id = "searchresult" style="width:100%;display:block" class="bodytext_normal">
						<tr>
							<td>
						    <?php 
							    $result = $result;
							    if(count($result) == 0){
								  echo '<div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=count($result)-1;$i>=0;$i--){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
									  echo '<td width="15%" align="middle">'.$result[$i]->time_c.'</td>
										<td width="21%" align="middle">'.$result[$i]->result_c.'</td>
										<td width="64%" align="middle">'.$result[$i]->description_c.'</td>';		
									  echo "</tr>";
								  }
							    }
						    ?>
							</td>
						</tr>
					
					    </table>
				    </div>
					<table style="width:100%" class="bodytext_normal">
						<tr>
			      				<td height="25" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;padding-top:3px;padding-bottom:3px;">&nbsp;<?php echo 'Total number of records : '.count($result); ?> <input type="button" value="Back" onclick="parent.getcontent('/ayushman/cbackgroundprocesses/view');" class="button" style="width:100px;height:20px;float:right;margin-right:10px;"/>

							</td>
						</tr>	
					</table>

				</div>
			</tr>
		
		</table>
		
		
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
