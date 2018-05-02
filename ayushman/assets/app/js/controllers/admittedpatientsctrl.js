angular.module('app.controllers')
    .controller('admittedpatientsCtrl',
		['$scope','$http','ipdpatientsService',
 		function($scope,$http,ipdpatientsService){

					    ipdpatientsService.getAdmittedPatients()
						.then(function(data){
							
					    	$scope.admittedpatients = data.detail;

							console.log($scope.admittedpatients);
							});

				
}]);