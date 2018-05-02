angular.module('app.controllers').controller('dcnetworkCtrl',['$scope','$http',function($scope,$http) {
	$scope.show=0;
	$scope.chemists = {};
	$scope.diagnostics = {};
	$scope.otpval = '';
	$scope.orderpermissionforchemist = '';
	$scope.orderpermissionfordc = '';
	$scope.chemistsinnetwork = {};
	$scope.pathologistinnetwork = {};
	$scope.doctorinnetwork = {};
	$scope.otp = 0;
	{	
		var get_pathologistinnetwork = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologist/getdoctorpathologists'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.pathologistinnetwork = {};
				}else{
					$scope.pathologistinnetwork = data;
				}	
			});
		};
		$scope.getPathologistinnetwork = get_pathologistinnetwork;
		$scope.getPathologistinnetwork();
		
		var get_diagnostics = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologist/getallpathologists'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.diagnostics = {};
					$scope.show = 1;
				}else{
					$scope.diagnostics = data;
					$scope.show = 0;
				}
				
			});
		};
		$scope.getDiagnostics = get_diagnostics;
		$scope.getDiagnostics();
				
		var add_diagnostic = function(userid,pathologistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: ' /ayushman/cpathologistdirectory/addtofavorite?pid='+pathologistid+'&pathologistuserid='+userid+'&role=doctor'
			}).success(function(data, status) {
				$('#loading').dialog('close');
				$scope.getPathologistinnetwork();
			});
		};
		$scope.addDiagnostic = add_diagnostic;
		
		var remove_diagnostic = function(userid,pathologistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologistdirectory/removefromfavorite?pid='+pathologistid
			}).success(function(data, status) {
				$scope.getPathologistinnetwork();
					$('#loading').dialog('close');
			});
		};
		$scope.removeDiagnostic = remove_diagnostic;
		
	}
		
	$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
		$('.filter-status').val('');
		$('table.demo').trigger('footable_clear_filter');
		$('.row-count').html('');
	});
}]);

