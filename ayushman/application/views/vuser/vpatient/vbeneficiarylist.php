<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Beneficiaries</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" >
						<td width="3%" height="25" align="center" valign="middle" >&nbsp;</td>
						<td colspan="2" align="left" valign="middle" class="bodytext_bold" >&nbsp;</td>
						<td >
							<form id="searchform" method="post" enctype="multipart/form-data"  action="/ayushman/cbeneficiary/list"  >
								<table width="100%"  align="left" cellpadding="0" cellspacing="0" >
									<tr>
										<td  width="60%" align="right" class="bodytext_bold" valign="bottom">&nbsp;&nbsp;Search&nbsp;:&nbsp;</td>
										<td  width="30%" valign="bottom" ><input type="text" style="width:100%;" name="search" id="search" value="<?php if($previousvalues != null)echo $previousvalues['search']; ?>" onChange="$('#searchform').submit();" class="textarea"  /></td>
										<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit"style="height:18px; width:18px;background: url(/ayushman/assets/images/search.jpg) no-repeat;" value="" /></td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" style="padding:5px;">
							<?php
										$objBeneficiary = ORM::factory('showbeneficiary')->where('myuserid','=',Auth::instance()->get_user()->id);
										$message = '';
										if($previousvalues != null){
											if(isset($previousvalues['search']) && ($previousvalues['search'] != '') ){
												$objBeneficiary = $objBeneficiary->where('firstname','like','%'.$previousvalues["search"].'%');
												$objBeneficiary = $objBeneficiary->or_where('lastname','like','%'.$previousvalues["search"].'%');
												$objBeneficiary = $objBeneficiary->or_where('email','like','%'.$previousvalues["search"].'%');
												$objBeneficiary = $objBeneficiary->or_where('iohid','like','%'.$previousvalues["search"].'%');
												$message = 'No results found for "'.$previousvalues["search"].'". To see all records, <a onclick=parent.getcontent("/ayushman/crecharge/view"); class="bodytext_normal" href="javascript:void(0);" style="text-decoration: underline;"><font color="blue">Click here</font></a>';
											}else{
												$message = 'No records found. <a onclick=parent.getcontent("/ayushman/cbeneficiary/view"); class="bodytext_normal" href="javascript:void(0);" style="text-decoration: underline;"><font color="blue">Click here</font></a> to add beneficiary';
											}
										}else{
											$message = 'No records found. <a onclick=parent.getcontent("/ayushman/cbeneficiary/view"); class="bodytext_normal" href="javascript:void(0);" style="text-decoration: underline;"><font color="blue">Click here</font></a> to add beneficiary';
										}
									
										$objBeneficiary = $objBeneficiary->find_all()->as_array();
										echo '<div width="100%" height="170px" style="white-space: wrap;"><ul id="navlist">';

										if(count($objBeneficiary) == 0){
											
											echo '<div style="width:720px; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold" >'.$message.'</div>';
										}else{
											foreach($objBeneficiary as $beneficiary)
											{
												echo '<li name="listitems">';
												$beneficiaryList= Request::factory('cbeneficiarycomponent/view');
												$beneficiaryList->post("height",'25');
												$beneficiaryList->post("width",'800');
												$beneficiaryList->post("beneficiaryUserId",$beneficiary->iohid);
												echo $beneficiaryList->execute(); 
												echo '</li>';
											}
										}
										echo '</ul></div>';
									?>			
						</td>
					</tr>
					<tr>
						<td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;border-radius:0 0 3px 3px;">
							<input type="button" class="button" value="Back" style="width:100px;" onclick="parent.getcontent('/ayushman/crecharge/view');" />
							<input type="button" class="button" value="Add Beneficiary" style="width:150px;" onclick="parent.getcontent('/ayushman/cbeneficiary/view');" />
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>