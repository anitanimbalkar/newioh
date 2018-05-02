/**
 * Created by chetan on 18/11/13.
 */

window.angular.module('ngff.controllers.examctrl', [])
    .controller('examCtrl',
		['$scope','examReqApi', 'dosageApi','$routeParams','appointmentService','appointmentInfoApi','emrService','medicalProfileApi','notesApi','riskApi','$location','examinationService','formApi','trackerService','trackerApi',
		 function($scope,examReqApi,dosageApi,$routeParams,appointmentService,appointmentInfoApi, emrService,medicalProfileApi, notesApi, riskApi, $location, examinationService, formApi,trackerService,trackerApi) {
		     var appointmentid = $routeParams.appointment_id;
		     var new_risk = {text: ''};
		     var prepareHeaders = function(data){
			 var cols = data[0];
			 var headers = Array();
			 var col_count = 0;
			 for(var i in cols){
			     var col_header = {};
			     col_header['field'] = i;
			     col_header['displayName'] = cols[i];
			     col_header['width'] = "100px";
			     headers.push(col_header);
			     col_count++;
			 }
			 return headers;
		     };
		     var prepare_tile_grid = function(){
			 if($scope.tracker_info['current_tracker_id'] == null)
			     return;
			 $scope.current_tracker_data = $scope.tracker_info['current_tracker_data'];
			 var headers = prepareHeaders($scope["current_tracker_data"]);
			 $scope.headers = headers; 
			 $scope.currentGrid = {
			     data: "current_tracker_data",
			     enableCellSelection: true,
			     headerRowHeight: 0,
			     columnDefs: "headers"
			 };
		     };
		     var get_all_data = function(){
			 var patient_id = $scope.appointment_info.refappfromid_c;
			 $scope.emr_snapshot = emrService.getMedicalProfile(patient_id);
			 if(!$scope.emr_snapshot){
			     medicalProfileApi
				 .get({patient_id: patient_id},
				      function(data){
					  emrService.setMedicalProfile(patient_id,data);
					  $scope.emr_snapshot = emrService.getMedicalProfile(patient_id);
				      });
			 }
			 $scope.doctor_notes = emrService.getNotes(patient_id);
			 if(!$scope.doctor_notes){
			     notesApi
				 .get({patient_id: patient_id, doctor_id: $scope.appointment_info.doctorid},
				      function(data){
					  emrService.setNotes(patient_id, data);
					  $scope.doctor_notes = emrService.getNotes(patient_id);
				      });
			 }
			 $scope.risks = emrService.getRisk(patient_id);
			 if(!$scope.risks){
			     riskApi
				 .get({patient_id: patient_id, appointment_id:appointmentid},
				      function(data){
					  emrService.setRisk(patient_id, data)
					  $scope.risks = emrService.getRisk(patient_id);
				      });   
			 }
			 $scope.tracker_info = trackerService.getTrackerInfo(appointmentid);
			 if(!$scope.tracker_info){
			     trackerApi
				 .get({'app_id':appointmentid},
				      function(data){
					  trackerService.setTrackerInfo(appointmentid, data.tracker_info);
					  $scope.tracker_info = trackerService.getTrackerInfo(appointmentid);
					  prepare_tile_grid();
				      });
			 }
			 else{
			     prepare_tile_grid();
			 }
		     };
		     $scope.new_risk = new_risk;
		     $scope.appointment_info = appointmentService.getAppointmentData(appointmentid);
		     if(!$scope.appointment_info){
			 appointmentInfoApi
			     .get({appid: appointmentid},
				  function(data){
				      appointmentService.setAppointmentData(appointmentid, data);
				      $scope.appointment_info = appointmentService.getAppointmentData(appointmentid);
				      get_all_data();
				  });
		     }
		     else{
			 get_all_data();
		     }
		     $scope.examination_data = examinationService.getExaminationData(appointmentid);
		     $scope.save_notes = emrService.saveNotes;
		     $scope.delete_risk = emrService.deleteRisk;
		     $scope.edit_risk = emrService.editRisk;
		     $scope.add_risk = function(){
			 if(new_risk.text != '')
			     emrService.addRisk($scope.appointment_info.refappfromid_c ,new_risk.text);
			 new_risk.text = '';
		     };
		     $scope.selected = 'main complaint';
		     $scope.isForm = 0;
		     $scope.visible = ""

		     $scope.is_visible = function (name){
			 if(name == $scope.visible)
			     return true;
			 return false;
		     }

		     var is_selected = function(link_name){
			 if(link_name == $scope.selected){
			     return 'active';
			 }
		     };
		     var jsondiagnosis = [{id: "listboxdiagnosis",
					   dataitem:{
					       0:{textbox:"",	autocomplete:'true',watermarktext:'Diagnosis',query:'select id as id, diseasename_c as value from diseasemasters where diseasename_c'},
					       1:{textbox:"",	autocomplete:'true',watermarktext:'Diagnosis',query:'select id as id, diseasename_c as value from diseasemasters where diseasename_c'}
					   },
					   targetid: "divdiagnosis",
					   boxes:2,
					   label: ""}];
		     createlistbox(jsondiagnosis);
		     if($scope.examination_data['diagnosis'] != undefined){
			 loadDiagnosis($scope.examination_data['diagnosis']);
		     }
		     $scope.is_selected = is_selected;
		     $scope.menu = examinationService.getMenu(appointmentid);
		     if(!$scope.menu){
			 console.log('getting menu from server');
			 examReqApi.get({},
					function(data){
					    examinationService.setMenu(data, appointmentid);
					    $scope.menu = examinationService.getMenu(appointmentid);
					});
		     }
		     $scope.restore_questions = function(){
			 console.log('run');
			 if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
			     var changedQuestions = $scope.examination_data['changedQuestions'];
			     for(var i in changedQuestions){
				 var formName = i;
				 var formData = $scope.examination_data['forms'][i];
				 var form = new formmodule();
				 form.showForm(formName, formData.isSubForm, formData.formTarget, formData.formTextTarget, formData.data);
				 for(var j in changedQuestions[i]){
				     var answerElement = $('#'+j).find('.formtextarea');
				     $(answerElement).val(changedQuestions[i][j]);
				 }
				 $('#'+formName).find('.formContent').trigger('change');
			     }
			 }
		     };
		     $scope.$on('ngRepeatFinished', function(event){
			 $scope.restore_questions();
		     });
		     createNewTest();
		     if($scope.examination_data['tests'] != undefined){
			 loadTests($scope.examination_data['tests']);
		     }
		     dosageApi.get({},
				   function(data){
				       createNewMedicine(data.dosage);
				       if($scope.examination_data['medicines'] != undefined){
					   loadMedicines($scope.examination_data['medicines']);
				       }
				   });

		     $scope.showForm = function(formName,formType, isSubForm, formTarget, formTextTarget){
			 $scope.selected = formName;
			 $scope.isForm = 1;
			 $('#form_place_holder').children().hide();
			 if($('#'+formName).length != 0){
			     $('#'+formName).show(500);
			 }
			 else{
			     formApi
				 .get({formid: formName, formType: formType},
				      function(data){
					  if(data['type'] == 'error')
					      alert(date['value']);
					  else{
					      var form = new formmodule();
					      $scope.examination_data['forms'][formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
					      form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value']);
					  }
				      });
			 }
		     }

		     function viewSummary(){
			 var location="";
			 prepareEmrForm();
			 $.ajax({
			     type: "post",
			     url: "/ayushman/newcemrdashboard/viewSummary",
			     data: $("#emrform").serialize(),
			     success:function( data ){
				 if(data != 'error'){
				     location = data;
				     //if(relativeStatus == "Connected"){
				     //parent.parent.sendmsgfromtemplate('GET DATA',connectedRelativeId);
				     //}
				     var win=window.open('/ayushman/'+location, '_blank');
				     win.focus();
				 }
				 else
				     alert('Please Try Again');
			     },
			     error:function(){
				 showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
			     }
			 });
		     }

		     $scope.viewSummary = viewSummary;

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
		     $('#searchbox').autocomplete({
			 select: function(event, ui) {
			     getSearchResults(ui.item.value);
			 },
			 minlength: 1,
			 disable: false,
			 source: "/ayushman/cautocompletedata/retrieve?query=select DISTINCT drugGenericName_c as value from drugmasters where active_c=1 and drugGenericName_c"
		     });
		     $(".ui-dialog-titlebar").hide();
		     $scope.confirm_endconsultation = function(){
			 consultationMode = ($scope.appointment_info.mode).toLowerCase();
			 payment_mode = ($scope.appointment_info.paid_c);
			 if(consultationMode == 'online'){
			     if(sentDataFlag == false){
				 alert("Please Click on 'SEND DATA' before ending consultation");
			     }
			     else{
				 showMessage('300','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
			     }	
			 }
			 else{
			     showMessage('250','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
			 }
		     };
		     AssnHeightExam();
		     $scope.$on('$locationChangeStart', function (event, newUrl, oldUrl) {
			 var data = eval('('+getselecteditemsinjson('medicinecontent',7)+')');
			 var medicineIds = new Array(); 
			 for(var i=0; i<(data.length); i=i+7){
			     var temp = data.slice(i, i+7);
			     var temp_array = temp.join();
			     temp_array = temp_array.split(',');
			     medicineIds.push(temp_array);
			 }
			 $scope.examination_data['medicines'] = medicineIds;
			 data = eval('('+getselecteditemsinjson('testcontent',4)+')');
			 var testIds = new Array();
			 for(var i=0; i< data.length; i=i+4){
			     var temp = data.slice(i, i+4);
			     var temp_array = temp.join();
			     temp_array = temp_array.split(',');
			     testIds.push(temp_array);
			 }
			 $scope.examination_data['tests'] = testIds;
			 data = eval('('+getselecteditemsinjson('divdiagnosis',2)+')');
			 var diagnosisIds = new Array();
			 for(var i=0; i< data.length; i=i+2){
			     var temp = data.slice(i, i+2);
			     var temp_array = temp.join();
			     temp_array = temp_array.split(',');
			     diagnosisIds.push(temp_array);
			 }
			 $scope.examination_data['diagnosis'] = diagnosisIds;
			 $scope.examination_data['changedQuestions'] = changedQuestion;
		     });
		 }])
    .directive('onFinishRender', function ($timeout) {
	return {
            restrict: 'A',
            link: function (scope, element, attr) {
		if (scope.$last) {
                    $timeout(function () {
			scope.$emit('ngRepeatFinished');
                    });
		}
            }
	}
    });
var consultationMode;
var payment_status;
var Confirmation_Event = function(id,confirmation){
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
};
function endConsultationWithoutTransfer(){
    generateBill();
    prepareEmrForm();
    $.ajax({
	type: "post",
	url: "/ayushman/newcemrdashboard/endConsultationWithoutTransfer",
	data: $("#emrform").serialize(),
	success:function( data ){
	    if(data != 'error'){
		window.open("/ayushman/"+data);
		window.location="/ayushman/cdashboard/view";
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
	url: "/ayushman/newcemrdashboard/endConsultationWithTransfer",
	data: $("#emrform").serialize(),
	success:function( data ){
	    if(data != 'error'){
		window.open("/ayushman/"+data);
		window.location="/ayushman/cdashboard/view";
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
function transaction(){
    if(payment_mode == 1){
	str = 'The session has ended gracefully. A Visit Summary has been put in patient`s EMR at this time.Please click appropriate Checkbox for completing the accounting.<br/><br/><form><input type="radio" id="todoctor" name="closure" selected="true" value="graceful" checked="checked"/>Please credit my account with my consultation Charges.<br /><input type="radio" id="topatient" name="closure" value="forceful" />I authorise IndiaOnlineHealth to waive my Consultation Charges for this consultation and credit the same to patient`s account.<br/></form>'
	showMessage('600','150','End Consultation',str,'choose','fundTransfer');
    }
    else{
	alert("Please Collect Fees From Patient");
	endConsultationWithoutTransfer();
    }
}
function generateBill(){
    window.open(window.location.protocol+"//"+window.location.hostname+":"+window.location.port+'/ayushman/cbill/generate?id='+appointmentid+'&edit=true','Bill','width=610px,height=760px,toolbar=no,location=center,directories=no,status=yes,menubar=no,scrollbars=no,copyhistory=no, resizable=yes');
}
function getSearchResults(query){
    $("#searchguide").hide();
    $("#searchresult").empty();
    if(query == ""){
	$("<td class='bodytext_bold' colspan='6' align='middle'>Please enter a search query</td>").appendTo($("#searchresult"));
	$("#searchresult").show();
    }
    else{
	$.ajax({
	    url: "/ayushman/newcemrdashboard/getSearchResults/get?query="+encodeURIComponent(query),
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

function prepareEmrForm(){
    var testIds = getselecteditemsinjson('testcontent',4);
    var medicineIds = getselecteditemsinjson('medicinecontent',7);
    var allSymptoms = $('#symptomatic_text_container').children();
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
    }
    $('#test_ids').attr('value',testIds);
    $('#medicine_ids').attr('value',medicineIds);
    $('#symptomatic_text_target').attr('value',symptomaticTextValue);
    $('#examinations_text_target').attr('value',examinationsTextValue);
    $('#text_diagnosis_note').val($('#diagnosis_text').val());
}

function getPastMedicines(){
    $.ajax({
	url: "/ayushman/newcemrdashboard/getPastMedicines/get?appid="+appointmentid,
	success: function(jsonPastMedicines) {
	    if(jsonPastMedicines == 'no past data'){
		alert('No Past Data')
	    }
	    else{
		pastMedicines = eval("("+jsonPastMedicines+")");
		loadMedicines(pastMedicines);
	    }
	},
	error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
    });
}

function loadMedicines(pastMedicines){
    for(var i=0;i<pastMedicines.length;i++){
	var medicineElements = $('#medicinecontent').children();
	var currElement = medicineElements[medicineElements.length - 1];
	var inputElements = currElement.getElementsByTagName("input");
	for(var j=0; j<14; j++){
	    $(inputElements[j]).val(pastMedicines[i][j]).removeClass('watermark').addClass("listboxcomponenttext");
	}
	var imgElement = currElement.getElementsByTagName("img");
	if(i< (pastMedicines.length -1))
	    $(imgElement[1]).trigger('click');
	$("#medicinecontent").trigger('mouseup');
    }
}

function getPastTests(){
    $.ajax({
	url: "/ayushman/newcemrdashboard/getPastTests/get?appid="+appointmentid,
	success: function(jsonPastTests) {
	    if(jsonPastTests == 'no past data'){
		alert('No Past Data');
	    }
	    else{
		pastTests = eval("("+jsonPastTests+")");
		loadTests(pastTests);
	    }
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
    var medDiv = $(helpImgElement).parent();
    var drugType = medDiv.find('[id^="iddrugtype"]').val();
    var drugName = medDiv.find('[id^="drugname"]').val();
    var drugStrength = medDiv.find('[id^="drugstrength"]').val();
    $.ajax({
	url: "/ayushman/newcemrdashboard/getDrugInfo/get?drugType="+drugType+"&drugName="+drugName+"&drugStrength="+drugStrength,
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
    var data = eval('('+getselecteditemsinjson('testcontent',4)+')');
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
    $('#investigation_target').show();
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
    var data = eval('('+getselecteditemsinjson('medicinecontent',7)+')');
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
    $('#prescription_target').show();
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
    nameBox.width("35%");
    sampleBox.width("15%");
    pathologistBox.width("25%");
    $("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;width: 15px;' title='More Info' onclick='getTestInfo(this);'/>").appendTo(testDiv);
    var str = "createNewTest();changeIcon(this);";
    $("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;height: 15px;width: 15px;' title='Add More Test' onclick='"+str+"'/>").appendTo(testDiv);
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
    if(!dosageSource){
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
	url: "/ayushman/newcemrdashboard/getTestInfo/get?testName="+testName+"&testSample="+testSample,
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
