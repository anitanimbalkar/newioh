window.angular.module('app.services')
    .service('emrService',
	     ['notesApi', 'riskApi','allergyApi','examinationAllAppApi','socialhabitsApi','pastdiseasesApi','healthinfoApi','immunizationApi','othermedobservApi', 'medicalProfileApi','$q', 'pastAppApi','profileApi','pastAllAppApi','pastAllIncidenceApi','appointmentApi', 'prescriptionApi', 'reportDetailsApi','reportDetailsApiFS', 'reportApi','reportDetailsApiFSForReport',
	      function (notesApi,riskApi, allergyApi,examinationAllAppApi,socialhabitsApi,pastdiseasesApi,healthinfoApi,immunizationApi,othermedobservApi, medicalProfileApi, $q, pastAppApi,profileApi,pastAllAppApi,pastAllIncidenceApi, appointmentApi, prescriptionApi, reportDetailsApi, reportDetailsApiFS, reportApi, reportDetailsApiFSForReport) {
		  var emrData = {};
		  var notes = {};
		  var historynotes = {};
		  var risks = {};
		  var newRisk = {text: ""};
		  var pastAppointments = {};
		  var pastData = {};
		  var pastAllData = {};
		  var pastReportDetails = {};
		  var pastReports = {};
		  var reportDetails = {};
		  var immunization_text='';
		  
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
			  getExaminationsummary: function(patientId){
					var deferred = $q.defer();
					examinationAllAppApi.get({patientid: patientId},
					function(data){
							pastAllData[patientId] = data;
							console.log(data);
							deferred.resolve(pastAllData[patientId]);
					});
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
					if(pastAllData[appId] == undefined){
						pastAllAppApi.get({appid: appId},
							   function(data){
								pastAllData[appId] = data;
								deferred.resolve(pastAllData[appId]);
						});
					}
					else{
						deferred.resolve(pastAllData[appId]);
					}
					return deferred.promise;
					/*var deferred = $q.defer();
					pastAllAppApi.get({appid: appId},
					   function(data){
						pastAllData[appId] = data;
						deferred.resolve(pastAllData[appId]);
					});
					return deferred.promise;*/
		      },
			  getPastAllPatientData: function(patientId){
				  console.log(patientId);
					var deferred = $q.defer();
					if(pastAllData[patientId] == undefined){
						pastAllAppApi.get({patientId: patientId},
						function(data){
								pastAllData[patientId] = data;
								deferred.resolve(pastAllData[patientId]);
						});
					}
					else{
						deferred.resolve(pastAllData[patientId]);
					}
					return deferred.promise;
					/*var deferred = $q.defer();
					pastAllAppApi.get({patientid: patientId},
					function(data){
							pastAllData[patientId] = data;
							deferred.resolve(pastAllData[patientId]);
					});
					return deferred.promise;*/
		      },
			  getPastAllPatientDataForcefully: function(patientId){
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
				emrData[patientId] = undefined;
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
			  getHistoryNotes: function(patientId, doctorId){
				  var deferred = $q.defer();
				  
					  notesApi
					  .get({patient_id: patientId, doctor_id: doctorId},
						   function(data){
						   historynotes[patientId] = data.historynotes;
						   deferred.resolve(historynotes[patientId]);
						   });
				  
				  return deferred.promise;
		      },
		      getNotes: function(patientId, doctorId){
				  console.log(doctorId);
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
					   console.log(patientId);
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
					  'notes' : notes[patientId].notes,
					  'patient_id' : patientId
				  };
				  notesApi.save({}, post_data,
						function(data){
							showNotification('300','20','Save data','Notes saved','notification','timernotification',3000);
					})
		      },
			  deleteHistoryNotes: function(patientId){
					var deferred = $q.defer();
					notesApi.delete({patientid: patientId},
					function(data){
					     deferred.resolve(data);
					});
					return deferred.promise;
		      },
		      deleteRisk: function(index, patientId){
			  var patientRisk = risks[patientId];
			  riskApi.delete({id: patientRisk[index].risk_id},
					 function(){
					     patientRisk.splice(index, 1);
						 showNotification('300','20','Save data','Risk removed','notification','timernotification',3000);
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
							showNotification('300','20','Save data','Risk saved','notification','timernotification',3000);
				       });
		      },
		      addRisk: function(patientId){
				  console.log(patientId);
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
					   console.log(saved_risk);
					   risks[patientId].push(saved_risk);
					   newRisk.text = "";
						showNotification('300','20','Save data','New Risk added','notification','timernotification',3000);
				       });
		      },
		      saveAllergies: function(allergies,patientId){
				     var post_data ={
			      	'patient_id':patientId,
			      	'allergies' :allergies
			      };
		      	
		      		allergyApi.save({},post_data,function(data){
					})
		      },
		      saveSocialHabits: function(socialhabits,patientId){
			      var post_data ={
			      	'patient_id':patientId,
			      	'socialhabits' :socialhabits
			      };
		      	
		      		socialhabitsApi.save({},post_data,function(data){
					})
		      },
		      savePastDiseases: function(pastdiseases,patientId){
			      var post_data ={
			      	'patient_id':patientId,
			      	'pastdiseases' :pastdiseases
			      };
		      		var deferred = $q.defer();
		      		pastdiseasesApi.save({},post_data,function(data){
		      			 deferred.resolve(data.pastdiseases);
					});
			 		return deferred.promise;
		      },
		      saveImmunization: function(immunization,patientId){
				     var post_data ={
			      	'patient_id':patientId,
			      	'immunization' :immunization
			      };
		      		var deferred = $q.defer();
		      		immunizationApi.save({},post_data,function(data){
		      			 deferred.resolve(data.immunization);
					});
			 		return deferred.promise;
		      },
		      saveOthermedobserv: function(othermedobserv,patientId){
			      var post_data ={
			      	'patient_id':patientId,
			      	'othermedobserv' :othermedobserv
			      };
		      	
		      		othermedobservApi.save({},post_data,function(data){
					})
		      },
		      saveHealthinfo: function(healthinfo,patientId){
			      var post_data ={
			      	'patient_id':patientId,
			      	'healthinfo' :healthinfo
			      };
		      		healthinfoApi.save({},post_data,function(data){
					})
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
