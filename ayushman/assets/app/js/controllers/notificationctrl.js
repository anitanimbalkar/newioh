angular.module('app.controllers').controller('notificationCtrl',
['$scope','$http','createDialog','xmppService','$rootScope',
function($scope,$http,createDialogService,xmppService,$rootScope) {
	
	/* xmpp initialization*/
	//xmppService.initializeXmpp(servername, user_id, xmpp_pass);
	$scope.$on("Query", function(){
		$scope.getMessages();
	});
	 /* end of xmpp */
	

	$scope.messages ={};
	var get_messages = function(){
		var httpRequest = $http({
			method: 'GET',
			url: '/ayushman/newcemrdashboard/getmessages'
		}).success(function(data, status) {
			$scope.messages = data;
		});
	}
	$scope.getMessages = get_messages;
	$scope.getMessages();
	
	 
	var show_visit = function(id, appid){
		$scope.app_id = appid; 
		$rootScope.app_id = $scope.app_id;
		createDialogService('/ayushman/assets/app/partials/visitqueries.html', {
			id: 'visitqueries',
			backdrop: true,
			controller:'visitqueryCtrl',
			css:{padding: '18px',height:'900px',width:'1024px'},
			cancel:{label: 'Cancel', fn: function() {
					
				}
			},
			success: {label: 'Success', fn: function() {

			}}
		});
		$scope.readMessage(id, appid);
	}
	$scope.showVisit = show_visit;
		
	var read_message = function(appid){
		var messageData = {
		  'appid' : appid
		};
		var httpRequest = $http({
			method: 'POST',
			data: messageData,
			url: '/ayushman/newcemrdashboard/readMessage'
		}).success(function(data, status) {
			$scope.getMessages();
		});
	}
	$scope.readMessage = read_message;
	
	$scope.toggle = function(id){
		$("#"+id).stop().slideToggle(500);
	}
}])
.directive('notifications',function() {
	return {
		restrict:'E',
		templateUrl: '/ayushman/assets/app/partials/notifications.html',
		controller:'notificationCtrl'
	};
})