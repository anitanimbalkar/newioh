<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  ng-app="app"> <!--<![endif]-->
<head>

		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
		


<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/history.css" rel="stylesheet"/>
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">
<link href="/ayushman/assets/css/style2.css" rel="stylesheet">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet">
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet">
<link href="/ayushman/assets/app/css/visits.css" rel="stylesheet" type="text/css">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/ayushman/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="/ayushman/assets/app/lib/xmpp.js"></script>
<script src="/ayushman/assets/app/lib/jsjac.js"></script>
			
<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
<script src="/ayushman/assets/app/js/app.js"></script>
<script src="/ayushman/assets/app/js/directives.js"></script>
<script src="/ayushman/assets/app/js/controllers/consultationtemplatectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/landingctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/dashboardctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/docpastappointment.js"></script>
<script src="/ayushman/assets/app/js/controllers/myprofilectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/doctorprofilectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/invitectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/mypackagesctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/mypasswordctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/followupctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/pastbillctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/pastbilldatactrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/mycertificatesctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/staffdirectoryctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/emrctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/templatectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/examctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/notificationctrl.js"></script>

<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/riskfactorctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/personalizationctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/statementctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/accountbillsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mypatientsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mydoctorsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/visitsctrl.js"></script>
<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
<script src="/ayushman/assets/app/js/controllers/visitqueryctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/servicedirectoryctrl.js"></script>
<script src="/ayushman/assets/app/js/services/ipdpatientsservice.js"></script>


<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
<script src="/ayushman/assets/app/js/services/personalizationservice.js"></script>
<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
<script src="/ayushman/assets/app/js/services/examinfoservice.js"></script>
<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
<script src="/ayushman/assets/app/js/services/dashboardservice.js"></script>
<script src="/ayushman/assets/js/moment.js"></script>
<script src="/ayushman/assets/app/js/controllers/bookingappointmentctrl.js"></script>
<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
<script src="/ayushman/assets/app/js/services/trackerservice.js"></script>
<script src="/ayushman/assets/app/js/controllers/historynotesctrl.js"></script>
<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
<script src="/ayushman/assets/app/lib/UInewformmodule.js"></script>

<script src="/ayushman/assets/app/lib/jquery-multiselect.js"></script>
<script src="/ayushman/assets/app/lib/jquery-ui-multiselect.min.js"></script>
<script src="/ayushman/assets/js/newlistboxcomponent.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.min.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.time.min.js"></script>
<script src="/ayushman/assets/app/lib/excanvas.min.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.selection.min.js"></script>
<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script>
<script src="/ayushman/assets/app/lib/plugins.js"></script>
<script src="/ayushman/assets/app/lib/main.js"></script> 
<script src="/ayushman/assets/app/js/extra/agecalculator.js"></script>
<script src="/ayushman/assets/app/js/extra/dashboard.js"></script>
<script src="/ayushman/assets/app/js/controllers/chemistnetworkctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/dcnetworkctrl.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script src="/ayushman/assets/app/js/services/dashboardservice.js"></script>
<script src="/ayushman/assets/app/js/controllers/doctordashboardlandingctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/doctordashboardconsultationctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/reportsparameter.js"></script>
<script src="/ayushman/assets/app/js/createDialog.js"></script>
<script src="/ayushman/assets/app/js/controllers/immunizationctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/printablePrescriptioncontroller.js"></script>
<script src="/ayushman/assets/app/js/controllers/printablePrescriptionctrl.js"></script>
<link href="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid.css" rel="stylesheet"/>

	<!--<script src="/ayushman/assets/app/lib/jquery-multiselect.js"></script>
		<script src="/ayushman/assets/app/lib/jquery-ui-multiselect.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.multiselect.js"></script>
		    <link rel="stylesheet" type="text/css" href="/ayushman/assets/app/css/jquery.multiselect.css" />
    <link rel="stylesheet" type="text/css" href="/ayushman/assets/app/css/jquery-ui-multiselect.css" /> -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/stylesheet">
	[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
	  display: none !important;
	}
</style>
    <body>
	<div class="navbar navbar-inverse navbar-fixed-top" id="topNav" role="navigation">
  <div class="container" id="topHeader">
    
    <div class="navbar-header">
	
			
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
	  <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span> </button>
      <div class="logoWrapper" > <a href="/ayushman/cdashboard/view"><img  id="imgLogo" src="/ayushman/assets/images/Logo.png" /></a></div>
	  </div>
    <div class="collapse navbar-collapse" xmlns:ng="http://angularjs.org" id="ng-app">
	 <ul class="nav navbar-nav navbar-right">        		
		<li>
				<div class="doctorDetailsUser" id="template1"  ng-controller="templateCtrl" ng-cloak>   
				<div class="profileDoctornot" style="padding: 19px;">
				<notifications userid="<?php echo Auth::instance()->get_user()->id?>"></notifications></div>
				</div>
        </li>		
        <li>
			   <a href="javascript:void(0);" class="help" onclick="openwindow()"><i class="fa fa-life-ring"></i></br>Help</a>						
				<script type="text/javascript">
					function openwindow()
					{
						window.open("/ayushman/help/Help-ioh-DoctorModule-v1.0.html");
					}
				</script>
		</li>
		<li>
			<a href="/ayushman/cuser/logout" class="helplogout"><i class="fa fa-sign-out"></i></br>Log Out</a>						
		</li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div id="lazy" style="min-width:1024px;">
			<div xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app" ng-strict-di style="height:99%">
				<div id="template"  ng-controller="templateCtrl" style="height: 95%">
					<div id="contentDiv" ng-view style="height:auto;overflow-y: auto;"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
				var servername = '<?= $arr_xmpp["servername"]; ?>';
				var user_id = '<?= $objuser->id ?>';
				var doc_name = '<?= $objuser->Firstname_c  ?>';
				var xmpp_pass = '<?= $objuser->xmpppassword_c ?>';
		</script>
    </body>
</html>
