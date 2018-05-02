<html>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function() {$(function() {
		
		if('<?php echo $modeofpay; ?>' == 'Cash'){
				document.getElementById("Cash").checked ='true';
		}
		if('<?php echo $modeofpay; ?>' == 'Cheque/DD'){
			document.getElementById("Cheque").checked ='true';				
		}
		if('<?php echo $modeofpay; ?>' == 'online'){
				document.getElementById("Online").checked ='true';
		}
		
			$( "#depositedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			$("#chequetable").hide();
			$("#sliptable").hide();
			$("#banktable").hide();
		});		
		console.log(document.getElementById("accoutname").value);
		if( document.getElementById("accoutname").value != ''){
				console.log(document.getElementById("accoutname").value);
				document.getElementById("accountantname").value = document.getElementById("accoutname").value;
		}
		
	if('<?php echo $oldtrnid; ?>' != ''){
			$("#oldeid1").show();
			$("#oldeid2").show();
			$("#oldeid3").show();
	}else{
			$("#oldeid1").hide();
			$("#oldeid2").hide();
			$("#oldeid3").hide();
	}		
});
function toggleSelection(receiptnoArray,amountArray) 
	{
		var totalamt = 0 ;
		var num = document.getElementById("rcArrayno").value; 
		var amount = document.getElementById("rcArrayamount").value;
		if (num != "")
		{
			var selectionrcno = num.split(",");
		}
		else
		{
			var selectionrcno = [];
		}
		if(document.getElementById(receiptnoArray).checked==true)
        {
			selectionrcno.push(receiptnoArray);			
			var amount = +amount + +amountArray;
		}
        else
		{
			// Converting number to string for Comparison
			var amount = +amount - +amountArray;		
			var strid = receiptnoArray;
			var arrInd = selectionrcno.indexOf(strid);
			if (arrInd > -1)
            { 
				selectionrcno.splice(arrInd,1);
            }    
        }
		document.getElementById("rcArrayno").value = selectionrcno.toString();
		document.getElementById("rcptdisplay").value = selectionrcno.toString();
		document.getElementById("rcArrayamount").value = amount;
		document.getElementById("Amount").value = amount;
	}
	
		
	function opendepositebox(){		
		var allno= document.getElementById("rcArrayno").value;
		if(allno != ''){
				$("#dialog-deposite").dialog({
					draggable: false,
					resizable: false,
					position: ['top', 'center'],
					show: 'blind',
					hide: 'blind',
					width: 820,
				});	
				// Hide all Error messages
				document.getElementById("errorAcname").setAttribute("style","display:none");	
				document.getElementById("errorAcno").setAttribute("style","display:none");	
				document.getElementById("errorAmount").setAttribute("style","display:none");	
				document.getElementById("errorBkname").setAttribute("style","display:none");	
				document.getElementById("errorCqdd").setAttribute("style","display:none");	
				document.getElementById("errorDdate").setAttribute("style","display:none");	
				document.getElementById("errorDesc").setAttribute("style","display:none");	
				
			}else{
					showNotification('300','20','select','Please select receipt.','notification','diaconfirmation',5000);
			}
	}	
	
	function setdepositedata(){				
		document.getElementById("errorAcname").setAttribute("style","display:none");	
		document.getElementById("errorAcno").setAttribute("style","display:none");	
		document.getElementById("errorAmount").setAttribute("style","display:none");	
		document.getElementById("errorBkname").setAttribute("style","display:none");	
		document.getElementById("errorCqdd").setAttribute("style","display:none");	
		document.getElementById("errorDdate").setAttribute("style","display:none");	
		document.getElementById("errorDesc").setAttribute("style","display:none");	
						
		if(document.getElementById('mySelect').value == 'Cash'){
						if(document.getElementById('Description').value == ''){
							//showNotification('300','20','no data','Please enter the description.','notification','diaconfirmation',5000);
							document.getElementById("errorDesc").setAttribute("style","display:block");								
						}else if(document.getElementById('Amount').value == ''){
							//	showNotification('300','20','no data','Please enter the amount.','notification','diaconfirmation',5000);
							document.getElementById("errorAmount").setAttribute("style","display:block");	
						}else if(document.getElementById('depositedate').value == ''){
							// showNotification('300','20','no data','Please enter the deposit date.','notification','diaconfirmation',5000);
							document.getElementById("errorDdate").setAttribute("style","display:block");	
						}else if(document.getElementById('accountantname').value == 'select'){
							//showNotification('300','20','no data','Please select the Accountant name.','notification','diaconfirmation',5000);
							document.getElementById("errorAcname").setAttribute("style","display:block");	
						}else{
								var allids = document.getElementById("rcArrayIds").value;
								var allno= document.getElementById("rcArrayno").value;
								var allpayer= document.getElementById("rcArraypayer").value;
								var allfsa= document.getElementById("rcArrayfsa").value;
								var alldate= document.getElementById("rcArraydt").value;
								var allamount= document.getElementById("rcArrayamount").value;
								
								if(allno != ''){					
										$.ajax({
												type:"GET",
												url: "/ayushman/crechargebyreceipt/setdeposite",
												data: $("#senddepositedata").serialize(),
												success: function(data ) {
													var data =  JSON.parse(data);	
														console.log(data);
													/*if(data.oldtrxid != ''){
														$.ajax({
															type:"GET",
															url: "/ayushman/crechargebyreceipt/updatedeposidata?oldtrxid="+data.oldtrxid,
															success: function(data ) {
																var data =  JSON.parse(data);
																
																location.href = "/ayushman/ccresummary/view";							
															},
															error : function(){showMessage('550','200','Retrieving data',"please select valid receipt no.",'error','id');}
														});
													}*/
													location.href = "/ayushman/ccresummary/view";							
											},
										error : function(){showMessage('550','200','Retrieving data',"please select valid receipt no.",'error','id');}
									});
								}else{
									showNotification('300','20','select','Please select receipt.','notification','diaconfirmation',5000);
								}
							
						}						
		}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
						if(document.getElementById('Description').value == ''){
							document.getElementById("errorDesc").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the description.','notification','diaconfirmation',5000);
						}else if(document.getElementById('Amount').value == ''){
							document.getElementById("errorAmount").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the amount.','notification','diaconfirmation',5000);
						}else if(document.getElementById('depositedate').value == ''){
							document.getElementById("errorDdate").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the deposit date.','notification','diaconfirmation',5000);
						}else if(document.getElementById('chequeddNo').value == ''){
							document.getElementById("errorCqdd").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the cheque or dd No.','notification','diaconfirmation',5000);
						}else if(document.getElementById('bankname').value == ''){
							document.getElementById("errorBkname").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the bank name.','notification','diaconfirmation',5000);
						}else if(document.getElementById('acctno').value == ''){
							document.getElementById("errorAcno").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the account No.','notification','diaconfirmation',5000);
						}else if(document.getElementById('accountantname').value == 'select'){
							document.getElementById("errorAcname").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please select the Accountant name.','notification','diaconfirmation',5000);
						}else{
								var allids = document.getElementById("rcArrayIds").value;
								var allno= document.getElementById("rcArrayno").value;
								var allpayer= document.getElementById("rcArraypayer").value;
								var allfsa= document.getElementById("rcArrayfsa").value;
								var alldate= document.getElementById("rcArraydt").value;
								var allamount= document.getElementById("rcArrayamount").value;
								console.log(allno);
								if(allno != ''){					
										$.ajax({
												type:"GET",
												url: "/ayushman/crechargebyreceipt/setdeposite",
												data: $("#senddepositedata").serialize(),
												success: function(data ) {
													var data =  JSON.parse(data);
													location.href = "/ayushman/ccresummary/view";							
											},
										error : function(){showMessage('550','200','Retrieving data',"Please select valid receipt no.",'error','id');}
									});
								}else{
									showNotification('300','20','select','Please select receipt.','notification','diaconfirmation',5000);
								}
							
						}						
		}else if(document.getElementById('mySelect').value == 'bankdeposit'){
						if(document.getElementById('Description').value == ''){
							document.getElementById("errorDesc").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the description.','notification','diaconfirmation',5000);
						}else if(document.getElementById('Amount').value == ''){
							document.getElementById("errorAmount").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the amount.','notification','diaconfirmation',5000);
						}else if(document.getElementById('depositedate').value == ''){
							document.getElementById("errorDdate").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the deposit date.','notification','diaconfirmation',5000);
						}else if(document.getElementById('bankname').value == ''){
							document.getElementById("errorBkname").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the bank name.','notification','diaconfirmation',5000);
						}else if(document.getElementById('acctno').value == ''){
							document.getElementById("errorAcno").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please enter the account No.','notification','diaconfirmation',5000);
						}else if(document.getElementById('accountantname').value == 'select'){
							document.getElementById("errorAcname").setAttribute("style","display:block");	
							//showNotification('300','20','no data','Please select the Accountant name.','notification','diaconfirmation',5000);
						}else{
								var allids = document.getElementById("rcArrayIds").value;
								var allno= document.getElementById("rcArrayno").value;
								var allpayer= document.getElementById("rcArraypayer").value;
								var allfsa= document.getElementById("rcArrayfsa").value;
								var alldate= document.getElementById("rcArraydt").value;
								var allamount= document.getElementById("rcArrayamount").value;
								
								if(allno != ''){					
										$.ajax({
												type:"GET",
												url: "/ayushman/crechargebyreceipt/setdeposite",
												data: $("#senddepositedata").serialize(),
												success: function(data ) {
													var data =  JSON.parse(data);
													location.href = "/ayushman/ccresummary/view";							
											},
										error : function(){showMessage('550','200','Retrieving data',"Please select valid receipt no.",'error','id');}
									});
								}else{
									showNotification('300','20','select','Please select receipt.','notification','diaconfirmation',5000);
								}
							
						}						
		}
				
	}
	function modeofpayment(){
		var modeofpayment = document.getElementById("mySelect").value;
			console.log(modeofpayment);
		if( modeofpayment == 'Cheque/DD' )
		{
			$("#chequetable").show();
			$("#sliptable").show();
			$("#banktable").show();
		}else if( modeofpayment == 'Cash' )
		{
			$("#chequetable").hide();
			$("#sliptable").hide();
			$("#banktable").hide();
		}else if( modeofpayment == 'bankdeposit' )
		{
			$("#chequetable").hide();
			$("#sliptable").show();
			$("#banktable").show();
		}
	}
	function depositedetails(){
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecords";		
	}
	function depositedetailscheque(){
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecordscheque";		
	}
	function depositedetailsonline(){
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecordsonline";		
	}
	
	function backpage(){		
		window.location='/ayushman/ccresummary/view';
	}
</script>
<body>
<div>
		<input type="hidden" id="accoutname" value="<?php echo $allrecptaccountant; ?>" />
		<div id="dialog-deposite" title="Deposit details" style="display:none;">
		<form id="senddepositedata" method="get" enctype="multipart/form-data"  action="/ayushman/crechargebyreceipt/setdeposite">
			<input id="rcArrayIds" name="rcArrayIds"  value="" type = "hidden"/>
			<input id="rcArrayno" name="rcArrayno" value='' type = "hidden"/>
			<input id="rcArraypayer" name="rcArraypayer" value='' type = "hidden"/>
			<input id="rcArrayfsa" name="rcArrayfsa" value='' type = "hidden"/>
			<input id="rcArraydt" name="rcArraydt" value='' type = "hidden"/>
			<input id="rcArrayamount" name="rcArrayamount" value="" type = "hidden"/>
			
			<fieldset style="background-color: rgb(236, 248, 251);">
				<fieldset>
						<table width="100%">
								<tr id="cashtable">
									<td class="bodytext_bold">Accountant name*</td>
									<td class="bodytext_bold">:</td>
									<td>
										<select id="accountantname" name="accountantname"  style="width:80%;background-color: rgb(236, 248, 251);" value="">
											<option value="select">Select</option>
											<?php 
												$objroleuser = ORM::factory('roleuser')->where('role_id','=',21)->find_all();
											foreach($objroleuser as $objRelation){	
												$objCorporate = ORM::factory('user')->where('id','=',$objRelation->user_id)->find();												
													echo '<option value='.$objCorporate->id.'>'.$objCorporate->Firstname_c.' '.$objCorporate->lastname_c.' </option>';
												}											
											?>
										</select>									
									</td>
										<td class="bodytext_bold">Mode of payment </td>
										<td class="bodytext_bold">:</td>
										<td><select name="mySelect" onchange="modeofpayment();" id="mySelect" style="background-color: rgb(236, 248, 251);">
												<option value="Cash">Cash</option>
												<option value="Cheque/DD">Cheque/DD</option>
												<option value="bankdeposit">Bank deposit</option>
											</select>
										</td>											
								</tr>
								<tr>
									<td class="bodytext_bold">Description*</td>
									<td class="bodytext_bold">:</td>
									<td><textarea name="Description" id="Description" class="textarea" type="text" cols="25" rows="5"  style="margin: 0px; height: 20px; width:280px;background-color: rgb(236, 248, 251);"></textarea></td>
								
									<td class="bodytext_bold">Amount </td>
									<td class="bodytext_bold">:</td>
									<td><input readonly name="Amount" id="Amount" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr>
									<td class="bodytext_bold">Deposit date* </td>
									<td class="bodytext_bold">:</td>
									<td><input name="depositedate" id="depositedate" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td class="bodytext_bold" id="oldeid1">Old transaction id</td>
									<td class="bodytext_bold" id="oldeid2">:</td>
									<td colspan="2" id="oldeid3"><input readonly name="oldtrxid" id="oldtrxid" class="textarea" value="<?php echo $oldtrnid; ?>" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr>
									<td class="bodytext_bold">Selected receipts</td>
									<td class="bodytext_bold">:</td>
									<td><textarea readonly id="rcptdisplay" name="rcptdisplay" class="textarea" cols="100" rows= "10" style="margin: 0px; height: 40px; width:280px;background-color: rgb(236, 248, 251);" type = "text"></textarea></td>
								<tr id="banktable">
									<td class="bodytext_bold">Bank Name*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="bankname" id="bankname" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									
									<td class="bodytext_bold">Account no*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="acctno" id="acctno" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr id="chequetable">
									<td class="bodytext_bold">Cheque/DD No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="chequeddNo" id="chequeddNo" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>																	
								</tr>
								<tr id="sliptable">
									<td class="bodytext_bold">Bank slip no</td>
									<td class="bodytext_bold">:</td>
									<td><input name="Bankslipno" id="Bankslipno" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr>
									<span id="errorAcname" name="errorAcname"style="display:none;" class="bodytext_error">Please select the Accountant name.</span>
									<span id="errorDesc" name="errorDesc"style="display:none;" class="bodytext_error">Please enter the description.</span>
									<span id="errorDdate" name="errorDdate"style="display:none;" class="bodytext_error">Please enter the deposit date.</span>
									<span id="errorBkname" name="errorBkname"style="display:none;" class="bodytext_error">Please enter the bank name.</span>
									<span id="errorCqdd" name="errorCqdd"style="display:none;" class="bodytext_error">Please enter the cheque or dd No.</span>
									<span id="errorAmount" name="errorAmount"style="display:none;" class="bodytext_error">Please enter the amount.</span>
									<span id="errorAcno" name="errorAcno"style="display:none;" class="bodytext_error">Please enter the account No.</span>
								</tr>
								<tr >
									<td class="bodytext_bold"></td>
									<td class="bodytext_bold"></td>
									<td align="right" colspan="5"><input type="button" class="button" value="   Deposit   " onclick="setdepositedata();"/></td>																								
								</tr>
						</table>
					</fieldset>						
			</fieldset>		
			</form>
		</div>		
		<table width="100%" height="100%" align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<td>
					<div style="max-height:100%">
					<div style="max-height:100%;overflow:auto;">
					    <table>
						
						<td colspan="8" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;List of receipts not deposited</strong>
									<a href="#" onclick="backpage();" style="float:right"><img src="/ayushman/assets/app/img/goback2.png" style="height: 25px; width: 80px;"></a>
								</td>
						
						
						<!--<tr class="Heading_Bg" style="color:#fff;">
							<td colspan="8" class="Heading_Bg">&nbsp;
									img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;List of receipts not deposited</strong><img src="/ayushman/assets/app/img/goback2.png" style="height: 25px; width: 80px;"></a>
							</td>-->
						</tr>
						<tr>
						<td> </td>
						</tr>
						<tr >
									<form action="">	
										<td width="500px"> <input type="radio" onclick="depositedetails();" id="Cash" name="paymentmode" value="Cash"/>Cash
														   <input type="radio" onclick="depositedetailscheque();" id="Cheque" name="paymentmode" value="Cheque/DD" />Cheque/DD
														   <input type="radio" onclick="depositedetailsonline();" id="Online" name="paymentmode" value="Online" />	Online</td>	
									</form>					
							<td colspan="7" width="500px" align="right"><button class="button" onclick="opendepositebox();" value="Create deposit" style="font-size: 13px; width:150px; height:25px; background">Create deposit(s)</button> </td>
						</tr>
					  </table>
					  <br>
					 <table id = "searchresult" style="width:100%;display:block;height:100%;font-family:arial;" class="bodytext_normal">
						<tr  class="Heading_Bg" style="color:#fff;">
								<td width="50px" align="middle"></td>
								<td width="500px" align="middle">Receipt no.</td>
								<td width="500px" align="middle">Receipt date</td>
								<td width="500px" align="middle">Name</td>
								<td width="500px" align="middle">Generated by</td>
								<td width="500px" align="middle">Pay mode</td>
								<td width="500px" align="middle">Amount(Rs)</td>
						</tr>
						
							<?php 
								$receiptnoArray = $receiptnoArray;
								$varifiy = 0;
							    if(count($receiptnoArray) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee;padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
									for( $i = 0 ; $i < (count($receiptnoArray)) ; $i++){
										$rcptno 	= "'".$receiptnoArray[$i]."'";
										$rcptdate 	= "'".$rctdateArray[$i]."'";
										$buyer 		= "'".$buyerArray[$i]."'";
										$crename 	= "'".$crenameArray[$i]."'";
										$paymode 	= "'".$paymodeArray[$i]."'";
										echo '<tr style = "width:100%;background-color:#ecf8fb;">';
											for($j = 0 ; $j < (count($allrecptarra)) ; $j++){
												if($receiptnoArray[$i] == $allrecptarra[$j]){
													$varifiy = 1;
												}
											}											
											if($varifiy == 1){
												echo '<td width="150px;" align="center"><input type="checkbox" checked onchange="toggleSelection('.$rcptno.','.$amountArray[$i].');" name="checkbox" value="'.$receiptnoArray[$i].'" id="'.$receiptnoArray[$i].'" /></td>';
												$varifiy = 0;	
													?>
														<script type="text/javascript">
															toggleSelection(<?php echo $rcptno; ?>,'<?php echo $amountArray[$i]; ?>');
														</script>
													<?php 
											}else{
												echo '<td width="150px;" align="center"><input type="checkbox"  onclick="toggleSelection('.$rcptno.','.$amountArray[$i].');" name="checkbox" value="'.$receiptnoArray[$i].'" id="'.$receiptnoArray[$i].'" /></td>';
											}
												echo '<td width="150px;" align="center">'.$receiptnoArray[$i].'</td>';
												echo '<td width="200px;" align="center">'.$rctdateArray[$i].'</td>';
												echo '<td width="200px;" align="center">'.$buyerArray[$i].'</td>';
												echo '<td width="200px;" align="center">'.$crenameArray[$i].'</td>';
												echo '<td width="200px;" align="center">'.$paymodeArray[$i].'</td>';
												echo '<td width="200px;" align="right">'.$amountArray[$i].'</td>';										
										echo '</tr>';
									}
							    }						
						    ?>
							
					  </table>
				    </div>
				</div>
				</td>
			</tr>
		 </table>
</div>
</body>
</html>
