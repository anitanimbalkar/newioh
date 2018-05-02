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
	
    <link href="/ayushman/assets/app/css/style4.css" rel="stylesheet" type="text/css"/>
    <link href="/ayushman/assets/app/css/style1.css" rel="stylesheet" type="text/css"/>
    <link href="/ayushman/assets/app/css/canvasCrop.css" rel="stylesheet" type="text/css"/>
	<link href="/ayushman/assets/app/css/bootstrap.min.css" rel="stylesheet">
	<link href="/ayushman/assets/app/css/custom.css" rel="stylesheet">
	<script src="/ayushman/assets/js/imageuploader/jquery-pack.js" type="text/javascript"></script>
	<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
	<script src="/ayushman/assets/app/lib/bootstrap.min.js" type="text/javascript"></script>
	<!-- required plugin for ajax file upload -->
	<script src="/ayushman/assets/js/imageuploader/fileuploader.js" type="text/javascript"></script>
    <script src="/ayushman/assets/js/imageuploader/scriptUploadDoctorFooter.js" type="text/javascript"></script>    
	<script src="/ayushman/assets/js/imageuploader/jquery.canvasCrop.js" type="text/javascript"></script>
    <script src="/ayushman/assets/js/imageuploader/jquery-1.11.3.min.js"></script>
	</head>

  <body width="600px;">
	<script src="/ayushman/assets/js/imageuploader/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="/ayushman/assets/js/imageuploader/jquery.canvasCrop.js" ></script>
	<div class="container">
	<div class="imageBox"  style="height:200;width:950" >
		<div class="mask"></div>
		<div id="IDthumbBox" class="thumbBox" style="height:50px;width:650px;left:120px;top:100px"></div>
		<div class="spinner" style="display: none">Loading...</div>
	</div>
	<div class="form-group" >
		<div class="bodytext_bold">
			Aspect Ratio	:
			Height - pixels Range(50 - 100) 
			<input type="number" id="aspectHeight" name="aspectHeigth" onchange="setaspectRatio()" max ="100" min="50" value="50">
			Width  - pixels Range(650 - 850) 
			<input type="number" id="aspectWidth" name="aspectWidth" onchange="setaspectRatio()" max="850" min="650"   value="650">
		</div>
		</br>
		<button id="zoomIn"  class="btn btn-primary button">zoomOut</button>&nbsp;
	
		<button id="zoomOut"  class="btn btn-primary button">zoomIn</button>&nbsp;
	
		<span id="save_thumb">
		<button id="upload"  class="btn btn-primary button"><div class="upload">Save Image</div></button><br><br>
		</span>
		
		<div class="col-sm-12" >
			<div class="btn btn-primary button" id="file-uploader">
				<span class="glyphicon glyphicon-plus"></span>&nbsp;
					   Select Footer Image
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
		<input type="hidden" name="flag" value="UploadDoctorFooterImage" id="flag" />					
	</div>
  </div>
	
	
<script type="text/javascript">
	function processSelectedFiles(fileInput) 
	{
	  var files = fileInput.files;

	  for (var i = 0; i < files.length; i++) {
		//alert("Filename " + files[i].name);
		var a=document.getElementById("filename");
		a.value=files[i].name;
	  }
	}
    $(function()
	{
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
			var image=document.getElementById("Image");
			image.value=src;			
        });
	})
	function setaspectRatio()
	{
		aspHt=document.getElementById("aspectHeight").value;
		aspWd=document.getElementById("aspectWidth").value;	

		/* Fix height width within range of values */
			if (aspHt < 50)
				aspHt = 50;
			if (aspHt > 100)
				aspHt = 100;
			if (aspWd <650)
				aspWd = 650;
			if(aspWd > 850)
				aspWd = 850;
		document.getElementById("IDthumbBox").style.height=aspHt;
		document.getElementById("IDthumbBox").style.width=aspWd;		
	}	
</script>
</body>
</html>