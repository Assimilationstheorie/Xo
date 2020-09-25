<?php
namespace App\Http\Component\Singleton;

use App\Http\Component\Singleton\Singleton;

class SingletonSample extends Singleton
{
	static protected $List = [];

	static function Add(string $name, array $list)
	{
		self::$List[$name] = $list;
	}

	static function List()
	{
		// self::GetInstance();
		return serialize(self::$List);
	}
}