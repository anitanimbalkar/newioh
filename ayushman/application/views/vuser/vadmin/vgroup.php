<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js">
</script>
<script type="text/javascript">
function setlink( cellvalue, options, rowObject )
{   
	$recordid = $(rowObject).children()[5].firstChild.data;
	return '<a href="#" onclick="remove('+$recordid+');" ><font color="#220CE6">Remove</font></a>';
}
function remove($recordid)
{
	$.ajax({
	type: "get",
	url: "/ayushman/cgroup/removemember?recordid="+$recordid,
	success: function(){
		//showMessage('350','50','Message','Consumer removed from group','information',5000);
		alert("Consumer removed from group.");
		$("#btnsearch").trigger("click");  
		// function executed for reloading page
		//location.reload();
	}
	});
}
function importtransactions(file)
{
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    $("#submit").trigger("click");   
}

function importmembers(file)
{
	if(document.getElementById("groupidforreg").value != "")
	{
		document.getElementById("lblregerror").style.display = "none";
		ext = (file.value).split('.');
		$("#submitforreg").trigger("click");   
	}
	else
	{
		alert ("Please select group for Registration");
	}
}
  
  $(document).ready(function(){
	//parent.setIframeHeight(document.getElementById('icontent'));
    if($.trim($('#errorlistdiv').html()) != "")
      showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
    if($.trim($('#messagelistdiv').html()) != "")
    {
      showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
    }
  });
</script>

<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;">  
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td> Bulk Registration in group</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
	<tr>
      <td width="20%"style="padding:4px" >
        <form action="">
          <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cgroup/downloadregistrationformat'" title="Download format file for bulk registration"/>          
        </form>
      </td>
	  <form id="registerform" method="post" enctype="multipart/form-data" action="/ayushman/cgroup/registermembers" >
	  <td align="center" valign="center" width="40%" class="bodytext_normal"style="padding-top: 6px;padding-bottom: 10px">&nbsp;Select Group: 
			<select style="float:right;margin-right:20px;width:145px;height:20px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="groupidforreg"  id="groupidforreg" title="Please select discount group"> 
			<?PHP  
				print "<option class='bodytext_normal'  \" value=\"\">Select</option>";
					
				foreach ($discgroups as $discgroup) {
					if($selectedgroup == $discgroup->id)
						print "<option class='bodytext_normal' selected \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
					else
						print "<option class='bodytext_normal'  \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
				}
			?>
			</select>
	  </td>
	  <td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">
          Upload Excel File
          <input type="file" name="regfile" id="regfile" value="Choose File" onchange="importmembers(this)" class="bodytext_normal" title="Register consumers from file under selected group"/>
          <label class="bodytext_normal"></label>
          <label id="lblregerror" style="display:none;" class="bodytext_error">
            Import members in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </label>
          <input type="submit" name="submitforreg" id="submitforreg" style="display:none;" value="upload"/>
      </td>
	  </form>
	</tr>
	</table>

  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td> Bulk Association to group</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
	<tr>
      <td width="20%"style="padding:4px" >
        <form action="">
          <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cgroup/download'" title="Download format file for bulk association"/>          
        </form>
      </td>
	  <form id="catalogform" method="post" enctype="multipart/form-data" action="/ayushman/cgroup/addmembers" >
	  <td align="center" valign="center" width="40%" class="bodytext_normal"style="padding-top: 6px;padding-bottom: 10px">&nbsp;Select Group: 
			<select style="float:right;margin-right:20px;width:145px;height:20px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="groupid"  id="groupid" title="Please select discount group"> 
			<?PHP  
				print "<option class='bodytext_normal'  \" value=\"\">Select</option>";
					
				foreach ($discgroups as $discgroup) {
					if($selectedgroup == $discgroup->id)
						print "<option class='bodytext_normal' selected \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
					else
						print "<option class='bodytext_normal'  \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
				}
			?>
			</select>
	  </td>
	  <td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">
          Upload Excel File
          <input type="file" name="zip_file" id="file" value="Choose File" onchange="importtransactions(this)" class="bodytext_normal" title="Attach consumers from file to selected group"/>
          <label class="bodytext_normal"></label>
          <label id="lblimageerror" style="display:none;" class="bodytext_error">
            Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </label>
          <input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
      </td>
	  </form>
	</tr>
	</table>
   
   <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              Group Members
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <div style="width:828px;height: 700px; overflow-x:hidden;" > 
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		<tr>
			<td>
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/cgroup/searchMembers">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="button" width="100px" class="button" style="margin-left:10px;" onclick="window.location.href='/ayushman/cgroup/managegroup'" value= "     Add/Delete Groups    "/></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="button" width="100px" class="button" style="margin-left:10px;" onclick="window.location.href='/ayushman/cgroup/searchandadd'" value="Search and Add Consumers"/></td>
							<td  width="20%" align="right" valign = "bottom" class="bodytext_bold" >Search :</td>
							<td  width="20%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" placeholder="Consumer name" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
							<td  width="10%" align="left" style="padding-top:20px">&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" style="border:none;margin-top:5px;margin-right:10px;margin-left:10px;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value=""/></td>
							<td  width="20%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="button" width="100px" class="button" style="margin-left:50px;" onclick="window.location.href='/ayushman/cgroup/export'" value= "       Export       "/></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<div style="width:100%;">
		<?php
			$discmembers= Request::factory('xjqgridcomponent/index');
			$discmembers->post('name','alldiscountmember');
			$discmembers->post('height','600');
			$discmembers->post('width','815');
			$discmembers->post('sortname','groupname','consumername');
			$discmembers->post('sortorder','asc');
			$discmembers->post('tablename','alldiscountmember');//used for jqgrid
			$discmembers->post('columnnames', 'groupname,cnameandid,userid,patientid,groupid,recordid');//used for jqgrid
			$discmembers->post('whereclause',$whereclause);//used for jqgrid
			$columninfo = '[
							{"name":"Group","index":"groupname","width":30,"align":"left","hidden":false},
							{"name":"Consumer Name","index":"cnameandid","width":30,"align":"left","hidden":false},
							{"name":"Action","index":"patientid","width":30,"formatter":setlink}
							]';			
			$discmembers->post('columninfo', $columninfo);
			//if save,edit,delete we dont want in jqgrid set it to false
			$discmembers->post('editbtnenable','false');
			$discmembers->post('deletebtnenable','false');
			$discmembers->post('savebtnenable','false');
			$discmembers->post('shrinkToFit', 'true');
			$discmembers->post('autowidth', 'true');
			echo $discmembers->execute(); ?>
	</div>

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
