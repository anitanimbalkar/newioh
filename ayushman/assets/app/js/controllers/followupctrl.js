angular.module('app.controllers')
    .controller('followupCtrl',
		['$scope','appointmentService','emrService','examinationService','createDialog',
			function($scope,appointmentService,emrService,examinationService,createDialogService) {
							$scope.keys = function(obj){
					  return obj? Object.keys(obj) : [];
					}
					appointmentService.getAppointmentData(appointmentid)
					.then(function(data){
						$scope.appointment_info = data;
						emrService.getPastAllPatientData($scope.appointment_info.refappfromid_c)
							.then(function(data){
								$scope.pastAllData = data;
								for(i=0;i<$scope.pastAllData['data'].length;i++){
									$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
								}
								$('#divprescription').focus();
								$scope.pastAllData['page'] = [];
								for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
									$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
								}
							});
							$scope.allincidencedata = true;
					});
					$scope.allincidencedata = false;
					$scope.refreshappointment = function(checkbox){
						if($scope.allincidencedata){
							emrService.getPastAllData(appointmentid)
							.then(function(data){
								$scope.pastAllData = data;
								for(i=0;i<$scope.pastAllData['data'].length;i++){
									$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
								}
								$scope.pastAllData['page'] = [];
								for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
									$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
								}
								$('#divprescription').focus();
							});	
							$scope.allincidencedata = false;
						}else{
							emrService.getPastAllPatientData($scope.appointment_info.refappfromid_c)
							.then(function(data){
								$scope.pastAllData = data;
								for(i=0;i<$scope.pastAllData['data'].length;i++){
									$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
								}
								$('#divprescription').focus();
								$scope.pastAllData['page'] = [];
								for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
									$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
								}
							});
							$scope.allincidencedata = true;
						}
					 };
					
					 $scope.toggle = function(id){
						$("#"+id).stop().slideToggle(500);
					 }
					$scope.examinationQuestion = '';
					if(readCookie('examinationQuestion') != ''){
						$scope.examinationQuestion = angular.fromJson(readCookie('examinationQuestion'));
					}
			
		     $scope.get_report_details = function(app_id, status){
			 	data = emrService.getPastReportDetails(app_id, status);
				console.log('report');
				console.log(data);
		     }


			}
		]
		);
