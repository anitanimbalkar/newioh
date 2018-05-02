<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.footer{
	clear:both;
	height:40px;
	line-height:40px;
	background-color:#ecf8fb;
	border-top:1px solid #a8c8d9;
	margin-top:25px;
}
</style>

<body style="height:100%;">
	<div style="line-height:25px;">
		<div class = "Heading_Bg">Choose Ayushcare User</div>	
	<div>
	<div style="width:100%;">
		<div style="width:95%;margin:auto">
			<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
				<div id="help-main" style="margin-left:5px;">
					<p class="bodytext_bold"style="font-size:12px;margin:10px;">Welcome to AyushCare.<br/> Please follow instructions to subscribe for AyushCare Services.</p>
				</div>
			</div>
			<form id="ayushform" method="post" enctype="multipart/form-data"  action="/ayushman/cchooseplanuser/submit">
			<FIELDSET class="table_roundBorder" style="padding:0px">
				<LEGEND class="bodytext_bold" style="font-size:100%">Choose Ayushcare Beneficiary</LEGEND>
				<div>
					<p style="margin:10px;">
						<input id="myself" type="radio" name="ayushcareUser" value="self"><label class="bodytext_bold" for="myself">I wish to subscribe myself for AyushCare Services.</label></input>	
						<br/>
						<input id="relative" type="radio" name="ayushcareUser" value="relative"><label class="bodytext_bold" for="relative">I want to sponsor a relative / friend for AyushCare Services.</label></input>
					</p>
				</div>
				<div align="right" class="footer" >
					<input type="button" class="button" onclick="checkSelected();" style="margin-top:6px;margin-right:10px;" value = "Proceed" ></input>
				</div>
			</FIELDSET>
		</form>
		</div>
	</div>
</body>
<script>
function checkSelected(){
	var selectedVal = "";
	var selected = $("input[type='radio'][name='ayushcareUser']:checked");
	if(selected.length > 0){
		$("#ayushform").submit();
	}
	else{
		alert("Please choose any one of the options.");
	}
}
</script>
