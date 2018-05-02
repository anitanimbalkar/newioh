angular.module('app.controllers')
    .controller('staffdirectoryCtrl',
		['$scope','$http','appointmentService',
		 function($scope,$http,appointmentService) {
			 $scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
			 
			 $scope.show=false;
			var get_staff = function(){
				$scope.loading(true);
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cstaffdirectory/mystaff'
				}).success(function(data, status) {
					if(data == "No Staff in your network"){
						$scope.staff = {};
						$scope.loading(false);
						$scope.show = true;
					}else{
						$scope.show = false;
						$scope.staff = data;
					}
					
				});
			};
			$scope.getStaff = get_staff;
			$scope.getStaff();
			$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
				$scope.loading(false);
				$('.filter-status').val('');
				$('table.demo').trigger('footable_clear_filter');
				$('.row-count').html('');
			});
			
			$scope.removestaffid = '';
			$scope.removestaff = function(staffid,staffname)
			{
				$scope.removestaffid = staffid;
				document.getElementById("removestaffid").value = staffid;
				showMessage('250','50','Remove Staff','Do you really want to remove '+staffname+' from staff list ?','confirmation','removestaffpopup');
			}
			$scope.removeconfirm = function(){
				$scope.loading(true);
				$.ajax({
					  url: "/ayushman/cstaffdirectory/removestaff?staffid="+$scope.removestaffid,
						success: function( data ) {
							//window.location = "/ayushman/cstaffdirectory/view";
							$scope.getStaff();
						},
						error : function(){alert("error while getting complete data for edit"); $scope.loading(false);}
				 });
			}
			 
		 }]);
		
	