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
		var amt=parseInt(document.getElementById('totalbill').value);
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
	

function setvalue(itemvalue)
	{
		document.getElementById('totalrcpt').value = itemvalue;
		document.getElementById("totalrcpt").setAttribute("value",itemvalue);
 	   
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
		
		var patId =document.getElementById("patId").value;
		creditPatientinData(patId);
		convertAndsavePDf();
        Popup($(elem).html());
		showRcpt();
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
		var htmlfile={htmlfile:elm.html(),patientuseridPDF:pid,doctoruserid:doctoruseridPDF,caseno:caseno,billidPDF:billid};
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
			$.ajax({
				url: "/ayushman/ccashier/creditOPDAccount/get?id="+patId+"&creditdate="+CAdate+"&caseno="+caseno+"&creditamount="+CAamount+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&accountuserid="+accountuserid+'&rcptId='+rcptId,

				success: function(data) {
				alert("Account Credited");
				$("#creditPatient").dialog( "close" );	
				//window.location.reload();
				//parent.location.reload(true);

        }           
        }); 
				$("#creditPatient").dialog( "close" );	
			//window.open('/ayushman/files/Documents/'+pdffilename);
				//window.location.reload();
				
	}	
	
}

function showRcpt()
    {
    	   	var caseno=null;
		    var header_cashier=document.getElementById("header_cashier").value;
    		var patId=document.getElementById("patId").value;
    		var CAamount=document.getElementById("creditamount").value;
    		var CAdate=document.getElementById("creditdate").value;
		    var rcptId=document.getElementById("rcptid").value;
			var patName=document.getElementById("patname").value;
			var hospitalid=document.getElementById("hospitalid").value;
			var footer_cashier=document.getElementById("footer_cashier").value;
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
			<input type ="hidden" id="sysHFflag" name="sysHFflag" value="<?php echo "$headerfooterSysGenflag_c"; ?>"/>
			<input type ="hidden" id="fileid" name="fileid" value=""/>
			<div  id="printprescription"  style=" border:2px solid;">
				<table width="100%" class="table_roundborder" padding="10px">
            <input name="hospitalid" id="hospitalid" class="textarea" type="hidden" value="<?php echo "$accountuserid"; ?>" size="8"/>
			<input name="patId" id="patId" class="textarea" type="hidden" value="<?php echo "$patid"; ?>" size="8"/>
			<input name="patname" id="patname" class="textarea" type="hidden" value="<?php echo "$onlypatientname"; ?>" size="8"/>
			<input name="rcptid" id="rcptid" class="textarea" type="hidden" value="<?php echo "$rcptid_c"; ?>" size="8"/>
			<input name="header_cashier" id="header_cashier" class="textarea" type="hidden" value="<?php echo "$header_cashier"; ?>" size="8"/>
			<input name="footer_cashier" id="footer_cashier" class="textarea" type="hidden" value="<?php echo "$footer_cashier"; ?>" size="8"/>

				<tr>
					<div id="name1" style="height:auto;width:100%;">
						<div style="border-bottom:1px solid;">
						<?php if($headerfooterSysGenflag_c==0){?>
							<div  class="uploadedheader1" id="uploadedheader1" >
<!-- 								<img id="uploadedheader" width=100% src="/ayushman/assets/userphotos/1_Doctor_footer_7131Footer Image-1.png">
 -->							<img id="uploadedheader" width=100% src="<?php echo "$header_c"; ?>">

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
										<input  readonly id="label1_c" value="<?php echo "$label1_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate1" name="rate1"  value="<?php echo number_format((float)$rate1_c,2,'.','')?>" style="margin-left:10%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty1" name="qty1" value="<?php echo "$quantity1_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input   readonly size=10 type="text"  value="<?php echo "$charge1_c"?>" id="charge1_c" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									
									<?php if($label4_c!=null && $charge4_c!=null){?>
									<div class = "divcharge4" id = "divcharge4" >
										<input  readonly id="label4_c" value="<?php echo "$label4_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate4" name="rate4"  value="<?php echo number_format((float)$rate4_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty4" name="qty4" value="<?php echo "$quantity4_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input   readonly size=10 type="text"  id="charge4_c" value="<?php echo "$charge4_c"?>" style="margin-left:15%;width:100;border:none;border-bottom:1px solid;text-align:right;"/>
									</div>
									<?php } ?>
									<?php if($label5_c!=null && $charge5_c!=null){?>
									<div class = "divcharge5" id = "divcharge5" >
										<input readonly id="label5_c" value="<?php echo "$label5_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate5" name="rate5"  value="<?php echo number_format((float)$rate5_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty5" name="qty5" value="<?php echo "$quantity5_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge5_c" name="charge5_c" value="<?php echo "$charge5_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php if($label6_c!=null && $charge6_c!=null){?>
   
									<div class = "divcharge6" id = "divcharge6" >
										<input  readonly id="label6_c" value="<?php echo "$label6_c";?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly  size=10 type="text" id="rate6" name="rate6"  value="<?php echo number_format((float)$rate6_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty6" name="qty6" value="<?php echo "$quantity6_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input   readonly  size=10 type="text"  id="charge6_c" name="charge6_c"  value="<?php echo "$charge6_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label7_c!=null && $charge7_c!=null){?>

									<div class = "divcharge7" id = "divcharge7" >
										<input   readonly id="label7_c" value="<?php echo "$label7_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate7" name="rate7"  value="<?php echo number_format((float)$rate7_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty7" name="qty7" value="<?php echo "$quantity7_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text" id="charge7_c" name="charge7_c"value="<?php echo "$charge7_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php if($label8_c!=null && $charge8_c!=null){?>

									<div class = "divcharge8" id = "divcharge8" >
										<input  readonly id="label8_c" value="<?php echo "$label8_c";?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate8" name="rate8" value="<?php echo number_format((float)$rate8_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty8" name="qty8" value="<?php echo "$quantity8_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge8_c"name="charge8_c"  value="<?php echo "$charge8_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label9_c!=null && $charge9_c!=null){?>

									<div class = "divcharge9" id = "divcharge9" >
										<input  readonly id="label9_c" value="<?php echo "$label9_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate9" name="rate9"  value="<?php echo number_format((float)$rate9_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number"  min="0" max="100" step="1" id="qty9" name="qty9" value="<?php echo "$quantity9_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input  readonly size=10 type="text"  id="charge9_c"  value="<?php echo "$charge9_c";?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label10_c!=null && $charge10_c!=null){?>

									<div class = "divcharge10" id = "divcharge10" >
										<input  readonly id="label10_c" value="<?php echo "$label10_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate10" name="rate10" value="<?php echo number_format((float)$rate10_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty10" name="qty10" value="<?php echo "$quantity10_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge10_c" value="<?php echo "$charge10_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label11_c!=null && $charge11_c!=null){?>

									<div class = "divcharge11" id = "divcharge11" >
										<input  readonly id="label11_c" value="<?php echo "$label11_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate11" name="rate11" value="<?php echo number_format((float)$rate11_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty11" name="qty11" value="<?php echo "$quantity11_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly  size=10 type="text"  id="charge11_c"  value="<?php echo "$charge11_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>
									</div>
									<?php } ?>
									<?php  if($label12_c!=null && $charge12_c!=null){?>

									<div class = "divcharge12" id = "divcharge12" >
										<input  readonly id="label12_c" value="<?php echo "$label12_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate12" name="rate12" value="<?php echo number_format((float)$rate12_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty12" name="qty12" value="<?php echo "$quantity12_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge12_c"  value="<?php echo "$charge12_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label13_c!=null && $charge13_c!=null){?>

									<div class = "divcharge13" id = "divcharge13" >
										<input  readonly id="label13_c" value="<?php echo "$label13_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate13" name="rate13"  value="<?php echo number_format((float)$rate13_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty13" name="qty13" value="<?php echo "$quantity13_c"?>" style="right;margin-left:13%;text-align:center;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge13_c"  value="<?php echo "$charge13_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label14_c!=null && $charge14_c!=null){?>

									<div class = "divcharge14" id = "divcharge14" >
										<input  readonly id="label14_c" value="<?php echo "$label14_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate14" name="rate14"  value="<?php echo number_format((float)$rate14_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty14" name="qty14" value="<?php echo "$quantity14_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge14_c"  value="<?php echo "$charge14_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label15_c!=null && $charge15_c!=null){?>

									<div class = "divcharge15" id = "divcharge15" >
										<input  readonly id="label15_c" value="<?php echo "$label15_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate15" name="rate15"  value="<?php echo number_format((float)$rate15_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty15" name="qty15" value="<?php echo "$quantity15_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"   id="charge15_c"  value="<?php echo "$charge15_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label16_c!=null && $charge16_c!=null){?>

									<div class = "divcharge16" id = "divcharge16" >
										<input  readonly id="label16_c" value="<?php echo "$label16_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate16" name="rate16"  value="<?php echo number_format((float)$rate16_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty16" name="qty16" value="<?php echo "$quantity16_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge16_c" value="<?php echo "$charge16_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php  } ?>
									<?php  if($label17_c!=null && $charge17_c!=null){?>

									<div class = "divcharge17" id = "divcharge17" >
										<input  readonly id="label17_c" value="<?php echo "$label17_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate17" name="rate17" value="<?php echo number_format((float)$rate17_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty17" name="qty17" value="<?php echo "$quantity17_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge17_c"  value="<?php echo "$charge17_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label18_c!=null && $charge18_c!=null){?>

									<div class = "divcharge18" id = "divcharge18" >
										<input  readonly id="label18_c" value="<?php echo "$label18_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate18" name="rate18"  value="<?php echo number_format((float)$rate18_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty18" name="qty18" value="<?php echo "$quantity18_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge18_c" value="<?php echo "$charge18_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label19_c!=null && $charge19_c!=null){?>

									<div class = "divcharge19" id = "divcharge19" >
										<input  readonly id="label19_c" value="<?php echo "$label19_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate19" name="rate19" value="<?php echo number_format((float)$rate19_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty19" name="qty19" value="<?php echo "$quantity19_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge19_c"  value="<?php echo "$charge19_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label20_c!=null && $charge20_c!=null){?>

									<div class = "divcharge20" id = "divcharge20" >
										<input  readonly id="label20_c" value="<?php echo "$label20_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate20" name="rate20"  value="<?php echo number_format((float)$rate20_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty20" name="qty20" value="<?php echo "$quantity20_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"  id="charge20_c"  value="<?php echo "$charge20_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label21_c!=null && $charge21_c!=null){?>

									<div class = "divcharge21" id = "divcharge21" >
										<input  readonly id="label21_c" value="<?php echo "$label21_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate21" name="rate21" value="<?php echo number_format((float)$rate21_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty21" name="qty21" value="<?php echo "$quantity21_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge21_c"  value="<?php echo "$charge21_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label22_c!=null && $charge22_c!=null){?>

									<div class = "divcharge22" id = "divcharge22" >
										<input  readonly id="label22_c" value="<?php echo "$label22_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate22" name="rate22" value=" <?php echo number_format((float)$rate22_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty22" name="qty22" value="<?php echo "$quantity22_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly  size=10 type="text" id="charge22_c"  value="<?php echo "$charge22_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php  if($label23_c!=null && $charge23_c!=null){?>

									<div class = "divcharge23" id = "divcharge23" >
										<input  readonly id="label23_c" value="<?php echo "$label23_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate23" name="rate23"  value="<?php echo number_format((float)$rate23_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty23" name="qty23" value= "<?php echo "$quantity23_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge23_c" value="<?php echo "$charge23_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label24_c!=null && $charge24_c!=null){?>

									<div class = "divcharge24" id = "divcharge24" >
										<input  readonly id="label24_c" value="<?php echo "$label24_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate24" name="rate24" value="<?php echo number_format((float)$rate24_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty24" name="qty24" value="<?php echo "$quantity24_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text"   id="charge24_c"  value="<?php echo "$charge24_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									<?php if($label25_c!=null && $charge25_c!=null){?>

									<div class = "divcharge25" id = "divcharge25" >
										<input  readonly id="label25_c" value="<?php echo "$label25_c"?>" style="margin-left:1%;width:100;border:none;border-bottom:0px ;" />
										<input readonly size=10 type="text" id="rate25" name="rate25"  value="<?php echo number_format((float)$rate25_c,2,'.','')?>" style="text-align:right;margin-left:10%;width:100;border:none;border-bottom:1px solid;"/>				
										<input readonly type="number" min="0" max="100" step="1" id="qty25" name="qty25" value="<?php echo "$quantity25_c"?>" style="text-align:center;margin-left:13%;width:30;border:none;border-bottom:1px solid;"/>
										<input readonly size=10 type="text" id="charge25_c"  value="<?php echo "$charge25_c"?>" style="margin-left:15%;text-align:right;width:100;border:none;border-bottom:1px solid;"/>								
									</div>
									<?php } ?>
									
									<br><br>
									<hr style="border-bottom:1px solid;">
									<tr>
										<th>Total Rs.
										<input id="totalbill" size="10" style="margin-left:10%;border:none;width:80;border-bottom:1px solid;font-weight:bold;" readonly value="<?php echo "$ammount_c";?>"/>
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
									(<input readonly id="rcptamtinwords" name="rcptamtinwords"  value  style=" width:58%;border:none; border-bottom:1px solid;font-weight:bold" />)
									
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
									<img id="uploadedfooter1" src="<?php echo "$footer_c"; ?>" width=100%>
								</div>
					</div>											
				</tr>
			</table>
			</div>	
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

				</br>
					<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save & Print" onClick="creditPatientinData(document.getElementById('patId').value);showRcpt();"/>
					</br>
			</div>
			</form>  
			</div>		</td>
		
			<input type="checkbox" style="font-size:16px;" id="withoutheaderChk" /><label style="font-size:18px;" >			
			Print Without Header
			</label>
			<input type="checkbox" style="font-size:16px;" id="withoutsignChk" /><label style="font-size:18px;" >			
			Print Without Signature
			</label>		
			
			<input name="button2" type="button" class="button" style="margin:5px;width:70px;"  onclick="openPayment();" value="Payment" />
			<input type="button" value="Finalize & Print" style="margin:5px;width:110px;" onClick="PrintElem('#printprescription');" class="button" /></td>
        <tr>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
  </table>
</div>
</body>