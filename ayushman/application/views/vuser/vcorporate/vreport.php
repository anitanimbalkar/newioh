<html>
<head>
<title>Export registration data to tally</title>
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
			height: "auto",
			resizable: false,
			width: "auto"
		});
		$(".ui-dialog-titlebar").hide();
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
		$('#loading').dialog("close");
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
	function showconsumers(div,button){
		if($("#"+div).is(':visible')){
			$("#"+div).hide().animate({height: "0px"}, 0);
			$(button).val('Show Details');
			resize($('#content').height());
		}else{
			$("#"+div).show().animate({height: "300px"}, 0);
			$(button).val('Hide Details');
			resize($('#content').height());
		}
	}

</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:auto; overflow-x:hidden;" id="content"> 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Doctorwise Usage Summary</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
		<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;" cellpadding="0">
			<tr>
				<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;">
					<div style="vertical-align:middle; width:auto;float:left;padding-top:3px;padding-left:5px;">Select Duration  
							<select name="type" class="textarea" onchange="typechanged(this)" id="type" style="width:100px"> 
								<?PHP 
										$type = array();
										$type['lastmonth'] = 'Last Month';
										$type['last2months'] = 'Last 2 Months';
										$type['last3months'] = 'Last 3 Months';
										$type['lastyear'] = 'Last Year';
										$type['AllBetween'] = 'Custom Range';

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
					</div>
					<div id="dates" style="display:none; width:auto;float:left;text-align:center;padding-top:3px;">
							&nbsp;&nbsp;&nbsp;From <input type="text" name="from" id="from" class="textarea" style="width:70px;" readonly placeholder="select date" value="<?php if($previousvalues != null)if(isset($previousvalues['from']))echo $previousvalues['from']; ?>" class="bodytext_normal"/> To <input type="text" name="to" id="to" class="textarea" style="width:70px;" readonly placeholder="select date" value="<?php if($previousvalues != null)if(isset($previousvalues['to']))echo $previousvalues['to']; ?>" class="bodytext_normal"/>
					</div>
					
					<div style="display:none;width:200px;float:left;text-align:center;padding-top:3px;">
							Search Text <input type="text" name="search" id="search" class="textarea" style="width:120px;" placeholder="search text" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
					</div>
					<div style="width:35px;float:left;">
							&nbsp;<input type="submit" id='btnsearch' style="border:none;width:30px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
					</div>
				</td>
			</tr>
		</table>
		
		<table width="99.5%" border="0" cellspacing="0px" style="margin-left:3px;margin-top:10px;margin-right:10px;" class="table_roundBorder" cellpadding="0">
			<tr>
				<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
					<table width="99.5%" border="0" cellspacing="5px" style="margin-left:3px;margin-right:3px;background-color:#ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4;" cellpadding="0">
						<tr>
							<td class="bodytext_bold" colspan="4">
								<div style="width:auto;float:left;text-align:center;padding-top:3px; padding-left:5px;" class="bodytext_Bold">
									Select Doctor <select name="doctorname" class="textarea" onchange="typechanged(this)" id="type" style="width:auto"> 
										<?PHP 
												$type = array();
												$doctorname['All'] = 'All';
												
												$doctors = $numbers['doctorids'];
												if(count($doctors) == 0){
													
												}else{
													foreach($doctors as $doctorid)
													{
														$userid = ORM::factory('doctor')->where('id','=',$doctorid)->find()->refdoctorsid_c;
														$doctoruser = ORM::factory('user')->where('id','=',$userid)->find();
														$doctorname[$doctorid] = 'Dr. '.$doctoruser->Firstname_c.' '.$doctoruser->lastname_c;
													}
												}
												
												
												
												foreach ($doctorname as $key=> $value) {
													$selected = '';
													if($previousvalues != null)
																if(isset($previousvalues['doctorname'])){
																	if($previousvalues['doctorname'] == $key)
																	{ 
																		$selected = 'selected'; 
																	}
																}else{
																	if($previousvalues['doctorname'] == 'All')
																	{ 
																		$selected = 'selected'; 
																	}
																}
													print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
												}
											?>

									</select>
								</div>
								<div style="width:100px;float:right;">
									<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to PDF" />
								</div>
							</td>
						</tr>
					</table>
					<table width="99.5%" border="0" cellspacing="5px" style="margin-left:3px;margin-right:3px;margin-top:5px;background-color:#ecf8fb;" class="table_roundBorder" cellpadding="0">
						<tr>
							<td class="bodytext_bold">
								No. Of Doctors Used system : <?php echo $numbers['doctorcount'];?> 
							</td>
							<td class="bodytext_bold" style="border-left:1px solid #11587E;padding-left:3px;">
								No. Of 'Appointments Taken': <?php echo $numbers['appstaken'];?> 
							</td>
							<td class="bodytext_bold" style="border-left:1px solid #11587E;padding-left:3px;">
								No. Of 'Appointments Completed':  <?php echo $numbers['appscompleted'];?> 
							</td>
							<td class="bodytext_bold" style="border-left:1px solid #11587E;padding-left:3px;">
								No. Of 'No Show' Appointments:  <?php echo $numbers['noshowapps'];?> 
							</td>
						</tr>
					</table>
					
				</td>
			</tr>
			
			<tr>
				<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
					<?php
								//$objDoctor = ORM::factory('showbeneficiary')->where('myuserid','=',Auth::instance()->get_user()->id);
								
								$message = '';
								if($previousvalues != null){
									if(isset($previousvalues['search']) && ($previousvalues['search'] != '') ){
								
										$message = 'No one has used the system for selected duration';
									}else{
										$message = 'No one has used the system for selected duration';
									}
								}else{
									$message = 'No one has used the system for selected duration';
								}
							
								
								echo '<div width="100%" height="170px" style="white-space: wrap;">';
								$doctors = $numbers['doctorids'];
								if(count($doctors) == 0){
									
									echo '<div style="width:720px; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold" >'.$message.'</div>';
								}else{
									foreach($doctors as $doctorid)
									{
										$userid = ORM::factory('doctor')->where('id','=',$doctorid)->find()->refdoctorsid_c;
										$doctorlist= Request::factory('creportcomponent/view');
										$doctorlist->post("height",'25');
										$doctorlist->post("width",'800');
										$doctorlist->post("from",$duration['from']);
										$doctorlist->post("to",$duration['to']);
										$doctorlist->post("doctorUserId",$userid);
										$doctorlist->post("doctorid",$doctorid);
										echo $doctorlist->execute(); 
									}
								}
								echo '</div>';
							?>			
				</td>
			</tr>
		</table>
	</form>
</div>	
<div id="loading" style="width:20px;height:13px;align:center;background-color:transparent;align:center;">
	<img id="loading" style="float:center;" src="/ayushman/assets/images/ajax-loader.gif" />
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
