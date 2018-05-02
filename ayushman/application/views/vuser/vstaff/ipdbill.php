<html>
<head>
<title>Bill...</title>
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
      convertAndsavePDf();
});


function printBill(){
    window.print();
    parent.location.reload(true);
    window.history.back();
  }

function convertAndsavePDf(){
  var patientuserid=$('#patientsid').val();
  var caseno=$('#casesheetno').val();
  var billid=$('#billid').val();
    var hospitalid=$('#hospitalid').val();


    elm = $( "#ipdbill" ).clone(true);

    var htmlfile={htmlfile:elm.html(),patientuseridPDF:patientuserid,doctoruseridPDF:hospitalid,caseno:caseno,billidPDF:billid};
   //alert(htmlfile);
    $.ajax({
        type: 'post',
        data:htmlfile,
        url: "/ayushman/cbill/saveBillPdf",
        datatype: 'html', 
        success: function (data) {
          
        },
      error: function (req, status, error) {
      }
    });
  }
function cancelbtn()
  {
     parent.location.reload(true);
         //window.history.back();

  }

</script>
</head>
<body>
  <div id="btn" style="width:100%;align:right;margin-left:-2%;">
      <input type="button" onClick="printBill();" id="btnprint" value="Print" style="margin:1px;align:top;height:35px;width:80px;float:right;text-align:center;"  class="button" />
      <button onClick="cancelbtn()" id="cancelbtn"  class="button" style="margin-right:1px;;width:80px;margin:1px;height:35px;text-align:center;float:right;" />Cancel</button>
    <br>
    <br>
    <br>
    </div>

  <div id="ipdbill">
<table width="99.5%" height="15" border="2" align="left" cellpadding="0" cellspacing="0">
            <input name="patientsid" id="patientsid" class="textarea" type="hidden" value="<?php echo "$patientsid"; ?>" size="8"/>
            <input name="billid" id="billid" class="textarea" type="hidden" value="<?php echo "$billid"; ?>" size="8"/>
            <input name="casesheetno" id="casesheetno" class="textarea" type="hidden" value="<?php echo "$refid"; ?>" size="8"/>
            <input name="hospitalid" id="hospitalid" class="textarea" type="hidden" value="<?php echo "$refuserid_c"; ?>" size="8"/>
     
	<tr>
		<td>
			<div style="width:99.5%">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr >
            <td>
            <img style="float:left;widht:auto;" id="pat_img"  src="<?php echo $header_cashier;?>" >  
					   </td>
          </tr>
				</table>
			</div>		</td>
	</tr>
	<tr>
		<td>
		  <div style="width:100%;">
		    <table width="100%">
              <tr>
                <td><div id="name" style="height:auto;width:100%;"> <font color="1e90ff">
                  <label id='lbldoctorname' style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;width:100%;">
                   
                </label>
                    <label id='lblqualification' style="font:bold;font-size:10pt;font-family:arial;"></label>
                  </font>
                        <table style="height:auto;width:100%;padding-top:5px;">
                          <tr>
                            <td style="height:auto;width:60%;vertical-align:top"><div style="float:left;width:50%;margin-left:20px;">
                                <label style="font-weight:bold;font-size:9pt;font-family:arial;">Bill Number:</label>
                                <label  style="font:bold;font-size:9pt;font-family:arial;">
                                    <?php echo "$billid";?>
                              </label>
                            </div></td>

                            <td style="height:auto;width:40%;vertical-align:top"><div style="float:right;width:50%;margin-left:20px;">
                                <label style="font-weight:bold;font-size:9pt;font-family:arial;">Bill Date:</label>
                                <label  style="font:bold;font-size:9pt;font-family:arial;">
                                    <?php echo date('d M Y');?>
                              </label>
                            </div></td>
                           
                          </tr>
                          
                        </table>
                  <hr  style="height:2px;background-color:black;border:none;"/>
                        <table style="height:auto;width:100%;padding-top:5px;">
                          <tr>
                            <td width="60%" style="height:auto;width:20%;vertical-align:top"><label style="font:bold;font-weight:bold;font-size:9pt;font-family:arial;">Patient name:</label>
                                <label  style="font-size:9pt;font-family:arial;">
                               <?php echo "$onlypatientname";?>
                                </label>                        
                                      </td>
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Age:</label>                           
							
							 <label  style="font-size:9pt;font-family:arial;">
                                 <?php echo "$age";?>
                                </label>         
                              </td>

                              <td width="60%" style="height:auto;width:20%;vertical-align:top"><label style="font-weight:bold;font-size:9pt;font-family:arial;">Gender:</label>
                                <label  style="font-size:9pt;font-family:arial;">
                               <?php echo "$gender";?>
                                </label>                        
                                      </td>
                             
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Mobile No:</label>                           
              
               <label  style="font-size:9pt;font-family:arial;">
                                 <?php echo "$mobileno1";?>
                                </label>         
                              </td>
                          </tr>
                          <tr>
						  <td width="40%" style="height:auto;width:20%;vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Reg No :</label>                           
							
							 <label  style="font-size:9pt;font-family:arial;">
                                 <?php echo "$patientsid";?>
                                </label>         
                              </td>
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Case No:</label>                           
              
               <label id="refid" style="font-size:9pt;font-family:arial;">
                                 <?php echo "$refid";?>
                              </label>         
                            </td>

                            <td width="60%" style="height:auto;width:20%;vertical-align:top"><label style="font-weight:bold;font-size:9pt;font-family:arial;">Admit Date:</label>
                                <label  style="font-size:9pt;font-family:arial;">
                                               <?php echo "$admitdate_c";?>                 </label>                            </td>
                            <td width="40%" style="height:auto;width:20%;vertical-align:top">
                              <label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Discharge Date:</label>                           
							 <label  style="font-size:9pt;font-family:arial;">
                               <?php echo "$dischargedate_c";?>
                              </label>          
                            </td>
                          </tr>
                        </table>
						<br>
                       
                </div></td>
              </tr>
			  </table>
              
                    <table width="100%" border="1" cellspadding="0" cellspacing="0" style=" font-size:10pt;font-family:arial;">
                      <tr >
                        <td width="213" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Date </td>
                        <td width="240" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Description </td>
                        <td width="159" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Rate </td>
                        <td  width="113" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Qty </td>
                        <td  width="169" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Charges </td>
                        <td width="13" align="middle" bgcolor="white"></td>
                        <td width="148" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Receipt No </td>
                        <td width="228" align="center" style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;"> Payment </td>
						
                      </tr>
				
						    <?php $i=0;
                $total=0.0;
                $totalcredit=0.0;
                $totaldebit=0.0;
                $credit=0.0;
                $debit=0.0;
                $netdebit=0.0;
                 $rem=0.0;
                // $value3=0;
							   $result = $result;
							    if(count($result) == 0){
								  echo '<div style="width:100%;height:18px;vertical-align:middle;margin:1px;" align="center" >No Records Found</div>';
							    }else{
								  for($i=1;$i<count($result);$i++){

                    $testname=$result[$i][10];

               $debitvalue=$result[$i][5];
              $creditvalue=$result[$i][7];
             // var_dump($debitvalue);die;
              //1.date
              //2.description
              //3.rate
              //4.qty
              //5.totalamt
              //6.rcptno
              //7.amt
              //8.balance
              //9flag
									 echo "<tr>";
									  echo '<td width="140" align="middle">'.$result[$i][1].'</td>
                    <td width="230" align="left">'.$result[$i][2].'</td>';

                    if($testname == "CHARGE"){
                    echo '
                    <td width="115" align="right">'.$result[$i][3].'</td>';
                    }
                    else{
                      echo '<td> </td>';
                    }

                    if($testname == "CHARGE"){
                    echo '
                    <td width="230" align="center">'.$result[$i][4].'</td>';
                    }
                    else{
                      echo '<td> </td>';
                    }
                    if($testname == "CHARGE"){
                    echo '
                    <td width="115" align="right">'.$result[$i][5].'</td>';
                    }
                    else{
                      echo '<td> </td>';
                    }

                   
                      echo '
                      <td bgcolor="white" style="border:none;"></td>
                       <td width="155" align="center">'.$result[$i][6].'</td>';
                        if($testname == "RCPT"){
                          echo '
                    <td width="85" align="right">'.$creditvalue.'</td>';
                     }
                    else{
                      echo '<td> </td>';
                    }
                                        
                  echo '</tr>';
		
									 


if( $debitvalue==null || $debitvalue==''){
                                 $debitvalue=0.0; 
    }
  if( $creditvalue==null || $creditvalue==''){
                                  $creditvalue=0.0; 
   }


    if($testname=="RCPT"){
          $creditval=(float)($creditvalue);
       $credit=(float)$credit+(float)$creditval;
     }
if($testname=="CHARGE"){
    $debitval=(float)($debitvalue);
    $debit=(float)$debit+(float)$debitval;
      }
  
          
								  }
							    }
						    ?>
                <?php if($value1==0.0 || $value1==""){
                ?>
							<tr style="display:none;">
                <td align="center" ><?php echo date('d M Y');?></td>
                <td align="left"><?php echo "$other1"; ?></td>
                <td></td>
                <td></td>
                <td align="right"><?php echo "$value1"; ?></td>
                <td bgcolor="white" style="border:none;"></td>
                <td></td>
                
                
              </tr>
              <?php } else{?>
              <tr >
                <td align="center" ><?php echo date('d M Y');?></td>
                <td align="left"><?php echo "$other1"; ?></td>
                <td></td>
                <td></td>
                <td align="right"><?php echo number_format((float)$value1,2,'.',''); ?></td>
                <td bgcolor="white" style="border:none;"></td>
                <td></td>
                <td></td>
                
              </tr>
              <?php }?>
              <?php if($value3==0.0 || $value3==""){
                ?>
               <tr style="display:none;">
                 </tr>
              <?php } else{?>
              <tr>
                <td align="center"><?php echo date('d M Y');?></td>
                <td align="left"><?php echo "$other3"; ?></td>
                <td></td>
                <td></td>
                <td align="right"><?php echo number_format((float)$value3,2,'.',''); ?></td>
                <td bgcolor="white" style="border:none;"></td>
                <td></td>
                <td></td>
                
                 </tr>
                 <?php }?>
                <?php if($value2==0.0 || $value2==""){
                ?>
                <tr style="display:none;">
                 </tr>
                 <?php } else{?>
              <tr>
               <td align="center"><?php echo date('d M Y');?></td>
               
                 <td align="left"><?php echo "$other2"; ?></td>
                <td></td>
                <td></td>
                 <td></td>
                <td bgcolor="white" style="border:none;"></td>
                <td></td>
                <td align="right"><?php echo number_format((float)$value2,2,'.',''); ?></td>
                
            <?php }?>
              </tr>
              <?php $val1=(float)$value1;
                    
                    $val3=(float)$value3;
                    $val2=(float)$value2;

              $totalcredit=(float)$totalcredit+(float)$credit+(float)$value2;
               $totaldebit=(float)$totaldebit+(float)$debit+(float)$value1+(float)$value3;
               $netdebit=(float)$totaldebit-(float)$value2;
               //var_dump($netdebit,$totaldebit,$totalcredit);
              ?>

              <tr style="font-size:9pt;">
            <td  height="30" align="center" colspan=2>Total: </td>
            <td></td>
            <td></td>
              <td width="159"  colspan="1" align="right">
                <input type="text" style="border:none;font-size:9pt;text-align:right;" id="debit" class="textarea"  align="right" value="<?php echo number_format((float)$totaldebit,2,'.','');?>" size="8"  name="debit" readonly="readonly" />
              </td>
              <td bgcolor="white" style="border:none;"></td>
              <td></td>
            <td width="169"  colspan=1 align="right"> 
                <input type="text" style="border:none;font-size:9pt;text-align:right;" align="right" id="credit" class="textarea"  value="<?php echo number_format((float)$totalcredit,2,'.','');?>" size="8" name="credit" readonly="readonly" />
              </td>
               
              
              </tr>

						
              <tr style="font-size:9pt;">
            <td  height="30" align="center" colspan=2>Net Bill: </td>
            <td></td>
            <td></td>
              <td width="159"  colspan="1" align="right">
                <input type="text" style="border:none;font-size:9pt;text-align:right;" id="netdebit" class="textarea"  align="right" value="<?php echo number_format((float)$netdebit,2,'.','');?>" size="8"  name="netdebit" readonly="readonly" />
              </td>
            <td bgcolor="white" style="border:none;"></td>
            <td ></td>
            <td></td>
            
              </tr>
                    
          </table>
                </form>
                                 
            <br><br>
                       <p style="font:bold;font-size:11pt;margin-right:1%;font-family:arial;" align="right">Authorised Signatory </p> 
		  </div>	
              
      	</td>
	</tr>
  
	</table>
</div>
<!--       <div style="width:99.5%">
       
            <img style="float:left;widht:auto;"  id="footer_img"  src="<?php //echo $footer_cashier;?>" >  
          
      </div> -->
</body>
</html>
