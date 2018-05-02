<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<script>
	function viewformatter(cellvalue, options, rowObject ){
		str = "alert('This feature is not activated yet.');";
		return '<a href="#" onclick="'+str+'" ><font color="#0763A2">View</font></a>';
	}
	function statusnameformatter(cellvalue, options, rowObject ){
		var patientuserid =$(rowObject).children()[1].firstChild.data;
		var patientmobilenumber;
		if($(rowObject).children()[9].firstChild != null)
			if($(rowObject).children()[9].firstChild.data != "")
				patientmobilenumber=$(rowObject).children()[9].firstChild.data;
			else
				patientmobilenumber= 'No Information provided';
		else
			patientmobilenumber= 'No Information provided';
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="auto" width="auto" />&nbsp;<label title="phone:'+patientmobilenumber+'">'+cellvalue+'</lable>';
	}
	function actionformatter(cellvalue, options, rowObject ){
		var appointment_id =$(rowObject).children()[0].firstChild.data;
		var doctorfirstname="<?php echo $obj_user->Firstname_c; ?>";
		var is_new_doctor = "<?php echo $is_new_doctor; ?>";
		if(!is_new_doctor)
		{
		  return '<a href="/ayushman/cemrdashboard/view?appid='+appointment_id+'&role=doc&name=Dr.'+doctorfirstname+'" title="Consult" >Consult</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" onclick="cancelappointment('+appointment_id+')" title="Cancel" >Cancel</a>';
		}
		else
		{
		  var oclick = "launch_consultation_app('+appointment_id+','+doctorfirstname+');"
  		  return '<a href="" onclick="launch_consultation_app('+appointment_id+');" title="Consult" ><span style="color:blue;">Consult</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" onclick="cancelappointment('+appointment_id+')" title="Cancel" ><span style="color:blue;">Cancel</span></a>';
		}  
	}
function launch_consultation_app(appointment_id){
          var doctorfirstname="<?php echo $obj_user->Firstname_c; ?>";
	  parent.location ="/ayushman/cconsultation/view?appid="+appointment_id+"&role=doc&name=Dr."+doctorfirstname;
	  
	}
	function cancelappointment(appointment_id){
		document.getElementById("cancelappid").value = appointment_id ;
		showMessage('250','50','Cancel Appointment','Do you really want to cancel appointment?','confirmation','cancelappointmentpopup');
	}
	function Confirmation_Event(id,confirmation)
	{
		var appointment_id = document.getElementById("cancelappid").value;
		if(id == 'cancelappointmentpopup')
		{
			if(confirmation == 'yes')
			{	
				document.body.style.cursor='wait';
				parent.document.getElementById("icontent").src= '/ayushman/cappointmenteditor/cancelappointment?appid='+appointment_id+'&role=doctor&representative=' ;
			}
		}
	}
	function viewemrformatter(cellvalue, options, rowObject)
	{
		var patientUserId =$(rowObject).children()[1].firstChild.data;
		return '<a href="#" onclick="edit_emr('+patientUserId+')" title="Edit EMR" ><span style="color:blue">Edit EMR</span></a> / <a href="#" onclick="show_emr('+patientUserId+')" title="View EMR" ><span style="color:blue">View EMR</span></a>';
	}
	function edit_emr(patientUserId){
		parent.openDialog("/ayushman/cpatientallergy/view?patientUserId="+patientUserId,800,600);
		//window.open("/ayushman/cpatientallergy/view?patientUserId="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	function show_emr(patientUserId)
	{
		parent.openDialog("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId,948,600);
		//window.open("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
	}
	
</script>
<div id="body_contantpatientpage" style="width:828px; height:500px;"> 
	<table>
		<tr>
			<td style="width:825px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="160" class="Heading_Bg">&nbsp;
							<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Upcoming Appointments</strong>
						</td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td style="width:825px;" align="right">
				<table width="250" border="0" cellspacing="0" cellpadding="0">
					<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data"  action="/ayushman/cdoctordashboard/view">
						<tr>
						  <td width="45%" align="right" class="bodytext_bold">
									Search : </td>
						  <td width="40%" height="30"><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  <td width="15%" align="center" ><input type="submit" style="border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
					</form>
				</table>
			</td>
		</tr>	
		<tr>
			<td style="width:818px;" >
				<div id="doctorappointmentsgrid" >
					<?php
						$docid = $obj_user->id;
						$whereclause="[Appointmentstatus,=,schedule][doctorid,=,".$docid."]";
						$doctorjqgridrequest= Request::factory('xjqgridcomponent/index');
						$doctorjqgridrequest->post('name','doctorappointments'); // name of gqgrid without space
						$doctorjqgridrequest->post('height','320');
						$doctorjqgridrequest->post('width','800');
						$doctorjqgridrequest->post('sortname','dateandtime_dateformate');
						$doctorjqgridrequest->post('sortorder','desc');
						$doctorjqgridrequest->post('tablename','doctorappointment');//used for jqgrid
																//appointment_id,refappfromid_c,Time,Date,Patientname,incidentsname_c
						$doctorjqgridrequest->post('columnnames','appointment_id,refappfromid_c,dateandtime_dateformate,DateAndTime,Patientname,incidentsname_c,mode,appointment_id,appointment_id,PatientContactNumber,appointment_id');//used for jqgrid
						$doctorjqgridrequest->post('whereclause',$whereclause);
						$columninfo ='[{"name":"appointment_id", "index":"appointments_id", "hidden":true,"align":"center"},
						{"name":"refappfromid_c", "index":"refappfromid_c", "hidden":true,"align":"center"},
						{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","width":0,"align":"left","hidden":true},
						{"name":"Date & Time","index":"DateAndTime","width":65,"align":"left","sortable":false},
						{"name":"Patient Name","index":"Patient","width":60,"align":"left","formatter":statusnameformatter,"title":false},
						{"name":"Complaint","index":"Complaint","width":100,"align":"left"},
						{"name":"Mode","index":"mode","width":30,"align":"center"},
						{"name":"Last Visit","index":"","width":40,"align":"center","hidden":true},
						{"name":"EMR","index":"View EMR","width":60,"align":"center","formatter":viewemrformatter},
						{"name":"PatientContactNumber","index":"PatientContactNumber","align":"center","hidden":true},
						{"name":"Action","index":"","width":80,"align":"center","formatter":actionformatter},
						]';			
						$doctorjqgridrequest->post('columninfo', $columninfo);
						$doctorjqgridrequest->post('editbtnenable','false');
						$doctorjqgridrequest->post('search',"true");
						$doctorjqgridrequest->post('deletebtnenable','false');
						$doctorjqgridrequest->post('savebtnenable','false');
						if($previousvalues != null)
							$previousvaluessearch=$previousvalues['search']; 
						else
							$previousvaluessearch= "";			
						$doctorjqgridrequest->post('previousvaluessearch',$previousvaluessearch);
						echo $doctorjqgridrequest->execute(); ?>
				
				</div>
			</td>
		</tr>
		<tr><td><input type="hidden" id="cancelappid" name="cancelappid" value=""/></td></tr>
    </table>
</div>
