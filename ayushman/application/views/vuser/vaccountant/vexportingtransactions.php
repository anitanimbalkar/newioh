<html>
<head>
<title>Export transactions to tally</title>
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

</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div style="width:828px;height:auto; overflow-x:hidden;" > 
	<table class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td >
				<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
					<tr>
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Transactions</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
	<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;" cellpadding="0">
		<tr>
			<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;"><div style="vertical-align:middle; width:240px;float:left;padding-top:3px;">Search Options 
					<select name="type" class="textarea" onchange="typechanged(this)" id="type" style="width:150px"> 
						<?PHP 
								$type = array();
								$type['New'] = 'Only New Transactions';
								$type['All'] = 'All (exported and new)';
								$type['AllBetween'] = 'All Transactions (exported and new) Between';

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
			<div style="width:100px;float:right;">
				<input type="button" id="exporttoxml" class="button" style="float:right;margin-right:10px;height:25px" value="Export to XML" />
			</div>
			<input type="hidden" id="exportto" name="exportto" value="" />

			</td>
		</tr>
	</table>
								<?php
									$consumers= Request::factory('xjqgridcomponent/index');
									$consumers->post('name','exporttransactions');
									$consumers->post('height','420');
									$consumers->post('width','820');
									$consumers->post('sortname','Name');
									$consumers->post('sortorder','desc');
									$consumers->post('tablename','exporttransaction');
									$consumers->post('columnnames','AccountCode,Name,TransactionId,Reason,Credit,Debit,Date');
									$consumers->post('whereclause',$whereclause);//used for jqgrid
									$columninfosearch = '[
											{"name":"Account Code","width":"15","index":"AccountCode","hidden":false},
											{"name":"Name","width":"15","index":"Name","hidden":false},
											{"name":"Transaction Id","width":"13","index":"TransactionId","hidden":false},
											{"name":"Reason","width":"30","index":"Reason","hidden":false},
											{"name":"Credit(Rs.)","width":"10","align":"right","index":"Credit","hidden":false},
											{"name":"Debit(Rs.)","width":"10","align":"right","index":"Debit","hidden":false},
											{"name":"Date","width":"20","index":"Date","hidden":false}
										]';
									$consumers->post('columninfo', $columninfosearch);
									$consumers->post('editbtnenable','false');
									$consumers->post('deletebtnenable','false');
									$consumers->post('savebtnenable','false');
									echo $consumers->execute(); 
								?>
	
				
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
