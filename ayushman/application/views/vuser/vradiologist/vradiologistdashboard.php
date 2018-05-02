
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	$(function() {
		$( "#tabs" ).tabs();
		$(function() {
			$( "#deliverydate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
		});
		$('#acceptaction').dialog({
			autoOpen: false,
			show: "blind",
			hide: "explode",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			width: 400,
			buttons: {
				"Accept": function() {
					var deliverydate = document.getElementById('deliverydate').value;
    				deliverydate = deliverydate.replace(" ","-");
    				deliverydate = deliverydate.replace(" ","-");
					$.ajax({
					  url: "/ayushman/cpathologist/acceptorder?id="+document.getElementById("orderid").value+"&date="+deliverydate,
					  success: function( data ) {
							$('#pathologisttestslist').trigger( 'reloadGrid' );
							$('#ordersinprocesslist').trigger( 'reloadGrid' );
							$('#orderscompletedlist').trigger( 'reloadGrid' );
							$('#ordersrejectedlist').trigger( 'reloadGrid' );
							data =  JSON.parse(data);
							if(data['type'] == 'error')
								showMessage('550','200','Accept Order',data['message'],data['type'],'id');
							else
							{
								showNotification('300','50','Accept Order',data['data'],'notification','diaconfirmation',5000);
							}
							$('#pathologisttestslist').trigger( 'reloadGrid' );
							$('#ordersinprocesslist').trigger( 'reloadGrid' );
							$('#orderscompletedlist').trigger( 'reloadGrid' );
							$('#ordersrejectedlist').trigger( 'reloadGrid' );
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
		jQuery("#acceptaction").dialog('option', 'position', [150,150]);
		$('#addreport').dialog({
			autoOpen: false,
			
			show: "fade",
			hide: "fade",
			width: "730px",
			modal: true,
			height: "350",
			resize: "auto",
			resizable: false
		});
		jQuery("#acceptaction").dialog('option', 'position', [150,150]);
		$("#addreport").siblings('div.ui-dialog-titlebar').remove();
		$('#showdetailedreport').dialog({
			autoOpen: false,
			title: "Detailed Test Report" ,
			show: "fade",
			hide: "fade",
			width: "790",
			modal: true,
			height: "400",
			resize: "auto",
			resizable: false,
			buttons: {
				"Close": function() {
						$(this).dialog("close");
				}
			}
		});
		jQuery("#showdetailedreport").dialog('option', 'position', [10,75]);
		$('#rejectaction').dialog({
			autoOpen: false,
			show: "blind",
			hide: "explode",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			width: 400,
			buttons: {
				"Reject": function() {
						$.ajax({
						  url: "/ayushman/cpathologist/rejectorder?id="+document.getElementById("orderid").value+"&reason="+document.getElementById('rejectreason').value,
						  success: function( data ) {
								if(data != '')
									alert(data);
								$('#pathologisttestslist').trigger( 'reloadGrid' );
								$('#ordersinprocesslist').trigger( 'reloadGrid' );
								$('#orderscompletedlist').trigger( 'reloadGrid' );
								$('#ordersrejectedlist').trigger( 'reloadGrid' );
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
		jQuery("#rejectaction").dialog('option', 'position', [150,150]);
		resize($('contentdiv').height());
	});
	function closepopup(thisclose)
	{
		$("#"+thisclose).dialog("close");
	}
	function showreportpages(val,testnumber)
	{
		var val= $("#selectreport"+testnumber+"pages").val();
		for(i=0;i<=document.getElementById("test"+testnumber+"pages").value;i++)
    	{	
			var div = document.getElementById("filefortest"+testnumber);
			if (div) {
				div.parentNode.removeChild(div);
			}
		}
		for(i=0;i<val;i++)
		{		
			var pagenumber=i+1;
			$("#filetablefortest"+testnumber+" > tbody").append('<table width="100%" height="5px" border="0" style="padding-left:50px;" cellspacing="0" cellpadding="0" id="filefortest'+testnumber+'"><tr style="height:5px;"><td width="1%">&nbsp;</td><td width="25%" height="10px" class="bodytext_bold">Page '+pagenumber+' of '+val+'</td><td width="2%">&nbsp;</td><td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0" ><tr><td><input type="file" name="report'+testnumber+'page'+ i+'" id="report'+testnumber+'page'+ i+'" class="bodytext_normal "/></td></tr></table></td><td width="34%">&nbsp;</td><td width="24%">&nbsp;</td></tr></table>');
			$("#testname"+i).autocomplete({source: "/ayushman/cautocompletedata/retrieve?query=select id, testname_c as value from testmasters where testname_c "});
		}
    	document.getElementById("test"+testnumber+"pages").value= val;
	}
	function showreportvalue(val,artest)
	{
	    var val=$("#testnumberselect").val();
		var i=0;
		for(i=0;i<document.getElementById("reportpagesno").value;i++)
    	{
			var div = document.getElementById("reportuploaderchild"+i);
			if (div) {
				div.parentNode.removeChild(div);
			}
		}
		for(i=0;i<val;i++)
		{
			$("#uploadreport > tbody").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="reportuploaderchild'+i+'"><tr><td width="3%">&nbsp;</td><td width="17%"><input title="'+artest[i].value +'" name="testname'+i+'" readonly value="'+artest[i].value +'" id="testname'+i+'" type="text" class="textarea bodytext_bold" size="13"/><input type="hidden"  value="'+artest[i].id +'"  name="htestname'+i+'"/></td><td width="1%">&nbsp;</td><td width="1%">&nbsp;</td><td width="1%">&nbsp;</td><td width="28%"><input name="referenceno'+i+'"  id="referenceno'+i+'"type="text" class="textareapopup" size="24"/></td><td width="1%">&nbsp;</td><td width="14%"><span class="bodytext_normal"><select class="textarea" style="border:none;border-bottom:1px thin" name="selectreport'+i+'pages" id="selectreport'+i+'pages"" onchange="showreportpages(this.value,'+i+');" size="1" style="width:70px;"><option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option> <option>06</option>  <option>07</option><option>08</option><option>09</option><option>10</option></select> </span></td></tr><tr><td width="3%">&nbsp;</td><td width="17%" align="left" style="padding-left:5px;" valign="top"><span class="bodytext_normal">Test Name</span></td><td width="1%">&nbsp;</td><td width="1%">&nbsp;</td><td width="1%">&nbsp;</td><td width="28%" align="left" valign="top"><span class="bodytext_normal">Reference Number Observed</span></td><td width="1%">&nbsp;</td><td width="14%" align="left" valign="top"><span class="bodytext_normal">No of Pages</span></td>  </tr><tr><td><input id="test'+i+'pages" name="test'+i+'pages" type = "hidden"/></td></tr><tr><td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="filetablefortest'+i+'"><tr><td> <table width="100%" border="0" cellspacing="0" cellpadding="0" id="filefortest'+i+'"><tr>          </td></tr></table></td></tr></table>');
			
			document.getElementById("test"+i+"pages").value=0;
		}
    	document.getElementById("reportpagesno").value= val;
	}
	function addreportsave()
	{	
		$('html, body').css("cursor", "wait");
		var i;var error=0;
		var numberoftest=$("#testnumberselect").val();
		for(i=0;i<numberoftest;i++)
		{ 	
			if(error== 0)
			{
				var reportpages=$("#selectreport"+i+"pages").val();	
				var allow = new Array('gif','png','jpg','jpeg','bmp','pdf');var j=0;
				for(j=0; j < reportpages; j++)
				{  
					if(error== 0)
					{
						if($('#report'+i+'page'+j).size() > 0)
						{				
							var ext = $('#report'+i+'page'+j).val().split('.').pop().toLowerCase();
							if($('#report'+i+'page'+j).val() != 'undefined' && ext != '')
							{ 
								if(jQuery.inArray(ext, allow) == -1) //search in allow array, ext is present or not.
								{
									var currentreport=i+1;
									var currentpage=j+1;
									alert("Error : In report "+ currentreport + ", page number "+ currentpage +" file type '." + ext + "' is not supported.");
									error=1;
								}
							}
						}
					}
				}
			}
		}
		if(error==0){
			document.forms["uplodmultiplereports"].action="/ayushman/cpathologist/savereports";
			$("#uplodmultiplereports").submit();
			
		}
		else{
		 return false;
		}
	}
	function openacceptaction(cellvalue)
	{
		document.getElementById("orderid").value = cellvalue;
		$('#acceptaction').dialog('open');
		$('#acceptaction').focus();
		return false;
	}
	function openrejectaction(cellvalue)
	{
		document.getElementById("orderid").value = cellvalue;
		$('#rejectaction').dialog('open');
		$('#rejectaction').focus();
		return false;
	}
	function acceptbuttonformatter( cellvalue, options, rowObject )
	{
		return '<a href="#" onclick="openacceptaction('+cellvalue+');"><font color="#0000FF">Accept</font></a>';
	}
	function actionformatter( cellvalue, options, rowObject )
	{
		return '<a href="#" onclick="openacceptaction('+cellvalue+');"><font color="#0000FF">Accept</font></a> / <a href="#" onclick="openrejectaction('+cellvalue+');"><font color="#0000FF">Reject</font></a>';
	}
	function collectactionformatter( cellvalue, options, rowObject )
	{
		if($(rowObject).children()[7].firstChild.data == 'reportsuploaded')
			return '<a href="#" onclick="viewDetailReport('+cellvalue+');"><font color="#0000FF">Detail</font></a> / <!--<a href="#" onclick="openreports('+cellvalue+');"><font color="#0000FF">View</font></a> /--> <a href="#" onclick="collectaction('+cellvalue+');"><font color="#0000FF">Collect</font></a>';
		if($(rowObject).children()[7].firstChild.data == 'reportscollected')
			return '<a href="#" onclick="viewDetailReport('+cellvalue+');"><font color="#0000FF">Detail</font></a>';
	}
	 function dump(obj) {
		var out = '';
		for (var i in obj) {
		out += i + ": " + obj[i] + "\n";
		}

		alert(out);
	}


	function statusformatter( cellvalue, options, rowObject )
	{
		if(cellvalue == 'reportsuploaded')
			return "Reports Uploaded";
		if(cellvalue == 'reportscollected')
			return "Reports Collected";
		if(cellvalue == 'accepted')
			return "Order in process";
		if(cellvalue == 'rejected')
			return "Order rejected";
	}
	function viewDetailReport(orderid)
	{	
	
		var newFrame = document.createElement("iframe");
		newFrame.setAttribute("id","iframedetailreport");
		newFrame.setAttribute("src", '/ayushman/cpathologist/pathologistdetailreport?id='+orderid );	
		newFrame.style.width = 770+"px"; 
		newFrame.style.height = 255+"px"; 
		newFrame.frameBorder = "0";
		newFrame.scrolling ="no";
		newFrame.setAttribute("frameBorder", "0");
		$("#detailedreport").empty();
		var target = document.getElementById("detailedreport");
		target.appendChild(newFrame);		
		$("#showdetailedreport").dialog("open");
			
	}
	function openreports(orderid)
	{
		alert(orderid);
		$.ajax({
				  url: "/ayushman/cpathologist/getpathologistorderinfo?orderid="+orderid,
				  success: function( data ) {
						alert(data);
						window.open("/"+data);
					},
					error : function(){}
			  });
		
		
	}
	function collectaction(orderid)
	{
		$.ajax({
				  url: "/ayushman/cpathologist/collectorder?id="+orderid,
				  success: function( data ) {
						if(data != '')
							alert(data);
							$('#pathologisttestslist').trigger( 'reloadGrid' );
							$('#ordersinprocesslist').trigger( 'reloadGrid' );
							$('#orderscompletedlist').trigger( 'reloadGrid' );
							$('#ordersrejectedlist').trigger( 'reloadGrid' );
					},
					error : function(){}
				});
	}
	function rejectbuttonformatter( cellvalue, options, rowObject )
	{
		return '<a href="#" onclick="openrejectaction('+cellvalue+');"><font color="#0000FF">Reject</font></a>';
	}
	function uploadbuttonformatter( cellvalue, options, rowObject )
	{
		return '<a style="margin-top:5px; cursor:pointer; "  onclick="openreport('+cellvalue+');" ><font color="#0000FF">Upload</font></a>';		
	}

	function openreport(orderid)
	{
		window.scrollTo(0, 0);
		window.location = "/ayushman/cuploadpastvisit/radiologistorderreports?id="+orderid;
		
	/*	document.getElementById("selectedappid").value=orderid;
		
		$.ajax({
				  url: "/ayushman/cpathologist/gettests?orderid="+orderid,
				  success: function( data ) {
				  		data = JSON.parse(data)
						
						$('#addreport').dialog("open");
						//$("#testnumberselect").val(data.length);
						$("#testnumberselect").find('option').remove().end();		
						$("#testnumberselect").append("<option value=\""+data.length +"\" >"+data.length+"</option>");
		
						showreportvalue(data.length, data);
					},
					error : function(){}
			  });
		*/
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
	function uploadreports(orderid)
	{
		document.getElementById("uploadorderid").value = orderid;
		$('#file').click();
	}
	function changevalue(file,id)
	{
		window.alert("Changevalue");
		window.alert(id);
		$(document.forms[id]).submit();
	}
	
	$(function() {
		$(".inputWrapper").mousedown(function() {
			var button = $(this);
			button.addClass('clicked');
			setTimeout(function(){
				button.removeClass('clicked');
			},50);
		});
	});
	/*function statusnameformatter(cellvalue, options, rowObject )
	{
		var patientuserid ='';
		if($(rowObject).children()[2].firstChild != null){
			patientuserid =$(rowObject).children()[2].firstChild.data;
		}
		
		var patphonenumber = '';
		if($(rowObject).children()[9].firstChild != null){
			patphonenumber = $(rowObject).children()[9].firstChild.data;
		}
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="phone:'+patphonenumber+'">'+cellvalue+'</label>';
	}*/
	
	function statusnameformatter(cellvalue, options, rowObject )
	{
		var patientuserid =$(rowObject).children()[2].firstChild.data;
		var patphonenumber = '';
		if($(rowObject).children()[10].firstChild != null)
		if($(rowObject).children()[10].firstChild != "")
			patphonenumber = $(rowObject).children()[10].firstChild.data;
		else
				patphonenumber= "No Information Provided.";
		else
			patphonenumber= "No Information Provided.";		
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="Mobile:  '+patphonenumber+'">'+cellvalue+'</label>';
	}
	
/*	function statusnameformatter2(cellvalue, options, rowObject )
	{
		var patientuserid ='';
		if($(rowObject).children()[6].firstChild != null){
			patientuserid =$(rowObject).children()[6].firstChild.data;
		}
		
		var patphonenumber = '';
		if($(rowObject).children()[7].firstChild != null){
			patphonenumber = $(rowObject).children()[7].firstChild.data;
		}
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="phone:'+patphonenumber+'">'+cellvalue+'</label>';
	}
	*/
	function statusnameformatter2(cellvalue, options, rowObject )
	{
		var patientuserid =$(rowObject).children()[2].firstChild.data;
		var patphonenumber = '';
		if($(rowObject).children()[8].firstChild != null)
		if($(rowObject).children()[8].firstChild != "")
			patphonenumber = $(rowObject).children()[8].firstChild.data;
		else
				patphonenumber= "No Information Provided.";
		else
			patphonenumber= "No Information Provided.";		
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="Mobile:  '+patphonenumber+'">'+cellvalue+'</label>';
	}
	
		
	
</script>
<div id="contentdiv" style="width:831px;overflow-y:auto;">
	<div id="tabs" style="float:left;vertical-align:top;height:auto;width:825px;position:relative;overflow-y:auto;background:transparent;border:none;">
		<ul class="tabholder" style="background-color:none;background:none;border:none;">		
			<li class="TopBtn_bg"><a href="#tabs-1" >Requisition</a></li>
			<li class="TopBtn_bg"><a href="#tabs-2">Orders in process</a></li>
			<li class="TopBtn_bg"><a href="#tabs-3">Orders completed</a></li>
			<li class="TopBtn_bg"><a href="#tabs-4">Orders rejected</a></li>	
		</ul>
		<div id="tabs-1" style="height:auto;padding-left:2px;padding-top:2px;">	
				<table border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td style="width:818px;">
							<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
								<tr>
									<td >
										<?php
										//this is emr grid for patient we can put this in other page
										$pathologistjqgridrequest= Request::factory('xjqgridcomponent/index');
										$data ='[pid:'.$pathologistid.'][status:"requested"]';
										$pathologistjqgridrequest->post('usetemplate','true');
										$pathologistjqgridrequest->post('data',$data);
										$pathologistjqgridrequest->post('tablename','pathologisttest');
										$pathologistjqgridrequest->post('name','pathologisttests');
										$pathologistjqgridrequest->post('height','auto');
										$pathologistjqgridrequest->post('width','805');
										$pathologistjqgridrequest->post('sortname','requisitionno');
										$pathologistjqgridrequest->post('sortorder','asort');
										$pathologistjqgridrequest->post('tablename','pathologisttest');//used for jqgrid
										$pathologistjqgridrequest->post('columnnames', 'requisitionno,patientid,date,patientname,DoctorName,tests,ordervalue,requisitionno,requisitionno,patientuserid,patientmobilenumber');//used for jqgrid
										$pathologistjqgridrequest->post('whereclause',"[pathologistid,=,$pathologistid][status,=,requested]");//used for jqgrid
										$columninfo = 	'[
															{"name":"Req.No.","index":"requisitionno","width":5},
															{"name":"Id","index":"patientid","hidden":true,"width":20},
															{"name":"Request Date","index":"date","width":10,"editable":false},															
															{"name":"Patient Name","index":"patientname","width":10,"formatter":statusnameformatter,"title":false},
															{"name":"Ref. By","index":"DoctorName","width":10,"editable":false},
															{"name":"Tests","index":"tests","width":15,"formatter":testsformatter},
															{"name":"Amount (Rs.)","index":"ordervalue","width":8},															
															{"name":"Action","index":"accept","width":12,"align":"center","editable":true,"formatter":actionformatter,"align":"left"},
															{"name":"patientuserid","index":"patientuserid","hidden":true},
															{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true}
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
									$data ='[pid:'.$pathologistid.'][status:"accepted"]';
									$ordersinprocess->post('usetemplate','true');
									$ordersinprocess->post('data',$data);
									$ordersinprocess->post('tablename','pathologisttest');
									$ordersinprocess->post('name','ordersinprocess');
									$ordersinprocess->post('height','250');
									$ordersinprocess->post('width','805');
									$ordersinprocess->post('sortname','requisitionno');
									$ordersinprocess->post('sortorder','desc');
									$ordersinprocess->post('columnnames', 'requisitionno,patientid,date,patientname,DoctorName,ordervalue,deliverydate,status,requisitionno,patientuserid,patientmobilenumber');//used for jqgrid
									$ordersinprocess->post('whereclause',"[pathologistid,=,$pathologistid][status,=,accepted]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Ord.No.","index":"requisitionno","width":5},
														{"name":"Id","index":"patientid","hidden":true,"width":10},
														{"name":"Order Date","index":"date","width":12,"editable":false},														
														{"name":"Patient Name","index":"patientname","width":13,"formatter":statusnameformatter,"title":false},													
														{"name":"Ref. By","index":"DoctorName","width":13,"editable":false},
														{"name":"Amount (Rs.)","index":"ordervalue","width":9},
														{"name":"Delivery date","index":"accept","width":10,"align":"center","editable":true},														
														{"name":"Status","index":"status","width":10,"align":"center","editable":true,"formatter":statusformatter},
														{"name":"Action","index":"upload","width":10,"align":"center","editable":true,"formatter":uploadbuttonformatter,"align":"left"},
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true}
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
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$orderscompleted= Request::factory('xjqgridcomponent/index');
									$data ='[pid:'.$pathologistid.'][status:"reportsuploaded","reportscollected"]';
									$orderscompleted->post('usetemplate','true');
									$orderscompleted->post('data',$data);
									$orderscompleted->post('tablename','pathologisttest');
									$orderscompleted->post('name','orderscompleted');
									$orderscompleted->post('height','250');
									$orderscompleted->post('width','805');
									$orderscompleted->post('sortname','requisitionno');
									$orderscompleted->post('sortorder','desc');
									$orderscompleted->post('columnnames', 'requisitionno,patientid,date,patientname,DoctorName,ordervalue,deliverydate,status,requisitionno,patientuserid,patientmobilenumber');//used for jqgrid
									$orderscompleted->post('whereclause',"[pathologistid,=,$pathologistid][status,=,reportsuploaded](or)[status,=,reportscollected][pathologistid,=,$pathologistid]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Ord.No.","index":"requisitionno","width":40},
														{"name":"Id","index":"patientid","hidden":true,"width":20},
														{"name":"Order Date","index":"date","width":100,"editable":false},														
														{"name":"Patient Name","index":"patientname","width":95,"formatter":statusnameformatter,"title":false},														
														{"name":"Ref. By","index":"DoctorName","width":50,"editable":false},
														{"name":"Amount(Rs.)","index":"ordervalue","width":70},														
														{"name":"Delivery date","index":"accept","width":100,"align":"center","editable":true},
														{"name":"Status","index":"status","width":80,"align":"center","editable":true,"formatter":statusformatter},
														{"name":"Action","index":"requisitionno","width":90,"align":"center","editable":true,"formatter":collectactionformatter,"align":"left"},	
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true}		
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
						<table width="98%" height="98%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersrejected= Request::factory('xjqgridcomponent/index');
									$data ='[pid:'.$pathologistid.'][status:"rejected"]';
									$ordersrejected->post('usetemplate','true');
									$ordersrejected->post('data',$data);
									$ordersrejected->post('tablename','pathologisttest');
									$ordersrejected->post('name','ordersrejected');
									$ordersrejected->post('height','250');
									$ordersrejected->post('width','805');
									$ordersrejected->post('sortname','requisitionno');
									$ordersrejected->post('sortorder','desc');
									$ordersrejected->post('columnnames', 'requisitionno,patientid,date,patientname,ordervalue,status,rejectreason,patientuserid,patientmobilenumber');//used for jqgrid
									$ordersrejected->post('whereclause',"[pathologistid,=,$pathologistid][status,=,rejected]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Ord.No.","index":"requisitionno","width":50},
														{"name":"Id","index":"patientid","hidden":true,"width":20},
														{"name":"Request Date","index":"date","width":100,"editable":false},														
														{"name":"Patient Name","index":"patientname","width":95,"formatter":statusnameformatter2,"title":false},														
														{"name":"Amount(Rs.)","index":"ordervalue","width":50},
														{"name":"Status","index":"status","width":80,"formatter":statusformatter},
														{"name":"Reject Reason","index":"rejectreason","width":100,"align":"center","editable":true,"align":"left"},
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true}	
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
		</div>
	</div>	
	<div id="acceptaction" title="Delivery date">
		<form id="acceptactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;"></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<label  style="font-size:9pt;height:15pt;">Delivery date :</label><input id="deliverydate" readonly="readonly" style="margin-left:5px;width:200px;height:15pt;border:none;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;"/>
					</td>
				</tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
	</div>
	<div id="rejectaction" title="Reject reason">
		<form id="rejectactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;"></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<textarea id="rejectreason" name="rejectreason" style="font-size:9pt;background-color:white;width:95%;height:100px;" ></textarea>
					</td>
				</tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
	</div>
	
	 <!-- onsubmit="xmlhttpPost('http://localhost:8888/ayushman/cpathologistdashboard/view', 'formReportUploader', 'MyResult', '<img src=\'pleasewait.gif\'>');"  -->
	
   <div id="addreport" style="width:690px;overflow-y:auto;height:350px; "  >
    	<form id= "uplodmultiplereports" class="cmxform"  method="post" enctype="multipart/form-data" >
 
    	<table style="width:690px;" border="0" align="center" cellpadding="0" cellspacing="0" class="content_bg">
                <tr>
                  <td height="30">
                  	<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
                    	<tr>
                     	 <td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Investigation</td>
                    	</tr>
                  	</table>
                  </td>
                </tr>
                <tr>
                	<td height="30">
                		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
                    		<tr>
                      			<td align="center" class="bodytext_bold"><span class="bodytext_bold">Number of Tests</span></td>
                      			<td width="29%"><span class="bodytext_normal">
                       			<select name="testnumberselect" id="testnumberselect" size="1" style="width:100px;" class="textarea">
									  <!--<option>00</option>
									  <option>01</option>
									  <option>02</option>
									  <option>03</option>
									  <option>04</option>
									  <option>05</option>
									  <option>06</option>
									  <option>07</option>
									  <option>08</option>
									  <option>09</option>
									  <option>10</option>-->
								</select>
                     		 </span></td>
                      		<td width="15%">&nbsp;</td>
                      		<td width="35%">&nbsp;</td>
                    	</tr>
                  	</table></td>
                </tr>
                <tr>
                  <td height="40">
                  	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="uploadreport">
                  		<tr>
                  			<td>
                  				
							</td>
						</tr>
					</table>
                    </td>
                </tr>
                <tr><td><input id="reportpagesno" name="reportpagesno" type = "hidden"/><input id="selectedappid" name="selectedappid" type = "hidden"/></td></tr>
                <tr>
                  <td width="330" align="right"><table width="200" height="25" border="0" cellpadding="0" cellspacing="0">
						  <tr>
							<td width="78" align="center" valign="middle" class="button" onclick="addreportsave()">Save</td>
							<td width="13" align="center" valign="middle">&nbsp;</td>
							<td width="77" align="center" valign="middle" class="button" onclick="closepopup('addreport')">Cancel</td>
							<td width="32" align="center" valign="middle">&nbsp;</td>
						  </tr>
					  </table></td>
                </tr>
            </table>
        </form>
    </div>
 <div id="showdetailedreport" style="width:690px;overflow-y:auto;height:300px; "  >
 	<table width="100%">
		<tr>
			<td>
				<div id="detailedreport" ></div>
			</td>
		</tr>
	</table>
 </div>
</div>
