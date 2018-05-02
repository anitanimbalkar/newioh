

<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='/ayushman/assets/js/date.js'></script>
<script type='text/javascript' src='/ayushman/assets/js/fullcalendar/fullcalendar.min.js'></script>


<style type="text/css">
	body {
		margin-top: 20px;
		text-align: center;
		font-size: 12px;
		font-family: "tahoma;
		}
.fc-button-content {
    padding: 2px;
}
	#doccalendar {
		width: 700px;
		margin: 0 auto;
		}
	.fc-header-title h2 {
    font-size: .9em;
    white-space: normal !important;
}
fc-grid .fc-event-time {
    font-weight: normal;
}
.fc-event {
    border-style: solid;
    cursor: default;
    font-size: 0.65em;
}
.fc-view-agendaWeek .fc-event-hori {
    font-size: 0.65em;
    overflow: hidden;
    width: 2px !important;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
eventdata = new Array();
eventdata =$.parseJSON('<?= json_encode($slotsarray) ?>');

var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
	$('#doccalendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			 height: 500,
			firstDay :1,
			
			disableDragging:true,			
			disableResizing:true,
			timeFormat: 'H:mm{ - H:mm}' ,
			
			events: eventdata
	});
	stdate =  "<?=$startdate;?>";
	stdate = stdate.split("-");
	gotocaldate = new Date(stdate[0],(stdate[1]-1),stdate[2] );
	
	$('#doccalendar').fullCalendar('gotoDate', gotocaldate);
});
function gotosetschedule()
{
	window.location= "/ayushman/cdoctorscheduleviewer/view";
}
</script>

<div style="width:100%;font-family:Verdana;overflow-y:auto; ">
<table>

<tr><td>
	<div id="doccalendar"></div>
</td> </tr>
</table>
</div>
