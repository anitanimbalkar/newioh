window.angular.module('app.services')
    .service('bookappService',
	    ['favDoctorsApi','doctorsClinicApi','timeSlotsApi','patientIncidentApi','$q',
			function (favDoctorsApi,doctorsClinicApi,timeSlotsApi,patientIncidentApi,$q) {
				var favdoctorslist = [];
				return {
					getfavDoctors: function(patientuserid,rescheduleappid){
						var deferred = $q.defer();
						favDoctorsApi
						.get({patientuserid:patientuserid,rescheduleappid:rescheduleappid},function(data){
							//console.log(data);
							favdoctorslist = data;
							deferred.resolve(favdoctorslist);
						})
						return deferred.promise;
					},
					getClinics: function(doctorsid){
						var deferred = $q.defer();
						doctorsClinicApi
						.get({doctorsid:doctorsid},function(data){
							//console.log(data);
							doctorsCliniclist = data;
							deferred.resolve(doctorsCliniclist);
						})
						return deferred.promise;
					},
					getIncidents: function(patientuserid){
						var deferred = $q.defer();
						patientIncidentApi
						.get({patientuserid:patientuserid},function(data){
							//console.log(data);
							patientIncident = data;
							deferred.resolve(patientIncident);
						})
						return deferred.promise;
					},
					getSlots: function(doctorid,clinicid,direction,currentdate){
						var deferred = $q.defer();
						timeSlotsApi
						.get({doctorid:doctorid,clinicid:clinicid,direction:direction,currentdate:currentdate},function(data){
							//console.log(data);
							timeSlots = data;
							deferred.resolve(timeSlots);
						})
						return deferred.promise;
					}
				};
			}
		]
	);
