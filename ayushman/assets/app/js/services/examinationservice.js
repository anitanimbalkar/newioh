angular.module('app.services')
    .service('examinationService',
	    ['getdataApi','$q',
			function (getdataApi, $q) {
				var exam_data = {};
				var appdata = {};
				var menu = {};
				return {
					getExaminationData: function(app_id){
						 var deferred = $q.defer();
						if(exam_data[app_id] == undefined){
						  getdataApi
						  .save({appid: app_id},
							   function(data){
							        var resumedata = data;
									exam_data[app_id] = {};
									var temp = exam_data[app_id];
									temp['text_complaint'] = resumedata['data'][0]['maincomplaint'];
									temp['text_followup'] = resumedata['data'][0]['followup'];
									temp['text_examinationsummary'] = resumedata['data'][0]['examinationsummary'];
									temp['text_diagnosis'] = resumedata['data'][0]['diagnosis'];
									temp['text_reportparameter'] = resumedata['data'][0]['reportparameter'];
									temp['parameterids'] = resumedata['data'][0]['parameterids'];
									
									temp['text_onlyparameter'] = resumedata['data'][0]['onlyparameter'];
									temp['text_onlydate'] = resumedata['data'][0]['onlydate'];
									temp['text_onlylab'] = resumedata['data'][0]['onlylab'];
									temp['text_onlyrefrange'] = resumedata['data'][0]['onlyrefrange'];
									
									temp['check_symptoms'] = true;
									temp['check_examinations'] = true;
									temp['check_examinationsummary'] = true;
									temp['check_symptomaticreview'] = true;
									temp['changedQuestions'] = resumedata['data'][0]['examination'] == null ? {} : resumedata['data'][0]['examination'];
									
									temp['forms'] = {}; 
									exam_data[app_id] = temp;
									deferred.resolve( exam_data[app_id]);
									
									document.cookie = 'symptom_text='+resumedata['data'][0]['maincomplaint']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'diagnosis_text='+resumedata['data'][0]['diagnosis']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'investigation_text={}; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'examinationsummary_text='+resumedata['data'][0]['examinationsummary']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'text_followup_note='+resumedata['data'][0]['followup']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'medicine_text={}; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'medicine={}; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'appid='+app_id+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'examinationQuestion={}; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_text='+resumedata['data'][0]['reportparameter']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_ids='+resumedata['data'][0]['parameterids']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_onlyparameter='+resumedata['data'][0]['onlyparameter']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_onlydate='+resumedata['data'][0]['onlydate']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_onlylab='+resumedata['data'][0]['onlylab']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
									document.cookie = 'report_onlyrefrange='+resumedata['data'][0]['onlyrefrange']+'; expires=Wed, 1 Jan 2070 13:47:11 UTC; path=/';
							   });
															
						}else{
								
							 deferred.resolve(exam_data[app_id]);							
						}
									
						return deferred.promise;
					},
					getMenu: function(app_id){
						return menu[app_id];
					},
					setMenu: function(data, app_id){
						menu[app_id] = {};
						menu[app_id].examinationMenu = data.examination;
						menu[app_id].symptomaticMenu = data.symptomatic;
					}
				};
			}
		]);
