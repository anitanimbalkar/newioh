angular.module('app', ['angularFileUpload'])

// The example of the full functionality
.controller('TestController', function ($scope, $fileUploader, $http) {
	'use strict';
	$scope.tag = {};
	var para={};
	$scope.parameter_ids={};
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
	$scope.completeall=0;
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
	
	$scope.submitData = function (person)
	{
		
		
	};


	
	var get_reports = function(){
		var httpRequest = $http({
method: 'POST',
url: '/ayushman/cuser/getdata'
			

		}).success(function(data, status) {
			$scope.data = data;
			
			
			$scope.data['page'] = [];
			for(i=0;i<$scope.data['data'].length && i < 5;i++){
				$scope.data['page'][i] = $scope.data['data'][i];
			}
		});
	};
	var fill_related = function(){
		var temp = JSON.parse($scope.tag.visit);
		if($scope.tag.visit!=0)
		{
			
			$scope.tag.Suggestedby = temp[1];
			$scope.tag.incident = temp[2];
		}
		else
		{
			$scope.tag.Suggestedby = "";
			$scope.tag.incident = "";
		}
		
	}
	$scope.fillrelated = fill_related;
	$scope.getReports = get_reports;
	$scope.getReports();
	
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
	$scope.patienttestreportid='';
	$scope.completeall=0;
};
	$scope.reset = reset;
	var show_more_visits = function(){
		$pageLength = $scope.data['page'].length;
		
		for(i = $scope.data['page'].length;i < $scope.data['data'].length && i < ($pageLength + 5);i++){
			$scope.data['page'][i] = $scope.data['data'][i];
		}
		
	};
	$scope.showMoreVisits = show_more_visits;

	var show_less_visits = function(){
		$scope.data['page'] = [];
		for(i=0;i<$scope.data['data'].length && i < 5;i++){
			$scope.data['page'][i] = $scope.data['data'][i];
		}
		resize(600);
	};
	$scope.showLessVisits = show_less_visits;
	
	var show_all_visits = function(){
		for(i = 0;i < $scope.data['data'].length;i++){
			$scope.data['page'][i] = $scope.data['data'][i];
		}
	};
	$scope.showAllVisits = show_all_visits;
	var uploadall = function(){
		var key,flag=0;
	
		if(!$scope.tag.Date){
		   alert("Please enter Test Date");
		   return;
		}
		for(key in $scope.parameter_ids){	// check unit drop down are selected or not 
		console.log($scope.parameter_ids[key]);
		if ($scope.parameter_ids[key]=='Select Value'){
    		   alert("Please select Presence value for "+$scope.parameterdata[key]);
    		   flag=1;
    	}
			if (($scope.parameter_ids[key]!='absent') && ($scope.parameter_ids[key]!='present')){
				if (document.getElementById(key+"_unitscombo").selectedIndex == 0){
    			   alert("Please select unit for "+$scope.parameterdata[key]);
    			   flag=1;
 	   			}
    		}
			if ($scope.parameter_units[key]=='2'){	//check if drop down selected as a "other" enter new unit
				if (document.getElementById(key+"_unitscombo1").value == ''){
	    		   alert("Please enter unit for "+$scope.parameterdata[key]);
    			   flag=1;
    			}
    		}
    	
    	}
	    if(flag==0){
			uploader.uploadAll();
		}
	};
	$scope.uploadall=uploadall;

	var gettestparameter =function gettestparameter(testid)	//Get test parameters
		{
			$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/upload/getparams?testid="+testid,
					success: function(data) {
								$scope.paramdata={};
								$scope.parameter_units={};
								$scope.parameter_ids={};
								$scope.otherunits={};
								$scope.paramdata=JSON.parse(data);
								
								for(var index=0;index<$scope.paramdata.length;index++){ //assign default unit to each parameter
									$scope.parameter_units[$scope.paramdata[index]['id']]=$scope.paramdata[index]['defaultunit'];
								}
								resize();
						}
				});
		};
	$scope.gettestparameter = gettestparameter;

	var getpatientparameterdata =function getpatientparameterdata(patienttestreportid) 	//Get reports data which filled by doctor 
		{
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/upload/getpatienttestreportdata?patienttestreportid="+patienttestreportid,
					success: function(data) {
								$scope.reportparameterdata=JSON.parse(data);
								console.log('$scope.reportparameterdata');
								console.log($scope.reportparameterdata);
								
						}
				});
		};
	$scope.getpatientparameterdata = getpatientparameterdata;
	
	var getallunits =function getallunits()	//Get all units
		{
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/upload/getallunits",
					success: function(data) {
								$scope.allunits=JSON.parse(data);
						}
				});
		};
	$scope.getallunits = getallunits;
	
	
	var setuploaddata =function setuploaddata(testid,visits,incidentid,reportdata,patienttestreportid){	//Automatically fill the fields for which parameters filled by doctor onclick of upload report
					$scope.parameter_units={};
					$scope.tag={};
					$scope.parameter_ids={};
					$scope.paramdata={};
					$scope.otherunits={};
					$scope.parameterdata={};
					$scope.reportparameterdata={};

					$scope.getallunits();
					$scope.gettestparameter(testid);
					$scope.getpatientparameterdata(patienttestreportid);

					for(var index=0;index<$scope.reportparameterdata.length;index++){ //check if new unit is present in paramdata[] which is taken from selected test .If not then add it. 
						var flag=0;
						for(var index2=0;index2<$scope.paramdata.length;index2++){
							if($scope.reportparameterdata[index]['parameterid']==$scope.paramdata[index2]['id']){
								flag=1;
								break;
							}
						}
						if(flag){
							for(var i=0;i<$scope.paramdata[index2]['units'].length;i++){
								var ispresent=0;
								if($scope.paramdata[index2]['units'][i]['unitid']==$scope.reportparameterdata[index]['unit']){
									ispresent=1;
									break;	
								}
							}	
							if(ispresent==0){
								var array=[];
								array['unitid']=$scope.reportparameterdata[index]['unit'];
								for(var j=0;j<$scope.allunits.length;j++){
									if($scope.allunits[j]['unitid']==$scope.reportparameterdata[index]['unit']){
										array['unitname']=$scope.allunits[j]['unitname'];
										break;	
									}
								}
								$scope.paramdata[index2]['units'].push(array);
							}
						}	
					}

					$scope.testid=testid;	
					$scope.tag.visit=visits;
					$scope.patienttestreportid=patienttestreportid;
					$scope.tag.Date=reportdata['Date'];
					$scope.tag.testname=reportdata['testname'];
					$scope.tag.Suggestedby=reportdata['Suggestedby'];
					$scope.tag.incident=incidentid;

					for(var index1=0;index1<$scope.reportparameterdata.length;index1++){	//Find that parameter which is present in reports but not in getparams data i.e parameter having multiple loinccode  
						var flag=0;
						for(var index2=0;index2<$scope.paramdata.length;index2++){	//find parameter not in reports list 
							if($scope.reportparameterdata[index1]['parameterid']==$scope.paramdata[index2]['id']){
								flag=1;
								break;
							}
						}				
						if(flag==0){
							for(var index3=0;index3<$scope.paramdata.length;index3++){	//assign parameter id of reports parameter id to parameter having multiple loinccode 
								if($scope.paramdata[index3]['id']=='NotApplicable'){
									break;
								}
							}				
							$scope.paramdata[index3]['id']=$scope.reportparameterdata[index1]['parameterid'];
						}
					}					
						
					for(var index=0;index<$scope.reportparameterdata.length;index++){	//assign parameter values and units filled by doctor 
						$scope.parameter_ids[$scope.reportparameterdata[index]['parameterid']]=$scope.reportparameterdata[index]['value'];
						$scope.parameter_units[$scope.reportparameterdata[index]['parameterid']]=$scope.reportparameterdata[index]['unit'];
					}	
						console.log($scope.reportparameterdata);
						console.log($scope.parameter_ids);
						console.log($scope.parameter_units);

					
							
	};
	$scope.setuploaddata = setuploaddata;
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
	// uploader.queue.push(item);
	//uploader.progress = 100;


	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
				return true;
	});

	// REGISTER HANDLERS

	uploader.bind('afteraddingfile', function (event, item) {
		
	});

	uploader.bind('whenaddingfilefailed', function (event, item) {
		
	});

	uploader.bind('afteraddingall', function (event, items) {
		
		
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
		
		//if($scope.completeall==1)
		{
			if($scope.parameter_ids)
			{
				var key;
				for(key in $scope.parameter_ids){			//Create array for details of each parameter attached to report
					var arrayparadata={};	
						arrayparadata['parameterid']=key;
						arrayparadata['parametername']=$scope.parameterdata[key];
						arrayparadata['value']=$scope.parameter_ids[key];
						arrayparadata['unit']=$scope.parameter_units[key];
						para[key]=arrayparadata;
				}
				$scope.tag.parameter_units=$scope.parameter_units;;
				//$scope.tag.parameter_ids=$scope.parameter_ids;
				$scope.tag.parameters=para;
			}
			if($scope.tag.incident==0)
			{
				$scope.tag.incident=$scope.newincident;
			}
			if($scope.tag.visit)
			{
				var temptag=JSON.parse($scope.tag.visit);
			}
			console.log('$scope.tag');
			console.log($scope.tag);
			var tempa=JSON.stringify($scope.tag);
			var patienttestreportid=$scope.patienttestreportid;
		
			var temp={params:tempa,pasttestreportid:patienttestreportid,testid:$scope.testid,otherunits:$scope.otherunits};
			para={};
			$.ajax({
					type: "POST",
					data:temp,
					url: "/ayushman/upload/savereports",
					success: function(data) 
					{
						$scope.getReports();
					}
			});
		}
	});

	uploader.bind('progressall', function (event, progress) {
	
		if(progress==100)
		$scope.completeall=1;
});
})
.directive('datepicker', function() {
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
.directive('autocomplete', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				
				element.autocomplete({
minLength: 1,
appendTo:"#results",
open: function(event, ui) {
						var autocomplete = $(".ui-autocomplete");
						var oldTop = autocomplete.offset().top;
						var newTop = oldTop - autocomplete.height() - $("#testnametxt1").height() + 23;

						autocomplete.css("top", newTop);
					},

source: function( request, response ) {
						typeBoxQuery = "select id as id, testname_c as value from investigations where testname_c";
						$.ajax({
type: 'Get',
url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+request.term,
datatype: 'json', 
success: function (data) { 
								response( $.ui.autocomplete.filter(JSON.parse(data), request.term));
							},
error: function (req, status, error) {
								ErrorMessage(req.responseText);
								$("#ui-datepicker-div").hide();
							}
						});
					},
focus: function() {
						return false;
					},
select: function( event, ui ) {
					
						var testid=ui.item.id;
						scope.testid=testid;
						//document.getElementById("testid").value=testid;
						ngModelCtrl.$setViewValue(ui.item.value);
						scope.$apply();
						$.ajax({
type: "GET",
url: "/ayushman/upload/getparams?testid="+testid,
success: function(data) {
								scope.paramdata={};
								scope.parameter_units={};
								scope.parameter_ids={};
								scope.otherunits={};
								scope.paramdata=JSON.parse(data);
								
								for(var index=0;index<scope.paramdata.length;index++){
									scope.parameter_units[scope.paramdata[index]['id']]=scope.paramdata[index]['defaultunit'];
								}
								scope.$apply();
								resize();
								
							}
							
						});
						
					}
				});
			});
		}
	}
	
})
.directive('autocompletedoctor', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				
				element.autocomplete({
minLength: 1,
appendTo:"#result",
open: function(event, ui) {
						var autocomplete = $(".ui-autocomplete");
						var oldTop = autocomplete.offset().top;
						var newTop = oldTop - autocomplete.height() - $("#drnametxt").height() + 23;

						autocomplete.css("top", newTop);
					},
source: function( request, response ) {
						typeBoxQuery = "select id,drname as value from doctornames where drname";
						$.ajax({
type: 'Get',
url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+request.term,
datatype: 'json', 
success: function (data) { 
								response( $.ui.autocomplete.filter(JSON.parse(data), request.term));
							},
error: function (req, status, error) {
								ErrorMessage(req.responseText);
								$("#ui-datepicker-div").hide();
							}
						});
					},
focus: function() {
						return false;
					},
select: function( event, ui ) {
						
						//var testid=ui.item.id;
						ngModelCtrl.$setViewValue(ui.item.value);
						scope.$apply();
						
						
					}
				});
			});
		}
	}
}).directive('autocompletedoctor', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				
				element.autocomplete({
minLength: 1,
appendTo:"#result",
open: function(event, ui) {
						var autocomplete = $(".ui-autocomplete");
						var oldTop = autocomplete.offset().top;
						var newTop = oldTop - autocomplete.height() - $("#drnametxt").height() + 23;

						autocomplete.css("top", newTop);
					},
source: function( request, response ) {
						typeBoxQuery = "select id,drname as value from doctornames where drname";
						$.ajax({
type: 'Get',
url: "/ayushman/cautocompletedata/retrieve?query="+typeBoxQuery+"&term="+request.term,
datatype: 'json', 
success: function (data) { 
								response( $.ui.autocomplete.filter(JSON.parse(data), request.term));
							},
error: function (req, status, error) {
								ErrorMessage(req.responseText);
								$("#ui-datepicker-div").hide();
							}
						});
					},
focus: function() {
						return false;
					},
select: function( event, ui ) {
				
						//var testid=ui.item.id;
						ngModelCtrl.$setViewValue(ui.item.value);
						scope.$apply();
						
						
					}
				});
			});
		}
	}
})


.directive('myCustomer', function() {
	return {
templateUrl: '/ayushman/assets/js/uploadpastreports/examples/simple/pastreports.html'
	};
});
