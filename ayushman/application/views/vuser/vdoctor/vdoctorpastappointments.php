<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet" type="text/css">
<div class="container">
 		<div class="col-lg-10 dialogheader">
        	<p><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Past Appointments</p>
        </div>
		
		<div class="container">
				<div class="col-lg-8 pastapptsearchSection">
				<form id="patientsearch" method="post" enctype="multipart/form-data"  action="/ayushman/cdoctorpastappointments/viewpastappointments">
					<input type="text" name="search" id="search" placeholder="Search Patient by Name or IOH ID" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>"/>
					<input type="submit" value=""/>
				</form>
				</div>
				<table width="100%" height="36" style="margin-top:20px;margin-left:10px" cellpadding="0" cellspacing="0">
						<tr>
							<td >
							<script>
								function visitsummaryformatter(cellvalue, options, rowObject ){
									var status = $(rowObject).children()[8].firstChild.data;;
									var value = 1;
									if(status.toLowerCase() == 'notfromsystem' )
									{
										value = 0;
										return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');"><font color="#60b3b3">Prescription</font></a>';
									}
									else
									{
										value = 1;
										return '<a href="#" onclick="openvisitsummary('+cellvalue+','+value+');" ><font color="#60b3b3">Visit summary</font></a>';
									}
								
								}
								function patientprofile(cellvalue, options, rowObject ){
									var patientuserid =$(rowObject).children()[10].firstChild.data;
									return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="auto" width="auto" />&nbsp;<a href="#" onclick="patientnameclick('+patientuserid+');" ><font color="#60b3b3">'+cellvalue+'</font></a>';
								}
								function placeformatter(cellvalue, options, rowObject ){
									return 'Home';
								}
								
								function patientnameclick(patientUserId)
								{
									window.open("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
								}
															
								
								function modeformatter(cellvalue, options, rowObject ){
									var status= cellvalue;
									if(status.toLowerCase()== 'notfromsystem')
										return 'Archive';
									else
										return status;
								}
								function openvisitsummary(appointmentid, status)
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
							</script>
							<?php
								
								//this is emr grid for patient we can put this in other page
 								
 								$whereclause="[doctoruserid,=,".$obj_user->id."]";
								$patjqgridrequest= Request::factory('xjqgridcomponent/index');
								$patjqgridrequest->post('name','doctorpastappointments');
								$patjqgridrequest->post('height','320');
								$patjqgridrequest->post('width','815');
								$patjqgridrequest->post('sortname','dateandtime_dateformate');
								$patjqgridrequest->post('sortorder','desc');
								$patjqgridrequest->post('tablename','doctorpastappointments');//used for jqgrid
								$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
								$patjqgridrequest->post('columnnames', 'id,doctoruserid,refappwithid_c,DateAndTime,dateandtime_dateformate,patientname,incidentsname_c,id,mode,id,patuserid');//used for jqgrid
								$columninfo = '[{"name":"id","index":"id","hidden":true},{"name":"doctoruserid","index":"doctoruserid","width":100,"hidden":true},{"name":"refappwithid_c","index":"refappwithid_c","width":100,"hidden":true},{"name":"Date & Time","index":"DateAndTime","width":130,"align":"left","sortable":false},{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","width":0,"align":"left","hidden":true},
												{"name":"Patient","index":"patientname","width":150,"formatter":patientprofile},
												{"name":"Incident Name","index":"incidentsname_c","width":120,"editable":true},
												{"name":"Place","index":"Place","width":30,"align":"left","formatter":placeformatter},
												{"name":"Mode","index":"mode","width":40,"align":"left","formatter":modeformatter},
												{"name":"Action","index":"id","width":100,"align":"center","formatter":visitsummaryformatter},
												{"name":"patuserid","index":"patuserid","width":80,"align":"center","hidden":true}
												]';			
								$patjqgridrequest->post('columninfo', $columninfo);
								//if save,edit,delete we dont want in jqgrid set it to false
								$patjqgridrequest->post('editbtnenable','false');
								$patjqgridrequest->post('deletebtnenable','false');
								$patjqgridrequest->post('savebtnenable','false');
								$patjqgridrequest->post('search',"true");
								if($previousvalues != null)
									$previousvaluessearch=$previousvalues['search']; 
								else
									$previousvaluessearch= "";			
								$patjqgridrequest->post('previousvaluessearch',$previousvaluessearch);
								echo $patjqgridrequest->execute(); ?>
							</td>
						</tr>
					</table>
        </div>
</div>
