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
		
		$('#bill').submit(function(){
			$.post(this.action, $(this).serialize(), function(res){
				data =  JSON.parse(res);
				$("body").css("cursor", "default");
				showNotification('250','50','Errors','Bill is saved successfuly.','notification','messagedialogboxid',2000);
			});
			return false; // prevent default action
		});
		setAmountinWords();
	});
	
	function savebill()
	{
		$("body").css("cursor", "wait");
		$('#bill').submit();
	}
	function printbill(){
		window.print();
	}
	function copyText() {
    src = document.getElementById("totalamt");
    dest = document.getElementById("sum");
    dest.value = src.value;
	}
	
	function inWords (num) {
    	var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
		var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    	if ((num = num.toString()).length > 9) return 'overflow';
	    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    	if (!n) return; var str = '';
	    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
 	   str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
 	   str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
 	   str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
 	   return str;
	}
	function setAmountinWords()
	{
		// Setting value property so that reflected
		var Ainwords = inWords(document.getElementById("totalamt").value);
		document.getElementById("amtinwords").setAttribute("value",Ainwords);
		document.getElementById("amtinwords").value=inWords(document.getElementById("totalamt").value);
	}

</script>
</head>
<body height="auto">
<table width="99.5%" height="auto" border="0" align="left" cellpadding="0" cellspacing="0">
	
	<tr>
		<td >
			<div style="width:800px;height:auto; border:1px solid black; margin: 15px">
				<table width="100%" style="padding: 50px">
					<form id="bill" action ="/ayushman/cbill/save2" method="post">
					<tr>
						<td>
							<div id="name" style="height:auto;width:100%;font:bold;font-size:14pt;">
								<?= $details['lbldoctorname']; ?>
								
								<table style="height:auto;width:100%;">  
									<tr>
										<td style="font-size:10pt;font-family:arial;border-collapse: collapse;padding-top: 0.0em;padding-bottom: 1.5em;">
											&nbsp;<?php echo $search_doctor_object->education_c; ?>
										</td>										
										<td style="height:auto;width:20%;vertical-align:top">
											No:&nbsp &nbsp;<input id="billid"  name="billid" style=" font-size:12pt;width:100px;border:none;text-align:right; border-bottom:1px solid;font-weight:bold" value="<?= $newBillId; ?>"/>
										</td>
									</tr>
									<tr>
										<td style="height:auto;width:60%;vertical-align:top">
											<div style="float:left;width:150px;margin-left:1px;">
												<label id='lbladdress' style="font:bold;font-size:10pt;font-family:arial;"><?= $details['lbladdress']; ?></label>
											</div>
										</td>
										<td style="height:auto;width:20%;vertical-align:top">
											<div style="float:left;width:100%;margin-right:20px;">
												<label style="font-size:12pt;font-family:arial;">Date:</label> &nbsp &nbsp;<label id='lbldate' style="font:bold;font-size:12pt;font-family:arial;"><?= $details['lbldate']; ?></label>
											</div>						
										</td>
									</tr>
								</table>
								
									
							</div>
						</td>
					</tr>
					<tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;">
							RECEIVED with thanks from &nbsp &nbsp; <input id="name" name="name" style=" width:71.8%;border:none; border-bottom:1px solid;font-size:14pt;font-weight:bold" readonly value="<?= $details['lblpatientname']; ?>"/>
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;">
							Diagnosis.<input id="diagnosis"  name="diagnosis" style=" width:87.5%;border:none; border-bottom:1px solid;font-size:14pt;font-weight:bold"value="<?= $diagnosis;?>"/>
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;">
							the sum of Rupees.<input id="totalamt"  name="totalamt" onblur="setAmountinWords();"style=" width:80.7%;border:none; border-bottom:1px solid;font-size:14pt;font-weight:bold" value="<?= $totalamt;?>" onChange="copyText()"/>
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:12pt;margin-left:1%;font-family:arial;">
							by cash/cheque, in part/full payment for consultation / operation.
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;" align="left">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;" align="left">
							Rs. <input id="sum" name="sum" style=" font-size:14pt;width:200px;border:none; border-bottom:1px solid;" readonly value="<?= $totalamt;?>"/>
							(<input id="amtinwords" readonly name="amtinwords" style=" font-size:12pt;width:200px;border:none; border-bottom:1px solid;"/>)
							<input type="hidden" value="<?= $appid; ?>" id="appid" name="appid"/>
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;" align="left">
							Cheque subject to realisation.
						</td>
					</tr>
					<tr>
							<td align="right">
							<input type="button" id="btnsave" value="Save" onclick="savebill();"/>
							<input type="button" id="btnprint" value="Print" onclick="printbill();"/>
						</td>
					</tr>
					</form>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</body>
</html>
