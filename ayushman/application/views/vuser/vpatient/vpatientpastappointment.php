<script>
function placeformatter(cellvalue, options, rowObject ){
	return 'Home';
}
function modeformatter(cellvalue, options, rowObject ){
	return 'Video';
}
</script>
<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
        <table border="0" cellpadding="0" cellspacing="0" valign="top">
        	<tr>
        		<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">
      	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="99%" class="bodyheading">Past Appointments </td>
                                <td width="1%">&nbsp;</td>
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
								$patpastjqgridrequest= Request::factory('xjqgridcomponent/index');
								$patpastjqgridrequest->post('name','patappts');
								$patpastjqgridrequest->post('height','320');
								$patpastjqgridrequest->post('width','820');
								$patpastjqgridrequest->post('sortname','DateAndTime');
								$patpastjqgridrequest->post('sortorder','asc');
								$patpastjqgridrequest->post('tablename','patientappointments');//used for jqgrid
								$patpastjqgridrequest->post('columnnames', 'id,userid,refappwithid_c,DateAndTime,docnm,incidentsname_c,id,id,[View EMR{'.urlencode("#").'}]');//used for jqgrid
								$patpastjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
								$columninfo = '[{"name":"id","index":"id","hidden":true},{"name":"userid","index":"userid","width":100,"hidden":true},{"name":"refappwithid_c","index":"refappwithid_c","width":100,"hidden":true},{"name":"Date & Time","index":"DateAndTime","width":100,"align":"left"},
												{"name":"Doctor","index":"docnm","width":130},
												{"name":"Incidentsname","index":"incidentsname_c","width":120,"editable":true},
												{"name":"Place","index":"Place","width":50,"align":"left","formatter":placeformatter},
												{"name":"Mode","index":"Home","width":50,"align":"left","formatter":modeformatter},
												{"name":"Visit Summary","index":"Video","width":70,"editable":true,"formatter":"link"}]';			
								$patpastjqgridrequest->post('columninfo', $columninfo);
								//if save,edit,delete we dont want in jqgrid set it to false
								$patpastjqgridrequest->post('editbtnenable','false');
								$patpastjqgridrequest->post('deletebtnenable','false');
								$patpastjqgridrequest->post('savebtnenable','false');
								echo $patpastjqgridrequest->execute(); ?>
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

      