<?php
namespace App\Http\View;

use App\Menu\MenuBox;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// print_r($arr);

		$h = " It Works ... " . $arr['id'];

		// $h .= self::LeftMenu();

		return $h;
	}

	static function LeftMenu()
	{
		$m = new MenuBox('Homepage', '/', '<i class="fas fa-user"></i>');
		$m->AddLink('Login', '/login');
		$m->AddLink('Register', '/register');
		$h = $m->Show();

		// Better insert style from css
		$h .= $m->Style();

		return $h;
	}
}