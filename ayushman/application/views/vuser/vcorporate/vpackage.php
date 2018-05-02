<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<div style="width:810px;height:auto; vertical-align:middle;padding:7px;margin:3px; overflow-x:hidden;" class="Heading_Bg"> 
	&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Edit Package
</div>
<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:100%;" >	
		<table width="100%">
			<?php 
				$result = ORM::factory('packagesubscriber')->where('packageid_c','=',$packageid)->find_all();
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
							  echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($i+1).'</td>
								<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->Firstname_c.' '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->lastname_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Id: '.ORM::factory('user')->where('id','=',$result[$i]->userid_c)->find()->email.'<span style="float:right">(Requested a camp <a href="#" onclick=window.location="/ayushman/cpackage/bookcamp?id='.$result[$i]->id.'&userid='.$result[$i]->userid_c.'" ><span style="color:blue">Book A Camp</span>)</a></span></td>';
								
					  echo "</tr>";
					  
						 if($i%2 != 0 ){
							  echo "<tr style = 'background-color:#ecf8fb;'>";
						  }else{
							  echo "<tr>";
						  }
						echo '<td  style = "background-color:transparent;">&nbsp;</td><td colspan="3">';
							echo '<table style="width:100%;border:1px solid #c6dbe4;">';
							$result1 = ORM::factory('packagebooking')->where('packageid_c','=',$result[$i]->id)->where('userid_c','=',$result[$i]->userid_c)->find_all();
							if(count($result1) == 0){
							  echo '<tr><td colspan="2"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >User has not booked a camp.</div></td></tr>';
							}else{
							  for($j=0;$j<count($result1);$j++){
									   if($i%2 == 0 ){
											echo "<tr>";
										  }else{
											echo "<tr style = 'background-color:#ecf8fb;'>";
										  }
										  echo '<td width="5%" align="left" style="padding:5px;"  class="bodytext_bold">'.($j+1).'</td>
											<td width="95%" align="left" style="padding:5px;" class="bodytext_bold">'.$result1[$j]->name_c.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date: '.$result1[$j]->date_c.'<a href="#" onclick=window.location="/ayushman/cpackage/administratebooking?id='.$result1[$j]->id.'" style="float:right;"><span style="color:blue">Administrate</span></a> <a href="#" onclick=window.location="/ayushman/cpackage/editbooking?id='.$result1[$j]->id.'" style="float:right;"><span style="color:blue">Edit</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;</a></td>';
											
								  echo "</tr>";
							  }
							}
						echo '</table>';
						echo '</td></tr>';
				  }
				}
			?>
		</table>
	</div>
</div>

<div style="background-color: #ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:819px;height:auto; vertical-align:middle;padding:2px;margin:3px; overflow-x:hidden;">
	<input type="button" value="Back" onclick="window.location = '<?php echo $_SERVER['HTTP_REFERER']; ?>'" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
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