angular.module('app.controllers') .controller('uploadpathreportctrl',['$scope','$fileUploader','$http','formApi','emrService',function($scope,$fileUploader, $http,formApi,emrService){
	resize(632);
       // $scope.step = 1;
		$scope.isdate=1;
		$scope.tag = {};
		$scope.i=500;
		$scope.j=1200;
	
		$scope.tag = {};
	var para={};
	$scope.parameter_ids= new Array();
	
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.reportparameterdata={};
	$scope.newincident="";
	$scope.allunits={}
	var i;
	var $pageLength;
	$scope.patienttestreportid;
	$scope.testid;
	$scope.orderid;
	$scope.reportsummary;
	$scope.completeall=0;
	// create a uploader with options
	var uploader = $scope.uploader = $fileUploader.create({
scope: $scope,                          // to automatically update the html. Default: $rootScope
url: '/ayushman/cpathreportupload/uploadradioreport',
formData: [
		{orderid:$scope.orderid}
		],
filters: [
		function (item) {                    // first user filter
			
			return true;
		}
		]
	});
	
	$scope.submitData = function (person)
	{
		
		
	};

	
	var reset=function(){
		$scope.uploader.clearQueue();
		$scope.tag={};
		$scope.paramdata={};
		$scope.parameter_ids={};
		$scope.parameter_units={};
		$scope.newincident="";
		$scope.allunits={}
		$scope.otherunits={};
		$scope.parameterdata={};
		$scope.testid='';
		$scope.orderid='';
		$scope.patienttestreportid='';
		$scope.completeall=0;
	};
	$scope.reset = reset;
        	
	$scope.tag = {};
	$scope.para={};
	$scope.newincident="";
	$scope.incidenceid;
	var i;
	var $pageLength;
	$scope.patienttestreportid;
	$scope.incidence;
	$scope.visit;
	$scope.visitid;

	$scope.completeall=0;
	$scope.testid = $("#testid").val();
			$scope.orderid = $("#orderid").val();
	// create a uploader with options
	var uploader = $scope.uploader = $fileUploader.create({
		scope: $scope,                          // to automatically update the html. Default: $rootScope
		url: '/ayushman/cpathreportupload/uploadradioreport',
		formData: [
		{orderid:$scope.orderid}
		],
		filters: [
		function (item) {                    // first user filter
			
			return true;
		}
		]
	});
	
	$scope.submitData = function (person)
	{
		
		
	};

	var reset=function(){
		$scope.uploader.clearQueue();
		$scope.tag={};
		$scope.paramdata={};
	};
	$scope.reset = reset;
	var uploadall = function(){
		parent.pagebusy();
		var key,flag=0;
	
	    if(flag==0){
			//document.getElementById("testid").value=testid;
						
			//$scope.testid = $("#testid").val();
			$scope.orderid = $("#orderid").val();
		
			console.log("Setting values");
			console.log($scope.orderid);
			//console.log($scope.testid);
			
			uploader.uploadAll();
				
		}
			parent.pageloaded();
		
	};
	$scope.uploadall=uploadall;

	
	$scope.openDialog = function(url, width, height){
		
		$.fancybox.open({
			href : url,
			type : 'iframe',
			'width'		: width,
			'height'		: height
		});
	}
	
	// FAQ #1
	var item = {
	};
	item.remove = function() {
		uploader.removeFromQueue(this);
	};
	//Restore filled form
	
	//for tagging form creation
	
	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
		console.log(item);
		
		return true;
	});

	// REGISTER HANDLERS

	uploader.bind('afteraddingfile', function (event, item) {
		$scope.i=$scope.i+40;
		resize($scope.i);
		
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
		
		
	});

	uploader.bind('progressall', function (event, progress) {
	
		if(progress==100)
		$scope.completeall=1;
});

}])
.directive('jqdatepicker', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "-120:+0",maxDate: '0',changeYear: true,changeMonth: true,  dateFormat: 'dd M yy',
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
			});
		}
	}
})
	  
	  function readCookie(name) {
		var nameEQ = name + "="; 
		var ca = document.cookie.split(';'); 
		for(var i=0;i < ca.length;i++) { 
			var c = ca[i]; 
			while (c.charAt(0)==' ') c = c.substring(1,c.length); 
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length); 
		} 
		return undefined; 
	}