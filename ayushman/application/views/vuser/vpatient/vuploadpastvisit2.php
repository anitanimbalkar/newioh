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
		<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
		<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
		<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
		<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
		<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
		<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
		<script src="/ayushman/assets/app/lib/jquery-multiselect.js"></script>
		<script src="/ayushman/assets/app/lib/jquery-ui-multiselect.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.multiselect.js"></script>
		<script src="/ayushman/assets/js/newlistboxcomponent.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.flot.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.flot.time.min.js"></script>
		<script src="/ayushman/assets/app/lib/excanvas.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.flot.selection.min.js"></script>
		<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script> 
		<script src="/ayushman/assets/app/lib/plugins.js"></script> 
		<script src="/ayushman/assets/app/lib/main.js"></script> 
		<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
		<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<script src="/ayushman/assets/app/js/createDialog.js"></script>
		<script src="/ayushman/assets/app/js/controllers/uploadReportCtrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
    </head>
<style>
a:link {
    color: blue;
}

a:visited {
    color: blue;
}

a:hover {
    color: hotpink;
}

a:active {
    color: red;
}

	/* BASIC STYLINGS
============================================================================= */



/* numbered buttons */
#status-buttons                 {  }
#status-buttons a               { color:black; display:inline-block; font-size:13px; margin-right:5px; text-align:center; text-transform:uppercase; }
#status-buttons a:hover         { text-decoration:none; }
#status-buttons span            { background:rgba(30, 190, 240, 0.6); display:block; height:30px; margin:0 auto 10px; padding-top:5px; width:30px; 
    border-radius:50%; }

/* active buttons */
#status-buttons a.active span   { background:rgba(30, 190, 240, 0.6); }
.textcolor
{
color: black; !important
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
								background:rgba(30, 190, 240, 0.6);
								color: black;
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
    background: rgba(30, 190, 240, 0.6);
    color: black;
    text-decoration: none;
}
 .headingButton:hover, .headingButton:focus{
 	background: #f16060;
 }				
	</style>
<body>
<div id="ng-app" ng-app="app" ng-controller="uploadReportCtrl">
   <div ng-switch="step" ng-show="!showDetails">
<!--   <h4 style=" background: #5cb1b6 !important;border-radius: 0;color:#fff; padding: 10px 5px 10px 15px;margin-top: 0;">
		<span>Upload Reports</span>
		<span class="headingButton" ng-click="showDetails = ! showDetails">View Reports</span>
   </h4>-->
	<div class="tab-section">
        <ul>
            <li>
                <a id="uploadreport" name="uploadreport" class="active-tab" style="height:40px" >
                   Upload Reports </a>
            </li>
            <li>
                <a id="viewreport" name="viewreport" style="height:40px"
				ng-click="showDetails = ! showDetails" > View Reports </a>
            </li>
        </ul>
    </div>
   <div class="text-center" >
          <!-- the links to our nested states using relative paths -->
          <!-- add the active class if the state matches our ui-sref -->
          <div id="status-buttons" class="text-center">
              <a   style="color: black;margin-top: 50px;"><span ng-style="activestyle1" style="color: #fff;">1</span> Select Files</a>
              <a   style="color: black;margin-top: 50px;"><span ng-style="activestyle2"style="color: #fff;">2</span> Tag Reports</a>
              <a   style="color: black;margin-top: 50px;"><span ng-style="activestyle3"style="color: #fff;">3</span>Review & Upload</a>
          </div>
   </div>        
   <!--<hr>-->
		<div ng-switch-when="1">
			<div ng-include src="'/ayushman/assets/app/partials/UploadReports/Step1.html'">
			</div>
		</div>	
		<div ng-switch-when="2">
			<div ng-include src="'/ayushman/assets/app/partials/UploadReports/Step2.html'">
			</div>
		</div>
		<div ng-switch-when="3">
			<div ng-include src="'/ayushman/assets/app/partials/UploadReports/Step3.html'">         
			</div>
		</div>
</div>
<div id="ViewPres" class="formbodytext_normal textcolor" ng-show="showDetails">
	<div class="tab-section">
        <ul>
            <li>
                <a id="uploadreport" name="uploadreport" style="height:40px" ng-click="showDetails = ! showDetails">
                   Upload Reports </a>
            </li>
            <li>
                <a id="viewreport" name="viewreport"  style="height:40px" class="active-tab"> View Reports </a>
            </li>
        </ul>
    </div>
<!--	<h4 style=" background: #5cb1b6 !important;border-radius: 0;color:#fff; padding: 10px 5px 10px 15px;margin-top: 0;">
		<span>View Reports</span>
		<span class="headingButton" ng-click="showDetails = ! showDetails">Upload Reports</span>
	</h4>-->
	<br />
	<div my-reports ng-controller="myreportsCtrl"></div>
</div>

</div>
</body>