angular.module('app.controllers')
    .controller('doctorprofileCtrl',
		['$scope','$http','$routeParams',
				 function($scope,$http,$routeParams) {
				 	var docuserid=$routeParams.docid;
				 	console.log(docuserid);
					 var doclang={};
					 var i=1;
					 $scope.firstname;
					$scope.gender='Select';
					$scope.middlename;
					$scope.lastname;
					$scope.tempmodel={};
					$scope.edumodel={};
					$scope.domainmodel={};
					$scope.langmodel={};
					$scope.summarymodel={};
					$scope.headerfootermodel={};
					$scope.gender;
					$scope.dob;
					//$scope.uid;
					$scope.practicesince;
	
					var get_data1 = function(){
							var httpRequest = $http({
								method: 'GET',
								url: '/ayushman/cdoctorprofile/getdocprofile?userid='+docuserid,
							}).success(function(data, status) { //here array is nothing but parameters which we pass from cdoctorprofile.php at line number 193
								$scope.profiledata = data;
								$scope.firstname=$scope.profiledata[9].Firstname_c;
								$scope.middlename=$scope.profiledata[9].middlename_c;
								$scope.lastname=$scope.profiledata[9].lastname_c;
								$scope.headerfootermodel=$scope.profiledata[2].headerfooterSysGenflag_c;
								$scope.tempmodel=$scope.profiledata[5];
								$scope.edumodel=$scope.profiledata[7];
								$scope.domainmodel=$scope.profiledata[6];
								$scope.langmodel=$scope.profiledata[8];
								$scope.summarymodel=$scope.profiledata[0].doctorprofile_c;
								$scope.gender=$scope.profiledata[9].gender_c;
								$scope.dob=$scope.profiledata[9].DOB_c;
								$scope.uid=$scope.profiledata[9].uid;
								$scope.practicesince=$scope.profiledata[0].practicesince_c;
							});
					};
			
			$scope.getdata1 = get_data1;
			$scope.getdata1();
}]);