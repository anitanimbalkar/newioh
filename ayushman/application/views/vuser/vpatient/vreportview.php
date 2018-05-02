<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" >
	function Observerdvaluelink(cellvalue, options, rowObject ){
		return 'Not yet filled';
	}
	function viewDetailReport(orderid)
	{
		var newFrame = document.createElement("iframe");
		newFrame.setAttribute("id","iframedetailreport");
		newFrame.setAttribute("src", window.location.protocol +"//"+ window.location.host +'/ayushman/cpathologist/pathologistdetailreport?id='+orderid );	
		newFrame.style.width = 680+"px"; 
		newFrame.style.height = 255+"px"; 
		newFrame.frameBorder = "0";
		newFrame.scrolling ="no";
		newFrame.setAttribute("frameBorder", "0");
		$("#detailedreport").empty();
		var target = document.getElementById("detailedreport");
		target.appendChild(newFrame);		
		$("#showdetailedreport").dialog("open");	
	}

	function back()
	{
		window.location="<?= $backlink;?>";
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
	}
	function labreferencenumberlink( cellvalue, options, rowObject )
	{
		return 'Not yet filled';
	}
	function setlink( cellvalue, options, rowObject )
	{
		if(cellvalue == "suggested" )
			return "Assign diagnostic lab";
		else
			if(cellvalue == "reportsuploaded" ||cellvalue == "reportscollected" )
				return '<div align="center" style="width:100%"><a href="#" onclick="viewDetailReport('+$(rowObject).children()[8].firstChild.data+');"><font color="#0000FF">Details</font></a></div>';
			else
				if(cellvalue == "requested" ||cellvalue == "rejected")
				{
					 return "Order rejected";
				}else
					if(cellvalue == "accepted" || cellvalue == "workinprogress" )
					return "Order in process";
	}
	$(document).ready(function() {
		document.getElementById("incidencename").innerHTML = "<span class='bodytext_normal'><?= $incidentname; ?></span>";
		document.getElementById("dateofconsultation").innerHTML = "<span class='bodytext_normal'><?= $dateandtime; ?></span>";
		document.getElementById("drname").innerHTML = "<span class='bodytext_normal'><?= $drname; ?></span>";
		$('#showdetailedreport').dialog({
			autoOpen: false,
			title: "Detailed Test Report" ,
			show: "fade",
			hide: "fade",
			width: "780px",
			modal: true,
			height: "350",
			resize: "auto",
			resizable: false
		});
		jQuery("#showdetailedreport").dialog('option', 'position', ['center',50]);
	});
</script>
<body width="828px" class="body_bg">
    <table class="content_bg" border="0" style="padding:3px;" width="825px" cellpadding="0" cellspacing="0" valign="top" >
    	<tr  >
        	<td style="width:819px;" colspan="3" class="Heading_bg">
			Appointment Reports</td>
        </tr>
		<tr>
			<td style="width:1%;" >&nbsp;</td>
			<td style="width:97%;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="1%">&nbsp;</td>
						<td class="bodytext_normal" >Incidence Name:<label     id="incidencename" name="incidencename" class="bodytext_normal" style="border-bottom: 1px solid;width: 75px;">-</label> </td>
						<td class="bodytext_normal">Date Of Consultation:<label     id="dateofconsultation" name="dateofconsultation" class="bodytext_normal" style="border-bottom: 1px solid;width: 75px;">-</label></td>
						<td class="bodytext_normal">Doctor Name:<label     id="drname" name="drname"  class="bodytext_normal" style="border-bottom: 1px solid;width: 75px;">-</label></td> 
						<td width="1%">&nbsp;</td>						   
					</tr>
				</table> 
			</td>
			<td style="width:1%;" ></td>
		</tr>
		<tr> 
			<td  >&nbsp;</td>
			<td>
				<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
					<tr>
						<td >
							<?php
							//this is emr grid for patient we can put this in other page
							$userid =  $userid;
							$whereclause="[appid,=,".$appid."]";
							$patjqgridrequest= Request::factory('xjqgridcomponent/index');
							$patjqgridrequest->post('name','archivereport');
							$patjqgridrequest->post('height','220');
							$patjqgridrequest->post('width','815');
							$patjqgridrequest->post('sortname','appid');
							$patjqgridrequest->post('sortorder','desc');
							$patjqgridrequest->post('tablename','completedtest');//used for jqgrid
							$patjqgridrequest->post('columnnames', 'appid,date,tests,pathologistname,appid,appid,status,status,requisitionno');//used for jqgrid
							$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
							$columninfo = '[{"name":"appid","index":"appid","hidden":true},
											{"name":"Test Date","index":"date","width":50},
											{"name":"Test Name","index":"tests","width":150,"formatter":testsformatter},
											{"name":"Diagnostic Lab","index":"pathologistname","width":80,"align":"left" },
											{"name":"Lab Reference Number","index":"appid","width":120,"align":"left","formatter":labreferencenumberlink},
											{"name":"Observerd value","index":"appid","width":80,"align":"left","formatter":Observerdvaluelink} ,
											{"name":"Reports","index":"status","width":80,"align":"center","formatter":statusformatter,"hidden":true},
											{"name":"Reports","index":"status","width":80,"align":"center","formatter":setlink},
											{"name":"requisitionno","index":"requisitionno","hidden":true},
											]';			
							$patjqgridrequest->post('columninfo', $columninfo);
							//if save,edit,delete we dont want in jqgrid set it to false
							$patjqgridrequest->post('editbtnenable','false');
							$patjqgridrequest->post('deletebtnenable','false');
							$patjqgridrequest->post('savebtnenable','false');
							echo $patjqgridrequest->execute(); ?>
						</td>
					</tr>
				</table>
			</td>
			<td >&nbsp;</td>
		</tr>
		<tr>
			<td  >&nbsp;</td>
			<td  >	<input type="button" class="button"  onclick="back()" value="Back" style="width:100px;height:22px;"/></td>
			<td  >&nbsp;</td>
		</tr>
        </table>
<div id="showdetailedreport" style="width:750px;overflow-y:auto;height:350px; "  >
 	<table>
		<tr>
		<td>&nbsp; </td>
		<td>
			<div id="detailedreport" style="width:100%" ></div>
			
		</td>
		
		</tr>
	</table>
 </div>
 </body>