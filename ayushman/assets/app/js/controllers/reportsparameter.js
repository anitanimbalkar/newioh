angular.module('app.controllers')
.controller('reportsparameter',
['$scope','$http','appointmentService','$routeParams',
function($scope,$http,appointmentService,$routeParams) {
	$scope.tag = {};
	var para={};
	var parameterunit={};
	$scope.parameter_ids={};
	$scope.parameter_refs={};
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.paramdata={};
	$scope.testid;
	var i;
	var $pageLength;
	$scope.completeall=0;
	var appointmentid = $routeParams.appid;
	appointmentService.getAppointmentData(appointmentid)
		.then(function(data){
			$scope.appointment_info = data;
				$scope.tag.incident=$scope.appointment_info.incidentid;
				$scope.tag.Suggestedby=$scope.appointment_info.doctorname;
				$scope.tag.visit='["On '+$scope.appointment_info.appdate+' with '+$scope.appointment_info.doctorname+'","'+$scope.appointment_info.doctorname+'","'+$scope.appointment_info.incidentid+'","'+$scope.appointment_info.appointment_id+'"]';

	});
	//--------------------------------------
	// Get doctor personalised paramaters
	//--------------------------------------
	var getParam = function(){
		$.ajax({
			url: "/ayushman/cdoctorpathtest/getPersonparameter",
			success: function(data) 
			{
				$scope.paramdata={};
				$scope.parameter_units={};
				$scope.parameter_ids={};
				$scope.parameter_refs={};				
				$scope.otherunits={};
				$scope.paramdata=JSON.parse(data);				
				for(var index=0;index<$scope.paramdata.length;index++){
					$scope.parameter_units[$scope.paramdata[index]['id']]=$scope.paramdata[index]['defaultunit'];
				}
				$scope.$apply();
				resize();
			}			
			});
	}
	$scope.getParam = getParam;
	$scope.getParam();
	
	var reset=function(){
	$scope.tag.Date='';
	$scope.tag.Lab='';
	$scope.tag.testname='';
	document.getElementById("btn_savereoprtsdetail").disabled = false;
	$scope.paramdata={};
	$scope.parameter_ids={};
	$scope.parameter_refs={};
	
	$scope.parameter_units={};
	$scope.otherunits={};
	$scope.parameterdata={};
	$scope.testid='';
	document.getElementById("Datetxt1").value='';
	document.getElementById("testnametxt1").value='';
	$scope.examination_data.text_reportparameter = "";
	$scope.examination_data.parameterids = "";
	$scope.examination_data.text_onlyparameter = "";
	$scope.examination_data.text_onlydate = "";
	$scope.examination_data.text_onlylab = "";
	$scope.examination_data.text_onlyrefrange = "";
	
	$scope.report_text = "";
	$scope.report_ids = "";
	$scope.testdatastr = "";
	$scope.testparaids = "";
	$scope.getParam();
	document.cookie = 'report_text='+$scope.report_text +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	document.cookie = 'report_ids='+$scope.report_ids +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	document.cookie = 'report_onlyparameter='+$scope.report_onlyparameter +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	document.cookie = 'report_onlylab='+$scope.report_onlylab +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	document.cookie = 'report_onlydate='+$scope.report_onlydate +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	document.cookie = 'report_onlyrefrange='+$scope.report_onlyrefrange +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
	};
	$scope.reset = reset;
	
	var savedetails =function () {
		//if($scope.tag.Date && $scope.tag.testname){
		if($scope.tag.Date){
			if($scope.parameter_ids)
			{
				$scope.testdatastr = "";
				$scope.testparaids = "";
				$scope.onlyparamter = "";
				$scope.onlydate = "";
				$scope.onlylab = "";
				$scope.onlyrefrange = "";
				var key;
				var i=0;
				for(key in $scope.parameter_ids){			//Create array for details of each parameter attached to report
					var arrayparadata={};	
						arrayparadata['parameterid']=key;
						arrayparadata['parametername']=$scope.parameterdata[key];
						arrayparadata['value']=$scope.parameter_ids[key];
						arrayparadata['unit']=$scope.parameter_units[key];
						arrayparadata['refrange']=$scope.parameter_refs[key];
						console.log(arrayparadata);
						para[key]=arrayparadata;
						if ($scope.paramdata[i]['units'][0]['unitname'] != 'N/A')
							unit = " " +$scope.paramdata[i]['units'][0]['unitname'] + " ";
						else
							unit = " ";
						if($scope.tag.Lab == "" || $scope.tag.Lab == " " || $scope.tag.Lab == undefined)
							labname = "";
						else
							labname = "(" + $scope.tag.Lab + ")";
						if(arrayparadata['refrange']=="" || arrayparadata['refrange']==" " || arrayparadata['refrange']==undefined )
							refrange = "";
						else
							refrange = " Ref : "+ arrayparadata['refrange'] + " ";
						
						$scope.onlyparamter = $scope.onlyparamter + arrayparadata['parametername'] + " : " + arrayparadata['value'] + " " + unit + ", "
						$scope.onlydate = $scope.onlydate + $scope.tag.Date+", ";
						$scope.onlylab = $scope.onlylab +  $scope.tag.Lab +", ";
						$scope.onlyrefrange = $scope.onlyrefrange + arrayparadata['refrange'] + ", ";

						$scope.testdatastr = $scope.testdatastr + "("+$scope.tag.Date + ")" + labname + arrayparadata['parametername'] + " : " +arrayparadata['value'] + " " + unit + refrange + " ,";
						$scope.testparaids = $scope.testparaids + key +":"+ arrayparadata['value'] +":"+$scope.tag.Date+",";				

						/*if($scope.paramdata[i]['units'][0]['unitname'] != 'N/A')
						{
							$scope.testdatastr = $scope.testdatastr + "("+$scope.tag.Date + ")" + arrayparadata['parametername'] + " : " +arrayparadata['value'] + " " +$scope.paramdata[i]['units'][0]['unitname'] + "Ref:" + arrayparadata['refrange'] + " ,";
							$scope.testparaids = $scope.testparaids + key +":"+ arrayparadata['value'] +":"+$scope.tag.Date+",";				
						}else{
							$scope.testdatastr = $scope.testdatastr + "("+$scope.tag.Date + ")" + arrayparadata['parametername'] + " : " +arrayparadata['value'] + "Ref:" + arrayparadata['refrange'] + " ,";
							$scope.testparaids = $scope.testparaids + key +":"+ arrayparadata['value'] +":"+$scope.tag.Date+",";
						}*/
						i++;
				}
				$scope.tag.parameter_units=$scope.parameter_units;
				//$scope.tag.parameter_ids=$scope.parameter_ids;
				$scope.tag.parameters=para;
			}
			var tempa=JSON.stringify($scope.tag);
			var temp={params:tempa,testid:$scope.testid,otherunits:$scope.otherunits};
			$scope.examination_data.text_reportparameter = $scope.testdatastr;
			$scope.examination_data.parameterids = $scope.testparaids;
			
			$scope.examination_data.text_onlyparameter = $scope.onlyparamter;
			$scope.examination_data.text_onlydate = $scope.onlydate;
			$scope.examination_data.text_onlylab = $scope.onlylab;
			$scope.examination_data.text_onlyrefrange = $scope.onlyrefrange;
			
			
			document.cookie = 'report_ids='+$scope.testparaids +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			document.cookie = 'report_text='+$scope.testdatastr +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			document.cookie = 'report_onlyparameter='+$scope.onlyparamter +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			document.cookie = 'report_onlydate='+$scope.onlydate +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			document.cookie = 'report_onlylab='+$scope.onlylab +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			document.cookie = 'report_onlyrefrange='+$scope.onlyrefrange +'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
			para={};
/*			$.ajax({
			type: "POST",
			data:temp,
			url: "/ayushman/upload/savereports",
			success: function(data) 
				{
					showNotification('300','20','Save data','Patients Test reports Tags Saved','notification','timernotification',3000);
					//document.getElementById("btn_savereoprtsdetail").disabled = true;
					//document.cookie = 'report_text='+$scope.testdatastr;
					$scope.examination_data.text_reportparameter = $scope.testdatastr;
				}
				
			});*/
			showNotification('300','20','Save data','Patients Test reports Tags Saved','notification','timernotification',3000);
		}
		else{
			alert('Test Date can\'t be empty');
		}
	};
	$scope.savedetails=savedetails;
	var savereoprtsdetail = function(){
	var key,flag=0;
	/*for(key in $scope.parameter_ids){
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
    }*/
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
				element.autocomplete({
					minLength: 1,
					source: function( request, response ) {
						//typeBoxQuery = "select id as id, testname_c as value from investigations where testname_c";
						typeBoxQuery = " select case when(aliasto_c = -1) then id else aliasto_c end as id,concat(testname_c,(case when (isnull(sample_c) or (sample_c = '')) then '' else concat(' (sample : ',sample_c,')') end)) AS value from testmasters where active_c = 1 and testname_c";					
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
							//scope.paramdata={};
							scope.parameter_units={};
							scope.parameter_ids={};
							scope.parameter_refs={};
							scope.otherunits={};
							//scope.paramdata=JSON.parse(data);
							[].push.apply(scope.paramdata,JSON.parse(data));
							// scope.paramdata = scope.paramdata.concat(JSON.parse(data));
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