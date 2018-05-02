angular.module('app.controllers') .controller('uploadReportCtrl',['$scope','$fileUploader','$http','formApi','emrService',function($scope,$fileUploader, $http,formApi,emrService){
	resize(632);
        $scope.step = 1;
		$scope.isdate=1;
		$scope.tag = {};
		$scope.i=500;
		$scope.j=1200;
		$scope.activestyle1 = {"background":'#27AE60'};
		$scope.activestyle2 = {"background":'gray'};
		$scope.activestyle3 = {"background":'gray'};
				
		$scope.tag = {};
	var para={};
	$scope.parameter_ids= new Array();
	
	//$scope.parameter_ids[6] = '123';
	
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.reportparameterdata={};
	$scope.newincident="";
	$scope.allunits={};
	var i;
	var $pageLength;
	$scope.patienttestreportid;
	$scope.testid;
	$scope.tid;
	$scope.tname;
	$scope.completeall=0;
	// create a uploader with options
	var uploader = $scope.uploader = $fileUploader.create({
scope: $scope,                          // to automatically update the html. Default: $rootScope
url: '/ayushman/upload/saveuploadedreports',
formData: [
		{name: $scope.tname},{id: $scope.tid}
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
	var fill_related = function(){
		if($scope.tag.visit!=0)
		{
			
			$scope.tag.Suggestedby = $scope.tag.visit[1];
			$scope.tag.incident = $scope.tag.visit[2];
		}
		else
		{
			$scope.tag.Suggestedby = "";
			$scope.tag.incident = "";
		}
		
	}
	$scope.fillrelated = fill_related;
	
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
		$scope.tid='';
		$scope.tname='';
		$scope.patienttestreportid='';
		$scope.completeall=0;
	};
	$scope.reset = reset;
        $scope.setStep = function(step){
			 $scope.step = step;
			 resize(632);
			 if(step=='1')
			 {
				$scope.activestyle1 = {"background":'#27AE60'};
				$scope.activestyle2 = {"background":'gray'};
				$scope.activestyle3 = {"background":'gray'};
				
			 }
			if(step=='2')
			{
				
				$scope.activestyle2 = {"background":'#27AE60'};
				$scope.activestyle3 = {"background":'gray'};
			}
			if(step=='3')
			{
				var paramtemp=$("#visitidfield").val();
				$scope.testid=$("#testid").val();
				$scope.tid = $scope.testid;
				$scope.tname = $scope.tag.testname;
				$scope.paramdata=JSON.parse(paramtemp);
				$scope.activestyle3 = {"background":'#27AE60'};
				setTimeout(resize, 2000);
			}
		}
	
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
	// create a uploader with options
	$scope.testid=$("#testid").val();
	$scope.tid = $scope.testid;
	$scope.tname = $("#testnametxt1").val();
	console.log($scope.tid);
	console.log($scope.tname);
	var uploader = $scope.uploader = $fileUploader.create({
		scope: $scope,                          // to automatically update the html. Default: $rootScope
		url: '/ayushman/upload/saveuploadedreports',
		formData: [
		{name: $scope.tname},{id: $scope.tid}
		],
		filters: [
		function (item) {                    // first user filter
			
			return true;
		}
		]
	});
	$.ajax({
				url: "/ayushman/cuploadpastvisit/getincidence",
				success: function( data ) {
						
						
						$scope.incidence=JSON.parse(data);
						$scope.$apply();
						
					},
					error : function(){}
			  });
	$.ajax({
				url: "/ayushman/cuploadpastvisit/getvisit",
				success: function( data ) {
						
						
						$scope.visit=JSON.parse(data);
						$scope.$apply();
						
					},
					error : function(){}
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
	
		if(!$scope.tag.Date){
		   alert("Please enter Test Date");
		   return;
		}
		for(key in $scope.parameter_ids){	// check unit drop down are selected or not 
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
			$scope.tid = $scope.testid;
			$scope.tname = $scope.tag.testname;
			console.log($scope.tid);
			console.log($scope.tname);
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
								$scope.$apply();
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
					$scope.showDetails = !$scope.showDetails;
					$scope.setStep(1);
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
	//Restore filled form
	
	//for tagging form creation
	
	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
		console.log(item);
		if(item.type == 'application/pdf' || item.type == 'image/png' || item.type == 'image/x-png' || item.type == 'image/jpeg' || item.type == 'image/bmp' || item.type == 'image/jpg'){
			if(item.size > 2*1024*1024)
			{
				alert('File size should be less than 2 MB');
				return false;
			}
			/*for(var i=0; i < uploader.queue.length; i++){
				if(uploader.queue[i].file.type == 'application/pdf'){
					alert('One PDF file OR multiple images are allowed.');
					return false;
				}
			}*/			
			/*if(item.type == 'application/pdf' && uploader.queue.length == 0){
				return true;
			}else if(item.type != 'application/pdf'){
				return true;
			}else if(item.type == 'application/pdf' && uploader.queue.length > 0){
				alert('One PDF file OR multiple images are allowed.');
				return false;
			}*/
		}else{
			alert('Not supported file type. Supported file types (.PDF, .jpg, .png, .jpeg, .bmp)');
			return false;
		}
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
				var temptag=JSON.stringify($scope.tag.visit);
			}
						
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
						$scope.$broadcast('get_reports');
						$scope.reset();
						$scope.setStep(1);
						$scope.showDetails = !$scope.showDetails;
						parent.pageloaded();
					}
			});
		}
	});

	uploader.bind('progressall', function (event, progress) {
	
		if(progress==100)
		$scope.completeall=1;
});

}]).directive('autocompletedoctor', function() {
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
}).directive('autocomplete', function() {
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
						typeBoxQuery = " select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c";					
						//typeBoxQuery = "select id as id, testname_c as value from investigations where testname_c";
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
.directive('myReports', function() {
	return {
templateUrl: '/ayushman/assets/app/partials/pastreportspatient.html'
	};
});

	  
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