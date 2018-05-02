<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>India Online Health</title>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

		<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>

		<script type="text/javascript" src="/ayushman/assets/js/messagecomponent.js"> </script>
		<?php foreach($styles as $file => $type) { echo HTML::style($file, array('media' => $type)), "";  }?>
		<?php foreach($scripts as $file =>$type) { echo HTML::script($file, array('media' => $type)), ""; }?>
		<script type="text/javascript" src="/ayushman/assets/js/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
		<script src="/ayushman/assets/app/lib/main.js"></script>	
<link rel="stylesheet" type="text/css" href="/ayushman/assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" href="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.datetimepicker.css" />

		<script src="/ayushman/assets/app/lib/jquery-simple-date-picker/jquery.datetimepicker.js" ></script>

		<script type="text/javascript" >
		function getInternetExplorerVersion() {
				var rv = -1; // Return value assumes failure.

				if (navigator.appName == 'Microsoft Internet Explorer') {
					var ua = navigator.userAgent;
					var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");

					if (re.exec(ua) != null) {
						rv = parseFloat( RegExp.$1 );
					}
				}
				return rv;
			}
		function checkVersion() {
			
			if(window.location.href.indexOf("cerror/browsers") == -1){
				var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
					// Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
				var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
				var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
					// At least Safari 3+: "[object HTMLElementConstructor]"
				var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
				var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
				
					
				if (isIE) {
					var msg = "You're not using Internet Explorer.";
					var ver = getInternetExplorerVersion();

					if ( ver > -1 ) {
						if ( ver >= 9.0 ) {
							msg = "You're using a recent copy of Internet Explorer."
						}
						else {
							msg = "You should upgrade your copy of Internet Explorer.";
							
							parent.window.location.href="/ayushman/cerror/browsers";window.location.href="/ayushman/cerror/browsers";
						}
					}
				}else if(navigator.appName == 'Netscape'){
					
					
				}else {
					parent.window.location.href="/ayushman/cerror/browsers";window.location.href="/ayushman/cerror/browsers";
				}
			}else{
			
			}
			
		}
		function openDialog(url, width, height,obj){
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
						if(obj != undefined){
							if(obj.fancyboxclosed != undefined){
								obj.fancyboxclosed(obj);
							}
						}
					}
                });
			}
		function checkmsg(message)
		{
			if(message == "pullgriddata")
			{	
				if($(".xjqgridclass")[0] != undefined)
				refreshgrid();
			}
			if($("#isConsultationPage")[0] != undefined)
				msg_handler(message);
		}
		$(document).ready(function() {
			checkVersion();
			resize();
			setTimeout(function() {resize();},2000);
		});

		function resize(height){
		
			if(height == undefined){
				if(parent.iframeloaded != undefined)
					parent.iframeloaded();
			}else{
				parent.setIframeHeightInPx(height);
			}
		}
		</script>


		<div id="content" style="width:100%;">
			<?= $content; ?>
		</div>
			<div id="message" class="bodytext_normal" style="border: 1px solid rgb(168, 200, 217); overflow: hidden; display:none;" >
			<table>
				<tr>
					<td align="center" colspan="2">
						<div class="bodytext_normal" id="heading" align="left" style="height:42px;border-bottom:1px solid #a8c8d9;background: #ecf8fb;padding-top:10px; padding-right:10px;vartical-align:middle;align:left;">

							
						</div>
					</td>
				</tr>

				<tr valign="center">
					<td width="auto" valign="top">
						<div id='icon' style="height:100%;width:100%;background-color:#ffffff;">
				
						</div>
					</td>
					<td valign="center">
						<div id='content' valign="center" style="valign:center;height:100%;width:100%;" style="font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;">
				
						</div>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<div class="bodytext_normal" id="buttons" align="right" style="height:42px;border-top:1px solid #a8c8d9;background: #ecf8fb;padding-top:5px; padding-right:10px;vartical-align:middle;align:right;">

							
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div id="notification" style="-moz-border-radius: 2px;height:auto; -webkit-border-radius:2px; -khtml-border-radius: 2px; border-radius:2px;font-size:11px;font-family: tahoma,Helvetica,sans-serif;" >
			<table>
				<tr valign="center">
					<td width="auto" valign="top">
						<div id='notificationicon' style="height:100%;width:100%;background-color:#ffffff;">
				
						</div>
					</td>
					<td valign="center">
						<div id='notificationcontent' valign="center" style="valign:center;height:100%;width:100%;" style="font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;">
				
						</div>
					</td>
				</tr>
			</table>
		</div>
		<?= $plugin; ?>
