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

function actionformatter( cellvalue, options, rowObject )
	{
				//var admitdate =$(rowObject).children()[3].firstChild.data;
				var patid =$(rowObject).children()[0].firstChild.data;

		return '<a href=/ayushman/cipdwardpatient/orderserviceslist/get?patid='+patid+'><font color="#0000FF">Order Services</font></a>';
	}

</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
		  <td class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Admitted Patients</td>
		</tr>
		<tr width="100%">    
			<td align="right" style="padding-top:5px;" align="right" class="bodytext_bold">	
				<form id="catalogform" method="post" enctype="multipart/form-data"  action="/ayushman/cipdwardcatalog/upload">
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<div style="position:relative">
				<?php
					$userid =  $userid;
					$patjqgridrequest= Request::factory('xjqgridcomponent/index');
					$patjqgridrequest->post('name','ipdpatientsdetails');
					$patjqgridrequest->post('height','250');
					$patjqgridrequest->post('width','810');
					$patjqgridrequest->post('sortname','onlypatientname');
					$patjqgridrequest->post('sortorder','asc');
					$patjqgridrequest->post('tablename','ipdpatientsdetail');//used for jqgrid
					$patjqgridrequest->post('columnnames', 'patientsid,refid,onlypatientname,admitdate_c,status_c');//used for jqgrid
					$patjqgridrequest->post('whereclause',"[status_c,=,admitted][wardid,=,".$pathologistid."]");//used for jqgrid
					$columninfo = '[{"name":"Id","index":"patientsid","hidden":true},
									{"name":"Case No","index":"refid","width":15},
									{"name":"Patient Name","index":"onlypatientname","width":15},
									{"name":"Admit Date","index":"admitdate_c","width":15},
									{"name":"Action","formatter":actionformatter,"index":"status_c","width":15,"hidden":false}
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
