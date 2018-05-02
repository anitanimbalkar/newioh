<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" />

<head>
<title>Ayushman Healthcare</title>
</head>
<body style="width:1024px">
	<div style="height:auto;width:100%;">
		<div style="height:auto;width:100%;align:center" align="center">
			<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Visit Summary</label>
		</div>
		
		<div id="name" style="height:auto;width:100%;">
			<label id='lbldoctorname' style="font:bold;font-size:14pt;font-family:arial;font-weight:bold;width:100%;">-</label>
			<label id='lblqualification' style="font:bold;font-size:14pt;font-family:arial;">-</label>
			
			<table style="height:auto;width:100%;padding-top:5px;">  
				<tr>
					<td rowspan="2" style="height:auto;width:60%;vertical-align:top">
						<div style="float:left;width:150px;margin-left:20px;">
							<label id='lbladdress' style="font:bold;font-size:13pt;font-family:arial;">-</label>
						</div>
					</td>
					<td style="height:auto;width:10%;vertical-align:top">
						<div style="float:left;width:100%;margin-left:20px;">
							<label style="font:bold;font-size:13pt;font-family:arial;">Regd Number:</label>
							<label id="lblregdnumber" style="font:bold;font-size:13pt;font-family:arial;">-</label>
						</div>
					</td>
				</tr>
				<tr>
					<td style="height:auto;width:30%;vertical-align:top">
						<div style="float:left;width:150px;margin-left:20px;">
							<label id='lblcontactnumber' style="font:bold;font-size:13pt;font-family:arial;">-</label>
						</div>	
					</td>
				</tr>
			</table>
			<hr  style="height:2px;background-color:black;border:none;"/>
		</div>
		
		<table style="width:100%;">
			<tr style="width:100%;">
				<td style="width:80%;">
					<div style="height:5px;width:100%;margin-top:5px;layout:horizontal;float:right;"> 
						<table style="height:auto;width:100%;padding-top:5px;">  
							<tr>
								<td style="height:auto;vertical-align:top;width:20%">
									<label style="font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Incidence Visit Number:</label>
									<label id='lblnumber' style="font:bold;font-size:14pt;font-family:arial;"></label>
								</td>
								<td style="height:auto;width:10%;vertical-align:top">
									<label style="font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Date:</label>
									<label id='lbldate' style="font:bold;font-size:14pt;font-family:arial;"></label>
								</td>
								
							</tr>
						</table>
						<hr/>						
					</div>
				</td>
				<td style="width:20%;" rowspan="2">
					<div style="height:110px;width:100px;margin-top:5px;layout:horizontal;float:right; border:1px solid;">
						<img id="imgpatientphoto" src="http://localhost/ayushman/assets/images/pic02.png" style="height:110px;width:100px;float:right;"></img> 
					</div>
				</td>
			</tr>
			<tr style="width:100%;">
				<td style="width:auto;">
					<div style="height:60px;width:100%;margin-top:2px;layout:horizontal;float:left;vertical-align:top;"> 
						<div style="height:100%;width:100%;vertical-align:top; layout:horizontal;float:left;padding-top:17px">
							<label style="font:bold;font-size:14pt;margin-left:1%;font-family:arial;font-weight:bold;">Name:</label>
							<label id='lblpatientname' style=" border-bottom-width:1px;font-size:14pt;font-family:arial;">ananda naphade</label>
							
							<label style="margin-left:15%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Age:</label>
							<label id='lblpatientage' style=" border-bottom-width:1px;font-size:14pt;font-family:arial;">27</label>
							
							<label style="margin-left:15%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Blood Grp:</label>
							<label id='lblpatientbloodgrp' style="border-bottom-width:1px;font-size:14pt;font-family:arial;">A+</label>
							
							<label style="margin-left:15%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">IOH&nbsp;#&nbsp;</label>
							<label id='lblpatientAIN' style="border-bottom-width:1px;font-size:14pt;font-family:arial;">-</label>
						</div>
						<hr/>
					</div>
				</td>
				<td style="width:auto;">
				</td>
			</tr>
		</table>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Symptom / Main Complaint:</label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblsymptoms' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Vital Signs:</label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblgeneral' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table width="100%" height="auto"> 
				<tr>
					<td width="100%">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Symptomatic Review of Systems</label>
						
					</td>
				</tr>
				<tr>
					<td width="100%">
						<label id='lblsymptomaticdtls' style=" margin-left:1%;font-size:13pt;font-family:arial;"></label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table width="100%" height="auto"> 
				<tr>
					<td width="100%">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Examinations</label>
						
					</td>
				</tr>
				<tr>
					<td width="100%">
						<label id='lblexamination' style=" margin-left:1%;font-size:13pt;font-family:arial;"></label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Diagnosis:</label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblpatientdiagnosis' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Investigations suggested:</label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblpatienttest' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Rx Prescription:</label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblpatientprescription' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		
		<div style="height:auto;width:100%;margin-top:5px;layout:vertical;float:left;">
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Follow up / Advice: </label>
					</td>
				</tr>
				<tr>
					<td>
						<label id='lblpatientfollowup' style=" margin-left:1%;font-size:13pt;font-family:arial;">-</label>
						<hr style="margin-left:1%;"/>
					</td>
				</tr>
			</table>
		</div>
		<div >
			<table style="width:100%;height:auto;">
				<tr style="width:100%;height:10px;">
					<td style="width:70%">
					</td>
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Signature: </label>
					</td>
					<td>
					</td>
				</tr>
				<tr style="width:100%;height:10px;">
					<td style="width:70%">
					</td>
					<td style="width:100%;height:10px;">
						<label style="margin-left:1%;font:bold;font-size:14pt;font-family:arial;font-weight:bold;">Date: </label>
						<label id='lbldate' style=" margin-left:1%;font-size:13pt;font-family:arial;">27/01/2012</label>
					</td>
				</tr>
			</table>
		</div>	
	</div>
</body>
