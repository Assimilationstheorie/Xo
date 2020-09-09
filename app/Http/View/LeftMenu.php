<?php
namespace App\Http\View;

use App\Menu\MenuBox;

class LeftMenu
{
	static function Html()
	{
		$html = self::SubMenuLogin();
		// $html .= self::SubMenu2();
		// $html .= self::SubMenu3();

		// Better insert style from css
		$html .= MenuBox::Style();

		return $html;
	}

	static function SubMenuLogin()
	{
		$m = new MenuBox('Homepage', '/', '<i class="fas fa-home"></i>');
		$m->AddLink('Login', '/login');
		$m->AddLink('Register', '/register');
		return $m->Html();
	}
}