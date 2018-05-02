window.angular.module('app.services')
    .service('appointmentService',
	     ['appointmentInfoApi','loginuserApi','pastpatappointmentsApi','billdataApi','appointmentsApi','pastappointmentsApi','inappointmentsApi','regularpatientsApi','mytemplatesApi','mybilltemplatesApi','doctorbilltemplatesApi','myprofileApi','myclinicsApi','docprofileApi','$q', '$location',
	      function (appointmentInfoApi,loginuserApi,pastpatappointmentsApi,billdataApi,appointmentsApi,pastappointmentsApi,inappointmentsApi,regularpatientsApi,mytemplatesApi,mybilltemplatesApi,doctorbilltemplatesApi,myprofileApi,myclinicsApi,docprofileApi, $q, $location) {
		  var appointment_data = {};
		  var appointments = {};
		  var inappointments = {};
		  var pastappointments={};
		  var regularpatients = {};
		  var bill_data={};
		  var clinics = {};
		  var prescriptiontemplates = {};
		  var billtemplate = {};
		  return {
			  	getAppointmentDataForcefully: function(app_id){
				  var deferred = $q.defer();
					  appointmentInfoApi
					  .get({appid: app_id},
						   function(data){
						   appointment_data[app_id] = data;
						   deferred.resolve(appointment_data[app_id]);
						   });
				  return deferred.promise;
		      },
		      getAppointmentData: function(app_id){
				  var deferred = $q.defer();
				   if(appointment_data[app_id] == undefined){
					  appointmentInfoApi
					  .get({appid: app_id},
						   function(data){
						   appointment_data[app_id] = data;
						   deferred.resolve(appointment_data[app_id]);
						   });
				  }
				  else{
					  deferred.resolve(appointment_data[app_id]);
				  }
				  return deferred.promise;
		      },
		      getbillData: function(app_id){
				  var deferred = $q.defer();
					  billdataApi
					  .get({appid: app_id},
						   function(data){
						   bill_data[app_id] = data;
						   deferred.resolve(bill_data[app_id]);
						   });
				  return deferred.promise;
		      },
		      getLoginuser: function(app_id){
				  var deferred = $q.defer();
					  loginuserApi
					  .get({appid: app_id},
						   function(data){
						console.log(data);
						deferred.resolve(data);
						   });
				  return deferred.promise;
		      },
			  getAppointments: function(user_id){
				  var deferred1 = $q.defer();
				  console.log( Object.keys(appointments).length);
				  //if(Object.keys(appointments).length == 0){
				  if(true){
					  appointmentsApi
					  .get({id: user_id},
						   function(data){
							   appointments = data;
							   deferred1.resolve(appointments);
						   });
				  }
				  else{
					  deferred1.resolve(appointments);
				  }
				  return deferred1.promise;
		      },			  
			  getPastAppointments: function(user_id,list_count){
				  var deferred2 = $q.defer();
				  pastappointmentsApi
					  .get({id: user_id, count:list_count},
						   function(data){
							   pastappointments = data;
							   deferred2.resolve(pastappointments);
						   });
				  return deferred2.promise;
		      },
			  getincompleteAppointments: function(user_id){
				  var deferred4 = $q.defer();
				  console.log( Object.keys(inappointments).length);
				  //if(Object.keys(appointments).length == 0){
				  if(true){
					  inappointmentsApi
					  .get({id: user_id},
						   function(data){
							   inappointments = data;
							   deferred4.resolve(inappointments);
						   });
				  }
				  else{
					  deferred4.resolve(appointments);
				  }
				  return deferred4.promise;
		      },
			  getPastAppointments: function(user_id,list_count){
				  var deferred2 = $q.defer();
				  console.log(user_id,list_count);
				   pastappointmentsApi
					  .get({id: user_id, count:list_count},
						   function(data){
							   pastappointments = data;
							   deferred2.resolve(pastappointments);
						   });
				  return deferred2.promise;
		      },
			   getPastAppointmentdata: function(user_id){
				  var deferred4 = $q.defer();
				  pastpatappointmentsApi
					  .get({id: user_id},
						   function(data){
							   pastappointments = data;
							   deferred4.resolve(pastappointments);
						   });
				  return deferred4.promise;
		      },
			   getRegularPatients: function(user_id){
				  var deferred3 = $q.defer();
				  if(Object.keys(regularpatients).length == 0){
					  regularpatientsApi
					  .get({id: user_id},
						   function(data){
							   regularpatients = data;
							   deferred3.resolve(regularpatients);
						   });
				  }
				  else{
					  deferred3.resolve(regularpatients);
				  }
				  return deferred3.promise;
		      },
			  getMyprofile: function(){
				  var deferred = $q.defer();
				  if(appointments['userinfo'] == undefined){
					  myprofileApi
					  .get(function(data){
							   appointments = data;
							   deferred.resolve(appointments);
						   });
				  }
				  else{
					  deferred.resolve(appointments);
				  }
				  return deferred.promise;
		      },
			  getDocprofile: function(app_id){
				  var deferred = $q.defer();
				  if(true){
					  docprofileApi
					  .get({appid: app_id},
						function(data){
							   appointments = data;
							   deferred.resolve(appointments);
						   });
				  }
				  else{
					  deferred.resolve(appointments);
				  }
				  return deferred.promise;
		      },
			   getMyclinics: function(user_id){
				  var deferred = $q.defer();
				  
				  if(clinics['clinicinfo'] == undefined){
						if(user_id == undefined){
							myclinicsApi
							.get(function(data){
								clinics = data;
								deferred.resolve(clinics);
							});
						}else{
							myclinicsApi
							.get({userid:user_id},function(data){
								clinics = data;
								deferred.resolve(clinics);
							});
						}
				  }
				  else{
					  deferred.resolve(clinics);
				  }
				  return deferred.promise;
		      },
				getPrescriptionTemplates: function(){
					var deferred = $q.defer();
					mytemplatesApi
					  .get(function(data){
							   prescriptiontemplates = data;
							   deferred.resolve(prescriptiontemplates);
						   });
				 
					return deferred.promise;
		      },
			  getbillTemplate: function(){
					var deferred = $q.defer();
					mybilltemplatesApi
					  .get(function(data){
							   billtemplate = data;
							   deferred.resolve(billtemplate);
						   });
				 
					return deferred.promise;
		      },
			  getdoctorbillTemplate: function(appid){
					var deferred = $q.defer();
					doctorbilltemplatesApi
					  .get({appid:appid},function(data){
							   billtemplate = data;
							   deferred.resolve(billtemplate);
						   });
				 
					return deferred.promise;
		      },
			show_nav_link : function (link_name){
				var curr_loc = $location.path().split('/')[1];
				
				  if(curr_loc == 'dashboard'){
					  if(link_name == 'header' || link_name == 'search_box' || link_name == 'my_profile')
						return true;
					  return false;
				  }
				  if(curr_loc == 'personalization'){
					  if(link_name == 'header' || link_name == 'search_box' || link_name == 'my_profile')
						return true;
					  return false;
				  }
				   if(curr_loc == ''){
					  if( link_name == 'search_box' || link_name == 'my_profile' || link_name=='new_tracker' || link_name == 'overview' || link_name == 'summary' || link_name == 'risk' || link_name == 'emr' || link_name == 'notes' )
					  return false;
					  return true;
				  }
				  else if(curr_loc == 'patientemr'){
					  if(link_name == 'header' || link_name == 'search_box' || link_name == 'my_profile' || link_name == 'end consultation' || link_name == 'summary' || link_name == 'emr' || link_name=='new_tracker' || link_name == 'summary' )
					  return false;
					  return true;
				  }
				  else if(curr_loc == 'patienttracker'){
					  if(link_name == 'header' || link_name == 'search_box' || link_name == 'my_profile' || link_name == 'end consultation' || link_name == 'summary' || link_name == 'emr' )
					  return false;
					  return true;
				  }
				  else if(curr_loc == 'emr'){
					  if(link_name == 'emrheader' || link_name == 'search_box' || link_name == 'risk' || link_name == 'my_profile' || link_name == 'end consultation' || link_name == 'summary' || link_name == 'emr' || link_name=='new_tracker' || link_name == 'summary' )
					  return false;
					  return true;
				  }
				  else if(curr_loc == 'tracker'){
					  if(link_name == 'search_box' || link_name == 'my_profile' || link_name == 'end consultation' || link_name == 'summary' || link_name == 'tracker' || link_name == 'summary')
					  return false;
					  return true;
				  }
				  else if(curr_loc == 'examination'){
					  if( link_name == 'search_box' || link_name == 'prescription'  || link_name == 'my_profile' || link_name == 'examination' || link_name=='new_tracker' || link_name == 'summary')
					  return false;
					  return true;
				  }
				   else if(curr_loc == 'followup'){
					  if( link_name == 'search_box' || link_name == 'my_profile' || link_name=='new_tracker' || link_name == 'overview' || link_name == 'summary' || link_name == 'risk' || link_name == 'emr' || link_name == 'notes' )
					  return false;
					  return true;
				  }
		      }
		  };
	      }]);
