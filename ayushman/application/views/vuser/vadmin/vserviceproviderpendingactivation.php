
	<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
        <tr>
        
        <td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              
                              <tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Pending Activation</strong>
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
    		<div id="divdoctorpendingactivation" >
    		
					<?php
						
								$docactivation= Request::factory('xjqgridcomponent/index');
								$docactivation->post('name','pendingactivations');
								$docactivation->post('height','320');
								$docactivation->post('width','820');
								$docactivation->post('sortname','id');
								$docactivation->post('sortorder','asc');
								$docactivation->post('tablename','pendingactivation');//used for jqgrid
								$docactivation->post('columnnames', 'id,username,role,[Activate{'.urlencode("/ayushman/cserviceproviderpendingactivation/activate?userid=<id>&role=<role>").'}],[Reject{'.urlencode("/ayushman/cserviceproviderpendingactivation/reject?userid=<id>&role=<role>").'}],[View Profile{'.urlencode("/ayushman/cshowprofile/showprofile?userid=<id>&role=<role>").'}]');
								$columninfo = '[{"name":"id","index":"id","hidden":true},
												{"name":"Service Provider Name","index":"username","width":100},	
												{"name":"Service Provider Type","index":"role","width":100},	
												{"name":"Activate","index":"Activate","width":80,"align":"center"},
												{"name":"Reject","index":"Reject","width":80,"align":"center"},
												{"name":"View","index":"View","width":80,"align":"center"}
												]';			
								$docactivation->post('columninfo', $columninfo);
								//if save,edit,delete we dont want in jqgrid set it to false
								$docactivation->post('editbtnenable','false');
								$docactivation->post('deletebtnenable','false');
								$docactivation->post('savebtnenable','false');
								echo $docactivation->execute();
					?>
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