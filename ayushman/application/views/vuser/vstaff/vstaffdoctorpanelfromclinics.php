<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<div height="500px">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td>
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Take Appointment - Choose a Doctor</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
							<?php
								$objDoctors = ORM::factory('doctorpanelbystaffdetail')->where('staffuserid','=',Auth::instance()->get_user()->id);
								$objDoctors = $objDoctors->find_all()->as_array();
								if(count($objDoctors) == 0){
									$message = "No Doctors Found";
									echo '<div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:2px;height:20px;vertical-align:left;" align="center" class="bodytext_bold" >'.$message.'</div>';
								}else{
									echo '<div width="100%" height="auto" style="white-space: wrap;"><ul id="navlist">';
									foreach($objDoctors as $doctor){
										echo '<li name="listitems" style="margin-top:5px;" >';
										$doctorList= Request::factory('cdoctorcomponent/view');
										$doctorList->post("height",'25');
										$doctorList->post("width",'800');
										$doctorList->post("doctor",$doctor);
										echo $doctorList->execute(); 
										echo '</li>';
									}
									echo '</ul></div>';
								}
							?>			
						</td>
					</tr>
					<tr ><td height="10"></td></tr>
					<tr><td height="25" colspan="4" align="left" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-left:10px;">Total Number of doctors : <?php echo count($objDoctors); ?></td></tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</div>
