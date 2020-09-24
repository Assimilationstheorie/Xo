<?php
namespace App\Http\Component\Cart;

class ShoppingCart
{
	public $Products = [];
	public $DeliveryMin = 0;
	public $DeliveryCost = 0;

	function __construct($delivery_cost = 0, $delivery_min = 0)
	{
		$this->DeliveryCost = (float) $delivery_cost;
		$this->DeliveryMin = (float) $delivery_min;
	}

	function Add($pr)
	{
		$hash = $this->Hash($pr);
		if(array_key_exists($hash, $this->Products)) {
			$this->Products[$hash]->Qty( (int) $this->Products[$hash]->Qty + (int) $pr->Qty );
		} else {
			$this->Products[$hash] = $pr;
		}
		return $this;
	}

	function Plus($hash)
	{
		if(array_key_exists($hash, $this->Products)) {
			$this->Products[$hash]->Qty( (int) $this->Products[$hash]->Qty + (int) 1 );
		}
		return $this;
	}

	function Minus($hash)
	{
		if(array_key_exists($hash, $this->Products)) {
			$qty = (int) $this->Products[$hash]->Qty;
			if($qty > 1) { $this->Products[$hash]->Qty( $qty - 1 ); }
		}
		return $this;
	}

	function Remove($hash)
	{
		if(array_key_exists($hash, $this->Products)) { unset($this->Products[$hash]); }
		return $this;
	}

	function Cost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $v) {
			$cost += $v->Cost();
		}
		$cost += $this->DeliveryTotalCost($cost);
		return $this->Decimal($cost);
	}

	function PackingCost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $v) { $cost += $v->PackingCost(); }
		return $this->Decimal($cost);
	}

	function DeliveryTotalCost($cost)
	{
		if($this->DeliveryMin > 0) {
			if((float) $cost >= $this->DeliveryMin) {
				return 0;
			}
		}
		return $this->Decimal($this->DeliveryCost);
	}

	protected function Decimal($d)
	{
		return number_format($d,2,'.','');
	}

	protected function Hash($pr)
	{
		return $pr->Id . md5(serialize($pr->Addons));
	}
}