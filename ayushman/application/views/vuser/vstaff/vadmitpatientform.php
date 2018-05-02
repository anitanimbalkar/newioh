<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src='/ayushman/assets/js/jquery.multiselect.js'> </script> 
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
<script type="text/javascript">
		
	$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
	$(".ui-dialog-titlebar").hide();
	


function buildPatientNetwork(patientuserid){
	parent.openDialog("/ayushman/cpatientprofile/buildnetwork?id="+patientuserid, '900px','1024px');
}
function patientBill(patId)
{	
	parent.openDialog('/ayushman/cipdbills/viewbill?id='+patId,800,1000);
	
	//window.openDialog("/ayushman/cipdbills/list/get?IOHid="+patId);
}

function editProfile(patId){
	parent.openDialog("/ayushman/cpatientprofile/displayProfile?patId="+patId, '830px','770px');
}


function photo( path){
			var patId=document.getElementById("patId").value;
		var getpath=document.getElementById("patName").value;
// 		var caseno=document.getElementById("caseno").value;
 //alert(path);
	document.getElementById("patId").value=patId;
		$("#photo").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['right', 'center'],
		title: 'Photo ---  ',
		show: 'blind',
		hide: 'blind',
		width: 300,
		height:300,
		dialogClass: 'ui-dialog-osx',
		});
		$("#pat_img").attr("src",path);
 // $("#pat_img").stop().slideToggle(2000);

		$("#photo").show();
}

	
</script>
<div id="contentdiv" style="height:auto">
<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0"  style="margin-top:5px;margin-bottom:5px" >
	<tr>
		<td  class = "Heading_Bg" width="100%">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Details</td>
	</tr>
</table>
<div style="clear:both" />
<div id="registedUser"  >
		<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">

<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
	<tr>
		<td width="10%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
		<td width="38%" > <input id = "patId" name="patId" autocomplete="on" autofocus="autofocus" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patId']; ?>" /></td>
		<td valign="middle"><label class = "bodytext_bold">Patient Name :</label></td>
		<td><input id = "patName" name="patName" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patName']; ?>"/></td>

	</tr>
	<tr>
		<td width="11%" valign="middle"><label class = "bodytext_bold">Mobile No :</label></td>
		<td width="41%"><input id = "patContact" name="patContact" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patContact']; ?>" /></td>
		<td valign="middle"><label class = "bodytext_bold">Email :</label></td>
		<td > <input id = "patEmail" name="patEmail" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patEmail']; ?>" /></td>
		
	</tr>
	<tr>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onClick="$('#searchform').submit();">Search</button></td>
       </tr>
</table


<div style="width:100%;margin-top:18px;height:100%;">
		<table width="100%" height="100%" align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<td>
				<div style="max-height:100%">
					<table id = "searchguide" style="width:100%;height:100%;display:block">
						<tr class="Heading_Bg">
							<td width="160" align="middle">IOH No</td>
							<td width="160" align="middle">Patient name</td>
							<td width="160" align="middle">Mobile No</td>
							<td width="160" align="middle">Status</td>
							<td width="160" align="middle">Action&nbsp;&nbsp;</td>

						</tr>
					</table>
				</div>
				</td>
			</tr>
			<tr>
				<td>
				<div style="max-height:100%">
					<div style="max-height:100%;overflow:auto;">
					    <table id = "searchresult" style="width:100%;display:block;height:100%;" class="bodytext_normal">
						<tr>
							<td>
						    <?php $i=0;
							    $result = $result;
							    if(count($result) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=0;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }$photo="'".$result[$i]->photo."'";
									
									  echo '<td width="160" align="middle">'.$result[$i]->id.'</td>
										<td width="160" align="left"><a href=/ayushman/cadmitpatient/viewpatientaccount/get?patId='.$result[$i]->id.'><font color="blue">'.$result[$i]->patientname.'</font></a></td>
										<td width="160" align="left">'.$result[$i]->mobileno1.'</td>
										<td width="160" align="left">'.$result[$i]->status.'</td>
										<td width="160" align="left"><a href="#photo" onClick="photo('.$photo.')" ><font color="blue">Show Photo</font></a></td>';
									 
											echo "</td>";
									  echo "</tr>";
								  }
							    }
						    ?>
							</td>
						</tr>
						<tr>
      							<td height="25" width="100%" colspan="6" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;">&nbsp;<?php echo 'Total number of Patients : '.$i; ?> 
							</td>
						</tr>

					    </table>
				    </div>
				</div>
				</td>
			</tr>
			 		</table>
			 	
			</form>	
			 
</div>	
</div>

<div id="photo" style="display: none;">
	<form id="photo" action="viewphoto" method="post"> 
	 <div style="margin-left: 43px;margin-top: 43px;">
		<p>
			
			<input type="hidden" id="patId"  name="patId" value="" />		
				<input type="hidden" id="pname"  name="pname" value="" />		

			
			  		<img id="pat_img"  src="/ayushman/assets/userphotos/userphoto.png" alt="" >  
			</div>

		</p>
	</div>
	</form>



