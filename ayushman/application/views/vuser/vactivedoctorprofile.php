<link type="text/css" href="/ayushman/assets/css/toggle.css" rel="stylesheet" media="screen" />
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
<div id="body_contantpatientpage" style="width:100%;height:auto;vertical-align: top;margin-top:0px;" > 
    
	<table cellpadding="0" cellspacing="0" style="width:100%;">
    	<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px">Doctor Profile</td></tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px; padding-top:10px">Name:</td>
			<td class="bodytext_normal" style="padding-left:10px; padding-top:10px"> <?php echo $obj_doctorprofile->doctorname; ?></td>
			<td rowspan="7" align="right" style="padding-right:30px; padding-top:10px"><image src="<?php echo $obj_doctorprofile->photo_c;   ?>" style="border:1px solid #000000; height:130px; width:120px"/></td>
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Gender:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $obj_doctorprofile->gender_c; ?></td> 		
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Qualification:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctoreducation; ?></td> 							
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Domain:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctordomain;?></td> 
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Specialization:</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $doctorspecialization;?> </td> 								
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Experience (In years):</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">
				<?php echo $obj_doctorprofile->experience?>
			</td>
		</tr>
		
		<tr style="vertical-align: top;">
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Known Languages</td>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">
				<?php if($docotrlanguage)
					echo $docotrlanguage; 
				else  echo "No information has been provided";
				?>
			</td>
		</tr>
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px">About Me</td></tr>
		
		<tr><td colspan="3" class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php echo $obj_doctorprofile->profile_c; ?></td></tr>
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr><td colspan="3" class="Heading_Bg" style="padding-left:10px;">Clinic Information</td></tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px;">Address:</td>
			<td colspan="2" class="bodytext_normal" style="padding-left:10px;padding-top:10px;word-wrap;">
				<?php
					echo $obj_doctorprofile->line1_c;
					if($obj_doctorprofile->nearlandmark_c)echo", ";
						echo $obj_doctorprofile->nearlandmark_c;
					if($obj_doctorprofile->location_c)echo", ";
						echo $obj_doctorprofile->location_c;
					if($obj_doctorprofile->city_c)echo", ";
						echo $obj_doctorprofile->city_c;
					if($obj_doctorprofile->state_c)echo", ";
						echo $obj_doctorprofile->state_c;
					if($obj_doctorprofile->country_c)echo", ";
						echo $obj_doctorprofile->country_c;
					if($obj_doctorprofile->pin_c)echo", ";
						echo $obj_doctorprofile->pin_c;
					if(($obj_doctorprofile->nearlandmark_c) or ($obj_doctorprofile->location_c) or ($obj_doctorprofile->city_c) or ($obj_doctorprofile->state_c)or ($obj_doctorprofile->country_c)or($obj_doctorprofile->pin_c))echo"."; else  echo "No information has been provided";
				?>
			</td>
		</tr>
		
		<tr>
			<td class="bodytext_normal" style="padding-left:10px;padding-top:10px">Phone:</td>
			<td colspan="2" class="bodytext_normal" style="padding-left:10px;padding-top:10px"><?php  echo $obj_doctorprofile->phone;?></td>
		</tr>
		
		<tr><td colspan="3">&nbsp;</td></tr>
		
		<tr align="left">
			<td align="left" style="padding-left:10px;padding-top:10px"> <input id="backbutton" align="left" type="button" onclick="window.location = '<?php echo $refer; ?>';" class="button" height="22" style="width: 150px; height: 25px; " value="Back"/></td>
		</tr>
		
    </table>

	
</div>
<div class="container">
    <div class="header"><span>[+] Notes on Profile Status</span>

    </div>
    <div class="content">
       
    </div>
</div>