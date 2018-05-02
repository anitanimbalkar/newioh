<html>
<head>
<title>Create Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
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
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: auto; overflow-x:hidden;" > 
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Corporates</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding-top:5px;" >
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporatelist/search">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="60%" align="right" class="bodytext_bold" >&nbsp;&nbsp;Search&nbsp;:&nbsp;</td>
							<td  width="30%" valign="bottom" ><input type="text" style="width:100%;" name="search" id="search" value="<?php if($previousvalues != null)echo $previousvalues['search']; ?>" onChange="$('#companysearchform').submit();" class="textarea" /></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" class="button" style="height:20px;"  value="Search" /></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td style="padding-top:1px;" >
				<HR style="height:0.5px"/>
			</td>
		</tr>
	</table>
	<div style="height:auto;overflow:auto;">
		<table>
			<tr >
				<td align="left" valign="top" class="content_bg" style="padding-top:0px;overflow:auto;">
					<?php
						$objCorporates = ORM::factory('viewcorporate');
						if($search != ''){
							$objCorporates = $objCorporates->where('corporatename','like','%'.$search.'%')->find_all()->as_array();
						}else{
							$objCorporates = $objCorporates->find_all()->as_array();
						}
						$corporates = array();
						echo '<div width="100%" height="170px" style="white-space: wrap;"><ul id="navlist">';

						if(count($objCorporates) == 0){
							echo '<div style="width:700px; border-radius:5px;border: 3px solid #eee; padding-top:7px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold">No results found for "'.$search.'"</div>';
						}else{
							foreach($objCorporates as $corporate)
							{
								echo '<li name="listitems">';
								$corporates= Request::factory('ccorporatecomponent/view');
								$corporates->post('id',$corporate->id);
								//$corporates->post('name',$corporate->corporate);
								$corporates->post("height",'200');
								$corporates->post("width",'255');
								$corporates->post("corporatename",$corporate->corporatename);
								$corporates->post("address",$corporate->address);
								$corporates->post("phonenumber",$corporate->phonenumber);
								$corporates->post("contactperson",$corporate->contactperson);
								$corporates->post("contactpersonphone",$corporate->contactpersonphone);
								$corporates->post("contactpersonemail",$corporate->contactpersonemail);
								$corporates->post("contactpersonmobile",$corporate->contactpersonmobile);
								echo $corporates->execute(); 
								echo '</li>';
							}
						}
						echo '</ul></div>';
					?>
				</td>
			</tr>
		</table>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'search'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
</body>
</html>