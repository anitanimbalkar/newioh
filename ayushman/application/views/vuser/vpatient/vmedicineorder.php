<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
<!-- START: Pooja Gujarathi-->
<link href="/ayushman/assets/cssF/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css">.
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
			$('body').addClass('apply-modal')
		});
	});
</script>
<script>
	$( document ).ready(function() {
		$('.select-btn').click(function() {
			$('body').addClass('apply-modal-body')
		});
	});
</script>
<script type="text/javascript">
	function setlink( cellvalue, options, rowObject )
		{
			$('html, body').animate({ scrollTop: 0 }, 1000);
			$('body').addClass('apply-modal-body');
			var status;
			for(var index =0; index < options.rows.length;index++){
				if(options.rows[index].refchemistordersid==cellvalue){
					status=options.rows[index].status;
				}
			}
			$orderid =cellvalue; //$(rowObject).children()[4].firstChild.data;
			if(status == "requested" ||status == "rejected" )
			{
				 return '<a href="#" onclick="reassign('+$orderid+');" class="requsition-popup-links" >Reassign Chemist</a><a  href="#" onclick="removetest('+$orderid+');" title="Cancel Requisition" class="requsition-popup-links">Cancel</a>';
			}
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

	function qtyformatter( cellvalue, options, rowObject )
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

	function statusformatter( cellvalue, options, rowObject )
	{ 
		if(cellvalue == 'accepted')
			return "order<br/>in process";
		if(cellvalue == 'requested')
			return "Confirmation</br>pending";
		if(cellvalue == 'accepted')
			return "Order <br/>in process";
		if(cellvalue == 'rejected')
			return "Order<br/>rejected";
		else 
		return cellvalue; 
	}

	function testsformatter( cellvalue, options, rowObject )
	{
		for(var index =0; index < options.rows.length;index++){
			if(options.rows[index].tests==cellvalue){
				var appoinmentid=options.rows[index].appointmentid;
			}
		}
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i< arr.length;i++)
		{
			var appid=appoinmentid;
			var testname= "'"+arr[i]+"'";
			string = string +'<a onclick="opentestinfo('+appid+','+testname+')"  style="cursor:hand;" title="'+arr[i]+' test information">'+ i+' ) '+arr[i]+"</a><br />";
		}
		return string;
	}

	function removetest(orderid)
	{
		showMessage('250','50','Remove test','Do you really want to remove Order '+orderid+' ?','confirmation','confirmRemoveTest');
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
	function reassign(orderid)
	{
		document.getElementById('orderid').value =orderid;
		$('#popup').dialog('open');
		assignchemist();
	}
	$(document).ready(function(){
	$( "#tabs" ).tabs();
		$('#popup').dialog({
					autoOpen: false,
					position: [150, 150],
					width: 550,
					modal:true,
					buttons: {
						"Reassign": function() {
							var testnumber = document.getElementById("testsnumber").value;
							var test=new Array();
							var orderid= document.getElementById("orderid").value;
				
				// new code
							var chemistid = new Array();
								popupchildnodes = $('#popup').children();
								array = new Array();
								for(i=0;i<popupchildnodes.length;i++)
								{
									//var qty = document.getElementById(i+"qty").value;
									element = $(popupchildnodes[i]).children()[1];
									array[i] = new Array(3);
									array[i][0] = popupchildnodes[i].id;
									array[i][2] = element.value;
								}
									$(this).dialog("close");
								
				// end new code

					$.ajax({
						url: "/ayushman/cpatientmedicinesorder/reassigntests?orderid="+orderid+"&test="+JSON.stringify(array),
						success: function( data ) {
							parent.getcontent('/ayushman/cpatientmedicinesorder/viewFootable');
						},
					error : function(){alert("something has gone wrong.Please contact system administrator.");}
					});
			
				 			},
						"Cancel": function() {
							$(this).dialog("close");
						}
					}
				});
		});


	function assignchemist()
	{		
			var mydata = new Array();
			url = '';
			if(document.getElementById('orderid').value != '')
			{
				url = "/ayushman/cpatientmedicinesorder/getmedicinesusingorderid?orderid="+document.getElementById('orderid').value;
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
										//alert(data);
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
												element = $("<div id='"+selectedmedicine[i]["id"]+"'  style='margin-top:5px; width:99%;'  />");
												element.appendTo('#popup');
													$("<div><label style='border: none; width:70%; padding-left: 5px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+selectedmedicine[i]["drugname"]+"</label></div>").appendTo(element);
													$(select).appendTo(element);
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
																// $('#popup').dialog('open');
									document.getElementById('medid').value=selectedmedicine[i]["id"];

										}
									}
						document.getElementById("testsnumber").value =selectedmedicine.length;
							},
							error : function(){alert("error");}
						  });
				},
				error : function(){alert("error");}
			  });
	}

	function removeselectedtest()
	{
		 var orderid=  $("#removetestid").val();
		$.ajax({
			url: "/ayushman/cpatientmedicinesorder/removeorder?orderno="+orderid,
			success: function( data ) {
				parent.getcontent('/ayushman/cpatientmedicinesorder/viewFootable');
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
</style>
<div class="col-sm-12 no-padding dignostic-container clearfix" >
	<table width="98%" border="0" align="center" cellspacing="0" cellpadding="0" style="display: none;">
		<input type='hidden' id='testsnumber' name='testsnumber' />
	  	<tr>
		  	<td align="center" style="font-size: 11px;font-family:tahoma,Helvetica,sans-serif;visibility:hidden;">
				Patient ID : <label id="patientid"></label>
			</td>
	  	</tr>
	</table>
	<div class="tab-section">
		<ul>
			<li>
				<a id="medicines" name="medicines" onclick="window.location='/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription'">Medicines</a>
			</li>
			<li>
				<a id="medicineorder" name="medicineorder" class="active-tab" onclick="window.location='/ayushman/cpatientmedicinesorder/viewFootable'">Medicines Orders</a>
			</li>
			<li>
				<a id="completedorders" name="completedorders" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmedicinecompleteorderFootable'">Completed Orders</a>
			</li>
		</ul>
	</div>


	<div id="tabs-1" style="height:auto;padding-left:2px;padding-top:2px;margin-top: 15px;" class="sub-tab-sections">
		<div class="demo-container hide-footable-sorting clearfix" style="clear: both;">
			<div class="tab-content">
				<div>
					<div class="tab-pane active" id="demo">
						<table data-paging-limit="3" id ="PMedicineOrder" data-paging-size="10" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="popup" style="width:100%;padding: 10px 0px !important;border:1px solid #a8c8d9;" title="Assign Chemist" class="assign-chemist">
		<form id="selectform">
		</form>
	</div>
  	<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
	<input type='hidden' id='removetestid' name='removetestid' />
	<input type="hidden" id="orderid"/>
	<input type="hidden" id="selectedchemists" name="selectedchemists"/>
	<input type="hidden" id="selectedchemistids" name="selectedchemistids">
	<input type="hidden" id="medid" name="medid">
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
</script>
<script>
	jQuery(function($){
		$('#PMedicineOrder').footable({
			"columns": [  
							{"name":"date","title":"Order Date","width":60,"breakpoints":"xs","editable":false},
							{"name":"patientuserid","title":"patientuserid","width":50,"breakpoints":"xs","visible":false,"hidden":true},
							{"name":"doctoruserid","title":"doctoruserid","width":50,"breakpoints":"xs","visible":false,"hidden":true},
							{"name":"appointmentid","title":"appointmentid","width":50,"breakpoints":"xs","visible":false,"hidden":true},
							{"name":"refchemistordersid","title":"Ord.No","breakpoints":"xs","width":40},
							{"name":"chemistworkphonenumber","title":"chemistworkphonenumber","width":80,"breakpoints":"xs","visible":false,"editable":false,"hidden":true},
							{"name":"medicinename","title":"Medicine","width":130,"formatter":medicineformatter},
							{"name":"orderqty","title":"Quantity","width":35,"breakpoints":"xs","formatter":qtyformatter},
							{"name":"chemistname","title":"Chemist Name","width":60,"editable":false,"breakpoints":"xs","hoverrows":false},
							{"name":"status","title":"Status","width":60,"breakpoints":"xs","formatter":statusformatter},
                            {"name":"deliverydate","title":"deliverydate","visible":false,"breakpoints":"xs","width":50,"hidden":true},
							{"name":"refchemistordersid","title":"Action","width":120,"formatter":setlink}

					],
			"rows":<?php echo $tests_json;?>
		});
	});
</script>

