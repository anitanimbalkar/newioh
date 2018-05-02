<html>
<head>
<title>Patient account Summary</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox1.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<style type="text/css">
@media only print
{	
	#btnprint {display: none !important; 
	}
	#ipdbill {display: none !important; 
	}
	#btnsave {display: none !important; 
	}
}
</style>
<script type="text/javascript">

	$(document).ready(function() {
		
		$("#cheqDetail").hide();
		$("#cardDetail").hide();
		$("#adcheqDetail").hide();
		$("#adcardDetail").hide();
	$(function() {
			$( "#admitdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#creditdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#dischargedate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#cheqdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#chequedate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	// $(function() {
	// 				afterClose(){
	// 				window.location.reload();
	// 			}
					//});

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


	function PrintElem(patientsid)
    {
    	var patientsid=document.getElementById('patientsid').value;
        // Popup($(elem).html());
        // convertAndsavePDf();
        window.openDialog('/ayushman/cipdbills/printipdbill?patientsid='+patientsid);
        document.getElementById('patientsid').value=patientsid;
	//alert(patientsid);
        //parent.openDialog("/ayushman/vadvancedepositebill, '900','1024px');

    }

    

	function creditAccount(patId,patName){
		var patId=document.getElementById("patId").value;
		var patName=document.getElementById("patName").value;
		document.getElementById("CAiohid").value=patId;
		document.getElementById("creditamount").value='';
		document.getElementById("creditdesc").value='';
	
		$("#creditPatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		closeOnEscape: true, 
		position: ['center', 'center'],
		title: ' Credit  --- '+patName,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		 

		});
				//alert(patId);
	
}



function creditPatientinData(patId,caseno){
	var CAdate=document.getElementById("creditdate").value;
	var CAamount=document.getElementById("creditamount").value;
	var CAdesc=document.getElementById("creditdesc").value
	var cheqno=document.getElementById("cheqno").value;
	var cheqdate=document.getElementById("cheqdate").value;
	var trxrefno=document.getElementById("trxrefno").value
	var payment=document.getElementById("payment").value
	
		 if((caseno=="" || caseno=="select")  && CAdesc=="" && CAdate == "" && CAamount == "" && cheqno == "" && trxrefno == "" )
		{
			$("#regino").focus();
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
				// alert("Account Credited");
                     showNotification('300','20','Save data','Account Credited.','notification','timernotification',2000);

				$("#creditPatient").dialog( "close" );	

        		}           
        	}); 
				$("#creditPatient").dialog( "close" );	
				//window.location.reload();
				
		}	
	
}


function admitPatient(patId,patName)
	{	

				var patId=document.getElementById("patId").value;
		var patName=document.getElementById("patName").value;
		var caseno=document.getElementById("adcaseno").value;

		document.getElementById("iohid").value=patId;
		document.getElementById("admitdate").value=$.datepicker.formatDate('dd M yy', new Date());
		document.getElementById("depositamount").value='';
		document.getElementById("caseno").value='';
		
		$("#admitPatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: 'Admit  --- '+patName,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		});
	
}
function admitPatientinData(patId){
	var adate=document.getElementById("admitdate").value;
	var damount=document.getElementById("depositamount").value;
	var cno = document.getElementById("adcaseno").value;
	var cheqno=document.getElementById("chequeno").value;
	var cheqdate=document.getElementById("chequedate").value;
	var trxrefno=document.getElementById("cardrefno").value;
	var CAdesc=document.getElementById("admitdesc").value;
	var payment=document.getElementById("modofpayment").value;


		if(cno=="" || adate == "" || damount == "" || cno == ""){
			$("#depositamount").focus();
			return false;
		}

			else if(adate == "" || damount == "" )
		{
			$("#depositamount").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			$("#cardrefno").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			$("#chequeno").focus();
			return false;
		}
		else if(payment==5 && (adate == "" || damount == "" ) )
		{
			$("#depositamount").focus();
			return false;
		}
		else{
			$.ajax({
				url: "/ayushman/ccashier/admitPatient/get?IOHid="+patId+"&admitdate="+adate+"&depositamount="+damount+"&adcaseno="+cno+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno,
				success: function(data) {
                showNotification('300','20','Save data','Patient Admitted','notification','timernotification',2000);
				$("#admitPatient").dialog( "close" );
				//window.location.reload();
				 
			}
        }); 
				$("#admitPatient").dialog( "close" );
				// Again clear screen and refresh screen
				}
}

	function services(billno,billcaseno,rcptcaseno,rcptno,patId,rcptpdffilename,transtype,billpdffilename,pdftype,statementcode,accountuserid)
	{
		var caseno=document.getElementById("caseno").value;
		var bednumber=document.getElementById("bednumber").value;
		if(billno=="Running" && pdftype=='BILL')
			{
				parent.openDialog('/ayushman/cipdbills/viewbill/get?id='+patId+'&caseno='+caseno+'&bednumber='+bednumber,850,2000,"onclose=true");
				//onclose();
			}
			//
			else if( billno!="-" && billpdffilename!=null && billpdffilename!= "" && pdftype=='BILL') {
				//alert("hello");
				window.open('/ayushman/files/Documents/'+billpdffilename);
				window.location.reload();

			}
			else if( rcptno!="-" && rcptpdffilename!=null &&  rcptpdffilename!="" && pdftype=='RCPT'){
				//alert("hello");
				window.open('/ayushman/files/Documents/'+rcptpdffilename);
				window.location.reload();

			}
			else if(transtype=="OPD" && (billpdffilename==null || billpdffilename=="")&& pdftype=='BILL'){
				 		parent.openDialog('/ayushman/cipdbills/getbilldata/get?id='+patId+'&billno='+billno+'&statementcode='+statementcode+'&accountuserid='+accountuserid,850,800);
				 						window.location.reload();

			}
			// else if(transtype=="OPD" && pdffilename!=null){
			// 	window.open('/ayushman/files/Documents/'+pdffilename);
			// 	window.location.reload();

			// }
			else if(rcptpdffilename=="" || rcptpdffilename==null || billpdffilename=="" || billpdffilename==null){
				alert("PDF is not available");
				window.location.reload();

			}

			else{
				//alert("hiiiii");
				parent.openDialog('/ayushman/cipdbills/viewbill/get?id='+patId+'&caseno='+caseno,850,2000);
				// return '<a href=/ayushman/cipdbills/viewbill?id='+patId+'><font color="blue">'+billno+ '</font></a> ';
			}

	}

	function showopd(patId,billno,statementcode,accountuserid)
	{

		parent.openDialog('/ayushman/cipdbills/getbilldata/get?id='+patId+'&billno='+billno+'&statementcode='+statementcode+'&accountuserid='+accountuserid,850,800);

	}



function showtotal()
{
		var locale='en-IN';
		var options={style:'currency',currency:'inr',minimunFractionDigits:2,maximumFractionDigits:2};
		var totalcredit=parseInt(document.getElementById("totalcredit").value);
           var totaldebit=parseInt(document.getElementById("totaldebit").value);
           var Balance=parseInt(totalcredit)-parseInt(totaldebit);
         // Balance.replace(/(\d)(?=(\d\d)+\d$)/g, "$1,");
         var formatter=new Intl.NumberFormat(locale);
         var amt=formatter.format(Balance);
         var creditamt=formatter.format(totalcredit);
         var debitamt=formatter.format(totaldebit);

           document.getElementById("debit1").value=debitamt;
		document.getElementById("credit1").value=creditamt;
		document.getElementById("accbalance").value=amt;
			
}
 $(window).load(function () {
            // run code
            showtotal();
        });

 function validatecaseno(caseno){

 	$.ajax({
				url: "/ayushman/ccashier/casevalidation/get?caseno="+caseno,
				success: function(data) {
				alert(data);
				 
				}
			
        }); 
 }


  function showRcpt(caseno)
    {
    	   	//var caseno=document.getElementById("caseno").value;
		    var header_cashier=document.getElementById("header_cashier").value;
    		var patId=document.getElementById("patId").value;
    		var CAamount=document.getElementById("creditamount").value;
    		var CAdate=document.getElementById("creditdate").value;
		    var rcptId=document.getElementById("rcptId").value;
			var patName=document.getElementById("patName").value;
			var hospitalid=document.getElementById("hospitalid").value;
			var footer_cashier=document.getElementById("footer_cashier").value;
			var cheqno=document.getElementById("cheqno").value;
			var cheqdate=document.getElementById("cheqdate").value;
			var trxrefno=document.getElementById("trxrefno").value;
			var CAdesc=document.getElementById("creditdesc").value;
			var payment=document.getElementById("payment").value;
			var wordamt=document.getElementById("wordamt").value;

		 if((caseno=="" || caseno=="select") && CAdesc=="" && CAamount == "" && cheqno == "" && trxrefno == "" )
		{			
			window.alert("Please Select Value");
			$("#regino").focus();
			return false;
		}
		else if(CAdate == "" || CAamount == "" )
		{
			window.alert("Please enter values");
			$("#creditdate").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			window.alert('Please transaction number');
			$("#payment").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			window.alert('Please enter values');
			$("#payment").focus();
			return false;
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			window.alert('Please enter values');
			$("#payment").focus();
			return false;
		}
			else
			{

    			
    	 window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment+"&wordamt="+wordamt,800,400);
         //window.location.reload(true);
     		}
     }


  function showadmitRcpt(caseno)
    {
    		var CAamount=document.getElementById("depositamount").value;
    		var CAdate=document.getElementById("admitdate").value;
		    var rcptId=document.getElementById("rcptId").value;
			var patName=document.getElementById("patName").value;
    	    var patId=document.getElementById("patId").value;
			var hospitalid=document.getElementById("hospitalid").value;
			var header_cashier=document.getElementById("header_cashier").value;
    		var footer_cashier=document.getElementById("footer_cashier").value;
    		var cheqno=document.getElementById("chequeno").value;
			var cheqdate=document.getElementById("chequedate").value;
			var trxrefno=document.getElementById("cardrefno").value;
			var CAdesc=document.getElementById("admitdesc").value;
			var payment=document.getElementById("modofpayment").value;
			var wordamt=document.getElementById("adwordamt").value;

		 if(caseno=="" && CAdesc=="" && CAamount == "" && cheqno == "" && trxrefno == "" )
		{			
			window.alert("Please Select Value");
			$("#adcaseno").focus();
			return false;
		}
		else if(CAdate == "" || CAamount == "" )
		{
			window.alert("Please enter values");
			$("#depositamount").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			window.alert('Please transaction number');
			$("#cardrefno").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			window.alert('Please enter values');
			$("#chequeno").focus();
			return false;
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			window.alert('Please enter values');
			$("#depositamount").focus();
			return false;
		}
		

    		window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment+"&wordamt="+wordamt,800,400);

    	 //window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier,800,400);
         //window.location.reload(true);
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

 function selectModeofpayment(s){
    	    		var select=document.getElementById("modofpayment").value;
    	    		var selectedOption=s[s.selectedIndex].value;
    	    		if(selectedOption==6)
    	    		{
    	    			$("#adcheqDetail").show();
    	    			$("#adcardDetail").hide();
    	    		}
    	    		 else if(selectedOption==1)
    	    		{
    	    			$("#adcardDetail").show();
    	    			$("#adcheqDetail").hide();
    	    		}
    	    		else{
    	    			$("#cheqDetail").hide();
    	    			$("#cardDetail").hide();
    	    		}
    	    		
    }

    function onclose(){
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
 	   str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
 	    str += (n[5] == 0) && ((n[1] != 0)||(n[2] != 0)||(n[3] != 0)||(n[4] != 0)) ? 'Only' : '';
 	    //return str;
 	   document.getElementById("wordamt").value=str;
 	  // alert(document.getElementById("totalamt").value);
	}
	 function inWords1(num) {
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
 	   document.getElementById("adwordamt").value=str;
 	  // alert(document.getElementById("totalamt").value);
	}

function allocateward()
{
		var patId=document.getElementById("patId").value;
		var patName=document.getElementById("patName").value;
		var hospitalid=document.getElementById("hospitalid").value;


	//alert(patName);
	parent.openDialog('/ayushman/cipdwarddetail/wardlist?patId='+patId+'&patName='+patName+'&hospitalid='+hospitalid,800,1000);

	// return '<a onclick="getcontent('/ayushman/cipdwarddetail/wardlist');" href="javascript:void(0);">Admitted Patients</a>'; 

}
</script>
</head>
<body  bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:100%;height:auto; overflow-x:hidden;" id="ipdbill"> 
	 <input name="hospitalid" id="hospitalid" class="textarea" type="hidden" value="<?php echo "$hospitalid"; ?>" size="8"/>

	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%" style="font-size:hidden;" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Patient Account Summary</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

<div id="registedUser"  >
  <table width="100%" class = "table_roundBorder" id="patientsearchform" style="width:97%;margin-top:5px;margin-left:10px">
    <input id = "patId" name="patId" value="<?php echo "$id"; ?>" type="hidden" >
    <input id = "patName" name="patName" value="<?php echo "$patientname"; ?>" type="hidden" >
    <input id = "caseno" name="caseno" value="<?php echo "$caseno"; ?>" type="hidden" >
    <tr>
    <tr>
      <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Patient Name :</label>                           
              
               <label id="lblregdnumber" style="font-size:9pt;font-family:arial;margin-left:10px;font-weight:bold;">
                                 <?php echo "$patientname";?>
                              </label>         
                            </td>
      <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Age:</label>                           
							
							 <label id="lblregdnumber" style="font-size:9pt;font-family:arial;margin-left:10px;font-weight:bold;">
                                 <?php echo "$age";?>
                                </label>         
                              </td>
     
                              <td width="60%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font-weight:bold;font-size:9pt;font-family:arial;">Gender:</label>
                                <label id="lblregdnumber" style="font-size:9pt;font-family:arial;margin-left:10px;font-weight:bold;">
                               <?php echo "$gender";?>
                                </label>                        
                                      </td>
                             
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Mobile No:</label>                           
              
               <label id="lblregdnumber" style="font-size:9pt;font-family:arial;margin-left:10px;font-weight:bold;">
                                 <?php echo "$mobileno1";?>
                                </label>         
                              </td>
    </tr>
    <tr>
        
                            <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Reg No : :</label>                           
              
               <label id="lblregdnumber" style="font-size:9pt;font-family:arial;margin-left:10px;font-weight:bold;">
                                 <?php echo "$id";?>
                                </label>         
                              </td>
       <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Total charges :</label>                           
           <input onChange="showtotal()" name="debit1" id="debit1" readonly="readonly"  type="text" class="textarea" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;margin-left:30;padding-right:20px;border:none;" value="" size="8"/>
       </td>
	   <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Total Payment :</label>                           
           <input  name="credit1" id="credit1" type="text" readonly="readonly" class="textarea" onload="showtotal()" value="" size="8" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;border:none; "/>
	   </td>
	   <td width="40%" style="height:auto;width:20%;vertical-align:top"><label class="bodytext_bold" style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Account Balance :</label>                           
           <input  name="accbalance" id="accbalance" type="text" readonly="readonly" class="textarea" onload="showtotal()" value="" size="8" style="font-family:arial;font-weight:bold;font:bold;font-size:9pt;align:middle;border:none; "/>
       </td>
    </tr>
  </table>
</div>
<div style="width:100%;margin-top:10px;height:100%;">
<table width="100%" height="100%" align="left" cellpadding="0" cellspacing="0" >
	<tr>
		<td>
			<div id="registedUser"  >
			<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
			<tr>
			<td height="30" colspan="4" align="left" valign="middle"  style="border-top:1px solid #a8c8d9; padding-right:10px;">
				<button onClick="creditAccount(patId,patName);"  class="button" style="margin-right:4px;width:100px;height:25px;line-height:23px;text-align:center;float:left;text-decoration:none;" />Payment</button>
 				<a href="<?= $referer;?>"><input id="backbutton" value="Back" class="button"   style="height:25px;width:80px;"  align="center"  readonly="readonly"  />

					<?php if($status=="discharged" || $status==null || $status=="" || $status=="Reserved") {?>
<!-- 			<button onClick="admitPatient(patId,patName);"  class="button" id = "btn2" name = "btn2" style="margin-left:5px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Admit</button>
 -->			<!-- <button onClick="allocateward();"  class="button" id = "btn3" name = "btn3" style="margin-left:5px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Admit</button>
 -->
			<?php }
			else{ ?>
			<button  class="button" id = "btn2" name = "btn2" style="margin-left:5px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;display:none" />Admit</button>

		<?php }?>
		</td>
       
    </tr>
   </table>
</div>


					</td>


				</tr>


			<tr>
				<td>
				<div style="max-height:100%" class="bodytext_normal">
					<table id = "searchguide" style="width:100%;height:100%;display:block">
						<tr class="Heading_Bg">
							<td width="160" align="middle">Date</td>
							<td width="160" align="middle">Type of Service</td>
							<td width="170" align="middle">Bill No</td>
							<td width="160" align="middle">Charges(Rs.)</td>
							<td width="160" align="middle">Receipt No</td>
							<td width="160" align="middle">Total Payment(Rs.)</td>
							<!-- <td width="160" align="middle">Balance</td>
 -->
						</tr>
				
			<tr>
				<td>
					
						    <?php $i=0;
						    $total=0;
						    $totalcredit=0;
						    $totaldebit=0;
						    	$rcptId = rcpttransaction::getLatestRcptId($hospitalid);

							    $result = $result;
							    $debitvalue=$result[$i][6];
									$creditvalue=$result[$i][8];
									$billno="'".$result[$i][5]."'";
									$billcaseno="'".$result[$i][1]."'";
									$rcptcaseno="'".$result[$i][2]."'";
									$rcptno="'".$result[$i][7]."'";
									$patId=$result[$i][0];
									$transtype="'".$result[$i][4]."'";
									$rcptpdffilename="'".$result[$i][9]."'";
									$statementcode="'".$result[$i][10]."'";
									$accountuserid="'".$result[$i][11]."'";
									$billpdffilename="'".$result[$i][12]."'";
									$bedid="'".$result[$i][13]."'";
							    if(count($result) == 0){
							    	$debitvalue=null;
									$creditvalue=null;
									$billno=null;
									$billcaseno=null;
									$rcptcaseno=null;
									$rcptno=null;
									$patId=null;
									$transtype=null;
									$rcptpdffilename=null;
									$statementcode=null;
									$accountuserid=null;
									$billpdffilename=null;
									$bedid=null;


								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=1;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr>";
									  }
									$debitvalue=$result[$i][6];
									$creditvalue=$result[$i][8];
									$billno="'".$result[$i][5]."'";
									$billcaseno="'".$result[$i][1]."'";
									$rcptcaseno="'".$result[$i][2]."'";
									$rcptno="'".$result[$i][7]."'";
									$patId=$result[$i][0];
									$transtype="'".$result[$i][4]."'";
									$rcptpdffilename="'".$result[$i][9]."'";
									$statementcode="'".$result[$i][10]."'";
									$accountuserid="'".$result[$i][11]."'";
									$billpdffilename="'".$result[$i][12]."'";

									$bedid="'".$result[$i][13]."'";
									if($bedid==null){
										$bedid=null;
									}
									else
									{
										$bedid="'".$result[$i][13]."'";

									}
									$bill ="'BILL'";
									$rcpt ="'RCPT'";


									  echo '<td width="155" align="middle">'.$result[$i][3].'</td>
										<td width="160" align="left">'.$result[$i][4].'</td>
										<td width="160" align="left"><a href="" onClick="services('.$billno.','.$billcaseno.','.$rcptcaseno.','.$rcptno.','.$patId.','.$rcptpdffilename.','.$transtype.','.$billpdffilename.','.$bill.','.$statementcode.','.$accountuserid.');"><font color="blue">'.$result[$i][5].'</font></a></td>
										<td width="162" align="right">'.$result[$i][6].'</td>
										<td width="165" align="center"><a href="" onClick="services('.$billno.','.$billcaseno.','.$rcptcaseno.','.$rcptno.','.$patId.','.$rcptpdffilename.','.$transtype.','.$billpdffilename.','.$rcpt.','.$statementcode.','.$accountuserid.');"><font color="blue">'.$result[$i][7].'</font></a></td>
										<td width="158" align="right">'.$result[$i][8].'</td>';
									 
											
									  echo "</tr>";

									  
		(double)$creditvalue=(double)($creditvalue);
		
(double)$totalcredit=(double)$totalcredit+(double)$creditvalue;
		(double)$debitvalue=(double)($debitvalue);

		(double)$totaldebit=(double)$totaldebit+(double)$debitvalue;

	
		
								  }
							    }
							   						    ?>
							</td>
						</tr>
						
							<tr style="font-size:9pt;">
    <td width="160"  height="30" align="right" colspan=3 >Total: </td>
    <td width="160"  colspan="1" align="right">
    	<input   name="totaldebit" id="totaldebit" type="text" readonly="readonly" class="textarea"  value="<?php echo number_format((float)$totaldebit,2,'.','');?>" size="8" style="border:none;text-align:right;font-family:arial;font-size:9pt; "/>

    </td>
    <td></td>

    <td width="160"  colspan=1 align="right"> 
<input name="totalcredit" id="totalcredit"  style="font-family:arial;font:bold;font-size:9pt;text-align:right;border:none;" readonly="readonly"  class="textarea" type="text" value="<?php echo number_format((float)$totalcredit,2,'.','');?>" size="8"/>

    </td>
  </tr>
						

					    </table>
				    </div>

								
							
	<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px;">
			<tr>
		<td height="30"  align="left" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
			<button onClick="creditAccount(patId,patName)"  class="button" id = "btn1" name = "btn1" style="margin-right:4px;width:100px;height:25px;line-height:23px;text-align:center;float:left;text-decoration:none;" />Payment</button>
			<a href="<?= $referer;?>"><input id="backbutton" value="Back" class="button"   style="height:25px;width:80px;"  align="center"  readonly="readonly"  />

			<?php if($status=="discharged" || $status==null || $status=="" || $status=="Reserved") {?>
<!-- 						<button onClick="admitPatient(patId,patName)"  class="button" id = "btn2" name = "btn2" style="margin-left:2px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Admit</button>
 -->		<!-- <button onClick="allocateward();"  class="button" id = "btn3" name = "btn3" style="margin-left:5px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;" />Admit</button>
 -->
			<?php }
			else{ ?>
			<button  class="button" id = "btn2" name = "btn2" style="margin-left:5px;width:130px; height:25px; line-height:23px; text-align:center; float:left; text-decoration:none;display:none" />Admit</button>

		<?php }?>       </tr>

	</table>

	

	<div id="creditPatient" title="Accept Deposit" style="display:none;">
  <form id="creditPatient" > 
    <div style="margin-left: 23px;">
        <p>
            <br /><br />
			<input type="hidden" id="CAiohid" value="<?php echo "$id";?>" name="CAiohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<input type="hidden" id="CAcaseno" value="<?php echo "$caseno";?>"  name="CAcaseno" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>		
			
			
			 <label >Case No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			  <select name="regino"  class="text" id="regino" style="margin-left:5px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
                      			  <option><?php echo "$caseno";?></option>
                                  <option value="OTHER0000000000">Others</option>
                               
                         
              </select></br></br>
              <label >Receipt Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="creditdate" name="creditdate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
			</br></br>
			<label >Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="creditdesc" name="creditdesc" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			
			</br></br>
			<label >Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="creditamount" name="creditamount" onChange="inWords(this.value);" value="" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
      
      </br></br>
			<label>Mode of Payment&nbsp;&nbsp;:</label>
			  <select name="payment"  class="text" id="payment" onchange="selectMode(this);" style="margin-left:0px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
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
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save & Print" onClick="creditPatientinData(document.getElementById('CAiohid').value,document.getElementById('regino').value);showRcpt(document.getElementById('regino').value);"/>
		</br>
		
	</div>
  </form>  
</div>

<div id="dischargePatient" title="Discharge" style="display: none;">
	<form id="dischargePatient" >
    <div style="margin-left: 23px;">
		<p>
			<br /><br />
			<input type="hidden" id="disciohid"  name="disciohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<input type="hidden" id="disccaseno"  name="disccaseno" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>		
			<label> Date &nbsp;&nbsp;:</label>
			<input id="dischargedate" name="dischargedate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">		
			<br /><br />
		</p>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save" onClick="dischargePatientinData(document.getElementById('disciohid').value,document.getElementById('disccaseno').value);"/>    
	</div>
	</form>
</div>
<div id="admitPatient" title="Admit" style="display: none;">
  <form id="admitPatient" >
    <div style="margin-left: 23px;">
        <p>
            <br /><br />
			<input type="hidden" id="iohid"   name="iohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<label>Case No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :</label>			
			<input id="adcaseno" name="adcaseno" onChange="validatecaseno(document.getElementById('adcaseno').value);" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   			
			</br></br>
			<label>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="admitdate" name="admitdate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
			</br></br>
			<label >Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="admitdesc" name="admitdesc" style="margin-left:10px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label>Deposit &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :</label>
			<input id="depositamount" name="depositamount" onChange="inWords1(this.value);" type="Number"style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
        </p>
				
			<label>Mode of Payment&nbsp;&nbsp;:</label>
			  <select name="modofpayment"  class="text" id="modofpayment" onchange="selectModeofpayment(this);" style="margin-left:5px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
                                <option value="5">Cash</option>
                                <option value="6">Cheque</option>
                                <option value="1">Card</option>
                                
              </select></br></br>
              <div id="adcheqDetail">
			<label >Cheq No.&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="chequeno" name="chequeno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label >Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="chequedate" readonly name="chequedate" value="<?php echo date('d M Y'); ?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
			<div id="adcardDetail">
			<label >Trx Ref No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="cardrefno" name="cardrefno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
						<input type="hidden" id="adwordamt"  value="" name="adwordamt" />

			
		</br>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save" onClick="admitPatientinData(document.getElementById('iohid').value);showadmitRcpt(document.getElementById('adcaseno').value);"/>
	</div>
  </form>  
</div>	


	<input type="hidden" id="rcptId"  value="<?php echo "$rcptId";?>" name="rcptId" />
<input type="hidden" id="header_cashier"  value="<?php echo "$header_cashier";?>" name="header_cashier" />
<input type="hidden" id="footer_cashier"  value="<?php echo "$footer_cashier";?>" name="footer_cashier" />
	 <input name="bednumber" id="bednumber" class="textarea" type="hidden" value="<?php echo "$bedid"; ?>" size="8"/>





