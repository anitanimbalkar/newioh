window.angular.module('app.services')
    .service('notesService',
    ['notesandremindersApi','$q','noteseditApi','notessaveApi','notesdeleteApi',
	function (notesandremindersApi,$q,noteseditApi,notessaveApi,notesdeleteApi) {
		  		
		var pastData = {};
	    return  {
					showNotes: function(patient_id){				
						var deferred = $q.defer();
						notesandremindersApi
						  .get({patientid: patient_id},
						   function(data){
							pastData[patient_id] = data;
							deferred.resolve(pastData[patient_id]);
						   });
						   return deferred.promise;
					},
					editNotes: function(patientid,notes,editid){
						var deferred = $q.defer();
						noteseditApi
						  .get({patientid: patientid,notes:notes,editid:editid},
						   function(data){
							pastData[patientid] = data;
							deferred.resolve(pastData[patientid]);
						   });
						   return deferred.promise;
					},
					saveNotes: function(patientid,notes,editid){
						var deferred = $q.defer();
						notessaveApi
						  .get({patientid: patientid,notes:notes},
						   function(data){
							pastData[patientid] = data;
							deferred.resolve(pastData[patientid]);
						   });
						   return deferred.promise;
					},
					deleteNotes: function(patientid,id){
						var deferred = $q.defer();
						notesdeleteApi
						  .get({patientid: patientid,id:id},
						   function(data){
							pastData[patientid] = data;
							deferred.resolve(pastData[patientid]);
						   });
						   return deferred.promise;
					},
				};
	    }]);
