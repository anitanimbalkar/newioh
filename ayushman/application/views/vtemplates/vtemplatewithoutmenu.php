<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>India Online Health</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="/ayushman/assets/js/listboxcomponent.js"></script>
		<link rel="stylesheet" href="/ayushman/assets/app/lib/font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="/ayushman/assets/js/fx.js"></script>		
<link href="/ayushman/assets/css/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
		<!-- BOOTSTRAP CSS -->
		<link href="/ayushman/home/css/bootstrap.css" rel="stylesheet">
		<!-- CUSTOM CSS-->
		<link href="/ayushman/assets/css/style2.css" rel="stylesheet">		
		<link href="/ayushman/home/css/homestyle.css" rel="stylesheet">	
		<link href="/ayushman/assets/css/responsive.css" rel="stylesheet">
		<link href="/ayushman/assets/css/web2.css" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="/ayushman/assets/js/ie10-viewport-bug-workaround.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<script>window.jQuery || document.write('<script src="../assets/js/jquery-1.7.1.min.js"><\/script>')</script>
		<!-- Bootstrap and page JS -->
		<script src="../assets/public/lib/bootstrap/js/bootstrap-carousel.js"></script>
		<script src="../assets/public/lib/bootstrap/js/bootstrap-transition.js"></script>
		<script src="/ayushman/home/js/main.js"></script>
		<style>
			.fa{
	font-size:30px;
}
		</style>
		<script type="text/JavaScript">
			$(document).ready(function(){
				if($("#doctorstatus").val()!="active")
	{
		$("#subNavigation").hide();
		$("#menubutton").hide();
		$("#default").hide();
		
	}
	else
	{
		$("#special").hide();
	}
				var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
				if(is_chrome)
				{
					document.getElementById('chromeabsent').innerHTML = "";
				}
				else
				{
					document.getElementById('chromeabsent').visible = true;
				}
			});
		</script>
		<style>
			#body{overflow:auto;}
		</style>
	</head>
	
<body class="required-information">
	<div id="chromeabsent" class="bodytext_normal" style="display:none;vertical-align:top;width:100%;z-index:1005;float:middle;top:1px;position:absolute;" align="center"  ><span style="border:2px solid #f0c36d;background-color:#f9edbe;" ><a href="#" onclick="var win=window.open('http://www.google.com/chrome/', '_blank');  win.focus();"><strong>&nbsp;&nbsp;Works best with chrome browser.&nbsp;&nbsp;</strong></a></span></div>
	<div id="javascriptenabled" class="bodytext_normal" style="vertical-align:top;width:100%;z-index:1005;float:middle;top:1px;position:fixed;" align="center"  >
		<noscript>
			<span style="border:2px solid #f0c36d;background-color:#f9edbe;padding:10px;"  >
				<strong> For full functionality of this site, it is necessary to enable JavaScript. Please enable javascript and refresh</strong>
			</span>
			 <style type="text/css"> #body { display:none; } </style>
		</noscript>
	</div>
	<div class="navbar navbar-inverse navbar-fixed-top top-header" id="topNav" role="navigation">
		<div class="container" id="topHeader">
			<div class="navbar-header">
				<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>-->
				<div class="logoWrapper"> <a class="navbar-brand logo-center" href="/ayushman/home/index.shtml" title="INDIA ONLINE HEALTH">INDIA ONLINE HEALTH</a> </div>
			</div>
			<div class="collapse navbar-collapse">
				<!--<ul class="nav navbar-nav">
				<li id="menubutton"><a href="javascript:void(0);" title="Menu" id="menuExpand" onClick="showLeftMenu();"><i class="fa fa-th-list"></i> </br>Menu</a></li>
				</ul>
			<ul class="nav navbar-nav pull-right">
					<li id="default"><a href="/ayushman/home/index.shtml" title="Home" class="Help"><i class="fa fa-home"></i></br>Home</a></li>
					<li id="special"><a href="/ayushman/cdashboard/view" title="Home" class="Help"><i class="fa fa-home"></i></br>Home</a></li>
				</ul>-->
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	
				<input id="doctorstatus" type="hidden" value="<?php if(isset(Auth::instance()->get_user()->activationstatus_c)) echo Auth::instance()->get_user()->activationstatus_c;?>"/>
	<div id="subNavigation">
		<!--a href="javascript:void(0);" onClick="hideLeftMenu();" title="Close" class="closeMe">X</a-->
	<!--<ul>
		<li><a href="/ayushman/home/index.shtml#menuhome" title="Home">Home</a></li>
		<li><a href="/ayushman/home/index.shtml#menuconsumers" title="Patients">Patients</a></li>
		<li><a href="/ayushman/home/index.shtml#menudoctor" title="Doctors">Doctors</a></li>
		<li><a href="/ayushman/home/index.shtml#menuserviceprovider" title="Service Providers">Service Providers</a></li>
		<li><a href="/ayushman/home/index.shtml#menucompany" title="Company">Company</a></li>
		<li><a href="/ayushman/home/index.shtml#menucollege" title="College">College</a></li>
		<li><a href="/ayushman/home/index.shtml#menunews" title="News">News</a></li>
		<li><a href="/ayushman/home/index.shtml#menuarticle" title="Article">Articles</a></li>
		<li><a href="/ayushman/home/index.shtml#menucontact" title="Contact">Contact</a></li>
		</ul>-->
		<p>&copy; Copyright 2014 India Online Health.<br />
		All Rights Reserved.<br />
		</p>
	</div>
	<div id = 'body'>	
		<div id="content">
			<?= $content; ?>
		</div>
		<div class="inner-footer">
			<div class="table-responsive">
				<table class="table table-condensed" style="width:100%">
					<tr class="BlueBandFooterHeading">			
					  <td style="text-align:center;">COMPANY</td>
					  <td valign="right" style="text-align:center;" id="faq"><a class="BlueBandFooterHeading" href="/ayushman/home/Faq.shtml">FAQs</a></td>
					  <td valign="right" style="text-align:center;">POLICIES</td>
					  <td valign="right" style="text-align:center;"  id="feedback"><a class="BlueBandFooterHeading" href="/ayushman/home/Feedback.shtml">FEEDBACK</a></td>
					  <td valign="right" style="text-align:center;">CONTACT INFORMATION </td>    
					  <td valign="right" style="text-align:center;">ABOUT </td>    				  
					</tr>
					<tr align="center">
						<td>
						  <a href="/ayushman/home/Mission.shtml" class="bodytext_normal">Mission</a><br />
						  <a href="/ayushman/home/Mission.shtml" class="bodytext_normal">Leaders</a><br />
						</td>
						<td valign="right" class="bodytext_normal">&nbsp;</td>
						<td>
						  <a href="/ayushman/home/Terms of Use.shtml" class="bodytext_normal">Terms of Use</a><br />
						  <a href="/ayushman/home/Privacy Policy.shtml" class="bodytext_normal">Privacy Policy</a><br />
						  <a href="/ayushman/home/Return Policy.shtml" class="bodytext_normal">Return Policy</a><br />
						  <a href="/ayushman/home/Disclaimer.shtml" class="bodytext_normal">Disclaimer</a>
						</td>				
						<td valign="right" class="bodytext_normal">&nbsp;</td>
					   <td valign="right" align="center" class="bodytext_normal" align="left">
							<span class="bodytext_normal" ><strong>Ayushman Pvt. Ltd.</strong></span><br />
							5-6/A, Ramyanagari,<br />Bibwewadi,Pune - 411037<br />Tel. &nbsp;&nbsp;&nbsp;: +91 20 2422 5288 <br />Email : <a href="Thanku.shtml">info@indiaonlinehealth.com</a>				   
					   </td>
						<td valign="right"  style="text-align:center;" class="bodytext_normal">IOH Ver 2.0</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php foreach($styles as $file => $type) { echo HTML::style($file, array('media' => $type)), "";  }?>
	<?php foreach($scripts as $file) { echo HTML::script($file, NULL, TRUE), ""; }?>
	<div id="divnotification" style="width:0px;height:0px;">
	</div>
	<div id="lzsplash" style="position:absolute;width: 0%; height: 0%;top:0px;display:none;" align="center">
		<p id="lzsplashp">
		<img id="loadstatusimage" src="/ayushman/assets/images/ajax-loader.gif" /><br /><br /><font id="loadstatus" class="statusFont">Please enable JavaScript in order to use this application.</font></p>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	function openloginbox(redirection)
	{
		$("#panel4").toggle("fast");
		$(this).toggleClass("active");
		document.getElementById("email").focus();
		document.getElementById("redirection").value = redirection;
	}
	function closelogin(){
		$("#panel4").toggle("fast");
	}
</script>
<div id="panel4" class="panel panel-default" style="z-index: 50000;margin-top:10%; margin-right:18%;" >
		<div class="panel-body">
			<div class="formheader">Secure Sign In <!--<a class="formclose" href="#" onclick="closelogin()"></a>--></div>
			
			<form id="loginformid" action="/ayushman/cuser/login"  role="form" method="post" accept-charset="utf-8">
				
				<div class="form-group" >
					<label for="email">Username</label>
					<input type="text" class="form-control" id="email" name="email" required="required" placeholder="Username" autocomplete="on">
				</div>
				<div class="form-group" >
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password">
				</div>
				<div class="form-group">					
					<a href="/ayushman/cpasswordmanager/view" style="color:#04706d; margin-top:10px;">Forgot Password?</a>
					
					<button type="submit" class="btn btn-info">SIGN IN </button>
				</div>
				
			</form>
		</div>	
	</div>
<div id="message" style="-moz-border-radius: 2px;height:auto; -webkit-border-radius:2px; -khtml-border-radius: 2px; border-radius:2px;font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;" >
			<table>
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
						<div id='buttons' style="align:center;height:100%;width:100%;background-color:#ffffff;">
							
						</div>
					</td>
				</tr>
			</table>
		</div>
<div id="notification" style="-moz-border-radius: 2px;height:auto; -webkit-border-radius:2px; -khtml-border-radius: 2px; border-radius:2px;font-size:11px;font-family: tahoma,Helvetica,sans-serif;background-color:#ffffff;" >
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
