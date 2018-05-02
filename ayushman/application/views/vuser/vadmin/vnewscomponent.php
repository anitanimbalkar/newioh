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
	margin: 0 0 0 2px;
	list-style-type: none;
	margin: 5px;
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
			height: "30",
			resizable: false,
			width: "100px"
		});
		
		$('#search').focus(function(){
			var urlsearch= "/ayushman/cautocompleter/autocomplete?column=corporatename_c&query=select corporatename_c from corporates where corporatename_c";
			$("#search").autocomplete({source: urlsearch}); 
		});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		document.getElementById('search').focus();
	});
</script>
<div style="margin:0px;" name="news" >
<table width="<?php echo $width; ?>" height="150px" border="0" cellpadding="1px" cellspacing="0">
	<tr>
		<td width="100%" align="center" colspan="2" valign="middle" class="Heading_Bg">
			<div align="center">
				<label name="news"><?= $newstitle; ?></label>
			</div>
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" width="30%" class="bodytext_normal">&nbsp;&nbsp;&nbsp;<img src="/ayushman/assets/images/BlueArrow_Icon.png" width="7" height="5">&nbsp;Details:</td>
		<td align="left" width="70%" valign="middle" class="bodytext_normal" style="text-align:left;vertical-align: top;"><label align="left" name="details" style="text-align: left;vertical-align: top;" ><?= $details; ?></label></td>
	</tr>
	<tr>
	  <td class="Plan_Text" width="100%" colspan="2">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr height="7px">
			<td align="center" width="20%" valign="middle" >&nbsp;</td>
			<td align="left" width="28%" valign="middle" valign="middle" onclick="editnews(<?= $id; ?>);" class="button">Edit</td>
			<td align="left" valign="middle" height="7px" width="4%" >&nbsp;</td>
			<td align="left" width="28%" valign="middle" onclick="parent.getcontent('/ayushman/cnewsmanager/remove?id=<?= $id; ?>');" class="button">Remove</td>
			<td align="left" width="20%" valign="middle" >&nbsp;</td>
		  </tr>
		</table>
	  </td>
	</tr>
</table>
</div>
