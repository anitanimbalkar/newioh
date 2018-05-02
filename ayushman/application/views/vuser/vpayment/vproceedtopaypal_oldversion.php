<script type="text/javascript" src="/ayushman/assets/js/jquery-1.7.1.min.js"> </script>

<!--	<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()" >-->
	<form  method="post" action="https://secure.ebs.in/pg/ma/payment/request" name="frmTransaction" id="frmTransaction" onSubmit="return validate()" >
		<input name="channel" type="hidden" value="2" />
		<input name="account_id" id="account_id" type="hidden" value=""/>
		<input name="return_url" id="return_url" type="hidden" size="60" value="" />
		<input name="mode" id="mode" type="hidden" size="60" value="" />
		<input name="reference_no" id="reference_no" type="hidden" value="" />
		<input name="amount" id="amount1" type="hidden" value=""/>
		<input name="description" id="description" id="description" type="hidden" value="" /> 
		<input name="name" id="name" type="hidden" maxlength="255" value="" />
		<input name="address" id="address" type="hidden" maxlength="255" value="" />
		<input name="city" id="city" type="hidden" maxlength="255" value="" />
		<input name="state" id="state" type="hidden" maxlength="255" value="" />
		<input name="postal_code" id="postal_code" type="hidden" maxlength="255" value="" />
		<input name="country" id="country" type="hidden" maxlength="255" value="" />
		<input name="phone" id="phone" type="hidden" maxlength="255" value="" />
		<input name="email" id="email" type="hidden" size="60" value="" />
		<input name="secure_hash" id="secure_hash" id="secure_hash" type="hidden" size="60" value="" />
		<input name="payment_option" id="payment_option" type="hidden" size="60" value="" />
		<input name="display_currency" id="display_currency" type="hidden" size="60" value="" />';
		

	</form>	
    <div style="height:200px;vertical-align:center;padding-top:0px" align="center">
		<div class="content_bg" style="border:1px solid #284889; height:auto;overflow:auto;overflow-x:hidden;vertical-align:center;" align="center" >
			<table class="content_bg"  valign="top" width="700" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="Heading_Bg" align="left" style="padding-left:25px;">Redirecting to EBS Payment Gateway</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_bold" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">
							Please wait............
					</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">We are redirecting to EBS Payment Gateway.</td>
				</tr>
				<tr>
					<td align="left" class="bodytext_normal" style="padding-left:25px; padding-right:15px; padding-top:7px; padding-bottom:15px;">This may take few seconds.Please do not click on back button.</td>
				</tr>
			</table>
		</div>
	</div>
	<script language="JavaScript">
		$(document).ready(function() {
			data = JSON.parse('<?= $validationdata; ?>');
			redirecttoebs(data);
		});
		function redirecttoebs(data){
			document.getElementById('reference_no').value	= data['reference_no']	;
			document.getElementById('account_id').value 	=  data['account_id']	;
			document.getElementById('return_url').value  	= data['return_url']	;
			document.getElementById('mode').value        	= data['mode']		;
			document.getElementById('amount1').value     	= data['amount']	;	
			document.getElementById('description').value 	= data['description']	;	
			document.getElementById('name').value        	= data['name']		;
			document.getElementById('address').value     	= data['address']	;	
			document.getElementById('city').value        	= data['city']		;
			document.getElementById('state').value       	= data['state']		;
			document.getElementById('postal_code').value 	= data['postal_code']	;	
			document.getElementById('country').value     	= data['country']	;
			document.getElementById('phone').value       	= data['phone']		;
			document.getElementById('email').value       	= data['email']		;
			document.getElementById('secure_hash').value 	= data['secure_hash']	;
			document.getElementById('payment_option').value = data['payment_option'];
			document.getElementById('display_currency').value = data['display_currency'];
	
			$('#frmTransaction').submit();
		}
		
		function validate(){
			
			var frm = document.frmTransaction;
			var aName = Array();
			aName['account_id'] = 'Account ID';
			aName['reference_no'] = 'Reference No';
			aName['amount'] = 'Amount';
			aName['description'] = 'Description';
			aName['name'] = 'Billing Name';
			aName['address'] = 'Billing Address';
			aName['city'] = 'Billing City';
			aName['state'] = 'Billing State';
			aName['postal_code'] = 'Billing Postal Code';
			aName['country'] = 'Billing Country';
			aName['email'] = 'Billing Email';
			aName['phone'] = 'Billing Phone Number';
			aName['ship_name']='Shipping Name';
			aName['ship_address']='Shipping Address';
			aName['ship_city']='Shipping City';
			aName['ship_state']='Shipping State';
			aName['ship_postal_code']='Shipping Postal code';
			aName['ship_country']='Shipping Country';
			aName['ship_phone']='Shipping Phone';
			aName['return_url']='Return URL';
			
			var info = false;
			for(var i = 0; i < frm.elements.length ; i++){
				if((frm.elements[i].value.length == 0)||(frm.elements[i].value=="Select Country")){
					info = true;
				}
				
				if(frm.elements[i].name=='account_id'){
					if(!validateNumeric(frm.elements[i].value)){
						info = true;
					}
				}
				if(frm.elements[i].name=='amount'){
					if(!validateNumeric(frm.elements[i].value)){
						info = true;
					}
				}
				if((frm.elements[i].name=='postal_code')||(frm.elements[i].name == 'ship_postal_code'))
				{
					if(!validateNumeric(frm.elements[i].value)){
						info = true;
					}
				}	
				
				if((frm.elements[i].name=='phone')||(frm.elements[i].name =='ship_phone')){
					if(!validateNumeric(frm.elements[i].value)){
						info = true;
					}
				}		
							
				if((frm.elements[i].name == 'name')||(frm.elements[i].name == 'ship_name'))
				{
					if(validateNumeric(frm.elements[i].value)){
							info = true;
					}
				}
				if(frm.elements[i].name=='ship_postal_code'){
					if(!validateNumeric(frm.elements[i].value)){
						info = true;
					}
				}		
								
				if(frm.elements[i].name == 'email'){
					if(!validateEmail(frm.elements[i].value)){
						info = true;
					}		
				}
			
			}  
			if(info){
				alert('Your Profile is not complete. Profile details are used for the billing transactions. You will be redirected to "Edit Profile". Please complete your profile before you recharge your account.');
				return false;
			}
			else
				return true;
		}

		function validateNumeric(numValue){
				if (!numValue.toString().match(/^[-]?\d*\.?\d*$/)) 
						return false;
				return true;		
			}

		function validateEmail(email) {
			//Validating the email field
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			//"
			if (! email.match(re)) {
				return (false);
			}
			return(true);
		}

		Array.prototype.inArray = function (value)
		// Returns true if the passed value is found in the
		// array.  Returns false if it is not.
		{
			var i;
			for (i=0; i < this.length; i++) {
				// Matches identical (===), not just similar (==).
				if (this[i] === value) {
					return true;
				}
			}
			return false;
		};

		</script>
