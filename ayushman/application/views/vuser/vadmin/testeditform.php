<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="/ayushman/assets/js/listboxcomponent.js"></script>
<script src="/ayushman/assets/js/timer.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/embed-compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		var jsonIllness = [{id: "listboxillness",	dataitem:{
                               		
								0:{textbox:"",minlength:1,autocomplete:'true',watermarktext:'Test Name',query:'select id as id, testname_c as value from testmasters where aliasto_c=-1 and active_c=1 and testname_c'},

								
								
							},targetid: "tags",boxes:2,label: ""}];
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
			var tagname = ["testid"];
			for(var count in tagname)
			{	
				var temp=val[count];console.log(document.getElementById(tagname[count]));
			document.getElementById(tagname[count]).value = temp[1];
			}
			$('#bill').submit();
			
		}
			</script>
			
			<style type="text/css">
		
		#textinput.ui-autocomplete-input.watermark{
		width: 56% !important;
		}
		#textinput.ui-autocomplete-input.listboxcomponenttext{
		width: 56% !important;
		}
		</style>

<div  id="divedittest" class="content_bg" style=" width:100%; height:93%;overflow:auto;" align="center" > 
	<table id="editdrugtable" class="body_bg" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:hidden;border:0px;overflow-x: hidden;padding-left:10px;padding-right:10px;padding-top:10px">
	 <form id="bill" action ="/ayushman/cmasterdatavalidation/savetestdetails" method="post">
		<tr>
			<td colspan="3" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;
			Test Details</td>
		</tr>
		
			
		<tr>
			<td width="45%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Alias Name: &nbsp;&nbsp;&nbsp;<input name="aliasname" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objtest->testname_c); ?>"/></td>
			<td width="13%" align="left" style="padding-left:41px;padding-top:6px" class="bodytext_bold">Test Name:
			</td>
			<td>
			<div style="width=140px" id="tags" class="ui-widget">
			</div>
			</td>
		</tr>
		
		
		<tr>
			<td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_bold">Specimen:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="sample" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objtest->sample_c); ?>"/></td>
						<td align="left" style="padding-left:41px;padding-top:6px" class="bodytext_bold">CPT Code:</td><td>&nbsp;&nbsp;&nbsp;<input name="cptcode" style=" width:53.5%;border:none;padding-left:10px; border-bottom:1px solid;"value="<?php echo trim($objtest->cptcode_c); ?>"/></td>
			
		</tr>
		
		<tr>		
			<td colspan="1" align="left" style="padding-left:10px;padding-top:8px; width=55%" class="bodytext_bold">LOINC Code:&nbsp;&nbsp;&nbsp;&nbsp;<input name="loinccode" style=" width:57.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objtest->loinccode_c); ?>"/></td>
			<input type="hidden" id="id"  name="id" value="<?php echo trim($objtest->id); ?>" style=" width:87.5%;border:none; border-bottom:1px solid;font-weight:bold"/>
			
		</tr>
		<tr><td colspan="1">&nbsp;</td></tr>
		<tr>
		<td colspan="1" align="left" style="padding-left:10px;padding-top:0px; width=75%" class="bodytext_bold">Other Acceptable Specimen:<input name="category" style=" width:37.5%;border:none; border-bottom:1px solid;"value="<?php echo trim($objtest->otherspecimens_c); ?>"/></td>
		<input type="hidden" name="testid" id="testid" />
		</tr>
		
		<tr>
				<td colspan="1" style="padding-left:10px;padding-top:10px" class="bodytext_normal">
					<input type="submit" class="button" height="22" style="width: 80px; height: 25px; " value="Save" onclick="upload(this)"/>
				</td>
		</tr>
		</form>
		
	</table>
</div>

