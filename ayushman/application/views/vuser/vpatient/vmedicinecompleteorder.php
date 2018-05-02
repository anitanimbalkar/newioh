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
			$('body').addClass('apply-modal')
		});
	});
</script>
<!-- END: Pooja Gujarathi-->
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

function medicineformatter( cellvalue, options, rowObject )
	{
		$('html, body').animate({ scrollTop: 0 }, 1000);
		$('body').addClass('apply-modal-body');
		if(cellvalue != undefined){
			str = cellvalue.replace(/----/g, "<br />");
			
			return str;
		}		
		else
		{
			return cellvalue;
		}
	}

	function medicinesformatter( cellvalue )
	{

		if(cellvalue != undefined){
			var val = cellvalue.split('----');
			return val[1];
		}else{
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
		if(cellvalue == 'completed')
			return "Delivered";
	}

	function setorderlink( cellvalue, options, rowObject )
	{
		$('html, body').animate({ scrollTop: 0 }, 1000);
		$('body').addClass('apply-modal-body');
		return '<a href="#" onclick="opentests('+cellvalue+');" ><font color="#220CE6">Reorder</font></a>';
		// return '<a href="#" onclick="opentests('+cellvalue+')" ><font color="#220CE6">Reorder</font></a>';
	}
	function opentests(cellvalue)
	{
		//if(cellvalue != 'Order Not Placed')
		 document.getElementById('orderid').value = cellvalue;
		// else
		// 	document.getElementById('orderid').value = '';
		$('#popup').dialog('open');
		assignchemist();
	}

	function assignchemist()
	{		
			var mydata = new Array();
			url = '';
			if(document.getElementById('orderid').value != 'undefined')
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
									//	var selectedtests = eval('(' +getselecteditems('divtest',4) + ')');
										chemists = eval('('+chemists+')');
										select = '<select style="width:30%;font-size:9pt;">'
										for(i=0;i<chemists.length;i++)
										{
											select = select +'<option style="font-size:9pt;align:right;" value='+chemists[i][0]+'>'+chemists[i][1]+'</option>';
										}
									//alert(data);
										select = select + '</select>';
										for(var i = 0;i<selectedmedicine.length;i++)
										{
											if(selectedmedicine[i]["drugname"] != '')
											{
												//alert(selectedmedicine[i]["drugname"]);
												var medname=selectedmedicine[i]["drugname"];
												var medvalue = medname.split(" ");
												//console.log(medvalue);
												element = $("<div id='"+selectedmedicine[i]["id"]+"'  style='margin-top:5px; width:99%;'  />");
												element.appendTo('#popup');
													$("<div><label style='border: none; width:70%; padding: 5px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+selectedmedicine[i]["drugname"]+"</label></div>").appendTo(element);
													$("<td width='3%'><div style='float:left;text-align: left;' class='bodytext_bold'>Qty</div></td><td width='25%'><input type='text' id='"+i+"qty' name='"+i+"qty' value='"+selectedmedicine[i]["qty"]+"' style='width:40px;'></td>").appendTo(element);
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
	
	$(document).ready(function(){
		$('#popup').dialog({
					autoOpen: false,
					position: [150, 150],
					width: 550,
					modal:true,
					buttons: {
						"Reorder": function() {
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
								//}
								console.log(JSON.stringify(array));
								$(this).dialog("close");
								$.ajax({
										url: "/ayushman/cpatientmedicinesorder/savetocart?test="+JSON.stringify(array)+"&qty="+qty,
										  success: function( data ) {
										window.location='/ayushman/cpatientmedicinesorder/viewmycart';

										}
									 });
								//window.location.reload();
								}
				 		},
						"Cancel": function() {
							$(this).dialog("close");
						}
					}
				});
		});

</script>

<div class="col-sm-12 no-padding dignostic-container clearfix" >
	<table width="98%" border="0" align="center" cellspacing="0" cellpadding="0" style="display: none;">
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
				<a id="medicineorder" name="medicineorder" onclick="window.location='/ayushman/cpatientmedicinesorder/viewFootable'">Medicines Orders</a>
			</li>
			<li>
				<a id="completedorders" name="completedorders" class="active-tab" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmedicinecompleteorderFootable'">Completed Orders</a>
			</li>
		</ul>
	</div>

	<div id="tabs-1" style="height:auto;padding-left:2px;padding-top:2px;margin-top: 15px;" class="sub-tab-sections">
		<div class="demo-container hide-footable-sorting clearfix" style="clear: both;">
			<div class="tab-content">
				<div>
					<div class="tab-pane active" id="demo">
                        <table data-paging-limit="3" id ="PCompleteOrder" data-paging-size="10" data-paging-limit="3" class="table" data-sorting="true" data-paging="true" style="margin-bottom: 0px !important;"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="orderid"/>
	<input type="hidden" id="selectedchemists"/>
	<input type="hidden" id="appointmentid"/>
	<input type="hidden" id="selectedchemistids">
	<div id="popup" style="width:100%;padding: 10px 0px !important;border:1px solid #a8c8d9;" title="Reorder medicines">
		<form id="selectform">
		</form>
	</div>
</div>
<!-- START: Pooja Gujarathi-->
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
		$('#PCompleteOrder').footable({
			"columns":	[
                            {"name":"deliverydate","title":"Delivery Date","width":60,"breakpoints":"xs"},
                            {"name":"refchemistordersid","title":"Ord.No.","width":60,"breakpoints":"xs"},
                            {"name":"drname","title":"Doctor Name","width":60,"breakpoints":"xs"},
                            {"name":"medicinename","title":"Medicine","width":60,"formatter":medicinesformatter},
                            {"name":"orderqty","title":"Quantity","width":60,"breakpoints":"xs","formatter":medicinesformatter},
                            {"name":"chemistname","title":"Chemist Name","width":60,"breakpoints":"xs"},
                            {"name":"patientid","title":"patientid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"patientuserid","title":"patientuserid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"doctorid","title":"doctorid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"doctoruserid","title":"doctoruserid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"chemistworkphonenumber","title":"chemistworkphonenumber","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"appointmentid","title":"appointmentid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"priority","title":"priority","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"chemistid","title":"chemistid","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"rejectreason","title":"rejectreason","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"patientname","title":"patientname","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"patientmobilenumber","title":"patientmobilenumber","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"prescriptionorder","title":"prescriptionorder","width":60,"hidden":true,"visible":false,"breakpoints":"xs"},
                            {"name":"status","title":"Status","width":60,"breakpoints":"xs","formatter":statusformatter},
                            {"name":"refchemistordersid","title":"Action","width":60,"formatter":setorderlink}
			],
			"rows":<?php echo $tests_json;?>
		});
	});
</script>
<!-- END: Pooja Gujarathi-->
