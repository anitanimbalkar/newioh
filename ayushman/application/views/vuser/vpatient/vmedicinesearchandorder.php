<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
<script src="/ayushman/assets/js/jquery-1.7.1.min.js" type="text/javascript"></script>
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
<script>
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('body').addClass('apply-modal-body')
		});
		var stat = document.getElementById('bookteststatus').value;		
		if(stat == 'searchorder'){
			document.getElementById('searchorder').style.background =  'rgba(255, 110, 2,.4)';
		}
	});
</script>
<!--<script>
$(document).ready(function(){
    $("h4").click(function(){
        $("#examform").toggle(1000);
    });
});
</script>-->

<script type="text/javascript">

	$(document).ready(function() {

		$(function() {
//			$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
		});
	});

	function addtocart( cellvalue, options, rowObject )
	{
		return '<img src="/ayushman/assets/images/AddCart_Icon.png" width="15" height="15" align="top"/>&nbsp;<a href="#" onclick="openaddpopup('+cellvalue+')" >Select</a>'
	}

	function testnameformatter( cellvalue, options, rowObject )
	{
		var testid= $(rowObject).children()[2].firstChild.data;
		var testname= $(rowObject).children()[1].firstChild.data;
		var string ='<a onclick="opentestinfo('+testid+')" title="test information" style="cursor:hand;" >&nbsp;'+testname+"</a><br />";
		return string;
	}

	function opentestinfo(testid)
	{
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestinfo?testid="+testid,
			success: function( data ) {
				var testInfo = eval("("+data+")");
				var infoDiv = $("<div style='width:100%'></div>");
				for(var x in testInfo){
					var subDiv = $("<div></div>");
					$("<label class='bodytext_bold'>"+x+"</label>").appendTo(subDiv);
					$("<label>&nbsp:&nbsp&nbsp</label>").appendTo(subDiv);
					$("<label class='bodytext_normal'>"+testInfo[x]+"</label>").appendTo(subDiv);
					$(subDiv).appendTo(infoDiv);
					$("<br />").appendTo(infoDiv);
				}
				$("#informationbody").empty();
				$(infoDiv).appendTo($("#informationbody"));
				$("#informationpopup").dialog("open");
			},
			error : function(){alert("something has gone wrong. Could not retrieve information for the test. Please contact system administrator.");}
		});
	}

	function onclickaddtocart()
	{

		if($('#laberr').html()=="Please Add Chemist center to your Chemist center network.")
		{
			window.location='/ayushman/cpathologistdirectory/view';
		}
		else
		{

			var test = new Array();
			var testnumber = document.getElementById("testsnumber").value;
			var i=0;
			var errmsg ='';
			for (var j=0; j<testnumber; j++)
			{
				var testid = document.getElementById(j+"medid").value;
				if($("#"+j+"select"+testid).val()== "")//if center is not selected and
				{
					$('#'+j+'labtestfees'+testid).text("Not provided");
					var testname = $('#'+j+'testname'+testid).text();
					if($('#err'+testid).html() == null )
					{

						$('#laberr').html(errmsg+"<div id='"+j+"err"+testid+"'>&bull;&nbsp;Please select other Chemist center for "+testname+'</div>');
					}
				}
				errmsg =$('#laberr').html();
			}
			if(($('#laberr').html()== "") && ($('#AddtoCartbutton').val()!='My Chemist network'))
			{
				for (var j=0; j<testnumber; j++)
				{
					var testid = document.getElementById(j+"medid").value;
					var qty = document.getElementById(j+"qty").value;

					test[i] = new Array(2);
					test[i][0] = testid;
					test[i][1] = qty;						i++;

				}
				if(qty==""){
					alert("Please Enter Quantity");
					$("#qty").focus();
				}
				else{
					$.ajax({
						url: "/ayushman/cpatientmedicinesorder/savetocart?test="+JSON.stringify(test)+"&qty="+qty,
						success: function( data ) {
							//alert("heloo");
							if(!(isNaN(data)))
							{
								$('#cartitemnumber').text(data);
								//alert("if isnan",data);
								closepopup('addpopup');
								if($("#cartitemnumber").text() == "0")
								{
									//alert("if condition",data);
									$("#checkoutbutton").hide(true);
								}
								else
								{
									$("#checkoutbutton").show(true);
									if($("#addAndProceedStatus").val() == "true")
									{
										window.location='/ayushman/cpatientmedicinesorder/searchandorder';
									}
								}
								window.location.reload();
							}
						},
						error : function(){alert("something has gone wrong.Please contact system administrator.");}
					});
				}
			}
		}
	}


	function openaddpopup(medid)
	{
		//alert("In function");
		jQuery('#testinfo').html('');
		jQuery('#laberr').html('');
		$.ajax({
			url: "/ayushman/cpatientmedicinesorder/getmedicineusingid?medid="+medid,
			success: function( data ) {
				var recommenedtests =  eval('('+data+')');
				var errmsg= "";
				for(var i = 0;i<recommenedtests.length;i++)
				{
					var arraypathologistinfo= recommenedtests[i]["pathologistList"];
					var testname= "'"+recommenedtests[i]["testname"]+"'";

					select = '<select autofocus="autofocus" id="'+i+'select'+recommenedtests[i]["id"]+'" style="width:150px;font-size:9pt;">'
					select = select +'<option style="font-size:9pt;" value="" >Select Chemist center</option>';
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
					//var testrate = '"'+recommenedtests[i]["rate"]+'"';
					var textinfomation = "<tr><td width='1%' height='27px' >&nbsp;</td><td width='37%;' class='bodytext_bold' align='left' id='"+i+"testname"+recommenedtests[i]["id"]+"' >"+recommenedtests[i]["testname"]+"</td><td width='3%'><div style='float:left;margin-right:40px' class='bodytext_bold'>Qty</div></td><td width='25%'><input type='text' id='"+i+"qty' name='"+i+"qty' style='width:40px;'></td><td width='7%' class='bodytext_normal' align='right'><span class='bodytext_bold'> Price: </span></td></div><td class='totalfee bodytext_normal'> Not available</td></tr>";
					element = $("<table id='"+recommenedtests[i]["id"]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;'  /><input type='hidden' id='"+i+"medid' name='"+i+"medid' />");
					element.appendTo('#testinfo');
					$(textinfomation).appendTo(element);
					document.getElementById(i+"medid").value = recommenedtests[i]["id"];
					//document.getElementById("medid").value = medid;
					//disableselectbox(i+'select'+recommenedtests[i]["id"],recommenedtests[i]["id"]);
					// if(($("#"+i+"select"+recommenedtests[i]["id"]).val() != "") && ($('#'+i+'labtestfees'+recommenedtests[i]["id"]).text()=="Not provided"))//show error msg
					// {
					// 	if($('#'+i+'err'+recommenedtests[i]["id"]).html() == null )
					// 	{
					// 		$('#laberr').html(errmsg+"<div id='"+i+"err"+recommenedtests[i]["id"]+"'>&bull;&nbsp;Please select other Chemist center for "+testname+'</div>');
					// 	}
					// }
					errmsg =$('#laberr').html();
				}
				//calculatetotalfees();
				//alert(recommenedtests.length);

				document.getElementById("testsnumber").value =recommenedtests.length;
			},
			error : function()
			{
				showMessage('250','50','Errors',"Error while adding Chemist Tests. Please try again",'error','errordialogboxid');
			}
		});
		$('#addpopup').dialog('open');
	}

	function calculatetotalfees()
	{
		var arrayOfIds = $.map($(".fee"), function(n, i){
			return n.id;
		});
		uniquearrayOfIds = arrayOfIds.filter(function(elem, pos) {
			return arrayOfIds.indexOf(elem) == pos;
		})
		var total = 0;
		for(var i = 0;i<uniquearrayOfIds.length;i++)
		{
			var num=Number($('#'+uniquearrayOfIds[i]).html());
			if(!isNaN(num))
				total =Number(total)+ Number($('#'+uniquearrayOfIds[i]).html());
		}
		$('#labtesttotalfees').text(total);
	}

	function getfeesfortestid(select,id,testname,testrownumber){
		var  errmsg = $('#laberr').html();
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestdiscountedfee?testid="+id+"&pathologistid="+$(select).val(),
			success: function( data ) {
				data = JSON.parse(data);

				if(data['originalfees']=="Not provided")
				{
					$('#'+testrownumber+'labtestfees'+id).text("");
					$('#'+testrownumber+'labtestoriginalfees'+id).text("Not provided");
					$('#'+testrownumber+'labtestlabelfees'+id).text("");
					if($('#'+testrownumber+'err'+id).html() == null )
					{
						$('#laberr').html(errmsg+"<div id='"+testrownumber+"err"+id+"'>&bull;&nbsp;Please select other Chemist center for "+testname+'</div>');
					}
				}
				else
				{
					$('#'+testrownumber+'labtestfees'+id).text(data['discountedfees']);
					$('#'+testrownumber+'labtestoriginalfees'+id).text(data['originalfees']);
					$('#'+testrownumber+'labtestlabelfees'+id).text("Discounted Price   Rs.");
					if($('#'+testrownumber+"err"+id) != null )//if error div is present for that test then delete it.
					{
						$('#'+testrownumber+"err"+id).remove();
					}
				}
				//calculatetotalfees();
			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		});
	}

	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}

	function dump(obj) {
		var out = '';
		for (var i in obj) {
			out += i + ": " + obj[i] + "\n";
		}
	}

	$(document).ready(function(){
		$( "#qty" ).focus();
		$('#addpopup').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "550",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$('#informationpopup').dialog({
			autoOpen: false,
			show: "fade",
			position: [150, 150],
			hide: "fade",
			width: "500px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
		cartitemnumber = document.getElementById("cartitemnumber").value;
		//alert(cartitemnumber);
		if(cartitemnumber == "0")
		{//alert(cartitemnumber);
			$("#checkoutbutton").hide(true);
		}tour = {
			id: "hello-hopscotch",
			i18n: {
				stepNums : [<?php echo '""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""';?>]
			},


			steps: [

				{
					title: "Medicines",
					content: "Here you can place your order using <br/>(1).Prescription ordered by doctor using indiaOnlineHealth.<br/>(2).Search medicines in list of Drugs, add to cart and place order.",
					target: "#medicines",
					fixedElement:false,
					showCloseButton:false,
					showNextButton: false,
					placement: "bottom",
					width: 250

				},
				{
					title: "Medicine Orders",
					content: "Here you can view, track status and reassign your order to some other Chemist.",
					target: "#medicineorder",
					fixedElement:false,
					showCloseButton:false,
					showNextButton: false,
					placement: "bottom",
					width: 250
				},

				{
					title: "Completed Orders",
					content: "Here you can directly place order for the medicines prescribed by doctor to you using indiaOnlineHealth.",
					target: "#completedorders",
					fixedElement:false,
					showCloseButton:false,
					showNextButton: false,
					placement: "bottom",
					width: 250
				},
				{
					title: "Order from Prescription",
					content: "Get the list of prescribed medicines and order if you want. ",
					target: "#prescriptionorder",
					fixedElement:false,
					showCloseButton:false,
					showNextButton: false,
					placement: "bottom",
					width: 250
				},
				{
					title: "Search and order",
					content:"If you have a hardcopy of a prescription and you want to order medicines this is the place where you can search and place order for the medicines yourself. ",
					target:"#searchtest",
					fixedElement:false,
					showCloseButton:false,
					showNextButton: false,
					placement: "bottom",
					width: 250

				}
			],
			showPrevButton: false,
			scrollTopMargin:400,


		};

	});
	function showstep(step)
	{
		hopscotch.startTour(tour, step);
	}
	function hidestep()
	{
		hopscotch.endTour([true]);
	}


	function removetest(rownumber,testid,testname)
	{
		showMessage('250','50','Remove test','Do you really want to remove test '+testname+' ?','confirmation','confirmRemoveTest');
		$("#removetestrownumber").val(rownumber);
		$("#removetestid").val(testid);

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
		$.ajax({
			url: "/ayushman/cpatientmedicinesorder/removetest?testid="+testid+"&rownumber="+rownumber,
			success: function( data ) {
				parent.getcontent('/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription');
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
	}

	function removeOrdersPrescription( cellvalue, options )
	{
		$('html, body').animate({ scrollTop: 0 }, 1000);
		$('body').addClass('apply-modal-body');
		var rownumber = 0;
		var testid = 0;
		var testname = "";
		for(var i =0; i < options.rows.length; i++){
			string = '';
			if(options.rows[i].id==cellvalue){
				rownumber = i;
				testname = options.rows[i].testname;
				testid = cellvalue;
				setid = i+"remove"+testid;
				var quote_testid =  "'" + testid + "'";
				var quote_testname =  "'" + testname + "'";
			}
			string = string + '<img src="/ayushman/assets/images/Remove_Icon.png" width="22" height="20" id="'+setid+'" class="select-btn" onclick="removetest('+rownumber+','+ quote_testid +','+quote_testname+')"  />';
			$('.select-btn').click(function() {
				$('html, body').animate({ scrollTop: 0 }, 1000);
				$('body').addClass('apply-modal-body')
			});
		}
		return string;
	}

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
.btnstyle{
	font-weight:bold;
	width:100%;
	height:100%;
	padding:1px;
	background-color:rgb(30, 190, 240);
	border-radius: 4px;
}
</style>
<input type="hidden" id="bookteststatus" align="right"  value="<?php echo $status; ?>" />

<div class="col-sm-12 no-padding dignostic-container" >
	<table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" style="display: none;">
		<tr>
			<td width="100%" colspan="2" class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Medicines</strong>
				<lable id="cartitemnumber1" align="right" onchange="cartItemNumberOnChage()" ><input type="hidden" id="cartitemnumber" value="<?= $number; ?>">
			</td>
		</tr>
		<tr>
			<td align="center" style="font-size: 11px;font-family:tahoma,Helvetica,sans-serif;visibility:hidden;">
				Patient ID : <label id="patientid"></label>
			</td>
		</tr>

	</table>

	<div class="tab-section">
		<ul>
			<li>
				<a id="medicines" name="medicines" onmouseover="showstep(0)" onmouseout="hidestep()" class="active-tab" onclick="window.location='/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription'">Medicines</a>
			</li>
			<li>
				<a id="medicineorder" name="medicineorder" onmouseover="showstep(1)" onmouseout="hidestep()" onclick="window.location='/ayushman/cpatientmedicinesorder/viewFootable'">Medicines Orders</a>
			</li>
			<li>
				<a id="completedorders" name="completedorders" onmouseover="showstep(2)" onmouseout="hidestep()" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmedicinecompleteorderFootable'">Completed Orders</a>
			</li>
		</ul>
	</div>

	<div id="tabs1" >
		<table border="0" cellpadding="0" cellspacing="0" valign="top" class="sub-tab-sections clearfix" >
			<tr>
				<td style="width:100%;">
					<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td colspan="6" align="left" valign="middle" class="bodytext_normal sub-section-table">
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td id="prescriptionorder" name="prescriptionorder" onmouseout="hidestep()" onmouseover="showstep(3)" width="50%" class="bodytext_bold active">
											<a href="/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription" class="active"><button class="btnstyle" id="order" value="" style="height: auto;padding: 3px;" >Order from Prescription</button></a>
										</td>
										<td id="searchtest" name="searchtest" onmouseover="showstep(4)" onmouseout="hidestep()" width="50%" class="bodytext_bold">
											<a href="/ayushman/cpatientmedicinesorder/searchandorder" ><button class="btnstyle" id="searchorder" value="" style="height: auto;padding: 3px;" >Search and Order</button></a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>

	<div id="tabs1" style="float:left;vertical-align:top;width:100%;position:relative;overflow-y:none;background:transparent;border:none;">
		<table border="0" cellpadding="0" cellspacing="0" valign="top" style="width:100%;">
			<tr>
				<td align="right" class="search-patient" >
					<table width="250" height="40" border="0" cellspacing="0" cellpadding="0">
						<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data" action="/ayushman/cpatientmedicinesorder/searchandorder">
							<tr>
								<td align="left" class="bodytext_bold">Search: </td>
								<td height="30"><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
								<td align="right" ><input type="submit" style="margin-left: 15px; border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat; " value=""  class="search-input"/></td>
							</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>

		<!-- Mt Requisition start -->
		<table width="100%" height="15" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="15" border="0" align="left" class="Heading_Bg" >
					<div width="50%" style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;color:#FFFFFF;">
						<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>
						<strong>&nbsp;&nbsp;Requested Items</strong>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<div class="clearfix">&nbsp;</div>
	<div class="demo-container hide-footable-sorting">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table data-paging-limit="3" id ="MedicineOrderFromPrescriptionCart" data-paging-size="5" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
				</div>
			</div>
		</div>
	</div>
	<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder">
		<tr>
			<td height="40" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9">
				<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td class="bodytext_bold" style="padding: 5px 10px;" colspan="2">
							<label style="font-style:arial;">* Customer to keep original prescription and hand over to drug store when medicines are delivered.
							</label>
						</td>
					</tr>
					<tr>
						<td style="padding: 5px 10px;" colspan="2">
							<lable id="laberr"></lable>
						</td>
					</tr>
					<tr>
						<td width="70%">
							<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
							<input type='hidden' id='removetestid' name='removetestid' />
						</td>
						<td width="18%" align="right" style="padding: 5px 10px;">
							<div class="button" style="width:140px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmycart'" id="checkoutbutton" >Check Out </div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

	<div class="clearfix">&nbsp;</div>
	<!-- Mt Requisition end -->
	<div class="jqgrid-searchorder-table">
		<table width="100%" align ="center" height="36"  cellpadding="0" cellspacing="0" class="jqgrid-table-content" >
			<tr>
				<td class="select-btn">
					<?php
					//this is emr grid for patient we can put this in other page
					$tests= Request::factory('xjqgridcomponent/index');
					$tests->post('name','medicines');
					$tests->post('height','280');
					$tests->post('width','100%');
					$tests->post('sortname','name');
					$tests->post('sortorder','asc');
					$tests->post('tablename','drug');//used for jqgridp
					$tests->post('columnnames', 'drugname,id,id,name');//used for jqgrid
					$tests->post('whereclause',$whereclause);//used for jqgrid
					$columninfo = 	'[
											{"name":"Medicine Name","index":"drugname","width":200},
											{"name":"Medicineid","index":"id","width":100,"hidden":true},
											{"name":"Action","index":"id","width":60,"formatter":addtocart},
											{"name":"Medicineid","index":"id","width":100,"hidden":true}

										]';
					$tests->post('columninfo', $columninfo);
					$tests->post('editbtnenable','false');
					$tests->post('search',"true");
					$tests->post('deletebtnenable','false');
					$tests->post('savebtnenable','false');
					if($previousvalues != null)
						$previousvaluessearch=$previousvalues['search'];
					else
						$previousvaluessearch= "";
					$tests->post('previousvaluessearch',$previousvaluessearch);
					echo $tests->execute(); ?>
				</td>
			</tr>
		</table>
	</div>
	<div style="margin-bottom: 100px;" class="hidden-xs clearfix">&nbsp;</div>

	<!-- </td>
	<td style="width:1%;" ><label  style="visibility:hidden;" id="patientid"></label></td>
    </tr>
    </table> -->
	<label  style="visibility:hidden;" id="patientid"></label>
	<div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
		<form id="selectform">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
				<tr>
					<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
					<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Assign Medicines </td>
					<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
						<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('addpopup')"/>
					</td>
				</tr>
			</table>
			<div id="contentdiv" style="max-height:200px;overflow-y:auto;overflow-x:hidden;" >
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
					<tr>
						<td height="40" colspan="3" align="left" valign="middle" style="border-bottom:1px solid #a8c8d9;">
							<table width="500" border="0" cellspacing="0" cellpadding="0">
								<tr id="testinfo" class="medicine-serchorder-popup">
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td height="auto" colspan="3" align="left" valign="middle" >
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="40" align="left" class="bodytext_error"  style="width:100px;padding-left:10px;" >
										<lable id="laberr"></lable></td>
									<td height="40" align="right"  class="bodytext_bold"  style="width:80px;padding-top:10px;" valign="top" >Total Amount&nbsp;:&nbsp; </td>
									<td id="tdtotalamount" class="bodytext_normal" style="width:60px;padding-top:10px;" valign="top">
										<lable id="labtesttotalfees" class='totalfee'>Not Provided</lable></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<table width="100%"  height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb" style="padding-right:10px;border-top:1px solid #a8c8d9;"  >
				<tr>
					<td width="20%">
						<input type='hidden' id='testsnumber' name='testsnumber' />
						<input type='hidden' id='addAndProceedStatus' name='addAndProceedStatus' />
					</td>
						<!-- 					<input id="AddtoCartbutton" type="button" class="button" value="Add to cart & proceed"  onclick="onclickproceed()" readonly="readonly"   style="outline:none;width=100%;height:25px" /></td>
						 -->
					<td width="80%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
						<input id="AddtoCartbutton" type="button" class="button" value="Add"  onclick="onclickaddtocart()" readonly="readonly"   style="outline:none;height:25px;margin-right:10px;width: 80px;" />
						<input id="AddtoCartbutton" type="button" class="button" value="Cancel"  onclick="closepopup('addpopup')" readonly="readonly"   style="outline:none;height:25px;margin-right:10px;width: 80px;" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="informationpopup" style="width:500px;overflow-x:hidden; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
		<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Information</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#informationpopup').dialog('close');"/></label>
		</div>
		<div id="informationbody" style="width:96%;margin:10px;"></div>
		<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="80%">&nbsp;</td>
					<td width="21%" style="padding-top:5px;"><div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="$('#informationpopup').dialog('close');">Ok</div></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	var $j = $.noConflict(true);
</script>
<!--<script src="/ayushman/assets/jsF/jquery.min.js"></script>-->
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
		$('#MedicineOrderFromPrescriptionCart').footable({
			"columns": [
							{"name":"id","title":"cartid","visible":false,"width":100,"hidden":true,"breakpoints":"xs"},
							{"name":"cartid","title":"Items","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"testname","title":"Items"},
							{"name":"qty","title":"Qty","breakpoints":"xs"},
							{"name":"testreqdate","title":"Item Price (Rs.)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"pathologistid","title":"Discount(%)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"pathologistList","title":"Discounted Price (Rs.)","hidden":true,"visible":false,"breakpoints":"xs"},
							{"name":"id","title":"Remove","formatter":removeOrdersPrescription}
						],
			"rows":<?php echo $tests_json;?>
		});
	});
</script>