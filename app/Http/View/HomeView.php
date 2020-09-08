<?php
namespace App\Http\View;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// print_r($arr);

		return " It Works ..." . $arr['id'];
	}
}