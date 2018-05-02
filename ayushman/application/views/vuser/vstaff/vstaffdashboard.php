<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>

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
		$('#AppointmentPopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#cancelAppointmentPopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#cancelSuccessfulAppointmentPopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "521px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#rescheduleAppointmentPopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "521px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#rescheduleAppointmentAccessCodePopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "521px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#messagelistdiv').html()) != "")
			showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
	});
	function statusnameformatter(cellvalue, options, rowObject )
	{  
		var doctorid =$(rowObject).children()[0].firstChild.data;
		return '<image id="img_presence_'+doctorid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
	
	function actionFormatter(cellvalue, options, rowObject )
	{
		var pat_id =$(rowObject).children()[12].firstChild.data;
		var appointment_id = $(rowObject).children()[10].firstChild.data;
		var dr_id = $(rowObject).children()[0].firstChild.data;
		return '<a style="color:blue;" href="#" onclick="cancelappointment('+appointment_id+')" title="Cancel"  >Cancel</a>&nbsp;&nbsp;|&nbsp;&nbsp<a style="color:blue;" href="#" onclick="rescheduleappointment('+appointment_id+')" title="Reschedule">Reschedule</a>&nbsp;&nbsp;|&nbsp;&nbsp<a href="#" style="color:blue;" onclick="endAppointment('+appointment_id+')" >End Appointment</a>&nbsp;&nbsp;|&nbsp;&nbsp<a href="#" style="color:blue;" onclick="gotoprescription('+appointment_id+','+pat_id+','+dr_id+')" >Consultation</a>';
	}

	function gotoprescription(appointment_id,pat_id,dr_id)
		{																										
			parent.location.href ='/ayushman/cpatientprescriptiondisplay/displayprescription?#/doctordashboardconsultation?appid='+appointment_id+'&patient_id='+pat_id+'&role=doctor&drid='+dr_id+'&quick=1';
		}
	
	function endAppointment(appid){
		$.ajax({
			type: "post",
			url: "/ayushman/cappointmenteditor/getappointmentinfo?appid="+appid,
			success:function( data ){
				var returnArray= JSON.parse(data);
				$('#AppointmentDrname').html(""+returnArray['drname']+"");
				$('#AppointmentPatientName').html(""+returnArray['patientname']+"");
				$('#AppointmentAppTime').html(""+returnArray['apptime']+"");
				document.getElementById('endappid').value = returnArray['id'];
				document.getElementById('appid').value = returnArray['id'];
				$('#tdEndAppointment').html('<input class="button" style="width:200px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="confirmEndApp('+returnArray['id']+','+returnArray['paid']+')" value="End Appointment & Generate Bill" readonly="true" />');
				$('#AppointmentPopup').dialog('open');
			},
			error:function(){
				showMessage('250','50','Send Data to patient','Error occured while retrieving Appointment information. Please try again.','error','id');
			},
		});
	}
	function confirmEndApp(appid,paid)
	{
		if(paid == 0){
			endConsultationWithoutTransfer(appid,paid);
		}else{
			endConsultationWithTransfer(appid,paid);
		}
	}
	function endConsultationWithoutTransfer(appid,paid){
		generateBill(appid);
		$.ajax({
		type: "post",
		url: "/ayushman/newcemrdashboard/endAppWithoutTransferByStaff?endappid="+appid,
		data: $("#emrform").serialize(),
		success:function( data ){
			if(data != 'error'){
				
			}
			else
			alert('Please Try Again');
		},
		error:function(){
			showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
		},
		});
	}
	function fancyboxclosed(obj){
		$('#AppointmentPopup').dialog('close');
		refreshgrid();
	}
	function generateBill(appid){
		//parent.openDialog(window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cbill/generate?id='+appid+'&edit=true',800,600,this);
		parent.openDialog('/ayushman/cstaffbill/getbilldata?appointmentid='+appid,900,700);
		//parent.openDialog('/ayushman/assets/app/partials/cipdbills/getbilldata?appointmentid='+appid,900,700);
	}
	
	function endConsultationWithTransfer(appid,paid){
		$('body').css('cursor', 'progress'); 
		$.ajax({
		type: "post",
		url: "/ayushman/newcemrdashboard/endAppWithTransferByStaff?endappid="+appid,
		success:function( data ){
			if(data != 'error'){
				generateBill(appid);
				$('body').css('cursor', 'default'); 
			}
			else
			alert('Please Try Again');
		},
		error:
		function(){
			showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
		},
		});
	}

	function cancelappointment(appointment_id)
	{
		$.ajax({
			type: "post",
			url: "/ayushman/cappointmenteditor/getappointmentinfo?appid="+appointment_id,
			success:function( data ){
				var returnArray= JSON.parse(data);
				$('#cancelAppointmentDrname').html(""+returnArray['drname']+"");
				$('#cancelAppointmentPatientName').html(""+returnArray['patientname']+"");
				$('#cancelAppointmentAppTime').html(""+returnArray['apptime']+"");
				document.getElementById('cancelappid').value = appointment_id;
				$('#tdCancelAppointment').html('<input class="button" style="width:120px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="cancelappbutton" onclick="confirmCancelApp('+appointment_id+')" value="Cancel Appointment" readonly="true" />&nbsp;<input class="button" style="width:160px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="dontcancelappbutton" onclick="closecancelAppointmentPopup()" value="Dont Cancel Appointment" readonly="true"/>');
				$('#cancelAppointmentPopup').dialog('open');
			},
			error:function(){
				showMessage('250','50','Send Data to patient','Error occured while retrieving Appointment information. Please try again.','error','id');
			},
		});
	}
	
	function confirmCancelApp(appid)
	{
		
		var ajaxurl;
		if(document.getElementById('cancelappOnBehalfDrRedio').checked == true )
		{
			var ajaxurl='/ayushman/cappointmenteditor/cancelappointment?appid='+appid+'&role=doctor&representative=staff';
			showCancelAppointmentSuccess(ajaxurl);
		}
		else
		{
			var ajaxurl='/ayushman/cappointmenteditor/cancelappointment?appid='+appid+'&role=patient&representative=staff';
			var code = document.getElementById("code").value;
			if(code != "")
			{
				$("#lblaccesscodeerror").text("");
				$('#loading').dialog("open");
				$.ajax({
						url: "/ayushman/cappointmenteditor/verifycode?appid="+appid+"&code="+code,
						success: function( data ) {
							if(data == "sucess")
							{
								$('#loading').dialog("close");
								showCancelAppointmentSuccess(ajaxurl);
							}
							else{
								$("#lblaccesscodeerror").text("Please enter correct code provided by patient");
								document.getElementById('lblaccesscodeerror').style.disabled = true;
							}
						},
						error : function(){}
					});								
			}
			else
			{
				$("#lblaccesscodeerror").text("Please enter code provided by patient");
				document.getElementById('lblaccesscodeerror').style.disabled = true;
			}
		}
	}
	
	function closerescheduleAppointmentPopup(){
		$('#rescheduleAppointmentPopup').dialog('close');
	}
	
	function rescheduleappointment(appointment_id)
	{
		$.ajax({
		type: "get",
		url: "/ayushman/cappointmenteditor/getappointmentinfo?appid="+appointment_id,
		success:function( data ){
			var returnArray= JSON.parse(data);
			$('#rescheduleAppointmentDrname').html(""+returnArray['drname']+"");
			$('#rescheduleAppointmentAccessCodeDrname').html(""+returnArray['drname']+"");
			$('#rescheduleAppointmentPatientName').html(""+returnArray['patientname']+"");
			$('#rescheduleAppointmentAccessCodePatientName').html(""+returnArray['patientname']+"");
			$('#rescheduleAppointmentAppTime').html(""+returnArray['apptime']+"");
			$('#rescheduleAppointmentAccessCodeAppTime').html(""+returnArray['patientname']+"");
			document.getElementById('rescheduleappid').value = appointment_id;
			$('#tdrescheduleAppointment').html('<input class="button" style="width:150px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="resceduleappbutton" onclick="SendAcessCodeForReshedule('+appointment_id+')" value="Rescedule Appointment" readonly="true" />&nbsp;<input class="button" style="width:180px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="dontResceduleAppButton" onclick="closerescheduleAppointmentPopup()" value="Dont Reschedule Appointment" readonly="true"/>');
			$('#rescheduleAppointmentPopup').dialog('open');
		},
		error:function(){
			showMessage('250','50','Send Data to patient','Error occured while retrieving Appointment information. Please try again.','error','id');
		},
		});
	}
	
	function SendAcessCodeForReshedule(appid)
	{
		$.ajax({
			type: "post",
			url: '/ayushman/cappointmenteditor/sendsmscode?appid='+appid,
			success:function( data ){
				var returnArray= JSON.parse(data);
				var displayString;
				$('#rescheduleAppointmentTd').html('<input class="button" style="width:150px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="confirmresceduleappbutton" onclick="confirmResceduleApp('+appid+')" value="Rescedule Appointment" readonly="true" />&nbsp;<input class="button" style="width:180px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="dontResceduleAppButton" onclick="closeRescheduleAppointmentAccessCodePopup()" value="Dont Reschedule Appointment" readonly="true"/>');
				if(returnArray["patientmobile"] != '')
				{
					displayString= "The verification code has been sent to patient mobile via sms.<br/>Please enter verification code provided by Patient:<input type='text' id='reshedulecode' onmouseover='removeerror()' class = 'textarea'  /><br/>";
				}
				else
				{
					displayString= "<br/>We are sorry due to non availability of patient contact details you canot reschedule appointment on behalf of patient";
					$('#confirmresceduleappbutton').hide();
				}
				$('#rescheduleOnbehalfOfPatient').html(''+displayString+'');
				$('#rescheduleOnbehalfOfPatient').show();
				$('#lblaccesscodeerror').html('');
				$('#lblaccesscodeerror').show();
				$('#rescheduleAppointmentAccessCodePopup').dialog('open');
				$('#rescheduleAppointmentPopup').dialog('close');
				
			},
			error:function(){
				showMessage('250','50','Send Data to patient','Error occured while rescheduling appointment. Please try again.','error','id');
			},
		});
	} 
	
	function confirmResceduleApp(appid)
	{
		var code = document.getElementById("reshedulecode").value;
			if(code != "")
			{
				$.ajax({
					url: "/ayushman/cappointmenteditor/verifycode?appid="+appid+"&code="+code,
					success: function( data ) {
						if(data == "sucess")
						{
							$('#loading').dialog("close");
							parent.document.getElementById("icontent").src='/ayushman/cappointmenteditor/rescheduleappointment?appid='+appid;
						}
						else{
							$("#lblrescheduleaccesscodeerror").text("Please enter correct code provided by patient");
							document.getElementById('lblrescheduleaccesscodeerror').style.disabled = true;
						}
					},
					error : function(){}
				});	
			}
			else
			{
				$("#lblrescheduleaccesscodeerror").text("Please enter code provided by patient");
				document.getElementById('lblrescheduleaccesscodeerror').style.disabled = true;
			}
							
	}
	
	function showCancelAppointmentSuccess(ajaxurl){
	$('#loading').dialog("open");
			$.ajax({
				type: "post",
				url: ajaxurl ,
				success:function( data ){
					var returnArray= JSON.parse(data);
					$('#cancelAppointmentPopup').dialog('close');
					$("#doctorstaffappointmentslist").trigger("reloadGrid");
					var displayString = "<div class='bodytext_normal'><img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;The appointment has been cancel successfully <br/><br/>";
					if(returnArray["patientemail"] != '')
						displayString =  displayString +"<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;The patient has been notify via email.<br/><br/>"; 
					else
						displayString =  displayString + "<img src='/ayushman/assets/images/error_icon.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;The patient has not been notify via email.<br/><br/>";
					if(returnArray["patientmobile"] != '')
						displayString =  displayString +"<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;The patient has been notify via SMS.<br/><br/>"; 
					else
					{	
						displayString =  displayString + "<img src='/ayushman/assets/images/error_icon.png' width='20' height='20 ' />&nbsp;&nbsp;&nbsp;&nbsp;The patient has not been notify via SMS.<br/>";
						if(returnArray["patientcontactnumber"] != '' )//display contact number if present
							displayString =  displayString +'<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Patient contact details:'+returnArray["patientcontactnumber"]+'</strong><br/>';
						displayString =  displayString+"<br/><input type='radio'  id='inform' name='information' value='inform'  class='bodytext_normal' >Yes I have informed the patient about cancellation of appointment</input>&nbsp;&nbsp;&nbsp;<br/><input type='radio'  id='inform' name='information' value='notinform' checked='checked' class='bodytext_normal' >Due to non availability of the patient patient contact details the patient has not been notified  </input>";

					 }
					displayString = displayString+'<table width="100%" class="bodytext_normal" ><tr><td style="width:30%;"  class="bodytext_bold" >Doctor Name </td><td style="width:70%;" class="bodytext_normal" >:&nbsp;'+returnArray['drname']+'</td></tr><tr><td style="width:30%;"  class="bodytext_bold">Patient Name </td><td style="width:70%;">:&nbsp;'+returnArray['patientname']+'</td></tr><tr><td style="width:30%;"  class="bodytext_bold">Appointment Time</td><td style="width:70%;">:&nbsp;'+returnArray['apptime']+'</td></tr></table>';
					$('#cancelSuccessfulAppointmentInformationBody').html(''+displayString+'');
					$('#loading').dialog("close");
					$('#cancelSuccessfulAppointmentPopup').dialog('open');
				},
				error:function(){
					showMessage('250','50','Send Data to patient','Error occured while canceling appointment. Please try again.','error','id');
				},
			});
	}
	
	function closecancelAppointmentPopup(){
		$('#cancelAppointmentPopup').dialog('close');
	}
	
	function closerescheduleAppointmentPopup()
	{
		$('#rescheduleAppointmentPopup').dialog('close');
	}
	
	function closeRescheduleAppointmentAccessCodePopup(){
		$('#rescheduleAppointmentAccessCodePopup').dialog('close')
	}
	
	function cancelbypatient()
	{
		var appid= document.getElementById('cancelappid').value;
			$.ajax({
				type: "post",
				url: '/ayushman/cappointmenteditor/sendsmscode?appid='+appid+"&cancelapp=true",
				success:function( data ){
					var returnArray= JSON.parse(data);
					var displayString;
					if(returnArray["patientmobile"] != '')
					{
						displayString= "The verification code has been sent to patient mobile via sms.<br/>Please enter verification code provided by Patient:<input type='text' id='code' onmouseover='removeerror()' class = 'textarea'  /><br/>";
					}
					else
					{
						displayString= "<br/> are sorry due to non availability of patient contact details you canot cancel appointment on behalf of patient";
					}
					$('#cancelOnbehalfOfPatient').html(''+displayString+'');
					$('#cancelOnbehalfOfPatient').show();
					$('#lblaccesscodeerror').html('');
					$('#lblaccesscodeerror').show();
					$('#tdCancelAppointment').html('<input class="button" style="width:120px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="cancelappbutton" onclick="confirmCancelApp('+appid+')" value="Cancel Appointment" readonly="true" />&nbsp;<input class="button" style="width:160px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="dontcancelappbutton" onclick="closecancelAppointmentPopup()" value="Dont Cancel Appointment" readonly="true"/>');
				},
				error:function(){
					showMessage('250','50','Send Data to patient','Error occured while canceling appointment. Please try again.','error','id');
				},
			});
	}
	
	function removeerror(){
		$('#lblaccesscodeerror').text('');
	}
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	
	<form id="searchform" name="searchform" action="searchbuttononclick?viewName=vstaffdashboard" method="post" accept-charset="utf-8">
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td style="width:99%;" colspan="2" class="Heading_bg">
				Upcomming Appointments
			</td>
		</tr>
		<tr>
			<td align="left" valign="center" width="50%" class="bodytext_normal">&nbsp;&nbsp;Doctor Name : 
					<select name="selectedDoctor" onchange="$('#searchform').submit();" class="textarea" id="doctorlistbox" > 
						<option value="" selected="" >ALL</option>
							<?PHP  
								foreach ($array_doctor as $key=> $value) {
									$selected = '';
									if($previousvalues != null)
												if(isset($previousvalues['selectedDoctor'])){
													if($previousvalues['selectedDoctor'] == $key)
													{ 
														$selected = 'selected'; 
													}
												}
									print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
								} 
							?>
					</select>
			</td>
			<td align="right" valign="bottom">
					<table>
						<tr>	
							<td width="52" class="bodytext_bold" align="right">Search :</td>
						  	<td width="106" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  	<td width="27" align="right"><input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
					</table>

			</td>
		</tr>
		<tr  class="bodytext_normal" align="right"  width="100%">    
			<td colspan="2" valign="top">
				<?php
					$searchpathojqgridrequest= Request::factory('xjqgridcomponent/index');
					$searchpathojqgridrequest->post('name','doctorstaffappointments');
					$searchpathojqgridrequest->post('height','320');
					$searchpathojqgridrequest->post('width','810');
					$searchpathojqgridrequest->post('sortname','dateandtime_dateformate');
					$searchpathojqgridrequest->post('sortorder','desc');
					$searchpathojqgridrequest->post('tablename','doctorstaffappointment');
					$searchpathojqgridrequest->post('columnnames','doctorUserid,dateandtime_dateformate,incidentid,Doctorsname,Patientname,DateAndTime,type,city,chargestatus,staffid,appointment_id,appointment_id,refappfromid_c');
					$x="[staffid,=,".$staffid."]";
					$v=$x.$whereclause;
					$searchpathojqgridrequest->post('whereclause',$v);//used for jqgrid
					$columninfosearch = '[
								{"name":"doctorid","index":"doctorUserid","hidden":true},
								{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","hidden":true},
								{"name":"Incident id","index":"incidentid","width":80,"hidden":true},
								{"name":"Doctors Name","index":"Doctorsname","width":15,"hidden":false,formatter:statusnameformatter},
								{"name":"Patients Name","index":"Patientname","width":15,"hidden":false},
								{"name":"Date&Time","index":"DateAndTime","width":10,"hidden":false},
								{"name":"Type","index":"type","width":5,"hidden":false},
								{"name":"Place","index":"city","width":4,"hidden":true},
								{"name":"Charge Status","index":"chargestatus","width":10,"editable":true,"hidden":true},
								{"name":"userid","index":"staffid","hidden":true},
								{"name":"appid","index":"appointment_id","hidden":true},
								{"name":"Action","index":"Action","width":30,"align":"center","formatter":actionFormatter,"align":"left"},
								{"name":"patid","index":"refappfromid_c","hidden":true}
							]';
					$searchpathojqgridrequest->post('columninfo', $columninfosearch);
					$searchpathojqgridrequest->post('editbtnenable','false');
					$searchpathojqgridrequest->post('deletebtnenable','false');
					$searchpathojqgridrequest->post('savebtnenable','false');
					echo $searchpathojqgridrequest->execute(); 
				?>
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
<div id="AppointmentPopup" style="width:500px;overflow-x:hidden;display:none; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">End Appointment</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#AppointmentPopup').dialog('close');"/></label>
	</div>
	<div style="width:96%;margin:10px;padding-left:10px;" class="bodytext_normal" >
		<table width="100%" >
			<tr>
				<td style="width:30%;"  class="bodytext_bold" >Doctor Name </td>
				<td style="width:70%;">:&nbsp;<lable id="AppointmentDrname" class="bodytext_normal"></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Patient Name </td>
				<td style="width:70%;">:&nbsp;<lable id="AppointmentPatientName" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Appointment Time</td>
				<td style="width:70%;">:&nbsp;<lable id="AppointmentAppTime" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td colspan="2" class="bodytext_bold" >Do you want to End the appointment on behalf of Doctor?
				</td>
			</tr>
		</table>
		<form id="emrform" name="emrform">
			<input id="endappid" hidden="true"/>
			<input id="appid" hidden="true"/>
			<input id="transferto" value="doctor" hidden="true"/>
			
		</form>
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="30%">&nbsp;</td>
					<td width="70%" style="padding-top:5px;" align="right" id="tdEndAppointment"></td>
				</tr>
			</table>
	</div>
	<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
		 <img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
	</div>
</div>
<div id="cancelAppointmentPopup" style="width:500px;overflow-x:hidden; display:none; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Cancel Appointment</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#cancelAppointmentPopup').dialog('close');"/></label>
	</div>
	<div id="cancelAppointmentInformationBody" style="width:96%;margin:10px;padding-left:10px;" class="bodytext_normal" >
		<table width="100%" >
			<tr>
				<td style="width:30%;"  class="bodytext_bold" >Doctor Name </td>
				<td style="width:70%;">:&nbsp;<lable id="cancelAppointmentDrname" class="bodytext_normal"></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Patient Name </td>
				<td style="width:70%;">:&nbsp;<lable id="cancelAppointmentPatientName" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Appointment Time</td>
				<td style="width:70%;">:&nbsp;<lable id="cancelAppointmentAppTime" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td colspan="2" class="bodytext_normal">I am canceling this appointment on behalf of the
					
				</td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold"><input type="radio"  id="cancelappOnBehalfDrRedio" name="cancelapponbehalf" value="doctor" checked="checked" onclick="$('#cancelOnbehalfOfPatient').hide();$('#lblaccesscodeerror').hide();" >Doctor</input><br/><input type="radio"  id="cancelAppOnbehalfPatRedio" name="cancelapponbehalf" value="patient"  onclick="cancelbypatient()" >Patient</input></td>
				<td style="width:70%;">&nbsp;<input id="cancelappid" hidden="true"/></td>
			</tr>
			<tr>
				<td colspan="2" class="bodytext_normal" ><div id="cancelOnbehalfOfPatient" class="bodytext_normal"  ></div>
					
				</td>
			</tr>
			<tr>
				<td colspan="2" ><lable id='lblaccesscodeerror' disabled='false' class="bodytext_error"></lable>
				</td>
			</tr>
		</table>
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="30%">&nbsp;</td>
					<td width="70%" style="padding-top:5px;" align="right" id="tdCancelAppointment"></td>
				</tr>
			</table>
	</div>
</div>

<div id="cancelSuccessfulAppointmentPopup" style="width:600px;overflow-x:hidden; display:none; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Cancel Appointment Successfully</label>
	</div>
	<div id="cancelSuccessfulAppointmentInformationBody" style="width:96%;margin:10px;padding-left:10px;" class="bodytext_normal" >
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="80%">&nbsp;</td>
					<td width="20%" style="padding-top:5px;" id="tdCancelAppointment"><div class="button" style="width:50px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" id="cancelappbutton" onclick="$('#cancelSuccessfulAppointmentPopup').dialog('close')" readonly="true" >Ok</div></td>
				</tr>
			</table>
	</div>
</div>

<div id="rescheduleAppointmentPopup" style="width:500px;overflow-x:hidden;display:none; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="Rescheduleinformationheading" class="bodytext_bold">Reschedule Appointment</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#rescheduleAppointmentPopup').dialog('close');"/></label>
	</div>
	
	<div id="rescheduleAppointmentInformationBody" style="width:96%;margin:10px;padding-left:10px;" class="bodytext_normal" >
		
		<table width="100%" >
			<tr>
				<td colspan="2" class="bodytext_normal" >Do you really want to reschedule appointment on behalf of patient?
					
				</td>	
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold" >Appointment Details:</td>
				<td style="width:70%;">&nbsp;</td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold" >Doctor Name </td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentDrname" class="bodytext_normal"></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Patient Name </td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentPatientName" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Appointment Time</td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentAppTime" class="bodytext_normal" ></lable></td>
			</tr>
		</table>
	
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="30%">&nbsp;</td>
				<td width="70%" style="padding-top:5px;" align="right" id="tdrescheduleAppointment">
						
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="rescheduleAppointmentAccessCodePopup" style="width:500px;overflow-x:hidden; display:none; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="Rescheduleinformationheading" class="bodytext_bold">Reschedule Appointment</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#rescheduleAppointmentAccessCodePopup').dialog('close');"/></label>
	</div>
	
	<div id="rescheduleAppointmentInformationBody" style="width:96%;margin:10px;padding-left:10px;" class="bodytext_normal" >
		
		<table width="100%" >
			<tr>
				<td colspan="2" class="bodytext_normal" >I am rescheduling appointment of behalf of patient 
					
				</td>	
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold" >Doctor Name </td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentAccessCodeDrname" class="bodytext_normal"></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Patient Name </td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentAccessCodePatientName" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td style="width:30%;"  class="bodytext_bold">Appointment Time</td>
				<td style="width:70%;">:&nbsp;<lable id="rescheduleAppointmentAccessCodeAppTime" class="bodytext_normal" ></lable></td>
			</tr>
			<tr>
				<td colspan="2" class="bodytext_normal" >&nbsp;
				</td>	
			</tr>
			<tr>
				<td colspan="2" class="bodytext_normal" ><div id="rescheduleOnbehalfOfPatient" class="bodytext_normal"  >
					<input id="rescheduleappid" hidden="true"/>
				</td>	
			</tr>
			<tr>
				<td colspan="2" ><lable id='lblrescheduleaccesscodeerror' disabled='false' class="bodytext_error"></lable>
				</td>
			</tr>
			
		</table>
	</div>
	<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="30%">&nbsp;</td>
				<td width="70%" style="padding-top:5px;" align="right" id="rescheduleAppointmentTd">
					
				</td>
			</tr>
		</table>
	</div>
</div>
