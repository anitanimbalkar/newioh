<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<link href="/ayushman/assets/css/bootstrap.min.css" rel="stylesheet">
<style>
hr {
    display: block;
    -webkit-margin-before: 0.5em;
    -webkit-margin-after: 0.5em;
    -webkit-margin-start: auto;
    -webkit-margin-end: auto;
    border-style: inset;
    border-width: 1px;
}
.textformat{
	height:95%; 	
	width: 98%;  	   
	border:none;
	font-size: 14px; 
	resize:none;
	background: #FFFFFF;
}
.waiting1 {
    border: 1px solid black;
    border-radius: 0%;
    padding: 6px;
    text-align: left;
    margin-bottom: 3%;
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.3);
}
</style>
<script type="text/javascript">
$(document).ready(function() {$(function() {
			$("#chequetable").hide();
			$("#chequetable1").hide();
			$("#onlinetable1").hide();
			$("#chequetable3").hide();
			$("#chequetable4").hide();
			$("#onlinetable").hide();
			$( "#from" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
					
			$( "#to" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			
			$( "#Receiptdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			
			if('<?php echo $searchstat; ?>' == 'Deposited'){
				document.getElementById("openbtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Approved'){
				document.getElementById("claimbtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Rejected'){
				document.getElementById("rejbtn").style.background = "orange";
			}
			
			});
			$('#benificiary').autocomplete({source:"/ayushman/cautocompletedata/retrieve?query=select distinct(benificiery) as value, 1 as id from statements where benificiery",
					select: function(event, ui) {
					
											},
					minLength: 2,
					disabled: false
				});
			$('#export').click(function() {
    			$('#receiptform').attr("action", "export");  //change the form action
			$('#exportto').val('excel');
			$('#receiptform').submit();  // submit the form
		});		
	});
function urlformatter( cellvalue, options, rowObject ){

	return '<a href="'+cellvalue+'" >'+cellvalue+'</a>';
}
function actionFormatter(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[5].firstChild.data;
		var transactionid = $(rowObject).children()[1].firstChild.data;
		if(recestatus == 'Deposited'){
				return ' <a style="color:blue;" href="#" onclick="showreceiptdata('+transactionid+')" >View</a>';
			}
		if(recestatus == 'Approved'){
				return ' <a style="color:blue;" href="#" onclick="showreceiptdata('+transactionid+')" >View</a>'
			}	
		if(recestatus == 'Rejected'){
				return ' <a style="color:blue;" href="#" onclick="showreceiptdata('+transactionid+')" >View</a>'
			}
	}
		
	function newpagefunction(cellvalue, options, rowObject){
		var type = $(rowObject).children()[2].firstChild.data;
		var name = $(rowObject).children()[1].firstChild.data;
		var spid = $(rowObject).children()[0].firstChild.data;
		return ' <a style="color:blue;" href="#" onclick="depositedetails('+spid+')" >'+name+'</a>';
	}

function createnewinvoice(){
		var spid = document.getElementById('statdefine').value;
		window.location='/ayushman/cinvoice/viewkart?spid='+spid;
	}
function openreceipt (){
		var spid = document.getElementById('statdefine').value;
		$.ajax({
					cache: false ,
					url: "/ayushman/cinvoicedata/getspdata?spid="+spid,
					success: function(data ) {	
						var data =  JSON.parse(data);    
							console.log(data);
							document.getElementById('serviceproviderName').value = data.spname;
							document.getElementById('Mobileno').value = data.spmono;
							document.getElementById('Addressline1').value = data.spadd;
					},
				});
	  	
	$("#formdiv").dialog({
			draggable: true,
			resizable: false,
			show: 'blind',
			hide: 'blind',
			width: 820,
		});
	}
	
function createsinglereceipt()
	{         	  	 
					if(document.getElementById('mySelect').value == 'Cash'){
								if(document.getElementById('Receiptdate').value == ''){
									showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Description').value == ''){
									showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Amount').value == ''){
									showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
								}else{		
									$.ajax({
										type:"POST",
										url: "/ayushman/cinvoicedata/generatereceipt",
										data: $("#generatereceiptform").serialize(),
										success: function(data ) {	
											var data =  JSON.parse(data);
											console.log(data);	
											generatereceiptform.reset();													
												showNotification('300','20','success','Receipt created successful.','notification','diaconfirmation',5000);
													$('#receipno').text(data.rcptno);
													$('#receipamount').text(data.rcptamt);
													$('#receipdate').text(data.rcpdate);
													$('#receipname').text(data.rcppayname);
																															
														$("#print_box").dialog({
															draggable: false,
															resizable: false,
															position: ['center', 'center'],
															show: 'blind',
															hide: 'blind',
															width: 820,
															dialogClass: 'ui-dialog-osx',
														});
																
										},});
								}
								
					}else if(document.getElementById('mySelect').value == 'Online'){
								if(document.getElementById('Receiptdate').value == ''){
									showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Description').value == ''){
									showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Amount').value == ''){
									showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
								}else if(document.getElementById('ontranNo').value == ''){
									showNotification('300','20','no data','Please enter the online transaction no.','notification','diaconfirmation',5000);
								}else{		
									$.ajax({
										type:"POST",
										url: "/ayushman/cinvoicedata/generatereceipt",
										data: $("#generatereceiptform").serialize(),
										success: function(data ) {	
											var data =  JSON.parse(data);
											console.log(data);	
											generatereceiptform.reset();													
												showNotification('300','20','success','Receipt created successful.','notification','diaconfirmation',5000);
													$('#receipno').text(data.rcptno);
													$('#receipamount').text(data.rcptamt);
													$('#receipdate').text(data.rcpdate);
													$('#receipname').text(data.rcppayname);
																															
														$("#print_box").dialog({
															draggable: false,
															resizable: false,
															position: ['center', 'center'],
															show: 'blind',
															hide: 'blind',
															width: 820,
															dialogClass: 'ui-dialog-osx',
														});
																
										},});
								}
								
					}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
								if(document.getElementById('Receiptdate').value == ''){
									showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Description').value == ''){
									showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
								}else if(document.getElementById('Amount').value == ''){
									showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
								}else if(document.getElementById('chequeddNo').value == ''){
									showNotification('300','20','no data','Please enter the Cheque/dd No.','notification','diaconfirmation',5000);
								}else if(document.getElementById('BankName').value == ''){
									showNotification('300','20','no data','Please enter the Bank Name.','notification','diaconfirmation',5000);
								}else if(document.getElementById('branch').value == ''){
									showNotification('300','20','no data','Please enter the Bank branch name.','notification','diaconfirmation',5000);
								}else if(document.getElementById('chequedate').value == ''){
									showNotification('300','20','no data','Please enter the Cheque date.','notification','diaconfirmation',5000);
								}else{		
									$.ajax({
										type:"POST",
										url: "/ayushman/cinvoicedata/generatereceipt",
										data: $("#generatereceiptform").serialize(),
										success: function(data ) {	
												var data =  JSON.parse(data);
												generatereceiptform.reset();	
													
												showNotification('300','20','success','Receipt created successful.','notification','diaconfirmation',5000);
													$('#receipno').text(data.rcptno);
													$('#receipamount').text(data.rcptamt);
													$('#receipdate').text(data.rcpdate);
													$('#receipname').text(data.rcppayname);
																															
														$("#print_box").dialog({
															draggable: false,
															resizable: false,
															show: 'blind',
															hide: 'blind',
															width: 820,
															dialogClass: 'ui-dialog-osx',
														});
																
										},
									});
								}
					}		
	}
	
	function modeofpayment(){
				var modeofpayment = document.getElementById("mySelect").value;
				if( modeofpayment == 'Cheque/DD' )
				{
					$("#chequetable").show(); 
					$("#chequetable1").show();
					$("#onlinetable1").hide();
				}else if( modeofpayment == 'Cash' )
				{
					$("#chequetable").hide();
					$("#chequetable1").hide();
					$("#onlinetable1").hide();
				}else if( modeofpayment == 'Online' )
				{
					$("#chequetable").hide();
					$("#chequetable1").hide();
					$("#onlinetable1").show();
				}
		}
		
	function PrintElem(elem)
		{	
			console.log($(elem).html());
			Popup($(elem).html());	
		}
		function Popup(data) 
		{
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
		function onpage(){
			var spid = document.getElementById("statdefine").value;
			location.href = "/ayushman/cinvoice/viewinvoicedetails?spid="+spid;
		}
		function services(invrcpno)
		{
			var per0 = 14;
			var per1 = 0.50;
			var per2 = 0.50;
												
			parent.window.openDialog('/ayushman/cinvoice/generateprint?invid='+invrcpno+'&per0='+per0+'&per1='+per1+'&per2='+per2,800,500); 
		}
		function viewreceipt(rcptno){			
			$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+rcptno,
					success: function(data ) {	    
						var data =  JSON.parse(data);
							document.getElementById('serviceproviderName1').value = data.fname;
							document.getElementById('Mobileno1').value = data.mobilenumber;
							
						//	document.getElementById('Receiptdepstat1').value = data.depositsta;
							var str = data.landmark+" "+data.flineadd+" "+data.locality+" "+data.city+" "+data.state+" "+data.country+" "+data.pincode;
							console.log(data.amount);
							document.getElementById('Addressline11').value = str;
							document.getElementById('ReceiptNo').value = data.rcptno;
							document.getElementById('Receiptdate1').value = data.rcptdate;
							document.getElementById('Description1').value = data.description;
						 	document.getElementById('Amount1').value = data.amount;
								if(data.chequeId != null){ 
										$("#chequetable3").show(); 
										$("#chequetable4").show();
										$("#onlinetable").hide();
									document.getElementById('mySelect').value = 'Cheque/DD';									
									document.getElementById('chequedate').value = data.chequedate;
									document.getElementById('chequeddNo').value = data.chequeId;
									document.getElementById('BankName').value = data.bank;
									document.getElementById('branch').value = data.bankbranch;
								}else{
									document.getElementById('mySelect').value = 'Cash';
									$("#chequetable3").hide();
									$("#chequetable4").hide();
									$("#onlinetable").hide();
								}
							$("#recptview").dialog({
								draggable: true,
								resizable: false,
								position: ['top', 'center'],
								show: 'blind',
								hide: 'blind',
								width: 820,
							});	
					},
					error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
				});				
	}
	function modeofpaymentrcpt(){
				var modeofpayment = document.getElementById("mySelect").value;
				if( modeofpayment == 'Cheque/DD' )
				{
					$("#chequetable3").show();
					$("#chequetable4").show();
					$("#onlinetable1").hide();
				}else if( modeofpayment == 'Cash' )
				{
					$("#chequetable3").hide();
					$("#chequetable4").hide();
					$("#onlinetable1").hide();
				}else if( modeofpayment == 'Online' )
				{
					$("#chequetable3").hide();
					$("#chequetable4").hide();
					$("#onlinetable1").show();
				}
		}
	function searchbydate(){
		var spid = document.getElementById("statdefine").value;
		var fdate = document.getElementById("from").value;
		var tdate = document.getElementById("to").value;
		var recptinvno = document.getElementById("invoiceno").value;
	window.location='/ayushman/cinvoice/viewinvoicedetails?spid='+spid+'&fdate='+fdate+'&tdate='+tdate+"&recptinvno="+recptinvno;
	}
	function printreceipt()   
	{ 
				var receiptid = document.getElementById("ReceiptNo").value;
			$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
										console.log(data);	
								var spname = data.fname+" "+data.lname;
							//document.getElementById('receipname').value = data.fname+" "+data.lname;
						//	document.getElementById('receipdate').value = data.rcptdate;							
							//document.getElementById('receipno').value = data.rcptno;
						 //	document.getElementById('receipamount').value = data.amount;
							$("#receipname").text(spname);
							$("#receipdate").text(data.rcptdate);
							$("#receipno").text(data.rcptno);
							$("#receipamount").text(data.amount);
							PrintElem('#sendtoprint');								
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});				
	}
</script>
	<div id="body_contantpatientpage" style="width:100%; "> 
			<input type="hidden" id="statdefine" value="<?php echo $id; ?>" />
	            <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;" colspan="5">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong> &nbsp;&nbsp; <?php echo "$sptype";?> - <?php echo "$spname";?> (<?php echo "$id";?>)</strong>
									<a ng-click="loading(true);" style="float:right;" href="javascript:history.go(-1)" class="bodytext_normal"><img src="/ayushman/assets/app/img/goback2.png" style="width:80px;height:30px"/></a>
								</td>								
							</tr>
						</table> 
					  </td>
					</tr>
					<tr>
						<td colspan="5" >	
						  <br></td>
					</tr>
					<tr class="Bodytext_bold">
						<td height="20" style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options: </b></td>					
						<td><span class="bodytext_normal">Invoice no/Receipt no</span> &nbsp; <input name="invoiceno" title="Enter Invoice number or Receipt number" id="invoiceno" value="<?php if ($previousvalues != null)if (isset($previousvalues['invoiceno']))echo $previousvalues['invoiceno'];?>" placeholder="Invoice/Receipt no" type="text" class="textarea" size="17"/></td>
						<td><span class="bodytext_normal">From</span> &nbsp; <input name="from" id="from" placeholder="From date" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
						<td><span class="bodytext_normal">To &nbsp; <input name="to" id="to" type="text" placeholder="To date"  value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
						<td align="right">
							<input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/>
						</td>							
					</tr>
					
					<tr>
					<td colspan="5" >	
						<hr/> </td>
					</tr>
			</table>		
					<?php
							echo '<table  style="width:100%;display:block;height:100%;font-family:arial;" border="3" class="table table-bordered table-condensed bodytext_normal">';
									echo '<tr class="bodytext_bold" style = "font-size:9pt; " >';
										echo '<td width="200px" align="right">';	
											echo "Net due ";
										echo '</td >';
										echo '<td width="200px" align="right">';	
											echo "$netdeu";
										echo '</td >';
										echo '<td width="250px" align="right">';											
											echo 'Total';
										echo '</td>';
										echo '<td width="200px" style="padding-right:20px" align="right">';
											echo "$totalinv";
										echo '</td>';										
										echo '<td width="200px" style="padding-right:20px" align="right">';
											echo "$totalrepct";
										echo '</td>';
									echo '</tr>';	
									echo '<tr style = "font-size:9pt;color:#fff;" class="Heading_Bg" >';
										
										echo '<td width="200px">';	
											echo 'Date';
										echo '</td>';
										echo '<td width="200px"  colspan="2" >';	
											echo 'Invoice/Receipt no';
										echo '</td>';	
											
										echo '<td width="200px" align="left">';	
											echo 'Invoice amount(Rs.)';
										echo '</td>';
										echo '<td width="200px" align="left">';	
											echo 'Receipt amount(Rs.)';
										echo '</td>';
									echo '</tr >';
										if(count($invoicenoArray) != 0){									
											for( $i = 0 ; $i < (count($invoicenoArray)) ; $i++){	
													echo '<tr style = "font-size:9pt;">';
													if($invoicetypeArray[$i] == "INVOICE"){																
															echo '<td width="200px"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="'.$invoicedtArray[$i].'" /></td>';
															echo '<td width="250px"  colspan="2"> <a href="#" onClick=services("'.$invoicenoArray[$i].'");><font color="blue">'.$invoicenoArray[$i].'</font></a></td>';															
															echo '<td width="200px" style="padding-right:20px" align="right"> '.$invoiceamountArray[$i].'</td>';																											
															echo '<td width="200px" align="right"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="" /></td>';
														}else if($invoicetypeArray[$i] == "RCPT"){
															echo '<td width="200px"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="'.$invoicedtArray[$i].'" /></td>';
															echo '<td width="250px" colspan="2"> <a href="#" onClick=viewreceipt("'.$invoicenoArray[$i].'");><font color="blue">'.$invoicenoArray[$i].'</font></a></td>';															
															echo '<td width="200px" align="right"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="" /></td>';
															echo '<td width="200px" style="padding-right:20px" align="right"> '.$invoiceamountArray[$i].'</td>';																											
														}
													echo '</tr>';									
											}
										}
										else
										{ // Display empty line
											echo '<td width="200px"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="" /></td>';
											echo '<td width="250px"> </td>';															
											echo '<td width="200px" align="right"> </td>';																											
											echo '<td width="200px" align="right"> <input readonly class="textformat bodytext_bold" type="text" name="" id="" value="" /></td>';										
										}
									echo '<tr class="bodytext_bold" style = "font-size:9pt;" >';
										echo '<td width="200px" align="right">';
											echo "Net due ";
										echo '</td >';
										echo '<td width="200px" align="right">';	
											echo "$netdeu";
										echo '</td >';
										echo '<td width="200px" align="right">';
											echo 'Total';
										echo '</td>';
										echo '<td width="200px" style="padding-right:20px" align="right">';
											echo "$totalinv";
										echo '</td>';
										
										echo '<td width="200px" style="padding-right:20px" align="right">';
											echo "$totalrepct";
										echo '</td>';
									echo '</tr>';
									
							echo '</table>';										
						?> 												
	<div id="formdiv" title="Invoice Receipt" style="display: none;">
		<div  class="waiting1" >
			<form id="generatereceiptform">
				<fieldset style="background-color: rgb(236, 248, 251);">
					<fieldset>
						<legend  class="bodytext_bold"></legend>
							<table width="100%">
							<tr>
								<td class="bodytext_bold">Provider Name:</td>
								<td class="bodytext_bold"> <input readonly name="serviceproviderName" id="serviceproviderName" class="textarea" placeholder="First name" type="text"/>  </td>
								<td class="bodytext_bold">Mobile No.:</td>						
								<td class="bodytext_bold"><input readonly name="Mobileno" id="Mobileno" class="textarea" type="text" maxlength="10"/></td>
								<td class="bodytext_bold">IOHid.:</td>						
								<td class="bodytext_bold"><input readonly name="spiohid" id="spiohid" class="textarea" type="text" maxlength="10"  value="<?php echo $id; ?>"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Address: </td>
								<td colspan="4"><input readonly name="Addressline1" id="Addressline1" style="width: 50%;" class="textarea" type="text"/></td>
							</tr>							
						</table>
					</fieldset>	
					<fieldset>
						<legend>Receipt Details:</legend>
							<table width="100%">
								<tr>
									<td class="bodytext_bold">Mode of payment </td>
									<td class="bodytext_bold">:</td>
									<td><select onchange="modeofpayment();" name="mySelect" id="mySelect">
											<option value="Cash">Cash</option>
											<option value="Cheque/DD">Cheque/DD</option>
											<option value="Online">Online</option>
										</select>
									</td>	
										<td></td>
										<td class="bodytext_bold">Receipt date </td>
										<td class="bodytext_bold">:</td>
										<td class="bodytext_bold"><input type="text" name="Receiptdate" id="Receiptdate" class="textarea" /></td>
								</tr>
								<tr >
									<td class="bodytext_bold">Description* 	</td>
									<td class="bodytext_bold">:</td>
									<td><input name="Description" id="Description" class="textarea" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Amount* </td>
									<td class="bodytext_bold">:</td>
									<td><input name="Amount" id="Amount" class="textarea" type="text"/></td>
								</tr>	
								<tr id="chequetable">
									<td class="bodytext_bold">Cheque/DD No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="chequeddNo" id="chequeddNo" class="textarea" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Bank Name*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="BankName" id="BankName" class="textarea" type="text"/></td>
								</tr>
								<tr id="onlinetable1">
									<td class="bodytext_bold">Online transaction No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="ontranNo" id="ontranNo" class="textarea" type="text"/></td>
									
								</tr>
								<tr  id="chequetable1">
									<td class="bodytext_bold">Branch*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="branch" id="branch" class="textarea" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Cheque date*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="chequedate" id="chequedate" class="textarea" type="text"/></td>
								</tr>
						</table>
							</hr>						
					</fieldset>			
						<br/>
						<table width="100%">
						<tr width="100%">
							<td width="25%" align="right"></td>
							<td width="15%"><input type="button" class="button" value="Generate" onclick="createsinglereceipt();" style="width:100px;"/></td>
						<td width="25%"></td>
						</tr>
						</table>
				</fieldset>
			</form>
		</div>	
	</div>	
	<div id="recptview" title="Receipt details" style="display: none;"style="width: 680px; background-color: rgb(236, 248, 251);">
		<div  class="waiting1" style="background-color: rgb(236, 248, 251);">
			<form id="generatereceiptform">
				<fieldset>
					<fieldset>
						<legend  class="bodytext_bold"></legend>
							<table width="100%" style="background-color: rgb(236, 248, 251);">
							<tr>
								<td class="bodytext_bold" >Provider Name:</td>
								<td class="bodytext_bold"> <input readonly name="serviceproviderName1" id="serviceproviderName1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/>  </td>
								<td class="bodytext_bold">Mobile No.:</td>						
								<td class="bodytext_bold"><input readonly name="Mobileno1" id="Mobileno1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text" maxlength="10"/></td>
								<td class="bodytext_bold">IOHid.:</td>						
								<td class="bodytext_bold"><input readonly name="spiohid1" id="spiohid1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text" maxlength="10"  value="<?php echo $id; ?>"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Address: </td>
								<td colspan="4"><input readonly name="Addressline11" id="Addressline11" style="width: 50%;background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>							
						</table>
					</fieldset>	
					<fieldset>
						<legend>&nbsp;&nbsp;&nbsp;&nbsp;</legend>
							<table width="100%" style="background-color: rgb(236, 248, 251);">
								<tr>
									<td class="bodytext_bold">Mode of payment </td>
									<td class="bodytext_bold">:</td>
									<td><select readonly onchange="modeofpaymentrcpt();" name="mySelect1"  id="mySelect1" style="background-color: rgb(236, 248, 251);">
											<option value="Cash">Cash</option>
											<option value="Cheque/DD">Cheque/DD</option>
											<option value="Online">Online</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="bodytext_bold">Receipt No  </td>
									<td class="bodytext_bold">:</td>
									<td><input readonly name="ReceiptNo" readonly id="ReceiptNo" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/>
									</td>
									
										<td></td>
										<td class="bodytext_bold">Receipt date </td>
										<td class="bodytext_bold">:</td>
										<td class="bodytext_bold"><input readonly type="text" name="Receiptdate1" id="Receiptdate1" class="textarea" style="background-color: rgb(236, 248, 251);"/></td>
								</tr>
								<tr >
									<td class="bodytext_bold">Description* 	</td>
									<td class="bodytext_bold">:</td>
									<td><input name="Description1" readonly id="Description1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Amount* </td>
									<td class="bodytext_bold">:</td>
									<td><input name="Amount1" readonly id="Amount1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>	
								<tr id="chequetable3">
									<td class="bodytext_bold">Cheque/DD No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="chequeddNo1" readonly id="chequeddNo1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Bank Name*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="BankName1" readonly id="BankName1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr id="onlinetable">
									<td class="bodytext_bold">Online transaction No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="ontranNo1" readonly id="ontranNo1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									
								</tr>
								<tr  id="chequetable4">
									<td class="bodytext_bold">Branch*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="branch1" readonly id="branch1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Cheque date*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="chequedate1" readonly id="chequedate1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr>
									<td colspan="7" align="right"> <input class="button" type="button" id="" name="" value="Print" onclick="printreceipt();"</td>
								</tr>
						</table>
							</hr>						
					</fieldset>			
											
				</fieldset>
			</form>
		</div>	
	</div>
		<div id="print_box" style="display:none" title="Print Receipt">
				<div id="sendtoprint">
						<table style="width:100%;">
								<tr>
									<td rowspan="12  " style="width:10px;"></td>
									<td style="width:100px;"></td>
									<td style="width:200px;">	</td>
									<td colspan="5"></td>
									<td style="width:100px;" class="bodytext_bold">	Receipt No:	</td>
									<td style="width:200px;">	<label id="receipno" name="receipno"></label></td>
								</tr>
								<tr>
									
									<td style="width:100px;"></td>
									<td style="width:200px;"></td>
									<td colspan="5"></td>
									<td style="width:100px;" class="bodytext_bold">	Receipt date: 	</td>
									<td style="width:100px;"><label id="receipdate" name="receipdate"></td>
								</tr>
								<tr>
										<td colspan="9"><hr/></td>
								</tr>
								<tr>
									<td colspan="9" class="bodytext_bold">	RECEIVED with thanks from:	<label id="receipname" name="receipname"></label></td>
								</tr>
								<tr>
									<td colspan="9" class="bodytext_bold">	Receipt amount:<label id="receipamount" name="receipamount"></label>	</td>
								</tr>
								<tr style="height=100px;">
									<td  colspan="9"></td>								
								</tr>
								<tr height="100px;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>							
								<tr>
									<td class="bodytext_bold">	(FSE sign)		</td>
									<td>					</td>
									<td colspan="5"></td>
									<td>	 				</td>
									<td class="bodytext_bold"> (Consumer sign)	</td>
								</tr>
								<tr>
									<td align="left" colspan="9" class="bodytext_bold">	This receipts is valid subject to Realization of cheque	</td>
								</tr>
								<tr>
										<td colspan="9"><hr/></td>
								</tr>
								<tr>
										<td colspan="9" align="right" class="bodytext_bold">Ayushman Pvt. Ltd, Webside:www.indiaonlinehealth.com </td>
								</tr>
								<tr>
									<td align="right" colspan="9" class="bodytext_bold">CIN:U85100PN2011PTC140488. </td>
								</tr>
							</table>	
						</div>						
							<table style="width:100%;">
								<tr>
										<td align="right"><input type="button" class="button" value="Print" onclick="PrintElem('#sendtoprint');" /></td>
										<td align="left"><input type="button" class="button" value="close" onclick="onpage();" /></td>
								</tr>
							</table>
			</div>
			
</div>