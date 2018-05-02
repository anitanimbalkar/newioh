/**
 * Created by chetan on 15/11/13.
 */

window.angular.module('ngff.controllers.emrctrl', [])
    .controller('emrCtrl',
		['$scope', 'appointmentApi', 'prescriptionApi', 'medicalProfileApi','appointmentInfoApi', 'notesApi', 'riskApi', 'appointmentService', 'emrService','$routeParams','reportApi','pastAppApi','trackerService','trackerApi',
		 function($scope, appointmentApi, prescriptionApi, medicalProfileApi, appointmentInfoApi, notesApi, riskApi,appointmentService, emrService, $routeParams, reportApi, pastAppApi,trackerService, trackerApi) {
		     $('.ui-multiselect-menu').hide();
		     var appointmentid = $routeParams.appointment_id;
		     var prepareHeaders = function(data){
			 var cols = data[0];
			 var headers = Array();
			 var col_count = 0;
			 for(var i in cols){
			     var col_header = {};
			     col_header['field'] = i;
			     col_header['displayName'] = cols[i];
			     col_header['width'] = "100px";
			     headers.push(col_header);
			     col_count++;
			 }
			 return headers;
		     };
		     var prepare_tile_grid = function(){
			 if($scope.tracker_info['current_tracker_id'] == null)
			     return;
			 $scope.current_tracker_data = $scope.tracker_info['current_tracker_data'];
			 var headers = prepareHeaders($scope["current_tracker_data"]);
			 $scope.headers = headers; 
			 $scope.currentGrid = {
			     data: "current_tracker_data",
			     enableCellSelection: true,
			     headerRowHeight: 0,
			     columnDefs: "headers"
			 };
		     };
		     var get_all_data = function(){
			 var patient_id = $scope.appointment_info.refappfromid_c;
			 $scope.emr_snapshot = emrService.getMedicalProfile(patient_id);
			 if(!$scope.emr_snapshot){
			     medicalProfileApi
				 .get({patient_id: patient_id},
				      function(data){
					  emrService.setMedicalProfile(patient_id,data);
					  $scope.emr_snapshot = emrService.getMedicalProfile(patient_id);
				      });
			 }
			 $scope.doctor_notes = emrService.getNotes(patient_id);
			 if(!$scope.doctor_notes){
			     notesApi
				 .get({patient_id: patient_id, doctor_id: $scope.appointment_info.doctorid},
				      function(data){
					  emrService.setNotes(patient_id, data);
					  $scope.doctor_notes = emrService.getNotes(patient_id);
				      });
			 }
			 $scope.riskText = emrService.getRiskText(patient_id);
			 if(!$scope.riskText){
			     riskApi
				 .get({patient_id: patient_id, appointment_id:appointmentid},
				      function(data){
					  emrService.setRisk(patient_id, data);
					  $scope.riskText = emrService.getRiskText(patient_id);
					  $scope.risks = emrService.getRisk(patient_id);
				      });   
			 }
			 else{
			     $scope.risks = emrService.getRisk(patient_id);
			 }
			 $scope.past_appointments = emrService.getPastAppointments(patient_id);
			 if(!$scope.past_appointments){
			     appointmentApi
				 .query({patient_id: patient_id},
					function(data){
					    emrService.setPastAppointments(patient_id, data);
					    $scope.past_appointments = emrService.getPastAppointments(patient_id);
					});
			 }
			 $scope.pastAppData = appointmentService.getPastData(appointmentid);
			 if(!$scope.pastAppData){
			     pastAppApi
				 .get({appid: appointmentid},
				      function(data){
					  appointmentService.setPastData(appointmentid, data);
					  $scope.pastAppData = data;
				      })
			 }
			 $scope.tracker_info = trackerService.getTrackerInfo(appointmentid);
			 if(!$scope.tracker_info){
			     trackerApi
				 .get({'app_id':appointmentid},
				      function(data){
					  trackerService.setTrackerInfo(appointmentid, data.tracker_info);
					  $scope.tracker_info = trackerService.getTrackerInfo(appointmentid);
					  prepare_tile_grid();
				      });
			 }
			 else{
			     prepare_tile_grid();
			 }

			 /*reportApi.query({patient_id: patient_id},
					 function(data){
					 });*/
		     };
		     $scope.appointment_info = appointmentService.getAppointmentData(appointmentid);
		     if(!$scope.appointment_info){
			 appointmentInfoApi
			     .get({appid: appointmentid},
				  function(data){
				      appointmentService.setAppointmentData(appointmentid, data);
				      $scope.appointment_info = appointmentService.getAppointmentData(appointmentid);
				      get_all_data();
				  });
		     }
		     else{
			 get_all_data();
		     }
		     $scope.save_notes = emrService.saveNotes;
		     $scope.delete_risk = emrService.deleteRisk;
		     $scope.edit_risk = emrService.editRisk;
		     $scope.add_risk = function(){
			 if(new_risk.text != '')
			     emrService.addRisk($scope.appointment_info.refappfromid_c ,new_risk.text);
			 new_risk.text = '';
		     };
     		     var new_risk = {text: ''};
		     $scope.new_risk = new_risk;
     		     $scope.visible = "";

		     $scope.is_visible = function (name){
			 if(name == $scope.visible)
			     return true;
			 return false;
		     }

		     var show_summary = function(app_id){
			 prescriptionApi
			     .get({app_id: app_id},
				  function(data){
				      window.open('/ayushman/'+data.file_name);
				  });
		     };
		     var show_report = function(){
			 alert('This feature is yet to be implemented');
		     }
		     $scope.show_report = show_report;
		     $scope.show_summary = show_summary;
		 }]);
