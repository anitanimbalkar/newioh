/**
 * Created by chetan on 24/11/13.
 */

window.angular.module('ngff.services.emrService', [])
    .service('emrService',
	     ['notesApi','riskApi',
	      function (notesApi,riskApi) {
		  var emr_data = {};
		  var notes = {};
		  var risks = {};
		  var past_appointments = {};
		  return {
		      getMedicalProfile: function(patient_id){
			  if(emr_data[patient_id] == undefined)
			      return null;
			  return emr_data[patient_id];
		      },
		      setMedicalProfile: function(patient_id, data){
			  emr_data[patient_id] = data;
		      },
		      getNotes: function(patient_id){
			  if(notes[patient_id] == undefined)
			      return null;
			  return notes[patient_id];
		      },
		      setNotes: function(patient_id, data){
			  notes[patient_id] = data;
		      },
		      getRisk: function(patient_id){
			  if(risks[patient_id] == undefined)
			      return null;
			  return risks[patient_id];
		      },
		      setRisk: function(patient_id, data){
			  risks[patient_id] = data.risks;
		      },
		      saveNotes: function(appointment_id, patient_id){
			  var post_data = {
			      'appointment_id' : appointment_id,
			      'notes' : notes[patient_id].notes
			  };
			  notesApi.save({}, post_data,
					function(data){
					})
		      },
		      deleteRisk: function(index, patient_id){
			  var patient_risk = risks[patient_id];
			  riskApi.delete({id: patient_risk[index].risk_id},
					 function(){
					     patient_risk.splice(index, 1);
					 });
		      },
		      editRisk: function(index, patient_id){
			  var post_data = {
			      'patient_id': patient_id,
			      'risk_id': risks[patient_id][index].risk_id,
			      'risk_text': risks[patient_id][index].risk_text
			  };
			  riskApi.save({}, post_data,
				       function(data){
				       });
		      },
		      addRisk: function(patient_id, risk_text){
			  var post_data = {
			      'patient_id':patient_id,
			      'risk_text': risk_text
			  };
			  riskApi.save({}, post_data,
				       function(data){
					   var saved_risk = {
					       risk_id: data.risk_id,
					       risk_text: risk_text,
					       writer_id:data.writer_id
					   };
					   risks[patient_id].push(saved_risk);
				       });
		      },
		      getPastAppointments: function(patient_id){
			  if(past_appointments[patient_id] == undefined)
			      return null;
			  return past_appointments[patient_id];
		      },
		      setPastAppointments: function(patient_id, data){
			  past_appointments[patient_id] = data;
		      },
		      getRiskText: function(patient_id){
			  if(risks[patient_id] == undefined)
			      return null;
			  var patient_risk = risks[patient_id];
			  var risk_text = [];
			  for(var i=0; i<patient_risk.length; i++){
			      risk_text.push(patient_risk[i].risk_text);
			  }
			  return risk_text.join();
		      }
		  };
	      }]);
