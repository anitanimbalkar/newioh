<html>
<head>
<title>Upload Employees in Corporate Account...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
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
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height: 500px; overflow-x:hidden;" > 
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Upload List of Employees from <?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td style="padding-top:5px;" >
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/uploadMembers">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="70%" align="right" class="bodytext_bold" >&nbsp;&nbsp;Upload List of employees in .csv format&nbsp;:&nbsp;</td>
							<td  width="20%" valign="bottom" align="right" ><input type="file" name="file" id="file" value="Choose File"  class="bodytext_normal"/></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" width="100px" name="submit" id="submit" class="button" value="upload"/></td>
						</tr>
					</table>
					<input type="hidden" name="corporateid" id="corporateid" value="<?php if($previousvalues != null)echo $previousvalues['corporateid']; ?>">
					<input type="hidden" name="corporatename_c" id="corporatename_c" value="<?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>"/>
				</form>
			</td>
		</tr>
		<tr>
			<td style="padding-top:1px;" >
				<HR style="height:0.5px"/>
			</td>
		</tr>
		<tr>
			<td>
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/searchMembers">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="70%" align="right" valign = "bottom" class="bodytext_bold" >Search :</td>
							<td  width="20%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" onchange="$('#companysearchform').get(0).setAttribute('action', 'baz');" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" onclick="$('#companysearchform').get(0).setAttribute('action', 'baz');" class="button" value="Search"/></td>
						</tr>
					</table>
					<input type="hidden" name="corporateid" id="corporateid" value="<?php if($previousvalues != null)echo $previousvalues['corporateid']; ?>">
					<input type="hidden" name="corporatename_c" id="corporatename_c" value="<?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>"/>
				</form>
			</td>
		</tr>
	</table>
	<div style="width:100%;">
		<?php
			//this is emr grid for patient we can put this in other page
			$whereclause='';
			if($previousvalues != null){
				if(isset($previousvalues['search']) && ($previousvalues['search'] != '') ){
					$whereclause = $whereclause.'[employeename,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeeid,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeenumber,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeeemailid,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[dateofbirth,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[status,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
				}else{
					$whereclause = "[corporateid,=,".$previousvalues['corporateid']."]";
				}
			}
			$corporatemembers= Request::factory('xjqgridcomponent/index');
			$corporatemembers->post('name','corporatemembers');
			$corporatemembers->post('height','320');
			$corporatemembers->post('width','815');
			$corporatemembers->post('sortname','employeename');
			$corporatemembers->post('sortorder','asc');
			$corporatemembers->post('tablename','getcorporatemembers');//used for jqgrid
			$corporatemembers->post('columnnames', 'employeename,employeeid,employeenumber,employeeemailid,dateofbirth,status');//used for jqgrid
			$corporatemembers->post('whereclause',$whereclause);//used for jqgrid
			$columninfo = '[
							{"name":"Employee Name","index":"employeename","width":30,"align":"left","hidden":false},
							{"name":"Employee Id","index":"employeeid","width":10,"align":"left","hidden":false},
							{"name":"Mobile Number","index":"employeenumber","width":15,"align":"left","hidden":false},
							{"name":"Email Id","index":"employeeemailid","width":25,"align":"left","hidden":false},
							{"name":"Date of birth","index":"dateofbirth","width":10,"align":"left","hidden":false},
							{"name":"Status","index":"status","width":10,"align":"left","hidden":false}
							]';			
			$corporatemembers->post('columninfo', $columninfo);
			//if save,edit,delete we dont want in jqgrid set it to false
			$corporatemembers->post('editbtnenable','false');
			$corporatemembers->post('deletebtnenable','false');
			$corporatemembers->post('savebtnenable','false');
			$corporatemembers->post('shrinkToFit', 'true');
			$corporatemembers->post('autowidth', 'true');
			echo $corporatemembers->execute(); ?>
	</div>
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