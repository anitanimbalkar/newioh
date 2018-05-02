<html>
<head>
<title>Export transactions to tally</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox1.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<style type="text/css">
@media only print
{	
	#btnprint {display: none !important; 
	}
	#btnpayment {display: none !important; 
	}
	#btnsave {display: none !important; 
	}
}
</style>
<script type="text/javascript">
		


$(document).ready(function() {
	$("#cheqDetail").hide();
		$("#cardDetail").hide();
		//parent.location.reload(true);

$(function() {
			$( "#cheqdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#admitdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#creditdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#dischargedate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
});

	$(document).ready(function() {
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
			
		});
		
		if($.trim($('#errorlistdiv').html()) != ""){
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		}
			
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			});

	
function savebill()
{

	var patientsid=document.getElementById("patientsid").value;
    var debit=document.getElementById("netdebit").value;
 	var caseno=document.getElementById("casesheetno").value;
	var other1=document.getElementById("other1").value;
	var other2=document.getElementById("other2").value;
	var other3=document.getElementById("other3").value;
	var value1=document.getElementById("value1").value;
	var value2=document.getElementById("value2").value;
	var value3=document.getElementById("value3").value;
	var billid=document.getElementById("billid").value;
	var hospitalid=document.getElementById("hospitalid").value;

		$.ajax({
				
		
				url: "/ayushman/cbill/savehospBill/get?patId="+patientsid+"&amount="+debit+"&caseno="+caseno+"&other1="+other1+"&other2="+other2+"&other3="+other3+"&value1="+value1+"&value2="+value2+"&value3="+value3+"&billid="+billid+"&hospitalid="+hospitalid,
				 
				success: function (data) {
					
				},
			error: function (req, status, error) {
			}
		});


}


	function PrintElem(discflag)
    {

    	var patientsid=document.getElementById('patientsid').value;
         var billid=document.getElementById('billid').value;
         var caseno=document.getElementById("casesheetno").value;
	var other1=document.getElementById("other1").value;
	var other2=document.getElementById("other2").value;
	var other3=document.getElementById("other3").value;
	var value1=document.getElementById("value1").value;
	var value2=document.getElementById("value2").value;
	var value3=document.getElementById("value3").value;
    var header_cashier=document.getElementById("header_cashier").value;
    if(discflag==false)
    {
    	billid="Provisional";
    }
if(value1==0 & value2==0 & value3==0)
{value3="";
value2="";
value1="";
	 window.openDialog('/ayushman/cipdbills/printipdbill?patientsid='+patientsid+'&caseno='+caseno+'&billid='+billid+"&other1="+other1+"&other2="+other2+"&other3="+other3+"&value1="+value1+"&value2="+value2+"&value3="+value3+"&header_cashier="+header_cashier,'100%','100%');
       
}
	
        window.openDialog('/ayushman/cipdbills/printipdbill?patientsid='+patientsid+'&caseno='+caseno+'&billid='+billid+"&other1="+other1+"&other2="+other2+"&other3="+other3+"&value1="+value1+"&value2="+value2+"&value3="+value3+"&header_cashier="+header_cashier,'100%','100%');
        document.getElementById('patientsid').value=patientsid;
        
    }

   
    
	function creditAccount(){
		var patId=document.getElementById("patientsid").value;
		var patName=document.getElementById("patientname").value;
		document.getElementById("CAiohid").value=patId;
	// document.getElementById("CAcaseno").value=caseno;
	// document.getElementById("creditdate").value=$.datepicker.formatDate('dd M yy', new Date());
		document.getElementById("creditamount").value='';
		document.getElementById("creditdesc").value='';
	
		$("#creditPatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: ' Credit  --- '+patName,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',

		});
				//alert(patId);
	
}

function creditPatientinData(caseno){
		var patId=document.getElementById("patientsid").value;
	var CAdate=document.getElementById("creditdate").value;
	var CAamount=document.getElementById("creditamount").value;
	var CAdesc=document.getElementById("creditdesc").value
		var caseno=document.getElementById("CAcaseno").value
		var cheqno=document.getElementById("cheqno").value;
	var cheqdate=document.getElementById("cheqdate").value;
	var trxrefno=document.getElementById("trxrefno").value;
	
		//document.getElementById("CAcaseno").value
 if(CAdesc=="" && CAdate == "" && CAamount == "" && cheqno == "" && trxrefno == "" )
		{
			$("#creditamount").focus();
			return false;
		}

		else if(CAdate == "" || CAamount == "" )
		{
			$("#creditamount").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			$("#trxrefno").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			$("#cheqno").focus();
			return false;
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			$("#creditamount").focus();
			return false;
		}
			
		else
		{
			$.ajax({
				url: "/ayushman/ccashier/creditPatientAccount/get?id="+patId+"&creditdate="+CAdate+"&caseno="+caseno+"&creditamount="+CAamount+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno,

				success: function(data) {
                showNotification('300','20','Save data','Account Credited','notification','timernotification',3000);
				$("#creditPatient").dialog( "close" );
				//window.location.reload();	
				
        }           
        }); 
				$("#creditPatient").dialog( "close" );	
				//window.location.reload();
	}	

	
}

function dischargePatient(){
			var patId=document.getElementById("patientsid").value;
		var patName=document.getElementById("patientname").value;
		var caseno=document.getElementById("casesheetno").value;

	document.getElementById("disciohid").value=patId;
	document.getElementById("disccaseno").value=caseno;
	document.getElementById("dischargedate").value=$.datepicker.formatDate('dd M yy', new Date());	
		$("#dischargePatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: 'Discharge ---  '+patName,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		 onClosed: function() {
                                  parent.location.reload(true);
                                  },

		});
		$("#dischargePatient").show();
}


function dischargePatientinData(){

//alert("save");
savebill();
//convertAndsavePDf();

	var patId=document.getElementById("disciohid").value;
	var caseno=document.getElementById("disccaseno").value;
	var discdate=document.getElementById("dischargedate").value;
	// var bednumber=document.getElementById("bednumber").value;

		if(discdate == ""){
			window.alert('Please enter date');
		}
		else
		{
			$.ajax({
				url: "/ayushman/ccashier/dischargePatient/get?IOHid="+patId+"&dischargedate="+discdate+"&caseno="+caseno,
				success: function(data) {
                showNotification('300','20','Save data','Patient Discharged','notification','timernotification',3000);
				$("#dischargePatient").dialog( "close" );
				//$("#btnprint").display(none);
						//window.location.reload();
				
        }
           
        }); 
				$("#dischargePatient").dialog( "close" );		
				//window.location.reload();
		}
		PrintElem(true);
	
}

$(window).load(function () {
            // run code
            showtotal();
            
        });

	
	function showtotal( )
	{
	//alert("outstanding");
			var value1=parseFloat(document.getElementById("value1").value);
			var value2=parseFloat(document.getElementById("value2").value);
			var value3=parseFloat(document.getElementById("value3").value);
			
           	var totaldebit=document.getElementById("totaldebit").value;
			var totalcredit=document.getElementById("totalcredit").value;
			var outstanding=document.getElementById("outstanding").value;

			totaldebit=parseFloat(totaldebit)+parseFloat(value1)+ parseFloat(value3);
			totalcredit=parseFloat(totalcredit)+parseFloat(value2);
            var balance1=parseFloat(outstanding)-parseFloat(value1);
           	var balance2=parseFloat(balance1)-parseFloat(value3);
           	var balance3=parseFloat(balance2)+parseFloat(value2);
			netdebit=parseFloat(totaldebit)-parseFloat(value2);
           	var Balance=parseFloat(totalcredit)-parseFloat(netdebit);
          	document.getElementById("debit1").value=netdebit.toFixed(2);
			document.getElementById("credit1").value=totalcredit.toFixed(2);
			document.getElementById("debit2").value=totaldebit.toFixed(2);
			document.getElementById("credit2").value=totalcredit.toFixed(2);
			document.getElementById("totaloutstanding").value=Balance.toFixed(2);
			document.getElementById("balance1").value=parseFloat(balance1).toFixed(2);
			document.getElementById("balance2").value=parseFloat(balance2).toFixed(2);
			document.getElementById("balance3").value=parseFloat(balance3).toFixed(2);
			document.getElementById("netdebit").value=netdebit.toFixed(2);

		
		
	}

	function showRcpt()
    {
    	   	var caseno=document.getElementById("CAcaseno").value;
    		var patId=document.getElementById("patientsid").value;
    		var CAamount=document.getElementById("creditamount").value;
    		var CAdate=document.getElementById("creditdate").value;
		    var rcptId=document.getElementById("rcptId").value;
			var patName=document.getElementById("patientname").value;
			var hospitalid=document.getElementById("hospitalid").value;
			var header_cashier=document.getElementById("header_cashier").value;
    		var footer_cashier=document.getElementById("footer_cashier").value;
    		var cheqno=document.getElementById("cheqno").value;
			var cheqdate=document.getElementById("cheqdate").value;
			var trxrefno=document.getElementById("trxrefno").value;
			var CAdesc=document.getElementById("creditdesc").value;
			var payment=document.getElementById("payment").value;
			var wordamt=document.getElementById("wordamt").value;
			if( CAdesc=="" && CAdate == "" && CAamount == "" && cheqno == "" && trxrefno == "" )
		{
			$("#creditamount").focus();
			return false;
		}

		else if(CAdate == "" || CAamount == "" )
		{
			$("#creditamount").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			$("#trxrefno").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			$("#cheqno").focus();
			return false;
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			$("#creditamount").focus();
			return false;
		}
    	     window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment+"&wordamt="+wordamt,800,400);
    	// window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment,800,400);
       // window.location.reload();
     }

	
	function convertAndsavePDf(){
	var patientuserid=$('#patientsid').val();
	var caseno=$('#casesheetno').val();
	var billid=$('#billid').val();

		elm = $( "#ipdbill" ).clone();
		var htmlfile={htmlfile:elm.html(),patientuseridPDF:'patientuserid',doctoruseridPDF:-5,caseno:caseno,billidPDF:billid};
		$.ajax({
				type: 'post',
				data:htmlfile,
				url: "/ayushman/cbill/saveBillPdf",
				datatype: 'html', 
				success: function (data) {
					
				},
			error: function (req, status, error) {
			}
		});
	}


function services(pdffilename )
	{
		//var caseno=document.getElementById("caseno").value;
		
			if(pdffilename=="" || pdffilename==null){
				alert("PDF is not available");
				//parent.location.reload(true);
			}
			else{
				window.open('/ayushman/files/Documents/'+pdffilename);
				window.location.reload(true);
				}

	}

  function selectMode(s){
    	    		var select=document.getElementById("payment").value;
    	    		var selectedOption=s[s.selectedIndex].value;
    	    		if(selectedOption==6)
    	    		{
    	    			$("#cheqDetail").show();
    	    			$("#cardDetail").hide();
    	    		}
    	    		 else if(selectedOption==1)
    	    		{
    	    			$("#cardDetail").show();
    	    			$("#cheqDetail").hide();
    	    		}
    	    		else{
    	    			$("#cheqDetail").hide();
    	    			$("#cardDetail").hide();
    	    		}

    	    		
    }

    function closedialog()
    {
          parent.location.reload(true);
     }

     function inWords(num) {
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
 	   document.getElementById("wordamt").value=str;
 	  // alert(document.getElementById("totalamt").value);
	}
	function setwardid(id)
	{		
		document.getElementById("radiobtnvalue").value=id;
	}
	
	function deleterow(rownumber,testname,testid,wardid)
	{
		showMessage('250','50','Remove test','Do you really want to remove test '+testname+' ?','confirmation','confirmRemoveTest');
		$("#removetestrownumber").val(rownumber);
		$("#removetestid").val(testid);
		$("#wardid").val(wardid);
			
	}
	
	function Confirmation_Event(id,confirmation)
	{
		if(id == 'confirmRemoveTest'){
			if(confirmation == 'yes'){
				removeselectedtest();	
			}
		}
	}
	
	function removeselectedtest()
	{
		var rownumber = $("#removetestrownumber").val();
		var testid=  $("#removetestid").val();
		var patid = $("#patientsid").val();
		var caseno=  $("#casesheetno").val();
		var wardid=  $("#wardid").val();
		
		$.ajax({
			url: "/ayushman/ccashierdashboard/removetest?testid="+testid+"&rownumber="+rownumber+"&patid="+patid+"&caseno="+caseno+"&wardid="+wardid,
			success: function( data ) {
				window.location='/ayushman/ccashierdashboard/viewbill?id='+patid+'&caseno='+caseno;
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});		
	}
	
	function createbill()
	{		

		var wardid=document.getElementById("radiobtnvalue").value;
		if(wardid=="" || wardid==null)
		{
			alert("Please Select Catalog to Add Services");
		}
		else
		{
			window.location='/ayushman/ccashierdashboard/createbill?#/ipdservices/<?php echo $patientsid;?>/'+wardid+'/<?php echo $refid;?>';
		}
	}

</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:auto;overflow-x:hidden;margin-left:0.5%;" id="ipdbill"> 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;IPD Bill</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<input name="debitvalue" id="debitvalue" type="hidden" class="textarea" value="" size="8"/>
						<input name="patientsid" id="patientsid" class="textarea" type="hidden" value="<?php echo "$patientsid"; ?>" size="8"/>
						<input name="patientname" id="patientname" class="textarea" type="hidden" value="<?php echo "$onlypatientname"; ?>" size="8"/>
						<input name="casesheetno" id="casesheetno" class="textarea" type="hidden" value="<?php echo "$refid"; ?>" size="8"/>
			            <input name="hospitalid" id="hospitalid" class="textarea" type="hidden" value="<?php echo "$hospitalid"; ?>" size="8"/>

			<input name="creditvalue" id="creditvalue" type="hidden" class="textarea" value="" size="8"/>
													
									
											<!-- <form id="searchform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountstatement/viewadminstatements"  >
										 -->		<tr>
													 <tr>
                            <td width="60%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-weight:bold;font-size:9pt;font-family:arial;">Patient name:</label>
                                <label id="patientname1" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                               <?php echo "$onlypatientname";?>
                                </label>                        
                                      </td>
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Age:</label>                           
							
							 <label id="age" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                                 <?php echo "$age";?>
                              </label>         
                              </td>

                              <td width="60%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font-weight:bold;font-size:9pt;font-family:arial;">Gender:</label>
                                <label id="gender" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                               <?php echo "$gender";?>
                                </label>                        
                                      </td>
                             
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Mobile No:</label>                           
              
               <label id="patContact" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                                 <?php echo "$mobileno1";?>
                              </label>         
                              </td>
                          </tr>
                          <tr>
						   <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Case No:</label>                           
              
               <label id="caseno" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                                 <?php echo "$refid";?>
                             </label>         
                            </td>
						  <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Reg No :</label>                           
							
							 <label id="patId" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                                 <?php echo "$patientsid";?>
                            </label>         
                            </td>
                           

                            <td width="60%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font-weight:bold;font-size:9pt;font-family:arial;">Admit Date:</label>
                                <label id="admitdate_c" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                                               <?php echo "$admitdate_c";?>                 </label>                            </td>
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Discharge Date:</label>                           
							 <label id="dischargedate_c" style="font-weight:bold;font-size:9pt;font-family:arial;margin-left:10px;">
                               <?php echo "$dischargedate_c";?>
                              </label>          
                            </td>
					  </tr>		
		  				<tr>
		        			 <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Total charges :</label>                           
              					<input onChange="showtotal()" name="debit1" id="debit1" readonly="readonly"  type="text" class="textarea" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;margin-left:30;padding-right:20px;border:none;" value="" size="8"/>
                            </td>
     						 <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Total Payment :</label>                           
								<input  name="credit1" id="credit1" type="text" readonly="readonly" class="textarea" onChange="showtotal()" value="" size="8" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;border:none; "/>
	                        </td>
							
							 <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Account Balance :</label>                           
								<input name="totaloutstanding" id="totaloutstanding" onChange="showtotal()" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;border:none;" readonly="readonly"  class="textarea" type="text" value="" size="8"/>
                            </td>
						</tr>
											
				  </table>
	
<!-- 		<hr  style="height:1px;background-color:#ecf8fb;border:none;"/>
 -->														
											
  <div style="width:100%;margin-top:5px;height:100%;display:block;" class="bodytext_normal">
    <table width="100%" style="border-bottom:1px solid;" height="100%" align="left" cellpadding="1" cellspacing="1" >
      <tr class="Heading_Bg">
        <td width="100" align="middle">&nbsp;</td>
        <td width="155" align="middle">Date</td>
        <td width="102" align="middle">Description</td>
        <td width="81" align="middle">Rate(Rs.)</td>
        <td width="56" align="middle">Quantity</td>
        <td width="110" align="middle">Total Charge(Rs.)</td>
        <td width="13" align="middle" bgcolor="white"></td>
        <td width="62" align="middle">Receipt No</td>
        <td width="86" align="middle"> Payment(Rs.)</td>
        <td width="133" align="middle">Balance</td>
      </tr>
      <tr>
        <td><?php $i=0;
						    $total=0.0;
						    $totalcredit=0.0;
						    $totaldebit=0.0;
						    $result = $result;
						    // $hospitalid=$hospid;
						    // var_dump($hospitalid);die;
						   	$billid = transaction::getLatestBillId($hospitalid);
						   	$rcptId = rcpttransaction::getLatestRcptId($hospitalid);

						   		
							    
							    if(count($result) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=1;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
							
							$debitvalue=$result[$i][5];
							$creditvalue=$result[$i][7];
							$testname=$result[$i][10];
							$pdffilename=$result[$i][9];
					
							//1.date
							//2.description
							//3.rate
							//4.qty
							//5.totalamt
							//6.rcptno
							//7.amt
							//8.balance
							//9.pdffilename
							//10.flag
							//11.testid
							//12.wardid

										if($testname == "CHARGE"){
										echo '
											<td width="80" height="25" align="left">
											<img id ="'.$result[$i][2].'" onClick="deleterow('.$i.',this.id,'.$result[$i][11].','.$result[$i][12].');" src="\ayushman\assets\images\Remove_Icon.png" alt="" height="25" width="25" ></td>
											<td width="140" align="middle">'.$result[$i][1].'</td>
											<td width="230" align="left">'.$result[$i][2].'</td>';
										}
										else{
										echo '
											<td width="80" height="25" align="left">
											</td>
											<td width="140" align="middle">'.$result[$i][1].'</td>
											<td width="230" align="left">'.$result[$i][2].'</td>';																						
										}

										if($testname == "CHARGE"){
										echo '
										<td width="115" align="right">'.$result[$i][3].'</td>';
										}
										else{
											echo '<td> </td>';
										}
										if($testname == "CHARGE"){
										echo '
										<td width="230" align="center">'.$result[$i][4].'</td>';
										}
										else{
											echo '<td> </td>';
										}
										if($testname == "CHARGE"){
										echo '
										<td width="115" align="right">'.$result[$i][5].'</td>';
										}
										else{
											echo '<td> </td>';
										}

										echo '
										<td bgcolor="white" ></td>
										<td width="155" align="center"><a href="" onClick=services("'.$pdffilename.'");><font color="blue">'.$result[$i][6].'</font></a></td>';
									
										if($testname == "RCPT"){
											echo '
										<td width="85" align="right">'.$creditvalue.'</td>';
										}
										else{
											echo '<td> </td> ';
										}

						    if( $debitvalue==null || $debitvalue==''){
		                             $debitvalue=0.0;	
								}

		                     if( $creditvalue==null || $creditvalue==''){
		                              $creditvalue=0.0;	
								}
			

		
		if ($testname=="RCPT") {
		$creditvalue=(float)($creditvalue);
			$debitvalue=0.0;
			$totalcredit=(float)$totalcredit+(float)$creditvalue;
		}if($testname=="CHARGE"){
		$debitvalue=(float)($debitvalue);
		$creditvalue=0.0;
		$totaldebit=(float)$totaldebit+(float)$debitvalue;

			}
		

			$total=(float)$total+((float)$creditvalue-(float)$debitvalue);
			$bal=number_format((float)$total,2,'.','');

										echo '
										<td width="185" align="right" style="margin-right:2;">'.$bal.'</td>';
									  echo "</tr>";
								  }
							    }
						    ?>
        </td>
      </tr>
      <tr >
      	<td></td>
        <td align="center"><?php echo date('d M Y');?></td>
        <td width="102" height="30" align="left" colspan=1 ><input name="other1" id="other1" autocomplete="on" autofocus="autofocus" type="text"   class="bodytext_normal" value="" size="17"/>
        </td>
        <td></td>
        <td></td>
        <td width="110" colspan="1" align="right">
        	<input name="value1" autocomplete="on" autofocus="autofocus" id="value1"  style="padding-right:1px;text-align:right;" type="text" onChange="showtotal()"  class="bodytext_normal" value="0" size="10"/>
        </td>
        <td bgcolor="white"></td>
        <td></td>
        <td></td>
        <td width="86" height="30" align="right"><input type="text"  class="bodytext_normal" style="border:none;font-size:8pt;text-align:right;" id="balance1"  align="right" value="0" size="10"  name="balance1" readonly="readonly" />
        </td>
      </tr>
      <tr class="bodytext_normal" style = 'background-color:#ecf8fb;'>
        <td></td>
        <td align="center"><?php echo date('d M Y');?></td>
        <td width="102" height="30" align="left" colspan=1><input name="other3" autocomplete="on" autofocus="autofocus" id="other3" type="text"  class="bodytext_normal" value="" size="17"/>
        </td>
        <td></td>
        <td></td>
        <td width="110" align="right"><input name="value3" onChange="showtotal()" autocomplete="on" autofocus="autofocus" id="value3" style="padding-right:1px;text-align:right;" type="text"  class="bodytext_normal" value="0" size="10"/>
        </td>
        <td bgcolor="white"></td>
        <td></td>
        <td></td>
        <td width="86" height="30" align="right">
        	<input type="text" style="border:none;font-size:8pt;text-align:right;" id="balance2" class="bodytext_normal"  align="right" value="0" size="10"  name="balance2" readonly="readonly" />
        </td>
      </tr>
     	<td></td>
  		<td align="center"><?php echo date('d M Y');?></td>
      	<td width="102" height="30" align="left" colspan=1>
      		<input  name="other2" id="other2" autocomplete="on" autofocus="autofocus" type="text"   class="bodytext_normal" value="" size="17"/>
      	</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td bgcolor="white"></td>
    	<td ></td>
    	<td width="62" colspan="1" align="right">
    		<input name="value2" id="value2" onChange="showtotal()" autocomplete="on" autofocus="autofocus" style="padding-right:1px; text-align:right;" class="bodytext_normal"  type="text" value=0 size="10"/>
      	</td>

    	<td width="86" height="30" align="right">
    		<input type="text" style="border:none;font-size:8pt;text-align:right;" id="balance3" class="bodytext_normal"  align="right" value=0 size="10"  name="balance3" readonly="readonly" />
     	 </td>
 	 </tr>
 	 <tr style="font-size:9pt;">
  		<td></td>
  		<td  height="30" align="center" colspan=2 >Total: </td>
    	<td></td>
    	<td></td>
    	<td width="81"  colspan="1" align="right"><input type="text" style="border:none;font:bold;font-size:9pt;text-align:right;" id="debit2" class="textarea"  align="right" value="<?php echo number_format((float)$totaldebit,2,'.',',');?>" size="10"  name="debit2" readonly="readonly" />
    	</td>
    	<td bgcolor="white"></td>
    	<td></td>
    	<td width="110"  colspan=1 align="right"><input type="text" style="border:none;font:bold;font-size:9pt;text-align:right;" align="right" id="credit2" class="textarea"  value="<?php echo number_format((float)$totalcredit,2,'.',',');?>" size="10" name="credit2" readonly="readonly" />
    	</td>
  	</tr>
  	<tr style="font-size:9pt;">
   		<td></td>
   		<td  height="30" align="center" colspan=2 >Net Bill: </td>
   		<td></td>
    	<td></td>
    	<td width="81"  colspan="1" align="right"><input type="text" style="border:none;font:bold;font-size:9pt;text-align:right;" id="netdebit" class="textarea"  align="right" value="" size="10"  name="netdebit" readonly="readonly" />
    	</td>
    	<td bgcolor="white"></td>
    	<td></td>
  	</tr>
  </table>

  </div>
<!-- 
    <table width="100%" style="border-bottom: 1px solid;" height="100%" align="left" cellpadding="1" cellspacing="1" >
  <tr>
  	<td width="20%" > --><div class="bodytext_bold" style="margin-top:1%;margin-bottom:1%;font-weight:bold;font-size:9pt;font-family:arial;">Select catalog to add services </div>
				<?php 
					foreach ($ward as $key) {
					$name1=$key['wardname'];
					$wardid=$key['wardid'];
					echo '<span id='.$wardid.'  style="padding-left:1%;width:15%;font-weight:bold;font-size:9pt;font-family:arial;"><input type="radio" id='.$wardid.' name="radiobtn" onClick="setwardid(this.id)" style="margin-left:10px;">'.$name1.'</span>';
					}
				?>
		
		<!--  </tr>
    </table> -->
	<hr style="height:1px;background-color:#ecf8fb;border:2px;"/>
             <input type="hidden" id="radiobtnvalue" name="radiobtnvalue" value="">

<!-- 				<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Generate Bill" onclick="dischargePatientinData(document.getElementById('disciohid').value,document.getElementById('disccaseno').value);"/> -->    
				<?php if($dischargedate_c=="" || $dischargedate_c==null ) {?>
					<input type="button" onclick="createbill()" id="createbill" value="Add Services" style="margin:1px;align:top;height:25px;width:100px;"  class="button" />
					<input type="button" onClick="dischargePatient();" id="dischargebtn" value="Final Bill" style="margin:1px;align:top;height:25px;width:100px;"  class="button" />
 					<input type="button" onClick="PrintElem(false);" id="btnprint" value="Provisional Bill" style="margin:1px;align:top;height:25px;width:100px;"  class="button" />
 					<button onClick="creditAccount()" id="btnpayment"  class="button" style="margin-right:1px;;width:80px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Payment</button>
					<input id="backbutton" value="Dashboard" class="button" onclick="window.location.href='/ayushman/ccashierdashboard/view';"  style="height:25px;width:80px;"  align="center"  readonly="readonly"  />
 				<?php }
			else{ ?>
<!-- 					<input type="button" onClick="createbill();" id="createbill" value="Create Bill" style="display:none;margin:1px;align:top;height:25px;width:100px;"  class="button" />
 -->					<input type="button" onClick="dischargePatient();closedialog();" id="dischargebtn" value="Final Bill" style="display:none;margin:1px;align:top;height:25px;width:100px;"  class="button" />
				 	<input type="button" onClick="PrintElem(false);" id="btnprint" value="Provisional Bill" style="display:none;margin:1px;align:top;height:25px;width:100px;"  class="button" />
 					<button onClick="creditAccount()" id="btnpayment"  class="button" style="display:none;margin-right:1px;;width:80px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Payment</button>
				<?php }?>
 			
</div>
			
</form>

<div id="dischargePatient" title="Discharge" style="display: none;">
	<form id="dischargePatient" >
    <div style="margin-left: 23px;">
		<p>
			<br /><br />
			<input type="hidden" id="disciohid" value=""  name="disciohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<input type="hidden" id="disccaseno" value=""  name="disccaseno" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>		
			<label> Date &nbsp;&nbsp;:</label>
			<input id="dischargedate" readonly name="dischargedate"  value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">		
			<br /><br />
		</p>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save" onClick="dischargePatientinData();"/>    
	</div>
	</form>
</div>

<div id="creditPatient" title="Accept Deposit" style="display:none;">
  <form id="creditPatient" > 
    <div style="margin-left: 23px;">
        <p>
            <br /><br />
			<input type="hidden" id="CAiohid" value="<?php echo "$patientsid";?>" name="CAiohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<input type="hidden" id="CAcaseno" value="<?php echo "$refid";?>"  name="CAcaseno" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>		
			
			
			<!--  <label >Case No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			  <select name="regino"  class="text" id="regino" style="margin-left:5px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
                      			  <option><?php echo "$refid";?></option>
                                  <option>Others</option>
                               
                         
              </select></br></br> -->

              <label >Case No  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="regino" readonly="readonly" name="regino" value="<?php echo "$refid";?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
      
      </br></br>
              <label >Receipt Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="creditdate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
			</br></br>
			<label >Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="creditdesc" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			
			</br></br>
			<label >Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="creditamount" name="creditamount" onChange="inWords(this.value);" value="" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
      
      </br></br>
			<label>Mode of Payment&nbsp;&nbsp;:</label>
			  <select name="payment"  class="text" id="payment" onChange="selectMode(this);" style="margin-left:0px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
                              <option value="5">Cash</option>
                                <option value="6">Cheque</option>
                                <option value="1">Card</option>
              </select></br></br>
              <div id="cheqDetail">
			<label >Cheq No.&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="cheqno" name="cheqno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label >Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="cheqdate" readonly name="cheqdate" value="<?php echo date('d M Y'); ?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
			<div id="cardDetail">
			<label >Trx Ref No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="trxrefno" name="trxrefno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
						<input type="hidden" id="wordamt"  value="" name="wordamt" />

			
		</br>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save & Print" onClick="creditPatientinData(document.getElementById('CAiohid').value,document.getElementById('regino').value);showRcpt();"/>
		</br>
		
	</div>
  </form>  
</div>

<input type="hidden" id="header_cashier"  value="<?php echo "$header_cashier";?>" name="header_cashier" />
<input type="hidden" id="footer_cashier"  value="<?php echo "$footer_cashier";?>" name="footer_cashier" />



	<input type="hidden" id="outstanding"  value="<?php echo "$total";?>" name="outstanding" />
	<input type="hidden" id="totaldebit"  value="<?php echo "$totaldebit";?>" name="totaldebit" />
	<input type="hidden" id="totalcredit"  value="<?php echo "$totalcredit";?>" name="totalcredit" />
	<input type="hidden" id="billid"  value="<?php echo "$billid";?>" name="billid" />
	<input type="hidden" id="rcptId"  value="<?php echo "$rcptId";?>" name="rcptId" />
	<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
<input type='hidden' id='removetestid' name='removetestid' />
<input type='hidden' id='wardid' name='wardid' />


