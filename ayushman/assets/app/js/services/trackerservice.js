window.angular.module('app.services')
    .service('trackerService',
	     ['trackerApi', '$q', 'trackerTemplateApi', 'trackerListApi','universaltrackerApi',
	      function (trackerApi, $q, trackerTemplateApi, trackerListApi,universaltrackerApi) {
		  var all_tracker_info = {};
		  var headerid = {};
		  
		  var prepareGrid = function(gridId, gridData, app_id){
		      var headers = prepareHeaders(gridData, app_id, gridId);
		      headers = addColumn(headers, app_id, gridId);
		      var temp = new Array();
		      for (var x in gridData[0]){
			      temp[x] = "";
		      }
		      gridData.splice(1, 0, temp);
		      all_tracker_info[app_id]['headers'][gridId] = headers;
		      var gridOptions = { 
				  data: "tracker_info['tracker_data']["+gridId+"]",
				  enableCellSelection: true,
				  enableRowSelection: false,
				  headerRowHeight: 0,
				  rowHeight: 60,
				  plugins: [new ngGridFlexibleHeightPlugin()],
				  columnDefs: "tracker_info['headers']["+gridId+"]"
		      }
		      return gridOptions;
		  }
		  var setEditStatus = function(app_id, tracker_id, status){
		      var tracker_info = all_tracker_info[app_id];
		      for(var x in tracker_info['tracker_list']){
			  var el = (tracker_info.tracker_list[x]);
			     if(el['id'] == tracker_id){
				 el['is_edit'] = status;
			     }
		      }
		  }
		  var getEditStatus = function(app_id, tracker_id){
		      var tracker_info = all_tracker_info[app_id];
		      for(var x in tracker_info['tracker_list']){
			  var el = (tracker_info.tracker_list[x]);
			     if(el['id'] == tracker_id){
				 return el['is_edit']; 
			     }
		      }
		      return false;
		  }
		  var addColumn = function(headers, app_id, gridId){
		      var cellEditableTemplate = "<input style=\"height:60px;\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+app_id+","+gridId+")\"/><input autocompletedefault style=\"height:60px;\" ng-show='row.rowIndex == 0 && col.field != 0'  ng-class=\"'colt' + col.index\"  ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+app_id+","+gridId+")\"/>";
		      var col_count = headers.length;
		      var col_header = {};
		      col_header['field'] = col_count.toString();
		      col_header['displayName'] = 'Temp';
		      col_header['enableCellEdit'] = true;
		      col_header['cellTemplate'] = '<div style="height:60px"><div class="ngCellText" ><span><label style="float:left;width:174px;height:60px;">{{row.entity[col.field]}}</label><img src="/ayushman/assets/app/img/graph.png" title="Draw a line graph for this column" style="float:right;height:15px;width:15px" ng-if="row.rowIndex == 0 && col.field != 0" ng-click="showgraph(col)"/></span></div></div>';
		      col_header['editableCellTemplate'] = cellEditableTemplate;
		      col_header['width'] = '200px';
		      headers.push(col_header);
		      return headers;
		  };
		  var prepareHeaders = function(data, app_id, gridId){
		      var cols = data[0];
		      var headers = Array();
		      var cellEditableTemplate = "<input style=\"height:60px;\" ng-hide='row.rowIndex == 0 ' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+app_id+","+gridId+")\"/><input autocompletedefault style=\"height:60px;\" ng-show='row.rowIndex == 0 && col.field != 0'  ng-class=\"'colt' + col.index\"  ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+app_id+","+gridId+")\"/>";
		      for(var i in cols){
			  var col_header = {};
			  col_header['field'] = i;
			  col_header['displayName'] = cols[i];
			  if(i == 0){
			      col_header['width'] = "210px";
			      //col_header['cellTemplate'] = "<input ng-if='row.rowIndex!=0' my-date-time-picker readonly='readonly' ng-class=\"'colt' + col.index\" ng-input=\"COL_FIELD\" ng-model=\"COL_FIELD\" ng-blur=\"updateTracker(col, row,"+app_id+","+gridId+")\" /><div ng-if='row.rowIndex==0' style='height:100px'><div class='ngCellText'><span><label style='float:left;width:30px;'>{{row.entity[col.field]}}</label></span></div></div>";
			      col_header['cellTemplate'] = "<div style='height:60px'><div class='ngCellText'><input class='datePickerInput' readonly='readonly' ng-if='row.rowIndex == 0' ng-model='row.entity[col.field]' /><input class='datePickerInput' readonly='readonly' ng-if='row.rowIndex != 0' my-date-time-picker ng-model='row.entity[col.field]' /></div></div>";
			  }
			  else{
			      col_header['cellTemplate'] = '<div style="height:60px"><div class="ngCellText"><span><label  style="float:left;width:174px;height:60px;">{{row.entity[col.field]}}</label><img src="/ayushman/assets/app/img/graph.png" style="float:right;height:15px;width:15px" ng-if="row.rowIndex == 0 && col.field != 0" ng-click="showgraph(col)"/></span></div></div>';
			      col_header['width'] = "200px";
			      col_header['enableCellEdit'] = true;
			      col_header['editableCellTemplate'] = cellEditableTemplate;
			  }
			  headers.push(col_header);
		      }
		      return headers;
		  }
		  var loadTrackerData = function(app_id){
		      var tracker_info = all_tracker_info[app_id];
		      var load_tracker_id = tracker_info['selected'];
		      if(load_tracker_id && !tracker_info['tracker_data'][load_tracker_id]){
			  trackerApi
			      .get({'app_id': app_id, 'tracker_id':load_tracker_id},
				   function(data){
				       tracker_info['tracker_data'][load_tracker_id] = data.tracker_data;
				       tracker_info['gridOptions'][load_tracker_id] = prepareGrid(load_tracker_id, data.tracker_data, app_id);
				       tracker_info['current_tracker_id'] = load_tracker_id;
					   //tracker_info['tracker_parameterlist'][load_tracker_id] =data.tracker_parameterlist;
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
		      getTrackerInfo:function(app_id){
			  var deferred = $q.defer();
			  if(all_tracker_info[app_id] != undefined){
			      deferred.resolve(all_tracker_info[app_id]);
			  }
			  else{
			      trackerApi
				  .get({app_id: app_id},
				       function(data){
					   var tracker_info = data.tracker_info;
					   if(!tracker_info['tracker_data'])
					       tracker_info['tracker_data'] = {};
					   tracker_info['gridOptions'] = {};
					   tracker_info['headers'] = {};
					   //tracker_info['tracker_parameterlist'] =tracker_info['tracker_parameterlist'];
					   all_tracker_info[app_id] = tracker_info;
					   if(tracker_info.current_tracker_id){
					       currTrackerId = tracker_info.current_tracker_id;
					       currTrackerData = tracker_info['tracker_data'][currTrackerId];
					       all_tracker_info[app_id]['selected'] = currTrackerId;
					       tracker_info['gridOptions'][currTrackerId] = prepareGrid(currTrackerId, currTrackerData, app_id);
					   }
					   for(i=0;i< tracker_info.tracker_list.length; i++ ){
							if(tracker_info.tracker_list[i].id ==tracker_info.current_tracker_id){
								tracker_info.headerid = {};
								tracker_info.headerid = tracker_info.tracker_list[i].headerid;
							}
						}
					   deferred.resolve(all_tracker_info[app_id]);
				       });
			  }
			  return deferred.promise;
		      },
		      loadTracker:function(app_id){
				  var current_tracker_id = all_tracker_info[app_id]['current_tracker_id'];
				  var editStatus = getEditStatus(app_id, current_tracker_id);
				  if(editStatus){
					  alert('You have unsaved changes. Please save them before proceeding.');
					  all_tracker_info[app_id]['selected'] = current_tracker_id;
				  }
				  else{
					  loadTrackerData(app_id);
				  }
		      },
		      rearrangeTracker:function(tracker_info,tracker_data,app_id,start_date,to_date){
			  var deferred = $q.defer();
		      var load_tracker_id = tracker_info['selected'];
			   all_tracker_info[app_id] = tracker_info;
		      if(load_tracker_id && tracker_data){
				  universaltrackerApi
				      .get({'tracker_data':tracker_data,'tracker_id': load_tracker_id,app_id:app_id,start_date:start_date,to_date:to_date},
					   function(data){
						  tracker_info['tracker_data'][load_tracker_id] = data.tracker_data;
						   tracker_info['gridOptions'][load_tracker_id] = prepareGrid(load_tracker_id,tracker_info['tracker_data'][load_tracker_id],app_id);
					      	tracker_info['current_tracker_id'] = load_tracker_id;
				   		deferred.resolve();
				   		});
		      	  }
		      	 return deferred.promise; 
		      },
		      deleteTracker:function(app_id,tracker_id){
			  var tracker_info = all_tracker_info[app_id];
			  trackerApi
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
						      loadTrackerData(app_id);
						  }
					      }
					      
					  }					     
				      });
		      },
		      createTracker: function(template_id, app_id){
			  var current_tracker_id = all_tracker_info[app_id]['current_tracker_id'];
			  var editStatus = getEditStatus(app_id, current_tracker_id);
			  if(editStatus){
			      alert('You have unsaved changes. Please save them before proceeding.');
			      return;
			  }
			  trackerApi
			      .save({'tracker_id':null, 'tracker_cols':null, 'tracker_data':null,'app_id':app_id, 'template_id':template_id},function(data){
				  var tracker_info = all_tracker_info[app_id];
				  tracker_info['tracker_list'].unshift(data.info);
				  tracker_info['tracker_data'][data.info.id] = data.values;
				  tracker_info['current_tracker_id'] = data.info.id
				  tracker_info['gridOptions'][data.info.id] = prepareGrid(data.info.id, data.values, app_id);
				  tracker_info['selected'] = data.info.id;
 				  //tracker_info['tracker_parameterlist'][data.info.id] =Array();
			      });
		      },
		      updateTracker: function( col, row, app_id, tracker_id){
		      
			  var colNum = col.index;
			  var rowNum = row.rowIndex;
			  var rowData = row.entity;
			  var tracker_info = all_tracker_info[app_id];
			  var tracker_grid_options = tracker_info['gridOptions'][tracker_id];
			  var tracker_data = tracker_info['tracker_data'][tracker_id];
			  var tracker_headers = tracker_info['headers'][tracker_id];
			  if(rowData[colNum]){
			      var date = rowData[0];
			      var isDate = true;
			      if(isDate){
				  if(colNum == tracker_headers.length - 1){
				      tracker_headers = addColumn(tracker_headers, app_id, tracker_id);
				      tracker_data[0][colNum+1] = "";
				  }
				  if(rowNum == 1){
				      var temp_data = Array();
				      for(var i in tracker_headers){
					  temp_data[tracker_headers[i]['field']] = '';
				      }
				      tracker_data.splice(1, 0, temp_data);
				  }
			      }
			      else{
				  alert('Please check date column');
			      }
			      setEditStatus(app_id, tracker_id, true);
			  }
		      },
		      createTemplate:function(tracker_id, app_id){
			  var tracker_info = all_tracker_info[app_id];
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
		      saveTracker: function(tracker_id, app_id){
			  var tracker_info = all_tracker_info[app_id];
			  var tracker_data =(tracker_info['tracker_data'][tracker_id]);
			  
			  for(i=0;i<tracker_data[0].length - 1;i++){
					if(tracker_data[0][i] == undefined || tracker_data[0][i] == ''){
						alert('All columns must have header name.');
						return false;
					}
			  }
			  tracker_data = JSON.stringify(tracker_data);
			  trackerApi
			      .save({'tracker_id':tracker_id,'tracker_data':tracker_data, 'app_id':app_id},function(data){
			      });
		      },
		      discardTracker: function(tracker_id, app_id){
			  var tracker_info = all_tracker_info[app_id];
			  delete tracker_info['tracker_data'][tracker_id];
			  delete tracker_info['gridOptions'][tracker_id];
			  delete tracker_info['headers'][tracker_id];
			  setEditStatus(app_id, tracker_id, false);
			  loadTrackerData(app_id);
		      },
		      updateTrackerName: function(tracker_index, app_id){
			  var tracker_info = all_tracker_info[app_id];
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
