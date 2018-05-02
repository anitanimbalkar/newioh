<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<!-- START: Pooja Gujarathi-->
<link href="/ayushman/assets/cssF/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.bootstrap.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.core.standalone.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.filtering.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.paging.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.min.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/footable.sorting.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/cssF/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/cssF/footable.bootstrap.min.css">
<script type="text/javascript">
	function removetest(orderid)
	{
		$('html, body').animate({ scrollTop: 0 }, 1000);
        $('body').addClass('apply-modal-body');
		showMessage('250','50','Remove test','Do you really want to remove test '+orderid+' ?','confirmation','confirmRemoveTest');
		// $("#removetestrownumber").val(rownumber);
		 $("#removetestid").val(orderid);

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
				//orderid = $(rowObject).children()[6].firstChild.data;

		// var rownumber = $("#removetestrownumber").val();
		 var orderid=  $("#removetestid").val();
		$.ajax({
			url: "/ayushman/corderedtests/removetest?orderno="+orderid,
			success: function( data ) {
				parent.getcontent('/ayushman/corderedtests/viewFootable');
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
		
	}
	

	function setlink( cellvalue, options )
	{	string = '';
		for(var i =0 ; i<options.rows.length; i++){
			if(options.rows[i].orderid == cellvalue){
				var orderid =options.rows[i].orderid;
				var testname = options.rows[i].testsname;
				if(options.rows[i].status_c == "reportsuploaded" || options.rows[i].status_c == "reportscollected"){
					string = string + '<a href="#" ><font color="#220CE6">Check reports</font></a>';
				}else if(options.rows[i].status_c == "requested" ||options.rows[i].status_c == "rejected")
				{
					string = string + '<a href="#" onclick="openreassignpopup('+orderid+');" title="Reassign diagnostic lab" class="requsition-popup-links">Reassign lab</a><a  href="#" onclick="removetest('+orderid+');" title="Cancel Order" class="requsition-popup-links">Cancel</a>';
				}else if(options.rows[i].status_c == "accepted" || options.rows[i].status_c == "workinprogress" )
					{string = options.rows[i].status_c;}
			}

		}
		return string;
	}
	
	function statusformatter( cellvalue, options, rowObject )
	{
		if(cellvalue == 'accepted')
			return "order<br/>in process";
		if(cellvalue == 'requested')
			return "Confirmation</br>pending";
		if(cellvalue == 'suggested')
			return "Suggested";
		if(cellvalue == 'reportsuploaded')
			return "Reports<br/>Uploaded";
		if(cellvalue == 'reportscollected')
			return "Reports<br/>Collected";
		if(cellvalue == 'accepted')
			return "Order <br/>in process";
		if(cellvalue == 'rejected')
			return "Order<br/>rejected";
	}

	function testsformatter( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i< arr.length;i++)
		{
			string = string + i+') '+arr[i]+"<br />";
		}
		return string;
	}
	
	function testidformatter( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		return arr;
	}
	
	
	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}
	
	function openreassignpopup(orderid)
	{
		$('html, body').animate({ scrollTop: 0 }, 1000);
        $('body').addClass('apply-modal-body');
		jQuery('#testinfo').html('');
		jQuery('#laberr').html('');
		$.ajax({
		  url: "/ayushman/cpatientrequistiontests/gettestsdatausingorderid?orderid="+orderid,
			success: function( data ) {
				var recommenedtests =  eval('('+data+')');
				var errmsg= "";	
				for(var i = 0;i<recommenedtests.length;i++)
				{
					var arraypathologistinfo= recommenedtests[i]["pathologistList"];	
					var testname= "'"+recommenedtests[i]["testname"]+"'";				
					select = '<select id="'+i+'select'+recommenedtests[i]["id"]+'" onchange="getfeesfortestid(this,'+recommenedtests[i]["id"]+','+testname+','+i+');" style="width:150px;font-size:9pt;">'
					select = select +'<option style="font-size:9pt;" value="" >Select diagnostic center</option>';
					for (var j=0; j<arraypathologistinfo.length; ++j) 
					{	
						var pathoid =arraypathologistinfo[j]['centerid'];
					    var pathoname=arraypathologistinfo[j]['centername'];
						if(pathoid== recommenedtests[i]["pathologistid"])
							select = select +'<option style="font-size:9pt;"  selected="selected" value='+pathoid+'>'+pathoname+'</option>';
						else
							select = select +'<option style="font-size:9pt;" value='+pathoid+'>'+pathoname+'</option>';	
					}
					select = select + '</select>';
					var testrate = '"'+recommenedtests[i]["rate"]+'"';
					var textinfomation = "<td height='27px'>&nbsp;</td><td width='5%' class='bodytext_normal' align='left'><input type='checkbox' name='checkbox' value='checkbox' checked='true' id='"+i+"checkbox"+recommenedtests[i]["id"]+"' onclick='checkboxonclick(this,"+recommenedtests[i]["id"]+","+i+","+testrate+")' /></td><td width='35%' class='bodytext_bold' align='left' id='"+i+"testname"+recommenedtests[i]["id"]+"' >"+recommenedtests[i]["testname"]+"</td><td width='35%' class='bodytext_normal' align='center' >"+select+"</td><td width='10%' class='bodytext_normal' align='right'><span class='bodytext_bold'> Fees: </span></td><td  width='15%'  class='bodytext_normal'>&nbsp;<lable id='"+i+"labtestfees"+recommenedtests[i]["id"]+"' class='fee'>"+recommenedtests[i]["rate"]+"</lable> </td></div>";
					element = $("<div id='"+recommenedtests[i]["id"]+"'  style='margin-top:1px;width:100%;'  /><input type='hidden' id='"+i+"testid' name='"+i+"testid' /><input type='hidden' id='orderid' name='orderid' /><input type='hidden' id='"+i+"previousTestCost' ><input type='hidden' id='"+i+"previousOrderCost' >");
					element.appendTo('#testinfo');
					$(textinfomation).appendTo(element);
					document.getElementById(i+"testid").value = recommenedtests[i]["id"];
					document.getElementById("orderid").value = orderid;
					document.getElementById(i+"previousTestCost").value = recommenedtests[i]["previoustestrate"];
					document.getElementById(i+"previousOrderCost").value = recommenedtests[i]["totalorderrate"];
					disableselectbox(i+'select'+recommenedtests[i]["id"],recommenedtests[i]["id"]);
					if(($("#"+i+"select"+recommenedtests[i]["id"]).val() != "") && ($('#'+i+'labtestfees'+recommenedtests[i]["id"]).text()=="Not provided"))//show error msg 
					{
						if($('#'+i+'err'+recommenedtests[i]["id"]).html() == null )
						{
							$('#laberr').html(errmsg+"<div id='"+i+"err"+recommenedtests[i]["id"]+"'>&bull;&nbsp;Please select other diagnostic center for "+testname+'</div>');	
						}
					}
					errmsg =$('#laberr').html();
				}
				document.getElementById("testsnumber").value =recommenedtests.length;	
				calculatetotalfees();
			},
			error : function()
			{
				showMessage('250','50','Errors',"Error while adding Diagnostic Tests. Please try again",'error','errordialogboxid');
			}
		});
		$('#reassignpopup').dialog('open');
	}
	
	
	function calculatetotalfees()
	{
		var testnumber = document.getElementById("testsnumber").value;
		var currentbalance = $("#currentbalance").html();
		var afterreassignbalance = $("#afterreassignbalance").html();
		var difference=0;
		var total = 0;
		var previoustotal = 0;
		for(var i=0;i<testnumber;i++)
		{
			var testid = document.getElementById(i+"testid").value;
			if(document.getElementById(i+"checkbox"+testid).checked)
			{
				var previousOrderfee = document.getElementById(i+'previousOrderCost').value;
				var currentOrderfee =$('#'+i+'labtestfees'+testid).text();
				if(!isNaN(previousOrderfee))
		 			previoustotal =parseFloat(previousOrderfee).toFixed(2);
		 		if(!isNaN(currentOrderfee)){
					total =parseFloat(total)+ parseFloat(currentOrderfee);
		 		}		 			
			}	
		}

		difference = parseFloat(previoustotal).toFixed(2) -  parseFloat(total).toFixed(2);
		difference = difference.toFixed(2);
		if (difference >= 0) //check difference is + ve or -ve. If +ve then Credit. If -ve then Debite
		{
			$('#diffamounttext').text("Credit");
		}
		else
		{
			$('#diffamounttext').text("Debit");
		}
		if(difference < 0)
		{
			difference= difference* -1;
		}
		$('#diffamountnumber').text(difference);
		
		if($('#diffamounttext').html() == "Debit" )
		{	
			afterreassignbalance = parseFloat(currentbalance) - parseFloat(difference);// (+ve)number + (-ve) number
		}
		else
		{
			afterreassignbalance =parseFloat(currentbalance) + parseFloat(difference);
		}
		$('#afterreassignbalance').html(afterreassignbalance);
		if (Number(afterreassignbalance) < 0) //check afterreassignbalance is + ve or -ve. If +ve then reassign. If -ve then recharge
		{
			$('#reassignbutton').val("Recharge");
		}
		else
		{
			$('#reassignbutton').val("Reassign");
		}		
	}
	
	function getfeesfortestid(select,id,testname,testrownumber){
	var  errmsg = $('#laberr').html();
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestfee?testid="+id+"&pathologistid="+$(select).val(),
			success: function( data ) {
				if(data=="Not provided")
				{
					$('#'+testrownumber+'labtestfees'+id).text("Not provided");
					if($('#'+testrownumber+'err'+id).html() == null )
					{
						$('#laberr').html(errmsg+"<div id='"+testrownumber+"err"+id+"'>&bull;&nbsp;Please select other diagnostic center for "+testname+'</div>');	
					}
				}
				else
				{
					$('#'+testrownumber+'labtestfees'+id).text(data);
					if($('#'+testrownumber+"err"+id) != null )//if error div is present for that test then delete it.
					{
						$('#'+testrownumber+"err"+id).remove();
					}
				}
				calculatetotalfees();
			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		});
	}
		
	function checkboxonclick(objCheckbox,testid,testrownumber,testrate)
	{
		if($(objCheckbox).is(':checked'))
		{
			document.getElementById(testrownumber+'select'+testid).disabled = false;
			$('#'+testrownumber+'labtestfees'+testid).text(testrate);
			calculatetotalfees();
		}
		else
		{
			document.getElementById(testrownumber+'select'+testid).disabled = true;
			$('#'+testrownumber+'labtestfees'+testid).text("0");
			$('#'+testrownumber+"err"+testid).remove();
			calculatetotalfees();
		}
	}
	
	function onclickreassign()
	{
		if($('#reassignbutton').val()== "Recharge")
		{
			var currentlocation = escape(window.location);
			$.ajax({
			url: '/ayushman/ccheckout/setfollowuplink?currentlocation='+currentlocation ,
			success: function( data ) {
				window.location= "/ayushman/crecharge/view";
			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		});
		}
		else
		{
			var testnumber = document.getElementById("testsnumber").value;
			var test=new Array();
			if(($('#laberr').html() == "")&& ($('#reassignbutton').val()== "Reassign"))
			{
				var orderid= document.getElementById("orderid").value;
				var i=0;
				for (var j=0; j<testnumber; j++) 
				{
					var testid = document.getElementById(j+"testid").value;
					if(($("#"+j+"checkbox"+testid).is(':checked')))
					{
						test[i] = new Array(2);
						test[i][0] = testid
						test[i][1] = $("#"+j+"select"+testid).val();
						i++;
					}
				}
				if(i > 0)//check for at least 1 test is selected.
				{
					$.ajax({
						url: "/ayushman/corderedtests/reassigntests?orderid="+orderid+"&transactiontype="+$('#diffamounttext').html()+"&transactionamount="+$('#diffamountnumber').text()+"&test="+JSON.stringify(test),
						success: function( data ) {
							parent.getcontent('/ayushman/corderedtests/viewFootable');
						},
					error : function(){alert("something has gone wrong.Please contact system administrator.");}
					});
				}	
			} 
		}
	}
	
	function disableselectbox(selectboxid,testid)
	{
		var count =$('#'+selectboxid+" option").length;
		if (count != 1)
		{
		}
		else
		{
			$('#laberr').text('Please Add Diagnostic center to your Diagnostic center network.');
			$('#reassignbutton').val('My Diagnostic network');
		}
	}
	
	function centernameformatter(cellvalue, options, rowObject )
	{
		var centernumber=$(rowObject).children()[3].firstChild.data;
		return '<label title="phone:'+centernumber+'">'+cellvalue+'</label>';
	}

	$(document).ready(function(){
		$('#reassignpopup').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
	});
</script>
<script>
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('body').addClass('apply-modal-body')
		});
	});
	$( document ).ready(function() {
		$('.reassign-button').click(function() {
			$('body').addClass('view-modal-content')
		});
	});
</script>
<style>
a:link {
    color: blue;
}

a:visited {
    color: blue;
}

a:hover {
    color: hotpink;
}

a:active {
    color: red;
}
</style>
<div  class="col-sm-12 no-padding dignostic-container dignostic-view-container clearfix" >
	<div class="tab-section">
		<ul>
			<li>
				<a id="requisition" name="requisition" onclick="window.location='/ayushman/cpatientrequistiontests/viewFootable'" > Requisition </a>
			</li>
			<li>
				<a id="vieworder" name="vieworder" class="active-tab" onclick="window.location='/ayushman/corderedtests/viewFootable'" > View </a>
			</li>
		</ul>
	</div>
    <table border="0" cellpadding="0" cellspacing="0" valign="top" class="sub-tab-sections clearfix">

		<tr>
			<td align="right" class="search-patient" >
				<table width="250" height="40" border="0" cellspacing="0" cellpadding="0">
					<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data"  action="/ayushman/corderedtests/searchViewFootable">
						<tr>
						    <td align="left" class="bodytext_bold">Search: </td>
						    <td height="30"><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						    <td align="right" ><input type="submit" style="margin-left: 15px; border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
					</form>
				</table>
			</td>
		</tr>
	</table>
	<div class="demo-container hide-footable-sorting">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table data-paging-limit="3" id ="DTView" data-paging-size="10" data-paging-limit="3" class="table" data-sorting="true" data-paging="true"></table>
				</div>
			</div>
		</div>
	</div>
    <div id="reassignpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="75%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Reassign tests to Dignostic Center </td>
				<td width="25%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
					<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('reassignpopup')"/>
				</td>
			</tr>
		</table>
		<div id="contentdiv" style="max-height:200px;overflow-y:auto;overflow-x:hidden;" >
			<table width="100%; display: block;" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td height="40" colspan="3" align="left" valign="middle" style="border-bottom:1px solid #a8c8d9;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr id="testinfo" class="dignostic-view-popup">
						
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="auto" colspan="3" align="left" valign="middle" >
					<table width="100%" border="0" cellpadding="0" cellspacing="0" valign="top" >
						<tr>
							<td  class="bodytext_error" valign="top" style="padding:5px;">
							    <lable id="laberr"> Please select other diagnostic center for Blood Group Please select other diagnostic center for Blood Group</lable>
							</td>
						</tr>
						<tr>
							<td width="100%">
								<table width="100%" border="0" cellspacing="0" cellpadding="0" valign="top">
									<tr>
										<td height="15" align="right" class="bodytext_bold" style="width:208px;padding-left:10px;" ><lable id="diffamounttext" name="diffamounttext" >Credited</lable> Amount&nbsp;:&nbsp; </td>
										<td id="tdtotalamount" class="bodytext_normal" style="width:66px;padding-top:2px;" valign="top"><lable id="diffamountnumber" class='totalfee'>0</lable></td>
									</tr>
									<tr>
										<td height="15" align="right" class="bodytext_bold" style="width:208px;padding-left:10px;" ><lable id="laberr"></lable> Current Balance&nbsp;:&nbsp; </td>
										<td id="tdtotalamount" class="bodytext_normal" style="width:66px;padding-top:2px;" valign="top"><lable id="currentbalance" class='totalfee'>
										<?= $netbalance;?>
										</lable></td>
									</tr>
									<tr>
										<td height="15" align="right" class="bodytext_bold" style="width:208px;padding-left:10px;padding-bottom:2px;" ><lable id="laberr"></lable>Balance after reassign&nbsp;:&nbsp; </td>
										<td id="tdtotalamount" class="bodytext_normal" style="width:66px;padding-top:2px;padding-bottom:2px;" valign="top"><lable id="afterreassignbalance" class='totalfee'><?= $netbalance;?></lable></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
        </div>
    	<table width="100%"  height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb" style="padding-right:10px;border-top:1px solid #a8c8d9;"  >
			<tr>
				<td width="61%"><input type='hidden' id='testsnumber' name='testsnumber' /></td>
				<td width="27%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:10px;"><input id="reassignbutton" type="button" class="button" value="Reassign"  onclick="onclickreassign()" readonly="readonly"   style="outline:none;height:25px" /></td>
				<td width="13%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:10px;" ><input type="button" class="button" value="Cancel"  onclick="closepopup('reassignpopup')" readonly="readonly"   style="outline:none;height:25px" /></td>
			</tr>	
    	</table>
	</div>
</div>
<input type='hidden' id='removetestid' name='removetestid' />
<script type="text/javascript">
	var $j = $.noConflict(true);
</script>
<script src="/ayushman/assets/jsF/jquery.min.js"></script>
<script src="/ayushman/assets/jsF/jquery-ui.js"></script>
<script src="/ayushman/assets/jsF/footable.core.min.js"></script>
<script src="/ayushman/assets/jsF/footable.core.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.js"></script>
<script src="/ayushman/assets/jsF/footable.filtering.min.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.js"></script>
<script src="/ayushman/assets/jsF/footable.paging.min.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.js"></script>
<script src="/ayushman/assets/jsF/footable.sorting.min.js"></script>
<script type="text/javascript">
	jQuery.browser = {};
	(function () {
		jQuery.browser.msie = false;
		jQuery.browser.version = 0;
		if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
			jQuery.browser.msie = true;
			jQuery.browser.version = RegExp.$1;
		}
	})();
</script>
<script>
	jQuery(function($){
		$('#DTView').footable({
			"columns":[
				        {"name":"patientuserid","title":"patientuserid","width":100,"hidden":true,"visible":false},
						{"name":"drname","title":"Suggested By","width":80,"breakpoints":"xs"},
						{"name":"centername","title":"Center name","width":100,"breakpoints":"xs"},
						{"name":"centerphonenumber","title":"centerphonenumber","width":100,"hidden":true,"visible":false},
						{"name":"patientphonenumber","title":"patientphonenumber","width":100,"hidden":true,"visible":false},
						{"name":"date","title":"Ord. Date","width":100,"breakpoints":"xs"},
						{"name":"testreqdate","title":"Test Req. Date","width":100,"breakpoints":"xs"},
						{"name":"orderid","title":"Ord.No","width":50,"align":"right","breakpoints":"xs"},
						{"name":"testsname","title":"Tests","width":180,"formatter":testsformatter},
						{"name":"testid","title":"testid","width":100,"hidden":true,"visible":false,"breakpoints":"xs"},
						{"name":"status_c","title":"Status","width":80,"formatter":statusformatter,"breakpoints":"xs"},
						{"name":"pathologistid","title":"pathologistid","width":100,"hidden":true,"visible":false,"breakpoints":"xs"},
						{"name":"patientid","title":"patientid","width":100,"hidden":true,"visible":false,"breakpoints":"xs"},
						{"name":"pathologistuserid","title":"pathologistuserid","width":100,"hidden":true,"visible":false,"breakpoints":"xs"},
						{"name":"orderid","title":"Action","width":160,"formatter":setlink},

		            ],
			"rows":<?php echo $tests_json ?>
		});
	});
</script>
