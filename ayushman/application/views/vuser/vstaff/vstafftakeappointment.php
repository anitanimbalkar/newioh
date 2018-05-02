<html>
<head>
<title>Take Appointments...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script type='text/javascript' src='/ayushman/assets/js/jquery-ui.multidatespicker.js'></script>
<style type="text/css">
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled {
opacity: 0.35;
text-decoration: line-through;
}
.chkslot
{
	
}
.textarea{
	background-color:#f1f1f1;
	border:none;
	height:20px;	 
	border-bottom:1px solid;
	padding-left:5px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	font-color: #999999;
	color:#333333;
}
.watermark {
       color: #A0A0A0;
        font-color: #A0A0A0;
       font-style: italic;
       font-weight:normal;
       text-align:center;
}
</style>
<script type="text/javascript">
	function showcalendar()
	{
		$("#appdetails").hide ();	
		$('#iframedoccalendar').attr('src', '/ayushman/cdoctorscheduleviewer/showschedule?calid=<?= $doccalid?>&viewer=patient')
		$('#viewdoccalendar').dialog("open");
	}
	function refreshdata()
	{
		fetchfees();
		var date = "";
		if(document.getElementById("selecteddate").value == "")
		{
			date =  new Date();
			dateinstance.selectedYear 	= 1900+date.getYear()
			dateinstance.selectedMonth	= date.getMonth() + 1;
			dateinstance.selectedDay	= date.getDate();
			createSlots(dateinstance);
		}
		else{
			date = new Date(document.getElementById("selecteddate").value);
			dateinstance.selectedYear 	= 1900+date.getYear()
			dateinstance.selectedMonth	= date.getMonth();
			dateinstance.selectedDay	= date.getDate();
			createSlots(dateinstance);
		}
	}

	var dateinstance = {
				selectedYear 	: "",
				selectedMonth	: "",
				selectedDay		: ""
			};
	function saveAppointment()
	{
		 var value = 1;
		$('html, body').css("cursor", "wait");
		var slots = document.getElementById("slots");
		
		var slottimes = slots.getElementsByTagName("input");
		selectedtimes=""
		for(var i=0;i<slottimes.length;i++)
		{
			if(slottimes[i].checked)
			{
				
				if(selectedtimes != "")
					selectedtimes = selectedtimes+","+document.getElementById("selecteddate").value +' ' +slottimes[i].value;
				else
					selectedtimes = document.getElementById("selecteddate").value +' ' + slottimes[i].value;
			}
				
		}
	
		var selecteddates 	= selectedtimes.split(",");
	
		var incidenceid		="";
		incidencename 		= "";
		//$('#slots').empty();
	
		if($('#ddvisittype').val()=='New' )
		{
			incidencename 	= document.getElementById('Incidenttxt').value;
		}		
		else
		{
			incidenceid 	= document.getElementById('incidentcombo').value;
		}
			
		if(incidenceid == "" && incidencename=="")
		{
			alert("select incidence and try again");
			$('html, body').css("cursor", "auto");
		}		
		else
		{
			if(selecteddates.length >= 1)
			{
				if(selecteddates[0] == "" )
				{
					alert("Please select appointment time");
					$('html, body').css("cursor", "auto");
				}					
				else
				{
					var currentlocation = escape(window.location);
					$.ajax({
						  url: '/ayushman/ctakeappointment/saveappointment?id=<?php echo $doctorid; ?>&type='+document.getElementById('slottype').value+'&mode='+getselectedmode()+'&dates='+JSON.stringify(selecteddates)+'&incidenceid='+incidenceid+'&incidencename='+incidencename+'&paymentmode='+value+"&noofslots="+$("#noofslots").val()+"&longvisit="+longvisit+"&shortvisitduration="+$("#shortvisitduration").val()+"&rescheduledappid=<?= $rescheduledappid;?>&blockslotduration="+$("#blockslotduration").val()+"&appstrategytype="+$("#appstrategytype").val()+"&currentlocation="+currentlocation+"&representative=staff&patId="+<?php echo $patId; ?> ,
						  success: function( data ) {
								if(data == 'insufficientbalance')
									window.location= "/ayushman/crecharge/view?balance=insufficient";
								else
									window.location= "/ayushman/cfixedappwithdoc/fixedappointmet?doctorid=<?php echo $doctorid?>&appdate="+data+"&id=<?= $rescheduledappid;?>";
								$('html, body').css("cursor", "auto");
							},
							error : function(){showMessage('550','200','Creating slots',"Error occured while creating slots. - Could not respond to request - javascript error.",'error','id');}
					}); 
				}
				
			}
		}
		
	}

	function trim(str) {
	return str.replace(/^\s+|\s+$/g,"");
}
	function getselectedmode()
	{
		var modes = new Array('online','phone','In-Clinic','Online','Any');
		return modes[2];
	}
	function getbalance()
	{
		$.ajax({
		  url: "/ayushman/caccountmanager/getbalance",
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'error')
					showMessage('550','200','Retrieving plan',data['message'],data['type'],'id');
					
				else
				{
					data = data['data'];
					data = (JSON.parse(data));
					$("#lblbal").text(addCommas(data.netbalance_c)+".00");
				}	
				
			},
			error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve balance.",'error','id');}
		});
	}
	function fetchfees()
	{
		getbalance();
		if($("#slottype").val()== '4')
		{
			//lblvisitype,lblmode,lblplace,lblchargetype,lblbal,lblfees,lblayushmancharges,lbltotal
			$("#lbltotal").text("00.00");
			$("#lblayushmancharges").text("00.00");
			$("#lblfees").text("00.00");
		}
		else
		{
			$.ajax({
			  url: '/ayushman/cfeesmanager/get?doctorid=<?php echo $doctorid?>&status=active',
			  success: function( data ) {
					data =  JSON.parse(data);
					selectedmode = getselectedmode();
					if($('#ddvisittype').val() =='New' )
						longvisit="true";
					else
						longvisit = "false";
					
					if(selectedmode.toLowerCase() == 'online' || selectedmode.toLowerCase() == 'phone' ){
							$('#fees').empty();
							
							if(longvisit == 'true')
							{
								$('<strong> '+JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['firsttime']+'</strong>').appendTo($("#fees"));	
								$("#lblfees").text(JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['firsttime']);
							}								
							else
							{								
								$('<strong> '+JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['followup']+'</strong>').appendTo($("#fees"));
								$("#lblfees").text(JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['followup']);
							}
					}else if(selectedmode.toLowerCase() == 'in-clinic'){
							$('#fees').empty();
							if(longvisit == 'true')
							{
								$('<strong> '+JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['firsttimeinclinic']+'</strong>').appendTo($("#fees"));
								$("#lblfees").text(JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['followupinclinic']);
							}								
							else
							{
								$('<strong> '+JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['followupinclinic']+'</strong>').appendTo($("#fees"));
								$("#lblfees").text(JSON.parse(data['data'])[document.getElementById('slottype').value - 1]['followupinclinic']);
							}								
					}				
					$.ajax({
					url: "/ayushman/cpatientfavoritedoctor/getayushmancharges",
					success: function( data1 ) {
					 	
						data1 = (JSON.parse(data1));
						if($("#modetype").val().toLowerCase()=="online" )
							$("#lblayushmancharges").text(data1.online);
						else if($("#modetype").val().toLowerCase()=="in-clinic" )
							$("#lblayushmancharges").text(data1.inclinic);
						else if($("#modetype").val().toLowerCase()=="phone" )
							$("#lblayushmancharges").text(data1.phone);
						total = parseFloat($("#lblfees").text()) + parseFloat($("#lblayushmancharges").text());					
						
						$("#lbltotal").text(addCommas(total)+".00");
					},
					error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
				});
				},
				error : function(){showMessage('550','200','Retrieving plan',"Error occured while saving the plan. - Could not respond to request - javascript error.",'error','id');}
		});
		}
		
	}
	function restrictdates()
	{
		$.ajax({
			  url: '/ayushman/cpatientfavoritedoctor/getrestricteddates?id=<?php echo $doctorid; ?>',
			  success: function( data ) {
					disableddate =  JSON.parse(data);
					var disableddate = new Array();
					$('#doccalforpat').datepicker({
						addDisabledDates: disableddate,
						minDate: 0
					});
				},
				error : function(){showMessage('550','200','Creating slots',"Error occured while creating slots. - Could not respond to request - javascript error.",'error','id');}
		});
		
	}
	
	function rescheduleappdetails()
	{
		$.ajax({
			  url: '/ayushman/cpatientfavoritedoctor/rescheduleappointmentdtls?id=<?= $rescheduledappid;?>' ,
			  success: function( data ) {
					data =  JSON.parse(data);
					
					if(data.consultationmode == "online")
						$("input:radio[name=mode][value=online]").attr('checked', true);
					else if(data.consultationmode == "In-Clinic")
						$("input:radio[name=mode][value=inclinic]").attr('checked', true);
					
					
					$('#incidentcombo option[value='+data.incidentid+']').attr('selected','selected');
					$('#slottype option[value='+data.slottype+']').attr('selected','selected');
					
				},
				error : function(){}
			});
	}
	function createSlots(inst)
	{		
		$('.ui-state-default').removeClass('ui-state-highlight');
		$("#appdetails").hide ();	
		$('#slots').empty();
		if($('#ddvisittype').val() =='New' )
		{
			longvisit="true";
			 $("#incidentcombo").hide(); 
				 $("#Incidenttxt").show(); 
				 $("#incidentlbl").text("Enter Incident : "); 
				 $("#visittype").val("First-time Visit for new incidence"); 
				
		}		
		else
		{
			longvisit = "false";
			$("#Incidenttxt").hide();
			  $("#incidentcombo").show(); 
			   $("#incidentlbl").text("Select Incident : "); 
			    $("#visittype").val("Follow-up Visit for this incidence"); 
		}
		$.ajax({
			  url: '/ayushman/cpatientfavoritedoctor/getslots?id=<?php echo $doctorid; ?>&date='+inst.selectedYear+'-'+(inst.selectedMonth+1)+'-'+inst.selectedDay+'&type='+document.getElementById('slottype').value+'&mode='+getselectedmode()+"&longvisit="+longvisit+"&rescheduledappid=<?= $rescheduledappid?>" ,
			  success: function( data ) {
					data =  JSON.parse(data);
					$('#slots').empty();			
					$("#shortvisitduration").val(data.shortvisitduration);
					$("#longvisitduration").val(data.longvisitduration);
					$("#noofslots").val(data.noofslots);
					$("#blockslotduration").val(data.blockslotduration);
					$("#appstrategytype").val(data.appstrategytype);
					for(var i=0;i<data.slots.length; i++)
					{
						generateslots(data.slots[i]);
					}
					$('input:checkbox[name="slottime"]').change(function() {							
					    var group = "input:checkbox[name='"+$(this).attr("name")+"']";
					    $(group).attr("checked",false);
					    $(this).attr("checked",true);
							$("#appdetails").hide ();	
					});
					$('.ui-state-default').removeClass('ui-state-highlight');
					fetchfees();
				},
				error : function(){showMessage('550','200','Creating slots',"Error occured while creating slots. - Could not respond to request - javascript error.",'error','id');}
		});
		
	}
	$(document).ready(function(){		
		if("<?= $rescheduledappid?>" != "" )
			rescheduleappdetails();
		var target = document.getElementById("doccalforpat");
		$("#modetype").change(function () {
            refreshdata();
        });
		
		//restrictdates();
		$("#doccalforpat").datepicker({
			minDate: 0,
			width:600,
			onSelect: function(dateText, inst) {
				$("#appdetails").hide();
				document.getElementById("selecteddate").value = dateText;
				$('.ui-state-default').removeClass('ui-state-highlight');
				createSlots(inst);
			}
		});
		
		$('.ui-state-default').removeClass('ui-state-highlight');
			$('#viewdoccalendar').dialog({
				autoOpen: false,
				show: "blind",
				hide: "explode",
				modal: true,
				height: "700",
				resize: "auto",
				resizable: false,
				width: "800",
				position: "top",
				buttons: {
					"Close": function() {
						$(this).dialog("close");
					}
				}
			});
			setTimeout(function() {resize();},1250);
			refreshdata();
			
	});

	function dump(obj) {
		var out = '';
		for (var i in obj) {
			out += i + ": " + obj[i] + "\n";
		}
		alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}

	function generateslots(time)
	{
		div ="<div style='margin-left:2px;background-color:white;border:1px solid;margin-top:2px;margin-bottom:2px;width:70px;height:20px;display: inline-block;' class='style10 style16'><input type='checkbox' name='slottime' class='chkslot' value='"+time+"'/>&nbsp;<div style='border:none;width:40px;height:15px;float:right;vertical-align:top;padding-top:3px;'>"+time+"</div></div>";
		$(div).appendTo($('#slots'));
	}
	function isBlank(str) {
    return (!str || /^\s*$/.test(str))};
	addCommas = function(input){
  // If the regex doesn't match, `replace` returns the string unmodified
  return (input.toString()).replace(
    // Each parentheses group (or 'capture') in this regex becomes an argument 
    // to the function; in this case, every argument after 'match'
    /^([-+]?)(0?)(\d+)(.?)(\d+)$/g, function(match, sign, zeros, before, decimal, after) {

      // Less obtrusive than adding 'reverse' method on all strings
      var reverseString = function(string) { return string.split('').reverse().join(''); };

      // Insert commas every three characters from the right
      var insertCommas  = function(string) { 

        // Reverse, because it's easier to do things from the left
        var reversed           = reverseString(string);

        // Add commas every three characters
        var reversedWithCommas = reversed.match(/.{1,3}/g).join(',');

        // Reverse again (back to normal)
        return reverseString(reversedWithCommas);
      };

      // If there was no decimal, the last capture grabs the final digit, so
      // we have to put it back together with the 'before' substring
      return sign + (decimal ? insertCommas(before) + decimal + after : insertCommas(before + after));
    }
  );
};
	function setearliestapp()
	{	
		$("#appdetails").hide ();	
		$("#hdmode").val($("#modetype").val());
		if($('#ddvisittype').val() =='New' )
		{
			longvisit="true";
			 $("#incidentcombo").hide(); 
				 $("#Incidenttxt").show(); 
				 $("#incidentlbl").text("Enter Incident : "); 
				 $("#visittype").val("First-time Visit for new incidence"); 
				
		}		
		else
		{
			longvisit = "false";
			$("#Incidenttxt").hide();
			  $("#incidentcombo").show(); 
			   $("#incidentlbl").text("Select Incident : "); 
			    $("#visittype").val("Follow-up Visit for this incidence"); 
		}
		$('#slots').empty();
		$.ajax({
			  url: '/ayushman/cpatientfavoritedoctor/getearliestappointment?id=<?php echo $doctorid; ?>&type='+document.getElementById('slottype').value+'&mode='+getselectedmode()+"&longvisit="+longvisit,
			  success: function( earliestdata ) {
					if(earliestdata == 'notset')
					{
						jQuery("#doccal").dialog('option', 'position', [150,150]);
						showMessage('300','100','Dcotor Not Set Calendar',"Doctor has not yet set his calendar. Hence no appointment is available for this doctor." ,'information','doccal');	
						
					}
					else if (earliestdata == 'notfound')
					{
						jQuery("#appnotavailable").dialog('option', 'position', [150,150]);				
						showMessage('300','100','Appointment Not Available',"Unfortunately, doctor's calendar is full or has not set his calendar for Mode type <b><u> "+$("#modetype").val()+"</u></b> & Charge Type <b><u> "+ $("#slottype").find(":selected").text()+"</u></b>  mode. Kindly select Mode as 'Any' and Charge Type as 'Any' to get earliest appointment for Docto's availability." ,'information','appnotavailable');	
						
					}
					else{
						earliestdata =  JSON.parse(earliestdata);
						
						if(earliestdata.mode.toLowerCase() == "online" )
						{
							$("#modetype [value=Online]").attr('selected','selected');
						}							
						else if(earliestdata.mode.toLowerCase() == "in-clinic")
						{
							$("#modetype [value='In-Clinic']").attr('selected','selected');
						}	
						else if(earliestdata.mode.toLowerCase() == "both")					
						{
							if($("#hdmode").val().toLowerCase() =="any" || $("#hdmode").val().toLowerCase() =="online" )
								$("#modetype [value=Online]").attr('selected','selected');
							else if($("#hdmode").val().toLowerCase() =="in-clinic" )
								$("#modetype [value='In-Clinic']").attr('selected','selected');
						}
						if(earliestdata.chargetype== 'Standard')
							$('#slottype option[value="1"]').attr('selected','selected');
						else if(earliestdata.chargetype== 'Premium')
							$('#slottype option[value="2"]').attr('selected','selected');
						else if(earliestdata.chargetype== 'Concessional')
							$('#slottype option[value="3"]').attr('selected','selected');
						else if(earliestdata.chargetype== 'Free')
							$('#slottype option[value="4"]').attr('selected','selected');
						
						currdate =new Date(earliestdata.date);					
						$('#doccalforpat').datepicker("setDate", currdate);
						
						dateinstance.selectedYear 	= 1900+currdate.getYear()
						dateinstance.selectedMonth	= currdate.getMonth();
						dateinstance.selectedDay	= currdate.getDate();
						
						$('#slots').empty();
						
						date = (1900+ currdate.getYear())+'-'+(currdate.getMonth()+1)+'-'+currdate.getDate();
						$.ajax({
							  url: '/ayushman/cpatientfavoritedoctor/getslots?id=<?php echo $doctorid; ?>&date='+date+'&type='+document.getElementById('slottype').value+'&mode='+getselectedmode()+"&longvisit="+longvisit+"&rescheduledappid=<?= $rescheduledappid?>" ,
							  success: function( data ) {
									data =  JSON.parse(data);
									$('#slots').empty();			
									$("#shortvisitduration").val(data.shortvisitduration);
									$("#longvisitduration").val(data.longvisitduration);
									$("#noofslots").val(data.noofslots);
									$("#blockslotduration").val(data.blockslotduration);
									$("#appstrategytype").val(data.appstrategytype);
									for(var i=0;i<data.slots.length; i++)
									{
										generateslots(data.slots[i]);
									}
									$('input:checkbox[name="slottime"]').change(function() {							
									    var group = "input:checkbox[name='"+$(this).attr("name")+"']";
									    $(group).attr("checked",false);
									    $(this).attr("checked",true);
									});
									$('input:checkbox[name="slottime"][value= "'+earliestdata.time+'"] ').attr("checked",true);
									$("#lblvisitype").text($('#ddvisittype').val());
									$("#lblmode").text($("#modetype").val());
									$("#lblplace").text($("#ddplace").val() );
									document.getElementById("selecteddate").value = date;
									$("#lblapp").text((date+ " ,"+earliestdata.time ));
									$("#lblchargetype").text(earliestdata.chargetype);
									
									
									fetchfees();
									//lblvisitype,lblmode,lblplace,lblchargetype,lblbal,lblfees,lblayushmancharges,lbltotal
								},
								error : function(){showMessage('550','200','Creating slots',"Error occured while creating slots. - Could not respond to request - javascript error.",'error','id');}
						});
					}
					$('.ui-state-default').removeClass('ui-state-highlight');
				},
				error : function(){showMessage('550','200','Earliest appointment',"Error occured while getting earliest appointment details.",'error','id');}
		});
	}
	function showappdetails()
	{
		var slots = document.getElementById("slots");
		var slottimes = slots.getElementsByTagName("input");
		selectedtimes=""
		for(var i=0;i<slottimes.length;i++){
			if(slottimes[i].checked)
			{
				if(selectedtimes != "")
					selectedtimes = selectedtimes+','+slottimes[i].value;
				else
					selectedtimes = slottimes[i].value;
			}
		}
	
		selecteddate =document.getElementById("selecteddate").value;					
		var x = new Date(selecteddate);
		$('#doccalforpat').datepicker("setDate",x);
		date = selecteddate+', '+selectedtimes;
		$("#lblvisitype").text($('#ddvisittype').val());
		$("#lblmode").text("In-Clinic");
		$("#lblplace").text($("#ddplace").val() );
		$("#lblchargetype").text(document.getElementById('slottype').options[$('#slottype').val()-1].innerHTML);
		$("#lblapp").text(trim(date));
		$("#appdetails").show();	
	}
	function onrechargeclick()
	{
		window.location="/ayushman/crecharge/view"; 
	}
	function hideappdetail()
	{
		$("#appdetails").hide();
		$("#slots").empty();
	}
</script>
<style type="text/css">
.ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled { opacity: .35; filter:Alpha(Opacity=35); background-image: none;

text-decoration: line-through;
}
<!--
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
.style15 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: #034F73;
}
.style17 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #000000; }
.style19 {color: #8bb4c9}
.style20 {
	font-family: Tahoma;
	font-weight: bold;
	font-size: 12px;
}
.style21 {
	font-family: Tahoma;
	font-size: 12px;
}
.style16 {	font-size: 12px;
	color: #000000;
}
.bodytext_styleBlue{
	font-family:Tahoma;
	font-size:9pt;
	color:#034F73;
	font-weight:bold;
	line-height:17px;
	text-align:justify;
}
.text_style {
    color: #000000;
    font-family: Tahoma;
    font-size: 11px;
}

-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="wrapper" style="width:828px;border:none; height:620px; padding-left:0px;">
  <table style="width:100%; height:100%;" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left" valign="top" class="LeftMenu_BG"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="4">
		  <table border="0" valign="top" cellspacing="0" cellpadding="0" style="width:100%; height:auto;">
				<tr>
					<td width="228" colspan="6">
						<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;
									<?php 
										if( $rescheduledappid == "" ||  $rescheduledappid == NULL ) 
											echo "Take Appointments ".$doctornm ;
										else
											echo "Reschedule Appointments ".$doctornm ;
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>	
			</table>
		  </td>
          </tr>
         <tr>
          <td height="250" colspan="4" align="left" valign="top">
		  	<table width="750" border="0" cellspacing="0" cellpadding="0">            
            <tr>
              <td width="1%">&nbsp;</td>
              <td width="50%" colspan="2" style="padding-top:7px;">
			  	<table width="800" height="30" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="gradient_Bg" style="padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px;">
				  	<table width="780" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="84" height="30" class="style10" style="padding-left:10px;">Visit Type &nbsp;:</td>
                      <td width="104"><select name="select4" id="ddvisittype" onchange="hideappdetail()" style="height:20px; width:auto;">
                          <option selected>Follow Up</option>
                          <option>New</option>
                      </select></td>
                      <td width="48" class="style10">Mode&nbsp;:</td>
                      <td width="108">
		      <label>In-Clinic</label>
		      <input type="hidden" id="hdmode" value="In-Clinic"/>
		  </td>
                      <td width="48" class="style10">Place&nbsp;:</td>
                      <td class="style15">
					  	<select name="select" id="ddplace" onchange="hideappdetail()" style="height:20px; width:80px;">
                        	<option>Pune</option>
                        	<option>Mumbai</option>
                      	</select>
					  </td>
                      <td class="style15"><span class="style10">Charge Type : </span></td>
                      <td class="style15"><select name="slottype" id="slottype" onchange="hideappdetail()" style="height:20px; width:auto;">
                          <option value="1">Standard</option>
                          <option value="2">Premium</option>
                          <option value="3">Concessional Rate</option>
                          <option value="4">Free</option>
                        </select>
					</td>
                    </tr>
                    <tr>
                      <td colspan="5" style="padding-left:10px; padding-top:5px;"><table width="380" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="177" align="center" valign="middle" class="button"  id="takeappointmentbutton" onClick="setearliestapp();"><strong>Show Earliest Appointment</strong></td>
                          <td width="15">&nbsp;</td>
                          <td width="158" align="center" valign="middle" id="btnshowdoccalendar" onclick="showcalendar()" class="button"><strong>Show Doctor Calendar</strong></td>
                        </tr>
                      </table></td>
                      <td width="103" class="style15">&nbsp;</td>
                      <td width="95" class="style15"><span style="float:right;" class="style10"> &nbsp; &nbsp;Fees : &nbsp;&nbsp;</span></td>
                      <td width="110" class="style15"><table width="90" border="0" cellpadding="0" cellspacing="0" class="table_Border">
                        <tr>
                          <td height="22" class="style17" style="padding-left:5px;"><div id="fees"></div></td>
                        </tr>
                      </table></td>
                      </tr>
                  </table></td>
                  </tr>
              </table></td>
              </tr>
                <tr>
                  <td height="auto" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top" colspan="2"><div id="doccalforpat" class="style10" style="width:100%;padding-left: 16px;" ></div></td>
                      <td colspan="3" align="left" valign="top"><table width="603" border="0" cellspacing="0" cellpadding="0">
                        
                        <tr>
                          <td width="1%" height="150">&nbsp;</td>
                          <td colspan="4" align="left" valign="top" class="gradient_Bg">
						  	<input type="hidden" id="shortvisitduration" />
							<input type="hidden" id="longvisitduration" />
							<input type="hidden" id="noofslots" />
							<input type="hidden" id="rescheduledappid" />
							<input type="hidden" id="appstrategytype" />
							<input type="hidden" id="blockslotduration" />
							<input type="hidden" id="selecteddate" value="" />
							<div name="slots" id="slots" style= "height:200px; overflow-y:auto;">							
							</div>
						  </td>
                          </tr>
						
                        <tr>					
						<td>&nbsp;</td>
						<td width="23%" height="35" align="left" valign="middle">
							<table width="100" border="0" cellspacing="0" cellpadding="0">
							<tr>
							<td align="center" valign="middle" class="button" onClick="showappdetails();">Next</td>
							</tr>
							</table>
						</td>                        
                          <td width="20%">&nbsp;</td>
                          <td width="20%">&nbsp;</td>
                          <td width="20%">&nbsp;</td>
                        </tr>
                      </table></td>
                     
                    </tr>
                  </table></td>
                  </tr>
            <tr>
              <td colspan="3"><span class="style19">__________________________________________________________________________________________</span></td>
              </tr>
            
            <tr id="appdetails" style="display:none;" >
			<!--<td><div> <table><tr> </tr> </table> </div> </td>-->
              <td>&nbsp;</td>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="6" align="left" valign="top" class="style17" style="padding-left:10px; padding-top:10px;"><table width="790" border="0" cellpadding="0" cellspacing="0" class="table_Border">
                    <tr>
                      <td colspan="3" align="left" valign="top" style="padding-top:8px; padding-left:5px;">
					    <table width="470" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="2">
                        
                          </td>
                          <td width="125" class="style20" ><label id="incidentlbl" class="bodytext_styleBlue">New Incidence</label></td>
                          <td width="145" class="style17"><select class="input" id="incidentcombo"  style="font-size: 9pt;height:22px;width:133px;" align=left"> 
							<option value="" selected="" >Previous Incidence</option>
								<?PHP  
									foreach ($previnciarray as $key=> $incident) { 										
										print "<option  \" value=\"{$key}\">{$incident}</option>";
									} 
								?>
							</select>
							<input type="textbox" class="bodytext_styleBlue" style="width:123px;display:none" placeholder="Incident Name" title="Enter Incident Name" id="Incidenttxt" />
						</td>
                          <td width="207" class="style20"><span class="style10 style16">
                            <input name="textbox" type="textbox" class="style10 style16" id="visittype"  style="background: transparent;width:200px;border:none;" value="Follow-up Visit for this incidence" />
                          </span></td>
                        </tr>
                      </table></td>
                      <td width="297" rowspan="4" align="left" valign="top" style="padding-top:8px; padding-left:5px; padding-bottom:8px; padding-right:5px;">
					  	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
						 <tr>
                          <td width="64%" height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Appointment Date</td>
                          <td width="7%" height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td width="29%" height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style"><label id="lblapp" ></label></td>
                        </tr>
                        <tr>
                          <td width="64%" height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Visit Type</td>
                          <td width="7%" height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td width="29%" height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style"><label id="lblvisitype" ></label> </td>
                        </tr>
                        <tr>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Mode</td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style"><label id="lblmode" ></label> </td>
                        </tr>
                        <tr>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Place</td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style"><label id="lblplace" ></label> </td>
                        </tr>
                        <tr>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Charge Type </td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style"><label id="lblchargetype" ></label></td>
                        </tr>
                        <tr>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Fees</td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style">Rs. <label id="lblfees" ></label></td>
                        </tr>
                        <tr valign="middle">
                          <td height="22" align="left" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Ayushman Charges</td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" bgcolor="#FFFFFF" class="text_style">Rs. <label id="lblayushmancharges" ></label></td>
                        </tr>
                        <tr>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="bodytext_styleBlue" style="padding-left:10px;">Total Consultation charges</td>
                          <td height="22" align="left" valign="top" bgcolor="#FFFFFF" class="bodytext_styleBlue">:</td>
                          <td height="22" align="left" valign="middle" bgcolor="#FFFFFF" class="text_style">Rs. <label id="lbltotal" ></label></td>
                        </tr>
                      
                      </table>					  </td>
                    </tr>
                    
                    <tr>
                      <td width="7" height="115">&nbsp;</td>
                      <td width="77" align="left" valign="top"  class="bodytext_styleBlue" style="padding-top:5px;" >Complaint : </td>
                      <td width="396" align="left" valign="middle">
                      <textarea name="textarea2" id="symptoms" style="width:95%; height:100px;">					
					   </textarea>
						</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td align="right" style="padding-top:5px; padding-right:25px;">
					  <table width="320" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="150" align="center" valign="middle" class="button"  onClick="saveAppointment();"><strong>Take Appointment</strong></td>
                        </tr>
                      </table></td>
                      </tr>
                    
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      </tr>
                  </table></td>
                  </tr>
                
                
                <tr>
                  <td width="17%">&nbsp;</td>
                  <td width="2%">&nbsp;</td>
                  <td width="57%">&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
              </tr>
			  
            <tr>
              <td>&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
          </table></td>
          </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</div>
<div id="viewdoccalendar" style="width:720px;height:580px;" title="Doctor Calendar">
		<iframe id="iframedoccalendar" height="580px" width="720" style="overflow:none;" allowtransparency="true" frameborder="no"></iframe>
	</div>
</body>
</html>
