angular.module('app.controllers') .controller('uploadPrescriptionCtrl',['$scope','$fileUploader','$http','formApi','emrService',function($scope,$fileUploader, $http,formApi,emrService){
        $scope.step = 1;
		$scope.isdate=0;
		$scope.i=500;
		$scope.j=1200;
		$scope.activestyle1 = {"background":'#27AE60'};
		$scope.activestyle2 = {"background":'gray'};
		$scope.activestyle3 = {"background":'gray'};
		$scope.examination_data = {};
		$scope.examination_data['changedQuestions'] = {};
		$scope.appointmentdate="";
		$scope.maincomplaint="";
		$scope.Drname="";
		$scope.diagnosis="";
		$scope.incident="";
		$scope.followup="";
		$scope.medicines="";
		$scope.tests="";
        $scope.setStep = function(step){
			 $scope.step = step;
 			 console.log("setStep",step);
			 if(step=='1')
			 {
				$scope.activestyle1 = {"background":'#27AE60'};
				$scope.activestyle2 = {"background":'gray'};
				$scope.activestyle3 = {"background":'gray'};
				
			 }
			if(step=='2')
			{	
				console.log("If step== 2");
				$scope.activestyle2 = {"background":'#27AE60'};
				$scope.activestyle3 = {"background":'gray'};
				$scope.showForm('Prescription-Tags','tags','false', '','','Tags_place');
				$scope.isdate=1;
				
				setTimeout(function(){$scope.showForm('Prescription-Tags','tags','false', '','','Tags_place'); 
					$('#Prescription-Tags_a_1').change(function()
					{	
						$scope.isdate=1;
						console.log($scope.isdate);
						$scope.$apply();
					}).change();
					$('#Prescription-Tags_a_6').change(function()
					{
						str=$(this).val();
						var medarray = str.split(",");
						console.log(medarray);
						var temp;
						var temphtml='<div>';
						for (temp in medarray)
						{
						temphtml+='<div>'+medarray[temp]+'</div>';
						}
						temphtml+='</div>';
						console.log(temphtml);
						
						$("#medicinediv").html(temphtml);
					}).change();
					$('#Prescription-Tags_a_7').change(function()
					{
						str=$(this).val();
						var medarray = str.split(",");
						console.log(medarray);
						var temp;
						var temphtml='<div>';
						for (temp in medarray)
						{
						temphtml+='<div>'+medarray[temp]+'</div>';
						}
						temphtml+='</div>';
						console.log(temphtml);
						
						$("#testdiv").html(temphtml);
					}).change();
					//$('#Prescription-Tags_a_7').change();$('#Prescription-Tags_a_6').change();	
				}, 300);
				//console.log($scope.isdate);
							}
			if(step=='3')
			{
				
				$scope.examination_data['changedQuestions'] = changedQuestion;
				$scope.activestyle3 = {"background":'#27AE60'};
				$scope.showForm('Prescription-Tags','tags','false', '','','Tags_place_holder');
				setTimeout(function(){$scope.showForm('Prescription-Tags','tags','false', '','','Tags_place_holder');
					$('#Prescription-Tags_a_6').change(function()
					{
						str=$(this).val();
						var medarray = str.split(",");
						console.log(medarray);
						var temp;
						var temphtml='<div>';
						for (temp in medarray)
						{
						temphtml+='<div>'+medarray[temp]+'</div>';
						}
						temphtml+='</div>';
						console.log(temphtml);
						console.log($("#medicine2div"));
						
						$("#medicine2div").html(temphtml);
					}).change();
					$('#Prescription-Tags_a_7').change(function()
					{
						str=$(this).val();
						var medarray = str.split(",");
						console.log(medarray);
						var temp;
						var temphtml='<div>';
						for (temp in medarray)
						{
						temphtml+='<div>'+medarray[temp]+'</div>';
						}
						temphtml+='</div>';
						console.log(temphtml);
						console.log($("#test2div"));
						$("#test2div").html(temphtml);
					}).change();




					//$('#Prescription-Tags_a_7').change();$('#Prescription-Tags_a_6').change();	
					}, 300);
					
			}
		}
		
		//var t;
		
	'use strict';
	$scope.tag = {};
	$scope.para={};
	$scope.newincident="";
	var i;
	var $pageLength;
	$scope.patienttestreportid;

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
	};
	$scope.reset = reset;
	
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
	$scope.restore_questions = function(){
				//readCookie('examinationQuestion');
				 if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
					 var changedQuestions = $scope.examination_data['changedQuestions'];
					 console.log($scope.examination_data);
					 for(var i in changedQuestions){
						
						 for(var j in changedQuestions[i]){
							var answerElement = $('#'+j).find('.formtextarea');
							if(answerElement.length){
								$(answerElement).val(changedQuestions[i][j]);
							}else{
								answerElement = $('#'+j).find('.formmultiselect');
								var obj = answerElement[0];
								var arr = changedQuestions[i][j].split(',');
								$(answerElement).val(arr);
								$(answerElement).multiselect("refresh");
								/*if(obj != undefined){
									var selectedvalues= "";
									for (var x=0;x<obj.length;x++){
										if(jQuery.inArray( obj.options[x].text, arr )){
											obj.options[x].attr("selected",true);
										}
									}
								}*/
							}
							
							 
						 }
						 $('#Prescription-Tags').find('.formContent').trigger('change');
					 }
				 }
		     };
	//for tagging form creation
	$scope.showForm = function(formName,formType, isSubForm, formTarget, formTextTarget,displaytarget){
		$scope.selected = formName;
		$scope.isForm = 1;
		 if($('#Prescription-Tags').length != 0){
					 $('#Prescription-Tags').show(500);
				 }
				 else
		{
			formApi
			.get({formid: formName, formType: formType},
			function(data){
				if(data['type'] == 'error')
				alert(data['value']);
				else{
					var form = new formmodule();
					$scope.data[formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
					form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value'],displaytarget);
					$scope.restore_questions();
				}
			});
		}
	}
	
	
	// ADDING FILTERS

	uploader.filters.push(function (item) { // second user filter
		if(item.type == 'application/pdf' || item.type == 'image/png' || item.type == 'image/x-png' || item.type == 'image/jpeg' || item.type == 'image/bmp' || item.type == 'image/jpg'){
			for(var i=0; i < uploader.queue.length; i++){
				if(uploader.queue[i].file.type == 'application/pdf'){
					alert('One PDF file OR multiple images are allowed.');
					return false;
				}
			}			
			if(item.type == 'application/pdf' && uploader.queue.length == 0){
				return true;
			}else if(item.type != 'application/pdf'){
				return true;
			}else if(item.type == 'application/pdf' && uploader.queue.length > 0){
				alert('One PDF file OR multiple images are allowed.');
				return false;
			}
		}else{
			alert('Not supported file type. Supported file types (.PDF, .jpg, .png, .jpeg, .bmp)');
			return false;
		}
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
		console.log(changedQuestion);
		$scope.appointmentdate=changedQuestion['Prescription-Tags']['Prescription-Tags_q_1'];
		$scope.maincomplaint=changedQuestion['Prescription-Tags']['Prescription-Tags_q_4'];
		$scope.Drname=changedQuestion['Prescription-Tags']['Prescription-Tags_q_3'];
		$scope.diagnosis=changedQuestion['Prescription-Tags']['Prescription-Tags_q_5'];
		$scope.incident=changedQuestion['Prescription-Tags']['Prescription-Tags_q_2'];
		$scope.followup=changedQuestion['Prescription-Tags']['Prescription-Tags_q_8'];
		$scope.medicines=changedQuestion['Prescription-Tags']['Prescription-Tags_q_6'];
		$scope.tests=changedQuestion['Prescription-Tags']['Prescription-Tags_q_7'];
		
		$("#appointmentdate").val($scope.appointmentdate);
		$("#maincomplaint").val($scope.maincomplaint);
		$("#Drname").val($scope.Drname);
		$("#diagnosis").val($scope.diagnosis);
		$("#incident").val($scope.incident);
		$("#followup").val($scope.followup);
		$("#medicines").val($scope.medicines);
		$("#tests").val($scope.tests);
		
		
		
		$scope.$apply();
		console.log($scope.appointmentdate);
		//if($scope.completeall==1)
		{
			
			if($scope.para)
			{
				$scope.tag.parameters=$scope.para;
			}
			if($scope.tag.incident==0)
			{
				$scope.tag.incident=$scope.newincident;
			}
			if($scope.tag.visit)
			{
				
				var temptag=JSON.parse($scope.tag.visit);
				//$scope.tag.visit=temptag[0];
			}
			var tempa=JSON.stringify($scope.tag);
			var pasttestid=	$scope.patienttestreportid;
			$.ajax({
						 type: "post",
						 url: "/ayushman/upload/saveprescriptiondata",
						 data: $("#emrform").serialize(),
						 success:
						 function( data ){
						 if(data){
							// sendMessage("Get Data");
							//$scope.getReports();
$scope.getvisitdata();							
						 }
						 else
						 {
							$scope.getvisitdata();
							//$scope.getReports(); 
						 }
							 
						 },
						 error:
						 function(){
							showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
						 },
					 });
					 }
});
	uploader.bind('progressall', function (event, progress) {
	
		if(progress==100)
		$scope.completeall=1;
});

}]);
	  
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