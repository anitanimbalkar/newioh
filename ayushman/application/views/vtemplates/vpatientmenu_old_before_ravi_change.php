<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/ayushman/assets/js/hopscotch/hopscotch.min.css">
		<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
		<script src="/ayushman/assets/js/bootstrap.min.js"></script>
		<script src="/ayushman/assets/js/hopscotch/hopscotch.min.js"></script>
		<script type="text/javascript">
			function fancyboxclosed(obj){
			alert('fancyboxclosed');
		}
		$(document).ready(function(){

			tour = {
				id: "hello-hopscotch",
				i18n: {
					stepNums : [<?php echo '""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""';?>]
		},


		steps: [

			{
				title: "Build Your EMR",
			content: "Here, you can maintain and update your electronic medical records(EMR) yourself. Maintaining your EMR will help doctor to understand your case better.",
			target: "#editemr",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Upload and Tag your Reports",
			content: "Here, you can upload your medical reports in the system so that you can access it from anywhere online.It will also be helpful for the doctors to understand your case history.",
			target: "#Uploadreports",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"
		},

			{
				title: "Edit Your Profile here",
			content: "Here, you can fill your demographics to help us know you better and improve your search results.",
			target: "#profile",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"
		},
			{
				title: "Choose Plan",
			content: "Indiaonlinehealth is a paid platform so you have to pay some charges for using this platform. Here we have list of all plans that are available for you. You can choose that suits you best. ",
			target: "#plan",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"
		},
			{
				title: "Upcoming appointments",
			content:"Here, you can view the upcoming appointments that you have taken with any of the doctors. Here you can cancel or reschedule your appointments . Incase of online Appointments you can consult the doctor at your booked timeslot.",
			target:"#upappoint",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Fix appointments",
			content:"Here, you can see the list of all clinics of all the doctors in your network. This section shows you the earliest available time slot and a link to choose from all available slots. <br/>Note: <br/>(1). This section will be visible to you only after choosing a plan. If you haven't choose one, find choose plan section below.<br/>(2). You have to add doctor to your network to get their clinic timings and available slots, from the doctors section named under My networks below.",
			target:"#fixappoint",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Diagnostic tests",
			content:"Here, you can Order, Reassign pathologist and Reorder the pathology test and you can also view all of your ordered test and track their status.",
			target:"#Diagnostic",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Medicines",
			content:"Here, you can order medicines, reassign chemist and View previously order medicines and track their Delivery status.<br/> Note: We only allow you to order the medicines which are prescribed to you by using our application. ",
			target:"#medicines",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Doctor Network",
			content:"Our application gives you and only you, the right to provide visibility of your EMR. Hence in this section you can add Doctors to your network.Only the added doctors can view your EMR.<br/> Note:Before taking appointment,you have to add the doctor to your network.",
			target:"#docnet",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Diagnostic center",
			content:"Our application provides you the facility to add the pathalogy lab which is suitable for you into your network so that you dont have to go through a large list of Diagnostic center for ordering the test. Only the added pathology labs in your network will be shown while placing the order.",
			target:"#Diagnosticnet",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Chemist Network",
			content:"Our application provides you the facility to add the chemist which is suitable for you into your network so that you dont have to go through a large list of chemists for ordering the medicines. Only the added chemists in your network will be shown while placing the order.",
			target:"Chemistnet",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Relatives",
			content:"Here, you can add your relatives to your network and manage their EMR on their behalf.",
			target:"Relatives",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		}
		],
		showPrevButton: false,
			scrollTopMargin:800,


		};
		//hopscotch.startTour(tour,0);
		})
		function showstep(step)
			{
				//console.log("hi");
				hopscotch.startTour(tour, step);
		}
		function hidestep()
			{
				hopscotch.endTour([true]);
		}
		</script>
		<script type="text/javascript">
			function uncheckbox(){
			$("#menuBtn").click();
			}
		</script>

<script>
	$( document ).ready(function() {
		$('.my-order-cls').click(function() {
			$('iframe').addClass('iframe-body-height')
		});
		$('.menu-links').click(function(e) {
            $('iframe').removeClass('iframe-body-height')
        });
	});

</script>

			<div class="menu-list">
				<div class="col-sm-12 col-md-12 no-padding">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Appointment</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<table class="table">
										<tr id="upappoint" name="upappoint" onmouseover="showstep(4)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" onclick="getcontent('/ayushman/cpatientdashboard/view');uncheckbox();" href="javascript:void(0);">Upcoming Appointment</a>
											</td>
										</tr>
										<tr id="fixappoint" name="fixappoint" onmouseover="showstep(5)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/cappointmenteditor/bookappointment');uncheckbox();" href="javascript:void(0);">Fix an Appointment</a>
											</td>
										</tr>
										<tr id="fixappointnew" name="fixappointnew" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="window.location = '/ayushman/cpatienthistorydisplay/view?#/Consumerbookappointment/<?php echo Auth::instance()->get_user()->id?>/0'" href="javascript:void(0);">Book Appointment</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">My Orders</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr id="Diagnostic" name="Diagnostic" onmouseover="showstep(6)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" href="javascript:void(0);"  onclick="getcontent('/ayushman/cpatientrequistiontests/viewFootable');uncheckbox();">Diagnostic Tests</a>
											</td>
										</tr>
										<tr id="medicines" name="medicines" onmouseover="showstep(7)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" href="javascript:void(0);"  onclick="getcontent('/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription');uncheckbox();">Prescriptions</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#myemidiv">My EMR</a>
								</h4>
							</div>
							<div id="myemidiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="window.location = '/ayushman/cpatienthistorydisplay/view?#/patientemrnewui/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);">View / Edit EMR</a>
											</td>
										</tr>
										<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="window.location = '/ayushman/cpatienthistorydisplay/view?#/patienttracker/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);">Universal Tracker </a>
											</td>
										</tr>
										<tr id="Uploadreports" name="Uploadreports" onmouseover="showstep(1)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/cuploadpastvisit/uploadpastvisit');uncheckbox();" href="javascript:void(0);">View / Upload Reports</a>
											</td>
										</tr>
										<tr>
											<td>
												<a class="menu-links" href="javascript:void(0);" onclick="getcontent('/ayushman/cuploadpastvisit/uploadpastprescription');uncheckbox();" >View/Upload Prescriptions</a>
											</td>
										</tr>
										<tr>
											<td>
												<a class="menu-links" href="javascript:void(0);" onclick="getcontent('/ayushman/cbulkconsultation/uploadconsultation');uncheckbox();" >Bulk Consultations Upload</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#myaccountdiv">My Account</a>
								</h4>
							</div>
							<div id="myaccountdiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr id="profile" name="profile" onmouseover="showstep(2)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/cpatientprofile/displayProfile');uncheckbox();" href="javascript:void(0);"> Edit Profile</a>
											</td>
										</tr>
										<tr id="plan" name="plan" onmouseover="showstep(3)" onmouseout="hidestep()">
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/cplanmanager/showselectedplan');uncheckbox();" href="javascript:void(0);">Choose Plan</a>
											</td>
										</tr>
										<tr>
											<td>
												<a class="menu-links" href="javascript:void(0);" onclick="getcontent('/ayushman/cchangepassword/changepassword');uncheckbox();" >Change Password</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#mynetworkdiv">My Network</a>
								</h4>
							</div>
							<div id="mynetworkdiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr id="docnet" name="docnet" onmouseover="showstep(8)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" onclick="getcontent('/ayushman/cdoctordirectory/view');uncheckbox();" href="javascript:void(0);">Doctor</a>
											</td>
										</tr>
										<tr id="Diagnosticnet" name="Diagnosticnet" onmouseover="showstep(9)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" onclick="getcontent('/ayushman/cpathologistdirectory/view');uncheckbox();" href="javascript:void(0);">Diagnostic Center</a>
											</td>
										</tr>
										<tr id="Chemistnet" name="Chemistnet" onmouseover="showstep(10)" onmouseout="hidestep()">
											<td>
												<a class="my-order-cls" onclick="getcontent('/ayushman/cchemistdirectory/view');uncheckbox();" href="javascript:void(0);">Chemist </a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#financediv">Finance</a>
								</h4>
							</div>
							<div id="financediv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/caccountstatement/view');uncheckbox();" href="javascript:void(0);"> Statements</a>
											</td>
										</tr>
										<tr>
											<td>
												<a class="menu-links" onclick="getcontent('/ayushman/crecharge/view');uncheckbox();" href="javascript:void(0);">Recharge Account </a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		<!--<table width="155" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="78" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr>
						<td class="Heading_Bg"><img src="/ayushman/assets/images/Notifications_Icon.png" width="15" height="15" align="top" />&nbsp;&nbsp;<strong>Appointment</strong> </td>
					</tr>
					<tr id="upappoint" name="upappoint" onmouseover="showstep(4)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cpatientdashboard/view');" href="javascript:void(0);">Upcoming Appointment</a></td>
					</tr>
					<tr id="fixappoint" name="fixappoint" onmouseover="showstep(5)" onmouseout="hidestep()" >
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cappointmenteditor/bookappointment');" href="javascript:void(0);">Fix an Appointment</a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="75" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr>
						<td class="Heading_Bg"><img src="/ayushman/assets/images/My Report.png" width="15" height="15" align="top" />&nbsp;&nbsp;<strong>My Orders</strong> </td>
					</tr>
					<tr id="Diagnostic" name="Diagnostic" onmouseover="showstep(6)" onmouseout="hidestep()" >
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a href="javascript:void(0);"  onclick="getcontent('/ayushman/cpatientrequistiontests/view');" > Diagnostic Tests</a></td>
					</tr>
					<tr id="medicines" name="medicines" onmouseover="showstep(7)" onmouseout="hidestep()" >
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);"  onclick="getcontent('/ayushman/cpatientmedicines/view');" >Prescriptions</a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="81" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr>
						<td class="Heading_Bg"><img src="/ayushman/assets/images/My_EMR.png" width="17" height="13" align="top" />&nbsp;&nbsp;<strong>My EMR</strong> </td>
					</tr>
					<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;">
							<img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="window.location = '/ayushman/cpatienthistorydisplay/view?#/patientemr/<?php echo Auth::instance()->get_user()->id; ?>'" href="javascript:void(0);">View / Edit EMR </a></td>
					</tr>
					<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;">
							<img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="window.location = '/ayushman/cpatienthistorydisplay/view?#/patienttracker/<?php echo Auth::instance()->get_user()->id; ?>'" href="javascript:void(0);">Universal Tracker </a></td>
					</tr>
					<tr id="Uploadreports" name="Uploadreports" onmouseover="showstep(1)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;">
							<img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cuploadpastvisit/uploadpastvisit');" href="javascript:void(0);">View / Upload Reports</a></td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;">
							<img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="getcontent('/ayushman/cuploadpastvisit/uploadpastprescription');" >View/Upload Prescriptions</a></td>  &lt;!&ndash; Changed Prescription to View/Upload Prescriptions by Ravindra&ndash;&gt;
					</tr>
					<tr>
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="getcontent('/ayushman/cbulkconsultation/uploadconsultation');" >Bulk Consultations Upload</a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="87" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr>
						<td class="Heading_Bg"><img src="/ayushman/assets/images/MyAccount_Icon.png" width="15" height="18" align="top" />&nbsp;&nbsp;<strong>My Account</strong> </td>
					</tr>
					<tr id="profile" name="profile" onmouseover="showstep(2)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cpatientprofile/displayProfile');" href="javascript:void(0);"> Edit Profile</a> </td>
					</tr>
					<tr id="plan" name="plan" onmouseover="showstep(3)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cplanmanager/showselectedplan');" href="javascript:void(0);">Choose Plan</a> </td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="getcontent('/ayushman/cchangepassword/changepassword');" >Change Password</a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="98" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr id="networks" name="networks">
						<td class="Heading_Bg"><img src="/ayushman/assets/images/MyNetwork_Icon.png" width="15" height="14" align="top" />&nbsp;&nbsp;<strong>My Network</strong> </td>
					</tr>
					<tr id="docnet" name="docnet" onmouseover="showstep(8)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp; <a onclick="getcontent('/ayushman/cdoctordirectory/view');" href="javascript:void(0);">Doctor</a></td>
					</tr>
					<tr id="Diagnosticnet" name="Diagnosticnet" onmouseover="showstep(9)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a  onclick="getcontent('/ayushman/cpathologistdirectory/view');" href="javascript:void(0);">Diagnostic Center</a></td>
					</tr>
					<tr id="Chemistnet" name="Chemistnet" onmouseover="showstep(10)" onmouseout="hidestep()">
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="getcontent('/ayushman/cchemistdirectory/view');" href="javascript:void(0);">Chemist </a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="83" align="left" valign="top">
				<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_Border">
					<tr>
						<td class="Heading_Bg"><img src="/ayushman/assets/images/MyAccount_Icon.png" width="15" height="18" align="top" />&nbsp;&nbsp;<strong>Finance</strong></td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;<a onclick="getcontent('/ayushman/caccountstatement/view');" href="javascript:void(0);"> Statements</a> </td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" class="bodytext_normal" style="padding-left:10px; padding-top:5px; padding-bottom:7px;"><img src="/ayushman/assets/images/BlueArrow_Icon1.png" width="11" height="8" />&nbsp;&nbsp;&nbsp;<a onclick="getcontent('/ayushman/crecharge/view');" href="javascript:void(0);">Recharge Account </a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>-->
