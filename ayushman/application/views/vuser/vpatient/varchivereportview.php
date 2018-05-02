<script type="text/javascript" >
	function Observerdvaluelink(cellvalue, options, rowObject ){
		return 'Not yet filled';
	}
	function viewlink(cellvalue, options, rowObject ){
				return '<a href="#" onclick="openreport(<?= $appid; ?>,'+cellvalue+');"><font color="#0763A2">View</font></a>';
	}
	function openreport(appid,id)
	{
		$.ajax({
				  url: "/ayushman/cuploadpastvisit/getreportinfo?id="+id,
				  success: function( data ) {
						if(data == '')
							alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
						else
							window.open("/"+data);
					},
					error : function(){}
			  });	
	}
	function back()
	{
		window.location="<?= $backlink;?>";
	}
	function viewallreports()
	{
		window.open("/<?= $link;?>");
	}
	$(document).ready(function() {
		$("#incidentinfo").text("Incidence Name: ");
		$("#incidentinfo").append("<strong><?= $incidentname; ?></strong>&nbsp;&nbsp;&nbsp;Date Of Consultation:<strong><?= $dateandtime; ?></strong>&nbsp;&nbsp;&nbsp;Doctor Name: <strong><?= $drname; ?></strong>");
	});
</script>
<div id="body_contantpatientpage" style="width:828px; height:420 px;"> 
    <table border="0" cellpadding="0" cellspacing="0" valign="top">
    	<tr>
        	<td style="width:1%;" >&nbsp;</td>
            <td style="width:98%;">
      	 		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr>
                    	<td width="99%" class="bodyheading">Appointment Report</td>
                        <td width="1%">&nbsp;</td>
                    </tr>
                </table> 
        	</td>
        	<td style="width:1%;" ></td>
        </tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="1%">&nbsp;</td>
						<td width="98%" class="bodytext style2" id="incidentinfo" name="incidentinfo" >-</td> 
						<td width="10%"><input type="button" class="button"  onclick="viewallreports()" value="View All Reports" style="width:134px;height:22px;"/></td> 
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
							$whereclause="[appid,=,".$appid."]";
							$patjqgridrequest= Request::factory('xjqgridcomponent/index');
							$patjqgridrequest->post('name','archivereport');
							$patjqgridrequest->post('height','220');
							$patjqgridrequest->post('width','815');
							$patjqgridrequest->post('sortname','appid');
							$patjqgridrequest->post('sortorder','desc');
							$patjqgridrequest->post('tablename','archivereport');//used for jqgrid
							$patjqgridrequest->post('columnnames', 'appid,DateAndTime,testname,pathologistname,refrencenumberfortest,appid,patientarchivereportid');//used for jqgrid
							$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
							$columninfo = '[{"name":"appid","index":"appid","hidden":true},
											{"name":"Test Date","index":"DateAndTime","width":50},
											{"name":"Test Name","index":"testname","width":90,"editable":true},
											{"name":"Diagnostic Lab","index":"pathologistname","width":80,"align":"left" },
											{"name":"Lab Reference Number","index":"refrencenumberfortest","width":120,"align":"left"},
											{"name":"Observerd value","index":"appid","width":80,"align":"left","formatter":Observerdvaluelink} ,
											{"name":"Reports","index":"patientarchivereportid","width":80,"align":"center","formatter":viewlink}]';			
							$patjqgridrequest->post('columninfo', $columninfo);
							//if save,edit,delete we dont want in jqgrid set it to false
							$patjqgridrequest->post('editbtnenable','false');
							$patjqgridrequest->post('deletebtnenable','false');
							$patjqgridrequest->post('savebtnenable','false');
							echo $patjqgridrequest->execute(); ?>
						</td>
					</tr>
				</table>
			</td>
			<td style="width:1%;" >&nbsp;</td>
		</tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:98%;text-align:right;" >	<input type="button" class="button"  onclick="back()" value="Back" style="width:100px;height:22px;"/></td>
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