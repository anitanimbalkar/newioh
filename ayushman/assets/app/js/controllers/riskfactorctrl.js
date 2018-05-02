angular.module('app.controllers')
.controller('riskfactorCtrl',
	['$scope', 'emrService','$routeParams',
		 function($scope, emrService, $routeParams) {
		     var patient_id = $routeParams.patient_id;
		     $scope.patient_id=patient_id;
			     emrService.getRisk(patient_id,'')
				 .then(function(data){
			    $scope.risks = data;
			 });
  		     $scope.new_risk = emrService.newRisk;
		     $scope.save_notes = emrService.saveNotes;
		     $scope.delete_risk = emrService.deleteRisk;
		     $scope.edit_risk = emrService.editRisk;
		     $scope.add_risk = emrService.addRisk;
			 $scope.refreshrisk = function(){
				emrService.getRisk(patient_id,'')
				.then(function(data){	
					$scope.risks = data;
					$scope.riskText = emrService.getRiskText(patient_id);
				});
			}
 }]);