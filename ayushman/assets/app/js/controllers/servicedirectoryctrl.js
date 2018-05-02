angular.module('app.controllers')
    .controller('servicedirectoryCtrl',
		['$scope','$http','ipdpatientsService','$routeParams',
 		function($scope,$http,ipdpatientsService,$routeParams){
			console.log($routeParams.docid);
			$scope.doctorid;
					    ipdpatientsService.getDirectoryofServices($routeParams.docid)
						.then(function(data){
					    	$scope.servicedata = data.orderservices;
							$scope.doctorid=$routeParams.docid;

							console.log(data);
							});

			 

}]);