<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="/ayushman/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    $(document).ready(function() {
        if($.trim($('#errorlistdiv').html()) != "")
            showMessage('250','50','Registration Page Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
    });
</script>
<style type="text/css">
    a:link {
        color: #054471;}
    .text{
        font-family:Arial, Helvetica, sans-serif;
        font-size:10px;
        color:#054471;
        text-align:center;
        vertical-align:middle;
        font-weight:500;
        line-height: 7.5pt;
    }
</style>


<div class="col-xs-12 getting-started-mobile">
    <!-- <h1> Just click on the steps one by one and we'll take you there. </h1>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/choose-plan.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span class="label-1"> <label>1.</label> Choose Plan </span>
        </div>
    </div>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/doctor-pannel.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span> <label>2.</label> Create your Panel of Doctor </span>
        </div>
    </div>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/doctor-appointment.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span> <label>3.</label> Fix appoitment with your doctor </span>
        </div>
    </div>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/consult-doctor.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span> <label>4.</label> Consult your Doctor Online / In clinic </span>
        </div>
    </div>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/medicines.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span class="label-1"> <label>5.</label> Place order for </span>
        </div>
    </div>
    <div class="col-xs-12 pull-left no-padding">
        <div class="img-1 col-xs-3 no-padding">
            <img src="/ayushman/assets/images/diagnostic-tests.png" />
        </div>
        <div class="step-1 col-xs-9 no-padding">
            <span class="label-1"> <label>6.</label> Get e-Prescription </span>
        </div>
    </div>-->

        <div class="">
            <img width="100%" src="/ayushman/assets/images/flow.png" />
        </div>
        <!--<h1> Click the button below  </h1>
        <div class="col-xs-12 text-center">
            <a class="choose-plan-btn" onclick="closehelp();getcontent('/ayushman/cplanmanager/showselectedplan');" >Choose your Plan</a>
        </div>-->
</div>


<div height="500px" style="width:830px;" class="getting-started-section">

    <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- Save for Web Slices (HowItWorks.psd) -->
    <div class="getting-started-desc">
        <h1>Getting Started</h1>
        <h2>Welcome to IndiaOnlineHealth</h2>
        <h3>Click on help to get started</h3>
    </div>
    <table id="Table_01" width="480" height="262" border="0" cellpadding="0" cellspacing="0" style="padding-left:15%;">
        <tr>
            <td colspan="12">
                <img src="/ayushman/assets/images/HowItWorks_01.png" width="479" height="21" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="21" alt=""></td>
        </tr>
        <tr>
            <td rowspan="6">
                <img src="/ayushman/assets/images/HowItWorks_02.png" width="14" height="240" alt=""></td>
            <td class="text">Choose Plan</td>
            <td colspan="2" rowspan="4">
                <img src="/ayushman/assets/images/HowItWorks_04.png" width="31" height="139" alt=""></td>
            <td colspan="2" class="text">Create your Panel of Doctor</td>
            <td colspan="2" rowspan="4">
                <img src="/ayushman/assets/images/HowItWorks_06.png" width="27" height="139" alt=""></td>
            <td class="text">Fix appoitment with your doctor</td>
            <td colspan="3" rowspan="2">
                <img src="/ayushman/assets/images/HowItWorks_08.png" width="128" height="30" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
        </tr>
        <tr>
            <td rowspan="5">
                <img src="/ayushman/assets/images/HowItWorks_09.png" width="93" height="214" alt=""></td>
            <td colspan="2" rowspan="3">
                <img src="/ayushman/assets/images/HowItWorks_10.png" width="93" height="113" alt=""></td>
            <td rowspan="3">
                <img src="/ayushman/assets/images/HowItWorks_11.png" width="93" height="113" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="4" alt=""></td>
        </tr>
        <tr>
            <td rowspan="4">
                <img src="/ayushman/assets/images/HowItWorks_12.png" width="20" height="210" alt=""></td>
            <td class="text">Consult your Doctor Online / In clinic</td>
            <td rowspan="4">
                <img src="/ayushman/assets/images/HowItWorks_14.png" width="11" height="210" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
        </tr>
        <tr>
            <td rowspan="3">
                <img src="/ayushman/assets/images/HowItWorks_15.png" width="97" height="184" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="83" alt=""></td>
        </tr>
        <tr>
            <td rowspan="2">
                <img src="/ayushman/assets/images/HowItWorks_16.png" width="23" height="101" alt=""></td>
            <td colspan="2" class="text">Place order for <br>
                test / medicine</td>
            <td colspan="2" rowspan="2">
                <img src="/ayushman/assets/images/HowItWorks_18.png" width="27" height="101" alt=""></td>
            <td colspan="2" class="text">Get e-Prescription</td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="26" alt=""></td>
        </tr>
        <tr>
            <td colspan="2">
                <img src="/ayushman/assets/images/HowItWorks_20.png" width="97" height="75" alt=""></td>
            <td colspan="2">
                <img src="/ayushman/assets/images/HowItWorks_21.png" width="97" height="75" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="1" height="75" alt=""></td>
        </tr>
        <tr>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="14" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="93" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="23" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="8" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="89" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="4" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="23" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="4" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="93" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="20" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="97" height="1" alt=""></td>
            <td>
                <img src="/ayushman/assets/images/spacer.gif" width="11" height="1" alt=""></td>
            <td></td>
        </tr>
    </table>
    <div style="display:none;height:0px;">
        <div class="bodytext_error" id="errorlistdiv">
            <?= Arr::path($errors,'error'); ?>
        </div>
    </div>


    <div style="display:none;height:0px;">
        <div class="bodytext_normal" id="messagelistdiv">
            <?= Arr::path($messages,'message'); ?>
        </div>
    </div>
</div>
