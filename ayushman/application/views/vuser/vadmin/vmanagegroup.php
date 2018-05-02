<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js">
</script>
<script type="text/javascript">
	function setlink( cellvalue, options, rowObject )
	{   
		$groupid = $(rowObject).children()[1].firstChild.data;
		return '<a href="#" onclick="remove('+$groupid+');" ><font color="#220CE6">Remove</font></a>';
	}
	function remove($groupid)
	{   
		$.ajax({
		type: "get",
		url: "/ayushman/cgroup/removegroup?groupid="+$groupid,
		success: function(){
			//showMessage('350','50','Message','Group removed','information',5000);
			window.location.reload();
			alert("Group removed");
		}
	  });
	}	
	function addgroup()
	{   
		$gname = document.getElementById("groupname").value;
		if(($gname=="")||($gname==" "))
			//showMessage('350','50','Message','Enter name','information',2000);
			alert("Enter name");
		else
		$.ajax({
		type: "get",
		url: "/ayushman/cgroup/addgroup?groupname="+$gname,
		success: function(){
			//showMessage('350','50','Message','Group added','information',5000);
			window.location.reload();
			alert("Group added");
		}
	  });
	}
$(document).ready(function(){
  });
</script>

<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;">     
   <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
        		<font size="2" color="white">Groups</font>
            </td>
			<td>
				<!--<a style="float:right;padding-top:5px;padding-right:10px" href="/ayushman/cgroup/view">
					<font size="3" color="white">Back</font>
				</a>-->
				<a style="float:right;" href="/ayushman/cgroup/view">
					<img src="/ayushman/assets/images/goback2.png" style="width:80px;height:30px;" title="Back">
				</a>
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
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/cgroup/searchgroups">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="text" id ="groupname" name="groupname"  class="textarea" style="width:200px;maxlenght:100;" placeholder="Enter group name" /></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="button" class="button" onclick="addgroup();" value="Save Group"/></td>
							<td  width="50%" align="right" valign = "bottom" class="bodytext_bold" >Search :</td>
							<td  width="10%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" placeholder="group name"value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
							<td  width="10%" align="left" >&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" style="border:none;margin-right:10px;margin-left:10px;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value=""/></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<div style="width:100%;">
		<?php
			$discmembers= Request::factory('xjqgridcomponent/index');
			$discmembers->post('name','discountgroup');
			$discmembers->post('height','600');
			$discmembers->post('width','815');
			$discmembers->post('sortname','groupname_c');
			$discmembers->post('sortorder','asc');
			$discmembers->post('tablename','discountgroup');//used for jqgrid
			$discmembers->post('columnnames', 'groupname_c,id');//used for jqgrid
			$discmembers->post('whereclause',$whereclause);//used for jqgrid
			$columninfo = '[
							{"name":"Name","index":"groupname_c","width":30,"align":"left","hidden":false},
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