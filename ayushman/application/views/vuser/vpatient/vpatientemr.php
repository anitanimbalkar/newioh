<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />

<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
	.video{
		width:350px;
		height:570px;
		border:1px solid #D6D5F4;
		float: left;
		margin-right:1%;
		-moz-border-radius-topright: 0.5em;
		-moz-border-radius-topleft: 0.5em;;
		-webkit-border-top-right-radius: 7px;
		-webkit-border-top-left-radius: 7px;
		border-top-right-radius: 7px;
		border-top-left-radius: 7px;
		-webkit-border-bottom-right-radius: 7px;
		-webkit-border-bottom-left-radius: 7px;
		border-bottom-right-radius: 7px;
		border-bottom-left-radius: 7px;
	}
	.workarea{
		height:24.3em;
		border:1px solid #D6D5F4;
		overflow-y:auto;
		-moz-border-radius-topright: 0.5em;
		-webkit-border-top-right-radius: 7px;
		border-top-right-radius: 7px;
		-webkit-border-bottom-right-radius: 7px;
		-webkit-border-bottom-left-radius: 7px;
		border-bottom-right-radius: 7px;
		border-bottom-left-radius: 7px;
	}
	.blocktextarea {
		border:1px solid #D6D5F4;		   
		font-size:8pt;
		font-family: Verdana,Arial,Helvetica,sans-serif;    
		line-height: 21px;    
		padding: 2px;
		width:96%;
		margin-left:10px;
	}
	textarea{
		resize: none;
	}
	.section{
		margin:1em;
		display:none;
	}
</style>

<body>
<input id="isConsultationPage" type="hidden" value="true"/>
<div style="margin-top:0.5%;">

	<div id="controls">
		<div id="appointmentinfo" class="Heading_Bg" style="float:left; width:60%; height:29px;">
			&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png"/>
			&nbsp;<img id="img_presence_<?= $appointmentinfo->refappfromid_c; ?>" name="presence" src="/ayushman/assets/images/circle-gray.png" style="vertical-align:bottom;"/>
			&nbsp;<?= $appointmentinfo->Patientname; ?>
			|&nbsp;<?= $appointmentinfo->PatientGender; ?>
			|&nbsp;Age: <?= $appointmentinfo->age; ?>
			|&nbsp;<?= $appointmentinfo->incidentsname_c; ?>
			|&nbsp;<?= $appointmentinfo->DateAndTime; ?>
		</div>
		
		<div style="float:right;" style="width:30%">
			<button class="Button" onclick="show_emr();" title="Click to view your complete Electronic Medical Record">View Emr</button>
			<button class="Button" title="Click to get appointment data" onclick="get_data();">Get Data</button>
			<button class="Button" title="Click to go back to dashboard" onclick="backToDashboard();">Dashboard</button>
		</div>
	</div>
	
	<div style="clear:both;"></div>
	
	<div style="margin-top:0.5%;">
		
		<div id="videoandchat" class="video">
			<iframe id="video" style=" position: relative; z-index: 0;" scrolling="auto" width="100%" frameborder="0" height="620px"></iframe>
		</div>
		
		<div id="formandwork" style="width:100%">
			<div id = "work" class="workarea">
				<div id="maincomplaint" class="section">
					<label class="bodytext_bold">Main Complaint</label><br />
					<textarea id="maincomplainttext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="vitalsigns" class="section">
					<label class="bodytext_bold">Vital Signs</label><br />
					<textarea id="vitalsignstext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="symptomaticreview" class="section">
					<label class="bodytext_bold">Symptomatic Review of Systems</label><br />
					<textarea id="symptomaticreviewtext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="examinations" class="section">
					<label class="bodytext_bold">Symptomatic Review of Systems / Examinations</label><br />
					<div id="examinationstext" cols="170" style="overflow :hidden;" class="bodytext_normal"></div>
				</div>
				<div id="diagnosis" class="section">
					<label class="bodytext_bold">Diagnosis</label><br />
					<textarea id="diagnosistext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				
				<div id="investigation" class="section">
					<label class="bodytext_bold">Investigations</label><br />
					<textarea id="investigationtext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="medicine" class="section">
					<label class="bodytext_bold">Medicine</label><br />
					<textarea id="medicinetext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="followup" class="section">
					<label class="bodytext_bold">Follow-Up</label><br />
					<textarea id="followuptext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
				<div id="summary" class="section">
					<label class="bodytext_bold">Summary</label><br />
					<textarea id="summarytext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<script type="text/javascript">
	var consultationMode = '<?= $mode; ?>'.toLowerCase();
	$(document).ready(function(){
		if(consultationMode != "online"){
			showNotification('400','70','','Doctor has disconnected from consultation','timer','timernotification',5000);
			endConsultation();
		}
		connect();
		showframe();	
	});
	$(window).unload(function(){
		$.ajax({
		  url: "/ayushman/cemrdashboard/disconnect?appid="+<?php echo $appid; ?>,
		  async : false,
		});
	});
	$(parent.window).resize(function(){
		parent.maximizeframe('maximize');
	});
	function connect(){
		$.ajax({
			url: "/ayushman/cemrdashboard/connect?appid="+<?php echo $appid; ?>,
			success: function( data ) {},
			error : function(){showMessage('550','200','Connection Error',"Could not connect to server.",'error','id');}
		});
	}
	function Confirmation_Event(id,confirmation){
		if(id == 'disconfirmation'){
			if(confirmation == 'yes'){
				parent.sendmsgfromtemplate('prescriptionAccepted','<?= $appointmentinfo->doctorid; ?>');
				endConsultation();
			}
			else{
				parent.sendmsgfromtemplate('prescriptionRejected','<?= $appointmentinfo->doctorid; ?>');
			}
		}
	}

	function msg_handler(message){
		if(message == "Get Data"){
			get_data();
		}
		if(message == "Ask for finalize permission"){
			showMessage('700','150','End Consultation','<div id = "tests"> </div>Doctor has finalised his diagnosis and Prescripon. You have one minute to review after which Doctor will be closing the session:<br/><br/> - Have you understood how to take medicines, written in this Prescription?<br/> - Have you understood which invetsigations to take and from which Lab, if written in this Prescription?<br/><br/>Can the Doctor close the session and generate a Visit Summary for your records, which you can view in your EMR section later?','confirmation','disconfirmation');
		}
		if(message == "End Consultation"){
			showNotification('400','70','End Consultation','The doctor has chosen to end consultation.<br/> The consultation will end now.','timer','timernotification',5000);
			endConsultation();
		}
		if(message == "Wait"){
			showNotification('400','70','','Doctor has not connected to consultation yet. Please Wait!','timer','timernotification',5000);
		}
		if(message == "Consult"){
			showNotification('400','70','','Doctor has connected to consultation','timer','timernotification',5000);
		}
		if(message == "Aborted"){
			showNotification('400','70','','Doctor has disconnected from consultation','timer','timernotification',5000);
		}
	}

	function backToDashboard(){
		parent.window.location = "/ayushman/cdashboard/view"
	}
	function endConsultation(){
		parent.maximizeframe('minimize');
		window.location = "/ayushman/cpatientrequistiontests/view";
	}
	function get_data(){
		$.ajax({
			url: "/ayushman/cemrdashboard/getdata?appid="+<?php echo $appid; ?>,
			success:function(data){
				var appointmentData = eval("("+data+")");
				for(var section in appointmentData){
					if(appointmentData[section] == "" || appointmentData[section] == null){
						$('#'+section).hide();
					}
					else{
						$('#'+section).show();
						if(section == 'examinations'){
							$('#'+section+"text").empty();
							$('#'+section+"text").append(appointmentData['examinations']);
						}else{
							$('#'+section+"text").val(appointmentData[section]);
						}
						$('#'+section+"text").trigger('change');
					}
				}
			},
			error:function(){showMessage('550','200','Recieving Data',"Could not recieve data. Please Click on GET PAST DATA.",'error','id');}
		});
	}
	function show_emr(){
		//window.open('/ayushman/cpatienthistorydisplay/displaydemographic?appointmentid=<?php echo $appid; ?>&controller=cemrdashboard&back=false&showall=true&patientid=<? echo $appointmentinfo->refappfromid_c; ?>','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
		parent.openDialog('/ayushman/cpatienthistorydisplay/view?#/patientemr/<? echo $appointmentinfo->refappfromid_c; ?>',1400,1400);
	}
	
	function showframe(){
		var iframe = document.getElementById('video');
		iframe.src=window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/video/index.html?roleId=2&callId=<?=$appid?>&name=<?=$name?>";
	}
	function resizeTextArea(t) {
		var a = t.value.split('\n');
		var b=1;
		for (var x=0;x < a.length; x++){ 
			if (a[x].length >= t.cols) 
				b+= Math.floor(a[x].length/t.cols);
		}
		b+= a.length;
		t.rows = b;
	}
</script>
