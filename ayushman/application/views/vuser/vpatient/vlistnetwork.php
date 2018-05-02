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
	<script src="/ayushman/assets/app/js/controllers/networkctrl.js"></script>
	
	<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>

	<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script> 

	<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script src="/ayushman/assets/app/js/createDialog.js"></script>
	<link href="/ayushman/assets/css/newformstyle.css" rel="stylesheet" type="text/css">

	<link href="../assets/app/css/table.css" rel="stylesheet" type="text/css"/>
	<link href="../assets/app/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
	<!--<link href="../assets/app/css/footable-demos.css" rel="stylesheet" type="text/css"/>-->

	<script src="../assets/app/js/extra/footable.js?v=2-0-1" type="text/javascript"></script>
	<script src="../assets/app/js/extra/footable.sort.js?v=2-0-1" type="text/javascript"></script>
	<script src="../assets/app/js/extra/footable.filter.js?v=2-0-1" type="text/javascript"></script>
	<script src="../assets/app/js/extra/footable.paginate.js?v=2-0-1" type="text/javascript"></script>
	<script src="../assets/app/js/extra/bootstrap-tab.js" type="text/javascript"></script>

</head>
<body>
	<input type="hidden" id="pid" value="<?php echo $pid ?>" />
	<div id="ng-app" ng-app="app" style="position:relative;max-width:1024px;min-height:550px;font-size:12px !important; width:100%;margin:0px auto 0px auto;" ng-controller="networkCtrl">
		<h5 style=" background: #5cb1b6 !important;border-radius: 0;color:#fff; padding: 10px 5px 10px 15px;margin-top: 0;"><span>Network of Chemist, Diagnostic Center and Doctor</span><span style="float:right;right:0">Name Of The Patient : <?php echo $name.' '.$mobilenumber; ?></span></h5>
		<div ng-include src="'/ayushman/assets/app/partials/patientnetworklist.html'"></div>
	</div>
</body>