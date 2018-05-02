
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/style.css' />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/mdp.css' />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/pepper-ginder-custom.css' />
<link rel='stylesheet' type='text/css' href='/ayushman/assets/css/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='/ayushman/assets/js/date.js'></script>
<script type='text/javascript' src='/ayushman/assets/js/timeslotcomponent.js'></script>
<script type='text/javascript' src='/ayushman/assets/js/jquery-ui.multidatespicker.js'></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>

<style type="text/css">
<!--
.ui-datepicker {
	z-index: 9999 !important;
}
.myPosition {
    position: absolute;
    right: 200px;
	top:200px;
	
}
.table_Border{
background-color:#f2efef;
border:1px solid #909090;
-moz-border-radius:4px;
-webkit-border-radius:4px;
-opera-border-radius:4px;
-khtml-border-radius:4px;
border-radius:4px;
}
.LeftMenu_textStyle{
font-family:Arial, Helvetica, sans-serif;
font-size:9pt;
color:#000000;
line-height:10px;
text-align:left;
padding-left:0px;
}

.ui-widget{
	font-size:10pt;
}

.style2 {color: #000000}
.style3 {color: #333333}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style10 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	font-weight: bold;
	color: #034F73;
}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style13 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #666666; }
.style15 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; }
.style16 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; }
.style18 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #034F73; }

 
.ui-widget-header { color: #000000;   font-weight: bold;background:none repeat scroll 0 0 #CCCCCC}

-->
</style>

<script type="text/javascript">
var ev;
var start;
var end;
var slots;
var mondaycalendar;
var tuesdaycalendar;
var wednesdaycalendar;
var thursdaycalendar;
var fridaycalendar;
var saturdaycalendar;
var sundaycalendar;
var daynm;
var appstartegy;
var dates;
var shortvisit;
$(function(){
	var today = new Date();
	var disableddate = new Array();
	
	disableddate=[];
	//disableddate=[today.getMonth()+"/"+today.getDate()+"/"+today.getYear()];
		
		$("#calendarrestricteddates").multiDatesPicker({
		minDate: 0,
		onSelect: function(dateText, inst) {
		//alert(dateText + "& "+new Date(dateText));
			if(disableddate.indexOf(dateText) != '-1' )
			{
				disableddate.splice(disableddate.indexOf(dateText),1);	
			}
			else					
				disableddate.push(dateText);
			refreshcalendar(disableddate);
		}
	});
	$('#calendarindicator').multiDatesPicker({	
	minDate: 0
	});
});
function refreshcalendar(disableddate)
{
	
	$('#calendarindicator').multiDatesPicker({
	addDisabledDates: disableddate,
	minDate: 0
	});
	
}
$(document).ready(function() {
	var lblrecurrence = new LiveValidation('lblrecurrence',{validMessage:' ',onInvalid:function(){this.insertMessage( this.createMessageSpan() ); this.addFieldClass();var val = $(this.element).val(); $(this.element).val(val.replace(/[^0-9a-zA-Z \s]+/g, ''));}});
	lblrecurrence.add( Validate.Format, { pattern: /^[0-9a-zA-Z ]+$/,failureMessage: "Alphanumeric only" } );

//allow to enter only int values
	$("#shortvisit").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
	
    });

	if($("#shortvisit").val()== "" ||$("#shortvisit").val()== null)
	{
		$("#btnsaveas").attr('disabled',true);
		$("#dialogaddslots").dialog('close');
		$("#schedulecal :input").attr('disabled',true);
		
	}

currdate =new Date();
$("#Fromdate").datepicker({ changeMonth: true,changeYear: true,  dateFormat: 'dd-M-yy' ,minDate: 0});
$("#Todate").datepicker({ changeMonth: true,changeYear: true,  dateFormat: 'dd-M-yy',minDate: 0 });
$( "#Fromdate" ).datepicker("setDate", currdate);
$( "#Todate" ).datepicker("setDate",'+7');
	$('#dialogschedulenmrepeat').dialog({
		autoOpen: false,
		draggable: false,
		modal: true,
		title: 'Schedule  name already exists',
		width:'250',
		height:'200',
		fontsize:'10px',
		position:['middle',450],
		buttons: {
				"Ok": function () {$(this).dialog('close');	}
			}
	});
	$('#dialogsaveschedule').dialog({
			autoOpen: false,
			draggable: false,
			modal: true,
			title: 'Schedule Overlap',
			width:'500',
			height:'400',
			fontsize:'10px',
			position:['middle',200],
			buttons: {
				"Retain Appointments": function () {	
				appstartegy = $("input:radio[name=rbappointmentstrategy]:checked").val();
				dates = $('#calendarrestricteddates').multiDatesPicker('getDates');	
				$('html, body').css("cursor", "wait");
						daysdata = {
							"monday": getEventDetails(mondaycalendar,"monday" ),
							"tuesday":getEventDetails(tuesdaycalendar,"tuesday" ),
							"wednesday":getEventDetails(wednesdaycalendar,"wednesday" ),
							"thursday":getEventDetails(thursdaycalendar,"thursday" ),
							"friday":getEventDetails(fridaycalendar,"friday" ),
							"saturday":getEventDetails(saturdaycalendar,"saturday" ),
							"sunday":getEventDetails(sundaycalendar,"sunday" ),
							"calid":"<?= $doccalid?>",
							"docid":"<?= $docid?>",
							"shortvisit":$("#shortvisit").val(),
							"longvisit":$("#longvisit").val(),
							"chargetype" :trim($("#ddchargetype").val()),
							"appstartegy":appstartegy,
							"blockval":$("#blockofpat").val(),
							"startdate":$("#Fromdate").val(),
							"enddate":$("#Todate").val(),
							"schedulename":$("#lblrecurrence").val(), 
							"restricteddates":dates.join(",") 
						}
						
						$.post('/ayushman/cdoctorscheduler/retainapps', daysdata, function(data){
							$('html, body').css("cursor", "auto");
							$(this).dialog('close');
							window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>";
						});
					/*
					$.ajax({
						type: "POST", 
						proccessData: false, 
						dataType: "application/json",
						url: "/ayushman/cdoctorscheduler/retainapps?startdate="+$("#Fromdate").val()+ "&enddate="+$("#Todate").val()+"&calid="+"<?= $doccalid?>"+"&docid=<?= $docid?>"+"&shortvisit="+$("#shortvisit").val()+"&longvisit="+$("#longvisit").val()+"&chargetype=" +trim($("#ddchargetype").val())+ "&appstartegy="+appstartegy+"&blockval="+$("#blockofpat").val()+"&schedulename="+$("#lblrecurrence").val() +"&restricteddates="+dates.join(",") +"&monday="+getEventDetails(mondaycalendar,"monday" )+"&tuesday="+getEventDetails(tuesdaycalendar,"tuesday" )+"&wednesday="+getEventDetails(wednesdaycalendar,"wednesday" )+"&thursday="+getEventDetails(thursdaycalendar,"thursday" )+"&friday="+getEventDetails(fridaycalendar,"friday" )+"&saturday="+getEventDetails(saturdaycalendar,"saturday" )+"&sunday="+getEventDetails(sundaycalendar,"sunday" ) ,
						success:function(data){
						$('html, body').css("cursor", "auto");
							$(this).dialog('close');
							window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>";
							
						}
					});
					*/					
				},
				"Cancel Appointments": function () {
				appstartegy = $("input:radio[name=rbappointmentstrategy]:checked").val();
				dates = $('#calendarrestricteddates').multiDatesPicker('getDates');	
				$('html, body').css("cursor", "wait");
					daysdata = {
							"monday": getEventDetails(mondaycalendar,"monday" ),
							"tuesday":getEventDetails(tuesdaycalendar,"tuesday" ),
							"wednesday":getEventDetails(wednesdaycalendar,"wednesday" ),
							"thursday":getEventDetails(thursdaycalendar,"thursday" ),
							"friday":getEventDetails(fridaycalendar,"friday" ),
							"saturday":getEventDetails(saturdaycalendar,"saturday" ),
							"sunday":getEventDetails(sundaycalendar,"sunday" ),
							"calid":"<?= $doccalid?>",
							"docid":"<?= $docid?>",
							"shortvisit":$("#shortvisit").val(),
							"longvisit":$("#longvisit").val(),
							"chargetype" :trim($("#ddchargetype").val()),
							"appstartegy":appstartegy,
							"blockval":$("#blockofpat").val(),
							"startdate":$("#Fromdate").val(),
							"enddate":$("#Todate").val(),
							"schedulename":$("#lblrecurrence").val(), 
							"restricteddates":dates.join(",") 
						}
						
						$.post('/ayushman/cdoctorscheduler/cancelapps', daysdata, function(data){
							$('#dialogsaveschedule').dialog('close');
							if(data >0 )
							{							
								$('html, body').css("cursor", "auto");
								showMessage('300','100','Appoinment Cancelled',"Selected appoinemnets has been canceled and mail is sent to respective patients regarding cancelation of appointment." ,'information','appcancel');	
								window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>";						
							}
						});
				/*
					$.ajax({
						type: "POST", 
						proccessData: false, 
						dataType: "application/json",
						url: "/ayushman/cdoctorscheduler/cancelapps?startdate="+$("#Fromdate").val()+ "&enddate="+$("#Todate").val()+"&calid="+"<?= $doccalid?>"+"&docid=<?= $docid?>"+"&shortvisit="+$("#shortvisit").val()+"&longvisit="+$("#longvisit").val()+"&chargetype=" +trim($("#ddchargetype").val())+ "&appstartegy="+appstartegy+"&blockval="+$("#blockofpat").val()+"&schedulename="+$("#lblrecurrence").val() +"&restricteddates="+dates.join(",") +"&monday="+getEventDetails(mondaycalendar,"monday" )+"&tuesday="+getEventDetails(tuesdaycalendar,"tuesday" )+"&wednesday="+getEventDetails(wednesdaycalendar,"wednesday" )+"&thursday="+getEventDetails(thursdaycalendar,"thursday" )+"&friday="+getEventDetails(fridaycalendar,"friday" )+"&saturday="+getEventDetails(saturdaycalendar,"saturday" )+"&sunday="+getEventDetails(sundaycalendar,"sunday" ) ,
						success:function(data){
							$('#dialogsaveschedule').dialog('close');
							if(data >0 )
							{							
								$('html, body').css("cursor", "auto");
								showMessage('300','100','Appoinment Cancelled',"Selected appoinemnets has been canceled and mail is sent to respective patients regarding cancelation of appointment." ,'information','appcancel');	
								window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>";						
							}
						}
					});
					*/
				},
				"Cancel": function () {
					$(this).dialog('close');
				}
			}
	});
	$('#dialogaddslots').dialog({
			autoOpen: false,
			draggable: false,
			modal: true,
			title: 'Add Slots',
			width:'500',
			height:'200',
			fontsize:'10px',
			position:['middle',200],
			buttons: {
				"Ok": function () {	
							
					daynm = getSelectedTabIndex();					
					time = $("#endtime").val();
					time = time.split(":");
					hour = time[0];
					minute = time[1];
					var end1 = addHours(end, (hour- end.getHours() ),(minute -end.getMinutes() )) ;
					time = $("#starttime").val();
					time = time.split(":");
					hour = time[0];
					minute = time[1];
					var start1 = addHours(start, (hour- start.getHours() ),(minute -start.getMinutes() )) ;
					
					if(start1 >= end1 )	
					{
						alert("Start time should not be less than or equal to End time");
					}
					else
					{						
						if(daynm=="monday")
							mondaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="tuesday")
							tuesdaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="wednesday")
							wednesdaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="thursday")
							thursdaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="friday")
							fridaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="saturday")
							saturdaycalendar.fullCalendar( 'select', start, end1, false );
						else if(daynm=="sunday")
							sundaycalendar.fullCalendar( 'select', start, end1, false );					
						generateslots(daynm+"_"+trim($("#ddchargetype").val())+"_"+trim($("#ddmode").val())  ,slots,start,end1,"inner"+daynm+"slots");
					}
					$(this).dialog('close');
				},

				"Cancel": function () {
					$(this).dialog('close');
				}
			}
		});
		var date = new Date();
		
		mondaycalendar = $('#monday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			
			select: function(start, end, allDay,jsEvent) {	
			
			var title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title) {
					mondaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				mondaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');				
				deleteconfirm = confirm("Do you want to delete this slot ?");				
				if(deleteconfirm)
				{
					mondaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "monday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
					//monday_Standard_Online10:30_12:0
				}	       		
    		}
		});

		tuesdaycalendar = $('#tuesday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title) {
					tuesdaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				tuesdaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					tuesdaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "tuesday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		wednesdaycalendar = $('#wednesday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title) {
					wednesdaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				wednesdaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					wednesdaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "wednesday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		thursdaycalendar = $('#thursday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title) {
					thursdaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				thursdaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					thursdaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "thursday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		fridaycalendar = $('#friday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title){
					fridaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				fridaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					fridaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "friday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		saturdaycalendar = $('#saturday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title){
					saturdaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				saturdaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					saturdaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime = showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "saturday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		sundaycalendar = $('#sunday').fullCalendar({
			height: 500,
			disableDragging:true,			
			disableResizing:true,
			selectable: true,
			selectHelper: false,
			select: function(start, end, allDay) {
			title= $("#ddchargetype").val()+" & "+$("#ddmode").val() ;
				if (title) {
					
					sundaycalendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				sundaycalendar.fullCalendar('unselect');
			},
			editable: true,
			eventClick: function(calEvent, jsEvent, view) {	
				$(this).css('border-color', 'red');
				deleteconfirm = confirm("Do you want to delete this slot ?");
				if(deleteconfirm)
				{
					sundaycalendar.fullCalendar( 'removeEvents',function(event) {
					return calEvent._id == event._id;
					});
					title = calEvent.title;
					title = title.split("&");					
					sttime =showpropertime(calEvent.start.getHours())+":"+showpropertime(calEvent.start.getMinutes());
					edtime = showpropertime(calEvent.end.getHours())+":"+showpropertime(calEvent.end.getMinutes());
					label = "sunday"+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
					deleterespectiveslots(label);
				}	       		
    		}
		});
		
	$( "#daystabs" ).tabs();
});

function isOverlapping(calendar, event){
    var array = calendar.fullCalendar('clientEvents');
	//dump(event);
    for(i in array){
	//dump(array[i] );
        if(array[i].id != event.id){
            if(!(array[i].start >= event.end || array[i].end <= event.start)){
                return true;
            }
        }
    }
    return false;
}
function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}
function getSelectedTabIndex() { 
	var $tabs = $("#daystabs").tabs();
    $tabIndex =$tabs.tabs('option', 'selected');
	var $selected = $("#daystabs ul>li a").eq($tabIndex).attr('href');
    if ($selected.toLowerCase().indexOf("#") >= 0)
		$selected = $selected.toLowerCase().replace("#",'');
    return $selected;
}
function setLongvisist(text)
{
	var textval = $(text).val();
	if(textval <= 30 )
	{
		$("#longvisit").find('option').remove().end();
		for(i =1;i<=10;i++)
		{
			$("#longvisit").append("<option value=\""+(textval*i) +"\" >"+textval*i+"</option>");
		}	
		setblockvalues($("#longvisit"))	;
		deleteallsetcalendar();
		if($("#shortvisit").val()== "" ||$("#shortvisit").val()== null)
		{
			showMessage('300','100','Enter Average Visit Time',"Please enter Avg / Follow up visit time, then creating slots will be enabled..." ,'information','enableSlots');
			$("#dialogaddslots").dialog('close');
			$("#schedulecal :input").attr('disabled',false);
			
		}
		else
		{
			$("#schedulecal :input").attr('disabled',false);
			$("#btnsaveas").attr('disabled',false);
		}
	}
	else
	{
		alert("Short visit duration should be less than 30 mins");
		$(text).val("");
		$("#longvisit").find('option').remove().end();
		$("#blockofpat").find('option').remove().end();
	}
	
}
function setblockvalues(dropdown)
{
	ddval = $(dropdown).val();
	textval=$("#shortvisit").val();
	$("#blockofpat").find('option').remove().end();
	for(i =(ddval/textval);i<=((ddval/textval)+10);i++)
	{
		$("#blockofpat").append("<option value=\""+(textval*i) +"\" >"+textval*i+"</option>");
	}	
	deleteallsetcalendar();
	
}
	
	
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

    // or, if you wanted to avoid alerts...

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre)
}

function setstartendtime(starttime,endtime,ev)
{ 
	ev = ev;
	start = starttime;
	end = endtime;	
	var sttime = starttime.getHours();
	var edtime = endtime.getHours();
	starttime = showpropertime(starttime.getHours())+":"+showpropertime(starttime.getMinutes());
	endtime = showpropertime(endtime.getHours())+":"+showpropertime(endtime.getMinutes());
	$("#starttime").find('option').remove().end();
	$("#endtime").find('option').remove().end();
	
	for(i = sttime,k=sttime,j=0;i<=sttime+12;i++,j++,k++)
	{	
		if(j<=11)
		{
			if(i>12)
			{
				i=i-12;	
				if(k>23)
					k=k-23				
			}		
			if(j==0)
			{	
				ar = starttime.split(':');
				if((ar[1]=='00'))
				{
					$("#starttime").append("<option value=\" "+(k) +":00\" >"+i+":00</option>");
					$("#starttime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
				}
				else
					$("#starttime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
			}
			else
			{
				
				$("#starttime").append("<option value=\" "+(k) +":00\" >"+i+":00</option>");
				$("#starttime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
			}
		}
		
	}	
	for(i =edtime,k=edtime,j=0;i<=edtime+12;i++,j++,k++)
	{	
		if(j<=11)
		{
			if(i>12)
			{
				i=i-12;	
				if(k>23)
					k=k-23
			}
			if(j==0)
			{
				ar = endtime.split(':');
				if((ar[1]=='00'))
				{
					$("#endtime").append("<option value=\" "+(k) +":00\" >"+i+":00</option>");
					$("#endtime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
				}
				else
					$("#endtime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
			}
			else
			{
				$("#endtime").append("<option value=\" "+(k) +":00\" >"+i+":00</option>");
				$("#endtime").append("<option value=\" "+(k) +":30\" >"+i+":30</option>");
			}
		}
	}
	$("#starttime").val(starttime);
	$("#endtime").val(endtime);	
	//if(!(isOverlapping(mondaycalendar,ev)) );
	if($("#shortvisit").val()== "" ||$("#shortvisit").val()== null)
	{
		showMessage('300','100','Enter Average Visit Time',"Please enter Avg / Follow up visit time, then creating slots will be enabled..." ,'information','enableSlots');
		$("#dialogaddslots").dialog('close');
		$("#schedulecal :input").attr('disabled',true);
		$("#btnsaveas").attr('disabled',true);
	}
	else
	{
		$("#dialogaddslots").dialog('open');
		$("#schedulecal :input").attr('disabled',false);
		$("#btnsaveas").attr('disabled',false);
		$("#btnsaveas").attr('disabled',false);
	}
	countnoofslots();
}

function addHours(d,n,m)
{
	d.setHours(d.getHours() + n);
	d.setMinutes(d.getMinutes() + m);
	return d;
}
function showpropertime(curr_min)
{

		curr_min = curr_min + "";		
		if (curr_min.length == 1)
	    {
	   		curr_min = "0" + curr_min;
	    }
		return curr_min;
}

function countnoofslots()
{
	shortvisit = $("#shortvisit").val();
	
	sttime = Date.parse($("#starttime").val(), "hh:mm");
	edtime = Date.parse($("#endtime").val(), "hh:mm");
	var tstarttime = sttime.getTime();
	var tendtime = edtime.getTime();
	diff = (tendtime-tstarttime)/(1000*60);
	slots =  Math.floor( diff / ($("#shortvisit").val()));
	$("#lblnoofslots").text(slots);
}

function generateslots(label,noofslots,starttime, endtime,target)
{
	var div;
	var sttime = showpropertime(starttime.getHours())+":"+showpropertime(starttime.getMinutes());
	var edtime = showpropertime(endtime.getHours())+":"+showpropertime(endtime.getMinutes());
	var slotstarttime = starttime; k=0;
	var duration = 0;var duration1=0;
	appstartegy = $("input:radio[name=rbappointmentstrategy]:checked").val();
	var blockofpatient = ((endtime-starttime)/60000)/$("#blockofpat").val();
	//var shortvisittime =(parseInt($("#shortvisit").val()));
	
	if(appstartegy == 'blockslot' )
	{		
		for(var i=0;i<Math.ceil(blockofpatient) ;i++) 
		{
			d = addHours(slotstarttime,0,parseInt(duration) );
			duration1 = duration1+duration;
			for(var j=0;j<($("#blockofpat").val()/(parseInt($("#shortvisit").val())));j++ )	
			{				
				if(k== noofslots )
					break;				
				var time =showpropertime(d.getHours())+":"+showpropertime(d.getMinutes());
			div =div+("<div style='margin-left:5px;margin-right:5px;margin-top:2px;margin-bottom:2px;width:70px;height:20px;display: inline-block;'><input type='checkbox' />&nbsp;<div style='border:none;border-bottom:1px solid black;width:40px;height:15px;float:right;vertical-align:top;'>"+time+"</div></div>");
					
				k++;
			}
			duration = parseInt( $("#blockofpat").val());			
						
		}
		d = addHours(slotstarttime,0,(-duration1 ) );
	}
	else
	{
		for(var i=0;i<noofslots;i++)
		{
			if(i==0)
				d = addHours(slotstarttime,0,0);
			else
				d = addHours(slotstarttime,0,(parseInt($("#shortvisit").val())));
				
			var time =showpropertime( d.getHours())+":"+showpropertime(d.getMinutes());
			div =div+("<div style='margin-left:5px;margin-right:5px;margin-top:2px;margin-bottom:2px;width:70px;height:20px;display: inline-block;'><input type='checkbox' />&nbsp;<div style='border:none;border-bottom:1px solid black;width:40px;height:15px;float:right;vertical-align:top;'>"+time+"</div></div>");
		}	
		d = addHours(slotstarttime,0,(parseInt($("#shortvisit").val())));
		d = addHours(slotstarttime,0,(-((parseInt($("#shortvisit").val()))*parseInt(noofslots) )) );
	}	
	//alert(label+sttime+"_"+edtime);
	$("<div style='border:none;border-bottom:1px dotted black' id='"+label+sttime+"_"+edtime +"'/>").appendTo( $("#"+target));
	$(div).appendTo($('#'+jqSelector(label+sttime+"_"+edtime)));
	
}

function jqSelector(str)
{
	return str.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g, '\\$1');
}
function deleterespectiveslots(label)
{
	$('#'+jqSelector(label)).remove();
}
function deleteslots(button)
{
	arrchildren = ($(button).parent().prev().children());	
	arselected = new Array();
	for(i=0;i<arrchildren.length;i++)
	{
		arselected =  $("#"+jqSelector(arrchildren[i].id )).find("input:checked");
		for(j=0;j<arselected.length;j++)
		{			
			$(arselected[j]).parent().remove() ;						
		}
		arrparentdiv =  $(arrchildren[i]).children();		
		if($(arrchildren[i]).children().length == 0 )
			$(arrchildren[i]).remove();
	}
	checkbox = $(button).prev();
	$(checkbox).attr('checked',false);
}
function clearallcalendar()
{
	$("#shortvisit").val("");
	$("#ddschedules").val("");
	
	$("#longvisit").find('option').remove().end();
	$("#blockofpat").find('option').remove().end();
	deleteallsetcalendar();
}
function deleteallsetcalendar()
{	
	$("#lblselectedcal").text("");
	$('#daystabs').tabs("option","disabled",[]);
	$('.fc-event-inner fc-event-skin').remove();
	
	$("#daystabs").tabs('option', 'selected', 1);
	tuesdaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 2);
	wednesdaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 3);
	thursdaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 4);
	fridaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 5);
	saturdaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 6);
	sundaycalendar.fullCalendar('removeEvents');
	$("#daystabs").tabs('option', 'selected', 0);
	$(mondaycalendar).fullCalendar('removeEvents');
	
	$("#innertuesdayslots").children("div").remove() ;
	$("#innerwednesdayslots").children("div").remove() ;
	$("#innerthursdayslots").children("div").remove() ;
	$("#innerfridayslots").children("div").remove() ;
	$("#innersaturdayslots").children("div").remove() ;
	$("#innersundayslots").children("div").remove() ;
	$("#innermondayslots").children("div").remove() ;
}
function clearcalendar()
{
	deleteallsetcalendar();
}
function selectallslots(checkbox)
{
	if(checkbox.checked)
	{
		innerdaydiv = $(checkbox).parent().prev();
		$(innerdaydiv).find(':checkbox').attr('checked','checked');		 
	}
	else
	{
		innerdaydiv = $(checkbox).parent().prev();
		$(innerdaydiv).find(':checkbox').attr('checked',false);
	}
}
function getEvents()
{		
	if($("#lblrecurrence").val()== "" ||$("#lblrecurrence").val()== null || $("#Fromdate").val()=="" || $("#Todate").val()=="" )
	{			
		showMessage('300','100','Fill Mandatory Fields',"- Recurrence label<br />- Recurrence start date<br />- Recurrence end date<br />are mandatory fields." ,'error','mandatory');
	}
	else
	{	
		availableschedule= $("#availableschedule").val();
		if (availableschedule.toLowerCase().indexOf($("#lblrecurrence").val().toLowerCase()) >= 0)
		{				
			$("#dialogschedulenmrepeat").html("Schedule has been already set with <b><u>" +$("#lblrecurrence").val()+"</u></b> name please change Schedule name and save." );
			$("#dialogschedulenmrepeat").dialog("open");
		}
		else
		{
			$.ajax({
				type: "POST", 
				url: "/ayushman/cdoctorscheduler/checkscheduleavailability?startdate="+$("#Fromdate").val()+ "&enddate="+$("#Todate").val()+"&calid="+"<?= $doccalid?>" ,
				success:function(data){
				
				if( ($.parseJSON( data).length) >0 )
				{
					ardocoverlappingapps = new Array();
					ardocoverlappingapps = $.parseJSON( data);
					var st="<ol>";
					for(i=0;i<ardocoverlappingapps.length;i++ )
					{
						st = st+ "<li>"+"<b>"+ardocoverlappingapps[i].ptname+"</b> at " +ardocoverlappingapps[i].scheduledstarttime_c+"</li>";			
					}
					st=st+"</ol>"
				
					$('#dialogsaveschedule').html("Schedule has been already set for selected recurrence start = "+$("#Fromdate").val()+" and end date="+$("#Todate").val()+" range.Following are the list of appointments in this period. <br/>"+st+"<br/> To retain these appointments and overwrite previous schedule for selected time press <b>Retain Appointments</b> <br/>To overwrite previous schedule and cancel these appoitnments press <b>Cancel Appointments</b> <br/> Or select different start and end time period so that it should not overlap existing set schedule press <b>Cancel</b>");
					$('#dialogsaveschedule').dialog('open');
				
				}
				else
					saverecurrence();
				
				}			
			});
		}		
	}
}
var oldscheduleid;
function Confirmation_Event(id,confirmation)
{
	if(id == 'ovelappid')
	{
		if(confirmation == 'yes')
		{
			saverecurrence(oldscheduleid);
		}
	}
//	if(id=='appcancel' )
	{
		//if(confirmation == 'yes')
		{
			window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>";
		}
	}
}
function saverecurrence()
{
	appstartegy = $("input:radio[name=rbappointmentstrategy]:checked").val();
	var dates = $('#calendarrestricteddates').multiDatesPicker('getDates');	
	
	daysdata = {
		"monday": getEventDetails(mondaycalendar,"monday" ),
		"tuesday":getEventDetails(tuesdaycalendar,"tuesday" ),
		"wednesday":getEventDetails(wednesdaycalendar,"wednesday" ),
		"thursday":getEventDetails(thursdaycalendar,"thursday" ),
		"friday":getEventDetails(fridaycalendar,"friday" ),
		"saturday":getEventDetails(saturdaycalendar,"saturday" ),
		"sunday":getEventDetails(sundaycalendar,"sunday" ),
		"calid":"<?= $doccalid?>",
		"docid":"<?= $docid?>",
		"shortvisit":$("#shortvisit").val(),
		"longvisit":$("#longvisit").val(),
		"chargetype" :trim($("#ddchargetype").val()),
		"appstartegy":appstartegy,
		"blockval":$("#blockofpat").val(),
		"startdate":$("#Fromdate").val(),
		"enddate":$("#Todate").val(),
		"schedulename":$("#lblrecurrence").val(), 
		"restricteddates":dates.join(",") 
	}
	
	$.post('/ayushman/cdoctorscheduler/saveschedule', daysdata, function(data){
		window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>&scheduleid="+data;
	});
	/*
	$.ajax({  
		type: "POST", 
		proccessData: false, 
		dataType: "application/json",
		url: "/ayushman/cdoctorscheduler/saveschedule?calid="+"<?= $doccalid?>"+"&docid=<?= $docid?>"+"&shortvisit="+$("#shortvisit").val()+"&longvisit="+$("#longvisit").val()+"&chargetype=" +trim($("#ddchargetype").val())+ "&appstartegy="+appstartegy+"&blockval="+$("#blockofpat").val()+"&startdate="+$("#Fromdate").val()+ "&enddate="+$("#Todate").val()+"&schedulename="+$("#lblrecurrence").val() +"&restricteddates="+dates.join(",") +"&monday="+getEventDetails(mondaycalendar,"monday" )+"&tuesday="+getEventDetails(tuesdaycalendar,"tuesday" )+"&wednesday="+getEventDetails(wednesdaycalendar,"wednesday" )+"&thursday="+getEventDetails(thursdaycalendar,"thursday" )+"&friday="+getEventDetails(fridaycalendar,"friday" )+"&saturday="+getEventDetails(saturdaycalendar,"saturday" )+"&sunday="+getEventDetails(sundaycalendar,"sunday" ) ,  
		success:function(data){
			window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>&scheduleid="+data;
		}		
	});
	*/
}
function getEventDetails(calendar,day)
{
	var eventdata = new Array();
	eventdata =(calendar.fullCalendar('clientEvents'));		
	var data = new Array;
	var daydata = new Array();
	var k=0;var y=0;
	for(i=0;i<eventdata.length;i++)
	{
		var title = eventdata[i] .title;
		title = title.split("&");					
		var sttime = showpropertime(eventdata[i].start.getHours())+":"+showpropertime(eventdata[i].start.getMinutes());
		var edtime = showpropertime(eventdata[i].end.getHours())+":"+showpropertime(eventdata[i].end.getMinutes());
		var label = day+"_"+trim(title[0])+"_"+trim(title[1]) +sttime+"_"+edtime;
		divchildren = $('#'+jqSelector(label)).children() ;
		x=0;
		slots = new Array();
		
		for(j=0;j<divchildren.length;j++ )
		{
			slots[x] = new Array();
			$(divchildren[j]).each(function(index) {
			   slots[x] = trim($(this).text());
			  
			});
			x++;			
		}
		
		data[k] =new Array;			
		data[k][0] = sttime ;
		data[k][1] = edtime ;
		data[k][2] = title[0];
		data[k][3] = title[1];
		data[k][4] = slots;	
		daydata[y]=new Array() ;
		daydata[y]=data;
		k++;y++;
	}	
	return  JSON.stringify(data);
}
function showcalendar()
{
	window.location="/ayushman/cdoctorscheduleviewer/showschedule?calid="+"<?= $doccalid?>&scheduleid="+$("#ddschedules").val() ;	
}

function copyfrom(button)
{
	
	var copytocalendar,copyfromcalendar;
	copyfromdaynm = ($(button).parent().prev().children(0).val());	
	appytocal = getSelectedTabIndex();
	if(copyfromdaynm != "" )
	{
		if(appytocal=="monday")
			copytocalendar = mondaycalendar;
		else if(appytocal=="tuesday")
			copytocalendar = tuesdaycalendar;
		else if(appytocal=="wednesday")
			copytocalendar = wednesdaycalendar;		
		else if(appytocal=="thursday")
			copytocalendar = thursdaycalendar;
		else if(appytocal=="friday")
			copytocalendar = fridaycalendar;
		else if(appytocal=="saturday")
			copytocalendar = saturdaycalendar;
		else if(appytocal=="sunday")
			copytocalendar = sundaycalendar;
		
		if(copyfromdaynm=="monday")
			eventdata = getEventDetailsforCopy(mondaycalendar,"monday",copytocalendar,appytocal );
		else if(copyfromdaynm=="tuesday")
			eventdata = getEventDetailsforCopy(tuesdaycalendar,"tuesday",copytocalendar,appytocal );
		else if(copyfromdaynm=="wednesday")
			eventdata = getEventDetailsforCopy(wednesdaycalendar,"wednesday" ,copytocalendar,appytocal);
		else if(copyfromdaynm=="thursday")
			eventdata = getEventDetailsforCopy(thursdaycalendar,"thursday",copytocalendar,appytocal );
		else if(copyfromdaynm=="friday")
			eventdata = getEventDetailsforCopy(fridaycalendar,"friday" ,copytocalendar,appytocal);
		else if(copyfromdaynm=="saturday")
			eventdata = getEventDetailsforCopy(saturdaycalendar,"saturday",copytocalendar,appytocal );
		else if(copyfromdaynm=="sunday")
			eventdata = getEventDetailsforCopy(sundaycalendar,"sunday",copytocalendar,appytocal );
	}
}
function getEventDetailsforCopy(calendar,day,copytocalendar,appytocal)
{
	var eventdata = new Array();
	eventdata =(calendar.fullCalendar('clientEvents'));	
	eventdtls = new Array();
	data = new Array();
	
	eventarray = new Array();
	for(i=0;i<eventdata.length;i++)
	{		
		eventdtls = eventdata[i];
		eventdtls.id = eventdata[i]._id+"_"+eventdata[i].title+"_"+day;
		eventdtls.title=eventdata[i].title;
		eventdtls.start=eventdata[i].start;
		eventdtls.end=eventdata[i].end;
		eventdtls.allDay=false;		
		data[i]=eventdtls;
		//dump(data[i] );
	}
	//dump(data);
	shortvisit = $("#shortvisit").val();
	copytocalendar.fullCalendar('removeEvents');	
	$("#inner"+appytocal+"slots").children("div").remove() ;
	
	$(copytocalendar).fullCalendar('addEventSource',data );	
	for(m=0;m<data.length;m++)
	{	
		//$(copytocalendar).fullCalendar( 'select', data[m].start, data[m].end, false );		
		var title = data[m].title;
		title = title.split("&");					
		var sttime = showpropertime(data[m].start.getHours())+":"+showpropertime(data[m].start.getMinutes());
		var edtime = showpropertime(data[m].end.getHours())+":"+showpropertime(data[m].end.getMinutes());
		var label = appytocal+"_"+trim(title[0])+"_"+trim(title[1]);	
		
		var tstarttime = data[m].start.getTime();
		var tendtime = data[m].end.getTime();
		diff = (tendtime-tstarttime)/(1000*60);
		slots =  Math.floor( diff / ($("#shortvisit").val()));
		generateslots(label ,slots ,data[m].start,data[m].end,"inner"+appytocal+"slots");
	}
	
}
function populatedaysfromdb()
{
	selectedschedule =  $("#ddschedules option:selected").text();
	$('html, body').css("cursor", "wait");
	$.ajax({  
		type: "POST", 
		url:"/ayushman/cdoctorscheduler/getschedulefromdb?calid="+"<?= $doccalid?>&schedulenm="+selectedschedule,
		success:function(data){		
			filldatafromdb(eval('(' + (data)+ ')') );
			$('html, body').css("cursor", "auto");
		}
	});	
}
//fetch data from db and fill schedule page
function filldatafromdb(scheduled_data)
{	
	scheduledata = scheduled_data.scheduldatafromdb;
	for(var i=0;i<scheduledata.length;i++ )
	{			
		if(i==0)
		{			
			$("#shortvisit").val(scheduledata[i].shortvisit );
			setLongvisist($("#shortvisit"));
			setblockvalues($('#longvisit'));
			
			$('#longvisit option[value='+trim((scheduledata[i].longvisit))+']').attr('selected',true);			
			$('#blockofpat option[value='+trim((scheduledata[i].blockofminutes))+']').attr('selected',true);
			$("input:radio[name=rbappointmentstrategy][value="+scheduledata[i].appstrategytype +"]").attr('checked', true);
		}
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		daynm = scheduledata[i].day;
		data =new Array();
		
		$("#inner"+daynm.toLowerCase()+"slots").children("div").remove() ;
		for(j=0;j<(scheduledata[i].slotdtls).length;j++ )
		{			
			div="";
			eventdtls = new Object();
			eventdata = (scheduledata[i].slotdtls [j]);			
			eventdtls.id = j+"_"+eventdata.charge+"_"+eventdata.mode+"_"+eventdata.day;
			eventdtls.title=eventdata.charge+" & "+eventdata.mode;
			start = eventdata.slotstart.split(":");
			eventdtls.start= new Date( y,m,d, start[0],start[1] );
			end = eventdata.slotend.split(":");
			eventdtls.end= new Date( y,m,d, end[0],end[1] );
			eventdtls.allDay=false;	
			
			data[j]=eventdtls;
			slots = eventdata.slots.split("," );
			//dump(data[j] );
			for(k=0;k< (slots).length;k++)
			{
				div =div+("<div style='margin-left:5px;margin-right:5px;margin-top:2px;margin-bottom:2px;width:70px;height:20px;display: inline-block;'><input type='checkbox' />&nbsp;<div style='border:none;border-bottom:1px solid black;width:40px;height:15px;float:right;vertical-align:top;'>"+slots[k]+"</div></div>");
			}
			id = daynm.toLowerCase() +"_"+eventdata.charge+"_" +eventdata.mode+eventdata.slotstart+"_"+eventdata.slotend;
			
			$("<div style='border:none;border-bottom:1px dotted black' id='"+id+ "'/>").appendTo( $("#inner"+daynm.toLowerCase()+"slots"));
			$(div).appendTo($('#'+jqSelector(id)));
		}
				
		$('#daystabs').tabs("option","disabled",[]);
		if(daynm == "Monday")
		{
			$("#daystabs").tabs('option', 'selected', 0);
			
			mondaycalendar.fullCalendar('removeEvents');
			$(mondaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Tuesday" )
		{
			$("#daystabs").tabs('option', 'selected', 1);
			tuesdaycalendar.fullCalendar('removeEvents');
			$(tuesdaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Wednesday" )
		{
			$("#daystabs").tabs('option', 'selected', 2);
			wednesdaycalendar.fullCalendar('removeEvents');
			$(wednesdaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Thursday" )
		{
			$("#daystabs").tabs('option', 'selected', 3);
			thursdaycalendar.fullCalendar('removeEvents');
			$(thursdaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Friday" )
		{
			$("#daystabs").tabs('option', 'selected', 4);
			fridaycalendar.fullCalendar('removeEvents');
			$(fridaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Saturday" )
		{
			$("#daystabs").tabs('option', 'selected', 5);
			saturdaycalendar.fullCalendar('removeEvents');
			$(saturdaycalendar).fullCalendar('addEventSource',data );	
		}
		else if(daynm == "Sunday" )
		{
			$("#daystabs").tabs('option', 'selected', 6);
			sundaycalendar.fullCalendar('removeEvents');
			$(sundaycalendar).fullCalendar('addEventSource',data );	
		}		
		
	}
	$("#lblselectedcal").text("You are viewing calendar from, "+ scheduled_data.calstart +" to "+ scheduled_data.calend);
}
function Oeventdata(id,title,start,end,allDay)
{
this.id=id;
this.start=start;
this.end=end;
this.allDay=allDay;
this.title=title;
}
function enableblockdd(toggle)
{
	clearcalendar();
	
}
$(function(){
	$("input:radio[name=rbappointmentstrategy][value=fixedslot]").click(function() {
       $("#blockofpat").attr('disabled', true);  
    });
	$("input:radio[name=rbappointmentstrategy][value=blockslot]").click(function() {
       $("#blockofpat").attr('disabled', false);  
    });
});
</script>

<div style="width:810px; height:920px; overflow-y:auto;"  >
<table width="810" border="0" align="center" cellpadding="0" cellspacing="0">
    
	<tr>
       <td width="800" colspan="1"><table width="810" cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>          
          <td width="218" height="4"></td>
        </tr>
      </tbody></table></td>
    </tr>
	<tr>
     <td align="left" valign="top" ><table width="800" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="1">
		<table width="800" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
				<td >&nbsp;</td> 
              	<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Set Schedule </td>
            </tr>
          </table></td>
          </tr>
		        <tr>
          <td colspan="1" align="left" valign="top"><table width="780" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td colspan="3" align="left" valign="top" style="padding-top:7px; padding-bottom:7px;padding-left:5px; ">
			  <table width="520" height="35" border="0" cellpadding="0" cellspacing="0" class="table_Border">
                <tr>
                  <td height="35"><table width="520" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="110">
					  	
					  	<select id="ddschedules" style="margin-right:5px;" >
							  <option value="" selected="" >Select Schedule</option>
								<?PHP  
									$availableschedule ="";
									foreach ($schedules as $key=> $s) { 										
										print "<option  \" value=\"{$key}\">{$s}</option>";
										$availableschedule = $availableschedule.",". $s;
									} 
								?>
								
						</select>
						<input  type="hidden" id="availableschedule" value ="<?php echo $availableschedule ?>" />
					  </td>
                      <td width="131" class="style18">                       	
							<input name="button" type="button" class="button" onclick="populatedaysfromdb()" value="View Calendar" align="center" width="28%" valign="middle">
							</td>
                      <td>&nbsp;</td>
                      <td width="110" class="LeftMenu_textStyle"><a href="#" class="style19"  onClick="showcalendar()" style="text-decoration:underline; color:#0000CC">Compact View</a></td>
                      <td width="42" align="center" valign="middle" onclick="clearallcalendar()" class="button">Clear</td>
                      <td width="15">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
				<tr>
				<td><label id="lblselectedcal" class="style10" style="display:block; " ></label> </td>
				</tr>
              </table></td>
			  <td width="13" rowspan="2"></td>
			  <td width="241" rowspan="2" align="center" valign="top" style="padding-top:7px;">
			  	<div id="calendarindicator"></div></td>
            </tr>
            <tr>
              <td width="255" align="left" valign="top" style="padding-top:7px; padding-bottom:7px;padding-left:5px; "><table width="250" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td align="left" valign="middle" class="search_Bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td width="4%">&nbsp;</td>
                            <td height="27" class="style10">Average Consultation Time</td>
                          </tr>
                          <tr>
                            <td height="27">&nbsp;</td>
                            <td class="style18">Avg / Follow Up Visit 	      :
                                <input name="text" type="text" id="shortvisit" style="width:30px;border:none; border-bottom:1px solid;background-color:transparent;border-color:#034F73; " onChange="setLongvisist(this)">
                              min</td>
                          </tr>
                          <tr>
                            <td height="27">&nbsp;</td>
                            <td class="style18"> First Time / Long Visit  :
                                <select name="select2" id="longvisit" onChange="setblockvalues(this)">
                                </select>
                              min</td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
              <td width="18">&nbsp;</td>
              <td width="257" align="left" valign="top" style="padding-top:7px;"><table width="250" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td align="left" valign="middle" class="search_Bg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td width="1%"></td>
                            <td width="96%" height="27" class="style10">Appointment Strategy</td>
                          </tr>
                          <tr>
                            <td height="27">&nbsp;</td>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr>
                                    <td width="10%"><input onChange="clearcalendar()" name="rbappointmentstrategy" type="radio" value="fixedslot" disabled></td>
                                    <td width="90%" class="style18">Fixed slot for each Patient</td>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="27">&nbsp;</td>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr>
                                    <td width="10%"><input onChange="enableblockdd(this)" name="rbappointmentstrategy" type="radio" checked value="blockslot"></td>
                                    <td width="90%" class="style18">Block of Patients every  :
                                      <select name="select" id="blockofpat" onChange="clearcalendar()">
                                        </select>
                                      min</td>
                                  </tr>
                                </tbody>
                            </table></td>
                          </tr>
                        </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td colspan="5"></td>
              </tr>
          </tbody></table></td>
        </tr>       
        
        <tr>
          <td colspan="1"><table width="100%;height:auto;" border="0" cellspacing="0" cellpadding="0">
            <tr>
              	<td colspan="5">
			  		<div id="schedulecal" style="height:100%;">
						<div id="daystabs" style="float:left;vertical-align:top;height:auto;width:825px;position:relative;overflow-y:auto;background:transparent;border:none;">
							<ul class="tabholder" style="background-color:none;background:none;border:none;">		
								<li class="TopBtn_bg"><a href="#Monday" >Monday</a></li>
								<li class="TopBtn_bg"><a href="#Tuesday">Tuesday</a></li>
								<li class="TopBtn_bg"><a href="#Wednesday">Wednesday</a></li>
								<li class="TopBtn_bg"><a href="#Thursday">Thursday</a></li>	
								<li class="TopBtn_bg"><a href="#Friday">Friday</a></li>	
								<li class="TopBtn_bg"><a href="#Saturday">Saturday</a></li>	
								<li class="TopBtn_bg"><a href="#Sunday">Sunday</a></li>	
								<li class="TopBtn_bg"><a href="#Restricteddates">Restricted Dates</a></li>	
							</ul>
							<div id="Monday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">								
									<div id="monday" style="height:100%;width:98%;" >
									</div>
								</td>								
								<td  width="450px" height="100%" valign="top" style="float:left;">
								<table width="100%"><tr><td>	
									<div style="font-family:Arial,Helvetica,sans-serif;font-size:8pt;">
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select >
											<option value="" ></option>
											<option value="tuesday" >Tuesday</option>
											<option value="wednesday" >Wednesday</option>
											<option value="thursday" >Thursday</option>
											<option value="friday" >Friday</option>
											<option value="saturday" >Saturday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									 <tr><td>
									<div id="mondayslots" style="height:450px;overflow-y:auto;width:94%;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innermondayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
								</td></tr></table>							
								</td></tr></table>							
							</div>
							<div id="Tuesday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">								
									<div id="tuesday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
								<table width="100%"><tr><td>
									<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select style="font-family:Arial;font-size:10pt;">
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="wednesday" >Wednesday</option>
											<option value="thursday" >Thursday</option>
											<option value="friday" >Friday</option>
											<option value="saturday" >Saturday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									 <tr><td>
									<div id="tuesdayslots" style="height:450px;overflow-y:auto;width:94%;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innertuesdayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
								</td></tr></table>	
								</td></tr></table>	
							</div>
							<div id="Wednesday" style="height:auto;padding-left:2px;padding-top:2px;">	
								<table width="100%"><tr><td width="40%">									
									<div id="wednesday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
								<table width="100%"><tr><td>
									<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select value="Copy" style="font-family:Arial;font-size:10pt;" > >
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="tuesday" >Tuesday</option>											
											<option value="thursday" >Thursday</option>
											<option value="friday" >Friday</option>
											<option value="saturday" >Saturday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									 <tr><td>
									<div id="wednesdayslots" style="height:450px;overflow-y:auto;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innerwednesdayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
								</td></tr> </table>
								</td></tr></table>	
							</div>
							<div id="Thursday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">									
									<div id="thursday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
								<table width="100%"><tr><td>
									<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select value="Copy" style="font-family:Arial;font-size:10pt;" > >
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="tuesday" >Tuesday</option>											
											<option value="wednesday" >Wednesday</option>
											<option value="friday" >Friday</option>
											<option value="saturday" >Saturday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									 <tr><td>
									<div id="thursdayslots" style="height:450px;overflow-y:auto;border:1px solid #909090;border-radius:4px; font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innerthursdayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
								</td></tr> </table>
								</td></tr></table>	
							</div>
							<div id="Friday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">								
									<div id="friday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
									<table width="100%"><tr><td>
									<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select value="Copy" style="font-family:Arial;font-size:10pt;" > >
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="tuesday" >Tuesday</option>											
											<option value="wednesday" >Wednesday</option>
											<option value="thursday" >Thursday</option>
											<option value="saturday" >Saturday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									 <tr><td>
									<div id="fridayslots" style="height:450px;overflow-y:auto;width:94%;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innerfridayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
									 </td></tr> </table>
								</td></tr></table>	
							</div>
							<div id="Saturday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">								
									<div id="saturday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
									<table width="100%"><tr><td>
										<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select value="Copy" style="font-family:Arial;font-size:10pt;" > >
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="tuesday" >Tuesday</option>											
											<option value="wednesday" >Wednesday</option>
											<option value="thursday" >Thursday</option>
											<option value="friday" >Friday</option>
											<option value="sunday" >Sunday</option>
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									 </td></tr>
									 <tr><td>
									<div id="saturdayslots" style="height:450px;overflow-y:auto; width:94%;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innersaturdayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
									 </td></tr> </table>
								</td></tr></table>	
							</div>
							<div id="Sunday" style="height:auto;padding-left:2px;padding-top:2px;">
								<table width="100%"><tr><td width="40%">
									<div id="sunday" style="height:100%;width:98%;" >
									</div>
								</td>
								<td  width="450px" height="100%" valign="top" style="float:left;">
								<table width="100%"><tr><td width="100%">
									<div>
									<table><tr><td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Copy schedule from : </td>
										<td><select value="Copy" style="font-family:Arial;font-size:10pt;" > >
											<option value="" ></option>
											<option value="monday" >Monday</option>
											<option value="tuesday" >Tuesday</option>											
											<option value="wednesday" >Wednesday</option>
											<option value="thursday" >Thursday</option>
											<option value="friday" >Friday</option>
											<option value="saturday" >Saturday</option>
											
										</select></td>
										<td><input type="button" class="button" value="Copy" style="font-family:Arial;font-size:10pt;" onclick="copyfrom(this)"/> </td>
									</tr> </table>
									</div>
									</td></tr>
									<tr><td>
									<div id="sundayslots" style="height:450px;overflow-y:auto;width:94%;border:1px solid #909090;border-radius:4px;font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
										<div id="innersundayslots" style="height:auto;display: block; clear: both;"></div>
										<div style="margin:5px;">
											<input type="checkbox" id="selectall" onchange="selectallslots(this)"/>&nbsp;&nbsp;&nbsp;Select All Slots
											<input  type="button" value="Delete Marked Items" onclick="deleteslots(this)"/>
										</div>
									</div>
									</td> </tr> </table>
								</td></tr></table>	
							</div>	
							<div id="Restricteddates" style="height:auto;padding-left:2px;padding-top:2px;">	
								<div id="restricteddates" style="height:100%;" >
									<div id="calendarrestricteddates"></div>
								</div>
							</div>
						</div>
					</div>
			  	</td>
            </tr>
            
           
          </table></td>
        </tr>
	   <tr>
          <td style="padding-left:5px;"><table width="700" height="35" border="0" cellpadding="0" cellspacing="0" class="table_Border">
            <tr>
              <td height="35">
			  <table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="11">&nbsp;</td>
                    <td width="127" align="left" valign="middle" class="style10">Repeat Schedule : </td>
                    <td width="38" align="left" valign="middle" class="LeftMenu_textStyle" >From</td>
                    <td width="69"><input id="Fromdate" type="text"  size="8"></input></td>
                    <td width="43" align="center" valign="middle" class="LeftMenu_textStyle" style="padding-left:10px;">To</td>
                    <td width="104" align="left" valign="middle">
					<input id="Todate" type="text" size="11"/></td>
                    <td width="62" class="LeftMenu_textStyle">Save as </td>
                    <td width="170" class="LeftMenu_textStyle">
					<input id="lblrecurrence" type="text" size="8"></input>
					</td>
                    <td width="65">
					<input type="button" id="btnsaveas" width="28%" align="center" valign="middle" class="button" onClick="getEvents() " value="Save" disabled="disabled" />                        </td>
                    <td width="11" class="LeftMenu_textStyle">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td width="23%">&nbsp;</td>
          <td width="28%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
        </tr>
      </table>
      </td>      
    </tr>   
  </table>
  <div id="dialogschedulenmrepeat" >
  </div>
  <div id="dialogsaveschedule" title="Save Schedule">
	<div id="existapps"></div>
	<div id="cancelapps" ></div>
	<div></div>
</div>
<div id="dialogaddslots" title="Add Slots"  style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
 <table style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">
	<tr >
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Charge Type : </td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;"><select id="ddchargetype">
			<option value="Standard" >Standard</option>
			<option value="Premium" >Premium</option>
			<option value="Concessional" >Concessional Rate</option>
			<option value="Free" >Free</option>
		</select> </td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Mode / Location : </td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;"><select id="ddmode">
			<option value="Online" >Online</option>			
			<option value="In-Clinic">In-Clinic</option>			
			<option value="both">Both</option>			
		</select> </td>
	</tr>
	<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">Working Hours : </td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;"><select id="starttime" onchange="countnoofslots()">						
		</select>&nbsp;&nbsp;-&nbsp;&nbsp;
		<select id="endtime" onchange="countnoofslots()">				
		</select>
		</td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;">No. Of Slots: </td>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:9pt;"><u><label id="lblnoofslots" ></label> </u></td>
	</tr>
 </table>
</div>
  
</div>
