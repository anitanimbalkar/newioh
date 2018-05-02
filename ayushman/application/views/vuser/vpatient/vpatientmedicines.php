<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
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
		if(stat == 'order'){
			document.getElementById('order').style.background =  'rgba(255, 110, 2,.4)';
		}
	});
</script>
<script type="text/javascript">

	function setlink( cellvalue, options, rowObject )
	{   
		$orderid = $(rowObject).children()[4].firstChild.data;
		if($orderid == 'Order Not Placed')
			$orderid='undefined';
		if(cellvalue == "suggested" )
			return '<a href="#" onclick="opentests('+$orderid+','+$(rowObject).children()[2].firstChild.data+');" ><font color="#220CE6">Assign<br/>Chemist</font></a>';
		else
			if(cellvalue == "reportsuploaded" ||cellvalue == "reportscollected" )
				 return '<a href="#" ><font color="#220CE6">Check reports</font></a>';
			else
				if(cellvalue == "requested" ||cellvalue == "rejected")
				{
					 return '<a href="#" onclick="opentests('+$orderid+','+$(rowObject).children()[2].firstChild.data+');" ><font color="#220CE6">Reassign<br/>Chemist</font></a>';
				}else
					if(cellvalue == "accepted" || cellvalue == "workinprogress" )
						return $(rowObject).children()[11].firstChild.data;
						else
						if(cellvalue == "completed"  )
							return "Delivered";
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

	function setorderlink( cellvalue, options, rowObject )
	{
        $('html, body').animate({ scrollTop: 0 }, 1000);
        $('body').addClass('apply-modal-body');
		return '<img src="/ayushman/assets/images/AddCart_Icon.png" width="15" height="15" align="top"/>&nbsp;<a href="#" onclick="opentests(undefined,'+cellvalue+');" >Select</a>';
	}
	function medicineformatter( cellvalue, options, rowObject )
	{
		if(cellvalue != undefined){
			str = cellvalue.replace(/----/g, "<br />");
			
			return str;
		}		
		else
		{
			return cellvalue;
		}
	}
	function assignchemist()
	{		
			var mydata = new Array();
			url = '';
			if(document.getElementById('orderid').value != 'undefined')
			{
				url = "/ayushman/cmedicine/getmedicinesusingorderid?orderid="+document.getElementById('orderid').value;
			}
			else
			{
				url = "/ayushman/cmedicine/getmedicineusingappid?appid="+document.getElementById('appointmentid').value;
			}
			
			$.ajax({
			  url: "/ayushman/cchemist/getchemist",
			  success: function( data ) {
					jQuery('#popup').html('');
					var chemists = data;
					$.ajax({
						  url: url,
						  success: function( data ) {
										var selectedmedicine = eval('('+data+')');
									//	var selectedtests = eval('(' +getselecteditems('divtest',4) + ')');
										chemists = eval('('+chemists+')');
										select = '<select style="width:30%;font-size:9pt;">'
										for(i=0;i<chemists.length;i++)
										{
											select = select +'<option style="font-size:9pt;align:right;" value='+chemists[i][0]+'>'+chemists[i][1]+'</option>';
										}
										
										select = select + '</select>';
										for(var i = 0;i<selectedmedicine.length;i++)
										{
											if(selectedmedicine[i]["drugname"] != '')
											{
												//alert(selectedmedicine[i]["drugname"]);
												var medname=selectedmedicine[i]["drugname"];
												var medvalue = medname.split(" ");
												//console.log(medvalue);
												element = $("<div id='"+selectedmedicine[i]["id"]+"'  style='border-bottom: 1px solid; margin-top:5px; background-color:#E8E8E8;  width:99%;'  />");
												element.appendTo('#popup');
													$("<div><label style='border: none; width:70%; padding: 0px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+selectedmedicine[i]["drugname"]+"</label></div>").appendTo(element);
													$("<td width='3%'><div style='float:left;margin-left:40px' class='bodytext_bold'>Qty</div></td><td width='25%'><input type='text' id='"+i+"qty' name='"+i+"qty' style='width:40px;'></td>").appendTo(element);
												selectele = $(element).children()[1];
												if(document.getElementById('selectedchemists').value != '')
												{
													selectedvalues = eval('('+document.getElementById('selectedchemists').value+')');
													for(j=0;j<selectedvalues.length;j++)
													{
														if(selectedmedicine[i][1] == selectedvalues[j][0])
														{
															selectele.selectedIndex = selectedvalues[j][1].split(',')[0];
														}
													}
												}
											}
										}
							},
							error : function(){alert("error");}
						  });
					
				},
				error : function(){alert("error");}
			  });
	}
	function opentests(cellvalue,appointmentid)
	{
		if(cellvalue != 'Order Not Placed')
		document.getElementById('orderid').value = cellvalue;
		else
			document.getElementById('orderid').value = '';
		document.getElementById('appointmentid').value = appointmentid;
		$('#popup').dialog('open');
		assignchemist();
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
		else 
		return cellvalue; 
	}
	function nameformatter( cellvalue, options, rowObject )
	{
		var chemistphonenumber = $(rowObject).children()[4].firstChild.data;
		if (chemistphonenumber == "Order Not Placed")
		{
			return cellvalue;
		}
		else
		return "<label title='phone:"+chemistphonenumber+"'>"+cellvalue+ "</label>";
	}
	function refreshallgrid(){
		$('#prescriptionmedicinelist').trigger( 'reloadGrid' );
		$('#patientmedicinelist').trigger( 'reloadGrid' );
		$('#ordercompletedlist').trigger( 'reloadGrid' );
	}
	$(document).ready(function(){
	$( "#qty" ).focus();
	$( "#tabs" ).tabs();
		$('#popup').dialog({
					autoOpen: false,
					position: [150, 150],
					width: 550,
					modal:true,
					buttons: {
						"Add": function() {
							//onclickaddtocart();
						 		var chemistid = new Array();
								popupchildnodes = $('#popup').children();
								//alert(popupchildnodes);
								array = new Array();
								for(i=0;i<popupchildnodes.length;i++)
								{
									var qty = document.getElementById(i+"qty").value;
									element = $(popupchildnodes[i]).children()[1];
									array[i] = new Array(3);
									array[i][0] = popupchildnodes[i].id;
								// alert(qty);

									array[i][1] = qty;
								if(qty==""){
									alert("Please Enter Quantity");
									$("#qty").focus();
									}
								else{
								// $(this).dialog("close");
								$.ajax({
										url: "/ayushman/cpatientmedicinesorder/savetocart?test="+JSON.stringify(array)+"&qty="+qty,
										  success: function( data ) {
												window.location.reload();
										}
									 });
									}
							}
				 		},
						"Cancel": function() {
							$(this).dialog("close");
						}
					}
				});
		});

	$(document).ready(function(){

		cartitemnumber = document.getElementById("cartitemnumber").value;
	 	//alert(cartitemnumber);
	 	if(cartitemnumber == "0")
	 	{//alert(cartitemnumber);
	 		$("#checkoutbutton").hide(true);
	 	}
tour = {
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
	   //console.log("hi");
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
<div id="body_contantpatientpage" class="col-sm-12 no-padding dignostic-container clearfix" >
	<input type='hidden' id='testsnumber' name='testsnumber' />
	<input type="hidden" id="bookteststatus" align="right" value="<?php echo $status; ?>" />

	<table width="98%" border="0" align="center"  cellspacing="0" cellpadding="0" style="display: none;">
		 <tr>
			  <td align="center" style="font-size: 11px;font-family:tahoma,Helvetica,sans-serif;visibility:hidden;">
				Patient ID : <label id="patientid"></label>
				<input type="hidden" id="cartitemnumber" value="<?= $number; ?>">
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
		<table border="0" cellpadding="0" cellspacing="0" valign="top" class="sub-tab-sections clearfix">
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
	
	<!-- My Cart Display 
	<table width="100%" height="15" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="15" border="0" align="left" class="Heading_Bg" >
				<div width="50%" style="font-family:tahoma,Helvetica,sans-serif;font-size:11px;color:#FFFFFF;">
					<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>
					<strong>&nbsp;&nbsp;Requested Items</strong>
				</div>
			</td>
		</tr>
	</table>-->
    <div class="clearfix">&nbsp;</div>
	<!-- My Requisition start -->
	<div id="checkoutbutton">
		<div class="demo-container hide-footable-sorting">
			<div class="tab-content">
				<div>
					<div class="tab-pane active" id="demo">
						<table data-paging-limit="3" id ="MedicineOrderFromPrescriptionCart" data-paging-size="5" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
					</div>
				</div>
			</div>
		</div>

		<table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder" style="margin-bottom: 15px;">
			<tr>
				<td height="40" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td class="bodytext_bold" style="padding: 5px 10px;">
								<label style="font-style:arial;">* Customer to keep original prescription and hand over to drug store when medicines are delivered.
								</label>
							</td>
						</tr>
						<tr>
							<td style="padding: 5px 10px;">
								<lable id="laberr"></lable>
							</td>
						</tr>
					</table>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="70%">
							<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
							<input type='hidden' id='removetestid' name='removetestid' />
						  </td>
						  <td width="18%" align="center" style="padding: 5px 10px;">
							 <!-- <a href="<?/*= $referer;*/?>">-->
	<!-- 				  		<input id="backbutton" value="Back" class="button"   style="height:25px;width:80px;"  align="center"  readonly="readonly"  /></td>-->
	<!-- 					  	<div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/ccheckout/view'" id="checkoutbutton" >Check Out </div>
	 -->
								<div class="button" style="width:140px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmycart'" id="checkoutbutton" >Check Out </div>
						  </td>
						</tr>
					</table>
				</td>
			</tr>
	  	</table>
	</div>

	<!-- Mt Requisition end -->
	<div class="demo-container hide-footable-sorting clearfix" style="clear: both;">
		<div class="tab-content">
			<div>
				<div class="tab-pane active" id="demo">
					<table data-paging-limit="3" id ="MedicineOrderFromPrescription" data-paging-size="10" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
				</div>
			</div>
		</div>
	</div>
	<div style="margin-bottom: 100px;" class="hidden-xs clearfix">&nbsp;</div>
	<div id="popup" style="width:100%;padding: 10px 0px !important;border:1px solid #a8c8d9;" title="Assign medicines" class="medicine-op-popup">
		<form id="selectform">
		</form>
	</div>
	<input type="hidden" id="orderid"/>
	<input type="hidden" id="selectedchemists"/>
	<input type="hidden" id="appointmentid"/>
	<input type="hidden" id="selectedchemistids">
</div>
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
<?php $medicineorder_json = json_encode($resultmedicineorderfromprescription); ?>
<script>
	jQuery(function($){
		$('#MedicineOrderFromPrescription').footable({
			"columns":[
						{"name":"appointmentid","title":"id","breakpoints":"xs","width":50,"hidden":true,"visible":false},
						{"name":"patientid","title":"Patient Id","breakpoints":"xs","width":50,"hidden":true,"visible":false},
						{"name":"patientuserid","title":"Patient User Id","breakpoints":"xs","width":50,"hidden":true,"visible":false},
						{"name":"docotrid","title":"Doctor Id","width":50,"breakpoints":"xs","hidden":true,"visible":false},
						{"name":"doctoruserid","title":"Doctor User Id","breakpoints":"xs","width":50,"hidden":true,"visible":false},
						{"name":"date","title":"Consultation Date","breakpoints":"xs","width":80,"editable":false},  //changed Appointment Date to Cunsultation Date by Ravi
						{"name":"drname","title":"Doctor Name","breakpoints":"xs","width":80,"editable":false},
						{"name":"medicinename","title":"Medicine","width":150,"formatter":medicineformatter},
						{"name":"appointmentid","title":"Action","formatter":setorderlink}
					],
			"rows":<?php echo $medicineorder_json;?>
		});
	});
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
