<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/app/css/main.css" rel="stylesheet" type="text/css" />

 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
				&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png">
				&nbsp;&nbsp;
        		<font size="2" color="white">Type of Service Providers</font>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
	<div width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<input type="button" class="button" style="float:left;width:120px;" value="New type"  title="Create new Service Provider type" onclick="window.location='/ayushman/cothersp/addeditsptype'"/>
			<input id ="selectedsptypeid" type="hidden" />			
			<input type="button" class="button" style="float:right;width:120px" value="Export" title="Export data in excel" onclick="window.location='/ayushman/cothersp/export'"/>
		</tr>
		<tr></br>&nbsp;</tr>
        <tr></br>&nbsp;</tr>
        <tr>
			<td>
				<?php
					$sptypeindex = 1;
					foreach ($arrsptypes as $sptype)
					{
						echo '<tr>&nbsp;</br></tr>';					
						echo '<table style ="background:#eaecf8;width:100%">';
						echo '<tr>';
						echo '<td style="width:25%"><label style="font-weight:bold;font-size:15px;">';echo $sptypeindex; echo ". ";echo $sptype['name'];echo'</label></td>';
						//echo '<td style="width:30%"> <span class="iconEdit ng-scope" title="Edit battery" onclick="editbattery('; echo $battery['id'];echo ');"></span>';echo'<span class="iconDelete ng-scope" title="Remove battery" style="margin-left:20px"onclick="deletebattery('; echo $battery['id']; echo');"></span> </td>';			
						//if($sptype['activeflag']== 1)
							echo '<td style="width:30%"> <span class="iconEdit ng-scope" title="Edit Service Provider type" onclick="editsptype('; echo $sptype['id'];echo ');"></span>';echo'<a class="" title="Deactivate Service Provider types" style="margin-left:20px"onclick="deletesptype('; echo $sptype['id']; echo');">Deactivate</a> </td>';			
l						
						echo '</tr>';
						echo '</table>';
						echo '<table style ="background:#ecf8fb;width:100%">';
						$packagecost = 0;
						foreach($sptype['catalogtype'] as $detail)
						{
							echo '<tr style="width:100%"> <td style="width:5%"></td>';
							echo '<td style="width:30%">';
							echo $detail['catalogname'];
							echo '<td style="width:50%">';
							echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							echo '</td></tr>';
						}
						echo '</table>';
						$sptypeindex = $sptypeindex + 1;
					}					
				?>
			</td>
		</tr>
	</div>
</div>
<script type="text/javascript">
function editsptype($sptypeid)
{
	window.location='/ayushman/cothersp/addeditsptype?sptypeid='+$sptypeid;
} 
function deactivatesptype($sptypeid)
{
	showMessage('250','50','Deactivate','Do you really want to deactivate service provider type?','confirmation','cancelappointmentpopup');
	document.getElementById("selectedsptypeid").value = $sptypeid;
} 
var Confirmation_Event = function(id,confirmation){
	$sptypeid = document.getElementById("selectedsptypeid").value ;
	if(confirmation == 'yes')
	{
		$.ajax({
		type: "get",
		url: "/ayushman/cothersp/deletebattery?batteryid="+$batid,
		success: function(data){
			showMessage('350','50','Message',data,'information',5000);		
			location.reload();
		}
		});
	}
};
</script>
