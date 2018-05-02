<head>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
	<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
	<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" >
	<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
	<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
	<script src="/ayushman/assets/app/js/app.js"></script>
	<script src="/ayushman/assets/app/js/directives.js"></script>
	<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
	<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
	<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
	<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
	<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
	<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
	<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script> 
	<script src="/ayushman/assets/app/lib/plugins.js"></script> 
	<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
	<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script src="/ayushman/assets/app/js/createDialog.js"></script>
	<script src="/ayushman/assets/app/js/controllers/uploadorderreports.js"></script>
</head>
<style>
	/* BASIC STYLINGS
============================================================================= */



/* numbered buttons */
#status-buttons                 {  }
#status-buttons a               { color:#FFF; display:inline-block; font-size:12px; margin-right:10px; text-align:center; text-transform:uppercase; }
#status-buttons a:hover         { text-decoration:none; }
#status-buttons span            { background:#080808; display:block; height:30px; margin:0 auto 10px; padding-top:5px; width:30px; 
    border-radius:50%; }

/* active buttons */
#status-buttons a.active span   { background:#00BC8C; }
.textcolor
{
color: #5cb1b6; !important
}
.formbodytext_normal
{
	font-size: 0.9em ! important;
}

.button-style{
								width:100px;
								height:35px;
								font-size:20px;
								border-radius: 5px;
								background: #00aca9;
								color: #fff;
								text-align: center;
								text-decoration: none;

								}
				
.headingButton, .headingButton:hover, .headingButton:focus
{
	padding:9px 15px 9px;
    position: absolute;
    right: -1px;
    top: 1px;
    /*z-index: 3;*/
    background: #227474;
    color: #fff;
    text-decoration: none;
}
 .headingButton:hover, .headingButton:focus{
 	background: #f16060;
 }			
</style>
<body>
	<input type="hidden" id="orderid" value="<?php echo $orderid; ?>"/>
	<div id="ng-app" ng-app="app" style="position:relative;max-width:900px; width:100%;margin:0px auto 0px auto;" ng-controller="uploadorderreports">
		<h5 style=" background: #5cb1b6 !important;border-radius: 0;color:#fff; padding: 10px 5px 10px 15px;margin-top: 0;"><span>Upload Reports for the Order Number :<?php echo $orderid; ?></span></h5>
		
		<div style="padding:10px;font-weight: bold;width:50%;float:left;">
		IOH ID : <?php echo $IOHid; ?></br>
		Name Of The Patient : <?php echo $name; ?></br>
		Mobile No. : <?php echo $mobilenumber; ?><br>
		Age/Gender : <?php echo (date('Y')-date('Y', strtotime($dob)));?>/<?php echo $gender; ?><br>
		Reference Id : &nbsp;<Input type="text" style="width:30%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model = "referenceid" value="<?php echo $referenceid; ?>" ><br>
		Referred By : <input type="text" value="" style="width:30%;margin-bottom: 6px;margin-left:4px;" class="regnformcontrol ng-pristine ng-valid" ng-model="referenceBy" /><br>
		</div>
		<div style="padding:10px;font-weight: bold;width:50%;float:left;">Order Number : <?php echo $orderid; ?></br>
		<!-- Order Date : <?php //echo $orderdate; ?></br>-->
		Sample collection place : <input type="Text" style="width:30%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="samplePlace" /><br>
		Sample collection date : &nbsp;&nbsp;<input type="text" style="width:30%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="sampleDate"  jqdatepicker required /><br>
		Sample Id :    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp           <Input type="Text" style="width:30%;margin-left:6px;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="sampleId" value=<?php echo $sampleid; ?>><br>
		<label for="Datetxt1" style="float:left;width:38%;">Order Date* :</label> 
				<input id="Datetxt1" name="Datetxt" type="text" class="regnformcontrol ng-pristine ng-valid"  style="float:left;width:30%;margin-left:-8px;margin-bottom: 6px;"   ng-model="tag.Date"  jqdatepicker required />
		</div>		
		<br/>
		<div  ng-include src="'/ayushman/assets/app/partials/UploadReports/diagnoticcenterview.html'"></div>
		<div class="container" style="width:100%;padding-bottom:30px;  height: 50px;">
	<div   class="container"  style="border:0;padding-bottom:10px;padding-top: 3px;" >
			<div class="col-md-3">
			Prepared By : <Input type="text" class="regnformcontrol" style="width:20%;" ng-model="preparedby">
			</div>
		</div>
		<div style="float: right;margin-right: 9px;">
			<button class="btn button-style btn-s" ng-click="upload();" style="padding: 2px; font-size:14px;">
				Upload&nbsp <span class="glyphicon glyphicon-upload"></span> 
			</button>
		</div>
		<div style="float: left;margin-left: 9px;">
			<button class="btn button-style btn-s" style="padding: 2px;font-size:14px;" onclick="window.history.back();">
				<span class="glyphicon glyphicon-arrow-left"></span>&nbsp Back 
			</button>
		</div>
	</div>
	</div>
</body>
</form>