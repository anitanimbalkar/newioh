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
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/base.js"></script>
<script>
  goog.require('goog.proto2.Message');
</script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonemetadata.pb.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonenumber.pb.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/metadata.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/phonenumberutil.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/asyoutypeformatter.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/isd/demo.js"></script>
<script src="/ayushman/assets/js/setschedule.js"></script>

<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/jquery.multiselect.css" />
<script type="text/javascript" src="/ayushman/assets/js/jquery.multiselect.js"></script>
<script src="/ayushman/assets/js/jquery.ui.timepicker.js"></script>
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
<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
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
	 <li><a  href="/ayushman/cconsultation/view?#/personalization/" onclick="hideLeftMenu();" title="Personalization">Personalization</a></li>
	<li><a href="/ayushman/cconsultation/view?#/changepass/" onclick="hideLeftMenu()">Change Password</a></li>
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
		<div class="panel activateformdiv" style="max-width:1024px;">
    <div style="width:99.6%;padding-bottom:5px;min-height:800px;;">
      <div class="formHeader" >My Clinics</div>
      <div style="width:99.6%;">
        <div style="width:95%;margin:auto;padding-bottom:150px;position:relative;">
          <table style="width:100%">
            <td height="25" align="left" class="bodytext_normalblue" align="right" valign="middle" style="padding-left:10px;">
				<div class="table_roundBorder" style="margin-top:9px;background-color:#ecf8fb">
						<div id="help-main" style="margin-left:5px;width:100%;padding:10px;">
							<p class="bodytext_bold"style="font-size:12px;">Click On 'Add Clinics' button to add clinics</p>
						</div>
					</div>
					<div style="margin-top:9px;">
						<input type="button" class="regnbutton" value="Add Clinic"  onclick="add_clinic();" />
					</div>							
			</td>
          </table>
          <?php foreach($clinics_details as $clinic_details) { ?>
            <div class="table_roundBorder" style="margin:10px; width:99%; position:relative; float:left;">
              <div class="formHeader">
                <img src="images/bullet.png" width="7" height="7" />
                <label class="formHeader"><?php echo $clinic_details['name'] ?></label>
              </div>
              <div style="width:100%">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <input type='hidden' name='address_id' class='address_id' value = '<?php echo $clinic_details["address_id"]; ?>' />
                  <input type='hidden' name='address_id' class='clinicname' value = '<?php echo $clinic_details["name"]; ?>' />
                  <tr>
                    <td width="2%" rowspan="7" align="left" valign="top">&nbsp;</td>
                    <td width="13%" height="33" class="bodytext_boldblue">Address</td>
                    <td width="2%" class="bodytext_boldblue">:</td>
                    <td width="38%" class="bodytext_normalblue line1"><?php echo $clinic_details['address']->line1_c; ?></td>
                    <td width="11%" class="bodytext_boldblue">Landmark</td>
                    <td width="2%" class="bodytext_boldblue">:</td>
                    <td width="32%" class="bodytext_normalblue nearlandmark"><?php echo $clinic_details['address']->nearlandmark_c; ?></td>
                  </tr>
                  <tr>
                    <td height="30" class="bodytext_boldblue">Country</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue country"><?php echo $clinic_details['address']->country_c; ?></td>
                    <td class="bodytext_boldblue">State</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue state"><?php echo $clinic_details['address']->state_c; ?></td>
                  </tr>
                  <tr>
                    <td height="30" class="bodytext_boldblue">City</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue city"><?php echo $clinic_details['address']->city_c; ?></td>
                    <td class="bodytext_boldblue">Locality</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue location"><?php echo $clinic_details['address']->location_c; ?></td>
                  </tr>
                  <tr>
                    <td height="30" class="bodytext_boldblue">Pin Code</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue pin"><?php echo $clinic_details['address']->pin_c; ?></td>
                    <td class="bodytext_boldblue">Contact No.</td>
                    <td class="bodytext_boldblue">:</td>
                    <td class="bodytext_normalblue"><table><tr><td class="bodytext_normalblue"><?php echo $clinic_details['address']->isdphone_c.'-'; ?></td><td class="bodytext_normalblue phone"><?php echo $clinic_details['address']->phone_c; ?></td></table></td>
                  </tr>
                  <tr>
                    <td height="30" class="bodytext_boldblue" colspan="5">
                      <label>Send SMS Notification for In-clinic appointments : </label>
                      <label class="bodytext_normalblue sendnotification"><?php if($clinic_details['send_notification'] == 1) echo "Yes"; else echo "No"; ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" class="bodytext_boldblue" colspan="5">
                      <label>Send SMS Notification for Online appointments : </label>
                      <label class="bodytext_normalblue">Yes</label>
                    </td>
                  </tr>
                </table>
              </div>
              <div >
                <button class="regnbutton" style="float:right; width:60px; margin-left:7px;" onclick='edit_clinic(this)'>Edit</button>
                <button class="regnbutton" style="float:right; width:65px;" onclick='remove_clinic(this);'>Remove</button>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div  id ='addpopup'  class="table_roundBorder" style="width:97%;padding:0;overflow-x:hidden;background-color:#FFF;">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  >
        <tr>
          <td class="formHeader"width="5%" height="25"  ><img src="/ayushman/assets/images/bullet.png" width="7" height="7"/></td>
          <td class="formHeader">Add Clinic</td>
          <td class="formHeader">
            <img src="/ayushman/assets/images/Close_Icon.png" width="16" height="16" border="0" style="cursor:pointer; float:right" onclick="$('#addpopup').dialog('close');"/>
          </td>
        </tr>
      </table>
      <form id = 'add_clinic' method="post" enctype="multipart/form-data"  action="/ayushman/cdoctorclinic/save">
        <input type = 'hidden' name = 'clinic_id' id='clinic_id' value = '' />
        <div style="width:100%;background-color:#FFF;" >
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="15%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Clinic Name* :</td>
              <td width="31%" align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text"   id="clinicname" name="clinicname_c"  class="form-control regnformcontrol" maxlength="45"/></td>
              <td width="24%" align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">&nbsp;</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue">&nbsp;</td>
            </tr>
            
            <tr>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Address*:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text" name="line1_c" id="line1" class='form-control regnformcontrol' maxlength="400"/></td>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Landmark:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text" id="nearlandmark" name="nearlandmark_c" class="form-control regnformcontrol" maxlength="100"/></td>
            </tr>
            
            <tr>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Country*:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue">
				<select name="country_c" class="form-control regnformcontrol gray"  onchange="setisdcode(this,'isdphone_c','isdphone_c');" id="country" > 
					<option value="" disabled>* select Country</option>
					<?PHP  
						for ($i=0;$i<count($objcountries);$i++) {	
							if($objcountries[$i]["countrycode_c"] == '91'){
								print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\" selected>{$objcountries[$i]["country_c"]}</option>";
							}else{
								print "<option  \" value=\"{$objcountries[$i]["countrycode_c"]}\">{$objcountries[$i]["country_c"]}</option>";
							}
						} 
					?>
				</select>
              </td>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">State*:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text"  name="state_c"  id="state" class="form-control regnformcontrol" maxlength="45"/></td>
            </tr>
            
            <tr>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">City*:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text" id="city" name="city_c" class="form-control regnformcontrol" maxlength="45"/></td>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Locality:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text" name="location_c" id="location" class="form-control regnformcontrol" maxlength="45"/></td>
            </tr>
            
            <tr>
              <td align="left" style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">Pin Code*:</td>
              <td align="left" style="padding-left:10px; padding-top:6px" class="bodytext_normalblue"><input type="text" name="pin_c" id="pin" class="form-control regnformcontrol" maxlength="45"/></td>
              <td align="left" style="padding-left: 1.5%;" class="bodytext_normalblue">Clinic Contact No.*:</td>
              <td align="left" style="padding-left: 1.5%;" class="bodytext_normalblue">
				<span><input id="isdphone_c" style="width:20%;float:left;" type="text"  class="form-control regnformcontrol" name="isdphone_c"  value="<?php if(isset($previousvalues)) echo Arr::get($previousvalues, 'isdphone_c'); ?>"  maxlength="4" readonly /> </span><span>
				
				<input type="text" id="phone" name="phone_c" onblur="checkPhoneNumber(this,'country')" class="form-control regnformcontrol" style="width:57%;float: left;" maxlength="10"/></span>
				</td>
            </tr>
            <tr>
              <td align="left" colspan='2' style="padding-left:10px;padding-top:6px" class="bodytext_normalblue">
                <input type="checkbox" name="sendnotification_c" id="sendnotification" value="1">Send SMS Notification</input>
              </td>
            </tr>
          </table>
        </div>
        <div style="">
          <button class="regnbutton" id='submit_button' style="float:right;font-size:14px ">Add Clinic</button>
          <button class="regnbutton" style="float:right;font-size:14px " onclick='$("#addpopup").dialog("close")'>Cancel</button>
        </div>
      </form>
      <input type="hidden" name="phoneNumber" id="phoneNumber" size="25" />
      <input type="hidden" name="defaultCountry" id="defaultCountry" size="2" />
      <input type="hidden" name="carrierCode" id="carrierCode" size="2" />
      <input type="hidden" name="output" id="output" style="width:20px;">
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
	$
		(
			function()
			{
				$( "input[name=dateOfRegistration]" ).datepicker({yearRange: "-50:+0",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
				$( "input[name=dateOfExpiry]" ).datepicker({yearRange: "-0:+50",changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
			}
		);
		
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
		
  });
</script>

<script type='text/javascript'>
function checkPhoneNumber(userphonenumber,dropdown)
	{
		var countryCode = document.getElementById(dropdown);
		var countryCodeValue = countryCode.options[countryCode.selectedIndex].value;
		if(countryCodeValue !="")
		{
			document.getElementById("defaultCountry").value = countryCodeValue;
			document.getElementById("phoneNumber").value = userphonenumber.value;
			phoneNumberParser();
			var a  = document.getElementById("output").value;
			if (a.indexOf('Result from isValidNumber(): true') > -1) {
		  		//correct phone number
			} 
			else
			{
				if( userphonenumber.value != "")
		  		{
					//alert(document.getElementById("output").value);
					alert("Please enter valid contact number");
		 	 		userphonenumber.focus();
				}
			}	
		}
		else{
			alert("please select country")
		}
	}
function setisdcode(country,phoneid,mobileid)
{
	var count = country.selectedIndex-1;
	<?php $allcountries = json_encode($objcountries); echo "var javascript_array = ". $allcountries . ";\n"; ?>
	document.getElementById(phoneid).value ='+'+javascript_array[count].isd;
	document.getElementById(mobileid).value ='+'+javascript_array[count].isd;
}
function remove_clinic(remove_button_object){
  var clinic_div = $(remove_button_object).parent().prev();
  var address_id = $(clinic_div).find('.address_id').val();
  $.ajax({
      url: "/ayushman/cdoctorclinic/delete/get?address_id="+encodeURIComponent(address_id),
			success:function( data ){
          location.reload();
			},
			error:function(){
				showMessage('250','50','Error' ,'Error. There was an error in deleting this clinic. Please Try Again.','error','id');
			},
  });
}
function add_clinic(){
  $('#clinic_id').val('');
  $('#clinicname').val('');
  $('#line1').val('');
  $('#nearlandmark').val('');
  $('#country').val('');
  $('#state').val('');
  $('#city').val('');
  $('#location').val('');
  $('#pin').val('');
  $('#phone').val('');
  $('#submit_button').text('Add Clinic');
  $('#sendnotification').attr('checked', false);
  $('#addpopup').dialog('open');
}
function edit_clinic(edit_button_object){
  var clinic_div = $(edit_button_object).parent().prev();
  var address_id = $(clinic_div).find('.address_id').val();
  $('#clinic_id').val(address_id);
  $('#clinicname').val($(clinic_div).find('.clinicname').val());
  $('#line1').val($(clinic_div).find('.line1').text());
  $('#nearlandmark').val($(clinic_div).find('.nearlandmark').text());
  var country_name = $(clinic_div).find('.country').text();
  $('#country option:contains('+country_name+')').attr('selected', true);
  $('#state').val($(clinic_div).find('.state').text());
  $('#city').val($(clinic_div).find('.city').text());
  $('#location').val($(clinic_div).find('.location').text());
  $('#pin').val($(clinic_div).find('.pin').text());
  $('#phone').val($(clinic_div).find('.phone').text());
  var send_notification = $(clinic_div).find('.sendnotification').text();
  if(send_notification == 'Yes'){
    $('#sendnotification').attr('checked', true);
  }
  $('#submit_button').text('Save Clinic');
  $('#country').trigger('change');
  $('#addpopup').dialog('open');
}
$(document).ready(function(){
	
  $('#addpopup').dialog({
    autoOpen: false,
    show: "fade",
    hide: "fade",
    width: "750",
    modal: true,
    height: "auto",
    resize: "auto",
    resizable: false
  });
  $(".ui-dialog-titlebar").hide();
  $('#city').focus(function(){
    var urlcity= "/ayushman/cautocompleter/autocomplete?column=city_c&query=select  distinct city_c  from masteraddress where ((state_c like '"+document.getElementById("state").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and city_c";
    $("#city").autocomplete({source: urlcity});
  });
  $('#state').focus(function(){
    var urlstate= "/ayushman/cautocompleter/autocomplete?column=state_c&query=select  distinct state_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%'))and state_c";
    $("#state").autocomplete({source: urlstate});
  });
  $('#country').focus(function(){
     var urlcountry= "/ayushman/cautocompleter/autocomplete?column=country_c&query=select  distinct country_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and country_c";
    $("#country").autocomplete({source: urlcountry});
  });
  $('#location').focus(function(){
     var urlloc= "/ayushman/cautocompleter/autocomplete?column=locality_c&query=select  distinct locality_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (pincode_c like '"+document.getElementById("pin").value+"%') and (country_c like '"+document.getElementById("country").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and locality_c";
    $("#location").autocomplete({source: urlloc});
  });
  $('#pin').focus(function(){
     var urlpin= "/ayushman/cautocompleter/autocomplete?column=pincode_c&query=select  distinct pincode_c  from masteraddress where ((city_c like '"+document.getElementById("city").value+"%') and (locality_c like '"+document.getElementById("location").value+"%') and (country_c like '"+document.getElementById("country").value+"%') and (state_c like '"+document.getElementById("state").value+"%'))and pincode_c";
      $("#pin").autocomplete({source:urlpin});
  });
  var line1 = new LiveValidation('line1',{onlyOnSubmit: true });
  line1.add( Validate.Presence );
  var line1 = new LiveValidation('clinicname',{onlyOnSubmit: true });
  line1.add( Validate.Presence );	
  var country = new LiveValidation('country',{onlyOnSubmit: true });
  country.add( Validate.Presence );
  
  var state = new LiveValidation('state',{onlyOnSubmit: true });
  state.add( Validate.Presence );
  
  var city = new LiveValidation('city',{onlyOnSubmit: true });
  city.add( Validate.Presence );
  
  var pin = new LiveValidation('pin', {onlyOnSubmit: true });
  pin.add( Validate.Presence );
  pin.add( Validate.Numericality, {onlyInteger: true } );
  
  var phone = new LiveValidation('phone',{onlyOnSubmit: true });
  phone.add( Validate.Presence );
  phone.add( Validate.Numericality, {onlyInteger: true } );
  phone.add( Validate.Length, { is: 10 });
  $('#country').trigger('change');
});
function checkPhoneNumber(userphonenumber,dropdown){
  document.getElementById("phoneNumber").value = userphonenumber.value;
  var e = document.getElementById(dropdown);
  var strUser = e.options[e.selectedIndex].value;
  document.getElementById("defaultCountry").value = strUser;
  phoneNumberParser();
  var a  = document.getElementById("output").value;
  if (a.indexOf('Result from isValidNumber(): true') > -1) {
    
  } else {
    if( userphonenumber.value != "")
      {
      //alert(document.getElementById("output").value);
      alert("Please enter valid contact number");
      userphonenumber.focus();
    }	
  }
}
</script>
