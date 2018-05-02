<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />
<head>
<?php $pageURL = 'http';
			 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			 $pageURL .= "://";
			 if ($_SERVER["SERVER_PORT"] != "80") {
			  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
			 } else {
			  $pageURL .= $_SERVER["SERVER_NAME"];
			 }
			echo '<link href="'.$pageURL.'/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">';
?>

<title>Ayushman Healthcare</title>
</head>
<body style="width:1024px">
	<div style="height:auto;width:100%;" class="bodytext_bold">
		<div style="height:auto;width:100%;align:center" align="center">
			<label style="margin-left:1%;font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Usage Report</label>
		</div>
		
		<div id="name" style="height:auto;width:100%;">
			
			<table style="height:auto;width:100%;padding-top:5px;">  
				<tr>
					<td rowspan="2" style="height:auto;width:70%;vertical-align:top">
						
						<div style="float:left;width:50%;margin-left:20px;">
							<label id='lblcorporatename' style="font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;width:100%;">-</label><br>
							<label id='lbladdress' style="font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
						</div>
					</td>
					<td style="height:auto;width:30%;vertical-align:top">
						<div style="float:left;width:90%;margin-left:20px;">
							<label id='lblcontactnumber' style="font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
						</div>	
						<div style="float:left;width:90%;margin-left:20px;">
							<label id='lbltodaydate' style="font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
						</div>	
					</td>
				</tr>
			</table>
			<hr  style="height:2px;background-color:black;border:none;"/>
		</div>
		<div style="height:auto;width:100%;">
		<table style="width:100%;">
			<tr style="width:100%;">
				<td style="width:auto;">
					
					<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:0px">
						<label style="margin-left:1%;font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Usage report for the dates between :</label>
						<label id='lbldate' style="margin-left:1%;font:bold;font-size:11px;font-family:tahoma, Helvetica, sans-serif;"></label>
					</div>	
					<br>
					<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:0px">
						
						&nbsp;&nbsp;&nbsp;
					</div>	
					<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:0px">
						<label style="font:bold;font-size:11px;margin-left:1%;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Number Of Doctors Used The system:</label>
						<label id='lblnumberofdoctors' style=" border-bottom-width:1px;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
						&nbsp;&nbsp;&nbsp;
					</div>	
					<br>
					<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:0px">
						
						&nbsp;&nbsp;&nbsp;
					</div>	
					<br>
					<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:0px">
						<label style="font:bold;font-size:11px;margin-left:1%;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Number Of Appointments taken:</label>
						<label id='lblnumbertotalapps' style=" border-bottom-width:1px;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
					&nbsp;&nbsp;&nbsp;
						<label style="font:bold;font-size:11px;margin-left:1%;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Number Of Appointments Completed:</label>
						<label id='lblnumberappscompleted' style=" border-bottom-width:1px;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						<label style="font:bold;font-size:11px;margin-left:1%;font-family:tahoma, Helvetica, sans-serif;font-weight:bold;">Number Of No Show Appointments:</label>
						<label id='lblnumberofnoshow' style=" border-bottom-width:1px;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
					</div>	
					<br>
					<br>
					<br>
					<br>
					<hr/>
				</td>
				<td style="width:auto;">
				</td>
			</tr>
			<tr style="width:100%;">
				<td style="width:auto;padding:5px;">
					<label id='lbldoctors' style=" border-bottom-width:1px;font-size:11px;font-family:tahoma, Helvetica, sans-serif;">-</label>
				</td>
				<td style="width:auto;">
				</td>
			</tr>
		</table>
		</div>
	</div>
</body>
