angular.module('app.controllers') .controller('uploadorderreports',['$scope','$fileUploader','$http','emrService',function($scope,$fileUploader, $http,emrService){
	$scope.testids = {};
	var para={};
	var parame={};
	$scope.parameter_units={};
	$scope.parameter_ids={};
	$scope.parameterdata={};
	$scope.tag={};
	$scope.paramdata={};
	$scope.parameter_ids={};
	$scope.para={};
	$scope.parame={};
	$scope.parameter_units={};
	$scope.allunits={}
	$scope.otherunits={};
	$scope.param_ref={};
	$scope.param_testid={};
	$scope.parameterdata={};
	$scope.testid='';
	$scope.patienttestreportid='';
	$scope.referenceId = '';
	$scope.referenceBy=null;
	$scope.samplePlace='Lab';
	$scope.sampleDate='';
	$scope.sampleId='';
	$scope.preparedby='';
	$scope.completeall = 1;
	$scope.reportSummary ={};
	
	$.ajax({
		type: "POST",
		url: "/ayushman/upload/gettodaydate",
		success: function(data) 
		{
			$scope.tag.Date = data;
			$scope.sampleDate = data;
		}
	});
	
	$.ajax({
		type: "POST",
		url: "/ayushman/cpathologist/getdocname?orderid="+$('#orderid').val(),
		success: function(data) 
		{
			$scope.referenceBy=data;
		}
	});
	
	
	var uploader = new Array();
	$.ajax({
		type: "GET",
		url: "/ayushman/cpathologist/gettestandbattery?orderid="+$('#orderid').val(),
		success: function(data) {
			$scope.testids = jQuery.parseJSON(data);
			$scope.uploader = new Array();
			
			for(var i=0; i<$scope.testids.length;i++){
				
				for(var j=0;j<$scope.testids[i].parameters.length; j++){	
					$scope.parameter_units[$scope.testids[i].parameters[j]['id']] = {};
					$scope.parameter_units[$scope.testids[i].parameters[j]['id']] = $scope.testids[i].parameters[j].defaultunit;
					console.log($scope.parameter_units[$scope.testids[i].parameters[j]['id']]);
					
					//$scope.parameter_ids[$scope.testids[i].parameters[j]['id']] = {};					
					//$scope.parameter_ids[$scope.testids[i].parameters[j]['id']] = $scope.testids[i].parameters[j]['defaultunit'];
				}

				uploader[$scope.testids[i].id] = $scope.uploader[$scope.testids[i].id] = $fileUploader.create({
						scope: $scope,                          // to automatically update the html. Default: $rootScope
						url: '/ayushman/upload/saveuploadedreports?id='+$scope.testids[i].id,
						formData: [
							{ key: 'value' }
						],
						filters: [
							function (item) {                    // first user filter
								return true;
							}
						]
				});
				var item = new Array();
				item[$scope.testids[i].id] = {
				
				};
				item[$scope.testids[i].id].remove = function() {
					uploader[$scope.testids[i].id].removeFromQueue(this);
				};
				
				uploader[$scope.testids[i].id].filters.push(function (item) { // second user filter
					
					if($scope.uploader[$scope.fileid] == this){
						
					}else{
						return false;
					}
					
					setTimeout(resize, 1000);
					console.log(item);
					if(item.type == 'application/pdf' || item.type == 'image/png' || item.type == 'image/x-png' || item.type == 'image/jpeg' || item.type == 'image/bmp' || item.type == 'image/jpg' || item.type == '' ){
						for(var i=0; i < this.queue.length; i++){
							//if(this.queue[i].file.type == 'application/pdf'){
								//alert('One PDF file OR multiple images are allowed.');
								//return false;
							//}
						}			
						if(item.type == 'application/pdf' && this.queue.length == 0){
							return true;
						}else if(item.type != 'application/pdf'){
							return true;
						}else if(item.type == 'application/pdf' && this.queue.length > 0){
							alert('One PDF file OR multiple images are allowed.');
							return false;
						}
					}else{
						alert('Not supported file type. Supported file types (.PDF, .jpg, .png, .jpeg, .bmp)');
						return false;
					}
				});
				
				
			}
			$scope.$apply();
		}
	});
	
	$scope.fileid = {};
	$scope.onFileSelect = function($id) {
		$scope.fileid = $id;
	};
	$scope.upload = function(){
		parent.pagebusy();
		var key,flag=0;
		if(!$scope.tag.Date){
			$scope.tag.Date='';
		   //alert("Please enter Order Date");
		   //flag=1;
		}
		/*for(key in $scope.parameter_ids){	// check unit drop down are selected or not 
			if ($scope.parameter_ids[key]=='Select Value'){
				   alert("Please select Presence value for "+$scope.parameterdata[key]);
				   flag=1;
			}
			if (($scope.parameter_ids[key]!='absent')&& ($scope.parameter_ids[key]!='present')){
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
    	
    	}*/
		// No check on the data entered so allow all the data
	    if(flag==0){
			//$scope.uploader.forEach(function(entry) {
			//	entry.uploadAll();
			//});
			
						//if($scope.parameter_ids)
						//{
							
							var key;
							
							
							for(key in $scope.parameter_ids){			//Create array for details of each parameter attached to report
								var arrayparadata={};	
									arrayparadata['parameterid']=key;
									if ($scope.parameterdata[key]==undefined){arrayparadata['parametername']="";}
									else{arrayparadata['parametername']=$scope.parameterdata[key];}
									
									if ($scope.parameter_ids[key]==undefined){arrayparadata['value']="";}
									else{arrayparadata['value']=$scope.parameter_ids[key];}
									
									if ($scope.parameter_units[key]==undefined){arrayparadata['unit']="";}
									else{arrayparadata['unit']=$scope.parameter_units[key];}
									
									if($scope.param_ref[key]==undefined){arrayparadata['ref']="";}
									else{arrayparadata['ref']=$scope.param_ref[key];}
																	
									if($scope.param_testid[key]==undefined){arrayparadata['testid']="";}
									else{arrayparadata['testid']=$scope.param_testid[key];}
									para[key]=arrayparadata;
									//console.log(key);
									//console.log($scope.param_testid[key]);
										}
							
						//console.log(para);
							
							$scope.tag.parameter_units=$scope.parameter_units;
							//$scope.tag.parameter_ids=$scope.parameter_ids;
							$scope.tag.parameters=para;
						//}

						var tempa=JSON.stringify($scope.tag);
						//console.log(tempa);
						var patienttestreportid=$scope.patienttestreportid;
						var testid = '';
						for(var i=0; i<$scope.testids.length;i++){
							
							testid = $scope.testids[i].id;
							testfilename = $scope.testids[i].testfile;

								if ($scope.testids[i].reportSummary == undefined){reportSummary = "";}
								else{reportSummary = $scope.testids[i].reportSummary;}
								var temp={params:tempa,pasttestreportid:patienttestreportid,testid:testid,otherunits:$scope.otherunits,referenceId:$scope.referenceId,referenceBy:$scope.referenceBy,samplePlace:$scope.samplePlace,sampleDate:$scope.sampleDate,sampleId:$scope.sampleId,preparedby:$scope.preparedby,reportSummary:reportSummary,testfile:$scope.testids[i].testfile};
								para={};
									// Generate Report File
									//console.log(temp);
						
								$.ajax({
										type: "POST",
										data:temp,
										url: "/ayushman/upload/saveorderreports?orderid="+$('#orderid').val(),
										success: function(data) 
										{
											//console.log(data);
											$scope.$broadcast('get_reports');
											$scope.showDetails = !$scope.showDetails;
											/*if($scope.completeall == $scope.testids.length){
												$.ajax({
													type: "POST",
													data:{referenceId:$scope.referenceId,referenceBy:$scope.referenceBy,samplePlace:$scope.samplePlace,sampleDate:$scope.sampleDate,sampleId:$scope.sampleId,preparedby:$scope.preparedby},
													url: "/ayushman/upload/closeorder?orderid="+$('#orderid').val(),
													success: function(data) 
													{
														parent.pageloaded();
														window.history.back();
													}
												});
												
											}else{
												$scope.completeall++;
											}	*/	
												parent.pageloaded();											
										},
										error:function(data){
											alert('Retry uploading Reports.');
											parent.pageloaded();
											window.history.back();
										}
									});
									
									}
		}
		return true;
	};
	
	$scope.savepathreport=function(){
		if($scope.parameter_ids)
						{
							var key;
							for(key in $scope.parameter_ids){			//Create array for details of each parameter attached to report
								var arrayparadata={};	
									arrayparadata['parameterid']=key;
									if ($scope.parameterdata[key]==undefined){arrayparadata['parametername']="";}
									else{arrayparadata['parametername']=$scope.parameterdata[key];}
									
									if ($scope.parameter_ids[key]==undefined){arrayparadata['value']="";}
									else{arrayparadata['value']=$scope.parameter_ids[key];}
									
									if ($scope.parameter_units[key]==undefined){arrayparadata['unit']="";}
									else{arrayparadata['unit']=$scope.parameter_units[key];}
									
									if($scope.param_ref[key]==undefined){arrayparadata['ref']="";}
									else{arrayparadata['ref']=$scope.param_ref[key];}
																	
									para[key]=arrayparadata;
							}
							
							$scope.tag.parameter_units=$scope.parameter_units;
							//$scope.tag.parameter_ids=$scope.parameter_ids;
							$scope.tag.parameters=para;
						}

						var tempa=JSON.stringify($scope.tag);
						//console.log(tempa);
						var patienttestreportid=$scope.patienttestreportid;
						var testid = '';
						for(var i=0; i<$scope.testids.length;i++){
							testid = $scope.testids[i].id;
							testfilename = $scope.testids[i].testfile;							
								
								if ($scope.testids[i].reportSummary == undefined){reportSummary = "";}
								else{reportSummary = $scope.testids[i].reportSummary;}
								var temp={params:tempa,pasttestreportid:patienttestreportid,testid:testid,otherunits:$scope.otherunits,referenceId:$scope.referenceId,referenceBy:$scope.referenceBy,samplePlace:$scope.samplePlace,sampleDate:$scope.sampleDate,sampleId:$scope.sampleId,preparedby:$scope.preparedby,reportSummary:reportSummary,testfile:$scope.testids[i].testfile};
								para={};
								
						}									// Generate Report File
									//console.log(temp);
									$.ajax({
		type: "POST",
		data:temp,
			url: "/ayushman/upload/closeorder?orderid="+$('#orderid').val(),
			success: function(data) 
			{
				console.log(temp);
				
				parent.pageloaded();
				window.history.back();
			},
			
		});
	
	
};

	function repeatTest($scope) {
  $scope.people = [
    {name: "Bob", gender: "Male", details: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis nisi quis mi tincidunt luctus ut quis nunc. Nam non risus tincidunt risus sodales condimentum. Morbi sed gravida elit. Nunc a turpis vestibulum elit posuere blandit. Phasellus luctus lectus non porta auctor. Etiam pellentesque imperdiet posuere. Nullam adipiscing congue nisl, in vulputate odio ornare ac."},
    {name: "Jane", gender: "Female", details: "Maecenas quis sodales lectus, vitae convallis ipsum. Ut ac viverra tellus. Quisque vulputate, orci placerat eleifend scelerisque, eros nunc rutrum odio, pharetra mattis leo neque vel eros. Cras id purus nec lorem vehicula rutrum a vel arcu. Quisque eget euismod augue. Integer volutpat auctor lorem, quis lacinia nisl tempus nec. Nunc fringilla, odio eget molestie varius, tortor turpis dignissim lacus, sed varius nunc velit eu turpis. Etiam sed congue diam. In ornare elit nec dolor faucibus ornare. Ut eget erat vel elit tristique iaculis. Maecenas et semper lorem. Nam mollis ante et ipsum vestibulum posuere. Ut non purus non risus tempor vulputate et vitae ipsum. Mauris et sem sit amet quam pulvinar fringilla."},
    {name: "Bill", gender: "Male", details: "Quisque rhoncus scelerisque sapien, tempor vestibulum dui tincidunt eu. Maecenas scelerisque, dolor sed vehicula pulvinar, ligula erat ornare arcu, in dictum ipsum libero vel est. Donec porttitor venenatis lacus, a laoreet orci. Proin quam mi, ultrices in ullamcorper vel, malesuada suscipit lectus. Nam faucibus commodo quam, auctor vehicula felis condimentum quis. Phasellus tempor molestie enim, at vehicula justo auctor eu. Pellentesque venenatis elit eu malesuada fringilla."}
  ];
}
	
}]).directive('jqdatepicker', function() {
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
});
