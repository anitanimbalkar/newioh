<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/ayushman/assets/js/json_parse.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json_parse_state.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/json2.js"> </script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>


<script language="JavaScript">
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
			error : function(){	
					$(".ui-dialog-titlebar").hide();
					showMessage('550','200','Error',"Could not convert currency. Please convert manually required amount in to the currency you wish to pay.",'error','id');$('#loading').dialog('close');
			}
		});
		if($('#currency').val() == 'USD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'AUD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'CAD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'GBP'){
			$('#symbol').text('� ');
		}else if($('#currency').val() == 'EUR'){
			$('#symbol').text('� ');
		}else if($('#currency').val() == 'SGD'){
			$('#symbol').text('$ ');
		}else if($('#currency').val() == 'INR'){
			$('#symbol').text('Rs. ');
		}
		$('#previousCurrency').val($(currency).val());
	}
	$(document).ready(function() {
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
		if('<?php echo $message; ?>' != ''){
			showNotification('300','50','Recharge account','<?php echo $message; ?>','timer','diaconfirmation',5000);
		}
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
</script>
	<script>
		$( document ).ready(function() {
		$('.apply-recharge-modal').click(function() {
			$('body').addClass('recharge-modal')
		});
		});
	</script>
<div height="700px">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:5px;padding-right:5px;padding-top:5px;">
	<tr>
		<td >
			<table width="100%" height="15"  align="left" cellpadding="0" cellspacing="0" class="Heading_Bg" >
				<tr>
					<td  width="100%"  > Insufficient Balance - Need to Credit Your account</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="padding:0px;padding-top:15px;">
			<form id="rechargeform" method="post" enctype="multipart/form-data"  action="/ayushman/caccountmanager/recharge"  >

			<div >
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="recharge-table">
					<tr height="25">
						<td width="12%" height="auto" align="left" valign="middle" class="bodytext_bold">
							Current Balance
						</td>
						<td width="58%" class="bodytext_normal">
							: Rs. <input type="text" class="bodytext_normal" value="<?php echo $curbalance; ?>" width="50px" style="width:50px;border:none;" readonly id="curbalance" name="curbalance" />

						</td>
					</tr>
					<tr height="25">
						<td width="12%" height="auto" align="left" valign="middle" class="bodytext_bold">
							Required Balance
						</td>
						<td width="58%" class="bodytext_normal">
							: Rs. <input type="text" readonly class="bodytext_normal" value="<?php echo $reqbalance; ?>" width="50px" style="width:50px;border:none;" id="reqbalance" name="reqbalance" />
						</td>
					</tr>
					<tr height="25">
						<td width="12%" height="auto" align="left" valign="middle" class="bodytext_bold">
							Recharge With
						</td>
						<td width="58%" class="bodytext_normal amount-row">
							: <label id="symbol">Rs.</label><input type="text" class="textarea" value="<?php echo $reqbalance - $curbalance;?>" width="50px" style="text-align:right;width:50px" id="amount" name="amount" />&nbsp;
								<input type="hidden" name="previousCurrency" id="previousCurrency" value="INR" />
								</br>Change Curruncy to <select class="textarea" name='currency' onchange="convert(this);" style="width:150px;" id="currency">
									<option value="INR">INR (Indian Rupee)</option>
									<option value="USD">USD (U.S.Dollar)</option>
									<option value="AUD">AUD (Australian Dollar)</option>
									<option value="CAD">CAD (Canadian Dollar)</option>	
									<option value="EUR">EUR (Euro)</option>
									<option value="GBP">GBP (British Pound)</option>
									<option value="SGD">SGD (Singapore Dollar)</option>
									<!-- <option value="JPY">JPY (Japanese Yen)</option>
									<option value="ZSD">ZSD (New Zealand Dollar)</option>
									<option value="CHF">CHF (Swiss Franc)</option>
									<option value="HKD">HKD (Hong Kong Dollar)</option>
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
								</select>
								&nbsp;(If other than INR is selected, It will be redirected to Paypal)
								<input style="background-color:transparent;display:none; border:none;" readonly="readonly" name="accountcode_c" class="bodytext_normal" id="accountcode_c" type="text" value="<?php echo $accountcode_c; ?>" size="20"/>
						</td>
					</tr>

					<tr>
						<td height="25" colspan="2" align="right" class="bodytext_normal" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-bottom:1px solid #a8c8d9;padding-top:3px;padding-bottom:3px;padding-right:10px;">
							<input type="button" class="button" value="Cancel" style="width:100px;height:23px;" onclick="parent.getcontent('<?php echo $cancellink; ?>');" />&nbsp;<input type="button" class="button apply-recharge-modal" value="Recharge" style="width:100px;height:23px;" onclick="recharge();"/>
 
						</td>
					</tr>
				</table>
			</div>
		</form>	
		</td>
	</tr>
</table>
</div>
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>

