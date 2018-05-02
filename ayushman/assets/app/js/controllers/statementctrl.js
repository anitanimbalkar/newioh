angular.module('app.controllers')
    .controller('statementCtrl',
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
						url: '/ayushman/caccountstatement/getstatements'
					}).success(function(data, status) {
						if(data.length == 0){
							$scope.statements = {};
							$scope.loading(false);
							$scope.show = true;
						}else{
							$scope.statements = data;
							$scope.show = false;
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
			}
		]
	);

		
	