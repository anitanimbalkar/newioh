<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="/ayushman/assets/js/listboxcomponent.js"></script>
<script src="/ayushman/assets/js/timer.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		var jsonIllness = [{id: "listboxillness",	dataitem:{
                                0:{textbox:"",minlength:1,autocomplete:'true',watermarktext:'Diagonostic Lab Name',query:'select id as id, nameofcenter as value from nameofpathlogistcenter where nameofcenter'},		
								1:{textbox:"",minlength:1,autocomplete:'true',watermarktext:'Test Name',query:'select id as id, testname_c as value from testmasters where active_c=1 and testname_c'},

								
								
							},targetid: "tags",boxes:3,label: "Select"}];
		$(document).ready(function() {
		createlistbox(jsonIllness);
			$('#loading').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				modal: true,
				height: "30",
				resizable: false,
				width: "100px"
			});
			if($.trim($('#consultationerrorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#consultationerrorlistdiv').html()),'error','errordialogboxid');
				
			if($.trim($('#consultationmessagelistdiv').html()) != "")
				showNotification('250','50','Errors',$.trim($('#consultationmessagelistdiv').html()),'notification','messagedialogboxid',5000);
		});
		
		function upload(file)
		{	var val=getselecteditemsinjson("tags",3);
			val=JSON.parse(val);
			console.log(val[0]);
			var tagname = ["pathologistsid","testid"];
			for(var count in tagname)
			{	
				var temp=val[count];console.log(document.getElementById(tagname[count]));
			document.getElementById(tagname[count]).value = temp[1];
			}
			
			document.getElementById("lblimageerror").style.display = "none";
			ext = (file.value).split('.');
			if(ext[1]== "xls" || ext[1]== "xlsx")
			{
				document.getElementById("lblimageerror").style.display = "none";
				$("#submit").trigger("click");
			}
			else
				document.getElementById("lblimageerror").style.display = "block";
		}
	</script>
<div style="width:inherit;height:auto; vertical-align:middle;padding:6px;margin:3px; overflow-x:hidden;border:1px solid #c6dbe4;"> 
	<div style="height:auto;width:inherit;" >				  
		<span class="bodytext_bold" style="float:right">Download xls format for placing Bulk Orders <input type="button"  value="Download Format" onclick="window.location.href='/ayushman/cbulkorders/download'"/></span></span><br/>
		<form id="consultationdataform" method="post" enctype="multipart/form-data"  action="/ayushman/cbulkorders/upload"  >
			<tr>
			
			<td align="center" valign="center" width="30%" class="bodytext_normal"style="display:none;padding:5px;">
			<div id="tags" class="ui-widget">
						</div>
			</td>
			<td align="right" valign="center" width="30%" class="bodytext_normal"style="display:none;">
			<span class="bodytext_bold" style="float:right">Place Bulk Orders
				<input type="file" name="file" id="file" value="Choose File"  onchange="upload(this)" class="bodytext_normal"/>  <label class="bodytext_normal"></label><label id="lblimageerror" style="display:none;" class="bodytext_error">Selected file should be in .xsl format...</label>
				<input type="hidden" name="serviceid" id="serviceid" value="<?php echo $serviceid; ?>" />
				<input type="hidden" name="packageid" id="packageid" value="<?php echo $packageid; ?>" />
				<input type="hidden" name="bookingid" id="bookingid" value="<?php echo $bookingid; ?>" />
				<input type="hidden" name="pathologistsid" id="pathologistsid" />
				<input type="hidden" name="testid" id="testid" />
				<input type="submit" name="submit" id="submit" style="display:none;" value="upload"/>
			</span>
			</td>
			</tr>
		</form>
	</div>
	<div style="padding-top:10px; width:100%;border-top:1px solid black;margin-top:40px;" style="bodytext_normal">
	Download Uploaded data by Service Provider <input type="button" value="Download" onclick="window.location = '/ayushman/cscript/exportparameters?ids=<?php echo $bookingid; ?>'" />
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="consultationerrorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="consultationmessagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>