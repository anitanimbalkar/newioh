<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
<style type="text/css">
	form.cmxform label.error, label.error {
		color: red;
		font-style: italic;
	}
	form.cmxform { width:100%; }
	
}
	
	.ui-datepicker table {width: 150px; font-size: 11px; border-collapse: collapse; margin:0 0 .4em; } 
	.ui-widget {  font-size: 11px;}
	
	.ui-jqgrid tr.jqgrow td {
		height: 30px;
	}
	.ui-jqgrid .ui-jqgrid-htable th div {
		height:40px;
		width:100%;
		overflow:hidden;
		position:relative;
		vertical-align:top;
		white-space:normal !important;
	}

 </style>
<script type="text/JavaScript">
	
	$(document).ready(function() {
		if ( $.browser.msie ) {
			$('#plancreator').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				width: "auto",
				modal: true,
				height: "auto",
				resize: "auto",
				resizable: false
			});
		 } else {
			$('#plancreator').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				width: "auto",
				modal: true,
				height: "auto",
				resize: "auto",
				resizable: false
			});
		 }
		
		$(".ui-dialog-titlebar").hide();
		
		showcorporatenames($("#types"));
		
		var types = new LiveValidation('types', {onlyOnSubmit: true });
		types.add( Validate.Presence );
		
		var planname = new LiveValidation('planname', {onlyOnSubmit: true });
		planname.add( Validate.Presence );
		
		var regcharges = new LiveValidation('regcharges', {onlyOnSubmit: true });
		regcharges.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		regcharges.add( Validate.Presence );
		

		var onlinecharges = new LiveValidation('onlinecharges', {onlyOnSubmit: true });
		onlinecharges.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		onlinecharges.add( Validate.Presence );
		
		var phonecharges = new LiveValidation('phonecharges', {onlyOnSubmit: true });
		phonecharges.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		phonecharges.add( Validate.Presence );
		
		var cliniccharges = new LiveValidation('cliniccharges', {onlyOnSubmit: true });
		cliniccharges.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		cliniccharges.add( Validate.Presence );

		var subcharges = new LiveValidation('subcharges', {onlyOnSubmit: true });
		subcharges.add( Validate.Format, { pattern: /^\s*(\+|-)?((\d+(\.\d\d)?)|(\.\d\d))\s*$/ } );
		subcharges.add( Validate.Presence );

		var duration = new LiveValidation('duration', {onlyOnSubmit: true });
		duration.add( Validate.Numericality, {onlyInteger: true } );
		duration.add( Validate.Presence );
		clearplans();
		$('#planslist').trigger( 'reloadGrid' );
		$('#plancreator').dialog('close');
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()) + '</br>You will not be able to create, edit the plan. </br>Please Contact system administrator.','error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		
	});	
	function clearplans()
	{
		theSel = document.getElementById("allplans");
		for(i=theSel.length-1; i>=0; i--)
		{
			theSel.options[i] = null;
		}
	}
	function setplans( cellvalue, options, rowObject )
	{
		theSel = document.getElementById("allplans");
		if(theSel.length == 0)
			theSel.options[theSel.length] = new Option("", -1);
		theSel.options[theSel.length] = new Option($(rowObject).children()[1].firstChild.data, cellvalue);
		return cellvalue;
	}
	function setaction( cellvalue, options, rowObject )
	{
		return '<a href="#" onclick=editplan('+cellvalue+');><font color="#0000FF">Edit</font></a> / <a href="#" onclick=deleteplan('+cellvalue+');><font color="#0000FF">Delete</font></a>';
	}
	
	function showcorporatenames(corporatename){
		if($(corporatename).val() == 5){
			$("#corporatenamerow").show();
		}else{
			$("#corporatenamerow").hide();
		}
	}
	
	function addplan()
	{
		$('#copyplansrow').show();
		document.getElementById('planid').value = -1;
		$(".ui-dialog-titlebar").hide();
		$("#types").removeAttr("disabled");
		$("#planname").removeAttr("readonly");
		clear();
		$(function() {
			$( "#effectivedate" ).datepicker({ yearRange: "-0:+2",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0, gotoCurrent: true});
			var m_names = new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

			var d = new Date();
			var curr_date = d.getDate();
			var curr_month = d.getMonth();
			var curr_year = d.getFullYear();
			$( "#effectivedate" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
		});
		$(function() {
			$( "#effectivetill" ).datepicker({ yearRange: "-0:+70",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
			var m_names = new Array("Jan", "Feb", "Mar", 
			"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
			"Oct", "Nov", "Dec");

			var d = new Date();
			var curr_date = d.getDate();
			var curr_month = d.getMonth();
			var curr_year = d.getFullYear();
			$( "#effectivetill" ).val(curr_date + " " + m_names[curr_month] + " " + (curr_year + 1));
		});
		$('#plancreator').dialog('open');
		$("#corporateid").prop("selectedIndex",0);
	}
	function clear()
	{
		element = document.getElementById("planform");
		elements = element.getElementsByTagName("input");
		for(var i=0; i<elements.length; i++)
		{
			if(elements[i].type == 'text')
				elements[i].value = "";
		}
		elements = element.getElementsByTagName("textarea");
		for(var i=0; i<elements.length; i++)
		{
			elements[i].value = '';
		}
	}
	function Confirmation_Event(id,confirmation)
	{
		if(id == 'deleteplanconfirmation')
			if(confirmation == 'yes')
				window.location = "/ayushman/cplanmanager/delete?planid="+document.getElementById('planid').value+'&userid='+document.getElementById('userid').value;
	}
	function deleteplan(planid)
	{
		showMessage('250','50','Delete Plan Confirmation','Do you really want to delete selected plan?','confirmation','deleteplanconfirmation');
		document.getElementById('planid').value = planid;
	}
	function copyplan()
	{
		theSel = document.getElementById("allplans");
		for(i=theSel.length-1; i>=0; i--)
		{
			if(theSel.options[i].selected)
			{
				document.getElementById('planid').value = -1;
				getplan(theSel.options[i].value);
			}			
		}
		$("#types").removeAttr("disabled");
		$("#planname").removeAttr("readonly");
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
			cache: false,
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
						elements = element.getElementsByTagName("input");
						for(var i=0; i<elements.length; i++)
						{
							if(plandetails[elements[i].id] != undefined)
							{
								elements[i].value = plandetails[elements[i].id];
							}
						}
						var c = element.getElementsByTagName('input');
						for (var i = 0; i < c.length; i++) {
        						if (c[i].type == 'checkbox') {
            							c[i].checked = (plandetails[c[i].id] == '1')? true:false;
							}
    						}	
						elements = element.getElementsByTagName("select");
						
						for(var i=0; i<elements.length; i++)
						{
							if(plandetails[elements[i].id] != undefined)
							{
								for(j=0;j<elements[i].options.length;j++)
								{
									if(elements[i].options[j].text == plandetails[elements[i].id])
									{
										elements[i].selectedIndex = j;
									}
								}
							}
						}
						elements = element.getElementsByTagName("textarea");
						for(var i=0; i<elements.length; i++)
						{
							if(plandetails[elements[i].id] != undefined)
							{
								elements[i].value = plandetails[elements[i].id];
							}
						}
						$('#plancreator').dialog('open');
						showcorporatenames($("#types"));
					}
				},
				error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
			});
		}
	}
	function editplan(planid)
	{
		$(".ui-dialog-titlebar").hide();
		document.getElementById('planid').value = planid;
		getplan(planid);
		$('#copyplansrow').hide();
		$("#types").attr("disabled", "disabled");
		$("#planname").attr("readonly", "readonly");
	}

	function validateForm(){
		if($('#types').val() != -1 && $.trim($('#types').text()) != '' && $('#planname').val() != '' )
		{
			return true;
		}else{
			showNotification('300','20','Create Plan','Plan type or name of the plan is not entered.','notification','diaconfirmation',5000);	
			return false;
		}
	}
</script>
<table border="0" cellspacing="0" cellpadding="0" style="width:828px;" height="350px">
        <tr>
          <td colspan="4"><table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Billing Plan </td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td height="30" colspan="3"></td>
          <td width="22%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="80%">&nbsp;</td>
              <td class="button" width="20%" style="height:5px;" onclick="addplan();" align="center" valign="middle" ><a  style="color:#FFFFFF">Add</a></td>
              </tr>
          </table></td>
        </tr>
        <tr>
			<td colspan="4">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					<tr>
					  <td>
						<?php
							//this is emr grid for patient we can put this in other page
							$userid =  $userid;
							$whereclause="[planstatus_c,=,active]";
							$plansgrid= Request::factory('xjqgridcomponent/index');
							$plansgrid->post('name','plans');
							$plansgrid->post('height','370');
							$plansgrid->post('width','815');
							$plansgrid->post('sortname','name');
							$plansgrid->post('sortorder','desc');
							$plansgrid->post('tablename','plans');//used for jqgrid
							$plansgrid->post('columnnames', 'id,name,type,setupcharges,servicecharges,subcharges,duration,createdon,createdby,approvedby,id');//used for jqgrid
							//$plansgrid->post('whereclause',$whereclause);//used for jqgrid
							$columninfo = '[
												{"name":"id","index":"id","hidden":true,"formatter":setplans},							
												{"name":"Name","index":"name","width":150,"hidden":false},
												{"name":"Type","index":"type","width":80,"hidden":false},
												{"name":"Reg.<br/>Charges<br/>(Rs.)","index":"setupcharges","width":70,"hidden":false},
												{"name":"Online<br/>Charges<br/>(Rs.)","index":"servicecharges","width":70,"hidden":false},
												{"name":"Sub.<br/>Charges<br/>(Rs.)","index":"subcharges","width":70,"hidden":false},
												{"name":"Duration<br/>(Months)","index":"duration","width":60,"hidden":false},
												{"name":"Created On","index":"createdon","width":80,"hidden":false},
												{"name":"Created By","index":"createdby","width":100,"hidden":false},
												{"name":"Approved By","index":"approvedby","width":100,"hidden":false},
												{"name":"Action","index":"id","width":160,"hidden":false,"formatter":setaction}
											]';			
							$plansgrid->post('columninfo', $columninfo);
							$plansgrid->post('editbtnenable','false');
							$plansgrid->post('deletebtnenable','false');
							$plansgrid->post('savebtnenable','false');
							echo $plansgrid->execute(); ?>
						</td>
					</tr>
				</table>
			</td>
        </tr>       
</table>

<div id="plancreator" style="display:none;" class="content_bg" style="width:500px;" >
	<form class="cmxform" id="planform" onsubmit="return validateForm();" action="/ayushman/cplanmanager/save" method="post">
		<table width="500px" height="300px" cellspacing="0"  cellpadding="0">
			<tr>
				<td class="content_bg">
					<table width="500px" height="15px" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Plan Details</td>
						</tr>
						<tr id="copyplansrow">
							<td width="24" height="30">&nbsp;</td>
							<td width="157"><span class="bodytext_bold">Copy Plan from existing plan</span></td>
							<td width="27"><span class="bodytext_normal">:</span></td>
							<td width="182" >
								<select style="width:145px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal" onchange="copyplan();" name="allplans"  id="allplans" > 
								</select>
							</td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Name of Plan </span></td>
							<td><span class="bodytext_normal">:</span></td>
							<td><input type="text" style="border:none;border-bottom:thin solid #000000" title="Please enter plan name" id="planname" name="planname_c"/></td>
						</tr>
						<tr>
							<td width="24" height="30">&nbsp;</td>
							<td width="157"><span class="bodytext_bold">Type of Plan </span></td>
							<td width="27"><span class="bodytext_normal">:</span></td>
							<td width="182" >
								<select style="width:145px;border:none;border-bottom:thin solid #000000;" onchange="showcorporatenames(this);" class="bodytext_normal"  name="plantype"  id="types" class="{required:true}" title="Please select plan type"> 
									<?PHP  
										foreach ($types as $type) {
												print "<option class='bodytext_normal'  \" value=\"{$type->id}\">{$type->type_c}</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr id="corporatenamerow">
							<td width="24" height="30">&nbsp;</td>
							<td width="157"><span class="bodytext_bold">Group/Corporate Name </span></td>
							<td width="27"><span class="bodytext_normal">:</span></td>
							<td width="182" >
								<select style="width:145px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="corporateid"  id="corporateid" class="{required:true}" title="Select group/corporate name, for whom this plan is applicable"> 
									<?PHP  
										foreach ($corporates as $corporate) {
											print "<option class='bodytext_normal'  \" value=\"{$corporate->id}\">{$corporate->corporatename_c}</option>";
										}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td valign="top"><span class="bodytext_bold">Plan details </span></td>
							<td valign="top"><span class="bodytext_normal">:</span></td>
							<td><textarea rows="2" cols="20" style="padding-bottom:25px; width:270px;resize:none;height:50px;background-color:white;"  id="plandescription" name="plandescription_c"></textarea></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Reg. Charges </span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="regcharges" style="border:none;border-bottom:thin solid #000000;text-align:right;"  name="registrationcharges_c" />&nbsp;</td>
						</tr>
						<tr >
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Subscription Charges</span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="subcharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="subscriptioncharges_c"/>&nbsp;</td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Periodicity <span class="bodytext_normal"></br>(in months)</span></span></td>
							<td><span class="bodytext_normal">:</span></td>
							<td><input type="text" id="duration" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="periodicity_c"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Usage Charges-Online<span class="bodytext_normal"></br>(per 5 mins only)</span></span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="onlinecharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" id="onlinecharges" name="usagechargesonline_c"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Usage Charges-Phone<span class="bodytext_normal"></br>(per 5 mins only)</span></span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="phonecharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="usagechargesphone_c"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Usage Charges-In Clinic </span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="cliniccharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="usagechargesinclinic"/></td>
						</tr>
						<tr style="display:none;">
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Periodic Charges </span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="periodiccharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="periodiccharges_c"/></td>
						</tr>
						<tr >
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Service Charges </br>(charges for Placing Order, Booking an appointment)</span></td>
							<td><span class="bodytext_normal">:Rs. </span></td>
							<td><input type="text" id="servicecharges" style="border:none;border-bottom:thin solid #000000;text-align:right;" name="servicecharges_c"/></td>
						</tr>

						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Date Effective from</span></td>
							<td><span class="bodytext_normal">:</span></td>
							<td><input name="effectivedate" style="border:none;border-bottom:thin solid #000000" id="effectivedate" readonly="readonly" type="text"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Date Effective till</span></td>
							<td><span class="bodytext_normal">:</span></td>
							<td><input name="effectivetilldate" style="border:none;border-bottom:thin solid #000000" id="effectivetill" readonly="readonly" type="text"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">&nbsp;</span></td>
							<td><span class="bodytext_normal">&nbsp;</span></td>
							<td><input type="checkbox" name="ispackage_c" id="ispackage" value="1" class="bodytext_normal"  ><span class="bodytext_normal">This plan is a package</span></input></td>
						</tr>

						<tr>
							<td height="30">&nbsp;</td>
							<td colspan="3">
								<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="20%" align="center" valign="middle" >&nbsp;</td>
										<td width="20%" align="center" valign="middle" >&nbsp;</td>
										<td width="20%" align="center" valign="middle"><input type="submit" class="button" height="22" style="width: 119px; height: 25px; " value="Save"/></td>
										<td width="5%" align="center" valign="middle" >&nbsp;</td>
										<td align="center" width="80px" valign="middle"><input type="button" class="button" height="22" onclick="$('#plancreator').dialog('close');" style="width: 119px; height: 25px; " value="Cancel"/></td>
										<td width="5%" align="center" valign="middle" >&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table width="500px" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
						
					</table>
				</td>
			</tr>
		</table>
		<input name="userid" id="userid" type="hidden" value="<?php echo $userid;?>"/>
		<input name="planid" id="planid" type="hidden"/>
	</form>
</div>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'plantypes'); ?>
		<?= Arr::path($errors,'saveplan'); ?>
		<?= Arr::path($errors, 'updateplan'); ?>
		<?= Arr::path($errors,'deleteplan'); ?>
	</div>
</div>
<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'saveplan'); ?>
		<?= Arr::path($messages,'deleteplan'); ?>
		<?= Arr::path($messages,'updateplan'); ?>
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
			
