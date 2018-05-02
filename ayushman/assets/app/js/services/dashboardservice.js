window.angular.module('app.services')
    .service('dashboardService',
	     ['$q','$http','dashboardApi', 
		 function ($q,$http,dashboardApi) {
		  var patientData = {};
		  
		   var ckeckboxtList = [];
		   var b;
		   var prescriptionsta;
		   var prescstat;
			var addProduct = function(a,b,c,d,e,f) {
				ckeckboxtList[0] = a;
				ckeckboxtList[1] = b;
				ckeckboxtList[2] = c;
				ckeckboxtList[3] = d;
				ckeckboxtList[4] = e;
				ckeckboxtList[5] = f;
				
			};

			var getProducts = function(){
				return ckeckboxtList;
			};
			var addid = function(a){
				b = a;
				console.log(b);
			};
			var getpatid = function(){
				console.log(b);
				return b;
			};
			var addcompleted = function(stat){
				prescstat = stat;
			};
			var getcompleted = function(){
				console.log(prescstat);
				return prescstat;
			};
			var setprescriptionstatus = function(a){
				prescriptionsta = a;
				console.log(prescriptionsta);
			};
			var getprescriptionstatus = function(){
				console.log(prescriptionsta);
				return prescriptionsta;
			};
			 return {

				addProduct: addProduct,
				getProducts: getProducts,
				addid : addid,
				getpatid : getpatid,
				getcompleted : getcompleted,
				addcompleted : addcompleted,
				setprescriptionstatus : setprescriptionstatus,
				getprescriptionstatus : getprescriptionstatus,
		      search_patient: function(name){
			var deferred = $q.defer();
			    dashboardApi
				  .get({pname : name},function(data){	
							patientData=data;						
					      deferred.resolve(patientData);
						 })			 
			  return deferred.promise;
		      }
	
		  };
			
	      }
		  ]);
