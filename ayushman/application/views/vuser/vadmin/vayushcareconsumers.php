<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
 <script src="/ayushman/assets/js/jquery-ui.min.js"></script>

 <script type="text/javascript">
	$(document).ready(function() {
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#messagelistdiv').html()) != "")
			showMessage('350','150','Errors',$.trim($('#messagelistdiv').html()),'information','messagedialogboxid',5000);
	});
	function urlformatter( cellvalue, options, rowObject ){

		return '<a href="#" onclick="changestatus('+cellvalue+');" ><font color="blue">Process</font></a>';
	}
	function changestatus(consumerid){
			$.ajax({
			  url: "/ayushman/cayushcareconsumer/changestatus?consumerid="+consumerid,
			  success: function( data ) {
					data =  JSON.parse(data);
					if(data['type'] == 'error')
						showMessage('550','200','changing status of consumer',data['data'],data['type'],'id');
					else
					{
						var status = new Array();
						status = data['data'];
						showNotification('300','20','Change status',data['data'],'notification','diaconfirmation',5000);
						checkmsg('pullgriddata');	
					}
				},
				error : function(){showMessage('550','200','changing status of consumer',"Could not retrieve data for selected plan.",'error','id');}
			});

	}
</script>
 
<div id="body_contantpatientpage" style="width:818px;height:auto;padding:3px;"> 
	
	<form id="searchform" name="searchform" action="search" method="post" accept-charset="utf-8">
	<table width="100%"  height="35px" border="0" cellpadding="0" cellspacing="0" style="align:left;" >
		<tr>
			<td style="width:99%;" colspan="2" class="Heading_Bg">
				Ayushcare Consumers
			</td>
		</tr>
		<tr>
			<td align="left" valign="center" width="50%" class="bodytext_normal">&nbsp;&nbsp;Status : 
					<select name="status" onchange="$('#searchform').submit();" class="textarea" id="status" >
						<option value="" <?php if($previousvalues != null)echo ( $previousvalues['status']=='')?'selected':''; ?> >all</option>
						<option value = 'subscribed' <?php if($previousvalues != null) echo ($previousvalues['status']=='subscribed')?'selected':''; ?>   >New Subscription</option>
						<option value='active' <?php if($previousvalues != null) echo ($previousvalues['status']=='active')?'selected':''; ?>>Processed</option>
					</select>
			</td>

			<td align="right" valign="bottom">
					<table>
						<tr>	
							<td width="52" class="bodytext_bold" align="right">Search :</td>
						  	<td width="106" align="right" ><input type="text" name="search" id="search" class="textarea" style="width:100%;" value="<?php if($previousvalues != null)if(isset($previousvalues['search']))echo $previousvalues['search']; ?>" class="bodytext_normal"/></td>
						  	<td width="27" align="right"><input type="submit" style="border:none;width:25px;background: url(/ayushman/assets/images/SearchBtn.png) no-repeat;" value="" /></td>
						</tr>
					</table>

			</td>
		</tr>
		<tr  class="bodytext_normal" align="right"  width="100%">    
			<td colspan="2" valign="top">
				<?php
					$consumers= Request::factory('xjqgridcomponent/index');
					$consumers->post('name','doctorstaffappointments');
					$consumers->post('height','320');
					$consumers->post('width','810');
					$consumers->post('sortname','consumername');
					$consumers->post('sortorder','desc');
					$consumers->post('tablename','showsubscribedconsumers');
					$consumers->post('columnnames','iohid,consumername,email,planname,status,iohid');
					$consumers->post('whereclause',$whereclause);//used for jqgrid
					$columninfosearch = '[
								{"name":"IOH Id","index":"iohid","hidden":false},
								{"name":"Consumer", "index":"consumername", "hidden":false},				
								{"name":"Email Id","index":"email","hidden":false},
								{"name":"Plan Name","index":"planname","hidden":false},
								{"name":"Status","index":"status","hidden":true},
								{"name":"","index":"iohid","hidden":false,formatter:urlformatter},

							]';
					$consumers->post('columninfo', $columninfosearch);
					$consumers->post('editbtnenable','false');
					$consumers->post('deletebtnenable','false');
					$consumers->post('savebtnenable','false');
					echo $consumers->execute(); 
				?>
			</td>
		</tr>
	</table>
	</form>
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

