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
<!--
.style1 {
	font-family: "Courier New", Courier, monospace;
	}
.style2 {font-family: "Courier New", Courier, monospace}
-->
</style>
</head>
<body>
<table width="100%" height="47" border="0">
  <tr>
    <td width="100%">
		<div align="center">
			<img src="/<?php echo @$_COOKIE["header_image"]; ?>" ?></img>
		</div>
	</td>
  </tr>
  <tr>
	<td valign="middle"><hr/></td>
  </tr>
</table>
<table width="100%" border="0">
<td width="8%">
	<div  width="30%" align="left">
	<img  src="<?php echo '/ayushman/assets/userphotos/userphoto.png';?>" alt="">  	</div></td>
<td width="47%" valign="top">	
  	<div align="left" class="style1">
  		<lable>
  		Name:&nbsp;&nbsp;
  		</label>
  		<br/>
		<lable>
		IOH ID:&nbsp;&nbsp;
		</label>
		<br/>
		<lable>
		Date Of Birth:&nbsp;&nbsp;
		</label>
		<br>
		<lable>
		Gender:&nbsp;&nbsp;
		</label>
		<br>
		
		<lable>
		Mobile No:&nbsp;&nbsp;
		</label>
		<br>
		<lable>
		Emergency No:&nbsp;&nbsp;
		</label>
		<br>
		<lable>
		Blood Group:&nbsp;&nbsp;
		</label>
		<br>
		<lable>
		Known Medical Problem:&nbsp;&nbsp;
		</label>
		<br>
		<lable>
		Address:&nbsp;&nbsp;
		</label>
		<br>
  	</div></td>  
<td width="45%"  valign="top" class="style2">
	<label><strong>VIJAY KUMAR GAIKWAD</strong></label>
	<strong><br>
	<label>1234</label>
	<br>
	<label>
	1993-01-07
	</label>
	<br>
	<label>Male
	</label>
	<br>
	<label>
	1234567890
	</label>
	<br>
	<label>
	9876543210
	</label>
	<br>
	<label>
	AB+
	</label>
	<br>
	<label>
	No Problem
	</label>
	<br>
	<label>
	Near Mordern Bakery Pune Maharashtra 411021
	</label>
	<br>
        </strong></td>
</table>
<table  width="100%" border="0">
<tr>
	<td valign="middle"><hr/></td>
</tr>
<tr>
<td width="100%" height="31"><div align="center"><img src="/ayushman/assets/images/iohfooterQR.png"  ?>"></img></div></td>
</tr>
<tr>
<td width="100%" height="31"><div align="center" width="1000%" ><img src="<?php if((empty($_COOKIE["reverse_image"]))){echo '/ayushman/assets/images/whiteimage.png';}else{echo "/". @$_COOKIE["reverse_image"];}?>"></img>
</div>
</td>


</tr>
</table>
<!--
<div><img src="/ayushman/assets/images/BacksideFooter.png"></img>
</div>-->
</body>
</html>	