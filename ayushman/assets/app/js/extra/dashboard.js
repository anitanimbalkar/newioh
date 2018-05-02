	var	cancelAppId = '';
	function cancelappointment(appointment_id){
		cancelAppId = appointment_id ;
		showMessage('250','50','Cancel Appointment','Do you really want to cancel appointment?','confirmation','cancelappointmentpopup');
	}
	var Confirmation_Event = function(id,confirmation){
		var appointment_id = cancelAppId;
		if(id == 'cancelappointmentpopup')
		{
			if(confirmation == 'yes')
			{
				angular.element($('#contentDiv')).scope().openDialog('/ayushman/cappointmenteditor/cancelappointment?appid='+appointment_id+'&role=doctor&representative=',800,800,this );
			}
		}
	};
	
	function fancyboxclosed(obj){
		angular.element($('#contentDiv')).scope().reloadRoute();
	}

