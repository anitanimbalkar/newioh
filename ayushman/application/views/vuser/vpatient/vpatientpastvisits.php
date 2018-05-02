<script type="text/javascript">
	function cancelformatter(cellvalue, options, rowObject )
	{
		str = "onclick=cancelpress('"+cellvalue+"');"
		return '<a href="#"'+str+' >Cancel</a>';
	}
	
	function visitreportformatter(cellvalue, options, rowObject )
	{
		var status = $(rowObject).children()[11].firstChild.data;var value=1;
		if(status == 'notfromsystem' )
		{
		 	value=0;
		 	if($(rowObject).children()[13].firstChild.data == "Informationnotyetfilled")
		 	{
		 		return "Not yet filled"
		 	}
		 	else
		 	{
		 		return '<a href="#" onclick="openvisitreport('+cellvalue+','+value+');" ><font color="#220CE6">Visit Report</font></a>';
		 	}
		}
		else
		{
			value=0;
			return '<a href="#" onclick="openvisitreport('+cellvalue+','+value+');" ><font color="#220CE6">Visit Report</font></a>';
		}	
	}
	
	function openvisitreport(appointmentid,status)
	{
		if(status== '0' )
		{
			window.location="/ayushman/cuploadpastvisit/showreport?appid="+appointmentid+"&back=pastvisit"
		}
		else
		{
			window.location= "/ayushman/cuploadpastvisit/showreport?appid="+appointmentid;
		}
	}
	
	function visitsummaryformatter(cellvalue, options, rowObject ){
		var status = $(rowObject).children()[11].firstChild.data;var value=1;
		if(status.toLowerCase() == 'notfromsystem' )
		{
			value = 0;
				if($(rowObject).children()[12].firstChild != null)
				{
					if($(rowObject).children()[12].firstChild.data == "Informationnotyetfilled")
				 	{
				 		return "Not yet filled";
				 	}
				 	else
				 	{
						return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');"><font color="#220CE6">Prescription</font></a>';
					}
				}
				else{
					return "Not yet filled";
				}
		}
		else
		{
			value = 1;
			return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');" ><font color="#220CE6">Visit summary</font></a>';
		}
	}

	function modeformatter(cellvalue, options, rowObject ){
		
		var status= $(rowObject).children()[11].firstChild.data;
		if(status.toLowerCase()== 'notfromsystem')
			return 'Archive';
		else
			return status;
	}
	
	function openvisitsummary(appointmentid,status)
	{
		if(status== '0' )
		{
			window.open("/ayushman/cdisplayprescriptions/view?appid="+appointmentid,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
		}
		else
		{
			$.ajax({  
				url: "/ayushman/cemr/getvisitsummarypdf?appid="+appointmentid,
				success: function(data) { 	
					if(data == '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
						window.open("/ayushman/"+data,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
					}
				});  
		}
	}
	
	function cancelpress(cellvalue){
		$.ajax({  
			type: "POST",  
			url: "/ayushman/cappointmenteditor/cancelappointment?appid="+cellvalue+"&role=patient",
			success: function(data) { 	
				alert(data);
				window.location.reload();
			}
		});  
	}
</script>
<div id="body_contantpatientpage" style="width:828px; height:420 px;"> 
        <table border="0" cellpadding="0" cellspacing="0" valign="top" >
        	<tr>
        		<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">
      	 			<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                        	<td width="160" class="Heading_Bg">&nbsp;
								<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;Past Visits</strong>
							</td>
                        </tr>
                    </table> 
        		</td>
        		<td style="width:1%;" ></td>
        	</tr>
			<tr> 
		 		<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">
					<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
						<tr>
							<td >
							
								<?php
								
								//this is emr grid for patient we can put this in other page
 								$userid =  $userid;
 								$whereclause="[Appointmentstatus,=,completed][userid,=,".$userid."]";
								$patjqgridrequest= Request::factory('xjqgridcomponent/index');
								$patjqgridrequest->post('name','patappts');
								$patjqgridrequest->post('height','320');
								$patjqgridrequest->post('width','815');
								$patjqgridrequest->post('sortname','dateandtime_dateformate');
								$patjqgridrequest->post('sortorder','desc');
								$patjqgridrequest->post('tablename','patientappointments');//used for jqgrid
								$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
								$patjqgridrequest->post('columnnames', 'id,userid,refappwithid_c,dateandtime_dateformate,DateAndTime,docnm,incidentsname_c,Place,[Video{'.urlencode("#").'}],id,id,mode,archiveprescriptionpath,reportpath');//used for jqgrid
								$columninfo = '[{"name":"id","index":"id","hidden":true},{"name":"userid","index":"userid","width":100,"hidden":true},{"name":"refappwithid_c","index":"refappwithid_c","width":100,"hidden":true},{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","width":0,"align":"left","hidden":true},{"name":"Date & Time","index":"DateAndTime","width":130,"align":"left","sortable":false},
												{"name":"Doctor","index":"docnm","width":150,"sortorder":true,"sortorder":"dateandtime_dateformate"},
												{"name":"Incident Name","index":"incidentsname_c","width":120,"editable":true},
												{"name":"Place","index":"appointmnetplace","width":50,"align":"left","formatter":modeformatter},
												{"name":"Mode","index":"Home","width":50,"align":"left","formatter":modeformatter},
												{"name":"Prescription","index":"id","width":80,"align":"center","formatter":visitsummaryformatter},
												{"name":"Report","index":"id","width":80,"align":"center","formatter":visitreportformatter},
												{"name":"mode","index":"status","hidden":true},
												{"name":"archiveprescriptionpath","index":"archiveprescriptionpath","hidden":true},
												{"name":"reportpath","index":"reportpath","hidden":true}
												]';			
								$patjqgridrequest->post('columninfo', $columninfo);
								//if save,edit,delete we dont want in jqgrid set it to false
								$patjqgridrequest->post('editbtnenable','false');
								$patjqgridrequest->post('deletebtnenable','false');
								$patjqgridrequest->post('savebtnenable','false');
								$patjqgridrequest->post('shrinkToFit', 'true');
								$patjqgridrequest->post('autowidth', 'true');
								echo $patjqgridrequest->execute(); ?>
								
						
							</td>
						</tr>
					</table>
				</td>
		 		<td style="width:1%;" >&nbsp;</td>
			</tr>
			<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">&nbsp;</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">&nbsp;</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">&nbsp;</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">&nbsp;</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        </table>
</div>

      
