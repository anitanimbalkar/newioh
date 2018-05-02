
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>

<script type="text/javascript">
	$(function() {
		$( "#tabs" ).tabs();
		$(function() {
			$( "#deliverydate" ).datepicker({ yearRange: "-70:+1",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
			$( "#requestdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy', minDate: 0});
			// $( "#deliverydate" ).datetimepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,formatDate: 'dd M yy',formatTime:	'H:i',minDate: 0});
			// $( "#requestdate" ).datetimepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,formatDate: 'd M Y',formatTime:	'H:i',minDate: 0});
			// $( "#reqtime" ).timepicker({timeFormat: 'h:i A',minTime: '10:00am',maxTime: '10:00pm',showDuration: true});
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
		$('#editaction').dialog({
			autoOpen: false,
			position: [150, 150],
			show: "fade",
			hide: "fade",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false,
			width: 500,
			buttons: {
				"Save": function() {
					i=0;
					var requestdate = document.getElementById('requestdate').value;
					var patid = document.getElementById('patid').value;
					var orderid = document.getElementById('order_id').value;
					var editreason = document.getElementById('editreason').value;
					requestdate = requestdate.replace(" ","-");
    				requestdate = requestdate.replace(" ","-");
    				popupchildnodes = $('#testinfo').children();
					var testnumber = document.getElementById("testsnumber").value;

								array = new Array();
								for(i=0;i<testnumber;i++)
								{
									var testid = document.getElementById(i+"testid").value;
									var rate = document.getElementById(i+"rate").value;
									element = $(popupchildnodes[i]).children()[1];
									array[i] = new Array(2);
									array[i][0] = testid;			//testid
									array[i][1] = rate;    //orderid
								//alert(rate);

								}
								//console.log(JSON.stringify(array));
					$.ajax({
					  url: "/ayushman/cpathologistorder/editorder?test="+JSON.stringify(array)+"&date="+requestdate+"&orderid="+orderid+"&patid="+patid+"&editreason="+editreason,
					  success: function( data ) {
							 
							//window.location.reload();
							},
						error : function(){}
					});
					
					$(this).dialog("close");
				},
				"Cancel": function() {
							$('#pathologisttestslist').trigger( 'reloadGrid' );
							refreshgrid();
					$("#editaction").dialog("close");
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
						  url: "/ayushman/cpathologist/rejectorder?id="+document.getElementById("orderid").value+"&reason="+document.getElementById('rejectreason').value+"&patid="+document.getElementById('patid').value,
						  success: function( data ) {
								if(data != '')
									//alert(data);
								$('#pathologisttestslist').trigger( 'reloadGrid' );
								$('#ordersinprocesslist').trigger( 'reloadGrid' );
								$('#orderscompletedlist').trigger( 'reloadGrid' );
								$('#ordersrejectedlist').trigger( 'reloadGrid' );
								data =  JSON.parse(data);
								if(data['type'] == 'error')
									showMessage('550','200','Reject Order',data['message'],data['type'],'id');
								else
								{
									showNotification('300','50','Reject Order',data['data'],'notification','diaconfirmation',5000);
								}
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
	function openeditaction(cellvalue,patid)
	{
		document.getElementById("patid").value = patid;
		document.getElementById("order_id").value = cellvalue;
		window.location.href="/ayushman/cpathologistorder/edittestorder?orderid="+cellvalue;
		//$('#reqid').text(cellvalue);
		//$('#editaction').dialog('open');
		//$('#editaction').focus();
		//showtest(cellvalue,patid);
		//return false;
	}
	function showtest(orderid,patid)
	{
				jQuery('#testinfo').html('');

		$.ajax({
		  url: "/ayushman/cpathologistorder/gettestsdatausingorderid?orderid="+orderid+"&patid="+patid,
			success: function( data ) {
				var recommenedtests =  eval('('+data+')');
				var errmsg= "";	
				//alert(JSON.stringify(recommenedtests));
				for(var i = 0;i<recommenedtests.length;i++)
				{
					var testrate = recommenedtests[i]["rate"];
					var arraypathologistinfo= recommenedtests[i]["pathologistList"];	
					var testname= "'"+recommenedtests[i]["testname"]+"'";				
					var textinfomation = "<tr><td width='30%;' class='bodytext_bold' align='left' id='"+i+"testname"+recommenedtests[i]["id"]+"' >"+recommenedtests[i]["testname"]+"</td><td  width='5%'  class='bodytext_normal'>&nbsp;<lable id='"+i+"rates"+recommenedtests[i]["id"]+"' >"+testrate+"</lable> </td><td style='width:5%;height:25px;valign:top;'><td width='50%;'><img  id='"+i+"testname"+recommenedtests[i]["id"]+"' onclick='removetest("+i+","+recommenedtests[i]["id"]+")' src='/ayushman/assets/images/Remove_Icon.png' width='22' height='20' title='Remove'/></td></tr>";
					element = $("<table id='"+recommenedtests[i]["id"]+"'  style='margin-top:10px;margin-bottom:10px;width:500px;'  /><input type='hidden' id='"+i+"testid' name='"+i+"testid' /><input type='hidden' id='"+i+"rate' name='"+i+"rate' />");
					 element.appendTo('#testinfo');
					$(textinfomation).appendTo(element);
					document.getElementById(i+"testid").value = recommenedtests[i]["id"];
					document.getElementById(i+"rate").value = recommenedtests[i]["rate"];

				}	
				document.getElementById("testsnumber").value =recommenedtests.length;

			},
			error : function(){alert("something has gone wrong. Could not retrieve fees for the test. Please contact system administrator.");}
		  
			});
	}

	function removetest(rownumber,testid)
	{
		showMessage('250','50','Remove test','Do you really want to remove test '+testid+' ?','confirmation','confirmRemoveTest');
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
		var patid = document.getElementById("patid").value;
		var orderid = document.getElementById("order_id").value;
		var rownumber = $("#removetestrownumber").val();
		var testid=  $("#removetestid").val();
		$.ajax({
			url: "/ayushman/cpathologistorder/removetest?testid="+testid+"&patid="+patid+"&orderid="+orderid,
			success: function( data ) {
				//parent.getcontent('/ayushman/cpatientmedicinesorder/viewmycart');
					window.location.reload();
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
	}

	function removeorder(testid,patid)
	{
		showMessage('250','50','Remove test','Do you really want to remove order '+testid+' ?','confirmation','confirmRemoveOrder');
		$("#removetestid").val(testid);
		$("#patid").val(patid);
			
	}
	
	function Confirmation_Event(id,confirmation)
	{
		if(id == 'confirmRemoveTest'){
			if(confirmation == 'yes'){
				removeselectedtest();	
			}
		}
		if(id == 'confirmRemoveOrder'){
			if(confirmation == 'yes'){
				removeselectedorder();	
			}
		}
	}
	
	function removeselectedorder()
	{
		var orderid = document.getElementById("removetestid").value;
		var patid = document.getElementById("patid").value;
		alert(patid);
		$.ajax({
			url: "/ayushman/cpathologist/removeorder?orderid="+orderid+"&patid="+patid,
			success: function( data ) {
				window.location.reload();
			},
			error : function(){alert("something has gone wrong. Could not remove test. Please contact system administrator.");}
		});
	}
	
	function openrejectaction(cellvalue,patid)
	{
		document.getElementById("patid").value = patid;
		document.getElementById("orderid").value = cellvalue;
		$('#rejectaction').dialog('open');
		$('#rejectaction').focus();
		return false;
	}
	function actionformatter( cellvalue, options, rowObject )
	{
		$medname = $(rowObject).children()[5].firstChild.data;
		$patid = $(rowObject).children()[1].firstChild.data;
		$cashflag = $(rowObject).children()[11].firstChild.data;
		if($cashflag==0)
		   return '<a href="#" onclick="openacceptaction('+cellvalue+');"><font color="#0000FF">Accept</font></a> / <a href="#" onclick="openrejectaction('+cellvalue+','+$patid+');"><font color="#0000FF">Reject</font></a>';
		else
			return '<a href="#" onclick="openacceptaction('+cellvalue+');"><font color="#0000FF">Accept</font></a> / <a href="#" onclick="openrejectaction('+cellvalue+','+$patid+');"><font color="#0000FF">Reject</font></a> / <a href="#" onclick="openeditaction('+cellvalue+','+$patid+');"><font color="#0000FF">Edit</font></a>';

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
		if(cellvalue == 'edited')
			return "Order edited";
	
	}
	function paymentflag( cellvalue, options, rowObject )
	{
		if(cellvalue == 1)
		 return "To be collected";

		else
			return "Payment Done";

	
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
	function uploadbuttonformatter( cellvalue, options, rowObject )
	{
		$medname = $(rowObject).children()[5].firstChild.data;
		$patid = $(rowObject).children()[1].firstChild.data;
		$orderid = $(rowObject).children()[0].firstChild.data;
		$cashflag = $(rowObject).children()[12].firstChild.data;
		//return '<a style="margin-top:5px; cursor:pointer; "  onclick="openreport('+cellvalue+');" ><font color="#0000FF">Upload</font></a>/ <a href="#" onclick="openeditaction('+$orderid+','+$patid+');"><font color="#0000FF">Edit</font></a>/ <a href="#" onclick="removeorder('+$orderid+','+$patid+');"><font color="#0000FF">Cancel</font></a>';		
		if($cashflag == 1)
			return '<a style="margin-top:5px; cursor:pointer; "  onclick="openreport('+cellvalue+');" ><font color="#0000FF">Upload</font></a>/ <a href="#" onclick="openeditaction('+$orderid+','+$patid+');"><font color="#0000FF">Edit</font></a>/ <a href="#" onclick="openrejectaction('+cellvalue+','+$patid+');"><font color="#0000FF">Cancel</font></a>';				
		else
			return '<a style="margin-top:5px; cursor:pointer; "  onclick="openreport('+cellvalue+');" ><font color="#0000FF">Upload</font></a>/ <a href="#" onclick="openrejectaction('+cellvalue+','+$patid+');"><font color="#0000FF">Cancel</font></a>';				
	}

	function openreport(orderid)
	{
		window.scrollTo(0, 0);
		window.location = "/ayushman/cuploadpastvisit/orderreports?id="+orderid;
		
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
	function mergedate( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i<arr.length;i++)
		{
			string = string +arr[i]+"<br />";
		}
		return string;
	}
	function mergepatientname( cellvalue, options, rowObject )
	{
		arr = cellvalue.split('----');
		string = '';
		for(i=1;i<arr.length;i++)
		{
			string = string +arr[i]+"<br />";
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
	
		$(document).ready(function() {
		
	$('#patientsearchform').keypress(function(e) {
		if(e.which == 13) {
			searchForPatient();
		}
	});
	$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
	
	//$(".ui-dialog-titlebar").hide();
	var firstname = new LiveValidation('patName');
	firstname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );

	var lastname = new LiveValidation('patLastName');
	lastname.add( Validate.Format, { pattern: /^[a-zA-Z]+$/,failureMessage: "only characters allowed"} );

	var mobilenumber = new LiveValidation('patContact');
	mobilenumber.add( Validate.Numericality, {onlyInteger: true } );
	mobilenumber.add( Validate.Length, { is: 10 });
	mobilenumber.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );

	var email = new LiveValidation('patEmail');
	email.add( Validate.Email );

	var ID = new LiveValidation('patId');
	ID.add( Validate.Numericality, {onlyInteger: true } );
	ID.add( Validate.Format, { pattern: /^[0-9]+$/,failureMessage: "only numeric values allowed"} );
	
});

function searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB){
	$.ajax({
			url: "/ayushman/cpathologistorder/searchForPatientbypathologist/get?patName="+patName+"&patLastName="+patLastName+"&patContact="+patContact+"&patEmail="+patEmail+"&patId="+patId+"&dob="+patDOB,
			success: function(jsonSearchResults) {
				searchResults = eval("("+jsonSearchResults+")");
				if(searchResults.length == 0){
					$("<td class='bodytext_bold' colspan='2' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
				else{
					for(var i=0;i<searchResults.length;i++){
						var result = $("<tr id=result style='height:25;'"+i+"></tr>");
						//if((searchResults[i].photo == null) || (searchResults[i].photo == "")){
							var imgsrc = '/ayushman/assets/images/pic02.png';
						// }
						// else{
						// 	var imgsrc = searchResults[i].photo;
						// }
						$("<td width='3%' class='bodytext_normal' align='left' valign='top'><img src='"+imgsrc+"' width='90' height='90' </img></td>").appendTo(result);
						var info = $("<td width='97%' name='patInfo' class='bodytext_normal' align='left'></td>");
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Name: "+searchResults[i].name+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Contact: "+searchResults[i].contact+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >DOB: "+searchResults[i].dob+"</div>").appendTo(info);
						$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >IOH ID: "+searchResults[i].id+"</div>").appendTo(info);
						$(info).appendTo(result);
						$(result).appendTo($("#searchresult"));
						//$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right;margin:5px; text-decoration:none;" onclick="takeAppointment('+searchResults[i].id+');">Take appointment</button><button class="button" style="height:25px;margin:5px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="buildPatientNetwork('+searchResults[i].id+');">Preferred Chemist and Lab</button></td></tr>').appendTo($("#searchresult"));
						$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style=" width:80px;height:25px; line-height:23px; text-align:center;margin:5px; float:right; text-decoration:none;" onclick="openaddtest('+searchResults[i].id+');">Add Test</button>').appendTo($("#searchresult"));
					}
					$("#searchresult").show();
				}
				parent.setIframeHeight(document.getElementById('icontent'));
				$('#loading').dialog('close');
			},
			error : function(){
				$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
				$("#searchresult").show();
			}
		});
}

function buildPatientNetwork(patientuserid){
	parent.openDialog("/ayushman/cpatientprofile/buildnetwork?id="+patientuserid, '900px','1024px');
}
function openaddtest(patientuserid){
	//parent.openDialog("/ayushman/cpathologistorder/searchandorder?patid="+patientuserid,'700px','1000px');
	window.location.href="/ayushman/cpathologistorder/searchandorder?patid="+patientuserid;	
}

function openselecttest(){
	var patid=document.getElementById("patid").value;
	var orderid=document.getElementById("order_id").value;
		//alert(patid);
		//alert(orderid);
	parent.openDialog("/ayushman/cpathologistorder/selectsearchandorder?orderid="+orderid+"&patid="+patid,'700px','1000px');
}
function searchForPatient(){
	$("#searchresult").empty();
	var patName = $("#patName").val();
	var patLastName = $("#patLastName").val();
	var patContact = $("#patContact").val();
	var patEmail = $("#patEmail").val();
	var patId = $("#patId").val();
	var patDOB = '';
	if(patName == "" && patContact == "" && patEmail == "" && patId == "" && patLastName == ""){
		$("<td class='bodytext_bold' colspan='2' align='middle'>Please Fill One or More of above fields.</td>").appendTo($("#searchresult"));
		$("#searchresult").show();
	}
	else{
		$('#loading').dialog('open');
		searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB);
	}
}

function convertdateformat(dt)
{
	var d = new Date(dt);
   	var da = d.getDate();                       //day
    var mon = d.getMonth() + 1;                 //month
   	var yr = d.getFullYear();
    months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var monName = months[d.getMonth()];         //month Name
    var thisDay = da + " " + monName + " " + yr;    //full date show
                   //year
                   //alert(thisDay);
    reqdate=thisDay;
	$('#requestdate').text(reqdate);


}

	function showcalender()
	   {
	   	$( "#requestdate" ).datepicker({ yearRange: "-70:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy ',minDate:0});
	   }


	function onclickaddtest()
	{
			var testnumber = document.getElementById("testid").value;
			//var appid= document.getElementById("appid").value;
			$.ajax({
					url: "/ayushman/cpatientrequistiontests/addtest?&testid="+testnumber,
					success: function( data ) {
							
					},
				error : function(){alert("something has gone wrong.Please contact system administrator.");}
				});
			
	}
	
	
</script>
<div id="contentdiv" style="width:831px;overflow-y:auto;">
	<div id="tabs" style="float:left;vertical-align:top;height:auto;width:825px;position:relative;overflow-y:auto;background:transparent;border:none;">
		<ul class="tabholder" style="background-color:none;background:none;border:none;">		
			<li class="TopBtn_bg"><a href="#tabs-1" >Requisition</a></li>
			<li class="TopBtn_bg"><a href="#tabs-2">Orders in process</a></li>
			<li class="TopBtn_bg"><a href="#tabs-3">Orders completed</a></li>
			<li class="TopBtn_bg"><a href="#tabs-4">Orders rejected</a></li>	
			<li class="TopBtn_bg"><a href="#tabs-5">Orders edited</a></li>	
			<li class="TopBtn_bg"><a href="#tabs-6">New Order Request</a></li>	

		</ul>
		<div id="tabs-1" style="height:auto;padding-left:2px;padding-top:2px;">	
				<table border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td style="width:818px;">
							<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
								<tr>
									<td >
										<?php
										//this is emr grid for patient we can put this in other page
										$pathologistjqgridrequest= Request::factory('xjqgridcomponent/index');
										$data ='[pid:'.$pathologistid.'][status:"requested"]';
										$pathologistjqgridrequest->post('usetemplate','true');
										$pathologistjqgridrequest->post('data',$data);
										$pathologistjqgridrequest->post('tablename','pathologisttestReqRej');
										$pathologistjqgridrequest->post('name','pathologisttests');
										$pathologistjqgridrequest->post('height','auto');
										$pathologistjqgridrequest->post('width','805');
										$pathologistjqgridrequest->post('sortname','requisitionno');
										$pathologistjqgridrequest->post('sortorder','asort');
										$pathologistjqgridrequest->post('tablename','pathologisttestReqRej');//used for jqgrid
										$pathologistjqgridrequest->post('columnnames', 'requisitionno,patientid,alldates,date,names,DoctorName,tests,ordervalue,requisitionno,patientuserid,patientmobilenumber,cashflag');//used for jqgrid
										$pathologistjqgridrequest->post('whereclause',"[pathologistid,=,$pathologistid][status,=,requested]");//used for jqgrid
										$columninfo = 	'[
															{"name":"Req.No.","index":"requisitionno","width":5},
															{"name":"Id","index":"patientid","hidden":true,"width":5},
															{"name":"Date","index":"alldates","width":12,"editable":false,"formatter":mergedate},															
															{"name":"Date","index":"date","hidden":true,"width":10,"editable":false},															
															{"name":"Name","index":"names","width":10,"formatter":mergepatientname,"title":false},
															{"name":"Ref. By","index":"DoctorName","hidden":true,"width":10,"editable":false},
															{"name":"Tests","index":"tests","width":15,"formatter":testsformatter},
															{"name":"Amount (Rs.)","index":"ordervalue","width":8},															
															{"name":"Action","index":"accept","width":10,"align":"center","editable":true,"formatter":actionformatter,"align":"left"},
															{"name":"patientuserid","index":"patientuserid","hidden":true},
															{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true},
															{"name":"Payment Status","width":12,"index":"cashflag","hidden":false,"formatter":paymentflag}															
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
					<td style="width:818px;">
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersinprocess= Request::factory('xjqgridcomponent/index');
									$data ='[pid:'.$pathologistid.'][status:"accepted"]';
									$ordersinprocess->post('usetemplate','true');
									$ordersinprocess->post('data',$data);
									$ordersinprocess->post('tablename','pathologisttestInprocEdit');
									$ordersinprocess->post('name','ordersinprocess');
									$ordersinprocess->post('height','250');
									$ordersinprocess->post('width','805');
									$ordersinprocess->post('sortname','requisitionno');
									$ordersinprocess->post('sortorder','desc');
									$ordersinprocess->post('columnnames', 'requisitionno,patientid,alldates,names,DoctorName,tests,ordervalue,deliverydate,status,requisitionno,patientuserid,patientmobilenumber,cashflag');//used for jqgrid
									$ordersinprocess->post('whereclause',"[pathologistid,=,$pathologistid][status,=,accepted][status,=,edited]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Req.No.","index":"requisitionno","width":6},
														{"name":"Id","index":"patientid","hidden":true,"width":9},
														{"name":"Date","index":"alldates","width":12,"editable":false,"formatter":mergedate},														
														{"name":"Name","index":"names","width":9,"formatter":mergepatientname,"title":false},													
														{"name":"Ref. By","index":"DoctorName","hidden":true,"width":9,"editable":false},
														{"name":"Test","index":"tests","width":15,"editable":false,"formatter":testsformatter},
														{"name":"Amount (Rs.)","index":"ordervalue","width":9},
														{"name":"Delivery date","index":"accept","width":9,"hidden":true,"align":"center","editable":true},														
														{"name":"Status","index":"status","width":9,"align":"center","editable":true,"hidden":true},
														{"name":"Action","index":"upload","width":12,"align":"center","editable":true,"formatter":uploadbuttonformatter,"align":"left"},
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true},
														{"name":"Payment Status","width":12,"index":"cashflag","hidden":false,"formatter":paymentflag}															
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
									$orderscompleted->post('tablename','pathologisttestComp');
									$orderscompleted->post('name','orderscompleted');
									$orderscompleted->post('height','250');
									$orderscompleted->post('width','805');
									$orderscompleted->post('sortname','requisitionno');
									$orderscompleted->post('sortorder','desc');
									$orderscompleted->post('columnnames', 'requisitionno,patientid,alldates,names,DoctorName,ordervalue,deliverydate,status,requisitionno,patientuserid,patientmobilenumber');//used for jqgrid
									$orderscompleted->post('whereclause',"[pathologistid,=,$pathologistid][status,=,reportsuploaded](or)[status,=,reportscollected][pathologistid,=,$pathologistid]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Req.No.","index":"requisitionno","width":40},
														{"name":"Id","index":"patientid","hidden":true,"width":20},
														{"name":"Date","index":"alldates","width":100,"editable":false,"formatter":mergedate},														
														{"name":"Name","index":"names","width":95,"formatter":mergepatientname,"title":false},														
														{"name":"Ref. By","index":"DoctorName","hidden":true,"width":50,"editable":false},
														{"name":"Amount(Rs.)","index":"ordervalue","width":70},														
														{"name":"Delivery date","index":"accept","hidden":true,"width":100,"align":"center","editable":true},
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
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersrejected= Request::factory('xjqgridcomponent/index');
									$data ='[pid:'.$pathologistid.'][status:"rejected"]';
									$ordersrejected->post('usetemplate','true');
									$ordersrejected->post('data',$data);
									$ordersrejected->post('tablename','pathologisttestReqRej');
									$ordersrejected->post('name','ordersrejected');
									$ordersrejected->post('height','250');
									$ordersrejected->post('width','805');
									$ordersrejected->post('sortname','requisitionno');
									$ordersrejected->post('sortorder','desc');
									$ordersrejected->post('columnnames', 'requisitionno,patientid,alldates,names,ordervalue,status,rejectreason,patientuserid,patientmobilenumber');//used for jqgrid
									$ordersrejected->post('whereclause',"[pathologistid,=,$pathologistid][status,=,rejected]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Order.No.","index":"requisitionno","width":50},
														{"name":"Id","index":"patientid","hidden":true,"width":20},
														{"name":"Date","index":"alldates","width":100,"editable":false,"formatter":mergedate},														
														{"name":"Name","index":"names","width":95,"formatter":mergepatientname,"title":false},														
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

	<div id="tabs-5" style="height:auto;padding-left:2px;padding-top:2px;" >	
			<table border="0" align="left" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:818px;">
						<table width="100%" height="100%"  cellpadding="0" cellspacing="0"  >
							<tr>
								<td >
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersedited= Request::factory('xjqgridcomponent/index');
									$data ='[pid:'.$pathologistid.'][status:"edited"]';
									$ordersedited->post('usetemplate','true');
									$ordersedited->post('data',$data);
									$ordersedited->post('tablename','pathologisttestInprocEdit');
									$ordersedited->post('name','ordersedited');
									$ordersedited->post('height','250');
									$ordersedited->post('width','805');
									$ordersedited->post('sortname','requisitionno');
									$ordersedited->post('sortorder','desc');
									$ordersedited->post('columnnames', 'requisitionno,patientid,alldates,names,DoctorName,tests,ordervalue,deliverydate,status,requisitionno,patientuserid,patientmobilenumber,cashflag,editreason');//used for jqgrid
									$ordersedited->post('whereclause',"[pathologistid,=,$pathologistid]");//used for jqgrid
									$columninfo = 	'[
														{"name":"Req.No.","index":"requisitionno","width":6},
														{"name":"Id","index":"patientid","hidden":true,"width":9},
														{"name":"Date","index":"alldates","width":12,"editable":false,"formatter":mergedate},														
														{"name":"Name","index":"names","width":9,"formatter":mergepatientname,"title":false},													
														{"name":"Ref. By","index":"DoctorName","hidden":true,"width":9,"editable":false},
														{"name":"Test","index":"tests","width":15,"editable":false,"formatter":testsformatter},
														{"name":"Amount (Rs.)","index":"ordervalue","width":9},
														{"name":"Delivery date","index":"accept","width":9,"hidden":true,"align":"center","editable":true},														
														{"name":"Status","index":"status","width":9,"align":"center","editable":true,"hidden":true},
														{"name":"Action","index":"upload","width":10,"align":"center","editable":true,"formatter":uploadbuttonformatter,"align":"left"},
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														{"name":"patientmobilenumber","index":"patientmobilenumber","hidden":true},
														{"name":"Payment Status","width":12,"index":"cashflag","hidden":true,"formatter":paymentflag},														
														{"name":"Reason","width":14,"index":"editreason","hidden":false}															
													]';
									$ordersedited->post('columninfo', $columninfo);
									$ordersedited->post('editbtnenable','false');
									$ordersedited->post('deletebtnenable','false');
									$ordersedited->post('savebtnenable','false');
									echo $ordersedited->execute(); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		
		<div id="tabs-6" style="height:auto;padding-left:2px;padding-top:2px;" >
			<div id="registedUser"  >
			<table id="patientsearchform" class = "table_roundBorder" style="width:98%;margin-top:5px;margin-left:10px">
				<tr>
					<td height="30" colspan="4" align="left" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;padding-left:1px;" class="bodytext_bold" >Search for patient</td>
				</tr>
				<tr>
					<td width="10%" valign="middle"><label class = "bodytext_bold">IOH ID :</label></td>
					<td width="38%" ><input <input id = "patId" autocomplete="on" autofocus="autofocus" class = "textarea" /></td>
				</tr>
				<tr>
					<td valign="middle"><label class = "bodytext_bold">First Name :</label></td>
					<td><input id = "patName" autocomplete="on" class = "textarea" /></td>
					<td valign="middle"><label class = "bodytext_bold">Last Name :</label></td>
					<td><input id = "patLastName" autocomplete="on" class = "textarea" /></td>
				</tr>
				<tr>
					<td valign="middle"><label class = "bodytext_bold">Email :</label></td>
					<td ><input <input id = "patEmail" autocomplete="on" class = "textarea" /></td>
					<td width="11%" valign="middle"><label class = "bodytext_bold">Contact No :</label></td>
					<td width="41%"><input id = "patContact" autocomplete="on" class = "textarea" /></td>
				</tr>
				<tr>
					<td height="30" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;">
					<button class="button" id = "searchButton" style="width:80px; height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="searchForPatient();">Search</button></td>
				</tr>
			</table>
		</div>
		<div style="overflow:auto;margin-top:5px;">
			<table id = "searchresult" class = "table_roundBorder" style="align:middle;width:98%;margin-top:5px;margin-left:10px;">
			</table>
		</div>
	</div>

	<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
		<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
	</div>

	</div>
</div>

	<div id="acceptaction" title="Accepted Date">
		<form id="acceptactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;"></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<label  style="font-size:9pt;height:15pt;">Date :</label><input id="deliverydate" readonly="readonly" style="margin-left:5px;width:200px;height:15pt;border:none;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;"/>
					</td>
				</tr>
			</table>
		</form>
		<input id="orderid" type = "hidden"/>
	</div>
	<div id="rejectaction" title="Reject reason">
<!-- 		<form id="rejectactionform">
 -->			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:100%;"></td>
				</tr>
				<tr>
					<td style="width:50%;height:50px;valign:top;">
						<textarea id="rejectreason" name="rejectreason" style="font-size:9pt;background-color:white;width:95%;height:100px;" ></textarea>
					</td>
				</tr>
			</table>
<!-- 		</form>
 -->		<input id="orderid" type = "hidden"/>
	</div>
	<!-- Edit Action -->
	<div id="editaction" title="Edit Order">
		<form id="editactionform">
			<table border="0" align="left" cellpadding="0" cellspacing="0" style="width:100%;">
				<tr>
					<td style="width:5%;height:25px;valign:top;">
						<label class="bodytext_bold">Order No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
						<label id="reqid"></label></td>
					<td style="width:5%;height:25px;valign:top;">
						<label  style="font-size:9pt;height:15pt;" class="bodytext_bold">Order Schld <br>date & time :</label>
						<input id="requestdate" name="requestdate" onclick="showcalender();" readonly="readonly" value="" style="margin-left:5px;width:100px;height:15pt;border:none;border-bottom:0.5px solid;font-size:9pt;line-height:14pt;"/>
					</td>
				</tr>
			<!-- </tr >
					<td style="width:100%;height:25px;valign:top;">
					 -->	<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr id="testinfo" >
						
						</tr>
						<tr>
					<td style="width:50%;height:50px;valign:top;">
						<textarea id="editreason" name="editreason" placeholder="Write Edit Reason here" style="font-size:9pt;background-color:white;width:95%;height:100px;" ></textarea>
					</td>
				</tr>
					</table>
					<input type='hidden' id='testsnumber' name='testsnumber' />

					<input id="AddtoCartbutton" type="button" class="button" value="Add "  onclick="openselecttest()" readonly="readonly"   style="margin-left:60%;outline:none;width:25%;height:25px" /></td>

				<!-- </td>
			</tr>
			</table> -->
			<input id="order_id" type = "hidden"/>
		</form>
	</div>
	
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
 	<input type='hidden' id='removetestrownumber' name='removetestrownumber' />
  	<input type='hidden' id='removetestid' name='removetestid' />
  	<input type='hidden' id='patid' name='patid' />

