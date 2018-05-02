<script type="text/javascript">
function back()
{
	window.location="/ayushman/cpatientdashboard/view";
}
$(document).ready(function() {
	parent.sendmsgfromtemplate('pullgriddata','<?= $doctoruserid; ?>');	
});

</script>
<div id="body_contantpatientpage" style="width:830px; height:420 px;" valign="top"> 
          <table border="0" valign="top" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
                   <tr  height="33pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#0A466C" colspan="6" align="center" class="style6 bodytext"><div style="fontsize:11pt;padding-top:8px; padding-left:11px" >&nbsp;<strong>Appointment Rescheduled</strong></div></td>
                    <td style="width:5%;">&nbsp;</td>
                   
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                  <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext"><div align="left">We have received a request from you for resceduled of following appointment with your doctor and we have carried out the same:<br/>
Name of Doctor:<strong>Dr. <?= $doctornm?></strong>
<br/>Date and Time of your old appointment: <strong><?= $olddate; ?>  at <?= $oldtime; ?> hrs (IST)</strong>
<br/>Date and Time of your new appointment: <strong><?php echo date("d M Y",strtotime($appdatetime))  ?>  at <?php echo date("H:i",strtotime($appdatetime))  ?> hrs (IST)</strong><br/>
Please note that resceduling charges will be applicable as per following policy:
<br/>If your appointment was rescheduled  more than 24 hours before the scheduled start time of the appointment, there will be no rescheduling charges levied on you and charges received, if any, will be credited back to your account.
<br/>If you appointment was rescheduled within 24 hours from scheduled appointment, you will be charged Doctor’s Consultation fees. However, we will credit back any charges towards channel usage by <strong><i>IndiaOnlineHealth.</i></strong> 
<br/>We advise you to connect at least 5 minutes before the appointment. Your doctor will be able to see your on-line presence. He will connect with you as soon as he is free and ready to start consultation. Since doctors are very busy, it is possible that your doctor may get delayed by a few minutes. Therefore, we request you stay on-line till he initiates the consultation. In case, he is not able to connect on-line, he may call you on your phone number (as saved in your profile- your mobile number or land number). 
<br/>Due to emergency or any other unforeseen reason, if the doctor is not able to meet the appointment, it will automatically get cancelled after 15 minutes from the scheduled time.  In such an event, your account will not get charged. Also, you will be able to take another appointment for which the doctor’s consultation fees will be waived. 
<br/>If you need any assistance, please feel free to contact us.
</div></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr height="13pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">
                    	<table border="0px" width="100%;" >
                    		<tr>
                    			<td style="width:80%;"><br/>&nbsp;Team <strong><i>IndiaOnlineHealth</i></strong><br/>&nbsp;support@indiaonlinehealth.com</td>
                    			<td style="width:20%;"><div style="padding-left:12px;"><input type="button" class="button"  onclick="back()" value="Back" style="width:80px;height:20px;"/></div></td>
                    		</tr>
                    	</table>
                    </td>
                    <td style="width:5%;">&nbsp;</td>
                  </tr>
                
                </table>
                </div>