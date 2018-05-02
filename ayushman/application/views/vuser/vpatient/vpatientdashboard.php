<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
<!-- START: css for using footable instead of jqgrid -->
<link href="/ayushman/assets/cssF/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.bootstrap.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/cssF/footable.bootstrap.min.css">
<script>
	// Added for mobile changes
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('html, body').animate({ scrollTop: 0 }, 1000);
			$('body').addClass('apply-modal-body')
		});
	});
</script>

<script>	
	function onlinestatusnameformatter(cellvalue, options, rowObject )
	{
		/*var druserid =$(rowObject).children()[11].firstChild.data;
		var doctorMobileNumber;
		if($(rowObject).children()[9].firstChild != null) 
		 	if($(rowObject).children()[9].firstChild.data != "")
				doctorMobileNumber= $(rowObject).children()[9].firstChild.data;
			else
				doctorMobileNumber= "No Information Provided.";
		else
			doctorMobileNumber= "No Information Provided.";
		*/
		// Above commented and changed for mobile changes
		var druserid = cellvalue;
		var drname = "";
		var doctorMobileNumber = "No Information Provided.";
		
		for(var index =0; index < options.rows.length;index++){
            if(options.rows[index].druserid_c==cellvalue){
                drname =options.rows[index].docnm;
				if ((options.rows[index].doctornumber != "") ||(options.rows[index].doctornumber != null))
					doctorMobileNumber= options.rows[index].doctornumber;
				else
					doctorMobileNumber = "No Information Provided.";
            }
        }		
		return '<image id="img_presence_'+druserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<span title="Mobile - '+doctorMobileNumber+'">'+drname+'</span>';		
	}
	function actionFormatter(cellvalue, options, rowObject )
	{
		//var appointment_id =$(rowObject).children()[0].firstChild.data;
		//if($(rowObject).children()[8].firstChild.data == "Online")
		// Commented and below changes for mobile view
		for(var index =0; index < options.rows.length;index++){
            if(options.rows[index].id==cellvalue){
                var appointment_id=options.rows[index].id;
				var patient_id = options.rows[index].userid;
                var statusflag=options.rows[index].mode;
            }
        }
		var username= "<?php echo $obj_user->Firstname_c; ?>";
		if(statusflag == "Online")
			return '<a href="/ayushman/cemrdashboard/view?appid='+appointment_id+'&role=pat&name='+username+'" title="Consult" >Consult</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" onclick="cancelappointment('+appointment_id+')" title="Cancel"  >Cancel</a>&nbsp;&nbsp;|&nbsp;&nbsp<a href="#" onclick="rescheduleappointment('+patient_id+','+appointment_id+')" title="Reschedule">Reschedule</a>';
		else
			return '<a href="#" onclick="cancelappointment('+appointment_id+')" title="Cancel"  >Cancel</a>&nbsp;&nbsp;|&nbsp;&nbsp<a href="#" onclick="rescheduleappointment('+patient_id+','+appointment_id+')" title="Reschedule">Reschedule</a>';
	}
	function rescheduleappointment(patient_id,appointment_id){
		document.getElementById("editappid").value = appointment_id ;
		document.getElementById("editpatientid").value = patient_id ;
		showMessage('250','50','Cancel Appointment','Do you really want to reschedule appointment?','confirmation','rescheduleappointmentpopup');
	}
	function cancelappointment(appointment_id){
		document.getElementById("editappid").value = appointment_id ;
		showMessage('250','50','Cancel Appointment','Do you really want to cancel appointment?','confirmation','cancelappointmentpopup');
	}
	function Confirmation_Event(id,confirmation)
	{
		var appointment_id = document.getElementById("editappid").value;
		var patient_id = document.getElementById("editpatientid").value;
		if(id == 'cancelappointmentpopup')
		{
			if(confirmation == 'yes')
			{	
				document.body.style.cursor='wait';
				parent.document.getElementById("icontent").src= '/ayushman/cappointmenteditor/cancelappointment?appid='+appointment_id+'&role=patient&representative=' ;
			}
		}
		if(id== 'rescheduleappointmentpopup')
		{
			if(confirmation == 'yes')
			{	
				document.body.style.cursor='wait';
				//parent.document.getElementById("icontent").src= '/ayushman/cappointmenteditor/rescheduleappointment?appid='+appointment_id+'&role=patient&representative=' ;
				parent.document.getElementById("icontent").src= '/ayushman/cpatienthistorybookapp/view?patientid='+patient_id+'&reschedule_appid='+appointment_id ;
			}
		}
	}
	
</script>
 <style>

a:link {
    color: blue;
}

a:visited {
    color: blue;
}

a:hover {
    color: hotpink;
}

a:active {
    color: red;
}
</style>
<table  width="100%">
	<tr  class="visible-xs" style="width:100%;">
		<td style="width:100%;" class="Heading_Bg">
			 <div >
                  <img src="/ayushman/assets/images/WhiteArrow_Icon.png"  height="7"/>
				  <strong>&nbsp;&nbsp;Upcoming Appointments</strong>
            </div>			
		</td>
	</tr>
</table>
    
<input type="hidden" id="editappid" name="editappid" value=""/>
<input type="hidden" id="editpatientid" name="editpatientid" value=""/>
<div class="demo-container hide-footable-sorting">
		<div class="tab-content">

			<div>
				<div class="tab-pane active" id="demo">
					<table id ="DTUpcomingAppointment" data-paging-size="10" data-paging-limit="" class="table" data-sorting="true" data-paging="true"></table>
				</div>
			</div>
		</div>
</div>

<script type="text/javascript">
	var $j = $.noConflict(true);
</script>
<script src="/ayushman/assets/jsF/jquery.min.js"></script>
<script src="/ayushman/assets/jsF/jquery-ui.js"></script>
<!-- Add in FooTable itself -->

<script src="/ayushman/assets/jsF/footable.core.min.js"></script>
<script src="/ayushman/assets/jsF/footable.core.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.min.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.min.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.min.js"></script>
<script type="text/javascript">
	jQuery.browser = {};
	(function () {
		jQuery.browser.msie = false;
		jQuery.browser.version = 0;
		if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
			jQuery.browser.msie = true;
			jQuery.browser.version = RegExp.$1;
		}
	})();
</script>
<!-- Initialize FooTable -->
<?php $result_json = json_encode($result); ?>
<script>
	// All jqgrid columns defined here and data selected in controller in an array
	
	jQuery(function($){
		$('#DTUpcomingAppointment').footable({

		"columns" :[{"name":"id","hidden":true,"visible":false},
					{"name":"userid","hidden":true,"visible":false},
					{"name":"refappwithid_c","hidden":true,"visible":false},
					{"name":"dateandtime_dateformate","width":0,"align":"left","hidden":true,"visible":false},
					{"title":"Date & Time","name":"DateAndTime","width":5,"align":"left","sortable":false},
					{"title":"Suggested by","name":"druserid_c","width":15,"formatter":onlinestatusnameformatter,"sortable":false},
					{"title":"Service Name","name":"incidentsname_c","width":20,"editable":true,"breakpoints":"xs","sortable":false},
					{"title":"Place","name":"Place","width":5,"align":"left","breakpoints":"xs","sortable":false},
					{"title":"Mode","name":"mode","width":5,"hidden":true,"visible":false,"align":"left","breakpoints":"xs","sortable":false},
					{"title":"doctornumber","name":"doctornumber","align":"left","hidden":true,"visible":false,"sortable":false},
					{"title":"Action","name":"id","width":25,"align":"left","formatter":actionFormatter,"align":"left","breakpoints":"xs","sortable":false},
					{"title":"Status","name":"id","align":"center","hidden":true,"visible":false,"sortable":false},],
			"rows":<?php echo $result_json ?>				
		});
	});
</script>
