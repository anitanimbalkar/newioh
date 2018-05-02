<?php //echo $msg; 
if($msg != "")
echo "
<script type=\"text/javascript\">
window.alert('$msg');
</script>
";
?>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/jquery-ui.min.js">
</script>
<script type="text/javascript">
  function importtransactions(file)
  {
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    
    
   $("#submit").trigger("click");
    
  }
  function importtransactions2(file)
  {
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    
    
   $("#submit1").trigger("click");
    
  }
  
  $(document).ready(function() {
    
    //alert("hi");
    if($.trim($('#errorlistdiv').html()) != "")
      showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
    if($.trim($('#messagelistdiv').html()) != "")
    {
      showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
    }
  }
                   );
</script>

<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;">
  
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
    <tr>
      <td style="width:99%;" >
        <table width="100%" height="30px" border="0" class="Heading_Bg" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              Bulk Registration
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
   

	
	<tr>
	
      <td width="20%"style="padding:4px" >
        <form action="">
          <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cbulkregistration/download'"/>
          
        </form>
      </td>
	    <form id="catalogform" method="post" enctype="multipart/form-data" action="/ayushman/cbulkregistration/upload" >
	<td align="center" valign="center" width="40%" class="bodytext_normal"style="padding-top: 6px;padding-bottom: 10px">&nbsp;Select Corporate: 
					<select name="activationstatus"  id="activationstatus" class="textarea"  onchange="$('#searchform').submit();" style="width:100px;"> 
									<option value=''> Select</option>
									<?PHP
foreach ($array_status as $statusa) {
    $isselected = '';
    if ($previousvalues != null) {
        $isselected = ($previousvalues['activationstatus'] == $statusa) ? 'selected' : '';
    }
    print "<option  \" value=\"{$statusa}\" " . $isselected . ">{$statusa}</option>";
}
?>
					</select>
			</td>
	
	
      <td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">
      
          Upload Excel File
          <input type="file" name="zip_file" id="file" value="Choose File" onchange="importtransactions(this)" class="bodytext_normal"/>
          
          <label class="bodytext_normal">
          </label>
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
              Bulk De-association
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
   

	
	<tr>
	
      <td width="20%"style="padding:4px" >
        <form action="">
          <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cbulkregistration/download_deassociation'"/>
          
        </form>
      </td>
	    <form id="catalogform2" method="post" enctype="multipart/form-data" action="/ayushman/cbulkregistration/upload_deassociation" >
	<td align="center" valign="center" width="40%" class="bodytext_normal"style="padding-top: 6px;padding-bottom: 10px">&nbsp;Select Corporate: 
					<select name="activationstatus2"  id="activationstatus2" class="textarea"  onchange="$('#searchform').submit();" style="width:100px;"> 
									<option value=''> Select</option>
									<?PHP
foreach ($array_status as $statusa) {
    $isselected = '';
    if ($previousvalues != null) {
        $isselected = ($previousvalues['activationstatus2'] == $statusa) ? 'selected' : '';
    }
    print "<option  \" value=\"{$statusa}\" " . $isselected . ">{$statusa}</option>";
}
?>
					</select>
			</td>
	
	
      <td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">
      
          Upload Excel File
          <input type="file" name="file2" id="file2" value="Choose File" onchange="importtransactions2(this)" class="bodytext_normal"/>
          
          <label class="bodytext_normal">
          </label>
          <label id="lblimageerror" style="display:none;" class="bodytext_error">
            Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </label>
          <input type="submit" name="submit1" id="submit1" style="display:none;" value="upload"/>
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
              Corporate Members
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <div style="width:828px;height: 500px; overflow-x:hidden;" > 
	<table id="paientprofiletable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding:2px;">
		
			
		
		<tr>
			<td>
				<form class="cmxform" id="companysearchform" method="post" enctype="multipart/form-data"  action="/ayushman/ccorporateaccountmanager/searchMembers">
					<table width="100%" height="25"  align="left" cellpadding="0" cellspacing="0" >
						<tr>
							<td  width="70%" align="right" valign = "bottom" class="bodytext_bold" >Search :</td>
							<td  width="20%" valign="bottom" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" onchange="$('#companysearchform').get(0).setAttribute('action', 'baz');" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
							<td  width="10%" align="left" valign="bottom" class="bodytext_bold" >&nbsp;<input type="submit" width="100px" name="btnsearch" id="btnsearch" onclick="$('#companysearchform').get(0).setAttribute('action', 'baz');" class="button" value="Search"/></td>
						</tr>
					</table>
					<input type="hidden" name="corporateid" id="corporateid" value="<?php if($previousvalues != null)echo $previousvalues['corporateid']; ?>">
					<input type="hidden" name="corporatename_c" id="corporatename_c" value="<?php if($previousvalues != null)echo $previousvalues['corporatename_c']; ?>"/>
				</form>
			</td>
		</tr>
	</table>
	<div style="width:100%;">
		<?php
			//this is emr grid for patient we can put this in other page
			$whereclause='';
			if($previousvalues != null){
				if(isset($previousvalues['search']) && ($previousvalues['search'] != '') ){
					$whereclause = $whereclause.'[employeename,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeeid,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeenumber,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[employeeemailid,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[dateofbirth,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
					$whereclause = $whereclause.'(or)[status,like,'.$previousvalues['search'].'%]'."[corporateid,=,".$previousvalues['corporateid']."]";
				}else{
					$whereclause = "[corporateid,=,".$previousvalues['corporateid']."]";
				}
			}
			$corporatemembers= Request::factory('xjqgridcomponent/index');
			$corporatemembers->post('name','corporatemembers');
			$corporatemembers->post('height','320');
			$corporatemembers->post('width','815');
			$corporatemembers->post('sortname','employeename');
			$corporatemembers->post('sortorder','asc');
			$corporatemembers->post('tablename','getcorporatemembers');//used for jqgrid
			$corporatemembers->post('columnnames', 'employeename,employeeid,employeenumber,employeeemailid,dateofbirth,status');//used for jqgrid
			$corporatemembers->post('whereclause',$whereclause);//used for jqgrid
			$columninfo = '[
							{"name":"Employee Name","index":"employeename","width":30,"align":"left","hidden":false},
							{"name":"Employee Id","index":"employeeid","width":10,"align":"left","hidden":false},
							{"name":"Mobile Number","index":"employeenumber","width":15,"align":"left","hidden":false},
							{"name":"Email Id","index":"employeeemailid","width":25,"align":"left","hidden":false},
							{"name":"Date of birth","index":"dateofbirth","width":10,"align":"left","hidden":false},
							{"name":"Status","index":"status","width":10,"align":"left","hidden":false}
							]';			
			$corporatemembers->post('columninfo', $columninfo);
			//if save,edit,delete we dont want in jqgrid set it to false
			$corporatemembers->post('editbtnenable','false');
			$corporatemembers->post('deletebtnenable','false');
			$corporatemembers->post('savebtnenable','false');
			$corporatemembers->post('shrinkToFit', 'true');
			$corporatemembers->post('autowidth', 'true');
			echo $corporatemembers->execute(); ?>
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
