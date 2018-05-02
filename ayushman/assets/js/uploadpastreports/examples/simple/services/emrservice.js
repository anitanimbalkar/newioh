window.angular.module('app.services')
    .service('emrService',
	     ['notesApi', 'riskApi', 'medicalProfileApi','$q', 'pastAppApi','profileApi','pastAllAppApi','pastAllIncidenceApi','appointmentApi', 'prescriptionApi', 'reportDetailsApi','reportDetailsApiFS', 'reportApi','reportDetailsApiFSForReport',
	      function (notesApi, riskApi, medicalProfileApi, $q, pastAppApi,profileApi,pastAllAppApi,pastAllIncidenceApi, appointmentApi, prescriptionApi, reportDetailsApi, reportDetailsApiFS, reportApi, reportDetailsApiFSForReport) {
		  var emrData = {};
		  var notes = {};
		  var risks = {};
		  var newRisk = {text: ""};
		  var pastAppointments = {};
		  var pastData = {};
		  var pastAllData = {};
		  var pastReportDetails = {};
		  var pastReports = {};
		  var reportDetails = {};
		  return {
		      newRisk : newRisk,
		      pastReportDetails: pastReportDetails,
		      reportDetails: reportDetails,
		      getPastData: function(appId){
			  var deferred = $q.defer();
			  if(pastData[appId] == undefined){
			      pastAppApi
				  .get({appid: appId},
				       function(data){
					   pastData[appId] = data;
					   deferred.resolve(pastData[appId]);
				       })
			  }
			  else{
			      deferred.resolve(pastData[appId]);
			  }
			  return deferred.promise;
		      },
			  getPastAllIncidencesData: function(appId){
				var deferred = $q.defer();
				pastAllIncidenceApi.get({appid: appId},
				       function(data){
						pastAllData[appId] = data;
						deferred.resolve(pastAllData[appId]);
				 });
			  
			  return deferred.promise;
		      },
			  getPastAllData: function(appId){
				var deferred = $q.defer();
				pastAllAppApi.get({appid: appId},
				       function(data){
						pastAllData[appId] = data;
						deferred.resolve(pastAllData[appId]);
				});
				return deferred.promise;
		      },
			  getPastAllPatientData: function(patientId){
				var deferred = $q.defer();
				pastAllAppApi.get({patientid: patientId},
				       function(data){
						pastAllData[patientId] = data;
						deferred.resolve(pastAllData[patientId]);
				});
				return deferred.promise;
		      },
		      getMedicalProfile: function(patientId){
			  var deferred = $q.defer();
			  if(emrData[patientId] == undefined){
			      medicalProfileApi
				  .get({patient_id: patientId},
				       function(data){
					   emrData[patientId] = data;
					   deferred.resolve(data);
				       });
			  }
			  else{
			      deferred.resolve(emrData[patientId]);
			  }
			  return deferred.promise;
		      },
		      getPastReportDetails: function(appId, status){
  			  var deferred = $q.defer();
			  if(pastReportDetails[appId] == undefined){
			      if(status == 'notfromsystem'){
				  reportDetailsApi
				      .get({appid: appId},
					   function(data){
					       pastReportDetails[appId] = data;
					       deferred.resolve(data);
					   });
			      }
			      else{
				  reportDetailsApiFS
				      .get({appid: appId},
					   function(data){
					       pastReportDetails[appId] = data;
					       deferred.resolve(data);
					   });
			      }
			  }
			  else{
			      deferred.resolve(pastReportDetails[appId]);
			  }
			  return deferred.promise;
		      },
		      getReportDetails: function(order_id){
			  var deferred = $q.defer();
			  if(reportDetails[order_id] == undefined){
			      reportDetailsApiFSForReport
				  .get({orderid:order_id},
				       function(data){
					   reportDetails[order_id] = data;
					   deferred.resolve(data);
				       });
			  }
			  else{
			      deferred.resolve(reportDetails[order_id]);
			  }
			  return deferred.promise;
		      },
		      getNotes: function(patientId, doctorId){
			  var deferred = $q.defer();
			  if(notes[patientId] == undefined){
			      notesApi
				  .get({patient_id: patientId, doctor_id: doctorId},
				       function(data){
					   notes[patientId] = data;
					   deferred.resolve(data);
				       });
			  }
			  else{
			      deferred.resolve(notes[patientId]);
			  }
			  return deferred.promise;
		      },
		      getRisk: function(patientId, appointmentId){
			  var deferred = $q.defer();
			  if(risks[patientId] == undefined){
			      riskApi
				  .get({patient_id: patientId, appointment_id: appointmentId},
				       function(data){
					   risks[patientId] = data.risks;
					   deferred.resolve(data.risks);
				       });
			  }
			  else{
			      deferred.resolve(risks[patientId]);
			  }
			  return deferred.promise;
		      },
		      getPastAppointments: function(patientId){
			  var deferred = $q.defer();
			  if(pastAppointments[patientId] == undefined){
			      appointmentApi
				  .query({patient_id: patientId},
					 function(data){
					     pastAppointments[patientId] = data;
					     deferred.resolve(pastAppointments[patientId]);
					 });
			  }
			  else{
			      deferred.resolve(pastAppointments[patientId]);
			  }
			  return deferred.promise;
		      },
		      getPastReports: function(patientId){
			  var deferred = $q.defer();
			  if(pastReports[patientId] == undefined){
			      reportApi
				  .query({patient_id: patientId},
					 function(data){
					     console.log(data);
					     pastReports[patientId] = data;
					     deferred.resolve(pastReports[patientId]);
					 });
			  }
			  else{
			      deferred.resolve(pastReports[patientId]);
			  }
			  return deferred.promise;
		      },
			  saveAge: function(patientId, age){
				  var post_data = {
					  'patient_id' : patientId,
					  'age' : age
				  };
				  profileApi.save({}, post_data,
						function(data){
					})
		      },
			 saveGender: function(patientId, gender){
				  var post_data = {
					  'patient_id' : patientId,
					  'gender' : gender
				  };
				  profileApi.save({}, post_data,
						function(data){
					})
		      },
		      saveNotes: function(appointmentId, patientId){
				  var post_data = {
					  'appointment_id' : appointmentId,
					  'notes' : notes[patientId].notes
				  };
				  notesApi.save({}, post_data,
						function(data){
					})
		      },
		      deleteRisk: function(index, patientId){
			  var patientRisk = risks[patientId];
			  riskApi.delete({id: patientRisk[index].risk_id},
					 function(){
					     patientRisk.splice(index, 1);
					 });
		      },
		      editRisk: function(index, patientId){
			  var post_data = {
			      'patient_id': patientId,
			      'risk_id': risks[patientId][index].risk_id,
			      'risk_text': risks[patientId][index].risk_text
			  };
			  riskApi.save({}, post_data,
				       function(data){
				       });
		      },
		      addRisk: function(patientId){
			  if(newRisk.text == ""){
			      return;
			  }
			  var post_data = {
			      'patient_id':patientId,
			      'risk_text': newRisk.text
			  };
			  riskApi.save({}, post_data,
				       function(data){
					   var saved_risk = {
					       risk_id: data.risk_id,
					       risk_text: newRisk.text,
					       writer_id:data.writer_id
					   };
					   risks[patientId].push(saved_risk);
					   newRisk.text = "";
				       });
		      },
		      getRiskText: function(patientId){
			  if(risks[patientId] == undefined)
			      return null;
			  var patientRisk = risks[patientId];
			  var riskText = [];
			  for(var i=0; i<patientRisk.length; i++){
			      riskText.push(patientRisk[i].risk_text);
			  }
			  return riskText.join();
		      },
		      showSummary: function(appId){
			  prescriptionApi
			      .get({app_id: appId},
				   function(data){
				       window.open('/ayushman/'+data.file_name);
				   });
		      },
		      showReport: function(){
			  alert('This feature is yet to be implemented');
		      }
		  };
	      }]);
