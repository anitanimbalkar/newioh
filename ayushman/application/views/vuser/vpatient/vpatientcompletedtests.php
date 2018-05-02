<script type="text/javascript">
	function dump(arr,level) {
		var dumped_text = "";
		if(!level) level = 0;

		//The padding given at the beginning of the line.
		var level_padding = "";
		for(var j=0;j<level+1;j++) level_padding += "    ";

		if(typeof(arr) == 'object') { //Array/Hashes/Objects 
			for(var item in arr) {
				var value = arr[item];
				
				if(typeof(value) == 'object') { //If it is an array,
					dumped_text += level_padding + "'" + item + "' ...\n";
					dumped_text += dump(value,level+1);
				} else {
					dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
				}
			}
		} else { //Stings/Chars/Numbers etc.
			dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
		}
		return dumped_text;
	}
	function setlink( cellvalue, options, rowObject )
	{
		
		document.getElementById('patientid').innerHTML = $(rowObject).children()[7].firstChild.data;
		if(cellvalue == "suggested" )
			return '<div align="center" style="width:100%"><a href="#" onclick="opentests('+$(rowObject).children()[2].firstChild.data+','+$(rowObject).children()[8].firstChild.data+');" ><font color="#220CE6">Assign diagnostic lab</font></a></div>';
		else
			if(cellvalue == "reportsuploaded" ||cellvalue == "reportscollected" )
			{
				
				return '<div align="center" style="width:100%"><a href="#" onclick="viewDetailReport('+$(rowObject).children()[2].firstChild.data+');"><font color="#0000FF">Details</font></a></div>';
			}
				 
			else
				if(cellvalue == "requested" ||cellvalue == "rejected")
				{
					 return '<div align="center" style="width:100%"><a href="#" onclick="opentests('+$(rowObject).children()[2].firstChild.data+','+$(rowObject).children()[8].firstChild.data+');" ><font color="#220CE6">Reassign diagnostic lab</font></a></div>';
				}else
					if(cellvalue == "accepted" || cellvalue == "workinprogress" ){
					return $(rowObject).children()[6].firstChild.data;
					}else
						if(cellvalue == "reassign")
						return 'Reassinged';
	}
	function viewDetailReport(orderid)
	{
		var newFrame = document.createElement("iframe");
		newFrame.setAttribute("id","iframedetailreport");
		newFrame.setAttribute("src", window.location.protocol +"//"+ window.location.host +'/ayushman/cpathologist/pathologistdetailreport?id='+orderid );	
		newFrame.style.width = 680+"px"; 
		newFrame.style.height = 500+"px"; 
		newFrame.frameBorder = "0";
		newFrame.scrolling ="no";
		newFrame.setAttribute("frameBorder", "0");
		$("#detailedreport").empty();
		var target = document.getElementById("detailedreport");
		target.appendChild(newFrame);		
		$("#showdetailedreport").dialog("open");
			
	}
	function assignpathologist()
	{
			var mydata = new Array();
			$.ajax({
			  url: "/ayushman/cpathologist/getpathologists",
			  success: function( data ) {
					jQuery('#popup').html('');
					var pathologists = data;
					$.ajax({
						  url: "/ayushman/ctests/gettestsusingorderid?orderid="+document.getElementById('orderid').value,
						  success: function( data ) {
										var selectedtests = eval('('+data+')')
									//	var selectedtests = eval('(' +getselecteditems('divtest',4) + ')');
										pathologists = eval('('+pathologists+')');
										select = '<select style="width:30%;font-size:9pt;">'
										for(i=0;i<pathologists.length;i++)
										{
											select = select +'<option style="font-size:9pt;" value='+pathologists[i][0]+'>'+pathologists[i][1]+'</option>';
										}
										
										select = select + '<select>';
										for(var i = 0;i<selectedtests.length;i++)
										{
											if(selectedtests[i]["testname"] != '')
											{
												element = $("<div id='"+selectedtests[i]["id"]+"'  style='border-bottom: 1px solid; margin-top:5px; background-color:#E8E8E8;  width:99%;'  />");
												element.appendTo('#popup');
													$("<label style='border: none; width:70%; padding: 0px; float:left;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: black; font-weight: bold;'>"+selectedtests[i]["testname"]+"</label>").appendTo(element);
													$(select).appendTo(element);
												selectele = $(element).children()[1];
												
												
												
												if(document.getElementById('selectedpathologists').value != '')
												{
													selectedvalues = eval('('+document.getElementById('selectedpathologists').value+')');
													for(j=0;j<selectedvalues.length;j++)
													{
														if(selectedtests[i][1] == selectedvalues[j][0])
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
		document.getElementById('orderid').value = cellvalue;
		document.getElementById('appointmentid').value = appointmentid;
		$('#popup').dialog('open');
		assignpathologist();
	}
	function openreports(orderid)
	{
		document.getElementById('orderid').value = orderid;
		$.ajax({
				  url: "/ayushman/cpathologist/getpathologistorderinfo?orderid="+orderid,
				  success: function( data ) {
						if(data == '')
							alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
						else
							window.open("/"+data);
					},
					error : function(){}
			  });
	}
	function testsformatter( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i<arr.length;i++)
		{
			string = string + i+') '+arr[i]+"<br />";
		}
		return string;
	}
	function statusformatter( cellvalue, options, rowObject )
	{
		if(cellvalue == 'reportsuploaded')
			return "Uploaded";
		if(cellvalue == 'reportscollected')
			return "Collected";
		if(cellvalue == 'accepted')
			return "Order in process";
		if(cellvalue == 'rejected')
			return "Order rejected";
		if(cellvalue == 'requested')
			return "Requested";
		if(cellvalue == 'reassign')
			return "Reassigned";
	}
	
	$(document).ready(function(){
		$('#popup').dialog({
				autoOpen: false,
				width: 550,
				modal:true,
				buttons: {
					"Ok": function() {
							popupchildnodes = $('#popup').children();
							array = new Array();
							for(i=0;i<popupchildnodes.length;i++)
							{
								element = $(popupchildnodes[i]).children()[1];
								array[i] = new Array(3);
								array[i][0] = popupchildnodes[i].id;
								array[i][1] = element.selectedIndex+','+element[element.selectedIndex].text;
								array[i][2] = element.value;
							}
							$('#selectedpathologists').val(JSON.stringify(array));
							$(this).dialog("close");
							
							$.ajax({
							  url: "/ayushman/cemr/requesttests?ids="+document.getElementById('selectedpathologists').value+"&appid="+document.getElementById('appointmentid').value,
							  success: function( data ) {
										$('#popup').trigger("reloadGrid");
								},
								error : function(){alert("error while inserting test");}
						  });
							
					},
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
			});
			$('#showdetailedreport').dialog({
			autoOpen: false,
			title: "Detailed Test Report" ,
			show: "fade",
			hide: "fade",
			width: "730px",
			modal: true,
			height: "500",
			resize: "auto",
			resizable: false
		});
		jQuery("#showdetailedreport").dialog('option', 'position', ['center',50]);
	});
</script>

<div id="body_contantpatientpage" style="width:828px; height: 100%;">
	    <table width="100%" border="0" cellspacing="0" style="padding:3px;" cellpadding="0">
			  <tr>
				  <td width="100%" class="Heading_bg">Tests</td>
				  <td align="center" style="display:none;">
					Patient ID : <label id="patientid"></label>
				</td>
			  </tr>
		</table> 
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
										$data ='[puserid:'.$userid.']';
										$tests->post('usetemplate','true');
										$tests->post('data',$data);
										$tests->post('tablename','completedtestbydiagnosticlab');
										$tests->post('name','tests');
										$tests->post('height','380');
										$tests->post('width','815');
										$tests->post('sortname','date');
										$tests->post('sortorder','asc');
										$tests->post('usetemplate','true');
										$tests->post('data',$data);
										$tests->post('columnnames', 'doctorname,pathologistname,requisitionno,tests,status,status,deliverydate,patientid,appid');//used for jqgrid
										$tests->post('whereclause',"[patientsuserid,=,".$userid."]");//used for jqgrid
										$columninfo = 	'[
															{"name":"Suggested By","index":"doctorname","width":80,"editable":false},
															{"name":"Diagnostic Center","index":"pathologistname","hidden":false,"width":80},
															{"name":"Ord.No.","index":"requisitionno","width":30},
															{"name":"Tests","index":"tests","width":200,"formatter":testsformatter},
															{"name":"Status","index":"status","width":40,"formatter":statusformatter},
															{"name":"","index":"status","width":80,"formatter":setlink},
															{"name":"deliverydate","index":"deliverydate","width":100,"hidden":true},
															{"name":"patientid","index":"patientid","width":100,"hidden":true},
															{"name":"appid","index":"appid","width":50,"hidden":true}
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
					<tr>
						<td style="width:1%;" >&nbsp;</td>
						<td style="width:98%;">&nbsp;</td>
						<td style="width:1%;" >&nbsp;</td>
					</tr>
				</table>
				<div id="popup" style="width:100%;" title="Assign tests to pathologist">
				
				</div>
				<input type="hidden" id="orderid"/>
				<input type="hidden" id="selectedpathologists"/>
				<input type="hidden" id="appointmentid"/>
				
 </div>
 <div id="showdetailedreport" style="width:690px;overflow-y:auto;height:auto; "  >
 	<table>
		<tr>
		<td>&nbsp; </td>
		<td>
			<div id="detailedreport" ></div>
			
		</td>
		
		</tr>
	</table>
 </div>
