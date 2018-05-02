<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<div style="width:810px;height:auto; vertical-align:middle;padding:7px;margin:3px; overflow-x:hidden;" class="Heading_Bg"> 
	&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Package
</div>
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
<?php 
	$helper_package = new helper_Package();
	$package = $helper_package->get_info($packageid);

?>
<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:inherit;"  >	
		<div style="height:auto;width:798px;float:left;padding:7px;">
			<span class="bodytext_normal"></span><span class="bodytext_bold"><?php echo $package['name_c']; ?>&nbsp;( <?php if($package['publishto_c'] == 8){ echo 'Published for corporates';}else{echo 'Published for Individual Users';} ?>)</span><a href="#" onclick=window.location="/ayushman/cpackageform/edit?id=<?php echo $packageid; ?>" style="margin:5px;"><span style="color:blue">Edit Package</span></a>
		</div>
		<div style="height:auto;width:798px;float:left;padding-left:7px;padding-right:7px;">
			<hr/>
		</div>
		<div style="height:auto;width:798px;float:left;padding:7px;">
			<span class="bodytext_bold"><?php echo $package['description_c']; ?></span>
		</div>
	</div>
</div>
<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:100%;" >	
		<table width="100%">
			<?php 
				$helper_package = new helper_Package();
				$result = $helper_package->get_subscribers($packageid);
				$isallowedtobook = $helper_package->isAllowedToBook($packageid);
				echo "<tr  class='Heading_Bg'>";
				echo '<td width="5%" align="left" style="padding:5px;" >#</td>
					<td width="95%" align="left" style="padding:5px;" >Package Subscribers</td>';
				echo "</tr>";
				
				if(count($result) == 0){
				  echo '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No one has subscribed to this package.</div></td></tr>';
				}else{
					for($i=0;$i<count($result);$i++){
						if($i%2 == 0 ){
							echo "<tr>";
						}else{
							echo "<tr style = 'background-color:#ecf8fb;'>";
						}
						$link = '';
						if($isallowedtobook){
							$link = '<span style="float:right"> <a href="#" onclick=window.location="/ayushman/cpackage/bookcamp?id='.$result[$i]->packageid_c.'&userid='.$result[$i]->userid_c.'" ><span style="color:blue">Book A Camp</span></a></span>';
							echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
								<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.$link.'</td>';
								
							echo "</tr>";
							if($i%2 != 0 ){
								echo "<tr style = 'background-color:#ecf8fb;'>";
							}else{
								echo "<tr>";
							}
							echo '<td  style = "background-color:transparent;">&nbsp;</td><td colspan="3">';
								echo '<table style="width:100%;border:1px solid #c6dbe4;">';
								
								
								$result1 = $helper_package->get_bookings($result[$i]->packageid_c,$result[$i]->userid_c);
							
								if(count($result1) == 0){
								}else{
									for($j=0;$j<count($result1);$j++){
										if($i%2 == 0 ){
											echo "<tr>";
										}else{
											echo "<tr style = 'background-color:#ecf8fb;'>";
										}
										echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">&nbsp;</td>
											<td width="95%" align="left" style="padding:5px;" class="bodytext_bold"><span style="float:left;width:30%;" class="bodytext_bold">'.$result1[$j]->name_c.'</span><span style="float:center;width:30%" class="bodytext_bold">Date: '.$result1[$j]->date_c.'</span><span style="float:right;width:30%" class="bodytext_bold"><a href="#" onclick=window.location="/ayushman/cpackage/administratebooking?id='.$result1[$j]->id.'" style="float:right;"><span style="color:blue">Administrate</span></a> <a href="#" onclick=window.location="/ayushman/cpackage/editbooking?id='.$result1[$j]->id.'" style="float:right;"><span style="color:blue">Edit</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;</a></span></td>';
										echo "</tr>";
									}
								}
							echo '</table>';
							echo '</td></tr>';
						}else{
							$link = '<span style="float:right"> <a href="#" onclick=window.location="/ayushman/cpackage/administrate?id='.$result[$i]->packageid_c.'&userid='.$result[$i]->userid_c.'" ><span style="color:blue">Administrate</span></a></span>';
							echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
								<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.$link.'</td>';
								
							echo "</tr>";
						}
				  }
				}
			?>
		</table>
	</div>
</div>

<div style="background-color: #ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:819px;height:auto; vertical-align:middle;padding:2px;margin:3px; overflow-x:hidden;">
	<input type="button" value="Back" onclick="window.location = '<?php $session = Session::instance();	$back = $session->get('backurls');echo $back[count($back)-2]; ?>'" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>