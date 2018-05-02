<html>
<head>
<title>IPD BillS</title>
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
			$('#searchButton').click(function() {
    			$('#dates').show();  //change the form action
			$('#dates').submit();  // submit the form
		});	

	$('#patientsearchform').keypress(function(e) {
		if(e.which == 13) {
			searchForPatient();
		}
	});
			});
	
	function checkMode(cellvalue, options, rowObject){
		if(cellvalue == 0){
			return 'Cash';
		}else{
			return 'Priview';
		}

	}

	// function actionviewformatter (cellvalue, options, rowObject )
	// { 
	// 	var patientsid=document.getElementById('patientsid');
	// 	var temp = $(rowObject).children()[0].firstChild.data;
	// 	var temp2 = $(rowObject).children()[1].firstChild.data;
	
	// 	//if($('#selectedPatient').val() == 'admitted'){
	// 	//	return '<a  id="fancybox-manual-b" href="javascript:;" onclick="showprofile('+cellvalue+');" ><font color="blue">Priview Bill</font></a>/</br><a  id="fancybox-manual-b" href="javascript:;" onclick="buildPatientNetwork('+cellvalue+');" ><font color="blue">View Network</font></a>';
	// 	//}else{
	// 		return '<a  id="fancybox-manual-b" href="javascript:;" onclick="showprofile('+temp+');" valign="top" ><font color="blue">Preview Bill</font></a>';
	// 	//}
		
	// }
	
	// function showprofile(id)
	// {
	
		
	// parent.openDialog('/ayushman/cipdbills/viewbill?id='+id,'73%','100%');
		
	// }
	
	

	





</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- 		 <form id="searchform" method="post" enctype="multipart/form-data"  action="search"  >
 -->
<div style="width:828px;height:auto; overflow-x:hidden;" > 
	<input name="patientsid" id="patientsid" class="textarea" type="hidden" value="" size="17"/>
													
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;IPD Bills</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
	
	<div id="registedUser"  >
<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
	<tr>
		<td width="15%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
		<td width="38%" > <input id = "id" name="id" autocomplete="on" autofocus="autofocus" value="<?php if($previousvalues != null)echo $previousvalues['id']; ?>" class = "textarea" /></td>
	</tr>
	 <tr>
		<td valign="middle"><label class = "bodytext_bold">Patient Name :</label></td>
		<td><input id = "patName" name="patName" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patName'];?>"  /></td>
		<td valign="middle"><label class = "bodytext_bold">Case No :</label></td>
		<td><input id = "caseno" name="caseno" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['caseno']; ?>" /></td>
	</tr>
	
	<tr>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button onClick="$('#searchform').submit();"  class="button" id = "search1" name = "search1" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" />Search</button></td>
       </tr>
</table>
</div>

<div style="width:100%;margin-top:18px;height:100%;">
		<table width="100%" height="100%" align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<td>
				<div style="max-height:100%">
					<table id = "searchguide" style="width:100%;height:100%;display:block">
						<tr class="Heading_Bg">
							<td width="140" align="middle">Patient Name</td>
							<td width="140" align="middle">Case No</td>
							<td width="140" align="middle">Admit date</td>
							<td width="140" align="middle">Discharge date</td>
							<td width="140" align="middle">Status</td>
							<td width="140" align="middle">Action&nbsp;&nbsp;</td>

						</tr>
					</table>
				</div>
				</td>
			</tr>
			<tr>
				<td>
				<div style="max-height:100%">
					<div style="max-height:100%;overflow:auto;">
					    <table id = "searchresult" style="width:100%;display:block;height:100%;" class="bodytext_normal">
						<tr>
							<td>
						    <?php $i=0;
							    $result = $result;
							    if(count($result) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=0;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
									$encrypt = Encrypt::instance('default');	
									  echo '<td width="140" align="middle" >'.$result[$i]->onlypatientname.'</td>
										<td width="140" align="middle">'.$result[$i]->refid.'</td>
										<td width="140" align="middle">'.$result[$i]->admitdate_c.'</td>
										<td width="140" align="middle">'.$result[$i]->dischargedate_c.'</td>
										 <td width="140" align="middle">'.$result[$i]->status_c.'</td>
										 <td width="140" align="middle">';
										echo '<a href=/ayushman/cipdbills/viewbill?id='.$result[$i]->patientsid.' ><font color="blue">Preview Bill</font></a> ';
											echo "</td>";
									  echo "</tr>";
								  }
							    }
						    ?>
							</td>
						</tr>
						<tr>
      							<td height="25" width="100%" colspan="6" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;">&nbsp;<?php echo 'Total number of processes : '.$i; ?> 
							</td>
						</tr>

					    </table>
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
</form> 