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
<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
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
					<img ng-if="!(presence[myprofile['userinfo'].id])" ng-src="/ayushman/assets/app/img/offline.png" style="height:15px;width:15px;border:none;"/> <span class="title">Dr.</span> <span class="firstName">{{myprofile['userinfo'].name}}</span>
                </div>
            </div>
        </li>
		<!--<li>
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
		</li>-->
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
    <li><a onclick="hideLeftMenu();" href="/ayushman/cconsultation/view?#/dashboard/" title="Programs">Home</a></li>
    <li><a  href="/ayushman/cconsultation/view?#/myprofile/" onclick="hideLeftMenu();" title="Doctors">My Profile</a></li>
	<li><a href="/ayushman/cconsultation/view?#/changepass/" onclick="hideLeftMenu()">Change Password</a></li>
	 <li><a  href="/ayushman/cconsultation/view?#/personalization/" onclick="hideLeftMenu();" title="Personalization">Personalization</a></li>
	<li><a  href="/ayushman/cconsultation/view?#/mypatients/" onclick="hideLeftMenu();" title="Doctors">My Patients</a></li>
	<li><a  href="/ayushman/cconsultation/view?#/mydoctors/" onclick="hideLeftMenu();" title="Doctors">My Doctors</a></li>
	<li><a  href="/ayushman/cconsultation/view?#/staff/" onclick="hideLeftMenu();" title="Doctors">My Staff</a></li>
	<li><a  href="/ayushman/cconsultation/view?#/chemists/" onclick="hideLeftMenu();" title="Chemists">My Chemists</a></li>
	<li><a  href="/ayushman/cconsultation/view?#/dc/" onclick="hideLeftMenu();" title="Labs">My Diagnostic centers</a></li>
	<li><a href="/ayushman/cdoctorclinic/view"  onclick="hideLeftMenu();">My Clinics</a></li>
	<li><a href="/ayushman/cdoctorschedule/view" onclick="hideLeftMenu();">Set Working Hours</a></li> 
	<li><a href="/ayushman/cconsultation/view?#/feemanager/" onclick="hideLeftMenu();">Set Consultation Fees</a></li>	
    <li><a  href="/ayushman/cconsultation/view?#/Statements/"onclick="hideLeftMenu();" title="Doctors">Statements</a></li>
    <li><a  href="/ayushman/cconsultation/view?#/bills/" onclick="hideLeftMenu();"title="Doctors">Bills</a></li>
     
	
	
	<!--<li><a href="#/mypackages/" onclick="hideLeftMenu();">My Packages</a></li> 	-->
	<li><a  href="/ayushman/cconsultation/view?#/recommend/"onclick="hideLeftMenu();" title="Doctors">Send Invite</a></li>
  </ul>
  <p>&copy; Copyright 2014 India Online Health.<br />
    All Rights Reserved.<br />
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
		<div class="panel activateformdiv" style="max-width:1024px" bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<div style="float:left;width:99.6%;padding-bottom:5px;min-height:535px;">
			<div class="formHeader" style="width:99%;margin-bottom:7px;line-height:25px;">Set Working Hours</div>
			<div style="padding-left:20px;width:97.5%;border-bottom:1px solid #a8c8d9;margin-bottom:20px;display:none">
				<button class="Rounded_buttonOrenge">Express</button>
				<button class="Rounded_buttonBlue">Advanced</button>
			</div>
			<div style="width:99.6%;">
				<div style="width:95%;margin:auto;padding-bottom:150px;">
					<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
						<div id="help-main" style="margin-left:5px;padding:10px;">
							<p class="bodytext_bold"style="font-size:12px;">Hi, this is the set working hours page. Here you can set your weekly schedule.</p>
							<p class="bodytext_bold"style="font-size:12px;">You can set up your weekly schedule by creating consultation timings for all your clinics shown below. You can manage your clinics in the <a href="javascript:void(0)" onclick="openDialog('/ayushman/cdoctorclinic/view', 800, 500)">My Clinics</a> page.</p>
							<p class="bodytext_bold"style="font-size:12px;">Once you have created a consultation timing, you can apply it to different weekdays to create your weekly calender.</p>
							<p class="bodytext_bold"style="font-size:12px;">You can create as many consultation blocks as required.</p>
						</div>
					</div>
          <?php
          if($clinics != NULL){ 
          	foreach($clinics as $clinic){
            $schedule_view = Request::factory('cbasicschedule/view');
            $schedule_view->post("clinic",$clinic);
            echo $schedule_view->execute();
          	}
          }
          else{
				echo '<p class="bodytext_error"style="font-size:20px;">No clinics available....please first add clinics</p></br>
				<a href="/ayushman/cdoctorclinic/view" >Click here to add Clinics</a>';
				
          } 
           ?>
				</div>
			</div>
		</div>
    <div id = 'schedule_questions' class='schedule_questions' style='display:none;width:98%;margin:auto'>
      <div style="color:#A8C8D9;width:96%;margin:auto;"><HR style="height:0.3px;color:#A8C8D9;"></div>
      <form class='schedule_form' method="post" enctype="multipart/form-data"  action="javascript:void(0);">
        <input type='hidden' class='popup_schedule_id' name='popup_schedule_id' value='' />
        <input type='hidden' class='popup_consultation_timing_id' name='popup_consultation_timing_id' value='' />
        <input type='hidden' class='hidden_input_weekdays' name='input_weekdays' value='' />
        <input type='hidden' name='check_for_conflicts' value=0 />
        <table>
          <tr>
            <td class="bodytext_bold"><label for="input_start_time">From what time will you be available for consultation? *</label></td>
            <td class='bodytext_normal'><input class = 'input_start_time timepicker_noPeriodLabels form-control regnformcontrol' readonly='readonly' name = 'input_start_time' type="text" style='width:100%'/></td>
          </tr>
          <tr>
            <td class="bodytext_bold"><label for="input_end_time">To what time will you be available for consultation? *</label></td>
            <td class='bodytext_normal'><input class = 'input_end_time timepicker_noPeriodLabels form-control regnformcontrol' readonly='readonly' name = 'input_end_time' type="text"style='width:100%'/></td>
          </tr>
          <tr>
            <td class="bodytext_bold"><label for="input_consultation_duration">What is the average time taken by you to consult a patient? *</label></td>
            <td class='bodytext_normal'><select class = "input_consultation_duration form-control regnformcontrol" name = "input_consultation_duration" style='width:100%'></select></td>
          </tr>
          <tr>
            <td class="bodytext_bold"><label for="input_standby">How many stand-by appointments would you like to have each hour? </label></td>
            <td class="bodytext_normal"><select class = 'input_standby form-control regnformcontrol' name = 'input_standby' style='width:100%'></select></td>
          </tr>
          <tr class='online'>
            <td class="bodytext_bold"><label for="input_allow_online">Will you like to perform online consultations? </label></td>
            <td class="bodytext_normal">
              <select class = 'input_allow_online form-control regnformcontrol' name = 'input_allow_online' style='width:100%'>
              <option>Select</option>
              <option>Yes</option>
              <option>No</option> 
              </select>
            </td>
          </tr>
          <tr class='home_visit' style='display:none'>
            <td class="bodytext_bold"><label for="input_allow_home">Will you like to perform home visit? </label></td>
            <td class="bodytext_normal">
              <select class = 'input_allow_home form-control regnformcontrol' name = 'input_allow_home' style='width:100%'>
                <option>Select</option>
                <option>Yes</option>
                <option>No</option>
              </select>
            </td>
          </tr> 
          <tr>
            <td class="bodytext_bold"><label for="input-weekdays">On which day(s) of the week are you available? *</label></td>
            <td class='bodytext_normal'>
              <select class="input_weekdays"  style="height:20px;" multiple="multiple">
                <option value='M'>Monday</option>
                <option value='T'>Tuesday</option>
                <option value='W'>Wednesday</option>
                <option value='Th'>Thursday</option>
                <option value='F'>Friday</option>
                <option value='Sa'>Saturday</option>
                <option value='S'>Sunday</option>
              </select>
            </td>
          </tr>
        </table>
        <div class="footer" style="text-align:right;" align="right">
          <input type='button' class="regnbutton footerButton" onclick="cancel_edit(this);" value='Cancel' />
          <input type='submit' class="regnbutton footerButton" onclick='save_consultation_timing(this); ' value='Done'/>
        </div>
      </form>
    </div>
    <div id='delete_timing'>
      <p>Appointments have been taken against these timings.<br/>
      <form>
        <input type='hidden' id='conflict_schedule_id' value='' />
        <input type='hidden' id='conflict_consultation_timing_id' value='' />
        <input type="radio" name="action" value="1" checked>Retain existing appointments.</input><br />
        <input type="radio"  name="action" value="0" >Cancel existing appointments.</input></form>
      </p>
    </div>
  </div>
     
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
<div id="assistance" style="float: right;width: 16%;position: absolute;right: 0;top: 68px;-webkit-box-shadow: 0px 0px 7px rgba(0,0,0,0.3);border: none;padding: 0;background: #fff; display:none;">
<h3  style="background: #60b3b3;
  color: white;padding-left:5%">Get assistance</h3>
<p class="bodytext_normalblue">1. Call <i class="fa fa-phone"> +91 20 2422 5288 </i> </p>
<p class="bodytext_normalblue">2. Click  <a href="javascript:void(0)" class="regnbutton" onclick="openremote()"><i class="fa fa-life-ring"></i> Join Session</a> when asked.</p>
</div>
</body>
</html>
<script type='text/javascript'>
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
    $("#schedule_questions").find('.input_consultation_duration').append($("<option>").attr('value','select').text("Select"));
      for(var i=1;i<=200;i++){
        $("#schedule_questions").find('.input_consultation_duration').append($("<option>").attr('value',i).text(i));
		}
    $("#schedule_questions").find('.input_standby').append($("<option>").attr('value','select').text("Select"));
      for(var i=1;i<=20;i++){
        $("#schedule_questions").find('.input_standby').append($("<option>").attr('value',i).text(i));
		}
    $(".ui-dialog-titlebar").hide();
    $('#delete_timing').dialog({
      autoOpen: false,
      draggable: false,
      modal: true,
      title: 'Error',
      width:'500',
      height:'200',
      buttons: {
        "Ok": function () {
          var action = $('input[name="action"]:checked').val();
          $(this).dialog('close');
          delete_anyway(action);
        },
        "Cancel": function () {
          $(this).dialog('close');
        }
      }
    });
    jQuery("#delete_timing").dialog('option', 'position', [150,150]);
  });
</script>
