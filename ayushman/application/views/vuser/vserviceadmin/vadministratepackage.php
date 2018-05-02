<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/easyui.css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/icon.css">
<script type="text/javascript" src="/ayushman/assets/js/jquery.easyui.min.js"></script>
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
		if($.trim($('#listerrorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#listerrorlistdiv').html()),'error','errordialogboxid');
			
		if($.trim($('#listmessagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#listmessagelistdiv').html()),'notification','messagedialogboxid',5000);
		<?php 
			$result = $packageservices;
			   for($i=0;$i<count($result);$i++){
					$service = ORM::factory('service')->where('id','=',$result[$i]->serviceid_c)->find();
					echo "addTab('".$service->name_c."','/ayushman/cservicecomponents/foradmin?serviceid=".$service->id."&packageid=".$package['id']."&userid=".$userid."');";
			  }
		?>
	});
	function addTab(title, url){
		if ($('#tt').tabs('exists', title)){
			$('#tt').tabs('select', title);
		} else {
			var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
			$('#tt').tabs('add',{
				title:title,
				content:content,
				closable:false
			});
		}
	}
</script>
<div style="width:810px;height:auto; vertical-align:middle;padding:7px;margin:3px; overflow-x:hidden;" class="Heading_Bg"> 
	&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Administrate Package
</div>
<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:inherit;"  >	
		<div style="height:auto;width:100%;float:left;padding:7px;">
			<span class="bodytext_normal"></span><span class="bodytext_bold"><?php echo $package['name_c']; ?>&nbsp;( <?php if($package['publishto_c'] == 8){ echo 'Published for corporates';}else{echo 'Published for Individual Users';} ?>)</span>
		</div>
		<div style="height:auto;width:100%;float:left;padding-left:7px;padding-right:7px;">
			<hr/>
		</div>
		<div style="height:auto;width:100%;float:left;padding:7px;">
			<span class="bodytext_normal"><?php echo $package['description_c']; ?></span>
		</div>
	</div>
</div>
<div style="width:810px;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div id="tt" class="easyui-tabs" style="width:inherit;height:300px;">
	</div>
</div>
<div style="background-color: #ecf8fb;border-top:1px solid #c6dbe4;border-bottom:1px solid #c6dbe4; width:819px;height:auto; vertical-align:middle;padding:2px;margin:3px; overflow-x:hidden;">
	<input type="button" value="Back" onclick="window.location = '<?php $session = Session::instance();	$back = $session->get('backurls');echo $back[count($back)-2]; ?>'" class="button" style="width:100px;height:23px;float:right;margin-right:10px;"/>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="listerrorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="listmessagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>