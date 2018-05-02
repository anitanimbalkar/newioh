angular.module('app.controllers')
.controller('mycertificateCtrl',
	['$scope','$routeParams','$http','dashboardService',
		 function($scope, $routeParams,$http,dashboardService) {
			//resize(670);
		     var patient_id = $routeParams.patient_id;
			 if(patient_id == undefined){
				patient_id = dashboardService.getpatid();
				console.log(patient_id);
			}
			// console.log(patient_id);
		      var get_certificates = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cuser/getcertificatesdata?patid='+patient_id
				}).success(function(data, status) {
					$scope.certificates = data;
					console.log('$scope.certificates');
					console.log($scope.certificates);
					
					$scope.certificates['page'] = [];
								for(i=0;i<$scope.certificates['data'].length && i < 5;i++){
									$scope.certificates['page'][i] = $scope.certificates['data'][i];
								}
				});
			};
			$scope.getReports = get_certificates;
			$scope.getReports();
			$scope.$on('get_certificate', get_certificates);
			var show_more_visits = function(){
				$pageLength = $scope.certificates['page'].length;
				console.log($scope.certificates['data'].length);
				for(i = $scope.certificates['page'].length;i < $scope.certificates['data'].length && i < ($pageLength + 5);i++){
					$scope.certificates['page'][i] = $scope.certificates['data'][i];
				}
				resize(i*100);
		    };
			$scope.showMoreVisits = show_more_visits;
			
			var show_less_visits = function(){
				$scope.certificates['page'] = [];
				for(i=0;i<$scope.certificates['data'].length && i < 5;i++){
					$scope.certificates['page'][i] = $scope.certificates['data'][i];
				}
				resize(i*100);
		    };
			$scope.showLessVisits = show_less_visits;
			
			var show_all_visits = function(){
				for(i = 0;i < $scope.certificates['data'].length;i++){
					$scope.certificates['page'][i] = $scope.certificates['data'][i];
				}
				resize(i*100);
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
 }]);