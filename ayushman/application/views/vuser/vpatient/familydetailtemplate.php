<script type="text/javascript">
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + "= " + obj[i] + " \n ";
    }
    alert(out);
}
function getieversion()
{
	var nAgt = navigator.userAgent;
	var ieversion="";
	verOffset=nAgt.indexOf("MSIE");
	fullVersion = nAgt.substring(verOffset+5);
	fullVersion = fullVersion.split(';');
	ieversion = fullVersion[0];
	return ieversion;
}
function <?= $xjqgridname?>savedata(button)
{
	ieversion = getieversion()	;
	 if ((verOffset=nAgt.indexOf("MSIE"))!=-1 && (ieversion <='8.0')) 
	 {
	 	elements = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[0].getElementsByTagName('input');
		relationele = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[0].getElementsByTagName('select');
	 }	
	 else
	 {
	 	elements = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].getElementsByTagName('input');	
		relationele = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].getElementsByTagName('select');
	 }
	data = new Array;
	k=0;
	
	for(i=0;i<elements.length;i++)
	 {
	 	fieldtype = elements[i].type.toLowerCase();
		if(elements[i].name !='')
		{
			data[k] =new Array;			
			data[k][0] = elements[i].name;
			data[k][1] = elements[i].value;
			k++;
		}
	 }
	 
	 k=0; 
	 var relationflag = true;
	 for(j=0;j<relationele.length;j++)
	 {
	 	
		selectedval= $(relationele[j]).val();
	 	if(selectedval != '')	
		{
			data.push([relationele[j].name,relationele[j].value]);
			relationflag = true;
			break;
		}			
		else
		{
			relationflag = false;
		}
	 }
	
	 arr = JSON.stringify(data);
	if(relationflag) 
	{
		$.ajax({
			url: '/ayushman/cpatienthistory/savepatientrelative?userid=<?= $userid;?>&arrdata='+arr+'&patientid=<?= $patientid?>&patrelativeid=<?= $patrelativeid?>',
			type:'POST',
			success:  function(data) 
			{
			 	patrelativeid = data;
				 $.ajax({
				url: '/ayushman/cpatienthistory/savepatientrelativeillness?patrelativeid='+patrelativeid+'&patientid=<?= $patientid?>&tmppatrelid=<?= $patrelativeid?>',
				type:'POST',
				success:  function(data) 
				{
			
					var target = document.getElementById("familymembercontainer");
									var newFrame = document.createElement("iframe");
									newFrame.setAttribute("id","iframefamilymemeberdtls");
									newFrame.setAttribute("src", window.location.protocol +"//"+ window.location.host +'/ayushman/cpatienthistory/addnewfamilydtls?userid=<?= $userid; ?>&viewnm=patientrelativeillness&tablename=patientrelativepastillnesses&xjqgridname=patrelativeillness'+patrelativeid+'&patientid=<?=$patientid; ?>&patrelativeid='+patrelativeid);							
									newFrame.style.width = 748+"px"; 
		   							newFrame.style.height = 285+"px"; 
		   							newFrame.frameBorder = "0";
									newFrame.scrolling ="no";
		   							newFrame.setAttribute("frameBorder", "0");
									target.appendChild(newFrame);
									var f= document.getElementById("iframefamilymemeberdtls");
									
									for(i=0;i<elements.length;i++)
									{
									 	fieldtype = elements[i].type.toLowerCase();
										if(elements[i].name !='')
										{	
											elements[i].value="";
										}
									 }
									 for(j=0;j<relationele.length;j++)
									 {
										relationele[j].selectedIndex = "";
									 }
				 					$("#<?= $xjqgridname?>list").trigger("reloadGrid");
				},
				error : function(){alert("error while saving patient relative illness ");}		
				});
			},
			error : function(){alert("error while saving patient relative ");}		
		});
	}
	else
	{
		alert("Please select relation of family member");
	}
		
	
}
var ieversion;
function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}
function <?= $xjqgridname?>saveediteddata(button)
{
	ieversion = getieversion();
	 if(ieversion <='8.0')
	 {
	 	elements = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[0].getElementsByTagName('input');
		relationele = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[0].getElementsByTagName('select');
	 }
	
	 else
	 {
	 	elements = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].getElementsByTagName('input');	
		relationele = button.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[1].getElementsByTagName('select');
	 }
	
	
	data = new Array;
	k=0;
	
	for(i=0;i<elements.length;i++)
	 {
	 	fieldtype = elements[i].type.toLowerCase();
		if(elements[i].name !='')
		{				
			data[k] =new Array;			
			data[k][0] = elements[i].name;
			data[k][1] = elements[i].value;
			k++;
		}
	 }
	 relationflag = true;
	 for(j=0;j<relationele.length;j++)
	 {
	 	selectedval= $(relationele[j]).val();
	 	if(selectedval != '')	
		{
			data.push([relationele[j].name,relationele[j].value]);
			relationflag = true;
		}						
		else
		{
			relationflag = false;
		}
		
	 }
	  arr = JSON.stringify(data);
	  if(relationflag)
	  {
	  	$.ajax({
			url: '/ayushman/cpatienthistory/editfamilymemberdetails?arrdata='+arr+'&patrelativeid=<?= $patrelativeid?>',
			type:'POST',
			success:  function(data) {
			},
			error : function(){alert("error while edititng family member details ");}		
		});
	  }
	  else
	  {
	  	alert("Please select relation of family member");
	  }	
}
var nAgt = navigator.userAgent;
var ieversion="";
function showtextbox(check)
	{
		if ((verOffset=nAgt.indexOf("MSIE"))!=-1) 
		{
			 fullVersion = nAgt.substring(verOffset+5);
			 fullVersion = fullVersion.split(';');
			 ieversion = fullVersion[0];
			if(ieversion <='8.0')
			{	
				if (check.checked == true )	
				{
					check.parentNode.parentNode.childNodes[2].childNodes[0];				
					check.parentNode.parentNode.childNodes[2].childNodes[0].style.visibility = "visible";
					
				}	
				else
					check.parentNode.parentNode.childNodes[2].childNodes[0].style.visibility = "hidden";
			}
			
		}
		else  
		{
			
			if (check.checked == true )	
			{
				check.parentNode.parentNode.childNodes[5].childNodes[1].style.visibility = "visible";
			}	
			else
				check.parentNode.parentNode.childNodes[5].childNodes[1].style.visibility = "hidden";
		}	
	}

// border:1px solid #BEB1A7;
</script>
<div id="divfamilidtls<?= $xjqgridname?>" style="width:748px;height:285px;padding-top:5px; border:0px solid #BEB1A7; background-color:#cecece; border-radius:5px 5px 5px 5px;" >
	<div>
		<table class="bodytext" >
			<tr>
				<td colspan="4">
					<?php if(strcmp( $operation,"add") ==0){  ?><label><b>Enter Details : </b></label> <?php } ?><?php if(strcmp( $operation,"edit") ==0){  ?><label><b>Details Of  </b></label> <?php } ?><b><?= $patrelative->firstname_c?></b>
				</td>
			</tr>
			<tr>
				<td>
					<tr  height="20" style="vertical-align:top;" >
						<td width="50"><label>Name </label></td> 
						<td width="140" valign="top">  <input type="text" name="firstname_c" value="<?= $patrelative->firstname_c?>" /></td>
						<td  width="60"><label>Relationship </label></td> <td width="90">  <select class="input" id="<?= $xjqgridname?>refpatrelrelationshipid_c" name="refpatrelrelationshipid_c"  style="text-indent:0; font-size: 10px;" align=left"  > 	
							<option selected="" ></option> 
							<?PHP  
										foreach ($relations as $key=> $relation) { 		
										if(strcmp( $key ,$patrelative->refpatrelrelationshipid_c)==0)
										{
											echo $_SERVER['HTTP_USER_AGENT'];
											
											print "<option  \" value=\"{$key}\" \" selected=\"selected\">{$relation}</option>";
											
										}								   										 	
										else
											print "<option  \" value=\"{$key}\">{$relation}</option>";
										} 
								?>
								</select>
						</td>
						<td width="60"><label>Age</label></td> 
						<td  width="40" valign="top">  <input type="text" style="width:40px;" name="age_c" value="<?= $patrelative->age_c?>" /></td> 
						<td width="40"><label>as on </label></td> 
						<td width="80" valign="top"><input type="text" name="ason_c" value="<?= $patrelative->ason_c?>" /></td>
					</tr>
					<tr>
						<td><label>If Dead</label></td>
						<td><input type="checkbox" value="true" id="chkdead" onchange="showtextbox(this)"/> </td>
						<td height="25" colspan="6" style="">
						 	<span  id="deathdetails"  style="visibility:hidden;display:block;">
							<label> Age at death </label><input type="text" style="width:68px;" name="ageatdeath_c" value="<?= $patrelative->ageatdeath_c?>" />
							<label>Cause of death </label><input type="text" name="causeofdeath_c" value="<?= $patrelative->causeofdeath_c?>" />&nbsp;
							</span> 
						</td>
					</tr>
				</td> 
			</tr>
		</table>
	</div >
	<table>
		<tr>
			<td colspan="4" style="font-size:11px;">
				<?php	
						$patjqgridrequest= Request::factory('cfamilygrid/showgrid');
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
					<input type="button"   height="22" style="width: 80px; height: 25px; margin-left:3px; font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif; " value="Save" onclick="<?= $xjqgridname?>saveediteddata(this)"/> 
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td>
			</td> 
		</tr>
	</table>
</div>