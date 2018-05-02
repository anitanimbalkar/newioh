<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
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
	function setorderlink( cellvalue, options, rowObject )
	{   
		return '<a href="#" onclick="opentests(undefined,'+cellvalue+');" ><font color="#220CE6">Place Order</font></a>';
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
												element = $("<div id='"+selectedmedicine[i]["id"]+"'  style='border-bottom: 1px solid; margin-top:5px; background-color:#E8E8E8;  width:99%;'  />");
												element.appendTo('#popup');
													$("<div><label style='border: none; width:70%; padding: 0px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+selectedmedicine[i]["drugname"]+"</label></div>").appendTo(element);
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
	$( "#tabs" ).tabs();
		$('#popup').dialog({
					autoOpen: false,
					position: [150, 150],
					width: 550,
					modal:true,
					buttons: {
						"Ok": function() {
						 		var chemistid = new Array();
								popupchildnodes = $('#popup').children();
								array = new Array();
								for(i=0;i<popupchildnodes.length;i++)
								{
									element = $(popupchildnodes[i]).children()[1];
									array[i] = new Array(3);
									array[i][0] = popupchildnodes[i].id;
									array[i][1] = element.selectedIndex+','+element[element.selectedIndex].text;
									array[i][2] = element.value;
									chemistid.push(element.value);
								}
								$('#selectedchemistids').val(JSON.stringify(chemistid));
								$('#selectedchemists').val(JSON.stringify(array));
								$(this).dialog("close");
								var url1="";
								if(document.getElementById('orderid').value == 'undefined')
								{
								  url1="/ayushman/cemr/requestmedicines?ids="+document.getElementById('selectedchemists').value+"&appid="+document.getElementById('appointmentid').value;
								}
								else{
									url1= "/ayushman/cemr/reasignmedicines?ids="+document.getElementById('selectedchemists').value+"&appid="+document.getElementById('appointmentid').value;
								}
								$.ajax({
								  url: url1, 	
								  success: function( data ) {
								  		$.ajax({
								  			url: "/ayushman/cpatientmedicines/retrunchemistuserids?ids="+document.getElementById('selectedchemistids').value, 
								  			success: function( data ) { 
								  			var chemistuserid = eval('('+data+')');
								  			for(var i = 0;i<chemistuserid.length;i++)
											{
												parent.sendmsgfromtemplate('pullgriddata',chemistuserid[i]);
										 	}
										},
										error : function(){alert("error while inserting medicines");}
										});
										refreshallgrid();
									}
							  });
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
        		content: "Here you can place your order using <br/>(1).Presciption ordered by doctor using indiaOnlineHealth.<br/>(2).Reorder the previously ordered set of tests.<br/>(3).Search tests in list of tests, add to cart and place order.",
     		    target: "#medicines",
     		    fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
     		    placement: "bottom",
				
	         },
      		{
        		title: "Medicine Orders",
  			    content: "Here you can view, track status and reassign your order to some other Pathologist.",
 		        target: "#medicineorder",
 		        fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
 		        placement: "bottom"
 		     },
      
  		    {
		        title: "Completed Order",
 		        content: "Here you can directly place order for the test prescribed by doctor to you using indiaOnlineHealth.",
		        target: "#completedorders",
		        fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
		        placement: "bottom"
		      },
      		{
        		title: "Presciption Medicines",
  			    content: "Get the list of previously ordered test and reorder the set again if you want. ",
 		        target: "#prescriptionorder",
 		        fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
 		        placement: "bottom"
 		     },
			 {
				title: "Search and order",
				content:"If you have a hardcopy of a prescription and you want to order tests this is the place where you can search and place order for the tests yourself. ",
				target:"#searchtest",
				fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
 		        placement: "bottom"
				
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

	   
</script>

<div id="body_contantpatientpage" style="width:820px; height: 100%;">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			 <tr>
				<td width="100%" colspan="2" class="Heading_Bg">&nbsp;
					<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Medicines</strong>
				</td>
			</tr>
			  <tr>
				  <td align="center" style="font-size: 11px;font-family:tahoma,Helvetica,sans-serif;visibility:hidden;">
					Patient ID : <label id="patientid"></label>
					<input type="hidden" id="cartitemnumber" value="<?= $number; ?>">
				</td>
			  </tr>

		</table>
	<div id="tabs1" style="float:left;vertical-align:top;height:100%;width:100%;position:relative;overflow-y:none;background:transparent;border:none;">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

			  <tr>
					  	<td id="medicines"name="medicines" onmouseover="showstep(0)" onmouseout="hidestep()" width="3%" align="center" valign="middle" class="Rounded_buttonOrenge" onclick="window.location='/ayushman/cpatientmedicines/view'">Medicines</td>
					  	<td id="medicineorder" onclick="window.location='/ayushman/cpatientmedicinesorder/view'" name="medicineorder" onmouseover="showstep(1)" onmouseout="hidestep()"width="5%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue" >Medicines Orders</td>
					  	<td id="completedorders" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmedicinecompleteorder'" name="completedorders" onmouseover="showstep(2)" onmouseout="hidestep()" width="5%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue" >Completed Orders</td>
					  	<td width="20%">&nbsp;</td>
					  	<td width="1%">&nbsp;</td>
					  	<td width="1%">&nbsp;</td>
					  	<!-- <td width="12%" align="center" valign="middle">
	  						<div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/ccheckout/view'" id="checkoutbutton" >Check Out </div>
	  					</td> -->
					</tr>
					<tr>
					  	<td height="30" colspan="6" align="left" valign="middle" class="bodytext_normal" style="border:1px solid #b5d5e3;">
						  	<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
							<tr>
							  	<td id="prescriptionorder" bgcolor="#fcfbfb" name="prescriptionorder" onmouseover="showstep(3)" width="20%" align="center" class="bodytext_bold"   style="border-right:1px solid #a3ccde;">
							  		<a href="/ayushman/cpatientmedicines/view" style="color:#ff6e02;">Order from Prescription</a></td>
							  	<td id="searchtest" name="searchtest"onmouseover="showstep(4)" onmouseout="hidestep()"width="15%" align="center" class="bodytext_bold" style="border-right:1px solid #a3ccde;">
							  		<a href="/ayushman/cpatientmedicinesorder/searchandorder" >Search and Order</a></td>
							  	<td width="55%" align="right">&nbsp;
 		  						<div class="button" style="align:right;width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;margin-bottom:10px;" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmycart'" id="checkoutbutton" >Requisition</div>
								</td>
							</tr>
							</table>
					  </td>
					</tr>
					
			</table>
			</div> 

		<div id="tabs-0" style="height:auto;padding-left:2px;padding-top:2px;">	
				<table border="0" align="left" cellpadding="0" cellspacing="0">
								<tr>
									<td style="width:1%;" >&nbsp;</td>
									<td style="width:98%;">
										<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
											<tr>
												<td >
													<?php
													//this is emr grid for patient we can put this in other page
													$tests= Request::factory('xjqgridcomponent/index');
													$tests->post('name','prescriptionmedicine');
													$tests->post('height','340');
													$tests->post('width','810');
													$tests->post('sortname','appointmentid');
													$tests->post('sortorder','desc');
													$tests->post('tablename','prescriptionmedicine');//used for jqgridp
													$tests->post('columnnames', 'appointmentid,date,drname,medicinename,appointmentid');//used for jqgrid
													$tests->post('whereclause',"[patientuserid,=,".$userid."][medicinename,!=,NULL]");//used for jqgrid
													$columninfo = 	'[  
																		{"name":"id","index":"appointmentid","width":50,"hidden":true},
																		{"name":"Consultation Date","index":"date","width":80,"editable":false},  //changed Appointment Date to Cunsultation Date by Ravi
																		{"name":"Doctor Name","index":"drname","width":80,"editable":false},
																		{"name":"Medicine","index":"medicinename","width":150,"formatter":medicineformatter},
																		{"name":"Action","index":"appointmentid","width":50,"formatter":setorderlink}
																	]';
													$tests->post('columninfo', $columninfo);
													$tests->post('editbtnenable','false');
													$tests->post('deletebtnenable','false');
													$tests->post('savebtnenable','false');
													echo $tests->execute(); ?>
												</td>
											</tr>
										</table>
									</td>
									<td style="width:1%;" >&nbsp;</td>
								</tr>
								
							</table>
				</div>
				<div id="popup" style="width:100%;" title="Assign medicines to Chemist">
				
				</div>
				<input type="hidden" id="orderid"/>
				<input type="hidden" id="selectedchemists"/>
				<input type="hidden" id="appointmentid"/>
				<input type="hidden" id="selectedchemistids">
				
