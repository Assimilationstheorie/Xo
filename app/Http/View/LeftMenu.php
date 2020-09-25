<?php
namespace App\Http\View;

use App\Http\Component\Menu\MenuBox;

class LeftMenu
{
	static function Html()
	{
		$html = self::SubMenuLogin();
		// $html .= self::SubMenu2();

		// Better insert style from css
		$html .= MenuBox::Style();

		return $html;
	}

	static function SubMenuLogin()
	{
		$m = new MenuBox('Demo Page', '/demo', '<i class="fas fa-home"></i>');
		$m->AddLink('Login', '/login');
		$m->AddLink('Register', '/register');
		return $m->Html();
	}
}