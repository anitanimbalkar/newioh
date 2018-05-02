<html>
<head>
<title>Billing Plan Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" style="height:565px" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:600px;border:none; padding:1px; valign:top;" valign="top">
  <table style="width:100%; height:100%;" border="0" valign="top" align="center" cellpadding="0" cellspacing="0">
    <tr>
		<td align="left" valign="top" class="body_bg" style="valign:top;">
			<table border="0" valign="top" cellspacing="0" cellpadding="0" style="width:100%; ">
				<tr>
					<td width="100%" colspan="6">
						<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
							<tr>
								<td width="100%" class="Heading_Bg">&nbsp;
									<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Plans&nbsp;&nbsp;</strong>
								</td>
							</tr>
						</table>
					</td>
				</tr>	
			</table>
			<!-- Heading -  end -->
			<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
				<div id="help-main" style="margin-left:5px;">
					<p class="bodytext_bold"style="font-size:12px;">Please choose any one of the plans listed below.</p>
				</div>
				<div id="help-main" style="margin-left:5px;">
					<p class="bodytext_bold"style="font-size:12px;">(Registration Charges are applied only once and Subscription Charges will be charged according to plan chosen)</p>
				</div>
				
			</div>
			<!-- List Of All Plans - start -->
			<table width="100%" valign="top" border="0" cellpadding="0" cellspacing="0" style="padding-top:5px;">
				<tr>
					<td>
						<table width="100%" valign="top" border="0" cellpadding="0" cellspacing="0" style="padding-bottom:5px;padding-top:5px">
							<tr>
								<td align="center" width="2%" height="50%" valign="middle" >&nbsp;</td>
								<td align="center" width="15%" height="50%" valign="middle" onclick="window.location = '/ayushman/cplanmanager/showselectedplan'" class="button">Back</td>
								<td align="center" width="73%" height="50%" valign="middle" >&nbsp;</td>
								<td align="center" width="10%" height="50%" valign="middle" >&nbsp;</td>
								
								<td align="center" width="5%" height="50%" valign="middle" >&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr >
					<td colspan="6" rowspan="7" align="left" valign="top" class="content_bg" style="padding-top:5px;">
						<?php
							$objCorporateMember = ORM::factory('corporatemember')->where('status_c','=','Associated')->where('iohid_c','=',Auth::instance()->get_user()->id)->find();
						
							$objPlans = ORM::factory('viewbillingplan');
							if($onlypackages == 1){
								$objPlans = $objPlans->where('types','=','individual')->where('ispackage','=',$onlypackages)->or_where('towhomcorporateid','=',$objCorporateMember->refcorporateid_c)->where('ispackage','=',$onlypackages)->find_all()->as_array();
							}else{
								$objPlans = $objPlans->where('types','=','individual')->or_where('towhomcorporateid','=',$objCorporateMember->refcorporateid_c)->find_all()->as_array();
							}
							$plans = array();
							echo '<div width="150px" height="170px" style="white-space: wrap;"><ul id="navlist">';
							foreach($objPlans as $plan)
							{
								echo '<li name="listitems">';
								$plans= Request::factory('cplancomponent/view');
								$plans->post('id',$plan->id);
								$plans->post('name',$plan->planname);
								$plans->post("height",'200');
								$plans->post("width",'321');
								$plans->post("planname",$plan->planname);
								$plans->post("regcharges",$plan->regcharges);
								$plans->post("subcharges",$plan->subcharges);
								$plans->post("usagechargesonline",$plan->onlinecharges);
								$plans->post("usagechargesphone",$plan->phonecharges);
								$plans->post("usagechargesinclinic",$plan->cliniccharges);
								$plans->post("plandetails",$plan->plandescription);
								echo $plans->execute(); 
								echo '</li>';
							}
							echo '</ul></div>';
						?>
					</td>
				</tr>
			</table>
			
		</td>
    </tr>
  </table>
</div>

<!-- List of all plans - end-->
<div id="plandetails" width="800px" height="500px" style="-moz-border-radius: 2px;display:none;-webkit-border-radius:2px; -khtml-border-radius: 2px; border-radius:2px;">
	<style type="text/css">
		table.imagetable {
			font-family: verdana,arial,sans-serif;
			font-size:11px;
			color:#333333;
			border-width: 1px;
			border-color: #5c91b1;
			border-collapse: collapse;
		}
		table.imagetable th {
			background:#5c91b1;
			border-width: 1px;
			padding: 0px;
			border-style: solid;
			border-color: #5c91b1;
		}
		table.imagetable td {
			border-width: 1px;
			padding: 0px;
			height:40px;
			border-style: solid;
			-moz-border-radius:2px;
			-webkit-border-radius:2px;
			-opera-border-radius:2px;
			-khtml-border-radius:2px;
			border-radius:2px;
			border-color: #5c91b1;
		}
	</style>
	<script type="text/JavaScript">
		$(document).ready(function() {
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			if($.trim($('#messagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);

			if ( $.browser.msie ) {
				$('#plandetails').dialog({
					autoOpen: false,
					show: "fade",
					hide: "fade",
					width: "800px",
					modal: true,
					height: "750px",
					resize: "auto",
					resizable: false
				});
			}else{
				$('#plandetails').dialog({
					autoOpen: false,
					show: "fade",
					hide: "fade",
					width: "800",
					modal: true,
					height: "550",
					resize: "auto",
					resizable: false
				});
			}
			$(".ui-dialog-titlebar").hide();
		});
		function showdetails(planid)
		{
			 $(".ui-dialog-titlebar").hide();
			 getplan(planid);
		}
		function apply(planid)
		{
			document.getElementById('id').value = planid;
			$.ajax({
				  url: "/ayushman/cplanmanager/getplanselectionconfirmation?planid="+planid,
				  success: function( data ) {
						data =  JSON.parse(data);
						if(data['type'] == 'error')
							showMessage('550','200','Retrieving plan',data['data'],data['type'],'id');
						else
						{
							showMessage('450','200','Select Plan',data['data'],'confirmation','planselectionconfirmation');
						}
					},
					error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
				});
		}
		function Confirmation_Event(id,confirmation)
		{
			if(id == 'planselectionconfirmation' && confirmation == 'yes')
			{
				parent.getcontent("/ayushman/cplancomponent/showlicense?planid="+document.getElementById('id').value);
			/*	$.ajax({
				  url: "/ayushman/cplancomponent/showlicense?planid="+document.getElementById('id').value,
				  success: function( data ) {
						data =  JSON.parse(data);
						if(data['type'] == 'error')
							showMessage('550','200','Retrieving plan',data['message'],data['type'],'id');
						else
						{
							showNotification('300','50','Create Plan',data['message'],'notification','diaconfirmation',5000);
							$('#plandetails').dialog('close');
						}
					},
					error : function(){showMessage('550','200','Retrieving plan',"Error occured while saving the plan. - Could not respond to request - javascript error.",'error','id');}
				});*/
			}
		}
		function selectplan()
		{
			apply(document.getElementById('id').value);
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
		function getplan(planid)
		{
			if(planid == -1)
			{
				clear();
			}else{
				$.ajax({
				  url: "/ayushman/cplanmanager/getplandetails?planid="+planid,
				  success: function( data ) {
						data =  JSON.parse(data);
						if(data['type'] == 'error')
							showMessage('550','200','Retrieving plan',data['data'],data['type'],'id');
						else
						{
							var plandetails = new Array();
							plandetails = data['data'];
							element = document.getElementById("planform");
							elements = element.getElementsByTagName("label");
							for(var i=0; i<elements.length; i++)
							{
								if(plandetails[elements[i].id] != undefined)
								{
									elements[i].innerHTML = plandetails[elements[i].id];
								}
							}
							elements = element.getElementsByTagName("input");
							for(var i=0; i<elements.length; i++)
							{
								if(plandetails[elements[i].id] != undefined)
								{
									elements[i].value = plandetails[elements[i].id];
								}
							}
							$('#plandetails').dialog('open');
						}
					},
					error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
				});
			}
		}
	</script>
	<form id="planform" method="post" enctype="multipart/form-data" >
		<table border="0" cellspacing="0" cellpadding="0" style="width:100%; ">
			<tr>
				<td width="99%">
					<table width="99%%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg">&nbsp;
								<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Plan Details</strong>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table width="99%" border="0" cellspacing="0" cellpadding="0"  class="imagetable">
			<tr>
				<td width="22%" height="10" align="center" valign="middle" ><span class="bodytext_bold">Plan Name</span></td>
				<td height="10" colspan="5" align="left" valign="middle" class="bodytext_normal" style="padding-left:20px; text-align:left;"><span class="bodytext_normal" style="font-size:11px;"><label align="left" name="planname" id="planname"></label></span></td>
			</tr>
			<tr>
				<td height="10" align="center"><span class="bodytext_bold">Description</span></td>
				<td height="10" colspan="5" align="left" valign="middle" class="bodytext_normal" style="padding-left:20px; text-align:left"><label align="left" name="plandescription" id="plandescription"></label></td>
			</tr>
			<tr>
				<td height="10" align="center"><span class="bodytext_bold">Reg. Charges</span></td>
				<td height="10" colspan="5" align="left" valign="middle" class="bodytext_normal" style="padding-left:20px; text-align:left">Rs.<label align="left" name="regcharges" id="regcharges"></label></td>
			</tr>
			<tr >
				<td height="10" align="center"><span class="bodytext_bold">Subscription Charges</span></td>
				<td height="10" colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left">Rs.<label align="left" id="subcharges" id="subcharges" ></label>&nbsp;&nbsp;For Every&nbsp;<label align="left" id="duration" id="duration" ></label>&nbsp;Months.</td>
			</tr>
		<!--	<tr >
				<td height="10" align="center"><span class="bodytext_bold">Periodicity</span></td>
				<td height="10" colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left"> <label align="left" id="duration" id="duration" ></label>&nbsp;Months</td>
			</tr> -->
			<tr >
				<td height="10" align="center"><span class="bodytext_bold">Service Charges for fixing/canceling appointment (per appointment)</span></td>
				<td height="10" colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left">Rs.<label align="left" id="servicecharges" id="servicecharges" ></label></td>
			</tr>
			<tr >
				<td height="10" align="center"><span class="bodytext_bold">Service Charges for placing/canceling diagnostic order (per appointment)</span></td>
				<td height="10" colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left">Rs.<label align="left" id="servicecharges" id="servicecharges" ></label></td>
			</tr>
			<tr >
				<td height="10" align="center"><span class="bodytext_bold">Service Charges for Placing/canceling chemist Order (per order)</span></td>
				<td height="10" colspan="5" class="bodytext_normal" style="padding-left:20px; text-align:left">Rs.<label align="left" id="servicecharges" id="servicecharges" ></label></td>
			</tr
			<tr>
				<td >&nbsp;</td>
				<td align="center"><span class="bodytext_bold">Online Consultation</span></td>
				<td align="center" valign="middle" ><span class="bodytext_bold">Phone Consultation</span></td>
				<td align="center"><span class="bodytext_bold">In Clinic Consultation</span></td>
			<!--	<td align="center"><span class="bodytext_bold">Email</span></td> -->
				<td >&nbsp;</td>
			</tr>
			<tr>
				<td height="20"  align="center"><span class="bodytext_bold" align="center">Platform Usage Charges During Consultation<br>
				</span><span class="bodytext_normal" color="red">(Upto 10 Mins.)</span></td>
				<td width="14%" align="center" valign="middle" class="bodytext_normal">Rs.<label align="left" id="onlinecharges"></label></td>
				<td width="14%" align="center" valign="middle" class="bodytext_normal"><span class="bodytext_normal">Rs.<label align="left" id="phonecharges"></label></span></td>
				<td width="17%" align="center" valign="middle" class="bodytext_normal"><span class="bodytext_normal">Rs.<label align="left" id="cliniccharges"></label></span></td>
			<!--	<td width="15%" align="center" valign="middle" class="bodytext_normal"><span class="bodytext_normal">Rs.<label align="left" id="emailcharges"></label></span></td> -->
				<td width="15%" align="center" valign="middle" class="bodytext_normal">&nbsp;</td>
			</tr>
			<tr>
				<td height="20" align="center"><span class="bodytext_bold" align="center"> Extended Usage Charge<br>
				</span><span class="bodytext_normal">(per 5 min. of extention)</span></td>
				<td align="center" valign="middle" class="bodytext_normal"><span class="bodytext_normal">Rs.<label align="left" id="onlinecharges"></label></span></td>
				<td align="center" valign="middle" class="bodytext_normal"><span class="bodytext_normal">Rs.<label align="left" id="phonecharges"></label></span></td>
				<td colspan="3" align="center" valign="middle" class="bodytext_normal">&nbsp;</td>
			</tr>
		</table>
		<div style="padding-top:10px;" >
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" width="60%" height="50%" valign="middle" >&nbsp;</td>
					<td align="center" width="15%" height="50%" valign="middle" onclick="selectplan();" class="button">Apply</td>
					<td align="center" width="5%" height="50%" valign="middle" >&nbsp;</td>
					<td align="center" width="15%" height="50%" valign="middle" onclick="$('#plandetails').dialog('close');" class="button">Close</td>
					<td align="center" width="10%" height="50%" valign="middle" >&nbsp;</td>
				</tr>
			</table>
		</div>
		<input type="hidden" id="id" value=''/>
	</form>
	
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>	
</div>
</body>
</html>	
