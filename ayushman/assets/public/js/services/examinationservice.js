/**
 * Created by chetan on 24/11/13.
 */

window.angular.module('ngff.services.examinationService', [])
    .service('examinationService',
	     [
	      function () {
		  var exam_data = {};
		  var menu = {};
		  return {
		      getExaminationData: function(app_id){
			  if(exam_data[app_id] == undefined){
			      exam_data[app_id] = {};
			      var temp = exam_data[app_id];
			      temp['text_complaint'] = "";
			      temp['text_followup'] = "";
			      temp['forms'] = {};
			      return temp;
			  }
			  return exam_data[app_id];
		      },
		      getMenu: function(app_id){
			  return menu[app_id];
		      },
		      setMenu: function(data, app_id){
			  menu[app_id] = {};
			  menu[app_id].examinationMenu = data.examination;
			  menu[app_id]['symptomaticMenu'] = data.symptomatic;
		      }
		  };
	      }]);
