<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<!-- css required for displaying list of plans -->

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

<div class="table_roundBorder" style="width:99%;margin:auto; margin-bottom:5px;">
  <div  style="width:99%; float:left; padding-left:0px; line-height:42px;  border-bottom:1px solid #b5d5e3;width:100%;background-color:#ecf8fb;" >
	
    <div style='width:%;float:left;border-right:1px solid #b5d5e3;'>
      <img src="<?php if($objUserForDoctor->photo_c){echo $objUserForDoctor->photo_c;} else {echo '/ayushman/assets/images/pic02.png';}?>" style='heigth:50px;width:50px;' />
    </div>
    <div  style="width:93%; float:left;padding-top:5px;" class="bodytext_bold">
		<table style="width:99%;">
			<tr>
				<td style="width:25%;">
						<table width="99.5%" border="0" cellspacing="0">
							<tr>
								<td class="bodytext_bold">
									Name : <?php echo 'Dr. '.$objUserForDoctor->Firstname_c.' '.$objUserForDoctor->lastname_c; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_bold">
									Mob. No.: <?php echo $objUserForDoctor->isdmobileno1_c.'-'.$objUserForDoctor->mobileno1_c; ?> 
								</td>
							</tr>
						</table>
				</td>
				<td style="width:60%;border-left:1px solid #11587E;">
					<table width="99.5%" border="0" cellspacing="0">
							<tr>
								<td class="bodytext_bold">
									No. Of Appointments given : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											
											echo $totalappointments ;				
											
									?> 
								</td>
								<td class="bodytext_bold">
									No. Of Appointments Completed : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','1')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;			
											
									?> 
								</td>
							</tr>
							<tr>
								<td class="bodytext_bold">
									No. Of No Show Appointments : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','5')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;				
											
									?> 
								</td>
								<td class="bodytext_bold">
									No. Of Pending Appointments : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','2')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;				
											
									?> 
								</td>
							</tr>
						</table>
				</td>
				<td style="width:15%;">
					<input type="button" class="button" style="float:right;margin-right:10px;height:25px" onclick="showconsumers('<?php echo $doctorid; ?>',this);" value="Show details" />
				</td>
			</tr>
		</table>
    </div>
  </div>
  <div  style='clear:both'>
  </div>
  <div id='<?php  echo $doctorid; ?>' style='display:none;align:center;' class="consumerdetails" >
	<table width="99.5%" border="0" cellspacing="0">
		<tr>
			<td style="width:10%;">
			</td>
			<td class="bodytext_bold" style="width:80%;">
				<?php
					$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',Auth::instance()->get_user()->id)->find();
								
					$consumers= Request::factory('xjqgridcomponent/index');
					$consumers->post('name','coepstudents'.$doctorid);
					$consumers->post('height','200');
					$consumers->post('width','650');
					$consumers->post('sortname','iohid');
					$consumers->post('sortorder','desc');
					$consumers->post('tablename','getappcountbydoctor');
					$consumers->post('columnnames','iohid,employeeid,employeename_c,dateandtime,statusname');
					$consumers->post('whereclause','[timestamp,>,'.$duration['from'].'][timestamp,<,'.$duration['to'].'][corporateid,=,'.$objCorporate->id.'][doctorid,=,'.$doctorid.']');//used for jqgrid
					$columninfosearch = '[
							{"name":"IOH Id","width":"10","index":"iohid","hidden":false},
							{"name":"Ref. no.","width":"10","index":"employeeid","hidden":false},
							{"name":"Name","width":"30","index":"employeename_c","hidden":false},
							{"name":"App. Date","width":"30","index":"dateandtime","hidden":false},
							{"name":"Status","width":"20","index":"statusname","hidden":false}
						]';
					$consumers->post('columninfo', $columninfosearch);
					$consumers->post('editbtnenable','false');
					$consumers->post('deletebtnenable','false');
					$consumers->post('savebtnenable','false');
					echo $consumers->execute(); 
				?>
			</td>
		</tr>
	</table>
  </div>  
</div>
