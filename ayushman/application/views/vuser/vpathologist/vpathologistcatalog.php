<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">

function uploadcatalog()
{
	document.getElementById("lblimageerror").style.display = "none";
	ext = (document.getElementById("file").value).split('.');
	if(ext[ext.length - 1]== "xls" || ext[ext.length - 1] == "xlsx") 
	{			
		$message = "You are about to upload catalog for - "+ document.getElementById("catalogtype").value + " - " + $("#groupid option:selected").text()+" group";
		showMessage('250','50','Remove test from battery',$message,'confirmation','msgpopup');
		//parent.pagebusy();
		//$("#submit").trigger("click");
	}
	else
		document.getElementById("lblimageerror").style.display = "block";
}

var Confirmation_Event = function(id,confirmation){
	if(confirmation == 'yes')
	{		
		parent.pagebusy();
		$("#submit").trigger("click");
	}
}

function selectcatalog()
{
	document.getElementById("discountgrpid").value=document.getElementById("groupid").value;
	parent.pagebusy();
	$("#searchform").attr("action", "search");
	$("#submitsearch").trigger("click");
}
		
function setvalues()
{
	//alert(document.getElementById("chktest").checked);
	if(document.getElementById("chktest").checked)
	{
		// Test option selected
		document.getElementById("catalogtype").value = "test";
		document.getElementById("cattype").value = "test";
	}
	else
	{
		// Battery option selected
		document.getElementById("catalogtype").value = "battery";
		document.getElementById("cattype").value = "battery";
	}
}
var setpermission = function(){
	var atLeastOneIsChecked = $('input[id="btnpermission"]:checked').length > 0 ? 0 : 1; 
	$.ajax({
	type: "post",
		url: "/ayushman/cpathologist/setpermission",
		data: {'flag':atLeastOneIsChecked},
		success:function( data ){
			console.log(data);
		},
		error:
		function(){
			showMessage('250','50','End consultation','Could not end consultation. Please contact your system administrator.','error','id');
		},
	});
}
function exportCatalog(){
	$("#searchform").attr("action", "export");
	$("#submitsearch").trigger("click");
}
function downloadformat()
{
	//$logtype = document.getElementById("catalogtype").value
	$logtype = 'test'
	window.location = '/ayushman/cpathologistcatalog/download?logtype='+$logtype;
}
$(document).ready(function() {
	parent.pageloaded();
	if($.trim($('#errorlistdiv').html()) != "")
		showMessage('250','auto','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
		
	if($.trim($('#messagelistdiv').html()) != "")
		showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
		
		$(function() {$( "#tabs" ).tabs();
		});
});
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
		  <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Catalogue
				<?PHP
				/*	if($selectedcattype == "test")
					{
						echo '<input name ="catologtype" id ="chktest" type="radio" checked onclick ="setvalues();selectcatalog();" style="margin-left:50px"/><span style="font-size:14px"> Test</span>';
						echo '<input name ="catologtype" id ="chkbattery" type="radio" onclick ="setvalues();selectcatalog();"  style="margin-left:50px" /><span style="font-size:14px"> Battery</span>';							
					}
					else
					{
						echo '<input name ="catologtype" id ="chktest" type="radio"  onclick ="setvalues();selectcatalog();" style="margin-left:50px"/><span style="font-size:14px"> Test</span>';
						echo '<input name ="catologtype" id ="chkbattery" type="radio" checked onclick ="setvalues();selectcatalog();"  style="margin-left:50px" /><span style="font-size:14px"> Battery</span>';							

					}*/
				?>
		  </td>
		  
		</tr>
		<tr width="100%">    
			<td align="left" style="padding-top:5px;" align="right" class="bodytext_bold">	
				<form id="catalogform" method="post" enctype="multipart/form-data"  action="/ayushman/cpathologistcatalog/upload"  >
					<input type="button" class="button" style="float:left;width:120px;" onclick="downloadformat();" title="Download master list" value="Download Format" /> 
					<span style="padding-left:175px">Only .xls / .xlsx File - </span>
					<input type="file" name="file" id="file" value="Choose File"  onchange="" class="bodytext_normal"/>  
					<span style="padding-left:65px">&nbsp; </span>
					<input type="button" onclick="uploadcatalog()" class="button" style ="width:120px;" value ="Upload Catalogue"/>  
					<label class="bodytext_normal"></label>
					<label id="lblimageerror" style="display:none; text-align:right" class="bodytext_error">
					Choose file in .xls / .xlsx format for upload.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<!--<input type="hidden" id="discountgrpid" name="discountgrpid" value="<?php /*echo $selectedgroup */?>"/>-->
					</br></br>
					<select style="float:left;width:145px;height:20px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="groupid"  id="groupid" onchange="selectcatalog();" title="Please select discount group"> 
						<?PHP  
							foreach ($discgroups as $discgroup) {
								if($selectedgroup == $discgroup->id)
									print "<option class='bodytext_normal' selected \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
								else
									print "<option class='bodytext_normal'  \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
							}
						?>
					</select>
					<span style="padding-left:310px">&nbsp; </span>
					<input class="item" type="checkbox"  id="btnpermission" onclick="setpermission()" /><Label for="btnpermission" >&nbsp;Allow Users to pay order fees at the time of sample pickup.</label>			
					<input type="hidden" id="catalogtype" name="catalogtype" value="<?PHP echo $selectedcattype ?>"/>					
					<input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
				</form>				
			</td>
		</tr>
		<tr>
			<td style="padding-top:1px;" >
				<HR style="height:0.5px"/>
			</td>
		</tr>
		<tr  class="bodytext_normal" width="100%">    
			<td>
				<form class="cmxform" id="searchform" style="position:relative;" method="post" height="auto" enctype="multipart/form-data"  action="search">
					<div  style="float:left;position:relative;" class="bodytext_normal">
						<div class="bodytext_bold">Steps to update the catalog :-</div>
						1) To update the uploaded catalogue, <a href="javascript::void();" style="color:blue; font-size:15px;font-weight:bold" title="click here to export in excel." onclick="exportCatalog();">Export catalogue in xls.</a><br/>
						2) Make changes in the downloaded xls.<br/>
						3) Upload the changed catalogue.<br/>
					</div>
					<div style="float:right;position:relative;">
						<input type="submit" id="submitsearch" style="float:right;border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
						<input type="text" name="search" id="search" class="textarea" style="width:100px;float:right" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
						<span style="float:right">Search :</span>
						<input type="hidden" id="discountgrpid" name="discountgrpid" value="<?php echo $selectedgroup ?>"/>
						<input type="hidden" id="cattype" name="cattype" value="<?PHP echo $selectedcattype ?>"/>
						<!--<select style="float:right;margin-right:20px;width:145px;height:20px;border:none;border-bottom:thin solid #000000;" class="bodytext_normal"  name="groupid"  id="groupid" onchange="selectcatalog();" title="Please select discount group"> -->
						<?PHP  
							/*foreach ($discgroups as $discgroup) {
								if($selectedgroup == $discgroup->id)
									print "<option class='bodytext_normal' selected \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
								else
									print "<option class='bodytext_normal'  \" value=\"{$discgroup->id}\">{$discgroup->groupname_c}</option>";
							}*/
						?>
						<!--</select>-->
					</div>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<div style="position:relative">
				<?php
					$userid =  $userid;
					$patjqgridrequest= Request::factory('xjqgridcomponent/index');
					$patjqgridrequest->post('name','catalogs');
					$patjqgridrequest->post('height','250');
					$patjqgridrequest->post('width','810');
					$patjqgridrequest->post('sortname','Catagory');
					$patjqgridrequest->post('sortorder','asc');
					$patjqgridrequest->post('tablename','catalog');//used for jqgrid
					$patjqgridrequest->post('columnnames', 'id,Catagory,LabTestCode,LabTestName,SellingPrice,DiscountPercent');//used for jqgrid
					$patjqgridrequest->post('whereclause',$whereclause);//used for jqgrid
					$columninfo = '[{"name":"id","index":"id","hidden":true},
									{"name":"Category","index":"Catagory","width":20},
									{"name":"Code","index":"LabTestCode","width":10,"editable":true},
									{"name":"Test Name","index":"LabTestName","width":50},
									{"name":"Selling Price (Rs.)","index":"SellingPrice","width":20,"editable":true},
									{"name":"Discount (%)","index":"DiscountPercent","width":20,"editable":true}
									]';

					$patjqgridrequest->post('columninfo', $columninfo);
					//if save,edit,delete we dont want in jqgrid set it to false
					$patjqgridrequest->post('editbtnenable','false');
					$patjqgridrequest->post('deletebtnenable','false');
					$patjqgridrequest->post('savebtnenable','false');
					$patjqgridrequest->post('search','true');
					if($previousvalues != null)
						$previousvaluessearch = $previousvalues['search']; 
					else
					 	$previousvaluessearch = "";
					$patjqgridrequest->post('previousvaluessearch',$previousvaluessearch);	
					echo $patjqgridrequest->execute(); ?>
					</div>
			</td>
		</tr>
	</table>
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
