<?php
namespace App\Http\Component\Cart;

class Cart
{
	public $Products = [];
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

	function Products()
	{
		return $this->Products;
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

	function Plus($hash)
	{
		if(array_key_exists($hash, $this->Products)) {
			$this->Products[$hash]->Qty++;
		}
	}

	function Minus($hash)
	{
		if(array_key_exists($hash, $this->Products)) {
			if($this->Products[$hash]->Qty > 1) {
				$this->Products[$hash]->Qty--;
			}
		}
	}

	function Remove($hash)
	{
		if(array_key_exists($hash, $this->Products)) {
			unset($this->Products[$hash]);
		}
	}

	function PlusProductAddon($hash, $addon_id)
	{
		if(array_key_exists($hash, $this->Products)) {
			$this->Products[$hash]->Addons[$addon_id]->Qty++;
		}
	}

	function MinusProductAddon($hash, $addon_id)
	{
		if(array_key_exists($hash, $this->Products)) {
			if($this->Products[$hash]->Addons[$addon_id]->Qty > 1) {
				$this->Products[$hash]->Addons[$addon_id]->Qty--;
			}
		}
	}

	function RemoveProductAddon($hash, $addon_id)
	{
		if(array_key_exists($hash, $this->Products)) {
			unset($this->Products[$hash]->Addons[$addon_id]);
		}
	}
}