<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<script type='text/javascript' src='/ayushman/assets/public/lib/jquery/jquery.js'></script>
<body ng-app>
<ng-view class="my-slide-animation"></ng-view>
</body>

<script type='text/javascript'>
  var appointmentid = '<?php echo $appId; ?>';
  window.onbeforeunload = function(){
    return 'The session will be refreshed and you will loose any unsaved data';
  }
</script>
<link rel="stylesheet" href="/ayushman/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/ayushman/assets/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/ayushman/assets/public/css/main.css">
<script src="/ayushman/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<link rel="stylesheet" href="/ayushman/assets/public/lib/angular-ui-ng-grid/ng-grid.css">
<script type='text/javascript' src='/ayushman/assets/public/lib/angular/angular.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/init.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/app.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-cookies/angular-cookies.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-resource/angular-resource.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-route/angular-route.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/lib/angular-animate.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/directives.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/controllers/landingctrl.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/config.js'></script>
<script type='text/javascript' src='/ayushman/assets/public/js/services/consultationApi.js'></script>
<script type="application/javascript" src="/ayushman/assets/public/js/controllers/emrctrl.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/services/emrservice.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/controllers/examctrl.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/controllers/newexamctrl.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/services/examinfoservice.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/services/appointmentservice.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/services/examinationservice.js"></script>
<script type="application/javascript" src="/ayushman/assets/js/newformmodule.js"></script>
<script type="application/javascript" src="/ayushman/assets/js/formmodulevalidation.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-multiselect.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-multiselect.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/jquery.multiselect.js"></script>
<script src="/ayushman/assets/js/newlistboxcomponent.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/controllers/trackerctrl.js"></script>
<script type="application/javascript" src="/ayushman/assets/public/js/services/trackerservice.js"></script>
<script src="/ayushman/assets/js/jquery.flot.min.js"></script>
<script src="/ayushman/assets/js/jquery.flot.time.min.js"></script>
<script src="/ayushman/assets/js/excanvas.min.js"></script>
<script src="/ayushman/assets/js/jquery.flot.selection.min.js"></script>
<script src="/ayushman/assets/public/lib/angular-ui-ng-grid/ng-grid-2.0.7.min.js"></script>
<script src="/ayushman/assets/js/vendor/bootstrap.min.js"></script> 
<script src="/ayushman/assets/js/plugins.js"></script> 
<script src="/ayushman/assets/js/main.js"></script> 
