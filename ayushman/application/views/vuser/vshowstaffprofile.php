 <link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
  <script src="/ayushman/assets/js/jquery-ui.min.js"></script>

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

<div id="body_contantpatientpage" style="width:100%;height:80%;overflow-y:auto;align:left;"> 
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td style="border-top:2px solid #0d6596; " class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;<?php echo ucfirst($objUser->Firstname_c).' '.ucfirst($objUser->lastname_c); ?>'s Registration Details</td>
		</tr>
	</table>
 	<div id="tabs" style="float:left;font-size:9pt;vertical-align:top;height:auto;width:99%;position:relative;overflow-y:auto;none repeat scroll 0 0 #E8E8E8;border:0px;background:transparent;overflow-y:auto;">
		<table>
			<tr>
				<td style="valign:top;">
					 <image src="<?php echo $staff->photo_c;   ?>" style="border:1px solid #000000;" height="120px" width="100px" />
				</td>
				<td width="100%" align="left">
					<table valign="top">
						
						<tr  class="bodytext">                
						  	<td width="130px" >Name </td>
						  	<td align="left"style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $staff->Firstname_c.' '.$staff->middlename_c.' '.$staff->lastname_c;  ?>
						  	</td> 
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px" >Gender</td>
						  	<td align="left"style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"> <?= trim($staff->gender_c);?>
						  	</td>
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px">Date of Birth</td>
						   	<td align="left" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php if($staff->DOB_c) echo date('d-M-Y',strtotime($staff->DOB_c)) ;  ?> 
						  	</td>				  
						</tr>
						<tr class="bodytext">
							<td width="130px">Blood Group</td>
							<td align="left" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?= trim($staff->bloodgroup_c);  ?>
							</td>
						</tr>
						<tr  class="bodytext">                 
						  	<td width="130px">Marital status</td>
						  	<td align="left"style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?= trim($staff->maritalstatus_c);  ?>
						  	</td>
						</tr>
						<tr  class="bodytext">                 
						 	<td width="130px">Preferred Language</td> 
						  	<td align="left" style="background: transparent;border:none;font-weight:bold;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?= trim($staff->languages_c); ?>
						  	</td>  
						</tr>
					</table>
				</td>
			</tr>
		</table>
 		<table cellpadding="0" cellspacing="0" style="width:100%;">
			<tr>
				
					
					<div id="toggleTextDemographic" style="display: none">
						<table  cellpadding="0" cellspacing="0" style="width:100%;"align="left">
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td style="width:1%;" >&nbsp;</td>
								<td style="width:99%;" >
									<table  cellpadding="0" cellspacing="0" style="width:100%;"align="left">		
										<tr>
											<td colspan="4"><div  align="left" style="border-top:2px solid #0d6596; width: 98%; height: 18px; " class="Heading_Bg"> Home Contact Details</div></td> 
										</tr>
										<tr class="bodytext" align="left">
											<td width="15%">Phone Home</td>
											<td width="35%" style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $staff->phonenohome_c;  ?></td>   
										</tr>
										<tr class="bodytext" align="left">
											<td >Mobile No1</td>
											<td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $staff->mobileno1_c;  ?></td>
											<td width="15%"> Mobile No2 </td>
											<td width="35%"style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $staff->mobileno2_c;  ?></td>                 
										</tr>				
										<tr class="bodytext" align="left">
											<td >Line 1 </td>
											<td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->line1_c;  ?></td>        
											<td >Near Landmark </td>
											<td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->nearlandmark_c;  ?></td>           
										</tr>				
										<tr class="bodytext" align="left">
											<td >Location </td>
											<td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->location_c;  ?></td>  
											<td> City  </td>
											<td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->city_c;  ?></td>               
										</tr>
										<tr class="bodytext" align="left">
											  <td >State </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->state_c;  ?>
											  </td>  
											  <td> Pincode </td><td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->pin_c;  ?></td>               
										</tr>
										<tr class="bodytext" align="left">
											  <td >Country </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddhome->country_c;  ?>
											  </td>			               
										</tr>
										<tr class="bodytext" align="left" style="padding-top:10px;">
												<td colspan="13" style="padding-top:2px">
													<div  align="left" style="border-top:2px solid #0d6596; width: 98%; height: 18px; " class="Heading_Bg">  Office Contact Details
													</div>
												</td> 
										</tr>				
											<tr class="bodytext" align="left">
											  <td >Line 1 </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->line1_c;  ?>
											  </td>   
											   <td >Near Landmark </td> <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->nearlandmark_c;  ?>
											  </td>                 
											</tr>		
											<tr class="bodytext" align="left">
											  <td >Location </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->location_c;  ?>
											  </td>  
											  <td> City </td><td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->city_c;  ?>
											  </td>
											</tr>
											<tr class="bodytext" align="left">
											  <td >State </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->state_c;  ?>
											  </td>  
											  <td> Pincode </td><td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->pin_c;  ?> </td>               
											</tr>
											<tr class="bodytext" align="left">
											  <td >Country </td>
											  <td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $objaddwork->country_c;  ?>
											  </td>
											   <td >Phone Work </td><td style="background: transparent;border:none;width:300px; line-height:9pt; height:15px;" class="bodytext_normal"><?php echo $staff->phonenowork_c; ?>
											  </td>   		               
											</tr>
											
											
											
				</table></td>
							</tr>
					
		
						</table>
					</div>
				</td>
				</tr>
			<tr>
				<td>
						
					&nbsp;
				</td>
				<tr align="left">
			<td align="left" style="padding-left:10px;" ><input id="backbutton" align="left" type="button" onclick="window.location = '<?php echo $refer; ?>';"  class="button" height="22" style="width: 80px; height: 25px; " value="Back"/></td>
		</tr>
			</tr>
	 		
   
 </div>
 <div class="container">
    <div class="header"><span>[+] Notes on Profile Status</span>

    </div>
    <div class="content">
       
    </div>
</div>