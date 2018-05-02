window.angular.module('app.services')
    .service('personalizationService',
	    ['specialityApi','specialityformApi','specialityformsApi','personalizationApi', '$q',
			function (specialityApi,specialityformApi,specialityformsApi,personalizationApi, $q) {
				var specialities = {};
				var speciality_forms = {};
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
					}
				};
			}
		]
	);
