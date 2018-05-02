<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css"/>
<script type="text/javascript">

$(document).ready(function() {$(function() {
	
			$("#chequetable").hide();
			$("#chequetable1").hide();
			$("#openreceipt").show();
			$("#enterotp").hide();
			$("#regenerateotp").hide();
			$("#generateotp").hide();
			$("#onlinetable1").hide();
			
			$( "#fromdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			$( "#Receiptdate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				if($('#Receiptdate').val() == '')
				{					
					$( "#Receiptdate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
								
				}
		$( "#chequedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");			
	});
	});
$('#IOHid').live("keypress", function(e) {
        if (e.keyCode == 13) {
          //getreceipt();
		  getuserinfo();
        }
});
$('#ConsumerName').live("keypress", function(e) {
        if (e.keyCode == 13) {
          //getreceipt();
		  getuserinfo();
        }
});
$('#Mobileno').live("keypress", function(e) {
        if (e.keyCode == 13) {
          //getreceipt();
		  getuserinfo();
        }
});
$('#lastname').live("keypress", function(e) {
        if (e.keyCode == 13) {
          //getreceipt();
		  getuserinfo();
        }
});
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
				}else if( modeofpayment == 'online' )
				{
					$("#chequetable").hide();
					$("#chequetable1").hide();
					$("#onlinetable1").show();
				}
		}
	function getuserinfo()
	{ 
		var fname 	= document.getElementById('ConsumerName').value;
		var mobileno = document.getElementById('Mobileno').value;
		var IOHid = document.getElementById('IOHid').value;
		var mailid = document.getElementById('Emailid').value;
		$.ajax({
					url: "/ayushman/crechargebyreceipt/getreceiptdetailssp?firstname="+fname+"&mobilenum="+mobileno+"&mailid="+mailid+"&IOHid="+IOHid,
					success: function(data ) {	
						var data =  JSON.parse(data);	
						console.log(data);
									$("#searchresult").empty();									
									for(var i=0;i<data.count;i++){										
										var iohid = data.dataiohi[i];
										var name = data.datafname[i];
										var mobile = data.datamobilenumb[i];											
											
											var link = document.createElement("a");
											link.setAttribute("href","#");
											link.setAttribute("class","table table-bordered table-condensed bodytext_normal");
											link.setAttribute("onclick","getreceipt("+iohid+");");
											var linkText = document.createTextNode(iohid+" -  "+name+"----("+mobile+")");
											link.appendChild(linkText);
										
										var table = document.getElementById('searchresult');
										var rowCount = table.rows.length;
										var row = table.insertRow(rowCount);
										
										var cell1 = row.insertCell(0);
										
											cell1.appendChild(link);																			
									}											
							createview();							
						},
			});			
	}
	
function getreceipt(IOHid){ 
	$("#userview").dialog("close");
		//var fname = document.getElementById('ConsumerName').value;
		//lname = document.getElementById('lastname').value;
		//var mobileno = document.getElementById('Mobileno').value;
		//var mailid = document.getElementById('Emailid').value;
		//var IOHid = document.getElementById('IOHid').value;
		$.ajax({
					url: "/ayushman/crechargebyreceipt/getreceiptdetails?IOHid="+IOHid,
					success: function(data ) {	
						var data =  JSON.parse(data);
						console.log(data);
							if(data.spname != null){
								document.getElementById('ConsumerName').value = data.spname;								
								document.getElementById('Mobileno').value = data.mobilenumb;
								document.getElementById('Emailid').value = data.emailid;
								document.getElementById('IOHid').value = data.iohid;					            		
								document.getElementById('Addressline1').value = data.address;
							}else{
								showNotification('300','20','no data','Please enter the correct input.','notification','diaconfirmation',5000);
								document.getElementById('ConsumerName').value = '';
								document.getElementById('Mobileno').value = '';
								document.getElementById('Emailid').value = '';
								document.getElementById('IOHid').value = '';					            		
								document.getElementById('Addressline1').value = '';
							}
						},
					});			
	}
	function createview()
	{ 
		$("#userview").dialog({
				draggable: false,
				resizable: false,
				position: ['center', 'top'],
				show: 'blind',
				hide: 'blind',
				width: 420,
				height:300,
				dialogClass: 'ui-dialog-osx',
				afterClose: function(){
					alert("closing dialog");
				}
			});
			
			/*$.fancybox({
            'width': 400,
            'height': 300,
            'autoScale': false,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'type': 'iframe',
            'href': url,
            'showCloseButton': true,
				afterClose: function(){
					alert("closing dialog");
				}
        });*/			
	}
	function createsinglereceipt()
		{
			var cusiohid = document.getElementById('IOHid').value;
			if(cusiohid != ''){	
				var claimid = document.getElementById('claimid').checked;
				if(claimid == true)
				{
					var iohid = document.getElementById('IOHid').value;
							console.log(iohid);							
							if(document.getElementById('ReceiptNo').value != ''){				
										$.ajax({
														url: "/ayushman/crechargebyreceipt/createsinglereceipt",
														data: $("#generatereceiptform").serialize(),
														success: function(data ) {	
															var data =  JSON.parse(data);
														},
												});	
								
							}else{
								if(document.getElementById('recformat').value == 'Select'){
									showNotification('300','20','no data','Please select the receipt format.','notification','diaconfirmation',5000);
								}else if(document.getElementById('mySelect').value == 'Cash'){
										if(document.getElementById('recformat').value == 'select'){
											showNotification('300','20','no data','Please select the Receipt format.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Receiptdate').value == ''){
											showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Description').value == ''){
											showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Amount').value == ''){
											showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
										}else{		
											if(document.getElementById('otp').value != ''){
												$.ajax({
													url: "/ayushman/crechargebyreceipt/createsinglereceipt",
													data: $("#generatereceiptform").serialize(),
													success: function(data ) {	
														var data =  JSON.parse(data);
														console.log(data);	
														var recptno = data.rcptno;
																showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
																$.ajax({
																		url: "/ayushman/crechargebyreceipt/getotpdetailsbycre?iohid="+iohid,
																		success: function(data ) {
																				var data =  JSON.parse(data);																				
																			if(document.getElementById('otp').value == data.otp){
																					console.log("otp correct");
																				$.ajax({
																					type:"GET",
																					url: "/ayushman/caccountmanager/claimreceiptcre?ReceiptNo2="+recptno+"&IOHid2="+iohid,
																					success: function(data ) {	
																						var data =  JSON.parse(data);
																						showNotification('300','20','success','Claim successfull.','notification','diaconfirmation',5000);
																					generatereceiptform.reset();
																					},

																					error : function(){showMessage('550','200','fail',"Claim not successfull.",'error','id');}
																				});
																				$.ajax({
																					type:"POST",
																					url: "/ayushman/crechargebyreceipt/getprintdata?receiptno="+recptno,
																					success: function(data) {	
																							var data =  JSON.parse(data);
																							console.log(data);
																							$('#receipno').text(data.rcpno);
																							$('#receipamount').text(data.rcpamt);
																							$('#receipdate').text(data.rcpdate);
																							$('#receipname').text(data.rcppayname);
																							$('#paymode').text(data.paymode);
																						$("#print_box").dialog({
																								draggable: false,
																								resizable: false,
																								position: ['center', 'center'],
																								show: 'blind',
																								hide: 'blind',
																							   'showCloseButton': false, 
																								width: 820,
																								height:400,
																								dialogClass: 'ui-dialog-osx',
																								});
																								generatereceiptform.reset();
																					},
																				});
																	
																			}else{
																					showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
																				}						
																		},
																	error : function(){showMessage('550','200','Retrieving data',"Please enter valid receipt no.",'error','id');}
																});													
																	
													},

													error : function(){showMessage('550','200','Retrieving data',"error",'error','id');}
												});									
													
											}else{
													showNotification('300','20','Enter OTP','Please enter OTP.','notification','diaconfirmation',5000);																		
											}
										}	
										
								}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
										if(document.getElementById('recformat').value == 'select'){
											showNotification('300','20','no data','Please select the Receipt format.','notification','diaconfirmation',5000);
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
											showNotification('300','20','no data','Please enter the Cheque date.','notification','diaconfirmation',5000);
										}else	{		
													$.ajax({
																	type:"GET",
																	url: "/ayushman/crechargebyreceipt/createsinglereceipt",
																	data: $("#generatereceiptform").serialize(),
																	success: function(data ) {	
																			var data =  JSON.parse(data);
																				var recptno = data.rcptno;
																				
																			showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
																			$.ajax({
																						
																					url: "/ayushman/crechargebyreceipt/getotpdetailsbycre?iohid="+iohid,
																						success: function(data ) {
																								var data =  JSON.parse(data);
																							
																							if(document.getElementById('otp').value == data.otp){
																								$.ajax({
																									type:"GET",
																									url: "/ayushman/caccountmanager/claimreceiptcre?ReceiptNo2="+recptno+"&IOHid2="+iohid,
																									data: $("#generatereceiptform").serialize(),
																									success: function(data ) {	
																										var data =  JSON.parse(data);
																										showNotification('300','20','success','Claim successfull.','notification','diaconfirmation',5000);
																									generatereceiptform.reset();
																									},

																									error : function(){showMessage('550','200','fail',"Claim not successfull.",'error','id');}
																								});
																								$.ajax({
																										url: "/ayushman/crechargebyreceipt/getprintdata?receiptno="+recptno,
																										success: function(data) {	
																											var data =  JSON.parse(data);
																											$('#receipno').text(data.rcpno);
																											$('#receipamount').text(data.rcpamt);
																											$('#receipdate').text(data.rcpdate);
																											$('#receipname').text(data.rcppayname);
																											$('#paymode').text(data.paymode);														
																												$("#print_box").dialog({
																												draggable: false,
																												resizable: false,
																												position: ['center', 'center'],
																												show: 'blind',
																												hide: 'blind',
																												'showCloseButton': false, 
																												width: 820,
																												dialogClass: 'ui-dialog-osx',
																												});
																												generatereceiptform.reset();
																										},
																								});
																					
																							}else{
																									showNotification('300','20','Enter OTP','Please enter correct OTP.','notification','diaconfirmation',5000);
																								}						
																						},
																					error : function(){showMessage('550','200','Retrieving data',"please enter valid receipt no.",'error','id');}
																				});	
																					
																	},
																});
												}
									}
												
													
							}								
					}else{	
						if(document.getElementById('ReceiptNo').value != ''){				
										$.ajax({
													
														url: "/ayushman/crechargebyreceipt/createsinglereceipt",
														data: $("#generatereceiptform").serialize(),
														success: function(data ) {	
															var data =  JSON.parse(data);
														},
												});
								
								
						}else{
							if(document.getElementById('recformat').value == 'Select'){
									showNotification('300','20','no data','Please select the receipt format.','notification','diaconfirmation',5000);
							}else if(document.getElementById('mySelect').value == 'Cash'){
										if(document.getElementById('recformat').value == 'select'){
											showNotification('300','20','no data','Please select the Receipt format.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Receiptdate').value == ''){
											showNotification('300','20','no data','Please enter the Receipt date.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Description').value == ''){
											showNotification('300','20','no data','Please enter the Description.','notification','diaconfirmation',5000);
										}else if(document.getElementById('Amount').value == ''){
											showNotification('300','20','no data','Please enter the Amount.','notification','diaconfirmation',5000);
										}else{		
											$.ajax({												
												url: "/ayushman/crechargebyreceipt/createsinglereceipt",
												data: $("#generatereceiptform").serialize(),
												success: function(data ) {	
													var data =  JSON.parse(data);
													console.log(data);	
															
																showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
																	$.ajax({
																		url: "/ayushman/crechargebyreceipt/getprintdata?receiptno="+data.rcptno,
																		success: function(data) {	
																				var data =  JSON.parse(data);
																				$('#receipno').text(data.rcpno);
																				$('#receipamount').text(data.rcpamt);
																				$('#receipdate').text(data.rcpdate);
																				$('#receipname').text(data.rcppayname);
																				$('#paymode').text(data.paymode);
																			$("#print_box").dialog({
																					draggable: false,
																					resizable: false,
																					position: ['center', 'center'],
																					show: 'blind',
																					'showCloseButton': false, 
																					hide: 'blind',
																					width: 820,
																					dialogClass: 'ui-dialog-osx',
																					});
																					generatereceiptform.reset();
																		},
																	});
												},

												error : function(){showMessage('550','200','Retrieving data',"error",'error','id');}
											});
										}
										
							}else if(document.getElementById('mySelect').value == 'Cheque/DD'){
										if(document.getElementById('recformat').value == 'select'){
											showNotification('300','20','no data','Please select the Receipt format.','notification','diaconfirmation',5000);
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
											showNotification('300','20','no data','Please enter the Cheque date.','notification','diaconfirmation',5000);
										}else{		
											$.ajax({
												url: "/ayushman/crechargebyreceipt/createsinglereceipt",
												data: $("#generatereceiptform").serialize(),
												success: function(data ) {	
														var data =  JSON.parse(data);
														generatereceiptform.reset();	
															
														showNotification('300','20','success','Receipt created successfully.','notification','diaconfirmation',5000);
														$.ajax({
																		url: "/ayushman/crechargebyreceipt/getprintdata?receiptno="+data.rcptno,
																		success: function(data) {	
																			var data =  JSON.parse(data);
																			$('#receipno').text(data.rcpno);
																			$('#receipamount').text(data.rcpamt);
																			$('#receipdate').text(data.rcpdate);
																			$('#receipname').text(data.rcppayname);
																			$('#paymode').text(data.paymode);														
																				$("#print_box").dialog({
																				draggable: false,
																				resizable: false,
																				position: ['center', 'center'],
																				show: 'blind',
																				hide: 'blind',
																			   'showCloseButton': false, 
																				width: 820,
																				dialogClass: 'ui-dialog-osx',
																				});
																				generatereceiptform.reset();
																		},
																});
												},
											});
										}
							}
					}
				}
			}else{
					showNotification('300','20','no data','Consumer not selected,please select consumer.','notification','diaconfirmation',5000);
		}		
	}
	function generateotp(){
			var IOHid = document.getElementById("IOHid").value;
				$.ajax({
						type:"GET",
						url: "/ayushman/crechargebyreceipt/otpgeneratebycre?IOHid="+IOHid,
						success: function(data ) {
									showNotification('300','20','OTP generated','</h5>OTP generated, please ask to Consumer for OTP.</h5>','notification','timernotification',3000);
						$("#regenerateotp").show();
						$("#enterotp").hide();
						},
				});				
		}
	function checkfield(){
		if(document.getElementById('Addressline1').value != '' || document.getElementById('Landmark').value != '' || document.getElementById('State').value != '' || document.getElementById('Country').value != '' || document.getElementById('City').value != ''){
		}else{
				showNotification('300','20','no data','Please enter the correct input.','notification','diaconfirmation',5000);
			}		
	}
	function otpfun(){
		var claimid = document.getElementById('claimid').checked;
		if(claimid == true){
			if(document.getElementById('Mobileno').value == ''){
				$("#enterotp").hide();
				$("#generateotp").hide();
				$("#regenerateotp").hide();
				document.getElementById('claimid').checked = false;
				showNotification('300','20','no data','Please enter the Mobile number.','notification','diaconfirmation',5000);
			}else{
				$("#enterotp").show();
				$("#generateotp").show();
				$("#regenerateotp").hide();
			}
		
		}else{
			$("#enterotp").hide();
			$("#generateotp").hide();
			$("#regenerateotp").hide();
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
	function chkrcptvalide()
	{
		var rcptid = document.getElementById('ReceiptNo').value;
		if(rcptid != ""){				
					$.ajax({
						url: "/ayushman/crechargebyreceipt/getprintdatarecpet?receiptno="+rcptid,
						data: $("#generatereceiptform").serialize(),
						success: function(data ) {
							var data =  JSON.parse(data);
							//getreceipt(data.payiohid);   
								console.log(data);
							if(data.rcpamt != null){									  
										document.getElementById('ReceiptNo').value = rcptid;
										document.getElementById('Amount').value = data.rcpamt;
										document.getElementById('Receiptdate').value = data.rcpdate;
										document.getElementById('Description').value = data.description;
										document.getElementById('recformat').value = 'select';
										document.getElementById("Receiptdate").readOnly = true;
										document.getElementById("Amount").readOnly = true;
								if(data.paymode == 'Cheque/DD'){ 
									$("#chequetable").show();
									$("#chequetable1").show();
									$("#onlinetable1").hide();
										document.getElementById('mySelect').value = 'Cheque/DD';
										document.getElementById('recformat').value = 'select';
										document.getElementById('chequeddNo').value = data.chequeno;
										document.getElementById('chequedate').value = data.chequedate;
										document.getElementById('BankName').value = data.bankname;								
										document.getElementById('branch').value = data.branchname;									
										document.getElementById("chequeddNo").readOnly = true;
										document.getElementById("chequedate").readOnly = true;
										document.getElementById("branch").readOnly = true;
										document.getElementById("BankName").readOnly = true;
									}
								if(data.paymode == 'online'){
									$("#onlinetable1").show();
									$("#chequetable").hide();
									$("#chequetable1").hide();
										document.getElementById('mySelect').value = 'online';
										document.getElementById('recformat').value = 'select';
										document.getElementById('ontranNo').value = data.onlinetrxid;
										document.getElementById("ontranNo").readOnly = true;
									}								
							}else{
									$("#chequetable").hide();
									$("#chequetable1").hide();
									$("#onlinetable1").hide();
								document.getElementById('Amount').value = "";	
								document.getElementById('Description').value = "";
								document.getElementById('Receiptdate').value = "";
								document.getElementById('BankName').value = "";
								document.getElementById('chequeddNo').value = "";
								document.getElementById('branch').value = "";
								document.getElementById('chequedate').value = "";
								document.getElementById("ReceiptNo").value = "";
								document.getElementById('chequedate').value = "";
								document.getElementById('chequeddNo').value = "";
								document.getElementById('chequedate').value= "";
								document.getElementById('BankName').value = "";							
								document.getElementById('branch').value = "";
								document.getElementById('ontranNo').value = "";
								document.getElementById('recformat').value = 'select';								
								showNotification('300','20','no data','Please enter correct receipt number.','notification','diaconfirmation',5000);		
									document.getElementById("Receiptdate").readOnly = false;
									document.getElementById("Amount").readOnly = false;
									document.getElementById("chequeddNo").readOnly = false;
									document.getElementById("chequedate").readOnly = false;
									document.getElementById("branch").readOnly = false;
									document.getElementById("BankName").readOnly = false;
									document.getElementById("ontranNo").readOnly = false;
							}
						},
					});			
		}else{
								document.getElementById('Amount').value = "";
								document.getElementById('Receiptdate').value = "";
								document.getElementById('BankName').value = "";
								document.getElementById('chequeddNo').value = "";
								document.getElementById('branch').value = "";
								document.getElementById('chequedate').value = "";								 		  
								document.getElementById('recformat').value = 'select';
								document.getElementById("Receiptdate").readOnly = false;
								document.getElementById("Amount").readOnly = false;
		}
	}
	function chkrcptvalideongenerate()
	{
		var rcptid = document.getElementById('ReceiptNo').value;
		if(rcptid != ""){
				
					$.ajax({
						url: "/ayushman/crechargebyreceipt/getprintdata?receiptno="+rcptid,
						data: $("#generatereceiptform").serialize(),
						success: function(data ) {
							var data =  JSON.parse(data);
							if(data.rcpamt != null){
								if(document.getElementById('IOHid').value == ''){
									getreceipt(data.payiohid);
								}	
								createsinglereceipt();
							}else{								
								showNotification('300','20','no data','Please enter correct receipt number.','notification','diaconfirmation',5000);		
							}
						},
					});			
		}else{	
			createsinglereceipt();
		}
	}
	function onpage(){
			location.href = "/ayushman/cnewreceipt/view";
		}
	function backpage(){		
		window.location='/ayushman/ccashreceiptexecutive/view';
	}
  
</script>
<style>
.table-bordered {
    border: 1px solid #ddd;
}

.table {
    width: 100%;
    margin-bottom: 20px;
}
</style>
<div id="body_contantpatientpage" style="width:100%; height:420 px;"> 
	<table>
	   <tr>  
	<td style="width:98%;">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
				      <td style="width:825px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="160" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp; Generate Receipt</strong>
									<a href="#" onclick="backpage();" style="float:right"><img src="/ayushman/assets/app/img/goback2.png" style="height: 25px; width: 80px;"></a>
								</td>
							</tr>
						</table> 
					  </td>
					</tr>
                </table> 
			</td>
		</tr>			
	</table>
		<form id="generatereceiptform" method="post" enctype="multipart/form-data" action="/ayushman/crechargebyreceipt/createsinglereceipt"  >
			<div  id="aaa">	
				<table width="100%" >
					<tr>
						<td class="bodytext_bold">Name:</td>
						<td class="bodytext_bold"> <input name="firstname" id="ConsumerName" class="textarea" placeholder="Name.." title="Enter name to search" type="text"/></td>
						<td class="bodytext_bold">Mobile No.:</td>						
						<td colspan="2" class="bodytext_bold"><input  name="Mobileno" id="Mobileno" class="textarea" placeholder="Mobile no.." title="Enter mobile no to search" type="text" maxlength="10"/></td>
					</tr><tr>
						<td class="bodytext_bold">Email id :</td>
						<td class="bodytext_bold"><input name="Emailid" id="Emailid" style="width: 70%;" class="textarea" placeholder="Email id.." title="Enter Email id to search" type="text"/></td>
						<td class="bodytext_bold">IOH id:</td>
						<td class="bodytext_bold"><input name="IOHid" id="IOHid" class="textarea" placeholder="IOH id.." title="Enter IOH id to search" type="text"/></td>
						<td> <input type="button" id="searchbtn" class="button" onclick="getuserinfo();" style = "border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;"/></td>
					</tr>
			    </table>	
			</div>
			<fieldset style="background-color: rgb(236, 248, 251);">
				<fieldset>
					<legend>Address:</legend>
						<table width="100%">
							<tr>
								<td class="bodytext_bold"><input readonly style="width: 680px; background-color: rgb(236, 248, 251);"name="Addressline1" id="Addressline1"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>							
						</table>
					</fieldset>	
					<fieldset>
					<legend>Receipt Details:</legend>
						<table width="100%">
							<tr>
								<td class="bodytext_bold">Mode of payment* </td>
								<td class="bodytext_bold">:</td>
								<td><select onchange="modeofpayment();" name="mySelect" id="mySelect"  style="background-color: rgb(236, 248, 251);">
										<option value="Cash">Cash</option>
										<option value="Cheque/DD">Cheque/DD</option>
										<option value="online">Online</option>
									</select>
								</td>
								<td></td>
									<td class="bodytext_bold">Receipt no format</td>
									<td class="bodytext_bold">:</td>									
									<td align="left" valign="middle" class="bodytext_normal">
										<select id="recformat" name="recformat"   style="background-color: rgb(236, 248, 251);" class="textarea" style="width:80%">
											<option value="select">Select</option>
											<?php 
												$objCorporate = ORM::factory('rcptstring')->find_all();
												foreach($objCorporate as $objRelation){
													echo '<option value="'.$objRelation->stringname_c.'">'.$objRelation->stringname_c.'</option>';
												}
												
											?>
									</select>
									</td>
								
							</tr>	
								<tr >
									<td class="bodytext_bold">Receipt No.</td>
									<td class="bodytext_bold">:</td>
									<td><input name="ReceiptNo" onchange="chkrcptvalide();" id="ReceiptNo"  style="background-color: rgb(236, 248, 251);" class="textarea" maxlength="12" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Receipt date* </td>
									<td class="bodytext_bold">:</td>
									<td class="bodytext_bold"><input type="text" name="Receiptdate" id="Receiptdate"  style="background-color: rgb(236, 248, 251);" class="textarea" /></td>
								</tr>
								<tr >
									<td class="bodytext_bold">Description* 	</td>
									<td class="bodytext_bold">:</td>
									<td><input name="Description" id="Description"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
									<td></td>
									<td class="bodytext_bold">Amount* </td>
									<td class="bodytext_bold">:</td>
									<td><input name="Amount" id="Amount"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								</tr>	
							<tr id="chequetable">
								<td class="bodytext_bold">Cheque/DD No*</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequeddNo" id="chequeddNo"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Bank Name*</td>
								<td class="bodytext_bold">:</td>
								<td><input name="BankName" id="BankName"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
							<tr id="onlinetable1">
									<td class="bodytext_bold">Online transaction No*</td>
									<td class="bodytext_bold">:</td>
									<td><input name="ontranNo" id="ontranNo"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
									
							</tr>
							<tr  id="chequetable1">
								<td class="bodytext_bold">Branch*</td>
								<td class="bodytext_bold">:</td>
								<td><input name="branch" id="branch"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
								<td></td>
								<td class="bodytext_bold">Cheque date*</td>
								<td class="bodytext_bold">:</td>
								<td><input name="chequedate" id="chequedate"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text"/></td>
							</tr>
						</table>
							</hr>					
							<table>
							<tr>
								<td align="right" class="bodytext_bold">Claim</td>
								<td>:</td>
								<td align="right" class="bodytext_bold"><input id="claimid" type="checkbox" onclick="otpfun();"/></td>								
								<td id="generateotp" ><input name="otp" id="otp"  style="background-color: rgb(236, 248, 251);" class="textarea" type="text" placeholder="Enter otp"/></td>
								<td id="regenerateotp"  class="bodytext_bold"><input type="button" name="btnotp1" id="btnotp1" class="button" value="Resend otp" onclick="generateotp();"/></td>
								<td class="bodytext_bold"  id="enterotp"><input type="button" name="btnotp" id="btnotp" class="button" value="Generate otp" onclick="generateotp();"/></td>
							</tr>
							</table>
					</fieldset>						
						<table width="100%">
						<tr width="100%">
							<td width="25%" align="right"></td>
							<td width="15%"><input type="button" class="button" value="Generate" onclick="createsinglereceipt();" style="width:100px;"/></td>
						<td width="25%"></td>
						</tr>
						</table>
					</fieldset>
					</div>		
				
			</form>		
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
						<div id="userview" style="display:none">
							<table class="table table-bordered table-condensed bodytext_normal" id ="searchresult" style="width:100%;display:block;height:100%;font-family:arial;" >
								<tr class="Heading_Bg" style="color:#fff;">
										<td width="500px" align="middle">IOH id</td>
										<td width="500px" align="middle">Name</td>
										<td width="500px" align="middle">Mobilenumb</td>
								</tr>
								
							</table>
						</div>
