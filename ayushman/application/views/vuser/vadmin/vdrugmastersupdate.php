<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function Typechanged(status)
	{
		
	//var comp = "<?php echo $refer ?>";
	$('#searchform').submit();
	//window.location.href=comp+"/ayushman/cmasterdatavalidation/view";
	
	}
	
function setaction( cellvalue, options, rowObject )
	{	//console.log({$(rowObject).children()[7].firstChild.data});
		var temp = $(rowObject).children()[4].firstChild.data;
		// Checking the active status of record and accordingly enabling the buttons
		//var temp1 = $(rowObject).children()[7  ].firstChild.data;
		var temp1 ="";
		
		if(temp==-1)
		{
			return '<a  id="fancybox-manual-c" href="javascript:;" onclick="editmedicine('+cellvalue+');" ><font color="blue">Edit</font></a> / <a  id="fancybox-manual-c" href="javascript:;" onclick="approvemedicine('+cellvalue+');" ><font color="blue">Approve</font></a> / <a  id="fancybox-manual-d" href="javascript:;" onclick="Reject('+cellvalue+');" ><font color="blue">Reject</font></a>';
		}
		else if(temp==0)
		{
			return "<a  id='fancybox-manual-c' href='javascript:;' onclick='reasonreject(\"" +temp1+ "\")' ><font color='blue'>View Reason for rejection</font></a>";
		}
		else if(temp==1)
		{
			return '<a  id="fancybox-manual-c" href="javascript:;" onclick="editmedicine('+cellvalue+');" ><font color="blue">Edit</font></a> ';
		}
		else
			return " ";
	}
function editmedicine(id)
{
	parent.openDialog('/ayushman/cmasterdatavalidation/displaydrugdetails?id='+id,800,600)
}
function approvemedicine(id)
	{ 
		parent.openDialog('/ayushman/cmasterdatavalidation/approvedrugdetails?id='+id,800,600,this)
	}
	function fancyboxclosed(obj)
  {
	refreshgrid();
	
  }
	function Rejectmedicine()
	{ 
		 $.ajax({
			type: "post",
			url: "/ayushman/cmasterdatavalidation/Rejectmedicine",
			data:$('#drugreject').serialize(),
			success: function(data) {
				alert("Medicine Rejected");
				$("#dialog-message2").dialog( "close" );		
				refreshgrid();
			}           
        }); 
	}
function importtransactions(file)
  {
    document.getElementById("lblimageerror").style.display = "none";
    ext = (file.value).split('.');
    
    
   $("#submit").trigger("click");
    
  }
  function Reject(id)
	{	
		document.getElementById("idioh").value=id;
		$("#dialog-message2").dialog({
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
<div style="width:835px;height:560px;" > 
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
					  	<td height="30" colspan="3" align="left" valign="middle" class="bodytext_normal" style="padding-left:10px;padding-top: 7px;" >
						  	&nbsp;Select Master Table:
							<select name="status" onchange="Typechanged(this)" class="textarea" id="status" >
								<option value="drugmaster"<?php if($previousvalues != null)echo ( $previousvalues['status']=='drugmaster')?'selected':''; ?> >Medicine</option>
								<option value = 'testmaster'<?php if($previousvalues != null) echo ($previousvalues['status']=='testmaster')?'selected':''; ?>>Investigations</option>
								<option value='diagnosis'<?php if($previousvalues != null) echo ($previousvalues['status']=='diagnosis')?'selected':''; ?>>Diagnosis</option>
								<option value='Symptoms'<?php if($previousvalues != null) echo ($previousvalues['status']=='Symptoms')?'selected':''; ?>>Symptoms</option>
								<option value='allergymaster'<?php if($previousvalues != null) echo ($previousvalues['status']=='allergymaster')?'selected':''; ?>>Allergy</option>
							</select>
						</td>
						<td height="30" colspan="3" align="left" valign="middle" class="bodytext_normal"style="padding-top: 7px;padding-left: 21px;" >
							&nbsp;Status:
						<select name="activationstatus" onchange="$('#searchform').submit();" class="textarea" id="activationstatus" >
						<option value="-1"<?php if($previousvalues != null)echo ( $previousvalues['activationstatus']=='-1')?'selected':''; ?> >Pending</option>
						<option value = '0'<?php if($previousvalues != null) echo ($previousvalues['activationstatus']=='0')?'selected':''; ?>>Rejected</option>
						<option value='1'<?php if($previousvalues != null) echo ($previousvalues['activationstatus']=='1')?'selected':''; ?>>Active</option>
						</select>
						</td>
				</tr>
				<tr><td height="2" colspan="6" align="left" style="padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
				<tr>
				<tr>
					<td height="2" colspan="6" align="left" class="bodytext_normal" style="padding-left:10px;padding-right:10px;" valign="middle">
					  	Drug name:
						<input type="text" name="drugname" id="drugname" class="textarea" title="Drugname" value ="<?php if($previousvalues != null)echo  $previousvalues['drugname']?>" placeholder="Search drug name"/>     
					<!--</td><td align="left">-->
					<input type="button" name="btnsearch" id='btnsearch' style="border:none;width:30px; height: 20px; vertical-align:top;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" onclick="Typechanged();"/>
					</td>			
				</tr>
				<tr><td height="2" colspan="6" align="left" style="padding-right:10px;" valign="middle"><div style="color:#11587E;"></br></div></td></tr>
				<tr>

				<tr>
				<td colspan="3" width="60%"style="padding-left:10px;" class="bodytext_normal" >
							<form method="POST" id="downloadform" method="post" enctype="multipart/form-data" action="">
								From ID :
								<input type="number" name="fromid" id ="fromid" class="textarea" placeholder="Drug Id" >
								To ID   :
								<input type="number" name="toid" id ="toid"  class="textarea" placeholder="Drug Id">								
								<!--<input type="button"  value="Export TO Excel" onclick="window.location.href='/ayushman/cmasterdatavalidation/download'"/>       -->
								<input type="button"  value="Export TO Excel" onclick="downloaddrug()"/>
							</form>
						</td>
					<td  colspan="3" align="right" style="padding-top:5px;" align="right" class="bodytext_bold">     
					<form id="catalogform" method="post" enctype="multipart/form-data" action="/ayushman/cmasterdatavalidation/upload" >						
						
							Upload Excel File
							<input type="file" name="zip_file" id="file" value="Choose File" onchange="importtransactions(this)" class="bodytext_normal"/>     
								<label class="bodytext_normal">
								</label>
								<label id="lblimageerror" style="display:none;" class="bodytext_error">
								Import transactions in .xml format only...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</label>
									<input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
						
					</form>
					</td>
				</tr>
				<tr><td height="2" colspan="6" align="left" style="padding-right:10px;" valign="middle"><div style="color:#11587E;"><HR style="height:0.5px"></div></td></tr>
				<tr>				
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
							$tests->post('name','Medicines');
							$tests->post('height','280');
							$tests->post('width','815');
							$tests->post('sortname','id');
							$tests->post('sortorder','asc');
							$tests->post('tablename','newaddeddrug');//used for jqgridp
							//$tests->post('columnnames', 'id,DrugName_c,createdby_c,active_c,createdon_c,editedby_c,editedon_c,note_c,id');//used for jqgrid
							$tests->post('columnnames', 'id,DrugName_c,drugForm_c,createdby_c,active_c,createdon_c,editedby_c,editedon_c,note_c,id');//used for jqgrid
							//$tests->post('whereclause',"[active_c,=,".$activationcode."]");//used for jqgrid
							$tests->post('whereclause',"[active_c,=,".$activationcode."]"."[DrugName_c,like,".$drugname."%]");//used for jqgrid
							// modified here{"name":"Package","index":"packageunit_c","width":50},						
												
							$columninfo = 	'[
												{"name":"Medicine Code","index":"id","width":60,"hidden":false},
												{"name":"Drug Name","index":"DrugName_c","width":100},
												{"name":"Form","index":"drugForm_c","width":50},
												{"name":"Created by","index":"createdby_c","width":100},
												{"name":"active_c","index":"active_c","width":100,"hidden":true},
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
<div id="dialog-message2" title="Reject" style="display: none;">
  <form id="drugreject" >
    <div style="margin-left: 23px;">
        <p>
           Please mention reason behind the Rejection.
            <br /><br />
           <input id="reason"  name="reason" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
		   <input type="hidden" id="idioh"  name="idioh" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
        </p>
		<input type="button" id="btnsave" value="Save" onclick="Rejectmedicine();"/>
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
<script type="text/javascript">
	function downloaddrug(){		
		var	drugstatus = document.getElementById("activationstatus").value;
		var	fromid = document.getElementById("fromid").value;
		var	toid = document.getElementById("toid").value;
		window.location.href='/ayushman/cmasterdatavalidation/download/get?drugstatus='+drugstatus+'&fromid='+fromid+'&toid='+toid;	
	}
</script>