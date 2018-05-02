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
	function startcron()
	{
		$.ajax({
			url: "/ayushman/cbackgroundprocesses/schedule",
			success: function( data ) {
				alert(data);
			},
			error : function(){}
		});
	}
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 430px; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Background Processes</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	 <form id="searchform" method="post" enctype="multipart/form-data"  action="search"  >
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
				<td>
				<div style="max-height:25px">
					<table id = "searchguide" style="width:100%;display:block">
						<tr class="Heading_Bg">
							<td width="15%" align="middle">Name of Process</td>
							<td width="10%" align="middle">Status</td>
							<td width="21%" align="middle">Last Time of Execution</td>
							<td width="34%" align="middle">Last Execution Result</td>
							<td width="20%" align="middle">&nbsp;</td>
						</tr>
					</table>
				</div>
				</td>
			</tr>
			<tr>
				<td>
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
								  for($i=0;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
									$encrypt = Encrypt::instance('default');	
									  echo '<td width="15%" align="middle" title="'.$result[$i]->description.'">'.$result[$i]->processname.'</td>
										<td width="10%" align="middle">'.$result[$i]->status.'</td>
										<td width="21%" align="middle">'.$result[$i]->timeofexecution.'</td>
										<td width="34%" align="middle">'.$result[$i]->result.'</td>
										<td width="20%" align="middle">';
										if($result[$i]->status == "Inactive"){echo '<a href=/ayushman/ccronscheduler/start?p='.urlencode($encrypt->encode($result[$i]->processid)).'>Activate</a> / ';} 
										if($result[$i]->status == 'Active'){echo '<a href=/ayushman/ccronscheduler/stop?p='.urlencode($encrypt->encode($result[$i]->processid)).' >Deactivate</a> / ';} 
										if(($result[$i]->status == 'Active') || ($result[$i]->status == 'Inactive')){echo '<a href=/ayushman/ccronscheduler/view?p='.urlencode($encrypt->encode($result[$i]->processid)).' >Edit</a> / ';}else{echo '<a href=/ayushman/ccronscheduler/view?p='.urlencode($encrypt->encode($result[$i]->processid)).' >Schedule</a> / ';} 
										if(($result[$i]->status == 'Active') || ($result[$i]->status == 'Inactive')){echo '<a href=/ayushman/ccronscheduler/execute?p='.urlencode($encrypt->encode($result[$i]->processid)).' >Execute</a> / ';}
									 echo '<a href=/ayushman/cprocesslog/view?cj='.urlencode($encrypt->encode($result[$i]->cronjobid)).'>Logs</a>';
										echo  '</td>';			
									  echo "</tr>";
								  }
							    }
						    ?>
							</td>
						</tr>
						<tr>
      							<td height="25" colspan="5" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;">&nbsp;<?php echo 'Total number of processes : '.$i; ?> 
							</td>
						</tr>

					    </table>
				    </div>
				</div>
				</td>
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
