angular.module('app.controllers')
.controller('pastbilldaCtrl',
	['$scope','appointmentService','examinationService','$routeParams',
		 function($scope, appointmentService, examinationService,$routeParams) {
	var appointmentid = $routeParams.appid;
	$scope.examination_data = {};
	console.log(appointmentid);
	$scope.isbillgenerate=billgenerate;
	examinationService.getExaminationData(appointmentid)
	.then(function(data){
		$scope.examination_data = data;
		console.log($scope.examination_data);
	});
	console.log($scope.examination_data);
	$scope.examination_data.text_diagnosis=appointment_diagnosis;
	if(bill_option == 'generate'){
		$scope.examination_data.display_Rx=false;
		$scope.examination_data.display_savebutton=true;
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
	// Inititialising variables for extra field values;
	/*$scope.billdetail.injection=0;
	$scope.billdetail.dressing=0;
	$scope.billdetail.labtest=0;
	$scope.billdetail.reconsultation=0;
	$scope.billdetail.ecg=0;
	$scope.billdetail.visit=0;
	$scope.billdetail.misc=0;
	$scope.billdetail.silverfilling =0;
	$scope.billdetail.compositefilling =0;
	$scope.billdetail.rootcanal =0;
	$scope.billdetail.periodental =0;
	$scope.billdetail.oralsurgery =0;
	$scope.billdetail.orthodentic =0;
	$scope.billdetail.metalcapping =0;
	$scope.billdetail.ceramiccrown =0;
	$scope.billdetail.ceramicbridge =0;
	$scope.billdetail.metalbridge =0;
	*/
	$scope.billdate = ($.datepicker.formatDate("d M yy",new Date())).toString();
		// If bill data not found then get template
	appointmentService.getbillTemplate()
		.then(function(data){
			$scope.billdata= data.bill;
			console.log("loading bill template");
			//console.log($scope.billdata);
			$scope.billdetail.filepresent =false;
			$scope.billdetail.fileid = "*";
			if($scope.billdata.label1){$scope.billdetail.label1=$scope.billdata.label1;}										
			if($scope.billdata.label2){$scope.billdetail.label2=$scope.billdata.label2;}
			if($scope.billdata.label3){$scope.billdetail.label3=$scope.billdata.label3;}
			if($scope.billdata.label4){$scope.billdetail.label4=$scope.billdata.label4;}
			if($scope.billdata.label5){$scope.billdetail.label5=$scope.billdata.label5;}
			if($scope.billdata.label6){$scope.billdetail.label6=$scope.billdata.label6;}
			if($scope.billdata.label7){$scope.billdetail.label7=$scope.billdata.label7;}
			if($scope.billdata.label8){$scope.billdetail.label8=$scope.billdata.label8;}
			if($scope.billdata.label9){$scope.billdetail.label9=$scope.billdata.label9;}
			if($scope.billdata.label10){$scope.billdetail.label10=$scope.billdata.label10;}
			if($scope.billdata.label11){$scope.billdetail.label11=$scope.billdata.label11;}
			if($scope.billdata.label12){$scope.billdetail.label12=$scope.billdata.label12;}
			if($scope.billdata.label13){$scope.billdetail.label13=$scope.billdata.label13;}
			if($scope.billdata.label14){$scope.billdetail.label14=$scope.billdata.label14;}
			if($scope.billdata.label15){$scope.billdetail.label15=$scope.billdata.label15;}
			if($scope.billdata.label16){$scope.billdetail.label16=$scope.billdata.label16;}
			if($scope.billdata.label17){$scope.billdetail.label17=$scope.billdata.label17;}
			if($scope.billdata.label18){$scope.billdetail.label18=$scope.billdata.label18;}
			if($scope.billdata.label19){$scope.billdetail.label19=$scope.billdata.label19;}
			if($scope.billdata.label20){$scope.billdetail.label20=$scope.billdata.label20;}
			if($scope.billdata.label21){$scope.billdetail.label21=$scope.billdata.label21;}
			if($scope.billdata.label22){$scope.billdetail.label22=$scope.billdata.label22;}
			if($scope.billdata.label23){$scope.billdetail.label23=$scope.billdata.label23;}
			if($scope.billdata.label24){$scope.billdetail.label24=$scope.billdata.label24;}
			if($scope.billdata.label25){$scope.billdetail.label25=$scope.billdata.label25;}
			
			$scope.billdetail.quantity1=1;
			$scope.billdetail.quantity2=0;
			$scope.billdetail.quantity3=0;
			$scope.billdetail.quantity4=0;
			$scope.billdetail.quantity5=0;
			$scope.billdetail.quantity6=0;
			$scope.billdetail.quantity7=0;
			$scope.billdetail.quantity8=0;
			$scope.billdetail.quantity9=0;
			$scope.billdetail.quantity10=0;
			$scope.billdetail.quantity11=0;
			$scope.billdetail.quantity12=0;
			$scope.billdetail.quantity13=0;
			$scope.billdetail.quantity14=0;
			$scope.billdetail.quantity15=0;
			$scope.billdetail.quantity16=0;
			$scope.billdetail.quantity17=0;
			$scope.billdetail.quantity18=0;
			$scope.billdetail.quantity19=0;
			$scope.billdetail.quantity20=0;
			$scope.billdetail.quantity21=0;
			$scope.billdetail.quantity22=0;
			$scope.billdetail.quantity23=0;
			$scope.billdetail.quantity24=0;
			$scope.billdetail.quantity25=0;
			
			$scope.billdetail.charge1=0;
			$scope.billdetail.charge2=0;
			$scope.billdetail.charge3=0;
			$scope.billdetail.charge4=0;
			$scope.billdetail.charge5=0;
			$scope.billdetail.charge6=0;
			$scope.billdetail.charge7=0;
			$scope.billdetail.charge8=0;
			$scope.billdetail.charge9=0;
			$scope.billdetail.charge10=0;
			$scope.billdetail.charge11=0;
			$scope.billdetail.charge12=0;
			$scope.billdetail.charge13=0;
			$scope.billdetail.charge14=0;
			$scope.billdetail.charge15=0;
			$scope.billdetail.charge16=0;
			$scope.billdetail.charge17=0;
			$scope.billdetail.charge18=0;
			$scope.billdetail.charge19=0;
			$scope.billdetail.charge20=0;
			$scope.billdetail.charge21=0;
			$scope.billdetail.charge22=0;
			$scope.billdetail.charge23=0;
			$scope.billdetail.charge24=0;
			$scope.billdetail.charge25=0;		
			
			if($scope.billdata.charge1)
			{$scope.billdetail.charge1=$scope.billdata.charge1;$scope.billdetail.rate1=$scope.billdata.charge1;}
			if($scope.billdata.charge4)	{$scope.billdetail.rate4=$scope.billdata.charge4;}
			if($scope.billdata.charge5)	{$scope.billdetail.rate5=$scope.billdata.charge5;}
			if($scope.billdata.charge6)	{$scope.billdetail.rate6=$scope.billdata.charge6;}
			if($scope.billdata.charge7){$scope.billdetail.rate7=$scope.billdata.charge7;}
			if($scope.billdata.charge8){$scope.billdetail.rate8=$scope.billdata.charge8;}
			if($scope.billdata.charge9){$scope.billdetail.rate9=$scope.billdata.charge9;}
			if($scope.billdata.charge10){$scope.billdetail.rate10=$scope.billdata.charge10;}
			if($scope.billdata.charge11){$scope.billdetail.rate11=$scope.billdata.charge11;}
			if($scope.billdata.charge12){$scope.billdetail.rate12=$scope.billdata.charge12;}
			if($scope.billdata.charge13){$scope.billdetail.rate13=$scope.billdata.charge13;}
			if($scope.billdata.charge14){$scope.billdetail.rate14=$scope.billdata.charge14;}
			if($scope.billdata.charge15){$scope.billdetail.rate15=$scope.billdata.charge15;}
			if($scope.billdata.charge16){$scope.billdetail.rate16=$scope.billdata.charge16;}
			if($scope.billdata.charge17){$scope.billdetail.rate17=$scope.billdata.charge17;}
			if($scope.billdata.charge18){$scope.billdetail.rate18=$scope.billdata.charge18;}
			if($scope.billdata.charge19){$scope.billdetail.rate19=$scope.billdata.charge19;}
			if($scope.billdata.charge20){$scope.billdetail.rate20=$scope.billdata.charge20;}
			if($scope.billdata.charge21){$scope.billdetail.rate21=$scope.billdata.charge21;}
			if($scope.billdata.charge22){$scope.billdetail.rate22=$scope.billdata.charge22;}
			if($scope.billdata.charge23){$scope.billdetail.rate23=$scope.billdata.charge23;}
			if($scope.billdata.charge24){$scope.billdetail.rate24=$scope.billdata.charge24;}
			if($scope.billdata.charge25){$scope.billdetail.rate25=$scope.billdata.charge25;}

		appointmentService.getbillData(appointmentid)
		.then(function(data){
			$scope.billdata = data;
			console.log("Got old bill");
			//console.log($scope.billdata);
			// If bill is not generated then set date to current date
			// and make provision to generate date
			//if(!$scope.examination_data.display_savebutton){
			//console.log("Got the bill data");
			//console.log($scope.billdata); 
			/*if($scope.examination_data.display_savebutton){
				$scope.billdate=$scope.billdata.generateddate;
			}*/
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
			
			if($scope.billdata.quantity1_c && $scope.billdata.quantity1_c !=1 )
			{$scope.billdetail.quantity1 = $scope.billdata.quantity1_c;}
			if($scope.billdata.quantity4_c && $scope.billdata.quantity4_c !=0)
			{$scope.billdetail.quantity4 = $scope.billdata.quantity4_c;}
			if($scope.billdata.quantity5_c && $scope.billdata.quantity5_c !=0)
			{$scope.billdetail.quantity5 = $scope.billdata.quantity5_c;}
			if($scope.billdata.quantity6_c && $scope.billdata.quantity6_c !=0)
			{$scope.billdetail.quantity6 = $scope.billdata.quantity6_c;}
			if($scope.billdata.quantity7_c && $scope.billdata.quantity7_c !=0)
			{$scope.billdetail.quantity7 = $scope.billdata.quantity7_c;}
			if($scope.billdata.quantity8_c && $scope.billdata.quantity8_c !=0)
			{$scope.billdetail.quantity8 = $scope.billdata.quantity8_c;}
			if($scope.billdata.quantity9_c && $scope.billdata.quantity9_c !=0)
			{$scope.billdetail.quantity9 = $scope.billdata.quantity9_c;}
			if($scope.billdata.quantity10_c && $scope.billdata.quantity10_c !=0)
			{$scope.billdetail.quantity10 = $scope.billdata.quantity10_c;}
			if($scope.billdata.quantity11_c && $scope.billdata.quantity11_c !=0)
			{$scope.billdetail.quantity11 = $scope.billdata.quantity11_c;}
			if($scope.billdata.quantity12_c && $scope.billdata.quantity12_c !=0)
			{$scope.billdetail.quantity12 = $scope.billdata.quantity12_c;}
			if($scope.billdata.quantity13_c && $scope.billdata.quantity13_c !=0)
			{$scope.billdetail.quantity13 = $scope.billdata.quantity13_c;}
			if($scope.billdata.quantity14_c && $scope.billdata.quantity14_c !=0)
			{$scope.billdetail.quantity14 = $scope.billdata.quantity14_c;}
			if($scope.billdata.quantity15_c && $scope.billdata.quantity15_c !=0)
			{$scope.billdetail.quantity15 = $scope.billdata.quantity15_c;}
			if($scope.billdata.quantity16_c && $scope.billdata.quantity16_c !=0)
			{$scope.billdetail.quantity16 = $scope.billdata.quantity16_c;}
			if($scope.billdata.quantity17_c && $scope.billdata.quantity17_c !=0)
			{$scope.billdetail.quantity17 = $scope.billdata.quantity17_c;}
			if($scope.billdata.quantity18_c && $scope.billdata.quantity18_c !=0)
			{$scope.billdetail.quantity18 = $scope.billdata.quantity18_c;}
			if($scope.billdata.quantity19_c && $scope.billdata.quantity19_c !=0)
			{$scope.billdetail.quantity19 = $scope.billdata.quantity19_c;}
			if($scope.billdata.quantity20_c && $scope.billdata.quantity20_c !=0)
			{$scope.billdetail.quantity20 = $scope.billdata.quantity20_c;}
			if($scope.billdata.quantity21_c && $scope.billdata.quantity21_c !=0)
			{$scope.billdetail.quantity21 = $scope.billdata.quantity21_c;}
			if($scope.billdata.quantity22_c && $scope.billdata.quantity22_c !=0)
			{$scope.billdetail.quantity22 = $scope.billdata.quantity22_c;}
			if($scope.billdata.quantity23_c && $scope.billdata.quantity23_c !=0)
			{$scope.billdetail.quantity23 = $scope.billdata.quantity23_c;}
			if($scope.billdata.quantity24_c && $scope.billdata.quantity24_c !=0)
			{$scope.billdetail.quantity24 = $scope.billdata.quantity24_c;}
			if($scope.billdata.quantity25_c && $scope.billdata.quantity25_c !=0)
			{$scope.billdetail.quantity25 = $scope.billdata.quantity25_c;}
			
			
			if($scope.billdata.charge1_c && Number($scope.billdata.quantity1_c)>0){$scope.billdetail.charge1 =$scope.billdata.charge1_c ;
					$scope.billdetail.rate1 =parseFloat(Number($scope.billdata.charge1_c)/Number($scope.billdata.quantity1_c)).toFixed(2) ;}
			if($scope.billdata.charge4_c && Number($scope.billdata.quantity4_c)>0){$scope.billdetail.charge4 =$scope.billdata.charge4_c ;
					$scope.billdetail.rate4 =parseFloat(Number($scope.billdata.charge4_c)/Number($scope.billdata.quantity4_c)).toFixed(2) ;}
			if($scope.billdata.charge5_c && Number($scope.billdata.quantity5_c)>0){$scope.billdetail.charge5 =$scope.billdata.charge5_c ;
					$scope.billdetail.rate5 =parseFloat(Number($scope.billdata.charge5_c)/Number($scope.billdata.quantity5_c)).toFixed(2) ;}
			if($scope.billdata.charge6_c && Number($scope.billdata.quantity6_c)>0){$scope.billdetail.charge6 =$scope.billdata.charge6_c ;
					$scope.billdetail.rate6 =parseFloat(Number($scope.billdata.charge6_c)/Number($scope.billdata.quantity6_c)).toFixed(2) ;}
			if($scope.billdata.charge7_c && Number($scope.billdata.quantity7_c)>0){$scope.billdetail.charge7 =$scope.billdata.charge7_c ;
					$scope.billdetail.rate7 =parseFloat(Number($scope.billdata.charge7_c)/Number($scope.billdata.quantity7_c)).toFixed(2) ;}
			if($scope.billdata.charge8_c && Number($scope.billdata.quantity8_c)>0){$scope.billdetail.charge8 =$scope.billdata.charge8_c ;
					$scope.billdetail.rate8 =parseFloat(Number($scope.billdata.charge8_c)/Number($scope.billdata.quantity8_c)).toFixed(2) ;}
			if($scope.billdata.charge9_c && Number($scope.billdata.quantity9_c)>0){$scope.billdetail.charge9 =$scope.billdata.charge9_c ;
					$scope.billdetail.rate9 =parseFloat(Number($scope.billdata.charge9_c)/ Number($scope.billdata.quantity9_c)).toFixed(2) ;}
			if($scope.billdata.charge10_c && Number($scope.billdata.quantity10_c)>0){$scope.billdetail.charge10 =$scope.billdata.charge10_c ;
					$scope.billdetail.rate10 =parseFloat(Number($scope.billdata.charge10_c)/Number($scope.billdata.quantity10_c)).toFixed(2) ;}
			if($scope.billdata.charge11_c && Number($scope.billdata.quantity11_c)>0){$scope.billdetail.charge11 =$scope.billdata.charge11_c ;
					$scope.billdetail.rate11 =parseFloat(Number($scope.billdata.charge11_c)/Number($scope.billdata.quantity11_c)).toFixed(2) ;}
			if($scope.billdata.charge12_c && Number($scope.billdata.quantity12_c)>0){$scope.billdetail.charge12 =$scope.billdata.charge12_c ;
					$scope.billdetail.rate12 =parseFloat(Number($scope.billdata.charge12_c)/Number($scope.billdata.quantity12_c)).toFixed(2) ;}
			if($scope.billdata.charge13_c && Number($scope.billdata.quantity13_c)>0){$scope.billdetail.charge13 =$scope.billdata.charge13_c ;
					$scope.billdetail.rate13 =parseFloat(Number($scope.billdata.charge13_c)/Number($scope.billdata.quantity13_c)).toFixed(2) ;}			
			if($scope.billdata.charge14_c && Number($scope.billdata.quantity14_c)>0){$scope.billdetail.charge14 =$scope.billdata.charge14_c ;
					$scope.billdetail.rate14 =parseFloat(Number($scope.billdata.charge14_c)/Number($scope.billdata.quantity14_c)).toFixed(2) ;}
			if($scope.billdata.charge15_c && Number($scope.billdata.quantity15_c)>0){$scope.billdetail.charge15 =$scope.billdata.charge15_c ;
					$scope.billdetail.rate15 =parseFloat(Number($scope.billdata.charge15_c)/Number($scope.billdata.quantity15_c)).toFixed(2) ;}
			if($scope.billdata.charge16_c && Number($scope.billdata.quantity16_c)>0){$scope.billdetail.charge16 =$scope.billdata.charge16_c ;
					$scope.billdetail.rate16 =parseFloat(Number($scope.billdata.charge16_c)/Number($scope.billdata.quantity16_c)).toFixed(2) ;}
			if($scope.billdata.charge17_c && Number($scope.billdata.quantity17_c)>0){$scope.billdetail.charge17 =$scope.billdata.charge17_c ;
					$scope.billdetail.rate17 =parseFloat(Number($scope.billdata.charge17_c)/Number($scope.billdata.quantity17_c)).toFixed(2) ;}
			if($scope.billdata.charge18_c && Number($scope.billdata.quantity18_c)>0){$scope.billdetail.charge18 =$scope.billdata.charge18_c ;
					$scope.billdetail.rate18 =parseFloat(Number($scope.billdata.charge18_c)/Number($scope.billdata.quantity18_c)).toFixed(2) ;}
			if($scope.billdata.charge19_c && Number($scope.billdata.quantity19_c)>0){$scope.billdetail.charge19 =$scope.billdata.charge19_c ;
					$scope.billdetail.rate19 =parseFloat(Number($scope.billdata.charge19_c)/Number($scope.billdata.quantity19_c)).toFixed(2) ;}
			if($scope.billdata.charge20_c && Number($scope.billdata.quantity20_c)>0){$scope.billdetail.charge20 =$scope.billdata.charge20_c ;
					$scope.billdetail.rate20 =parseFloat(Number($scope.billdata.charge20_c)/Number($scope.billdata.quantity20_c)).toFixed(2) ;}
			if($scope.billdata.charge21_c && Number($scope.billdata.quantity21_c)>0){$scope.billdetail.charge21 =$scope.billdata.charge21_c ;
					$scope.billdetail.rate21 =parseFloat(Number($scope.billdata.charge21_c)/Number($scope.billdata.quantity21_c)).toFixed(2) ;}
			if($scope.billdata.charge22_c && Number($scope.billdata.quantity22_c)>0){$scope.billdetail.charge22 =$scope.billdata.charge22_c ;
					$scope.billdetail.rate22 =parseFloat(Number($scope.billdata.charge22_c)/Number($scope.billdata.quantity22_c)).toFixed(2) ;}
			if($scope.billdata.charge23_c && Number($scope.billdata.quantity23_c)>0){$scope.billdetail.charge23 =$scope.billdata.charge23_c ;
					$scope.billdetail.rate23 =parseFloat(Number($scope.billdata.charge23_c)/Number($scope.billdata.quantity23_c)).toFixed(2) ;}
			if($scope.billdata.charge24_c && Number($scope.billdata.quantity24_c)>0){$scope.billdetail.charge24 =$scope.billdata.charge24_c ;
					$scope.billdetail.rate24 =parseFloat(Number($scope.billdata.charge24_c)/Number($scope.billdata.quantity24_c)).toFixed(2) ;}
			if($scope.billdata.charge25_c && Number($scope.billdata.quantity25_c)>0){$scope.billdetail.charge25 =$scope.billdata.charge25_c ;
					$scope.billdetail.rate25 =parseFloat(Number($scope.billdata.charge25_c)/Number($scope.billdata.quantity25_c)).toFixed(2) ;}
			
			$scope.billdetail.fileid = $scope.billdata.reffileid_c;
			$scope.billdetail.filepresent =true;
			
			// Receipt data also generated
			if($scope.billdata.amount_c ){$scope.billdetail.amount =$scope.billdata.amount_c ;}
			else{$scope.billdetail.amount = 0;}
			$scope.billdetail.rcptamtinwords = inWords(Number($scope.billdetail.amount));
			
			if($scope.billdata.extradesc_c ){$scope.billdetail.extradesc =$scope.billdata.extradesc ;}
			else{$scope.billdetail.extradesc = "";}
			
			if($scope.billdata.chequedate_c ){$scope.billdetail.chequedate =$scope.billdata.chequedate ;}
			else{$scope.billdetail.chequedate = "";}
			
			if($scope.billdata.chequeno_c ){$scope.billdetail.chequeno =$scope.billdata.chequeno ;}
			else{$scope.billdetail.chequeno = "";}
			
			if($scope.billdata.cardtrnxno_c ){$scope.billdetail.cardtrnxno =$scope.billdata.cardtrnxno_c ;}
			else{$scope.billdetail.cardtrnxno = "";}
			
			if($scope.billdata.refmodeofpayment_c ){$scope.billdetail.refmodeofpayment =$scope.billdata.refmodeofpayment_c ;}
			else{$scope.billdetail.refmodeofpayment = 5;} // For cash transactions

		});	
	
	});
	appointmentService.getAppointmentData(appointmentid)
	.then(function(data){
					$scope.appointment_info = data;
					console.log("Got appointment data");
					console.log($scope.appointment_info);
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					if(!$scope.billdetail.patrelative){
						$scope.billdetail.patrelative=$scope.appointment_info.Patientname;
					}
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=Math.round(Number($scope.appointment_info.amount));
													
					/*if(!$scope.examination_data.display_savebutton){
						$scope.billdate = $scope.appointment_info.DateAndTime;
					}*/
					if($scope.billdate == ''||$scope.billdate == null)
					{
						$scope.billdate = ($.datepicker.formatDate("d M yy", new Date())).toString();						
					}
					if($scope.appointment_info.billid==null)
					{$scope.appointment_info.billid=$scope.appointment_info.newbillid;}
					console.log($scope.billdate);
	});
	$scope.addtototalbill = function(){
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					if (!$scope.billdetail.charge1){$scope.billdetail.charge1=0;}
					if (!$scope.billdetail.charge3){$scope.billdetail.charge3=0;}
					if (!$scope.billdetail.charge4){$scope.billdetail.charge4=0;}
					if (!$scope.billdetail.charge5){$scope.billdetail.charge5=0;}
					if (!$scope.billdetail.charge6){$scope.billdetail.charge6=0;}
					if (!$scope.billdetail.charge7){$scope.billdetail.charge7=0;}
					if (!$scope.billdetail.charge8){$scope.billdetail.charge8=0;}
					if (!$scope.billdetail.charge9){$scope.billdetail.charge9=0;}
					if (!$scope.billdetail.charge10){$scope.billdetail.charge10=0;}
					if (!$scope.billdetail.charge11){$scope.billdetail.charge11=0;}
					if (!$scope.billdetail.charge12){$scope.billdetail.charge12=0;}
					if (!$scope.billdetail.charge13){$scope.billdetail.charge13=0;}
					if (!$scope.billdetail.charge14){$scope.billdetail.charge14=0;}
					if (!$scope.billdetail.charge15){$scope.billdetail.charge15=0;}
					if (!$scope.billdetail.charge16){$scope.billdetail.charge16=0;}
					if (!$scope.billdetail.charge17){$scope.billdetail.charge17=0;}
					if (!$scope.billdetail.charge18){$scope.billdetail.charge18=0;}
					if (!$scope.billdetail.charge19){$scope.billdetail.charge19=0;}
					if (!$scope.billdetail.charge20){$scope.billdetail.charge20=0;}
					if (!$scope.billdetail.charge21){$scope.billdetail.charge21=0;}
					if (!$scope.billdetail.charge22){$scope.billdetail.charge22=0;}
					if (!$scope.billdetail.charge23){$scope.billdetail.charge23=0;}
					if (!$scope.billdetail.charge24){$scope.billdetail.charge24=0;}
					if (!$scope.billdetail.charge25){$scope.billdetail.charge25=0;}
					
					//$scope.appointment_info.totalsum=Math.round(Number($scope.appointment_info.consultationfee)+Number($scope.billdetail.injection)+Number($scope.billdetail.dressing)+Number($scope.billdetail.labtest)+Number($scope.billdetail.reconsultation)+Number($scope.billdetail.visit)+Number($scope.billdetail.ecg)+Number($scope.billdetail.misc)+Number($scope.billdetail.silverfilling )+Number($scope.billdetail.compositefilling )+Number($scope.billdetail.rootcanal )+Number($scope.billdetail.periodental )+Number($scope.billdetail.oralsurgery )+Number($scope.billdetail.orthodentic )+Number($scope.billdetail.metalcapping )+Number($scope.billdetail.ceramiccrown )+Number($scope.billdetail.ceramicbridge )+Number($scope.billdetail.metalbridge ));
					$scope.appointment_info.totalsum=Math.round(Number($scope.billdetail.injection)
															+Number($scope.billdetail.dressing)
															+Number($scope.billdetail.labtest)
															+Number($scope.billdetail.reconsultation)
															+Number($scope.billdetail.visit)
															+Number($scope.billdetail.ecg)
															+Number($scope.billdetail.misc)
															+Number($scope.billdetail.silverfilling )
															+Number($scope.billdetail.compositefilling )
															+Number($scope.billdetail.rootcanal )
															+Number($scope.billdetail.periodental )
															+Number($scope.billdetail.oralsurgery )
															+Number($scope.billdetail.orthodentic )
															+Number($scope.billdetail.metalcapping )
															+Number($scope.billdetail.ceramiccrown )
															+Number($scope.billdetail.ceramicbridge )
															+Number($scope.billdetail.metalbridge )					
															+Number($scope.billdetail.charge1)
															+Number($scope.billdetail.charge4)
															+Number($scope.billdetail.charge5)
															+Number($scope.billdetail.charge6)
															+Number($scope.billdetail.charge7)
															+Number($scope.billdetail.charge8)
															+Number($scope.billdetail.charge9)
															+Number($scope.billdetail.charge10)
															+Number($scope.billdetail.charge11)
															+Number($scope.billdetail.charge12)
															+Number($scope.billdetail.charge13)
															+Number($scope.billdetail.charge14)
															+Number($scope.billdetail.charge15)
															+Number($scope.billdetail.charge16)
															+Number($scope.billdetail.charge17)
															+Number($scope.billdetail.charge18)
															+Number($scope.billdetail.charge19)
															+Number($scope.billdetail.charge20)
															+Number($scope.billdetail.charge21)
															+Number($scope.billdetail.charge22)
															+Number($scope.billdetail.charge23)
															+Number($scope.billdetail.charge24)
															+Number($scope.billdetail.charge25)
														);				
					$scope.appointment_info.amountinwords = inWords(Number($scope.appointment_info.totalsum));
					$scope.appointment_info.totalsum = parseFloat($scope.appointment_info.totalsum).toFixed(2);
					$scope.appointment_info.amount=$scope.appointment_info.totalsum;
					$scope.billdetail.rcptamtinwords = inWords(Number($scope.billdetail.amount));
					$scope.billdetail.amount = parseFloat($scope.billdetail.amount).toFixed(2);
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
					$scope.$broadcast('save_bill');
				}	
		     }
			 $scope.finalizebill = function(){
			 	if(bill_option == 'generate'){
					$scope.isbillgenerate.billGenerated='yes';		
					$scope.$broadcast('save_bill');
				}	
		     }

}]);
	function inWords (num) {
    	var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
		var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

    	if ((num = num.toString()).length > 9) return 'overflow';
	    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		console.log(n);
    	if (!n) return; var str = '';
	    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
    	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
 	    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
 	    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
 	    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Only ' : '';
		str += (n[5] == 0) && ((n[1] != 0)||(n[2] != 0)||(n[3] != 0)||(n[4] != 0)) ? 'Only' : '';
 	    return str;
	}
