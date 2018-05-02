angular.module('app.controllers').controller('trackerheaderCtrl',['$scope','$routeParams','$http','trackerApi','parameterApi',function($scope, $routeParams,$http,trackerApi,parameterApi) {
	
	$scope.ChangedValues = {};
	$scope.template_info = {};

	trackerApi.get(function(data){
		$scope.template_info = data.tracker_info;
	});
	
	$scope.changedvalues = function(){
		var app_id = $scope.app_id;
		var tracker_data = {};
		for(i=0;i<$scope.template_info.template_list.length;i++){
			if($scope.template_info.template_list[i].isheader == 1){
				for(j=0;j<$scope.template_info.template_list[i].latestvalues.length;j++){
					parameterApi
					  .save({'parameterid':$scope.template_info.template_list[i].latestvalues[j].id, 'parametervalue':$scope.template_info.template_list[i].latestvalues[j].value,'app_id':app_id},function(data){
					});
				}				
			}
		}
	}
}]).directive('trackerheader',function() {
	return {
		templateUrl: '/ayushman/assets/app/partials/trackerheader.html',
	};
});