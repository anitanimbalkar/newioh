<script type="text/javascript">
	$(document).ready(function() {
		$( "#tabs" ).tabs();
		$('#acceptaction').dialog({
			autoOpen: false,
			show: "blind",
			hide: "explode",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			width: 500,
			buttons: {
				"Accept": function() {
					var deliverydate = document.getElementById('deliverydate').value;
					deliverydate = deliverydate.replace(" ","-");
    				deliverydate = deliverydate.replace(" ","-");
					$.ajax({
					  url: "/ayushman/cchemist/acceptorder?id="+document.getElementById("orderid").value+"&date="+deliverydate+"&time="+document.getElementById('deliverytime').value,
					  success: function( data ) {
							if(data != '')
								alert(data);
								$('#chemistorderlist').trigger( 'reloadGrid' );
								$('#ordersinprocesslist').trigger( 'reloadGrid' );
							$('#orderscompletedlist').trigger( 'reloadGrid' );
							$('#ordersrejectedlist').trigger( 'reloadGrid' );
							var patuserid=document.getElementById("patuserid").value;
							parent.sendmsgfromtemplate('pullgriddata',patuserid);
						},
						error : function(){}
					});
					
					$(this).dialog("close");
				},
				"Cancel": function() {
					$(this).dialog("close");
				}
			}
		});
		$('#rejectaction').dialog({
			autoOpen: false,
			show: "blind",
			hide: "explode",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			width: 500,
			buttons: {
				"Reject": function() {
						$.ajax({
						  url: "/ayushman/cchemist/rejectorder?id="+document.getElementById("orderid").value+"&reason="+document.getElementById('rejectreason').value,
						  success: function( data ) {
								if(data != '')
									alert(data);
								$('#chemistorderlist').trigger( 'reloadGrid' );
								$('#ordersinprocesslist').trigger( 'reloadGrid' );
							$('#orderscompletedlist').trigger( 'reloadGrid' );
							$('#ordersrejectedlist').trigger( 'reloadGrid' );
							var patuserid=document.getElementById("patuserid").value;
							parent.sendmsgfromtemplate('pullgriddata',patuserid);
							},
							error : function(){alert("error while inserting test");}
						});
						
						$(this).dialog("close");
				},
				"Cancel": function() {
					$(this).dialog("close");
				}
			}
		});
		resize($('contentdiv').height());
	});
	$(function() {
		$( "#deliverydate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
	});
	function testsformatter( cellvalue, options, rowObject )
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
	function refreshallgrid(){
		$('#chemistorderlist').trigger( 'reloadGrid' );
		$('#ordersinprocesslist').trigger( 'reloadGrid' );
		$('#orderscompletedlist').trigger( 'reloadGrid' );
		$('#ordersrejectedlist').trigger( 'reloadGrid' );
	}
	function actionformatter( cellvalue, options, rowObject )
	{	
		var patientuserid =$(rowObject).children()[2].firstChild.data;	
		return '<a href="#" onclick="openacceptaction('+cellvalue+','+patientuserid +');"><font color="#0000FF">Accept</font></a> / <a href="#" onclick="openrejectaction('+cellvalue+','+patientuserid +');"><font color="#0000FF">Reject</font></a>';
	}
	function prescactionformatter( cellvalue, options, rowObject )
	{	
		var patientuserid =$(rowObject).children()[2].firstChild.data;
		var filepath=JSON.parse(getprescriptionpath(cellvalue));
		var path=filepath.filepath;
		if(filepath.flag=='show'){
			return '<a href='+path+' download><font color="#0000FF">Download Prescription</font></a>';
		}
		else{
			return '<a>Prescription Not Available</a>';
		}
	}
	function getprescriptionpath(cellvalue)
	{	
		var result="";
		$.ajax({
			url: "/ayushman/cmedicine/downloadprescription?orderid="+cellvalue,
			async: false,
		  	success: function( data ) {
				result = data;
			},
			error : function(){alert("error");}
		});
	 return result;	
	}
	function openacceptaction(cellvalue,patientuserid)
	{
		document.getElementById("orderid").value = cellvalue;
		document.getElementById("patuserid").value = patientuserid;
		document.getElementById("deliverydate").value="";
		document.getElementById("deliverytime").value="";
		$('#acceptaction').dialog('open');
		$('#acceptaction').focus();
		assignmedicine('medicinename');
		return false;
	}
	function nameformatter( cellvalue, options, rowObject )
	{	
		var patientuserid =$(rowObject).children()[2].firstChild.data;	
		var patphonenumber =  $(rowObject).children()[8].firstChild == undefined?'-': $(rowObject).children()[8].firstChild.data;

		if (patphonenumber == "Order Not Placed")
		{
			return cellvalue;
		}
		else
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="Mobile : '+patphonenumber+'">'+cellvalue+'</label>';
	}
	function nameformatter1( cellvalue, options, rowObject )
	{	
		var patientuserid =$(rowObject).children()[2].firstChild.data;	
		var patphonenumber = $(rowObject).children()[9].firstChild.data;
		if (patphonenumber == "Order Not Placed")
		{
			return cellvalue;
		}
		else
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="Mobile : '+patphonenumber+'">'+cellvalue+'</label>';
	}
	function nameformatter3( cellvalue, options, rowObject )
	{			
		var patientuserid =$(rowObject).children()[2].firstChild.data;	
		var patphonenumber = $(rowObject).children()[6].firstChild.data;
		if (patphonenumber == "Order Not Placed")
		{
			return cellvalue;
		}
		else
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="phone:'+patphonenumber+'">'+cellvalue+'</label>';
	}
	function assignmedicine(divname)
	{	
		var dividnm= '#'+divname;
		var mydata = new Array();
		url = '';
		if(document.getElementById('orderid').value != 'undefined')
		{
			url = "/ayushman/cmedicine/getmedicinesusingorderid?orderid="+document.getElementById('orderid').value;
		}
		$.ajax({
			url: url,
		  	success: function( data ) {
		  		jQuery(dividnm).html('');
				var selectedmedicine = eval('('+data+')');
				for(var i = 0;i<selectedmedicine.length;i++)
				{
					var j=i+1
					if(selectedmedicine[i]["drugname"] != '')
					{
						element = $("<div id='"+selectedmedicine[i]["id"]+"'  style='border-bottom: 1px solid; margin-top:5px; background-color:#E8E8E8;  width:99%;'  />");
						element.appendTo(dividnm);
						$("<table><tr><td><label style='border: none; width:100%; padding: 0px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+j+") "+selectedmedicine[i]["drugname"]+"</label></td></tr></table>").appendTo(element);
						selectele = $(element).children()[1];	
					}
					}
			},
			error : function(){alert("error");}
		});
		
	}
	function openrejectaction(cellvalue,patuserid)
	{
		document.getElementById("orderid").value = cellvalue;
		document.getElementById("rejectreason").value="";
		document.getElementById("patuserid").value = patuserid;
		$('#rejectaction').dialog('open');
		$('#rejectaction').focus();
		assignmedicine('rejectmedicinename');
		return false;
	}
	function completed( cellvalue, options, rowObject )
	{	
		document.getElementById("orderid").value = cellvalue;
		var patientuserid =$(rowObject).children()[2].firstChild.data;	
		return '<a href="#" onclick="completedorder('+cellvalue+','+patientuserid+');"><font color="#0000FF">Completed</font></a>';
	}
	function completedorder(cellvalue,patuserid)
	{
		document.getElementById("orderid").value = cellvalue;
		$.ajax({
	  		url: "/ayushman/cchemist/completedorder?id="+cellvalue,
	 		success: function( data ) {
				if(data != '')
				alert(data);
				$('#chemistorderlist').trigger( 'reloadGrid' );
				$('#ordersinprocesslist').trigger( 'reloadGrid' );
				$('#orderscompletedlist').trigger( 'reloadGrid' );
				$('#ordersrejectedlist').trigger( 'reloadGrid' );
				parent.sendmsgfromtemplate('pullgriddata',patuserid);
			},
			error : function(){alert("error while inserting test");}
		});
		
	}
	function statusformatter( cellvalue, options, rowObject )
	{
		if(cellvalue == 'completed')
			return "Delivered";
		if(cellvalue == 'accepted')
			return "Order in process";
		if(cellvalue == 'rejected')
			return "Order rejected";
	}
</script>	
<div id="contentdiv" style="width:820px; height:500px;"> 
	<div id="tabs" style="float:left;vertical-align:top;height:500px;width:825px;position:relative;overflow-y:auto;background:transparent;border:none;">
		<ul class="tabholder" style="background-color:none;background:none;border:none;">		
			<li class="TopBtn_bg"><a href="#tabs-1" >Requisition</a></li>
			<li class="TopBtn_bg"><a href="#tabs-2">Orders in process</a></li>
			<li class="TopBtn_bg"><a href="#tabs-3">Orders completed</a></li>
			<li class="TopBtn_bg"><a href="#tabs-4">Orders rejected</a></li>	
		</ul>
	<div id="tabs-1" style="padding-left:2px;padding-top:2px;">	
		<table border="0" align="left" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width:818px;">
					<table width="100%"   cellpadding="0" cellspacing="0"  >
						<tr>
							<td >
								<?php
								//this is emr grid for patient we can put this in other page
								$pathologistjqgridrequest= Request::factory('xjqgridcomponent/index');
								$pathologistjqgridrequest->post('name','chemistorder');
								$pathologistjqgridrequest->post('height','250');
								$pathologistjqgridrequest->post('width','805');
								$pathologistjqgridrequest->post('sortname','refchemistordersid');
								$pathologistjqgridrequest->post('sortorder','desc');
								$pathologistjqgridrequest->post('tablename','patientmedicine');//used for jqgrid
								$pathologistjqgridrequest->post('columnnames', 'refchemistordersid,date,patientuserid,patientname,drname,prescriptionorder,priority,refchemistordersid,patientmobilenumber');//used for jqgrid

								$pathologistjqgridrequest->post('whereclause',"[chemistid,=,$chemistid][status,=,requested]");//used for jqgrid
								$columninfo = 	'[	
													{"name":"Req. no.","index":"refchemistordersid","width":75},
													{"name":"Request Date","index":"date","width":90,"editable":false},
													{"name":"Id","index":"patientuserid","hidden":false,"width":20, "hidden":true},
													{"name":"Patient Name","index":"patientname","width":90,"formatter":nameformatter,"title":false},
													{"name":"Doctor Name","index":"drname","width":90,"formatter":nameformatter,"title":false},													
													{"name":"Medicines","index":"prescriptionorder","width":200,"formatter":testsformatter},
													{"name":"Priority","index":"priority","width":50,"editable":false,"hidden":true},
													{"name":"Action","index":"accept","width":100,"align":"center","editable":true,"formatter":actionformatter,"align":"left"},
													{"name":"patientmobilenumber","index":"patientmobilenumber","width":80,"editable":false,"hidden":true}
												]';
								$pathologistjqgridrequest->post('columninfo', $columninfo);
								$pathologistjqgridrequest->post('editbtnenable','false');
								$pathologistjqgridrequest->post('deletebtnenable','false');
								$pathologistjqgridrequest->post('savebtnenable','false');
								echo $pathologistjqgridrequest->execute(); ?>
							</td>
						</tr>
					</table>
						</td>
					</tr>
				</table>
		</div>
<div id="tabs-2" style="height:auto;padding-left:2px;padding-top:2px;" >	
			<table border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:818;">
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersinprocess= Request::factory('xjqgridcomponent/index');
									$ordersinprocess->post('name','ordersinprocess');
									$ordersinprocess->post('height','250');
									$ordersinprocess->post('width','805');
									$ordersinprocess->post('sortname','refchemistordersid');
									$ordersinprocess->post('sortorder','desc');
									$ordersinprocess->post('tablename','patientmedicine');//used for jqgrid
									$ordersinprocess->post('columnnames', 'refchemistordersid,date,patientuserid,patientname,drname,priority,deliverydate,status,refchemistordersid,refchemistordersid,patientmobilenumber');//used for jqgrid
									$ordersinprocess->post('whereclause',"[chemistid,=,$chemistid][status,=,accepted]");//used for jqgrid
									$columninfo = 	'[	
														{"name":"Ord.No.","index":"refchemistordersid","width":30},
														{"name":"Order Date","index":"date","width":60,"editable":false},
														{"name":"Id","index":"patientuserid","hidden":false,"width":20,"hidden":true},
														{"name":"Patient Name","index":"patientname","width":80,"formatter":nameformatter1,"title":false},
														{"name":"Doctor Name","index":"drname","width":80,"editable":false},														
														{"name":"Priority","index":"priority","width":50,"editable":false,"hidden":true},
														{"name":"Delivery date","index":"accept","width":60,"align":"left","editable":true},
														{"name":"Status","index":"status","width":50,"align":"center","editable":true,"formatter":statusformatter},
														{"name":"Prescription","index":"view","width":50,"align":"center","editable":true,"formatter":prescactionformatter,"align":"left"},
														{"name":"Action","index":"upload","width":60,"align":"left","editable":true,"formatter":completed},
														{"name":"patientmobilenumber","index":"patientmobilenumber","width":50,"editable":false,"hidden":true}
													]';
									$ordersinprocess->post('columninfo', $columninfo);
									$ordersinprocess->post('editbtnenable','false');
									$ordersinprocess->post('deletebtnenable','false');
									$ordersinprocess->post('savebtnenable','false');
									echo $ordersinprocess->execute(); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
			<div id="tabs-3" style="height:auto;padding-left:2px;padding-top:2px;">	
			<table border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:818px;">
						<table width="100%"   cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$orderscompleted= Request::factory('xjqgridcomponent/index');
									$orderscompleted->post('name','orderscompleted');
									$orderscompleted->post('height','250');
									$orderscompleted->post('width','805');
									$orderscompleted->post('sortname','refchemistordersid');
									$orderscompleted->post('sortorder','desc');
									$orderscompleted->post('tablename','patientmedicine');//used for jqgrid
									$orderscompleted->post('columnnames', 'refchemistordersid,date,patientuserid,patientname,drname,priority,deliverydate,status,patientmobilenumber');//used for jqgrid
									$orderscompleted->post('whereclause',"[chemistid,=,$chemistid][status,=,completed]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Ord.No.","index":"refchemistordersid","width":40},
														{"name":"Order Date","index":"date","width":90,"editable":false},
														{"name":"Id","index":"patientuserid","hidden":false,"width":20,"hidden":true},
														{"name":"Patient Name","index":"patientname","width":100,"formatter":nameformatter,"title":false},
														{"name":"Doctor Name","index":"drname","width":90,"formatter":nameformatter,"editable":false},												
														{"name":"Priority","index":"priority","width":50,"editable":false,"hidden":true},
														{"name":"Delivery date","index":"deliverydate","width":100,"align":"left","editable":true},
														{"name":"Status","index":"status","width":100,"align":"left","editable":true,"formatter":statusformatter},
														{"name":"patientmobilenumber","index":"patientmobilenumber","width":80,"editable":false,"hidden":true}
													]';
									$orderscompleted->post('columninfo', $columninfo);
									$orderscompleted->post('editbtnenable','false');
									$orderscompleted->post('deletebtnenable','false');
									$orderscompleted->post('savebtnenable','false');
									echo $orderscompleted->execute(); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
<div id="tabs-4" style="height:auto;padding-left:2px;padding-top:2px;" >	
			<table border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:818px;">
						<table width="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersrejected= Request::factory('xjqgridcomponent/index');
									$ordersrejected->post('name','ordersrejected');
									$ordersrejected->post('height','250');
									$ordersrejected->post('width','805');
									$ordersrejected->post('sortname','refchemistordersid');
									$ordersrejected->post('sortorder','desc');
									$ordersrejected->post('tablename','patientmedicine');//used for jqgrid
									$ordersrejected->post('columnnames', 'refchemistordersid,date,patientuserid,patientname,drname,status,rejectreason,patientmobilenumber');//used for jqgrid
									$ordersrejected->post('whereclause',"[chemistid,=,$chemistid][status,=,rejected]");//used for jqgrid
									$columninfo = 	'[	
														{"name":"Ord.No.","index":"refchemistordersid","width":50},
														{"name":"Request Date","index":"date","width":100,"editable":false},
														{"name":"Id","index":"patientuserid","hidden":false,"width":20,"hidden":true},
														{"name":"Patient Name","index":"patientname","width":110,"formatter":nameformatter3,"title":false},
														{"name":"Doctor Name","index":"drname","width":100,"editable":false},																
														{"name":"Status","index":"status","width":100,"formatter":statusformatter},
														{"name":"Reject Reason","index":"rejectreason","width":100,"align":"center","editable":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","width":80,"editable":false,"hidden":true}

													]';
									$ordersrejected->post('columninfo', $columninfo);
									$ordersrejected->post('editbtnenable','false');
									$ordersrejected->post('deletebtnenable','false');
									$ordersrejected->post('savebtnenable','false');
									echo $ordersrejected->execute(); ?>
								
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div></div>
	<div id="acceptaction" title="Delivery date">
		<form id="acceptactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;">&nbsp;Medicines:</div></td>
				</tr>
				<tr>
					<td style="width:100%;"><div id="medicinename" ></div></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;"><input id="deliverydate1" readonly="readonly" style="margin-left:5px;width:0px;height:0pt;border:none;border-bottom:1px solid;font-size:9pt;line-height:14pt;"/>
						<label  style="font-size:9pt;height:15pt;">Delivery date :</label><input id="deliverydate" readonly="readonly" style="margin-left:5px;width:200px;height:15pt;border:none;border-bottom:1px solid;font-size:9pt;line-height:14pt;"/>
					</td>
				</tr>
				<tr>
				<td><label  style="font-size:9pt;height:15pt;">Delivery time:</label> <select  id="deliverytime" name="deliverytime"   title="Please enter Delivery time"> <option value="00:00">00:00</option> <option value="00:30">00:30</option><option value="01:00">01:00</option><option value="01.30">01.30</option><option value="02:00">02:00</option><option value="02:30">02:30</option><option value="03:00">03:00</option><option value="03:30">03:30</option>  <option value="04:00">04:00</option> <option value="04:30">04:30</option><option value="05:00">05:00</option><option value="05:30">05:30</option><option value="06:00">06:00</option><option value="06.:0">06:30</option><option value="07:00">07:00</option> <option value="07:30">07:30</option> <option value="08:00">08:00</option><option value="08:30">08:30</option><option value="09:00">09:00</option><option value="09:30">09:30</option><option value="10:00">10:00</option><option value="10:30">10:30</option><option value="11:00">11:00</option> <option value="11:30">11:30</option> <option value="12:00">12:00</option><option value="12.30">12.30</option><option value="13:00">13:00</option><option value="14:30">14:30</option><option value="15:00">15:00</option> <option value="15:30">15:30</option> <option value="16:00">16:00</option><option value="16:30">16:30</option><option value="17:00">17:00</option> <option value="18:30">18:30</option> <option value="19:00">19:00</option><option value="19:30">19:30</option><option value="20:00">20:00</option><option value="21:30">20:30</option><option value="21:30">21:00</option><option value="21:30">21:30</option><option value="22:00">22:00</option> <option value="22:30">22:30</option> <option value="23:00">23:00</option><option value="23:30">23:30</option></select></select>
				</td></tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
	</div>
	<div id="rejectaction" title="Reject reason">
		<form id="rejectactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;">&nbsp;Medicines:</td>
				</tr>
				<tr>
					<td style="width:100%;"><div id="rejectmedicinename" style="width:100%;"></div></td>
				</tr>
				<tr>
					<td style="width:100%;">&nbsp;Reject reason:</td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<textarea id="rejectreason" name="rejectreason" style="font-size:9pt;background-color:white;width:95%;height:100px;" ></textarea>
					</td>
				</tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
		<input id="patuserid" type = "hidden"/>
	</div>
</div>

      
