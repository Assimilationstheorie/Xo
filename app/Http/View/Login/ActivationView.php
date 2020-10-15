<?php
namespace App\Http\View\Login;

use App\Http\View\View;
use App\Http\Component\Html;
use App\Http\View\Menu\MenuTop;

class ActivationView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Activation', 'Confirm email address.', 'activation page', '');
		$h .= self::ShowForm($arr['err']);
		$h .= Html::Footer();

		return $h;
	}

	static function ShowForm($err)
	{
		return '
		<div class="content">

			<a href="/"> <img src="/media/img/logo.png" class="form-logo"> </a>

			<form method="post" action="">
				<h2>Activation</h2>
				'.$err.'
			</form>

			<div class="links">
				<a href="/login" class="a-link"> Sign In </a>
				<a href="/resetpass" class="a-link"> Reset password </a>
			</div>

		</div>
		';
	}
}