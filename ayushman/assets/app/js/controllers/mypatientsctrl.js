angular.module('app.controllers')
    .controller('mypatientsCtrl',
		['$scope','$http',
		 function($scope,$http) {
			 $scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
			$scope.show=false;
			var get_statements = function(){
				$scope.loading(true);
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cpatientdirectory/mypatientlist'
				}).success(function(data, status) {
					if(data.length == 0){
						$scope.statements = {};
						$scope.loading(false);
						$scope.show = true;
					}else{
						$scope.show = false;
						$scope.statements = data;
					}
				});
			};
			$scope.getStatements = get_statements;
			$scope.getStatements();
			$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
				 $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
            $('.row-count').html('');
				$scope.loading(false);
				
			});
			$scope.connectnow = function connectnowclick(patientUserId,lastappset,quick)
	{		
		document.getElementById("patientuserid").value = patientUserId;
		document.getElementById('newincidentbutton').checked = true;
		if(lastappset == 0)
		{
			document.getElementById('oldIncidenceTr').style.display = 'none';
		}
		else{
			document.getElementById('oldIncidenceTr').style.display = '';
			$.ajax({
				url: "/ayushman/cpatientdirectory/previousincidence?patientuserid="+patientUserId,
				success: function( data ) {
						//var  incidence =  eval('('+data+')');
						var  incidence = eval('(' + (data)+ ')');
						if(incidence == ''){
							}
						else
						{
							for(var iter = document.getElementById("incidentcombo").length -1; iter >= 0; --iter)
							{
								removeItemInList(iter);
							}
							additemtolocation("Previous Incident","");
							for(i=0;i< incidence.length;i++)
							{
								additemtolocation(incidence[i][1],incidence[i][0]);
							}
						}
					},
					error : function(){}
			  });
		  }	
		document.getElementById('incidenttxt').value ="";
		if(quick == 1){
			//connectonclick(1);
			connetonclick(1);
		}else{
			$('#connectnow').dialog('open');
		}
	}
		
//connet consultation with create appointment
	$scope.connetonclick = function(pid,quick)
	{
		if(quick == 1)
			window.location="/ayushman/cadhocappointmentmanger/connectnewinclinc?patientuserid="+ pid +"&newIncidence="+'true'+"&incidence="+''+"&quick="+quick;
	}		
}]);
		
	