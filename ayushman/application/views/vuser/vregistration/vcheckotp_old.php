<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/web2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript">
	$(function(){
			var verificationcode = new LiveValidation('verificationcode',{onlyOnSubmit: true });
			verificationcode.add( Validate.Length, { maximum: 20} );
			verificationcode.add( Validate.Presence );
			
			if('<?php echo $objuser->email; ?>' == '' )
				document.getElementById('emailTr').style.display = "none";
			if('<?php echo $objuser->mobileno1_c; ?>' == '')
				document.getElementById('mobileNumberTr').style.display = "none";
	});
</script>
<div class="panel activateformdiv" >				
	<div class="formHeader">Account Activation</div>	
		<div style="border:1px solid #eee;">
		<form id="checkotpform" action="submitcheckotpform" method="post" accept-charset="utf-8">
			
			<div style="height:90%;padding:20px;padding-bottom: 0px;">	
				<span class="bodytext_bold">Your registration is successfully completed. You can login using username and password.To activate your account please enter verification code sent to your email/ mobile.</span>
				<div class="row">
					<div class="col-lg-12 form-group" style="text-align:left; margin-left:29%">
						<label>Username:</label>
						<span class="labeltext" style="margin-left:10%;"> <?= $objuser->username;?></span>
					</div>
				</div>
				<div class="row" id="mobileNumberTr">
					<div class="col-lg-12 form-group" style="text-align:left; margin-left:29%">
						<label>Mobile Number :</label><span class="labeltext"style="margin-left:3%;"> <?= $objuser->isdmobileno1_c.'-'.$objuser->mobileno1_c;?></span>
					</div>
				</div>
				<div class="row" id="emailTr">
					<div class="col-lg-12 form-group" style="text-align:left; margin-left:29%">
						<label>Email:</label><span class="labeltext" style="margin-left:14.5%;"> <?= $objuser->email;?></span>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 form-group" style="text-align:left; margin-left:29%">
						<label>Verification code:</label>
						<span><input id="verificationcode" name="verificationcode" type="text" class="" size="25" style="border: 1px solid #5cb1b6;
width:87px;margin-left:2%" />&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($error, 'verificationcode'); ?></font></span>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-20 form-group" align="right">
						<input type="hidden" id="userid" name="userid" value="<?php echo $objuser->id; ?>"> <input type="submit" class="regnbutton"  value="ACTIVATE ACCOUNT>>" />
					</div>
				</div> 
			</div>
		</form>
	</div>
</div>