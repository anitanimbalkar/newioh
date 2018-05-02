angular.module('app.controllers')
    .controller('personalizationCtrl',
		['$scope','personalizationService','formApi',
			function($scope,personalizationService,formApi) {
				$scope.specialities = new Array();
				$scope.selectedSpeciality = new Array();
				
				$scope.forms = new Array();
				$scope.selectedForm = new Array();
				
				$scope.choosenForms = {};
				$scope.choosenForms.examination = new Array();
				
				$scope.getSpecialityForms = function(){
					personalizationService.getSpecialityForms($scope.selectedSpeciality).then(function(data){
						$scope.forms = data;
						$scope.choosenForms.examination = $scope.forms.examinationselectedforms;	
						$scope.selectedForm = $scope.forms.examination[0].id;
						$scope.selectedFormLabel = $scope.forms.examination[0].label;
						$scope.show_form();

					});
				}
				
			
				personalizationService.getSpecialities().then(function(data){
					$scope.specialities = data;
					$scope.selectedSpeciality = $scope.specialities.doctorspeciality[0].id;

					personalizationService.getForms($scope.selectedSpeciality).then(function(data){
						$scope.forms = data;
						console.log($scope.forms);
						$scope.choosenForms.examination = $scope.forms.examinationselectedforms;	
						if(data.examination.length != 0){
							$scope.selectedForm = $scope.forms.examination[0].id;
							$scope.selectedFormLabel = $scope.forms.examination[0].label;
							$scope.show_form();
						}						
					});
				});
				
				$scope.get_objects = function (obj, key, val) {
					var objects = [];
					for (var i in obj) {
						if (!obj.hasOwnProperty(i)) continue;
						if (typeof obj[i] == 'object') {
							objects = objects.concat($scope.get_objects(obj[i], key, val));
						} else if (i == key && obj[key] == val) {
							objects.push(obj);
						}
					}
					return objects;
				}
				
				$scope.show_form = function (){

					obj = $scope.get_objects($scope.forms.examinationallforms,'id',$scope.selectedForm[0]);
					$('#form_place_holder').empty();
					
					$scope.selectedFormLabel = obj[0].label;
					
					formType = 'examinations';
					formName = obj[0].name
					isSubForm = false;
					formTarget = 'form_place_holder';
					formTextTarget = '';
					
					formApi
					.get({formid: formName, formType: formType},
						function(data){
						if(data['type'] == 'error')
							alert(data['value']);
						else{
							var form = new formmodule();
							form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value']);
						}
					});
				}
							
				$scope.add = function(){
					for(j=0;j<$scope.selectedForm.length;j++){
						
						obj = $scope.get_objects($scope.forms.examination,'id',$scope.selectedForm[j]);
						obj1 = $scope.get_objects($scope.choosenForms.examination,'id',$scope.selectedForm[j]);
						if(obj1[0] != undefined){
							
						}					
						else{
							$scope.choosenForms.examination.push(obj[0]);
							ids = '';
							for(i=0;i< $scope.choosenForms.examination.length; i++){
								if(i == 0){
									ids = $scope.choosenForms.examination[i].id;
									console.log(ids);
								}else{
									ids = ids +','+ $scope.choosenForms.examination[i].id;
									console.log(ids);
								}	
							}
							personalizationService.saveForms(ids);
						}					
					}					
				}
				
				$scope.remove = function(){
					for(j=0;j<$scope.selectedForm.length;j++){
						obj = $scope.get_objects( $scope.choosenForms.examination,'id',$scope.selectedForm[j]);
						if(obj[0] != undefined){
							var index = $scope.choosenForms.examination.indexOf(obj[0]);
							$scope.choosenForms.examination.splice(index, 1); 
							
							ids = '';
							for(i=0;i< $scope.choosenForms.examination.length; i++){
								if(i == 0){
									ids = $scope.choosenForms.examination[i].id;
								}else{
									ids = ids +','+ $scope.choosenForms.examination[i].id;
								}							
							}
							personalizationService.saveForms(ids);	
						}					
						else{
							alert("Please Select a form name from the 'selected Forms' list");
						}	
					}									
				}				
			}
		]
	);
	