<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/openmeetings_functions.js"></script>

<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
		
<style>
#iframefamilymemeberdtls
{
	
}
</style>		
<script type="text/javascript">
function showtextbox(check)
	{
		if (check.checked == true )		
			document.getElementById("deathdetails").style.visibility = "visible";				
		else
			document.getElementById("deathdetails").style.visibility = "hidden";			
	}


function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }
    alert(out);
}
// border:1px solid #BEB1A7;
</script>
<div id="divfamilidtls<?= $xjqgridname?>" style="width:748px;height:285px; border:0px solid #BEB1A7; border-radius:5px 5px 5px 5px;" >
	<div >
		<table>
			<tr class="text" align="left" >
				<td colspan="4">
					<?php if(strcmp( $operation,"add") ==0){  ?><label><b>Enter Details : </b></label> <?php } ?><?php if(strcmp( $operation,"edit") ==0){  ?><label><b>Details Of  </b></label> <?php } ?><b><?= $patrelative->firstname_c?></b>
				</td>
			</tr>
			<tr>
				<td>
					<tr class="text" height="20" style="vertical-align:top;" >
						<td width="50px" align="left">
							<label>Name </label>
						</td> 
						<td width="100px" valign="top" align="left">:<label><?= $patrelative->firstname_c?></label>
						</td>
						<td  width="20" align="left"><label>Relationship </label></td> <td width="100px" align="left">:
							<?PHP  
									foreach ($relations as $key=> $relation) { 		
									if(strcmp( $key ,$patrelative->refpatrelrelationshipid_c)==0)	
										print '<label>'.$relation.'</label>';
									}
								?>
						</td>
						<td width="20" align="left">
							<label>Age</label>
						</td> 
						<td  width="100px" valign="top" align="left">:<label><?= $patrelative->age_c?></label>
						</td> 
						<td width="50px" align="left">
							<label>As On </label>
						</td> 
						<td width="100px" align="left" valign="top">:<label><?= $patrelative->ason_c?></label>
						</td>
					</tr>
					<tr class="text">
						<td width="30px" align="left"><label width="100px">If Dead</label></td> <td align="left"><input type="checkbox" value="true" id="chkdead" disabled="true" onchange="showtextbox(this)"/> </td>
						<td height="25" colspan="6" style="" align="left">
						 <span  id="deathdetails"  style="visibility:hidden;">
							<label> Age at death </label><input type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;" style="width:68px;" name="ageatdeath_c" value="<?= $patrelative->ageatdeath_c?>" >
							<label>Cause of death </label><input type="text" readonly="readonly" style="background: transparent;border:none;font-weight:bold;" name="causeofdeath_c" value="<?= $patrelative->causeofdeath_c?>" >&nbsp;
						</span> </td>
					</tr>
				</td> 
			</tr>
		</table>
	</div >
	<table>
		<tr>
			<td colspan="4" style="font-size:11px;">
				<?php	
				$patjqgridrequest= Request::factory('cfamilygrid/showreadonlygrid');
				$patjqgridrequest->post('xjqgridname',$xjqgridname);
				$patjqgridrequest->post('tablename',$tablename);
				$patjqgridrequest->post('patrelativeid',$patrelativeid);
				$patjqgridrequest->post('patientid',$patientid);
				$patjqgridrequest->post('userid',$userid);
				$patjqgridrequest->post('viewnm',$viewnm);
				
				echo $patjqgridrequest->execute();

				?>
			</td> 
		</tr>
		<tr>
			<td align="left" colspan="4">
				<?php if(strcmp( $operation,"add") ==0){  ?>
				<input type="button"   height="22" style="width: 80px; height: 25px;margin-left:3px; font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;  " value="Save" onclick="<?= $xjqgridname?>savedata(this)"/> 
				<?php } ?>
				<?php if(strcmp( $operation,"edit") ==0){  ?>
				<input type="button"   height="22" style="width: 80px; height: 25px; margin-left:3px; font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;display:none; " value="Save" onclick="<?= $xjqgridname?>saveediteddata(this)"/> 
				<?php } ?>


			</td> 
		</tr>
	</table>
</div>