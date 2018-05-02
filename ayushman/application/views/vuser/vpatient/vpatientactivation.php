<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />
<script src="/ayushman/assets/js/sweet-alert.min.js"></script>
<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>


<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/sweet-alert.css">
<script type="text/javascript">
    $(document).ready(function() {
        var tempflag=<?php echo $couponapplied; ?>;
        if(tempflag==1)
        {

            swal({
                title: "Congratulations!!!",
                text: "We have applied a special coupon for you, which has unlocked special offers exclusively for Bajaj Allianz policy holders. To avail of them, please Login and choose special plans.",
                imageUrl: '/ayushman/assets/images/thumbs-up.jpg'
            });

        }
    });
    function closelogin(){
        $("#panel4").toggle("fast");
    }
</script>
<style type="text/css">
    .sweet-alert p{
        font-variant: small-caps !important;
        font-weight: bolder; !important;

    }

</style>
<div class="top-header" style="height: auto !important">
    <div class="col-xs-2 left-menu-btn">
        <a href="/ayushman/home/index.shtml"> <img border="0" src="/ayushman/assets/images/arrow_back.png" width="24"> </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8">
        <a class="top-logo" href="/ayushman/home/index.shtml">
                <span> Account Activated </span>
        </a>
    </div>
</div>
<div class="panel activateformdiv account-activated-div">
    <div class="account-activated-terms">
        <div class="account-activated-table">
        <table border="0" cellspacing="0" cellpadding="0"  class="content_bg table-responsive">

            <tr height="13pt" valign="top">
                <td colspan="3" align="left" class="bodytext_bold">
                    <br />
                    <?= $greet; ?></td>
            </tr>
            <tr height="126pt" valign="top">
                <td colspan="3"  align="left" class="bodytext_normal">
                    <div class="account-area">
                        <div class="account-activated-div-list-margin">Congratulations! Your member registration has been accepted and your IndiaOnlineHealth Id is <u><b><?php echo $id; ?></b></u>.<br/>
                        We encourage you to log-in at your earliest and familiarize yourself with your dashboard. Your dashboard contains links to different sections relevant for you. Here are some useful tips for getting the best experience from your <strong><i>IndiaOnlineHealth</i></strong> membership.
                        </div>
                        <table>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">Log-in to your account as soon as possible and update your demographic detail in ‘My profile’ section. Whenever there is a change in your address or contact details, you update the same at the earliest.</td></tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">You should then enter your Medical History in ‘My EMR’. This section includes your vaccinations, allergies, social habits, medical treatment received in the past and your family history relevant for heredity related information. You should also upload your past diagnostic reports. Accurately filling these pieces of information is a very important step as it helps your doctor to accurately assess your medical condition when he/she reviews your EMR.</td></tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">Before taking an appointment for On-line consultation, you need to identify at least one doctor from the panel using Search for Doctors and include him / her into your panel, called ‘My Doctors’. Remember, until, you include him/her into your panel, he cannot access your medical records. You can have as many doctors in your panel as you like.</td>
                            </tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">Before taking an appointment for On-line consultation, you need to identify at least one doctor from the panel using Search for Doctors and include him / her into your panel, called ‘My Doctors’. Remember, until, you include him/her into your panel, he cannot access your medical records. You can have as many doctors in your panel as you like.</td>
                            </tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">You can schedule an appointment for On-line consulting from his calendar for any available slot suited to you. Do make sure that you log-in at least 5 minutes before the appointment, so your consultation begins on-time. In particular, check your Webcam, Mike, Speaker and Broadband connection. For better video quality, you should have a white background and bright light on your face. Avoid facing camera on moving objects such as fan.</td>
                            </tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">Your On-line status will be visible to Doctor on his dashboard and he will initiate the call, as soon as he is free and ready for consultation. </td>
                            </tr>
                            <tr>
                                <td width="1%" valign="top">&bull;</td>
                                <td width="99%" class="account-activated-div-list-margin">After the consultation, doctor will update your EMR and issue a Visit summary containing diagnosis, prescription, investigations (if any), and follow-up advice. Subsequently, you will have the opportunity to connect with your drug store for ordering medicines and diagnostic lab for scheduling test, if needed. </td>
                            </tr>
                        </table>
                        Good old days are back and your doctor again begins to visit you at home through his tele-presence. And you never have to worry about your missing prescriptions and reports. In case, you need any help, our support staff' is on 'standby' to be of service to you - 24x7. Call, email, chat ….
                        <br/>Ayushman bhava!
                        <br />
                        <br />
                        <div class="">Team <strong><i>IndiaOnlineHealth</i></strong> </div>

                        <div class="bodytext_normal"><a class="bodytext_normal support-link">support@indiaonlinehealth.com</a></div>

                    </div>
                </td>
            </tr>
        </table>
        </div>
        <table width="100%">
            <tr height="13pt" valign="top">
                <td colspan="3"  align="right">
                    <table border="0px" width="100%">
                        <tr>
                            <td  style="align:left;padding-left:0px;width:60%;" class="bodytext_normal"></td>
                        </tr>
                        <tr>
                            <td width="100%" align="center">
                                <div class="login-inner-btn">
                                    <input type="button" onclick="closelogin()" style="width:100px;" value="Log in"  class="regnbutton" /></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div id="panel4" class="panel panel-default login-panal">
        <div class="panel-body">
            <div class="formheader">Secure Sign In <!--<a class="formclose" href="#" onclick="closelogin()"></a>--></div>

            <form id="loginformid" action="/ayushman/cuser/login"  role="form" method="post" accept-charset="utf-8">

                <div class="form-group" >
                    <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Username" autocomplete="on">
                </div>
                <div class="form-group" >
                    <input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sign-in">SIGN IN </button>
                    <a href="/ayushman/cpasswordmanager/view" style="color:#04706d; margin-top:10px;">Forgot Password?</a>
                </div>

            </form>
        </div>
    </div>

</div>