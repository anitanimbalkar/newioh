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
		<link rel="stylesheet" href="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid.css" />
		<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.datetimepicker.css" />

		<script src="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.datetimepicker.js" ></script>
		<script src="/ayushman/assets/app/lib/xmpp.js"></script>
		<script src="/ayushman/assets/app/lib/jsjac.js"></script>
		<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
		<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
		<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
		<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
		<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
		<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
		<script src="/ayushman/assets/js/timer.js"></script>
		<script src="/ayushman/assets/js/moment.js"></script>

		<script src="/ayushman/assets/app/js/app.js"></script>

		<script src="/ayushman/assets/app/js/directives.js"></script>
		<script src="/ayushman/assets/app/js/controllers/consultationtemplatectrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/myreportsctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/mycertificatesctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/pastbillctrl.js"></script>

		<script src="/ayushman/assets/app/js/controllers/landingctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/dashboardctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/docpastappointment.js"></script>

		<script src="/ayushman/assets/app/js/controllers/followupctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/emrctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/examctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/riskfactorctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/trackerheaderctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/bookingfollowupctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/visitsctrl.js"></script>
		<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
		<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
		<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
		<script src="/ayushman/assets/app/js/services/examinfoservice.js"></script>
		<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
		<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
		<script src="/ayushman/assets/app/js/services/trackerservice.js"></script>
		<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
		<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
		<script src="/ayushman/assets/app/js/controllers/immunizationctrl.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
		<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
		<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
		<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
		<script src="/ayushman/assets/js/newlistboxcomponent.js"></script>
		<script src="/ayushman/assets/app/js/extra/agecalculator.js"></script>
		<script src="/ayushman/assets/app/js/extra/prescription.js"></script>
		<script src="/ayushman/assets/app/js/extra/exam.js"></script>

		<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script> 
		<script src="/ayushman/assets/app/lib/plugins.js"></script> 
		<script src="/ayushman/assets/app/lib/main.js"></script> 
	    <script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery-multiselect.js"></script>
		<script src="/ayushman/assets/app/lib/jquery-ui-multiselect.min.js"></script>
		<script src="/ayushman/assets/app/lib/jquery.multiselect.js"></script>
		    <link rel="stylesheet" type="text/css" href="/ayushman/assets/app/css/jquery.multiselect.css" />
    <link rel="stylesheet" type="text/css" href="/ayushman/assets/app/css/jquery-ui-multiselect.css" />

		<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="/ayushman/assets/app/js/controllers/historynotesctrl.js"></script>
<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>

		<script src="/ayushman/assets/app/js/createDialog.js"></script>
        <link rel="stylesheet" href="/ayushman/assets/css/jquery.multilevelpushmenu.css">
        <link rel="stylesheet" href="/ayushman/assets/css/responsive.css">
 <script src="/ayushman/assets/app/js/controllers/reportsparameter.js"></script>
	<script src="/ayushman/assets/app/lib/jquery.flot.min.js"></script>
	<script src="/ayushman/assets/app/lib/jquery.flot.time.min.js"></script>
	<script src="/ayushman/assets/app/lib/excanvas.min.js"></script>
	<script src="/ayushman/assets/app/lib/jquery.flot.selection.min.js"></script>
<style type="text/stylesheet">
	[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
	  display: none !important;
	}
</style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/style.css" />
        <div id="lazy">
			<div xmlns:ng="http://angularjs.org" id="ng-app" ng-app="app" style="height:99%">
				<input type="hidden" id="patient_id" value="<?php echo $patientid; ?>" />
			  <div id="template"  ng-controller="consultationtemplateCtrl" style="height: 95%" ng-cloak >
				<div class="navbar header" style="position:fixed;z-index: 1000;border-bottom: 1px solid;">
				  <div class="container fullWidth">
						<div style="position:relative;z-index:3000;">
						  <a class="navbar-brand" style="width:14%" href=""><img style="width:116%;margin-top:8px;" src="/ayushman/assets/app/img/logo.png" alt="India Online Health"></a>
						 <ul class="nav navbar-nav navbar-left">
							<li ng-show="show_nav_link('user_profile');" >
								 <div class="userProfile" style="padding-left:10px;padding-top:0px;">
									<img ng-if='appointment_info.PatientPhoto == ""' src="/ayushman/assets/app/img/profile.png" alt="Profile.png">
									<img ng-if='appointment_info.PatientPhoto != ""' ng-src="{{appointment_info.PatientPhoto}}" style="box-shadow:2px 7px 19px #888888;max-height:50px;" alt="Profile.png">
									<p>
									  <span>
									<img ng-if="presence[appointment_info.refappfromid_c]" ng-src="{{'/ayushman/assets/app/img/'+presence[appointment_info.refappfromid_c]+'.png'}}" style="height:15px;width:15px;border:none;"/>
									<img ng-if="!(presence[appointment_info.refappfromid_c])" ng-src="/ayushman/assets/app/img/offline.png" style="height:15px;width:15px;border:none;"/>
									  </span>
									  <span class="patientsName">{{appointment_info.Patientname}}</span>
									  <span class="patientsAge">{{appointment_info.age}}</span><br />
										  <span>{{appointment_info.incidentsname_c}}</span>
									</p>
									
								  </div>
							</li>
						</ul>
						  <div class="navbar-header pull-right">
								<ul class="nav navbar-nav navbar-right">
									<li>
										<p>
										  <a ng-if="appointment_info.mode=='Online'" href="" ng-click='connect();' ng-show='!onlineConn'><span class="notes"></span><span class="menuText">Start Call</span></a>
										  <a href="" ng-click='showVideo=!showVideo' ng-show='onlineConn'><span class="notes"></span><span class="menuText">Toggle Video</span></a>
										  <div class="sectionBoxCallout video" ng-show="isVideo && showVideo">
												<iframe id="videoframe" style="height: 555px;"></iframe>
										  </div>
										</p>
									</li>
									<li ng-click="launchComplexModal()" ng-show="show_nav_link('prescription')">
										<a href="" id="viewprescription"><span class="viewSummary"></span><span class="menuText">Prescription</span></a>
									</li>
									<li ng-show="show_nav_link('overview')">
										<a href="#/followup/{{appointment_info.appointment_id}}"><span class="overview"></span><span class="menuText">Overview</span></a>
									</li>
									<li ng-show="show_nav_link('notes')">
										<a href="" ng-click='showNotes = !showNotes; visible="notes"'><span class="notes"></span><span class="menuText">Notes</span></a>
										<div class="sectionBoxCallout" ng-show="showNotes && is_visible('notes')">
											<h2 class="orange"><span class="icons iconNotes">Notes</span></h2>
											<textarea class="notesComments contentDetails smallContent" placeholder="Write notes here" ng-model="doctor_notes.notes" style='resize: none'></textarea>
											<div class="detailsLink orange"> <a href="javascript:void(0);" ng-click="save_notes(appointment_info.appointment_id, appointment_info.refappfromid_c);">Save Notes</a> </div>
										</div>
									</li>
								  <li ng-show="show_nav_link('risk')">
									<a href="" ng-click='showRisk = !showRisk;visible="risk"'><span class="risks"></span><span class="menuText">Risks</span></a>
									<div class="sectionBoxCallout" ng-show='showRisk && is_visible("risk")'>
									  <h2 class="red"><span class="icons iconWarning">Risk Factors</span></h2>
									  <div class="riskFactorDetails contentDetails smallContent">
										<ul ng-repeat="risk in risks">
										  <li ng-show="!(risk.edit_mode)">
										{{risk.risk_text}} 
										<span ng-if='risk.writer_id == appointment_info.doctorid' class="iconDelete" ng-click="delete_risk($index,appointment_info.refappfromid_c)"></span>
										<span ng-if='risk.writer_id == appointment_info.doctorid' class="iconEdit" ng-click="risk.edit_mode = true"></span>
										  </li>
										  <li ng-show="(risk.edit_mode)">
										<input type="text" ng-model="risk.risk_text" />
										<div class="iconSave" ng-click="edit_risk($index,appointment_info.refappfromid_c);risk.edit_mode=false"></div>
										  </li>
										</ul>
									  </div>
									  <div class="detailsLink red">
										<input type="text" ng-model="new_risk.text"/>
										<a href="javascript:void(0);" ng-click="add_risk(appointment_info.refappfromid_c);">Enter Risk</a> </div>
									</div>
							  </li>
								  <li ng-show="show_nav_link('tracker');">
									<a href="#/patienttracker/{{appointment_info.refappfromid_c}}" ><span class="tracker"></span><span class="menuText">Trackers</span></a>
									<!--<div class="sectionBoxCallout" ng-show='showTracker && is_visible("tracker")'>
									  <h2 class="green"><span class="icons iconTracker">Trackers</span></h2>
									  <div class="calloutGridStyle">
										  <div class="calloutGridStyle" ng-if="tracker_info['current_tracker_id'] != null && tracker_info['gridOptions'][tracker_info['current_tracker_id']]" ng-grid="currentGrid"></div>
										<h3 ng-if='tracker_info["current_tracker_id"] == null' >No trackers available for this consultation.</h3>
									  </div>
									  <div class="detailsLink green">
										<a href="#/tracker/{{appointment_info.appointment_id}}" ng-click="showTracker = !showTracker; visible='tracker';">View all Trackers</a>
									  </div>
									</div>-->
								</li>
								  <li ng-show="show_nav_link('emr')">
									<a href="" ng-click='showEMR = !showEMR;visible="emr"' ><span class="emr"></span><span class="menuText">EMR</span></a>
									<div class="sectionBoxCallout" ng-show='showEMR && is_visible("emr")'>
									  <h2 class="blue"><span class="icons iconEMR">EMR</span></h2>
									  <div class="smallContent contentDetails">
										<h3>Allergies</h3>
										<p ng-if="emr_snapshot.allergies!= '' "><font class="bodytext_bold"></font><font class="bodytext_bold" ng-repeat="allergy in emr_snapshot.allergies">{{allergy.0}}&nbsp;</font></p>
										<p ng-if="emr_snapshot.allergies == '' ">No information provided.</p>
										<hr />
										<h3>Past Diseases</h3>
										<p ng-if="emr_snapshot.past_diseases != '' "><font class="bodytext_bold"></font><font class="bodytext_bold" ng-repeat="disease in emr_snapshot.past_diseases">{{disease}}&nbsp;,</font></p>
										<p ng-if="emr_snapshot.past_diseases == '' ">No information provided.</p>
										<hr />
										<h3>Current Illness and Treatment History</h3>
										<p ng-if="emr_snapshot.past_illness != '' "><font class="bodytext_bold"></font> <font class="bodytext_bold" ng-repeat="illness in emr_snapshot.past_illness">{{illness.disease_name}}&nbsp;,</font></p>
										<p ng-if="emr_snapshot.past_illness == '' ">No information provided.</p>
										<hr />
										<h3>Operation Procedures</h3>
										<p ng-if="emr_snapshot.past_surgeries != '' "><font class="bodytext_bold"></font><font class="bodytext_bold" ng-repeat="surgery in emr_snapshot.past_surgeries">{{surgery.surgery_name}}&nbsp;,</font></p>
										<p ng-if="emr_snapshot.past_surgeries == '' ">No information provided.</p>
									  </div>
									  <div class="detailsLink blue"> <a href="#/emr/{{appointment_info.refappfromid_c}}">View / Edit EMR</a> </div>
									</div>
									  </li>
										  <li ng-show="show_nav_link('examination');">
											<a  href="#/examination/{{appointment_info.appointment_id}}" ><span class="examination"></span><span class="menuText">Examination</span></a>
												<!--<a href="" ng-click='showExamination =!showExamination; visible="examination"'><span class="examination"></span><span class="menuText">Examination</span></a>
												<div class="sectionBoxCallout" ng-show='showExamination && is_visible("examination")'>
												  <h2 class="darkblue"><span class="icons iconExamination">Examination</span></h2>
												  <div class="examinationContent contentDetails smallContent">
													<h3 ng-if="pastAppData.maincomplaint">Main Complaint</h3>
													<p ng-if="pastAppData.maincomplaint">{{pastAppData.maincomplaint}}.</p>
													<h3 ng-if="pastAppData.diagnosis">Diagnosis</h3>
													<p ng-if="pastAppData.diagnosis">{{pastAppData.diagnosis}}.</p>
													<h3 ng-if="pastAppData.investigation">Investigation</h3>
													<p ng-if="pastAppData.investigation">{{pastAppData.investigation}}.</p>
													<h3 ng-if="pastAppData.medicine">Medicine</h3>
													<p ng-if="pastAppData.medicine">{{pastAppData.medicine}}.</p>
													<h3 ng-if="!pastAppData.maincomplaint && !pastAppData.diagnosis && !pastAppData.investigation && !pastAppData.medicine">No Past Data</h3>
												  </div>
												  <div class="detailsLink darkblue"> <a href="#/examination/{{appointment_info.appointment_id}}">Launch Examination</a> </div>
												</div>-->
										</li>
									  <li ng-show="appointment_info.mode!=Online" >
									<!-- <a href="" ng-if="appointment_info.mode!='Online'" ng-click="viewSummary();"><span class="viewSummary"></span><span class="menuText">View Summary</span></a>-->
										<a href="" ng-show="appointment_info.mode=='Online'" ng-click="sendData();"><span class="viewSummary"></span><span class="menuText">Send Data</span></a>
									  </li>
										  <li ng-click="endConsultation()" ng-show="show_nav_link('end consultation')">
									<a href=""><span class="endConsultation"></span><span class="menuText">End Consultation</span></a>
							  </li>
							  <li ng-show="show_nav_link('end consultation')">
									<a class="navbar-brand" ng-click="loading(true);" style="float:right;" href="javascript:history.go(-1)" class="bodytext_normal"><img src="/ayushman/assets/app/img/back.png" style="width:41%"/><font size="3">Back</font></a>
							  </li>
								</ul>
						  </div>
						</div>
				  </div>
				</div>
				<div id="contentDiv" class="container fullWidth " ng-view style="height:auto;overflow-y: auto;"></div>
			</div>
			<style type="text/css">
				.ui-autocomplete { max-height: 90%; overflow-y: auto; overflow-x: hidden;
				-moz-box-shadow: 0 4px 15px rgba(0,0,0,1);
				-webkit-box-shadow: 0 4px 15px rgba(0,0,0,1);
				box-shadow: 0 4px 15px rgba(0,0,0,1);
				}
				.container2 {
					margin-left:0 !important;
					margin-top:50px !important;
				}
			</style>
        </div>
		</div>
        
		<script type='text/javascript'>
			var appointmentid = '<?php if(isset($appId))echo $appId; ?>';
			var servername = '<?= $arr_xmpp["servername"]; ?>';
			var user_id = '<?= $objuser->id ?>';
			var doc_name = '<?= $objuser->Firstname_c  ?>';
			var xmpp_pass = '<?= $objuser->xmpppassword_c ?>';
		</script>
		<form id="emrform" method="post" enctype="multipart/form-data">
			<input type="hidden" value="" id="transferto" name="transferto"/>
			<input type="hidden" id="vitalsTextTarget" name="textvital" value=""/>
			<input type="hidden" id="symptomatic_text_target" name="textsymptom" value=""/>
			<input type="hidden" id="examinations_text_target" name='textexamination' value=""/>
			<input type="hidden" id="diagnosis_text" name="textdiagnosisnote" value="{{examination_data.text_diagnosis}}"/>
			<input type="hidden" id = "test_ids" name = "testIds" value="" />
			<input type="hidden" id = "medicine_ids" name = "medicineIds" value = "" />
			<input type='hidden' id='text_complaint' name="textcomplaint" value="{{examination_data.text_complaint}}"/>
			<input type='hidden' id='text_reportparameter' name="textreportparameter" value="{{examination_data.text_reportparameter}}"/>
			<input type='hidden' id='parameterids' name="parameterids" value="{{examination_data.parameterids}}"/>
			<input type='hidden' id='oparameter' name="oparameter" value="{{examination_data.text_onlyparameter}}"/>
			<input type='hidden' id='odate' name="odate" value="{{examination_data.text_onlydate}}"/>
			<input type='hidden' id='olab' name="olab" value="{{examination_data.text_onlylab}}"/>
			<input type='hidden' id='orefrange' name="orefrange" value="{{examination_data.text_onlyrefrange}}"/>
			<input type='hidden' id='text_followup_note' name="textfollowupnote" value="{{examination_data.text_followup}}"/>
			<input type='hidden' id='text_examinationsummary' name="textexaminationsummary" value="{{examination_data.text_examinationsummary}}"/>
			<input type="hidden" name="appid" value="{{appointment_info.appointment_id}}" />
			<input type="hidden" id="jsontextexamination" name="jsontextexamination" value="" />
			
			<input type="hidden" id="check_symptoms" name="check_symptoms" value="true" />
			<input type="hidden" id="check_examinations" name="check_examinations" value="true" />
			<input type="hidden" id="check_diagnosis" name="check_diagnosis" value="true" />
			<input type="hidden" id="check_examinationsummary" name="check_examinationsummary" value="true" />
			<input type="hidden" id="check_vitals" name="check_vitals" value="true" />
			<input type="hidden" id="check_symptomaticreview" name="check_symptomaticreview" value="true" />
		</form>
        <script src="/ayushman/assets/js/jquery.multilevelpushmenu.min.js"></script>
        <script type="text/javascript" src="/ayushman/assets/js/responsive.js"></script>
		<div id="informationpopup" style="border: 7px solid #ecf8fb;width:300px;position:relative;background-color:#ffffff;">
			<div style="width:100%; height:25px; background-color:#ecf8fb; border-bottom:1px solid #a8c8d9; text-align:left; margin-bottom:10px;">
			  &nbsp;&nbsp;<img src="/ayushman/assets/app/img/bullet.png" style="width: 15px;height: 15px; margin-top: 5px;margin-left: 5px" />&nbsp;
			  <label id="informationheading" class="bodytext_bold" style="display: inline-block">Information</label>
			  <label style="float:right; height:25px; margin-top:5px;display: inline-block"><img src="/ayushman/assets/app/img/close_icon.png" style="cursor:pointer;width: 15px;height: 15px;" onclick="$('#informationpopup').dialog('close');"/></label>
			</div>
			<div id="informationbody" style="width:100%;padding:10px;"></div>
			<div style="width:100%; height:25px; background-color:#ecf8fb; border-top:1px solid #a8c8d9; margin-top:10px;"></div>
		</div>
    </body>
</html>
