

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

	#doccalendar {
		width: 800px;
		margin: 0 auto;
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

<div style="width:820px;height:990px;font-family:Verdana;overflow-y:auto; ">
<table>
<tr><td>
	<input type="button" value="Back" style="width:120;height:25px;margin-top:5px; margin-bottom:10px;margin-left:4px;float:left;" title="Go to Set Schedule page" onclick="gotosetschedule()" class="button"/>
</td> </tr>
<tr><td>
	<div id="doccalendar"></div>
</td> </tr>
</table>
</div>
