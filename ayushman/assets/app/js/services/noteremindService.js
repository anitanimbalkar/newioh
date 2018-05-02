window.angular.module('app.services')
    .service('noteremindService',
	    ['allnotesApi','$q',
			function (allnotesApi,$q) {
				var allnotes = [];
				return {
					getallnotes: function(patientuserid){
						var deferred = $q.defer();
						allnotesApi
						.get({patientuserid:patientuserid},function(data){
							//console.log(data);
							allnotes = data;
							deferred.resolve(allnotes);
						})
						return deferred.promise;
					}
				};
			}
		]
	);
