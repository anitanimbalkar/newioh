<html lang="en">
  <head>
		<title>Fancy profile image upload and crop</title>

	   <meta charset="utf-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">


		<meta name="description" content="">
		<meta name="author" content="">	
		<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="/ayushman/assets/app/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ayushman/assets/app/css/custom.css" rel="stylesheet">


		<script src="/ayushman/assets/js/imageuploader/jquery-pack.js" type="text/javascript"></script>
		<script src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script src="/ayushman/assets/app/lib/bootstrap.min.js" type="text/javascript"></script>
		<!-- required plugin for ajax file upload -->
		<script src="/ayushman/assets/js/imageuploader/fileuploader.js" type="text/javascript"></script>
		<script src="/ayushman/assets/js/imageuploader/scriptuploadimagebystaff.js" type="text/javascript"></script>
		<script type="text/javascript">
			//Put event listeners into place
			window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};
				document.getElementById("snap").addEventListener("click", function() {
					context.drawImage(video, 0, 0, 240, 240);
					var src = canvas.toDataURL();
					var image=document.getElementById("Image");
					image.value=src;
				});

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			}
			else if(navigator.mozGetUserMedia) { // Firefox-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}
			else{
				alert("No Camera Found or SSL Certificate is not secured!");
			}
		}, false);

			
		</script>
		<script type="text/javascript">
		</script>
</head>

<body>

<video id="video" width="240" height="240" autoplay></video><br>
<div>
<button id="snap" style="margin-top: 30px;" class="btn btn-primary button">Snap Photo</button>
<button id="save_thumb"  class="btn btn-primary button">Set Profile Image</button>
</div>
<input type="hidden" name="Image" value="" id="Image" />
<input type="hidden" name="filename" value="cameraphoto.jpeg" id="filename" />
<input type="hidden" name="flag" value="uploadprofileimage" id="flag" />
<canvas id="canvas" width="240" height="240"></canvas>

</body>
</html>
