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

		return $html;
	}

	static function SubMenuLogin()
	{
		$m = new MenuBox('Homepage', '/', '<i class="fas fa-home"></i>');
		$m->AddLink('Login', '/login');
		$m->AddLink('Register', '/register');
		$h = $m->Show();

		// Better insert style from css
		$h .= $m->Style();

		return $h;
	}
}