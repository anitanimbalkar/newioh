<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">

<div style="width:98%;height:auto; vertical-align:middle;padding:3px;overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<table width="100%">
		<?php 
			$result = $appointmentslist['data'];
			$viewResult = '<tr class="Heading_Bg"><td align="left" style="padding:5px;" >#</td>
							<td align="left" style="padding:5px;" >Patient Name</td>	
							<td align="middle" style="padding:5px;" >Date And Time</td></tr>';
			if(count($result) == 0){
			  $viewResult .=  '<tr><td colspan="4"><div style="width:99%; border-radius:5px;border: 3px solid #eee; padding-top:1px;height:20px;vertical-align:middle;margin:1px;" align="center" class="bodytext_bold" >No packages found.</div></td></tr>';
			}else{
				for($i=count($result)-1;$i>=0;$i--){
					if($i%2 != 0 ){
						$viewResult .= "<tr style = 'background-color:#ecf8fb;'>";
					}else{
						$viewResult .= "<tr>";
					}
					$viewResult .= '<td align="left" style="padding:5px;" class="bodytext_bold" >'.$i.'</td>
							<td align="left" style="padding:5px;" class="bodytext_bold">'.$result[$i]->patientname.'</td>	
							<td align="middle" style="padding:5px;" class="bodytext_bold">'.$result[$i]->time.'</td>';	
					$viewResult .= "</tr>";
				}
			}
			echo $viewResult;
		?>
	</table>
	<table style="width:100%" class="bodytext_bold">
		<tr>
			<td height="25" bgcolor="#ecf8fb" style="border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; padding-left:10px;padding-top:3px;padding-bottom:3px;">Total Number of appointments :&nbsp;<?php echo count($result); ?>
			</td>
		</tr>	
	</table>
</div>
