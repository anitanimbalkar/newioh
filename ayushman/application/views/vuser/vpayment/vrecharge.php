<html>
<head>
	<title>Billing Plan Details</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="/ayushman/assets/app/css/bootstrap.min.css" />
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
                error : function(){showMessage('550','200','Retrieving plan',"Could not retrieve data.",'error','id');$('#loading').dialog('close');$(".ui-dialog-titlebar").show();
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
				$('#symbol').text('Rs. ');$
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
            getbalance();
            jQuery('#amount').keyup(function () {
				this.value = this.value.replace(/[^0-9]\./g,'');
                if($(this).val().split(".")[2] != undefined ){
				$(this).val($(this).val().substring(0, $(this).val().lastIndexOf(".")));
                }

            });
            jQuery('#accountcode_c').keyup(function () {
				this.value = this.value.replace(/[^(IOH)+0-9\.]/g,'');
            });
            $("#amount").focus();
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
                getbalance();
            }else{
				document.getElementById('accountcode_c').removeAttribute('readonly','readonly');
                document.getElementById('accountcode_c').style.backgroundColor = 'white';
                document.getElementById('currentbalance').style.display = '0px';
                document.getElementById('accountcode_c').value = '';
            }
        }
        function getbalance()
				{
					$.ajax({
						cache: false ,
						url: "/ayushman/caccountmanager/getbalance",
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

<div class="tab-section">
	<ul>
		<!--<li>
			<a href="/ayushman/cplanmanager/showselectedplan"> Plan Details </a>
		</li>
		<li>
			<a href="/ayushman/caccountstatement/view"> Statements </a>
		</li>-->
		<li>
			<a class="active-tab" href="javascript://">Recharge  </a>
		</li>
	</ul>
</div>


<div id="wrapper" class="recharge-section" style="width: 100%; padding: 0px;">
	<table style="width:100%; height:100%;" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td align="left" valign="top" class="LeftMenu_BG">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td colspan="4">
							<form id="rechargeform" method="post" enctype="multipart/form-data" action="/ayushman/caccountmanager/recharge"  >
								<table width="100%" border="0"  cellspacing="0" cellpadding="0" class="table_roundBorder recharge-table" style="display: block;">
									<tr>
										<!--<td width="3%" height="40" align="center" valign="middle" bgcolor="#ecf8fb" style="border-bottom:1px solid #a8c8d9;" ><img src="/ayushman/assets/images/bullet.png" width="7" height="7"></td>-->
										<td align="left" colspan="3" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold recharge-title">Recharge My Account </td>
										<!--<td align="right" valign="middle" bgcolor="#ecf8fb" class="bodytext_bold" style="border-bottom:1px solid #a8c8d9; padding-right:10px;"><a href="/ayushman/cbeneficiary/list" style="text-decoration: underline;"><font color="blue">Recharge Other's Account</font></a></td>-->
									</tr>
									<tr class="bodytext_normal" style="display:none;" >
									<td width="12%" style="padding-left:10px;valign:middle;"><input name="accountselection" id="formyself" onclick="setaccount(this);" type="radio" checked value="radiobutton">My Account</input></td>
									<td width="58%"><input name="accountselection" type="radio" onclick="setaccount(this);" value="radiobutton">Other's Account</input></td>
										<td width="0px" align="left" style="valign:bottom;"></td>
									</tr>
									<tr>
										<td width="12%" height="30" align="left" valign="middle" class="bodytext_bold">Name :</td>
										<td width="58%" colspan="2" align="left" valign="middle" class="bodytext_normal"><p>
											<?PHP
                                            $objUser = Auth::instance()->get_user();
                                            $name = $objUser->Firstname_c.' '.$objUser->lastname_c;
                                            echo $name;
                                            ?>
										</td>
									</tr>
									<tr style="display:none;">
										<td width="12%" height="30" align="left" valign="middle" class="bodytext_bold">Billing ID :</td>
										<td width="58%" colspan="2" align="left" valign="middle" class="bodytext_normal"><input style="background-color:transparent; border:none;" readonly="readonly" name="accountcode_c" class="bodytext_normal" id="accountcode_c" type="text" size="20"/></td>
									</tr>
									<tr>
										<td width="12%" height="33" align="left" valign="middle" class="bodytext_bold">Available Balance :</td>
										<td width="58%" colspan="2" align="left" valign="middle" class="bodytext_normal">Rs. <label id='netbalance_c' name="netbalance_c"></label> </td>
									</tr>
									<tr>
										<td width="12%" height="33" align="left" valign="top" class="bodytext_bold">Amount :</td>
										<td width="58%" colspan="2" align="left" valign="middle" class="bodytext_normal amount-row">
											<label id="symbol">Rs.</label><input name="amount" id="amount" type="text" style="text-align:right;" value="<?php if(($previousvalues != null) &&(isset($previousvalues['amount'])))echo $previousvalues['amount']; ?>" class="textarea" size="15"/>
											<input type="hidden" name="previousCurrency" id="previousCurrency" value="INR" /> Change Currency to
											<select class="textarea" name='currency' onchange="convert(this);" style="width:100px;" id="currency">
												<option value="INR">INR (Indian Rupee)</option>
												<!-- <option value="USD">USD (U.S.Dollar)</option>
												<option value="AUD">AUD (Australian Dollar)</option>
												<option value="CAD">CAD (Canadian Dollar)</option>
												<option value="EUR">EUR (Euro)</option>
												<option value="GBP">GBP (British Pound)</option>
												<option value="SGD">SGD (Singapore Dollar)</option>
												<option value="JPY">JPY (Japanese Yen)</option>
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
											</select>&nbsp;&nbsp; (It will be redirected to Paypal, if other than INR is selected)</td>

									</tr>
									<tr>
										<td height="40" colspan="4" align="right" valign="middle" bgcolor="#ecf8fb" style="border-top:1px solid #a8c8d9;border-radius:0 0 3px 3px; padding-right:10px;"><input type="button" class="button" value="Pay now" style="width:100px;" onclick="recharge();" /></td>
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
<div id="loading" style="width:40px;height:30px;background-color:transparent;align:center;overflow-y:hidden;overflow-x:hidden;">
	<img id="loading" src="/ayushman/assets/images/ajax-loader.gif" />
</div>
</body>
</html>
