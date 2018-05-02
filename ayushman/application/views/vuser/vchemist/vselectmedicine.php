<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

$(document).ready(function() {

		$('#informationpopup').dialog({
			autoOpen: false,
			show: "fade",
			position: [150, 150],
			hide: "fade",
			width: "500px",
			modal: true,
			height: "auto",
			resize: "auto",
			resizable: false
		});

});

	function addtocart( cellvalue, options, rowObject )
	{
		document.getElementById("medid").value = cellvalue;
		return '<a href="#" onclick="openaddpopup('+cellvalue+')" >Select</a>'	
	}

	function openaddpopup(medid)
	{
		var patid=document.getElementById("patid").value;
		var orderid=document.getElementById("orderid").value;

		$.ajax({
		  url: "/ayushman/cchemistorder/addmedicineusingorderid?medid="+medid+"&patid="+patid+"&orderid="+orderid,
			success: function( data ) {
				//alert("hello");
				parent.location.reload();
				},
			error : function()
			{
				showMessage('250','50','Errors',"Error while adding Diagnostic Tests. Please try again",'error','errordialogboxid');
			}
		});
	}
	
	
	function testnameformatter( cellvalue, options, rowObject )
	{
		var medid= $(rowObject).children()[2].firstChild.data;
		var testname= $(rowObject).children()[0].firstChild.data;
		var string ='<a onclick="opentestinfo('+medid+')" title="test information" style="cursor:hand;" >&nbsp;'+testname+"</a><br />";
		return string;
	}
	
	function opentestinfo(medid)
	{
		$.ajax({
			url: "/ayushman/cpatientrequistiontests/gettestinfo?medid="+medid,
			success: function( data ) {
				var testInfo = eval("("+data+")"); 
				var infoDiv = $("<div style='width:100%'></div>");
				for(var x in testInfo){
					var subDiv = $("<div></div>");
					$("<label class='bodytext_bold'>"+x+"</label>").appendTo(subDiv);
					$("<label>&nbsp:&nbsp&nbsp</label>").appendTo(subDiv);
					$("<label class='bodytext_normal'>"+testInfo[x]+"</label>").appendTo(subDiv);
					$(subDiv).appendTo(infoDiv);
					$("<br />").appendTo(infoDiv);
				}
				$("#informationbody").empty();
				$(infoDiv).appendTo($("#informationbody"));
				$("#informationpopup").dialog("open");
			},
			error : function(){alert("something has gone wrong. Could not retrieve information for the test. Please contact system administrator.");}
		});
	}
	
</script>
<div style="width:835px;height:560px;" > 
    <table border="0" cellpadding="0" cellspacing="0" valign="top">
				<input id="medid" name="medid" type = "hidden"/>
		<tr>
			<td style="width:1%;height:15px;" >&nbsp;</td>
			<td style="width:800px;height:20px;" align="right" >
				<table width="800" border="0" cellspacing="0" cellpadding="0">
					<form class="cmxform" id="patientsearch" method="post" enctype="multipart/form-data" action="/ayushman/cchemistorder/selectmedicine">
						<tr>
						  	<td width="52" class="bodytext_bold" align="right">Search :</td>
						  	<td width="20" align="left" >
						  		<input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  	<td width="27" align="left">
						  		<input type="submit" style="border:none;height:25px; width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
						<tr>
							<td width="12%" align="center" valign="left">
<!-- 	  						<div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="window.location='/ayushman/ccheckout/viewmycart'" id="checkoutbutton" >Requisition</div>
 -->	  					</td>
						</tr>
					</form>
				</table>
			</td>
			<td style="width:1%;height:15px;" >&nbsp;</td>
		</tr>	
		<tr> 
			<td style="width:1%;">&nbsp;</td>
			<td style="width:98%;">
				<table width="100%" height="36"  cellpadding="0" cellspacing="0"  >
					<tr>
						<td >
							<?php
							//this is emr grid for patient we can put this in other page
							$tests= Request::factory('xjqgridcomponent/index');
							$tests->post('name','medicines');
							$tests->post('height','280');
							$tests->post('width','815');
							$tests->post('sortname','DrugName_c');
							$tests->post('sortorder','desc');
							$tests->post('tablename','drugmaster');//used for jqgridp
							$tests->post('columnnames', 'DrugName_c,id,id');//used for jqgrid
							$tests->post('whereclause',$whereclause);//used for jqgrid
							$columninfo = 	'[
												{"name":"Medicine name","index":"DrugName_c","width":200,"formatter":testnameformatter},
												{"name":"id","index":"id","width":100,"hidden":true},
												{"name":"Select","index":"id","width":160,"formatter":addtocart}
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
			<td style="width:1%;" ><label  style="visibility:hidden;" id="patientid"></label></td>
		</tr>
        </table>
    
	<div id="informationpopup" style="width:500px;overflow-x:hidden; background-color:#ffffff;" class="table_roundBorder" overflow-x="hidden">
		<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; ">
			&nbsp;&nbsp;<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/>&nbsp;
			<label id="informationheading" class="bodytext_bold">Information</label>
			<label style="float:right; height:25px; margin-top:5px;"><img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" style="cursor:pointer;padding-right:10px;" onclick="$('#informationpopup').dialog('close');"/></label>
		</div>
		<div id="informationbody" style="width:96%;margin:10px;"></div>
		<div style="width:100%; height:35px; background-color:#ecf8fb; border-top:1px solid #a8c8d9;align:right;padding-right:10px;overflow:hidden;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="80%">&nbsp;</td>
					<td width="21%" style="padding-top:5px;"><div class="button" style="width:90px; height:25px; line-height:23px; vertical-align:middle; text-align:center;" onclick="$('#informationpopup').dialog('close');">Ok</div></td>
				</tr>
			</table>
		</div>
	</div>
</div>

  	<input type='hidden' id='patid' name='patid' value='<?php echo $patid; ?>' />
  	<input type='hidden' id='orderid' name='orderid' value='<?php echo $orderid; ?>'/>
