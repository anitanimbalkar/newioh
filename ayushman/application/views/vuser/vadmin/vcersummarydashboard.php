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
					document.getElementById("recreate").style.visibility = "hidden";
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
				}else  if('<?php echo $searchstat; ?>' == 'Recreated'){			
					document.getElementById("recrebtn").style.background = "orange";
				}else if('<?php echo $searchstat; ?>' == 'Rejected'){
					document.getElementById("rejbtn").style.background = "orange";
					document.getElementById("recreate").style.visibility = "visible";	
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
/*function actionFormatterforstatus(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[4].firstChild.data;
		var depositstatus = $(rowObject).children()[5].firstChild.data;				
		if(recestatus == 'Open' && depositstatus == 'Deposited'){
				return 'Deposited';
			}else if(recestatus == 'Open'){
				return 'Open';
			}	
		if(recestatus == 'Claimed' && depositstatus == 'Deposited'){
				return 'Deposited';
			}else if(recestatus == 'Claimed'){
				return 'Claimed';
			}
		if(recestatus == 'Approved' && depositstatus == 'Deposited'){
				return 'Deposited';
			}else if(recestatus == 'Approved'){
				return 'Approved';
			}
		if(recestatus == 'Refunded' && depositstatus == 'Deposited'){
				return 'Deposited';
			}else if(recestatus == 'Refunded'){
				return 'Refunded';
			}
		if(recestatus == 'Rejected' && depositstatus == 'Deposited'){
				return 'Deposited';
			}else if(recestatus == 'Rejected'){
				return 'Rejected';
			}
	}*/
function actionFormatter(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[4].firstChild.data;
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
							var recestatus = document.getElementById('statdefine').value;
							if(recestatus == 'Rejected'){
								$("#ReasonforRejection1").show();
								$("#ReasonforRejection2").show();
								$("#ReasonforRejection3").show();
							}
							document.getElementById('trxid').value = data.trxid;
							document.getElementById('paymode').value = data.paymode;
							document.getElementById('trxamt').value = data.trxamt;
						 	document.getElementById('States').value = data.States;
							document.getElementById('allreceipt').value = data.allreceipt;
							document.getElementById('fsename').value = data.fsename;
							document.getElementById('accname').value = data.accname;							
							document.getElementById('accountno').value = data.accountno;							
							document.getElementById('bankslip').value = data.bankslip;							
							document.getElementById('bankname').value = data.bankname;
							document.getElementById('reject').value = data.bankname;
							document.getElementById('reject').value = data.reasonforrejection;
							
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
					},
				});
				
					
		$("#dialog-message3").dialog({
			draggable: false,
			resizable: false,
			position: ['top', 'center'],
			show: 'blind',
			hide: 'blind',
			width: 820,
		});		
	}
	function depositedetails(){
		var allrecpt = '';
		var oldtrnid = '';		
		var allrecptamt = '';
		var allrecptaccountant = '';
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecords?allrecpt="+allrecpt+"&oldtrnid="+oldtrnid+"&allrecptamt="+allrecptamt+"&allrecptaccountant="+allrecptaccountant;		
	}
	function deposittransaction(){
		$('#receiptform').attr("action", "deposittransaction"); 
		$('#receiptform').submit();
	}
	function approvetransaction(){
		$('#receiptform').attr("action", "approvetransaction"); 
		$('#receiptform').submit();
	}
	function rejectedtransaction(){
		$('#receiptform').attr("action", "rejecttransaction"); 
		$('#receiptform').submit();
	}
	function recreatedtransaction(){
		$('#receiptform').attr("action", "recreatedtransaction"); 
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
		}
	}
	
	function recreatedeposit(){
		var allrecpt = document.getElementById('allreceipt').value;
		var oldtrnid = document.getElementById('trxid').value;
		var allrecptamt = document.getElementById('trxamt').value;
		var allrecptaccountant = document.getElementById('accname').value;
		var allrecptpaymode = document.getElementById('paymode').value;
		window.location.href="/ayushman/ccashreceiptdeposite/depositerecordsrecreate?allrecpt="+allrecpt+"&oldtrnid="+oldtrnid+"&allrecptamt="+allrecptamt+"&allrecptaccountant="+allrecptaccountant+"&allrecptpaymode="+allrecptpaymode;	
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
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Deposits</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		</td>
		<td width="1%">&nbsp;</td>	
		<table width="100%">	
		<tr>
			<td >
				<input type="button" id="openbtn" style="background:#1c75bc;width:120px;" class="button" onclick="deposittransaction();" value="Deposited"/>
				<input type="button" id="claimbtn" style="background:#1c75bc;width:120px;" class="button" onclick="approvetransaction();" value="Approved"/>
				<input type="button" id="rejbtn" style="background:#1c75bc;width:120px;" class="button" onclick="rejectedtransaction();" value="Rejected"/>
				<input type="button" id="recrebtn" style="background:#1c75bc;width:120px;" class="button" onclick="recreatedtransaction();" value="Recreated"/>
			</td>
			<td align="right">
				<input type="button" id=""  style="width:180px" class="button" onclick="depositedetails();" value="List of receipts not deposited " />
			</td>
		</tr>		
		</table>
	</tr>
	
	<form id="receiptform" method="POST" enctype="multipart/form-data" action="search">			
		<table style="width: 100%;">	
				<tr class="Bodytext_bold" >
					<td height="20" width="14%"style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"><b>Search Options:</b> </td>
					<td width="25%"><span class="bodytext_normal">Transaction id</span> &nbsp; <input name="trxidall" id="trxidall" placeholder="Transaction id" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['trxidall'])) echo $previousvalues['trxidall'];?>" class="textarea" size="17"/></td>
					<td width="20%"><span class="bodytext_normal">From</span> &nbsp; <input name="from" id="from" placeholder="From date" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
					<td width="20%"><span class="bodytext_normal">To &nbsp; <input name="to" id="to" type="text" placeholder="To date"  value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
					<td align="right" width="10%"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/>
					</td>			
					<td align="left"></td>
				</tr>				
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
							$adminjqgridrequest->post('columnnames','trxdate,trxid,payeename,allreceipts,status,modeofpayment,trxamount,trxamount');//used for jqgrid
							$adminjqgridrequest->post('whereclause',$whereclause);
							$columninfo ='[{"name":"Date", "index":"trxdate","width":80, "hidden":false,"align":"center"},
											{"name":"Transaction id", "index":"trxid","width":80, "align":"right","hidden":false},											
											{"name":"Accountant name", "index":"payeename","width":110, "align":"left"},
											{"name":"All receipts","index":"allreceipts","width":140,"align":"left"},
											{"name":"Status","index":"status","width":60,"align":"left","hidden":true},
											{"name":"Pay Mode", "index":"modeofpayment","width":110, "align":"left"},
											{"name":"Amount (&#x20B9;)", "index":"trxamount","width":80, "align":"right"},
											{"name":"Action","index":"trxamount","width":100,"align":"left","formatter":actionFormatter,"align":"left"},]';
					
							$adminjqgridrequest->post('columninfo', $columninfo);					
							$adminjqgridrequest->post('editbtnenable','false');
							$adminjqgridrequest->post('deletebtnenable','false');
							$adminjqgridrequest->post('savebtnenable','false');
							echo $adminjqgridrequest->execute(); ?>
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
					<form id="formtransaction">	
						<table width="100%">
							<tr>
								<td class="bodytext_bold">Transaction id</td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="trxid" id="trxid" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td class="bodytext_bold">Pay Mode </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="paymode" id="paymode" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
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
								<td class="bodytext_bold">Accountant name </td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="accname" id="accname" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								
							</tr>
							<tr id="oldtransid">
								<td class="bodytext_bold">Old transaction id</td>
								<td class="bodytext_bold">:</td>
								<td colspan="2"><input readonly name="oldtrxid" id="oldtrxid" readonly class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold" id="ReasonforRejection1">Reason for Rejection </td>
								<td class="bodytext_bold" id="ReasonforRejection2">:</td>
								<td colspan="6" id="ReasonforRejection3"><textarea readonly cols="70" name="reject" id="reject" class="textarea" style="resize: none;background-color: rgb(236, 248, 251);" type="text"></textarea></td>
							
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
							<tr>
								<td colspan="7" align="right"></td>
								<td  align="right"><input type="button" id="recreate" class="button" onclick="recreatedeposit();" style="width:120px" value="Recreate"/></td>
							</tr>							
						</table>
					</form>
				</fieldset>	
	</div>			
</div>