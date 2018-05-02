<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<script src="/ayushman/assets/js/listboxcomponent.js"></script>
<script src="/ayushman/assets/js/timer.js"></script>
<script src="/ayushman/assets/js/formmodule.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="/ayushman/assets/css/formstyle.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery-ui-multiselect.css" />
<script type="text/javascript" src="/ayushman/assets/js/jquery-multiselect.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-multiselect.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.multiselect.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
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
		border:none;
		background: url(/ayushman/assets/images/textarea_line.png) repeat;
		width: 96%;
		line-height: 18px;
		padding: 2px 10px;
		margin-left:20px;
		font-family:tahoma, Helvetica, sans-serif;
		font-size:11px;
		color:#0033CC;
		font-weight:bold;
		text-align:justify;
	}
	.inlinetextarea {
		border:none;
		background: url(/ayushman/assets/images/textarea_line.png) repeat;
		width: 88%;
		line-height: 18px;
		padding: 2px 10px;
		margin-left:20px;
		font-family:tahoma, Helvetica, sans-serif;
		font-size:11px;
		color:#0033CC;
		font-weight:bold;
		text-align:justify;	
	}
	textarea{
		resize: none;
	}
	.section{
		margin:1em;
	}
	.sectionimg{
		vertical-align: middle;
		cursor: pointer;
	}
</style>
<body style="height:100%;">
<input id="isConsultationPage" type="hidden" value="true"/>
<div style="margin-top:0.5%;">
	<div id="controls">
		<div id="appointmentinfo" class="Heading_Bg"  style="float:left; width:60%;padding-top:5px;height:25px;">
			&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png"/>
			&nbsp;<img id="img_presence_<?= $appointmentinfo->refappfromid_c; ?>" name="presence" src="/ayushman/assets/images/circle-gray.png" style="vertical-align:bottom;"/>
			&nbsp;<?= $appointmentinfo->Patientname; ?>
			|&nbsp;<?= $appointmentinfo->PatientGender; ?>
			|&nbsp;Age: <?= $appointmentinfo->age; ?>
			|&nbsp;<?= $appointmentinfo->incidentsname_c; ?>
			|&nbsp;<?= $appointmentinfo->DateAndTime; ?>
		</div>
		<div style="float:right;" style="width:30%;">
			<button class="Button" onclick="show_emr();" title="Click to view complete Electronic Medical Record of patient">View Emr</button>
			<button id="viewSummary" onclick="viewSummary();" class="button" title="Click to generate a PDF of appointment summary" style="display:none;">View Summary</button>
			<button id="sendData" class="Button" onclick="sendDataToPatient();" title="Click to Send Data to Patient" style="display:none;">Send Data</button>
			<button id="inviteRelative" class="Button" onclick="showRelatives();" title="Click to Invite Relatives into Consultation" style="display:none;">Invite Relative</button>
			<button class="Button" title="Click to End Consultation" onclick="confirm_endconsultation();">End Consultation</button>
		</div>
	</div>
	<div style="clear:both;"></div>
	<div style="margin-top:0.5%;">
		<div id="videoandchat" class="video">
			<iframe id="video" style=" position: relative;z-index: 0;" scrolling="auto" frameborder="0" width="100%" height="620px"></iframe>
		</div>
		<div id="formandwork" style="width:100%">
			<div id="formtarget" class="formtarget" style="font-size:100%">
				<div  id="testpopup" class="examform" style="display:none" onkeyup="setTests();" onmouseup="setTests();">
					<div id="testheader" class="FormHeading_BG">Investigations</div>
					<div id="testcontent" class="formContent"></div>
				</div>
				<div  id="medicinepopup" class="examform" style="display:none" onkeyup="setMedicines();" onmouseup="setMedicines();" >
					<div id="medicineheader" class="FormHeading_BG">
						<div style="float:left">Medicines</div>
						<div style="float:right; margin-right:20px;"><a onclick='$("#searchpopup").dialog("open");' href="javascript:void(0);" style="color:#ffffff">Search for medicines</a></div>
					</div>
					<div id="medicinecontent" class="formContent"></div>
				</div>
				<div  id="diagnosispopup" style="display:none;position:absolute; margin-left:0px; margin-top:0px; width:99%;" onkeyup="setDiagnosis();" onmouseup="setDiagnosis();">
					<div id="diagnosiscontainer"  style="height:100%;width:100%;">
						<div id='diagnosisdiv'  >
							<div id='divdiagnosis' style="height:9.9em; position:relative;float:left;width:100%;margin-top:0px;"></div>
						</div>
					</div>
				</div>
			</div>
			<button id="examinationbutton" onclick="showExamination();">Examination</button>
			<button id="prescriptionbutton" onclick="showPrescription();">Prescription</button>
			<form id="emrform" method="post" enctype="multipart/form-data">
				<input type="hidden" id="transferto" name="transferto" value="-1"/>
				<div id = "work" class="workarea">
					<div id="examination">
						<div id="maincomplaint" class="section">
							<img id="maincomplaintimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('maincomplaint')" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('maincomplaint')" style="cursor:pointer" title="Click to expand this section" >Main Complaint</label>
							<div style="float:right"><input type="checkbox" name="check[textcomplaint]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
<textarea id="maincomplainttext" name="textcomplaint" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<div id="vitalsigns" class="section">
							<img id="vitalsignsimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('vitalsigns'); showForm('vitals','examinations','vitalsignstext');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('vitalsigns'); showForm('vitals','examinations','vitalsignstext');" title="Click to expand this section" style="cursor:pointer">Vital Signs</label>
							<div style="float:right"><input type="checkbox" name="check[textvital]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
							<textarea id="vitalsignstext" name="textvital" cols="150" readonly="readonly" style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<input type="hidden" value="" id="textsymptom" name="textsymptom"/>
						<div id="symptomaticreview" class="section">
							<img id="symptomaticreviewimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggleformarea('symptomaticreview');toggletextarea('symptomaticreview');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggleformarea('symptomaticreview');toggletextarea('symptomaticreview');" title="Click to expand this section" style="cursor:pointer">Symptomatic Review of Systems</label>
							<div style="float:right"><input type="checkbox" name="check[textsymptom]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
							<textarea id="symptomaticreviewtext" cols="150" style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
							<div id="symptomaticreviewforms" class="subsection" style="width:96%">
							<?php foreach($symptomaticViews as $key=>$value) {?>
								<div id="<?php echo $key ?>" style="margin-left:15px">
									<img id="<?php echo $key ?>symptomaticreviewimg" src="/ayushman/assets/images/add_arow.png" style="vertical-align:top;float:left" class="sectionimg" onclick='showForm("<?= $value ?>","symptomatic","<?php echo $key ?>symptomaticreviewtext")' title="Click to view form this section"/>
									<label class='bodytext_bold' style="vertical-align:top;float:left;cursor:pointer" onclick='showForm("<?= $value ?>","symptomatic","<?php echo $key ?>symptomaticreviewtext")' title="Click to view form this section"><?php echo $key; ?></label>
									<textarea id="<?php echo $key ?>symptomaticreviewtext" cols="140" readonly="readonly" rows="1"  style='overflow :hidden;' class='inlinetextarea' onkeypress='resizeInlineTextArea(this);'></textarea>
								</div>
							<?php }?>
							</div>
						</div>
						<input type="hidden" value="" id="textexamination" name='textexamination' />
						<div id="examinations" class="section">
							<img id="examinationsimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggleformarea('examinations');toggletextarea('examinations');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggleformarea('examinations');toggletextarea('examinations');" title="Click to expand this section" style="cursor:pointer">Examinations</label>
							<div style="float:right"><input type="checkbox" name="check[textexamination]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
							<textarea id="examinationstext" cols="150" style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
							<div id="examinationsforms" class="subsection" style="width:96%">
							<?php foreach($examinationViews as $key=>$value) {?>
								<div id="<?php echo $key ?>" style="margin-left:15px">
									<img id="<?php echo $key ?>examinationsimg" src="/ayushman/assets/images/add_arow.png" style="vertical-align:top;float:left;" class="sectionimg" onclick='showForm("<?= $value ?>","examinations", "<?php echo $key ?>examinationstext")' title="Click to view form this section"/>
									<label class='bodytext_bold' style="vertical-align:top;float:left;cursor:pointer" onclick='showForm("<?= $value ?>","examinations", "<?php echo $key ?>examinationstext")' title="Click to view form this section"><?php echo $key; ?></label>
									<textarea id="<?php echo $key ?>examinationstext" cols="140" readonly="readonly" rows="1"  style='overflow :hidden;' class='inlinetextarea' onkeypress='resizeInlineTextArea(this);'></textarea>
								</div>
							<?php }?>
							</div>
						</div>
						<div id="diagnosis" class="section">
							<img id="diagnosisimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('diagnosis');showpopupdiv('diagnosispopup','diagnosis');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('diagnosis');showpopupdiv('diagnosispopup','diagnosis');" title="Click to expand this section" style="cursor:pointer">Diagnosis</label>
							<div style="float:right"><input type="checkbox" name="check[textdiagnosisnote]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
							<textarea id="diagnosistext" name="textdiagnosisnote" cols="150" readonly="readonly" style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
					</div>
					<div id="prescription">
						<input type="hidden" id = "testids" name = "testIds" value="" />
						<div id="investigation" class="section">
							<img id="investigationimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('investigation');showAutoCompleteForm('testpopup');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('investigation');showAutoCompleteForm('testpopup');" title="Click to expand this section" style="cursor:pointer">Investigations</label>
							<div style="float:right"><a class = "bodytext_normal" onclick="getPastTests();" href="javascript:void(0);">Get Past Tests</a></div>
							<input type="hidden" name="check[textinvestigation]" value="on"/>
							<br />
							<textarea id="investigationtext" name="textinvestigation" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<input type="hidden" id = "medicineids" name = "medicineIds" value = "" />
						<div id="medicine" class="section">
							<img id="medicineimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('medicine');showAutoCompleteForm('medicinepopup');" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('medicine');showAutoCompleteForm('medicinepopup');" title="Click to expand this section" style="cursor:pointer">Medicine</label>
							<div style="float:right"><a class = "bodytext_normal" onclick="getPastMedicines();" href="javascript:void(0);">Get Past Medicies</a></div>
							<input type="hidden" name="check[textprescription]" value="on"/>
							<br />
							<textarea id="medicinetext" name="textprescription" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<div id="followup" class="section">
							<img id="followupimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('followup')" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('followup')" title="Click to expand this section" style="cursor:pointer" >Follow-Up</label>
							<div style="float:right"><input type="checkbox" name="check[textfollowupnote]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div><br />
							<textarea id="followuptext" name="textfollowupnote" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<div id="summary" class="section">
							<img id="summaryimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('summary')" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('summary')" title="Click to expand this section" style="cursor:pointer">Summary</label>
							<div style="float:right"><input type="checkbox" name="check[textsummarynote]" checked="checked"/><label class="bodytext_normal">Show to patient</label></div>
							<br />
							<textarea id="summarytext" name="textsummarynote" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
						<div id="confidential" class="section">
							<img id="confidentialimg" src="/ayushman/assets/images/add_arow.png" class="sectionimg" onclick="toggletextarea('confidential')" title="Click to expand this section"/>
							<label class="bodytext_bold" onclick="toggletextarea('confidential')" title="Click to expand this section" style="cursor:pointer">Confidential Note</label><br />
							<textarea id="confidentialtext" name="textconfidentialnote" cols="150"  style="overflow :hidden; display: none;" class="blocktextarea" onkeypress="resizeTextArea(this);"></textarea>
						</div>
					</div>
				</div>
				<input type="hidden" id="appid" name="appid" value="<?php echo $appid; ?>"/>
			</form>	
		</div>
	</div>
</div>
<div id="informationpopup" style="width:500px; background-color:#ffffff;" class="table_roundBorder">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; margin-bottom:10px;">
		&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
		<label id="informationheading" class="bodytext_bold">Information</label>
		<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="20" height="20" style="cursor:pointer;" onclick="$('#informationpopup').dialog('close');"/></label>
	</div>
	<div id="informationbody" style="width:100%;"></div>
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-top:1px solid #a8c8d9; margin-top:10px;"></div>
</div>
<div id="searchpopup" style="width:500px; background-color:#ffffff;" class="table_roundBorder">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; margin-bottom:10px;">
		&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
		<label id="searchheading" class="bodytext_bold">Search</label>
		<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="20" height="20" style="cursor:pointer;" onclick="$('#searchpopup').dialog('close');"/></label>
	</div>
	<div id="searchbody" style="width:100%;">
		<label class="bodytext_bold">Enter generic name in box to search for medicines</label>
		<input type='text' id='searchbox' style="height:29px;width:93%;margin-top:2px;" onclick='populateautocomplete(this);' />
		<button class="button" onclick='getSearchResults($("#searchbox").val())'>Search</button>
		<div style="max-height:25px">
			<table id = "searchguide" style="width:100%;display:none">
				<tr class="Heading_Bg">
					<td width="10%" align="middle">Type</td>
					<td width="25%" align="middle">Generic Elements</td>
					<td width="21%" align="middle">Name</td>
					<td width="19%" align="middle">Strength</td>
					<td width="15%" align="middle">Manufacturer</td>
					<td width="10%" align="middle">Prescribe</td>
				</tr>
			</table>
		</div>
		<div style="max-height:375px;overflow:auto;margin-top:5px;">
			<table id = "searchresult" style="width:100%;display:none">
			</table>
		</div>
	</div>
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-top:1px solid #a8c8d9; margin-top:10px;"></div>
</div>
<div id="relativePopup" style="width:500px; background-color:#ffffff;" class="table_roundBorder">
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; margin-bottom:10px;">
		&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
		<label id="relativeHeading" class="bodytext_bold">Relatives</label>
		<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="20" height="20" style="cursor:pointer;" onclick="$('#relativePopup').dialog('close');"/></label>
	</div>
	<div style="max-height:375px;overflow:auto;margin-top:5px;">
		<table id = "relativeResult" style="width:100%;">
		</table>
	</div>
</div>

</body>
<script type="text/javascript">
	function showRelatives(){
		var patId = '<?= $appointmentinfo->refappfromid_c; ?>'
		$("#relativeResult").empty();
		$.ajax({
				url: "/ayushman/cemrdashboard/getPrimaryRelatives/get?patId="+patId,
				success: function(jsonSearchResults) {
					searchResults = eval("("+jsonSearchResults+")");
					if(searchResults.length == 0){
						$("<td class='bodytext_bold' colspan='6' align='middle'>No Results Found</td>").appendTo($("#relativeResult"));
						$("#relativePopup").dialog("open");
					}
					else{
						for(var i=0;i<searchResults.length;i++){
							if(i % 2 != 0)
								var result = $("<tr id=result"+i+"></tr>");
							else
								var result = $("<tr id=result"+i+" style = 'background-color:#ecf8fb;'></tr>");
							$("<td width='10%' class='bodytext_normal' align='middle'>"+searchResults[i].id+"</td>").appendTo(result);
							$("<td width='25%' class='bodytext_normal' align='middle'>"+searchResults[i].name+"</td>").appendTo(result);
							$("<td width='10%' class='bodytext_normal' align='middle'><a onclick ='inviteRelative("+searchResults[i].id+");' href='javascript:void(0);'>Invite</a></td>").appendTo(result);
							$(result).appendTo($("#relativeResult"));
						}
						$("#relativePopup").dialog("open");
					}
				},
				error : function(){
					$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#relativeResult"));
					$("#relativePopup").dialog("open");
				}
			});
	}
	function inviteRelative(relativeId){
		connectedRelativeId = relativeId;
		$('#relativePopup').dialog('close');
		parent.sendmsgfromtemplate('inviting-<?=$appid?>-<?=$userid;?>',relativeId);
		clearTimeout(callingTimer);
		showNotification('400','70','','Calling....','timer','callingNotification',20000);
		callingTimer = setTimeout("relativeCallFail();",20000);
	}
	function relativeCallFail(){
		showNotification('400','70','','Could not connect to relative','timer','timernotification',5000);
	}
	$(document).ready(function(){
		organizeForms();
		$('#examinationsforms').hide();
		$('#symptomaticreviewforms').hide();
		if(consultationMode == 'online'){
			parent.sendmsgfromtemplate('calling-<?=$appid?>-<?=$userid;?>','<?= $appointmentinfo->refappfromid_c; ?>');
			$('#diagnosispopup').width("76%");
			$('#testspopup').width("76%");
			$('#medicinespopup').width("76%");
			$('#sendData').show();
			connect();
			showframe();
		}
		else{
			$('#inviteRelative').show();
			$('#viewSummary').show();
			$('#videoandchat').hide();
		}
		showExamination();
		createlistbox(jsondiagnosis);
		showframe();
		createNewMedicine();
		createNewTest();
		$('#informationpopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "500px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#searchpopup').dialog({
			position: "top",
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "90%",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#relativePopup').dialog({
			position: "top",
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "50%",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#searchbox').autocomplete({
			select: function(event, ui) {
				getSearchResults(ui.item.value);
			},
			minlength: 1,
			disable: false,
			source: "/ayushman/cautocompletedata/retrieve?query=select DISTINCT drugGenericName_c as value from drugmasters where active_c=1 and drugGenericName_c"
		});
		$(".ui-dialog-titlebar").hide();
	});

	function getSearchResults(query){
		$("#searchguide").hide();
		$("#searchresult").empty();
		if(query == ""){
			$("<td class='bodytext_bold' colspan='6' align='middle'>Please enter a search query</td>").appendTo($("#searchresult"));
			$("#searchresult").show();
		}
		else{
			$.ajax({
				url: "/ayushman/cemrdashboard/getSearchResults/get?query="+encodeURIComponent(query),
				success: function(jsonSearchResults) {
					searchResults = eval("("+jsonSearchResults+")");
					if(searchResults.length == 0){
						$("<td class='bodytext_bold' colspan='6' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
						$("#searchresult").show();
					}
					else{
						for(var i=0;i<searchResults.length;i++){
							if(i % 2 != 0)
								var result = $("<tr id=result"+i+" style = 'background-color:#ecf8fb;'></tr>");
							else
								var result = $("<tr id=result"+i+"></tr>");
							$("<td width='10%' class='bodytext_normal' align='middle'>"+searchResults[i].drugform+"</td>").appendTo(result);
							$("<td width='25%' class='bodytext_normal' align='middle'>"+searchResults[i].drugGenericName+"</td>").appendTo(result);
							$("<td width='21%' class='bodytext_normal' align='middle'>"+searchResults[i].drugName+"</td>").appendTo(result);
							$("<td width='19%' class='bodytext_normal' align='middle'>"+searchResults[i].drugStrength+"</td>").appendTo(result);
							$("<td width='15%' class='bodytext_normal' align='middle'>"+searchResults[i].drugManufacturer+"</td>").appendTo(result);
							$("<td width='10%' class='bodytext_normal' align='middle'><a onclick ='setMedicineFromPopup("+JSON.stringify(searchResults[i])+");' href='javascript:void(0);'>Prescribe</a></td>").appendTo(result);
							$(result).appendTo($("#searchresult"));
						}
						$("#searchguide").show();
						$("#searchresult").show();
					}
				},
				error : function(){
					$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
			});
		}
	}

	function setMedicineFromPopup(medicine){
		var medicineElements = $('#medicinecontent').children();
		var currElement = medicineElements[medicineElements.length - 1];
		var inputElements = currElement.getElementsByTagName("input");
		$(inputElements[0]).val(medicine.drugform).removeClass('watermark').addClass("listboxcomponenttext");;
		$(inputElements[1]).val(medicine.drugformid).removeClass('watermark').addClass("listboxcomponenttext");;
		$(inputElements[2]).val(medicine.drugName).removeClass('watermark').addClass("listboxcomponenttext");;
		$(inputElements[4]).val(medicine.drugStrength).removeClass('watermark').addClass("listboxcomponenttext");;
		$('#searchpopup').dialog('close');
		var imgElement = currElement.getElementsByTagName("img");
		$(imgElement[1]).trigger('click');
		$("#medicinecontent").trigger('mouseup');
	}

	function getPastTests(){
		$.ajax({
			url: "/ayushman/cemrdashboard/getPastTests/get?appid="+<?php echo $appid; ?>,
			success: function(jsonPastTests) {
		  		pastTests = eval("("+jsonPastTests+")");
				for(var i=0;i<pastTests.length;i++){
					var testElements = $('#testcontent').children();
					var currElement = testElements[testElements.length - 1];
					var inputElements = currElement.getElementsByTagName("input");
					for(var j=0; j<8; j++){
						$(inputElements[j]).val(pastTests[i][j]).removeClass('watermark').addClass("listboxcomponenttext");;
					}
					var imgElement = currElement.getElementsByTagName("img");
					$('#testcontent').trigger('mouseup');
					$(imgElement[1]).trigger('click');
				}
			},
			error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
		});
	}

	function getPastMedicines(){
		$.ajax({
			url: "/ayushman/cemrdashboard/getPastMedicines/get?appid="+<?php echo $appid; ?>,
			success: function(jsonPastMedicines) {
		  		pastMedicines = eval("("+jsonPastMedicines+")");
				for(var i=0;i<pastMedicines.length;i++){
					var medicineElements = $('#medicinecontent').children();
					var currElement = medicineElements[medicineElements.length - 1];
					var inputElements = currElement.getElementsByTagName("input");
					for(var j=0; j<14; j++){
						$(inputElements[j]).val(pastMedicines[i][j]).removeClass('watermark').addClass("listboxcomponenttext");
					}
					var imgElement = currElement.getElementsByTagName("img");
					$(imgElement[1]).trigger('click');
					$("#medicinecontent").trigger('mouseup');
				}
			},
			error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
		});
	}

	function getDrugInfo(helpImgElement){
		var medDiv = $(helpImgElement).parent();
		var drugType = medDiv.find('[id^="iddrugtype"]').val();
		var drugName = medDiv.find('[id^="drugname"]').val();
		var drugStrength = medDiv.find('[id^="drugstrength"]').val();
		$.ajax({
			url: "/ayushman/cemrdashboard/getDrugInfo/get?drugType="+drugType+"&drugName="+drugName+"&drugStrength="+drugStrength,
			success: function(jsonDrugInfo) {
				var drugInfo = eval("("+jsonDrugInfo+")"); 
				var infoDiv = $("<div style='width:100%'></div>");
				for(var x in drugInfo){
					var subDiv = $("<div></div>");
					$("<label class='bodytext_bold'>"+x+"</label>").appendTo(subDiv);
					$("<label>&nbsp:&nbsp&nbsp</label>").appendTo(subDiv);
					if(drugInfo[x] != null)
						$("<label class='bodytext_normal'>"+drugInfo[x]+"</label>").appendTo(subDiv);
					$(subDiv).appendTo(infoDiv);
					$("<br />").appendTo(infoDiv);

				}
				$("#informationbody").empty();
				$(infoDiv).appendTo($("#informationbody"));
				$("#informationpopup").dialog("open");
			},
			error : function(){}
		});
	}

	function getTestInfo(helpImgElement){
		var testDiv = $(helpImgElement).parent();
		var testType = testDiv.find('[id^="idcategory"]').val();
		var testName = testDiv.find('[id^="testname"]').val();
		var testSample = testDiv.find('[id^="testsample"]').val();
		if(testSample == "Sample"){
			testSample = "";
		}
		$.ajax({
			url: "/ayushman/cemrdashboard/getTestInfo/get?testName="+testName+"&testSample="+testSample,
			success: function(jsonTestInfo) {
				var testInfo = eval("("+jsonTestInfo+")"); 
				var infoDiv = $("<div style='width:100%'></div>");
				for(var x in testInfo){
					var subDiv = $("<div></div>");
					$("<label class='bodytext_bold'>"+x+"</label>").appendTo(subDiv);
					$("<label>&nbsp:&nbsp&nbsp</label>").appendTo(subDiv);
					if(testInfo[x] != null)
						$("<label class='bodytext_normal'>"+testInfo[x]+"</label>").appendTo(subDiv);
					$(subDiv).appendTo(infoDiv);
					$("<br />").appendTo(infoDiv);

				}
				$("#informationbody").empty();
				$(infoDiv).appendTo($("#informationbody"));
				$("#informationpopup").dialog("open");
			},
			error : function(){}
		});
	}

	function createNewMedicine(){
		dosageSource = Array;
		dosageSource= $.parseJSON(<?php print json_encode(json_encode($dosageSource)); ?>);  
		medicineDivId="medicine"+Math.floor(Math.random()*999999);
		var medicineDiv = $("<div id='"+medicineDivId+"' style='height:20px; padding-left:10px;'></div>");
		var typeBox = createAutoCompleteBox("drugtype",medicineDiv,"Type");
		var nameBox = createAutoCompleteBox("drugname",medicineDiv,"Name");
		var strengthBox = createAutoCompleteBox("drugstrength",medicineDiv,"Strength");
		var dosageBox = createAutoCompleteBox("drugdosage",medicineDiv,"Dosage");
		var frequencyBox = createAutoCompleteBox("drugfrequency",medicineDiv,"Frequency");
		var durationBox = createAutoCompleteBox("drugduration",medicineDiv, "Duration");
		var instructionBox = createAutoCompleteBox("druginstruction",medicineDiv, "Special Instruction");
		var typeBoxQuery = "select id as id, drugform_c as value from drugformmasters where drugform_c";
		$(typeBox).attr('readonly','readonly');
		typeBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery,
			select: function(event, ui) {
					var medDiv = typeBox.parent();
					medDiv.find('[id^="iddrugtype"]').val(ui.item.id);
				},
		});
		nameBox.autocomplete({minlength: 1, disable: false});
		nameBox.focus(function(){
			var medDiv = nameBox.parent();
			var drugtype = medDiv.find('[id^="iddrugtype"]').val();
			if(drugtype != "" && drugtype != -1){
				var nameBoxQuery = 'select DISTINCT DrugName_c as value from drugmasters where active_c=1 and drugform_c = "'+drugtype+'" and DrugName_c';
			}
			else{
				var nameBoxQuery = 'select DISTINCT DrugName_c as value from drugmasters where active_c=1 and DrugName_c';
			}
			nameBox.autocomplete({minLength: 1,source: "/ayushman/cautocompletedata/retrieve?query="+nameBoxQuery});
		});
		strengthBox.focus(function(){
			var medDiv = strengthBox.parent();
			var drugName = medDiv.find('[id^="drugname"]').val();
			if(drugName == "Name"){
				strengthBox.autocomplete({source:[""]});
			}
			else{
				var strengthBoxQuery = "select DISTINCT drugStrength_c as value from drugmasters where active_c=1 and DrugName_c like '"+drugName+"' and drugStrength_c";
				strengthBox.autocomplete({source:"/ayushman/cautocompletedata/retrieve?query="+strengthBoxQuery});
			}
		});
		dosageBox.focus(function(){
			var medDiv = dosageBox.parent();
			var drugForm = medDiv.find('[id^="drugtype"]').val();
			dosageBox.autocomplete({source:dosageSource[drugForm]});
		});
		frequencyBox.autocomplete({source:['x 1 time per day','x 2 times per day','x 3 times per day','x 4 times per day']});
		durationBox.autocomplete({source:['x 1 Day','x 2 Days','x 3 Days','x 4 Days','x 5 Days','x 7 Days','x 10 Days','x 2 Weeks','x 3 Weeks','x 4 Weeks','x 1 Month','x 2 Months','x 3 Months','x 4 Months','x 6 Months','x 1 Year','SOS']});
		instructionBox.autocomplete({source:['After Food','Apply','At bed time','Before Dinner','Before Food','Chew','Dont eat anything before and after 30 minutes ','Early Morning','Empty Stomach','Not in empty stomach','Use','Wash']});
		medicineDiv.appendTo($('#medicinecontent'));
		typeBox.width("9%");
		nameBox.width("25%");
		strengthBox.width("9%");
		dosageBox.width("6%");
		frequencyBox.width("9%");
		durationBox.width("6%");
		instructionBox.width("12%");
		$("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;' title='More Info' onclick='getDrugInfo(this);'/>").appendTo(medicineDiv);
		var str = "createNewMedicine();changeIcon(this);";
		$("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;' title='Add More Medicines' onclick='"+str+"'/>").appendTo(medicineDiv);
	}

	function changeIcon(img){
		$(img).attr('src','/ayushman/assets/images/minus.gif');
		$(img).attr('onclick', 'deleteParent(this)');
	}

	function deleteParent(img){
		var parentDiv = $(img).parent();
		var contentDiv = $(parentDiv).parent();
		$(parentDiv).remove();	
	}

	function createAutoCompleteBox(id, targetDiv, watermark){
		randomNumber = Math.floor(Math.random()*999999);
		autoCompleteBoxId = id+randomNumber;
		autoCompleteBox = $("<input type='text' id='"+autoCompleteBoxId+"' onclick='populateautocomplete(this);' style='border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px;float:left;'/>").appendTo(targetDiv);
		autoCompleteBox.autocomplete({
			minLength: 0,
			disabled: false,
		});
		addWaterMark(autoCompleteBox,watermark);
		idBoxId = "id" + id + randomNumber;
		$("<input type='hidden' id='"+idBoxId+"' name='hfvalue' value='-1'/>").appendTo(targetDiv);
		return autoCompleteBox;
	}

	function createNewTest(){
		testDivId="test"+Math.floor(Math.random()*999999);
		var testDiv = $("<div id='"+testDivId+"' style='height:20px; padding-left:10px;'></div>");
		var categoryBox = createAutoCompleteBox("category",testDiv,"Category");
		var nameBox = createAutoCompleteBox("testname",testDiv,"Name");
		var sampleBox = createAutoCompleteBox("testsample",testDiv,"Sample");
		var pathologistBox = createAutoCompleteBox("pathologist",testDiv,"Recommended Pathologist");
		var categoryBoxQuery = "select id as id, testsubcategoryname_c as value from testsubcategorymasters where active_c = 1 and testsubcategoryname_c";
		categoryBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+categoryBoxQuery,
			select: function(event, ui) {
					var testDiv = categoryBox.parent();
					testDiv.find('[id^="idcategory"]').val(ui.item.id);
				},
		});
		$(categoryBox).attr('readonly','readonly');
		nameBox.focus(function(){
			var testDiv = nameBox.parent();
			var testtype = testDiv.find('[id^="idcategory"]').val();
			if(testtype != "" && testtype != -1){
				var nameBoxQuery = 'select DISTINCT testname_c as value from testmasters where active_c=1 and reftestsubcategoryid_c = '+testtype+' and testname_c';
			}
			else{
				var nameBoxQuery = 'select DISTINCT testname_c as value from testmasters where active_c=1 and testname_c';
			}
			nameBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+nameBoxQuery});
		});
		sampleBox.focus(function(){
			var testDiv = sampleBox.parent();
			var testname = testDiv.find('[id^="testname"]').val();
			if(testname == "Name"){
				alert("Please select test first");
				sampleBox.autocomplete({source:[""]});
			}
			else{
				var sampleBoxQuery = 'select DISTINCT sample_c as value from testmasters where active_c=1 and testname_c like "%'+testname+'%" and sample_c';
				sampleBox.autocomplete({source:"/ayushman/cautocompletedata/retrieveEncoded?query="+encodeURIComponent(sampleBoxQuery)});
			}
		});
		pathologistBoxQuery = 'select pathologists.id as id,nameofcenter_c as value from pathologists left join users on users.id= pathologists.refpathologistsuserid_c where users.activationstatus_c= "active" and nameofcenter_c'
		pathologistBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+pathologistBoxQuery,
			select: function(event, ui) {
					var testDiv = categoryBox.parent();
					testDiv.find('[id^="idpathologist"]').val(ui.item.id);
				},
		});
		testDiv.appendTo($('#testcontent'));
		categoryBox.width("15%");
		nameBox.width("25%");
		sampleBox.width("15%");
		pathologistBox.width("25%");
		$("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;' title='More Info' onclick='getTestInfo(this);'/>").appendTo(testDiv);
		var str = "createNewTest();changeIcon(this);";
		$("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;' title='Add More Test' onclick='"+str+"'/>").appendTo(testDiv);
	}

	function setTests(){
		var data = eval('('+getselecteditemsinjson('testcontent',4)+')');
		$("#investigationtext").html('');
		for(var i=0; i<data.length; i=i+4){
			if(i == 0)
				$("#investigationtext").html($("#investigationtext").html() + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]);
			else
				$("#investigationtext").html($("#investigationtext").html() + '\n' + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]);
		}
		$("#investigationtext").trigger('keypress');
		$("#investigationtext").trigger('change');
	}
	
	function setMedicines(){
		var data = eval('('+getselecteditemsinjson('medicinecontent',7)+')');
		$("#medicinetext").text('');
		for(var i=0; i<data.length; i= i + 7){
			if(i==0)
				$("#medicinetext").html($("#medicinetext").html() + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]+ ' - ' + data[i+4][0]+ ' - ' + data[i+5][0]+ ' - ' + data[i+6][0]);
			else
				$("#medicinetext").html($("#medicinetext").html() + '\n'+ data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]+ ' - ' + data[i+4][0]+ ' - ' + data[i+5][0]+ ' - ' + data[i+6][0]);
		}
		$("#medicinetext").trigger('keypress');
		$("#medicinetext").trigger('change');
	}

	function showAutoCompleteForm(id){
		$('#formtarget').children().hide();
		$('#'+id).show();
	}
	
	var consultationMode = '<?= $mode; ?>'.toLowerCase();
	var connectedRelativeId;
	var relativeStatus; 
	var jsondiagnosis = [{id: "listboxdiagnosis",
			      dataitem:{
				0:{textbox:"",	autocomplete:'true',watermarktext:'Diagnosis',query:'select id as id, diseasename_c as value from diseasemasters where diseasename_c'},
				1:{textbox:"",	autocomplete:'true',watermarktext:'Diagnosis',query:'select id as id, diseasename_c as value from diseasemasters where diseasename_c'}
			      },
			      targetid: "divdiagnosis",
			      boxes:2,
			      label: "Diagnosis"}];
	var sendDataTimer = 0;
	var endconsultationTimer = 0;
	var callingTimer = 0;
	var sentDataFlag = false;
	var msgQ = new Object;
	var consultationStatus = 'Not Consulting';
	
	function organizeForms(){
		var examLabels = $('#examinationsforms').find('label');
		var symptomaticLabels = $('#symptomaticreviewforms').find('label');
		var maxLabelWidth = 0;
		if(examLabels.length > 0){
			for(var j=0;j<examLabels.length;j++){
				var currWidth = $(examLabels[j]).width();
				if(currWidth > maxLabelWidth)
					maxLabelWidth = currWidth;
			}
		}
		else{
			var currWidth = $(examLabels).width();
			if(currWidth > maxLabelWidth)
				maxLabelWidth = currWidth;
		}
		if(symptomaticLabels.length > 0){
			for(var j=0;j<symptomaticLabels.length;j++){
				var currWidth = $(symptomaticLabels[j]).width();
				if(currWidth > maxLabelWidth)
					maxLabelWidth = currWidth;
			}
		}
		else{
			var currWidth = $(symptomaticLabels).width();
			if(currWidth > maxLabelWidth)
				maxLabelWidth = currWidth;
		}
		if(examLabels.length > 0){
			for(var j=0;j<examLabels.length;j++){
				$(examLabels[j]).width(maxLabelWidth);
			}
		}
		else{
			$(examLabels).width(maxLabelWidth);
		}
		if(symptomaticLabels.length > 0){
			for(var j=0;j<symptomaticLabels.length;j++){
				$(symptomaticLabels[j]).width(maxLabelWidth);
			}
		}
		else{
			$(symptomaticLabels).width(maxLabelWidth);
		}
	}
	
	function viewSummary(){
		var location="";
		prepareEmrForm();		
		$.ajax({
			type: "post",
			url: "/ayushman/cemrdashboard/viewSummary",
			data: $("#emrform").serialize(),
			async:false,
			success:function( data ){
				if(data != 'error'){
				location = data;
				if(relativeStatus == "Connected"){
						parent.sendmsgfromtemplate('GET DATA',connectedRelativeId);
					}
					success = true;
				}
				else
					alert('Please Try Again');
			},
			error:function(){
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
			},
		});
		if(success){
			var win=window.open('/ayushman/'+location, '_blank');
 	 	 	win.focus();
		}
	}
	
	function prepareEmrForm(){
		var testIds = getselecteditemsinjson('testcontent',4);
		var medicineIds = getselecteditemsinjson('medicinecontent',7);
		var allsymptoms = $('#symptomaticreviewforms').children();
		var symptomatictextvalue = "";
		if($('#symptomaticreviewtext').val() != "")
			symptomatictextvalue = $('#symptomaticreviewtext').val() + "\n";
		for(var i=0;i<allsymptoms.length;i++){
			var textElement = $(allsymptoms[i]).find('textarea');
			if($(textElement).val()!=""){
				var labelElement = $(allsymptoms[i]).find('label');
				symptomatictextvalue = symptomatictextvalue + labelElement.text() + ':-' + textElement.val() + "\n";
			}
		}
		var allexaminations = $('#examinationsforms').children();
		var examinationstextvalue = "";
		if($('#examinationstext').val() != "")
			examinationstextvalue = $('#examinationstext').val() + "\n";
		for(var i=0;i<allexaminations.length;i++){
			var textElement = $(allexaminations[i]).find('textarea');
			if($(textElement).val()!=""){
				var labelElement = $(allexaminations[i]).find('label');
				examinationstextvalue = examinationstextvalue + labelElement.text() + ':-' + textElement.val() + "\n";
			}
		}
		$('#testids').attr('value',testIds);	
		$('#medicineids').attr('value',medicineIds);	
		$('#textsymptom').attr('value',symptomatictextvalue);
		$('#textexamination').attr('value',examinationstextvalue);
	}
	
	function showForm(formName,formType, targettextid){
		$('#formtarget').children().hide();
		if($('#'+formName).length != 0)
			$('#'+formName).show();
		else{
			var form = new formmodule();
			form.showForm(formName,formType, "formtarget",targettextid);
		}
	}
	
	$("#emrform :input").change(function() {
  		sentDataFlag = false;
	});
	
	$(window).unload(function(){
		$.ajax({
		  url: "/ayushman/cemrdashboard/disconnect?appid="+<?php echo $appid; ?>,
		  async : false,
		 });
	});
	
	function sendDataToPatient(){
		sentDataFlag = true;
		clearTimeout(sendDataTimer);
		showNotification('400','70','','Sending Data To Patient...','timer','ltimernotification',15000);
		sendDataTimer = setTimeout("sendDataTimeout();",15000);
		prepareEmrForm();		
		$.ajax({
			type: "post",
			url: "/ayushman/cemrdashboard/saveAppointmentData",
			data: $("#emrform").serialize(),
			success:
			function( data ){
				if(data == 'success')
					sendMessage("Get Data");
				else
					alert('Please Try Again');
			},
			error:
			function(){
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
			},
		});
	}

	function sendMessage(message){
		msgId = Math.floor((Math.random()*10000)+1);
		msgQ[msgId] = message;
		if(consultationStatus != 'Consulting'){
			responseHandler("Failed",msgId);
		}
		else{
			parent.mustsendmsgfromtemplate(message,'<?= $appointmentinfo->refappfromid_c; ?>',msgId);
		}
	}
	
	function connect(){
		$.ajax({
		  url: "/ayushman/cemrdashboard/connect?appid="+<?php echo $appid; ?>,
		  success: function( data ) {},
			error : function(){showMessage('550','200','Connection Error',"Could not connect to server.",'error','id');}
		});	
	}

	function showframe(){
		var iframe = document.getElementById('video');
		iframe.src=window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/video/index.html?roleId=1&callId=<?=$appid?>&name=<?=$name?>";
	}
	
	function callFail(){
		showNotification('400','70','','Could not connect to patient','timer','timernotification',5000);
		document.location="/ayushman/cdashboard/view";
	}

	function msg_handler(message){
		if(message == "prescriptionRejected"){
			StopTheClock();
			$('#notification').dialog('close');
			str = 'The patient wants to continue the consultation.<br/><form><input type="radio" id="continue" name="closure" selected="true" value="graceful" checked="checked"/>I would like to continue consultation.<br /><input type="radio" id="endanyway" name="closure" value="forceful" />I would still like to End Consultation.<br/></form>'
			showMessage('600','150','End Consultation',str,'choose','continueConsult');
		}
		if(message == "prescriptionAccepted"){
			StopTheClock();
			transaction();
		}
		if(message == "Wait"){
			consultationStatus = 'Not Consulting';
			clearTimeout(callingTimer);
			showNotification('400','70','','Calling....','timer','callingNotification',60000);
			callingTimer = setTimeout("callFail();",60000);
		}
		if(message == "Consult"){
			clearTimeout(callingTimer);
			consultationStatus = 'Consulting';
			showNotification('400','70','','Patient has connected to consultation','timer','timernotification',5000);
		}
		if(message == "Aborted"){
			consultationStatus = 'Not Consulting';
			showNotification('400','70','','Patient has disconnected from consultation','timer','timernotification',5000);
		}
		if(message == "Rejected Call"){
			clearTimeout(callingTimer);
			showNotification('400','70','','Patient has rejected the call','timer','timernotification',5000);
			parent.location="/ayushman/cdashboard/view";
		}
		if(message == "Relative Rejected Call"){
			clearTimeout(callingTimer);
			showNotification('400','70','','Relative has rejected the call','timer','timernotification',5000);
		}
		if(message == "Relative Accepted Call"){
			clearTimeout(callingTimer);
			showNotification('400','70','','Relative has accepted the call','timer','timernotification',5000);
			$('#videoandchat').show();
			showframe();
			relativeStatus = "Connected";
		}
	}
	
	function responseHandler(response, id){
		var originalMsg = msgQ[id];
		delete msgQ[id];
		switch(originalMsg){
			case "Get Data":
				switch(response){
					case "Successfull":
						clearTimeout(sendDataTimer);
						showNotification('400','70','Send data','Send Data to patient successfull!','timer','timernotification',5000);
						break;
					case "Failed":
						clearTimeout(sendDataTimer);
						showNotification('400','70','Send data','Could not send data to patient.<br/>You could ask the patient to manually click on "GET DATA" button.','timer','timernotification',5000);
						break;
				}
				break;
			case "Ask for finalize permission":
				switch(response){
					case "Successfull":
						clearTimeout(endconsultationTimer);
						toggleStatus();
						break;
					case "Failed":
						clearTimeout(endconsultationTimer);
						showNotification('400','70','Send data','Could not get confirmation from patient!','timer','timernotification',5000);
						transaction();
						break;
				}
				break;
		}
	}
	
	function sendDataTimeout(){
		showMessage('600','150','Send Data','Unable to send data. Please try again or ask patient to click on GET DATA button.','error','continueConsult');
	}

	function confirm_endconsultation(){
		if(consultationMode == 'online'){
			if(sentDataFlag == false){
				alert("Please Click on 'SEND DATA' before ending consultation");
			}
			else{
				showMessage('250','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
			}	
		}
		else{
			showMessage('250','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
		}
	}

	function finalizeConsultationEndFromPatient(){
		clearTimeout(endconsultationTimer);
		showNotification('400','70','','Notifying Patient...','timer','ltimernotification',15000);
		endconsultationTimer = setTimeout("showMessage('600','150','End Consultation','Connection Error. Please Try Again.','error','continueConsult');",15000);
		sendMessage("Ask for finalize permission");
	}
	
	function Confirmation_Event(id,confirmation){
		if(id == 'confirmEndConsultation'){
			if(confirmation == 'yes'){
				if(consultationMode == 'in-clinic')
					transaction();
				else
					finalizeConsultationEndFromPatient();
			}
		}
		if(id == 'fundTransfer'){
			if(confirmation == 'yes'){
				if($("#todoctor").attr(checked='checked')){
					transferto="doctor";
				}
				else{
					transferto="patient";
				}
				endConsultationWithTransfer(transferto);
			}
		}
		if(id == 'continueConsult'){
			if(confirmation == 'yes'){
				if($("#endanyway").attr(checked='checked')){
					transaction();
				}
			}
		}
	}
	
	function transaction(){
		if("<?php echo $is_paid; ?>" == '1'){
			str = 'The session has ended gracefully. A Visit Summary has been put in patient`s EMR at this time.Please click appropriate Checkbox for completing the accounting.<br/><br/><form><input type="radio" id="todoctor" name="closure" selected="true" value="graceful" checked="checked"/>Please credit my account with my consultation Charges.<br /><input type="radio" id="topatient" name="closure" value="forceful" />I authorise IndiaOnlineHealth to waive my Consultation Charges for this consultation and credit the same to patient`s account.<br/></form>'
			showMessage('600','150','End Consultation',str,'choose','fundTransfer');
		}
		else{
			alert("Please Collect Fees From Patient");
			endConsultationWithoutTransfer();
		}
	}
	
	function endConsultationWithoutTransfer(){
		generateBill();
		prepareEmrForm();
		$.ajax({
			type: "post",
			url: "/ayushman/cemrdashboard/endConsultationWithoutTransfer",
			data: $("#emrform").serialize(),
			success:function( data ){
				if(data != 'error'){
					window.open("/ayushman/"+data);
					parent.location="/ayushman/cdashboard/view";
				}
				else
					alert('Please Try Again');
			},
			error:function(){
				showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
			},
		});
	}
	
	function endConsultationWithTransfer(transferto){
		$('#transferto').val(transferto);
		if(consultationMode != "online")
		 	generateBill();
		prepareEmrForm();
		$.ajax({
			type: "post",
			url: "/ayushman/cemrdashboard/endConsultationWithTransfer",
			data: $("#emrform").serialize(),
			success:function( data ){
				if(data != 'error'){
					sendMessage('End Consultation');
					window.open("/ayushman/"+data);
					parent.location="/ayushman/cdashboard/view";
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

	function generateBill(){
		window.open(window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cbill/generate?id=<?=$appid?>&edit=true','Bill','width=610px,height=760px,toolbar=no,location=center,directories=no,status=yes,menubar=no,scrollbars=no,copyhistory=no, resizable=yes');
	}
	
	function showExamination(){
		$('#examinationbutton').attr('class','Consul_Sub_buttonWhite');
		$('#examination').show();
		$('#prescriptionbutton').attr('class', 'Consul_Sub_buttonBlue');
		$('#prescription').hide();
	}
	
	function showPrescription(){
		$('#prescriptionbutton').attr('class', 'Consul_Sub_buttonWhite');
		$('#prescription').show();
		$('#examinationbutton').attr('class','Consul_Sub_buttonBlue');
		$('#examination').hide();
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
	
	function resizeInlineTextArea(t) {
		var a = t.value.split('\n');
		var b=0;
		for (var x=0;x < a.length; x++) { 
			if (a[x].length >= t.cols) 
				b+= Math.floor(a[x].length/t.cols);
		}
		b+= a.length;
		t.rows = b;
	}
	
	function toggleformarea(id){
		var formareaid 	= id + "forms";
		var imgid	= id + "img";
		if($('#'+formareaid).is(':visible')){
			$('#'+formareaid).hide();
			$('#'+imgid).attr('src','/ayushman/assets/images/add_arow.png');
			$('#'+imgid).attr('title','Click to expand this section');
		}
		else{
			$('#'+formareaid).show();
			$('#'+formareaid).focus();
			$('#'+imgid).attr('src','/ayushman/assets/images/Delete_arow.png');
			$('#'+imgid).attr('title','Click to collapse this section');
		}
	}
	
	function toggletextarea(id){
		var textareaid 	= id + "text";
		var imgid		= id + "img";
		if($('#'+textareaid).is(':visible')){
			$('#'+textareaid).hide();
			$('#'+imgid).attr('src','/ayushman/assets/images/add_arow.png');
			$('#'+imgid).attr('title','Click to expand this section');
		}
		else{
			$('#'+textareaid).show();
			$('#'+textareaid).focus();
			$('#'+imgid).attr('src','/ayushman/assets/images/Delete_arow.png');
			$('#'+imgid).attr('title','Click to collapse this section');
		}
	}

	function show_emr(){
		window.open('/ayushman/cpatienthistorydisplay/displaydemographic?appointmentid=<?php echo $appid; ?>&controller=cemrdashboard&back=false&showall=true&patientid=<?php echo $appointmentinfo->refappfromid_c; ?>','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	
	function showpopupdiv(popup_name, sectionname){
		if($('#'+sectionname+'text').is(':visible')){
			$('#formtarget').children().hide();
			$("#"+popup_name).show(1000);	
		}
	}
	
	function toggleStatus() {
		InitializeTimer(60);
		showNotification('400','70','Send data','Patient is reviewing your Prescription. It may take up to one minute for patient to review and ask question if any.<br/><br/>Time Elapsed...<label id="lbltimeelapsed">0</label>','timer','timernotification',60000);
		$('#message').dialog( "option", "position", "center" );
	}
	
	function TimeElapsed(secs){
		$('#lbltimeelapsed').html(secs+' secs');
	}
	
	function timeout(){
		transaction();
	}
		
	function setDiagnosis(){
		var data = eval('('+getselecteditemsinjson('divdiagnosis',2)+')');
		$("#diagnosistext").text('');
		for(var i=0; i<data.length; i= i + 2){
			$("#diagnosistext").html($("#diagnosistext").html() + data[i][0] + '. ' + data[i+1][0]+'. ');
		}
		$("#diagnosistext").trigger('keypress');
		$("#diagnosistext").trigger('change');
	}
</script>
