<script type="text/javascript" src="/ayushman/assets/js/jquery.watermark.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript"> 
$(document).ready(function() {
		$("#panel4").hide();
		
		var email = new LiveValidation('email', {onlyOnSubmit: true });
		email.add( Validate.Presence );
		
		var password = new LiveValidation('password',{onlyOnSubmit: true });
		password.add( Validate.Length, { minimum: 8} );
		password.add( Validate.Presence );
});
</script>
	<div id="loginfail"  class="panel loginfailformdiv">
		<div class="panel-body">
			<div class="formHeader">
				<img src="/ayushman/assets/images/Incorrect_icon.png"/>Incorrect Password
			</div>
			<div class="formRow">
				<div class="bodytext_error"><?= Arr::get($message, 'activate'); ?><?= Arr::get($message, 'email'); ?></div>	
				
				<form id="loginfailform" action="/ayushman/cuser/login"  role="form" method="post" accept-charset="utf-8">
					
					<div class="form-group" >
						<label for="email">Username</label>
						<input type="text" class="form-control" style="width:250px;" id="email" name="email" placeholder="Username" autocomplete="on">
					</div>
					<div class="form-group" >
						<label for="password">Password</label>&nbsp;
						<input type="password" class="form-control"  style="width:250px" id="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">					
						<a href="/ayushman/cpasswordmanager/view" style="color:#04706d; margin-top:10px;">Forgot Password?</a>
						
						<button type="submit" class="btn btn-info">SIGN IN >></button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
 
 