angular.module('app.controllers')
    .controller('docpastappointment',
		['$scope','appointmentService','createDialog',
		 function($scope,appointmentService,createDialogService) {
			$scope.loading=true;
		    $('.ui-multiselect-menu').hide();
			$scope.toggle = function(id){
				$("#"+id).stop().slideToggle(500);
		    }
			$scope.pastappointments = {};
			$scope.pastappointments['apps'] = {};
			
			$scope.getPastAppoitnments = function(count){
				if($scope.pastappointments['apps'].length == undefined){
					count = 5;
				}else{
					count = ($scope.pastappointments['apps'].length - 1) + count;
				}
				appointmentService.getPastAppointments(user_id, count)
					.then(function(data){
						$scope.pastappointments = data;
						console.log($scope.pastappointments['appscount']['count']);
						if(($scope.pastappointments['apps'].length - 1)){
							$scope.pastappointments['page'] = [];
							for(i=0;i<($scope.pastappointments['apps'].length - 1);i++){
								$scope.pastappointments['page'][i] = $scope.pastappointments['apps'][i];
							}
						}
				});
			};
			
			$scope.getPastAppoitnments();
			
	var show_more_visits = function(){
		$scope.getPastAppoitnments(5);
		
	};
	$scope.showMoreVisits = show_more_visits;
	var show_less_visits = function(){
		$scope.pastappointments['page'] = [];
		for(i=0;i<$scope.pastappointments['apps'].length && i < 5;i++){
			$scope.pastappointments['page'][i] = $scope.pastappointments['apps'][i];
		}
	};
	$scope.showLessVisits = show_less_visits;
	
	var show_all_visits = function(){
		$scope.getPastAppoitnments(1000);
	};
	$scope.showAllVisits = show_all_visits;

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
		//alert(app_id);
		for(var i=0; i<$scope.pastappointments['apps'].length;i++){
			if($scope.pastappointments['apps'][i].appointment_id == appointmentid){
				appointment_data = $scope.pastappointments['apps'][i];
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
				},{appointment_data:$scope.pastappointments['apps'][i]});					
			}
		}
	};

	$scope.show_summary_nfs = show_summary_nfs;
	$scope.show_summary_fs = show_summary_fs;

			$scope.$on('pullgriddata', function(){
				appointmentService.getAppointments(user_id)
					.then(function(data){
							$scope.appointments = data;
				});	
			}); 
			 $scope.show_emr = function (id){
				 show_emr(id);
		     }
			 $scope.edit_emr = function (id){
				 edit_emr(id);
		     }

			// $scope.loading(false);
}]);