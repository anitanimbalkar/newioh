angular.module('app.controllers')
.controller('doctordashboardlandingCtrl',
		['$scope','$route','appointmentService','createDialog','dashboardService',
		 function($scope,$route,appointmentService,createDialogService,dashboardService) {
			
			 $scope.patientdata = new Array();
			 $scope.selectedappid = 0;
			 $scope.selectedpatientid = 0;
			 $scope.patientiddiagnosis = 0;
			 $scope.preselectedpatientid = 0 ;
			 $scope.selectedpatientidpast = 0;
			 $scope.preselectedpatientidpast = 0 ;
			 $scope.pastappointments = {};
			 $scope.patientidlist = new Array();
			 $scope.upappointments = new Array();
			 $scope.pastappointment = new Array();
			 $scope.gotvisits = false;
			 $scope.searchrecordstat = 1;
			 $scope.incompletrecordstat = 1;
			 $scope.pastrecordstat = 1;
			 $scope.upcomerecordstat = 1;
			
			appointmentService.getAppointments(user_id).then(function(data){	
			$scope.upcomerecordstat = 1;
			$scope.appointments = data;
			$scope.appointmen = $scope.appointments['apps'];
			$scope.count = $scope.appointmen.length;
				if($scope.appointments['apps'].length){
					$scope.appointments['page'] = [];
					for(i=0; i < $scope.count && i < 5;i++){
						$scope.upappointments[i] = $scope.appointmen[i];
					}
				}else{
					$scope.upcomerecordstat = 0;
				}
				if($scope.appointments['apps'].length < 1){
				//	showNotification('300','20',' Patient','<h5>No record(s) found </h5>','notification','timernotification',3000);
				}
				$scope.gotvisits = true;
			});
/*				appointmentService.getPastAppointments(user_id,5)
							.then(function(data){
							$scope.pastappointments = data.apps;
				});*/
			
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
			 		$scope.setbgcolor = function(divID) {
						$scope.id ;
						if($scope.id > 0)
						{
							var myEl = angular.element( document.querySelector( '#u'+$scope.id ) );
							myEl.css('background-color','#f2f2f2');  
						}						
						var myEl = angular.element( document.querySelector( '#u'+divID ) );
						myEl.css('background-color','rgba(255,165,0,0.20)');  
					$scope.id = divID;			
					} 
			
			 
			 appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
					$scope.userid=$scope.myprofile['userinfo'].id;
				});
//patient search			
			 $scope.searchp = function(pname){
				 
				  $scope.gotvisits = false;
				if(pname == ''){
								showNotification('300','20','please Enter Patient name','<h5>please Enter Patient name</h5>','notification','timernotification',3000);
								$scope.gotvisits = true;
					}else{
						$scope.name=pname;
						dashboardService.search_patient($scope.name).then(function(data){	
							$scope.patientdata = {};
							$scope.patientda=data;
							var count = $scope.patientda.name['length'];							
							if(count == 0){	
									$scope.searchrecordstat = 0;							
									showNotification('300','20','Patient','<h5>Record not found</h5>','notification','timernotification',3000);
									$scope.gotvisits = true;
							
							}else{
								$scope.searchrecordstat = 1;
								$scope.patientidlist = $scope.patientda['name'];
									$scope.patdataLength = $scope.patientidlist.length;
									for(i = 0;i < $scope.patdataLength && i < 5;i++){
											$scope.patientdata[i] = $scope.patientidlist[i];
										}
										$scope.gotvisits = true;
							}
						});						
					}
				}
			 
			/*$scope.searchp = function(pname){
				  $scope.name=pname;
					/*dashboardService.search_patient($scope.name).then(function(data){
					$scope.patientdata=data;
				});				
				
					$.ajax({
						type: "GET",
						url: "/ayushman/cconsultation/getpatient?pname="+$scope.name,						
						success:									
								function( data ){
									data = JSON.parse(data);
									$scope.patientidlist = data;
									$scope.patdataLength = $scope.patientidlist.length;
									for(i = 0;i < $scope.patdataLength && i < 5;i++){
											$scope.patientdata[i] = $scope.patientidlist[i];
										}
								},						
					});
			}*/
			
			var show_more_patient = function(){
				var pageLength = $scope.patientdata.length;
				for(i = pageLength;i < $scope.patdataLength && i < (pageLength + 5);i++){
					$scope.patientdata[i] = $scope.patientidlist[i];
				}
			};
			$scope.showMorepatient= show_more_patient;
			
			var show_less_patient = function(){
				$scope.patientdata = [];
				for(i = 0; i < $scope.patdataLength && i < 5 ; i++){
					$scope.patientdata[i] = $scope.patientidlist[i];
				}
			};
			$scope.showLesspatient = show_less_patient;
				
			var show_all_patient = function(){
				$scope.patientdata = [];
				for(i = 0;i < $scope.patdataLength;i++){
					$scope.patientdata[i] = $scope.patientidlist[i];
				}
			};
			$scope.showallpatient= show_all_patient;			 
			 
//	cancle appointment		 
				 $scope.cancel_appointment = function (id){
					 if(id < 1){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
				}else{
					 cancelappointment(id);
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
						$scope.fancyboxclosed();
					}
                });
				
		     }
			  $scope.fancyboxclosed = function ()
			{
				location.reload();				
			}	

					
//get upcomming appointment				
			$scope.getupcomingappointment = function(){	
				$scope.upappointments = {};
				$scope.selectedappid = 0;
				$scope.selectedpatientid = 0;
				$scope.patientiddiagnosis = 0;
				$scope.preselectedpatientid = 0 ;
				$scope.selectedpatientidpast = 0;
				$scope.preselectedpatientidpast = 0 ;
				$scope.gotvisits = true;
			    $scope.upcomerecordstat = 1;
				console.log("jdsfhjlfnlkas");
				appointmentService.getAppointments(user_id).then(function(data){	
				$scope.appointments = data;
				$scope.appointmen = $scope.appointments['apps'];
				$scope.count = $scope.appointmen.length;
					if($scope.appointments['apps'].length){
						$scope.appointments['page'] = [];
						for(i=0; i < $scope.count && i < 5;i++){
							if($scope.appointmen[i].Appointmentstatus == 'schedule')
								{
									$scope.upappointments[i] = $scope.appointmen[i];
								}
						}
					}else{
						console.log("jdsfhjlfnlkas");
			        $scope.upcomerecordstat = 0;
					$scope.gotvisits = false;
					}
				$scope.gotvisits = true;
			});
			}
	
///////////////show_medical_certificate

	var show_medical_certificate = function(patientid){
				dashboardService.addid(patientid);
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
		
	/////////	show_fitness_certificate
		var show_fitness_certificate = function(patientid){
			dashboardService.addid(patientid);
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

			var show_more_uppatient = function(){
				var pageLength = $scope.upappointments.length;
				for(i = pageLength;i < $scope.count && i < (pageLength + 5);i++){
					$scope.upappointments[i] = $scope.appointmen[i];;
				}
			};
			$scope.showMoreuppatient= show_more_uppatient;
			
			var show_less_uppatient = function(){
				$scope.upappointments = [];
				for(i = 0; i < $scope.count && i < 5 ; i++){
					$scope.upappointments[i] = $scope.appointmen[i];
				}
			};
			$scope.showLessuppatient = show_less_uppatient;
				
			var show_all_uppatient = function(){
				$scope.upappointments = [];
				for(i = 0;i < $scope.count;i++){
					$scope.upappointments[i] = $scope.appointmen[i];
				}
			};
			$scope.showalluppatient= show_all_uppatient;	
			
				
//get past appointment
/*
				$scope.getPastAppoitnments = function(){
				$scope.pastappointment = {};
				$scope.selectedappid = 0;
				$scope.selectedpatientid = 0;
				$scope.patientiddiagnosis = 0;
				$scope.preselectedpatientid = 0 ;
				$scope.selectedpatientidpast = 0;
				$scope.preselectedpatientidpast = 0 ;
				$scope.gotvisits = false;	
				$scope.patcount = $scope.pastappointments.length;
						for(i = 0; i < $scope.patcount && i < 5;i++){
								$scope.pastappointment[i] = $scope.pastappointments[i];
							}
							$scope.gotvisits = true;
					
				}			
				
				var show_more_pastpatient = function(){
				var pageLength = $scope.pastappointment.length;
				for(i = pageLength;i < $scope.patcount && i < (pageLength + 5);i++){
					$scope.pastappointment[i] = $scope.pastappointments[i];
				}
			};
			$scope.showMorepastpatient= show_more_pastpatient;
			
			var show_less_pastpatient = function(){
				$scope.pastappointment = [];
				for(i = 0; i < $scope.patcount && i < 5 ; i++){
					$scope.pastappointment[i] = $scope.pastappointments[i];
				}
			};
			$scope.showLesspastpatient = show_less_pastpatient;
				
			var show_all_pastpatient = function(){
				$scope.pastappointment = [];
				for(i = 0;i < $scope.patcount;i++){
					$scope.pastappointment[i] = $scope.pastappointments[i];
				}
			};
			$scope.showallpastpatient= show_all_pastpatient;
			 
*/
/// New PassData Reading for loading only 5 records

			$scope.loading=true;
		    $('.ui-multiselect-menu').hide();
			$scope.toggle = function(id){
				$("#"+id).stop().slideToggle(500);
		    }
				$scope.pastappointments = {};
				$scope.pastappointments['apps'] = {};

			$scope.getPastAppoitnments = function(count){
			
				$scope.pastrecordstat = 1;
				$scope.pastappointment = {};
				$scope.selectedappid = 0;
				$scope.selectedpatientid = 0;
				$scope.patientiddiagnosis = 0;
				$scope.preselectedpatientid = 0 ;
				$scope.selectedpatientidpast = 0;
				$scope.preselectedpatientidpast = 0 ;
				$scope.gotvisits = false;
				
				
				if($scope.pastappointments['apps'].length == undefined){
					count = 5;
				}else{
					count = ($scope.pastappointments['apps'].length - 1) + count;
				}
				appointmentService.getPastAppointments(user_id, count)
					.then(function(data){
						$scope.pastappointments = data;
						$scope.patcount = $scope.pastappointments['appscount']['count'];
				
						if(($scope.pastappointments['apps'].length)){
							$scope.pastappointments['page'] = [];
							for(i=0;i<($scope.pastappointments['apps'].length - 1);i++){
								$scope.pastappointments['page'][i] = $scope.pastappointments['apps'][i];
							}
							$scope.gotvisits = true;
						}else{
							 $scope.pastrecordstat = 0;
						}
						
				});
			};
			
			$scope.getPastAppoitnments();
			
		var show_more_pastpatient = function(){
			$scope.getPastAppoitnments(5);
			
		};
		$scope.showMorepastpatient = show_more_pastpatient;
		var show_less_pastpatient = function(){
			$scope.pastappointments['page'] = [];
			for(i=0;i<$scope.pastappointments['apps'].length && i < 5;i++){
				$scope.pastappointments['page'][i] = $scope.pastappointments['apps'][i];
			}
		};
		$scope.showLesspastpatient = show_less_pastpatient;
			
		
		var show_all_pastpatient = function(){
			$scope.getPastAppoitnments(1000);
		};
		$scope.showallpastpatient= show_all_pastpatient;
		
/// Past data loading
		
//get incomplete consultation

			$scope.incompleteconsultation = function(){
				$scope.inappointments = {};
				 $scope.selectedappid = 0;
				 $scope.selectedpatientid = 0;
				 $scope.patientiddiagnosis = 0;
				 $scope.preselectedpatientid = 0 ;
				 $scope.selectedpatientidpast = 0;
				 $scope.preselectedpatientidpast = 0 ;
					$scope.gotvisits = false;
					$scope.incompletrecordstat = 1;			 
					
			appointmentService.getincompleteAppointments(user_id).then(function(data){	
				$scope.inappointments = data;
				console.log(data);
					if($scope.inappointments['apps'].length){
						$scope.inappointments['page'] = [];
						for(i=0;i<$scope.inappointments['apps'].length && i < 5;i++){
							$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
						}
					}else{
						$scope.incompletrecordstat = 0;
					}
					$scope.gotvisits = true;
				});
			}
			/*---------------------------------------------------------------*/
			/*---------Redefined for Incomplete Transactions-----------------*/
			var show_more_visits_incomp = function(){
				$pageLength = $scope.inappointments['page'].length;
				for(i = $scope.inappointments['page'].length;i < $scope.inappointments['apps'].length && i < ($pageLength + 5);i++){
					$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
				}
			};
			$scope.showMoreVisitsInc = show_more_visits_incomp;
			var show_less_visits_incomp = function(){
				$scope.inappointments['page'] = [];
				for(i=0;i<$scope.inappointments['apps'].length && i < 5;i++){
					$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
				}
			};
			
			$scope.showLessVisitsInc = show_less_visits_incomp;
			var show_all_visits_incomp = function(){
				for(i = 0;i < $scope.inappointments['apps'].length;i++){
					$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
				}
			};
			$scope.showAllVisitsInc = show_all_visits_incomp;

			/*---------------------------------------------------------------*/
			  
			  $scope.getid = function(patientid)
			  {
				  $scope.preselectedpatientid = $scope.selectedpatientid;
				   $scope.selectedpatientid = patientid;
				   console.log($scope.selectedpatientid);
			 }
			
			  $scope.getidpast = function(patientid,appid,diagnosis,billgerated,pdf)
			  {
					$scope.billgenetated = billgerated;
					$scope.pdffile = pdf;
				    $scope.selectedpatientid = patientid;
				    $scope.preselectedpatientidpast = $scope.selectedpatientidpast;
				    $scope.selectedpatientidpast = appid;
				    $scope.patientiddiagnosis = diagnosis;

					$scope.namefile	= pdf;
				    $scope.gotvisits = true;
					if ($scope.billgenetated == "yes")
					{
						$("#generatebill").hide();
						$("#printbill").show();
					}
					else
					{
						$("#generatebill").show();
						$("#printbill").hide();						
					}
					/*	$scope.patcount = $scope.pastappointments.length;
						for(i = 0; i < $scope.patcount ;i++){
								if($scope.selectedpatientidpast == $scope.pastappointments[i].appointment_id ){
										$scope.biiprint = $scope.pastappointments[i].billGenerated;
										$scope.namefile	= $scope.pastappointments[i].pdffilename;
										console.log($scope.biiprint);
										
								}
							}
						$scope.gotvisits = true;*/
			 }
			  $scope.getappid = function(patientid,appid)
			 {
				 console.log(patientid);
				 console.log(appid);
				  $scope.preselectedpatientid = $scope.selectedpatientid;
				  $scope.selectedpatientid = patientid;
				  $scope.preselectedappid = $scope.selectedpatientidpast;
				  $scope.selectedpatientidpast = appid; 
				}
			  $scope.launemr = function(patientid) {
				  
				  if(patientid == 0)
				  {
					  		showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
			 }else{
				  dashboardService.addid(patientid);
				  	createDialogService('/ayushman/assets/app/partials/patientemr.html', {
						id: 'Report',
						backdrop: true,
						controller: 'emrCtrl',
						css:{padding: '18px',width:'950px', height:'600px,'},
						cancel:{label: 'Cancel', fn: function() {
						}
						},
						success: {label: 'Success', fn: function() {
						}}
					});
				  }
				};
	
//launcl bill	
		$scope.launchPrintableBill = function(app_id,diagnosis,option,isbillgenerate) {
				if(app_id == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
				}else{
					appointment_id=app_id;
					appointment_diagnosis=diagnosis;
					bill_option=option;
					billgenerate=isbillgenerate;
					createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
					  id: 'bill',
					  backdrop: true,
					  controller: 'pastbilldataCtrl',
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
				}
	};
	
	
/*	$scope.printoldbill = function(app_id,diagnosis,option,isbillgenerate) {
	appointment_id=app_id;
	appointment_diagnosis=diagnosis;
	bill_option=option;
	billgenerate=isbillgenerate;
	
	//appointment_transactionid=transactionid;
	createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
		  id: 'bill',
		  backdrop: true,
		  controller: 'pastbilldataCtrl',
				  css:{padding: '18px',width:'650px'},
				  cancel:{label: 'Cancel', fn: function() {
						//$scope.$broadcast('save_bill');
						//window.location="/ayushman/cdashboard/view";
					}
				},
				  success: {label: 'Success', fn: function() {
						//$scope.$broadcast('save_bill');
						//$scope.launchPrintablePrescription();
				  }}
				},{appointment_id:app_id,appointment_diagnosis:diagnosis,bill_option:option,billgenerate:isbillgenerate});
	};
*/
//launch book appointment
	$scope.launchbookappointment = function(patient_id) {
				if(patient_id == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
				}else{
					createDialogService('/ayushman/assets/app/partials/bookappoint.html', {
					  id: 'complexDialog',
					  backdrop: true,
					  controller: 'bookingappointmentCtrl',
					  css:{padding: '18px',width:'800px'},
					  cancel:{label: 'Cancel', fn: function() {
								
							}
						},
					  success: {label: 'Success', fn: function() {
							//$scope.getAllNotes();
							
					  }}
					},{patientid:patient_id});
				}
				};
//connect incomplete consultation
		$scope.connetoincompleteclick = function(pid,patappid,quick) 
		{
			var id=pid;
			var patappid = patappid;
			if(patappid == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
			}else{
		
				if(quick == 1){
		
						window.location="/ayushman/cadhocappointmentmanger/connectincompleteconsultation?patientuserid="+ id +"&patientappid="+ patappid +"&newIncidence="+'true'+"&incidence="+''+"&quick="+quick;
				}
			}
		}
//connet consultation with create appointment
			  			  
		$scope.connetonclick = function(pid,quick)
		{
			var id=pid;
			if(id == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
			}else{
		
				if(quick == 1){
		
						window.location="/ayushman/cadhocappointmentmanger/connectnewinclinc?patientuserid="+ id +"&newIncidence="+'true'+"&incidence="+''+"&quick="+quick;
				}
			}
		}
			 $scope.createAppointment = function(){
			 //$scope.patid = 3080;
				$.ajax({
						type: "GET",
						url: "/ayushman/cadhocappointmentmanger/connectinclinc?pId="+$scope.patid,						
						success:							
								function( data ){
									data = JSON.parse(data);
									$scope.patientdata = data;							
									},
					});
			  }
			  
			  
			  $scope.startconsultation = function(userid){
				connectnowclick(userid,1);
			}
			  
			   $scope.launch_consultation_app = function(id,isQuick,profileid){
				if(profileid == undefined){
					profileid = '';
				}
				
				if(isQuick == 1){
					doctorfirstname = 'doctor'
					window.location ="/ayushman/cconsultation/view?appid="+id+"&role=doc&name=Dr."+doctorfirstname+"&quick=1&p="+profileid;
				}else{
					doctorfirstname = 'doctor'
					window.location ="/ayushman/cconsultation/view?appid="+id+"&role=doc&name=Dr."+doctorfirstname+"&quick=0&p="+profileid;
				}
				
			 }
			 
 //print past prescription
			var show_summary_nfs = function(app_id){
		url = '/ayushman/cdisplayprescriptions/view?appid='+app_id;
		width = 980;
		height = 600;
		$scope.openDialog(url, width, height);
	};

	
	//call launchMedicalCertificate		
				$scope.launchMedicalCertificate = function(patientid) {
					if(patientid == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
					}else{
						dashboardService.addid(patientid);
						createDialogService('/ayushman/assets/app/partials/medicalcertificate.html', {
							id: 'bill',
							backdrop: true,
							controller: 'printablePrescriptionCtrl',
							css:{padding: '18px',width:'650px'},
							cancel:{label: 'Cancel', fn: function() {
								//$scope.launchPrintablePrescription();
							}
							},
							success: {label: 'Success', fn: function() {
								//$scope.launchPrintablePrescription();
							}}
						});
					}
				};
				
				
		//call launchFitnessCertificate
				$scope.launchFitnessCertificate = function(patientid) {
					if(patientid == 0){
					showNotification('300','20','Select Patient','<h5>Please Select Patient</h5>','notification','timernotification',3000);
					}else{
						dashboardService.addid(patientid);
						createDialogService('/ayushman/assets/app/partials/fitnesscertificate.html', {
							id: 'bill',
							backdrop: true,
							controller: 'printablePrescriptionCtrl',
							css:{padding: '18px',width:'650px'},
								cancel:{label: 'Cancel', fn: function() {
								}
							},
							success: {label: 'Success', fn: function() {
							}}
						},{appointment_id:appointmentid});
					}
				};
				$scope.saveprescriptionstatus = function(id , printstatus){
						//	examinationService.getstatus( id , printstatus ).then(function(data){
						//$scope.status_data = data;
						//});
				}			
				
//past print			
	var show_summary_fs = function(app_id){
		if(app_id == 0){
					showNotification('300','20','<h5>Select Patient','Please Select Patient</h5>','notification','timernotification',3000);
			}else{
				$scope.appointmentid = app_id;
				appointmentid = app_id;
				//alert(app_id);
				console.log($scope.pastappointments['apps'].length);
				for(var i=0; i<$scope.pastappointments['apps'].length;i++){
					if($scope.pastappointments['apps'][i].appointment_id == appointmentid){
						appointment_data = $scope.pastappointments['apps'][i];
							createDialogService('/ayushman/assets/app/partials/previousprescriptionnewUI.html', {
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
									}
								}
							},{appointment_data:$scope.pastappointments['apps'][i]});					
					}
				}
			}
	};
	$scope.show_summary_nfs = show_summary_nfs;
	$scope.show_summary_fs = show_summary_fs;
			 		  
			
 }]);
		 
		