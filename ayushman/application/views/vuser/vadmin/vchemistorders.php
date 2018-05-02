<html>
<head>
<title>Export registration data to tally</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#export').click(function() {
    			$('#searchform').attr("action", "exportchemistorders");  //change the form action
			$('#exportto').val('excel');
			$('#searchform').submit();  // submit the form
		});
	});
	
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
	function actionformatter( cellvalue, options, rowObject )
	{	
		var patientuserid =$(rowObject).children()[1].firstChild.data;	
		return '<a href="#" onclick="openacceptaction('+cellvalue+','+patientuserid +');"><font color="#0000FF">Accept</font></a> / <a href="#" onclick="openrejectaction('+cellvalue+','+patientuserid +');"><font color="#0000FF">Reject</font></a>';
	}
	
	function testsformatter( cellvalue, options, rowObject )
	{
		if(cellvalue != undefined){
			arr = cellvalue.split('----');
			string = '';
			for(i=1;i<arr.length;i++)
			{
				string = string + i+') '+arr[i]+"<br />";
			}
			if(arr.length == 1){
				return cellvalue;
			}
			return string;
		}else{
			return "";
		}
		
	}
	function typechanged(select, submit){
		$('#searchform').attr("action", "searchchemistorders"); 
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
	function chemchanged(select, submit){
		$('#searchform').attr("action", "searchchemistorders"); 

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
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Chemist Orders</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form id="searchform" name="searchform" action="searchchemistorders" method="post" accept-charset="utf-8">
	<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;" cellpadding="0">
		<tr>
			<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;"><div style="vertical-align:middle; width:385px;float:left;padding-top:3px;" class="bodytext_normal">Search Options 
					<select name="type" class="textarea" onchange="typechanged(this)" id="type" style="width:150px"> 
						<?PHP 
								$type = array();
								$type['requested'] = 'Requested';
								$type['accepted'] = 'Accepted';
								$type['completed'] = 'Completed';
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
					<select name="chem" class="textarea" onchange="chemchanged(this)" id="chem" style="width:150px"> 
						<?PHP 
								$chemists = ORM::factory('chemistdetail')->find_all();
								print "<option selected value=''>All Chemists</option>";
								foreach ($chemists as $chemist) {
									$selected = '';
									if($previousvalues != null)
												if(isset($previousvalues['chem'])){
													if($previousvalues['chem'] == $chemist->chemistid)
													{ 
														$selected = 'selected'; 
													}
												}
									print "<option ".$selected."  \" value=\"{$chemist->chemistid}\">{$chemist->medicalname}</option>";
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
						$pathologistjqgridrequest= Request::factory('xjqgridcomponent/index');
						$pathologistjqgridrequest->post('name','chemistorder');
						$pathologistjqgridrequest->post('height','250');
						$pathologistjqgridrequest->post('width','805');
						$pathologistjqgridrequest->post('sortname','refchemistordersid');
						$pathologistjqgridrequest->post('sortorder','desc');
						$pathologistjqgridrequest->post('tablename','adminmedicineorder');//used for jqgrid
						$pathologistjqgridrequest->post('columnnames', 'refchemistordersid,date,chemistname,doctorname,patientname,patientmobilenumber,refchemistordersid,prescriptionorder,status');//used for jqgrid

						$pathologistjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
						$columninfo = 	'[
											{"name":"id","index":"date","width":10,"editable":true, "hidden":true},
											{"name":"Order Date","index":"date","width":10,"editable":false},
											{"name":"Medical Name","index":"chemistname","hidden":false,"width":10},
											{"name":"Ref. by","index":"doctorname","hidden":false,"width":10},
											{"name":"Patient Name","index":"patientname","width":10,"title":false},
											{"name":"Mob. No.","index":"patientmobilenumber","width":10,"editable":false,"hidden":false},
											{"name":"Req. no.","index":"refchemistordersid","width":7},
											{"name":"Medicines","index":"prescriptionorder","width":40,"formatter":testsformatter},
											{"name":"Status","index":"status","width":13,"align":"center","editable":true,"align":"left"}
											
										]';
						$pathologistjqgridrequest->post('columninfo', $columninfo);
						$pathologistjqgridrequest->post('editbtnenable','false');
						$pathologistjqgridrequest->post('deletebtnenable','false');
						$pathologistjqgridrequest->post('savebtnenable','false');
						echo $pathologistjqgridrequest->execute(); ?>
				
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
