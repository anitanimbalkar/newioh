<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/jpg" href="/ayushman/assets/images/smallLogo.jpg"/>
<link rel="shortcut icon" href="/ayushman/assets/images/smallLogo"/>
<meta name="msapplication-TileColor" content="#da532c">
<title>Hospital Admin - INDIA ONLINE HEALTH</title>
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">
<!-- CUSTOM CSS-->
<link href="/ayushman/assets/css/style2.css" rel="stylesheet">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet">
<link href="/ayushman/assets/css/responsive.css" rel="stylesheet">
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
<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/mycertificatesctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/staffdirectoryctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/services/ipdpatientsservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/templatectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/notificationctrl.js"></script>

<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/riskfactorctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/personalizationctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/hospitaladmindashboardctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/statementctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/accountbillsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mypatientsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mydoctorsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/visitsctrl.js"></script>
<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
<script src="/ayushman/assets/app/js/controllers/visitqueryctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/docediterbyadminctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/servicedirectoryctrl.js"></script>

<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
<script src="/ayushman/assets/js/moment.js"></script>
<script src="/ayushman/assets/app/js/controllers/historynotesctrl.js"></script>
<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
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

<script src="/ayushman/assets/app/js/createDialog.js"></script>

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
<!-- CONTAINER STARTS -->
<div class="navbar navbar-inverse navbar-fixed-top" id="topNav" role="navigation">
  <div class="container" id="topHeader">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="logoWrapper"> <a href="#/hospitaladmindashboard/"><img  id="imgLogo" src="/ayushman/assets/images/Logo.png"/></a></div>
    </div>
    <div class="collapse navbar-collapse" xmlns:ng="http://angularjs.org" id="ng-app">
		<ul  class="nav navbar-nav" style="margin-left:-15px;">
		<li id="homebutton"><a href="/ayushman/cdashboard/view" title="Home" class="Help"><i class="fa fa-home"></i></br>Home</a></li>
      </ul>
      <ul id="menubutton"  class="nav navbar-nav" style="margin-left:-15px;">
        <li><a href="javascript:void(0);" title="Menu" class="menu" id="menuExpand" onClick="showLeftMenu();"><i class="fa fa-th-list"></i> </br>Menu</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li>
        	<div class="doctorDetailsUser" id="template"  ng-controller="templateCtrl" ng-cloak>   
				<div class="profileDoctor" style="padding: 19px;"><notifications userid="<?php echo Auth::instance()->get_user()->id?>"></notifications></div>
				<div class="profileDoctor">
                	<img style="height: 33px;" ng-src="{{myprofile['userinfo'].PatientPhoto}}"> 
                </div>
                <div class="doctorInformation">
                	<p style="padding:0;"><img ng-if="presence[myprofile['userinfo'].id]" ng-src="{{'/ayushman/assets/app/img/'+presence[myprofile['userinfo'].id]+'.png'}}"
					style="height:12px;width:12px;border:none;"/> 
					<img ng-if="!(presence[myprofile['userinfo'].id])" ng-src="/ayushman/assets/app/img/offline.png" style="height:15px;width:15px;border:none;"/> <span class="title"></span> <span class="firstName">{{myprofile['userinfo'].name}}</span>
                </div>
            </div>
        </li>
<!--		<li>
			<a href="javascript:void(0);" class="help" onclick="showhelpdiv()"><i class="fa fa-laptop"></i></br>Remote Help</a>
				<script type="text/javascript">
					function showhelpdiv()
					{
						$("#assistance").slideToggle();
					}
					function openremote()
					{
						window.open("https://meeting.zoho.com/login/join.jsp?src=alias","","width=800, height=600");
					}
				</script>
		</li> -->
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
			<a href="/ayushman/cuser/logout" class="help"><i class="fa fa-sign-out"></i></br>Log Out</a>						
		</li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
</div>
<div id="subNavigation"> 
<!--a href="javascript:void(0);" onClick="hideLeftMenu();" title="Close" class="closeMe">X</a-->
  <ul>
    <li><a data-toggle="collapse" data-parent="#accordion"onclick="hideLeftMenu();" href="#/hospitaladmindashboard/" title="Programs">Home</a></li>
   <!-- <li><a  href="#" onclick="hideLeftMenu();" title="">My Profile</a></li>-->
	<li><a  href="#/register" onclick="hideLeftMenu();" title="ServiceProviders">Add Service Providers</a></li>
	<!--<li><a  href="#" onclick="hideLeftMenu();" title="">Directory of Service & Charges</a></li>-->
	<li><a  href="#/mywards/" onclick="hideLeftMenu();" title="Wards">Define Wards</a></li>
	<li><a href="#/changepass/" onclick="hideLeftMenu()">Change Password</a></li>
  </ul>
  <p>&copy; Copyright 2014 India Online Health.<br />
    All Rights Reserved.<br /></p>
</div>
<?php
	      			$obj_user = Auth::instance()->get_user();	
			if($obj_user->activationstatus_c != 'active')
			{
					$_GET['flag']='0';
    	   			$registrationProcess= Request::factory('cregistrationProcess/view');
 					echo $registrationProcess->execute();
			}
				?>
<input id="doctorstatus" type="hidden" value="<?php echo Auth::instance()->get_user()->activationstatus_c?>"/>
<div id="contentDiv" ng-view style="height:auto;overflow-y: none;" ng-cloak>sf safsadf asfa sfasfdasf adsf </div>
     
<style type="text/css">
	.ui-autocomplete { max-height: 90%; overflow-y: auto; overflow-x: hidden;
	-moz-box-shadow: 0 4px 15px rgba(0,0,0,1);
	-webkit-box-shadow: 0 4px 15px rgba(0,0,0,1);
	box-shadow: 0 4px 15px rgba(0,0,0,1);
	}
	
</style>

<script>window.jQuery || document.write('<script src="/ayushman/assets/js/jquery-1.7.1.min.js"><\/script>')</script> 
<!-- page JS --> 
<script src="/ayushman/home/js/main.js"></script>
<script type='text/javascript'>
	var searchitemindex = 0;
	var appointmentid = '<?php if(isset($appId))echo $appId; ?>';
	var servername = '<?= $arr_xmpp["servername"]; ?>';
	var user_id = '<?= $objuser->id ?>';
	var doc_name = '<?= $objuser->Firstname_c  ?>';
	var xmpp_pass = '<?= $objuser->xmpppassword_c ?>';
	
	$(document).ready(function() {
		if($("#doctorstatus").val()!="active")
	{
		$("#subNavigation").hide();
		$("#menubutton").hide();
	}
	else
	{
		$("#homebutton").hide();
	}
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px",
			fluid:true,
			maxWidth:'500'
		});
	});
		
</script>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
 <img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<style type="text/css">
		.dialogWithDropShadow {
		 -webkit-box-shadow: rgba(0, 0, 0, 2.298039) 0px 0px 87px;
		  -moz-box-shadow: 0px 0px 64px rgba(0,0,0,.5);
		}
	</style>
<div id="assistance" class="dialogWithDropShadow" style="float: right;width: 19%;position: absolute;right:1px;top: 68px;border: none;padding: 0;padding-bottom:21px;background: #fff; display:none;">
<h4  style="background: #60b3b3;
  color: white;  padding: 10px;padding-left:5%; font-size:16px; margin-top:0px;z-index: 4003;" class="panel-title">Get Remote Assistance </h4>
<p class="bodytext_normalblue" style="margin: 10px;">1. Call &nbsp;<i class="fa fa-phone" style="  font-size: 17px;"></i>+91 20 2422 5288 </p>
<p class="bodytext_normalblue" style="margin: 10px;">2. Click  <a href="javascript:void(0)" class="regnbutton" onclick="openremote()"><i class="fa fa-life-ring" style="  font-size: 17px;"></i> Join Session</a> when asked.</p>

</div>

</body>
</html>
