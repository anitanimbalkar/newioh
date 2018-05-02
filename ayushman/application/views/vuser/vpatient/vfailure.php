<HTML>
<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 class="content_bg">
  <div style="height:100%;vertical-align:center;padding-top:0px" class="content_bg" align="center">
		<div class="content_bg" style="border:1px solid #284889; height:auto;overflow:auto;overflow-x:hidden;vertical-align:center;width:720px" align="center" >
			<table class="content_bg"  valign="top" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr  style="width: 100%;background:url('/ayushman/assets/images/headerimage.png');background-repeat:repeat-x;">
					<td align="left" style="padding-left:25px;"><a href="/ayushman/cdashboard/view"><img src="/ayushman/assets/images/Logo.png" width="165" height="33"></a></td>
				</tr>
				<tr>
					<td align="left" class="bodytext_bold" style="padding-top:7px; padding-bottom:15px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="5px" class="table_roundBorder">
							<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" class="bodytext_error" >
								<td width="100%" colspan="2" height="25" align="left" valign="top" ><img style="height:30px;width:30px;" src="/ayushman/assets/images/red-cross.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $response['ResponseMessage']; ?></td>
							</tr>
							<tr >
								<td class="bodytext_normal">
									Name:
								</td>
								<td class="bodytext_bold">
									<?php echo $response['BillingName']; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_normal">
									Reference No:
								</td>
								<td class="bodytext_bold">
									<?php echo $response['MerchantRefNo']; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_normal">
									Payment ID:
								</td>
								<td class="bodytext_bold">
									<?php echo $response['PaymentID']; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_normal">
									Transaction ID:
								</td>
								<td class="bodytext_bold">
									 <?php echo $response['TransactionID']; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_normal">
									Date and Time:
								</td>
								<td class="bodytext_bold">
									<?php echo $response['DateCreated']; ?>
								</td>
							</tr>
							<tr>
								<td class="bodytext_normal">
									Amount:
								</td>
								<td class="bodytext_bold">
									<?php echo $response['Amount']; ?>
								</td>
							</tr>
							<tr>
								<td height="40" colspan="2" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;border-radius:0 0 3px 3px;">
									<input type="button" value="Check Statement" class="button" style="width:100px;" onclick="parent.location = '/ayushman/cdashboard/view?url=caccountstatement/view'" /><input type="button" value="Recharge Again" style="width:100px;margin-left:5px;" class="button" onclick="parent.location = '/ayushman/cdashboard/view?url=crecharge/view'" /><input type="button" value="Go to Home" class="button" style="width:100px;margin-left:5px;" onclick="parent.location = '/ayushman/cdashboard/view'" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>
