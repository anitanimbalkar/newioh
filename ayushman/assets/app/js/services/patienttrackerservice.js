window.angular.module('app.services')
    .service('patienttrackerService',
	     ['patienttrackerApi', '$q', 'trackerTemplateApi', 'trackerListApi','universaltrackerApi',
	      function (patienttrackerApi, $q, trackerTemplateApi, trackerListApi,universaltrackerApi) {
		  var all_tracker_info = {};
		  var headerid = {};
		  
		  var prepareGrid = function(gridId, gridData, patient_id,paramdataCreatedby){
		      var temp1 = new Array();
			 for (var x in gridData[0]){
			      temp1[x] = -1;
		      }
			  console.log(paramdataCreatedby);
		      paramdataCreatedby.splice(1, 0, temp1);
		      var headers = prepareHeaders(gridData, patient_id, gridId,paramdataCreatedby);
		      headers = addColumn(headers, patient_id, gridId);
			  var temp = new Array();
		      for (var x in gridData[0]){
			      temp[x] = "";
		      }
		      //gridData.splice(1, 0, temp);
			  gridData.splice(3, 0, temp);
			  // Empty row added at third position
		      all_tracker_info[patient_id]['headers'][gridId] = headers;
		      var gridOptions = { 
				  data: "tracker_info['tracker_data']["+gridId+"]",
				  enableCellSelection: true,
				  enableRowSelection: false,
				  headerRowHeight:30,
				  rowHeight: 30,
				  enableSorting:false,
				  enablePinning:true,
				  /*enableColumnResizing:true,
				  enableColumnReordering:true,*/
				  /*plugins: [new ngGridFlexibleHeightPlugin()],*/
				  columnDefs: "tracker_info['headers']["+gridId+"]"
		      }
			  console.log(gridOptions);
		      return gridOptions;
		  }
		  var setEditStatus = function(patient_id, tracker_id, status){
		      var tracker_info = all_tracker_info[patient_id];
		      for(var x in tracker_info['tracker_list']){
			  var el = (tracker_info.tracker_list[x]);
			     if(el['id'] == tracker_id){
				 el['is_edit'] = status;
			     }
		      }
		  }
		  var getEditStatus = function(patient_id, tracker_id){
		      var tracker_info = all_tracker_info[patient_id];
		      for(var x in tracker_info['tracker_list']){
			  var el = (tracker_info.tracker_list[x]);
			     if(el['id'] == tracker_id){
				 return el['is_edit']; 
			     }
		      }
		      return false;
		  }
		  var addColumn = function(headers, patient_id, gridId){
		      var cellEditableTemplate = "<input style=\"height:30px;position:fixed;\"  ng-if='row.rowIndex != 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/><input autocompletetestpara style=\"height:30px;position:fixed;\" ng-show='row.rowIndex == 0 && col.field != 0'  ng-class=\"'colt' + col.index\"  ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>";
		      var col_count = headers.length;
		      var col_header = {};
		      col_header['field'] = col_count.toString();
		      col_header['displayName'] = 'Add';
		      col_header['enableCellEdit'] = true;
		      col_header['cellTemplate'] = "<div style=\"height:30px\"><div class=\"ngCellText\" ><span><label style=\"display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:120px;height:30px;\">{{row.entity[col.field]}}</label><img src=\"/ayushman/assets/app/img/graph.png\" title=\"Draw a line graph for this column\" style=\"float:right;height:15px;width:15px\" ng-if=\"row.rowIndex == 0 && col.field != 0\" ng-click=\"showgraph(col)\"/></span></div></div>";
		      col_header['editableCellTemplate'] = cellEditableTemplate;
		      col_header['width'] = '120px';
		      headers.push(col_header);
		      return headers;
		  };
		  var prepareHeaders = function(data, patient_id, gridId,paramdataCreatedby){
		      var cols = data[0];
			  
			  var normal = data[2];
			  var target = data[3];
		      var headers = Array();
		      var cellEditableTemplate = "<input style=\"border-style:solid;border-color:#F2F2F2;height:30px;background-color :#FFCCCC;\" ng-disabled='true' ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='1'\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>  <input style=\"border-style:solid;border-color:#F2F2F2;height:30px;background-color :#F5F6CE;\" ng-disabled='true' ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='3'\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/> <input style=\"border-style:solid;border-color:#F2F2F2;height:30px;background-color :#CEF6CE;\" ng-disabled='true' ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='5'\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>   <input style=\"height:30px;\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='-1'\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>  <input style=\"height:30px;\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]==undefined\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>    <input autocompletetestpara style=\"height:30px;\" ng-show='row.rowIndex == 0 && col.field != 0'  ng-class=\"'colt' + col.index\"  ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+patient_id+","+gridId+")\"/>";
		      for(var i in cols){
				var col_header = {};
				col_header['field'] = i;
				col_header['displayName'] = cols[i];
				if(i == 0){
					col_header['width'] = "120px";
					  //col_header['cellTemplate'] = "<div ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\"><div class='ngCellText'><input class='datePickerInput' readonly='readonly' ng-if='row.rowIndex == 0' ng-model='row.entity[col.field]' /><input my-date-time-picker class='datePickerInput' readonly='readonly' ng-if='row.rowIndex != 0'  ng-model='row.entity[col.field]' /></div></div>";
					  //col_header['cellTemplate'] = "<div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\"><div class='ngCellText'><input class='datePickerInput' style='height:30px;'readonly='readonly'  ng-if='row.rowIndex == 0 || row.rowIndex == 1 || row.rowIndex == 2 ' ng-model='row.entity[col.field]' /><input my-date-time-picker class='datePickerInput' style='height:30px' readonly='readonly' ng-if='((row.rowIndex != 0)  && (row.rowIndex != 1) && (row.rowIndex != 2))'  ng-model='row.entity[col.field]' title={{row.entity[col.field]}} /></div></div>";
					  col_header['cellTemplate'] = "<div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\"><div class='ngCellText'><input class='datePickerInput' style='height:30px;color:#ddd;'readonly='readonly'  ng-if='row.rowIndex == 0' ng-model='row.entity[col.field]' /><input class='datePickerInput' style='height:30px;background-color: rgba(246, 255, 2, 0.2);'readonly='readonly'  ng-if='row.rowIndex == 1' ng-model='row.entity[col.field]' /><input class='datePickerInput' style='height:30px;background-color: rgba(246, 255, 2, 0.2);'readonly='readonly'  ng-if='row.rowIndex == 2' ng-model='row.entity[col.field]' /><input my-date-time-picker class='datePickerInput' style='height:30px' readonly='readonly' ng-if='((row.rowIndex != 0)  && (row.rowIndex != 1) && (row.rowIndex != 2))'  ng-model='row.entity[col.field]' placeholder='Enter date' title={{row.entity[col.field]}} /></div></div>";
					  col_header['pinned'] = true;
				}
				else{
					  //col_header['cellTemplate'] = "<div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='-1'\"><div class='ngCellText'><span><label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:90px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]==undefined\"><div class='ngCellText'><span><label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:90px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#FFCCCC;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='3'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>  <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :rgba(0, 0, 255, 0.45);'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='1'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>    <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#CEF6CE;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='5'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>";
					  col_header['cellTemplate'] = "<div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"row.rowIndex==0\">	<div class='ngCellText'>	<span>	<label  style='color:#ddd;display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:90px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}	</label> <img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span>	</div></div>    <div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"row.rowIndex==1 || row.rowIndex==2\">	<div class='ngCellText'>	<span>	<label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:120px;height:30px;background-color: rgba(246, 255, 2, 0.2);' title={{row.entity[col.field]}}>{{row.entity[col.field]}}	</label>	</span>	</div></div>   <div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='-1'\"><div class='ngCellText'><span><label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:120px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]==undefined\"><div class='ngCellText'><span><label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:120px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#FFCCCC;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='3'\"><div class='ngCellText'><span><label  style='float:left;width:120px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>  <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :rgba(0, 0, 255, 0.45);'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='1'\"><div class='ngCellText'><span><label  style='float:left;width:120px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>    <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#CEF6CE;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='5'\"><div class='ngCellText'><span><label  style='float:left;width:120px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>";
					  //col_header['cellTemplate'] = "<div  ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='-1'\"><div class='ngCellText'><span><label  ng-class=\"{'fixedlabel':'row.rowIndex == 0 || row.rowIndex == 1 ||row.rowIndex == 2','movelabel':'row.rowIndex > 2'}\"   style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:90px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div ng-class=\"{'headerheight':'row.rowIndex == 0','cellheight':'row.rowIndex != 0'}\" ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]==undefined\"><div class='ngCellText'><span><label  style='display:inline-block;white-space: nowrap;overflow:hidden !important;text-overflow: ellipsis;float:left;width:90px;height:30px;' title={{row.entity[col.field]}}>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>   <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#FFCCCC;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='3'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>  <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :rgba(0, 0, 255, 0.45);'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='1'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>    <div style='border-style:solid;border-color:#F2F2F2;height:30px;background-color :#CEF6CE;'  ng-if=\"tracker_info['paramdata_createdby'][tracker_info.current_tracker_id][row.rowIndex][col.index]=='5'\"><div class='ngCellText'><span><label  style='float:left;width:90px;height:30px;'>{{row.entity[col.field]}}</label><img src='/ayushman/assets/app/img/graph.png' style='float:right;height:15px;width:15px' ng-if='row.rowIndex == 0 && col.field != 0' ng-click='showgraph(col)'/></span></div></div>";
					  col_header['width'] = "120px";
					  col_header['enableCellEdit'] = true;
					  col_header['editableCellTemplate'] = cellEditableTemplate;
					  col_header['pinned'] = false;
				}
				headers.push(col_header);
		      }
			  console.log(headers);
		      return headers;
		  }
		  var loadTrackerData = function(patient_id){
		      var tracker_info = all_tracker_info[patient_id];
		      var load_tracker_id = tracker_info['selected'];
		      if(load_tracker_id && !tracker_info['tracker_data'][load_tracker_id]){
			  patienttrackerApi
			      .get({'patient_id': patient_id, 'tracker_id':load_tracker_id},
				   function(data){
					   console.log(data);
				       tracker_info['tracker_data'][load_tracker_id] = data.tracker_data;
				       tracker_info['paramdata_createdby'][load_tracker_id] = data.paramdata_createdby;
				       tracker_info['gridOptions'][load_tracker_id] = prepareGrid(load_tracker_id, data.tracker_data, patient_id,data.paramdata_createdby);
				       tracker_info['current_tracker_id'] = load_tracker_id;
					});
		      }
		      else
			  tracker_info['current_tracker_id'] = load_tracker_id;			  
			  
			for(i=0;i< tracker_info.tracker_list.length; i++ ){
				if(tracker_info.tracker_list[i].id ==load_tracker_id){
					tracker_info.headerid = {};
					tracker_info.headerid = tracker_info.tracker_list[i].headerid;
					headerid = tracker_info.headerid;
				}
			}			
		  }
			return{
		      getTrackerInfo:function(patient_id){
			  var deferred = $q.defer();
			  if(all_tracker_info[patient_id] != undefined){
			      deferred.resolve(all_tracker_info[patient_id]);
			  }
			  else{
			      patienttrackerApi
				  .get({patient_id: patient_id},
				       function(data){
						  console.log(data);
					   var tracker_info = data.tracker_info;
					   if(!tracker_info['tracker_data'])
					       tracker_info['tracker_data'] = {};
					   tracker_info['gridOptions'] = {};
					   tracker_info['headers'] = {};
					   //tracker_info['tracker_parameterlist'] =tracker_info['tracker_parameterlist'];
					   all_tracker_info[patient_id] = tracker_info;
					   if(tracker_info.current_tracker_id){
						   currTrackerId = tracker_info.current_tracker_id;		
					       currTrackerData = tracker_info['tracker_data'][currTrackerId];
					       all_tracker_info[patient_id]['selected'] = currTrackerId;
					       tracker_info['gridOptions'][currTrackerId] = prepareGrid(currTrackerId, currTrackerData, patient_id,tracker_info['paramdata_createdby'][currTrackerId]);
					   }
					   for(i=0;i< tracker_info.tracker_list.length; i++ ){
							if(tracker_info.tracker_list[i].id ==tracker_info.current_tracker_id){
								tracker_info.headerid = {};
								tracker_info.headerid = tracker_info.tracker_list[i].headerid;
							}
						}
					   deferred.resolve(all_tracker_info[patient_id]);
				       });
			  }
			  return deferred.promise;
		      },
		      loadTracker:function(patient_id){
				  var current_tracker_id = all_tracker_info[patient_id]['current_tracker_id'];
				  var editStatus = getEditStatus(patient_id, current_tracker_id);
				  if(editStatus){
					  alert('You have unsaved changes. Please save them before proceeding.');
					  all_tracker_info[patient_id]['selected'] = current_tracker_id;
				  }
				  else{
					  loadTrackerData(patient_id);
				  }
		      },
		      rearrangeTracker:function(tracker_info,tracker_data,patient_id,start_date,to_date){
			  var deferred = $q.defer();
		      var load_tracker_id = tracker_info['selected'];
			   all_tracker_info[patient_id] = tracker_info;
		      if(load_tracker_id && tracker_data){
				  universaltrackerApi
				      .get({'tracker_data':tracker_data,'tracker_id': load_tracker_id,patient_id:patient_id,start_date:start_date,to_date:to_date},
					   function(data){
						  tracker_info['tracker_data'][load_tracker_id] = data.tracker_data;
						  tracker_info['paramdata_createdby'][load_tracker_id] = data.paramdata_createdby;
			
						   tracker_info['gridOptions'][load_tracker_id] = prepareGrid(load_tracker_id,tracker_info['tracker_data'][load_tracker_id],patient_id,data.paramdata_createdby);
					      	tracker_info['current_tracker_id'] = load_tracker_id;
				   		deferred.resolve();
				   		});
		      	  }
		      	 return deferred.promise; 
		      },
		      deleteTracker:function(patient_id,tracker_id){
			  var tracker_info = all_tracker_info[patient_id];
			  patienttrackerApi
			      .delete({'tracker_id': tracker_id},
				      function(data){
					  delete tracker_info['gridOptions'][tracker_id];
					  delete tracker_info['tracker_data'][tracker_id];
					  for(var i=0; i< tracker_info['tracker_list'].length; i++){
					      if(tracker_info['tracker_list'][i]['id'] == tracker_id){
						  delete tracker_info['tracker_list'][i];
						  tracker_info['tracker_list'].splice(i,1);
						  if(tracker_info['tracker_list'].length){
						      tracker_info['selected'] = tracker_info['tracker_list'][0]['id'];
						      loadTrackerData(patient_id);
						  }
					      }
					      
					  }					     
				      });
		      },
		      createTracker: function(template_id, patient_id){
			  var current_tracker_id = all_tracker_info[patient_id]['current_tracker_id'];
			  var editStatus = getEditStatus(patient_id, current_tracker_id);
			  if(editStatus){
			      alert('You have unsaved changes. Please save them before proceeding.');
			      return;
			  }
			  patienttrackerApi
			      .save({'tracker_id':null, 'tracker_cols':null, 'tracker_data':null,'patient_id':patient_id, 'template_id':template_id},function(data){
				  var tracker_info = all_tracker_info[patient_id];
				  tracker_info['tracker_list'].unshift(data.info);
				  tracker_info['tracker_data'][data.info.id] = data.values;
				  tracker_info['paramdata_createdby'][data.info.id] = data.paramdata_createdby;
				  tracker_info['current_tracker_id'] = data.info.id
				  tracker_info['gridOptions'][data.info.id] = prepareGrid(data.info.id, data.values, patient_id,data.paramdata_createdby);
				  tracker_info['selected'] = data.info.id;
 				  //tracker_info['tracker_parameterlist'][data.info.id] =Array();
			      });
		      },
		      updateTracker: function( col, row, patient_id, tracker_id){
		      console.log(col, row, patient_id, tracker_id);
			  var colNum = col.index;
			  var rowNum = row.rowIndex;
			  var rowData = row.entity;
			  var tracker_info = all_tracker_info[patient_id];
			  var tracker_grid_options = tracker_info['gridOptions'][tracker_id];
			  var tracker_data = tracker_info['tracker_data'][tracker_id];
			  var tracker_headers = tracker_info['headers'][tracker_id];
			  if(rowData[colNum]){
			      var date = rowData[0];
			      var isDate = true;
			      if(isDate){
				  if(colNum == tracker_headers.length - 1){
				      tracker_headers = addColumn(tracker_headers, patient_id, tracker_id);
				      tracker_data[0][colNum+1] = "";
				  }
				 // if(rowNum == 1){ // Changed for entering data in 3rd position
					if(rowNum == 3){
				      var temp_data = Array();
				      for(var i in tracker_headers){
					  temp_data[tracker_headers[i]['field']] = '';
				      }
					  //tracker_data.splice(1, 0, temp_data);
				      tracker_data.splice(3, 0, temp_data);
					  // changed for adding row in 3rd position
				  }
			      }
			      else{
				  alert('Please check date column');
			      }
			      setEditStatus(patient_id, tracker_id, true);
			  }
		      },
		      createTemplate:function(tracker_id, patient_id){
			  var tracker_info = all_tracker_info[patient_id];
			  var col_data = JSON.stringify(tracker_info['tracker_data'][tracker_id][0]);
			  var template_name = (tracker_info['template_name']);
			  if(template_name == undefined){
			      alert('Please enter template name'); 
			  }
			  for(var i=0; i<tracker_info['template_list'].length; i++){
			      if(tracker_info['template_list'][i]['name'] == template_name){
				  alert('A template with the same name already exists. Please change the template name.');
				  return;
			      }
			  }
			  trackerTemplateApi
			      .save({'name': template_name,'data':col_data},function(data){
				  var template_object = {'id':data.template_id, 'name':template_name};
				  tracker_info['template_list'].push(template_object);
			      });
		      },
		      saveTracker: function(tracker_id, patient_id){
			  var tracker_info = all_tracker_info[patient_id];
			  var tracker_data =(tracker_info['tracker_data'][tracker_id]);
			  
			  for(i=0;i<tracker_data[0].length - 1;i++){
					if(tracker_data[0][i] == undefined || tracker_data[0][i] == ''){
						alert('All columns must have header name.');
						return false;
					}
			  }
			  tracker_data = JSON.stringify(tracker_data);
			  patienttrackerApi
			      .save({'tracker_id':tracker_id,'tracker_data':tracker_data, 'patient_id':patient_id},function(data){
			      });
		      },
		      discardTracker: function(tracker_id, patient_id){
			  var tracker_info = all_tracker_info[patient_id];
			  delete tracker_info['tracker_data'][tracker_id];
			  delete tracker_info['gridOptions'][tracker_id];
			  delete tracker_info['headers'][tracker_id];
			  setEditStatus(patient_id, tracker_id, false);
			  loadTrackerData(patient_id);
		      },
		      updateTrackerName: function(tracker_index, patient_id){
			  var tracker_info = all_tracker_info[patient_id];
			  var tracker_name = tracker_info['tracker_list'][tracker_index]['name'];
			  if(!tracker_name){
			      alert('Please Enter a name');
			      return;
			  }
			  var tracker_id =  tracker_info['tracker_list'][tracker_index]['id'];
			  trackerListApi.save({'tracker_name':tracker_name, 'tracker_id':tracker_id},function(data){
			      tracker_info['tracker_list'][tracker_index]['edit_name'] = false;
			  });
		      }
		  }
	      }]);
		  
		  function ngGridFlexibleHeightPlugin (opts) {
			var self = this;
			self.grid = null;
			self.scope = null;
			self.init = function (scope, grid, services) {
				self.domUtilityService = services.DomUtilityService;
				self.grid = grid;
				self.scope = scope;
				var recalcHeightForData = function () { setTimeout(innerRecalcForData, 1); };
				var innerRecalcForData = function () {
					var gridId = self.grid.gridId;
					var footerPanelSel = '.' + gridId + ' .ngFooterPanel';
					var extraHeight = self.grid.$topPanel.height() + $(footerPanelSel).height() + 50;
					var naturalHeight = self.grid.$canvas.height() + 1;
					if (opts != null) {
						if (opts.minHeight != null && (naturalHeight + extraHeight) < opts.minHeight) {
							naturalHeight = opts.minHeight - extraHeight - 2;
						}
						if (opts.maxHeight != null && (naturalHeight + extraHeight) > opts.maxHeight) {
							naturalHeight = opts.maxHeight;
						}
					}

					var newViewportHeight = naturalHeight + 3;
					if (!self.scope.baseViewportHeight || self.scope.baseViewportHeight !== newViewportHeight) {
						self.grid.$viewport.css('height', newViewportHeight + 'px');
						self.grid.$root.css('height', (newViewportHeight + extraHeight) + 'px');
						self.scope.baseViewportHeight = newViewportHeight;
						self.domUtilityService.RebuildGrid(self.scope, self.grid);
					}
				};
				self.scope.catHashKeys = function () {
					var hash = '',
						idx;
					for (idx in self.scope.renderedRows) {
						hash += self.scope.renderedRows[idx].$$hashKey;
					}
					return hash;
				};
				self.scope.$watch('catHashKeys()', innerRecalcForData);
				self.scope.$watch(self.grid.config.data, recalcHeightForData);
			};
		}
