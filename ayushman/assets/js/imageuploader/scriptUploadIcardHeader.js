/*$(document).ready(createUploader);
		function addImgAreaSelect( img ){
			img.addClass( 'imgAreaSelect' ).imgAreaSelect({
					handles : true,
					aspectRatio : '1',
					fadeSpeed : 0,
					show : true,
					outerOpacity : 0.5,
					onSelectChange: preview
			});
			img.load(function(){ // display initial image selection 16:9
						var height = this.width/4 ;
						if( height <= this.height ){     
								var diff = ( this.height - height ) / 2;
								var coords = { x1 : 0, y1 : diff, x2 : this.width, y2 : height + diff, width:this.width,height:this.width };
								preview(this,coords)
								$('#x1').val(0);
								$('#y1').val(diff);
								$('#x2').val(this.width);
								$('#y2').val(height + diff);
								$('#w').val(this.width);
								$('#h').val(this.width);
						}   
						else{ // if new height out of bounds, scale width instead
								var width = this.height/2; 
								var diff = ( this.width - width ) / 2;
								var coords = { x1 : diff, y1 : 0, x2 : width + diff, y2: this.height, width:this.width,height:this.height };
								
								preview(this,coords)
								
								$('#x1').val(diff);
								$('#y1').val(0);
								$('#x2').val(width+diff);
								$('#y2').val(this.height);
								$('#w').val(this.height);
								$('#h').val(this.height);
						}   
					$( this ).imgAreaSelect( coords );
					
			});
	}*/
	
	$(document).ready(function(){
		
		//console.log("I am in Scriptheader");
		var thumb = $(".thumbnails");
		//$('#thumbnail').mouseover(function(){
			//$('.instructions').hide();
		//});
		//$('#thumbnail').imgAreaSelect({ aspectRatio: '1', onSelectChange: preview});
		
		$('#save_thumb').click(function() {
			//var x1 = $('#x1').val();
			//var y1 = $('#y1').val();
			//var x2 = $('#x2').val();
			//var y2 = $('#y2').val();
			//var w = $('#w').val();
			//var h = $('#h').val();
			var flag='UploadIcardHeaderImage';
			//if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			//alert("You must make a selection first");
			//	return false;
			//}
			//else{
				$.ajax({
					type : 'POST',
					async:false,
					url: "crop",
					data: "filename="+$('#filename').val()+"&flag="+flag+"&Image="+$('#Image').val(),
					success: function(data){
						//thumb.attr('src', '/ayushman/files/temp/thumb_'+$('#filename').val());
						//thumb.addClass('thumbnail');
						//$('#thumbnail').imgAreaSelect({ hide: true, x1: 0, y1: 0, x2: 0, y2: 0 });
						// let's clear the modal
						//$('#thumbnail').attr('src', '');
						//$('#crop-section').hide();
						$('#uploader-section').show();
						//$('#thumb_preview').attr('src', '');
						$('#filename').attr('value', '');
					}
				});
				
				parent.$.fancybox.close();	
				return true;
			//}
			
		});
	});
	
    function createUploader(){ 
	
    	var button = $('#upload');           
        var uploader = new qq.FileUploaderBasic({
            button: document.getElementById('file-uploader'),
            action: 'upload',
            allowedExtensions: ['jpg', 'gif', 'png', 'jpeg'],
            onComplete: function(id, fileName, responseJSON){
            	button.text('Select profile picture');
				window.clearInterval(interval);
				
            	if(responseJSON['success'])
            	{
            		load_original(responseJSON['filename']);
					}},
                debug: true
            });     
			$('#file-uploader').submit();
    }
        
    function load_original(filename){
    	$('#thumbnail').attr('src', "/ayushman/files/temp/"+filename);
		addImgAreaSelect($('#thumbnail'));
		$('#thumb_preview').attr('src', "/ayushman/files/temp/"+filename);
		$('#filename').attr('value', filename);
		if ( $.browser.msie ) {
			$('#thumb_preview_holder').remove();
		}
		//$('#crop-section').show();
	//	$('#uploader-section').hide();
	}

	function preview(img, selection) { 
		var mythumb = $('#thumbnail');
		var scaleX = 210/selection.width; 
		var scaleY = 25/selection.height; 
		
		$('#thumbnail + div > img').css({ 
			width: Math.round(scaleX * mythumb.outerWidth() ) + 'px', 
			height: Math.round(scaleY * mythumb.outerHeight()) + 'px',
			marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
			marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
		});
		$('#x1').val(selection.x1);
		$('#y1').val(selection.y1);
		$('#x2').val(selection.x2);
		$('#y2').val(selection.y2);
		$('#w').val(selection.width);
		$('#h').val(selection.height);
	}