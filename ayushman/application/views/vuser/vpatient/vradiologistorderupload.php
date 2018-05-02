<head>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
	<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
	<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" >
	<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
	<script src="/ayushman/assets/app/lib/angular/angular.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-animate.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-cookies.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-resource.js"></script>
	<script src="/ayushman/assets/app/lib/angular/angular-route.js"></script>
	<script src="/ayushman/assets/app/lib/angular-bootstrap/ui-bootstrap-tpls-0.9.0.js"></script>
	<script src="/ayushman/assets/app/js/app.js"></script>
	<script src="/ayushman/assets/app/js/directives.js"></script>
	<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
	<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
	<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>
	<script src="/ayushman/assets/js/formmodulevalidation.js"></script>
	<script src="/ayushman/assets/app/lib/angular-ui-ng-grid/ng-grid-2.0.7.debug.js"></script>
	<script src="/ayushman/assets/app/lib/newformmodule.js"></script>
	<script src="/ayushman/assets/app/lib/bootstrap.min.js"></script> 
	<script src="/ayushman/assets/app/lib/plugins.js"></script> 
	<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
	<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script src="/ayushman/assets/app/js/createDialog.js"></script>
	<script src="/ayushman/assets/app/js/controllers/uploadorderreports.js"></script>
</head>
<style>
	/* BASIC STYLINGS
============================================================================= */



/* numbered buttons */
#status-buttons                 {  }
#status-buttons a               { color:#FFF; display:inline-block; font-size:12px; margin-right:10px; text-align:center; text-transform:uppercase; }
#status-buttons a:hover         { text-decoration:none; }
#status-buttons span            { background:#080808; display:block; height:30px; margin:0 auto 10px; padding-top:5px; width:30px; 
    border-radius:50%; }

/* active buttons */
#status-buttons a.active span   { background:#00BC8C; }
.textcolor
{
color: #5cb1b6; !important
}
.formbodytext_normal
{
	font-size: 0.9em ! important;
}

.button-style{
								width:100px;
								height:35px;
								font-size:20px;
								border-radius: 5px;
								background: #00aca9;
								color: #fff;
								text-align: center;
								text-decoration: none;

								}
				
.headingButton, .headingButton:hover, .headingButton:focus
{
	padding:9px 15px 9px;
    position: absolute;
    right: -1px;
    top: 1px;
    /*z-index: 3;*/
    background: #227474;
    color: #fff;
    text-decoration: none;
}
 .headingButton:hover, .headingButton:focus{
 	background: #f16060;
 }			
</style>
<body>
<form enctype="multipart/form-data" action="/ayushman/cradiologistdashboard/saveuploadedreport" method ="POST">


<input id="testid" name="testid" type="hidden" class="formtextarea" ng-model="testid"/>
<input type="hidden" id="orderid" name="orderid" value="<?php echo $orderid; ?>"/>

	<div id="ng-app" ng-app="app" style="position:relative;max-width:900px; width:100%;margin:0px auto 0px auto;" ng-controller="uploadorderreports">
		<h5 style=" background: #5cb1b6 !important;border-radius: 0;color:#fff; padding: 10px 5px 10px 15px;margin-top: 0;"><span>Upload Reports for the Order Number :<?php echo $orderid; ?></span></h5>
		
		<table width="100%">
		<tr>
		<td width="10%" >IOH ID :</td><td align="left" width="10%"> <?php echo $IOHid; ?></td>
		
		<td  width="10%">	Order Number :</td><td align="left" width="10%"> <?php echo $orderid; ?></td>
		</tr>
		
		<tr>
		<td  width="10%">Name Of The Patient :</td> <td align="left"  width="10%"><?php echo $name; ?></td>
		
		
		<td  width="10%">Sample collection place : </td> <td align="left"  width="10%"><input type="Text" id="samplePlace" name= "samplePlace" style="width:60%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="samplePlace" /></td>
		
		
		</tr>
		
		<tr>
		<td  width="10%">Mobile No. :</td><td align="left"  width="10%"> <?php echo $mobilenumber; ?></td>
		
		<td  width="10%">Sample collection date : </td><td align="left"  width="10%"><input type="text" id="sampleDate" name= "sampleDate"  style="width:60%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="sampleDate"  jqdatepicker required /></td>
		</tr>
		
		<tr>
		
		<td  width="10%">Age/Gender : </td><td align="left"  width="10%"><?php echo (date('Y')-date('Y', strtotime($dob)));?>/<?php echo $gender; ?></td>
		
		<td  width="10%">Sample Id : </td><td align="left"  width="10%"> <input type="Text" id="sampleId" name="sampleId"  style="width:60%;margin-left:2px;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model="sampleId" value=<?php echo $sampleid; ?> /> </td>
		
		</tr>
		
		<tr>
		<td  width="10%">Reference Id : </td><td align="left"  width="10%"><Input type="text" id="referenceId" name="referenceId" style="width:60%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" ng-model = "referenceid" value="<?php echo $referenceid; ?>" ></td>
		
		<td  width="10%"><label for="Datetxt1" style="float:left;">Order Date* :</label>
	 </td><td align="left"  width="10%">	<input id="Datetxt1" name="Datetxt" type="text" class="regnformcontrol ng-pristine ng-valid"  style="float:left;width:60%;margin-bottom: 6px;"   ng-model="tag.Date"  jqdatepicker required /></td>
		</tr><tr>
		<td  width="10%">Referred By  :</td><td align="left"  width="10%"> <input type="text" id="referenceBy" name="referenceBy"  value="" style="width:60%;margin-bottom: 6px;margin-left:4px;" class="regnformcontrol ng-pristine ng-valid" ng-model="referenceBy" /></td></tr>
	
		
		</table>	
		<br/>
		
	
		<div  ng-include src="'/ayushman/assets/app/partials/UploadReports/radiocenterview.html'"></div>
		</br>
		
		
	</div>
	

</form>
<div class="container"style="padding :10px;">
							Prepared By : <Input type="text" id= "preparedby" name= "preparedby"  class="regnformcontrol" style="width:20%;" ng-model="preparedby">		
						</div>
		<div class="container"style="padding :10px;">	
		<div style="float: left;margin-left: 9px;">
			<button class="btn button-style btn-s" style="padding: 2px;font-size:14px;" onclick="window.history.back();deletereport();">
				<span class="glyphicon glyphicon-arrow-left"></span>&nbsp Back 
			</button>	
			</div>	
			<div style="float: right;">
			<button class="btn button-style btn-s"style="padding: 2px;font-size:14px;" onclick="save();">
				&nbsp save
			</button>	
	</div>
	</div>
	
</body>
<script>
function save()
{
	var orderid=document.getElementById("orderid").value;
	var referenceId=document.getElementById("referenceId").value;
	var referenceBy=document.getElementById("referenceBy").value;
	var samplePlace=document.getElementById("samplePlace").value;
	var sampleDate=document.getElementById("sampleDate").value;
	var sampleId=document.getElementById("sampleId").value;
	var preparedby=document.getElementById("preparedby").value;
	
	$.ajax({
				
				url: "/ayushman/Cradiologistdashboard/saveuploadedreport/get?orderid="+orderid+"&referenceId="+referenceId+"&referenceBy="+referenceBy+"&samplePlace="+samplePlace+"&sampleDate="+sampleDate+"&sampleId="+sampleId+"&preparedby="+preparedby,
				success: function( data ) {
					alert("Successfully executed")
						
					},
					error : function(){}
			  });
			parent.location.reload();
}

function deletereport()
{
	
	var orderid=document.getElementById("orderid").value;
	$.ajax({
				
				url: "/ayushman/Cradiologistdashboard/deleterecord/get?orderid="+orderid,
				success: function( data ) {
					alert("Successfully deleted");
						
					},
					error : function(){}
			  });
}
</script>