<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
		var username = new LiveValidation('username', {onlyOnSubmit: true });
		username.add( Validate.Presence );
		
});
function clearerror(divID)
{
	document.getElementById(divID).innerHTML = '';
}
</script>
<form id="verifyuserform" action="submitverifyuseremailform" method="post" accept-charset="utf-8">
	<div class="panel activateformdiv" style="padding-bottom:7%">
		
			<div class="formHeader">Forgot your password? </div>
			<div class="formRow" style="padding-left: 3%;">
				<span class="bodytext_normal">To reset your password, enter the username you use to Log in to</span> <strong class="bodytext_bold">India Online Health</strong>
			
				<div class="form-group" >
					<label for="username">Username</label>
					<input type="text" class="form-control" style="width:250px;" id="username" name="username" placeholder="Username" autocomplete="on">
				</div>
				<div class="bodytext_error" id="error" ><?= Arr::get($errors, 'username'); ?></div>
				<div class="form-group">				
					<button type="submit" name="submitverifyuseremailform" class="btn btn-info" style="float:none;">CONTINUE >></button>
				</div>
			</div>
		</div>
	
</form> 