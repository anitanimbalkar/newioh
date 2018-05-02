<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
		function uploadcatalog(file)
		{
			document.getElementById("lblimageerror").style.display = "none";
			ext = (file.value).split('.');
			
			if(ext[ext.length - 1]== "xls" || ext[ext.length - 1] == "xlsx") 
			{
				parent.pagebusy();
				$("#submit").trigger("click");
				//document.forms["catalogform"].submit();
			}
			else
				document.getElementById("lblimageerror").style.display = "block";
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
		  <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Catalogue</td>
		</tr>
		<tr width="100%">    
			<td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">	
				<form id="catalogform" method="post" enctype="multipart/form-data"  action="/ayushman/cipdwardcatalog/upload"  ><input type="button" class="button" style="float:left;" onclick="window.location = '/ayushman/cipdwardcatalog/download'" value="Download Format" /> Upload Catalog (Only .xls / .xlsx File) - <input type="file" name="file" id="file" value="Choose File"  onchange="uploadcatalog(this)" class="bodytext_normal"/>  <label class="bodytext_normal"></label><label id="lblimageerror" style="display:none;" class="bodytext_error">Only .xls / .xlsx format is allowed.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
				</form>
			</td>
		</tr>
		<tr width="100%">    
			<td align="right" style="padding-top:5px;padding-right:69px;" align="right" class="bodytext_bold">	
				<input class="item" type="checkbox"  id="btnpermission" onclick="setpermission()" /><Label for="btnpermission" >&nbsp;Allow Users to pay order fees at the time of sample pickup.</label>
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
						1) To update the uploaded catalogue, <a href="javascript::void();" style="color:blue; font-size:small;" title="click here to export in excel." onclick="exportCatalog();">Export catalogue in xls.</a><br/>
						2) Make changes in the downloaded xls.<br/>
						3) Upload the changed catalogue.<br/>
					</div>
					<div style="float:right;position:relative;">
						<input type="submit" id="submitsearch" style="float:right;border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" />
						<input type="text" name="search" id="search" class="textarea" style="width:100px;float:right" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/>
						<span style="float:right">Search :</span>
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
					$patjqgridrequest->post('columnnames', 'id,Catagory,LabTestCode,LabTestName,SellingPrice');//used for jqgrid
					$patjqgridrequest->post('whereclause',"[pathologistid,=,".$pathologistid."]");//used for jqgrid
					$columninfo = '[{"name":"id","index":"id","hidden":true},
									{"name":"Category","index":"Catagory","width":20},
									{"name":"Code","index":"LabTestCode","width":10,"editable":true},
									{"name":"Test Name","index":"LabTestName","width":50},
									{"name":"Selling Price (Rs.)","index":"SellingPrice","width":20,"editable":true}
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
