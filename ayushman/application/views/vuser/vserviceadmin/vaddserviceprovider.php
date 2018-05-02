<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"> </script>
<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/easyui.css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/icon.css">
<script type="text/javascript" src="/ayushman/assets/js/jquery.easyui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".ui-dialog-titlebar").hide();
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		$('#searchpopup').dialog('move', {
			left: 100,
			top: 0
		});
		$('#searchpopup').dialog("close");
		if($.trim($('#listerrorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#listerrorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#listmessagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#listmessagelistdiv').html()),'notification','messagedialogboxid',5000);
	});
	function getSearchResults(query){
		$("#searchguide").hide();
		$("#searchresult").empty();
		if(query == ""){
			$("<td class='bodytext_bold' colspan='6' align='middle'>Please enter a search query</td>").appendTo($("#searchresult"));
			$("#searchresult").show();
		}
		else{
			$.ajax({
				url: "/ayushman/cserviceproviders/getServiceProviders?query="+encodeURIComponent(query)+"&serviceid="+$("#serviceid").val(),
				success: function(jsonSearchResults) {
					searchResults = eval("("+jsonSearchResults+")");
					if(searchResults.length == 0){
						$("<td class='bodytext_bold' colspan='6' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
						$("#searchresult").show();
					}
					else{
						for(var i=0;i<searchResults.length;i++){
							if(i % 2 != 0)
								var result = $("<tr id=result"+i+" style = 'background-color:#ecf8fb;'></tr>");
							else
								var result = $("<tr id=result"+i+"></tr>");
							if($("#serviceid").val() == 1 || $("#serviceid").val() == 3){
								$("<td width='30%' class='bodytext_normal' align='left'>"+searchResults[i].name+"</td>").appendTo(result);
								$("<td width='15%' class='bodytext_normal' align='left'>"+searchResults[i].domain+"</td>").appendTo(result);
								$("<td width='15%' class='bodytext_normal' align='left'>"+searchResults[i].specialization+"</td>").appendTo(result);
								$("<td width='15%' class='bodytext_normal' align='left'>"+searchResults[i].city+"</td>").appendTo(result);
								$("<td width='10%' class='bodytext_normal' align='left'><a onclick ='addserviceprovider("+searchResults[i].userid+","+$("#serviceid").val()+");' href='javascript:void(0);'>Add</a></td>").appendTo(result);
								$(result).appendTo($("#searchresult"));
							}else if($("#serviceid").val() == 2 || $("#serviceid").val() == 4){
								$("<td width='30%' class='bodytext_normal' align='left'>"+searchResults[i].name+"</td>").appendTo(result);
								$("<td width='15%' class='bodytext_normal' align='left'>"+searchResults[i].location_c+"</td>").appendTo(result);
								$("<td width='15%' class='bodytext_normal' align='left'>"+searchResults[i].city_c+"</td>").appendTo(result);
								$("<td width='10%' class='bodytext_normal' align='left'><a onclick ='addserviceprovider("+searchResults[i].userid+","+$("#serviceid").val()+");' href='javascript:void(0);'>Add</a></td>").appendTo(result);
								$(result).appendTo($("#searchresult"));
							}
						}
						$("#searchguide").show();
						$("#searchresult").show();
					}
				},
				error : function(){
					$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
					$("#searchresult").show();
				}
			});
		}
	}
	function addserviceprovider(userid,serviceid){
		$.ajax({
				url: "/ayushman/cserviceproviders/assign?userid="+userid+"&serviceid="+serviceid+"&packageid="+<?php echo $packageid; ?>,
				success: function(data) {
					$("#serviceproviders").empty();
					$("#serviceproviders").html(data);
					alert('Service Provider is added in the list');
				},
				error : function(){
					alert('error');
				}
			});
	}
	function removeserviceprovider(userid,serviceid){
		$.ajax({
				url: "/ayushman/cserviceproviders/remove?userid="+userid+"&serviceid="+serviceid+"&packageid="+<?php echo $packageid; ?>,
				success: function(data) {
					$("#serviceproviders").empty();
					$("#serviceproviders").html(data);
					alert('Service Provider is removed from the list');
				},
				error : function(){
					alert('error');
				}
			});
	}
	
</script>
<div style="width:inherit;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:100%;" >	
		<table id="serviceproviders" width="100%">
			<?php 
				echo $serviceproviderslist;
			?>
		</table>
		<table width="100%">
			<tr>
				<td align="left" colspan="2" style="padding:5px;" class="bodytext_bold" ><hr/>
					<a href="#" onclick='$("#searchpopup").dialog("open");' style="float:right;"><span style="color:blue">Add Service Provider</span></a>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="searchpopup" id="dlg" class="easyui-dialog" title="Search Service Providers" style="width:600; background-color:#ffffff; max-height:500px;top:0px;" style="padding:10px;">
	<div id="searchbody" style="width:99%;padding-top:5px;">
		<div style="width:inherit;" >
			<input class="easyui-searchbox" id='searchbox' data-options="prompt:'Please Enter Name',menu:'#mm',searcher:getSearchResults" style="width:400px;"></input>
			<div id="mm" style="width:99%">
				<div data-options="name:'all',iconCls:'icon-ok'">All</div>
			</div>
		</div>
		<div >
			<?php 
			if($serviceid == 1 || $serviceid == 3){
				echo '<table id = "searchguide" style="width:99%;">
						<tr class="Heading_Bg">
							<td width="30%" align="middle">Name</td>
							<td width="15%" align="middle">Domain</td>
							<td width="15%" align="middle">Specialization</td>
							<td width="15%" align="middle">City</td>
							<td width="10%" align="middle">add</td>
						</tr>
						<input type="hidden" value='.$serviceid.' id="serviceid" />
					</table>';
			}else if($serviceid == 2 || $serviceid == 4){
				echo '<table id = "searchguide" style="width:99%;">
						<tr class="Heading_Bg">
							<td width="30%" align="middle">Name</td>
							<td width="15%" align="middle">Location</td>
							<td width="15%" align="middle">City</td>
							<td width="10%" align="middle">add</td>
						</tr>
						<input type="hidden" value='.$serviceid.' id="serviceid" />
					</table>';
			}
			?>
		</div>
		<div style="overflow:auto;margin-top:5px;height:80px;">
			<table id = "searchresult" style="width:100%;height:80px; display:none;">
				
			</table>
		</div>
	</div>
	<div style="width:100%; height:25px; background-color:#ecf8fb; border-top:1px solid #a8c8d9; margin-top:10px;"></div>
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
