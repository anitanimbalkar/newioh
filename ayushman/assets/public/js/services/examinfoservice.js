/**
 * Created by chetan on 24/11/13.
 */

window.angular.module('ngff.services.examInfoService', [])
    .service('examInfoService',
	     [
	      function () {
		  var exam_data = {};
		  return {
		      setMainMenu:function(app_id, main_menu){
			  exam_data[app_id] = {};
			  exam_data[app_id].main_menu = main_menu;
			  exam_data[app_id].main_menu.selected = main_menu[0].id;
			  exam_data[app_id].main_menu.show_sub_menu = {};
			  exam_data[app_id].main_menu.value = {};
			  for(var i=0; i<main_menu.length; i++){
			      if(main_menu[i].type == 'text'){
				  exam_data[app_id].main_menu.value[main_menu[i].id]= {};
				  exam_data[app_id].main_menu.value[main_menu[i].id]['value']= '';
			      }
			  }		  
		      },
		      getMainMenu:function(app_id){
			  if(exam_data[app_id]!= undefined)
			      return exam_data[app_id].main_menu;
			  else
			      return null;
		      }
		  };
	      }]);
