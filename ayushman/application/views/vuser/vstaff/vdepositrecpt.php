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
	#btnsave {display: none !important; 
	}
}
@page {
    /* dimensions for the whole page */
    size: A5;
    margin: 0;
}
body {
    /* A5 dimensions */
    height: 210mm;
    width: 148.5mm;
	margin: 0;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	 
			convertAndsavePDf();

});

	
	function printbill()
	{
		window.print();
		 parent.location.reload(true);
	   
	}

	function convertAndsavePDf(){
  var patientuserid=$('#patId').val();
  var caseno=$('#caseno').val();
  var rcptId=$('#rcptId').val();
    var hospitalid=$('#hospitalid').val();

	elm = $( "#rcpt" ).clone(true);
	
    var htmlfile={htmlfile:elm.html(),patientuserid:patientuserid,doctoruserid:hospitalid,caseno:caseno,rcptid:rcptId};
    //alert(htmlfile);
	
	$.ajax({
			type:'post',
			data:htmlfile,
       	
			url:'/ayushman/cbill/saveRcptPdf',
			datatype:'html',
			success: function(data){},
			error:function(req,status,error){}
	});
	
  }



</script>
</head>

<body height="50%">
 <input name="patId" id="patId" type="hidden" value="<?php echo "$patId"; ?>" size="8"/>
		 <input name="patName" id="patName" type="hidden" value="<?php echo "$patName"; ?>" size="8"/>
            <input name="rcptId" id="rcptId" type="hidden" value="<?php echo "$rcptId"; ?>" size="8"/>
            <input name="caseno" id="caseno" type="hidden" value="<?php echo "$caseno"; ?>" size="8"/>
             <input name="hospitalid" id="hospitalid" type="hidden" value="<?php echo "$hospitalid"; ?>" size="8"/>
			<input type="hidden" value="<?php echo "$creditamount";?>" id="amt" name="amt"/>
	
	<div id="rcpt" style="width:100%;">
		
<table width="100%" height="196" border="1" align="left" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<div style="width:100%">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr >
            <img style="float:left;widht:auto;" id="pat_img"  src="<?php //echo $header_cashier;?>" >  
					</tr>
				</table>
			</div>		</td>
	</tr>
	
	<tr>
		<td >
			<div style="width:100%;height:auto;margin: 15px">
				<table width="100%" style="padding: 30px">
					<tr>
						<td>
							<div id="name" style="height:auto;width:100%;">
					
								
								<table style="height:auto;width:100%;">  
									<tr>
																				
										<td width="17%" style="float:left;height:auto;font-weight:bold;">
											Receipt No:							
										</td>								
											<td width="28%" style="float:left;height:auto;">
											<?php echo "$rcptId";?>											  </td>
										<td width="30%" style="float:right;height:auto;font-weight:bold;">
										Date:	&nbsp;								 
												<span ><?php echo "$creditdate";?></span>
										</td>
										
					 			  </tr>
					 			  <tr>
					 			  	<td style="height:10%;">&nbsp;</td>
					 			  </tr>			
								</table>
						  </div>					 
					 </td>
				  </tr>
							
					<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;">
							RECEIVED with thanks from &nbsp;
					  <input id="name" name="name" style="border:none; border-bottom:1px solid;font-weight:bold" size=10 readonly value="<?php echo "$patName";?>"/>
					  a sum of Rs.&nbsp;<input id="creditamount" name="creditamount" style="font-weight:bold;border:none; border-bottom:1px solid;" size=6 readonly value="<?php echo "$creditamount";?>"/>
					  (<input id="totalamt"  name="totalamt" style=" width:40.7%;border:none; border-bottom:1px solid;font-weight:bold" value="<?php echo "$wordamt";?>" size=20 />	)					

					</td>
						
					</tr>
					
					
					<?php if($payment==5){?>
					<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;">
							by cash</td>
					</tr>
					 
				<?php }else if($payment==6){?>
					<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;">
							by cheque &nbsp; <input id="cheqno"  name="cheqno" style="border:none; border-bottom:1px solid;font-weight:bold" value="<?php echo "$cheqno";?>" size=14 />
						,dated &nbsp;<input id="cashdate"  name="cashdate" style="border:none; border-bottom:1px solid;font-weight:bold" value="<?php echo "$cheqdate";?>" size=8 />						
					</td>
					</tr>
					
				<?php } else {?>
				<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;">
							by card vide no. &nbsp; <input id="trxnrefno"  name="trxnrefno" style="border:none; border-bottom:1px solid;font-weight:bold" value="<?php echo "$trxrefno";?>" size=14 />
					</td>
				  </tr>
					<?php }?>
					<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;">
							on account of &nbsp; <input id="description"  name="description" style=" width:80.7%;border:none; border-bottom:1px solid;font-weight:bold" value="<?php echo "$creditdesc";?>" />						
						</td>
					</tr>
					
					<tr>
						<td style="font:bold;font-size:11pt;margin-left:1%;font-family:arial;" align="left">
							(Cheque subject to realisation.)					</td>
					</tr>

					<tr>
						<td style="font:bold;font-size:11pt;margin-right:1%;font-family:arial;" align="right">
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>Authorised Signatory						</p></td>
					</tr>
			  </table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="width:99.5%">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr >
            <img style="float:left;widht:auto;"  id="footer_img"  src="<?php //echo $footer_cashier;?>" >  
					</tr>
				</table>
			</div>		</td>
	</tr>
</table>
</div>
<input type="button" id="btnprint" value="Print" onClick="printbill();"/>

</body>
</html>