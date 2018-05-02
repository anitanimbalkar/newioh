<script type="text/javascript">
function back()
{
if(document.getElementById("urole").value=="patient")
{	parent.location="/ayushman/cdashboard/view";
}else if(document.getElementById("urole").value=="staff") {
parent.location='/ayushman/cdashboard/view';
}
	}
$(document).ready(function() {
	parent.sendmsgfromtemplate('pullgriddata','<?= $doctoruserid ?>');	
	
	var len=<?= $array_len ?>;
	var staffid=new Array();
	<?PHP  
	$i=0;
		foreach ($array_staff as $domain) { 
			
			echo "staffid[".$i."]=".$domain.";";
			$i=$i+1;
		} 
	?>
	for(var i=0;i<=(len-1);i++)
	{
	parent.sendmsgfromtemplate('pullgriddata',staffid[i]);	
	}
	
}); 
</script>
<div id="body_contantpatientpage" style="width:830px; height:420 px;" valign="top"> 
          <table border="0" valign="top" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
                   <tr  height="33pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#0A466C" colspan="6" align="center" class="style6 bodytext">
					<div style="fontsize:11pt;padding-top:8px; padding-left:11px;color:white;" >&nbsp;<strong>
					 <?php 
				if( $rescheduledappid == "" ||  $rescheduledappid == NULL ) 
					echo "Appointment Fixed ";
				else
					echo "Appointment Rescheduled ";
			  ?>
						
					
					</strong></div></td>
                    <td style="width:5%;">&nbsp;</td>
                   
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                  <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">
					<div align="left">Thank you for fixing appointment with your doctor. Here are the details of your appointment:<br/>
						<br/>Name of Doctor:<strong>Dr. <?= $doctornm?></strong>					
						<br/>Your appointment is fixed for <strong><?php echo ($appdatetime)  ?>  </strong>
						<br/>Clinic address:<strong><?= $clinicaddress?> </strong><br/>
						<br/>We advise you to connect at least 5 minutes before the appointment. Your doctor will be able to see your on-line presence. He will connect with you as soon as he is free and ready to start consultation. Since doctors are very busy, it is possible that your doctor may get delayed by a few minutes. Therefore, we request you stay on-line till he initiates the consultation.<br/> In case, he is not able to connect on-line, he may call you on your phone number (as saved in your profile- your mobile number or landline number). 						
<br/>Due to emergency or any other unforeseen reason, if the doctor is not able to meet the appointment, it will automatically get cancelled after 15 minutes from the scheduled time.  In such an event, your account will not get charged. Also, you will be able to take  another appointment for which the doctor’s consultation fees will be waived. 
</div>
<div align="left" style="
    font-weight: bold;">
<br/>Cancellation Policy:
<br/> 1. In case of cancellation of appointment from your side or from the doctor, the doctor consultation fees and platform usage charges will be refunded   to your account but online booking charges and service tax is non refundable.<br/>2. In case of no show your appointment will be cancelled automatically and the refund should be same as in (1).   
					</div></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr height="13pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">
                    	<table border="0px" width="100%;" >
                    		<tr>
                    			<td style="width:80%;"><br/>&nbsp;Team <strong><i>IndiaOnlineHealth</i></strong><br/>&nbsp;support@indiaonlinehealth.com</td>
                    			<td style="width:20%;">
								<input type="button" class="button"  onclick="back()" value="Back" style="width:100px;height:30px;"/>
								<input type="hidden" id="urole" value="<?php echo $urole;?>" />
								
                    	 	</td>
                    		</tr>
                    	</table>
                    </td>
                    <td style="width:5%;">&nbsp;</td>
                  </tr>
                 <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td  colspan="6" align="left">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td  colspan="6" align="left">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td  colspan="6" align="left">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                </table> </div>
