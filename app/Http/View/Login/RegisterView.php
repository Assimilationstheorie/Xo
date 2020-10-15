<?php
namespace App\Http\View\Login;

use App\Http\View\View;
use App\Http\Component\Html;

class RegisterView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Sign Up', 'Create new account.', 'register page', '');
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
				<h2>Sign Up</h2>
				'.$err.'
				<label>Email addres</label>
				<input type="text" name="email" placeholder="Enter email address">

				<label>Password</label>
				<input type="password" name="pass" placeholder="Enter password">

				<input type="submit" name="submit" value="Register" class="animate__animated animate__flipInX">
			</form>

			<div class="links">
				<a href="/login" class="a-link"> Sing In </a>
				<a href="/resetpass" class="a-link"> Reset password </a>
			</div>

		</div>
		';
	}
}