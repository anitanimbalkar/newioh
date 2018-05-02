<div id="body_contantpatientpage" style="width:828px;height:auto;vertical-align: top;margin-top:0px;overflow: scroll;overflow-x:hidden;" > 
          
          	
          	<table cellpadding="0" cellspacing="0" style="width:100%;">
        		<td style="width:1%" >&nbsp;</td>
            	<td style="width:98%">
            		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="99%" class="bodyheading">Doctor Profile</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table> 
                </td>
        	</table>
        	<table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td >&nbsp;</td>
        	</tr>
        	</table>
        	<table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td style="width:1%;" >&nbsp;</td>
            	<td style="valign:top;width:100px;">
				 	<image src="<?php echo $obj_doctoruser->photo_c;   ?>" style="border:1px solid #000000;" height="120px" width="100px" />
				</td>
				<td style="valign:top;width:88%;vertical-align:top;">
					<table cellpadding="0"class="bodytext style2" cellspacing="0" style="width:100%;border:1px;vertical-align: top;line-height:24px;">
						<tr >
							<td style="width:1%;" >&nbsp;</td>
							<td style="width:15%;vertical-align: top;">Name</td>
							<td width="84%"><?php echo 'Dr.'.$obj_doctoruser->Firstname_c.' '.$obj_doctoruser->middlename_c.' '.$obj_doctoruser->lastname_c;  ?></td> 
                		</tr>
                		<tr>
							<td style="width:1%;" >&nbsp;</td>
							<td style="width:15%;vertical-align: top;">Gender</td>
							<td width="84%"><?php echo $obj_doctoruser->gender_c; ?></td> 
                		</tr>
                		<tr>
							<td style="width:1%;" >&nbsp;</td>
							<td style="width:15%;vertical-align: top;">Qualification</td>
							<td width="84%"><?php echo $doctoreducation; ?></td> 
                		</tr>
                		<tr>
							<td style="width:1%;" >&nbsp;</td>
							<td style="width:15%;vertical-align: top;">Specialization</td>
							<td width="84%"><?php echo $doctorspecialization; ?></td> 
                		</tr>
                		<tr>
							<td style="width:1%;" >&nbsp;</td>
							<td style="width:15%;vertical-align: top;">Experience</td>
							<td width="84%"><?php echo $doctorinfo->experience; ?> years</td>
                		</tr>
                		
					</table>
				</td>
				<td>&nbsp;</td>
        	</tr>
          </table>
           <table cellpadding="0" cellspacing="0" class="bodytext style2" style="width:100%;vertical-align: top;">
        	<tr>
        		
			<td style="width:10%;vertical-align: top;">&bull; My-self</td>
			<td width="88%"><?php echo $obj_doctor->doctorprofile_c; ?></td> 
			<td style="width:2%;" >&nbsp;</td>
        	</tr>
        	</table>
        <table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td >&nbsp;</td>
        	</tr>
        	</table>
         <table cellpadding="0"  cellspacing="0" style="width:100%;">
          <tr>
          	<td style="width:1%;" >&nbsp;</td>
          	<td width="99%">				
				<div  align="center"  style="height:11pt;width:85%;padding-top:3px;font-size:9pt;"  class="Leftmenuheading">
				<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">About Me</label></div>
			</td> 
			</tr>				
		</table>
		<table cellpadding="0" cellspacing="0" class="bodytext style2" style="width:100%;">
		<tr>
		<td style="width:45%;border-right:1px solid;">
		<table cellpadding="0" cellspacing="0" style="width:100%;vertical-align: top;text-align:left;">
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:38%;vertical-align: top;">&bull; Preferred Languages</td>
			<td width="63%"><?php echo $obj_doctoruser->languages_c; ?></td> 
			</tr>
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:38%;vertical-align: top;">&bull; Known Languages</td>
			<td width="63%"><?php echo $docotrlanguage; ?></td> 
			</tr>
			</table>
		</td>
		<td style="width:68%;vertical-align: top;"><table cellpadding="0" cellspacing="0" style="width:100%;vertical-align: top;text-align:left;">
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:15%;vertical-align: top;">&bull; Domain</td>
			<td width="84%"><?php echo $doctordomain; ?></td> 
			</tr>
			</table></td></tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td >&nbsp;</td>
        	</tr>
        	</table>
		<table cellpadding="0" cellspacing="0" style="width:100%;">
          <tr>
          	<td style="width:1%;" >&nbsp;</td>
          	<td width="99%">				
				<div  align="center"  style="height:11pt;width:85%;padding-top:3px;font-size:9pt;"  class="Leftmenuheading">
				<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">Cilinic Information</label></div>
			</td> 
			</tr>				
		</table>
		<table cellpadding="0" cellspacing="0" style="width:100%;vertical-align: top;align:right;" class="bodytext style2">
		<tr>
		<td style="width:45%;border-right:1px solid;vertical-align: top;align:left;">
			<table cellpadding="0" cellspacing="0" style="width:100%;vertical-align: top;">
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:20%;vertical-align: top;" >&bull; Address</td>
			<td  style="width:84%;vertical-align: top; text-align:left;"><?php echo $obj_doctoraddress->line1_c.', '.$obj_doctoraddress->nearlandmark_c.', '.$obj_doctoraddress->location_c.', '.$obj_doctoraddress->city_c.', '.$obj_doctoraddress->state_c.', '.$obj_doctoraddress->country_c.' '.$obj_doctoraddress->pin_c.'.';  ?></td> 
			</tr>
			</table>
		</td>
		<td style="width:68%;vertical-align: top;">
		<table cellpadding="0" cellspacing="0" style="width:100%;vertical-align: top;">
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:15%;vertical-align: top;">&bull; Phone</td>
			<td width="84%"><?php echo $obj_doctoraddress->phone_c; ?></td> 
			</tr>
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:15%;vertical-align: top;">&bull; Time</td>
			<td width="84%"><?php echo $doctortime; ?></td> 
			</tr>
			</table>
		</td></tr>
		</table>
		        <table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td >&nbsp;</td>
        	</tr>
        	</table>    	
		<table cellpadding="0" cellspacing="0" style="width:100%;">
          <tr>
          	<td style="width:1%;" >&nbsp;</td>
          	<td width="99%">				
				<div  align="center"  style="height:11pt;width:85%;padding-top:3px;font-size:9pt;"  class="Leftmenuheading">
				<label  style="font-family:Verdana, Arial, Helvetica, sans-serif; ">More Information</label></div>
			</td> 
			</tr>				
		</table>
		<table cellpadding="0" class="bodytext style2" cellspacing="0" style="width:100%;vertical-align: top;">
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:20%;vertical-align: top;">&bull; Hospitals Attached</td>
			<td width="84%"><?php echo $obj_doctor->nameattchedtohospitals_c; ?></td> 
			</tr>
			<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:20%;vertical-align: top;">&bull; Other Area of Practice</td>
			<td width="84%"><?php echo $obj_doctor->otherpractice_c; ?></td> 
			</tr>
		</table>
		 <table cellpadding="0" cellspacing="0" style="width:100%;">
        	<tr>
        		<td >&nbsp;</td>
        	</tr>
        	</table>
				<table cellpadding="0" class="bodytext style2" cellspacing="0" style="width:100%;vertical-align: top;">
<tr>
				<td height="20" width="80px"><a href="<?= $backurl;?>"><input type="button" style="width:73px;height:22px;" class="button" value="Back" /></a> </td></tr>	
</table>
         
</div>