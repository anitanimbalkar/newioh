angular.module('app.controllers')
    .controller('mydoctorsCtrl',
		['$scope','$http',
		 function($scope,$http) {
			 $scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
			$scope.searchoptions={};
		 	 $scope.searchname='';
			 $scope.selectspec='';
			 $scope.selectcity='';
			 $scope.selectlang='';
			 $scope.selectlocal='';
			 
			$scope.getsearchdata=function(){
				var httpRequest = $http({
					method: 'GET',
					url: '/ayushman/cpatientdirectory/getsearchdata'
				}).success(function(data, status) {
					$scope.searchoptions=data;
					$scope.specialization=$scope.searchoptions.specialization;
					$scope.city=$scope.searchoptions.city;
					$scope.language=$scope.searchoptions.language;

					 $scope.selectspec=$scope.specialization[0];
					 $scope.selectcity=$scope.city[0];
					 $scope.selectlang=$scope.language[0];
					console.log($scope.searchoptions);
				});
			};
			$scope.getsearchdata();
			$scope.addremove=function(docid,option){
				if(option=='add'){
					for(var i=0;i<$scope.statements.length;i++){
						if(docid==$scope.statements[i].favdoctorsid){
							alert('Doctor exist in network');
							return;
						}
					}
				}
				var postdata={'docid':docid,'option':option};
				var httpRequest = $http({
					method: 'POST',
					data:postdata,
					url: '/ayushman/cpatientdirectory/addremovedoctor'
				}).success(function(data, status) {
					$scope.getStatements();
				});
			};
			$scope.show=false;
			var get_statements = function(){
				$scope.loading(true);
				var httpRequest = $http({
					method: 'POST',
					url: '/ayushman/cpatientdirectory/mydoctorlist'
				}).success(function(data, status) {
					if(data.length == 0){
						$scope.statements = {};
						$scope.loading(false);
						$scope.show = true;
					}else{
						$scope.show = false;
						$scope.statements = data;
						console.log('$scope.statements');
						console.log($scope.statements);
					}
				});
			};
			$scope.viewprofile={};
			$scope.showprofile=function(record){
				$scope.viewprofile=record;
				$('#nonregisteredUser').dialog('open');
				console.log('$scope.viewprofile');
				console.log($scope.viewprofile);
			};
			$scope.getStatements = get_statements;
			$scope.getStatements();
			var search_doctors = function(){
				var postdata={'searchname':$scope.searchname,'selectspec':((typeof($scope.selectspec.name)=='undefined') ?'':$scope.selectspec.name),'selectcity':((typeof($scope.selectcity.name)=='undefined') ?'':$scope.selectcity.name),'selectlang':((typeof($scope.selectlang.name)=='undefined') ?'':$scope.selectlang.name)};
				var httpRequest = $http({
					method: 'POST',
					data:postdata,
					url: '/ayushman/cpatientdirectory/searchdoctors'
				}).success(function(data, status) {
					if(data.length == 0){
						$scope.finddoctors = {};
						$scope.searchshow = true;
					}else{
						$scope.searchshow = false;
						$scope.finddoctors = data;
					}
				});
			};
			$scope.searchDoctors = search_doctors;
			$scope.searchDoctors();
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
						
}]);
		
	