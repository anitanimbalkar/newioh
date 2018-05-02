angular.module('app.controllers')
    .controller('personalizationCtrl',
		['$scope','$http','personalizationService','formApi','formApia',
			function($scope,$http,personalizationService,SearchCtrl,formApi,formApia) {
				$scope.medicineId='';
				$scope.instructionId='';
				$scope.testId = '';
				$scope.specialities = new Array();
				$scope.selectedSpeciality = new Array();				
				$scope.forms = new Array();
				$scope.selectedForm = new Array();				
				$scope.choosenForms = {};				
				$scope.choosenForms.examination = new Array();
				
				
				
				$scope.specialitiesa = new Array();
				$scope.selectedSpecialitya = new Array();				
				$scope.forms = new Array();
				$scope.selectedForma = new Array();				
				$scope.choosenFormsa = {};				
				$scope.choosenFormsa.examinationa = new Array();
				$scope.historyallforms = new Array();
				$scope.choosenhistoryforms = new Array();
				//$scope.choosenhistoryforms.examinationa = new Array();
				
				
				
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
					//	console.log($scope.forms);
						$scope.choosenForms.examination = $scope.forms.examinationselectedforms;	
						if(data.examination.length != 0){
							$scope.selectedForm = $scope.forms.examination[0].id;
							//console.log($scope.selectedForm );
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
					formName = obj[0].name;
					isSubForm = false;
					formTarget = 'form_place_holder';
					formTextTarget = '';					
					formApi
					.get({formid: formName, formType: formType},
						function(data){
						if(data['type'] == 'error')
							//alert(data['value']);
							console.log(data['value']);
						else{
							var form = new formmodule();
							form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value']);
						}
					});
				}
								
				$scope.add = function(){
					for(j=0;j<$scope.selectedForm.length;j++){
						
						obj = $scope.get_objects($scope.forms.examination,'id',$scope.selectedForm[j]);
					//	console.log($scope.forms.examination);
						obj1 = $scope.get_objects($scope.choosenForms.examination,'id',$scope.selectedForm[j]);
						if(obj1[0] != undefined){
							
						}					
						else{
							$scope.choosenForms.examination.push(obj[0]);
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
					
	//Created by ravi
				//get all History forms
					personalizationService.historyallforms().then(function(data){
						$scope.forms = data;		
						//console.log($scope.forms);						
						$scope.historyallforms = $scope.forms.allform;
						$scope.selectedhistoryForm = $scope.forms.allform;	
						$scope.selectedForma = $scope.forms.allform;
						$scope.choosenhistoryforms= $scope.forms.historyselectedforms;
						
					   // console.log($scope.choosenhistoryforms);
						$scope.show_historyform();
						
						$scope.showdocmedicines();//added by Vijay
						$scope.showdocinstructions();//added by Pallavi
						$scope.showpathtest();//added by Anita
						$scope.showpreslabel();
						$scope.showparameter();
					});	

			 			
				$scope.show_historyform = function (formname,divtarget){

					/*obj = $scope.get_objects($scope.forms.examinationallforms,'id',$scope.selectedhistoryForm[0]);
					$('#form_place_holder').empty();
					
					$scope.selectedFormLabel = obj[0].label;
					*/
					formType = 'examinations';
					formName = formname;
					isSubForm = false;
					formTarget = divtarget;
					formTextTarget = '';					
					formApi
					.get({formid: formName, formType: formType},
						function(data){
						if(data['type'] == 'error')
							//alert(data['value']);
							console.log(data['value']);
						else{
							var form = new formmodule();
							form.showForm(formName, isSubForm, formTarget, formTextTarget, data['value'],formTarget);
						}
					});
				}						
				
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
			

			/***************************************************************************
			//By Pallavi//
			***************************************************************************/
			
			$scope.showdocinstructions = function () {
				$http.get('/ayushman/cdoctorinstruction/docinstruction')
				.success(function(response) {$scope.instructions = response;
				console.log($scope.instructions);				 
				});
			}
				
			/***************************************************************************
			//By Vijay//
			***************************************************************************/
			
			$scope.showdocmedicines = function () {
				$http.get('/ayushman/cdoctordrug/docMedicines')
				.success(function(response) {$scope.medicines = response;
				//console.log($scope.medicines);				 
				});
			}
			
			/***************************************************************************
			//By Anita//
			***************************************************************************/
			
			$scope.showpathtest = function () {
				$http.get('/ayushman/cdoctorpathtest/getTest')
				.success(function(response) {$scope.pathtests = response;
				});
			}
			$scope.showparameter = function () {
				$http.get('/ayushman/cdoctorpathtest/getParameter')
				.success(function(response) {$scope.testparams = response;
				});
			}
			$scope.showpreslabel = function () {
				$http.get('/ayushman/cdoctorpathtest/getPreslabel')
				.success(function(response) {$scope.labels = response;
				});
			}
						
			/*$scope.editdocmedicines = function (id) {
				//console.log(id);
				$http.get('/ayushman/cdoctordrug/editMedicine?medicineID='+id)
				.success(function(response) {$scope.editmed = response;
				console.log($scope.editmed);				 
				});
				
				}*/
			 
			$( "#medFrequency" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					frequency, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					$('input#medDays').focus();
					//setTimeout(function(){$('input#medDays').autocomplete("search");$('input#medDays').focus();}, 100);
				}
			});
	     	$( "#medDays" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					personalizeDays, extractLast( request.term ) ) );
				},
				select: function( event, ui ) {
					setTimeout(function(){$('input#medInstructions').autocomplete("search");$('input#medInstructions').focus();}, 100);
				}
			});
		   $( "#medInstructions" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					instruction, extractLast( request.term ) ) );
				},
				
			});
		
			$( "#medDosage" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 0,
				source: function( request, response ) {
					response( $.ui.autocomplete.filter(
					dosagepersonalized, extractLast( request.term ) )
					
					);
				},
				select: function( event, ui ) {
					$('input#medFrequency').focus();
					//setTimeout(function(){$('input#medFrequency').autocomplete("search");$('input#medFrequency').focus();}, 100);
				}
			});
		 
			$scope.SearchCtrl=function(){
			$( "#medName" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = "select id as id, UPPER(drugname) as value, dosage as dosage  from drugs where drugname";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cdrug/namesforPersonalization?term="+request.term,
						datatype: 'json', 
						success: function (data) {               
						response( $.ui.autocomplete.filter(
						JSON.parse(data), extractLast( request.term ) ) );
						//console.log(data);
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").show();
						}
					});
			},

				select: function( event, ui ) {
				//console.log(ui.item.id);
				$scope.medicineId=ui.item.id;
				//$('#medId').val=$scope.medicineId;
				//console.log($scope.medicineId);
				joinDosage(ui.item.dosage);
				$('input#medDosage').focus();
				setTimeout(function(){$('input#medDosage').autocomplete("search");}, 100);
			}
			});
			}
			/* For test search 	*/
			$scope.TestSearchCtrl=function(){
			$( "#testname" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					typeBoxQuery = "select id as id,testname_c as value from testmaster where testname_c";
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cdoctorpathtest/searchtest?term="+request.term,
						datatype: 'json', 
						success: function (data) {               
						response( $.ui.autocomplete.filter(
						JSON.parse(data), extractLast( request.term ) ) );
						//console.log(data);
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").show();
						}
					});
			},
			select: function( event, ui ) {
				$scope.testId=ui.item.id;
			}
			});
			}
			/* Done 			*/

			/* For Parameter search 	*/
			$scope.ParameterSearchCtrl=function(){
			$( "#parametername" )
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
					$( this ).data( "ui-autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				position: { my: "left bottom", at: "left top", collision: "flip" },
				minLength: 1,
				source: function( request, response ) {
					 $.ajax({
						type: 'Get',
						url: "/ayushman/cdoctorpathtest/searchparameter?term="+request.term,
						datatype: 'json', 
						success: function (data) {               
						response( $.ui.autocomplete.filter(
						JSON.parse(data), extractLast( request.term ) ) );
						//console.log(data);
						},
						error: function (req, status, error) {
							ErrorMessage(req.responseText);
							$("#ui-datepicker-div").show();
						}
					});
			},
			select: function( event, ui ) {
				$scope.parameterId=ui.item.id;
			}
			});
			}
			/* Done 			*/
			
			$scope.addMedicine = function () {
		    var data = $.param({
			medName: $scope.medName,
			dosage: $scope.dosage,
			frequency: $scope.frequency,
			days:$scope.days,
			instruction: $scope.instruction
				
            });
			
			$http.post('/ayushman/cdoctordrug/savemedicine',data)
			.success(function(data, status, headers, config){
			$scope.ServerResponse = data;
			$scope.showdocmedicines();
			//console.log(data);
					
            })
		   }

		   $scope.addInstruction = function () {
		    var data = $.param({
			instruction: $scope.instruction,
			
            });
			
			$http.post('/ayushman/cdoctorinstruction/saveinstruction',data)
			.success(function(data, status, headers, config){
			$scope.ServerResponse = data;
			$scope.showdocinstructions();
			console.log(data);
					
            })
		   }
		  
	
					$scope.adda = function(){
					//console.log("Adding");
					//console.log($scope.selectedForma);
					for(j=0;j<$scope.selectedForma.length;j++){
					obj = $scope.get_objects($scope.historyallforms,'id',$scope.selectedForma[j]);
					//console.log($scope.historyallforms);
					obj1 = $scope.get_objects($scope.choosenhistoryforms,'id',$scope.selectedForma[j]);
					if(obj1[0] != undefined){
						
					}					
					else{
						$scope.choosenhistoryforms.push(obj[0]);
						ids = '';
						//console.log($scope.choosenhistoryforms.length);
						for( i = 0 ; i < $scope.choosenhistoryforms.length ; i++ ){
							if(i == 0){
								ids = $scope.choosenhistoryforms[i].id;
								//console.log($scope.choosenhistoryforms[i].id);
							}else{
								//console.log($scope.choosenhistoryforms[i].id);
								ids = ids +','+ $scope.choosenhistoryforms[i].id;
								//console.log(ids);
							}	
						}
						personalizationService.saveFormsa(ids);
						}					
					}					
				}				
				$scope.removea = function(){
					for(j=0;j<$scope.selectedForma.length;j++){
						obj = $scope.get_objects( $scope.choosenhistoryforms,'id',$scope.selectedForma[j]);
						if(obj[0] != undefined){
							var index = $scope.choosenhistoryforms.indexOf(obj[0]);
							$scope.choosenhistoryforms.splice(index, 1); 
							
							ids = '';
							for(i=0;i< $scope.choosenhistoryforms.length; i++){
								if(i == 0){
									ids = $scope.choosenhistoryforms[i].id;
								}else{
									ids = ids +','+ $scope.choosenhistoryforms[i].id;
								}							
							}
							personalizationService.saveFormsa(ids);	
						}					
						else{
							alert("Please Select a form name from the 'selected Forms' list");
						}	
					}									
				}				
			}
		]
	);