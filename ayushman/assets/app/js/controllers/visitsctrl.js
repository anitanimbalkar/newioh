angular.module('app.controllers').controller('visitsCtrl',
['$scope','$http', 'emrService','dashboardService', 'createDialog','$http','$routeParams',
function($scope,$http, emrService,dashboardService, createDialogService,$http,$routeParams) {
	var patient_id = $routeParams.patient_id;
	console.log(patient_id);
	$scope.selectnetwork;
	if(patient_id == undefined){
		patient_id = $('#patient_id').val();
	}
	if(patient_id == undefined){
			patient_id = dashboardService.getpatid();
				console.log(patient_id);
		}
	// Flag is set to false when only visits are displayed
	// when displaying from EMR this flag has to be true
	if ($('#pdfFlag').val()== "false")
		$scope.pdfFlag = false;
	else
		$scope.pdfFlag = true;
			
	$scope.gotvisits = false;
	$scope.keys = function(obj){
		return obj? Object.keys(obj) : [];
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
	var get_data = function(){
		emrService.getPastAllPatientData(patient_id)
		.then(function(data){
			$scope.pastAllData = data;
			console.log($scope.pastAllData);
			$scope.network=$scope.pastAllData['network'];

			$scope.selectnetwork='';
			if($scope.network != undefined)
				$scope.selectnetwork=$scope.network[0];
			
			$scope.pastAllData['page'] = [];
			if($scope.pastAllData['data'] != undefined){
				for(i=0;i<$scope.pastAllData['data'].length;i++){
					if($scope.pastAllData['data'][i].examination != null){
						if((typeof $scope.pastAllData['data'][i].examination != 'object'))
						{
							//$scope.pastAllData['data'][i].examination = $scope.pastAllData['data'][i].examination;
							//console.log("A"+$scope.pastAllData['data'][i].examination+"A" );
							if(($scope.pastAllData['data'][i].examination!=undefined) && ($scope.pastAllData['data'][i].examination!=null) && ($scope.pastAllData['data'][i].examination!=""))
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
	};
	
	$scope.getData = get_data;
	$scope.getData();
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
	
	$scope.toggle = function(id,index,message){
		$("#"+id).stop().slideToggle(500);
		//$scope.pastAllData['page'][index]['replyto']=message.name;
		if(message!=''){
//			$scope.selectnetwork.id=message.senderid;
		}
	}
	//---------------------------------------------------//
	// Function for filtering data 						 //
	$scope.filterEMRdata = function(doctorname,incidentname,symptoms,diagnosis,investigation,medicine,fromdatevalue,todatevalue){
	var fdate = new Date(fromdatevalue);
	var tdate = new Date(todatevalue);
	for(var i=0; i<$scope.pastAllData['data'].length;i++)
	{
		var checkboxname = $scope.pastAllData['data'][i].id +"check";
		var element =  document.getElementById(checkboxname);
		if ((doctorname=="") &&(incidentname=="")
			&&(symptoms=="") &&(diagnosis=="")
			&&(investigation=="") &&(medicine=="")
			&&(fromdatevalue=="") &&(todatevalue==""))
		{
			// If no filters entered then check whether  
			// check boxes are checked
			if (typeof(element) != 'undefined' && element != null)			
			{
				if(document.getElementById(checkboxname).checked)
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			else
				$scope.pastAllData['data'][i].display = "no";			
		}
		else
		{
			if($scope.pastAllData['data'][i].recordstatus != "completed")
				$scope.pastAllData['data'][i].display = "no";
			else
				$scope.pastAllData['data'][i].display = "yes";
			
			if ((doctorname!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				// Filter according to doctor name				
				if($scope.pastAllData['data'][i].doctorname)
				{
					if (((($scope.pastAllData['data'][i].doctorname).toUpperCase()).includes(doctorname.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
					else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			if((incidentname!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				if($scope.pastAllData['data'][i].incidentname)
				{
				if (((($scope.pastAllData['data'][i].incidentname).toUpperCase()).includes(incidentname.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			if((symptoms!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				if($scope.pastAllData['data'][i].maincomplaint)
				{
				if (((($scope.pastAllData['data'][i].maincomplaint).toUpperCase()).includes(symptoms.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			if((diagnosis!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				if($scope.pastAllData['data'][i].diagnosis)
				{
				if (((($scope.pastAllData['data'][i].diagnosis).toUpperCase()).includes(diagnosis.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			if((investigation!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				if($scope.pastAllData['data'][i].investigation)
				{
				if (((($scope.pastAllData['data'][i].investigation).toUpperCase()).includes(investigation.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			if((medicine!="") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				if($scope.pastAllData['data'][i].medicine)
				{
				if (((($scope.pastAllData['data'][i].medicine).toUpperCase()).includes(medicine.toUpperCase())))
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}			
			if((fromdatevalue != "") && (todatevalue != "") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				// If both dates entered then check whether consultation date
				// within date range
				if($scope.pastAllData['data'][i].date)
				{
					var consdate =  new Date($scope.pastAllData['data'][i].date);
					if ((fdate <= consdate) && (consdate <= tdate))
						$scope.pastAllData['data'][i].display = "yes";
					else
						$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			else if((fromdatevalue != "") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				// If only from date entered 
				// then compare value greater than from date
				if($scope.pastAllData['data'][i].date)
				{
					var consdate =  new Date($scope.pastAllData['data'][i].date);
					if (fdate <= consdate)
						$scope.pastAllData['data'][i].display = "yes";
					else
						$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}
			else if((todatevalue != "") && ($scope.pastAllData['data'][i].display == "yes"))
			{
				// If only to date entered 
				// then compare value less than to date 
				if($scope.pastAllData['data'][i].date)
				{
					var consdate =  new Date($scope.pastAllData['data'][i].date);
					if (consdate <= tdate)
						$scope.pastAllData['data'][i].display = "yes";
					else
						$scope.pastAllData['data'][i].display = "no";
				}
				else
					$scope.pastAllData['data'][i].display = "no";
			}

			// If element on screen and check whether it is unchecked
			if ((typeof(element) != 'undefined' && element != null)
				&& ($scope.pastAllData['data'][i].display == "yes"))			
			{
				if(document.getElementById(checkboxname).checked)
					$scope.pastAllData['data'][i].display = "yes";
				else
					$scope.pastAllData['data'][i].display = "no";
			}			
		}
	}//For Loop
		$scope.showAllVisits();
	}
	//-------------------------------------------------
	// Function for clearing filter					 //
	$scope.clearfilterEMRdata = function(){
		$scope.showLessVisits();
		for(var i=0; i<$scope.pastAllData['data'].length;i++)
		{
			$scope.pastAllData['data'][i].display = "yes";
			var checkboxname = $scope.pastAllData['data'][i].id +"check";
			var element =  document.getElementById(checkboxname);
			if (typeof(element) != 'undefined' && element != null)			
			{
				console.log(checkboxname);
				document.getElementById(checkboxname).checked = true;
			}
		}
	}
	//--------------------------------------------------
	// Function for saving edited Consultation record //
		var saveEditedConsult = function(appid,index){
		var incidenceValue = $("#"+"inci"+appid).val();
		var investigationValue = $("#"+"investigation"+appid).val();
		var symptomsValue = $("#"+"symptoms"+appid).val();
		var medicinesValue = $("#"+"medicines"+appid).val();
		var diagnosisValue = $("#"+"diagnosis"+appid).val();
		var text_reportparameterValue = $("#"+"text_reportparameter"+appid).val();
		var followupValue = $("#"+"followup"+appid).val();
		var examinationsummaryValue = $("#"+"examinationsummary"+appid).val();

		// Find index from appid
		for(var i=0; i<$scope.pastAllData['data'].length;i++)
		{
			if ($scope.pastAllData['data'][i].id == appid)
			{
				index = i;    
				i = $scope.pastAllData['data'].length;
				// record found so break loop
			}
		}
		if($scope.pastAllData['data'][index].examination != null)
		{
			if (typeof $scope.pastAllData['data'][index].examination.vitals != "undefined")
			{
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_21 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_21.a = $("#vitals_q_21"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_8 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_8.a = $("#vitals_q_8"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_2 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_2.a = $("#vitals_q_2"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_1 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_1.a = $("#vitals_q_1"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_41 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_41.a = $("#vitals_q_41"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_3 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_3.a = $("#vitals_q_3"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_42 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_42.a = $("#vitals_q_42"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_43 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_43.a = $("#vitals_q_43"+appid).val();
				if (typeof $scope.pastAllData['data'][index].examination.vitals.vitals_q_11 != "undefined")
					$scope.pastAllData['data'][index].examination.vitals.vitals_q_11.a = $("#vitals_q_11"+appid).val();				
				
				var examinationValue = JSON.stringify($scope.pastAllData['data'][index].examination);
			}
			else
				var examinationValue = null;
		}
		else
				var examinationValue = null;
		
		// Change values in array
		$scope.pastAllData['data'][index].incidentname = incidenceValue;
		$scope.pastAllData['data'][index].investigation = investigationValue;
		$scope.pastAllData['data'][index].maincomplaint = symptomsValue;
		$scope.pastAllData['data'][index].medicine = medicinesValue;
		$scope.pastAllData['data'][index].diagnosis = diagnosisValue;
		$scope.pastAllData['data'][index].text_reportparameter = text_reportparameterValue;
		$scope.pastAllData['data'][index].followup = followupValue;
		$scope.pastAllData['data'][index].examinationsummary = examinationsummaryValue;
		
		$.ajax({
			type: "get",
			url: "/ayushman/newcemrdashboard/saveConsultData?appid="+appid+"&incidence="+incidenceValue+"&investigation="+investigationValue
					+"&maincomplaint="+symptomsValue+"&medicine="+medicinesValue+"&diagnosis="+diagnosisValue
					+"&text_reportparameter="+text_reportparameterValue+"&followup="+followupValue
					+"&examinationsummary="+examinationsummaryValue+"&examination="+examinationValue,
			success:
			function( data ){
				showNotification('300','20','Update','Record updated','notification','timernotification',3000);					
				$("#EDIT"+appid).stop().slideToggle(500);
			},
			error:
			function(){
				showMessage('250','50','Error occured while updating record. Please contact your system administrator.','error','id');	
					},
			 });
		};
	$scope.saveEditedConsult = saveEditedConsult;	
	//--------------------------------------------------
	
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
	
	var deleteRecord = function(app_id,index){
		$.ajax({
			type: "get",
			url: "/ayushman/newcemrdashboard/deleteUploadedPres?appid="+app_id,
			success:
				function( data ){
					showNotification('300','20','Delete','Record Deleted successfully','notification','timernotification',3000);					
					//$scope.pastAllData['data'][index]['recordstatus']="deleted";     
					for(var i=0; i<$scope.pastAllData['data'].length;i++)
					{
						if ($scope.pastAllData['data'][i].id == app_id)
						{
							$scope.pastAllData['data'][i]['recordstatus']="deleted";    
							i = $scope.pastAllData['data'].length;
							// record found so break loop
						}
					}
				},
			error:
				function(){
					showMessage('250','50','Error occured while deleting record. Please contact your system administrator.','error','id');	
				},
			 });
	};
	$scope.deleteRecord = deleteRecord;

	var editRecord = function(id){
		$("#EDIT"+id).stop().slideToggle(500);
		}
	$scope.editRecord = editRecord;
	
	var editIncidence = function(id){
		$("#INC"+id).stop().slideToggle(500);
		}
	$scope.editIncidence = editIncidence;
	
	var saveIncidentinPres = function(appid,index){
		var incidenceValue = $("#"+"incident"+appid).val();
		
		$.ajax({
			type: "get",
			url: "/ayushman/newcemrdashboard/saveIncidencePresc?appid="+appid+"&incidence="+incidenceValue,
			success:
			function( data ){
				showNotification('300','20','Update','Incidence updated','notification','timernotification',3000);					
				//$scope.pastAllData['data'][index]['incidentname']= incidenceValue;  						
					for(var i=0; i<$scope.pastAllData['data'].length;i++)
					{
						if ($scope.pastAllData['data'][i].id == appid)
						{
							$scope.pastAllData['data'][i]['incidentname']= incidenceValue;  						
							i = $scope.pastAllData['data'].length;
							// record found so break loop
						}
					}
				$("#INC"+appid).stop().slideToggle(500);
			},
			error:
			function(){
				showMessage('250','50','Error occured while updating record. Please contact your system administrator.','error','id');	
					},
			 });		
		};
	$scope.saveIncidentinPres = saveIncidentinPres;
	
	$scope.changeTofield=function(selectednet,index){
		$scope.pastAllData['page'][index]['replyto']=selectednet.name;
		$scope.selectnetwork=selectednet;
	}
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
				// Why data was loaded again ?
				/*emrService.getPastAllPatientDataForcefully(patient_id)
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
				});*/
			}else{
				alert('Failed to send message.');
			}	
		});
	}
	$scope.sendMessage = send_message;
}])
.directive('pastVisits',function() {
	return {
		restrict:'E',
		scope:{
			patient_id:'@',
			pdf:'@'
		},
		templateUrl: '/ayushman/assets/app/partials/pastvisits.html',
		controller:'visitsCtrl'		
	};
})