<head>
	<script src="/ayushman/assets/app/js/extra/exam.js"></script>
	<script src="/ayushman/assets/app/js/extra/prescription.js"></script>
	<link rel="stylesheet" type="text/css" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">

	<script type="text/javascript">
	
		$(document).ready(function() {
	
			
		});
		function PrintElem(elem,appointmentid)
		{	
			var scope = angular.element($("#quickprescription")).scope();		

			//savePDf(appointmentid);
			setPrint();
			console.log($('#prescriptionsPrint').html());
			setTimeout(function(){			
				Popup($('#prescriptionsPrint').html());
			},1000);

			
		}
		function Popup(data) 
		{
			var mywindow = window.open('', 'print','height=600,width=800');
			mywindow.document.write('<html><head><title> Prescription </title>');
			//mywindow.document.write('</head><body style="font-size:14px;">');
			mywindow.document.write('</head><body>');
			mywindow.document.write(data);
			mywindow.document.write('</body></html>');
			
			mywindow.print();
			mywindow.close();
			return true;
		}
			
				
	</script>
	
</head>
<body>
<div id="contentDivdiv">
	<table>
	
	</table>
</div>
				
				<input type="hidden" id="checkboxRisk" value="{{checkstatusRisk}}"/>
				<input type="hidden" id="checkboxAllergies" value="{{checkstatusAllergies}}"/>
				<input type="hidden" id="checkboxSymptom" value="{{checkstatusSymtom}}"/>
				<input type="hidden" id="checkboxTest" value="{{checkstatusTest}}"/>
				<input type="hidden" id="checkboxExamination" value="{{checkstatusExamination}}"/>
				<input type="hidden" id="checkboxDiagnosis" value="{{checkstatusDiagnosis}}"/>
				
</body>
