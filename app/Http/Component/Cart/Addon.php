<?php
namespace App\Http\Component\Cart;

class Addon
{
	public $Id = 0;
	public $Qty = 0;
	public $Price = 0;
	public $Packing = 0;
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

	function AddonCost()
	{
		return $this->Qty * $this->Price;
	}

	function PackingCost()
	{
		return $this->Qty * $this->Packing;
	}

	function Cost()
	{
		return $this->AddonCost() + $this->PackingCost();
	}
}