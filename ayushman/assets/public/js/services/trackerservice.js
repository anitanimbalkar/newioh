/**
 * Created by chetan on 24/11/13.
 */

window.angular.module('ngff.services.trackerService', [])
    .service('trackerService',
	     [
		 function () {
		     var all_tracker_info = {};
		     var local_tracker_count = 0;
		     return{
			 getTrackerInfo:function(app_id){
			     if(all_tracker_info[app_id] != undefined){
				 return all_tracker_info[app_id];
			     }
			     else{
				 return null; 
			     }
			 },
			 setTrackerInfo:function(app_id, tracker_info){
			     all_tracker_info[app_id] = tracker_info;
			     if(tracker_info.current_tracker_id){
				 all_tracker_info[app_id]['selected'] = tracker_info.current_tracker_id;
				 all_tracker_info[app_id][tracker_info.current_tracker_id] = {}
				 all_tracker_info[app_id][tracker_info.current_tracker_id]['data'] = tracker_info.current_tracker_data;
				 all_tracker_info[app_id][tracker_info.current_tracker_id]['loaded'] = true;
			     }
			 },
			 setTrackerData:function(app_id, tracker_id, data){
			     var tracker_data = data.tracker_data;
			     all_tracker_info[app_id][tracker_id] = {};
			     all_tracker_info[app_id][tracker_id]["data"]=tracker_data;
			     if(data.owner_info != undefined){
				 all_tracker_info[app_id][tracker_id]["owner_name"] = data.owner_info;
			     }
			 },
			 deleteTracker:function(app_id,tracker_id){
			     delete all_tracker_info[app_id][tracker_id];
			     for(var i=0; i< all_tracker_info[app_id]['tracker_list'].length; i++){
				 if(all_tracker_info[app_id]['tracker_list'][i]['id'] == tracker_id){
				     delete  all_tracker_info[app_id]['tracker_list'][i];
				     all_tracker_info[app_id]['tracker_list'].splice(i,1);
				     all_tracker_info[app_id]['selected'] = all_tracker_info[app_id]['tracker_list'][0]['id'];
				 }
				 
			     }
			 },
			 addTracker:function(app_id, info, data){
			     all_tracker_info[app_id]['tracker_list'].unshift(info);
			     all_tracker_info[app_id][info.id] = {}
			     all_tracker_info[app_id][info.id]['data'] = data;
			     all_tracker_info[app_id]['current_tracker_id'] = info.id;
			     all_tracker_info[app_id]['current_tracker_data'] = data;
			 },
			 addTemplate:function(template_id,template_name, app_id){
			     var template_object = {'id':template_id, 'name':template_name};
			     all_tracker_info[app_id]['template_list'].push(template_object);
			 }
		     };
		 }])
