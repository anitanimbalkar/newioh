<head>
      
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
					<script src="/ayushman/assets/app/lib/angular/angular(.min).js"></script>
					<script src="/ayushman/assets/app/lib/angular/angular-file-upload-shim(.min).js"></script> <!-- for no html5 browsers support -->
					<script src="/ayushman/assets/app/lib/angular/angular-file-upload(.min).js"></script>
			<script src="/ayushman/assets/app/js/directives.js"></script>

			<script src="/ayushman/assets/app/js/services/consultationapi.js"></script>
			<script src="/ayushman/assets/app/js/services/appointmentservice.js"></script>
			<script src="/ayushman/assets/app/js/services/examinationservice.js"></script>
			
			<script src="/ayushman/assets/app/js/services/emrservice.js"></script>
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
			<script src="/ayushman/assets/app/js/services/$fileUploader.js"></script> 
			<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
			<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

			<script src="/ayushman/assets/app/js/createDialog.js"></script>
			<script src="/ayushman/assets/app/js/controllers/uploadradioctrl.js"></script>
			
			
    </head>
	<style>
				
	.ui-autocomplete 
{  margin-top: 0px !important;
					 top: 60px !important;
}
.ui-datepicker {
  width: 30% ! important;
}
.container{
	float:left;
	width:100%;
	padding-left: 10px;
	padding-top: 10px;
	border:1px solid;
	padding-bottom: 10px;
}
.parameternames{
	float:left;
	width:59%;
	text-align:left;
	margin-left:1% ! important;
}
.parametervalues{
	float:left;
	width:40%;
	text-align:left;
}
.regnformcontrol{
	width:100%;
}
.formelements{
margin-left:1% ! important;
}

   .my-drop-zone { border: dotted 3px lightgray; }
	            .ng-file-over { border: dotted 3px red; } /* Default class applied to drop zones on over */
	            .another-file-over-class { border: dotted 3px green; }

	            html, body { height: auto; }
							.Textheading	{
								font-family: tahoma, Helvetica, sans-serif;
								font-weight: normal;
								
								font-weight: bold;
								color: #5cb1b6 ;
								}
</style>

<body bgcolor="white">



<input type="hidden" id="orderid" name="orderid" value="<?php echo $orderid; ?>"/>
<input id="testid" name="testid" type="hidden" class="formtextarea" value="<?php echo $testid; ?>"/>
	
	<div id="ng-app" style="height:400px;" ng-app="app" ng-controller="uploadradioctrl">
	<div class="container"  style="border:0;" >
		<div class="col-md-3" ng-if="test.parameters.length > 0">
			<h4 >Summary</h4>                                                                
				<div class="textcolor">
					<input id="reportSummary" name="reportSummary" style="width:100%;margin-bottom: 6px;" class="regnformcontrol ng-pristine ng-valid" type="text" ng-model="test.reportSummary" />
				</div>								
		</div>
	</div>
	<div class="col-md-3">
		<div class="textcolor">
		</br>
		<h5>	Attach Multiple Files </h5>
		</br>
		</br>
			<input  ng-file-select type="file"  multiple />
		</div>
						   
	</div>
	<div>
		<table class="table textcolor" style="margin-left: 16px;width: 96%;">
				<thead>
					<tr ng-if="uploader.getNotUploadedItems().length">
						<th width="30%">Name</th>
						<th >Size</th>
						<th ng-show="uploader.isHTML5" >Progress</th>
						<th ng-show="uploader.isHTML5">Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="item in uploader.queue">
						<td><strong>{{ item.file.name }}</strong></td>
						<td  ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
						<td ng-show="uploader.isHTML5">
											<div class="progress" style="margin-bottom: 0;">
												<div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
											</div>
										</td>
										<td class="text-center">
											<span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
											<span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
											<span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
										</td>
						<td nowrap>
								<button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
								<span class="glyphicon glyphicon-trash"></span> Remove
							</button>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
		<hr>
		<div class="col-md-3">
		<div class="textcolor">
			<button class="btn button-style btn-s" ng-click="uploadall();" ng-disabled="!uploader.getNotUploadedItems().length" style="padding: 2px;">
			Upload&nbsp <span class="glyphicon glyphicon-upload"></span> 
			</button>
		</div>
						   
	</div>
			</div>	
			
									
</body>
<script type="text/javascript">
     function closeWindow(){
        window.open(window.location, '_self').close();
		
     }
</script>