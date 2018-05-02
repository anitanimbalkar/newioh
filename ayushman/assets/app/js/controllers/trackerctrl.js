angular.module('app.controllers')
    .controller('trackerCtrl', 
		['$scope', 'trackerService','trackerApi','trackerTemplateApi', '$routeParams',
		 function($scope, trackerService, trackerApi, trackerTemplateApi, $routeParams, trackerListApi) {
    		     $('.ui-multiselect-menu').hide();
		     var app_id = $routeParams.appointment_id;
		     $scope.app_id = app_id;
			$scope.gotparametersdata=false;
			$scope.toparameterdate='Not_provided';
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
		     $scope.delete_tracker = function(app_id, tracker_id){
			 var deleteConfirm = confirm("Are you sure you want to delete this tracker?");
			 if(deleteConfirm)
			     trackerService.deleteTracker(app_id, tracker_id);
		     };
		     $scope.is_selected = is_selected;
		     $scope.discard_tracker = trackerService.discardTracker;
		     $scope.save_tracker = trackerService.saveTracker;
		     $scope.create_tracker = trackerService.createTracker;
		     $scope.get_tracker_data = trackerService.loadTracker;
		     $scope.updateTracker = trackerService.updateTracker;
		     $scope.create_template = trackerService.createTemplate;
		     $scope.update_tracker_name = trackerService.updateTrackerName;

		     var rearrange_tracker= function(tracker_info,tracker_data,app_id,start_date){
			     trackerService.rearrangeTracker(tracker_info,tracker_data,app_id,start_date,$scope.toparameterdate)
			     	.then(function(data){
						$scope.setloadingoption(false);
				});
			};
			$scope.rearrange_tracker =rearrange_tracker;
			

		     var update_databy_date= function(tracker_id,tracker_info,app_id,index){
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
				  //  	trackerService.updateTrackerStartdate(tracker_id,start_date);
				    	trackerService.rearrangeTracker(tracker_info,tracker_data,app_id,tracker_info['tracker_list'][index]['parameterstartdate'],tracker_info['tracker_list'][index]['parametertodate'])
				    	 .then(function(data){
								$scope.setloadingoption(false);
						});
					}	
			};
			$scope.update_databy_date =update_databy_date;
			
		     var create_new_tracker = function(template_id){
				 $scope.add_tracker_id = template_id;
				 //$scope.$broadcast('add_tracker');
				 $scope.create_tracker($scope.add_tracker_id, app_id)
		     };
			 $scope.create_new_tracker = create_new_tracker;
		     $scope.$on('add_tracker', function(){
				$scope.create_tracker($scope.add_tracker_id, app_id);
		     });
		     
			 $scope.refresh_graph = function(){
				alert('here');
				$scope.showgraph($scope.col); 
		     }
		     $scope.hide_graph = function(){
				var tracker_id = $scope.tracker_info['selected'];
				$('#'+tracker_id+'_graph_place_holder').parent().hide(1000);	 
		     }
			 $scope.col = "";
		     $scope.showgraph = function(col){
				$scope.col = col;
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
.directive('autocompletedefault', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs,ngModelCtrl) {
			$(function(){
				//console.log(element);
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
						response( $.ui.autocomplete.filter(JSON.parse(data), request.term));
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
							/*if(scope.tracker_info['tracker_parameterlist'][scope.tracker_info['selected']]){
								for(var index=0;index<scope.tracker_info['tracker_parameterlist'][scope.tracker_info['selected']].length;index++){
									if(scope.tracker_info['tracker_parameterlist'][scope.tracker_info['selected']][index]==ui.item.value){
										alert("This Parameter is already Exist in the tracker at column no"+(index+2));
										flag=1;
										break;
									}
								}
							}
							
							for(var index=0;index<scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0].length;index++){
								if(scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0][index]==ui.item.value){
										alert("This Parameter is already Exist in the tracker at column no - "+(index+1));
										flag=1;
										ngModelCtrl.$setViewValue(' ');
										scope.$apply();
										break;
								}
							}
						
						if(scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0].length>1){
					      for(var x in scope.tracker_info['tracker_list']){
							  var el = (scope.tracker_info.tracker_list[x]);
			    				 if(el['id'] == scope.tracker_info['selected']){
									  if(el['is_edit']){
					  				      alert('You have unsaved changes. Please save them before proceeding.');
					  				      flag=1;
					  				      break;
									  }
			     				 }
		      			  }
						}
						*/	
								ngModelCtrl.$setViewValue(ui.item.value);
								scope.$apply();
								scope.setloadingoption(true);
								//scope.tracker_info['tracker_parameterlist'][scope.tracker_info['selected']].push(ui.item.value);
								var tracker_data=JSON.stringify(scope.tracker_info['tracker_data'][scope.tracker_info['selected']][0]);
								scope.rearrange_tracker(scope.tracker_info,tracker_data,scope.app_id,'Not_provided');
						}						
						$.ajax({
						});
					}
				});
			});
		}
	}
	
});
