<?php
namespace App\Http\View\Panel;

use App\Http\Component\Html;
use App\Http\View\Menu\MenuTop;
use App\Http\View\View;

class ProfilView implements View
{
	static function Html(array $arr): string
	{
		$h = Html::Header('Profil', 'Profil', '', '');
		$h .= self::Show($arr['err']);
		$h .= Html::Footer();
		return $h;
	}

	static function Show($err)
	{
		return MenuTop::Html() . '
		<div class="content">
			<div class="box">
				<h3 class="animate__animated animate__fadeIn"> Profil Info </h3>
				<p>Sample client panel page. </p>
			</div>
		</div>
		';
	}
}