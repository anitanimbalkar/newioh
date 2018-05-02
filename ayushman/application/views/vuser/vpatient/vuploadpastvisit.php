 <link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/jquery.metadata.js" type="text/javascript"></script>
<script src="/ayushman/assets/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.style11 {background-image: -ms-linear-gradient(bottom, white 0%, #faf6f6 100%);
	background-image: -o-linear-gradient(bottom, white 0%, #faf6f6 100%);
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, white), color-stop(1, white));
	background-image: -webkit-linear-gradient(bottom, white, #faf6f6 100%);
	background-image: linear-gradient(bottom, white, #faf6f6 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#faf6f6', endColorstr='white',GradientType=1); 	height:30px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:9pt;
line-height; 	color:#11587e;
	line-height:10px;
	text-align:left;
	padding-left:0px;
	font-weight: bold;
}

.style12 {background-image: -ms-linear-gradient(bottom, #eaeaea 0%, #faf6f6 100%);
	background-image: -o-linear-gradient(bottom, #eaeaea 0%, #faf6f6 100%);
	background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0, #eaeaea), color-stop(1, #faf6f6));
	background-image: -webkit-linear-gradient(bottom, #eaeaea 0%, #faf6f6 100%);
	background-image: linear-gradient(bottom, #eaeaea 0%, #faf6f6 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#faf6f6', endColorstr='#eaeaea',GradientType=1); 	height:30px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:9pt;
line-height; 	color:#11587e;
	line-height:10px;
	text-align:left;
	padding-left:0px;
	font-weight: bold;
}
div.container {
	background-color: #eee;
	border: 1px solid red;
	margin: 5px;
	padding: 5px;
}
div.container ol li {
	list-style-type: disc;
	margin-left: 20px;
}
div.container { display: none }
.container label.error {
	display: inline;
}
form.cmxform label.error, label.error {
    color: red;
    font-style: italic;
}
form.cmxform { width:100%; }
form.cmxform label.error {
	display: block;
	margin-left: 1em;
	width: auto;
}
    .watermarkOn {
        color: #CCCCCC;
        font-style: italic;
    }

</style>
<script type="text/javascript">
	$(function() {
		$( "#incidentdate" ).datepicker({ yearRange: "-80:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd-M-yy' });
	});
	$(document).ready(function() {
		$("#drname").focus(function() { if(document.getElementById("errdrname") != undefined) {$("#errdrname").text(""); } } );
		$("#drcity").focus(function() { if(document.getElementById("errdrcity") != undefined) {$("#errdrcity").text(""); } } );
		document.getElementById("prescriptionpagesno").value=0;
		document.getElementById("reportpagesno").value=0;
		document.getElementById("appid").value="";
		document.getElementById("chknewincident").checked= false;
		$("#incidenttxt").hide();
		$("#chknewincident" ).click(function() {
			if ($('#chknewincident').attr('checked')) {
				$("#incidentcombo").hide(); 
				$("#incidenttxt").show(); 
			}
			else
			{
				$("#incidenttxt").hide();
				$("#incidentcombo").show(); 
			}
		});
		$("#archivevisit").validate({
		
			errorLabelContainer: "#errorMessageBox",
			 wrapper: "li",
			rules: {
					mobno: {
						required:true,					
						maxlength:10,
						number:true	
					},
					pincode: {
						required:true,					
						maxlength:6,
						number:true	
					}
				},
			submitHandler: function() { 
				
				savedetails()
			}
		});
		$('#addnew').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		 jQuery("#addnew").dialog('option', 'position', [50,50]);
		$('#addprescription').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#addprescription").dialog('option', 'position', [50,50]);
		$('#addreport').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "730px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#addreport").dialog('option', 'position', [50,50]);
		$('#conformdeleteprescription').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#conformdeleteprescription").dialog('option', 'position', [50,50]);
		$('#conformdeletereport').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#conformdeletereport").dialog('option', 'position', [50,50]);
		$('#conformdeletevisit').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			width: "auto",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});
		jQuery("#conformdeletevisit").dialog('option', 'position', [50,50]);
		$(".ui-dialog-titlebar").hide();
		$('#drname').focus(function(){
				document.getElementById("drcity").readOnly = false;
				document.getElementById("drlocality").readOnly = false;
				document.getElementById("drrsgnumber").readOnly = false;
		});
		var urldrrsgnumber="/ayushman/cautocompletedata/retrievemiddle?query=select id, RMPnumber_c as value from doctornames where RMPnumber_c";
		var urldrcity="/ayushman/cuploadpastvisit/autocomplete?column=city_c&table=citymasters";
		$("#drrsgnumber").autocomplete({source: urldrrsgnumber});
		$("#drname").autocomplete({source:"/ayushman/cautocompletedata/retrievemiddle?query=select id,drname as value,city_c,location_c,RMPnumber_c from doctornames where drname",
			select: function(event, ui)
			{
			    if(ui.item.city_c == '') ui.item.city_c ='No Information provided';
			    if(ui.item.location_c == '') ui.item.location_c ='No Information provided';
				document.getElementById("drid").value=ui.item.id;
				document.getElementById("drcity").value=ui.item.city_c;
				document.getElementById("drlocality").value=ui.item.location_c;
				document.getElementById("drrsgnumber").value=ui.item.RMPnumber_c;
				document.getElementById("drcity").readOnly = true;
				document.getElementById("drlocality").readOnly = true;
				document.getElementById("drrsgnumber").readOnly = true;
			},
		});
		$("#drcity").autocomplete({source: urldrcity});
	});
	function checkcity(thefield)
	{
		var urllocatily="/ayushman/cuploadpastvisit/autocomplete?column=location_c&table=address&city="+document.getElementById("drcity").value;
		var locality = document.getElementById("drlocality"); 	
		if(document.getElementById("drcity").value)
		{
			$("#drlocality").autocomplete({source: urllocatily});
		} 
		else 
		{
			alert("select city First");
		}
	}
	function newrow()
	{
		document.getElementById("appid").value="";
		document.getElementById("incidentdate").value= "";
		document.getElementById("drname").value= "";
		document.getElementById("drcity").value= "";
		document.getElementById("drlocality").value="";
		document.getElementById("drrsgnumber").value= "";
		document.getElementById("drid").value="";
		document.getElementById("appid").value="";
		document.getElementById("chknewincident").checked= false;
		document.getElementById("incidenttxt").value="";
		$("#savelbl").text="";
		if (!($('#chknewincident').attr('checked'))) {
				$("#incidenttxt").hide();
				$("#incidentcombo").show(); 
		}
		$('#addnew').dialog('open');
	}
	function closepopup(thisclose)
	{
		$("#"+thisclose).dialog("close");
	}
	function typeformatter(cellvalue, options, rowObject )
	{
		if(cellvalue== "first time")
			return 'First Visit';
		if(cellvalue== "follow up")
		{
			return 'Follow up Visit';
		}
	}
	function editrowformatter(cellvalue, options, rowObject )
	{
		var appid=$(rowObject).children()[2].firstChild.data;
		return '<a href="#" onclick="editrow('+cellvalue+');"><font color="#0763A2">Edit/</font></a><a href="#" onclick="deletevisit('+appid+');"><font color="#0763A2">Delete</font></a>';
	}
	function deletevisit(appid)
	{
		$.ajax({  
			type: "POST", 
			url: "/ayushman/cuploadpastvisit/appointmnetdetalis?appid="+appid,  
			success: function(data) {
				var appointmnetdetalis= eval('('+data+')');
				$("#deletevisitlbl").text("Do you really want to delete visit for incident name "+appointmnetdetalis["incidentsname_c"]+" on visit Date "+appointmnetdetalis["DateAndTime"]+" with "+appointmnetdetalis["drname"]+" ?");
			}
			});
		document.getElementById("deletevisitappid").value=appid;
		$('#conformdeletevisit').dialog("open");
	}	
	function viewprescription(appid)
	{
		window.open("/ayushman/cdisplayprescriptions/view?appid="+appid,"poop", "height=600,width=1024,modal=yes,alwaysRaised=yes,scrollbars=yes,menubar=no");
	}
	function prescriptionformatter(cellvalue, options, rowObject )
	{
		var appid=$(rowObject).children()[2].firstChild.data;
		if((cellvalue == undefined )|| (cellvalue== "" ))
		return '<a href="#" onclick="openprescription('+appid+');"><font color="#0763A2">Upload</font></a>';
		if(cellvalue!="undefined")
		return '<a href="#" onclick="viewprescription('+appid+')"><font color="#0763A2">View/</font></a><a href="#" onclick="deleteprescription('+appid+');"><font color="#0763A2">Delete</font></a>';
	}
	function deleteprescription(appid)
	{ 	
		$.ajax({  
			type: "POST", 
			url: "/ayushman/cuploadpastvisit/appointmnetdetalis?appid="+appid,  
			success: function(data) {
				var appointmnetdetalis= eval('('+data+')');
				$("#deleteprescriptionlbl").text("Do you really want to delete prescription for incident name "+appointmnetdetalis["incidentsname_c"]+" on visit Date "+appointmnetdetalis["DateAndTime"]+" with "+appointmnetdetalis["drname"]+" ?");
				
			}
			});
		document.getElementById("deleteprescriptionappid").value=appid;
		$('#conformdeleteprescription').dialog("open");
	}
	function deletereport(appid)
	{ 	
		$.ajax({  
			type: "POST", 
			url: "/ayushman/cuploadpastvisit/appointmnetdetalis?appid="+appid,  
			success: function(data) {
				var appointmnetdetalis= eval('('+data+')');
				$("#deletereportlbl").text("Do you really want to delete report for incident name "+appointmnetdetalis["incidentsname_c"]+" on visit Date "+appointmnetdetalis["DateAndTime"]+" with "+appointmnetdetalis["drname"]+" ?");
			}
			});
		document.getElementById("deletereportappid").value=appid;
		$('#conformdeletereport').dialog("open");
	}
	function conformdeletevisit()
	{
		var appid=document.getElementById("deletevisitappid").value;
		$.ajax({
			  url: "/ayushman/cuploadpastvisit/removevisitinfo?appid="+appid,
			  success: function( data ) {
			
					if(data != '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
					$('#conformdeletevisit').dialog("close");
					$('#archivevisitslist').trigger( 'reloadGrid' );		
				},
				error : function(){}
		  });	
	}
	function conformdeleteprescription()
	{      
		var appid=document.getElementById("deleteprescriptionappid").value;
			$.ajax({
			  url: "/ayushman/cuploadpastvisit/removeprescriptioninfo?appid="+appid,
			  success: function( data ) {
					
					if(data != '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
					$('#conformdeleteprescription').dialog("close");
					$('#archivevisitslist').trigger( 'reloadGrid' );		
				},
				error : function(){}
		  });	
	}
	function conformdeletereport()
	{      
		var appid=document.getElementById("deletereportappid").value;
			$.ajax({
			  url: "/ayushman/cuploadpastvisit/removereportinfo?appid="+appid,
			  success: function( data ) {
					if(data != '')
						alert("Could not find specified file. File is deleted from specified location or moved to another location. Please contact system administrator.");
					else
					$('#conformdeletereport').dialog("close");
					$('#archivevisitslist').trigger( 'reloadGrid' );		
				},
				error : function(){}
		  });	
	}
	function reportformatter(cellvalue, options, rowObject )
	{	
		var appid=$(rowObject).children()[2].firstChild.data;
		if((cellvalue == undefined )|| (cellvalue== "" ))
		return '<a href="#" onclick="openreport('+appid+');"><font color="#0763A2">Upload</font></a>';
		if(cellvalue!="undefined")
		return '<a href="/ayushman/cuploadpastvisit/showreport?appid='+appid+'"><font color="#0763A2">View/</font></a><a href="#" onclick="deletereport('+appid+');"><font color="#0763A2">Delete</font></a>';
	}
	function openreport(appointmentid)
	{
		document.getElementById("selectedappid").value=appointmentid;
		$('#addreport').dialog("open");
		$("#testnumberselect").val("00");
		showreportvalue("00");
	}
	function openprescription(appid)
	{
		document.getElementById("prescriptionappid").value=appid;
		var prescriptionpage = document.getElementById("selectprescriptionpage");
		itemToSelect = "00";
		for (iLoop = 0; iLoop< prescriptionpage.options.length; iLoop++)
		{ 
		  if (prescriptionpage.options[iLoop].value == itemToSelect)
		  {
			prescriptionpage.options[iLoop].selected = true;
			break;
		  }
		}
		showprescriptionvalue("00");
		$('#addprescription').dialog("open");
	}
	function editrow(appointmentid)
	{
		$.ajax({  
			type: "POST", 
			url: "/ayushman/cuploadpastvisit/appointmnetdetalis?appid="+appointmentid,  
			success: function(data) {
				var appointmnetdetalis= eval('('+data+')');
				var type=appointmnetdetalis["type"];
				if(type=="first time")
				{
					document.getElementById("chknewincident").checked= true;
					$("#incidentcombo").hide(); 
					$("#incidenttxt").show(); 
					document.getElementById("incidenttxt").value= appointmnetdetalis["incidentsname_c"];
				}
				else
				{
					document.getElementById("chknewincident").checked= false;
					$("#incidentcombo").show(); 
					$("#incidenttxt").hide(); 
				}
				document.getElementById("incidentdate").value= appointmnetdetalis["DateAndTime"];
				document.getElementById("drname").value= appointmnetdetalis["drname"];
				document.getElementById("drcity").value= appointmnetdetalis["drcity"];
				document.getElementById("drlocality").value= appointmnetdetalis["drlocation"];
				document.getElementById("drrsgnumber").value= appointmnetdetalis["drRMPnumber"];
				document.getElementById("drid").value=appointmnetdetalis["doctorid"];
				document.getElementById("appid").value=appointmentid;
				$("#savelbl").text="";
			}
			});
		$('#addnew').dialog('open');
	}
	function addnewsave()
	{
		if(document.getElementById("appid").value !="")
		{
			document.forms["archivevisit"].action="/ayushman/cuploadpastvisit/savevisit?appid="+document.getElementById("appid").value;
		}
		else
		{
			document.forms["archivevisit"].action="/ayushman/cuploadpastvisit/savevisit";
		}
		var error="";
		if(document.getElementById("incidentdate").value == "" || document.getElementById("drname").value=="" || document.getElementById("drcity").value==""  )
		{
			if(document.getElementById("incidentdate").value == "")
			error=error+"<br/><lable id='errdate'>&bull;Please enter Visit Date.</lable>";
			if(document.getElementById("drname").value=="")
			error=error+"<br/><lable id='errdrname' name='errdrname' >&bull;Please enter  Doctor name.</lable>";
			if(document.getElementById("drcity").value=="")
			error=error+"<br/>&bull;Please enter  Doctor city.";
			$("#savelbl").text = " "+error+"";
		}
		else if(error == "")
		{
		
			$('#addnew').dialog("close");
			var data=" &"+$("#archivevisit").serialize();
			
			$.ajax({  
				type: "POST", 
				url: "/ayushman/cuploadpastvisit/savevisit?data="+data,  
				success: function(data) { 
					$('#archivevisitslist').trigger( 'reloadGrid' );		
				}
				});
		}
	}
	function prescriptionsave()
	{	
		var appid=document.getElementById("prescriptionappid").value;
		var value=document.getElementById("prescriptionpagesno").value;
		var element12 = document.getElementById('file0');
		var i;
		var errormsg="";
        if (typeof(element12) != 'undefined' && element12 != null)
        {
            var allow = new Array('gif','png','jpg','jpeg','bmp','pdf');
            for(i=0; i < value; i++)
            {
            	if($('#file'+i).size() > 0)
                {
					var ext = $('#file'+i).val().split('.').pop().toLowerCase();
					if($('#file'+i).val() != 'undefined' && ext != '')
					{
						if(jQuery.inArray(ext, allow) == -1) //search in allow array, ext is present or not.
						{
							alert("Error : In Prescription file type '." + ext + "' is not supported.");
							return false;
						}
					}
                }
            }
        }
			document.forms["archiveprescription"].action="/ayushman/cpastvisitfilesaver/saveprescription?appid="+appid;
			$("#archiveprescription").submit();
	}
	function addreportsave()
	{	
		var i;var error=0;
		var numberoftest=$("#testnumberselect").val();
		for(i=0;i<numberoftest;i++)
		{ 	
			if(error== 0)
			{
				var reportpages=$("#selectreport"+i+"pages").val();	
				if($("#selecttype"+i+"pages").val() == 'Pdf'){
					var allow = new Array('pdf');var j=0;
				}
				else{
					var allow = new Array('gif','png','jpg','jpeg','bmp');var j=0;
				}
				if(reportpages == 00)
				{
					alert('Please select reports to upload in images or in pdf format.');
					return false;
				}
				
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
			document.getElementById('selectreport0pages').disabled = false;
			document.forms["archivereport"].action="/ayushman/cpastvisitfilesaver/savereport";
			$("#archivereport").submit();
			
		}
		else{
		 return false;
		}
	}
	function showreportvalue(val)
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
			$("#uploadreport > tbody").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="reportuploaderchild'+i+'"><tr><td width="3%">&nbsp;</td><td width="17%"><input name="testname'+i+'"  id="testname'+i+'" type="text" class="textareapopup" size="13"/></td><td width="1%">&nbsp;</td><td width="17%"><input name="testdate'+i+'" id="testdate'+i+'" type="text" class="textareapopup" size="13"/></td><td width="1%">&nbsp;</td><td width="17%"><input name="labname'+i+'" id="labname'+i+'" type="text" class="textareapopup" size="13"/></td><td width="1%">&nbsp;</td><td width="28%"><input name="referenceno'+i+'"  id="referenceno'+i+'"type="text" class="textareapopup" size="24"/></td><td width="1%"><select name="selecttype'+i+'pages" id="selecttype'+i+'pages" onchange="settype(this.value,'+i+');" size="1" style="width:70px;"><option>Images</option><option>Pdf</option></select> </td><td width="14%"><span class="style23"><select name="selectreport'+i+'pages" id="selectreport'+i+'pages" onchange="showreportpages(this.value,'+i+');" size="1" style="width:70px;"><option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option> <option>06</option>  <option>07</option><option>08</option><option>09</option><option>10</option></select> </span></td></tr><tr><td width="3%">&nbsp;</td><td width="17%" align="left" valign="top"><span class="bodytext_normal" style="padding-left:2px;">Test Name</span></td><td width="1%">&nbsp;</td><td width="17%" align="left" valign="top" ><span class="bodytext_normal"  style="padding-left:2px;">Date of Test </span></td> <td width="1%">&nbsp;</td><td width="17%" align="left" valign="top"><span class="bodytext_normal"  style="padding-left:2px;">Lab Name</span></td><td width="1%">&nbsp;</td><td width="28%" align="left" valign="top"><span class="bodytext_normal"  style="padding-left:2px;">Reference Number Observed</span></td><td width="1%">&nbsp;</td><td width="14%" align="left" valign="top"><span class="bodytext_normal"  style="padding-left:2px;">No of Pages</span></td>  </tr><tr><td><input id="test'+i+'pages" name="test'+i+'pages" type = "hidden"/></td></tr><tr><td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0" id="filetablefortest'+i+'"><tr><td>            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="filefortest'+i+'"><tr>          </td></tr></table></td></tr></table>');
			$("#testname"+i).autocomplete({source: "/ayushman/cautocompletedata/retrieve?query=select id, testname_c as value from testmasters where testname_c "});
			$( "#testdate"+i ).datepicker({ yearRange: "-80:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy',maxDate: 0  });
			$("#labname"+i).autocomplete({source: "/ayushman/cautocompletedata/retrieve?query=SELECT pathologists.id as pathologistid ,nameofcenter_c as value FROM pathologists WHERE nameofcenter_c"});
			document.getElementById("test"+i+"pages").value=0;
		}
    
    	document.getElementById("reportpagesno").value= val;
	}
	function settype(val,testnumber)
	{
		if(val == 'Pdf'){	
			for(i=0;i<=document.getElementById("test0pages").value;i++)
			{	
				var div = document.getElementById("filefortest0");
				if (div) {
					div.parentNode.removeChild(div);
				}
			}
			document.getElementById("test"+testnumber+"pages").value = '00';
			document.getElementById("test"+testnumber+"pages").value = '01';
			$("#selectreport"+testnumber+"pages").val('00');
			$("#selectreport"+testnumber+"pages").val('01');
			//alert($("#selectreport"+testnumber+"pages").val());
			document.getElementById("test"+testnumber+"pages").value = 1;
			document.getElementById('selectreport'+testnumber+'pages').disabled = true;
			showreportpages('01',testnumber);
		}
		else{
			document.getElementById('selectreport'+testnumber+'pages').disabled = false;
			$("#selectreport"+testnumber+"pages").val('01');
		}
	}
	function showreportpages(val,testnumber)
	{
		//alert(val);
		//var val= $("#selectreport"+testnumber+"pages").val();
		//alert(val);
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
			$("#filetablefortest"+testnumber+" > tbody").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="filefortest'+testnumber+'"><tr><td width="1%">&nbsp;</td><td width="25%" height="20" class="bodytext_normal" style="padding-left:24px;">Page '+pagenumber+' of '+val+'</td><td width="2%">&nbsp;</td><td width="16%"><table width="100%" border="0" cellspacing="0" cellpadding="0" ><tr><td><input type="file" name="report'+testnumber+'page'+ i+'" id="report'+testnumber+'page'+ i+'" /></td></tr></table></td><td width="34%">&nbsp;</td><td width="24%">&nbsp;</td></tr></table>');
			$("#testname"+i).autocomplete({source: "/ayushman/cautocompletedata/retrieve?query=select id, testname_c as value from testmasters where testname_c "});

		}
    
    	document.getElementById("test"+testnumber+"pages").value= val;
	}
	function showprescriptionvalue(val) 
	{	 
		var val=$("#selectprescriptionpage").val();
		var i=0;
		for(i=0;i<=document.getElementById("prescriptionpagesno").value;i++)
    	{		
			var div = document.getElementById("prescriptionuploaderchild");
			if (div) {
				div.parentNode.removeChild(div);
			}
		}    	   	
		window.filecounter = 0;
		for(i=0;i<val;i++)
		{	var page=i+1;
			$("#prescriptionuploader > tbody").append('<table width="100%" border="0" cellspacing="0" cellpadding="0" id="prescriptionuploaderchild"><tr><td width="4%">&nbsp;</td><td width="25%" height="30"   class="bodytext_normal">Page '+page+' of '+val+'</td><td width="2%">&nbsp;</td><td width="7%"></td><td width="2%">&nbsp;</td><td width="50%"><table width="100%" border="0" cellspacing="0" cellpadding="0"  ><tr><td><input type="file" name="file'+i+'" id="file'+i+'" /></td></tr></table></td><td width="20%">&nbsp;</td></tr></table>');
		}
    	document.getElementById("prescriptionpagesno").value= val;
	}
</script>
<div style="width:828px; height:740px;"> 
	<div>
        <table border="0" cellpadding="0" cellspacing="0" valign="top">
        	<tr>
        		<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">
      	 			<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg">&nbsp;
								<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;Upload Past Visits</strong>
							</td>
						</tr>
					</table>
        		</td>
        		<td style="width:1%;" ></td>
        	</tr>
			<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;">	
            		<table  border="0" cellpadding="0" cellspacing="0" valign="top" style="width:98%;">
            			<tr>
            				<td style="width:1%;" >&nbsp;</td>
            				<td  style="width:8%;padding-top: 10px;" ><input type="button" class="button"  onclick="newrow()" value="Add New" style="width:70px;height:20px;"/></td>
            				<td style="width:91%;" >&nbsp;</td>
            			</tr>
            		</table>	
            		</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	<tr>
        	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;"><?php		
					//this is emr grid for patient we can put this in other page
					$userid =  $userid;
					$whereclause="[patientuserid,=,".$userid."]";
					$archivevisitsjqgridrequest= Request::factory('xjqgridcomponent/index');
					$archivevisitsjqgridrequest->post('name','archivevisits');
					$archivevisitsjqgridrequest->post('height','320');
					$archivevisitsjqgridrequest->post('width','815');
					$archivevisitsjqgridrequest->post('sortname','dateandtime_dateformate');
					$archivevisitsjqgridrequest->post('sortorder','desc');
					$archivevisitsjqgridrequest->post('tablename','archivevisit');//used for jqgrid
					$archivevisitsjqgridrequest->post('whereclause',$whereclause);
					$archivevisitsjqgridrequest->post('columnnames', 'patientid,patientuserid,appointmentid,doctorid,incidentsname_c,drname,dateandtime_dateformate,DateAndTime,appointmnetplace,type,prescriptionpath,reportpath,appointmentid');//used for jqgrid
					$columninfo = '[{"name":"patientid","index":"patientid","hidden":true},
									{"name":"patientuserid","index":"patientuserid","width":100,"hidden":true},
									{"name":"appointmentid","index":"appointmentid","width":100,"hidden":true},
									{"name":"doctorid","index":"doctorid","width":100,"hidden":true},
									{"name":"Incident","index":"incidentsname_c","width":80,"editable":true},
									{"name":"Doctor","index":"drname","width":100},
									{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","width":0,"align":"left","hidden":true},
									{"name":"Date & Time","index":"DateAndTime","width":65,"align":"left","sortable":false},
									{"name":"Place","index":"appointmnetplace","width":35,"align":"left" },
									{"name":"Mode","index":"type","width":65,"align":"left","formatter":typeformatter},
									{"name":"Prescription","index":"prescriptionpath","width":50,"align":"center","formatter":prescriptionformatter},
									{"name":"Report","index":"reportpath","width":50,"align":"center","formatter":reportformatter},
									{"name":"Action","index":"appointmentid","width":100,"align":"center","formatter":editrowformatter}]';			
					$archivevisitsjqgridrequest->post('columninfo', $columninfo);
					//if save,edit,delete we dont want in jqgrid set it to false
					$archivevisitsjqgridrequest->post('editbtnenable','false');
					$archivevisitsjqgridrequest->post('deletebtnenable','false');
					$archivevisitsjqgridrequest->post('savebtnenable','false');
					echo $archivevisitsjqgridrequest->execute(); ?></td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	<tr>
            	<td style="width:1%;" >&nbsp;</td>
            	<td style="width:98%;height:0px;">&nbsp;</td>
            	<td style="width:1%;" >&nbsp;</td>
        	</tr>
        	
        </table>
	</div> 
</div>
<div style="height:1px;postion:fixed;overflow:scroll;">
	<div id="addnew">
		<form id= "archivevisit" class="cmxform"  method="post" enctype="multipart/form-data" >
			<table width="730px" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td align="left" valign="top" class="bodytext_normal">
					<table width="730px" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px;">
						<tr>
						  <td height="30" colspan="4">
							<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
								<tr>
									<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Upload Visit</td>
								</tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td height="30" colspan="4">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td width="5%" align="center"><input type="checkbox" id="chknewincident" name="chknewincident"  value="checkbox"/></td>
								  <td width="16%"><span class="style11" style="paddding-top:3px;">New Incidence </span></td>
								  
								  <td width="29%"><input id="incidenttxt" name="incidenttxt" type="text" class="textareapopup"  style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;" /><select class="input" id="incidentcombo" name="incidentcombo"  style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px; width:100%;"  align=left > 
											<option value="" selected="" >Previous Incident</option>
											<?PHP  
												foreach ($previnciarray as $key=> $incident) { 										
													print "<option  \" value=\"{$key}\">{$incident}</option>";
												} 
											?>
										</select></td>
									<td width="1%">&nbsp;</td>
								  <td width="15%"><input id="incidentdate" name="incidentdate" style="color: black;font-size: 12px;font-family: Verdana,Arial,Helvetica,sans-serif; " type="text" class="textareapopup"title="Please enter visit date." /></td>
									<td width="1%">&nbsp;</td>
								  <td width="33%"  align="left"><span class="style11">
									<select  id="mode" name="mode" class="{required:true}" title="Please enter your appiontment mode"  style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px;" > 
									<?PHP  
										foreach ($array_mode as $mode) { 										
										print "<option  \" value=\"{$mode}\">{$mode}</option>";
										} 
									?>
									</select>
								  </span></td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td height="30" colspan="4" align="left" valign="top">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px;">
								  <tr>
									  <td width="5%" align="center">&nbsp;</td>
									  <td width="11%" align="center">&nbsp;</td>
									  <td width="14%" align="center" ><span class="bodytext_normal">Incidence Name</span></td>
									  <td width="1%">&nbsp;</td>
									  <td width="21%" align="center"> <span class="bodytext_normal">Visit date</span></td>
									  <td width="1%" align="center"> &nbsp;</td>
									  <td width="24%"  align="left"><span style="padding-left: 21px;" class="bodytext_normal" >Visit Place </span></td>
								</tr>
							 
							</table>
						  </td>
						</tr>
						<tr>
						  <td height="30" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: 12px;">
							<tr>
							  <td width="1%">&nbsp;</td>
							  <td width="20%"><span class="style11">Doctor Information </span></td>
							  <td width="28%"><input  id="drname" name="drname" type="text"  style="color: black; font-family: Verdana,Arial,Helvetica,sans-serif;width:100%;font-size: 12px;"  class="textareapopup"  class="{required:true}"  title="Please fill Doctor  name."  /></td>
							   <td width="1%">&nbsp;</td>
							  <td width="14%"><input  id="drcity" name="drcity" type="text" class="textareapopup" style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px;" class="{required:true}" title="Please fill Doctor city." /></td>
							   <td width="1%">&nbsp;</td>
							  <td width="15%"><input id="drlocality"  name="drlocality" type="text" class="textareapopup"  style="  color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px;"  class="{required:true}"  onfocus="checkcity(this);" title="Please fill Doctor Locality"/></td>
							  <td width="1%">&nbsp;</td>
							  <td width="19%"><input id="drrsgnumber" name="drrsgnumber" type="text" class="textareapopup" style="color: black;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 12px;" class="{required:true}"  title="Please fill Doctor RMP Number."  /></td>
							  </tr>
						  </table>
						  </td>
						</tr>
						<tr>
						  <td height="30" colspan="4" >
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="1%">&nbsp;</td>
								<td width="14%">&nbsp;</td>
								<td width="23%" align="center" valign="top" ><span class="bodytext_normal">Full Name </span></td>
								<td width="1%">&nbsp;</td>
								<td width="22%" align="center" valign="top"  ><span class="bodytext_normal">City</span></td>
								<td width="1%">&nbsp;</td>
								<td width="15%" align="center" valign="top"  ><span class="bodytext_normal">Location</span></td>
								<td width="1%">&nbsp;</td>
								<td width="19%" align="center" valign="top"  ><span class="bodytext_normal">RMP Number </span></td>
							  </tr>
							
						  </table></td>
						</tr>	
						<tr align="left" >  
							<td colspan ="1"  >&nbsp;</td>
							  <td colspan ="3"  > <label id="savelbl" style="font-weight:bold;color:red;font-size:10px; "></label> </td>                              
						</tr>
						<tr>
						  <td width="33" height="30">&nbsp;</td>
						  <td width="95"><input id="drid" name="drid" type = "hidden"/><input id="appid" name=appid type = "hidden"/></td>
						  <td width="242">&nbsp;</td>
						  <td width="330" align="right"><table width="200" height="25" border="0" cellpadding="0" cellspacing="0">
							  <tr>
								<td width="78" align="center" valign="middle" class="button" onclick="addnewsave()">Save</td>
								<td width="13" align="center" valign="middle">&nbsp;</td>
								<td width="77" align="center" valign="middle" class="button" onclick="closepopup('addnew')">Cancel</td>
								<td width="32" align="center" valign="middle">&nbsp;</td>
							  </tr>
						  </table></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
		</form>
    </div> 
    <div id="addprescription">
		<form id= "archiveprescription" class="cmxform"  method="post" enctype="multipart/form-data" >
			<table width="600px" border="0" cellspacing="0" cellpadding="0"  class="bodytext_normal">
				<tr>
					<td align="left" valign="top" >
						<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
							  <td height="30">
								  <table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
									<tr>
									  <td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Upload Prescription</td>
									</tr>
								  </table>
							  </td>
							</tr>  
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
										    <td width="4%">&nbsp;</td>
										    <td><span class="bodytext_normal">Upload image in .jpeg, .gif, .png, .pdf formats are allowed only..tif format not supported.</span> </td>
										</tr>
									</table>
								</td>
							</tr>   
							<tr>
								<td height="50">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left"><span class="bodytext_normal" style="padding-left:24px;" >Number of pages </span></td>
											<td width="29%">
												<span class="style19">
												<select name="selectprescriptionpage" id="selectprescriptionpage" onchange="showprescriptionvalue(this.value);" size="1" style="width:100px;">
													<option>00</option>
													<option>01</option>
													<option>02</option>
													<option>03</option>
													<option>04</option>
													<option>05</option>
													<option>06</option>
													<option>07</option>
													<option>08</option>
													<option>09</option>
													<option>10</option>
												</select>
												</span>
											</td>
											<td width="15%">&nbsp;</td>
											<td width="35%">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td height="30">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" id="prescriptionuploader">
										<tr>
											<td>
												<table width="100%" border="0" cellspacing="0" cellpadding="0" id="prescriptionuploaderchild">
													<tr>
														<td>&nbsp; </td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align="left" valign="top"><input id="prescriptionappid" name=prescriptionappid type = "hidden"/><input id="prescriptionpagesno" name=prescriptionpagesno type = "hidden"/></td>
							</tr>
							<tr>
								<td height="30" align="right">
									<table width="200" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td width="117px">&nbsp;</td>
											<td  align="center" valign="middle" class="button" onclick="prescriptionsave()" style="height:22px;width:77px;">Upload</td>
											<td width="10px">&nbsp;</td>
											<td width="77px" align="center" valign="middle" class="button"style="height:22px;width:77px;"onclick="closepopup('addprescription')" >Cancel</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					 </td>
				</tr>
			</table>
		</form>
    </div>
    <div id="addreport" style="width:690px;">
    	<form id= "archivereport" class="cmxform"  method="post" enctype="multipart/form-data" >
 
    	<table style="width:690px;" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
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
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="4%">&nbsp;</td>
                                <td><span class="bodytext_normal">Only one report is allowed per visit. If you have multiple reports for the same visit, create new visit(with same data) and upload it. Upload images (.jpeg, .gif, .png) or pdf only. .tif format not supported.</span> </td>
                            </tr>
                        </table>
                    </td>
				</tr>
                <tr>
                	<td height="30">
                		<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    		<tr>
                      			<td align="center"><span class="bodytext_normal">Number of Report </span></td>
                      			<td width="29%"><span class="style21">
                       			<select name="testnumberselect" id="testnumberselect"  onchange="showreportvalue(this.value);" size="1" style="width:100px;">
									  <option>01</option>
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
    <div id="conformdeleteprescription">
    	<table style="width:690px;" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
			<tr>
			  <td height="30">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Delete Prescription</td>
					</tr>
				</table>
			  </td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
						  	<td width="90%" align="left" valign="top">&nbsp;</td>
						  	<td width="5%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%">&nbsp;</td>
						  	<td width="98%" align="left" valign="top">
						  		<span class="bodytext_normal">
						  		<table  width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						  			<tr>
						  				<td id="deleteprescriptionlbl" name="deleteprescriptionlbl" >Do you really want to delete Precription ? </td>
						  			</tr>
						  		</table>  
						  		</span>
						  	</td>
						  	<td width="1%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
						  	<td width="90%" align="left" valign="top">&nbsp;</td>
						  	<td width="5%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
            	<td width="330" align="right">
            		<table width="200" height="25" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="78" align="center" valign="middle" class="button" onclick="conformdeleteprescription()">Ok</td>
							<td width="13" align="center" valign="middle"><input id="deleteprescriptionappid" name="deleteprescriptionappid" type = "hidden"/>&nbsp;</td>
							<td width="77" align="center" valign="middle" class="button" onclick="closepopup('conformdeleteprescription')">Cancel</td>
							<td width="32" align="center" valign="middle">&nbsp;</td>
						</tr>
					</table>
				</td>
            </tr>      
        </table>
    </div>
    <div id="conformdeletereport">
    	<table style="width:690px;" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
			<tr>
			  <td height="30">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
					 	<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Delete Report</td>
					</tr>
				</table>
			  </td>
			</tr>
			<tr>
		  		<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="90%" align="left" valign="top">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						</tr>
		  			</table>
		  		</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="90%" align="left" valign="top">
							<span class="bodytext_normal">
						  		<table  width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						  			<tr>
						  				<td id="deletereportlbl" name="deletereportlbl" >Do you really want to delete Report ? </td>
						  			</tr>
						  		</table>  
						  	</span>
							</td>
							<td width="5%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="90%" align="left" valign="top">&nbsp;</td>
						  	<td width="5%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
            	<td width="330" align="right">
            		<table width="200" height="25" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="78" align="center" valign="middle" class="button" onclick="conformdeletereport()">Ok</td>
							<td width="13" align="center" valign="middle"><input id="deletereportappid" name="deletereportappid" type = "hidden"/>&nbsp;</td>
							<td width="77" align="center" valign="middle" class="button" onclick="closepopup('conformdeletereport')">Cancel</td>
							<td width="32" align="center" valign="middle">&nbsp;</td>
						</tr>
					</table>
				</td>
            </tr>
        </table>
    </div>
    <div id="conformdeletevisit">
    	<table style="width:690px;" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
			<tr>
			  <td height="30">
				<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
					 	<td width="160" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Delete Visit</td>
					</tr>
				</table>
			  </td>
			</tr>
			<tr>
		  		<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="90%" align="left" valign="top">&nbsp;</td>
							<td width="5%">&nbsp;</td>
						</tr>
		  			</table>
		  		</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%">&nbsp;</td>
							<td width="98%" align="left" valign="top"><span class="bodytext_normal">
							<table  width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						  			<tr>
						  				<td id="deletevisitlbl" name="deletevisitlbl" >Do you really want to delete visit ? </td>
						  			</tr>
						  		</table> </span>
							</td>
							<td width="1%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td height="30" colspan="4" align="left" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="5%">&nbsp;</td>
							<td width="90%" align="left" valign="top">&nbsp;</td>
						  	<td width="5%">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
            	<td width="330" align="right">
            		<table width="200" height="25" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="78" align="center" valign="middle" class="button" onclick="conformdeletevisit()">Ok</td>
							<td width="13" align="center" valign="middle"><input id="deletevisitappid" name="deletevisitappid" type = "hidden"/>&nbsp;</td>
							<td width="77" align="center" valign="middle" class="button" onclick="closepopup('conformdeletevisit')">Cancel</td>
							<td width="32" align="center" valign="middle">&nbsp;</td>
						</tr>
					</table>
				</td>
            </tr>
        </table>
    </div>
</div>
