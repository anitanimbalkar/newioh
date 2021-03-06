<html lang="en">
  <head>
		<title>Fancy profile image upload and crop</title>

	   <meta charset="utf-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">


		<meta name="description" content="">
		<meta name="author" content="">	
		<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>

		<link href="/ayushman/assets/app/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="/ayushman/assets/app/css/canvasCrop.css" rel="stylesheet" type="text/css"/>
		
		<link href="/ayushman/assets/app/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="/ayushman/assets/app/css/style1.css" rel="stylesheet" type="text/css"/>
		<link href="/ayushman/assets/app/css/canvasCrop.css" rel="stylesheet" type="text/css"/>
		<link href="/ayushman/assets/app/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ayushman/assets/app/css/custom.css" rel="stylesheet">


		<script src="/ayushman/assets/js/imageuploader/jquery-pack.js" type="text/javascript"></script>
		<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script src="/ayushman/assets/app/lib/bootstrap.min.js" type="text/javascript"></script>
		<!-- required plugin for ajax file upload -->
		<script src="/ayushman/assets/js/imageuploader/fileuploader.js" type="text/javascript"></script>
		<script src="/ayushman/assets/js/imageuploader/scriptuploadimagebystaff.js" type="text/javascript"></script>
		<script src="/ayushman/assets/js/imageuploader/jquery.canvasCrop.js" type="text/javascript"></script>	
		<script src="/ayushman/assets/js/imageuploader/jquery-1.11.3.min.js"></script>
		
	</head>

  <body width="600px;">
  
  <script src="/ayushman/assets/js/imageuploader/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="/ayushman/assets/js/imageuploader/jquery.canvasCrop.js" ></script>
	<div class="container">
		<div class="imageBox" >
			<div class="mask"></div>
				<div class="thumbBox"></div>
					<div class="spinner" style="display: none">Loading...</div>
		</div>
		 
		  
						<!--
						<button id="rotateLeft" class="btn btn-success" >rotateLeft</button>
						<button id="alertInfo"  class="btn btn-success">alert</button>
						<button id="rotateRight" class="btn btn-success">rotateRight</button>
						-->
						<div class="form-group" >
							<button id="zoomIn"  class="btn btn-primary button">zoomOut</button>&nbsp;

							<button id="zoomOut"  class="btn btn-primary button">zoomIn</button>&nbsp;

							<span id="save_thumb">
								<button id="upload"  class="btn btn-primary button">Save Image</button><br><br>
							</span>

							<div class="col-sm-12" >
								<div class="btn btn-primary button" id="file-uploader"><span class="glyphicon glyphicon-plus"></span>&nbsp;
									Select Profile Image
									<input type="file" id="upload-file" multiple onChange="processSelectedFiles(this)"/>
								</div>
								<div class="bodytext_bold">
									Maximum file size allowed is 2MB.</br>
									File types allowed are jpg, jpeg, png and gif.
								</div>
							</div>
						</div>

		<img src="" id="thumbnail"  />
		<div id="passer">
			<input type="hidden" name="filename" value="" id="filename" />
			<input type="hidden" name="Image" value="" id="Image" />
			<input type="hidden" name="flag" value="uploadprofileimage" id="flag" />
		</div>

		

	</div>


<script type="text/javascript">
	function processSelectedFiles(fileInput) {
	  var files = fileInput.files;

	  for (var i = 0; i < files.length; i++) {
		//alert("Filename " + files[i].name);
		var a=document.getElementById("filename");
		
		a.value=files[i].name;
		
	  }
	}
		$(function(){
			var rot = 0,ratio = 1;
			var CanvasCrop = $.CanvasCrop({
				cropBox : ".imageBox",
				imgSrc : "images/",
				limitOver : 2
			});
			
			
			$('#upload-file').on('change', function(){
				var reader = new FileReader();
				reader.onload = function(e) {
					CanvasCrop = $.CanvasCrop({
						cropBox : ".imageBox",
						imgSrc : e.target.result,
						limitOver : 2
					});
					rot =0 ;
					ratio = 1;
				}
				reader.readAsDataURL(this.files[0]);
				this.files = [];
			});
			
			$("#rotateLeft").on("click",function(){
				rot -= 90;
				rot = rot<0?270:rot;
				CanvasCrop.rotate(rot);
			});
			$("#rotateRight").on("click",function(){
				rot += 90;
				rot = rot>360?90:rot;
				CanvasCrop.rotate(rot);
			});
			$("#zoomIn").on("click",function(){
				ratio =ratio*0.9;
				CanvasCrop.scale(ratio);
			});
			$("#zoomOut").on("click",function(){
				ratio =ratio*1.1;
				CanvasCrop.scale(ratio);
			});
			$("#alertInfo").on("click",function(){
				var canvas = document.getElementById("visbleCanvas");
				var context = canvas.getContext("2d");
				context.clearRect(0,0,canvas.width,canvas.height);
			});
			
			
			$("#upload").on("click",function(){
				
				var src = CanvasCrop.getDataURL("jpeg");
				//src = src.replace('data:image/png;base64,','');
				//$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
			   //$(".container").append("<img src='"+src+"' />");
			   //src = src.replace('data:image/png;base64,','');
				var image=document.getElementById("Image");
				image.value=src;
				
			});
			
	  
	})
</script>
</body>
</html>