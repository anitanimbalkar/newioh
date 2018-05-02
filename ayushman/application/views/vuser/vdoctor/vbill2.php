<html>
<head>
<title>Bill...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	$(document).ready(function() {
		jQuery('#consultationfees').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		jQuery('#ecgfees').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		jQuery('#xrayfees').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		jQuery('#bandagefees').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		jQuery('#others').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		jQuery('#servicetax').keyup(function () { 
					this.value = this.value.replace(/[^0-9\.]/g,'');
					calculatefees();
		});
		$('#bill').submit(function(){
			$.post(this.action, $(this).serialize(), function(res){
				data =  JSON.parse(res);
				alert(data['type'] +':'+data['message']);
			});
			return false; // prevent default action
		});
		calculatefees();
		if("<?= $details['consultationtype'];?>" == "Ad-hoc")
		{
			document.getElementById("consultationfees").readOnly = false;
			document.getElementById("consultationfees").style.border = "";
		}
		if("<?= $edit; ?>"=="false"){
			$('#ecgfees').attr('readonly','readonly');	
			$('#xrayfees').attr('readonly','readonly');	
			$('#bandagefees').attr('readonly','readonly');	
			$('#others').attr('readonly','readonly');	
			$('#servicetax').attr('readonly','readonly');	
			$("#name").attr('readonly', 'readonly');
			$("#btnsave").hide();
			$("#billheading").text("Duplicate Bill");
		}
	});
	function calculatefees()
	{
		var consultationfees = 0;
		consultationfees = Number($('#consultationfees').val());
		jQuery('#totalfees').val(Number(consultationfees) + Number($('#ecgfees').val()) +Number($('#xrayfees').val()) +Number($('#bandagefees').val()) +Number($('#others').val()));
		if($('#paid').val() == 1)
			jQuery('#onlinepaid').val(Number($('#consultationfees').val()));
		else
			jQuery('#onlinepaid').val(Number(0));
		totalamount = Number(jQuery('#totalfees').val()) - Number(jQuery('#onlinepaid').val());
		jQuery('#dueamount').val(Number(totalamount)+(Number(totalamount) * Number(jQuery('#servicetax').val())/100) );
		jQuery('#totalamt').val(jQuery('#dueamount').val());
		
	}
	function savebill()
	{
		$('#bill').submit();
	}
	function printbill(){
		$.ajax({
		  url: "/ayushman/cbill/changestatus?appid="+document.getElementById('appid').value+"&ecgfees="+document.getElementById('ecgfees').value+"&bandagefees="+document.getElementById('bandagefees').value+"&others="+document.getElementById('others').value+"&xrayfees="+document.getElementById('xrayfees').value,
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'done'){
					window.print();
				}
				else
					alert(data['message']);
			},
			error : function(){showMessage('550','200','Changing status of bill',"Could not change status of bill.",'error','id');}
		});
	}
</script>
</head>
<body>
<table width="99.5%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<div style="width:99.5%">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td id="billheading" width="100%" class="Heading_Bg" style="align:center" align="center">Bill </td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div style="width:600px;height:750px">
				<table width="100%">
					<tr>
						<td>
							<div id="name" style="height:auto;width:100%;">
								<font color="1e90ff"><label id='lbldoctorname' style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;width:100%;"><?= $details['lbldoctorname']; ?></label>
								<label id='lblqualification' style="font:bold;font-size:10pt;font-family:arial;"></label></font>
								<table style="height:auto;width:100%;padding-top:5px;">  
									<tr>
										<td style="height:auto;width:10%;vertical-align:top">
											<div style="float:left;width:100%;margin-left:20px;">
												<label style="font:bold;font-size:9pt;font-family:arial;">Regd Number:</label>
												<label id="lblregdnumber" style="font:bold;font-size:9pt;font-family:arial;"><?= $details['lblregdnumber']; ?></label>
											</div>
										</td>
										
										<td style="height:auto;width:20%;vertical-align:top">
											<font color="1e90ff"><label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Contact Number:</label></font>
										</td>
									</tr>
									<tr>
										<td style="height:auto;width:60%;vertical-align:top">
											<div style="float:left;width:150px;margin-left:20px;">
												<label id='lbladdress' style="font:bold;font-size:9pt;font-family:arial;"><?= $details['lbladdress']; ?></label>
											</div>
										</td>
										<td style="height:auto;width:20%;vertical-align:top">
											<div style="float:left;width:150px;margin-left:20px;">
												<label id='lblcontactnumber'  style="font:bold;font-size:9pt;font-family:arial;"><?= $details['lblcontactnumber']; ?></label>
											</div>						
										</td>
									</tr>
								</table>
								<hr  style="height:2px;background-color:black;border:none;"/>
									<table style="width:100%;">
										<tr style="width:100%;">
											<td style="width:80%;">
												<div style="height:5px;width:100%;margin-top:5px;layout:horizontal;float:right;"> 
													<table style="height:auto;width:100%;padding-top:5px;">  
														<tr>
															<td style="height:auto;width:40%;vertical-align:top">
																<label style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;">Incidence Visit Number:</label>
															</td>
															<td style="height:auto;width:30%;vertical-align:top">
																<label id='lblnumber' style="font:bold;font-size:10pt;font-family:arial;"><?= $details['lblnumber']; ?></label>
															</td>
															<td style="height:auto;width:10%;vertical-align:top">
																<label style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;">Date:</label>
															</td>
															<td style="height:auto;width:30%;vertical-align:top">
																<label id='lbldate' style="font:bold;font-size:10pt;font-family:arial;"><?= $details['lbldate']; ?></label>
															</td>
														</tr>
													</table>
													<hr/>						
												</div>
											</td>
											<td style="width:20%;" rowspan="2">
											&nbsp;
											</td>
										</tr>
										<tr style="width:100%;">
											<td style="width:auto;">
												<div style="height:60px;width:100%;margin-top:2px;layout:horizontal;float:left;vertical-align:top;"> 
													<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:17px">
														<label style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">Name:</label>
														<label id='lblpatientname' style=" border-bottom-width:1px;font-size:10pt;font-family:arial;"><?= $details['lblpatientname']; ?></label>
													</div>
													
												</div>
											</td>
											<td style="width:auto;">
											</td>
										</tr>
									</table>
							</div>
						</td>
					</tr>
					<tr>
						<td border="1px solid">
						<form id="bill" action ="/ayushman/cbill/save" method="post">
							<table style=" border-bottom-width:1px;font-size:10pt;font-family:arial;">
								<tr border="1px solid">
									<td width="1%" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Number
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Service Description
									</td>
									<td  width="49%" align="left" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Amount(Rs.)
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										1
									</td>
									<td width="49%" align="center">
										Consultation Charges
									</td>
									<td  width="49%" align="left">
										<input type="text" readonly style="width:50px;font:bold;font-size:10pt;font-family:arial;border:none;border-bottom:1px solid;"  id="consultationfees" value="<?= $details['lblrate']; ?>" name= "consultationfees"/>
										<input type="text" style="width:auto;font:bold;font-size:10pt;font-family:arial;border:none"  id="modeandtype" value="<?= $details['lblmode']; ?>" name= "modeandtype"/>
										<input type="hidden" value="<?= $details['mode']; ?>" id="mode" name="mode"/>
										<input type="hidden" value="<?= $details['paid']; ?>" id="paid" name="paid"/>
										<input type="hidden" value="<?= $appid; ?>" id="appid" name="appid"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										2
									</td>
									<td width="49%" align="center">
										ECG
									</td>
									<td  width="49%" align="left">
										<input type="text" style=" width:50px;font:bold;font-size:10pt;font-family:arial;"  id="ecgfees" name= "ecgfees" value="<?= $details['ecgfees']; ?>"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										3
									</td>
									<td width="49%" align="center">
										X-Ray
									</td>
									<td  width="49%" align="left">
										<input type="text" style="width:50px;font:bold;font-size:10pt;font-family:arial;"  id="xrayfees" name= "xrayfees" value="<?= $details['xrayfees']; ?>"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										4
									</td>
									<td width="49%" align="center">
										Bandage
									</td>
									<td  width="49%" align="left">
										<input type="text" style="width:50px;font:bold;font-size:10pt;font-family:arial;"  id="bandagefees" name= "bandagefees" value="<?= $details['bandagefees']; ?>"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										5
									</td>
									<td width="49%" align="center">
										Others
									</td>
									<td  width="49%" align="left">
										<input type="text" style="width:50px;font:bold;font-size:10pt;font-family:arial;"  id="others" name= "others" value="<?= $details['others']; ?>"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										&nbsp;
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Total
									</td>
									<td  width="49%" align="left" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										<input type="text" id="totalfees" style="width:50px;font:bold;font-size:10pt;font-family:arial;border:none;border-bottom:1px solid;"  readonly name= "totalfees"/>
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										&nbsp;
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Paid Online(Rs.)
									</td>
									<td  width="49%" align="left" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										<input type="text" id="onlinepaid" style="width:50px;font:bold;font-size:10pt;font-family:arial;border:none;border-bottom:1px solid;"  readonly name= "onlinepaid"/>&nbsp;
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										&nbsp;
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Service Tax(%)
									</td>
									<td  width="49%" align="left" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										<input type="text" id="servicetax" style="width:50px;font:bold;font-size:10pt;font-family:arial;border:none;border-bottom:1px solid;" value="0" name= "servicetax"/>&nbsp;
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										&nbsp;
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										Due Amount(Rs.)
									</td>
									<td  width="49%" align="left" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										<input type="text" id="dueamount" style="width:50px;font:bold;font-size:10pt;font-family:arial;border:none;border-bottom:1px solid;"  readonly name= "dueamount"/>&nbsp;
									</td>
									<td width="1%">
									</td>
								</tr>
								<tr>
									<td width="1%" align="center">
										&nbsp;
									</td>
									<td width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										&nbsp;
									</td>
									<td  width="49%" align="center" style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;">
										<input type="button" id="btnsave" value="Save Bill" onclick="savebill();"/>
										<input type="button" id="btnprint" value="Print Bill" onclick="printbill();"/>
									</td>
									<td width="1%">
									</td>
								</tr>
							</table>
							</form>
							<hr  style="height:2px;background-color:black;border:none;"/>
						</td>
						
					</tr>
					<tr>
						<td>
							<div style="width:99.5%">
								<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
									<tr>
										<td width="100%" class="Heading_Bg" style="align:center" align="center">Receipt </td>
									</tr>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;">
							Received From <input id="name" name="name" style=" width:200px;border:none; border-bottom:1px solid;font-weight:bold" readonly value="<?= $details['lblpatientname']; ?>"/>, amount of Rs.<input id="totalamt" readonly name="totalamt" style=" width:70px;border:none; border-bottom:1px solid;font-weight:bold"/>&nbsp; for Doctor consultation.
						</td>
					</tr>
					<tr>
						<td style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;" align="right">
							Received by <input id="name" name="name" style=" width:200px;border:none; border-bottom:1px solid;"/>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</body>
</html>
