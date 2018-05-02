angular.module('app.controllers')
.controller('myreportsCtrl',
	['$scope','$routeParams','$http',
		 function($scope, $routeParams,$http) {
			//resize(670);
		     var patient_id = $routeParams.patient_id;
			 
			// console.log(patient_id);
		      var get_reports = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cuser/getdata?id='+patient_id
				}).success(function(data, status) {
					$scope.reports = data;
					$scope.reports['page'] = [];
								for(i=0;i<$scope.reports['data'].length && i < 5;i++){
									$scope.reports['page'][i] = $scope.reports['data'][i];
								}
				});
			};
			$scope.getReports = get_reports;
			$scope.getReports();
			$scope.$on('get_reports', get_reports);

			var show_more_visits = function(){
				$pageLength = $scope.reports['page'].length;
				console.log($scope.reports['data'].length);
				for(i = $scope.reports['page'].length;i < $scope.reports['data'].length && i < ($pageLength + 5);i++){
					$scope.reports['page'][i] = $scope.reports['data'][i];
				}
				resize(i*100);
		    };
			$scope.showMoreVisits = show_more_visits;
			
			var show_less_visits = function(){
				$scope.reports['page'] = [];
				for(i=0;i<$scope.reports['data'].length && i < 5;i++){
					$scope.reports['page'][i] = $scope.reports['data'][i];
				}
				resize(i*100);
		    };
			$scope.showLessVisits = show_less_visits;
			
			var show_all_visits = function(){
				for(i = 0;i < $scope.reports['data'].length;i++){
					$scope.reports['page'][i] = $scope.reports['data'][i];
				}
				resize(i*100);
		    };
			$scope.showAllVisits = show_all_visits;
			$scope.openDicom = function(reportid)
			{

			window.open("/ayushman/cdicomviewer/view?reportid="+reportid);
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
						if(obj != undefined){
							if(obj.fancyboxclosed != undefined){
								obj.fancyboxclosed(obj);
							}
						}
					}
                });
		     }
			var deleteReportRecord = function(reportid,index){
				console.log(reportid);
				$.ajax({
					type: "get",
					url: "/ayushman/newcemrdashboard/deleteUploadedReport?reportid="+reportid,
					success:
						function( data ){
							showNotification('300','20','Delete','Record Deleted successfully','notification','timernotification',3000);					
							$scope.reports['data'][index]['status']="deleted";  						
							//$scope.showLessVisits();				
						},
					error:
						function(){
							showMessage('250','50','Error occured while deleting record. Please contact your system administrator.','error','id');	
						},
					 });		
				};
			$scope.deleteReportRecord = deleteReportRecord;
			
			var editIncidence = function(id){
			$("#"+id).stop().slideToggle(500);
			}
			$scope.editIncidence = editIncidence;
			var saveIncident = function(reportid,index){
				console.log("#"+"incident"+reportid);
				var incidenceValue = $("#"+"incident"+reportid).val();
				console.log(incidenceValue);

				$.ajax({
					type: "get",
					url: "/ayushman/newcemrdashboard/saveIncidence?reportid="+reportid+"&incidence="+incidenceValue,
					success:
						function( data ){
							showNotification('300','20','Update','Incidence updated','notification','timernotification',3000);					
							$scope.reports['data'][index]['parameters']['incident']= incidenceValue;  						
							//$scope.showLessVisits();				
							$("#"+reportid).stop().slideToggle(500);
						},
					error:
						function(){
							showMessage('250','50','Error occured while updating record. Please contact your system administrator.','error','id');	
						},
					 });		
				};
			$scope.saveIncident = saveIncident;
			
 }]);
