<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">

@media only print
{ 
  #btn4 {display: none !important; 
  }
  #btn1 {display: none !important; 
  }
  #btn2 {display: none !important; 
  }
   #btn3 {display: none !important; 
  }
}
</style>

<script type="text/javascript">
$(document).ready(function(){
		// calculatetotalfees();
		if("<?= count($tests);?>"== "0")
		{
			$("#checkoutbutton").hide(true);
			window.location = "";
		}
		$('#addtonetwork').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "421px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		
		$('#ordersuccessfull').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			width: "621px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		$(".ui-dialog-titlebar").hide();
	});
	function getfeesfortestid(select,id,testname,testrownumber)
	{
	var  errmsg = $('#laberr').html();
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestfee?testid="+id+"&pathologistid="+$(select).val(),
			success: function( data ) {
				if(data=="Not provided")
				{
					$('#'+testrownumber+'labtestfees'+id).text("Not provided");
					if($('#'+testrownumber+'err'+id).html() == null )
					{
						$('#laberr').html(errmsg+"<div id='"+testrownumber+"err"+id+"'>&bull;&nbsp;Please select other Chemist center for "+testname+'</div>');	
					}
				}
				else
				{
					$('#'+testrownumber+'labtestfees'+id).text(Number(data).toFixed(2));
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
				parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
	}
	
	function checkoutonclick()
	{
		var addtest = new Array();
		var j=0;
		<?php $i=0;foreach($tests as $test) { ?>
			var id= "<?php echo $i.'select'.$test['id'] ?>" ;
			addtest[j] = new Array(2);
			addtest[j][0] = "<?php echo $test['cartid']; ?>";
			addtest[j][1] = $("#"+id).val();
			j++;
			<?php $i++; ?>	
		<?php } ?>
		if($('#checkoutbutton').val() =="Recharge")
		{
			var currentlocation = escape(window.location);
			$.ajax({
				  url: '/ayushman/cpatientmedicinesorder/setfollowuplink?currentlocation='+currentlocation ,
				  success: function( data ) {
				  		window.location= '/ayushman/cpatientmedicinesorder/ordertest?test='+JSON.stringify(addtest);
					},
					error : function(){showMessage('550','200','Recharge',"Error occured while redirecting to recharge page. Please contact system administrator",'error','id');}
			}); 
		}
		else
		{
			if(($('#checkoutbutton').val() =="Proceed to checkout")&& ($('#laberr').html() ==""))
			{
				var check = addtofavcheck();
				if(check == "open"){
					
				}
				else
				{
					
					parent.pagebusy();
					$.ajax({
				  		url: '/ayushman/cpatientmedicinesorder/ordertest?test='+JSON.stringify(addtest),
				  		success: function( data ) {
				  			var ordertests =  eval('('+data+')');
				  			jQuery('#successfullpopupinfo').html('');	
				  			for(var i = 0;i<ordertests.length;i++)
							{
								var d = new Date(ordertests[i]["reqdate"]);
   								 var da = d.getDate();                       //day
    							var mon = d.getMonth() + 1;                 //month
   							 	var yr = d.getFullYear();
     							months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    							var monName = months[d.getMonth()];         //month Name
    							var thisDay = da + " " + monName + " " + yr;    //full date show
                   //year
                   //alert(thisDay);
                   				reqdate=thisDay;
				  				orderid=ordertests[i]["id"];
				  				$('#reqdate').text(reqdate);
				  				$('#reqid').text(orderid);
				  				//alert($('#reqid').text(orderid));
				  				// var labservicecharges= Number($('#labtesttotalfees').text()) + Number($('#servicechargePopupTotal').text());
				  				// $('#successfullPopupTotal').text(Number(labservicecharges).toFixed(2));
				  				$('#ordersuccessfull').dialog('open');
				  				element = $('<div class="bodytext_normal">');
				  				var textinfomation ='<td  height="30px;" width="36px" >&nbsp;</td><td width="154px" class="bodytext_normal">'+(i+1)+'. '+ordertests[i]["testname"]+'</td><td width="150px" class="bodytext_normal">'+reqdate+'</td><td width="174px" class="bodytext_normal">'+ordertests[i]["centername"]+'</td><td width="96px" style="text-align:right" class="bodytext_normal">'+Number(ordertests[i]["rate"]).toFixed(2)+'</td><td width="96px" style="text-align:right" class="bodytext_normal">'+(Number(ordertests[i]["discountedrate"])).toFixed(2)+'</td></div>';
								element.appendTo('#successfullpopupinfo');
								$(textinfomation).appendTo(element);
				  			}
							parent.pageloaded();
						},
						error : function(){showMessage('550','200','Recharge',"Error occured while ordering tests. Please contact system administrator",'error','id');parent.pageloaded();}
					});
					
				}
				
			}
			else
			{
			}
		}
	}
	
	function addtofavcheck()
	{
		jQuery('#newpathologistlist').html('');
		var arr_pathologist=<?= json_encode($arr_favoritepathologist); ?>;
		//alert(<?= json_encode($arr_favoritepathologist); ?>);
		var arr_addNetworkPathologist = new Array();
		var arr_selectedpathologist=new Array();
		//get all selected pathologist id
		var i=0;
		<?php $j=0;foreach($tests as $test) {?>
			var selectid= "<?php echo $j.'select'.$test['id'] ?>" ;
			var pathid =$("#"+selectid).val();
			var dropdownlist = document.getElementById(selectid);
			var centername = dropdownlist.options[dropdownlist.selectedIndex].text;
			arr_selectedpathologist[i] = new Array(2);
			arr_selectedpathologist[i][0]= pathid;
			arr_selectedpathologist[i][1]= centername;
			i++;
		<?php $j++; }?>
		//store unique selectedpathologist Ids in this array.
		uniquearrayOfselectedpathologistIds=new Array();
		var j=0;
		for(var i=0;i<arr_selectedpathologist.length;i++)
		{
			var result =findValuePresentinarray(uniquearrayOfselectedpathologistIds,arr_selectedpathologist[i][0]);
			if(result != "true")
			{
				uniquearrayOfselectedpathologistIds[j] = new Array(2);
				uniquearrayOfselectedpathologistIds[j][0]= arr_selectedpathologist[i][0];
				uniquearrayOfselectedpathologistIds[j][1]= arr_selectedpathologist[i][1];
				j++;
			}
		}

		//check which pathologist in favorite list	if not in favorite then add that pathologist in "arr_addNetworkPathologist" 
		var j=0;
		for(var i=0 ;i<uniquearrayOfselectedpathologistIds.length;i++) {
			if(arr_pathologist.indexOf(uniquearrayOfselectedpathologistIds[i][0]) > -1){
			}
			else
			{
				arr_addNetworkPathologist[j]=new Array(2);
				arr_addNetworkPathologist[j][0]= uniquearrayOfselectedpathologistIds[i][0];
				arr_addNetworkPathologist[j][1]= uniquearrayOfselectedpathologistIds[i][1];
				j++;
			}
		}
		//create unique arr_addNetworkPathologist array
		uniquearrayOfaddNetworkPathologistIds=new Array();
		var j=0;
		for(var i=0;i<arr_addNetworkPathologist.length;i++)
		{
			var result =findValuePresentinarray(uniquearrayOfaddNetworkPathologistIds,arr_addNetworkPathologist[i][0]);
			if(result != "true")
			{
				uniquearrayOfaddNetworkPathologistIds[j] = new Array(2);
				uniquearrayOfaddNetworkPathologistIds[j][0]= arr_addNetworkPathologist[i][0];
				uniquearrayOfaddNetworkPathologistIds[j][1]= arr_addNetworkPathologist[i][1];
				j++;
			}
		}
		for(var j=0;j<uniquearrayOfaddNetworkPathologistIds.length;j++) {
				var centername = uniquearrayOfaddNetworkPathologistIds[j][1];
				element = $('<div class="bodytext_normal" >');
				var textinfomation = '<td height="30px" width="200px"  class="bodytext_normal">'+(j+1)+' ) &nbsp;&nbsp;'+centername+'</td><td width="200px" class="bodytext_normal"><input type="checkbox" id="'+j+'checkbox'+uniquearrayOfaddNetworkPathologistIds[j][0]+'" value="checkbox" checked="true" /><input type="hidden" id="'+j+'pathologistid"/></td></div>';
				element.appendTo('#newpathologistlist');
				$(textinfomation).appendTo(element);
				document.getElementById(j+"pathologistid").value = uniquearrayOfaddNetworkPathologistIds[j][0];
			}
		//document.getElementById("addpathologistcount").value= uniquearrayOfaddNetworkPathologistIds.length;
		if(uniquearrayOfaddNetworkPathologistIds.length !=0)
		{
			$('#addtonetwork').dialog('open');
			return "open";
		}
		else
		{
			return "close";
		}
					
	}
	
	function findValuePresentinarray(arr, value)
	{	
		if(arr.length !=0)
		{
			for(var i = 0; i < arr.length; i++) {
				if(arr[i][0] === value) { 	
					return "true";
					break;
				}
			}
		}
		else
	    	return "false";
	}
	function closepopup(name)
	{
		$('#'+name).dialog('close');
	}
	
	function addpathologist()
	{
		var count=document.getElementById("addpathologistcount").value;
		var arr_pathologistId = new Array();
		for(var j=0;j<count;j++) {
			var pathid= document.getElementById(j+"pathologistid").value ;
			if($("#"+j+"checkbox"+pathid).is(':checked'))
			{
				arr_pathologistId.push(pathid);
			}
		}
		$.ajax({
			  url: '/ayushman/cpatientmedicinesorder/addnewpathologist?arr_pathologistId='+JSON.stringify(arr_pathologistId) ,
			  success: function( data ) {
					parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
				},
				error : function(){showMessage('550','200','Add Chemist Center',"Error occured while adding Chemist Center in your network. Please contact system administrator",'error','id');}
		}); 
	 }

	 function Popup(data) 
		{
			var mywindow = window.open('', 'print','height=768,width=1024');
			mywindow.document.write('<html><head>');
			mywindow.document.write('</head><body style="font-size:14px;">');
			mywindow.document.write(data);
			mywindow.document.write('</body></html>');
			
			mywindow.print();
			mywindow.close();
			return true;
		}
	 function printElem()
	 {
	 					$(".button").hide();

		Popup($('#ordersuccessfull').html());

	 	//print("#ordersuccessfull1");
	 }
</script>
<div style="width:835px;height:560px;" >
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="100%" class="Heading_Bg">&nbsp;
				<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/><strong>&nbsp;&nbsp;Checkout</strong>
			</td>
		</tr>
	</table> 
	<br/>
  	<table width="750" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table_roundBorder">
      	<tr>
			<td align="left" valign="top" style="padding:0px; border:none;">
				<table width="750" border="0" cellpadding="0" cellspacing="0" class="checkout">
					<tr valign="middle" bgcolor="#ecf8fb">
						<td width="30%" height="30" class="bodytext_bold" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">Cart Items</td>
						<td width="20%" class="bodytext_bold" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">Test Req Date</td>
						<td width="7%" class="bodytext_bold" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">Qty</td>
						<td width="20%" class="bodytext_bold" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">Provider</td>
						<td width="9%" class="bodytext_bold" style="border:0px; padding-left:7px;border-bottom:1px solid #a8c8d9;">Remove</td>
					</tr>
				<?php $i=0;foreach($tests as $test) {?>
					<tr id="<?php echo $i.$test['id']?>" >
						<td width="30%" height="30" class="bodytext_normal" style="border:0px; padding-left:7px;  border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
							<lable id="<?php echo $i.'testname'.$test['id']?>"><?= $test['testname']; ?></lable>
						</td>
						<td width="30%" height="30" class="bodytext_normal" style="border:0px; padding-left:7px;  border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
						<label><?= $test['testreqdate']; ?></label></td>
						<td width="7%" class="bodytext_normal" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;"><?= $test['qty']; ?></td>
						<td width="20%" style="border:0px; padding-left:7px;  border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
						  	<select name="select" id="<?php echo $i.'select'.$test['id']?>" style="width:130px;"  ><option style="font-size:9pt;" value="" >Select Chemist center</option>
								<?PHP
									
									foreach ($test['pathologistList'] as $pathologist) { 
										if($test['pathologistid'] == $pathologist['centerid'])
											print "<option  selected='selected' \" value=\"{$pathologist['centerid']}\">{$pathologist['centername']}</option>";
										else
											print "<option  \" value=\"{$pathologist['centerid']}\">{$pathologist['centername']}</option>"; 										
									} 
								?>
							</select>        
						</td>
						<td width="9%" align="center" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/Remove_Icon.png" width="22" height="20" title="Remove" id="<?php echo  $i.'remove'.$test['id'] ?>" onclick="removetest(<?=$i?>,'<?=$test['id']?>','<?= $test['testname']; ?>')" /></td>
					</tr>
					<?php $i++;} ?>
					<tr valign="middle" >
						
						<td colspan="7" class="bodytext_bold" style="border:0px; padding-left:7px; border-right:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;">
							
						</td>
						<td width="9%" colspan="2" class="bodytext_bold" style="border:0px; padding-left:7px;border-bottom:1px solid #a8c8d9;">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>	
       	<tr>
			<td height="50" align="right" valign="middle" bgcolor="#ecf8fb" style="padding-right:10px;border-top:1px solid #a8c8d9">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="4">
						</td>
					</tr>
					<tr>
						<td colspan="4">
							<lable id="laberr"></lable>
						</td>
					</tr>
					<tr>
					  <td width="70%"><input type='hidden' id='removetestrownumber' name='removetestrownumber' />
					  	<input type='hidden' id='removetestid' name='removetestid' /></td>
					  <td width="13%" align="center"  >
				  	<a href="<?= $referer;?>">
				  		<input id="backbutton" value="Back" class="button"   style="height:25px;width:80px;"  align="center"  readonly="readonly"  /></td>
					  <td width="19%" align="left" >
<!-- 					  	<div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/ccheckout/view'" id="checkoutbutton" >Check Out </div>
 -->
					  	<input id="checkoutbutton" value="Proceed to checkout" class="button" style="height:25px;outline:none;width:140px;"  align="center" onclick="checkoutonclick()" readonly="readonly"  /></td>
					</tr>
				</table>		
			</td>
      	</tr>
  </table>
	<div id="addtonetwork" style="overflow-y:hidden;overflow-x:hidden;height:auto;" >
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder" height="auto" >
			<tr>
				<td width="7%" height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
				<td width="30%" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Add to My Network</td>
				<td width="63%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" onclick="closepopup('addtonetwork');"/></td>
			</tr>
			<tr>
				<td height="35" align="center" valign="middle">&nbsp;</td>
				<td colspan="2" align="left" valign="middle" class="bodytext_normal">Do you want to add Chemist Center in your network ?</td>
			</tr>
			<tr >
				<td height="40" align="center" valign="middle"><input type="hidden" id="addpathologistcount"/>&nbsp;</td>
				<td colspan="2" align="left" valign="middle" class="bodytext_normal" style="max-height:200px;overflow-y:auto;overflow-x:hidden;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr id="newpathologistlist" >
							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="3" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">		
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="69%">&nbsp;</td>
							<td width="14%" height="30px;" align="right" valign="middle"  >
								<input id="checkoutbutton" value="Yes" class="button" style="height:25px;outline:none;width:60px;"  align="center" onclick="addpathologist();" readonly="readonly"  /></td>
							<td width="15%" height="30px;" align="right" valign="middle">
								<input id="checkoutbutton" value="No" class="button" style="height:25px;outline:none;width:60px;"  align="center" onclick="closepopup('addtonetwork')" readonly="readonly"/></td>
						</tr>
					</table>
				</td>
			</tr>
	  </table>
	</div>
	<div id="ordersuccessfull" style="overflow-y:hidden;overflow-x:hidden;height:auto;">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_roundBorder">
			<tr>
				<td height="25" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;"><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/> </td>
				<td colspan="2" align="left" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9;"> Order Successfully Placed </td>
				<td width="58%" align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:7px;">&nbsp;</td>
			</tr>
			<tr>
				<td width="5%" height="40" align="center" valign="middle">&nbsp;</td>
<!-- 				<td width="5%" align="left" valign="middle" class="bodytext_bold"><img src="/ayushman/assets/images/Success_Arrow.png" width="20" height="20"/></td>
 -->				<td width="20%" align="left" valign="middle" class="bodytext_bold">Req Date:&nbsp;<label class="bodytext_normal" id="reqdate"></label></td>
				<td width="20%" align="left" valign="middle" class="bodytext_bold">Req. Id.:&nbsp; <label id="reqid" class="bodytext_normal"></label></td>
				<td width="32%" align="left" valign="middle" class="bodytext_normal">Your requisition is successfully placed for</td>
				<td align="left" valign="middle" class="bodytext_normal">&nbsp;</td>
			</tr>
			<tr>
				<td height="33" colspan="4" align="left" valign="middle" style="border-bottom:1px solid #a8c8d9;">
					<table width="95%" border="0" cellspacing="0" cellpadding="0">
					  <tr >
						<td width="6%" height="25">&nbsp;</td>
						<td width="24%" class="bodytext_bold">Medicine Name</td>
						<td width="24%" class="bodytext_bold">Prefered Date </td>
						<td width="25%" class="bodytext_bold">Store Name </td>
						<td width="29%" class="bodytext_bold">Price(Rs.) </td>
						<td width="29%" class="bodytext_bold">Discount(Rs.) </td>

						</tr>
					  <tr>
							<td  colspan="6" align="left">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
								 <tr id="successfullpopupinfo">
								 </tr>
								 </table>
							</td>
					  </tr>
					  <tr>
						<td height="25" colspan="5" align="right" class="bodytext_bold" style="border-top:1px solid #a8c8d9;padding-top:4px;">Service Charges (Including taxes)(Rs.):&nbsp;</td>
						<td class="bodytext_normal" style="border-top:1px solid #a8c8d9;text-align:right;">
					  </tr>
					 
				  </table>
				</td>
			</tr>
			<tr>
				<td height="50" colspan="5" align="right" valign="middle" bgcolor="#ecf8fb" style="padding-right:10px;">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="btn">
						<tr>
							<td width="23%">&nbsp;</td>
							<td width="17%" align="center"  valign="middle" class="button" onclick="window.location='/ayushman/cpatientmedicinesorder/view'" ><label id="btn1">View My Order</label></td>
							<td width="1%">&nbsp;</td>
							<td width="20%" align="center"  valign="middle" class="button"  onclick="window.location='/ayushman/cpatientmedicinesorder/searchandorder'"><label id="btn2">Order More Medicine</label></td>
							<td width="1%">&nbsp;</td>
							<td width="18%" align="center" valign="middle" class="button"  onclick="parent.window.location='/ayushman/cdashboard/view'" ><label id="btn3">Dashboard</label></td>
							<td width="1%">&nbsp;</td>
							<td width="18%" align="center" valign="middle" class="button"  onclick="printElem();" ><label id="btn4">Print</label></td>

						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>

