<script type="text/javascript">
	function statusnameformatter(cellvalue, options, rowObject )
	{
		var patientuserid =$(rowObject).children()[2].firstChild.data;
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}
	function show_emr(patientUserId)
	{
		window.open("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
</script>
<div id="body_contantpatientpage" style="width:828px; height:500px;"> 
	<table>
		<tr>
			<td width="0px">&nbsp;</td>
			<td style="width:818px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="99%" class="Heading_Bg">My Patients</td>
						<td width="1%">&nbsp;</td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td width="0px">&nbsp;</td>
			<td style="width:818px;" >
				<div id="doctorappointmentsgrid" >
					<?php		
						$whereclause="[doctorid,=,".$doctorid."]";
						$doctorjqgridrequest= Request::factory('xjqgridcomponent/index');
						$doctorjqgridrequest->post('name','selecteddoctorbypatient'); // name of gqgrid without space
						$doctorjqgridrequest->post('height','320');
						$doctorjqgridrequest->post('width','800');
						$doctorjqgridrequest->post('sortname','patientid');
						$doctorjqgridrequest->post('sortorder','asc');
						$doctorjqgridrequest->post('tablename','selecteddoctorbypatient');//used for jqgrid
																//appointment_id,refappfromid_c,Time,Date,Patientname,incidentsname_c
						$doctorjqgridrequest->post('columnnames','doctorid,patientid,patientuserid,patientname,age,city_c,location_c,date,[View{'.urlencode("/ayushman/cpatientemrtodoc/viewpatientemr?patientuserid=<patientuserid>").'}]');//used for jqgrid
						$doctorjqgridrequest->post('whereclause',$whereclause);
						$columninfo ='[{"name":"doctorid", "index":"doctorid", "hidden":true,"align":"center"},
						{"name":"patientid", "index":"patientid", "hidden":true,"align":"center"},
						{"name":"patientuserid","index":"patientuserid","hidden":true,"width":100,"align":"left"},
						{"name":"Patient Name","index":"patientname","width":120,"align":"left","formatter":statusnameformatter},
						{"name":"Age(yr)","index":"age","width":100,"align":"left"},
						{"name":"City","index":"city_c","width":100,"align":"left"},
						{"name":"Location","index":"location_c","width":100,"align":"left"},
						{"name":"Last Appointment","index":"date","width":100,"align":"left"},
						{"name":"Profile","index":"view","width":80,"align":"center","formatter":"link"}
						]';
						$doctorjqgridrequest->post('columninfo', $columninfo);
						$doctorjqgridrequest->post('editbtnenable','false');
						$doctorjqgridrequest->post('deletebtnenable','false');
						$doctorjqgridrequest->post('savebtnenable','false');
						echo $doctorjqgridrequest->execute(); 
					?>	
				</div>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
    </table>
</div>