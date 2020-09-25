<?php declare(strict_types=1);
namespace App\Http\Component\Singleton;

class Singleton
{
	// private static $instance = null;
	private static ?Singleton $instance = null; // php 7.4

	public static function GetInstance(): self
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}
		return static::$instance;
	}

	/* prevent */
	protected function __construct(){}
	protected function __clone(){}
	protected function __wakeup(){}
}