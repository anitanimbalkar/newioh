angular.module('app.controllers')
    .controller('examCtrl',  
		['$scope','examReqApi', 'dosageApi','$routeParams','$location','examinationService','formApi','xmppService','appointmentService',
		 function($scope,examReqApi,dosageApi,$routeParams,$location, examinationService, formApi, xmppService,appointmentService) {
		     var appointmentid = $routeParams.appointment_id;
			examinationService.getExaminationData($scope.appointmentid).then(function(data){
				$scope.examination_data = data;
				//getAutoPopulatedMedicines($scope.appointmentid);
			});

		     $scope.selected = 'main complaint';
		     $scope.isForm = 0;
			 
			 // Added for Dosage Calculation //
			 appointmentService.getAppointmentData(appointmentid)
			  .then(function(data){
				$scope.appointment_info = data;
					var d1 = new Date($scope.appointment_info.DOB);
					var d2 = new Date();
					var ms = d2-d1;
					var years = (((ms/1000)/3600)/24)/365;
					if (years < 14) {
						$scope.showimmu=true;
					} else {
						$scope.showimmu=false;
					}
			 });			 
			 //--------------------------------
				 
		     var is_selected = function(link_name){
			 if(link_name == $scope.selected){
			     return 'active';
			 }
		     };
		     $scope.is_selected = is_selected;
		     $scope.menu = examinationService.getMenu(appointmentid);
			 $scope.restore_questions = function(){
				 console.log("Restore_questions");
				 if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
						 var changedQuestions = $scope.examination_data['changedQuestions'];
					 for(var i in changedQuestions){
						 var formName = i;
						 console.log(formName);
						 var formData = $scope.examination_data['forms'][i];
						 var form = new formmodule();
						 form.showForm(formName, formData.isSubForm, formData.formTarget, formData.formTextTarget, formData.data);
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
						 $('#'+formName).find('.formContent').trigger('change');
					 }
				 }
		     };
		     if(!$scope.menu){
						 		examReqApi.get({},
					function(data){
						examinationService.setMenu(data, appointmentid);
						console.log($scope.examination_data);
								
					    $scope.menu = examinationService.getMenu(appointmentid);
						if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
							for(var key in $scope.menu.examinationMenu)
							{
								$scope.showForm($scope.menu.examinationMenu[key], 'examinations', 'true', 'examinations_target',1,1);
							}
							$scope.showForm('vitals','examinations','false', 'vitals_target',1,1);
						}
						setTimeout(function(){
								console.log($scope.examination_data);
								if($scope.examination_data['changedQuestions'] != undefined && !(jQuery.isEmptyObject($scope.examination_data['changedQuestions']))){
									 var changedQuestions = $scope.examination_data['changedQuestions'];
									 for(var i in changedQuestions){
										 var formName = i;
										 var formData = $scope.examination_data['forms'][i];
										 var form = new formmodule();
										 form.showForm(formName, formData.isSubForm, formData.formTarget, formData.formTextTarget, formData.data);
										 for(var j in changedQuestions[i]){
											var answerElement = $('#'+j).find('.formtextarea');
											if(answerElement.length){
												$(answerElement).val(changedQuestions[i][j].a);
											}else{
												answerElement = $('#'+j).find('.formmultiselect');
												var obj = answerElement[0];
												var arr = changedQuestions[i][j].split(',');
												$(answerElement).val(arr);
												$(answerElement).multiselect("refresh");
											}
										 }
										 $('#'+formName).find('.formContent').trigger('change');
									 }
								 }
								
						}, 3000); 
					});
		     }else{
				$scope.restore_questions();
		     }
		     
		     $scope.$on('ngRepeatFinished', function(event){
			// $scope.restore_questions();
		     });
		    
					 
		     $scope.showForm = function(formName,formType, isSubForm, formTarget, formTextTarget,notselected){
				 if(notselected == undefined){
					$scope.selected = formName;
				 }				 
				 $scope.isForm = 1;
				 if($scope.show_examination_menu){
				 	$scope.show_examination_menu = !$scope.show_examination_menu;
				 }
				 if($scope.show_symptomatic_menu){
				 	$scope.show_symptomatic_menu = !$scope.show_symptomatic_menu;
				 }
				 $('#form_place_holder').children().hide();
				 if($('#'+formName).length != 0){
					 $('#'+formName).show(500);
				 }
				 else{
					 formApi
					 .get({formid: formName, formType: formType},
						  function(data){
						  if(data['type'] == 'error')
							  alert(data['value']);
						  else{
							  var form = new formmodule();
							  $scope.examination_data['forms'][formName] = {'isSubForm': isSubForm, 'formTarget': formTarget, 'formTextTarget': formTextTarget, 'data': data['value']};
							  if(notselected == undefined){
								form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value']);
							  }
						  }
						  });
				 }
		     }

		     function viewSummary(){
				 var location="";
				 prepareEmrForm();
				 $.ajax({
					 type: "post",
					 url: "/ayushman/newcemrdashboard/viewSummary",
					 data: $("#emrform").serialize(),
					 success:function( data ){
					 if(data != 'error'){
						 location = data;
						 //if(relativeStatus == "Connected"){
						 //parent.parent.sendmsgfromtemplate('GET DATA',connectedRelativeId);
						 //}
						 var win=window.open('/ayushman/'+location, '_blank');
						 win.focus();
					 }
					 else
						 alert('Please Try Again');
					 },
					 error:function(){
					 showMessage('250','50','Send Data to patient','Error occured while saving data. Please contact your system administrator.','error','id');
					 }
				 });
		     }
		     $scope.$on('view_summary', viewSummary);
			
		    

		     $('#searchpopup').dialog({
			 position: "top",
			 autoOpen: false,
			 show: "fade",
			 hide: "fade",
			 width: "90%",
			 modal: true,
			 height: "auto",
			 resize: "auto",
			 resizable: false
		     });
		     $('#searchbox').autocomplete({
			 select: function(event, ui) {
			     getSearchResults(ui.item.value);
			 },
			 minlength: 1,
			 disable: false,
			 source: "/ayushman/cautocompletedata/retrieve?query=select DISTINCT drugGenericName_c as value from drugmasters where active_c=1 and drugGenericName_c"
		     });
		     $(".ui-dialog-titlebar").hide();
			 
			 // same function is written in controllers/templatectrl.js
		     $scope.$on('end_consultation', function(){
				 consultationMode = ($scope.appointment_info.mode).toLowerCase();
				 payment_mode = ($scope.appointment_info.paid_c);
				 if($scope.appointment_info.mode == 'Online'){
					 if(sentDataFlag == false){
					 alert("Please Click on 'SEND DATA' before ending consultation");
					 }
					 else{
					 showMessage('300','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
					 }	
				 }
				 else{
					 showMessage('250','50','End Consultation','Do you really want to end consultation?','confirmation','confirmEndConsultation');	
				 }
		     });
		     AssnHeightExam();
				window.onbeforeunload = function (e) {
					if($scope.unsavedData){
						var e = e || window.event;
						var msg = "You have unsaved changes.";
						if (e) {
						 e.returnValue = msg;
						}
						else{
							return msg;
						}
					}
				};
		     $scope.$on('$locationChangeStart', function (event, newUrl, oldUrl) {
				$scope.examination_data['changedQuestions'] = changedQuestion;
				$scope.examination_data['examinationQuestions'] = examinationQuestion;
		     });
		 }])
    .directive('onFinishRender', function ($timeout) {
		return {
				restrict: 'A',
				link: function (scope, element, attr) {
					if (scope.$last) {
								$timeout(function () {
						scope.$emit('ngRepeatFinished');
								});
					}
				}
		}
    });
