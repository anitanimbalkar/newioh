<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<!-- css required for displaying list of plans -->
<style type="text/css">
#navlist
{
	position: relative;
	margin: 0;
	padding: 0;
	white-space: wrap-words;
}

#navlist li
{
	float: left;
	list-style-type: none;
	margin: 0.5px;
	opacity: 1;
	border-radius:5px;
	border: 1px solid #eee;
	/*Transition*/
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	/*Reflection
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.1)));*/
}
#navlist li:hover
{
	opacity: 1;
	border-color: #C0C0C0;
	z-index:100px;
 	/*Reflection
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.4)));*/
	/*Glow*/
	-webkit-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	-moz-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
}

</style>
<div style="margin-top:3px;" name="corporate" >
<table width="<?php echo $width; ?>" height="<?php echo $height; ?>" border="0" cellpadding="1px" cellspacing="0" class="bodytext_normal">
	<tr>
		<td width="3%" class="bodytext_normal" align="left" valign="top">
			<img src="<?php if($objUserForDoctor->photo_c == ''){echo '/ayushman/assets/images/pic02.png';}else{echo $objUserForDoctor->photo_c;} ?>" width="90" height="90"/>
		</td>
		<td width="97%" class="bodytext_normal" align="left">
			<div class="bodytext_normal" valign="middle" height="20px" style="height:20px;width:30%; padding-left:10px;">
				Name : <?php echo $objDoctor->doctorname; ?>
			</div>		
			<div class="bodytext_normal" valign="middle" height="20px" style="height:20px;width:30%; padding-left:10px;">
				Qualification : <?php echo $objDoctor->education_c; ?></br>
			</div>		
			<div class="bodytext_normal" valign="middle" style="height:20px;width:30%; padding-left:10px;">
				Specialization : <?php echo $objDoctor->specialization_c; ?></br>
			</div>
		</td>
	</tr>
</table>

<?php $encrypt = Encrypt::instance('default');?> 
<div class="bodytext_normal" align="right" style="height:30px;border-top:1px solid #a8c8d9;background: #ecf8fb;padding-top:5px; padding-right:10px;vartical-align:middle;align:right;">
	<input type="button" class="button" value="View Profile" onclick="window.location='/ayushman/cdoctorprofile/displayToStaff?docid=<?php echo ($objDoctor->doctoruserid); ?>&backurl=/ayushman/cstaffdoctorpanel/view';" style="width:80px;height:23px;" />
	<input type="button" class="button" value="Take Appointment"  style="width:120px;height:23px;" onclick="window.location='/ayushman/ctakeappointment/takeAppointmentByStaff?id=<?php echo urlencode($encrypt->encode($objDoctor->doctorid)); ?>';"/>
</div>

</div>
