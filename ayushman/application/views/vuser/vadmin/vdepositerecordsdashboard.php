<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function() {$(function() {
		$("#bankdepisit").hide();
		$("#bankdepisit1").hide();
		$("#bankdepisit2").hide();
		$("#ReasonforRejection1").hide();
		$("#ReasonforRejection2").hide();
		$("#ReasonforRejection3").hide();
		$("#oldtransid").hide();
		
						$( "#from" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
							var m_names =  new Array("Jan", "Feb", "Mar", 
						"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
						"Oct", "Nov", "Dec");
						
					
						$( "#to" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
							var m_names =  new Array("Jan", "Feb", "Mar", 
						"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
						"Oct", "Nov", "Dec");
						var d = new Date();
						var curr_date = d.getDate();
						var curr_month = d.getMonth();
						var curr_year = d.getFullYear();
						
						
							$( "#Receiptdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
							var m_names =  new Array("Jan", "Feb", "Mar", 
							"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
							"Oct", "Nov", "Dec");
						
						
				});
				$('#benificiary').autocomplete({source:"/ayushman/cautocompletedata/retrieve?query=select distinct(benificiery) as value, 1 as id from statements where benificiery",
						select: function(event, ui) {
					
											},
					minLength: 2,
					disabled: false
				});
			
			$('#exportdeposit').click(function() {
				$('#receiptform').attr("action", "exportdeposit");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			
			$('#exportapprove').click(function() {
				$('#receiptform').attr("action", "exportapprove");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form 
			});
			$('#exportreject').click(function() {
				$('#receiptform').attr("action", "exportreject");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportrecreate').click(function() {
				$('#receiptform').attr("action", "exportrecreate");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
		
		if('<?php echo $searchstat; ?>' == 'Deposited'){
				document.getElementById("openbtn").style.background = "orange";
				document.getElementById("exportdeposit").style.visibility = "visible";
				document.getElementById("exportapprove").style.visibility = "hidden";
				document.getElementById("exportreject").style.visibility = "hidden";
				document.getElementById("exportrecreate").style.visibility = "hidden";
					$("#a").show();
					$("#b").hide();
					$("#c").hide();
					$("#d").hide();
		} 
		if('<?php echo $searchstat; ?>' == 'Approved'){
			document.getElementById("claimbtn").style.background = "orange";
			document.getElementById("exportapprove").style.visibility = "visible";
			document.getElementById("exportdeposit").style.visibility = "hidden";
			document.getElementById("exportreject").style.visibility = "hidden";
			document.getElementById("exportrecreate").style.visibility = "hidden";
				$("#a").hide();
				$("#b").show();
				$("#c").hide();
				$("#d").hide();
		}
		if('<?php echo $searchstat; ?>' == 'Rejected'){
			document.getElementById("rejbtn").style.background = "orange";
			document.getElementById("exportreject").style.visibility = "visible";
			document.getElementById("exportapprove").style.visibility = "hidden";
			document.getElementById("exportdeposit").style.visibility = "hidden";
			document.getElementById("exportrecreate").style.visibility = "hidden";
				$("#a").hide();
				$("#b").hide();
				$("#c").show();
				$("#d").hide();
		}
		if('<?php echo $searchstat; ?>' == 'Recreated'){
			document.getElementById("recrebtn").style.background = "orange";
			document.getElementById("exportreject").style.visibility = "hidden";
			document.getElementById("exportapprove").style.visibility = "hidden";
			document.getElementById("exportdeposit").style.visibility = "hidden";
			document.getElementById("exportrecreate").style.visibility = "visible";
				$("#a").hide();
				$("#b").hide();
				$("#c").hide();
				$("#d").show();
		}
		$("#from")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
		$("#to")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
		$("#trxidall")
			.bind("keydown", function( event ) {
					if ( event.keyCode === $.ui.keyCode.ENTER ) {
						searchbydate();
					}
				}
			)
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
		if(recestatus == 'Recreated'){
				return ' <a style="color:blue;" href="#" onclick="showreceiptdata('+transactionid+')" >View</a>'
			}
	}
	

	function showreceiptdata(trxno)
	{ 
			$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/getdeposittransactiondata?trxno="+trxno,
					success: function(data ) {	
						var data =  JSON.parse(data);    
							console.log(data);
							
							if(data.oldtranid != 0){
								$("#oldtransid").show();
								document.getElementById('oldtrxid').value = data.oldtranid;
							}else{
								$("#oldtransid").hide();
							}							
							document.getElementById('trxid').value = data.trxid;
							document.getElementById('paymode').value = data.paymode;
							document.getElementById('trxamt').value = data.trxamt;
						 	document.getElementById('States').value = data.States;
							document.getElementById('allreceipt').value = data.allreceipt;
							document.getElementById('fsename').value = data.fsename;							
							document.getElementById('accountno').value = data.accountno;							
							document.getElementById('bankslip').value = data.bankslip;							
							document.getElementById('bankname').value = data.bankname;
							//document.getElementById('chequeno').value = data.chequeno;
							document.getElementById('reject').value = data.reject;
							
							if(data.paymode == 'bankdeposit'){
								$("#bankdepisit").show();
								$("#bankdepisit1").show();
								$("#bankdepisit2").hide();
							}
							if(data.paymode == 'Cheque/DD'){
								$("#bankdepisit").show();
								$("#bankdepisit1").show();
								$("#bankdepisit2").show();
							}
							if(data.paymode == 'Cash'){
								$("#bankdepisit").hide();
								$("#bankdepisit1").hide();
								$("#bankdepisit2").hide();
							}
							var recestatus = document.getElementById('statdefine').value;
							console.log(recestatus);
							if(recestatus == 'Rejected'){
								$("#ReasonforRejection1").show();
								$("#ReasonforRejection2").show();
								$("#ReasonforRejection3").show();
							}
					},   
				});
					if( '<?php echo $searchstat; ?>' == 'Deposited' ){
							document.getElementById('approvedbtn').style.visibility = "visible";	
						}else{
							document.getElementById('approvedbtn').style.visibility = "hidden";
							document.getElementById('rejectdbtn').style.visibility = "hidden";
						}
					
					
		$("#dialog-message3").dialog({
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 820,
		dialogClass: 'ui-dialog-osx',
		});		
	}
	function deposittransaction(){
		$('#receiptform').attr("action", "deposittransaction"); 
		$('#receiptform').submit();
	}
	function approvetransaction(){
		$('#receiptform').attr("action", "approvetransaction"); 
		$('#receiptform').submit();
	}
	function rejecttransaction(){
		$('#receiptform').attr("action", "rejecttransaction"); 
		$('#receiptform').submit();
	}
	function recreatetransaction(){
		$('#receiptform').attr("action", "recreatetransaction"); 
		$('#receiptform').submit();
	}
	function searchbydate(){
	var stat = document.getElementById('statdefine').value;
		if(stat == 'Deposited'){	
				$('#receiptform').attr("action", "deposittransaction"); 
				$('#receiptform').submit();
		}else if(stat == 'Approved'){	
				$('#receiptform').attr("action", "approvetransaction"); 
				$('#receiptform').submit();
		}else if(stat == 'Rejected'){	
				$('#receiptform').attr("action", "rejecttransaction"); 
				$('#receiptform').submit();
		}else if(stat == 'Recreated'){	
				$('#receiptform').attr("action", "recreatetransaction"); 
				$('#receiptform').submit();
		}
	}
	function approvedeposit(){
		var trxno = document.getElementById('trxid').value;
		var fsename = document.getElementById('fsename').value;
		var trxamt = document.getElementById('trxamt').value;
		$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/approvedeposittransaction?trxno="+trxno+"&fsename="+fsename+"&trxamt="+trxamt,
					success: function(data ) {	
						var data =  JSON.parse(data);    
							console.log(data);	
							
							location.reload();							
					},
				});		
	}
	function rejectdeposit(){		
		if(document.getElementById('textreason').value != ''){
			var trxno = document.getElementById('trxid').value;
			var reasonforcancel = document.getElementById('textreason').value;
			var allreceipt = document.getElementById('allreceipt').value;
			$.ajax({
					cache: false ,
			url: "/ayushman/crechargebyreceipt/rejectdeposittransaction?trxno="+trxno+"&reasonforcancel="+reasonforcancel+"&allreceipt="+allreceipt,
					success: function(data ) {	
						var data =  JSON.parse(data);    
							console.log(data);										
							location.reload();							
																			
					},
				});	
		}else{
				showNotification('300','20','Reason','Please enter Reason of rejection','notification','diaconfirmation',5000);
		}
	}
	function rejectreason(){
		
			$("#takereason").dialog({
			draggable: false,
			resizable: false,
			position: ['center', 'center'],
			show: 'blind',
			hide: 'blind',
			width: 420,
			dialogClass: 'ui-dialog-osx',
			});	
	
	}
	function depositedetails(){
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecords";		
	}
</script>
	<div id="body_contantpatientpage" style="width:100%; "> 
			<input type="hidden" id="statdefine" value="<?php echo $searchstat; ?>" />		
	   <tr>
		  <td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>Deposits</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		</td>
		<td width="1%">&nbsp;</td>	
		<table width="100%" >	
		<tr>
			<td>
				<input type="button" id="openbtn" style="background:#1c75bc;width:120px" class="button" onclick="deposittransaction();" value="Deposited"/>
				<input type="button" id="claimbtn" style="background:#1c75bc;width:120px" class="button" onclick="approvetransaction();" value="Approved"/>				
				<input type="button" id="rejbtn" style="background:#1c75bc;width:120px" class="button" onclick="rejecttransaction();" value="Rejected"/>
				<input type="button" id="recrebtn" style="background:#1c75bc;width:120px" class="button" onclick="recreatetransaction();" value="Recreated"/>
			</td>
			<td width="30%"></td>
		<!--	<td align="right"><input type="button" id="" class="button" onclick="depositedetails();" value="New deposit record" /></td>-->
		</tr>		
	</table>
	</tr>
	
	<form id="receiptform" method="POST" enctype="multipart/form-data">			
		<table style="width: 100%;">	
				<tr class="Bodytext_bold" >
					<td height="20" style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options:</b> </td>
					<td width="25%"><span class="bodytext_normal">Transaction id</span> &nbsp; <input name="trxidall" id="trxidall" placeholder="Transaction id" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['trxidall'])) echo $previousvalues['trxidall'];?>" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">From</span> &nbsp; <input name="from" id="from" title="Enter From date" placeholder="From date" type="text"  value="" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">To &nbsp; <input name="to" id="to" type="text" title="Enter To date" placeholder="To date"  value="" class="textarea" size="17"/></td>
					<td align="right"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/>
					</td>			
					<td id="a" align="right">
						<input type="button" class="button" id="exportdeposit" style="visibility:hidden; width:79%" value="Export to Excel"/>
					</td>
					<td id="b" align="right">						
						<input type="button" class="button" id="exportapprove" style="visibility:hidden; width:79%" value="Export to Excel"/>
					</td>
					<td id="c" align="right">						
						<input type="button" class="button" id="exportreject" style="visibility:hidden; width:79%" value="Export to Excel"/>
					</td>
					<td id="d" align="right">						
						<input type="button" class="button" id="exportrecreate" style="visibility:hidden; width:79%" value="Export to Excel"/>
					</td>
				</tr>	
					<input type="hidden" id="exportto" name="exportto" value="" />
			</table>
		<table>			
				<tr>
				<td style="width:98%;" >
					<div id="doctorappointmentsgrid" >
						<div id="admingrid" align=center >
					
						<?php				
							$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
							$adminjqgridrequest->post('name','csrtransaction'); // name of gqgrid without space
							$adminjqgridrequest->post('height','320');
							$adminjqgridrequest->post('width','830');
							$adminjqgridrequest->post('sortname','sortdate');
							$adminjqgridrequest->post('sortorder','desc');
							$adminjqgridrequest->post('tablename','csrtrxdetail');//used for jqgrid
							$adminjqgridrequest->post('columnnames','trxdate,trxid,trxamount,modeofpayment,payername,status,allreceipts,trxamount');//used for jqgrid
							$adminjqgridrequest->post('whereclause',$whereclause);
							$columninfo ='[{"name":"Date", "index":"trxdate","width":80, "hidden":false,"align":"center"},
											{"name":"Transaction id", "index":"trxid","width":80, "align":"right","hidden":false},
											{"name":"Amount (&#x20B9;)", "index":"trxamount","width":80, "align":"right"},
											{"name":"Pay Mode", "index":"modeofpayment","width":110, "align":"left"},
											{"name":"Generated by", "index":"payername","width":110, "align":"left"},
											{"name":"Status","index":"status","width":60,"align":"left","hidden":true},
											{"name":"All receipts","index":"allreceipts","width":150,"align":"left"},
											{"name":"Action","index":"trxamount","width":100,"align":"left","formatter":actionFormatter,"align":"left"},]';
					
							$adminjqgridrequest->post('columninfo', $columninfo);					
							$adminjqgridrequest->post('editbtnenable','false');
							$adminjqgridrequest->post('deletebtnenable','false');
							$adminjqgridrequest->post('savebtnenable','false');
							echo $adminjqgridrequest->execute(); 
						?>
			</div>
				
				</div>
				</td>
				<td width="1%">&nbsp;</td>
				</tr>
				<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr><tr>
				<td height="5">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>	
	<div id="dialog-message3" title="Transaction details" style="display: none;" >
			<fieldset style="background-color: rgb(236, 248, 251);">
						 <table width="100%">
							<tr>
								<td class="bodytext_bold">Transaction id</td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="trxid" id="trxid" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td class="bodytext_bold">Pay Mode </td>
								<td class="bodytext_bold">:</td>
								<td colspan="1"><input readonly name="paymode" id="paymode" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Transaction Amount  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="trxamt" id="trxamt" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td class="bodytext_bold">Status </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="States" id="States" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Generated by  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="fsename" id="fsename" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td class="bodytext_bold" id="ReasonforRejection1">Reason for Rejection </td>
								<td class="bodytext_bold" id="ReasonforRejection2">:</td>
								<td colspan="6" id="ReasonforRejection3"><textarea readonly cols="70" name="reject" id="reject" class="textarea" style="resize: none;background-color: rgb(236, 248, 251);" type="text"></textarea></td>
							
							</tr>
							<tr id="oldtransid">
								<td class="bodytext_bold">Old transaction id</td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="oldtrxid" id="oldtrxid" readonly class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">All Receipts  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="6"><textarea readonly cols="100" rows="50"  name="allreceipt" id="allreceipt" class="textarea" style="resize: none; background-color: rgb(236, 248, 251);" type="text"></textarea></td>
							</tr>
							<tr id="bankdepisit">
								<td class="bodytext_bold">Bank Name  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="bankname" id="bankname" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td class="bodytext_bold">Account no. </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="accountno" id="accountno" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr id="bankdepisit1">
								<td class="bodytext_bold">Bank slip no.  </td>
								<td class="bodytext_bold">:</td>
								<td colspan="6"><input readonly cols="100" rows="50"  name="bankslip" id="bankslip" class="textarea" style="background-color: rgb(236, 248, 251);" type="text" /></td>
							</tr>
							<tr id="bankdepisit2">
								<td class="bodytext_bold">Cheque no/DD no. </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="chequeno" id="chequeno" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>								
								<td colspan="7" align="right"><input type="button" id="approvedbtn" class="button" onclick="approvedeposit();" style="width:120px" value="Approve"/></td>
								<td  align="right"><input type="button" id="rejectdbtn" class="button" onclick="rejectreason();" style="width:120px" value="Reject"/></td>
							</tr>
						</table>
				</fieldset>	
				<div id="takereason" style="display:none;" title="Reject reason">
					<table border="1" height="130px" width="420px">	
						<tr><td>
							<table >
								<tr>
									<td  class="bodytext_bold">Enter the Reason</td>
									<td>:</td>
									<td colspan="2"><textarea row="25" name="textreason" id="textreason" value="" style="margin: 0px; height: 47px; width: 196px;"></textarea></td>
									<td><button name="cancelreason" id="cancelreason" class="button bodytext_bold"style="width: 80px;" onclick="rejectdeposit();">Ok</button></td>
								</tr>						
							</table>
						</td></tr>	
					</table>
				</div>
	</div>	
</div>