<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script src="/ayushman/assets/js/jquery.supertextarea.min.js"></script>
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet" type="text/css"/>	
<script type="text/javascript">
$(document).ready(function(){
	showremaingchars();
});
function showremaingchars()
{
	$("textarea").supertextarea({
	   tabr: {use: true, space: true, num: 3}
	   , maxl: 1000
	   , dsrm: {use: true, text: 'remaining characters...', css: {'color': '#11587E','font-family': 'tahoma, Helvetica, sans-serif','font-weight': 'normal','font-size': '11px'}}
	});
}
function uploaddocprofile(file)
{
	ext = (file.value).split('.');
	if(ext[1]== "txt"){
		document.forms["docprofile"].submit();
		$("#lblprofileerror").removeClass("bodytext_error");
		$("#lblprofileerror").addClass("bodytext_normal");
	}
	else{
		$("#lblprofileerror").removeClass("bodytext_normal");
		$("#lblprofileerror").addClass("bodytext_error");
	}
}
function getframeconetnt()
{	
	var data= $("#hiddenframe").contents().find("body").html();
	if(data == "" || data == null )
		$("#profileforpat").val("<?=$docprofile ?>");
	else		
		$("#profileforpat").val(data);
	
}

</script>	
	<div id="uploadtxt" >
		<img src="/ayushman/assets/images/bullet.png" width="7" height="7"/><label> &nbsp;Profile as seen by Patient </label>
		<textarea name="profileforpat" id="profileforpat" onfocus="showremaingchars()"  style="height:100px;resize:none;" class="form-control"><?=$docprofile; ?> </textarea> 
		
		  <iframe name="hiddenframe" id="hiddenframe"  hidden="true" style="display:none;"  onload="getframeconetnt()" ></iframe>
		  <form id="docprofile" method="post" enctype="multipart/form-data" action="/ayushman/cimagedisplay/uploadtext" target="hiddenframe" > 
			<input  type="hidden" id="userid" name="userid" class="bodytext" value="<?= $userid?>"/>
				
			<input type="button" name="button" id="button" value="Or upload text file" style="background:white;color:#00aca9;border-radius: 5px;width:120px;display:block;position:absolute;float:left;left:0px;cursor:hand;font-size:11px;"/>  
			<label style="background:white;width:120px;display:block;position:absolute;float:left;left:0px;z-index:100px;opacity:0;cursor:hand;">
				<input type="file" name="file" id="file" value="Choose File" onchange="uploaddocprofile(this)" class="regnbutton"/>
			</label>		
		  </form>
		  <table><tr>
			<td width="137px" style="padding-top:10px;" >
			<p id="lblprofileerror" class="bodytext_normal">Upload profile file in txt format only....</p>
			</td>
		  </table>
		
    </div>