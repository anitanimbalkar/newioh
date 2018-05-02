<html>
<head>
<title>Bill...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/js/listboxcomponent.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css">
<link rel="stylesheet" href="/ayushman/assets/app/css/main.css" />
<script type="text/javascript">
	$(document).ready(function() {
		var availableTags = [
		  "ActionScript",
		  "AppleScript",
		  "Asp",
		  "BASIC",
		  "C",
		  "C++",
		  "Clojure",
		  "COBOL",
		  "ColdFusion",
		  "Erlang",
		  "Fortran",
		  "Groovy",
		  "Haskell",
		  "Java",
		  "JavaScript",
		  "Lisp",
		  "Perl",
		  "PHP",
		  "Python",
		  "Ruby",
		  "Scala",
		  "Scheme"
		];
		function split( val ) {
		  return val.split( /,\s*/ );
		}
		function extractLast( term ) {
		  return split( term ).pop();
		}
		$( "#tags" )
		  // don't navigate away from the field on tab when selecting an item
		  .bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).data( "ui-autocomplete" ).menu.active ) {
			  event.preventDefault();
			}
		  })
		  .autocomplete({
			minLength: 0,
			source: function( request, response ) {
			  // delegate back to autocomplete, but extract the last term
			  response( $.ui.autocomplete.filter(
				availableTags, extractLast( request.term ) ) );
			},
			focus: function() {
			  // prevent value inserted on focus
			  return false;
			},
			select: function( event, ui ) {
			  var terms = split( this.value );
			  // remove the current input
			  terms.pop();
			  // add the selected item
			  terms.push( ui.item.value );
			  // add placeholder to get the comma-and-space at the end
			  terms.push( "" );
			  this.value = terms.join( ", " );
			  return false;
			}
		  });
		  $( "#tests" )
		  // don't navigate away from the field on tab when selecting an item
		  .bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).data( "ui-autocomplete" ).menu.active ) {
			  event.preventDefault();
			}
		  })
		  .autocomplete({
			minLength: 0,
			source: function( request, response ) {
			  // delegate back to autocomplete, but extract the last term
			  response( $.ui.autocomplete.filter(
				availableTags, extractLast( request.term ) ) );
			},
			focus: function() {
			  // prevent value inserted on focus
			  return false;
			},
			select: function( event, ui ) {
			  var terms = split( this.value );
			  // remove the current input
			  terms.pop();
			  // add the selected item
			  terms.push( ui.item.value );
			  // add placeholder to get the comma-and-space at the end
			  terms.push( "" );
			  this.value = terms.join( ", " );
			  return false;
			}
		  });
	});
	function createNewTest(){
		testDivId="test"+Math.floor(Math.random()*999999);
		var testDiv = $("<div id='"+testDivId+"' style='height:20px; padding-left:10px;'></div>");
		var categoryBox = createAutoCompleteBox("category",testDiv,"Category");
		var nameBox = createAutoCompleteBox("testname",testDiv,"Name");
		var sampleBox = createAutoCompleteBox("testsample",testDiv,"Sample");
		var pathologistBox = createAutoCompleteBox("pathologist",testDiv,"Recommended Pathologist");
		var categoryBoxQuery = "select id as id, testsubcategoryname_c as value from testsubcategorymasters where active_c = 1 and testsubcategoryname_c";
		categoryBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+categoryBoxQuery,
			select: function(event, ui) {
					var testDiv = categoryBox.parent();
					testDiv.find('[id^="idcategory"]').val(ui.item.id);
				},
		});
		$(categoryBox).attr('readonly','readonly');
		nameBox.focus(function(){
			var testDiv = nameBox.parent();
			var testtype = testDiv.find('[id^="idcategory"]').val();
			if(testtype != "" && testtype != -1){
				var nameBoxQuery = 'select DISTINCT testname_c as value from testmasters where active_c=1 and reftestsubcategoryid_c = '+testtype+' and testname_c';
			}
			else{
				var nameBoxQuery = 'select DISTINCT testname_c as value from testmasters where active_c=1 and testname_c';
			}
			nameBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+nameBoxQuery});
		});
		sampleBox.focus(function(){
			var testDiv = sampleBox.parent();
			var testname = testDiv.find('[id^="testname"]').val();
			if(testname == "Name"){
				alert("Please select test first");
				sampleBox.autocomplete({source:[""]});
			}
			else{
				var sampleBoxQuery = 'select DISTINCT sample_c as value from testmasters where active_c=1 and testname_c like "%'+testname+'%" and sample_c';
				sampleBox.autocomplete({source:"/ayushman/cautocompletedata/retrieveEncoded?query="+encodeURIComponent(sampleBoxQuery)});
			}
		});
		pathologistBoxQuery = 'select pathologists.id as id,nameofcenter_c as value from pathologists left join users on users.id= pathologists.refpathologistsuserid_c where users.activationstatus_c= "active" and nameofcenter_c'
		pathologistBox.autocomplete({source: "/ayushman/cautocompletedata/retrieve?query="+pathologistBoxQuery,
			select: function(event, ui) {
					var testDiv = categoryBox.parent();
					testDiv.find('[id^="idpathologist"]').val(ui.item.id);
				},
		});
		testDiv.appendTo($('#testcontent'));
		categoryBox.width("15%");
		nameBox.width("25%");
		sampleBox.width("15%");
		pathologistBox.width("25%");
		$("<img src='/ayushman/assets/images/question-icon.png' style='float:right;padding-top:4px;cursor:pointer;height:15px;' title='More Info' onclick='getTestInfo(this);'/>").appendTo(testDiv);
		var str = "createNewTest();changeIcon(this);";
		$("<img src='/ayushman/assets/images/emr+.png' style='float:right;padding-top:4px;cursor:pointer;padding-right:5px;' title='Add More Test' onclick='"+str+"'/>").appendTo(testDiv);
	}
	function createAutoCompleteBox(id, targetDiv, watermark){
		randomNumber = Math.floor(Math.random()*999999);
		autoCompleteBoxId = id+randomNumber;
		autoCompleteBox = $("<input type='text' id='"+autoCompleteBoxId+"' onclick='populateautocomplete(this);' style='border: none;font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; border-bottom: 1px solid #909090;margin-left:5px;float:left;'/>").appendTo(targetDiv);
		autoCompleteBox.autocomplete({
			minLength: 0,
			disabled: false,
		});
		addWaterMark(autoCompleteBox,watermark);
		idBoxId = "id" + id + randomNumber;
		$("<input type='hidden' id='"+idBoxId+"' name='hfvalue' value='-1'/>").appendTo(targetDiv);
		return autoCompleteBox;
	}
</script>
<style type="text/css">
        .notes
        {
            background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-size: 100% 100%, 100% 100%, 100% 31px;
            line-height: 31px;
            padding: 8px;
			border:none;
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
			font-size:9pt
        }
        .notes:focus
        {
            outline: none;
        }
</style>
</head>
<body >
<table style="width:100%;">
	<tr >
		<td style="background-color:white;max-width:132px;height:80%;border:1px solid rgb(236, 227, 227);box-shadow: 10px 10px 5px #888888;padding:3px;">
			<div style="width:100%;height:auto;">
 				<div style="float:left;width:100%;margin-left:3px;">
					<font color="1e90ff"><label id='lbldoctorname' style="font:bold;font-size:10pt;font-family:arial;font-weight:bold;width:100%;">Dr. Bharati Mathapati</label><label id='lblqualification' style="font:bold;font-size:10pt;font-family:arial;"></label></font> <font color="1e90ff">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="font:bold;font-size:9pt;font-family:arial;font-weight:bold;">Ph.</label></font><label id='lblcontactnumber'  style="font:bold;font-size:8pt;font-family:arial;">+91-8806678481</label></br>
						<label style="margin-left:50px;font:bold;font-size:6pt;font-family:arial;">M.B.B.S, MD</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><label id='lblcontactnumber'  style="font:bold;font-size:8pt;font-family:arial;">10:00 AM To 12:00 PM</label></br>
					<label style="font:bold;font-size:8pt;font-family:arial;">Regd Number:</label>
					<label id="lblregdnumber" style="font:bold;font-size:8pt;font-family:arial;">125324-900</label>
					</br><label id='lbladdress' style="font:bold;font-size:8pt;font-family:arial;">Baner Pashan Link Road, Pashan, Pune</label></br>
				
				</div>
				<hr/>
				<table style="height:auto;width:100%;padding-top:5px;padding-bottom:20px;">  
					<tr>
						<td style="width:50%;">
							<label style="font:bold;font-size:9pt;margin-left:1%;font-family:arial;font-weight:bold;"></label>
					<label id='lblpatientname' style=" border-bottom-width:1px;font-size:8pt;font-family:arial;">Ananda Naphade</label>
						</td>
						
						<td style="height:auto;vertical-align:top;width:39%;align:right;" align="right">
							<label id='lbldate' style="font:bold;font-size:10pt;font-family:arial;"><label style="font:bold;font-size:8pt;margin-left:1%;font-family:arial;">height : ______ weight : ______ </label></label>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<label style="font:bold;font-size:10pt;margin-left:1%;font-family:arial;font-weight:bold;"></label>
					<label id='lblpatientname' style=" border-bottom-width:1px;font-size:8pt;font-family:arial;">09 May 2014</label>
						</td>
						<td style="height:auto;vertical-align:top;width:39%;align:right;" align="right">
							<label id='lbldate' style="font:bold;font-size:10pt;font-family:arial;"><label style="font:bold;font-size:8pt;margin-left:1%;font-family:arial;">BP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ______ Pulse &nbsp;&nbsp;&nbsp;: ______ </label></label>
						</td>
					</tr>
				</table>
			</div>
			<div id="quickprescription"  >
				<form class="cmxform" id="prescriptionform" method="post" enctype="multipart/form-data"  action="saveprescription">
					<div style="100%">
						<div style="float:right;width:100%;" id ="testcontent"> <textarea style="width:100%;height:200px; resize: none;" id="tests" placeholder="Medicines" name="tests" onclick="if (this.value == 'Medicines :') this.value = '';" class="notes">Medicines :</textarea></div>
					</div>
					<div style="100%">
						<div style="float:right;width:100%;" id ="testcontent"> <textarea style="width:100%;height:100px; resize: none;" id="tests" placeholder="Follow Up" name="tests" onclick="if (this.value == 'Follow Up :') this.value = '';" class="notes">Follow Up :</textarea></div>
					</div>
					<div style="100%">
						<div style="float:right;width:100%;align:top;" id ="testcontent"><select style="width:20%;" ><option>Add</option><option>Symptoms</option><option>Diagnosis</option><option>Investigations</option></select><input style="width:80%;height:54px; resize: none;" id="tests" name="tests" class="notes"></input> </div>
					</div>
					<div style="100%">
						<div style="float:right;width:100%;" id ="testcontent"> &nbsp;</div>
					</div>
					
					
				</form>
			</div>

		</td>
		<td style="max-width:50px;vertical-align:top;padding-left:5px;">
			<div style="height:100px;width:100%;">
				<table class="bodytext_bold" style="padding:3px;width:100%">
					<tr>
						<td>
							<span><i style="font-size:23px;" title="Click here to load Prescription from template." class="fa fa-folder-open-o"></i></span><br/>
						</td>
					</tr>
					<tr>
						<td>
							<span><i title="Click here to save current prescription as template." style="font-size:23px;" class="fa fa-save"></i></span>
						</td>
					</tr>
				</table>
				<hr style="width:100%;"/>
				<table style="padding:0px;width:100%">
					<tr>
						<td >
							<input type="checkbox" title="Select to send prescription via SMS." checked><i style="font-size:23px;" title="Click to change mobile number" class="fa fa-mobile-phone"></i></input><br/>
							<input type="checkbox" title="Select to print the prescription" checked><i style="font-size:15px;"  class="fa fa-print"></i></input><br/><br/>
							<span><i title="Click to end the consultation." style="font-size:23px;float:right;" class="fa fa-power-off"></i></span>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</body>
</html>

