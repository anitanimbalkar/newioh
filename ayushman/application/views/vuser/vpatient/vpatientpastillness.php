<script src="/ayushman/assets/js/listboxcomponent.js"></script>
<script src="/ayushman/assets/js/timer.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script>
var jsonIllness = [{id: "listboxillness",	dataitem:{
								0:{textbox:"",minlength:1,autocomplete:'true',watermarktext:'Major Illness',query:'select id as id, diseasename_c as value from diseasemasters where diseasename_c'},
								1:{textbox:"",autocomplete:'false',watermarktext:'period of Treatment'},
								2:{textbox:'',autocomplete:'false',watermarktext:'Description'}
								
								
							},targetid: "divillness",boxes:3,label: "Major Illness:"}];
var jsonSurgery = [{id: "listboxsurgery",	dataitem:{
								0:{textbox:"",minlength:1,autocomplete:'false',watermarktext:'Name of Surgery'},
								1:{textbox:"",autocomplete:'false',watermarktext:'Date of Surgery'},
								2:{textbox:'',autocomplete:'false',watermarktext:'Reason And Description'}
								
								
							},targetid: "divsurgery",boxes:3,label: "Major Surgeries:"}];
							
$(document).ready(function(){
	createlistbox(jsonIllness);
	createlistbox(jsonSurgery);
	get_past_data();
	setTimeout(function() {resize();},1250);
	$('#divillness').click(function(){resize();});
	$('#divsurgery').click(function(){resize();});
	
	if("<?php echo $objpatient->handicap_c; ?>" == 'true')
	{
		$('#handicap').attr("checked","checked");
		$('#handicapdetails').show();
	}
	var availablebloodgrps = [
				"O+",
			    "O-",
				"A+",
				"A-",
				"B+",
				"B-",
				"AB+",
				"AB-"
			];
			$("#bloodgrp").autocomplete({source: availablebloodgrps	});
	
});
function highlight(radio,flag){
    tr = $(radio).closest('tr');
	if(flag){
		$(tr).css('background-color','#FFFFA5');
	}else{
		$(tr).css('background-color','transparent');
	}
}
function togglehandicapview()
	{
		if($('#handicap').attr("checked") == "checked")
		{
			$('#handicapdetails').show();			
		}
		else
		{
			$('#handicapdetails').hide();
		}
	}

function get_past_data()
{
		$.ajax({
		  url: "/ayushman/cpatientpastillness/getpastdata?patid="+<?php echo $objpatient->id; ?>,
		  success: function( data ) {
		  		jsonObj =eval("("+data+")");
				set_past_id(jsonObj['pastillness'],"divillness","listboxillness",jsonIllness[0].dataitem,3);
				set_past_id(jsonObj['pastsurgery'],"divsurgery","listboxsurgery",jsonSurgery[0].dataitem,3);
				resize();
			},
			error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
		});	
	}
function set_past_id(data,div_name,targetid,data_item,no_of_boxes)
 {
  j=0;
 
 for(i=0;i<data.length;i++)
 {
	element = document.getElementById(div_name);
	elements = element.getElementsByTagName("input");
	images = element.getElementsByTagName("img");
	$(images[i+1]).attr('src','/ayushman/assets/images/minus.gif');
	$(images[i+1]).attr('onclick',"deleteParentElement(this)");
for( k=0;k<no_of_boxes*2;k++)
{
$(elements[k+j]).val(data[i][k]).removeClass('watermark');
$(element[k+j]).attr("style","border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px;float:left;");
}
createautocompletebox(targetid,data_item,no_of_boxes);
j=j+(no_of_boxes*2);
}
}

function savedetails()
{
	var savelbl = document.getElementById('savelbl');
	var tuberculosis2=8;
	<?php $i=1; foreach($array_disease as $ds){?>
		status<?php echo $i;?>=2;
		if(document.getElementById('<?php echo $ds?>y').checked) 
		{
			status<?php echo $i;?>= document.getElementById("<?php echo $ds?>y").value;
		}
		else if(document.getElementById('<?php echo $ds?>n').checked) 
		{
			status<?php echo $i;?> = document.getElementById("<?php echo $ds?>n").value;
		}
		else if(document.getElementById('<?php echo $ds?>d').checked)
		{
			status<?php echo $i;?> = document.getElementById("<?php echo $ds?>d").value;
		}
		var remark<?php echo $i; $i++;?> = document.getElementById("<?php echo $ds?>remark").value;
	<?php } ?>
	
	$.ajax({
		url: '/ayushman/cpatientpastillness/savebasics?bloodgroup='+$("#bloodgrp").val()+'&handicap='+document.getElementById("handicap").checked+'&handicapby='+$("#handicap_detail").val()+'&userid=<?= $objpatient->id; $i=1; foreach($array_disease as $ds){?>&status<?php echo $i;?>='+status<?php echo $i;?>+'&remark<?php echo $i;?>='+remark<?php echo $i;?>+'&disease<?php echo $i;?>=<?php echo $ds; $i++;}?>',
		type:'POST' ,
		success:  function(data) 
			{
			},
			error : function(){showNotification('300','20','Save data','Error occured while saving record. Please contact your system administrator','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}		
		});

	
	<?php $i=1; foreach($array_question as $qs){?>
		var answer<?php echo $i?> = document.getElementById("ques<?php echo $i?>").value;
	<?php $i++; }?>
	
	$.ajax({
		url: '/ayushman/cpatientpastillness/savebasicsquest?userid=<?= $objpatient->id;$i=1; foreach($array_question as $qs){?>&answer<?php echo $i;?>='+answer<?php echo $i;?>+'&questid<?php echo $i;?>=<?php echo $i;$i++;}?>' ,
		type:'POST' ,
		success:  function(data) 
			{
			},
			error : function(){showNotification('300','20','Save data','Error occured while saving record. Please contact your system administrator','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}		
		});

	$.ajax({
			url: "/ayushman/cpatientpastillness/saveillness?ids="+getselecteditemsinjson('divillness',3)+"&columns=3&patid=<?= $objpatient->id?>",
			success: function( data ) {
			},
			error : function(){showNotification('300','20','Save data','Error occured while saving record. Please contact your system administrator','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
		});
		
	$.ajax({
			url: "/ayushman/cpatientpastillness/savesurgery?ids="+getselecteditemsinjson('divsurgery',3)+"&columns=3&patid=<?= $objpatient->id?>",
			success: function( data ) {showNotification('300','20','Save data','Personal history saved successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );
			},
			error : function(){showNotification('300','20','Save data','Error occured while saving record. Please contact your system administrator','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
		});

}
	
	$(function () 
		{
		<?php foreach($array_disease as $ds) {?>
			$('#<?php echo $ds?>remark').watermark("Remark");
		<?php }?>
		<?php $i=1; foreach($array_question as $ds) {?>
			$('#ques<?php echo $i;?>').watermark("Answer");
		<?php $i++;}?>
		}
	 );
	
</script>
<div id="wrapper" width="828px" height="auto" style="padding:0px;margin:0px;">
	<table width="828px" border="0" cellspacing="0" cellpadding="0">
		<tr>
			 <td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="22%" height="30" align="center" valign="middle" class="Rounded_buttonBlue">
							<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientallergy/view?patientUserId=<?php echo $objpatient->id; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Allergy & Social Habits" />
						</td>
						<td width="1%">&nbsp;</td>
						<td width="16%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue">
							<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cimmunization/view?patientUserId=<?php echo $objpatient->id; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Immunization" />
						</td>
						<td width="1%">&nbsp;</td>
						<td width="18%" align="center" valign="middle" class="Rounded_buttonOrenge">
							<input type="button" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatientpastillness/patientpastillness?patientUserId=<?php echo $objpatient->id; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Personal History" /></td>
						<td width="1%">&nbsp;</td>
						<td width="17%" align="center" valign="middle" class="Rounded_buttonBlue">
							<input type="button" class="Rounded_buttonBlue" onclick="window.location='/ayushman/cpatientfamilyhistory/view?patientUserId=<?php echo $objpatient->id; ?>'"  style="color:#FFFFFF;height:100%;width:100%;" value="Family History" />
						</td>
						<td width="23%">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		<td colspan="4">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="29" align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="Heading_Bg"  style=" border-top:1px solid #0d6596;" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Basic information</td>
							</tr>
							<tr>
								<td style="padding-top:10px;">
									<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
										<tr>
											<td style="padding-left:10px;padding-top:10px ;padding-left:25px;width:16%;" class="bodytext_bold">Blood Group</td>
											<td style="padding-top:10px;width:34%;" class="bodytext" >
												:&nbsp;<input id="bloodgrp" name="bloodgroup_c" type="text" class="textarea" value="<?php echo $objpatient ->bloodgroup_c; ?>" maxlength="15"/>
											</td>
											<td style="padding-left:10px;padding-top:10px ;width:16%;" class="bodytext_bold">Handicap</td>
											<td style="padding-top:10px ;width:34%;" class="bodytext_normal">:<input style="padding:10px;" type="checkbox" name="handicap" id="handicap" value="true" onclick="togglehandicapview();"/>&nbsp;&nbsp;<span id = "handicapdetails" style="display:none;">Details:&nbsp;<input id="handicap_detail"  type="text"  class="textarea" name="handicapby" value="<?php echo $objpatient->handicapby_c;?>" maxlength="45"/></span></td>
										</tr>
										<tr>
											<td style="padding-left:10px;padding-top:10px ;padding-left:25px;" colspan="4" class="bodytext_bold">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td class="Heading_Bg"  style=" border-top:1px solid #0d6596;" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Know Medical Problems </td>
							</tr>
							<tr>
							<td style="padding-top:10px;">
								<table width="780" border="0" align="left" cellpadding="0" cellspacing="0">
								<?php $i=1; foreach($array_disease as $ds) {?>
									<tr style="background-color:<?php if($array_status[$i-1]!=0){echo '#FFFFA5';}?>;">
									   <td width="4%" height="30" align="center" valign="middle" class="style11" style="padding-left:5px;">&nbsp;</td>
									   <td height="30" class="bodytext_bold"><?php echo $ds;?></td>
									   <td width="3%" height="30" class="bodytext_styleBlue">:</td>
									   <td width="16%" height="30" class="bodytext_normal">
									   <input onclick="highlight(this,false);" name="<?php echo $ds;?>" <?php if($array_status[$i-1]==0){echo 'checked="checked"';}?> id="<?php echo $ds;?>d" type="radio" value="0">
										 &nbsp;Don't know </td>
									   <td width="8%" height="30"><span class="bodytext_normal">
										<input onclick="highlight(this,true);" name="<?php echo $ds;?>"<?php if($array_status[$i-1]==1){echo 'checked="checked"';}?> id="<?php echo $ds;?>n" type="radio" value="1">
									   </span><span class="bodytext_normal">No</span></td>
									   <td width="9%"><span class="style12">
										 <input onclick="highlight(this,true);" name="<?php echo $ds;?>" <?php if($array_status[$i-1]==2){echo 'checked="checked"';}?>id="<?php echo $ds;?>y" type="radio" value="2">
									   </span><span class="bodytext_normal">Yes</span></td>
									   <td width="43%"><input value="<?php echo $array_remark[$i-1];$i++;?>" name="<?php echo $ds?>remark" type="text"  id="<?php echo $ds?>remark" class="textarea" size="60"/></td>
									   <td class="style12">&nbsp;</td>
				 
									</tr>
								<?php }?>
								</table>
							</td>
						</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Major Illness &amp; Treament History</td>
							</tr>
							<tr>
								<td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
									<table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
										<tr>
											 <td>
											  <div id='divillness' style="height:auto; position:relative;float:left;width:100%;margin-top:0px;"></div>
										   </td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
							   <td align="center" valign="top">&nbsp;</td>
							</tr>
							<tr>
							   <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Operation / Surgical Procedures </td>
							</tr>
							<tr>
								 <td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
								 <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#0d6596" style="border-width:1px; border-style: solid; border-collapse: collapse;">
									<tr>
										<td>
											<div id='divsurgery' style="height:auto; position:relative;float:left;width:100%;margin-top:0px;"></div>
										</td>
								   
									</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">&nbsp;</td>
							</tr>
							<tr>
							   <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Other Medical Observations  </td>
							 </tr>
							<tr>
								<td align="left" valign="top" style="padding-top:10px; padding-left:12px;">
									<table width="98%" border="1" cellpadding="0" cellspacing="0"  style="border-color:#0D6596; border-style: solid; border-collapse: collapse;">
										<tr>
											<td width="42%" align="center" valign="middle" class="bodytext_bold" height="30px;"  style="border-bottom:1px solid #0d6596;text-align:left; padding-left:15px;border-right:1px solid #0d6596;">Question</td>
											<td width="58%" align="center" valign="middle" class="bodytext_bold" height="30px;"  style="border-bottom:1px solid #0d6596; text-align:left; padding-left:15px;">Answer</td>
										</tr>
										<?php $i=1;foreach($array_question as $question) {?>
										<tr style="background-color:<?php if($array_answer[$i-1] == ''){echo 'transparent';}else{echo '#FFFFA5';}?>;">
											<td align="left" valign="middle"  class="bodytext_normal" style=" padding-left:15px; border-bottom:1px solid #0d6596;border-right:1px solid #0d6596;"><?php echo $question;?></td>
											<td height="25" align="left" valign="middle" class="bodytext_normal" style="border-bottom:1px solid #0d6596; padding-left:15px;">
												<input type="text" value="<?php echo $array_answer[$i-1];?>" onchange="if($(this).val() != ''){highlight(this,true);}else{highlight(this,false);}" class="textarea" size="75" maxlength="200" id="ques<?php echo $i;?>" name="ques<?php echo $i; $i++;?>"/></td>
										</tr>
										<?php } ?>
								
									</table>
								</td>
							</tr>
							<tr>
								<td height="40">
									<table width="320" border="0" align="left" cellpadding="0" cellspacing="0">
										<tr>
											<td width="1%">&nbsp;</td>
											<td width="26%" align="center" valign="middle"><input type="button" class="button" value="Save" style="width: 80px; height: 25px;"  onclick="savedetails();" /> </td>
											<td width="73%" align="center" valign="middle">&nbsp;</td>
										</tr>
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