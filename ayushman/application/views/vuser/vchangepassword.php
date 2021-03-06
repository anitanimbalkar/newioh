<script src="/ayushman/assets/js/jquery.tools.min.js"></script>
<style type="text/css">
.error {
    color: red;
    font-style: italic;
	font-family:Verdana,Arial,Helvetica,sans-serif;
	font-size:9pt;
}
</style>
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> 
$(document).ready(function() {
	$("#changepwform").validator({ position: 'center right' });
	if($.trim($('#messagelistdiv').html()) != "")
		showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);

});
$.tools.validator.fn("[minlength]", function(input, value) {
	var min = input.attr("minlength");
	
	return value.length >= min ? true : {     
		en: "Password should be at least " +min+ " character" + (min > 1 ? "s" : ""),
		fi: "Kentän minimipituus on " +min+ " merkkiä" 
	};
	
});
$.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
	var name = input.attr("data-equals"),
		 field = this.getInputs().filter("[name=" + name + "]"); 
	return input.val() == field.val() ? true : [name]; 
});
$.tools.validator.fn("[data-notequals]", "Value should not equal with the $1 field", function(input) {
	var name = input.attr("data-notequals"),
		 field = this.getInputs().filter("[name=" + name + "]"); 
	return input.val() != field.val() ? true : [name]; 
});
</script>
<div class="panel" style="max-width:100%;height:auto;overflow:hidden;">
	<div class="row editformHeader">
		<div class="col-sm-4 col-md-4"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Change Password</div>
	</div>
	<div style="width:100%; margin:15px;">
		<div style="background-color:#ecf8fb;width:96%;">
			<div class="bodytext_bold" style="margin:15px;font-size:12px; line-height:20px;">
			Enter a new password for your <em>IndiaOnlineHealth</em>, We highly recommend you to create a unique password - one that you don't use for any other websites. Password must be 8 characters long </div>
		</div>
		<form id="changepwform" autocomplete="off" role="form" action="submitbuttononclick" method="post" accept-charset="utf-8" >
			
				<INPUT TYPE="hidden" NAME="username" VALUE="<?php echo $obj_user->Firstname_c ; ?>">
				<div class="col-sm-8">	
					<label class="col-sm-5 control-label" for="oldpass">Current Password *:</label>
					<div class="col-sm-6">
						<input name="oldpass" type="password" class="form-control" id="textfield" minlength="8" maxlength="45" required="required"  /> <font size="1px" color="red"><?= Arr::get($errors, 'oldpass'); ?></font>
					</div>
				</div>
				<div class="col-sm-8" style="margin-top:5px;">	
					<label class="col-sm-5 control-label">New Password *:</label>
					<div class="col-sm-6">
						<input name="password" type="password" class="form-control" id="textfield2"  minlength="8" maxlength="45" required="required" data-notequals="oldpass"  /> <font size="1px" color="red"><?= Arr::get($errors, 'password'); ?></font>
					</div>
				</div>
				<div class="col-sm-8" style="margin-top:5px;">	
					<label class="col-sm-5 control-label">Confirm New Password *:</label>
					<div class="col-sm-6">
						<input name="password_confirm" type="password" class="form-control" id="textfield3"  minlength="8" maxlength="45" required="required" data-equals="password"  />
					</div>
				</div>
				<div class="col-sm-12" style="margin-top:5px;">
					<input type="submit" class="regnbutton" style="float:right;margin-right:10px;" value="Change Password" />
				</div>
				<input type="hidden" name="userid" value="<?= $obj_user->id ?>"/>
		</form>
	</div>
</div>
<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'success'); ?>
	</div>
</div>
