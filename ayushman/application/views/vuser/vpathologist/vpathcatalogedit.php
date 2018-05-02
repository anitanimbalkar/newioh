<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
	<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

$(function() {
			//$( "#testdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy',minDate:0});
		});
});
	
	
	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}
	
	
	function dump(obj) {
		var out = '';
		for (var i in obj) {
			out += i + ": " + obj[i] + "\n";
		}
		alert(out);
		// or, if you wanted to avoid alerts...
		/* var pre = document.createElement('pre');
		pre.innerHTML = out;
		document.body.appendChild(pre)*/
	}
	
	
	function onclickproceed()
	{
		$('#addAndProceedStatus').val("true");
		onclickaddtest();
	}
	
	$(document).ready(function(){
		$('#addpopup').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: 500,
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
	 	if($("#cartitemnumber").text() == "0")
	 	{
	 		$("#checkoutbutton").hide(true);
	 	}
	});
function setcalender(date)
	   {
			$( "#testdate" ).datepicker({ yearRange: "-70:+1",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
			$( "#testdate" ).focus();
			document.getElementById("reqdate").value =date;
	   }

function opentestpopup(date)
	   {
		   addtestintopopup();
   		   $( "#addpopup" ).dialog("open");
		   var atcenterflag = document.getElementById("service_provide").value;
		   if (atcenterflag == 1)
				$("#atcenter").attr("checked",true);
			else
				$("#homevisit").attr("checked",true);
		  
		  // $('#service_provide').val(1);
	   }


	function onclickaddtest()
	{
		var radiobtn=document.getElementById("service_provide").value;
		var patid= document.getElementById("patid").value;
		var reqdate = document.getElementById("testdate").value;
		var orderid = document.getElementById("editedorderid").value;
		var totalOrdvalue = document.getElementById("disptotalrate").value;
		var str = document.getElementById("testArrayIds").value;
		var strDiscRate = document.getElementById("testArrayDiscRates").value;		
		var editreason = document.getElementById("editreason").value;
		
		if (str != "")
		{
			var selection = str.split(",");
			var selectionRate = strDiscRate.split(",");
			selection.splice(0,1);			// Remove first zero element
        	selectionRate.splice(0,1);		// Remove first zero element
		}
		else
		{
			var selection = [];
			var selectionRate = [];
		}
		if(selection.length == 0)
			alert("Please select atleast one test for ordering");
		else
		{
			$.ajax({
				url: "/ayushman/cpathologistneworder/editordertest?test="+JSON.stringify(selection)+"&patid="+patid+"&reqdate="+reqdate+"&rate="+JSON.stringify(selectionRate)+"&atcenterflag="+radiobtn+"&orderid="+orderid+"&totalOrdvalue="+totalOrdvalue+"&editreason="+editreason,
				success: function( data ) {
					$( "#addpopup" ).dialog("close");
					parent.window.location.reload();
					},
				error : function(){alert("something has gone wrong.Please contact system administrator.");}
			});
			$( "#addpopup" ).dialog("close");
		}
	}


	function toggleSelection(testName,id,rate,discountperc) 
	{
		var checkid=document.getElementById(id).checked;
		var str = document.getElementById("testArrayIds").value;
		var strRate = document.getElementById("testArrayRates").value;
		var strDiscRate = document.getElementById("testArrayDiscRates").value;
		var strName = document.getElementById("testArrayNames").value;
		
		if (str != "")
		{
			var selection = str.split(",");
			var selectionRate = strRate.split(",");
			var selectionDiscRate = strDiscRate.split(",");
			var selectionName = strName.split("***");
		}
		else
		{
			var selection = [0];
			var selectionRate = [0];
			var selectionDiscRate = [0];
			var selectionName = [0];			
		}
		var idx = selection.indexOf(id);
		if(document.getElementById(id).checked==true)
        {
			arrlength = selection.length;
			selection.push(id);
			selectionRate.push(rate);
			selectionDiscRate.push(Math.round(rate * (100 - discountperc)/100));			
			selectionName[arrlength] = testName;
        }
        else
		{
			// Converting number to string for Comparison
			var strid = ""+id+"";   
			var arrInd = selection.indexOf(strid);
			
			if (arrInd > -1)
            { 
				selectionName.splice(arrInd,1);
				selection.splice(arrInd,1);
        		selectionRate.splice(arrInd,1);
        		selectionDiscRate.splice(arrInd,1);
            }    

			//	addtestintopopup(selection);
        }
		document.getElementById("testArrayIds").value = selection.toString();
		document.getElementById("testArrayRates").value = selectionRate.toString();
		document.getElementById("testArrayDiscRates").value = selectionDiscRate.toString();
		document.getElementById("testArrayNames").value = selectionName.join("***");
		console.log(selectionName);
    }
    function addtestintopopup()
    {
		var strId = document.getElementById("testArrayIds").value;
		var strName = document.getElementById("testArrayNames").value;
		var strRate = document.getElementById("testArrayRates").value;		
		var strDiscRate = document.getElementById("testArrayDiscRates").value;		
		if (strId != "")
		{
			var selection = strId.split(",");
			var selectionRate = strRate.split(",");
			var selectionDiscRate = strDiscRate.split(",");
			var selectionName = strName.split("***");
		}
		else
		{
			var selection = [0];
			var selectionRate = [0];
			var selectionDiscRate = [0];
			var selectionName = [0];			
		}
		
		jQuery('#testinfo').html('');
			
			var textinfomation = "<tr><td width='15%;' class='bodytext_bold' align='left' ><label> Test Name</label></td><td width='5%;' class='bodytext_bold' align='left' ><label> Rates </label></td><td width='5%;' class='bodytext_bold' align='left' ><label> Disc Rates</label></td><td  width='2%' align='right' class='bodytext_normal'>&nbsp;</td></tr>"
			element = $("<table id='"+selection[i]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;'  /><input type='hidden' id='"+i+"testid' name='"+i+"testid' /><input type='hidden' id='"+i+"rate' name='"+i+"rate' />");
			element.appendTo('#testinfo');
			$(textinfomation).appendTo(element);
			
		var totalDiscRate = 0;
		var totalRate = 0;
			
    	for(var i = 1;i<selection.length;i++)
		{
			var testname= "'"+selectionName[i]+"'";
			var testrate = '"'+selectionRate[i]+'"';
			totalRate = Number(totalRate) + Number(selectionRate[i]);
			totalDiscRate = Number(totalDiscRate) + Number(selectionDiscRate[i]);
			var textinfomation = "<tr><td width='15%;' class='bodytext_bold' align='left' id='"+i+"testname"+selection[i]+"' >"+selectionName[i]+"</td><td  width='5%' align='right' class='bodytext_normal'>&nbsp;<label id='"+i+"rates"+selection[i]+"' >"+selectionRate[i]+"</label> </td><td width='5%' align='right' class='bodytext_normal'>&nbsp; <input id='"+i+"disc"+selection[i]+"' type='text' onchange='updateArray("+i+","+"this.value)' value = "+selectionDiscRate[i]+"></input> </td> <td  width='2%' align='right' class='bodytext_normal'>&nbsp;</td></tr>";
			//var textinfomation = "<tr><td width='15%;' class='bodytext_bold' align='left' id='"+i+"testname"+selection[i]+"' >"+selectionName[i]+"</td><td  width='5%'  class='bodytext_normal'>&nbsp;<lable id='"+i+"rates"+selection[i]+"' >"+selectionRate[i]+ '>&nbsp;<lable id='"+i+"Discounted rates"+selectionDiscRate[i]+"'+"</lable> </td></tr>";
			element = $("<table id='"+selection[i]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;'  /><input type='hidden' id='"+i+"testid' name='"+i+"testid' /><input type='hidden' id='"+i+"rate' name='"+i+"rate' />");
			element.appendTo('#testinfo');
			$(textinfomation).appendTo(element);
			document.getElementById(i+"testid").value = selection[i];
			document.getElementById(i+"rate").value = selectionRate[i];
			document.getElementById("reqdate").value = document.getElementById("testdate").value;
		}	

			var textinfomation = "<tr><td width='15%;' class='bodytext_bold' align='left' ><label> Total</label></td><td width='5%;' class='bodytext_bold' align='right' ><label>"+totalRate+" </label></td><td width='5%;' class='bodytext_bold' align='right' ><input id = 'disptotalrate' name='disptotalrate' readonly value="+totalDiscRate+"></input></td><td  width='2%' align='right' class='bodytext_normal'>&nbsp;</td></tr>"
			element = $("<table id='"+selection[i]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;border-bottom:1px solid #a8c8d9;border-top:1px solid #a8c8d9;'  /><input type='hidden' id='"+i+"testid' name='"+i+"testid' /><input type='hidden' id='"+i+"rate' name='"+i+"rate' />");
			element.appendTo('#testinfo');
			$(textinfomation).appendTo(element);
    }
	function updateArray(index,value)
	{
		var totalRate = 0
		// Update Discounted Rates array accordingly
		console.log(index,value);
		var strDiscRate = document.getElementById("testArrayDiscRates").value;		
		if (strDiscRate != "")
			var selectionDiscRate = strDiscRate.split(",");
		else
			var selectionDiscRate = [0];
		if(selectionDiscRate.length > index)
			selectionDiscRate[index] = Number(Math.round(value));
		document.getElementById("testArrayDiscRates").value = selectionDiscRate.toString();
		for (i=1 ; i < selectionDiscRate.length ; ++i)
			totalRate = Number(totalRate) + Number(Math.round(selectionDiscRate[i]));
		document.getElementById("disptotalrate").value= totalRate;
	}
	function setservice(value){

	if(value==1){
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());
		}
	else{
          $('#service_provide').val($('input[name="radiobtn"]:checked').val());

		}
	}

</script>
<div style="width:835px;height:560px;" > 
    <table border="0" cellpadding="0" cellspacing="0" valign="top">
	  	<input type='hidden' id='service_provide' name='service_provide' value='<?php echo $atcenterflag;?>'  />	
		<input id="testid" name="testid" type = "hidden"/>
		<input id="editedorderid" name="editedorderid" value='<?php echo $orderid;?>' type = "hidden"/>
		<input id="testArrayIds" name="testArrayIds"  value='<?php echo $idStr;?>' type = "hidden"/>
		<input id="testArrayRates" name="testArrayRates" value='<?php echo $rateStr;?>'type = "hidden"/>
		<input id="testArrayDiscRates" name="testArrayDiscRates" value='<?php echo $rateStr;?>' type = "hidden"/>
		<input id="testArrayNames" name="testArrayNames" value='<?php echo $nameStr;?>' type = "hidden"/>
		</br>
		<tr>
			<td style="width:1%;height:15px;" >&nbsp;</td>
			<td style="width:800px;height:20px;" align="right" >
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data" action="/ayushman/cpathologistorder/searchandorder">
						<tr>
							<td width="27" align="left">
							</td>							
							<td width="27" align="left">
							</td>
							
							<td width="27" align="left">
								<input id="ordermultipletest" type="button" class="button" value=" Add "  onclick="opentestpopup('addpopup')" readonly="readonly"   style="outline:none;width:100px;height:25px" />
							</td>	
							<td width="27" align="left">
							</td>
							
							<td width="27" align="left">
								<input id="backbtn" type="button" class="button" value=" Back "  onclick="window.history.back();" readonly="readonly"   style="outline:none;width:100px;height:25px" />
							</td>
						</tr>
						<tr>
							<td width="12%" align="center" valign="left">
							</td>
						</tr>
					</form>
				</table>
			</td>
			<td style="width:1%;height:15px;" >&nbsp;</td>
		</tr>
		</table>	
		
	<div style="width:100%;margin-top:18px;height:100%;">
		<table width="100%" height="100%" align="left" cellpadding="0" cellspacing="0" >
			<tr>
				<td width="100%">
				<div style="max-height:100%">
					<table id = "searchguide" width="100%" style="width:100%;height:100%;display:block">
						
					</table>
				</div>
				</td>
			</tr>
			<!-- Display existing Order -->
			<tr>
				<td>
				<div style="max-height:100%">
					<div style="max-height:100%;overflow:auto;">
					    <table id = "searchresult" style="width:100%;display:block;height:100%;font-family:arial;" class="bodytext_normal">
						<tr class="Heading_Bg">
							<td width="150px" align="middle"></td>
							<td width="500px" align="middle">Existing Order</td>
							<td width="200px" align="middle"></td>
						</tr>
						<tr>
							<td>
						    <?php $i=0;
							    $idArray = $idArray;
							    if(count($idArray) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee;padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=1;$i<count($idArray);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'width:100%;background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr style = 'width:100%;'>";
									  }
							   			 $testname="'".$nameArray[$i]."'";
									  echo '<td width="150px" align="center">'.$requestdate.'</td>'.'<td width="500px" align="left">'.$nameArray[$i].'</td>';
									  echo '<td width="200px" align="center">'.$rateArray[$i].'</td>';
									  echo "</tr>";
								  }
							    }
						    ?>
							</td>
						</tr>

					    </table>
				    </div>
				</div>
				</td>
			</tr>

			<!-- Ends here 				-->
			<tr>
				<td>
				<div style="max-height:100%">
					<div style="max-height:100%;overflow:auto;">
					    <table id = "searchresult" style="width:100%;display:block;height:100%;font-family:arial;" class="bodytext_normal">
						<tr class="Heading_Bg">
							<td width="150px" align="middle"></td>
							<td width="500px" align="middle">Catalog</td>
							<td width="200px" align="middle">Rates</td>
						</tr>
						<tr>
							<td>
						    <?php $i=0;
							    $result = $result;
							    if(count($result) == 0){
								  echo '<div style="width:100%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:18px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No Records Found</div>';
							    }else{
								  for($i=1;$i<count($result);$i++){
									  if($i%2 != 0 ){
										  echo "<tr style = 'width:100%;background-color:#ecf8fb;'>";
									  }else{
										  echo "<tr style = 'width:100%;'>";
									  }
							   			 $testname="'".$result[$i][1]."'";
									  if (array_search($result[$i][0],$idArray))
									  {
										echo '<td width="150px" align="center"><input type="checkbox"  onclick="toggleSelection('.$testname.','.$result[$i][0].','.$result[$i][2].','.$result[$i][3].');" name="checkbox" checked value="'.$result[$i][2].'"  id="'.$result[$i][0].'" /></td>';
										echo '<td width="500px" align="left">'.$result[$i][1].'</td>';
										echo '<td width="200px" align="center">'.$result[$i][2].'</td>';
										echo "</tr>";
									  }
									  else
									  {
										echo '<td width="150px" align="center"><input type="checkbox"  onclick="toggleSelection('.$testname.','.$result[$i][0].','.$result[$i][2].','.$result[$i][3].');" name="checkbox" value="'.$result[$i][2].'"  id="'.$result[$i][0].'" /></td>';
										echo '<td width="500px" align="left">'.$result[$i][1].'</td>';
										echo '<td width="200px" align="center">'.$result[$i][2].'</td>';
										echo "</tr>";
									  }
								  }
							    }
						    ?>
							</td>
						</tr>
						<tr>
      							<td height="25" width="100%" colspan="6" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;">&nbsp;<?php echo 'Total Tests : '.$i; ?> 
							</td>
						</tr>

					    </table>
				    </div>
				</div>
				</td>
			</tr>
			 		</table>
			 	
			</form>	
			 
</div>	
</div>
    <div id="addpopup" style="border:1px solid #a8c8d9;overflow-y:hidden;overflow-x:hidden;"  >
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td width="5%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="42%"  align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;">Select Test </td>
				<td width="53%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">
					<img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('addpopup')"/>
				</td>
			</tr>
		</table>
		<div id="contentdiv" style="max-height:300px;overflow-y:auto;overflow-x:hidden;" >
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
			<tr>
				<td height="40" colspan="3" align="left" valign="middle" style="border-bottom:1px solid #a8c8d9;">
					<table width="500" border="0" cellspacing="0" cellpadding="0">
						<tr id="testinfo" >						
						</tr>						
					</table>
				</td>
			</tr>		
			</table>
        </div>
		<table width="100%"  height="auto" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ecf8fb" style="padding-right:10px; padding-top:20px;border-top:1px solid #a8c8d9;"  >
			<tr>
				<input type='hidden' id='testsnumber' name='testsnumber' />
				<input type='hidden' id='reqdate' name='reqdate' />
				<input type='hidden' id='addAndProceedStatus' name='addAndProceedStatus' />				
			</tr>
			<tr>
				<textarea id="editreason" name="editreason" placeholder="Enter Reason for Editing" style="font-size:9pt;background-color:white;width:95%;height:40px;" ></textarea>					
			</tr>

			<tr>
				<td width='5%' class='bodytext_bold' align='left'>
					<div style='float:left;margin-left:10%'>
					<input type='radio' id='atcenter' name='radiobtn' value=1 checked onclick="setservice(this.value);"/>
					<span> At Center </span>
					</div>
				</td>
				<td width='5%' class='bodytext_bold' align='left'>
					<div style='float:left;margin-left:0%'>
					<input type='radio' id='homevisit' name='radiobtn'  value=0  onclick="setservice(this.value);" />
					<span> Home Visit </span>
					</div>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td width="25%" align="left" valign="top" style="padding-top:20px;padding-bottom:10px;padding-left:20px;">
					<label>	Test Requisition Date</label>
 				</td>
 				<td width="15%" align="left" valign="top" style="padding-top:20px;padding-bottom:10px;padding-right:2px;">
					<input id='testdate' name='testdate' readonly= "readonly" style="height:25px;" onclick='setcalender(this.value);' value='<?php echo $requestdate;?>'>
				</td>
 				<td width="15%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
					<input id="AddtoCartbutton" type="button" class="button" value="Place Order"  onclick="onclickaddtest()" readonly="readonly"   style="outline:none;width:75px;height:25px" /></td>
				<td width="10%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;" >
					<input id="AddtoCartbutton" type="button" class="button" value="Cancel"  onclick="closepopup('addpopup')" readonly="readonly"   style="outline:none;width:75px;height:25px" /></td>
			</tr>	
			<tr>
			</tr>
			<tr>
 				<td width="15%" align="right" valign="top" style="padding-top:5px;padding-bottom:10px;padding-right:2px;">
					<label>Payment Offline - Cash </label>
				</td>
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
  	<input type='hidden' id='patid' name='patid' value="<?php echo $patid;?>" />
  	<input type='hidden' id='totaltable' name='totaltable'  />
