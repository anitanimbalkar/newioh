angular.module('app.controllers') 
.controller('doctordashboardconsultationCtrl',
['$scope','$http','personalizationService','emrService','$routeParams','createDialog','formApi','examReqApi','dashboardService','appointmentService','examinationService',
function($scope,$http,personalizationService,emrService, $routeParams, createDialogService, formApi,examReqApi,dashboardService, appointmentService,examinationService) {
						
						$scope.data = {};
						$scope.examination_data = {};
						var appointmentid = $routeParams.appid;
						//$scope.appointment_info= new Array();
						$scope.allergy={};
						var immunize=$scope.immunize={};
						var pastd=$scope.pastd={};
						$scope.network = new Array();
						$scope.riskText = {};
						var patient_id = $routeParams.patient_id;
						
						$scope.patida = patient_id;
						var	patientid = patient_id;
						var	patientId = patient_id;
						var	doctorId = $routeParams.drid;
						$scope.prescriptiontemplates = {};
						$scope.morerisk = {};
						$scope.allergyhistorys = {};
						$scope.printbillbtn = 0;
		//var patient_id = $routeParams.patient_id;		
		
		
		
		
		//get log in patient
				 appointmentService.getLoginuser(user_id)
						.then(function(data){
							$scope.userrole = data.userrole;
					});	
					
					
				  appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					//console.log("*Appointment6",data);
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=$scope.appointment_info.amount;
					$scope.appointment_info.statusprescription = data.Appointmentstatus;
					//if($scope.examination_data.display_savebutton){
					$scope.billdate=$scope.appointment_info.DateAndTime;
					
					name = 'quick';
					name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
					var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
					results = regex.exec(location.search);
					result = results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
					if(result == 1){
						$scope.launchComplexModal();
					}
					if($scope.appointment_info.appointment_id != null){
						document.cookie = 'appid='+$scope.appointment_info.appointment_id+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
						$scope.get_all_data();
						$scope.displayimmunizationicon();
					}
			 });
			 
			  /* loading all the data */
		     $scope.get_all_data = function(){
					patient_id = $scope.appointment_info.refappfromid_c;
					$.post("/ayushman/cconsultation/getpatientinfo", {data:patient_id}, 
						function(data){     
							$scope.patientinfo =  jQuery.parseJSON(data);
						}
					);
					$scope.getAllNotes();
					
					
					emrService.getMedicalProfile(patient_id)
						.then(function(data){
							$scope.emr_snapshot = data
					});
					emrService.getNotes(patient_id, doctorId)
						.then(function(data){
							$scope.doctor_notes = data
					});
					emrService.getRisk(patient_id, appointmentid)
						.then(function(data){
							$scope.risks = data
					});
					/*patienttrackerService.getTrackerInfo(patient_id)
						.then(function(data){
							$scope.tracker_info = data;
							prepare_tile_grid();
					});*/
					emrService.getPastData(appointmentid)
						.then(function(data){
							$scope.pastAppData = data;
					});
		     };
 
					
		/*// get Patient data
					$scope.calculateAge = calculate_age;
					appointmentService.getAppointmentData(appointmentid).then(function(data){
					$scope.appointment_info = data;
					
					
					
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=$scope.appointment_info.amount;
					$scope.appointment_info.statusprescription = data.Appointmentstatus;
					//if($scope.examination_data.display_savebutton){
					$scope.billdate=$scope.appointment_info.DateAndTime;
					//}
				//		 var patient_id = $scope.appointment_info.Patientid;
			// console.log(patient_id);
					//$scope.billdetail.patrelative=$scope.appointment_info.Patientname;
					$scope.displayimmunizationicon();
			 }); 
			 */
			 		 		 
			 
	//get pastdata for bill	
				/*	  appointmentService.getPastAppointmentdata(user_id)
						.then(function(data){
							$scope.pastappointments = data.apps;
							$scope.patcount = data.appscount['count'];
								for(i = 0; i < $scope.patcount ;i++){
									if( $scope.pastappointments[i].appointment_id == appointmentid){
										$scope.patappid = $scope.pastappointments[i].appointment_id;
										$scope.patdia 	= $scope.pastappointments[i].diagnosis;
										$scope.patinfo	= $scope.pastappointments[i];
									}
								}
							$scope.gotvisits = true;
					});
						*/
			 
	//get examination summary		 
			 
						emrService.getExaminationsummary(appointmentid).then(function(data){	
						$scope.examsummary = data.summary;
						 
						});
						
		//All upcoming appointment
						appointmentService.getAppointments(user_id).then(function(data){	
						$scope.appointments = data;
						
						$scope.appointmen = $scope.appointments['apps'];
						$scope.count = $scope.appointments['apps'].length;
						if($scope.appointments['apps'].length){
							$scope.appointments['page'] = [];
							for(i=0;i<$scope.appointments['apps'].length && i < 5;i++){
								$scope.appointments['page'][i] = $scope.appointments['apps'][i];
							}
						}
				$scope.gotvisits = true;
			});
			//immunization date 
					$scope.displayimmunizationicon=function(){
						var d1 = new Date($scope.appointment_info.DOB);
						var d2 = new Date();
						var ms = d2-d1;
						var years = (((ms/1000)/3600)/24)/365;
						if (years < 14) {
								$scope.showimmu=true;
							} else {
								$scope.showimmu=false;
							}
				};
			 
		//All History  forms 		
						personalizationService.historyforms().then(function(data){
						$scope.forms = data;						
						$scope.spe = $scope.forms.examinationforms;
						
						//$scope.launchPrintablePrescription();
					    	
					});
				
		//Examination all forms
						personalizationService.examforms().then(function(data){
						$scope.forms = data;	
						$scope.exams = $scope.forms.examform;
					 
					});
				
		//get all risk of patient
			
						emrService.getRisk(patient_id,'').then(function(data){		
						$scope.risks = data;
						$scope.riskText = emrService.getRiskText(patient_id);
						//var riskLength = $scope.risks.length;
						//console.log(riskLength);
						//$scope.morerisk=[];
						//for(i = 0;i < $scope.risks.length && i < 5;i++){
						//	$scope.morerisk[i] = $scope.risks[i].risk_text;
						//}
						//console.log($scope.morerisk);
					});
		//Examination summary data		
				
		$scope.refreshrisk = function(){
			emrService.getRisk(patient_id,'')
				.then(function(data){
					$scope.risks = data;
			$scope.riskText = emrService.getRiskText(patient_id);
		});
	}
		
		//display more risks		
					var show_more_risks = function(){
						var riskLength = $scope.morerisk['page'].length;
						//$scope.morerisk['page']=[];
						for(i = riskLength;i < ($scope.risks.length) && i < (riskLength + 5);i++){
							$scope.morerisk['page'][i] = $scope.risks[i].risk_text;
							
						}
					};
					$scope.showMorerisks = show_more_risks;
		//display less risks			
					var show_less_risks = function(){
						$scope.morerisk['page'] =[];
						var riskLength = $scope.morerisk['page'].length;
						for(i = 0;i < ($scope.risks.length) && i < 5;i++){
							$scope.morerisk['page'][i] = $scope.risks[i].risk_text;
						}
					};
					$scope.showLessrisks = show_less_risks;
			
		//get patient notes				
						emrService.getNotes(patientId, doctorId)
						.then(function(data){					
						$scope.doctor_notes = data;
					});
		//get all past patient data			
				/*emrService.getPastAllPatientData()
					.then(function(data){
						$scope.pastAllData = data;
						$scope.pastAllData['page'] = [];
							if($scope.pastAllData['data'] != undefined){
								for(i=0;i<$scope.pastAllData['data'].length;i++){
									if($scope.pastAllData['data'][i].examination != null){
										if(typeof $scope.pastAllData['data'][i].examination != 'object'){
										$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
										}
									}
								}
								for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
								$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
								}
							}
						$scope.gotvisits = true;
						resize($scope.j);
					});*/
					
				
			//send message 
				var send_message = function(appid,sendtoid){
					$scope.toggle(appid+'message','','');
						var messageData = {
							'appid' : appid, 
							'sendtoid' : sendtoid, 
							'message' : $('#'+appid+"messagetext").val()
						};
						var httpRequest = $http({
							method: 'POST',
							data: messageData,
							url: '/ayushman/newcemrdashboard/sendmessage'
						}).success(function(data, status) {
							if(data == 'done'){
								emrService.getPastAllPatientDataForcefully(patient_id)
								.then(function(data){
									$scope.pastAllData = data;
									$scope.pastAllData['page'] = [];
									if($scope.pastAllData['data'] != undefined){
										for(i=0;i<$scope.pastAllData['data'].length;i++){
											if($scope.pastAllData['data'][i].examination != null){
												if(typeof $scope.pastAllData['data'][i].examination != 'object'){
													$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
												}
											}
										}
										for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
											$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
										}
									}
								$scope.gotvisits = true;
								});
							}else{
								alert('Failed to send message.');
							}	
						});
				}
				$scope.sendMessage = send_message;
				
					
					$scope.openDialog = function(url, width, height){
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
						$scope.fancyboxclosed();
						//window.location.pageload();
					}
                });
				
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
		// get patient medical profile
			emrService.getMedicalProfile(patient_id).then(function(data){
					$scope.emr_snapshot = data;
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
						$scope.changedQuestions['allergi'] = {};
						if($scope.emr_snapshot['allergies']!=undefined){
							for(var i=0; i<$scope.emr_snapshot['allergies'].length;i++ ){
								var allergyid='allergi_q_'+(i+1);
								var id='allergi_q_'+(i+1)+'_id';
								$scope.changedQuestions['allergi'][allergyid] = $scope.emr_snapshot['allergies'][i][0];
								$scope.changedQuestions['allergi'][id] = $scope.emr_snapshot['allergies'][i][1];
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
							else if($scope.emr_snapshot['past_diseases_history'][i][2]=='2')
							{
								/*$scope.changedQuestions['past_diseases_history'][diseaseid] = 'No';
								$scope.changedQuestions['past_diseases_history'][remarkid] =  $scope.emr_snapshot['past_diseases_history'][i][1];
							}
							else{*/
								$scope.changedQuestions['past_diseases_history'][diseaseid] = $scope.emr_snapshot['past_diseases_history'][i][1];
								$scope.changedQuestions['past_diseases_history'][remarkid] =  $scope.emr_snapshot['past_diseases_history'][i][1];
							}		
						}
					}
		
		// immunization details...............
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
								$scope.changedQuestions['immunizations_details'][immunizationdate] =  $scope.emr_snapshot['immunizations_details'][i][1];
							}else
							if($scope.emr_snapshot['immunizations_details'][i][2]=='0'){
							}else{
									$scope.changedQuestions['immunizations_details'][immunizationid] = 'Yes';
									$scope.changedQuestions['immunizations_details'][immunizationdate] =  $scope.emr_snapshot['immunizations_details'][i][1];
								 }

						}	
					}		
		//fill data of family history					
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
		
		//other  Medical observation
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
		
		//Save family history		
				var savedetails=function savedetails(notification){	
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
						if(notification== true){
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
		//
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

		//Refresh profile data
				var addnewrelative=function addnewrelative(){
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
				
		//Get examination data
				$scope.appointmentid = appointmentid;
				//$scope.appointmentid = QueryString.appid;
				examinationService.getExaminationData(appointmentid).then(function(data){
					$scope.examination_data = data;
					changedQuestion = {};
					changedQuestion['vitals']={};
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_1"] != undefined){
						changedQuestion['vitals']['vitals_q_1'] = {};
						changedQuestion['vitals']['vitals_q_1'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_1"].a;
					}					
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_2"] != undefined){
						changedQuestion['vitals']['vitals_q_2'] = {};
						changedQuestion['vitals']['vitals_q_2'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_2"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_8"] != undefined){
						changedQuestion['vitals']['vitals_q_8'] = {};
						changedQuestion['vitals']['vitals_q_8'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_8"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_21"] != undefined){
						changedQuestion['vitals']['vitals_q_21'] = {};
						changedQuestion['vitals']['vitals_q_21'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_21"].a;
					}					
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_41"] != undefined){
						changedQuestion['vitals']['vitals_q_41'] = {};
						changedQuestion['vitals']['vitals_q_41'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_41"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_42"] != undefined){
						changedQuestion['vitals']['vitals_q_42'] = {};
						changedQuestion['vitals']['vitals_q_42'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_42"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_43"] != undefined){
						changedQuestion['vitals']['vitals_q_43'] = {};
						changedQuestion['vitals']['vitals_q_43'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_43"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_11"] != undefined){
						changedQuestion['vitals']['vitals_q_11'] = {};
						changedQuestion['vitals']['vitals_q_11'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_11"].a;
					}
					if($scope.examination_data["changedQuestions"]["vitals"] != undefined && $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_3"] != undefined){
						changedQuestion['vitals']['vitals_q_3'] = {};
						changedQuestion['vitals']['vitals_q_3'] = $scope.examination_data["changedQuestions"]["vitals"]["vitals_q_3"].a;
					}
						//setInterval(function(){ AutosaveConsultationData(); }, 60000);
						
						getAutoPopulatedMedicines($scope.appointmentid);
						getAutoPopulatedInvestigations($scope.appointmentid);
				});
				
				
				function getAutoPopulatedMedicines(appointmentid){ 
    //alert('call');
	prepareEmrForm();
    $.ajax({ 
	url: "/ayushman/newcemrdashboard/getCurrentMedicines?appid="+appointmentid,
	success: function(jsonPastMedicines) {
	    if(jsonPastMedicines == 'no past data'){
			fragments = new Array();
	    }
	    else{
			document.cookie = 'medicine='+jsonPastMedicines+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			loadScripts();
			fragments = new Array();
			fragments = JSON.parse(jsonPastMedicines);
			setMedicineText(fragments);
	    }
	},
	error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
    });
}
function getAutoPopulatedInvestigations(appointmentid){ 
    //alert('call');
    $.ajax({ 
	url: "/ayushman/newcemrdashboard/getCurrentInvestigations?appid="+appointmentid,
	success: function(jsonPastInvestigations) {
	    if(jsonPastInvestigations == 'no past data'){
			investigationFragments = new Array();
	    }
	    else{
			document.cookie = 'investigation_text='+jsonPastInvestigations+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			investigationFragments = new Array();
			investigationFragments = JSON.parse(jsonPastInvestigations);
			setInvestigationText(investigationFragments);
	    }
	},
	error : function(){showMessage('550','200','Retrieving past data',"Could not retrieve past data.",'error','id');}
    });
}
								
				$scope.changedQuestions = {};
			
				///////////////////////////////////////////////////////////
	
				console.log($scope.examination_data);
				 $scope.selected = 'main complaint';
				 $scope.isForm = 0;

				var is_selected = function(link_name){
				 if(link_name == $scope.selected){
					 return 'active';
				 }
				 };
				 $scope.is_selected = is_selected;
				 $scope.menu = examinationService.getMenu(appointmentid);
							 
				$scope.restore_questions = function(){
					examinationService.getExaminationData(appointmentid).then(function(data){
						$scope.examination_data = data;
						console.log(appointmentid);
					});
				 console.log("Restore_questions");
				 console.log($scope.examination_data);
					
				 if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
						 var changedQuestions = $scope.examination_data['changedQuestions'];
					 for(var i in changedQuestions){
						 var formName = i;
						 console.log(i);
						 var formData = $scope.examination_data['forms'][i];
						 var form = new formmodule();
						 form.showForm(formName, formData.isSubForm, formData.formTarget, formData.formTextTarget, formData.data);
						 for(var j in changedQuestions[i]){
							var answerElement = $('#'+j).find('.formtextarea');
							if(answerElement.length){
								$(answerElement).val(changedQuestions[i][j].a);
								$('#'+formName).find('.formContent').trigger('change');
							}else{
								answerElement = $('#'+j).find('.formmultiselect');
								$(answerElement).val(changedQuestions[i][j].a);
								$('#'+formName).find('.formContent').trigger('change');
								var obj = answerElement[0];
								//var arr = changedQuestions[i][j].split(',');
								//$(answerElement).val(arr);
								//$(answerElement).multiselect("refresh");
							}								 
						 }
						 $('#'+formName).find('.formContent').trigger('change');
					 }
				 }
		     };		
			if(!$scope.menu){
				examReqApi.get({},
					function(data){
						examinationService.setMenu(data, appointmentid);
						console.log($scope.examination_data);
								
					    $scope.menu = examinationService.getMenu(appointmentid);
						if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
							for(var key in $scope.menu.examinationMenu)
							{
								$scope.showForm($scope.menu.examinationMenu[key], 'examinations', 'true', 'examinations_target',1,1);
							}
							$scope.showForm('vitals','examinations','false', 'vitals_target',1,1);
						}
						setTimeout(function(){
								console.log($scope.examination_data);
								if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
									 var changedQuestions = $scope.examination_data['changedQuestions'];
									 for(var i in changedQuestions){
										 var formName = i;
										 var formData = $scope.examination_data['forms'][i];
										 var form = new formmodule();
										 console.log(formData);
										 form.showForm(formName, formData.isSubForm, formData.formTarget, formData.formTextTarget, formData.data);
										 for(var j in changedQuestions[i]){
											var answerElement = $('#'+j).find('.formtextarea');
											if(answerElement.length){
												$(answerElement).val(changedQuestions[i][j].a);
											$('#'+formName).find('.formContent').trigger('change');	
											}else{
												$('#'+formName).find('.formContent').trigger('change');
												answerElement = $('#'+j).find('.formmultiselect');
												var obj = answerElement[0];
												$(answerElement).val(changedQuestions[i][j].a);
												//var arr = changedQuestions[i][j].split(',');
												//$(answerElement).val(arr);
												//$(answerElement).multiselect("refresh");
											}
										 }
										 $('#'+formName).find('.formContent').trigger('change');
									 }
								 }
								
						}, 3000); 
					});
		     }else{
				$scope.restore_questions();
		     }
			 
 				$scope.restore_questionsemrfoms = function(){
					prepareEmrForm();
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


////////////////////////////////////////////////////////////////////////////////
				
				$scope.unsavedData = true;
				$scope.launchComplexModal = function() {
					createDialogService('/ayushman/assets/app/partials/quickprescription.html', {
					  id: 'complexDialog',
					  backdrop: true,
					  controller: 'ComplexModalController',
					  css:{padding: '18px',width:'720px',height:'1400'},
					  cancel:{label: 'Cancel', fn: function() {
								examinationService.getExaminationData($scope.appointmentid).then(function(data){
										$scope.examination_data = data;
										
								});
								medicine_text = "";
								
								if(readCookie('medicine') != "{}"){
									jsonStr = readCookie('medicine');
									fragments = JSON.parse(jsonStr);
							
									for(var i = 0; i < fragments.length; i++){
										medicine_text = medicine_text + fragments[i][0].value+"- "+ fragments[i][1].value+"- "+ fragments[i][2].value+"- "+ fragments[i][3].value + '\n';
									} 
								}
								
								$scope.examination_data.medicine_text = medicine_text;
								jsonStr = readCookie('investigation_text');
								if(jsonStr!="undefined")
								{
									investigationFragments = JSON.parse(jsonStr);
									investigation_text = "";
									for(var i = 0; i < investigationFragments.length; i++){
										investigation_text = investigation_text+ investigationFragments[i].value+ '\n';
									} 
									$scope.examination_data.investigation_text = investigation_text;
								}
								$scope.examination_data.text_followup = readCookie('text_followup_note');
								$scope.examination_data.text_complaint = readCookie('symptom_text');
								$scope.examination_data.text_diagnosis = readCookie('diagnosis_text');
								
								if(angular.fromJson(readCookie('examinationQuestion')) == undefined){
									$scope.examinationQuestion =  readCookie('examinationQuestion');
								}else{
									$scope.examinationQuestion =  angular.fromJson(readCookie('examinationQuestion'));
								}
							}
						},
					  success: {label: 'Success', fn: function() {
						$scope.$broadcast('end_consultation');
						
					  }}
					},{appointment_id:appointmentid});
				};
				
				$scope.uploadHistoryNotes = function(){
					if(confirm("Attachement is already present. Uploading new attachment will replace previously attached file.")){
						$scope.launchNotesUpload();
					}
				}				
				
				$scope.doctor_historynotes = '';
					$scope.openHistoryNotes = function(){
						$scope.openDialog('/ayushman/'+$scope.doctor_historynotes, 900, 1000);
					}
					
				$scope.launchNotesUpload = function() {
					createDialogService('/ayushman/assets/app/partials/uploadnotes.html', {
							id: 'complexDialog',
							backdrop: true,
							controller: 'historynotesCtrl',
							css:{padding: '18px',width:'900'},
							cancel:{label: 'Cancel', fn: function() {
								}
							},
							success: {
								label: 'Success', fn: function() {
									$scope.getAllNotes();
								}
							}
					},{patientid:patient_id});
				};
		
		//get notes			
				$scope.receivedvalues = false;
				$scope.getAllNotes = function(){
					emrService.getNotes(patient_id, doctorId)
						.then(function(data){
							$scope.doctor_notes = data;				
						});
					emrService.getHistoryNotes(patient_id, doctorId)
						.then(function(data){
							$scope.doctor_historynotes = data;
							$scope.receivedvalues = true;
						});
				} 
				$scope.deleteHistoryNotes = function(){
					if(confirm("File will be deleted permanently.")){
						emrService.deleteHistoryNotes(patientid).then(function(data){
							$scope.getAllNotes();
						});
					}
				}	 		
		//show forms		
				$scope.data['allergies'] = {};
				$scope.data['socialhabits'] = {};
				$scope.showForma = function(formName,formType, isSubForm, formTarget, formTextTarget,displaytarget){
					$scope.selected = formName;
					$scope.isForm = 1;
					$('#form_place_holder').children().hide();
					console.log(formName);
						if($('#'+formName).length != 0){
							//console("form already printed");
							$('#'+formName).show(500);
						}else{
								//console("form not printed");
								formApi
								.get({formid: formName, formType: formType},function(data){
									if(data['type'] == 'error')
										alert(data['value']);					
									else{		
											console.log("formmodule");
										var form = new formmodule();
										$scope.examination_data["forms"][formName]= {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
										form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value'],displaytarget);
										$scope.restore_questionsemrfoms();
										validation($('#vitals_q_2'),'numeric');
										validation($('#vitals_q_8'),'bp');	
										validation($('#vitals_q_1'),'numeric');
										validation($('#vitals_q_21'),'numeric');
							validation($('#vitals_q_11'),'numeric');
							validation($('#vitals_q_41'),'numeric');
							validation($('#vitals_q_42'),'numeric');
									}								
								});			
						}

				}
				
				$scope.new_risk = emrService.newRisk;		   
				$scope.delete_risk = emrService.deleteRisk;
				$scope.edit_risk = emrService.editRisk;
				$scope.add_risk = emrService.addRisk;
			
				
		//show forms		
				$scope.showForm = function(formName,formType, isSubForm, formTarget, formTextTarget,displaytarget){
					$scope.selected = formName;
					$scope.isForm = 1;
					console.log("in showform");
					console.log($scope.selected);
					$('#form_place_holder').children().hide();
					if($('#'+formName).length != 0){
						console.log(">0");
						$('#'+formName).show(500);
					}else{
							console.log("==0");
								formApi
								.get({formid: formName, formType: formType},function(data){
									if(data['type'] == 'error')
										alert(data['value']);					
									else{		
										console.log("formmodule");
										var form = new formmodule();
										 $scope.examination_data['forms'][formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
										console.log($scope.examination_data['forms'][formName]);
										form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value'],displaytarget);
										$scope.restore_questions();
										validation($('#vitals_q_2'),'numeric');
										validation($('#vitals_q_8'),'bp');	
										validation($('#vitals_q_1'),'numeric');
										validation($('#vitals_q_21'),'numeric');
							validation($('#vitals_q_11'),'numeric');
							validation($('#vitals_q_41'),'numeric');
							validation($('#vitals_q_42'),'numeric');
									}								
								});			
					}
				}
		//Save immunization
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
									}else{
										$scope.changedQuestions['immunizations_details'][key] = changedQuestion['immunization'][key];
									}
									flag1=0;
								}else{
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
	//save examination data
	var save_examinationdata = function(){
				$scope.allergy['examinationdata']='';
				var flag=0;
				if(changedQuestion['examinationdata']!=undefined){
					flag=1;
				}
				var flag1=0,flag2=0;
					for (var key in changedQuestion['examinationdata']){
						if(changedQuestion['examinationdata'][key]!=undefined){
							$scope.allergy['examinationdata']=$scope.allergy['examinationdata']+changedQuestion['examinationdata'][key]+' ';
						}
					}	
					flag1=0;
					flag2=0;
					if(flag==1){
						for(var key in $scope.changedQuestions['examinationdata']){
							if(flag2 % 2==0){
								for(var key2 in changedQuestion['examinationdata']){
									if(key==key2){
										flag1=1;
										break;
									}
								}
								if(flag1==1){
									$scope.changedQuestions['examinationdata'][key] = changedQuestion['examinationdata'][key];
								}
								else{
									$scope.changedQuestions['examinationdata'][key] = 'dh';
								}
								flag1=0;
							}
							flag2++;
						}
					}
					var str= JSON.stringify($scope.changedQuestions['examinationdata']);
					console.log(str);
					emrService.saveExamination(appointmentid,str);
						showNotification('300','20','Save data','Patients examinationdata Saved','notification','timernotification',3000);
			}
			$scope.save_examinationdata=save_examinationdata;
	
	//Save Allergies
			var save_allergies	 = function(){				
				$scope.allergy['allergies']='';
				var flag=0;
				if(changedQuestion['allergies']!=undefined){
					flag=1;
				}
				var flag1=0,flag2=0;
					for (var key in changedQuestion['allergies']){
						if(changedQuestion['allergies'][key]!=undefined){
							$scope.allergy['allergies']=$scope.allergy['allergies']+changedQuestion['allergies'][key]+',';
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
	
	//save social habits
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
	
	//Save past diseases
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
	
		//Save prescription template	 
				$scope.savePrescriptiontemplate = function(){
					if($scope.appointment_info.templatename =='' || $scope.appointment_info.templatename == undefined){
						alert('Please Enter Template Name');
					}else{
						$scope.$broadcast('save_prescriptiontemplate',{name:$scope.appointment_info.templatename});
						$("#rightMenusave").stop().slideToggle(500); 
					}
				}			
		//get prescription template
				$scope.getPastprescription = function(id){
					$scope.$broadcast('get_Pastprescription',{id: id});	
				}					
				
				appointmentService.getPrescriptionTemplates()
					.then(function(data){
						
						$scope.prescriptiontemplates = data;
					});
					//$scope.examination_data = examinationService.getExaminationData(appointmentid);
					// For deleting prescription template
					//delete prescription template				
				$scope.deletePrescriptiontemplate = function(name){
					console.log(name);
					$scope.appointment_info.templatename = name;
					if($scope.appointment_info.templatename =='' || $scope.appointment_info.templatename == undefined){
						alert('Please Enter Template Name');
					}else{
						$scope.$broadcast('delete_prescriptiontemplate',{name:$scope.appointment_info.templatename});
						$("#rightMenudelete").stop().slideToggle(500); 
					}
				}
			 			
		$scope.$on('get_Pastprescription', function(event,args){
				$('input[name=appid]').val($scope.appointment_info.appointment_id);
				$.ajax({
					type: "get",
					url: "/ayushman/newcemrdashboard/getPastprescription?id="+appointmentid,
						success:
						function( data ){
						if(data == "no  past data")
						{
							showNotification('300','20','No past data','Past Data not Available','notification','timernotification',3000);

						}else{
						data = JSON.parse(data);
						if(data != null){
							console.log(data);
							document.cookie = 'symptom_text='+data['maincomplaint']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							document.cookie = 'diagnosis_text='+data['diagnosis']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							document.cookie = 'investigation_text='+data['investigation']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							document.cookie = 'text_followup_note='+data['followup']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							document.cookie = 'medicines='+data['medicine']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							
							if(readCookie('text_followup_note') != "undefined")
								$scope.examination_data.text_followup = readCookie('text_followup_note');
									
							if(readCookie('symptom_text') != "undefined")
								$scope.examination_data.text_complaint = readCookie('symptom_text');
									
							if(readCookie('diagnosis_text') != "undefined")
								$scope.examination_data.text_diagnosis = readCookie('diagnosis_text');

							if(readCookie('medicines') != "undefined"){
								jsonStr = readCookie('medicines');
								console.log(jsonStr);
								fragments = new Array();
								fragments = JSON.parse(jsonStr);
								setMedicineText(fragments);
							}
	
							if(readCookie('investigation_text') != "undefined"){
								jsonStr = readCookie('investigation_text');
								investigationFragments = JSON.parse(jsonStr);
								if(investigationFragments.length > 0){
									$('#investigations').show();
								}
								setInvestigationText(investigationFragments);
							}
							if(data['examination'])
							{
								console.log(data['examination']);
								if (typeof data['examination']['vitals']['vitals_q_1']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_1'] =data['examination']['vitals']['vitals_q_1']['a'];
									$('#vitals_q_1').val(data['examination']['vitals']['vitals_q_1']['a']);
									setVitals($('#vitals_q_1'));
								}
								if(typeof data['examination']['vitals']['vitals_q_2']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_2'] =data['examination']['vitals']['vitals_q_2']['a'];
									$('#vitals_q_2').val(data['examination']['vitals']['vitals_q_2']['a']);
									setVitals($('#vitals_q_2'));
								}
								if(typeof data['examination']['vitals']['vitals_q_8']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_8'] =data['examination']['vitals']['vitals_q_8']['a'];
									$('#vitals_q_8').val(data['examination']['vitals']['vitals_q_8']['a']);
									setVitals($('#vitals_q_8'));
								}
								if(typeof data['examination']['vitals']['vitals_q_21']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_21'] =data['examination']['vitals']['vitals_q_21']['a'];
									$('#vitals_q_21').val(data['examination']['vitals']['vitals_q_21']['a']); 
									setVitals($('#vitals_q_21'));
								}
								if(typeof data['examination']['vitals']['vitals_q_41']!= "undefined")
								{
									console.log(data['examination']['vitals']['vitals_q_41']);
									changedQuestion['vitals']['vitals_q_41'] =data['examination']['vitals']['vitals_q_41']['a'];
									$('#vitals_q_41').val(data['examination']['vitals']['vitals_q_41']['a']); 
									setVitals($('#vitals_q_41'));
								}
								if(typeof data['examination']['vitals']['vitals_q_42']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_42'] =data['examination']['vitals']['vitals_q_42']['a'];
									$('#vitals_q_42').val(data['examination']['vitals']['vitals_q_42']['a']); 
									setVitals($('#vitals_q_42'));
								}
								if(typeof data['examination']['vitals']['vitals_q_43']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_43'] =data['examination']['vitals']['vitals_q_43']['a'];
									$('#vitals_q_43').val(data['examination']['vitals']['vitals_q_43']['a']); 
									setVitals($('#vitals_q_43'));
								}
								if(typeof data['examination']['vitals']['vitals_q_11']!= "undefined")
								{
									changedQuestion['vitals']['vitals_q_11'] =data['examination']['vitals']['vitals_q_11']['a'];
									$('#vitals_q_11').val(data['examination']['vitals']['vitals_q_11']['a']); 
									setVitals($('#vitals_q_11'));
								}
								
							}
							$scope.$apply();
							}else{
								showMessage('250','50','Past data','Past prescription not present','error','id');
							
							}
							}
							},
						error:
						function(){
								showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
							},
						
					});
			 });
				
		//load past prescription	
				$scope.loadPrescriptiontemplate = function(id){
					console.log(id);
					$scope.$broadcast('load_prescriptiontemplate',{id: id});
				}
			  
			$scope.$on('save_prescriptiontemplate', function(event, args){
				
				jsonStr = readCookie('medicine');
				$('#medicine_ids').val(jsonStr);
				console.log(jsonStr);
				jsonStr = readCookie('investigation_text');
				$('#test_ids').val(jsonStr);
					console.log(jsonStr);
				jsonStr = readCookie('diagnosis_text');
				$('#diagnosis_text').val(jsonStr);
					console.log(jsonStr);
				jsonStr = readCookie('symptom_text');
				$('#text_complaint').val(jsonStr);
					console.log(jsonStr);
				jsonStr = readCookie('text_followup_note');
				$('#text_followup_note').val(jsonStr);
					console.log(jsonStr);
				$('input[name=appid]').val($scope.appointment_info.appointment_id);
			
					
				$.ajax({
						type: "post",
						url: "/ayushman/newcemrdashboard/savePrescriptionTemplate?name="+args.name,
						data: $("#emrform").serialize(),
						success:
								function( data ){
									if(data == 'success'){
											appointmentService.getPrescriptionTemplates()
												.then(function(data){
													$scope.prescriptiontemplates = data;
													console.log($scope.prescriptiontemplates);
												
												});
									}
									else
									alert('Please Try Again');
								},
								error:
								function(){
									showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
								},
				});
					
			});
		 // for deleting prescription template
				$scope.$on('delete_prescriptiontemplate', function(event, args){
					console.log(args.name);
					$('input[name=appid]').val($scope.appointment_info.appointment_id);
					
					$.ajax({
						type: "post",
						url: "/ayushman/newcemrdashboard/deletePrescriptionTemplate?name="+args.name,
						data: $("#emrform").serialize(),
						success:
								function( data ){
									if(data == 'success'){
											appointmentService.getPrescriptionTemplates()
												.then(function(data){
													$scope.prescriptiontemplates = data;
													//$scope.$apply();
												});
									}
									else
									alert('Please Try Again');
								},
								error:
								function(){
									showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
								},
					});
					
				});
		//load past prescription
			$scope.$on('load_prescriptiontemplate', function(event,args){
					$('input[name=appid]').val($scope.appointment_info.appointment_id);
					$.ajax({
						type: "post",
						url: "/ayushman/newcemrdashboard/loadPrescriptionTemplate?id="+args.id,
						data: $("#emrform").serialize(),
						success:
								function( data ){
									data = JSON.parse(data);
									console.log(data);
									document.cookie = 'symptom_text='+data['symptoms_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'diagnosis_text='+data['diagnosis_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'investigation_text='+data['investigations_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'text_followup_note='+data['followupadvice_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'medicine='+data['medicines_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									loadScripts();
									if(readCookie('text_followup_note') != undefined)
										$scope.examination_data.text_followup = readCookie('text_followup_note');
									if(readCookie('symptom_text') != undefined)
										//$scope.examination_data.text_complaint = readCookie('symptom_text');
									if(readCookie('diagnosis_text') != undefined)
										$scope.examination_data.text_diagnosis = readCookie('diagnosis_text');
									$scope.$apply();
								},
								error:
								function(){
									showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
								},
					});
			});
		//Error check
				$scope.checkErr = function(startDate,endDate) {
					var curDate = new Date();
						if(new Date(startDate) > new Date(endDate)){
							$scope.toDate = '';
							alert('To Date is not greater than From date');
							return false;
						}else{
							return true;
						}
				};
				$scope.calculateAge = calculate_age;
				$scope.appointmentid=appointmentid;
				appointmentService.getMyprofile()
					.then(function(data){
						$scope.myprofile = data;
					});

				appointmentService.getMyclinics()
				.then(function(data){
					$scope.myclinics = data;
				});
			
				
					if(typeof appointment_data == 'undefined'){
						examinationService.getExaminationData($scope.appointmentid).then(function(data){
							$scope.examination_data = data;
							console.log($scope.examination_data);
							console.log(appointmentid);
						});
					}else{
						console.log(appointment_data);
						$scope.previousexamination_data = {};
						appointmentid = appointment_data.id;
						if(appointment_data.maincomplaint != undefined)
						$scope.previousexamination_data.text_complaint = appointment_data.maincomplaint;
					
						if(appointment_data.diagnosis != undefined)
							$scope.previousexamination_data.text_diagnosis = appointment_data.diagnosis;
				
						if(appointment_data.followup != undefined)
							$scope.previousexamination_data.text_followup = appointment_data.followup;
						
						if(appointment_data.medicine != undefined)
							$scope.previousexamination_data.medicine = appointment_data.medicine;
						if(appointment_data.investigation != undefined)
							$scope.previousexamination_data.investigations = appointment_data.investigation;
						if(appointment_data.examinationsummary != undefined)
							$scope.previousexamination_data.text_examinationsummary = appointment_data.examinationsummary;
						if(appointment_data.date != undefined)
							$scope.previousexamination_data.date = appointment_data.date;				
							$scope.previousexamination_data.isexaminationavailable = false;
				
						if(appointment_data.examination != null){
							if(appointment_data.examination.vitals != undefined){
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
								//$scope.examination_data.text_followup = followup;
							}
						}				
					}
		//AutosaveConsultation save 		
				$scope.AutosaveConsultationData = function(){
					$scope.printbillbtn = 1;
				prepareEmrForm();
				$scope.refreshapp();
					if(changedQuestion == undefined){
		
					}else{
						if(changedQuestion['vitals'] != undefined && (changedQuestion['vitals']['vitals_q_1'] != undefined || changedQuestion['vitals']['vitals_q_2'] != undefined)){
						i = changedQuestion['vitals'];
						for(var j in i){
				
							//$("#vitalsTextTarget").val(changedQuestions[i][j]);
						}
					}
					}
					$.ajax({
						type: "post",
						url: "/ayushman/newcemrdashboard/AutosaveonlyConsultationData",
						data: $("#emrform").serialize(),
						success:function( data ){
							$scope.refreshapp();
							
							if(data != 'error'){
					
							}
							else{
					
								alert('Failed to save consultation data.');
							}
							$("body").css("cursor", "default");
								showNotification('300','20','Save consultation','consultation Saved','notification','timernotification',2000);
						},
						error:function(){
							showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
						},
					});
				}
				
			
		$scope.endConsultation = function(){
			$scope.printbillbtn = 1;
				$scope.$broadcast('end_consultation');
		     }
			 			 /*logic for ending consultation*/{
				$('.ui-multiselect-menu').hide();
				$scope.$on('end_consultation', function(){

					consultationMode = ($scope.appointment_info.mode).toLowerCase();
					payment_mode = ($scope.appointment_info.paid_c);
					if($scope.appointment_info.mode == 'Online'){
						/*if(sentDataFlag == false){
							alert("Please Click on 'SEND DATA' before ending consultation");
						}
						else{*/
						showMessage('300','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
						//}	
					}
					else{
						showMessage('250','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
					}
				});
			 }
			
				$scope.launchFitnessCertificate = function() {
					console.log("cer");
					createDialogService('/ayushman/assets/app/partials/fitnesscertificate.html', {
						id: 'bill',
						backdrop: true,
						controller: 'PrintablePrescriptionController',
						css:{padding: '18px',width:'650px'},
						cancel:{
								label: 'Cancel', fn: function() {
									$scope.launchPrintablePrescription();
								}
						},
						success: {
									label: 'Success', fn: function() {
										$scope.launchPrintablePrescription();
									}
								}
					});
				};
				
				$scope.callToAddToProductList = function(a,b,c,d,e,f){
					console.log(a);
					dashboardService.addProduct(a,b,c,d,e,f);
					};
		 $scope.fancyboxclosed = function ()
			{
			//	location.reload();
				
			}	
			
			$scope.refreshapp= function() {
				console.log("1");
			appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					console.log("2");
					console.log(data);
					$scope.appointment_info = data;
				});
			}
			
			
			
				
	//call 	launchPrintablePrescription
	
			$scope.launchendPrintablePrescription = function() {
					$scope.refreshapp();
					createDialogService('/ayushman/assets/app/partials/endprescprint.html', {
							id: 'print',
							backdrop: true,
							controller: 'PrintablePrescriptionController',
							css:{padding: '18px',width:'1054px',height:'1400'},
							cancel:{label: 'Cancel', fn: function() {
								//window.location="/ayushman/cdashboard/view";
								doallendreadonly();
								}
							},
							success: {
										label: 'Success', fn: function() {
										
										$scope.launchPrintableBill();
									}
							},
							callback: {label: 'Callback', fn: function(argName) {
							  
								if(argName=='medical'){
									$scope.launchMedicalCertificate();
								}
								if(argName=='fitness'){
									$scope.launchFitnessCertificate();
								}
								if(argName=='Discharge'){
									$scope.launchDischargeCertificate();
								}
							}
							}
				});
				};
	
				$scope.launchPrintablePrescription = function() {
					$scope.refreshapp();
						createDialogService('/ayushman/assets/app/partials/prescprint.html', {
							id: 'print',
							backdrop: true,
							controller: 'PrintablePrescriptionController',
							css:{padding: '18px',width:'1054px',height:'1400'},
							cancel:{label: 'Cancel', fn: function() {
								//window.location="/ayushman/cdashboard/view";
								doallreadonly();
								}
							},
							success: {
										label: 'Success', fn: function() {
											//location.reload();
										$scope.launchPrintableBill();
									}
							},
							callback: {label: 'Callback', fn: function(argName) {
							  
								if(argName=='medical'){
									$scope.launchMedicalCertificate();
								}
								if(argName=='fitness'){
									$scope.launchFitnessCertificate();
								}
								if(argName=='Discharge'){
									$scope.launchDischargeCertificate();
								}
							}
							}
				});
				};
		
				//call launchMedicalCertificate		
				$scope.launchMedicalCertificate = function() {
					createDialogService('/ayushman/assets/app/partials/medicalcertificate.html', {
						id: 'bill',
						backdrop: true,
						controller: 'PrintablePrescriptionController',
						css:{padding: '18px',width:'650px'},
						cancel:{label: 'Cancel', fn: function() {
							//$scope.launchPrintablePrescription();
						}
						},
						success: {label: 'Success', fn: function() {
							//$scope.launchPrintablePrescription();
						}}
					});
				};
				
				
		//call launchFitnessCertificate
				$scope.launchFitnessCertificate = function() {
					createDialogService('/ayushman/assets/app/partials/fitnesscertificate.html', {
						id: 'bill',
						backdrop: true,
						controller: 'PrintablePrescriptionController',
						css:{padding: '18px',width:'650px'},
							cancel:{label: 'Cancel', fn: function() {
							}
						},
						success: {label: 'Success', fn: function() {
						}}
					},{appointment_id:appointmentid});
				};
				$scope.saveprescriptionstatus = function(id , printstatus){
						//	examinationService.getstatus( id , printstatus ).then(function(data){
						//$scope.status_data = data;
						//});
				}			
		//Display Tracker data
				$scope.launchTracker = function() {
					createDialogService('/ayushman/assets/app/partials/patienttracker.html', {
						id: 'bill',
						backdrop: true,
						controller: 'patienttrackerCtrl',
						css:{padding: '18px',height:'760px',width:'1160px',left:'20%'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				};
		//display past all visits of patients	
			$scope.launchVisits = function() {
					createDialogService('/ayushman/assets/app/partials/pastvisits.html', {
						id: 'Visits',
						backdrop: true,
						controller: 'visitsCtrl',
						css:{padding: '18px',width:'950px'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				};
	$scope.launchPrintableBill = function(app_id,diagnosis,option,isbillgenerate) {
			
					appointment_id=app_id;
					appointment_diagnosis=diagnosis;
					bill_option=option;
					billgenerate=isbillgenerate;
					createDialogService('/ayushman/assets/app/partials/bill/bill.html', {
					  id: 'bill',
					  backdrop: true,
					  controller: 'pastbilldaCtrl',
							  css:{padding: '18px',width:'900px'},
							  cancel:{label: 'Cancel', fn: function() {
									$scope.$broadcast('save_bill');
									//window.location="/ayushman/cdashboard/view";
								}
							},
							  success: {label: 'Success', fn: function() {
									$scope.$broadcast('save_bill');
									//$scope.launchPrintablePrescription();
							  }}
					},{appointment_id:app_id,appointment_diagnosis:diagnosis,bill_option:option,billgenerate:isbillgenerate});
				
	};
	/*//call launchPrintableBill
				$scope.launchPrintableBill = function() {
					//createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
					createDialogService('/ayushman/assets/app/partials/bill/bill.html', {
						id: 'bill',
						backdrop: true,
						controller: 'PrintableBillController',
						css:{padding: '18px',width:'650px'},
						cancel:{label: 'Cancel', fn: function() {
							$scope.$broadcast('save_bill');
							//window.location="/ayushman/cdashboard/view";
						  }
						},
					  success: {label: 'Success', fn: function() {
							$scope.$broadcast('save_bill');
							$scope.launchPrintablePrescription();
					  }}
					});
				};*/
		//Display all reports of patients	
				$scope.launchReports = function() {
					createDialogService('/ayushman/assets/app/partials/pastreports.html', {
						id: 'Report',
						backdrop: true,
						controller: 'myreportsCtrl',
						css:{padding: '18px',width:'650px'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				};
				
				$scope.launchseek = function() {
					createDialogService('/ayushman/assets/app/partials/sekclarification.html', {
						id: 'Report',
						backdrop: true,
						controller: 'visitsCtrl',
						css:{padding: '18px',width:'650px'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				};
				
				$scope.launemr = function() {
					createDialogService('/ayushman/assets/app/partials/patientemr.html', {
						id: 'Report',
						backdrop: true,
						controller: 'emrCtrl',
						css:{padding: '18px',width:'950px'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				};
					
					
					
	}]).controller('immuCtrl',
	['$scope','$routeParams','$http','appointmentService',
		 function($scope, $routeParams,$http,appointmentService){
  var appointmentid = $routeParams.appid;
  $scope.oneAtATime = true;
  $scope.groups=[];
  $scope.actualdates={};
  $scope.appointment_info = {};
  $scope.printgroups ={};
  $scope.patient_id = $routeParams.patient_id;
   $scope.getdate1= function(){
   appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					console.log("3");
					console.log(data);
					$scope.appointment_info = data;
					//console.log("*Appointment6",data);
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					console.log($scope.appointment_info);
					$scope.datecharts();
					$scope.immunizationgroups();
				});
   };
  $scope.getactualdates= function(){
				$scope.getdate1();
				var patient_id = $routeParams.patient_id;
				console.log(patient_id);
				var httpRequest = $http({
					method: 'GET',
					url: '/ayushman/cpatienthistory/immunizationdates?patient_id='+patient_id
				}).success(function(data, status) {
					$scope.actualdates =(data);
					
					console.log($scope.actualdates);
					
				});
			};
			$scope.getactualdates();
  $scope.datecharts= function(){
	$scope.dates={};	
	
  $scope.dob=new Date($scope.appointment_info.DOB);
 		console.log($scope.dob);
  var now=$scope.dob;
  $scope.dates[0]=$scope.dob.toDateString();
  $scope.weeks6=now;
  $scope.weeks6.setDate($scope.weeks6.getDate()+42);
  $scope.dates[1]=$scope.weeks6.toDateString();
  $scope.weeks10= $scope.weeks6;
  $scope.weeks10.setDate($scope.weeks10.getDate()+28);
  $scope.dates[2]=$scope.weeks10.toDateString();
  $scope.weeks14=$scope.weeks10;
  $scope.weeks14.setDate($scope.weeks14.getDate()+28);
  $scope.dates[3]=$scope.weeks14.toDateString();
  $scope.months9=$scope.weeks14;
  $scope.months9.setDate($scope.months9.getDate()+172);
  $scope.dates[4]=$scope.months9.toDateString();
  $scope.months18=$scope.months9;
  $scope.months18.setMonth($scope.months18.getMonth()+9);
  $scope.dates[5]=$scope.months18.toDateString();
  $scope.years2=$scope.months18;
  $scope.years2.setMonth($scope.years2.getMonth()+6);
  $scope.dates[6]=$scope.years2.toDateString();
  $scope.years5=$scope.years2;
  $scope.years5.setFullYear($scope.years5.getFullYear()+3);
  $scope.dates[7]=$scope.years5.toDateString();
  $scope.years10=$scope.years5;
  $scope.years10.setFullYear($scope.years10.getFullYear()+5);
  $scope.dates[8]=$scope.years10.toDateString();
  $scope.years13=$scope.years10;
  $scope.years13.setFullYear($scope.years13.getFullYear()+3);
  $scope.dates[9]=$scope.years13.toDateString();
  };
 
  $scope.immunizationgroups = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cimmunization/getimmunizationlist'
				}).success(function(data, status) {
					$scope.groups =(data);
					//console.log(typeof($scope.groups))
					
				});
			};
	$scope.immunizationgroup = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cimmunization/getimmunizationlist'
				}).success(function(data, status) {
					$scope.printgroups =(data);
				console.log($scope.printgroups);
					//$scope.$apply();
				});
			};
	$scope.immunizationgroup();
	 
		$scope.setreminder=function(reminderarray,reminderdate){
			
			reminderarray=JSON.stringify(reminderarray);
			console.log(reminderarray);
			var httpRequest = $http({
					method: 'POST',
					data: { patient_id: $scope.patient_id,reminder: reminderdate,reminderjson: reminderarray},
					url: '/ayushman/cimmunization/setreminder'
				}).success(function(data, status) {
					alert("Reminder Set!");
					
					
				});
		};
		$scope.immunizationdone=function(immunizationdate, immunizationjson){			
			immunizationarray=JSON.stringify(immunizationjson);
			console.log(immunizationarray);
			var httpRequest = $http({
					method: 'POST',
					data: { patient_id: $scope.patient_id,immunization: immunizationdate,immunizationarray:immunizationarray},
					url: '/ayushman/cpatienthistory/saveimmunization'
				}).success(function(data, status) {
					$scope.getactualdates();
					$scope.$broadcast('updateactualdates');					
				});
		};
  $scope.status = {
    isFirstOpen: true,
    isFirstDisabled: false
  };
}])
.controller('historynotesCtrl',['$scope','$routeParams','$fileUploader','$http','formApi','emrService',function($scope,$routeParams,$fileUploader, $http,formApi,emrService){
	'use strict';
	$scope.patientid = $routeParams.patient_id;
	console.log($scope.patientid);
	// create a uploader with options
	var uploader = $scope.uploader = $fileUploader.create({
		scope: $scope,                          // to automatically update the html. Default: $rootScope
		url: '/ayushman/upload/saveuploadedreports',
		formData: [
		{ key: 'value' }
		],
		filters: [
		function (item) {                    // first user filter
			
			return true;
		}
		]
	});
	
	
	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
		
		if(item.type == 'application/pdf' && uploader.queue.length == 0){
			return true;
		}
		else{
			if(uploader.queue.length > 0){
				alert('One pdf is allowed.')
			}else{
				alert('Only pdf files are allowed');
			}			
			return false;
		}
	});

	// REGISTER HANDLERS

	uploader.bind('afteraddingfile', function (event, item) {
		$scope.i=$scope.i+40;
			
	});

	uploader.bind('whenaddingfilefailed', function (event, item) {
		
	});

	uploader.bind('afteraddingall', function (event, items) {
		//resize();
		
	});

	uploader.bind('beforeupload', function (event, item) {
		
	});

	uploader.bind('progress', function (event, item, progress) {
		
	});

	uploader.bind('success', function (event, xhr, item, response) {
		
	});

	uploader.bind('cancel', function (event, xhr, item) {
		
	});

	uploader.bind('error', function (event, xhr, item, response) {
		
	});

	uploader.bind('complete', function (event, xhr, item, response) {
		
	});
	uploader.bind('completeall', function (event, items) {
		$.ajax({
			 type: "post",
			 url: "/ayushman/upload/savehistorynotes",
			 data: {patientid:$scope.patientid},
			 success:
			 function( data ){
				 $scope.$modalSuccess();
			 },
			 error:
			 function(){
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
			 },
		 });
	});
	uploader.bind('progressall', function (event, progress) {
		
			if(progress==100)
			$scope.completeall=1;
	});

}])

.directive('dateNow', ['$filter', function($filter) {
  return {
    link: function( $scope, $element, $attrs) {
      $element.text($filter('date')(new Date(), $attrs.dateNow));
    }
  };
}]).directive('report',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/reports.html'
	};
}).directive('notedata',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/doctornotes.html'
	};
}).directive('trackerinfo',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/patienttracker1.html'
	};
}).directive('emrinfo',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/patientemr.html'
	};
}).directive('immunizat',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/immunizationselector.html'
	};	
})


