angular.module('app.controllers') 
.controller('printablePrescriptionCtrl', ['$scope', '$routeParams', 'dashboardService', 'appointmentService','dosageApi','formApi','emrService','examinationService',
		function($scope, $routeParams, dashboardService, appointmentService,dosageApi,formApi,emrService,examinationService) {
			var patient_id = $routeParams.patient_id;
			console.log( patient_id);
			if(patient_id == undefined){
			var patient_id = dashboardService.getpatid();			
			console.log( patient_id);
			
			}
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
			$scope.appointmentid = dashboardService.getpatid;
			
			$scope.products = dashboardService.getProducts();
			console.log($scope.products);
			$scope.checkstatusRisk = $scope.products[0];
			$scope.checkstatusAllergies = $scope.products[1];
			$scope.checkstatusSymtom = $scope.products[2];
			$scope.checkstatusTest = $scope.products[3];
			$scope.checkstatusExamination = $scope.products[4];
			$scope.checkstatusDiagnosis = $scope.products[5];
			
			
			
				$scope.calculateAge = calculate_age;
			appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
			});

			appointmentService.getMyclinics()
				.then(function(data){
					console.log(data);
					$scope.myclinics = data;
			});
			console.log(user_id);
			 appointmentService.getAppointmentData($scope.appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.refappfromid_c = patient_id;
					console.log(data);
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					// appointment_info.DateAndTime is set to display_c date while fetching data
					//appointment_info.DateAndTime = should be set to current date time
					// for new prescription
					//$scope.appointment_info.DateAndTime = new Date();
			 });
			 console.log($scope.examination_data);
			if(typeof appointment_data == 'undefined'){
				examinationService.getExaminationData($scope.appointmentid).then(function(data){
					$scope.examination_data = data;
					console.log($scope.examination_data);
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
])