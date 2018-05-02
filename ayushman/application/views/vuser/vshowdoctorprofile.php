<html>
<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

	$(document).ready(function(){
		$('#certificatepopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
			
		});
		$(".ui-dialog-titlebar").hide();
			resize();
			
			if('<?php echo $objDoctorcertificate->certificatevia_c ?>' != 'uploaded')
			{
				$('#certificateButton').hide();
			}
			if('<?php echo $pos; ?>'!='0')
			{
				$('#backbutton').hide();
			}
			
		
		var arrayvalue=<?php echo json_encode($arrayflow); ?>;
			var arraytime=<?php echo json_encode($timearray); ?>;
			
			var html="<table>";
			html+="<tr>"
			html+="<td style='padding-left:10px; padding-top:10px; font-weight: bold'>"
			html+="DATE";
			html+="</td><td style='padding-left:170px; padding-top:10px; font-weight: bold'>"
			html+="Status - Note";
			html+="</td>"
			html+="</tr>";
				
			for(var count in arrayvalue)
			{	
				html+="<tr>"
				html+="<td style='padding-left:10px; padding-top:10px'>"
				html+=arraytime[count];
				html+="</td><td style='padding-left:170px; padding-top:10px'>"
				html+=arrayvalue[count];
				html+="</td>"
				html+="</tr>";
				
			}
			html+="</table>";
			$(".content").html(html);
			$(".header").click(function () {

    $header = $(this);
	
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
            //change text based on condition
             return $content.is(":visible") ? "[-] Notes on Profile Status" : "[+] Notes on Profile Status";
        });
    });

});
	});
	
	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}
	
	function onclickmci()
	{
		var win=window.open('http://www.mciindia.org/InformationDesk/IndianMedicalRegister.aspx', '_blank');
 	 	win.focus();
	}
	
	
	function viewCertificate()
	{
		$('#certificatepopup').dialog('open');
	}  
</script>
<style> 
.container {
    width:100%;
    border:1px solid #d3d3d3;
}
.container div {
    width:100%;
}
.container .header {
   background-color: #2D7A9E;
border: none;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
-opera-border-radius: 4px;
-khtml-border-radius: 4px;
border-radius: 4px;
width: 100%;
height: 25px;
font-family: tahoma,Helvetica,sans-serif;
font-size: 11px;
font-weight: bold;
color: #FFFFFF;
padding-left: 10px;
}
.container .content {
    display: none;
    padding : 5px;
	font-family: tahoma, Helvetica, sans-serif;
font-weight: normal;
font-size: 11px;
color: #11587E;
}
</style>
</html>
<body style="width:828px;height:600px; overflow-x:hidden;">
<div id="divdoceditprofile" >
	<table id="doctorprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:3px;">
		
		<tr >
			<td class="Heading_Bg" colspan="2">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Dr. <?php echo ucfirst($objUser->Firstname_c).' '.ucfirst($objUser->lastname_c); ?>'s Registration Details</td>
		</tr>
		
		<tr>
			<td width="30%" align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Name :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
					<?php echo $objUser->Firstname_c; ?>
					<?php echo $objUser->middlename_c; ?>
					<?php echo $objUser->lastname_c; ?>
			</td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">IndiaOnlineHealth Id :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->id; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Email Id :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->email; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Registration Number :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objDoctor->RMPnumber_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Registering Authority :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objDoctor->medicalcouncilwhereregistered_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Date of Registration :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php if($objDoctor->RMPnumberdateofissue_c) echo date('d M Y',strtotime($objDoctor->RMPnumberdateofissue_c)) ;?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Registration Valid Till :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php if($objDoctor->RMPnumberdateofexpiry_c) echo date('d M Y',strtotime($objDoctor->RMPnumberdateofexpiry_c)) ;?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_normal">Contact No :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->isdmobileno1_c.'-'.$objUser->mobileno1_c; ?></td>
		</tr>
		
		<tr><td align="left" colspan="4">&nbsp;</td></tr>
		<tr><td align="left" colspan="4" style="color:#11587E;"><hr style="height:0.5px"></td></tr>
		<tr><td colspan="4">&nbsp;</td></tr>
		
		<tr align="left">
			<td align="left" style="padding-left:10px;" ><input id="backbutton" align="left" type="button" onclick="window.location = '<?php echo $refer; ?>';"  class="button" height="22" style="width: 80px; height: 25px; " value="Back"/>&nbsp;&nbsp;&nbsp;<input  id="certificateButton" align="left" type="button" onclick="viewCertificate();"  class="button" height="22" style="width:100px; height: 25px;" value="View Certificate" /></td>
		</tr>
		<tr><td colspan="4">&nbsp;</td></tr>
	</table>
</div>
<div id="certificatepopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
		<tr>
			<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
			<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Doctor Certificate </td>
			<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
				<img  src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('certificatepopup')"/>
			</td>
		</tr>
	</table>
	<div ><iframe id="certificateimage" src="/<?php echo $objDoctorcertificate->path_c; ?>" style="width:550px;height:500px;" border="0" ></iframe></div>
	<table width="100%"  height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb" style="padding-right:10px;border-top:1px solid #a8c8d9;"  >
		<tr>
			<td width="61%"><input type='hidden' id='testsnumber' name='testsnumber' /></td>
			<td width="27%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;"><input id="openmcibutton" type="button" class="button" value="Check with MCI"  onclick="onclickmci()" readonly="readonly"   style="outline:none;width=100%;height:25px" /></td>
			<td width="13%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;" ><input type="button" class="button" value="Cancel"  onclick="closepopup('certificatepopup')" readonly="readonly"   style="outline:none;width=75px;height:25px" /></td>
			</tr>	
    </table>
</div>
<div class="container">
    <div class="header"><span>[+] Notes on Profile Status</span>

    </div>
    <div class="content">
       
    </div>
</div>
</body>