angular.module('app.controllers') 
    .controller('consultationtemplateCtrl',
		['$scope','$route','$routeParams', 'xmppService', 'appointmentService', 'emrService', 'patienttrackerService', 'onlineApi','createDialog','examinationService','$http',
		 function($scope,$route,$routeParams, xmppService, appointmentService, emrService, patienttrackerService, onlineApi,createDialogService,examinationService,$http){
				//popup 
				$scope.appointmentid = QueryString.appid;
				examinationService.getExaminationData($scope.appointmentid).then(function(data){
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
						//setInterval(function(){ AutosaveConsultationData(); }, 15000);
						getAutoPopulatedMedicines($scope.appointmentid);
						getAutoPopulatedInvestigations($scope.appointmentid);
				});
				
				$scope.calculateAge = calculate_age;
				var cookies = document.cookie.split(";");
				var patient_id = '';
				var doctor_id = '';
				$scope.patientid = '';
				
				$scope.reloadRoute = function() {
				   $route.reload();
				}
								$scope.doctor_historynotes = '';
				$scope.openHistoryNotes = function(){
					$scope.openDialog('/ayushman/'+$scope.doctor_historynotes, 900, 1000);
				}
				$scope.deleteHistoryNotes = function(){
					if(confirm("File will be deleted permanently.")){
						emrService.deleteHistoryNotes(patientid).then(function(data){
								$scope.getAllNotes();
						});
					}
				}
				$scope.uploadHistoryNotes = function(){
					if(confirm("Attachement is already present. Uploading new attachment will replace previously attached file.")){
						$scope.launchNotesUpload();
					}
				}
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
					patientid = patient_id;
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
					},{patientid:patient_id});
				};

				$scope.unsavedData = true;
				$scope.launchComplexModal = function() {
					createDialogService('/ayushman/assets/app/partials/quickprescription.html', {
					  id: 'complexDialog',
					  backdrop: true,
					  controller: 'ComplexModalController',
					  css:{padding: '18px',width:'720px',height:'1400'},
					  cancel:{label: 'Cancel', fn: function() {
								examinationService.getExaminationData(appointmentid).then(function(data){
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
								investigationFragments = JSON.parse(jsonStr);
								investigation_text = "";
								for(var i = 0; i < investigationFragments.length; i++){
									investigation_text = investigation_text+ investigationFragments[i].value+ '\n';
								} 
								$scope.examination_data.investigation_text = investigation_text;
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
				$scope.launchPrintablePrescription = function() {
					createDialogService('/ayushman/assets/app/partials/printprescription.html', {
					  id: 'print',
					  backdrop: true,
					  controller: 'PrintablePrescriptionController',
					  css:{padding: '18px',width:'1024px',height:'1400'},
					  cancel:{label: 'Cancel', fn: function() {
								window.location="/ayushman/cdashboard/view";
							}
						},
					  success: {label: 'Success', fn: function() {
						$scope.launchPrintableBill();
					  }},
					  callback: {label: 'Callback', fn: function(argName) {
						  
						  if(argName=='medical'){
						  	$scope.launchMedicalCertificate();
						  }
						  if(argName=='fitness'){
						  	$scope.launchFitnessCertificate();
						  }
					  }}
					},{appointment_id:appointmentid});
				};
				
				$scope.launchPrintableBill = function() {
					createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
					  id: 'bill',
					  backdrop: true,
					  controller: 'PrintableBillController',
					  css:{padding: '18px',width:'650px'},
					  cancel:{label: 'Cancel', fn: function() {
							$scope.$broadcast('save_bill');
							window.location="/ayushman/cdashboard/view";
						}
					},
					  success: {label: 'Success', fn: function() {
							$scope.$broadcast('save_bill');
							$scope.launchPrintablePrescription();
					  }}
					});
				};
				$scope.launchMedicalCertificate = function() {
					createDialogService('/ayushman/assets/app/partials/medicalcertificate.html', {
					  id: 'bill',
					  backdrop: true,
					  controller: 'PrintablePrescriptionController',
					  css:{padding: '18px',width:'650px'},
					  cancel:{label: 'Cancel', fn: function() {
							$scope.launchPrintablePrescription();
						}
					},
					  success: {label: 'Success', fn: function() {
							$scope.launchPrintablePrescription();
					  }}
					});
				};
				$scope.launchFitnessCertificate = function() {
					createDialogService('/ayushman/assets/app/partials/fitnesscertificate.html', {
					  id: 'bill',
					  backdrop: true,
					  controller: 'PrintablePrescriptionController',
					  css:{padding: '18px',width:'650px'},
					  cancel:{label: 'Cancel', fn: function() {
							$scope.launchPrintablePrescription();
						}
					},
					  success: {label: 'Success', fn: function() {
							$scope.launchPrintablePrescription();
					  }}
					});
				};
				$('#informationpopup').dialog({
					 autoOpen: false,
					 show: "fade",
					 hide: "fade",
					 width: "400px",
					 modal: false,
					 height: "auto",
					 resize: "auto",
					 resizable: false
				 });
			  $(".ui-dialog-titlebar").hide();				
				//end popup
		     /* xmpp initialization*/
		     xmppService.initializeXmpp(servername, user_id, xmpp_pass);
		     $scope.presence = xmppService.getPresence();
		     $scope.$on("update_presence", function(){
				$scope.presence = xmppService.getPresence();
				$scope.$apply();
		     });
		     /* end of xmpp */
			
			$scope.examinationQuestion = {};
			
			 var sentDataFlag = false;
			 
			$scope.textcomplaint = true;
			$scope.textdiagnosis = true;
			$scope.textfollowup = true;
			
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
				 var curr_tracker_id = $scope.tracker_info['current_tracker_id'];
				 $scope.current_tracker_data = ($scope.tracker_info['tracker_data'][curr_tracker_id]);
				 var headers = prepareHeaders($scope.current_tracker_data);
				 $scope.headers = headers; 
				 $scope.currentGrid = {
					 data: "current_tracker_data",
					 enableCellSelection: true,
					 headerRowHeight: 0,
					 columnDefs: "headers"
				 };
		     };

		     /* loading all the data */
		     var get_all_data = function(){
					patient_id = $scope.appointment_info.refappfromid_c;
					$.post("/ayushman/cconsultation/getpatientinfo", {data:patient_id}, 
						function(data){     
							$scope.patientinfo =  jQuery.parseJSON(data);
						}
					);
					$scope.getAllNotes();
					
					
					var doctor_id = $scope.appointment_info.doctorid;
					emrService.getMedicalProfile(patient_id)
						.then(function(data){
							$scope.emr_snapshot = data
					});
					emrService.getNotes(patient_id, doctor_id)
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
			
			appointmentService.getMyprofile()
				.then(function(data){
						$scope.myprofile = data;
			});	
				
			
		     appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
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
						get_all_data();
					}
			 });

		     $scope.$watch(function(){if($scope.tracker_info) return $scope.tracker_info["current_tracker_id"]}, function (newVal, oldVal) {
			 if(newVal)
			     prepare_tile_grid();
		     });
		     
		     $scope.new_risk = emrService.newRisk;
		     $scope.save_notes = emrService.saveNotes;
		     $scope.delete_risk = emrService.deleteRisk;
		     $scope.edit_risk = emrService.editRisk;
		     $scope.add_risk = emrService.addRisk;
		     /* end of loading all the data*/

		     /* code for displaying callouts */
		     $scope.visible = ""
			 
			 $scope.show_emr = function (id){
				 show_emr(id);
		     }
			 $scope.edit_emr = function (id){
				 edit_emr(id);
		     }
			 $scope.refresh = function (){
				}
			 $scope.cancel_appointment = function (id){
				// this function is placed in the /extra/dashboard.js
				 cancelappointment(id);
		     }
		     $scope.is_visible = function (name){
				 if(name == $scope.visible)
					 return true;
				 return false;
		     }
			
			 $scope.get_parameter_by_name = appointmentService.get_parameter_by_name;
		     $scope.show_nav_link = appointmentService.show_nav_link;
			 $scope.get_appointments = appointmentService.get_appointments;
			 
			 
		     /* end of code for displaying callouts */

		     $scope.endConsultation = function(){
				$scope.$broadcast('end_consultation');
		     }
			
		     $scope.viewSummary = function(){
				$scope.$broadcast('view_summary');
		     }
			
			 $scope.viewPrescription = function(){
				$scope.launchComplexModal();
				//openDialog('/ayushman/cconsultation/quickprescription?id='+$scope.appointment_info['appointment_id'],'37%',600);
		     }
			
		     /* logic for online consultation only */{
				 var sentDataFlag = false;
				 var sendDataTimer = 0;
				 var sendDataTimeout = function(){
					showMessage('600','150','Send Data','Unable to send data. Please try again or ask patient to click on GET DATA button.','error','continueConsult');
				 }

				 var sendDataToPatient = function(){
					 sentDataFlag = true;
					if($scope.appointment_info.mode=='Online'){
						 clearTimeout(sendDataTimer);
						 showNotification('400','70','','Sending Data To Patient...','timer','ltimernotification',15000);
						 sendDataTimer = setTimeout(sendDataTimeout,15000);
					}
					 prepareEmrForm();
					
					var changedQuestions = $scope.examination_data['changedQuestions'];
					
					 $.ajax({
						 type: "post",
						 url: "/ayushman/newcemrdashboard/saveAppointmentData",
						 data: $("#emrform").serialize(),
						 success:
						 function( data ){
						 if(data == 'success'){
							 sendMessage("Get Data");
						 }
						 else
							 alert('Please Try Again');
						 },
						 error:
						 function(){
							showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
						 },
					 });
				 }
				 $scope.$on('send_data', sendDataToPatient);
				 
				 var msgQ = new Array();
				 var sendMessage = function(message){
					 msgId = Math.floor((Math.random()*10000)+1);
					 msgQ[msgId] = message;
					 if(!$scope.onlineConn){
						 responseHandler("Failed",msgId);
					 }
					 else{
						 xmppService.mustSendMessage(message, $scope.appointment_info.refappfromid_c, msgId);
					 }
				 }
				
				 $scope.$on('response', function(){
					var response = xmppService.getResponse();
					responseHandler(response['val'], response['id']);
				 });
				  $scope.$on("prescriptionAccepted", function(){
					StopTheClock();
					transaction();
				 });
				 $scope.$on("prescriptionRejected", function(){
				 StopTheClock();
				 $('#notification').dialog('close');
				 str = 'The patient wants to continue the consultation.<br/><form><input type="radio" id="continue" name="closure" selected="true" value="graceful" checked="checked"/>I would like to continue consultation.<br /><input type="radio" id="endanyway" name="closure" value="forceful" />I would still like to End Consultation.<br/></form>'
				 showMessage('600','150','End Consultation',str,'choose','continueConsult');
				 });
				 var endconsultationTimer = 0;
				 $scope.finalizeConsultationEndFromPatient = function(){
					 clearTimeout(endconsultationTimer);
					 showNotification('400','70','','Notifying Patient...','timer','ltimernotification',15000);
					 endconsultationTimer = setTimeout("showMessage('600','150','End Consultation','Connection Error. Please Try Again.','error','continueConsult');",15000);
					 sendMessage("Ask for finalize permission");
				 }
				 function toggleStatus() {
					 showNotification('400','70','Send data','Patient is reviewing your Prescription. It may take up to one minute for patient to review and ask question if any.<br/><br/>','timer','timernotification',60000);
					 $('#message').dialog( "option", "position", "center" );
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
				 
				 
				 var sentDataFlag = false;
				 $scope.isVideo = false;
				 $scope.onlineConn = false;
				 $scope.sendData = function(){
					$scope.$broadcast('send_data');
				 }
				 var startVideo = function(){
					$scope.isVideo = true;
					$scope.showVideo = true;
					var video_src = window.location.protocol+"//"+window.location.hostname+":"+window.location.port+"/video/index.html?roleId=1&callId="+appointmentid+"&name="+doc_name;
					$('#videoframe').attr('src',video_src);
				 }
				 var connect = function(){
					if(!$scope.presence[$scope.appointment_info['refappfromid_c']] || $scope.presence[$scope.appointment_info['refappfromid_c']] == "offline"){
						alert('The call cannot be completed. Please try again.');
						return;
					}
					onlineApi
						.get({appid: appointmentid},
						function(data){
						
						});
				 }
			 }// end - logic for online consultation
			 
			 /*logic for ending consultation*/{
				$('.ui-multiselect-menu').hide();
				$scope.$on('end_consultation', function(){
					consultationMode = ($scope.appointment_info.mode).toLowerCase();
					payment_mode = ($scope.appointment_info.paid_c);
					if($scope.appointment_info.mode == 'Online'){
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
				});
			 }
			 
		     
		     $scope.openImageDialog = function(url, width, height){
				 $.fancybox.open({
					 href : url,
					 'width'		: width,
					 'height'		: height,
				 });
		     }
		     $scope.connect = connect;
		     var callingTimer = 0;
		     
		     /*start handling xmpp msgs*/
		     $scope.$on('Consult', function(){
				 $scope.onlineConn = true;
				 clearTimeout(callingTimer);
				 showNotification('400','70','','Patient has connected to consultation','timer','timernotification',5000);
				 startVideo();
		     });
		     $scope.$on('Aborted', function(){
				 $scope.isVideo = false;
				 $scope.onlineConn = false;
				 clearTimeout(callingTimer);
				 showNotification('400','70','','Patient has disconnected from consultation','timer','timernotification',5000);
		     });
		     $scope.$on('connecttocallrejected', function(){
				 clearTimeout(callingTimer);
				 showNotification('400','70','','Patient has rejected the call','timer','timernotification',5000);
		     });
		     $scope.$on('Wait', function(){
				 var msg_body = 'calling-'+appointmentid+'-'+user_id;
				 xmppService.sendMessage(msg_body,$scope.appointment_info.refappfromid_c);
				 clearTimeout(callingTimer);
				 showNotification('400','70','','Calling....','timer','callingNotification',60000);
				 callingTimer = setTimeout("showNotification('400','70','','Could not connect to patient','timer','timernotification',5000);",60000);
		     });
		     /*stop handling xmpp msgs*/

		     var create_tracker = function(template_id){
				 $scope.add_tracker_id = template_id;
				 $scope.$broadcast('add_tracker');
		     };
		     //$scope.create_tracker = create_tracker;

			 
		 }])
		 .factory('SampleFactory', function() {
		return {
			sample: function() {
				console.log('This is a sample');
			}
		};
	})
	.controller('ComplexModalController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService','$http',
		function($scope, appointmentService,dosageApi,formApi,emrService,examinationService,$http) {
			$scope.printgroups ={};
			$scope.actualdates={};
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
			
			$scope.immunizationgroup = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cimmunization/getimmunizationlist'
				}).success(function(data, status) {
					$scope.printgroups =(data);

					//$scope.$apply();
				});
			};
	$scope.immunizationgroup();
	
			$scope.calculateAge = calculate_age;
			appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
			});

			examinationService.getExaminationData(appointmentid).then(function(data){
				$scope.examination_data = data;
			});
			$scope.showoptions = function(){
				if($('#options').is(":visible") ){
					$('#options').stop().slideToggle(500);
					$('#hideoptions').hide();
					$('#showoptions').show();
				}else{
					$('#options').stop().slideToggle(500);
					$('#hideoptions').show();
					$('#showoptions').hide();
				}
		     }
			$scope.saveGender = function(gender){
				$scope.appointment_info.PatientGender = gender;
				emrService.saveGender($scope.appointment_info.refappfromid_c, gender);			
		     }

			 $scope.saveAge = function(){
					$scope.appointment_info.age =  $scope.calculateAge($('#txtage').val());
					emrService.saveAge($scope.appointment_info.refappfromid_c, $('#txtage').val());
					$scope.toggle('age');			
		     }
			 $scope.toggle = function(id){
				$("#"+id).stop().slideToggle(500);
		     }
			 
			appointmentService.getMyclinics()
				.then(function(data){
					$scope.myclinics = data;
			});
			var get_all_data = function(){
				var patient_id = $scope.appointment_info.refappfromid_c;
				var doctor_id = $scope.appointment_info.doctorid;
				emrService.getNotes(patient_id, doctor_id)
					.then(function(data){
						$scope.doctor_notes = data
				});
			};
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					$scope.displayimmunizationicon();
					$scope.datecharts= function(){
	$scope.dates={};	
	
  $scope.dob=new Date($scope.appointment_info.DOB);
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
  $scope.datecharts();
	
	$scope.getactualdates= function(){
				var patient_id = $scope.appointment_info.refappfromid_c;
				var httpRequest = $http({
					method: 'GET',
					url: '/ayushman/cpatienthistory/immunizationdates?patient_id='+patient_id
				}).success(function(data, status) {
					$scope.actualdates =(data);
					
					
					
				});
			};
			$scope.getactualdates();
					if($scope.appointment_info.appointment_id != null){
						get_all_data();
					}
			 });
			 
			 
			 
			 $scope.templatename = "";
			appointmentService.getPrescriptionTemplates()
				.then(function(data){
					$scope.prescriptiontemplates = data;
			});
			//$scope.examination_data = examinationService.getExaminationData(appointmentid);
			// For deleting prescription template
			$scope.deletePrescriptiontemplate = function(){
				if($scope.appointment_info.templatename =='' || $scope.appointment_info.templatename == undefined){
					alert('Please Enter Template Name');
				}else{
					$scope.$broadcast('delete_prescriptiontemplate',{name:$scope.appointment_info.templatename});
					$("#rightMenudelete").stop().slideToggle(500); 
				}
		     }
			 
			 $scope.savePrescriptiontemplate = function(){
				if($scope.appointment_info.templatename =='' || $scope.appointment_info.templatename == undefined){
					alert('Please Enter Template Name');
				}else{
					$scope.$broadcast('save_prescriptiontemplate',{name:$scope.appointment_info.templatename});
					$("#rightMenusave").stop().slideToggle(500); 
				}
		     }
			 $scope.loadPrescriptiontemplate = function(id){
				$scope.$broadcast('load_prescriptiontemplate',{id: id});
		     }
			  $scope.$on('save_prescriptiontemplate', function(event, args){
					jsonStr = readCookie('medicine');
					$('#medicine_ids').val(jsonStr);
					
					jsonStr = readCookie('investigation_text');
					$('#test_ids').val(jsonStr);
					
					jsonStr = readCookie('diagnosis_text');
					$('#diagnosis_text').val(jsonStr);
					
					jsonStr = readCookie('symptom_text');
					$('#text_complaint').val(jsonStr);
					
					jsonStr = readCookie('text_followup_note');
					$('#text_followup_note').val(jsonStr);
					
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
													$scope.$apply();
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
													$scope.$apply();
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
			 $scope.$on('load_prescriptiontemplate', function(event,args){
					$('input[name=appid]').val($scope.appointment_info.appointment_id);
					$.ajax({
						type: "post",
						url: "/ayushman/newcemrdashboard/loadPrescriptionTemplate?id="+args.id,
						data: $("#emrform").serialize(),
						success:
								function( data ){
									data = JSON.parse(data);
									document.cookie = 'symptom_text='+data['symptoms_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'diagnosis_text='+data['diagnosis_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'investigation_text='+data['investigations_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'text_followup_note='+data['followupadvice_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'medicine='+data['medicines_c']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									loadScripts();
									if(readCookie('text_followup_note') != undefined)
										$scope.examination_data.text_followup = readCookie('text_followup_note');
									if(readCookie('symptom_text') != undefined)
										$scope.examination_data.text_complaint = readCookie('symptom_text');
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
							  alert(data['value']);
						  else{
							  var form = new formmodule();
							  $scope.examination_data['forms'][formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
								
							  form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value']);
						 		validation($('#vitals_q_2'),'numeric');
								console.log("Validating BP");
								validation($('#vitals_q_8'),'bp');	
								validation($('#vitals_q_1'),'numeric');
								validation($('#vitals_q_21'),'numeric');

						  }
						  });
				 }
		     }
		}
	]).controller('PrintablePrescriptionController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService',
		function($scope, appointmentService,dosageApi,formApi,emrService,examinationService) {
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
			
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
			 });
			if(typeof appointment_data == 'undefined'){
				examinationService.getExaminationData(appointmentid).then(function(data){
					$scope.examination_data = data;
			});
			}else{
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
			
		}
	]).controller('PrintableBillController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService',
		function($scope, appointmentService,dosageApi,formApi,emrService,examinationService) {
			appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
			});
			examinationService.getExaminationData(appointmentid).then(function(data){
					$scope.examination_data = data;
			});
			
			if (typeof examination_data != "undefined")
			{
				console.log(examination_data);
				$scope.examination_data.display_savebutton=true;
			}
				$scope.calculateAge = calculate_age;
			$scope.$on('save_bill', function(event, args){
				$('input[name=appid]').val($scope.appointment_info.appointment_id);
				$.ajax({
					type: "post",
					url: "/ayushman/cbill/save2",
					data: $("#billform").serialize(),
					async: false,
					success:
							function( data ){
								 appointmentService.getAppointmentData(appointmentid)
									.then(function(data){
										$scope.appointment_info = data;
										$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
										$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
										$scope.$apply();
								 });
					},
					error:
							function(){
								showMessage('250','50','Send Data to patient','Error occured while saving bill. Please contact your system administrator.','error','id');
					},
				});
			 });
			 $scope.savebill = function(){
				$scope.$broadcast('save_bill');
		     }
			appointmentService.getMyclinics()
				.then(function(data){
					$scope.myclinics = data;
			});
			
			
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=$scope.appointment_info.amount;
					if($scope.examination_data.display_savebutton){
						$scope.billdate=$scope.appointment_info.DateAndTime;
					}
					$scope.billdetail.patrelative=$scope.appointment_info.Patientname;
			 });
			$scope.billdetail={};
			$scope.billdetail.injection='';
			$scope.billdetail.dressing='';
			$scope.billdetail.labtest='';
			$scope.billdetail.reconsultation='';
			$scope.billdetail.visit='';
			$scope.billdetail.ecg='';
			$scope.billdetail.misc='';
			$scope.billdetail.treatmentfrom='';
			$scope.billdetail.treatmentto='';
			
			$scope.addtototalbill = function(){
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
					$scope.appointment_info.totalsum=Math.round(Number($scope.appointment_info.consultationfee)+Number($scope.billdetail.injection)+Number($scope.billdetail.dressing)+Number($scope.billdetail.labtest)+Number($scope.billdetail.reconsultation)+Number($scope.billdetail.visit)+Number($scope.billdetail.ecg)+Number($scope.billdetail.misc));
					$scope.appointment_info.amountinwords = inWords($scope.appointment_info.totalsum);
					$scope.appointment_info.amount=$scope.appointment_info.totalsum;
			 });

			}
			
			$scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
		}
	])
	.directive('datepickercertificate', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "c-100:c+100",maxDate: '0',changeYear: true,changeMonth: true,  dateFormat: 'dd M yy',
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
				
			});
		}
	}
})		 

	.directive('reports',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/reports.html'
	};
}).directive('immunizations',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/immunizationselector.html'
	};
}).directive('immunizationPrint',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/printableimmunizationform.html'
	};
});

	function readCookie(name) {
		var nameEQ = name + "="; 
		var ca = document.cookie.split(';'); 
		for(var i=0;i < ca.length;i++) { 
			var c = ca[i]; 
			while (c.charAt(0)==' ') c = c.substring(1,c.length); 
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); 
		} 
		return undefined; 
	}
	function inWords (num) {
    	var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
		var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    	if ((num = num.toString()).length > 9) return 'overflow';
	    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    	if (!n) return; var str = '';
	    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
 	   str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
 	   str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
 	   str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
 	   return str;
	}
	
	function AutosaveConsultationData(){
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
    $.ajax({
		type: "post",
		url: "/ayushman/newcemrdashboard/AutosaveConsultationData",
		data: $("#emrform").serialize(),
		success:function( data ){
			if(data != 'error'){
				
			}
			else{
				
				alert('Failed to save consultation data.');
			}
			$("body").css("cursor", "default");
		},
		error:function(){
			showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
		},
    });
}

function getAutoPopulatedMedicines(appointmentid){ 
    //alert('call');
    $.ajax({ 
	url: "/ayushman/newcemrdashboard/getCurrentMedicines?appid="+appointmentid,
	success: function(jsonPastMedicines) {
	    if(jsonPastMedicines == 'no past data'){
			fragments = new Array();
	    }
	    else{
			document.cookie = 'medicine='+jsonPastMedicines+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			//loadScripts();
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
var QueryString = function () {
  // This function is anonymous, is executed immediately and 
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
	 return query_string;
}();