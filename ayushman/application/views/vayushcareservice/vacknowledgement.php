<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css" />
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
			showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
	});
	function showtextbox(){
		if($("#city option:selected").text() != 'Pune'){
			$('#emailid').show();
			//$('#acknowledgement').show();
			if($("#city option:selected").text() == 'Other'){
				$('#citytext').show();
			}
			else
			{
				$('#citytext').hide();
			}
		}else{
			$('#emailid').hide();
		}
	}
	function redirect(){
		if($("#city option:selected").text() != 'Pune'){
			var email = new LiveValidation('email');
			email.add( Validate.Presence );
			email.add( Validate.Email );
			if($("#city option:selected").text() == 'Other'){
				var citytext = new LiveValidation('citytextbox');
				citytext.add( Validate.Presence );
			}
			else{}
			$("#registrationform").submit()
		}else{
			location.href = '/ayushman/cregistrar/view?isayushcare=true';
		}
	}
</script>

<div  style="width:970px; height:auto;border:1; align:left;" > 
	<form class="cmxform" id="registrationform" action="/ayushman/cayushcaremanager/acknowledgenonregistereduser" method="post">
		<table border="0" cellspacing="0" cellpadding="0"  class="content_bg" style="align:left;width:950px;border:1px solid #284889;">
			<tr>
				<td colspan="4">
					<table width="100%" height="15" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" class="Heading_Bg" align="left">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;India Online Health - AyushCare Service</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left">
					<div class="table_roundBorder" style="margin-top:0px;background-color:#ecf8fb;width: 99%;margin-top:5px;">
						<div id="help-main" style="margin-left:15px;"><p class="bodytext_bold"style="font-size:12px;margin:5px;">Please select location of the person availing AyushCare Service.</p>
						</div>
					</div>
				</td>
			</tr>	
			<tr>
				<td align="left">
					<div style="margin-top:0px;width: 99%;margin-top:5px;padding:10px;">
					Location&nbsp;&nbsp;&nbsp;:  
					<select  name="city" class="textarea" style="width:147px;" id="city"  onchange='showtextbox();'>
						<?php foreach($arrCity as $city){
								if($city == 'Pune'){
									echo '<option value="'.$city.'" selected>'.$city.'</option>';
								}else{
									echo '<option value="'.$city.'">'.$city.'</option>';
								}
								
							}
							echo '<option value="other">Other</option>';
						?>
					</select>
					</div>
					<div id="citytext" style="margin-top:0px;width: 99%;margin-top:5px;padding:10px;display:none;">
						City name: <input id="citytextbox" style="width:147px;" name="othercity_c" class="textarea" value="" />
					</div>
					<div id="emailid" style="margin-top:0px;width: 99%;margin-top:5px;padding:10px;display:none;">
						Email id&nbsp;&nbsp;&nbsp;: <input id="email" style="width:147px;" name="emailid_c" class="textarea" value="" />
					</div>
				</td>
			</tr>	
			<tr>
				<td >
					&nbsp; 
				</td>
			</tr>	
			<tr>
				<td height="25" align="right" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-top:3px;padding-bottom:3px;padding-right:10px;">
							<input type="button" class="button" value="Cancel" style="width:100px;height:23px;" onclick="location.href='/ayushman/home/AyushCare.shtml';"/>&nbsp;<input type="button" class="button" value="Continue" style="width:100px;height:23px;" onclick="redirect();"/>
 
				</td>
			</tr>
		</table>
	</form>
</div>
 </div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'error'); ?>
	</div>
</div>
