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
		<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
			<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap-theme.min.css" />
			<link rel="stylesheet" href="/ayushman/assets/app/css/main.css" />
			<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
			<script src="/ayushman/assets/app/lib/xmpp.js"></script>
			<script src="/ayushman/assets/app/lib/jsjac.js"></script>
			<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
			<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
			<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
			<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
			<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
			<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
			<script src="/ayushman/assets/app/js/app.js"></script>
		<link rel="stylesheet" href="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.simple-dtpicker.css" />
		<script src="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.simple-dtpicker.js" ></script>

			<script src="/ayushman/assets/app/js/directives.js"></script>
			
			<script src="/ayushman/assets/app/js/controllers/notesandremindersctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/landingctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/dashboardctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/docpastappointment.js"></script>
			
			<script src="/ayushman/assets/app/js/controllers/followupctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/pastbillctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/emrctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/templatectrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/examctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/riskfactorctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/personalizationctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/mycertificatesctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/visitsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/consappctrl.js"></script>

			
			<script src="/ayushman/assets/app/js/services/notesService.js"></script>
			<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
			<script src="/ayushman/assets/app/js/services/bookappService.js"></script>
			<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
			<script src="/ayushman/assets/app/js/services/dashboardservice.js"></script>
			<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
			<script src="/ayushman/assets/app/js/services/examinfoservice.js"></script>
			<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
			<script src="/ayushman/assets/app/js/services/personalizationservice.js"></script>
			<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
			<script src="/ayushman/assets/app/js/services/trackerservice.js"></script>
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
			
			<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
			<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
			<link rel="stylesheet" href="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid.css" />

			<script src="/ayushman/assets/app/js/createDialog.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/app/css/main1.css" />
        <!--<div id="lazy" style="min-width:1024px;">-->
		<!--<div id="lazy">
			<div xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app" ng-strict-di style="height:99%">
				<div id="template"  ng-controller="templateCtrl" style="height: 95%">
					<div id="contentDiv" ng-view style="height:auto;overflow-y: auto;"></div>
				</div>
			</div>
		</div>-->
		<input type="hidden" id="patid" value="<?php echo $patientid?>">
			<div id="contentDiv" style="height:auto;">	
				<div style="height:auto">							
					<reminders  patient_id="<?php echo $patientid?>" ></reminders>						
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