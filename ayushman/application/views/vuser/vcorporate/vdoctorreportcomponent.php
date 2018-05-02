<link href="<?php echo $pageURL; ?>/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

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
  <div  style="width:99%; float:left; padding-left:0px; line-height:17px;  border-bottom:1px solid #b5d5e3;width:100%;background-color:#ecf8fb;" >
	
    <div style='width:%;float:left;border-right:1px solid #b5d5e3;height:auto;'>
      <img src="<?php if($objUserForDoctor->photo_c){echo $pageURL.$objUserForDoctor->photo_c;} else {echo $pageURL.'/ayushman/assets/userphotos/userphoto.png';}?>" style='heigth:50px;width:50px;' />
    </div>
    <div  style="width:93%; float:left;padding-top:5px;height:auto;" class="bodytext_bold">
		<table style="width:99%;">
			<tr>
				<td style="width:30%;height:auto;">
					<div>
						Name : <?php echo 'Dr. '.$objUserForDoctor->Firstname_c.' '.$objUserForDoctor->lastname_c; ?><br>
						Mob. No.: <?php echo $objUserForDoctor->isdmobileno1_c.'-'.$objUserForDoctor->mobileno1_c; ?> 
					</div>
				</td>
				<td>
					<div>
						No. Of Appointments given : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											
											echo $totalappointments;				
											
									?> 
						&nbsp;&nbsp;&nbsp;&nbsp;
						No. Of Appointments Completed : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','1')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;			
											
									?> &nbsp;&nbsp;&nbsp;&nbsp;
						</div>
						<br>
						<div>
						
						No. Of No Show Appointments : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','5')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;				
											
									?> 
						No. Of Pending Appointments : <?php 
											$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
											$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('status','=','2')->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->count_all();
											echo $totalappointments;				
											
									?> 
						
					</div>
				</td>
			</tr>
		</table>
    </div>
  </div>
  <div  style='clear:both'>
  </div>
  <div id='<?php  echo $doctorid; ?>' style='align:center;' class="consumerdetails" >
	<table width="99.5%" border="0" cellspacing="0">
		<tr>
			<td style="width:10%;">
			</td>
			<td class="bodytext_bold" style="width:80%;">
				<?php
					
					$str = '<table width="100%">';
					$objCorporate = ORM::factory('corporate')->where('refusersid_c','=',$corporateuserid)->find();
					$totalappointments = ORM::factory('getappcountbydoctor')->where('corporateid','=',$objCorporate->id)->where('doctorid','=',$doctorid)->where('timestamp','>',$duration['from'])->where('timestamp','<',$duration['to'])->find_all();
					$str = $str.'<tr >
										<td width="10%" >
											IOH Id
										</td>
										<td width="25%" >
											Ref. No.
										</td>
										<td width="25%" >
											Name
										</td>
										<td width="15"  >
											App. Date And Time.
										</td>
										<td width="15"  >
											Status
										</td>
							</tr>';
					foreach($totalappointments as $appointment){
						$str = $str.'<tr>
										<td  >
											'.$appointment->iohid.'
										</td>
										<td  >
											'.$appointment->employeeid.'
										</td>
										<td  >
											'.$appointment->employeename_c.'
										</td>
										<td  >
											'.$appointment->dateandtime.'
										</td>
										<td  >
											'.$appointment->statusname.'
										</td>
							</tr>';
					}
					$str = $str.'</table>';
						echo $str;
				
				?>
			</td>
		</tr>
	</table>
  </div>  
</div>
