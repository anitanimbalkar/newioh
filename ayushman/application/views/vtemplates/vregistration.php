<!DOCTYPE html>

<html>
<head>
<title>Registration</title>
<!-- a little more standalone page styling 	-->
<style>
body {
	background-color:#234;
	
}
</style>
<?php foreach($styles as $file => $type) { echo HTML::style($file, array('media' => $type)), ""; }?>
<link href="/ayushman/assets/css/jquery-ui-1.8.16.redmond.css" rel="stylesheet" type="text/css" />
<?php foreach($scripts as $file) { echo HTML::script($file, NULL, TRUE), ""; }?>
<script src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
</head>

<body onload="init()";>
<form action="<?php echo $url;?>" method="POST" enctype="multipart/form-data">
<div id="divheader" onclick="toggleHeight()" style="height:auto;width:auto; ">
<h3  style='-moz-border-radius: 4px; -webkit-border-radius:4px; border-radius: 4px; border: none;background: -moz-linear-gradient(top, #9e9393, #FFFFFF);background: -webkit-gradient(linear, left top, left bottom, from(#9e9393), to(#FFFFFF)); display:block; background-color:#9e9393; width:100%; height:20px; margin:0px;margin:0px; font-size:12px;'">Examination/Observation</h3>
</div>
<div id="wizard" >
<?php echo $content;?>
</div><!--wizard-->
</form>

<script>

function init() {
	sizeParams = [<?php echo $sizeParams;?>];
	$("#wizard").css("height", sizeParams[0]+"px");
	$("#wizard").css("width","100%");
	$("#wizard").css("margin","0px");
	$("#wizard").css("padding","0px");
	$(".page").css("height", sizeParams[0]-70+"px");
	$(".page").css("width", "100%");
	
	$("#wizard").css("overflow-x", "<?php echo $scrollbarx;?>");
	$("#wizard").css("overflow-y", "<?php echo $scrollbary;?>");
}
function toggleHeight()
	{
		$("#wizard").animate({
										height: 'toggle'
									}, 100, function() {
										// Animation complete.
									});
	}
$(function() {
	var wizard = $("#wizard");
	
	// enable tabs that are contained within the wizard
	$("ul.tabs", wizard).tabs("div.panes > div", function(event, index) {
		});
	// get handle to the tabs API
	var api = $("ul.tabs", wizard).data("tabs");
	
	// "next tab" button
	$("button.next", wizard).click(function() {
		
		// initialize validator for a bunch of input fields
		alert('grandparent '+$(this).parents('div:eq(0)').attr('id'));
		var inputs = $("#"+$(this).parents('div:eq(0)').attr('id')+" :input").validator();
		
		// perform validation programmatically
		if(inputs.data("validator").checkValidity()) {
			api.next();			
			} else {
			$("ul.tabs", wizard).tabs("div.panes > div", function(event, index) {
				return false;	
				});
			}		
		});
	
	// "previous tab" button
	$("button.prev", wizard).click(function() {
		api.prev();
		});
	
	$("button.save", wizard).click(function() {
		// $this refers to save button. all input tags in it's enclosing div(where id=sectionName) are validated
		var inputs = $("#"+$(this).parents('div:eq(0)').attr('id')+" :input").validator();
		
		// checkValidity() invokes clientside validation
		if(inputs.data("validator").checkValidity()) {
			$.getJSON("<?php echo $validateurl;?>" + $(this).parents('div:eq(0)').attr('id') + "?" + $("form").serialize(), 
			function(json) {
				// everything is ok. (the server returned true)
				if (json === true)  {
					$("form").submit();
					// server-side validation failed. use invalidate() to show errors
					} else {
					inputs.data("validator").invalidate(json);
				}
				});
			} else {
			$("ul.tabs", wizard).tabs("div.panes > div", function(event, index) {
				return false;	
				});
		}
		});
	});

$(document).ready(function(){
	$(".toggle_container").hide();
	
	$("h3.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
		});
		
		//document.getElementById("wizard").style.display="none";
	}); 

</script>
</body>

</html>