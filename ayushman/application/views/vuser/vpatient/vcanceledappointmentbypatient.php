<script type="text/javascript">
function back()
	{
		window.location="/ayushman/cpatientdashboard/view";
	}
	
$(document).ready(function() {
	parent.sendmsgfromtemplate('pullgriddata','<?= $objuserfornotfication->id?>');	
});
</script>
<div id="body_contantpatientpage" style="width:830px; height:420 px;" valign="top"> 
          <table border="0" valign="top" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
                   <tr  height="33pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    
                   
                    <td bgcolor="#0A466C" colspan="6" align="center" class="style6 bodytext"><div style="fontsize:11pt;padding-top:8px; padding-left:11px;color:white;" >&nbsp;<strong>Appointment Cancellation</strong></div></td>
                    <td style="width:5%;">&nbsp;</td>
                   
                  </tr>
                    <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                   
                    
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext">&nbsp;</td>
                    <td style="width:5%;">&nbsp;</td>
                    
                  </tr>
                  <tr height="26pt" valign="top">
                  	<td style="width:5%;">&nbsp;</td>
                    <td bgcolor="#f5f5f5" colspan="6" align="left" class="BlueBandtext"><div align="left">We have received a request from you for cancellation of following appointment with your doctor and we have carried out the cancellation. <br/>
<br/>Name of Doctor:<strong>Dr.<?= $objuserfornotfication->Firstname_c ?> <?= $objuserfornotfication->lastname_c ?></strong>
<br/>Date and Time of your appointment:<strong><?= $appointmentdate ?> at <?= $appointmenttime ?> hrs (IST)</strong>
<br/><br/>Please note cancellation charges will be applicable as per following policy:
<br/>If your appointment was cancelled more than 24 hours before the scheduled start time of the appointment, there will be no cancellation charges levied on you and charges received, if any, will be credited back to your account.
<br/>If you appointment was cancelled within 24 hours from scheduled appointment, you will be charged Doctor’s Consultation fees. However, we will credit back any charges towards channel usage by <strong><i>IndiaOnlineHealth.</i></strong> 
<br/>If you need any assistance, please feel free to contact us.

</div>
<div style="padding-top:10px;"><input type="button" class="button"  onclick="back()" value="Back" style="width:80px;height:20px;float: right;
margin-right: 30px;"/></div>
</td>
                    <td>&nbsp;</td>
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
                    <tr>
                    <td>&nbsp;</td>
                   
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                     <tr>
                    <td>&nbsp;</td>
                    
                    
                    <td width="186">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr>
                    <td>&nbsp;</td>
                  
                    
                    <td width="186">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr>
                    <td>&nbsp;</td>
                    
                    
                    <td width="186">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr>
                    <td>&nbsp;</td>
                  
                    
                    <td width="186">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    
                    
                    <td width="186">&nbsp;</td>
                    <td colspan="2">&nbsp;</td>
                    <td width="221">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                   
                  
                </table>
                </div>