<?php
namespace App\Http\Component\Cart;

class Cart
{
	protected $TotalDelivery = 0;

	function __construct(float $delivery_cost = 0, float $delivery_min = 0)
	{
		$this->DeliveryMin = $delivery_min;
		$this->DeliveryCost = $delivery_cost;
	}

	function Add($product)
	{
		$hash = $this->Hash($product);
		if(array_key_exists($hash, $this->Products))
		{
			$this->Products[$hash]->Qty = $this->Products[$hash]->Qty + $product->Qty;
		}
		$this->Products[$hash] = $product;
	}

	function ProductsCost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $p) {
			$cost += $p->ProductCost();
		}
		return $cost;
	}

	function PackingCost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $p) {
			$cost += $p->PackingCost();
		}
		return $cost;
	}

	function DeliveryCost()
	{
		$cart_cost = $this->ProductsCost() + $this->PackingCost();

		if($this->DeliveryMin > 0) {
			if($cart_cost >= $this->DeliveryMin) {
				return 0;
			}
		}
		return $this->DeliveryCost;
	}

	function TotalCost()
	{
		return ( $this->ProductsCost() + $this->PackingCost() + $this->DeliveryCost() );
	}

	function Hash($pr)
	{
		return $pr->Id . md5(serialize($pr->Addons));
	}
}