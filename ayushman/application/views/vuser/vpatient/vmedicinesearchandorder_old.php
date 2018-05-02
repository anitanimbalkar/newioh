<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
	<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>

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
			$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
		});
});

	function addtocart( cellvalue, options, rowObject )
	{
		return '<a href="#" onclick="openaddpopup('+cellvalue+')" ><font color="#220CE6">Select</font></a>'	
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
			//var appid= document.getElementById("appid").value;
			//alert(testnumber);
			//alert(test);

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
						test[i][1] = $("#"+j+"select"+testid).val();
						i++;
					
				}
					var testreqdate = document.getElementById("testdate").value;

				$.ajax({
					url: "/ayushman/cpatientmedicinesorder/savetocart?test="+JSON.stringify(test)+"&testreqdate="+testreqdate+"&qty="+qty,
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
						}	
					},
				error : function(){alert("something has gone wrong.Please contact system administrator.");}
				});
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
					var textinfomation = "<tr><td width='1%' height='27px' >&nbsp;</td><td width='37%;' class='bodytext_bold' align='left' id='"+i+"testname"+recommenedtests[i]["id"]+"' >"+recommenedtests[i]["testname"]+"</td><td width='35%' class='bodytext_normal' align='center' >"+select+"</td><td width='3%'><div style='float:left;margin-right:40px' class='bodytext_bold'>Qty</div></td><td width='1%'><input type='text' id='"+i+"qty' name='"+i+"qty' style='width:40px;'></td><td width='7%' class='bodytext_normal' align='right'><span class='bodytext_bold'> Fees: </span></td></div></tr><tr><td width='1%' height='27px' >&nbsp;</td><td width='7%' height='27px' >&nbsp;</td></tr>";
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
	
	// function testcatagartyonchange(selectlist)
	// {
	// 	window.location ="/ayushman/cpatientrequistiontests/setwherefororderedtests?where="+$(selectlist).val();
	// }
	
	function dump(obj) {
		var out = '';
		for (var i in obj) {
			out += i + ": " + obj[i] + "\n";
		}
		//alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}
	
	
	// function onclickproceed()
	// {
	// 	$('#addAndProceedStatus').val("true");
	// 	onclickaddtocart();
	// }
	
	$(document).ready(function(){
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
	 	}
	 // 	dropdown = document.getElementById("testcatagarty");
		// itemToSelect = "<?= $where?>";
		// for (iLoop = 0; iLoop< dropdown.options.length; iLoop++)
		// {
		// 	if (dropdown.options[iLoop].value == itemToSelect)
		// 	{
		// 		dropdown.options[iLoop].selected = true;
		// 		break;
		// 	}
		// }
		tour = {
   		 id: "hello-hopscotch",
		 i18n: {
        			stepNums : [<?php echo '""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""';?>]
 				},

 	  		 
    	steps: [
      
      		{
        		title: "Requisition",
        		content: "Here you can place your order using <br/>(1).Presciption ordered by doctor using indiaOnlineHealth.<br/>(2).Reorder the previously ordered set of tests.<br/>(3).Search tests in list of tests, add to cart and place order.",
     		    target: "#requisition",
     		    fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
     		    placement: "bottom",
				
	         },
      		{
        		title: "View Orders",
  			    content: "Here you can view, track status and reassign your order to some other Pathologist.",
 		        target: "#vieworder",
 		        fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
 		        placement: "bottom"
 		     },
      
  		    {
		        title: "Order from Presciptions",
 		        content: "Here you can directly place order for the test prescribed by doctor to you using indiaOnlineHealth.",
		        target: "#prescriptionorder",
		        fixedElement:false,
				showCloseButton:false,
				showNextButton: false,
		        placement: "bottom"
		      },
      		{
        		title: "Reorder",
  			    content: "Get the list of previously ordered test and reorder the set again if you want. ",
 		        target: "#reorder",
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
	  	   hopscotch.startTour(tour, step);
	   }
	   function hidestep()
	   {
			hopscotch.endTour([true]);
	   }
</script>
<div style="width:835px;height:560px;" > 
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
							  		<a href="/ayushman/cpatientmedicines/view" >Order from Prescription</a></td>
							  	<td id="searchtest" name="searchtest"onmouseover="showstep(4)" onmouseout="hidestep()"width="15%" align="center" class="bodytext_bold" style="border-right:1px solid #a3ccde;">
							  		<a href="/ayushman/cpatientmedicinesorder/searchandorder" style="color:#ff6e02;">Search and Order</a></td>
							  	<td width="55%">&nbsp;</td>

							<td width="12%" align="center" valign="left">
	  						<div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/cpatientmedicinesorder/viewmycart'" id="checkoutbutton" >Requisition</div>
	  					</td>
						</tr>
					</table>
					  </td>
					</tr>
					
			</table>
			</td>
			<td style="width:1%;">&nbsp;</td>
		</tr>
		
		<tr>
			<td style="width:1%;height:15px;" >&nbsp;</td>
			<td style="width:800px;height:20px;" align="right" >
				<table width="800" border="0" cellspacing="0" cellpadding="0">
					<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data" action="/ayushman/cpatientmedicinesorder/searchandorder">
						<tr>
							<td width="10">&nbsp;</td>
						  	<td width="10" class="bodytext_bold" align="left">Search :</td>
						  	<td width="80" align="left" >
						  		<input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  	<td width="20" align="left">
						  		<input type="submit" style="border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						
						<td width="350" height="5%">
<!-- 							<input name="medName" class = "textarea1" id = "medName" autocomplete="off" ng-model="medName" onblur="setId()" placeholder="Medicine name..." size="30" onclick="if (this.value == 'Medicines :') this.value = '';" class="notes"></input>
 -->						</td>
						

<!-- 						  	<td height="30" width="100" class="bodytext_bold">Test Categories :</td>
 -->						  	<!-- <td width="227">
						  		<select style="width:120;" name="testcatagarty" id="testcatagarty" onchange="testcatagartyonchange(this);" >
						  			<option value="">All</option>
						  			
						  		</select>
						 	</td> -->
						  	</tr>
						
					</form>
				</table>
			</td>
			<td style="width:1%;height:15px;" >&nbsp;</td>
		</tr>	
		<tr> 
			<td style="width:1%;">&nbsp;</td>
			<td style="width:98%;">
				<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
					<tr>
						<td >
							<?php
							//this is emr grid for patient we can put this in other page
							$tests= Request::factory('xjqgridcomponent/index');
							$tests->post('name','medicines');
							$tests->post('height','280');
							$tests->post('width','815');
							$tests->post('sortname','drugname');
							$tests->post('sortorder','asc');
							$tests->post('tablename','drug');//used for jqgridp
							$tests->post('columnnames', 'drugname,id,id');//used for jqgrid
						    $tests->post('whereclause',$whereclause);//used for jqgrid
							$columninfo = 	'[
												{"name":"Medicine Name","index":"drugname","width":200},
												{"name":"Medicineid","index":"id","width":100,"hidden":true},
												{"name":"Select","index":"id","width":60,"formatter":addtocart}
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
			</td>
			<td style="width:1%;" ><label  style="visibility:hidden;" id="patientid"></label></td>
		</tr>
        </table>
    <div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Assign tests to Dignostic Center </td>
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
						<tr id="testinfo" >
						
						</tr>
						<tr>
<!-- 							<td width="1%">&nbsp;</td>
 -->							<td class="bodytext_bold" align="left">
								<div style='float:left;margin-bottom:10px;margin-left:10px;'>Req Date</td>
							<td colspan="3"  align="left">
								<div style='float:left;margin-bottom:10px;margin-left:-308px;'>
								<input id='testdate' value='<?php echo date('d M Y');?>'></td>

						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="auto" colspan="3" align="left" valign="middle" >
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="40" align="left" class="bodytext_error"  style="width:328px;padding-left:10px;" >
								<lable id="laberr"></lable></td>
							<td height="40" align="right"  class="bodytext_bold"  style="width:85px;padding-top:10px;" valign="top" >Total Amount&nbsp;:&nbsp; </td>
							<td id="tdtotalamount" class="bodytext_normal" style="width:66px;padding-top:10px;" valign="top">
								<lable id="labtesttotalfees" class='totalfee'>0</lable></td>
						</tr>
					</table>
				</td>
			</tr>
			</table>
        </div>
    	<table width="100%"  height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb" style="padding-right:10px;border-top:1px solid #a8c8d9;"  >
			<tr>
				<td width="45%">
					<input type='hidden' id='testsnumber' name='testsnumber' />
					<input type='hidden' id='addAndProceedStatus' name='addAndProceedStatus' /></td>
				<td width="30%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
<!-- 					<input id="AddtoCartbutton" type="button" class="button" value="Add to cart & proceed"  onclick="onclickproceed()" readonly="readonly"   style="outline:none;width=100%;height:25px" /></td>
 -->			<td width="15%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
					<input id="AddtoCartbutton" type="button" class="button" value="Add to requisition"  onclick="onclickaddtocart()" readonly="readonly"   style="outline:none;width=100%;height:25px" /></td>
				<td width="10%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;" >
					<input id="AddtoCartbutton" type="button" class="button" value="Cancel"  onclick="closepopup('addpopup')" readonly="readonly"   style="outline:none;width=75px;height:25px" /></td>
			</tr>	
    	</table>
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
