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
	margin: 0 0 0 0px;
	list-style-type: none;
	margin: 0.5px;
	opacity: 1;
	border-radius:5px;
	border: 3px solid #eee;
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "50",
			resizable: false,
			width: "50px"
		});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});

</script>
<div style="margin:0px;" name="corporate" >
<table width="<?php echo $width; ?>" height="<?php echo $height; ?>" border="0" cellpadding="1px" cellspacing="0" class="bodytext_normal">
	<tr>
		<td width="5%" class="bodytext_normal" align="left">
			<img src="<?php if($objUserForBeneficiary->photo_c == ''){echo '/ayushman/assets/images/pic02.png';}else{echo $objUserForBeneficiary->photo_c;} ?>" width="20" height="25"/>
		</td>
		<td width="20%" class="bodytext_normal" align="left">
			Name : <?php echo $objUserForBeneficiary->Firstname_c.' '.$objUserForBeneficiary->lastname_c; ?>
		</td>
		<td width="10%" class="bodytext_normal" align="left">
			IOH ID : <?php echo $objUserForBeneficiary->id; ?>
		</td>
		<td width="30%" class="bodytext_normal" align="left">
			Email : <?php echo $objUserForBeneficiary->email; ?>
		</td>
		<td width="15%" class="bodytext_normal" align="left">
			<a onclick="parent.getcontent('/ayushman/cbeneficiary/addCredits?beneficiaryid=<?php echo $objUserForBeneficiary->id; ?>');" href="javascript:void(0);"><font color="blue">Recharge Account</font></a>
		</td>
		<td width="25%" class="bodytext_normal" align="left">
			<a onclick="parent.getcontent('/ayushman/cbeneficiary/remove?beneficiaryid=<?php echo $objUserForBeneficiary->id; ?>');" href="javascript:void(0);"><font color="blue">Remove Beneficiary</font></a>
		</td>
	</tr>
</table>
</div>
