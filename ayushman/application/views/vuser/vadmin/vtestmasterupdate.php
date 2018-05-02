<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function Typechanged(status)
	{
		
	
	$('#searchform').submit();
	
	
	}
function setaction( cellvalue, options, rowObject )
	{	//console.log($(rowObject).children()[3].firstChild.data);
		var temp = $(rowObject).children()[3].firstChild.data;
		var temp1 = $(rowObject).children()[7].firstChild.data;
		if(temp==-1)
		{
		return '<a  id="fancybox-manual-c" href="javascript:;" onclick="edittest('+cellvalue+');" ><font color="blue">Edit</font></a> / <a  id="fancybox-manual-c" href="javascript:;" onclick="approvingtest('+cellvalue+');" ><font color="blue">Approve</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="Reject('+cellvalue+');" ><font color="blue">Reject</font></a>';
		}
		else if(temp==0)
		return "<a  id='fancybox-manual-c' href='javascript:;' onclick='reasonreject(\"" +temp1+ "\")' ><font color='blue'>View Reason for rejection</font></a>";
		else
		return "";
	}
function importtransactions(file)
  {
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    
    
   $("#submit").trigger("click");
    
  }
  function approvingtest(id)
  {
	parent.openDialog('/ayushman/cmasterdatavalidation/approvetestdetails?id='+id,800,600,this);
	
  }
  function fancyboxclosed(obj)
  {
	refreshgrid();
	
  }
  function approvetest(id)
	{ 
		 $.ajax({
        type: "GET",
        url: "/ayushman/cmasterdatavalidation/approvetest?id="+id,
        success: function(data) {
           alert("Test Approved And Updated");
		   refreshgrid();
          
        }
           
        }); 
	
		
	}
	 function Rejecttest()
	{ 
		 $.ajax({
        type: "POST",
        url: "/ayushman/cmasterdatavalidation/Rejecttest",
		data:$('#testreject').serialize(),
        success: function(data) {
           alert("Test Rejected");
		    $("#dialog-message").dialog( "close" );
		   refreshgrid();
		  // refreshgrid();
          
		  
        }
           
        }); 
	
		
	}
  function edittest(id)
{
	parent.openDialog('/ayushman/cmasterdatavalidation/displaytestdetails?id='+id,800,600)
}
function Reject(id)
	{	
		document.getElementById("idioh").value=id;
		$("#dialog-message").dialog({
		modal: true,
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		
});
		
		
		
	}
	function reasonreject(id)
	{	
		document.getElementById("caution").value=id;
		$("#dialog-message3").dialog({
		modal: true,
		draggable: false,
		resizable: false,
		position: ['center', 'center'],
		show: 'blind',
		hide: 'blind',
		width: 400,
		dialogClass: 'ui-dialog-osx',
		
});
		
		
		
	}


</script>
<div style="width:99%;height:560px;" > 
<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
    <table border="0" cellpadding="0" cellspacing="0" valign="top">
		<tr>
			<td colspan="3" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;
			Validate Master Data</td>
		</tr>
		<tr>
			<td style="width:98%;padding-top:5px;">
				<table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  	<td height="30" colspan="6" align="left" valign="middle" class="bodytext_normal"style="padding-top: 20px;" >
						  	<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
							<tr>&nbsp;Select Master Table:
						<select name="status" onchange="Typechanged(this)" class="textarea" id="status" >
						<option value="drugmaster"<?php if($previousvalues != null)echo ( $previousvalues['status']=='drugmaster')?'selected':''; ?> >Medicine</option>
						<option value = 'testmaster'<?php if($previousvalues != null) echo ($previousvalues['status']=='testmaster')?'selected':''; ?>>Investigations</option>
						<option value='diagnosis'<?php if($previousvalues != null) echo ($previousvalues['status']=='diagnosis')?'selected':''; ?>>Diagnosis</option>
						<option value='Symptoms'<?php if($previousvalues != null) echo ($previousvalues['status']=='Symptoms')?'selected':''; ?>>Symptoms</option>
						<option value='allergymaster'<?php if($previousvalues != null) echo ($previousvalues['status']=='allergymaster')?'selected':''; ?>>Allergy</option>
						</select>
							</tr>
							</table>
						</td>
						<td height="30" colspan="6" align="left" valign="middle" class="bodytext_normal"style="padding-top: 20px;" >
						  	<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
							<tr>&nbsp;Status:
						<select name="activationstatus" onchange="$('#searchform').submit();" class="textarea" id="activationstatus" >
						<option value="-1"<?php if($previousvalues != null)echo ( $previousvalues['activationstatus']=='-1')?'selected':''; ?> >Pending</option>
						<option value = '0'<?php if($previousvalues != null) echo ($previousvalues['activationstatus']=='0')?'selected':''; ?>>Rejected</option>
						<option value='1'<?php if($previousvalues != null) echo ($previousvalues['activationstatus']=='1')?'selected':''; ?>>Active</option>
						</select>
							</tr>
							</table>
						</td>
						
				</tr>
				</table>
		</td>			
	</tr>
	<tr>		
		<td style="width:98%;">
			<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
				<tr>
					<td >
							<?php
							//this is emr grid for patient we can put this in other page
							$tests= Request::factory('xjqgridcomponent/index');
							$tests->post('name','Investigations');
							$tests->post('height','280');
							$tests->post('width','815');
							$tests->post('sortname','id');
							$tests->post('sortorder','desc');
							$tests->post('tablename','testmasterview');//used for jqgridp
							$tests->post('columnnames', 'id,testname_c,createdby_c,active_c,createdon_c,editedby_c,editedon_c,note_c,id');//used for jqgrid
						
							$tests->post('whereclause',"[active_c,=,".$activationcode."]");//used for jqgrid
							$columninfo = 	'[
												{"name":"Test Code","index":"id","width":100,"hidden":false},
												{"name":"Test Name","index":"testname_c","width":100},
												{"name":"Created by","index":"createdby_c","width":100},
												{"name":"active","index":"active_c","width":100,"hidden":true},												
												{"name":"Created on","index":"createdon_c","width":100,"hidden":true},
												{"name":"Edited by","index":"editedby_c","width":100,"hidden":true},
												{"name":"Edited on","index":"editedon_c","width":50,"align":"right"},
												{"name":"note_c","index":"note_c","width":100,"hidden":true},
												{"name":"Action","index":"id","width":100,"hidden":false,"formatter":setaction},
												
											]';
							$tests->post('columninfo', $columninfo);
							$tests->post('editbtnenable','false');
							$tests->post('search',"true");
							$tests->post('deletebtnenable','false');
							$tests->post('savebtnenable','false');
							
							echo $tests->execute(); ?>
									</td>
					</tr>
				</table>
			</td>
			
		</tr>
        </table>
    </form>
</div>
  <div id="dialog-message" title="Reject" style="display: none;">
  <form id="testreject" >
    <div style="margin-left: 23px;">
        <p>
           Please mention reason behind the Rejection.
            <br /><br />
           <input id="reason"  name="reason" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
		   <input type="hidden" id="idioh"  name="idioh" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
        </p>
		<input type="button" id="btnsave" value="Save" onclick="Rejecttest();"/>
		</div>
		</form>
</div>
<div id="dialog-message3" title="Rejection Reason" style="display: none;">
  <form id="drugrejectreason" >
    <div style="margin-left: 23px;">
        <td align="left" style="padding-left:10px;" class="bodytext_bold"><textarea readonly id="caution" type=" name="caution" rows="4" cols="63"></textarea>
		 <input type="hidden" id="idioh"  name="idioh" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/></td>
		  
        
		
		</div>
		</form>
</div>

		