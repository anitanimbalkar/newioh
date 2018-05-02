angular.module('app.controllers')
    .controller('inviteCtrl',
		['$scope','$http',
				 function($scope,$http) {
				$scope.email;
				$scope.phone;
				$scope.message="Dear Friend, I have been using IndiaOnlineHealth and I am very pleased with its features. I strongly recommend you to register and join my network.";
				var send_message= function(){
				if($("#textfield").val() != '' && $("#textfield2").val() != '' ){
					$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/csendrecommendation/sendinvite?textfield="+$scope.email+"&textfield2="+$scope.phone+"&message="+$scope.message,
					success: function(data) {
								alert("Message Sent.");
								
						}
				});

		}else{
			alert('Please, Fill all mandatory fields.');
			return false;
		}
											}
			$scope.sendmessage= send_message;
			}]);