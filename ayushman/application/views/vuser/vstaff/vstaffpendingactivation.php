<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script>
	function acceptInvitation(doctorid)
	{
		$.ajax({
		  url: "/ayushman/cstaffpendingactivation/accept?doctorid="+doctorid,
			success: function( data ) {
				window.location = "/ayushman/cstaffpendingactivation/view";
			},
			error : function(){alert("error while getting complete data for edit");}
		});
	}
	
	function rejectInvitation(doctorid)
	{
		$.ajax({
		  url: "/ayushman/cstaffpendingactivation/reject?doctorid="+doctorid,
			success: function( data ) {
				window.location = "/ayushman/cstaffpendingactivation/view";
			},
			error : function(){alert("error while getting complete data for edit");}
		});
	}
</script>
<div  style="width:828px;height:560px;" > 
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%" >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Pending Activation</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:10px;">
			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					
					<tr>
						<td height="auto" colspan="4" align="left" valign="middle" >
							<?php
								$objstaff = ORM::factory('favoritestaffbydoctordetail')->where('staffuserid','=',Auth::instance()->get_user()->id)->where('status','=','pending')->find_all()->as_array();
								$message = 'No pending activation';
								if(count($objstaff) == 0){
									echo '<div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:2px;height:20px;vertical-align:left;" align="center" class="bodytext_bold" >'.$message.'</div>';
								}else{
									echo '<div width="100%" height="auto" ><ul id="navlist">';
									foreach($objstaff as $staff)
									{
										echo '<li name="listitems" style="margin-top:5px;" >';
										$staffList= Request::factory('cdoctorcomponent/pendingactivation');
										$staffList->post("height",'25');
										$staffList->post("width",'800');
										$staffList->post("doctorid",$staff->doctorid);
										echo $staffList->execute(); 
										echo '</li>';
									}
									echo '</ul></div>';
								}
							?>			
						</td>
					</tr>
					<tr >	
						<td height="10">&nbsp;<input type="hidden" id="removestaffid" />
						</td>		
					</tr>

					<tr>
						<td height="25" colspan="4" align="left" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-left:10px;">
							Total Number of doctor : <?php echo count($objstaff); ?>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</div>