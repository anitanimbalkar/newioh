<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" /><head>
<title>
	Patient I-Card
</title>
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function printId(){
	window.print();
}	
</script>
<style type="text/css">
@media print {
    h1 {page-break-before: always;}
}
	

label {
  width:120px;
  font-size: 10px;
  float: left;
}



<!--
-->
</style>
</head>
<body>

<div style="width=60%">
<table width="39%" border="0">
<tr>
    <td width="100%" valign="left">
		
			<img width="100%"src="<?php if($objStaff->icardheader_c == ""){echo 'I-Card Header Not Uploaded';}else{echo "/". $objStaff->icardheader_c;}?>"></img>
		
	</td>
	
  </tr>
  <!--<tr>
	<td valign="middle"><hr/></td>
  </tr>-->
  <tr>
    <td width="31%"><strong style="font-size: 10px;">Name: <?php echo strtoupper($fname); ?> <?php echo strtoupper($mname);?> <?php echo strtoupper($lname); ?></strong></td>
  </tr>
  <tr>
    <td><strong style="font-size: 10px;">Sex: <?php if($gender == ""){echo "";}else{echo $gender;}?>&nbsp;&nbsp;&nbsp;&nbsp; BG: <?php if($bloodgroup == ""){echo "";}else{echo $bloodgroup;}?>&nbsp;&nbsp;&nbsp;&nbsp; IOH ID: <?php echo $patId ?></strong></td>
  
  </tr>
  
  <tr>
    <td><strong style="font-size: 10px;">Date Of Birth: </strong>
    <strong style="font-size: 10px;">
      <?php 
	  if($dob == ""){echo "";}else{echo $data2 = date( 'd/m/Y', strtotime( $dob ) );}?>
    </strong></td>
  </tr>
  <tr>
    <td valign="top"><strong style="font-size: 10px;">Date Of Membership:
      <?php echo date("d/m/Y");?>
    </strong></td>
  </tr>
  <tr>
    <td><strong style="font-size: 10px;">Mobile No: </strong>
    <strong style="font-size: 10px;">
      <?php if($mob == ""){echo "";}else{echo $mob;}?>
    </strong></td>
  </tr>
  <tr>
    <td><strong style="font-size: 10px;">Emergency No:
      <?php if($emergencyno == ""){echo "";}else{echo $emergencyno;}?>
    </strong></td>
  </tr>
  
  <tr>
    <td><strong style="font-size: 10px;">Medical Problem : </strong>
    <strong style="font-size: 10px;">
      <?php if($medicalprob == ""){echo "";}else{echo $medicalprob;}?>
    </strong></td>
  </tr>
  <tr>
	<td valign="middle"><hr/></td>
  </tr>
  <tr>
	<td width="100%" height="31" valign="left"><img width="100%"  src="/ayushman/assets/images/iohfooterQR.png" style="
    margin-top: -22px;"></img></td>
</tr>
</table>
<div style="wiidth=40%" align="right">
<img  src="<?php if($userphoto == ""){echo '/ayushman/assets/userphotos/userphoto.png';}else{echo $userphoto;}?>" alt="" style="
    width: 70px;
    margin-top: -145px;
    margin-right: 435px;
"></div>
</div>
<table  width="40%" border="0">


  <td align="right">
  	<input type="button" value="Print" class="button" style="float:center; " onClick="printId();" />
	</td>
</table>

<div style="width=60%; height=60%" >
<table width="40%" border="0">
	<tr>
		<td width="100%" valign="left">
			
			<img  width="100%" height="60%" src="<?php if($objStaff->reversesideimage_c == ""){echo '/ayushman/assets/images/whiteimage.png';}else{echo "/". $objStaff->reversesideimage_c;}?>"></img><br>
			
		</td>
		
	</tr>
</table>
</body>
</html>	