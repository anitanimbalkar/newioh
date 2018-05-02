<html>
<head>
<title>Billing Statement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<script type="text/JavaScript">
$(document).ready(function() {
			$('#export').click(function() {							
    		$('#searchform').attr("action", "export");  //change the form action
			$('#exportto').val('excel');		
			$('#searchform').submit();  // submit the form
		});
	});
$(document).ready(function() {
	var radiovalue = document.getElementById("radiobtnvalue").value;

		if(radiovalue == 'ipd')
		{
			$('#ipdview').show();
			$('#opdview').hide();
			$('#ipdopdview').hide();
		}
		if(radiovalue == 'opd')
		{
			$('#opdview').show();
			$('#ipdview').hide();
			$('#ipdopdview').hide();
		}
		if(radiovalue == 'ipdopd')
		{
			$('#ipdopdview').show();
			$('#ipdview').hide();
			$('#opdview').hide();
		}
	
		$('#loading').dialog
		({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
	$(function() 
		{
			$( "#from" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
										 "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
										 "Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				if($('#from').val() == '')
				{
					if(curr_month == 0)
					{
					$( "#from" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
					}
					else
					{
					$( "#from" ).val(curr_date + " " + m_names[curr_month-1] + " " + curr_year);
					}
						
				}
			
			$( "#to" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
										 "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
										 "Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				
				if($('#to').val() == '')
				{
					$( "#to" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				}
			});
				
			if($.trim($('#errorlistdiv').html()) != "")
			{
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			}
			
			if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			typechanged($('#durationtype'),false);
			$('#loading').dialog("close");		
	});
	
	function  receiptshow(radiovalue)
	{
		if(radiovalue == 'ipd')
		{
			$('#ipdview').show();
			$('#opdview').hide();
			$('#ipdopdview').hide();
			document.getElementById("radiobtnvalue").value=radiovalue;
		}
		if(radiovalue == 'opd')
		{
			$('#opdview').show();
			$('#ipdview').hide();
			$('#ipdopdview').hide();
			document.getElementById("radiobtnvalue").value=radiovalue;
		}
		if(radiovalue == 'ipdopd')
		{
			$('#ipdopdview').show();
			$('#ipdview').hide();
			$('#opdview').hide();
			document.getElementById("radiobtnvalue").value=radiovalue;
		}
	
	}
	function  checkboxvalue(checkboxvalue)
	{
		
		if(checkboxvalue == 'active')
		{
			$('#ipdview').show();
			$('#opdview').hide();
			$('#ipdopdview').hide();
			document.getElementById("checkboxbtnvalue").value=checkboxvalue;
		}
		if(checkboxvalue == 'all')
		{
			$('#opdview').show();
			$('#ipdview').hide();
			$('#ipdopdview').hide();
			document.getElementById("checkboxbtnvalue").value=checkboxvalue;
		}
		
	}


function typechanged(select, submit)
	{
		if($(select).find(":selected").val() == 'custom')
		{
		$('#dates').show();
		submit = false;
		}	
		else
		{
		$('#dates').hide();
		}
		if(submit != false)
		{
			$('#searchform').submit();
		}
	}

	function setaction(cellvalue, options, rowObject)
	{
		var d = new Date(cellvalue);
    var da = d.getDate();                       //day
    var mon = d.getMonth() + 1;                 //month
    var yr = d.getFullYear();
     months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var monName = months[d.getMonth()];         //month Name
    
    var thisDay = da + " " + monName + " " + yr;    //full date show
                   //year
                   //alert(thisDay);
        	   //document.getElementById("billdate").value=thisDay;
        	   return thisDay;
	}

	function setamount(cellvalue, options, rowObject)
	{
			var locale='en-IN';
			var options={style:'currency',currency:'inr',minimunFractionDigits:0,maximumFractionDigits:0};
			var formatter=new Intl.NumberFormat(locale);
      var amt=formatter.format(cellvalue);
        return amt;

	}
	/* Commented because no more in use
	function showbillno(cellvalue, options, rowObject)
	{
					var type = $(rowObject).children()[7].firstChild.data;
					var billno = $(rowObject).children()[5].firstChild.data;
					var rcptno = $(rowObject).children()[8].firstChild.data;

					if(type=="dr")
					{
						 return billno;
					}
					else
					{
						return rcptno;
					}
	}
	*/
	function services(caseno,patid,status)
	{
		//alert(status);
		 var radiobtnvalue=document.getElementById("radiobtnvalue").value;
		if(radiobtnvalue=="ipd" && status=="admitted" || radiobtnvalue=="ipdopd" && status=="admitted" )
			{
				window.location='/ayushman/ccashierdashboard/viewbill/get?id='+patid+'&caseno='+caseno;
		 	}
		else if(radiobtnvalue=="ipd" && status=="discharged" )
			{
				window.location='/ayushman/cadmitpatient/viewpatientaccount/get?patId='+patid;
		 	}	
		 	else
				window.location='/ayushman/cadmitpatient/viewpatientaccount/get?patId='+patid;
		// 	//
		// 	else if( billno!="-" && billpdffilename!=null && billpdffilename!= "" && pdftype=='BILL') {
		// 		//alert("hello");
		// 		window.open('/ayushman/files/Documents/'+billpdffilename);
		// 		window.location.reload();

		// 	}
		// 	else if( rcptno!="-" && rcptpdffilename!=null &&  rcptpdffilename!="" && pdftype=='RCPT'){
		// 		//alert("hello");
		// 		window.open('/ayushman/files/Documents/'+rcptpdffilename);
		// 		window.location.reload();

		// 	}
		// 	else if(transtype=="OPD" && (billpdffilename==null || billpdffilename=="")&& pdftype=='BILL'){
		// 		 		parent.openDialog('/ayushman/cipdbills/getbilldata/get?id='+patId+'&billno='+billno+'&statementcode='+statementcode+'&accountuserid='+accountuserid,850,800);
		// 		 						window.location.reload();

		// 	}
			
		// 	else if(rcptpdffilename=="" || rcptpdffilename==null || billpdffilename=="" || billpdffilename==null){
		// 		alert("PDF is not available");
		// 		window.location.reload();

		// 	}

		// 	else{
		// 		//alert("hiiiii");
		// 		parent.openDialog('/ayushman/cipdbills/viewbill/get?id='+patId+'&caseno='+caseno,850,2000);
		// 		// return '<a href=/ayushman/cipdbills/viewbill?id='+patId+'><font color="blue">'+billno+ '</font></a> ';
		// 	}

	}
	function showbill( cellvalue, options, rowObject )
	{
		$patid = $(rowObject).children()[8].firstChild.data;
		$caseno = $(rowObject).children()[3].firstChild.data;
		$status = "'"+$(rowObject).children()[2].firstChild.data+"'";

		return '<a href="#" onclick=services("'+$caseno+'",'+$patid+','+$status+');><font color="#0000FF">'+cellvalue+'</font></a>';
	}
	function admitaction( cellvalue, options, rowObject )
	{

		$patid = $(rowObject).children()[8].firstChild.data;
		$patname = "'"+$(rowObject).children()[4].firstChild.data+"'";
		return '<a href="#" onclick="admitPatient('+$patname+','+$patid+');"><font color="#0000FF">Admit</font></a>';
	}

	function showbalance( cellvalue, options, rowObject )
	{

		$creditamount = $(rowObject).children()[6].firstChild.data;
		$debitamount = $(rowObject).children()[5].firstChild.data;
		return ($creditamount-$debitamount).toFixed(2);
	}

function admitPatient(patname,patId)
	{	
		document.getElementById("patname").value=patname;
		document.getElementById("iohid").value=patId;
		document.getElementById("admitdate").value=$.datepicker.formatDate('dd M yy', new Date());
		document.getElementById("depositamount").value='';
		document.getElementById("caseno").value='';
		
		$("#admitPatient").dialog({
		modal: true,
		draggable: true,
		resizable: false,
		position: ['center', 'center'],
		title: 'Admit  --- '+patname,
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		});
	
}

  function showadmitRcpt(caseno)
    {
    		var CAamount=document.getElementById("depositamount").value;
    		var CAdate=document.getElementById("admitdate").value;
		    var rcptId=document.getElementById("rcptId").value;
			var patName=document.getElementById("patname").value;
    	    var patId=document.getElementById("iohid").value;
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
			window.alert("Please enter required fields");
			$("#adcaseno").focus();
			return false;
		}
		else if(CAdate == "" || CAamount == "" )
		{
			window.alert("Please enter required fields");
			$("#depositamount").focus();
			return false;
		}
		else if (payment==1 && trxrefno=="") 
		{
			window.alert('Please enter required fields');
			$("#cardrefno").focus();
			return false;
		}
		else if(payment==6 && (cheqdate=="" || cheqno==""))
		{
			window.alert('Please enter required fields');
			$("#chequeno").focus();
			return false;
		}
		else if(payment==5 && (CAdate == "" || CAamount == "" ) ){
			window.alert('Please enter required fields');
			$("#depositamount").focus();
			return false;
		}
    		window.openDialog('/ayushman/cipdbills/showRcpt?creditamount='+CAamount+'&creditdate='+CAdate+'&rcptId='+rcptId+'&patName='+patName+'&patId='+patId+'&caseno='+caseno+'&hospitalid='+hospitalid+'&header_cashier='+header_cashier+'&footer_cashier='+footer_cashier+"&creditdesc="+CAdesc+"&cheqno="+cheqno+"&cheqdate="+cheqdate+"&trxrefno="+trxrefno+"&payment="+payment+"&wordamt="+wordamt,800,400);
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
			$( "#cheqdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	$(function() {
			$( "#chequedate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', maxDate: 0});
		});
	
});

 function validatecaseno(caseno){
 	$.ajax({
			url: "/ayushman/ccashier/casevalidation/get?caseno="+caseno,
			success: function(data) {
					if (data != "ok")
					{
						alert(data);
						document.getElementById("adcaseno").value="";
					}
				}
        }); 
 }
</script>
</head>
<body bgcolor="#FFFFFF" style="body_bg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
<div  style="width:828px;border:none; height:500px; padding:3px;">
<table width="99%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="4">
<table width="99%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
		<td width="99%" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7" />&nbsp;&nbsp;Statements</td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" bottom=1 cellspacing="0" cellpadding="1px">
<tr style="border-bottom:2px solid;color:#ecf8fb;">
<td >
 <div style="height:10px;">
	 <input type="radio" id="radiobtn" checked name="radiobtn" onClick="receiptshow(this.value);//$('#searchform').submit();" style="margin-left:10px;"  value="ipd" <?php
				if ($previousvalues != null)
   					 echo ($previousvalues['radiobtn'] == 'ipd') ? 'checked' : 'unchecked';?> >
	 <span  class="bodytext_normal"> IPD</span>
</div>
</td>
<td >
 <div style="height:10px;">
	 <input type="radio" id="radiobtn1" name="radiobtn" onClick="receiptshow(this.value);//$('#searchform').submit();" style="margin-left:10px;"  value="opd"<?php
		if ($previousvalues != null)
    	echo ($previousvalues['radiobtn'] == 'opd') ? 'checked' : 'unchecked';?> >
	 <span class="bodytext_normal"> OPD</span>
</div>
</td>
<td >
 <div style="height:10px;">
	 <input type="radio" id="radiobtn2" name="radiobtn" onClick="receiptshow(this.value);$('#searchform').attr('action', 'search');//$('#searchform').submit();" style="margin-left:10px;"  value="ipdopd"<?php
		if ($previousvalues != null)
    	echo ($previousvalues['radiobtn'] == 'ipdopd') ? 'checked' : 'unchecked';?> >
	 <span class="bodytext_normal"> OPD+IPD</span>
</div>
</td>
	<td  align="right" >
		<div style="float:right;">
			<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to Excel" />
			<input type="hidden" id="exportto" name="exportto" value="" />
		</div>
	</td>

</table>
	<hr style="height:2px;background-color:#ecf8fb;border:2px;width:100%;"/>

</td>
</tr>
<tr>
<td colspan="4">
<table width="100%" border="0" cellspacing="0"  cellpadding="3px">
<tr>
<td align="left" valign="center" width="30%" class="bodytext_normal" style="padding-top: 6px;"><label style="margin-left:5%;">Date:</label> 
<select name="durationtype" onChange="$('#searchform').attr('action', 'search');typechanged(this)" class="textarea" id="durationtype" >
<option value = '' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == '') ? 'selected' : '';
?>   >All</option>
						<option value='daily' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'daily') ? 'selected' : '';
?>  >Daily</option>
						<option value='weekly' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'weekly') ? 'selected' : '';
?>  >Weekly</option>
						<option value='monthly' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'monthly') ? 'selected' : '';
?>  >Monthly</option>
						<option value='monthtodate' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'monthtodate') ? 'selected' : '';
?>  >MonthToDate</option>
<option value='yeartodate' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'yeartodate') ? 'selected' : '';
?>  >YearToDate</option>
						<option value='custom' <?php
if ($previousvalues != null)
    echo ($previousvalues['durationtype'] == 'custom') ? 'selected' : '';
?>  >Custom Range</option>

</select>
</td>
<td>
	<div id="dates"  style=" width: 100%;padding-left: 30px;padding-bottom: 7px; ">
	 <table style="width:100%;" class="bodytext_normal">
		<tr style="width:100%; padding-top: 14px;">
			<td style="width:40%">From
			 <input type="text" name="from" id="from" style="width:70%" readonly placeholder="select date" value="" class="bodytext_normal"/>
			</td>
			<td style="width:40%"> To <input name="to" id="to" style="width:70%;" readonly placeholder="select date" value="" class="bodytext_normal"/>
			</td>
			<td style="width:20%">
			<input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
			</td>

		</tr>
	</table>
	</div>
</td>
</tr>
</table>
	</td>
	</tr>
	</table>			
	<hr style="height:2px;background-color:#ecf8fb;border:2px;width:100%;"/>

 
<div id="ipdview" style="display;none;border-bottom:2px solid;color:#ecf8fb;">
<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
	<tr>
		<td  width="30%">
		<div style="align:left;" class="bodytext_bold">
		<label style="width:100px;align:left;margin-left:1%;">Caseno :</label>
		<input type="text" name="searchcaseno" id="searchcaseno"  style="width:100px;align:left;" value="<?php if($previousvalues != null)echo $previousvalues['searchcaseno']; ?>" class="textarea"/>
	</td>
			<td  width="30%">

	<label style="width:100px;align:left;margin-left:10%;" class="bodytext_bold">Patient Name :</label>
		<input type="text" name="selectname" id="selectname"  style="width:100px;align:left;" value="<?php if($previousvalues != null)echo $previousvalues['selectname']; ?>" class="textarea"/>
	</td>
		</div>
		
	 	</td>
		
	</tr>
<!-- 			<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
 -->
	<tr bgcolor="#ecf8fb">
		<td  width="30%" bgcolor="#ecf8fb">
 <div style="height:10px;" >
	 <input type="radio" id="checkboxbtn" checked name="checkboxbtn" onClick="$('#searchform').attr('action', 'search');$('#searchform').submit();" style="margin-left:10px;"  value="active" <?php
				if ($previousvalues != null)
   					 echo ($previousvalues['checkboxbtn'] == 'active') ? 'checked' : 'unchecked';?> >
	 <span  class="bodytext_normal">Active IPD Patients</span>
</div>
</td>
<td  width="70%" bgcolor="#ecf8fb">
 <div style="height:10px;">
	 <input type="radio" id="checkboxbtn" name="checkboxbtn" onClick="$('#searchform').attr('action', 'search');$('#searchform').submit();" style="margin-left:10px;"  value="all"<?php
		if ($previousvalues != null)
    	echo ($previousvalues['checkboxbtn'] == 'all') ? 'checked' : 'unchecked';?> >
	 <span class="bodytext_normal"> Show all IPD Patients</span>
</div>
</td>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
			<button class="button" id = "searchButton" name="searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onClick="$('#searchform').attr('action', 'search');$('#searchform').submit();">Search</button></td>
       </tr>

</table>
		
<table width="100%" border="0" cellspacing="0" height=30px cellpadding="3px">
	  <tr>
			  <td width="100%">
			  	<?php
				$plansgrid= Request::factory('xjqgridcomponent/index');
				$plansgrid->post('name','allbillingdetails');
				$plansgrid->post('height','320');
				$plansgrid->post('width','810');
				$plansgrid->post('sortname','patientname');
				$plansgrid->post('sortorder','asc');
				$plansgrid->post('tablename','admittedpatient');//used for jqgrid
				$plansgrid->post('columnnames', 'displaydate,id,status,caseno,patientname,creditamount,debitamount,id,id');//used for jqgrid
				$plansgrid->post('whereclause',$whereclause);//used for jqgrid
				$columninfo = '[
								{"name":"Date","index":"displaydate","width":60,"hidden":false},							
								{"name":"Name","index":"doctorname","width":10,"hidden":true},
								{"name":"Status","index":"status","width":10,"hidden":true},
								{"name":"Case No","index":"caseno","width":60,"hidden":false,"align":"left"},
								{"name":"Patient name","index":"caseno","width":100,"hidden":false,"formatter":showbill},
								{"name":"Debit","index":"debitamount","width":60,"hidden":false,"align":"right"},
								{"name":"Credit","index":"creditamount","width":60,"hidden":false,"align":"right"},
								{"name":"Patid","index":"id","width":10,"hidden":true},
								{"name":"Balance","index":"id","width":60,"hidden":false,"align":"right","formatter":showbalance},
								{"name":"","index":"id","width":20,"hidden":false}
								]';			
				$plansgrid->post('columninfo', $columninfo);
				$plansgrid->post('editbtnenable','false');
				$plansgrid->post('deletebtnenable','false');
				$plansgrid->post('savebtnenable','false');
				echo $plansgrid->execute(); 
			?>
												
		</td>
		</tr>
	</table>
</div>
<div id="opdview" style="display;none;">

<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
	<tr>
		<td width="10%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
		<td width="38%" > <input id = "patId" name="patId" autocomplete="on" autofocus="autofocus" class = "textarea" value="" /></td>
		<td valign="middle"><label class = "bodytext_bold">Patient Name :</label></td>
		<td><input id = "patName" name="patName" autocomplete="on" class = "textarea" value=""/></td>

	</tr>
	<tr>
		<td width="11%" valign="middle"><label class = "bodytext_bold">Mobile No :</label></td>
		<td width="41%"><input id = "patContact" name="patContact" autocomplete="on" class = "textarea" value="" /></td>
		<td valign="middle"><label class = "bodytext_bold">Email :</label></td>
		<td > <input id = "patEmail" name="patEmail" autocomplete="on" class = "textarea" value="" /></td>
		
	</tr>
	<tr>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
			<button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onClick="$('#searchform').attr('action', 'search');$('#searchform').submit();">Search</button></td>
       </tr>
</table>
		
<table width="100%" border="0" cellspacing="0" height=30px cellpadding="3px">
	  <tr>
			  <td width="100%">
			  	<?php
				$plansgrid= Request::factory('xjqgridcomponent/index');
				$plansgrid->post('name','allbillingdetails1');
				$plansgrid->post('height','320');
				$plansgrid->post('width','820');
				$plansgrid->post('sortname','patientname');
				$plansgrid->post('sortorder','asc');
				$plansgrid->post('tablename','opdpatient');//used for jqgrid
				$plansgrid->post('columnnames', 'displaydate,id,status,caseno,patientname,creditamount,debitamount,id,id,status');//used for jqgrid
				$plansgrid->post('whereclause',$whereclause);//used for jqgrid
				$columninfo = '[
								{"name":"Date","index":"displaydate","width":60,"hidden":false},							
								{"name":"Name","index":"id","width":80,"hidden":true},
								{"name":"Status","index":"status","width":100,"hidden":true},
								{"name":"Case No","index":"caseno","width":60,"hidden":true,"align":"left"},
								{"name":"Patient name","index":"caseno","width":100,"hidden":false,"formatter":showbill},
								{"name":"Debit","index":"debitamount","width":80,"hidden":false,"align":"right"},
								{"name":"Credit","index":"creditamount","width":80,"hidden":false,"align":"right"},
								{"name":"Action","index":"id","width":100,"hidden":true},
								{"name":"Patid","index":"id","width":100,"hidden":true},
								{"name":"Action","index":"status","formatter":admitaction,"width":100,"hidden":false}
								]';			
				$plansgrid->post('columninfo', $columninfo);
				$plansgrid->post('editbtnenable','false');
				$plansgrid->post('deletebtnenable','false');
				$plansgrid->post('savebtnenable','false');
				echo $plansgrid->execute(); 
			?>
												
		</td>
		</tr>
	</table>
</div>


<div id="ipdopdview" style="display;none;">

<table id="patientsearchform" class = "table_roundBorder" style="width:97%;margin-top:5px;margin-left:10px">
	<tr>
		<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
    </tr>
    <tr>

    	<td width="10%" valign="middle"><label class = "bodytext_bold">Caseno :</label></td>
    	<td width="38%" >
		<input type="text" name="searchcaseno1" id="searchcaseno1" autocomplete="on"  autofocus="autofocus"  style="width:100px;align:left;" value="<?php if($previousvalues != null)echo $previousvalues['searchcaseno']; ?>" class="textarea"/>
	</td>
    </tr>
	<tr>
		<td width="10%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
		<td width="38%" > <input id = "patId1" name="patId1" autocomplete="on"  class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patId1']; ?>" /></td>
		<td valign="middle"><label class = "bodytext_bold">Patient Name :</label></td>
		<td><input id = "patName1" name="patName1" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patName1']; ?>"/></td>

	</tr>
	<tr>
		<td width="11%" valign="middle"><label class = "bodytext_bold">Mobile No :</label></td>
		<td width="41%"><input id = "patContact1" name="patContact1" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patContact1']; ?>" /></td>
		<td valign="middle"><label class = "bodytext_bold">Email :</label></td>
		<td > <input id = "patEmail1" name="patEmail1" autocomplete="on" class = "textarea" value="<?php if($previousvalues != null)echo $previousvalues['patEmail1']; ?>" /></td>
		
	</tr>
	<tr>
		<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
			<button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onClick="$('#searchform').attr('action', 'search');$('#searchform').submit();">Search</button></td>
       </tr>
</table>
		
<table width="100%" border="0" cellspacing="0" height=30px cellpadding="3px">
	  <tr>
			  <td width="100%">
			  	<?php
				$plansgrid= Request::factory('xjqgridcomponent/index');
				$plansgrid->post('name','allbillingdetails2');
				$plansgrid->post('height','320');
				$plansgrid->post('width','810');
				$plansgrid->post('sortname','patientname');
				$plansgrid->post('sortorder','asc');
				$plansgrid->post('tablename','ipdopdpatient');//used for jqgrid
				$plansgrid->post('columnnames', 'displaydate,id,status,caseno,patientname,creditamount,debitamount,id,id,id');//used for jqgrid
				$plansgrid->post('whereclause',$whereclause);//used for jqgrid
				$columninfo = '[
								{"name":"Date","index":"displaydate","width":60,"hidden":false},							
								{"name":"Name","index":"id","width":80,"hidden":true},
								{"name":"Status","index":"status","width":100,"hidden":true},
								{"name":"Case No","index":"caseno","width":60,"hidden":true,"align":"left"},
								{"name":"Patient name","index":"caseno","width":80,"hidden":false,"formatter":showbill},
								{"name":"Debit","index":"debitamount","width":60,"hidden":false,"align":"right"},
								{"name":"Credit","index":"creditamount","width":60,"hidden":false,"align":"right"},
								{"name":"Action","index":"id","width":100,"hidden":true},
								{"name":"Patid","index":"id","width":100,"hidden":true},
								{"name":"Balance","index":"status","width":60,"hidden":false,"align":"right","formatter":showbalance},
								{"name":"","index":"id","width":10,"hidden":false}
								
								]';			
				$plansgrid->post('columninfo', $columninfo);
				$plansgrid->post('editbtnenable','false');
				$plansgrid->post('deletebtnenable','false');
				$plansgrid->post('savebtnenable','false');
				echo $plansgrid->execute(); 
			?>
												
		</td>
		</tr>
	</table>
</div>

		</td>
	</tr>
</table>
<input type="hidden" id="radiobtnvalue" name="radiobtnvalue" value="<?php echo $radiobtnvalue;?>">

				</td>
			</tr>
		</table>
	</div>
		</form>
		<div id="admitPatient" title="Admit" style="display: none;">
  <form id="admitPatient" >
    <div style="margin-left: 23px;">
        <p>
            <br /><br />
			<input type="hidden" id="iohid"   name="iohid" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			<label>*Case No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :</label>			
			<input id="adcaseno" name="adcaseno" onChange="validatecaseno(document.getElementById('adcaseno').value);" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   			
			</br></br>
			<label>*Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="admitdate" name="admitdate" readonly="readonly" value="<?php echo date('d M Y');?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
			</br></br>
			<label >*Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="admitdesc" name="admitdesc" style="margin-left:10px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label>*Deposit &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :</label>
			<input id="depositamount" name="depositamount" onChange="inWords1(this.value);" type="Number"style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   
        </p>
				
			<label>Mode of Payment&nbsp;&nbsp;:</label>
			  <select name="modofpayment"  class="text" id="modofpayment" onchange="selectModeofpayment(this);" style="margin-left:5px;width:200px;height:20pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;">
                    
                                <option value="5">Cash</option>
                                <option value="6">Cheque</option>
                                <option value="1">Card</option>
                                
              </select></br></br>
              <div id="adcheqDetail">
			<label >*Cheq No.&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="chequeno" name="chequeno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</br></br>
			<label >*Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input id="chequedate" readonly name="chequedate" value="<?php echo date('d M Y'); ?>" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
			<div id="adcardDetail">
			<label >*Trx Ref No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label>
			<input id="cardrefno" name="cardrefno" style="margin-left:5px;width:200px;height:15pt;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;" class="text">   		
			</div>
			</br></br>
					<input type="hidden" id="adwordamt"  value="" name="adwordamt" />
					<input type="hidden" id="caseno"  value="" name="caseno" />
			
		</br>
		<input type="button" id="btnsave" height="22" style="width: 80px; height: 25px;line-height:23px; text-align:center; " value="Save" onClick="admitPatientinData(document.getElementById('iohid').value);showadmitRcpt(document.getElementById('adcaseno').value);"/>
	</div>
  </form>  
</div>	
	<input type="hidden" id="rcptId"  value="<?php echo "$rcptId";?>" name="rcptId" />
<input type="hidden" id="header_cashier"  value="<?php echo "$header_cashier";?>" name="header_cashier" />
<input type="hidden" id="footer_cashier"  value="<?php echo "$footer_cashier";?>" name="footer_cashier" />
<input name="hospitalid" id="hospitalid" type="hidden" value="<?php echo "$hospitalid"; ?>" size="8"/>
<input id = "patname" name="patname" value="" type="hidden" >
</body>
</html>