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
<title>Doctors - INDIA ONLINE HEALTH</title>
<link type="text/css" href="/ayushman/assets/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" media="screen" />
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script src="/ayushman/assets/js/jquery.ui.tabs.min.js"></script>
<script src="/ayushman/assets/js/setschedule.js"></script>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" />
<script type="text/javascript" src="/ayushman/assets/js/jquery.multiselect.js"></script>
<script src="/ayushman/assets/js/jquery.ui.timepicker.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
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
<script src="/ayushman/assets/app/js/controllers/mypackagesctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/mypasswordctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/followupctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/pastbillctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/mycertificatesctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/emrctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/templatectrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/examctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/riskfactorctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/personalizationctrl.js"></script>
<script src="/ayushman/assets/app/js/controllers/statementctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/accountbillsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mypatientsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/controllers/mydoctorsctrl.js" type="text/javascript"></script>
<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
<script src="/ayushman/assets/app/js/services/personalizationservice.js"></script>
<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
<script src="/ayushman/assets/app/js/services/examinfoservice.js"></script>
<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
<script src="/ayushman/assets/app/js/services/trackerservice.js"></script>

<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
<script src="/ayushman/assets/app/lib/newformmodule.js"></script>

<script src="/ayushman/assets/app/lib/jquery-ui-multiselect.min.js"></script>
<script src="/ayushman/assets/js/newlistboxcomponent.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.min.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.time.min.js"></script>
<script src="/ayushman/assets/app/lib/excanvas.min.js"></script>
<script src="/ayushman/assets/app/lib/jquery.flot.selection.min.js"></script>
<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script>
<script src="/ayushman/assets/app/lib/plugins.js"></script> 
<script src="/ayushman/assets/app/lib/main.js"></script> 
<script src="/ayushman/assets/app/lib/messagecomponent.js"></script> 

<script src="/ayushman/assets/app/js/extra/dashboard.js"></script>

<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<script src="/ayushman/assets/app/js/createDialog.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
			.fa{
	font-size:30px;
}
		</style>
<body>
<!-- CONTAINER STARTS -->
<div class="navbar navbar-inverse navbar-fixed-top" id="topNav" role="navigation">
  <div class="container" id="topHeader">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="logoWrapper"> <a class="navbar-brand" href="#/dashboard/">INDIA ONLINE HEALTH</a> </div>
    </div>
    <div class="collapse navbar-collapse" xmlns:ng="http://angularjs.org" id="ng-app">
	<ul  class="nav navbar-nav" style="margin-left:-15px;">
		<li id="homebutton"><a href="/ayushman/cdashboard/view" title="Home" class="Help"><i class="fa fa-home"></i></br>Home</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li>
        	<div class="doctorDetailsUser" id="template"  ng-controller="templateCtrl">   
				<div class="profileDoctor">
                	<img style="height: 33px;" ng-src="{{myprofile['userinfo'].PatientPhoto}}"> 
                </div>
                <div class="doctorInformation" style="  padding-top: 18px;">
                	<p style="padding:0;"><img ng-if="presence[myprofile['userinfo'].id]" ng-src="{{'/ayushman/assets/app/img/'+presence[myprofile['userinfo'].id]+'.png'}}"
					style="height:12px;width:12px;border:none;"/> 
					<img ng-if="!(presence[myprofile['userinfo'].id])" ng-src="/ayushman/assets/app/img/offline.png" style="height:15px;width:15px;border:none;"/> <span class="title">Dr.</span> <span class="firstName">{{myprofile['userinfo'].name}}</span>
                </div>
            </div>
        </li>
		<li>
			<a href="javascript:void(0);" class="help" onclick="showhelpdiv()"><i class="fa fa-laptop"></i></br>Remote Help</a>					
				<script type="text/javascript">
					function showhelpdiv()
					{
						$("#assistance").toggle();
					}
					function openremote()
					{
						window.open("https://meeting.zoho.com/login/join.jsp?src=alias","","width=800, height=600");
					}
				</script>
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
			<a href="/ayushman/cuser/logout" class="help"><i class="fa fa-sign-out"></i></br>Log Out</a>						
		</li>
      </ul>
    </div>
    <!--/.nav-collapse --> 
  </div>
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
		<div id="divdoceditprofile" class="panel regnformdiv"  style="width:828px;height: auto; overflow-x:hidden;" >
<?php
	      			$_GET['flag']='0';
    	   			$registrationProcess= Request::factory('cregistrationProcess/view');
 					echo $registrationProcess->execute();
				?>
		<div class="formHeader" style="">India Online Health - Registration</div>
		
		<div align="left" id="registrationform" style="border:1px solid #eee;">
			<form class="form-horizontal" id="docregistartion" method="post" enctype="multipart/form-data"  action="/ayushman/cdocregistrationform/submit">
			<div style="margin-top:5%">
			<input type="hidden" name="userid" value="<?php echo $objuser->id; ?>">
			
				<div style="margin-left:20px;" class="row leftrow">	
					<div class="bodytext_normalblue">					
						Name :
						<?php echo $objuser->Firstname_c; ?>
						<?php echo $objuser->middlename_c; ?>
						<?php echo $objuser->lastname_c; ?>
					</div>
				</div>
				

				<div style="margin-left:20px;" class="row rightrow">	
					<div class="bodytext_normalblue">					
						IndiaOnlineHealth Id :
						<?php echo $objuser->id; ?>
					</div>
				</div>			
				
				<div style="margin-left:20px;" class="row leftrow">	
					<div class="bodytext_normalblue">					
						Email Id :
						<?php echo $objuser->email; ?>
					</div>
				</div>			
				
				<div style="margin-left:20px;" class="row rightrow">	
					<div class="bodytext_normalblue">					
						Contact No :
						<?php echo $objuser->isdmobileno1_c.'-'.$objuser->mobileno1_c; ?>
					</div>
				</div>	
						
				</br>
				<div style="margin-left:20px;float left;" class="form-group row leftrow">	
					<div>					
						<label for="rpmnumber" >Registration Number* :</label>
						<input style="width:80%;" id="rpmnumber" name="RMPnumber_c" type="text" value="<?php echo $objDoctor->RMPnumber_c; ?>" class="form-control regnformcontrol" placeholder="* e.g. 567342" size="50" maxlength="45"/>
					</div>
				</div>			
				
				<div style="margin-left:20px;" class="form-group row rightrow">	
					<div>					
						<label for="authority">Registering Authority* :</label>
						<input style="width:80%;" id="authority" name="medicalcouncilwhereregistered_c" value="<?php echo $objDoctor->medicalcouncilwhereregistered_c; ?>" class="form-control regnformcontrol" placeholder="* e.g. MCA" type="text" size="50" maxlength="45"/>
					</div>
				</div>			
				
			
				<div style="margin-left:20px;" class="row leftrow">	
					<div >					
						<label >Date of Registration* :</label>
						<input  style="width:80%;" id="dateofissue" value="<?php echo date("d M Y", strtotime($objDoctor->RMPnumberdateofissue_c)); ?>"  name="dateOfRegistration" class="form-control regnformcontrol"  size="50"/>
					</div>
				</div>			
				
			
				<div style="margin-left:20px;" class="row rightrow">	
					<div >					
					<span><label >Registration Valid Till* :</label></span>
					<span><input style="width:80%;" id="dateofexpiry"  value="<?php echo date("d M Y", strtotime($objDoctor->RMPnumberdateofexpiry_c)); ?>" name="dateOfExpiry" class="form-control regnformcontrol"  size="50"/></span>
					</div>
				</div>			
				</div>
</br>
<div style="margin-top:24%;">
				<div style="margin-left:0px;background:#5cb1b6;width:776px;" class=" formHeader">	
					<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Verify Medical Registration
				</div>			
					
		
				<div style="margin-left:20px;" class="row">	
					<input valign="top" name="certificate" value="upload" id="uploadCertificate" type="radio" checked="checked" onclick="toggleUploadButton();"/><label class="bodytext_normalblue">I would like to upload my registration certificate</label>
							</br>
					<input name="upload" class="formheader regnbutton" style="height:30px;" id="upload" type="file"/>
					<br/>
					<input name="certificate"  value="post" id="postCertificate" type="radio" onclick="toggleUploadButton();"/><label class="bodytext_normalblue">I would like to send a copy of my registration certificate through courier/post </label>
				</div>			
			
				

				<div style="margin-left:35px;" id="ayushmanAddress" class="bodytext_normalblue row" >	
					Please send your registration certificates to the following address:<br />
					<span class="bodytext_boldblue">Service Support Manager,<br />
					Ayushman Pvt. Ltd.<br />
					5/A, Ramyanagari, Bibwewadi,<br /> 
					Pune-411045, Maharashtra, India<span>
				</div>			
					

				<div style="margin-left:20px;margin-top:10px;margin-bottom:10px;" class="row">	
					<input align="left" type="submit" class="regnbutton" style="width: 150px; height: 37px; " value="Send Data for Validation"/>
				</div>			
							
</div>				<!-- SAVE BUTTON -->
			</form>
		</div>
</div>

     
	<style type="text/css">
		.ui-autocomplete { max-height: 90%; overflow-y: auto; overflow-x: hidden;
		-moz-box-shadow: 0 4px 15px rgba(0,0,0,1);
		-webkit-box-shadow: 0 4px 15px rgba(0,0,0,1);
		box-shadow: 0 4px 15px rgba(0,0,0,1);
		}
		.leftrow
		{
			width:47%;
			float:left;
		}
		.rightrow
		{
			width:47%;
			float:right;
		}
		#ui-datepicker-div { font-size:11px;   background: rgb(92, 177, 182); }
		.ui-datepicker-calendar{
		background:white !important
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
<div id="assistance" style="float: right;width: 23%;position: absolute;  right: 33px;top: 68px;-webkit-box-shadow: 0px 0px 7px rgba(0,0,0,0.3);border: none;padding: 0;background: #fff; display:none;">
<h3  style="background: #60b3b3;
  color: white;padding-left:5%">Get assistance</h3>
<p class="bodytext_normalblue">1. Call <i class="fa fa-phone" style="  font-size: 17px;">  </i>+91 20 2422 5288 </p>
<p class="bodytext_normalblue">2. Click  <a href="javascript:void(0)" class="regnbutton" onclick="openremote()"><i class="fa fa-life-ring" style="  font-size: 17px;"></i> Join Session</a> when asked.</p>
</div>
</body>
</html>
<script type='text/javascript'>
  $(document).ready(function() {
			if($.trim($('#errorlistdiv').html()) != "")
				showMessage('250','50','Errors',$.trim($('#errorlistdiv').html()),'error','errordialogboxid');
			
				toggleUploadButton();
				var rpmnumber = new LiveValidation('rpmnumber',{onlyOnSubmit: true });
				rpmnumber.add( Validate.Presence );
				
				var authority = new LiveValidation('authority',{onlyOnSubmit: true });
				authority.add( Validate.Presence );
				
				var dateofissue = new LiveValidation('dateofissue',{onlyOnSubmit: true });
				dateofissue.add( Validate.Presence );
				
				var dateofexpiry = new LiveValidation('dateofexpiry',{onlyOnSubmit: true });
				dateofexpiry.add( Validate.Presence );
				
				$('#upload').bind('change', function() {
					$fileType = this.files[0].type;
					if(this.files[0].size > 1048576 )
					{
						showMessage('250','50','Errors','File size should be less than 1 MB.','error','errordialogboxid');
						$('#upload').attr('value','');
					}
					else if( !($fileType == "image/gif"  ||
						$fileType == "image/jpeg" ||
						$fileType == "image/jpg"  ||
						$fileType == "image/png"  ||
						$fileType == "image/pjpeg"||
						$fileType == "application/pdf"||
						$fileType == "image/bmp"))
					{
						showMessage('250','50','Errors','File should be image or pdf.','error','errordialogboxid');
						$('#upload').attr('value','');
					}
				});
				
		$
		(
			function()
			{
				$( "input[name=dateOfRegistration]" ).datepicker({yearRange: "-50:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
				$( "input[name=dateOfExpiry]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			}
		);
	
		
		
		
  });
  
	function toggleUploadButton()
		{
			if($('#uploadCertificate').is(':checked'))
			{
				$('#upload').show();
				$('#ayushmanAddress').hide();
			}
			else
			{
				$('#upload').hide();
				$('#upload').attr('value',"");
				$('#ayushmanAddress').show();
			}
		}	
</script>
<div style="display:none;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'nofile'); ?>
		<?= Arr::path($errors,'type'); ?>
		<?= Arr::path($errors,'size'); ?>
	</div>
</div>
