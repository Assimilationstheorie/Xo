<?php
namespace App\Http\Component\Cart;

class Product
{
	public $Id = 0;
	public $Qty = 0;
	public $Price = 0;
	public $Packing = 0;
	public $Addons = array();
	public $Name = '';

	function Id($nr)
	{
		$this->Id = (int) $nr;
		return $this;
	}

	function Qty($nr)
	{
		$this->Qty = (int) $nr;
		return $this;
	}

	function Price($val)
	{
		$this->Price = (float) $val;
		return $this;
	}

	function Packing($val)
	{
		$this->Packing = (float) $val;
		return $this;
	}

	function Name($str)
	{
		$this->Name = (string) $name;
		return $this;
	}

	function Addon($addon)
	{
		$this->Addons[] = $addon;
		return $this;
	}

	function Cost()
	{
		return $this->ProductCost() + $this->ProductPackingCost() + $this->AddonsCost();
	}

	function PackingCost()
	{
		return $this->ProductPackingCost() + $this->AddonsPackingCost();
	}

	protected function ProductCost()
	{
		return $this->Qty * $this->Price;
	}

	protected function ProductPackingCost()
	{
		return $this->Qty * $this->Packing;
	}

	protected function AddonsCost()
	{
		$cost = 0;
		foreach ($this->Addons as $v)
		{
			$cost += $v->Cost();
		}
		return $cost;
	}

	protected function AddonsPackingCost()
	{
		$cost = 0;
		foreach ($this->Addons as $v)
		{
			$cost += $v->PackingCost() * $this->Qty;
		}
		return $cost;
	}
}