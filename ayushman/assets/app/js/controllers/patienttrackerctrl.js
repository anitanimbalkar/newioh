angular.module('app.controllers')
    .controller('patienttrackerCtrl', 
		['$scope','$route', 'patienttrackerService','trackerApi','trackerTemplateApi', '$routeParams',
		 function($scope,$route, patienttrackerService, trackerApi, trackerTemplateApi, $routeParams) {
		
			 $scope.notes = "";
			 $scope.allnotes = "";
			 $scope.editid = "";
			 $scope.reminderstartdate="";
			 $scope.templatecode="";
			 $scope.templatedesc="";
			 $scope.templatemailbody="";
			 $scope.templatevariables="";
			 $scope.variabledata = "";
			 $scope.smsflag = 1;
			 $scope.dbflag = 0;
			 $scope.emailflag = 1;
			 $scope.editreminderid = "";
			 $scope.allreminders ="";
			 $scope.frequency = "";
			 
    		     $('.ui-multiselect-menu').hide();
		    var patient_id = $routeParams.patient_id;
		     $scope.patient_id = patient_id;
		    			 
			 
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
				 var curr_tracker_id = $scope.tracker_info['current_tracker_id'];
				 $scope.current_tracker_data = ($scope.tracker_info['tracker_data'][curr_tracker_id]);
				 var headers = prepareHeaders($scope.current_tracker_data);
				 $scope.headers = headers; 
				 $scope.currentGrid = {
					 data: "current_tracker_data",
					 enableCellSelection: true,
					 headerRowHeight: 0,
					 columnDefs: "headers"
				 };
			 };
			 patienttrackerService.getTrackerInfo(patient_id)
					.then(function(data){
						$scope.tracker_info = data;
						prepare_tile_grid();
				});
			 
			$scope.gotparametersdata=false;
			$scope.toparameterdate='Not_provided';
			$scope.gridlength=[];
	$.post("/ayushman/cconsultation/getpatientinfo", {data:patient_id}, 
		function(data){     
			$scope.patientinfo =  jQuery.parseJSON(data);
		}
	);
	
	// $scope.$on('ngGridEventData', function(event) {
 // 	   if ($scope.gridlength[$scope.tracker_info['current_tracker_id']] == undefined){
	// 	    $scope.gridlength[$scope.tracker_info['current_tracker_id']]=event.targetScope.renderedRows.length;
 //    	}
 //    	else if(event.targetScope.renderedRows.length >$scope.gridlength[$scope.tracker_info['current_tracker_id']]) {
 //    		$scope.tracker_info['paramdata_createdby'][$scope.tracker_info['current_tracker_id']].splice(1,0,Array());
 //    	}
 //    	else{}
	// });
			var setloadingoption = function(option){
				$scope.gotparametersdata=option;
			};
			$scope.setloadingoption=setloadingoption;
		     /* logic for displaying tracker */
		     var is_selected = function(link_name){
			 if(link_name == $scope.tracker_info['selected']){
			     return 'nav_selected';
			 }
		     };
		     /* logic for displaying tracker ends */

		     $scope.$on('$locationChangeStart', function (event, newUrl, oldUrl) {
			 var prevTrackerId = $scope.tracker_info['current_tracker_id'];
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
		     $scope.delete_tracker = function(patient_id, tracker_id){
			 var deleteConfirm = confirm("Are you sure you want to delete this tracker?");
			 if(deleteConfirm)
			     patienttrackerService.deleteTracker(patient_id, tracker_id);
		     };
		     $scope.is_selected = is_selected;
		     $scope.discard_tracker = patienttrackerService.discardTracker;
		     $scope.save_tracker = patienttrackerService.saveTracker;
		     $scope.create_tracker = patienttrackerService.createTracker;
		     $scope.get_tracker_data = patienttrackerService.loadTracker;
		     $scope.updateTracker = patienttrackerService.updateTracker;
		     $scope.create_template = patienttrackerService.createTemplate;
		     $scope.update_tracker_name = patienttrackerService.updateTrackerName;

		     var rearrange_tracker= function(tracker_info,tracker_data,patient_id,start_date){
			     patienttrackerService.rearrangeTracker(tracker_info,tracker_data,patient_id,start_date,$scope.toparameterdate)
			     	.then(function(data){
						$scope.setloadingoption(false);
				});
			};
			$scope.rearrange_tracker =rearrange_tracker;
			

		     var update_databy_date= function(tracker_id,tracker_info,patient_id,index){
							$scope.setloadingoption(true);
		     		var start_date=new Date(tracker_info['tracker_list'][index]['parameterstartdate']);
		     		var to_date=new Date(tracker_info['tracker_list'][index]['parametertodate']);
		     		$scope.toparameterdate=to_date;
		     		if(start_date >= to_date){
		     			alert("Start Parameter's date must be less than To Parameter's date");
								$scope.setloadingoption(false);
		     		}
					else{		     		
						var tracker_data=JSON.stringify(tracker_info['tracker_data'][tracker_id][0]);
				  //  	patienttrackerService.updateTrackerStartdate(tracker_id,start_date);
				    	patienttrackerService.rearrangeTracker(tracker_info,tracker_data,patient_id,tracker_info['tracker_list'][index]['parameterstartdate'],tracker_info['tracker_list'][index]['parametertodate'])
				    	 .then(function(data){
								$scope.setloadingoption(false);
						});
					}	
			};
			$scope.update_databy_date =update_databy_date;
			
		     var create_new_tracker = function(template_id){
				 $scope.add_tracker_id = template_id;
				 //$scope.$broadcast('add_tracker');
				 $scope.create_tracker($scope.add_tracker_id, patient_id)
		     };
			 $scope.create_new_tracker = create_new_tracker;
		     $scope.$on('add_tracker', function(){
				$scope.create_tracker($scope.add_tracker_id, patient_id);
		     });
		     

		     $scope.hide_graph = function(){
				var tracker_id = $scope.tracker_info['selected'];
				$('#'+tracker_id+'_graph_place_holder').parent().hide(1000);	 
		     }
		     $scope.showgraph = function(col){
				 var tracker_id = $scope.tracker_info['selected'];
				 var col_name = col.field;
				 var graph_data = Array();
				 var tracker_data = $scope.tracker_info['tracker_data'][tracker_id];
				 var col_text = tracker_data[0][col.field];
				 if(col_text == undefined){
					 return;
				 }
				 $('#'+tracker_id+'_graph_title').text(col_text);
				 for(var i=1;i<tracker_data.length; i++){
					 if(tracker_data[i] != undefined){
					 var point_data = Array();
					 var time_stamp = tracker_data[i][0];
					 var value = tracker_data[i][col_name];
					 if(value == "" || value == undefined)
						 continue;
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
				/* if($('#'+tracker_id+'_graph_place_holder').is(':visible')){
					 $('#'+tracker_id+'_graph_place_holder').parent().hide(1000);
				 }
				 else{*/
					 graph_data = [graph_data];
					 var placeholder = $('#'+tracker_id+'_graph_place_holder');
					 var options = {
					 series: {
						 lines: {
						 show: true,
						 lineWidth: 0.05
						 },
						 points: {
						 show: true
						 }
					 },
					 xaxis: {
						 tickDecimals: 0,
						 mode: "time",
						 minTickSize: [1,'day']
					 },
					 yaxis: {
						 min: 0,
						 axisLabelPadding: 3
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
				 //}
		     }
			
			// Functions added for notes and reminder 
			// functionality on tracker
			var settemplatedata= function(){
				$scope.templatevariables = "";
				$scope.templatemailbody = "";
				for(var index in $scope.remindertemplates){
					if ($scope.remindertemplates[index]['code']==$scope.templatecode)
  					{
						$scope.templatevariables = $scope.remindertemplates[index]['variable'];
						$scope.templatemailbody = $scope.remindertemplates[index]['mailbody'];
					}
				}
			}
			$scope.settemplatedata = settemplatedata;
			var getremindertemplates= function(){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/getremindertemplates",
					success: function(data) {
						$scope.remindertemplates=jQuery.parseJSON(data);
						console.log($scope.remindertemplates);
					} });
				};
			$scope.getremindertemplates =getremindertemplates;			
			$scope.getremindertemplates();
			
			var savereminder= function(){
				$scope.templatedesc = $scope.templatemailbody;
				if(($scope.smsflag == 0) && ($scope.emailflag == 0) && ($scope.dbflag == 0))
					showNotification('300','20','Set reminder','<h5>At least one option of messaging has to be selected </h5>','notification','timernotification',1000);	
				else if (($scope.templatecode== "") && ($scope.smsflag==1)) 
					showNotification('300','20','Set reminder','<h5>Select template</h5>','notification','timernotification',1000);						
				else if ($scope.reminderstartdate== "") 
					showNotification('300','20','Set reminder','<h5>Select start date for reminders</h5>','notification','timernotification',1000);										
				else if($scope.frequency== "")
					showNotification('300','20','Set reminder','<h5>Select frequency</h5>','notification','timernotification',1000);						
				else 
				{
					if ($scope.editreminderid=="")
					{
						$.ajax({ 
						url: "/ayushman/cnewtracksheet/savereminder?templatecode="+$scope.templatecode
							+"&templatedesc="+$scope.templatedesc+"&frequency="+$scope.frequency
							+"&smsflag="+$scope.smsflag+"&emailflag="+$scope.emailflag+"&dbflag="+$scope.dbflag
							+"&variabledata="+$scope.variabledata
							+"&reminderstartdate="+$scope.reminderstartdate+"&patientid="+patient_id,
						success: function() {
							showNotification('300','20','Set reminder','<h5>Reminder set </h5>','notification','timernotification',1000);															
							//$( "#allreminderslink" ).click();						
							getallreminders();
							$( "#allreminderslink" ).click();						
							//$route.reload();						
						} });
					}
					else
					{
						$.ajax({ 
						url: "/ayushman/cnewtracksheet/editreminder?templatecode="+$scope.templatecode
							+"&templatedesc="+$scope.templatedesc+"&frequency="+$scope.frequency
							+"&smsflag="+$scope.smsflag+"&emailflag="+$scope.emailflag+"&dbflag="+$scope.dbflag
							+"&variabledata="+$scope.variabledata
							+"&reminderstartdate="+$scope.reminderstartdate+"&patientid="+patient_id+"&editid="+$scope.editreminderid,
						success: function() {
							showNotification('300','20','Set reminder','<h5>Reminder set </h5>','notification','timernotification',1000);															
							//$( "#allreminderslink" ).click();						
							getallreminders();
							$( "#allreminderslink" ).click();						
					//$route.reload();						
						} });
						// Edit existing record
					}
					$scope.editreminderid = "";
					$scope.reminderstartdate="";
					$scope.templatecode="";
					$scope.templatedesc="";
					$scope.templatemailbody="";
					$scope.templatevariables="";
					$scope.variabledata= "";
					$scope.smsflag = 1;
					$scope.dbflag = 0;
					$scope.emailflag = 1;
					$scope.frequency = "";
				}
			};
			$scope.savereminder =savereminder;			
			var getallreminders= function(){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/getallreminders?patientid="+patient_id,
					success: function(data) {
						$scope.allreminders=jQuery.parseJSON(data);
					},
					error : function(){showMessage('550','200','Error',"Could not retrieve data",'error','id');}
					});
			};
			$scope.getallreminders =getallreminders;
			$scope.getallreminders();
			var deletereminder= function(id,index){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/deletereminder?id="+id,
					success: function(data) {
						showNotification('300','20','Delete reminder','<h5>Reminder deleted</h5>','notification','timernotification',1000);									
						getallreminders();
						$( "#allreminderslink" ).click();						
						//$route.reload();						
					},
					error : function(){showMessage('550','200','Error',"Could not delete",'error','id');}
					});
			};
			$scope.deletereminder =deletereminder;
			
			var editreminder= function(id,index){
				$scope.editreminderid = id;				
				$scope.reminderstartdate= $scope.allreminders[index].startdate;
				$scope.templatecode=$scope.allreminders[index].templatecode;
				$scope.templatedesc=$scope.allreminders[index].description;
				settemplatedata();
				$scope.templatemailbody= $scope.templatedesc;					
				$scope.variabledata=$scope.allreminders[index].variabledata ;
				$scope.smsflag = $scope.allreminders[index].smsflag;
				$scope.dbflag = $scope.allreminders[index].dbflag;
				$scope.emailflag = $scope.allreminders[index].emailflag;
				$scope.frequency = $scope.allreminders[index].frequencyvalue;				
				if($scope.smsflag == 1)
				{
					$("#mailbodyreadonly").show();
					$("#mailbodyeditable").hide();
				}
				else
				{
					$("#mailbodyreadonly").hide();
					$("#mailbodyeditable").show();					
				}
			};
			$scope.editreminder =editreminder;
			
			var addreminder= function(){
				$scope.editreminderid = "";
				$scope.reminderstartdate="";
				$scope.templatecode="";
				$scope.templatedesc="";
				$scope.templatemailbody="";
				$scope.templatevariables="";
				$scope.variabledata= "";
				$scope.smsflag = 1;
				$scope.dbflag = 0;
				$scope.emailflag = 1;
				$scope.frequency = "";		
				$("#mailbodyreadonly").show();
				$("#mailbodyeditable").hide();
			};
			$scope.addreminder = addreminder;
			
			var setsmsflag = function(){
				if ($("#smsflag").is(':checked'))
				{
					$scope.smsflag = 1;
					$("#mailbodyreadonly").show();
					$("#mailbodyeditable").hide();
					if($scope.templatecode!="")
						settemplatedata();
					showNotification('300','20','Notification','<h5>You cannot modify mail template.</h5>','notification','timernotification',2000);									
				}
				else
				{
					$scope.smsflag = 0;
					$("#mailbodyreadonly").hide();
					$("#mailbodyeditable").show();
					showNotification('300','20','Notification','<h5>You can modify mail template if required</h5>','notification','timernotification',2000);									
				}
			};
			$scope.setsmsflag =setsmsflag;			
			
			var setemailflag = function(){
				if ($("#emailflag").is(':checked'))
					$scope.emailflag = 1;
				else
					$scope.emailflag = 0;
				};
			$scope.setemailflag =setemailflag;			
			
			var setdbflag = function(){
				if ($("#dbflag").is(':checked'))
					$scope.dbflag = 1;
				else
					$scope.dbflag = 0;
				};
			$scope.setdbflag =setdbflag;			
			
			var savenotes= function(){
				if($scope.editid !="")
				{
					$.ajax({ 
					url: "/ayushman/cnewtracksheet/editnotes?notes="+$scope.notes+"&patientid="+patient_id+"&editid="+$scope.editid,
					success: function() {
						//showNotification('300','20','Saving','<h5>Saving notes</h5>','notification','timernotification',1000);															
						//$route.reload();
						showNotification('300','20','Save notes','<h5>Notes saved</h5>','notification','timernotification',1000);															
						$( "#allnoteslink" ).click();						
						getallnotes();
					} });
				$scope.notes = "";
				$scope.editid = "";					
				}
				else if(($scope.notes!= " ") && ($scope.notes!= ""))
				{
					$.ajax({ 
					url: "/ayushman/cnewtracksheet/savenotes?notes="+$scope.notes+"&patientid="+patient_id,
					success: function() {
						//showNotification('300','20','Saving','<h5>Saving notes</h5>','notification','timernotification',1000);															
						//$route.reload();
						showNotification('300','20','Save notes','<h5>Notes saved</h5>','notification','timernotification',1000);															
						$( "#allnoteslink" ).click();						
						getallnotes();
					} });
				$scope.notes = "";
				$scope.editid = "";
				}
			};
			$scope.savenotes =savenotes;
			var getallnotes= function(){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/getallnotes?patientid="+patient_id,
					success: function(data) {
						$scope.allnotes=jQuery.parseJSON(data);
					},
					error : function(){showMessage('550','200','Error',"Could not retrieve data",'error','id');}
					});
			};
			$scope.getallnotes =getallnotes;
			$scope.getallnotes();
			var deletenote= function(id,index){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/deletenote?id="+id,
					success: function(data) {
						showNotification('300','20','Delete notes','<h5>Notes deleted</h5>','notification','timernotification',1000);									
						//$route.reload();						
						getallnotes();						
						$( "#allnoteslink" ).click();						
					},
					error : function(){showMessage('550','200','Error',"Could not delete",'error','id');}
					});
			};
			$scope.deletenote =deletenote;
			var editnote= function(id,editednotes){
				$scope.editid = id;
				$scope.notes = editednotes;
			};
			$scope.editnote =editnote;
			var addnote= function(){
				$scope.editid = "";
				$scope.notes = "";
			};
			$scope.addnote = addnote;
			
		 }])
.directive('datepickerdefault', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "-120:+0",maxDate: '0',changeYear: true,changeMonth: true,  dateFormat: 'dd M yy',
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
				
			});
		}
	}
})
.directive('futuredatepicker', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "-120:+2",minDate: '1',changeMonth: true,changeYear: true,dateFormat: 'dd M yy',					
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
				
			});
		}
	}
})		 
.directive('autocompletetestpara', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				element.autocomplete({
minLength: 1,
	source: function( request, response ) {
			var	paralist=new Array();
			for(var index=1;index<scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0].length-1;index++){
				paralist.push(scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0][index]);
			}
			paralist=JSON.stringify(paralist);
			var temp={term:request.term,paralist:paralist};
			if(request.term.length>1){
			$.ajax({
					type: 'POST',
					data:temp,
					url: "/ayushman/cautocompletedata/retrievetestparameter",
					datatype: 'json', 
					success: function (data) {

						response( $.ui.autocomplete.filter(JSON.parse(data), extractLast1( request.term )));
					},
					error: function (req, status, error) {
									ErrorMessage(req.responseText);
									$("#ui-datepicker-div").hide();
					}
			});
			}
	},
			focus: function() {
				return false;
			},
			select: function( event, ui ) {
				var parameterid=ui.item.paraid;
				var flag=0,item;
				if(ui.item.value){
								ngModelCtrl.$setViewValue(ui.item.value);
								scope.$apply();
								scope.setloadingoption(true);
								//scope.tracker_info['tracker_parameterlist'][scope.tracker_info['selected']].push(ui.item.value);
								var tracker_data=JSON.stringify(scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0]);
								scope.rearrange_tracker(scope.tracker_info,tracker_data,scope.patient_id,'Not_provided');
						}						
						// $.ajax({
						// });
					}
				});
			});
		}
	}
	
});
