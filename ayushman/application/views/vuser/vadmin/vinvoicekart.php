<html>
<head>
<title>Generate Invoice</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox1.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<style>

.textformat{
	width: 98%; 
	height:95%;
	font-size: 14px;   
	border:none;
	text-align: right;
	word-wrap:break-word;
}
.textareaformat{
	height:95%; 	
	width: 98%;  	   
	border:none;
	font-size: 14px; 
	resize:none;
	background: #FFFFFF;
}
</style>
<script type="text/javascript">

	$(document).ready(function() {
			$( "#invoicedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");
			var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				
				    $( "#invoicedate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				
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
		var typeinvoice = document.getElementById('typeinv').value;
		if(typeinvoice != ''){
			document.getElementById('accountantname').value = typeinvoice;
		}
	});
	function addqtyprice()
	{
			var qty1= Number(document.getElementById('qty1').value);	
			var qty2= Number(document.getElementById('qty2').value);
			var qty3= Number(document.getElementById('qty3').value);
			var qty4= Number(document.getElementById('qty4').value);
			var qty5= Number(document.getElementById('qty5').value);
			var qty6= Number(document.getElementById('qty6').value);
			var qty7= Number(document.getElementById('qty7').value);
			var qty8= Number(document.getElementById('qty8').value);
			var qty9= Number(document.getElementById('qty9').value);
			var qty10= Number(document.getElementById('qty10').value);
			
			var uamt1= Number(document.getElementById('uamt1').value);	
			var uamt2= Number(document.getElementById('uamt2').value);
			var uamt3= Number(document.getElementById('uamt3').value);
			var uamt4= Number(document.getElementById('uamt4').value);
			var uamt5= Number(document.getElementById('uamt5').value);
			var uamt6= Number(document.getElementById('uamt6').value);
			var uamt7= Number(document.getElementById('uamt7').value);
			var uamt8= Number(document.getElementById('uamt8').value);
			var uamt9= Number(document.getElementById('uamt9').value);
			var uamt10= Number(document.getElementById('uamt10').value);
			
			var tot1 = (qty1 * uamt1).toFixed(2);
			var tot2 = (qty2 * uamt2).toFixed(2);
			var tot3 = (qty3 * uamt3).toFixed(2);
			var tot4 = (qty4 * uamt4).toFixed(2);
			var tot5 = (qty5 * uamt5).toFixed(2);
			var tot6 = (qty6 * uamt6).toFixed(2);
			var tot7 = (qty7 * uamt7).toFixed(2);
			var tot8 = (qty8 * uamt8).toFixed(2);
			var tot9 = (qty9 * uamt9).toFixed(2);
			var tot10 = (qty10 * uamt10).toFixed(2);
			
			
			document.getElementById('amt1').value = tot1;	
			document.getElementById('amt2').value = tot2;
			document.getElementById('amt3').value = tot3;
			document.getElementById('amt4').value = tot4;
			document.getElementById('amt5').value = tot5;
			document.getElementById('amt6').value = tot6;
			document.getElementById('amt7').value = tot7;
			document.getElementById('amt8').value = tot8;
			document.getElementById('amt9').value = tot9;
			document.getElementById('amt10').value = tot10;		
				
		addall();				
	}

function addall()
	{
			var amt1= Number(document.getElementById('amt1').value);	
			var amt2= Number(document.getElementById('amt2').value);
			var amt3= Number(document.getElementById('amt3').value);
			var amt4= Number(document.getElementById('amt4').value);
			var amt5= Number(document.getElementById('amt5').value);
			var amt6= Number(document.getElementById('amt6').value);
			var amt7= Number(document.getElementById('amt7').value);
			var amt8= Number(document.getElementById('amt8').value);
			var amt9= Number(document.getElementById('amt9').value);
			var amt10= Number(document.getElementById('amt10').value);
			var total = amt1+amt2+amt3+amt4+amt5+amt6+amt7+amt8+amt9+amt10;			
			var tax1 = 0;
			var tax2 = 0;
			var tax3 = 0;
			var tax4 = 0;
			var tax5 = 0;
			
			if (typeof(document.getElementById('per0'))!= 'undefined' && document.getElementById('per0') != null )
				tax1 = Number(document.getElementById('per0').value);
			if (typeof(document.getElementById('per1')) != 'undefined'&& document.getElementById('per1') != null)
				tax2 = Number(document.getElementById('per1').value);
			if (typeof(document.getElementById('per2')) != 'undefined'&& document.getElementById('per2') != null)
				tax3 = Number(document.getElementById('per2').value);
			if (typeof(document.getElementById('per3')) != 'undefined'&& document.getElementById('per3') != null)
				tax4 = Number(document.getElementById('per3').value);
			if (typeof(document.getElementById('per4')) != 'undefined'&& document.getElementById('per4') != null)
				tax5 = Number(document.getElementById('per4').value);
				
			var taxa1 = (total * (tax1/100)).toFixed(2);
			var taxb2 = (total * (tax2/100)).toFixed(2);
			var taxc3 = (total * (tax3/100)).toFixed(2);
			var taxd4 = (total * (tax4/100)).toFixed(2);
			var taxe5 = (total * (tax5/100)).toFixed(2);
						
			var total	= total.toFixed(2);				
			var nettotal =	Number(total) + (Number(taxa1)+Number(taxb2)+Number(taxc3)+Number(taxd4)+Number(taxe5)); 
			var nettotal= nettotal.toFixed(2);

			document.getElementById('total').value = total;
			document.getElementById('netbalance').value = nettotal;

			if (typeof(document.getElementById('net0'))!= 'undefined' && document.getElementById('net0') != null)
				document.getElementById('net0').value = taxa1;
			if (typeof(document.getElementById('net1'))!= 'undefined' && document.getElementById('net1') != null)					
				document.getElementById('net1').value = taxb2;
			if (typeof(document.getElementById('net2'))!= 'undefined' && document.getElementById('net2') != null)				
				document.getElementById('net2').value = taxc3;
			if (typeof(document.getElementById('net3'))!= 'undefined' && document.getElementById('net3') != null)				
				document.getElementById('net3').value = taxd4;
			if (typeof(document.getElementById('net4'))!= 'undefined' && document.getElementById('net4') != null)				
				document.getElementById('net4').value = taxe5;						
	}
	function addRow(tableID) {
            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            cell2.innerHTML = rowCount + 1;

            var cell3 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "txtbox[]";
            cell3.appendChild(element2);
        }
		
	function addinvoicedata()
	{
		if(document.getElementById('invformat').value != 'select' )
		{
			if((document.getElementById('description10').value != '' ) && (document.getElementById('amt10').value == 0) && (document.getElementById('uamt10').value == 0) && (document.getElementById('qty10').value == 0))
			{				
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description9').value != '' ) && (document.getElementById('amt9').value == 0) && (document.getElementById('uamt9').value == 0) && (document.getElementById('qty9').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description8').value != '' ) && (document.getElementById('amt8').value == 0) && (document.getElementById('uamt8').value == 0) && (document.getElementById('qty8').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description7').value != '' ) && (document.getElementById('amt7').value == 0) && (document.getElementById('uamt7').value == 0) && (document.getElementById('qty7').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description6').value != '' ) && (document.getElementById('amt6').value == 0) && (document.getElementById('uamt6').value == 0) && (document.getElementById('qty6').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description5').value != '' ) && (document.getElementById('amt5').value == 0) && (document.getElementById('uamt5').value == 0) && (document.getElementById('qty5').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description4').value != '' ) && (document.getElementById('amt4').value == 0) && (document.getElementById('uamt4').value == 0) && (document.getElementById('qty4').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description3').value != '' ) && (document.getElementById('amt3').value == 0) && (document.getElementById('uamt3').value == 0) && (document.getElementById('qty3').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description2').value != '') && (document.getElementById('amt2').value == 0) && (document.getElementById('uamt2').value == 0) && (document.getElementById('qty2').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description1').value != '') && (document.getElementById('amt1').value == 0) && (document.getElementById('uamt1').value == 0) && (document.getElementById('qty1').value == 0))
			{
				showNotification('300','20','success','Enter description and amount','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt10').value != 0) && (document.getElementById('description10').value == '') && (document.getElementById('uamt10').value != 0) && (document.getElementById('qty10').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt9').value != 0) && (document.getElementById('description9').value == '') && (document.getElementById('uamt9').value != 0) && (document.getElementById('qty9').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt8').value != 0) && (document.getElementById('description8').value == '') && (document.getElementById('uamt8').value != 0) && (document.getElementById('qty8').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt7').value != 0) && (document.getElementById('description7').value == '') && (document.getElementById('uamt7').value != 0) && (document.getElementById('qty9').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt6').value != 0) && (document.getElementById('description6').value == '') && (document.getElementById('uamt6').value != 0) && (document.getElementById('qty6').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt5').value != 0) && (document.getElementById('description5').value == '') && (document.getElementById('uamt5').value != 0) && (document.getElementById('qty5').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt4').value != 0) && (document.getElementById('description4').value == '') && (document.getElementById('uamt4').value != 0) && (document.getElementById('qty4').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt3').value != 0) && (document.getElementById('description3').value == '') && (document.getElementById('uamt3').value != 0) && (document.getElementById('qty3').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt2').value != 0) && (document.getElementById('description2').value == '') && (document.getElementById('uamt2').value != 0) && (document.getElementById('qty2').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('amt1').value != 0) && (document.getElementById('description1').value == '') && (document.getElementById('uamt1').value != 0) && (document.getElementById('qty1').value != 0))
			{
				showNotification('300','20','success','Enter all data','notification','diaconfirmation',5000);
				return;
			}
			if((document.getElementById('description1').value != '')  && (document.getElementById('amt1').value != 0) && (document.getElementById('uamt1').value != 0) && (document.getElementById('qty1').value != 0))
			{
				var spid = document.getElementById('serpid').value;
					$.ajax({
							url: "/ayushman/cinvoicedata/addinvoicedata",
							data: $("#kartform").serialize(),
							success: function(data ) {
								showNotification('300','20','invoice data','Invoice data saved.','notification','diaconfirmation',5000);
								var data =  JSON.parse(data);
								var invid = data.invid;	
								parent.window.openDialog('/ayushman/cinvoice/generateprint?invid='+invid,800,400);    	
								location.reload();
							},
						});
			}else{							
				showNotification('300','20','Enter data','Please enter atleast one description with valid data.','notification','diaconfirmation',5000);							
				}				
		}else{	
			showNotification('300','20','Retrieving data','Please select Invoice format.','notification','diaconfirmation',5000);
		}
	}
	function backpage(){
		window.history.back();
			// show go to back page and no need of reloading controller
			/*var spid = document.getElementById('spidno').value;
			var fdate = '';
			var tdate = '';
			window.location='/ayushman/cinvoicesearch/view';*/
	}
	function getinvoicetype(){			
		var invtype = document.getElementById('accountantname').value;
		var spid = document.getElementById('serpid').value;
	window.location='/ayushman/cinvoice/viewkart?spid='+spid+"&invtype="+invtype;
}
</script>
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<input type="hidden" id="typeinv" value="<?php echo $accountantname ; ?>"/>
<input type="hidden" id="serpid" value="<?php echo "$id";?> "/>
<div style="width:828px;height:auto;overflow-x:hidden;margin-left:0.5%;" id="ipdbill"> 
	<form id="kartform" method="post" action="">
		<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
			<tr>
				<td >
					<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
						<tr>
							<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Invoice for <?php echo "$sptype";?> - <?php echo "$spname";?> (<?php echo "$id";?>)</td>
							<td align="right"><a href="#" onclick="backpage();"><img src="/ayushman/assets/app/img/goback2.png" style="height: 30px; width: 80px;"></a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	<input type="hidden" id="spidno" name="spidno" value="<?php echo "$id";?>" />
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr class="bodytext_bold">
						<td width="25%">Invoice type :
							<select  class="textarea"  id="accountantname" name="accountantname"  value=""  onchange="getinvoicetype();" >
											<?php 
												$objroleuser = ORM::factory('invoicetypemaster')->find_all();
												foreach($objroleuser as $objRelation){	
													echo '<option name='.$objRelation->id.' value='.$objRelation->invtypename_c.'>'.$objRelation->invtypename_c.' </option>';
												}											
											?>
							</select>						
						</td>
						<td width="35%"> Select invoice format:
							<select id="invformat" name="invformat"  class="textarea" style="width:50%">
								<option value="select">Select format</option>
								<?php 
											$objinvoicestr = ORM::factory('invcstring')->find_all();
											foreach($objinvoicestr as $objRelation){
												echo '<option value="'.$objRelation->stringname_c.'">'.$objRelation->stringname_c.'</option>';
											}													
										?> 
							</select>
							
						</td>
						
						<td class="bodytext_bold"width="35%">Invoice date:										
							<input type="text" name="invoicedate" id="invoicedate" class="textarea" />							
						</td>
						<td class="bodytext_bold">
							&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>										
				</table>
	<hr/>
	
<div>
	<div style="width:100%;margin-top:5px;display:block;" class="bodytext_normal">
    <table width="100%" border ="1" align="left" cellpadding="1" cellspacing="1" >
     <tr class="Heading_Bg">
        <td width="50" align="middle">Sr no.</td>
        <td width="250" colspan="3" align="middle">Description</td>
		<td width="150" align="middle">Unit Price(Rs.)</td>	
		<td width="150" align="middle">Quantity</td>	
        <td width="150" align="middle">Price(Rs.)</td>		
     </tr>    
      <tr height="50px">
		<td align="center">1</td>
		<td colspan="3"><textarea id="description1" name="description1" rows="1" maxlength="200" class="textareaformat" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt1" name="uamt1" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty1" name="qty1" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt1" name="amt1" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr  height="50px">
		<td align="center">2</td>
		<td colspan="3"><textarea id="description2" rows="1" name="description2" class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt2" name="uamt2" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty2" name="qty2" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt2" name="amt2" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr  height="50px">
		<td align="center">3</td>
		<td colspan="3"><textarea class="textareaformat" rows="1" id="description3" name="description3" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt3" name="uamt3" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty3" name="qty3" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt3" name="amt3" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr  height="50px">
		<td align="center">4</td>
		<td colspan="3"><textarea id="description4" rows="1" name="description4" class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt4" name="uamt4" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty4" name="qty4" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt4" name="amt4" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr  height="50px">
		<td align="center">5</td>
		<td colspan="3"><textarea id="description5" rows="1" name="description5" class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt5" name="uamt5" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty5" name="qty5" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt5" name="amt5" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr height="50px">
		<td align="center">6</td>
		<td colspan="3"><textarea id="description6" rows="1" name="description6"  class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt6" name="uamt6" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty6" name="qty6" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td> <input type="text" class="textformat" id="amt6" name="amt6" value="0.00" minlength="1" maxlength="8"/></td>
      </tr>
	  <tr height="50px">
		<td align="center">7</td>
		<td colspan="3"><textarea id="description7" rows="1" name="description7"  class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt7" name="uamt7" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty7" name="qty7" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt7" name="amt7" value="0.00" minlength="1" maxlength="8" /></td>
      </tr> 
	  <tr height="50px">
		<td align="center">8</td>
		<td colspan="3"><textarea id="description8" rows="1" name="description8" class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt8" name="uamt8" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty8" name="qty8" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt8" name="amt8" value="0.00" minlength="1" maxlength="8" /></td>
      </tr> 
	  <tr height="50px" >
		<td  align="center">9</td>
		<td colspan="3"><textarea id="description9" rows="1" name="description9"  class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt9" name="uamt9" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty9" name="qty9" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
		<td><input type="text" class="textformat" id="amt9" name="amt9" value="0.00" minlength="1" maxlength="8"/></td>
      </tr> 
	  <tr height="50px">
		<td  align="center">10</td>
		<td colspan="3"><textarea id="description10" rows="1" name="description10"  class="textareaformat" maxlength="200" value=""></textarea></td>
		<td><input type="text" class="textformat" id="uamt10" name="uamt10" value="0.00" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
     	<td><input type="text" class="textformat" id="qty10" name="qty10" value="0" minlength="1" maxlength="8" onkeyup="addqtyprice();"/></td>
       <td><input type="text" class="textformat" id="amt10" name="amt10" value="0.00" minlength="1" maxlength="8"/></td>
      </tr> 
   
 	 <tr style="font-size:9pt;">
  		<td ></td>
  		<td  class="bodytext_bold" colspan="5" align="center" style="font-size:14px;">Sub-Total : </td>
    	<td> <input type="text"  class="textformat bodytext_bold" id="total" name="total" value="0.00" readonly/></td>    	
     </tr>							
							<?php
								if($objroleuserarrr['taxperc1_c'] != ''){
							    
									echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center" colspan="3"> <input readonly class="textformat bodytext_bold" type="text" name="des1" id="des1" value="'.$objroleuserarrr['taxlabel1_c'].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per1" id="per1" value="'.$objroleuserarrr['taxperc1_c'].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net1"  id="net1" value="0.00" /></td>';
									echo '</tr>';
								}
								if($objroleuserarrr['taxperc2_c'] != ''){
									echo '<tr style = "font-size:14px;">';			
											echo '<td> </td>';
											echo '<td align="center"  colspan="3"> <input readonly class="textformat bodytext_bold" type="text" name="des2" id="des2" value="'.$objroleuserarrr['taxlabel2_c'].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold" onkeyup="addall();" name="per2" id="per2" value="'.$objroleuserarrr['taxperc2_c'].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net2"  id="net2" value="0.00" /></td>';
									echo '</tr>';
								}
								if($objroleuserarrr['taxperc3_c'] != ''){
									echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center"  colspan="3"> <input readonly class="textformat bodytext_bold" type="text" name="des3" id="des3" value="'.$objroleuserarrr['taxlabel3_c'].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per3" id="per3" value="'.$objroleuserarrr['taxperc3_c'].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net3"  id="net3" value="0.00" /></td>';
									echo '</tr>';
								}
								if($objroleuserarrr['taxperc4_c'] != ''){
									echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center"  colspan="3"> <input readonly class="textformat bodytext_bold" type="text" name="des4" id="des4" value="'.$objroleuserarrr['taxlabel4_c'].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per4" id="per4" value="'.$objroleuserarrr['taxperc4_c'].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net4"  id="net4" value="0.00" /></td>';
									echo '</tr>';
								}
								if($objroleuserarrr['taxperc5_c'] != ''){
									echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center"  colspan="3"> <input readonly class="textformat bodytext_bold" type="text" name="des5" id="des5" value="'.$objroleuserarrr['taxlabel5_c'].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per5" id="per5" value="'.$objroleuserarrr['taxperc5_c'].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net5"  id="net5" value="0.00" /></td>';
									echo '</tr>';
								}
							/*if(count($descr) != 0){									
									
									
									for( $i = 0 ; $i < (count($descr)) ; $i++){
										$description 	= "'".$descr[$i]." (%) "."'";
										$taxamtpercentage 	= "'".$taxamtper[$i]."'";
									echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center"> <input readonly class="textformat bodytext_bold" type="text" name="des'.$i.'" id="amt'.$i.'" value="'.$descr[$i].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per'.$i.'" id="per'.$i.'" value="'.$taxamtper[$i].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net'.$i.'"  id="net'.$i.'" value="0.00" /></td>';
										echo '</tr>';
										echo '<tr style = "font-size:14px;">';
											echo '<td> </td>';
											echo '<td align="center"> <input readonly class="textformat bodytext_bold" type="text" name="des'.$i.'" id="amt'.$i.'" value="'.$descrc[$i].'" /></td>';
											echo '<td width="10%" ><input type="text" class="textformat bodytext_bold"  onkeyup="addall();" name="per'.$i.'" id="per'.$i.'" value="'.$taxamtper[$i].'" /></td>';
											echo '<td width="2%" >%</td>';
											echo '<td> <input type="text" readonly class="textformat bodytext_bold"  name="net'.$i.'"  id="net'.$i.'" value="0.00" /></td>';
										echo '</tr>';
									}
							    }	*/					
							?>
  	<tr style="font-size:9pt;">
   		<td ></td>
		<td class="bodytext_bold" colspan="5" align="center" style="font-size:14px;">Grand total : </td>   	
    	<td><input type="text"  class="textformat bodytext_bold" id="netbalance" name="netbalance" value="0.00" readonly/></td>    	
  	</tr>
	<tr style="font-size:9pt;">
		<td colspan="7" align="right"> <input type="button" class="button" style="width:12%; text-align:center;" id="btnsubmit" onclick="addinvoicedata();" value="Save" /> </td>    	
  	</tr>
	</table>
</div>
</div>
</form>
  </div>
 </body>
</html> 