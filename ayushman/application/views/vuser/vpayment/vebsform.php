<link href="/ayushman/assets/css/style.css" rel="stylesheet" type="text/css"/>
<script src="/ayushman/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/ayushman/assets/js/livevalidation_standalone.compressed.js"></script>

<script language="JavaScript">
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
<!--<form  method="post" action="https://api.secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()" >-->
<form  method="post" action="https://secure.ebs.in/pg/ma/payment/request" name="frmTransaction" id="frmTransaction" onSubmit="return validate()" >
	<input name="channel" type="hidden" value="<?php echo $channel;?>" />		
	<input name="account_id" id="account_id" type="hidden" value="<?php echo $account_id; ?>"/>
	<input name="reference_no" id="reference_no" type="hidden" value="<?php echo $reference_no;?>" />
	<input name="amount" id="amount" type="hidden" value="<?php echo $amount;?>"/>
	<input name="mode" id="mode" type="hidden"  value="<?php echo $mode;?>" />
	<input name="currency" type="hidden" value="<?php echo $currency;?>" />
	<input name="description" id="description" type="hidden" value="<?php echo $description;?>" /> 
	<input name="return_url" id="return_url" type="hidden"  value="<?php echo $return_url; ?>" />
	<input name="name" id="name" type="hidden"  value="<?php echo $name; ?>" />
	<input name="address" id="address" type="hidden"  value="<?php echo $address; ?>" />
	<input name="city" id="city" type="hidden" value="<?php echo $city; ?>" />
	<input name="state" id="state" type="hidden"  value="<?php echo $state; ?>" />
	<input name="country" id="country" type="hidden"  value="<?php echo $country; ?>" />
	<input name="postal_code" id="postal_code" type="hidden" value="<?php echo $postal_code; ?>" />
	<input name="phone" id="phone" type="hidden"  value="<?php echo $phone; ?>" />
	<input name="email" id="email" type="hidden"  value="<?php echo $email; ?>" />
	<input name="page_id" id="page_id" type="hidden" value="<?php echo $page_id; ?>"/>
	<input name="secure_hash" id="secure_hash" type="hidden" value="<?php echo $secure_hash;?>" />
</form>
</div>
