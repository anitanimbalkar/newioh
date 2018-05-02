angular.module('app.controllers').controller('immunizationCtrl',
	['$scope','$routeParams','$http','appointmentService',
		 function($scope, $routeParams,$http,appointmentService){
  $scope.oneAtATime = true;
  $scope.groups=[];
  $scope.actualdates={};
  $scope.patient_id = $scope.appointment_info.refappfromid_c;
  $scope.getactualdates= function(){
				var patient_id = $scope.appointment_info.refappfromid_c;
				var httpRequest = $http({
					method: 'GET',
					url: '/ayushman/cpatienthistory/immunizationdates?patient_id='+patient_id
				}).success(function(data, status) {
					$scope.actualdates =(data);
					
					console.log($scope.actualdates);
					
				});
			};
			$scope.getactualdates();
  $scope.datecharts= function(){
	$scope.dates={};	
	
  $scope.dob=new Date($scope.appointment_info.DOB);
  var now=$scope.dob;
  $scope.dates[0]=$scope.dob.toDateString();
  $scope.weeks6=now;
  $scope.weeks6.setDate($scope.weeks6.getDate()+42);
  $scope.dates[1]=$scope.weeks6.toDateString();
  $scope.weeks10= $scope.weeks6;
  $scope.weeks10.setDate($scope.weeks10.getDate()+28);
  $scope.dates[2]=$scope.weeks10.toDateString();
  $scope.weeks14=$scope.weeks10;
  $scope.weeks14.setDate($scope.weeks14.getDate()+28);
  $scope.dates[3]=$scope.weeks14.toDateString();
  $scope.months9=$scope.weeks14;
  $scope.months9.setDate($scope.months9.getDate()+172);
  $scope.dates[4]=$scope.months9.toDateString();
  $scope.months18=$scope.months9;
  $scope.months18.setMonth($scope.months18.getMonth()+9);
  $scope.dates[5]=$scope.months18.toDateString();
  $scope.years2=$scope.months18;
  $scope.years2.setMonth($scope.years2.getMonth()+6);
  $scope.dates[6]=$scope.years2.toDateString();
  $scope.years5=$scope.years2;
  $scope.years5.setFullYear($scope.years5.getFullYear()+3);
  $scope.dates[7]=$scope.years5.toDateString();
  $scope.years10=$scope.years5;
  $scope.years10.setFullYear($scope.years10.getFullYear()+5);
  $scope.dates[8]=$scope.years10.toDateString();
  $scope.years13=$scope.years10;
  $scope.years13.setFullYear($scope.years13.getFullYear()+3);
  $scope.dates[9]=$scope.years13.toDateString();
  };
  $scope.datecharts();
  $scope.immunizationgroups = function(){
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cimmunization/getimmunizationlist'
				}).success(function(data, status) {
					$scope.groups =(data);
					//console.log(typeof($scope.groups))
					
				});
			};
	$scope.immunizationgroups();
	 
		$scope.setreminder=function(reminderarray,reminderdate){
			
			reminderarray=JSON.stringify(reminderarray);
			console.log(reminderarray);
			var httpRequest = $http({
					method: 'POST',
					data: { patient_id: $scope.patient_id,reminder: reminderdate,reminderjson: reminderarray},
					url: '/ayushman/cimmunization/setreminder'
				}).success(function(data, status) {
					alert("Reminder Set!");
					
					
				});
		};
		$scope.immunizationdone=function(immunizationdate, immunizationjson){
			
			immunizationarray=JSON.stringify(immunizationjson);
			var httpRequest = $http({
					method: 'POST',
					data: { patient_id: $scope.patient_id,immunization: immunizationdate,immunizationarray:immunizationarray},
					url: '/ayushman/cpatienthistory/saveimmunization'
				}).success(function(data, status) {
					$scope.getactualdates();
					$scope.$broadcast('updateactualdates');
					
				});
		};
  $scope.status = {
    isFirstOpen: true,
    isFirstDisabled: false
  };
}]);