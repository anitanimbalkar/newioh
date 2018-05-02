<html>
<head>
<title>Billing Plan Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>

<script type="text/JavaScript">
	function convert(currency){
		$(".ui-dialog-titlebar").hide();

		$('#loading').dialog('open');
		$.ajax({
		  url: "/ayushman/caccountmanager/convertcurrency?amount="+$('#amount').val()+"&from="+$('#previousCurrency').val()+"&to="+$(currency).val(),
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'error')
					showMessage('550','200','Creating plan',data['message'],data['type'],'id');
				else
				{
					$('#amount').val(data['data']);
					$('#loading').dialog('close');
					$(".ui-dialog-titlebar").show();
				}
			},
			error : function(){showMessage('550','200','Converting Currency',"Could not convert currency, Please try again...",'error','id');$('#loading').dialog('close');$(".ui-dialog-titlebar").show();
}
		});
		if($('#currency').val() == 'USD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'AUD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'CAD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'GBP'){
			$('#symbol').text('£ ');
		}else if($('#currency').val() == 'EUR'){
			$('#symbol').text('€ ');
		}else if($('#currency').val() == 'SGD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'INR'){
			$('#symbol').text('Rs. ');$
		}

		$('#previousCurrency').val($(currency).val());
	}
	$(document).ready(function() {
		getbalance('<?php echo $beneficiaryUserId; ?>');
		$('#loading').dialog({
			autoOpen: false,
			show: "fade",
			hide: "fade",
			modal: true,
			height: "30",
			resizable: false,
			width: "100px"
		});
		jQuery('#amount').keyup(function () { 
			this.value = this.value.replace(/[^0-9\.]/g,'');
		});
		jQuery('#accountcode_c').keyup(function () { 
			this.value = this.value.replace(/[^(IOH)+0-9\.]/g,'');
		});
		$('#rechargeform').submit(function(){
			$.post(this.action, $(this).serialize(), function(res){
				data =  JSON.parse(res);
				if(data['type'] == 'error')
					showMessage('550','200','Creating plan',data['message'],data['type'],'id');
				else
				{
					if($('#currency').val() != 'INR'){
						data['payment_option'] = '1211';
						data['display_currency'] = $('#currency').val();
						
					}else{
						data['payment_option'] = '';
						data['display_currency'] = '';
					}
					parent.location = '/ayushman/cebsvalidation/proceed?validationdata='+JSON.stringify(data);
				}
			});
			return false; // prevent default action
		});
		$("#amount").focus();
	});
	function recharge()
	{
		if(document.getElementById('amount').value == '')
		{
			showNotification('300','20','Make Payment','Amount field is blank. Please enter amount and retry.','notification','diaconfirmation',5000);
		}else{
			$('#rechargeform').submit();
		}
	}
	function setaccount(radiobutton)
	{
		if(radiobutton.id == 'formyself')
		{
			document.getElementById('accountcode_c').setAttribute('readonly','readonly');
			document.getElementById('accountcode_c').style.backgroundColor = 'transparent';
			document.getElementById('accountcode_c').style.border = 'none';
			document.getElementById('currentbalance').style.height = '0px';
			getbalance('<?php echo $beneficiaryUserId; ?>');
		}else{
			document.getElementById('accountcode_c').removeAttribute('readonly','readonly');
			document.getElementById('accountcode_c').style.backgroundColor = 'white';
			document.getElementById('currentbalance').style.display = '0px';
			document.getElementById('accountcode_c').value = '';
		}
	}
	function getbalance(id)
	{
		$.ajax({
		  url: "/ayushman/caccountmanager/getbeneficiarydetails?beneficiaryid="+id,
		  success: function( data ) {
				data =  JSON.parse(data);
				if(data['type'] == 'error')
					showMessage('550','200','Retrieving plan',data['message'],data['type'],'id');
				else
				{
					data = data['data'];
					accountdetails = JSON.parse(data);
					
					element = document;
					elements = element.getElementsByTagName("label");
					for(var i=0; i<elements.length; i++)
					{
						if(accountdetails[elements[i].id] != undefined)
						{
							elements[i].innerHTML = accountdetails[elements[i].id];
						}
					}
					elements = element.getElementsByTagName("input");
					for(var i=0; i<elements.length; i++)
					{
						if(accountdetails[elements[i].id] != undefined)
						{
							elements[i].value = accountdetails[elements[i].id];
						}
					}
				}
			},
			error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data for selected plan.",'error','id');}
		});
	}
</script>

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div id="wrapper" style="width:828px;border:none; height:570px; padding-left:0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  >&nbsp;<img src="/ayushman/assets/images/WhiteArrow_Icon.png" width="9" height="7"/>&nbsp;&nbsp;Add Balance in <?php echo $beneficiaryname; ?>'s Account</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_roundBorder">
					<tr>
						<td height="auto" colspan="4" align="right" valign="middle" >
							<form id="rechargeform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountmanager/rechargeOthersAccount"  >
								<table width="100%" align="left" cellpadding="0" cellspacing="0">
									<tr class="bodytext_normal" >
										<tr bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;border-radius:4px 4px 0 0;" >
											<td width="3%" height="25" align="center" valign="middle" >&nbsp;</td>
											<td colspan="5" align="left" valign="middle" class="bodytext_bold" >&nbsp;</td>
										</tr>
									</tr>
									<tr class="bodytext_normal" style="display:none;" >
										<td width="10px">&nbsp;</td>
										<td width="125px" style="padding-left:10px;valign:middle;"><input name="accountselection" id="formyself" onclick="setaccount(this);" type="radio" checked value="radiobutton">My Account</input></td>
										<td width="100px"><input name="accountselection" type="radio" onclick="setaccount(this);" value="radiobutton">Other's Account</input></td>
										<td width="0px" align="left" style="valign:bottom;"></td>
										
										<td width="0px" align="left">&nbsp;</td>
										<td width="0px">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal" >
										<td width="10px">&nbsp;</td>
										<td width="125px" style="padding-top:7px;padding-left:15px;valign:middle;" class="bodytext_bold">Name:</td>
										<td width="100px">
											<?PHP  
												$objUser = ORM::factory('user')->where('id','=',$beneficiaryUserId)->find();
												$name = $objUser->Firstname_c.' '.$objUser->lastname_c;
												echo $name;
											?>									
										</td>
										<td width="0px" align="left" style="valign:bottom;"></td>
										<td width="0px" align="left">&nbsp;</td>
										<td width="0px">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal" >
										<td width="10px">&nbsp;</td>
										<td width="125px" style="padding-left:15px;valign:middle;" class="bodytext_bold">IOH Id:</td>
										<td width="100px"><input style="background-color:transparent; border:none;" readonly="readonly" name="beneficiaryid" class="bodytext_normal" id="beneficiaryid" type="text" value="<?php echo $beneficiaryUserId; ?>" size="20"/></td>
										<td width="0px" align="left" style="valign:bottom;"></td>
										<td width="0px" align="left">&nbsp;</td>
										<td width="0px">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal" style="display:none;" >
										<td width="10px">&nbsp;</td>
										<td width="125px" style="padding-left:15px;valign:middle;" class="bodytext_bold">Billing ID:</td>
										<td width="100px"><input style="background-color:transparent; border:none;" readonly="readonly" name="accountcode_c" class="bodytext_normal" id="accountcode_c" type="text" size="20"/></td>
										<td width="0px" align="left" style="valign:bottom;"></td>
										<td width="0px" align="left">&nbsp;</td>
										<td width="0px">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal"  >
										<td width="10px">&nbsp;</td>
										<td width="125px" style="padding-left:15px;valign:middle;" class="bodytext_bold">Amount:</td>
										<td width="600px" style="valign:middle;" ><label id="symbol">Rs.</label><input name="amount" id="amount" type="text" style="text-align:right;" class="textarea" size="15"/><input type="hidden" name="previousCurrency" id="previousCurrency" value="INR" /> change currency to
								<select class="textarea" name='currency' onchange="convert(this);" style="width:51px;" id="currency">
									<option value="INR">INR (Indian Rupee)</option>
									<option value="USD">USD (U.S.Dollar)</option>
									 <option value="AUD">AUD (Australian Dollar)</option>
									<option value="CAD">CAD (Canadian Dollar)</option>	
									<option value="EUR">EUR (Euro)</option>
									<option value="GBP">GBP (British Pound)</option>
									<option value="SGD">SGD (Singapore Dollar)</option>
									<!--<option value="JPY">JPY (Japanese Yen)</option>
									
									<option value="ZSD">ZSD (New Zealand Dollar)</option>
									<option value="CHF">CHF (Swiss Franc)</option>
									<option value="HKD">HKD (Hong Kong Dollar)</option>
									<option value="SGD">SGD (Singapore Dollar)</option>
									<option value="SKE">SKE (Swedish Krona)</option>
									<option value="DKK">DKK (Danish Krone)</option>
									<option value="PLN">PLN (Polish Zloty)</option>
									<option value="NOK">NOK (Norwegian Krone)</option>
									<option value="HUF">HUF (Hungarian Forint)</option>
									<option value="CZK">CZK (Czech Koruna)</option>
									<option value="ILS">ILS (Israeli New Shekel)</option>
									<option value="MXN">MXN (Mexican Peso)</option>
									<option value="BRL">BRL (Brazilian Real (Only for Brazilian members))</option>
									<option value="MYR">MYR (Malaysian Ringgit (Only for Malaysian members))</option>
									<option value="PHP">PHP (Philippine Peso)</option>
									<option value="TWD">TWD (New Taiwan Dollar)</option>
									<option value="THB">THB (Thai Baht)</option>
									<option value="TRY">TRY (Turkish Lira (Only for Turkish members))</option> -->
								</select>&nbsp;&nbsp; (It will be redirected to Paypal, if other than INR is selected)</td>
										<td width="0px" align="left" style="valign:bottom;"></td>
										<td width="0px" align="left">&nbsp;</td>
										<td width="0px">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal" >
										<td colspan="6">&nbsp;</td>
									</tr>
									<tr class="bodytext_normal" >
										<td height="40" colspan="6" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9; padding-right:10px;border-radius:0 0 3px 3px;">
											<input type="button" class="button" onclick="parent.getcontent('/ayushman/cbeneficiary/list');" height="22" style="width: 100px; height: 25px; " value="Back"/>
											<input type="button" class="button" value="Pay now" style="width:150px;" onclick="recharge();" />
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
</table>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
<div style="display:none;height:0px;">
	<div class="bodytext_error" id="errorlistdiv">
		<?= Arr::path($errors,'error'); ?>
	</div>
</div>

<div style="display:none;height:0px;">
	<div class="bodytext_normal" id="messagelistdiv">
		<?= Arr::path($messages,'message'); ?>
	</div>
</div>
</body>
</html>
