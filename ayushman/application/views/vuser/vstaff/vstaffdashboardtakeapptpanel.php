
<link href="/ayushman/assets/css/takeappstyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
input.textbox {
padding-left:2px;
border:none;
border-bottom: 1px solid #909090;
word-spacing:0;
font-size: 8pt;
word-wrap:no;
height: 13px;
overflow: hidden;
width:auto;
vertical-align:top;
font-style:normal;
font-family: verdana;
font-color::#0000FF;
margin-right:0px;
padding-right:0px;
line-height: 12px;

}
select.textbox {
padding-left:2px;
border:none;
border-bottom: 1px solid #909090;
word-spacing:0;
font-size: 8pt;
word-wrap:no;
height: 13px;
overflow: hidden;
width:auto;
vertical-align:top;
font-style:normal;
font-family: verdana;
font-color::#0000FF;
margin-right:0px;
padding-right:0px;
line-height: 12px;

}
div.container {
background-color: #eee;
margin: 5px;
padding: 5px;
}
div.container ol li {
list-style-type: disc;
margin-left: 20px;
}
div.container { display: none }
.container label.error {
display: inline;
}
form.cmxform label.error, label.error {
color: red;
font-style: italic;
}
input.error { border-bottom: 1px solid red; }
form.cmxform { width:100%; }
form.cmxform label.error {
display: block;
margin-left: 1em;
width: auto;
}
.watermarkOn {
color: #CCCCCC;
font-style: italic;
}

.ui-datepicker { width: 14em; padding: .2em .2em 0; display: none; }
.ui-datepicker table {width: 100%; font-size: .7em; border-collapse: collapse; margin:0 0 .4em; }
.ui-widget { font-size: 0.8em;}
.style2 {color: #000000}
.style3 {color: #333333}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
.style10 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #000000; }
.style12 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #000000; font-weight: bold; }
-->
</style>




<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
 <script src="/ayushman/assets/js/jquery.metadata.js" type="text/javascript"></script>
<script src="/ayushman/assets/js/jquery.validate.js" type="text/javascript"></script>
 <script type="text/javascript">
 $(document).ready(function(){
	jQuery('#contactno').keyup(function () {
		this.value = this.value.replace(/[^0-9\.]/g,'');
	});
		
	document.getElementById('validateinfo').value="validated";
		$('#nonreg').prop('checked', true);
		$("#lname").attr("disabled",false);
		$("#fname").attr("disabled",false);
		$("#contactno").attr("disabled",false);
		$("#emailid").attr("disabled",false);
		$("#mailid").attr("disabled",true);
		$("#ayuid").attr("disabled",true);
		$("#validate").attr("disabled",true);
		document.getElementById('validateinfo').value="validated";

	$("#reg").click(function(){
	document.getElementById('errorMessageBox').innerHTML = "";
	document.getElementById('fname').value="";
	document.getElementById('lname').value="";
	document.getElementById('contactno').value="";
	document.getElementById('emailid').value="";
	document.getElementById('validateinfo').value="unvalid";
		$("#lname").attr("disabled",true);
		$("#fname").attr("disabled",true);
		$("#contactno").attr("disabled",true);
		$("#emailid").attr("disabled",true);
	$("#validate").attr("disabled",false);
		$("#ayuid").attr("disabled",false);
		$("#mailid").attr("disabled",false);
		document.getElementById('validateinfo').value="unvalid";
		
		});
	$("#nonreg").click(function(){
	document.getElementById('errorMessageBox').innerHTML = "";
 	//$("#ayuid").removeAttr("disabled");
	document.getElementById('ayuid').value="";
	document.getElementById('mailid').value="";
	document.getElementById('fname').value="";
	document.getElementById('lname').value="";
	document.getElementById('contactno').value="";
	document.getElementById('emailid').value="";
		document.getElementById('validateinfo').value="validated";
		$("#ayuid").attr("disabled",true);
		$("#mailid").attr("disabled",true);
		$("#lname").attr("disabled",false);
		$("#fname").attr("disabled",false);
		$("#contactno").attr("disabled",false);
		$("#emailid").attr("disabled",false);
		$("#validate").attr("disabled",true);
	});
 });
 function onclickme()
 {
	$("#searchform").validate(
	{
		errorLabelContainer: "#errorMessageBox",
		wrapper: "li",
		submitHandler: function()
		{
			submitform();
		}

	});
}
function submitform(){
	
	if(document.getElementById('validateinfo').value=="validated")
	{
	$('#searchform').submit();
	}
	else{
	showMessage('200','50','Ayushman ID',"Please Validate the ID" ,'information','');
	}
}
function onChangeTest() 
{      
	  document.getElementById('validateinfo').value="unvalid";
	  document.getElementById('mailid').value="";
      
}
function onChangeTestemail() 
{      
	  document.getElementById('validateinfo').value="unvalid";
	  document.getElementById('ayuid').value="";
      
}
	  
	  function getinfo()
{
	document.getElementById('fname').value="";
	document.getElementById('lname').value="";
	document.getElementById('contactno').value="";
	document.getElementById('emailid').value="";
	var id=	document.getElementById('ayuid').value;
	var email=document.getElementById('mailid').value;
	if(id){

	$.ajax({
			  url: "/ayushman/cstaffdashboard/getinfo?id="+id,
			  success: function( data )
			  {
			  var data1 =JSON.parse(data);
	  
				if(!(data1[0])){
				    
			
					document.getElementById('validateinfo').value=="unvalid";
					
					showMessage('200','50','Ayushman ID',"This Id does not exist" ,'information','');
					}
				else{
		  document.getElementById('validateinfo').value="validated";
			document.getElementById('fname').value=data1[0];
			document.getElementById('lname').value=data1[1];
			document.getElementById('contactno').value=data1[2];
			document.getElementById('emailid').value=data1[3];
            document.getElementById('mailid').value=data1[4];			
			}
	
				},
				error : function(){}
			  });
	}
	else if(email){
	
	$.ajax({
	
			  url:"/ayushman/ctakeappointment/getinfoemail?email="+email   
			  ,
			  success: function( data )
			  {
			  var data1 =JSON.parse(data);
	  //var data1=data;
				if(!(data1[0])){
				   
					document.getElementById('validateinfo').value=="unvalid";
					
					showMessage('200','50','Ayushman ID',"This Id does not exist" ,'information','');
					}
				else{
				
				
							document.getElementById('validateinfo').value="validated";
			document.getElementById('fname').value=data1[0];
			document.getElementById('lname').value=data1[1];
			document.getElementById('contactno').value=data1[2];
			document.getElementById('emailid').value=data1[3];
			document.getElementById('ayuid').value=data1[4];
				}
	
	}

	
	
	
	,
				error : function(){}
			  });
	}
	else
{
showMessage('200','50','Data Missing',"Please enter Ayushmn Id Or Email Id ." ,'information','');

}	
	
}


 </script>


<div id="wrapper" style="width:828px;border:none; height:420 px; padding-left:0px;">
  <table style="width:100%; height:100%;" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
		<td width="791" align="left" valign="top" class="LeftMenu_BG">
	  	<table width="785" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100%" colspan="4" style="padding-left:7px; padding-right:7px; padding-top:3px;">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="3%">&nbsp;</td>
              <td width="25%" height="30" align="center" valign="middle" class="Rounded_buttonBlue"><a href="/ayushman/cstaffdashboard/viewUpcomingAppointment" style="color:#FFFFFF">Up Coming Appointments</a>
			  </td>
              <td width="1%">&nbsp;</td>
              <td width="23%" align="center" valign="middle" bgcolor="#065176" class="Rounded_buttonBlue"><a href="/ayushman/cstaffdashboard/viewCompletedAppointment" style="color:#FFFFFF">Appointments Completed</a>
			  </td>
              <td width="1%">&nbsp;</td>
              <td width="19%" align="center" valign="middle" class="Rounded_buttonOrenge"><a href="#" style="color:#FFFFFF">Take Appointments</td>
              <td width="28%">&nbsp;</td>
            </tr>
          </table>
		  </td>
        </tr>
        <tr>
          <td colspan="4">
		  <form id="searchform" name="searchform" action="takeappointmentsubmit2" method="post" accept-charset="utf-8">
		 	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
				<tr>
					<td height="29" align="left" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="Heading_Bg">&nbsp;<img src="images/WhiteArrow_Icon.png" width="9" height="7">&nbsp;&nbsp;Take Appointments</td>
							</tr>
							<tr>
								<td height="40" align="left" valign="middle" bgcolor="#E2E2E2">
		
									<table width="500" border="0" align="left" cellpadding="0" cellspacing="0">
		<tr>
		
		<td width="7%">&nbsp;</td>
		<td class="style11">
		
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="5%"><input name="reg" id="reg" type="radio" value="registered" ></td>
					<td width="18%" class="style10">Registered </td>
					<td width="5%"><input name="reg" type="radio" id="nonreg" value="nonreg" ></td>
					<td width="72%" class="style10">Non Registered</td>
				</tr>
				</table>		
		</td>
        </tr>
        </table>		
								</td>
							</tr>
							<tr>
								<td height="30" bgcolor="#E2E2E2">
									<table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
										<tr>
											<td width="7%" height="30">&nbsp;</td>
											<td width="28%" height="30" class="style12">Ayushman ID</td>
											<td width="27%" height="30" class="style12">
											
				
												<span class="style11">
												 <input name="apcalid" id="apcalid" type="hidden" value="<?php echo $apcalid ?>"/>
												<input name="docid" id="docid" type="hidden" value="<?php echo $docid ?>"/>
												<input name="ayuid" id="ayuid"  minlength="1" title="Please enter a valid ayushman id" type="text" size="20" onchange="onChangeTest()"/>
										
												</span>			
											</td>
											<td width="7%" height="30" class="style12">&nbsp; OR &nbsp;  </td>
											<td width="30%" height="30" class="style12">Email Id</td>
											<td width="27%" height="30" class="style12">
												<span class="style11">
												<input name="mailid" id="mailid"  minlength="1" title="Please enter a valid email id" type="text" size="20" onchange="onChangeTestemail()" email="true"/>
												
												</span>		
											</td>
										</tr>
										<tr>
										<td width="7%" height="30">&nbsp;</td>
											<td width="18%" height="30" class="style12">
											&nbsp;</td>
											<td width="27%" height="30" class="style12">
										<input name="validate" type="button" id="validate" value="validate"onclick="getinfo()">
												<input name="validateinfo" type="hidden" id="validateinfo" value="unvalid" >
												</td>
										</tr>
										<tr>
											<td width="7%" height="30">&nbsp;</td>
										</tr>
										<tr>
											<td width="7%" height="30">&nbsp;</td>
											<td width="13%" height="30" class="style12">First Name </td>
											<td width="35%" height="30" class="style12">
												<span class="style11">
												<input name="firstnm" id="fname" type="text" size="20" required="required" minlength="3" title="Please enter your First Name (at least 3 characters)" value="<?php echo $fname; ?>"/>
												</span>		
											</td>
											<td width="30%" height="30" class="style12">Last Name </td>
											<td width="35%" height="30" class="style12">
												<span class="style11">
												<input name="lastname" id="lname" type="text" size="20"   required="required" minlength="3" title="Please enter your contact no (at least 2 characters)"value="<?php echo $lname; ?> "/>
												</span>		
											</td>
										</tr>
										<tr>
											<td width="7%" height="30">&nbsp;</td>
											<td width="13%" height="30" class="style12" >Contact Number</td>
											<td width="35%" height="30" class="style12">
												<span class="style11">
												<input name="contactno" id="contactno" type="text" size="20" required="required" minlength="3"  title="Please enter your  Number  digits" value="<?php echo $contactno; ?>"/>
												</span>
											</td>
											<td width="30%" height="30" class="style12">Email ID </td>
											<td width="35%" height="30" class="style12">
												<span class="style11">
												<input name="emailid" type="text" id="emailid" email="true"
                                                size="20"/>
												</span>
											</td>
											<td width="100" >
											<div class="error" style="color: red;font-style: italic;width:100px; border-style: 1px solid;" >

										<?= Arr::path($errors, 'email'); ?>
										</div></td>
										</tr>
									</table>		
								</td>
							</tr>
							<tr>
								<td colspan="4" ><ul id="errorMessageBox"></ul>
								</td>
							</tr>
							<tr align="left" >
								<td colspan="4" >
								<label id="savelbl" style="font-weight:bold;display:none; "> User details have been saved.</label>
								</td>
							</tr>
							<tr>
								<td height="40" bgcolor="#E2E2E2">
									<table width="302" border="0" align="left" cellpadding="0" cellspacing="0">
										<tr>
											<td width="49%">&nbsp;</td>
											<td width="25%" align="center" valign="middle" class="button">	
											<input type="submit" class="button" value="Submit" name="name" onclick="onclickme()"/> 
											</td>
											<td width="3%" align="center" valign="middle">&nbsp;</td>
											<td width="23%" align="center" valign="middle" class="button">Cancel</td>
										</tr>
										
									</table>		
								</td>
							</tr>
						</table>	
					</td>
				</tr>
				
			</table>				
			</form>				
		</td>
	</tr>				
		        
    </table>      
   </td>
  </tr>
</table>
</div>



