angular.module('app.controllers')
    .controller('dashboardCtrl',
		['$scope','$route','appointmentService','createDialog',
		 function($scope,$route,appointmentService,createDialogService) {
			 $scope.loading=true;
		     $('.ui-multiselect-menu').hide();
			 $scope.toggle = function(id){
				$("#"+id).stop().slideToggle(500);
		     }
			 $scope.gotvisits = false;
			appointmentService.getAppointments(user_id).then(function(data){	
				$scope.appointments = data;
				if($scope.appointments['apps'].length){
					$scope.appointments['page'] = [];
					for(i=0;i<$scope.appointments['apps'].length && i < 5;i++){
						$scope.appointments['page'][i] = $scope.appointments['apps'][i];
					}
				}
				$scope.gotvisits = true;
			});
			$scope.gotvisits = false;
			appointmentService.getincompleteAppointments(user_id).then(function(data){	
				$scope.inappointments = data;
				if($scope.inappointments['apps'].length){
					$scope.inappointments['page'] = [];
					for(i=0;i<$scope.inappointments['apps'].length && i < 5;i++){
						$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
					}
				}
				$scope.gotvisits = true;
			});
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
			$scope.startquickprescription = function(userid){
				connectnowclick(userid,0,1);
			}
			$scope.startconsultation = function(userid){
				connectnowclick(userid,1);
			}
			$scope.appointments = appointmentService.appointments;
			var show_more_visits = function(){
				$pageLength = $scope.appointments['page'].length;
				for(i = $scope.appointments['page'].length;i < $scope.appointments['apps'].length && i < ($pageLength + 5);i++){
					$scope.appointments['page'][i] = $scope.appointments['apps'][i];
				}
			};
			$scope.showMoreVisits = show_more_visits;
			var show_less_visits = function(){
				$scope.appointments['page'] = [];
				for(i=0;i<$scope.appointments['apps'].length && i < 5;i++){
					$scope.appointments['page'][i] = $scope.appointments['apps'][i];
				}
			};
			$scope.showLessVisits = show_less_visits;
			
			var show_all_visits = function(){
				for(i = 0;i < $scope.appointments['apps'].length;i++){
					$scope.appointments['page'][i] = $scope.appointments['apps'][i];
				}
			};
			$scope.showAllVisits = show_all_visits;
			
			appointmentService.getRegularPatients(user_id)
				.then(function(data){
						$scope.regularPatients = data;
			});
			$scope.regularPatients = appointmentService.regularPatients;
			
			$scope.$on('pullgriddata', function(){
				appointmentService.getAppointments(user_id).then(function(data){	
				$scope.appointments = data;
				console.log($scope.appointments);
				if($scope.appointments['apps'].length){
					$scope.appointments['page'] = [];
					for(i=0;i<$scope.appointments['apps'].length && i < 5;i++){
						$scope.appointments['page'][i] = $scope.appointments['apps'][i];
					}
				}
				$scope.gotvisits = true;
			});
			}); 
			$scope.$on('pullgriddata', function(){
				appointmentService.getincompleteAppointments(user_id).then(function(data){	
				$scope.inappointments = data;
				console.log($scope.inappointments);
				if($scope.inappointments['apps'].length){
					$scope.inappointments['page'] = [];
					for(i=0;i<$scope.inappointments['apps'].length && i < 5;i++){
						$scope.inappointments['page'][i] = $scope.inappointments['apps'][i];
					}
				}
				$scope.gotinvisits = true;
			});
			}); 
				 $scope.show_emr = function (id){
				 show_emr(id);
		     }
			 $scope.edit_emr = function (id){
				 edit_emr(id);
		     }
			 $scope.cancel_appointment = function (id){
				 cancelappointment(id);
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
			 $scope.fancyboxclosed = function ()
			{
				location.reload();
				
			}	
			$scope.launchbookappointment = function(patient_id) {
				
					createDialogService('/ayushman/assets/app/partials/bookappoint.html', {
					  id: 'complexDialog',
					  backdrop: true,
					  controller: 'bookingappointmentCtrl',
					  css:{padding: '18px',width:'600px'},
					  cancel:{label: 'Cancel', fn: function() {
								
							}
						},
					  success: {label: 'Success', fn: function() {
							//$scope.getAllNotes();
							
					  }}
					},{patientid:patient_id});
				};
				
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
			 //$scope.day = moment();
			 //console.log($scope.day);
			 console.log("Successful dashboardctrl.js");
		 }
		 ]);
		 
		