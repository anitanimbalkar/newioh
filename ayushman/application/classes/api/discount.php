<?php

class api_Discount
{
	public function getDiscount($amount)
	{
		$discountedamount = $amount * 0.9;
		return $discountedamount;
	}		
}
