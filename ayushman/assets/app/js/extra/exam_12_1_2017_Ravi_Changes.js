function TimeElapsed(secs){
    $('#lbltimeelapsed').html(secs+' secs');
}
function timeout(){
    transaction();
}
var consultationMode;
var payment_status;
function Confirmation_Event(id,confirmation){
    if(id == 'confirmEndConsultation'){
		if(confirmation == 'yes'){
			angular.element($('#contentDiv')).scope().unsavedData = false;
			if(consultationMode == 'in-clinic'){
				angular.element($("#contentDiv")).scope().appointment_info.Appointmentstatus="completed";
				transaction();
			}
			else{
				InitializeTimer(60);
				angular.element($('#contentDiv')).scope().finalizeConsultationEndFromPatient();
			}
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
function endConsultationWithoutTransfer(){
    //generateBill();
	prepareEmrForm();

	if(changedQuestion == undefined){
		
	}else{
		if(changedQuestion['vitals'] != undefined && (changedQuestion['vitals']['vitals_q_1'] != undefined || changedQuestion['vitals']['vitals_q_2'] != undefined)){
			i = changedQuestion['vitals'];
			for(var j in i){
				//$("#vitalsTextTarget").val(changedQuestions[i][j]);
			}
		}
	}
	$("body").css("cursor", "wait");
	angular.element($('#contentDiv')).scope().launchPrintablePrescription();
    $.ajax({
		type: "post",
		url: "/ayushman/newcemrdashboard/endConsultationWithoutTransfer",
		data: $("#emrform").serialize(),
		success:function( data ){
			if(data != 'error'){
				
			}
			else{
				angular.element($('#contentDiv')).scope().launchPrintablePrescription();
				alert('Failed to end consultation. try again.');
			}
			$("body").css("cursor", "default");
		},
		error:function(){
			showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
		},
    });
}

function endConsultationWithTransfer(transferto){
	
	$("body").css("cursor", "wait");
    $('#transferto').val(transferto);
	
    if(consultationMode == "online"){
		this.step = 1;
	}
    prepareEmrForm();
    $.ajax({
	type: "post",
	url: "/ayushman/newcemrdashboard/endConsultationWithTransfer",
	data: $("#emrform").serialize(),
	success:function( data ){
	    if(data != 'error'){
			angular.element($('#contentDiv')).scope().launchPrintablePrescription();
	    }
	    else
			alert('Please Try Again');
		$("body").css("cursor", "default");
	},
	error:
	function(){
	    showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
	},
    });
}
function transaction(){
    if(payment_mode == 1){
		str = 'The session has ended gracefully. A Visit Summary has been put in patient`s EMR at this time.Please click appropriate Checkbox for completing the accounting.<br/><br/><form><input type="radio" id="todoctor" name="closure" selected="true" value="graceful" checked="checked"/>Please credit my account with my consultation Charges.<br /><input type="radio" id="topatient" name="closure" value="forceful" />I authorise IndiaOnlineHealth to waive my Consultation Charges for this consultation and credit the same to patient`s account.<br/></form>'
		showMessage('600','150','End Consultation',str,'choose','fundTransfer');
    }
    else{
		endConsultationWithoutTransfer();
    }
}
function openDialog(url, width, height,obj){
	 $.fancybox({
		'width': width,
		'height': height,
		'autoScale': false,
		'transitionIn': 'fade',
		'transitionOut': 'fade',
		'type': 'iframe',
		'href': url,
		'showCloseButton': true,
		'afterClose' : function(){
			if(obj.fancyboxclosed != undefined){
				obj.fancyboxclosed(obj);
			}
		}
	});
}
function fancyboxclosed(obj){
	if(obj.step ==1){
		this.step = 2;
		//alert(window['pdfurl']);
		openDialog(window['pdfurl'],800,600,this);
	}else if(obj.step == 2){
		window.location="/ayushman/cdashboard/view";
	}
}

function generateBill(){
	if(this.step == 1){
		fancyboxclosed(this);
	}else{
		this.step = 1;
		openDialog(window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cbill/generate?id='+appointmentid+'&edit=true',800,600,this);
	}
}
function getSearchResults(query){
    $("#searchguide").hide();
    $("#searchresult1").empty();
    if(query == ""){
	$("<td class='bodytext_bold' colspan='6' align='middle'>Please enter a search query</td>").appendTo($("#searchresult1"));
	$("#searchresult1").show();
    }
    else{
	$.ajax({
	    url: "/ayushman/newcemrdashboard/getSearchResults/get?query="+encodeURIComponent(query),
	    success: function(jsonSearchResults) {
			searchResults = eval("("+jsonSearchResults+")");
			if(searchResults.length == 0){
				$("<td class='bodytext_bold' colspan='6' align='middle'>No Results Found</td>").appendTo($("#searchresult1"));
				$("#searchresult1").show();
			}
			else{
				for(var i=0;i<searchResults.length;i++){
					if(i % 2 != 0){
						var result = $("<tr id=result"+i+" style = 'background-color:#ecf8fb;'></tr>");
					}
					else{
						var result = $("<tr id=result"+i+"></tr>");
						$("<td width='10%' class='bodytext_normal' style='padding-left:10px' align='left'>"+searchResults[i].drugform+"</td>").appendTo(result);
						$("<td width='25%' class='bodytext_normal' style='padding-left:10px' align='left'>"+searchResults[i].drugGenericName+"</td>").appendTo(result);
						$("<td width='21%' class='bodytext_normal' style='padding-left:10px' align='left'>"+searchResults[i].drugName+"</td>").appendTo(result);
						$("<td width='19%' class='bodytext_normal' style='padding-left:10px' align='left'>"+searchResults[i].drugStrength+"</td>").appendTo(result);
						$("<td width='15%' class='bodytext_normal' style='padding-left:10px' align='left'>"+searchResults[i].drugManufacturer+"</td>").appendTo(result);
						$("<td width='10%' class='bodytext_normal' style='padding-left:10px' align='middle'><a onclick ='setMedicineFromPopup("+JSON.stringify(searchResults[i])+")' href='javascript:void(0);'><font style='color:blue'>Prescribe</font></a></td>").appendTo(result);
						$(result).appendTo($("#searchresult1"));
					}
				}
				$("#searchguide").show();
				$("#searchresult1").show();
			}
	    },
	    error : function(){
			$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult1"));
			$("#searchresult1").show();
	    }
	});
    }
}
function setMedicineFromPopup(medicine){
	$("#medicines").val(medicine.drugform+'. '+medicine.drugName+' ('+medicine.drugStrength+')');
    $('#searchpopup').dialog('close');
}

function prepareEmrForm(){
  /*  var allSymptoms = $('#symptomatic_text_container').children();
    var symptomaticTextValue = "";
    for(var i=0;i<allSymptoms.length;i++){
		var textElement = $(allSymptoms[i]);
		if($(textElement).val()!="" && $(textElement).val()!= undefined){
			var labelElement = $(allSymptoms[i]).attr('name');
			symptomaticTextValue = symptomaticTextValue + labelElement + ':-' + textElement.val() + "\n";
		}
    }
    var allExaminations = $('#examinations_text_container').children();
    var examinationsTextValue = "";
    for(var i=0;i<allExaminations.length;i++){
		var textElement = $(allExaminations[i]);
		if($(textElement).val()!="" && $(textElement).val()!= undefined){
			var labelElement = $(allExaminations[i]).attr('name');
			examinationsTextValue = examinationsTextValue + labelElement + ':-' + textElement.val() + "\n";
		}
    }*/
    jsonStr = readCookie('medicine_text');
	$('#medicine_ids').val(jsonStr);
	
	jsonStr = readCookie('investigation_text');
	$('#test_ids').val(jsonStr);
	
	jsonStr = readCookie('diagnosis_text');
	$('#diagnosis_text').val(jsonStr);
	
	jsonStr = readCookie('symptom_text');
	$('#text_complaint').val(jsonStr);
	
	jsonStr = readCookie('report_text');
	$('#text_reportparameter').val(jsonStr);

	jsonStr = readCookie('report_ids');
	$('#parameterids').val(jsonStr);
	
	jsonStr = readCookie('text_followup_note');
	$('#text_followup_note').val(jsonStr);
	
	jsonStr = readCookie('examinationsummary_text');
	$('#text_examinationsummary').val(jsonStr);

/*	jsonStr = readCookie('textreportparameter');
	$('#textreportparameter').val(jsonStr);*/
	
	jsonStr = readCookie('appid');
	$('input[name=appid]').val(jsonStr);
	
	$('#check_examinations').val(angular.element($('#contentDiv')).scope().examination_data.check_examinations);
	$('#check_examinationsummary').val(angular.element($('#contentDiv')).scope().examination_data.check_examinationsummary);
	$('#check_symptomaticreview').val(angular.element($('#contentDiv')).scope().examination_data.check_symptomaticreview);
		
//	if(changedQuestion['vitals'] != undefined && (changedQuestion['vitals']['vitals_q_1'] != undefined || changedQuestion['vitals']['vitals_q_2'] != undefined)){
	if(changedQuestion['vitals'] != undefined && (changedQuestion['vitals']['vitals_q_1'] != undefined || changedQuestion['vitals']['vitals_q_2'] != undefined)||changedQuestion['vitals']['vitals_q_8']||changedQuestion['vitals']['vitals_q_21']){
		$('#vitalsTextTarget').val('Height : '+changedQuestion['vitals']['vitals_q_2']+'cms. ,Weight : '+changedQuestion['vitals']['vitals_q_1'] + ' Kg. , BP : '+changedQuestion['vitals']['vitals_q_8']+' mm/Hg. , Pulse : '+changedQuestion['vitals']['vitals_q_21']);
	}	

	json = JSON.stringify(examinationQuestion);
	$("#jsontextexamination").val(json);
	
}

function getPastMedicines(){
    $.ajax({
	url: "/ayushman/newcemrdashboard/getPastMedicines/get?appid="+appointmentid,
	success: function(jsonPastMedicines) {
	    if(jsonPastMedicines == 'no past data'){
		alert('No Past Data')
	    }
	    else{
			fragments = JSON.parse(jsonPastMedicines);
			setMedicineText(fragments);
	    }
	},
	error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
    });
}

function getPastTests(){
    $.ajax({
	url: "/ayushman/newcemrdashboard/getPastTests/get?appid="+appointmentid,
	success: function(jsonPastTests) {
		fragments = JSON.parse(jsonPastTests);
		investigationFragments = fragments;
		setInvestigationText(fragments);
	},
	error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
    });
}

function loadTests(pastTests){
    for(var i=0;i<pastTests.length;i++){
	var testElements = $('#testcontent').children();
	var currElement = testElements[testElements.length - 1];
	var inputElements = currElement.getElementsByTagName("input");
	for(var j=0; j<8; j++){
  	    $(inputElements[j]).val(pastTests[i][j]).removeClass('watermark').addClass("listboxcomponenttext");;
	}
  	var imgElement = currElement.getElementsByTagName("img");
	$('#testcontent').trigger('mouseup');
	if(i < (pastTests.length -1))
  	    $(imgElement[1]).trigger('click');
    }
}

function loadDiagnosis(pastDiagnosis){
    for(var i=0;i<pastDiagnosis.length;i++){
		var diagnosisElements = $('#listboxdiagnosislowerdiv').children();
		var currElement = diagnosisElements[diagnosisElements.length - 1];
		var inputElements = currElement.getElementsByTagName("input");
		for(var j=0; j<4; j++){
			$(inputElements[j]).val(pastDiagnosis[i][j]).removeClass('watermark').addClass("listboxcomponenttext");;
		}
		var imgElement = currElement.getElementsByTagName("img");
		$('#divdiagnosis').trigger('mouseup');
		if(i < (pastDiagnosis.length -1))
			$(imgElement).trigger('click');
    }
}

function getDrugInfo(helpImgElement){
	
    var drug = helpImgElement.value;
	drug = drug.replace('+', '--');
    $.ajax({
	url: "/ayushman/newcemrdashboard/getDrugInfo/get?drug="+encodeURI(drug),
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

function setDiagnosis(){
    var data = eval('('+getselecteditemsinjson('divdiagnosis',2)+')');
    var target_display = $('#diagnosis_target').find(".summary_text");
    $('#diagnosis_text').val('');
    $(target_display).text("");
    for(var i=0; i<data.length; i= i + 2){
	var temp = $('#diagnosis_text').val();
	temp = temp + data[i][0] + '. ' + data[i+1][0]+'. ';
	$('#diagnosis_text').val(temp);
	$(target_display).text(temp);
    }
    $('#diagnosis_target').show();
}

function setTests(){
   /* var data = eval('('+getselecteditemsinjson('testcontent',4)+')');
    var target_display = $("#investigation_target").find(".summary_text");
    $(target_display).text("");
    $('#investigation_text').val('');
    for(var i=0; i<data.length; i=i+4){
	if(i == 0){
	    var temp = $('#investigation_text').val();
	    temp = temp + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0];
	    $('#investigation_text').val(temp);
	    $(target_display).text(temp);
	}
	else{
	    var temp = $('#investigation_text').val();
	    temp = temp + '\n' + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0];
	    $('#investigation_text').val(temp);
	    $(target_display).text(temp);
	}
    }
    $('#investigation_target').show();*/
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

function setMedicines(){
   /* var data = eval('('+getselecteditemsinjson('medicinecontent',7)+')');
    var target_display = $("#prescription_target").find(".summary_text");
    $('#prescription_text').val('');
    for(var i=0; i<data.length; i= i + 7){
	if(i==0){
	    $('#prescription_text').val($('#prescription_text').val() + data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]+ ' - ' + data[i+4][0]+ ' - ' + data[i+5][0]+ ' - ' + data[i+6][0]);
	}
	else{
	    $('#prescription_text').val($('#prescription_text').val() + '\n'+ data[i][0] + ' - ' + data[i+1][0]+ ' - ' + data[i+2][0]+ ' - ' + data[i+3][0]+ ' - ' + data[i+4][0]+ ' - ' + data[i+5][0]+ ' - ' + data[i+6][0]);
	}
    }
    $(target_display).text($("#prescription_text").val());
    $('#prescription_target').show();*/
}

function createNewTest(){
   /* testDivId="test"+Math.floor(Math.random()*999999);
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
    nameBox.width("35%");
    sampleBox.width("15%");
    pathologistBox.width("25%");
    $("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;width: 15px;' title='More Info' onclick='getTestInfo(this);'/>").appendTo(testDiv);
    var str = "createNewTest();changeIcon(this);";
    $("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;height: 15px;width: 15px;' title='Add More Test' onclick='"+str+"'/>").appendTo(testDiv);
	*/
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

var dosageLocal = {};
function createNewMedicine(dosageSource){
   /* if(!dosageSource){
	dosageSource = dosageLocal;
    }
    else{
	dosageLocal = dosageSource;
    }
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
    nameBox.width("28%");
    strengthBox.width("9%");
    dosageBox.width("7%");
    frequencyBox.width("10%");
    durationBox.width("8%");
    instructionBox.width("17%");
    $("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;width: 15px;' title='More Info' onclick='getDrugInfo(this);'/>").appendTo(medicineDiv);
    var str = "createNewMedicine();changeIcon(this);";
    $("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;height: 15px;width: 15px;' title='Add More Medicines' onclick='"+str+"'/>").appendTo(medicineDiv);
	*/
}

function getTestInfo(helpImgElement){
    $.ajax({
	url: "/ayushman/newcemrdashboard/getTestInfo/get?testName="+helpImgElement,
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
