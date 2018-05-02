<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
var flg = 0;
$(document).ready(function() {$(function() {
			$("#chequetable").hide();
			$("#chequetable1").hide();
			$("#enterotp").hide();
			$("#generateotp").hide(); 	
			$("#regenerateotp").hide();	
			$("#enterotp2").hide();
			$("#generateotp2").hide();
			$("#regenerateotp2").hide();
			document.getElementById("btnotp2").style.visibility = "hidden";
			document.getElementById("otp2").style.visibility = "hidden";			
		//	document.getElementById('refbtn').style.visibility = "hidden";
			document.getElementById("btnotp").style.visibility = "hidden";
			document.getElementById("otp").style.visibility = "hidden";
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
				
			$( "#chequedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
				
			$('#benificiary').autocomplete({source:"/ayushman/cautocompletedata/retrieve?query=select distinct(benificiery) as value, 1 as id from statements where benificiery",
					select: function(event, ui) {					
										},
					minLength: 2,
					disabled: false
				});
			if('<?php echo $searchstat; ?>' == 'Open'){
				document.getElementById("openbtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Claimed'){
				document.getElementById("claimbtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Rejected'){
				document.getElementById("rejectedbtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Approved'){
				document.getElementById("approvebtn").style.background = "orange";
			}else if('<?php echo $searchstat; ?>' == 'Refunded'){
				//document.getElementById("refundbtn").style.background = "orange";
			}		
	});	
	$("#rcptno")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydateopen();
			}
		  }
		)
	$("#from")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydateopen();
			}
		  }
		)
	$("#to")
		.bind("keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.ENTER ) {
				searchbydateopen();
			}
		  }
		)	
	});
function urlformatter( cellvalue, options, rowObject ){

	return '<a href="'+cellvalue+'" >'+cellvalue+'</a>';
}
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
		var iohid = $(rowObject).children()[7].firstChild.data;
		var depositstatus = $(rowObject).children()[5].firstChild.data;
		var contype = "'"+$(rowObject).children()[9].firstChild.data+"'";
			if(recestatus == 'Open' && depositstatus == 'Deposited'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdataview2('+receid+','+contype+');">Edit</a>';
			}else if(recestatus == 'Open'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdata('+receid+','+contype+');">Edit</a>';
			}			
		if(recestatus == 'Claimed'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdataview('+receid+');">View</a>';				
			}
		if(recestatus == 'Rejected'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdataview('+receid+');">View</a>';				
			}
		if(recestatus == 'Approved'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdataview('+receid+');">View</a>';				
			}
			if(recestatus == 'Refunded'){
				return '<a id="fancybox-manual-b" style="color:blue;" href="#" onclick="showreceiptdataview('+receid+');">View</a>';				
			}
	}
	
function receiptclaim(receid,iohid){
			$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/claimreceipt?receid="+receid+"&iohid="+iohid,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();
						showMessage('550','200','success',"Claim successfull.",'error','id');
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});
	}
function showreceiptdata(receiptid,contype)
	{ 
				console.log(contype);
				if(contype != 'Consumer'){
					$("#claimtable").hide();
				}else{
					$("#claimtable").show();
				}				
				console.log(receiptid);
				$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
							console.log(data);							         
							document.getElementById('ConsumerName').value = data.fname;
							document.getElementById('lastname').value = data.lname;
							document.getElementById('Mobileno').value = data.mobilenumber;
							document.getElementById('Receiptdepstat').value = data.depositsta;
						 	document.getElementById('IOHid').value = data.userId;
							document.getElementById('Emailid').value = data.emailid;
							document.getElementById('Addressline1').value = data.alladd;
							document.getElementById('ReceiptNo').value = data.rcptno;
							document.getElementById('Receiptdate').value = data.rcptdate;
							document.getElementById('Description').value = data.description;
						 	document.getElementById('Amount').value = data.amount;
								
								console.log(data.amount);
							//	inWords(data.amount);
								$('#receipno').text(data.rcptno);
								$('#receipamount').text(data.amount);
								$('#receipdate').text(data.rcptdate);
								$('#receipname').text(data.payname);
								$('#paymode').text(data.paymode);
								if(data.chequeId != null){ 
									$("#chequetable").show();
									$("#chequetable1").show();
									document.getElementById('mySelect').value = 'Cheque/DD';									
									document.getElementById('chequedate').value = data.chequedate;
									document.getElementById('chequeddNo').value = data.chequeId;
									document.getElementById('BankName').value = data.bank;
									document.getElementById('branch').value = data.bankbranch;
								}else{
									document.getElementById('mySelect').value = 'Cash';
									$("#chequetable").hide();
									$("#chequetable1").hide();
								}
							$("#dialog-message2").dialog({
								draggable: true,
								resizable: false,
								position: ['center', 'center'],
								show: 'blind',
								hide: 'blind',
								width: 820,
								});	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});							
	}
	function showreceiptdataview2(receiptid,contype){ 
			console.log(contype);
				if(contype != 'Consumer'){
					$("#claimtable2").hide();
				}	
				if('<?php echo $searchstat; ?>' == 'Approved'){
						//document.getElementById('refbtn').style.visibility = "visible";
				}
				$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
							console.log(data);							         
							document.getElementById('ConsumerName2').value = data.fname;
							document.getElementById('lastname2').value = data.lname;
							document.getElementById('Mobileno2').value = data.mobilenumber;
							document.getElementById('Receiptdepstat2').value = data.depositsta;
						 	document.getElementById('IOHid2').value = data.userId;
							document.getElementById('Addressline3').value = data.alladd;
							document.getElementById('ReceiptNo2').value = data.rcptno;
							document.getElementById('Receiptdate2').value = data.rcptdate;
							document.getElementById('Description2').value = data.description;
						 	document.getElementById('Amount2').value = data.amount;
								// For printing receipt 
								//inWords(data.amount);
								$('#receipno').text(data.rcptno);
								$('#receipamount').text(data.amount);
								$('#receipdate').text(data.rcptdate);
								$('#receipname').text(data.payname);
								$('#paymode').text(data.paymode);							
								if(data.chequeId != null){ 
									$("#chequetable122").show();
									$("#chequetable112").show();
									document.getElementById('mySelect2').value = 'Cheque/DD';									
									document.getElementById('chequedate2').value = data.chequedate;
									document.getElementById('chequeddNo2').value = data.chequeId;
									document.getElementById('BankName2').value = data.bank;
									document.getElementById('branch2').value = data.bankbranch;
								}else{
									document.getElementById('mySelect2').value = 'Cash';
									$("#chequetable122").hide();
									$("#chequetable112").hide();
								}
							$("#dialog-message4").dialog({
								draggable: true,
								resizable: false,
								position: ['center', 'center'],
								show: 'blind',
								hide: 'blind',
								width: 820,
							});	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});							
	}
function showreceiptdataview(receiptid)
	{ 
				if('<?php echo $searchstat; ?>' == 'Approved'){
						//document.getElementById('refbtn').style.visibility = "visible";
				}
				$.ajax({
					cache: false ,
					url: "/ayushman/caccountmanager/getreceiptchkdetails?receiptno="+receiptid,
					success: function(data ) {	
						var data =  JSON.parse(data);
							console.log(data);							         
							document.getElementById('ConsumerName1').value = data.fname;
							document.getElementById('lastname1').value = data.lname;
							document.getElementById('Mobileno1').value = data.mobilenumber;
							document.getElementById('Receiptdepstat1').value = data.depositsta;
						 	document.getElementById('IOHid1').value = data.userId;
							document.getElementById('Addressline2').value = data.alladd;
							document.getElementById('ReceiptNo1').value = data.rcptno;
							document.getElementById('Receiptdate1').value = data.rcptdate;
							document.getElementById('Description1').value = data.description;
						 	document.getElementById('Amount1').value = data.amount;
								// For printing receipt 
								//inWords(data.amount);
								$('#receipno').text(data.rcptno);
								$('#receipamount').text(data.amount);
								$('#receipdate').text(data.rcptdate);
								$('#receipname').text(data.payname);
								$('#paymode').text(data.paymode);							
								if(data.chequeId != null){ 
									$("#chequetable12").show();
									$("#chequetable11").show();
									document.getElementById('mySelect1').value = 'Cheque/DD';									
									document.getElementById('chequedate1').value = data.chequedate;
									document.getElementById('chequeddNo1').value = data.chequeId;
									document.getElementById('BankName1').value = data.bank;
									document.getElementById('branch1').value = data.bankbranch;
								}else{
									document.getElementById('mySelect1').value = 'Cash';
									$("#chequetable12").hide();
									$("#chequetable11").hide();
								}
							$("#dialog-message3").dialog({
								draggable: true,
								resizable: false,
								position: ['center', 'center'],
								show: 'blind',
								hide: 'blind',
								width: 820,
							});	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
				});							
	}
	 function inWords(num) {
		 console.log(num);
	//alert(num);
    	var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
		var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

    	if ((num = num.toString()).length > 9) return 'overflow';
	    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    	if (!n) return; var str = '';

	    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
    	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
 	   str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
 	   str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
 	   str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Only ' : '';
 	    str += (n[5] == 0) && ((n[1] != 0)||(n[2] != 0)||(n[3] != 0)||(n[4] != 0)) ? 'Only' : '';
 	    //return str;
		console.log(str);
		$('#receipamount').text(str);
 	   document.getElementById("receipamount").value=str;
 	  // alert(document.getElementById("totalamt").value);
	}
function searchbydateopen(){
	var stat = document.getElementById('statdefine').value;

		if(stat == 'Open'){	
				$('#openreceiptform').attr("action", "searchopen"); 
				$('#openreceiptform').submit();
		}else if(stat == 'Rejected'){	
				$('#openreceiptform').attr("action", "searchrejected"); 
				$('#openreceiptform').submit();
		}else if(stat == 'Approved'){	
				$('#openreceiptform').attr("action", "searchapproved"); 
				$('#openreceiptform').submit();
		}else if(stat == 'Claimed'){
				$('#openreceiptform').attr("action", "searchclaim"); 
				$('#openreceiptform').submit();
		}else if(stat == 'Refunded'){
				$('#openreceiptform').attr("action", "searchrefund"); 
				$('#openreceiptform').submit();
		}
	}
		function updatereceiptdataclaim()
		{ 
			var iohid = document.getElementById('IOHid2').value;
								$.ajax	({
									url: "/ayushman/crechargebyreceipt/getotpdetailsbycre?iohid="+iohid,
									success: function(data ) {
											var data =  JSON.parse(data);
											console.log(data);
											if(document.getElementById('otp2').value == data.otp){
												console.log("otp correct");
														$.ajax({
															type:"GET",
															url: "/ayushman/caccountmanager/claimreceiptcre",
															data: $("#generatereceiptform1").serialize(),
															success: function(data ) {	
																var data =  JSON.parse(data);
																showNotification('300','20','success','Claim successfull.','notification','diaconfirmation',5000);
															},

														error : function(){showMessage('550','200','fail',"Claim not successfull.",'error','id');}
													});
												
											}else{
												showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
											}						
									},
									error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
								});
		}

		function updatereceiptdata(){
				var claimid = document.getElementById('claimid').checked;	
				console.log(claimid);		
				if(claimid == true){		
				if(document.getElementById('otp').value == ''){
							showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
				}else if(document.getElementById('ConsumerName').value == ''){
						showNotification('300','20','no data','Please enter the Consumer Name.','notification','diaconfirmation',5000);
				}else if(document.getElementById('lastname').value == ''){
						showNotification('300','20','no data','Please enter the Last name.','notification','diaconfirmation',5000);
				}else if(document.getElementById('Mobileno').value == ''){
						showNotification('300','20','no data','Please enter the Mobile no.','notification','diaconfirmation',5000);
				}else if(document.getElementById('mySelect').value == 'Cash'){
						console.log("cash");
							if(document.getElementById('ReceiptNo').value == ''){
								showNotification('300','20','no data','Please enter the Receipt No.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Receiptdate').value == ''){
								showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Description').value == ''){
								showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Amount').value == ''){
								showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
							}else{		
								$.ajax({
									type:"GET",
									url: "/ayushman/crechargebyreceipt/updatereceiptdata",
									data: $("#generatereceiptform").serialize(),
									success: function(data ) {	
										var data =  JSON.parse(data);
										//generatereceiptform.reset();
										showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
										location.reload();
									},

									error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
								});
								var iohid = document.getElementById('IOHid').value;			
								$.ajax	({
									url: "/ayushman/crechargebyreceipt/getotpdetailsbycre?iohid="+iohid,
									success: function(data ) {
											var data =  JSON.parse(data);
											if(document.getElementById('otp').value == data.otp){											
												var ReceiptNo2 = document.getElementById('ReceiptNo').value;
												var IOHid2 = document.getElementById('IOHid').value;												
														$.ajax({
															type:"GET",
															url: "/ayushman/caccountmanager/claimreceiptcre?ReceiptNo2="+ReceiptNo2+"&IOHid2="+IOHid2,
															success: function(data ) {	
																var data =  JSON.parse(data);
																showNotification('300','20','success','Claim successfull.','notification','diaconfirmation',5000);
															},

														error : function(){showMessage('550','200','fail',"Claim not successfull.",'error','id');}
													});
												
											}else{
												showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
											}						
									},
									error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
							});
							}
							
				}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
							if(document.getElementById('ReceiptNo').value == ''){
								showNotification('300','20','no data','Please enter the Receipt No.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Receiptdate').value == ''){
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
								showNotification('300','20','no data','Please enter the Cheque/DD date.','notification','diaconfirmation',5000);
							}else{		
								$.ajax({
									type:"GET",
									url: "/ayushman/crechargebyreceipt/updatereceiptdata",
									data: $("#generatereceiptform").serialize(),
									success: function(data ) {	
											var data =  JSON.parse(data);
											//generatereceiptform.reset();
											showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
											location.reload();
									},

									error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
								});
								var iohid = document.getElementById('IOHid').value;			
								$.ajax	({
									url: "/ayushman/crechargebyreceipt/getotpdetailsbycre?iohid="+iohid,
									success: function(data ) {
											var data =  JSON.parse(data);
											if(document.getElementById('otp').value == data.otp){
												var ReceiptNo2 = document.getElementById('ReceiptNo').value;
												var IOHid2 = document.getElementById('IOHid').value;												
														$.ajax({
															type:"GET",
															url: "/ayushman/caccountmanager/claimreceiptcre?ReceiptNo2="+ReceiptNo2+"&IOHid2="+IOHid2,
															success: function(data ) {
																var data =  JSON.parse(data);
																showNotification('300','20','success','Claim successfull.','notification','diaconfirmation',5000);
															},

														error : function(){showMessage('550','200','fail',"Claim not successfull.",'error','id');}
													});
												
											}else{
												showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
											}						
									},
									error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
							});
							}
				}
				
				
			}else{
				if(document.getElementById('ConsumerName').value == ''){
						showNotification('300','20','no data','Please enter the Consumer Name.','notification','diaconfirmation',5000);
				}else if(document.getElementById('lastname').value == ''){
						showNotification('300','20','no data','Please enter the Last name.','notification','diaconfirmation',5000);
				}else if(document.getElementById('Mobileno').value == ''){
						showNotification('300','20','no data','Please enter the Mobile no.','notification','diaconfirmation',5000);
				}else if(document.getElementById('mySelect').value == 'Cash'){
						console.log("cash");
							if(document.getElementById('ReceiptNo').value == ''){
								showNotification('300','20','no data','Please enter the Receipt No.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Receiptdate').value == ''){
								showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Description').value == ''){
								showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Amount').value == ''){
								showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
							}else{		
								$.ajax({
									type:"GET",
									url: "/ayushman/crechargebyreceipt/updatereceiptdata",
									data: $("#generatereceiptform").serialize(),
									success: function(data ) {	
										var data =  JSON.parse(data);
										//generatereceiptform.reset();
										showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
										location.reload();
									},

									error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
								});
							}
							
				}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
							if(document.getElementById('ReceiptNo').value == ''){
								showNotification('300','20','no data','Please enter the Receipt No.','notification','diaconfirmation',5000);
							}else if(document.getElementById('Receiptdate').value == ''){
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
								showNotification('300','20','no data','Please enter the Cheque/DD date.','notification','diaconfirmation',5000);
							}else{		
								$.ajax({
									type:"GET",
									url: "/ayushman/crechargebyreceipt/updatereceiptdata",
									data: $("#generatereceiptform").serialize(),
									success: function(data ) {	
											var data =  JSON.parse(data);
											//generatereceiptform.reset();
											showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
											location.reload();
									},

									error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
								});
							}
				}
			}
	}
	function generateotp2(){			
		var IOHid = document.getElementById("IOHid2").value;
		console.log(IOHid);
				$.ajax({
						type:"GET",
						url: "/ayushman/crechargebyreceipt/otpgeneratebycre?IOHid="+IOHid,
						success: function(data ) {
								showNotification('300','20','OTP generated','</h5>OTP generated, please ask Consumer for otp.</h5>','notification','timernotification',3000);
								document.getElementById("btnotp2").style.visibility = "hidden";
								document.getElementById("otp2").style.visibility = "visible";
								$("#regenerateotp2").show();
						},
				});				
			}
	function generateotp(){			
		var IOHid = document.getElementById("IOHid").value;
		console.log(IOHid);
				$.ajax({
						type:"GET",
						url: "/ayushman/crechargebyreceipt/otpgeneratebycre?IOHid="+IOHid,
						success: function(data ) {
								showNotification('300','20','OTP generated','</h5>OTP generated, please ask Consumer for otp.</h5>','notification','timernotification',3000);
								document.getElementById("btnotp").style.visibility = "hidden";
								document.getElementById("otp").style.visibility = "visible";
								$("#regenerateotp").show();
						},
				});				
			}
	function otpfun2(){
		var claimid = document.getElementById('claimid2').checked;
		
		if(claimid == true){
			document.getElementById("btnotp2").style.visibility = "visible";
			document.getElementById("otp2").style.visibility = "visible";
			$("#enterotp2").show();
			$("#generateotp2").show();
			$("#regenerateotp2").hide();
		}else{
			$("#enterotp2").hide();
			$("#generateotp2").hide();
			$("#regenerateotp2").hide();
		}		
	}
	function otpfun(){
		var claimid = document.getElementById('claimid').checked;
		
		if(claimid == true){
			document.getElementById("btnotp").style.visibility = "visible";
			document.getElementById("otp").style.visibility = "visible";
			$("#enterotp").show();
			$("#generateotp").show();
			$("#regenerateotp").hide();
		}else{
			$("#enterotp").hide();
			$("#generateotp").hide();
			$("#regenerateotp").hide();
		}		
	}
function modeofpayment(){
		var modeofpayment = document.getElementById("mySelect").value;
			console.log(modeofpayment);
		if( modeofpayment == 'Cheque/DD' )
		{ 
			console.log("Cheque");
			$("#chequetable").show(); 
			$("#chequetable1").show();
		}else if( modeofpayment == 'Cash' )
		{
			$("#chequetable").hide();
			$("#chequetable1").hide();
		}
	}
	function openreceipt(){
		$('#openreceiptform').attr("action", "searchopen"); 
		$('#openreceiptform').submit();
	}
	function claimreceipt(){
		$('#openreceiptform').attr("action", "searchclaim"); 
		$('#openreceiptform').submit();
	}
	function approvereceipt(){
		$('#openreceiptform').attr("action", "searchapproved"); 
		$('#openreceiptform').submit();
	}
	function rejectedreceipt(){
		$('#openreceiptform').attr("action", "searchrejected"); 
		$('#openreceiptform').submit();
	}
	function refundreceipt(){	
			$('#openreceiptform').attr("action", "searchrefund"); 
			$('#openreceiptform').submit();
	}
	
	function abc(){
		var a = document.getElementById("ectedbtn").value;
		console.log(a);
	}
	function PrintElem(elem){				
			
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
			location.href = "/ayushman/ccashreceiptexecutive/view";
		}
		function receiptdetails(){
			window.location.href="/ayushman/cnewreceipt/view";		
		}
	function refundrecpt(){	
		var refunres = document.getElementById('textreason').value;
		var receid = document.getElementById('ReceiptNo1').value;
		var amountbyreceipt = document.getElementById('Amount1').value;
		console.log(refunres);
				$.ajax({
					cache: false ,
					url: "/ayushman/ccashreceiptexecutive/refundreceipt?receid="+receid+"&amountbyreceipt="+amountbyreceipt+"&refundres="+refunres,
					success: function(data ) {	
						var data =  JSON.parse(data);
						location.reload();	
					},
					error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
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
</script>
	<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
       	    <input type="hidden" id="statdefine" value="<?php echo $searchstat; ?>" />  
        <td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong> &nbsp;  Receipts</strong>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
		</td>
		<td>&nbsp;</td>
	<table width="100%">	
		<tr>
			<td >
				<input type="button" id="openbtn" style="background:#1c75bc;width:120px" class="button" onclick="openreceipt();" value="Generated"/>
				<input type="button" id="claimbtn" style="background:#1c75bc;width:120px" class="button" onclick="claimreceipt();" value="Claimed"/>
				<input type="button" id="approvebtn" style="background:#1c75bc;width:120px" class="button" onclick="approvereceipt();" value="Approved"/>
				<!--<input type="button" id="refundbtn" style="background:#1c75bc;width:120px" class="button" onclick="refundreceipt();" value="Refund"/>-->
				<input type="button" id="rejectedbtn" style="background:#1c75bc;width:120px" class="button" onclick="rejectedreceipt();" value="Rejected"/>
			</td>
			<td align="right"><input type="button" id="" style="width:120px;" class="button" onclick="receiptdetails();" value="Create new receipt" /></td>
		</tr>		
	</table>		

<div id="opentable">		
	<form id="openreceiptform" method="post" enctype="multipart/form-data" action="searchopen">
		<table width="100%">	
				<tr class="Bodytext_bold" >
						<td height="20"style="font-family: tahoma, Helvetica, sans-serif; font-size: 12px;">
							<b>Search Options:</b>
						</td>
						<td>
							<span class="bodytext_normal">Type</span> &nbsp;
								<select name="userselect"  class="textarea" id="userselect" value="">
										<option value = 'select' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'select') ? 'selected' : '';
								?>   >Select</option>
										<option value='serviceprovider' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'serviceprovider') ? 'selected' : '';
								?>  >Service provider </option>
										<option value='Consumer' <?php
								if ($previousvalues != null)
									echo ($previousvalues['userselect'] == 'Consumer') ? 'selected' : '';
								?>  >Consumer</option>				
							</select>
							
						</td>
						<td>
							<span class="bodytext_normal">Name</span> &nbsp; <input name="Name" id="Name" title="Enter name" placeholder="Name" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['Name'])) echo $previousvalues['Name'];?>" class="textarea" size="17"/>
						</td>
						<td>
							<span class="bodytext_normal">Receipt no</span><input name="rcptno" id="rcptno" type="text" title="Enter receipt no" placeholder=" Receipt no" value="<?php if ($previousvalues != null)if (isset($previousvalues['rcptno'])) echo $previousvalues['rcptno'];?>" class="textarea" size="17"/>
						</td>
				</tr>
				<tr>
				<td></td>
				<td><span class="bodytext_normal">From</span><input placeholder="From date" name="from" title="Enter from date" id="from" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="textarea" size="17"/></td>
				<td><span class="bodytext_normal">To<input name="to" placeholder="To date" title="Enter to date"  id="to" type="text"  value="<?php if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="textarea" size="17"/></td>
				<td align="left"><input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="searchbydateopen();"/>
				</td>
				
				<input type="hidden" id="exportto" name="exportto" value="" />
			</tr>			
			</table>			
		<tr>
		<td style="width:98%;" >
    		<div id="doctorappointmentsgrid" >
				<div id="admingrid" >
					<?php		
						$adminjqgridrequest= Request::factory('xjqgridcomponent/index');
						$adminjqgridrequest->post('name','ayushreceipts'); // name of gqgrid without space
						$adminjqgridrequest->post('height','320');
						$adminjqgridrequest->post('width','830');
						$adminjqgridrequest->post('sortname','sortdate');
						$adminjqgridrequest->post('sortorder','desc');
						$adminjqgridrequest->post('tablename','allreceipt');//used for jqgrid
						$adminjqgridrequest->post('columnnames','rcptno,rcptdate,description,payername,status,depositstatus,modeofpayment,amount,payeruserid,type,rcptno');//used for jqgrid
						$adminjqgridrequest->post('whereclause',$whereclause);
						$columninfo ='[{"name":"Receipt No", "index":"rcptno","width":80, "hidden":false,"align":"center"},
										{"name":"Date", "index":"rcptdate","width":60, "align":"left"},
										{"name":"Description","index":"description","width":100,"align":"left","hidden":false},
										{"name":"Name","index":"payername","width":130,"align":"left"},
										{"name":"Status","index":"status","width":50,"align":"left","hidden":true},
										{"name":"Status","index":"depositstatus","width":120,"formatter":actionFormatterforstatus,"align":"left"},
										{"name":"Pay Mode","index":"modeofpayment","width":50,"align":"left"},
										{"name":"Amount (&#x20B9;)","index":"amount","width":65,"align":"right"},
										{"name":"IOHid","index":"payeruserid","width":50,"align":"left","hidden":true},		
										{"name":"contype","index":"type","width":50,"align":"left","hidden":true},
										{"name":"Action","index":"rcptno","width":80,"align":"left","formatter":actionFormatter,"align":"left"},]';
						
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
</div >
	<div id="dialog-message2" title="Receipt details" style="display: none;" >
		<form id="generatereceiptform">
			<table width="100%">
				<tr>
					<td class="bodytext_bold">Consumer Name:</td>
					<td class="bodytext_bold"> <input readonly name="firstname" id="ConsumerName" class="textarea" placeholder="First name" type="text"/> <input readonly name="lastname" id="lastname" class="textarea" placeholder="Last name" type="text"/> </td>
					<td class="bodytext_bold">Mobile No.:</td>
					<td colspan="2" class="bodytext_bold"><input readonly name="Mobileno" id="Mobileno" class="textarea" type="number"/></td>
				</tr><tr>
					<td class="bodytext_bold">Email id :</td>
					<td class="bodytext_bold"><input readonly name="Emailid" id="Emailid" class="textarea" type="text"/></td>
					<td class="bodytext_bold">IOH id :</td>
					<td class="bodytext_bold"><input readonly name="IOHid" id="IOHid" class="textarea" type="number"/></td>
				</tr>
			</table>
			<hr/>
				<fieldset style="background-color: rgb(236, 248, 251);">
					<fieldset>
					  <legend >Address:</legend>
						 <table width="100%">
							<tr>
								<td class="bodytext_bold"><input readonly style="width: 680px; background-color: rgb(236, 248, 251);"name="Addressline1" id="Addressline1"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>								
						</table>
					</fieldset>	
					<fieldset>
					<legend>Receipt details:</legend>
						<table  style="background-color: rgb(236, 248, 251);"  width="100%">
						<tr style="background-color: rgb(236, 248, 251);" >
								<td class="bodytext_bold">Mode of payment </td>
								<td class="bodytext_bold">:</td>
								<td>
									<select style="background-color: rgb(236, 248, 251);" onchange="modeofpayment();" name="mySelect" id="mySelect" value="">
										<option value="Select">Select Mode of payment</option>
										<option value="Cash">Cash</option>
										<option value="Cheque/DD">Cheque/DD</option>
									</select>
								</td>
								<td></td>
								<td class="bodytext_bold">Receipt deposit status </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Receiptdepstat" id="Receiptdepstat" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
						</tr>	
						<tr>
								<td class="bodytext_bold">Receipt No.</td>
								<td class="bodytext_bold">:</td>
								<td><input name="ReceiptNo" readonly id="ReceiptNo" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Receipt date </td>
								<td class="bodytext_bold">:</td>
								<td><input name="Receiptdate" id="Receiptdate" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
						</tr>
						<tr>
								<td class="bodytext_bold">Description 	</td>
								<td class="bodytext_bold">:</td>
								<td><input name="Description" id="Description" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Amount </td>
								<td class="bodytext_bold">:</td>
								<td><input name="Amount" id="Amount" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>	
							<tr id="chequetable">
								<td class="bodytext_bold">Cheque/DD No</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequeddNo" id="chequeddNo" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Bank Name</td>
								<td class="bodytext_bold">:</td>
								<td><input name="BankName" id="BankName" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr  id="chequetable1">
								<td class="bodytext_bold">Branch</td>
								<td class="bodytext_bold">:</td>
								<td><input name="branch" id="branch" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Cheque date</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequedate" id="chequedate" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>								
							</tr>							
						</table>
								</hr>							
							<table>
								<tr id="claimtable">
									<td align="right" class="bodytext_bold">Claim</td>
									<td>:</td>
									<td align="right" class="bodytext_bold"><input id="claimid" type="checkbox" onclick="otpfun();"/></td>								
									<td id="generateotp" ><input name="otp" id="otp" class="textarea" style="background-color: rgb(236, 248, 251);" type="text" placeholder="Enter otp"/></td>
									<td id="regenerateotp"  class="bodytext_bold"><input type="button" name="btnotp1" id="btnotp1" class="button" value="Resend otp" onclick="generateotp();"/></td>
									<td class="bodytext_bold"  id="enterotp"><input type="button" name="btnotp" id="btnotp"  class="button" value="Generate otp" onclick="generateotp();"/></td>
								</tr>
							</table>
					</fieldset>						
						<table width="100%">
							<tr width="100%">
								<td width="25%" align="right"></td>
								<td width="15%"></td>
								<td width="15%"></td>
								<td width="25%" align="right"><input type="button" class="button" value="Save" style="width:100px;" onclick="updatereceiptdata();"/> &nbsp; <input type="button" class="button" value="Print" style="width:100px;" onclick="PrintElem('#sendtoprint');" /></td>
							
							</tr>
						</table>
				</fieldset>
		</form>
	</div>		
		<div id="dialog-message4" title="Receipt details" style="display: none;" >
		<form id="generatereceiptform1" method="POST" enctype="multipart/form-data" >
			<table width="100%">
				<tr>
					<td class="bodytext_bold">Consumer Name:</td>
					<td class="bodytext_bold"> <input readonly name="firstname2" id="ConsumerName2" class="textarea" placeholder="First name" type="text"/> <input readonly name="lastname2" id="lastname2" class="textarea" placeholder="Last name" type="text"/> </td>
					<td class="bodytext_bold">Mobile No.:</td>
					<td colspan="2" class="bodytext_bold"><input readonly name="Mobileno2" id="Mobileno2" class="textarea" type="number"/></td>
				</tr><tr>
					<td class="bodytext_bold">Email id :</td>
					<td class="bodytext_bold"><input readonly name="Emailid2" id="Emailid2" class="textarea" type="text"/></td>
					<td class="bodytext_bold">IOH id :</td>
					<td class="bodytext_bold"><input readonly name="IOHid2" id="IOHid2" class="textarea" type="number"/></td>
				</tr>
			</table>
			<hr/>
				<fieldset style="background-color: rgb(236, 248, 251);">
					<fieldset>
					  <legend >Address:</legend>
						 <table width="100%">
							<tr>
								<td class="bodytext_bold"><input readonly style="width: 680px; background-color: rgb(236, 248, 251);"name="Addressline3" id="Addressline3"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>								
						</table>
					</fieldset>	
					<fieldset>
					<legend>Receipt details:</legend>
						<table  style="background-color: rgb(236, 248, 251);"  width="100%">
							<tr style="background-color: rgb(236, 248, 251);" >
								<td class="bodytext_bold">Mode of payment </td>
								<td class="bodytext_bold">:</td>
								<td>
									<select style="background-color: rgb(236, 248, 251);" onchange="modeofpayment();" name="mySelect2" id="mySelect2" value="">
										<option value="Select">Select Mode of payment</option>
										<option value="Cash">Cash</option>
										<option value="Cheque/DD">Cheque/DD</option>
									</select>
							</td>
							<td>
								</td>
								<td class="bodytext_bold">Receipt deposit status </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Receiptdepstat2" id="Receiptdepstat2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>	
							<tr>
								<td class="bodytext_bold">Receipt No.</td>
								<td class="bodytext_bold">:</td>
								<td><input name="ReceiptNo2" readonly id="ReceiptNo2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Receipt date </td>
								<td class="bodytext_bold">:</td>
								<td><input name="Receiptdate2" readonly id="Receiptdate2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr>
								<td class="bodytext_bold">Description 	</td>
								<td class="bodytext_bold">:</td>
								<td><input name="Description2" readonly id="Description2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Amount </td>
								<td class="bodytext_bold">:</td>
								<td><input name="Amount2" id="Amount2" readonly style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>	
							<tr id="chequetable122">
								<td class="bodytext_bold">Cheque/DD No</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequeddNo2" readonly id="chequeddNo2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Bank Name</td>
								<td class="bodytext_bold">:</td>
								<td><input name="BankName2" readonly id="BankName2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr  id="chequetable112">
								<td class="bodytext_bold">Branch</td>
								<td class="bodytext_bold">:</td>
								<td><input name="branch2" readonly id="branch2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Cheque date</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequedate2" readonly id="chequedate2" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>								
							</tr>							
						</table>
								</hr>							
							<table>
								<tr id="claimtable2">
									<td align="right" class="bodytext_bold">Claim</td>
									<td>:</td>
									<td align="right" class="bodytext_bold"><input id="claimid2" type="checkbox" onclick="otpfun2();"/></td>								
									<td id="generateotp2" ><input name="otp2" id="otp2" class="textarea" style="background-color: rgb(236, 248, 251);" type="text" placeholder="Enter otp"/></td>
									<td id="regenerateotp2"  class="bodytext_bold"><input type="button" name="btnotp12" id="btnotp12" class="button" value="Resend otp" onclick="generateotp2();"/></td>
									<td class="bodytext_bold"  id="enterotp2"><input type="button" name="btnotp2" id="btnotp2"  class="button" value="Generate otp" onclick="generateotp2();"/></td>
								
								</tr>
							</table>
					</fieldset>						
						<table width="100%">
							<tr width="100%">
								<td width="25%" align="right"></td>
								<td width="15%"></td>
								<td width="15%"></td>
								<td width="25%" align="right"><input type="button" class="button" value="Save" style="width:100px;" onclick="updatereceiptdataclaim();"/> &nbsp; <input type="button" class="button" value="Print" style="width:100px;" onclick="PrintElem('#sendtoprint');" /></td>
							
							</tr>
						</table>
				</fieldset>
		</form>
	</div>
	<div id="dialog-message3" title="Receipt details" style="display: none;" >
			<table width="100%">
				<tr>
					<td class="bodytext_bold">Name:</td>
					<td class="bodytext_bold"> <input readonly name="firstname1" id="ConsumerName1" class="textarea" placeholder="First name" type="text"/> <input name="lastname1" id="lastname1" class="textarea" placeholder="Last name" type="text"/> </td>
					<td class="bodytext_bold">Mobile No.:</td>
					<td colspan="2" class="bodytext_bold"><input readonly name="Mobileno1" id="Mobileno1" class="textarea" type="number"/></td>
				</tr><tr>
					<td class="bodytext_bold">Email id :</td>
					<td class="bodytext_bold"><input readonly name="Emailid1" id="Emailid1" class="textarea" type="text"/></td>
					<td class="bodytext_bold">IOH id :</td>
					<td class="bodytext_bold"><input readonly name="IOHid1" id="IOHid1" class="textarea" type="number"/></td>
				</tr>
			</table>
			<hr/>
				<fieldset style="background-color: rgb(236, 248, 251);">
					<fieldset>
					  <legend>Address:</legend>
						 <table width="100%">
							<tr>
								<td class="bodytext_bold"><input readonly style="width: 680px; background-color: rgb(236, 248, 251);"name="Addressline2" id="Addressline2"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>								
						</table>
					</fieldset>	
					<fieldset>
					<legend>Receipt details:</legend>
						<table width="100%">
							<tr>
								<td class="bodytext_bold">Mode of payment </td>
								<td class="bodytext_bold">:</td>
								<td>
									<select style="background-color: rgb(236, 248, 251);" onchange="modeofpayment();" name="mySelect1" id="mySelect1" value="">
										<option value="Select">Select Mode of payment</option>
										<option value="Cash">Cash</option>
										<option value="Cheque/DD">Cheque/DD</option>
									</select>
								</td>
								<td></td>
								<td class="bodytext_bold">Receipt deposit status </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Receiptdepstat1" id="Receiptdepstat1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>	
							<tr >
								<td class="bodytext_bold">Receipt No.</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="ReceiptNo1" id="ReceiptNo1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Receipt date </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Receiptdate1" id="Receiptdate1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr >
								<td class="bodytext_bold">Description 	</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Description1" id="Description1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Amount </td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="Amount1" id="Amount1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>	
							<tr id="chequetable12">
								<td class="bodytext_bold">Cheque/DD No</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="chequeddNo1" id="chequeddNo1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Bank Name</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="BankName1" id="BankName1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr  id="chequetable11">
								<td class="bodytext_bold">Branch</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="branch1" id="branch1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Cheque date</td>
								<td class="bodytext_bold">:</td>
								<td><input readonly name="chequedate1" id="chequedate1" style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>								
							</tr>
														
						</table>
					<div id="takereason" style="display:none;" title="Refund reason">
						<table border="1" height="130px" width="415 px">	
							<tr><td>
								<table >
									<tr>
										<td  class="bodytext_bold">Enter the Reason</td>
										<td>:</td>
										<td colspan="2"><textarea row="25" name="textreason" id="textreason" value="" style="margin: 0px; height: 47px; width: 196px;"></textarea></td>
										<td><button name="refundreason" id="refundreason" class="button bodytext_bold"style="width: 80px;" onclick="refundrecpt()">Ok</button></td>
									</tr>						
								</table>
							</td></tr>	
						</table>
					</div>
					</fieldset>		
						<table width="100%">
							<tr width="100%">
								<td width="25%" align="right"></td>
								<td width="15%" colspan="2"></td>
								<td width="15%"></td>
								<td width="25%" align="right"> <!-- <input type="button"  id="refbtn" class="button" value="Refund" style="width:100px;" onclick="rejectreason();" /> &nbsp; --> <input type="button" id="Print" class="button" value="Print" style="width:100px;" onclick="PrintElem('#sendtoprint');" /></td>
							</tr>
						</table>					
				</fieldset>
	</div>		
	<div id="print_box" style="display:none" title="Print Receipt">
				<div id="sendtoprint">
						<table style="width:100%;">
								<tr>
									<td rowspan="12  " style="width:10px;"></td>
									<td rowspan="2" style="width:10px;"><img id="pat_img"  src="/ayushman/assets/images/ayushman_logo.png" > </td>
									<td style="width:100px;"></td>
									<td colspan="6"></td>										
									<td align="right"  style="width:200px;">Receipt No:&nbsp;	<label id="receipno" name="receipno"></label></td>
								</tr>
								<tr>
									
									<td colspan="7" align="center"> </td>
									<td align="right" style="width:100px;">Receipt date:&nbsp;<label id="receipdate" name="receipdate"></td>
								</tr>
								<hr/>
								<tr>
										<td colspan="9"><hr/></td>
								</tr>
								<tr>
									<td colspan="9" class="bodytext_bold">	Received with thanks from &nbsp; <label id="receipname" name="receipname"></label>	&nbsp;	
									The sum of Rupees &nbsp; <label id="receipamount" name="receipamount"></label> &nbsp; by &nbsp;	<label id="paymode" name="paymode"></label></td>
								</tr>
								<tr style="height=100px;">
									<td  colspan="9"></td>								
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
								<hr/>
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
										<td> <input type="checkbox" id="mailsend" name="mailsend" checked /> Send details on mail</td>
										<td style="width:100px;" align="right"><input type="button" class="button" value="Print" onclick="PrintElem('#sendtoprint');" /></td>
										<td colspan="2" style="width:100px;" align="left"><input type="button" class="button" value="cancel" onclick="onpage();" /></td>
								</tr>
						</table>
			</div>
</div>