<html>
<head>
<title>Export registration data to tally</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	function testsformatter( cellvalue, options, rowObject )
	{
		console.log(cellvalue);
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
		if(cellvalue == 'requested')
			return "Requested";
		if(cellvalue == 'reportsuploaded')
			return "Reports Uploaded";
		if(cellvalue == 'reportscollected')
			return "Reports Collected";
		if(cellvalue == 'accepted')
			return "Order in process";
		if(cellvalue == 'rejected')
			return "Order rejected";
	}
	function statusnameformatter(cellvalue, options, rowObject )
	{
		var patientuserid ='';
		if($(rowObject).children()[10].firstChild != null){
			patientuserid =$(rowObject).children()[10].firstChild.data;
		}
		
		var patphonenumber = '';
		if($(rowObject).children()[4].firstChild != null){
			patphonenumber = $(rowObject).children()[4].firstChild.data;
		}
		return '<image id="img_presence_'+patientuserid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;<label title="Mob. No. :'+patphonenumber+'">'+cellvalue+'</label>';
	}
	function uploadbuttonformatter( cellvalue, options, rowObject )
	{
		//return '<a style="margin-top:5px; cursor:pointer; "  onclick="openreport('+cellvalue+');" ><font color="#0000FF">Upload</font></a>';		
		return '';
	}

	$(document).ready(function() {
		
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		$(function() {
				$( "#from" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
					var m_names =  new Array("Jan", "Feb", "Mar", 
						"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
						"Oct", "Nov", "Dec");

					var d = new Date();
					var curr_date = d.getDate();
					var curr_month = d.getMonth();
					var curr_year = d.getFullYear();
					if($('#from').val() == ''){
						if(curr_month == 0){
						  $( "#from" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
						}else{
						    $( "#from" ).val(curr_date + " " + m_names[curr_month-1] + " " + curr_year);
						}
					}
				$( "#to" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
					var m_names =  new Array("Jan", "Feb", "Mar", 
				"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
				"Oct", "Nov", "Dec");

					var d = new Date();
						var curr_date = d.getDate();
					var curr_month = d.getMonth();
					var curr_year = d.getFullYear();
				
				if($('#to').val() == ''){
					$( "#to" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				}
			});
		$('#export').click(function() {
    			$('#searchform').attr("action", "export");  //change the form action
			$('#exportto').val('excel');
			$('#searchform').submit();  // submit the form
		});
		$('#exporttoxml').click(function() {
    			$('#searchform').attr("action", "export");  //change the form action
			$('#exportto').val('xml');
			$('#searchform').submit();  // submit the form
		});
		
		$('#btnsearch').click(function() {
    			$('#searchform').attr("action", "search");  //change the form action
			$('#searchform').submit();  // submit the form
		});	
		if($.trim($('#errorlistdiv').html()) != ""){
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		}
			
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		typechanged($('#type'),false);
	});
	function typechanged(select, submit){
		$('#searchform').attr("action", "search"); 
		if($(select).find(":selected").val() == 'AllBetween'){
			$('#dates').show();
			submit = false;
		}else{
			$('#dates').hide();
		}
		if(submit != false){
			$('#searchform').submit();
		}
	}
	function labchanged(select, submit){
		$('#searchform').attr("action", "search"); 

		if(submit != false){
			$('#searchform').submit();
		}
	}

</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:auto; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Diagnostic Orders</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
	<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;" cellpadding="0">
		<tr>
			<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;"><div style="vertical-align:middle; width:385px;float:left;padding-top:3px;" class="bodytext_normal">Search Options 
					<select name="type" class="textarea" onchange="typechanged(this)" id="type" style="width:150px"> 
						<?PHP 
								$type = array();
								$type['requested'] = 'Requested';
								$type['accepted'] = 'Accepted';
								$type['reportsuploaded'] = 'Completed';
								$type['rejected'] = 'Rejected';
								//$type['AllBetween'] = 'All Registrations (exported and new) Between';

								foreach ($type as $key=> $value) {
									$selected = '';
									if($previousvalues != null)
												if(isset($previousvalues['type'])){
													if($previousvalues['type'] == $key)
													{ 
														$selected = 'selected'; 
													}
												}
									print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
								}
							?>

					</select>
					<select name="lab" class="textarea" onchange="labchanged(this)" id="lab" style="width:150px"> 
						<?PHP 
								$labs = ORM::factory('searchedpathologist')->find_all();
								print "<option selected value=''>All Diagnostic Center</option>";
								foreach ($labs as $lab) {
									$selected = '';
									if($previousvalues != null)
												if(isset($previousvalues['lab'])){
													if($previousvalues['lab'] == $lab->pathologistid)
													{ 
														$selected = 'selected'; 
													}
												}
									print "<option ".$selected."  \" value=\"{$lab->pathologistid}\">{$lab->pathologistname}</option>";
								}
							?>

					</select>
			</div>
			<div id="dates" style="display:none; width:310px;float:left;text-align:center;padding-top:3px;">
					date <input type="text" name="from" id="from" class="textarea" style="width:120px;" readonly placeholder="select date" value="<?php if($previousvalues != null)if(isset($previousvalues['from']))echo $previousvalues['from']; ?>" class="bodytext_normal"/> and <input type="text" name="to" id="to" class="textarea" style="width:120px;" readonly placeholder="select date" value="<?php if($previousvalues != null)if(isset($previousvalues['to']))echo $previousvalues['to']; ?>" class="bodytext_normal"/>
			</div>
			<div style="display:none;width:200px;float:left;text-align:center;padding-top:3px;">
					Search Text <input type="text" name="search" id="search" class="textarea" style="width:120px;" placeholder="search text" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
			</div>
			<div style="width:35px;float:left;">
					<input type="submit" id='btnsearch' style="border:none;width:30px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
			</div>
			<div style="width:100px;float:right;">
				<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to Excel" />
			</div>
			<input type="hidden" id="exportto" name="exportto" value="" />

			</td>
		</tr>
	</table>
								
									<?php
									//this is emr grid for patient we can put this in other page
									$ordersinprocess= Request::factory('xjqgridcomponent/index');
									$data =$whereclause;
									$ordersinprocess->post('usetemplate','true');
									$ordersinprocess->post('data',$data);
									$ordersinprocess->post('tablename','adminpathologisttest');
									$ordersinprocess->post('name','ordersinprocess');
									$ordersinprocess->post('height','250');
									$ordersinprocess->post('width','805');
									$ordersinprocess->post('sortname','requisitionno');
									$ordersinprocess->post('sortorder','asc');
									$ordersinprocess->post('columnnames', 'date,lab,patientid,DoctorName,patientname,patientmobilenumber,requisitionno,tests,deliverydate,status,requisitionno,patientuserid');//used for jqgrid
									$ordersinprocess->post('whereclause',$data);//used for jqgrid
									$columninfo = 	'[
														{"name":"Order Date","index":"date","width":"6","editable":false},
														{"name":"Center Name","index":"lab","width":"10","editable":false},
														{"name":"Id","index":"patientid","width":"10","hidden":true},
														{"name":"Ref. By","index":"DoctorName","width":"8","editable":false},
														{"name":"Patient Name","index":"patientname","width":"10","formatter":statusnameformatter,"title":false},
														{"name":"Mob. no.","index":"patientmobilenumber","width":"7","hidden":false},
														{"name":"Ord. no.","index":"requisitionno","width":"5"},
														{"name":"Tests","index":"tests","width":"15","formatter":testsformatter},
														{"name":"Delivery date","index":"accept","width":"6","align":"center","hidden":true,"editable":true},
														{"name":"Status","index":"status","width":"11","align":"left","editable":true,"formatter":statusformatter},
														{"name":"","index":"upload","width":"10","hidden":true,"align":"left","editable":true,"formatter":uploadbuttonformatter,"align":"left"},
														{"name":"patientuserid","index":"patientuserid","hidden":true},
														
														
													]';
									$ordersinprocess->post('columninfo', $columninfo);
									$ordersinprocess->post('editbtnenable','false');
									$ordersinprocess->post('deletebtnenable','false');
									$ordersinprocess->post('savebtnenable','false');
									echo $ordersinprocess->execute(); ?>
								
				
			</form>
</div>	
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
