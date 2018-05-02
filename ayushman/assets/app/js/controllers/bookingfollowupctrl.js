angular.module('app.controllers').controller('bookingfollowupCtrl',['$scope','bookingApi','$routeParams',function($scope,bookingApi,$routeParams) {
	$scope.day = moment();
	console.log($scope.day);
	$scope.followupDate = '';
	$scope.clinics;
	$scope.clinicname=$scope.appointment_info.clinicid;
	console.log($scope.clinicname);
	
	$.ajax({
				url: "/ayushman/callslotsforclinic/getdoctorclinics",
				success: function(data) {
					$scope.clinics=JSON.parse(data);
					$scope.$apply();
					},
					error : function(){}
			  });
	$scope.setFollowup = function(){
		$("*").css("cursor", "wait");
		$scope.followupDate=JSON.stringify($('#dated').val());
		//$scope.followupDate=$('#dated').val();
		$scope.clinicname=$('#clinicid').val();
		var app_id = $scope.appointment_info.appointment_id;
		bookingApi.save({'date':$scope.followupDate, 'app_id':app_id, 'clinic_id':$scope.clinicname},function(data){
			$("*").css("cursor", "default");
			alert(data.data);
		});
	}
}]).directive('calendar',function() {
			return {
                    
                    templateUrl: "/ayushman/assets/app/partials/calendar.html",
                    scope: {
                        selected: "="
                    },
                    link: function(scope) {
                        scope.timeslots={};
						//scope.selected = _removeTime(scope.selected || moment());
                        scope.month = scope.selected.clone();

                        var start = scope.selected.clone();
                        start.date(1);
                        _removeTime(start.day(0));

                        _buildMonth(scope, start, scope.month);
						scope.gettimeslot=function(timeslot)
						{
							scope.seltime = timeslot;  
							console.log(timeslot['display_time']);
							console.log(timeslot['start_time']);
							console.log(timeslot['end_time']);
							scope.selected= timeslot;
						}
                        scope.select = function(day) {
                            //tempmoment=day.date;
							//tempdate=new Date(tempmoment.format("MMM DD, YYYY HH:MM"));
							scope.selected = day.date.format("YYYY-MM-DD");  
							
							//console.log(scope.selected);
							currdate=new Date();
							currdate.setHours(0,0,0,0);
							if($('#clinicid').val() == ''){
									alert("Please Select Incidence Name and Clinic");
							}else{
								if(day.date < currdate)
								{
									showNotification('300','20','Save data','Selection of previous date is not allowed.','notification','timernotification',2000);
								}
								else
								{
									scope.timeslots={};
									$.ajax({
											url: "/ayushman/callslotsforclinic/getslotsfordate?clinic_id="+$('#clinicid').val()+"&date="+scope.selected,
											success: function( data )
											{
												
												scope.timeslots=JSON.parse(data);
												if(scope.timeslots.length == 0){
													showNotification('300','20','Save data','Slots are not available for the selected date','notification','timernotification',2000);
												}
												scope.$apply();
												scope.seltime=-1;
											},
											error:function(data){
												showNotification('300','20','Save data','Slots are not available for the selected date','notification','timernotification',2000);
											}
									});
								}
							}							
							
                        };
						

                        scope.next = function() {
                            var next = scope.month.clone();
                            _removeTime(next.month(next.month()+1).date(1));
                            scope.month.month(scope.month.month()+1);
                            _buildMonth(scope, next, scope.month);
                        };

                        scope.previous = function() {
                            var previous = scope.month.clone();
                            _removeTime(previous.month(previous.month()-1).date(1));
                            scope.month.month(scope.month.month()-1);
                            _buildMonth(scope, previous, scope.month);
                        };
                    }
                };

                function _removeTime(date) {
                    return date.day(0).hour(0).minute(0).second(0).millisecond(0);
                }

                function _buildMonth(scope, start, month) {
                    scope.weeks = [];
                    var done = false, date = start.clone(), monthIndex = date.month(), count = 0;
                    while (!done) {
                        scope.weeks.push({ days: _buildWeek(date.clone(), month) });
                        date.add(1, "w");
                        done = count++ > 2 && monthIndex !== date.month();
                        monthIndex = date.month();
                    }
                }

                function _buildWeek(date, month) {
                    var days = [];
                    for (var i = 0; i < 7; i++) {
                        days.push({
                            name: date.format("dd").substring(0, 1),
                            number: date.date(),
                            isCurrentMonth: date.month() === month.month(),
                            isToday: date.isSame(new Date(), "day"),
                            date: date
                        });
                        date = date.clone();
                        date.add(1, "d");
                    }
                    return days;
                }
		}).directive('bookingfollowup',function() {
	return {
		templateUrl: '/ayushman/assets/app/partials/bookingfollowup.html',
	};
});