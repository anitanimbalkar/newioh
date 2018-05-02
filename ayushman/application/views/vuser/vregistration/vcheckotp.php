<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css" />
<link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />
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
<div class="top-header" style="height: auto !important">
    <div class="col-xs-2 left-menu-btn">
        <a href="/ayushman/home/index.shtml"> <img border="0" src="/ayushman/assets/images/arrow_back.png" width="24"> </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8">
        <a class="top-logo" href="/ayushman/home/index.shtml">
                <span> Account Activation</span>
        </a>
    </div>
</div>

<div class="panel activateformdiv" >

    <div>
        <form id="checkotpform" action="submitcheckotpform" method="post" accept-charset="utf-8">

            <div style="height:90%;padding:10px;padding-bottom: 0px;">
                <span class="bodytext_bold">Your registration is successfully completed. You can login using username and password.To activate your account please enter verification code sent to your email/ mobile.</span>
                <div class="row">
                    <div class="col-lg-12 form-group" style="text-align:left;">
                        <label>Username:</label>
                        <span class="labeltext"> <?= $objuser->username;?></span>
                    </div>
                </div>
                <div class="row" id="mobileNumberTr">
                    <div class="col-lg-12 form-group">
                        <label>Mobile Number :</label><span class="labeltext"> <?= $objuser->isdmobileno1_c.'-'.$objuser->mobileno1_c;?></span>
                    </div>
                </div>
                <div class="row" id="emailTr">
                    <div class="col-lg-12 form-group">
                        <label>Email:</label><span class="labeltext" > <?= $objuser->email;?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <label>Verification code:</label>
                        <span><input id="verificationcode" name="verificationcode" type="text" class="labeltext" size="25" style="border: 1px solid #5cb1b6;
width:87px;" />&nbsp;&nbsp;&nbsp;<font color="#CC0000" style="font-weight: normal;font-family: tahoma,Helvetica,sans-serif;font-size: 11px;margin: 0 0 0 " ><?= Arr::get($error, 'verificationcode'); ?></font></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group" align="center">
                        <input type="hidden" id="userid" name="userid" value="<?php echo $objuser->id; ?>"> <input type="submit" class="regnbutton activateaccount"  value="ACTIVATE ACCOUNT" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>