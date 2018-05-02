<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

$(document).ready(function(){
		
		
			if('<?php echo $pos; ?>'!='0')
			{
				$('#backbutton').hide();
			}
			else
			{
				$('.header').hide();
			}
			var arrayvalue=<?php echo json_encode($arrayflow); ?>;
			var arraytime=<?php echo json_encode($timearray); ?>;
			
			var html="<table>";
			html+="<tr>"
			html+="<td style='padding-left:10px; padding-top:10px;font-family: tahoma, Helvetica, sans-serif;font-size: 11px;font-weight: bold'>"
			html+="DATE";
			html+="</td><td style='padding-left:170px; padding-top:10px;font-family: tahoma, Helvetica, sans-serif;font-size: 11px;font-weight: bold'>"
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
		}
	);
 
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
<div  id="divpatheditprofile" class="content_bg" style=" width:100%; height:93%;overflow:auto;border:1px solid #284889;" align="center" > 
	<table id="pathprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
		<tr>
			<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;<?php echo ucfirst($objUser->Firstname_c).' '.ucfirst($objUser->lastname_c); ?>'s Registration Details</td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Name :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
					<?php echo $objUser->Firstname_c; ?>
					<?php echo $objUser->middlename_c; ?>
					<?php echo $objUser->lastname_c; ?>
			</td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">IndiaOnlineHealth Id :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->id; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Email Id :</td>
			<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->email; ?></td>
		</tr>
		
		<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
		
		<tr>
			<td width="15%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Centre Name:</td>
			<td width="35%" align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->nameofcenter_c; ?></td>
			<td width="22%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Centre Contact No.:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $objUser->isdphonenowork_c.'-'.$objUser->phonenowork_c; ?></td>
		</tr>
		
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Additional Contact No.:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->isdemergencynumber_c.'-'.$pathologist->emergencynumber_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Address Line 1:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->line1_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Landmark:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->nearlandmark_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Country:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->country_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">State:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->state_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">City:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->city_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Locality:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->location_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Pin Code:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $address->pin_c; ?></td>
		</tr>
		
		<tr><td colspan="4">&nbsp;</td></tr>
		
		<tr>
			<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Center Registration Details</td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Shop Act License No. :</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->shopactlicence_c; ?>"</td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Shop Act License Valid Till:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php if($pathologist->medicalactlicencevaliddate_c) echo date('d M Y', strtotime($pathologist->medicalactlicencevaliddate_c)); ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">FDA Licence No. :</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->fdalicence_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">FDA Licence Valid Till:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php if($pathologist->fadlicencedatetill_c) echo date('d M Y', strtotime($pathologist->fadlicencedatetill_c)); ?></td>
		</tr>
		
		<tr><td colspan="4">&nbsp;</td></tr>
		 
		<tr>
			<td colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Doctor's Details</td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">First Name:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctorfirtsname_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Middle Name:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctormiddlename_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Last Name:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctorlastname_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Contact No.:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctorisdmobilenumber_c.'-'.$pathologist->qualifieddoctormobilenumber_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Email Id:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctoremailid_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Qualification:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctorqualification_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Year of Passing:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->qualifieddoctoryearofpassing_c; ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Registration No.:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->registerqualifieddoctornumber_c; ?></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Registration Valid Till:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php if($pathologist->qualifieddoctorlicencevalidtill_c) echo date('d M Y', strtotime($pathologist->qualifieddoctorlicencevalidtill_c)); ?></td>
		</tr>
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Registering Authority:</td>
			<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $pathologist->registeringauthorityname_c; ?></td>
		</tr>
		
		<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
		
		<tr align="left">
			<td align="left"> <input id="backbutton" align="left" type="button" onclick="window.location = '<?php echo $refer; ?>';" class="button" height="22" style="width: 150px; height: 25px; " value="Back"/></td>
		</tr>

		<tr><td colspan="4">&nbsp;</td></tr>
	</table>
</div>

<div class="container">
    <div class="header"><span>[+] Notes on Profile Status</span>

    </div>
    <div class="content">
       
    </div>
</div>