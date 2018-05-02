window.angular.module('app.services')
    .service('personalizationService',
	    ['specialityApi','specialityformApi','examApi','specialityformsApi','personalizationApi','personalizationApia','allhistoryApi','historyApi','$q',
			function (specialityApi,specialityformApi,examApi,specialityformsApi,personalizationApi,personalizationApia,allhistoryApi,historyApi,$q) {
				var specialities = {};
				var speciality_forms = {};
				var speciality_formsa = {};
				var exam_formsa = {};
				return {
					getSpecialityForms: function(id){
						var deferred = $q.defer();
						specialityformApi
						.get({id: id},function(data){
							speciality_forms = data;
							deferred.resolve(speciality_forms);
						})
						
						return deferred.promise;
					},
				
					getSpecialities: function(){
						var deferred = $q.defer();
						specialityApi
						.get(function(data){
							specialities = data;
							deferred.resolve(specialities);
						})
						return deferred.promise;
					},
					
					getForms: function(speciality_id){
						var deferred = $q.defer();
						if(speciality_forms[speciality_id] == undefined){
							specialityformsApi
							.get({specialityid: speciality_id},
								function(data){
									speciality_forms[speciality_id] = data;
									deferred.resolve(speciality_forms[speciality_id]);
								});
						}
						else{
							deferred.resolve(speciality_forms[speciality_id]);
						}
						return deferred.promise;
					},
					
					saveForms: function(ids){
					  var post_data = {
						  'ids' : ids
					  };
						personalizationApi.save({}, post_data,
							function(data){
						})
					},
					
//created by ravi	
					

					historyforms: function(){
						var deferred = $q.defer();
						examApi
						.get({},function(dataa){
							speciality_formsa = dataa;
							console.log(dataa);
							deferred.resolve(speciality_formsa);
						})
						
						return deferred.promise;
					},
					
					examforms: function(){
						var deferred = $q.defer();
						examApi
						.get({},function(dataa){
							exam_formsa = dataa;
							console.log(dataa);
							deferred.resolve(exam_formsa);
						})
						
						return deferred.promise;
					},
					
					historyallforms: function(){
						var deferred = $q.defer();
						allhistoryApi
						.get({},function(dataa){
							speciality_formsa = dataa;
							deferred.resolve(speciality_formsa);
						})
						
						return deferred.promise;
					},
										
					getForms: function(speciality_id){
						var deferred = $q.defer();
						if(speciality_forms[speciality_id] == undefined){
							specialityformsApi
							.get({specialityid: speciality_id},
								function(dataa){
									speciality_forms[speciality_id] = dataa;
									deferred.resolve(speciality_forms[speciality_id]);
								});
						}
						else{
							deferred.resolve(speciality_forms[speciality_id]);
						}
						return deferred.promise;
					},
															
					saveFormsa: function(ids){
					  var post_data = {
						  'ids' : ids
					  };
						personalizationApia.save({}, post_data,
							function(dataa){
						})
					}
				};
			}
		]
	);
