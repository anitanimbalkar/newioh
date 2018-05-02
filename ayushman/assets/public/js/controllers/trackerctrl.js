/**
 * Created by chetan on 24/11/13.
 */


window.angular.module('ngff.controllers.trackerctrl', [])
    .controller('trackerCtrl', 
		['$scope','$http', 'trackerService','trackerApi','trackerTemplateApi', '$routeParams','appointmentService','appointmentInfoApi','emrService','medicalProfileApi','notesApi','riskApi','trackerListApi','pastAppApi',
		 function($scope, $http, trackerService, trackerApi, trackerTemplateApi, $routeParams, appointmentService, appointmentInfoApi, emrService, medicalProfileApi,notesApi,riskApi, trackerListApi, pastAppApi) {
    		     $('.ui-multiselect-menu').hide();
		     var app_id = $routeParams.appointment_id;
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
			 $scope.tracker_info = trackerService.getTrackerInfo(app_id);
			 if(!$scope.tracker_info){
			     trackerApi
				 .get({'app_id':app_id},
				      function(data){
					  trackerService.setTrackerInfo(app_id, data.tracker_info);
					  $scope.tracker_info = trackerService.getTrackerInfo(app_id);
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
			 $scope.past_appointments = emrService.getPastAppointments(patient_id);
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

		     /* logic for viewing/hiding callouts */
     		     $scope.visible = ""

		     $scope.is_visible = function (name){
			 if(name == $scope.visible)
			     return true;
			 return false;
		     }
		     /* logic for viewing/hiding callouts ends */
		     
		     /* logic for displaying tracker */
		     var is_selected = function(link_name){
			 if(link_name == $scope.tracker_info['selected']){
			     return 'nav_selected';
			 }
		     };
		     /* logic for displaying tracker ends */
		     
		     $scope.getGridOptions = function(){
			 var tracker_id = $scope.tracker_info['selected'];
			 var this_tracker_info = ($scope.tracker_info[tracker_id]);
			 if(this_tracker_info == undefined){
			     return null;
			 }
			 var data = this_tracker_info['data'];
			 var headers = prepareHeaders(data);
			 var cols = data[0];
			 this_tracker_info['grid_flag'] = 1;
			 for(var i in data[1]){
			     if(data[0][i] != "Date"){
				 if(data[1][i] != "" && data[1][i] != null){
				     this_tracker_info['grid_flag'] = 0;
				 }
			     }
			 }
			 addColumn(headers);
			 if(!this_tracker_info['grid_flag']){
			     var graph_row = Array();
			     var temp_data = Array();
			     for(var i in headers){
				 temp_data[headers[i]['field']] = '';
			     }
			     data.splice(1, 0, temp_data);
			     this_tracker_info['grid_flag'] = 1;
			 }
			 $scope.currentTrackerId = tracker_id;
			 $scope.currentTrackerData = data;
			 $scope.currentCols = cols;
			 $scope.headers = headers;
			 var gridOptions = { 
			     data: "currentTrackerData",
			     enableCellSelection: true,
			     enableRowSelection: false,
			     headerRowHeight: 0,
			     rowHeight: 25,
			     enableCellEdit: true,
			     columnDefs: "headers",
			 }
			 return gridOptions;
		     }
		     var prepareHeaders = function(data){
			 var cols = data[0];
			 var headers = Array();
			 var cellEditableTemplate = "<input ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row)\"/>";
			 var col_count = 0;
			 for(var i in cols){
			     var col_header = {};
			     col_header['field'] = i;
			     col_header['displayName'] = cols[i];
			     col_header['enableCellEdit'] = true;
			     col_header['cellTemplate'] = '<div style="height:100%"><div class="ngCellText"><span><label style="float:left;width:30px;">{{row.entity[col.field]}}</label><img src="/ayushman/assets/public/images/graph.png" style="float:right;height:15px;width:15px" ng-if="row.rowIndex == 0 && col.field != 0" ng-click="showgraph(col)"/></span></div></div>';
			     col_header['editableCellTemplate'] = cellEditableTemplate;
			     if(i == 0)
				 col_header['width'] = "100px";
			     else
				 col_header['width'] = "60px";
			     headers.push(col_header);
			     col_count++;
			 }
			 return headers;
		     }
		     $scope.updateTracker = function(col, row){
			 var colNum = col.index;
			 var rowNum = row.rowIndex;
			 var rowData = row.entity;
			 if(rowData[colNum]){
			     var date = rowData[0];
			     if(rowNum == 1)
				 var isDate = isValidDate(date);
			     else
				 var isDate = true;
			     if(isDate){
				 if(colNum == $scope.headers.length - 1){
				     $scope.currentColCount++;
				     $scope.headers = addColumn($scope.headers);
				 }
				 if(rowNum == 1){
				     var temp_data = Array();
				     for(var i in $scope.headers){
					 temp_data[$scope.headers[i]['field']] = '';
				     }
				     $scope.currentTrackerData.splice(1, 0, temp_data);
				 }
				 var currTrackerId = ($scope.tracker_info['selected']);
				 for( var x in $scope.tracker_info.tracker_list){
				     var el = ($scope.tracker_info.tracker_list[x]);
				     if(el['id'] == currTrackerId){
					 el['is_edit'] = true;
				     }
				 }
			     }
			     else{
				 alert('Please check date column');
			     }
			 }
		     };
		     var isValidDate = function (value) {
			 try{
			     var month = new Array();
			     month[0]="jan";
			     month[1]="feb";
			     month[2]="mar";
			     month[3]="apr";
			     month[4]="may";
			     month[5]="june";
			     month[6]="july";
			     month[7]="aug";
			     month[8]="sep";
			     month[9]="oct";
			     month[10]="nov";
			     month[11]="dec";
			     var date_value = value.split(' ')[0];
			     var time_value = value.split(' ')[1];
			     if(time_value){
				 time_value = time_value.split(':');
				 if(!(time_value[0] >=0 && time_value[0] <=23 && time_value[1]>=0 && time_value[1]<=59)){
				     return 'false';
				 }
			     }
			     var userFormat = 'dd-mmm-yyyy', // default format
			     delimiter = /[^mdy]/.exec(userFormat)[0],
			     theFormat = userFormat.split(delimiter),
			     theDate = date_value.split(delimiter),
			     isDate = function (date, format) {
				 var m, d, y  
				 for (var i = 0, len = format.length; i < len; i++) {
				     if (/m/.test(format[i])) m = date[i]
				     if (/d/.test(format[i])) d = date[i]
				     if (/y/.test(format[i])) y = date[i]
				 }
				 if (month.indexOf(m.toLowerCase()) == -1){
				     return false;
				 }
				 if(!(y && y.length === 4)){
				     return false;
				 }
				 if(!(d > 0 && d <= (new Date(y, month.indexOf(m), 0)).getDate())){
				     return false;
				 }
				 return true;
			     }
			     return isDate(theDate, theFormat)
			 }
			 catch(err){
			     alert('Please check date column');
			 }
		     }
		     
		     var addColumn = function(headers){
			 var cellEditableTemplate = "<input ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row)\"/>";
			 var col_count = headers.length;
			 var col_header = {};
			 col_header['field'] = col_count.toString();
			 col_header['displayName'] = 'Temp';
			 col_header['enableCellEdit'] = true;
			 col_header['cellTemplate'] = '<div style="height:100%"><div class="ngCellText"><span><label style="float:left;width:25px;">{{row.entity[col.field]}}</label><img src="/ayushman/assets/public/images/graph.png" style="float:right;height:15px;width:15px" ng-if="row.rowIndex == 0 && col.field != 0" ng-click="showgraph(col)"/></span></div></div>';
			 col_header['editableCellTemplate'] = cellEditableTemplate;
			 col_header['width'] = '60px';
			 headers.push(col_header);
			 return headers;
		     };
		     
		     var get_tracker_data = function(){
			 var prevTrackerId = $scope.currentTrackerId;
			 for( var x in $scope.tracker_info.tracker_list){
			     var el = ($scope.tracker_info.tracker_list[x]);
			     if(el['id'] == prevTrackerId){
				 if(el['is_edit'] == true){
				     alert('You have unsaved changes. Please save or discard them before proceeding.');
				     $scope.tracker_info['selected'] = prevTrackerId;
				     return;
				 }
			     }
			 }
			 var tracker_id = $scope.tracker_info['selected'];
			 if(tracker_id == null){
			     return;
			 }
			 if($scope.tracker_info[tracker_id] == undefined || $scope.tracker_info[tracker_id]['data'] == undefined){
			     trackerApi
				 .get({'app_id': app_id, 'tracker_id':tracker_id},
				      function(data){
					  trackerService.setTrackerData(app_id, tracker_id, data);
					  $scope.tracker_info[tracker_id]['loaded'] = true;
				      });
			 }
			 else{
			     if($scope.tracker_info[tracker_id]['loaded'] == true){
				 $scope.currentTrackerData = $scope.tracker_info[tracker_id]['data'];
				 var headers = prepareHeaders($scope.tracker_info[tracker_id]['data']);
				 headers = addColumn(headers);
				 $scope.headers = headers;
				 $scope.currentTrackerId = tracker_id;
			     }
			 }
		     };
		     $scope.$on('$locationChangeStart', function (event, newUrl, oldUrl) {
			 var prevTrackerId = $scope.currentTrackerId;
			 for( var x in $scope.tracker_info.tracker_list){
			     var el = ($scope.tracker_info.tracker_list[x]);
			     if(el['id'] == prevTrackerId){
				 if(el['is_edit'] == true){
				     alert('You have unsaved changes. Please save or discard them before proceeding.');
				     event.preventDefault();
				 }
			     }
			 }
		     });
		     var delete_tracker= function(tracker_id){
			 trackerApi
			     .delete({'tracker_id': tracker_id},
				     function(data){
					 trackerService.deleteTracker(app_id, tracker_id);
					 get_tracker_data();
				     });
		     };
		     $scope.update_tracker_name = function(tracker_index){
			 var tracker_name = $scope.tracker_info['tracker_list'][tracker_index]['name'];
			 var tracker_id =  $scope.tracker_info['tracker_list'][tracker_index]['id'];
			 trackerListApi.save({'tracker_name':tracker_name, 'tracker_id':tracker_id},function(data){
			 });
		     }
		     var save_tracker = function(tracker_id){
			 var tracker_data =($scope.tracker_info[tracker_id]['data']);
			 delete tracker_data[1];
			 tracker_data = JSON.stringify(tracker_data);
			 trackerApi
			     .save({'tracker_id':tracker_id,'tracker_data':tracker_data, 'app_id':app_id},function(data){
			     });
		     }
		     var discard_tracker = function(tracker_id){
			 delete $scope.tracker_info[tracker_id]['data'];
			 $scope.tracker_info[tracker_id]['loaded'] = false;
			 for( var x in $scope.tracker_info.tracker_list){
			     var el = ($scope.tracker_info.tracker_list[x]);
			     if(el['id'] == tracker_id){
				 el['is_edit'] = false;
			     }
			 }
			 get_tracker_data();
		     }
		     var create_tracker = function(template_id){
			 trackerApi
			     .save({'tracker_id':null, 'tracker_cols':null, 'tracker_data':null,'app_id':app_id, 'template_id':template_id},function(data){
				 trackerService.addTracker(app_id, data.info, data.values);
				 $scope.tracker_info['selected'] = data.info.id;
				 $scope.tracker_info[data.info.id]['loaded'] = true;
			     });

		     }
		     var create_template = function(tracker_id){
			 var col_data = JSON.stringify($scope.tracker_info[tracker_id]['data'][0]);
			 var template_name = ($scope.tracker_info[tracker_id]['template_name']);
			 if(template_name == undefined){
			     alert('Please enter template name'); 
			 }
			 for(var i=0; i<$scope.tracker_info['template_list'].length; i++){
			     if($scope.tracker_info['template_list'][i]['name'] == template_name){
				 alert('A template with the same name already exists. Please change the template name.');
				 return;
			     }
			 }
			 trackerTemplateApi
			     .save({'name': template_name,'data':col_data},function(data){
				 trackerService.addTemplate(data.template_id, template_name, app_id);
			     });
		     }
		     $scope.showgraph = function(col){
			 var tracker_id = $scope.tracker_info['selected'];
			 var tracker_info = $scope.tracker_info[tracker_id];
			 var col_name = col.field;
			 var graph_data = Array();
			 var tracker_data = tracker_info['data'];
			 for(var i=1;i<tracker_data.length; i++){
			     if(tracker_data[i] != undefined){
				 var point_data = Array();
				 var time_stamp = tracker_data[i][0];
				 var value = tracker_data[i][col_name];
				 if(isNaN(value)){
				     alert('Graph supported for numeric fields only');
				     return;
				 }
				 var re = new RegExp('-', 'g');
				 time_stamp = time_stamp.replace(re, ' ');
				 time_stamp = Date.parse(time_stamp);
				 point_data.push(time_stamp);
				 point_data.push(parseInt(value));
				 graph_data.push(point_data);
			     }
			 }
			 graph_data.sort(function(a, b){
			     if(a[0] < b[0]) return -1;
			     if(a[0] > b[0]) return 1;
			     return 0;
			 });
			 if($('#'+tracker_id+'_graph_place_holder').is(':visible')){
			     $('#'+tracker_id+'_graph_place_holder').parent().hide(1000);
			 }
			 else{
			     graph_data = [graph_data];
			     var left_offset = (((col_name) * 50)+130) + 'px';
			     $('#'+tracker_id+'_graph_place_holder').parent().css('left',left_offset);
			     var placeholder = $('#'+tracker_id+'_graph_place_holder');
			     var options = {
				 series: {
				     lines: {
					 show: true
				     },
				     points: {
					 show: true
				     }
				 },
				 xaxis: {
				     tickDecimals: 0,
				     mode: "time",
				     minTickSize: [1,'day'],
				 },
				 yaxis: {
				     min: 0,
				 },
				 selection: {
				     mode: "x"
				 }
			     };
			     placeholder.bind("plotselected", function (event, ranges) {
				 plot = $.plot(placeholder, graph_data, $.extend(true, {}, options, {
				     xaxis: {
					 min: ranges.xaxis.from,
					 max: ranges.xaxis.to
				     }
				 }));
			     });
			     var plot = $.plot(placeholder, graph_data, options);
			     //$.plot($('#'+id+'_graph_place_holder'), graph_data, {xaxis: { mode: "time",minTickSize: [1, "day"] }});
			     $(placeholder).parent().show(1000);
			 }
		     }
		     $scope.create_template = create_template;
		     $scope.create_tracker = create_tracker;
		     $scope.save_tracker = save_tracker;
		     $scope.delete_tracker = delete_tracker;
		     $scope.get_tracker_data = get_tracker_data;
		     $scope.is_selected = is_selected;
		     $scope.discard_tracker = discard_tracker;
		 }]);

