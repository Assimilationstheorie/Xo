<?php
namespace App\Http\Component\Cart;

class Addon
{
	public $Id = 0;
	public $Qty = 1;
	public $Price = 0;
	public $Packing = 0;
	public $Name = '';

	function __construct($id = 0, $price = 0, int $qty = 1, $packing = 0, $name = '')
	{
		if($qty < 1){ $qty = 1; }
		$this->Qty($qty);
		$this->Id($id);
		$this->Price($price);
		$this->Packing($packing);
		$this->Name($name);
	}

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

	function PackingCost()
	{
		return $this->Qty * $this->Packing;
	}

	function Cost()
	{
		return $this->AddonCost() + $this->PackingCost();
	}

	protected function AddonCost()
	{
		return $this->Qty * $this->Price;
	}
}