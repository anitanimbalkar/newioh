<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
<!-- place in header of your html document -->
<script>
tinymce.init({
    selector: "textarea#newsdescription",
    theme: "modern",
    width: 390,
    height: 250,
    
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor jbimages"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image jbimages | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>

<!-- place in body of your html document 
<textarea id="elm1" name="area"></textarea>-->
<script type="text/JavaScript">
	$(document).ready(function() {
		if ( $.browser.msie ) {
			$('#newscreator').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				width: "auto",
				modal: true,
				height: "auto",
				resize: "auto",
				resizable: false
			});
		 } else {
			$('#newscreator').dialog({
				autoOpen: false,
				show: "fade",
				hide: "fade",
				width: "auto",
				modal: true,
				height: "auto",
				resize: "auto",
				resizable: false
			});
		 }
		
		$(".ui-dialog-titlebar").hide();
		
		var newstitle = new LiveValidation('newstitle', {onlyOnSubmit: true });
		newstitle.add( Validate.Presence );
		
		if($.trim($('#errorlistdiv').html()) != "")
			showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()) + '</br>You will not be able to create, edit the news and articles.','error','errordialogboxid');
		if($.trim($('#messagelistdiv').html()) != "")
			showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);
		
		});
	function addnews()
	{
		document.getElementById('newsid').value = -1;
		$('#newscreator').dialog('open');
		
	}
	
	function editnews(newsid)
	{
		document.getElementById('newsid').value =newsid;
		getnews(newsid);
	}
	
	function getnews(newsid)
	{
		
			$.ajax({
			cache: false,
			  url: "/ayushman/cnewsmanager/getnewsdetails?newsid="+newsid,
			  success: function( data ) {
					data =  JSON.parse(data);
					if(data['type'] == 'error')
						showMessage('550','200','Retrieving plan',data['data'],data['type'],'id');
					else
					{
						var plandetails = new Array();
						plandetails = data['data'];
						document.getElementById('newstitle').value = data['nametitle'];
						document.getElementById('newsdescription').value = data['details']; 
						
						$('#newscreator').dialog('open');
					}
				},
				error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
			});
		
	}
</script>

<div id="body_contantpatientpage" style="width:828px; height:500px;"> 
	<table>
		<tr>
			<td style="width:825px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="160" class="Heading_Bg">&nbsp;
							<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"><strong>&nbsp;&nbsp;News and articles</strong>
						</td>
					</tr>
				</table> 
			</td>
		</tr>
		<tr>
			<td style="width:825px;">
				<table width="100%" border="0" cellspacing="0" cellpadding-top="2px" cellpadding-left="10px" >
					<tr>
						<td>&nbsp;
							<input type="button" class="button" value="Add" onclick="addnews();" style="width:100px;height:20px;" />
						</td>
					</tr>
				</table> 
			</td>
		</tr>
	</table>
	<div style="height:auto;overflow:auto;">
		<table>
			<tr >
				<td align="left" valign="top" class="content_bg" style="padding-top:0px;overflow:auto;">
					<?php
						$objsNews = ORM::factory('newsdetail');
						$objsNews = $objsNews->where('active_c','=','active')->find_all()->as_array();
						$news = array();
						echo '<div width="100%" height="170px" style="white-space: wrap;"><ul id="navlist">';

						if(count($objsNews) == 0){
							echo '<div style="width:700px; border-radius:5px;border: 3px solid #eee; padding-top:7px;height:20px;vertical-align:middle;" align="center" class="bodytext_bold">Add News and Articles</div>';
						}else{
							foreach($objsNews as $objNews)
							{
								echo '<li name="listitems">';
								$news= Request::factory('cnewscomponent/view');
								$news->post('id',$objNews->id);
								$news->post("height",'200');
								$news->post("width",'255');
								$news->post("newstitle",$objNews->newstitle_c);
								$news->post("details",$objNews->newsdescription_c);
								echo $news->execute(); 
								echo '</li>';
							}
						}
						echo '</ul></div>';
					?>
				</td>
			</tr>
		</table>
	</div>
</div>

<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors, 'plantypes'); ?>
		<?= Arr::path($errors,'saveplan'); ?>
		<?= Arr::path($errors, 'updateplan'); ?>
		<?= Arr::path($errors,'deleteplan'); ?>
	</div>
</div>
<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'saveplan'); ?>
		<?= Arr::path($messages,'deleteplan'); ?>
		<?= Arr::path($messages,'updateplan'); ?>
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
</div>
<div id="newscreator"  class="content_bg" style="width:500px;" >
	<form class="cmxform" id="planform" onsubmit="return validateForm();" action="/ayushman/cnewsmanager/save" method="post" autocomplete='false' >
		<table width="500px" height="300px" cellspacing="0"  cellpadding="0">
			<tr>
				<td class="content_bg">
					<table width="500px" height="15px" border="0" align="left" cellpadding="0" cellspacing="0">
						<tr>
							<td width="160" colspan="4" class="Heading_Bg">&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;News Details</td>
						</tr>
						
						<tr>
							<td height="30">&nbsp;</td>
							<td><span class="bodytext_bold">Title </span></td>
							<td><span class="bodytext_normal">:</span></td>
							<td><input type="text" style="border:none;border-bottom:thin solid #000000" autocomplete="off" title="Please enter news title" id="newstitle" name="newstitle_c"/></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td valign="top"><span class="bodytext_bold">News on Home page </span></td>
							<td valign="top"><span class="bodytext_normal">:</span></td>
							<td><textarea rows="15" cols="40" style="padding-bottom:25px; width:390px;resize:none;height:250px;background-color:white;"  id="newsdescription" name="newsdescription_c"></textarea></td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td valign="top">&nbsp;</td>
							<td valign="top">&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td height="30">&nbsp;</td>
							<td colspan="3">
								<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="20%" align="center" valign="middle" >&nbsp;</td>
										<td width="20%" align="center" valign="middle" >&nbsp;</td>
										<td width="20%" align="center" valign="middle"><input type="submit" class="button" height="22" style="width: 119px; height: 25px; " value="Save"/></td>
										<td width="5%" align="center" valign="middle" >&nbsp;</td>
										<td align="center" width="80px" valign="middle"><input type="button" class="button" height="22" onclick="$('#newscreator').dialog('close');" style="width: 119px; height: 25px; " value="Cancel"/></td>
										<td width="5%" align="center" valign="middle" >&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table width="500px" border="0" align="center" cellpadding="0" cellspacing="0" class="bodytext_normal">
						
					</table>
				</td>
			</tr>
		</table>
		<input name="newsid" id="newsid" type="hidden"/>
	</form>
</div>

