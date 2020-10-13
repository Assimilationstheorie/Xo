<?php
namespace App\Http\View\Login;

use App\Http\View\View;
use App\Http\Component\Html;

class ResetView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Reset password', 'Change account password.', 'reset password page', '');
		$h .= self::ShowForm($arr['err']);
		$h .= Html::Footer();

		return $h;
	}

	static function ShowForm($err)
	{
		return '
		<div class="content">

			<a href="/"> <img src="/media/img/cross.png" class="form-logo"> </a>

			<form method="post" action="">
				<h2>Reset password</h2>
				'.$err.'
				<label>Email addres</label>
				<input type="text" name="email" placeholder="Enter email address">

				<input type="submit" name="submit" value="Reset">
			</form>

			<div class="links">
				<a href="/login" class="a-link"> Sing In </a>
				<a href="/register" class="a-link"> Sign Up </a>
			</div>

		</div>
		';
	}
}