angular.module('app.controllers') .controller('historynotesCtrl',['$scope','$fileUploader','$http','formApi','emrService',function($scope,$fileUploader, $http,formApi,emrService){
	'use strict';
	$scope.patientid = patientid;
	// create a uploader with options
	var uploader = $scope.uploader = $fileUploader.create({
		scope: $scope,                          // to automatically update the html. Default: $rootScope
		url: '/ayushman/upload/saveuploadedreports',
		formData: [
		{ key: 'value' }
		],
		filters: [
		function (item) {                    // first user filter
			
			return true;
		}
		]
	});
	
	
	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
		
		if(item.type == 'application/pdf' && uploader.queue.length == 0){
			return true;
		}
		else{
			if(uploader.queue.length > 0){
				alert('One pdf is allowed.')
			}else{
				alert('Only pdf files are allowed');
			}			
			return false;
		}
	});

	// REGISTER HANDLERS

	uploader.bind('afteraddingfile', function (event, item) {
		$scope.i=$scope.i+40;
			
	});

	uploader.bind('whenaddingfilefailed', function (event, item) {
		
	});

	uploader.bind('afteraddingall', function (event, items) {
		//resize();
		
	});

	uploader.bind('beforeupload', function (event, item) {
		
	});

	uploader.bind('progress', function (event, item, progress) {
		
	});

	uploader.bind('success', function (event, xhr, item, response) {
		
	});

	uploader.bind('cancel', function (event, xhr, item) {
		
	});

	uploader.bind('error', function (event, xhr, item, response) {
		
	});

	uploader.bind('complete', function (event, xhr, item, response) {
		
	});
	uploader.bind('completeall', function (event, items) {
		$.ajax({
			 type: "post",
			 url: "/ayushman/upload/savehistorynotes",
			 data: {patientid:patientid},
			 success:
			 function( data ){
				 $scope.$modalSuccess();
			 },
			 error:
			 function(){
				showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
			 },
		 });
	});
	uploader.bind('progressall', function (event, progress) {
		
			if(progress==100)
			$scope.completeall=1;
	});

}]);