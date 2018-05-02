<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<!-- css required for displaying list of plans -->
	<script>
		$( document ).ready(function() {
			$('.apply-plan-btn').click(function() {
			$('body').addClass('apply-modal')
			});

			$('.select-btn').click(function () {
				$('body').addClass('apply-modal-body')
			});
		});

	</script>
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
	margin: 0 0 0 2px;
	list-style-type: none;
	margin: 5px;
	opacity: 1;
	border: 5px solid #eee;
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
	z-index:100px;
 	/*Reflection
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.4)));*/
	/*Glow*/
	-webkit-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	-moz-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
	box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
}

</style>
<div style="margin:0px;" name="plan">
<table width="100%" border="0" cellpadding="5px" cellspacing="0">
	<tr>
		<td width="100%" align="center" colspan="2" valign="middle" class="Plan_Heading">
			<div align="center">
				<label name="planname"><?= $planname; ?></label>
			</div>
		</td>
	</tr>
	<tr>
		<td align="left" valign="middle" width="170px" class="bodytext_normal">Registration Charges</td>
		<td align="center" width="70px" valign="middle" class="bodytext_normal" style="text-align:center"><label align="left" name="regcharges">Rs. <?= $regcharges; ?></label></td>
	</tr>
	<tr>
		<td align="left" valign="middle" width="170px" class="bodytext_normal">Subscription Charges</td>
		<td align="center" width="70px" valign="middle" class="bodytext_normal" style="text-align:center"><label align="left" name="subcharges">Rs. <?= $subcharges; ?></label></td>
	</tr>
	<tr>
	  <td class="" width="100%" colspan="2">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td align="center" width="10%" valign="middle" >&nbsp;</td>
			<td align="center" width="35%" valign="middle" onclick="apply('<?= $id; ?>');" class="button apply-plan-btn select-btn">Apply</td>
			<td align="center" width="10%" valign="middle" >&nbsp;</td>
			<td align="center" width="35%" valign="middle" onclick="showdetails('<?= $id; ?>');" class="button select-btn">View Details</td>
			<td align="center" width="10%" valign="middle" >&nbsp;</td>
		  </tr>
		</table>
	  </td>
	</tr>
</table>
</div>
