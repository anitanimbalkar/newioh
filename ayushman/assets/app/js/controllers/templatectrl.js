angular.module('app.controllers') 
    .controller('templateCtrl',
		['$scope','$route', 'xmppService', 'appointmentService','patienttrackerService',
		 function($scope,$route, xmppService, appointmentService,patienttrackerService){
			  $(".ui-dialog-titlebar").hide();				
		     /* xmpp initialization*/
		     xmppService.initializeXmpp(servername, user_id, xmpp_pass);
		    $scope.presence = xmppService.getPresence();
		     $scope.$on("update_presence", function(){
				$scope.presence = xmppService.getPresence();
				$scope.$apply();
		     });
			  $scope.$on("response", function(){
			var response = xmppService.getResponse();
			responseHandler(response['val'], response['id']);
			 });
			 $scope.sendxmppmessage = function(jid,message){
			xmppService.sendMessage(jid,message);
			 }
		     /* end of xmpp */
			$scope.userid={};
			 $scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
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
			 
			$scope.show_nav_link = appointmentService.show_nav_link;
			var userid;	
			//$scope.userrole;
			appointmentService.getMyprofile()
				.then(function(data){
					$scope.myprofile = data;
					$scope.userid=$scope.myprofile['userinfo'].id;
					userid=$scope.userid;
					$scope.userrole=$scope.myprofile['user_role'];
			/*if($scope.userrole=='patient'){
					patienttrackerService.getTrackerInfo(user_id)
						.then(function(data){
							$scope.tracker_info = data;
							prepare_tile_grid();
					});
			}
				Called twice So commented */		
			});
			$scope.openDialog = function(url, width, height,obj){
				  $.fancybox({
                    'width': width,
                    'height': height,
                    'autoScale': false,
                    'transitionIn': 'fade',
                    'transitionOut': 'fade',
                    'type': 'iframe',
                    'href': url,
                    'showCloseButton': true,
					 'iframe': {
						preload : false
					},
                    'afterClose' : function(){
						if(obj != undefined){
							if(obj.fancyboxclosed != undefined){
								obj.fancyboxclosed(obj);
							}
						}
					}
                });
		     }
			 $scope.reloadRoute = function() {
			   $route.reload();
			  
			}
			
		 }]);
	
