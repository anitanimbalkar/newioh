<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<div  id="diveditdrug" class="content_bg" style=" width:100%; height:93%;overflow:auto;" align="center" > 
	<table id="editdrugtable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
	 <form id="bill" action ="/ayushman/cmasterdatavalidation/saveandapprovedrugdetails" method="post">
		<tr>
			<td colspan="3" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;
			Drug Details</td>
		</tr>
		
				
		<tr>
			<td width="35%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Brand Name: &nbsp;&nbsp;&nbsp;<input name="Brandname" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->DrugName_c); ?>"/></td>
			
			<td width="32%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Generic Name:&nbsp;&nbsp;&nbsp;<input name="Genericname" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->drugGenericName_c); ?>"/></td>
			
		</tr>
		<tr>
			<td width="35%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Package:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Packageunit" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->packageunit_c); ?>"/></td>

			<td width="32%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Priceperpackageunit" pattern="[0-9]{0,6}.[0-9]{0,2}" style= "width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->priceperpackageunit_c); ?>"/></td>
			
		</tr>
		<tr>
			<td width="35%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Min Order:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Minorderunit" pattern="[0-9]{0,3}"style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->minorderunit_c); ?>"/></td>

			<td width="32%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Priceperminorderunit" pattern="[0-9]{0,6}.[0-9]{0,2}" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->priceperminorderunit_c); ?>"/></td>
			
		</tr>
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">System:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="system" style=" width:57.5%;border:none; border-bottom:1px solid;"value=""/></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="category" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->drugCategory_c); ?>"/></td>
		</tr>
		
		<tr>
			
			
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">form:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="form" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->drugForm_c);?>"/></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">strength:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="strength" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->drugStrength_c); ?>"/></td>
		</tr>
		
		<tr>
			
			
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Dosage:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Dosage" style=" width:57.5%;border:none; border-bottom:1px solid;"value=""/></td></td>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Instructions:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Instructions" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objdrug->modeOfIntake_c); ?>"/></td>
		</tr>
		<tr><td height="2" colspan="3" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
		<tr>
			
			
			<td align="left" style="padding-left:10px;" class="bodytext_bold">Side Effects: &nbsp;</td>
			<td align="left" style="padding-left:10px;" class="bodytext_bold"><textarea id="sideeffects" name="sideeffects" rows="4" cols="50"><?php echo($objdrug->sideEffects_c) ?></textarea></td>
			
		</tr>
		<tr><td height="2" colspan="3" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
		<tr>
			
			
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Cautions:</td>
			<td align="left" style="padding-left:10px;" class="bodytext_bold"><textarea id="caution" name="caution" rows="4" cols="50"><?php echo($objdrug->cautions_c) ?></textarea></td>
			<input type="hidden" id="id"  name="id" value="<?php echo trim($objdrug->id); ?>" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
		</tr>
		<tr><td height="2" colspan="3" align="left" style="padding-left:10px;padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
			
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr>
				<td colspan="2" style="padding-left:10px;padding-top:10px" class="bodytext_normal">
					<input type="submit" class="button" height="22" style="width: 150px; height: 25px; " value="Save & Approve" onclick="$('#bill').submit();"/>
				</td>
		</tr>
		</form>
		
	</table>
</div>

