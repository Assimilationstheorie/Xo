<?php
namespace App\Http\View;

use App\Http\View\LeftMenu;
use App\Http\Component\Html;

class HomeView implements View
{
	static function Html(array $arr): string
	{
		// Header
		$h = Html::Header('Page title', 'Page description', 'home,page', '');

		// Html
		$h .= '<h1> It Works ... </h1>';

		// Sample form
		$h .= self::ShowForm();

		// Animations
		$h .= self::Animate();

		// Add menu
		// $h .= LeftMenu::Html();

		$h .= Html::Footer();

		return $h;
	}

	static function ShowForm()
	{
		return '
		<link href="/style.css" rel="stylesheet">
		<script defer src="/main.js"></script>
		<link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">

		<form method="post">
			<h2>Awesome</h2>

			<div class="notice notice-green"> <i class="fas fa-exclamation"></i> Your account has been created. </div>

			<label>Email addres</label>
			<input type="text" placeholder="Enter email address">
			<div class="error-input">Invalid email address.</div>

			<label>Password</label>
			<input type="password" placeholder="Enter password">

			<label>Gender</label>
			<select>
				<option>MALE</option>
				<option>FEMALE</option>
			</select>

			<label>Message</label>
			<textarea placeholder="Enter message"></textarea>

			<input type="checkbox" name="scales" checked>
			<input type="radio" name="drone" value="huey" checked>
			<input type="radio" id="dewey" name="drone" value="dewey">
			<input type="submit" value="Button">
		</form>';
	}

	static function Animate()
	{
		return '
		<h1>Animations</h1>
		<div class="center">
			<div class="blob orange">+</div>
		</div>
		<div class="center">
			<div class="blob-rotate">+</div>
		</div>
		<div class="center">
			<div class="blob-scale">+</div>
		</div>
		<div class="center">
			<div class="radar"></div>
		</div>
		<div class="center">
			<a class="a-usderscore">Underscore link</a>
		</div>
		<div class="center">
			<a class="a-usderscore usderscore-left">Underscore link</a>
		</div>
		';
	}
}