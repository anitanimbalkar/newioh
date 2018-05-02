<link href="/ayushman/assets/app/css/main.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

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
        		<font size="2" color="white">List of Battery</font>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
	<div width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<input type="button" class="button" style="float:left;width:120px;" value="Create new battery"  title="Create new battery" onclick="window.location='/ayushman/cpathologistbattery/addeditbattery'"/>
			<input id ="selectedbatid" type="hidden" />			
			<input type="button" class="button" style="float:right;width:120px" value="Export Catalogue" title="Export battery catalogue" onclick="window.location='/ayushman/cpathologistbattery/export'"/>
		</tr>
		<tr></br>&nbsp;</tr>
        <tr></br>&nbsp;</tr>
        <tr>
			<td>
				<?php
					$batindex = 1;
					foreach ($arrbattery as $battery)
					{
						echo '<tr>&nbsp;</br></tr>';					
						echo '<table style ="background:#eaecf8;width:100%">';
						echo '<tr>';
						echo '<td style="width:25%"><label style="font-weight:bold;font-size:15px;">';echo $batindex; echo ". ";echo $battery['name'];echo'</label></td>';
						//echo '<td style="width:5%"> <span class="iconEdit ng-scope" title="Edit battery" onclick="editbattery('; echo $battery['id'];echo ');"></span> </td>';			
						echo '<td style="width:20%"> <label style="font-weight:bold;font-size:15px;">Offered price (Rs.) - '; echo $battery['offeredcost'];echo '</label> </td>';			
						echo '<td style="width:30%"> <span class="iconEdit ng-scope" title="Edit battery" onclick="editbattery('; echo $battery['id'];echo ');"></span>';echo'<span class="iconDelete ng-scope" title="Remove battery" style="margin-left:20px"onclick="deletebattery('; echo $battery['id']; echo');"></span> </td>';			
						echo '</tr>';
						echo '</table>';
						echo '<table style ="background:#ecf8fb;width:100%">';
						$packagecost = 0;
						foreach($battery['detail'] as $detail)
						{
							echo '<tr style="width:100%"> <td style="width:5%"></td>';
							echo '<td style="width:30%">';
							echo $detail['testname'];
							echo '</td> <td style="width:10%;text-align:right"> ';
							echo $detail['standardrate'];
							echo '</td> ';
							echo '<td style="width:50%">';
							echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							echo '</td></tr>';
							$packagecost = $packagecost + $detail['standardrate'];					
						}
						$offdisc = Number_format(($packagecost - $battery['offeredcost'])* 100/$packagecost,2);
							echo '<tr style="width:100%;background-color:#1c75bc;font-size:13px"><td style="width:5%"> </td>';
							echo '<td style="width:30%;color:white;text-align:right;padding-right:5px"> Total price (Rs.) : </td>';
							echo ' <td style="width:10%;color:white;text-align:right"> ';
							echo $packagecost ;echo '</td>';
							echo '<td style="width:50%;color:white;">';
							echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							echo 'Offered standard discount(%) - &nbsp;';echo $offdisc ;
							echo '</td></tr>';									
						echo '</table>';
						$batindex = $batindex + 1;
					}					
				?>
			</td>
		</tr>
	</div>
</div>
<script type="text/javascript">
function editbattery($batid)
{
	window.location='/ayushman/cpathologistbattery/addeditbattery?batteryid='+$batid;
} 
function deletebattery($batid)
{
	showMessage('250','50','Remove battery','Do you really want to remove battery?','confirmation','cancelappointmentpopup');
	document.getElementById("selectedbatid").value = $batid;
} 
var Confirmation_Event = function(id,confirmation){
	$batid = document.getElementById("selectedbatid").value ;
	if(confirmation == 'yes')
	{
		$.ajax({
		type: "get",
		url: "/ayushman/cpathologistbattery/deletebattery?batteryid="+$batid,
		success: function(data){
			showMessage('350','50','Message',data,'information',5000);		
			location.reload();
		}
		});
	}
};
</script>
