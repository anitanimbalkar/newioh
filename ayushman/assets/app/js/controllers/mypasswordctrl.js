angular.module('app.controllers')
    .controller('mypasswordCtrl',
		['$scope','$http',
				 function($scope,$http) {
				$scope.formData={};
					$scope.processform = function() {
						console.log($scope.formData);
				$http({
			        method  : 'POST',
			        url     : '/ayushman/cchangepassword/changepass',
			        data    : $scope.formData,  // pass in data as strings
			        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			    })
			        .success(function(data) {
			            alert(data);
			            if (!data.success) {
			            	
			            } else {
			            	
			            }
			        });
			};
					 
						
						
}]);
		
	