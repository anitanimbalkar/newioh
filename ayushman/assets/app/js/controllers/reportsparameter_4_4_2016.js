angular.module('app.controllers')
.controller('reportsparameter',
	['$scope','$http','appointmentService',
		 function($scope,$http,appointmentService) {
	$scope.tag = {};
	var para={};
	var parameterunit={};
	$scope.parameter_ids={};
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.paramdata={};
	$scope.testid;
	var i;
	var $pageLength;
	$scope.completeall=0;
	appointmentService.getAppointmentData(appointmentid)
		.then(function(data){
			$scope.appointment_info = data;
				$scope.tag.incident=$scope.appointment_info.incidentid;
				$scope.tag.Suggestedby=$scope.appointment_info.doctorname;
				$scope.tag.visit='["On '+$scope.appointment_info.appdate+' with '+$scope.appointment_info.doctorname+'","'+$scope.appointment_info.doctorname+'","'+$scope.appointment_info.incidentid+'","'+$scope.appointment_info.appointment_id+'"]';

	});
	var reset=function(){
	$scope.tag.Date='';
	$scope.tag.testname='';
	document.getElementById("btn_savereoprtsdetail").disabled = false;
	$scope.paramdata={};
	$scope.parameter_ids={};
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.testid='';
	document.getElementById("Datetxt1").value='';
	document.getElementById("testnametxt1").value='';
	};
	$scope.reset = reset;
	
	var savedetails =function () {
		if($scope.tag.Date && $scope.tag.testname){
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
			var tempa=JSON.stringify($scope.tag);
			var temp={params:tempa,testid:$scope.testid,otherunits:$scope.otherunits};
			console.log('$scope.tag');
			console.log($scope.tag);
			
			para={};
			$.ajax({
			type: "POST",
			data:temp,
			url: "/ayushman/upload/savereports",
			success: function(data) 
				{
					showNotification('300','20','Save data','Patients Test reports Tags Saved','notification','timernotification',3000);
					document.getElementById("btn_savereoprtsdetail").disabled = true;
				}
				
			});
		}
		else{
			alert('Test Date & Test Name can\'t be empty');
		}
	};
	$scope.savedetails=savedetails;
	var savereoprtsdetail = function(){
	var key,flag=0;
	for(key in $scope.parameter_ids){
		if ($scope.parameter_ids[key]=='Select Value'){
    		   alert("Please select Presence value for "+$scope.parameterdata[key]);
    		   flag=1;
    	}
	
		if (($scope.parameter_ids[key]!='Absent') && ($scope.parameter_ids[key]!='present')){
			if (document.getElementById(key+"_unitscombo").selectedIndex == 0){
    		   alert("Please select unit for "+$scope.parameterdata[key]);
    		   flag=1;
    		}
    	}
		if ($scope.parameter_units[key]=='2'){
			if (document.getElementById(key+"_unitscombo1").value == ''){
    		   alert("Please enter unit for "+$scope.parameterdata[key]);
    		   flag=1;
    		}
    	}
    	
    }
    if(flag==0){
		$scope.savedetails();
	}
	};
	$scope.savereoprtsdetail=savereoprtsdetail;

}])

.directive('autocompletereportpara', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				//console.log(element);
				element.autocomplete({
minLength: 1,
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
						//console.log(ui.item.id);
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
	
});