<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// print_r($arr);

		$h = " It Works ... " . $arr['id'];

		// $h .= LeftMenu::Html();

		return $h;
	}
}