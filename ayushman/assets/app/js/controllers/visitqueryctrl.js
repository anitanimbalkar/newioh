angular.module('app.controllers').controller('visitqueryCtrl',['$scope','$rootScope', function($scope,$rootScope) {
	$scope.app_id = $rootScope.app_id;
}]).controller('appqueryCtrl',['$scope','$http','emrService', function($scope,$http,emrService) {
	$scope.appdata = {};
	var get_appdata = function(appid){
		var messageData = {
		  'appid' : appid
		};
		var httpRequest = $http({
			method: 'POST',
			data: messageData,
			url: '/ayushman/newcemrdashboard/getAppData'
		}).success(function(data, status) {
			$scope.appdata = data;
			console.log('$scope.appdata');
			console.log($scope.appdata);
		});
	}
	$scope.getAppdata = get_appdata;
	$scope.getAppdata($scope.app_id);
	$scope.toggle = function(id,index,message){
		$("#"+id).stop().slideToggle(500);
		if(message!=''){
			$scope.appdata['data'][0]['replyto']=message.name;
			$scope.appdata['data'][0]['replytoid']=message.senderid;
		}
	}
	var send_message = function(appid,sendtoid){
		$scope.toggle(appid+'message','','');
		var messageData = {
		  'appid' : appid, 
		  'sendtoid' : sendtoid, 
		  'message' : $('#'+appid+"messagetext").val()
		};
		var httpRequest = $http({
			method: 'POST',
			data: messageData,
			url: '/ayushman/newcemrdashboard/sendmessage'
		}).success(function(data, status) {
			if(data == 'done'){
				$scope.getAppdata($scope.app_id);
			}else{
				alert('Failed to send message.');
			}	
		});
	}
	$scope.keys = function(obj){
		return obj? Object.keys(obj) : [];
	}
	$scope.sendMessage = send_message;
}]).directive('appquery',function() {
	return {
		restrict:'E',
		templateUrl: '/ayushman/assets/app/partials/appquery.html',
		controller:'appqueryCtrl'
	};
});