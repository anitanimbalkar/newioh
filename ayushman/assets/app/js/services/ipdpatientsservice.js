window.angular.module('app.services')
    .service('ipdpatientsService',
	    ['admittedpatientsApi','orderservicesApi','orderipdservicesApi','directoryofservicesApi','$q',
			function (admittedpatientsApi,orderservicesApi,orderipdservicesApi,directoryofservicesApi,$q) {
				var admittedpatient = [];
				var orderservices = {};
				var orderipdservices = {};
				var directoryofservices = {};
				return {

					getAdmittedPatients: function(){
						var deferred = $q.defer();
						admittedpatientsApi
						.get(function(data){
							//console.log(data);
							admittedpatient = data;
							deferred.resolve(admittedpatient);
						})
						return deferred.promise;
					},
					
					getOrder: function(wardid){
						var deferred = $q.defer();
						console.log(wardid);
						orderservicesApi
						.get({wardid: wardid},function(data){
							orderservices = data;
							deferred.resolve(orderservices);
						})
						return deferred.promise;
					},
					getipdOrder: function(wardid){
						var deferred = $q.defer();
						console.log(wardid);
						orderipdservicesApi
						.get({wardid: wardid},function(data){
							orderipdservices = data;
							deferred.resolve(orderipdservices);
						})
						return deferred.promise;
					},

					getDirectoryofServices: function(doctorid){
						var deferred = $q.defer();
						directoryofservicesApi
						.get({doctorid: doctorid},function(data){
							directoryofservices = data;
							deferred.resolve(directoryofservices);
						})
						return deferred.promise;
					}
					
				};
			}
		]
	);
