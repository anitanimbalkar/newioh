/**
 * Created by chetan on 24/11/13.
 */


window.angular.module('ngff.controllers.newexamctrl', [])
    .controller('newExamCtrl', ['$scope','$http', 'GlobalState', 'examReqApi', 'examInfoService','saveExamApi',
	function($scope, $http, GlobalState, examReqApi, examInfoService, saveExamApi) {
	    $scope.state = GlobalState;
	    var app_id = $scope.state.app_info.appointment_id;
	    var main_menu = examInfoService.getMainMenu(app_id);
	    if(main_menu){
		$scope.main_menu = main_menu;
	    }
	    else{
		examReqApi.get({},
		       function(data){
			   examInfoService.setMainMenu(app_id,data.main_menu);
			   $scope.main_menu = examInfoService.getMainMenu(app_id);
		       });
	    }

    	    var is_selected = function(link_name){
		if(link_name == $scope.main_menu.selected){
		    return 'nav_selected';
		}
	    };

	    $scope.is_selected = is_selected;

	    var get_form_data = function(formId, fileName){
		if($scope.main_menu.value[formId]  == undefined){
		    var fullFileName = '/ayushman/assets/forms/'+fileName + '.json';
		    $http.get(fullFileName).then(function(result){
			$scope.main_menu.value[formId] = result.data;
		    });
		}
	    };

	    var get_sub_form_data = function(formId, fileName, menuId){
		if($scope.main_menu.value[menuId] != undefined)
		    if($scope.main_menu.value[menuId][formId] != undefined)
			return;
		var fullFileName = '/ayushman/assets/forms/'+fileName+'.json';
		$http.get(fullFileName).then(function(result){
		    if($scope.main_menu.value[menuId] == undefined){
			$scope.main_menu.value[menuId] = {};
		    }
		    $scope.main_menu.value[menuId][formId] = result.data;
		});
	    }		
	    $scope.get_sub_form_data = get_sub_form_data;
	    var viewSummary = function(){
		var appointment_data = JSON.stringify($scope.main_menu.value);
		saveExamApi.save({'appid': app_id, 'app_data':appointment_data},function(data){
		    window.open('/ayushman/'+data.pdf_path);
		});
	    }

	    $scope.viewSummary = viewSummary;
	    $scope.get_form_data = get_form_data;

	    var show_question = function(question_index, parent_id, max_index, question_parent_index){
		var questions;
		if(question_parent_index != undefined)
		    questions = $scope.main_menu.value[question_parent_index][question_index];
		else
		    questions = $scope.main_menu.value[question_index];
		for(var i = 0; i<questions.length; i++){
		    if(questions[i].id[0] == parent_id){
			if(!questions[i].value){
			    return false;
			}
			else{
			    switch(questions[i].type[0]){
			    case 'Text':
				if(questions[i].value){
				    return true;
				}
			    case 'DD':
				for(var j=0; j<questions[i].answer.length; j++){
				    if(questions[i].answer[j].follow){
					if(questions[i].answer[j].label[0] == questions[i].value){
					    return true;
					}
				    }
				}
			    }
			}
		    }
		}
	    }
	    $scope.show_question = show_question;
	}]);
