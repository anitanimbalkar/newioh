<?php defined('SYSPATH') or die('No direct script access.');

interface helper_OrderStateEngine
{
    public function requestOrder();
	public function acceptOrder();
	public function rejectOrder();
	public function cancelOrder();
	public function completeOrder();
}

class OrderSuggestedState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
    public function requestOrder()
    {
		// code to request order
		return new OrderRequestedState;
    }
    public function acceptOrder()
    {
		throw new Exception('Order is not placed yet.');
    }
	public function rejectOrder()
    {
		throw new Exception('Order is not placed yet.');
    }
	public function cancelOrder()
    {
		throw new Exception('Order is not placed yet.');		
    }
	public function completeOrder()
    {
		throw new Exception('Order is not placed yet.');	
    }
}

class OrderRequestedState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
	
    public function requestOrder()
    {
		throw new Exception('Order is in accepted state.');		
    }
    public function acceptOrder()
    {
		$today = date("d-m-Y"); 
		$orders = new helper_Orders;
		$return = $orders->acceptorder($this->orderid,$today);

		if($return['type'] == 'error'){
			throw new Exception($return['message']);	
		}else{
			return new OrderAcceptedState;
		}
    }
	public function rejectOrder()
    {
		$orders = new helper_Orders;
		$return = $orders->rejectorder($this->orderid,$this->details);

		if($return['type'] == 'error'){
			throw new Exception($return['message']);	
		}else{
			return new OrderRejectedState;
		}
    }
	public function cancelOrder()
    {
		throw new Exception('Order is in requested state.');		
    }
	public function completeOrder()
    {
		throw new Exception('Order is in requested state.');		
    }
}

class OrderAcceptedState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
	
    public function requestOrder()
    {
		throw new Exception('Order is in accepted state.');		
    }
    public function acceptOrder()
    {
		throw new Exception('Order is in accepted state.');		
    }
	public function rejectOrder()
    {
        return new OrderRejectedState;
    }
	public function cancelOrder()
    {
		$orders = new helper_Orders;
		$return = $orders->cancelorder($this->orderid,$this->details);

		if($return['type'] == 'error'){
			throw new Exception($return['message']);	
		}else{
			return new OrderCanceledState;
		}
    }
	public function completeOrder()
    {
		$orders = new helper_Orders;
		$return = $orders->completeorder($this->orderid,$this->details);
		if($return['type'] == 'error'){
			throw new Exception($return['message']);	
		}else{
			return new OrderCompletedState;
		}
    }
}

class OrderRejectedState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
	
	public function requestOrder()
    {
		throw new Exception('Order is in rejected state.');
    }
    public function acceptOrder()
    {
		throw new Exception('Order is in rejected state.');
    }
	public function rejectOrder()
    {
		throw new Exception('Order is in rejected state.');		
    }
	public function cancelOrder()
    {
		throw new Exception('Order is in rejected state.');		
    }
	public function completeOrder()
    {
		throw new Exception('Order is in rejected state.');		
    }
}

class OrderCompletedState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
	
    public function requestOrder()
    {
		throw new Exception('Order is in completed state.');
    }
    public function acceptOrder()
    {
		throw new Exception('Order is in completed state.');
    }
	public function rejectOrder()
    {
		throw new Exception('Order is in completed state.');
    }
	public function cancelOrder()
    {
		throw new Exception('Order is in completed state.');
    }
	public function completeOrder()
    {
		throw new Exception('Order is in completed state.');
    }
}

class OrderCanceledState implements helper_OrderStateEngine
{
	public $orderid;
	public $details;
	
    public function requestOrder()
    {
		throw new Exception('Order is in canceled state.');
    }
    public function acceptOrder()
    {
		throw new Exception('Order is in canceled state.');
    }
	public function rejectOrder()
    {
		throw new Exception('Order is in canceled state.');
    }
	public function cancelOrder()
    {
		throw new Exception('Order is in canceled state.');
    }
	public function completeOrder()
    {
		throw new Exception('Order is in canceled state.');
    }
}


