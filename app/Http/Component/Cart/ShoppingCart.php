<?php
namespace App\Http\Component\Cart;

class ShoppingCart
{
	public $Products = [];
	public $DeliveryMin = 0;
	public $DeliveryCost = 0;

	function DeliveryCost($cost = 0)
	{
		$this->DeliveryCost = $cost;

		return $this;
	}

	function DeliveryMin($cost = 0)
	{
		$this->DeliveryMin = $cost;

		return $this;
	}

	function Add($pr)
	{
		$hash = $this->Hash($pr);

		if(array_key_exists($hash, $this->Products))
		{
			$this->Products[$hash]->Qty( (int) $this->Products[$hash]->Qty + (int) $pr->Qty );
		}

		$this->Products[$hash] = $pr;

		return $this;
	}

	function Plus($hash)
	{
		if(array_key_exists($hash, $this->Products))
		{
			$this->Products[$hash]->Qty( (int) $this->Products[$hash]->Qty + (int) 1 );
		}

		return $this;
	}

	function Minus($hash)
	{
		if(array_key_exists($hash, $this->Products))
		{
			if($this->Products[$hash]->Qty > 1)
			{
				$this->Products[$hash]->Qty( (int) $this->Products[$hash]->Qty - 1 );
			}
		}

		return $this;
	}

	function Remove($hash)
	{
		if(array_key_exists($hash, $this->Products))
		{
			unset($this->Products[$hash]);
		}

		return $this;
	}

	function Cost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $v)
		{
			$cost += $v->Cost();
		}

		$cost += $this->DeliveryCost;

		if($this->DeliveryMin > 0)
		{
			if($cost >= $this->DeliveryMin)
			{
				$cost -= $this->DeliveryCost;
			}
		}

		return number_format($cost,2,'.','');
	}

	function PackingCost()
	{
		$cost = 0;
		foreach ($this->Products as $k => $v)
		{
			$cost += $v->PackingCost();
		}

		return number_format($cost,2,'.','');
	}

	protected function Hash($pr)
	{
		return $pr->Id . md5(serialize($pr->Addons));
	}
}

/*
use App\Http\Component\Cart\Addon;
use App\Http\Component\Cart\Product;
use App\Http\Component\Cart\ShoppingCart;

$a = new Addon();
$a->Id(1)->Qty(2)->Price(1.55);

$a1 = new Addon();
$a1->Id(2)->Qty(1)->Price(1.50)->Packing(2);

$p = new Product();
$p->Id(1)->Qty(2)->Price(1.50)->Packing(2);
$p->Addon($a);
$p->Addon($a1);
// echo $p->Cost();
// echo $p->PackingCost();

$p1 = new Product();
$p1->Id(1)->Qty(1)->Price(1.50)->Packing(1);
// echo $p1->Cost();
// echo $p1->PackingCost();

$cart = new ShoppingCart();
$cart->DeliveryCost(4);
$cart->DeliveryMin(60);
$cart->Add($p);
$cart->Add($p1);
$cart->Add($p1);
echo $cart->Cost();
echo $cart->PackingCost();

// Save cart to session
// $_SESSION['cart'] = serialize($cart);
// Load cart from session
// $cart = unserialize($_SESSION['cart']);
*/