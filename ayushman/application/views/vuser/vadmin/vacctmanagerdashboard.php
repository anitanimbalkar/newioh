<script type="text/javascript">
function urlformatter( cellvalue, options, rowObject ){

	return '<a href="'+cellvalue+'" >'+cellvalue+'</a>';
}
</script>

	<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
        <tr>
        
        <td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              
                              <tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Comments</strong>
								</td>
							</tr>
						</table> 
					</td>
				</tr>
                </table> 
			</td>
		<td width="1%">&nbsp;</td>
		</tr>
		<tr>
		<td width="1%">&nbsp;</td>
		<td style="width:98%;" >
    		<div id="doctorappointmentsgrid" >
				<div id="admingrid" align=center >
    		
					<?php
					
					$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
					$adminjqgridrequest->post('name','admincomments'); // name of gqgrid without space
					$adminjqgridrequest->post('height','320');
					$adminjqgridrequest->post('width','830');
					$adminjqgridrequest->post('sortname','feedbackdetails_id');
					$adminjqgridrequest->post('sortorder','asc');
					$adminjqgridrequest->post('tablename','feedback');//used for jqgrid
															//appointment_id,refappfromid_c,Time,Date,Patientname,incidentsname_c
					$adminjqgridrequest->post('columnnames','feedbackdetails_id,EmailID,Userid,DateAndTime,Comments,[View{'.urlencode("/ayushman/ccomments/displaycomments?id=<feedbackdetails_id>").'}],[Remove{'.urlencode("/ayushman/cadmindashboard/removecomment?id=<feedbackdetails_id>").'}]');//used for jqgrid
					$adminjqgridrequest->post('whereclause',"[resolved_c,=,0]");
					$columninfo ='[{"name":"id", "index":"id", "hidden":true,"align":"center"},
					{"name":"EmailID", "index":"EmailID","width":150, "align":"left"},
					{"name":"Userid","index":"Userid","width":122,"align":"left","hidden":true},
					{"name":"Date & Time","index":"DateAndTime","width":75,"align":"left"},
					{"name":"Comments","index":"Comments","width":150,"align":"left"},
					{"name":"View Details","index":"Url","width":50,"align":"left"},
					{"name":"Remove","index":"Url","width":50,"align":"left"},]';
					
					$adminjqgridrequest->post('columninfo', $columninfo);
					
					$adminjqgridrequest->post('editbtnenable','false');
					$adminjqgridrequest->post('deletebtnenable','false');
					$adminjqgridrequest->post('savebtnenable','false');
					echo $adminjqgridrequest->execute(); ?>
					
				
		
		</div>
		
		</div>
		</td>
		<td width="1%">&nbsp;</td>
		</tr>
    	<tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr><tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr><tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr><tr>
        <td height="5">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    </table>


	</div>