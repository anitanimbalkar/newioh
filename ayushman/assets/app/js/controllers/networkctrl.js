angular.module('app.controllers').controller('networkCtrl',['$scope','$http',function($scope,$http) {
	$scope.show=0;
	$scope.chemists = {};
	$scope.diagnostics = {};
	$scope.doctors = {};
	$scope.otpval = '';
	$scope.orderpermissionforchemist = '';
	$scope.orderpermissionfordc = '';
	$scope.chemistsinnetwork = {};
	$scope.pathologistinnetwork = {};
	$scope.doctorinnetwork = {};
	$scope.otp = 0;
	$("#tickpermission").show();
	$("#btnpermission").hide();
	$('input[id="btnpermission"]').prop('checked', true);

	var ask_otp = function(){
		$scope.otp = 1;
		$('#sendotpbutton').show();
		$('#otp').val('');
		
		var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;
		if(atLeastOneIsChecked == 1){
			$('input[id="btnpermission"]').prop('checked', true);
		}else{
			$('input[id="btnpermission"]').prop('checked', false);
		}
	};
	var ask_otp1 = function(){
		$scope.otp = 1;
		$('#sendotpbutton').show();
		$('#otp').val('');
		var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;
		if(atLeastOneIsChecked == 1){
			$('input[id="btnpermission"]').prop('checked', false);
		}else{
			$('input[id="btnpermission"]').prop('checked', true);
		}
	};
	$scope.askOtp = ask_otp;
	$scope.askOtp1 = ask_otp1;
	
	var send_otp = function(){
		$scope.otp = 1;
		var httpRequest = $http({
			method: 'POST',
			url: '/ayushman/csettings/sendotpforpermission?pid='+$('#pid').val()
		}).success(function(data, status) {
			if(data == 'done'){
				$('#sendotpbutton').hide();
			}else{
				
			}	
		});
		
	};
	$scope.sendOtp = send_otp;
	
	var check_otp = function(){
		var httpRequest = $http({
			method: 'POST',
			url: '/ayushman/csettings/checkotpforpermission?pid='+$('#pid').val()+'&otp='+$('#otp').val()
		}).success(function(data, status) {
			console.log(data);
			if(data == 'done'){
				var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;
				if(atLeastOneIsChecked == 0){
					$('input[id="btnpermission"]').prop('checked', false);
					$("#tickpermission").hide();
					$("#btnpermission").show();
				}else{
					$("#tickpermission").show();
					$("#btnpermission").hide();
					$('input[id="btnpermission"]').prop('checked', true);
				}
				$scope.allowOrders($('#btnpermission'));
				$scope.allowDcorders($('#btnpermission'));
				$scope.otp = 0;
			}else{
				alert('OTP does not match');				
			}	
		});
	};
	$scope.checkOtp = check_otp;
	
	{ // code for fetching chemists and adding to network 
		
		var get_chemistorderpermission = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/csettings/automaticorderforchemist?pid='+$('#pid').val()
			}).success(function(data, status) {
				$scope.orderpermissionforchemist = data;

				if($scope.orderpermissionforchemist == 0){
					$('input[id="btnpermission"]').prop('checked', false);
					$("#tickpermission").hide();
					$("#btnpermission").show();
				}else{
					$("#tickpermission").show();
					$("#btnpermission").hide();
					$('input[id="btnpermission"]').prop('checked', true);
					console.log($("#btnpermission"));
				}
				//$scope.allowOrders($('#btnpermission'));
				//$scope.allowDcorders($('#btnpermission'));
				$scope.otp = 0;
			});
		};
		$scope.getChemistorderpermission = get_chemistorderpermission;
		$scope.getChemistorderpermission();
		
		var get_chemistsinnetwork = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemist/getchemist?pid='+$('#pid').val()
			}).success(function(data, status) {
				if(data.length == 0){
					
				}else{
					$scope.chemistsinnetwork = data;
				}	
			});
		};
		$scope.getChemistsinnetwork = get_chemistsinnetwork;
		$scope.getChemistsinnetwork();
		
		var get_chemists = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemist/getallchemist'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.chemists = {};
					$scope.show = 1;
				}else{
					$scope.chemists = data;
					$scope.show = 0;
				}
				
			});
		};
		$scope.getChemists = get_chemists;
		$scope.getChemists();
		
		var allow_orders = function(checkbox){
			var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;
			
			$.ajax({
				url: "/ayushman/csettings/setpermission?permission="+atLeastOneIsChecked+"&pid="+$('#pid').val(),
				success: function( data ) {
				},
				error : function(){alert("error while setting permission");}					
			});	
		}
		$scope.allowOrders = allow_orders;
		
		var add_chemist = function(userid,chemistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemistdirectory/addtofavorite?userid='+$('#pid').val()+'&chemistid='+chemistid+'&chemistuserid='+userid+'&role=patient'
			}).success(function(data, status) {
				$('#loading').dialog('close');
				$scope.getChemistsinnetwork();
			});
		};
		$scope.addChemist = add_chemist;
		
		
		var remove_chemist = function(userid,chemistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cchemistdirectory/removefromfavorite?userid='+$('#pid').val()+'&chemistid='+chemistid
			}).success(function(data, status) {
				$scope.getChemistsinnetwork();
				$('#loading').dialog('close');
			});
		};
		$scope.removeChemist = remove_chemist;
	}
	
	{ // code for fetching diagnostic centers and adding to network 
		var get_dcorderpermission = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/csettings/automaticorderfordc?pid='+$('#pid').val()
			}).success(function(data, status) {
				$scope.orderpermissionfordc = data;	
				if($scope.orderpermissionfordc == 0){
					$('input[id="btnpermission"]').prop('checked', false);
					$("#tickpermission").hide();
					$("#btnpermission").show();
				}else{
					
					$("#tickpermission").show();
					$("#btnpermission").hide();
					$('input[id="btnpermission"]').prop('checked', true);
					console.log($("#btnpermission"));
				}
				//$scope.allowOrders($('#btnpermission'));
				//$scope.allowDcorders($('#btnpermission'));
				$scope.otp = 0;
			});
		};
		$scope.getDcorderpermission = get_dcorderpermission;
		$scope.getDcorderpermission();
		
		var get_pathologistinnetwork = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologist/getmypathologists?pid='+$('#pid').val()
			}).success(function(data, status) {
				if(data.length == 0){
					
				}else{
					$scope.pathologistinnetwork = data;
				}	
			});
		};
		$scope.getPathologistinnetwork = get_pathologistinnetwork;
		$scope.getPathologistinnetwork();
		
		var get_diagnostics = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologist/getallpathologists'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.diagnostics = {};
					$scope.show = 1;
				}else{
					$scope.diagnostics = data;
					$scope.show = 0;
				}
				
			});
		};
		$scope.getDiagnostics = get_diagnostics;
		$scope.getDiagnostics();
		
		var allow_dcorders = function(checkbox){
			var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0;
			
			$.ajax({
				url: "/ayushman/csettings/setDiagnosticLabpermission?permission="+atLeastOneIsChecked+"&pid="+$('#pid').val(),
				success: function( data ) {
				},
				error : function(){alert("error while setting permission");}					
			});	
		}
		$scope.allowDcorders = allow_dcorders;
		
		var add_diagnostic = function(userid,pathologistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: ' /ayushman/cpathologistdirectory/addtofavorite?userid='+$('#pid').val()+'&pid='+pathologistid+'&pathologistuserid='+userid+'&role=patient'
			}).success(function(data, status) {
				$('#loading').dialog('close');
				$scope.getPathologistinnetwork();
			});
		};
		$scope.addDiagnostic = add_diagnostic;
		
		var remove_diagnostic = function(userid,pathologistid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cpathologistdirectory/removefromfavorite?userid='+$('#pid').val()+'&pid='+pathologistid
			}).success(function(data, status) {
				$scope.getPathologistinnetwork();
				$('#loading').dialog('close');
			});
		};
		$scope.removeDiagnostic = remove_diagnostic;
	}
	
	{ // code for fetching Doctors
		
		var get_doctorinnetwork = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cdoctordirectory/getmydoctors?pid='+$('#pid').val()
			}).success(function(data, status) {
				if(data.length == 0){
					
				}else{
					$scope.doctorinnetwork = data;
				}	
			});
		};
		$scope.getDoctorsinnetwork = get_doctorinnetwork;
		$scope.getDoctorsinnetwork();
		
		var get_doctors = function(){
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cdoctordirectory/getalldoctors'
			}).success(function(data, status) {
				if(data.length == 0){
					$scope.doctors = {};
				}else{
					$scope.doctors = data;
				}
			});
		};
		$scope.getDoctors = get_doctors;
		$scope.getDoctors();
		
		var add_doctor = function(userid,doctorid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: ' /ayushman/cdoctordirectory/adddoctortofavorite?userid='+$('#pid').val()+'&doctorid='+doctorid+'&doctoruserid='+userid+'&role=patient'
			}).success(function(data, status) {
				$scope.getDoctorsinnetwork();
				$('#loading').dialog('close');
			});
		};
		$scope.addDoctor = add_doctor;
		
		var remove_doctor = function(doctorid){
			$('#loading').dialog('open');
			var httpRequest = $http({
				method: 'POST',
				url: '/ayushman/cdoctordirectory/removefromfavorite?userid='+$('#pid').val()+'&doctorid='+doctorid+'&role=patient'
			}).success(function(data, status) {
				$scope.getDoctorsinnetwork();
				$('#loading').dialog('close');
			});
		};
		$scope.removeDoctor = remove_doctor;
	}
	
	$scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
		$('.filter-status').val('');
		$('table.demo').trigger('footable_clear_filter');
		$('.row-count').html('');
	});
}]);

