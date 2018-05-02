angular.module('app.controllers')
    .controller('accountbillsCtrl',
		['$scope','$http',
		 function($scope,$http) {
		 $scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
			  $scope.show=false;
			var get_statements = function(){
				$scope.loading(true);
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cbill/getbills'
				}).success(function(data, status) {
					
					console.log($scope.statements);
					if(data.length == 0){
						$scope.statements = {};
						$scope.loading(false);
						$scope.show = true;
					}else{
						$scope.show = false;
						$scope.statements = data;
					}
					
				});
			};
			$scope.getStatements = get_statements;
			$scope.getStatements();
			$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
				$scope.loading(false);
				  $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
            $('.row-count').html('');
				
			});
						
}]);
		
	