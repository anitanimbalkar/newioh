<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function showdetails(url){
		parent.parent.openDialog(url,800,'auto');
	}
</script>
<div style="width:inherit;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:100%;" >	
		<table width="100%">
			<?php 
				echo $serviceProviderList;
			?>
		</table>
		<table style="width:100%" class="bodytext_bold">
			<tr>
				<td height="25" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;padding-top:3px;padding-bottom:3px;">&nbsp;<?php echo $numbers; ?>
				</td>
			</tr>	
		</table>
	</div>
</div>
