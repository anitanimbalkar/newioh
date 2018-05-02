<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function() {$(function() {
			$( "#fromdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true, dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				    $( "#fromdate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				
			$( "#fromdt" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true, dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

			$( "#todt" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

	});	
});		
function generateblankreceipt(){
			if(document.getElementById('noofreceipt').value == 0){
				showNotification('300','20','no of receipt','Please enter no of receipt more than 0.','notification','diaconfirmation',1000);
			}else if(document.getElementById('fromdate').value == ''){
				showNotification('300','20','receipt date','Receipt date field is blank. Please enter receipt date and retry.','notification','diaconfirmation',1000);
			}else if(document.getElementById('recformat').value == 'select'){
				showNotification('300','20','formato of receipt','Please select Format of receipt.','notification','diaconfirmation',1000);
			}else if(document.getElementById('discrip').value == ''){
				showNotification('300','20','description of receipt','Description of receipt field is blank. Please enter Description of receipt and retry.','notification','diaconfirmation',1000);
			}else if(document.getElementById('noofreceipt').value == ''){
				showNotification('300','20','no of receipt','No of receipt field is blank. Please enter no of receipt and retry.','notification','diaconfirmation',1000);
			}else{
				if(document.getElementById('fromdt').value != ''){
						if(document.getElementById('fromdt').value >= document.getElementById('todt').value){
						showNotification('300','20','receipt date','Please enter correct date for Validity period and retry.','notification','diaconfirmation',1000);
					}else{
							$.ajax({
									type:"GET",
									url: "/ayushman/crechargebyreceipt/generatereceipts",
									data: $("#receiptform").serialize(),
									success: function(data) {
										console.log(data);
										showNotification('300','20','no of receipt','Receipt created successfully.','notification','diaconfirmation',5000);
										receiptform.reset();
									},
							});
					}
				}else{
						$.ajax({
							type:"GET",
							url: "/ayushman/crechargebyreceipt/generatereceipts",
							data: $("#receiptform").serialize(),
							success: function(data) {
								console.log(data);
								showNotification('300','20','no of receipt','Receipt created successfully.','notification','diaconfirmation',5000);
							receiptform.reset();
							},
						});
				}
			}			
	}	
	
</script>
<style>
.textareaformat{
	height:95%; 	
	width: 98%;
	font-size: 14px; 
	resize:none;
}
</style>
	<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
	<table>
	   <tr>
        
        <td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp; Generate Cash Receipt</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		</td>
		</tr>	
		
	</table>
	<hr/>
		<form id="receiptform" >
							<table width="100%"  cellspacing="0" cellpadding="0" class="table_roundBorder">
								  <tr>
									<td  width="%" height="40" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;" ><img src="/ayushman/assets/images/bullet.png" width="7" height="7"></td>
									<td align="left" colspan="2" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Open Receipt </td>
									<td align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:10px;">
								 </tr>	
								  <tr>
								   <td rowspan="7" align="left" valign="top">&nbsp;</td>
									<td height="33" align="left" valign="middle" class="bodytext_bold">Date* </td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<input name="fromdate" id="fromdate" placeholder="Select date" type="text" value="" class="textarea"/></td>
								 </tr>														  								 
								 <tr>
									<td height="33" align="left" valign="middle" class="bodytext_bold">No.of Receipts* </td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<input type="number" min="1" name="noofreceipt" id="noofreceipt" class="textarea" /> </td>
								  </tr>		
								<tr>
									<td height="33" align="left" valign="middle" class="bodytext_bold">Amount </td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<input type="number" min="0" max="99999999" type="number" name="amt" id="amt" class="textarea" /> </td>
								  </tr>	
								  <tr>
									<td height="33" align="left" valign="middle" class="bodytext_bold">Issued to</td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<select id="issueto" name="issueto"  class="textarea" style="width:20%">
											<option value="sales">Sales</option>
											<?php 
												$objCorporate = ORM::factory('discountgroup')->where('active_c','=',1)->where('id','!=',-1)->find_all();
												foreach($objCorporate as $objRelation){
													echo '<option value="'.$objRelation->id.'">'.$objRelation->groupname_c.'</option>';
												}
												
											?>
									</select></td>
								 </tr>
								 <tr>
									<td class="bodytext_bold">Receipt no format*</td>
									<td class="bodytext_bold">:</td>									
									<td align="left" valign="middle" class="bodytext_normal">
										<select id="recformat" name="recformat"  class="textarea" style="width:20%">
											<option value="select">Select</option>
											<?php 
												$objCorporate = ORM::factory('rcptstring')->find_all();
												foreach($objCorporate as $objRelation){
													echo '<option value="'.$objRelation->stringname_c.'">'.$objRelation->stringname_c.'</option>';
												}
												
											?>
									</select>
									</td>
								 </tr>
								  <tr>
									<td height="33" align="left" valign="middle" class="bodytext_bold">Validity period </td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<input name="fromdt" id="fromdt" class="textarea" placeholder="From date"/>
									<input name="todt" id="todt" class="textarea" placeholder="To date"/> </td>
								  </tr>	
								  <tr>
									<td height="33" align="left" valign="middle" class="bodytext_bold">Description*</td>
									<td width="2%" height="30" align="left" valign="middle" class="bodytext_bold">:</td>
									<td width="81%" colspan="2" align="left" valign="middle" class="bodytext_normal">
									<textarea class="textareaformat" maxlength="100" row="5" name="discrip" id="discrip" value="" style="width:40%; bgcolor:white"></textarea></td>
								 </tr>
								  <tr bgcolor="#ecf8fb">
									<td height="40" colspan="2" align="right" valign="middle"></td>
									<!--	<td height="40" colspan="2" align="left" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-radius:0 0 3px 3px; padding-right:10px;"><button class="button" value="Print" style="width:100px;" onclick="" >Print</button></td>-->
									<td height="40" colspan="2" align="right" valign="middle">
									<input type="button" class="button" value="Generate" style="width:100px;" onclick="generateblankreceipt();" />
									</td>
								 </tr>
							  </table>
							 
			</form>
					
</div>
