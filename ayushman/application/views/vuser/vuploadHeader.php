<script src="/ayushman/assets/js/jquery.tools.min.js"></script>
<style type="text/css">
.error {
    color: red;
    font-style: italic;
	font-family:Verdana,Arial,Helvetica,sans-serif;
	font-size:9pt;
}
</style>
<!-- BOOTSTRAP CSS -->
<link href="/ayushman/assets/css/bootstrap.css" rel="stylesheet">

<link href="/ayushman/assets/css/style2.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/docstyle.css" rel="stylesheet" type="text/css">
<script src="/ayushman/assets/app/js/controllers/uploadorderreports.js"></script>
<script type="text/javascript"> 
function openHeaderUploder(){
	openDialog("/ayushman/cimagedisplay/uploadHeader?userid="+<?php echo $id; ?>,800,800,this);
}
function openSignatureUploder(){
	openDialog("/ayushman/cimagedisplay/uploadsignatureimage?userid="+<?php echo $id; ?>,800,800,this);
}
function openFooterUploder(){
	openDialog("/ayushman/cimagedisplay/uploadFooter?userid="+<?php echo $id; ?>,800,800,this);
}
$(document).ready(function() {
	$("#changepwform").validator({ position: 'center right' });
	if($.trim($('#messagelistdiv').html()) != "")
		showNotification('250','50','Errors',$.trim($('#messagelistdiv').html()),'notification','messagedialogboxid',5000);

});
$.tools.validator.fn("[minlength]", function(input, value) {
	var min = input.attr("minlength");
	
	return value.length >= min ? true : {     
		en: "Password should be at least " +min+ " character" + (min > 1 ? "s" : ""),
		fi: "Kentän minimipituus on " +min+ " merkkiä" 
	};
	
});
$.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
	var name = input.attr("data-equals"),
		 field = this.getInputs().filter("[name=" + name + "]"); 
	return input.val() == field.val() ? true : [name]; 
});
$.tools.validator.fn("[data-notequals]", "Value should not equal with the $1 field", function(input) {
	var name = input.attr("data-notequals"),
		 field = this.getInputs().filter("[name=" + name + "]"); 
	return input.val() != field.val() ? true : [name]; 
});

var $= jQuery.noConflict();
function openDialog(url, width, height){
				 $.fancybox({
                    'width': width,
                    'height': height,
                    'autoScale': false,
                    'transitionIn': 'fade',
                    'transitionOut': 'fade',
                    'type': 'iframe',
                    'href': url,
                    'showCloseButton': true,
                    'afterClose' : function(){
					//	if(obj != undefined){
						//	if(obj.fancyboxclosed != undefined){
						//		obj.fancyboxclosed(obj);
					//		}
					//	}
					}
            	});
			}
      
  function openPreview()
		{
			var wWidth = $(window).width();
			var dWidth = 1030;
			var wHeight = $(window).height();
			var dHeight = wHeight * 0.99;
			wWidth = (wWidth - dWidth)/2;
			var url = "/ayushman/upload/previewtemplate?id="+<?php echo $id; ?>;
			$.ajax({
			  type: "GET",
			  url: url,
			  success: function(data) {
				  //$('#preview').html(data);
				  //$('#preview').show();
			      //console.log(data);
				  openDialog('/ayushman/home/previews/preview.php', 700, 500);  
                  //alert('hi');				  
			  }
			
		  });
	    }
</script>
<div class="panel" style="max-width:100%;height:auto;overflow:hidden;">
	<div class="row editformHeader">
		<div class="col-sm-4 col-md-4"><img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Upload header and footer</div>
	</div>
	<div style="width:100%; margin:15px;">
		<div style="background-color:#ecf8fb;width:96%;">
			<div class="bodytext_bold" style="margin:15px;font-size:12px; line-height:20px;">
			Upload Header,Footer and Signature for your <em>IndiaOnlineHealth</em></div>
		</div>
		<div class="staff-left" >
			<div class="profile-image">
			<a href="javascript:void(0);" ><img style="width:100%;" src="{{profiledata[9].photo_c}}" alt="" />
				<input type="button" value="Upload Header" class="regnbutton" style="width:30%" onclick="openHeaderUploder();" />
			</a>
			</div>
		</div>
		<br>
		<hr>
		<div class="staff-left">
			<div class="profile-image">
			<a href="javascript:void(0);" ><img style="width:100%;" src="{{profiledata[9].photo_c}}" alt="" />
				<input type="button" value="Upload Footer" class="regnbutton" style="width:30%" onclick="openFooterUploder();" />
			</a>
			</div>
		</div>
			<br>
			<hr>
			<div class="staff-left">
			<div class="profile-image">
			<a href="javascript:void(0);" ><img style="width:100%;" src="{{profiledata[9].photo_c}}" alt="" />
				<input type="button" value="Upload Signature" class="regnbutton" style="width:30%" onclick="openSignatureUploder();" />
			</a>
			</div>
		   </div>
		 
		 <div class="staff-left">
			<div class="profile-image">
			     <?php //echo $_COOKIE[$cookie_name]; ?>
			     <input type="button" name="Preview" onclick="openPreview();" class="regnbutton" value="Preview"> 
			</div>
		 </div>
		 
		 
	</div>
</div>
<div style="display:none;">
	<div class="bodytext_normal" id="messagelistdiv">
		
	</div>
</div>
