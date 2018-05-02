<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function() {$(function() {
	document.getElementById("btnrefund").style.visibility = "hidden";
	document.getElementById("btnrefundapprove").style.visibility = "hidden";
			$( "#from" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				
				    //$( "#from" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
			
		
			$( "#to" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
			
				  //  $( "#to" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
			
			
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
			    
			$('#exportrefund').click(function() {
				$('#receiptform').attr("action", "exportrefunded");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportall').click(function() {
				$('#receiptform').attr("action", "exportall");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportreject').click(function() {
				$('#receiptform').attr("action", "exportrejected");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportapprove').click(function() {
				$('#receiptform').attr("action", "exportapprove");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportclaim').click(function() {
				$('#receiptform').attr("action", "exportclaim");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportopen').click(function() {
				$('#receiptform').attr("action", "exportopen");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
			$('#exportgenerat').click(function() {
				$('#receiptform').attr("action", "exportgenerated");  //change the form action
				$('#exportto').val('excel');
				$('#receiptform').submit();  // submit the form
			});
		if('<?php echo $searchstat; ?>' == 'all'){			
			document.getElementById("allbtn").style.background = "orange";			
			document.getElementById("exportall").style.visibility = "visible";		
			$("#Reason").hide();
			$("#a").show();
			$("#b").hide();
			$("#c").hide();
			$("#d").hide();
			$("#e").hide();
			$("#f").hide();
			$("#g").hide();
		}else if('<?php echo $searchstat; ?>' == 'Open'){
			document.getElementById("openbtn").style.background = "orange";			
			document.getElementById("exportopen").style.visibility = "visible";
			$("#a").hide();
			$("#b").show();
			$("#c").hide();
			$("#d").hide();
			$("#e").hide();
			$("#f").hide();
			$("#g").hide();
			$("#Reason").hide();
		}else if('<?php echo $searchstat; ?>' == 'Claimed'){
			document.getElementById("claimbtn").style.background = "orange";
			document.getElementById("exportclaim").style.visibility = "visible";
			$("#a").hide();
			$("#b").hide();
			$("#c").show();
			$("#d").hide();
			$("#e").hide();
			$("#f").hide();
			$("#g").hide();
			$("#Reason").hide();
		}else if('<?php echo $searchstat; ?>' == 'Approved'){
			document.getElementById("approvebtn").style.background = "orange";
			document.getElementById("exportapprove").style.visibility = "visible";
			$("#a").hide();
			$("#b").hide();
			$("#c").hide();
			$("#d").show();
			$("#e").hide();
			$("#f").hide();
			$("#g").hide();
			$("#Reason").hide();
		}else if('<?php echo $searchstat; ?>' == 'Rejected'){
			document.getElementById("rejectbtn").style.background = "orange";
			document.getElementById("exportreject").style.visibility = "visible";
			$("#a").hide();
			$("#b").hide();
			$("#c").hide();
			$("#d").hide();
			$("#e").show();
			$("#f").hide();
			$("#g").hide();
			$("#Reason").show();
		}else if('<?php echo $searchstat; ?>' == 'Refunded'){			
		//	document.getElementById("refundbtn").style.background = "orange";
		//  document.getElementById("exportrefund").style.visibility = "visible";
			$("#a").hide();
			$("#b").hide();
			$("#c").hide();
			$("#d").hide();
			$("#e").hide();
			$("#f").show();
			$("#g").hide();
			$("#Reason").show();
		}else if('<?php echo $searchstat; ?>' == 'Generated'){			
			document.getElementById("Generatedbtn").style.background = "orange";
			document.getElementById("exportgenerat").style.visibility = "visible";
			$("#a").hide();
			$("#b").hide();
			$("#c").hide();
			$("#d").hide();
			$("#e").hide();
			$("#f").hide();
			$("#g").show();
			$("#Reason").hide();
		}	
	$("#receino").bind("keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.ENTER ) {
					searchbydate();
				}
			})
	$("#payername")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		  }
		)
	$("#facname")
		.bind("keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		})
	$("#from")
		.bind("keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		})	
	$("#to")
		.bind("keydown", function( event ) {
		if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydate();
			}
		})		
	});  
	
	function actionFormatterforstatus(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[4].firstChild.data;
		var depositstatus = $(rowObject).children()[5].firstChild.data;		
	if(recestatus == 'Open' && depositstatus == 'Deposited'){
				return 'OPEN/DPSTD';
			}else if(recestatus == 'Open' && depositstatus == 'Notdeposit'){
				return 'OPEN/NOT DPSTD';
			}else if(recestatus == 'Open' && depositstatus == 'Accepted'){
				return 'OPEN/ACCPT';
			}	
		if(recestatus == 'Claimed' && depositstatus == 'Deposited'){			
				return 'CLM/DPSTD';
			}else if(recestatus == 'Claimed' && depositstatus == 'Notdeposit'){
				return 'CLM/NOT DPSTD';
			}else if(recestatus == 'Claimed' && depositstatus == 'Accepted'){
				return 'CLM/ACCPT';
			}
		if(recestatus == 'Approved' && depositstatus == 'Deposited'){
				return 'APPR/DPSTD';
			}else if(recestatus == 'Approved' && depositstatus == 'Notdeposit'){
				return 'APPR/NOT DPSTD';
			}else if(recestatus == 'Approved' && depositstatus == 'Accepted'){
				return 'APPR/ACCPT';
			}
		if(recestatus == 'Refunded' && depositstatus == 'Deposited'){
				return 'REFD/DPSTD';
			}else if(recestatus == 'Refunded' && depositstatus == 'Notdeposit'){
				return 'REFD/NOT DPSTD';
			}else if(recestatus == 'Refunded' && depositstatus == 'Accepted'){
				return 'REFD/ACCPT';
			}
		if(recestatus == 'Rejected' && depositstatus == 'Deposited'){
				return 'REJ/DPSTD';
			}else if(recestatus == 'Rejected' && depositstatus == 'Notdeposit'){
				return 'REJ/NOT DPSTD';
			}else if(recestatus == 'Rejected' && depositstatus == 'Accepted'){
				return 'REJ/ACCPT';
			}
	
	}

function actionFormatter(cellvalue, options, rowObject )
	{
		var recestatus = $(rowObject).children()[4].firstChild.data;
		var receid = "'"+$(rowObject).children()[0].firstChild.data+"'";
		var amountbyreceipt = $(rowObject).children()[7].firstChild.data;
		console.log(recestatus);
		console.log(a);
		if(a == '[rcptno,!=,'){
			return '';
		}
		if(recestatus == 'Open'){
			console.log(receid);
				return ' <a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}
		if(recestatus == 'Generated'){
			console.log(receid);
				return ' <a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}
		if(recestatus == 'Claimed'){
				return ' <a style="color:blue;" href="#" onclick="showreceiptdata('+receid+')" >View</a>'
			}
		if(recestatus == 'Approved'){
				return '<a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}	
		if(recestatus == 'Rejected'){
				return '<a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}
		if(recestatus == 'Refunded'){
				return '<a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}	
		if(recestatus == 'Refund'){
				return '<a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}
		if(recestatus == 'invoice'){
				return '<a style="color:blue;" href="#" onclick="showreceiptdataopen('+receid+')" >View</a>';
			}
	}
	
	
function showreceiptdataopen(receiptid)
	{ 
				document.getElementById("btnapprove").style.visibility = "hidden";
			$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
							if(data.userId == null || data.mobilenumber == null || data.fname == null){									
									document.getElementById("btnapprove").style.visibility = "hidden";
							}
							console.log(data);
							document.getElementById('ConsumerName').value = data.fname;
							document.getElementById('lastname').value = data.lname;
							document.getElementById('Mobileno').value = data.mobilenumber;
						 	document.getElementById('IOHid').value = data.userId;
							document.getElementById('Emailid').value = data.emailid;
							document.getElementById('useradd').value = data.alladd;								
							document.getElementById('ReceiptNo').value = data.rcptno;
							document.getElementById('Receiptdate').value = data.rcptdate;
							document.getElementById('fsename').value = data.fsename;
							document.getElementById('Description').value = data.description;
						 	document.getElementById('Amount').value = data.amount;
							document.getElementById('Reasonfor').value = data.reasonforreject;
							document.getElementById('dateofreject').value = data.dateforreject;
							document.getElementById('statdefi').value = data.sta;
							document.getElementById('Receiptdepstat1').value = data.depositsta;
							if(document.getElementById('statdefi').value == 'Approved'){
									//document.getElementById("btnrefund").style.visibility = "visible";
									document.getElementById("btnreject").style.visibility = "hidden";
									document.getElementById("btnapprove").style.visibility = "hidden";	
									document.getElementById("btnrefundapprove").style.visibility = "hidden";									
							}else if(document.getElementById('statdefi').value == 'Claimed'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "visible";
									document.getElementById("btnapprove").style.visibility = "visible";
									document.getElementById("btnrefundapprove").style.visibility = "hidden";
							}else if(document.getElementById('statdefi').value == 'Open'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "visible";
									document.getElementById("btnapprove").style.visibility = "visible";
									document.getElementById("btnrefundapprove").style.visibility = "hidden";
							}else if(document.getElementById('statdefi').value == 'Rejected'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "hidden";
									document.getElementById("btnapprove").style.visibility = "hidden";
									document.getElementById("btnrefundapprove").style.visibility = "hidden";
							}else if(document.getElementById('statdefi').value == 'Refunded'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "hidden";
									document.getElementById("btnapprove").style.visibility = "hidden";
									document.getElementById("btnrefundapprove").style.visibility = "hidden";
							}else if(document.getElementById('statdefi').value == 'refund'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "hidden";
									document.getElementById("btnapprove").style.visibility = "hidden";
									document.getElementById("btnrefundapprove").style.visibility = "visible";
							}else if(document.getElementById('statdefi').value == 'Generated'){
									document.getElementById("btnrefund").style.visibility = "hidden";
									document.getElementById("btnreject").style.visibility = "hidden";
									document.getElementById("btnapprove").style.visibility = "hidden";
									document.getElementById("btnrefundapprove").style.visibility = "hidden";
							}
								
								if(data.chequeId != null){ 									
									document.getElementById('mySelect').value = 'Cheque/DD';									
									document.getElementById('chequedate').value = data.chequedate;
									document.getElementById('chequeddNo').value = data.chequeId;
									document.getElementById('BankName').value = data.bank;
									document.getElementById('branch').value = data.bankbranch;
									$("#chequetable").show();
									$("#chequetable1").show();
									$("#cashtable").show();
									$("#cashtable2").show();
								}else{
									document.getElementById('mySelect').value = 'Cash';
									$("#cashtable").show();
									$("#cashtable2").show();	
									$("#chequetable").hide();
									$("#chequetable1").hide();
								}
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});			
					
		$("#dialog-message2").dialog({
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 820,
		dialogClass: 'ui-dialog-osx',
		});		
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
	function showreceiptdata(receiptid)
	{ 
				document.getElementById("btnrefund").style.visibility = "hidden";
				$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
							console.log(data);	
							if(data.userId == null || data.fname == null || data.lname == null){
									document.getElementById("btnapprove").style.visibility = "hidden";
							}else{
								document.getElementById("btnapprove").style.visibility = "visible";
							}
							document.getElementById('ConsumerName').value = data.fname;
							document.getElementById('lastname').value = data.lname;
							document.getElementById('Mobileno').value = data.mobilenumber;
						 	document.getElementById('IOHid').value = data.userId;
							document.getElementById('Emailid').value = data.emailid;
							document.getElementById('useradd').value = data.alladd;								
							document.getElementById('ReceiptNo').value = data.rcptno;
							document.getElementById('Receiptdate').value = data.rcptdate;
							document.getElementById('Description').value = data.description;
						 	document.getElementById('Amount').value = data.amount;
							document.getElementById('fsename').value = data.fsename;
							document.getElementById('Receiptdepstat1').value = data.depositsta;
								if(data.chequeId != null){ 									
									document.getElementById('mySelect').value = 'Cheque/DD';									
									document.getElementById('chequedate').value = data.chequedate;
									document.getElementById('chequeddNo').value = data.chequeId;
									document.getElementById('BankName').value = data.bank;
									document.getElementById('branch').value = data.bankbranch;
									$("#chequetable").show();
									$("#chequetable1").show();
									$("#cashtable").show();
									$("#cashtable2").show();
								}else{
									document.getElementById('mySelect').value = 'Cash';
									$("#cashtable").show();
									$("#cashtable2").show();	
									$("#chequetable").hide();
									$("#chequetable1").hide();
								}
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});			
					
		$("#dialog-message2").dialog({
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 820,
		dialogClass: 'ui-dialog-osx',
		});		
	}
	
	function cancelreceipt(receid){
		console.log(receid);
			$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/cancelreceipt?receid="+receid,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
	
	function cancelclaimreceipt(){
		var receid = document.getElementById('ReceiptNo').value;
		var reasontext = document.getElementById('textreason').value;
		console.log(receid);
		console.log(reasontext);
			$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/cancelreceipt?receid="+receid+"&reasontext="+reasontext,
					success: function(data ) {	
						location.reload();
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
	function refundreceipt(){
		var receid = document.getElementById('ReceiptNo').value;
		var amountbyreceipt = document.getElementById('Amount').value;
				$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/refundreceipt?receid="+receid+"&amountbyreceipt="+amountbyreceipt,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
	function refundapprove(){
		var receid = document.getElementById('ReceiptNo').value;
		var amountbyreceipt = document.getElementById('Amount').value;
				$.ajax({
					cache: false ,
					url: "/ayushman/crechargebyreceipt/refundreceipt?receid="+receid+"&amountbyreceipt="+amountbyreceipt,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
	function approvedreceipt(){ 
				var receid = document.getElementById('ReceiptNo').value;
				var amountbyreceipt = document.getElementById('Amount').value;
				console.log(receid);
				console.log(amountbyreceipt);
				$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/approvedreceipt?receid="+receid+"&amountbyreceipt="+amountbyreceipt,
					success: function(data ) {
						location.reload();	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
function searchbydate(){
			var stat1 =	document.getElementById('statdefine').value;
			var stat2 = document.getElementById('statdefine').value;
			if(stat2 == 'Generated'){					
				$('#receiptform').attr("action", "searchgenerat"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'Open'){					
				$('#receiptform').attr("action", "searchopen"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'Claimed'){			
				$('#receiptform').attr("action", "searchclaim"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'Approved'){			
				$('#receiptform').attr("action", "searchapproved"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'Rejected'){			
				$('#receiptform').attr("action", "searchcancel"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'Refunded'){			
				$('#receiptform').attr("action", "searchrefund"); 
				$('#receiptform').submit();
			}
			if(stat2 == 'all'){			
				$('#receiptform').attr("action", "searchall"); 
				$('#receiptform').submit();
			}
	}

function searchbydateopen(){	
			$('#receiptform').attr("action", "searchopen"); 
			$('#receiptform').submit();
	}
function searchbydategwnerate(){	
			$('#receiptform').attr("action", "searchgenerat"); 
			$('#receiptform').submit();
	}
function searchbydateclaim(){	
			$('#receiptform').attr("action", "searchclaim"); 
			$('#receiptform').submit();
	}
function searchbydateapproved(){	
			$('#receiptform').attr("action", "searchapproved"); 
			$('#receiptform').submit();
	}
function searchbydatecancel(){	
			$('#receiptform').attr("action", "searchcancel"); 
			$('#receiptform').submit();
	}
function searchbydaterefund(){	
			$('#receiptform').attr("action", "searchrefund"); 
			$('#receiptform').submit();
	}
function searchbydateall(){	
			$('#receiptform').attr("action", "searchall"); 
			$('#receiptform').submit();
	}
function receiptdetails(){
		window.location.href="/ayushman/ccashreceipt/viewnewreceipt";		
	}
</script>
	<div id="body_contantpatientpage" style="width:100%; "> 
		<input type="hidden" id="statdefi" value="" /> 
        <input type="hidden" id="statdefine" value="<?php echo $searchstat; ?>" />  
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp; Receipts</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		<td width="1%">&nbsp;</td>
		<table width="100%" >	
		<tr>
			<td>
				<input id="allbtn" type="button" class="button" onclick="searchbydateall();" style="width:110px" value="All"/>
				<input id="openbtn" type="button" class="button" onclick="searchbydateopen();" style="width:110px" value="Open"/>
				<input id="claimbtn" type="button" class="button" onclick="searchbydateclaim();" style="width:110px" value="Claimed"/>
				<input id="approvebtn" type="button" class="button" onclick="searchbydateapproved();" style="width:110px" value="Approved"/>
				<input id="rejectbtn" type="button" class="button" onclick="searchbydatecancel();" style="width:110px" value="Rejected"/>
			<!--	<input id="refundbtn" type="button" class="button" onclick="searchbydaterefund();" style="width:110px" value="Refund"/>-->
			</td>	
		</tr>		
	</table>
	
	<form id="receiptform" method="POST" enctype="multipart/form-data" action="search">
			<table style="width: 100%;">	
				<tr class="Bodytext_bold" >
					<td height="20" style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;"> <b>Search Options: </b></td>
					<td><span class="bodytext_normal">Receipt no</span> &nbsp; <input name="receino" title="Enter Receipt number" id="receino" value="<?php if ($previousvalues != null)if (isset($previousvalues['receino']))echo $previousvalues['receino'];?>" placeholder="Receipt no" type="text" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">Name</span> &nbsp; <input name="payername" title="Enter Consumer name" id="payername" value="<?php if ($previousvalues != null)if (isset($previousvalues['payername']))echo $previousvalues['payername'];?>" placeholder="Payer name" type="text" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">Generated by</span> &nbsp; <input name="facname" title="Enter Generated by name" id="facname" value="<?php if ($previousvalues != null)if (isset($previousvalues['facname']))echo $previousvalues['facname'];?>" placeholder="FSE name" type="text" class="textarea" size="17"/></td>
					<td id="a" align="right">
						<input type="button" style="width: 100%;"  id="exportall" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>
					<td id="b" align="right">
						<input type="button" style="width: 100%;"  id="exportopen" class="button" style="visibility:hidden;" value="Export to Excel">
					</td>
					<td id="c" align="right">
						<input type="button" style="width: 100%;"  id="exportclaim" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>
					<td id="d" align="right">		
						<input type="button" style="width: 100%;"  id="exportapprove" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>
					<td id="e" align="right">		
						<input type="button" style="width: 100%;"  id="exportreject" class="button" style="visibility:hidden;" value="Export to Excel"/>
					</td>
					<!--<td id="f" align="right">			
						<input type="button" style="width: 100%;"  id="exportrefund" class="button" style="visibility:hidden;" value="Export to Excel"/>						
					</td>-->
					<td id="g" align="right">			
						<input type="button" style="width: 100%;"  id="exportgenerat" class="button" style="visibility:hidden;" value="Export to Excel"/>				
					</td>
					<input type="hidden" type="hidden" id="exportto" name="exportto" value="" />
				</tr>
				<tr>
					<td></td>
					<td><span class="bodytext_normal">From</span> &nbsp; <input name="from" title="Enter From date" id="from" placeholder="From date" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
					<td><span class="bodytext_normal">To &nbsp; <input name="to" id="to" title="Enter To date" type="text" placeholder="To date"  value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
					<td align="left"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydate();"/></td>
					<td align="right">
						<input id="GenRecebtn" style="width: 100%;" type="button" class="button" onclick="receiptdetails();" value="Generate Receipts"/>
					</td>
				</tr>				
			</table>
			<table>						
				<tr>
				<td style="width:100%;" >
					<div id="doctorappointmentsgrid" >
						<div id="admingrid" align=center >
					
							<?php				
							$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
							$adminjqgridrequest->post('name','ayushreceipts'); // name of gqgrid without space
							$adminjqgridrequest->post('height','320');
							$adminjqgridrequest->post('width','830');
							$adminjqgridrequest->post('sortname','sortdate');
							$adminjqgridrequest->post('sortorder','desc');
							$adminjqgridrequest->post('tablename','allreceipt');//used for jqgrid
							$adminjqgridrequest->post('columnnames','rcptno,rcptdate,description,payername,status,depositstatus,modeofpayment,amount,csrname,rcptno');//used for jqgrid
							$adminjqgridrequest->post('whereclause',$whereclause);
							$columninfo ='[{"name":"Receipt No", "index":"rcptno","width":80, "hidden":false,"align":"center"},
											{"name":"Date", "index":"rcptdate","width":70, "align":"left"},
											{"name":"Description","index":"description","width":100,"align":"left","hidden":false},
											{"name":"Consumer name","index":"payername","width":120,"align":"left"},
											{"name":"Status","index":"status","width":50,"align":"left","hidden":true},
											{"name":"Status","index":"depositstatus","width":90,"formatter":actionFormatterforstatus,"align":"left"},
											{"name":"Pay. Mode","index":"modeofpayment","width":70,"align":"left"},
											{"name":"Amount (&#x20B9;)","index":"amount","width":75,"align":"right"},
											{"name":"Generated by","index":"csrname","width":80,"align":"left"},
											{"name":"Action","index":"rcptno","width":90,"align":"left","formatter":actionFormatter,"align":"left"},]';						
										
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
			</tr>
		</table>
	</form>	
	<div id="dialog-message2" title="Receipt details" style="display: none;" >
		<form id="generatereceiptform">
			<table width="100%" >
				<tr>
					<td class="bodytext_bold">Consumer Name:</td>
					<td class="bodytext_bold"> <input readonly name="firstname" id="ConsumerName" class="textarea" placeholder="First name" type="text"/> <input readonly name="lastname" id="lastname" class="textarea" placeholder="Last name" type="text"/> </td>
					<td class="bodytext_bold">Mobile No.:</td>
					<td colspan="2" readonly class="bodytext_bold"><input readonly name="Mobileno" id="Mobileno" class="textarea" type="number"/></td>
				</tr>
				<tr>
					<td class="bodytext_bold">Email id :</td>
					<td class="bodytext_bold"><input readonly name="Emailid" id="Emailid" style="width: 70%;" class="textarea" type="text"/></td>
					<td class="bodytext_bold">IOH id:</td>
					<td class="bodytext_bold"><input readonly name="IOHid" id="IOHid" class="textarea" type="number"/></td>
				</tr>
			</table>	
			<hr/>

			<fieldset style="background-color: rgb(236, 248, 251);">
				<fieldset>
					<legend  class="bodytext_bold">Address:</legend>
					
								<div class="bodytext_bold" >
									<input class="textarea" readonly type="text" id="useradd" style="width: 500px;background-color: rgb(236, 248, 251);"/>
								</div>
					</fieldset>	
					<fieldset>
					<legend class="bodytext_bold">Receipt Details:</legend>
						<table width="100%">
							<tr>
								<td class="bodytext_bold">Mode of payment </td>
								<td class="bodytext_bold">:</td>
								<td><select readonly name="mySelect" id="mySelect" style="background-color: rgb(236, 248, 251);">
										<option value="Select">Select Mode of payment</option>
										<option value="Cash">Cash</option>
										<option value="Cheque/DD">Cheque/DD</option>
									</select>
								</td>
								<td></td>
									<td class="bodytext_bold">Generated By </td>
									<td class="bodytext_bold">:</td>
									<td ><input readonly name="fsename" id="fsename" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>								
							</tr>	
								<tr id="cashtable">
									<td class="bodytext_bold">Receipt No.</td>
									<td class="bodytext_bold">:</td>
									<td><input readonly name="ReceiptNo"  id="ReceiptNo" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Receipt date </td>
									<td class="bodytext_bold">:</td>
									<td ><input readonly name="Receiptdate" id="Receiptdate" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>
								<tr id="cashtable2">
									<td class="bodytext_bold">Description 	</td>
									<td class="bodytext_bold">:</td>
									<td><input readonly name="Description" id="Description" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Amount </td>
									<td class="bodytext_bold">:</td>
									<td><input readonly name="Amount" id="Amount" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								</tr>	
							<tr id="chequetable">
								<td class="bodytext_bold">Cheque/DD No</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="chequeddNo" id="chequeddNo" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Bank Name</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="BankName" id="BankName" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr  id="chequetable1">
								<td class="bodytext_bold">Branch</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="branch" id="branch" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Cheque date</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="chequedate" id="chequedate" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Receipt deposit status </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Receiptdepstat1" id="Receiptdepstat1" class="textarea" style="background-color: rgb(236, 248, 251);" type="text"/></td>
							
							</tr>	
							<tr id="Reason">
								<td class="bodytext_bold">Reason for Rejection</td>
								<td>:</td>
								<td><input type="text" class="textarea" name="" id="Reasonfor" style="background-color: rgb(236, 248, 251);" value=""/></td>
								<td class="bodytext_bold">Date of Rejection</td>
								<td>:</td>
								<td><input type="text" class="textarea" name="dateofreject" id="dateofreject" style="background-color: rgb(236, 248, 251);" value=""/></td>
							</tr>
						</table>
					</fieldset>						
						<table width="100%">
						<tr width="100%">
							<td width="15%"><input type="button" id="btnapprove" class="button" onclick="approvedreceipt();" style="width:100px; visibility:visible"  value="Approve"/></td>
							<td width="15%"><input type="button" id="btnreject" class="button" onclick="rejectreason();" style="width:100px;"  value="Reject" /></td>
							<td width="25%"><input type="button" id="btnrefund" class="button" onclick="refundreceipt();" style="width:100px; visibility:visible"  value="Refund"/></td>
							<td width="25%"><input type="button" id="btnrefundapprove" class="button" onclick="refundapprove();" style="width:100px; visibility:visible"  value="Approve"/></td>
							
						</tr>
						</table>
					</fieldset>
				<div id="takereason" style="display:none;" title="Reject reason">
					<table border="1" height="130px" width="415 px">	
						<tr><td>
							<table >
								<tr>
									<td  class="bodytext_bold">Enter the Reason</td>
									<td>:</td>
									<td colspan="2"><textarea row="25" name="textreason" id="textreason" value="" style="margin: 0px; height: 47px; width: 196px;"></textarea></td>
									<td><button name="cancelreason" id="cancelreason" class="button bodytext_bold"style="width: 80px;" onclick="cancelclaimreceipt()">Ok</button></td>
								</tr>						
							</table>
						</td></tr>	
					</table>
				</div>
							
			</form>
	</div>			
</div>