<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<?php 
		foreach($categories as $category=>$menus){
			echo '<tr>
				<td align="left" valign="top">
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
						<tr>
							<td class="Heading_Bg"><img src="/ayushman/assets/images/Notifications_Icon.png" width="15" height="15" align="top" />&nbsp;&nbsp;<strong>'.$category.'</strong> </td>
						</tr>';
							foreach($menus as $menu){
								echo '<tr>
									<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;">'.$menu.'</td>
								</tr>';
							}
					echo '</table>
				</td>
			</tr>';
		}
		?>
	</table>

