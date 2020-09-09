<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// print_r($arr);

		$h = " It Works ... " . $arr['id'];

		// Add left menu
		// $h .= LeftMenu::Html();

		return $h;
	}
}