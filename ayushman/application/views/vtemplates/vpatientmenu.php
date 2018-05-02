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
			document.getElementById('upcoming').style.background='rgba(255, 110, 2,.4)';
			function toggleIcon(e) {
				$(e.target)
					.prev('.panel-heading')
					.find(".more-less")
					.toggleClass('glyphicon-plus glyphicon-minus');
			}
			$('.panel-group').on('hidden.bs.collapse', toggleIcon);
			$('.panel-group').on('shown.bs.collapse', toggleIcon);
			
			tour = {
				id: "hello-hopscotch",
				i18n: {
					stepNums : [<?php echo '""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""'.','.'""';?>]
		},

		steps: [

			{
				title: "E-Medical Record",
			content: "You can view all and update your medical records(EMR)(prescription, reports etc) yourself. Your EMR will help doctor to understand your case better.",
			target: "#editemr",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Upload Reports",
			content: "You can upload your medical reports in the system so that you can access it from anywhere online and it will be helpful for the doctors to understand your case history.",
			target: "#Uploadreports",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"
		},

			{
				title: "Edit Profile",
			content: "You can fill your personal details to help us know you better.",
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
				title: "Upcoming Events",
			content:"You can view the upcoming appointments that you have taken with any of the doctors. Here you can cancel or reschedule your appointments.",
			target:"#upappoint",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Book appointments",
			content:"You can see the list of all clinics of the doctors in your network. This section shows you the earliest available time slot and a link to choose from all available slots. <br/>Note: <br/>(1). This section will be visible to you only after choosing a plan.<br/>(2). You have to add doctor to your network to get their clinic timings and available slots, from the doctors section named under My networks below.",
			target:"#fixappoint",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Book tests",
			content:"You can Order, Reassign and Reorder pathology test(s) and also view all of your ordered test and track their status.",
			target:"#Diagnostic",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Order Medicines",
			content:"You can order medicines, reassign chemist and View previously order medicines and track their Delivery status.<br/> Note: We only allow you to order the medicines which are prescribed to you by using our application. ",
			target:"#medicines",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Doctor network",
			content:"Our application gives you and only you, the right to provide visibility of your EMR. Hence in this section you can add Doctors to your network.Only the added doctors can view your EMR.<br/> Note:Before taking appointment,you have to add the doctor to your network.",
			target:"#docnet",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Diagnostic center network",
			content:"Our application provides you the facility to add the pathalogy lab which is suitable for you into your network so that you dont have to go through a large list of Diagnostic center for ordering the test. Only the added pathology labs in your network will be shown while placing the order.",
			target:"#Diagnosticnet",
			fixedElement:false,
			showCloseButton:false,
			showNextButton: false,
			placement: "right"

		},
			{
				title: "Chemist network",
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
		
		function uncheckbox(){
			$("#menuBtn").click();
			}
		
	$( document).ready(function() {	
		$('.my-order-cls').click(function() {
			$('iframe').addClass('iframe-body-height')
		});
		$('.menu-links').click(function(e) {
            $('iframe').removeClass('iframe-body-height')
        });
	});
              
function upcommingapp(){
	document.getElementById('upcoming').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function bookappo(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function booktest(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function bookmedi(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function getemr(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function tracker(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function uploadreport(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function uploadprescr(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}

function EditPro(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function ChooseP(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function ChangePass(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function Doctor(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function DigCenter(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function Chemist(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function Statments(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(255, 110, 2,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function Recharge(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(255, 110, 2,.4)';
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function notes(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('notes').style.background='rgba(255, 110, 2,.4)';
	//document.getElementById('reminder').style.background='rgba(30, 190, 240,.4)';
}
function reminder(){
	document.getElementById('upcoming').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('BookApp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('booktest').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('OrderMed').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('e-Medical').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('tracker').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('UploadR').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Uploadp').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('EditPro').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChooseP').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('ChangePass').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Doctor').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('DigCenter').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Chemist').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Statments').style.background='rgba(30, 190, 240,.4)';
	document.getElementById('Recharge').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('notes').style.background='rgba(30, 190, 240,.4)';
	//document.getElementById('reminder').style.background='rgba(255, 110, 2,.4)';
}
</script>
<style>


.more-less {
    float: right;
    color: #212121;
}
</style>
			
			<div class="menu-list">
				<div class="col-sm-12 col-md-12">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							
									<table class="table" style="border:none;">
										<tr id="upappoint" name="upappoint" onmouseover="showstep(4)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="upcommingapp(); getcontent('/ayushman/cpatientdashboard/view');uncheckbox(); " href="javascript:void(0);"><button class="btnstyle" id="upcoming" value="" style="height: 30px;padding: 3px;" >Upcoming Services</button></a>
											</td>
										</tr>
										<tr id="fixappoint" name="fixappoint" onmouseover="showstep(5)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="my-order-cls" onclick="bookappo();getcontent('/ayushman/cpatienthistorybookapp/view?patientid=<?php echo Auth::instance()->get_user()->id ?>&reschedule_appid=0');uncheckbox();" href="javascript:void(0);"><button class="btnstyle" id="BookApp" value="" style="height: 30px;padding: 3px;" >Book Appointment</button></a>												
											</td>
										</tr>
									</table>
							
								<table class="table" style="border:none;">
										<tr id="Diagnostic" name="Diagnostic" onmouseover="showstep(6)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="my-order-cls" href="javascript:void(0);"  onclick="booktest();  getcontent('/ayushman/cpatientrequistiontests/viewFootable');uncheckbox();"><button class="btnstyle" id="booktest" value="BookTest" style="height: 30px;padding: 3px;">Book Test</button></a>
											</td>
										</tr>
										<tr id="medicines" name="medicines" onmouseover="showstep(7)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="my-order-cls" href="javascript:void(0);"  onclick="bookmedi(); getcontent('/ayushman/cpatientmedicines/viewMedicineOrderFromPrescription');uncheckbox();"><button class="btnstyle" id="OrderMed" value="" style="height: 30px;padding: 3px;">Order Medicine</button></a>
											</td>
										</tr>
									</table>
						
								<table class="table"  style="border:none;">
										<!--<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="getemr(); window.location = '/ayushman/cpatienthistorydisplay/view?#/patientemrnewui/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);"><button class="btnstyle" id="e-Medical" value="" style="height: 30px;padding: 3px;">e-Medical Records</button></a>
											</td>
										</tr>
										<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="tracker(); window.location = '/ayushman/cpatienthistorydisplay/view?#/patienttracker/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);"><button class="btnstyle" id="tracker" value="" style="height: 30px;padding: 3px;">Tracker </button></a>
											</td>
										</tr>-->
										<!--<tr id="Uploadreports" name="Uploadreports" onmouseover="showstep(1)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="uploadreport(); getcontent('/ayushman/cuploadpastvisit/uploadpastvisit');uncheckbox();" href="javascript:void(0);"><button class="btnstyle" id="UploadR" value="" style="height: 30px;padding: 3px;">Upload Reports</button></a>
											</td>
										</tr>
										<tr>
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" href="javascript:void(0);" onclick="uploadprescr(); getcontent('/ayushman/cuploadpastvisit/uploadpastprescription');uncheckbox();" ><button class="btnstyle" id="Uploadp" value="" style="height: 30px;padding: 3px;">Upload Prescriptions</button></a>
											</td>
										</tr>-->
<!--											<tr id="" name="fixappoint" onmouseover="" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="notes(); window.location='/ayushman/cpatienthistorydisplay/view?#/Consumerbookappointment/<?php echo Auth::instance()->get_user()->id ?>/0'" href="javascript:void(0);"><button class="btnstyle" id="notes" value="" style="height: 30px;padding: 3px;  ">Notes</button></a>
											</td>
										</tr>
											<tr id="" name="fixappoint" onmouseover="" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="reminder(); window.location='/ayushman/cpatienthistorydisplay/view?#/Consumerbookappointment/<?php echo Auth::instance()->get_user()->id ?>/0'" href="javascript:void(0);"><button class="btnstyle" id="reminder" value="" style="height: 30px;padding: 3px;  ">Reminder</button></a>
											</td>
										</tr>-->
									<!--	<tr>
											<td style="padding:1px;">
												<a class="menu-links" href="javascript:void(0);" onclick="getcontent('/ayushman/cbulkconsultation/uploadconsultation');uncheckbox();" ><button class="btnstyle" id="" value="" style="height: 30px;padding: 3px;">Bulk Consultations Upload</button></a>
											</td>
										</tr>-->
									</table>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  style="background-color:white; border:none;  padding:1px;">
								<h4 class="panel-title btnright">
									<a data-toggle="collapse" data-parent="#accordion" href="#myemrdiv"><button class="btnheadstyle" id="MyEmr" value="" style="height: 30px;padding: 3px;">e-Medical Records<i class="more-less glyphicon glyphicon-plus"></i></button></a>
								</h4>
							</div>
							<div id="myemrdiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table" style=" border:none;">
										<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="getemr(); window.location = '/ayushman/cpatienthistorydisplay/view?#/patientemrnewui/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);"><button class="btnlistyle" id="e-Medical" value="" style="height: 30px;">History</button></a>
											</td>
										</tr>
										<tr id="editemr" name="editemr" onmouseover="showstep(0)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="tracker(); window.location = '/ayushman/cpatienthistorydisplay/view?#/patienttracker/<?php echo Auth::instance()->get_user()->id?>'" href="javascript:void(0);"><button class="btnlistyle" id="tracker" value="" style="height: 30px;">Tracker </button></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  style="background-color:white; border:none;  padding:1px;">
								<h4 class="panel-title btnright">
									<a data-toggle="collapse" data-parent="#accordion" href="#myuploaddiv"><button class="btnheadstyle" id="MyEmr" value="" style="height: 30px;padding: 3px;">Upload<i class="more-less glyphicon glyphicon-plus"></i></button></a>
								</h4>
							</div>
							<div id="myuploaddiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table" style=" border:none;">
										<tr id="Uploadreports" name="Uploadreports" onmouseover="showstep(1)" onmouseout="hidestep()">
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="uploadreport(); getcontent('/ayushman/cuploadpastvisit/uploadpastvisit');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="UploadR" value="" style="height: 30px;padding: 3px;">Reports</button></a>
											</td>
										</tr>
										<tr>
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" href="javascript:void(0);" onclick="uploadprescr(); getcontent('/ayushman/cuploadpastvisit/uploadpastprescription');uncheckbox();" ><button class="btnlistyle" id="Uploadp" value="" style="height: 30px;padding: 3px;">Prescriptions</button></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  style="background-color:white; border:none;  padding:1px;">
								<h4 class="panel-title btnright">
									<a data-toggle="collapse" data-parent="#accordion" href="#myaccountdiv"><button class="btnheadstyle" id="MyAcc" value="" style="height: 30px;padding: 3px;">My Account  <i class="more-less glyphicon glyphicon-plus"></i></button></a>
								</h4>
							</div>
							<div id="myaccountdiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table" style=" border:none;">
										<tr id="profile" name="profile" onmouseover="showstep(2)" onmouseout="hidestep()">  
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="EditPro(); getcontent('/ayushman/cpatientprofile/displayProfile');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="EditPro" value="" style="height: 30px;padding: 3px;"> Edit Profile</button></a>
											</td>
										</tr>
										<tr id="plan" name="plan" onmouseover="showstep(3)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="ChooseP(); getcontent('/ayushman/cplanmanager/showselectedplan');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="ChooseP" value="" style="height: 30px;padding: 3px;">Choose Plan</button></a>
											</td>
										</tr>
										<tr>
											<td  style="padding:1px; border-top:none;">
												<a class="menu-links" href="javascript:void(0);" onclick="ChangePass(); getcontent('/ayushman/cchangepassword/changepassword');uncheckbox();" ><button class="btnlistyle" id="ChangePass" value="" style="height: 30px;padding: 3px;">Change Password</button></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color:white; padding:1px;"> 
								<h4 class="panel-title btnright">
									<a data-toggle="collapse" data-parent="#accordion" href="#mynetworkdiv"><button class="btnheadstyle" id="MyNet" value="" style="height: 30px;padding: 3px;">My Network  <i class="more-less glyphicon glyphicon-plus"></i></button></a>
								</h4>
							</div>
							<div id="mynetworkdiv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table" style=" border:none;">
										<tr id="docnet" name="docnet" onmouseover="showstep(8)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="Doctor(); getcontent('/ayushman/cdoctordirectory/view');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="Doctor" value="" style="height: 30px;padding: 3px;">Doctor</button></a>
											</td>
										</tr>
										<tr id="Diagnosticnet" name="Diagnosticnet" onmouseover="showstep(9)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="DigCenter(); getcontent('/ayushman/cpathologistdirectory/view');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="DigCenter" value="" style="height: 30px;padding: 3px;">Diagnostic Center</button></a>
											</td>
										</tr>                                           
										<tr id="Chemistnet" name="Chemistnet" onmouseover="showstep(10)" onmouseout="hidestep()">
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="Chemist(); getcontent('/ayushman/cchemistdirectory/view');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="Chemist" value="" style="height: 30px;padding: 3px;">Chemist </button></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" style="background-color:white; padding:1px;">
								<h4 class="panel-title btnright">
									<a data-toggle="collapse" data-parent="#accordion" href="#financediv"><button class="btnheadstyle" id="Payments" value="" style="height: 30px;padding: 3px;">Payments  <i class="more-less glyphicon glyphicon-plus"></button></i></a>
								</h4>
							</div>
							<div id="financediv" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table"style=" border:none;" >
										<tr>
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="Statments(); getcontent('/ayushman/caccountstatement/view');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="Statments" value="" style="height: 30px;padding: 3px;"> Statements</button></a>
											</td>
										</tr>
										<tr>
											<td style="padding:1px; border-top:none;">
												<a class="menu-links" onclick="Recharge(); getcontent('/ayushman/crecharge/view');uncheckbox();" href="javascript:void(0);"><button class="btnlistyle" id="Recharge" value="" style="height: 30px;padding: 3px;">Recharge Account </button></a>
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
