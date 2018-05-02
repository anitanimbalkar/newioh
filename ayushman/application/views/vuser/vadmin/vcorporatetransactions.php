<html>
<head>
<title>Show Transactions...</title>
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
<div style="width:828px;height: 550px; overflow-x:hidden;" > 
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td colspan="4">
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Corporate Transactions</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporatetransactions/view">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="70%" align="right" valign = "bottom" class="bodytext_bold" >Search :</td>
							<td  width="20%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" onchange="$('#companysearchform').get(0).setAttribute('action', 'view');" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" class="button" value="Search"/></td>
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
	</table>
	<div style="width:100%;">
		<?php
			$whereclause='';
			if($previousvalues != null){
				if(isset($previousvalues['search']) && ($previousvalues['search'] != '') ){
					$whereclause = $whereclause.'[name,like,'.$previousvalues['search'].'%]';
					$whereclause = $whereclause.'(or)[corporatename,like,'.$previousvalues['search'].'%]';
					$whereclause = $whereclause.'(or)[summary,like,'.$previousvalues['search'].'%]';
					$whereclause = $whereclause.'(or)[dateandtime,like,'.$previousvalues['search'].'%]';
				}
			}
			$corporatetransactions= Request::factory('xjqgridcomponent/index');
			$corporatetransactions->post('name','showcorporatetransactions');
			$corporatetransactions->post('height','320');
			$corporatetransactions->post('width','815');
			$corporatetransactions->post('sortname','name');
			$corporatetransactions->post('sortorder','asc');
			$corporatetransactions->post('tablename','showcorporatetransactions');//used for jqgrid
			$corporatetransactions->post('columnnames', 'name,employeeid,corporatename,summary,amount,dateandtime');//used for jqgrid
			$corporatetransactions->post('whereclause',$whereclause);//used for jqgrid
			$columninfo = '[
							{"name":"Employee Name","index":"name","width":20,"align":"left","hidden":false},
							{"name":"Employee Id","index":"employeeid","width":20,"align":"left","hidden":false},
							{"name":"Corporate Name","index":"corporatename","width":20,"align":"left","hidden":false},
							{"name":"Summary","index":"summary","width":35,"align":"left","hidden":false},
							{"name":"Amount","index":"amount","width":0,"align":"left","hidden":true},
							{"name":"Date And Time","index":"dateandtime","width":25,"align":"left","hidden":false}
							]';			
			$corporatetransactions->post('columninfo', $columninfo);
			//if save,edit,delete we dont want in jqgrid set it to false
			$corporatetransactions->post('editbtnenable','false');
			$corporatetransactions->post('deletebtnenable','false');
			$corporatetransactions->post('savebtnenable','false');
			$corporatetransactions->post('shrinkToFit', 'true');
			$corporatetransactions->post('autowidth', 'true');
			echo $corporatetransactions->execute(); ?>
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