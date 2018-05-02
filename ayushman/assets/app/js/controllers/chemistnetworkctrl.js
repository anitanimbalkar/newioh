angular.module('app.controllers').controller('chemistnetworkCtrl',['$scope','$http',function($scope,$http) {
	$scope.show=0;
	$scope.chemists = {};
	$scope.chemistsinnetwork = {};
	
	{	
		var get_chemistsinnetwork = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemist/getdoctorchemist'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.chemistsinnetwork = {};
				}else{
					$scope.chemistsinnetwork = data;
				}	
			});
		};
		$scope.getChemistsinnetwork = get_chemistsinnetwork;
		$scope.getChemistsinnetwork();
		
		var get_chemists = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemist/getallchemist'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.chemists = {};
					$scope.show = 1;
				}else{
					$scope.chemists = data;
					$scope.show = 0;
				}
				
			});
		};
		$scope.getChemists = get_chemists;
		$scope.getChemists();
		
		var add_chemist = function(userid,chemistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemistdirectory/addtofavorite?&chemistid='+chemistid+'&chemistuserid='+userid+'&role=doctor'
			}).success(function(data, status) {
				$('#loading').dialog('close');
				$scope.getChemistsinnetwork();
			});
		};
		$scope.addChemist = add_chemist;
		
		
		var remove_chemist = function(chemistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemistdirectory/removefromfavorite?chemistid='+chemistid
			}).success(function(data, status) {
				$('#loading').dialog('close');
				$scope.getChemistsinnetwork();
			});
		};
		$scope.removeChemist = remove_chemist;
	}
		
	$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
		$('.filter-status').val('');
		$('table.demo').trigger('footable_clear_filter');
		$('.row-count').html('');
	});
}]);

