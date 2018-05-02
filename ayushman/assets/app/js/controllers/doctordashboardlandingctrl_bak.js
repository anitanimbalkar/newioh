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
			 
			 $scope.patientidlist = new Array();
			 $scope.upappointments = new Array();
			 $scope.pastappointment = new Array();
			 
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
							console.log($scope.id);
							myEl.css('background-color','#f2f2f2');  
						}						
						var myEl = angular.element( document.querySelector( '#u'+divID ) );
						console.log(divID);
						console.log($scope.id);
						myEl.css('background-color','rgba(255,165,0,0.20)');  
					$scope.id = divID;			
					}
			 
			appointmentService.getAppointments(user_id).then(function(data){	
			$scope.appointments = data;
			$scope.appointmen = $scope.appointments['apps'];
			console.log($scope.appointmen);
			$scope.count = $scope.appointmen.length;
				if($scope.appointments['apps'].length){
					$scope.appointments['page'] = [];
					for(i=0; i < $scope.count && i < 5;i++){
						$scope.upappointments[i] = $scope.appointmen[i];
					}
				}
				$scope.gotvisits = true;
			});
			 
			 appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
					$scope.userid=$scope.myprofile['userinfo'].id;
					console.log($scope.myprofile);
					//console.log($scope.myprofile);
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
							
							$scope.patientda=data;
							var count = $scope.patientda.name['length'];
							console.log(count);
							
							if(count == 0){
									showNotification('300','20','Patient','<h5>Record not found</h5>','notification','timernotification',3000);
									$scope.gotvisits = true;
							
							}else{
								$scope.patientidlist = $scope.patientda['name'];
									$scope.patdataLength = $scope.patientidlist.length;
									for(i = 0;i < $scope.patdataLength && i < 5;i++){
											$scope.patientdata[i] = $scope.patientidlist[i];
										}
										console.log($scope.patientdata);
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
									console.log($scope.patientidlist);								
									$scope.patdataLength = $scope.patientidlist.length;
									for(i = 0;i < $scope.patdataLength && i < 5;i++){
											$scope.patientdata[i] = $scope.patientidlist[i];
										}
										console.log($scope.patientdata);
								},						
					});
			}*/
			
			var show_more_patient = function(){
				var pageLength = $scope.patientdata.length;
				for(i = pageLength;i < $scope.patdataLength && i < (pageLength + 5);i++){
					$scope.patientdata[i] = $scope.patientidlist[i];
				}
				console.log($scope.patientdata);
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
				$scope.selectedappid = 0;
				$scope.selectedpatientid = 0;
				$scope.patientiddiagnosis = 0;
				$scope.preselectedpatientid = 0 ;
				$scope.selectedpatientidpast = 0;
				$scope.preselectedpatientidpast = 0 ;
				$scope.gotvisits = false;
				
				appointmentService.getAppointments(user_id).then(function(data){	
				$scope.appointments = data;
				$scope.appointmen = $scope.appointments['apps'];
				console.log($scope.appointmen);
				$scope.count = $scope.appointmen.length;
					if($scope.appointments['apps'].length){
						$scope.appointments['page'] = [];
						for(i=0; i < $scope.count && i < 5;i++){
							$scope.upappointments[i] = $scope.appointmen[i];
						}
					}
				$scope.gotvisits = true;
			});
			}
			
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

			$scope.getPastAppoitnments = function(){
				$scope.selectedappid = 0;
				$scope.selectedpatientid = 0;
				$scope.patientiddiagnosis = 0;
				$scope.preselectedpatientid = 0 ;
				$scope.selectedpatientidpast = 0;
				$scope.preselectedpatientidpast = 0 ;
				$scope.gotvisits = false;
					
				appointmentService.getPastAppointmentdata(user_id)
					.then(function(data){
					$scope.pastappointments = data.apps;
						$scope.patcount = data.appscount['count'];
						console.log($scope.pastappointments);
							for(i = 0; i < $scope.patcount && i < 5;i++){
								$scope.pastappointment[i] = $scope.pastappointments[i];
							}
							console.log($scope.pastappointment);
						$scope.gotvisits = true;
					});
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
			 
			
//get incomplete consultation

			$scope.incompleteconsultation = function(){
				 $scope.selectedappid = 0;
				 $scope.selectedpatientid = 0;
				 $scope.patientiddiagnosis = 0;
				 $scope.preselectedpatientid = 0 ;
				 $scope.selectedpatientidpast = 0;
				 $scope.preselectedpatientidpast = 0 ;
					$scope.gotvisits = false;
					
			appointmentService.getincompleteAppointments(user_id).then(function(data){	
				console.log(data);
				$scope.inappointments = data;
					if($scope.inappointments['apps'].length){
						$scope.inappointments['page'] = [];
						for(i=0;i<$scope.inappointments['apps'].length && i < 5;i++){
							$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
						}
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
				   console.log($scope.preselectedpatientid);
			 }
			
			  $scope.getidpast = function(patientid,appid,diagnosis,billgerated,pdf)
			  {
					$scope.billgenetated = billgerated;
					$scope.pdffile = pdf;
				   $scope.selectedpatientid = patientid;
				   $scope.preselectedpatientidpast = $scope.selectedpatientidpast;
				   $scope.selectedpatientidpast = appid;
				   $scope.patientiddiagnosis = diagnosis;
				   console.log($scope.selectedpatientidpast);
				   
				   appointmentService.getPastAppointmentdata(user_id)
					.then(function(data){
					$scope.pastappointments = data.apps;
						$scope.patcount = data.appscount['count'];
						for(i = 0; i < $scope.patcount ;i++){
								if($scope.selectedpatientidpast == $scope.pastappointments[i].appointment_id ){
										$scope.biiprint = $scope.pastappointments[i].billGenerated;
										$scope.namefile	= $scope.pastappointments[i].pdffilename;
								}
							}
							console.log($scope.biiprint);
								console.log($scope.namefile);
						$scope.gotvisits = true;
					});
			 }
			  $scope.getappid = function(patientid,appid)
			 {
				  $scope.preselectedpatientid = $scope.selectedpatientid;
				  $scope.selectedpatientid = patientid;
				  $scope.preselectedappid = $scope.selectedpatientidpast;
				  $scope.selectedpatientidpast = appid; 
				   console.log($scope.selectedpatientid);
				   console.log($scope.preselectedpatientid);
				   console.log($scope.selectedpatientidpast);
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
	
	
	$scope.printoldbill = function(app_id,diagnosis,option,isbillgenerate) {
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
			console.log(patappid);
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
									console.log("raviigggi");
									data = JSON.parse(data);
									$scope.patientdata = data;							
									console.log($scope.patientdata);
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
				console.log(app_id);
				for(var i=0; i<$scope.pastappointments.length;i++){
					if($scope.pastappointments[i].appointment_id == app_id){
						appointment_data = $scope.pastappointments[i];
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
									}
								}
							},{appointment_data:$scope.pastappointments[i]});					
					}
				}
			}
	};
	$scope.show_summary_nfs = show_summary_nfs;
	$scope.show_summary_fs = show_summary_fs;
			 		  
			
 }]);
		 
		