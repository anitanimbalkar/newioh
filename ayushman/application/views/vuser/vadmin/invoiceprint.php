<!Doctype html>
<html>
<head>
<title>Invoice...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
@media only print
{ 
  #btnprint {display: none !important; 
  }
  #btn {display: none !important; 
  }
  #btnsave {display: none !important; 
  }
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	if(<?php echo $charge1;?>  == 0 ){
		//document.getElementById('d1').style.visibility = "hidden";
		$("#d1").hide();
	}
	if(<?php echo $charge2;?> == 0 ){
		//document.getElementById('d2').style.visibility = "hidden";
		$("#d2").hide();
	}
	if(<?php echo $charge3;?> == 0 ){
		//document.getElementById('d3').style.visibility = "hidden";
		$("#d3").hide();
	}
	if(<?php echo $charge4;?> == 0 ){
		//document.getElementById('d4').style.visibility = "hidden";
		$("#d4").hide();
	}
	if(<?php echo $charge5;?> == 0 ){
		//document.getElementById('d5').style.visibility = "hidden";
		$("#d5").hide();
	}
	if(<?php echo $charge6;?> == 0 ){
		//document.getElementById('d6').style.visibility = "hidden";
		$("#d6").hide();
	}
	if(<?php echo $charge7;?> == 0 ){
		//document.getElementById('d7').style.visibility = "hidden";
		$("#d7").hide();
	}
	if(<?php echo $charge8;?> == 0 ){
		//document.getElementById('d8').style.visibility = "hidden";
		$("#d8").hide();
	}
	
	if(<?php echo $charge9;?> == 0 ){
		//document.getElementById('d9').style.visibility = "hidden";
		$("#d9").hide();		
	}
	if(<?php echo $charge10;?> == 0 ){
		//document.getElementById('d10').style.visibility = "hidden";
		$("#d10").hide();
	}
	
	if  (<?php echo $per0; ?> > 0 ){/* show tax element*/	}		
	else
		//document.getElementById('tax1').style.visibility = "hidden";
		$("#tax1").hide();
	if (<?php echo $per1; ?>  > 0 ){/* show tax element*/	}		
	else
		//document.getElementById('tax2').style.visibility = "hidden";
		$("#tax2").hide();
	if (<?php echo $per2; ?> > 0 ){/* show tax element*/	}		
	else
		//document.getElementById('tax3').style.visibility = "hidden";
		$("#tax3").hide();
	if (<?php echo $per3; ?> > 0 ){/* show tax element*/	}		
	else
		//document.getElementById('tax4').style.visibility = "hidden";
		$("#tax4").hide();
	if (<?php echo $per4; ?> > 0 ){/* show tax element*/	}		
	else
		//document.getElementById('tax5').style.visibility = "hidden";	
		$("#tax5").hide();
});

function printBill(){
    //window.print();
    //parent.location.reload(true);
    //window.history.back();
	data = $('#ipdbill').html();
	var mywindow = window.open('', 'print','height=600,width=800');
			mywindow.document.write('<html><head><title> Prescription </title>');
			//mywindow.document.write('</head><body style="font-size:14px;">');
			mywindow.document.write('</head><body>');
			mywindow.document.write(data);
			mywindow.document.write('</body></html>');
			
			mywindow.print();
			mywindow.close();
			return true;
  }

function cancelBtn()
  {
	window.self.close();
	var spid = document.getElementById("spusid").value;
	var fdate = '';
	var tdate = '';
	
	//parent.window.location='/ayushman/cinvoice/viewinvoicedetails?spid='+spid+'&fdate='+fdate+'&tdate='+tdate;
  }

</script>
</head>
<body>
<input type="hidden" id="spusid" value="<?php echo $spuserid;?>"/>
  <div id="btn" style="width:100%;align:right;margin-left:-2%;">
      <input type="button" onClick="printBill();" id="btnprint" value="Print" style="margin:1px;align:top;height:35px;width:80px;float:right;text-align:center;"  class="button" />
      <!--<input type="button" onClick="cancelBtn();" id="cancelbtn"  class="button" style="margin-right:1px;;width:80px;margin:1px;height:35px;text-align:center;float:right;" value="Close" />-->
    <br>
    <br>
    <br>
    </div>

  <div id="ipdbill">
<table width="99.5%" height="15" align="left" cellpadding="0" cellspacing="0">
     <!--<tr>
		<td>
			<div style="width:99.5%">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr width="100%">
						<td>
							<img id="pat_img"  src="/ayushman/assets/images/ayushman_logo.png" >  
						</td>
					</tr>
				</table>
			</div>	
		</td>
	</tr>-->
	<tr>
		<td>
		  <div style="width:100%;">
		    <table width="100%" >
              <tr>
                <td><div id="name" style="height:auto;width:100%;"> <font color="1e90ff">
					<label id='lbldoctorname' style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;width:100%;">
                   
					</label>
					<label id='lblqualification' style="font:bold;font-size:10pt;font-family:arial;"></label>
					</font>
			</div></td>
              </tr>
			  </table>	
                        <table  style="height:auto;width:100%;vertical-align:top; font-weight:bold;font-size:9pt;font-family:arial;">
							<tr>
								<td  colspan="3" align="left" style="height:auto;width:70%;vertical-align:top">
									<img id="pat_img"  src="/ayushman/assets/images/ayushman_logo.png" > 
									<div align="center" style="font-size:18px;font-weight:bold">INVOICE</div>
								</td>
							</tr>						  
							<tr>
									<td rowspan="3" rowspan="3" align="center" style="height:auto;width:70%;vertical-align:top">
																			
									</td>
																   
							  </tr>  
								<tr>
									<td align="right"  style="height:auto;vertical-align:top">
										Invoice number:																					
									</td>
									<td align="left" style="height:auto;vertical-align:top; font-weight:bold;font-size:9pt;font-family:arial;">
										<?php	echo $invoiceid;?>
									</td>							   
							  </tr>
							   <tr>
									<td  align="right" style="height:auto;vertical-align:top">
										Invoice date:												
									</td>
									<td align="left" style="height:auto;vertical-align:top; font-weight:bold;font-size:9pt;font-family:arial;">
																				
											<?php	echo $invoicedate;?>
									</td>							   
							  </tr>
                        </table>
                        <table border="2" style="height:auto;width:100%;padding-top:5px;">
							<tr>
								<td colspan="4" style="background:#EC7063"><b> </b>
								</td>
								
							</tr>
							<tr>
								<td  width="17%" style="vertical-align:top"><label style="font:bold;font-weight:bold;font-size:9pt;font-family:arial;">Recipient Name:</label>
								</td>
								<td  width="33%">								
									<label  style="font-size:9pt;font-family:arial;">
									<?php echo $spneme;?>
									</label>                        
								</td>
								<td  width="17%" style="vertical-align:top"><label style="font:bold;font-weight:bold;font-size:9pt;font-family:arial;">Supplier Name:</label>
								</td>
								<td  width="33%">								
									<label  style="font-size:9pt;font-family:arial;">
									Ayushman Pvt Ltd
									</label>                        
								</td>
							</tr>
							<tr>
								<td width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Recipient Address:</label>                           
								</td>
								<td  width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
									<?php echo $spadd;?>
									</label>         
								</td>
								<td width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Supplier Address:</label>                           
								</td>
								<td width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
									Suite 5, Building A, Ramyanagari, Bibwewadi, Pune 411037
									</label>         
								</td>
							</tr>
							<tr>
								<td width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Recipient Phone No:</label>                           
								</td>
								<td  width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
									<?php echo $spmobile;?>
									</label>         
								</td>
								<td width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Supplier Phone No:</label>                           
								</td>
								<td  width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
									020 2422 5288
									</label>         
								</td>
							</tr>
							<tr>
								<td  width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Recipient GSTIN No:</label>                           
								</td>
								<td  width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
								NA
									</label>         
								</td>
								<td width="17%" style="vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Supplier GSTIN No:</label>                           
								</td>
								<td  width="33%">
									<label  style="font-size:9pt;font-family:arial;">                               
									27AAJCA7271R1ZV
									</label>         
								</td>
							</tr>
							<tr>
								<td  width="17%" style="vertical-align:top"><label style="font-weight:bold;font-size:9pt;font-family:arial;">Service Location:</label>
								</td>	
								<td colspan="3">								
										<label  style="font-size:9pt;font-family:arial;">                              
									Pune, Maharashtra
										</label>                        
								</td>
                             </tr>
							
                       </table>
						<br>
                       
                
              
            <table width="100%" border="2" cellspadding="0" cellspacing="0" style=" font-size:10pt;font-family:arial;">
                <tr style="background:#EC7063;" >
                   <b>  <td width="5%" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> S.No </td>
                        <td  colspan="2" width="50%" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Description </td>
						<td width="10%" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;">SAC </td>
						<td width="10%" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Unit Price </td>
                        <td width="10" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;">Quantity</td>
						<td width="15%" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Line Total</td>
                       </b>
                </tr>
				<tr id="d1">
						<td align="right">1</td>
						<td colspan="2" ><?php echo $description1;?></td>
						<td align="right">998319</td> 
						<td align="right"><?php echo $uprice1; ?></td>
						<td align="right"><?php echo $quantity1; ?></td>
						<td align="right"><?php echo $charge1; ?></td>
						
				</tr>  
				<tr  id="d2">
						<td align="right">2</td>
						<td colspan="2" ><?php echo $description2;?></td>
						<td align="right">998319</td>  
						<td align="right"><?php echo $uprice2; ?></td>
						<td align="right"><?php echo $quantity2; ?></td>
						<td align="right"><?php echo $charge2; ?></td>
				</tr>
				<tr  id="d3">
						<td align="right">3</td>
						<td colspan="2"><?php echo $description3;?></td>
						<td align="right">998319</td>  
						<td align="right"><?php echo $uprice3; ?></td>
						<td align="right"><?php echo $quantity3; ?></td>
						<td align="right"><?php echo $charge3; ?></td>
				</tr>
				<tr id="d4" >
						<td align="right">4</td>
						<td colspan="2"><?php echo $description4;?></td>
						<td align="right">998319</td>     
						<td align="right"><?php echo $uprice4; ?></td>
						<td align="right"><?php echo $quantity4; ?></td>
						<td align="right"><?php echo $charge4; ?></td>
				</tr>
				<tr  id="d5">
						<td align="right">5</td>
						<td colspan="2"><?php echo $description5;?></td>
						<td align="right">998319</td>
						<td align="right"><?php echo $uprice5; ?></td>
						<td align="right"><?php echo $quantity5; ?></td>
						<td align="right"><?php echo $charge5; ?></td>
				</tr>
				<tr  id="d6">
						<td align="right">6</td>
						<td colspan="2"><?php echo $description6;?></td>
						<td align="right">998319</td> 
						<td align="right"><?php echo $uprice6; ?></td>
						<td align="right"><?php echo $quantity6; ?></td>
						<td align="right"><?php echo $charge6; ?></td>
				</tr>
				<tr  id="d7">
						<td align="right">7</td>
						<td colspan="2"><?php echo $description7?></td>
						<td align="right">998319</td> 
						<td align="right"><?php echo $uprice7; ?></td>
						<td align="right"><?php echo $quantity7; ?></td>
						<td align="right"><?php echo $charge7; ?></td>
				</tr>
				<tr  id="d8">
						<td align="right">8</td>
						<td colspan="2"><?php echo $description8;?></td>
						<td align="right">998319</td>
						<td align="right"><?php echo $uprice8; ?></td>
						<td align="right"><?php echo $quantity8; ?></td>
						<td align="right"><?php echo $charge8; ?></td>
				</tr>
				<tr  id="d9">
						<td align="right">9</td>
						<td colspan="2"><?php echo $description9; ?></td>
						<td align="right">998319</td>  
						<td align="right"><?php echo $uprice9; ?></td>
						<td align="right"><?php echo $quantity9; ?></td>
						<td align="right"><?php echo $charge9; ?></td>
				</tr>
				<tr id="d10" >
						<td align="right">10</td>
						<td colspan="2"><?php echo $description10; ?></td>
						<td align="right">998319</td> 
						<td align="right"><?php echo $uprice10; ?></td>
						<td align="right"><?php echo $quantity10; ?></td>
						<td align="right"><?php echo $charge10; ?></td>
				</tr>
			    <tr>
						<td colspan="7"></td>                
				</tr>
				<tr  style="background:#85C1E9; font-size:9pt;">
						<td align="right"  colspan="6"><b>Sub-Total</b></td>
						<td align="right"><?php echo $totalamt; ?></td>
				</tr>
				<tr>
						<td colspan="7"></td>
				</tr>
				<tr id="tax1" style="font-size:9pt;">
						<td colspan="4"></td>
						<td align="right"><?php echo $taxdesc1; ?> </td>
						<td align="right"><?php echo $per0; ?>% </td>
						<td align="right"><?php echo $taxnet1; ?></td>
				</tr>
				<tr id="tax2" style="font-size:9pt;">
						<td colspan="4"></td>
						<td align="right"><?php echo $taxdesc2; ?>  </td>
						<td align="right"><?php echo $per1; ?>%</td>
						<td align="right"><?php echo $taxnet2; ?></td>
				</tr>
				<tr id="tax3" style="font-size:9pt;">
						<td colspan="4"></td>
						<td align="right"> <?php echo $taxdesc3; ?> </td>
						<td align="right"> <?php echo $per2; ?>%</td>
						<td align="right"><?php echo $taxnet3; ?></td>
				</tr>
				<tr id="tax4" style="font-size:9pt;">
						<td colspan="4"></td>
						<td align="right"> <?php echo $taxdesc4; ?> </td>
						<td align="right"> <?php echo $per3; ?>%</td>
						<td align="right"><?php echo $taxnet4; ?></td>
				</tr>
				<tr id="tax5" style="font-size:9pt;">
						<td colspan="4"></td>
						<td align="right"> <?php echo $taxdesc5; ?>  </td>
						<td align="right"><?php echo $per4; ?>%</td>
						<td align="right"><?php echo $taxnet5; ?></td>
				</tr>
				<tr>
						<td colspan="7"></td>  
				</tr>
				<tr style="background:#85C1E9; font-size:9pt;">
						<td align="right"  colspan="6"><b>Grand total</b> </td>
						<td align="right"><?php echo $totaltaxamt; ?></td>          
				 </tr>								
			</table>
                </form>                                 
            <br> <table width="100%">
					<tr>
						<td width="100%">
							Thank you,
						</td>						
					</tr>
				</table>
				<br> 
				<table width="100%">
					
					<tr>
						<td  width="70%">
						</td>
						<td width="30%" align="center">
							<b>
								Abhijeet Sikcchi<br>
								Chief Sales & Marketing
								Ayushman Pvt Ltd</b>
							
						</td>
					</tr>           
				</table>
				<br>
					<table width="100%">
					<tr>
						
						<td align="left" width="27%">
							Ayushman Pvt. Ltd.
						</td>
							
						<td  align="center" width="33">
							  CIN: U85100PN2011PTC140488
						</td>
							
						<td  align="right" width="40%">
							  Website: www.indiaonlinehealth.com
						</td>
					</tr>
					
					</tr>
				</table>
		  </div>	
              
      	</td>
	</tr>
  
	</table>
</div>
</body>
</html>
