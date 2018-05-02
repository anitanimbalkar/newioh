angular.module('app.controllers').controller('viewPrescriptionCtrl',['$scope','$fileUploader','$http','formApi','createDialog','emrService',function($scope,$fileUploader, $http,formApi,createDialogService,emrService){
	$scope.gotvisits = false;
	//Fetching Visit Data
	$scope.getvisitdata=function(){
		alert("12345");
	}
	$scope.pdfFlag = false;

	console.log("PastVisitCtrl");
	emrService.getPastAllPatientData()
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
			resize(5*300);
		});
		var show_more_visits = function(){
		$pageLength = $scope.pastAllData['page'].length;
		for(i = $scope.pastAllData['page'].length;i < $scope.pastAllData['data'].length && i < ($pageLength + 5);i++){
			$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
		}
		//$scope.j=$scope.j+1500;
		resize(i*300);
	};
	$scope.showMoreVisits = show_more_visits;
	var show_less_visits = function(){
		console.log("Painting Screen");
		$scope.pastAllData['page'] = [];
		for(i=0;i<$scope.pastAllData['data'].length && i < 5;i++){
			$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
		}
		resize(i*300);
	};
	$scope.showLessVisits = show_less_visits;
	
	var show_all_visits = function(){
		for(i = 0;i < $scope.pastAllData['data'].length;i++){
			$scope.pastAllData['page'][i] = $scope.pastAllData['data'][i];
		resize(i*300);
		}
	};
	$scope.showAllVisits = show_all_visits;
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
	var show_summary_nfs = function(app_id){
		url = '/ayushman/cdisplayprescriptions/view?appid='+app_id;
		width = 980;
		height = 200;
		$scope.openDialog(url, width, height);
	};
	$scope.show_summary_nfs = show_summary_nfs;
	
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
					controller: 'PreviousPrescriptionController',
					css:{padding: '18px',width:'700px'},
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
	$scope.show_summary_fs = show_summary_fs;
	
	var deleteRecord = function(app_id,index){
		$.ajax({
			type: "get",
			url: "/ayushman/newcemrdashboard/deleteUploadedPres?appid="+app_id,
			success:
				function( data ){
					showNotification('300','20','Delete','Record Deleted successfully','notification','timernotification',3000);					
					$scope.pastAllData['data'][index]['recordstatus']="deleted";     
					//$scope.showLessVisits();				
				},
			error:
				function(){
					showMessage('250','50','Error occured while deleting record. Please contact your system administrator.','error','id');	
				},
			 });
	};
	$scope.deleteRecord = deleteRecord;

	var editIncidence = function(id){
		$("#INC"+id).stop().slideToggle(500);
		}
	$scope.editIncidence = editIncidence;
	
	var saveIncidentinPres = function(appid,index){
		var incidenceValue = $("#"+"incident"+appid).val();
		console.log(incidenceValue);
		$.ajax({
			type: "get",
			url: "/ayushman/newcemrdashboard/saveIncidencePresc?appid="+appid+"&incidence="+incidenceValue,
			success:
			function( data ){
				showNotification('300','20','Update','Incidence updated','notification','timernotification',3000);					
				console.log($scope.pastAllData['data'][index]);
				$scope.pastAllData['data'][index]['incidentname']= incidenceValue;  						
				//$scope.showLessVisits();				
				$("#INC"+appid).stop().slideToggle(500);
			},
			error:
			function(){
				showMessage('250','50','Error occured while updating record. Please contact your system administrator.','error','id');	
					},
			 });		
		};
	$scope.saveIncidentinPres = saveIncidentinPres;
	
}]).controller('PreviousPrescriptionController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService',
function($scope, appointmentService,dosageApi,formApi,emrService,examinationService) {
	
	
	appointmentid = appointment_data.id;
	var calculate_age = function(bdate){
		var dob = new Date(bdate);
		var today = new Date();
		
		var age = today.getFullYear() - dob.getFullYear();
		
		
		var diff = Math.floor(today.getTime() - dob.getTime());
		var day = 1000 * 60 * 60 * 24;

		var days = Math.floor(diff/day);
		var months = Math.floor(days/31);
		var years = Math.floor(months/12);
		
		months = months - (years * 12);

		if(years == 0 && months == 0){
			age = 'Age < 1 month';
		}else if(years > 10){
			age = years + ' Yrs.';
		}else if(years == 0 && months < 12){
			age = months +" Months";
		}else{
			age = years + ' Yrs. '+ months +" Months";
		}
		return age;
	}
	$scope.calculateAge = calculate_age;
	appointmentService.getDocprofile(appointmentid)
	.then(function(data){
		$scope.myprofile = data;
		
		appointmentService.getMyclinics($scope.myprofile.userinfo.id)
		.then(function(data){
			$scope.myclinics = data;
		});
	});
	
	
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
]).directive('pastVisits',function() {
	return {
templateUrl: '/ayushman/assets/app/partials/pastvisits.html'
	};
});