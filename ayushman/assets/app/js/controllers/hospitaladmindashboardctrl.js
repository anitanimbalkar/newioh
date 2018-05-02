angular.module('app.controllers')
    .controller('hospitaladmindashboardCtrl',
	['$scope','$http',
		function($scope,$http) {
			//$scope.ward=[];
			$scope.wardBedDetails;
		$scope.showDoctor = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalDoctors')
			.success(function(response) {$scope.hospitalDoctors = response;
			//console.log($scope.hospitalDoctors);				 
			});
				
		}
			
		$scope.showPathologist = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalPathologist')
			.success(function(response) {$scope.hospitalPathologist = response;
			console.log($scope.hospitalPathologist);				 
			});
		}
		
		$scope.showRadiologist = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalRadiologist')
			.success(function(response) {$scope.hospitalRadiologist = response;
			//console.log($scope.hospitalRadiologist);				 
			});
		}
		
		$scope.showWard = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalWard')
			.success(function(response) {$scope.hospitalWard = response;
			//console.log($scope.hospitalWard);				 
			});
		}
		
		$scope.showChemist = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalChemist')
			.success(function(response) {$scope.hospitalChemist = response;
			//console.log($scope.hospitalChemist);				 
			});
		}
		
		$scope.showReceptionist = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalStaff')
			.success(function(response) {$scope.hospitalreceptionist = response;
			//console.log($scope.hospitalreceptionist);				 
			});
		}
		
		$scope.showCashier = function () {
			$http.get('/ayushman/cregistrarbyadmin/hospitalcashier')
			.success(function(response) {$scope.hospitalcashier = response;
			//console.log($scope.hospitalcashier);				 
			});
		}
		
		$scope.suspend = function (id) {
			var userid=id;
			//console.log(userid);
			showNotification('300','20','update data','Successfully Suspended...','notification','timernotification',2000);
			$.ajax({
							type: 'POST',
							url: "/ayushman/chospitaladmin/suspendServiceProvider?userid="+userid,
					});
				$scope.showDoctor();	
				$scope.showPathologist();
				$scope.showRadiologist();
				$scope.showCashier();
				$scope.showReceptionist();
				$scope.showWard();
				$scope.showChemist();	

		}
		
		
		
		$scope.activate = function (id) {
			var userid=id;
			//console.log(userid);
			showNotification('300','20','update data','Successfully Activated...','notification','timernotification',2000);
			$.ajax({
							type: 'POST',
							url: "/ayushman/chospitaladmin/activateServiceProvider?userid="+userid,
					});
				$scope.showDoctor();	
				$scope.showPathologist();
				$scope.showRadiologist();
				$scope.showCashier();
				$scope.showReceptionist();
				$scope.showWard();
				$scope.showChemist();	

		}
		
		$scope.resetPassword = function (id){ 
		//console.log(id);
		$.ajax({
        type: "GET",
        url: "/ayushman/cayushusers/reset?userid="+id,
        success: function(data) {
           //alert("Password reset and SMS and Email is sent to user");
		   showNotification('300','20',' ','Password reset and SMS and Email is sent to user','notification','timernotification',2000);
          
        }
           
        }); 
	
		
		}
		
		$scope.wardName = function (){ 
		$http.get('/ayushman/chospitaladmin/wardNames')
			.success(function(response) {$scope.ward = response;
			//console.log($scope.ward);				 
			});		
		}
		
		
		$scope.addWardName = function (){ 
			$scope.id=$('#wardtype').val();
			$scope.room=$('#room').val();
			$scope.bed=$('#bed').val();
			if ($.trim($scope.id) == "") {
		showNotification('300','20','','Select Ward...','notification','timernotification',2000);
		return false;
		}
		if ($.trim($scope.room) == "") {
			showNotification('300','20','','Room must be filled out','notification','timernotification',2000);
			return false;
		}
		if ($.trim($scope.bed) == "") {
			showNotification('300','20','','Bed must be filled out','notification','timernotification',2000);
			return false;
		}
			$.ajax({
			type: "POST",
			url: "/ayushman/chospitaladmin/addWard?id="+$scope.id+"&room="+$scope.room+"&bed="+$scope.bed,
			datatype: 'json',
					success:function( data ){
					var returnArray= JSON.parse(data);
					if(returnArray['found'] == 'yes'){
						showNotification('300','20','Save data','Ward already present...!','notification','timernotification',2000);
					}
					else{
						$scope.wardBedDetails();
						showNotification('300','20',' ','Ward Added Successfully','notification','timernotification',2000);
															
					}
					
				}
				
				});
		}
		
		
		$scope.updateWardName = function (){ 
		
			$scope.wardname=$('#wardtype').val();
			$scope.id=$('#wardid').val();
			$scope.room=$('#room').val();
			$scope.bed=$('#bed').val();
			if ($.trim($scope.id) == "") {
		showNotification('300','20','','Select Ward...','notification','timernotification',2000);
		return false;
		}
		if ($.trim($scope.room) == "") {
			showNotification('300','20','','Room must be filled out','notification','timernotification',2000);
			return false;
		}
		if ($.trim($scope.bed) == "") {
			showNotification('300','20','','Bed must be filled out','notification','timernotification',2000);
			return false;
		}
			$.ajax({
			type: "POST",
			url: "/ayushman/chospitaladmin/updateWard?wardId="+$scope.id+"&wardName="+$scope.wardname+"&room="+$scope.room+"&bed="+$scope.bed,
			datatype: 'json',
					success:function( data ){
					var returnArray= JSON.parse(data);
					if(returnArray['found'] == 'yes'){
						showNotification('300','20','Save data','Ward already present...!','notification','timernotification',2000);
					}
					else{
						$scope.wardBedDetails();
						showNotification('300','20',' ','Ward Updated Successfully','notification','timernotification',2000);
															
					}
					
				}
				
				});
				$('#addButton').show();
			$('#updateButton').hide();
		}
		
		
		$scope.wardBedDetails= function(){
			
			$http.get('/ayushman/chospitaladmin/wardBed')
			.success(function(response) {$scope.wardBed = response;
			console.log($scope.wardBed);				 
			});
		}
		
		$scope.editWard = function (id) {
			var wardid=id;
			//console.log(wardid);
			$.ajax({
				type: 'POST',
				url: "/ayushman/chospitaladmin/editWard?wardid="+wardid,
				datatype: 'json',
				success: function(data) {
				   var ward=JSON.parse(data);
				   jQuery("#wardtype option:selected").text(ward.wardname);
				   jQuery("#wardtype option:selected").val(ward.warduserid);
				   $('#room').val(ward.roomno);
				   $('#bed').val(ward.bednumber);
				   $('#wardid').val(ward.wardrecordid);
				  // console.log(ward.wardname);
				   $('#addButton').hide();
				   $('#updateButton').show();
				   
				}
			});
		}
		
		$scope.suspendWard = function (id) {
			var wardid=id;
			console.log(wardid);
			showNotification('300','20','update data','Successfully Suspended...','notification','timernotification',2000);
			$.ajax({
							type: 'POST',
							url: "/ayushman/chospitaladmin/suspendWard?wardid="+wardid,
					});
					$scope.wardBedDetails();

		}
		
		$scope.activateWard = function (id) {
			var wardid=id;
			console.log(wardid);
			showNotification('300','20','update data','Successfully Activated...','notification','timernotification',2000);
			$.ajax({
							type: 'POST',
							url: "/ayushman/chospitaladmin/activeWard?wardid="+wardid,
					});
					$scope.wardBedDetails();

		}
		
		
		$scope.linker = function (){ 
		//console.log(id);
		$.ajax({
        type: "GET",
        url: "/ayushman/chospitaladmin/setFavourite",
        success: function(data) {
           //alert("Password reset and SMS and Email is sent to user");
		   showNotification('300','20',' ','Attached...','notification','timernotification',2000);
          
        }
           
        }); 
	
		
		}
		
		$scope.showDoctor();	
		$scope.showPathologist();
		$scope.showRadiologist();
		$scope.showCashier();
		$scope.showReceptionist();
		$scope.showWard();
		$scope.showChemist();			
		$scope.wardName();	
		$scope.wardBedDetails();
	} 
]);//end