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
		$cost = $this->Qty * ( $this->Price + $this->Packing + $this->CostAddons() );
		return number_format($cost,2,'.','');
	}

	protected function CostAddons()
	{
		$cost = 0;
		foreach ($this->Addons as $v)
		{
			$cost += $v->Cost();
		}

		return $cost;
	}
}