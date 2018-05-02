<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>

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
			showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
	});
	function statusnameformatter(cellvalue, options, rowObject )
	{  
		var doctorid =$(rowObject).children()[0].firstChild.data;
		return '<image id="img_presence_'+doctorid+'" name="presence" vspace="0" hspace="0" scrolling="no" src="/ayushman/assets/images/circle-gray.png" height="11px" width="11px" />&nbsp;'+cellvalue+'';
	}


</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	
	<form id="searchform" name="searchform" action="searchbuttononclick?viewName=vstaffdashboardapptcancelled" method="post" accept-charset="utf-8">
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td style="width:99%;" colspan="2" class="Heading_bg">
				Cancelled Appointments
			</td>
		</tr>
		<tr>
			<td align="left" valign="center" width="50%" class="bodytext_normal">&nbsp;&nbsp;Doctor Name : 
					<select name="selectedDoctor" onchange="$('#searchform').submit();" class="textarea" id="doctorlistbox" > 
						<option value="" selected="" >ALL</option>
							<?PHP  
								foreach ($array_doctor as $key=> $value) {
									$selected = '';
									if($previousvalues != null)
												if(isset($previousvalues['selectedDoctor'])){
													if($previousvalues['selectedDoctor'] == $key)
													{ 
														$selected = 'selected'; 
													}
												}
									print "<option ".$selected."  \" value=\"{$key}\">{$value}</option>";
								} 
							?>
					</select>
			</td>
			<td align="right" valign="bottom">
					<table>
						<tr>	
							<td width="52" class="bodytext_bold" align="right">Search :</td>
						  	<td width="106" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  	<td width="27" align="right"><input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
					</table>

			</td>
		</tr>
		<tr  class="bodytext_normal" align="right"  width="100%">    
			<td colspan="2" valign="top">
				<?php
					$searchpathojqgridrequest= Request::factory('xjqgridcomponent/index');
					$searchpathojqgridrequest->post('name','doctorstaffappointments');
					$searchpathojqgridrequest->post('height','320');
					$searchpathojqgridrequest->post('width','810');
					$searchpathojqgridrequest->post('sortname','dateandtime_dateformate');
					$searchpathojqgridrequest->post('sortorder','desc');
					$searchpathojqgridrequest->post('tablename','canceledappointments');
					$searchpathojqgridrequest->post('columnnames','doctorUserid,dateandtime_dateformate,incidentid,Doctorsname,Patientname,DateAndTime,type,city,chargestatus,staffid,appointment_id,refappfromid_c');
					$x="[staffid,=,".$staffid."]";
					$v=$x.$whereclause;
					$searchpathojqgridrequest->post('whereclause',$v);//used for jqgrid
					$columninfosearch = '[
								{"name":"doctorid","index":"doctorUserid","hidden":true},
								{"name":"dateandtime_dateformate","index":"dateandtime_dateformate","hidden":true},
								{"name":"Incident id","index":"incidentid","width":80,"hidden":true},
								{"name":"Doctors Name","index":"Doctorsname","width":140,"hidden":false,formatter:statusnameformatter},
								{"name":"Patients Name","index":"Patientname","width":140,"hidden":false},
								{"name":"Date&Time","index":"DateAndTime","width":130,"hidden":false},
								{"name":"Type","index":"type","width":40,"hidden":false},
								{"name":"Place","index":"city","width":56,"hidden":false},
								{"name":"Charge Status","index":"chargestatus","width":100,"editable":true,"hidden":true},
								{"name":"userid","index":"staffid","hidden":true},
								{"name":"appid","index":"appointment_id","hidden":true},
								{"name":"patid","index":"refappfromid_c","hidden":true}
							]';
					$searchpathojqgridrequest->post('columninfo', $columninfosearch);
					$searchpathojqgridrequest->post('editbtnenable','false');
					$searchpathojqgridrequest->post('deletebtnenable','false');
					$searchpathojqgridrequest->post('savebtnenable','false');
					echo $searchpathojqgridrequest->execute(); 
				?>
			</td>
		</tr>
	</table>
	
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

