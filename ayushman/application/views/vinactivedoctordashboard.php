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

			<script src="/ayushman/assets/app/js/directives.js"></script>

			<script src="/ayushman/assets/app/js/controllers/landingctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/dashboardctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/followupctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/emrctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/templatectrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/examctrl.js"></script>
			<script src="/ayushman/assets/app/js/controllers/trackerctrl.js"></script>
			<script src="/ayushman/assets/app/js/services/patienttrackerservice.js"></script>
			<script src="/ayushman/assets/app/js/controllers/patienttrackerctrl.js"></script>

			<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
			<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
			<script src="/ayushman/assets/app/js/services/xmppservice.js"></script>
			<script src="/ayushman/assets/app/js/services/examinfoservice.js"></script>
			<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
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

			<script src="/ayushman/assets/app/js/createDialog.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<link rel="stylesheet" type="text/css" href="/ayushman/assets/css/style.css" />
        <div id="lazy" style="min-width:1024px;">
			<div xmlns:ng="http://angularjs.org" id="ng-app" style="height:99%">
       			<?php
	      			$_GET['flag']='0';
    	   			$registrationProcess= Request::factory('cregistrationProcess/view');
 					echo $registrationProcess->execute();
				?>
			  <div id="template"  ng-controller="templateCtrl" style="height: 95%">
				<div class="navbar header">
					<div class="container fullWidth" style="width:1024px !important;">
						<div class="navbar" style="position:relative;">
							<a class="navbar-brand" href=""><img src="/ayushman/assets/app/img/logo.png" alt="India Online Health"></a>
						  	<div style="margin-top:2px;margin-left:15px;float:right;right:10px;display:inline-flex;">
						  		<img ng-src="{{myprofile['userinfo'].PatientPhoto}}" style="height:50px;" alt="Profile.png">
								<span class="bodytext_normal" style="padding-left:10px;">Welcome 
								<img ng-if="presence[myprofile['userinfo'].id]" ng-src="{{'/ayushman/assets/app/img/'+presence[myprofile['userinfo'].id]+'.png'}}" style="height:12px;width:12px;border:none;"/>
								<img ng-if="!(presence[myprofile['userinfo'].id])" ng-src="/ayushman/assets/app/img/offline.png" style="height:15px;width:15px;border:none;"/>
									Dr. {{myprofile['userinfo'].name}}</br>
 							    <a class="bodytext_normal" href="/ayushman/cuser/logout">Log Out</a>
								</span>
							</div>			
							<div style="width:100%; margin-top:3px;padding-right:50px;">
			

							<div style="display:inline-flex;width:100%;background:white;margin-top:1px;height:auto;">
								<?php 
										$objUser = Auth::instance()->get_user();
										$obj_userRegsteps = ORM::factory('auditlog')
											->where('field_name','=','activationstatus_c')->where('old_value','=','activatedoctor')->where('row_pk','=',$objUser->id)
											->find_all();

										$auditlogcount=$obj_userRegsteps->count();
										
										 if($objUser->activationstatus_c == 'activatedoctor'){
											echo '<div  style="padding:10px;" class="bodytext_error">
											<h4>Note  : Your Activation request is sent to admin & validation of your documents is pending...</h4>
											</div>';
										}
										else if($auditlogcount >'0'){
											echo '<div  style="padding:10px;" class="bodytext_error"><h4>Note  : Your Activation request is rejected by Admin because of Invalid data...Please upload valid certificates and correct your profile</h4></div>';
										}
										else{
											echo '<div  style="padding:10px;" class="bodytext_error">
											<h4>Note  : Unless you fill the required steps ( Upload Certificate , Edit Profile  & Set clinics) in side panel...You can not start practicing!!</h4>
											</div>';
										}
								?>
							</div>

							<div style="display:inline-flex;width:100%;background:white;margin-top:5px;min-height:100px;">
							<div style="padding-top:10px;padding-left:10px;">
							<img src="{{myprofile['userinfo'].PatientPhoto}}" style="box-shadow:2px 7px 19px #888888;max-height:130px;" />
							</div>
							<div style="padding:10px;padding-left:50px;width:25%;" class="bodytext_bold">
								<h5>Personal Info</h5></br> 
								
								Name      :   {{myprofile['userinfo'].name}} </br>
								
								Gender    :  {{myprofile['userinfo'].gender}} </br>
								
								Email     :   {{myprofile['userinfo'].email}}</br>
								Moblie    : {{myprofile['userinfo'].mobile}}</br>
							</div>
							<div style="padding:10px;padding-left:33px;width:30%;" class="bodytext_bold">
							<h5>Doctor Registration Info</h5>
							</br>
							Reg No    :  {{myprofile['userinfo'].regno}} </br>
							Language :   {{myprofile['userknownlanguage'].doctorknownlanguage}} </br>
							Qualification :   {{myprofile['usereducation'].doctoreducation}} </br>
							Domain    :   {{myprofile['userdomain'].doctordomain}} </br>
							Specialization :   {{myprofile['userspecialization'].doctorspecialization}} </br>
							</div>
							<div style="padding:10px;padding-left:67px;width:25%;" class="bodytext_bold">
								<h5>IOH Info </h5></br>
							 
								IOH Id    :  {{myprofile['userinfo'].id}} </br>
								Activation Status :   {{myprofile['userinfo'].activationstatus}}
								</br>
							</div>
							<h5 style="width:9%;"><a href="/ayushman/cconsultation/view?#/myprofile/"  style="float:right;"  title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:14px;color:blue;">&nbsp;Edit</i></a></h5>

							</div>
							<div style="display:inline-flex;width:100%;background:white;margin-top:5px;height:auto;">
								<div style="padding:10px;width:100%;" class="bodytext_bold" >
									<h5>Profile as seen by patient <a href="/ayushman/cconsultation/view?#/myprofile/" style="float:right;"  title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:14px;color:blue;">&nbsp;Edit</i></a></h5>
									</br>
									{{myprofile['userinfo'].doctorprofile}} </br>
								</div>
									

							</div>

							<div style="display:inline-flex;width:100%;background:white;margin-top:5px;height:auto;">
								<div style="padding:10px;width:100%;" class="bodytext_bold">
									<h5>Clinics <a href="/ayushman/cdoctorclinic/view#/" style="float:right;"  title="Click To Edit" ><i class="fa fa-pencil-square-o" style="font-size:14px;color:blue;">&nbsp;Edit</i></a></h5></br>
				    
									<div id="externalHTML">
  										 <?php $clinic_earliest_view = Request::factory('callearliestappointment/view');
											echo $clinic_earliest_view->execute(); ?>
									</div>
								</div>
							</div>
							
							</div>
							
							</div>
						
					</div>
				</div>
			</div>
			<style type="text/css">
				.ui-autocomplete { max-height: 90%; overflow-y: auto; overflow-x: hidden;
				-moz-box-shadow: 0 4px 15px rgba(0,0,0,1);
				-webkit-box-shadow: 0 4px 15px rgba(0,0,0,1);
				box-shadow: 0 4px 15px rgba(0,0,0,1);
				}
			</style>
			
			<script type='text/javascript'>
				function search(){
					$("#searchbutton").removeClass('fa fa-search');
					$("#searchbutton").addClass('fa fa-spinner');
					$('input#search').autocomplete("search");
				}
				$("#search").autocomplete({
					source:function(request, response){
						$("#searchbutton").removeClass('fa fa-search');
						$("#searchbutton").addClass('fa fa-spinner');
						$.post("/ayushman/cconsultation/getpatients", {data:request.term}, function(data){     
							response($.map(data, function(item) {
								return {
									value: item.patientname,
									label: item.patientname,
									icon: item.photo,
									gender: item.gender,
									age: item.age,
									mobilenumber: item.mobilenumber,
									city: item.city_c,
									location: item.location_c,
									id: item.patientuserid
								}
							}))
						}, "json");
					  },
					minLength: 3,
					maxHeight:500
				})
				.data("autocomplete")._renderItem = function (ul, item) {
					$("#searchbutton").removeClass('fa fa-spinner');
					$("#searchbutton").addClass('fa fa-search');
					$('#search').trigger("focus");
					return $("<li>")
						.data("item.autocomplete", item)
						.append('<div class="bodytext_bold" style="align:inline;width:336px;padding-left:5px;padding-top:5px;padding-bottom:5px;border-bottom:1px solid #9cd4f9;border-left:1px solid #9cd4f9;border-right:1px solid #9cd4f9;" ><img src="'+item.icon+'" style="float:left;height:60px;width:45px;"/><div style="padding-left:50px;"><span>'+item.label+' ('+item.gender+' '+item.age+') </br>'+item.city+' '+item.location+' </br>IOH Id : '+item.id+'</br>'+item.mobilenumber+' </br> <span style="color:blue;cursor:pointer;" onclick="show_emr('+item.id+');" >View EMR </span>/<span style="color:blue;cursor:pointer;" onclick="edit_emr('+item.id+');" >Edit EMR </span> </span></div>'+
							'<div style="padding-top:10px;padding-left:50px;"><input type="button" class="button" onclick="connectnowclick('+item.id+',0,1)" value="Quick Prescription" />&nbsp;&nbsp;<input type="button" class="button" onclick="connectnowclick('+item.id+',1)" value="Start Consultation" ></input>'+
							'<div id="'+item.id+'toggle" style="box-shadow:2px 7px 19px #888888;position:absolute;background:white;float:right;display:none;width:auto;">'+
							'</div>'+'</div></div>').appendTo(ul);
				};
				//connectnowclick('+item.id+',1)
				function edit_emr(patientUserId){
					openDialog("/ayushman/cpatientallergy/view?patientUserId="+patientUserId,800,600);
					//window.open("/ayushman/cpatientallergy/view?patientUserId="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
				}
				function removeItemInList(i)
				{
					var list  = document.getElementById('incidentcombo');
					list.remove(i);
				}

				function additemtolocation (locationvalue,id)
				{
					var opt = document.createElement("option");
					opt.text =locationvalue
					opt.value = id;
					document.getElementById("incidentcombo").options.add(opt);       
				}
				function newincidentbuttonclick()
				{
					$("#lblerror").text("");
					document.getElementById('incidentcombo').disabled = true;
					document.getElementById('profileList').disabled = false;
					document.getElementById('incidenttxt').value ="";
					document.getElementById('incidenttxt').disabled = false;
				}
				function show_emr(patientUserId)
				{
					openDialog("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId,948,600);
					//window.open("/ayushman/cpatienthistorydisplay/displaydemographic?showall=true&patientid="+patientUserId+"",'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=948,height=650');
				}
				function oldincidentbuttonclick()
				{
					$("#lblerror").text("");
					document.getElementById('incidentcombo').disabled = false;
					document.getElementById('profileList').disabled = true;
					document.getElementById('incidenttxt').disabled = true;
					document.getElementById('incidenttxt').value ="";
				}
				function connectnowclick(patientUserId,lastappset,quick)
				{
					
					document.getElementById("patientuserid").value = patientUserId;
					document.getElementById('newincidentbutton').checked = true;
					if(lastappset == 0)
					{
						document.getElementById('oldIncidenceTr').style.display = 'none';
					}
					else{
						document.getElementById('oldIncidenceTr').style.display = '';
						$.ajax({
							url: "/ayushman/cpatientdirectory/previousincidence?patientuserid="+patientUserId,
							success: function( data ) {
									//var  incidence =  eval('('+data+')');
									var  incidence = eval('(' + (data)+ ')');
									if(incidence == ''){
										}
									else
									{
										for(var iter = document.getElementById("incidentcombo").length -1; iter >= 0; --iter)
										{
											removeItemInList(iter);
										}
										additemtolocation("Previous Incident","");
										for(i=0;i< incidence.length;i++)
										{
											additemtolocation(incidence[i][1],incidence[i][0]);
										}
									}
								},
								error : function(){}
						  });
					  }	
					document.getElementById('incidenttxt').value ="";
					if(quick == 1){
						//connectonclick(1);
						connetonclick(1);
					}else{
						$('#connectnow').dialog('open');
					}
				}
				$(document).ready(function() {
					$(function(){
							$( "input[name=dob]" ).datepicker({yearRange: "-120:+0",maxDate: '0',changeMonth: true,changeYear: true,  dateFormat: 'dd M yy'});
					});
					$('#search').keyup(function(e){
						if(e.keyCode == 13)
						{
							search();
						}
					});
					
					$('#connectnow').dialog({
						autoOpen: false,
						show: "fade",
						hide: "fade",
						width: "auto",
						modal: true,
						height: "auto",
						resize: "auto",
						resizable: false
					});
					$('#loading').dialog({
						autoOpen: false,
						show: "fade",
						hide: "fade",
						modal: true,
						height: "30",
						resizable: false,
						width: "100px"
					});
					
					$('#nonregisteredUser').dialog({
						autoOpen: false,
						show: "fade",
						hide: "fade",
						width: "auto",
						modal: true,
						height: "auto",
						resize: "auto",
						resizable: false,
						position:"center"
					});
				$('#addNewPatient').dialog({
						autoOpen: false,
						show: "fade",
						hide: "fade",
						width: "421px",
						modal: true,
						height: "auto",
						resize: "auto",
						resizable: false
				});
					jQuery("#connectnow").dialog('option', 'position', 'center');
					$(".ui-dialog-titlebar").hide();
					$("#connectInclinicAdhoc").onclick=function(){
						document.getElementById('lblerror').style.display = false;
					};
				});
				function searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB){
					$.ajax({
							url: "/ayushman/ctakeappointment/searchForPatient/get?patName="+patName+"&patLastName="+patLastName+"&patContact="+patContact+"&patEmail="+patEmail+"&patId="+patId+"&dob="+patDOB,
							success: function(jsonSearchResults) {
								searchResults = eval("("+jsonSearchResults+")");
								if(searchResults.length == 0){
									$("<td class='bodytext_bold' colspan='2' align='middle'>No Results Found</td>").appendTo($("#searchresult"));
									$("#searchresult").show();
								}
								else{
									$("#searchresult").empty();
									for(var i=0;i<searchResults.length;i++){
										var result = $("<tr id=result style='height:25;'"+i+"></tr>");
										if(searchResults[i].photo == null){
											var imgsrc = '/ayushman/assets/images/pic02.png';
										}
										else{
											var imgsrc = searchResults[i].photo;
										}
										$("<td width='3%' class='bodytext_normal' align='left' valign='top'><img src='"+imgsrc+"' width='90' height='90' </img></td>").appendTo(result);
										var info = $("<td width='97%' name='patInfo' class='bodytext_normal' align='left'></td>");
										$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Name: "+searchResults[i].name+"</div>").appendTo(info);
										$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >Contact: "+searchResults[i].contact+"</div>").appendTo(info);
										$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >DOB: "+searchResults[i].dob+"</div>").appendTo(info);
										$("<div class='bodytext_normal' valign='middle' style='height:20px;width:30%;padding-left:10px;' >IOH ID: "+searchResults[i].id+"</div>").appendTo(info);
										$(info).appendTo(result);
										$(result).appendTo($("#searchresult"));
										$('<tr><td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;"><button class="button" style="height:25px; line-height:23px; text-align:center; text-decoration:none;" onclick="editProfile('+searchResults[i].id+');">Edit Profile</button>&nbsp;&nbsp;<button class="button" style="height:25px; line-height:23px; text-align:center; text-decoration:none;" onclick="connectnowclick('+searchResults[i].id+',0,1)">Quick Prescription</button>&nbsp;&nbsp;<button class="button" style="height:25px; line-height:23px; text-align:center; text-decoration:none;" onclick="connectnowclick('+searchResults[i].id+',1)">Start Consultation</button></td></tr>').appendTo($("#searchresult"));
									}
									$("#searchresult").show();
									$('#nonregisteredUser').dialog('open');
								}
								
								$('#loading').dialog('close');
							},
							error : function(){
								$("<td class='bodytext_bold' colspan='6' align='middle'>An Error Has Occured. Please Try Again</td>").appendTo($("#searchresult"));
								$("#searchresult").show();
							}
						});
				}
				function addNewPatient(forceadd)
				{
					if($("#firstname").val() != '' && $("#lastname").val() != '' && $("#DOB_c").val() != '' && $("#gender_c").val()!= ''){
						
					}else{
						alert('Please, Fill all mandatory fields.');
						return false;
					}
					$("#searchresult").empty();
					if(forceadd == undefined){
						forceadd = false;
					}else{
						forceadd = true;
					}
					$('#exists').hide();
					$('#nonregisteredUser').dialog('close');
					$('#loading').dialog("open");
					
					$.ajax({
						url: "/ayushman/cregistrar/patientregistrationbystaff?firstname="+$("#firstname").val()+"&lastname="+$("#lastname").val()+"&email="+$("#email").val()+"&contactnumber="+$('#contactnumber').val()+"&mobilenumber="+$('#mobilenumber').val()+"&doctorname=doctor &middlename="+$("#middlename").val()+"&dob="+$("#DOB_c").val()+"&gender="+$("#gender_c").val()+"&forceadd="+forceadd,
						success:function( data ){
							var returnArray= JSON.parse(data);
							if(returnArray['found'] == 'yes'){
								patName = $("#firstname").val();
								patLastName = $("#lastname").val();
								patContact = $('#mobilenumber').val();
								patEmail = '';
								patId='';
								//patDOB = $('#DOB_c').val();
								searchandshow(patName,patLastName,patContact,patEmail,patId,patDOB);
								$('#exists').show();
							}else{
								var displayString= "<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;We have created account for  "+returnArray['name']+". <strong>Ioh id "+returnArray['patientuserid']+"</strong><br/><br/>";
								if((returnArray['mobilenumberPresent']== "true") || (returnArray['emailPresent']== "true" ) )
									displayString = displayString+"<img src='/ayushman/assets/images/Success_Arrow.png' width='20' height='20' />&nbsp;Patient has been notified.<br/><br/>";
								else
									displayString = displayString+"<img src='/ayushman/assets/images/error_icon.png' width='20' height='20' />&nbsp;&nbsp;&nbsp;&nbsp;Patient has not been notified. Please inform IOH id to patient.<br/><br/>";
								$('#addNewPatientInformationBody').html(""+displayString+"");
								
								$('#tdTakeappointment').html('<button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick="editProfile('+returnArray['patientuserid']+');">Edit Profile</button><button class="button" style="height:25px; line-height:23px; text-align:center; float:right; text-decoration:none;" onclick=connectnowclick("'+returnArray['patientuserid']+'","0")>Connect Now</button>');
								$('#addNewPatient').dialog('open');
							}
							$('#loading').dialog("close");
							
						},
						error:function(){
							$('#loading').dialog("close");
							showMessage('250','50','Send Data to patient','Error occured while saving data. Please try again.','error','id');
						},
					});
				}
				function editProfile(patId){
					parent.openDialog("/ayushman/cpatientprofile/displayProfile?patId="+patId, '830px','770px');
				}
				function connetonclick(quick)
				{
					$("#lblerror").text("");
					var incidence= "";
					var newIncidence= "";
					if(document.getElementById('newincidentbutton').checked == true)
					{
						if(document.getElementById('incidenttxt').value == "")
						{ 
							$("#lblerror").text("Please enter Incidence Name");
							document.getElementById('lblerror').style.disabled = true;
						}
						else{
							incidence= document.getElementById('incidenttxt').value;
							newIncidence ="true";
						}
					}
					else
					{
						var s = document.getElementById('incidentcombo');
						var selectedValue = s.options[s.selectedIndex].value;
						if(selectedValue == "")
						{ 
							$("#lblerror").text("Please select Incidence Name");
							document.getElementById('lblerror').style.disabled = true;
						}
						else{
							incidence= selectedValue;
							newIncidence ="false";
						}
					}
					if(quick == 1){
						parent.location="/ayushman/cadhocappointmentmanger/connectinclinc?patientuserid="+document.getElementById("patientuserid").value+"&newIncidence="+'true'+"&incidence="+'Not mentioned'+"&quick="+quick;
					}
					if(document.getElementById("lblerror").innerHTML == "")
					{
						profileValue= '';
						if(document.getElementById("profileList") != undefined){
							profileValue = document.getElementById("profileList").value;
						}
						parent.location="/ayushman/cadhocappointmentmanger/connectinclinc?patientuserid="+document.getElementById("patientuserid").value+"&newIncidence="+newIncidence+"&incidence="+incidence+"&quick="+0+"&p="+profileValue;
						//$("#connectInclinicAdhoc").submit();
					}
				}
				function closepopup(thisclose)
				{
					$("#"+thisclose).dialog("close");
				}
				
				function openDialognew(url, width, height,obj){
					 $.fancybox({
						'width': width,
						'height': height,
						'autoScale': false,
						'transitionIn': 'fade',
						'transitionOut': 'fade',
						'type': 'iframe',
						'href': url,
						'showCloseButton': true,
						'afterClose' : function(){
						location.reload();	
						}
					});
				}
			  var appointmentid = '<?php if(isset($appId))echo $appId; ?>';
			  var servername = '<?= $arr_xmpp["servername"]; ?>';
			  var user_id = '<?= $objuser->id ?>';
			  var doc_name = '<?= $objuser->Firstname_c  ?>';
			  var xmpp_pass = '<?= $objuser->xmpppassword_c ?>';
			  //window.onbeforeunload = function(){
				//return 'The session will be refreshed and you will loose any unsaved data';
			  //}
			</script>
        </div>
		</div>
    </body>
</html>
