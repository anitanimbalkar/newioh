<head>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
	<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
	<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" >
	<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
	<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>



<script type="text/javascript">
	$(document).ready(function() {
		var amt=parseInt(document.getElementById('totalamt').value);
		inWords(amt);
		var rcptamt=parseInt(document.getElementById('totalrcpt').value);
		inWords1(rcptamt);
		});
	$(function() {
		$( "#chequedate_c" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
	});
	
	$(function() {
		$( "#rcptdate_c" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
	});
function setvalueAttr(itemname,itemvalue)	
{
	document.getElementById(itemname).setAttribute("value",itemvalue);
}

function setvalue(itemvalue)
	{
		document.getElementById('totalrcpt').value = parseFloat(itemvalue).toFixed(2);
		document.getElementById("totalrcpt").setAttribute("value",parseFloat(itemvalue).toFixed(2));
 	   
		//var amt=parseInt(document.getElementById('totalrcpt').value);
		inWords1(itemvalue);
	
   	}
   	function setdescription(itemvalue)
	{
		document.getElementById('diagnosis').value = itemvalue;

   	}
	function selectMode(s)
	{
    	//var select=document.getElementById("payment").value;
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
    	else
		{
    		$("#cheqDetail").hide();
    		$("#cardDetail").hide();
    	}
	}
	function openPayment(){
		$("#creditPatient").dialog({
		modal: false,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: ' Credit  --- ',
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx'
		});
		$("#creditPatient").show();
		var modeofpayment=document.getElementById("payment").value
			if(modeofpayment==1)
			{
				$("#cheqDetail").hide();
				$("#cardDetail").show();
			}
			else if(modeofpayment==6)
			{
				$("#cheqDetail").show();
				$("#cardDetail").hide();
			}
			else
			{
				$("#cheqDetail").hide();
				$("#cardDetail").hide();
			}
	}
	
	function PrintElem(elem)
    {
		if (document.getElementById("withoutsignChk").checked)
			$("#signaturediv").hide();
		else
			$("#signaturediv").show();
		
		if (document.getElementById("withoutheaderChk").checked)
		{
			$("#systemheader1").hide();
			$("#uploadedheader1").hide();	
			//$("#uploadedfooter").hide();				
		}
		else
		{
			if (document.getElementById("sysHFflag").value== 1)
			{
				$("#systemheader1").show();	
				$("#uploadedheader1").hide();
				//$("#uploadedfooter").hide();	
			}
			else
			{
				$("#systemheader1").hide();
				$("#uploadedheader1").show();
				//$("#uploadedfooter").show();
				//document.getElementById("uploadedfooter").setAttribute("position","absolute");
				//document.getElementById("uploadedfooter").setAttribute("bottom","0%");
				// Dont show footer ... not appearing at the bottom of every page
			}			
		}
		if($(document).find(document.getElementById("quantity1_c")).length != 0)
		{
			if((document.getElementById("quantity1_c")).value == 0)
				$("#divcharge1").hide();
		}
		if($(document).find(document.getElementById("quantity4_c")).length != 0)
		{
			if((document.getElementById("quantity4_c")).value == 0)
				$("#divcharge4").hide();
		}
		if($(document).find(document.getElementById("quantity5_c")).length != 0)
		{
			if((document.getElementById("quantity5_c")).value == 0)
				$("#divcharge5").hide();
		}
		if($(document).find(document.getElementById("quantity6_c")).length != 0)
		{
			if((document.getElementById("quantity6_c")).value == 0)
				$("#divcharge6").hide();
		}
		if($(document).find(document.getElementById("quantity7_c")).length != 0)
		{
			if((document.getElementById("quantity7_c")).value == 0)
				$("#divcharge7").hide();
		}
		if($(document).find(document.getElementById("quantity8_c")).length != 0)
		{
			if((document.getElementById("quantity8_c")).value == 0)
				$("#divcharge8").hide();
		}
		if($(document).find(document.getElementById("quantity9_c")).length != 0)
		{
			if((document.getElementById("quantity9_c")).value == 0)
				$("#divcharge9").hide();
		}
		if($(document).find(document.getElementById("quantity10_c")).length != 0)
		{
			if((document.getElementById("quantity10_c")).value == 0)
				$("#divcharge10").hide();
		}
		if($(document).find(document.getElementById("quantity11_c")).length != 0)
		{
			if((document.getElementById("quantity11_c")).value == 0)
				$("#divcharge11").hide();
		}
		if($(document).find(document.getElementById("quantity12_c")).length != 0)
		{
			if((document.getElementById("quantity12_c")).value == 0)
				$("#divcharge12").hide();
		}
		if($(document).find(document.getElementById("quantity13_c")).length != 0)
		{
			if((document.getElementById("quantity13_c")).value == 0)
				$("#divcharge13").hide();
		}
		if($(document).find(document.getElementById("quantity14_c")).length != 0)
		{
			if((document.getElementById("quantity14_c")).value == 0)
				$("#divcharge14").hide();
		}
		if($(document).find(document.getElementById("quantity15_c")).length != 0)
		{
			if((document.getElementById("quantity15_c")).value == 0)
				$("#divcharge15").hide();
		}
		if($(document).find(document.getElementById("quantity16_c")).length != 0)
		{
			if((document.getElementById("quantity16_c")).value == 0)
				$("#divcharge16").hide();
		}
		if($(document).find(document.getElementById("quantity17_c")).length != 0)
		{
			if((document.getElementById("quantity17_c")).value == 0)
				$("#divcharge17").hide();
		}
		if($(document).find(document.getElementById("quantity18_c")).length != 0)
		{
			if((document.getElementById("quantity18_c")).value == 0)
				$("#divcharge18").hide();
		}
		if($(document).find(document.getElementById("quantity19_c")).length != 0)
		{
			if((document.getElementById("quantity19_c")).value == 0)
				$("#divcharge19").hide();
		}
		if($(document).find(document.getElementById("quantity20_c")).length != 0)
		{
			if((document.getElementById("quantity20_c")).value == 0)
				$("#divcharge20").hide();
		}
		if($(document).find(document.getElementById("quantity21_c")).length != 0)
		{
			if((document.getElementById("quantity21_c")).value == 0)
				$("#divcharge21").hide();
		}
		if($(document).find(document.getElementById("quantity22_c")).length != 0)
		{
			if((document.getElementById("quantity22_c")).value == 0)
				$("#divcharge22").hide();
		}
		if($(document).find(document.getElementById("quantity23_c")).length != 0)
		{
			if((document.getElementById("quantity23_c")).value == 0)
				$("#divcharge23").hide();
		}
		if($(document).find(document.getElementById("quantity24_c")).length != 0)
		{
			if((document.getElementById("quantity24_c")).value == 0)
				$("#divcharge24").hide();
		}
		if($(document).find(document.getElementById("quantity25_c")).length != 0)
		{
			if((document.getElementById("quantity25_c")).value == 0)
				$("#divcharge25").hide();
		}
		
		var patId =document.getElementById("patId").value;
		
		$.ajax({
					type: "post",
					url: "/ayushman/cbill/save2",
					data: $("#billform").serialize(),
					async: false,
					error:
							function(){
								showMessage('250','50','Send Data to patient','Error occured while saving bill. Please contact your system administrator.','error','id');
					}
				});
		creditPatientinData(patId);
		convertAndsavePDf();
        Popup($(elem).html());
		//showRcpt();
		parent.location.reload(true);
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'print', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
	
	function convertAndsavePDf(){
	var caseno=null;
	var doctoruserid=document.getElementById("hospitalid").value;
	var billid=document.getElementById("billid").value;
	var pid =document.getElementById("patId").value;
		elm = $("#printprescription").clone(true, true);
		var htmlfile={htmlfile:elm.html(),patientuserid:pid,doctoruserid:doctoruserid,caseno:caseno,billid:billid};
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

	function creditPatientinData(patId){
		//alert(patId);
	var CAdate=document.getElementById("creditdate").value;
	var CAamount=document.getElementById("creditamount").value;
	var CAdesc=document.getElementById("creditdesc").value;
	var cheqno=document.getElementById("cheqno").value;
	var cheqdate=document.getElementById("cheqdate").value;
	var trxrefno=document.getElementById("trxrefno").value;
	var payment=document.getElementById("payment").value;
	var accountuserid=document.getElementById("hospitalid").value;
	var rcptId=document.getElementById("rcptid").value;
	var caseno=null;


		if(CAdate == "" || CAamount == "" )
		{
			return(window.alert("Please enter values"));
		}
		else if (payment==1 && trxrefno=="") 
		{
			return (window.alert('Please transaction number'));
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			return (window.alert('Please enter values'));
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			return (window.alert('Please enter values'));
		}
			
		else
		{
			$.ajax({
				url: "/ayushman/ccashier/creditOPDAccount/get?id="+patId+"&creditdate="+CAdate+"&caseno="+caseno+"&creditamount="+CAamount+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&accountuserid="+accountuserid+'&rcptId='+rcptId,
				success: function(data) {
					$("#creditPatient").dialog( "close" );	
					}           
			}); 
			$("#creditPatient").dialog( "close" );					
	}	
	
}

function showRcpt()
    {
    	   	var caseno=null;
		    var header_cashier=document.getElementById("uploadedheader").value;
    		var patId=document.getElementById("patId").value;
    		var CAamount=document.getElementById("creditamount").value;
    		var CAdate=document.getElementById("creditdate").value;
		    var rcptId=document.getElementById("rcptid").value;
			var patName=document.getElementById("patname").value;
			var hospitalid=document.getElementById("hospitalid").value;
			var footer_cashier=document.getElementById("uploadedfooter1").value;
			var cheqno=document.getElementById("cheqno").value;
			var cheqdate=document.getElementById("cheqdate").value;
			var trxrefno=document.getElementById("trxrefno").value;
			var CAdesc=document.getElementById("creditdesc").value;
			var payment=document.getElementById("payment").value;
			var wordamt=document.getElementById("rcptamtinwords").value;


	
		if(CAdate == "" || CAamount == "" )
		{
			window.alert("Please enter values");
		}
		else if (payment==1 && trxrefno=="") 
		{
			return (window.alert('Please transaction number'));
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			return (window.alert('Please enter values'));
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			return (window.alert('Please enter values'));
		}
			
		else
		{
    		
    	 parent.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment+"&wordamt="+wordamt,800,400);
         //window.location.reload(true);
     	}
     }


    function inWords(num) {
	
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

 	   //alert(str);
 	   document.getElementById("amtinwords").value=str;
	   document.getElementById("amtinwords").setAttribute("value",str);
 	    
 	    //document.getElementById("wordamt").value=str;

	}

	function inWords1(num) {
	
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

 	   //alert(str);
 	   document.getElementById("rcptamtinwords").value=str;
	   document.getElementById("rcptamtinwords").setAttribute("value",str);
 		   
 	    //document.getElementById("wordamt").value=str;

	}
	
	function addSum()
	{
		var itemvalue = 0 ;
		if($(document).find(document.getElementById("label1_c")).length != 0)
			{document.getElementById("charge1_c").setAttribute("value",parseFloat(document.getElementById("rate1").value * document.getElementById("quantity1_c").value).toFixed(2));
				itemvalue = itemvalue + parseInt((document.getElementById("charge1_c").value)); }
		if($(document).find(document.getElementById("label4_c")).length != 0)
			{document.getElementById("charge4_c").setAttribute("value",parseFloat(document.getElementById("rate4").value * document.getElementById("quantity4_c").value).toFixed(2));
				itemvalue = itemvalue+ parseInt((document.getElementById("charge4_c").value));}
		if($(document).find(document.getElementById("label5_c")).length != 0)
			{document.getElementById("charge5_c").setAttribute("value", parseFloat(document.getElementById("rate5").value * document.getElementById("quantity5_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge5_c").value));}		
		if($(document).find(document.getElementById("label6_c")).length != 0)
			{document.getElementById("charge6_c").setAttribute("value", parseFloat(document.getElementById("rate6").value * document.getElementById("quantity6_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge6_c").value));}
		if($(document).find(document.getElementById("label7_c")).length != 0)
			{document.getElementById("charge7_c").setAttribute("value", parseFloat(document.getElementById("rate7").value * document.getElementById("quantity7_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge7_c").value));}
		if($(document).find(document.getElementById("label8_c")).length != 0)
			{document.getElementById("charge8_c").setAttribute("value", parseFloat(document.getElementById("rate8").value * document.getElementById("quantity8_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge8_c").value));}
		if($(document).find(document.getElementById("label9_c")).length != 0)
			{document.getElementById("charge9_c").setAttribute("value", parseFloat(document.getElementById("rate9").value * document.getElementById("quantity9_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge9_c").value));}
		if($(document).find(document.getElementById("label10_c")).length != 0)
			{document.getElementById("charge10_c").setAttribute("value", parseFloat(document.getElementById("rate10").value * document.getElementById("quantity10_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge10_c").value));}
		if($(document).find(document.getElementById("label11_c")).length != 0)
			{document.getElementById("charge11_c").setAttribute("value", parseFloat(document.getElementById("rate11").value * document.getElementById("quantity11_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge11_c").value));}
		if($(document).find(document.getElementById("label12_c")).length != 0)
			{document.getElementById("charge12_c").setAttribute("value", parseFloat(document.getElementById("rate12").value * document.getElementById("quantity12_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge12_c").value));}
		if($(document).find(document.getElementById("label13_c")).length != 0)
			{document.getElementById("charge13_c").setAttribute("value", parseFloat(document.getElementById("rate13").value * document.getElementById("quantity13_c").value).toFixed(2));		
				itemvalue = itemvalue + parseInt((document.getElementById("charge13_c").value));}
		if($(document).find(document.getElementById("label14_c")).length != 0)
			{document.getElementById("charge14_c").setAttribute("value", parseFloat(document.getElementById("rate14").value * document.getElementById("quantity14_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge14_c").value));}
		if($(document).find(document.getElementById("label15_c")).length != 0)
			{document.getElementById("charge15_c").setAttribute("value", parseFloat(document.getElementById("rate15").value * document.getElementById("quantity15_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge15_c").value));}
		if($(document).find(document.getElementById("label16_c")).length != 0)
			{document.getElementById("charge16_c").setAttribute("value", parseFloat(document.getElementById("rate16").value * document.getElementById("quantity16_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge16_c").value));}
		if($(document).find(document.getElementById("label17_c")).length != 0)
			{document.getElementById("charge17_c").setAttribute("value", parseFloat(document.getElementById("rate17").value * document.getElementById("quantity17_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge17_c").value));}
		if($(document).find(document.getElementById("label18_c")).length != 0)
			{document.getElementById("charge18_c").setAttribute("value", parseFloat(document.getElementById("rate18").value * document.getElementById("quantity18_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge18_c").value));}
		if($(document).find(document.getElementById("label19_c")).length != 0)
			{document.getElementById("charge19_c").setAttribute("value", parseFloat(document.getElementById("rate19").value * document.getElementById("quantity19_c").value).toFixed(2));		
				itemvalue = itemvalue + parseInt((document.getElementById("charge19_c").value));}
		if($(document).find(document.getElementById("label20_c")).length != 0)
			{document.getElementById("charge20_c").setAttribute("value", parseFloat(document.getElementById("rate20").value * document.getElementById("quantity20_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge20_c").value));}
		if($(document).find(document.getElementById("label21_c")).length != 0)
			{document.getElementById("charge21_c").setAttribute("value", parseFloat(document.getElementById("rate21").value * document.getElementById("quantity21_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge21_c").value));}
		if($(document).find(document.getElementById("label22_c")).length != 0)
			{document.getElementById("charge22_c").setAttribute("value", parseFloat(document.getElementById("rate22").value * document.getElementById("quantity22_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge22_c").value));}
		if($(document).find(document.getElementById("label23_c")).length != 0)
			{document.getElementById("charge23_c").setAttribute("value", parseFloat(document.getElementById("rate23").value * document.getElementById("quantity23_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge23_c").value));}
		if($(document).find(document.getElementById("label24_c")).length != 0)
			{document.getElementById("charge24_c").setAttribute("value", parseFloat(document.getElementById("rate24").value * document.getElementById("quantity24_c").value).toFixed(2));			
				itemvalue = itemvalue + parseInt((document.getElementById("charge24_c").value));}
		if($(document).find(document.getElementById("label25_c")).length != 0)
			{document.getElementById("charge25_c").setAttribute("value", parseFloat(document.getElementById("rate25").value * document.getElementById("quantity25_c").value).toFixed(2));
				itemvalue = itemvalue + parseInt((document.getElementById("charge25_c").value));}		
		
		document.getElementById("totalamt").setAttribute("value",parseFloat(itemvalue).toFixed(2));
 	   	document.getElementById("totalamt").value = parseFloat(itemvalue).toFixed(2);
		inWords(parseInt(document.getElementById("totalamt").value));		
	}


</script>
<style type="text/css">
			
				@media only print
				{	
					border: 1px solid;
				}
				@page {
					/* dimensions for the whole page */
					size: A4;
					margin:10;
				}
				body {
					/* A5 dimensions */
					height: 210mm;
					width: 100%;
					margin: 10;
				}
			</style>
			<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
			<script src="/ayushman/assets/js/listboxcomponent.js"></script>
			<script src="/ayushman/assets/app/js/extra/prescription.js"></script>
			<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="/ayushman/assets/app/css/main.css" />

</head>
<body>
<div style="width:100%; background-color:white;" >
<input type="hidden" value="2" id="autocompletevalue" />
<table style="width:100%;border:2px solid;"  >
		<td width="100%" valign="top">
			<input type ="hidden" id="sysHFflag" name="sysHFflag" value=""/>
			<input type ="hidden" id="fileid" name="fileid" value=""/>
			<form id ="billform" method="post" enctype="multipart/form-data">
			<div  id="printprescription"  style=" border:2px solid;">
				<table width="100%" class="table_roundborder" padding="10px">
					<input name="hospitalid" id="hospitalid" class="textarea" type="hidden" value="<?php echo "$accountuserid"; ?>" size="8"/>
					<input name="patId" id="patId" class="textarea" type="hidden" value="<?php echo "$patid"; ?>" size="8"/>
					<input name="patname" id="patname" class="textarea" type="hidden" value="<?php echo "$onlypatientname"; ?>" size="8"/>
					<input name="rcptid" id="rcptid" class="textarea" type="hidden" value="<?php echo "$rcptid_c"; ?>" size="8"/>
					<input name="appid" id="appid" class="textarea" type="hidden" value="<?php echo "$appid"; ?>" size="8"/>
					<input name="extrabillfields" id="extrabillfields" class="textarea" type="hidden" value="true" size="8"/>	
					<tr>
						<div id="name1" style="height:auto;width:100%;">
						<div style="border-bottom:1px solid;">
						<?php if($headerfooterSysGenflag_c==0){?>
							<div  class="uploadedheader1" id="uploadedheader1" >
								<img id="uploadedheader" width=100% src="<?php echo "$header_c"; ?>">
							</div>
							<?php } else{?>
							<div  class="systemheader1" id="systemheader1" >
								<div class="doctorinfo">
									<div class="doctorname"style="font-size:25px;"></div>
									<div class="doctorname">Dr. <?php echo $doctorname;?></div>
									<div class="doctoreducation"><?php echo $education_c;?></div>
									<div class="otherinfo">Regd No.:<?php echo $clinicname_c;?></div>
								</div>
								<div class="doctorinfo">
								<div class="doctoraddress"><?php echo $location_c;?>
									<div class="otherinfo"><?php echo $nearlandmark_c;?><?php echo $city_c;?><?php echo $pin_c;?><?php echo $state_c;?>
										</br>
									Ph.		<?php echo $phone;?>					
									</div>
								</div>						
								</div>						
							</div>
							<?php }?>
							<div style="border-bottom:1px solid;">
								<tr>
								<label style="margin-left:1%;float:left;height:auto;width:30%;vertical-align:top">
								No: <input id="billid"  name="billid" style=" width:50px;border:none;text-align:center;font-weight:bold"  value="<?php echo "$billno";?>"/>
								</label>	
								<label style="float:right;margin-right:5%;">
									Date 
								<input id="billdate"  name="billdate"  style="width:100px;border:none;font-weight:bold"  value="<?php echo date("d F Y", strtotime($billdate1));?>"/>

								</label>			
								</tr>								
								<tr>
									</br></br>									               						
								</tr>
							</div>
						</div>
								<table cellpadding="10" style="width:100%;border-bottom:1px solid;border-top:1px solid;" >
									<tr>
									<th width="13%">Particulars </th>
									<th width="10%">Rate (Rs.)</th>
									<th width="10%">Qyantity</th>
									<th width="10%"> Amount (Rs.) </th>
									</tr>
								</table>
								<div onapp ="1" style="paddionbottom:5px;">
								<table cellpadding="10" style="width:100%;border-bottom:1px solid;">

									<div class= "divcharge1" id="divcharge1"  >
										<input  readonly id="label1_c" name="label1_c" value="<?php echo "$label1_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate1" name="rate1" onblur ="addSum();" onchange= "setvalueAttr('rate1',this.value);"value="<?php echo number_format((float)$rate1_c,2,'.','')?>" style="margin-left:10%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity1_c" name="quantity1_c" onblur ="addSum();"  onchange= "setvalueAttr('quantity1_c',this.value);" value="<?php echo "$quantity1_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input   readonly size=10 type="text"  value="<?php echo "$charge1_c"?>" name="charge1_c" id="charge1_c" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									
									<?php if($label4_c!=null){?>
									<div class = "divcharge4" id = "divcharge4" >
										<input  readonly id="label4_c" name="label4_c" value="<?php echo "$label4_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate4" name="rate4" onblur ="addSum();" onchange= "setvalueAttr('rate4',this.value);" value="<?php echo number_format((float)$rate4_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity4_c" name="quantity4_c" onblur ="addSum();" onchange= "setvalueAttr('quantity4_c',this.value);" value="<?php echo "$quantity4_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input    readonly size=10 type="text"  id="charge4_c" name="charge4_c" value="<?php echo "$charge4_c"?>" style="margin-left:15%;width:100;border:none;border-bottom:1px solid;text-align:right;"/>
									</div>
									<?php } ?>
									<?php if($label5_c!=null){?>
									<div class = "divcharge5" id = "divcharge5" >
										<input readonly id="label5_c" name="label5_c" value="<?php echo "$label5_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate5" name="rate5" onblur ="addSum();" onchange= "setvalueAttr('rate5',this.value);"value="<?php echo number_format((float)$rate5_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity5_c" name="quantity5_c" onblur ="addSum();" onchange= "setvalueAttr('quantity5_c',this.value);" value="<?php echo "$quantity5_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge5_c" name="charge5_c" value="<?php echo "$charge5_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php if($label6_c!=null){?>
   
									<div class = "divcharge6" id = "divcharge6" >
										<input  readonly id="label6_c"name="label6_c" value="<?php echo "$label6_c";?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input   size=10 type="number" id="rate6" name="rate6"  onblur ="addSum();" onchange= "setvalueAttr('rate6',this.value);" value="<?php echo number_format((float)$rate6_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity6_c" name="quantity6_c" onblur ="addSum();" onchange= "setvalueAttr('quantity6_c',this.value);"  value="<?php echo "$quantity6_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly  size=10 type="text"  id="charge6_c" name="charge6_c"  value="<?php echo "$charge6_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label7_c!=null){?>

									<div class = "divcharge7" id = "divcharge7" >
										<input   readonly id="label7_c" name="label7_c" value="<?php echo "$label7_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate7" name="rate7" onblur ="addSum();" onchange= "setvalueAttr('rate7',this.value);" value="<?php echo number_format((float)$rate7_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity7_c" name="quantity7_c" onblur ="addSum();" onchange= "setvalueAttr('quantity7_c',this.value);" value="<?php echo "$quantity7_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge7_c" name="charge7_c"value="<?php echo "$charge7_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php if($label8_c!=null ){?>

									<div class = "divcharge8" id = "divcharge8" >
										<input  readonly id="label8_c" name="label8_c" value="<?php echo "$label8_c";?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate8" name="rate8" onblur ="addSum();" onchange= "setvalueAttr('rate8',this.value);" value="<?php echo number_format((float)$rate8_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity8_c" name="quantity8_c" onblur ="addSum();" onchange= "setvalueAttr('quantity8_c',this.value);" value="<?php echo "$quantity8_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge8_c"name="charge8_c"  value="<?php echo "$charge8_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label9_c!=null){?>

									<div class = "divcharge9" id = "divcharge9" >
										<input  readonly id="label9_c" name="label9_c" value="<?php echo "$label9_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate9" name="rate9" onblur ="addSum();" onchange= "setvalueAttr('rate9',this.value);" value="<?php echo number_format((float)$rate9_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number"  min="0" max="100" step="1" id="quantity9_c" name="quantity9_c" onblur ="addSum();" onchange= "setvalueAttr('quantity9_c',this.value);" value="<?php echo "$quantity9_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge9_c" name="charge9_c"  value="<?php echo "$charge9_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label10_c!=null){?>

									<div class = "divcharge10" id = "divcharge10" >
										<input  readonly id="label10_c" name="label10_c" value="<?php echo "$label10_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate10" name="rate10" onblur ="addSum();" onchange= "setvalueAttr('rate10',this.value);" value="<?php echo number_format((float)$rate10_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity10_c" name="quantity10_c" onblur ="addSum();" onchange= "setvalueAttr('quantity10_c',this.value);" value="<?php echo "$quantity10_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge10_c" name="charge10_c" value="<?php echo "$charge10_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label11_c!=null){?>

									<div class = "divcharge11" id = "divcharge11" >
										<input  readonly id="label11_c" name="label11_c" value="<?php echo "$label11_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate11" name="rate11" onblur ="addSum();" onchange= "setvalueAttr('rate11',this.value);" value="<?php echo number_format((float)$rate11_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity11_c" name="quantity11_c" onblur ="addSum();" onchange= "setvalueAttr('quantity11_c',this.value);" value="<?php echo "$quantity11_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge11_c" name="charge11_c"  value="<?php echo "$charge11_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label12_c!=null){?>

									<div class = "divcharge12" id = "divcharge12" >
										<input  readonly id="label12_c" name="label12_c" value="<?php echo "$label12_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate12" name="rate12" onblur ="addSum();" onchange= "setvalueAttr('rate12',this.value);" value="<?php echo number_format((float)$rate12_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity12_c" name="quantity12_c" onblur ="addSum();" onchange= "setvalueAttr('quantity12_c',this.value);" value="<?php echo "$quantity12_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge12_c" name="charge12_c"  value="<?php echo "$charge12_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label13_c!=null){?>

									<div class = "divcharge13" id = "divcharge13" >
										<input  readonly id="label13_c" name="label13_c" value="<?php echo "$label13_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate13" name="rate13" onblur ="addSum();" onchange= "setvalueAttr('rate13',this.value);" value="<?php echo number_format((float)$rate13_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity13_c" name="quantity13_c" onblur ="addSum();" onchange= "setvalueAttr('quantity13_c',this.value);"  value="<?php echo "$quantity13_c"?>" style="right;margin-left:13%;text-align:center;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge13_c" name="charge13_c"  value="<?php echo "$charge13_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label14_c!=null){?>

									<div class = "divcharge14" id = "divcharge14" >
										<input  readonly id="label14_c" name="label14_c" value="<?php echo "$label14_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate14" name="rate14" onblur ="addSum();" onchange= "setvalueAttr('rate14',this.value);" value="<?php echo number_format((float)$rate14_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity14_c" name="quantity14_c" onblur ="addSum();" onchange= "setvalueAttr('quantity14_c',this.value);"  value="<?php echo "$quantity14_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge14_c" name="charge14_c"  value="<?php echo "$charge14_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label15_c!=null){?>

									<div class = "divcharge15" id = "divcharge15" >
										<input  readonly id="label15_c" name="label15_c" value="<?php echo "$label15_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate15" name="rate15"  onblur ="addSum();" onchange= "setvalueAttr('rate15',this.value);" value="<?php echo number_format((float)$rate15_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity15_c" name="quantity15_c" onblur ="addSum();" onchange= "setvalueAttr('quantity15_c',this.value);"  value="<?php echo "$quantity15_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"   id="charge15_c" name="charge15_c"  value="<?php echo "$charge15_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label16_c!=null){?>

									<div class = "divcharge16" id = "divcharge16" >
										<input  readonly id="label16_c" name="label16_c" value="<?php echo "$label16_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate16" name="rate16" onblur ="addSum();" onchange= "setvalueAttr('rate16',this.value);" value="<?php echo number_format((float)$rate16_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity16_c" name="quantity16_c" onblur ="addSum();" onchange= "setvalueAttr('quantity16_c',this.value);"  value="<?php echo "$quantity16_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge16_c" name="charge16_c" value="<?php echo "$charge16_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php  } ?>
									<?php  if($label17_c!=null){?>

									<div class = "divcharge17" id = "divcharge17" >
										<input  readonly id="label17_c"  name="label17_c" value="<?php echo "$label17_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate17" name="rate17" onblur ="addSum();" onchange= "setvalueAttr('rate17',this.value);" value="<?php echo number_format((float)$rate17_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity17_c" name="quantity17_c" onblur ="addSum();" onchange= "setvalueAttr('quantity17_c',this.value);" value="<?php echo "$quantity17_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge17_c" name="charge17_c"  value="<?php echo "$charge17_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label18_c!=null){?>

									<div class = "divcharge18" id = "divcharge18" >
										<input  readonly id="label18_c" name="label18_c" value="<?php echo "$label18_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate18" name="rate18" onblur ="addSum();" onchange= "setvalueAttr('rate18',this.value);"value="<?php echo number_format((float)$rate18_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity18_c" name="quantity18_c" onblur ="addSum();" onchange= "setvalueAttr('quantity18_c',this.value);"  value="<?php echo "$quantity18_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge18_c" name="charge18_c" value="<?php echo "$charge18_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label19_c!=null){?>

									<div class = "divcharge19" id = "divcharge19" >
										<input  readonly id="label19_c" name="label19_c" value="<?php echo "$label19_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate19" name="rate19" onblur ="addSum();" onchange= "setvalueAttr('rate19',this.value);" value="<?php echo number_format((float)$rate19_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity19_c" name="quantity19_c" onblur ="addSum();" onchange= "setvalueAttr('quantity19_c',this.value);" value="<?php echo "$quantity19_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge19_c" name="charge19_c"  value="<?php echo "$charge19_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label20_c!=null){?>

									<div class = "divcharge20" id = "divcharge20" >
										<input  readonly id="label20_c" name="label20_c" value="<?php echo "$label20_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate20" name="rate20"  onblur ="addSum();" onchange= "setvalueAttr('rate20',this.value);"value="<?php echo number_format((float)$rate20_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity20_c" name="quantity20_c" onblur ="addSum();" onchange= "setvalueAttr('quantity20_c',this.value);"  value="<?php echo "$quantity20_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge20_c" name="charge20_c"  value="<?php echo "$charge20_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label21_c!=null){?>

									<div class = "divcharge21" id = "divcharge21" >
										<input  readonly id="label21_c" name="label21_c" value="<?php echo "$label21_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate21" name="rate21" onblur ="addSum();" onchange= "setvalueAttr('rate21',this.value);" value="<?php echo number_format((float)$rate21_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity21_c" name="quantity21_c" onblur ="addSum();" onchange= "setvalueAttr('quantity21_c',this.value);" value="<?php echo "$quantity21_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge21_c" name="charge21_c"  value="<?php echo "$charge21_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label22_c!=null){?>

									<div class = "divcharge22" id = "divcharge22" >
										<input  readonly id="label22_c" name="label22_c" value="<?php echo "$label22_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate22" name="rate22" onblur ="addSum();" onchange= "setvalueAttr('rate22',this.value);" value=" <?php echo number_format((float)$rate22_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity22_c" name="quantity22_c" onblur ="addSum();" onchange= "setvalueAttr('quantity22_c',this.value);"  value="<?php echo "$quantity22_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly  size=10 type="text" id="charge22_c" name="charge22_c"  value="<?php echo "$charge22_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label23_c!=null){?>

									<div class = "divcharge23" id = "divcharge23" >
										<input  readonly id="label23_c" name="label23_c" value="<?php echo "$label23_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate23" name="rate23"  onblur ="addSum();" onchange= "setvalueAttr('rate23',this.value);" value="<?php echo number_format((float)$rate23_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity23_c" name="quantity23_c" onblur ="addSum();" onchange= "setvalueAttr('quantity23_c',this.value);" value= "<?php echo "$quantity23_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge23_c" name="charge23_c" value="<?php echo "$charge23_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label24_c!=null){?>

									<div class = "divcharge24" id = "divcharge24" >
										<input  readonly id="label24_c" name="label24_c" value="<?php echo "$label24_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate24" name="rate24" onblur ="addSum();" onchange= "setvalueAttr('rate24',this.value);" value="<?php echo number_format((float)$rate24_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity24_c" name="quantity24_c" onblur ="addSum();" onchange= "setvalueAttr('quantity24_c',this.value);" value="<?php echo "$quantity24_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"   id="charge24_c" name="charge24_c"  value="<?php echo "$charge24_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label25_c!=null){?>

									<div class = "divcharge25" id = "divcharge25" >
										<input  readonly id="label25_c" name="label25_c" value="<?php echo "$label25_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input  size=10 type="number" id="rate25" name="rate25" onblur ="addSum();" onchange= "setvalueAttr('rate25',this.value);" value="<?php echo number_format((float)$rate25_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input  type="number" min="0" max="100" step="1" id="quantity25_c" name="quantity25_c" onblur ="addSum();" onchange= "setvalueAttr('quantity25_c',this.value);" value="<?php echo "$quantity25_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge25_c" name="charge25_c"  value="<?php echo "$charge25_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									
									<br><br>
									<hr style="border-bottom:1px solid;">
									<tr>
										<th>Total Rs.
										<input id="totalamt" name="totalamt"size="10" style="margin-left:10%;border:none;width:80;border-bottom:1px solid;font-weight:bold;" readonly value="<?php echo "$ammount_c";?>"/>
										(<input readonly type="text"  value name="amtinwords" id="amtinwords" style=" width:58%;border:none; border-bottom:1px solid;font-weight:bold;" />)
									</th>
									</tr>
								</table>
								</div>
								<br>
								      <span style=" margin-left:1%;"> Received with thanks from Mr./Ms. </span>
									<input id="name" name="name" readonly style=" width:51%;border:none; border-bottom:1px solid;font-weight:bold"  value="<?php echo "$onlypatientname";?>"/>
											</br></br>							
										 <span style=" margin-left:3%;"> the sum of rupees </span>
										 <input id="totalrcpt"  name="totalrcpt" value= "<?php echo "$amount";?>" style=" width:10%;border:none; border-bottom:1px solid;font-weight:bold" readonly />
									(<input readonly id="rcptamtinwords" name="rcptamtinwords" style=" width:58%;border:none; border-bottom:1px solid;font-weight:bold" />)
									
									</br></br>
									         <span style=" margin-left:-0.3%;">towards above rendered services / </span>
										<input id="diagnosis" readonly  name="diagnosis" style=" width:58%;border:none; border-bottom:1px solid;font-weight:bold" value ="<?php echo "$extradesc_c";?>"/>
									</br></br>
														<hr style="border-bottom:1px solid;">
								
								<div id= "signaturediv"style="float:left;min-height:40px;width:100%;text-align:right;font-size:14px;padding-right:60px;padding-top: 20px;">
									<img id="uploadedsign" src="<?php echo "$signature_c"; ?>" >
									</br>
									<label>Signature</label>
								</div>		
								<div style="position:fixed;bottom:0;display:none;"  id="uploadedfooter">
									<img id="uploadedfooter1" src="<?php echo "$footer_c"; ?>" style="width=100%">
								</div>
					</div>											
				</tr>
				</table>
			</div>	
			</form>
			<div id="creditPatient" title="Accept Deposit" style="display:none;">
			<form id="creditPatient" > 
				<div style="margin-left: 23px;">
					<p>
					<br /><br />
				 
					<label >Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
					<input id="creditdesc" value="<?php echo "$extradesc_c";?>" onChange="setdescription(this.value);" name="creditdesc" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
					</br></br>
					 <label >*Receipt Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
					<input id="creditdate"  name="creditdate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
					</br></br>
					<label >*Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
					<input id="creditamount" value="<?php echo "$amount";?>" name="creditamount" onChange="setvalue(this.value);"  style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" type="number">   
					</br></br>
					<label>Mode of Payment&nbsp;&nbsp;:</label>
					<select name="payment" value="<?php echo "$refmodeofpayment_c";?>"  class="text" id="payment" onChange="selectMode(this);" style="margin-left:0px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                                <option value="5">Cash</option>
                                <option value="6">Cheque</option>
                                <option value="1">Card</option>
                                
					</select></br></br>
					<div id="cheqDetail">
						<label >*Cheq No.&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
						<input id="cheqno" value="<?php echo "$chequeno_c";?>" name="cheqno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
						</br></br>
						<label >*Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
						<input id="cheqdate" name="cheqdate" value="<?php echo date('d M Y'); ?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" >   		
					</div>
					</br></br>
					<div id="cardDetail">
						<label >*Trx Ref No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
						<input id="trxrefno" value="<?php echo "$cardtrnxno_c";?>" name="trxrefno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
					</div>
					</br></br>
					<input type="hidden" id="wordamt"  value="" name="wordamt" />
				</div>
			</form>  
			</div>		
		</td>

			<input type="checkbox" style="font-size:16px;" id="withoutheaderChk" /><label style="font-size:18px;" >			
			Print Without Header
			<input type="checkbox" style="font-size:16px;" id="withoutsignChk" /><label style="font-size:18px;" >			
			Print Without Signature
			<input name="button2" type="button" class="button" style="margin:5px;width:70px;"  onclick="openPayment();" value="Payment" />
			</label>
		  <input type="button" value="Finalize & Print" style="margin:5px;width:110px;" onClick="PrintElem('#printprescription');" class="button" /></td>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
 </table>
</div>
</body>