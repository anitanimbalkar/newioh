<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/style.css" />
<script type="text/javascript" >
	$(document).ready(function() {
		if(parent.iframeloaded != undefined)
		{
			parent.iframeloaded();
		}
	});
	function redirect()
	{
		parent.window.location.href="/ayushman/cdashboard/view";
		window.location.href="/ayushman/cdashboard/view";
	}
</script>
<div style="height:400px;vertical-align:center; align:center;" align="center">
	<div class="content_bg" style="border:1px solid #284889; height:210px;overflow:auto;overflow-x:hidden;vertical-align:center;width:670px;" align="center" >
		<table class="content_bg" width="670px" border="0" cellspacing="0" cellpadding="0">
			<tr class="Heading_Bg" align="left" style="padding-left:25px">
				<td><img src="/ayushman/assets/images/error_icon.png"/></td>
				<td colspan="2"><?php echo $message;?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2" align="left" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
						Oops!
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2" align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
					It looks like there is some problem. We are extremely sorry for the inconvenience.
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2" align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
					Please Try Again Later
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2"><hr width="100%" style="color:#11587E"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
					<strong>Team IndiaOnlineHealth</strong><br/><a>support@indiaonlinehealth.com<a>
				</td>
				<td>
					<table  class="button" align="center" height="30px" width="50px">
						<tr><td align="center" valign="center" onclick="redirect();">Home</td></tr>
					</table>
					
				</td>
			</tr>                  
		</table>
	</div>
</div>