<HTML>
<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<link href="/ayushman/assets/css/ayushman fn 1.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	$(document).ready(function(){
		if("<? echo $proceedlink; ?>" != "")
		{
			document.getElementById("proceedbutton").value = "Proceed";
		}
	});

	function backtodashboard(){
		if("<? echo $proceedlink; ?>" == "")
		{
			parent.location = '/ayushman/cdashboard/view';
		}
		else
		{
			var location='<?php echo $proceedlink; ?>';
			parent.location = '/ayushman/cdashboard/view?url='+location;
		}
	}
</script>
</HEAD>
<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 class="">
<div class="top-header" style="height: auto !important">
    <div class="col-xs-2 left-menu-btn">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-8">
        <a class="top-logo" href="/ayushman/home/index.shtml">
                <span> India online health </span>
        </a>
    </div>
</div>
  <div style="height:100%;vertical-align:center;padding-top:0px" class="content_bg" align="center">
		<div class="content_bg" style="border:1px solid #284889; height:auto;overflow:auto;overflow-x:hidden;vertical-align:center;max-width:720px" align="center" >
			<table class="content_bg"  valign="top" width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr  style="width: 100%;">
					<td align="left"><a href="/ayushman/cdashboard/view"><img src="/ayushman/assets/images/Logo.png" width="165" height="33"></a></td>
				</tr>
				<tr>
					<td align="left" class="bodytext_bold" style="padding-top:7px; padding-bottom:15px;">
						<table width="100%" border="0" cellspacing="0" cellpadding="5px" class="table_roundBorder">
							<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" class="bodytext_bold" >
								<td width="100%" colspan="2" height="25" align="left" valign="top" ><img style="height:16px;width:20px;" src="/ayushman/assets/images/right_icon.png"/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $response['ResponseMessage']; ?></td>
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
									<input type="button" value="Check Statement" class="button check-statment-btn" onclick="parent.location = '/ayushman/cdashboard/view?url=caccountstatement/view'" />
									<input type="button" value="Recharge Again" class="button recharge-again" onclick="parent.location = '/ayushman/cdashboard/view?url=crecharge/view'" />
									<input type="button" id="proceedbutton" value="Go to Home" class="button gotoname-btn" onclick="backtodashboard()" />
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
