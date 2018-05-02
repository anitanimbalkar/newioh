<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script  type="text/javascript" >
	$(function()
		{

			$( "#dob" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});

		}
	);
	function highlight(id,flag){
		if(flag){
			$('#'+'td_'+id+'_1').css('background-color','#FFFFA5');
			$('#'+'td_'+id+'_2').css('background-color','#FFFFA5');
			$('#'+'td_'+id+'_3').css('background-color','#FFFFA5');
		}else{
			$('#'+'td_'+id+'_1').css('background-color','transparent');
			$('#'+'td_'+id+'_2').css('background-color','transparent');
			$('#'+'td_'+id+'_3').css('background-color','transparent');
		}
	}
	$(document).ready(function(){		
		$('#dob_input').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: 300,
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
		result_length = "<?php echo count($result); ?>";
		if(result_length == 0)
		{
			$('#dob_input').dialog('open');
		}
	});
	
	var dateDiff = function ( d1, d2 ) {
		var diff = Math.abs(d1 - d2);
		if (Math.floor(diff/86400000)) {
			return Math.floor(diff/86400000);
		} else if (Math.floor(diff/3600000)) {
			return Math.floor(diff/3600000);
		} else if (Math.floor(diff/60000)) {
			return Math.floor(diff/60000);
		} else {
			return "< 1 minute";
		}
	};

	function customRange() {
		var dob = '<?php echo $dob;?>'.split(',');
		var curr_date = '<?php echo $curr_date;?>'.split(',');
		diff = dateDiff(new Date(dob[0], dob[1] - 1, dob[2]), new Date(curr_date[0], curr_date[1], curr_date[2]));
		var min = new Date(dob[0], dob[1] - 1, dob[2]), //Set this to your absolute minimum date
		dateMin = min,
		dateMax = null,
		dayRange = diff; // Set this to the range of days you want to restrict to
		dateMax = new Date;
		return {
			minDate: dateMin,
			maxDate: dateMax
		};
	}

	function setDOB(){
	  var dob = $('#dob').val();
	  $.ajax({
		url: "/ayushman/cpatientprofile/setDOB?dob="+dob+"&patientId=<?php echo $patientid; ?>",
		success:function(data){
		  location.reload();
		},
		error: function(data){
		}
	  });
	}
		
	function clear_date(id)
	{
		$('#'+id).val(null);
	}	
</script>																						
<div id="wrapper" width="828px" height="auto" style="padding:0px;margin:0px;">
	<table width="828px" height="740px" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td width="100%" align="left" valign="top" class="LeftMenu_BG" style="padding:0px;padding-left:10px;margin:0px;">
				<table width="785" border="0" cellspacing="0" cellpadding="0">
					<tr>
					    <td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="1%">&nbsp;</td>
									<td width="22%" height="30" align="center" valign="middle" class="Rounded_buttonBlue">
										<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientallergy/view?patientUserId=<?php echo $patientid ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" />
									</td>
									<td width="1%">&nbsp;</td>
									<td width="16%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonOrenge">
										<input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cimmunization/view?patientUserId=<?php echo $patientid; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Immunization" />
									</td>
									<td width="1%">&nbsp;</td>
									<td width="18%" align="center" valign="middle" class="Rounded_buttonBlue">
										<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientpastillness/patientpastillness?patientUserId=<?php echo $patientid; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
									<td width="1%">&nbsp;</td>
									<td width="17%" align="center" valign="middle" class="Rounded_buttonBlue">
										<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientfamilyhistory/view?patientUserId=<?php echo $patientid; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Family History" />
									</td>
									<td width="23%">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td class="Heading_Bg"  style=" border-top:1px solid #0d6596;" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" />&nbsp;&nbsp;Immunization</td>
					</tr>
					<tr >
					    <td colspan="4" style="padding-top:10px;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					            <tr>
					                <td align="left" valign="top" >
										<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse; ">
								            <tr>
												<td width="11%"  height="30px;" align="left" valign="middle"  class="bodytext_bold" style="text-align:left; padding-left:15px;"> Age Due </td>
												<td width="13%" height="30px;" align="left" valign="middle"  class="bodytext_bold" style="text-align:left; padding-left:15px;">Due Date </td>
												<td width="31%" height="30px;" align="left" valign="middle"  class="bodytext_bold"  style="text-align:left; padding-left:15px;">Immunization</td>
												<td width="31%" height="30px;" align="left" valign="middle"  class="bodytext_bold"  style="text-align:left; padding-left:15px;">&nbsp;</td>
												<td width="14%" height="30px;" align="left" valign="middle" class="bodytext_bold" style="text-align:left; padding-left:15px;">Actual Date</td>
											  </tr>
											<form id="immunizationform" method="post" enctype="multipart/form-data"  action="/ayushman/cimmunization/save" >
											<input type="hidden" name="patientUserId" value="<?php echo $patientid ?>" />
											<?php foreach($result as $temp) {?>
								            <tr>
										  		<td rowspan="<?php echo count($temp['elements']) ?>" align="left" valign="middle" style="border-bottom:2px solid #0d6596; padding-left:15px;" class="bodytext_normal"><?php echo $temp['due_age'];?></td>
												<td rowspan="<?php echo count($temp['elements']) ?>" align="left" valign="middle" class="bodytext_normal" style="border-bottom:2px solid #0d6596; padding-left:15px;"><?php echo date('d M Y',strtotime($temp['due_date']));?></td>
												<?php foreach ($temp['elements'] as $element) {?>
												<script type="text/javascript">
													$(function() {
														$( "input[name=<?php echo $element['id'];?>_actual_date]" ).datepicker({yearRange: "-140:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy',beforeShow: customRange});
														if($('#'+"<?php echo $element['id'];?>"+'_'+"<?php echo $element['status'];?>").val()== 1 || $('#'+"<?php echo $element['id'];?>"+'_'+"<?php echo $element['status'];?>").val()== 2){
															$('#'+'td_<?php echo $element['id'];?>_1').css('background-color','#FFFFA5');
															$('#'+'td_<?php echo $element['id'];?>_2').css('background-color','#FFFFA5');
															$('#'+'td_<?php echo $element['id'];?>_3').css('background-color','#FFFFA5');
														}
														$('#'+"<?php echo $element['id'];?>"+'_'+"<?php echo $element['status'];?>").attr("checked","true");
													});
												</script>
												<input type="hidden" value="<?php echo $element['id']?>" name="<?php echo $element['id']?>_id"/>
												<td id="td_<?php echo $element['id'];?>_1" rowspan="1" align="left" valign="middle" class="bodytext_normal" style="padding-left:15px;"><?php echo $element['name'];?></td>
												<td id="td_<?php echo $element['id'];?>_2" rowspan="1" align="center" valign="middle" class="bodytext_normal">
													<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_0" type="radio" value="0" onclick='clear_date("<?php echo $element['id'];?>_actual"); highlight("<?php echo $element['id'];?>",false);'>Don't know &nbsp;&nbsp; </input >
											  		<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_1" type="radio" value="1" onclick='highlight("<?php echo $element['id'];?>",true);'>Yes &nbsp;&nbsp;</input >
													<input name="<?php echo $element['id'];?>_status" id="<?php echo $element['id'];?>_2" type="radio" value="2" onclick='clear_date("<?php echo $element['id'];?>_actual");highlight("<?php echo $element['id'];?>",true);'>No</input >
												</td>
												<td id="td_<?php echo $element['id'];?>_3" rowspan="1" align="center" valign="middle" class="bodytext_normal" style="height:25px;" ><input class="textarea" name="<?php echo $element['id'];?>_actual_date" type="text" readonly="readonly"    align="center" valign="top"  style="width:100px;"  id="<?php echo $element['id'];?>_actual" value="<?php if ($element['date'])  echo date('d M Y',strtotime( $element['date']))  ;?>" style="border-bottom:1px solid #0d6596;"/></td>
											</tr>
											<?php }?>
										  	<?php }?>
											<tr>
												<td colspan="5" style="width: 180px; height: 25px;padding:5px;padding-left:10px;" > <input type="submit" class="button" value="Save" style="width: 80px; height: 25px;" /></td>
											</tr>
											</form>
								        </table>
									</td>
					            </tr>	
					        </table>
						</td>
					</tr>				          
				</table>
			</td>
		</tr>
	</table>
</div>
<div id="dob_input" style="display:none;width:500px;overflow-x:hidden; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label class="bodytext_bold">Enter Date of Birth </label>
	</div>
	<div style="width:220px;margin:10px;height:70px;" class="bodytext_normal" >
	     <label class="bodytext_bold">Date of Birth: </label>
	     <input class="bodytext_normal" id="dob" readonly="readonly"></input>
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="80%" style="padding-top:5px;text-align:right;"><button class="button" style="height:25px;width:100px;" onclick="setDOB();" >Save</button>&nbsp;</td>
				</tr>
			</table>
	</div>
</div>