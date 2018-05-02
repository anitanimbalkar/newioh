angular.module('app.controllers')
    .controller('mypackagesCtrl',
		['$scope','$http',
				 function($scope,$http) {
					 
					 
						var get_data = function(){
							var httpRequest = $http({
								method: 'POST',
								url: '/ayushman/cmypackages/generateviewforprovider'
							}).success(function(data, status) {
								$scope.customview = data;
								console.log($scope.customview);
								
								
							});
			};
			$scope.getdata = get_data;
			$scope.getdata();
						
}]);
		
	