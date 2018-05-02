<head>

</head>
 <style>
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
<body>
<form class="form-horizontal" id="docregistartion" method="post" enctype="multipart/form-data"  action="captureFilename()">

	<div class="col-md-3">
							
		<h4 class="Textheading">Select file to Attach</h4>

		<br/>
		<!-- 2. ng-file-select | ng-file-select="options" -->
		<div class="textcolor">
			<input name="upload" class="formheader regnbutton" style="height:30px;" id="upload" type="file"/>
		<br/>
		</div>
						   
	</div>
		<hr>
			<div style="float: right;margin-right: 9px;">
				<button type= "submit" class="btn button-style btn-s" ng-disabled="!uploader.getNotUploadedItems().length"style="padding: 2px;">
					Ok &nbsp <span class="glyphicon glyphicon-arrow-right"></span> 
				</button>
			</div>
<form/>
</body>

<script type="text/javascript">
  $(document).ready(function() {

/*
$('#upload').bind('change', function() {
	$fileType = this.files[0].type;
	if(this.files[0].size > 1048576 )
	{
		showMessage('250','50','Errors','File size should be less than 1 MB.','error','errordialogboxid');
		$('#upload').attr('value','');
	}
}
*/
$('#upload').change( function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
					$("img").fadeIn("fast").attr('src',tmppath);	
				alert(tmppath);
			});



function captureFilename()
{
	$.ajax({
  url: "/ayushman/cpathologistupload/captureFilename"}
  );
  window.close();
}
</script>