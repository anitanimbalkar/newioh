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
						<td  width="50%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;CoEP Dashboard</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table width="99.5%" border="0" cellspacing="10px" style="margin-left:3px;margin-top:10px;margin-right:10px;background-color:#ecf8fb;" class="table_roundBorder" cellpadding="0">
		<tr>
			<!--<td class="bodytext_bold">
				Registered Students : <?php echo $registeredusers; ?>
			</td> -->
			<td class="bodytext_bold">
				Diagnostic Tests Performed In CAMP 1 - Student (2012-13): <?php echo $TestInCAMP1; ?>
			</td>
			<td class="bodytext_bold">
				Consultations In CAMP 1 - Student (2012-13): <?php echo $ConsultationInCAMP1; ?>
			</td>
		</tr>
		<tr>
		
			<td class="bodytext_bold">
				Diagnostic Tests Performed In CAMP 2 - Student (2013-14): <?php echo $TestInCAMP2; ?>
			</td>
			<td class="bodytext_bold">
				Consultations In CAMP 2 - Student (2013-14): <?php echo $ConsultationInCAMP2; ?>
			</td>
		</tr>
		<tr>
			
			<td class="bodytext_bold">
				Diagnostic Tests Performed In CAMP 3 - Staff (2013-14): <?php echo $TestInCAMP3; ?>
			</td>
			<td class="bodytext_bold">
				Consultations In CAMP 3 - Staff (2013-14): <?php echo $ConsultationInCAMP3; ?>
			</td>
		</tr>
		<tr>
			
			<td class="bodytext_bold">
				Diagnostic Tests Performed In CAMP 4 - Student (2014-15): 1279
			</td>
			<td class="bodytext_bold">
				Consultations In CAMP 4 - Student (2014-15): 1286
			</td>
		</tr>
	</table>

	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
	<table width="99.5%" border="0" cellspacing="0" style="margin-left:3px;margin-right:10px;margin-top:15px;"  cellpadding="0">
		<tr>
			<td height="30" bgcolor="#ecf8fb" class="Bodytext_bold" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding:10px;">
				<div style="display:block;width:200px;float:left;text-align:center;padding-top:3px;">
						Search Text <input type="text" name="search" id="search" class="textarea" style="width:120px;" placeholder="search text" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
				</div>
				<div style="width:35px;float:left;">
						<input type="submit" id='btnsearch' style="border:none;width:30px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
				</div>
				<div style="width:100px;float:right;">
					<!--<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to Excel" />-->
				</div>
			</td>
		</tr>
	</table>
								<?php
									$consumers= Request::factory('xjqgridcomponent/index');
									$consumers->post('name','corporatemembers');
									$consumers->post('height','425');
									$consumers->post('width','820');
									$consumers->post('sortname','employeeid_c');
									$consumers->post('sortorder','asc');
									$consumers->post('tablename','corporatemember');
									$consumers->post('columnnames','iohid_c,employeeid_c,employeename_c,dateofbirth_c,employeemobileno_c,emailid_c');
									$consumers->post('whereclause',$whereclause);//used for jqgrid
									$columninfosearch = '[
											{"name":"IOH Id","width":"10","index":"iohid_c","hidden":false},
											{"name":"MIS","width":"10","index":"employeeid_c","hidden":false},
											{"name":"Name","width":"20","index":"employeename_c","hidden":false},
											{"name":"DOB","width":"10","index":"dateofbirth_c","hidden":false},
											{"name":"Mobile No","width":"10","index":"employeemobileno_c","hidden":false},
											{"name":"Email Id","width":"30","index":"emailid_c","hidden":false}

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
