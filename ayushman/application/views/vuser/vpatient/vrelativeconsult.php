<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />

<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
	.video{
		width:300px;
		height:480px;
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
		height:30em;
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

<body style="height:100%;">
<input id="isConsultationPage" type="hidden" value="true"/>
<div style="margin-top:0.5%;">

	<div id="controls">
		<div style="float:right;" style="width:30%">
			<button class="Button" onclick="show_emr();" title="Click to view your complete Electronic Medical Record">View Emr</button>
			<button class="Button" title="Click to get appointment data" onclick="get_data();">Get Data</button>
			<button class="Button" title="Click to go back to dashboard" onclick="backToDashboard();">Dashboard</button>
		</div>
	</div>
	
	<div style="clear:both;"></div>
	
	<div style="margin-top:0.5%;">
		
		<div id="videoandchat" class="video">
			<iframe id="video" style=" position: relative; z-index: 0;" scrolling="auto" width="100%" height="480px"></iframe>
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
					<label class="bodytext_bold">Examinations</label><br />
					<textarea id="examinationstext" cols="170" readonly="readonly" style="overflow :hidden;" onchange="resizeTextArea(this);" class="blocktextarea"></textarea>
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
	$(document).ready(function(){
		parent.maximizeframe('maximize');
		showframe();	
	});
	$(parent.window).resize(function(){
		parent.maximizeframe('maximize');
	});
	function backToDashboard(){
		parent.window.location = "/ayushman/cdashboard/view"
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
						$('#'+section+"text").val(appointmentData[section]);
						$('#'+section+"text").trigger('change');
					}
				}
			},
			error:function(){showMessage('550','200','Recieving Data',"Could not recieve data. Please Click on GET PAST DATA.",'error','id');}
		});
	}
	function show_emr(){
		window.open('/ayushman/cpatienthistorydisplay/displaydemographic?appointmentid=<?php echo $appid; ?>&controller=cemrdashboard&back=false&showall=true&patientid=<? echo $appointmentinfo->refappfromid_c; ?>','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	function showframe(){
		var iframe = document.getElementById('video');
		iframe.src=window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/video/index.html?roleId=3&callId=<?=$appid?>&name=<?=$name?>";
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
	function msg_handler(message){
		if(message == "GET DATA"){
			get_data();
		}
	}
</script>
