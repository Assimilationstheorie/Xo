<?php
namespace App\Http\View\Login;

use App\Http\View\View;
use App\Http\Component\Html;

class LoginView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Sign In', 'Login user.', 'login page', '');
		$h .= self::ShowForm($arr['err']);
		$h .= Html::Footer();

		return $h;
	}

	static function ShowForm($err)
	{
		return '
		<div class="content">

			<img src="/media/img/cross.png" class="form-logo">

			<form method="post" action="">
				<h2>Sign In</h2>
				'.$err.'
				<label>Email addres</label>
				<input type="text" name="email" placeholder="Enter email address">

				<label>Password</label>
				<input type="password" name="pass" placeholder="Enter password">

				<input type="submit" name="submit" value="Login">

				<div class="center">
					<a href="/register" class="a-link"> Sign Up </a>
					<a href="/resetpass" class="a-link"> Reset password </a>
				</div>
			</form>

		</div>
		';
	}
}