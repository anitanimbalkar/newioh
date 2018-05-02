angular.module('app.controllers')
.controller('emrCtrl',
['$scope','$http', 'appointmentService','emrService', '$routeParams','createDialog','formApi','examinationService',
function($scope,$http,appointmentService, emrService, $routeParams, createDialogService, formApi,examinationService,reportDetailsApi) {
	$('.ui-multiselect-menu').hide();
	var patient_id = $routeParams.patient_id;
	patientid = patient_id;
	$scope.pid = patientid;
	emrService.getRisk(patient_id,'')
	.then(function(data){
		
		$scope.risks = data;
		$scope.riskText = emrService.getRiskText(patient_id);
	});
	
	var doctor_id = '';
	
	$scope.doctor_historynotes = '';
	$scope.openHistoryNotes = function(){
		$scope.openDialog('/ayushman/'+$scope.doctor_historynotes, 900, 1000);
	}
	$scope.openTracker = function(){
		window.location = '#/patienttracker/'+$scope.pid;
	}
	$scope.deleteHistoryNotes = function(){
		if(confirm("File will be deleted permanently.")){
			emrService.deleteHistoryNotes(patientid).then(function(data){
					$scope.getAllNotes();
			});
		}
	}
	$.post("/ayushman/cconsultation/getpatientinfo", {data:patient_id}, 
		function(data){     
			$scope.patientinfo =  jQuery.parseJSON(data);
			console.log($scope.patientinfo);
		}
	);
	appointmentService.getMyprofile()
		.then(function(data){
			$scope.myprofile = data;
	console.log($scope.myprofile);
	});
	appointmentService.getMyclinics()
		.then(function(data){
			$scope.myclinics = data;
	console.log($scope.myclinics);
	});
		
	$scope.uploadHistoryNotes = function(){
		if(confirm("Attachement is already present. Uploading new attachment will replace previously attached file.")){
			$scope.launchNotesUpload();
		}
	}
		var show_medical_certificate = function(){
				createDialogService('/ayushman/assets/app/partials/printmedicertificate.html', {
					id: 'print',
					backdrop: true,
					controller: 'emrCtrl',
					css:{padding: '18px',width:'640px'},
					cancel:{label: 'Cancel', fn: function() {
												//alert('cancelled');
						}
					},
					success: {label: 'Success', fn: function() {
							//alert('success');
						}}
				});					
	};
		$scope.show_medical_certificate = show_medical_certificate;

		var show_fitness_certificate = function(){
				createDialogService('/ayushman/assets/app/partials/printfitcertificate.html', {
					id: 'print',
					backdrop: true,
					controller: 'emrCtrl',
					css:{padding: '18px',width:'640px'},
					cancel:{label: 'Cancel', fn: function() {
												//alert('cancelled');
						}
					},
					success: {label: 'Success', fn: function() {
							//alert('success');
						}}
				});					
	};
		$scope.show_fitness_certificate = show_fitness_certificate;

	$scope.openDialog = function(url, width, height,obj){
		  $.fancybox({
			'width': width,
			'height': height,
			'autoScale': false,
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'type': 'iframe',
			'href': url,
			'showCloseButton': true,
			 'iframe': {
				preload : false
			},
			'afterClose' : function(){
				if(obj != undefined){
					if(obj.fancyboxclosed != undefined){
						obj.fancyboxclosed(obj);
					}
				}
			}
		});
	 }
	 $scope.receivedvalues = false;
	 $scope.getAllNotes = function(){
		emrService.getNotes(patient_id, doctor_id)
			.then(function(data){
				$scope.doctor_notes = data;
				
		});
		emrService.getHistoryNotes(patient_id, doctor_id)
			.then(function(data){
				$scope.doctor_historynotes = data;
				$scope.receivedvalues = true;
		});
	 }
	$scope.getAllNotes();
	$scope.launchNotesUpload = function() {
		createDialogService('/ayushman/assets/app/partials/uploadnotes.html', {
		  id: 'complexDialog',
		  backdrop: true,
		  controller: 'historynotesCtrl',
		  css:{padding: '18px',width:'900'},
		  cancel:{label: 'Cancel', fn: function() {
					
				}
			},
		  success: {label: 'Success', fn: function() {
				$scope.getAllNotes();
		  }}
		},{patientid:patientid});
	};
	$scope.save_notes = emrService.saveNotes;
	
	$scope.data = {};
	var allergy=$scope.allergy={};
	var immunize=$scope.immunize={};
	var pastd=$scope.pastd={};
	
	$scope.data['allergies'] = {};
	$scope.data['socialhabits'] = {};
	$scope.showForm = function(formName,formType, isSubForm, formTarget, formTextTarget,displaytarget){
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
				alert(data['value']);
				else{
					var form = new formmodule();
					$scope.data[formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
					form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value'],displaytarget);
					$scope.restore_questions();
				}
			});
		}
	}
	$scope.refreshrisk = function(){
		emrService.getRisk(patient_id,'')
		.then(function(data){
			
			$scope.risks = data;
			$scope.riskText = emrService.getRiskText(patient_id);
		});
	}
	$scope.refreshpastillness = function(){
		emrService.getMedicalProfile(patient_id)
		.then(function(data){
			$scope.emr_snapshot = data;
			if($scope.emr_snapshot['array_relativeFather']['birthyear']==null)
				$scope.emr_snapshot['array_relativeFather']['birthyear']=new Date().getFullYear();
			if($scope.emr_snapshot['array_relativeMother']['birthyear']==null)
				$scope.emr_snapshot['array_relativeMother']['birthyear']=new Date().getFullYear();
		});
	}
	$scope.changedQuestions = {};
	$scope.restore_questions = function(){
		var changedQuestions = $scope.changedQuestions;

		for(var i in changedQuestions){
			var formName = i;
			var formData = changedQuestions[i];
			for(var j in changedQuestions[i]){
				var answerElement = $('#'+j).find('.formtextarea');
				$(answerElement).val(changedQuestions[i][j]);
				$(answerElement).change();
			}
			$('#'+formName).find('.formContent').trigger('change');
		}
	};
	
	
	
//	emrService.getPastAppointments(patient_id)
//	.then(function(data){
//		$scope.past_appointments = data
//	});
//	emrService.getPastReports(patient_id)
//	.then(function(data){
//		$scope.past_reports = data;
//	});
	
	$scope.keys = function(obj){
		return obj? Object.keys(obj) : [];
	}
	$scope.edit_emr = function (id){
		edit_emr(id);
	}
	
	
	emrService.getMedicalProfile(patient_id)
	.then(function(data){
		$scope.emr_snapshot = data;
		console.log($scope.emr_snapshot);
		$scope.changedQuestions['allergies'] = {};
		if($scope.emr_snapshot['allergies']!=undefined){
			for(var i=0; i<$scope.emr_snapshot['allergies'].length;i++ ){
				var allergyid='allergies_q_'+(i+1);
				var id='allergies_q_'+(i+1)+'_id';
				$scope.changedQuestions['allergies'][allergyid] = $scope.emr_snapshot['allergies'][i][0];
				$scope.changedQuestions['allergies'][id] = $scope.emr_snapshot['allergies'][i][1];
			}
			$scope.allergy['allergies']='';
			for(var i=0;i<$scope.emr_snapshot['allergies'].length;i++){
				if($scope.emr_snapshot['allergies'][i][0] != ""){
					$scope.allergy['allergies']=$scope.allergy['allergies']+$scope.emr_snapshot['allergies'][i][0]+', ';
				}
			}
		}
		$scope.changedQuestions['social_habits'] = {};
		if($scope.emr_snapshot['social_habits']!=undefined){
			$scope.changedQuestions['social_habits']['socialhabits_q_1'] =  $scope.emr_snapshot['social_habits']['diet_c'];
			$scope.changedQuestions['social_habits']['socialhabits_q_2'] =  $scope.emr_snapshot['social_habits']['smoking_c'];
			$scope.changedQuestions['social_habits']['socialhabits_q_3'] =  $scope.emr_snapshot['social_habits']['alcohol_c'];
			$scope.changedQuestions['social_habits']['socialhabits_q_4'] =  $scope.emr_snapshot['social_habits']['tobacco_c'];
			$scope.changedQuestions['social_habits']['socialhabits_q_5'] =  $scope.emr_snapshot['social_habits']['exercisepatterns_c'];
			$scope.changedQuestions['social_habits']['socialhabits_q_6'] =  $scope.emr_snapshot['social_habits']['outdoorsport_c'];
		}
		$scope.changedQuestions['user_info'] = {};
		if($scope.emr_snapshot['user_info']!=undefined){
			$scope.changedQuestions['user_info']['healthinfo_q_1'] =  $scope.emr_snapshot['user_info']['bloodgroup_c'];
				if($scope.emr_snapshot['user_info']['handicap_c']=='true'){
					$scope.changedQuestions['user_info']['healthinfo_q_2'] ='Yes';
					$scope.changedQuestions['user_info']['healthinfo_q_2healthinfo_q_3'] =  $scope.emr_snapshot['user_info']['handicapby_c'];
				}
		}
		$scope.pastd['pastdisease']='';
		if($scope.emr_snapshot['past_diseases_history']!=undefined){
			for(var i=0;i<$scope.emr_snapshot['past_diseases_history'].length;i++){
				if($scope.emr_snapshot['past_diseases_history'][i][2]=='2'){
					$scope.pastd['pastdisease']=$scope.pastd['pastdisease']+$scope.emr_snapshot['past_diseases_history'][i][0]+', ';
				}
			}
			$scope.changedQuestions['past_diseases_history'] = {};
			for(var i=0; i<$scope.emr_snapshot['all_diseases'].length;i++ ){
				var diseaseid='pastdiseases_q_'+(i+1);
				var id='pastdiseases_q_'+(i+1)+'_id';
				var remarkid ='pastdiseases_q_'+(i+1)+'pastdiseases_q_'+(i+21);
				$scope.changedQuestions['past_diseases_history'][diseaseid] = '';
				$scope.changedQuestions['past_diseases_history'][remarkid] = '';
				$scope.changedQuestions['past_diseases_history'][id] = $scope.emr_snapshot['all_diseases'][i][1];
			}
		
			for(var i=0; i<$scope.emr_snapshot['all_diseases'].length;i++ ){
				var diseaseid='pastdiseases_q_'+(i+1);
				var remarkid ='pastdiseases_q_'+(i+1)+'pastdiseases_q_'+(i+21);
				if($scope.emr_snapshot['past_diseases_history'][i][2]=='0'){
				}
				else if($scope.emr_snapshot['past_diseases_history'][i][2]=='1'){
					$scope.changedQuestions['past_diseases_history'][diseaseid] = 'No';
					$scope.changedQuestions['past_diseases_history'][remarkid] =  $scope.emr_snapshot['past_diseases_history'][i]['1'];
				}
				else{
					$scope.changedQuestions['past_diseases_history'][diseaseid] = 'Yes';
					$scope.changedQuestions['past_diseases_history'][remarkid] =  $scope.emr_snapshot['past_diseases_history'][i]['1'];
				}	 
			}	
		}
		$scope.immunize['immunization']='';
		if($scope.emr_snapshot['immunizations_details']!=undefined){
			for(var i=0;i<$scope.emr_snapshot['immunizations_details'].length;i++){
				if($scope.emr_snapshot['immunizations_details'][i][2]=='2'){
					$scope.immunize['immunization']=$scope.immunize['immunization']+$scope.emr_snapshot['immunizations_details'][i][0]+', ';
				}
			}
		
			$scope.changedQuestions['immunizations_details'] = {};
			for(var i=0; i<$scope.emr_snapshot['all_immunizations'].length;i++ ){
				var immunizationid='immunization_q_'+(i+1);
				var id='immunization_q_'+(i+1)+'_id';
				var immunizationdate ='immunization_q_'+(i+1)+'immunization_q_'+(i+51);
				$scope.changedQuestions['immunizations_details'][immunizationid] = '';
				$scope.changedQuestions['immunizations_details'][immunizationdate] = '';
				$scope.changedQuestions['immunizations_details'][id] = $scope.emr_snapshot['all_immunizations'][i][1];
			}
			for(var i=0; i<$scope.emr_snapshot['immunizations_details'].length;i++ ){
				var immunizationid='immunization_q_'+(i+1);
				var immunizationdate ='immunization_q_'+(i+1)+'immunization_q_'+(i+51);
				if($scope.emr_snapshot['immunizations_details'][i][2]=='1'){
					$scope.changedQuestions['immunizations_details'][immunizationid] = 'No';
					$scope.changedQuestions['immunizations_details'][immunizationdate] =  $scope.emr_snapshot['immunizations_details'][i]['1'];
				}
				else if($scope.emr_snapshot['immunizations_details'][i][2]=='0'){}
				else{
				$scope.changedQuestions['immunizations_details'][immunizationid] = 'Yes';
				$scope.changedQuestions['immunizations_details'][immunizationdate] =  $scope.emr_snapshot['immunizations_details'][i]['1'];
				}

			}	
		}
		$scope.changedQuestions['family_history'] = {};
		if($scope.emr_snapshot['family_history']!=undefined){
			for(var j=0;j<$scope.emr_snapshot['family_history'].length;j++){
				for(var i=0; i<$scope.emr_snapshot['all_relations'].length;i++ ){
					var yearofbirthid='familyhistory_q_'+(i+21);
					var knownmedicalhisid ='familyhistory_q_'+(i+41);
					var isaliveid='familyhistory_q_'+(i+61);
					var ageid ='familyhistory_q_'+(i+61)+'familyhistory_q_'+(i+81);
					var causeofdeathid ='familyhistory_q_'+(i+61)+'familyhistory_q_'+(i+101);
					if($scope.emr_snapshot['family_history'][j]['relation'] == $scope.emr_snapshot['all_relations'][i]){
						$scope.changedQuestions['family_history'][yearofbirthid] =  $scope.emr_snapshot['family_history'][j]['yob'];
					$scope.changedQuestions['family_history'][knownmedicalhisid] =  $scope.emr_snapshot['family_history'][j]['medhis'];
					$scope.changedQuestions['family_history'][isaliveid] = 'No';
					$scope.changedQuestions['family_history'][ageid] =  $scope.emr_snapshot['family_history'][j]['yod'];
					$scope.changedQuestions['family_history'][causeofdeathid] =  $scope.emr_snapshot['family_history'][j]['cod'];
					break;
					}
				}								
			}
		}
		$scope.changedQuestions['other_medical_observation'] = {};
		if($scope.emr_snapshot['ques_answer']!=undefined){
				for(var j=0;j<$scope.emr_snapshot['ques_answer'].length;j++){
				var answer='othermedicalobservation_q_'+(j+1);
				var quedid='othermedicalobservation_q_'+(j+1)+'_id';
				$scope.changedQuestions['other_medical_observation'][answer] = $scope.emr_snapshot['ques_answer'][j][1];
				$scope.changedQuestions['other_medical_observation'][quedid] = $scope.emr_snapshot['ques_answer'][j][0];
			}	
		}
		//$("id"+$scope.emr_snapshot['array_relativeFather']['id']+"birthyear").val($scope.emr_snapshot['array_relativeFather']['birthyear']);
		
		var savedetails=function savedetails(notification)
		{	
			var array_fatherdetails = new Array;
			var array_motherdetails = new Array;
			var array_relativesdetails = new Array;
			array_fatherdetails = createInfoArray($scope.emr_snapshot['array_relativeFather']['id']);
			array_motherdetails = createInfoArray($scope.emr_snapshot['array_relativeMother']['id']);
			var array_relative= $scope.emr_snapshot['array_relative'];
			var count;
			var length=array_relative.length;
			for(count=0; count< length;count++ )
			{ 
				var array_relativedetails = new Array;
				array_relativedetails	= createInfoArray(array_relative[count].id);
				array_relativesdetails[count] = array_relativedetails; 
			}
			$('#fatherdetails').val(JSON.stringify(array_fatherdetails));
			$('#motherdetails').val(JSON.stringify(array_motherdetails));
			$('#relativesdetails').val(JSON.stringify(array_relativesdetails));
			if(notification== true)
			{
				$.ajax({
url: '/ayushman/cpatientfamilyhistory/savedetails?array_fatherdetails='+document.getElementById('fatherdetails').value+'&array_motherdetails='+document.getElementById('motherdetails').value+'&array_relativesdetails='+document.getElementById('relativesdetails').value,
type:'POST',
success:  function(data) {
						if(notification== true)
						{
							showNotification('300','20','Save data','Family history saved successfully','notification','timernotification',3000);
						}
						//else
						//{showNotification('300','20','Save data','New relative added successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
					},
					error : function(){alert("error while editing family member details ");}		
				});
			}

			$scope.refreshpastillness();
			//else
			//{showNotification('300','20','Save data','New relative added successfully','notification','timernotification',3000);$('#message').dialog( "option", "position", "center" );}
			if(notification== true){
				addnewrelative();
			}
		}

		$scope.savedetails=savedetails;

		var createInfoArray=function createInfoArray(id)
		{
			var array_relativedetails = new Array;
			array_relativedetails['0'] = id;
			array_relativedetails['1'] = document.getElementsByName("id"+id+"birthyear")[0].value;
			array_relativedetails['2']=  document.getElementById("medicalhistorytxt"+id).value;
			array_relativedetails['3'] = document.getElementById("id"+id+"deathagetxt").value;
			array_relativedetails['4'] = document.getElementById("id"+id+"deathcausetxt").value;
			return array_relativedetails;
		} 
		$scope.createInfoArray=createInfoArray;

		var deleterow=function deleterow(id)
		{
			document.getElementById("deleterelativebutton").onclick = false;
			$.ajax({
url: '/ayushman/cpatientfamilyhistory/deletedetails?id='+id,
type:'POST',
success:  function(data) {
				},
				error : function(){alert("error while editing family member details ");}		
			});

			$scope.refreshpastillness();

		}
		$scope.deleterow=deleterow;


		var highlight=function highlight(radio,flag){
			tr = $(radio).closest('tr');
			if(flag){
				$(tr).css('background-color','#FFFFA5');
			}else{
				$(tr).css('background-color','transparent');
			}
		}
		$scope.highlight=highlight;


		var addnewrelative=function addnewrelative()
		{
			if(document.getElementById("newrelativemedicalhistory").value =='' && document.getElementById("newrelativedeathcause").value==''){
				showNotification('300','20','Family History','Known Medical History should not empty','error','timernotification',3000);		
			}

			document.getElementById("addnewrelativebutton").onclick = false;
			val1= document.getElementById("newrelativemedicalhistory").value;
			val2= document.getElementById("newrelativedeathage").value;
			val3= document.getElementById("newrelativedeathcause").value;
			if(val1 !='' || (val2 !='' && val3 !='')){
				savedetails(false);
				$.ajax({
						url: '/ayushman/cpatientfamilyhistory/addnewrelative?relative='+document.getElementById("newrelative").value+'&birthyear='+document.getElementById("newrelativebirthyear").value+'&medicalhistory='+document.getElementById("newrelativemedicalhistory").value+'&deathage='+document.getElementById("newrelativedeathage").value+'&deathcause='+document.getElementById("newrelativedeathcause").value+'&patientId='+$scope.emr_snapshot['patient_id'],
						success:  function(data) {
						},
					error : function(){alert("error while editing family member details ");}		
				});
			}
			document.getElementById("newrelativemedicalhistory").value='';
			document.getElementById("newrelativedeathage").value='';
			document.getElementById("newrelativedeathcause").value='';
		}
		$scope.addnewrelative=addnewrelative;
	});
	

	
	////////////////////////////Save////////////////////////////////////////////////////////			

	var save_allergies = function(){
		$scope.allergy['allergies']='';
		var flag=0;
		if(changedQuestion['allergies']!=undefined){
			flag=1;
		}
		var flag1=0,flag2=0;
		
		for (var key in changedQuestion['allergies']){
			if(changedQuestion['allergies'][key]!=undefined){
				$scope.allergy['allergies']=$scope.allergy['allergies']+changedQuestion['allergies'][key]+' ';
			}
		}
		flag1=0;
		flag2=0;
		if(flag==1){
			for(var key in $scope.changedQuestions['allergies']){
				if(flag2 % 2==0){
					for(var key2 in changedQuestion['allergies']){
						if(key==key2){
							flag1=1;
							break;
						}
					}
					if(flag1==1){
							$scope.changedQuestions['allergies'][key] = changedQuestion['allergies'][key];
					}
					else{
						$scope.changedQuestions['allergies'][key] = '';
					}
					flag1=0;
				}
				flag2++;
			}
		}
		var str= JSON.stringify($scope.changedQuestions['allergies']);
		emrService.saveAllergies(str,patientid);
		showNotification('300','20','Save data','Patients Allergies Saved','notification','timernotification',3000);
	}
	$scope.save_allergies=save_allergies;
	
	var save_socialHabits = function(){
		var flag=0;
		if(changedQuestion['socialhabits']!=undefined){
			flag=1;
		}
		var flag1=0;
		if(flag==1){
			for (var key in $scope.changedQuestions['social_habits']){
				for (var key2 in changedQuestion['socialhabits']){
					if(key==key2){
						flag1=1;
						break;
					}
				}
				if(flag1==1){				
					if(changedQuestion['socialhabits'][key]==undefined){
						$scope.changedQuestions['social_habits'][key]='';
					}
					else{
						$scope.changedQuestions['social_habits'][key] = changedQuestion['socialhabits'][key];
					}
					flag1=0;
				}
				else{
					$scope.changedQuestions['social_habits'][key] ='';
				}
			}
		}
		var str= JSON.stringify($scope.changedQuestions['social_habits']);
		emrService.saveSocialHabits(str,patientid);
		showNotification('300','20','Save data','Patients Social Habits Saved','notification','timernotification',3000);

	}
	$scope.save_socialHabits=save_socialHabits;
	
	
	
	var save_pastDiseases = function(){
		$scope.pastd['pastdisease']='';
		var flag=0;
		if(changedQuestion['pastdiseases']!=undefined){
			flag=1;
		}
		var flag1=0,flag2=3;
		if(flag==1){
			for(var key in $scope.changedQuestions['past_diseases_history']){
				if(flag2 % 3==0){
					for(var key2 in changedQuestion['pastdiseases']){
						if(key==key2){
							flag1=1;
							break;
						}			
					}	
					if(flag1==1){
						if(changedQuestion['pastdiseases'][key]==undefined){
							$scope.changedQuestions['past_diseases_history'][key] = '';
						}
						else{
							$scope.changedQuestions['past_diseases_history'][key] = changedQuestion['pastdiseases'][key];
						}
						flag1=0;
					}
					else{
						$scope.changedQuestions['past_diseases_history'][key] ='';
					}
				}
				flag2++;	
			}
		}
		flag1=0;
		flag2=2;
		if(flag==1){
			for(var key in $scope.changedQuestions['past_diseases_history']){
				if(flag2 % 3==0){
					for(var key2 in changedQuestion['pastdiseases']){
						if(key==key2){
							flag1=1;
							break;
						}			
					}	
					if(flag1==1){
						if(changedQuestion['pastdiseases'][key]==undefined){
							$scope.changedQuestions['past_diseases_history'][key] = '';
						}
						else{
							$scope.changedQuestions['past_diseases_history'][key] = changedQuestion['pastdiseases'][key];
						}
						flag1=0;
					}
					else{
						$scope.changedQuestions['past_diseases_history'][key] ='';
					}
				}
				flag2++;	
			}
		}

		var str= JSON.stringify($scope.changedQuestions['past_diseases_history']);
		emrService.savePastDiseases(str,patientid)
		.then(function(data){
			$scope.refreshpastillness();
			$scope.pastd['pastdisease'] = data;
		});
		showNotification('300','20','Save data','Patients Past Diseases Saved','notification','timernotification',3000);

	}
	$scope.save_pastDiseases=save_pastDiseases;
	

	
	var save_immunization = function(){
		$scope.immunize['immunization']='';
		var flag=0;
		if(changedQuestion['immunization']!=undefined){
			flag=1;
		}
		var flag1=0,flag2=3;
		if(flag==1){
			for(var key in $scope.changedQuestions['immunizations_details']){
				if(flag2 % 3==0){
					for(var key2 in changedQuestion['immunization']){
						if(key==key2){
							flag1=1;
							break;
						}			
					}	
					if(flag1==1){
						if(changedQuestion['immunization'][key]==undefined){
							$scope.changedQuestions['immunizations_details'][key] = '';
						}
						else{
							$scope.changedQuestions['immunizations_details'][key] = changedQuestion['immunization'][key];
						}
						flag1=0;
					}
					else{
						$scope.changedQuestions['immunizations_details'][key] ='';
					}
				}
				flag2++;	
			}
		}
		flag1=0;
		flag2=2;
		if(flag==1){
			for(var key in $scope.changedQuestions['immunizations_details']){
				if(flag2 % 3==0){
					for(var key2 in changedQuestion['immunization']){
						if(key==key2){
							flag1=1;
							break;
						}			
					}	
					if(flag1==1){
						if(changedQuestion['immunization'][key]==undefined){
							$scope.changedQuestions['immunizations_details'][key] = '';
						}
						else{
							$scope.changedQuestions['immunizations_details'][key] = changedQuestion['immunization'][key];
						}
						flag1=0;
					}
					else{
						$scope.changedQuestions['immunizations_details'][key] ='';
					}
				}
				flag2++;	
			}
		}

		
		var str= JSON.stringify($scope.changedQuestions['immunizations_details']);
		emrService.saveImmunization(str,patientid)
		.then(function(data){
			$scope.immunize['immunization'] = data;
		});
		showNotification('300','20','Save data','Patients Immunization Details Saved','notification','timernotification',3000);

	}
	$scope.save_immunization=save_immunization;



	var save_othermedobserv = function(){
		var flag=0;
		if(changedQuestion['othermedicalobservation']!=undefined){
			flag=1;
		}
		flag1=0;
		flag2=0;		
		if(flag==1){
			for(var key in $scope.changedQuestions['other_medical_observation']){
				if(flag2 % 2==0){
					for(var key2 in changedQuestion['othermedicalobservation']){
						if(key==key2){
							flag1=1;
							break;
						}
					}
					if(flag1==1){
						if(changedQuestion['othermedicalobservation'][key]==undefined){
							$scope.changedQuestions['other_medical_observation'][key] ='';
						}
						else{
							$scope.changedQuestions['other_medical_observation'][key] = changedQuestion['othermedicalobservation'][key];
						}
						flag1=0;
					}
					else{
						$scope.changedQuestions['other_medical_observation'][key] = '';
					}
					
				}
				flag2++;
			}
		}

		var str= JSON.stringify($scope.changedQuestions['other_medical_observation']);
		emrService.saveOthermedobserv(str,patientid);
		showNotification('300','20','Save data','Patients Other Medical Observations Details Saved','notification','timernotification',3000);

	}
	$scope.save_othermedobserv=save_othermedobserv;

	var save_bloodgroupHandicap = function(){
		var flag=0;
		if(changedQuestion['healthinfo']!=undefined){
			flag=1;
		}
		if(flag==1){
				if(changedQuestion['healthinfo']['healthinfo_q_1']==undefined){
					$scope.changedQuestions['user_info']['healthinfo_q_1'] ='';
				}
				else{
					$scope.changedQuestions['user_info']['healthinfo_q_1'] =changedQuestion['healthinfo']['healthinfo_q_1'];
				}
				if(changedQuestion['healthinfo']['healthinfo_q_2']==undefined){
					$scope.changedQuestions['user_info']['healthinfo_q_2'] ='';
				}
				else{
					$scope.changedQuestions['user_info']['healthinfo_q_2'] =changedQuestion['healthinfo']['healthinfo_q_2'];
				}
				if(changedQuestion['healthinfo']['healthinfo_q_2healthinfo_q_3']==undefined){
					$scope.changedQuestions['user_info']['healthinfo_q_2healthinfo_q_3'] ='';
				}
				else{
					$scope.changedQuestions['user_info']['healthinfo_q_2healthinfo_q_3'] =changedQuestion['healthinfo']['healthinfo_q_2healthinfo_q_3'];
				}

		}	
		var str= JSON.stringify($scope.changedQuestions['user_info']);
		emrService.saveHealthinfo(str,patientid);
		showNotification('300','20','Save data','Patients Health Info Saved','notification','timernotification',3000);
	}	
	$scope.save_bloodgroupHandicap=save_bloodgroupHandicap;	
	
	
}])
.controller('PreviousPrescriptionController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService',
function($scope, appointmentService,dosageApi,formApi,emrService,examinationService) {
	
	
	appointmentid = appointment_data.id;
	appointmentService.getDocprofile(appointmentid)
	.then(function(data){
		$scope.myprofile = data;
		
		appointmentService.getMyclinics($scope.myprofile.userinfo.id)
		.then(function(data){
			$scope.myclinics = data;
		});
	});
	
	$scope.calculateAge = calculate_age;
	appointmentService.getAppointmentData(appointmentid)
	.then(function(data){
		$scope.appointment_info = data;
		$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
	});

	$scope.previousexamination_data = {};
	//$scope.previousexamination_data = examinationService.getExaminationData(appointmentid);
	if(appointment_data.maincomplaint != undefined){
		$scope.previousexamination_data.text_complaint = appointment_data.maincomplaint.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.diagnosis != undefined){
		$scope.previousexamination_data.text_diagnosis = appointment_data.diagnosis.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.followup != undefined){
		$scope.previousexamination_data.text_followup = appointment_data.followup.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.medicine != undefined){
		$scope.previousexamination_data.medicine = appointment_data.medicine.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.investigation != undefined){
		$scope.previousexamination_data.investigations = appointment_data.investigation.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.examinationsummary != undefined){
		$scope.previousexamination_data.text_examinationsummary = appointment_data.examinationsummary.replace(/<br\s*\/?>/mg,"\n\r").replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/g, "");
	}
	if(appointment_data.date != undefined){
		$scope.previousexamination_data.date = appointment_data.date;
	}
	if(appointment_data.examination != undefined){
		$scope.previousexamination_data.isexaminationavailable = false;
		if(appointment_data.examination.vitals != undefined && appointment_data.examination.vitals.vitals_q_1 != undefined){
			$scope.previousexamination_data.vitals_q_1 = appointment_data.examination.vitals.vitals_q_1.a;
			$scope.previousexamination_data.isexaminationavailable = true;
		}
		if(appointment_data.examination.vitals != undefined && appointment_data.examination.vitals.vitals_q_2 != undefined){
			$scope.previousexamination_data.vitals_q_2 = appointment_data.examination.vitals.vitals_q_2.a;
			$scope.previousexamination_data.isexaminationavailable = true;
		}
		if(appointment_data.examination.vitals != undefined && appointment_data.examination.vitals.vitals_q_8 != undefined){
			$scope.previousexamination_data.vitals_q_8 = appointment_data.examination.vitals.vitals_q_8.a;
			$scope.previousexamination_data.isexaminationavailable = true;
		}
		if(appointment_data.examination.vitals != undefined && appointment_data.examination.vitals.vitals_q_21 != undefined){
			$scope.previousexamination_data.vitals_q_21 = appointment_data.examination.vitals.vitals_q_21.a;
			$scope.previousexamination_data.isexaminationavailable = true;
		}
	}
	
	
}
])
.directive('riskFactor',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/riskfactor.html'
	};
}).directive('myReports', function() {
	return {
templateUrl: '/ayushman/assets/app/partials/pastreports.html'
	};
})
.directive('myCertificates',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/mycertificates.html'
	};
});

