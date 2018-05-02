<link type="text/css" href="/ayushman/assets/css/style.css" rel="stylesheet" media="screen" />
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

<div  id="divchemisteditprofile" class="content_bg" style=" width:100%; padding:0px;" align="center" > 
		<table width="790" border="0" cellspacing="0" cellpadding="0" id="chemistprofiletable" >
    		
			<tr>
				<td class="Heading_Bg" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;<?php echo ucfirst($objUser->Firstname_c).' '.ucfirst($objUser->lastname_c); ?>'s Registration Details</td>
			</tr>
			
			<tr>
				<td width="10%" align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Name :</td>
				<td width="33%" align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
					<?php echo $objUser->Firstname_c; ?>
					<?php echo $objUser->middlename_c; ?>
					<?php echo $objUser->lastname_c; ?>
				</td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">IndiaOnlineHealth Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->id; ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Email Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->email; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Contact No :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $objUser->isdmobileno1_c.'-'.$objUser->mobileno1_c; ?></td>
			</tr>
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
    		<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Store Name:</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->nameofmedical_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Store Contact No.:</td>
				<td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normal"><?php echo $objUser->isdphonenowork_c.'-'.$objUser->phonenowork_c; ?></td>
			</tr> 
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Address:</td>
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
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Shop Act License No. :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->shopactlicence_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Shop Act License Valid Till :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
				<?php 
				if($chemist->medicalactlicencevaliddate_c)
				{echo date('d M Y',strtotime($chemist->medicalactlicencevaliddate_c));} ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">FDA License No. :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->fdalicence_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">FDA License Valid Till :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php 
				if($chemist->fadlicencedatetill_c)
				echo date('d M Y',strtotime($chemist->fadlicencedatetill_c)); ?></td>
			</tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr>
				<td class="Heading_Bg" colspan="4">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>Details of Pharmacist</td>
			</tr>
			
			<tr>
				<td width="10%" align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Name :</td>
				<td width="33%" align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal">
					<?php echo $chemist->pharmacistfirtsname_c; ?>
					<?php echo $chemist->pharmacistmiddlename_c; ?>
					<?php echo $chemist->pharmacistlastname_c; ?>
				</td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Contact No :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->pharmacistisdmobilenumber_c.'-'.$chemist->pharmacistmobilenumber_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Email Id :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->pharmacistemailid_c; ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Qualification:</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->qualification_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Year of Passing :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->yearofpassing_c; ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Registration No. :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->registerpharmacistnumber_c; ?></td>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Registration Valid Till :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php if($chemist->pharmacistlicencevalidtill_c)echo date('d M Y',strtotime($chemist->pharmacistlicencevalidtill_c)); ?></td>
			</tr>
			
			<tr>
				<td align="left" style="padding-left:10px;padding-top:10px" class="bodytext_bold">Registering Authority :</td>
				<td align="left" style="padding-left:10px; padding-top:10px" class="bodytext_normal"><?php echo $chemist->registeringauthorityname_c; ?></td>
			</tr>
			
			<tr><td height="2" colspan="4" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
			<tr><td colspan="4">&nbsp;</td></tr>
			
			<tr align="left">
				<td align="left" style="padding-left:10px; padding-top:10px"><input id="backbutton" align="left" class="button" onclick="window.location = '<?php echo $refer; ?>';" height="22" style="width: 150px; height: 25px; " value="Back"/></td>
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
