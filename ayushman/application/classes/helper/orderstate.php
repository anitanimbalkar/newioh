<?php defined('SYSPATH') or die('No direct script access.');

class helper_OrderState implements helper_OrderStateEngine
{
    protected $state;
	protected $orderid;
	protected $details;
	//existing state of the order.
    public function __construct($id,$details, $status) 
    {
		if($status == 'Suggested'){
			$this->state = new OrderSuggestedState;
		}else if($status == 'Requested'){
			$this->state = new OrderRequestedState;
		}else if($status == 'Accepted'){
			$this->state = new OrderAcceptedState;
		}else if($status == 'Rejected'){
			$this->state = new OrderRejectedState;
		}else if($status == 'Canceled'){
			$this->state = new OrderCanceledState;
		}else if($status == 'Completed'){
			$this->state = new OrderCompletedState;
		}else if($status == 'Reportsuploaded'){
			$this->state = new OrderCompletedState;
		}
		$this->orderid = $id;
		$this->details = $details;
    }
	
	//change state to.
	public function changeStateTo($status){
		
		$returnData =  array();
		try{
			$returnData['type'] = 'success';
			$returnData['message'] = 'Order is changed to '.$status.' status.';
			if($status == 'Requested'){
				$this->requestOrder();
			}else if($status == 'Accepted'){
				$this->acceptOrder();
			}else if($status == 'Rejected'){
				$this->rejectOrder();
			}else if($status == 'Canceled'){
				$this->cancelOrder();
			}else if($status == 'Reportsuploaded'){
				$this->completeOrder();
			}else{
				$returnData['message'] = 'invalid status : '.$status.'';
			}
		
		}catch(Exception $e){
			
			$returnData['type'] = 'failure';
			$returnData['message'] = $e->getMessage();
		}
		return $returnData;
	}
    public function requestOrder(){
		$this->state = $this->state->requestOrder();
		$this->state->orderid = $this->orderid;
	}
	public function acceptOrder(){
		$this->state->orderid = $this->orderid;
		$this->state->details = $this->details;
		$this->state = $this->state->acceptOrder();
	}
	public function rejectOrder(){
		$this->state->orderid = $this->orderid;
		$this->state->details = $this->details;
		
		$this->state = $this->state->rejectOrder();
	}
	public function cancelOrder(){
		$this->state = $this->state->cancelOrder();
		$this->state->orderid = $this->orderid;
	}
	public function completeOrder(){
		$this->state->orderid = $this->orderid;
		$this->state->details = $this->details;
		$this->state = $this->state->completeOrder();
	}
}


