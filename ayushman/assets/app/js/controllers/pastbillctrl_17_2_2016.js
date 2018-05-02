angular.module('app.controllers')
.controller('pastbillCtrl',
	['$scope','createDialog','appointmentService','$routeParams','emrService',
	 function($scope,createDialogService,appointmentService,$routeParams,emrService) {

	var patient_id = $routeParams.patient_id;
	patientid = patient_id;
	appointmentService.getMyprofile()
		.then(function(data){
			$scope.myprofile = data;
			$scope.userid=$scope.myprofile['userinfo'].id;
	});
	$scope.launchPrintableBill = function(app_id,diagnosis,option,isbillgenerate) {
		appointment_id=app_id;
		appointment_diagnosis=diagnosis;
		bill_option=option;
		billgenerate=isbillgenerate;
		createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
		  id: 'bill',
		  backdrop: true,
		  controller: 'pastbilldataCtrl',
				  css:{padding: '18px',width:'900px'},
				  cancel:{label: 'Cancel', fn: function() {
						$scope.$broadcast('save_bill');
						//window.location="/ayushman/cdashboard/view";
					}
				},
				  success: {label: 'Success', fn: function() {
						$scope.$broadcast('save_bill');
						//$scope.launchPrintablePrescription();
				  }}
				},{appointment_id:app_id,appointment_diagnosis:diagnosis,bill_option:option,billgenerate:isbillgenerate});
	};
	
	
	$scope.printoldbill = function(app_id,diagnosis,option,isbillgenerate) {
	appointment_id=app_id;
	appointment_diagnosis=diagnosis;
	bill_option=option;
	billgenerate=isbillgenerate;
	
	//appointment_transactionid=transactionid;
	createDialogService('/ayushman/assets/app/partials/bill/'+$scope.myprofile.billhtml, {
		  id: 'bill',
		  backdrop: true,
		  controller: 'pastbilldataCtrl',
				  css:{padding: '18px',width:'650px'},
				  cancel:{label: 'Cancel', fn: function() {
						//$scope.$broadcast('save_bill');
						//window.location="/ayushman/cdashboard/view";
					}
				},
				  success: {label: 'Success', fn: function() {
						//$scope.$broadcast('save_bill');
						//$scope.launchPrintablePrescription();
				  }}
				},{appointment_id:app_id,appointment_diagnosis:diagnosis,bill_option:option,billgenerate:isbillgenerate});
	};		

}])
.controller('pastbilldataCtrl',
	['$scope','appointmentService','examinationService',
		 function($scope, appointmentService, examinationService) {
	appointmentid=appointment_id;
	$scope.isbillgenerate=billgenerate;
	$scope.examination_data = examinationService.getExaminationData(appointmentid);
	$scope.examination_data.text_diagnosis=appointment_diagnosis;
	if(bill_option == 'generate'){
		$scope.examination_data.display_Rx=false;
		$scope.examination_datadisplay_savebutton=true;
	}
	if(bill_option == 'print'){
		$scope.examination_data.display_Rx=false;
		$scope.examination_data.display_savebutton=false;
	}
	appointmentService.getDocprofile(appointmentid)
	.then(function(data){
		$scope.myprofile = data;
//		console.log('$scope.myprofile');
//		console.log($scope.myprofile);
		appointmentService.getMyclinics($scope.myprofile.userinfo.id)
		.then(function(data){
			$scope.myclinics = data;
		});
	});
	$scope.billdetail={};
	$scope.billdate = '';
	appointmentService.getbillData(appointmentid)
	.then(function(data){
			$scope.billdata = data;
			if(!$scope.examination_data.display_savebutton){
				$scope.billdate=$scope.billdata.generateddate;
			}
			if($scope.billdata.charge_injection){
				$scope.billdetail.injection=$scope.billdata.charge_injection;
			}
			else{
				$scope.billdetail.injection=0;
			}	
			if($scope.billdata.charge_dressing){
				$scope.billdetail.dressing=$scope.billdata.charge_dressing;
			}
			else{
				$scope.billdetail.dressing=0;
			}	
			if($scope.billdata.charge_labtest){
				$scope.billdetail.labtest=$scope.billdata.charge_labtest;
			}
			else{
				$scope.billdetail.labtest=0;
			}	
			if($scope.billdata.charge_reconsultation){
				$scope.billdetail.reconsultation=$scope.billdata.charge_reconsultation;
			}
			else{
				$scope.billdetail.reconsultation=0;
			}	
			if($scope.billdata.charge_ecg){
				$scope.billdetail.ecg=$scope.billdata.charge_ecg;
			}
			else{
				$scope.billdetail.ecg=0;
			}	
			if($scope.billdata.charge_visit){
				$scope.billdetail.visit=$scope.billdata.charge_visit;
			}
			else{
				$scope.billdetail.visit=0;
			}	
			if($scope.billdata.charge_misc){
				$scope.billdetail.misc=$scope.billdata.charge_misc;
			}
			else{
				$scope.billdetail.misc=0;
			}	
			if($scope.billdata.treatmentfrom){
				$scope.billdetail.treatmentfrom=$scope.billdata.treatmentfrom;
			}
			else{
				$scope.billdetail.treatmentfrom='';
			}	
			if($scope.billdata.treatmentto){
				$scope.billdetail.treatmentto=$scope.billdata.treatmentto;
			}
			else{
				$scope.billdetail.treatmentto='';
			}
			if($scope.billdata.patrelative){
				$scope.billdetail.patrelative=$scope.billdata.patrelative;
			}	
			//Fields added for dental Bills 
			
			if($scope.billdata.charge_silverfilling ){
				$scope.billdetail.silverfilling =$scope.billdata.charge_silverfilling ;
			}
			else{
				$scope.billdetail.silverfilling =0;
			}	
			if($scope.billdata.charge_compositefilling ){
				$scope.billdetail.compositefilling =$scope.billdata.charge_compositefilling ;
			}
			else{
				$scope.billdetail.compositefilling =0;
			}	
			if($scope.billdata.charge_rootcanal ){
				$scope.billdetail.rootcanal =$scope.billdata.charge_rootcanal ;
			}
			else{
				$scope.billdetail.rootcanal =0;
			}	
			if($scope.billdata.charge_periodental ){
				$scope.billdetail.periodental =$scope.billdata.charge_periodental ;
			}
			else{
				$scope.billdetail.periodental =0;
			}	
			if($scope.billdata.charge_oralsurgery ){
				$scope.billdetail.oralsurgery =$scope.billdata.charge_oralsurgery ;
			}
			else{
				$scope.billdetail.oralsurgery =0;
			}	
			if($scope.billdata.charge_orthodentic ){
				$scope.billdetail.orthodentic =$scope.billdata.charge_orthodentic ;
			}
			else{
				$scope.billdetail.orthodentic =0;
			}	
			if($scope.billdata.charge_metalcapping ){
				$scope.billdetail.metalcapping =$scope.billdata.charge_metalcapping ;
			}
			else{
				$scope.billdetail.metalcapping =0;
			}	
			if($scope.billdata.charge_ceramiccrown ){
				$scope.billdetail.ceramiccrown =$scope.billdata.charge_ceramiccrown ;
			}
			else{
				$scope.billdetail.ceramiccrown =0;
			}	
			if($scope.billdata.charge_ceramicbridge ){
				$scope.billdetail.ceramicbridge =$scope.billdata.charge_ceramicbridge ;
			}
			else{
				$scope.billdetail.ceramicbridge =0;
			}	
			if($scope.billdata.charge_metalbridge ){
				$scope.billdetail.metalbridge =$scope.billdata.charge_metalbridge ;
			}
			else{
				$scope.billdetail.metalbridge =0;
			}	
					
			// -----------------------------
			
	});
	appointmentService.getAppointmentData(appointmentid)
	.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					if(!$scope.billdetail.patrelative){
						$scope.billdetail.patrelative=$scope.appointment_info.Patientname;
					}
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=Math.round(Number($scope.appointment_info.amount));
					if($scope.examination_data.display_savebutton){
						$scope.billdate = $scope.appointment_info.DateAndTime;
					}
	});
	$scope.addtototalbill = function(){
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					
					$scope.appointment_info.totalsum=Math.round(Number($scope.appointment_info.consultationfee)+Number($scope.billdetail.injection)+Number($scope.billdetail.dressing)+Number($scope.billdetail.labtest)+Number($scope.billdetail.reconsultation)+Number($scope.billdetail.visit)+Number($scope.billdetail.ecg)+Number($scope.billdetail.misc)+Number($scope.billdetail.silverfilling )+Number($scope.billdetail.compositefilling )+Number($scope.billdetail.rootcanal )+Number($scope.billdetail.periodental )+Number($scope.billdetail.oralsurgery )+Number($scope.billdetail.orthodentic )+Number($scope.billdetail.metalcapping )+Number($scope.billdetail.ceramiccrown )+Number($scope.billdetail.ceramicbridge )+Number($scope.billdetail.metalbridge ));
					$scope.appointment_info.amountinwords = inWords($scope.appointment_info.totalsum);
					$scope.appointment_info.amount=$scope.appointment_info.totalsum;
			 });

	}
			$scope.$on('save_bill', function(event, args){
				$('input[name=appid]').val($scope.appointment_info.appointment_id);
				$.ajax({
					type: "post",
					url: "/ayushman/cbill/save2",
					data: $("#billform").serialize(),
					async: false,
					success:
							function( data ){
								 appointmentService.getAppointmentData(appointmentid)
									.then(function(data){
										//$scope.appointment_info = data;
										//$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
										//$scope.$apply();
								 });
					},
					error:
							function(){
								showMessage('250','50','Send Data to patient','Error occured while saving bill. Please contact your system administrator.','error','id');
					}
				});
			 });
			 $scope.savebill = function(){
			 	if(bill_option == 'generate'){
					$scope.isbillgenerate.billGenerated='yes';		
					$scope.$broadcast('save_bill');
				}	
		     }

}]);
	function inWords (num) {
    	var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
		var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    	if ((num = num.toString()).length > 9) return 'overflow';
	    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    	if (!n) return; var str = '';
	    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
 	   str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
 	   str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
 	   str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
 	   return str;
	}
