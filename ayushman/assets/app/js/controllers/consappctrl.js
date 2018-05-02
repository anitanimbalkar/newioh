angular.module('app.controllers')
    .controller('consappCtrl',
		['$scope','$route','$http','createDialog','bookappService','$routeParams',
 		function($scope,$route,$http,createDialogService,bookappService,$routeParams){
			if($routeParams.patient_id == undefined)
				$routeParams.patient_id = $('#patid').val();
			if($routeParams.rescheduleappid == undefined)
				$routeParams.rescheduleappid = $('#reappid').val();
			// Variable set in hidden fields on screen
			$scope.todayDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
			$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
				
			console.log($routeParams.patient_id);
			console.log($routeParams.rescheduleappid);
			bookappService.getfavDoctors($routeParams.patient_id,$routeParams.rescheduleappid)
				.then(function(data){
			    	$scope.doctorlist = data.doctorlist;
					console.log($scope.doctorlist);
					if($scope.doctorlist[0].doctorid)
					{
						$scope.currentDoctorIndex = 0;
						$scope.currentDoctordata = $scope.doctorlist[0];
						$scope.doctorlist[$scope.currentDoctorIndex].display = "yes";
						$scope.currentDoctorid = $scope.doctorlist[0].doctorid;
						$scope.first_time_fees = $scope.doctorlist[0]['fees'].first_time_fees;
						$scope.followup_fees = $scope.doctorlist[0]['fees'].followup_fees;
						$scope.online_fees = $scope.doctorlist[0]['fees'].online_fees;
						if($scope.doctorlist[0]['clinics'][0].address_id)
						{
							$scope.currentClinics = $scope.doctorlist[0]['clinics'];
							$scope.currentClinicid = $scope.doctorlist[0]['clinics'][0].address_id;
							$scope.currentClinicAddress = $scope.doctorlist[0]['clinics'][0].address;
							$scope.currentClinicname = $scope.doctorlist[0]['clinics'][0].name;
							$('doctorclinic').val($scope.currentClinicid);
							$('doctorclinic').find('option[value="' + $scope.currentClinicid + '"]').prop("selected",true);
							$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
							console.log($scope.currentDate);
							$scope.direction = '';
							bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
							.then(function(data){
								$scope.currentSlots = data;
								console.log($scope.currentSlots);
								$scope.setDisplayflag();
								$scope.setDaycolorfordate($scope.currentDate);
								// should set values for selected date;								
								$scope.new_lower_date = $scope.currentSlots[1].date;
								$scope.new_upper_date = $scope.currentSlots[7].date;								
							});								
						}
					}					
			});
			bookappService.getIncidents($routeParams.patient_id)
				.then(function(data){
			    	$scope.incidentlist = data.incident;
			    	$scope.billplan = data.billplan;
					console.log(data);
					$scope.usagechargesinclinic = $scope.billplan.usagechargesinclinic;
					$scope.servicetax = $scope.billplan.servicetax;	
					$scope.servicecharges = $scope.billplan.servicecharges_c;
					$scope.netbalance = $scope.billplan.netbalance;
			});
			// Change button color to orange for showing selection
			// ---------------------------------------------------
			var set_Day_color_for_date = function(datevalue){
				if($scope.currentSlots[1].date == datevalue)
				{	
					var element = document.getElementById("day1");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day1').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day1').attr('ng-click','displayslots(1);');
				}
				else
				{
					var element = document.getElementById("day1");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day1').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day1').attr('ng-click','displayslots(1);');				
				}
				if($scope.currentSlots[1].datelessthantoday == true)
				{
					var element = document.getElementById("day1");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day1').attr('onclick','');
					$('#day1').attr('ng-click','');
				}
				if($scope.currentSlots[2].date == datevalue)
				{	
					var element = document.getElementById("day2");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day2').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day2').attr('ng-click','displayslots(2);');
				}
				else
				{
					var element = document.getElementById("day2");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day2').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day2').attr('ng-click','displayslots(2);');				
				}				
				if($scope.currentSlots[2].datelessthantoday == true)
				{
					var element = document.getElementById("day2");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day2').attr('onclick','');
					$('#day2').attr('ng-click','');
				}
				if($scope.currentSlots[3].date == datevalue)
				{	
					var element = document.getElementById("day3");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day3').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day3').attr('ng-click','displayslots(3);');
				}
				else
				{
					var element = document.getElementById("day3");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day3').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day3').attr('ng-click','displayslots(3);');				
				}				
				if($scope.currentSlots[3].datelessthantoday == true)
				{
					var element = document.getElementById("day3");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day3').attr('onclick','');
					$('#day3').attr('ng-click','');
				}				
				if($scope.currentSlots[4].date == datevalue)
				{	
					var element = document.getElementById("day4");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day4').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day4').attr('ng-click','displayslots(4);');
				}
				else
				{
					var element = document.getElementById("day4");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day4').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day4').attr('ng-click','displayslots(4);');				
				}
				if($scope.currentSlots[4].datelessthantoday == true)
				{
					var element = document.getElementById("day4");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day4').attr('onclick','');
					$('#day4').attr('ng-click','');
				}
				if($scope.currentSlots[5].date == datevalue)
				{	
					var element = document.getElementById("day5");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day5').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day5').attr('ng-click','displayslots(5);');
				}
				else
				{
					var element = document.getElementById("day5");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day5').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day5').attr('ng-click','displayslots(5);');				
				}
				if($scope.currentSlots[5].datelessthantoday == true)
				{
					var element = document.getElementById("day5");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day5').attr('onclick','');
					$('#day5').attr('ng-click','');
				}
				if($scope.currentSlots[6].date == datevalue)
				{	
					var element = document.getElementById("day6");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day6').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day6').attr('ng-click','displayslots(6);');
				}
				else
				{
					var element = document.getElementById("day6");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day6').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day6').attr('ng-click','displayslots(6);');				
				}				
				if($scope.currentSlots[6].datelessthantoday == true)
				{
					var element = document.getElementById("day6");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day6').attr('onclick','');
					$('#day6').attr('ng-click','');
				}
				if($scope.currentSlots[7].date == datevalue)
				{	
					var element = document.getElementById("day7");
					element.classList.add("w3-orange");
					element.classList.add("clickedBtnDay");
					element.classList.remove("w3-light-blue");
					element.classList.remove("w3-light-grey");
					$('#day7').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day7').attr('ng-click','displayslots(7);');
				}
				else
				{
					var element = document.getElementById("day7");
					element.classList.add("w3-light-blue");
					element.classList.remove("clickedBtnDay");
					element.classList.remove("w3-orange");
					element.classList.remove("w3-light-grey");
					$('#day7').attr('onclick','resizescreen();changeColorDay(this)');
					$('#day7').attr('ng-click','displayslots(7);');				
				}
				if($scope.currentSlots[7].datelessthantoday == true)
				{
					var element = document.getElementById("day7");
					element.classList.add("w3-light-grey");
					element.classList.remove("w3-light-blue");					
					element.classList.remove("w3-orange");
					$('#day7').attr('onclick','');
					$('#day7').attr('ng-click','');
				}
			}
			$scope.setDaycolorfordate = set_Day_color_for_date;
			
			var set_Display_flag = function(){
				$scope.new_lower_app_index = 0;				
				$scope.new_upper_app_index = 5;
				for (i = $scope.new_lower_app_index; i < $scope.new_upper_app_index ; ++i)
				{
					if ($scope.currentSlots[1]['appointments']!= null && $scope.currentSlots[1]['appointments'][i])
						$scope.currentSlots[1]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[2]['appointments']!= null && $scope.currentSlots[2]['appointments'][i])
						$scope.currentSlots[2]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[3]['appointments']!= null && $scope.currentSlots[3]['appointments'][i])
						$scope.currentSlots[3]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[4]['appointments']!= null && $scope.currentSlots[4]['appointments'][i])
						$scope.currentSlots[4]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[5]['appointments']!= null && $scope.currentSlots[5]['appointments'][i])
						$scope.currentSlots[5]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[6]['appointments']!= null && $scope.currentSlots[6]['appointments'][i])
						$scope.currentSlots[6]['appointments'][i]['display'] = 'yes';
					if ($scope.currentSlots[7]['appointments']!= null && $scope.currentSlots[7]['appointments'][i])
						$scope.currentSlots[7]['appointments'][i]['display'] = 'yes';
				}
			}
			$scope.setDisplayflag = set_Display_flag; 
			
			// Set date for display
			
			var display_slots = function(dayindex){
				$scope.currentDate = $scope.currentSlots[dayindex].date;
			}
			$scope.displayslots = display_slots; 
			
			// show next appointments slots in set of 5
			var show_next_appointments = function(){
				// Reset selection time
				$scope.currentDateTime = null;
				// First set unset display flag for existing set of arrays
					for (i = $scope.new_lower_app_index; i < $scope.new_upper_app_index ; ++i)
					{
						if ($scope.currentSlots[1]['appointments']!= null && $scope.currentSlots[1]['appointments'][i])
							$scope.currentSlots[1]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[2]['appointments']!= null && $scope.currentSlots[2]['appointments'][i])
							$scope.currentSlots[2]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[3]['appointments']!= null && $scope.currentSlots[3]['appointments'][i])
							$scope.currentSlots[3]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[4]['appointments']!= null && $scope.currentSlots[4]['appointments'][i])
							$scope.currentSlots[4]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[5]['appointments']!= null && $scope.currentSlots[5]['appointments'][i])
							$scope.currentSlots[5]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[6]['appointments']!= null && $scope.currentSlots[6]['appointments'][i])
							$scope.currentSlots[6]['appointments'][i]['display'] = 'no';
						if ($scope.currentSlots[7]['appointments']!= null && $scope.currentSlots[7]['appointments'][i])
							$scope.currentSlots[7]['appointments'][i]['display'] = 'no';
					}
					
				// then set flag for next set of arrays
				// Check if length of arrays is more than upper index
				if (($scope.currentSlots[1]['appointments']!= null && $scope.currentSlots[1]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[2]['appointments']!= null && $scope.currentSlots[2]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[3]['appointments']!= null && $scope.currentSlots[3]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[4]['appointments']!= null && $scope.currentSlots[4]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[5]['appointments']!= null && $scope.currentSlots[5]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[6]['appointments']!= null && $scope.currentSlots[6]['appointments'].length > $scope.new_upper_app_index) ||
					($scope.currentSlots[7]['appointments']!= null && $scope.currentSlots[7]['appointments'].length > $scope.new_upper_app_index))
				{
					// still elements in array to be displayed
					new_lower = $scope.new_upper_app_index ;
					new_upper = $scope.new_upper_app_index + 5;
					$scope.new_lower_app_index = new_lower;				
					$scope.new_upper_app_index = new_upper;					
					for (i = $scope.new_lower_app_index; i < $scope.new_upper_app_index ; ++i)
					{
						if ($scope.currentSlots[1]['appointments']!= null && $scope.currentSlots[1]['appointments'][i])
							$scope.currentSlots[1]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[2]['appointments']!= null && $scope.currentSlots[2]['appointments'][i])
							$scope.currentSlots[2]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[3]['appointments']!= null && $scope.currentSlots[3]['appointments'][i])
							$scope.currentSlots[3]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[4]['appointments']!= null && $scope.currentSlots[4]['appointments'][i])
							$scope.currentSlots[4]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[5]['appointments']!= null && $scope.currentSlots[5]['appointments'][i])
							$scope.currentSlots[5]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[6]['appointments']!= null && $scope.currentSlots[6]['appointments'][i])
							$scope.currentSlots[6]['appointments'][i]['display'] = 'yes';
						if ($scope.currentSlots[7]['appointments']!= null && $scope.currentSlots[7]['appointments'][i])
							$scope.currentSlots[7]['appointments'][i]['display'] = 'yes';
					}					
				}
				else
				{
					// reset array to display first five element
					$scope.setDisplayflag();
				}				
			}
			$scope.shownextappointments = show_next_appointments; 
			
			var get_slots_for_clinic = function(clinicmode){
				$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
				$scope.direction = '';
				/*$scope.currentDoctorid = doctorid;
				var elementid = "doctorclinic"+doctorid;*/
				$scope.currentClinicid = document.getElementById('doctorclinic').value;
				for (i=0; i< $scope.currentClinics.length ; ++i)
				{
					if($scope.currentClinics[i].address_id == $scope.currentClinicid )
					{
						$scope.currentClinicname = $scope.currentClinics[i].name;
						$scope.currentClinicAddress = $scope.currentClinics[i].address;
					}					
				}
				$scope.mode = clinicmode;
				bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
					.then(function(data){
						$scope.currentSlots = data;
						$scope.new_lower_date = $scope.currentSlots[1].date;
						$scope.new_upper_date = $scope.currentSlots[7].date;								
						// Indexes to display 5 slots at a time
						$scope.setDisplayflag();
						$scope.setDaycolorfordate($scope.currentDate);								
					});											
			}
			$scope.getslotsforclinic = get_slots_for_clinic ;
			
			var get_slots_for_date = function(datevalue){
				$scope.currentDateTime = null;
				$scope.currentDate = datevalue;
				$scope.direction = '';
				if($scope.currentDoctorid != null && $scope.currentClinicid != null)
				{
					bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
					.then(function(data){
						$scope.currentSlots = data;
						$scope.new_lower_date = $scope.currentSlots[1].date;
						$scope.new_upper_date = $scope.currentSlots[7].date;								
						$scope.setDisplayflag();
						console.log(datevalue);
						$scope.setDaycolorfordate(datevalue);
					});									
				}
			}
			$scope.getslotsfordate = get_slots_for_date ;			
			
			// Get slots for next week
			var show_next_slots = function(){
				// Reset selection time
				$scope.currentDateTime = null;
				$scope.direction = "later";
				$scope.currentDate = $scope.new_upper_date;
				bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
				.then(function(data){
					$scope.currentSlots = data;
					$scope.new_lower_date = $scope.currentSlots[1].date;
					$scope.new_upper_date = $scope.currentSlots[7].date;								
					$scope.currentDate = $scope.new_lower_date;
					$scope.setDisplayflag();
					$scope.setDaycolorfordate($scope.currentDate);
				});								
			};
			$scope.shownextslots = show_next_slots;

			// Get slots for Today
			var show_today_slots = function(){
				// Reset selection time
				$scope.currentDateTime = null;
				$scope.direction = "";
				$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
				bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
				.then(function(data){
					$scope.currentSlots = data;
					$scope.new_lower_date = $scope.currentSlots[1].date;
					$scope.new_upper_date = $scope.currentSlots[7].date;								
					$scope.setDisplayflag();
					$scope.setDaycolorfordate($scope.currentDate);
				});								
			};
			$scope.showtodayslots = show_today_slots;

			
			// Get slots for prev Week
			/*var show_prev_slots = function(){
				// Reset selection time
				$scope.currentDateTime = null;
				$scope.direction = "earlier";
				$scope.currentDate = $scope.new_lower_date;
				bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
				.then(function(data){
					$scope.currentSlots = data;
					$scope.new_lower_date = $scope.currentSlots[1].date;
					$scope.new_upper_date = $scope.currentSlots[7].date;								
					$scope.setDisplayflag();
				});								
			};
			$scope.showprevslots = show_prev_slots;*/
			
			var clearslots = function(){
				$scope.currentSlots = null ;			
				$scope.currentDate = null ;			
				$scope.currentClinicid = null ;			
				$scope.currentDoctorid = null ;			
				$scope.currentDoctorName = null;
				$scope.currentClinicName = null;
				$scope.currentDateTime = null;
			}
			$scope.clearslots = clearslots;
			
			/*var show_next_doctor = function(){
				// length give numbser of records and array index starts with '0'
				$scope.doctorlist[$scope.currentDoctorIndex].display = 'no';
				if ($scope.currentDoctorIndex < ($scope.doctorlist.length - 1))
				{
					$scope.currentDoctorIndex = $scope.currentDoctorIndex + 1;
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'yes';					
				}
				else				
				{ // gone to end of array so go to first
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'no';
					$scope.currentDoctorIndex = 0;
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'yes';					
				}
				//Set clinic
				$scope.currentDoctorid = $scope.doctorlist[$scope.currentDoctorIndex].doctorid;
				$scope.first_time_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].first_time_fees;
				$scope.followup_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].followup_fees;
				$scope.online_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].online_fees;

				if($scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id)
				{
					$scope.currentClinicid = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id;
					$scope.currentClinics = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'];
					$scope.currentClinicAddress = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address;
					$scope.currentClinicname = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].name;
					$scope.currentDate = ($.datepicker.formatDate("dd-M-yy", new Date())).toString();						
					$scope.direction = '';
					$('doctorclinic').val($scope.currentClinicid);
					$('doctorclinic').find('option[value="' + $scope.currentClinicid + '"]').prop("selected",true);
					bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
						.then(function(data){
						$scope.currentSlots = data;
						$scope.new_lower_date = $scope.currentSlots[1].date;
						$scope.new_upper_date = $scope.currentSlots[7].date;								
					});								
				}
			}
			$scope.shownextdoctor = show_next_doctor;*/

			// Show selected doctors data
			
			var show_selected_doctor = function(doctorid){
				// selected record for this doctor from the array
				recordfound = false;
				for (i=0; ((i<$scope.doctorlist.length) && (recordfound == false)); ++i)
				{
					if (doctorid == $scope.doctorlist[i].doctorid)
					{
						recordfound = true;
						// Record matched and hence select data
						$scope.currentDoctorIndex = i;
						$scope.currentDoctordata = $scope.doctorlist[i];
						$scope.currentDoctorid = $scope.doctorlist[$scope.currentDoctorIndex].doctorid;
						$scope.first_time_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].first_time_fees;
						$scope.followup_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].followup_fees;
						$scope.online_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].online_fees;
		
						if($scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id)
						{
							$scope.currentClinicid = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id;
							$scope.currentClinics = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'];
							$scope.currentClinicAddress = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address;
							$scope.currentClinicname = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].name;
							$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
							$scope.direction = '';
							$('doctorclinic').val($scope.currentClinicid);
							$('doctorclinic').find('option[value="' + $scope.currentClinicid + '"]').prop("selected",true);
							bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
								.then(function(data){
								$scope.currentSlots = data;
								$scope.new_lower_date = $scope.currentSlots[1].date;
								$scope.new_upper_date = $scope.currentSlots[7].date;								
								$scope.setDisplayflag();
								$scope.setDaycolorfordate($scope.currentDate);
							});								
						}
					}
				}	
				$( "#othersonpanel" ).click();													
			}
			$scope.showselecteddoctor = show_selected_doctor;

			var show_prev_doctor = function(){
				$scope.doctorlist[$scope.currentDoctorIndex].display = 'no';
				if ($scope.currentDoctorIndex == 0)
				{
					// First element displayed so go to end of array
					$scope.currentDoctorIndex = $scope.doctorlist.length -1;
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'yes';					
				}
				else				
				{ 
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'no';
					$scope.currentDoctorIndex = $scope.currentDoctorIndex - 1;
					$scope.doctorlist[$scope.currentDoctorIndex].display = 'yes';					
				}
				//Set clinic
				$scope.currentDoctorid = $scope.doctorlist[$scope.currentDoctorIndex].doctorid;
				$scope.first_time_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].first_time_fees;
				$scope.followup_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].followup_fees;
				$scope.online_fees = $scope.doctorlist[$scope.currentDoctorIndex]['fees'].online_fees;
				if($scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id)
				{
					$scope.currentClinicid = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address_id;
					$scope.currentClinics = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'];
					$scope.currentClinicAddress = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].address;
					$scope.currentClinicname = $scope.doctorlist[$scope.currentDoctorIndex]['clinics'][0].name;
					$scope.currentDate = ($.datepicker.formatDate("dd M yy", new Date())).toString();						
					$scope.direction = '';
					$('doctorclinic').val($scope.currentClinicid);
					$('doctorclinic').find('option[value="' + $scope.currentClinicid + '"]').prop("selected",true);
					bookappService.getSlots($scope.currentDoctorid,$scope.currentClinicid,$scope.direction,$scope.currentDate)
						.then(function(data){
						$scope.currentSlots = data;
						$scope.new_lower_date = $scope.currentSlots[1].date;
						$scope.new_upper_date = $scope.currentSlots[7].date;								
					});								
				}
			}
			$scope.showprevdoctor = show_prev_doctor;
			
			var set_app_detail = function(slotindex,appindex){
				for(i=0 ; i< $scope.doctorlist.length; ++i)
				{
					if ($scope.doctorlist[i].doctorid == $scope.currentDoctorid)
					{
						$scope.currentDoctorName = $scope.doctorlist[i].name;										
						for(j=0; j < $scope.doctorlist[i]['clinics'].length; ++j)
						{
							if ($scope.doctorlist[i]['clinics'][j].address_id == $scope.currentClinicid)
								$scope.currentClinicName = $scope.doctorlist[i]['clinics'][j].name + ' ' + $scope.doctorlist[i]['clinics'][j].address;								
						}
					}					
				}			
				// Array index will be calculated considering 
				// $scope.new_lower_app_index
				//$scope.currentDateTime=$scope.currentSlots[slotindex]['appointments'][$scope.new_lower_app_index + appindex].display_time;
				$scope.currentDateTime=$scope.currentSlots[slotindex].date + " " +
								$scope.currentSlots[slotindex]['appointments'][$scope.new_lower_app_index + appindex].display_onlytime ;
				$scope.display_time=$scope.currentSlots[slotindex]['appointments'][$scope.new_lower_app_index + appindex].display_time;
				$scope.start_time=$scope.currentSlots[slotindex]['appointments'][$scope.new_lower_app_index + appindex].start_time;
				$scope.end_time=$scope.currentSlots[slotindex]['appointments'][$scope.new_lower_app_index + appindex].end_time;
			};
			$scope.setappdetail = set_app_detail;
				
			var book_appointment = function(){
				$scope.booksuccess = false;
				$.ajax({
					type: "post",
					url: "/ayushman/cpatientbookingapp/bookapp",
					data: $("#appointment_book_form").serialize(),
					async: false,
					success:
					function( data ){
							$scope.booksuccess = true;
							showNotification('300','20','Appointment Booked','Appointment Booked','notification','timernotification',3000);
									
					 },
					error:
					function(){
							$scope.booksuccess = false;							
							showNotification('300','20','Error','Error occured while creating appointment. Please contact your system administrator.','notification','timernotification',3000);
					}
				});
			}
			$scope.bookappointment = book_appointment;
			
			//////////////////////////////////////////////////////////////////
}])
.directive('bookConapp',function() {
	return {
		restrict:'E',
		scope:{
			patient_id:'@',
			rescheduleappid:'@'
		},
		templateUrl: '/ayushman/assets/app/partials/Consumerbookappointment.html',
		controller:'consappCtrl'		
	};
})