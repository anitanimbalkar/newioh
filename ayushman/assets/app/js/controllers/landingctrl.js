	angular.module('app.controllers')
    .controller('landingCtrl',
		['$scope','appointmentService','emrService','examinationService','createDialog',
			function($scope,appointmentService,emrService,examinationService,createDialogService) {
					
				 window.onbeforeunload = function (e) {
					if($scope.unsavedData){
						var e = e || window.event;
						var msg = "Data will be lost if you try reloading/leaving this page before 'End Consultation'";
						if (e) {
						 e.returnValue = msg;
						}
						else{
							return msg;
						}
					}
				};
					$scope.keys = function(obj){
					  return obj? Object.keys(obj) : [];
					}
					$scope.gotvisits = false;
					appointmentService.getAppointmentData(appointmentid)
					.then(function(data){
						$scope.appointment_info = data;
						emrService.getPastAllPatientData($scope.appointment_info.refappfromid_c)
							.then(function(data){
								$scope.pastAllData = data;
								if($scope.pastAllData['data'] != undefined){
									for(i=0;i<$scope.pastAllData['data'].length;i++){
										if(typeof $scope.pastAllData['data'][i].examination !='object'){
											$scope.pastAllData['data'][i].examination = JSON.parse($scope.pastAllData['data'][i].examination);
										}
									}
									$('#divprescription').focus();
									$scope.pastAllData['page'] = [];
									for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
										$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
									}
								}
								$scope.gotvisits = true;
							});
							$scope.allincidencedata = true;
							
							var patient_id = $scope.appointment_info.refappfromid_c;
							emrService.getMedicalProfile(patient_id)
								.then(function(data){
									$scope.emr_snapshot = data
							});
					});
			var show_more_visits = function(){
			$pageLength = $scope.pastAllData['page'].length;
			for(i = $scope.pastAllData['page'].length;i < $scope.pastAllData['data'].length && i < ($pageLength + 5);i++){
				$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
			}
			};
			$scope.showMoreVisits = show_more_visits;

				var show_less_visits = function(){
				$scope.pastAllData['page'] = [];
				for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
					$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
				}
				};
				$scope.showLessVisits = show_less_visits;
	
			var show_all_visits = function(){
			for(i = 0;i < $scope.pastAllData['data'].length;i++){
				$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
			}
			};
			$scope.showAllVisits = show_all_visits;

	$scope.show_summary = emrService.showSummary;
	$scope.show_report = emrService.showReport;
	$scope.pastReportDetails = emrService.pastReportDetails;
	$scope.reportDetails = emrService.reportDetails;		     
	var show_summary_nfs = function(app_id){
		url = '/ayushman/cdisplayprescriptions/view?appid='+app_id;
		width = 980;
		height = 600;
		$scope.openDialog(url, width, height);
	};
	var show_summary_fs = function(app_id){
		/* url = '/ayushman/cdisplayprescriptions/viewfromsystem?appid='+app_id;
				width = 980;
				height = 600;
				$scope.openDialog(url, width, height);
				*/
		$scope.appointmentid = app_id;
		appointmentid = app_id;
		for(var i=0; i<$scope.pastAllData['data'].length;i++){
			if($scope.pastAllData['data'][i].id == appointmentid){
				appointment_data = $scope.pastAllData['data'][i];
				createDialogService('/ayushman/assets/app/partials/previousprescription.html', {
					id: 'print',
					backdrop: true,
					controller: 'PrintablePrescriptionController',
					css:{padding: '18px',width:'540px'},
					cancel:{label: 'Cancel', fn: function() {
												//alert('cancelled');
						}
					},
					success: {label: 'Success', fn: function() {
							//alert('success');
						}}
				},{appointment_data:$scope.pastAllData['data'][i]});					
			}
		}
	};
	
	var show_report_lb_nfs = function(url){
		extension = url.split('.').pop();
		url = window.location.protocol+"//"+window.location.hostname+":"+window.location.port + '/' + url;
		if(extension == 'pdf')
		$scope.openDialog(url, 980, 600);
		else
		$scope.openImageDialog(url, 980, 600);
	}
	$scope.show_summary_nfs = show_summary_nfs;
	$scope.show_summary_fs = show_summary_fs;

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
			
			}
		]
	).directive('myShowcase', function() {
	return {
templateUrl: '/ayushman/assets/app/partials/showcase.html'
	};
});
