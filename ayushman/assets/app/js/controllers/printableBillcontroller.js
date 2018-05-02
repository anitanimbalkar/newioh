angular.module('app.controllers') 
.controller('PrintableBillController', ['$scope', 'appointmentService','dosageApi','formApi','emrService','examinationService',
		function($scope, appointmentService,dosageApi,formApi,emrService,examinationService) {
			appointmentService.getMyprofile()
				.then(function(data){
					console.log(data);
					$scope.myprofile = data;
			});
			examinationService.getExaminationData(appointmentid).then(function(data){
					$scope.examination_data = data;
			});
			
			if (typeof examination_data != "undefined")
			{
				console.log(examination_data);
				$scope.examination_data.display_savebutton=true;
			}
				$scope.calculateAge = calculate_age;
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
										$scope.appointment_info = data;
										$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
										$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
										$scope.$apply();
								 });
					},
					error:
							function(){
								showMessage('250','50','Send Data to patient','Error occured while saving bill. Please contact your system administrator.','error','id');
					},
				});
			 });
			 $scope.savebill = function(){
				$scope.$broadcast('save_bill');
		     }
			 $scope.finalizebill = function(){
			 		$scope.$broadcast('save_bill');	
		     }
			 
			appointmentService.getMyclinics()
				.then(function(data){
					$scope.myclinics = data;
			});
			
			
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					
					$scope.appointment_info.amountinwords = inWords(Math.round($scope.appointment_info.amount));
					$scope.appointment_info.totalsum=$scope.appointment_info.amount;
					$scope.appointment_info.consultationfee=$scope.appointment_info.amount;
					//console.log("Savebutton"+$scope.examination_data.display_savebutton);
					//if($scope.examination_data.display_savebutton){
						$scope.billdate=$scope.appointment_info.DateAndTime;
					//}
					$scope.billdetail.patrelative=$scope.appointment_info.Patientname;
			 });
			 
			$scope.billdetail={};
			$scope.billdetail.injection='';
			$scope.billdetail.dressing='';
			$scope.billdetail.labtest='';
			$scope.billdetail.reconsultation='';
			$scope.billdetail.visit='';
			$scope.billdetail.ecg='';
			$scope.billdetail.misc='';
			$scope.billdetail.treatmentfrom='';
			$scope.billdetail.treatmentto='';
			// dental bill
			$scope.billdetail.silverfilling='';
			$scope.billdetail.compositefilling='';
			$scope.billdetail.rootcanal='';
			$scope.billdetail.periodental='';
			$scope.billdetail.oralsurgery='';
			$scope.billdetail.orthodentic='';
			$scope.billdetail.metalcapping='';
			$scope.billdetail.ceramiccrown='';
			$scope.billdetail.ceramicbridge='';
			$scope.billdetail.metalbridge='';
			// 25 Charges
			/*$scope.billdetail.charge1='';
			$scope.billdetail.charge2='';
			$scope.billdetail.charge3='';
			$scope.billdetail.charge4='';
			$scope.billdetail.charge5='';
			$scope.billdetail.charge6='';
			$scope.billdetail.charge7='';
			$scope.billdetail.charge8='';
			$scope.billdetail.charge9='';
			$scope.billdetail.charge10='';
			$scope.billdetail.charge11='';
			$scope.billdetail.charge12='';
			$scope.billdetail.charge13='';
			$scope.billdetail.charge14='';
			$scope.billdetail.charge15='';
			$scope.billdetail.charge16='';
			$scope.billdetail.charge17='';
			$scope.billdetail.charge18='';
			$scope.billdetail.charge19='';
			$scope.billdetail.charge20='';
			$scope.billdetail.charge21='';
			$scope.billdetail.charge22='';
			$scope.billdetail.charge23='';
			$scope.billdetail.charge24='';
			$scope.billdetail.charge25='';	*/	
			
			appointmentService.getbillTemplate()
			.then(function(data){
				console.log(data);
				$scope.billdata= data.bill;
				console.log("got billdata");
				console.log($scope.billdata);
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
				
				if($scope.billdata.charge1)
				{$scope.billdetail.charge1=$scope.billdata.charge1;$scope.billdetail.rate1=$scope.billdata.charge1;}
				if($scope.billdata.charge4)
				{$scope.billdetail.rate4=$scope.billdata.charge4;$scope.billdetail.charge4=0;}
				if($scope.billdata.charge5)
				{$scope.billdetail.rate5=$scope.billdata.charge5;$scope.billdetail.charge5=0;}
				if($scope.billdata.charge6)
				{$scope.billdetail.rate6=$scope.billdata.charge6;$scope.billdetail.charge6=0;}
				if($scope.billdata.charge7)
				{$scope.billdetail.rate7=$scope.billdata.charge7;$scope.billdetail.charge7=0;}
				if($scope.billdata.charge8)
				{$scope.billdetail.rate8=$scope.billdata.charge8;$scope.billdetail.charge8=0;}
				if($scope.billdata.charge9)
				{$scope.billdetail.rate9=$scope.billdata.charge9;$scope.billdetail.charge9=0;}
				if($scope.billdata.charge10)
				{$scope.billdetail.rate10=$scope.billdata.charge10;$scope.billdetail.charge10=0;}
				if($scope.billdata.charge11)
				{$scope.billdetail.rate11=$scope.billdata.charge11;$scope.billdetail.charge11=0;}
				if($scope.billdata.charge12)
				{$scope.billdetail.rate12=$scope.billdata.charge12;$scope.billdetail.charge12=0;}
				if($scope.billdata.charge13)
				{$scope.billdetail.rate13=$scope.billdata.charge13;$scope.billdetail.charge13=0;}
				if($scope.billdata.charge14)
				{$scope.billdetail.rate14=$scope.billdata.charge14;$scope.billdetail.charge14=0;}
				if($scope.billdata.charge15)
				{$scope.billdetail.rate15=$scope.billdata.charge15;$scope.billdetail.charge15=0;}
				if($scope.billdata.charge16)
				{$scope.billdetail.rate16=$scope.billdata.charge16;$scope.billdetail.charge16=0;}
				if($scope.billdata.charge17)
				{$scope.billdetail.rate17=$scope.billdata.charge17;$scope.billdetail.charge17=0;}
				if($scope.billdata.charge18)
				{$scope.billdetail.rate18=$scope.billdata.charge18;$scope.billdetail.charge18=0;}
				if($scope.billdata.charge19)
				{$scope.billdetail.rate19=$scope.billdata.charge19;$scope.billdetail.charge19=0;}
				if($scope.billdata.charge20)
				{$scope.billdetail.rate20=$scope.billdata.charge20;$scope.billdetail.charge20=0;}
				if($scope.billdata.charge21)
				{$scope.billdetail.rate21=$scope.billdata.charge21;$scope.billdetail.charge21=0;}
				if($scope.billdata.charge22)
				{$scope.billdetail.rate22=$scope.billdata.charge22;$scope.billdetail.charge22=0;}
				if($scope.billdata.charge23)
				{$scope.billdetail.rate23=$scope.billdata.charge23;$scope.billdetail.charge23=0;}
				if($scope.billdata.charge24)
				{$scope.billdetail.rate24=$scope.billdata.charge24;$scope.billdetail.charge24=0;}
				if($scope.billdata.charge25)
				{$scope.billdetail.rate25=$scope.billdata.charge25;$scope.billdetail.charge25=0;}
			
				// Initialise Receipt data
				$scope.billdetail.amount = 0;
				$scope.billdetail.rcptamtinwords = inWords($scope.billdetail.amount);
				$scope.billdetail.extradesc = "";
				$scope.billdetail.chequedate = "";
				$scope.billdetail.chequeno = "";
				$scope.billdetail.cardtrnxno = "";
				$scope.billdetail.refmodeofpayment = 5; // For cash transactions

				});

			$scope.addtototalbill = function(){
			 appointmentService.getAppointmentData(appointmentid)
				.then(function(data){
					$scope.appointment_info = data;
					$scope.appointment_info.age =  $scope.calculateAge($scope.appointment_info.DOB);
					//$scope.appointment_info.totalsum=Math.round(Number($scope.appointment_info.consultationfee)+Number($scope.billdetail.injection)+Number($scope.billdetail.dressing)+Number($scope.billdetail.labtest)+Number($scope.billdetail.reconsultation)+Number($scope.billdetail.visit)+Number($scope.billdetail.ecg)+Number($scope.billdetail.misc)+Number($scope.billdetail.silverfilling )+Number($scope.billdetail.compositefilling )+Number($scope.billdetail.rootcanal )+Number($scope.billdetail.periodental )+Number($scope.billdetail.oralsurgery )+Number($scope.billdetail.orthodentic )+Number($scope.billdetail.metalcapping )+Number($scope.billdetail.ceramiccrown )+Number($scope.billdetail.ceramicbridge )+Number($scope.billdetail.metalbridge ));
					//Number($scope.appointment_info.consultationfee)
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
										+Number($scope.billdetail.charge1 )
										+Number($scope.billdetail.charge4 )
										+Number($scope.billdetail.charge5 )
										+Number($scope.billdetail.charge6 )
										+Number($scope.billdetail.charge7 )
										+Number($scope.billdetail.charge8 )
										+Number($scope.billdetail.charge9 )
										+Number($scope.billdetail.charge10 )
										+Number($scope.billdetail.charge11 )
										+Number($scope.billdetail.charge12 )
										+Number($scope.billdetail.charge13 )
										+Number($scope.billdetail.charge14 )
										+Number($scope.billdetail.charge15 )
										+Number($scope.billdetail.charge16 )
										+Number($scope.billdetail.charge17 )
										+Number($scope.billdetail.charge18 )
										+Number($scope.billdetail.charge19 )
										+Number($scope.billdetail.charge20 )
										+Number($scope.billdetail.charge21 )
										+Number($scope.billdetail.charge22 )
										+Number($scope.billdetail.charge23)
										+Number($scope.billdetail.charge24)
										+Number($scope.billdetail.charge25)	);
					//$scope.appointment_info.totalsum=Math.round(Number($scope.appointment_info.consultationfee)+Number($scope.billdetail.injection)+Number($scope.billdetail.dressing)+Number($scope.billdetail.labtest)+Number($scope.billdetail.reconsultation)+Number($scope.billdetail.visit)+Number($scope.billdetail.ecg)+Number($scope.billdetail.misc));
					$scope.appointment_info.amountinwords = inWords(Number($scope.appointment_info.totalsum));
					$scope.appointment_info.totalsum = parseFloat($scope.appointment_info.totalsum).toFixed(2);
					$scope.appointment_info.amount=$scope.appointment_info.totalsum;
					
					$scope.billdetail.rcptamtinwords = inWords(Number($scope.billdetail.amount));
					$scope.billdetail.amount = parseFloat($scope.billdetail.amount).toFixed(2);

			 });

			}
			
			$scope.loading = function(flag){
				if(flag){
					$('#loading').dialog("open");
				}else{
					$('#loading').dialog("close");
				}
			 }
		}
	])