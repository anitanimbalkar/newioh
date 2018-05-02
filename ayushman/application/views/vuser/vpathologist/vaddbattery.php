<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/app/css/main.css" rel="stylesheet" type="text/css" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css">
<!--<script src="/ayushman/assets/app/js/jquery.min.js"></script>-->
<script src="/ayushman/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
 				&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png">
				&nbsp;&nbsp;
        		<font size="2" color="white">Edit Battery</font>
            </td>
			<td>
				<!--<a style="float:right;padding-top:5px;padding-right:10px" href="/ayushman/cpathologistbattery/view">
					<font size="3" color="white">Back</font>
				</a>-->
				<a style="float:right;" href="/ayushman/cpathologistbattery/view">
					<img src="/ayushman/assets/images/goback2.png" style="width:80px;height:30px;" title="Back">
				</a>
			</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			</br>
		</tr>
		<tr>
		    <td style ="width:50%">
        		<input id ="batteryname" type="text" style="width:400px;padding-left:20px" class="textarea" value="<?php echo $batteryname ?>" placeholder="Enter battery name" title="Enter battery name" />
            </td>
			<td  style ="width:20%;padding-left:20px">
        		<input id ="addtestname" type="text" placeholder= "Enter Test name" class="textarea" style="width:200px;" title="Search test name" />
            </td>
			
		    <td  style ="width:20%;padding-right:10px">
        		<input type="button" class="button" style="float:right" value="Save to battery" onclick="savebattery();" title="Save changes to battery"/>
            </td>
		</tr>
	</table>
		<input id ="selectedtestid" type="hidden" />			
		<input id ="pathologistid" type="hidden" value = <?php echo $pathologistid ?> />			
   		<input id ="batteryid" type="hidden" class="textarea" value="<?php echo $batteryid ?>" />
	<table style="">
		<?php
			$batindex = 1;
			$packagecost = 0;
			foreach ($arrbattery as $battery)
			{
				echo '<tr style="width:100%;margintop:5px">';
				echo '<td style="width:70%;padding-left:20px">';
				echo  $batindex; echo ". ";
				echo $battery['testname'];
				echo '<td style="width:10%"> <span class="iconDelete ng-scope" style="width:30px" title="Remove '; echo $battery['testname']; echo ' from battery" onclick="deletetest('; echo $battery['testid']; echo');"></span> </td>';
				echo '<td style="width:50%;text-align:right;padding-right:180px;"> ';echo $battery['standardrate'];echo '</td>';
				echo '</tr>';								
				$batindex = $batindex + 1;	
				$packagecost = $packagecost + $battery['standardrate'];;
			}

			echo '<tr style="width:100%;background-color:#1c75bc;font-size:13px"><td style="width:5%"> </td>';
			echo '<td style="width:50%;color:white;text-align:right;"> Total price (Rs.) :&nbsp;&nbsp;</td>';
			echo '<td style="width:10%;color:white"> ';
			echo '<input readonly id="packagecost" style="background-color:#1c75bc;color:white;text-align:right;padding-right:180px;border-style:hidden" value="';
			echo $packagecost ;
			echo '"/>';
			echo '</td></tr>';												
		?>
	</table>
		</br>
		<label style="padding-left:50px">Offered price (Rs.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
       	<input id ="offeredcost" type="number" class="textarea" min="0" style="width:100px;" onchange="calcDiscount();" value="<?php echo $standardofferedcost ?>" title="Enter total battery cost" />
		</br>
		<label style="padding-left:50px;">Package discount (%) :</label>
       	<input readonly id ="offereddiscount" class="textarea" style="width:100px;"value="" title="Enter discount offered on site" />				
	    </br></br>
		<table width="100%" height="20px" border="0" cellpadding="0" cellspacing="0" style="align:left;">
          <tr style="width:100%;background-color:#1c75bc;font-size:15px">		  
            <td width="2%">
				<a  data-toggle="collapse" style="width:100%" data-parent="#accordion" href="#allgroups" class="collapsed">
					<span style="color:#1c75bc;background-color:#1c75bc;float:left;"title="Add discounts for groups">--</span> <i class="fa fa-compress" style="color:white;float:right;right:10px;font-size:23px;"></i>
				</a> 
 		    </td>
			<td width="2%">
			<a style="float:right;width:100%" data-toggle="collapse" data-parent="#accordion" href="#allgroups" class="collapsed">
				<img src="/ayushman/assets/images/add_button.png" style="width:21px;height:21px" title="Add discounts for groups">
			</a>
			</td>
            <td width="15%">
				<a id="allgroupslink" data-toggle="collapse" style="width:100%" data-parent="#accordion" href="#allgroups" class="collapsed">
					<span style="color:white;background-color:#1c75bc;float:left;font-size:13px;font-weight:bold"title="Add discounts for groups">Discount groups</span> <i class="fa fa-compress" style="color:white;float:right;right:10px;font-size:23px;"></i>
				</a> 
 		    </td>
			<td width="80%">
				<a id="allgroupslink"data-toggle="collapse" style="width:100%" data-parent="#accordion" background="/ayushman/assets/images/dropdown-arrow.png" href="#allgroups" class="collapsed">
					<span style="color:#1c75bc;background-color:#1c75bc;float:left;left:0" title="Add discounts for groups">-----------------------------------------------------------------------------------------------------------------------</span> <i class="fa fa-compress" style="color:white;float:right;right:10px;font-size:23px;"></i>
				</a> 
 		    </td>
		  </tr>
		</table>			
		</br>
	<div id="allgroups" class="panel-collapse collapse" style="width:700px;background:white">		
    <table width="100%">	
		<tr style="width:100%;margintop:5px">
			<td style="width:20%;padding-left:20px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td style="width:20%;"><label> Discount (%)</label></td>
			<td style="width:60%;"><label> Offered price(Rs.)</label></td>
		</tr>
		<tr>
				<?php
					$batindex = 1;
					$discStr = "";
					
					foreach ($arrGrps as $group)
					{
						echo '<tr style="width:100%;margintop:5px">';
						echo '<td style="width:20%;padding-left:20px">';
						echo  $batindex; echo ". ";
						echo $group['groupname']; echo '</td>';
						echo '<td style="width:20%;"> ';
						echo '<input id="';echo $group['groupid'];echo 'discInp';echo'" type="number" min="0" max="100" class="textarea" style="width:100px;" onchange="setvalues(this)" value ="';echo $group['discount']; echo '" />';echo '</td>';
						echo '<td style="width:20%;">';
						echo '<input id="';echo $group['groupid'];echo'discGrp';echo'" type="text" readonly class="textarea" style="width:100px;"</td>';
						echo '</tr>';								
						$batindex = $batindex + 1;	
						$discStr = $discStr.$group['groupid'] . ':'.$group['discount'].',';
					}
					echo '<input id="discountStr" type="hidden" value="';echo $discStr; echo'"/>';				
				?>
				
		</tr>
	</table>
	</div>
	<form id="">
	</form>
</div>
<script type="text/javascript">
$(document).ready(function() {
	// Search all active tests which are not of battery type.
	//------------------------------------------------------
	$pathologistid = document.getElementById("pathologistid").value;
	$query = "select test_name from pathologistcatalogs,testmasters where  refdiscgroupid_c = -1  and pathologistcatalogs.refpathcatalogtestid_c = testmasters.id and testmasters.active_c = 1 and testmasters.reftestsubcategoryid_c != 11 and refpathcatalogpathologistsid_c = "+$pathologistid+" and test_name ";
	$('#addtestname').focus(function(){
		//var urltestname= "/ayushman/cautocompleter/autocomplete?column=testname_c&query=select testname_c from testmasters where (active_c = 1) and (reftestsubcategoryid_c != 11) and testname_c";
		var urltestname= "/ayushman/cautocompleter/autocomplete?column=test_name&query="+$query;
		$("#addtestname").autocomplete({source: urltestname});
		
	});
	calcDiscount();
	calcGrpDiscount();
});

function deletetest($testid)
{
	showMessage('250','50','Remove test from battery','Do you really want to remove test?','confirmation','cancelappointmentpopup');
	document.getElementById("selectedtestid").value = $testid;
}

var Confirmation_Event = function(id,confirmation){
	$batid = document.getElementById("batteryid").value;
	$testid = document.getElementById("selectedtestid").value ;
	if(confirmation == 'yes')
	{		
		$.ajax({
		type: "get",
		url: "/ayushman/cpathologistbattery/deletetest?batteryid="+$batid+"&testid="+$testid,
		success: function(){
			showMessage('350','50','Message','Test removed from battery','information',5000);
			location.reload();
		}
		});
	}
}
function calcDiscount()
{
	$totalcost = document.getElementById("packagecost").value;
	$offcost = document.getElementById("offeredcost").value;
	
	if((Number($totalcost)> 0)&&(Number($offcost)>0))
	{
		document.getElementById("offereddiscount").value = (((Number($totalcost)) - (Number($offcost)))*100/(Number($totalcost))).toFixed(2);
	}
	else
	{
		document.getElementById("offereddiscount").value = "";	
	}	
}
function setvalues($object)
{
	// String will be in format "groupid:discount,groupid:discount ....."
	$newStr = "";
	$arrGrp = (document.getElementById("discountStr").value).split(",");
	for (i=0;i< $arrGrp.length - 1; ++i )
	{
		console.log($arrGrp[i]);
		$indgroup = $arrGrp[i].split(":");
		if(($indgroup[0]+"discInp")== $object.id)
			$indgroup[1]= $object.value;
		
		$newStr = $newStr + $indgroup[0] + ":" + $indgroup[1] + ",";
	}
	document.getElementById("discountStr").value = $newStr;
	// Calculate cost to consumer from the entered discount
	calcGrpDiscount();
}
function calcGrpDiscount()
{
	$offcost = document.getElementById("offeredcost").value;	
	$arrGrp = (document.getElementById("discountStr").value).split(",");
	for (i=0;i< $arrGrp.length - 1; ++i )
	{
		$indgroup = $arrGrp[i].split(":");
		$discPerc = document.getElementById($indgroup[0]+"discInp").value;
		document.getElementById($indgroup[0]+"discGrp").value = ($offcost - (Number($offcost)*Number($discPerc)/100)).toFixed(2)
	}
}
function savebattery()
{
	$batid = document.getElementById("batteryid").value;
	$testname = document.getElementById("addtestname").value;
	$batname = document.getElementById("batteryname").value;
	$offcost = document.getElementById("offeredcost").value;
	$offdiscount = document.getElementById("offereddiscount").value;
	$grpdiscount = document.getElementById("discountStr").value;
	if($batname.trim()== "")
	{
		showNotification('300','20','Message','Please enter battery name','notification','timernotification',5000);
		return;
	}
	$.ajax({
	type: "get",
	url: "/ayushman/cpathologistbattery/savebattery?batteryid="+$batid+"&testname="+$testname+"&batteryname="+$batname+"&offeredcost="+$offcost+"&grpdiscount="+$grpdiscount,
	success: function(data){
		console.log(data);
		data = JSON.parse(data);
		showNotification('300','20','Message',data['message'],'notification','timernotification',5000);
		//location.reload();
		// when new battery is defined then reload page with the battery id returned from server
		//--------------------------------------------------------------------------------------
		$batid = data['batteryid'];
		if($batid == "")
		{
			//alert("Please select tests and enter battery name");
		}
		else
			window.location.href='/ayushman/cpathologistbattery/addeditbattery?batteryid='+$batid;
	}
	});
} 
</script>
