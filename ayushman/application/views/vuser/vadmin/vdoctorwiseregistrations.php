<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
 <script type="text/javascript">
 
	$(document).ready(function() {
		$('#loading').dialog
		({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		$('#doctorname').focus(function(){
			var urlloc= "/ayushman/cautocompletedata/doctors";
			$("#doctorname").autocomplete({source: urlloc,
			
				select: function (event, ui) {
					$("#doctorid").val(ui.item.id);
					return true;
				}	}		
			);
			
		});
		 $('#export').click(function() {
    			$('#searchform').attr("action", "export");  //change the form action
			$('#exportto').val('excel');
			$('#searchform').submit();  // submit the form
		});
		
		$(function() 
		{
			$( "#from" ).datepicker({ changeMonth: true,changeYear: true,maxDate:'0',  dateFormat: 'dd M yy', gotoCurrent: true});
				var m_names =  new Array("Jan", "Feb", "Mar", 
										 "Apr", "May", "Jun", "Jul", "Aug", "Sep", 
										 "Oct", "Nov", "Dec");

				var d = new Date();
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				var curr_year = d.getFullYear();
				if($('#from').val() == '')
				{
					if(curr_month == 0)
					{
					$( "#from" ).val(curr_date + " " + m_names[11] + " " + (curr_year - 1));
					}
					else
					{
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
				
				if($('#to').val() == '')
				{
					$( "#to" ).val(curr_date + " " + m_names[curr_month] + " " + curr_year);
				}
			});
				
			if($.trim($('#errorlistdiv').html()) != "")
			{
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			}
			
			if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
			typechanged($('#durationtype'),false);
			$('#loading').dialog("close");
			
			
	});
	function typechanged(select, submit)
	{
		$('#searchform').attr("action", "search");
		if($(select).find(":selected").val() == 'custom')
		{
			$('#dates').show();
			submit = false;
		}	
		else
		{
			$('#dates').hide();
		}
		if(submit != false)
		{
			$('#searchform').submit();
		}
	}
	function changeid(){
		$("#doctorid").val('');
	}
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:670px;padding:3px;"> 
	
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">

	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td style="width:99%;" colspan="4" class="Heading_Bg">
				Doctorwise Registrations
			</td>			
		</tr>
		<tr>
			<td align="left" valign="center" width="30%" class="bodytext_normal" style="padding-top: 6px">Registered During: 
				<select name="durationtype" onchange="typechanged(this)" class="textarea" id="durationtype" >
					<option value = '' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == '') ? 'selected' : '';
						?>   >All</option>
												<option value='lastmonth' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == 'lastmonth') ? 'selected' : '';
						?>  >Last Month</option>
												<option value='last2month' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == 'last2month') ? 'selected' : '';
						?>  >Last 2 Month</option>
												<option value='last3month' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == 'last3month') ? 'selected' : '';
						?>  >Last 3 Month</option>
												<option value='lastyear' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == 'lastyear') ? 'selected' : '';
						?>  >Last Year</option>
												<option value='custom' <?php
						if ($previousvalues != null)
							echo ($previousvalues['durationtype'] == 'custom') ? 'selected' : '';
						?>  >Custom Range</option>
				</select>
			</td>
			 <td align="left" width=45% valign="center" class="bodytext_normal">
					<div id="dates"  style=" width: 100%;padding-left: 30px;padding-bottom: 7px; ">
							<table style="width:100%;" >
								<tr style="width:100%; padding-top: 14px;">
									<td style="width:40%">
										From <input type="text" name="from" id="from" class="textarea" style="width:70%" readonly placeholder="select date" value="<?php if ($previousvalues != null)if (isset($previousvalues['from'])) echo $previousvalues['from'];?>" class="bodytext_normal"/>
									</td>
									<td style="width:40%"> To <input type="text" name="to" id="to" class="textarea" style="width:70%;" readonly placeholder="select date" value="<?php
										if ($previousvalues != null)if (isset($previousvalues['to']))echo $previousvalues['to'];?>" class="bodytext_normal"/>
									</td>
									<td style="width:20%">
										<input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
									</td>
								</tr>
							</table>
					</div>
			  </td>
    	</tr>
		<tr>
			<td align="left" valign="center" width="30%" class="bodytext_normal" style="padding-top: 6px">
				Select Doctor: 
				<input type="text" name="doctorname" onkeydown="changeid();" id="doctorname" class="textarea" style="width:200px;" value="<?php
							if ($previousvalues != null)
							if (isset($previousvalues['doctorname']))
							echo $previousvalues['doctorname'];?>" class="bodytext_normal"/><input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
				<input type="hidden" value="<?php
							if ($previousvalues != null)
							if (isset($previousvalues['doctorid']))
							echo $previousvalues['doctorid'];?>" id="doctorid" name="doctorid" />			
			</td>
			<td align="left" width=45% valign="center" class="bodytext_normal">
				&nbsp;
			</td>
    	</tr>
		<tr>
			<td style="width:99%;" colspan="4">
				<hr style="border-top: dotted 1px #11587E" />
				<div style="width:100px;float:right;">
					<input type="button" id="export" class="button" style="float:right;margin-right:10px;height:25px" value="Export to Excel" />
					<input type="hidden" id="exportto" name="exportto" value="" />
				</div>
			</td>
		</tr>
		<tr  class="bodytext_normal" align="right"  width="100%">    
			<td colspan="4" valign="top">
				<?php
					$consumers = Request::factory('xjqgridcomponent/index');
					$consumers->post('name', 'doctorwiseregistrations');
					$consumers->post('height', '320');
					$consumers->post('width', '810');
					$consumers->post('sortname', 'date');
					//$consumers->post('sortname', 'registerdate');
					$consumers->post('sortorder', 'desc');
					$consumers->post('tablename', 'doctorwiseregistration');
					$consumers->post('columnnames', 'userid,doctorname,RegisteredBy,registeredon,patientname,userid,chemistname,pathologistname');
					$consumers->post('whereclause', $whereclause); //used for jqgrid

					$columninfosearch = '[
													{"name":"Id","index":"userid","hidden":true},
													{"name":"Doctor Name", "index":"doctorname", "hidden":false,"width":15},
													{"name":"Registered By", "index":"RegisteredBy", "hidden":false,"width":15},				
													{"name":"Registration Date","index":"registeredon","hidden":false,"width":15},
													{"name":"Patient Name","index":"patientname","hidden":false,"width":15},
													{"name":"IOH Id", "index":"userid", "hidden":false,"width":10},
													{"name":"Chemist Name","index":"chemistname","hidden":false,"width":20},
													{"name":"DC Name","index":"pathologistname","hidden":false,"align":"left","sortable":false,"width":20}													
												]';
					$consumers->post('columninfo', $columninfosearch);
					$consumers->post('editbtnenable', 'false');
					$consumers->post('deletebtnenable', 'false');
					$consumers->post('savebtnenable', 'false');
					echo $consumers->execute();
					?>
			</td>
		</tr>
	</table>
	
	</form>
  </div>
 
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages, 'message'); ?>
	</div>
</div>
