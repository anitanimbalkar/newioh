/**
 * Created by chetan on 24/11/13.
 */

window.angular.module('ngff.services.appointmentService', [])
    .service('appointmentService',
	     [
	      function () {
		  var appointment_data = {};
		  var past_data = {};
		  return {
		      setAppointmentData: function(app_id, app_data){
			  appointment_data[app_id] = app_data;
		      },
		      getAppointmentData: function(app_id){
			  if(appointment_data[app_id] == undefined)
			      return null;
			  return appointment_data[app_id];
		      },
		      setPastData: function(app_id, data){
			  past_data[app_id] = data;
		      },
		      getPastData: function(app_id){
			  if(past_data[app_id] == undefined)
			      return null;
			  return past_data[app_id];
		      }
		  };
	      }]);
